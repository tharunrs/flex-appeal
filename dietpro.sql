-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 05:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dietpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `mapping`
--

CREATE TABLE `mapping` (
  `id` int(11) NOT NULL,
  `comorb_id` int(11) NOT NULL,
  `age_id` int(11) NOT NULL,
  `bmi_id` int(11) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapping`
--

INSERT INTO `mapping` (`id`, `comorb_id`, `age_id`, `bmi_id`, `content`) VALUES
(1, 1, 1, 1, 'Consume Nutrient Dense meal, healthy fats, proteins, complex carbs, avoid empty calories.\nHave a healthy snack in between meals.'),
(2, 1, 1, 2, 'Consume Nutrient Dense meals with  healthy fats, complex carbs and proteins. \nLower Saturated and Trans fat consumption. Lower Sugar consumption.'),
(3, 1, 1, 3, 'Consume Nutrient dense, protein-rich meals with healthy fats and complex carbs.\nLower Saturated and Trans fat consumption. Lower Sugar consumption.'),
(4, 1, 2, 1, 'Increase calorie intake  by (500-1000 cal/day).\nInclude these in your meal:\nMeat, tofu, fish, eggs, milk, cheese, beans, nuts, fruits and veggies.\nBe sure to consume lean proteins and healthy fat.\n'),
(5, 1, 2, 2, 'Include these in your meal: Meat, tofu, fish, eggs, milk, cheese, beans, nuts, fruits and veggies.\r\nHave a balanced diet with less fat and less salt.\r\nConsume fibre rich, lean protein and not processed food.'),
(6, 1, 2, 3, 'Consume protein-rich meals, with less saturated and trans fat. Include more healthy fats, complex carbs and reduce sugar.'),
(7, 2, 1, 1, ''),
(8, 2, 1, 2, ''),
(9, 2, 1, 3, ''),
(10, 2, 2, 1, ''),
(11, 2, 2, 2, ''),
(12, 2, 2, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblage`
--

CREATE TABLE `tblage` (
  `id` int(10) NOT NULL,
  `name` varchar(4) NOT NULL,
  `age_start` int(10) NOT NULL,
  `age_end` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblage`
--

INSERT INTO `tblage` (`id`, `name`, `age_start`, `age_end`) VALUES
(1, '<45', 0, 44),
(2, '>45', 45, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tblbmi`
--

CREATE TABLE `tblbmi` (
  `id` int(45) NOT NULL,
  `name` varchar(15) NOT NULL,
  `start_bmi` float(10,1) NOT NULL,
  `end_bmi` float(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbmi`
--

INSERT INTO `tblbmi` (`id`, `name`, `start_bmi`, `end_bmi`) VALUES
(1, 'Underweight', 0.0, 18.4),
(2, 'Healthy', 18.5, 24.9),
(3, 'Overweight', 25.0, 30.0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomorb`
--

CREATE TABLE `tblcomorb` (
  `id` int(10) NOT NULL,
  `comorb` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcomorb`
--

INSERT INTO `tblcomorb` (`id`, `comorb`) VALUES
(1, 'TRUE'),
(2, 'FALSE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mapping`
--
ALTER TABLE `mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `age_dietpro` (`age_id`),
  ADD KEY `bmi_dietpro` (`bmi_id`),
  ADD KEY `comorb_dietpro` (`comorb_id`);

--
-- Indexes for table `tblage`
--
ALTER TABLE `tblage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbmi`
--
ALTER TABLE `tblbmi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomorb`
--
ALTER TABLE `tblcomorb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mapping`
--
ALTER TABLE `mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblage`
--
ALTER TABLE `tblage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblbmi`
--
ALTER TABLE `tblbmi`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcomorb`
--
ALTER TABLE `tblcomorb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mapping`
--
ALTER TABLE `mapping`
  ADD CONSTRAINT `age_dietpro` FOREIGN KEY (`age_id`) REFERENCES `tblage` (`id`),
  ADD CONSTRAINT `bmi_dietpro` FOREIGN KEY (`bmi_id`) REFERENCES `tblbmi` (`id`),
  ADD CONSTRAINT `comorb_dietpro` FOREIGN KEY (`comorb_id`) REFERENCES `tblcomorb` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
