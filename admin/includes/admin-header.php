<?php
// Okunmamış mesaj sayısını çek
$unread_query = "SELECT COUNT(*) as unread FROM contact_messages WHERE is_read = 0";
$unread_result = $conn->query($unread_query);
$unread_count = $unread_result->fetch_assoc()['unread'];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Gureba Hukuk Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
            <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-dashboard me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-newspaper me-2"></i> Blog
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="blog-ekle.php">Yazı Ekle</a></li>
                        <li><a class="dropdown-item" href="blog-listele.php">Yazıları Listele</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-users me-2"></i> Ekip
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="ekip-ekle.php">Üye Ekle</a></li>
                        <li><a class="dropdown-item" href="ekip-listele.php">Üyeleri Listele</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="yorumlar.php">
                        <i class="fas fa-comments me-2"></i> Yorumlar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="slider.php">
                        <i class="fas fa-images me-2"></i> Slider
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mesajlar.php">
                        <i class="fas fa-envelope me-2"></i> Mesajlar
                        <?php if($unread_count > 0): ?>
                            <span class="badge bg-danger ms-2"><?php echo $unread_count; ?> yeni</span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hizmetler.php">
                        <i class="fas fa-briefcase me-2"></i> Hizmetler
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="iletisim-ayarlari.php">
                        <i class="fas fa-address-card me-2"></i> İletişim
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <i class="fas fa-sign-out-alt me-2"></i> Çıkış
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
