-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 01:54 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxi_station`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `numbers` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `make`, `model`, `numbers`) VALUES
(1, 'Acura', 'ILX', 'DYJ-2307'),
(2, 'BMW', 'Z4', '7A0C473'),
(3, 'Jaguar', 'XKR', 'DVP-4680'),
(4, 'Toyota', '4Runner', '560-IWG'),
(5, 'Bugatti', 'Veyron', 'JXA-329'),
(6, 'Audi', 'Q7', 'PJF7188'),
(7, 'Audi', 'A6', 'PRF7105'),
(8, 'Mazda', '5', '8310 ATC');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `car` tinyint(4) UNSIGNED NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `surname`, `car`, `phone`) VALUES
(1, 'Alex', 'Smith', 3, '0634632178'),
(2, 'Yaroslav', 'Gogol', 5, '0952136599'),
(3, 'Vitaliy', 'Rodashchuk', 2, '0452369500'),
(4, 'David', 'Blaine', 1, '0736598855'),
(5, 'Steave', 'Kolomiec', 6, '0682134679'),
(6, 'Roman', 'Milovanov', 4, '0504679461'),
(7, 'Nick', 'Jones', 1, '0995412366'),
(8, 'Konstantin', 'Petrov', 4, '0695685412'),
(9, 'Oskar', 'Mitchell', 7, '0665845622');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `driver` tinyint(4) NOT NULL,
  `route` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `finished` enum('No','Yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `driver`, `route`, `phone`, `date`, `finished`) VALUES
(1, 1, 'Radyanska 25 - Nebesnoi Sotni 3', '0956431245', '2018-03-01 03:19:28', 'Yes'),
(2, 3, 'Ostapapa Bendara 30A - Kyivska 180', '0634576895', '2018-03-01 06:15:51', 'Yes'),
(3, 6, 'Kolomenskaya 1 - Zhovtneva 23B', '0734615400', '2018-02-28 05:24:10', 'Yes'),
(4, 2, 'Ostapa Bendara 14 - Rosishki', '0501346664', '2018-03-02 03:16:46', 'Yes'),
(5, 5, 'Babanka - Kiev', '0561349977', '2018-03-02 03:44:11', 'No'),
(6, 4, 'Lesi Ukrainki 12 - Komarova 23', '0675123456', '2018-03-02 03:54:42', 'Yes'),
(7, 1, 'London - Paris', '0665431112', '2018-03-02 03:55:07', 'No'),
(13, 7, 'Boguna 12 - Lenina 34A', '0665632145', '2018-03-02 07:00:28', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
