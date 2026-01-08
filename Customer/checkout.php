
<?php 
session_start();

date_default_timezone_set("Asia/Jakarta");

if (isset($_POST['hitung'])) {

$id=$_POST['ongkir'];
$kir=mysqli_query($koneksi,"SELECT * FROM kota where kd_kota='$id'");
$ong=mysqli_fetch_array($kir);
}

?>

  <?php
    $query = mysqli_query($koneksi, "SELECT max(kd_order) as kodeTerbesar FROM pesanan");
    $data = mysqli_fetch_array($query);
    $kodePSN = $data['kodeTerbesar'];
    $urutan = (int) substr($kodePSN, 3, 3);
    $urutan++;
    $huruf = "PSN";
    $kodePSN = $huruf . sprintf("%03s", $urutan);
    
    if (isset($_POST['simpan'])) {
    $id_psn   = $kodePSN;
    $kd_user  = $_SESSION['kd_user'];
    $nama     = $_SESSION['nama'];
    $skrng    =  date("Y-m-d h:i:s");
    $tgl_skrng= date("Y-m-d");
    @$deadline = $_POST['waktu'];
    $alamat   = $_POST['ale'];
    @$kota     = $_POST['kota'];
    $tlp      = $_POST['notlp'];
    $rd       = 0;
    $status = "Menunggu";
    $st     = $_POST['payinfo'];
    $subtotal     = $_POST['biaya'];
    $ket    ="Pengecekan";

    $timezone = new DateTime("now", new DateTimeZone('asia/jakarta') );
    $currentDate = $timezone->format('Y-m-d H:i:s');
    $convert = strtotime($currentDate);
    $batas_bayar = $convert+(60*2); 
    $batas_bayar_fix = date("Y-m-d H:i:s", $batas_bayar);

    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['foto']['name'];
  
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$ekstensi) ) {
    echo "<script>alert('Extensi Tidak Sesuai');</script>";
    }else{
    
      if($ukuran < 2044070){    
        $xx = $rand.'_'.$filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], '../uploads/bukti/'.$rand.'_'.$filename);
      }
    }

      $query1 =mysqli_query($koneksi,"INSERT INTO pesanan 
        VALUES('$id_psn',
          '$kd_user',
          '$nama',
          '$alamat',
          '$xx',
          '$subtotal',
          '$tlp',
          '$st',
          '$status',
          '$tgl_skrng')");
          // var_dump($query1); die();

    foreach($_SESSION['keranjang'] as $id => $qty){
              $product = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE kd_produk='$id'"));

                $query2 = mysqli_query($koneksi, "INSERT INTO detail_order VALUES(NULL,'$product[kd_produk]','$qty','$id_psn','$_SESSION[kd_user]')");
                $stok = $product[4] - $qty;
               
                 }
           
            // var_dump($query1) or die();

unset($_SESSION['keranjang']);
      // var_dump($_SESSION)or die();
        echo "<script>alert('PEMBAYARAN BERHASIL. ! Silahkan Menunggu, Prosses pembayaran akan di update setiap 5 menit');</script>";
        echo "<script>document.location.href='dashboard.php?status';</script>";

}
?>
<br>
<br>
<br>
<br>
<form method="POST" enctype="multipart/form-data">
<table class="table">
  <tr>
    <td>No.</td>
    <td>Produk</td>
    <td>Detail</td>
    <td>Jumlah</td>
    <td>Total</td>
    <td ></td>
  </tr>
  <?php
       
  $no= 0;
  $subtotal=0;
   foreach ($_SESSION['keranjang'] as $data => $jumlah) {
    $sql=mysqli_query($koneksi,"SELECT * FROM produk where kd_produk = '$data'");
    $tampil=mysqli_fetch_array($sql);
    $total=$tampil[4]*$jumlah;
    $no++;
  ?>

  <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td width="5%"><img src="../uploads/produk/<?php echo $tampil[3]?>" width="120px" height = "100px"></td>
      <td>
        <?php echo $tampil[1]?>
        <br>
        <p><?= rupiah($tampil[4])?></p>
      </td>

      <td><?php echo $jumlah?></td>
      <td><?=rupiah($total)?></td>
      

      
    </tr>
<?php 
$subtotal+=$total;
}
$kiw=@$ong['harga'];

?>
<tr >
  <td >Subtotal</td>
    <td colspan="3"></td>
      <td style="border-color: gray; background-color: gray; color: white;"><b><?=rupiah($subtotal)?></b></td>
  </tr>

            <tr>
              <td  width="10%">Alamat Acara </td>
              <td  width="25%"><input class="form-control" name="al" value="<?=$_POST['address']?>" readonly></td>
              <td></td>
               <td  width="10%">Metode Pembayaran </td>
              <td  width="25%">
                <select class="form-control" name="payinfo" id="pay" required>
                    <option value="" selected disabled>--Pilih Metode Pembayaran--</option>

                  <?php 
                  $q= mysqli_query($koneksi,"SELECT * FROM pembayaran");
                  while($sel1=mysqli_fetch_array($q)){
                    ?>
                    <option value="<?= $sel1[1];?>"><?= $sel1[1];?></option>
                  <?php } ?>
                </select>
               
               </td>
            </tr>
            <tr>
              <td>Telepon</td>
              <td><input class="form-control" name="notlp" value="<?=$_POST['notlp']?>" readonly></td>
                         <td></td>
              <td>Info Pembayaran</td>
              <td  width="25%">
                        <p id="akun"></p>

               </td>
            </tr>
             <tr>
              <td>
                Bukti Pembayaran
              </td>
              <td>
                <input type="file" name="foto" required>
              </td>
              <td></td>
              <td></td>
              <td><input class="btn btn-success" name="simpan" value="Bayar" type="submit">
              <a href="dashboard.php?keranjang" class="btn btn-danger">Kembali</a></td>
            </tr>
</table>
    </div>
<input name="ale" value="<?=$_POST['address']?>" hidden>
<input name="biaya" value="<?= $subtotal ?>"  hidden>

  </form>

<script src="../assets/select/script.js"></script>
        <script>
          // Jenis Mobil
            $(document).ready(function(){
                $("#pay").change(function(){ //melakukan aksi ketika div id provinsi berubah nilai
                    var pay = $("#pay").val(); //menampung nilai dari option provinsi ke variabel

                    console.log(pay); //mencetak nilai dari dropdown provinsi, tidak perlu, hanya untuk kebutuhan debugging
                    $.ajax({
                        method: "POST", //Method pengiriman data, ada GET, POST
                        url: "../assets/ajax/payment.php", //File untuk memproses data, jika ada di dalam folder/subfolder tulis path lengkap dari root
                        data: { "payinfo": pay }, //data yang dikirimkan, untuk data lebih dari 1 gunakan { "data1": var_data1, "data2": var_data2 }
                        cache: false,
                        success: function(data){ //menampung hasil proses ke dalam variabel data (nama var opsional, bisa disesuaikan)

                            console.log(data); //mencetak hasil proses ke console, opsional digunakan untuk debugging
                            $("#akun").html(data); //merubah nilai field select kota sesuai dengan data hasil proses
                        }
                    });
                });
            });
          </script>

