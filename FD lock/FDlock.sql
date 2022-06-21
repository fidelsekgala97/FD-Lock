-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2021 at 11:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FDlock`

-- --------------------------------------------------------

--
-- Table structure for table `pass_word`
--

CREATE TABLE `pass_word` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `app` varchar(256) NOT NULL,
  `pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pass_word`
--

INSERT INTO `pass_word` (`id`, `userid`, `app`, `pwd`) VALUES
(1, 4, 'calculator', '$2y$10$HOK0NEIcUiXiAgcX3y4zM.fmSo0Y1HAYOVvO7WG0OTq8HVyBC4xcq'),
(2, 4, '1', '$2y$10$D8zLDXhUirnadH/Bj1DCWOiKRCuYEP0SdAnQIJ/mDfAsxCA.5qPpa'),
(3, 5, '1', '$2y$10$rCWNb7saTli0XZt1Y00W5OgPRt9c4mxnKrZQDJuqBOURx7kIsh6Oe'),
(5, 7, '1', '$2y$10$P9etkPa1vH8y9gfHiXjlQOGCqXnjNnLtea0WJPaF12TGJI1jM1FU.'),
(6, 7, 'calculator', '$2y$10$fpwRpd0GJoSg1BDuc1m/p.mW2phlApjCFY/H3RGrzGrCSSNY8G4uC'),
(7, 7, 'youtube', '$2y$10$nhZxdssHciKFx97zYQ3k1uRhBSt/YsOw6ymnZgi7GqCmqBuf2/7CS'),
(8, 7, 'facebook', '$2y$10$6TJ5KaDVXzlaAoodQT2maeNqUpKagscI/.5IQV62XuK2I6b0pbGP2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_phone` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_email`, `user_phone`) VALUES
(4, 'rinaye nethanani', 'onewaho@gmail.com', '0723665121'),
(5, 'ntiyiso', 'ntiyiso@gmail.com', '0723665121'),
(6, 'teboho Ramroroka', '~!091@gmail.com', '0637827302'),
(7, 'Tebogo Ramroroka', 'manape091@gmail.com', '0637825625');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pass_word`
--
ALTER TABLE `pass_word`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pass_word`
--
ALTER TABLE `pass_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pass_word`
--
ALTER TABLE `pass_word`
  ADD CONSTRAINT `pass_word_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
