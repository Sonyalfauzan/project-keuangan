<?php include 'header.php'; ?>
<section class="content"><div class="box box-primary"><div class="box-header"><h3>Pengurus Yayasan</h3><button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal_add">Tambah</button></div>
<div class="box-body"><table class="table table-bordered" id="table-datatable"><thead><tr><th>Nama</th><th>Jabatan</th><th>Mulai</th><th>Selesai</th><th>Aksi</th></tr></thead><tbody>
<?php $t=intval($_SESSION['tenant_id']); $q=mysqli_query($koneksi,"SELECT * FROM officers WHERE tenant_id=$t ORDER BY id DESC");
while($d=mysqli_fetch_assoc($q)){ ?>
<tr><td><?php echo htmlspecialchars($d['name']); ?></td><td><?php echo htmlspecialchars($d['position']); ?></td><td><?php echo $d['start_date']; ?></td><td><?php echo $d['end_date']; ?></td>
<td><a class="btn btn-xs btn-primary" href="officers_edit.php?id=<?php echo $d['id']; ?>">Edit</a>
<a class="btn btn-xs btn-danger" onclick="return confirm('Hapus?')" href="officers_hapus.php?id=<?php echo $d['id']; ?>">Hapus</a></td></tr>
<?php } ?>
</tbody></table></div></div></section>
<div class="modal fade" id="modal_add"><div class="modal-dialog"><form method="post" action="officers_act.php"><div class="modal-content">
<div class="modal-header"><h4>Tambah Pengurus</h4></div>
<div class="modal-body">
<div class="form-group"><label>Nama</label><input name="name" class="form-control" required></div>
<div class="form-group"><label>Jabatan</label><input name="position" class="form-control" required></div>
<div class="form-group"><label>Mulai</label><input type="date" name="start_date" class="form-control" required></div>
<div class="form-group"><label>Selesai</label><input type="date" name="end_date" class="form-control"></div>
<div class="form-group"><label>Telepon</label><input name="phone" class="form-control"></div>
<div class="form-group"><label>Email</label><input name="email" class="form-control"></div>
</div>
<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button><button class="btn btn-primary">Simpan</button></div>
</div></form></div></div>
<?php include 'footer.php'; ?>