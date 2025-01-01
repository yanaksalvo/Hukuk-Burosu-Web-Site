<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';
include 'functions.php';

// Get testimonial ID
$id = (int)$_GET['id'];

// Update testimonial
if(isset($_POST['update_testimonial'])) {
    $client_name = $conn->real_escape_string($_POST['client_name']);
    $testimonial = $conn->real_escape_string($_POST['testimonial']);
    $featured = isset($_POST['featured']) ? 1 : 0;
    
    $query = "UPDATE testimonials SET client_name = ?, testimonial = ?, featured = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssii", $client_name, $testimonial, $featured, $id);
    
    if($stmt->execute()) {
        logActivity($conn, "Müvekkil yorumu güncellendi", "testimonial", "text-success");
        $success = "Yorum başarıyla güncellendi.";
    }
}

// Get testimonial data
$query = "SELECT * FROM testimonials WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$testimonial = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yorum Düzenle - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/admin-header.php'; ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Yorum Düzenle</h2>

                        <?php if(isset($success)): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Müvekkil Adı</label>
                                <input type="text" name="client_name" class="form-control" 
                                       value="<?php echo htmlspecialchars($testimonial['client_name']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Yorum</label>
                                <textarea name="testimonial" class="form-control" rows="4" required><?php 
                                    echo htmlspecialchars($testimonial['testimonial']); 
                                ?></textarea>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" name="featured" class="form-check-input" id="featured"
                                       <?php echo $testimonial['featured'] ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="featured">Öne Çıkan</label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" name="update_testimonial" class="btn btn-primary">Yorumu Güncelle</button>
                                <a href="yorumlar.php" class="btn btn-secondary">Geri Dön</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
