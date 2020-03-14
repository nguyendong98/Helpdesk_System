-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 05:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `NV_ID` int(11) NOT NULL,
  `NV_HOTEN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NV_CMND` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NV_DIACHI` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NV_DIENTHOAI` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NV_CHUYENMON` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NV_PHONGBAN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NV_IDTAIKHOAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`NV_ID`, `NV_HOTEN`, `NV_CMND`, `NV_DIACHI`, `NV_DIENTHOAI`, `NV_CHUYENMON`, `NV_PHONGBAN`, `NV_IDTAIKHOAN`) VALUES
(1, 'Phú Đông', '321707181', 'Ba Tri - Ben Tre', '0354860101', 'fullstack', 'fullstack', 1),
(2, 'Nhựt Phi', '321707181', 'Can Tho', '0354860101', 'fullstack', 'fullstack', 2),
(3, 'Thanh Nhân', '321707181', 'Can Tho', '0354860101', 'fullstack', 'fullstack', 3),
(4, 'Tây', '321707181', 'Can Tho', '0354860101', 'fullstack', 'fullstack', 4);

-- --------------------------------------------------------

--
-- Table structure for table `phancung`
--

CREATE TABLE `phancung` (
  `PC_ID` int(11) NOT NULL,
  `PC_IDNHANVIEN` int(11) NOT NULL,
  `PC_TEN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PC_NGAYMUA` date NOT NULL,
  `PC_MOTA` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PC_IDLOAIPHANCUNG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phancung`
--

INSERT INTO `phancung` (`PC_ID`, `PC_IDNHANVIEN`, `PC_TEN`, `PC_NGAYMUA`, `PC_MOTA`, `PC_IDLOAIPHANCUNG`) VALUES
(1, 1, 'CPU', '2020-03-01', 'CPU of DELL', 1),
(2, 2, 'RAM', '2020-03-02', 'RAM of DELL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suco`
--

CREATE TABLE `suco` (
  `SC_ID` int(11) NOT NULL,
  `SC_IDNVTHONGBAO` int(11) NOT NULL,
  `SC_IDNVGAPSUCO` int(11) NOT NULL,
  `SC_THOIDIEMGAP` date NOT NULL,
  `SC_THOIDIEMGHINHAN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SC_DIADIEM` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SC_IDPHANCUNG` int(11) NOT NULL,
  `SC_MOTACHITIET` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SC_ANHMANHINH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SC_IDTRANGTHAI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suco`
--

INSERT INTO `suco` (`SC_ID`, `SC_IDNVTHONGBAO`, `SC_IDNVGAPSUCO`, `SC_THOIDIEMGAP`, `SC_THOIDIEMGHINHAN`, `SC_DIADIEM`, `SC_IDPHANCUNG`, `SC_MOTACHITIET`, `SC_ANHMANHINH`, `SC_IDTRANGTHAI`) VALUES
(2, 1, 3, '2020-03-02', '2020-03-14 16:29:09', '2020-03-02', 1, 'Hỏng nặng', '2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TK_ID` int(11) NOT NULL,
  `TK_USERNAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TK_PASSWORD` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TK_ROLE` int(11) NOT NULL,
  `TK_TYPEOFROLE` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`TK_ID`, `TK_USERNAME`, `TK_PASSWORD`, `TK_ROLE`, `TK_TYPEOFROLE`) VALUES
(1, 'dong', 'dong', 2, 'Nhan vien'),
(2, 'phi', 'phi', 0, 'Admin'),
(3, 'nhan', 'nhan', 1, 'kythuatvien'),
(4, 'tay', 'tay', 2, 'nhanvien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`NV_ID`);

--
-- Indexes for table `phancung`
--
ALTER TABLE `phancung`
  ADD PRIMARY KEY (`PC_ID`);

--
-- Indexes for table `suco`
--
ALTER TABLE `suco`
  ADD PRIMARY KEY (`SC_ID`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TK_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `NV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phancung`
--
ALTER TABLE `phancung`
  MODIFY `PC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suco`
--
ALTER TABLE `suco`
  MODIFY `SC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `TK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
