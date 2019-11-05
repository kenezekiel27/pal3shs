-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 12:04 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_offer`
--

CREATE TABLE `course_offer` (
  `id` int(11) NOT NULL,
  `firstsemgrade11` text NOT NULL,
  `secondsemgrade11` text NOT NULL,
  `firstsemgrade12` text NOT NULL,
  `secondsemgrade12` text NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `academic_track` text NOT NULL,
  `academic_strand` text NOT NULL,
  `subject_ids` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_offer`
--

INSERT INTO `course_offer` (`id`, `firstsemgrade11`, `secondsemgrade11`, `firstsemgrade12`, `secondsemgrade12`, `course_name`, `academic_track`, `academic_strand`, `subject_ids`) VALUES
(1, '[\r\n    {\r\n        \"id\": \"10\"\r\n    },\r\n    {\r\n        \"id\": \"20\"\r\n    },\r\n    {\r\n        \"id\": \"11\"\r\n    },\r\n    {\r\n        \"id\": \"19\"\r\n    },\r\n    {\r\n        \"id\": \"18\"\r\n    }\r\n    ,\r\n    {\r\n        \"id\": \"32\"\r\n    },\r\n    {\r\n        \"id\": \"33\"\r\n    },\r\n    {\r\n        \"id\": \"34\"\r\n    },\r\n    {\r\n        \"id\": \"35\"\r\n    }\r\n    ,\r\n    {\r\n        \"id\": \"81\"\r\n    },\r\n    {\r\n        \"id\": \"82\"\r\n    }\r\n    ,\r\n    {\r\n        \"id\": \"83\"\r\n    },\r\n    {\r\n        \"id\": \"84\"\r\n    }\r\n    ,\r\n    {\r\n        \"id\": \"46\"\r\n    },\r\n    {\r\n        \"id\": \"47\"\r\n    }\r\n\r\n\r\n]', '[\r\n    {\r\n        \"id\": \"7\"\r\n    },\r\n    {\r\n        \"id\": \"8\"\r\n    },\r\n    {\r\n        \"id\": \"5\"\r\n    },\r\n    {\r\n        \"id\": \"6\"\r\n    }\r\n]', '[\r\n    {\r\n        \"id\": \"26\"\r\n    },\r\n    {\r\n        \"id\": \"27\"\r\n    },\r\n    {\r\n        \"id\": \"28\"\r\n    },\r\n    {\r\n        \"id\": \"29\"\r\n    },\r\n    {\r\n      \"id\": \"30\"\r\n    }\r\n]', '[\r\n    {\r\n        \"id\": \"70\"\r\n    },\r\n    {\r\n        \"id\": \"71\"\r\n    },\r\n    {\r\n        \"id\": \"72\"\r\n    },\r\n    {\r\n        \"id\": \"73\"\r\n    },\r\n    {\r\n      \"id\": \"74\"\r\n    },\r\n    {\r\n        \"id\": \"75\"\r\n    },\r\n    {\r\n        \"id\": \"76\"\r\n    },\r\n    {\r\n        \"id\": \"77\"\r\n    },\r\n    {\r\n      \"id\": \"78\"\r\n    },\r\n    {\r\n        \"id\": \"79\"\r\n    },\r\n    {\r\n        \"id\": \"85\"\r\n    },\r\n    {\r\n        \"id\": \"86\"\r\n    },\r\n    {\r\n      \"id\": \"87\"\r\n    },\r\n    {\r\n        \"id\": \"89\"\r\n    },\r\n    {\r\n        \"id\": \"90\"\r\n    },\r\n    {\r\n        \"id\": \"43\"\r\n    }\r\n]', 'Academic/Accountancy, Business and Management', 'Academic', 'Accountancy, Business and Management', '[\n    {\n        \"id\": \"5\"\n    },\n    {\n        \"id\": \"6\"\n    }\n]'),
(3, '[     {         \"id\": \"7\"     },     {         \"id\": \"8\"     } ]', '', '', '', 'Academic/Humanities and Social Sciences', 'Academic', 'Humanities and Social Sciences', '[\n    {\n        \"id\": \"10\"\n    },\n    {\n        \"id\": \"10\"\n    },\n    {\n        \"id\": \"11\"\n    },\n    {\n        \"id\": \"19\"\n    },\n    {\n        \"id\": \"18\"\n    }\n]'),
(4, '', '', '', '', 'Academic/Science and Technology, Engineering and Mathematics', 'Academic', 'Science and Technology, Engineering and Mathematics', ''),
(5, '', '', '', '', 'TVL/Beauty Care, Hairdressing, Wellness Massage', 'TVL', 'Beauty Care, Hairdressing, Wellness Massage', ''),
(6, '', '', '', '', 'TVL/Computer System Servicing', 'TVL', 'Computer System Servicing', ''),
(7, '', '', '', '', 'TVL/Cookery, Bread and Pastries, Food and Beverage', 'TVL', 'Cookery, Bread and Pastries, Food and Beverage', ''),
(8, '', '', '', '', 'TVL/Electrical Installation and Maintenance', 'TVL', 'Electrical Installation and Maintenance', ''),
(9, '', '', '', '', 'TVL/Electronic Products Assembly and Servicing', 'TVL', 'Electronic Products Assembly and Servicing', ''),
(10, '', '', '', '', 'academic/asdasd', 'academic', 'asdasd', ''),
(11, '', '', '', '', 'asd/asdqwe123x132', 'asd', 'asdqwe123x132', '');

-- --------------------------------------------------------

--
-- Table structure for table `list_of_subject`
--

