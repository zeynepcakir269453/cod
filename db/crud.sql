-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Haz 2022, 10:03:33
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cod`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `balance_logs`
--

CREATE TABLE `balance_logs` (
                                `id` int(11) NOT NULL,
                                `user` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
                                `action` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
                                `pre_balance` int(11) NOT NULL,
                                `new_balance` int(11) NOT NULL,
                                `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `balance_logs`
--

INSERT INTO `balance_logs` (`id`, `user`, `action`, `pre_balance`, `new_balance`, `created_date`) VALUES
                                                                                                      (1, 'zyn', '', 6565, 35, '2022-06-19 06:29:59'),
                                                                                                      (2, 'zyn', '', 6565, 6580, '2022-06-19 06:34:18'),
                                                                                                      (3, 'zyn', '', 6580, 6605, '2022-06-19 06:36:41'),
                                                                                                      (4, 'zyn', 'added balance', 6605, 6610, '2022-06-19 06:46:39'),
                                                                                                      (5, 'zyn', 'buyed product', 6610, 5110, '2022-06-19 07:04:25'),
                                                                                                      (6, 'zyn', 'buyed product', 5110, 5101, '2022-06-19 07:08:12'),
                                                                                                      (7, 'zyn', 'buyed product', 5101, 5092, '2022-06-19 07:09:49'),
                                                                                                      (8, 'zyn', 'added balance', 5092, 5104, '2022-06-19 07:33:04'),
                                                                                                      (9, 'zyn', 'added balance', 5104, 5200, '2022-06-19 07:40:18'),
                                                                                                      (10, 'zeynepcakir269453@gmail.com', 'added balance', 5800, 5810, '2022-06-19 07:43:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

CREATE TABLE `members` (
                           `ID` int(11) NOT NULL,
                           `username` varchar(50) NOT NULL,
                           `address` text NOT NULL,
                           `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `members`
--

INSERT INTO `members` (`ID`, `username`, `address`, `email`) VALUES
    (5, 'Alexander Peet', 'Las Vegas', 'alexander@email.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
                            `id` int(11) NOT NULL,
                            `name` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
                            `descrition` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
                            `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `descrition`, `price`) VALUES
                                                                 (1, 'kalem', 'kurşun kalem siyah', 1500),
                                                                 (3, 'buzdolabı', 'arçelik', 6900);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sales_log`
--

CREATE TABLE `sales_log` (
                             `id` int(11) NOT NULL,
                             `user` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
                             `products` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
                             `price` int(11) NOT NULL,
                             `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
                        `user_id` int(11) NOT NULL,
                        `name` varchar(64) NOT NULL,
                        `email` varchar(64) NOT NULL,
                        `phone` varchar(32) NOT NULL,
                        `password` varchar(32) NOT NULL,
                        `authority` int(11) NOT NULL DEFAULT 0,
                        `balance` int(11) NOT NULL DEFAULT 0,
                        `image` varchar(32) NOT NULL,
                        `status` tinyint(1) NOT NULL DEFAULT 1,
                        `added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `phone`, `password`, `authority`, `balance`, `image`, `status`, `added`) VALUES
                                                                                                                             (4, 'zeynepcakir269453@gmail.com', '', '', '7cec85c75537840dad40251576e5b757', 2, 5810, '', 1, '2022-06-17 18:29:50'),
                                                                                                                             (6, 'zeyne xxxx', '', '', '7cec85c75537840dad40251576e5b757', 1, 950, '', 1, '2022-06-18 08:28:32'),
                                                                                                                             (7, 'lkjfljfdl', '', '', 'cbcb58ac2e496207586df2854b17995f', 1, 687897, '', 1, '2022-06-18 08:48:49'),
                                                                                                                             (8, 'ZEYNEP CAKIR', '', '', 'db85e2590b6109813dafa101ceb2faeb', 1, 56, '', 1, '2022-06-18 08:52:21'),
                                                                                                                             (10, 'zyn', '', '', '26408ffa703a72e8ac0117e74ad46f33', 0, 5200, '', 1, '2022-06-18 08:54:52');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `balance_logs`
--
ALTER TABLE `balance_logs`
    ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `members`
--
ALTER TABLE `members`
    ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sales_log`
--
ALTER TABLE `sales_log`
    ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `balance_logs`
--
ALTER TABLE `balance_logs`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `members`
--
ALTER TABLE `members`
    MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `sales_log`
--
ALTER TABLE `sales_log`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
    MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
