-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 06:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Pop'),
(2, 'Rock'),
(3, 'Hip Hop'),
(4, 'Country'),
(5, 'Funk');

-- --------------------------------------------------------

--
-- Table structure for table `nationals`
--

CREATE TABLE `nationals` (
  `id` int(11) NOT NULL,
  `national` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nationals`
--

INSERT INTO `nationals` (`id`, `national`) VALUES
(1, 'VietNam'),
(2, 'US'),
(3, 'UK'),
(4, 'Japan'),
(5, 'China'),
(6, 'Korea');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `artist` text NOT NULL,
  `genre_id` int(11) NOT NULL,
  `national_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `user` varchar(50) NOT NULL,
  `date_uploaded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `genre_id`, `national_id`, `image`, `user`, `date_uploaded`) VALUES
(1, 'Tại Vì Sao', 'MCK', 3, 1, 'Tại vì sao.png', 'darkmikuss1', '2022-12-05 01:18:09'),
(2, 'Yoru ni Kakeru', 'YOASOBI', 1, 4, 'Yoru ni Kakeru.png', 'admin1', '2022-12-05 02:11:45'),
(3, 'Sorry Sorry', 'SUPER JUNIOR', 1, 6, 'Sorry Sorry.png', 'admin1', '2022-12-05 02:14:19'),
(4, 'Waiting For You', 'MONO, Onionn', 1, 1, 'Waiting for you.png', 'admin1', '2022-12-05 02:15:35'),
(5, 'Đáp Án Cuối Cùng', 'Quân A.P', 1, 1, 'Đáp án cuối cùng.png', 'darkmikuss1', '2022-12-05 03:05:50'),
(6, 'Blank Space', 'Taylor Swift', 1, 2, 'Blank Space.png', 'admin1', '2022-12-05 11:32:30'),
(9, 'Cô ta', 'Vũ', 1, 1, 'Cô ta.png', 'darkmikuss1', '2022-12-28 22:26:27'),
(10, 'Dang Dở', 'Nal', 1, 1, 'Dang dở.png', 'darkmikuss1', '2022-12-28 22:28:25'),
(11, 'Tòng phu', 'KEYO', 1, 1, 'Tòng phu.png', 'admin1', '2022-12-28 22:31:39'),
(12, 'Sashimi', 'Chipu', 1, 1, 'Sashimi.png', 'admin1', '2022-12-28 22:31:58'),
(13, 'Snowman', 'Sia', 1, 2, 'Snowman.png', 'admin1', '2022-12-28 22:36:17'),
(14, 'Em là', 'MONO', 1, 1, 'Em là.png', 'admin1', '2022-12-28 22:41:52'),
(15, 'Tự tình 2', 'Trung Quân, Lâm Nguyên', 1, 1, 'Tự tình 2.png', 'admin1', '2023-01-02 17:54:17'),
(17, 'I want it that way', 'Backstreet Boys', 1, 2, 'I want it that way.png', 'admin1', '2023-01-04 21:06:30'),
(18, 'Your Man', 'Josh Turner', 4, 2, 'Your Man.png', 'admin1', '2023-01-04 21:55:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationals`
--
ALTER TABLE `nationals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `national_id` (`national_id`),
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nationals`
--
ALTER TABLE `nationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`national_id`) REFERENCES `nationals` (`id`),
  ADD CONSTRAINT `songs_ibfk_3` FOREIGN KEY (`user`) REFERENCES `users` (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
