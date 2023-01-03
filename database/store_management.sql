-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 10:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(3, 'Administation'),
(5, 'RND'),
(6, 'Web Development'),
(7, 'Software Development'),
(8, 'Research'),
(12, 'Stuff'),
(13, 'Store Executive');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`) VALUES
(5, 'Head'),
(8, 'Team Member'),
(9, 'Team Leader'),
(10, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(100) NOT NULL COMMENT 'ID',
  `name` varchar(100) NOT NULL COMMENT 'Name',
  `department_id` int(100) NOT NULL,
  `designation_id` int(100) NOT NULL,
  `number` int(100) NOT NULL COMMENT 'Number',
  `email` varchar(100) NOT NULL COMMENT 'Email',
  `password` varchar(100) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `department_id`, `designation_id`, `number`, `email`, `password`, `role`) VALUES
(1, 'Shaifuddin', 3, 5, 1635485720, 'shaifuddin70@gmail.com', '$2y$10$H/kT9mE.DPWuMGhWuYcTZ.PVEJsvhCsSiFBRaxaZ4KDJwyW5EK0pa', 1),
(32, 'Rohim', 13, 10, 2147483647, 'rohim@gmail.com', '$2y$10$lIEh34scWukFnZUJvuNO6eOTBC2M3DZIY1oE87SUo8wdNx8XF7BeS', 2),
(34, 'Karim', 7, 8, 13654855, 'karim@gmail.com', '$2y$10$SzwaUDkCpdYybzuIQrg6/.3wrFG/SltqMBtZPMEbz3mlFuFklSDB2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(10) NOT NULL,
  `item` int(100) NOT NULL,
  `employee_id` int(100) NOT NULL,
  `issue_date` date NOT NULL DEFAULT current_timestamp(),
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `item`, `employee_id`, `issue_date`, `quantity`) VALUES
(153, 21, 1, '2022-12-23', 1),
(154, 18, 1, '2022-12-23', 1),
(156, 21, 32, '2022-12-23', 2),
(157, 18, 32, '2022-12-23', 1),
(160, 18, 32, '2022-12-24', 2),
(161, 17, 34, '2022-12-24', 2),
(162, 21, 1, '2022-12-24', 45),
(164, 21, 34, '2022-12-24', 1),
(165, 21, 34, '2022-12-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(10) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `catagory_id` int(10) NOT NULL,
  `reusable` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `catagory_id`, `reusable`) VALUES
(17, 'Fan', 110, 'YES'),
(18, 'Laptop', 110, 'YES'),
(19, 'Light', 110, 'YES'),
(20, 'Pencil', 114, 'NO'),
(21, 'Table', 112, 'YES'),
(22, 'Chair', 112, 'YES'),
(24, 'Printer', 110, 'YES'),
(25, 'Pen', 114, 'NO'),
(28, 'Punch Machine', 113, 'YES'),
(29, 'Strapler', 113, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `item_catagory`
--

CREATE TABLE `item_catagory` (
  `catagory_id` int(100) NOT NULL,
  `catagory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_catagory`
--

INSERT INTO `item_catagory` (`catagory_id`, `catagory`) VALUES
(110, 'Electric'),
(112, 'Furniture'),
(113, 'Utility'),
(114, 'Stationary'),
(116, 'catagory');

-- --------------------------------------------------------

--
-- Table structure for table `item_request`
--

CREATE TABLE `item_request` (
  `id` int(100) NOT NULL,
  `employee_id` int(100) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT NULL,
  `nstatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_request`
--

INSERT INTO `item_request` (`id`, `employee_id`, `item_id`, `quantity`, `request_date`, `status`, `nstatus`) VALUES
(82, 1, 18, 1, '2022-12-23', 1, 1),
(83, 1, 18, 1, '2022-12-23', 0, 1),
(84, 1, 21, 1, '2022-12-23', 1, 1),
(86, 1, 18, 1, '2022-12-23', 1, 1),
(87, 1, 18, 1, '2022-12-23', 1, 1),
(88, 32, 21, 2, '2022-12-23', 1, 0),
(89, 32, 18, 1, '2022-12-23', 1, 0),
(92, 1, 18, 65, '2022-12-24', 1, 1),
(93, 32, 18, 2, '2022-12-24', 1, 0),
(94, 34, 17, 2, '2022-12-24', 1, 0),
(95, 34, 21, 1, '2022-12-24', 1, 0),
(96, 1, 21, 45, '2022-12-24', 1, 1),
(97, 34, 18, 1, '2022-12-24', NULL, NULL),
(98, 32, 18, 66, '2022-12-24', 1, 1),
(99, 34, 18, 2, '2022-12-24', NULL, NULL),
(100, 34, 21, 1, '2022-12-24', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

CREATE TABLE `item_stock` (
  `stock_id` int(11) NOT NULL,
  `catagory_id` int(10) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `Issued_quantity` int(10) NOT NULL,
  `recieve_date` date NOT NULL,
  `order_id` int(100) NOT NULL,
  `rack_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_stock`
--

INSERT INTO `item_stock` (`stock_id`, `catagory_id`, `item_id`, `quantity`, `Issued_quantity`, `recieve_date`, `order_id`, `rack_id`) VALUES
(11, 110, 18, 66, 4, '2022-12-23', 43, 4),
(12, 112, 21, 50, 50, '2022-12-23', 44, 4),
(14, 114, 25, 100, 0, '2022-12-23', 46, 4),
(15, 114, 20, 98, 0, '2022-12-23', 47, 4),
(16, 110, 24, 99, 0, '2022-12-23', 48, 4),
(17, 110, 19, 50, 0, '2022-12-23', 50, 7),
(18, 110, 17, 98, 2, '2022-12-24', 51, 7),
(20, 113, 28, 20, 0, '2022-12-24', 53, 7);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(100) NOT NULL,
  `catagory` int(10) NOT NULL,
  `name` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `catagory`, `name`, `quantity`, `date`, `status`) VALUES
(37, 110, 18, 50, '2022-12-23', 1),
(38, 112, 21, 50, '2022-12-23', 1),
(40, 114, 25, 100, '2022-12-23', 1),
(41, 114, 20, 100, '2022-12-23', 1),
(42, 110, 24, 100, '2022-12-23', 1),
(43, 110, 19, 50, '2022-12-23', 1),
(44, 110, 18, 20, '2022-12-23', 1),
(45, 110, 17, 100, '2022-12-24', 1),
(47, 113, 28, 20, '2022-12-24', 1),
(48, 112, 21, 50, '2022-12-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_table`
--

