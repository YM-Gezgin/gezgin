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
    <link rel="stylesheet" href="css/styles_mekanTanitim.css">

</head>

<body>

    <?php require_once('navbar.php') 
    ?>


    <div class="container-wrapper">
        <div class="kesfet-container">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Sen gezmek istediğin şehri seç! Biz rotanı oluşturalım.</label>
            <form method="GET" action="mekanTanitim.php">
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="secilenSehir">
                    <option selected disabled>Gezmek istediğiniz şehri seçin</option>
                    <?php
                    $sql_sehirler = "SELECT sehir_adi, plaka FROM sehirler";
                    $sonuc = $baglanti->query($sql_sehirler);
                    while ($sehir_secimi = $sonuc->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $sehir_secimi['sehir_adi']; ?>"><?php echo $sehir_secimi['sehir_adi']; ?></option>
                    <?php } ?>
                </select>
            </form>

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
        $count = 1;
        while ($sehirler = $result->fetch_assoc()) {
    ?>
            <div id="card-container-<?php echo $count ?>" class="card-container">
                <div id="slider-container-<?php echo $count ?>" class="slider-container">
                    <h3>
                        <?php echo $count . "-" . $sehirler['sehir_adi'] ?>
                    </h3>
                    <span onclick="slideRight<?php echo $count ?>()" class="btn"></span>
                    <div id="slider-<?php echo $count ?>" class="slider">
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
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <span onclick="slideLeft<?php echo $count ?>()" class="btn"></span>
                </div>
            </div>
    <?php
            $count++;
        }
    } else {
        echo "Bilinmeyen bir hata oluştu";
    }
    ?>
    <div id="mekanTanitim">
        
    </div>

    <?php require_once('footer.php') ?>
    <script src="js/scripts_ana.js"></script>
</body>

</html>