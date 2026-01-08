<?php 
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gurat lensa | Faktur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body onload="print()">
  <br>

<center>
    <h1>Faktur</h1>
    <hr noshade size="10%" color="blue">
</center>
<div class="container">
		<?php 
		function rupiah($angka){
        $hasil = "IDR. " . number_format($angka,2,',','.');
        return $hasil;
    }

		$id = $_GET['kd'];
		include '../config/koneksi.php';
		$data1=mysqli_query($koneksi,"SELECT * FROM pesanan where kd_order = '$id' ");
		$data=mysqli_fetch_array($data1);

		$data2=mysqli_query($koneksi,"SELECT * FROM detail_order where kd_user = '$data[1]' and kd_order = '$id'");
		$result=mysqli_fetch_array($data2);

		$data3=mysqli_query($koneksi,"SELECT * FROM produk where kd_produk = '$result[1]'");
		$produk = mysqli_fetch_array($data3);
		?>
  <div class="row">
    <div class="col">
     <div class="p-3  ">
     	<strong><h3>Informasi Pelanggan</h3></strong><hr width="25%" noshade size="5%" color="black">
     	<p>Nama 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?= $data[2]?></p>
     	<p>Alamat  &nbsp;&nbsp;&nbsp;:&nbsp;<?= $data[3]?></p>
     	<p>Nomor Telepon  : <?= $data[6]; ?></p>
     </div>
    </div>
    

<table class="table table-striped" style="border-color: #34495e;">
	<tr >
		<td>#</td>
		<td>Paket</td>
		<td>Harga</td>
		<td>Jumlah</td>
		<td align="center">Subtotal</td>
		</tr>
	<?php 
		$data0=mysqli_query($koneksi,"SELECT * FROM detail_order where kd_user = '$_SESSION[kd_user]'  and kd_order = '$id'");
	$no=0;
	while ($result=mysqli_fetch_array($data0)) {
		$no++;
		$data3=mysqli_query($koneksi,"SELECT * FROM pesanan where kd_order = '$id' ");
		$data2=mysqli_fetch_array($data3);

		$data4=mysqli_query($koneksi,"SELECT * FROM produk where kd_produk = '$result[1]'");
		$produ = mysqli_fetch_array($data4);
	?>
		<tr>
		<td style="border:0px;"><?= $no ?></td>
		<td style="border:0px;"><?= $produ[1] ?></td>
		<td style="border:0px;"><?= rupiah($produ[4]) ?></td>
		<td style="border:0px;"><?= $result[2]?></td>
		<td style="border:0px;" align="center"><?= rupiah($produ[4]) ?></td>
		

	</tr>		

<?php 
$subtotal = $data2[5];
} 
?>
<tr>
	<td colspan="4"><strong> Total :</strong> </td>
	<td  align="center"><h4><?=rupiah($subtotal)?></h4></td>
</tr>
</table>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>