-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2025 at 06:55 PM
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
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `name`, `price`) VALUES
(1, 'Toronto', 20.00),
(2, 'Cambridge', 22.00),
(3, 'Waterloo', 25.00),
(4, 'Hamilton', 30.00),
(5, 'Brampton', 18.00),
(6, 'Milton', 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `dest` tinytext NOT NULL,
  `password` varchar(255) NOT NULL,
  `paid` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pass`
--

INSERT INTO `pass` (`id`, `name`, `email`, `contact`, `date`, `dest`, `password`, `paid`) VALUES
(26, 'John Doe', 'john@example.com', '1234567890', '2025-04-28', 'Test City', 'password123', 0.00),
(27, 'fdgdfgdf', 'sajaded595@infornma.com', '9055191213', '2025-03-29', 'Toronto', 'Kffpass123!', 0.00),
(28, 'OlYIy', 'OlYIy@testing.com', '3494400714', '2025-05-05', 'Brampton', '3494400714', 0.00),
(29, 'OgOBQ', 'OgOBQ@testing.com', '2331008804', '2025-05-05', 'Brampton', '2331008804', 0.00),
(30, 'fAfJa', 'fAfJa@testing.com', '7104212919', '2025-05-05', 'Brampton', '7104212919', 0.00),
(31, 'vdfdvdf', 'hogoyin349@tupanda.com', '5483987110', '2025-05-30', 'Toronto', '32564561', 2480.00),
(32, 'Menda', 'Menda@testing.com', '0976563390', '2025-05-05', 'Brampton', '0976563390', 0.00),
(33, 'nmAyQ', 'nmAyQ@testing.com', '9160598749', '2025-05-05', 'Brampton', '9160598749', 666.00),
(34, 'pHAHR', 'pHAHR@testing.com', '2926859572', '2025-05-05', 'Brampton', '2926859572', 666.00),
(35, 'EYfOk', 'EYfOk@testing.com', '6793831344', '2025-05-05', 'Brampton', '6793831344', 666.00),
(36, 'KXFYi', 'KXFYi@testing.com', '6839605387', '2025-05-05', 'Brampton', '6839605387', 666.00),
(37, 'pswQl', 'pswQl@testing.com', '6489120871', '2025-05-05', 'Brampton', '6489120871', 666.00),
(38, 'SqmjR', 'SqmjR@testing.com', '6255786780', '2025-05-05', 'Brampton', '6255786780', 666.00),
(39, 'AswVd', 'AswVd@testing.com', '1059718266', '2025-05-05', 'Brampton', '1059718266', 666.00),
(40, 'HjFtd', 'HjFtd@testing.com', '7991441262', '2025-05-05', 'Brampton', '7991441262', 666.00),
(41, 'FGhFA', 'FGhFA@testing.com', '0825005910', '2025-05-05', 'Brampton', '0825005910', 666.00),
(42, 'FApjK', 'FApjK@testing.com', '4181929526', '2025-05-05', 'Brampton', '4181929526', 666.00),
(43, 'RLFJB', 'RLFJB@testing.com', '8508710171', '2025-05-05', 'Brampton', '8508710171', 666.00),
(44, 'bFLUr', 'bFLUr@testing.com', '7049228892', '2025-05-05', 'Brampton', '7049228892', 666.00),
(45, 'KmtZk', 'KmtZk@testing.com', '0001054454', '2025-06-05', 'Brampton', '0001054454', 666.00),
(46, 'SFqmM', 'SFqmM@testing.com', '6328203837', '2025-06-05', 'Brampton', '6328203837', 1242.00),
(47, 'lZPKS', 'lZPKS@testing.com', '5748013991', '2025-06-05', 'Brampton', '5748013991', 1242.00),
(48, 'mtiHy', 'mtiHy@testing.com', '9503766438', '2025-06-05', 'Brampton', '9503766438', 1242.00),
(49, 'ntwYO', 'ntwYO@testing.com', '3172331809', '2025-03-29', 'Brampton', '3172331809', 18.00),
(50, 'vdMMS', 'vdMMS@testing.com', '8687158853', '2025-03-29', 'Brampton', '8687158853', 18.00),
(51, 'OGUBs', 'OGUBs@testing.com', '7133969861', '2025-03-29', 'Brampton', '7133969861', 18.00),
(52, 'pTZXd', 'pTZXd@testing.com', '4026668784', '2025-03-29', 'Brampton', '4026668784', 18.00),
(53, 'oXkzu', 'oXkzu@testing.com', '0542254281', '2025-03-29', 'Brampton', '0542254281', 18.00),
(54, 'ZIXJL', 'ZIXJL@testing.com', '5257929677', '2025-03-29', 'Brampton', '5257929677', 18.00),
(55, 'paEHS', 'paEHS@testing.com', '8469296995', '2025-03-29', 'Brampton', '8469296995', 18.00),
(56, 'swGCe', 'swGCe@testing.com', '9486154939', '2025-03-29', 'Brampton', '9486154939', 18.00),
(57, 'bpuvn', 'bpuvn@testing.com', '9938598037', '2025-03-29', 'Brampton', '9938598037', 18.00),
(58, 'LHNRI', 'LHNRI@testing.com', '3726668611', '2025-03-29', 'Brampton', '3726668611', 18.00),
(59, 'nZzgY', 'nZzgY@testing.com', '2299770111', '2025-03-29', 'Brampton', '2299770111', -558.00),
(60, 'GtHzY', 'GtHzY@testing.com', '2938737717', '2025-03-29', 'Brampton', '2938737717', -558.00),
(61, 'WYjLB', 'WYjLB@testing.com', '5335316649', '2025-03-29', 'Brampton', '5335316649', 18.00),
(62, 'cscdsc', 'hogoyin349@tupanda.com', '5464654', '2025-03-29', 'Toronto', '5646465', 0.00),
(63, 'NdATa', 'NdATa@testing.com', '1032773918', '2025-03-29', 'Toronto', '1032773918', 20.00),
(64, 'DVQCq', 'DVQCq@testing.com', '5135045075', '2025-03-29', 'Toronto', '5135045075', 20.00),
(65, 'UgUcv', 'UgUcv@testing.com', '9668685317', '2025-03-29', 'Brampton', '9668685317', 18.00),
(66, 'cxhUx', 'cxhUx@testing.com', '7298403006', '2025-05-05', 'Brampton', '7298403006', 666.00),
(67, 'ofcZw', 'ofcZw@testing.com', '1208565073', '2025-06-05', 'Brampton', '1208565073', 1242.00),
(68, 'WXgLY', 'WXgLY@testing.com', '7051753842', '2025-03-29', 'Brampton', '7051753842', 0.00),
(69, 'WOCNg', 'WOCNg@testing.com', '9010156186', '2025-05-05', 'Brampton', '9010156186', 666.00),
(70, 'VPGXz', 'VPGXz@testing.com', '8965909307', '2025-06-05', 'Brampton', '8965909307', 1242.00),
(71, 'hMUMJ', 'hMUMJ@testing.com', '7873495755', '2025-03-29', 'Brampton', '7873495755', 0.00),
(72, 'BxJGG', 'BxJGG@testing.com', '1209180912', '2025-05-05', 'Brampton', '1209180912', 666.00),
(73, 'dSOEH', 'dSOEH@testing.com', '3133551046', '2025-06-05', 'Brampton', '3133551046', 1242.00),
(74, 'nTNIF', 'nTNIF@testing.com', '2718181574', '2025-03-29', 'Brampton', '2718181574', 0.00),
(75, 'VKpXP', 'VKpXP@testing.com', '7793894514', '2025-05-05', 'Brampton', '7793894514', 666.00),
(76, 'hmDXw', 'hmDXw@testing.com', '3543544363', '2025-06-05', 'Brampton', '3543544363', 1242.00),
(77, 'bbKyO', 'bbKyO@testing.com', '1197508948', '2025-03-29', 'Brampton', '1197508948', 0.00),
(78, 'kCCUw', 'kCCUw@testing.com', '7048001106', '2025-05-05', 'Brampton', '7048001106', 666.00),
(79, 'PwmNk', 'PwmNk@testing.com', '7169471247', '2025-06-05', 'Brampton', '7169471247', 1242.00),
(80, 'msgOI', 'msgOI@testing.com', '8660944290', '2025-03-29', 'Brampton', '8660944290', 0.00),
(81, 'eSBvN', 'eSBvN@testing.com', '4760232615', '2025-05-05', 'Brampton', '4760232615', 666.00),
(82, 'ihwos', 'ihwos@testing.com', '4610036203', '2025-06-05', 'Brampton', '4610036203', 1242.00),
(83, 'AlQLs', 'AlQLs@testing.com', '0029690627', '2025-03-29', 'Brampton', '0029690627', 0.00),
(84, 'BVPFB', 'BVPFB@testing.com', '3349801305', '2025-05-05', 'Brampton', '3349801305', 666.00),
(85, 'NGvIl', 'NGvIl@testing.com', '5477783023', '2025-06-05', 'Brampton', '5477783023', 1242.00),
(86, 'UVToR', 'UVToR@testing.com', '0853903004', '2025-03-29', 'Brampton', '0853903004', 0.00),
(87, 'TiDEn', 'TiDEn@testing.com', '9821263389', '2025-05-05', 'Brampton', '9821263389', 666.00),
(88, 'AYVVl', 'AYVVl@testing.com', '0118311941', '2025-06-05', 'Brampton', '0118311941', 1242.00),
(89, 'uXRJN', 'uXRJN@testing.com', '8273097089', '2025-03-29', 'Brampton', '8273097089', 0.00),
(90, 'wxPMo', 'wxPMo@testing.com', '3957969681', '2025-05-05', 'Brampton', '3957969681', 666.00),
(91, 'JobdR', 'JobdR@testing.com', '7769378068', '2025-06-05', 'Brampton', '7769378068', 1242.00),
(92, 'ekbhA', 'ekbhA@testing.com', '4906571491', '2025-03-29', 'Brampton', '4906571491', 0.00),
(93, 'XTowH', 'XTowH@testing.com', '4097588423', '2025-05-05', 'Brampton', '4097588423', 666.00),
(94, 'zczzR', 'zczzR@testing.com', '0607349121', '2025-06-05', 'Brampton', '0607349121', 1242.00),
(95, 'edhbW', 'edhbW@testing.com', '1640587188', '2025-03-29', 'Brampton', '1640587188', 0.00),
(96, 'TNiDo', 'TNiDo@testing.com', '5894538644', '2025-05-05', 'Brampton', '5894538644', 666.00),
(97, 'VNOdS', 'VNOdS@testing.com', '1242725372', '2025-06-05', 'Brampton', '1242725372', 1242.00),
(98, 'tNQwN', 'tNQwN@testing.com', '5332793132', '2025-03-29', 'Brampton', '5332793132', 0.00),
(99, 'fymUk', 'fymUk@testing.com', '5440099094', '2025-05-05', 'Brampton', '5440099094', 666.00),
(100, 'Kzbio', 'Kzbio@testing.com', '7677021407', '2025-06-05', 'Brampton', '7677021407', 1242.00),
(101, 'iqlds', 'iqlds@testing.com', '5047974549', '2025-03-29', 'Brampton', '5047974549', 0.00),
(102, 'hukTI', 'hukTI@testing.com', '6981487263', '2025-05-05', 'Brampton', '6981487263', 666.00),
(103, 'ruLfd', 'ruLfd@testing.com', '9801257517', '2025-06-05', 'Brampton', '9801257517', 1242.00),
(104, 'HwRyu', 'HwRyu@testing.com', '5978025013', '2025-03-29', 'Brampton', '5978025013', 0.00),
(105, 'DmBgi', 'DmBgi@testing.com', '9341824159', '2025-05-05', 'Brampton', '9341824159', 666.00),
(106, 'idNlx', 'idNlx@testing.com', '7142383297', '2025-06-05', 'Brampton', '7142383297', 1242.00),
(107, 'LcHPf', 'LcHPf@testing.com', '6207628897', '2025-03-30', 'Brampton', '6207628897', 0.00),
(108, 'ukmRn', 'ukmRn@testing.com', '4876513952', '2025-05-05', 'Brampton', '4876513952', 648.00),
(109, 'tIcib', 'tIcib@testing.com', '6815183762', '2025-06-05', 'Brampton', '6815183762', 1224.00),
(110, 'HICJg', 'HICJg@testing.com', '9073821922', '2025-03-30', 'Brampton', '9073821922', 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass`
--
ALTER TABLE `pass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pass`
--
ALTER TABLE `pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
