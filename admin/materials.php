<?php include 'header.php'; ?>
<section class="content">
<div class="box box-primary">
<div class="box-header"><h3 class="box-title">Bahan Baku</h3>
<button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal_add">Tambah</button></div>
<div class="box-body">
<table class="table table-bordered" id="table-datatable">
<thead><tr><th>Nama</th><th>SKU</th><th>Satuan</th><th>Min Stok</th><th>Aksi</th></tr></thead>
<tbody>
<?php 
$tenant = intval($_SESSION['tenant_id']);
$data = mysqli_query($koneksi,"SELECT * FROM materials WHERE tenant_id=$tenant ORDER BY id DESC");
while($d=mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?php echo htmlspecialchars($d['name']); ?></td>
<td><?php echo htmlspecialchars($d['sku']); ?></td>
<td><?php echo htmlspecialchars($d['unit']); ?></td>
<td><?php echo htmlspecialchars($d['min_stock']); ?></td>
<td>
  <a class="btn btn-xs btn-primary" href="materials_edit.php?id=<?php echo $d['id']; ?>">Edit</a>
  <a class="btn btn-xs btn-danger" onclick="return confirm('Hapus?')" href="materials_hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div></div></section>

<div class="modal fade" id="modal_add">
  <div class="modal-dialog">
  <form method="post" action="materials_act.php">
  <div class="modal-content">
    <div class="modal-header"><h4>Tambah Bahan Baku</h4></div>
    <div class="modal-body">
      <div class="form-group"><label>Nama</label><input name="name" class="form-control" required></div>
      <div class="form-group"><label>SKU</label><input name="sku" class="form-control" required></div>
      <div class="form-group"><label>Satuan</label><input name="unit" class="form-control" required></div>
      <div class="form-group"><label>Min Stok</label><input name="min_stock" type="number" step="0.001" class="form-control" value="0"></div>
      <div class="form-group"><label>Deskripsi</label><textarea name="description" class="form-control"></textarea></div>
    </div>
    <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button><button class="btn btn-primary">Simpan</button></div>
  </div>
  </form>
  </div>
</div>
<?php include 'footer.php'; ?>