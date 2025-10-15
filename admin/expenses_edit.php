<?php include 'header.php'; $tenant=intval($_SESSION['tenant_id']); $id=intval($_GET['id']); $d=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM expenses WHERE id=$id AND tenant_id=$tenant")); ?>
<section class="content"><div class="box box-primary"><div class="box-header"><h3>Edit Operasional</h3></div><div class="box-body">
<form method="post" action="expenses_update.php">
<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
<div class="form-group"><label>Tanggal</label><input type="date" name="date" class="form-control" value="<?php echo $d['date']; ?>"></div>
<div class="form-group"><label>Kategori</label><input name="category" class="form-control" value="<?php echo htmlspecialchars($d['category']); ?>"></div>
<div class="form-group"><label>Dibayar ke</label><input name="paid_to" class="form-control" value="<?php echo htmlspecialchars($d['paid_to']); ?>"></div>
<div class="form-group"><label>Nominal</label><input type="number" step="0.01" name="amount" class="form-control" value="<?php echo $d['amount']; ?>"></div>
<div class="form-group"><label>Keterangan</label><textarea name="description" class="form-control"><?php echo htmlspecialchars($d['description']); ?></textarea></div>
<button class="btn btn-primary">Update</button>
</form>
</div></div></section><?php include 'footer.php'; ?>