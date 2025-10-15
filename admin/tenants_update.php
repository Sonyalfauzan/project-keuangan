<?php
include '../koneksi.php';
$id = intval($_POST['tenant_id']);
$name = mysqli_real_escape_string($koneksi,$_POST['tenant_name']);
$code = mysqli_real_escape_string($koneksi,$_POST['tenant_code']);
$status = mysqli_real_escape_string($koneksi,$_POST['tenant_status']);
mysqli_query($koneksi, "UPDATE tenants SET tenant_name='$name', tenant_code='$code', tenant_status='$status' WHERE tenant_id=$id");
header("location:tenants.php");
?>