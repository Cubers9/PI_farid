  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 
<?php 
if (isset($_GET['edit'])) {
  $id = $_GET['kd'];
  $aksi='edit';
  $fetch=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM pembayaran where kd_pembayaran = '$id'"));
}else{
  $aksi = 'simpan';
}
if (isset($_POST['simpan'])) {
  $bank   = $_POST['bank'];
  $nomor  = $_POST['nomor'];
  $nama   = $_POST['nama'];
if ($aksi=='simpan') {
  $simpan = mysqli_query($koneksi,"INSERT INTO pembayaran VALUES(NULL,'$bank','$nomor','$nama')");
  // var_dump($simpan) or die();
  echo "<script>alert('DATA BERHASIL DI SIMPAN')</script>";
    echo "<script>document.location.href='dashboard.php?bank'</script>";
}else{
  $edit = mysqli_query($koneksi,"UPDATE pembayaran SET metode_pembayaran='$bank',no_acc='$nomor',atasnama='$nama' WHERE kd_pembayaran = '$id'");
  // var_dump($edit) or die();
    echo "<script>alert('DATA BERHASIL DI UPDATE')</script>";
    echo "<script>document.location.href='dashboard.php?bank'</script>";
  }
}
?>

 <form method="POST" enctype="multipart/form-data">
 <div class="container">
  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">ID Produk</label>
      <div class="col-sm-3">
    <input type="text" name="kd_produk" class=" form-control" id="colFormLabelSm" placeholder="Automatic" readonly>
  </div>
</div>
<div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Jenis Pembayaran</label>
      <div class="col-sm-3">
    <input type="text" name="bank" class=" form-control" id="colFormLabelSm" value="<?= @$fetch[1]?>">
  </div>
</div>
 <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Nomor Akun</label>
      <div class="col-sm-3">
    <input type="text" name="nomor" class=" form-control" id="colFormLabelSm" value="<?= @$fetch[2]?>" onkeypress="return hanyaAngka(event)">
  </div>
</div>
  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Nama Akun</label>
  <div class="col-sm-3">
    <input type="text" name="nama" class="form-control" id="colFormLabelSm" value="<?= @$fetch[3]?>">
  </div>
</div>



<input class="btn btn-success" type="submit" name="simpan" value="Simpan">
<a class="btn btn-warning" href="dashboard.php?bank"> Kembali </a>
</div>
</form>
<script>
        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
</script>