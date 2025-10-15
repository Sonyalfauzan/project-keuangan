<?php include 'header.php'; ?>
<section class="content">
<div class="box box-primary">
<div class="box-header"><h3 class="box-title">Supplier</h3>
<button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal_add">Tambah</button></div>
<div class="box-body">
<table class="table table-bordered" id="table-datatable">
<thead><tr><th>Nama</th><th>Kontak</th><th>Telp</th><th>Email</th><th>NPWP</th><th>Aksi</th></tr></thead>
<tbody>
<?php 
$tenant = intval($_SESSION['tenant_id']);
$data = mysqli_query($koneksi,"SELECT * FROM suppliers WHERE tenant_id=$tenant ORDER BY id DESC");
while($d=mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?php echo htmlspecialchars($d['name']); ?></td>
<td><?php echo htmlspecialchars($d['contact_person']); ?></td>
<td><?php echo htmlspecialchars($d['phone']); ?></td>
<td><?php echo htmlspecialchars($d['email']); ?></td>
<td><?php echo htmlspecialchars($d['npwp']); ?></td>
<td>
  <a class="btn btn-xs btn-primary" href="suppliers_edit.php?id=<?php echo $d['id']; ?>">Edit</a>
  <a class="btn btn-xs btn-danger" onclick="return confirm('Hapus?')" href="suppliers_hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</section>

<div class="modal fade" id="modal_add">
  <div class="modal-dialog">
    <form method="post" action="suppliers_act.php">
    <div class="modal-content">
      <div class="modal-header"><h4>Tambah Supplier</h4></div>
      <div class="modal-body">
        <div class="form-group"><label>Nama</label><input name="name" class="form-control" required></div>
        <div class="form-group"><label>Kontak</label><input name="contact_person" class="form-control"></div>
        <div class="form-group"><label>Telp</label><input name="phone" class="form-control"></div>
        <div class="form-group"><label>Email</label><input name="email" type="email" class="form-control"></div>
        <div class="form-group"><label>NPWP</label><input name="npwp" class="form-control"></div>
        <div class="form-group"><label>Alamat</label><textarea name="address" class="form-control"></textarea></div>
      </div>
      <div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-default">Batal</button><button class="btn btn-primary">Simpan</button></div>
    </div>
    </form>
  </div>
</div>
<?php include 'footer.php'; ?>