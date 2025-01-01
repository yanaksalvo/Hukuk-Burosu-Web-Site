<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';
include 'functions.php';

$upload_path = '../uploads/team/';

// Ekip üyesi bilgilerini getir
if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = "SELECT * FROM team_members WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $member = $result->fetch_assoc();

    if(!$member) {
        header('Location: ekip-listele.php');
        exit;
    }
}

// Güncelleme işlemi
if(isset($_POST['update_member'])) {
    $id = (int)$_POST['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $email = $conn->real_escape_string($_POST['email']);
    $linkedin = $conn->real_escape_string($_POST['linkedin']);
    $order_number = (int)$_POST['order_number'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Yeni resim yüklendi
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['image']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if(in_array(strtolower($filetype), $allowed)) {
            $newname = uniqid() . '.' . $filetype;
            if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . $newname)) {
                // Eski resmi sil
                if($member['image'] && file_exists($upload_path . $member['image'])) {
                    unlink($upload_path . $member['image']);
                }
                
                $query = "UPDATE team_members SET 
                         name = ?, title = ?, description = ?, 
                         image = ?, email = ?, linkedin = ?, 
                         order_number = ? WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssssssii", $name, $title, $description, 
                                $newname, $email, $linkedin, $order_number, $id);
            }
        }
    } else {
        // Resim güncellenmedi
        $query = "UPDATE team_members SET 
                 name = ?, title = ?, description = ?, 
                 email = ?, linkedin = ?, order_number = ? 
                 WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssii", $name, $title, $description, 
                        $email, $linkedin, $order_number, $id);
    }

    if($stmt->execute()) {
        logActivity($conn, "Ekip üyesi güncellendi: " . $name, "team", "text-primary");
        $success = "Ekip üyesi başarıyla güncellendi.";
        
        // Güncel bilgileri getir
        $query = "SELECT * FROM team_members WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $member = $result->fetch_assoc();
    } else {
        $error = "Bir hata oluştu.";
    }
}
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Ekip Üyesi Düzenle</h2>

                        <?php if(isset($success)): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

                        <?php if(isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $member['id']; ?>">
                            
                            <div class="mb-3">
                                <label class="form-label">Mevcut Fotoğraf</label>
                                <div>
                                    <img src="<?php echo $upload_path . $member['image']; ?>" 
                                         alt="Ekip Üyesi" 
                                         style="max-height: 200px;" 
                                         class="img-thumbnail">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Yeni Fotoğraf (Opsiyonel)</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ad Soyad</label>
                                <input type="text" name="name" class="form-control" 
                                       value="<?php echo htmlspecialchars($member['name']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ünvan</label>
                                <input type="text" name="title" class="form-control" 
                                       value="<?php echo htmlspecialchars($member['title']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Açıklama</label>
                                <textarea name="description" class="form-control" 
                                          rows="4"><?php echo htmlspecialchars($member['description']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">E-posta</label>
                                <input type="email" name="email" class="form-control" 
                                       value="<?php echo htmlspecialchars($member['email']); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">LinkedIn Profili</label>
                                <input type="url" name="linkedin" class="form-control" 
                                       value="<?php echo htmlspecialchars($member['linkedin']); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sıra No</label>
                                <input type="number" name="order_number" class="form-control" 
                                       value="<?php echo $member['order_number']; ?>">
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="ekip-listele.php" class="btn btn-secondary">Geri Dön</a>
                                <button type="submit" name="update_member" class="btn btn-primary">Güncelle</button>
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
