-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Ara 2023, 22:49:30
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `trip_database`
--
CREATE DATABASE IF NOT EXISTS `trip_database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `trip_database`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--
-- Oluşturma: 27 Ara 2023, 20:46:31
--

CREATE TABLE IF NOT EXISTS `kullanici` (
  `e_mail` varchar(45) NOT NULL,
  `ad_soyad` varchar(45) NOT NULL,
  `p_hash` varchar(255) NOT NULL,
  `premium_kontrol` tinyint(1) NOT NULL,
  `kullanici_tipi` tinyint(1) NOT NULL,
  `rota_sayac` int(11) DEFAULT NULL,
  `fotograf` blob DEFAULT NULL,
  PRIMARY KEY (`e_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `kullanici`:
--

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`e_mail`, `ad_soyad`, `p_hash`, `premium_kontrol`, `kullanici_tipi`, `rota_sayac`, `fotograf`) VALUES
('aa@gmail.com', 'Alperen Kosemeci', '$2y$10$xVHUFhro90Fjzz1s28aFlO6iS8VCZVWq4vgXmxzSH0nYDqUG4ix.u', 0, 1, 0, NULL),
('alpiren1905@gmail.com', 'asd', '$2y$10$MRBDgvMjCsOShKitBfWcbexQOIJqB4cOB1pSAkQRiWxFv14HYvALe', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mekanlar`
--
-- Oluşturma: 27 Ara 2023, 21:04:32
-- Son güncelleme: 27 Ara 2023, 21:04:32
--

CREATE TABLE IF NOT EXISTS `mekanlar` (
  `mekan_id` int(11) NOT NULL AUTO_INCREMENT,
  `mekan_adi` varchar(45) NOT NULL,
  `semt_ismi` varchar(40) NOT NULL,
  `enlem` int(11) NOT NULL,
  `boylam` int(11) NOT NULL,
  `fotograf` varchar(150) NOT NULL,
  `fotograf2` varchar(150) DEFAULT NULL,
  `fotograf3` varchar(150) DEFAULT NULL,
  `bilgi_yazisi` varchar(499) NOT NULL,
  `plaka` int(11) NOT NULL,
  `mt_id` int(11) NOT NULL,
  PRIMARY KEY (`mekan_id`),
  KEY `plaka` (`plaka`),
  KEY `mt_id` (`mt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `mekanlar`:
--   `plaka`
--       `sehirler` -> `plaka`
--   `mt_id`
--       `mekan_türleri` -> `mt_id`
--

--
-- Tablo döküm verisi `mekanlar`
--

INSERT INTO `mekanlar` (`mekan_id`, `mekan_adi`, `semt_ismi`, `enlem`, `boylam`, `fotograf`, `fotograf2`, `fotograf3`, `bilgi_yazisi`, `plaka`, `mt_id`) VALUES
(1, 'Beylerbeyi Sarayı', 'Üsküdar', 1, 2, 'https://upload.wikimedia.org/wikipedia/commons/c/ca/Istanbul_Beylerbeyi_Palace_IMG_7663_1805.jpg', NULL, NULL, 'Beylerbeyi Sarayı, Osmanlı İmparatorluğu\'nun 19. yüzyıl saraylarından biridir. Sultan Abdülaziz tarafından inşa edilen bu tarihi mekan, Boğaz manzarası, estetik mimarisi ve Osmanlı kültürüyle öne çıkar. Ziyaretçilere İstanbul Boğazı\'nın güzelliklerini yaşama fırsatı sunan saray, tarihî ve kültürel bir miras olarak önem taşır. Müze olarak kullanılan saray, iç mekanları, bahçesi ve eğitici deneyimi ile İstanbul\'un tarihini keşfetmek isteyenler için çekici bir noktadır.', 34, 7),
(2, 'Dolmabahçe Sarayı', 'Beşiktaş', 1, 2, 'https://media.timeout.com/images/103729947/750/422/image.jpg', NULL, NULL, 'asdasdasdadasdasd\r\nasd\r\nasd\r\na\r\nsd\r\nas\r\nda\r\nsd\r\n', 34, 7),
(3, 'Eyüp Sultan Camii', 'Eyüp', 1, 1, 'https://cdn.karar.com/news/1585462.jpg', NULL, NULL, 'asdasdas\r\nasd', 34, 2),
(4, 'Emirgan Korusu', 'Sarıyer', 1, 2, 'https://cdn1.ntv.com.tr/gorsel/-kKKPXuRWEi6yProypbWFg.jpg?width=1000&mode=crop&scale=both', NULL, NULL, 'asdasd\r\nasd', 34, 3),
(5, 'Gülhane Parkı', 'Fatih', 1, 2, 'https://kulturveyasam.com/wp-content/uploads/2018/07/2.jpg', NULL, NULL, 'asdasd', 34, 3),
(6, 'Miniatürk', 'Beyoğlu', 1, 2, 'https://geoim.bloomberght.com/2014/02/24/ver1393232928/1514095_576x384.jpg', NULL, NULL, 'asd', 34, 7),
(7, 'Havacılık Müzesi', 'Yeşilköy', 1, 2, 'https://1.bp.blogspot.com/-e-pySK_DQrg/Xqju42YKK1I/AAAAAAAAAP4/InPADJZj_6ckmBMs7dEXCVMYklG2J9LkQCEwY', NULL, NULL, 'asda', 34, 1),
(8, 'Ankara Kalesi', 'Altındağ', 1, 2, 'https://trthaberstatic.cdn.wp.trt.com.tr/resimler/2078000/ankara-kalesi-2079071.jpg', NULL, NULL, 'asd', 6, 7),
(9, 'Anıtkabir', 'Çankaya', 1, 1, 'https://www.kulturportali.gov.tr/contents/images/20171113134357515_ANKARA%20Anitkabir%20%20Murat%20O', NULL, NULL, 'sadad', 6, 7),
(10, 'Kuğulu Park', 'Çankaya', 2, 2, 'https://www.lutarsturizm.com/wp-content/uploads/2016/03/ku%C4%9Fulu-park-900x600.jpg', NULL, NULL, 'asds', 6, 3),
(11, 'Rahmi Koç Müzesi', 'Altındağ', 5, 5, 'https://www.meroddi.com/wp-content/uploads/2022/08/koc-muzesi.png', NULL, NULL, 'asdasd', 6, 1),
(12, 'Tokat Kalesi', 'Merkez', 1, 2, 'https://belediyehaber.net/wp-content/uploads/2021/11/1.jpg', NULL, NULL, 'Tokatı yaşayan bilir.', 60, 7),
(13, 'Ballıca Mağarası', 'Semerkant', 3, 3, 'https://www.etstur.com/letsgo/wp-content/uploads/2015/03/lets-go-825x600-11.jpg', NULL, NULL, 'assasddas', 60, 7),
(14, 'Niksar Kalesi', 'Niksar', 3, 4, 'https://im.haberturk.com/l/2022/08/16/ver1660632895/3512603/jpg/640x360', NULL, NULL, 'Trnin en büyük 2.kalesi', 60, 7),
(15, 'Uzungöl', 'Çaykara', 4, 5, 'https://www.uzungol.net/wp-content/uploads/2015/08/Uzungol-manzara-748x498.jpg', NULL, NULL, 'arapların diyarı', 61, 7),
(16, 'Ayasofya', 'Ortahisar', 2, 2, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/09/43/b3/dc/trabzon-ayasofya-muzesi.jpg?w=1200&h=-1&s=1', NULL, NULL, 'asaasd', 61, 2),
(17, 'Cazılar Deresi', 'Yomra', 2, 2, 'https://fastly.4sqi.net/img/general/600x600/1375144478_yLfJt-50GHwdHVeiYoBwB3vojTNIGn26Hl_70EZy21w.jpg', NULL, NULL, 'asdasd', 61, 4),
(18, 'Atatürk Köşkü', 'Ortahisar', 2, 2, 'https://www.hepsiemlak.com/emlak-yasam/wp-content/uploads/2018/09/ataturk-kosku-ndeki-gizemli-gecit-2.jpg', NULL, NULL, 'asd', 61, 7),
(19, 'Nakkaştepe Millet Bahçesi', 'Üsküdar', 2, 3, 'https://yerler.com.tr/wp-content/uploads/2021/06/nakkastepe-millet-bahcesi.jpeg', NULL, NULL, '‘Şöyle biraz kafamı dinleyeyim, pikniğimi yapıp bir güzel stres atayım’ diyorsanız bu soruların cevabı çok işinize yarayacak! Hem gözleriniz manzaraya doyacak hem de bedeniniz, ruhunuz dinlenecek. Burası, İstanbul’un en yeşil, en huzurlu alanlarından biri olarak öne çıkıyor. Şehrin ilk millet bahçesi olma özelliğini taşıyan bu yer, 90 bin metrekarelik bir alanı kaplıyor. 15 Temmuz Şehitler Köprüsü’nü net olarak görme imkânı tanıyan bu yerde; konforlu piknik alanları, oyun alanları mevcut.', 34, 3),
(20, 'Boztepe', 'Boztepe', 2, 2, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/14/78/79/1a/boztepe.jpg?w=1200&h=1200&s=1', NULL, NULL, 'asd', 61, 4),
(21, 'Galata Kulesi', 'Beyoğlu', 1, 1, 'https://st4.depositphotos.com/12992960/21546/i/950/depositphotos_215466342-stock-photo-night-view-old-narrow-street.jpg', NULL, NULL, 'asd', 34, 7),
(22, 'Taş Han', 'Merkez', 33, 33, 'https://im.haberturk.com/yerel_haber/2020/10/18/ver1603015201/81678943_620x410.jpg', NULL, NULL, '33', 60, 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mekan_türleri`
--
-- Oluşturma: 27 Ara 2023, 20:46:31
--

CREATE TABLE IF NOT EXISTS `mekan_türleri` (
  `mt_id` int(11) NOT NULL AUTO_INCREMENT,
  `tur_adi` varchar(45) NOT NULL,
  PRIMARY KEY (`mt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `mekan_türleri`:
--

--
-- Tablo döküm verisi `mekan_türleri`
--

INSERT INTO `mekan_türleri` (`mt_id`, `tur_adi`) VALUES
(1, 'Bilim ve Teknoloji Mekanları'),
(2, 'Dini Mekanlar'),
(3, 'Doğal Mekanlar'),
(4, 'Kafe & Restoran'),
(5, 'Konaklama Mekanları'),
(6, 'Araç Kiralama Noktaları'),
(7, 'Tarihi ve Kültürel Mekanlar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rotalar`
--
-- Oluşturma: 27 Ara 2023, 20:46:31
--

CREATE TABLE IF NOT EXISTS `rotalar` (
  `rota_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_mail` varchar(45) NOT NULL,
  `plaka` int(11) NOT NULL,
  `rota_tarihi` date NOT NULL,
  PRIMARY KEY (`rota_id`),
  KEY `e_mail` (`e_mail`),
  KEY `plaka` (`plaka`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `rotalar`:
--   `e_mail`
--       `kullanici` -> `e_mail`
--   `plaka`
--       `sehirler` -> `plaka`
--

--
-- Tablo döküm verisi `rotalar`
--

INSERT INTO `rotalar` (`rota_id`, `e_mail`, `plaka`, `rota_tarihi`) VALUES
(1, 'alpiren1905@gmail.com', 34, '2023-12-27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rota_kaydet`
--
-- Oluşturma: 27 Ara 2023, 21:45:48
--

CREATE TABLE IF NOT EXISTS `rota_kaydet` (
  `k_id` varchar(45) NOT NULL,
  `rota_id` int(11) NOT NULL,
  `m_id` varchar(100) NOT NULL,
  PRIMARY KEY (`k_id`,`rota_id`),
  KEY `rota_id` (`rota_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `rota_kaydet`:
--   `k_id`
--       `kullanici` -> `e_mail`
--   `rota_id`
--       `rotalar` -> `rota_id`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sehirler`
--
-- Oluşturma: 27 Ara 2023, 20:46:31
--

CREATE TABLE IF NOT EXISTS `sehirler` (
  `plaka` int(11) NOT NULL,
  `sehir_adi` varchar(45) NOT NULL,
  `sayac` int(11) DEFAULT NULL,
  PRIMARY KEY (`plaka`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `sehirler`:
--

--
-- Tablo döküm verisi `sehirler`
--

INSERT INTO `sehirler` (`plaka`, `sehir_adi`, `sayac`) VALUES
(1, 'Adana', 0),
(2, 'Adıyaman', 0),
(3, 'Afyonkarahisar', 0),
(4, 'Ağrı', 0),
(5, 'Amasya', 0),
(6, 'Ankara', 1),
(7, 'Antalya', 0),
(8, 'Artvin', 0),
(9, 'Aydın', 0),
(10, 'Balıkesir', 0),
(11, 'Bilecik', 0),
(12, 'Bingöl', 0),
(13, 'Bitlis', 0),
(14, 'Bolu', 0),
(15, 'Burdur', 0),
(16, 'Bursa', 0),
(17, 'Çanakkale', 0),
(18, 'Çankırı', 0),
(19, 'Çorum', 0),
(20, 'Denizli', 0),
(21, 'Diyarbakır', 0),
(22, 'Edirne', 0),
(23, 'Elazığ', 0),
(24, 'Erzincan', 0),
(25, 'Erzurum', 0),
(26, 'Eskişehir', 0),
(27, 'Gaziantep', 0),
(28, 'Giresun', 0),
(29, 'Gümüşhane', 0),
(30, 'Hakkari', 0),
(31, 'Hatay', 0),
(32, 'Isparta', 0),
(33, 'Mersin', 0),
(34, 'İstanbul', 2),
(35, 'İzmir', 0),
(36, 'Kars', 0),
(37, 'Kastamonu', 0),
(38, 'Kayseri', 0),
(39, 'Kırklareli', 0),
(40, 'Kırşehir', 0),
(41, 'Kocaeli', 0),
(42, 'Konya', 0),
(43, 'Kütahya', 0),
(44, 'Malatya', 0),
(45, 'Manisa', 0),
(46, 'Kahramanmaraş', 0),
(47, 'Mardin', 0),
(48, 'Muğla', 0),
(49, 'Muş', 0),
(50, 'Nevşehir', 0),
(51, 'Niğde', 0),
(52, 'Ordu', 0),
(53, 'Rize', 0),
(54, 'Sakarya', 0),
(55, 'Samsun', 0),
(56, 'Siirt', 0),
(57, 'Sinop', 0),
(58, 'Sivas', 0),
(59, 'Tekirdağ', 0),
(60, 'Tokat', 1),
(61, 'Trabzon', 1),
(62, 'Tunceli', 0),
(63, 'Şanlıurfa', 0),
(64, 'Uşak', 0),
(65, 'Van', 0),
(66, 'Yozgat', 0),
(67, 'Zonguldak', 0),
(68, 'Aksaray', 0),
(69, 'Bayburt', 0),
(70, 'Karaman', 0),
(71, 'Kırıkkale', 0),
(72, 'Batman', 0),
(73, 'Şırnak', 0),
(74, 'Bartın', 0),
(75, 'Ardahan', 0),
(76, 'Iğdır', 0),
(77, 'Yalova', 0),
(78, 'Karabük', 0),
(79, 'Kilis', 0),
(80, 'Osmaniye', 0),
(81, 'Düzce', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--
-- Oluşturma: 27 Ara 2023, 20:46:31
--

CREATE TABLE IF NOT EXISTS `yorumlar` (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_mail` varchar(45) NOT NULL,
  `mekan_id` int(11) NOT NULL,
  `yorum_metni` text DEFAULT NULL,
  `yorum_tarihi` date NOT NULL,
  `oy` float NOT NULL,
  `onay` tinyint(1) NOT NULL,
  PRIMARY KEY (`yorum_id`),
  KEY `e_mail` (`e_mail`),
  KEY `mekan_id` (`mekan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `yorumlar`:
--   `e_mail`
--       `kullanici` -> `e_mail`
--   `mekan_id`
--       `mekanlar` -> `mekan_id`
--

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `e_mail`, `mekan_id`, `yorum_metni`, `yorum_tarihi`, `oy`, `onay`) VALUES
(1, 'aa@gmail.com', 7, 'Eğer uçaklara merakınız varsa kesinlikle gidip görülmesi gereken bir mekan.', '2023-12-25', 5, 1),
(2, 'alpiren1905@gmail.com', 21, 'Sevdiğinle gidersen hojdur.', '2023-12-26', 4, 1),
(3, 'aa@gmail.com', 19, 'Çok güzel bir manzarası var..', '2023-12-26', 5, 1),
(4, 'alpiren1905@gmail.com', 1, 'Sarayın konumu çok güzel.', '2023-12-27', 4, 1),
(5, 'alpiren1905@gmail.com', 6, 'Şöyle biraz kafamı dinleyeyim, pikniğimi yapıp bir güzel stres atayım’ diyorsanız bu soruların cevabı çok işinize yarayacak! Hem gözleriniz manzaraya doyacak hem de bedeniniz, ruhunuz dinlenecek. ', '2023-12-27', 5, 1);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `mekanlar`
--
ALTER TABLE `mekanlar`
  ADD CONSTRAINT `mekanlar_ibfk_1` FOREIGN KEY (`plaka`) REFERENCES `sehirler` (`plaka`),
  ADD CONSTRAINT `mekanlar_ibfk_2` FOREIGN KEY (`mt_id`) REFERENCES `mekan_türleri` (`mt_id`);

--
-- Tablo kısıtlamaları `rotalar`
--
ALTER TABLE `rotalar`
  ADD CONSTRAINT `rotalar_ibfk_1` FOREIGN KEY (`e_mail`) REFERENCES `kullanici` (`e_mail`),
  ADD CONSTRAINT `rotalar_ibfk_2` FOREIGN KEY (`plaka`) REFERENCES `sehirler` (`plaka`);

--
-- Tablo kısıtlamaları `rota_kaydet`
--
ALTER TABLE `rota_kaydet`
  ADD CONSTRAINT `k_id` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`e_mail`),
  ADD CONSTRAINT `rota_id` FOREIGN KEY (`rota_id`) REFERENCES `rotalar` (`rota_id`);

--
-- Tablo kısıtlamaları `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD CONSTRAINT `yorumlar_ibfk_1` FOREIGN KEY (`e_mail`) REFERENCES `kullanici` (`e_mail`),
  ADD CONSTRAINT `yorumlar_ibfk_2` FOREIGN KEY (`mekan_id`) REFERENCES `mekanlar` (`mekan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
