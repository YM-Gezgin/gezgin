<?php
require("baglan.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["g_email"];
    $sifre = $_POST["g_sifre"];

    $sql = "SELECT * FROM kullanici WHERE e_mail = ?";
    $stmt = $baglanti->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if($row>0){
           if (password_verify($sifre, $row['p_hash'])) {

            echo 'success';

        } else {
            echo 'password';
        } 
        }
        else{
            echo 'mail';
        }

        
    }
    $stmt->close();
} 
?>
