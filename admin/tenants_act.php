<?php
include '../koneksi.php';
$tenant_name = mysqli_real_escape_string($koneksi, $_POST['tenant_name']);
$tenant_code = mysqli_real_escape_string($koneksi, $_POST['tenant_code']);
mysqli_query($koneksi, "INSERT INTO tenants(tenant_name, tenant_code, tenant_status) VALUES('$tenant_name','$tenant_code','active')");
header("location:tenants.php");
?>