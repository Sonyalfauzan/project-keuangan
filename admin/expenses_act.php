<?php include '../koneksi.php'; session_start(); $tenant=intval($_SESSION['tenant_id']);
$date=$_POST['date']; $cat=mysqli_real_escape_string($koneksi,$_POST['category']); $paid=mysqli_real_escape_string($koneksi,$_POST['paid_to']); $amt=floatval($_POST['amount']); $desc=mysqli_real_escape_string($koneksi,$_POST['description']);
mysqli_query($koneksi,"INSERT INTO expenses(tenant_id,date,category,paid_to,amount,description) VALUES($tenant,'$date','$cat','$paid',$amt,'$desc')");
header("location:expenses.php"); ?>