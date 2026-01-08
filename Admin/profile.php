 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<table class="table">
  <thead>
    <tr align="center">
      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Telepon</th>
      <th scope="col">Alamat</th>
      <th scope="col">Password</th>
      <th scope="col">Status</th>
    </tr>
  </thead>

<?php
include "../config/koneksi.php";
    if (isset($_SESSION['kd_user'])) {
       $ta=$_SESSION['kd_user'];
    }
    $no=0;
 $sql = mysqli_query($koneksi, "SELECT * FROM user where kd_user='$ta'");
 $no++;
$tampil = mysqli_fetch_array($sql);


?>
  <tbody>
    <tr align="center">
      <td><?= $tampil[0] ?></td>
      <td><?= $tampil[2] ?></td>
      <td><?= $tampil[1] ?></td>
      <td><?= $tampil[3] ?></td>
      <td><?= $tampil[4] ?></td>
      <td><input type="password" class="form-control" value="<?= $tampil[5] ?>" readonly></td>
      <td><?= $tampil[6] ?></td>
    </tr>
    <tr>
      <td colspan="8">
    <a href="dashboard.php?profile&edit&kd_user=<?php echo $tampil[0]?>" class="btn btn-info float-end">Edit</a></td>
  </tr>
  </tbody>
</table>
<?php
if (isset($_GET['edit'])) {
       $tas=$_GET['kd_user'];
       $rd='readonly';
       $aksi="edit";
  $queryubah=mysqli_query($koneksi,"SELECT * FROM user WHERE kd_user = '$tas'");
  $fetch = mysqli_fetch_array($queryubah);
  }
  if (isset($_POST['edit'])){
    $sesi =$_SESSION['kd_user'];
    $tlp  =$_POST['telephone'];
    $almt =$_POST['alamat'];
    $password =$_POST['password'];
    $pass = $password;
  $edit= mysqli_query($koneksi, "UPDATE user set nohp='$tlp', alamat='$almt', password='$pass' WHERE kd_user='$tas'");
  // var_dump($edit) or die();
  echo "<script>alert('Data Terubah')</script>";
  echo "<script>document.location.href='dashboard.php?profile&edit&kd_user=$sesi'</script>";
}
?>
<?php 
if(@$aksi=="edit"){
?>
<form method="POST">
 <div class="container">
  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">ID</label>
      <div class="col-sm-4">
    <input type="text" name="id" class=" form-control" id="colFormLabelSm" value="<?php echo @$fetch['kd_user']; ?>" readonly>
  </div>
</div>
 <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Nama</label>
      <div class="col-sm-4">
    <input type="text" name="nama" class=" form-control" id="colFormLabelSm" value="<?php echo @$fetch['nama']; ?>" readonly>
  </div>
</div>
  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Email</label>
  <div class="col-sm-4">
    <input type="email" name="email" class="form-control" id="colFormLabelSm" value="<?php echo @$fetch['email']; ?>" readonly>
  </div>
</div>

  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Telepon</label>
      <div class="col-sm-4">
    <input type="text" name="telephone" class=" form-control" id="colFormLabelSm" value="<?php echo @$fetch['nohp']; ?>" maxlength="14" onkeypress="return hanyaAngka(event)">
  </div>
</div>

 <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Alamat</label>
      <div class="col-sm-4">
    <input type="text" name="alamat" class=" form-control" id="colFormLabelSm" value="<?= @$fetch['alamat']; ?>">
  </div>
</div>
  <div class="row mb-3">
  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Password</label>
  <br>
  <div class="col-sm-4">
    <input type="password" name="password" class="form-control" id="colFormLabelSm" value="<?php echo @$fetch['password']; ?>">
  </div>
</div> 

<input class="btn btn-success" type="submit" name="edit" value="Simpan">
<a class="btn btn-warning" href="dashboard.php?profile"> Kembali </a>
</div>
</form>
<?php } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
</script>
</html>