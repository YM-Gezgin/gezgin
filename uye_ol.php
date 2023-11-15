<?php
require_once("baglan.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST ile gelen verileri al

    $isim = $_POST["isim"];
    $email = $_POST["email"];
    $sifre = $_POST["sifre"];
    $sifre_tekrar = $_POST["sifre_tekrar"];
    
    if(preg_match("/^[a-zA-ZüÜğĞıİşŞçÇöÖ\s]+$/", $isim)){
        echo "İsim: " . $isim . "<br>";
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-posta: " . $email . "<br>";
    }
    if (!(!preg_match("/[a-zA-Z]/", $sifre) || !preg_match("/\d/", $sifre) ||
    !preg_match("/[\W_]/", $sifre) || strlen($sifre) < 8 )) {
        echo "Sifre: " . $sifre . "<br>";
    }
    if($sifre==$sifre_tekrar){
        echo "Sifre Tekrarı: " . $sifre_tekrar . "<br>";
    }
    $hashedPassword = password_hash($sifre, PASSWORD_DEFAULT);

    echo "Hash'lenmiş Şifre: " . $hashedPassword . "<br>";
    
}

?>
