<?php include '../koneksi.php'; session_start(); $t=intval($_SESSION['tenant_id']);
$ps=$_POST['period_start']; $pe=$_POST['period_end'];
mysqli_query($koneksi,"INSERT INTO payrolls(tenant_id,period_start,period_end,processed_at,total_amount) VALUES($t,'$ps','$pe',NOW(),0)");
$pid=mysqli_insert_id($koneksi);
$total=0;
$emps=mysqli_query($koneksi,"SELECT id,daily_rate FROM employees WHERE tenant_id=$t AND is_active=1");
while($e=mysqli_fetch_assoc($emps)){
  $days = 0;
  $c=mysqli_query($koneksi,"SELECT COUNT(1) c FROM attendances WHERE tenant_id=$t AND employee_id=".$e['id']." AND date BETWEEN '$ps' AND '$pe' AND status='present'");
  if($c){ $days=intval(mysqli_fetch_assoc($c)['c']); }
  $amount = $days*floatval($e['daily_rate']);
  mysqli_query($koneksi,"INSERT INTO payroll_items(payroll_id,employee_id,days_present,daily_rate,amount) VALUES($pid,".$e['id'].",$days,".floatval($e['daily_rate']).",$amount)");
  $total += $amount;
}
mysqli_query($koneksi,"UPDATE payrolls SET total_amount=$total WHERE id=$pid");
header("location:payrolls_detail.php?id=".$pid);
?>