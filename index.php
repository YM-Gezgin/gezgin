<?php require_once("baglan.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ana Sayfa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Gezgin</title>
    <link rel="stylesheet" href="css/styles_ana.css">
</head>

<body>

    <?php require_once('navbar.php') ?>


    <div class="container-wrapper">
        <div class="kesfet-container">
            <label for="sehir">Sen gezmek istediğin şehri seç! Biz rotanı oluşturalım.</label>
            <input type="text" placeholder="Gezmek istediğiniz şehri girin" id="sehir" style="height: 50px;">

        </div>
        <img src="images/route_icon.png" alt="rota">
    </div>

    <div class="centered-container">
        <h2>Bu yıl en çok beğenilen şehirlere göz atın!</h2>
    </div>


    <?php
    $sql = "SELECT plaka,sehir_adi FROM sehirler ORDER BY sayac DESC LIMIT 4;";
    $result = $baglanti->query($sql);

    if ($result->num_rows > 0) {
        $count=1;
        while ($sehirler = $result->fetch_assoc()) {
    ?>
            <div id="card-container">
                <div id="slider-container">
                    <h3>
                        <?php echo $count ."-". $sehirler['sehir_adi'] ?>
                    </h3>
                    <span onclick="slideRight(<?php echo $count ?>)" class="btn"></span>
                    <div id="slider">
                        <?php
                        $plaka = $sehirler['plaka'];
                        $sql_mekan = "SELECT mekan_adi,semt_ismi,fotograf FROM mekanlar WHERE plaka='$plaka'";
                        $response = $baglanti->query($sql_mekan);

                        while ($mekanlar = $response->fetch_assoc()) {
                        ?>
                            <div class="slide">
                                <img src=<?php echo $mekanlar['fotograf'] ?> class="card-img-top img-mobile" width="150px;" height="150px">
                                <div class="card-body">
                                    <h3 class="card-title"> <?php echo $mekanlar['mekan_adi'] ?> </h3>
                                    <p class="card-text"> <?php echo $mekanlar['semt_ismi'] ?> </p>
                                    <div class="star-container">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <!-- burası için bir şey düşünülecek-->
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <span onclick="slideLeft(<?php echo $count ?>)" class="btn"></span>
                </div>
            </div>
    <?php
        $count++;
        }
    } else {
        echo "Bilinmeyen bir hata oluştu";
    }
    ?>


    <div class="mt-5 pt-5 pb-5 footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xs-12 about-company">
                    <p>Hakkımızda</p>
                    <p class="pr-5 text-white-50">Gezgin olarak seyahat severlerin Türkiye'nin muhteşem
                        destinasyonlarını keşfetmelerine rehberlik etmek için buradayız.
                        Bizimle keşfedin, düşlerinizdeki seyahati planlamaya başlayın! </p>

                </div>
                <div class="col-lg-4 col-xs-12 location">
                    <h4 class="mt-lg-0 mt-sm-4"></h4>
                    <p>Reklam ve iş birliği için bize ulaşın</p>
                    <p><a href="#"><i class="fab fa-facebook-f"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-instagram"></i></p>
                    <p><i class="fa fa-envelope"></i>info@gezgin.com</p>
                </div>
                <div class="col-lg-3 col-xs-12 links">
                    <h4 class="mt-lg-0 mt-sm-3"></h4>
                    <ul class="m-0 p-0">
                        <li><a href="#">Trabzon'da araç kiralama noktaları</a></li>
                        <li><a href="#">İstanbul' da gezilecek en güzel 10 yerı</a></li>
                        <li><a href="#">Ankara' da gezilecek en güzel 10 yer</a></li>
                        <li><a href="#">İzmir' de gezilecek en güzel 10 yer</a></li>
                        <li><a href="#">Antalya' da gezilecek en güzel 10 yer</a></li>
                        <li><a href="#">İstanbul' da araç kiralama noktaları</a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col copyright">
                    <p class=""><small class="text-white-50">© 2023. All Rights Reserved.</small></p>
                </div>
            </div>
        </div>
    </div>

    <script src="js/scripts_ana.js"></script> <!-- Bağlanacak olan JavaScript dosyası -->

</body>

</html>