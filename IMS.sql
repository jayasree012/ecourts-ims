-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2022 at 12:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `amc_t`
--

CREATE TABLE `amc_t` (
  `product_id` int(20) NOT NULL,
  `ITpro` text NOT NULL,
  `bcp` double NOT NULL,
  `quantity` int(100) NOT NULL,
  `t_cost` double NOT NULL,
  `amc_cost` double NOT NULL,
  `proce` text NOT NULL,
  `expiry` int(50) NOT NULL,
  `maintain_amt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amc_t`
--

INSERT INTO `amc_t` (`product_id`, `ITpro`, `bcp`, `quantity`, `t_cost`, `amc_cost`, `proce`, `expiry`, `maintain_amt`) VALUES
(6001, 'Projector', 12000, 12000, 525, 12000, 'Procedure1', 10, 2),
(6002, 'Server', 12000, 12, 525, 12000, 'Procedure2', 4, 30000),
(6003, 'Printer', 120, 12000, 800, 3000, 'Procedure1', 10, 2000),
(6008, 'Laptop', 1200, 12000, 23000, 12000, 'Procedure1', 4, 200),
(6010, 'Server', 12000, 12000, 1304850, 12000, 'Choose', 5, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `building_details`
--

CREATE TABLE `building_details` (
  `building_id` int(11) NOT NULL,
  `district` varchar(50) NOT NULL,
  `taluk` varchar(50) NOT NULL,
  `village` varchar(50) NOT NULL,
  `T_S_no` int(50) NOT NULL,
  `description_area` varchar(50) NOT NULL,
  `value` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building_details`
--

INSERT INTO `building_details` (`building_id`, `district`, `taluk`, `village`, `T_S_no`, `description_area`, `value`) VALUES
(3, 'Tiruppur', 'talukk', 'villagee', 10, 'area', 25),
(4, 'Coimbatore', 'talukk', 'villagee', 7, 'desc', 23),
(5, 'Tiruppur', 'talukkkk', 'villag', 5, 'desc1', 30),
(6, 'Coimbatore', 'taluk', 'village', 76, 'desc', 32),
(13, 'Tiruppur', 'permabalur', 'rural', 12, 'Satisfactory', 12),
(18, 'Tiruppur', 'taluk', 'village', 20, ' Description ', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `case_property`
--

CREATE TABLE `case_property` (
  `Case_No` int(50) NOT NULL,
  `Date_of_case` date NOT NULL,
  `Number_of_charge_sheet` int(50) NOT NULL,
  `Name_of_the_station` varchar(50) NOT NULL,
  `Serial_No` int(50) NOT NULL,
  `Valuable_property` varchar(50) NOT NULL,
  `Other_properties` varchar(80) NOT NULL,
  `Initials_of_the_Judge_or_Magistrate1` varchar(50) NOT NULL,
  `Particulars_of_orders` varchar(50) NOT NULL,
  `Section_of_law` varchar(50) NOT NULL,
  `Date_of_order_for_disposal` date NOT NULL,
  `Signature_of_the_party` varchar(50) NOT NULL,
  `Date_returned` date NOT NULL,
  `Initials_of_the_Judge_or_Magistrate2` varchar(50) NOT NULL,
  `Date_of_auction` date NOT NULL,
  `Amount_realized` int(11) NOT NULL,
  `Date_of_remittance_of_male_proceeds_to_treasury` date NOT NULL,
  `Initials_of_the_Judge_or_Magistrate3` varchar(50) NOT NULL,
  `Remarks_or_Inspecting_Officers_(if_any)` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_property`
--

INSERT INTO `case_property` (`Case_No`, `Date_of_case`, `Number_of_charge_sheet`, `Name_of_the_station`, `Serial_No`, `Valuable_property`, `Other_properties`, `Initials_of_the_Judge_or_Magistrate1`, `Particulars_of_orders`, `Section_of_law`, `Date_of_order_for_disposal`, `Signature_of_the_party`, `Date_returned`, `Initials_of_the_Judge_or_Magistrate2`, `Date_of_auction`, `Amount_realized`, `Date_of_remittance_of_male_proceeds_to_treasury`, `Initials_of_the_Judge_or_Magistrate3`, `Remarks_or_Inspecting_Officers_(if_any)`) VALUES
(2001, '2022-05-09', 10, 'station', 9, 'property1', 'properties', 'initial1', 'particulars', 'section', '2022-05-19', 'sign', '2022-04-27', 'initial', '2022-05-12', 20, '2022-05-13', 'initial', 'remarks'),
(2002, '2022-05-17', 29, 'station', 90, 'property1', 'properties', 'initial1', 'particulars', 'section', '2022-04-28', 'signjh', '2022-04-04', 'initial', '2022-05-09', 20000, '2022-05-09', 'initialh', 'remarks'),
(2008, '2022-05-24', 10, 'station', 10, 'property1', 'properties', 'initial1', 'particulars', 'section', '2022-05-24', 'sign', '2022-05-04', 'initial', '2022-05-18', 20, '2022-05-26', 'initial', 'remarks');

-- --------------------------------------------------------

--
-- Table structure for table `furniture_details`
--

CREATE TABLE `furniture_details` (
  `furniture_id` int(100) NOT NULL,
  `furniture_name` varchar(100) NOT NULL,
  `date_of_purchase` date NOT NULL,
  `court_id` int(30) NOT NULL,
  `court_name` varchar(100) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `room_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `furniture_details`
--

INSERT INTO `furniture_details` (`furniture_id`, `furniture_name`, `date_of_purchase`, `court_id`, `court_name`, `department_name`, `room_id`) VALUES
(1024, 'Witness box', '2022-05-10', 2, 'Court', 'Dept', 'room2'),
(1027, 'Executive table', '2022-05-10', 3, 'Court', 'Dept', 'room2'),
(1031, 'Resting chair', '2022-05-09', 12, 'ecourt', 'dept', 'room'),
(1032, 'Steel Long Bench(6\'X1.5\'X1.5\')', '2022-05-17', 123, 'subcourt', 'Dept', '123'),
(1033, 'Wooden table(6.5\'X3.5\'X30\')', '2022-05-17', 123, 'subcourt', 'Dept', 'room'),
(1034, 'Wooden table(5\'X3\'X30\')', '2022-05-11', 12, 'ecourt', 'deptname', 'room'),
(1036, 'Revolving chair', '2022-05-25', 1001, 'ecourt', 'E', 'room'),
(1037, 'Resting chair', '2022-05-24', 12, 'ecourt', 'dept', 'room'),
(1038, 'Executive table', '2022-05-24', 1200, 'ecourt', 'E', '102'),
(1039, 'Executive table', '2022-05-11', 1200, 'ecourts', 'E', '12');

-- --------------------------------------------------------

--
-- Table structure for table `furniture_list`
--

CREATE TABLE `furniture_list` (
  `furniture_no` int(10) NOT NULL,
  `furniture_name` varchar(100) NOT NULL,
  `furniture_quantity` int(10) NOT NULL,
  `furniture_supplier` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `furniture_list`
--

INSERT INTO `furniture_list` (`furniture_no`, `furniture_name`, `furniture_quantity`, `furniture_supplier`) VALUES
(101, 'Executive table', 1, ''),
(102, 'Revolving chair', 1, ''),
(103, 'Wooden table(6.5\'X3.5\'X30\')', 1, ''),
(104, 'Wooden table(5\'X3\'X30\')', 1, ''),
(105, 'Wooden table(4\'X2.5\'X30\')', 0, ''),
(106, 'Typist table', 0, ''),
(107, 'Steel Bureau', 1, ''),
(108, 'Steel Long Bench(6\'X1.5\'X1.5\')', 1, ''),
(109, 'Wooden long bench(6\'X1.5\'X1.5\')', 0, ''),
(110, 'Almirah', 0, ''),
(111, 'Weighing machine', 0, ''),
(112, 'Long table(6\'X2\'X2.5\')', 0, ''),
(113, 'Resting chair', 1, ''),
(114, 'Witness box', 0, ''),
(115, 'Accused box', 1, ''),
(116, '5 type steel chair', 0, ''),
(117, 'Wooden chair', 0, ''),
(118, 'Typist chair', 0, ''),
(119, 'Steel rack', 0, ''),
(120, 'New furniture received from PWD for Principal District Court new combined Court building,Tiruppur', 0, ''),
(121, 'Fire extinguisher', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `itstocks`
--

CREATE TABLE `itstocks` (
  `IT_Stocks_id` int(255) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Brand_Name` varchar(255) NOT NULL,
  `Model_Name` varchar(255) NOT NULL,
  `Serial_No` varchar(255) NOT NULL,
  `Complex_Name` varchar(255) NOT NULL,
  `Court_Name` varchar(255) NOT NULL,
  `Project_Fund` varchar(255) NOT NULL,
  `Installed_Year` varchar(255) NOT NULL,
  `DateOfPurchase` date NOT NULL,
  `expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itstocks`
--

INSERT INTO `itstocks` (`IT_Stocks_id`, `Product_Name`, `Brand_Name`, `Model_Name`, `Serial_No`, `Complex_Name`, `Court_Name`, `Project_Fund`, `Installed_Year`, `DateOfPurchase`, `expiry`) VALUES
(5009, 'server', 'hp', '123', '20', 'ecourt', 'tirupur', '1200', '2022', '2022-05-11', '2024-05-16'),
(5012, 'laptop', 'dell', '123', '12', 'sub court building -udt', 'ecourt', '1200', '2022', '2022-05-25', '2022-06-22'),
(5013, 'server', 'hp', '1234', '20', 'sub court building -udt', 'ecourt', '12000', '2022', '2022-05-11', '2022-06-27'),
(5014, 'laptop', 'dell', '1234', '12', 'ecourts', 'ecourt', '1200', '2011', '2011-05-18', '2023-05-25'),
(5015, 'laptop', 'dell', '12', '123', 'ecourts', 'ecourt', '200', '2022', '2021-07-14', '2029-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`) VALUES
(1, 'jayasree', '20112001'),
(2, 'selva', '346'),
(3, 'harini', '317'),
(4, 'nivedha', '336'),
(5, 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amc_t`
--
ALTER TABLE `amc_t`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `building_details`
--
ALTER TABLE `building_details`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `case_property`
--
ALTER TABLE `case_property`
  ADD PRIMARY KEY (`Case_No`);

--
-- Indexes for table `furniture_details`
--
ALTER TABLE `furniture_details`
  ADD PRIMARY KEY (`furniture_id`);

--
-- Indexes for table `furniture_list`
--
ALTER TABLE `furniture_list`
  ADD PRIMARY KEY (`furniture_no`);

--
-- Indexes for table `itstocks`
--
ALTER TABLE `itstocks`
  ADD PRIMARY KEY (`IT_Stocks_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amc_t`
--
ALTER TABLE `amc_t`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6011;

--
-- AUTO_INCREMENT for table `building_details`
--
ALTER TABLE `building_details`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `furniture_details`
--
ALTER TABLE `furniture_details`
  MODIFY `furniture_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1040;

--
-- AUTO_INCREMENT for table `itstocks`
--
ALTER TABLE `itstocks`
  MODIFY `IT_Stocks_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5016;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
