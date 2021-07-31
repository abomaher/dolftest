-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2021 at 05:43 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `isActive` tinyint(4) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `email`, `password`, `mobile`, `roleid`, `isActive`, `created_at`, `updated_at`) VALUES
(7, 'Admin', 'admin', 'admin@dolftech.com', '188000e1f0fb4075ae1c659697b96296f982cdc4', '0540001122', 1, 0, '2020-03-12 16:23:01', '2020-03-12 16:23:01'),
(22, 'dolftest', 'dolftest', 'dolftest@dolftech.com', '876ed520933b287a1136dc56e308588f38072eb3', '0541232233', 2, 0, '2021-07-28 11:38:32', '2021-07-28 11:38:32'),
(30, 'Abood', 'abood', 'a@eit.sa', '36c4734d49d516dccd3ed374ff4a65bb96686edd', '966444444', 3, 0, '2021-07-31 05:11:41', '2021-07-31 05:11:41'),
(31, 'Maher', 'maher', 'a@eit2.sa', '36c4734d49d516dccd3ed374ff4a65bb96686edd', '966444444', 2, 0, '2021-07-31 05:11:41', '2021-07-31 05:11:41'),
(32, 'sfsdf', 'asdfdasf', 'a@eit3.sa', '36c4734d49d516dccd3ed374ff4a65bb96686edd', '966444444', 2, 0, '2021-07-31 05:12:34', '2021-07-31 05:12:34'),
(33, 'Abdulhakim Zuqut', 'Abdulhakim', 'ahmz.1988@gmail.com', NULL, NULL, 3, 0, '2021-07-31 05:13:55', '2021-07-31 05:13:55'),
(34, 'svsdf', 'asdfsf', 'a@eit4.sa', '36c4734d49d516dccd3ed374ff4a65bb96686edd', '966444444', 1, 0, '2021-07-31 05:17:07', '2021-07-31 05:17:07'),
(35, 'Abdulhakim Zuqut', 'Abdulhakim', 'www.eit.sa@gmail.com', NULL, NULL, 3, 0, '2021-07-31 05:17:42', '2021-07-31 05:17:42');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
