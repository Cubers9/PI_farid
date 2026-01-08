<br>
<br>
<br>
<br>

 <?php 
 if (isset($_POST['simpan'])) {
   $city = $_POST['cn'];
   $harga = $_POST['pr'];
   $kd_user = $_SESSION['kd_user'];
   $simpan = mysqli_query($koneksi,"INSERT INTO testimoni VALUES(NULL,'$kd_user','$city','$harga')");
   // var_dump($kodeKOT) or die();
   echo "<script>alert('Testimoni anda berhasil dihapus');</script>";
   echo "<script>document.location.href='dashboard.php?testimoni';</script>";
 }

?>
<form method="POST" enctype="multipart/form-data">
 <div class="container">
  <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Judul</label>
      <div class="col-sm-3">
    <input type="text" name="cn" class=" form-control" id="colFormLabelSm"  placeholder="Judul">
  </div>
</div>
 <div class="row mb-3">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Isi</label>
      <div class="col-sm-3">
    <input type="text" name="pr" class="form-control" id="colFormLabelSm" placeholder="Isi" >
  </div>
</div>

<input class="btn btn-success" name="simpan" value="Kirim" type="submit">

</div>
</form>
<div class="container-fluid">
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Testimoni Anda</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" align="center">#</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Isi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                      
                    </tr>
                  </thead>
                 <?php 
              $data=mysqli_query($koneksi,"SELECT * FROM testimoni order by kd_testi DESC");
              $no = 0;
              while($result=mysqli_fetch_array($data)){

                $no++;
              ?>
                  <tbody>
                    <tr align="center">
                      <td ><?= $no ?></td>
                      <td>
                            <h6 class="mb-0 text-sm"><?= $result[2]?></h6>
                            
                      </td>
                      <td>
                        <p class="text-xs text-secondary mb-0"><?= $result[3]?></p>
                      </td>
                      <td class="align-middle">
                         <a href="hapus-testi.php?hapus&kd=<?= $result[0]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                          Hapus
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
