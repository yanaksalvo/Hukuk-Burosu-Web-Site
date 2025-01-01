<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';
include 'functions.php';

$upload_path = '../uploads/blog/';
if (!file_exists($upload_path)) {
    mkdir($upload_path, 0777, true);
}
if(isset($_POST['add_post'])) {
    $title = $conn->real_escape_string($_POST['title']);
    
    // İçeriği temizleme
    $content = $_POST['content'];
    $content = str_replace(['\\r\\n', '\\r', '\\n', "\r\n", "\r", "\n"], '', $content);
    $content = preg_replace('/\s+/', ' ', $content);
    $content = trim($content);
    $content = $conn->real_escape_string($content);
    
    $meta_description = $conn->real_escape_string($_POST['meta_description']);
    $slug = createSlug($title);

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['image']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if(in_array(strtolower($filetype), $allowed)) {
            $newname = uniqid() . '.' . $filetype;
            if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . $newname)) {
                $query = "INSERT INTO blog_posts (title, content, image, meta_description, slug, created_at) 
                       VALUES (?, ?, ?, ?, ?, NOW())";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("sssss", $title, $content, $newname, $meta_description, $slug);
              
                if($stmt->execute()) {
                    logActivity($conn, "Yeni blog yazısı eklendi: " . $title, "blog", "text-success");
                    $success = "Blog yazısı başarıyla eklendi.";
                } else {
                    $error = "Bir hata oluştu.";
                }
            }
        }
    }
}function createSlug($string) {
    $turkish = array("ı", "ğ", "ü", "ş", "ö", "ç", "İ", "Ğ", "Ü", "Ş", "Ö", "Ç");
    $english = array("i", "g", "u", "s", "o", "c", "i", "g", "u", "s", "o", "c");
    $string = str_replace($turkish, $english, $string);
    $string = strtolower(trim($string));
    $string = preg_replace('/[^a-z0-9-]/', '-', $string);
    $string = preg_replace('/-+/', "-", $string);
    return $string;
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
      <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
      <style>
          .blog-form-container {
              background: #fff;
              padding: 20px;
              border-radius: 8px;
              box-shadow: 0 0 15px rgba(0,0,0,0.1);
          }
      </style>
      <script src="https://cdn.ckeditor.com/4.25.0-lts/full/ckeditor.js"></script>
  </head>
  <body>
      <?php include 'includes/admin-header.php'; ?>

      <div class="container py-5">
          <div class="row justify-content-center">
              <div class="col-md-10">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title mb-4">Yeni Blog Yazısı Ekle</h2>

                          <?php if(isset($success)): ?>
                          <div class="alert alert-success"><?php echo $success; ?></div>
                          <?php endif; ?>

                          <?php if(isset($error)): ?>
                          <div class="alert alert-danger"><?php echo $error; ?></div>
                          <?php endif; ?>

                          <form method="post" enctype="multipart/form-data">
                              <div class="mb-3">
                                  <label class="form-label">Başlık</label>
                                  <input type="text" name="title" class="form-control" required>
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Meta Açıklama</label>
                                  <textarea name="meta_description" class="form-control" rows="2"></textarea>
                                  <small class="text-muted">SEO için kısa açıklama (max. 160 karakter)</small>
                              </div>

                              <div class="mb-4">
                                  <div class="row">
                                      <div class="col-12">
                                          <label class="form-label fw-bold">Blog Yazısı İçeriği</label>
                                          <textarea id="content" name="content" class="form-control"></textarea>
                                      </div>
                                  </div>
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Kapak Görseli</label>
                                  <input type="file" name="image" class="form-control" required>
                              </div>

                              <button type="submit" name="add_post" class="btn btn-primary">Blog Yazısı Ekle</button>
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
              enterMode: CKEDITOR.ENTER_P,
              forceEnterMode: true,
              entities: false,
              entities_latin: false,
              allowedContent: true,
              removePlugins: 'save,newpage,preview,print',
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
          });      </script>
  </body>
  </html>