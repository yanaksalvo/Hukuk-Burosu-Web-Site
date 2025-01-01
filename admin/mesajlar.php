<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';
include 'functions.php';

// Mesaj okundu olarak işaretleme
if(isset($_GET['mark_read'])) {
    $id = (int)$_GET['mark_read'];
    $query = "UPDATE contact_messages SET is_read = 1 WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    if($stmt->execute()) {
        logActivity($conn, "Mesaj okundu olarak işaretlendi", "message", "text-info");
        $success = "Mesaj okundu olarak işaretlendi.";
    }
}

// Mesaj silme
if(isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $query = "DELETE FROM contact_messages WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    if($stmt->execute()) {
        logActivity($conn, "Mesaj silindi", "message", "text-danger");
        $success = "Mesaj başarıyla silindi.";
    }
}

// Mesajları listeleme
$query = "SELECT * FROM contact_messages ORDER BY created_at DESC";
$messages = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesajlar - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .unread {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .message-row {
            cursor: pointer;
        }
        .message-content {
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <?php include 'includes/admin-header.php'; ?>

    <div class="container py-5">
        <h2>Mesajlar</h2>
        
        <?php if(isset($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tarih</th>
                                <th>Ad Soyad</th>
                                <th>E-posta</th>
                                <th>Telefon</th>
                                <th>Mesaj</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($message = $messages->fetch_assoc()): ?>
                            <tr class="<?php echo $message['is_read'] ? '' : 'unread'; ?> message-row">
                                <td><?php echo date('d.m.Y H:i', strtotime($message['created_at'])); ?></td>
                                <td><?php echo htmlspecialchars($message['name']); ?></td>
                                <td><?php echo htmlspecialchars($message['email']); ?></td>
                                <td><?php echo htmlspecialchars($message['phone']); ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-link" data-bs-toggle="modal" 
                                            data-bs-target="#messageModal<?php echo $message['id']; ?>">
                                        Mesajı Görüntüle
                                    </button>
                                </td>
                                <td>
                                    <?php if($message['is_read']): ?>
                                        <span class="badge bg-success">Okundu</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning">Okunmadı</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(!$message['is_read']): ?>
                                    <a href="?mark_read=<?php echo $message['id']; ?>" 
                                       class="btn btn-sm btn-info me-2">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <?php endif; ?>
                                    <a href="?delete=<?php echo $message['id']; ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Bu mesajı silmek istediğinizden emin misiniz?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Mesaj Detay Modal -->
                            <div class="modal fade" id="messageModal<?php echo $message['id']; ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Mesaj Detayı</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Gönderen:</strong> <?php echo htmlspecialchars($message['name']); ?></p>
                                            <p><strong>E-posta:</strong> <?php echo htmlspecialchars($message['email']); ?></p>
                                            <p><strong>Telefon:</strong> <?php echo htmlspecialchars($message['phone']); ?></p>
                                            <p><strong>Tarih:</strong> <?php echo date('d.m.Y H:i', strtotime($message['created_at'])); ?></p>
                                            <hr>
                                            <p class="message-content"><?php echo nl2br(htmlspecialchars($message['message'])); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
