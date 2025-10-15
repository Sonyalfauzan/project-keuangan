<?php include '../koneksi.php'; session_start(); $t=intval($_SESSION['tenant_id']);
$id=intval($_POST['id']); $date=$_POST['date']; $vendor=mysqli_real_escape_string($koneksi,$_POST['vendor']); $ps=$_POST['period_start']; $pe=$_POST['period_end']; $amt=floatval($_POST['amount']); $notes=mysqli_real_escape_string($koneksi,$_POST['notes']);
mysqli_query($koneksi,"UPDATE rents SET date='$date', vendor='$vendor', period_start='$ps', period_end='$pe', amount=$amt, notes='$notes' WHERE id=$id AND tenant_id=$t");
header("location:rents.php"); ?>