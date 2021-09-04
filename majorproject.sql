-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 08:48 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majorproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(7, 'shuvam', '$2y$10$pevqR/KBLvMJ614HJaUax.szVYcqaPfyZQj6zD9owHcYJt4V2PKsu');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `subject_id`, `chapter_name`) VALUES
(12, '9', 'Constructor'),
(13, '9', 'Overloading'),
(14, '9', 'Encription'),
(15, '9', 'Data Abstruction'),
(16, '10', 'Balance sheet'),
(17, '10', 'Savings Account'),
(18, '10', 'Fixed Account'),
(19, '10', 'Trial Balance'),
(20, '12', 'Network Layer'),
(21, '9', 'Binding'),
(22, '13', 'String Handling');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `faculty_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty_name`, `faculty_username`, `password`) VALUES
(2, 'SUBRATA SAHA', 'subratadaha12345', '$2y$10$orOvLHl7azTs54Xc3zKE7Ol5B/5UYAeBhDXSHLK.ppVZ8kL.uBGUu'),
(3, 'SUMAN DAS', 'sumon', '$2y$10$M5RukDF63o..MI8hRv4E6ueTnPWMyCXHpjJasOx4SRCZuC8Q2moSO'),
(4, 'SHUVAM DUTTA', 'shuvamdutta', '$2y$10$rODj4i4bejWppfmDFJHk0epLojSbpWuEy5qQjms5H/RsGKfAz7iSa'),
(5, 'ANIK PATRO', 'anikpatro123456', '$2y$10$mBWAcv5KtmkOFtIxvq5mm.qJ4eeLhjUJZSH3sV5ArZT5UJatfV.kK'),
(9, 'ARNOB BAG', 'Arnob', '$2y$10$fnJvgpG0FF8znrhyuNkWUehl5LWNKFU40FuQwqn7Xrz0/ZT1vvwCu');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2020_03_04_150100_create_faculties_table', 1),
(3, '2020_03_05_135843_create_streams_table', 1),
(4, '2020_03_05_145817_create_students_table', 1),
(5, '2020_03_07_155130_create_subjects_table', 1),
(6, '2020_03_19_135708_create_chapters_table', 2),
(8, '2020_03_23_081122_create_admins_table', 3),
(9, '2014_10_12_000000_create_users_table', 4),
(10, '2020_06_05_105708_create_questions_table', 5),
(11, '2020_06_09_144031_create_tests_table', 6),
(12, '2020_06_14_183010_create_results_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stream_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_a` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_b` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_c` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_d` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `stream_id`, `subject_id`, `chapter_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(9, '13', '12', '20', 'The network layer is concerned with __________ of data.', 'bits', 'packets', 'frames', 'bytes', 'packets'),
(10, '13', '12', '20', 'Which one of the following is not a function of network layer?', 'routing', 'congestion control', 'inter-networking', 'error control', 'error control'),
(12, '13', '12', '20', '&nbsp;In virtual circuit network each packet contains ___________', 'full source and destination address', 'only source address', 'a short VC number', 'only destination address', 'a short VC number'),
(13, '13', '12', '20', 'Which of the following routing algorithms can be used for network layer design?', 'shortest path algorithm', 'link state routing', 'distance vector routing', 'all of the mentioned', 'all of the mentioned'),
(15, '13', '12', '20', 'ICMP is primarily used for __________', 'error and diagnostic functions', 'forwarding', 'addressing', 'routing', 'error and diagnostic functions'),
(16, '13', '12', '20', 'The network layer protocol for internet is __________', 'ethernet', 'hypertext transfer protocol', 'internet protocol', 'file transfer protocol', 'internet protocol'),
(17, '13', '12', '20', 'Which one of the following algorithm is not used for congestion control?', 'traffic aware routing', 'admission control', 'load shedding', 'routing information protocol', 'routing information protocol'),
(18, '13', '12', '20', 'A subset of a network that includes all the routers but contains no loops is called ________', 'spanning tree', 'spider structure', 'special tree', 'spider tree', 'spanning tree'),
(19, '13', '12', '20', 'Which of the following is not correct in relation to multi-destination routing?', 'is same as broadcast routing', 'data is not sent by packets', 'contains the list of all destinations', 'there are multiple receivers', 'data is not sent by packets'),
(20, '13', '12', '20', 'A 4 byte IP address consists of __________', 'only network address', 'only host address', 'network address and host address', 'network address & MAC address', 'network address and host address'),
(21, '13', '13', '22', 'Which of these class is superclass of String and StringBuffer class?', 'java.util', 'java.lang', 'ArrayList', 'None of the mentioned', 'java.lang'),
(22, '13', '13', '22', 'Which of these operators can be used to concatenate two or more String objects?', '+', '&&', '+=', '||', '+'),
(23, '13', '13', '22', 'Which of this method of class String is used to obtain a length of String object?', 'get()', 'lengthof()', 'Sizeof()', 'length()', 'length()'),
(24, '13', '13', '22', 'Which of these method of class String is used to extract a single character from a String object?', 'CHARAT()', 'charAt()', 'chatat()', 'ChatAt()', 'charAt()'),
(25, '13', '13', '22', 'Which of these constructors is used to create an empty String object?', 'String()', 'String(void)', 'String(0)', 'None of the mentioned', 'String()'),
(26, '13', '13', '22', 'Which of these is an incorrect statement?', 'String objects are immutable, they cannot be changed', 'String object can point to some other reference of String variable', 'StringBuffer class is used to store string in a buffer for later use', 'None of the mentioned', 'StringBuffer class is used to store string in a buffer for later use'),
(27, '13', '13', '22', 'What will be the output of the following Java program?\r\n    class String_demo \r\n    {\r\n        public static void main(String args[])\r\n        {\r\n            char chars[] = {\'a\', \'b\', \'c\'};\r\n            String s = new String(chars);\r\n            System.out.println(s);\r\n        }\r\n   }', 'a', 'b', 'c', 'abc', 'abc'),
(28, '13', '13', '22', 'What will be the output of the following Java program?\r\n  class String_demo \r\n    {\r\n        public static void main(String args[])\r\n        {\r\n            int ascii[] = { 65, 66, 67, 68};\r\n            String s = new String(ascii, 1, 3);\r\n            System.out.println(s);\r\n        }\r\n   }', 'ABC', 'BCD', 'CDA', 'ABCD', 'BCD'),
(29, '13', '13', '22', 'What will be the output of the following Java program?\r\n class String_demo \r\n    {\r\n        public static void main(String args[])\r\n        {\r\n            char chars[] = {\'a\', \'b\', \'c\'};\r\n            String s = new String(chars);\r\n            String s1 = \"abcd\";\r\n            int len1 = s1.length();\r\n            int len2 = s.length();\r\n            System.out.println(len1 + \" \" + len2);\r\n        }\r\n   }', '3 0', '3 4', '0 3', '4 3', '4 3');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `test_id`, `score`, `total_question`, `exam_status`) VALUES
(1, '15', '15', '10', '10', 'disabled'),
(17, '15', '17', '5', '5', 'disabled'),
(18, '15', '20', '0', '0', 'disabled'),
(20, '16', '17', '2', '5', 'disabled'),
(21, '16', '20', '0', '0', 'disabled'),
(24, '16', '15', '7', '10', 'disabled'),
(25, '17', '17', '3', '5', 'disabled');

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` int(10) UNSIGNED NOT NULL,
  `stream_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `stream_name`) VALUES
