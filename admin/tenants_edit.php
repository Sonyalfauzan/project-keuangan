<?php include 'header.php'; 
$id = intval($_GET['id']);
$d = mysqli_query($koneksi,"SELECT * FROM tenants WHERE tenant_id=$id");
$t = mysqli_fetch_assoc($d); ?>
<section class="content">
  <div class="box box-primary">
    <div class="box-header"><h3 class="box-title">Edit Tenant</h3></div>
    <div class="box-body">
      <form method="post" action="tenants_update.php">
        <input type="hidden" name="tenant_id" value="<?php echo $t['tenant_id']; ?>">
        <div class="form-group"><label>Nama</label><input type="text" name="tenant_name" class="form-control" value="<?php echo htmlspecialchars($t['tenant_name']); ?>"></div>
        <div class="form-group"><label>Kode</label><input type="text" name="tenant_code" class="form-control" value="<?php echo htmlspecialchars($t['tenant_code']); ?>"></div>
        <div class="form-group"><label>Status</label>
          <select name="tenant_status" class="form-control">
            <option <?php if($t['tenant_status']=='active') echo 'selected'; ?> value="active">active</option>
            <option <?php if($t['tenant_status']=='suspended') echo 'selected'; ?> value="suspended">suspended</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>