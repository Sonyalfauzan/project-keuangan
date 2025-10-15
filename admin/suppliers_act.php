<?php include '../koneksi.php'; session_start(); $tenant=intval($_SESSION['tenant_id']);
$name=mysqli_real_escape_string($koneksi,$_POST['name']);
$cp=mysqli_real_escape_string($koneksi,$_POST['contact_person']);
$phone=mysqli_real_escape_string($koneksi,$_POST['phone']);
$email=mysqli_real_escape_string($koneksi,$_POST['email']);
$npwp=mysqli_real_escape_string($koneksi,$_POST['npwp']);
$addr=mysqli_real_escape_string($koneksi,$_POST['address']);
mysqli_query($koneksi,"INSERT INTO suppliers(tenant_id,name,contact_person,phone,email,npwp,address) VALUES($tenant,'$name','$cp','$phone','$email','$npwp','$addr')");
header("location:suppliers.php"); ?>