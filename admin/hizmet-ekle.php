<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';
include 'functions.php';

if(isset($_POST['add_service'])) {
    $title = $conn->real_escape_string($_POST['title']);
    
    // İçeriği düzgün formatta alma
    $content = $_POST['content'];
    $lines = explode("\n", $content);
    $cleanLines = [];
    
    foreach($lines as $line) {
        $line = trim($line);
        if(!empty($line)) {
            $cleanLines[] = $line;
        }
    }
    
    $content = implode("\n", $cleanLines);
    $content = strip_tags($content);
    $content = $conn->real_escape_string($content);
    
    $order_query = "SELECT MAX(order_number) as max_order FROM services";
    $order_result = $conn->query($order_query);
    $max_order = $order_result->fetch_assoc()['max_order'];
    $order_number = $max_order + 1;

    $query = "INSERT INTO services (title, content, order_number) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $title, $content, $order_number);
    
    if($stmt->execute()) {
        logActivity($conn, "Yeni hizmet eklendi: " . $title, "service", "text-success");
        $success = "Hizmet başarıyla eklendi.";
        header("Location: hizmetler.php");
        exit;
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
    <title>Yeni Hizmet Ekle - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
</head>
<body>
    <?php include 'includes/admin-header.php'; ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Yeni Hizmet Ekle</h2>

                        <?php if(isset($success)): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

                        <?php if(isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Hizmet Başlığı</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hizmet Maddeleri</label>
                                <textarea id="content" name="content" class="form-control" required></textarea>
                                <small class="text-muted">Her maddeyi yeni bir satıra yazın ve başına - işareti ekleyin.</small>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" name="add_service" class="btn btn-primary">Hizmet Ekle</button>
                                <a href="hizmetler.php" class="btn btn-secondary">Geri Dön</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        CKEDITOR.replace('content', {
            height: 500,
            language: 'tr',
            enterMode: CKEDITOR.ENTER_BR,
            shiftEnterMode: CKEDITOR.ENTER_P,
            removePlugins: 'elementspath',
            entities: false,
            entities_latin: false,
            allowedContent: true,
            forcePasteAsPlainText: true,
            removeFormatAttributes: '',
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
</body>
</html>
