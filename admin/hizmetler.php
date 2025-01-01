<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';

// Get services
$query = "SELECT * FROM services ORDER BY order_number ASC";
$services = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hizmetler - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/admin-header.php'; ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Hizmetler</h2>
        <a href="hizmet-ekle.php" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Yeni Hizmet Ekle
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sıra</th>
                            <th>Başlık</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($service = $services->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $service['order_number']; ?></td>
                            <td><?php echo htmlspecialchars($service['title']); ?></td>
                            <td>
                                <a href="hizmet-duzenle.php?id=<?php echo $service['id']; ?>" 
                                   class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="hizmet-sil.php?id=<?php echo $service['id']; ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Bu hizmeti silmek istediğinizden emin misiniz?')">
                                    <i class="fas fa-trash"></i>
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
