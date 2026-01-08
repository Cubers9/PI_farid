
<?php 
include 'koneksi.php';
 $query = mysqli_query($koneksi, "SELECT max(kd_user) as kodeTerbesar FROM user");
      $data = mysqli_fetch_array($query);
      $kodeUSR = $data['kodeTerbesar'];
      $urutan = (int) substr($kodeUSR, 3, 3);
      $urutan++;
      $huruf = "USR";
      $kodeUSR = $huruf . sprintf("%03s", $urutan);
if (isset($_POST['register'])) {
	$kd_user		= $kodeUSR;
	$nama 		= @$_POST['nama'];
	$email 		= @$_POST['email'];
	$nohp 		= @$_POST['nohp'];
	$alamat 		= @$_POST['alamat'];
	$password 	= @$_POST['password'];
	$pass 		= $password;
	$rank 		= 'Pelanggan';
		$register = mysqli_query($koneksi,"INSERT INTO user VALUES('$kd_user','$email','$nama','$nohp','$alamat','$pass','$rank')");
		echo "<script>alert('Register Successfully');</script>";
		echo "<script>document.location.href='../login.php';</script>";

	// var_dump($register);

}

?>