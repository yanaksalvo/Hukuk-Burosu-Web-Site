<?php
require_once 'includes/config.php';
include 'includes/header.php';
?>
  <!-- Hero Section -->
  <div id="heroSlider" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
          <?php
          $query = "SELECT * FROM hero_slides WHERE active = 1 ORDER BY order_number ASC";
          $slides = $conn->query($query);
          $first = true;
        
          if($slides && $slides->num_rows > 0):
              while($slide = $slides->fetch_assoc()):
          ?>
          <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
              <div class="hero-wrapper">
                  <img src="assets/images/slider/<?php echo $slide['image']; ?>" class="hero-image" alt="<?php echo $slide['title']; ?>">
                  <div class="hero-overlay"></div>
                  <div class="hero-content">
                      <div class="container">
                          <h1><?php echo $slide['title']; ?></h1>
                          <p><?php echo $slide['subtitle']; ?></p>
                          <?php if($slide['button_text']): ?>
                          <a href="<?php echo $slide['button_link']; ?>" class="btn btn-primary">
                              <?php echo $slide['button_text']; ?>
                              <i class="fas fa-arrow-right ms-2"></i>
                          </a>
                          <?php endif; ?>
                      </div>
                  </div>
              </div>
          </div>
          <?php
              $first = false;
              endwhile;
          endif;
          ?>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
          <i class="fas fa-chevron-left"></i>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
          <i class="fas fa-chevron-right"></i>
      </button>
  </div>

  <style>
  #heroSlider {
      position: relative;
      margin-bottom: 2rem;
  }

  .hero-wrapper {
      position: relative;
      width: 100%;
      height: 0;
      padding-bottom: 35%; /* Daha kompakt görünüm */
  }

  .hero-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
  }

  .hero-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(
          to right,
          rgba(0, 46, 91, 0.9) 0%,
          rgba(0, 46, 91, 0.7) 50%,
          rgba(0, 46, 91, 0.4) 100%
      );
  }
    .hero-content {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
    }

    .content-box {
        max-width: 600px;
        padding: 2rem;
        background: rgba(0, 46, 91, 0.3);
        backdrop-filter: blur(5px);
        border-radius: 10px;
        border-left: 4px solid #fff;
    }

    .hero-content h1 {
        color: #fff;
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.2;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .hero-content p {
        color: #fff;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        opacity: 0.9;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    }
  .hero-content .btn {
      padding: 0.8rem 2rem;
      font-weight: 500;
      border-radius: 5px;
      transition: all 0.3s ease;
  }

  .hero-content .btn:hover {
      transform: translateX(5px);
  }

  .carousel-control-prev,
  .carousel-control-next {
      width: 50px;
      height: 50px;
      background: rgba(0, 46, 91, 0.7);
      border-radius: 50%;
      top: 50%;
      transform: translateY(-50%);
      opacity: 0;
      transition: all 0.3s ease;
  }

  .carousel-control-prev {
      left: 20px;
  }

  .carousel-control-next {
      right: 20px;
  }

  #heroSlider:hover .carousel-control-prev,
  #heroSlider:hover .carousel-control-next {
      opacity: 1;
  }

  .carousel-control-prev i,
  .carousel-control-next i {
      color: #fff;
      font-size: 1.2rem;
  }

  .carousel-fade .carousel-item {
      transition: opacity 0.6s ease-in-out;
  }

  @media (max-width: 991px) {
      .hero-wrapper {
          padding-bottom: 45%;
      }
    
      .content-box {
          max-width: 500px;
      }

      .hero-content h1 {
          font-size: 2.2rem;
      }
  }

  @media (max-width: 576px) {
      .hero-wrapper {
          padding-bottom: 60%;
      }
    
      .content-box {
          max-width: 100%;
          margin: 0 1rem;
      }

      .hero-content h1 {
          font-size: 1.8rem;
      }

      .hero-content p {
          font-size: 1rem;
      }
  }
  </style>
</style><section class="features py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-balance-scale"></i>
                    <h3>Uzman Kadro</h3>
                    <p>Alanında uzman avukatlarımızla hizmetinizdeyiz.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-handshake"></i>
                    <h3>Güvenilir Hizmet</h3>
                    <p>Müvekkillerimizin haklarını en iyi şekilde savunuyoruz.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-clock"></i>
                    <h3>7/24 Destek</h3>
                    <p>Acil durumlarınızda yanınızdayız.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="practice-areas py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Uzmanlık Alanlarımız</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="practice-box">
                    <i class="fas fa-gavel"></i>
                    <h4>Ceza Hukuku</h4>
                    <a href="hizmetler.php#ceza" class="btn btn-outline-primary">Detaylı Bilgi</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="practice-box">
                    <i class="fas fa-home"></i>
                    <h4>Aile Hukuku</h4>
                    <a href="hizmetler.php#aile" class="btn btn-outline-primary">Detaylı Bilgi</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="practice-box">
                    <i class="fas fa-briefcase"></i>
                    <h4>Ticaret Hukuku</h4>
                    <a href="hizmetler.php#ticaret" class="btn btn-outline-primary">Detaylı Bilgi</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="practice-box">
                    <i class="fas fa-users"></i>
                    <h4>İş Hukuku</h4>
                    <a href="hizmetler.php#is" class="btn btn-outline-primary">Detaylı Bilgi</a>
                </div>
            </div>
        </div>
    </div>
</section>
  <section class="testimonials py-5">
      <div class="container">
          <h2 class="text-center mb-5">Müvekkil Yorumları</h2>
          <div class="row">
              <?php
              $query = "SELECT * FROM testimonials WHERE status = 1 ORDER BY RAND() LIMIT 3";
              $testimonials = $conn->query($query);
              while($testimonial = $testimonials->fetch_assoc()):
              ?>
              <div class="col-md-4">
                  <div class="testimonial-box">
                      <p>"<?php echo htmlspecialchars($testimonial['testimonial']); ?>"</p>
                      <div class="client">- <?php echo htmlspecialchars($testimonial['client_name']); ?></div>
                  </div>
              </div>
              <?php endwhile; ?>
          </div>
          <div class="text-center mt-4">
              <a href="yorumlar.php" class="btn btn-primary">Tüm Yorumları Gör</a>
          </div>
      </div>
  </section>
<?php include 'includes/footer.php'; ?>
