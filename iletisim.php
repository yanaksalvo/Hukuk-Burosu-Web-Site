<?php
include 'includes/config.php';  // Önce config dosyası
$query = "SELECT * FROM contact_info LIMIT 1";
$result = $conn->query($query);
$contact_info = $result->fetch_assoc();

include 'includes/header.php';  // Sonra header dosyası

// Form işlemleri
if(isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);
   
    $query = "INSERT INTO contact_messages (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);
   
    if($stmt->execute()) {
        $success = "Mesajınız başarıyla gönderildi.";
    } else {
        $error = "Bir hata oluştu.";
    }
}
?>
  <!-- Harita -->
  <div class="map-container rounded-3 shadow-sm overflow-hidden">
      <?php 
      if(isset($contact_info['maps_embed']) && !empty($contact_info['maps_embed'])) {
          // Decode HTML entities and strip slashes if any
          $maps_code = html_entity_decode(stripslashes($contact_info['maps_embed']));
          // Output the cleaned iframe code
          echo $maps_code;
      }
      ?>
  </div>
                <h1 class="text-center m-0 py-3">İletişim</h1>
            </div>
        </div>
    </div>
<!-- İletişim Bölümü -->
<div class="contact-section py-5 mb-5">
    <div class="container">
        <div class="row g-4">
            <!-- İletişim Formu -->
            <div class="col-lg-6">
                <div class="contact-form bg-white p-4 rounded-3 shadow-sm">
                    <h3 class="section-title mb-4">Bize Ulaşın</h3>
        
                    <?php if(isset($success)): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $success; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php endif; ?>
        
                    <?php if(isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php endif; ?>
        
                    <form method="post" class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Adınız Soyadınız *</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">E-posta Adresiniz *</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Telefon Numaranız</label>
                                <input type="tel" class="form-control" name="phone">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Konu *</label>
                                <input type="text" class="form-control" name="subject" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Mesajınız *</label>
                                <textarea class="form-control" name="message" rows="5" required></textarea>
                            </div>
                            <div class="col-12">
                                <small class="text-muted">* ile işaretli alanların doldurulması zorunludur.</small>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-paper-plane me-2"></i>Mesajı Gönder
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- İletişim Bilgileri -->
            <div class="col-lg-6">
                <div class="contact-info bg-white p-4 rounded-3 shadow-sm">
                    <h3 class="section-title mb-4">İletişim Bilgileri</h3>
                    <div class="info-items">
                        <div class="info-item d-flex align-items-center mb-4">
                            <div class="icon-box me-3">
                                <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                            </div>
                            <div class="info-content">
                                <h5 class="mb-1">Adres</h5>
                                <p class="mb-0"><?php echo isset($contact_info['address']) ? $contact_info['address'] : ''; ?></p>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center mb-4">
                            <div class="icon-box me-3">
                                <i class="fas fa-phone fa-2x text-primary"></i>
                            </div>
                            <div class="info-content">
                                <h5 class="mb-1">Telefon</h5>
                                <p class="mb-0"><?php echo isset($contact_info['phone']) ? $contact_info['phone'] : ''; ?></p>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center mb-4">
                            <div class="icon-box me-3">
                                <i class="fas fa-envelope fa-2x text-primary"></i>
                            </div>
                            <div class="info-content">
                                <h5 class="mb-1">E-posta</h5>
                                <p class="mb-0"><?php echo isset($contact_info['email']) ? $contact_info['email'] : ''; ?></p>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center">
                            <div class="icon-box me-3">
                                <i class="fas fa-clock fa-2x text-primary"></i>
                            </div>
                            <div class="info-content">
                                <h5 class="mb-1">Çalışma Saatleri</h5>
                                <p class="mb-0">Pazartesi - Cuma: 09:00 - 18:00<br>Cumartesi: 09:00 - 13:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><style>
.page-header {
    background: linear-gradient(rgba(0,46,91,0.9), rgba(0,46,91,0.9)), url('assets/img/header-bg.jpg');
    background-position: center;
    background-size: cover;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: #fff;
}

.section-title {
    color: #002e5b;
    font-weight: 600;
    position: relative;
    padding-bottom: 15px;
}

.section-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background: #002e5b;
}

.contact-section {
    background: #f8f9fa;
}

.info-item .icon-box {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0,46,91,0.1);
    border-radius: 50%;
}

.form-control {
    padding: 0.75rem;
    border: 1px solid #dee2e6;
}

.form-control:focus {
    border-color: #002e5b;
    box-shadow: 0 0 0 0.2rem rgba(0,46,91,0.25);
}

.btn-primary {
    background: #002e5b;
    border-color: #002e5b;
    padding: 0.75rem 1.5rem;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: #001f3d;
    border-color: #001f3d;
    transform: translateY(-2px);
}


.map-container {
    position: relative;
    width: 100%;
    height: 300px;
}

.map-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}



@media (max-width: 991px) {
    .contact-info {
        margin-bottom: 2rem;
    }
}
</style>

<?php include 'includes/footer.php'; ?>
