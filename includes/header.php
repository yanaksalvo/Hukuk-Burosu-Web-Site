<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gureba Hukuk Bürosu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="top-bar bg-dark text-white py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <i class="fas fa-phone"></i> <?php echo isset($contact_info['phone']) ? $contact_info['phone'] : ''; ?>
                    <i class="fas fa-envelope ms-3"></i> <?php echo isset($contact_info['email']) ? $contact_info['email'] : ''; ?>
                </div>
                <div class="col-md-6 text-end">
                    <?php if(isset($contact_info['facebook']) && !empty($contact_info['facebook'])): ?>
                        <a href="<?php echo $contact_info['facebook']; ?>" class="text-white me-2"><i class="fab fa-facebook"></i></a>
                    <?php endif; ?>
                    <?php if(isset($contact_info['twitter']) && !empty($contact_info['twitter'])): ?>
                        <a href="<?php echo $contact_info['twitter']; ?>" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?>
                    <?php if(isset($contact_info['linkedin']) && !empty($contact_info['linkedin'])): ?>
                        <a href="<?php echo $contact_info['linkedin']; ?>" class="text-white me-2"><i class="fab fa-linkedin"></i></a>
                    <?php endif; ?>
                    <?php if(isset($contact_info['instagram']) && !empty($contact_info['instagram'])): ?>
                        <a href="<?php echo $contact_info['instagram']; ?>" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                </div>            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/logo.png" alt="Gureba Hukuk" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Ana Sayfa</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Hizmetlerimiz</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="hizmetler.php#ceza">Ceza Hukuku</a></li>
                            <li><a class="dropdown-item" href="hizmetler.php#aile">Aile Hukuku</a></li>
                            <li><a class="dropdown-item" href="hizmetler.php#ticaret">Ticaret Hukuku</a></li>
                            <li><a class="dropdown-item" href="hizmetler.php#is">İş Hukuku</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ekip.php">Ekibimiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link contact-btn" href="iletisim.php">İletişim</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
