-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 10:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasemembers`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmembers`
--

CREATE TABLE `adminmembers` (
  `ID` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Password`varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminmembers`
--

INSERT INTO `adminmembers` (`ID`, `Email`, `Password`) VALUES
('13579', '1357Admin@cite.com', 'M1ch@e1j');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `FirstName` varchar(1000) NOT NULL,
  `LastName` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Removal` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`FirstName`, `LastName`, `Email`, `Removal`) VALUES
('Jack', 'JackSon', 'Jack.Jacksong@cite.com', 'Yes'),
('Carl', 'Haricombe', 'TestEmail@justatest.com', 'No'),
('Calcin', 'Moylan', 'TestEmail2@justatest.com', 'No'),
('Joe', 'kenny', 'TestEmail3@justatest.com', 'No'),
('Matt', 'Jyle', 'Fakename@notreal.com', 'No'),
('Daniel', 'something', 'Fakename2@notreal.com', 'No'),
('Panashe', 'Madakasi', 'pkmad06@gmail.com', 'No');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
