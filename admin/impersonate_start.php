<?php
// admin/impersonate_start.php
include '../koneksi.php';
session_start();
if($_SESSION['level'] != 'administrator'){
  die('Unauthorized');
}
if(!isset($_GET['tenant'])){ die('tenant required'); }
$tenant = intval($_GET['tenant']);
$_SESSION['tenant_id'] = $tenant;
$_SESSION['impersonating'] = 1;
header("Location: index.php?alert=impersonate_on");
?>