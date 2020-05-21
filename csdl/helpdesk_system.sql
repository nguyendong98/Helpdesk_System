-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 05:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `idfaq` int(11) NOT NULL,
  `tensuco` varchar(255) NOT NULL,
  `hinhanhsuco` varchar(255) DEFAULT NULL,
  `chitiet` varchar(255) NOT NULL,
  `khacphuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`idfaq`, `tensuco`, `hinhanhsuco`, `chitiet`, `khacphuc`) VALUES
(1, 'Update 1', 'upload/Zalo.jpg', 'details 1', 'solve 1'),
(2, 'Update 2.2', 'upload/Twitter2.png', ' details 2.2', 'solve 2.2'),
(3, 'Sự cố 3', 'upload/FB.png', 'Chi tiết 3 ', 'Chi tiết 3');

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
(4, 'Tây', '321707181', 'Can Tho', '0354860101', 'fullstack', 'fullstack', 4),
(5, 'Hoàng Duy', '321707181', 'Phong Điền - Cần Thơ', '0354860101', 'fullstack', 'fullstack', 5),
(6, 'Khánh Văn', '321707181', 'Cầu Kè - Trà Vinh', '0354860101', 'fullstack', 'fullstack', 6);

-- --------------------------------------------------------

--
-- Table structure for table `nhiemvuphancong`
--

CREATE TABLE `nhiemvuphancong` (
  `NVPC_ID` int(11) NOT NULL,
  `NVPC_IDSUCO` int(11) NOT NULL,
  `NVPC_IDNHANVIEN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhiemvuphancong`
--

INSERT INTO `nhiemvuphancong` (`NVPC_ID`, `NVPC_IDSUCO`, `NVPC_IDNHANVIEN`) VALUES
(2, 8, 3);

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
(2, 2, 'RAM', '2020-03-02', 'RAM of DELL', 1),
(3, 3, 'Máy in', '2020-05-14', 'Máy in Toshiaba', 1),
(4, 3, 'Điện thoại bàn', '2020-05-13', 'Điện thoại bàn không dây', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suco`
--

CREATE TABLE `suco` (
  `SC_ID` int(11) NOT NULL,
  `SC_IDNVTHONGBAO` int(11) NOT NULL,
  `SC_IDNVGAPSUCO` int(11) NOT NULL,
  `SC_THOIDIEMGAP` date NOT NULL,
  `SC_THOIDIEMGHINHAN` timestamp NOT NULL DEFAULT current_timestamp(),
  `SC_DIADIEM` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SC_IDPHANCUNG` int(11) NOT NULL,
  `SC_MOTACHITIET` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SC_ANHMANHINH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SC_IDTRANGTHAI` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suco`
--

INSERT INTO `suco` (`SC_ID`, `SC_IDNVTHONGBAO`, `SC_IDNVGAPSUCO`, `SC_THOIDIEMGAP`, `SC_THOIDIEMGHINHAN`, `SC_DIADIEM`, `SC_IDPHANCUNG`, `SC_MOTACHITIET`, `SC_ANHMANHINH`, `SC_IDTRANGTHAI`) VALUES
(4, 1, 3, '2020-03-01', '2020-03-14 16:58:01', 'Cần Thơ', 2, 'Hư hỏng nặng', 'RAM.jpg', 'Chưa xử lí'),
(8, 1, 1, '2020-04-19', '2020-04-19 16:23:04', 'Bến Tre', 1, 'Hư hỏng nhẹ', 'cpu.jpg', 'Đang xử lí'),
(9, 1, 1, '2020-04-20', '2020-04-20 05:17:01', 'Bến Tre', 1, 'Bụi bẩn', '404.png', 'Chưa xử lí'),
(10, 1, 3, '2020-05-15', '2020-05-15 02:25:23', 'Phòng tài chính', 3, 'Kẹt giấy', 'mayin.jpg', 'Chưa xử lí'),
(11, 1, 6, '2020-05-15', '2020-05-15 02:26:49', 'Phòng nhân sự', 4, 'Điện thoại bàn bị rè', 'dienthoaiban.jpg', 'Chưa xử lí'),
(12, 1, 1, '2020-05-17', '2020-05-17 05:49:16', 'Phòng tài chính', 3, 'Hết mực in', 'mayinhetmuc.jpg', 'Chưa xử lí');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TK_ID` int(11) NOT NULL,
  `TK_USERNAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TK_PASSWORD` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TK_AVATAR` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TK_ROLE` int(11) NOT NULL,
  `TK_TYPEOFROLE` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`TK_ID`, `TK_USERNAME`, `TK_PASSWORD`, `TK_AVATAR`, `TK_ROLE`, `TK_TYPEOFROLE`) VALUES
(1, 'dong', 'dong', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRE8I1sMJ345KiHDSGqnzIilqS9mBrAR3tbsV2gCz4CNkjoIRWu&usqp=CAU', 2, 'nhan vien'),
(2, 'phi', 'phi', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSb816Kds8K82sZ0u01iPgjHmmDhoNYb4kbVTKTs-rC5-FQUMFm&usqp=CAU', 0, 'admin'),
(3, 'nhan', 'nhan', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT1poWacnnFiWZCfDstLrxkVkJ7ZNPvFjJ5s0966NCkBr7RQefR&usqp=CAU', 1, 'kythuatvien'),
(4, 'tay', 'tay', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTMqaVCGKoIN8C_K-kgoyd0IPIlPCv_2WmPJWcJNkwXmE8y3vS6&usqp=CAU', 2, 'nhanvien'),
(5, 'hoangduy', 'hoangduy', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTWdjFblyAUcfBbMOJePDIgGW1FbwzNCijHdN0r_ZzWtJeVlhBw&usqp=CAU', 1, 'kythuatvien'),
(6, 'khanhvan', 'khanhvan', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQSByNn40Ar342uKC2BbHiMp5_Lw5kAjllo_QgRLZeiWtQ3nu09&usqp=CAU', 1, 'kythuatvien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idfaq`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`NV_ID`);

--
-- Indexes for table `nhiemvuphancong`
--
ALTER TABLE `nhiemvuphancong`
  ADD PRIMARY KEY (`NVPC_ID`),
  ADD KEY `NVPC_IDNHANVIEN` (`NVPC_IDNHANVIEN`),
  ADD KEY `NVPC_IDSUCO` (`NVPC_IDSUCO`);

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
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `idfaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `NV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nhiemvuphancong`
--
ALTER TABLE `nhiemvuphancong`
  MODIFY `NVPC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phancung`
--
ALTER TABLE `phancung`
  MODIFY `PC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suco`
--
ALTER TABLE `suco`
  MODIFY `SC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `TK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhiemvuphancong`
--
ALTER TABLE `nhiemvuphancong`
  ADD CONSTRAINT `nhiemvuphancong_ibfk_1` FOREIGN KEY (`NVPC_IDNHANVIEN`) REFERENCES `nhanvien` (`NV_ID`),
  ADD CONSTRAINT `nhiemvuphancong_ibfk_2` FOREIGN KEY (`NVPC_IDSUCO`) REFERENCES `suco` (`SC_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
