-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 11:17 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_sabira_aliu_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_sabira_aliu_petadoption` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cr11_sabira_aliu_petadoption`;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `age` varchar(20) NOT NULL,
  `hobby` varchar(30) NOT NULL,
  `location` varchar(255) NOT NULL,
  `pet_image` varchar(255) DEFAULT NULL,
  `size` enum('small','largr') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`pet_id`, `name`, `description`, `age`, `hobby`, `location`, `pet_image`, `size`) VALUES
(2, 'Benny', 'I am Benny', '2', 'playing', 'Praterstrasse 11,1030,Wien', 'https://images.unsplash.com/photo-1537151608828-ea2b11777ee8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60', 'small'),
(4, 'Puffy', 'dgfdgfhfg', '8', 'playing', 'dfgfhffg', 'https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60', ''),
(5, 'Black', 'the best friend you can ever have', '9', 'playing', '1230 Wien, 23. Bezirk, Liesing', 'https://images.unsplash.com/photo-1555557135-0971899f7e3c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60', NULL),
(6, 'Rocky', 'so cute and funny.', '8', 'playing', 'Strassestrasse 33,1230,Wien', 'https://images.unsplash.com/photo-1544568100-847a948585b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60', 'largr'),
(7, 'Fluffy', 'funny and loyal,sometimes a bit lazy.', '9', 'playing', 'Strassestrasse 55, 1230, Wien', 'https://images.unsplash.com/photo-1587300003388-59208cc962cb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60', 'largr'),
(8, 'Leen', 'so preaty and allwaus in the mood.', '9', 'playing', 'Strassestrasse 87,1100,Wien', 'https://images.unsplash.com/photo-1585908286456-991b5d0e53f4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60', 'largr'),
(9, 'Amanda', 'so stylish, fashion is my thing.', '10', 'playing', 'Strassestrasse 44, 1130,Wien', 'https://images.unsplash.com/photo-1505628346881-b72b27e84530?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60', 'largr'),
(10, 'Minny', 'so sweet and funny.', '2', 'playing', 'Strassestrasse 88, 1030, Wien', 'https://images.unsplash.com/photo-1560807707-8cc77767d783?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60', 'small'),
(11, 'Ricky', 'so set, need afriend.', '1', 'playing', 'Strassestrasse 87, 1110,Wien', 'https://images.unsplash.com/photo-1593620659530-7f98c53de278?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60', 'small'),
(12, 'Dj Green', 'so stylish and green is my favourite color.', '2', 'playing', 'Strassestrasse 56, 1140, Wien', 'https://images.unsplash.com/photo-1598133894008-61f7fdb8cc3a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60', 'small'),
(13, 'Rina', 'so sweet and funny.', '1', 'playing', 'Strassestrasse 54, 1150, Wien', 'https://images.unsplash.com/photo-1599537535387-ffffda494e6c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60', 'small'),
(14, 'Benny', 'so strong and loyal.', '5', 'playing', 'Strassestrasse 55, 1170, Wien', 'https://images.unsplash.com/photo-1585672273360-3692010c7fbf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60', 'largr'),
(16, 'Maya', 'only 3 days old.', '0', 'sleep', 'Strassestrasse 33, 1220, Wien', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScQzK5xK54QNRWzKcFfy6sib0-gNBBsTbJFg&usqp=CAU', 'small'),
(17, 'Bobby', 'only 5 days old.', '0', 'sleep', 'Strassestrasse 77, 1090, Wien', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWVp8PCWR0btUJP9RYUHiephU7BgB_eQjEig&usqp=CAU', 'largr'),
(18, 'Sleepy', 'only 2 days old.', '0', 'sleep', 'Strassestrasse 65, 1230, Wien', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbQQBM7ZvNR1MdSGQtpUndSyTEPsMIHSdaSw&usqp=CAU', 'largr');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(1, 'Sabira Aliu', 'sabira@mail.com', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a', 'user'),
(2, 'Test Admin', 'admin@mail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
