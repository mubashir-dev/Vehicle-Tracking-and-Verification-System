-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2020 at 07:58 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vv_and_tracking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `bus_number` varchar(200) NOT NULL,
  `bus_model` varchar(200) NOT NULL,
  `bus_tag_number` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_number`, `bus_model`, `bus_tag_number`, `driver_id`) VALUES
(1, 'EP-31231', 'Hino 2000', 1, 4),
(2, 'EP-31232', 'Hino 4000', 2, 1),
(3, 'EDP123', 'Toyota Hillix E33-T', 9, 3),
(6, 'EDP124', 'Ghazi3r', 7, 2),
(7, 'ED-006-P', 'Hino E4-PPF', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `bus_location`
--

CREATE TABLE `bus_location` (
  `loc_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `loc_alt` int(11) NOT NULL,
  `loc_lang` int(11) NOT NULL,
  `date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `dept_id`) VALUES
(1, 'BS Islamic Studies', 1),
(2, 'BS MATENATICS', 2),
(3, 'BS COMPUTER SCIENCE', 3),
(4, 'BS SOFTWARE ENGINEERING', 3),
(5, 'BS ACCOUTING AND FINANCE', 5),
(6, 'BS ECONOMICS', 1),
(7, 'BS Telecom And Networking', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Computer Science'),
(2, 'Islam Studies'),
(3, 'Management Studies'),
(4, 'Economics'),
(5, 'Medical Lab Technology'),
(6, 'Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(200) NOT NULL,
  `driver_contact` varchar(200) NOT NULL,
  `driver_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `driver_contact`, `driver_address`) VALUES
(1, 'Junaid AHmed', '44444444444', 'Abbottabad'),
(2, 'Jaffar Hussain', '77777777777', 'Hafizabad Punjab'),
(3, 'Abullah AHmed', '11111111111', 'khanpur Dam'),
(4, 'Yasir Malik', '3123131331', 'Mansehra'),
(5, 'Asad Ahmed', '03312345678', 'Abbottabad'),
(6, 'Habib Malik', '03332345789', 'Wah Cantt'),
(7, 'Kamran Saghair', '03332345678', 'Rawalpindi Punjab'),
(8, 'Kamran Saghair', '03332345678', 'Rawalpindi Punjab'),
(9, 'Saqlian Ayub', '03334467891', 'Dangi Pump Jaheri Kass District Haripur');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_no` varchar(200) NOT NULL,
  `faculty_name` varchar(200) NOT NULL,
  `faculty_cnic` varchar(200) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `faculty_contact` varchar(200) NOT NULL,
  `faculty_address` varchar(200) NOT NULL,
  `fee_data_link` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_no`, `faculty_name`, `faculty_cnic`, `dept_id`, `bus_id`, `route_id`, `faculty_contact`, `faculty_address`, `fee_data_link`, `status`) VALUES
