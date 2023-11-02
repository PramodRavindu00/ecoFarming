-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2023 at 07:14 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecofarming.gov.lk`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productName` varchar(20) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `imageFilePath` varchar(255) NOT NULL,
  PRIMARY KEY (`productName`),
  KEY `connect_product_to_usercredentails` (`userName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productName`, `userName`, `imageFilePath`) VALUES
('baby red onion', 'farmer1', '65255457d5754.Baby-Red-Onion-1.jpg'),
('beans', 'farmer10', '65261713a745a.Beans-1.jpg'),
('beet root', 'farmer20', '653c8509c0718.beet.jpg'),
('green lettuce', 'farmer20', '652554a9c5d91.green-lettuce-white-surface-300x300.jpg'),
('coconut sugar', 'farmer9', '652554ce68b43.Coconut-Sugar-1.jpg'),
('butter beans', 'farmer9', '652554e867639.Butter-beans.jpg'),
('sweet potato', 'farmer9', '652554ff65de2.SweetPototo-Yellow-1.jpg'),
('carrot', 'farmer15', '65255574c35fb.carrot.jpg'),
('leaks', 'farmer15', '6525557d5857c.leaks.jpeg'),
('tomato', 'farmer15', '6525558a645fe.tomato.jpg'),
('onion', 'farmer5', '652555c37725c.onion.jpeg'),
('potato', 'farmer5', '652555ce9c177.potato.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

DROP TABLE IF EXISTS `queries`;
CREATE TABLE IF NOT EXISTS `queries` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `userType` varchar(20) NOT NULL,
  `contact` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `connect_queries_to_usercredentails` (`userName`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`ID`, `userName`, `Name`, `userType`, `contact`, `email`, `message`) VALUES
(4, 'farmer1', 'Pramod ravindu', 'farmer', '0767203699', 'farmer1@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '),
(5, 'farmer1', 'Pramod ravindu', 'farmer', '0767203699', 'farmer1@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '),
(6, 'guest', 'pawara', 'guest', '0776413942', 'pawara@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(7, 'guest', 'shan', 'guest', '0716160145', 'shan@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(8, 'guest', ' MAHINDA SARATH', 'guest', '0776413942', 'mahinda@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(9, 'guest', 'chamod', 'guest', '0775682451', 'chamod@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(10, 'farmer1', 'Pramod ravindu', 'farmer', '0767203699', 'pramod2000.ravindu@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(11, 'farmer1', 'Pramod ravindu', 'farmer', '0767203699', 'pramod2000.ravindu@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(12, 'farmer1', 'Pramod ravindu', 'farmer', '0776413942', 'pramod2000.ravindu@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(13, 'farmer1', 'Pramod ravindu', 'farmer', '0767203699', 'pramod2000.ravindu@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(14, 'farmer1', 'pawara', 'farmer', '0776413942', 'pawara@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(15, 'farmer1', 'shan', 'farmer', '0776413942', 'shan@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(18, 'guest', 'NAVINNA KOTTAGE MAHI', 'guest', '0776413942', 'mahinda@gmail.com', 'lorem ipsum salut hauanay');

-- --------------------------------------------------------

--
-- Table structure for table `usercredentials`
--

DROP TABLE IF EXISTS `usercredentials`;
CREATE TABLE IF NOT EXISTS `usercredentials` (
  `userName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userType` varchar(20) NOT NULL,
  PRIMARY KEY (`userName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usercredentials`
--

INSERT INTO `usercredentials` (`userName`, `password`, `userType`) VALUES
('farmer1', '123456', 'farmer'),
('farmer2', '123456', 'farmer'),
('farmer3', '123456', 'farmer'),
('farmer4', '123456', 'farmer'),
('farmer5', '123456', 'farmer'),
('farmer6', '123456', 'farmer'),
('farmer7', '123456', 'farmer'),
('farmer8', '123456', 'farmer'),
('farmer9', '123456', 'farmer'),
('farmer10', '123456', 'farmer'),
('famer11', '123456', 'farmer'),
('farmer12', '123456', 'farmer'),
('farmer13', '123456', 'farmer'),
('farmer14', '123456', 'farmer'),
('farmer15', '123456', 'farmer'),
('farmer16', '123456', 'farmer'),
('farmer17', '123456', 'farmer'),
('farmer18', '123456', 'farmer'),
('farmer19', '123456', 'farmer'),
('farmer20', '123456', 'farmer'),
('fo1', '123456', 'Field Officer'),
('fo2', '123456', 'Field Officer'),
('fo3', '123456', 'Field Officer'),
('fo4', '123456', 'Field Officer'),
('fo5', '123456', 'Field Officer'),
('fo6', '123456', 'Field Officer'),
('fo7', '123456', 'Field Officer'),
('fo8', '123456', 'Field Officer'),
('fo9', '123456', 'Field Officer'),
('fo10', '123456', 'Field Officer'),
('admin1', '123456', 'Admin'),
('admin2', '123456', 'Admin'),
('admin3', '123456', 'Admin'),
('admin4', '123456', 'Admin'),
('admin5', '123456', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
CREATE TABLE IF NOT EXISTS `userdetails` (
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userName` varchar(20) NOT NULL,
  PRIMARY KEY (`userName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`firstName`, `lastName`, `address`, `contact`, `email`, `userName`) VALUES
('pramod', 'ravindu', 'colombo', '0767203699', 'farmer1@gmail.com', 'farmer1'),
('shanika ', 'imalka', 'matale', '0771586320', 'farmer2@gmail.com', 'farmer2'),
('pawara', 'unawatuna', 'jaffna', '0754871000', 'farmer3@gmail.com', 'farmer3'),
('ravindu', 'akalanka', 'matara', '0721111536', 'farmer4@gmail.com', 'farmer4'),
('buddika', 'ruwan', 'panadura', '0769874521', 'famer5@gmail.com', 'farmer5'),
('kusal', 'perera', 'colombo', '0765547301', 'farmer6@gmail.com', 'farmer6'),
('sohani', 'lakshani', 'dehiwala', '0765541300', 'farmer7@gmail.com', 'farmer7'),
('isuru', 'udana', 'colombo', '0759686321', 'farmer8@gmail.com', 'farmer8'),
('kavinga', 'perera', 'kandy', '0769985320', 'farmer9@gmail.com', 'farmer9'),
('kavindu', 'induwara', 'colombo', '0765210983', 'farmer10@gmail.com', 'farmer10'),
('shan', 'unawatuna', 'bibile', '0768521110', 'fo1@gmail.com', 'fo1'),
('shehan', 'kavinda', 'matara', '0774395102', 'f02@gmail.com', 'fo2'),
('shan', 'unawatuna', 'bibile', '0765542301', 'farmer11@gmail.com', 'farmer11'),
('roshan', 'fernando', 'katuneriya', '0785540001', 'farmer12@gmail.com', 'farmer12'),
('dasun', 'shanaka', 'negombo', '0784413098', 'farmer13@gmail.com', 'farmer13'),
('lasith', 'malinga', 'rathgama', '0741186599', 'farmer14@gmail.com', 'farmer14'),
('shihan', 'mihiranga', 'weliweriya', '0742257301', 'farmer15@gmail.com', 'farmer15'),
('pawara', 'senarathna', 'dehiwala', '0768553021', 'farmer16@gmail.com', 'farmer16'),
('rahal', 'alwis', 'negombo', '0726935210', 'farmer17@gmail.com', 'farmer17'),
('kusal', 'mendis', 'moratuwa', '0741103958', 'farmer18@gmail.com', 'farmer18'),
('shehan', 'dilshan', 'colombo', '0764532109', 'farmer19@gmail.com', 'farmer19'),
('thisara', 'perera', 'maradana', '0764485213', 'farmer20@gmail.com', 'farmer20'),
('naveen', 'dilshan', 'wadduwa', '0762547333', 'fo3@gmail.com', 'fo3'),
('devinda', 'dilshan', 'panadura', '0714201321', 'fo4@gmail.com', 'fo4'),
('nipuni', 'bagya', 'kalutara', '0769987000', 'fo5@gmail.com', 'fo5'),
('nethmi', 'hirunika', 'matugama', '0701122336', 'fo6@gmail.com', 'fo6'),
('suranga', 'lakma', 'debarawewa', '0752216983', 'fo7@gmail.com', 'fo7'),
('navindu', 'perera', 'galle', '0745963205', 'fo8@gmail.com', 'fo8'),
('kanchana', 'silva', 'colombo', '0725584630', 'fo9@gmail.com', 'fo9'),
('shan', 'gimhana', 'matara', '0743021012', 'fo10@gmail.com', 'fo10'),
('pawara', 'gimhana', 'bibile', '0745523014', 'admin1@gmail.com', 'admin1'),
('nipun', 'chamika', 'galle', '0745123098', 'admin2@gmail.com', 'admin2'),
('ashan', 'chamika', 'kandy', '0728430221', 'admin3@gmail.com', 'admin3'),
('yadeesha', 'lakshan', 'panadura', '0784420039', 'admin4@gmail.com', 'admin4'),
('shehan ', 'dananjaya', 'galle', '0751896400', 'admin5@gmail.com', 'admin5');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
