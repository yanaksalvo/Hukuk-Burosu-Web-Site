<?php
$host = 'localhost';
$dbname = 'gureba_hukuk';
$username = 'root';
$password = '';

try {
    $conn = new mysqli($host, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");
    
    if ($conn->connect_error) {
        throw new Exception("Bağlantı hatası: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}

// Mevcut veritabanı bağlantı kodlarından sonra
$contact_query = "SELECT * FROM contact_info LIMIT 1";
$contact_result = $conn->query($contact_query);
$contact_info = $contact_result->fetch_assoc();
?>
