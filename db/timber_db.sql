-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2020 at 09:17 AM
-- Server version: 10.3.22-MariaDB
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
-- Database: `kairostu_gbarter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `admin_id` int(1) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(3250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`admin_id`, `name`, `email`, `password`, `created_on`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '2019-08-25 20:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `ta_board_manufacturing`
--

CREATE TABLE `ta_board_manufacturing` (
  `bm_id` int(10) NOT NULL,
  `bm_date` date NOT NULL,
  `type_of_wood` varchar(200) NOT NULL,
  `bm_batch_no` varchar(200) NOT NULL,
  `gradiation` varchar(200) NOT NULL,
  `widthg` varchar(200) NOT NULL,
  `width` varchar(200) NOT NULL,
  `length` varchar(200) NOT NULL,
  `thickness` varchar(200) NOT NULL,
  `no_of_pieces` varchar(150) NOT NULL,
  `sqm` varchar(200) NOT NULL,
  `sqft` varchar(200) NOT NULL,
  `glow_type` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1,
  `consumed` varchar(250) NOT NULL,
  `packing_consumerQty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_board_manufacturing`
--

INSERT INTO `ta_board_manufacturing` (`bm_id`, `bm_date`, `type_of_wood`, `bm_batch_no`, `gradiation`, `widthg`, `width`, `length`, `thickness`, `no_of_pieces`, `sqm`, `sqft`, `glow_type`, `quantity`, `uom`, `created_on`, `status`, `consumed`, `packing_consumerQty`) VALUES
(1, '2020-07-09', '2', '', '', '1220', '75', '2440', '18', '73', '217.31', '2339.09', '', '', '', '2020-07-10 08:48:29', 1, '', ''),
(2, '2020-07-09', '1', '', '2', '1220', '75', '2440', '18', '75', '223.26', '2403.17', '', '', '', '2020-07-10 08:49:47', 1, '', ''),
(3, '2020-07-11', '1', '', '1', '1200', '100', '2500', '12', '150', '450.00', '4843.80', '', '', '', '2020-07-10 09:29:24', 1, '', ''),
(6, '2020-07-11', '1', '', '2', '1200', '77', '2700', '12', '30', '64.80', '697.51', '', '', '', '2020-07-10 11:18:40', 1, '', ''),
(8, '2020-08-02', '1', '', '1', '1220', '75', '2440', '23', '100', '14.88', '160.21', '', '', '', '2020-07-31 02:49:16', 1, '', ''),
(9, '2020-07-09', '1', '', '1', '1220', '75', '2440', '18mm', '1650', '119.07', '1281.69', '', '', '', '2020-07-31 10:03:46', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ta_consumed_glue`
--

