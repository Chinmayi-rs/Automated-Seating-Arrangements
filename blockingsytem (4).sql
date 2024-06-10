-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 05:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blockingsytem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allot_seat_class`
--

CREATE TABLE `allot_seat_class` (
  `class_num` int(2) NOT NULL,
  `seat_number` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allot_stu_class`
--

CREATE TABLE `allot_stu_class` (
  `USN` varchar(11) NOT NULL,
  `class_num` int(2) NOT NULL,
  `seat_number` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `class_num` int(2) NOT NULL,
  `capacity` int(3) NOT NULL,
  `dept_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`class_num`, `capacity`, `dept_id`) VALUES
(18, 30, 1),
(19, 20, 1),
(20, 30, 1),
(21, 35, 1),
(22, 25, 1),
(23, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(10) NOT NULL,
  `course_title` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `dept_id` int(5) NOT NULL,
  `scheme` varchar(10) DEFAULT NULL,
  `sem` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `type`, `dept_id`, `scheme`, `sem`) VALUES
('21ucse501', 'webtechnology', 'core', 1, '2021', 5),
('21ucse503', 'database ', 'core', 1, '2021', 5),
('21ucse504', 'unix', 'elective', 1, '2021', 5),
('21uhuc500', 'CONSTITUTION', 'audit', 1, '2021', 5);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(5) NOT NULL,
  `dept_name` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `location`) VALUES
(1, 'CSE', 'sdmcet');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_date` date NOT NULL,
  `exam_Type` text NOT NULL,
  `exam_no` int(11) NOT NULL,
  `slot_no` int(10) NOT NULL,
  `course_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_date`, `exam_Type`, `exam_no`, `slot_no`, `course_id`) VALUES
('2012-03-24', 'IA-1', 1, 1, '21ucse501'),
('2024-03-12', 'IA1', 2, 2, '21ucse503'),
('2024-03-12', 'IA1', 3, 3, '21ucse504'),
('2024-03-12', 'IA1', 4, 4, '21uhuc500');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `empid` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `dept_id` int(10) NOT NULL,
  `class_num` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`empid`, `first_name`, `phone_number`, `course_id`, `dept_id`, `class_num`) VALUES
