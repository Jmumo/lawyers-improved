-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 01:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(5, 'john', '1234'),
(28, 'mutinda', '456'),
(35, 'mumo', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(100) NOT NULL,
  `post` varchar(10000) NOT NULL,
  `author` varchar(100) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `date` varchar(10000) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `lawyer` varchar(100) NOT NULL,
  `sign` varchar(100) NOT NULL DEFAULT 'false',
  `status` varchar(100) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `first_name`, `second_name`, `occupation`, `email`, `contact`, `address`, `description`, `lawyer`, `sign`, `status`) VALUES
(1, 'daniel', 'mumo', 'M.E', 'johnmumo22@gmail.com', 4, 'lahore', 'suifrvzdflkbmjxpfo', 'jmn.mumo', 'true', 'inactive'),
(2, 'daniel', 'mumo', 'M.E', 'johnmumo22@gmail.com', 4, 'lahore', 'suifrvzdflkbmjxpfo', 'jmn.mumo', 'true', 'inactive'),
(3, 'john', 'mumo', 'M.E', 'johnmumo22@gmail.com', 76475895, 'lahore', 'parkistan appeal', 'jmn.mumo', 'true', 'active'),
(4, 'daniel', 'mumo', 'M.E', 'johnmumo22@gmail.com', 76475895, 'lahore', 'parkistan appeal', 'mumo2', 'true', 'active'),
(5, 'wedfeiw', 'vydvdc h ', 'wduenxjnwi', 'xunxndw@nhuh', 233235, 'rx763xdg637ew7', 'edxiejfdjr9e', 'jmn.mumo', 'true', 'active'),
(6, '', '', '', '', 0, '', '', 'jmn.mumo', 'true', 'active'),
(7, 'John', 'Mumo', 'M.E', 'john12@gmail.com', 6436565, 'mwingi', 'land agreement', 'jmn.mumo', 'true', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `bindex` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`id`, `name`, `photo`) VALUES
(1, 'land', '1586345816.png'),
(15, 'sdxrgtrty', '1586761097.png');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `description`, `photo`) VALUES
(2, 'the long lasting case of john kiriamiti who has been in prison for around 5 years has been solved finally thanks to our able team of lawyers', '1551885191.png'),
(3, 'the case that has been going in and out of most courts has finally been taken by our judges and we hope to solve as soon as possible', '1551885524.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `date` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `author`, `message`, `date`) VALUES
(1, 'admin', 'the case number 2463737 submitted on wed not picked', '0000-00-00'),
(7, 'admin', 'the case that was submitted on fridayn date two concerning land issues has nort yet been attended to please i urgu all lawyers concerened with this department to make a move', 'Thu/Feb/2019'),
(8, 'admin', 'the case that was submitted on fridayn date two concerning land issues has nort yet been attended to please i urgu all lawyers concerened with this department to make a move', 'Thu/Feb/2019');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `practise` varchar(100) NOT NULL,
  `matter` varchar(10000) NOT NULL,
  `lawyer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `practise`, `matter`, `lawyer`) VALUES
(1, '2019-03-21', 'land issues', ' estgdv', ' qeawrsetdrtfy'),
(2, '2019-03-22', 'land issues', ' land issues', ' another case'),
(3, '2019-03-22', 'land issues', ' land issues', ' another case'),
(4, '2019-03-22', 'land issues', ' land issues', ' another case'),
(5, '2019-03-22', 'land issues', ' land issues', ' another case'),
(6, '2019-03-22', 'land issues', ' land issues', ' another case'),
(7, '2019-03-22', 'land issues', ' land issues', ' another case'),
(8, '2019-03-22', 'land issues', ' land issues', ' another case'),
(10, '2019-03-22', 'land issues', ' land issues', ' another case'),
(11, '2019-03-22', 'land issues', ' land issues', ' another case'),
(12, '2019-03-22', 'land issues', ' land issues', ' another case'),
(13, '2019-03-22', 'land issues', ' land issues', ' another case'),
(14, '2019-03-22', 'land issues', ' land issues', ' another case'),
(15, '2019-03-22', 'land issues', ' land issues', ' another case'),
(16, '2019-03-22', 'land issues', ' land issues', ' another case'),
(17, '2019-03-22', 'land issues', ' land issues', ' another case'),
(18, '2019-03-22', 'land issues', ' land issues', ' another case'),
(19, '2019-08-23', 'murder case', 'i hate appearing in court for such cases ', 'jom.mumo@gmail.com'),
(20, '2020-12-30', 'allowances', ' we want our allowances', 'jom.mumo@gmail.com'),
(25, '3/24/2021', 'fuidio', 'bbjwdn ', 'john'),
(26, '3/24/2021', 'fhsdhw', ' aydxwvhsx', 'john'),
(27, '2020-04-18', 'murder case', ' the issue to be solved soon', 'jmn.mumo'),
(28, '2020-04-18', 'murder case', ' the issue to be solved soon', 'jmn.mumo');

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `id` int(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_paasword` varchar(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign`
--

INSERT INTO `sign` (`id`, `username`, `email`, `password`, `confirm_paasword`, `approve`, `image`) VALUES
(5, 'mumo', 'jmn.mumo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'true', '1586507724.jpg'),
(7, 'mumo3', 'mumo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'false', NULL),
(8, 'mumo4', 'mumo4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'true', NULL),
(9, 'mum', 'iqwmsi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'false', NULL),
(10, 'mum', 'stwt@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'false', NULL),
(11, 'johnmamo', 'mamo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 'false', NULL),
(12, 'johnda', 'mumo22@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 'false', NULL),
(13, 'jmn.mumo', 'jmn@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 'true', '1586890797.png');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `photo` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `first_name`, `second_name`, `department`, `photo`) VALUES
(9, 'rachael', 'kathini', 'ict', '1586764729.png'),
(10, 'john', 'mumo', 'ict', '1586764785.png'),
(17, 'john', 'Doe', 'accounts', '1586889781.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `sign`
--
ALTER TABLE `sign`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
