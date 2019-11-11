-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 04:55 PM
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
  `academic_strand` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_offer`
--

INSERT INTO `course_offer` (`id`, `firstsemgrade11`, `secondsemgrade11`, `firstsemgrade12`, `secondsemgrade12`, `course_name`, `academic_track`, `academic_strand`) VALUES
(2, '[\n    {\n        \"id\": \"7\"\n    },\n    {\n        \"id\": \"8\"\n    },\n    {\n        \"id\": \"9\"\n    },\n    {\n        \"id\": \"10\"\n    },\n    {\n        \"id\": \"11\"\n    },\n    {\n        \"id\": \"18\"\n    }\n]', '[\n    {\n        \"id\": \"19\"\n    },\n    {\n        \"id\": \"26\"\n    },\n    {\n        \"id\": \"27\"\n    },\n    {\n        \"id\": \"28\"\n    },\n    {\n        \"id\": \"29\"\n    },\n    {\n        \"id\": \"30\"\n    }\n]', '[\n    {\n        \"id\": \"32\"\n    },\n    {\n        \"id\": \"33\"\n    },\n    {\n        \"id\": \"34\"\n    },\n    {\n        \"id\": \"35\"\n    },\n    {\n        \"id\": \"36\"\n    },\n    {\n        \"id\": \"44\"\n    }\n]', '[\n    {\n        \"id\": \"37\"\n    },\n    {\n        \"id\": \"38\"\n    },\n    {\n        \"id\": \"40\"\n    },\n    {\n        \"id\": \"41\"\n    },\n    {\n        \"id\": \"42\"\n    },\n    {\n        \"id\": \"43\"\n    }\n]', 'Academic/General Academic Strand', 'Academic', 'General Academic Strand'),
(3, '', '', '', '', 'Academic/Humanities and Social Sciences', 'Academic', 'Humanities and Social Sciences'),
(4, '', '', '', '', 'Academic/Science and Technology, Engineering and Mathematics', 'Academic', 'Science and Technology, Engineering and Mathematics'),
(5, '', '', '', '', 'TVL/Beauty Care, Hairdressing, Wellness Massage', 'TVL', 'Beauty Care, Hairdressing, Wellness Massage'),
(6, '', '', '', '', 'TVL/Computer System Servicing', 'TVL', 'Computer System Servicing'),
(7, '', '', '', '', 'TVL/Cookery, Bread and Pastries, Food and Beverage', 'TVL', 'Cookery, Bread and Pastries, Food and Beverage'),
(8, '', '', '', '', 'TVL/Electrical Installation and Maintenance', 'TVL', 'Electrical Installation and Maintenance'),
(9, '', '', '', '', 'TVL/Electronic Products Assembly and Servicing', 'TVL', 'Electronic Products Assembly and Servicing');

-- --------------------------------------------------------

--
-- Table structure for table `list_of_subject`
--

CREATE TABLE `list_of_subject` (
  `id` int(11) NOT NULL,
  `teachers_id` text NOT NULL,
  `teachers_of_this_subject` text NOT NULL,
  `subject_code` varchar(250) NOT NULL,
  `subject_description` varchar(500) NOT NULL,
  `subject_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_of_subject`
--

INSERT INTO `list_of_subject` (`id`, `teachers_id`, `teachers_of_this_subject`, `subject_code`, `subject_description`, `subject_type`) VALUES
(7, '[\r\n    {\r\n        \"id\": \"4\"\r\n    }\r\n]', '', 'GenMath', 'General Mathematics', 'applied'),
(8, '[\n    {\n        \"id\": \"1\"\n    }\n]', '', 'KPWK', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino\r\n', 'applied'),
(9, '[\n    {\n        \"id\": \"3\"\n    }\n]', '', 'Oral', 'Oral Communication', 'applied'),
(10, '', '', 'PerDev', 'Personal Development', 'applied'),
(11, '', '', 'PE1', 'Physical Education 1', 'applied'),
(18, '', '', 'Math1', 'Business Math', 'core'),
(19, '', '', 'MIL', 'Media and Information Literacy', 'applied'),
(26, '', '', 'PE2', 'Physical Education 2', 'applied'),
(27, '', '', 'PhySci', 'Physical Science', 'applied'),
(28, '', '', 'RAW', 'Reading and Writing', 'applied'),
(29, '', '', 'Stat', 'Statistics and Probability', 'applied'),
(30, '', '', 'PR1', 'Practical Research 1', 'core'),
(32, '', '', 'OAM', 'Organization and Management', 'specialized'),
(33, '', '', 'PHP', 'Introduction to the Philosophy of the Human Person (IPHP)', 'applied'),
(34, '', '', 'PE3', 'Physical Education 3', 'applied'),
(35, '', '', 'EmpTech', 'Empowerment Technologies', 'core'),
(36, '', '', 'Entrep', 'Entrepreneurship', 'core'),
(37, '', '', 'Fil1', 'Filipino sa Piling Larang:', 'core'),
(38, '', '', 'PR2', 'Practical Research 2', 'core'),
(40, '', '', 'POM', 'Principles of Marketing', 'specialized'),
(41, '', '', 'PE4', 'Physical Education 4', 'applied'),
(42, '', '', 'UCSP', 'Understanding Culture, Society, and Politics (UCSP)', 'applied'),
(43, '[\n    {\n        \"id\": \"1\"\n    },\n    {\n        \"id\": \"4\"\n    },\n    {\n        \"id\": \"5\"\n    },\n    {\n        \"id\": \"10\"\n    }\n]', '[\n    {\n        \"idofteacher\": \"4\",\n        \"academic_year\": \"2019-2020\",\n        \"course\": \"Academic\\/General Academic Strand\",\n        \"academic_level\": \"Grade 12\",\n        \"semester\": \"2nd Semester\",\n        \"status\": \"Current\",\n        \"sectionName\": \"Section 1\"\n    },\n    {\n        \"idofteacher\": \"10\",\n        \"academic_year\": \"2019-2020\",\n        \"course\": \"Academic\\/General Academic Strand\",\n        \"academic_level\": \"Grade 12\",\n        \"semester\": \"2nd Semester\",\n        \"status\": \"Current\",\n        \"sectionName\": \"Section 3\"\n    }\n]', 'English1', 'English for Academic and Professional Purposes', 'core'),
(44, '', '', 'IRCABS', 'Immersion/Research/Culminating Activity/Business Simulation', 'specialized'),
(45, '', '', 'Econ1', 'Applied Economics', 'specialized'),
(46, '', '', 'Ethics1', 'Business Ethics and Responsibility', 'specialized'),
(47, '', '', 'Finance', 'Business Finance', 'specialized'),
(48, '', '', 'Inq/Inv/Imm', 'Inquiries, Investigation and Immersion', 'specialized'),
(71, '', '', 'CreWrite', 'Creative Writing', 'core'),
(72, '', '', 'DISS', 'Disciplines and Ideas in the Social Sciences (DISS)', 'specialized'),
(73, '', '', 'DRR', 'Disaster Readiness and Reduction', 'specialized'),
(75, '', '', 'Chem1', 'General Chemistry 1', 'specialized'),
(76, '', '', 'IWRB', 'Introduction to World Religions and Beliefs', 'specialized'),
(77, '', '', 'TVL1', 'TVL  Major 1', 'specialized'),
(78, '', '', 'TVL2', 'TVL  Major 2', 'specialized'),
(79, '', '', 'CNF', 'Creative Nonfiction', 'specialized'),
(80, '', '', 'DIASS', 'Disciplines and Ideas in the Applied Social Sciences (DIASS)', 'specialized'),
(81, '', '', 'PPG', 'Philippine Politics and Governance (PPG)', 'specialized'),
(82, '[\n    {\n        \"id\": \"4\"\n    },\n    {\n        \"id\": \"5\"\n    },\n    {\n        \"id\": \"10\"\n    },\n    {\n        \"id\": \"1\"\n    }\n]', '', 'CESL', 'Community Engagement, Solidarity, and Leadership ', 'specialized'),
(83, '', '', 'TNC21st', 'Trends, Networks, and Critical Thinking in the 21st Century Culture ', 'specialized'),
(86, '', '', 'Phys1', 'General Physics 1', 'specialized'),
(87, '[\n    {\n        \"id\": \"4\"\n    }\n]', '', 'CAP', 'Capstone', 'applied'),
(89, '', '', 'CHEM2', 'General Chemistry 2', 'specialized'),
(90, '', '', 'PHYS2', 'General Physics 2', 'specialized');

-- --------------------------------------------------------

--
-- Table structure for table `open_course`
--

CREATE TABLE `open_course` (
  `id` int(11) NOT NULL,
  `acad_year` varchar(250) NOT NULL,
  `course_open_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `open_course`
