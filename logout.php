<?php
session_start();

// Session'ı yok et
session_destroy();

// AJAX isteği için başlığı JSON olarak ayarla
header('Content-Type: application/json');

// Başarılı cevabı gönder
echo json_encode(['status' => 'success']);
?>