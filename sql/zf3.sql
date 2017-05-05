-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 03:44 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zf3`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(1, 'The Military Wives', 'In My Dreams'),
(2, 'Adele', '21'),
(3, 'Bruce Springsteen', 'Wrecking Ball (Deluxe)'),
(4, 'Lana Del Rey', 'Born To Die'),
(5, 'Gotye', 'Making Mirrors');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `pwd_reset_token` varchar(255) DEFAULT NULL,
  `pwd_reset_token_creation_date` datetime DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `billing_plan` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `full_name`, `phone`, `status`, `password`, `date_created`, `pwd_reset_token`, `pwd_reset_token_creation_date`, `street_address`, `city`, `state`, `post_code`, `country`, `billing_plan`, `payment_method`) VALUES
(1, 'dkvasani', 'Dharmesh', '', '1', '$2y$10$9JayzvtzStqfaTqahMamGuxKB9oq7QvK.lys8zBHHkstsTveVZBWK', '2017-05-05 08:43:28', NULL, NULL, '', '', '', '', '', '', ''),
(2, 'dkvasani1', 'Dharmesh', '', '1', '$2y$10$ooQ3o100VY6KTX5y6f6sLeebBmv8ud3vkebt1Vv3.jSWt/asxRfhq', '2017-05-05 08:44:02', NULL, NULL, '', '', '', '', '', '', ''),
(3, 'dharmesh.vasani@multidots.in', 'Dharmesh Vasani', '', '1', '$2y$10$L6Lq/rSWNG2/NSEhLtPJneQCup14Zvorbxx2kaMQuNk3I1zu/kXme', '2017-05-05 10:04:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
