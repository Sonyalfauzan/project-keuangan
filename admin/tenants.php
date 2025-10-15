<?php include 'header.php'; ?>
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Tenants</h3>
          <div class="pull-right">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_tambah">Tambah</button>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-bordered" id="table-datatable">
            <thead>
              <tr>
                <th>ID</th><th>Nama</th><th>Kode</th><th>Status</th><th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $tenant = mysqli_query($koneksi,"SELECT * FROM tenants ORDER BY tenant_id ASC");
            while($t = mysqli_fetch_assoc($tenant)){ ?>
              <tr>
                <td><?php echo $t['tenant_id']; ?></td>
                <td><?php echo htmlspecialchars($t['tenant_name']); ?></td>
                <td><?php echo htmlspecialchars($t['tenant_code']); ?></td>
                <td><?php echo $t['tenant_status']; ?></td>
                <td>
                  <a class="btn btn-xs btn-info" href="impersonate_start.php?tenant=<?php echo $t['tenant_id']; ?>">Impersonate</a>
                  <?php if($t['tenant_status']=='active'){ ?>
                    <a class="btn btn-xs btn-warning" href="tenants_suspend.php?id=<?php echo $t['tenant_id']; ?>">Suspend</a>
                  <?php } else { ?>
                    <a class="btn btn-xs btn-success" href="tenants_unsuspend.php?id=<?php echo $t['tenant_id']; ?>">Unsuspend</a>
                  <?php } ?>
                  <a class="btn btn-xs btn-primary" href="tenants_edit.php?id=<?php echo $t['tenant_id']; ?>">Edit</a>
                  <a class="btn btn-xs btn-danger" onclick="return confirm('Hapus tenant?')" href="tenants_hapus.php?id=<?php echo $t['tenant_id']; ?>">Hapus</a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="modal_tambah">
  <div class="modal-dialog">
    <form method="post" action="tenants_act.php">
      <div class="modal-content">
        <div class="modal-header"><h4 class="modal-title">Tambah Tenant</h4></div>
        <div class="modal-body">
          <div class="form-group"><label>Nama</label><input type="text" name="tenant_name" class="form-control" required></div>
          <div class="form-group"><label>Kode</label><input type="text" name="tenant_code" class="form-control" required></div>
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include 'footer.php'; ?>