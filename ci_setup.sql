-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2018 at 03:54 PM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 5.6.38-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_setup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date_of_joining` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `status`, `role`, `date_of_joining`) VALUES
(1, 'admin', 'admin@legaledge.in', 'test123', 'active', 'admin', '2018-05-25 12:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_registration`
--

CREATE TABLE `alumni_registration` (
  `id` int(8) NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `batch_of` int(4) NOT NULL,
  `college` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fb_insta_url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `alumni_registration`
--

INSERT INTO `alumni_registration` (`id`, `full_name`, `batch_of`, `college`, `contact_no`, `email`, `city`, `fb_insta_url`, `registration_date`) VALUES
(1, 'Harsh Gagrani', 2018, 'NLIU, Bhopal', '9893017822', 'harsh@legaledge.in', 'Bhopal', 'https://www.facebook.com/harshgagrani', '2018-05-28 05:52:25'),
(2, 'POOJA YADAV', 2016, 'nliu bhopal', '8109680452', 'yadavpooja2345@gmail.com', 'Bhopal', '', '2018-06-01 09:08:40'),
(3, 'muskan ojha', 2017, '', '7400940959', 'muskanojha183@gmail.com', 'bhopal', 'muskanojha183', '2018-06-01 14:14:27'),
(4, 'Shrey singh', 2017, 'National law school of india university ', '9926448136', 'Yashnaldo777@gmail.com', 'BENGALURU', '', '2018-06-01 22:58:49'),
(5, 'Priyanshu Gupta', 2016, 'Hidayatullah National Law University', '9535266850', 'priyanshcool123@gmail.com', 'Rewa', 'ooji_myself_priyanshu', '2018-06-02 08:46:07'),
(6, 'Ayushi Pathak ', 2016, 'National Law University Delhi ', '7289817564', 'ayushi97pathak@gmail.com', 'Bhopal ', '', '2018-06-02 09:09:00'),
(7, 'Ranish Alia', 2016, 'Institute of law, NIRMA university', '9644338494', 'aliaranish11@gmail.com', 'Ganj Basoda', '', '2018-06-02 15:34:37'),
(8, 'Dhruv Sahu', 2017, '', '8989612600', 'dhruvsahu@gmail.com', 'Chhindwara', '@dhruvsahu20', '2018-06-07 16:30:22'),
(9, 'Himanshu Raghuwanshi', 2018, 'NALSAR', '9522208711', 'himanshuraghuwanshi747@gmail.com', 'Ganjbasoda', 'https://www.instagram.com/himanshuraghuwanshi4/', '2018-06-14 13:03:19'),
(10, 'Venkatesh Sahu ', 2017, 'Nliu Bhopal', '9826644714', 'venkusahu79@gmail.com', 'Betul', 'https://m.facebook.com/venkatesh.sahu.5?ref=bookmarks', '2018-06-16 16:30:12'),
(11, 'aditi singh chandel', 2018, 'wbnujs', '9479884116', 'kuhusingh23@gmail.com', 'shahdol', '', '2018-06-24 09:48:54'),
(12, 'Aakash Laad', 2015, 'Dr. RML National Law University', '9479830786', 'laadaakash786@gmail.com', 'Bhopal', 'https://www.facebook.com/?ref=tn_tnmn', '2018-06-27 17:26:01'),
(13, 'Pranjali Mishra', 2017, 'Nalsar', '9752618825', 'Pranjalimishra64553@gmail.com', 'Sabalgarh', '', '2018-07-01 16:32:27'),
(14, 'Christina Dsouza', 2018, 'RMLNLU Lucknow ', '9131581039', 'christinadsouza2303@gmail.com', 'Lucknow ', '', '2018-07-04 07:15:29'),
(15, 'Hraday Jaiswal', 2018, 'Institute of Law - Nirma University', '8989531055', 'hraday.j1799@ymail.com', 'Ahmedabad', 'https://www.facebook.com/iamhraday', '2018-07-09 18:51:35'),
(16, 'Ananya Singhal', 2016, 'National Law University Odisha', '9074190731', 'ananya.sin97@gmail.com', 'Shivpuri', 'https://m.facebook.com/asrock97', '2018-07-12 03:17:17'),
(17, 'Shraddha saxena', 2016, 'JAGRAN LAKECITY UNIVERSITY ', '8770658141', 'saxenashraddha99@gmail.com', 'BHOPAL', 'https://www.facebook.com/people/Shraddha-Saxena/100010649883411', '2018-07-19 08:13:28'),
(18, 'Khushi sharma', 2018, 'Nliu', '9009380875', 'khushisharma14.ks@gmail.com', 'Bhopal', '', '2018-07-28 05:28:48'),
(19, 'Shivi MIttal', 2017, 'Banasthali Vidhyapith, rajasthan', '8962532670', 'shivimittal02@gmail.com', 'Morena (m.p.)', '', '2018-08-01 12:17:15'),
(20, 'Yash Jain', 2017, 'Institute Of Law Gwalior', '8516888801', 'yashtheadorable@gmail.com', 'Gwalior', 'yash.jn07', '2018-08-04 17:30:29'),
(21, 'Swastik Parhi', 2018, 'WBNUJS', '9382072988', 'swastik218109@nujs.edu', 'Kolkata', 'Swastik Parhi', '2018-08-06 11:56:46'),
(22, 'Aarushi Jain', 2017, 'WBNUJS', '8770453276', 'aarushijain989@gmail.com', 'Sagar', 'aarushi22198 (Instagram)', '2018-08-08 15:50:44'),
(23, 'Shivam Patel', 2018, 'National Law Institute University Bhopal', '9752173747', 'shivampatel0799@gmail.com', 'Bhopal', 'https://www.facebook.com/shivampatel950', '2018-08-08 16:30:11'),
(24, 'Channing Tatum', 2016, 'Harvard Law School', '4845070846', 'Tatum09ch@icloud.com', 'Beverly Hills', 'https://www.instagram.com/channingtatum/?hl=en', '2018-08-09 11:56:57'),
(25, 'Samyak jain', 2016, 'Delhi University', '9479471084', 'samyak027@gmail.com', 'Bhopal', 'Samyak@027', '2018-08-19 06:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(7) NOT NULL,
  `cat_id` int(7) NOT NULL DEFAULT '1',
  `title` varchar(500) NOT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cover_image` varchar(50) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `tags` varchar(1000) NOT NULL,
  `views` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_of_creation` datetime NOT NULL,
  `date_of_action` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `cat_id`, `title`, `description`, `cover_image`, `slug`, `tags`, `views`, `status`, `date_of_creation`, `date_of_action`) VALUES
(1, 1, 'sssssssssss', '<p>dddddddddddddddddddd</p>', 'assets/uploads/ouo2c464z7fxdqpt93m4.jpg', 'sssss-ssssss-cccccccc', 'wwwwwwww', 0, 'inactive', '2018-10-23 15:46:46', '2018-10-23 15:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`) VALUES
(1, 'General', 'general', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `message` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `doc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni_registration`
--
ALTER TABLE `alumni_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alumni_registration`
--
ALTER TABLE `alumni_registration`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
