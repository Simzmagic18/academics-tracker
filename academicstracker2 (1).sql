-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2018 at 02:16 PM
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
(500100, 'Johann', 'Smith', 'Vorster', '1975-09-04', 'white', 'Male', '25d55ad283aa400af464c76d713c07ad', '', '', 'Admini', '022'),
(500101, 'Mhatambudziko', NULL, 'Ese', '2018-10-05', 'Black', 'Male', '12345678', '', '', 'Administrator', '022');

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
(23, 'japaneese', 'New maeks up', 1),
(24, 'Freanch', 'Tgestttt', 1),
(25, 'New town', 'This should graft', 1),
(26, 'New irem', 'Pakaipa mdara\r\n', 1),
(27, 'HAmeno', 'mhaaaa', 1),
(28, 'HAmeno', 'kiik', 0);

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
  `ethnicity` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `user_type` varchar(14) NOT NULL,
  `student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`guardian_id`, `guardian_first_name`, `guardian_middle_name`, `guardian_last_name`, `date_of_birth`, `ethnicity`, `gender`, `password`, `salt`, `hash`, `user_type`, `student_id`) VALUES
(1, 'ssss', '', 'aaa', 0, 0, 'Male', '12345678', '', '', 'Guardian', 19000000);

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
(11, 19000000, '123', '1', 59),
(12, 19000001, '123', '1', 89),
(13, 19000002, '133', '1', 78),
(14, 19000003, '133', '2', 89),
(15, 19000004, '133', '2', 23),
(16, 23456789, '123', '1', 59),
(17, 12345678, '123', '1', 89),
(18, 12345679, '133', '1', 78),
(19, 21345678, '133', '2', 89),
(20, 12345432, '133', '2', 23),
(21, 23456789, '123', '1', 59),
(22, 12345678, '123', '1', 89),
(23, 12345679, '133', '1', 78),
(24, 21345678, '133', '2', 89),
(25, 12345432, '133', '2', 23),
(26, 23456789, '123', '1', 59),
(27, 12345678, '123', '1', 89),
(28, 12345679, '133', '1', 78),
(29, 21345678, '133', '2', 89),
(30, 12345432, '133', '2', 23),
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
(53, 23456789, '123', '1', 59),
(54, 12345678, '123', '1', 89),
(55, 12345679, '133', '1', 78),
(56, 21345678, '133', '2', 89),
(57, 12345432, '133', '2', 23),
(58, 0, '', '', 0),
(59, 0, '', '', 0),
(60, 0, '', '', 0),
(61, 0, '', '', 0),
(62, 0, '', '', 0),
(63, 0, '}{ûCƒ³/', '', 0),
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
(77, 0, '<;xìï', '', 0),
(78, 0, '', '', 0),
(79, 0, '', '', 0),
(80, 0, '', '', 0),
(81, 0, '', '', 0),
(82, 0, '', '', 0),
(83, 0, '¹Ò§\rÜð‚', 'ÿ{û•©Í€ÿÆÞ~ej3à—öVjéäg—µØâßúÁO8þ–@ÉhçA´ûÕž³pdgÀï6žÏ•1{\0;â;tÅ!Çßì|@tJµ£¯M„Š%r€RŽçwCË£—­ÄÚ{ˆY„7³ô›K‹wÅ·%@óê„€žþp_<]üµØ²þý=|Côÿ§†Íañ›ûqÿ¾tÅç†6ëð»áö`_µƒŒŸÃ€O#¸~8òqÓ½ÀqÈX\"¾C1Ír‚X®ƒ¿Ñö³wùaÿ¾kS›%ü{?ííW¦6þ°ïþ¦½ýÊÔ	ÿ…½ýÊÔfÀŸíÍ', 0),
(84, 0, '', '', 0),
(85, 0, '', '', 0),
(86, 0, '', '', 0),
(87, 0, '', '', 0),
(88, 0, '', '', 0),
(89, 0, '', '', 0),
(90, 0, 'QÉ}ÍŽ©', '', 0),
(91, 0, '', '', 0),
(92, 0, '', '', 0),
(93, 0, '', '', 0),
(94, 0, '', '', 0),
(95, 0, '', '', 0),
(96, 0, '', '', 0),
(97, 0, '', '', 0),
(98, 0, '', '', 0),
(99, 0, '', '', 0),
(100, 0, 'ºÎf>FÂs', '', 0),
(101, 0, '', '', 0),
(102, 0, '', '', 0),
(103, 0, '%’=”8Þ', '', 0),
(104, 0, '', '', 0),
(105, 0, '', '', 0),
(106, 8, '', '', 0),
(107, 0, '', '', 0),
(108, 0, '', '', 0),
(109, 0, '', '', 0),
(110, 0, '', '', 0),
(111, 0, '', '', 0),
(112, 0, '', '', 0),
(113, 0, '', '', 0),
(114, 0, '', '', 0),
(115, 0, '', '', 0),
(116, 0, '', '', 0),
(117, 0, '', '', 0),
(118, 0, 'f\ZØOïï', '', 0),
(119, 0, '', '', 0),
(120, 0, '', '', 0),
(121, 0, '', '', 0),
(122, 0, '', '', 0),
(123, 0, '', '', 0),
(124, 0, '„á»Á‡êð', '', 0),
(125, 0, '', '', 0),
(126, 0, '', '', 0),
(127, 0, '', '', 0),
(128, 0, '', '', 0),
(129, 0, '•(s6ý‡¾', '', 0),
(130, 0, '', '', 0),
(131, 0, '', '', 0),
(132, 0, '-ŒšÒ@X', '', 0),
(133, 0, '', '', 0),
(134, 0, '', '', 0),
(135, 0, '', '', 0),
(136, 0, '', '', 0),
(137, 0, '', '', 0),
(138, 0, '', '', 0),
(139, 0, '', '', 0),
(140, 0, '', '', 0),
(141, 0, '', '', 0),
(142, 0, '', '', 0),
(143, 0, '', '', 0),
(144, 0, '', '', 0),
(145, 0, '', '', 0),
(146, 0, '', '', 0),
(147, 0, '', '', 0),
(148, 0, '', '', 0),
(149, 0, '', '', 0),
(150, 0, '', '', 0),
(151, 0, '', '', 0),
(152, 0, '', '', 0),
(153, 0, '', '', 0),
(154, 0, '', '', 0),
(155, 0, '', '', 0),
(156, 0, '', '', 0),
(157, 0, '', '', 0),
(158, 0, '', '', 0),
(159, 0, '', '', 0),
(160, 0, '', '', 0),
(161, 0, '', '', 0),
(162, 0, '', '', 0),
(163, 0, 'z€ Üv:', 'u©ÀŸsIÐŽT°+±F0xMØ²”6÷v ìÄ·', 0),
(164, 0, '', '', 0),
(165, 0, '', '', 0),
(166, 0, '', '', 0),
(167, 0, '', '', 0),
(168, 0, '', '', 0),
(169, 0, '', '', 0),
(170, 0, '', '', 0),
(171, 0, '', '', 0),
(172, 0, '', '', 0),
(173, 0, '', '', 0),
(174, 0, '', '', 0),
(175, 0, '', '', 0),
(176, 0, '', '', 0),
(177, 0, '', '', 0),
(178, 0, '£äÍ2J„‘', '', 0),
(179, 0, '', '', 0),
(180, 0, '', '', 0),
(181, 0, '', '', 0),
(182, 0, '', '', 0),
(183, 0, '', '', 0),
(184, 0, '', '', 0),
(185, 0, '', '', 0),
(186, 0, '', '', 0),
(187, 0, '', '', 0),
(188, 0, '', '', 0),
(189, 0, '', '', 0),
(190, 0, '', '', 0),
(191, 0, '', '', 0),
(192, 0, '', '', 0),
(193, 0, '', '', 0),
(194, 0, '', '', 0),
(195, 0, '', '', 0),
(196, 0, '', '', 0),
(197, 0, '', '', 0),
(198, 0, '', '', 0),
(199, 0, '', '', 0),
(200, 0, '', '', 0),
(201, 0, '', '', 0),
(202, 0, '', '', 0),
(203, 0, '', '', 0),
(204, 2012, '', '', 0),
(205, 0, '', '', 0),
(206, 0, '', '', 0),
(207, 0, '', '', 0),
(208, 0, '', '', 0),
(209, 0, '', '', 0),
(210, 0, '', '', 0),
(211, 0, '', '', 0),
(212, 0, '', '', 0),
(213, 0, '', '', 0),
(214, 0, '', '', 0),
(215, 0, '', '', 0),
(216, 0, '', '', 0),
(217, 0, '', '', 0),
(218, 0, '', '', 0),
(219, 0, '', '', 0),
(220, 0, '', '', 0),
(221, 0, '', '', 0),
(222, 0, '', '', 0),
(223, 0, '', '', 0),
(224, 0, '', '', 0),
(225, 0, '', '', 0),
(226, 0, '', '', 0);

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
  `user_type` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_first_name`, `student_middle_name`, `student_last_name`, `date_of_birth`, `ethnicity`, `gender`, `password`, `salt`, `hash`, `user_type`) VALUES
(19000000, 'Tapiwa', 'Taps', 'Mavende', '1994-02-03', 'Black', 'Male', '12345678', '', '', 'Student'),
(19000001, 'David', 'Chikumbutso', 'Chimzizi', '1997-08-25', 'Black', 'male', '12345670', '', '', 'Student'),
(19000003, 'Joseph', 'Adam', 'elsie', '2018-09-12', 'Black', 'male', '1234567890', '', '', 'Student'),
(19000004, 'Joseph', 'Adam', 'elsie', '2018-09-12', 'Black', 'male', '1234567890', '', '', 'Student'),
(19000005, 'david', 'jhuhsiuhi', 'tyy', '2018-09-05', '', '', '12345670', '', '', 'Student'),
(19000006, 'david', 'jhuhsiuhi', 'tyy', '2018-10-05', 'Black', 'male', '12345670', '', '', ''),
(19000007, 'david', 'jhuhsiuhi', 'tyy', '2018-09-05', '', '', '12345670', '', '', 'Student'),
(19000008, 'david', 'jhuhsiuhi', 'tyy', '2018-09-05', 'Black', 'male', '12345670', '', '', 'Student'),
(19000009, 'david', 'jhuhsiuhi', 'tyy', '2018-09-05', 'Black', 'male', '12345670', '', '', 'Student'),
(19000010, '', '', '', '0000-00-00', '', '', '', '', '', '');

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
('9090', 10, 'E105');

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
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `user_type` varchar(14) NOT NULL,
  `school_code` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_first_name`, `teacher_middle_name`, `teacher_last_name`, `date_of_birth`, `ethnicity`, `gender`, `password`, `salt`, `hash`, `user_type`, `school_code`) VALUES
