<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/navbar.css">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="nav-container mx a">
            <a class="navbar-brand" href="index.php">gezgin
                <a href="index.php" class="custom-link">Premium'u Keşfet</a>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span> <i class="fas fa-bars" style="color: #fa8000;"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="kesfet.php"><i class="fas fa-search"></i> Keşfet </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-car"></i> Otel & Araç Kiralama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="hakkimizdaLink" href="#">Hakkımızda</a>
                </li>
                <li class="nav-item giris-yap" id="logged">

                    <?php
                    session_start();

                    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
                        echo "<script> 
                document.getElementById('logged').innerHTML = 
                '<a class=\"nav-link\" href=\"login.php\" id=\"giris\"><i class=\"fas fa-user icon\"></i> Giriş Yap</a>';
            </script>";
                    } else {
                        echo "<script> 
                document.getElementById('logged').innerHTML = 
                '<a class=\"nav-link\" href=\"profilim.php\" id=\"giris\"><i class=\"fas fa-user icon\"></i> Profilim</a>';
            </script>";
                    }
                    ?>


                </li>
            </ul>
        </div>
    </nav>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        var hakkimizdaLink = document.getElementById("hakkimizdaLink");

        hakkimizdaLink.addEventListener("click", function(event) {
        document.body.scrollIntoView({ behavior: "smooth", block: "end" });
        event.preventDefault();
    });
});
    </script>
    <div class="container-fluid">
        <hr>
    </div>

</body>

</html>