CREATE TABLE `ta_consumed_glue` (
  `glue_id` int(11) NOT NULL,
  `production_type` varchar(100) NOT NULL,
  `production_type_id` int(11) NOT NULL,
  `glue_type` varchar(100) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `uom` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `wood_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_consumed_glue`
--

INSERT INTO `ta_consumed_glue` (`glue_id`, `production_type`, `production_type_id`, `glue_type`, `qty`, `uom`, `created_on`, `wood_id`) VALUES
(1, 'long_length', 6, '1', '4.25', 'Kgs', '2020-07-10 08:29:02', 0),
(2, 'long_length', 6, '1', '', 'Kgs', '2020-07-10 08:29:02', 0),
(3, 'long_length', 6, '', '', 'Kgs', '2020-07-10 08:29:02', 0),
(4, 'long_length', 7, '1', '10.25', 'Kgs', '2020-07-10 08:31:37', 0),
(5, 'long_length', 7, '1', '', 'Kgs', '2020-07-10 08:31:37', 0),
(6, 'long_length', 7, '', '', 'Kgs', '2020-07-10 08:31:37', 0),
(7, 'long_length', 8, '1', '10.25', 'Kgs', '2020-07-10 08:33:13', 0),
(8, 'long_length', 8, '1', '', 'Kgs', '2020-07-10 08:33:13', 0),
(9, 'long_length', 8, '', '', 'Kgs', '2020-07-10 08:33:13', 0),
(10, 'long_length', 9, '1', '1.50', 'Kgs', '2020-07-10 08:34:47', 0),
(11, 'long_length', 9, '1', '', 'Kgs', '2020-07-10 08:34:48', 0),
(12, 'long_length', 9, '', '', 'Kgs', '2020-07-10 08:34:48', 0),
(13, 'board_manu', 1, '3', '8.50', 'Kgs', '2020-07-10 08:48:29', 0),
(14, 'board_manu', 1, '4', '1.4', 'Kgs', '2020-07-10 08:48:29', 0),
(15, 'board_manu', 1, '', '', '', '2020-07-10 08:48:29', 0),
(16, 'board_manu', 2, '3', '15.50', 'Kgs', '2020-07-10 08:49:47', 0),
(17, 'board_manu', 2, '4', '2.25', 'Kgs', '2020-07-10 08:49:47', 0),
(18, 'board_manu', 2, '', '', '', '2020-07-10 08:49:47', 0),
(19, 'long_length', 10, '1', '1.25', 'Kgs', '2020-07-10 09:27:51', 0),
(20, 'long_length', 10, '1', '2.25', 'Kgs', '2020-07-10 09:27:51', 0),
(21, 'long_length', 10, '3', '3.25', 'Kgs', '2020-07-10 09:27:51', 0),
(22, 'board_manu', 3, '3', '10', 'Kgs', '2020-07-10 09:29:24', 0),
(23, 'board_manu', 3, '4', '10', 'Kgs', '2020-07-10 09:29:24', 0),
(24, 'board_manu', 3, '', '07', 'Kgs', '2020-07-10 09:29:24', 0),
(25, 'board_manu', 4, '3', '12', 'kgs', '2020-07-10 09:34:05', 0),
(26, 'board_manu', 4, '4', '12', 'kgs', '2020-07-10 09:34:05', 0),
(27, 'board_manu', 4, '1', '11', 'kgs', '2020-07-10 09:34:05', 0),
(28, 'board_manu', 5, '3', '1.25', 'Kgs', '2020-07-10 11:10:57', 0),
(29, 'board_manu', 5, '4', '1.25', 'Kgs', '2020-07-10 11:10:57', 0),
(30, 'board_manu', 5, '', '1.25', 'Kgs', '2020-07-10 11:10:57', 0),
(31, 'long_length', 11, '1', '1.25', 'Kgs', '2020-07-10 11:17:01', 0),
(32, 'long_length', 11, '1', '1.25', 'Kgs', '2020-07-10 11:17:01', 0),
(33, 'long_length', 11, '', '1.25', 'Kgs', '2020-07-10 11:17:01', 0),
(34, 'board_manu', 6, '3', '1.25', 'Kgs', '2020-07-10 11:18:40', 0),
(35, 'board_manu', 6, '4', '1.25', 'Kgs', '2020-07-10 11:18:40', 0),
(36, 'board_manu', 6, '', '1.25', 'Kgs', '2020-07-10 11:18:40', 0),
(37, 'board_manu', 7, '3', '', '', '2020-07-10 11:47:53', 0),
(38, 'board_manu', 7, '4', '', '', '2020-07-10 11:47:53', 0),
(39, 'board_manu', 7, '', '', '', '2020-07-10 11:47:53', 0),
(40, 'long_length', 12, '1', '1.25', 'Kgs', '2020-07-31 02:30:55', 0),
(41, 'long_length', 12, '', '', 'Kgs', '2020-07-31 02:30:55', 0),
(42, 'long_length', 12, '', '', 'Kgs', '2020-07-31 02:30:55', 0),
(43, 'long_length', 13, '1', '1.25', 'Kgs', '2020-07-31 02:32:12', 0),
(44, 'long_length', 13, '', '', 'Kgs', '2020-07-31 02:32:12', 0),
(45, 'long_length', 13, '', '', 'Kgs', '2020-07-31 02:32:12', 0),
(46, 'board_manu', 8, '3', '1.25', 'Kgs', '2020-07-31 02:49:16', 0),
(47, 'board_manu', 8, '4', '1.25', 'Kgs', '2020-07-31 02:49:16', 0),
(48, 'board_manu', 8, '', '', '', '2020-07-31 02:49:16', 0),
(49, 'board_manu', 9, '3', '20', 'Kgs', '2020-07-31 10:03:46', 0),
(50, 'board_manu', 9, '4', '6', 'Kgs', '2020-07-31 10:03:47', 0),
(51, 'board_manu', 9, '', '', '', '2020-07-31 10:03:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ta_glue`
--

CREATE TABLE `ta_glue` (
  `id` int(10) NOT NULL,
  `glue_type` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1->Active, 0->inactive',
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_glue`
--

INSERT INTO `ta_glue` (`id`, `glue_type`, `status`, `created_on`) VALUES
(1, 'D3 Regular', 1, '2019-12-08 00:01:59'),
(2, 'D3 Board', 1, '2019-12-08 00:02:07'),
(3, 'D4 Regular', 1, '2020-02-02 09:47:30'),
(4, 'Hardener', 1, '2020-02-02 09:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `ta_glue_opening_stock`
--

CREATE TABLE `ta_glue_opening_stock` (
  `id` int(10) NOT NULL,
  `glue_type` int(10) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `no_of_boxes` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `uom` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ta_gradation`
--

CREATE TABLE `ta_gradation` (
  `id` int(10) NOT NULL,
  `gradation` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1->Active, 0->inactive',
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_gradation`
--

INSERT INTO `ta_gradation` (`id`, `gradation`, `status`, `created_on`) VALUES
(1, 'AA', 1, '2019-12-08 00:01:42'),
(2, 'AB', 1, '2019-12-08 00:01:48'),
(3, 'AD', 0, '2020-02-02 09:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `ta_ll_manufacturing`
--

CREATE TABLE `ta_ll_manufacturing` (
  `llm_id` int(10) NOT NULL,
  `llm_date` date NOT NULL,
  `batch_no` varchar(200) NOT NULL,
  `type_of_wood` varchar(200) NOT NULL,
  `length` varchar(200) NOT NULL,
  `width` varchar(200) NOT NULL,
  `thickness` varchar(200) NOT NULL,
  `pieces` varchar(200) NOT NULL,
  `cbm` varchar(200) NOT NULL,
  `cft` varchar(200) NOT NULL,
  `glow_type` varchar(200) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1,
  `consumed` int(10) DEFAULT NULL,
  `packin_consumed` varchar(100) NOT NULL,
  `thickness_of_the_board` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_ll_manufacturing`
--

INSERT INTO `ta_ll_manufacturing` (`llm_id`, `llm_date`, `batch_no`, `type_of_wood`, `length`, `width`, `thickness`, `pieces`, `cbm`, `cft`, `glow_type`, `quantity`, `uom`, `created_on`, `status`, `consumed`, `packin_consumed`, `thickness_of_the_board`) VALUES
(1, '2020-04-15', '5', '1', '1200', '', '12', '200', '0.20', '7.12', '', '', '', '2020-04-14 14:02:15', 1, 300, '', '10'),
(2, '2020-04-15', '6', '2', '788', '', '23', '4233', '1.12', '39.39', '', '', '', '2020-06-04 16:07:54', 1, 34, '', '32'),
(3, '2020-04-15', '7', '3', '122', '456', '32', '1048', '0.10', '3.58', '1', '', '', '2020-06-17 12:44:30', 1, NULL, '', ''),
(4, '2020-06-18', '7', '3', '5435', '345', '21', '343', '13.51', '476.97', '', '', '', '2020-06-22 16:12:11', 1, NULL, '', '434'),
(5, '2020-06-18', '7', '3', '777', '77', '21', '77', '0.10', '3.42', '', '', '', '2020-06-22 16:13:40', 1, NULL, '', '77'),
(6, '2020-07-09', '2', '2', '2700', '75', '22', '1300', '5.79', '204.53', '', '', '', '2020-07-10 08:29:02', 1, 0, '', '18'),
(7, '2020-07-09', '1', '1', '2700', '75', '23', '1700', '7.92', '279.62', '', '', '', '2020-07-10 08:31:37', 1, 1650, '', '18'),
(8, '2020-07-10', '2', '2', '2700', '50', '22', '1600', '4.75', '167.82', '', '', '', '2020-07-10 08:33:13', 1, NULL, '', '18'),
(9, '2020-07-10', '2', '2', '2700', '75', '22', '140', '0.62', '22.03', '', '', '', '2020-07-10 08:34:47', 1, NULL, '', '18'),
(10, '2020-07-11', '3', '1', '2500', '100', '12', '150', '0.45', '15.89', '', '', '', '2020-07-10 09:27:51', 1, 85, '', '10'),
(11, '2020-07-11', '3', '1', '2700', '77', '12', '50', '0.12', '4.41', '', '', '', '2020-07-10 11:17:01', 1, 50, '', '7'),
(12, '2020-08-02', '4', '1', '2500', '75', '23', '100', '0.43', '15.23', '', '', '', '2020-07-31 02:30:55', 1, 100, '', '18'),
(13, '2020-08-02', '4', '1', '2500', '77', '23', '300', '1.33', '46.91', '', '', '', '2020-07-31 02:32:12', 1, NULL, '', '7');

-- --------------------------------------------------------

--
-- Table structure for table `ta_manual_production`
--

CREATE TABLE `ta_manual_production` (
  `mp_sno` int(10) NOT NULL,
  `mp_order_id` varchar(20) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `gradiation` varchar(20) NOT NULL,
  `design` varchar(200) NOT NULL,
  `order_product_name` varchar(100) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `thickness` varchar(20) NOT NULL,
  `order_insert_date` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ta_order`
--

CREATE TABLE `ta_order` (
  `order_sno` int(10) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `gradiation` varchar(20) NOT NULL,
  `design` varchar(200) NOT NULL,
  `order_product_name` varchar(100) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `thickness` varchar(20) NOT NULL,
  `order_insert_date` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ta_packing`
--

CREATE TABLE `ta_packing` (
  `packing_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `roll_no` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `type` varchar(200) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `boardmanu_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1->active, 0->inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_packing`
--

INSERT INTO `ta_packing` (`packing_id`, `start_date`, `end_date`, `roll_no`, `weight`, `type`, `brand`, `quantity`, `boardmanu_id`, `date`, `status`) VALUES
(1, '2020-07-01', '0000-00-00', '1', '50.50', '1', '', '40', 2, '2020-07-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ta_packing_material`
--

CREATE TABLE `ta_packing_material` (
  `pm_id` int(11) NOT NULL,
  `recieved_date` date DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `vehicle_number` varchar(20) DEFAULT NULL,
  `reference` varchar(20) DEFAULT NULL,
  `packing_material_type` varchar(20) DEFAULT NULL,
  `quantity` varchar(20) DEFAULT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `roles` varchar(20) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `gst` varchar(20) DEFAULT NULL,
  `sp_insert_date` datetime(6) DEFAULT NULL,
  `transport_charges` varchar(100) NOT NULL,
  `other_charges` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_packing_material`
--

INSERT INTO `ta_packing_material` (`pm_id`, `recieved_date`, `name`, `vehicle_number`, `reference`, `packing_material_type`, `quantity`, `uom`, `brand`, `roles`, `price`, `gst`, `sp_insert_date`, `transport_charges`, `other_charges`, `status`) VALUES
(1, '2020-07-01', 'Mrs. DAMAYANTI PATEL', 'AP10W3426', '', '1', NULL, NULL, '', NULL, '180', '18', '2020-07-14 05:41:19.000000', '200', '100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ta_packing_opening_stock`
--

CREATE TABLE `ta_packing_opening_stock` (
  `id` int(10) NOT NULL,
  `packing_type` int(10) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `uom` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ta_packing_type`
--

CREATE TABLE `ta_packing_type` (
  `id` int(10) NOT NULL,
  `packing_type` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1->Active, 0->inactive',
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_packing_type`
--

INSERT INTO `ta_packing_type` (`id`, `packing_type`, `status`, `created_on`) VALUES
(1, 'Plastic', 1, '2020-01-16 00:52:43'),
(2, 'Paper', 0, '2020-01-16 00:54:10'),
(3, 'Wire', 0, '2020-02-02 09:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `ta_products`
--

CREATE TABLE `ta_products` (
  `id` int(10) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ta_raw_glue`
--

CREATE TABLE `ta_raw_glue` (
  `rg_id` int(11) NOT NULL,
  `recieved_date` date NOT NULL,
  `name` varchar(150) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `glue_type` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `uom` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `no_of_boxes` int(10) NOT NULL,
  `rg_insert_date` datetime(6) NOT NULL,
  `transport_charges` varchar(100) NOT NULL,
  `other_charges` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ta_raw_wood`
--

CREATE TABLE `ta_raw_wood` (
  `rw_id` int(10) NOT NULL,
  `recieved_date` date NOT NULL,
  `name` varchar(150) NOT NULL,
  `vehicle_number` varchar(50) NOT NULL,
  `reference` varchar(150) NOT NULL,
  `wood_type` varchar(50) NOT NULL,
  `length` int(20) NOT NULL,
  `width` int(20) NOT NULL,
  `thickness` int(20) NOT NULL,
  `pieces` int(20) NOT NULL,
  `cft` varchar(20) NOT NULL,
  `cbm` varchar(20) NOT NULL,
  `weight` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `value` int(20) NOT NULL,
  `gst` int(20) NOT NULL,
  `insert_date` datetime(6) NOT NULL,
  `other_charges` varchar(100) NOT NULL,
  `transport_charges` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1-> active, 0->inactive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_raw_wood`
--

INSERT INTO `ta_raw_wood` (`rw_id`, `recieved_date`, `name`, `vehicle_number`, `reference`, `wood_type`, `length`, `width`, `thickness`, `pieces`, `cft`, `cbm`, `weight`, `price`, `value`, `gst`, `insert_date`, `other_charges`, `transport_charges`, `status`) VALUES
(1, '2020-07-10', 'Kilombero', 'AP10W3426', '', '1', 0, 0, 0, 0, '563.804', '15.965', 16350, 700, 394663, 18, '2020-07-10 07:43:34.000000', '2500', '38000', 0),
(2, '2020-07-01', 'Kilombero', 'AP10W3426', '', '1', 0, 0, 0, 0, '567.194', '16.061', 16750, 750, 425396, 18, '2020-07-10 08:13:34.000000', '3000', '35000', 1),
(3, '2020-07-09', 'Kilombero', 'AP10W3426', '', '2', 0, 0, 0, 0, '1852', '52.442', 28000, 440, 814880, 18, '2020-07-10 08:18:43.000000', '3000', '35000', 1),
(4, '2020-07-31', 'manager', 'ts1052556622', 'federal123', '1', 0, 0, 0, 0, '449.984', '12.742', 10000, 700, 314989, 18, '2020-07-31 02:35:07.000000', '3000', '30000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ta_roles`
--

CREATE TABLE `ta_roles` (
  `role_id` int(11) NOT NULL,
  `material_type_id` int(11) NOT NULL,
  `roles` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `uom` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_roles`
--

INSERT INTO `ta_roles` (`role_id`, `material_type_id`, `roles`, `quantity`, `uom`, `created_on`) VALUES
(1, 1, '5', 245, 'Kgs', '2020-07-14 05:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `ta_sanding`
--

CREATE TABLE `ta_sanding` (
  `sand_id` int(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  `grid_type` varchar(200) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `rough_qty` varchar(100) NOT NULL,
  `final_qty` varchar(100) NOT NULL,
  `boardmanu_id` int(11) NOT NULL,
  `end_grid_date` date NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_sanding`
--

INSERT INTO `ta_sanding` (`sand_id`, `type`, `grid_type`, `brand`, `qty`, `rough_qty`, `final_qty`, `boardmanu_id`, `end_grid_date`, `created_on`) VALUES
(1, 'old', '1', 'new', '', '25', '25', 2, '0000-00-00', '2020-07-10 09:30:27'),
(2, 'old', '2', 'new', '', '25', '25', 2, '0000-00-00', '2020-07-10 09:30:27'),
(3, 'new', '1', 'new1', '', '50', '50', 2, '0000-00-00', '2020-07-10 09:30:52'),
(4, 'new', '2', 'new1', '', '50', '50', 2, '0000-00-00', '2020-07-10 09:30:52'),
(5, 'old', '1', 'old', '', '150', '150', 4, '0000-00-00', '2020-07-10 09:37:11'),
(6, 'old', '2', 'old', '', '150', '150', 4, '0000-00-00', '2020-07-10 09:37:11'),
(7, 'old', '1', 'old1', '', '150', '150', 4, '0000-00-00', '2020-07-10 09:37:32'),
(8, 'old', '2', 'old1', '', '150', '150', 4, '0000-00-00', '2020-07-10 09:37:32'),
(9, 'old', '1', '', '', '15', '15', 3, '0000-00-00', '2020-07-14 05:33:26'),
(10, 'old', '2', '', '', '15', '15', 3, '0000-00-00', '2020-07-14 05:33:26'),
(11, 'old', '1', '', '', '30', '30', 3, '0000-00-00', '2020-07-14 05:33:43'),
(12, 'old', '2', '', '', '30', '30', 3, '0000-00-00', '2020-07-14 05:33:43'),
(13, 'old', '1', '', '', '40', '', 3, '0000-00-00', '2020-07-14 05:34:55'),
(14, 'old', '', '', '', '40', '', 3, '0000-00-00', '2020-07-14 05:34:55'),
(15, 'new', '', '', '', '', '40', 3, '0000-00-00', '2020-07-14 05:35:12'),
(16, 'new', '2', '', '', '', '40', 3, '0000-00-00', '2020-07-14 05:35:12'),
(17, 'old', '1', 'newton', '', '20', '', 3, '0000-00-00', '2020-07-31 03:32:36'),
(18, 'old', '', '', '', '20', '', 3, '0000-00-00', '2020-07-31 03:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `ta_sanding_grid_types`
--

CREATE TABLE `ta_sanding_grid_types` (
  `id` int(10) NOT NULL,
  `paper_grid` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1->Active, 0->inactive',
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_sanding_grid_types`
--

INSERT INTO `ta_sanding_grid_types` (`id`, `paper_grid`, `status`, `created_on`) VALUES
(1, 'rough(36 & 60) ', 1, '2020-07-10 07:53:01'),
(2, 'final(80 & 120)', 1, '2020-07-10 07:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `ta_sand_opening_stock`
--

CREATE TABLE `ta_sand_opening_stock` (
  `id` int(10) NOT NULL,
  `sand_type` int(10) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `uom` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ta_sand_paper`
--

CREATE TABLE `ta_sand_paper` (
  `sp_id` int(11) NOT NULL,
  `recieved_date` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `vehicle_number` varchar(20) DEFAULT NULL,
  `reference` varchar(20) DEFAULT NULL,
  `sand_paper_type` varchar(20) DEFAULT NULL,
  `quantity` varchar(20) DEFAULT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `gst` varchar(20) DEFAULT NULL,
  `sp_insert_date` datetime(6) DEFAULT NULL,
  `transport_charges` varchar(100) NOT NULL,
  `other_charges` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ta_seasoning_input`
--

CREATE TABLE `ta_seasoning_input` (
  `seasonin_id` int(10) NOT NULL,
  `type_of_wood` varchar(100) NOT NULL,
  `seasonin_batch` varchar(100) NOT NULL,
  `input_date` date NOT NULL,
  `input_time` time NOT NULL,
  `trolly1_weight` varchar(100) NOT NULL,
  `trolly1` varchar(100) NOT NULL,
  `trolly2_weight` varchar(100) NOT NULL,
  `trolly2` varchar(100) NOT NULL,
  `moisture_level` varchar(100) NOT NULL,
  `thickness` varchar(100) NOT NULL,
  `chamber` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_seasoning_input`
--

INSERT INTO `ta_seasoning_input` (`seasonin_id`, `type_of_wood`, `seasonin_batch`, `input_date`, `input_time`, `trolly1_weight`, `trolly1`, `trolly2_weight`, `trolly2`, `moisture_level`, `thickness`, `chamber`, `created_on`, `status`) VALUES
(1, '1', '1', '2020-07-04', '09:00:00', '3750', 'trolly1', '40000', '', '15', '23', 'chamber1', '2020-07-10 08:21:03', 0),
(2, '2', '2', '2020-07-02', '16:40:00', '3450', 'trolly3', '3700', 'trolly4', '16', '22', 'chamber2', '2020-07-10 08:22:36', 0),
(3, '1', '3', '2020-07-10', '19:56:00', '1500', 'trolly2', '1800', 'trolly4', '10', '08', 'chamber1', '2020-07-10 09:25:12', 0),
(4, '1', '4', '2020-07-31', '11:57:00', '1000', 'trolly2', '1000', 'trolly1', '7', '18', 'chamber1', '2020-07-31 02:28:40', 0),
(5, '1', '5', '2020-07-31', '18:45:00', '3500', 'trolly1', '3300', 'trolly2', '15', '23', 'chamber1', '2020-07-31 09:18:39', 0),
(6, '1', '6', '2020-07-20', '18:50:00', '3350', 'trolly3', '', '', '15', '30', 'chamber1', '2020-07-31 09:21:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ta_seasoning_output`
--

CREATE TABLE `ta_seasoning_output` (
  `seasonout_id` int(10) NOT NULL,
  `type_of_wood` varchar(100) NOT NULL,
  `seasonout_batch` varchar(100) NOT NULL,
  `output_date` date NOT NULL,
  `output_time` time NOT NULL,
  `trolly1_weight` varchar(100) NOT NULL,
  `trolly1` varchar(100) NOT NULL,
  `trolly2_weight` varchar(100) NOT NULL,
  `trolly2` varchar(100) NOT NULL,
  `moisture_level` varchar(100) NOT NULL,
  `total_weight` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `cft` varchar(100) NOT NULL,
  `per_cft_weight` varchar(100) NOT NULL,
  `total_cft` varchar(200) NOT NULL,
  `thickness` varchar(100) NOT NULL,
  `chamber` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1,
  `price_seasoning_per_cft` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_seasoning_output`
--

INSERT INTO `ta_seasoning_output` (`seasonout_id`, `type_of_wood`, `seasonout_batch`, `output_date`, `output_time`, `trolly1_weight`, `trolly1`, `trolly2_weight`, `trolly2`, `moisture_level`, `total_weight`, `weight`, `cft`, `per_cft_weight`, `total_cft`, `thickness`, `chamber`, `created_on`, `status`, `price_seasoning_per_cft`) VALUES
(1, '1', '1', '2020-07-09', '16:00:00', '3600', '', '3850', '', '7', '7450.000', '24.79', '1.00', '24.79', '300.52', '23', 'chamber1', '2020-07-10 08:25:17', 1, '100'),
(2, '2', '2', '2020-07-08', '16:40:00', '3350', '', '3600', '', '7', '6950.000', '17', '1.02', '16.67', '417.00', '22', 'chamber2', '2020-07-10 08:26:30', 1, '100'),
(3, '2', '2', '0000-00-00', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', 'chamber2', '2020-07-10 08:26:32', 1, ''),
(4, '1', '3', '2020-07-11', '20:56:00', '1200', '', '1600', '', '10', '2800.000', '1500', '2.10', '714.29', '3.92', '12', 'chamber1', '2020-07-10 09:26:04', 1, '200'),
(5, '1', '4', '2020-08-02', '11:59:00', '950', '', '950', '', '7', '1900.000', '25', '1.02', '24.51', '77.52', '18', 'chamber1', '2020-07-31 02:29:39', 1, '50'),
(6, '1', '5', '2020-07-30', '18:52:00', '3400', '', '3200', '', '7', '6600.000', '28', '1.08', '25.93', '254.57', '23', 'chamber1', '2020-07-31 09:23:57', 1, '100');

-- --------------------------------------------------------

--
-- Table structure for table `ta_season_batch_nos`
--

CREATE TABLE `ta_season_batch_nos` (
  `batch_id` int(10) NOT NULL,
  `seasonin_id` int(10) NOT NULL,
  `chamber` varchar(50) NOT NULL,
  `batch_no` varchar(100) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1->active, 0->inactrive',
  `crated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(1) NOT NULL DEFAULT 1 COMMENT '1->Not Deleted, 0->deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_season_batch_nos`
--

INSERT INTO `ta_season_batch_nos` (`batch_id`, `seasonin_id`, `chamber`, `batch_no`, `status`, `crated_on`, `is_deleted`) VALUES
(1, 0, 'chamber1', 'SC1B1', 0, '2020-07-10 08:21:03', 1),
(2, 0, 'chamber2', 'SC2B1', 0, '2020-07-10 08:22:36', 1),
(3, 0, 'chamber1', 'SC1B2', 1, '2020-07-10 09:25:12', 1),
(4, 0, 'chamber1', 'SC1B3', 0, '2020-07-31 02:28:40', 1),
(5, 0, 'chamber1', 'SC1B4', 1, '2020-07-31 09:18:39', 1),
(6, 0, 'chamber1', 'SC1B5', 1, '2020-07-31 09:21:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ta_wood_opening_stock`
--

CREATE TABLE `ta_wood_opening_stock` (
  `id` int(10) NOT NULL,
  `wood_type` int(10) NOT NULL,
  `cft` varchar(20) NOT NULL,
  `cbm` varchar(20) NOT NULL,
  `weight` int(20) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ta_wood_type`
--

CREATE TABLE `ta_wood_type` (
  `id` int(10) NOT NULL,
  `wood_type` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1->Active, 0->inactive',
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ta_wood_type`
--

INSERT INTO `ta_wood_type` (`id`, `wood_type`, `status`, `created_on`) VALUES
(1, 'Teak Wood', 1, '2020-07-09 12:22:33'),
(2, 'Pine Wood', 1, '2020-07-10 07:39:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ta_board_manufacturing`
--
ALTER TABLE `ta_board_manufacturing`
  ADD PRIMARY KEY (`bm_id`);

--
-- Indexes for table `ta_consumed_glue`
--
ALTER TABLE `ta_consumed_glue`
  ADD PRIMARY KEY (`glue_id`),
  ADD KEY `wood_id` (`wood_id`);

--
-- Indexes for table `ta_glue`
--
ALTER TABLE `ta_glue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_glue_opening_stock`
--
ALTER TABLE `ta_glue_opening_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_gradation`
--
ALTER TABLE `ta_gradation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_ll_manufacturing`
--
ALTER TABLE `ta_ll_manufacturing`
  ADD PRIMARY KEY (`llm_id`);

--
-- Indexes for table `ta_manual_production`
--
ALTER TABLE `ta_manual_production`
  ADD PRIMARY KEY (`mp_sno`);

--
-- Indexes for table `ta_order`
--
ALTER TABLE `ta_order`
  ADD PRIMARY KEY (`order_sno`);

--
-- Indexes for table `ta_packing`
--
ALTER TABLE `ta_packing`
  ADD PRIMARY KEY (`packing_id`);

--
-- Indexes for table `ta_packing_material`
--
ALTER TABLE `ta_packing_material`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `ta_packing_opening_stock`
--
ALTER TABLE `ta_packing_opening_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_packing_type`
--
ALTER TABLE `ta_packing_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_products`
--
ALTER TABLE `ta_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_raw_glue`
--
ALTER TABLE `ta_raw_glue`
  ADD PRIMARY KEY (`rg_id`);

--
-- Indexes for table `ta_raw_wood`
--
ALTER TABLE `ta_raw_wood`
  ADD PRIMARY KEY (`rw_id`);

--
-- Indexes for table `ta_roles`
--
ALTER TABLE `ta_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `ta_sanding`
--
ALTER TABLE `ta_sanding`
  ADD PRIMARY KEY (`sand_id`);

--
-- Indexes for table `ta_sanding_grid_types`
--
ALTER TABLE `ta_sanding_grid_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_sand_opening_stock`
--
ALTER TABLE `ta_sand_opening_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_sand_paper`
--
ALTER TABLE `ta_sand_paper`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `ta_seasoning_input`
--
ALTER TABLE `ta_seasoning_input`
  ADD PRIMARY KEY (`seasonin_id`);

--
-- Indexes for table `ta_seasoning_output`
--
ALTER TABLE `ta_seasoning_output`
  ADD PRIMARY KEY (`seasonout_id`);

--
-- Indexes for table `ta_season_batch_nos`
--
ALTER TABLE `ta_season_batch_nos`
  ADD PRIMARY KEY (`batch_id`,`status`);

--
-- Indexes for table `ta_wood_opening_stock`
--
ALTER TABLE `ta_wood_opening_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ta_wood_type`
--
ALTER TABLE `ta_wood_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `admin_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ta_board_manufacturing`
--
ALTER TABLE `ta_board_manufacturing`
  MODIFY `bm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ta_consumed_glue`
--
ALTER TABLE `ta_consumed_glue`
  MODIFY `glue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `ta_glue`
--
ALTER TABLE `ta_glue`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ta_glue_opening_stock`
--
ALTER TABLE `ta_glue_opening_stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ta_gradation`
--
ALTER TABLE `ta_gradation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ta_ll_manufacturing`
--
ALTER TABLE `ta_ll_manufacturing`
  MODIFY `llm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ta_manual_production`
--
ALTER TABLE `ta_manual_production`
  MODIFY `mp_sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ta_order`
--
ALTER TABLE `ta_order`
  MODIFY `order_sno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ta_packing`
--
ALTER TABLE `ta_packing`
  MODIFY `packing_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ta_packing_material`
--
ALTER TABLE `ta_packing_material`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ta_packing_opening_stock`
--
ALTER TABLE `ta_packing_opening_stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ta_packing_type`
--
ALTER TABLE `ta_packing_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ta_products`
--
ALTER TABLE `ta_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ta_raw_glue`
--
ALTER TABLE `ta_raw_glue`
  MODIFY `rg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ta_raw_wood`
--
ALTER TABLE `ta_raw_wood`
  MODIFY `rw_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ta_roles`
--
ALTER TABLE `ta_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ta_sanding`
--
ALTER TABLE `ta_sanding`
  MODIFY `sand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ta_sanding_grid_types`
--
ALTER TABLE `ta_sanding_grid_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ta_sand_opening_stock`
--
ALTER TABLE `ta_sand_opening_stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ta_sand_paper`
--
ALTER TABLE `ta_sand_paper`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ta_seasoning_input`
--
ALTER TABLE `ta_seasoning_input`
  MODIFY `seasonin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ta_seasoning_output`
--
ALTER TABLE `ta_seasoning_output`
  MODIFY `seasonout_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ta_season_batch_nos`
--
ALTER TABLE `ta_season_batch_nos`
  MODIFY `batch_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ta_wood_opening_stock`
--
ALTER TABLE `ta_wood_opening_stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ta_wood_type`
--
ALTER TABLE `ta_wood_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
