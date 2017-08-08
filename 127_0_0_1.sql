-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2017 at 09:03 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_demo`
--
CREATE DATABASE IF NOT EXISTS `ci_demo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ci_demo`;


-- Table structure for table `argali_profiles`
--

CREATE TABLE `argali_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `argali_users`
--

INSERT INTO `argali_users` (`id`, `username`, `email`, `password`, `date_added`) VALUES
(3, 'authorsekaran', 'ssekaran4u@gmail.com', '$2y$10$PQIRVnGWmh2Sf/t29LNvsuJ7YkaqRgSTsgBnKPKfxkTZY4a2VS1gy', '2017-06-30 16:41:29');

ALTER TABLE `argali_users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `argali_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;