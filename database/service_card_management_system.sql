-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 10:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service_card_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL COMMENT 'admin_id',
  `admin_name` varchar(64) NOT NULL,
  `admin_email` varchar(64) NOT NULL,
  `admin_password` varchar(64) NOT NULL,
  `admin_status` enum('Active','Inactive') NOT NULL,
  `admin_image` text CHARACTER SET utf8mb4 NOT NULL,
  `admin_type` enum('Root Admin','Content Manager','Sales Manager','Technical Operator') NOT NULL DEFAULT 'Root Admin',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `admin_email`, `admin_password`, `admin_status`, `admin_image`, `admin_type`, `created_at`, `updated_at`) VALUES
(15, 'Md.Shabuddin Nayan', 'shabuddinnayan273@gmail.com', '21333757af63390bd9f298521ab48c10433ef1b5', 'Active', 'ADMINIMAGE_20220912130309_245046699_2808807166045728_2541604503040659641_n.jpg', 'Root Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `card_activation`
--

CREATE TABLE `card_activation` (
  `id` int(64) NOT NULL,
  `card_no` varchar(64) NOT NULL,
  `customer_name` varchar(64) NOT NULL,
  `mobile_no` int(64) NOT NULL,
  `activation_date` datetime DEFAULT NULL,
  `activated_by` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_activation`
--

INSERT INTO `card_activation` (`id`, `card_no`, `customer_name`, `mobile_no`, `activation_date`, `activated_by`) VALUES
(1, 'abc123', 'Md.Shabuddin', 1952343273, '2022-09-12 13:18:11', 'Md.Shabuddin Nayan'),
(2, 'HM1234', 'Md.Shabuddin Nayan', 1952343273, '2022-09-12 15:04:58', 'Md.Shabuddin Nayan'),
(3, 'HM1235', 'nayan shabuddin', 10000, '2022-09-17 15:35:50', 'Md.Shabuddin Nayan'),
(4, 'HM1236', 'Shabuddin ', 10000, '2022-09-17 16:23:46', 'Md.Shabuddin Nayan');

-- --------------------------------------------------------

--
-- Table structure for table `use_a_card`
--

CREATE TABLE `use_a_card` (
  `id` int(64) NOT NULL,
  `use_card_no` varchar(64) NOT NULL,
  `card_user_name` varchar(64) NOT NULL,
  `card_user_mobile_no` int(64) NOT NULL,
  `order_no` varchar(64) NOT NULL,
  `service_title` enum('Cleaning','Home Appliances','Pack & Shift','Plumbing','Electrical','Carpentry','Property Management','Painting','Interior Solution','Computer Servicing','Pest-Control') NOT NULL,
  `amount` int(64) NOT NULL,
  `service_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `use_a_card`
--

INSERT INTO `use_a_card` (`id`, `use_card_no`, `card_user_name`, `card_user_mobile_no`, `order_no`, `service_title`, `amount`, `service_date`) VALUES
(1, 'HM1234', 'nayan Shabuddin', 1952343273, 'abc-123-none', 'Home Appliances', 1200, '2022-09-17 15:45:50'),
(2, 'HM1234', ' Shabuddin', 1234656, 'abc-125-none', 'Cleaning', 49998, '2022-09-17 15:51:59'),
(3, 'HM1235', ' Shabuddin', 1952343273, 'abc-130-none', 'Pest-Control', 5000, '2022-09-18 11:21:15'),
(4, 'HM1236', 'abc', 123456789, 'abc-150-none', 'Pack & Shift', 12000, '2022-09-18 16:53:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_activation`
--
ALTER TABLE `card_activation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `use_a_card`
--
ALTER TABLE `use_a_card`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'admin_id', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `card_activation`
--
ALTER TABLE `card_activation`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `use_a_card`
--
ALTER TABLE `use_a_card`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
