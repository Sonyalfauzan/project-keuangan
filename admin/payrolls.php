<?php include 'header.php'; ?>
<section class="content"><div class="box box-primary"><div class="box-header"><h3>Gaji Karyawan (Harian)</h3>
<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#modal_gen">Generate</button></div>
<div class="box-body"><table class="table table-bordered" id="table-datatable"><thead><tr><th>Periode</th><th>Diproses</th><th>Total</th><th>Aksi</th></tr></thead><tbody>
<?php $t=intval($_SESSION['tenant_id']); $q=mysqli_query($koneksi,"SELECT * FROM payrolls WHERE tenant_id=$t ORDER BY period_end DESC");
while($d=mysqli_fetch_assoc($q)){ ?>
<tr><td><?php echo $d['period_start'].' s/d '.$d['period_end']; ?></td><td><?php echo $d['processed_at']; ?></td><td><?php echo number_format($d['total_amount']); ?></td>
<td><a class="btn btn-xs btn-info" href="payrolls_detail.php?id=<?php echo $d['id']; ?>">Detail</a>
<a class="btn btn-xs btn-danger" onclick="return confirm('Hapus?')" href="payrolls_hapus.php?id=<?php echo $d['id']; ?>">Hapus</a></td></tr>
<?php } ?>
</tbody></table></div></div></section>

<div class="modal fade" id="modal_gen"><div class="modal-dialog"><form method="post" action="payrolls_generate.php"><div class="modal-content">
<div class="modal-header"><h4>Generate Payroll</h4></div>
<div class="modal-body">
<div class="form-group"><label>Periode Mulai</label><input type="date" name="period_start" class="form-control" required></div>
<div class="form-group"><label>Periode Selesai</label><input type="date" name="period_end" class="form-control" required></div>
</div>
<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button><button class="btn btn-success">Generate</button></div>
</div></form></div></div>
<?php include 'footer.php'; ?>