-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 02:50 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academicstracker2`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(10) NOT NULL,
  `admin_first_name` varchar(20) NOT NULL,
  `admin_middle_name` varchar(20) DEFAULT NULL,
  `admin_last_name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `ethnicity` varchar(8) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `user_type` varchar(14) NOT NULL,
  `school_code` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_first_name`, `admin_middle_name`, `admin_last_name`, `date_of_birth`, `ethnicity`, `gender`, `password`, `salt`, `hash`, `user_type`, `school_code`) VALUES
(50012351, 'Simbarashe', '', 'Sithole', '2018-10-08', 'coloured', 'female', '25f9e794323b453885f5181f1b624d0b', '', '', 'Administrator', '022'),
(50012352, 'Simbarashe', '', 'Sithole', '2018-10-08', 'coloured', 'female', '25f9e794323b453885f5181f1b624d0b', '', '', 'Administrator', '022');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `task_number` varchar(255) NOT NULL,
  `task_name` varchar(20) NOT NULL,
  `subject_code` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `record_number` int(11) NOT NULL,
  `subject_code` varchar(8) NOT NULL,
  `grade_number` varchar(3) NOT NULL,
  `date_today` varchar(10) NOT NULL,
  `comment` text NOT NULL,
  `status` text NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`record_number`, `subject_code`, `grade_number`, `date_today`, `comment`, `status`, `teacher_id`, `student_id`) VALUES
(1, '123', '5', '9-Oct', 'On time', 'Present', 987654, 200136),
(2, '123', '5', '9-Oct', 'Late', 'Present', 987654, 23456789),
(3, '123', '5', '9-Oct', 'N/A', 'Absent', 987654, 12435676),
(4, '123', '5', '9-Oct', 'Excused', 'Absent', 987654, 12334567),
(5, '123', '5', '9-Oct', 'On time', 'Presnent', 987654, 13456786),
(6, '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_subject` varchar(250) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_subject`, `comment_text`, `comment_status`) VALUES
(2, 'english ', 'ok', 1),
(3, 'jajjaja', 'jjjajajja', 1),
(4, 'english', 'hhv hvhvhvh', 1),
(5, 'mnnnn', 'kiuuuuiiii', 1),
(6, 'qwwwweee', 'njhhhvh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_number` varchar(3) NOT NULL,
  `teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `guardian_id` int(10) NOT NULL,
  `guardian_first_name` varchar(20) NOT NULL,
  `guardian_middle_name` varchar(20) NOT NULL,
  `guardian_last_name` varchar(20) NOT NULL,
  `date_of_birth` int(11) NOT NULL,
  `ethnicity` text NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `user_type` varchar(14) NOT NULL,
  `student_id` int(10) NOT NULL,
  `school_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`guardian_id`, `guardian_first_name`, `guardian_middle_name`, `guardian_last_name`, `date_of_birth`, `ethnicity`, `gender`, `password`, `salt`, `hash`, `user_type`, `student_id`, `school_code`) VALUES
(2, 'Simbarashe', '', 'Sithole', 2018, 'black', 'male', '25f9e794323b453885f5181f1b624d0b', '', '', 'Guardian', 200136, 22);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `subject_code` varchar(8) NOT NULL,
  `task_number` varchar(255) NOT NULL,
  `task_score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `student_id`, `subject_code`, `task_number`, `task_score`) VALUES
(6, 19000000, '123', '1', 59),
(7, 0, '', '', 0),
(8, 19000000, '123', '1', 59),
(9, 0, '', '', 0),
(10, 0, '', '', 0),
(11, 0, '', '', 0),
(12, 0, '', '', 0),
(13, 0, '', '', 0),
(14, 0, '', '', 0),
(15, 0, '', '', 0),
(16, 0, '', '', 0),
(17, 0, '', '', 0),
(18, 0, '', '', 0),
(19, 0, '', '', 0),
(20, 0, '', '', 0),
(21, 0, '', '', 0),
(22, 0, '', '', 0),
(23, 0, '', '', 0),
(24, 0, '', '', 0),
(25, 0, '', '', 0),
(26, 0, '', '', 0),
(27, 0, '', '', 0),
(28, 0, '', '', 0),
(29, 0, '', '', 0),
(30, 0, '', '', 0),
(31, 0, '', '', 0),
(32, 0, '', '', 0),
(33, 0, '', '', 0),
(34, 0, '', '', 0),
(35, 0, '', '', 0),
(36, 0, '', '', 0),
(37, 0, '', '', 0),
(38, 0, '', '', 0),
(39, 0, '', '', 0),
(40, 0, '', '', 0),
(41, 0, '', '', 0),
(42, 0, '', '', 0),
(43, 0, '', '', 0),
(44, 0, '', '', 0),
(45, 0, '', '', 0),
(46, 0, '', '', 0),
(47, 0, '', '', 0),
(48, 0, '', '', 0),
(49, 0, '', '', 0),
(50, 0, '', '', 0),
(51, 0, '', '', 0),
(52, 0, '', '', 0),
(53, 0, '', '', 0),
(54, 0, '', '', 0),
(55, 0, '', '', 0),
(56, 0, '', '', 0),
(57, 0, '', '', 0),
(58, 0, '', '', 0),
(59, 0, '', '', 0),
(60, 0, '', '', 0),
(61, 0, '', '', 0),
(62, 0, '', '', 0),
(63, 0, '', '', 0),
(64, 0, '', '', 0),
(65, 0, '', '', 0),
(66, 0, '', '', 0),
(67, 0, '', '', 0),
(68, 0, '', '', 0),
(69, 0, '', '', 0),
(70, 0, '', '', 0),
(71, 0, '', '', 0),
(72, 0, '', '', 0),
(73, 0, '', '', 0),
(74, 0, '', '', 0),
(75, 0, '', '', 0),
(76, 0, '', '', 0),
(77, 0, '', '', 0),
(78, 0, '', '', 0),
(79, 0, '', '', 0),
(80, 0, '', '', 0),
(81, 0, '', '', 0),
(82, 0, '', '', 0),
(83, 0, '', '', 0),
(84, 0, '', '', 0),
(85, 0, '', '', 0),
(86, 0, '', '', 0),
(87, 0, '', '', 0),
(88, 0, '', '', 0),
(89, 0, '', '', 0),
(90, 0, '', '', 0),
(91, 0, '', '', 0),
(92, 0, '', '', 0),
(93, 0, '', '', 0),
(94, 0, '', '', 0),
(95, 0, '', '', 0),
(96, 0, '', '', 0),
(97, 0, '', '', 0),
(98, 0, '', '', 0),
(99, 0, '', '', 0),
(100, 0, '', '', 0),
(101, 0, '', '', 0),
(102, 0, '', '', 0),
(103, 0, '', '', 0),
(104, 0, '', '', 0),
(105, 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_code` varchar(4) NOT NULL,
  `school_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_code`, `school_name`) VALUES
