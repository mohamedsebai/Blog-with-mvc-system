-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2023 at 02:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(25, 'mol', 'asdfasdf', '2023-04-29 08:45:14', '2023-04-29 06:45:42'),
(26, 'mohamed sebai', 'sadfasdf', '2023-05-02 03:15:24', '2023-05-02 01:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `parent` int(11) NOT NULL,
  `added_date` varchar(255) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `subject` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `username`, `phone`, `subject`, `created_at`, `updated_at`) VALUES
(28, 'asdfasdf', 'sdfsdf', 35345, 'sdfsdf', '2023-05-03 00:00:00', '2023-04-30 23:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `title`, `img`, `created_at`, `updated_at`) VALUES
(9, 'main logo', 'IMG-1657649765.png', '2023-05-10 00:00:00', '2023-05-04 02:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `our_media`
--

CREATE TABLE `our_media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `our_media`
--

INSERT INTO `our_media` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(8, 'facebook', 'https://www.facebook.com', 'October 8, 2021, 10:12 pm', '0000-00-00 00:00:00'),
(10, 'instagram', 'https://www.instagram.com/mohamedseabeai/', 'October 8, 2021, 10:13 pm', '0000-00-00 00:00:00'),
(13, 'twitter', 'twitter', '2023:05:01 06:02:30', '0000-00-00 00:00:00'),
(15, 'youtube', 'youtube', 'asdf', '2023-05-01 04:14:49'),
(16, 'github', 'github', 'sdfsadf', '2023-05-01 04:14:59'),
(17, 'linkedin', 'sadfasdf', '2023:05:02 15:11:38', '2023-05-02 13:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `img`, `tags`, `category_id`, `author_id`, `created_at`, `updated_at`) VALUES
(179, 'asfdasdf', 'sadfasdf', 'IMG-151350478.jpg', 'asdfasdf', 25, 115, '2023-05-04 12:26:00', '2023-05-04 10:26:00'),
(180, 'asdfsdfsdf', 'sdfsdf', 'IMG-860804220.png', 'sdfsdf', 26, 119, '2023-05-08 04:40:43', '2023-05-08 02:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `content`, `img`, `created_at`, `updated_at`) VALUES
(17, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has', 'IMG-1878162249.jpg', 'October 8, 2021, 2:40 pm', 'October 8, 2021, 2:52 pm'),
(18, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking\r\nslider 2 slider 2 slider 2', 'IMG-811138299.jpg', 'October 8, 2021, 2:41 pm', 'October 8, 2021, 2:52 pm'),
(19, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,', '', 'October 8, 2021, 2:42 pm', 'October 8, 2021, 2:53 pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `group_id` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 for normal users,\r\n1 for admins',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `profile_img`, `gender`, `country`, `status`, `group_id`, `created_at`, `updated_at`) VALUES
(115, 'mohamed sebai mohamed', 'aa@gmail.com', '$2y$10$GB8qP.a7AVKXm/6T/xcoLeYXlurbiPTPDjHcpek4dChomWNahwggu', 'IMG-1356775345.jpg', 0, 'egypt', 1, 1, '2023-05-02 15:03:55', '2023-05-04 03:38:31'),
(119, 'mohamed sebai mohamed', 'aaaa@gmail.com', '$2y$10$XS5o0egoSJqIpYv4iJPsYOF/rGXR.hxtc815VgyN32QP4D/ikYIYa', 'IMG-1356775345.jpg', 0, 'egypt', 1, 0, '2023-05-04 03:34:28', '0000-00-00 00:00:00'),
(124, 'sadfasd', 'fsadfasdf', 'sadfsdf', 'sadfasdf', 0, 'sadfasdfsdf', 0, 0, '2023-05-04 05:32:20', '2023-05-04 05:32:20'),
(125, 'asdfas', 'dfasdfasd', 'fsdfasdf', 'asdf', 0, 'asdfasdfsdfsdf', 0, 0, '2023-05-04 05:32:28', '2023-05-04 05:32:28'),
(126, 'sadfs', 'adfasdf', 'sdfasdf', 'asdfasd', 0, 'sadfdfasdf', 0, 0, '2023-05-04 05:32:36', '2023-05-04 05:32:36'),
(127, 'mohamed sebai mohamed', 'ss@gmail.com', '$2y$10$.qU8JAev4NyzFQPZPIPDb.yftJjjOWQyOocx7tesKKYp2ICcqyC/u', 'IMG-560372369.jpg', 0, 'egypt', 0, 1, '2023-05-04 11:13:39', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_media`
--
ALTER TABLE `our_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `our_media`
--
ALTER TABLE `our_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
