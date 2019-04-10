-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Jan 20, 2019 at 10:32 AM
=======
-- Generation Time: Mar 18, 2019 at 07:38 PM
>>>>>>> 4bd975bc61cff46f87be723ca4062d4ab15f9791
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionpaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(11) NOT NULL,
  `chapter_subject_id` int(11) NOT NULL,
  `chapter_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `chapter_subject_id`, `chapter_name`) VALUES
(1, 1, 'Stacks'),
(2, 3, 'Learning Web Development'),
(3, 3, 'Learning HTML Tags'),
(4, 1, 'Queues'),
(5, 1, 'Linked List'),
(7, 1, 'Graphs'),
(8, 3, 'PHP'),
(10, 1, 'Hashing'),
(11, 1, 'Programs'),
(12, 2, 'Collection Framework'),
(13, 2, 'Window Events'),
(15, 2, 'Event Handling');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `question_chapter_id` int(11) NOT NULL,
  `question_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `question_chapter_id`, `question_marks`) VALUES
(1, 'What is condition for stack overflow and underflow', 1, 2),
(10, 'What is Ajax Call', 2, 2),
(11, 'Checking SQL Power 1', 1, 2),
(12, 'Checking SQL Power 2', 1, 1),
(13, 'What is Graph', 7, 2),
(14, 'What is Framework', 12, 2),
(15, 'Quesiton 1 Of Testing query', 5, 2),
(16, 'Quesiton 2 Of Testing query', 4, 5),
(17, 'Quesiton 3 Of Testing query', 10, 5),
(18, 'Quesiton 4 Of Testing query', 11, 10),
(19, 'Second Program', 11, 10),
(20, 'Stack is which type of data Structure? Linear Or Non-Linear.', 1, 1),
(21, 'Check Select', 1, 2),
(22, 'Hello', 12, 2),
(24, 'Slow Speed', 8, 1),
(25, 'What is Classes', 13, 10);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`) VALUES
(1, 'Data Structures'),
(2, 'Advance Java'),
(3, 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`) VALUES
(1, 'nikhil', '$2y$10$CAXhnR08FFY6Ofry4j1O1OgiNz5BvabPRksl.rtueno7l4fTeSf82', 'Nikhil', 'Shadija', 'nikhilshadija2@gmail.com', '1bb35cc9abef1b02c2d5bf97a0ac8764f4619ab5d04e83826f8aae32a1aae32b.jpg', 'superadmin'),
(2, 'dhano', '$2y$10$s70IEHimXttikcDmQislsuOMQpd5YSdTjqQU2p.S2l7/Ljw7h3466', 'Dhananjay', 'Ghumare', 'dhano@gmail.com', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
