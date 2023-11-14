<?php
$baglanti = new mysqli("localhost", "root", "", "trip_database:v2");

if ($baglanti->connect_errno > 0) {
    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
}

echo "MySQL bağlantısı başarıyla gerçekleştirildi.";

?>