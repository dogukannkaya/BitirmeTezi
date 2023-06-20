-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Haz 2023, 15:10:58
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
-- Veritabanı: `library`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(3, 'dogukankaya', '12345'),
(4, 'admin', '1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `bookname` varchar(40) NOT NULL,
  `author` varchar(40) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `pageNumber` int(11) NOT NULL,
  `language` varchar(20) NOT NULL,
  `reservationCheck` tinyint(1) NOT NULL,
  `bookimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `books`
--

INSERT INTO `books` (`bookid`, `bookname`, `author`, `ISBN`, `pageNumber`, `language`, `reservationCheck`, `bookimage`) VALUES
(1, 'Dune', 'Frank Herbert', '9786053754794', 712, 'Türkçe', 0, 'assets\\img\\kitaplar\\dunekitap.jpg'),
(2, 'Yüzüklerin Efendisi - Tek Cilt Özel Bası', 'J.R.R. Tolkien', '9789753423472', 1026, 'Türkçe', 0, 'assets\\img\\kitaplar/yuzuklerinefendisikitap.jpg'),
(3, 'NUTUK', 'ATATÜRK', '000000000', 543, 'Türkçe', 1, 'assets\\img\\kitaplar\\nutuk.jpg'),
(4, '1984', 'George Orwell', '654753545', 314, 'İngilizce', 0, 'assets/img/kitaplar/1984kitap.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `cusname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `customer`
--

INSERT INTO `customer` (`id`, `cusname`, `phone`, `mail`) VALUES
(7, 'Doğukan Kaya', '5330878460', 'dgkn_kaya@hotmail.com'),
(8, 'd', '123', 'd@d'),
(9, 'dogukan', 'd', 'dogukan@d'),
(23, 'Doğukan Kaya', '5330878460', 'dgkn_kaya@hotmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reservation`
--

CREATE TABLE `reservation` (
  `rezid` int(11) NOT NULL,
  `sdate` varchar(15) NOT NULL,
  `edate` varchar(15) NOT NULL,
  `bookid` int(11) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `reservation`
--

INSERT INTO `reservation` (`rezid`, `sdate`, `edate`, `bookid`, `phone`, `email`) VALUES
(23, '10/06/2023', '30/06/2023', 3, 5330878460, 'dgkn_kaya@hotmail.com');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`rezid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rezid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
