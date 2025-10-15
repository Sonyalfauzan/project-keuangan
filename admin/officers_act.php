<?php include '../koneksi.php'; session_start(); $t=intval($_SESSION['tenant_id']);
$name=mysqli_real_escape_string($koneksi,$_POST['name']); $pos=mysqli_real_escape_string($koneksi,$_POST['position']); $sd=$_POST['start_date']; $ed=$_POST['end_date']; $phone=mysqli_real_escape_string($koneksi,$_POST['phone']); $email=mysqli_real_escape_string($koneksi,$_POST['email']);
mysqli_query($koneksi,"INSERT INTO officers(tenant_id,name,position,start_date,end_date,phone,email) VALUES($t,'$name','$pos','$sd','$ed','$phone','$email')");
header("location:officers.php"); ?>