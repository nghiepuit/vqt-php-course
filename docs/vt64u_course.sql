-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2017 at 07:15 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vt64u_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `u8tr_cateogry`
--

CREATE TABLE `u8tr_cateogry` (
  `id` int(10) NOT NULL,
  `name_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description_vi` text COLLATE utf8_unicode_ci,
  `slug_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title_tag_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_tag_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description_tag_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8_unicode_ci,
  `slug_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_tag_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords_tag_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_tag_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` tinyint(2) NOT NULL,
  `target` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `robot_tag` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` int(15) DEFAULT NULL,
  `updated_at` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `u8tr_course`
--

CREATE TABLE `u8tr_course` (
  `id` int(10) NOT NULL,
  `name_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fee_vi` int(10) DEFAULT NULL,
  `description_vi` text COLLATE utf8_unicode_ci,
  `slug_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title_tag_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_tag_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description_tag_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fee_en` int(10) DEFAULT NULL,
  `description_en` text COLLATE utf8_unicode_ci,
  `slug_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_tag_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords_tag_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_tag_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `robot_tag` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `featured` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` int(15) DEFAULT NULL,
  `updated_at` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `u8tr_course_category`
--

CREATE TABLE `u8tr_course_category` (
  `id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `u8tr_lession`
--

CREATE TABLE `u8tr_lession` (
  `id` int(10) NOT NULL,
  `name_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `open_content_vi` text COLLATE utf8_unicode_ci,
  `body_content_vi` text COLLATE utf8_unicode_ci,
  `foot_content_vi` text COLLATE utf8_unicode_ci,
  `slug_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title_tag_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_tag_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description_tag_vi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `open_content_en` text COLLATE utf8_unicode_ci,
  `body_content_en` text COLLATE utf8_unicode_ci,
  `foot_content_en` text COLLATE utf8_unicode_ci,
  `slug_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_tag_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords_tag_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_tag_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access` tinyint(1) NOT NULL,
  `target` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `robot_tag` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `featured` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `created_at` int(15) DEFAULT NULL,
  `updated_at` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `u8tr_user`
--

CREATE TABLE `u8tr_user` (
  `id` int(10) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(1) NOT NULL,
  `firstname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(15) DEFAULT NULL,
  `updated_at` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `u8tr_cateogry`
--
ALTER TABLE `u8tr_cateogry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u8tr_course`
--
ALTER TABLE `u8tr_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u8tr_course_category`
--
ALTER TABLE `u8tr_course_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u8tr_lession`
--
ALTER TABLE `u8tr_lession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u8tr_user`
--
ALTER TABLE `u8tr_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `u8tr_cateogry`
--
ALTER TABLE `u8tr_cateogry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `u8tr_course`
--
ALTER TABLE `u8tr_course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `u8tr_course_category`
--
ALTER TABLE `u8tr_course_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `u8tr_lession`
--
ALTER TABLE `u8tr_lession`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `u8tr_user`
--
ALTER TABLE `u8tr_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
