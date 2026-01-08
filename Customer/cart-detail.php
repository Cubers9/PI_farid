<!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <div class="container">

 -->
<br>
<br>
<br>
<?php 
// session_start();
   if (@!$_SESSION['keranjang']) {


// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";
?>
<br>
<br>
<br>
<br>
<br>
<center>

<h1>
  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
  <strong>Keranjang masih kosong</strong>
</h1>
<a href="dashboard.php?paket"><u>Pilih Paket</u></a>
</center>
<br>
<br>
<br>
<br>
<br>

<?php  } else{ ?>

<table class="table">
	<tr align="center">
		<td>No.</td>
		<td>Produk</td>
		<td>Detail</td>
		<td>Jumlah</td>
		<td>Subtotal</td>
		<td align="center">#</td>
	</tr>
	<?php

$no= 0;
$subtotal=0;
$jum=0;
   foreach ($_SESSION['keranjang'] as $data => $jumlah) {
    $sql=mysqli_query($koneksi,"SELECT * FROM produk where kd_produk = '$data'");
    $tampil=mysqli_fetch_array($sql);
    $total=$tampil[4]*$jumlah;
    $no++;
  ?>
  <tr >
      <th scope="row"><?php echo $no; ?></th>
      <td width="5%"><img src="../uploads/produk/<?php echo $tampil[3]?>" style="width: 5cm; height: auto;"></td>
      <td width="55%">
      	<?php echo $tampil[2]?>
      	<br>
      	<p><?=Rupiah($tampil[4])?></p>
      </td>

      <td align="center"><?php echo $jumlah?></td>
      <td align="center"><?=Rupiah($total)?></td>
      

      <td align="center">
        <a href="hapus-cart.php?id=<?php echo $tampil[0]?>" class="btn btn-danger" onclick="return confirm('Yakin Membatalkan pesanan ?')">Batal</a> </td>
    </tr>
<?php 
$subtotal+=$total;
}
?>
<tr>
	<td >Total</td>
	<td colspan="3"></td>
	<td ><?=rupiah($subtotal)?></td>
	<td></td>
</tr>
<tr>
</tr>
</table>
<form method="POST" action="dashboard.php?checkout">
  <?php 
  $id = $_SESSION['kd_user'];
  $data = mysqli_query($koneksi,"SELECT * FROM user where kd_user = '$id'");
  $fetch = mysqli_fetch_array($data);
  ?>
  <table>
<tr>
  <td>Nama Pemesan</td>
  <td width="25%">
    <input type="text" name="nama_pemesan"class="form-control" value="<?=$fetch[2]?>" required>
    <input type="text" name="notlp"class="form-control" value="<?=$fetch[3]?>" hidden>
  </td>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td>Tanggal Pesan</td>
  <td><input type="date" name="tanggal_pemesan" class="form-control" required></td>
  <td>&nbsp;&nbsp;&nbsp;</td>
  <td rowspan="3" width="10%"><input type="submit" class="btn btn-info" value="Lanjut" style="width: 165%;"></td>
</tr>
<tr>
  <td><br></td>
</tr>
<tr>
  <td>Alamat Acara</td>
  <td width="25%"><input type="text" name="address" class="form-control" required value="<?=$fetch[4]?>"></td>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td>Mulai Acara</td>
  <td><input type="time" name="time" class="form-control" required></td>
</tr>
</form>
</table>
<?php }?>
<br>
<br>
<br>
<br>
<br>