(200123, 'Simba', NULL, 'Samuel', '1945-09-12', 'white', 'Male', '25d55ad283aa400af464c76d713c07ad', '', '', 'Teacher', '022'),
(200143, 'David', '', 'chi', '2018-10-22', 'Black', 'male', '25d55ad283aa400af464c76d713c07ad', '', '', 'Teacher', ''),
(200144, 'Simbarashe', '', 'Sithole', '2018-10-03', 'black', 'male', '$2y$10$UUJVTJeQPWde/VVoTG12aOABBNXNIcU4XBT8b7VgAeAdPMG1ZvZS.', '', '', 'Teacher', ''),
(200145, 'Hameno', NULL, 'Ma1', '2018-10-05', 'Black', 'Male', '12345678', '', '', 'Teacher', '022'),
(200146, 'Hameno', NULL, 'Ma1', '2018-10-05', 'Black', 'Male', '12345678', '', '', 'Teacher', '022'),
(200155, 'Simbarashe', '', 'Sithole', '2018-10-06', 'coloured', 'female', '$2y$10$EAKzROtyC5zolKW/NTmzqOXSK/zVuLW870qer7aqDvJYfX6hOjs6S', '', '', 'HOD', ''),
(200156, 'Dave', 'Issa', 'Chichimun', '1997-09-25', 'black', 'male', '$2y$10$f.JPPR9ZDtRdZaxt9on.7OX8eOjcozbuwL623juuODoBK3dVfFwEW', '', '', 'Teacher', '022'),
(200157, 'Simba', '', 'Magic', '2018-10-05', 'asian', 'male', '$2y$10$6rxd4XERUXHsvGTJls1kB.B/c3DkVxBxcAVjKlhfO8m9zx06SgCCq', '', '', 'Teacher', '022');

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
  ADD PRIMARY KEY (`guardian_id`),
  ADD KEY `student_id` (`student_id`);

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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `record_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `guardian_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19000011;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200158;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`school_code`) REFERENCES `school` (`school_code`);

--
-- Constraints for table `guardian`
--
ALTER TABLE `guardian`
  ADD CONSTRAINT `guardian_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
