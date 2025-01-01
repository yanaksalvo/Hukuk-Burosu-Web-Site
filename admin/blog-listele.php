<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include '../includes/config.php';

// Delete blog post
if(isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $query = "DELETE FROM blog_posts WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Get all blog posts
$query = "SELECT * FROM blog_posts ORDER BY created_at DESC";
$blog_posts = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Yazıları - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/admin-header.php'; ?>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">Blog Yazıları</h5>
                        <a href="blog-ekle.php" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Yeni Yazı Ekle
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Görsel</th>
                                    <th>Başlık</th>
                                    <th>Tarih</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($post = $blog_posts->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $post['id']; ?></td>
                                    <td>
                                        <?php if($post['image']): ?>
                                            <img src="../uploads/blog/<?php echo $post['image']; ?>"
                                                 alt="<?php echo htmlspecialchars($post['title']); ?>"
                                                 class="img-thumbnail"
                                                 style="width: 100px; height: 60px; object-fit: cover;">
                                        <?php else: ?>
                                            <div class="bg-light text-center" style="width: 100px; height: 60px;">
                                                <i class="fas fa-image text-muted" style="line-height: 60px;"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($post['title']); ?></td>
                                    <td><?php echo date('d.m.Y', strtotime($post['created_at'])); ?></td>
                                    <td>
                                        <a href="blog-duzenle.php?id=<?php echo $post['id']; ?>"
                                           class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?delete=<?php echo $post['id']; ?>"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Bu yazıyı silmek istediğinizden emin misiniz?')">
                                            <i class="fas fa-trash"></i>
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
