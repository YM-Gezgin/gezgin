-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Kas 2023, 20:26:15
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
-- Veritabanı: `trip_database:v2`
--
CREATE DATABASE IF NOT EXISTS `trip_database:v2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `trip_database:v2`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--
-- Oluşturma: 14 Kas 2023, 19:06:54
--

CREATE TABLE `kullanici` (
  `e_mail` varchar(45) NOT NULL,
  `ad_soyad` varchar(45) NOT NULL,
  `p_hash` varchar(45) NOT NULL,
  `premium_kontrol` tinyint(1) NOT NULL,
  `kullanici_tipi` tinyint(1) NOT NULL,
  `rota_sayac` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `kullanici`:
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mekanlar`
--
-- Oluşturma: 14 Kas 2023, 19:16:06
--

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
--   `plaka`
--       `sehirler` -> `plaka`
--   `mt_id`
--       `mekan_türleri` -> `mt_id`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mekan_türleri`
--
-- Oluşturma: 14 Kas 2023, 19:07:30
--

CREATE TABLE `mekan_türleri` (
  `mt_id` int(11) NOT NULL,
  `tur_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `mekan_türleri`:
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rotalar`
--
-- Oluşturma: 14 Kas 2023, 19:18:04
--

CREATE TABLE `rotalar` (
  `rota_id` int(11) NOT NULL,
  `e_mail` varchar(45) NOT NULL,
  `plaka` int(11) NOT NULL,
  `rota_tarihi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `rotalar`:
--   `e_mail`
--       `kullanici` -> `e_mail`
--   `plaka`
--       `sehirler` -> `plaka`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rota_olustur`
--
-- Oluşturma: 14 Kas 2023, 19:18:46
--

CREATE TABLE `rota_olustur` (
  `e_mail` varchar(45) NOT NULL,
  `m_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `rota_olustur`:
--   `e_mail`
--       `kullanici` -> `e_mail`
--   `m_id`
--       `mekanlar` -> `mekan_id`
--   `r_id`
--       `rotalar` -> `rota_id`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sehirler`
--
-- Oluşturma: 14 Kas 2023, 19:08:56
--

CREATE TABLE `sehirler` (
  `plaka` int(11) NOT NULL,
  `sehir_adi` varchar(45) NOT NULL,
  `sayac` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- TABLO İLİŞKİLERİ `sehirler`:
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--
-- Oluşturma: 14 Kas 2023, 19:19:42
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
-- TABLO İLİŞKİLERİ `yorumlar`:
--   `e_mail`
--       `kullanici` -> `e_mail`
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
  MODIFY `mekan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `mekan_türleri`
--
ALTER TABLE `mekan_türleri`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT;

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
