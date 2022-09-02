-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 01:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin1`
--

CREATE TABLE `admin1` (
  `adminId` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin1`
--

INSERT INTO `admin1` (`adminId`, `username`, `pass`) VALUES
(1, 'Admin', '12345');

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
(39, 'Timetable', 'Is out', 1),
(40, 'Hello', 'Time table is out', 1),
(41, 'Hello', 'Timetable is out', 1),
(44, 'Hello', 'timetable is out', 1),
(46, 'Timetable', 'Timetable is out', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` int(11) NOT NULL,
  `courseName` varchar(20) DEFAULT NULL,
  `faculty` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `lab` bit(1) NOT NULL,
  `CourseCode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coursestudy`
--

CREATE TABLE `coursestudy` (
  `ID` int(11) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `courseTitle` varchar(20) NOT NULL,
  `courseCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursestudy`
--

INSERT INTO `coursestudy` (`ID`, `faculty`, `courseTitle`, `courseCode`) VALUES
(11, 'SCI', 'PROJECT MANAGEMENT', 'CCS 3302'),
(12, 'SCI', ' COMPUTER SYSTEMS AR', 'CIT 3150'),
(13, 'SCI', 'COMPUTER AIDED DESIG', 'CIT 3151'),
(14, 'SCI', ' DATA COMM AND NETWO', 'CIT 3152'),
(15, 'SCI', 'OBJECT ORIENTED PROG', 'CIT 3153 '),
(16, 'SCI', 'SYSTEMS ANALYSIS AND', 'CIT 3154'),
(17, 'SCI', 'DATABASE SYSTEMS', 'CIT 3201'),
(18, 'SCI', ' OPERATING SYSTEMS I', 'CIT 3229'),
(19, 'SCI', ' WEB DESIGN', 'CIT 3250 '),
(20, 'SCI', 'APPLICATION PROGRAMM', 'CIT 3252'),
(21, 'SCI', 'NETWORK ADMINISTRATI', 'CIT 3253'),
(22, 'SCI', 'COMPUTER APPLICATION', 'CIT 3291');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` int(11) NOT NULL,
  `departmentName` varchar(30) NOT NULL,
  `fk_facultyID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `departmentName`, `fk_facultyID`) VALUES
(26, 'Information Technology', 11),
(27, 'Computer Science', 11);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyID` int(11) NOT NULL,
  `facultyName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyID`, `facultyName`) VALUES
(11, 'SCI'),
(12, 'SPAS'),
(14, 'School of Nursing'),
(15, 'School of Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `lab_room`
--

CREATE TABLE `lab_room` (
  `room_id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `labName` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_room`
--

INSERT INTO `lab_room` (`room_id`, `capacity`, `labName`) VALUES
(17, 70, 'Lab 1'),
(18, 80, 'Lab 2'),
(19, 80, 'Lab 3'),
(20, 70, 'Lab 10'),
(21, 80, 'Lab 11'),
(22, 80, 'Lab 16'),
(23, 100, 'Lab 17'),
(24, 70, 'Lab 20');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `staffID` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`staffID`, `gender`, `userName`, `password`, `email`) VALUES
(7, 'male', 'Simon', '123456', 'ngachsimon@gmail.com'),
(8, 'male', 'John', '123456', 'johnndavi2019@gmail.com'),
(10, 'male', 'Thuo', '123456', 'joshuathuo4@gmail.com'),
(11, 'male', 'Mary', '123456', 'apondiashley2@gmail.com'),
(12, 'female', 'Dinah', '123456', 'anyangodinah2000@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `noteId` int(11) NOT NULL,
  `subject` varchar(55) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `status` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`noteId`, `subject`, `comment`, `status`) VALUES
(1, 'sdf', 'asxc', '0'),
(2, 'Hello', 'qwerj', '0');

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `period_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `finish_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`period_id`, `start_time`, `finish_time`) VALUES
(6, '08:00:00', '11:00:00'),
(7, '11:00:00', '14:00:00'),
(8, '14:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `prog_id` int(11) NOT NULL,
  `prog_name` varchar(20) NOT NULL,
  `department` varchar(500) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`prog_id`, `prog_name`, `department`, `Capacity`, `semester`, `year`) VALUES
(14, 'BCS', 'Computer Science', 77, 1, 1),
(15, 'BCS', 'Computer Science', 88, 1, 2),
(16, 'BCS', 'Computer Science', 100, 1, 3),
(17, 'BCS', 'Computer Science', 55, 1, 4),
(18, 'BCT', 'Computer Science', 44, 1, 1),
(19, 'BCT', 'Computer Science', 30, 1, 2),
(20, 'BCT', 'Computer Science', 22, 1, 3),
(21, 'BCT', 'Computer Science', 60, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserveId` int(11) NOT NULL,
  `RoomReserved` varchar(55) DEFAULT NULL,
  `res_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `finish_time` time DEFAULT NULL,
  `lecturer` varchar(55) DEFAULT NULL,
  `email` varchar(95) DEFAULT NULL,
  `results` varchar(95) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`reserveId`, `RoomReserved`, `res_date`, `start_time`, `finish_time`, `lecturer`, `email`, `results`) VALUES
