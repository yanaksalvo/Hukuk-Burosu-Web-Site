<?php
require_once 'includes/config.php';
include 'includes/header.php';
?>

<div class="container py-5">
    <h1 class="text-center mb-5">Müvekkil Yorumları</h1>
    
    <div class="row">
        <?php
        $query = "SELECT * FROM testimonials WHERE status = 1 ORDER BY created_at DESC";
        $testimonials = $conn->query($query);
        
        while($testimonial = $testimonials->fetch_assoc()):
        ?>
        <div class="col-md-6 mb-4">
            <div class="testimonial-box">
                <p>"<?php echo htmlspecialchars($testimonial['testimonial']); ?>"</p>
                <div class="client">- <?php echo htmlspecialchars($testimonial['client_name']); ?></div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
