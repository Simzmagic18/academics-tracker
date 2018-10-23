-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2018 at 01:02 PM
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
  `contact_number` int(255) NOT NULL,
  `house_number` int(255) NOT NULL,
  `post_code` int(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(14) NOT NULL,
  `school_code` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_first_name`, `admin_middle_name`, `admin_last_name`, `date_of_birth`, `ethnicity`, `gender`, `contact_number`, `house_number`, `post_code`, `street_name`, `suburb`, `password`, `user_type`, `school_code`) VALUES
(50012351, 'Simbarashe', '', 'Sithole', '2018-10-08', 'coloured', 'female', 0, 0, 0, '', '', '25f9e794323b453885f5181f1b624d0b', 'Administrator', '022');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `task_number` varchar(255) NOT NULL,
  `task_name` varchar(20) NOT NULL,
  `subject_code` varchar(8) NOT NULL,
  `comments` varchar(255) NOT NULL
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
(13, 'New marks uploaded', '', 1),
(14, 'english', '', 1);

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
  `house_number` int(255) NOT NULL,
  `contact_number` int(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `post_code` int(255) NOT NULL,
  `school_code` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(14) NOT NULL,
  `student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`guardian_id`, `guardian_first_name`, `guardian_middle_name`, `guardian_last_name`, `date_of_birth`, `ethnicity`, `gender`, `house_number`, `contact_number`, `street_name`, `suburb`, `post_code`, `school_code`, `password`, `user_type`, `student_id`) VALUES
(6, 'Simbarashe', '', 'Sithole', 2018, 'white', 'male', 211, 2147483647, 'Ruimsig', 'Johannesburg', 1724, 5001, '25f9e794323b453885f5181f1b624d0b', 'Guardian', 200136);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `subject_code` varchar(8) NOT NULL,
  `task_number` varchar(255) NOT NULL,
  `task_score` int(3) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `student_id`, `subject_code`, `task_number`, `task_score`, `comments`) VALUES
(610, 19000005, '123', '1', 35, 'Could be better look out for the spelling'),
(611, 19000007, '123', '1', 45, 'Well done!'),
(612, 19000010, '123', '1', 50, 'Perfect you aced the test'),
(613, 19000011, '123', '1', 20, 'Much to worry about must not fall behind');

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
  `house_number` int(255) NOT NULL,
  `contact_number` int(255) NOT NULL,
  `post_code` int(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(14) NOT NULL,
  `school_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_first_name`, `student_middle_name`, `student_last_name`, `date_of_birth`, `ethnicity`, `gender`, `house_number`, `contact_number`, `post_code`, `street_name`, `suburb`, `password`, `user_type`, `school_code`) VALUES
(19000005, 'Simbarashe', '', 'Sithole', '2018-10-09', 'coloured', 'male', 211, 2147483647, 1724, 'Ruimsig', 'Johannesburg', '25f9e794323b453885f5181f1b624d0b', 'Student', 5001),
(19000007, 'Napitapi', 'Chiilee', 'Mukala', '2005-02-08', 'white', 'female', 32, 508270563, 1700, 'Willowbrooke', 'Rooderport', '25f9e794323b453885f5181f1b624d0b', 'Student', 22),
(19000010, 'Bradely', 'Fasko', 'Smith', '2005-11-24', 'asian', 'male', 87, 712345563, 1563, 'Brown', 'Sandton', '25f9e794323b453885f5181f1b624d0b', 'Student', 22),
(19000011, 'Xathi', 'Godfey', 'Quela', '2005-04-09', 'black', 'male', 78, 708270563, 1298, 'Cleveland', 'Fourways', '25f9e794323b453885f5181f1b624d0b', 'Student', 22);

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
('FM08', 8, 'Further Mathematics'),
('1223', 9, 'English'),
('1223', 9, 'English'),
('2234', 10, 'ChiVet'),
('2234', 10, 'ChiVet'),
('', 0, ''),
('', 0, ''),
('2235', 11, 'ma2'),
('3343', 9, 'Waaa gwan');

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
  `house_number` int(255) NOT NULL,
  `contact_number` int(255) NOT NULL,
  `post_code` int(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(14) NOT NULL,
  `school_code` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_first_name`, `teacher_middle_name`, `teacher_last_name`, `date_of_birth`, `ethnicity`, `gender`, `house_number`, `contact_number`, `post_code`, `street_name`, `suburb`, `password`, `user_type`, `school_code`) VALUES
(200123, 'Simbarashe', NULL, 'Sithole', '2018-09-12', 'Black', 'Male', 0, 0, 0, '', '', '12345678', 'teacher', '123'),
(200124, 'Tapiwa', '', 'Mavende', '1994-02-03', 'black', 'male', 0, 0, 0, '', '', 'Monash2018', 'HOD', ''),
(200136, 'Simbarashe', '', 'Sithole', '2018-10-02', 'coloured', 'male', 0, 0, 0, '', '', '25f9e794323b453885f5181f1b624d0b', 'HOD', '022'),
(200137, 'Test', 'rat', 'subject', '1980-11-09', 'coloured', 'male', 0, 0, 0, '', '', '25f9e794323b453885f5181f1b624d0b', 'Teacher', '5001'),
(200138, 'Simbarashe', '', 'Sithole', '2012-01-31', 'coloured', 'male', 0, 0, 0, '', '', '25f9e794323b453885f5181f1b624d0b', 'Teacher', '022'),
(200142, 'Tembi', 'Lisa', 'Ndlovu', '2006-02-07', 'coloured', 'female', 0, 0, 0, '', '', '25f9e794323b453885f5181f1b624d0b', 'Teacher', '022');

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
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50012355;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `record_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `guardian_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=614;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19000013;

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
