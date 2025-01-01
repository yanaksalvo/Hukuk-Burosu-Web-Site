<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';

if(isset($_POST['submit'])) {
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $facebook = $conn->real_escape_string($_POST['facebook']);
    $twitter = $conn->real_escape_string($_POST['twitter']);
    $instagram = $conn->real_escape_string($_POST['instagram']);
    $linkedin = $conn->real_escape_string($_POST['linkedin']);
    $maps_embed = $conn->real_escape_string($_POST['maps_embed']);

    $query = "UPDATE contact_info SET 
        phone = ?, 
        email = ?, 
        address = ?, 
        facebook = ?, 
        twitter = ?, 
        instagram = ?, 
        linkedin = ?,
        maps_embed = ?
        WHERE id = 1";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssss", $phone, $email, $address, $facebook, $twitter, $instagram, $linkedin, $maps_embed);

    if($stmt->execute()) {
        $success = "İletişim bilgileri başarıyla güncellendi.";
    } else {
        $error = "Bir hata oluştu: " . $conn->error;
    }
}

$query = "SELECT * FROM contact_info LIMIT 1";
$result = $conn->query($query);
$contact_info = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Ayarları - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php
    include 'includes/admin-header.php';
    include '../includes/config.php';

    // ... [previous PHP code remains the same] ...
    ?>

    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-4">İletişim Bilgileri Ayarları</h2>

                <?php if(isset($success)): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $success; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if(isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form method="post" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Telefon Numarası</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($contact_info['phone']); ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">E-posta Adresi</label>
                        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($contact_info['email']); ?>" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Adres</label>
                        <textarea name="address" class="form-control" rows="3" required><?php echo htmlspecialchars($contact_info['address']); ?></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Facebook</label>
                        <input type="url" name="facebook" class="form-control" value="<?php echo htmlspecialchars($contact_info['facebook']); ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Twitter</label>
                        <input type="url" name="twitter" class="form-control" value="<?php echo htmlspecialchars($contact_info['twitter']); ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Instagram</label>
                        <input type="url" name="instagram" class="form-control" value="<?php echo htmlspecialchars($contact_info['instagram']); ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">LinkedIn</label>
                        <input type="url" name="linkedin" class="form-control" value="<?php echo htmlspecialchars($contact_info['linkedin']); ?>">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Google Maps Harita Yerleştirme Kodu</label>
                        <textarea name="maps_embed" class="form-control" rows="4"><?php echo htmlspecialchars($contact_info['maps_embed']); ?></textarea>
                        <small class="text-muted">Google Maps'ten aldığınız iframe kodunu buraya yapıştırın.</small>
                    </div>

                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Kaydet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
