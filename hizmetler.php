<?php 
include 'includes/config.php';
include 'includes/header.php';

// Hizmetleri getir
$query = "SELECT * FROM services ORDER BY order_number ASC";
$services = $conn->query($query);
?>

<div class="page-header text-white" style="background-color: #01346b;">
    <div class="container">
        <h1 class="text-center m-0 py-3">Hizmetlerimiz</h1>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <?php while($service = $services->fetch_assoc()): ?>
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title"><?php echo htmlspecialchars($service['title']); ?></h3>
                    <p class="card-text">
                        <?php echo nl2br(htmlspecialchars($service['content'])); ?>
                    </p>
                </div>
            </div>
        </div>        <?php endwhile; ?>
    </div>
</div>

<style>
.card {
    transition: transform 0.3s ease;
    border: none;
}

.card:hover {
    transform: translateY(-5px);
}

.card-title {
    color: #01346b;
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

.card-text {
    color: #555;
    line-height: 1.6;
}

.shadow-sm {
    box-shadow: 0 2px 15px rgba(0,0,0,0.08) !important;
}
</style>

<?php include 'includes/footer.php'; ?>
