<?php 
	$id = $_GET['kd'];
	include '../config/koneksi.php';
	$data1=mysqli_query($koneksi,"SELECT * FROM pesanan where kd_order = '$id' ");
	$data=mysqli_fetch_array($data1);

	$data2=mysqli_query($koneksi,"SELECT * FROM detail_order where kd_user = '$data[1]' and kd_order = '$id'");
	$result=mysqli_fetch_array($data2);

	$data3=mysqli_query($koneksi,"SELECT * FROM produk where kd_produk = '$result[1]'");
	$produk = mysqli_fetch_array($data3);
?>
<div class="container">
  <div class="row">
    <div class="col">
     <div class="p-3  ">
     	<strong><h3>Informasi Pelanggan</h3></strong>
     	<hr width="50%" noshade size="5%" color="black">
     	<p>Nama 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?= $data[2]?></p>
     	<p>Alamat  &nbsp;&nbsp;&nbsp;:&nbsp;<?= $data[3]?> - <?= $data[4]?></p>
     	<p>Nomor Telepon  : <?= $data[6]; ?></p>
     </div>
   </div>

     <div class="col">
     	<div class="p-3">
     			<strong><h3>Status Pembayaran</h3></strong>
     			<hr width="25%" noshade size="5%" color="black">
     			<?php 
     			$status= $data[8];
     			if ($status =='Menunggu') {
     			?>
     			<h2 class="btn btn-warning">Menunggu</h2>
     		<?php }elseif($status =='Batal'){
     			?>
     			<h2 class="btn btn-danger">Batal</h2>
     		<?php }elseif($status =='Selesai'){
     			?>
     			<h2 class="btn btn-success">Selesai</h2>
     		<?php }elseif($status =='Proses'){
     			?>
     			<h2 class="btn btn-info">Proses</h2>
     		<?php } ?>
     		</div>
     	</div>
	</div>

<table class="table table-striped" style="border-color: #34495e;">
	<tr >
		<td>#</td>
		<td>Produk</td>
		<td>Harga</td>
		<td>Jumlah</td>
		<td align="center">Subtotal</td>
		</tr>
	<?php 
		$data0=mysqli_query($koneksi,"SELECT * FROM detail_order where kd_order = '$id'");
		$no=0;
		while ($result=mysqli_fetch_array($data0)) {
		$no++;
		$data3=mysqli_query($koneksi,"SELECT * FROM pesanan where kd_order = '$id' ");
		$data2=mysqli_fetch_array($data3);

		$data4=mysqli_query($koneksi,"SELECT * FROM produk where kd_produk = '$result[1]'");
		$produ = mysqli_fetch_array($data4);
		
		$qty = $result[2];

		$harga = @$produ[5];
		$ongkir = $data[5];
		$subtotal = ($qty * $harga) + $ongkir;
	?>
		<tr>
		<td style="border:0px;"><?= $no ?></td>
		<td style="border:0px;"><?= $produ[1] ?></td>
		<td style="border:0px;"><?= rupiah($produ[4]) ?></td>
		<td style="border:0px;"><?= $result[2]?></td>
		<td style="border:0px;" align="center"><?= rupiah($produ[4]) ?></td>	
		</tr>		

<?php 

} 
?>
<tr>
	<td colspan="4"><strong> Total :</strong> </td>
	<td  align="center"><h4><?=rupiah($subtotal)?></h4></td>
</tr>

<?php 
if (isset($_POST['Proses'])) {
	$Proses=mysqli_query($koneksi,"UPDATE pesanan SET status ='Proses' where kd_order= '$id'");
	// var_dump($process) or die();

	echo "<script> alert('Status berhasil diubah menjadi proses');</script>";
	echo "<script> document.location.href='dashboard.php?details&edit&kd=$id';</script>";
}
if (isset($_POST['Batal'])) {
	$Batal=mysqli_query($koneksi,"UPDATE pesanan SET status ='Batal' where kd_order= '$id'");
	// var_dump($suspend) or die();

	echo "<script> alert('Status berhasil diubah menjadi batal');</script>";
	echo "<script> document.location.href='dashboard.php?details&edit&kd=$id';</script>";
}
if (isset($_POST['Selesai'])) {
	$Selesai=mysqli_query($koneksi,"UPDATE pesanan SET status ='Selesai' where kd_order= '$id'");
	// var_dump($done) or die();

	echo "<script> alert('Status berhasil diubah menjadi selesai');</script>";
	echo "<script> document.location.href='dashboard.php?details&edit&kd=$id';</script>";
}

?>

<form method="POST">
<tr>
	<td colspan="4">
		<center>
			<input class="btn btn-success" type="submit" value="Selesai" name="Selesai" >
			<input class="btn btn-info" type="submit" value="Proses" name="Proses">
			<input class="btn btn-danger" type="submit" value="Batal" name="Batal">
			<a class="btn btn-primary" href="dashboard.php?ship">Kembali</a>
		</center>
</td>
<td></td>
</tr>
</form>
</table>
<a href="../uploads/bukti/<?= $data2[4]?>" target="_blank"><img src="../uploads/bukti/<?= $data2[4]?>"></a>
</div>