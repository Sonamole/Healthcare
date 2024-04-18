-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 11:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `caretaker`
--

CREATE TABLE `caretaker` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caretaker`
--

INSERT INTO `caretaker` (`id`, `name`, `email`, `address`, `qualification`, `type`, `zip`) VALUES
(2, 'Anakha', 'anakha@gmail.com', 'Kothamangalam', 'PG', 'Homenurse', '683544'),
(4, 'Shinoj', 'shinoj@gmail.com', 'Muttathupara', 'PG-MCA', 'Babysitter', '678754'),
(6, 'Arun', 'arun@gmail.com', 'Muttan para', 'PLus two', 'Homenurse', '683581');

-- --------------------------------------------------------

--
-- Table structure for table `diet`
--

CREATE TABLE `diet` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `dietician_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diet`
--

INSERT INTO `diet` (`id`, `user_id`, `message`, `dietician_id`, `type`) VALUES
(26, '31', 'Suggest me diet and foods', 33, 'user_to_dietician'),
(27, '31', 'Have vegetables and do crunches', 33, 'dietician_to_user'),
(28, '31', 'Do exercise everyday', 33, 'dietician_to_user'),
(29, '31', 'Anything more?', 33, 'user_to_dietician');

-- --------------------------------------------------------

--
-- Table structure for table `dietician`
--

CREATE TABLE `dietician` (
  `id` int(50) NOT NULL,
  `login_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dietician`
--

INSERT INTO `dietician` (`id`, `login_id`, `name`, `email`, `password`, `address`, `qualification`, `zip`) VALUES
(2, 33, 'Unni', 'unni@gmail.com', '123456', 'Thoongal', 'Thoongal', '683545'),
(7, 67, 'Alan Binto', 'alanbinto@gmail.com', '512', 'dfdasf', 'dsfasf ', '678754');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `place`, `Location`) VALUES
(3, 'Al shifasss', 'kuruppampady', 'Alappuzha'),
(4, 'Little flower hospital', 'Angamali', 'Aluva'),
(5, 'Baselious hospital', 'Kothamangalam', 'Ernākulam');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `caretaker_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `category`, `password`, `caretaker_id`) VALUES
(29, 'admin', 'admin@gmail.com', 'admin', 'admin123', NULL),
(31, 'Sonamole Eldho', 'sonamoleeldho@gmail.com', 'user', '123', 6),
(33, 'Unni', 'unni@gmail.com', 'Dietician', '123456', NULL),
(35, 'Johin', 'johinkgigi@gmail.com', 'user', '456', 2),
(67, 'Alan Binto', 'alanbinto@gmail.com', 'Dietician', '512', NULL),
(70, 'Preeth', 'preeth@gmail.com', 'user', '741', NULL),
(73, 'Reshma', 'reshmass@gmail.com', 'staff', '12345', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medical_report`
--

CREATE TABLE `medical_report` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `report` varchar(50) NOT NULL,
  `dietician_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_report`
--

INSERT INTO `medical_report` (`id`, `user_id`, `report`, `dietician_id`) VALUES
(8, 31, 'Sonamole.pdf.pdf', 33),
(9, 35, 'Johin K Gigi RESUME .pdf', 67);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `stock` int(50) NOT NULL,
  `staff_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `rate`, `file`, `brand`, `stock`, `staff_id`) VALUES
(7, 'Paracetamol', '340', '../../User/image/223105.jpg', 'Para', 3, 73),
(9, 'Cough syrups', '100', '../image/223105.jpg', 'DRcough', 1, 73);

-- --------------------------------------------------------

--
-- Table structure for table `medpurchase_child`
--

CREATE TABLE `medpurchase_child` (
  `id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medpurchase_head`
--

CREATE TABLE `medpurchase_head` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(50) NOT NULL,
  `login_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `login_id`, `name`, `email`, `password`, `address`, `qualification`, `zip`) VALUES
(26, 73, 'Reshma', 'reshmass@gmail.com', '12345', 'Thuruthi House', 'MCA', '683545');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caretaker`
--
ALTER TABLE `caretaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dietician`
--
ALTER TABLE `dietician`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `password_2` (`password`),
  ADD UNIQUE KEY `caretaker_id` (`caretaker_id`);

--
-- Indexes for table `medical_report`
--
ALTER TABLE `medical_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medpurchase_child`
--
ALTER TABLE `medpurchase_child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medpurchase_head`
--
ALTER TABLE `medpurchase_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caretaker`
--
ALTER TABLE `caretaker`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `diet`
--
ALTER TABLE `diet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `dietician`
--
ALTER TABLE `dietician`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `medical_report`
--
ALTER TABLE `medical_report`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medpurchase_child`
--
ALTER TABLE `medpurchase_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medpurchase_head`
--
ALTER TABLE `medpurchase_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
