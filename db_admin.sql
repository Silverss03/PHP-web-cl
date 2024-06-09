-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 09, 2024 at 06:25 PM
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
-- Database: `db_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL COMMENT 'role_id',
  `role` varchar(255) DEFAULT NULL COMMENT 'role_text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `roleid` tinyint(4) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `email`, `password`, `mobile`, `roleid`, `isActive`, `created_at`, `updated_at`) VALUES
(16, 'Jonhny Joestar', 'Jojo', 'jojo@gmail.com', '188000e1f0fb4075ae1c659697b96296f982cdc4', '01717090233', 3, 0, '2020-03-13 05:08:26', '2020-03-13 05:08:26'),
(17, 'Lee Sang Hyeok', 'Faker', 'faker@gmail.com', '188000e1f0fb4075ae1c659697b96296f982cdc4', '01717090233', 2, 0, '2020-03-13 05:08:53', '2020-03-13 05:08:53'),
(18, 'Chu Anh Quân', 'Rem_sama', 'Remsama@gmail.com', '188000e1f0fb4075ae1c659697b96296f982cdc4', '01717090233', 2, 0, '2020-03-13 05:09:18', '2020-03-13 05:09:18'),
(19, 'Nguyễn Minh Quân', 'alivewifi', 'alivewifi@gmail.com', '66c3241204bea40578eb993f41f7c4b1ab982dab', '01717090233', 3, 0, '2020-03-13 05:09:49', '2020-03-13 05:09:49'),
(20, 'Nguyễn Nhật Minh', 'VeraBl', 'VeraBL@gmail.com', '188000e1f0fb4075ae1c659697b96296f982cdc4', '01717090233', 2, 0, '2020-03-13 05:10:24', '2020-03-13 05:10:24'),
(21, 'Nguyễn Hữu Mạnh', 'Silverss03', 'nguyenhuumanhhp2003@gmail.com', '05c19fb114728eabf85f47c858914ca42ddd2dae', '0528538143', 1, 0, '2020-03-13 05:11:02', '2020-03-13 05:11:02'),
(22, 'Nguyễn Hữu Mạnh', 'newuser', 'elfshumanresource@gmail.com', '14459f84a76df0cc57ffd1bf6a17149bfd09f82b', '0915166497', 1, 0, '2024-05-18 06:13:05', '2024-05-18 06:13:05'),
(28, 'Admin', 'administrator', 'newadmin@gmail.com', '14459f84a76df0cc57ffd1bf6a17149bfd09f82b', '0528538143', 1, 0, '2024-05-18 07:41:28', '2024-05-18 07:41:28'),
(29, 'User1', 'User2', 'newuser@gmail.com', '14459f84a76df0cc57ffd1bf6a17149bfd09f82b', '1111111111111', 3, 0, '2024-05-24 14:05:10', '2024-05-24 14:05:10'),
(30, 'Phạm Tuấn Minh', 'ptm20066666', 'doctorwho@gmail.com', '14459f84a76df0cc57ffd1bf6a17149bfd09f82b', '0528538143', 3, 0, '2024-05-25 06:38:55', '2024-05-25 06:38:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'role_id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
