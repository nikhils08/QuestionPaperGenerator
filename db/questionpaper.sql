-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2019 at 02:44 PM
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
(15, 2, 'Event Handling'),
(16, 4, 'Introduction to Java'),
(17, 4, 'Objects and Classes'),
(18, 4, 'Java Concepts'),
(19, 5, 'Introduction to ML');

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
(1, 'HTML stands for', 2, 1),
(2, 'hr stands for..', 3, 1),
(3, 'br stands for..', 3, 1),
(4, 'What is JVM?', 16, 5),
(5, 'List any 5 Features of Java', 16, 10),
(6, 'Why is Java Architectural neutral?', 16, 5),
(7, 'How Java enabled High Performance?', 16, 5),
(8, 'h1 to h6 tags are used for what purpose?', 3, 1),
(9, 'Why java is considered Dynamic?', 16, 5),
(10, 'Which tag is used for defining bold text?', 3, 1),
(11, 'List 10 java keywords', 17, 10),
(12, 'What do you mean by Object?', 17, 5),
(13, 'What do you mean by class?', 17, 5),
(14, 'What does <small> tag does?', 3, 2),
(15, 'What is Local and Instance variable?', 17, 10),
(16, 'Which tag defines important text?', 3, 2),
(17, 'Which tag defines subscripted text?', 3, 2),
(18, 'Which tag is used to define html form?', 3, 1),
(19, 'What is Function Overloading?', 18, 5),
(20, 'What is Polymorphism?', 18, 5),
(21, 'Which tag is used to define caption for fieldset element?', 3, 2),
(22, 'What is Inheritance?', 18, 5),
(23, 'Difference between Throw and Throws', 18, 5),
(24, 'What does fieldset tag does?', 3, 2),
(25, 'Which tag is used to define image?', 3, 1),
(26, 'Which tag defines sound content?', 3, 2),
(27, 'What does ul tag defines?', 3, 1),
(28, 'What is Machine Learning?', 19, 5),
(29, 'What are the different Algorithm techniques in ML?', 19, 5),
(30, 'List and Exlplain five popular Algorithms of Machine Learning', 19, 10),
(31, 'What is Overfitting in ML?', 19, 5),
(32, 'List down various approaches for machine learning', 19, 5),
(33, 'What is Algorithm independent Machine Learning?', 19, 5),
(34, 'List Applications of machine learning', 19, 10),
(35, 'What is Supervised and Unsupervised machine learning?', 19, 10),
(36, 'Differnce between Supervised and Unsupervised machine learning', 19, 5);

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
(3, 'Web Development'),
(4, 'Java'),
(5, 'Machine Learning');

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
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
