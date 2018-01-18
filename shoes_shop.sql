-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 02:46 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(15) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `ip_add`, `qty`) VALUES
(15, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(50) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Boys'),
(4, 'Girls');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customers_id` int(11) NOT NULL,
  `customers_namereal` text CHARACTER SET utf8 NOT NULL,
  `customers_ip` varchar(255) CHARACTER SET utf8 NOT NULL,
  `customers_name` text CHARACTER SET utf8 NOT NULL,
  `customers_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `customers_pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `customers_address` text CHARACTER SET utf8 NOT NULL,
  `customers_contact` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customers_id`, `customers_namereal`, `customers_ip`, `customers_name`, `customers_email`, `customers_pass`, `customers_address`, `customers_contact`) VALUES
(21, 'Hồ Văn Việt', '', 'viet123', 'triphuong10111996@gmail.com', '123', '18/19 Đỗ Nhuận', '01365599662'),
(22, 'Võ Tri Phương', '', 'triphuong', 'triphuong10111996@gmail.com', '123', '18/19 Đỗ Nhuận', '01682936502'),
(23, 'Võ Văn Tưởng', '', 'tuong123', 'vantuong@gmail.com', 'tuong123', '65 sơn kỳ ,P. sơn kỳ . Q. Tân Phú ,TP.HCM', '01633577976'),
(24, 'Nguyễn Văn Quân', '', 'quan123', 'Vanquan@gmail.com', '123', 'Bình An ,Thăng Bình, Quảng Nam', '0120256893'),
(25, 'Lê Thị Bích Dung', '', 'dung', 'bichdung@gmail.com', 'dung123', 'Ba Đình , Hà Nội', '01623513658'),
(26, 'Lê Quang Hòa', '', 'hoa', 'quanghoa@gmail.com', '123', 'Cẩm Lệ, Đà Nẵng', '0823656585');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `order_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `order_phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `order_sp_id` int(11) NOT NULL,
  `order_sp_qty` int(11) NOT NULL,
  `order_date` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `order_name`, `order_phone`, `order_email`, `order_address`, `order_sp_id`, `order_sp_qty`, `order_date`, `id_user`) VALUES
