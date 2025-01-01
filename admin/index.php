<?php
// Oturum kontrolü
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Veritabanı bağlantısı
include '../includes/config.php';
// İstatistikler için sorgular
$blog_count = $conn->query("SELECT COUNT(*) as count FROM blog_posts")->fetch_assoc()['count'];
$team_count = $conn->query("SELECT COUNT(*) as count FROM team_members")->fetch_assoc()['count'];
$slider_count = $conn->query("SELECT COUNT(*) as count FROM hero_slides")->fetch_assoc()['count'];
$messages_count = $conn->query("SELECT COUNT(*) as count FROM contact_messages WHERE is_read = 0")->fetch_assoc()['count'];
$testimonials_count = $conn->query("SELECT COUNT(*) as count FROM testimonials")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Gureba Hukuk</title>
    <!-- CSS Dosyaları -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Dashboard Stil Tanımlamaları -->
    <style>
        .dashboard-card {
            transition: transform 0.3s;
            cursor: pointer;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .quick-action {
            transition: all 0.3s;
        }
        .quick-action:hover {
            background: #f8f9fa;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Admin Header -->
    <?php include 'includes/admin-header.php'; ?>

    <div class="container py-5">
        <!-- Karşılama Başlığı -->
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="mb-4">Hoş Geldiniz, Admin</h2>
            </div>
        </div>

        <!-- İstatistik Kartları Bölümü -->
        <div class="row mb-5">
            <!-- Yeni Mesaj Kartı -->
            <div class="col-md-3">
                <div class="card dashboard-card bg-primary text-white">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope stat-icon"></i>
                        <h3><?php echo $messages_count; ?></h3>
                        <p class="mb-0">Yeni Mesaj</p>
                    </div>
                </div>
            </div>
            <!-- Blog Yazısı Kartı -->
            <div class="col-md-3">
                <div class="card dashboard-card bg-success text-white">
                    <div class="card-body text-center">
                        <i class="fas fa-newspaper stat-icon"></i>
                        <h3><?php echo $blog_count; ?></h3>
                        <p class="mb-0">Blog Yazısı</p>
                    </div>
                </div>
            </div>
            <!-- Ekip Üyesi Kartı -->
            <div class="col-md-3">
                <div class="card dashboard-card bg-info text-white">
                    <div class="card-body text-center">
                        <i class="fas fa-users stat-icon"></i>
                        <h3><?php echo $team_count; ?></h3>
                        <p class="mb-0">Ekip Üyesi</p>
                    </div>
                </div>
            </div>
            <!-- Slider Görseli Kartı -->
            <div class="col-md-3">
                <div class="card dashboard-card bg-warning text-white">
                    <div class="card-body text-center">
                        <i class="fas fa-images stat-icon"></i>
                        <h3><?php echo $slider_count; ?></h3>
                        <p class="mb-0">Slider Görseli</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alt Bölüm Kartları -->
        <div class="row">
            <!-- Hızlı İşlemler Kartı -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Hızlı İşlemler</h5>
                    </div>
                    <div class="card-body p-0">
                        <a href="blog-ekle.php" class="d-block p-3 text-decoration-none text-dark quick-action border-bottom">
                            <i class="fas fa-plus-circle me-2 text-success"></i>
                            Yeni Blog Yazısı Ekle
                        </a>
                        <a href="ekip-ekle.php" class="d-block p-3 text-decoration-none text-dark quick-action border-bottom">
                            <i class="fas fa-user-plus me-2 text-primary"></i>
                            Yeni Ekip Üyesi Ekle
                        </a>
                        <a href="slider.php" class="d-block p-3 text-decoration-none text-dark quick-action border-bottom">
                            <i class="fas fa-image me-2 text-info"></i>
                            Slider Yönetimi
                        </a>
                        <a href="mesajlar.php" class="d-block p-3 text-decoration-none text-dark quick-action">
                            <i class="fas fa-envelope me-2 text-warning"></i>
                            Mesajları Görüntüle
                        </a>
                    </div>
                </div>
            </div>

            <!-- Son Aktiviteler Kartı -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Son Aktiviteler</h5>
                    </div>
                    <div class="card-body">
                        <div class="activity-timeline">
                            <?php
                            // Son aktiviteleri getir
                            $query = "SELECT * FROM activities ORDER BY created_at DESC LIMIT 5";
                            $activities = $conn->query($query);

                            if($activities->num_rows > 0):
                                while($activity = $activities->fetch_assoc()):
                                    $time_ago = getTimeAgo($activity['created_at']);
                            ?>
                            <p>
                                <i class="fas fa-circle <?php echo $activity['color']; ?> me-2"></i>
                                <?php echo htmlspecialchars($activity['description']); ?>
                                <small class="text-muted">(<?php echo $time_ago; ?>)</small>
                            </p>
                            <?php
                                endwhile;
                            else:
                            ?>
                            <p class="text-muted">Henüz aktivite bulunmuyor.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Zaman hesaplama fonksiyonu
    function getTimeAgo($timestamp) {
        $time_ago = strtotime($timestamp);
        $current_time = time();
        $time_difference = $current_time - $time_ago;
        $seconds = $time_difference;

        $minutes = round($seconds / 60);
        $hours = round($seconds / 3600);
        $days = round($seconds / 86400);

        if($seconds <= 60) {
            return "az önce";
        }
        else if($minutes <= 60) {
            return $minutes . " dakika önce";
        }
        else if($hours <= 24) {
            return $hours . " saat önce";
        }
        else {
            return $days . " gün önce";
        }
    }
    ?>

    <!-- JavaScript Dosyaları -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
