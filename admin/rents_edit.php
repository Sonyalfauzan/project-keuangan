<?php include 'header.php'; $t=intval($_SESSION['tenant_id']); $id=intval($_GET['id']); $d=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM rents WHERE id=$id AND tenant_id=$t")); ?>
<section class="content"><div class="box box-primary"><div class="box-header"><h3>Edit Sewa</h3></div><div class="box-body">
<form method="post" action="rents_update.php">
<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
<div class="form-group"><label>Tanggal</label><input type="date" name="date" class="form-control" value="<?php echo $d['date']; ?>"></div>
<div class="form-group"><label>Vendor</label><input name="vendor" class="form-control" value="<?php echo htmlspecialchars($d['vendor']); ?>"></div>
<div class="form-group"><label>Periode Mulai</label><input type="date" name="period_start" class="form-control" value="<?php echo $d['period_start']; ?>"></div>
<div class="form-group"><label>Periode Selesai</label><input type="date" name="period_end" class="form-control" value="<?php echo $d['period_end']; ?>"></div>
<div class="form-group"><label>Nominal</label><input type="number" step="0.01" name="amount" class="form-control" value="<?php echo $d['amount']; ?>"></div>
<div class="form-group"><label>Keterangan</label><textarea name="notes" class="form-control"><?php echo htmlspecialchars($d['notes']); ?></textarea></div>
<button class="btn btn-primary">Update</button>
</form>
</div></div></section><?php include 'footer.php'; ?>