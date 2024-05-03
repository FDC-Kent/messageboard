-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2024 at 02:48 AM
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
(117, 59, 57, 'hi kent', '2024-05-03 02:44:41', '2024-05-03 02:44:41', NULL, NULL),
(118, 57, 59, 'Hello rob, how are you? ', '2024-05-03 02:45:17', '2024-05-03 02:45:17', NULL, NULL),
(119, 59, 57, 'im fine thank you', '2024-05-03 02:45:58', '2024-05-03 02:45:58', NULL, NULL),
(120, 59, 57, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-05-03 02:46:30', '2024-05-03 02:46:30', NULL, NULL);

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
(57, 'kent allysspm', 'admin@gmail.com', 'a4db58d1814063fc35447a2f8b01e6353432aefe', '2024-05-03 02:44:54', '2024-04-30 10:33:02', '2024-05-03 02:44:54', NULL, NULL),
(58, 'robert magtangol', 'rob@gmail.com', 'a4db58d1814063fc35447a2f8b01e6353432aefe', '2024-05-02 09:24:03', '2024-04-30 10:33:34', '2024-05-02 09:24:03', NULL, NULL),
(59, 'robby', 'roby@gmail.com', 'a4db58d1814063fc35447a2f8b01e6353432aefe', '2024-05-03 02:45:46', '2024-05-01 03:31:12', '2024-05-03 02:45:46', NULL, NULL),
(60, 'CEBALLOS', 'kentallysson.fdc@gmail.com', 'a4db58d1814063fc35447a2f8b01e6353432aefe', '2024-05-02 09:50:53', '2024-05-01 09:52:36', '2024-05-02 09:50:53', NULL, NULL),
(61, 'Austin', 'aust@gmail.com', 'a4db58d1814063fc35447a2f8b01e6353432aefe', NULL, '2024-05-02 11:03:42', '2024-05-02 11:03:42', NULL, NULL),
(62, 'donald', 'don@gmail.com', 'a4db58d1814063fc35447a2f8b01e6353432aefe', NULL, '2024-05-02 11:10:28', '2024-05-02 11:10:28', NULL, NULL);

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
(6, 59, '2024-05-20', 'Male', 'asdasd', '1714696886_roby.jpeg', '2024-05-01 03:31:12', '2024-05-03 02:41:26', NULL, NULL),
(7, 60, NULL, NULL, NULL, NULL, '2024-05-01 09:52:36', '2024-05-01 09:52:36', NULL, NULL),
(8, 61, NULL, NULL, NULL, NULL, '2024-05-02 11:03:42', '2024-05-02 11:03:42', NULL, NULL),
(9, 62, NULL, NULL, NULL, NULL, '2024-05-02 11:10:28', '2024-05-02 11:10:28', NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
