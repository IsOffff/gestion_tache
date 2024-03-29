-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 24, 2023 at 12:03 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionnaire de taches`
--

-- --------------------------------------------------------

--
-- Table structure for table `taches`
--

CREATE TABLE `taches` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text,
  `date_echeance` date NOT NULL,
  `etat` enum('non commence','en cours','termine') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taches`
--

INSERT INTO `taches` (`id`, `titre`, `description`, `date_echeance`, `etat`) VALUES
(3, 'tache 4', 'vous devez vous rendre à la gare lyonnn', '2924-07-19', 'en cours'),
(9, 'tache 2', 'rendez vous devant la banque la pluuuus procheee', '2024-02-12', 'non commence'),
(10, 'tache 3', 'bravo, applaudissez vous ,vous même ', '2024-12-31', 'non commence'),
(20, 'tache 0', 'Présentez vous svp', '2023-07-22', 'termine'),
(21, 'tache 1', 'Avancez de trois pas', '2023-07-25', 'en cours');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taches`
--
ALTER TABLE `taches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taches`
--
ALTER TABLE `taches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
