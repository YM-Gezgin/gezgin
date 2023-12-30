<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // AJAX isteği ile gelen rotaları al
  $rotalar = $_POST["rotalar"];
  $_SESSION["rotalar"] = [];
  
   foreach ($rotalar as $rota) {
    $_SESSION["rotalar"][] = $rota;
   }
   echo 'success';
}
?>
