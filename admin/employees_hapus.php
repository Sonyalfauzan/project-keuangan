<?php include '../koneksi.php'; session_start(); $t=intval($_SESSION['tenant_id']); $id=intval($_GET['id']);
mysqli_query($koneksi,"DELETE FROM employees WHERE id=$id AND tenant_id=$t");
header("location:employees.php"); ?>