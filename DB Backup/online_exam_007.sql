-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2020 at 06:47 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam_007`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `Course Id` varchar(10) NOT NULL,
  `Course Name` varchar(30) NOT NULL,
  PRIMARY KEY (`Course Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course Id`, `Course Name`) VALUES
('C1001', 'Core Java'),
('C1002', 'Advance Java'),
('C1003', 'ASP.NET'),
('C1004', 'PHP & MYSQL'),
('C1005', 'TALLY');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE IF NOT EXISTS `exam` (
  `Exam Code` varchar(10) NOT NULL,
  `Exam Date` varchar(20) NOT NULL,
  `Exam Slot` varchar(10) NOT NULL,
  `Machine No.` varchar(50) NOT NULL,
  `Student Id` varchar(20) NOT NULL,
  `Course Id` varchar(20) NOT NULL,
  `Paper Code` varchar(20) NOT NULL,
  `Activation No.` varchar(20) NOT NULL,
  `Exam Status` varchar(20) NOT NULL,
  PRIMARY KEY (`Exam Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`Exam Code`, `Exam Date`, `Exam Slot`, `Machine No.`, `Student Id`, `Course Id`, `Paper Code`, `Activation No.`, `Exam Status`) VALUES
('E1001', '2019-12-30', 'M', 'M1', 'ST1001', 'C1001', 'P1001A', '', 'Complete'),
('E1002', '2020-01-03', 'M', 'M1', 'ST1001', 'C1005', 'P1005A', '', 'Incomplete'),
('E1003', '2020-01-05', 'A', 'M4', 'ST1002', 'C1002', 'P1002B', 'hVO8e', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

DROP TABLE IF EXISTS `machine`;
CREATE TABLE IF NOT EXISTS `machine` (
  `Machine No.` varchar(5) NOT NULL,
  PRIMARY KEY (`Machine No.`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`Machine No.`) VALUES
('M1'),
('M2'),
('M3'),
('M4'),
('M5');

-- --------------------------------------------------------

--
-- Table structure for table `machine_allotment`
--

DROP TABLE IF EXISTS `machine_allotment`;
CREATE TABLE IF NOT EXISTS `machine_allotment` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `EXAM_DATE` date NOT NULL,
  `EXAM_ALOT` varchar(20) NOT NULL,
  `MAC_NO` varchar(10) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machine_allotment`
--

INSERT INTO `machine_allotment` (`no`, `EXAM_DATE`, `EXAM_ALOT`, `MAC_NO`) VALUES
(6, '2019-11-17', 'A', 'M3'),
(7, '2019-11-23', 'M', 'M1'),
(8, '2019-11-21', 'A', 'M2'),
(9, '2019-11-26', 'A', 'M3'),
(10, '2019-11-29', 'A', 'M2'),
(11, '2019-12-25', 'M', 'M1'),
(15, '2020-01-04', 'M', 'M1'),
(20, '2020-01-18', 'A', 'M1'),
(21, '2020-01-08', 'M', 'M1'),
(22, '2020-01-04', 'M', 'M2'),
(23, '2020-01-03', 'M', 'M1'),
(24, '2020-01-05', 'M', 'M1'),
(25, '2020-01-05', 'M', 'M2'),
(26, '2020-01-05', 'M', 'M3'),
(27, '2020-01-05', 'M', 'M4');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

DROP TABLE IF EXISTS `paper`;
CREATE TABLE IF NOT EXISTS `paper` (
  `P_CODE` varchar(10) NOT NULL,
  `P_NAME` varchar(20) NOT NULL,
  `P_Set` int(4) NOT NULL,
  `C_ID` varchar(10) NOT NULL,
  `TIME_LIMIT` int(3) NOT NULL,
  `NO_OF_QUES` int(11) NOT NULL,
  `NEG_MARKS_COUNT` int(11) NOT NULL,
  PRIMARY KEY (`P_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`P_CODE`, `P_NAME`, `P_Set`, `C_ID`, `TIME_LIMIT`, `NO_OF_QUES`, `NEG_MARKS_COUNT`) VALUES
('P1001A', 'Core Java', 1, 'C1001', 2, 2, 0),
('P1001B', 'Core Java', 2, 'C1001', 2, 2, 0),
('P1001C', 'Core Java', 3, 'C1001', 2, 2, 0),
('P1002A', 'Advance Java', 1, 'C1002', 2, 2, 0),
('P1002B', 'Advance Java', 2, 'C1002', 2, 2, 0),
('P1002C', 'Advance Java', 3, 'C1002', 2, 3, 0),
('P1003A', 'ASP.NET', 1, 'C1003', 2, 2, 0),
('P1003B', 'ASP.NET', 2, 'C1003', 2, 2, 0),
('P1003C', 'ASP.NET', 3, 'C1003', 2, 2, 0),
('P1003D', 'ASP.NET', 4, 'C1003', 3, 2, 0),
('P1004A', 'PHP & MYSQL', 1, 'C1004', 2, 2, 0),
('P1004B', 'PHP & MYSQL', 2, 'C1004', 2, 2, 0),
('P1004C', 'PHP & MYSQL', 3, 'C1004', 2, 2, 0),
('P1005A', 'Tally', 1, 'C1005', 2, 2, 0),
('P1005B', 'Tally', 2, 'C1005', 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `USER_ID` varchar(8) NOT NULL,
  `PASSWORD` varchar(40) NOT NULL,
  `USER_TYPE` varchar(10) NOT NULL,
  `STATUS` int(11) NOT NULL,
  `HINT QUESTION` varchar(50) NOT NULL,
  `HINT ANSWER` varchar(30) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`USER_ID`, `PASSWORD`, `USER_TYPE`, `STATUS`, `HINT QUESTION`, `HINT ANSWER`) VALUES
('ST1001', '', 'STUDENT', 0, 'What is your nick name?', ''),
('ST1002', '', 'STUDENT', 0, 'he', 'llo'),
('ST1003', '101', 'STUDENT', 0, 'worl', 'd'),
('ST1004', 'hello', 'STUDENT', 0, 'world', 'world'),
('U1000', '', 'ADMIN', 1, 'What is your nick name?', '');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `Q.No.` int(4) NOT NULL,
  `Question` varchar(1000) NOT NULL,
  `Option1` varchar(20) NOT NULL,
  `Option2` varchar(20) NOT NULL,
  `Option3` varchar(20) NOT NULL,
  `Option4` varchar(20) NOT NULL,
  `Correct Answer` varchar(20) NOT NULL,
  `Paper Code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Q.No.`, `Question`, `Option1`, `Option2`, `Option3`, `Option4`, `Correct Answer`, `Paper Code`) VALUES
