<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }

if(!isset($_SESSION['status'])){
  header("location:../index.php?alert=belum_login");
  exit();
}

// Ensure tenant_id is set. Default to 1 for backward compatibility.
if(!isset($_SESSION['tenant_id']) || !is_numeric($_SESSION['tenant_id'])){
  $_SESSION['tenant_id'] = 1;
}
$CURRENT_TENANT = intval($_SESSION['tenant_id']);

// Block suspended tenants (owner bypass)
include 'koneksi.php';
$owner = isset($_SESSION['is_owner']) && $_SESSION['is_owner'] == 1;
$cek = mysqli_query($koneksi, "SELECT tenant_status FROM tenants WHERE tenant_id='$CURRENT_TENANT' LIMIT 1");
if($cek && mysqli_num_rows($cek)>0){
  $row = mysqli_fetch_assoc($cek);
  if($row['tenant_status']=='suspended' && !$owner){
    die("<h3 style='padding:20px;color:red'>Akun tenant ini sedang ditangguhkan.</h3>");
  }
}
?>