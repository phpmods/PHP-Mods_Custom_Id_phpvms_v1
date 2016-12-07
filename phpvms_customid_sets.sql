-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2016 at 11:54 AM
-- Server version: 5.7.12-log
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `default`
--

-- --------------------------------------------------------

--
-- Table structure for table `phpvms_customid_sets`
--

CREATE TABLE `phpvms_customid_sets` (
  `id` int(11) NOT NULL,
  `table_name` varchar(55) NOT NULL,
  `column_name` varchar(55) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phpvms_customid_sets`
--

INSERT INTO `phpvms_customid_sets` (`id`, `table_name`, `column_name`, `status`) VALUES
(1, 'activityfeed', 'pilotid', 0),
(2, 'acarsdata', 'pilotid', 0),
(3, 'adminlog', 'pilotid', 0),
(4, 'awardsgranted', 'pilotid', 0),
(5, 'bids', 'pilotid', 0),
(6, 'fieldvalues', 'pilotid', 0),
(7, 'groupmembers', 'pilotid', 0),
(8, 'ledger', 'pilotid', 0),
(9, 'pirepcomments', 'pilotid', 0),
(10, 'pireps', 'pilotid', 0),
(11, 'sessions', 'pilotid', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phpvms_customid_sets`
--
ALTER TABLE `phpvms_customid_sets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phpvms_customid_sets`
--
ALTER TABLE `phpvms_customid_sets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
