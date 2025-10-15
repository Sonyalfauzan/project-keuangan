<?php include '../koneksi.php'; session_start(); $t=intval($_SESSION['tenant_id']);
$id=intval($_POST['id']); $date=$_POST['date']; $status=mysqli_real_escape_string($koneksi,$_POST['status']); $notes=mysqli_real_escape_string($koneksi,$_POST['notes']);
mysqli_query($koneksi,"UPDATE attendances SET date='$date', status='$status', notes='$notes' WHERE id=$id AND tenant_id=$t");
header("location:attendances.php"); ?>