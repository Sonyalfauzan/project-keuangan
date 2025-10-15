<?php include 'header.php'; $t=intval($_SESSION['tenant_id']); $id=intval($_GET['id']); $d=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM officers WHERE id=$id AND tenant_id=$t")); ?>
<section class="content"><div class="box box-primary"><div class="box-header"><h3>Edit Pengurus</h3></div><div class="box-body">
<form method="post" action="officers_update.php"><input type="hidden" name="id" value="<?php echo $d['id']; ?>">
<div class="form-group"><label>Nama</label><input name="name" class="form-control" value="<?php echo htmlspecialchars($d['name']); ?>"></div>
<div class="form-group"><label>Jabatan</label><input name="position" class="form-control" value="<?php echo htmlspecialchars($d['position']); ?>"></div>
<div class="form-group"><label>Mulai</label><input type="date" name="start_date" class="form-control" value="<?php echo $d['start_date']; ?>"></div>
<div class="form-group"><label>Selesai</label><input type="date" name="end_date" class="form-control" value="<?php echo $d['end_date']; ?>"></div>
<div class="form-group"><label>Telepon</label><input name="phone" class="form-control" value="<?php echo htmlspecialchars($d['phone']); ?>"></div>
<div class="form-group"><label>Email</label><input name="email" class="form-control" value="<?php echo htmlspecialchars($d['email']); ?>"></div>
<button class="btn btn-primary">Update</button>
</form>
</div></div></section><?php include 'footer.php'; ?>