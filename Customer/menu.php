<div class="container">
<div class="row row-cols-1 row-cols-md-4 g-4">
      <?php 

    $data=mysqli_query($koneksi,"SELECT * FROM produk");
    while($result=mysqli_fetch_array($data)){
      ?>
  <div class="col">
  <a href="cart.php?buy&id=<?php echo $result[0]?>">
    <div class="card">
      <center><img src="../uploads/produk/<?=$result[3]?>" class="card-img-top" style="width: 5cm; height: 5cm;"></center>
      <div class="card-body">
        <center><h3 class="card-title"><?=$result[1]?></h3></center>
        <p class="card-text"><?=$result[2]?></p>
        <h5 class="card-title"><?=rupiah($result[4])?></h5>

      </div>
    </div>
    </a>

  </div>
    <?php } ?>
</div>
</div>