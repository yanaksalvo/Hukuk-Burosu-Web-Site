<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';
include 'functions.php';

if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Get service title for logging
    $query = "SELECT title FROM services WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $service = $result->fetch_assoc();
    
    // Delete the service
    $query = "DELETE FROM services WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    
    if($stmt->execute()) {
        logActivity($conn, "Hizmet silindi: " . $service['title'], "service", "text-danger");
        $_SESSION['success'] = "Hizmet başarıyla silindi.";
    } else {
        $_SESSION['error'] = "Hizmet silinirken bir hata oluştu.";
    }
}

header('Location: hizmetler.php');
exit;
