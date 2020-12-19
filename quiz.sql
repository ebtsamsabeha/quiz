-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2020 at 01:10 AM
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
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `ans_1` varchar(255) NOT NULL,
  `ans_2` varchar(255) NOT NULL,
  `ans_3` varchar(255) NOT NULL,
  `ans_4` varchar(255) NOT NULL,
  `correct_ans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `ans_1`, `ans_2`, `ans_3`, `ans_4`, `correct_ans`) VALUES
(1, 'Who is making the Web standards?', ' The World Wide Web Consortium', ' Mozilla', 'Google', 'Microsoft', 2),
(3, 'Choose the correct HTML element for the largest heading:', '<heading>  ', '<h1>  ', '<head>', '<h6>', 2),
(5, 'dkdkd', 'kkdkk', 'kdkkdkd', 'kkdkdkd', 'kdkkdkdkdk', 3),
(6, 'dkdkd', 'kkdkk', 'kdkkdkd', 'kkdkdkd', 'kdkkdkdkdk', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `title`, `status`, `duration`) VALUES
(1, 'HTML', 1, '00:00:00'),
(2, 'Css', 1, '00:00:00'),
(4, 'Php', 1, '00:00:00'),
(7, 'SQL', 1, '00:00:00'),
(8, 'dddkdkkdkd', 0, '00:00:00'),
(9, 'Css4', 1, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tests_questions`
--

CREATE TABLE `tests_questions` (
  `test_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tests_questions`
--

INSERT INTO `tests_questions` (`test_id`, `quest_id`) VALUES
(1, 3),
(2, 3),
(4, 3),
(2, 5),
(1, 1),
(2, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_answers`
--

CREATE TABLE `test_answers` (
  `test_result_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `ans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE `test_result` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `created_at`) VALUES
(1, 'ebtsamsabeha', 'ebtsamsabeha@gmail.com', '$2y$10$t6G0ix5nWbkdqQA4u5qlL.M4Tki41k0WenxppHt793FbmUDzwYeVy', 1, '2020-12-18 22:01:37'),
(2, 'ebtsamsabeham', 'ebtsamsabehak@gmail.com', '$2y$10$iH4PXqdhHudxzYNAURjJ9u0EvaBjOwunctB/kygI4kArdbnzHS5/q', 2, '2020-12-15 20:09:40'),
(4, 'ebtsamsabehakdkdkdk', 'ebtsamsabeha@gmadil.com', '$2y$10$czMb.l5BsHpuXveaF/t8ueBqFU3KV4xcAT6/8btejl4Uzy1GP1xYK', 2, '2020-12-15 20:48:08'),
(5, 'norasa', 'norasa@yahoo.com', '$2y$10$7e2QViS97d0DPitwPHca1u/6af6jn/myFlFu0L4hEW5XHasVQttLW', 0, '2020-12-17 20:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_tests`
--

CREATE TABLE `user_tests` (
  `user_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tests`
--

INSERT INTO `user_tests` (`user_id`, `test_id`) VALUES
(4, 7),
(5, 2),
(1, 1),
(1, 2),
(1, 4),
(1, 7),
(1, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests_questions`
--
ALTER TABLE `tests_questions`
  ADD KEY `test_id` (`test_id`),
  ADD KEY `quest_id` (`quest_id`);

--
-- Indexes for table `test_answers`
--
ALTER TABLE `test_answers`
  ADD KEY `quest_id` (`quest_id`),
  ADD KEY `test_result_id` (`test_result_id`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tests`
--
ALTER TABLE `user_tests`
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `test_id_fk` (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `test_result`
--
ALTER TABLE `test_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tests_questions`
--
ALTER TABLE `tests_questions`
  ADD CONSTRAINT `question_fk` FOREIGN KEY (`quest_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_fk` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_answers`
--
ALTER TABLE `test_answers`
  ADD CONSTRAINT `question_fk_2` FOREIGN KEY (`quest_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_result_fk` FOREIGN KEY (`test_result_id`) REFERENCES `test_result` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_result`
--
ALTER TABLE `test_result`
  ADD CONSTRAINT `result_test_fk` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_tests`
--
ALTER TABLE `user_tests`
  ADD CONSTRAINT `test_id_fk` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
