-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2018 at 05:21 PM
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
  `adminstrator_ID` int(10) NOT NULL,
  `profile_ID` int(10) NOT NULL,
  `admin_first_name` varchar(255) NOT NULL,
  `admin_last_name` varchar(255) NOT NULL,
  `admin_middle_name` varchar(255) NOT NULL,
  `school_code` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `subject_ID` int(10) NOT NULL,
  `student_ID` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `attendance_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_ID` int(10) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_ID`, `name`) VALUES
(1, 'Grade 1'),
(2, 'Grade 2'),
(3, 'Grade 3'),
(4, 'Grade 4'),
(5, 'Grade 5'),
(6, 'Grade 6'),
(7, 'Grade 7'),
(8, 'Grade 8'),
(9, 'Grade 9'),
(10, 'Grade 10'),
(11, 'Grade 11'),
(12, 'Grade 12');

-- --------------------------------------------------------

--
-- Table structure for table `Deprtment`
--

CREATE TABLE `Deprtment` (
  `department_ID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `school_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Deprtment`
--

INSERT INTO `Deprtment` (`department_ID`, `name`, `school_code`) VALUES
(1, 'Language', 22),
(2, 'Science', 22),
(3, 'Arts', 22),
(4, 'Mathematics', 22),
(5, 'Social Sciences ', 22);

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `guardian_id` int(10) NOT NULL,
  `guardian_first_name` varchar(255) NOT NULL,
  `guardian_middle_name` varchar(255) NOT NULL,
  `guardian_last_name` varchar(255) NOT NULL,
  `Occupation` varchar(255) NOT NULL,
  `profile_ID` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `HOD`
--

CREATE TABLE `HOD` (
  `HOD_id` int(10) NOT NULL,
  `HOD_first_name` varchar(255) NOT NULL,
  `HOD_last_name` varchar(255) NOT NULL,
  `HOD_middle_name` varchar(255) NOT NULL,
  `department_ID` int(10) NOT NULL,
  `profile_ID` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_ID` int(10) NOT NULL,
  `geneder` varchar(10) NOT NULL,
  `ethnicity` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `contact_number` int(255) NOT NULL,
  `house_number` int(255) NOT NULL,
  `postcode` int(255) NOT NULL,
  `suburb` varchar(2555) NOT NULL,
  `street_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_code` int(10) NOT NULL,
  `school_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_code`, `school_name`) VALUES
(22, 'Progressive school');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_ID` int(10) NOT NULL,
  `student_first_name` varchar(255) NOT NULL,
  `student_middle_name` varchar(255) NOT NULL,
  `student_last_name` varchar(255) NOT NULL,
  `guardian_ID` int(10) NOT NULL,
  `class_ID` int(10) NOT NULL,
  `profile_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_ID` int(10) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `class_ID` int(10) DEFAULT NULL,
  `department_ID` int(10) DEFAULT NULL,
  `term` int(10) DEFAULT NULL,
  `subject_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_ID`, `subject_name`, `class_ID`, `department_ID`, `term`, `subject_code`) VALUES
(2, 'Drawing', 2, 3, 1, 'D232'),
(3, 'Pure Mathematics', 11, 4, 1, 'PM1143'),
(4, 'History', 5, 5, 1, 'H554'),
(5, 'English Grammar', 7, 1, 1, 'EG735');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_ID` int(10) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `subject_ID` int(10) NOT NULL,
  `weight` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Task_Results`
--

CREATE TABLE `Task_Results` (
  `task_ID` int(10) NOT NULL,
  `student_ID` int(10) NOT NULL,
  `taskscore` int(255) NOT NULL,
  `percentage` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(10) NOT NULL,
  `teacher_first_name` varchar(255) NOT NULL,
  `teacher_last_name` varchar(255) NOT NULL,
  `teacher_middle_name` varchar(255) NOT NULL,
  `department_ID` int(10) NOT NULL,
  `profile_ID` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`adminstrator_ID`),
  ADD KEY `school_code` (`school_code`),
  ADD KEY `profile_ID` (`profile_ID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_ID`),
  ADD KEY `student_ID` (`student_ID`) USING BTREE,
  ADD KEY `subject_ID` (`subject_ID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_ID`);

--
-- Indexes for table `Deprtment`
--
ALTER TABLE `Deprtment`
  ADD PRIMARY KEY (`department_ID`),
  ADD KEY `school_code` (`school_code`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`guardian_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `guardian_ibfk_1` (`profile_ID`);

--
-- Indexes for table `HOD`
--
ALTER TABLE `HOD`
  ADD PRIMARY KEY (`HOD_id`),
  ADD KEY `department_ID` (`department_ID`),
  ADD KEY `profile_ID` (`profile_ID`),
  ADD KEY `subject_Id` (`subject_Id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_ID`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_ID`),
  ADD KEY `guardian_ID` (`guardian_ID`) USING BTREE,
  ADD KEY `student_ibfk_1` (`profile_ID`),
  ADD KEY `student_ibfk_2` (`class_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_ID`),
  ADD KEY `subject_ibfk_1` (`class_ID`),
  ADD KEY `subject_ibfk_2` (`department_ID`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_ID`),
  ADD KEY `subject_ID` (`subject_ID`);

--
-- Indexes for table `Task_Results`
--
ALTER TABLE `Task_Results`
  ADD PRIMARY KEY (`task_ID`),
  ADD KEY `Task_Results_ibfk_2` (`student_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `department_ID` (`department_ID`),
  ADD KEY `profile_ID` (`profile_ID`),
  ADD KEY `subject_ID` (`subject_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `guardian_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `HOD`
--
ALTER TABLE `HOD`
  MODIFY `HOD_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `student` (`student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`subject_ID`) REFERENCES `subject` (`subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Deprtment`
--
ALTER TABLE `Deprtment`
  ADD CONSTRAINT `Deprtment_ibfk_1` FOREIGN KEY (`school_code`) REFERENCES `school` (`school_code`) ON DELETE CASCADE;

--
-- Constraints for table `guardian`
--
ALTER TABLE `guardian`
  ADD CONSTRAINT `guardian_ibfk_1` FOREIGN KEY (`profile_ID`) REFERENCES `profile` (`profile_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `HOD`
--
ALTER TABLE `HOD`
  ADD CONSTRAINT `HOD_ibfk_1` FOREIGN KEY (`department_ID`) REFERENCES `Deprtment` (`department_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `HOD_ibfk_2` FOREIGN KEY (`profile_ID`) REFERENCES `profile` (`profile_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `HOD_ibfk_3` FOREIGN KEY (`subject_Id`) REFERENCES `subject` (`subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`profile_ID`) REFERENCES `profile` (`profile_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`class_ID`) REFERENCES `class` (`class_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`guardian_ID`) REFERENCES `guardian` (`guardian_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`class_ID`) REFERENCES `class` (`class_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`department_ID`) REFERENCES `Deprtment` (`department_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`subject_ID`) REFERENCES `subject` (`subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Task_Results`
--
ALTER TABLE `Task_Results`
  ADD CONSTRAINT `Task_Results_ibfk_1` FOREIGN KEY (`task_ID`) REFERENCES `task` (`task_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Task_Results_ibfk_2` FOREIGN KEY (`student_ID`) REFERENCES `student` (`student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`department_ID`) REFERENCES `Deprtment` (`department_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`profile_ID`) REFERENCES `profile` (`profile_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_ibfk_3` FOREIGN KEY (`subject_ID`) REFERENCES `subject` (`subject_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