(13, 'BCA'),
(14, 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_stream` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `roll_number`, `student_email`, `phone_number`, `password`, `student_stream`, `semester`, `session`, `section`) VALUES
(15, 'SHUVAM DUTTA', '15201217030', 'shuvamdnk@gmail.com', '5478963256', '$2y$10$EnE/ZjWy/B3MrLfMv3bcKe4GJt22VMPe87pTyjdBeFTCpP4WnY8LW', '13', '4th', '2020', 'ALPHA'),
(16, 'SURAJ GHOSH', '15201217008', 'suraj@gmail.com', '5478963256', '$2y$10$gkBpA/k6P7ivC4aZZJHq3O1jffqhpXx2As/NzgUgdZyLwxyBXiPoy', '13', '6th', '2020', 'ALPHA'),
(17, 'SAYAN SAMANTO', '15201217034', 'sayana@gmail.com', '9874563210', '$2y$10$DmtGu.VfuzKnRaRiC2hjk.aN6T6lvQcS82kzaw6TTnxJyf3w/YY5i', '13', '6th', '2020', 'ALPHA');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `stream_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `stream_id`, `semester`, `subject_name`, `subject_code`) VALUES
(9, '13', '4th', 'C++', 'BCA403'),
(10, '14', '4th', 'Accounting', 'BBA405'),
(12, '13', '6th', 'Networking', 'BCA601E'),
(13, '13', '6th', 'Java', 'BCA602E');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stream_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `No_of_q` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_a` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wrong_a` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_create_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `faculty_id`, `test_name`, `stream_id`, `subject_id`, `No_of_q`, `right_a`, `wrong_a`, `total_marks`, `test_date`, `test_time`, `test_status`, `test_create_date`, `test_duration`) VALUES
(15, '3', 'Networking MCQ', '13', '12', '10', '2', '-1', '20', '06/16/2020', '11:35 AM', 'enabled', '2020-06-11', 600),
(17, '4', 'Networking', '13', '12', '5', '2', '-1', '10', '06/15/2020', '12:02 AM', 'enabled', '2020-06-11', 15),
(19, '3', 'Java', '13', '13', '4', '2', '-1', '20', '06/20/2020', '10:30 AM', 'disabled', '2020-06-11', 600),
(20, '4', 'Java MCQ', '13', '13', '2', '2', '-1', '4', '06/24/2020', '10:30 AM', 'enabled', '2020-06-11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$kNTLE4nkK.akb6YVvp/l8Od1tVapXds1wfCdU9ftC9oupDcekCUje', '2020-03-24 08:50:12', '2020-03-24 08:50:12'),
(2, 'shuvam', '$2y$10$4hF.ZdF1/6YWLmgUHIqba.3Dd/jN9qZUl0J9Duwy/QdkpQBf50N8O', '2020-03-24 09:51:07', '2020-03-26 00:31:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_password_unique` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
