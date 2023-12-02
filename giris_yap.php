<?php
require("baglan.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST ile gelen verileri al

    $email = $_POST["email"];
    $sifre = $_POST["sifre"];
    
    $hashed_password = password_hash($sifre, PASSWORD_DEFAULT);

    $premium_kontrol=0;
    $kullanici_tipi=0;
    $rota_sayac=0;

    $sql = "SELECT e_mail, p_hash from kullanici ";

    // Sorguyu çalıştırma
    if ($baglanti->query($sql) === TRUE) {
        echo "Veri başarıyla eklendi.";
    } else {
        echo "Veri eklenirken hata oluştu: " . $baglanti->error;
    }

}
