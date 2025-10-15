<?php include 'header.php'; ?>
<section class="content">
<div class="box box-primary">
<div class="box-header"><h3 class="box-title">Pembelian Harian</h3>
<a class="btn btn-primary btn-sm pull-right" href="purchases_tambah.php">Transaksi Baru</a></div>
<div class="box-body">
<table class="table table-bordered" id="table-datatable">
<thead><tr><th>Tanggal</th><th>Supplier</th><th>Total</th><th>Aksi</th></tr></thead>
<tbody>
<?php $tenant=intval($_SESSION['tenant_id']);
$q = mysqli_query($koneksi,"SELECT p.*, s.name supplier FROM purchases p LEFT JOIN suppliers s ON s.id=p.supplier_id WHERE p.tenant_id=$tenant ORDER BY p.date DESC, p.id DESC");
while($d=mysqli_fetch_assoc($q)){ ?>
<tr>
<td><?php echo $d['date']; ?></td>
<td><?php echo htmlspecialchars($d['supplier']); ?></td>
<td><?php echo number_format($d['total_amount']); ?></td>
<td>
  <a class="btn btn-xs btn-info" href="purchases_detail.php?id=<?php echo $d['id']; ?>">Detail</a>
  <a class="btn btn-xs btn-danger" href="purchases_hapus.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Hapus pembelian?')">Hapus</a>
</td>
</tr>
<?php } ?>
</tbody></table>
</div></div></section>
<?php include 'footer.php'; ?>