<?php include '../koneksi.php'; session_start(); $tenant=intval($_SESSION['tenant_id']);
$date = mysqli_real_escape_string($koneksi,$_POST['date']);
$supplier_id = intval($_POST['supplier_id']);
mysqli_query($koneksi,"INSERT INTO purchases(tenant_id, date, supplier_id, total_amount) VALUES($tenant,'$date',$supplier_id,0)");
$pid = mysqli_insert_id($koneksi);
$total = 0;
foreach($_POST['items'] as $it){
  $material_id = intval($it['material_id']);
  $qty = floatval($it['qty']);
  $price = floatval($it['unit_price']);
  $subtotal = $qty * $price;
  $total += $subtotal;
  mysqli_query($koneksi,"INSERT INTO purchase_items(purchase_id, material_id, qty, unit_price, line_total) VALUES($pid,$material_id,$qty,$price,$subtotal)");
}
mysqli_query($koneksi,"UPDATE purchases SET total_amount=$total WHERE id=$pid");
header("location:purchases_detail.php?id=".$pid);
?>