<?php
session_start();
$id_keranjang=$_GET['id'];
unset($_SESSION['keranjang'][$id_keranjang]);

echo "<script>alert('Data Di Hapus');</script>";
echo "<script>document.location.href='dashboard.php?keranjang';</script>";
?>