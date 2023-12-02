<?php
require("baglan.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST ile gelen verileri al

    $isim = $_POST["isim"];
    $email = $_POST["email"];
    $sifre = $_POST["sifre"];
    $sifre_tekrar = $_POST["sifre_tekrar"];

    if (preg_match("/^[a-zA-ZüÜğĞıİşŞçÇöÖ\s]+$/", $isim)) {
        echo "İsim: " . $isim . "<br>";
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-posta: " . $email . "<br>";
    }
    if (!(!preg_match("/[a-zA-Z]/", $sifre) || !preg_match("/\d/", $sifre) ||
        !preg_match("/[\W_]/", $sifre) || strlen($sifre) < 8)) {
        echo "Sifre: " . $sifre . "<br>";
    }
    if ($sifre == $sifre_tekrar) {
        echo "Sifre Tekrarı: " . $sifre_tekrar . "<br>";
    }
    $hashed_password = password_hash($sifre, PASSWORD_DEFAULT);

    $premium_kontrol=0;
    $kullanici_tipi=0;
    $rota_sayac=0;

    $sql = "INSERT INTO kullanici (e_mail, ad_soyad, p_hash,premium_kontrol,kullanici_tipi,rota_sayac) 
    VALUES ('$email', '$isim', '$hashed_password','$premium_kontrol','$kullanici_tipi','$rota_sayac')";

    // Sorguyu çalıştırma
    if ($baglanti->query($sql) === TRUE) {
        echo "Veri başarıyla eklendi.";
    } else {
        echo "Veri eklenirken hata oluştu: " . $baglanti->error;
    }

}
