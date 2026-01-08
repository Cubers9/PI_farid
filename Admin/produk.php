<div class="container-fluid py-4">
<a href="dashboard.php?detail-produk" class="btn btn-success">Masukkan Data</a>
<br>
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Produk</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" align="center">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produk</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <?php 
                  $data=mysqli_query($koneksi,"SELECT * FROM produk");
                    $no = 0;
                      while ($result=mysqli_fetch_array($data)) {
                    $no++;

                  ?>
                  <tbody>
                    <tr>
                      <td align="center"><?= $no ?></td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../uploads/produk/<?= $result[3]?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $result[1]?></h6>
                            <p class="text-xs text-secondary mb-0"><?= $result[2]?></p>
                          </div>
                        </div>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= rupiah($result[4])?></span>
                      </td>
                      <td class="align-middle" align="center">
                        <a href="dashboard.php?detail-produk&edit&kd=<?= $result[0]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a> | 
                         <a href="delete-produk.php?hapus&kd=<?= $result[0]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
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
  <br>
  <br>
  <br>
  <br>  
  <br>
  <br>
  <br>
  <br>