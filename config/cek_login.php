<?php
session_start();
include "koneksi.php";

		$username	=$_POST['email'];
		$password	= $_POST['password'];
		$query		=mysqli_query($koneksi,"SELECT * FROM user where email='$username' AND password='$password'");
		$array 		=mysqli_num_rows($query);
 // var_dump($pass) or die();

			if($array > 0){
   					 $data = mysqli_fetch_assoc($query);


    // cek jika user login sebagai admin
    if($data['rank']=='Admin'){
        // buat session login dan username
        $_SESSION['nama'] 	= $data['nama'];
        $_SESSION['email'] 	= $username;
        $_SESSION['rank'] = "Staff";
        $_SESSION['kd_user'] = $data['kd_user'];
  
        // alihkan ke halaman dashboard admin
            header("location:../admin/dashboard.php?status-order-report");
 
    // cek jika user login sebagai pengunjung
    }elseif($data['rank']=='Pelanggan'){
        // buat session login dan username
        $_SESSION['nama']   = $data['nama'];
        $_SESSION['email']  = $username;
        $_SESSION['rank'] = "Pelanggan";
        $_SESSION['kd_user'] = $data['kd_user'];
        // alihkan ke halaman dashboard customer
            header("location:../customer/dashboard.php?utama");
  }
    }else{
        // alihkan ke halaman login kembali
        header("location:../login.php?pesan=gagal");  
}

?>