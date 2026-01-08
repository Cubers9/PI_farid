 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<?php 
if (isset($_GET['edit'])) {
  $id = $_GET['kd'];
  $aksi = 'edit';
  $sql=mysqli_query($koneksi,"SELECT * FROM user WHERE kd_user = '$id'");
  $fetch=mysqli_fetch_array($sql);
  }else{
    $aksi = 'simpan';
  }
if (isset($_POST['simpan'])) {
  $kd = $_POST['kd_nama'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $pass = $_POST['password'];
  $rank = $_POST['rank'];
  $nohp = $_POST['phone_number'];


  if ($aksi =='simpan') {

  $simpan = mysqli_query($koneksi,"INSERT INTO user VALUES('$kd','$email','$nama','$nohp','$alamat','$pass','$rank')");
    // var_dump($pass) or die();
    echo "<script>alert('DATA BERHASIL DI SIMPAN')</script>";
    echo "<script>document.location.href='dashboard.php?data-user'</script>";
  }else{

    $update = mysqli_query($koneksi,"UPDATE user SET email='$email',nama='$nama',nohp='$nohp',alamat='$alamat',password='$pass',rank='$rank' where kd_user = '$id'");
    // var_dump($update) or die();
     echo "<script>alert('DATA BERHASIL DI UBAH')</script>";
    echo "<script>document.location.href='dashboard.php?data-user'</script>";

  }
}

      $query = mysqli_query($koneksi, "SELECT max(kd_user) as kodeTerbesar FROM user");
      $data = mysqli_fetch_array($query);
      $kodeUSR = $data['kodeTerbesar'];
      $urutan = (int) substr($kodeUSR, 3, 3);
      $urutan++;
      $huruf = "USR";
      $kodeUSR = $huruf . sprintf("%03s", $urutan);
?>
 <form method="POST" enctype="multipart/form-data">
 <div class="container">
  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">ID Pengguna</label>
      <div class="col-sm-3">
    <input type="text" name="kd_nama" class=" form-control" id="colFormLabelSm" value="<?php if($aksi=='simpan'){ echo $kodeUSR; } else{ echo $fetch[0]; }?>" readonly>
  </div>
</div>
 <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Nama </label>
      <div class="col-sm-3">
    <input type="text" name="nama" class=" form-control" id="colFormLabelSm" value="<?= @$fetch[2]?>" >
  </div>
</div>
  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Email</label>
  <div class="col-sm-3">
    <input type="email" name="email" class="form-control" id="colFormLabelSm" value="<?= @$fetch[1]?>" >
  </div>
</div>
  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Nomor Telepon</label>
  <div class="col-sm-3">
    <input type="text" name="phone_number" class="form-control" id="colFormLabelSm" value="<?= @$fetch[3]?>" maxlength="14" onkeypress="return hanyaAngka(event)">
  </div>
</div>

  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Alamat </label>
      <div class="col-sm-3">
    <input type="text" name="alamat" class="form-control" id="colFormLabelSm" value="<?= @$fetch[4]?>" required>
  </div>
</div>

 <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Password</label>
      <div class="col-sm-3">
    <input type="password" name="password" class="form-control" id="colFormLabelSm" value="<?= @$fetch[5]?>">
  </div>
</div>
  <div class="row mb-3">
  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Posisi</label>
  <br>
  <div class="col-sm-3">
    <select name="rank" class="form-control">
      <option> -- PILIH RANK --</option>
      <option value="Admin">  Admin </option>
      <option value="Pelanggan">  Pelanggan </option>
    <?php 
    if (@$aksi=='edit') {
      ?>
      <option value="<?= $fetch[6]?>" selected> -- <?= $fetch[6]?> --</option>
      <?php 
    }
    ?>
    </select>
  </div>
</div> 

<input class="btn btn-success" type="submit" name="simpan" value="Simpan">
<a href="dashboard.php?data-user" class="btn btn-warning"> Kembali </a>
</div>
</form>
<br>
<br>
<br>
<br>
<script>
        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
</script>