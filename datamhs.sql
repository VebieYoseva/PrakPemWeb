-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 05:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasdatamahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `datamhs`
--

CREATE TABLE `datamhs` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datamhs`
--

INSERT INTO `datamhs` (`nim`, `nama`, `prodi`) VALUES
('121010043', 'Ratna', 'Sains Data'),
('1211153409', 'Ray', 'Arsitektur'),
('1211400001', 'Bintang ', 'Teknik Sipil'),
('1211400002', 'Amelia', 'Teknik Sipil'),
('1211400101', 'Elisabet', 'Teknik Informatika'),
('1211400125', 'Gaberia', 'Teknik Informatika'),
('121140016', 'Vebie', 'Teknik Informatika'),
('121140027', 'Putri Naftali', 'Teknik Informatika'),
('1211500078', 'Jamal', 'Teknik Mesin'),
('121160047', 'Kila', 'Desain Komunikasi Visual'),
('121163245', 'Jessica', 'Sains Aktuaria'),
('1211784903', 'Rizky', 'Teknik Biosistem'),
('121300078', 'Yustica', 'Biologi'),
('121300957', 'Kezia', 'Biologi'),
('12139789', 'Asep', 'Teknik Industri'),
('121415076', 'Andi', 'Teknik Elektro'),
('121500698', 'Olivia', 'Teknik Mesin'),
('121507896', 'Agus', 'Teknologi Pangan'),
('121567890', 'Bobby', 'Teknik Pertambangan'),
('121700984', 'Anna', 'Rekayasa Kosmetik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datamhs`
--
ALTER TABLE `datamhs`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
