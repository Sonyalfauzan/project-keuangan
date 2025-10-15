<?php include '../koneksi.php'; session_start(); $t=intval($_SESSION['tenant_id']);
$date=$_POST['date']; $vendor=mysqli_real_escape_string($koneksi,$_POST['vendor']); $ps=$_POST['period_start']; $pe=$_POST['period_end']; $amt=floatval($_POST['amount']); $notes=mysqli_real_escape_string($koneksi,$_POST['notes']);
mysqli_query($koneksi,"INSERT INTO rents(tenant_id,date,vendor,period_start,period_end,amount,notes) VALUES($t,'$date','$vendor','$ps','$pe',$amt,'$notes')");
header("location:rents.php"); ?>