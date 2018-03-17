-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 09:51 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ts`
--

-- --------------------------------------------------------

--
-- Table structure for table `dayscore`
--

CREATE TABLE `dayscore` (
  `ign` varchar(20) NOT NULL,
  `count` int(5) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dayscore`
--

INSERT INTO `dayscore` (`ign`, `count`, `date`) VALUES
('### FreedoM ###', 2, '2018-02-11'),
('10 $', 2, '2018-02-11'),
('<wenda pro>', 2, '2018-02-11'),
('<|Lucky|>', 2, '2018-02-11'),
('amuck <3', 4, '2018-02-11'),
('billa', 2, '2018-02-11'),
('cG[A] C#', 2, '2018-02-11'),
('cG[A]SATHAN', 4, '2018-02-11'),
('cG[A]SoNoob!!!', 4, '2018-02-11'),
('cG[B]Manasic', 3, '2018-02-11'),
('cG[B]_jingies', 2, '2018-02-11'),
('cG[E]BENA-SL', 2, '2018-02-11'),
('cG[V] Slash#', 2, '2018-02-11'),
('CHAE', 4, '2018-02-11'),
('chamarasanka sl', 2, '2018-02-11'),
('Commando', 2, '2018-02-11'),
('DeMoN_$laSheR', 4, '2018-02-11'),
('dUck', 4, '2018-02-11'),
('fdolak123', 2, '2018-02-11'),
('Gang$teR', 2, '2018-02-11'),
('GhostRKO', 2, '2018-02-11'),
('Hakz', 4, '2018-02-11'),
('HAMZABROKER', 2, '2018-02-11'),
('Harrasment', 2, '2018-02-11'),
('Infinit', 2, '2018-02-11'),
('J4CK', 2, '2018-02-11'),
('ja3bonix', 4, '2018-02-11'),
('JELLY', 2, '2018-02-11'),
('Kammel!ya', 2, '2018-02-11'),
('king', 2, '2018-02-11'),
('MuZnIaHaMeD', 2, '2018-02-11'),
('new plyr', 2, '2018-02-11'),
('ONGA', 4, '2018-02-11'),
('P.|V|.A', 2, '2018-02-11'),
('ph0kzy', 4, '2018-02-11'),
('Punl< B', 4, '2018-02-11'),
('Quack|sittingduck~', 4, '2018-02-11'),
('ranith', 1, '2018-02-11'),
('ruvi213', 4, '2018-02-11'),
('sambar', 2, '2018-02-11'),
('scooby', 1, '2018-02-11'),
('STS|Im_NooB', 2, '2018-02-11'),
('Tariq007', 2, '2018-02-11'),
('Toyiya', 4, '2018-02-11'),
('TRISTAN', 4, '2018-02-11'),
('Waka---Pute****', 2, '2018-02-11'),
('White wolf', 2, '2018-02-11'),
('XMYRbIi', 2, '2018-02-11'),
('[!NZ@N]*LOV3|<3|H3R*', 4, '2018-02-11'),
('[!NZ@N]LA$T|KING|!', 2, '2018-02-11'),
('[SL]#DR@GON W@RRI0R', 2, '2018-02-11'),
('^1Prey^0!', 2, '2018-02-11'),
('^2BILLA', 1, '2018-02-11'),
('^2cG^1[^5A^1]^0SaV!T', 1, '2018-02-11'),
('^6cG^2[B] ^2A^3B^0i^', 1, '2018-02-11'),
('|XcTz|Spyk3Back', 4, '2018-02-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dayscore`
--
ALTER TABLE `dayscore`
  ADD PRIMARY KEY (`ign`,`date`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
