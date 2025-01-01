<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';
include 'functions.php';

$upload_path = '../uploads/team/';
if (!file_exists($upload_path)) {
    mkdir($upload_path, 0777, true);
}

if(isset($_POST['add_member'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $email = $conn->real_escape_string($_POST['email']);
    $linkedin = $conn->real_escape_string($_POST['linkedin']);
    $order_number = (int)$_POST['order_number'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['image']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if(in_array(strtolower($filetype), $allowed)) {
            $newname = uniqid() . '.' . $filetype;
            if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . $newname)) {
                $query = "INSERT INTO team_members (name, title, description, image, email, linkedin, order_number) 
                         VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssssssi", $name, $title, $description, $newname, $email, $linkedin, $order_number);
                
                if($stmt->execute()) {
                    logActivity($conn, "Yeni ekip üyesi eklendi: " . $name, "team", "text-info");
                    $success = "Ekip üyesi başarıyla eklendi.";
                } else {
                    $error = "Bir hata oluştu.";
                }
            }
        }
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
                        <h2 class="card-title mb-4">Ekip Üyesi Ekle</h2>

                        <?php if(isset($success)): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

                        <?php if(isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Ad Soyad</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ünvan</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Açıklama</label>
                                <textarea name="description" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fotoğraf</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">E-posta</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">LinkedIn Profili</label>
                                <input type="url" name="linkedin" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sıra No</label>
                                <input type="number" name="order_number" class="form-control" value="0">
                            </div>

                            <button type="submit" name="add_member" class="btn btn-primary">Ekip Üyesi Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
