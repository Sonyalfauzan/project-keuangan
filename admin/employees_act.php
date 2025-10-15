<?php include '../koneksi.php'; session_start(); $t=intval($_SESSION['tenant_id']);
$name=mysqli_real_escape_string($koneksi,$_POST['name']); $nik=mysqli_real_escape_string($koneksi,$_POST['nik']); $role=mysqli_real_escape_string($koneksi,$_POST['role']); $rate=floatval($_POST['daily_rate']); $hire=$_POST['hire_date']; $act=intval($_POST['is_active']);
mysqli_query($koneksi,"INSERT INTO employees(tenant_id,name,nik,role,daily_rate,hire_date,is_active) VALUES($t,'$name','$nik','$role',$rate,'$hire',$act)");
header("location:employees.php"); ?>