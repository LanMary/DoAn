-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2019 at 06:32 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banhoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `bills_ibfk_1` (`id_customer`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(14, 14, '2019-03-23', 1600000, 'COD', 'k', '2019-03-23 04:46:05', '2019-03-23 04:46:05'),
(13, 13, '2019-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', '2019-03-21 07:29:31', '2019-03-21 07:29:31'),
(12, 12, '2019-03-04', 520000, 'COD', 'Vui lòng chuyển đúng hạn', '2019-03-16 13:52:40', '2019-03-04 07:20:07'),
(11, 11, '2019-03-11', 420000, 'COD', 'không chú', '2019-03-16 13:54:05', '2019-03-10 17:00:00'),
(15, 15, '2019-03-24', 2200000, 'COD', 'k', '2019-03-16 13:55:17', '2019-03-24 07:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE IF NOT EXISTS `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `bill_detail_ibfk_2` (`id_product`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(18, 15, 62, 5, 220000, '2019-03-16 13:59:29', '2019-03-08 07:14:32'),
(17, 14, 2, 1, 1600000, '2019-03-16 13:58:43', '2019-03-11 13:55:53'),
(16, 13, 60, 1, 200000, '2019-03-16 13:58:32', '2019-03-17 07:29:31'),
(15, 13, 59, 1, 400000, '2019-03-16 13:58:21', '2019-03-16 13:56:00'),
(14, 12, 60, 2, 320000, '2019-03-16 13:58:16', '2019-03-16 13:56:04'),
(13, 12, 61, 1, 1200000, '2019-03-16 13:58:03', '2019-03-16 13:56:09'),
(12, 11, 61, 1, 720000, '2019-03-16 13:57:59', '2019-03-16 13:56:17'),
(11, 11, 57, 2, 650000, '2019-03-16 13:57:55', '2019-03-16 13:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'Lan', 'Nữ', 'lanmtgtv@gmail.com', 'Tân Bình', '0332490704', 'đặt hoa lan nha', '2019-03-16 14:01:36', '2019-01-01 07:14:32'),
(14, 'Bảo', 'nam', 'boycuchi@gmail.com', 'Lê thị riêng', '0397083654', 'bó hoa 2 bông thôi nha', '2019-03-16 14:03:31', '2019-03-05 04:46:05'),
(13, 'Thắm', 'Nữ', 'buithitham@gmail.com', 'Đồng Nai', '02838110579', 'Vui lòng giao hàng trước 5h', '2019-03-16 14:06:46', '2019-02-02 07:29:31'),
(12, 'Hào', 'Nam', 'huynhlamhao0188@gmail.com', 'Củ chi', '0123456789', 'Vui lòng chuyển đúng hạn', '2019-03-16 14:14:58', '2019-04-13 08:20:07'),
(11, 'Thùy', 'Nữ', 'mariangocthuy98@gmail.com', 'GiaLai', '02838110579', 'không chú', '2019-03-16 14:14:26', '2018-12-20 07:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_id_type_foreign` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Hồng tình yêu', 5, 'Tình yêu chính là tình cảm sâu sắc và thiêng liêng giữa nam và nữ. Và đóa hoa chính là một trong những món quà nhỏ nhắn xinh xắn minh chứng cho tình yêu mãnh liệt, nồng nàn hoặc thơ ngây đáng yêu. Mỗi những đóa hoa tình yêu với màu sắc cách bó khác nhau sẽ truyền tải thông điệp yêu thương mà người gửi muốn nhắn nhủ đến người nhận', 500000, 480000, 'hg2.jpg', 'bó', 1, '2019-01-02 02:20:00', '2019-01-02 02:20:00'),
(2, 'Đồi hoa mặt trời', 7, 'Bó hoa như một ngon đồi tỏa nắng mang ấm áp đến với lòng người nhận', 380000, 360000, 'hd3.jpg', 'bó', 1, '2019-01-03 02:20:00', '2019-01-03 02:20:00'),
(3, 'Nụ hoa', 6, 'Tình yêu thắm nụ với bông hồng rực rở nhưng kín đáo.', 650000, 450000, 'hh1.jpg', 'bó', 0, '2019-01-04 02:20:00', '2019-01-04 02:20:00'),
(4, 'Chung thủy', 6, '', 600000, 0, 'hh2.jpg', 'bó', 0, '2019-01-05 02:20:00', '2019-01-06 02:20:00'),
(5, 'Trong tim', 6, '', 260000, 0, 'hh3.jpg', 'giỏ', 0, '2019-01-06 02:20:00', '2019-01-06 02:20:00'),
(6, 'Cánh hồng', 6, '', 200000, 180000, 'hh4.jpg', 'bó', 0, '2019-01-07 02:20:00', '2019-01-07 02:20:00'),
(7, 'Ngày ngọt ngào', 6, '', 1600000, 0, 'hh5.jpg', 'bó', 1, '2019-01-08 02:20:00', '2019-01-08 02:20:00'),
(8, 'Lời dịu dàng', 6, '', 250000, 150000, 'hh6.jpg', 'giỏ', 0, '2019-01-09 02:20:00', '2019-01-09 02:20:00'),
(9, 'Mãi mãi', 6, '', 1600000, 1000000, 'hh7.jpg', 'bó', 0, '2019-01-09 02:20:00', '2019-01-09 02:20:00'),
(11, 'Vĩnh cửu', 3, '', 500000, 0, 'hk14.jpg', 'giỏ', 0, '2019-01-09 02:20:00', '2019-01-09 02:20:00'),
(12, 'Lavender', 3, '', 700000, 650000, 'hk2.jpg', 'bó', 0, '2019-01-10 02:20:00', '2019-01-10 02:20:00'),
(13, 'Cánh đồng', 3, '', 300000, 280000, 'hk13.jpg', 'bó', 1, '2019-01-10 02:20:00', '2019-01-10 02:20:00'),
(14, 'Bạch tuyết', 3, '', 300000, 280000, 'hk8.jpg', 'bó', 0, '2019-01-11 02:20:00', '2019-01-11 02:20:00'),
(15, 'Ngây dại', 3, '', 350000, 320000, 'hk6.jpg', 'bó', 1, '2019-01-11 02:20:00', '2019-01-11 02:20:00'),
(16, 'Đồi chong chóng', 3, '', 150000, 120000, 'hk4.jpg', 'bó', 0, '2019-01-11 02:20:00', '2019-01-11 02:20:00'),
(17, 'Nhẹ nhàng', 3, '', 250000, 240000, 'hk12.jpg', 'bó', 0, '2019-01-11 02:20:00', '2019-01-11 02:20:00'),
(18, 'Tím mộng mơ', 2, '', 180000, 0, 'hb3.jpg', 'bó', 0, '2019-01-12 02:20:00', '2019-01-12 02:20:00'),
(19, 'Sắc thắm', 2, 'Một bó hoa xanh ngát màu của cẩm chướng, calimero và điểm tô bằng hoa hồng trắng là những gì tuyệt vời nhất cho những ngày nắng nóng ngột ngạt. Sẽ thật là một bất ngờ trong một ngày đầy nắng, dạo phố với \"Dịu Mát\" trên tay. Chắc chắn nhiều ánh mắt sẽ dõi theo sự tươi mát của bạn. ', 250000, 0, 'hb5.jpg', 'bó', 1, '2019-01-12 02:20:00', '2019-01-12 02:20:00'),
(20, 'Quyến rũ', 2, '', 550000, 0, 'hb8.jpg', 'bó', 0, '2019-01-12 02:20:00', '2019-01-12 02:20:00'),
(21, 'Nồng nàn', 2, '', 1600000, 1500000, 'hb10.jpg', 'bó', 0, '2019-01-13 02:20:00', '2019-01-13 02:20:00'),
(22, 'Tình thắm', 1, '', 600000, 500000, 'hg5.jpg', 'giỏ', 1, '2019-01-13 02:20:00', '2019-01-13 02:20:00'),
(23, 'Bé yêu', 1, '', 280000, 260000, 'hg4.jpg', 'giỏ', 0, '2019-01-15 02:20:00', '2019-01-15 02:20:00'),
(24, 'chiếc xe tình yêu', 1, '', 280000, 0, 'hg7.jpg', 'giỏ', 0, '2019-01-15 02:20:00', '2019-01-15 02:20:00'),
(25, 'Giỏ hồng', 1, '', 80000, 70000, 'hh6.jpg', 'giỏ', 0, '2019-01-17 02:20:00', '2019-01-17 02:20:00'),
(26, 'Lan ly', 1, '', 50000, 0, 'hg10.jpg', 'giỏ', 0, '2019-01-17 02:20:00', '2019-01-17 02:20:00'),
(27, 'Hồng ngọt ngào ', 1, '', 500000, 450000, 'hg2.jpg', 'giỏ', 0, '2019-01-17 02:20:00', '2019-01-17 02:20:00'),
(28, 'Lung linh', 1, '', 120000, 0, 'hg3.jpg', 'giỏ', 1, '2019-01-20 02:20:00', '2019-01-20 02:20:00'),
(29, 'Thành công', 1, '', 700000, 0, 'hg12.jpg', 'giỏ', 0, '2019-01-20 02:20:00', '2019-01-20 02:20:00'),
(30, 'Chút tình', 5, '', 580000, 550000, 'cc1.jpg', 'bó', 1, '2019-01-20 02:20:00', '2019-01-20 02:20:00'),
(31, 'Mẹ yêu', 5, '', 380000, 350000, 'cc2.jpg', 'bó', 0, '2019-01-20 02:20:00', '2019-01-20 02:20:00'),
(32, 'Phút ban đầu', 5, '', 380000, 350000, 'cc3.jpg', 'bó', 0, '2019-01-30 02:20:00', '2019-01-30 02:20:00'),
(33, 'Hòa hợp ', 5, 'Một bó hoa đầy những bông nở tròn đầy rực rỡ được sắp xếp một cách hoàn hảo cùng các hoa trang trí kèm xinh xắn tùy theo những mùa hoa sẽ là một món quà tuyệt vời để thể hiện tình cảm của bạn và khiến ai đó cảm thấy mình thật đặc biệt.', 280000, 250000, 'cc4.jpg', 'bó', 1, '2019-01-30 02:20:00', '2019-01-30 02:20:00'),
(34, 'Tình em', 5, 'Tình em như những cẩm chướng trắng tinh khiết hòa lẫn những cành hồng nồng nàn của tình anh.', 280000, 0, 'cc5.jpg', 'bó', 1, '2019-01-30 02:20:00', '2019-01-30 02:20:00'),
(35, 'Ngày của mẹ', 5, 'Những bông cẩm chướng ý chân thành mang lòng hiếu thảo đến với mẹ của mình.', 320000, 300000, 'cc6.jpg', 'bó', 1, '2019-02-01 02:20:00', '2019-02-01 02:20:00'),
(36, 'Lãng mạn', 5, 'Chiếc xe đạp gỗ chở theo những cành cẩm chướng thật lãng mạn, chở tình yêu đến bến bờ hạnh phúc.', 320000, 300000, 'cc7.jpg', 'giỏ', 0, '2019-02-01 02:20:00', '2019-02-01 02:20:00'),
(37, 'Tôn vinh', 5, 'Cẩm chướng đỏ nồng nàn cùng với các loài hoa là phụ trang trí mang đến sự hài hòa cho giỏ hoa xinh đẹp này. \"tôn vinh\" chính là kết tinh của tình yêu nồng nàn say đắm. Nếu chưa chọn được một món quà nào hợp ý, sao không phải là \"Tôn vinh\" để bộc lộ tình cảm của mình? ', 320000, 300000, 'cc8.jpg', 'giỏ', 1, '2019-02-01 02:20:00', '2019-02-01 02:20:00'),
(38, 'Phút ban đầu', 5, 'Một bó hoa đầy những bông nở tròn đầy rực rỡ được sắp xếp một cách hoàn hảo cùng các hoa trang trí kèm xinh xắn tùy theo những mùa hoa sẽ là một món quà tuyệt vời để thể hiện tình cảm của bạn và khiến ai đó cảm thấy mình thật đặc biệt.', 550000, 530000, 'cc9.jpg', 'giỏ', 0, '2019-02-02 02:20:00', '2019-02-02 02:20:00'),
(39, 'Đỏ tươi', 5, 'Bó cẩm chướng đỏ tuyệt đẹp trong sự kết hợp với thủy tiên và cúc tím. Sự hài hòa giữa các màu sắc như những nốt nhạc thánh thót tấu lên những bản tình ca tuyệt diệu. Hãy gửi tặng nàng thơ của bạn \"Thánh Thót\" để cùng nàng tận hưởng những giây phút lãng mạn ngân nga.', 550000, 530000, 'cc10.jpg', 'bó', 0, '2019-02-02 02:20:00', '2019-02-02 02:20:00'),
(40, 'Có một ngày', 5, 'Giỏ hoa với những cành hoa cẩm chướng tím hồng nhẹ nhàng dành tặng kỉ niệm ý nghĩa.', 350000, 330000, 'cc12.jpg', 'giỏ', 0, '2019-02-02 02:20:00', '2019-02-02 02:20:00'),
(41, 'Dịu êm', 5, 'Những đóa cẩm chướng hồng đan xen với cúc trắng đơn sơ với màu xanh điểm xuyết của hoa phụ làm bó hoa có một vẻ đẹp thật tinh tế. \"Sắc Hoa\" mang màu sắc hài hòa của những đóa hoa xinh đẹp càng làm tôn lên vẻ đẹp của bất kì ai. \"Sắc Hoa\" chính là món quà tuyệt vời cho mỗi sớm mai thức dậy, tràn đầy năng lượng và niềm vui. ', 350000, 330000, 'cc11.jpg', 'giỏ', 0, '2019-02-03 02:20:00', '2019-02-03 02:20:00'),
(42, 'Thu sang', 7, 'Một bó hoa đầy những bông nở tròn đầy rực rỡ được sắp xếp một cách hoàn hảo cùng các hoa trang trí kèm xinh xắn tùy theo những mùa hoa sẽ là một món quà tuyệt vời để thể hiện tình cảm của bạn và khiến ai đó cảm thấy mình thật đặc biệt.', 450000, 430000, 'hd1.jpg', 'bó', 0, '2019-02-03 02:20:00', '2019-02-03 02:20:00'),
(43, 'Thềm hoa', 7, 'Một giỏ hoa rực rỡ sắc màu hòa quyện vào nhau của hoa hướng dương và pastel. \"Thềm Hoa\" là tạo vật tuyệt hảo của thiên nhiên dành cho những người yêu cái đẹp. Muốn gây bất ngờ cho ai đó? Chỉ cần có \"Thềm Hoa\" bạn đã \"ghi điểm\" khá cao rồi. ', 720000, 0, 'hd6.jpg', 'giỏ', 1, '2019-02-14 02:20:00', '2019-02-14 02:20:00'),
(44, 'Không quên', 7, 'Màu tím nhung nhớ của những cành sao tím bao quanh những đóa hướng dương vàng rực rỡ với ý nghĩa mong bạn đừng quên những khoảnh khắc tươi đẹp của mùa hè này. \"Không Quên\" ra đời với ý nghĩa như thế. Sẽ thật khó quên nếu bạn tặng ai kia một bó \"Không Quên\" để nhắc về những kí ức tuyệt đẹp mà chúng ta đã sẻ chia cùng nhau.', 1200000, 0, 'hd10.jpg', 'bó', 0, '2019-02-14 02:20:00', '2019-02-14 02:20:00'),
(45, 'Hạ về', 7, 'Một bó hoa đầy những bông nở tròn đầy rực rỡ được sắp xếp một cách hoàn hảo cùng các hoa trang trí kèm xinh xắn tùy theo những mùa hoa sẽ là một món quà tuyệt vời để thể hiện tình cảm của bạn và khiến ai đó cảm thấy mình thật đặc biệt.', 120000, 0, 'hd2.jpg', 'bó', 0, '2019-02-14 02:20:00', '2019-02-14 02:20:00'),
(46, 'Đồi hoa mặt trời', 7, 'Một bó hoa vàng rực sắc màu của hướng dương với sự điểm tô của các loại hoa lá phụ chính là \"Mang Nắng Tới\". Một buổi sáng thức dậy với bó hoa rực rỡ này chắc chắn một ngày của bạn sẽ bừng sáng. Hãy gửi tặng tới những người yêu thương \"Mang Nắng Tới\" để cầu chúc cho một ngày thật vui vẻ và sảng khoái.', 800000, 0, 'hd3.jpg', 'bó', 0, '2019-02-14 02:20:00', '2019-02-14 02:20:00'),
(47, 'Mang nắng tới', 7, 'Một bó hoa vàng rực sắc màu của hướng dương với sự điểm tô của các loại hoa lá phụ chính là \"Mang Nắng Tới\". Một buổi sáng thức dậy với bó hoa rực rỡ này chắc chắn một ngày của bạn sẽ bừng sáng. Hãy gửi tặng tới những người yêu thương \"Mang Nắng Tới\" để cầu chúc cho một ngày thật vui vẻ và sảng khoái.', 1400000, 0, 'hd9.jpg', 'bó', 0, '2019-02-15 17:00:00', '2019-02-15 17:00:00'),
(48, 'Huyền ảo', 7, 'Những đóa hướng dương khoe sắc báo hiệu một mùa hạ nữa đã về. \"Mùa Hoa Bay\" mang sự rực rỡ của mua hạ qua những đóa hướng dương, dịu dàng với những cánh hồng trắng và calimero dịu mát. Hãy dành tặng mùa hè đặc biệt của \"Mùa Hoa Bay\" đến cho những người thân yêu để cùng nhau tận hưởng nhé.', 140000, 0, 'hd8.jpg', 'bó', 0, '2019-02-18 02:20:00', '2019-02-18 02:20:00'),
(49, 'Lời chúc an lành', 4, 'Một bình hoa thật bắt mắt với cành Lan vàng cao cấp cho bất cứ một dịp lễ hoặc kỷ niệm nào, biến ngày đó trở thành một ngày khó quên.  ', 600000, 550000, 'hl12.jpg', 'bó', 0, '2019-02-19 17:00:00', '2019-02-19 17:00:00'),
(50, 'Thanh cao', 4, 'Một bình hoa thật bắt mắt với cành Lan vàng cao cấp cho bất cứ một dịp lễ hoặc kỷ niệm nào, biến ngày đó trở thành một ngày khó quên.  ', 1200000, 1000000, 'hl4.jpg', 'chậu', 0, '2019-02-22 02:20:00', '2019-02-22 02:20:00'),
(51, 'An khang', 4, 'Mang vẻ quyến rũ rung động của 3 cành lan hồng và 2 cành lan trắng, bình hoa xinh đẹp này sẽ giúp bạn trao gửi những thông điệp đáng yêu và nhận được nụ cười của người nhận khi nhìn thấy món quà bất ngờ này. ', 1500000, 0, 'hl3.jpg', 'chậu', 0, '2019-02-25 02:20:00', '2019-02-25 02:20:00'),
(52, 'Đợi chờ', 4, 'Với cành lan hồng duy nhất được cắm trong bình hoa độc đáo, ai cũng có thể bị thu hút bởi vẻ đẹp quyến rũ của nó. Vậy hãy gửi món quà đặc biệt này tới những người thân yêu để mang đến niềm vui cho họ trong những dịp thật đặc biệt.', 1500000, 0, 'hl2.jpg', 'chậu', 0, '2019-02-24 17:00:00', '2019-02-24 17:00:00'),
(53, 'Tuyết trắng', 4, 'Làm tươi sáng ngày đặc biệt của chính bạn hoặc ai đó bằng bình hoa thủy tinh với hai loại lan vàng và trắng. \"Ngào Ngạt\" là một món quà bắt mắt có thể làm tan chảy trái tim và tâm hồn của bất kì ai.', 550000, 0, 'hl8.jpg', 'bó', 0, '2019-02-27 17:00:00', '2019-02-27 17:00:00'),
(54, 'Chiều tím', 4, 'Từ những bông hoa với màu sắc quyến rũ và hương thơm lan xa, bình hoa hoàn hảo này bao gồm 6 cành lan hồng sẽ giúp bạn gửi trao thông diệp tình yêu đến những người đặc biệt trong cuộc sống.', 650000, 0, 'hl9.jpg', 'bó', 1, '2019-03-03 17:00:00', '2019-03-03 17:00:00'),
(55, 'Xanh tươi', 4, 'Những bông lan xanh tươi được kết thành bó thích hợp các cô dâu.', 850000, 0, 'hl7.jpg', 'bó', 0, '2019-03-05 02:20:00', '2019-03-05 02:20:00'),
(56, 'Tri ân', 4, 'Với những bông lan vàng thắm nở rộ, bất kì ai cũng có thể thể hiện lòng biết ơn của mình với người khác.', 550000, 0, 'hl11.jpg', 'bó', 0, '2019-02-14 17:00:00', '2019-02-14 17:00:00'),
(57, 'Phúc lành', 4, 'Hãy để cho những người thân yêu của bạn biết được bạn quan tâm và lo lắng cho họ như thế nào bằng cách đặt và gửi đến họ món quà tuyệt vời với những cành hoa lan trắng thành bó xinh xắn. Bạn sẽ được hưởng dịch vụ giao hàng miễn phí và nhanh nhất để giữ được hình dáng và vẻ đẹp của hoa. ', 750000, 0, 'hl6.jpg', 'bó', 1, '2019-02-12 17:00:00', '2019-02-13 17:00:00'),
(58, 'Hoa nghiêng', 2, 'Hãy chia sẻ điều đó bằng việc tặng họ mẫu hoa này với 100 đóa hoa hồng violet cuốn hút dù biết cảm xúc trong mỗi con người là điều khó diễn tả thành lời được và tình cảm bạn dành cho người ấy cũng vậy. ', 1800000, 1600000, 'hb19.jpg', 'bó', 0, '2019-02-06 17:00:00', '2019-02-07 17:00:00'),
(59, 'Mắt biếc', 2, 'Loài hoa hồng lai xanh da trời lạ mắt được sắp bao quanh những đóa hồng trắng nhẹ nhàng trông thật bắt mắt và sang trọng làm sao. Nó còn tượng trưng cho niềm vui vô cùng trong sáng, ngây thơ mà người gửi muốn trao cho người nhận tỏ lòng biết ơn. ', 1200000, 0, 'hb18.jpg', 'bó', 0, '2019-02-11 17:00:00', '2019-02-11 17:00:00'),
(60, 'Tinh khiết', 2, 'Món quà hoa gồm những đóa ly trắng hồng đang sắp nở luôn luôn lấy lòng được những người bạn mong muốn gửi tặng nó. Hãy đặt ngay mẫu hoa này để tặng người ấy bạn nhé. ', 1500000, 0, 'hb11.jpg', 'bó', 0, '2019-03-01 17:00:00', '2019-03-02 17:00:00'),
(61, 'Gọi gió', 7, 'Giữa rừng hoa hướng dương vàng rực điểm tô những cánh hồng xinh xắn mang đến cảm giác cùa mùa hạ không quá chói chang. Gọi những cơn gió xua tan cái nóng nực và tận hưởng thiên nhiên tươi đẹp. \"Gọi Gió\" sẽ giúp bạn hoàn thành điều ước, đón một mùa hè rạng rỡ với nhiều niềm vui. ', 350000, 320000, 'hd5.jpg', 'giỏ', 1, '2019-03-02 17:00:00', '2019-03-02 17:00:00'),
(62, 'Tỏa nắng', 7, 'Những đóa hướng dương vàng rực rỡ trên nền xanh của các loại lá trang trí sẽ là một bó hoa đơn sơ bình dị nhưng cũng không kém vẻ đẹp rực rỡ. \"Bình Dị\" sẽ mang lại cho bạn sự năng động và nhiệt huyết hơn cho một ngày làm việc mới. Chắc chắn ai kia sẽ không thể chối từ món quà này từ bạn đâu.', 250000, 220000, 'hd7.jpg', 'bó', 0, '2019-03-12 17:00:00', '2019-03-14 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'bn1.jpg'),
(2, '', 'bn2.jpg'),
(3, '', 'bn5.jpg'),
(4, '', 'bn4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

DROP TABLE IF EXISTS `type_products`;
CREATE TABLE IF NOT EXISTS `type_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hoa giỏ', 'Giỏ hoa mang đến một thông điệp ý nghĩa, như một tình cảm mãnh liệt và chân thành mà bạn muốn bày tỏ cho người thương yêu.\r\nShop hoa tươi  luôn mang đến bạn chất lượng phục vụ tốt nhất, với hình thức đặt hàng nhanh chóng, thanh toán đơn giản cùng với nhân viên tư vấn tận tình, hỗ trợ giao hoa tận nơi.', 'hg3.jpg', '2019-01-01 02:16:15', '2019-01-02 02:16:15'),
(2, 'Hoa bó', 'Dù bạn đang ở đâu chỉ cần 1 thao tác click “chuột” hoặc 1 cuộc điện thoại, Bạn sẽ hoàn toàn yên tâm để shop hoa đẹp chúng tôi có thể thay bạn mang đến cho những người thân yêu, bạn bè, đối tác…của bạn những bó hoa tươi đẹp nhất.', 'hb2.jpg', '2019-01-01 02:16:15', '2019-10-03 01:38:35'),
(3, 'Hoa khô', 'Hoa khô không như hoa tươi, tươi mới nhưng chóng tàn. Hoa khô bền bỉ với thời gian. Nhờ công nghệ làm khô đặc biệt của Pháp, hoa giữ được màu hoa và hương hoa, hoa vẫn tươi màu tím tím xanh xanh. Sẽ rất kinh tế nếu trưng 1 bình hoa khô giữa phòng khách hay trên bàn làm việc, bạn không phải thay nước và rửa lọ mỗi ngày hay ngắt từng cánh hoa héo. Hoa khô ngoại nhập đang dần trở thành xu hướng tặng hoa, rất sang và rất lạ mắt!', 'hk1.jpg', '2018-10-18 00:33:33', '2018-10-20 07:25:27'),
(4, 'Hoa lan', 'Bạn cần 1 chậu Lan Hồ Điệp tặng đối tác, một chậu hoa cho ngày khai trương, một chậu lan chưng Tết nhưng chưa biết mua ở đâu rẻ nhất, đẹp nhất? Hãy đến với chúng tôi - HOA LẠ : Chúng tôi cam kết \" sẽ mang đến cho bạn những chậu hoa đẹp nhất rẻ nhất hơn cả những gì bạn mong đợi \"', 'hl1.jpg', '2018-11-07 03:29:19', '2018-11-20 03:29:19'),
(5, 'Cẩm chướng', 'Căn bếp hay phòng khách sẽ trở nên rạng rỡ, tươi mới hơn khi có một bình hoa cẩm chướng để bàn làm đồ trang trí. Dường như không gian đã được nới rộng ra, tràn đầy sinh khí nhờ màu sắc rực rỡ, đa dạng từ hoa cẩm chướng mang lại. Hoa cẩm chướng có nhiều màu, mỗi màu lại mang một vẻ đẹp riêng và ý nghĩa nhất định, nhưng sẽ thật sự ấn tượng nếu bạn biết cách kết hợp chúng lại.', 'cc7.jpg', '2018-12-06 04:00:00', '2018-12-08 04:00:00'),
(6, 'Hoa hồng', 'Hoa hồng từ xưa đến nay vẫn là loài hoa được yêu thích nhất bởi hình dáng sang trọng, tinh tế cùng hương thơm nồng nàn, quyến rũ, là biểu tượng cho tình yêu và hạnh phúc, lòng chung thủy và sự khát khao vươn tới cái đẹp. Vì thế trong các dịp lễ hay ngày quan trọng như lễ tình yêu, kỷ niệm ngày cưới…các cặp đôi thường lựa chọn hoa hồng như một phụ kiện không thể thiếu.', 'hb6.jpg', '2019-02-25 17:19:00', '2019-02-27 17:19:00'),
(7, 'Hướng dương', 'Với đặc tính lúc nào hướng dương cũng hướng về mặt trời, dù là mọc trong bóng tối hay ở nơi thiếu anh sáng, hoa luôn tìm nơi có ánh sáng mặt trời để khoe sắc. Vì thế  mà người ta hay nói hoa hướng dương tượng trung cho tình yêu chung thủy sắc son. Dù ở nơi đâu, dù phải xa cách tình yêu ấy vẫn hướng về phía nhau như những bông hoa hướng dương luôn hướng về mặt trời.', 'hd1.jpg', '2019-02-25 17:19:00', '2019-03-25 17:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Lan', 'lanmtgtv@gmail.com', '84488999', '0332490704', 'Tân bình', NULL, '2019-03-07 07:17:33', '2019-03-07 07:17:33');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
