<?php include 'header.php'; $tenant=intval($_SESSION['tenant_id']); ?>
<section class="content">
<div class="box box-primary">
<div class="box-header"><h3>Transaksi Pembelian</h3></div>
<div class="box-body">
<form method="post" action="purchases_act.php">
<div class="row">
  <div class="col-md-3"><label>Tanggal</label><input type="date" name="date" class="form-control" required value="<?php echo date('Y-m-d'); ?>"></div>
  <div class="col-md-5"><label>Supplier</label>
    <select name="supplier_id" class="form-control" required>
      <option value="">- pilih -</option>
      <?php $sup=mysqli_query($koneksi,"SELECT * FROM suppliers WHERE tenant_id=$tenant ORDER BY name");
      while($s=mysqli_fetch_assoc($sup)){ echo '<option value="'.$s['id'].'">'.htmlspecialchars($s['name']).'</option>'; } ?>
    </select>
  </div>
</div>
<hr>
<table class="table table-bordered" id="items">
<thead><tr><th>Bahan</th><th>Qty</th><th>Harga</th><th>Subtotal</th><th></th></tr></thead>
<tbody>
<tr>
<td>
  <select name="items[0][material_id]" class="form-control" required>
    <option value="">- pilih -</option>
    <?php $mat=mysqli_query($koneksi,"SELECT * FROM materials WHERE tenant_id=$tenant ORDER BY name");
    while($m=mysqli_fetch_assoc($mat)){ echo '<option value="'.$m['id'].'">'.htmlspecialchars($m['name']).'</option>'; } ?>
  </select>
</td>
<td><input name="items[0][qty]" type="number" step="0.001" class="form-control" required></td>
<td><input name="items[0][unit_price]" type="number" step="0.01" class="form-control" required></td>
<td class="subtotal">0</td>
<td><button type="button" class="btn btn-xs btn-danger remove-row">X</button></td>
</tr>
</tbody>
</table>
<button type="button" id="add-row" class="btn btn-default btn-sm">Tambah Baris</button>
<hr>
<button class="btn btn-primary">Simpan</button>
<a href="purchases.php" class="btn btn-default">Batal</a>
</form>
</div>
</div>
</section>
<script>
document.getElementById('add-row').addEventListener('click', function(){
  var tbody = document.querySelector('#items tbody');
  var idx = tbody.querySelectorAll('tr').length;
  var row = document.createElement('tr');
  row.innerHTML = tbody.querySelector('tr').innerHTML.replaceAll('[0]', '['+idx+']');
  tbody.appendChild(row);
});
document.addEventListener('click', function(e){
  if(e.target && e.target.classList.contains('remove-row')){
    e.target.closest('tr').remove();
  }
});
</script>
<?php include 'footer.php'; ?>