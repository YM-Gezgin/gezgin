<?php require_once("baglan.php"); ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Keşfet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/kesfet.css">
</head>

<body>



  <?php require_once("navbar.php") ?>


  <div class="jumbotron text-center header-jumbotron" style="background: none;">
    <h5 style="text-align: center;">Hala kararsız mısın? Aralık ayının enlerine beraber göz atalım!</h5>
  </div>

  <?php
          for ($i = 7; $i < 9; $i++) {
            $sql_mekan_tur = "SELECT mekan_adi,semt_ismi,fotograf FROM mekanlar WHERE mt_id='$i'";
            $response = $baglanti->query($sql_mekan_tur);

            $sql_mekan_baslik = "SELECT tur_adi FROM mekan_türleri WHERE mt_id='$i'";
            $result = $baglanti->query($sql_mekan_baslik);
            $mekan_baslik = $result->fetch_assoc();


          ?>
  <div class="bd-example ">
    <div id="carouselExampleCaptions" class="carousel slide mx-auto" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">

          

            <div class="container">
              <h2><?php echo $mekan_baslik['tur_adi']; ?> </h2>

              <div class="row">
                <?php
                $count=0;
                while ($mekan_baslik2 = $response->fetch_assoc()) {
                  if($count<4){
                ?>
                  <div class="col-xs-3 mx-auto">
                    <div class="card">
                      <img class="card-image" src="<?php echo $mekan_baslik2['fotograf']; ?>" alt="mekan">
                      <p style="font-size: 20px;"><?php echo $mekan_baslik2['mekan_adi']; ?></p>
                      <p><?php echo $mekan_baslik2['semt_ismi']; ?></p>

                    </div>
                  </div>
                <?php 
                  }
                  else{
                    ?>
                    <div class="carousel-item ">
                      //4 ten sonra carousel item active değil 
                      carousel active olarak devam edecek !!!!!!
                      ******************************************
                      ******************************************
                    <?php  
                  }
                  
                $count++;
                }
                ?>

              </div>

            </div>

        </div>


      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <?php 
    } ?>



  <?php require_once("footer.php") ?>


</body>

</html>