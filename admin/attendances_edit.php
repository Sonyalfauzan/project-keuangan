<?php include 'header.php'; $t=intval($_SESSION['tenant_id']); $id=intval($_GET['id']); $d=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM attendances WHERE id=$id AND tenant_id=$t")); ?>
<section class="content"><div class="box box-primary"><div class="box-header"><h3>Edit Absensi</h3></div><div class="box-body">
<form method="post" action="attendances_update.php"><input type="hidden" name="id" value="<?php echo $d['id']; ?>">
<div class="form-group"><label>Tanggal</label><input type="date" name="date" class="form-control" value="<?php echo $d['date']; ?>"></div>
<div class="form-group"><label>Status</label><select name="status" class="form-control">
<?php foreach(['present','absent','sick','leave'] as $s){ echo '<option '.($d['status']==$s?'selected':'').'>'.$s.'</option>'; } ?>
</select></div>
<div class="form-group"><label>Catatan</label><input name="notes" class="form-control" value="<?php echo htmlspecialchars($d['notes']); ?>"></div>
<button class="btn btn-primary">Update</button>
</form>
</div></div></section><?php include 'footer.php'; ?>