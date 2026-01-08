
<a class="btn btn-success" href="dashboard.php?input-accountbank">Masukkan Data</a>
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Metode Pembayaran</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" width="">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" align="center">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Pembayaran</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor Akun</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <?php 
                  $data=mysqli_query($koneksi,"SELECT * FROM pembayaran");
                    $no = 0;
                      while ($result=mysqli_fetch_array($data)) {
                    $no++;

                  ?>
                  <tbody>
                    <tr>
                      <td align="center"><?= $no ?></td>
                      <td>
                        <div class="d-flex px-2 py-1">
                         
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $result[1]?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $result[2]?></p>
                      </td>
                      
                      <td class="align-middle" align="center">
                        <a href="dashboard.php?input-accountbank&edit&kd=<?= $result[0]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a> | 
                         <a href="delete-account.php?hapus&kd=<?= $result[0]?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
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