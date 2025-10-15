<?php include 'header.php'; $tenant=intval($_SESSION['tenant_id']); $id=intval($_GET['id']);
$d=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM materials WHERE id=$id AND tenant_id=$tenant"));
?>
<section class="content"><div class="box box-primary"><div class="box-header"><h3>Edit Bahan Baku</h3></div>
<div class="box-body">
<form method="post" action="materials_update.php">
<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
<div class="form-group"><label>Nama</label><input name="name" class="form-control" value="<?php echo htmlspecialchars($d['name']); ?>"></div>
<div class="form-group"><label>SKU</label><input name="sku" class="form-control" value="<?php echo htmlspecialchars($d['sku']); ?>"></div>
<div class="form-group"><label>Satuan</label><input name="unit" class="form-control" value="<?php echo htmlspecialchars($d['unit']); ?>"></div>
<div class="form-group"><label>Min Stok</label><input name="min_stock" class="form-control" value="<?php echo htmlspecialchars($d['min_stock']); ?>"></div>
<div class="form-group"><label>Deskripsi</label><textarea name="description" class="form-control"><?php echo htmlspecialchars($d['description']); ?></textarea></div>
<button class="btn btn-primary">Update</button>
</form>
</div></div></section>
<?php include 'footer.php'; ?>