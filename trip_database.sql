-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Ara 2023, 22:44:09
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `e_mail` varchar(45) NOT NULL,
  `ad_soyad` varchar(45) NOT NULL,
  `p_hash` varchar(255) NOT NULL,
  `premium_kontrol` tinyint(1) NOT NULL,
  `kullanici_tipi` tinyint(1) NOT NULL,
  `rota_sayac` int(11) DEFAULT NULL,
  `fotograf` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`e_mail`, `ad_soyad`, `p_hash`, `premium_kontrol`, `kullanici_tipi`, `rota_sayac`, `fotograf`) VALUES
('aa@gmail.com', 'Alperen Kosemeci', '$2y$10$xVHUFhro90Fjzz1s28aFlO6iS8VCZVWq4vgXmxzSH0nYDqUG4ix.u', 0, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mekanlar`
--

CREATE TABLE `mekanlar` (
  `mekan_id` int(11) NOT NULL,
  `mekan_adi` varchar(45) NOT NULL,
  `semt_ismi` varchar(40) NOT NULL,
  `enlem` int(11) NOT NULL,
  `boylam` int(11) NOT NULL,
  `fotograf` varchar(150) NOT NULL,
  `bilgi_yazisi` text NOT NULL,
  `plaka` int(11) NOT NULL,
  `mt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `mekanlar`
--

INSERT INTO `mekanlar` (`mekan_id`, `mekan_adi`, `semt_ismi`, `enlem`, `boylam`, `fotograf`, `bilgi_yazisi`, `plaka`, `mt_id`) VALUES
(1, 'Beylerbeyi Sarayı', 'Üsküdar', 1, 2, 'https://upload.wikimedia.org/wikipedia/commons/c/ca/Istanbul_Beylerbeyi_Palace_IMG_7663_1805.jpg', 'Alperen was here.', 34, 7),
(2, 'Dolmabahçe Sarayı', 'Beşiktaş', 1, 2, 'https://media.timeout.com/images/103729947/750/422/image.jpg', 'asdasdasdadasdasd\r\nasd\r\nasd\r\na\r\nsd\r\nas\r\nda\r\nsd\r\nasadasdsdasdasaddsadasdasdasdasdsadsadsa', 34, 7),
(3, 'Eyüp Sultan Camii', 'Eyüp', 1, 1, 'https://cdn.karar.com/news/1585462.jpg', 'asdasdas\r\nasd', 34, 2),
(4, 'Emirgan Korusu', 'Sarıyer', 1, 2, 'https://cdn1.ntv.com.tr/gorsel/-kKKPXuRWEi6yProypbWFg.jpg?width=1000&mode=crop&scale=both', 'asdasd\r\nasd', 34, 3),
(5, 'Gülhane Parkı', 'Fatih', 1, 2, 'https://kulturveyasam.com/wp-content/uploads/2018/07/2.jpg', 'asdasd', 34, 3),
(6, 'Miniatürk', 'Beyoğlu', 1, 2, 'https://geoim.bloomberght.com/2014/02/24/ver1393232928/1514095_576x384.jpg', 'asd', 34, 7),
(7, 'Havacılık Müzesi', 'Yeşilköy', 1, 2, 'https://1.bp.blogspot.com/-e-pySK_DQrg/Xqju42YKK1I/AAAAAAAAAP4/InPADJZj_6ckmBMs7dEXCVMYklG2J9LkQCEwY', 'asda', 34, 1),
(8, 'Ankara Kalesi', 'Altındağ', 1, 2, 'https://trthaberstatic.cdn.wp.trt.com.tr/resimler/2078000/ankara-kalesi-2079071.jpg', 'asd', 6, 7),
(9, 'Anıtkabir', 'Çankaya', 1, 1, 'https://www.kulturportali.gov.tr/contents/images/20171113134357515_ANKARA%20Anitkabir%20%20Murat%20O', 'sadad', 6, 7),
(10, 'Kuğulu Park', 'Çankaya', 2, 2, 'https://www.lutarsturizm.com/wp-content/uploads/2016/03/ku%C4%9Fulu-park-900x600.jpg', 'asds', 6, 3),
(11, 'Rahmi Koç Müzesi', 'Altındağ', 5, 5, 'https://www.meroddi.com/wp-content/uploads/2022/08/koc-muzesi.png', 'asdasd', 6, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mekan_türleri`
--

CREATE TABLE `mekan_türleri` (
  `mt_id` int(11) NOT NULL,
  `tur_adi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `rotalar` (
  `rota_id` int(11) NOT NULL,
  `e_mail` varchar(45) NOT NULL,
  `plaka` int(11) NOT NULL,
  `rota_tarihi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rota_olustur`
--

CREATE TABLE `rota_olustur` (
  `e_mail` varchar(45) NOT NULL,
  `m_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sehirler`
--

CREATE TABLE `sehirler` (
  `plaka` int(11) NOT NULL,
  `sehir_adi` varchar(45) NOT NULL,
  `sayac` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `sehirler`
--

INSERT INTO `sehirler` (`plaka`, `sehir_adi`, `sayac`) VALUES
(1, 'Adana', 0),
(2, 'Adıyaman', 0),
(3, 'Afyonkarahisar', 0),
(4, 'Ağrı', 0),
(5, 'Amasya', 0),
(6, 'Ankara', 0),
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
(34, 'İstanbul', 0),
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
(60, 'Tokat', 0),
(61, 'Trabzon', 0),
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

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `e_mail` varchar(45) NOT NULL,
  `mekan_id` int(11) NOT NULL,
  `yorum_metni` text DEFAULT NULL,
  `yorum_tarihi` date NOT NULL,
  `oy` int(11) NOT NULL,
  `onay` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`e_mail`);

--
-- Tablo için indeksler `mekanlar`
--
ALTER TABLE `mekanlar`
  ADD PRIMARY KEY (`mekan_id`),
  ADD KEY `plaka` (`plaka`),
  ADD KEY `mt_id` (`mt_id`);

--
-- Tablo için indeksler `mekan_türleri`
--
ALTER TABLE `mekan_türleri`
  ADD PRIMARY KEY (`mt_id`);

--
-- Tablo için indeksler `rotalar`
--
ALTER TABLE `rotalar`
  ADD PRIMARY KEY (`rota_id`),
  ADD KEY `e_mail` (`e_mail`),
  ADD KEY `plaka` (`plaka`);

--
-- Tablo için indeksler `rota_olustur`
--
ALTER TABLE `rota_olustur`
  ADD PRIMARY KEY (`e_mail`,`m_id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Tablo için indeksler `sehirler`
--
ALTER TABLE `sehirler`
  ADD PRIMARY KEY (`plaka`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`),
  ADD KEY `e_mail` (`e_mail`),
  ADD KEY `mekan_id` (`mekan_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `mekanlar`
--
ALTER TABLE `mekanlar`
  MODIFY `mekan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `mekan_türleri`
--
ALTER TABLE `mekan_türleri`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `rotalar`
--
ALTER TABLE `rotalar`
  MODIFY `rota_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Tablo kısıtlamaları `rota_olustur`
--
ALTER TABLE `rota_olustur`
  ADD CONSTRAINT `rota_olustur_ibfk_1` FOREIGN KEY (`e_mail`) REFERENCES `kullanici` (`e_mail`),
  ADD CONSTRAINT `rota_olustur_ibfk_2` FOREIGN KEY (`m_id`) REFERENCES `mekanlar` (`mekan_id`),
  ADD CONSTRAINT `rota_olustur_ibfk_3` FOREIGN KEY (`r_id`) REFERENCES `rotalar` (`rota_id`);

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
