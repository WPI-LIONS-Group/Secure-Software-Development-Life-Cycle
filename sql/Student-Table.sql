-- phpMyAdmin SQL Dump
-- version 
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2024 at 03:32 PM
-- Server version: 5.7.44-percona-sure1-log
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cayennekevin_Student1`
--

-- --------------------------------------------------------

--
-- Table structure for table `student1`
--

CREATE TABLE `student1` (
  `userID` varchar(100) NOT NULL,
  `id` int(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `math` int(11) NOT NULL,
  `history` int(11) NOT NULL,
  `science` int(11) NOT NULL,
  `english` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student1`
--

INSERT INTO `student1` (`userID`, `id`, `firstname`, `lastname`, `address`, `city`, `state`, `zip`, `phone`, `math`, `history`, `science`, `english`) VALUES
('Jackie0', 121, 'James', 'Clark', '111 South Street', 'Montgomery', 'Alabama', '36104', '205(555-1212)', 80, 70, 90, 77),
('', 151, 'Elizabeth', 'Rodriguez', '112 South Street', 'Juneau', 'Alaska', '99801', '907(555-1212)', 0, 0, 0, 0),
('', 181, 'Ryan', 'Lewis', '113 South Street', 'Phoenix', 'Arizona', '85001', '408(555-1212)', 0, 0, 0, 0),
('', 211, 'Brittany', 'Lee', '114 South Street', 'Little Rock', 'Arkansas', '72201', '479(555-1212)', 0, 0, 0, 0),
('', 241, 'Brandon', 'Walker', '115 South Street', 'Sacramento', 'California', '95814', '209(555-1212)', 0, 0, 0, 0),
('', 271, 'Mary', 'Janessa', '116 South Street', 'Denver', 'Colorado', '80202', '303(555-1212)', 0, 0, 0, 0),
('', 301, 'Andrew', 'Harris', '117 South Street', 'Hartford', 'Connecticut', '6103', '203(555-1212)', 0, 0, 0, 0),
('', 331, 'Rachel', 'Martin', '118 South Street', 'Dover', 'Delaware', '19901', '302(555-1212)', 0, 0, 0, 0),
('', 361, 'Justin', 'Thompson', '119 South Street', 'Tallahassee', 'Florida', '32301', '239(555-1212)', 0, 0, 0, 0),
('', 391, 'Amanda', 'Garcia', '120 South Street', 'Atlanta', 'Georgia', '30303', '229(555-1212)', 0, 0, 0, 0),
('', 421, 'David', 'Martinez', '121 South Street', 'Honolulu', 'Hawaii', '96813', '808(555-1212)', 0, 0, 0, 0),
('', 451, 'Nicole', 'Robinson', '122 South Street', 'Boise', 'Idaho', '83702', '208(555-1212)', 0, 0, 0, 0),
('', 481, 'Ashley', 'Wilson', '123 South Street', 'Springfield', 'Illinois', '62701', '217(555-1212)', 0, 0, 0, 0),
('', 511, 'Matthew', 'Moore', '124 South Street', 'Indianapolis', 'Indiana', '46225', '219(555-1212)', 0, 0, 0, 0),
('', 541, 'Jessica', 'Taylor', '125 South Street', 'Des Moines', 'Iowa', '50309', '319(555-1212)', 0, 0, 0, 0),
('', 571, 'Daniel', 'Anderson', '126 South Street', 'Topeka', 'Kansas', '66603', '326(555-1212)', 0, 0, 0, 0),
('', 601, 'Lauren', 'Thomas', '127 South Street', 'Frankfort', 'Kentucky', '40601', '270(555-1212)', 0, 0, 0, 0),
('', 631, 'Christopher', 'Jackson', '128 South Street', 'Baton Rouge', 'Louisiana', '70802', '337(555-1212)', 0, 0, 0, 0),
('', 661, 'Megan', 'White', '129 South Street', 'Augusta', 'Maine', '4330', '207(555-1212)', 0, 0, 0, 0),
('', 691, 'Samantha', 'Hall', '130 South Street', 'Annapolis', 'Maryland', '21401', '227(555-1212)', 0, 0, 0, 0),
('', 721, 'Steven', 'Hopkins', '131 South Street', 'Boston', 'Massachusetts', '2201', '339(555-1212)', 0, 0, 0, 0),
('', 751, 'Emily', 'Johnson', '132 South Street', 'Lansing', 'Michigan', '48933', '231(555-1212)', 0, 0, 0, 0),
('', 781, 'Michael', 'Brown', '133 South Street', 'St. Paul', 'Minnesota', '55102', '218(555-1212)', 0, 0, 0, 0),
('', 811, 'Sarah', 'Davis', '134 South Street', 'Jackson', 'Mississippi', '39205', '228(555-1212)', 0, 0, 0, 0),
('', 841, 'Joshua', 'Miller', '135 South Street', 'Jefferson City', 'Missouri', '65101', '314(555-1212)', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student1`
--
ALTER TABLE `student1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student1`
--
ALTER TABLE `student1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=845;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
