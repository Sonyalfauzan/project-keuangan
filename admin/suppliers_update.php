<?php include '../koneksi.php'; session_start(); $tenant=intval($_SESSION['tenant_id']);
$id=intval($_POST['id']);
$name=mysqli_real_escape_string($koneksi,$_POST['name']);
$cp=mysqli_real_escape_string($koneksi,$_POST['contact_person']);
$phone=mysqli_real_escape_string($koneksi,$_POST['phone']);
$email=mysqli_real_escape_string($koneksi,$_POST['email']);
$npwp=mysqli_real_escape_string($koneksi,$_POST['npwp']);
$addr=mysqli_real_escape_string($koneksi,$_POST['address']);
mysqli_query($koneksi,"UPDATE suppliers SET name='$name', contact_person='$cp', phone='$phone', email='$email', npwp='$npwp', address='$addr' WHERE id=$id AND tenant_id=$tenant");
header("location:suppliers.php"); ?>