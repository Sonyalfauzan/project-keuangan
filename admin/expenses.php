<?php include 'header.php'; ?>
<section class="content">
<div class="box box-primary"><div class="box-header"><h3>Operasional</h3>
<button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal_add">Tambah</button></div>
<div class="box-body">
<table class="table table-bordered" id="table-datatable"><thead><tr><th>Tanggal</th><th>Kategori</th><th>Dibayar ke</th><th>Nominal</th><th>Aksi</th></tr></thead><tbody>
<?php $tenant=intval($_SESSION['tenant_id']); $q=mysqli_query($koneksi,"SELECT * FROM expenses WHERE tenant_id=$tenant ORDER BY date DESC");
while($d=mysqli_fetch_assoc($q)){ ?>
<tr><td><?php echo $d['date']; ?></td><td><?php echo htmlspecialchars($d['category']); ?></td><td><?php echo htmlspecialchars($d['paid_to']); ?></td><td><?php echo number_format($d['amount']); ?></td>
<td><a class="btn btn-xs btn-primary" href="expenses_edit.php?id=<?php echo $d['id']; ?>">Edit</a>
<a class="btn btn-xs btn-danger" onclick="return confirm('Hapus?')" href="expenses_hapus.php?id=<?php echo $d['id']; ?>">Hapus</a></td></tr>
<?php } ?>
</tbody></table>
</div></div></section>
<div class="modal fade" id="modal_add"><div class="modal-dialog"><form method="post" action="expenses_act.php"><div class="modal-content">
<div class="modal-header"><h4>Tambah Operasional</h4></div>
<div class="modal-body">
<div class="form-group"><label>Tanggal</label><input type="date" name="date" class="form-control" required value="<?php echo date('Y-m-d'); ?>"></div>
<div class="form-group"><label>Kategori</label><input name="category" class="form-control" required></div>
<div class="form-group"><label>Dibayar ke</label><input name="paid_to" class="form-control"></div>
<div class="form-group"><label>Nominal</label><input type="number" step="0.01" name="amount" class="form-control" required></div>
<div class="form-group"><label>Keterangan</label><textarea name="description" class="form-control"></textarea></div>
</div>
<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button><button class="btn btn-primary">Simpan</button></div>
</div></form></div></div>
<?php include 'footer.php'; ?>