CREATE TABLE `purchase_table` (
  `id` int(100) NOT NULL,
  `catagory` int(10) NOT NULL,
  `name` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_table`
--

INSERT INTO `purchase_table` (`id`, `catagory`, `name`, `quantity`, `date`, `status`) VALUES
(43, 110, 18, 50, '2022-12-23', 1),
(44, 112, 21, 50, '2022-12-23', 1),
(46, 114, 25, 100, '2022-12-23', 1),
(47, 114, 20, 100, '2022-12-23', 1),
(48, 110, 24, 100, '2022-12-23', 1),
(49, 110, 18, 20, '2022-12-23', 1),
(50, 110, 19, 50, '2022-12-23', 1),
(51, 110, 17, 100, '2022-12-24', 1),
(53, 113, 28, 20, '2022-12-24', 1),
(54, 112, 21, 50, '2022-12-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--

CREATE TABLE `rack` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rack`
--

INSERT INTO `rack` (`id`, `name`) VALUES
(4, '101'),
(6, '102'),
(7, '103'),
(8, '104');

-- --------------------------------------------------------

--
-- Table structure for table `return_table`
--

CREATE TABLE `return_table` (
  `id` int(10) NOT NULL,
  `employee_id` int(100) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `return_table`
--

INSERT INTO `return_table` (`id`, `employee_id`, `item_id`, `quantity`, `date`) VALUES
(19, 32, 18, 2, '2022-12-23'),
(20, 32, 21, 2, '2022-12-23'),
(21, 32, 24, 2, '2022-12-23'),
(23, 32, 18, 2, '2022-12-23'),
(24, 1, 24, 50, '2022-12-23'),
(25, 1, 18, 1, '2022-12-23'),
(26, 1, 18, 1, '2022-12-23'),
(27, 1, 18, 1, '2022-12-23'),
(28, 1, 18, 1, '2022-12-23'),
(29, 1, 18, 1, '2022-12-23'),
(30, 1, 18, 1, '2022-12-24'),
(31, 1, 18, 65, '2022-12-24'),
(34, 32, 18, 66, '2022-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'stuff'),
(3, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(100) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `p_number` int(100) NOT NULL,
  `nid` int(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `vkey` varchar(1000) NOT NULL,
  `verified` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `p_number`, `nid`, `pass`, `vkey`, `verified`) VALUES
(9, 'Shaifuddin', 'shaifuddin70@gmail.com', 2147483647, 2147483647, '$2y$10$h9UZjbwhRw//8tMoJ7uVNOKx9ND7/hZWfGOYI3MvBriJzZfmhvNCa', '4064b2e3017ef08b49bd17a5d10a94b2', 1),
(10, 'test1', 'dardentimothy3@gmail.com', 2147483647, 2147483647, '$2y$10$9RatwZxgrphyf5R12TXP..Ty9HPaNCzsvMHFgkxBgOimKdHT4ePr6', 'abde4751fafd112bb0272eae685cb8e8', 0),
(12, 'shifu', 'shifu@gmail.com', 45272, 5287, '$2y$10$dVHtJ9XFzBnhBZdXT8WwuuJZkXV5k5ynCmsww.b.fXNwj/mZr.QSO', '2626969577d10fa57058139f5098a460', 1),
(13, 'mahi', 'mahi@gmail.com', 456465164, 848448448, '$2y$10$YnWboQlT4UNCWSz8LDI.4Os9RpfnK115gOUqtzx3Q5M6XH.kgJmnW', 'awdhguawiudhua', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `designation_id` (`designation_id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `item_id` (`item`,`employee_id`),
  ADD KEY `item` (`item`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `catagory_id` (`catagory_id`);

--
-- Indexes for table `item_catagory`
--
ALTER TABLE `item_catagory`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `item_request`
--
ALTER TABLE `item_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `status_id` (`status`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `catagory_id` (`catagory_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id_2` (`item_id`),
  ADD KEY `catagory_id_2` (`catagory_id`),
  ADD KEY `rack_id` (`rack_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `catagory` (`catagory`);

--
-- Indexes for table `purchase_table`
--
ALTER TABLE `purchase_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catagory` (`catagory`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `rack`
--
ALTER TABLE `rack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_table`
--
ALTER TABLE `return_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`item_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `item_catagory`
--
ALTER TABLE `item_catagory`
  MODIFY `catagory_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `item_request`
--
ALTER TABLE `item_request`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `item_stock`
--
ALTER TABLE `item_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `purchase_table`
--
ALTER TABLE `purchase_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `rack`
--
ALTER TABLE `rack`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `return_table`
--
ALTER TABLE `return_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `dep` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `des` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`id`);

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `emp` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `item` FOREIGN KEY (`item`) REFERENCES `item` (`item_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`catagory_id`) REFERENCES `item_catagory` (`catagory_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_request`
--
ALTER TABLE `item_request`
  ADD CONSTRAINT `item_request_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD CONSTRAINT `item_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_stock_ibfk_2` FOREIGN KEY (`catagory_id`) REFERENCES `item_catagory` (`catagory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_stock_ibfk_3` FOREIGN KEY (`rack_id`) REFERENCES `rack` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`name`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_table`
--
ALTER TABLE `purchase_table`
  ADD CONSTRAINT `purchase_table_ibfk_1` FOREIGN KEY (`name`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_table_ibfk_2` FOREIGN KEY (`catagory`) REFERENCES `item_catagory` (`catagory_id`);

--
-- Constraints for table `return_table`
--
ALTER TABLE `return_table`
  ADD CONSTRAINT `return_table_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `return_table_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
