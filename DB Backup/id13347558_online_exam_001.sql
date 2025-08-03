-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2021 at 06:43 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13347558_online_exam_001`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `name`, `password`) VALUES
('U1000', 'Administrator', 'xyz12345');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `duration` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `name`, `duration`, `description`, `file`) VALUES
('C1001', '', '', '', ''),
('C1002', 'Java', '1 Months 5 Hours', 'kbfjkbbkbkjbkbksadas sdlas hdlasdlasdas dlsadjals hello  hello  hello  hello  hello  hello  hellojlasjdasdowjdjalskjdoiwjalskdnalsxioiawcxnalskcnwiondcslZKcnowiskcndcneoidhlskxcnoidc sdcdscewfdfsdfsdgfsg', 'C1002.pdf'),
('C1003', 'PHP', '3 Months 0 Hours', 'hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world hello world ', 'C1003.pdf'),
('C1004', 'C++', '1 Months 0 Hours', 'a lot of programmings', '');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `e_id` varchar(50) NOT NULL,
  `e_date` varchar(50) NOT NULL,
  `e_slot` varchar(50) NOT NULL,
  `st_id` varchar(50) NOT NULL,
  `c_id` varchar(50) NOT NULL,
  `p_type` varchar(50) NOT NULL,
  `p_set` varchar(50) NOT NULL,
  `activation code` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`e_id`, `e_date`, `e_slot`, `st_id`, `c_id`, `p_type`, `p_set`, `activation code`, `status`) VALUES
('E1001', '18-04-2020', '00-23', 'ST1001', 'C1002', 'ONLINE', 'P1002A', '2owjM', 'COMPLETE'),
('E1002', '18-04-2020', '00-23', 'ST1003', 'C1003', 'OFFLINE', 'P1003A', 'd7vpD', 'COMPLETE');

-- --------------------------------------------------------

--
-- Table structure for table `exam_sl`
--

CREATE TABLE `exam_sl` (
  `slot_no` varchar(50) NOT NULL,
  `f_time` varchar(50) NOT NULL,
  `t_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_sl`
--

INSERT INTO `exam_sl` (`slot_no`, `f_time`, `t_time`) VALUES
('1', '8', '10'),
('2', '14', '17'),
('3', '13', '18'),
('4', '19', '23'),
('5', '0', '23');

-- --------------------------------------------------------

--
-- Table structure for table `paper_set`
--

CREATE TABLE `paper_set` (
  `p_id` varchar(100) NOT NULL,
  `c_id` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper_set`
--

