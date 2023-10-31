-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Eki 2023, 19:31:41
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
CREATE DATABASE IF NOT EXISTS `trip_database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `trip_database`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--
-- Oluşturma: 30 Eki 2023, 16:59:45
-- Son güncelleme: 30 Eki 2023, 17:24:47
--

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE `kullanici` (
  `tel_no` char(11) NOT NULL,
  `e_mail` varchar(45) NOT NULL,
  `k_adi` varchar(45) NOT NULL,
  `p_hash` varchar(45) NOT NULL,
  `premium_check` tinyint(1) NOT NULL,
  `user_type` tinyint(1) NOT NULL,
  `r_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `kullanici`:
--

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`tel_no`, `e_mail`, `k_adi`, `p_hash`, `premium_check`, `user_type`, `r_count`) VALUES
('', '', '', '$2y$10$E64tfT0WQDqDSKt9WuDIWee.OWLVA2Kg0syCBv', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mekanlar`
--
-- Oluşturma: 30 Eki 2023, 18:19:03
--

DROP TABLE IF EXISTS `mekanlar`;
CREATE TABLE `mekanlar` (
  `mekan_id` int(11) NOT NULL,
  `mekan_adi` varchar(45) NOT NULL,
  `enlem` int(11) NOT NULL,
  `boylam` int(11) NOT NULL,
  `fotograf` varchar(100) NOT NULL,
  `bilgi_yazisi` text NOT NULL,
  `plaka` int(11) NOT NULL,
  `mt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `mekanlar`:
--   `mt_id`
--       `mekan_türleri` -> `mt_id`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mekan_türleri`
--
-- Oluşturma: 30 Eki 2023, 18:18:24
--

DROP TABLE IF EXISTS `mekan_turleri`;
CREATE TABLE `mekan_turleri` (
  `mt_id` int(11) NOT NULL,
  `type_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `mekan_türleri`:
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rotalar`
--
-- Oluşturma: 30 Eki 2023, 18:24:13
--

DROP TABLE IF EXISTS `rotalar`;
CREATE TABLE `rotalar` (
  `rota_id` int(11) NOT NULL,
  `tel_no` char(11) NOT NULL,
  `plaka` int(11) NOT NULL,
  `r_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `rotalar`:
--   `tel_no`
--       `kullanici` -> `tel_no`
--   `plaka`
--       `sehirler` -> `plaka`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rota_olustur`
--
-- Oluşturma: 30 Eki 2023, 18:28:55
--

DROP TABLE IF EXISTS `rota_olustur`;
CREATE TABLE `rota_olustur` (
  `k_id` char(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `rota_olustur`:
--   `m_id`
--       `mekanlar` -> `mekan_id`
--   `r_id`
--       `rotalar` -> `rota_id`
--   `k_id`
--       `kullanici` -> `tel_no`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sehirler`
--
-- Oluşturma: 30 Eki 2023, 17:03:10
--

DROP TABLE IF EXISTS `sehirler`;
CREATE TABLE `sehirler` (
  `plaka` int(11) NOT NULL,
  `sehir_adi` varchar(45) NOT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `sehirler`:
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--
-- Oluşturma: 30 Eki 2023, 18:22:18
--

DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `tel_no` char(11) NOT NULL,
  `mekan_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_date` date NOT NULL,
  `rate` int(11) NOT NULL,
  `confirm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `yorumlar`:
--   `tel_no`
--       `kullanici` -> `tel_no`
--   `mekan_id`
--       `mekanlar` -> `mekan_id`
--

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`tel_no`),
  ADD UNIQUE KEY `mail` (`e_mail`),
  ADD UNIQUE KEY `kullanici_adi` (`k_adi`);

--
-- Tablo için indeksler `mekanlar`
--
ALTER TABLE `mekanlar`
  ADD PRIMARY KEY (`mekan_id`),
  ADD KEY `plaka` (`plaka`),
  ADD KEY `mekanlar_ibfk_1` (`mt_id`);

--
-- Tablo için indeksler `mekan_türleri`
--
ALTER TABLE `mekan_turleri`
  ADD PRIMARY KEY (`mt_id`);

--
-- Tablo için indeksler `rotalar`
--
ALTER TABLE `rotalar`
  ADD PRIMARY KEY (`rota_id`),
  ADD KEY `tel_no` (`tel_no`),
  ADD KEY `plaka` (`plaka`);

--
-- Tablo için indeksler `rota_olustur`
--
ALTER TABLE `rota_olustur`
  ADD PRIMARY KEY (`k_id`,`m_id`),
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
  ADD KEY `tel_no` (`tel_no`),
  ADD KEY `mekan_id` (`mekan_id`);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `mekanlar`
--
ALTER TABLE `mekanlar`
  ADD CONSTRAINT `mekanlar_ibfk_1` FOREIGN KEY (`mt_id`) REFERENCES `mekan_turleri` (`mt_id`);

--
-- Tablo kısıtlamaları `rotalar`
--
ALTER TABLE `rotalar`
  ADD CONSTRAINT `rotalar_ibfk_1` FOREIGN KEY (`tel_no`) REFERENCES `kullanici` (`tel_no`),
  ADD CONSTRAINT `rotalar_ibfk_2` FOREIGN KEY (`plaka`) REFERENCES `sehirler` (`plaka`);

--
-- Tablo kısıtlamaları `rota_olustur`
--
ALTER TABLE `rota_olustur`
  ADD CONSTRAINT `rota_olustur_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `mekanlar` (`mekan_id`),
  ADD CONSTRAINT `rota_olustur_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `rotalar` (`rota_id`),
  ADD CONSTRAINT `rota_olustur_ibfk_3` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`tel_no`);

--
-- Tablo kısıtlamaları `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD CONSTRAINT `yorumlar_ibfk_1` FOREIGN KEY (`tel_no`) REFERENCES `kullanici` (`tel_no`),
  ADD CONSTRAINT `yorumlar_ibfk_2` FOREIGN KEY (`mekan_id`) REFERENCES `mekanlar` (`mekan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
