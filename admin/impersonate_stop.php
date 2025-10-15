<?php
// admin/impersonate_stop.php
session_start();
if($_SESSION['level'] != 'administrator'){
  die('Unauthorized');
}
unset($_SESSION['impersonating']);
$_SESSION['tenant_id'] = 1;
header("Location: index.php?alert=impersonate_off");
?>