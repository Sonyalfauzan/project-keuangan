<?php include 'header.php'; $t=intval($_SESSION['tenant_id']); $id=intval($_GET['id']); $d=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM employees WHERE id=$id AND tenant_id=$t")); ?>
<section class="content"><div class="box box-primary"><div class="box-header"><h3>Edit Karyawan</h3></div><div class="box-body">
<form method="post" action="employees_update.php"><input type="hidden" name="id" value="<?php echo $d['id']; ?>">
<div class="form-group"><label>Nama</label><input name="name" class="form-control" value="<?php echo htmlspecialchars($d['name']); ?>"></div>
<div class="form-group"><label>NIK</label><input name="nik" class="form-control" value="<?php echo htmlspecialchars($d['nik']); ?>"></div>
<div class="form-group"><label>Role</label><input name="role" class="form-control" value="<?php echo htmlspecialchars($d['role']); ?>"></div>
<div class="form-group"><label>Rate/Hari</label><input type="number" step="0.01" name="daily_rate" class="form-control" value="<?php echo $d['daily_rate']; ?>"></div>
<div class="form-group"><label>Tanggal Masuk</label><input type="date" name="hire_date" class="form-control" value="<?php echo $d['hire_date']; ?>"></div>
<div class="form-group"><label>Aktif?</label><select name="is_active" class="form-control"><option value="1" <?php if($d['is_active']) echo 'selected'; ?>>Aktif</option><option value="0" <?php if(!$d['is_active']) echo 'selected'; ?>>Nonaktif</option></select></div>
<button class="btn btn-primary">Update</button>
</form>
</div></div></section><?php include 'footer.php'; ?>