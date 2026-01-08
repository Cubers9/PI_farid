<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<?php 
if (isset($_GET['edit'])) {
  $id = $_GET['kd'];
  $aksi = 'edit';
  $sql=mysqli_query($koneksi,"SELECT * FROM produk WHERE kd_produk = '$id'");
  $fetch=mysqli_fetch_array($sql);
  }else{
    $aksi = 'simpan';
  }
if (isset($_POST['simpan'])) {
  $kd = $_POST['kd_produk'];
  $nama = $_POST['nama'];
  $desc = $_POST['desc'];
  $harga = $_POST['harga'];

    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
 
    if(!in_array($ext,$ekstensi)) {
      // var_dump($filename) or die();
      echo "<script>alert('Ekstensi Tidak Sesuai');</script>";
    }else{
      if($ukuran < 2044070){    
        move_uploaded_file($_FILES['foto']['tmp_name'], '../uploads/produk/'.$rand.'_'.$filename);
    }
  }
  if ($aksi =='simpan') {

  $simpan = mysqli_query($koneksi,"INSERT INTO produk VALUES('$kd','$nama','$desc','$filename','$harga')");
    // var_dump($simpan) or die();
    echo "<script>alert('Data Berhasil Disimpan')</script>";
    echo "<script>document.location.href='dashboard.php?product'</script>";
  }else{

    $update = mysqli_query($koneksi,"UPDATE produk SET nama_produk='$nama',desc_produk='$desc',img_produk='$filename',harga='$harga' where kd_produk = '$id'");
    // var_dump($update) or die();
    echo "<script>alert('Data Berhasil Diubah')</script>";
    echo "<script>document.location.href='dashboard.php?product'</script>";
  }
}

  $query = mysqli_query($koneksi, "SELECT max(kd_produk) as kodeTerbesar FROM produk");
      $data = mysqli_fetch_array($query);
      $kodePRD = $data['kodeTerbesar'];
      $urutan = (int) substr($kodePRD, 3, 3);
      $urutan++;
      $huruf = "PRD";
      $kodePRD = $huruf . sprintf("%03s", $urutan);

?>
 <form method="POST" enctype="multipart/form-data">
 <div class="container">
  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">ID Paket</label>
      <div class="col-sm-3">
    <input type="text" name="kd_produk" class=" form-control" id="colFormLabelSm" value="<?php if($aksi=='simpan'){ echo $kodePRD; } else{ echo $fetch[0]; }?>" readonly>
  </div>
</div>
 <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Nama Paket</label>
      <div class="col-sm-3">
    <input type="text" name="nama" class=" form-control" id="colFormLabelSm" value="<?= @$fetch[1]?>" >
  </div>
</div>
  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Deskripsi</label>
  <div class="col-sm-3">
    <input type="text" name="desc" class="form-control" id="colFormLabelSm" value="<?= @$fetch[2]?>" >
  </div>
</div>

  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Foto </label>
      <div class="col-sm-3">
    <input type="file" name="foto" class="form-control" id="colFormLabelSm" value="<?= @$fetch[3]?>" required>
  </div>
</div>
  <div class="row mb-3">
  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Harga</label>
  <br>
  <div class="col-sm-3">
    <input type="text" name="harga" class="form-control" id="colFormLabelSm" value="<?= @$fetch[5]?>">
  </div>
</div> 


<input class="btn btn-success" type="submit" name="simpan" value="Simpan">
<a class="btn btn-warning" href="dashboard.php?product">Kembali </a>
</div>
</form>
  <br>
  <br>
  <br>
  <br>