-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 09:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin_ganesh', '12345_nishitha');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `video_id` int(11) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `video_id`, `reading_time`) VALUES
(5, 'i love your videos keep it up', 4, '2023-04-27 04:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(120) NOT NULL,
  `myimage` varchar(30) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `myimage`, `reading_time`) VALUES
(10, 'php', 'PHP is a general-purpose scripting language geared toward web development', 'course/php tutorials.png', '2023-03-26 16:53:51'),
(11, 'python', 'Python is a high-level, general-purpose programming language', 'course/python tutorials.png', '2023-03-26 16:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `quiz_title` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `option1` varchar(60) NOT NULL,
  `option2` varchar(60) NOT NULL,
  `option3` varchar(60) NOT NULL,
  `option4` varchar(60) NOT NULL,
  `answer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `quiz_title`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(2, 1, 'What is the extension is used for PHP scripting files?', '.php', '.p', '.phtml', '.ph', '1'),
(3, 1, 'What is M stands for in LAMP?', 'Microsoft', 'MySQL', 'Most', 'Markup', '2');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_title`
--

CREATE TABLE `quiz_title` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_title`
--

INSERT INTO `quiz_title` (`id`, `title`) VALUES
(1, 'php'),
(2, 'python');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `courses_id` int(11) NOT NULL,
  `topic_name` varchar(50) NOT NULL,
  `topic_description` text NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `courses_id`, `topic_name`, `topic_description`, `reading_time`) VALUES
(16, 11, 'python introduction', '<div style=\"text-align: center;\"><b style=\"font-size: 1rem;\"><font color=\"#cc3300\">PYTHON INTRODUCTION</font></b></div><div style=\"text-align: left;\"><font color=\"#000000\"><span style=\"font-weight: bolder; font-size: 1rem;\">python is a best programming language</span><br></font></div><div style=\"text-align: left;\"><font color=\"#000000\"><b>it is a good programmin language</b></font></div><div style=\"text-align: left;\"><b style=\"font-size: 1rem;\"><font color=\"#cc3300\"><br></font></b></div>', '2023-04-06 07:02:49'),
(20, 10, 'PHP Introduction', '<b><font color=\"#000099\" size=\"5\">PHP Introduction:</font></b><div><img src=\"http://localhost/e-learning/admin/images/1intro.png\" alt=\"logo\" align=\"none\"><font color=\"#000099\"><b><br></b></font><div><div><ul class=\"points\" style=\"list-style: circle; color: rgb(0, 0, 0); font-family: verdana, helvetica, arial, sans-serif; font-size: 13px; text-align: justify;\"><li style=\"padding: 0.2em; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; line-height: 1.5; font-family: Verdana; margin-top: 3px;\">PHP stands for Hyper Text Preprocessor.</li><li style=\"padding: 0.2em; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; line-height: 1.5; font-family: Verdana; margin-top: 3px;\">Rasmus Lerdorf create PHP.</li></ul></div></div></div>', '2023-04-08 21:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `regtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `regtime`) VALUES
(1, 'ganesh', 'ganeshkumar@gmail.com', '12345', '2023-04-30 06:19:25'),
(2, 'nishitha', 'nishitha@gmail.com', '12345', '2023-03-26 16:03:55'),
(3, 'swetha', 'swetha@gmail.com', '123', '2023-03-26 16:09:00'),
(6, 'ramyakutty', 'ramya@gmail.com', 'ramyakutty@123', '2023-03-26 16:18:16'),
(7, 'keerthana devi', 'keerthi@gmail.com', '12345', '2023-03-26 16:19:53'),
(8, 'meera', 'meera@gmail.com', 'meerapriaya', '2023-03-26 16:23:37'),
(9, 'aishwarya', 'aishu@gmail.com', 'aishu', '2023-04-07 19:13:35'),
(10, 'deepika', 'deepika@gmail.com', '123', '2023-04-24 04:49:53'),
(11, 'keerthi', 'keerthana@gmail.com', '123', '2023-04-27 04:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `topic_title` varchar(50) NOT NULL,
  `video_path` varchar(100) NOT NULL,
  `myimage` varchar(30) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `topic_title`, `video_path`, `myimage`, `reading_time`) VALUES
(1, 'python', 'python complete tutorial', '    https://www.youtube.com/embed/_uQrJ0TkZlc    ', 'video/python tuo.jpg', '2023-04-18 19:29:41'),
(4, 'English', 'Learn english with aleena rais', 'https://www.youtube.com/embed/xRSmuvJZf_Y', 'video/aleena rais.jfif', '2023-04-27 04:21:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_title`
--
ALTER TABLE `quiz_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz_title`
--
ALTER TABLE `quiz_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
