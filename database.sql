-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2020 at 10:33 AM
-- Server version: 10.4.17-MariaDB-cll-lve
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
-- Database: `u1261949_codecanyon_php-crud-generator`
--

-- --------------------------------------------------------

--
-- Table structure for table `departmenttable`
--

CREATE TABLE `departmenttable` (
  `row_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `txt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmenttable`
--

INSERT INTO `departmenttable` (`row_id`, `name`, `txt`) VALUES
(2, 'HRD', 'Take care all administration of Employee');

-- --------------------------------------------------------

--
-- Table structure for table `employeetable`
--

CREATE TABLE `employeetable` (
  `row_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `hired_date` datetime DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeetable`
--

INSERT INTO `employeetable` (`row_id`, `department_id`, `name`, `address`, `hired_date`, `age`, `salary`, `photo`) VALUES
(80, 2, 'aaa', 'tesss', '2020-04-30 00:00:00', 99, 12345, ''),
(88, 2, 'employeename', 'Address 1', '2010-01-07 00:00:00', 0, 12345698, '20201127070959.png'),
(93, 2, 'RRR', '', '2020-12-17 00:00:00', 33, 0, '20201204125400.jpg'),
(94, 2, 'RRR', 'hgj', '2020-12-11 00:00:00', 66, 567, '20201205094235.png');

-- --------------------------------------------------------

--
-- Table structure for table `generatetable`
--

CREATE TABLE `generatetable` (
  `row_id` int(11) NOT NULL,
  `generate_controller` varchar(255) DEFAULT NULL,
  `generate_table` varchar(255) DEFAULT NULL,
  `generate_field` varchar(255) DEFAULT NULL,
  `generate_field_descr` varchar(255) DEFAULT NULL,
  `generate_type` varchar(255) DEFAULT NULL,
  `generate_field_index` varchar(255) DEFAULT NULL,
  `generate_field_mandatory` varchar(255) DEFAULT NULL,
  `generate_relation_table` varchar(255) DEFAULT NULL,
  `generate_relation_field` varchar(255) DEFAULT NULL,
  `generate_relation_fieldtxt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `pswrd` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`user_id`, `user_name`, `pswrd`, `full_name`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 'demo', 'd0970714757783e6cf17b26fb8e2298f', 'Demo User', '2019-05-31 10:44:25', 0, '0000-00-00 00:00:00', 0),
(56, 'sss1', 'bf9136d36da4f8a14d024f025586b5f2', 'aaaaaaaa', '2020-11-28 01:25:53', 1, '2020-12-05 09:44:57', 0),
(49, 'test1', 'e10adc3949ba59abbe56e057f20f883e', 'test1', '2020-09-11 21:55:55', 1, '2020-10-06 09:56:13', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_employeetablelist`
-- (See below for the actual view)
--
CREATE TABLE `vw_employeetablelist` (
`row_id` int(11)
,`department_id` int(11)
,`departmenttable_name` varchar(255)
,`name` varchar(255)
,`address` text
,`hired_date` datetime
,`age` int(11)
,`salary` double
,`photo` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_employeetablelist`
--
DROP TABLE IF EXISTS `vw_employeetablelist`;

CREATE VIEW `vw_employeetablelist`  AS  select `employeetable`.`row_id` AS `row_id`,`employeetable`.`department_id` AS `department_id`,`departmenttable`.`name` AS `departmenttable_name`,`employeetable`.`name` AS `name`,`employeetable`.`address` AS `address`,`employeetable`.`hired_date` AS `hired_date`,`employeetable`.`age` AS `age`,`employeetable`.`salary` AS `salary`,`employeetable`.`photo` AS `photo` from (`employeetable` join `departmenttable` on(`departmenttable`.`row_id` = `employeetable`.`department_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departmenttable`
--
ALTER TABLE `departmenttable`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `employeetable`
--
ALTER TABLE `employeetable`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `IDX` (`department_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departmenttable`
--
ALTER TABLE `departmenttable`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employeetable`
--
ALTER TABLE `employeetable`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
