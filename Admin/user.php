<div class="container-fluid py-4">
<a href="dashboard.php?detail-user" class="btn btn-success">Masukkan Data</a>

      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Data Pelanggan</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" align="center">#</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pelanggan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Posisi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <?php 
                  $kd=$_SESSION['kd_user'];
                  $data=mysqli_query($koneksi,"SELECT * FROM user where kd_user != '$kd' ORDER BY rank ASC");
                    $no = 0;
                      while ($result=mysqli_fetch_array($data)) {
                    $no++;
                  ?>
                  <tbody>
                    <tr align="center">
                      <td ><?= $no ?></td>
                      <td>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $result[1]?></h6>
                            <p class="text-xs text-secondary mb-0"><?= $result[2]?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $result[4]?></p>
                      </td>
                      <td>
                        <span class="text-secondary text-xs font-weight-bold"><?= $result[5]?></span>
                      </td>
                       <td>
                        <span class="text-secondary text-xs font-weight-bold"><?= $result[6]?></span>
                      </td>
                      <td class="align-middle" align="center">
                        <a href="dashboard.php?detail-user&edit&kd=<?= $result[0]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a> | 
                         <a href="delete-user.php?hapus&kd=<?= $result[0]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
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
  <br>  <br>
  <br>
  <br>
  <br>