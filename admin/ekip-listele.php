<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';
include 'functions.php';

// Ekip üyesi silme
if(isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    
    // Önce mevcut resmi sil
    $query = "SELECT image, name FROM team_members WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $member = $result->fetch_assoc();

    if($member['image']) {
        $image_path = '../uploads/team/' . $member['image'];
        if(file_exists($image_path)) {
            unlink($image_path);
        }
    }

    // Veritabanından sil
    $query = "DELETE FROM team_members WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    if($stmt->execute()) {
        logActivity($conn, "Ekip üyesi silindi: " . $member['name'], "team", "text-danger");
        $success = "Ekip üyesi başarıyla silindi.";
    }
}

// Ekip listesi
$query = "SELECT * FROM team_members ORDER BY order_number ASC";
$team_members = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Müvekkil Yorumları - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/admin-header.php'; ?>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Ekip Listesi</h2>
            <a href="ekip-ekle.php" class="btn btn-primary">Yeni Ekip Üyesi Ekle</a>
        </div>

        <?php if(isset($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fotoğraf</th>
                                <th>Ad Soyad</th>
                                <th>Ünvan</th>
                                <th>Sıra No</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($member = $team_members->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <img src="../uploads/team/<?php echo $member['image']; ?>"
                                         height="50" alt="Ekip Üyesi">
                                </td>
                                <td><?php echo htmlspecialchars($member['name']); ?></td>
                                <td><?php echo htmlspecialchars($member['title']); ?></td>
                                <td><?php echo $member['order_number']; ?></td>
                                <td>
                                    <a href="ekip-duzenle.php?id=<?php echo $member['id']; ?>" 
                                       class="btn btn-sm btn-primary me-2">Düzenle</a>
                                    <a href="?delete=<?php echo $member['id']; ?>"
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Bu ekip üyesini silmek istediğinizden emin misiniz?')">
                                        Sil
                                    </a>
                                </td>
                            </tr>
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