--

INSERT INTO `open_course` (`id`, `acad_year`, `course_open_id`) VALUES
(1, '2018-2019', '[\n    {\n        \"id\": \"3\"\n    },\n    {\n        \"id\": \"4\"\n    },\n    {\n        \"id\": \"5\"\n    }\n]'),
(2, '2019-2020', '[\n    {\n        \"id\": \"2\"\n    },\n    {\n        \"id\": \"3\"\n    },\n    {\n        \"id\": \"4\"\n    },\n    {\n        \"id\": \"5\"\n    },\n    {\n        \"id\": \"6\"\n    },\n    {\n        \"id\": \"7\"\n    }\n]'),
(3, '2014-2015', '[\n    {\n        \"id\": \"2\"\n    },\n    {\n        \"id\": \"3\"\n    },\n    {\n        \"id\": \"4\"\n    },\n    {\n        \"id\": \"5\"\n    },\n    {\n        \"id\": \"6\"\n    },\n    {\n        \"id\": \"7\"\n    }\n]');

-- --------------------------------------------------------

--
-- Table structure for table `section_list`
--

CREATE TABLE `section_list` (
  `id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `academic_level` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `student_id` text NOT NULL,
  `adviser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_list`
--

INSERT INTO `section_list` (`id`, `section_name`, `semester`, `academic_year`, `academic_level`, `status`, `course`, `student_id`, `adviser`) VALUES
(1, 'Section 1', '2nd Semester', '2019-2020', 'Grade 12', 'Current', 'Academic/General Academic Strand', '', '1'),
(3, 'Section 3', '2nd Semester', '2019-2020', 'Grade 12', 'Current', 'Academic/General Academic Strand', '', '10'),
(7, 'Section 7', '2nd Semester', '2019-2020', 'Grade 12', 'Current', 'Academic/General Academic Strand', '', '4'),
(8, 'Section 8', '2nd Semester', '2019-2020', 'Grade 12', 'Current', 'Academic/General Academic Strand', '', '5');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(11) NOT NULL,
  `lrn` varchar(250) NOT NULL,
  `acad_level` text NOT NULL,
  `personal_info` text NOT NULL,
  `address` text NOT NULL,
  `guardian_info` text NOT NULL,
  `education` text NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `lrn`, `acad_level`, `personal_info`, `address`, `guardian_info`, `education`, `status`) VALUES
(10, '3123123', '[\n    {\n        \"acad_status\": \"Old Student\",\n        \"acad_level\": \"Grade 11\",\n        \"course\": \"Academic\\/Humanities\",\n        \"semester\": \"2nd Semester\",\n        \"acad_year\": \"2019-2020\"\n    }\n]', '[\n    {\n        \"lname\": \"3333333\",\n        \"fname\": \"33333\",\n        \"mname\": \"33333333333\",\n        \"sex\": \"Male\",\n        \"bday\": \"11\\/14\\/2019\",\n        \"bplace\": \"3333333\",\n        \"age\": \"3\",\n        \"height\": \"333\",\n        \"weight\": \"33\",\n        \"language\": \"3333333\",\n        \"religion\": \"Catholic\",\n        \"ethnic_group\": \"Filipino\",\n        \"telephone\": \"333333\",\n        \"mobile\": \"3333333\",\n        \"email\": \"3333333\"\n    }\n]', '[\n    {\n        \"brgy\": \"3333333\",\n        \"municipality\": \"33333\",\n        \"province\": \"3333333333\"\n    }\n]', '[\n    {\n        \"g_lname\": \"33333333\",\n        \"g_fname\": \"333333\",\n        \"g_mname\": \"33333333\",\n        \"g_relationship\": \"33333333333\",\n        \"g_contact\": \"333333\",\n        \"g_brgy\": \"33333333\",\n        \"g_municipality\": \"33333333333\",\n        \"g_province\": \"3333333333\"\n    }\n]', '[\n    {\n        \"curriculum\": \"Old Curriculum\",\n        \"school\": \"333\",\n        \"brgy\": \"3333333\",\n        \"municipality\": \"3333333\",\n        \"province\": \"3333333\",\n        \"yearfrom\": \"2004\",\n        \"yearto\": \"2008\",\n        \"average\": \"555\"\n    }\n]', '0'),
(11, '12345', '[\r\n    {\r\n        \"acad_status\": \"Transferee Student\",\r\n        \"acad_level\": \"Grade 12\",\r\n        \"course\": \"Academic\\/Science and Technology, Engineering and Mathematics\",\r\n        \"semester\": \"1st Semester\",\r\n        \"acad_year\": \"2019-2020\"\r\n    }\r\n]', '[\n    {\n        \"lname\": \"rrr\",\n        \"fname\": \"rr\",\n        \"mname\": \"rrr\",\n        \"sex\": \"Male\",\n        \"bday\": \"10\\/31\\/2019\",\n        \"bplace\": \"rr\",\n        \"age\": \"1\",\n        \"height\": \"32\",\n        \"weight\": \"44\",\n        \"language\": \"ff\",\n        \"religion\": \"Catholic\",\n        \"ethnic_group\": \"Aeta\",\n        \"telephone\": \"ff\",\n        \"mobile\": \"rrr\",\n        \"email\": \"rrr\"\n    }\n]', '[\n    {\n        \"brgy\": \"rrr\",\n        \"municipality\": \"rrr\",\n        \"province\": \"rr\"\n    }\n]', '[\n    {\n        \"g_lname\": \"rr\",\n        \"g_fname\": \"rr\",\n        \"g_mname\": \"rr\",\n        \"g_relationship\": \"rr\",\n        \"g_contact\": \"rr\",\n        \"g_brgy\": \"rr\",\n        \"g_municipality\": \"rr\",\n        \"g_province\": \"rr\"\n    }\n]', '[\n    {\n        \"curriculum\": \"Old Curriculum\",\n        \"school\": \"rr\",\n        \"brgy\": \"rr\",\n        \"municipality\": \"rr\",\n        \"province\": \"rr\",\n        \"yearfrom\": \"2002\",\n        \"yearto\": \"2006\",\n        \"average\": \"77\"\n    }\n]', '1'),
(12, '23213', '[\r\n    {\r\n        \"acad_status\": \"Old Student\",\r\n        \"acad_level\": \"Grade 12\",\r\n        \"course\": \"Academic\\/Science and Technology, Engineering and Mathematics\",\r\n        \"semester\": \"1st Semester\",\r\n        \"acad_year\": \"2019-2020\"\r\n    }\r\n]', '[\n    {\n        \"lname\": \"eee\",\n        \"fname\": \"eee\",\n        \"mname\": \"ee\",\n        \"sex\": \"Female\",\n        \"bday\": \"10\\/15\\/2019\",\n        \"bplace\": \"ee\",\n        \"age\": \"1\",\n        \"height\": \"eee\",\n        \"weight\": \"ee\",\n        \"language\": \"ee\",\n        \"religion\": \"Baptist\",\n        \"ethnic_group\": \"Maranao\",\n        \"telephone\": \"ee\",\n        \"mobile\": \"ee\",\n        \"email\": \"ee\"\n    }\n]', '[\n    {\n        \"brgy\": \"ee\",\n        \"municipality\": \"ee\",\n        \"province\": \"ee\"\n    }\n]', '[\n    {\n        \"g_lname\": \"ee\",\n        \"g_fname\": \"ee\",\n        \"g_mname\": \"ee\",\n        \"g_relationship\": \"ee\",\n        \"g_contact\": \"ee\",\n        \"g_brgy\": \"ee\",\n        \"g_municipality\": \"ee\",\n        \"g_province\": \"ee\"\n    }\n]', '[\n    {\n        \"curriculum\": \"Junior High School\",\n        \"school\": \"ee\",\n        \"brgy\": \"ee\",\n        \"municipality\": \"ee\",\n        \"province\": \"ee\",\n        \"yearfrom\": \"2007\",\n        \"yearto\": \"2010\",\n        \"average\": \"55\"\n    }\n]', '1'),
(13, '123123', '[\r\n    {\r\n        \"acad_status\": \"New Student\",\r\n        \"acad_level\": \"Grade 11\",\r\n        \"course\": \"Academic\\/Science and Technology, Engineering and Mathematics\",\r\n        \"semester\": \"1st Semester\",\r\n        \"acad_year\": \"2019-2020\"\r\n    }\r\n]', '[\n    {\n        \"lname\": \"333\",\n        \"fname\": \"333\",\n        \"mname\": \"333\",\n        \"sex\": \"Female\",\n        \"bday\": \"10\\/02\\/2019\",\n        \"bplace\": \"33\",\n        \"age\": \"33\",\n        \"height\": \"33\",\n        \"weight\": \"33\",\n        \"language\": \"33\",\n        \"religion\": \"Christian\",\n        \"ethnic_group\": \"Mangyan\",\n        \"telephone\": \"33\",\n        \"mobile\": \"33\",\n        \"email\": \"33\"\n    }\n]', '[\n    {\n        \"brgy\": \"33\",\n        \"municipality\": \"33\",\n        \"province\": \"33\"\n    }\n]', '[\n    {\n        \"g_lname\": \"33\",\n        \"g_fname\": \"33\",\n        \"g_mname\": \"33\",\n        \"g_relationship\": \"33\",\n        \"g_contact\": \"33\",\n        \"g_brgy\": \"33\",\n        \"g_municipality\": \"33\",\n        \"g_province\": \"33\"\n    }\n]', '[\n    {\n        \"curriculum\": \"Old Curriculum\",\n        \"school\": \"33\",\n        \"brgy\": \"33\",\n        \"municipality\": \"33\",\n        \"province\": \"33\",\n        \"yearfrom\": \"2008\",\n        \"yearto\": \"2012\",\n        \"average\": \"55\"\n    }\n]', '1'),
(14, '3123', '[\n    {\n        \"acad_status\": \"New Student\",\n        \"acad_level\": \"Grade 12\",\n        \"course\": \"TVL\\/Beauty\",\n        \"semester\": \"1st Semester\",\n        \"acad_year\": \"2018-2019\"\n    }\n]', '[\n    {\n        \"lname\": \"tttttt\",\n        \"fname\": \"ttttt\",\n        \"mname\": \"tttttttt\",\n        \"sex\": \"Male\",\n        \"bday\": \"11\\/28\\/2019\",\n        \"bplace\": \"ttttttt\",\n        \"age\": \"1\",\n        \"height\": \"ttttt\",\n        \"weight\": \"ttttt\",\n        \"language\": \"ttttt\",\n        \"religion\": \"Baptist\",\n        \"ethnic_group\": \"Maranao\",\n        \"telephone\": \"ttt\",\n        \"mobile\": \"tttttt\",\n        \"email\": \"ttttttt\"\n    }\n]', '[\n    {\n        \"brgy\": \"ttttt\",\n        \"municipality\": \"ttttttt\",\n        \"province\": \"tttttt\"\n    }\n]', '[\n    {\n        \"g_lname\": \"ttttt\",\n        \"g_fname\": \"ttttttt\",\n        \"g_mname\": \"ttttttttt\",\n        \"g_relationship\": \"tttttt\",\n        \"g_contact\": \"tttttttt\",\n        \"g_brgy\": \"tttt\",\n        \"g_municipality\": \"ttttttt\",\n        \"g_province\": \"ttttttt\"\n    }\n]', '[\n    {\n        \"curriculum\": \"Junior High School\",\n        \"school\": \"ttttt\",\n        \"brgy\": \"ttttt\",\n        \"municipality\": \"ttttt\",\n        \"province\": \"ttttt\",\n        \"yearfrom\": \"2013\",\n        \"yearto\": \"2015\",\n        \"average\": \"666\"\n    }\n]', '1'),
(15, '5555', '[\n    {\n        \"acad_status\": \"New Student\",\n        \"acad_level\": \"Grade 12\",\n        \"course\": \"Academic\\/Science and Technology, Engineering and Mathematics\",\n        \"semester\": \"1st Semester\",\n        \"acad_year\": \"2019-2020\"\n    }\n]', '[\r\n    {\r\n        \"lname\": \"tttttt\",\r\n        \"fname\": \"ttttt\",\r\n        \"mname\": \"tttttttt\",\r\n        \"sex\": \"Male\",\r\n        \"bday\": \"11\\/28\\/2019\",\r\n        \"bplace\": \"ttttttt\",\r\n        \"age\": \"1\",\r\n        \"height\": \"ttttt\",\r\n        \"weight\": \"ttttt\",\r\n        \"language\": \"ttttt\",\r\n        \"religion\": \"Baptist\",\r\n        \"ethnic_group\": \"Maranao\",\r\n        \"telephone\": \"ttt\",\r\n        \"mobile\": \"tttttt\",\r\n        \"email\": \"ttttttt\"\r\n    }\r\n]', '[\n    {\n        \"brgy\": \"3424\",\n        \"municipality\": \"42343\",\n        \"province\": \"4234\"\n    }\n]', '[\n    {\n        \"g_lname\": \"g\",\n        \"g_fname\": \"gggggg\",\n        \"g_mname\": \"ggggggg\",\n        \"g_relationship\": \"gggg\",\n        \"g_contact\": \"gggggg\",\n        \"g_brgy\": \"gggggg\",\n        \"g_municipality\": \"gggg\",\n        \"g_province\": \"ggggg\"\n    }\n]', '[\n    {\n        \"curriculum\": \"Old Curriculum\",\n        \"school\": \"gggg\",\n        \"brgy\": \"ggg\",\n        \"municipality\": \"ggggg\",\n        \"province\": \"gggg\",\n        \"yearfrom\": \"2007\",\n        \"yearto\": \"2010\",\n        \"average\": \"66\"\n    }\n]', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subject_grade_per_student`
--

CREATE TABLE `subject_grade_per_student` (
  `id` int(11) NOT NULL,
  `lrn` varchar(250) NOT NULL,
  `acad_info` text NOT NULL,
  `subject` text NOT NULL,
  `grade` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_grade_per_student`
--

INSERT INTO `subject_grade_per_student` (`id`, `lrn`, `acad_info`, `subject`, `grade`) VALUES
(1, '122333', 'aaa', 'aaaa', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_data`
--

CREATE TABLE `teacher_data` (
  `id` int(11) NOT NULL,
  `lrn` varchar(250) NOT NULL,
  `personal_info` text NOT NULL,
  `address` text NOT NULL,
  `guardian_info` text NOT NULL,
  `education` text NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_data`
--

INSERT INTO `teacher_data` (`id`, `lrn`, `personal_info`, `address`, `guardian_info`, `education`, `status`) VALUES
(1, '111111', '[\r\n{\r\n    \"lname\": \"limbag\",\r\n    \"fname\": \"meynard\",\r\n    \"mname\": \"bernales\",\r\n    \"sex\": \"Male\",\r\n    \"bday\": \"09\\/25\\/1992\",\r\n    \"bplace\": \"Dasmarinas, Cavite\",\r\n    \"age\": \"27\",\r\n    \"height\": \"160\",\r\n    \"weight\": \"60\",\r\n    \"language\": \"Filipino\",\r\n    \"religion\": \"Catholic\",\r\n    \"ethnic_group\": \"Filipino\",\r\n    \"telephone\": \"11234\",\r\n    \"mobile\": \"12345678\",\r\n    \"email\": \"meynardbernales@gmail.com\"\r\n}\r\n]', '[     {         \"brgy\": \"dddd\",         \"municipality\": \"ddddd\",         \"province\": \"ddd\"     } ]', '[     {         \"g_lname\": \"dddd\",         \"g_fname\": \"ddd\",         \"g_mname\": \"ddd\",         \"g_relationship\": \"dd\",         \"g_contact\": \"333\",         \"g_brgy\": \"dd\",         \"g_municipality\": \"ddd\",         \"g_province\": \"ddd\"     } ]', '[     {         \"school_name\": \"dd\",         \"degree\": \"Bachelor of Science\",         \"course\": \"ffff\",         \"s_brgy\": \"ddd\",         \"s_municipality\": \"ddd\",         \"s_province\": \"dd\",         \"year_from\": \"2006\",         \"year_to\": \"2010\"     } ]', '1'),
(4, '121212', '[\n    {\n        \"lname\": \"limbag\",\n        \"fname\": \"melvin\",\n        \"mname\": \"bernales\",\n        \"sex\": \"Male\",\n        \"bday\": \"09\\/06\\/1990\",\n        \"bplace\": \"dasmarinas, cavite\",\n        \"age\": \"29\",\n        \"height\": \"160\",\n        \"weight\": \"57\",\n        \"language\": \"dsa\",\n        \"religion\": \"Catholic\",\n        \"ethnic_group\": \"Filipino\",\n        \"telephone\": \"1234567\",\n        \"mobile\": \"`123456789\",\n        \"email\": \"meynardbernales@gmail.com\"\n    }\n]', '[\n    {\n        \"brgy\": \"sddasdsds\",\n        \"municipality\": \"sdasds\",\n        \"province\": \"sadaas\"\n    }\n]', '[     {         \"g_lname\": \"dddd\",         \"g_fname\": \"ddd\",         \"g_mname\": \"ddd\",         \"g_relationship\": \"dd\",         \"g_contact\": \"333\",         \"g_brgy\": \"dd\",         \"g_municipality\": \"ddd\",         \"g_province\": \"ddd\"     } ]', '[     {         \"school_name\": \"dd\",         \"degree\": \"Bachelor of Science\",         \"course\": \"ffff\",         \"s_brgy\": \"ddd\",         \"s_municipality\": \"ddd\",         \"s_province\": \"dd\",         \"year_from\": \"2006\",         \"year_to\": \"2010\"     } ]', '1'),
(5, '131313', '[\n    {\n        \"lname\": \"limbag\",\n        \"fname\": \"marlon\",\n        \"mname\": \"bernales\",\n        \"sex\": \"Male\",\n        \"bday\": \"03\\/03\\/1996\",\n        \"bplace\": \"dasmarinas, cavite\",\n        \"age\": \"24\",\n        \"height\": \"178\",\n        \"weight\": \"66\",\n        \"language\": \"dsadsa\",\n        \"religion\": \"Christian\",\n        \"ethnic_group\": \"Filipino\",\n        \"telephone\": \"12345\",\n        \"mobile\": \"12345678\",\n        \"email\": \"meynardbernales@gmail.com\"\n    }\n]', '[\n    {\n        \"brgy\": \"dasdas\",\n        \"municipality\": \"sdasd\",\n        \"province\": \"sadas\"\n    }\n]', '[     {         \"g_lname\": \"dddd\",         \"g_fname\": \"ddd\",         \"g_mname\": \"ddd\",         \"g_relationship\": \"dd\",         \"g_contact\": \"333\",         \"g_brgy\": \"dd\",         \"g_municipality\": \"ddd\",         \"g_province\": \"ddd\"     } ]', '[     {         \"school_name\": \"dd\",         \"degree\": \"Bachelor of Science\",         \"course\": \"ffff\",         \"s_brgy\": \"ddd\",         \"s_municipality\": \"ddd\",         \"s_province\": \"dd\",         \"year_from\": \"2006\",         \"year_to\": \"2010\"     } ]', '1'),
(10, '2222222', '[\n    {\n        \"lname\": \"dddd\",\n        \"fname\": \"dddd\",\n        \"mname\": \"dddd\",\n        \"sex\": \"Female\",\n        \"bday\": \"06\\/23\\/1992\",\n        \"bplace\": \"dddd\",\n        \"age\": \"23\",\n        \"height\": \"333\",\n        \"weight\": \"44\",\n        \"language\": \"dsad\",\n        \"religion\": \"Muslim\",\n        \"ethnic_group\": \"Tagalog\",\n        \"telephone\": \"22222\",\n        \"mobile\": \"333333\",\n        \"email\": \"meynardbernales@gmail.com\"\n    }\n]', '[\n    {\n        \"brgy\": \"dddd\",\n        \"municipality\": \"ddddd\",\n        \"province\": \"ddd\"\n    }\n]', '[\n    {\n        \"g_lname\": \"dddd\",\n        \"g_fname\": \"ddd\",\n        \"g_mname\": \"ddd\",\n        \"g_relationship\": \"dd\",\n        \"g_contact\": \"333\",\n        \"g_brgy\": \"dd\",\n        \"g_municipality\": \"ddd\",\n        \"g_province\": \"ddd\"\n    }\n]', '[\n    {\n        \"school_name\": \"dd\",\n        \"degree\": \"Bachelor of Science\",\n        \"course\": \"ffff\",\n        \"s_brgy\": \"ddd\",\n        \"s_municipality\": \"ddd\",\n        \"s_province\": \"dd\",\n        \"year_from\": \"2006\",\n        \"year_to\": \"2010\"\n    }\n]', '1');

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
(1, 'admin', '123456', 'admin', '2019-10-21 23:10:03'),
(2, '12', '123456', 'student', '2019-11-07 22:59:18'),
(4, '3123123', '123456', 'student', '2019-11-09 03:29:09'),
(5, '121212', '123456', 'teacher', '2019-11-09 03:42:59'),
(6, '111111', '123456', 'teacher', '2019-11-09 23:08:34'),
(7, '131313', '123456', 'teacher', '2019-11-09 23:08:35'),
(8, '2222222', '123456', 'teacher', '2019-11-09 23:08:35'),
(9, '3123', '123456', 'student', '2019-11-10 02:39:29'),
(10, '12345', '123456', 'student', '2019-11-10 02:39:31'),
(11, '5555', '123456', 'student', '2019-11-10 02:39:32'),
(12, '23213', '123456', 'student', '2019-11-10 02:39:33'),
(13, '123123', '123456', 'student', '2019-11-10 02:39:35');

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
-- Indexes for table `open_course`
--
ALTER TABLE `open_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_list`
--
ALTER TABLE `section_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_grade_per_student`
--
ALTER TABLE `subject_grade_per_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_data`
--
ALTER TABLE `teacher_data`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `list_of_subject`
--
ALTER TABLE `list_of_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `open_course`
--
ALTER TABLE `open_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section_list`
--
ALTER TABLE `section_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subject_grade_per_student`
--
ALTER TABLE `subject_grade_per_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_data`
--
ALTER TABLE `teacher_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
