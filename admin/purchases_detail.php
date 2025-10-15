<?php include 'header.php'; $tenant=intval($_SESSION['tenant_id']); $id=intval($_GET['id']);
$h = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT p.*, s.name supplier FROM purchases p LEFT JOIN suppliers s ON s.id=p.supplier_id WHERE p.id=$id AND p.tenant_id=$tenant"));
?>
<section class="content">
<div class="box box-primary">
<div class="box-header"><h3>Detail Pembelian</h3></div>
<div class="box-body">
<p><b>Tanggal:</b> <?php echo $h['date']; ?> | <b>Supplier:</b> <?php echo htmlspecialchars($h['supplier']); ?> | <b>Total:</b> <?php echo number_format($h['total_amount']); ?></p>
<table class="table table-bordered">
<thead><tr><th>Bahan</th><th>Qty</th><th>Harga</th><th>Subtotal</th></tr></thead>
<tbody>
<?php $it = mysqli_query($koneksi,"SELECT i.*, m.name material FROM purchase_items i LEFT JOIN materials m ON m.id=i.material_id WHERE i.purchase_id=$id");
while($d=mysqli_fetch_assoc($it)){ ?>
<tr><td><?php echo htmlspecialchars($d['material']); ?></td><td><?php echo $d['qty']; ?></td><td><?php echo number_format($d['unit_price']); ?></td><td><?php echo number_format($d['line_total']); ?></td></tr>
<?php } ?>
</tbody>
</table>
<a href="purchases.php" class="btn btn-default">Kembali</a>
</div></div></section>
<?php include 'footer.php'; ?>