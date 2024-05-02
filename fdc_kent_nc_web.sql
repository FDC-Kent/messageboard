-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2024 at 03:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fdc_kent_nc_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL,
  `created_ip` varbinary(16) DEFAULT NULL,
  `modified_ip` varbinary(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `content`, `created`, `modified`, `created_ip`, `modified_ip`) VALUES
(1, 57, 58, 'send message asd ', '2024-05-01 03:29:40', '2024-05-01 03:29:40', NULL, NULL),
(2, 59, 58, 'hello godd morning', '2024-05-01 03:31:29', '2024-05-01 03:31:29', NULL, NULL),
(3, 59, 58, 'asdasd', '2024-05-01 03:45:08', '2024-05-01 03:45:08', NULL, NULL),
(4, 59, 58, 'asdasd', '2024-05-01 03:45:17', '2024-05-01 03:45:17', NULL, NULL),
(5, 59, 58, 'asdasd', '2024-05-01 03:45:17', '2024-05-01 03:45:17', NULL, NULL),
(6, 59, 57, 'heilo', '2024-05-01 03:46:13', '2024-05-01 03:46:13', NULL, NULL),
(7, 59, 58, 'heilo', '2024-05-01 03:46:13', '2024-05-01 03:46:13', NULL, NULL),
(8, 59, 57, 'heilo🔓 lord patawad', '2024-05-01 03:46:30', '2024-05-01 03:46:30', NULL, NULL),
(9, 59, 58, 'heilo🔓 lord patawad', '2024-05-01 03:46:30', '2024-05-01 03:46:30', NULL, NULL),
(10, 59, 59, 'heilo🔓 lord patawad', '2024-05-01 03:46:30', '2024-05-01 03:46:30', NULL, NULL),
(11, 59, 57, 'good day', '2024-05-01 03:52:32', '2024-05-01 03:52:32', NULL, NULL),
(12, 59, 58, 'good day', '2024-05-01 03:52:32', '2024-05-01 03:52:32', NULL, NULL),
(13, 59, 57, 'good day', '2024-05-01 04:03:33', '2024-05-01 04:03:33', NULL, NULL),
(14, 59, 58, 'good day', '2024-05-01 04:03:33', '2024-05-01 04:03:33', NULL, NULL),
(15, 59, 58, 'asdasd', '2024-05-01 04:03:37', '2024-05-01 04:03:37', NULL, NULL),
(16, 59, 58, 'asdasd', '2024-05-01 04:05:00', '2024-05-01 04:05:00', NULL, NULL),
(17, 59, 59, 'asdasd', '2024-05-01 04:05:00', '2024-05-01 04:05:00', NULL, NULL),
(18, 59, 58, 'asdasd', '2024-05-01 04:06:19', '2024-05-01 04:06:19', NULL, NULL),
(19, 59, 59, 'asdasd', '2024-05-01 04:06:19', '2024-05-01 04:06:19', NULL, NULL),
(20, 59, 58, 'asdasd', '2024-05-01 04:06:19', '2024-05-01 04:06:19', NULL, NULL),
(21, 59, 59, 'asdasd', '2024-05-01 04:06:19', '2024-05-01 04:06:19', NULL, NULL),
(22, 59, 57, 'asdsad', '2024-05-01 04:06:55', '2024-05-01 04:06:55', NULL, NULL),
(23, 59, 58, 'asdsad', '2024-05-01 04:06:55', '2024-05-01 04:06:55', NULL, NULL),
(24, 59, 58, 'asdasdasd', '2024-05-01 04:06:59', '2024-05-01 04:06:59', NULL, NULL),
(25, 59, 58, 'asdad', '2024-05-01 04:07:14', '2024-05-01 04:07:14', NULL, NULL),
(26, 59, 58, 'asdad', '2024-05-01 04:07:16', '2024-05-01 04:07:16', NULL, NULL),
(27, 59, 59, 'asdad', '2024-05-01 04:07:16', '2024-05-01 04:07:16', NULL, NULL),
(28, 59, 57, 'Good morning today is a good day', '2024-05-01 04:10:10', '2024-05-01 04:10:10', NULL, NULL),
(29, 59, 59, 'Good morning today is a good day', '2024-05-01 04:10:10', '2024-05-01 04:10:10', NULL, NULL),
(30, 59, 57, 'hello', '2024-05-01 04:11:46', '2024-05-01 04:11:46', NULL, NULL),
(31, 59, 58, 'hello', '2024-05-01 04:11:46', '2024-05-01 04:11:46', NULL, NULL),
(32, 59, 58, 'gegege', '2024-05-01 05:33:20', '2024-05-01 05:33:20', NULL, NULL),
(33, 57, 58, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae cupiditate nulla soluta accusamus dignissimos itaque fugiat voluptates. Aliquid cupiditate sequi reprehenderit consequatur eius sapiente, laborum veniam quisquam ea, error amet?\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae cupiditate nulla soluta accusamus dignissimos itaque fugiat voluptates. Aliquid cupiditate sequi reprehenderit consequatur eius sapiente, laborum veniam quisquam ea, error amet?\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae cupiditate nulla soluta accusamus dignissimos itaque fugiat voluptates. Aliquid cupiditate sequi reprehenderit consequatur eius sapiente, laborum veniam quisquam ea, error amet?', '2024-05-01 05:35:24', '2024-05-01 05:35:24', NULL, NULL),
(34, 60, 60, 'hi!', '2024-05-01 09:55:37', '2024-05-01 09:55:37', NULL, NULL),
(35, 57, 57, 'mga gwapo', '2024-05-01 10:32:10', '2024-05-01 10:32:10', NULL, NULL),
(36, 57, 59, 'mga gwapo', '2024-05-01 10:32:10', '2024-05-01 10:32:10', NULL, NULL),
(37, 57, 60, 'mga gwapo', '2024-05-01 10:32:10', '2024-05-01 10:32:10', NULL, NULL),
(38, 57, 58, 'gwapo gwapo', '2024-05-01 12:41:23', '2024-05-01 12:41:23', NULL, NULL),
(39, 57, 60, 'gwapo gwapo', '2024-05-01 12:41:23', '2024-05-01 12:41:23', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`) VALUES
(1, 'The title', 'This is the post body.', '2024-04-24 16:20:43', '2024-04-25 05:33:49'),
(2, 'A title once again', 'And the post body follows.', '2024-04-24 16:21:34', NULL),
(3, 'Title strikes back', 'This is really exciting! Not.', '2024-04-24 16:21:45', NULL),
(4, 'sample title', 'sample body', '2024-04-25 05:00:13', '2024-04-25 05:00:13'),
(5, 'sample title', 'sample body', '2024-04-25 05:01:11', '2024-04-25 05:01:11'),
(6, 'sample title', 'sample', '2024-04-25 05:02:15', '2024-04-25 05:02:15'),
(7, 'sample title', 'sample', '2024-04-25 05:03:45', '2024-04-25 05:03:45'),
(8, 'hehe', 'hehe', '2024-04-25 05:04:53', '2024-04-25 05:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL,
  `created_ip` varbinary(16) DEFAULT NULL,
  `modified_ip` varbinary(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `last_login`, `created`, `modified`, `created_ip`, `modified_ip`) VALUES
(57, 'kent allysspm', 'admin@gmail.com', 'a4db58d1814063fc35447a2f8b01e6353432aefe', '2024-05-01 12:28:51', '2024-04-30 10:33:02', '2024-05-01 12:40:45', NULL, NULL),
(58, 'robert magtangol', 'rob@gmail.com', 'a4db58d1814063fc35447a2f8b01e6353432aefe', NULL, '2024-04-30 10:33:34', '2024-04-30 10:38:29', NULL, NULL),
(59, 'robby', 'roby@gmail.com', 'a4db58d1814063fc35447a2f8b01e6353432aefe', NULL, '2024-05-01 03:31:12', '2024-05-01 03:31:12', NULL, NULL),
(60, 'CEBALLOS', 'kentallysson.fdc@gmail.com', 'a4db58d1814063fc35447a2f8b01e6353432aefe', NULL, '2024-05-01 09:52:36', '2024-05-01 09:52:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `hubby` text DEFAULT NULL,
  `img_url` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL,
  `created_ip` varbinary(16) DEFAULT NULL,
  `modified_ip` varbinary(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `birth_date`, `gender`, `hubby`, `img_url`, `created`, `modified`, `created_ip`, `modified_ip`) VALUES
(4, 57, '2024-04-01', 'Male', 'loremmer', '1714560045_admin.jpeg', '2024-04-30 10:33:02', '2024-05-01 12:40:45', NULL, NULL),
(5, 58, '2024-04-01', 'Male', 'test', '1714466309_rob.jpeg', '2024-04-30 10:33:34', '2024-04-30 10:38:29', NULL, NULL),
(6, 59, NULL, NULL, NULL, NULL, '2024-05-01 03:31:12', '2024-05-01 03:31:12', NULL, NULL),
(7, 60, NULL, NULL, NULL, NULL, '2024-05-01 09:52:36', '2024-05-01 09:52:36', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
