<?php include '../koneksi.php'; session_start(); $t=intval($_SESSION['tenant_id']);
$emp=intval($_POST['employee_id']); $date=$_POST['date']; $status=mysqli_real_escape_string($koneksi,$_POST['status']); $notes=mysqli_real_escape_string($koneksi,$_POST['notes']);
mysqli_query($koneksi,"INSERT INTO attendances(tenant_id,employee_id,date,status,notes) VALUES($t,$emp,'$date','$status','$notes')");
header("location:attendances.php"); ?>