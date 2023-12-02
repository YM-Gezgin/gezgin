<?php
require("baglan.php");
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["g_email"];
    $sifre = $_POST["g_sifre"];

    $sql = "SELECT * FROM kullanici WHERE e_mail = ?";
    $stmt = $baglanti->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if (password_verify($sifre, $row['p_hash'])) {

            echo "Giriş yapıldı.";
            $_SESSION['isim'] = $row['ad_soyad'];
            header("Location: index.php");
            exit();

        } else {
            echo "Geçersiz şifre.";
        }
    }
    $stmt->close();
} else {
    echo "Sorgu hatası: " . $stmt->error;
}
?>
