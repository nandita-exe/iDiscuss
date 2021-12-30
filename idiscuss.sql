-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 12:18 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'python', 'Type \"pic\" in the Table Name field. Press enter. Press enter again to create the first column named \"idpic\" (that will be your primary key). Press enter to accept INTEGER as datatype. Enter \"caption\" to store a name for you picture. Press enter. Type \"v\" (which will trigger VARCHAR(45)) and press enter. Type \"img\" and enter. Type \"longb\" (which will trigger LONGBLOB) and press enter. Click [Apply Changes]. This will show you the SQL statement that will be executed.\r\n', '2021-12-24 16:40:00'),
(2, 'javascript', 'ok', '2021-12-24 21:26:44'),
(3, 'react', 'po', '2021-12-24 21:41:11'),
(4, 'Java', 'sbjbdakj', '2021-12-29 11:47:38'),
(5, 'hii', '', '2021-12-29 11:58:07'),
(13, 'java2', 'nice', '2021-12-29 12:07:57'),
(14, 'ok', 'hi', '2021-12-29 12:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'sure', 1, 1, '2021-12-28 15:55:49'),
(2, 'wow', 1, 2, '2021-12-28 15:57:00'),
(3, 'Nandita1', 2, 4, '2021-12-28 19:00:15'),
(4, 'Nandita1', 4, 4, '2021-12-28 19:02:32'),
(5, 'Nandita1', 6, 4, '2021-12-28 19:03:39'),
(6, 'Nandita1', 6, 4, '2021-12-28 19:03:47'),
(7, 'hi\r\n', 3, 4, '2021-12-28 19:08:05'),
(8, 'hi', 1, 4, '2021-12-28 19:20:36'),
(10, 'hi', 1, 3, '2021-12-29 12:59:22'),
(11, 'how are you\r\n', 1, 3, '2021-12-29 12:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `no` int(8) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`no`, `name`, `email`, `feedback`) VALUES
(1, 'PATRA NANDITA ANANT', '1032200435@tcetmumbai.in', 'hi'),
(2, 'PATRA NANDITA ANANT', '1032200435@tcetmumbai.in', 'hii'),
(3, 'Nandita Anant Patra', 'np2481281@gmail.com', 'ji');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Educational Website', 'I am experiencing lots of bugs please help', 1, 1, '2021-12-28 15:55:40'),
(2, 'Nandita1', 'Nandita1', 1, 4, '2021-12-28 18:59:44'),
(3, 'Nandita1', 'Nandita1', 1, 4, '2021-12-28 19:00:05'),
(4, 'Nandita1', 'Nandita1', 2, 4, '2021-12-28 19:02:26'),
(5, 'Nandita1', 'Nandita1', 3, 4, '2021-12-28 19:02:44'),
(6, 'hello', 'Nandita1', 1, 4, '2021-12-28 19:03:32'),
(7, '', '', 1, 4, '2021-12-28 19:10:50'),
(8, '', '&gt', 1, 4, '2021-12-28 19:37:40'),
(9, '', '&lt;code&gt;\r\nHello\r\n&lt;/code&gt;\r\n', 1, 4, '2021-12-28 19:42:21'),
(10, '', '&lt;script&gt;\r\nhello\r\n&lt;/script&gt;\r\n', 1, 4, '2021-12-28 19:42:43'),
(11, '', '\r\n&lt;script&gt; alert(\"hello\") &lt;/script&gt;', 1, 4, '2021-12-28 19:43:07'),
(12, 'how to learn python pls helpppppp', '', 2, 3, '2021-12-29 13:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `profile` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `profile`, `email`, `username`, `password`, `timestamp`) VALUES
(1, 'user.png', 'deletedAccount1', '1deletedAccount', '$2y$10$mZ03z0KRV5vvfJFBdTN4b.JVQhpaDPEwTSzPEJP4qq8h9OSGV8DlW', '2021-12-28 15:54:58'),
(2, 'user.png', 'deletedAccount', 'deletedAccount', '$2y$10$3lw63mXe179mA4WXrSo0QeZ6QQvZRHHO1k/ZajdOmEOEOzTqrB2Xa', '2021-12-28 15:56:33'),
(3, 'Screenshot (66).png', 'Nandita@145', 'Nandita@145', '$2y$10$8lq4LlYWKIh6JXp4YgFu2uvXR8bWwjKDhg6ALO/41/JZs.1EgfMf.', '2021-12-28 17:08:41'),
(4, 'Screenshot (65).png', '1032200435@tcetmumbai.in', 'Nandita1', '$2y$10$..eAF0SidWBvkGxa/RR5quYx.Hg5azzabaF44yD3p0NtWkaE0Mabu', '2021-12-28 18:59:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);
ALTER TABLE `categories` ADD FULLTEXT KEY `category_name` (`category_name`,`category_description`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
