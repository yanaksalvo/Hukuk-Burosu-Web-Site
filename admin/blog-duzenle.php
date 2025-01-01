<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if(isset($_POST['submit'])) {
    $title = $conn->real_escape_string($_POST['title']);
    
    // İçeriği temizleme
    $content = $_POST['content'];
    $content = str_replace(['\\r\\n', '\\r', '\\n', "\r\n", "\r", "\n"], '', $content);
    $content = preg_replace('/\s+/', ' ', $content);
    $content = trim($content);
    $content = $conn->real_escape_string($content);

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['image']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(in_array(strtolower($filetype), $allowed)) {
            $query = "SELECT image FROM blog_posts WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $post = $result->fetch_assoc();
            
            // Check if file exists before trying to delete
            if($post['image'] && file_exists('../uploads/blog/' . $post['image'])) {
                unlink('../uploads/blog/' . $post['image']);
            }
            
            $newname = uniqid() . '.' . $filetype;
            if(move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/blog/' . $newname)) {
                $query = "UPDATE blog_posts SET title = ?, content = ?, image = ? WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("sssi", $title, $content, $newname, $id);
            }
        }
    } else {
        $query = "UPDATE blog_posts SET title = ?, content = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $title, $content, $id);
    }
    
    if($stmt->execute()) {
        $success = "Blog yazısı başarıyla güncellendi.";
    } else {
        $error = "Bir hata oluştu.";
    }
}
$query = "SELECT * FROM blog_posts WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if(!$post) {
    header('Location: blog-listele.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Düzenle - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
</head>
<body>
    <script>
    CKEDITOR.replace('content', {
        height: 500,
        language: 'tr',
        toolbarGroups: [
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
            '/',
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },
            { name: 'insert', groups: [ 'insert' ] },
            '/',
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'colors', groups: [ 'colors' ] },
            { name: 'tools', groups: [ 'tools' ] }
        ]
    });
    </script>
    <?php include 'includes/admin-header.php'; ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Blog Yazısını Düzenle</h2>
                        
                        <?php if(isset($success)): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>
                        
                        <?php if(isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label">Başlık</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="<?php echo htmlspecialchars($post['title']); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="content" class="form-label">İçerik</label>
                                <textarea class="form-control" id="content" name="content" required><?php echo trim(htmlspecialchars($post['content'])); ?></textarea>
                            </div>
                            
                            <?php if($post['image']): ?>
                            <div class="mb-3">
                                <label class="form-label">Mevcut Görsel</label>
                                <div>
                                    <img src="../uploads/blog/<?php echo htmlspecialchars($post['image']); ?>"
                                         alt="Mevcut görsel" style="max-width: 200px;">
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Yeni Görsel (Opsiyonel)</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Güncelle
                                </button>
                                <a href="blog-listele.php" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Geri Dön
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    CKEDITOR.replace('content', {
        height: 500,
        language: 'tr',
        enterMode: CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        removePlugins: 'elementspath',
        toolbarGroups: [
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
            '/',
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },
            { name: 'insert', groups: [ 'insert' ] },
            '/',
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'colors', groups: [ 'colors' ] },
            { name: 'tools', groups: [ 'tools' ] }
        ]
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
