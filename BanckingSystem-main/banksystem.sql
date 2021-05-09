-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 08:29 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `banksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Acc_Number` int(25) NOT NULL,
  `IFSC` varchar(20) NOT NULL,
  `Balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`UserID`, `Name`, `Email`, `Acc_Number`, `IFSC`, `Balance`) VALUES
(10000201,'Neet','patelneet074@gmail.com',235689,'AS235689SA',70000),
(10000202,'Shyam','patelShyam4@gmail.com',568923,'AS568923SA',52000),
(10000203,'Urvish','patelUrvish754@gmail.com',895623,'AS895623SA',30000),
(10000204,'Khshbu','patelkhushbu27@gmail.com',124578,'AS124578SA',60000),
(10000205,'Drashti','Drashtithakker111@gmail.com',457812,'AS457812SA',50000),
(10000206,'Dhara','prajapatidhara100@gmail.com',784124,'AS784124SA',40000),
(10000207,'Harsh','prajapatiharsh101@gmail.com',152625,'AS152625SA',20000),
(10000208,'Jitu','jitudan186@gmail.com',485958,'AS485958SA',10000),
(10000209,'kanhapal','kanhapal108@gmail.com',452389,'AS452389SA',90000),
(10000210,'Darshan','kadiadarshan111@gmail.com',894523,'AS894523SA',35000);

----------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `s_name` varchar(10) NOT NULL,
  `s_acc_no` int(11) NOT NULL,
  `r_name` varchar(10) NOT NULL,
  `r_acc_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`s_name`, `s_acc_no`, `r_name`, `r_acc_no`, `amount`, `date_time`) VALUES ('Neet', 235689, 'Shyam', 892356, 1000, 2021-05-08 14:38:21);



----------------------------------------------------------