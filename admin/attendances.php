<?php include 'header.php'; ?>
<section class="content"><div class="box box-primary"><div class="box-header"><h3>Absensi</h3><button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal_add">Tambah</button></div>
<div class="box-body"><table class="table table-bordered" id="table-datatable"><thead><tr><th>Tanggal</th><th>Karyawan</th><th>Status</th><th>Catatan</th><th>Aksi</th></tr></thead><tbody>
<?php $t=intval($_SESSION['tenant_id']);
$q=mysqli_query($koneksi,"SELECT a.*, e.name emp FROM attendances a LEFT JOIN employees e ON e.id=a.employee_id WHERE a.tenant_id=$t ORDER BY date DESC");
while($d=mysqli_fetch_assoc($q)){ ?>
<tr><td><?php echo $d['date']; ?></td><td><?php echo htmlspecialchars($d['emp']); ?></td><td><?php echo $d['status']; ?></td><td><?php echo htmlspecialchars($d['notes']); ?></td>
<td><a class="btn btn-xs btn-primary" href="attendances_edit.php?id=<?php echo $d['id']; ?>">Edit</a>
<a class="btn btn-xs btn-danger" onclick="return confirm('Hapus?')" href="attendances_hapus.php?id=<?php echo $d['id']; ?>">Hapus</a></td></tr>
<?php } ?>
</tbody></table></div></div></section>
<div class="modal fade" id="modal_add"><div class="modal-dialog"><form method="post" action="attendances_act.php"><div class="modal-content">
<div class="modal-header"><h4>Tambah Absensi</h4></div>
<div class="modal-body">
<div class="form-group"><label>Tanggal</label><input type="date" name="date" class="form-control" required value="<?php echo date('Y-m-d'); ?>"></div>
<div class="form-group"><label>Karyawan</label>
<select name="employee_id" class="form-control" required>
<option value="">- pilih -</option>
<?php $emps=mysqli_query($koneksi,"SELECT id,name FROM employees WHERE tenant_id=$t AND is_active=1 ORDER BY name");
while($e=mysqli_fetch_assoc($emps)){ echo '<option value="'.$e['id'].'">'.htmlspecialchars($e['name']).'</option>'; } ?>
</select></div>
<div class="form-group"><label>Status</label><select name="status" class="form-control"><option>present</option><option>absent</option><option>sick</option><option>leave</option></select></div>
<div class="form-group"><label>Catatan</label><input name="notes" class="form-control"></div>
</div>
<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button><button class="btn btn-primary">Simpan</button></div>
</div></form></div></div>
<?php include 'footer.php'; ?>