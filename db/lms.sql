-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2016 at 08:01 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_log`
--

CREATE TABLE `answer_log` (
  `a_id` int(11) NOT NULL,
  `a_by` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `ans` varchar(255) DEFAULT NULL,
  `given` varchar(255) DEFAULT NULL,
  `marks` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer_log`
--

INSERT INTO `answer_log` (`a_id`, `a_by`, `exam_id`, `q_id`, `ans`, `given`, `marks`) VALUES
(25, 1555331, 9, 18, 'enter right answer here', 'enter right answer here', 1),
(26, 1555331, 9, 22, 'ans3', 'ans3', 1),
(27, 1555331, 9, 18, 'enter right answer here', 'option', 0),
(28, 1555331, 9, 22, 'ans3', 'ans3', 1),
(29, 1555331, 9, 18, 'enter right answer here', 'enter right answer here', 1),
(30, 1555331, 9, 22, 'ans1', 'ans3', 0),
(31, 1555331, 9, 18, 'enter right answer here', 'enter right answer here', 1),
(32, 1555331, 9, 22, 'ans1', 'ans3', 0),
(33, 234, 12, 23, 'enter right answer here', 'option', 0),
(34, 234, 12, 24, 'enter right answer here', 'option', 0),
(35, 234, 12, 25, 'enter right answer here', 'enter right answer here', 1),
(36, 234, 12, 26, 'enter right answer here', 'enter right answer here', 1),
(37, 234, 12, 27, 'enter right answer here', 'enter right answer here', 1),
(38, 234, 12, 28, 'enter right answer here', 'enter right answer here', 1),
(39, 234, 12, 29, 'enter right answer here', 'enter right answer here', 1),
(40, 234, 12, 30, 'enter right answer here', 'enter right answer here', 1),
(41, 1555331, 10, 19, 'right answer', 'option answer 1', 0),
(42, 1555331, 10, 20, 'enter right answer here', 'enter right answer here', 1),
(43, 15553312, 10, 19, 'right answer', 'right answer', 1),
(44, 15553312, 10, 20, 'enter right answer here', 'option', 0),
(45, 15553, 10, 19, 'right answer', 'option answer 1', 0),
(46, 15553, 10, 20, 'enter right answer here', 'option', 0),
(47, 1234, 10, 19, 'right answer', 'right answer', 1),
(48, 1234, 10, 20, 'enter right answer here', 'option', 0),
(49, 1515, 9, 18, 'enter right answer here', 'option', 0),
(50, 1515, 9, 22, 'ans1', 'ans1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_master`
--

CREATE TABLE `exam_master` (
  `e_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `e_start_time` varchar(20) DEFAULT NULL,
  `e_end_time` varchar(20) DEFAULT NULL,
  `e_duration` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`e_id`, `teacher_id`, `subject`, `e_start_time`, `e_end_time`, `e_duration`) VALUES
(9, 5, 'test 123', NULL, NULL, '20'),
(10, 5, 'lorem ipsom', NULL, NULL, '15'),
(11, 5, 'lorem', NULL, NULL, '5'),
(12, 7, 'calculas', NULL, NULL, '10');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `q_qestion` text NOT NULL,
  `q_answers` text NOT NULL,
  `q_right_answer` text NOT NULL,
  `exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `q_qestion`, `q_answers`, `q_right_answer`, `exam_id`) VALUES
(18, 'Enter first question', 'enter right answer here||option|option', 'enter right answer here', 9),
(19, 'QUESTION', 'right answer|option answer 1|option answer 2|option answer 3', 'right answer', 10),
(20, 'Enter first question', 'enter right answer here||option|option', 'enter right answer here', 10),
(21, 'Enter first question', 'enter right answer here||option|option', 'enter right answer here', 11),
(22, 'Enter Second question', 'ans1|ans2|ans3|ans4', 'ans1', 9),
(23, 'Enter first question', 'enter right answer here||option|option', 'enter right answer here', 12),
(24, 'Enter first question', 'enter right answer here||option|option', 'enter right answer here', 12),
(25, 'Enter first question', 'enter right answer here||option|option', 'enter right answer here', 12),
(26, 'Enter first question', 'enter right answer here||option|option', 'enter right answer here', 12),
(27, 'Enter first question', 'enter right answer here||option|option', 'enter right answer here', 12),
(28, 'Enter first question', 'enter right answer here||option|option', 'enter right answer here', 12),
(29, 'Enter first question', 'enter right answer here||option|option', 'enter right answer here', 12),
(30, 'Enter first question', 'enter right answer here||option|option', 'enter right answer here', 12);

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(30) DEFAULT NULL,
  `s_email_id` varchar(20) DEFAULT NULL,
  `s_institute` varchar(30) DEFAULT NULL,
  `s_contact_no` varchar(11) DEFAULT NULL,
  `s_password` varchar(255) DEFAULT NULL,
  `s_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

CREATE TABLE `subject_master` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`sub_id`, `sub_name`) VALUES
(1, 'computer programming with C'),
(2, 'Digital Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(30) DEFAULT NULL,
  `t_email` varchar(20) DEFAULT NULL,
  `t_contact_no` varchar(11) DEFAULT NULL,
  `t_institute` varchar(255) DEFAULT NULL,
  `t_password` varchar(255) DEFAULT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`t_id`, `t_name`, `t_email`, `t_contact_no`, `t_institute`, `t_password`, `is_admin`) VALUES
(5, 'Kalpit', 'admin@lms.com', '123456789', 'LDCE', '$2y$10$.98AkHBywgevsp/ZrEdnguHwLrkokQqH8Sp7AFN7boUztT35g1aKC', 0),
(6, 'rutuja kjhsjkfh', '', '', '', '$2y$10$n2zn83OuhHocxMtzPpmB6eZYrTsMu757j.SgLRam2/sqVobgROhtC', 0),
(7, 'fhfh', 'a@gmail.com', '54423445627', 'silver oakcoege of eg & tech', '$2y$10$R9ucKqP1mcmNWA.NYo.8pufuihZL1szZMoaGR1Il1b3e4uHpKG.gW', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_log`
--
ALTER TABLE `answer_log`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `exam_master`
--
ALTER TABLE `exam_master`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `student_master`
--
ALTER TABLE `student_master`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `subject_master`
--
ALTER TABLE `subject_master`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_log`
--
ALTER TABLE `answer_log`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `exam_master`
--
ALTER TABLE `exam_master`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `student_master`
--
ALTER TABLE `student_master`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject_master`
--
ALTER TABLE `subject_master`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
