-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 04:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_table`
--

CREATE TABLE `appointment_table` (
  `appointment_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `patient_email` varchar(50) NOT NULL,
  `patient_phone` varchar(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `days` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `appointment_time` int(11) NOT NULL,
  `status_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Token_num` int(11) NOT NULL,
  `Approve/Reject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_table`
--

INSERT INTO `appointment_table` (`appointment_id`, `vaccine_id`, `patient_id`, `patient_name`, `patient_email`, `patient_phone`, `hospital_id`, `days`, `appointment_time`, `status_id`, `Token_num`, `Approve/Reject`) VALUES
(1, 7, 1, 'Neal Cooper', 'neal@gmail.com', '2124166610', 1, '3', 11, '1', 527, 1),
(2, 4, 2, 'Fevzi Hameed', 'fevzi@gmail.com', '2149817722', 3, '3', 6, '1', 772, 1),
(3, 2, 3, 'Farhad Gill', 'farhad@gmail.com', '2426362104', 1, '3', 5, '2', 560, 1),
(4, 13, 4, 'Mubashshir  Javid', 'mubashshir@gmail.com', '9221242676', 2, '3', 5, '2', 610, 1),
(5, 1, 5, 'Raaida Rashed', 'raaida@gmail.com', '9232182245', 7, '1', 7, '3', 556, 2),
(6, 7, 6, 'Fateena Khalid', 'fateena@gmail.com', '9221241778', 6, '2', 11, '1', 613, 1),
(7, 6, 9, 'Nizaam Saleem', 'nizaam@gmail.com', '9251458018', 7, '6', 5, '3', 895, 0),
(8, 13, 10, 'Hamid Imran', 'hamid@gmail.com', '9255421627', 8, '4', 5, '1', 561, 1),
(9, 6, 11, 'Hamid Khan', 'hamid_khan@gmail.com', '9243255509', 3, '3', 10, '3', 162, 0),
(10, 11, 11, 'Fevzi Ahmed', 'fevziahmed@gmail.com', '2149817722', 8, '2', 10, '3', 571, 2);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `D_id` int(11) NOT NULL,
  `D_days` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`D_id`, `D_days`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `H_id` int(11) NOT NULL,
  `H_Name` varchar(50) NOT NULL,
  `H_Email` varchar(50) NOT NULL,
  `H_Password` varchar(255) NOT NULL,
  `H_Address` varchar(255) NOT NULL,
  `H_Tel` bigint(12) NOT NULL,
  `H_Role` int(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`H_id`, `H_Name`, `H_Email`, `H_Password`, `H_Address`, `H_Tel`, `H_Role`) VALUES
(1, 'Jinnah Hospital Karachi', 'jinnah@jinnah.com', 'MTIzNA==', 'JPMC Hospital Rd, Karachi Cantonment, Karachi', 2199201300, 3),
(2, 'Abbassi Shaheed Hospital', 'Abbassi@gmail.com', 'MTIzNA==', 'Jhormor Abbasi Shaheed Hospital, Block 3 Nazimabad, Karachi', 219260400, 3),
(3, 'Aga Khan University Hospital', 'aga@gmail.coma', 'MTIzNA==', 'National Stadium Rd, Aga Khan University Hospital, Karachi', 21111911911, 3),
(6, 'Liaquat National Hospital', 'liaquat@gmail.com', 'MTIzNA==', 'Stadium Road, Karachi 74800, Pakistan', 21111456456, 3),
(7, 'Dr. Ruth K.M. Pfau, Civil Hospital Karachi', 'ruth@gmail.com', 'MTIzNA==', 'Mission Rd, near Civil Hospital Masjid، New Labour Colony Nanakwara, Karachi', 2199215740, 3),
(8, 'Burhani Hospital', 'burhani@gmail.com', 'MTIzNA==', 'Faiz Muhammad Fateh Ali Rd, New Chali, Karachi', 2132212572, 3);

-- --------------------------------------------------------

--
-- Table structure for table `list_of_vaccines`
--

CREATE TABLE `list_of_vaccines` (
  `drug_id` int(11) NOT NULL,
  `drug_Name` varchar(100) NOT NULL,
  `drug_Type` varchar(100) NOT NULL,
  `drug_Availability` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_of_vaccines`
--

INSERT INTO `list_of_vaccines` (`drug_id`, `drug_Name`, `drug_Type`, `drug_Availability`) VALUES
(1, 'Anthrax', 'AVA (BioThrax)', 'AVAILABLE'),
(2, 'Vaxchora', 'Cholera', 'AVAILABLE'),
(3, 'DTaP (Daptacel, Infanrix)', 'Diphtheria', 'UNAVAILABLE'),
(4, 'Td (Tenivac, generic)', 'Diphtheria', 'AVAILABLE'),
(5, 'DT (-generic-)', 'Diphtheria', 'AVAILABLE'),
(6, 'Tdap (Adacel, Boostrix)', 'Diphtheria', 'AVAILABLE'),
(7, 'DTaP-IPV (Kinrix, Quadracel)', 'Diphtheria', 'AVAILABLE'),
(8, 'DTaP-HepB-IPV (Pediarix)', 'Diphtheria', 'UNAVAILABLE'),
(9, 'DTaP-IPV/Hib (Pentacel)', 'Diphtheria', 'UNAVAILABLE'),
(10, 'HepA (Havrix, Vaqta)', 'Hepatitis A', 'UNAVAILABLE'),
(11, 'HepA-HepB (Twinrix)', 'Hepatitis A', 'AVAILABLE'),
(12, 'Hib (ActHIB, PedvaxHIB, Hiberix)', 'Haemophilus influenzae type b (Hib)', 'AVAILABLE'),
(13, 'Polio (Ipol)', 'Polio', 'AVAILABLE'),
(14, 'YF (YF-Vax)', 'Yellow Fever', 'UNAVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `patient_table`
--

CREATE TABLE `patient_table` (
  `patient_id` int(11) NOT NULL,
  `patient_email_address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `patient_password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `patient_full_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `patient_father_name` varchar(50) NOT NULL,
  `patient_date_of_birth` date NOT NULL,
  `patient_gender` enum('Male','Female') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `patient_address` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `patient_phone_no` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `patient_added_on` date NOT NULL,
  `patient_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_table`
--

INSERT INTO `patient_table` (`patient_id`, `patient_email_address`, `patient_password`, `patient_full_name`, `patient_father_name`, `patient_date_of_birth`, `patient_gender`, `patient_address`, `patient_phone_no`, `patient_added_on`, `patient_role`) VALUES
(1, 'neal@gmail.com', 'MTIzNA==', 'Neal Cooper', 'Neal Cooper', '1990-12-21', 'Male', 'Textile Plaza Mumtaz Hassan Road', '2124166610', '2022-11-08', 2),
(2, 'fevzi@gmail.com', 'MTIzNA==', 'Fevzi Hameed', 'Hameed', '2000-06-12', 'Male', 'Block-10, Gulshan-e-Iqbal, Karachi', '2149817722', '2022-11-10', 2),
(3, 'farhad@gmail.com', 'MTIzNA==', 'Farhad Gill', 'Gill', '1994-10-15', 'Male', 'Melcod Road', '2426362104', '2022-11-10', 2),
(4, 'mubashshir@gmail.com', 'MTIzNA==', 'Mubashshir  Javid', 'Javid', '1980-01-01', 'Male', 'New Neham Rd.Boulton Market', '9221242676', '2022-11-10', 2),
(5, 'raaida@gmail.com', 'MTIzNA==', 'Raaida Rashed', 'Rashed', '1998-05-30', 'Female', 'Plot # 80-D, Sector I-10/3', '9232182245', '2022-11-10', 2),
(6, 'fateena@gmail.com', 'MTIzNA==', 'Fateena Khalid', 'Khalid', '1992-12-02', 'Female', 'Shahnaz Arcade Shaheed-e-Millat Road', '9221241778', '2022-11-10', 2),
(7, 'abdulmaalik@gmail.com', 'MTIzNA==', 'Abdul Maalik Saad', 'Saad', '2001-12-18', 'Male', '145-S Quaide-e-Azam Industrial Estate Kot Lakhpat Lahore', '9251458018', '2022-11-10', 2),
(8, 'ayesha@gmail.com', 'MTIzNA==', 'Ayesha Saeed', 'Saeed', '1999-06-23', 'Female', 'Rabia Palace, Main Rashid Minhas Road, Karachi', '9255421627', '2022-11-10', 2),
(9, 'nizaam@gmail.com', 'MTIzNA==', 'Nizaam Saleem', 'Saleem', '1991-11-19', 'Male', '282-Abdullah Haroon Road', '9221530139', '2022-11-10', 2),
(10, 'hamid@gmail.com', 'MTIzNA==', 'Hamid Imran', 'Imran', '2000-12-12', 'Male', '2nd Floor, Shadman Plaza Shadman, Lahore', '9252355528', '2022-11-10', 2),
(11, 'hamid_khan@gmail.com', 'MTIzNA==', 'Hamid Khan', 'Hassan', '1995-10-05', 'Male', 'B-7 Sector 13a Scheme 33', '9243255509', '2022-11-10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'Vaccinated'),
(2, 'In Process'),
(3, 'Booked'),
(4, 'Not Vaccinated');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `T_id` int(11) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`T_id`, `Time`) VALUES
(1, '01:00:00'),
(2, '02:00:00'),
(3, '03:00:00'),
(4, '04:00:00'),
(5, '05:00:00'),
(6, '06:00:00'),
(7, '07:00:00'),
(8, '08:00:00'),
(9, '09:00:00'),
(10, '10:00:00'),
(11, '11:00:00'),
(12, '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `U_id` int(11) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `U_Email` varchar(255) NOT NULL,
  `U_Password` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `User_Status` int(1) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_id`, `Full_Name`, `Username`, `U_Email`, `U_Password`, `user_img`, `User_Status`, `Role`) VALUES
(1, 'vms admin', 'VMS', 'admin@admin.com', 'QWRtaW5fMDE=', 'a.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `u_role`
--

CREATE TABLE `u_role` (
  `id` int(11) NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_role`
--

INSERT INTO `u_role` (`id`, `Role`) VALUES
(1, 'Admin'),
(2, 'Patient'),
(3, 'Hospital');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_table`
--
ALTER TABLE `appointment_table`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`D_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`H_id`);

--
-- Indexes for table `list_of_vaccines`
--
ALTER TABLE `list_of_vaccines`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `patient_table`
--
ALTER TABLE `patient_table`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`U_id`),
  ADD UNIQUE KEY `U_Email` (`U_Email`);

--
-- Indexes for table `u_role`
--
ALTER TABLE `u_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_table`
--
ALTER TABLE `appointment_table`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `D_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `H_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `list_of_vaccines`
--
ALTER TABLE `list_of_vaccines`
  MODIFY `drug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patient_table`
--
ALTER TABLE `patient_table`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `T_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `U_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
