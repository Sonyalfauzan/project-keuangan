<?php include '../koneksi.php'; session_start(); $t=intval($_SESSION['tenant_id']);
$id=intval($_POST['id']); $name=mysqli_real_escape_string($koneksi,$_POST['name']); $nik=mysqli_real_escape_string($koneksi,$_POST['nik']); $role=mysqli_real_escape_string($koneksi,$_POST['role']); $rate=floatval($_POST['daily_rate']); $hire=$_POST['hire_date']; $act=intval($_POST['is_active']);
mysqli_query($koneksi,"UPDATE employees SET name='$name', nik='$nik', role='$role', daily_rate=$rate, hire_date='$hire', is_active=$act WHERE id=$id AND tenant_id=$t");
header("location:employees.php"); ?>