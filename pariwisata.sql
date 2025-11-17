-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2025 at 08:52 AM
-- Server version: 8.0.43
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_wisata`
--

CREATE TABLE `list_wisata` (
  `id_wisata` int NOT NULL,
  `destinasi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `itinerary` text COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `jumlah_maksimal` int NOT NULL,
  `pilihan_transportasi` enum('Pesawat','Bus') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_wisata`
--

INSERT INTO `list_wisata` (`id_wisata`, `destinasi`, `itinerary`, `harga`, `tanggal_pelaksanaan`, `jumlah_maksimal`, `pilihan_transportasi`) VALUES
(14, 'labuan bajo', 'day 1 : naik kapal ', 6000000, '2026-09-02', 5, 'Pesawat');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Nama_Lengkap` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ID` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Username` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Usia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Nama_Lengkap`, `ID`, `Username`, `Password`, `Usia`) VALUES
('', '111', 'bbb', '$2y$10$bKlsWYDGabrl7wv8SdJWjO.ViCHqikksIDg92/U9sSYEc2eHkmSKW', 0),
('', '12', '12', '$2y$10$Y50SHNcxw2aAzm5YHeD9Ku1czKNfGJuHuMZZhCOJE.7dRUIMFzfxO', 12),
('aaa', '123', 'aaa', '$2y$10$hyPdtdAi4l1M6SCbMcBi6OXpCt1F5je6SuCZ266o6RDxgw8JoefH2', 0),
('', '677', 'fanny', '$2y$10$YH9VuJZbrhr.FQ7SQbTL2.cvtiyzszOMI5g0WZQh4jsD6BLd.LwL6', 50),
('', 'aa', 'aa', '$2y$10$JHenHctPl7tCsanU0Ym.7.tlTAQXbRBzwJ8r/IggFnsZo7fTGoR5.', 12),
('', 'oo', 'oo', '$2y$10$POf.DubTppTGnNMVwtIkt.Ef6v36SOAbjqjsh4mI5oF0uc7hRhjBi', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_wisata`
--
ALTER TABLE `list_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_wisata`
--
ALTER TABLE `list_wisata`
  MODIFY `id_wisata` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
