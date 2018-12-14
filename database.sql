-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2018 at 02:53 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `millhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_by` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `post_id`, `created_by`) VALUES
(1, 'xv', 23, '1'),
(2, 'mumumu', 24, '0'),
(3, 'momo', 25, '0'),
(4, '346346', 25, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`) VALUES
(1, 'images/uploads/fullstack2.jpg'),
(2, 'images/uploads/full stack developer.jpg'),
(3, 'images/uploads/hmpf.png'),
(4, 'images/uploads/logo.png'),
(5, 'images/uploads/millhouse-logo.png'),
(7, 'images/uploads/paula.png'),
(8, 'images/uploads/grove.png'),
(9, 'images/uploads/logo_green.png');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `created_by`, `image`, `published`, `created_at`) VALUES
(1, 'hej', '', 'svej', 1, '2', 1, '2018-12-03 08:56:08'),
(2, 'eee', '', '<p>eeee</p>', 1, '1', 1, '2018-12-03 14:26:35'),
(3, 'HEj', '', 'hejhejehjehjj', 1, '3', 1, '2018-12-03 19:54:31'),
(4, 'teststs', '', '<p><strong>eheheehej</strong></p>', 1, '3', 1, '2018-12-03 19:55:09'),
(5, 'teststs', '', '<p><strong>eheheehej</strong></p>', 1, '3', 1, '2018-12-03 20:13:23'),
(6, 'teststs', '', '<p><strong>eheheehej</strong></p>', 1, '3', 1, '2018-12-03 20:15:33'),
(7, 'teststs', '', '<p><strong>eheheehej</strong></p>', 1, '3', 1, '2018-12-03 20:15:42'),
(8, 'rrr', '', '<p><strong>memlekrj</strong></p>', 1, '3', 1, '2018-12-03 20:21:54'),
(9, 'tttt', '', '', 1, '3', 1, '2018-12-03 20:26:35'),
(10, 'hejehej', '', '<p><strong>ejkejeke</strong></p>', 1, '3', 0, '2018-12-03 20:27:05'),
(11, 'ejehe', '', '', 1, '3', 1, '2018-12-03 20:27:28'),
(12, '', '', '<p>ffjff</p>', 1, '3', 0, '2018-12-03 20:27:40'),
(13, '', '', '', 1, '3', 1, '2018-12-03 20:27:48'),
(14, '', '', '', 1, '3', 1, '2018-12-03 20:28:36'),
(15, '', '', '<p>vvvvvv</p>', 1, '3', 1, '2018-12-03 20:29:04'),
(16, '', '', '<p>vvvvvv</p>', 1, '3', 1, '2018-12-03 20:35:52'),
(17, '', '', '<p>vvvvvv</p>', 1, '3', 1, '2018-12-03 20:36:05'),
(18, '', '', '<p>vvvvvv</p>', 1, '3', 1, '2018-12-03 20:36:30'),
(19, '', '', '<p>vvvvvv</p>', 1, '3', 1, '2018-12-03 20:38:07'),
(20, 'hej', '', '<p><strong>svej</strong></p>', 1, '3', 1, '2018-12-03 20:38:54'),
(21, 'hej', '', '<p><strong>svej</strong></p>', 1, '3', 1, '2018-12-03 20:39:21'),
(22, 'hejsan svejsan', '', '<p><strong>svej</strong></p>', 1, '3', 1, '2018-12-09 16:55:11'),
(23, 'testa byta titel', 'testa_byta_titel', '<p><strong>descriptiononon</strong> <em>hejsvej</em> lalala test update</p>', 1, '5', 1, '2018-12-09 18:48:21'),
(24, 'wetwet', 'wetwet', '<p>wetwet</p>', 1, '4', 1, '2018-12-14 14:12:40'),
(25, 'Morgan', 'morgan', '<p>test</p>', 1, '5', 1, '2018-12-14 14:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `prod_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `post_id`, `prod_category_id`) VALUES
(1, 22, 1),
(2, 23, 1),
(3, 24, 1),
(4, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category`) VALUES
(1, 'watches'),
(2, 'sunglasses');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `admin`, `username`, `password`, `email`) VALUES
(1, 1, 'admin', '$2y$10$uya6j9wJzrpC1fdBsvByFOf0SO0FFx3y4qbNmgcWsSESMy6RYdPw.', 'admin@admin.admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
