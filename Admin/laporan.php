<script type="text/javascript" src="../chartjs/Chart.js"></script>
	<center>
		<div style="width:930px; height: 520px;" >
		<canvas id="myChart"></canvas>
		</div>
	</center>
<!-- <a class="btn btn-info" href="print.php" target="_blank"> Print Laporan </a> -->
 <table class="table table-hover">
  <thead>
    <tr align="center">
      <th scope="col">#</th>
      <th scope="col">ID Pesanan</th>
      <th scope="col" >Tanggal Booking</th>
      <th scope="col" >Nama</th>
      <th scope="col" >Alamat</th>
      <th scope="col" >Produk</th>
      <th scope="col" >Pembayaran</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <?php
        
$sql = mysqli_query($koneksi, "SELECT * FROM detail_order");
$no=0;

while($data1 = mysqli_fetch_array($sql)){
	$data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM pesanan where kd_order = '$data1[3]'"));
	$produk=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM produk where kd_produk = '$data1[1]'"));
$no++;
$prodak = @$produk[5];
$qty = $data1[2];
$ongkir = $data[5];
$subtotal = ($prodak * $qty) + $ongkir;
// $suball = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM"))
?>

  <tbody>
    <tr>
      <td align="center"><?= $no ?></td>
      <td align="center"><?= $data[0] ?></td>
      <td align="center"><?= $data[9] ?></td>
      <td align="center"><?= $data[2] ?></td>
      <td align="center"><?= $data[3] ?> </td>
      <td align="center"><?=$produk[1] ?></td>
      <td align="center"><?=$data[7] ?></td>
      <td align="center"><?= Rupiah($subtotal)?></td>
      
    </tr>

      <?php } ?>
      
  </tbody>
</table>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
				datasets: [{
					label: 'Total',
					data: [
<?php  
$january= mysqli_query($koneksi,"SELECT * FROM pesanan WHERE MONTH(tgl_order) = '01'");
echo mysqli_num_rows($january);
?>,

<?php 
$february= mysqli_query($koneksi,"SELECT * FROM pesanan WHERE MONTH(tgl_order) = '02'");
echo mysqli_num_rows($february);
?>,

<?php 
$maret= mysqli_query($koneksi,"SELECT * FROM pesanan WHERE MONTH(tgl_order) = '03'");
echo mysqli_num_rows($maret);
?>,

<?php 
$april= mysqli_query($koneksi,"SELECT * FROM pesanan WHERE MONTH(tgl_order) = '04'");
echo mysqli_num_rows($april);
?>,

<?php 
$may= mysqli_query($koneksi,"SELECT * FROM pesanan WHERE MONTH(tgl_order) = '05'");
echo mysqli_num_rows($may);
?>,

<?php 
$juni= mysqli_query($koneksi,"SELECT * FROM pesanan WHERE MONTH(tgl_order) = '06'");
echo mysqli_num_rows($juni);
?>,

<?php 
$juli= mysqli_query($koneksi,"SELECT * FROM pesanan WHERE MONTH(tgl_order) = '07'");
echo mysqli_num_rows($juli);
?>,

<?php 
$agustus= mysqli_query($koneksi,"SELECT * FROM pesanan WHERE MONTH(tgl_order) = '08'");
echo mysqli_num_rows($agustus);
?>,

<?php 
$september= mysqli_query($koneksi,"SELECT * FROM pesanan WHERE MONTH(tgl_order) = '09'");
echo mysqli_num_rows($september);
?>,

<?php 
$oktober= mysqli_query($koneksi,"SELECT * FROM pesanan WHERE MONTH(tgl_order) = '10'");
echo mysqli_num_rows($oktober);
?>,

<?php 
$november= mysqli_query($koneksi,"SELECT * FROM pesanan WHERE MONTH(tgl_order) = '11'");
echo mysqli_num_rows($november);
?>,

<?php 
$desember= mysqli_query($koneksi,"SELECT * FROM pesanan WHERE MONTH(tgl_order) = '12'");
echo mysqli_num_rows($desember);
?>,

					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>


<script type="text/javascript" src="../chartjs/Chart.js"></script>

