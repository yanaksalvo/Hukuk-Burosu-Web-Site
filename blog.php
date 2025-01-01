<?php
include 'includes/config.php';
include 'includes/header.php';

// Sayfalama ayarları
$posts_per_page = 6;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $posts_per_page;

// Toplam yazı sayısı
$total_query = "SELECT COUNT(*) as total FROM blog_posts";
$total_result = $conn->query($total_query);
$total_posts = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_posts / $posts_per_page);

// Mevcut sayfadaki yazıları çek
$query = "SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT ? OFFSET ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $posts_per_page, $offset);
$stmt->execute();
$result = $stmt->get_result();
?>

<!-- Page Header -->
<div class="page-header text-white" style="background-color: #01346b;">
    <div class="container">
        <h1 class="text-center m-0 py-3">Blog Yazıları</h1>
    </div>
</div>

<!-- Blog Section -->
<section class="blog-section py-5">
    <div class="container">
        <div class="row">
            <?php while($post = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <?php if($post['image']): ?>
                    <img src="uploads/blog/<?php echo htmlspecialchars($post['image']); ?>"
                         class="card-img-top"
                         alt="<?php echo htmlspecialchars($post['title']); ?>">
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <h3 class="card-title h5"><?php echo htmlspecialchars($post['title']); ?></h3>
                        <p class="card-text text-muted">
                            <?php echo substr(strip_tags($post['content']), 0, 150); ?>...
                        </p>
                    </div>
                    
                    <div class="card-footer bg-white border-top-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-calendar-alt me-1"></i>
                                <?php echo date('d.m.Y', strtotime($post['created_at'])); ?>
                            </small>
                            <a href="blog-detay.php?id=<?php echo $post['id']; ?>" class="btn btn-primary btn-sm">
                                Devamını Oku
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <?php if($total_pages > 1): ?>
        <nav aria-label="Blog sayfaları" class="mt-4">
            <ul class="pagination justify-content-center">
                <?php for($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>
            </ul>
        </nav>
        <?php endif; ?>
    </div>
</section>

<style>
.card-img-top {
    height: 200px;
    object-fit: cover;
}
.card {
    transition: transform 0.2s;
}
.card:hover {
    transform: translateY(-5px);
}
</style>

<?php include 'includes/footer.php'; ?>