INSERT INTO `paper_set` (`p_id`, `c_id`, `type`, `status`) VALUES
('P1002A', 'C1002', 'ONLINE', 'COMPLETE'),
('P1002B', 'C1002', 'OFFLINE', 'COMPLETE'),
('P1003A', 'C1003', 'OFFLINE', 'COMPLETE'),
('P1004A', 'C1004', 'ONLINE', 'COMPLETE'),
('P1004B', 'C1004', 'ONLINE', 'COMPLETE'),
('P1004D', 'C1004', 'ONLINE', 'INCOMPLETE');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `st_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`st_id`, `password`, `type`, `email`) VALUES
('ST1001', '123xyz', 'STUDENT', 'xyz123@gmail.com'),
('ST1003', 'pass', 'STUDENT', 'xyz@email.com'),
('U1000', 'xyz123', 'ADMIN', 'soumya.shome99@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `p_off`
--

CREATE TABLE `p_off` (
  `p_id` varchar(100) NOT NULL,
  `c_id` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tot_marks` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_off`
--

INSERT INTO `p_off` (`p_id`, `c_id`, `file`, `tot_marks`, `time`) VALUES
('P1002B', 'C1002', 'P1002B.pdf', '15', '30'),
('P1003A', 'C1003', 'P1003A.pdf', '50', '120');

-- --------------------------------------------------------

--
-- Table structure for table `p_on`
--

CREATE TABLE `p_on` (
  `p_id` varchar(100) NOT NULL,
  `c_id` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `no_of_q` varchar(50) NOT NULL,
  `ne_marks` varchar(50) NOT NULL,
  `tot_marks` varchar(100) NOT NULL,
  `p_q_marks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_on`
--

INSERT INTO `p_on` (`p_id`, `c_id`, `time`, `no_of_q`, `ne_marks`, `tot_marks`, `p_q_marks`) VALUES
('P1002A', 'C1002', '15', '5', '0', '15', '3'),
('P1004A', 'C1004', '4', '3', '1', '6', '2'),
('P1004B', 'C1004', '5', '2', '0', '2', '1'),
('P1004D', 'C1004', '3', '3', '1', '6', '2');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `p_id` varchar(100) NOT NULL,
  `q_no` varchar(11) NOT NULL,
  `ques` text NOT NULL,
  `op1` text NOT NULL,
  `op2` text NOT NULL,
  `op3` text NOT NULL,
  `op4` text NOT NULL,
  `c_opt` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`p_id`, `q_no`, `ques`, `op1`, `op2`, `op3`, `op4`, `c_opt`) VALUES
('P1002A', '1', 'why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why why ', 'OP1', 'OP2', 'OP3', 'OP4', '2'),
('P1002A', '2', 'Hello Hello Hello Hello Hello Hello Hello Hello ', '1', '3', '8', '5', '3'),
('P1002A', '3', 'TEST TEST TEST TEST ', '0', '6', '2', '4', '4'),
('P1002A', '4', 'qwer wew we wewe w ew we we we ', '1', '3', '4', '2', '4'),
('P1002A', '5', 'Start Exam?', 'YES', 'NO', '.', '.', '1'),
('P1004B', '1', 'QUESTION 1', 'op1', 'op3', 'op2', 'op4', '2'),
('P1004B', '2', 'QUESTION 2', '4', '2', '1', '3', '3'),
('P1004A', '1', 'Q!1111', '1', '2', '3', '4', '2'),
('P1004A', '2', 'QP2', '4', '3', '2', '1', '1'),
('P1004A', '3', 'OP3', '4', '5', '8', '9', '4');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `e_id` varchar(50) NOT NULL,
  `st_id` varchar(50) NOT NULL,
  `tot_q` varchar(50) NOT NULL,
  `tot_a_q` varchar(50) NOT NULL,
  `tot_w_q` varchar(50) NOT NULL,
  `tot_r_q` varchar(50) NOT NULL,
  `marks` varchar(50) NOT NULL,
  `n_marks` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `percentage` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`e_id`, `st_id`, `tot_q`, `tot_a_q`, `tot_w_q`, `tot_r_q`, `marks`, `n_marks`, `grade`, `percentage`, `status`) VALUES
('E1001', 'ST1001', '5', '5', '1', '4', '12', '0', 'B', '80', 'Pass'),
('E1002', 'ST1003', '-', '-', '-', '-', '-', '-', 'B', '70', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(50) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `email` varchar(400) NOT NULL,
  `ph_no` varchar(20) NOT NULL,
  `ph_no_2` varchar(15) NOT NULL,
  `d_o_a` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `f_name`, `l_name`, `gender`, `email`, `ph_no`, `ph_no_2`, `d_o_a`) VALUES
('ST1001', 'Student1', '1', 'M', 'xyz123@gmail.com', '1234567890', '0123456789', '21-01-2020'),
('ST1002', '', '', '', '', '', '', ''),
('ST1003', 'Soumyadeep', 'Shome', 'M', 'xyz@email.com', '789456123', '321654789', '01-05-2019');

-- --------------------------------------------------------

--
-- Table structure for table `st_course`
--

CREATE TABLE `st_course` (
  `st_id` varchar(50) NOT NULL,
  `c_id` varchar(50) NOT NULL,
  `d_o_c` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_course`
--

INSERT INTO `st_course` (`st_id`, `c_id`, `d_o_c`, `status`) VALUES
('ST1001', 'C1002', '03-04-2020', 'EXAM'),
('ST1003', 'C1003', '05-04-2020', 'EXAM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `exam_sl`
--
ALTER TABLE `exam_sl`
  ADD PRIMARY KEY (`slot_no`);

--
-- Indexes for table `paper_set`
--
ALTER TABLE `paper_set`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`st_id`),
  ADD KEY `st_id` (`st_id`),
  ADD KEY `st_id_2` (`st_id`);

--
-- Indexes for table `p_off`
--
ALTER TABLE `p_off`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `p_on`
--
ALTER TABLE `p_on`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `e_id_2` (`e_id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
