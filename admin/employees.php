<?php include 'header.php'; ?>
<section class="content"><div class="box box-primary"><div class="box-header"><h3>Karyawan</h3><button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal_add">Tambah</button></div>
<div class="box-body"><table class="table table-bordered" id="table-datatable"><thead><tr><th>Nama</th><th>NIK</th><th>Role</th><th>Rate/Hari</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
<?php $t=intval($_SESSION['tenant_id']); $q=mysqli_query($koneksi,"SELECT * FROM employees WHERE tenant_id=$t ORDER BY id DESC");
while($d=mysqli_fetch_assoc($q)){ ?>
<tr><td><?php echo htmlspecialchars($d['name']); ?></td><td><?php echo htmlspecialchars($d['nik']); ?></td><td><?php echo htmlspecialchars($d['role']); ?></td><td><?php echo number_format($d['daily_rate']); ?></td><td><?php echo $d['is_active']?'Aktif':'Nonaktif'; ?></td>
<td><a class="btn btn-xs btn-primary" href="employees_edit.php?id=<?php echo $d['id']; ?>">Edit</a>
<a class="btn btn-xs btn-danger" onclick="return confirm('Hapus?')" href="employees_hapus.php?id=<?php echo $d['id']; ?>">Hapus</a></td></tr>
<?php } ?>
</tbody></table></div></div></section>
<div class="modal fade" id="modal_add"><div class="modal-dialog"><form method="post" action="employees_act.php"><div class="modal-content">
<div class="modal-header"><h4>Tambah Karyawan</h4></div>
<div class="modal-body">
<div class="form-group"><label>Nama</label><input name="name" class="form-control" required></div>
<div class="form-group"><label>NIK</label><input name="nik" class="form-control"></div>
<div class="form-group"><label>Role</label><input name="role" class="form-control"></div>
<div class="form-group"><label>Rate/Hari</label><input type="number" step="0.01" name="daily_rate" class="form-control" required></div>
<div class="form-group"><label>Tanggal Masuk</label><input type="date" name="hire_date" class="form-control" required value="<?php echo date('Y-m-d'); ?>"></div>
<div class="form-group"><label>Aktif?</label><select name="is_active" class="form-control"><option value="1">Aktif</option><option value="0">Nonaktif</option></select></div>
</div>
<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button><button class="btn btn-primary">Simpan</button></div>
</div></form></div></div>
<?php include 'footer.php'; ?>