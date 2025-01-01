<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';

$upload_path = '../assets/images/slider/';

// Get slider data
if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = "SELECT * FROM hero_slides WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $slide = $result->fetch_assoc();

    if(!$slide) {
        header('Location: slider.php');
        exit;
    }
}

// Update slider
if(isset($_POST['update_slide'])) {
    $id = (int)$_POST['id'];
    $title = $conn->real_escape_string($_POST['title']);
    $subtitle = $conn->real_escape_string($_POST['subtitle']);
    $button_text = $conn->real_escape_string($_POST['button_text']);
    $button_link = $conn->real_escape_string($_POST['button_link']);
    $order_number = (int)$_POST['order_number'];
    $active = isset($_POST['active']) ? 1 : 0;

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // New image uploaded
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['image']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if(in_array(strtolower($filetype), $allowed)) {
            $newname = uniqid() . '.' . $filetype;
            if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . $newname)) {
                // Delete old image
                if($slide['image'] && file_exists($upload_path . $slide['image'])) {
                    unlink($upload_path . $slide['image']);
                }
                
                $query = "UPDATE hero_slides SET 
                         title = ?, subtitle = ?, image = ?, 
                         button_text = ?, button_link = ?, 
                         active = ?, order_number = ? 
                         WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("sssssiis", $title, $subtitle, $newname, 
                                $button_text, $button_link, $active, 
                                $order_number, $id);
            }
        }
    } else {
        // No new image
        $query = "UPDATE hero_slides SET 
                 title = ?, subtitle = ?, 
                 button_text = ?, button_link = ?, 
                 active = ?, order_number = ? 
                 WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssiis", $title, $subtitle, 
                        $button_text, $button_link, 
                        $active, $order_number, $id);
    }

    if($stmt->execute()) {
        $success = "Slider başarıyla güncellendi.";
    } else {
        $error = "Bir hata oluştu.";
    }
    
    // Refresh slide data
    $query = "SELECT * FROM hero_slides WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $slide = $result->fetch_assoc();
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
                        <h2 class="card-title mb-4">Slider Düzenle</h2>

                        <?php if(isset($success)): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

                        <?php if(isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $slide['id']; ?>">
                            
                            <div class="mb-3">
                                <label class="form-label">Mevcut Görsel</label>
                                <div>
                                    <img src="<?php echo $upload_path . $slide['image']; ?>" 
                                         alt="Current Slide" 
                                         style="max-height: 200px;" 
                                         class="img-thumbnail">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Yeni Görsel (Opsiyonel)</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Başlık</label>
                                <input type="text" name="title" class="form-control" 
                                       value="<?php echo htmlspecialchars($slide['title']); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alt Başlık</label>
                                <input type="text" name="subtitle" class="form-control" 
                                       value="<?php echo htmlspecialchars($slide['subtitle']); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Buton Metni</label>
                                <input type="text" name="button_text" class="form-control" 
                                       value="<?php echo htmlspecialchars($slide['button_text']); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Buton Linki</label>
                                <input type="text" name="button_link" class="form-control" 
                                       value="<?php echo htmlspecialchars($slide['button_link']); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sıra No</label>
                                <input type="number" name="order_number" class="form-control" 
                                       value="<?php echo $slide['order_number']; ?>">
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" name="active" class="form-check-input" 
                                           id="activeCheck" <?php echo $slide['active'] ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="activeCheck">Aktif</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="slider.php" class="btn btn-secondary">Geri Dön</a>
                                <button type="submit" name="update_slide" class="btn btn-primary">Güncelle</button>
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