(96, 'Lab 3', '2022-05-06', '11:30:00', '13:30:00', 'John', 'johnndavi2019@gmail.com', 'Accepted'),
(97, 'Lab 1', '2022-05-13', '15:44:00', '15:43:00', 'Thuo', 'joshuathuo4@gmail.com', 'Accepted'),
(98, 'Lab 1', '2022-05-17', '15:48:00', '15:46:00', 'Mary', 'apondiashley2@gmail.com', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semId` int(11) NOT NULL,
  `semester1` varchar(10) DEFAULT NULL,
  `semester2` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semId`, `semester1`, `semester2`) VALUES
(2, '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `email` varchar(500) DEFAULT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  `Program` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `firstName`, `email`, `Pass`, `Program`) VALUES
(31, 'Joshua', 'joshuathuo4@gmail.com', 'bf18,Pp6', 'BCT 4.1'),
(32, 'Ashley', 'apondiashley2@gmail.com', 'ACH20ayo', 'BCT 3.1'),
(33, 'Chaun', 'evansloktari@students.must.ac.ke', 'Chaun1234', 'BCT 2.1'),
(34, 'Lodoctor', 'evanschaun2@gmail.com', 'Lodoctor1234', 'BCS 4.1'),
(35, 'John', 'johnndavi2019@gmail.com', 'John1234', 'BCS 1.1');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `ID` int(11) NOT NULL,
  `department` varchar(20) NOT NULL,
  `courseCode` varchar(10) DEFAULT NULL,
  `lecturer` varchar(55) NOT NULL,
  `Program` varchar(50) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `finish_time` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `daysOfTheWeek` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`ID`, `department`, `courseCode`, `lecturer`, `Program`, `start_time`, `finish_time`, `room`, `daysOfTheWeek`) VALUES
(92, 'Information Technolo', 'CCS 3200', 'Simon', 'BCT 4.1', '08:00:00', '11:00:00', 'Lab 1', 'Monday'),
(93, 'Information Technolo', 'CIT 3291', 'Mary', 'BCT 3.1', '08:00:00', '11:00:00', 'Lab 20', 'Monday'),
(94, 'Information Technolo', 'CIT 3250 ', 'John', 'BCT 3.1', '11:00:00', '14:00:00', 'Lab 10', 'Monday'),
(95, 'Information Technolo', '', 'Thuo', 'BCT 3.1', '08:00:00', '11:00:00', 'Lab 17', 'Tuesday'),
(96, 'Information Technolo', '', '', 'BCT 3.1', '08:00:00', '11:00:00', '', 'Wednesday'),
(97, 'Information Technolo', 'CIT 3201', 'Simon', 'BCT 3.1', '08:00:00', '11:00:00', 'Lab 17', 'Thursday'),
(98, 'Information Technolo', 'CIT 3250 ', 'Mary', 'BCT 3.1', '08:00:00', '11:00:00', 'Lab 3', 'Friday'),
(99, 'Information Technolo', '', '', 'BCT 3.1', '11:00:00', '14:00:00', '', 'Friday'),
(100, 'Information Technolo', 'CIT 3250 ', 'John', 'BCT 3.1', '14:00:00', '16:00:00', 'Lab 2', 'Monday'),
(103, 'Information Technolo', 'CCS 3302', 'Simon', 'BCT 3.1', '14:00:00', '16:00:00', 'Lab 1', 'Friday'),
(104, 'Information Technolo', 'CIT 3151', 'Mary', 'BCT 3.1', '11:00:00', '14:00:00', 'Lab 17', 'Tuesday'),
(105, 'Information Technolo', '', '', 'BCT 3.1', '14:00:00', '16:00:00', '', 'Tuesday'),
(107, 'Information Technolo', 'CIT 3201', 'Simon', 'BCT 3.1', '11:00:00', '14:00:00', 'Lab 17', 'Wednesday'),
(108, 'Information Technolo', 'CIT 3153 ', 'Thuo', 'BCT 3.1', '14:00:00', '16:00:00', 'Lab 10', 'Wednesday'),
(109, 'Information Technolo', 'CIT 3154', '', 'BCT 3.1', '11:00:00', '14:00:00', 'Lab 11', 'Thursday'),
(110, 'Information Technolo', '', '', 'BCT 3.1', '14:00:00', '16:00:00', '', 'Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `yearofstudy`
--

CREATE TABLE `yearofstudy` (
  `yearId` int(11) NOT NULL,
  `yrOfStudy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yearofstudy`
--

INSERT INTO `yearofstudy` (`yearId`, `yrOfStudy`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin1`
--
ALTER TABLE `admin1`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `coursestudy`
--
ALTER TABLE `coursestudy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID`),
  ADD KEY `faculty_to_department` (`fk_facultyID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyID`);

--
-- Indexes for table `lab_room`
--
ALTER TABLE `lab_room`
  ADD UNIQUE KEY `room_id` (`room_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`noteId`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD UNIQUE KEY `period_id` (`period_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD UNIQUE KEY `prog_id` (`prog_id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`reserveId`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `yearofstudy`
--
ALTER TABLE `yearofstudy`
  ADD PRIMARY KEY (`yearId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin1`
--
ALTER TABLE `admin1`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coursestudy`
--
ALTER TABLE `coursestudy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `facultyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lab_room`
--
ALTER TABLE `lab_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `noteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `period`
--
ALTER TABLE `period`
  MODIFY `period_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `reserveId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `yearofstudy`
--
ALTER TABLE `yearofstudy`
  MODIFY `yearId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `faculty_to_department` FOREIGN KEY (`fk_facultyID`) REFERENCES `faculty` (`facultyID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
