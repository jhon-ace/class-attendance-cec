-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 05:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance-final`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `instructor_attendance_log_id` int(11) NOT NULL,
  `user_school_id` varchar(222) NOT NULL,
  `attendance_status` int(11) NOT NULL,
  `attendance_logs_date` datetime NOT NULL,
  `status` varchar(222) NOT NULL,
  `fvf` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`instructor_attendance_log_id`, `user_school_id`, `attendance_status`, `attendance_logs_date`, `status`, `fvf`) VALUES
(1, 'FA 051797 060119', 0, '2023-01-26 13:25:57', 'absent', ''),
(2, 'FA 051797 060119', 0, '2023-01-25 05:09:39', 'absent', 'r');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_report`
--

CREATE TABLE `attendance_report` (
  `attendance_id` int(11) NOT NULL,
  `faculty_school_id` varchar(255) NOT NULL,
  `school_year` varchar(222) NOT NULL,
  `semester_type` varchar(222) NOT NULL,
  `fullcourse_name` varchar(255) NOT NULL,
  `faculty_course_schedule_in` time NOT NULL,
  `faculty_course_schedule_out` time NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `stud_lastname` varchar(255) NOT NULL,
  `stud_firstname` varchar(255) NOT NULL,
  `attendance_check` int(11) NOT NULL,
  `date_attended` date NOT NULL DEFAULT current_timestamp(),
  `student_qr_login_time` time NOT NULL,
  `student_login_time_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_report`
--

INSERT INTO `attendance_report` (`attendance_id`, `faculty_school_id`, `school_year`, `semester_type`, `fullcourse_name`, `faculty_course_schedule_in`, `faculty_course_schedule_out`, `school_id`, `stud_lastname`, `stud_firstname`, `attendance_check`, `date_attended`, `student_qr_login_time`, `student_login_time_status`) VALUES
(1, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Iyoy', 'Christian Dave', 1, '2023-02-06', '11:45:30', 'On time Attendance'),
(2, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '343535', 'Florentino', 'John Christian', 0, '2023-02-06', '11:45:33', 'Absent'),
(3, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '343253', 'Canama', 'Amiel John', 1, '2023-02-09', '11:58:07', 'Absent'),
(4, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Iyoy', 'Christian Dave', 1, '2023-02-10', '12:12:06', 'Late Attendance'),
(5, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Iyoy', 'Christian Dave', 1, '2023-02-11', '11:57:40', 'Late Attendance'),
(18, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Christian Dave', 'Christian Dave', 1, '2023-02-10', '22:38:41', 'On time attendance'),
(19, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Iyoy', 'Christian Dave', 1, '2023-02-10', '22:56:01', 'On time attendance'),
(20, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Iyoy', 'Christian Dave', 0, '2023-02-10', '00:00:00', 'On time attendance'),
(21, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Iyoy', 'Christian Dave', 0, '2023-02-10', '11:19:27', 'On time attendance'),
(22, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Iyoy', 'Christian Dave', 1, '2023-02-10', '11:20:00', 'On time attendance'),
(23, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Iyoy', 'Christian Dave', 1, '2023-02-10', '11:24:36', 'On time attendance'),
(24, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Iyoy', 'Christian Dave', 1, '2023-02-10', '11:30:41', 'On time attendance'),
(25, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Iyoy', 'Christian Dave', 1, '2023-02-10', '00:00:00', 'On time attendance'),
(26, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Iyoy', 'Christian Dave', 1, '2023-02-10', '11:48:06', 'On time attendance'),
(27, 'FA 110697 090522', '2223', 'Second', 'ITE311 Web Programming 2 III-IT A (TTh 02:30:00 PM 04:00:00 PM AH202)', '02:30:00', '04:00:00', '1451-6742', 'Iyoy', 'Christian Dave', 1, '2023-02-10', '11:55:55', 'On time attendance');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_department` varchar(222) NOT NULL,
  `course_program` varchar(255) NOT NULL,
  `course_code` varchar(222) NOT NULL,
  `course_name` varchar(222) NOT NULL,
  `course_schedule` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `instructor_id_no` varchar(222) NOT NULL,
  `instructor_name` varchar(222) NOT NULL,
  `year_Level` varchar(222) NOT NULL,
  `semester` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_department`, `course_program`, `course_code`, `course_name`, `course_schedule`, `instructor_id_no`, `instructor_name`, `year_Level`, `semester`) VALUES
(1, 'CSD', 'Bachelor of Science in Information Technology', 'GE105', 'Mathematics in the Modern World', '2023-01-19 03:00:09', 'FA 110697 061719', 'Cyrel Balantocas', 'First Year', 'First'),
(2, 'CSD', 'Bachelor of Science in Information Technology', 'GE110', 'Kontekswalisadong Komunikasyon sa Pilipino', '2023-01-09 02:59:44', 'FA 110697 061719', 'Cyrel Balantocas', 'First Year', 'First'),
(3, 'CSD', 'Bachelor of Science in Information Technology', 'IC101', 'College Orientation and Integrated Skills', '2023-01-19 03:21:09', 'FA 110697 061719', 'Cyrel Balantocas', 'First Year', 'First'),
(4, 'CSD', 'Bachelor of Science in Information Technology', 'GE101', 'Purposive Communication', '2023-01-19 04:24:47', 'FA 110697 061719', 'Cyrel Balantocas', 'First Year', 'Second'),
(5, 'CSD', 'Bachelor of Science in Information Technology', 'GE113FIL', 'Sinesosyedad/Pelikulang Panlipunan', '2023-01-19 04:27:28', 'FA 110697 061719', 'Cyrel Balantocas', 'First Year', 'Second'),
(6, 'CSD', 'Bachelor of Science in Information Technology', 'ITE121', 'Introduction to Human Computer Interaction', '2023-01-19 04:31:07', 'FA 110697 061719', 'Cyrel Balantocas', 'First Year', 'Second'),
(7, 'CSD', 'Bachelor of Science in Information Technology', 'GE102', 'Understanding the Self', '2023-01-19 04:32:25', 'FA 110697 061719', 'Cyrel Balantocas', 'Second Year', 'First'),
(8, 'CSD', 'Bachelor of Science in Information Technology', 'GE106', 'The Contemporary World', '2023-01-19 04:33:55', 'FA 110697 061719', 'Cyrel Balantocas', 'Second Year', 'First'),
(9, 'CSD', 'Bachelor of Science in Information Technology', 'IC106', 'College Algebra', '2023-01-19 04:35:22', 'FA 110697 061719', 'Cyrel Balantocas', 'Second Year', 'First'),
(10, 'CSD', 'Bachelor of Science in Information Technology', 'GE107', 'Art Appreciation', '2023-01-19 04:36:50', 'FA 110697 061719', 'Cyrel Balantocas', 'Second Year', 'Second'),
(11, 'CSD', 'Bachelor of Science in Information Technology', 'ITE221', 'Information Management', '2023-01-19 04:38:18', 'FA 110696 061719', 'Cyrel Balantocas', 'Second Year', 'Second'),
(12, 'CSD', 'Bachelor of Science in Information Technology', 'ITE222', 'Discrete Mathematics', '2023-01-19 04:39:18', 'FA 110696 061719', 'Cyrel Balantocas', 'Second Year', 'Second'),
(13, 'CSD', 'Bachelor of Science in Information Technology', 'ITE111', 'Introduction to Computing', '2023-01-26 14:57:57', '', '', 'First Year', 'First'),
(14, 'CSD', 'Bachelor of Science in Information Technology', 'ITE112', 'Programming 1: Fundamentals of Programming', '2023-01-26 14:58:09', '', '', 'First Year', 'First'),
(15, 'CSD', 'Bachelor of Science in Information Technology', 'ITE113', 'Computer Applications and Internet Essentials', '2023-01-26 15:00:24', '', '', 'First Year', 'First'),
(16, 'CSD', 'Bachelor of Science in Information Technology', 'ITE114', 'System Analysis and Design', '2023-01-26 15:00:29', '', '', 'First Year', 'First'),
(17, 'CSD', 'Bachelor of Science in Information Technology', 'KB', 'Fundamentals of Keyboarding', '2023-01-26 15:03:43', '', '', 'First Year', 'First'),
(18, 'CSD', 'Bachelor of Science in Information Technology', 'NSTP 1', 'National Service Training Program 1', '2023-01-26 15:03:45', '', '', 'First Year', 'First'),
(19, 'CSD', 'Bachelor of Science in Information Technology', 'PE-1', 'Physical Activities and Fitness 1', '2023-01-26 15:03:48', '', '', 'First Year', 'First'),
(20, 'CSD', 'Bachelor of Science in Information Technology', 'ITE122', 'Programming 2: Intermediate Programming', '2023-01-26 15:10:19', '', '', 'First Year', 'Second'),
(21, 'CSD', 'Bachelor of Science in Information Technology', 'ITE123', 'Mathematics for Computing', '2023-01-26 15:10:21', '', '', 'First Year', 'Second'),
(22, 'CSD', 'Bachelor of Science in Information Technology', 'ITE124', 'Web Programming 1', '2023-01-26 15:10:24', '', '', 'First Year', 'Second'),
(23, 'CSD', 'Bachelor of Science in Information Technology', 'ITE125', 'Basic PC Troubleshooting', '2023-01-26 15:10:27', '', '', 'First Year', 'Second'),
(24, 'CSD', 'Bachelor of Science in Information Technology', 'NSTP 2', 'National Service Training Program 2', '2023-01-26 15:10:30', '', '', 'First Year', 'Second'),
(25, 'CSD', 'Bachelor of Science in Information Technology', 'PE-2', 'Physical Activities and Fitness 2', '2023-01-26 15:10:32', '', '', 'First Year', 'Second'),
(26, 'CSD', 'Bachelor of Science in Information Technology', 'ITE211', 'Data Structure and Algorithms', '2023-01-26 15:16:40', '', '', 'Second Year', 'First'),
(27, 'CSD', 'Bachelor of Science in Information Technology', 'ITE212', 'Object-Oriented Programming', '2023-01-26 15:16:42', '', '', 'Second Year', 'First'),
(28, 'CSD', 'Bachelor of Science in Information Technology', 'ITE213', 'Logic Design', '2023-01-26 15:16:45', '', '', 'Second Year', 'First'),
(29, 'CSD', 'Bachelor of Science in Information Technology', 'ITE214', 'Platform Technologies', '2023-01-26 15:16:47', '', '', 'Second Year', 'First'),
(30, 'CSD', 'Bachelor of Science in Information Technology', 'PE-3', 'Physical Activities and Fitness 3', '2023-01-26 15:16:49', '', '', 'Second Year', 'First'),
(31, 'CSD', 'Bachelor of Science in Information Technology', 'ITE223', 'Structured Query Language', '2023-01-26 15:22:13', '', '', 'Second Year', 'Second'),
(32, 'CSD', 'Bachelor of Science in Information Technology', 'ITE224', 'Networking 1', '2023-01-26 15:22:19', '', '', 'Second Year', 'Second'),
(33, 'CSD', 'Bachelor of Science in Information Technology', 'ITE225', 'Advanced Database Systems', '2023-01-26 15:22:20', '', '', 'Second Year', 'Second'),
(34, 'CSD', 'Bachelor of Science in Information Technology', 'LIT 1', 'Survey on Philippine Literature', '2023-01-26 15:22:22', '', '', 'Second Year', 'Second'),
(35, 'CSD', 'Bachelor of Science in Information Technology', 'PE-4', 'Physical Activities and Fitness 4', '2023-01-26 15:22:24', '', '', 'Second Year', 'Second'),
(36, 'CSD', 'Bachelor of Science in Information Technology', 'GE 103', 'Readings in Philippine History', '2023-01-26 15:30:45', '', '', 'Third Year', 'First'),
(37, 'CSD', 'Bachelor of Science in Information Technology', 'GE 104', 'Science, Technology, and Society (IT)', '2023-01-26 15:30:48', '', '', 'Third Year', 'First'),
(38, 'CSD', 'Bachelor of Science in Information Technology', 'ITE311', 'Web Programming 2', '2023-01-26 15:30:51', '', '', 'Third Year', 'First'),
(39, 'CSD', 'Bachelor of Science in Information Technology', 'ITE312', 'Integrative Programming and Technology', '2023-01-26 15:30:58', '', '', 'Third Year', 'First'),
(40, 'CSD', 'Bachelor of Science in Information Technology', 'ITE313', 'Networking 2', '2023-01-26 15:31:00', '', '', 'Third Year', 'First'),
(41, 'CSD', 'Bachelor of Science in Information Technology', 'ITE314', 'Multimedia 1: Realistic Concepts of Animation and Special Effects', '2023-01-26 15:31:02', '', '', 'Third Year', 'First'),
(42, 'CSD', 'Bachelor of Science in Information Technology', 'ITE315', 'Digital Art Photography', '2023-01-26 15:31:04', '', '', 'Third Year', 'First'),
(43, 'CSD', 'Bachelor of Science in Information Technology', 'ITE316', 'Script Writing and Storyboard Designing', '2023-01-26 15:31:07', '', '', 'Third Year', 'First'),
(44, 'CSD', 'Bachelor of Science in Information Technology', 'GE 108', 'Life and Works of Rizal', '2023-01-26 15:37:42', '', '', 'Third Year', 'Second'),
(45, 'CSD', 'Bachelor of Science in Information Technology', 'IC 103', 'Applied Statistics', '2023-01-26 15:37:45', '', '', 'Third Year', 'Second'),
(46, 'CSD', 'Bachelor of Science in Information Technology', 'ITE321', 'System Administration and Maintenance', '2023-01-26 15:37:47', '', '', 'Third Year', 'Second'),
(47, 'CSD', 'Bachelor of Science in Information Technology', 'ITE322', 'Systems Integration and Architecture 1', '2023-01-26 15:37:50', '', '', 'Third Year', 'Second'),
(48, 'CSD', 'Bachelor of Science in Information Technology', 'ITE323', 'Even Driven Programming', '2023-01-26 15:37:52', '', '', 'Third Year', 'Second'),
(49, 'CSD', 'Bachelor of Science in Information Technology', 'ITE324', 'Digital Imaging', '2023-01-26 15:37:54', '', '', 'Third Year', 'Second'),
(50, 'CSD', 'Bachelor of Science in Information Technology', 'ITE325', 'Multimedia 2: Audio and Video Production', '2023-01-26 15:37:57', '', '', 'Third Year', 'Second'),
(51, 'CSD', 'Bachelor of Science in Information Technology', 'CAP101', 'Capstone Project 1', '2023-01-26 15:41:56', '', '', 'Third Year', 'Summer'),
(52, 'CSD', 'Bachelor of Science in Information Technology', 'ITE331', 'Information Assurance and Security 1', '2023-01-26 15:41:58', '', '', 'Third Year', 'Summer'),
(53, 'CSD', 'Bachelor of Science in Information Technology', 'ITE332', 'Quantitative Methods', '2023-01-26 15:42:00', '', '', 'Third Year', 'Summer'),
(54, 'CSD', 'Bachelor of Science in Information Technology', 'CAP102', 'Capstone Project 2', '2023-01-26 15:48:33', '', '', 'Fourth Year', 'First'),
(55, 'CSD', 'Bachelor of Science in Information Technology', 'GE 109', 'Ethics ', '2023-01-26 15:48:35', '', '', 'Fourth Year', 'First'),
(56, 'CSD', 'Bachelor of Science in Information Technology', 'ITE411', 'Information Assurance and Security 2', '2023-01-26 15:48:37', '', '', 'Fourth Year', 'First'),
(57, 'CSD', 'Bachelor of Science in Information Technology', 'ITE412', 'Computer Graphics', '2023-01-26 15:48:39', '', '', 'Fourth Year', 'First'),
(58, 'CSD', 'Bachelor of Science in Information Technology', 'ITE413', 'Application Development and Emerging Technologies', '2023-01-26 15:48:42', '', '', 'Fourth Year', 'First'),
(59, 'CSD', 'Bachelor of Science in Information Technology', 'ITE414', 'Computer Animation: Introduction and Advanced 3D', '2023-01-26 15:48:45', '', '', 'Fourth Year', 'First'),
(60, 'CSD', 'Bachelor of Science in Information Technology', 'ITE415', 'Web Production (Multimedia Website)', '2023-01-26 15:48:47', '', '', 'Fourth Year', 'First'),
(61, 'CSD', 'Bachelor of Science in Information Technology', 'ITE416', 'Social and Professional Issues', '2023-01-26 15:48:50', '', '', 'Fourth Year', 'First'),
(62, 'CSD', 'Bachelor of Science in Information Technology', 'PRAC101', 'Practicum', '2023-01-26 15:50:41', '', '', 'Fourth Year', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_class_list`
--

CREATE TABLE `faculty_class_list` (
  `fclass_list_id` int(11) NOT NULL,
  `faculty_school_id` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `faculty_course_section` varchar(255) NOT NULL,
  `school_id` varchar(222) NOT NULL,
  `stud_lastname` varchar(222) NOT NULL,
  `stud_firstname` varchar(222) NOT NULL,
  `stud_year` varchar(222) NOT NULL,
  `stud_semester` varchar(222) NOT NULL,
  `faculty_course_schedule_date` varchar(255) NOT NULL,
  `faculty_course_schedule_in` time NOT NULL DEFAULT current_timestamp(),
  `faculty_course_schedule_dateType_in` varchar(255) NOT NULL,
  `faculty_course_schedule_out` time NOT NULL DEFAULT current_timestamp(),
  `faculty_course_schedule_dateType_out` varchar(255) NOT NULL,
  `faculty_course_assigned_room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_class_list`
--

INSERT INTO `faculty_class_list` (`fclass_list_id`, `faculty_school_id`, `course_code`, `course_name`, `faculty_course_section`, `school_id`, `stud_lastname`, `stud_firstname`, `stud_year`, `stud_semester`, `faculty_course_schedule_date`, `faculty_course_schedule_in`, `faculty_course_schedule_dateType_in`, `faculty_course_schedule_out`, `faculty_course_schedule_dateType_out`, `faculty_course_assigned_room`) VALUES
(1, 'FA 110697 090522', 'ITE311', 'Web Programming 2', 'III-IT A', '1451-6742', 'Iyoy', 'Christian Dave', 'Third Year', 'Second', 'TTh', '02:30:00', 'PM', '04:00:00', 'PM', 'AH202'),
(3, 'FA 110697 090522', 'ITE311', 'Web Programming 2', 'III-IT A', '343253', 'Canama', 'Amiel John', 'Third Year', 'Second', 'TTh', '02:30:00', 'PM', '04:00:00', 'PM', 'AH202');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_load`
--

CREATE TABLE `faculty_load` (
  `faculty_load_id` int(11) NOT NULL,
  `faculty_school_id` varchar(222) NOT NULL,
  `faculty_load_school_year` varchar(255) NOT NULL,
  `faculty_load_semester` varchar(255) NOT NULL,
  `faculty_course_code` varchar(222) NOT NULL,
  `faculty_course_name` varchar(222) NOT NULL,
  `faculty_course_section` varchar(255) NOT NULL,
  `faculty_course_unit` int(11) NOT NULL,
  `faculty_course_schedule_in` time NOT NULL DEFAULT current_timestamp(),
  `faculty_course_schedule_out` time NOT NULL,
  `faculty_course_schedule_date` varchar(255) NOT NULL,
  `faculty_course_schedule_dateType_in` varchar(255) NOT NULL,
  `faculty_course_schedule_dateType_out` varchar(255) NOT NULL,
  `faculty_course_assigned_room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_load`
--

INSERT INTO `faculty_load` (`faculty_load_id`, `faculty_school_id`, `faculty_load_school_year`, `faculty_load_semester`, `faculty_course_code`, `faculty_course_name`, `faculty_course_section`, `faculty_course_unit`, `faculty_course_schedule_in`, `faculty_course_schedule_out`, `faculty_course_schedule_date`, `faculty_course_schedule_dateType_in`, `faculty_course_schedule_dateType_out`, `faculty_course_assigned_room`) VALUES
(1, 'FA 110697 090522', '2223', 'Second', 'ITE124', 'Web Programming 1', 'I-IT A | 2ND 25', 3, '01:00:00', '02:30:00', 'MW', 'PM', 'PM', 'NH201'),
(2, 'FA 110697 090522', '2223', 'Second', 'ITE122', 'Programming 2: Intermediate Programming', 'I-IT A | 1ST 25', 3, '02:30:00', '04:00:00', 'MW', 'PM', 'PM', 'NH201'),
(3, 'FA 110697 090522', '2223', 'Second', 'IT415', 'Web Production (Multimedia Website)', 'IV-IT A', 3, '10:00:00', '11:30:00', 'MW', 'AM', 'AM', 'AH202'),
(4, 'FA 110697 090522', '2223', 'Second', 'ITE311', 'Web Programming 2', 'III-IT A', 3, '02:30:00', '04:00:00', 'TTh', 'PM', 'PM', 'AH202'),
(5, 'FA 051797 060119', '2223', 'Second', 'ITE112', 'Netwarking', 'II-A', 3, '11:00:00', '05:00:00', 'TTh', 'AMPM', 'PM', 'AH205'),
(6, 'FA 110697 090522', '2223', 'Second', 'ITE122', 'Programming 2: Intermediate Programming', 'I-IT B', 3, '04:00:00', '05:30:00', 'MW', 'PM', 'PM', 'NH201'),
(7, 'FA 110697 090522', '2223', 'Second', 'ITE122', 'Programming 2: Intermediate Programming', 'I-IT A | 2ND 25', 3, '07:30:00', '09:00:00', 'TTh', 'AM', 'AM', 'NH201'),
(8, 'FA 110697 090522', '2223', 'Second', 'ITE124', 'Web Programming 1', 'I-IT A | 1ST 25', 3, '09:00:00', '10:30:00', 'TTh', 'AM', 'AM', 'NH201'),
(9, 'FA 110697 090522', '2223', 'Second', 'ITE124', 'Web Programming 1', 'I-IT B', 3, '10:30:00', '12:00:00', 'TTh', 'AM', 'NN', 'NH201');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reports_id` int(11) NOT NULL,
  `reports_name` varchar(222) NOT NULL,
  `reports_file` varchar(222) NOT NULL,
  `reports_latitude` varchar(222) NOT NULL,
  `reports_longitude` varchar(222) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reports_id`, `reports_name`, `reports_file`, `reports_latitude`, `reports_longitude`, `status`) VALUES
(1, 'reports no. 1', 'images/ac.jpg', '9.5884236909694', '123.77200277432', 1),
(2, 'reports no. 1', 'images/WIN_20221124_01_56_49_Pro.jpg', '9.618748', '123.86544', 1),
(3, 'reports no. 1', 'images/WIN_20221127_18_28_06_Pro.jpg', '9.5884253545806', '123.77203343917', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `schoolyear_ID` int(20) NOT NULL,
  `school_year` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`schoolyear_ID`, `school_year`) VALUES
(1, '2223'),
(2, '2324'),
(3, '2425'),
(4, '2526'),
(5, '2627');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester_type` varchar(222) NOT NULL,
  `semester_d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_type`, `semester_d`) VALUES
(1, 'First', 0),
(2, 'Second', 0),
(3, 'Summer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stud_id` int(11) NOT NULL,
  `school_id` varchar(222) NOT NULL,
  `stud_firstname` varchar(222) NOT NULL,
  `stud_lastname` varchar(222) NOT NULL,
  `stud_schoolyear` int(11) NOT NULL,
  `stud_year` varchar(222) NOT NULL,
  `stud_semester` varchar(5000) NOT NULL,
  `stud_program` varchar(222) NOT NULL,
  `stud_department` varchar(222) NOT NULL,
  `stud_image` varchar(222) NOT NULL,
  `stud_qrcode` varchar(222) NOT NULL,
  `stud_coursecode` varchar(5000) NOT NULL,
  `stud_coursename` varchar(255) NOT NULL,
  `stud_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stud_id`, `school_id`, `stud_firstname`, `stud_lastname`, `stud_schoolyear`, `stud_year`, `stud_semester`, `stud_program`, `stud_department`, `stud_image`, `stud_qrcode`, `stud_coursecode`, `stud_coursename`, `stud_status`) VALUES
(1, '0517-3922', 'AJ', 'Sumngat', 2223, 'Fourth Year', 'Second', 'BSIT', 'CSD', 'images/aces.jpg', '343423231356565', '', '', 'Enrolled'),
(2, '201910299', 'Mariz', 'Bagcatin', 2223, 'Third Year', 'Second', 'BSIT', 'CSD', 'images/cec_logo.png', '343434324241242343', '', '', 'Enrolled'),
(3, '201910223', 'Daniel', 'Acero', 2223, 'Second Year', 'Second', 'BSIT', 'CSD', 'images/acero_daniel.jpg', '343434', '', '', 'Enrolled'),
(4, '0416-3769', 'Rona Rose', 'Dalagon', 2223, 'First Year', 'Second', 'BSIT', 'CSD', 'images/csd_logo.png', '232323', '', '', 'Enrolled'),
(13, '1451-6742', 'Christian Dave', 'Iyoy', 2223, 'Third Year', 'Second', 'BSIT', 'CSD', 'images/user.png', 'scddcd', '', '', 'Enrolled'),
(14, '343253', 'Amiel John', 'Canama', 2223, 'Third Year', 'Second', 'BSIT', 'CSD', 'images/user.png', 'edd32', '', '', 'Enrolled'),
(15, '343535', 'John Christian', 'Florentino', 2223, 'Third Year', 'Second', 'BSIT', 'CSD', 'images/user.png', '3rdes', '', '', 'Enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `user_school_id` varchar(222) NOT NULL,
  `user_schoolyear` int(11) NOT NULL,
  `semester` varchar(222) NOT NULL,
  `user_lastname` varchar(222) NOT NULL,
  `user_firstname` varchar(222) NOT NULL,
  `user_department` varchar(222) NOT NULL,
  `user_qrcode` varchar(222) NOT NULL,
  `user_image` varchar(222) NOT NULL,
  `user_type` varchar(222) NOT NULL,
  `user_status` varchar(222) NOT NULL,
  `user_login_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `user_school_id`, `user_schoolyear`, `semester`, `user_lastname`, `user_firstname`, `user_department`, `user_qrcode`, `user_image`, `user_type`, `user_status`, `user_login_password`) VALUES
(1, '1234', 346, '0', 'Administrator', 'Administrator', 'Administration', 'gufdj3', 'images/aces.jpg', 'Administrator', 'Active', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'FA 051797 060119', 2223, 'Second', 'Balantocas', 'Cyrel', 'CSD', 'edcdsd23', 'images/instructor_cyrel.jpg', 'Instructor', 'Active', '5598404b9f47e949e32e725f8b0681dd'),
(3, 'Dean', 2223, '0', 'Cuizon', 'Michael Spike', 'CSD', 'rff44543', 'images/instructor_spike.jpg', 'Dean', 'Active', 'c4ca4238a0b923820dcc509a6f75849b'),
(4, '2', 2223, '0', 'guidance', 'guidance', 'Human Resource', '343r', 'images/user.png', 'Guidance ', 'Active', 'c81e728d9d4c2f636f067f89cc14862c'),
(5, 'FA 110697 061719', 2324, 'First', 'Casabuena', 'Jhon Ace', 'CSD', 'dh43ef', 'images/instructor_ace.jpg', 'Instructor', 'Active', '445a89bd8373e6dcefa8658ce781970e'),
(6, 'FA 110697 090522', 2223, 'Second', 'Casabuena', 'Jhon Ace', 'CSD', 'images/qr/acecasabuenaqr.webp', 'images/instructor_ace.jpg', 'Instructor', 'Active', '445a89bd8373e6dcefa8658ce781970e'),
(7, 'FA 1234', 2223, 'Second', 'Dabalos', 'Debra Lee', 'CSD', 'images/qr/debradabalosqr.webp', 'images/instructor_debra.jpg', 'Instructor', 'Active', 'c9096f8da13ccc311808a767810ae5d1'),
(9, 'FA 12345', 2223, 'Second', 'De Erio', 'Sir De Erio', 'CSD', 'images/qr/deerioqr.webp', 'images/instructor_deerio.jpg', 'Instructor', 'Active', 'f9f8a81877a6c88d34d45ab7ce8a986b');

-- --------------------------------------------------------

--
-- Table structure for table `yearlevel`
--

CREATE TABLE `yearlevel` (
  `yearlevel_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yearlevel`
--

INSERT INTO `yearlevel` (`yearlevel_id`, `year`) VALUES
(1, 'First Year'),
(2, 'Second Year'),
(3, 'Third Year'),
(4, 'Fourth Year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`instructor_attendance_log_id`);

--
-- Indexes for table `attendance_report`
--
ALTER TABLE `attendance_report`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `faculty_school_id` (`faculty_school_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `attendance_report_ibfk_1` (`school_year`),
  ADD KEY `attendance_report_ibfk_2` (`semester_type`),
  ADD KEY `attendance_report_ibfk_3` (`faculty_course_schedule_in`),
  ADD KEY `attendance_report_ibfk_4` (`faculty_course_schedule_out`),
  ADD KEY `attendance_report_ibfk_5` (`stud_firstname`),
  ADD KEY `stud_lastname` (`stud_lastname`) USING BTREE;

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `course_name` (`course_name`);

--
-- Indexes for table `faculty_class_list`
--
ALTER TABLE `faculty_class_list`
  ADD PRIMARY KEY (`fclass_list_id`),
  ADD KEY `faculty_school_id` (`faculty_school_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `course_name` (`course_name`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `stud_lastname` (`stud_lastname`),
  ADD KEY `stud_firstname` (`stud_firstname`),
  ADD KEY `stud_semester` (`stud_semester`),
  ADD KEY `stud_year` (`stud_year`),
  ADD KEY `faculty_course_schedule_date` (`faculty_course_schedule_date`),
  ADD KEY `faculty_course_schedule_in` (`faculty_course_schedule_in`),
  ADD KEY `faculty_course_schedule_dateType_in` (`faculty_course_schedule_dateType_in`),
  ADD KEY `faculty_course_schedule_out` (`faculty_course_schedule_out`),
  ADD KEY `faculty_course_schedule_dateType_out` (`faculty_course_schedule_dateType_out`),
  ADD KEY `faculty_course_assigned_room` (`faculty_course_assigned_room`),
  ADD KEY `faculty_course_section` (`faculty_course_section`);

--
-- Indexes for table `faculty_load`
--
ALTER TABLE `faculty_load`
  ADD PRIMARY KEY (`faculty_load_id`),
  ADD KEY `faculty_school_id` (`faculty_school_id`),
  ADD KEY `faculty_course_code` (`faculty_course_code`),
  ADD KEY `faculty_course_name` (`faculty_course_name`),
  ADD KEY `faculty_course_section` (`faculty_course_section`),
  ADD KEY `faculty_course_schedule_date` (`faculty_course_schedule_date`),
  ADD KEY `faculty_course_schedule_in` (`faculty_course_schedule_in`),
  ADD KEY `faculty_course_schedule_dateType_in` (`faculty_course_schedule_dateType_in`),
  ADD KEY `faculty_course_schedule_out` (`faculty_course_schedule_out`),
  ADD KEY `faculty_course_schedule_dateType_out` (`faculty_course_schedule_dateType_out`),
  ADD KEY `faculty_course_assigned_room` (`faculty_course_assigned_room`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reports_id`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`schoolyear_ID`),
  ADD KEY `school_year` (`school_year`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`),
  ADD KEY `semester_type` (`semester_type`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `stud_lastname` (`stud_lastname`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `stud_firstname` (`stud_firstname`),
  ADD KEY `school_id_2` (`school_id`),
  ADD KEY `stud_year` (`stud_year`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `instructor_id_no` (`user_school_id`),
  ADD UNIQUE KEY `u_id` (`u_id`);

--
-- Indexes for table `yearlevel`
--
ALTER TABLE `yearlevel`
  ADD PRIMARY KEY (`yearlevel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `instructor_attendance_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance_report`
--
ALTER TABLE `attendance_report`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `faculty_class_list`
--
ALTER TABLE `faculty_class_list`
  MODIFY `fclass_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty_load`
--
ALTER TABLE `faculty_load`
  MODIFY `faculty_load_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reports_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `schoolyear_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `yearlevel`
--
ALTER TABLE `yearlevel`
  MODIFY `yearlevel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_report`
--
ALTER TABLE `attendance_report`
  ADD CONSTRAINT `attendance_report_ibfk_1` FOREIGN KEY (`school_year`) REFERENCES `schoolyear` (`school_year`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `attendance_report_ibfk_2` FOREIGN KEY (`semester_type`) REFERENCES `semester` (`semester_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `attendance_report_ibfk_3` FOREIGN KEY (`faculty_course_schedule_in`) REFERENCES `faculty_load` (`faculty_course_schedule_in`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `attendance_report_ibfk_4` FOREIGN KEY (`faculty_course_schedule_out`) REFERENCES `faculty_load` (`faculty_course_schedule_out`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `attendance_report_ibfk_5` FOREIGN KEY (`stud_firstname`) REFERENCES `students` (`stud_firstname`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `attendance_report_ibfk_7` FOREIGN KEY (`faculty_school_id`) REFERENCES `faculty_load` (`faculty_school_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `attendance_report_ibfk_8` FOREIGN KEY (`school_id`) REFERENCES `students` (`school_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `attendance_report_ibfk_9` FOREIGN KEY (`stud_lastname`) REFERENCES `students` (`stud_lastname`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `faculty_class_list`
--
ALTER TABLE `faculty_class_list`
  ADD CONSTRAINT `faculty_class_list_ibfk_1` FOREIGN KEY (`faculty_school_id`) REFERENCES `faculty_load` (`faculty_school_id`),
  ADD CONSTRAINT `faculty_class_list_ibfk_10` FOREIGN KEY (`faculty_course_schedule_date`) REFERENCES `faculty_load` (`faculty_course_schedule_date`),
  ADD CONSTRAINT `faculty_class_list_ibfk_11` FOREIGN KEY (`faculty_course_schedule_in`) REFERENCES `faculty_load` (`faculty_course_schedule_in`),
  ADD CONSTRAINT `faculty_class_list_ibfk_12` FOREIGN KEY (`faculty_course_schedule_dateType_in`) REFERENCES `faculty_load` (`faculty_course_schedule_dateType_in`),
  ADD CONSTRAINT `faculty_class_list_ibfk_13` FOREIGN KEY (`faculty_course_schedule_out`) REFERENCES `faculty_load` (`faculty_course_schedule_out`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `faculty_class_list_ibfk_14` FOREIGN KEY (`faculty_course_schedule_dateType_out`) REFERENCES `faculty_load` (`faculty_course_schedule_dateType_out`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `faculty_class_list_ibfk_15` FOREIGN KEY (`faculty_course_assigned_room`) REFERENCES `faculty_load` (`faculty_course_assigned_room`),
  ADD CONSTRAINT `faculty_class_list_ibfk_16` FOREIGN KEY (`faculty_course_section`) REFERENCES `faculty_load` (`faculty_course_section`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `faculty_class_list_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`),
  ADD CONSTRAINT `faculty_class_list_ibfk_3` FOREIGN KEY (`course_name`) REFERENCES `course` (`course_name`),
  ADD CONSTRAINT `faculty_class_list_ibfk_4` FOREIGN KEY (`school_id`) REFERENCES `students` (`school_id`),
  ADD CONSTRAINT `faculty_class_list_ibfk_5` FOREIGN KEY (`stud_lastname`) REFERENCES `students` (`stud_lastname`),
  ADD CONSTRAINT `faculty_class_list_ibfk_6` FOREIGN KEY (`stud_firstname`) REFERENCES `students` (`stud_firstname`),
  ADD CONSTRAINT `faculty_class_list_ibfk_7` FOREIGN KEY (`stud_semester`) REFERENCES `semester` (`semester_type`),
  ADD CONSTRAINT `faculty_class_list_ibfk_8` FOREIGN KEY (`stud_year`) REFERENCES `students` (`stud_year`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
