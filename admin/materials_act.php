<?php include '../koneksi.php'; session_start(); $tenant=intval($_SESSION['tenant_id']);
$name=mysqli_real_escape_string($koneksi,$_POST['name']);
$sku=mysqli_real_escape_string($koneksi,$_POST['sku']);
$unit=mysqli_real_escape_string($koneksi,$_POST['unit']);
$min=mysqli_real_escape_string($koneksi,$_POST['min_stock']);
$desc=mysqli_real_escape_string($koneksi,$_POST['description']);
mysqli_query($koneksi,"INSERT INTO materials(tenant_id,name,sku,unit,min_stock,description) VALUES($tenant,'$name','$sku','$unit','$min','$desc')");
header("location:materials.php"); ?>