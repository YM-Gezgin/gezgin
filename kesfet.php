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
        <h5 style="text-align: center;">Hala kararsız mısın? Ocak ayının enlerine beraber göz atalım!</h5>
    </div>

    <?php
    for ($i = 7; $i < 9; $i++) {
        $sql_mekan_tur = "SELECT mekan_adi,semt_ismi,fotograf FROM mekanlar WHERE mt_id='$i'";
        $response = $baglanti->query($sql_mekan_tur);

        $sql_mekan_baslik = "SELECT tur_adi FROM mekan_türleri WHERE mt_id='$i'";
        $result = $baglanti->query($sql_mekan_baslik);
        $mekan_baslik = $result->fetch_assoc();
    ?>
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide mx-auto" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $count = 0;
                    while ($mekan_baslik2 = $response->fetch_assoc()) {
                        echo '<li data-target="#carouselExampleCaptions" data-slide-to="' . $count . '"';
                        if ($count == 0) {
                            echo ' class="active"';
                        }
                        echo '></li>';

                        $count++;
                    }
                    ?>
                </ol>

                <div class="carousel-inner">
                    <?php
                    $count = 0;
                    $response->data_seek(0); // Reset pointer to the beginning
                    while ($mekan_baslik2 = $response->fetch_assoc()) {
                        if ($count % 4 == 0) {
                            // Start a new row for every 4 items
                            echo '<div class="carousel-item ' . (($count == 0) ? 'active' : '') . '"><div class="container"><h2>' . $mekan_baslik['tur_adi'] . '</h2><div class="row">';
                        }
                    ?>
                        <div class="col-xs-3 mx-auto">
                            <div class="card">
                                <img class="card-image" src="<?php echo $mekan_baslik2['fotograf']; ?>" alt="mekan">
                                <p style="font-size: 20px;"><?php echo $mekan_baslik2['mekan_adi']; ?></p>
                                <p><?php echo $mekan_baslik2['semt_ismi']; ?></p>
                            </div>
                        </div>
                    <?php
                        if (($count + 1) % 4 == 0 || $count + 1 == $response->num_rows) {
                            // Close the row after every 4 items or at the end
                            echo '</div></div></div>';
                        }
                        $count++;
                    }
                    ?>

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
    }
    ?>

    <?php require_once("footer.php") ?>

</body>

</html>