(3, 'Hồ Văn Việt', '01365599662', 'triphuong10111996@gmail.com', '18/19 Đỗ Nhuận', 2, 1, '05-18-17', 0),
(5, 'Hồ Văn Việt', '01365599662', 'triphuong10111996@gmail.com', '18/19 Đỗ Nhuận', 13, 1, '05-18-17', 0),
(6, 'Hồ Văn Việt', '01365599662', 'triphuong10111996@gmail.com', '18/19 Đỗ Nhuận', 24, 1, '05-18-17', 0),
(7, 'Hồ Văn Việt', '01365599662', 'triphuong10111996@gmail.com', '18/19 Đỗ Nhuận', 24, 5, '05-18-17', 0),
(8, 'Hồ Văn Việt', '01365599662', 'triphuong10111996@gmail.com', '18/19 Đỗ Nhuận', 25, 1, '05-18-17', 0),
(9, 'tintin', '01222999123', 'tintao@gmail.com', '453 le loi', 27, 2, '05-18-17', 0),
(10, 'Hồ Văn Việt', '01365599662', 'triphuong10111996@gmail.com', '18/19 Đỗ Nhuận', 12, 1, '05-18-17', 0),
(11, 'Võ Tri Phương', '01682936502', 'triphuong10111996@gmail.com', '18/19 Đỗ Nhuận', 15, 1, '05-18-17', 0),
(12, 'Võ Tri Phương', '01682936502', 'triphuong10111996@gmail.com', '18/19 Đỗ Nhuận', 17, 1, '05-18-17', 0),
(13, 'Võ Tri Phương', '01682936502', 'triphuong10111996@gmail.com', '18/19 Đỗ Nhuận', 12, 1, '05-18-17', 0),
(14, 'Võ Tri Phương', '01682936502', 'triphuong10111996@gmail.com', '18/19 Đỗ Nhuận', 17, 1, '05-18-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhanhieu`
--

CREATE TABLE `nhanhieu` (
  `nhanhieu_id` int(50) NOT NULL,
  `nhanhieu_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanhieu`
--

INSERT INTO `nhanhieu` (`nhanhieu_id`, `nhanhieu_title`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Converse'),
(4, 'Puma'),
(5, 'Under Armour'),
(6, 'Reebok'),
(7, 'Hồng Thạnh');

-- --------------------------------------------------------

--
-- Table structure for table `quantri`
--

CREATE TABLE `quantri` (
  `id` int(11) NOT NULL,
  `tenquantri` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quantri`
--

INSERT INTO `quantri` (`id`, `tenquantri`, `username`, `pass`, `email`, `diachi`, `sdt`) VALUES
(7, 'Võ Minh Tri', 'admin12345', '202cb962ac59075b964b07152d234b70', 'minhtri@gmail.com', 'TP Hồ Chí Minh', 1682936502),
(8, 'Võ Tri Phương', 'admin', '202cb962ac59075b964b07152d234b70', 'triphuong10111996@gmail.com', '65 sơn kỳ ,P. sơn kỳ . Q. Tân Phú ,TP.HCM', 1682936502);

-- --------------------------------------------------------

--
-- Table structure for table `sp`
--

CREATE TABLE `sp` (
  `sp_id` int(50) NOT NULL,
  `sp_cat` int(50) NOT NULL,
  `sp_nhanhieu` int(50) NOT NULL,
  `sp_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sp_gia` int(50) NOT NULL,
  `sp_chitiet` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sp_image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sp_keywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sp_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sp`
--

INSERT INTO `sp` (`sp_id`, `sp_cat`, `sp_nhanhieu`, `sp_title`, `sp_gia`, `sp_chitiet`, `sp_image`, `sp_keywords`, `sp_date`) VALUES
(12, 2, 3, 'giày thể thao nam(mới)', 200000, 'giày thương hiệu , đẹp ', 'img1.jpg', 'nike , giày thể thao,giày chính hãng', '05-21-17'),
(14, 1, 1, ' Giày thể thao nam Nike Air Relentless 6 Msl 843881-401 (xanh).', 1453000, 'Giúp giảm bớt đi lực tác động Phần trên của giày luôn ôm sát vào chân bạn Thích hợp cho nhiều độ tuổi', 'giay-the-thao-nam-nike-air-relentless-6-msl-843881-401-xanh-9929-3215323-5371301d102b4f76d3572ade1f5991c5-webp-zoom_850x850.jpg', 'nike , giày thể thao,giày chính hãng', '05-19-17'),
(15, 2, 1, ' Giày chạy bộ nữ Nike Air Relentless 6 MSL 843883-002 (Xám)  ', 1600000, 'Bề mặt thiết kế dạng lưới giúp cho giày luôn thoáng khí Đế được làm bằng cao su tổng hợp, êm ái, thiết kế chống trơn trượt hiệu quả', 'giay-chay-bo-nu-nike-air-relentless-6-msl-843883-002-xam-9030-6375892-6338553536febf4ed169d04d04621c45-webp-zoom_850x850.jpg', 'nike , giày thể thao,giày chính hãng,giày chạy bộ,nữ ', '05-19-17'),
(16, 3, 1, 'Giày Sportswear Nike Rabona Lr Nam 641747-6001', 1480000, 'Thân giày được làm từ chất liệu da tổng hợp, mềm mại Lót trong bằng vải dệt, êm chân, thấm hút mồ hôi tốt Các đường viền giày rất mềm, thích nghi với bàn chân Đế ngoài bằng cao su siêu bền, cho lực kéo tốt Kiểu dáng thời trang, thích hợp dạo phố, công sở', 'giay-sportswear-nike-rabona-lr-nam-641747-600-3986-8400613-14395e58c7a2b176cbb44836069cd43d-webp-zoom.jpg', 'nike , giày thể thao,giày chính hãng', '05-21-17'),
(17, 3, 1, ' Giày thời trang thể thao nam Nike Kaishi 2.0 833411-010 (Đen)  ', 1250000, 'Bề mặt thiết kế dạng lưới giúp cho giày luôn thoáng khí Đế được làm bằng cao su tổng hợp, êm ái, thiết kế chống trơn trượt hiệu quả', '22_avt.jpg', 'nike , giày thể thao,giày chính hãng,giay gia re', '05-19-17'),
(18, 3, 3, 'Giày da Converse CONS Blanket OX 153489 (Trắng kem)', 1500000, 'Kiểu dáng trẻ, phong cách hiện đại Logo thương hiệu được bố trí nổi bật trên sản phẩm.', 'giay-da-converse-cons-blanket-ox-153489-trang-kem-5694-6797194-d1920e8cb0a1eb8aa4723def8e6b3955-webp-zoom_850x850.jpg', 'converse, giày thể thao,giày chính hãng', '05-17-17'),
(19, 4, 3, 'Giày cao cấp Converse Player Ox 142167 (Xanh)', 1040000, 'Kiểu dáng trẻ, phong cách hiện đại Logo thương hiệu được bố trí nổi bật trên sản phẩm', 'giay-cao-cap-converse-player-ox-142167-xanh-0613-1597194-8facc3da35d0e530a63bb13b572bfb7c-webp-zoom_850x850.jpg', 'converse, giày thể thao,giày chính hãng,giay thuong hieu', '05-17-17'),
(20, 4, 3, ' Giày Converse Chuck Taylor All Star Leather 140033 (Đỏ thấp)', 1400000, 'Kiểu dáng trẻ, phong cách hiện đại Logo thương hiệu được bố trí nổi bật trên sản phẩm', 'giay-converse-chuck-taylor-all-star-leather-140033-do-thap-9907-9329005-e61b96f436f7954f80fea901c01d8562-webp-zoom_850x850.jpg', 'converse, giày thể thao,giày chính hãng,giay thuong hieu', '05-17-17'),
(21, 1, 3, ' Giày thời trang Converse Classic 135251 (Đen)', 1600000, 'Converse là thương hiệu thời trang lâu đời của Mỹ, với thiết kế đơn giản, trẻ trung, năng động, tiện dụng trong đời sống hàng ngày', 'giay-thoi-trang-converse-classic-135251-den-4645-7091452-8033c1fe75fed1288030dffbac37e016-webp-zoom_850x850.jpg', 'converse, giày thể thao,giày chính hãng,giay thuong hieu', '05-17-17'),
(22, 4, 3, ' Giày Thời Trang Converse Translucent Rubber 153802 (Cam)', 1700000, 'Cùng nhiều mẫu mã đa dạng thích hợp với nhiều lứa tuổi và có độ bên cao giá cả hợp lý Converse đang ngày càng khẳng định vị trí và tên tuổi của mình tại thị trường Việt Nam', 'giay-thoi-trang-converse-translucent-rubber-153802-cam-0000-5827582-35357a56cdef026e30dec045e27c05f1-webp-zoom_850x850.jpg', 'converse, giày thể thao,giày chính hãng,giay thuong hieu', '05-17-17'),
(23, 1, 6, 'Reebok Classic', 1300000, ' Dòng giày Reebok với đế gum chắc chắn và cùng phối màu trắng cực hiếm đã có mặt shop', 'Reebok_Classic_White_Gum_avt.jpg', 'reebok, giày thể thao,giày chính hãng,giày thời trang', '05-17-17'),
(24, 3, 6, 'Reebok ROS Workout TR20', 1300000, ' Dòng giày Reebok với đế gum chắc chắn và cùng phối màu trắng cực hiếm đã có mặt shop', 'Reebok_ROS_Workout_TR20_avt.jpg', 'reebok, giày thể thao,giày chính hãng,giày thời trang', '05-17-17'),
(25, 1, 6, 'Reebok GL 6000', 1700000, ' Dòng giày Reebok với đế gum chắc chắn và cùng phối màu trắng cực hiếm đã có mặt shop', '22_avt.jpg', 'reebok, giày thể thao,giày chính hãng,giày thời trang', '05-17-17'),
(26, 1, 4, 'Giày thể thao nam Puma Icra Trainer NL Geometry 359935 01 (Xanh)', 1700000, 'Upper làm bằng cao cấp Đế ngoài bằng cao su, ma sát tốt', 'giay-the-thao-nam-puma-icra-trainer-nl-geometry-359935-01-xanh-9203-4875892-06bb6baf9076c41414c6650e093684cf-webp-zoom_850x850.jpg', 'puma, giày thể thao,giày chính hãng,giày thời trang', '05-17-17'),
(27, 4, 4, ' Giày Puma Monolite V2', 15800000, 'Chất liệu cao cấp Thiết kế thời trang', 'giay-puma-monolite-v2-1440-1214835-6829beff8647d5a1f542e56495d90ccc-webp-zoom.jpg', 'puma, giày thể thao,giày chính hãng,giày thời trang', '05-17-17'),
(28, 1, 4, ' Giày Puma Monolite V2', 2200000, 'Chất liệu cao cấp Thiết kế thời trang', 'giay-the-thao-nam-puma-expedite-187561-15-xanh-5636-0675892-e60e216e348c8c23b0c583489dd74afa-webp-zoom_850x850.jpg', 'puma, giày thể thao,giày chính hãng,giày thời trang', '05-17-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customers_id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanhieu`
--
ALTER TABLE `nhanhieu`
  ADD PRIMARY KEY (`nhanhieu_id`);

--
-- Indexes for table `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`sp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `nhanhieu`
--
ALTER TABLE `nhanhieu`
  MODIFY `nhanhieu_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `quantri`
--
ALTER TABLE `quantri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sp`
--
ALTER TABLE `sp`
  MODIFY `sp_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
