-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2017 at 03:51 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pensync`
--

-- --------------------------------------------------------

--
-- Table structure for table `baak`
--

CREATE TABLE `baak` (
  `baakid` varchar(4) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `kontak` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baak`
--

INSERT INTO `baak` (`baakid`, `name`, `username`, `password`, `kontak`) VALUES
('BA01', 'Bu Pin', 'bupin', '0192023a7bbd73250516f069df18b500', '085730485464');

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE `eventtype` (
  `type` int(1) NOT NULL,
  `info` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventtype`
--

INSERT INTO `eventtype` (`type`, `info`) VALUES
(1, 'OPP / LKMM'),
(2, 'Latihan Rutin UKM'),
(3, 'Program Kerja Ormawa'),
(4, 'Komunitas Non Keprofesian');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `notifid` varchar(5) NOT NULL,
  `notif_stats` tinyint(1) DEFAULT NULL,
  `isi` text,
  `userid` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reqstatus`
--

CREATE TABLE `reqstatus` (
  `status` int(1) NOT NULL,
  `info` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reqstatus`
--

INSERT INTO `reqstatus` (`status`, `info`) VALUES
(1, 'Belum Konfirmasi'),
(2, 'Sudah Konfismasi'),
(3, 'Sedang Digunakan'),
(4, 'Selesai Dipakai'),
(5, 'Dibatalkan'),
(6, 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `reqid` varchar(5) NOT NULL,
  `event` varchar(50) NOT NULL,
  `event_type` int(1) NOT NULL,
  `event_date` date NOT NULL,
  `start_time` time NOT NULL,
  `finish_time` time NOT NULL,
  `verif_code` varchar(10) NOT NULL,
  `userid` varchar(4) NOT NULL,
  `roomid` varchar(5) NOT NULL,
  `req_stats` int(1) NOT NULL,
  `pj` varchar(50) NOT NULL,
  `nrp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`reqid`, `event`, `event_type`, `event_date`, `start_time`, `finish_time`, `verif_code`, `userid`, `roomid`, `req_stats`, `pj`, `nrp`) VALUES
('RE001', 'MEKA MENULIS', 3, '2016-11-29', '19:00:00', '21:00:00', 'NCDUCASDHA', 'US06', 'RO001', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE002', 'OPP', 1, '2016-11-29', '18:00:00', '21:00:00', 'YGHHDHFZHH', 'US04', 'RO002', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE003', 'OPP', 1, '2016-11-29', '21:00:00', '23:00:00', 'YGHHDHFZHH', 'US04', 'RO003', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE004', 'Flooring', 3, '2016-11-29', '21:00:00', '23:00:00', 'YGHHDHFZHH', 'US05', 'RO004', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE005', 'Latihan Rutin', 2, '2016-11-29', '21:00:00', '23:00:00', 'YGHHDHFZHH', 'US17', 'RO005', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE006', 'Sinkronisasi Proker', 3, '2016-11-29', '21:00:00', '23:00:00', 'YGHHDHFZHH', 'US09', 'RO006', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE007', 'OPP', 1, '2016-11-28', '21:00:00', '23:00:00', 'YGHHDHFZHH', 'US03', 'RO007', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE008', 'KOMA UU Lambang', 3, '2016-11-28', '18:00:00', '21:00:00', 'YGHHDHFZHH', 'US10', 'RO008', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE009', 'Meka Cup Volley', 3, '2016-11-28', '17:00:00', '21:00:00', 'YGHHDHFZHH', 'US06', 'RO010', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE010', 'Latihan UKM Baket', 2, '2016-11-28', '16:00:00', '21:00:00', 'YGHHDHFZHH', 'US21', 'RO011', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE011', 'Latihan UKM Futsal', 2, '2016-11-28', '16:00:00', '22:00:00', 'YGHHDHFZHH', 'US19', 'RO012', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE012', 'Latihan UKM Tenis Meja', 2, '2016-11-28', '17:00:00', '22:00:00', 'YGHHDHFZHH', 'US20', 'RO013', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE013', 'Meka Memasak', 3, '2016-12-29', '19:00:00', '21:00:00', 'YGHHDHFZHH', 'US06', 'RO001', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE014', 'OPP', 1, '2016-12-29', '19:00:00', '21:00:00', 'YGHHDHFZHH', 'US08', 'RO002', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE015', 'OPP', 1, '2016-12-29', '19:00:00', '21:00:00', 'YGHHDHFZHH', 'US08', 'RO003', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE016', 'Sinkronisasi Proker', 3, '2016-12-29', '18:00:00', '21:00:00', 'NCDUCASDHA', 'US09', 'RO004', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE017', 'Komunitas ETC', 3, '2016-12-29', '17:00:00', '21:00:00', 'NJKSDUBFSK', 'US03', 'RO005', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE018', 'Latihan', 2, '2016-12-29', '18:00:00', '21:00:00', 'YGHHDHFZHH', 'US16', 'RO006', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE019', 'Workshop', 3, '2016-12-29', '18:00:00', '21:00:00', 'NJKSDUBFSK', 'US04', 'RO007', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE020', 'KOMA UU Lambang', 3, '2016-12-29', '18:00:00', '21:30:00', 'YGHHDHFZHH', 'US10', 'RO008', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE021', 'Workshop', 3, '2016-12-29', '18:00:00', '21:00:00', 'NJKSDUBFSK', 'US04', 'RO009', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE022', 'Latihan', 2, '2016-12-29', '18:00:00', '21:30:00', 'YGHHDHFZHH', 'US22', 'RO010', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE023', 'Elin Cup Basket', 3, '2016-12-29', '18:00:00', '21:00:00', 'NJKSDUBFSK', 'US05', 'RO011', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE024', 'Elka Cup Futsal', 3, '2016-12-29', '18:00:00', '21:30:00', 'YGHHDHFZHH', 'US04', 'RO012', 4, 'Muhammad Rizal Fauzy', '2110151052'),
('RE025', 'acerg', 3, '2016-12-31', '15:00:00', '21:00:00', 'z5vbcm26j1', 'US01', 'RO002', 4, 'dcsdgs', '2110151035'),
('RE026', 'wewewe', 3, '2016-12-30', '17:00:00', '21:00:00', 'tzeargawxt', 'US01', 'RO002', 4, 'uvuvwe', '2110151060'),
('RE027', 'nyoba', 1, '2017-01-02', '17:00:00', '20:00:00', 'mgsypsdffp', 'US01', 'RO001', 1, 'samsoec', '2110151052');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomid` varchar(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `fasilitas` varchar(150) DEFAULT NULL,
  `link_room` varchar(50) NOT NULL,
  `baakid` varchar(4) NOT NULL,
  `current_reqid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `nama`, `fasilitas`, `link_room`, `baakid`, `current_reqid`) VALUES
('RO001', 'HH103', 'Air Conditioner||LCD Projector', '/HH103/1.jpg||/HH103/2.jpg||/HH103/3.jpg', 'BA01', NULL),
('RO002', 'HH104', 'Air Conditioner||Ruangan Luas', '/HH104/1.jpg||/HH104/2.jpg||/HH104/3.jpg', 'BA01', NULL),
('RO003', 'HH105', 'Air Conditioner||LCD Projector||Ruangan Luas', '/HH105/1.jpg||/HH105/2.jpg||/HH105/3.jpg', 'BA01', NULL),
('RO004', 'HH106B', 'Air Conditioner||LCD Projector', '/HH106B/1.jpg||/HH106B/2.jpg||/HH106B/3.jpg', 'BA01', NULL),
('RO005', 'HH106T', 'Air Conditioner||LCD Projector', '/HH106T/1.jpg||/HH106T/2.jpg||/HH106T/3.jpg', 'BA01', NULL),
('RO006', 'HH201', 'Air Conditioner||LCD Projector', '/HH201/1.jpg||/HH201/2.jpg||/HH201/3.jpg', 'BA01', NULL),
('RO007', 'HH203', 'Air Conditioner||LCD Projector||Ruangan Luas', '/HH203/1.jpg||/HH203/2.jpg||/HH203/3.jpg', 'BA01', NULL),
('RO008', 'HH204B', 'Air Conditioner||Ruangan Luas', '/HH204B/1.jpg||/HH204B/2.jpg||/HH204B/3.jpg', 'BA01', NULL),
('RO009', 'HH204T', 'Air Conditioner||Ruangan Luas', '/HH204T/1.jpg||/HH204T/2.jpg||/HH204T/3.jpg', 'BA01', NULL),
('RO010', 'Lapangan Merah', 'Penerangan', '/LAPMER/1.jpg||/LAPMER/2.jpg||/LAPMER/3.jpg', 'BA01', NULL),
('RO011', 'Lapangan Basket', 'Penerangan||2 Ring Basket', '/LAPBAS/1.jpg||/LAPBAS/2.jpg||/LAPBAS/3.jpg', 'BA01', NULL),
('RO012', 'Lapangan Futsal', 'Penerangan||2 Gawang', '/LAPFUS/1.jpg||/LAPFUS/2.jpg||/LAPFUS/3.jpg', 'BA01', NULL),
('RO013', 'Hall D4', NULL, '/HALL/1.jpg||/HALL/2.jpg||/HALL/3.jpg', 'BA01', NULL),
('RO014', 'Kantin', NULL, '/KANTIN/1.jpg||/KANTIN/2.jpg||/KANTIN/3.jpg', 'BA01', NULL),
('RO015', 'Amphiteater', NULL, '/AMPHI/1.jpg||/AMPHI/2.jpg||/AMPHI/3.jpg', 'BA01', NULL),
('RO016', 'Teater', 'Air Conditioner||LCD Projector||Sound System||Microphone 2||Tempat Duduk 150 orang', '/TEATER/1.jpg||/TEATER/2.jpg||/TEATER/3.jpg', 'BA01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sequence`
--

CREATE TABLE `sequence` (
  `name` varchar(10) NOT NULL,
  `current_seq` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sequence`
--

INSERT INTO `sequence` (`name`, `current_seq`) VALUES
('baak', 2),
('notifikasi', 1),
('request', 28),
('room', 17),
('user', 23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(4) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `blocked` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `username`, `password`, `kontak`, `blocked`) VALUES
('US01', 'HIMA IT', 'himit', '0d708861ddc9ba772966f4490424a8f6', '085730485464', NULL),
('US02', 'HIMA TEKKOM', 'hmce', '0f3eb2a5483df6aa6b3cf8a801951bc1', '085730485464', NULL),
('US03', 'HIMA TELKOM', 'hmtelkom', '4ae311f484c7e3b26d505fa2b5c517f3', '085730485464', NULL),
('US04', 'HIMA ELKA', 'hmelka', 'f697652d619de0becfc5b71f067786f9', '085730485464', NULL),
('US05', 'HIMA ELIN', 'hmelin', 'b504d08f3e5cab1657d137460f7e6074', '085730485464', NULL),
('US06', 'HIMA MEKA', 'hmmeka', 'e1130f556328860d61f297c1ff3a7217', '085730485464', NULL),
('US07', 'HIMA ENERGI', 'hmenergi', '0e663765ac0df8ea003a002c493eaa82', '085730485464', NULL),
('US08', 'HIMA MMK', 'hmmmk', 'abf7bdccfea015838f42fa9bd5a7e649', '085730485464', NULL),
('US09', 'BEM', 'bem', '0f7a71d96f408465689dc399011497b9', '085730485464', NULL),
('US10', 'DPM', 'dpm', 'd868130c1fb5d4f90073b0acf7b22d89', '085730485464', NULL),
('US11', 'E_BIO', 'ebio', '1d735870ef124cff35e22e30d9ca9046', '085730485464', NULL),
('US12', 'UKKI', 'ukki', 'cad3d63b03b19039a1a55637691bc12f', '085730485464', NULL),
('US13', 'UKKK', 'ukkk', '30f8c863e416159f59dba17ef9d931ef', '085730485464', NULL),
('US14', 'ENT', 'ent', 'bf3381b74b458fa9c6452a684eb609e8', '085730485464', NULL),
('US15', 'FRENS', 'frens', 'c261b87e17c2bc26e0609340dcaaaacb', '085730485464', NULL),
('US16', 'UKM MUSIK', 'ukmmusik', 'b7fe091fff52514572af38d1a73f5d4e', '085730485464', NULL),
('US17', 'JANAKA', 'janaka', '1b46f82f0dacf493219b27f9a6e7e198', '085730485464', NULL),
('US18', 'MAHETALA', 'mahetala', '74216d5849ebc78953fabcbacfe2a11b', '085730485464', NULL),
('US19', 'UKM FUTSAL', 'futsal', '6eb688e06bd70751cf1cd3ce66f8655c', '085730485464', NULL),
('US20', 'UKM TENIS MEJA', 'tenismeja', 'c19303f98fee16b9fdb9b6ec7e39d942', '085730485464', NULL),
('US21', 'UKM BASKET', 'basket', '77d53cd029a36884ff5fde52374d32a3', '085730485464', NULL),
('US22', 'UKM VOLLY', 'volly', 'a67996541b0fcc0c75dfc4a2e9a50c7d', '085730485464', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baak`
--
ALTER TABLE `baak`
  ADD PRIMARY KEY (`baakid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `eventtype`
--
ALTER TABLE `eventtype`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`notifid`),
  ADD KEY `FOREIGN_USERID` (`userid`);

--
-- Indexes for table `reqstatus`
--
ALTER TABLE `reqstatus`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`reqid`),
  ADD KEY `FOREIGN_EVTYPE` (`event_type`),
  ADD KEY `FOREIGN_USERID` (`userid`),
  ADD KEY `FOREIGN_ROOMID` (`roomid`),
  ADD KEY `FOREIGN_REQSTATS` (`req_stats`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomid`),
  ADD KEY `FOREIGN_BAAKID` (`baakid`),
  ADD KEY `current_reqid` (`current_reqid`);

--
-- Indexes for table `sequence`
--
ALTER TABLE `sequence`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `CONSTRAINT_FORKEY_NOTIF` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `CONSTRAINT_FORKEY_EVTYPE` FOREIGN KEY (`event_type`) REFERENCES `eventtype` (`type`),
  ADD CONSTRAINT `CONSTRAINT_FORKEY_REQSTAT` FOREIGN KEY (`req_stats`) REFERENCES `reqstatus` (`status`),
  ADD CONSTRAINT `CONSTRAINT_FORKEY_ROOMID` FOREIGN KEY (`roomid`) REFERENCES `room` (`roomid`),
  ADD CONSTRAINT `CONSTRAINT_FORKEY_USERID` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `CONSTRAINT_FORKEY_ROOM` FOREIGN KEY (`baakid`) REFERENCES `baak` (`baakid`),
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`current_reqid`) REFERENCES `request` (`reqid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
