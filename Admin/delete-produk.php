<?php 
include '../config/koneksi.php';
if (isset($_GET['hapus'])) {

$id = $_GET['kd'];
$qw = mysqli_query($koneksi,"DELETE FROM produk where kd_produk = '$id'");
// var_dump($qw) or die();
echo "<script>alert('Data Berhasil Dihapus');</script>";
echo "<script>document.location.href='dashboard.php?product'</script>";

}
?>