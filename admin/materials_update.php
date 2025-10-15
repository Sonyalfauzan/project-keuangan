<?php include '../koneksi.php'; session_start(); $tenant=intval($_SESSION['tenant_id']);
$id=intval($_POST['id']);
$name=mysqli_real_escape_string($koneksi,$_POST['name']);
$sku=mysqli_real_escape_string($koneksi,$_POST['sku']);
$unit=mysqli_real_escape_string($koneksi,$_POST['unit']);
$min=mysqli_real_escape_string($koneksi,$_POST['min_stock']);
$desc=mysqli_real_escape_string($koneksi,$_POST['description']);
mysqli_query($koneksi,"UPDATE materials SET name='$name', sku='$sku', unit='$unit', min_stock='$min', description='$desc' WHERE id=$id AND tenant_id=$tenant");
header("location:materials.php"); ?>