('sdm101', 'ANAND P S', 12345678, '21ucse503', 1, 18),
('sdm102', 'UP KULKARNI', 87654321, '21ucse504', 1, 18),
('sdm103', 'GOVING NEGLUR', 98765432, '21uhuc500', 1, 19),
('sdm104', 'YASHODA S', 87654321, '21ucse501', 1, 19),
('sdm105', 'NEETA', 1010101, '21ucse503', 1, 20),
('sdm106', 'INDIRA', 1111119999, '21ucse504', 1, 20),
('sdm107', 'SBK', 55556666, '21uhuc500', 1, 21),
('sdm108', 'PRATAP', 77777888, '21uhuc500', 1, 21),
('sdm109', 'raghvendra', 22223333, '21ucse501', 1, 22),
('sdm110', 'KARUR', 44445555, '21ucse501', 1, 22),
('sdm111', 'J.V.VADVI', 1122334455, '21ucse504', 1, 23),
('sdm112', 'SANDHYA', 66778899, '21ucse503', 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `scheme_details`
--

CREATE TABLE `scheme_details` (
  `year` year(4) NOT NULL,
  `scheme` varchar(10) NOT NULL,
  `dept_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scheme_details`
--

INSERT INTO `scheme_details` (`year`, `scheme`, `dept_id`) VALUES
('2024', '2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_number` int(2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `class_num` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seat_number`, `status`, `class_num`) VALUES
(1, 'UO', 18),
(1, 'UO', 19),
(2, 'UO', 18),
(2, 'UO', 19),
(3, 'UO', 18),
(3, 'UO', 19),
(4, 'UO', 18),
(4, 'UO', 19),
(5, 'UO', 18),
(5, 'UO', 19),
(6, 'UO', 18),
(6, 'UO', 19),
(7, 'UO', 18),
(7, 'UO', 19),
(8, 'UO', 18),
(8, 'UO', 19),
(9, 'UO', 18),
(9, 'UO', 19),
(10, 'UO', 18),
(10, 'UO', 19),
(11, 'UO', 18),
(11, 'UO', 19),
(12, 'UO', 18),
(12, 'UO', 19),
(13, 'UO', 18),
(13, 'UO', 19),
(14, 'UO', 18),
(14, 'UO', 19),
(15, 'UO', 18),
(15, 'UO', 19),
(16, 'UO', 18),
(16, 'UO', 19),
(17, 'UO', 18),
(17, 'UO', 19),
(18, 'UO', 19),
(19, 'UO', 18),
(19, 'UO', 19),
(20, 'UO', 18),
(20, 'UO', 19),
(21, 'UO', 18),
(22, 'UO', 18),
(23, 'UO', 18),
(24, 'UO', 18),
(25, 'UO', 18),
(26, 'UO', 18),
(27, 'UO', 18),
(29, 'UO', 18),
(30, 'UO', 18);

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slot_no` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slot_no`, `start_time`, `end_time`) VALUES
(1, '08:00:00', '09:00:00'),
(2, '11:00:00', '12:00:00'),
(3, '02:00:00', '03:00:00'),
(4, '04:00:00', '05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `USN` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `phone_number` int(10) NOT NULL,
  `dept_id` int(10) NOT NULL,
  `year` year(4) NOT NULL,
  `sem` int(5) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`USN`, `name`, `phone_number`, `dept_id`, `year`, `sem`, `type`) VALUES
('2SD22cs001', 'ABDUL', 1234, 1, '2024', 3, 'NORMAL'),
('2SD22CS002', 'ABHILASH', 5678, 1, '2024', 3, 'NORMAL'),
('2SD22cs003', 'ABHISHEK BASUTKAR', 91011, 1, '2024', 3, 'NORMAL'),
('2SD22CS004', 'ABHISHEK', 121314, 1, '2024', 3, 'NORMAL'),
('2SD22cs005', 'ABHISHEK K', 151617, 1, '2024', 3, 'NORMAL'),
('2SD22CS006', 'ABHISHEK T', 181920, 1, '2024', 3, 'NORMAL'),
('2SD22cs007', 'AISHWARYA', 212223, 1, '2024', 3, 'NORMAL'),
('2SD22CS008', 'AKHIL', 1242526, 1, '2024', 3, 'NORMAL'),
('2SD22cs009', 'SHIVALINGAYYA', 282930, 1, '2024', 3, 'NORMAL'),
('2SD22CS010', 'ANANTNAG', 313233, 1, '2024', 3, 'NORMAL'),
('2SD22CS011', 'ANANYA.D', 333435, 1, '2024', 3, 'NORMAL'),
('2SD22CS012', 'ANANYA.G', 353637, 1, '2024', 3, 'NORMAL'),
('2SD22CS013', 'ANKITH.S', 404142, 1, '2024', 3, 'NORMAL'),
('2SD22CS014', 'ANUSHSA', 424344, 1, '2024', 3, 'NORMAL'),
('2SD22CS015', 'UMAMAHESWARI', 434445, 1, '2024', 3, 'NORMAL'),
('2SD22CS016', 'ARCHIT', 454647, 1, '2024', 3, 'NORMAL'),
('2SD22CS017', 'AREIN.I', 484950, 1, '2024', 3, 'NORMAL'),
('2SD22CS018', 'AYESHA', 515253, 1, '2024', 3, 'NORMAL'),
('2SD22CS019', 'B ABHIJEET', 545556, 1, '2024', 3, 'NORMAL'),
('2SD22CS020', 'BHAVANA', 565758, 1, '2024', 3, 'NORMAL'),
('2SD22CS021', 'BHUVANENDRA', 596061, 1, '2024', 3, 'NORMAL'),
('2SD22CS022', 'CHAHIT', 626364, 1, '2024', 3, 'NORMAL'),
('2SD22CS023', 'DARSHAN', 656768, 1, '2024', 3, 'NORMAL'),
('2SD22CS024', 'DEEPAK', 697071, 1, '2024', 3, 'NORMAL'),
('2SD22CS025', 'ESHWARI', 727374, 1, '2024', 3, 'NORMAL'),
('2SD22CS026', 'G RAKSHIT', 757677, 1, '2024', 3, 'NORMAL'),
('2SD22CS027', 'GANESH', 787980, 1, '2024', 3, 'NORMAL'),
('2SD22CS028', 'GAYATRI', 818283, 1, '2024', 3, 'NORMAL'),
('2SD22CS029', 'GOLU KUMAR', 848586, 1, '2024', 3, 'NORMAL'),
('2SD22CS030', 'GOURAV', 878889, 1, '2024', 3, 'NORMAL'),
('2SD22CS031', 'GOUSE AZAM', 909192, 1, '2024', 3, 'RR'),
('2SD22CS032', 'H MANSI', 939495, 1, '2024', 3, 'RR'),
('2SD22CS033', 'HARSHITA', 969798, 1, '2024', 3, 'RR'),
('2SD22CS034', 'HIMANSHU', 99100101, 1, '2024', 3, 'RR'),
('2SD22CS035', 'I SERON JOHNSON', 102103, 1, '2024', 3, 'RR'),
('2SD22CS036', 'JEEVITH', 104105, 1, '2024', 3, 'BACKLOG'),
('2SD22CS037', 'JINENDRA', 106107, 1, '2024', 3, 'BACKLOG'),
('2SD22CS038', 'JOY J M', 108109, 1, '2024', 3, 'BACKLOG'),
('2SD22CS039', 'K K SAGAR', 110111, 1, '2024', 3, 'BACKLOG'),
('2SD22CS040', 'K P PRARTHAN', 112113, 1, '2024', 3, 'BACKLOG');

-- --------------------------------------------------------

--
-- Table structure for table `stu_enroll`
--

CREATE TABLE `stu_enroll` (
  `USN` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stu_enroll`
--

INSERT INTO `stu_enroll` (`USN`, `course_id`) VALUES
('2SD22cs001', '21ucse501'),
('2SD22cs001', '21ucse503'),
('2SD22cs001', '21ucse504'),
('2SD22cs001', '21uhuc500'),
('2SD22CS002', '21ucse501'),
('2SD22CS002', '21ucse503'),
('2SD22CS002', '21ucse504'),
('2SD22CS002', '21uhuc500'),
('2SD22cs003', '21ucse501'),
('2SD22cs003', '21ucse503'),
('2SD22cs003', '21ucse504'),
('2SD22cs003', '21uhuc500'),
('2SD22CS004', '21ucse501'),
('2SD22CS004', '21ucse503'),
('2SD22CS004', '21ucse504'),
('2SD22CS004', '21uhuc500'),
('2SD22cs005', '21ucse501'),
('2SD22cs005', '21ucse503'),
('2SD22cs005', '21ucse504'),
('2SD22cs005', '21uhuc500'),
('2SD22CS006', '21ucse501'),
('2SD22CS006', '21ucse503'),
('2SD22CS006', '21ucse504'),
('2SD22CS006', '21uhuc500'),
('2SD22cs007', '21ucse501'),
('2SD22cs007', '21ucse503'),
('2SD22cs007', '21ucse504'),
('2SD22cs007', '21uhuc500'),
('2SD22CS008', '21ucse501'),
('2SD22CS008', '21ucse503'),
('2SD22CS008', '21ucse504'),
('2SD22CS008', '21uhuc500'),
('2SD22cs009', '21ucse501'),
('2SD22cs009', '21ucse503'),
('2SD22cs009', '21ucse504'),
('2SD22cs009', '21uhuc500'),
('2SD22CS010', '21ucse501'),
('2SD22CS010', '21ucse503'),
('2SD22CS010', '21ucse504'),
('2SD22CS010', '21uhuc500'),
('2SD22CS011', '21ucse501'),
('2SD22CS011', '21ucse503'),
('2SD22CS011', '21ucse504'),
('2SD22CS011', '21uhuc500'),
('2SD22CS012', '21ucse501'),
('2SD22CS012', '21ucse503'),
('2SD22CS012', '21ucse504'),
('2SD22CS012', '21uhuc500'),
('2SD22CS013', '21ucse501'),
('2SD22CS013', '21ucse503'),
('2SD22CS013', '21ucse504'),
('2SD22CS013', '21uhuc500'),
('2SD22CS014', '21ucse501'),
('2SD22CS014', '21ucse503'),
('2SD22CS014', '21ucse504'),
('2SD22CS014', '21uhuc500'),
('2SD22CS015', '21ucse501'),
('2SD22CS015', '21ucse503'),
('2SD22CS015', '21ucse504'),
('2SD22CS015', '21uhuc500'),
('2SD22CS016', '21ucse501'),
('2SD22CS016', '21ucse503'),
('2SD22CS016', '21ucse504'),
('2SD22CS016', '21uhuc500'),
('2SD22CS017', '21ucse501'),
('2SD22CS017', '21ucse503'),
('2SD22CS017', '21ucse504'),
('2SD22CS017', '21uhuc500'),
('2SD22CS018', '21ucse501'),
('2SD22CS018', '21ucse503'),
('2SD22CS018', '21ucse504'),
('2SD22CS018', '21uhuc500'),
('2SD22CS019', '21ucse501'),
('2SD22CS019', '21ucse503'),
('2SD22CS019', '21ucse504'),
('2SD22CS019', '21uhuc500'),
('2SD22CS020', '21ucse501'),
('2SD22CS020', '21ucse503'),
('2SD22CS020', '21ucse504'),
('2SD22CS020', '21uhuc500'),
('2SD22CS021', '21ucse501'),
('2SD22CS021', '21ucse503'),
('2SD22CS021', '21ucse504'),
('2SD22CS021', '21uhuc500'),
('2SD22CS022', '21ucse501'),
('2SD22CS022', '21ucse503'),
('2SD22CS022', '21ucse504'),
('2SD22CS022', '21uhuc500'),
('2SD22CS023', '21ucse501'),
('2SD22CS023', '21ucse503'),
('2SD22CS023', '21ucse504'),
('2SD22CS023', '21uhuc500'),
('2SD22CS024', '21ucse501'),
('2SD22CS024', '21ucse503'),
('2SD22CS024', '21ucse504'),
('2SD22CS024', '21uhuc500'),
('2SD22CS025', '21ucse501'),
('2SD22CS025', '21ucse503'),
('2SD22CS025', '21ucse504'),
('2SD22CS025', '21uhuc500'),
('2SD22CS026', '21ucse501'),
('2SD22CS026', '21ucse503'),
('2SD22CS026', '21ucse504'),
('2SD22CS026', '21uhuc500'),
('2SD22CS027', '21ucse501'),
('2SD22CS027', '21ucse503'),
('2SD22CS027', '21ucse504'),
('2SD22CS027', '21uhuc500'),
('2SD22CS028', '21ucse501'),
('2SD22CS028', '21ucse503'),
('2SD22CS028', '21ucse504'),
('2SD22CS028', '21uhuc500'),
('2SD22CS029', '21ucse501'),
('2SD22CS029', '21ucse503'),
('2SD22CS029', '21ucse504'),
('2SD22CS029', '21uhuc500'),
('2SD22CS030', '21ucse501'),
('2SD22CS030', '21ucse503'),
('2SD22CS030', '21ucse504'),
('2SD22CS030', '21uhuc500'),
('2SD22CS031', '21ucse501'),
('2SD22CS031', '21ucse503'),
('2SD22CS031', '21ucse504'),
('2SD22CS032', '21ucse501'),
('2SD22CS032', '21ucse503'),
('2SD22CS032', '21ucse504'),
('2SD22CS033', '21ucse501'),
('2SD22CS033', '21ucse503'),
('2SD22CS033', '21ucse504'),
('2SD22CS034', '21ucse501'),
('2SD22CS034', '21ucse503'),
('2SD22CS034', '21ucse504'),
('2SD22CS035', '21ucse501'),
('2SD22CS035', '21ucse503'),
('2SD22CS035', '21ucse504'),
('2SD22CS036', '21ucse501'),
('2SD22CS036', '21ucse503'),
('2SD22CS037', '21ucse501'),
('2SD22CS037', '21ucse503'),
('2SD22CS038', '21ucse501'),
('2SD22CS038', '21ucse503'),
('2SD22CS039', '21ucse501'),
('2SD22CS039', '21ucse503'),
('2SD22CS040', '21ucse501'),
('2SD22CS040', '21ucse503');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `allot_seat_class`
--
ALTER TABLE `allot_seat_class`
  ADD KEY `class_num` (`class_num`),
  ADD KEY `seat_number` (`seat_number`);

--
-- Indexes for table `allot_stu_class`
--
ALTER TABLE `allot_stu_class`
  ADD PRIMARY KEY (`USN`),
  ADD KEY `class_num` (`class_num`),
  ADD KEY `seat_number` (`seat_number`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`class_num`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_no`),
  ADD KEY `slot_no` (`slot_no`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`empid`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `instructor_ibfk_1` (`class_num`);

--
-- Indexes for table `scheme_details`
--
ALTER TABLE `scheme_details`
  ADD PRIMARY KEY (`scheme`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_number`,`class_num`),
  ADD KEY `class_num` (`class_num`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slot_no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`USN`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `stu_enroll`
--
ALTER TABLE `stu_enroll`
  ADD PRIMARY KEY (`USN`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allot_seat_class`
--
ALTER TABLE `allot_seat_class`
  ADD CONSTRAINT `allot_seat_class_ibfk_1` FOREIGN KEY (`class_num`) REFERENCES `classroom` (`class_num`),
  ADD CONSTRAINT `allot_seat_class_ibfk_2` FOREIGN KEY (`seat_number`) REFERENCES `seat` (`seat_number`);

--
-- Constraints for table `allot_stu_class`
--
ALTER TABLE `allot_stu_class`
  ADD CONSTRAINT `allot_stu_class_ibfk_1` FOREIGN KEY (`class_num`) REFERENCES `classroom` (`class_num`),
  ADD CONSTRAINT `allot_stu_class_ibfk_2` FOREIGN KEY (`seat_number`) REFERENCES `seat` (`seat_number`),
  ADD CONSTRAINT `allot_stu_class_ibfk_3` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `allot_stu_class_ibfk_4` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `allot_stu_class_ibfk_5` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`);

--
-- Constraints for table `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `classroom_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`slot_no`) REFERENCES `slot` (`slot_no`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`class_num`) REFERENCES `classroom` (`class_num`) ON UPDATE CASCADE;

--
-- Constraints for table `scheme_details`
--
ALTER TABLE `scheme_details`
  ADD CONSTRAINT `scheme_details_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`class_num`) REFERENCES `classroom` (`class_num`);

--
-- Constraints for table `stu_enroll`
--
ALTER TABLE `stu_enroll`
  ADD CONSTRAINT `stu_enroll_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `stu_enroll_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
