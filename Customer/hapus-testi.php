<?php 
include '../config/koneksi.php';
if (isset($_GET['hapus'])){
	$id=$_GET['kd'];
	$qw=mysqli_query($koneksi,"DELETE FROM testimoni where kd_testi='$id'");
	// var_dump($qw) or die();
	 echo "<script>alert('SUCCESSFULLY');</script>";
	 echo "<script>document.location.href='dashboard.php?testimoni';</script>";
}

?>