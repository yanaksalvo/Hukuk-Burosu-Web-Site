-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 26 Ara 2024, 12:33:26
-- Sunucu sürümü: 9.1.0
-- PHP Sürümü: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `gureba_hukuk`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `activity_type` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `description` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `activities`
--

INSERT INTO `activities` (`id`, `activity_type`, `description`, `icon`, `color`, `created_at`) VALUES
(1, 'team', 'Yeni ekip üyesi eklendi: Zafer Kara', '', 'text-info', '2024-12-25 13:33:24'),
(2, 'team', 'Yeni ekip üyesi eklendi: Aslı Bostan', '', 'text-info', '2024-12-25 13:34:48'),
(3, 'team', 'Ekip üyesi silindi: Av. Mehmet Yılmaz', '', 'text-danger', '2024-12-25 13:36:23'),
(4, 'team', 'Ekip üyesi silindi: Av. Ayşe Demir', '', 'text-danger', '2024-12-25 13:36:30'),
(5, 'team', 'Ekip üyesi güncellendi: Av. Rıza Altıner', '', 'text-primary', '2024-12-25 13:36:43'),
(6, 'team', 'Ekip üyesi güncellendi: Av. Rıza Altıner', '', 'text-primary', '2024-12-25 13:37:22'),
(7, 'team', 'Ekip üyesi güncellendi: Av. Aslı Bostan', '', 'text-primary', '2024-12-25 13:37:38'),
(8, 'team', 'Ekip üyesi güncellendi: Av. Zafer Kara', '', 'text-primary', '2024-12-25 13:37:45'),
(9, 'team', 'Yeni ekip üyesi eklendi: Stajyer Av. Özlem Altıner', '', 'text-info', '2024-12-25 13:40:05'),
(15, 'service', 'Yeni hizmet eklendi: örnek hizmet', '', 'text-success', '2024-12-25 17:32:13'),
(14, 'service', 'Yeni hizmet eklendi: deneem', '', 'text-success', '2024-12-25 17:30:27'),
(13, 'service', 'Yeni hizmet eklendi: deneee', '', 'text-success', '2024-12-25 17:28:54'),
(16, 'service', 'Yeni hizmet eklendi: wawsdsadasd', '', 'text-success', '2024-12-25 17:37:48'),
(17, 'service', 'Yeni hizmet eklendi: asdasdasd', '', 'text-success', '2024-12-25 17:44:08'),
(18, 'service', 'Yeni hizmet eklendi: hizmet', '', 'text-success', '2024-12-25 17:47:12'),
(19, 'service', 'Yeni hizmet eklendi: hizmeter', '', 'text-success', '2024-12-25 17:50:21'),
(20, 'service', 'Yeni hizmet eklendi: Deneme hizmetler', '', 'text-success', '2024-12-25 18:02:26'),
(21, 'service', 'Yeni hizmet eklendi: denememeeee', '', 'text-success', '2024-12-25 18:05:06'),
(22, 'service', 'Yeni hizmet eklendi: deneme hizmet', '', 'text-success', '2024-12-25 18:07:25'),
(23, 'service', 'Yeni hizmet eklendi: dedadsa', '', 'text-success', '2024-12-25 18:24:39'),
(24, 'service', 'Yeni hizmet eklendi: asdasdas', '', 'text-success', '2024-12-25 18:42:43'),
(25, 'blog', 'Yeni blog yazısı eklendi: 123412312', '', 'text-success', '2024-12-25 18:53:50'),
(26, 'blog', 'Yeni blog yazısı eklendi: 123412312', '', 'text-success', '2024-12-25 18:55:45'),
(27, 'blog', 'Yeni blog yazısı eklendi: 123412312', '', 'text-success', '2024-12-25 18:56:51'),
(28, 'blog', 'Yeni blog yazısı eklendi: 123412312', '', 'text-success', '2024-12-25 18:57:11'),
(29, 'blog', 'Yeni blog yazısı eklendi: asad1212', '', 'text-success', '2024-12-25 19:06:03'),
(30, 'blog', 'Yeni blog yazısı eklendi: dedas', '', 'text-success', '2024-12-25 22:59:28'),
(31, 'blog', 'Yeni blog yazısı eklendi: denemem', '', 'text-success', '2024-12-25 23:02:52'),
(32, 'service', 'Yeni hizmet eklendi: Hizmet deneme', '', 'text-success', '2024-12-25 23:05:24'),
(33, 'service', 'Yeni hizmet eklendi: hizmet', '', 'text-success', '2024-12-25 23:06:35'),
(34, 'service', 'Yeni hizmet eklendi: hizmetler', '', 'text-success', '2024-12-25 23:09:40'),
(35, 'service', 'Yeni hizmet eklendi: hizmetler', '', 'text-success', '2024-12-25 23:11:03'),
(36, 'service', 'Yeni hizmet eklendi: asdasdasd', '', 'text-success', '2024-12-25 23:17:41'),
(37, 'service', 'Hizmet güncellendi: asdasdasd', '', 'text-success', '2024-12-26 00:07:20'),
(38, 'service', 'Hizmet güncellendi: asdasdasd', '', 'text-success', '2024-12-26 00:07:38'),
(39, 'service', 'Hizmet silindi: asdasdasd', '', 'text-danger', '2024-12-26 00:17:57'),
(40, 'service', 'Hizmet silindi: hizmetler', '', 'text-danger', '2024-12-26 00:17:59'),
(41, 'service', 'Hizmet silindi: hizmetler', '', 'text-danger', '2024-12-26 00:18:01'),
(42, 'service', 'Hizmet silindi: hizmet', '', 'text-danger', '2024-12-26 00:18:02'),
(43, 'service', 'Hizmet silindi: Hizmet deneme', '', 'text-danger', '2024-12-26 00:18:03'),
(44, 'service', 'Yeni hizmet eklendi: deneme hizmet', '', 'text-success', '2024-12-26 00:18:49'),
(45, 'blog', 'Yeni blog yazısı eklendi: deneme blog yazısı', '', 'text-success', '2024-12-26 00:19:54'),
(46, 'service', 'Hizmet silindi: deneme hizmet', '', 'text-danger', '2024-12-26 00:20:21'),
(47, 'message', 'Mesaj okundu olarak işaretlendi', '', 'text-info', '2024-12-26 01:19:28'),
(48, 'message', 'Mesaj okundu olarak işaretlendi', '', 'text-info', '2024-12-26 01:19:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', '$2y$10$IzVF4DVBhshyd4DGgIvbK.3slBUa7F7mgD.BK9NxCv63bg5ZlU91y', 'admin@gurebahukuk.com', '2024-12-25 12:10:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `content` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `meta_description` varchar(160) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `content`, `image`, `meta_description`, `slug`, `created_at`) VALUES
(20, 'Ticaret Hukuku ve Şirket Kuruluşu: Kapsamlı Rehber 2024', '<h2>Ticaret Hukuku ve Şirket Kuruluşu: G&uuml;ncel Rehber</h2><p>T&uuml;rkiye&#39;de şirket kurmak isteyen girişimciler i&ccedil;in hazırladığımız bu kapsamlı rehberde, şirket t&uuml;rlerinden kuruluş aşamalarına, maliyetlerden yasal y&uuml;k&uuml;ml&uuml;l&uuml;klere kadar t&uuml;m detayları ele alacağız.</p><h3>1. Şirket T&uuml;rleri ve &Ouml;zellikleri</h3><h4>Limited Şirket</h4><p>Limited şirketler, k&uuml;&ccedil;&uuml;k ve orta &ouml;l&ccedil;ekli işletmeler i&ccedil;in en uygun şirket t&uuml;r&uuml;d&uuml;r. Minimum 1 ortak ile kurulabilir ve sermaye alt limiti 10.000 TL&#39;dir. Ortakların sorumluluğu koydukları sermaye ile sınırlıdır.</p><h4>Anonim Şirket</h4><p>Anonim şirketler daha b&uuml;y&uuml;k &ouml;l&ccedil;ekli işletmeler i&ccedil;in uygundur. Minimum sermaye tutarı 50.000 TL&#39;dir ve en az 1 ortak gereklidir. Halka a&ccedil;ılma potansiyeli olan şirketler i&ccedil;in ideal bir se&ccedil;enektir.</p><h3>2. Şirket Kuruluş Aşamaları</h3><h4>2.1. &Ouml;n Hazırlık</h4><ul> <li>Şirket unvanı belirlenmesi ve kontrol&uuml;</li> <li>Ana s&ouml;zleşmenin hazırlanması</li> <li>Gerekli belgelerin temini</li> <li>Kuruluş sermayesinin hazırlanması</li></ul><h4>2.2. Resmi Başvuru S&uuml;reci</h4><ul> <li>Ticaret Sicil M&uuml;d&uuml;rl&uuml;ğ&uuml;ne başvuru</li> <li>Vergi dairesi işlemleri</li> <li>SGK işlemleri</li> <li>Belediye ruhsat işlemleri</li></ul><h3>3. Maliyetler ve Har&ccedil;lar</h3><p>Şirket kuruluşunda karşılaşacağınız temel maliyetler şunlardır:</p><ul> <li>Ticaret Sicil harcı</li> <li>Rekabet Kurumu payı</li> <li>Noter masrafları</li> <li>Ticaret Odası kayıt &uuml;creti</li></ul><h3>4. Vergisel Y&uuml;k&uuml;ml&uuml;l&uuml;kler</h3><p>Şirketinizi kurduktan sonra d&uuml;zenli olarak yerine getirmeniz gereken vergisel y&uuml;k&uuml;ml&uuml;l&uuml;kler:</p><ul> <li>Kurumlar Vergisi (Yıllık %20)</li> <li>KDV beyannameleri (Aylık)</li> <li>Ge&ccedil;ici vergi beyannameleri (3 ayda bir)</li> <li>Gelir stopaj beyannameleri</li></ul><h3>5. Şirket Y&ouml;netimi ve Organizasyon</h3><p>Başarılı bir şirket y&ouml;netimi i&ccedil;in dikkat edilmesi gereken konular:</p><ul> <li>Y&ouml;netim kurulu/m&uuml;d&uuml;rler kurulu oluşturulması</li> <li>İ&ccedil; y&ouml;nergelerin hazırlanması</li> <li>G&ouml;rev ve yetki dağılımının belirlenmesi</li> <li>Profesyonel destek alınacak alanların tespiti</li></ul><h3>6. Yasal Defterler ve Kayıt D&uuml;zeni</h3><p>Tutulması zorunlu olan defterler:</p><ul> <li>Yevmiye defteri</li> <li>Defteri kebir</li> <li>Envanter defteri</li> <li>Pay defteri (Ortaklar defteri)</li> <li>Y&ouml;netim kurulu karar defteri</li></ul><h3>7. Sonu&ccedil; ve &Ouml;neriler</h3><p>Şirket kuruluşu, detaylı planlanması ve profesyonel destek alınması gereken &ouml;nemli bir s&uuml;re&ccedil;tir. Doğru şirket t&uuml;r&uuml;n&uuml;n se&ccedil;imi, gerekli sermayenin hazırlanması ve yasal y&uuml;k&uuml;ml&uuml;l&uuml;klerin eksiksiz yerine getirilmesi başarılı bir başlangı&ccedil; i&ccedil;in kritik &ouml;neme sahiptir.</p><p>Hukuk b&uuml;romuz, şirket kuruluşu s&uuml;recinde ihtiya&ccedil; duyacağınız t&uuml;m hukuki danışmanlık hizmetlerini sunmaktadır. Detaylı bilgi ve destek i&ccedil;in bizimle iletişime ge&ccedil;ebilirsiniz.</p>', '676c3beb844ee.jpg', NULL, 'ticaret-hukuku-ve-sirket-kurulusu-kapsamli-rehber-2024', '2024-12-25 15:34:59'),
(17, 'İdare Hukuku ve Vatandaş Hakları: Kapsamlı Rehber', '<h2>İdare Hukuku Nedir?</h2><p>İdare hukuku, devlet ile vatandaşlar arasındaki ilişkileri d&uuml;zenleyen, kamu hizmetlerinin işleyişini ve vatandaşların haklarını koruyan temel hukuk dalıdır. Bu yazımızda vatandaşların idari işlemler karşısındaki haklarını ve başvuru yollarını detaylı olarak inceleyeceğiz.</p><h3>1. Vatandaşların Temel İdari Hakları</h3><p>Anayasamızın 125. maddesi uyarınca idarenin her t&uuml;rl&uuml; eylem ve işlemlerine karşı yargı yolu a&ccedil;ıktır. Bu kapsamda vatandaşlar:</p><ul> <li>Bilgi edinme hakkı</li> <li>Dilek&ccedil;e hakkı</li> <li>İdari işlemlere itiraz hakkı</li> <li>Kamu Denet&ccedil;isine başvuru hakkı</li> <li>İdari yargıya başvuru hakkı</li></ul><p>gibi temel haklara sahiptir.</p><h3>2. Bilgi Edinme Hakkının Kullanımı</h3><p>4982 sayılı Bilgi Edinme Hakkı Kanunu kapsamında vatandaşlar, kamu kurum ve kuruluşlarının faaliyetleri hakkında bilgi edinme hakkına sahiptir. Bu hakkın kullanımı i&ccedil;in:</p><ul> <li>Yazılı veya elektronik ortamda başvuru yapılabilir</li> <li>İdare 15 iş g&uuml;n&uuml; i&ccedil;inde cevap vermek zorundadır</li> <li>Ret kararlarına karşı itiraz yolları a&ccedil;ıktır</li> <li>&Ouml;zel hayatın gizliliği ve devlet sırları kapsam dışındadır</li></ul><h3>3. İdari Başvuru Yolları</h3><p>Vatandaşlar idari işlemlere karşı &ccedil;eşitli başvuru yollarına sahiptir:</p><h4>a) İdari İtiraz</h4><p>İşlemi yapan idareye veya bir &uuml;st makama yapılan başvurudur. İtiraz s&uuml;resi genellikle 60 g&uuml;nd&uuml;r.</p><h4>b) Kamu Denet&ccedil;iliği Kurumu (Ombudsman)</h4><p>İdarenin işleyişiyle ilgili şikayetleri inceleyen bağımsız bir kurumdur. Başvurular &uuml;cretsizdir ve 6 ay i&ccedil;inde sonu&ccedil;landırılır.</p><h3>4. İdari Yargı Yolları</h3><p>İdari yargı yolları iki ana başlıkta incelenir:</p><h4>a) İptal Davası</h4><p>İdari işlemin hukuka aykırılığı nedeniyle iptali i&ccedil;in a&ccedil;ılan davadır. Dava a&ccedil;ma s&uuml;resi 60 g&uuml;nd&uuml;r.</p><h4>b) Tam Yargı Davası</h4><p>İdarenin eylem ve işlemlerinden doğan zararların tazmini i&ccedil;in a&ccedil;ılan davadır.</p><h3>5. &Ouml;nemli İdari Yargı S&uuml;releri</h3><ul> <li>Dava a&ccedil;ma s&uuml;resi: 60 g&uuml;n</li> <li>İtiraz s&uuml;resi: 30 g&uuml;n</li> <li>Temyiz s&uuml;resi: 30 g&uuml;n</li> <li>Karar d&uuml;zeltme s&uuml;resi: 15 g&uuml;n</li></ul><h3>6. Vatandaşların Dikkat Etmesi Gereken Hususlar</h3><p>İdari başvurularda dikkat edilmesi gereken &ouml;nemli noktalar:</p><ul> <li>S&uuml;relere dikkat edilmeli</li> <li>Başvurular yazılı ve gerek&ccedil;eli olmalı</li> <li>İlgili belgeler eksiksiz sunulmalı</li> <li>Tebligat adresi doğru belirtilmeli</li> <li>Hak kaybı yaşamamak i&ccedil;in uzman desteği alınmalı</li></ul><h2>Sonu&ccedil;</h2><p>İdare hukuku vatandaşların haklarını koruyan &ouml;nemli bir hukuk dalıdır. Haklarınızı bilmek ve doğru şekilde kullanmak, hukuk devletinin işleyişine katkı sağlar. Karşılaştığınız idari sorunlarda yukarıda belirtilen yolları izleyerek haklarınızı arayabilirsiniz.</p>', '676c20bc85025.png', NULL, 'idare-hukuku-ve-vatandas-haklari-kapsamli-rehber', '2024-12-25 15:11:48'),
(18, 'Gayrimenkul Hukuku ve Alım-Satım İşlemleri: Kapsamlı Rehber', '<h2>Gayrimenkul Alım Satım İşlemlerinde Dikkat Edilmesi Gereken Hukuki S&uuml;re&ccedil;ler</h2><p>Gayrimenkul alım satım işlemleri, hayatımızın en &ouml;nemli finansal ve hukuki kararlarından biridir. Bu yazımızda gayrimenkul hukukunun temel kavramlarını ve alım-satım s&uuml;recinde dikkat edilmesi gereken t&uuml;m detayları ele alacağız.</p><h3>1. Gayrimenkul Alım Satımında &Ouml;n Hazırlık</h3><p>Gayrimenkul alım satım işlemlerine başlamadan &ouml;nce yapılması gereken ilk adım, taşınmazın hukuki durumunun detaylı incelenmesidir. Bu aşamada:</p><ul> <li>Tapu kaydının incelenmesi</li> <li>İmar durumunun kontrol&uuml;</li> <li>Belediye kayıtlarının sorgulanması</li> <li>Yapı ruhsatı ve iskan durumunun teyidi</li> <li>Taşınmaz &uuml;zerindeki kısıtlamaların kontrol&uuml;</li></ul><h3>2. Tapu Sicilinde Dikkat Edilecek Hususlar</h3><p>Tapu sicili, gayrimenkule ilişkin t&uuml;m resmi bilgilerin tutulduğu devlet g&uuml;vencesi altındaki kayıtlardır. Kontrol edilmesi gereken başlıca hususlar:</p><ul> <li>M&uuml;lkiyet durumu ve hisse oranları</li> <li>İpotek ve rehin hakları</li> <li>Haciz kaydı kontrol&uuml;</li> <li>Şerh ve beyanlar</li> <li>İrtifak hakları</li></ul><h3>3. Satış Vaadi S&ouml;zleşmesi ve &Ouml;nemi</h3><p>Satış vaadi s&ouml;zleşmesi, gayrimenkul alım satımında tarafların karşılıklı hak ve y&uuml;k&uuml;ml&uuml;l&uuml;klerini belirleyen &ouml;nemli bir hukuki belgedir. Bu s&ouml;zleşmede bulunması gereken temel unsurlar:</p><ul> <li>Tarafların kimlik bilgileri</li> <li>Gayrimenkul&uuml;n a&ccedil;ık adresi ve tapu bilgileri</li> <li>Satış bedeli ve &ouml;deme planı</li> <li>Tapu devir tarihi</li> <li>Cezai şart h&uuml;k&uuml;mleri</li></ul><h3>4. Tapu Devir İşlemleri ve Gerekli Belgeler</h3><p>Tapu devir işlemleri i&ccedil;in hazırlanması gereken belgeler:</p><ul> <li>Kimlik belgeleri (Satıcı ve alıcı)</li> <li>Emlak vergisi değerini g&ouml;steren belge</li> <li>Zorunlu deprem sigortası poli&ccedil;esi</li> <li>Belediyeden alınacak rayi&ccedil; değer belgesi</li> <li>Varsa vekaletname aslı</li></ul><h3>5. Vergisel Y&uuml;k&uuml;ml&uuml;l&uuml;kler</h3><p>Gayrimenkul alım satımında karşılaşılan vergisel y&uuml;k&uuml;ml&uuml;l&uuml;kler:</p><ul> <li>Tapu harcı (Alıcı ve satıcı i&ccedil;in ayrı ayrı)</li> <li>Gelir vergisi (Satıcı i&ccedil;in)</li> <li>KDV (Ticari gayrimenkullerde)</li> <li>Emlak vergisi (Yıllık)</li></ul><h3>6. Olası Hukuki Uyuşmazlıklar ve &Ccedil;&ouml;z&uuml;m Yolları</h3><p>Gayrimenkul alım satımında karşılaşılabilecek hukuki sorunlar ve &ccedil;&ouml;z&uuml;m &ouml;nerileri:</p><ul> <li>Tapu iptal davaları</li> <li>Ayıplı gayrimenkul iddiaları</li> <li>S&ouml;zleşmeye aykırılık durumları</li> <li>Miras ve hisse sorunları</li></ul><h3>7. &Ouml;nemli Tavsiyeler</h3><p>Gayrimenkul alım satım s&uuml;recinde dikkat edilmesi gereken &ouml;nemli noktalar:</p><ul> <li>Mutlaka bir gayrimenkul hukuku uzmanına danışılması</li> <li>T&uuml;m belgelerin noter onaylı kopyalarının saklanması</li> <li>&Ouml;deme planının resmi belgeye bağlanması</li> <li>Taşınmazın fiziki durumunun detaylı incelenmesi</li> <li>Komşu parsellerle ilgili imar durumunun kontrol&uuml;</li></ul><h2>Sonu&ccedil;</h2><p>Gayrimenkul alım satım işlemleri, dikkatli ve profesyonel bir yaklaşım gerektiren &ouml;nemli hukuki s&uuml;re&ccedil;lerdir. Bu s&uuml;re&ccedil;te yapılacak hatalar, telafisi zor maddi ve manevi zararlara yol a&ccedil;abilir. Bu nedenle, t&uuml;m aşamalarda bir hukuk uzmanından destek alınması ve yukarıda belirtilen hususlara dikkat edilmesi b&uuml;y&uuml;k &ouml;nem taşımaktadır.</p>', '676c22fc86036.png', NULL, 'gayrimenkul-hukuku-ve-alim-satim-islemleri-kapsamli-rehber', '2024-12-25 15:19:56'),
(19, 'Ceza Hukukunda Temel Kavramlar: Kapsamlı Rehber', '<h2>Ceza Hukukunun Temelleri ve &Ouml;nemli Kavramlar</h2><p>Ceza hukuku, toplumsal d&uuml;zenin korunması ve adaletin sağlanması i&ccedil;in vazge&ccedil;ilmez bir hukuk dalıdır. Bu yazımızda, ceza hukukunun temel kavramlarını detaylı olarak ele alacağız.</p><h3>1. Su&ccedil; Kavramı ve Unsurları</h3><p>Su&ccedil;, kanunda yazılı tipikliğe uygun, hukuka aykırı ve kusurlu insan davranışıdır. Bir fiilin su&ccedil; sayılabilmesi i&ccedil;in d&ouml;rt temel unsurun bir arada bulunması gerekir:</p><ul> <li><strong>Kanuni Unsur:</strong> Su&ccedil;un kanunda a&ccedil;ık&ccedil;a tanımlanmış olması gerekir (Kanunilik İlkesi)</li> <li><strong>Maddi Unsur:</strong> Hareket, netice ve nedensellik bağı</li> <li><strong>Manevi Unsur:</strong> Kast veya taksir şeklinde kusurlu irade</li> <li><strong>Hukuka Aykırılık Unsuru:</strong> Fiilin hukuk d&uuml;zenince korunan bir hakkı ihlal etmesi</li></ul><h3>2. Ceza Sorumluluğunu Etkileyen Haller</h3><p>Ceza sorumluluğunu etkileyen &ccedil;eşitli durumlar bulunmaktadır:</p><h4>2.1. Ceza Sorumluluğunu Kaldıran Haller</h4><ul> <li>Yaş k&uuml;&ccedil;&uuml;kl&uuml;ğ&uuml;</li> <li>Akıl hastalığı</li> <li>Sağır ve dilsizlik</li> <li>Ge&ccedil;ici nedenler</li> <li>Zorunluluk hali</li> <li>Meşru m&uuml;dafaa</li></ul><h3>3. Cezanın Amacı ve T&uuml;rleri</h3><p>Ceza, su&ccedil; işleyen kişiye uygulanan yaptırımdır. Temel ama&ccedil;ları şunlardır:</p><ul> <li>Toplumun korunması</li> <li>Su&ccedil;lunun ıslahı</li> <li>Caydırıcılık sağlanması</li> <li>Adaletin tesisi</li></ul><h4>3.1. Hapis Cezaları</h4><p>Hapis cezaları, ağırlaştırılmış m&uuml;ebbet hapis, m&uuml;ebbet hapis ve s&uuml;reli hapis cezası olarak &uuml;&ccedil;e ayrılır. S&uuml;reli hapis cezası, kanunda aksi belirtilmeyen hallerde bir aydan yirmi yıla kadardır.</p><h4>3.2. Adli Para Cezası</h4><p>Adli para cezası, beş g&uuml;nden başlayan ve kanunda belirtilen sınıra kadar devam eden, bir g&uuml;n karşılığı en az 20 TL olmak &uuml;zere hesaplanan para cezasıdır.</p><h3>4. Yargılama S&uuml;reci</h3><p>Ceza yargılaması, şu aşamalardan oluşur:</p><ol> <li>Soruşturma aşaması</li> <li>Kovuşturma aşaması</li> <li>Kanun yolları</li> <li>İnfaz aşaması</li></ol><h3>5. Ceza Hukukunda Temel İlkeler</h3><p>Ceza hukukunun temel ilkeleri şunlardır:</p><ul> <li><strong>Kanunilik İlkesi:</strong> &quot;Kanunsuz su&ccedil; ve ceza olmaz&quot; prensibi</li> <li><strong>Şahsilik İlkesi:</strong> Ceza sorumluluğunun şahsi olması</li> <li><strong>Orantılılık İlkesi:</strong> Su&ccedil; ile ceza arasında adil denge</li> <li><strong>Masumiyet Karinesi:</strong> Aksi ispatlanana kadar herkesin masum sayılması</li></ul><h3>Sonu&ccedil;</h3><p>Ceza hukuku, toplumsal d&uuml;zenin korunması i&ccedil;in vazge&ccedil;ilmez bir hukuk dalıdır. Temel kavramların doğru anlaşılması, hem hukuk profesyonelleri hem de vatandaşlar i&ccedil;in b&uuml;y&uuml;k &ouml;nem taşır. Bu yazıda ele aldığımız kavramlar, ceza hukukunun sadece temel yapı taşlarıdır ve her biri ayrı bir derinlemesine incelemeyi hak etmektedir.</p>', '676c2c3934b8d.jpg', NULL, 'ceza-hukukunda-temel-kavramlar-kapsamli-rehber', '2024-12-25 15:21:40'),
(21, 'Miras Hukuku: Temel Bilgiler ve Yasal Süreç Rehberi', '<h2>Miras Hukuku Nedir?</h2><p>Miras hukuku, bir kişinin vefatı sonrasında mal varlığının yasal miras&ccedil;ılara devri ve paylaşımını d&uuml;zenleyen hukuk dalıdır. T&uuml;rk Medeni Kanunu&#39;nun en kapsamlı b&ouml;l&uuml;mlerinden biri olan miras hukuku, toplumsal d&uuml;zenin devamlılığı a&ccedil;ısından b&uuml;y&uuml;k &ouml;nem taşır.</p><h3>Yasal Miras&ccedil;ılık Sistemi</h3><p>Yasal miras&ccedil;ılık, kanun tarafından belirlenen sıraya g&ouml;re işler. Bu sistem d&ouml;rt z&uuml;mreden oluşur:</p><ul> <li>Birinci Z&uuml;mre: Mirasbırakanın altsoyları (&ccedil;ocukları, torunları)</li> <li>İkinci Z&uuml;mre: Ana baba ve onların altsoyları (kardeşler, yeğenler)</li> <li>&Uuml;&ccedil;&uuml;nc&uuml; Z&uuml;mre: B&uuml;y&uuml;k ana ve b&uuml;y&uuml;k baba ile onların altsoyları</li> <li>D&ouml;rd&uuml;nc&uuml; Z&uuml;mre: B&uuml;y&uuml;k ana ve b&uuml;y&uuml;k babanın ana ve babaları</li></ul><h3>Sağ Kalan Eşin Miras Hakları</h3><p>Sağ kalan eş, diğer miras&ccedil;ılarla birlikte miras&ccedil;ı olur ve z&uuml;mrelere g&ouml;re farklı oranlarda pay alır:</p><ul> <li>Birinci z&uuml;mre ile birlikte: Mirasın 1/4&#39;&uuml;</li> <li>İkinci z&uuml;mre ile birlikte: Mirasın 1/2&#39;si</li> <li>&Uuml;&ccedil;&uuml;nc&uuml; z&uuml;mre ile birlikte: Mirasın 3/4&#39;&uuml;</li> <li>Hi&ccedil; miras&ccedil;ı yoksa: Mirasın tamamı</li></ul><h2>Vasiyetname ve Miras S&ouml;zleşmesi</h2><p>Kişiler yasal miras&ccedil;ılık dışında, vasiyetname veya miras s&ouml;zleşmesi ile de malvarlıklarının geleceğini belirleyebilirler. Vasiyetname &uuml;&ccedil; şekilde d&uuml;zenlenebilir:</p><ol> <li>Resmi Vasiyetname: Noter huzurunda d&uuml;zenlenir</li> <li>El Yazılı Vasiyetname: Tamamen el yazısı ile yazılmalıdır</li> <li>S&ouml;zl&uuml; Vasiyetname: Sadece olağan&uuml;st&uuml; durumlarda ge&ccedil;erlidir</li></ol><h2>Saklı Pay ve Tasarruf Nisabı</h2><p>Saklı pay, mirasbırakanın tasarruf yetkisini sınırlayan ve bazı miras&ccedil;ılar i&ccedil;in kanun tarafından g&uuml;vence altına alınan minimum miras oranıdır:</p><ul> <li>Altsoy i&ccedil;in: Yasal miras payının 1/2&#39;si</li> <li>Ana baba i&ccedil;in: Yasal miras payının 1/4&#39;&uuml;</li> <li>Sağ kalan eş i&ccedil;in: Yasal miras payının 1/2&#39;si</li></ul><h2>Mirasın Reddi ve Miras&ccedil;ılıktan &Ccedil;ıkarma</h2><p>Miras&ccedil;ılar, kendilerine d&uuml;şen mirası reddedebilirler. Red beyanı, mirasın a&ccedil;ılmasından itibaren 3 ay i&ccedil;inde sulh hukuk mahkemesine yapılmalıdır. Mirasbırakan da belirli şartlar altında miras&ccedil;ıyı miras&ccedil;ılıktan &ccedil;ıkarabilir:</p><ul> <li>Miras&ccedil;ının, mirasbırakana veya yakınlarına karşı ağır su&ccedil; işlemesi</li> <li>Miras&ccedil;ının, mirasbırakana veya ailesine karşı aile hukukundan doğan y&uuml;k&uuml;ml&uuml;l&uuml;klerini &ouml;nemli &ouml;l&ccedil;&uuml;de yerine getirmemesi</li></ul><h2>Miras Paylaşımı ve Terekenin Tasfiyesi</h2><p>Miras paylaşımı, miras&ccedil;ıların anlaşması ile ger&ccedil;ekleşir. Anlaşmazlık durumunda mahkeme yoluyla paylaşım yapılır. Terekenin tasfiyesi şu aşamalardan oluşur:</p><ol> <li>Mirasın a&ccedil;ılması ve miras&ccedil;ıların belirlenmesi</li> <li>Mal varlığının tespiti</li> <li>Bor&ccedil;ların &ouml;denmesi</li> <li>Kalan malvarlığının miras&ccedil;ılar arasında paylaşımı</li></ol><h2>Sonu&ccedil;</h2><p>Miras hukuku, karmaşık ve teknik detayları olan bir hukuk dalıdır. Miras ile ilgili işlemlerde mutlaka uzman bir avukata danışılması, olası hak kayıplarının &ouml;nlenmesi a&ccedil;ısından b&uuml;y&uuml;k &ouml;nem taşır. &Ouml;zellikle vasiyetname d&uuml;zenlenmesi ve miras paylaşımı s&uuml;re&ccedil;lerinde profesyonel destek almak, s&uuml;recin sağlıklı ilerlemesini sağlayacaktır.</p>', '676c3c143d6e6.jpg', NULL, 'miras-hukuku-temel-bilgiler-ve-yasal-surec-rehberi', '2024-12-25 15:36:26'),
(22, 'Boşanma Davası Sürecinde Dikkat Edilmesi Gerekenler', '<h2>Boşanma Davası S&uuml;recinde İzlenmesi Gereken Adımlar</h2><p>Boşanma kararı, hayatın en zorlu s&uuml;re&ccedil;lerinden biridir. Bu s&uuml;re&ccedil;te hem duygusal hem de hukuki a&ccedil;ıdan doğru adımların atılması b&uuml;y&uuml;k &ouml;nem taşır. Bu yazımızda boşanma davası s&uuml;recinde dikkat edilmesi gereken t&uuml;m detayları ele alacağız.</p><h3>1. Dava &Ouml;ncesi Hazırlık S&uuml;reci</h3><p>Boşanma davasına başvurmadan &ouml;nce bazı hazırlıkların yapılması gerekir. &Ouml;ncelikle t&uuml;m &ouml;nemli belgelerin bir dosyada toplanması &ouml;nemlidir:</p><ul> <li>Evlilik c&uuml;zdanı fotokopisi</li> <li>N&uuml;fus kayıt &ouml;rneği</li> <li>İkametgah belgesi</li> <li>Varsa &ccedil;ocukların n&uuml;fus kayıt &ouml;rnekleri</li> <li>Maddi durumu g&ouml;steren belgeler (maaş bordrosu, banka hesap d&ouml;k&uuml;mleri vb.)</li> <li>Varsa şiddet, aldatma vb. durumları belgeleyen raporlar, yazışmalar</li></ul><h3>2. Anlaşmalı ve &Ccedil;ekişmeli Boşanma Arasındaki Farklar</h3><p>Boşanma davaları iki şekilde a&ccedil;ılabilir: Anlaşmalı veya &ccedil;ekişmeli. Her iki s&uuml;recin kendine &ouml;zg&uuml; &ouml;zellikleri vardır:</p><h4>Anlaşmalı Boşanma:</h4><ul> <li>Daha kısa s&uuml;rer (ortalama 1-2 duruşma)</li> <li>Masraflar daha azdır</li> <li>Taraflar protokol &uuml;zerinde anlaşır</li> <li>Duygusal yıpranma minimumdur</li></ul><h4>&Ccedil;ekişmeli Boşanma:</h4><ul> <li>S&uuml;re&ccedil; daha uzundur (6 ay - 2 yıl arası)</li> <li>Masraflar daha y&uuml;ksektir</li> <li>Tanık dinletme imkanı vardır</li> <li>Duygusal yıpranma fazladır</li></ul><h3>3. Mal Paylaşımı ve Finansal Konular</h3><p>Evlilik s&uuml;resince edinilen malların paylaşımı &ouml;nemli konulardan biridir. Bu konuda dikkat edilmesi gerekenler:</p><ul> <li>Evlilik tarihinden sonra edinilen t&uuml;m mallar paylaşıma tabidir</li> <li>Miras ve kişisel bağış yoluyla edinilen mallar hari&ccedil; tutulur</li> <li>Emeklilik, kıdem tazminatı gibi haklar paylaşıma dahil değildir</li> <li>Banka hesapları ve yatırım ara&ccedil;ları da paylaşıma tabidir</li></ul><h3>4. Velayet ve Nafaka D&uuml;zenlemeleri</h3><p>&Ccedil;ocuk sahibi &ccedil;iftler i&ccedil;in en &ouml;nemli konulardan biri velayettir. Velayet d&uuml;zenlemesinde:</p><ul> <li>&Ccedil;ocuğun &uuml;st&uuml;n yararı g&ouml;zetilir</li> <li>&Ccedil;ocuğun yaşı ve eğitim durumu dikkate alınır</li> <li>Ebeveynlerin ekonomik ve sosyal durumları değerlendirilir</li> <li>Kişisel ilişki (g&ouml;r&uuml;şme) d&uuml;zenlenir</li></ul><h3>5. Hukuki S&uuml;recin Y&ouml;netimi</h3><p>Dava s&uuml;recinin sağlıklı ilerlemesi i&ccedil;in:</p><ul> <li>Deneyimli bir avukat ile &ccedil;alışılmalıdır</li> <li>Duruşmalara zamanında katılım sağlanmalıdır</li> <li>İstenen belgelerin s&uuml;resinde sunulması gerekir</li> <li>Mahkeme kararlarına uyulmalıdır</li></ul><h3>6. Psikolojik Destek ve Rehabilitasyon</h3><p>Boşanma s&uuml;recinin sağlıklı atlatılması i&ccedil;in psikolojik destek almak &ouml;nemlidir. Bu s&uuml;re&ccedil;te:</p><ul> <li>Profesyonel destek alınabilir</li> <li>Aile ve arkadaş desteği &ouml;nemlidir</li> <li>&Ccedil;ocuklar i&ccedil;in psikolojik danışmanlık değerlendirilmelidir</li></ul><h3>Sonu&ccedil;</h3><p>Boşanma s&uuml;reci, dikkatli ve bilin&ccedil;li y&ouml;netilmesi gereken zorlu bir d&ouml;nemdir. Hukuki hakların bilinmesi, gerekli hazırlıkların yapılması ve profesyonel destek alınması, s&uuml;recin daha sağlıklı ilerlemesini sağlayacaktır. Her durumda &ccedil;ocukların &uuml;st&uuml;n yararının g&ouml;zetilmesi ve s&uuml;recin minimum hasarla atlatılması temel hedef olmalıdır.</p>', '676c3c3413b79.jpg', NULL, 'bosanma-davasi-surecinde-dikkat-edilmesi-gerekenler', '2024-12-25 15:37:39'),
(23, 'İş Hukukunda İşçi Hakları: Detaylı Rehber', '<h2>İş Hukukunda İş&ccedil;i Hakları ve Yasal D&uuml;zenlemeler</h2><p>İş hukuku, &ccedil;alışma hayatının temelini oluşturan ve iş&ccedil;i-işveren ilişkilerini d&uuml;zenleyen &ouml;nemli bir hukuk dalıdır. Bu rehberde, iş&ccedil;ilerin sahip olduğu temel hakları ve g&uuml;ncel yasal d&uuml;zenlemeleri detaylı olarak ele alacağız.</p><h3>1. &Ccedil;alışma S&uuml;releri ve Dinlenme Hakları</h3><p>T&uuml;rk İş Kanunu&#39;na g&ouml;re normal &ccedil;alışma s&uuml;resi haftada en &ccedil;ok 45 saattir. Bu s&uuml;re, işyerlerinde haftanın &ccedil;alışılan g&uuml;nlerine eşit şekilde b&ouml;l&uuml;nerek uygulanır. G&uuml;nl&uuml;k &ccedil;alışma s&uuml;resi 11 saati aşamaz.</p><h4>Ara Dinlenme S&uuml;releri:</h4><ul> <li>4 saat ve daha kısa s&uuml;reli işlerde: 15 dakika</li> <li>4-7.5 saat arası işlerde: 30 dakika</li> <li>7.5 saatten fazla işlerde: 1 saat</li></ul><h3>2. &Uuml;cret ve &Ouml;deme Hakları</h3><p>İş&ccedil;i &uuml;cretleri, en ge&ccedil; ayda bir &ouml;denmek zorundadır. &Uuml;cret, prim, ikramiye ve her t&uuml;rl&uuml; istihkak &ouml;demelerinin banka aracılığıyla yapılması yasal zorunluluktur.</p><h4>&Uuml;cret G&uuml;vencesi:</h4><ul> <li>Asgari &uuml;cret altında &ouml;deme yapılamaz</li> <li>&Uuml;cret kesme cezası bir ayda iki g&uuml;ndelikten fazla olamaz</li> <li>&Uuml;cret, ulusal bayram ve genel tatil g&uuml;nlerinde tam olarak &ouml;denir</li></ul><h3>3. Yıllık İzin Hakları</h3><p>Yıllık &uuml;cretli izin hakkı, iş&ccedil;inin vazge&ccedil;emeyeceği temel haklardan biridir. İzin s&uuml;releri hizmet s&uuml;resine g&ouml;re değişiklik g&ouml;sterir:</p><h4>Hizmet S&uuml;relerine G&ouml;re İzin Hakları:</h4><ul> <li>1-5 yıl arası &ccedil;alışanlara: 14 g&uuml;n</li> <li>5-15 yıl arası &ccedil;alışanlara: 20 g&uuml;n</li> <li>15 yıl ve &uuml;zeri &ccedil;alışanlara: 26 g&uuml;n</li></ul><h3>4. Kıdem ve İhbar Tazminatı</h3><p>Kıdem tazminatı, en az bir yıl &ccedil;alışmış olan iş&ccedil;ilerin belirli şartlar altında hak kazandığı &ouml;nemli bir haktır. Her tam &ccedil;alışma yılı i&ccedil;in 30 g&uuml;nl&uuml;k br&uuml;t &uuml;cret tutarında hesaplanır.</p><h4>İhbar Tazminatı S&uuml;releri:</h4><ul> <li>6 aydan az &ccedil;alışma: 2 hafta</li> <li>6 ay - 1.5 yıl arası: 4 hafta</li> <li>1.5 - 3 yıl arası: 6 hafta</li> <li>3 yıldan fazla: 8 hafta</li></ul><h3>5. Sosyal G&uuml;venlik Hakları</h3><p>Her iş&ccedil;inin sosyal g&uuml;venlik hakkı anayasal g&uuml;vence altındadır. İşverenler &ccedil;alışanlarını işe başladıkları g&uuml;n SGK&#39;ya bildirmek zorundadır.</p><h4>Sigortalılık Kapsamındaki Haklar:</h4><ul> <li>Sağlık hizmetlerinden yararlanma</li> <li>Emeklilik hakkı</li> <li>İş g&ouml;remezlik &ouml;denekleri</li> <li>Analık sigortası</li></ul><h3>6. Sendikal Haklar</h3><p>İş&ccedil;iler, herhangi bir ayrım g&ouml;zetilmeksizin sendika kurma ve sendikalara &uuml;ye olma hakkına sahiptir. Sendika &uuml;yeliği nedeniyle işten &ccedil;ıkarma yasaktır.</p><h3>Sonu&ccedil;</h3><p>İş hukuku kapsamındaki hakların bilinmesi, hem iş&ccedil;iler hem de işverenler a&ccedil;ısından b&uuml;y&uuml;k &ouml;nem taşır. Bu hakların etkin kullanımı, sağlıklı bir &ccedil;alışma ortamının oluşmasına ve iş barışının korunmasına katkı sağlar.</p>', '676c3c4e27c4e.jpg', NULL, 'is-hukukunda-isci-haklari-detayli-rehber', '2024-12-25 15:41:41'),
(31, 'deneme blog yazısı', '<p>deneme</p><p>asdjashdjasd</p><p>&nbsp;</p><p>&nbsp;</p><p>jasdhjashdasd</p><p>kjaskdjkasd</p><p>kjkjaksd</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>fdghdfgfdg</p>', '676ca12a4761d.png', 'deneme yazı', 'deneme-blog-yazisi', '2024-12-26 00:19:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact_info`
--

DROP TABLE IF EXISTS `contact_info`;
CREATE TABLE IF NOT EXISTS `contact_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_turkish_ci,
  `facebook` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `maps_embed` text COLLATE utf8mb4_turkish_ci,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `maps_url` text COLLATE utf8mb4_turkish_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `contact_info`
--

INSERT INTO `contact_info` (`id`, `phone`, `email`, `address`, `facebook`, `twitter`, `instagram`, `linkedin`, `maps_embed`, `updated_at`, `maps_url`) VALUES
(1, '0543 123 321 123', 'iletisim@gurebahukuk.com', 'Kartaltepe, Olgunlar Sokağı no:20, 34146 Bakırköy/İstanbul', 'https://www.facebook.com/sayfa', 'https://www.x.com', 'https://www.instagram.com', 'https://linkedin.com/', '<iframe src=\\\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3011.377819356297!2d28.871695812218753!3d40.99510297123292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cabbf331e20e73%3A0x344a7fd93dd49be1!2sGureba%20Hukuk%20B%C3%BCrosu!5e0!3m2!1str!2str!4v1735175111738!5m2!1str!2str\\\" width=\\\"600\\\" height=\\\"450\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\\\"></iframe>', '2024-12-26 01:05:17', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `is_read`, `created_at`) VALUES
(14, 'Özlem Altıner', 'ozlemakklc@gmail.com', '0531 636 44 70', 'Boşanma', 'Kocamı boşayacağım da yardımcı olur musunuz', 1, '2024-12-25 13:26:58'),
(15, 'Rıza Altıner', 'rizaa.altiner@gmail.com', '0543 201 43 49', 'Deneme', 'Denemek için bir şeyler yazıyoruz işte', 0, '2024-12-26 01:15:32'),
(13, 'Rıza Altıner', 'rizaa.altiner@gmail.com', '0543 201 43 49', 'Deneme 2', 'Bu 2. deneme mesajıdır', 1, '2024-12-25 12:28:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hero_slides`
--

DROP TABLE IF EXISTS `hero_slides`;
CREATE TABLE IF NOT EXISTS `hero_slides` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `button_text` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `order_number` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hero_slides`
--

INSERT INTO `hero_slides` (`id`, `title`, `subtitle`, `image`, `button_text`, `button_link`, `active`, `order_number`) VALUES
(1, 'Gureba Hukuk Bürosu', '30 Yıllık iş tecrübesi', '676bfb222207a.jpg', 'İletişim', 'iletisim.php', 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order_number` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `services`
--

INSERT INTO `services` (`id`, `title`, `content`, `order_number`, `created_at`) VALUES
(1, 'Ceza Hukuku', '- Ağır Ceza Davaları\r\n- Asliye Ceza Davaları\r\n- Soruşturma Süreçleri\r\n- Temyiz İşlemleri', 1, '2024-12-25 18:52:44'),
(2, 'Aile Hukuku', '- Boşanma Davaları\r\n- Nafaka İşlemleri  \r\n- Velayet Davaları\r\n- Mal Paylaşımı', 2, '2024-12-25 18:52:44'),
(3, 'Ticaret Hukuku', '- Şirket Kuruluşları\r\n- Ticari Davalar\r\n- Sözleşme Hazırlama\r\n- İflas ve Konkordato', 3, '2024-12-25 18:52:44'),
(4, 'İş Hukuku', '- İşçi-İşveren Uyuşmazlıkları\r\n- Tazminat Davaları\r\n- İş Sözleşmeleri\r\n- Sendikal Süreçler', 4, '2024-12-25 18:52:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `team_members`
--

DROP TABLE IF EXISTS `team_members`;
CREATE TABLE IF NOT EXISTS `team_members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `description` text COLLATE utf8mb4_turkish_ci,
  `image` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `order_number` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `title`, `description`, `image`, `email`, `linkedin`, `order_number`, `created_at`) VALUES
(6, 'Stajyer Av. Özlem Altıner', 'Stajyer Avukat', 'Ticaret hukuku ve şirketler hukuku', '676c0b356bb6c.jpg', 'ozlem@gurebahukuk.com', 'https://www.linkedin.com/in/ozlemaltiner', 4, '2024-12-25 13:40:05'),
(3, 'Av. Rıza Altıner', 'Ortak Avukat', 'Gayrimenkul hukuku ve inşaat hukuku uzmanı', '676c0a9227c26.png', 'riza@gurebahukuk.com', 'https://linkedin.com/riza', 2, '2024-12-25 13:30:51'),
(4, 'Av. Zafer Kara', 'Kurucu Ortak', 'Ağır ceza ve sosyal güvenlik hukuku uzmanı', '676c09a450161.png', 'zaferkara@gmail.com', 'https://www.linkedin.com/in/zaferkara', 0, '2024-12-25 13:33:24'),
(5, 'Av. Aslı Bostan', 'Kıdemli Avukat', 'İş hukuku ve sosyal güvenlik hukuku uzmanı', '676c09f81e527.png', 'aslibostan@gmail.com', 'https://www.linkedin.com/in/aslibostan', 1, '2024-12-25 13:34:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_name` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `testimonial` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `featured` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_name`, `testimonial`, `featured`, `status`, `created_at`) VALUES
(1, 'Mehmet Y.', 'Profesyonel yaklaşımları ve başarılı sonuçlarıyla tam anlamıyla güvenilir bir hukuk bürosu.', 1, 1, '2024-12-25 13:43:37'),
(2, 'Ayşe K.', 'Davamızı başarıyla sonuçlandırdılar. Kendilerine teşekkür ederiz.', 1, 1, '2024-12-25 13:43:37'),
(3, 'Ali R.', 'Hızlı ve çözüm odaklı yaklaşımlarıyla bizi çok memnun ettiler.', 1, 1, '2024-12-25 13:43:37'),
(4, 'Ahmet S.', 'İş hukuku konusunda karşılaştığımız zorlu süreçte bize gösterdikleri profesyonel yaklaşım ve destekleri için teşekkür ederiz. Hukuki süreçleri anlayabileceğimiz şekilde açıklamaları bizim için çok değerliydi.', 1, 1, '2024-12-25 13:44:54'),
(5, 'Zeynep K.', 'Aile hukuku alanında yaşadığımız hassas durumda gösterdikleri empati ve profesyonellik için minnettarız. Süreç boyunca kendimizi güvende hissettik.', 1, 1, '2024-12-25 13:44:54'),
(6, 'Mustafa B.', 'Ticari anlaşmazlığımızda sundukları stratejik çözümler ve hızlı aksiyonları sayesinde minimum zararla süreci atlattık. Kesinlikle alanında uzman bir ekip.', 1, 1, '2024-12-25 13:44:54'),
(7, 'Elif D.', 'Miras hukuku konusunda yaşadığımız karmaşık durumda bile net ve anlaşılır açıklamalarıyla bizi yönlendirdiler. Sürecin her aşamasında yanımızda olduklarını hissettik.', 1, 1, '2024-12-25 13:44:54'),
(8, 'Okan Y.', 'Şirketimizin hukuki danışmanlık sürecinde gösterdikleri proaktif yaklaşım ve detaylı çalışmaları ile bizi çok memnun ettiler. İş ortağımız gibi çalışıyorlar.', 1, 1, '2024-12-25 13:44:54'),
(9, 'Selin M.', 'Gayrimenkul davamızda gösterdikleri titiz çalışma ve sürekli bilgilendirmeleri sayesinde hiç stres yaşamadık. Kendilerini herkese tavsiye ediyorum.', 1, 1, '2024-12-25 13:44:54'),
(10, 'Burak T.', 'Uluslararası ticaret davamızda gösterdikleri uzmanlık ve çözüm odaklı yaklaşımları ile bizi hedefimize ulaştırdılar. Tecrübeli ve güvenilir bir ekip.', 1, 1, '2024-12-25 13:44:54'),
(11, 'Deniz A.', 'İş kazası davamızda haklarımızı sonuna kadar savundular. Her aşamada bizi bilgilendirdiler ve sürecin takipçisi oldular. Kendilerine çok teşekkür ederiz.', 1, 1, '2024-12-25 13:44:54'),
(12, 'Canan Ö.', 'Boşanma sürecimde gösterdikleri hassasiyet ve profesyonel yaklaşım için minnettarım. Zor bir süreci kolaylaştırdılar.', 1, 1, '2024-12-25 13:44:54'),
(13, 'Mert K.', 'Şirket birleşme sürecimizde gösterdikleri detaylı ve titiz çalışma sayesinde sorunsuz bir süreç geçirdik. Ticaret hukuku alanında gerçekten uzmanlar.', 1, 1, '2024-12-25 13:44:54'),
(14, 'Aylin R.', 'Tüketici hakları konusunda yaşadığımız sorunda hızlı ve etkili çözümleri ile bizi rahatlattılar. İletişimleri ve takipleri çok iyi.', 1, 1, '2024-12-25 13:44:54'),
(15, 'Kemal S.', 'İnşaat hukuku alanında yaşadığımız anlaşmazlıkta sundukları yaratıcı çözümler sayesinde uzlaşma sağladık. Tecrübeleri ve bilgileri takdire şayan.', 1, 1, '2024-12-25 13:44:54'),
(16, 'Pınar Y.', 'Kira hukuku konusunda yaşadığımız problemde pratik çözümleri ve hızlı müdahaleleri ile sorunumuzu çözdüler. Kendilerine teşekkür ederiz.', 1, 1, '2024-12-25 13:44:54'),
(17, 'Serkan D.', 'Sigorta hukuku konusundaki uzmanlıkları ve kararlı tutumları sayesinde hakkımızı aldık. Her aşamada yanımızda oldular.', 1, 1, '2024-12-25 13:44:54'),
(18, 'Gizem T.', 'Sağlık hukuku alanında yaşadığımız davada gösterdikleri hassasiyet ve profesyonellik için teşekkür ederiz. Süreç boyunca bizi çok iyi yönlendirdiler.', 1, 1, '2024-12-25 13:44:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
