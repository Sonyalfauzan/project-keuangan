<?php include '../koneksi.php'; session_start(); $tenant=intval($_SESSION['tenant_id']); $id=intval($_GET['id']);
mysqli_query($koneksi,"DELETE FROM suppliers WHERE id=$id AND tenant_id=$tenant");
header("location:suppliers.php"); ?>