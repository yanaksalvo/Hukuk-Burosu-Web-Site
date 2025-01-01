<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';
include 'functions.php';

// Yorum silme
if(isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $query = "DELETE FROM testimonials WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    if($stmt->execute()) {
        logActivity($conn, "Müvekkil yorumu silindi", "testimonial", "text-danger");
        $success = "Yorum başarıyla silindi.";
    }
}

// Yorum ekleme
if(isset($_POST['add_testimonial'])) {
    $client_name = $conn->real_escape_string($_POST['client_name']);
    $testimonial = $conn->real_escape_string($_POST['testimonial']);
    $featured = isset($_POST['featured']) ? 1 : 0;
    
    $query = "INSERT INTO testimonials (client_name, testimonial, featured) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $client_name, $testimonial, $featured);
    
    if($stmt->execute()) {
        logActivity($conn, "Yeni müvekkil yorumu eklendi", "testimonial", "text-success");
        $success = "Yorum başarıyla eklendi.";
    }
}

// Yorumları listele
$query = "SELECT * FROM testimonials ORDER BY created_at DESC";
$testimonials = $conn->query($query);
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
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Yeni Yorum Ekle</h5>
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Müvekkil Adı</label>
                                <input type="text" name="client_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Yorum</label>
                                <textarea name="testimonial" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="featured" class="form-check-input" id="featured">
                                <label class="form-check-label" for="featured">Öne Çıkan</label>
                            </div>
                            <button type="submit" name="add_testimonial" class="btn btn-primary">Yorum Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Yorumlar</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Müvekkil</th>
                                        <th>Yorum</th>
                                        <th>Öne Çıkan</th>
                                        <th>Tarih</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($testimonial = $testimonials->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($testimonial['client_name']); ?></td>
                                        <td><?php echo htmlspecialchars(substr($testimonial['testimonial'], 0, 50)) . '...'; ?></td>
                                        <td><?php echo $testimonial['featured'] ? 'Evet' : 'Hayır'; ?></td>
                                        <td><?php echo date('d.m.Y', strtotime($testimonial['created_at'])); ?></td>
                                        <td>
                                            <a href="yorum-duzenle.php?id=<?php echo $testimonial['id']; ?>" 
                                               class="btn btn-sm btn-primary">Düzenle</a>
                                            <a href="?delete=<?php echo $testimonial['id']; ?>" 
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Bu yorumu silmek istediğinizden emin misiniz?')">Sil</a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