('022', 'Progressive school');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `student_first_name` varchar(20) NOT NULL,
  `student_middle_name` varchar(20) DEFAULT NULL,
  `student_last_name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `ethnicity` varchar(8) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `user_type` varchar(14) NOT NULL,
  `school_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_first_name`, `student_middle_name`, `student_last_name`, `date_of_birth`, `ethnicity`, `gender`, `password`, `salt`, `hash`, `user_type`, `school_code`) VALUES
(19000000, 'Joseph', NULL, 'Zukerberg', '1997-08-13', 'Black', 'Male', '12345678', '', '', 'Student', 0),
(19000001, 'jbjbjjbjj', 'gb', 'nnnnnnn', '2018-12-03', 'black', 'female', '48484848484848484848484884848484848848', '', '', 'Student', 0),
(19000002, 'Simbarashe', '', 'Sithole', '2018-10-10', 'white', 'male', '25f9e794323b453885f5181f1b624d0b', '', '', 'Student', 22),
(19000003, 'Simbarashe', '', 'Sithole', '2018-10-10', 'white', 'male', '25f9e794323b453885f5181f1b624d0b', '', '', 'Student', 22);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_code` varchar(8) NOT NULL,
  `subject_grade` int(2) NOT NULL,
  `subject_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_code`, `subject_grade`, `subject_name`) VALUES
('E203', 2, 'English'),
('M801', 12, 'Add Maths'),
('RS501', 5, 'ReligiousStudies'),
('I301', 5, 'computer'),
('D101', 2, 'Developnment studies'),
('E203', 2, 'English'),
('M801', 12, 'Add Maths'),
('RS501', 5, 'ReligiousStudies'),
('I301', 5, 'computer'),
('D101', 2, 'Developnment studies'),
('', 0, ''),
('E2017', 11, 'English'),
('3047', 10, 'i.e'),
('9090', 10, 'E105'),
(',,,,,,,,', 10, '444'),
('FM08', 8, 'Further Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(10) NOT NULL,
  `teacher_first_name` varchar(20) NOT NULL,
  `teacher_middle_name` varchar(20) DEFAULT NULL,
  `teacher_last_name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `ethnicity` varchar(8) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `user_type` varchar(14) NOT NULL,
  `school_code` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_first_name`, `teacher_middle_name`, `teacher_last_name`, `date_of_birth`, `ethnicity`, `gender`, `password`, `salt`, `hash`, `user_type`, `school_code`) VALUES
(200123, 'Simbarashe', NULL, 'Sithole', '2018-09-12', 'Black', 'Male', '12345678', '', '', 'teacher', '123'),
(200124, 'Tapiwa', '', 'Mavende', '1994-02-03', 'black', 'male', 'Monash2018', '', '', 'HOD', ''),
(200136, 'Simbarashe', '', 'Sithole', '2018-10-02', 'coloured', 'male', '25f9e794323b453885f5181f1b624d0b', '', '', 'HOD', '022'),
(200137, 'Test', 'rat', 'subject', '1980-11-09', 'coloured', 'male', '25f9e794323b453885f5181f1b624d0b', '', '', 'Teacher', '5001'),
(200138, 'Simbarashe', '', 'Sithole', '2012-01-31', 'coloured', 'male', '25f9e794323b453885f5181f1b624d0b', '', '', 'Teacher', '022'),
(200140, 'Simbarashe', '', 'Sithole', '2013-05-06', 'coloured', 'male', '25f9e794323b453885f5181f1b624d0b', '', '', 'HOD', '022'),
(200141, 'olapido', '', 'raymond', '1980-11-09', 'white', 'male', '25f9e794323b453885f5181f1b624d0b', '', '', '', '022'),
(200142, 'Tembi', 'Lisa', 'Ndlovu', '2006-02-07', 'coloured', 'female', '25f9e794323b453885f5181f1b624d0b', '', '', 'Teacher', '022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `school_code` (`school_code`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`task_number`),
  ADD KEY `subject_code` (`subject_code`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`record_number`),
  ADD UNIQUE KEY `student_id_2` (`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_number`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`guardian_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `FOREIGN` (`school_code`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50012353;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `record_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `guardian_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19000004;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200143;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`school_code`) REFERENCES `school` (`school_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
