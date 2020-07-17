-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 11:10 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sessions`
--

-- --------------------------------------------------------

--
-- Table structure for table `sessiontable`
--

CREATE TABLE `sessiontable` (
  `session_id` int(11) NOT NULL,
  `author` tinytext NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `attendees` text DEFAULT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessiontable`
--

INSERT INTO `sessiontable` (`session_id`, `author`, `author_id`, `title`, `description`, `attendees`, `start_datetime`, `end_datetime`) VALUES
(1, 'Dohn Joe', 2, 'Working on a title...', 'Yes, this is a one month-long session. And yes, I have no clue what it will be about. I just wanted to post something. It\'s a good thing I can edit this later though.', '3', '2020-07-20 16:30:00', '2020-08-20 16:30:00'),
(2, 'Mr. Google', 3, 'You can\'t miss THIS one', 'This session will go over the rigorous path of knowing how to google. It will be exactly 1 minute long.', NULL, '2020-10-10 14:00:00', '2020-10-10 14:01:00'),
(3, 'Brent Delia', 1, 'Project Party Celebration', 'In celebration for completing this project, I will be hosting a party session that will last until the end of time. Or at least as long as this will let me. Cheers, Paycom and everyone!', '3,2', '2020-07-17 14:30:00', '5759-12-31 23:59:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sessiontable`
--
ALTER TABLE `sessiontable`
  ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sessiontable`
--
ALTER TABLE `sessiontable`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
