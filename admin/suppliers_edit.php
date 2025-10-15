<?php include 'header.php'; $id=intval($_GET['id']); $tenant=intval($_SESSION['tenant_id']);
$q=mysqli_query($koneksi,"SELECT * FROM suppliers WHERE id=$id AND tenant_id=$tenant"); $d=mysqli_fetch_assoc($q); ?>
<section class="content"><div class="box box-primary"><div class="box-header"><h3>Edit Supplier</h3></div>
<div class="box-body">
<form method="post" action="suppliers_update.php">
<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
<div class="form-group"><label>Nama</label><input name="name" class="form-control" value="<?php echo htmlspecialchars($d['name']); ?>"></div>
<div class="form-group"><label>Kontak</label><input name="contact_person" class="form-control" value="<?php echo htmlspecialchars($d['contact_person']); ?>"></div>
<div class="form-group"><label>Telp</label><input name="phone" class="form-control" value="<?php echo htmlspecialchars($d['phone']); ?>"></div>
<div class="form-group"><label>Email</label><input name="email" class="form-control" value="<?php echo htmlspecialchars($d['email']); ?>"></div>
<div class="form-group"><label>NPWP</label><input name="npwp" class="form-control" value="<?php echo htmlspecialchars($d['npwp']); ?>"></div>
<div class="form-group"><label>Alamat</label><textarea name="address" class="form-control"><?php echo htmlspecialchars($d['address']); ?></textarea></div>
<button class="btn btn-primary">Update</button>
</form>
</div></div></section>
<?php include 'footer.php'; ?>