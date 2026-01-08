<br>
<br>
<br>
<br>

<div class="container-fluid">
<table class="table table-hover">
  <thead>
    <tr align="center">
    <th>#</th>
    <th>Nama Paket</th>
    <th>Deskripsi Paket</th>
    <th>Harga Paket</th>
    <th></th>
  </tr>
</thead>
<?php 
$no = 0;
$data = mysqli_query($koneksi,"SELECT * FROM produk");
while ($result = mysqli_fetch_array($data)) {
$no++;
?> <tbody>
<tr>
 <td align="center"> <?=$no;?></td>
 <td align="center"> <img src="../uploads/produk/<?=$result[3];?>" style="width: 2.5cm; height: auto;"></td>
 <td width="50%"> <?=$result[2];?></td>
 <td align="center"> <?=rupiah($result[4]);?></td>
 <td> <a class="btn btn-success " style="color: white;" href="cart.php?buy&id=<?php echo $result[0]?>">Pilih Paket</a></td>

</tr>
<?php } ?>
</tbody>
</table>
</div>
<br>
<br>
<br>