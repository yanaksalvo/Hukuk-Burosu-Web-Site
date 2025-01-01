<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Mesajı çek
$query = "SELECT * FROM contact_messages WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$message = $result->fetch_assoc();

if(!$message) {
    header('Location: mesajlar.php');
    exit;
}

// Mesajı okundu olarak işaretle
if(!$message['is_read']) {
    $query = "UPDATE contact_messages SET is_read = 1 WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesaj Detayı - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Admin Panel</a>
            <div class="navbar-nav ms-auto">
                <a href="mesajlar.php" class="nav-link">← Mesajlara Dön</a>
                <a href="logout.php" class="nav-link">Çıkış</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo htmlspecialchars($message['subject']); ?></h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Gönderen:</strong> <?php echo htmlspecialchars($message['name']); ?>
                </div>
                <div class="mb-3">
                    <strong>E-posta:</strong> <?php echo htmlspecialchars($message['email']); ?>
                </div>
                <div class="mb-3">
                    <strong>Tarih:</strong> <?php echo date('d.m.Y H:i', strtotime($message['created_at'])); ?>
                </div>
                <div class="mb-3">
                    <strong>Mesaj:</strong>
                    <p class="mt-2"><?php echo nl2br(htmlspecialchars($message['message'])); ?></p>
                </div>
                
                <a href="mailto:<?php echo $message['email']; ?>" class="btn btn-primary">E-posta Gönder</a>
                <a href="mesajlar.php" class="btn btn-secondary">Geri Dön</a>
                <a href="mesajlar.php?delete=<?php echo $message['id']; ?>" 
                   class="btn btn-danger"
                   onclick="return confirm('Bu mesajı silmek istediğinizden emin misiniz?')">Sil</a>
            </div>
        </div>
    </div>
</body>
</html>
