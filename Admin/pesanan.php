<div class="container-fluid">
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Pesanan</h6>
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produk</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                 <?php 
              $data=mysqli_query($koneksi,"SELECT * FROM pesanan");
              $no = 0;
              while($result=mysqli_fetch_array($data)){
                $d= $result[0];
                $s= $result[1];
                $detail=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM detail_order where kd_order = '$d'"));
                $id = $detail[1];

                $prod = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM produk where kd_produk = '$id'"));

                $user = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM user where kd_user = '$s'"));
                $no++;
              ?>
                  <tbody>
                    <tr align="center">
                      <td ><?= $no ?></td>
                      <td>
                            <h6 class="mb-0 text-sm"><?= $result[3]?></h6>
                      </td>
                      <td>
                        <h6 class="mb-0 text-sm"><?= $user[2]?></h6>
                      </td>
                      <td>
                        <span class="mb-0 text-sm"><?= $prod[1]?></span>
                      </td>
                       <td>
                        <span class="text-secondary text-xs font-weight-bold"><?= $detail[2]?></span>
                      </td>
                      <td class="align-middle" align="center">
                        <a href="dashboard.php?details&edit&kd=<?= $result[0]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Detail
                        </a> | 
                        <a href="delete-pesanan.php?hapus&kd=<?= $result[0]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
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