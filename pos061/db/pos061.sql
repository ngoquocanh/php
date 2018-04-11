-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2018 at 04:32 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.29-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `pos061`
--

CREATE TABLE `pos061` (
  `id` int(11) NOT NULL,
  `country_code` varchar(40) NOT NULL,
  `area_code` varchar(40) NOT NULL,
  `mobile_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos061`
--

INSERT INTO `pos061` (`id`, `country_code`, `area_code`, `mobile_number`) VALUES
(1, '+84', '6546', '88888888'),
(2, '+04', '65000', '43646458');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pos061`
--
ALTER TABLE `pos061`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pos061`
--
ALTER TABLE `pos061`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
