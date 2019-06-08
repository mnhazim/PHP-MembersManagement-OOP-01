-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2019 at 04:01 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbspa`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahli`
--

CREATE TABLE `ahli` (
  `ahli_id` int(11) NOT NULL,
  `ahli_nama` varchar(200) NOT NULL,
  `ahli_ic` varchar(50) NOT NULL,
  `ahli_email` varchar(100) NOT NULL,
  `ahli_pass` varchar(100) NOT NULL,
  `ahli_tarikhdaftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ahli`
--

INSERT INTO `ahli` (`ahli_id`, `ahli_nama`, `ahli_ic`, `ahli_email`, `ahli_pass`, `ahli_tarikhdaftar`) VALUES
(25, 'khairul bin mahat', '111111111111', 'khairul@gmail.com', 'VxpIzO06BBg44B2yy8c/Ow==', '2019-01-16'),
(26, 'tiara binti mahmud', '222222222222', 'tiara@gmail.com', 'dfMwDgCg/jzmtOMHxne3dw==', '2019-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `pengurus_id` int(11) NOT NULL,
  `pengurus_nama` varchar(200) NOT NULL,
  `pengurus_ic` varchar(20) NOT NULL,
  `pengurus_email` varchar(100) NOT NULL,
  `pengurus_pass` varchar(100) NOT NULL,
  `pengurus_tarikhdaftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`pengurus_id`, `pengurus_nama`, `pengurus_ic`, `pengurus_email`, `pengurus_pass`, `pengurus_tarikhdaftar`) VALUES
(1, 'muhamad noor hazim bin mohamed esa', '123456011234', 'admin@gmail.com', 'gU5KZlXBoomVb0iXjXyIyg==', '2019-01-15 23:24:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahli`
--
ALTER TABLE `ahli`
  ADD PRIMARY KEY (`ahli_id`),
  ADD UNIQUE KEY `ahli_email` (`ahli_email`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`pengurus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahli`
--
ALTER TABLE `ahli`
  MODIFY `ahli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `pengurus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
