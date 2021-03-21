-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 04:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(11) NOT NULL,
  `enable` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `uniqueid` int(11) NOT NULL,
  `nameuniqueid` varchar(255) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `title`, `enable`, `description`, `uniqueid`, `nameuniqueid`, `type`) VALUES
(118, 'ashish', 'age', 0, '25', 60573, '60573a720db08', 'text'),
(119, 'ashish', 'salary', 0, '3520', 60573, '60573a720db08', 'text'),
(120, 'ashish', 'Phone', 1, '84248749', 60573, '60573a9285482', 'phone'),
(122, 'Ashish', 'Name', 1, 'Ashishkumar12', 60573, '60573bae0e96d', 'text'),
(123, 'Fahad', 'age', 1, '25', 605745, '605745b3369f8', 'text'),
(124, 'Fahad', 'salary', 0, '20000', 605745, '605745b3369f8', 'text'),
(125, 'Fahad', 'gender', 1, 'male', 605745, '605745b3369f8', 'text'),
(126, 'fahad', 'Email', 1, 'ashish@gmail.com', 6057465, '6057465b9e3e6', 'email'),
(127, 'fahad', 'Phone', 1, '8424847449', 6057467, '6057467f9c1c8', 'phone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
