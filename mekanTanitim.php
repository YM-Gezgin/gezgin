<?php require_once("baglan.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="css/styles_ana.css">
  <link rel="stylesheet" href="css/styles_mekanTanitim.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <title>MekanTanitim</title>
</head>

<body>

  <?php require_once("navbar.php") ?>

  <div class="welcome">
    <br>
    <h4>DEĞERLİ GEZGİN,</h4>
    <p>SENİN İÇİN ŞEHİR HAKKINDA ARAŞTIRMA YAPTIK BİLE. İŞTE ROTANA EKLEYEBİLECEĞİN YERLER!</p>
  </div>

  <div style="overflow-x:auto;">
    <table class="sehirTable3">
      <tr>

        <?php
        $sql = "SELECT * FROM sehirler WHERE plaka=34";
        $result = $baglanti->query($sql);
        $sehirler = $result->fetch_assoc();
        ?>
        <th> <?php echo $sehirler['sehir_adi'] ?> </th>

      </tr>
    </table>
    <table class="sehirTable2">
      <tr>
        <th>Şehir Puanı</th>
        <th>Mekan sayısı</th>
        <?php
        $sql_mekan_sayisi = "SELECT COUNT(*) as mekanSayisi  FROM mekanlar WHERE plaka = 34;";
        $result2 = $baglanti->query($sql_mekan_sayisi);
        $mekan_sayisi = $result2->fetch_assoc();
        ?>
        <th>Rota sayısı</th>
        <th>Yorum sayısı</th>
      </tr>
      <tr>
        <td>4.5 <i class="fas fa-star"></i></td>
        <td> <?php echo $mekan_sayisi['mekanSayisi'] ?> <i class='fas fa-university'></i></td>
        <td> <?php echo $sehirler['sayac'] ?> <i class='fas fa-route'></i></td>
        <td>254 <i class='far fa-comment-alt'></i></td>
      </tr>
    </table>
  </div><br>

  <?php

  $sql_mekanlar = "SELECT * FROM mekanlar WHERE plaka=34";
  $result_mekanlar = $baglanti->query($sql_mekanlar);
  while ($mekanlar = $result_mekanlar->fetch_assoc()) {
  ?>
    <div class="container">
      <div class="left-side">
        <table class="table1">
          <tr class="row1">
            <td style="text-align: center;"><?php echo $mekanlar['mekan_adi'] ?></td>
          </tr>
        </table>
        <table class="table1">
          <tr class="row2">
            <td style="border-top: none;">Mekan Puanı</td>
            <td style="border-top: none;">X</td>
          </tr>
          <tr class="row3">
            <td>Rotada Bulunma</td>
            <td>Y</td>
          </tr>
        </table>
        <div class="buttonRow">
          <button id="myButton1" onclick="changeText1()">KAYDET</button>
          <button id="myButton2" onclick="changeText2()">EKLE</button>
        </div><br>

        <label class="tanitim" for="tanitim">
          <p> <?php echo $mekanlar['bilgi_yazisi'] ?> </p>
        </label>
      </div>


      <div class="right-side">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="<?php echo $mekanlar['fotograf'] ?>" alt="First slide" width="615px" height="325px">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/sarnic.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/sarnic.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="mekanYorum">
          <table class="table2">
            <tbody>
              <tr class="yorumKutusu">
                <td>yorum 1...</td>
              </tr>
              <tr class="yorumKutusu">
                <td>yorum 2...</td>
              </tr>
              <tr class="yorumKutusu">
                <td>yorum 3...</td>
              </tr>
              <tr class="tumYorumKutusu">
                <td><a href="#">TÜM YORUMLARI GÖR</a></td>
              </tr>
            </tbody>
          </table><br>
          <form id="myForm">
            <textarea class="yorumAlani" id="userInput" name="userInput" rows="4" placeholder="Burası hakkında düşüncelerini diğer gezginlerle paylaşmaye ne dersin?"></textarea>
            <div>
              <button type="submit" class="buttonYorumYap">YORUM YAP</button>
            </div>
          </form>
        </div>
      </div>
    </div><br>
    <div class="yatayCizgi"></div><br>
  <?php
  }
  ?>


<?php require_once('footer.php') ?> 

  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyDE46C5I2v5K56Jl2K6Uc2LiXm81I" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha384-8/0tSZKXLqHKhIdVGEBBAAKlO4jgYhC2og9uLj4ASGl6zTfbJt3p3F78VXzvPfwx" crossorigin="anonymous"></script>

  <script src="js/scripts_mekanTanitim.js"></script>


</body>

</html>