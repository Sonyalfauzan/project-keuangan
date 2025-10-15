<?php include '../koneksi.php'; session_start(); $t=intval($_SESSION['tenant_id']); $id=intval($_GET['id']);
mysqli_query($koneksi,"DELETE FROM payroll_items WHERE payroll_id=$id");
mysqli_query($koneksi,"DELETE FROM payrolls WHERE id=$id AND tenant_id=$t");
header("location:payrolls.php"); ?>