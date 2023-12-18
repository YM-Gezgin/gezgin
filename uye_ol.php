<?php
require("baglan.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST ile gelen verileri al

    $isim = $_POST["isim"];
    $email = $_POST["email"];
    $sifre = $_POST["sifre"];
    $sifre_tekrar = $_POST["sifre_tekrar"];
    $hashed_password = password_hash($sifre, PASSWORD_DEFAULT);

    $premium_kontrol=0;
    $kullanici_tipi=0;
    $rota_sayac=0;

    $sql = "INSERT INTO kullanici (e_mail, ad_soyad, p_hash,premium_kontrol,kullanici_tipi,rota_sayac) 
    VALUES ('$email', '$isim', '$hashed_password','$premium_kontrol','$kullanici_tipi','$rota_sayac')";

    // Sorguyu çalıştırma
    try{
        
        if ($baglanti->query($sql) === TRUE) {
            header("Location: anaSayfa.html");
        } else {
            echo "Veri eklenirken bilinmeyen bir hata oluştu: " . $baglanti->error;
            header("Location: girisKayit.html");
            exit;

        }
    }
    catch (mysqli_sql_exception $e){
            echo "Mail adresi sisteme kayıtlı!";
            header("Location: girisKayit.html");
            exit;
    }
}