(1, 'Which one of the following is true about Java byte', 'Platform Independent', 'Platform Dependent', 'Cannot Say', 'None Of The Above', 'Option1', 'P1001A'),
(2, 'JVM provides definitions for what?', 'Instruction Set', 'Class file format', 'Garbage-collected he', 'All of the above', 'Option4', 'P1001A'),
(1, 'The Class Loader is responsible for which one of t', 'Compiling files', 'Executing files', 'Preventing spoofing', 'None Of The Above', 'Option3', 'P1002A'),
(2, 'Which one of the following is true about jdk ?', 'Platform Independent', 'Platform Dependent', 'Both of the options ', 'Depends upon the pro', 'Option2', 'P1002A'),
(1, 'JVM provides definitions for what ?', 'Instruction set', 'Class file format ', 'Garbage-collected he', 'All of the above', 'Option4 ', 'P1001B'),
(2, 'Which one of the following is true about Java byte', 'Platform Independent', 'Platform Dependent', 'Cannot Say', 'None Of The Above', 'Option1', 'P1001B'),
(1, 'Which one of the following is true about jdk ?', 'Platform Independent', 'Platform Dependent', 'Both options 1 & 2', 'Depends upon the pro', 'Option2', 'P1002B'),
(2, 'The Class Loader is responsible for which of the f', 'Compiling files', 'Executing files', 'Preventing spoofing', 'None Of The Above', 'Option3', 'P1002B'),
(1, 'What is the default time of session variables in A', '15 mins', '25 mins', '20 mins', '10 mins', 'Option3', 'P1003A'),
(2, 'Which operator is used to concatenate in ASP ?', '+', '.', '-', '/', 'Option1', 'P1003A'),
(1, 'Which operator is used to concatenate in ASP ?', '+', '.', '-', '/', 'Option1', 'P1003B'),
(2, 'what is the default time of session variables in A', '15 mins', '25 mins', '20 mins', '10 mins', 'Option3', 'P1003B'),
(1, 'PHP script should start with ?', ' < php >', '<?php', '<?>', 'php?>', 'Option2', 'P1004A'),
(2, 'PHP files have a default file extension of __ ?', '.html', '.php', '.xml', '.ph', 'Option 2', 'P1004A'),
(1, 'PHP files have a default file extension of __?', '.html', '.php', '.xml', '.ph', 'Option2', 'P1004B'),
(2, 'PHP script should start with ?', '< php >', '<?php', '<?>', 'php?>', 'Option2', 'P1004B'),
(1, 'What is used while exporting ledgers from Tally to', 'HTML Format', 'SDF Format', 'XML Format ', 'ASCII Format', 'Option1', 'P1005A'),
(2, 'What is Tally vault ?', 'Security Mechanism', 'Ledger a/c', 'Cost Category', 'None Of The Above', 'Option1', 'P1005A'),
(1, 'What is Tally vault ?', 'Security Mechanism', 'Ledger a/c', 'Cost Category', 'None Of The Above', 'Option1', 'P1005B'),
(2, 'What is used while exporting ledgers from Tally to', 'HTML Format', 'SDF Format', 'XML Format', 'ASCII Format', 'Option1', 'P1005B'),
(1, 'hello', '1', '2', '3', '4', 'Option2', 'P1001C'),
(1, 'th', '1', '2', '3', '4', 'Option3', 'P1004C'),
(2, 'we', '1', '2', '3', '4', 'Option1', 'P1004C'),
(1, 'qw', '1', '23', '4', '5', 'Option1', 'P1003D');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `Exam Code` varchar(10) NOT NULL,
  `Student Id` varchar(10) NOT NULL,
  `Total no, of questions` varchar(10) NOT NULL,
  `No. of attempts` int(10) NOT NULL,
  `No. of wrong answers` int(10) NOT NULL,
  `No. of correct answers` int(10) NOT NULL,
  `Negative Marks` int(10) NOT NULL,
  `Percentage` int(10) NOT NULL,
  `GRADE` varchar(2) NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`Exam Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`Exam Code`, `Student Id`, `Total no, of questions`, `No. of attempts`, `No. of wrong answers`, `No. of correct answers`, `Negative Marks`, `Percentage`, `GRADE`, `Status`) VALUES
('E1001', 'ST1001', '2', 2, 2, 0, 0, 0, '', 'Fail'),
('E1003', 'ST1002', '2', 2, 0, 2, 0, 100, 'A', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `ST_ID` varchar(10) NOT NULL,
  `ST_NAME` varchar(20) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PH_NO` varchar(15) NOT NULL,
  `C_ID` varchar(10) NOT NULL,
  `STATUS` varchar(15) NOT NULL,
  PRIMARY KEY (`ST_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ST_ID`, `ST_NAME`, `EMAIL`, `PH_NO`, `C_ID`, `STATUS`) VALUES
('ST1001', 'Shreyasi Ghose', 'shreyasighose@gmail.com', '9903408260', 'C1001', 'REGULAR'),
('ST1002', 'Ayan Kishore', 'ayan962@gmail.com', '8617237051', 'C1002', 'REGULAR'),
('ST1003', 'Soumyadeep Shome', 'soumyadeepshome99@gmail.com', '9883812211', 'C1003', 'REGULAR'),
('ST1004', 'Gargi Roy', 'gargiroy@gmail.com', '9836568917', 'C1004', 'COMPLETED'),
('ST1005', 'Sukanya Chakraborty', 'sukanya564chakraborty@gmail.co', '9875642371', 'C1005', 'REGULAR'),
('ST1006', 'Rohit Paul', 'rohitcr@gmail.com', '9832145978', 'C1005', 'COMPLETED'),
('U1000', 'Administrator', 'skar568@gmail.com', '9874123450', '', 'COMPLETED');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
