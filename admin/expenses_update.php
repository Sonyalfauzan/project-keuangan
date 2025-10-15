<?php include '../koneksi.php'; session_start(); $tenant=intval($_SESSION['tenant_id']);
$id=intval($_POST['id']); $date=$_POST['date']; $cat=mysqli_real_escape_string($koneksi,$_POST['category']); $paid=mysqli_real_escape_string($koneksi,$_POST['paid_to']); $amt=floatval($_POST['amount']); $desc=mysqli_real_escape_string($koneksi,$_POST['description']);
mysqli_query($koneksi,"UPDATE expenses SET date='$date', category='$cat', paid_to='$paid', amount=$amt, description='$desc' WHERE id=$id AND tenant_id=$tenant");
header("location:expenses.php"); ?>