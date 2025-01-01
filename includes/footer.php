<footer class="footer">
    <div class="footer-top py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4>Gureba Hukuk</h4>
                    <p>30 yıllık tecrübemizle hukuksal sorunlarınıza profesyonel çözümler sunuyoruz.</p>
                    <div class="social-links">
                        <?php if(isset($contact_info['facebook']) && !empty($contact_info['facebook'])): ?>
                            <a href="<?php echo $contact_info['facebook']; ?>"><i class="fab fa-facebook"></i></a>
                        <?php endif; ?>
                        <?php if(isset($contact_info['twitter']) && !empty($contact_info['twitter'])): ?>
                            <a href="<?php echo $contact_info['twitter']; ?>"><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>
                        <?php if(isset($contact_info['linkedin']) && !empty($contact_info['linkedin'])): ?>
                            <a href="<?php echo $contact_info['linkedin']; ?>"><i class="fab fa-linkedin"></i></a>
                        <?php endif; ?>
                        <?php if(isset($contact_info['instagram']) && !empty($contact_info['instagram'])): ?>
                            <a href="<?php echo $contact_info['instagram']; ?>"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Hizmetlerimiz</h4>
                    <ul class="footer-links">
                        <li><a href="hizmetler.php#ceza">Ceza Hukuku</a></li>
                        <li><a href="hizmetler.php#aile">Aile Hukuku</a></li>
                        <li><a href="hizmetler.php#ticaret">Ticaret Hukuku</a></li>
                        <li><a href="hizmetler.php#is">İş Hukuku</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>Hızlı Bağlantılar</h4>
                    <ul class="footer-links">
                        <li><a href="index.php">Ana Sayfa</a></li>
                        <li><a href="ekip.php">Ekibimiz</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="iletisim.php">İletişim</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>İletişim</h4>
                    <ul class="footer-contact">
                        <li><i class="fas fa-map-marker-alt"></i> <?php echo isset($contact_info['address']) ? $contact_info['address'] : ''; ?></li>
                        <li><i class="fas fa-phone"></i> <?php echo isset($contact_info['phone']) ? $contact_info['phone'] : ''; ?></li>
                        <li><i class="fas fa-envelope"></i> <?php echo isset($contact_info['email']) ? $contact_info['email'] : ''; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    &copy; 2024 Gureba Hukuk Bürosu. Tüm hakları saklıdır.
                </div>
                <div class="col-md-6 text-end">
                    <a href="gizlilik-politikasi.php">Gizlilik Politikası</a> |
                    <a href="kullanim-sartlari.php">Kullanım Şartları</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
