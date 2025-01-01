<?php
include 'includes/header.php';
include 'includes/config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = "SELECT * FROM blog_posts WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if(!$post) {
    header('Location: blog.php');
    exit;
}
?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <article class="blog-post">
                <?php if($post['image']): ?>
                <img src="uploads/blog/<?php echo htmlspecialchars($post['image']); ?>"
                     class="img-fluid rounded mb-4 w-100"
                     style="max-height: 400px; object-fit: cover;"
                     alt="<?php echo htmlspecialchars($post['title']); ?>">
                <?php endif; ?>
                
                <h1 class="mb-4"><?php echo htmlspecialchars($post['title']); ?></h1>
                
                <div class="text-muted mb-4">
                    <i class="fas fa-calendar-alt"></i> 
                    Yayın tarihi: <?php echo date('d.m.Y', strtotime($post['created_at'])); ?>
                </div>
                
                <div class="blog-content">
                    <?php echo $post['content']; ?>
                </div>
            </article>
            
            <div class="mt-5">
                <a href="blog.php" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Blog'a Dön
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
