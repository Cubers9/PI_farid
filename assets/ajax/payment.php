<?php
 function rupiah($angka){
        $hasil = "Rp. " . number_format($angka,2,',','.');
        return $hasil;
    }
    include "../../config/koneksi.php";

    $info = $_POST['payinfo']; //menampung data yang dikirimkan ke dalam variabel. Jika method menggunakan GET maka ubah menjadi $_GET['data,,,,']

    if($info != ''){ //Jika data yang dikirimkan tidak kosong
?>
                  
<?php
        //menseleksi data sesuai dengan id_provinsi yang dipilih/dikirim
        $sql = mysqli_query($koneksi,"SELECT * FROM pembayaran where metode_pembayaran='$info'");
        $data = mysqli_fetch_array($sql)
            ?>
        <input type="text" name="" value="<?= $data[2]?> - <?= $data[3]?>" class="form-control"  readonly>

  
        <?php
    } else {
        //jika data yang dikirim kosong, akan menampilkan select default
        ?>
        <input type="text" class="form-control" placeholder="Select Payment Method" readonly>


        <?php
    }
?>
