<?php include 'header.php'; $t=intval($_SESSION['tenant_id']); $id=intval($_GET['id']);
$h=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM payrolls WHERE id=$id AND tenant_id=$t"));
?>
<section class="content"><div class="box box-primary"><div class="box-header"><h3>Detail Payroll</h3></div><div class="box-body">
<p><b>Periode:</b> <?php echo $h['period_start'].' s/d '.$h['period_end']; ?> | <b>Total:</b> <?php echo number_format($h['total_amount']); ?></p>
<table class="table table-bordered"><thead><tr><th>Karyawan</th><th>Hadir</th><th>Rate</th><th>Jumlah</th></tr></thead><tbody>
<?php $q=mysqli_query($koneksi,"SELECT i.*, e.name emp FROM payroll_items i LEFT JOIN employees e ON e.id=i.employee_id WHERE payroll_id=$id");
while($d=mysqli_fetch_assoc($q)){ ?>
<tr><td><?php echo htmlspecialchars($d['emp']); ?></td><td><?php echo $d['days_present']; ?></td><td><?php echo number_format($d['daily_rate']); ?></td><td><?php echo number_format($d['amount']); ?></td></tr>
<?php } ?>
</tbody></table>
<a href="payrolls.php" class="btn btn-default">Kembali</a>
</div></div></section>
<?php include 'footer.php'; ?>