(1, 'EE-22-IT-UOH/2020', 'Sardar Mubashir Ali', '92348923849', 1, 2, 2, '92348239148', 'Abbottabad', 1, 0),
(2, 'EE-32-IT-UOH', 'Ayesha Reham', '92348923833', 1, 2, 1, '92348239148dd', 'Abbottabad', 1, 0),
(3, '2312-22EE', 'Mehmood Ahmed', 'SADASJDK', 1, 2, 2, '12345678901', 'Havelian Abbottabad', 1, 0),
(4, 'IT-22-UOH', 'Kashif Malik', 'SADASJDK', 1, 1, 2, '03112345600', 'Havelian Abbottabad', 1, 0),
(6, 'IT-22-UOH', 'Muhammad Junaid', 'SADASJDK', 3, 2, 2, '03112345600', 'Abbottabad', 1, 0),
(7, '13131-EE', 'Umair Hussain', 'SADASJDK99', 1, 2, 1, '00213123188', 'Abbottabad', 1, 0),
(8, 'IT-22-11-UOH', 'Touseeq Ahmed Shah', '898989898999999', 3, 1, 2, '21312312377', 'Haripur', 1, 0),
(9, 'AGR-00-UOH/2020', 'Dr Mohiz Ahmed', '1330232493533', 1, 2, 1, '00044432024', 'Abbottabad', 1, 0),
(10, 'IT-22-V-UOH/2020', 'Asma Riaz', '1330232493587', 1, 2, 1, '03334467890', 'Havelian', 1, 0),
(11, 'ISl-2233', 'Sayyeda Habiba', '3719319831938', 2, 2, 2, '03332345678', 'Telephone Industry of Pakistan Colony Haripur ', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_fee`
--

CREATE TABLE `faculty_fee` (
  `fee_id` int(11) NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `fee_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_fee`
--

INSERT INTO `faculty_fee` (`fee_id`, `fee_amount`, `faculty_id`, `fee_date`, `status`) VALUES
(1, 12000, 1, '2020-03-17', 1),
(2, 12000, 2, '2020-03-18', 1),
(3, 12000, 3, '0000-00-00', 0),
(4, 12000, 4, '0000-00-00', 0),
(5, 12000, 6, '0000-00-00', 0),
(6, 12000, 7, '0000-00-00', 0),
(7, 12000, 8, '0000-00-00', 0),
(8, 12000, 9, '2020-03-18', 1),
(9, 12000, 10, '2020-03-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_status`
--

CREATE TABLE `faculty_status` (
  `status_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_status`
--

INSERT INTO `faculty_status` (`status_id`, `faculty_id`, `status`, `date`) VALUES
(1, 1, 1, '2020-03-18'),
(2, 2, 1, '2020-03-18'),
(3, 3, 1, '2020-03-18'),
(4, 4, 1, '2020-03-18'),
(5, 6, 1, '2020-03-18'),
(6, 7, 1, '2020-03-18'),
(7, 8, 1, '2020-03-18'),
(8, 9, 1, '2020-03-18'),
(9, 10, 1, '2020-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `fee_id` int(11) NOT NULL,
  `fee_amount` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fee_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`fee_id`, `fee_amount`, `student_id`, `fee_date`, `status`) VALUES
(1, 12000, 1, '2020-09-21', 1),
(2, 12000, 8, '2020-07-29', 1),
(3, 12000, 10, '2020-07-29', 1),
(4, 12000, 20, '2020-09-14', 1),
(5, 12000, 21, '2020-09-21', 1),
(6, 12000, 23, '0000-00-00', 0),
(7, 12000, 24, '0000-00-00', 0),
(8, 12000, 25, '0000-00-00', 0),
(9, 12000, 26, '0000-00-00', 0),
(10, 12000, 27, '2020-03-17', 1),
(11, 12000, 28, '0000-00-00', 0),
(12, 12000, 30, '0000-00-00', 0),
(13, 12000, 31, '0000-00-00', 0),
(14, 12000, 32, '0000-00-00', 0),
(15, 12000, 33, '0000-00-00', 0),
(16, 12000, 34, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fingerprint`
--

CREATE TABLE `fingerprint` (
  `fingerprint_id` int(11) NOT NULL,
  `fingerprint_sign` blob NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `password_hash` varchar(256) NOT NULL,
  `salt` varchar(256) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `route_name` varchar(200) NOT NULL,
  `route_charges` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `route_name`, `route_charges`, `bus_id`) VALUES
(1, 'UOH to Abbottabad', 12000, 1),
(2, 'UOH to Wah Cantt', 18000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_level`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `student_id`, `status`, `date`) VALUES
(1, 1, 1, '2020-03-17'),
(2, 8, 1, '2020-03-17'),
(3, 10, 1, '2020-03-17'),
(4, 20, 1, '2020-03-17'),
(5, 21, 1, '2020-03-17'),
(6, 23, 1, '2020-03-17'),
(7, 24, 1, '2020-03-17'),
(8, 25, 1, '2020-03-17'),
(9, 26, 1, '2020-03-17'),
(10, 27, 1, '2020-03-17'),
(11, 28, 1, '2020-03-17'),
(12, 30, 1, '2020-03-17'),
(13, 31, 1, '2020-03-17'),
(14, 32, 1, '2020-03-17'),
(15, 33, 1, '2020-03-17'),
(16, 34, 1, '2020-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_reg_no` varchar(200) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `student_contact` varchar(150) NOT NULL,
  `route_id` int(11) NOT NULL,
  `student_address` varchar(200) NOT NULL,
  `fee_data_link` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_reg_no`, `student_name`, `bus_id`, `course_id`, `semester_id`, `dept_id`, `student_contact`, `route_id`, `student_address`, `fee_data_link`) VALUES
(1, 'F12-011', 'Umair Hussain Khan', 2, 2, 8, 1, '04444444444444444', 2, 'Wah Cantt ', 1),
(8, 'F13-001', 'Malik Majid', 1, 1, 6, 2, '30493204902', 2, 'Wah Cantt', 1),
(10, 'F11-099', 'Mohsin Ahmed', 2, 3, 7, 1, '984192481914', 2, 'Khalabat TownShip Haripur', 1),
(20, 'F20-112', 'Omer Malik', 2, 5, 6, 3, '9429482934', 1, 'Abbottabad', 1),
(21, '', 'Habiba Khan', 2, 3, 8, 1, '92348239148', 2, 'Wah Cantt Punjab Pakistan', 1),
(23, '', 'Mujeeb Ch', 2, 3, 6, 1, '03333456789', 1, 'Abbottabad', 1),
(24, '', 'Ahmed Mohib', 2, 4, 5, 1, '03334467890', 1, 'Abbottaaabadsakdlaskdl;sakdsla', 1),
(25, '', 'Aftab Khan', 2, 4, 8, 1, '03334467890', 1, 'jkjkjkjjjjjjjjjjj', 1),
(26, '', 'Fahad Malik', 2, 3, 2, 1, '92348239148', 2, 'Abbottabad Nawansher ', 1),
(27, '', 'Abdullah Hussain Ali', 1, 2, 6, 1, '92348239148', 2, 'Abbottabad', 1),
(28, '', 'Shoaib Ahmed', 2, 4, 2, 1, '034345678990', 1, 'Abbottabad', 1),
(30, '', 'Mubashir', 2, 4, 8, 1, '03332345678', 1, 'Abbottabad', 1),
(31, '', 'Habib Jalib', 2, 3, 2, 1, '3332323', 2, 'Abbottabad', 1),
(32, 'F13-022', 'Abdullah Malik', 1, 1, 2, 2, '489328492384', 2, '1', 1),
(33, 'Amit Patel', 'Samit Patel', 2, 1, 2, 2, '03333456789', 2, '1', 1),
(34, 'F13-00', 'Muhammad Perviz', 1, 1, 2, 2, '03334467890', 2, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `user_type`, `user_password`, `user_email`) VALUES
(16, 'moiz', 'moiz Ahmed', 'Admin', '$2y$10$lwzwIHy8ZTW9uIulmlts..lXsui8ixf16ixPjePQ1xTkTkiItu/TS', 'moiz@gmail.com'),
(17, 'umair', 'umair hussain', 'Admin', '$2y$10$w4.B6WPmZGwFdNXoJoAth.QlEpiJauCkZVmTp.4gSa3pGc9SStymK', 'umair1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `bus_location`
--
ALTER TABLE `bus_location`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `route_id` (`route_id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `faculty_fee`
--
ALTER TABLE `faculty_fee`
  ADD PRIMARY KEY (`fee_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `faculty_status`
--
ALTER TABLE `faculty_status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`fee_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `fingerprint`
--
ALTER TABLE `fingerprint`
  ADD PRIMARY KEY (`fingerprint_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`),
  ADD KEY `route_ibfk_1` (`bus_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `statudent_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bus_location`
--
ALTER TABLE `bus_location`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faculty_fee`
--
ALTER TABLE `faculty_fee`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faculty_status`
--
ALTER TABLE `faculty_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fingerprint`
--
ALTER TABLE `fingerprint`
  MODIFY `fingerprint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `faculty_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`),
  ADD CONSTRAINT `faculty_ibfk_3` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`);

--
-- Constraints for table `faculty_fee`
--
ALTER TABLE `faculty_fee`
  ADD CONSTRAINT `faculty_fee_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `faculty_status`
--
ALTER TABLE `faculty_status`
  ADD CONSTRAINT `faculty_status_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `fee_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `fingerprint`
--
ALTER TABLE `fingerprint`
  ADD CONSTRAINT `fingerprint_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `student_ibfk_4` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`),
  ADD CONSTRAINT `student_ibfk_5` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
