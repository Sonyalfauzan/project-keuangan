<?php
include '../koneksi.php';
$id = intval($_GET['id']);
mysqli_query($koneksi, "DELETE FROM tenants WHERE tenant_id=$id");
header("location:tenants.php");
?>