
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container-fluid">
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h3 class="text-black text-capitalize ps-3">Pesanan</h3>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" align="center">#</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paket</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Booking</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                 <?php 

              $data=mysqli_query($koneksi,"SELECT * FROM pesanan where kd_user = '$_SESSION[kd_user]'");
              $no = 0;
              while($result=mysqli_fetch_array($data)){
                $d= $result[0];
                $s= $result[1];
                $pesanan = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM detail_order where kd_order = '$d'"));
                $prdk = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM produk where kd_produk = '$pesanan[1]'"));
                $user = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM user where kd_user = '$result[1]'"));
                $no++;
              ?>
                  <tbody>
                    <tr align="center">
                      <td class="align-middle"><?= $no ?></td>
                      <td class="align-middle">
                            <h6 class="mb-0 text-sm"><?= $result[3]?></h6>
                      </td>
                      <td class="align-middle"><h6 class="mb-0 text-sm"><?= $user[2]?></h6></td>
                      <td class="align-middle"><img src="../uploads/produk/<?=$prdk[3];?>" style="width: 1.5cm; height: auto;"></td>
                      <td class="align-middle">
                        <span class="mb-0 text-sm"><?= $result[9]?></span>
                      </td>
                       <td class="align-middle">
                        <span class="text-secondary text-xs font-weight-bold align-middle"><?= $result[8]?></span>
                      </td>
                      <td class="align-middle" align="center">
                        <a href="print.php?print&edit&kd=<?= $result[0]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" target='_blank'>
                          Cetak
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
    <br>
<br>
<br>
<br>
<br>
<br>