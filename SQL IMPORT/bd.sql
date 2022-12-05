-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2022 at 01:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ivanovbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bells`
--

CREATE TABLE `bells` (
  `id_bell` int NOT NULL,
  `start_lesson` time DEFAULT NULL,
  `end_lesson` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bells`
--

INSERT INTO `bells` (`id_bell`, `start_lesson`, `end_lesson`) VALUES
(1, '08:00:00', '09:20:00'),
(2, '09:30:00', '10:50:00'),
(3, '11:10:00', '12:30:00'),
(4, '12:50:00', '14:10:00'),
(5, '14:30:00', '15:50:00'),
(6, '16:00:00', '17:20:00'),
(13, '17:25:00', '18:45:00'),
(16, '13:30:00', '14:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id_classroom` int NOT NULL,
  `num_room` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id_classroom`, `num_room`) VALUES
(1, 221),
(2, 219),
(3, 220),
(4, 228),
(5, 128),
(6, 329),
(7, 222),
(8, 7),
(14, 320),
(15, 213);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id_day` int NOT NULL,
  `name_day` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id_day`, `name_day`) VALUES
(1, 'Пн'),
(2, 'Вт'),
(3, 'Ср'),
(4, 'Чт'),
(5, 'Пт'),
(6, 'Сб');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id_group` int NOT NULL,
  `name_group` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id_group`, `name_group`) VALUES
(1, 'И-122'),
(2, 'И-320'),
(3, 'И-419');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int NOT NULL,
  `bell_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `teacher_id` int DEFAULT NULL,
  `day_id` int DEFAULT NULL,
  `classroom_id` int DEFAULT NULL,
  `group_id` int DEFAULT NULL,
  `priority` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `bell_id`, `subject_id`, `teacher_id`, `day_id`, `classroom_id`, `group_id`, `priority`) VALUES
(1, 4, 3, 2, 2, 1, 2, 1),
(2, 5, 4, 1, 2, 7, 2, 2),
(3, 6, 5, 5, 2, 2, 2, 3),
(4, 13, 17, 1, 2, 7, 2, 4),
(5, 16, 13, 3, 1, 7, 2, 1),
(6, 5, 1, 1, 1, 7, 2, 2),
(7, 6, 2, 4, 1, 2, 2, 3),
(8, 13, 5, 5, 1, 7, 2, 4),
(9, 2, 7, 6, 3, 8, 2, 1),
(10, 3, 11, 1, 3, 1, 2, 2),
(11, 4, 3, 2, 3, 7, 2, 3),
(12, 5, 4, 1, 3, 1, 2, 4),
(13, 4, 17, 3, 4, 1, 2, 1),
(14, 5, 17, 3, 4, 3, 2, 2),
(15, 6, 9, 7, 4, 4, 2, 3),
(16, 3, 10, 2, 5, 1, 2, 1),
(17, 4, 11, 1, 5, 7, 2, 2),
(18, 5, 10, 2, 5, 1, 2, 3),
(19, 6, 1, 1, 5, 7, 2, 4),
(20, 4, 14, 9, 6, 6, 2, 1),
(21, 5, 12, 9, 6, 6, 2, 2),
(30, 6, 12, 9, 6, 6, 2, 3),
(31, 16, 13, 14, 1, 2, 1, 5),
(32, 5, 18, 15, 1, 14, 1, 6),
(33, 6, 19, 16, 1, 15, 1, 7),
(34, 13, 20, 17, 1, 2, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` int NOT NULL,
  `name_subject` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id_subject`, `name_subject`) VALUES
(1, 'Основы баз данных'),
(2, 'Обж'),
(3, 'ОПД'),
(4, 'РВИАПООН'),
(5, 'СИПООН'),
(7, 'Физ-ра'),
(8, 'Учебная практика'),
(9, 'Англ.Яз'),
(10, 'КИС'),
(11, 'Учебная практика'),
(12, 'Дискретная математика'),
(13, 'Кураторский час'),
(14, 'Теория вероятностей и мат. статистика'),
(17, 'ООИ'),
(18, 'Русский язык'),
(19, 'Физика'),
(20, 'Основы программирования на Python');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id_teacher` int NOT NULL,
  `full_name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id_teacher`, `full_name`) VALUES
(1, 'Майоров Т.Н.'),
(2, 'Зуева Л.Н.'),
(3, 'Глазырина М.В.'),
(4, 'Вырывпаев А.Н.'),
(5, 'Лимонова И.А.'),
(6, 'Шанаров В.Э.'),
(7, 'Корнилова С.А.'),
(8, 'Салова С.А.'),
(9, 'Гольцман О.А.'),
(14, 'Некрасова Е.В.'),
(15, 'Альбрехт Т.В.'),
(16, 'Татаурова М. В.'),
(17, 'Подоляк С.М.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bells`
--
ALTER TABLE `bells`
  ADD PRIMARY KEY (`id_bell`),
  ADD KEY `id_bell` (`id_bell`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id_classroom`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id_day`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bell_id` (`bell_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `schedule_ibfk_2` (`classroom_id`),
  ADD KEY `schedule_ibfk_3` (`day_id`),
  ADD KEY `schedule_ibfk_4` (`group_id`),
  ADD KEY `schedule_ibfk_6` (`teacher_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subject`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_teacher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bells`
--
ALTER TABLE `bells`
  MODIFY `id_bell` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id_classroom` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id_day` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id_teacher` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id_classroom`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`day_id`) REFERENCES `days` (`id_day`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id_group`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_5` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id_subject`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_6` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id_teacher`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_7` FOREIGN KEY (`bell_id`) REFERENCES `bells` (`id_bell`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
