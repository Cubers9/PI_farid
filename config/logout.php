<?php 
// mengaktifkan session
session_start();
 
// menghapus semua session
unset($_SESSION['rank']);
 
// mengalihkan halaman sambil mengirim pesan logout
header("location:../login.php?pesan=logout");
?>