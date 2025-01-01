<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';
include 'functions.php';

$upload_path = '../assets/images/slider/';
if (!file_exists($upload_path)) {
    mkdir($upload_path, 0777, true);
}

// Slider ekleme
if(isset($_POST['add_slide'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $subtitle = $conn->real_escape_string($_POST['subtitle']);
    $button_text = $conn->real_escape_string($_POST['button_text']);
    $button_link = $conn->real_escape_string($_POST['button_link']);
    $order_number = (int)$_POST['order_number'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['image']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if(in_array(strtolower($filetype), $allowed)) {
            $newname = uniqid() . '.' . $filetype;
            if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . $newname)) {
                $query = "INSERT INTO hero_slides (title, subtitle, image, button_text, button_link, order_number)
                         VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("sssssi", $title, $subtitle, $newname, $button_text, $button_link, $order_number);
                
                if($stmt->execute()) {
                    logActivity($conn, "Yeni slider görseli eklendi: " . $title, "slider", "text-success");
                    $success = "Slider başarıyla eklendi.";
                } else {
                    $error = "Bir hata oluştu.";
                }
            }
        }
    }
}

// Slider silme
if(isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    
    $query = "SELECT title, image FROM hero_slides WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $slide = $result->fetch_assoc();

    if($slide['image'] && file_exists($upload_path . $slide['image'])) {
        unlink($upload_path . $slide['image']);
    }

    $query = "DELETE FROM hero_slides WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    if($stmt->execute()) {
        logActivity($conn, "Slider görseli silindi: " . $slide['title'], "slider", "text-danger");
        $success = "Slider başarıyla silindi.";
    }
}

// Slider listesi
$query = "SELECT * FROM hero_slides ORDER BY order_number ASC";
$slides = $conn->query($query);
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
        <h2>Slider Yönetimi</h2>
        
        <?php if(isset($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Yeni Slide Ekle</h5>
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Başlık</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alt Başlık</label>
                                <input type="text" name="subtitle" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Görsel</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Buton Metni</label>
                                <input type="text" name="button_text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Buton Linki</label>
                                <input type="text" name="button_link" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sıra No</label>
                                <input type="number" name="order_number" class="form-control" value="0">
                            </div>
                            <button type="submit" name="add_slide" class="btn btn-primary">Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mevcut Slidelar</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Görsel</th>
                                        <th>Başlık</th>
                                        <th>Sıra</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($slide = $slides->fetch_assoc()): ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo $upload_path . $slide['image']; ?>"
                                                 height="50" alt="Slider">
                                        </td>
                                        <td><?php echo $slide['title']; ?></td>
                                        <td><?php echo $slide['order_number']; ?></td>
                                        <td>
                                            <a href="edit-slider.php?id=<?php echo $slide['id']; ?>" 
                                               class="btn btn-sm btn-primary me-2">Düzenle</a>
                                            <a href="?delete=<?php echo $slide['id']; ?>"
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Bu slideı silmek istediğinizden emin misiniz?')">
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
