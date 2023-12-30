<?php require_once("baglan.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
  <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="css/styles_mekanTanitim.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <title>MekanTanitim</title>
</head>

<body>

  <?php //require_once("navbar.php") 
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // secilenSehir adlı POST verisini al
    $secilenSehir = $_GET["secilenSehir"];
  }
  ?>


  <div class="welcome">
    <br>
    <h4>DEĞERLİ GEZGİN,</h4>
    <p>Senin için <?php echo $secilenSehir; ?> hakkında araştırma yaptık bile. İşte rotana ekleyebileceğin yerler!</p>
  </div>


  <div style="overflow-x:auto;">
    <table class="sehirTable3">
      <tr>

        <?php
        $sql = "SELECT * FROM sehirler WHERE sehir_adi = '$secilenSehir'";
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
        $sql_mekan_sayisi = "SELECT COUNT(*) as mekanSayisi  FROM mekanlar WHERE plaka = '{$sehirler['plaka']}'";
        $result2 = $baglanti->query($sql_mekan_sayisi);
        $mekan_sayisi = $result2->fetch_assoc();
        ?>
        <th>Rota sayısı</th>
        <th>Yorum sayısı</th>
        <?php

        $sql_mekanlar = "SELECT mekan_id FROM mekanlar WHERE plaka = '{$sehirler['plaka']}'";
        $result_mekanlar = $baglanti->query($sql_mekanlar);
        $yorum_sayisi = 0;
        $mekan_puani = 0;
        while ($row_mekanlar = $result_mekanlar->fetch_assoc()) {

          $mekan_id = $row_mekanlar['mekan_id'];
          $stmt = $baglanti->prepare(" SELECT mekan_id,oy   FROM yorumlar WHERE mekan_id = ?");
          $stmt->bind_param("i", $mekan_id);
          $stmt->execute();
          $result_yorumlar = $stmt->get_result();

          while ($row_yorumlar = $result_yorumlar->fetch_assoc()) {
            $yorum_sayisi++;
            $mekan_puani += $row_yorumlar['oy'];
          }

          $stmt->close();
        }

        ?>
      </tr>
      <tr>
        <td> 
          <?php if($mekan_puani>0){
            echo number_format($mekan_puani / $yorum_sayisi, 1, '.', ''); 
          }
          else {echo $mekan_puani;} 
        ?> 
        
        <i class="fas fa-star"></i></td>
        <td id="mekan_sayac"> <?php echo $mekan_sayisi['mekanSayisi'] ?> <i class='fas fa-university'></i></td>
        <td > <?php echo $sehirler['sayac'] ?> <i class='fas fa-route'></i></td>
        <td> <?php echo $yorum_sayisi ?> <i class='far fa-comment-alt'></i></td>
      </tr>
    </table>
  </div><br>

  <?php

  $sql_mekanlar = "SELECT * FROM mekanlar WHERE plaka='{$sehirler['plaka']}'";
  $result_mekanlar = $baglanti->query($sql_mekanlar);
  $cr_count = 1;
  while ($mekanlar = $result_mekanlar->fetch_assoc()) {
  ?>
    <div class="container">
      <div class="left-side">
        <table class="table1">
          <tr class="row1">
            <td id="mekan<?php echo $cr_count;?>" style="text-align: center;"><?php echo $mekanlar['mekan_adi'] ?></td>
          </tr>
        </table>
        <table class="table1">
          <tr class="row2">
            <td style="border-top: none;">Mekan Puanı</td>
            <?php
            $stmt_mekan = $baglanti->prepare("SELECT oy FROM yorumlar WHERE mekan_id = (SELECT mekan_id FROM mekanlar WHERE mekan_adi = ?)");
            $stmt_mekan->bind_param("s", $mekanlar['mekan_adi']);
            $stmt_mekan->execute();
            $result_mekan_oy = $stmt_mekan->get_result();
            $mekan_yorum_puani = 0;
            $mekan_yorum_sayisi = 0;
            while ($result_mekan_puani = $result_mekan_oy->fetch_assoc()) {
              $mekan_yorum_puani += $result_mekan_puani['oy'];
              $mekan_yorum_sayisi++;
            }
            $stmt_mekan->close();
            ?>
            <td style="border-top: none;"> <?php if ($mekan_yorum_sayisi > 0) {
                                              echo $mekan_yorum_puani / $mekan_yorum_sayisi;
                                            } else echo $mekan_yorum_puani;  ?> </td>
          </tr>
          <tr class="row3">
            <td>Rotada Bulunma</td>
            <td>Y</td>
          </tr>
        </table>
        <div class="buttonRow">
          <button id="myButton<?php echo $cr_count;?>" onclick="changeText(<?php echo $cr_count;?>)">KAYDET</button>
          <button id="myButton2<?php echo $cr_count;?>" onclick="changeText2(<?php echo $cr_count;?>)">EKLE</button>
        </div><br>

        <label class="tanitim" for="tanitim">
          <p style="margin-bottom: 0px;"> <?php echo $mekanlar['bilgi_yazisi'] ?> </p>
        </label>
      </div>


      <div class="right-side">
        <div id="carouselExampleIndicators<?php echo $cr_count ?>" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators<?php echo $cr_count ?>" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators<?php echo $cr_count ?>" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators<?php echo $cr_count ?>" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="<?php echo $mekanlar['fotograf'] ?>" alt="First slide" width="615px" height="325px">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo $mekanlar['fotograf2'] ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?php echo $mekanlar['fotograf3'] ?>" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $cr_count ?>" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $cr_count ?>" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="mekanYorum">
          <table class="table2">

            <tr class="yorumKutusu">
              <?php
              $stmt_mekan = $baglanti->prepare("SELECT * FROM yorumlar WHERE mekan_id = (SELECT mekan_id FROM mekanlar WHERE mekan_adi = ?)");
              $stmt_mekan->bind_param("s", $mekanlar['mekan_adi']);
              $stmt_mekan->execute();
              $result_mekan_oy = $stmt_mekan->get_result();
              $mekan_yorum_metni = "";
              $mekan_yorum_tarihi = "";
              $e_mail="";
              while ($result_mekan_puani = $result_mekan_oy->fetch_assoc()) {
                $mekan_yorum_metni = $result_mekan_puani['yorum_metni'];
                $mekan_yorum_tarihi = $result_mekan_puani['yorum_tarihi'];
                $e_mail = $result_mekan_puani['e_mail'];
              }
              $stmt_mekan->close();
              ?>
              <td>
                <div class="kullaniciBilgisi">
                  <?php 
                     
                    $sql_fotograf = "SELECT * FROM kullanici WHERE e_mail = ?";
                    $stmt = $baglanti->prepare($sql_fotograf);
                    $stmt->bind_param("s", $e_mail);
                    $stmt->execute();
                    $result_fotograf = $stmt->get_result();
                    $stmt->close();
                        
                    if ($mekan_yorum_metni) {
                      $yorum_foto = $result_fotograf->fetch_assoc();
                      $base64Image = base64_encode($yorum_foto['fotograf']);
                  } else {
                      $base64Image=null;
                  }

                  ?>
                  <img src="<?php 
                  if($base64Image!==null){echo "data:image/jpeg;base64,".$base64Image;} ?>" width="50" height="50"style="border-radius: 50%; object-fit: cover;">
                  <?php
                  echo $mekan_yorum_metni;
                  ?>
                </div>
                <span style="float: right;" class="tarih mt-2"><?php echo $mekan_yorum_tarihi ?></span>
              </td>
            </tr>
            <tr class="tumYorumKutusu">
              <td><a href="#">TÜM YORUMLARI GÖR</a></td>
            </tr>

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
    $cr_count++;
  }
  ?>
  
        <center>
            <button  id="rota_olustur" onclick="rotaOlustur()">ROTA OLUŞTUR</button>
        </center>



  <script src="js/scripts_mekanTanitim.js"></script>


</body>

</html>