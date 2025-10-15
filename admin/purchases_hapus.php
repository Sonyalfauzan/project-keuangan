<?php include '../koneksi.php'; session_start(); $tenant=intval($_SESSION['tenant_id']); $id=intval($_GET['id']);
mysqli_query($koneksi,"DELETE FROM purchase_items WHERE purchase_id=$id");
mysqli_query($koneksi,"DELETE FROM purchases WHERE id=$id AND tenant_id=$tenant");
header("location:purchases.php"); ?>