CREATE TABLE `list_of_subject` (
  `id` int(11) NOT NULL,
  `subject_code` varchar(250) NOT NULL,
  `subject_description` varchar(500) NOT NULL,
  `subject_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_of_subject`
--

INSERT INTO `list_of_subject` (`id`, `subject_code`, `subject_description`, `subject_type`) VALUES
(5, 'CPR', 'Contemporary Philippine Arts from the Regions', 'applied'),
(6, 'ELS', 'Earth and Life Science', 'applied'),
(7, 'GenMath', 'General Mathematics', 'applied'),
(8, 'KPWK', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino\r\n', 'applied'),
(9, 'Oral', 'Oral Communication', 'applied'),
(10, 'PerDev', 'Personal Development', 'applied'),
(11, 'PE1', 'Physical Education 1', 'applied'),
(18, 'Math1', 'Business Math', 'core'),
(19, 'MIL', 'Media and Information Literacy', 'applied'),
(26, 'PE2', 'Physical Education 2', 'applied'),
(27, 'PhySci', 'Physical Science', 'applied'),
(28, 'RAW', 'Reading and Writing', 'applied'),
(29, 'Stat', 'Statistics and Probability', 'applied'),
(30, 'PR1', 'Practical Research 1', 'core'),
(32, 'OAM', 'Organization and Management', 'specialized'),
(33, 'PHP', 'Introduction to the Philosophy of the Human Person (IPHP)', 'applied'),
(34, 'PE3', 'Physical Education 3', 'applied'),
(35, 'EmpTech', 'Empowerment Technologies', 'core'),
(36, 'Entrep', 'Entrepreneurship', 'core'),
(37, 'Fil1', 'Filipino sa Piling Larang:', 'core'),
(38, 'PR2', 'Practical Research 2', 'core'),
(40, 'POM', 'Principles of Marketing', 'specialized'),
(41, 'PE4', 'Physical Education 4', 'applied'),
(42, 'UCSP', 'Understanding Culture, Society, and Politics (UCSP)', 'applied'),
(43, 'English1', 'English for Academic and Professional Purposes', 'core'),
(44, 'IRCABS', 'Immersion/Research/Culminating Activity/Business Simulation', 'specialized'),
(45, 'Econ1', 'Applied Economics', 'specialized'),
(46, 'Ethics1', 'Business Ethics and Responsibility', 'specialized'),
(47, 'Finance', 'Business Finance', 'specialized'),
(48, 'Inq/Inv/Imm', 'Inquiries, Investigation and Immersion', 'specialized'),
(71, 'CreWrite', 'Creative Writing', 'core'),
(72, 'DISS', 'Disciplines and Ideas in the Social Sciences (DISS)', 'specialized'),
(73, 'DRR', 'Disaster Readiness and Reduction', 'specialized'),
(74, 'Bio1', 'General Biology 1', 'specialized'),
(75, 'Chem1', 'General Chemistry 1', 'specialized'),
(76, 'IWRB', 'Introduction to World Religions and Beliefs', 'specialized'),
(77, 'TVL1', 'TVL  Major 1', 'specialized'),
(78, 'TVL2', 'TVL  Major 2', 'specialized'),
(79, 'CNF', 'Creative Nonfiction', 'specialized'),
(80, 'DIASS', 'Disciplines and Ideas in the Applied Social Sciences (DIASS)', 'specialized'),
(81, 'PPG', 'Philippine Politics and Governance (PPG)', 'specialized'),
(82, 'CESL', 'Community Engagement, Solidarity, and Leadership ', 'specialized'),
(83, 'TNC21st', 'Trends, Networks, and Critical Thinking in the 21st Century Culture ', 'specialized'),
(84, 'CAL1', 'Pre-Calculus', 'specialized'),
(85, 'CAL2', 'Basic Calculus', 'specialized'),
(86, 'Phys1', 'General Physics 1', 'specialized'),
(87, 'CAP', 'Capstone', 'specialized'),
(89, 'CHEM2', 'General Chemistry 2', 'specialized'),
(90, 'PHYS2', 'General Physics 2', 'specialized');

-- --------------------------------------------------------

--
-- Table structure for table `pending_data`
--

CREATE TABLE `pending_data` (
  `id` int(11) NOT NULL,
  `lrn` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `sex` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `ethnic_group` varchar(255) NOT NULL,
  `telephone_number` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_data`
--

INSERT INTO `pending_data` (`id`, `lrn`, `lname`, `fname`, `mname`, `status`, `sex`, `birthdate`, `birthplace`, `age`, `height`, `weight`, `language`, `religion`, `ethnic_group`, `telephone_number`, `mobile_number`, `email_address`) VALUES
(1, '1', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '123', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, '123123', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, '12312312', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, '12312312313', 'd', 'd', 'd', '0', 'Female', '10/02/2019', 'd', '123', '123', '123', 'd', 'Christian', 'Waray', '123', '123', 'meynardbernales@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(11) NOT NULL,
  `lrn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `lrn`) VALUES
(1, '2323'),
(2, '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `restriction` varchar(250) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `username`, `password`, `restriction`, `time_stamp`) VALUES
(1, 'admin', '123456', 'admin', '2019-10-21 23:10:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_offer`
--
ALTER TABLE `course_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_of_subject`
--
ALTER TABLE `list_of_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_data`
--
ALTER TABLE `pending_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_offer`
--
ALTER TABLE `course_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `list_of_subject`
--
ALTER TABLE `list_of_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `pending_data`
--
ALTER TABLE `pending_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
