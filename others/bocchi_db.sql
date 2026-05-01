-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 03:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bocchi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `image_path`, `name`, `role`, `info`) VALUES
(1, 'hitoriicon.jpg', 'Hitori Gotoh', 'Main Character (Guitarist)', 'Hitori Gotoh, or better known as Bocchi, is the titular main protagonist of the manga and anime series Bocchi the Rock!. She is a first year student in Shuka High School and is in charge of the lyrics and guitars of the band, Kessoku Band.'),
(2, 'kitaicon.jpg', 'Ikuyo Kita', 'Main Character (Guitarist/Singer)', 'Ikuyo Kita is a main character in the series Bocchi the Rock!. A first-year student of Shuka High School and is in charge of the guitar and vocals of the band, Kessoku Band. She is a cheerful, charismatic extrovert who has an active social life.'),
(3, 'nijikaicon.jpg', 'Nijika Ijichi', 'Main Character (Drummer)', 'An energetic and cheerful second-year high school student. She is the drummer of Kessoku Band. The organizer of her band who takes care of Hitori, was already joined Kessoku Band. She has an older sister, Seika, who is the manager of the live house \"STARRY\" and has a special feeling for the live house.\r\n'),
(5, 'ryoicon.jpg', 'Yamada Ryo', 'Main Character (Bassist)', 'Ryo Yamada is one of the main characters in the manga and anime series, Bocchi the Rock!. She is in her second year at Shimokitazawa High School and is the bassist of the band, Kessoku Band. She works a part-time job at the live house STARRY with Nijika Ijichi.'),
(6, 'seikaicon.jpg', 'Seika Ijichi', 'Supporting Character (Manager)', 'Nijika Ijichi\'s older sister. She is the manager of the live house STARRY.'),
(7, 'pasanicon.jpg', 'PA-san', 'Supporting Character (Sound Engineer)', 'PA-san is an unnamed public address sound engineer of STARRY. She dropped out of high school because she could never wake up early and failed too many classes. It is also the reason why she has her current night job.'),
(8, 'kikuriicon.jpg', 'Kikuri Hiroi', 'Supporting Character', 'Kikuri Hiroi is a supporting character of the manga and anime series, Bocchi the Rock!, and the protagonist of the spinoff manga Bocchi the Rock! Gaiden: Hiroi Kikuri no Fukazake Nikki. She is the bassist and the vocalist of the band, SICK HACK.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
