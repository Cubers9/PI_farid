<?php 

session_start();

$menu = $_GET['id'];
// $ongkir = $_POST['ongkir'];

if (isset($_SESSION['keranjang'][$menu])) {
	$_SESSION['keranjang'][$menu] += 1;
}else{
	$_SESSION['keranjang'][$menu] = 1;
}



echo "<script>alert('Berhasil Dimasukkan Ke keranjang');</script>";
echo "<script>document.location.href='dashboard.php?keranjang';</script>";
?>