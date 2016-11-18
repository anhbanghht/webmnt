-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2016 at 01:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c9`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

CREATE TABLE `assigns` (
  `id` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `send` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assigns`
--

INSERT INTO `assigns` (`id`, `taskid`, `teacherid`, `send`) VALUES
(4, 21, 1, 1),
(5, 1, 2, 1),
(6, 1, 3, 1),
(7, 13, 2, 1),
(8, 2, 2, 1),
(9, 2, 3, 1),
(11, 3, 3, 1),
(12, 3, 14, 1),
(13, 4, 1, 1),
(14, 4, 2, 1),
(15, 5, 1, 1),
(16, 5, 3, 1),
(19, 6, 3, 1),
(20, 6, 14, 1),
(21, 29, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `id` int(10) UNSIGNED NOT NULL,
  `summary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `student_quantity` int(11) NOT NULL,
  `guide_people` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `intertime_id` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `email`, `website`, `phone`, `address`, `subject`, `student_quantity`, `guide_people`, `teacher_id`, `intertime_id`, `description`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Công ty Bigdigital Việt Nam', 'bigdigital.vn@gmail.com', 'http://bigdigital.vn/', '0437546222', 'Số 5 Ngõ 99 Nguyễn Chí Thanh, Đống Đa, Hà Nội', 'Thiết kế phát triển website - SEO', 20, 'Nguyễn Văn Khánh', 4, 1, 'Thiết kế phát triển website thương mại, tin tức, bán hàng\r\n', '', '2016-06-07 10:40:45', '2016-06-07 03:40:45', NULL),
(2, 'VNPT Thái Nguyên', '', 'http://thainguyen.vnpt.vn', '0913.557.259', 'Số 10, đường cách mạng tháng 8, TP Thái Nguyên', 'Viễn thông', 10, '', 10, 1, 'Thiết kế, xây dựng mạng nội bộ.', '', '2016-06-07 09:33:55', '2016-05-12 12:15:31', NULL),
(3, 'Công ty cổ phần dịch vụ và phát triển AHT - chi nhánh Thái Nguyên', 'support@arrowhitech.com', 'http://arrowhitech.com', '0983.268.822', 'Phòng 303 Tầng 3, Khách sạn Đông Á I, 142 Hoàng Văn Thụ, Thành Phố Thái Nguyên', 'Công nghệ Thông tin', 10, 'Trần Ngọc Kiên', 3, 3, 'Các đề tài phát triển ứng dụng Web', '', '2016-06-07 09:33:59', '2016-05-12 16:19:36', NULL),
(4, 'Công ty TNHH Thương mại quốc tế Hoàng Gia', '', '', '', 'Số 223 đường Lương Ngọc Quyến - TP Thái Nguyên', 'Công nghệ Thông tin', 8, 'Hoàng Hoài', 11, 2, ' Thiết kế Website\r\n- Thiết kết hệ thống mạng\r\n- An ninh và bảo mật hệ thống', '', '2016-06-07 09:34:07', '2016-05-12 13:28:44', NULL),
(5, 'Trung tâm thông tin thư viện – Trường ĐH Kinh tế và Quản trị kinh doanh Thái Nguyên.', 'webmaster@tueba.edu.vn', 'http://tueba.edu.vn/gioi-thieu/trung-tam-thong-tin-thu-vien/', '02803.847434', ' Phường Thịnh Đán - TP. Thái Nguyên', 'Công nghệ thông tin', 4, 'Đoàn Mạnh Hồng,   Lương Mạnh Đông,   Nguyễn Hồng Hải', 11, 2, 'Thiết kế - Quản trị mạng; Thiết kế - Phát triển website', '', '2016-06-07 09:34:02', '2016-05-23 17:00:12', NULL),
(6, 'Trung tâm Công nghệ Thông tin - Thư viện - Trường CĐKT Kỹ thuật Thái Nguyên', 'contact@tntec.edu.vn', '', '0280 3855606', 'Tổ 15 - Phường Thịnh Đán - Thành phố Thái Nguyên', 'Sản xuất phần mềm; Lập trình máy tính (CPC 842); Tư vấn máy vi tính và quản trị hệ thống máy vi tính (CPC 842); Liên doanh với Singapore', 2, '', 1, 1, 'Phát triển ứng dụng theo dự án', '', '2016-06-07 09:34:20', '2016-05-23 17:01:58', NULL),
(7, 'Công ty cổ phần giải pháp thương mại điện tử và công nghệ ETS', '', '', '0984.230.290', 'Đường Z115. Tổ 4, thành phố Thái Nguyên', 'CNTT, Phần mềm ứng dụng', 3, 'Nguyễn Đức Trọng', 3, 1, 'Phát triển ứng dụng theo dự án', '', '2016-06-07 09:34:17', '2016-05-23 17:05:31', NULL),
(8, 'VNPT Bắc Ninh', '', '', '', '', 'Viễn thông', 2, '', 3, 1, '', '', '2016-06-07 09:34:15', '2016-06-03 20:33:52', '2016-06-03 20:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `council`
--

CREATE TABLE `council` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `council_group_id` int(11) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `place` varchar(255) NOT NULL,
  `teacher` text,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `council`
--

INSERT INTO `council` (`id`, `name`, `council_group_id`, `startdate`, `enddate`, `place`, `teacher`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hội đồng 1', 1, '2016-05-17 07:30:00', '2016-05-17 11:30:00', 'C5.101', '["15","19"]', '', '2016-06-16 23:02:16', '2016-06-16 23:02:16', NULL),
(2, 'Hội đồng 2', 1, '2016-05-18 07:30:00', '2016-05-18 11:30:00', 'C5.104', '["6","7"]', '', '2016-06-16 23:02:55', '2016-06-16 23:02:55', NULL),
(3, 'HĐ 1', 2, '2016-06-17 07:00:00', '2016-06-17 11:00:00', 'C5 101', '["3","4","5","6","7"]', 'HĐ 1', '2016-06-17 07:23:47', '2016-06-17 00:23:47', NULL),
(4, 'HĐ 2', 2, '2016-06-17 07:00:00', '2016-06-17 11:00:00', 'C5 102', '["7","9","10","11","18"]', 'HĐ 2', '2016-06-17 07:28:25', '2016-06-17 00:28:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `council_detail`
--

CREATE TABLE `council_detail` (
  `id` int(11) NOT NULL,
  `council_id` int(11) NOT NULL,
  `list_student_by_intershiptime_id` int(11) NOT NULL,
  `point` text NOT NULL,
  `description` text NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `council_detail`
--

INSERT INTO `council_detail` (`id`, `council_id`, `list_student_by_intershiptime_id`, `point`, `description`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 122, '', '', '', '2016-06-16 23:06:20', '2016-06-16 23:06:20', NULL),
(2, 1, 123, '{"gvhd":"9","gvpb":"9","tket":"9"}', '', '', '2016-06-17 06:08:26', '2016-06-16 23:08:26', NULL),
(3, 1, 124, '{"gvhd":"8","gvpb":"8","tket":"8"}', '', '', '2016-06-17 06:08:27', '2016-06-16 23:08:27', NULL),
(4, 3, 152, '', '', '', '2016-06-17 00:25:30', '2016-06-17 00:25:30', NULL),
(5, 3, 153, '', '', '', '2016-06-17 00:25:30', '2016-06-17 00:25:30', NULL),
(6, 3, 154, '', '', '', '2016-06-17 00:25:30', '2016-06-17 00:25:30', NULL),
(7, 3, 155, '', '', '', '2016-06-17 00:25:31', '2016-06-17 00:25:31', NULL),
(8, 3, 156, '', '', '', '2016-06-17 00:25:31', '2016-06-17 00:25:31', NULL),
(9, 3, 157, '', '', '', '2016-06-17 00:25:31', '2016-06-17 00:25:31', NULL),
(10, 3, 158, '', '', '', '2016-06-17 00:25:31', '2016-06-17 00:25:31', NULL),
(11, 3, 159, '', '', '', '2016-06-17 00:25:31', '2016-06-17 00:25:31', NULL),
(12, 3, 160, '', '', '', '2016-06-17 00:25:31', '2016-06-17 00:25:31', NULL),
(13, 3, 161, '', '', '', '2016-06-17 00:25:32', '2016-06-17 00:25:32', NULL),
(14, 4, 162, '{"gvhd":"8","gvpb":"8","tket":"8"}', '', '', '2016-06-17 08:21:14', '2016-06-17 01:21:14', NULL),
(15, 4, 163, '{"gvhd":"9","gvpb":"9","tket":"9"}', '', '', '2016-06-17 08:21:15', '2016-06-17 01:21:15', NULL),
(16, 4, 164, '{"gvhd":"7","gvpb":"7","tket":"7"}', '', '', '2016-06-17 08:21:16', '2016-06-17 01:21:16', NULL),
(17, 4, 165, '{"gvhd":"8","gvpb":"9","tket":"9"}', '', '', '2016-06-17 08:21:16', '2016-06-17 01:21:16', NULL),
(18, 4, 166, '{"gvhd":"8","gvpb":"9","tket":"8"}', '', '', '2016-06-17 08:21:16', '2016-06-17 01:21:16', NULL),
(19, 4, 167, '{"gvhd":"9","gvpb":"9","tket":"9"}', '', '', '2016-06-17 08:21:16', '2016-06-17 01:21:16', NULL),
(20, 4, 168, '{"gvhd":"8","gvpb":"7","tket":"9"}', '', '', '2016-06-17 08:21:17', '2016-06-17 01:21:16', NULL),
(21, 4, 169, '{"gvhd":"9","gvpb":"9","tket":"9"}', '', '', '2016-06-17 08:21:17', '2016-06-17 01:21:17', NULL),
(22, 4, 170, '{"gvhd":"9","gvpb":"9","tket":"9"}', '', '', '2016-06-17 08:21:17', '2016-06-17 01:21:17', NULL),
(23, 4, 171, '{"gvhd":"9","gvpb":"8","tket":"8"}', '', '', '2016-06-17 08:21:17', '2016-06-17 01:21:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `council_group`
--

CREATE TABLE `council_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `intertime_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `council_group`
--

INSERT INTO `council_group` (`id`, `name`, `intertime_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CHẤM BÁO CÁO THỰC TẬP CƠ SỞ LỚP ĐHCQ K12', 1, '2016-06-17 06:06:02', '2016-06-16 23:06:02', NULL),
(2, 'CHẤM BÁO CÁO ĐỒ ÁN TỐT NGHIỆP K10', 2, '2016-06-16 23:06:18', '2016-06-16 23:06:18', NULL),
(3, 'CHẤM BÁO CÁO THỰC TẬP CHUYÊN NGÀNH LỚP ĐHCQ K9', 3, '2016-06-16 23:06:48', '2016-06-16 23:06:48', NULL),
(4, 'CHẤM BÁO CÁO ĐỒ ÁN TỐT NGHIỆP ĐHLT_CNTT_K13 BG', 4, '2016-06-16 23:07:24', '2016-06-16 23:07:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `course_full` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `course_full`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'K9', 'Khóa 9', '', '2016-05-20 08:40:09', '0000-00-00 00:00:00', NULL),
(2, 'K10', 'Khóa 10', '', '2016-05-20 08:40:09', '0000-00-00 00:00:00', NULL),
(3, 'K11', 'Khóa 11', '', '2016-05-20 08:40:34', '0000-00-00 00:00:00', NULL),
(4, 'K12', 'Khóa 12', '', '2016-05-20 08:40:34', '0000-00-00 00:00:00', NULL),
(5, 'K13', 'Khóa 13', '', '2016-05-20 08:41:02', '0000-00-00 00:00:00', NULL),
(6, 'K14', 'Khóa 14', '', '2016-05-20 08:41:02', '0000-00-00 00:00:00', NULL),
(7, 'K8', 'Khóa 8', '', '2016-06-07 12:39:31', '2016-06-07 05:39:31', NULL),
(8, 'K17', 'Khóa 17', '', '2016-06-07 05:39:12', '2016-06-07 05:39:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MMT', 'Mạng máy tính', NULL, NULL, NULL),
(2, 'KHCB', 'Khoa khoa học cơ bản', NULL, NULL, NULL),
(3, 'CNTT', 'Công nghệ thông tin', NULL, NULL, NULL),
(4, 'CNPM', 'Công nghệ phần mềm', NULL, NULL, NULL),
(5, 'HTTT', 'Hệ thống thông tin', NULL, NULL, NULL),
(6, 'KHMT', 'Khoa học máy tính', NULL, NULL, NULL),
(7, 'CN.ĐTTT', 'Công nghệ điện tử truyền thông', NULL, NULL, NULL),
(8, 'CN.TĐH', 'Công nghệ tự động hóa', NULL, NULL, NULL),
(9, 'CNLT&UD', 'A', NULL, '2016-05-12 02:46:01', '2016-05-12 02:46:01'),
(10, 'ĐHLT', 'Đại học liên thông', NULL, NULL, NULL),
(11, 'ATTT', 'An toàn thông tin', NULL, NULL, NULL),
(12, 'TTĐPT', 'Truyền thông đa phương tiện', NULL, NULL, NULL),
(13, 'HTTTKT', 'Hệ thống thông tin kinh tế', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `number_practice` int(11) NOT NULL,
  `type_exam` varchar(255) NOT NULL,
  `id_department` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `type_learn` varchar(255) NOT NULL,
  `name_class` varchar(255) NOT NULL,
  `num_student` int(11) NOT NULL,
  `giolt` varchar(255) NOT NULL,
  `giotl` varchar(255) NOT NULL,
  `gioth` varchar(255) NOT NULL,
  `thigk` int(11) NOT NULL,
  `tonggio` varchar(255) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `note` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `course_name`, `id_subject`, `number`, `number_practice`, `type_exam`, `id_department`, `semester`, `type_learn`, `name_class`, `num_student`, `giolt`, `giotl`, `gioth`, `thigk`, `tonggio`, `id_teacher`, `note`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'An ninh mạng  (N0 1.TH 1)', 44, 3, 1, 'Trắc nghiệm 60p', 1, 1, 'TH', '11', 25, '0', '0', '15', 0, '15', 1, '', '2016-05-31 10:16:50', '2016-05-30 07:01:29', NULL),
(2, 'An ninh mạng  (N0 1.TH 1)', 44, 2, 1, 'Viết 60p', 10, 1, 'TH', 'K12A TC', 32, '0', '0', '9.6', 0, '9.6', 2, '', '2016-05-31 16:32:59', '2016-05-30 07:01:29', NULL),
(3, 'An ninh mạng ( N0 1)', 44, 3, 1, 'Trắc nghiệm 60p', 1, 1, 'LT', '11', 25, '30', '0', '0', 6, '36', 6, '', '2016-06-01 13:05:56', '2016-05-30 07:01:29', NULL),
(4, 'An ninh mạng ( N0 1)', 44, 2, 1, 'Viết 60p', 10, 1, 'LT', 'K12A TC', 32, '22.5', '0', '0', 4, '26.5', 0, '', '2016-05-30 07:01:29', '2016-05-30 07:01:29', NULL),
(5, 'An ninh mạng ( N0 1)', 44, 2, 1, 'Viết 60p', 3, 1, 'LT', '13', 56, '15', '0', '0', 4, '19', 0, '', '2016-05-30 07:01:29', '2016-05-30 07:01:29', NULL),
(6, 'Công nghệ và thiết bị mạng  (N0 1.TH 1)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 3, '', '2016-05-31 16:33:16', '2016-05-30 07:01:29', NULL),
(7, 'Công nghệ và thiết bị mạng  (N0 1.TH 1)', 37, 3, 1, 'Viết 90p', 10, 1, 'TH', 'K12A TC', 32, '0', '0', '19.2', 0, '19.2', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(8, 'Công nghệ và thiết bị mạng  (N0 1.TH 2)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(9, 'Công nghệ và thiết bị mạng  (N0 2.TH 1)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(10, 'Công nghệ và thiết bị mạng  (N0 2.TH 2)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(11, 'Công nghệ và thiết bị mạng  (N0 3.TH 1)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(12, 'Công nghệ và thiết bị mạng  (N0 3.TH 2)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(13, 'Công nghệ và thiết bị mạng  (N0 4.TH 1)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(14, 'Công nghệ và thiết bị mạng  (N0 4.TH 2)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(15, 'Công nghệ và thiết bị mạng ( N0 1)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'LT', '10', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(16, 'Công nghệ và thiết bị mạng ( N0 1)', 37, 3, 1, 'Viết 90p', 3, 1, 'LT', '13', 56, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(17, 'Công nghệ và thiết bị mạng ( N0 1)', 37, 3, 1, 'Viết 90p', 10, 1, 'LT', 'K12A TC', 32, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(18, 'Công nghệ và thiết bị mạng ( N0 2)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'LT', '10', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(19, 'Công nghệ và thiết bị mạng ( N0 3)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'LT', '10', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(20, 'Công nghệ và thiết bị mạng ( N0 4)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'LT', '10', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(21, 'Công nghệ mới trong truyền thông và mạng máy tính ( N0 1)', 47, 2, 0, 'Viết 60p', 1, 1, 'LT', '11', 25, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(22, 'Đánh giá hiệu năng mạng  (N0 1.TH 1)', 53, 3, 1, 'Viết 90p', 1, 1, 'TH', '10', 40, '0', '0', '24', 0, '24', 4, '', '2016-05-31 16:33:47', '2016-05-30 07:01:30', NULL),
(23, 'Đánh giá hiệu năng mạng  (N0 2.TH 1)', 53, 3, 1, 'Viết 90p', 1, 1, 'TH', '10', 40, '0', '0', '24', 0, '24', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(24, 'Đánh giá hiệu năng mạng ( N0 1)', 53, 3, 1, 'Viết 90p', 1, 1, 'LT', '10', 40, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(25, 'Đánh giá hiệu năng mạng ( N0 2)', 53, 3, 1, 'Viết 90p', 1, 1, 'LT', '10', 40, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(26, 'Khai phá dữ liệu Web ( N0 1)', 54, 2, 0, 'Viết 60p', 3, 1, 'LT', '10', 60, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(27, 'Khai phá dữ liệu Web ( N0 1)', 54, 2, 0, 'Viết 60p', 1, 1, 'LT', '10', 40, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(28, 'Khai phá dữ liệu Web ( N0 2)', 54, 2, 0, 'Viết 60p', 3, 1, 'LT', '10', 60, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(29, 'Khai phá dữ liệu Web ( N0 2)', 54, 2, 0, 'Viết 60p', 1, 1, 'LT', '10', 40, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(30, 'Khai phá dữ liệu Web ( N0 3)', 54, 2, 0, 'Viết 60p', 3, 1, 'LT', '10', 60, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(31, 'Khai phá dữ liệu Web ( N0 4)', 54, 2, 0, 'Viết 60p', 3, 1, 'LT', '10', 60, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(32, 'Lập trình truyền thông  (N0 1.TH 1)', 42, 3, 1, 'Viết 90p', 1, 1, 'TH', '11', 25, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(33, 'Lập trình truyền thông ( N0 1)', 42, 3, 1, 'Viết 90p', 1, 1, 'LT', '11', 25, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(34, 'Mạng máy tính  (N0 1.TH 1)', 25, 3, 1, 'Viết 90p', 11, 1, 'TH', '13', 16, '0', '0', '9.6', 0, '9.6', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(35, 'Mạng máy tính ( N0 1)', 25, 2, 0, 'Trắc nghiệm 60p', 12, 1, 'LT', '12', 33, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(36, 'Mạng máy tính ( N0 1)', 25, 3, 1, 'Viết 90p', 11, 1, 'LT', '13', 16, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(37, 'Mạng máy tính ( N0 2)', 25, 2, 0, 'Trắc nghiệm 60p', 12, 1, 'LT', '12', 33, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(38, 'Mạng thế hệ mới ( N0 1)', 45, 2, 0, 'Viết 60p', 1, 1, 'LT', '11', 25, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(39, 'Phát triển ứng dụng trên môi trường mạng  (N0 1.TH 1)', 43, 3, 1, 'Viết 90p', 3, 1, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(40, 'Phát triển ứng dụng trên môi trường mạng  (N0 1.TH 1)', 43, 2, 1, 'Viết 60p', 3, 1, 'TH', '13', 56, '0', '0', '33.6', 0, '33.6', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(41, 'Phát triển ứng dụng trên môi trường mạng  (N0 1.TH 1)', 43, 3, 1, 'Viết 90p', 1, 1, 'TH', '11', 25, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(42, 'Phát triển ứng dụng trên môi trường mạng  (N0 1.TH 2)', 43, 3, 1, 'Viết 90p', 3, 1, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(43, 'Phát triển ứng dụng trên môi trường mạng  (N0 2.TH 1)', 43, 3, 1, 'Viết 90p', 3, 1, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(44, 'Phát triển ứng dụng trên môi trường mạng  (N0 2.TH 2)', 43, 3, 1, 'Viết 90p', 3, 1, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(45, 'Phát triển ứng dụng trên môi trường mạng  (N0 3.TH 1)', 43, 3, 1, 'Viết 90p', 3, 1, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(46, 'Phát triển ứng dụng trên môi trường mạng  (N0 3.TH 2)', 43, 3, 1, 'Viết 90p', 3, 1, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(47, 'Phát triển ứng dụng trên môi trường mạng ( N0 1)', 43, 3, 1, 'Viết 90p', 3, 1, 'LT', '11', 50, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(48, 'Phát triển ứng dụng trên môi trường mạng ( N0 1)', 43, 2, 1, 'Viết 60p', 3, 1, 'LT', '13', 56, '15', '0', '0', 4, '19', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(49, 'Phát triển ứng dụng trên môi trường mạng ( N0 1)', 43, 3, 1, 'Viết 90p', 1, 1, 'LT', '11', 25, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(50, 'Phát triển ứng dụng trên môi trường mạng ( N0 2)', 43, 3, 1, 'Viết 90p', 3, 1, 'LT', '11', 50, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(51, 'Phát triển ứng dụng trên môi trường mạng ( N0 3)', 43, 3, 1, 'Viết 90p', 3, 1, 'LT', '11', 50, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(52, 'Thực tập TN ( N0 1)', 57, 5, 0, '', 1, 1, 'LT', '10', 40, '60', '21', '0', 10, '91', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(53, 'Thực tập TN ( N0 2)', 57, 5, 0, '', 1, 1, 'LT', '10', 40, '60', '21', '0', 10, '91', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(54, 'Truyền thông đa phương tiện ( N0 1)', 46, 2, 0, 'Viết 60p', 1, 1, 'LT', '11', 25, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(55, 'Tự chọn 1 ( N0 1)', 55, 3, 0, 'Viết 90p', 1, 1, 'LT', '10', 40, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(56, 'Tự chọn 1  ( N0 2)', 55, 3, 0, 'Viết 90p', 1, 1, 'LT', '10', 40, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(57, 'Tự chọn 2  ( N0 1)', 56, 3, 0, 'Viết 90p', 1, 1, 'LT', '10', 40, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(58, 'Tự chọn 2  ( N0 2)', 56, 3, 0, 'Viết 90p', 1, 1, 'LT', '10', 40, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(59, 'Công nghệ và thiết bị mạng  (N0 1.TH 1)', 37, 3, 1, 'Trắc nghiệm 60p', 1, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(60, 'Công nghệ và thiết bị mạng  (N0 1.TH 2)', 37, 3, 1, 'Trắc nghiệm 60p', 1, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(61, 'Công nghệ và thiết bị mạng ( N0 1)', 37, 3, 1, 'Trắc nghiệm 60p', 1, 2, 'LT', '12', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(62, 'Đồ án hoặc thi tốt nghiệp ( N0 1)', 58, 10, 0, '', 1, 2, 'LT', '10', 40, '120', '42', '0', 20, '182', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(63, 'Đồ án hoặc thi tốt nghiệp ( N0 2)', 58, 10, 0, '', 1, 2, 'LT', '10', 40, '120', '42', '0', 20, '182', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(64, 'Hệ điều hành mạng  (N0 1.TH 1)', 36, 2, 1, 'Trắc nghiệm 60p', 1, 2, 'TH', '12', 60, '0', '0', '9', 0, '9', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(65, 'Hệ điều hành mạng  (N0 1.TH 2)', 36, 2, 1, 'Trắc nghiệm 60p', 1, 2, 'TH', '12', 60, '0', '0', '9', 0, '9', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(66, 'Hệ điều hành mạng ( N0 1)', 36, 2, 1, 'Trắc nghiệm 60p', 1, 2, 'LT', '12', 60, '22.5', '0', '0', 4, '26.5', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(67, 'Hệ thống tin học phân tán ( N0 1)', 50, 3, 0, 'Viết 90p', 1, 2, 'LT', '11', 25, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(68, 'Internet và công nghệ web ( N0 1)', 38, 2, 0, 'Viết /90''', 1, 2, 'LT', '12', 60, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(69, 'Kỹ thuật truyền tin ( N0 1)', 27, 2, 0, 'Trắc nghiệm 60p', 6, 2, 'LT', '13', 29, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(70, 'Kỹ thuật truyền tin ( N0 1)', 27, 2, 0, 'Trắc nghiệm 60p', 3, 2, 'LT', '13', 50, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(71, 'Kỹ thuật truyền tin ( N0 1)', 27, 2, 0, 'Trắc nghiệm 60p', 1, 2, 'LT', '13', 21, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(72, 'Kỹ thuật truyền tin ( N0 1)', 27, 2, 0, 'Trắc nghiệm 60p', 4, 2, 'LT', '13', 45, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(73, 'Kỹ thuật truyền tin ( N0 2)', 27, 2, 0, 'Trắc nghiệm 60p', 3, 2, 'LT', '13', 50, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(74, 'Kỹ thuật truyền tin ( N0 2)', 27, 2, 0, 'Trắc nghiệm 60p', 4, 2, 'LT', '13', 45, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(75, 'Kỹ thuật truyền tin ( N0 3)', 27, 2, 0, 'Trắc nghiệm 60p', 3, 2, 'LT', '13', 50, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(76, 'Kỹ thuật truyền tin ( N0 4)', 27, 2, 0, 'Trắc nghiệm 60p', 3, 2, 'LT', '13', 50, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(77, 'Kỹ thuật truyền tin ( N0 5)', 27, 2, 0, 'Trắc nghiệm 60p', 3, 2, 'LT', '13', 50, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(78, 'Mạng truyền thông và di động ( N0 1)', 51, 3, 0, 'Trắc nghiệm 60p', 1, 2, 'LT', '11', 25, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(79, 'Phát triển ứng dụng trong điện toán DĐ  (N0 1.TH 1)', 35, 3, 1, 'Viết /90''', 1, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(80, 'Phát triển ứng dụng trong điện toán DĐ  (N0 1.TH 2)', 35, 3, 1, 'Viết /90''', 1, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(81, 'Phát triển ứng dụng trong điện toán DĐ ( N0 1)', 35, 3, 1, 'Viết /90''', 1, 2, 'LT', '12', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(82, 'Quản trị mạng  (N0 1.TH 1)', 48, 3, 1, 'Trắc nghiệm 60p', 1, 2, 'TH', '11', 25, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(83, 'Quản trị mạng ( N0 1)', 48, 3, 1, 'Trắc nghiệm 60p', 1, 2, 'LT', '11', 25, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:01:30', '2016-05-30 07:01:30', NULL),
(84, 'An ninh mạng  (N0 1.TH 1)', 44, 3, 1, 'Trắc nghiệm 60p', 1, 1, 'TH', '11', 25, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(85, 'An ninh mạng  (N0 1.TH 1)', 44, 2, 1, 'Viết 60p', 10, 1, 'TH', 'K12A TC', 32, '0', '0', '9.6', 0, '9.6', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(86, 'An ninh mạng ( N0 1)', 44, 3, 1, 'Trắc nghiệm 60p', 1, 1, 'LT', '11', 25, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(87, 'An ninh mạng ( N0 1)', 44, 2, 1, 'Viết 60p', 10, 1, 'LT', 'K12A TC', 32, '22.5', '0', '0', 4, '26.5', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(88, 'An ninh mạng ( N0 1)', 44, 2, 1, 'Viết 60p', 3, 1, 'LT', '13', 56, '15', '0', '0', 4, '19', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(89, 'Công nghệ và thiết bị mạng  (N0 1.TH 1)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(90, 'Công nghệ và thiết bị mạng  (N0 1.TH 1)', 37, 3, 1, 'Viết 90p', 10, 1, 'TH', 'K12A TC', 32, '0', '0', '19.2', 0, '19.2', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(91, 'Công nghệ và thiết bị mạng  (N0 1.TH 2)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(92, 'Công nghệ và thiết bị mạng  (N0 2.TH 1)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(93, 'Công nghệ và thiết bị mạng  (N0 2.TH 2)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(94, 'Công nghệ và thiết bị mạng  (N0 3.TH 1)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(95, 'Công nghệ và thiết bị mạng  (N0 3.TH 2)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(96, 'Công nghệ và thiết bị mạng  (N0 4.TH 1)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(97, 'Công nghệ và thiết bị mạng  (N0 4.TH 2)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'TH', '10', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(98, 'Công nghệ và thiết bị mạng ( N0 1)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'LT', '10', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(99, 'Công nghệ và thiết bị mạng ( N0 1)', 37, 3, 1, 'Viết 90p', 3, 1, 'LT', '13', 56, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(100, 'Công nghệ và thiết bị mạng ( N0 1)', 37, 3, 1, 'Viết 90p', 10, 1, 'LT', 'K12A TC', 32, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(101, 'Công nghệ và thiết bị mạng ( N0 2)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'LT', '10', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(102, 'Công nghệ và thiết bị mạng ( N0 3)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'LT', '10', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(103, 'Công nghệ và thiết bị mạng ( N0 4)', 37, 3, 1, 'Trắc nghiệm 60p', 3, 1, 'LT', '10', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(104, 'Công nghệ mới trong truyền thông và mạng máy tính ( N0 1)', 47, 2, 0, 'Viết 60p', 1, 1, 'LT', '11', 25, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(105, 'Đánh giá hiệu năng mạng  (N0 1.TH 1)', 53, 3, 1, 'Viết 90p', 1, 1, 'TH', '10', 40, '0', '0', '24', 0, '24', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(106, 'Đánh giá hiệu năng mạng  (N0 2.TH 1)', 53, 3, 1, 'Viết 90p', 1, 1, 'TH', '10', 40, '0', '0', '24', 0, '24', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(107, 'Đánh giá hiệu năng mạng ( N0 1)', 53, 3, 1, 'Viết 90p', 1, 1, 'LT', '10', 40, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(108, 'Đánh giá hiệu năng mạng ( N0 2)', 53, 3, 1, 'Viết 90p', 1, 1, 'LT', '10', 40, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(109, 'Khai phá dữ liệu Web ( N0 1)', 54, 2, 0, 'Viết 60p', 3, 1, 'LT', '10', 60, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(110, 'Khai phá dữ liệu Web ( N0 1)', 54, 2, 0, 'Viết 60p', 1, 1, 'LT', '10', 40, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(111, 'Khai phá dữ liệu Web ( N0 2)', 54, 2, 0, 'Viết 60p', 3, 1, 'LT', '10', 60, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:22:20', '2016-05-30 07:22:20', NULL),
(112, 'Khai phá dữ liệu Web ( N0 2)', 54, 2, 0, 'Viết 60p', 1, 1, 'LT', '10', 40, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(113, 'Khai phá dữ liệu Web ( N0 3)', 54, 2, 0, 'Viết 60p', 3, 1, 'LT', '10', 60, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(114, 'Khai phá dữ liệu Web ( N0 4)', 54, 2, 0, 'Viết 60p', 3, 1, 'LT', '10', 60, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(115, 'Lập trình truyền thông  (N0 1.TH 1)', 42, 3, 1, 'Viết 90p', 1, 1, 'TH', '11', 25, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(116, 'Lập trình truyền thông ( N0 1)', 42, 3, 1, 'Viết 90p', 1, 1, 'LT', '11', 25, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(117, 'Mạng máy tính  (N0 1.TH 1)', 25, 3, 1, 'Viết 90p', 11, 1, 'TH', '13', 16, '0', '0', '9.6', 0, '9.6', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(118, 'Mạng máy tính ( N0 1)', 25, 2, 0, 'Trắc nghiệm 60p', 12, 1, 'LT', '12', 33, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(119, 'Mạng máy tính ( N0 1)', 25, 3, 1, 'Viết 90p', 11, 1, 'LT', '13', 16, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(120, 'Mạng máy tính ( N0 2)', 25, 2, 0, 'Trắc nghiệm 60p', 12, 1, 'LT', '12', 33, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(121, 'Mạng thế hệ mới ( N0 1)', 45, 2, 0, 'Viết 60p', 1, 1, 'LT', '11', 25, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(122, 'Phát triển ứng dụng trên môi trường mạng  (N0 1.TH 1)', 43, 3, 1, 'Viết 90p', 3, 1, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(123, 'Phát triển ứng dụng trên môi trường mạng  (N0 1.TH 1)', 43, 2, 1, 'Viết 60p', 3, 1, 'TH', '13', 56, '0', '0', '33.6', 0, '33.6', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(124, 'Phát triển ứng dụng trên môi trường mạng  (N0 1.TH 1)', 43, 3, 1, 'Viết 90p', 1, 1, 'TH', '11', 25, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(125, 'Phát triển ứng dụng trên môi trường mạng  (N0 1.TH 2)', 43, 3, 1, 'Viết 90p', 3, 1, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(126, 'Phát triển ứng dụng trên môi trường mạng  (N0 2.TH 1)', 43, 3, 1, 'Viết 90p', 3, 1, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(127, 'Phát triển ứng dụng trên môi trường mạng  (N0 2.TH 2)', 43, 3, 1, 'Viết 90p', 3, 1, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(128, 'Phát triển ứng dụng trên môi trường mạng  (N0 3.TH 1)', 43, 3, 1, 'Viết 90p', 3, 1, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(129, 'Phát triển ứng dụng trên môi trường mạng  (N0 3.TH 2)', 43, 3, 1, 'Viết 90p', 3, 1, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(130, 'Phát triển ứng dụng trên môi trường mạng ( N0 1)', 43, 3, 1, 'Viết 90p', 3, 1, 'LT', '11', 50, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(131, 'Phát triển ứng dụng trên môi trường mạng ( N0 1)', 43, 2, 1, 'Viết 60p', 3, 1, 'LT', '13', 56, '15', '0', '0', 4, '19', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(132, 'Phát triển ứng dụng trên môi trường mạng ( N0 1)', 43, 3, 1, 'Viết 90p', 1, 1, 'LT', '11', 25, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(133, 'Phát triển ứng dụng trên môi trường mạng ( N0 2)', 43, 3, 1, 'Viết 90p', 3, 1, 'LT', '11', 50, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(134, 'Phát triển ứng dụng trên môi trường mạng ( N0 3)', 43, 3, 1, 'Viết 90p', 3, 1, 'LT', '11', 50, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(135, 'Thực tập TN ( N0 1)', 57, 5, 0, '', 1, 1, 'LT', '10', 40, '60', '21', '0', 10, '91', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(136, 'Thực tập TN ( N0 2)', 57, 5, 0, '', 1, 1, 'LT', '10', 40, '60', '21', '0', 10, '91', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(137, 'Truyền thông đa phương tiện ( N0 1)', 46, 2, 0, 'Viết 60p', 1, 1, 'LT', '11', 25, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(138, 'Tự chọn 1 ( N0 1)', 55, 3, 0, 'Viết 90p', 1, 1, 'LT', '10', 40, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(139, 'Tự chọn 1  ( N0 2)', 55, 3, 0, 'Viết 90p', 1, 1, 'LT', '10', 40, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(140, 'Tự chọn 2  ( N0 1)', 56, 3, 0, 'Viết 90p', 1, 1, 'LT', '10', 40, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(141, 'Tự chọn 2  ( N0 2)', 56, 3, 0, 'Viết 90p', 1, 1, 'LT', '10', 40, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(142, 'Công nghệ và thiết bị mạng  (N0 1.TH 1)', 37, 3, 1, 'Trắc nghiệm 60p', 1, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(143, 'Công nghệ và thiết bị mạng  (N0 1.TH 2)', 37, 3, 1, 'Trắc nghiệm 60p', 1, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(144, 'Công nghệ và thiết bị mạng ( N0 1)', 37, 3, 1, 'Trắc nghiệm 60p', 1, 2, 'LT', '12', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(145, 'Đồ án hoặc thi tốt nghiệp ( N0 1)', 58, 10, 0, '', 1, 2, 'LT', '10', 40, '120', '42', '0', 20, '182', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(146, 'Đồ án hoặc thi tốt nghiệp ( N0 2)', 58, 10, 0, '', 1, 2, 'LT', '10', 40, '120', '42', '0', 20, '182', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(147, 'Hệ điều hành mạng  (N0 1.TH 1)', 36, 2, 1, 'Trắc nghiệm 60p', 1, 2, 'TH', '12', 60, '0', '0', '9', 0, '9', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(148, 'Hệ điều hành mạng  (N0 1.TH 2)', 36, 2, 1, 'Trắc nghiệm 60p', 1, 2, 'TH', '12', 60, '0', '0', '9', 0, '9', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(149, 'Hệ điều hành mạng ( N0 1)', 36, 2, 1, 'Trắc nghiệm 60p', 1, 2, 'LT', '12', 60, '22.5', '0', '0', 4, '26.5', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(150, 'Hệ thống tin học phân tán ( N0 1)', 50, 3, 0, 'Viết 90p', 1, 2, 'LT', '11', 25, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(151, 'Internet và công nghệ web ( N0 1)', 38, 2, 0, 'Viết /90''', 1, 2, 'LT', '12', 60, '24', '8.4', '0', 4, '36.4', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(152, 'Kỹ thuật truyền tin ( N0 1)', 27, 2, 0, 'Trắc nghiệm 60p', 6, 2, 'LT', '13', 29, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(153, 'Kỹ thuật truyền tin ( N0 1)', 27, 2, 0, 'Trắc nghiệm 60p', 3, 2, 'LT', '13', 50, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(154, 'Kỹ thuật truyền tin ( N0 1)', 27, 2, 0, 'Trắc nghiệm 60p', 1, 2, 'LT', '13', 21, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(155, 'Kỹ thuật truyền tin ( N0 1)', 27, 2, 0, 'Trắc nghiệm 60p', 4, 2, 'LT', '13', 45, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(156, 'Kỹ thuật truyền tin ( N0 2)', 27, 2, 0, 'Trắc nghiệm 60p', 3, 2, 'LT', '13', 50, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(157, 'Kỹ thuật truyền tin ( N0 2)', 27, 2, 0, 'Trắc nghiệm 60p', 4, 2, 'LT', '13', 45, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(158, 'Kỹ thuật truyền tin ( N0 3)', 27, 2, 0, 'Trắc nghiệm 60p', 3, 2, 'LT', '13', 50, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(159, 'Kỹ thuật truyền tin ( N0 4)', 27, 2, 0, 'Trắc nghiệm 60p', 3, 2, 'LT', '13', 50, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(160, 'Kỹ thuật truyền tin ( N0 5)', 27, 2, 0, 'Trắc nghiệm 60p', 3, 2, 'LT', '13', 50, '24', '0', '0', 4, '28', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(161, 'Mạng truyền thông và di động ( N0 1)', 51, 3, 0, 'Trắc nghiệm 60p', 1, 2, 'LT', '11', 25, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(162, 'Phát triển ứng dụng trong điện toán DĐ  (N0 1.TH 1)', 35, 3, 1, 'Viết /90''', 1, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(163, 'Phát triển ứng dụng trong điện toán DĐ  (N0 1.TH 2)', 35, 3, 1, 'Viết /90''', 1, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(164, 'Phát triển ứng dụng trong điện toán DĐ ( N0 1)', 35, 3, 1, 'Viết /90''', 1, 2, 'LT', '12', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(165, 'Quản trị mạng  (N0 1.TH 1)', 48, 3, 1, 'Trắc nghiệm 60p', 1, 2, 'TH', '11', 25, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(166, 'Quản trị mạng ( N0 1)', 48, 3, 1, 'Trắc nghiệm 60p', 1, 2, 'LT', '11', 25, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(167, 'Quản trị và an ninh mạng  (N0 1.TH 1)', 133, 3, 1, 'Viết 90p', 3, 2, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(168, 'Quản trị và an ninh mạng  (N0 1.TH 2)', 133, 3, 1, 'Viết 90p', 3, 2, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(169, 'Quản trị và an ninh mạng  (N0 2.TH 1)', 133, 3, 1, 'Viết 90p', 3, 2, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(170, 'Quản trị và an ninh mạng  (N0 2.TH 2)', 133, 3, 1, 'Viết 90p', 3, 2, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(171, 'Quản trị và an ninh mạng  (N0 3.TH 1)', 133, 3, 1, 'Viết 90p', 3, 2, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(172, 'Quản trị và an ninh mạng  (N0 3.TH 2)', 133, 3, 1, 'Viết 90p', 3, 2, 'TH', '11', 50, '0', '0', '15', 0, '15', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(173, 'Quản trị và an ninh mạng ( N0 1)', 133, 3, 1, 'Viết 90p', 3, 2, 'LT', '11', 50, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(174, 'Quản trị và an ninh mạng ( N0 2)', 133, 3, 1, 'Viết 90p', 3, 2, 'LT', '11', 50, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(175, 'Quản trị và an ninh mạng ( N0 3)', 133, 3, 1, 'Viết 90p', 3, 2, 'LT', '11', 50, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(176, 'Thiết kế mạng Intranet ( N0 1)', 49, 3, 0, 'Viết 90', 1, 2, 'LT', '11', 25, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(177, 'Thiết kế phát triển website  (N0 1.TH 1)', 118, 3, 1, 'Viết /90''', 3, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(178, 'Thiết kế phát triển website  (N0 1.TH 2)', 118, 3, 1, 'Viết /90''', 3, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(179, 'Thiết kế phát triển website  (N0 2.TH 1)', 118, 3, 1, 'Viết /90''', 3, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(180, 'Thiết kế phát triển website  (N0 2.TH 2)', 118, 3, 1, 'Viết /90''', 3, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(181, 'Thiết kế phát triển website  (N0 3.TH 1)', 118, 3, 1, 'Viết /90''', 3, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(182, 'Thiết kế phát triển website  (N0 3.TH 2)', 118, 3, 1, 'Viết /90''', 3, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(183, 'Thiết kế phát triển website  (N0 4.TH 1)', 118, 3, 1, 'Viết /90''', 3, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(184, 'Thiết kế phát triển website  (N0 4.TH 2)', 118, 3, 1, 'Viết /90''', 3, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(185, 'Thiết kế phát triển website  (N0 5.TH 1)', 118, 3, 1, 'Viết /90''', 3, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(186, 'Thiết kế phát triển website  (N0 5.TH 2)', 118, 3, 1, 'Viết /90''', 3, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(187, 'Thiết kế phát triển website  (N0 6.TH 1)', 118, 3, 1, 'Viết /90''', 3, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(188, 'Thiết kế phát triển website  (N0 6.TH 2)', 118, 3, 1, 'Viết /90''', 3, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(189, 'Thiết kế phát triển website ( N0 1)', 118, 3, 1, 'Viết /90''', 3, 2, 'LT', '12', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(190, 'Thiết kế phát triển website ( N0 2)', 118, 3, 1, 'Viết /90''', 3, 2, 'LT', '12', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(191, 'Thiết kế phát triển website ( N0 3)', 118, 3, 1, 'Viết /90''', 3, 2, 'LT', '12', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(192, 'Thiết kế phát triển website ( N0 4)', 118, 3, 1, 'Viết /90''', 3, 2, 'LT', '12', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(193, 'Thiết kế phát triển website ( N0 5)', 118, 3, 1, 'Viết /90''', 3, 2, 'LT', '12', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(194, 'Thiết kế phát triển website ( N0 6)', 118, 3, 1, 'Viết /90''', 3, 2, 'LT', '12', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(195, 'Thiết kế web  (N0 1.TH 1)', 39, 3, 1, 'Viết /90''', 1, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(196, 'Thiết kế web  (N0 1.TH 2)', 39, 3, 1, 'Viết /90''', 1, 2, 'TH', '12', 60, '0', '0', '18', 0, '18', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(197, 'Thiết kế web ( N0 1)', 39, 3, 1, 'Viết /90''', 1, 2, 'LT', '12', 60, '30', '0', '0', 6, '36', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL),
(198, 'Thực tập chuyên ngành ( N0 1)', 52, 3, 0, '', 1, 2, 'LT', '11', 25, '36', '12.6', '0', 6, '54.6', 0, '', '2016-05-30 07:22:21', '2016-05-30 07:22:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doan_types`
--

CREATE TABLE `doan_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doan_types`
--

INSERT INTO `doan_types` (`id`, `type_name`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Lịch thi', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00'),
(2, 'Khảo thí', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00'),
(3, 'Khoa học', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00'),
(4, 'Thường xuyên', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00'),
(5, 'Thực tập (khác)', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00'),
(6, 'Khác', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00'),
(7, 'other', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `lesson` text NOT NULL,
  `outline` text NOT NULL,
  `banks` text NOT NULL,
  `exercise` text NOT NULL,
  `lesson _plan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `summary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `calendar_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name_group` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `intership_time`
--

CREATE TABLE `intership_time` (
  `id` int(11) NOT NULL,
  `id_intertype` int(11) NOT NULL,
  `intertime_name` varchar(255) NOT NULL,
  `startdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `enddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `year_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `intership_time`
--

INSERT INTO `intership_time` (`id`, `id_intertype`, `intertime_name`, `startdate`, `enddate`, `year_id`, `content`, `description`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'THỰC TẬP CƠ SỞ LỚP ĐHCQ K12', '2016-01-11 20:17:54', '2016-04-28 20:17:54', 5, '<p>Căn cứ v&agrave;o kế hoạch đ&agrave;o tạo của nh&agrave; trường, Khoa CNTT triển khai kế hoạch thực tập cơ sở d&agrave;nh cho sinh vi&ecirc;n lớp ĐHCQ K12 năm học 2015-2016 Thời gian thực hiện đề t&agrave;i: Từ ng&agrave;y 12/01/2016 đến ng&agrave;y 29', '', '', '2016-06-16 20:17:54', '2016-06-16 20:17:54', NULL),
(2, 4, 'ĐỒ ÁN TỐT NGHIỆP ĐHCQ K10', '2016-03-20 20:20:25', '2016-06-01 20:20:25', 5, '<p>Căn cứ v&agrave;o kế hoạch đ&agrave;o tạo của nh&agrave; trường, Khoa CNTT triển khai kế hoạch l&agrave;m ĐATN d&agrave;nh cho sinh vi&ecirc;n hệ Đại học ch&iacute;nh quy kh&oacute;a 10 năm học 2015-2016. Đề nghị c&aacute;c bộ m&ocirc;n, giảng vi&ecirc', '', '', '2016-06-16 20:19:07', '2016-06-16 20:20:25', NULL),
(3, 2, 'THỰC TẬP CHUYÊN NGÀNH LỚP ĐHCQ K9', '2016-05-10 20:20:10', '2016-06-14 20:20:10', 5, '<p>Căn cứ v&agrave;o kế hoạch đ&agrave;o tạo của nh&agrave; trường, Khoa CNTT triển khai kế hoạch thực tập chuy&ecirc;n ng&agrave;nh d&agrave;nh cho sinh vi&ecirc;n lớp ĐHCQ K9 năm học 2015-2016. Thời gian thực hiện đề t&agrave;i: Từ ng&agrave;y 11/5/2016', '', '', '2016-06-16 20:20:10', '2016-06-16 20:20:10', NULL),
(4, 4, 'ĐỒ ÁN TỐT NGHIỆP ĐHLT_CNTT_K13A BG', '2016-06-14 20:21:27', '2016-07-29 20:21:27', 5, '<p>Căn cứ v&agrave;o kế hoạch đ&agrave;o tạo của nh&agrave; trường, Khoa CNTT triển khai kế hoạch l&agrave;m ĐATN d&agrave;nh cho sinh vi&ecirc;n lớp ĐHLT_CNTT_K13A BG, năm học 2015-2016. Thời gian thực hiện: Từ ng&agrave;y 16/5/2016 tới ng&agrave;y 30/7/', '', '', '2016-06-16 20:21:27', '2016-06-16 20:21:27', NULL),
(5, 2, 'THỰC TẬP CHUYÊN NGÀNH  LỚP ĐHCQ K11', '2016-01-11 22:46:02', '2016-04-28 22:46:02', 5, '<p>Căn cứ v&agrave;o kế hoạch đ&agrave;o tạo của nh&agrave; trường, Khoa CNTT triển khai kế hoạch thực tập chuy&ecirc;n&nbsp;ng&agrave;nh d&agrave;nh cho sinh vi&ecirc;n lớp ĐHCQ K11 năm học 2015-2016 như sau:</p>\r\n\r\n<p>Thời gian thực hiện đề t&agrave;i: Từ ng&agrave;y 12/01/2016 đến ng&agrave;y 29/04/2016</p>\r\n\r\n<p>Đề nghị c&aacute;c bộ m&ocirc;n, gi&aacute;o vi&ecirc;n hướng dẫn v&agrave; sinh vi&ecirc;n lớp ĐHCQ K11 thực hiện theo&nbsp;đ&uacute;ng kế hoạch tr&ecirc;n.</p>\r\n', '', '', '2016-06-16 22:43:41', '2016-06-16 22:46:02', NULL),
(6, 3, 'THỰC TẬP TỐT NGHIỆP CÁC LỚP ĐHCQ K10', '2015-12-20 22:51:56', '2016-02-27 22:51:56', 5, '<p>Căn cứ v&agrave;o kế hoạch đ&agrave;o tạo của nh&agrave; trường, Khoa CNTT triển khai kế hoạch thực tập tốt nghiệp d&agrave;nh cho sinh vi&ecirc;n c&aacute;c lớp ĐHCQ K10, sinh vi&ecirc;n gh&eacute;p thực t&acirc;p c&ugrave;ng ĐHCQ K10 năm học 2015-2016 như sau: Thời gian thực tập: 08 tuần từ ng&agrave;y 21/12/2015 đến ng&agrave;y 28/02/2016(đ&atilde; t&iacute;nh thời gian nghỉ tết Nguy&ecirc;n Đ&aacute;n)</p>\r\n\r\n<p>Đề nghị c&aacute;c bộ m&ocirc;n, gi&aacute;o vi&ecirc;n hướng dẫn, sinh vi&ecirc;n c&aacute;c lớp ĐHCQ K10 v&agrave; c&aacute;c sinh vi&ecirc;n gh&eacute;p thực tập c&ugrave;ng ĐHCQ K10 thực hiện theo đ&uacute;ng kế hoạch tr&ecirc;n.</p>\r\n', '', '', '2016-06-16 22:51:56', '2016-06-16 22:51:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `intership_type`
--

CREATE TABLE `intership_type` (
  `id` int(11) NOT NULL,
  `intertype_name` varchar(255) NOT NULL,
  `intertype_fullname` varchar(255) NOT NULL,
  `allow` int(1) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `intership_type`
--

INSERT INTO `intership_type` (`id`, `intertype_name`, `intertype_fullname`, `allow`, `description`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TTCS', 'Thực tập cơ sở', 0, '2 tín chỉ', '4 tuần', '2016-06-16 11:35:26', '2016-06-16 04:35:26', NULL),
(2, 'TTCN', 'Thực tập Chuyên ngành', NULL, '3 tín chỉ', '5 tuần', '2016-05-12 16:45:34', '2016-05-12 16:45:34', NULL),
(3, 'TTTN', 'Thực tập tốt nghiệp', 1, '5 tín chỉ', '8 tuần', '2016-05-26 09:54:20', '2016-05-26 09:54:20', NULL),
(4, 'ĐATN', 'Đồ án tốt nghiệp', NULL, '10 tín chỉ', '10 tuần', '2016-05-12 16:46:16', '2016-05-12 16:46:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `intertime_id` int(11) DEFAULT NULL,
  `startdate` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `enddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `location` varchar(255) DEFAULT NULL,
  `event` text NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `important` int(1) NOT NULL DEFAULT '0',
  `allday` int(1) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `job_name`, `intertime_id`, `startdate`, `enddate`, `location`, `event`, `teacher`, `content`, `important`, `allday`, `description`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Sinh viên nhận đề tài', 1, '2016-01-11 20:51:44', '2016-01-14 20:51:44', 'C1.202', 'asebdn9kngkr21ihvvbihhvf3s', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Sinh viên nhận đề tài', 1, 1, 'Sinh viên nhận đề tài', '', '2016-06-16 20:27:26', '2016-06-16 20:51:46', NULL),
(4, 'Sinh viên nộp bản đề cương cho GVHD', 1, '2016-01-11 20:51:19', '2016-01-16 20:51:19', 'C1.202', 'megrmdld6e5vcm9u33lhbgkaro', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Sinh viên nộp bản đề cương cho GVHD', 1, 1, 'Sinh viên nộp bản đề cương cho GVHD', '', '2016-06-16 20:41:01', '2016-06-16 20:51:22', NULL),
(5, 'Giáo viên hướng dẫn nộp bản đăng ký thực tập vào đề cương chi tiết về Bộ môn', 1, '2016-01-16 20:53:17', '2016-01-17 20:53:17', 'C1.202', '7qrc77cmrpg32iqbp73q3bltto', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Giáo viên hướng dẫn nộp bản đăng ký thực tập vào đề cương chi tiết về Bộ môn', 1, 1, 'Giáo viên hướng dẫn nộp bản đăng ký thực tập vào đề cương chi tiết về Bộ môn', '', '2016-06-16 20:53:17', '2016-06-16 20:53:19', NULL),
(6, 'Bộ môn gửi bản tổng hợp đề tài về khoa', 1, '2016-01-21 20:55:05', '2016-01-21 20:55:05', 'C1.303', 'cjqd6kscklko6i83v378de0osk', '["1"]', 'Bộ môn gửi bản tổng hợp đề tài về khoa', 1, 0, 'Bộ môn gửi bản tổng hợp đề tài về khoa', '', '2016-06-16 20:54:46', '2016-06-16 20:55:11', NULL),
(7, 'Sinh viên gặp GVHD xin chữ ký', 1, '2016-04-28 20:56:09', '2016-04-28 20:56:09', 'C1.202', 'csso807oed01qpevil2r5dhqos', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Sinh viên gặp GVHD xin chữ ký', 1, 1, 'Sinh viên gặp GVHD xin chữ ký', '', '2016-06-16 20:56:09', '2016-06-16 20:56:10', NULL),
(8, 'Giáo viên hướng dẫn nộp bản nhận xét và phiếu chấm điểm về khoa ', 1, '2016-04-28 20:57:58', '2016-05-01 20:57:58', 'C1.303', 'bbn4ikmd6o0she8m3o01ivrgm4', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Giáo viên hướng dẫn nộp bản nhận xét và phiếu chấm điểm về khoa ', 1, 1, 'Giáo viên hướng dẫn nộp bản nhận xét và phiếu chấm điểm về khoa ', '', '2016-06-16 20:57:58', '2016-06-16 20:58:00', NULL),
(9, 'Sinh viên nhận đề tài', 3, '2016-05-09 21:02:54', '2016-05-10 21:02:54', 'C1.202', 'me50rdlj1pgg0ku879l0d0squk', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Sinh viên nhận đề tài', 1, 1, 'Sinh viên nhận đề tài', '', '2016-06-16 21:02:54', '2016-06-16 21:02:56', NULL),
(10, 'Sinh viên nôp̣ bản đề cương cho GV hướng dân', 1, '2016-05-09 21:03:50', '2016-05-11 21:03:50', 'C1.202', '7o3hvnbif2d1mc8pkao1c06ksg', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Sinh viên nôp̣ bản đề cương cho GV hướng dân', 1, 1, 'Sinh viên nôp̣ bản đề cương cho GV hướng dân', '', '2016-06-16 21:03:50', '2016-06-16 21:03:51', NULL),
(11, 'Báo cáo đề tài TTCN dự kiến', 1, '2016-05-16 21:06:25', '2016-05-16 21:06:25', 'Giảng đường C5', 'bogh8gc8uc3qtlrvl45t8b0170', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Báo cáo đề tài TTCN dự kiến', 1, 1, 'Báo cáo đề tài TTCN dự kiến', '', '2016-06-16 21:05:59', '2016-06-16 21:06:28', NULL),
(12, 'Sinh viên nôp̣ bản đề cương cho GV hướng dân', 3, '2016-05-09 21:07:44', '2016-05-11 21:07:44', 'C1.202', 'rdbsuuv3ah2584pfj9ircu57e0', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Sinh viên nôp̣ bản đề cương cho GV hướng dân', 1, 1, 'Sinh viên nôp̣ bản đề cương cho GV hướng dân', '', '2016-06-16 21:07:29', '2016-06-16 21:07:47', NULL),
(13, 'Giáo viên hướng dẫn nộp bản đăng ký thực tập và đề cương chi tiết của sinh viên về BM', 3, '2016-05-09 21:24:54', '2016-05-11 21:24:54', 'C1.202', '7pshb99u527olov0rj91hnc04k', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Giáo viên hướng dẫn nộp bản đăng ký thực tập và đề cương chi tiết của sinh viên về BM', 1, 1, 'Giáo viên hướng dẫn nộp bản đăng ký thực tập và đề cương chi tiết của sinh viên về BM', '', '2016-06-16 21:24:54', '2016-06-16 21:24:57', NULL),
(14, 'Bô ̣môn gửi tổng hơp̣ đề tài thưc̣ tâp̣ về khoa', 3, '2016-05-15 21:26:29', '2016-05-15 21:26:29', 'C1.303', '0q3h7oopeur52pttoie492jics', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Bô ̣môn gửi tổng hơp̣ đề tài thưc̣ tâp̣ về khoa', 1, 1, 'Bô ̣môn gửi tổng hơp̣ đề tài thưc̣ tâp̣ về khoa', '', '2016-06-16 21:26:29', '2016-06-16 21:26:31', NULL),
(15, 'SV găp̣ giáo viên hướng dâñ xin chữ ký', 3, '2016-06-14 21:27:33', '2016-06-14 21:27:33', 'C1.202', '4hupduvqimhldat3t7dp6gjceo', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'SV găp̣ giáo viên hướng dâñ xin chữ ký', 1, 1, 'SV găp̣ giáo viên hướng dâñ xin chữ ký', '', '2016-06-16 21:27:33', '2016-06-16 21:27:35', NULL),
(16, 'Giáo viên hướng dẫn nộp bản nhận xét và phiếu chấm điểm về khoa', 3, '2016-06-14 21:28:37', '2016-06-15 21:28:37', 'C1.303', 'ffs8d3n9j6pllisd0ukp8gtlc8', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Giáo viên hướng dẫn nộp bản nhận xét và phiếu chấm điểm về khoa', 1, 1, 'Giáo viên hướng dẫn nộp bản nhận xét và phiếu chấm điểm về khoa', '', '2016-06-16 21:28:37', '2016-06-16 21:28:40', NULL),
(17, 'Báo cáo đề tài TTCN dự kiến', 3, '2016-06-20 21:29:40', '2016-06-21 21:29:40', 'Giảng đường C5', 'meifl2s4isv24mduoilcl8p41s', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Báo cáo đề tài TTCN dự kiến', 0, 0, 'Báo cáo đề tài TTCN dự kiến', '', '2016-06-16 21:29:40', '2016-06-16 21:29:41', NULL),
(18, 'Sinh viên nhận đề tài', 2, '2016-03-20 21:32:01', '2016-05-22 21:32:01', 'C1.202', 'fe96rhcrt4nh79v4d8d05vlp3s', '["1","3","4","5","6","7","8","9","10","11","14","15","16","17"]', 'Sinh viên nhận đề tài', 1, 1, 'Sinh viên nhận đề tài', '', '2016-06-16 21:32:01', '2016-06-16 21:32:02', NULL),
(19, 'Giáo viên nộp bản đăng ký đồ án và đề cương chi tiết của SV  kèm  File tổng hợp thông tin đề tài ĐA của SV cho bộ môn', 2, '2016-03-22 21:35:12', '2016-03-22 21:35:12', 'C1.202', 'ocak2fukcretb3mcl0g3v7o2c4', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Giáo viên nộp bản đăng ký đồ án và đề cương chi tiết của SV  kèm  File tổng hợp thông tin đề tài ĐA của SV cho bộ môn', 1, 1, 'Giáo viên nộp bản đăng ký đồ án và đề cương chi tiết của SV  kèm  File tổng hợp thông tin đề tài ĐA của SV cho bộ môn', '', '2016-06-16 21:35:12', '2016-06-16 21:35:15', NULL),
(20, 'Bộ môn nộp  File tổng hợp đề tài đồ án', 2, '2016-03-29 21:47:17', '2016-03-29 21:47:17', 'C1.202', 'pv2rh6kce8t5j4ftmp47oo5pe8', '["1"]', 'Bộ môn nộp  File tổng hợp đề tài đồ án', 1, 1, 'Bộ môn nộp  File tổng hợp đề tài đồ án', '', '2016-06-16 21:36:13', '2016-06-16 21:47:20', NULL),
(21, 'Sinh viên gặp giáo viên hướng dẫn báo cáo tiến độ ĐA', 2, '2016-05-02 21:36:59', '2016-05-02 21:36:59', 'C1.202', 'pr5mp8fulmvvnmde1h0br4q31c', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Sinh viên gặp giáo viên hướng dẫn báo cáo tiến độ ĐA', 1, 1, 'Sinh viên gặp giáo viên hướng dẫn báo cáo tiến độ ĐA', '', '2016-06-16 21:36:59', '2016-06-16 21:37:00', NULL),
(22, 'Giáo viên hướng dẫn nộp kết quả báo cáo tiến độ về Bộ môn', 2, '2016-05-02 21:38:15', '2016-05-04 21:38:15', 'C1.202', 'il19rjmp20ksbaqq41icc4v56g', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Giáo viên hướng dẫn nộp kết quả báo cáo tiến độ về Bộ môn', 1, 1, 'Giáo viên hướng dẫn nộp kết quả báo cáo tiến độ về Bộ môn', '', '2016-06-16 21:38:15', '2016-06-16 21:38:17', NULL),
(23, 'BM gửi danh sách giới thiệu GV tham gia HĐ duyệt ĐA', 2, '2016-05-19 21:39:04', '2016-05-19 21:39:04', 'C1.303', '4u9qg7lj6hovnlhku14rv8t7ng', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'BM gửi danh sách giới thiệu GV tham gia HĐ duyệt ĐA', 1, 1, 'BM gửi danh sách giới thiệu GV tham gia HĐ duyệt ĐA', '', '2016-06-16 21:39:04', '2016-06-16 21:39:06', NULL),
(24, 'Khoa gửi Lịch làm việc của các HĐ duyệt ĐA', 2, '2016-05-26 21:39:51', '2016-05-26 21:39:51', 'C1.303', 'csjkeat34o4gceg35l5189n8ck', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Khoa gửi Lịch làm việc của các HĐ duyệt ĐA', 1, 1, 'Khoa gửi Lịch làm việc của các HĐ duyệt ĐA', '', '2016-06-16 21:39:51', '2016-06-16 21:39:52', NULL),
(25, 'Khoa tổ chức hội đồng duyệt ĐA', 2, '2016-06-01 21:41:07', '2016-06-01 21:41:07', 'Giảng đường C5', 'qurkn284ev2ktappmkbp31lhkc', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Khoa tổ chức hội đồng duyệt ĐA', 1, 1, 'Khoa tổ chức hội đồng duyệt ĐA', '', '2016-06-16 21:41:07', '2016-06-16 21:41:08', NULL),
(26, 'Bộ môn nộp cho Khoa danh sách giới thiệu giáo viên tham  gia phản biện đồ án tốt nghiệp ', 2, '2016-06-04 21:43:30', '2016-06-04 21:43:30', 'C1.303', 'glahsdsaj984f6609l7pj57onk', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Bộ môn nộp cho Khoa danh sách giới thiệu giáo viên tham \r\ngia phản biện đồ án tốt nghiệp ', 1, 1, 'Bộ môn nộp cho Khoa danh sách giới thiệu giáo viên tham \r\ngia phản biện đồ án tốt nghiệp ', '', '2016-06-16 21:43:30', '2016-06-16 21:43:33', NULL),
(27, 'Bộ môn gửi danh sách giới thiệu GV tham gia chấm ĐATN', 2, '2016-06-06 21:44:22', '2016-06-06 21:44:22', 'C1.202', 'adg7u8afclvbgvdg5sjhmr792s', '["1"]', 'Bộ môn gửi danh sách giới thiệu GV tham gia chấm ĐATN', 1, 0, 'Bộ môn gửi danh sách giới thiệu GV tham gia chấm ĐATN', '', '2016-06-16 21:44:22', '2016-06-16 21:44:23', NULL),
(28, 'Giáo viên hướng dẫn, giáo viên phản biện nộp cho văn phòng  khoa các biên bản, phiếu chấm', 2, '2016-06-06 21:45:31', '2016-06-09 21:45:31', 'C1.303', 's4vj4pfa1trssbs1e3luuqggh4', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Giáo viên hướng dẫn, giáo viên phản biện nộp cho văn phòng khoa các biên bản, phiếu chấm', 1, 0, 'Giáo viên hướng dẫn, giáo viên phản biện nộp cho văn phòng khoa các biên bản, phiếu chấm', '', '2016-06-16 21:45:31', '2016-06-16 21:45:34', NULL),
(29, 'Dự kiến bảo vệ', 2, '2016-06-12 21:46:25', '2016-06-18 21:46:25', 'Giảng đường C5', '8t775cclqjg9ade7r1r3o49jp4', '["1","3","4","5","6","7","8","9","10","11","14","15"]', 'Dự kiến bảo vệ', 0, 0, 'Dự kiến bảo vệ', '', '2016-06-16 21:46:25', '2016-06-16 21:46:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `list_student_by_intershiptime`
--

CREATE TABLE `list_student_by_intershiptime` (
  `id` int(11) NOT NULL,
  `intertime_id` int(11) DEFAULT NULL,
  `council_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `teacher_reviewer` int(11) DEFAULT NULL,
  `point` decimal(10,2) DEFAULT NULL,
  `allow` int(1) DEFAULT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_student_by_intershiptime`
--

INSERT INTO `list_student_by_intershiptime` (`id`, `intertime_id`, `council_id`, `student_id`, `topic_id`, `company_id`, `teacher_id`, `teacher_reviewer`, `point`, `allow`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(122, 1, NULL, 76, 66, NULL, 4, NULL, NULL, 1, '', '2016-06-16 21:59:29', '2016-06-16 22:53:50', NULL),
(123, 1, NULL, 78, 67, NULL, 4, NULL, NULL, 1, '', '2016-06-16 21:59:30', '2016-06-17 03:43:35', NULL),
(124, 1, NULL, 79, 68, NULL, 4, NULL, NULL, 1, '', '2016-06-16 21:59:30', '2016-06-17 03:43:36', NULL),
(125, 1, NULL, 80, 69, NULL, 4, NULL, NULL, 1, '', '2016-06-16 21:59:30', '2016-06-17 02:35:41', NULL),
(126, 1, NULL, 81, 70, NULL, 4, NULL, NULL, 1, '', '2016-06-16 21:59:30', '2016-06-17 03:43:36', NULL),
(127, 1, NULL, 82, 71, NULL, 4, NULL, NULL, 1, '', '2016-06-16 21:59:30', '2016-06-17 03:43:36', NULL),
(128, 1, NULL, 83, 72, NULL, 4, NULL, NULL, 1, '', '2016-06-16 21:59:30', '2016-06-17 03:43:36', NULL),
(129, 1, NULL, 84, 73, NULL, 4, NULL, NULL, NULL, '', '2016-06-16 21:59:30', '2016-06-17 03:43:37', NULL),
(130, 1, NULL, 85, 74, NULL, 4, NULL, NULL, NULL, '', '2016-06-16 21:59:30', '2016-06-16 22:51:59', NULL),
(131, 1, NULL, 86, 75, NULL, 4, NULL, NULL, NULL, '', '2016-06-16 21:59:31', '2016-06-16 22:52:37', NULL),
(132, 1, NULL, 87, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 21:59:57', '2016-06-16 21:59:57', NULL),
(133, 1, NULL, 88, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 21:59:57', '2016-06-16 21:59:57', NULL),
(134, 1, NULL, 89, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 21:59:57', '2016-06-16 21:59:57', NULL),
(135, 1, NULL, 90, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 21:59:58', '2016-06-16 21:59:58', NULL),
(136, 1, NULL, 91, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 21:59:58', '2016-06-16 21:59:58', NULL),
(137, 1, NULL, 92, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 21:59:58', '2016-06-16 21:59:58', NULL),
(138, 1, NULL, 93, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 21:59:58', '2016-06-16 21:59:58', NULL),
(139, 1, NULL, 94, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 21:59:58', '2016-06-16 21:59:58', NULL),
(140, 1, NULL, 95, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 21:59:58', '2016-06-16 21:59:58', NULL),
(141, 1, NULL, 96, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 21:59:58', '2016-06-16 21:59:58', NULL),
(142, 1, NULL, 97, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 22:00:40', '2016-06-16 22:00:40', NULL),
(143, 1, NULL, 98, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 22:00:40', '2016-06-16 22:00:40', NULL),
(144, 1, NULL, 99, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 22:00:40', '2016-06-16 22:00:40', NULL),
(145, 1, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 22:00:41', '2016-06-16 22:00:41', NULL),
(146, 1, NULL, 101, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 22:00:41', '2016-06-16 22:00:41', NULL),
(147, 1, NULL, 102, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 22:00:41', '2016-06-16 22:00:41', NULL),
(148, 1, NULL, 103, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 22:00:41', '2016-06-16 22:00:41', NULL),
(149, 1, NULL, 104, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 22:00:41', '2016-06-16 22:00:41', NULL),
(150, 1, NULL, 105, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 22:00:41', '2016-06-16 22:00:41', NULL),
(151, 1, NULL, 106, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 22:00:41', '2016-06-16 22:00:41', NULL),
(152, 2, NULL, 1, 76, NULL, 11, 3, NULL, 1, '', '2016-06-16 22:01:21', '2016-06-17 01:19:12', NULL),
(153, 2, NULL, 2, 77, NULL, 11, 4, NULL, 1, '', '2016-06-16 22:01:22', '2016-06-17 00:24:47', NULL),
(154, 2, NULL, 3, 78, NULL, 10, 8, NULL, 1, '', '2016-06-16 22:01:22', '2016-06-17 00:24:47', NULL),
(155, 2, NULL, 4, 79, NULL, 5, 18, NULL, 1, '', '2016-06-16 22:01:22', '2016-06-17 00:24:47', NULL),
(156, 2, NULL, 5, 80, NULL, 3, 8, NULL, 1, '', '2016-06-16 22:01:22', '2016-06-17 00:24:47', NULL),
(157, 2, NULL, 6, 81, NULL, 18, 3, NULL, 1, '', '2016-06-16 22:01:22', '2016-06-17 02:05:49', NULL),
(158, 2, NULL, 7, 82, NULL, 21, 1, NULL, 1, '', '2016-06-16 22:01:22', '2016-06-17 00:24:48', NULL),
(159, 2, NULL, 8, 83, NULL, 1, 21, NULL, 1, '', '2016-06-16 22:01:22', '2016-06-17 00:24:48', NULL),
(160, 2, NULL, 9, 84, NULL, 1, 20, NULL, 1, '', '2016-06-16 22:01:22', '2016-06-17 00:24:48', NULL),
(161, 2, NULL, 10, 85, NULL, 7, 1, NULL, 1, '', '2016-06-16 22:01:22', '2016-06-17 00:24:48', NULL),
(162, 2, NULL, 51, 86, NULL, 19, 1, NULL, 1, '', '2016-06-16 22:02:35', '2016-06-17 01:16:20', NULL),
(163, 2, NULL, 52, 87, NULL, 18, 3, NULL, 1, '', '2016-06-16 22:02:36', '2016-06-17 01:16:21', NULL),
(164, 2, NULL, 53, 88, NULL, 8, 20, NULL, 1, '', '2016-06-16 22:02:36', '2016-06-17 01:16:21', NULL),
(165, 2, NULL, 54, 89, NULL, 5, 21, NULL, 1, '', '2016-06-16 22:02:36', '2016-06-17 01:19:13', NULL),
(166, 2, NULL, 55, 90, NULL, 1, 8, NULL, 1, '', '2016-06-16 22:02:36', '2016-06-17 01:19:13', NULL),
(167, 2, NULL, 56, 91, NULL, 3, 4, NULL, 1, '', '2016-06-16 22:02:36', '2016-06-17 01:19:13', NULL),
(168, 2, NULL, 57, 92, NULL, 11, 20, NULL, 1, '', '2016-06-16 22:02:36', '2016-06-17 01:19:14', NULL),
(169, 2, NULL, 58, 93, NULL, 10, 14, NULL, 1, '', '2016-06-16 22:02:36', '2016-06-17 01:19:14', NULL),
(170, 2, NULL, 59, 94, NULL, 3, 9, NULL, 1, '', '2016-06-16 22:02:37', '2016-06-17 01:19:14', NULL),
(171, 2, NULL, 60, 95, NULL, 4, 20, NULL, 1, '', '2016-06-16 22:02:37', '2016-06-17 01:19:14', NULL),
(176, 5, NULL, 178, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 23:04:43', '2016-06-16 23:04:43', NULL),
(177, 5, NULL, 179, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 23:04:43', '2016-06-16 23:04:43', NULL),
(178, 5, NULL, 180, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 23:04:43', '2016-06-16 23:04:43', NULL),
(179, 5, NULL, 181, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 23:04:43', '2016-06-16 23:04:43', NULL),
(180, 5, NULL, 182, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 23:04:43', '2016-06-16 23:04:43', NULL),
(181, 5, NULL, 183, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 23:04:44', '2016-06-16 23:04:44', NULL),
(182, 5, NULL, 184, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 23:04:44', '2016-06-16 23:04:44', NULL),
(183, 5, NULL, 185, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 23:04:44', '2016-06-16 23:04:44', NULL),
(184, 5, NULL, 186, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 23:04:44', '2016-06-16 23:04:44', NULL),
(185, 5, NULL, 187, NULL, NULL, NULL, NULL, NULL, NULL, '', '2016-06-16 23:04:44', '2016-06-16 23:04:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `group_id`, `content`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'triển khai kế hoạch chấm đồ án tốt nghiệp hệ chính quy K10', 1, '2016-06-17 08:10:35', '2016-06-17 01:10:35', NULL),
(2, 1, 'ngày 17/6/2016', 1, '2016-06-17 08:10:48', '2016-06-17 01:10:48', NULL),
(3, 1, 'aaaaaa', 1, '2016-06-17 08:11:08', '2016-06-17 01:11:08', NULL),
(4, 1, 'aaaa', 1, '2016-06-17 08:11:11', '2016-06-17 01:11:11', NULL),
(5, 1, 'aaa', 1, '2016-06-17 08:11:18', '2016-06-17 01:11:18', NULL),
(6, 1, 'hello', 1, '2016-06-17 08:12:09', '2016-06-17 01:12:09', NULL),
(7, 1, 'Xin chao', 1, '2016-06-17 09:31:55', '2016-06-17 02:31:55', NULL),
(8, 2, 'Vang', 1, '2016-06-17 09:32:23', '2016-06-17 02:32:23', NULL),
(9, 1, 'alo', 1, '2016-06-17 09:34:19', '2016-06-17 02:34:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_07_24_095226_create_articles_table', 1),
('2015_07_24_124047_create_calendar_table', 1),
('2015_07_24_132345_create_events_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `route`, `description`, `deleted_at`) VALUES
(1, 'alo', 'alo', '', NULL),
(2, 'mmt::homepage', 'mmt::homepage', '', NULL),
(3, 'site::getaddcategory', 'site::getaddcategory', '', NULL),
(4, 'site::listcategory', 'site::listcategory', '', NULL),
(5, 'site::postaddcategory', 'site::postaddcategory', '', NULL),
(6, 'site::geteditcategory', 'site::geteditcategory', '', NULL),
(7, 'site::posteditcategory', 'site::posteditcategory', '', NULL),
(8, 'site::delcategory', 'site::delcategory', '', NULL),
(9, 'site::getaddarticle', 'site::getaddarticle', '', NULL),
(10, 'site::listarticle', 'site::listarticle', '', NULL),
(11, 'site::postaddarticle', 'site::postaddarticle', '', NULL),
(12, 'site::geteditarticle', 'site::geteditarticle', '', NULL),
(13, 'site::posteditarticle', 'site::posteditarticle', '', NULL),
(14, 'site::delarticle', 'site::delarticle', '', NULL),
(15, 'site::inbox', 'site::inbox', '', NULL),
(16, 'assign::sendfile', 'assign::sendfile', '', NULL),
(17, 'assign::layouttypework', 'assign::layouttypework', '', NULL),
(18, 'assign::savework', 'assign::savework', '', NULL),
(19, 'assign::savefilework', 'assign::savefilework', '', NULL),
(20, 'assign::worktasklayout', 'assign::worktasklayout', '', NULL),
(21, 'assign::listfile', 'assign::listfile', '', NULL),
(22, 'assign::deletefile', 'assign::deletefile', '', NULL),
(23, 'assign::addtask', 'assign::addtask', '', NULL),
(24, 'assign::savetask', 'assign::savetask', '', NULL),
(25, 'assign::listwork', 'assign::listwork', '', NULL),
(26, 'assign::approve', 'assign::approve', '', NULL),
(27, 'assign::updatetask', 'assign::updatetask', '', NULL),
(28, 'assign::assignteacher', 'assign::assignteacher', '', NULL),
(29, 'assign::showcalendar', 'assign::showcalendar', '', NULL),
(30, 'assign::sendmailall', 'assign::sendmailall', '', NULL),
(31, 'assign::customersend', 'assign::customersend', '', NULL),
(32, 'assign::sendmailcustomer', 'assign::sendmailcustomer', '', NULL),
(33, 'assign::assigntoday', 'assign::assigntoday', '', NULL),
(34, 'assign::assigntoweek', 'assign::assigntoweek', '', NULL),
(35, 'assign::assigntomonth', 'assign::assigntomonth', '', NULL),
(36, 'assign::assignfilterdate', 'assign::assignfilterdate', '', NULL),
(37, 'auth::getregister', 'auth::getregister', '', NULL),
(38, 'auth::postregister', 'auth::postregister', '', NULL),
(39, 'auth::getlogin', 'auth::getlogin', '', NULL),
(40, 'auth::getlogout', 'auth::getlogout', '', NULL),
(41, 'auth::getemail', 'auth::getemail', '', NULL),
(42, 'auth::postemail', 'auth::postemail', '', NULL),
(43, 'auth::getreset', 'auth::getreset', '', NULL),
(44, 'auth::postreset', 'auth::postreset', '', NULL),
(45, 'program::', 'program::', '', NULL),
(46, 'program::add', 'program::add', '', NULL),
(47, 'program::create', 'program::create', '', NULL),
(48, 'program::edit', 'program::edit', '', NULL),
(49, 'program::update', 'program::update', '', NULL),
(50, 'program::delete', 'program::delete', '', NULL),
(51, 'program1::', 'program1::', '', NULL),
(52, 'program1::luu', 'program1::luu', '', NULL),
(53, 'division::', 'division::', '', NULL),
(54, 'division::add', 'division::add', '', NULL),
(55, 'division::create', 'division::create', '', NULL),
(56, 'division::edit', 'division::edit', '', NULL),
(57, 'division::update', 'division::update', '', NULL),
(58, 'division::delete', 'division::delete', '', NULL),
(59, 'responsible::', 'responsible::', '', NULL),
(60, 'responsible::add', 'responsible::add', '', NULL),
(61, 'responsible::create', 'responsible::create', '', NULL),
(62, 'responsible::edit', 'responsible::edit', '', NULL),
(63, 'responsible::update', 'responsible::update', '', NULL),
(64, 'responsible::delete', 'responsible::delete', '', NULL),
(65, 'responsible::uploadfile', 'responsible::uploadfile', '', NULL),
(66, 'record::', 'record::', '', NULL),
(67, 'record::add', 'record::add', '', NULL),
(68, 'record::create', 'record::create', '', NULL),
(69, 'record::edit', 'record::edit', '', NULL),
(70, 'record::update', 'record::update', '', NULL),
(71, 'record::delete', 'record::delete', '', NULL),
(72, 'schedule::', 'schedule::', '', NULL),
(73, 'users:', 'users:', '', NULL),
(74, 'users:new', 'users:new', '', NULL),
(75, 'users:add', 'users:add', '', NULL),
(76, 'users:edit', 'users:edit', '', NULL),
(77, 'users:update', 'users:update', '', NULL),
(78, 'users:delete', 'users:delete', '', NULL),
(79, 'users:view_user', 'users:view_user', '', NULL),
(80, 'users:groups:', 'users:groups:', '', NULL),
(81, 'users:groups:new', 'users:groups:new', '', NULL),
(82, 'users:groups:add', 'users:groups:add', '', NULL),
(83, 'users:groups:permission', 'users:groups:permission', '', NULL),
(84, 'users:groups:edit', 'users:groups:edit', '', NULL),
(85, 'users:groups:update', 'users:groups:update', '', NULL),
(86, 'users:groups:delete', 'users:groups:delete', '', NULL),
(87, 'users:groups:multiaction', 'users:groups:multiaction', '', NULL),
(88, 'users:groups:view', 'users:groups:view', '', NULL),
(89, 'year::', 'year::', '', NULL),
(90, 'year::add', 'year::add', '', NULL),
(91, 'year::create', 'year::create', '', NULL),
(92, 'year::edit', 'year::edit', '', NULL),
(93, 'year::update', 'year::update', '', NULL),
(94, 'year::delete', 'year::delete', '', NULL),
(95, 'year::plans', 'year::plans', '', NULL),
(96, 'year::jobs', 'year::jobs', '', NULL),
(97, 'company::', 'company::', '', NULL),
(98, 'company::add', 'company::add', '', NULL),
(99, 'company::create', 'company::create', '', NULL),
(100, 'company::edit', 'company::edit', '', NULL),
(101, 'company::update', 'company::update', '', NULL),
(102, 'company::delete', 'company::delete', '', NULL),
(103, 'company::view', 'company::view', '', NULL),
(104, 'plan::', 'plan::', '', NULL),
(105, 'plan::add', 'plan::add', '', NULL),
(106, 'plan::create', 'plan::create', '', NULL),
(107, 'plan::edit', 'plan::edit', '', NULL),
(108, 'plan::update', 'plan::update', '', NULL),
(109, 'plan::delete', 'plan::delete', '', NULL),
(110, 'student::', 'student::', '', NULL),
(111, 'student::add', 'student::add', '', NULL),
(112, 'student::create', 'student::create', '', NULL),
(113, 'student::edit', 'student::edit', '', NULL),
(114, 'student::update', 'student::update', '', NULL),
(115, 'student::delete', 'student::delete', '', NULL),
(116, 'student::view', 'student::view', '', NULL),
(117, 'department::', 'department::', '', NULL),
(118, 'department::add', 'department::add', '', NULL),
(119, 'department::create', 'department::create', '', NULL),
(120, 'department::edit', 'department::edit', '', NULL),
(121, 'department::update', 'department::update', '', NULL),
(122, 'department::delete', 'department::delete', '', NULL),
(123, 'department::view', 'department::view', '', NULL),
(124, 'teacher::', 'teacher::', '', NULL),
(125, 'teacher::add', 'teacher::add', '', NULL),
(126, 'teacher::create', 'teacher::create', '', NULL),
(127, 'teacher::edit', 'teacher::edit', '', NULL),
(128, 'teacher::update', 'teacher::update', '', NULL),
(129, 'teacher::delete', 'teacher::delete', '', NULL),
(130, 'teacher::listbytime', 'teacher::listbytime', '', NULL),
(131, 'teacher::view', 'teacher::view', '', NULL),
(132, 'plan::view', 'plan::view', '', NULL),
(133, 'job::', 'job::', '', NULL),
(134, 'job::add', 'job::add', '', NULL),
(135, 'job::create', 'job::create', '', NULL),
(136, 'job::edit', 'job::edit', '', NULL),
(137, 'job::update', 'job::update', '', NULL),
(138, 'job::delete', 'job::delete', '', NULL),
(139, 'job::view', 'job::view', '', NULL),
(140, 'intership_type::', 'intership_type::', '', NULL),
(141, 'intership_type::add', 'intership_type::add', '', NULL),
(142, 'intership_type::create', 'intership_type::create', '', NULL),
(143, 'intership_type::edit', 'intership_type::edit', '', NULL),
(144, 'intership_type::update', 'intership_type::update', '', NULL),
(145, 'intership_type::delete', 'intership_type::delete', '', NULL),
(146, 'intership_type::view', 'intership_type::view', '', NULL),
(147, 'intership_time::', 'intership_time::', '', NULL),
(148, 'intership_time::listbyyear', 'intership_time::listbyyear', '', NULL),
(149, 'intership_time::add', 'intership_time::add', '', NULL),
(150, 'intership_time::create', 'intership_time::create', '', NULL),
(151, 'intership_time::edit', 'intership_time::edit', '', NULL),
(152, 'intership_time::update', 'intership_time::update', '', NULL),
(153, 'intership_time::delete', 'intership_time::delete', '', NULL),
(154, 'intership_time::view', 'intership_time::view', '', NULL),
(155, 'topic_process::', 'topic_process::', '', NULL),
(156, 'topic_process::add', 'topic_process::add', '', NULL),
(157, 'topic_process::create', 'topic_process::create', '', NULL),
(158, 'topic_process::edit', 'topic_process::edit', '', NULL),
(159, 'topic_process::update', 'topic_process::update', '', NULL),
(160, 'topic_process::delete', 'topic_process::delete', '', NULL),
(161, 'topic::', 'topic::', '', NULL),
(162, 'topic::add', 'topic::add', '', NULL),
(163, 'topic::create', 'topic::create', '', NULL),
(164, 'topic::edit', 'topic::edit', '', NULL),
(165, 'topic::update', 'topic::update', '', NULL),
(166, 'topic::delete', 'topic::delete', '', NULL),
(167, 'topic::listtopic', 'topic::listtopic', '', NULL),
(168, 'topic::process', 'topic::process', '', NULL),
(169, 'topic::updateprocess', 'topic::updateprocess', '', NULL),
(170, 'topic::view', 'topic::view', '', NULL),
(171, 'courses::', 'courses::', '', NULL),
(172, 'courses::add', 'courses::add', '', NULL),
(173, 'courses::create', 'courses::create', '', NULL),
(174, 'courses::edit', 'courses::edit', '', NULL),
(175, 'courses::update', 'courses::update', '', NULL),
(176, 'courses::delete', 'courses::delete', '', NULL),
(177, 'courses::view', 'courses::view', '', NULL),
(178, 'modules:', 'modules:', '', NULL),
(179, 'modules:updates', 'modules:updates', '', NULL),
(180, 'modules:edit', 'modules:edit', '', NULL),
(181, 'modules:update', 'modules:update', '', NULL),
(182, 'modules:delete', 'modules:delete', '', NULL),
(183, 'dashboard', 'dashboard', '', NULL),
(184, 'council::', 'council::', '', NULL),
(185, 'council::add', 'council::add', '', NULL),
(186, 'council::create', 'council::create', '', NULL),
(187, 'council::edit', 'council::edit', '', NULL),
(188, 'council::update', 'council::update', '', NULL),
(189, 'council::delete', 'council::delete', '', NULL),
(190, 'council::view', 'council::view', '', NULL),
(191, 'managerfile::', 'managerfile::', '', NULL),
(192, 'detail_council::', 'detail_council::', '', NULL),
(193, 'detail_council::add', 'detail_council::add', '', NULL),
(194, 'detail_council::create', 'detail_council::create', '', NULL),
(195, 'detail_council::edit', 'detail_council::edit', '', NULL),
(196, 'detail_council::update', 'detail_council::update', '', NULL),
(197, 'detail_council::delete', 'detail_council::delete', '', NULL),
(198, 'detail_council::view', 'detail_council::view', '', NULL),
(199, 'managerfile::savework', 'managerfile::savework', '', NULL),
(200, 'assign::filterwork', 'assign::filterwork', '', NULL),
(201, 'assign::listassign', 'assign::listassign', '', NULL),
(202, 'assign::listassignall', 'assign::listassignall', '', NULL),
(203, 'assign::assigntodayall', 'assign::assigntodayall', '', NULL),
(204, 'assign::assigntoweekall', 'assign::assigntoweekall', '', NULL),
(205, 'assign::assigntomonthall', 'assign::assigntomonthall', '', NULL),
(206, 'assign::assignfilterdateall', 'assign::assignfilterdateall', '', NULL),
(207, 'student::search', 'student::search', '', NULL),
(208, 'intership_time::create_list_students', 'intership_time::create_list_students', '', NULL),
(209, 'divised::update_division', 'divised::update_division', '', NULL),
(210, 'mmt::contactpage', 'mmt::contactpage', '', NULL),
(211, 'mmt::sendfeedback', 'mmt::sendfeedback', '', NULL),
(212, 'mmt::detailpage', 'mmt::detailpage', '', NULL),
(213, 'mmt::allarticle', 'mmt::allarticle', '', NULL),
(214, 'site::getfeedback', 'site::getfeedback', '', NULL),
(215, 'site::postfeedback', 'site::postfeedback', '', NULL),
(216, 'intership_time::addListStudent', 'intership_time::addListStudent', '', NULL),
(217, 'intership_time::createListStudent', 'intership_time::createListStudent', '', NULL),
(218, 'intership_time::listStudent', 'intership_time::listStudent', '', NULL),
(219, 'divised::update', 'divised::update', '', NULL),
(220, 'intership_time::addlistTeacher', 'intership_time::addlistTeacher', '', NULL),
(221, 'intership_time::listGuideTeacher', 'intership_time::listGuideTeacher', '', NULL),
(222, 'intership_time::listStudentOfGuideTeacher', 'intership_time::listStudentOfGuideTeacher', '', NULL),
(223, 'mmt::allnotes', 'mmt::allnotes', '', NULL),
(224, 'mmt::detailnotes', 'mmt::detailnotes', '', NULL),
(225, 'mmt::allevent', 'mmt::allevent', '', NULL),
(226, 'mmt::detailevent', 'mmt::detailevent', '', NULL),
(227, 'site::getaddnotes', 'site::getaddnotes', '', NULL),
(228, 'site::listnotes', 'site::listnotes', '', NULL),
(229, 'site::postaddnotes', 'site::postaddnotes', '', NULL),
(230, 'site::geteditnotes', 'site::geteditnotes', '', NULL),
(231, 'site::posteditnotes', 'site::posteditnotes', '', NULL),
(232, 'site::delnotes', 'site::delnotes', '', NULL),
(233, 'site::geteditintroduce', 'site::geteditintroduce', '', NULL),
(234, 'site::posteditintroduce', 'site::posteditintroduce', '', NULL),
(235, 'record::uploadfile', 'record::uploadfile', '', NULL),
(236, 'program1::add', 'program1::add', '', NULL),
(237, 'program1::create', 'program1::create', '', NULL),
(238, 'program1::edit', 'program1::edit', '', NULL),
(239, 'program1::update', 'program1::update', '', NULL),
(240, 'program1::delete', 'program1::delete', '', NULL),
(241, 'council_group::', 'council_group::', '', NULL),
(242, 'council_group::add', 'council_group::add', '', NULL),
(243, 'council_group::create', 'council_group::create', '', NULL),
(244, 'council_group::edit', 'council_group::edit', '', NULL),
(245, 'council_group::update', 'council_group::update', '', NULL),
(246, 'council_group::delete', 'council_group::delete', '', NULL),
(247, 'council_group::view', 'council_group::view', '', NULL),
(248, 'student::import', 'student::import', '', NULL),
(249, 'job::import', 'job::import', '', NULL),
(250, 'council::import', 'council::import', '', NULL),
(251, 'company::import', 'company::import', '', NULL),
(252, 'council::addCouncilDetail', 'council::addCouncilDetail', '', NULL),
(253, 'users:changepass', 'users:changepass', '', NULL),
(254, 'council::createCouncilDetail', 'council::createCouncilDetail', '', NULL),
(255, 'council::listCouncilDetail', 'council::listCouncilDetail', '', NULL),
(256, 'users:change_pass', 'users:change_pass', '', NULL),
(257, 'chat::send', 'chat::send', '', NULL),
(258, 'chat::get', 'chat::get', '', NULL),
(259, 'intership_time::view_topic', 'intership_time::view_topic', '', NULL),
(260, 'chat::check', 'chat::check', '', NULL),
(261, 'chat::viewed', 'chat::viewed', '', NULL),
(262, 'year::view', 'year::view', '', NULL),
(263, 'council::addStudentPoint', 'council::addStudentPoint', '', NULL),
(264, 'council::createStudentPoint', 'council::createStudentPoint', '', NULL),
(265, 'intership_time::allowStudent', 'intership_time::allowStudent', '', NULL),
(266, 'intership_time::doAllow', 'intership_time::doAllow', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `create` int(1) NOT NULL,
  `update` int(1) NOT NULL,
  `delete` int(1) NOT NULL,
  `view` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `module` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `group`, `module`, `deleted_at`) VALUES
(1, 2, 1, NULL),
(2, 2, 2, NULL),
(3, 2, 3, NULL),
(4, 2, 4, NULL),
(5, 2, 5, NULL),
(6, 2, 6, NULL),
(7, 2, 7, NULL),
(8, 2, 8, NULL),
(9, 2, 9, NULL),
(10, 2, 10, NULL),
(11, 2, 11, NULL),
(12, 2, 12, NULL),
(13, 2, 13, NULL),
(14, 2, 14, NULL),
(15, 2, 15, NULL),
(16, 2, 16, NULL),
(17, 2, 17, NULL),
(18, 2, 18, NULL),
(19, 2, 19, NULL),
(20, 2, 20, NULL),
(21, 2, 21, NULL),
(22, 2, 22, NULL),
(23, 2, 23, NULL),
(24, 2, 24, NULL),
(25, 2, 25, NULL),
(26, 2, 26, NULL),
(27, 2, 27, NULL),
(28, 2, 28, NULL),
(29, 2, 29, NULL),
(30, 2, 30, NULL),
(31, 2, 31, NULL),
(32, 2, 32, NULL),
(33, 2, 33, NULL),
(34, 2, 34, NULL),
(35, 2, 35, NULL),
(36, 2, 36, NULL),
(37, 2, 37, NULL),
(38, 2, 38, NULL),
(39, 2, 39, NULL),
(40, 2, 40, NULL),
(41, 2, 41, NULL),
(42, 2, 42, NULL),
(43, 2, 43, NULL),
(44, 2, 44, NULL),
(45, 2, 45, NULL),
(46, 2, 46, NULL),
(47, 2, 47, NULL),
(48, 2, 48, NULL),
(49, 2, 49, NULL),
(50, 2, 50, NULL),
(51, 2, 51, NULL),
(52, 2, 52, NULL),
(53, 2, 53, NULL),
(54, 2, 54, NULL),
(55, 2, 55, NULL),
(56, 2, 56, NULL),
(57, 2, 57, NULL),
(58, 2, 58, NULL),
(59, 2, 59, NULL),
(60, 2, 60, NULL),
(61, 2, 61, NULL),
(62, 2, 62, NULL),
(63, 2, 63, NULL),
(64, 2, 64, NULL),
(65, 2, 65, NULL),
(66, 2, 66, NULL),
(67, 2, 67, NULL),
(68, 2, 68, NULL),
(69, 2, 69, NULL),
(70, 2, 70, NULL),
(71, 2, 71, NULL),
(72, 2, 72, NULL),
(73, 2, 73, NULL),
(74, 2, 74, NULL),
(75, 2, 75, NULL),
(76, 2, 76, NULL),
(77, 2, 77, NULL),
(78, 2, 78, NULL),
(79, 2, 79, NULL),
(80, 2, 80, NULL),
(81, 2, 81, NULL),
(82, 2, 82, NULL),
(83, 2, 83, NULL),
(84, 2, 84, NULL),
(85, 2, 85, NULL),
(86, 2, 86, NULL),
(87, 2, 87, NULL),
(88, 2, 88, NULL),
(89, 2, 89, NULL),
(90, 2, 90, NULL),
(91, 2, 91, NULL),
(92, 2, 92, NULL),
(93, 2, 93, NULL),
(94, 2, 94, NULL),
(95, 2, 95, NULL),
(96, 2, 96, NULL),
(97, 2, 97, NULL),
(98, 2, 98, NULL),
(99, 2, 99, NULL),
(100, 2, 100, NULL),
(101, 2, 101, NULL),
(102, 2, 102, NULL),
(103, 2, 103, NULL),
(104, 2, 104, NULL),
(105, 2, 105, '2016-06-14 19:16:23'),
(106, 2, 106, '2016-06-14 19:16:24'),
(107, 2, 107, '2016-06-14 19:16:25'),
(108, 2, 108, '2016-06-14 19:16:25'),
(109, 2, 109, '2016-06-14 19:16:25'),
(110, 2, 110, NULL),
(111, 2, 111, NULL),
(112, 2, 112, NULL),
(113, 2, 113, NULL),
(114, 2, 114, NULL),
(115, 2, 115, NULL),
(116, 2, 116, NULL),
(117, 2, 117, NULL),
(118, 2, 118, NULL),
(119, 2, 119, NULL),
(120, 2, 120, NULL),
(121, 2, 121, NULL),
(122, 2, 122, NULL),
(123, 2, 123, NULL),
(124, 2, 124, NULL),
(125, 2, 125, NULL),
(126, 2, 126, NULL),
(127, 2, 127, NULL),
(128, 2, 128, NULL),
(129, 2, 129, NULL),
(130, 2, 130, NULL),
(131, 2, 131, NULL),
(132, 2, 132, NULL),
(133, 2, 133, NULL),
(134, 2, 134, NULL),
(135, 2, 135, NULL),
(136, 2, 136, NULL),
(137, 2, 137, NULL),
(138, 2, 138, NULL),
(139, 2, 139, NULL),
(140, 2, 140, NULL),
(141, 2, 141, '2016-06-16 03:26:12'),
(142, 2, 142, '2016-06-16 03:26:12'),
(143, 2, 143, '2016-06-16 03:26:12'),
(144, 2, 144, '2016-06-16 03:26:12'),
(145, 2, 145, '2016-06-16 03:26:13'),
(146, 2, 146, NULL),
(147, 2, 147, NULL),
(148, 2, 148, NULL),
(149, 2, 149, '2016-06-16 03:26:13'),
(150, 2, 150, '2016-06-16 03:26:13'),
(151, 2, 151, '2016-06-16 03:26:13'),
(152, 2, 152, '2016-06-16 03:26:13'),
(153, 2, 153, '2016-06-16 03:26:13'),
(154, 2, 154, NULL),
(155, 2, 155, NULL),
(156, 2, 156, NULL),
(157, 2, 157, NULL),
(158, 2, 158, NULL),
(159, 2, 159, NULL),
(160, 2, 160, NULL),
(161, 2, 161, NULL),
(162, 2, 162, NULL),
(163, 2, 163, NULL),
(164, 2, 164, NULL),
(165, 2, 165, NULL),
(166, 2, 166, NULL),
(167, 2, 167, NULL),
(168, 2, 168, NULL),
(169, 2, 169, NULL),
(170, 2, 170, NULL),
(171, 2, 171, NULL),
(172, 2, 172, NULL),
(173, 2, 173, NULL),
(174, 2, 174, NULL),
(175, 2, 175, NULL),
(176, 2, 176, NULL),
(177, 2, 177, NULL),
(178, 2, 178, NULL),
(179, 2, 179, NULL),
(180, 2, 180, NULL),
(181, 2, 181, NULL),
(182, 2, 182, NULL),
(183, 2, 183, NULL),
(184, 2, 184, NULL),
(185, 2, 185, NULL),
(186, 2, 186, NULL),
(187, 2, 187, NULL),
(188, 2, 188, NULL),
(189, 2, 189, NULL),
(190, 2, 190, NULL),
(191, 2, 191, NULL),
(192, 2, 192, NULL),
(193, 2, 193, NULL),
(194, 2, 194, NULL),
(195, 2, 195, NULL),
(196, 2, 196, NULL),
(197, 2, 197, NULL),
(198, 2, 198, NULL),
(199, 2, 199, NULL),
(200, 2, 200, NULL),
(201, 2, 201, NULL),
(202, 2, 202, NULL),
(203, 2, 203, NULL),
(204, 2, 204, NULL),
(205, 2, 205, NULL),
(206, 2, 206, NULL),
(207, 2, 207, NULL),
(208, 2, 208, NULL),
(209, 2, 209, NULL),
(210, 2, 210, NULL),
(211, 2, 211, NULL),
(212, 2, 212, NULL),
(213, 2, 213, NULL),
(214, 2, 214, NULL),
(215, 2, 215, NULL),
(216, 2, 216, '2016-06-14 19:18:10'),
(217, 2, 217, '2016-06-14 19:18:10'),
(218, 2, 218, NULL),
(219, 2, 219, NULL),
(220, 2, 220, NULL),
(221, 2, 221, NULL),
(222, 2, 222, NULL),
(223, 1, 89, NULL),
(224, 1, 95, NULL),
(225, 1, 104, NULL),
(226, 1, 105, NULL),
(227, 1, 106, NULL),
(228, 1, 107, NULL),
(229, 1, 108, NULL),
(230, 1, 109, NULL),
(231, 1, 132, NULL),
(232, 2, 223, NULL),
(233, 2, 224, NULL),
(234, 2, 225, NULL),
(235, 2, 226, NULL),
(236, 2, 227, NULL),
(237, 2, 228, NULL),
(238, 2, 229, NULL),
(239, 2, 230, NULL),
(240, 2, 231, NULL),
(241, 2, 232, NULL),
(242, 2, 233, NULL),
(243, 2, 234, NULL),
(244, 2, 235, NULL),
(245, 2, 236, NULL),
(246, 2, 237, NULL),
(247, 2, 238, NULL),
(248, 2, 239, NULL),
(249, 2, 240, NULL),
(250, 1, 147, NULL),
(251, 2, 241, NULL),
(252, 2, 242, NULL),
(253, 2, 243, NULL),
(254, 2, 244, NULL),
(255, 2, 245, NULL),
(256, 2, 246, NULL),
(257, 2, 247, NULL),
(258, 3, 45, NULL),
(259, 3, 53, NULL),
(260, 3, 59, NULL),
(261, 3, 66, NULL),
(262, 3, 147, NULL),
(263, 3, 154, NULL),
(264, 2, 248, NULL),
(265, 3, 4, NULL),
(266, 3, 5, NULL),
(267, 3, 6, NULL),
(268, 3, 7, NULL),
(269, 3, 8, NULL),
(270, 3, 9, NULL),
(271, 3, 10, NULL),
(272, 3, 11, NULL),
(273, 3, 12, NULL),
(274, 3, 13, NULL),
(275, 3, 14, NULL),
(276, 3, 15, NULL),
(277, 3, 73, '2016-06-15 01:12:56'),
(278, 3, 80, '2016-06-15 01:12:57'),
(279, 2, 249, NULL),
(280, 2, 250, NULL),
(281, 2, 251, NULL),
(282, 3, 1, NULL),
(283, 3, 3, NULL),
(284, 3, 79, NULL),
(285, 3, 51, NULL),
(286, 2, 252, NULL),
(287, 2, 253, NULL),
(288, 2, 254, NULL),
(289, 2, 255, NULL),
(290, 2, 256, NULL),
(291, 2, 257, NULL),
(292, 2, 258, NULL),
(293, 1, 183, NULL),
(294, 1, 257, NULL),
(295, 1, 258, NULL),
(296, 2, 259, NULL),
(297, 2, 260, NULL),
(298, 2, 261, NULL),
(299, 2, 262, NULL),
(300, 1, 262, NULL),
(301, 3, 183, NULL),
(302, 3, 88, '2016-06-15 01:12:57'),
(303, 3, 103, NULL),
(304, 3, 116, NULL),
(305, 3, 123, NULL),
(306, 3, 131, NULL),
(307, 3, 139, NULL),
(308, 3, 146, '2016-06-10 21:03:29'),
(309, 3, 170, NULL),
(310, 3, 177, NULL),
(311, 3, 190, NULL),
(312, 3, 198, NULL),
(313, 3, 247, NULL),
(314, 3, 259, NULL),
(315, 3, 262, NULL),
(316, 3, 89, NULL),
(317, 3, 97, NULL),
(318, 3, 110, NULL),
(319, 3, 117, NULL),
(320, 3, 124, NULL),
(321, 3, 133, NULL),
(322, 3, 155, NULL),
(323, 3, 161, NULL),
(324, 3, 168, NULL),
(325, 3, 169, NULL),
(326, 3, 184, NULL),
(327, 3, 192, NULL),
(328, 3, 218, NULL),
(329, 3, 221, NULL),
(330, 3, 222, NULL),
(331, 3, 241, NULL),
(332, 3, 162, NULL),
(333, 3, 163, NULL),
(334, 1, 79, NULL),
(335, 1, 97, NULL),
(336, 1, 103, NULL),
(337, 1, 110, NULL),
(338, 1, 116, NULL),
(339, 1, 117, NULL),
(340, 1, 123, NULL),
(341, 1, 124, NULL),
(342, 1, 131, NULL),
(343, 1, 154, NULL),
(344, 1, 184, NULL),
(345, 1, 190, NULL),
(346, 1, 192, NULL),
(347, 1, 198, NULL),
(348, 1, 216, NULL),
(349, 1, 217, NULL),
(350, 1, 218, NULL),
(351, 1, 241, NULL),
(352, 1, 247, NULL),
(353, 1, 253, NULL),
(354, 1, 256, NULL),
(355, 1, 260, NULL),
(356, 1, 261, NULL),
(357, 3, 253, NULL),
(358, 3, 256, NULL),
(359, 2, 263, NULL),
(360, 2, 264, NULL),
(361, 2, 265, NULL),
(362, 2, 266, NULL),
(363, 1, 140, NULL),
(364, 1, 141, NULL),
(365, 1, 142, NULL),
(366, 1, 143, NULL),
(367, 1, 144, NULL),
(368, 1, 145, NULL),
(369, 1, 146, NULL),
(370, 1, 148, NULL),
(371, 1, 149, NULL),
(372, 1, 150, NULL),
(373, 1, 151, NULL),
(374, 1, 152, NULL),
(375, 1, 153, NULL),
(376, 1, 248, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `intertype_id` int(11) DEFAULT NULL,
  `plan_name` varchar(255) NOT NULL,
  `startdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `enddate` timestamp NULL DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `viewed` int(1) NOT NULL DEFAULT '0',
  `file` text,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `intertype_id`, `plan_name`, `startdate`, `enddate`, `year_id`, `content`, `description`, `note`, `viewed`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'TRIỂN KHAI THỰC TẬP CƠ SỞ LỚP ĐHCQ K12', '2016-01-12 06:45:19', '2016-04-29 06:45:19', 5, 'Căn cứ vào kế hoạch đào tạo của nhà trường, Khoa CNTT triển khai kế hoạch thực tập cơ sở dành cho sinh viên lớp ĐHCQ K12 năm học 2015-2016\r\nThời gian thực hiện đề tài: Từ ngày 12/01/2016 đến ngày 29/4/2016\r\nĐề nghị các bộ môn, giáo viên hướng dẫn và si', 'Căn cứ vào kế hoạch đào tạo của nhà trường, Khoa CNTT triển khai kế hoạch thực tập cơ sở dành cho sinh viên lớp ĐHCQ K12 năm học 2015-2016 Thời gian thực hiện đề tài: Từ ngày 12/01/2016 đến ngày 29/4/2016', '', 1, 'public/uploads/plan_file/FILE_1466084719.pdf', '2016-06-16 04:51:49', '2016-06-16 06:45:37', NULL),
(2, 4, 'TRIỂN KHAI ĐỒ ÁN TỐT NGHIỆP ĐHCQ K10', '2016-03-20 20:03:47', '2016-06-01 20:03:47', 5, 'Căn cứ vào kế hoạch đào tạo của nhà trường, Khoa CNTT triển khai kế hoạch làm ĐATN dành cho sinh viên hệ Đại học chính quy khóa 10 năm học 2015-2016.\r\nĐề nghị các bộ môn, giảng viên và sinh viên hệ ĐHCQ khóa 10,11 thực hiện theo đúng kế hoạch trên.', 'Khoa CNTT triển khai kế hoạch làm ĐATN dành cho sinh viên hệ Đại học chính quy khóa 10', '', 1, 'public/uploads/plan_file/FILE_1466132627.pdf', '2016-06-16 20:03:47', '2016-06-16 20:18:11', NULL),
(3, 2, 'TRIỂN KHAI THỰC TẬP CHUYÊN NGÀNH LỚP ĐHCQ K9', '2016-05-10 20:08:40', '2016-06-14 20:08:40', 5, 'Căn cứ vào kế hoạch đào tạo của nhà trường, Khoa CNTT triển khai kế hoạch thực tập chuyên ngành dành cho sinh viên lớp ĐHCQ K9 năm học 2015-2016. Thời gian thực hiện đề tài: Từ ngày 11/5/2016 đến ngày 15/6/2016', 'Khoa CNTT triển khai kế hoạch thực tập chuyên ngành dành cho sinh viên lớp ĐHCQ K9 năm học 2015-2016', '', 1, 'public/uploads/plan_file/FILE_1466132920.pdf', '2016-06-16 20:08:40', '2016-06-16 20:19:23', NULL),
(4, 4, 'TRIỂN KHAI ĐỒ ÁN TỐT NGHIỆP ĐHLT_CNTT_K13A BG', '2016-05-15 20:11:49', '2016-07-29 20:11:49', 5, 'Căn cứ vào kế hoạch đào tạo của nhà trường, Khoa CNTT triển khai kế hoạch làm ĐATN dành cho sinh viên lớp ĐHLT_CNTT_K13A BG, năm học 2015-2016.\r\nThời gian thực hiện: Từ ngày 16/5/2016 tới ngày 30/7/2016', 'Khoa CNTT triển khai kế hoạch làm ĐATN dành cho sinh viên lớp ĐHLT_CNTT_K13A BG, năm học 2015-2016.', '', 1, 'public/uploads/plan_file/FILE_1466133109.pdf', '2016-06-16 20:11:49', '2016-06-16 20:20:37', NULL),
(5, 2, 'TRIỂN KHAI THỰC TẬP CHUYÊN NGÀNH  LỚP ĐHCQ K11', '2016-01-11 22:45:29', '2016-04-28 22:45:29', 5, 'Căn cứ vào kế hoạch đào tạo của nhà trường, Khoa CNTT triển khai kế hoạch thực tập chuyên ngành dành cho sinh viên lớp ĐHCQ K11 năm học 2015-2016 như sau:\r\nThời gian thực hiện đề tài: Từ ngày 12/01/2016 đến ngày 29/04/2016', 'Khoa CNTT triển khai kế hoạch thực tập chuyên ngành dành cho sinh viên lớp ĐHCQ K11 năm học 2015-2016', '', 0, 'public/uploads/plan_file/FILE_1466142329.pdf', '2016-06-16 22:45:29', '2016-06-16 22:45:29', NULL),
(6, 3, ' TRIỂN KHAI THỰC TẬP TỐT NGHIỆP CÁC LỚP ĐHCQ K10', '2015-12-20 22:50:39', '2016-02-27 22:50:39', 5, 'Căn cứ vào kế hoạch đào tạo của nhà trường, Khoa CNTT triển khai kế hoạch thực tập tốt nghiệp dành cho sinh viên các lớp ĐHCQ K10, sinh viên ghép thực tâp cùng ĐHCQ K10 năm học 2015-2016 như sau:\r\nThời gian thực tập: 08 tuần từ ngày 21/12/2015 đến ngày 28', 'Khoa CNTT triển khai kế hoạch thực tập tốt nghiệp dành cho sinh viên các lớp ĐHCQ K10, sinh viên ghép thực tâp cùng ĐHCQ K10 năm học 2015-2016', '', 0, 'public/uploads/plan_file/FILE_1466142639.pdf', '2016-06-16 22:50:39', '2016-06-16 22:50:39', NULL),
(7, 1, 'THỰC TẬP CƠ SỞ LỚP ĐHCQ K11', '2015-01-12 01:32:55', '2015-04-28 01:32:55', 4, 'Căn cứ vào kế hoạch đào tạo của nhà trường, Khoa CNTT triển khai kế hoạch thực tập cơ sở dành cho sinh viên lớp ĐHCQ K11 năm học 2014-2015 Thời gian thực hiện đề tài: Từ ngày 12/01/2015', 'Khoa CNTT triển khai kế hoạch thực tập cơ sở dành cho sinh viên lớp ĐHCQ K11 năm học 2014-2015 ', '', 0, 'public/uploads/plan_file/FILE_1466152375.pdf', '2016-06-17 01:32:55', '2016-06-17 01:32:55', NULL),
(8, 1, 'THỰC TẬP CƠ SỞ LỚP ĐHCQ K10', '2014-01-12 01:34:32', '2014-04-30 01:34:32', 3, 'Căn cứ vào kế hoạch đào tạo của nhà trường, Khoa CNTT triển khai kế hoạch thực tập cơ sở dành cho sinh viên lớp ĐHCQ K10 năm học 2013-2014 Thời gian thực hiện đề tài: Từ ngày 12/01/2014 ', 'Khoa CNTT triển khai kế hoạch thực tập cơ sở dành cho sinh viên lớp ĐHCQ K12 năm học 2015-2016', '', 0, 'public/uploads/plan_file/FILE_1466152472.pdf', '2016-06-17 01:34:32', '2016-06-17 01:34:32', NULL),
(9, 1, 'THỰC TẬP CƠ SỞ LỚP ĐHCQ K9', '2013-01-09 01:36:17', '2013-04-23 01:36:17', 2, 'Căn cứ vào kế hoạch đào tạo của nhà trường, Khoa CNTT triển khai kế hoạch thực tập tốt nghiệp dành cho sinh viên các lớp ĐHCQ K9, sinh viên ghép thực tâp cùng ĐHCQ K9 năm học 2012-2013 như sau: Thời gian thực tập: 08 tuần từ ngày 21/12/2013 đến ngày 28/02', 'Khoa CNTT triển khai kế hoạch thực tập tốt nghiệp dành cho sinh viên các lớp ĐHCQ K9', '', 0, 'public/uploads/plan_file/FILE_1466152577.pdf', '2016-06-17 01:36:17', '2016-06-17 01:36:17', NULL),
(10, 2, 'TRIỂN KHAI THỰC TẬP CHUYÊN NGÀNH LỚP ĐHCQ K10', '2014-01-14 01:38:00', '2014-04-23 01:38:00', 3, 'Căn cứ vào kế hoạch đào tạo của nhà trường, Khoa CNTT triển khai kế hoạch thực tập tốt nghiệp dành cho sinh viên các lớp ĐHCQ K10, sinh viên ghép thực tâp cùng ĐHCQ K10 năm học 2015-2016 như sau: Thời gian thực tập: 08 tuần từ ngày 21/12/2015 đến ngày 28/', 'Khoa CNTT triển khai kế hoạch thực tập tốt nghiệp dành cho sinh viên các lớp ĐHCQ K10', '', 0, 'public/uploads/plan_file/FILE_1466152680.pdf', '2016-06-17 01:38:00', '2016-06-17 01:38:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `chitiet` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `chitiet`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ĐH MẠNG', 'Đại học Mạng', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'ĐH CNTT', 'Đại học Công nghệ thông tin', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'ĐH CNPM', 'Đại học Công nghệ phần mềm', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 'ĐH HTTT', 'Đại học Hệ thống thông tin', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 'ĐH KHMT', 'Đại học khoa học máy tính', '', '2016-05-30 04:31:13', '0000-00-00 00:00:00', NULL),
(6, 'ĐH VB2', 'Đại học văn bằng 2', '', '2016-05-30 05:07:52', '0000-00-00 00:00:00', NULL),
(7, 'Cao đẳng', '', '', '2016-05-30 05:08:03', '0000-00-00 00:00:00', NULL),
(8, 'ĐHLT từ CĐ', 'Đại học liên thông từ cao đẳng', '', '2016-05-30 05:08:32', '0000-00-00 00:00:00', NULL),
(9, 'Trung cấp', '', '', '2016-05-30 05:08:41', '0000-00-00 00:00:00', NULL),
(10, 'ĐHLT TỪ TC', 'Đại học liên thông từ trung cấp', '', '2016-05-30 05:09:12', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `id_responsible` int(11) NOT NULL,
  `outline` varchar(255) NOT NULL,
  `lesson_document` varchar(255) NOT NULL,
  `exercise_document` varchar(255) NOT NULL,
  `lesson_plan` int(11) NOT NULL,
  `num_class` int(11) NOT NULL,
  `schedule` int(11) NOT NULL,
  `document` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `teacher`, `subject`, `id_responsible`, `outline`, `lesson_document`, `exercise_document`, `lesson_plan`, `num_class`, `schedule`, `document`, `semester`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 25, 1, 'record 31 05 2016 910.xlsx', 'record 31 05 2016 897.xlsx', '', 0, 0, 0, '', 0, '', '2016-05-31 16:37:08', '2016-05-31 16:37:08', '2016-05-31 16:37:08'),
(2, 8, 27, 2, '', '', '', 0, 0, 0, '', 0, '', '2016-05-31 16:36:20', '2016-05-31 16:36:20', '2016-05-31 16:36:20'),
(3, 1, 25, 1, '', '', '', 0, 0, 0, '', 0, '', '2016-05-31 04:04:26', '2016-05-31 04:04:26', NULL),
(4, 1, 27, 2, '', '', '', 0, 0, 0, '', 0, '', '2016-05-31 04:04:44', '2016-05-31 04:04:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `responsible`
--

CREATE TABLE `responsible` (
  `id` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `obligatory` int(11) DEFAULT NULL,
  `start` date NOT NULL,
  `semester` int(11) NOT NULL,
  `id_department` int(11) NOT NULL,
  `bank` int(11) NOT NULL,
  `bank_responsible` varchar(255) NOT NULL,
  `weighted_scores` varchar(255) NOT NULL,
  `id_teachers` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_teacher` text NOT NULL,
  `deadline_outline` date NOT NULL,
  `deadline_lesson` date NOT NULL,
  `exercise` int(11) NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `outline` int(11) NOT NULL,
  `lesson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `responsible`
--

INSERT INTO `responsible` (`id`, `id_subject`, `obligatory`, `start`, `semester`, `id_department`, `bank`, `bank_responsible`, `weighted_scores`, `id_teachers`, `status`, `id_teacher`, `deadline_outline`, `deadline_lesson`, `exercise`, `group`, `created_at`, `updated_at`, `deleted_at`, `outline`, `lesson`) VALUES
(1, 25, 1, '2016-05-31', 0, 1, 1, '2', '37', 1, '', '["1","2","3"]', '2016-08-06', '2016-07-30', 1, '', '2016-05-31 04:04:26', '2016-05-31 04:04:26', NULL, 1, 1),
(2, 27, 1, '2016-07-01', 0, 1, 1, '11', '3/7', 1, 'Chưa hoàn thành', '["1","3"]', '2016-07-09', '2016-07-09', 1, '', '2016-05-31 04:04:44', '2016-05-31 04:04:44', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `thu` varchar(255) NOT NULL,
  `name_course` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `study_time` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `all_day` int(11) NOT NULL,
  `lecture_hall` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `calendar` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `year`, `semester`, `thu`, `name_course`, `number`, `study_time`, `start_time`, `end_time`, `all_day`, `lecture_hall`, `note`, `id_teacher`, `calendar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', 0, '2', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01)', 3, '4,5,6', '', '', 0, 'C2.304', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(2, '', 0, '2', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01)', 3, '4,5,6', '', '', 0, 'C2.304', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(3, '', 0, '2', 'Sinh hoạt lớp-1-15 (K10A.TT&MMT.D1.N07)', 1, '13,14', '', '', 0, 'C2.302', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(4, '', 0, '2', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01)', 3, '4,5,6', '', '', 0, 'C2.304', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(5, '', 0, '6', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01.TH1)', 3, '4,5,6', '', '', 0, 'C4.202A', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(6, '', 0, '2', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01)', 3, '4,5,6', '', '', 0, 'C2.304', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(7, '', 0, '2', 'Sinh hoạt lớp-1-15 (K10A.TT&MMT.D1.N07)', 1, '13,14', '', '', 0, 'C2.302', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(8, '', 0, '6', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01.TH1)', 3, '4,5,6', '', '', 0, 'C4.202A', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(9, '', 0, '2', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01)', 3, '4,5,6', '', '', 0, 'C2.304', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(10, '', 0, '6', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01.TH1)', 3, '4,5,6', '', '', 0, 'C4.202A', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(11, '', 0, '2', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01)', 3, '4,5,6', '', '', 0, 'C2.304', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(12, '', 0, '2', 'Sinh hoạt lớp-1-15 (K10A.TT&MMT.D1.N07)', 1, '13,14', '', '', 0, 'C2.302', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(13, '', 0, '6', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01.TH1)', 3, '4,5,6', '', '', 0, 'C4.202A', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(14, '', 0, '2', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01)', 3, '4,5,6', '', '', 0, 'C2.304', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(15, '', 0, '6', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01.TH1)', 3, '4,5,6', '', '', 0, 'C4.202A', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(16, '', 0, '2', 'Sinh hoạt lớp-1-15 (K10A.TT&MMT.D1.N07)', 1, '13,14', '', '', 0, 'C2.301', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(17, '', 0, '6', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01.TH1)', 3, '4,5,6', '', '', 0, 'C4.202A', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(18, '', 0, '2', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01)', 3, '4,5,6', '', '', 0, 'C2.304', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(19, '', 0, '6', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01.TH1)', 3, '4,5,6', '', '', 0, 'C4.202A', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(20, '', 0, '2', 'Sinh hoạt lớp-1-15 (K10A.TT&MMT.D1.N07)', 1, '13,14', '', '', 0, 'C2.302', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(21, '', 0, '2', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01)', 3, '4,5,6', '', '', 0, 'C2.304', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(22, '', 0, '6', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01.TH1)', 3, '4,5,6', '', '', 0, 'C4.202A', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(23, '', 0, '2', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01)', 3, '4,5,6', '', '', 0, 'C2.304', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(24, '', 0, '6', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01.TH1)', 3, '4,5,6', '', '', 0, 'C4.202A', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(25, '', 0, '2', 'Sinh hoạt lớp-1-15 (K10A.TT&MMT.D1.N07)', 1, '13,14', '', '', 0, 'C2.302', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL),
(26, '', 0, '6', 'An ninh mạng-1-15 (K11A.TT&MMT.D1.N01.TH1)', 3, '4,5,6', '', '', 0, 'C4.202A', '', 0, 0, '2016-05-31 10:09:56', '2016-05-31 10:09:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `semester_name` varchar(255) NOT NULL,
  `state` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester_name`, `state`, `created_at`, `updated_at`) VALUES
(1, '1', 1, '2016-05-18 17:00:00', '0000-00-00 00:00:00'),
(2, '2', 1, '2016-05-18 17:00:00', '0000-00-00 00:00:00'),
(3, '3', 1, '2016-05-18 17:00:00', '0000-00-00 00:00:00'),
(4, '4', 1, '2016-05-18 17:00:00', '0000-00-00 00:00:00'),
(5, '5', 1, '2016-05-18 17:00:00', '0000-00-00 00:00:00'),
(6, '6', 1, '2016-05-18 17:00:00', '0000-00-00 00:00:00'),
(7, '7', 1, '2016-05-18 17:00:00', '0000-00-00 00:00:00'),
(8, '8', 1, '2016-05-18 17:00:00', '0000-00-00 00:00:00'),
(9, '9', 1, '2016-05-18 17:00:00', '0000-00-00 00:00:00'),
(10, '10', 1, '2016-05-18 17:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sendfiles`
--

CREATE TABLE `sendfiles` (
  `id` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `datecreated` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `state` int(2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sendfiles`
--

INSERT INTO `sendfiles` (`id`, `typeid`, `file_name`, `datecreated`, `created_by`, `state`, `updated_at`, `created_at`) VALUES
(1, 1, 'work 11 05 2016 719.xls', '11-05-2016', 1, 1, '2016-05-20 10:27:52', '2016-05-11 09:16:53'),
(2, 1, 'work 12 05 2016 972.xls', '12-05-2016', 1, 1, '2016-05-20 10:27:56', '2016-05-12 07:16:44'),
(3, 1, 'work 12 05 2016 260.xls', '12-05-2016', 1, 1, '2016-05-20 10:27:59', '2016-05-12 07:18:06'),
(4, 1, 'work 18 05 2016 763.xls', '18-05-2016', 1, 1, '2016-05-20 10:28:03', '2016-05-18 02:26:36'),
(5, 1, 'work 20 05 2016 555.xls', '20-05-2016', 1, 1, '2016-05-20 10:28:06', '2016-05-20 08:42:31'),
(6, 1, 'work 30 05 2016 664.xlsx', '30-05-2016', 1, 1, '2016-05-30 17:20:50', '2016-05-30 17:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `site_article`
--

CREATE TABLE `site_article` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `attached` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `state` int(2) NOT NULL,
  `number_view` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_article`
--

INSERT INTO `site_article` (`id`, `categoryid`, `title`, `description`, `content`, `image`, `attached`, `created_by`, `state`, `number_view`, `created_at`, `updated_at`) VALUES
(1, 1, '6 lý do để bạn chọn Đại học Công nghệ Thông tin và Truyền thông', 'Trường Đại học Công nghệ Thông tin và Truyền thông (ĐH CNTT&TT) là đại học đầu ngành về công nghệ trực thuộc Đại học Thái Nguyên. Sau 15 năm xây dựng và phát triển nhà trường đã không ngừng đầu tư cơ sở vật chất, trang thiết bị phục vụ công tác đào tạo, nâng cao chất lượng đội ngũ, phát triển quy mô và loại hình đào tạo.', '<h1>6 l&yacute; do để bạn chọn Đại học C&ocirc;ng nghệ Th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng</h1>\r\n\r\n<h2>Trường Đại học C&ocirc;ng nghệ Th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng (ĐH CNTT&amp;TT) l&agrave; đại học đầu ng&agrave;nh về c&ocirc;ng nghệ trực thuộc Đại học Th&aacute;i Nguy&ecirc;n. Sau 15 năm x&acirc;y dựng v&agrave; ph&aacute;t triển nh&agrave; trường đ&atilde; kh&ocirc;ng ngừng đầu tư cơ sở vật chất, trang thiết bị phục vụ c&ocirc;ng t&aacute;c đ&agrave;o tạo, n&acirc;ng cao chất lượng đội ngũ, ph&aacute;t triển quy m&ocirc; v&agrave; loại h&igrave;nh đ&agrave;o tạo.</h2>\r\n\r\n<p><strong>1. Học đi đ&ocirc;i với h&agrave;nh</strong></p>\r\n\r\n<p>Nhằm đ&aacute;p ứng nhu cầu nh&acirc;n lực ng&agrave;y c&agrave;ng cao tại c&aacute;c th&agrave;nh phố lớn như: H&agrave; Nội, Hải Ph&ograve;ng, TPHCM, Đ&agrave; Nẵng&hellip; ĐH CNTT&amp;TT đ&atilde; c&oacute; những bước đi đ&uacute;ng đắn trong c&ocirc;ng t&aacute;c đ&agrave;o tạo, sinh vi&ecirc;n được học tập dựa tr&ecirc;n nhu cầu x&atilde; hội, ra trường đ&aacute;p ứng được ngay y&ecirc;u cầu của c&ocirc;ng việc.</p>\r\n\r\n<p><img alt="" src="http://dantri4.vcmedia.vn/k:thumb_w/640/2015/img20150813123553722/6-ly-do-de-ban-chon-dai-hoc-cong-nghe-thong-tin-va-truyen-thong.jpg" style="margin:0px auto" /></p>\r\n\r\n<p><em>Buổi thực h&agrave;nh ngay tr&ecirc;n lớp của sinh vi&ecirc;n ICTU (ĐH CNTT&amp;TT).</em></p>\r\n\r\n<p><strong>2. Sinh vi&ecirc;n được đ&agrave;o tạo theo dự &aacute;n thật</strong></p>\r\n\r\n<p>Học tập tại ĐH CNTT&amp;TT, sinh vi&ecirc;n được tiếp x&uacute;c với những dự &aacute;n thực tế ngay từ khi c&ograve;n ngồi tr&ecirc;n ghế của nh&agrave; trường. Phương ph&aacute;p n&agrave;y mang lại hiệu quả cao gi&uacute;p cho sinh vi&ecirc;n c&oacute; th&ecirc;m được những kinh nghiệm cần thiết để ho&agrave;n thiện bản th&acirc;n.</p>\r\n\r\n<p><img alt="" src="http://dantri4.vcmedia.vn/k:thumb_w/640/2015/img20150813123555466/6-ly-do-de-ban-chon-dai-hoc-cong-nghe-thong-tin-va-truyen-thong.jpg" style="margin:0px auto" /></p>\r\n\r\n<p><em>M&ocirc; h&igrave;nh đ&agrave;o tạo kiểu mới gi&uacute;p sinh vi&ecirc;n c&oacute; th&ecirc;m được những kinh nghiệm cần thiết.</em></p>\r\n\r\n<p><strong>3. M&ocirc;i trường thực h&agrave;nh tr&ecirc;n nền tảng doanh nghiệp</strong></p>\r\n\r\n<p>Ng&agrave;y 6/8/2015, ĐH CNTT&amp;TT v&agrave; c&ocirc;ng ty Samsung đ&atilde; khai trương ph&ograve;ng học, ph&ograve;ng thực h&agrave;nh Samsung Lab để nghi&ecirc;n cứu, ph&aacute;t triển ứng dụng di động đạt ti&ecirc;u chuẩn quốc tế. Tạo điều kiện cho sinh vi&ecirc;n thực h&agrave;nh v&agrave; nắm vững kiến thức, kỹ năng.</p>\r\n\r\n<p><img alt="" src="http://dantri4.vcmedia.vn/k:2015/img20150813123556155/6-ly-do-de-ban-chon-dai-hoc-cong-nghe-thong-tin-va-truyen-thong.jpg" style="margin:0px auto" /></p>\r\n\r\n<p><em>Buổi lễ khai trương ph&ograve;ng thực h&agrave;nh Samsung Lab.</em></p>\r\n\r\n<p><strong>4. Gi&aacute;o tr&igrave;nh chuẩn quốc tế</strong></p>\r\n\r\n<p>Sinh vi&ecirc;n ĐH CNTT&amp;TT được học tập theo những gi&aacute;o tr&igrave;nh cập nhật nhất do trường mua bản quyền từ c&aacute;c t&aacute;c giả lớn tr&ecirc;n thế giới để bi&ecirc;n soạn v&agrave; chuyển ngữ. B&ecirc;n cạnh đ&oacute; sinh vi&ecirc;n cũng được học tập những gi&aacute;o tr&igrave;nh do ch&iacute;nh gi&aacute;o sư, tiến sỹ c&oacute; kinh nghiệm của trường trực tiếp bi&ecirc;n soạn.</p>\r\n\r\n<p><img alt="" src="http://dantri4.vcmedia.vn/k:2015/img20150813123557747/6-ly-do-de-ban-chon-dai-hoc-cong-nghe-thong-tin-va-truyen-thong.jpg" style="margin:0px auto" /></p>\r\n\r\n<p><em>Gi&aacute;o tr&igrave;nh được mua bản quyền để bi&ecirc;n soạn v&agrave; chuyển ngữ.</em></p>\r\n\r\n<p><strong>5. Văn h&oacute;a ICTU năng động với nhiều hoạt động ngoại kh&oacute;a</strong></p>\r\n\r\n<p>B&ecirc;n cạnh những giờ học căng thẳng ở tr&ecirc;n lớp, sinh vi&ecirc;n của trường c&ograve;n được thường xuy&ecirc;n tham gia c&aacute;c hoạt động ngoại kh&oacute;a do: BCH Đo&agrave;n trường, c&aacute;c CLB sinh vi&ecirc;n trong trường&hellip; tổ chức. Những hoạt động n&agrave;y gi&uacute;p cho sinh vi&ecirc;n th&ecirc;m gắn kết v&agrave; qu&ecirc;n đi mệt mỏi.</p>\r\n\r\n<p><img alt="" src="http://dantri4.vcmedia.vn/k:thumb_w/640/2015/img20150813123558836/6-ly-do-de-ban-chon-dai-hoc-cong-nghe-thong-tin-va-truyen-thong.jpg" style="margin:0px auto" /></p>\r\n\r\n<p><strong>6. Cơ hội việc l&agrave;m cao trong tương lai</strong></p>\r\n\r\n<p>Kh&ocirc;ng chỉ đ&agrave;o tạo về kiến thức chuy&ecirc;n ng&agrave;nh, sinh vi&ecirc;n ĐH CNTT&amp;TT Th&aacute;i Nguy&ecirc;n c&ograve;n được đ&agrave;o tạo c&aacute;c kỹ năng cần thiết: Kỹ năng l&agrave;m việc độc lập, kỹ năng l&agrave;m việc nh&oacute;m, kỹ năng thuyết tr&igrave;nh&hellip; để ph&ugrave; hợp với m&ocirc;i trường l&agrave;m việc chuy&ecirc;n nghiệp tại c&aacute;c c&ocirc;ng ty, tập đo&agrave;n lớn.</p>\r\n\r\n<p>Ngo&agrave;i ra, nh&agrave; trường cũng đ&atilde; nỗ lực li&ecirc;n kết với c&aacute;c doanh nghiệp, gắn đ&agrave;o tạo với hoạt động sản xuất kinh doanh, đồng thời cung ứng nguồn nh&acirc;n lực chất lượng cao, c&aacute;c sản phẩm c&oacute; h&agrave;m lượng chất x&aacute;m cho c&aacute;c doanh nghiệp.</p>\r\n\r\n<p>Năm 2015, trường ĐH CNTT&amp;TT c&oacute; 1500 chỉ ti&ecirc;u tuyển sinh hệ đại học ch&iacute;nh quy theo hai h&igrave;nh thức l&agrave; x&eacute;t tuyển học bạ v&agrave; kết quả kỳ thi THPT Quốc gia. C&aacute;c bạn học sinh quan t&acirc;m c&oacute; thể t&igrave;m hiểu th&ecirc;m c&aacute;c th&ocirc;ng tin chi tiết tại:</p>\r\n\r\n<p><strong>Trụ sở Th&aacute;i Nguy&ecirc;n</strong>:</p>\r\n\r\n<p>Địa chỉ: Ph&ograve;ng Đ&agrave;o tạo (P 115, nh&agrave; C1), đường Z115, x&atilde; Quyết Thắng, TP Th&aacute;i Nguy&ecirc;n, tỉnh Th&aacute;i Nguy&ecirc;n</p>\r\n\r\n<p>Điện thoại: 0280 3901828</p>\r\n\r\n<p><strong>VPTS tại H&agrave; Nội:</strong></p>\r\n\r\n<p>Địa chỉ: Ph&ograve;ng 207 nh&agrave; B số 3 ch&ugrave;a L&aacute;ng, Đống Đa, H&agrave; Nội</p>\r\n\r\n<p>Điện thoại: 046.027.9595 - Hotline: 098 799 3739 - &nbsp;0933 388 661</p>\r\n\r\n<p>Website:&nbsp;<a href="http://ictu-hanoi.edu.vn/news/thong-bao-tuyen-sinh-2015-67">http://ictu-hanoi.edu.vn/news/thong-bao-tuyen-sinh-2015-67</a></p>\r\n\r\n<p>Facebook:<a href="https://www.facebook.com/daihoccongnghethongtintruyenthong">https://www.facebook.com/daihoccongnghethongtintruyenthong</a></p>\r\n', 'images23052016552.jpg', '', 1, 1, 0, '2016-05-23 14:55:21', '2016-05-23 14:55:21'),
(2, 2, 'Khoa công nghệ thông tin tuyển sinh năm 2016', 'Thông tin tuyển sinh Khoa Công nghệ thông tin năm 2016 và những điều cần biết khi học ngành Công nghệ thông tin; Khoa học máy tính; Truyền thông và mạng máy tính; Kỹ thuật phần mềm; Hệ thống thông tin tại trường Đại học Công nghệ thông tin và truyền thông.', '<h2><strong>ĐẠI HỌC TH&Aacute;I NGUY&Ecirc;N</strong></h2>\r\n\r\n<h2><strong>TRƯỜNG ĐẠI HỌC CNTT V&Agrave; TRUYỀN TH&Ocirc;NG</strong></h2>\r\n\r\n<h2><strong>KHOA C&Ocirc;NG NGHỆ TH&Ocirc;NG TIN</strong></h2>\r\n\r\n<p><strong>&nbsp;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</strong></p>\r\n\r\n<h3><strong>TH&Ocirc;NG TIN TUYỂN SINH NĂM 2016</strong></h3>\r\n\r\n<ul style="list-style-type:square">\r\n	<li>K&yacute; hiệu trường: DTC</li>\r\n	<li>Tổng chỉ ti&ecirc;u năm 2016: 1.500 (gồm 17 ng&agrave;nh)</li>\r\n	<li>V&ugrave;ng tuyển sinh: Cả nước</li>\r\n</ul>\r\n\r\n<p><strong>CHỈ TI&Ecirc;U CỦA NH&Oacute;M NG&Agrave;NH C&Ocirc;NG NGHỆ TH&Ocirc;NG TIN</strong></p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:144.9pt">\r\n			<p><strong>Ng&agrave;nh</strong></p>\r\n			</td>\r\n			<td style="width:58.5pt">\r\n			<p><strong>M&atilde; ng&agrave;nh</strong></p>\r\n			</td>\r\n			<td style="width:40.8pt">\r\n			<p><strong>Chỉ ti&ecirc;u</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:144.9pt">\r\n			<p>C&ocirc;ng nghệ Th&ocirc;ng tin</p>\r\n			</td>\r\n			<td style="width:58.5pt">\r\n			<p>D480201</p>\r\n			</td>\r\n			<td rowspan="5" style="width:40.8pt">\r\n			<p>500</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:144.9pt">\r\n			<p>Khoa học M&aacute;y t&iacute;nh</p>\r\n			</td>\r\n			<td style="width:58.5pt">\r\n			<p>D480101</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:144.9pt">\r\n			<p>Truyền th&ocirc;ng v&agrave; Mạng m&aacute;y t&iacute;nh</p>\r\n			</td>\r\n			<td style="width:58.5pt">\r\n			<p>D480102</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:144.9pt">\r\n			<p>Kỹ thuật phần mềm</p>\r\n			</td>\r\n			<td style="width:58.5pt">\r\n			<p>D480103</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:144.9pt">\r\n			<p>Hệ thống Th&ocirc;ng tin</p>\r\n			</td>\r\n			<td style="width:58.5pt">\r\n			<p>D480104</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>PHƯƠNG THỨC TUYỂN SINH</strong></p>\r\n\r\n<p><strong>X&eacute;t tuyển dựa v&agrave;o kết quả kỳ thi THPT Quốc gia</strong></p>\r\n\r\n<p><em>&diams; Nh&oacute;m m&ocirc;n:</em></p>\r\n\r\n<ul style="list-style-type:square">\r\n	<li>To&aacute;n, Văn, Tiếng Anh (D)</li>\r\n	<li>To&aacute;n, L&yacute;, Tiếng Anh (A1)</li>\r\n	<li>To&aacute;n, L&yacute;, H&oacute;a (A)</li>\r\n	<li>To&aacute;n, Văn, H&oacute;a</li>\r\n</ul>\r\n\r\n<p><em>&diams;&nbsp;</em>X&eacute;t tuyển dựa v&agrave;o kết quả học tập 02 học kỳ lớp 12</p>\r\n\r\n<p><em>&bull; Điều kiện:</em></p>\r\n\r\n<p>- Th&iacute; sinh đ&atilde; tốt nghiệp THPT</p>\r\n\r\n<p>- Hạnh kiểm cả năm lớp 12 đạt loại kh&aacute; trở l&ecirc;n</p>\r\n\r\n<p>- Tổng điểm 3 m&ocirc;n của 2 học kỳ lớp 12 kh&ocirc;ng thấp hơn 36 điểm (3 m&ocirc;n theo nh&oacute;m m&ocirc;n đăng k&yacute; x&eacute;t tuyển).</p>\r\n\r\n<p><strong>NƠI NHẬN HỒ SƠ</strong></p>\r\n\r\n<p><strong>Văn ph&ograve;ng Khoa C&ocirc;ng nghệ Th&ocirc;ng tin</strong></p>\r\n\r\n<p>Ph&ograve;ng 312, nh&agrave; C1, Trường Đại học CNTT&amp;TT</p>\r\n\r\n<p>Quyết Thắng - Th&agrave;nh phố Th&aacute;i nguy&ecirc;n</p>\r\n\r\n<p><strong>TH&Ocirc;NG TIN TƯ VẤN</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điện thoại: 0280 3 904 353</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Website:<a href="http://fit.ictu.edu.vn/">http://fit.ictu.edu.vn/</a></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;<a href="mailto:congnghethongtin@ictu.edu.vn">congnghethongtin@ictu.edu.vn</a></p>\r\n\r\n<p>&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>\r\n\r\n<p>II- NH&Oacute;M NG&Agrave;NH Đ&Agrave;O TẠO</p>\r\n\r\n<p><strong>NG&Agrave;NH C&Ocirc;NG NGHỆ</strong><strong>&nbsp;TH&Ocirc;N</strong><strong>G</strong><strong>&nbsp;TIN</strong></p>\r\n\r\n<ul style="list-style-type:square">\r\n	<li>M&atilde; ng&agrave;nh : D480201</li>\r\n	<li>Cấp bằng Kỹ sư hệ ch&iacute;nh quy</li>\r\n	<li>V&ugrave;ng tuyển sinh: Cả nước</li>\r\n</ul>\r\n\r\n<p><strong>CƠ HỘI VIỆC L&Agrave;M</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kỹ sư ph&acirc;n t&iacute;ch, thiết kế, lập tr&igrave;nh trong c&aacute;c c&ocirc;ng ty phần mềm. Chuy&ecirc;n vi&ecirc;n trong lĩnh vực c&ocirc;ng nghệ th&ocirc;ng tin trong c&aacute;c cơ quan, doanh nghiệp.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trong lĩnh vực quản l&yacute; dự &aacute;n, quản trị, bảo tr&igrave; v&agrave; đảm bảo an ninh cho c&aacute;c hệ thống mạng m&aacute;y t&iacute;nh trong c&aacute;c cơ quan, doanh nghiệp.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nghi&ecirc;n cứu v&agrave; ứng dụng khoa học thuộc lĩnh vực li&ecirc;n quan tới ng&agrave;nh C&ocirc;ng nghệ th&ocirc;ng tin &amp; Truyền th&ocirc;ng tại c&aacute;c viện nghi&ecirc;n cứu, c&aacute;c trung t&acirc;m nghi&ecirc;n cứu thuộc c&aacute;c bộ, ban ng&agrave;nh.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Giảng dạy C&ocirc;ng nghệ Th&ocirc;ng tin tại c&aacute;c cơ sở đ&agrave;o tạo.</p>\r\n\r\n<p><strong>KỸ NĂNG ĐƯỢC HỌC</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nắm vững được kiến thức về nguy&ecirc;n l&yacute; hoạt động của c&aacute;c thiết bị m&aacute;y t&iacute;nh v&agrave; mạng m&aacute;y t&iacute;nh.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&aacute;c kiến thức về an ninh mạng, v&agrave; c&aacute;c giao thức x&aacute;c thực để đảm bảo vấn đề an ninh mạng v&agrave; an ninh hệ thống.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kiến thức v&agrave; kỹ năng trong lập tr&igrave;nh, x&acirc;y dựng c&aacute;c ứng dụng Web, triển khai c&aacute;c ứng dụng m&atilde; nguồn mở v&agrave; x&acirc;y dựng ứng dụng cho c&aacute;c thiết bị mobile.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ph&acirc;n t&iacute;ch, thiết kế v&agrave; x&acirc;y dựng hệ thống th&ocirc;ng tin quản l&yacute;, hệ thống th&ocirc;ng minh, quản trị v&agrave; xử l&yacute; dữ liệu đa phương tiện.</p>\r\n\r\n<p><strong>TƯ VẤN TRỰC TUYẾN</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điện thoại: 0280 3 904 353</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;<a href="mailto:congnghelaptrinh@ictu.edu.vn">congnghelaptrinh@ictu.edu.vn</a></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Facebook:&nbsp;https://www.facebook.com/ictu.cntt</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>NG&Agrave;NH KHOA HỌC M&Aacute;Y T&Iacute;NH</strong></p>\r\n\r\n<ul style="list-style-type:square">\r\n	<li>M&atilde; ng&agrave;nh: D480101</li>\r\n	<li>Cấp bằng Kỹ sư hệ ch&iacute;nh quy</li>\r\n	<li>V&ugrave;ng tuyển sinh: Cả nước</li>\r\n</ul>\r\n\r\n<p><strong>CƠ HỘI VIỆC L&Agrave;M</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kỹ sư ph&acirc;n t&iacute;ch, thiết kế, lập tr&igrave;nh trong c&aacute;c c&ocirc;ng ty phần mềm.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chuy&ecirc;n vi&ecirc;n trong lĩnh vực c&ocirc;ng nghệ th&ocirc;ng tin trong c&aacute;c cơ quan, doanh nghiệp.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trong lĩnh vực quản l&yacute; dự &aacute;n của c&aacute;c c&ocirc;ng ty phần mềm, c&aacute;c sở khoa học v&agrave; c&ocirc;ng nghệ.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nghi&ecirc;n cứu v&agrave; ứng dụng khoa học kỹ thuật tại c&aacute;c Viện, c&aacute;c Trung t&acirc;m nghi&ecirc;n cứu tại Việt Nam v&agrave; Nước ngo&agrave;i.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Giảng dạy về lĩnh vực C&ocirc;ng nghệ th&ocirc;ng tin tại c&aacute;c cơ sở đ&agrave;o tạo tại Việt Nam.</p>\r\n\r\n<p><strong>KỸ NĂNG ĐƯỢC HỌC</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&oacute; khả nặng lập tr&igrave;nh, x&acirc;y dựng c&aacute;c ứng dụng C&ocirc;ng nghệ th&ocirc;ng tin giải quyết c&aacute;c b&agrave;i to&aacute;n trong thực tế.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&oacute; kiến thức chuy&ecirc;n ng&agrave;nh đảm bảo việc nghi&ecirc;n cứu ph&aacute;t triển, tối ưu h&oacute;a c&aacute;c hệ thống phần mềm.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nghi&ecirc;n cứu, ph&acirc;n t&iacute;ch, thiết kế v&agrave; x&acirc;y dựng c&aacute;c hệ thống th&ocirc;ng minh.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&oacute; khả năng đ&aacute;p ứng c&aacute;c y&ecirc;u cầu về nghi&ecirc;n cứu v&agrave; ph&aacute;t triển ứng dụng C&ocirc;ng nghệ th&ocirc;ng tin của x&atilde; hội.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nghi&ecirc;n cứu chuy&ecirc;n s&acirc;u, tiếp cận dễ d&agrave;ng với c&aacute;c c&ocirc;ng nghệ mới của C&ocirc;ng nghệ th&ocirc;ng tin.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&oacute; khả năng thuyết tr&igrave;nh v&agrave; l&agrave;m việc nh&oacute;m.</p>\r\n\r\n<p><strong>TƯ VẤN TRỰC TUYẾN</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điện thoại: 0280 3 904 353</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;<a href="mailto:khoahocmaytinh@ictu.edu.vn">khoahocmaytinh@ictu.edu.vn</a></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Facebook:<a href="https://facebook.com/">https://facebook.com/</a>ictu.khmt</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>NG&Agrave;NH TRUYỀN TH&Ocirc;NG V&Agrave; MẠNG M&Aacute;Y T&Iacute;NH</strong></p>\r\n\r\n<ul style="list-style-type:square">\r\n	<li>M&atilde; ng&agrave;nh: D480102</li>\r\n	<li>Cấp bằng Kỹ sư hệ ch&iacute;nh quy</li>\r\n	<li>V&ugrave;ng tuyển sinh: Cả nước</li>\r\n</ul>\r\n\r\n<p><strong>CƠ HỘI VIỆC L&Agrave;M</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kỹ sư ph&acirc;n t&iacute;ch, thiết kế hệ thống mạng cho c&aacute;c tổ chức, cơ quan, doanh nghiệp.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kỹ sư ph&acirc;n t&iacute;ch, thiết kế hệ thống v&agrave; ph&aacute;t triển ứng dụng trong c&aacute;c c&ocirc;ng ty phần mềm.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chuy&ecirc;n vi&ecirc;n quản trị mạng trong c&aacute;c cơ quan, doanh nghiệp.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trong lĩnh vực quản l&yacute; dự &aacute;n trong c&aacute;c c&ocirc;ng ty phần mềm.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nghi&ecirc;n cứu v&agrave; ứng dụng khoa học thuộc lĩnh vực li&ecirc;n quan tới ng&agrave;nh Truyền th&ocirc;ng &amp; Mạng m&aacute;y t&iacute;nh tại c&aacute;c viện nghi&ecirc;n cứu, c&aacute;c trung t&acirc;m nghi&ecirc;n cứu của c&aacute;c bộ, ban ng&agrave;nh.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Giảng dạy tại c&aacute;c cơ sở đ&agrave;o tạo.</p>\r\n\r\n<p><strong>KỸ NĂNG ĐƯỢC HỌC</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Khả năng giải quyết c&aacute;c vấn đề khoa học kỹ thuật thuộc ng&agrave;nh Truyền th&ocirc;ng &amp; Mạng m&aacute;y t&iacute;nh,&nbsp;c&oacute; khả năng học tập v&agrave; nghi&ecirc;n cứu ở c&aacute;c bậc học cao.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nắm vững kiến thức chuy&ecirc;n s&acirc;u về c&aacute;c m&ocirc; h&igrave;nh mạng, nguy&ecirc;n l&yacute; hoạt động của c&aacute;c thiết bị mạng hiện đại v&agrave; c&aacute;c dịch vụ mạng phục vụ thiết kế, c&agrave;i đặt, bảo tr&igrave; v&agrave; quản trị hệ thống mạng v&agrave; c&aacute;c phương ph&aacute;p ph&aacute;t triển ứng dụng mạng.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nắm vững c&aacute;c biện ph&aacute;p đảm bảo an ninh mạng phục vụ quản trị hệ thống mạng.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Khảo s&aacute;t, ph&acirc;n t&iacute;ch, thiết kế, gi&aacute;m s&aacute;t, kiểm thử v&agrave; đ&aacute;nh gi&aacute; độ an to&agrave;n, v&agrave; hiệu năng của hệ thống mạng.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ph&aacute;t triển ứng dụng web, ứng dụng cho thiết bị di động, điện to&aacute;n di động, điện to&aacute;n đ&aacute;m m&acirc;y.</p>\r\n\r\n<p><strong>TƯ VẤN TRỰC TUYẾN</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điện thoại: 0280 3 904 353</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;<a href="mailto:mangmaytinh@ictu.edu.vn">mangmaytinh@ictu.edu.vn</a></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;https://www.facebook.com/ictu.fit.mangtruyenthong &nbsp;</p>\r\n\r\n<p><strong>NG&Agrave;NH KỸ THUẬT PHẦN MỀM</strong></p>\r\n\r\n<ul style="list-style-type:square">\r\n	<li>M&atilde; ng&agrave;nh Kỹ thuật phần mềm: D480103</li>\r\n	<li>Cấp bằng Kỹ sư hệ ch&iacute;nh quy</li>\r\n	<li>V&ugrave;ng tuyển sinh: Cả nước</li>\r\n</ul>\r\n\r\n<p><strong>CƠ HỘI VIỆC L&Agrave;M</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lập tr&igrave;nh vi&ecirc;n, trưởng nh&oacute;m lập tr&igrave;nh, ph&acirc;n t&iacute;ch vi&ecirc;n v&agrave; thiết kế ở c&aacute;c c&ocirc;ng ty phần mềm.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kiểm thử, bảo tr&igrave; phần mềm v&agrave; tư vấn &ndash; thiết kế giải ph&aacute;p c&ocirc;ng nghệ th&ocirc;ng tin cho doanh nghiệp.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tham gia c&aacute;c dự &aacute;n trong c&aacute;c c&ocirc;ng ty phần mềm, doanh nghiệp, bộ phận vận h&agrave;nh v&agrave; ph&aacute;t triển c&ocirc;ng nghệ th&ocirc;ng tin của c&aacute;c cơ quan tổ chức như ng&acirc;n h&agrave;ng, bảo hiểm, viễn th&ocirc;ng&hellip;</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nghi&ecirc;n cứu ứng dụng c&ocirc;ng nghệ th&ocirc;ng tin ở c&aacute;c viện nghi&ecirc;n cứu v&agrave; chuyển giao c&ocirc;ng nghệ thuộc lĩnh vực c&ocirc;ng nghệ th&ocirc;ng tin ở c&aacute;c trường học.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Giảng dạy C&ocirc;ng nghệ Th&ocirc;ng tin tại c&aacute;c cơ sở đ&agrave;o tạo.</p>\r\n\r\n<p><strong>KỸ NĂNG ĐƯỢC HỌC</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thu thập, ph&acirc;n t&iacute;ch t&igrave;m hiểu v&agrave; tổng hợp c&aacute;c y&ecirc;u cầu từ đối tượng sử dụng phần mềm để phục vụ c&ocirc;ng t&aacute;c thiết kế.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kỹ năng lập tr&igrave;nh với c&aacute;c ng&ocirc;n ngữ như: C, Java, C#, PHP v&agrave; lập tr&igrave;nh tr&ecirc;n thiết bị di động.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Được trang bị c&aacute;c kiến thức v&agrave; kỹ năng li&ecirc;n quan tới c&aacute;c m&ocirc; h&igrave;nh, qui tr&igrave;nh, c&aacute;c giải ph&aacute;p c&ocirc;ng nghệ mới để x&acirc;y dựng phần mềm. Triển khai c&aacute;c ứng dụng cụ thể trong c&aacute;c doanh nghiệp ph&aacute;t triển phần mềm, gia c&ocirc;ng phần mềm ở c&aacute;c doanh nghiệp trong v&agrave; ngo&agrave;i nước.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&aacute;c kiến thức để c&oacute; thể phát hành các sản ph&acirc;̉m game, ứng dụng tr&ecirc;n thi&ecirc;́t bị di đ&ocirc;̣ng, thiết kế x&acirc;y dựng website.</p>\r\n\r\n<p><strong>TƯ VẤN TRỰC TUYẾN</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điện thoại: 0280 3 904 353</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;<a href="mailto:congnghephanmem@ictu.edu.vn">congnghephanmem@ictu.edu.vn</a></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Facebook:&nbsp;<a href="https://facebook.com/ktpm.ictu">https://facebook.com/ktpm.ictu</a></p>\r\n\r\n<p><strong>NG&Agrave;NH HỆ THỐNG TH&Ocirc;NG TIN</strong></p>\r\n\r\n<ul style="list-style-type:square">\r\n	<li>M&atilde; ng&agrave;nh: D480104</li>\r\n	<li>Cấp bằng Kỹ sư hệ ch&iacute;nh quy</li>\r\n	<li>V&ugrave;ng tuyển sinh: Cả nước</li>\r\n</ul>\r\n\r\n<p><strong>CƠ HỘI VIỆC L&Agrave;M</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gi&aacute;m đốc th&ocirc;ng tin (CIO), trưởng c&aacute;c đề &aacute;n C&ocirc;ng nghệ th&ocirc;ng tin v&agrave; ph&acirc;n t&iacute;ch vi&ecirc;n hệ thống.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quản trị hệ thống, c&aacute;c hệ cơ sở dữ liệu v&agrave; c&aacute;c hệ thống phần mềm cho c&aacute;c tổ chức cơ quan.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lập tr&igrave;nh vi&ecirc;n x&acirc;y dựng hệ thống phần mềm, tham gia c&aacute;c dự &aacute;n về hệ thống th&ocirc;ng tin, c&ocirc;ng nghệ tri thức v&agrave; hệ thống th&ocirc;ng tin địa l&yacute;.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ph&acirc;n t&iacute;ch dữ liệu phục vụ điều h&agrave;nh v&agrave; ra quyết định quản l&yacute;.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nghi&ecirc;n cứu v&agrave; tư vấn thiết kế c&aacute;c hệ thống th&ocirc;ng tin quản l&yacute;.</p>\r\n\r\n<p><strong>KỸ NĂNG ĐƯỢC HỌC</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ph&acirc;n t&iacute;ch thiết kế, tạo m&ocirc; h&igrave;nh, x&acirc;y dựng v&agrave; quản trị hệ cơ sở dữ liệu, tổ chức kho dữ liệu, khai ph&aacute; dữ liệu li&ecirc;n quan đến c&aacute;c hoạt động quản l&yacute;, sản xuất v&agrave; kinh doanh.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phương ph&aacute;p, kỹ thuật, m&ocirc; h&igrave;nh nhằm hoạch định, ph&acirc;n t&iacute;ch v&agrave; thiết kế hệ thống th&ocirc;ng tin.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quản l&yacute; đề &aacute;n v&agrave; nh&oacute;m đề &aacute;n qua c&aacute;c giai đoạn hoạch định, ph&acirc;n t&iacute;ch, thiết kế v&agrave; hiện thực đề &aacute;n x&acirc;y dựng hệ thống th&ocirc;ng tin.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;An to&agrave;n, bảo mật hệ thống th&ocirc;ng tin v&agrave; mạng m&aacute;y t&iacute;nh.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Giải ph&aacute;p sử dụng hệ thống th&ocirc;ng tin để n&acirc;ng cao khả năng l&atilde;nh đạo, quản l&yacute; của doanh nghiệp.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Những kiến thức nền t&agrave;ng trong việc ph&aacute;t triển chuy&ecirc;n s&acirc;u về xứ l&yacute; ảnh, &acirc;m thanh, c&aacute;c hệ thống nhận dạng, hệ thống th&ocirc;ng minh v&agrave; hệ th&ocirc;ng tin địa l&yacute;.</p>\r\n\r\n<p><strong>TƯ VẤN TRỰC TUYẾN</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điện thoại: 0280 3 904 353</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;<a href="mailto:hethongthongtin@ictu.edu.vn">hethongthongtin@ictu.edu.vn</a></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Facebook::&nbsp;<a href="https://facebook.com/httt.ictu">https://facebook.com/httt.ictu</a></p>\r\n', 'images25052016383.png', '', 1, 1, 0, '2016-05-25 11:33:57', '2016-05-25 11:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `site_category`
--

CREATE TABLE `site_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `state` int(2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_category`
--

INSERT INTO `site_category` (`id`, `title`, `description`, `state`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Bài Viết trang', 'trang bài viết bộ môn', 1, 1, '2016-05-23 14:52:17', '2016-05-23 14:52:17'),
(2, 'Slide hiện thị ngoài site', 'slide sẽ chỉ lấy 3 bài viết mới nhất thuộc nhóm này', 1, 1, '2016-05-25 11:04:36', '2016-05-25 11:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `site_feedback`
--

CREATE TABLE `site_feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `state` int(2) NOT NULL,
  `reply` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_feedback`
--

INSERT INTO `site_feedback` (`id`, `email`, `subject`, `message`, `state`, `reply`, `created_at`, `updated_at`, `name`) VALUES
(1, 'ducduongblue@gmail.com', 'Cần check lại phần site', 'Phần site hiện tại chưa hoàn chỉnh cần kiểm tra lại', 1, '<p>Th&acirc;n gửi Duong</p>\r\n\r\n<p>C&aacute;m ơn bạn đ&atilde; phản hồi cho ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>Xin ch&acirc;n th&agrave;nh cảm ơn!</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2016-05-23 14:47:59', '0000-00-00 00:00:00', 'Duong');

-- --------------------------------------------------------

--
-- Table structure for table `site_introduce`
--

CREATE TABLE `site_introduce` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `state` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_introduce`
--

INSERT INTO `site_introduce` (`id`, `content`, `state`, `created_at`, `updated_at`) VALUES
(1, '<p>Phần giới thiệu bộ m&ocirc;n new vesion thens</p>\r\n', 1, '2016-05-24 17:38:41', '2016-05-24 17:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `site_notes`
--

CREATE TABLE `site_notes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `attached` varchar(255) NOT NULL,
  `state` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_notes`
--

INSERT INTO `site_notes` (`id`, `title`, `description`, `attached`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Tuyển Sinh năm 2016', 'Thông báo tuyển sinh ictu 2016', 'attachs24052016361.pdf', 1, '2016-05-24 09:21:10', '2016-05-24 02:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name_status` varchar(255) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name_status`, `note`) VALUES
(1, 'Hoàn thành', ''),
(2, 'Chưa hoàn thành', ''),
(3, 'Đang thực hiện', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `id_department` int(11) NOT NULL,
  `dateofbirth` timestamp NULL DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `course_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `student_name`, `id_department`, `dateofbirth`, `class_name`, `course_id`, `email`, `phone`, `description`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DTC11M1200001', 'Chu Văn An', 1, '1993-06-09 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:12:50', '2016-05-25 04:49:16', NULL),
(2, 'DTC1151240036', 'Vũ Thị An', 1, '1993-12-01 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:15:13', '2016-05-20 15:15:13', NULL),
(3, 'DTC1151240001', 'Ma Văn Cảnh', 1, '1988-12-05 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:16:58', '2016-05-20 15:16:58', NULL),
(4, 'DTC1151240044', 'Lê Quang Công', 1, '1993-10-22 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:18:04', '2016-05-20 15:18:04', NULL),
(5, 'DTC1151240003', 'Vi Cương', 1, '1993-01-24 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:18:58', '2016-05-20 15:18:58', NULL),
(6, 'DTC11M1200088', 'Nguyễn Đình Cường', 1, '1992-02-19 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:19:48', '2016-05-20 15:19:48', NULL),
(7, 'DTC1151280099', 'Nguyễn Thùy Chang', 1, '1993-07-04 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:25:21', '2016-05-20 15:25:21', NULL),
(8, 'DTC1151240051', 'Đỗ Phương Chi', 1, '1993-07-08 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:26:02', '2016-05-20 15:26:02', NULL),
(9, 'DTC1151240004', 'Phạm Ngọc Doanh', 1, '1993-06-10 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:26:53', '2016-05-20 15:26:53', NULL),
(10, 'DTC11M1200012', 'Tô Thế Dũng', 1, '1993-10-10 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:27:44', '2016-05-20 15:27:44', NULL),
(11, 'DTC1151240005', 'Đỗ Tiến Dự', 1, '1993-09-02 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:28:45', '2016-05-20 15:28:45', NULL),
(12, 'DTC1151240007', 'Nguyễn Đức Dương', 1, '1992-11-01 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:29:56', '2016-05-20 15:29:56', NULL),
(13, 'DTC1151200115', 'Nguyễn Thùy Dương', 1, '1993-01-05 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:30:48', '2016-05-20 15:30:48', NULL),
(14, 'DTC1151240008', 'Nguyễn Thùy Dương', 1, '1993-10-26 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:32:16', '2016-05-20 15:32:16', NULL),
(15, 'DTC1151220014', 'Lưu Văn Đạt', 1, '1993-04-07 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:32:57', '2016-05-20 15:32:57', NULL),
(16, 'DTC1151240037', 'Vi Văn Đạt', 1, '1992-07-10 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:33:41', '2016-05-20 15:33:41', NULL),
(17, 'DTC1151240053', 'Cao Thị Điển', 1, '1993-10-21 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:34:33', '2016-05-20 15:34:33', NULL),
(18, 'DTC1151240009', 'Giáp Mạnh Đồng', 1, '1993-07-17 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:35:21', '2016-05-20 15:35:21', NULL),
(19, 'DTC1151260057', 'Lương Trung Đức', 1, '1993-02-09 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:36:15', '2016-05-20 15:36:15', NULL),
(20, 'DTC1151220020', 'Đinh Thanh Hằng', 1, '1993-07-14 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:37:34', '2016-05-20 15:37:34', NULL),
(21, 'DTC1151240011', 'Nguyễn Thị Hậu', 1, '1993-12-17 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:38:26', '2016-05-20 15:38:26', NULL),
(22, 'DTC11M1200021', 'Nguyễn Văn Hòa', 1, '1992-12-30 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:39:13', '2016-05-20 15:39:13', NULL),
(23, 'DTC1151200023', 'Nguyễn Thị Hoài', 1, '1992-12-12 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:40:26', '2016-05-20 15:40:26', NULL),
(24, 'DTC1151200024', 'Đỗ Thế Hoàng', 1, '1992-08-09 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:41:15', '2016-05-20 15:41:15', NULL),
(25, 'DTC1151240013', 'Đào Mai Hồng', 1, '1993-09-08 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:42:03', '2016-05-20 15:42:03', NULL),
(26, 'DTC1151200025', 'Hoàng Thị Hồng', 1, '1993-01-08 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:42:43', '2016-05-20 15:42:43', NULL),
(27, 'DTC1151240052', 'Nguyễn Thị Hồng', 1, '1993-03-24 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:44:17', '2016-05-20 15:44:17', NULL),
(28, 'DTC1151240014', 'Nguyễn Văn Hợp', 1, '1993-10-11 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:44:59', '2016-05-20 15:44:59', NULL),
(29, 'DTC1151240015', 'Phạm Ngọc Huế', 1, '1993-08-01 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:45:44', '2016-05-20 15:45:44', NULL),
(30, 'DTC11M1200026', 'Nguyễn Văn Hùng', 1, '1992-05-24 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:46:37', '2016-05-20 15:46:37', NULL),
(31, 'DTC1151240016', 'Tạ Văn Hùng', 1, '1993-09-10 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:47:26', '2016-05-20 15:47:26', NULL),
(32, 'DTC1151240018', 'Nguyễn Thị Thu Huyền', 1, '1992-12-19 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:48:28', '2016-05-20 15:48:28', NULL),
(33, 'DTC1151240089', 'Phan Công Hữu', 1, '1993-01-28 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:49:06', '2016-05-20 15:49:06', NULL),
(34, 'DTC1151240017', 'Hạ Văn Hựu', 1, '1993-06-25 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:50:37', '2016-05-20 15:50:37', NULL),
(35, 'DTC11M1200031', 'Nguyễn Thị Lan', 1, '1993-10-18 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:51:44', '2016-05-20 15:51:44', NULL),
(36, 'DTC1151200196', 'Hoàng Thị Mỹ Lê', 1, '1993-09-08 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:53:26', '2016-05-20 15:53:26', NULL),
(37, 'DTC1151240020', 'Phan Ngọc Linh', 1, '1993-10-06 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:54:16', '2016-05-20 15:54:16', NULL),
(38, 'DTC11L1240038', 'Lò Văn Long', 1, '1992-10-02 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:54:51', '2016-05-20 15:54:51', NULL),
(39, 'DTC11L1240039', 'Lục Văn Luân', 1, '1991-06-04 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:56:04', '2016-05-20 15:56:04', NULL),
(40, 'DTC11M1200037', 'Đồng Hùng Mạnh', 1, '1992-11-01 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:56:42', '2016-05-20 15:56:42', NULL),
(41, 'DTC1151220040', 'Vũ Đức Mạnh', 1, '1992-12-08 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:57:19', '2016-05-20 15:57:19', NULL),
(42, 'DTC1151240021', 'Nguyễn Thị Mây', 1, '1993-08-31 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:57:59', '2016-05-20 15:57:59', NULL),
(43, 'DTC1151240022', 'Đỗ Văn Minh', 1, '1993-11-14 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:58:33', '2016-05-20 15:58:33', NULL),
(44, 'DTC1151220042', 'Trương Đức Minh', 1, '1993-08-09 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 15:59:13', '2016-05-20 15:59:13', NULL),
(45, 'DTC1151200061', 'Phạm Công Mỹ', 1, '1993-09-15 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 15:59:39', '2016-05-20 16:00:51', NULL),
(46, 'DTC1151240041', 'Cao Thị Năm', 1, '1993-09-04 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:01:46', '2016-05-20 16:01:46', NULL),
(47, 'DTC1151240047', 'Đoàn Thị Ngát', 1, '1992-10-01 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:02:21', '2016-05-20 16:02:21', NULL),
(48, 'DTC1151240045', 'Lâm Ngân', 1, '1993-08-21 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:02:54', '2016-05-20 16:02:54', NULL),
(49, 'DTC11L1240036', 'Vàng Dỉ Phò', 1, '1990-08-12 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:04:20', '2016-05-20 16:04:20', NULL),
(50, 'DTC11M1200093', 'Lê Duy Phương Quyền', 1, '1991-12-29 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:04:54', '2016-05-20 16:04:54', NULL),
(51, 'DTC1151240024', 'Đỗ Thành Tâm', 1, '1993-10-23 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:05:33', '2016-05-20 16:05:33', NULL),
(52, 'DTC1151240025', 'Phạm Văn Tâm', 1, '1993-02-18 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:06:13', '2016-05-20 16:06:13', NULL),
(53, 'DTC11M1200081', 'Đào Trọng Tiến', 1, '1993-11-11 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:06:45', '2016-05-20 16:06:45', NULL),
(54, 'DTC1151240030', 'Trần Văn Tiến', 1, '1992-11-02 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:07:33', '2016-05-20 16:07:33', NULL),
(55, 'DTC1151240048', 'Lương Văn Tuấn', 1, '1993-02-21 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:08:15', '2016-05-20 16:08:15', NULL),
(56, 'DTC1151240043', 'Lê Thanh Tùng', 1, '1993-09-16 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:08:56', '2016-05-20 16:08:56', NULL),
(57, 'DTC1151240034', 'Nguyễn Văn Tuyên', 1, '1992-10-28 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:09:39', '2016-05-20 16:09:39', NULL),
(58, 'DTC1151240060', 'Phạm Thị Tươi', 1, '1992-12-11 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:11:14', '2016-05-20 16:11:14', NULL),
(59, 'DTC1151240033', 'Đinh Mạnh Tường', 1, '1993-09-16 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:12:12', '2016-05-20 16:12:12', NULL),
(60, 'DTC11M1200049', 'Nông Văn Thái', 1, '1993-01-01 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:13:07', '2016-05-20 16:13:07', NULL),
(61, 'DTC1151220055', 'Nguyễn Xuân Thành', 1, '1993-05-26 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:13:57', '2016-05-20 16:13:57', NULL),
(62, 'DTC1151220056', 'Vũ Tiến Thành', 1, '1993-11-25 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:14:49', '2016-05-20 16:14:49', NULL),
(63, 'DTC11M1200053', 'Lê Xuân Thảo', 1, '1992-12-08 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:15:24', '2016-05-20 16:15:24', NULL),
(64, 'DTC1151240040', 'Nguyễn Thị Thêu', 1, '1993-06-03 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:15:59', '2016-05-20 16:15:59', NULL),
(65, 'DTC1151280098', 'Nguyễn Thị Thu', 1, '1991-07-15 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:16:35', '2016-05-20 16:16:35', NULL),
(66, 'DTC1151240028', 'Hoàng Bích Thuận', 1, '1993-06-17 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:17:12', '2016-05-20 16:17:12', NULL),
(67, 'DTC1151200059', 'Nguyễn Thị Lệ Thủy', 1, '1993-07-16 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:18:02', '2016-05-20 16:18:02', NULL),
(68, 'DTC11M1200087', 'Đỗ Như Thuyết', 1, '1992-11-08 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:18:53', '2016-05-20 16:20:17', NULL),
(69, 'DTC1151240029', 'Ma Quang Thương', 1, '1993-09-04 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:21:58', '2016-05-20 16:21:58', NULL),
(70, 'DTC1151240031', 'Tạ Huy Triệu', 1, '1993-06-15 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:22:34', '2016-05-20 16:22:34', NULL),
(71, 'DTC1151240032', 'Bế Thành Trung', 1, '1993-03-25 00:00:00', 'TT&MMT K10B', '2', '', '', '', '', '2016-05-20 16:23:05', '2016-05-20 16:23:05', NULL),
(72, 'DTC1151240035', 'Triệu Hồng Uyên', 1, '1993-10-05 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:23:49', '2016-05-20 16:23:49', NULL),
(73, 'DTC1151240049', 'Hoàng Nguyễn Khánh Vân', 1, '1993-06-11 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:24:36', '2016-05-20 16:24:36', NULL),
(74, 'DTC11M1200079', 'Nguyễn Thị Yến', 1, '1992-12-21 00:00:00', 'TT&MMT K10A', '2', '', '', '', '', '2016-05-20 16:25:20', '2016-05-20 16:25:20', NULL),
(75, 'DTC11M120001234', 'Nguyễn Văn A', 1, '1993-08-18 04:39:14', 'TT&MMT K10C', '2', 'chienbinhbattuyeudoidentoi1992@gmail.com', '1234567890', 'Mô tả', 'Ghi chú', '2016-05-25 04:39:14', '2016-05-25 04:39:14', NULL),
(76, 'DTC135D4801020003', 'Trịnh Thị Lan Anh', 1, '1995-10-02 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(77, 'DTC09M1200089', 'Phạm Tuấn Anh', 1, NULL, 'TT&MMT K8', '7', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(78, 'DTC135D4801020150', 'Phạm Tuấn Anh', 1, '1994-11-24 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(79, 'DTC135D4801020002', 'Phạm Ngọc Anh', 1, '1995-09-26 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(80, 'DTC135D4801020001', 'La Đức Anh', 1, '1994-01-03 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(81, 'DTC135D4801020306', 'Đoàn Minh Bắc', 1, '1995-02-14 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(82, 'DTC135D4801020005', 'Trần Văn Bắc', 1, '1991-02-12 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(83, 'DTC135D4801020212', 'Đậu Thị Bình', 1, '1995-01-12 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(84, 'DTC135D4801020200', 'Nguyễn Duy Bình', 1, '1995-10-22 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(85, 'DTC135D4801020010', 'Quàng Văn Cường', 1, '1993-12-29 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(86, 'DTC135D4801020012', 'Vàng A Di', 1, '1994-10-06 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(87, 'DTC135D4801020080', 'Nguyễn Đình Hà', 1, '1995-08-06 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(88, 'DTC135D4801020014', 'Hoàng Thị Thu Hà', 1, '1995-07-20 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(89, 'DTC135D4801020081', 'Đỗ Văn Hải', 1, '1994-04-27 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(90, 'DTC135D4801020082', 'Phạm Ngọc Hải', 1, '1995-11-17 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(91, 'DTC125D4801020009', 'Trịnh Đức Hạnh', 1, '1994-11-26 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(92, 'DTC135D4801020015', 'Bùi Lệ Hảo', 1, '1995-03-02 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(93, 'DTC135D4801020016', 'Triệu Trung Hiếu', 1, '1995-01-20 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(94, 'DTC0951200251', 'Hoàng Văn Hoan', 1, '1990-07-08 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(95, 'DTC135D4801020085', 'Phạm Hồng Hoàng', 1, '1995-10-10 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(96, 'DTC135D4801020087', 'Nguyễn Anh Hùng', 1, '1993-05-14 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(97, 'DTC135D4801020018', 'Nguyễn Ngọc Hưng', 1, '1994-11-04 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(98, 'DTC135D4801020088', 'Lâm Thị Hương', 1, '1995-03-27 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(99, 'DTC135D4801020019', 'Hoàng Quốc Huy', 1, '1995-09-15 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(100, 'DTC135D4801030155', 'Nguyễn Thị Huyền', 1, '1995-01-12 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(101, 'DTC135D4801020089', 'Nguyễn Quang Khánh', 1, '1995-08-20 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(102, 'DTC135D4801020021', 'Nguyễn Trung Kiên', 1, '1994-08-15 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(103, 'DTC135D5103020035', 'Nguyễn Trung Kiên', 1, '1994-11-03 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(104, 'DTC135D4801020022', 'La Thị Vân Kiều', 1, '1995-07-24 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(105, 'DTC135D4801020090', 'Lê Phúc Lâm', 1, '1994-06-03 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(106, 'DTC135D4801020023', 'Chu Thuỳ Linh', 1, '1995-02-28 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(107, 'DTC125D4801020015', 'Nguyễn Xuân Mạnh', 1, '1994-07-01 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(108, 'DTC135D4801020092', 'Lê Tuấn Minh', 1, '1994-05-22 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(109, 'DTC0951200193', 'Đỗ Ngọc Nam', 1, '1990-06-12 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(110, 'DTC135D4801020167', 'Lục Văn Ngọc', 1, '1991-06-16 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(111, 'DTC135D4801020024', 'Nguyễn Thị Ngọc', 1, '1995-07-14 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(112, 'DTC135D4801020025', 'Nguyễn Việt Nguyên', 1, '1995-10-18 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(113, 'DTC135D4801020026', 'Nguyễn Hữu Ninh', 1, '1995-12-04 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(114, 'DTC135D4801020027', 'Vũ Hoài Ninh', 1, '1994-09-20 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(115, 'DTC125D4801020300', 'Nguyễn Vương Quân', 1, '1990-06-28 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(116, 'DTC125D4801020019', 'Nguyễn Thanh Quân', 1, '1994-12-13 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(117, 'DTC135D4801020098', 'Đỗ Thị Quyên', 1, '1995-06-15 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(118, 'DTC135D4801020102', 'Đặng Thế Song', 1, '1995-04-02 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(119, 'DTC135D4802012003', 'Nguyễn Quang Thái', 1, '1995-06-17 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(120, 'DTC135D4801020029', 'Hoàng Ngọc Thái', 1, '1994-12-14 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(121, 'DTC135D4801020031', 'Vy Nghĩa Thành', 1, '1993-03-13 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(122, 'DTC135D4801020104', 'Trần Công Thành', 1, '1995-09-18 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(123, 'DTC135D4801020032', 'Hoàng Văn Thật', 1, '1994-06-10 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(124, 'DTC09M1200023', 'Nguyễn Văn Thịnh', 1, '1991-10-04 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(125, 'DTC135D4801020107', 'Nguyễn Dương Toàn', 1, '1994-10-15 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(126, 'DTC135D4801020108', 'Lê Thanh Trà', 1, '1995-12-21 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(127, 'DTC135D4802010579', 'Phạm Thị Trang', 1, '1994-02-05 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(128, 'DTC135D4802010233', 'Phạm Thị Thuỳ Trang', 1, '1995-03-21 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(129, 'DTC135D4801020036', 'Nguyễn Đỗ Huyền Trang', 1, '1995-08-20 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(130, 'DTC135D4802010164', 'Vũ Hà Huyền Trang', 1, '1995-11-01 00:00:00', 'CNTT K12B', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(131, 'DTC135D4801020035', 'Lưu Thị Quỳnh Trang', 1, '1995-11-08 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(132, 'DTC135D4801020312', 'Trần Trọng Quang Trinh', 1, '1995-07-10 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:49', '2016-05-31 05:28:49', NULL),
(133, 'DTC135D4802010100', 'Ngô Bảo Trung', 1, '1994-09-14 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(134, 'DTC135D4802010234', 'Sầm Quang Trung', 1, '1995-08-14 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(135, 'DTC135D4802010485', 'Hoàng Thành Trung', 1, '1995-06-06 00:00:00', 'CNTT K12D', '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(136, 'DTC135D4802010166', 'Phạm Văn Trường', 1, '1994-04-14 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(137, 'DTC135D4802010235', 'Phạm Văn Trường', 1, '1994-06-02 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(138, 'DTC135D4802011515', 'Vi Đình Trưởng', 1, '1994-08-29 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(139, 'DTC135D4802010101', 'Nguyễn Văn Tú', 1, '1995-01-30 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(140, 'DTC135D4801020037', 'Đỗ Ngọc Tú', 1, '1994-10-26 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(141, 'DTC135D4802010582', 'Dương Anh Tú', 1, '1995-12-04 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(142, 'DTC135D4802010311', 'Giàng A Tú', 1, '1994-09-08 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(143, 'DTC135D4802010300', 'Cao Văn Tú', 1, '1995-11-28 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(144, 'DTC135D4801020038', 'Nguyễn Duy Tư', 1, '1995-04-23 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(145, 'DTC135D4801020039', 'Đàm Mạnh Tứ', 1, '1990-05-10 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(146, 'DTC135D4802010301', 'Thào A Tủa', 1, '1993-06-07 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(147, 'DTC135D4801020046', 'Lường Văn Tuấn', 1, '1992-08-06 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(148, 'DTC135D4802010302', 'Đoàn Quang Tuấn', 1, '1993-12-31 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(149, 'DTC135D4802010488', 'Trần Anh Tuấn', 1, '1995-01-30 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(150, 'DTC135D4801020041', 'Nguyễn Anh Tuấn', 1, '1994-04-10 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(151, 'DTC135D4802010236', 'Dương Hữu Tuấn', 1, '1994-05-20 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(152, 'DTC135D4802010102', 'Hoàng Văn Tuấn', 1, '1995-08-11 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(153, 'DTC135D4802010237', 'Hoàng Anh Tuấn', 1, '1995-08-04 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(154, 'DTC135D4802010168', 'Triệu Văn Tuấn', 1, '1995-06-22 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(155, 'DTC125D4802010120', 'Ngô Văn Tùng', 1, '1994-07-03 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(156, 'DTC135D4802010103', 'Đào Duy Tùng', 1, '1995-04-19 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(157, 'DTC135D4801020042', 'Nguyễn Thanh Tùng', 1, '1995-01-14 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(158, 'DTC135D4802010104', 'Hà Sơn Tùng', 1, '1991-11-21 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(159, 'DTC135D4802010585', 'Bùi Thanh Tùng', 1, '1994-11-21 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(160, 'DTC125D4802010056', 'Dương Văn Tùng', 1, '1994-09-23 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(161, 'DTC135D4802010169', 'Lâm Văn Tùng', 1, '1995-11-22 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(162, 'DTC135D4801020112', 'Nguyễn Văn Tường', 1, '1995-12-09 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(163, 'DTC135D5103010178', 'Trần Văn Tuyên', 1, '1994-06-06 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(164, 'DTC135D5103040012', 'Hạc Thông Tuyên', 1, '1995-09-20 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(165, 'DTC135D4802010171', 'Nông Văn Tuyến', 1, '1995-02-28 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(166, 'DTC135D4802010239', 'Lý Thị Tuyết', 1, '1995-10-20 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(167, 'DTC135D4802010306', 'Nguyễn Thị Vân', 1, '1995-11-08 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(168, 'DTC135D4802010240', 'Lê Thị Vân', 1, '1995-03-23 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(169, 'DTC135D4802010173', 'Tráng Seo Viện', 1, '1993-12-17 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(170, 'DTC135D4802010106', 'Bế Văn Viết', 1, '1995-03-24 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(171, 'DTC135D4802010174', 'Nguyễn Hà Việt', 1, '1995-02-01 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(172, 'DTC135D4802010241', 'Hoàng Thế Vinh', 1, '1995-11-16 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 05:28:50', NULL),
(173, 'DTC125D4802010198', 'Lương Văn Võ', 1, '1994-09-08 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-06-03 20:23:03', '2016-06-03 20:23:03'),
(174, 'DTC135D4802010740', 'Nguyễn Quang Vũ', 1, '1995-04-04 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-06-03 20:19:34', '2016-06-03 20:19:34'),
(175, 'DTC135D4801020301', 'Lê Thanh Xuân', 1, '1995-03-24 00:00:00', 'TT&MMT K12', '4', '', '', '', '', '2016-05-31 05:28:50', '2016-06-03 20:18:50', '2016-06-03 20:18:50'),
(176, 'DTC135D4802010242', 'Lê Thị Ý', 1, '1995-01-07 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-06-01 11:39:53', '2016-06-01 11:39:53'),
(177, 'DTC135D4802010108', 'Nông Hải Yến', 1, '1995-09-20 00:00:00', NULL, '4', '', '', '', '', '2016-05-31 05:28:50', '2016-05-31 08:11:21', '2016-05-31 08:11:21'),
(178, 'DTC125D4801020002', 'Nông Thị Anh', 1, '1994-04-22 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:14', '2016-06-16 22:38:14', NULL),
(179, 'DTC0851200217', 'Nguyễn Trần Hùng Cường', 1, '1990-11-18 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:14', '2016-06-16 22:38:14', NULL),
(180, 'DTC125D4801020005', 'Ma Phúc Đông', 1, '1994-02-15 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:15', '2016-06-16 22:38:15', NULL),
(181, 'DTC125D4801020006', 'Ngô Hữu Đức', 1, '1994-08-18 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:15', '2016-06-16 22:38:15', NULL),
(182, 'DTC1151220023', 'Lê Quang Hiệp', 1, '1993-11-16 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:15', '2016-06-16 22:38:15', NULL),
(183, 'DTC125D4801020010', 'Nguyễn Văn Hoàng', 1, '1994-05-31 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:15', '2016-06-16 22:38:15', NULL),
(184, 'DTC125D4801020011', 'Hoàng Văn Hội', 1, '1993-09-30 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:15', '2016-06-16 22:38:15', NULL),
(185, 'DTC125D4801020012', 'Ngô Quang Huy', 1, '1993-04-23 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:15', '2016-06-16 22:38:15', NULL),
(186, 'DTC125D4801020013', 'Nguyễn Tiếp Huy', 1, '1994-10-03 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:15', '2016-06-16 22:38:15', NULL),
(187, 'DTC125D4801040015', 'Nguyễn Thị Thanh Huyền', 1, '1994-03-29 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:16', '2016-06-16 22:38:16', NULL),
(188, 'DTC125D4801020030', 'Trương Thị Hương', 1, '1994-05-10 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:16', '2016-06-16 22:38:16', NULL),
(189, 'DTC155D4801030200', 'NUNTHAVONG Khamlar', 1, '1994-08-16 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:16', '2016-06-16 22:38:16', NULL),
(190, 'DTC09M1200221', 'Lê Trung Kiên', 1, '1990-03-07 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:16', '2016-06-16 22:38:16', NULL),
(191, 'DTC125D4801040007', 'Vương Thị Kiên', 1, '1994-01-19 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:16', '2016-06-16 22:38:16', NULL),
(192, 'DTC125D4801040008', 'Đặng Thị Lệ', 1, '1994-11-17 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:16', '2016-06-16 22:38:16', NULL),
(193, 'DTC125D4801020014', 'Ma Thị Lựu', 1, '1994-05-17 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:17', '2016-06-16 22:38:17', NULL),
(194, 'DTC125D4801020016', 'Nguyễn Ngọc Minh', 1, '1994-10-17 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:17', '2016-06-16 22:38:17', NULL),
(195, 'DTC155D4801030202', 'SAELEE Naichien', 1, '1993-06-06 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:17', '2016-06-16 22:38:17', NULL),
(196, 'DTC125D4801020046', 'Vũ Nhật Nam', 1, '1994-12-07 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:17', '2016-06-16 22:38:17', NULL),
(197, 'DTC125D4801020017', 'Phạm Xuân Nhật', 1, '1994-03-18 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:17', '2016-06-16 22:38:17', NULL),
(198, 'DTC125D4801020018', 'Nguyễn Thị Hồng Nhung', 1, '1994-12-21 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:17', '2016-06-16 22:38:17', NULL),
(199, 'DTC125D4801020020', 'Trần Văn  Quy', 1, '1994-06-28 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:17', '2016-06-16 22:38:17', NULL),
(200, 'DTC1151240024', 'Đỗ Thành Tâm', 1, '1994-10-22 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:17', '2016-06-16 22:38:17', NULL),
(201, 'DTC125D4801020022', 'Hoàng Văn Thao', 1, '1994-10-05 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:18', '2016-06-16 22:38:18', NULL),
(202, 'DTC125D4801020024', 'Trương Vạn Tú', 1, '1994-02-01 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:18', '2016-06-16 22:38:18', NULL),
(203, 'DTC125D4801020025', 'Ma Quý Tùng', 1, '1994-07-16 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:18', '2016-06-16 22:38:18', NULL),
(204, 'DTC125D4801020026', 'Trần Đức Tùng', 1, '1994-04-22 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:18', '2016-06-16 22:38:18', NULL),
(205, 'DTC125D4802010152', 'Lê Tràng Thắng', 1, '1994-01-29 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:18', '2016-06-16 22:38:18', NULL),
(206, 'DTC125D4802010236', 'Vũ Ngọc Thiện', 1, '1994-09-19 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:18', '2016-06-16 22:38:18', NULL),
(207, 'DTC125D4802010111', 'Hoàng Văn Thiện', 1, '1994-07-13 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:18', '2016-06-16 22:38:18', NULL),
(208, 'DTC125D4802010112', 'Nguyễn Thị Thoa', 1, '1994-08-07 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:19', '2016-06-16 22:38:19', NULL),
(209, 'DTC125D4802010238', 'Nguyễn Văn Thông', 1, '1994-10-19 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:19', '2016-06-16 22:38:19', NULL),
(210, 'DTC125D4802010239', 'Phạm Thị Thu', 1, '1994-06-07 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:19', '2016-06-16 22:38:19', NULL),
(211, 'DTC125D4802010048', 'Nông Thị Thuý', 1, '1994-09-25 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:19', '2016-06-16 22:38:19', NULL),
(212, 'DTC125D4802010113', 'Hoàng Văn Thương', 1, '1993-03-04 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:19', '2016-06-16 22:38:19', NULL),
(213, 'DTC125D4802010114', 'Nguyễn Quy Toàn', 1, '1994-11-09 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:19', '2016-06-16 22:38:19', NULL),
(214, 'DTC125D4802010051', 'Hoàng Thị Trang', 1, '1994-06-07 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:20', '2016-06-16 22:38:20', NULL),
(215, 'DTC125D4802010115', 'Phùng Huyền Trang', 1, '1994-07-30 17:00:00', 'TT&MMT K11', '3', '', '', '', '', '2016-06-16 22:38:20', '2016-06-16 22:38:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `number` int(2) NOT NULL,
  `number_practice` int(2) NOT NULL,
  `semester` int(2) NOT NULL,
  `id_department` int(11) NOT NULL,
  `id_programs` int(11) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `number`, `number_practice`, `semester`, `id_department`, `id_programs`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Những NLCB của CN Mác Lê nin', 5, 0, 1, 2, 1, '', '2016-06-01 11:31:03', '2016-06-01 11:31:03', '2016-06-01 11:31:03'),
(2, 'Anh văn 1', 3, 0, 1, 2, 1, '', '2016-06-01 11:32:38', '2016-06-01 11:32:38', '2016-06-01 11:32:38'),
(3, 'Toán cao cấp 1', 4, 0, 1, 2, 1, '', '2016-06-01 11:34:15', '2016-06-01 11:34:15', '2016-06-01 11:34:15'),
(4, 'Vật lý 1', 3, 0, 1, 2, 1, '', '2016-06-01 11:34:25', '2016-06-01 11:34:25', '2016-06-01 11:34:25'),
(5, 'Tin học đại cương', 3, 1, 1, 9, 1, '', '2016-06-01 11:50:29', '2016-06-01 11:50:29', '2016-06-01 11:50:29'),
(6, 'Anh văn 2', 3, 0, 2, 2, 1, '', '2016-06-01 11:46:03', '2016-06-01 11:46:03', '2016-06-01 11:46:03'),
(7, 'Toán cao cấp 2', 3, 0, 2, 2, 1, '', '2016-06-01 11:32:17', '2016-06-01 11:32:17', '2016-06-01 11:32:17'),
(8, 'Vật lý 2', 2, 0, 2, 2, 1, '', '2016-06-01 11:32:26', '2016-06-01 11:32:26', '2016-06-01 11:32:26'),
(9, 'Hoá đại cương', 2, 0, 2, 2, 1, '', '2016-06-01 11:52:43', '2016-06-01 11:52:43', '2016-06-01 11:52:43'),
(10, 'Tư tưởng Hồ Chí Minh', 2, 0, 2, 2, 1, '', '2016-06-01 11:52:53', '2016-06-01 11:52:53', '2016-06-01 11:52:53'),
(11, 'Cơ sở dữ liệu', 2, 0, 2, 5, 1, '', '2016-06-01 11:55:50', '2016-06-01 11:55:50', '2016-06-01 11:55:50'),
(12, 'Lập trình có cấu trúc', 3, 1, 2, 9, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(13, 'Pháp luật đại cương', 2, 0, 2, 13, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(14, 'Cấu trúc dữ liệu và thuật toán', 3, 1, 3, 4, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(15, 'Anh văn 3', 2, 0, 3, 2, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(16, 'Lý thuyết thông tin', 2, 0, 3, 6, 1, 'Thay đổi thứ tự với môn Kỹ thuật Truyền tin', '2016-06-01 11:36:58', '2016-06-01 11:36:57', '2016-06-01 11:36:57'),
(17, 'Xác suất thống kê', 2, 0, 3, 2, 1, '', '2016-06-01 11:43:11', '2016-06-01 11:43:11', '2016-06-01 11:43:11'),
(18, 'Đường lối cách mạng của Đảng CSVN', 3, 0, 3, 2, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(19, 'Tiếng việt thực hành', 2, 0, 3, 2, 1, '', '2016-06-01 11:47:55', '2016-06-01 11:47:55', '2016-06-01 11:47:55'),
(20, 'Toán cao cấp 3', 2, 0, 3, 2, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(21, 'Anh văn chuyên ngành 1', 2, 0, 4, 2, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(22, 'Toán rời rạc', 3, 0, 4, 6, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(23, 'Kỹ thuật điện tử', 3, 0, 4, 7, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(24, 'Nguyên lý các hệ điều hành', 2, 0, 4, 5, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(25, 'Mạng máy tính', 3, 0, 4, 1, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(26, 'Hệ quản trị cơ sở dữ liệu', 3, 1, 4, 5, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(27, 'Kỹ thuật truyền tin', 2, 0, 4, 1, 1, 'Thay đổi thứ tự với môn Lý thuyết Thông tin', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(28, 'Anh văn chuyên ngành 2', 2, 0, 5, 2, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(29, 'Vi xử lý- Hợp ngữ', 3, 1, 5, 8, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(30, 'Lập trình hướng đối tượng', 3, 1, 5, 9, 1, '', '2016-06-01 11:29:12', '2016-06-01 11:29:12', NULL),
(31, 'Toán11', 1, 0, 1, 1, 1, 'fgndgjhdfng', '2016-06-01 11:30:40', '2016-06-01 11:30:40', NULL),
(32, 'jghh', 1, 3, 5, 1, 1, '', '2016-06-01 11:37:25', '2016-06-01 11:37:25', NULL),
(33, 'huyen', 1, 1, 1, 1, 1, '', '2016-06-01 11:46:21', '2016-06-01 11:46:21', NULL),
(34, 'Công nghệ Thông tin', 1, 1, 1, 1, 1, '1', '2016-06-01 12:48:27', '2016-06-01 12:48:27', '2016-06-01 12:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `workid` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `case` int(2) NOT NULL,
  `alltime` int(1) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `notes` text NOT NULL,
  `important` int(1) NOT NULL,
  `expected` int(1) NOT NULL,
  `calendar` int(1) NOT NULL,
  `number` int(11) NOT NULL,
  `assign` int(11) NOT NULL,
  `state` int(2) NOT NULL,
  `date` varchar(255) NOT NULL,
  `eventid` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `workid`, `task_name`, `description`, `case`, `alltime`, `start`, `end`, `location`, `notes`, `important`, `expected`, `calendar`, `number`, `assign`, `state`, `date`, `eventid`, `created_at`, `updated_at`) VALUES
(1, 2, 'Lập trình android', '', 0, 0, '09:00', '10:30', 'C2.304', '', 0, 0, 0, 2, 2, 1, '17-05-2016', '', '2016-05-20 10:04:00', '2016-05-20 10:04:00'),
(2, 2, 'Kiểm thử hệ thống mạng', '', 0, 0, '13:30', '15:00', 'C2.304', '', 0, 0, 0, 7, 2, 1, '17-05-2016', '', '2016-05-20 01:47:29', '2016-05-20 01:47:29'),
(3, 2, 'An toàn thư điện tử', '', 0, 0, '15:30', '17:00', 'C2.304,C2.302,C2.303', '', 0, 0, 0, 6, 2, 1, '17-05-2016', '', '2016-05-12 13:18:41', '2016-05-12 13:18:41'),
(4, 2, 'XML và ứng dụng', '', 0, 0, '09:00', '10:30', 'C2.302,C2.303', '', 0, 0, 0, 4, 2, 1, '20-05-2016', '', '2016-05-16 11:12:03', '2016-05-16 11:12:03'),
(5, 2, 'Công nghệ mạng MANET', '', 0, 0, '13:30', '15:00', 'C2.303', '', 0, 0, 0, 2, 2, 1, '20-05-2016', '', '2016-05-20 10:26:29', '2016-05-20 10:26:29'),
(6, 2, 'Kiểm thử phần mềm', '', 0, 0, '15:30', '17:00', 'C2.303', '', 0, 0, 0, 2, 2, 1, '20-05-2016', '', '2016-05-20 10:26:48', '2016-05-20 10:26:48'),
(7, 2, 'Thực hành quy trình phát triển phần mềm', '', 0, 0, '13:30', '17:30', 'C4.203A', '', 0, 0, 0, 2, 0, 1, '20-05-2016', '', '2016-05-12 07:19:09', '2016-05-12 07:19:09'),
(8, 2, 'Quản trị và an ninh mạng', '', 0, 0, '09:00', '10:30', 'C2.304,C2.201,C2.301', '', 0, 0, 0, 6, 0, 1, '23-05-2016', '', '2016-05-12 07:18:06', '2016-05-12 07:18:06'),
(9, 2, 'Hệ chuyên gia', '', 0, 0, '13:30', '15:00', 'C2.304,C2.301', '', 0, 0, 0, 4, 0, 1, '23-05-2016', '', '2016-05-12 07:18:06', '2016-05-12 07:18:06'),
(10, 2, 'Biên tập và xử lý Video', '', 0, 0, '07:00', '08:30', 'C2.102,C2.201,C2.301', '', 0, 0, 0, 6, 0, 1, '26-05-2016', '', '2016-05-24 02:50:18', '2016-05-24 02:50:18'),
(11, 2, 'Tường lửa', '', 0, 0, '13:30', '15:00', 'C2.202', '', 0, 0, 0, 2, 0, 1, '26-05-2016', '', '2016-05-12 07:18:06', '2016-05-12 07:18:06'),
(12, 3, 'test1', '', 0, 0, '11:11', '11:11', '', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:21:45', '2016-05-12 07:21:45'),
(13, 3, 'test2', '', 0, 0, '11:11', '11:11', 'c4.101', '', 0, 0, 0, 1, 1, 1, '12-05-2016', '', '2016-05-20 01:45:45', '2016-05-20 01:45:45'),
(14, 3, 'test3', '', 0, 0, '11:11', '11:11', 'c4.101', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:21:45', '2016-05-12 07:21:45'),
(15, 3, 'test4', '', 0, 0, '11:11', '11:11', 'c4.101', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:21:45', '2016-05-12 07:21:45'),
(16, 3, 'test5', '', 0, 0, '11:11', '11:11', 'c4.101', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:21:45', '2016-05-12 07:21:45'),
(17, 3, 'test6', '', 0, 0, '11:11', '11:11', 'c4.101', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:21:45', '2016-05-12 07:21:45'),
(18, 3, 'test7', '', 0, 0, '11:11', '11:11', 'c4.101', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:21:45', '2016-05-12 07:21:45'),
(19, 3, 'test8', '', 0, 0, '11:11', '11:11', 'c4.101', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:21:45', '2016-05-12 07:21:45'),
(20, 4, 'sdfsdfdd', '', 0, 1, '12-05-2016', '12-05-2016', 'no', '', 0, 0, 0, 1, 0, 1, '', '', '2016-05-12 07:24:42', '2016-05-12 07:24:42'),
(21, 4, 'sdfsdfd', '', 0, 1, '12-05-2016', '12-05-2016', 'no', '', 0, 0, 0, 1, 1, 1, '', '', '2016-05-20 01:45:47', '2016-05-20 01:45:47'),
(22, 4, 'sdfsdfc', '', 0, 1, '12-05-2016', '12-05-2016', 'no', '', 0, 0, 0, 1, 0, 1, '', '', '2016-05-12 07:24:42', '2016-05-12 07:24:42'),
(23, 4, 'sdfsdfva', '', 0, 0, '11:11', '11:11', 'no', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:24:42', '2016-05-12 07:24:42'),
(24, 4, 'sdfsdfvadf', '', 0, 0, '11:11', '11:11', 'no', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:24:42', '2016-05-12 07:24:42'),
(25, 4, 'sdfsdfsadf', '', 0, 0, '11:11', '11:11', 'no', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:24:42', '2016-05-12 07:24:42'),
(26, 4, 'sdfsdfcxvwe', '', 0, 0, '11:11', '11:11', 'no', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:24:42', '2016-05-12 07:24:42'),
(27, 4, 'sdfsdfcvbyu', '', 0, 0, '11:11', '11:11', 'no', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:24:42', '2016-05-12 07:24:42'),
(28, 4, 'sdfsfsdfnghnv', '', 0, 0, '11:11', '11:11', 'no', '', 0, 0, 0, 1, 0, 1, '12-05-2016', '', '2016-05-12 07:24:42', '2016-05-12 07:24:42'),
(29, 5, 'sdfsdfsdfsdf', '', 0, 0, '23:23', '23:23', 'fg', '', 0, 0, 0, 1, 1, 1, '12-06-2016', '', '2016-05-31 16:08:32', '2016-05-31 16:08:32'),
(30, 6, 'dfgdfg', 'dfgdfg', 0, 1, '18-05-2016', '11-11-2011', 'cd', '', 0, 0, 0, 1, 0, 1, '', '', '2016-05-18 02:27:15', '2016-05-18 02:27:15'),
(31, 8, 'sdsfsdf', '', 0, 1, '20-05-2016', '20-05-2016', 'C.505', '', 0, 0, 0, 1, 0, 1, '', '', '2016-05-20 08:44:35', '2016-05-20 08:44:35'),
(32, 10, 'CV', '', 0, 1, '26-05-2016', '26-05-2016', 'C5.103', '', 0, 0, 0, 1, 0, 1, '', '', '2016-05-26 13:37:51', '2016-05-26 13:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `dateofbirth` timestamp NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `id_department` int(11) NOT NULL DEFAULT '1',
  `degree` varchar(255) NOT NULL,
  `working` int(1) DEFAULT NULL,
  `faculty` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `note` text NOT NULL,
  `state` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_name`, `dateofbirth`, `email`, `id_department`, `degree`, `working`, `faculty`, `phone`, `subject`, `avatar`, `description`, `note`, `state`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nguyễn Toàn Thắng', '1983-07-19 03:24:12', 'thangngt.cntt1@gmail.com', 1, 'Tiến sĩ', 1, 'CNTT', '09875052456', 'Công nghệ Thông tin', 'public/uploads/teacher_avatar/IMG_1463057216.jpg', '', '', 1, '2016-06-01 03:24:12', '2016-06-01 03:24:12', NULL),
(2, 'Nguyễn Đức Bình', '2016-05-25 03:24:31', 'ndbinh.ictu1@gmail.com', 1, 'Thạc sĩ', NULL, 'CNTT', '0942896599', 'Công nghệ Thông tin', 'public/uploads/teacher_avatar/IMG_1463057424.jpg', '', '', 1, '2016-06-01 03:24:31', '2016-06-01 03:24:31', NULL),
(3, 'Dương Thu Mây', '1986-07-15 03:24:52', 'dtmay.ictu1@gmail.com', 1, 'Thạc sĩ', 1, 'CNTT', '0909090909', 'Công nghệ Thông tin', 'public/uploads/teacher_avatar/IMG_1463057369.jpg', '', '', 1, '2016-06-01 03:24:52', '2016-06-01 03:24:52', NULL),
(4, 'Lê Hoàng Hiệp', '1985-06-13 03:25:08', 'lhhiep.ictu1@gmail.com', 1, 'Thạc sĩ', 1, 'CNTT', '0909090902', 'Công nghệ Thông tin', 'public/uploads/teacher_avatar/IMG_1463057469.jpg', '', '', 1, '2016-06-01 03:25:08', '2016-06-01 03:25:08', NULL),
(5, 'Trịnh Văn Hà', '1980-06-12 03:25:25', 'tvha.ictu1@gmail.com', 1, 'Th.S', 1, 'CNTT', '0909090901', 'Công nghệ Thông tin', 'public/uploads/teacher_avatar/IMG_1463111120.jpg', '', '', 1, '2016-06-01 03:25:25', '2016-06-01 03:25:25', NULL),
(6, 'Nguyễn Tuấn Anh', '1984-01-31 03:27:36', 'ntanh.ictu1@gmail.com', 1, 'Thạc sĩ', 1, 'CNTT', '0909090911', 'Công nghệ Thông tin', 'public/uploads/teacher_avatar/IMG_1464023616.jpg', '', '', 1, '2016-06-01 03:27:36', '2016-06-01 03:27:36', NULL),
(7, 'Dương Thúy Hường', '1985-06-10 03:32:28', 'dthuong.ictu1@gmail.com', 1, 'Thạc sĩ', 1, 'CNTT', '0949999888', 'Công nghệ Thông tin', 'public/uploads/teacher_avatar/IMG_1464023635.jpg', '', '', 1, '2016-06-01 03:32:28', '2016-06-01 03:32:28', NULL),
(8, 'Đào Thị Hằng', '1986-11-30 03:52:44', 'dthang.ictu1@gmail.com', 1, 'Thạc sĩ', 1, 'CNTT', '0909887766', 'Công nghệ Thông tin', 'public/uploads/teacher_avatar/IMG_1464023660.jpg', '', '', 1, '2016-06-01 03:52:44', '2016-06-01 03:52:44', NULL),
(9, 'Lê Anh Tú', '1988-11-30 03:53:21', 'latu.ictu1@gmail.com', 1, 'Thạc sĩ', 1, 'CNTT', '0909887722', 'Công nghệ Thông tin', 'public/uploads/teacher_avatar/IMG_1464023795.jpg', '', '', 1, '2016-06-01 03:53:21', '2016-06-01 03:53:21', NULL),
(10, 'Lương Minh Huế', '1987-11-30 03:53:45', 'lmhue.ictu1@gmail.com', 1, 'Thạc sĩ', 1, 'CNTT', '0934677566', 'Công nghệ Thông tin', 'public/uploads/teacher_avatar/IMG_1464023820.jpg', '', '', 1, '2016-06-01 03:53:45', '2016-06-01 03:53:45', NULL),
(11, 'Phạm Hồng Việt', '1980-11-30 03:54:16', 'phviet.ictu1@gmail.com', 1, 'Thạc sĩ', 1, 'CNTT', '0909098823', 'Công nghệ Thông tin', 'public/uploads/teacher_avatar/IMG_1464023850.jpg', '', '', 1, '2016-06-01 03:54:16', '2016-06-01 03:54:16', NULL),
(12, 'A', '2016-05-03 00:00:00', 'A', 1, 'D', 1, 'D', '1234567890', 'D', 'public/uploads/teacher_avatar/IMG_1462985418.jpg', 'A', 'A', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-05-12 12:52:39'),
(14, 'Nguyễn Đức Dương', '1992-11-30 03:54:58', 'ndduong.ictu1@gmail.com', 1, 'students', 1, '', '', '1', 'public/uploads/teacher_avatar/IMG_1464753298.jpg', '', '', 1, '2016-06-01 03:54:58', '2016-06-01 03:54:58', NULL),
(15, 'Tuoi Email', '2016-05-24 06:34:00', 'phamthituoi1112@gmail.com', 1, 'Sinh Viên', 1, 'CNTT', '0123456789', 'Học bài', 'public/uploads/teacher_avatar/IMG_1464762840.jpg', 'Fake User', 'This is fake', 0, '2016-06-01 06:34:00', '2016-06-01 06:34:00', NULL),
(16, 'Tươi Phạm', '1992-12-10 19:54:55', 'pttuoi.ictu@gmail.com', 1, 'Sinh vien', 1, 'CNTT', '0986237633', '', 'public/uploads/teacher_avatar/IMG_1465959295.jpg', '', '', 0, '2016-06-15 02:54:55', '2016-06-14 19:54:55', NULL),
(17, 'Tươi Phạm', '1992-12-10 22:46:33', 'lexuanthao92@gmail.com', 1, 'Sinh vien', 1, 'CNTT', '0986237633', '', 'public/uploads/teacher_avatar/IMG_1465969593.jpg', '', '', 0, '2016-06-15 05:46:33', '2016-06-14 22:46:33', NULL),
(18, 'Trần Phạm Thái Kiên', '1986-06-10 22:30:44', 'tptkien.ictu1@gmail.com', 1, 'Thạc sỹ', 1, 'CNTT', '', '', 'public/uploads/teacher_avatar/IMG_1466141444.png', '', '', 0, '2016-06-16 22:30:44', '2016-06-16 22:30:44', NULL),
(19, 'Trần Duy Minh', '1980-06-09 22:33:04', 'tdminh111@ictu.edu.vn', 1, 'Thạc sỹ', 1, 'CNTT', '', '', 'public/uploads/teacher_avatar/IMG_1466141584.png', '', '', 0, '2016-06-16 22:33:04', '2016-06-16 22:33:04', NULL),
(20, 'Vũ Văn Diện', '1984-06-04 22:33:59', 'vvdien111.ictu@gmail.com', 1, 'Thạc sỹ', 1, 'CNTT', '', '', 'public/uploads/teacher_avatar/IMG_1466141639.png', '', '', 0, '2016-06-16 22:33:59', '2016-06-16 22:33:59', NULL),
(21, 'Trần Quang Huy', '1984-06-11 22:35:28', 'tqhuy111.ictu@gmail.com', 1, 'Thạc sỹ', 1, 'CNTT', '', '', 'public/uploads/teacher_avatar/IMG_1466141728.png', '', '', 0, '2016-06-16 22:35:28', '2016-06-16 22:35:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `target` text,
  `content` text,
  `expect_result` text,
  `note` varchar(255) NOT NULL,
  `process` int(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `topic_name`, `description`, `target`, `content`, `expect_result`, `note`, `process`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Xây dựng website bán hàng trực tuyến cho cửa hàng HC Thái Nguyên', 'A', NULL, NULL, NULL, 'A', 33, '2016-05-12 08:49:16', '2016-05-14 15:21:05', NULL),
(2, 'Xây dựng website gọi món ăn trực tuyến cho chuỗi của hàng BBQ Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-12 09:52:05', '2016-05-14 16:31:08', NULL),
(3, 'Xây dựng website học tiếng anh online', '', NULL, NULL, NULL, '', 0, '2016-05-12 09:52:35', '2016-05-14 16:27:56', NULL),
(4, 'Xây dựng website quản lý cho công ty TNHH thép Bình Yên', '', NULL, NULL, NULL, '', 0, '2016-05-12 10:11:58', '2016-05-12 12:58:53', NULL),
(5, 'Xây dựng website bán hàng cho công ty TNHH Tân Phú  - Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-12 10:12:38', '2016-05-12 12:59:59', NULL),
(6, 'Xây dựng website bán hàng cho công ty TNHH thép Bình yên - Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-12 10:14:28', '2016-05-13 12:03:05', NULL),
(7, 'Xây dựng website quản lý cho công ty TNHH thép Bình Yên AAA', '', NULL, NULL, NULL, '', 0, '2016-05-15 07:03:23', '2016-05-15 07:03:23', NULL),
(8, 'Xây dựng website quản lý cho công ty TNHH thép Bình Yên AAA', '', NULL, NULL, NULL, '', 0, '2016-05-15 07:05:25', '2016-05-15 07:05:25', NULL),
(9, 'Xây dựng website quản lý cho công ty TNHH thép Bình Yên AAA', '', NULL, NULL, NULL, '', 0, '2016-05-15 07:06:10', '2016-05-15 07:06:10', NULL),
(10, 'Xây dựng website quản lý cho công ty TNHH thép Bình Yên AAA', '', NULL, NULL, NULL, '', 0, '2016-05-15 07:08:13', '2016-05-15 07:08:13', NULL),
(11, 'Xây dựng website quản lý cho công ty TNHH thép Bình Yên AAA', '', NULL, NULL, NULL, '', 0, '2016-05-15 07:12:13', '2016-05-15 07:13:11', NULL),
(12, 'Xây dựng website bán hàng cho công ty TNHH Tân Phú  - Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-20 03:51:18', '2016-05-20 03:51:18', NULL),
(13, '', '', NULL, NULL, NULL, '', 0, '2016-05-20 04:18:44', '2016-05-20 10:38:45', NULL),
(14, 'A', '', NULL, NULL, NULL, '', 0, '2016-05-20 04:34:31', '2016-05-20 04:34:31', NULL),
(15, 'Xây dựng website học tiếng anh online', '', NULL, NULL, NULL, '', 0, '2016-05-26 10:31:06', '2016-05-26 10:31:06', NULL),
(16, 'Xây dựng website học tiếng anh online', '', NULL, NULL, NULL, '', 0, '2016-05-26 10:31:30', '2016-05-26 10:31:30', NULL),
(17, 'Xây dựng website học tiếng anh online', '', NULL, NULL, NULL, '', 0, '2016-05-26 10:33:43', '2016-05-26 10:33:43', NULL),
(18, 'Xây dựng website học tiếng anh online', '', NULL, NULL, NULL, '', 0, '2016-05-26 10:35:11', '2016-05-26 10:35:11', NULL),
(19, 'Xây dựng website học tiếng anh online', '', NULL, NULL, NULL, '', 0, '2016-05-26 10:39:08', '2016-05-26 10:39:08', NULL),
(20, 'Xây dựng website học tiếng anh online123', '', 'Xây dựng phần mềm quản lý và thi trắc nghiệm trực tuyến : Chấm điểm nhanh chóng sau khi hoàn thành bài thi, hiển thị các thông báo đến người dùng, cập nhật điểm, thông tin cá nhân, đợt thi ,đề thi và câu hỏi vào CSDL trên server của hệ thống…', 'Áp dụng xây dựng hệ thống hỗ trợ quản lý kiểm tra giữa kỳ trên máy cho bộ môn Mạng & Truyền thông', '- Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n- Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng.\r\n- Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.', '', 100, '2016-05-26 10:39:42', '2016-06-15 01:25:24', NULL),
(21, 'Xây dựng website học tiếng anh online 1', '', 'target', 'content', 'result', '', 0, '2016-05-27 03:08:50', '2016-05-28 03:30:08', NULL),
(22, 'Xây dựng website quản lý cho công ty TNHH thép Bình Yên', '', NULL, NULL, NULL, '', 0, '2016-05-27 03:46:14', '2016-05-27 03:48:48', NULL),
(23, 'Xây dựng website gọi món ăn trực tuyến cho chuỗi của hàng BBQ Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 03:49:33', '2016-05-27 03:49:33', NULL),
(24, 'Xây dựng website gọi món ăn trực tuyến cho chuỗi của hàng BBQ Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 03:50:02', '2016-05-27 03:50:02', NULL),
(25, 'Xây dựng website gọi món ăn trực tuyến cho chuỗi của hàng BBQ Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 03:50:48', '2016-05-27 03:50:48', NULL),
(26, 'Xây dựng website gọi món ăn trực tuyến cho chuỗi của hàng BBQ Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 03:51:48', '2016-05-27 03:51:48', NULL),
(27, 'Xây dựng website gọi món ăn trực tuyến cho chuỗi của hàng BBQ Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 03:54:04', '2016-05-27 03:54:04', NULL),
(28, 'Xây dựng website bán hàng trực tuyến cho cửa hàng HC Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 03:59:24', '2016-05-27 03:59:24', NULL),
(29, 'Xây dựng website bán hàng cho công ty TNHH Tân Phú  - Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 04:10:08', '2016-05-27 04:10:08', NULL),
(30, 'Xây dựng website bán hàng cho công ty TNHH Tân Phú  - Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 04:18:00', '2016-05-27 04:18:00', NULL),
(31, 'Xây dựng website bán hàng cho công ty TNHH Tân Phú  - Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 04:19:42', '2016-05-27 04:19:42', NULL),
(32, 'Xây dựng website bán hàng cho công ty TNHH Tân Phú  - Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 04:21:21', '2016-05-27 04:21:21', NULL),
(33, 'Xây dựng website bán hàng trực tuyến cho cửa hàng HC Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 04:23:58', '2016-05-27 04:23:58', NULL),
(34, 'Xây dựng website gọi món ăn trực tuyến cho chuỗi của hàng BBQ Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 04:28:31', '2016-05-27 04:28:31', NULL),
(35, 'Xây dựng website gọi món ăn trực tuyến cho chuỗi của hàng BBQ Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 04:28:44', '2016-05-27 04:28:44', NULL),
(36, 'Xây dựng website gọi món ăn trực tuyến cho chuỗi của hàng BBQ Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 04:29:44', '2016-05-27 04:29:44', NULL),
(37, 'Xây dựng website gọi món ăn trực tuyến cho chuỗi của hàng BBQ Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 04:37:52', '2016-05-27 04:37:52', NULL),
(38, 'Xây dựng website gọi món ăn trực tuyến cho chuỗi của hàng BBQ Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 04:38:31', '2016-05-27 04:38:31', NULL),
(39, 'Xây dựng website quản lý cho công ty TNHH thép Bình Yên', '', '', '', '', '', 0, '2016-05-27 04:40:52', '2016-05-28 03:52:56', NULL),
(40, 'Xây dựng website bán hàng cho công ty TNHH Tân Phú  - Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 04:42:27', '2016-05-27 04:42:27', NULL),
(41, 'Xây dựng website bán hàng trực tuyến cho cửa hàng HC Thái Nguyên', '', NULL, NULL, NULL, '', 0, '2016-05-27 04:43:06', '2016-05-27 04:43:06', NULL),
(42, 'A', '', 'A', 'A', 'A', '', 0, '2016-05-27 10:17:19', '2016-05-27 10:17:19', NULL),
(43, 'A', '', 'A', 'A', 'A', '', 0, '2016-05-28 03:31:18', '2016-05-28 03:31:18', NULL),
(44, 'C', '', 'C', 'C', 'C', '', 0, '2016-05-28 04:05:16', '2016-05-28 04:05:16', NULL),
(45, 'D', '', 'D', 'D', 'D', '', 0, '2016-05-28 04:08:12', '2016-05-28 04:08:12', NULL),
(46, '', '', '', '', '', '', 0, '2016-05-30 12:59:22', '2016-05-30 12:59:22', NULL),
(47, '', '', '', '', '', '', 0, '2016-05-30 13:14:32', '2016-05-30 13:14:32', NULL),
(48, '', '', '', '', '', '', 0, '2016-05-30 13:15:32', '2016-05-30 13:15:32', NULL),
(49, 'Đề tài 1', '', '', '', '', '', 0, '2016-06-01 17:40:00', '2016-06-01 17:40:00', NULL),
(50, 'Đề tài 2', '', '', '', '', '', 0, '2016-06-01 17:40:22', '2016-06-01 17:40:22', NULL),
(51, 'Đề tài 3', '', '', '', '', '', 0, '2016-06-01 17:40:36', '2016-06-01 17:40:52', NULL),
(52, 'Đề tài 4', '', '', '', '', '', 0, '2016-06-01 17:41:10', '2016-06-01 17:41:10', NULL),
(53, 'Đề tài  5', '', '', '', '', '', 0, '2016-06-01 17:41:37', '2016-06-01 17:41:37', NULL),
(54, 'Đề tài 6', '', '', '', '', '', 0, '2016-06-01 17:41:51', '2016-06-01 17:41:51', NULL),
(55, 'Đề tài 7', '', '', '', '', '', 0, '2016-06-01 17:42:09', '2016-06-01 17:42:29', NULL),
(56, 'Đề tài 8', '', '', '', '', '', 0, '2016-06-01 17:42:50', '2016-06-01 17:42:50', NULL),
(57, 'Đề tài 9', '', '', '', '', '', 0, '2016-06-01 17:43:05', '2016-06-01 17:43:05', NULL),
(58, 'Đề tài 10', '', '', '', '', '', 0, '2016-06-01 17:43:20', '2016-06-01 17:43:20', NULL),
(59, 'F', '', '<p>F</p>\r\n', '<p>F</p>\r\n', 'F', '', 0, '2016-06-08 02:40:41', '2016-06-08 02:40:41', NULL),
(60, 'Ten de tai', '', '<p>Muc tieu</p>\r\n', '<p>Noi dung chinh</p>\r\n', 'Ket qua du kien', '', 0, '2016-06-09 02:02:06', '2016-06-09 02:02:06', NULL),
(61, 'Ten de tai', '', '<p>Mục ti&ecirc;u</p>\r\n', '<p>Nọi dung</p>\r\n', 'Kết quả', '', 0, '2016-06-09 02:29:14', '2016-06-09 02:29:14', NULL),
(62, 'Ten de tai', '', '<p>Mục ti&ecirc;u</p>\r\n', '<p>Nọi dung</p>\r\n', 'Kết quả', '', 0, '2016-06-09 02:29:58', '2016-06-09 02:29:58', NULL),
(63, 'IPv4 và IPv6', '', '<p>Mục ti&ecirc;u</p>\r\n', '<p>Nội dung ch&iacute;nh</p>\r\n', 'Kết quả', '', 0, '2016-06-10 21:16:08', '2016-06-10 21:16:08', NULL),
(64, 'Deta 1', '', '<p>Muc tieu</p>\r\n', '<p>Noi dung hcinh</p>\r\n', 'Ket qua', '', 0, '2016-06-13 21:20:53', '2016-06-13 21:20:53', NULL),
(65, 'seta1', '', '<p>Muc tieu</p>\r\n', '<p>Noi dung chinh</p>\r\n', 'Ket qua', '', 0, '2016-06-13 21:21:16', '2016-06-13 21:21:16', NULL),
(66, 'Xây dựng website tin tức cho lớp TTMMT-K12A sử dụng PHP&MySQL', '', '<p>X&acirc;y dựng website tin tức cho lớp TTMMT-K12A sử dụng PHP&amp;MySQL</p>\r\n', '<p>X&acirc;y dựng website tin tức cho lớp TTMMT-K12A sử dụng PHP&amp;MySQL</p>\r\n', 'Xây dựng website tin tức cho lớp TTMMT-K12A sử dụng PHP&MySQL', '', 100, '2016-06-16 22:45:31', '2016-06-16 22:52:49', NULL),
(67, 'Tìm hiểu quảng cáo online với Google Adsense và ứng dụng trong các hệ thống website', '', '<p>T&igrave;m hiểu quảng c&aacute;o online với Google Adsense v&agrave; ứng dụng trong c&aacute;c hệ thống website</p>\r\n', '<p>T&igrave;m hiểu quảng c&aacute;o online với Google Adsense v&agrave; ứng dụng trong c&aacute;c hệ thống website</p>\r\n', 'Báo cáo', '', 100, '2016-06-16 22:47:30', '2016-06-16 22:52:57', NULL),
(68, 'Xây dựng website tin tức cho UBND phường Đồng Quang sử dụng PHP và My SQL.', '', '<p>X&acirc;y dựng website tin tức cho UBND phường Đồng Quang sử dụng PHP v&agrave; My SQL.</p>\r\n', '<p>X&acirc;y dựng website tin tức cho UBND phường Đồng Quang sử dụng PHP v&agrave; My SQL.</p>\r\n', 'Website demo và báo cáo', '', 100, '2016-06-16 22:49:11', '2016-06-16 22:53:06', NULL),
(69, 'Thiết kế Website tin tức bóng đá', '', '<p>Thiết kế Website tin tức b&oacute;ng đ&aacute;</p>\r\n', '<p>Thiết kế Website tin tức b&oacute;ng đ&aacute;</p>\r\n', 'Website', '', 100, '2016-06-16 22:49:37', '2016-06-17 02:25:58', NULL),
(70, 'Tìm hiểu về HTML & CSS, xây dựng demo nội thất văn phòng', '', '<p>T&igrave;m hiểu về HTML &amp; CSS, x&acirc;y dựng demo nội thất văn ph&ograve;ng</p>\r\n', '<p>T&igrave;m hiểu về HTML &amp; CSS, x&acirc;y dựng demo nội thất văn ph&ograve;ng</p>\r\n', 'website demo và báo cáo', '', 100, '2016-06-16 22:49:59', '2016-06-17 02:26:08', NULL),
(71, 'Tìm hiểu công nghệ thực tại tăng cường (AR - Argumented Reality) xây dựng ứng dụng từ bộ công cụ Unity và Vufora', '', '<p>T&igrave;m hiểu c&ocirc;ng nghệ thực tại tăng cường (AR - Argumented Reality) x&acirc;y dựng ứng dụng từ bộ c&ocirc;ng cụ Unity v&agrave; Vufora</p>\r\n', '<p>T&igrave;m hiểu c&ocirc;ng nghệ thực tại tăng cường (AR - Argumented Reality) x&acirc;y dựng ứng dụng từ bộ c&ocirc;ng cụ Unity v&agrave; Vufora</p>\r\n', 'Báo cáo và chương trình demo', '', 100, '2016-06-16 22:50:35', '2016-06-17 02:26:19', NULL),
(72, 'Tìm hiểu HTML và CSS. Xây dựng Website quản lý hàng tồn kho.', '', '<p>T&igrave;m hiểu HTML v&agrave; CSS. X&acirc;y dựng Website quản l&yacute; h&agrave;ng tồn kho.</p>\r\n', '<p>T&igrave;m hiểu HTML v&agrave; CSS. X&acirc;y dựng Website quản l&yacute; h&agrave;ng tồn kho.</p>\r\n', 'Báo cáo và chương trình demo', '', 100, '2016-06-16 22:51:13', '2016-06-17 02:26:30', NULL),
(73, 'Xây dựng ứng dụng tra cứu từ điển trên HĐH Windows Phone', '', '<p>X&acirc;y dựng ứng dụng tra cứu từ điển tr&ecirc;n HĐH Windows Phone</p>\r\n', '<p>X&acirc;y dựng ứng dụng tra cứu từ điển tr&ecirc;n HĐH Windows Phone</p>\r\n', 'Báo cáo và chương trình demo', '', 100, '2016-06-16 22:51:37', '2016-06-17 02:26:42', NULL),
(74, 'Nghiên cứu quy trình Quản trị mạng doanh nghiệp và xây dựng Demo sử dụng HDH mạng Window Server 2012', '', '<p>Nghi&ecirc;n cứu quy tr&igrave;nh Quản trị mạng doanh nghiệp v&agrave; x&acirc;y dựng Demo sử dụng HDH mạng Window Server 2012</p>\r\n', '<p>Nghi&ecirc;n cứu quy tr&igrave;nh Quản trị mạng doanh nghiệp v&agrave; x&acirc;y dựng Demo sử dụng HDH mạng Window Server 2012</p>\r\n', 'Báo cáo và chương trình demo', '', 100, '2016-06-16 22:51:59', '2016-06-17 02:26:53', NULL),
(75, 'Tìm hiểu về tường lửa ISA Server 2006 và Xây dựng Demo', '', '<p>T&igrave;m hiểu về tường lửa ISA Server 2006 v&agrave; X&acirc;y dựng Demo</p>\r\n', '<p>T&igrave;m hiểu về tường lửa ISA Server 2006 v&agrave; X&acirc;y dựng Demo</p>\r\n', 'Chương trình demo và quyển báo cáo', '', 100, '2016-06-16 22:52:37', '2016-06-17 02:27:05', NULL),
(76, 'Xây dựng ứng dụng hỗ trợ quảng bá du lịch trên địa bàn tỉnh Thái Nguyên trên nền tảng Android', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-16 23:47:48', '2016-06-17 00:56:22', NULL),
(77, 'Xây dựng module quản lý công tác và phân công công việc cho website quản lý của bộ môn Mạng & Truyền thông - Khoa Công nghệ Thông tin', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em>&nbsp;Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', 'Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưở', '', 100, '2016-06-16 23:52:43', '2016-06-17 00:03:03', NULL),
(78, 'Xây dựng một số giải pháp bảo mật cho hệ thống mạng của công ty TNHH Big Digital Việt Nam sử dụng tường lửa ASA', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-16 23:59:19', '2016-06-17 00:56:38', NULL),
(79, 'Ứng dụng giải pháp bảo mật Microsoft Forefront TMG 2010 trong thiết kế mạng cho Công ty TNHH Hyundai Merchant Marine Việt Nam', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:02:45', '2016-06-17 00:04:53', NULL),
(80, 'Xây dựng website quản lý công tác đào tạo cho bộ môn Mạng & Truyền thông - khoa Công nghệ Thông tin', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:08:51', '2016-06-17 00:17:04', NULL),
(81, 'Xây dựng ứng dụng hỗ trợ theo dõi chăm sóc sức khỏe trẻ em trên Android', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip; </em></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:10:46', '2016-06-17 00:17:29', NULL),
(82, 'Xây dựng phần đặt món ăn trực tuyến HMLFOOD cho điện thoại di động trên nền tảng hệ điều hành Android', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip; </em></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:12:07', '2016-06-17 00:17:42', NULL),
(83, 'Xây dựng ứng dụng tra cứu điểm thi học phần cho trường Đại học Công nghệ Thông tin & Truyền thông trên hệ điều hành Android', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:13:43', '2016-06-17 00:17:59', NULL),
(84, 'Xây dựng phần mềm quản lý bán hàng cho doanh nghiệp tư nhân kim khí Quang Na', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:14:56', '2016-06-17 00:18:12', NULL),
(85, 'Ứng dụng mô hình điều khiển mạng SDN trong thiết kế mạng cho Công ty TNHH Thương mại dịch vụ Quốc tế Hoàng Gia', '', '<p><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống</em></p>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:16:33', '2016-06-17 00:18:24', NULL),
(86, 'Xây dựng website quản lý thực tập cho bộ môn Mạng & Truyền thông - Khoa Công nghệ Thông tin - sử dụng Laravel Framework', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:33:22', '2016-06-17 00:49:34', NULL),
(87, 'Xây dựng ứng dụng hỗ trợ quảng bá du lịch trên địa bàn tỉnh Thái Nguyên trên nền tảng Android', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:35:37', '2016-06-17 00:49:54', NULL),
(88, 'Xây dựng hệ thống giám sát dựa trên giao thức SNMP cho VNPT Phú Bình', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:37:03', '2016-06-17 00:50:36', NULL),
(89, 'Xây dựng hệ thống phân nối nội dung số cho nền tảng Android', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:39:39', '2016-06-17 00:51:01', NULL),
(90, 'Xây dựng ứng dụng quản lý shipping cho công ty vận chuyển Khánh Thịnh - Thái Nguyên', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:41:44', '2016-06-17 00:51:13', NULL),
(91, 'Xây dựng website chia sẻ tài liệu trực tuyến cho trường THPT Phú Lương - Thái Nguyên', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:42:58', '2016-06-17 00:51:23', NULL),
(92, 'Xây dựng website quản lý nhân sự cho VNPT Thái Nguyên', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng </em><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:44:59', '2016-06-17 00:51:35', NULL),
(93, 'Xây dựng ứng dụng quản lý gọi món ăn cho nhà hàng vừa và nhỏ', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng </em><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:46:47', '2016-06-17 00:51:47', NULL),
(94, 'Xây dựng chương trình luyện nói và luyện thi trắc nghiệm tiếng Trung trên nền Windows Phone', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng </em><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:48:02', '2016-06-17 00:51:59', NULL),
(95, 'Đánh giá hiệu năng của các giao thức định tuyến cho mạng Ad-hoc vô tuyến', '', '<ul>\r\n	<li><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '<ul>\r\n	<li><em>&Aacute;p dụng x&acirc;y dựng hệ thống hỗ trợ quản l&yacute; kiểm tra giữa kỳ tr&ecirc;n m&aacute;y cho bộ m&ocirc;n</em><em> Mạng &amp; Truyền th&ocirc;ng </em><em>X&acirc;ydựngphầnmềmquảnl&yacute;v&agrave;thitrắcnghiệmtrựctuyến : Chấmđiểmnhanhch&oacute;ngsaukhiho&agrave;nth&agrave;nhb&agrave;ithi, hiểnthịc&aacute;cth&ocirc;ngb&aacute;ođếnngườid&ugrave;ng, cậpnhậtđiểm, th&ocirc;ng tin c&aacute;nh&acirc;n, đợtthi ,đềthiv&agrave;c&acirc;uhỏiv&agrave;o CSDL tr&ecirc;n server củahệthống&hellip;&nbsp;</em></li>\r\n</ul>\r\n', '-	Xây dựng phần mềm được kết nối tới cơ sở dữ liệu trên server thông qua Web Service và mô hình 3 lớp giúp cho phần mềm có thể tái sử dụng dễ dàng, tính năng bảo mật cao hơn.\r\n-	Xây dựng phần mềm với giao diện tiếng Việt trong tất cả các chức năng, dễ dàng cho người sử dụng. \r\n-	Xây dựng phần quản lý người dùng trong từng loại người dùng trong hệ thống : sinh viên, giảng viên, tổ trưởng bộ môn, phòng đào tạo, quản trị hệ thống.\r\n', '', 100, '2016-06-17 00:49:14', '2016-06-17 00:52:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topic_process`
--

CREATE TABLE `topic_process` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `startdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `complete` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topic_process`
--

INSERT INTO `topic_process` (`id`, `topic_id`, `startdate`, `enddate`, `content`, `description`, `note`, `result`, `complete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2016-05-13 11:35:15', '2016-05-13 11:35:15', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 1, '2016-05-13 11:54:47', '2016-05-13 11:35:15', 'Khảo sát thực tế, phân tích  thiết kế. Xây dựng cơ sở dữ  liệu', 'Khảo sát thực tế, phân tích  thiết kế. Xây dựng cơ sở dữ  liệu', '', 'Hoàn thành nội dung cơ sở lý  thuyết, báo cáo tiến độ', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 1, '2016-05-13 11:59:25', '2016-05-26 11:35:15', 'Xây dựng hệ thống hỗ trợ  quản lý kiểm tra giữa kỳ trên  máy cho bộ môn Mạng và  Truyền Thông', 'Xây dựng hệ thống hỗ trợ  quản lý kiểm tra giữa kỳ trên  máy cho bộ môn Mạng và  Truyền Thông', 'Chưa đạt', 'Viết báo cáo, báo cáo tiến độ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 1, '2016-05-13 11:35:15', '2016-05-18 11:35:15', 'Kiểm thử hệ thống', 'Kiểm thử hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 1, '2016-05-08 11:35:15', '2016-06-04 11:35:15', 'Bảo trì hệ thống', 'Bảo trì hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 1, '2016-05-02 11:35:15', '2016-05-25 11:35:15', 'Hoàn thiện báo cáo', 'Hoàn thiện báo cáo', '', 'Nộp báo cáo', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 2, '2016-05-18 16:31:08', '2016-05-19 16:31:08', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(8, 3, '2016-05-16 16:27:56', '2016-05-31 16:27:56', 'Bảo trì hệ thống', 'Bảo trì hệ thống', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(9, 3, '2016-05-26 16:27:56', '2016-06-04 16:27:56', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 'Viết báo cáo, báo cáo tiến độ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(10, 3, '2016-05-08 16:27:56', '2016-06-03 16:27:56', 'Tìm hiểu công việc, tài liệu', 'Bảo trì hệ thống', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(11, 3, '2016-04-24 16:27:56', '2016-06-04 16:27:56', 'Bảo trì hệ thống', 'Bảo trì hệ thống', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(12, 2, '2016-05-17 16:31:08', '2016-05-28 16:31:08', 'Bảo trì hệ thống', 'Bảo trì hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(13, 11, '2016-05-23 07:13:11', '2016-06-02 07:13:11', '3', 'A', '4', 'Viết báo cáo, báo cáo tiến độ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(14, 11, '2016-05-30 07:13:11', '2016-06-04 07:13:11', 'D', '2', 'A', 'Viết báo cáo, báo cáo tiến độ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(15, 20, '2016-06-09 10:49:38', '2016-05-26 03:45:55', 'Bảo trì hệ thống', 'Bảo trì hệ thống', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 1, '2016-05-27 03:45:55', '2016-06-09 03:49:38', NULL),
(16, 20, '2016-06-15 08:25:23', '2016-05-10 03:49:10', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 'Viết đề cương chi tiết, báo  cáo tiến độ.', 1, '2016-05-27 03:49:10', '2016-06-15 01:25:23', NULL),
(17, 62, '2016-06-09 09:51:11', '2016-06-16 02:29:59', 'b', 'a', 'd', 'c', 0, '2016-06-09 02:29:59', '2016-06-09 02:51:11', '2016-06-09 02:51:11'),
(18, 62, '2016-06-09 09:51:11', '0000-00-00 00:00:00', 'f', 'e', 'h', 'g', 0, '2016-06-09 02:48:48', '2016-06-09 02:51:11', '2016-06-09 02:51:11'),
(19, 62, '2016-06-09 09:53:12', '0000-00-00 00:00:00', 'f', 'e', 'h', 'g', 0, '2016-06-09 02:49:13', '2016-06-09 02:53:12', '2016-06-09 02:53:12'),
(20, 62, '2016-06-09 09:57:56', '2016-06-16 02:52:42', 'b', 'a', 'd', 'c', 0, '2016-06-09 02:52:42', '2016-06-09 02:57:56', '2016-06-09 02:57:56'),
(21, 62, '2016-06-09 10:02:26', '2016-06-16 03:00:14', 'd', 'mo ta', 'k', 'h', 0, '2016-06-09 02:57:30', '2016-06-09 03:02:26', '2016-06-09 03:02:26'),
(22, 62, '2016-06-16 03:02:27', '2016-06-30 03:02:27', 'b', 'a', 'd', 'c', 0, '2016-06-09 03:00:54', '2016-06-09 03:02:27', NULL),
(23, 63, '2016-05-31 21:16:08', '2016-06-07 21:16:08', 'Noi dung', 'Mo ta', 'Ghi chu', 'Ket qua', 0, '2016-06-10 21:16:08', '2016-06-10 21:16:08', NULL),
(24, 63, '2016-06-14 21:16:08', '2016-06-21 21:16:08', 'Noi dung', 'Mo ta', '', 'Ket qua', 0, '2016-06-10 21:16:08', '2016-06-10 21:16:08', NULL),
(25, 63, '2016-06-21 21:16:08', '2016-07-05 21:16:08', 'Noi dung', 'Mo ta', 'GHi chu', 'Ket qua', 0, '2016-06-10 21:16:08', '2016-06-10 21:16:08', NULL),
(26, 63, '2016-05-31 21:16:08', '2016-06-07 21:16:08', 'Noi dung', 'Mo ta', 'Ghi chu', 'Ket qua', 0, '2016-06-10 21:16:08', '2016-06-10 21:16:08', NULL),
(27, 63, '2016-06-14 21:16:08', '2016-06-21 21:16:08', 'Noi dung', 'Mo ta', '', 'Ket qua', 0, '2016-06-10 21:16:08', '2016-06-10 21:16:08', NULL),
(28, 63, '2016-06-21 21:16:08', '2016-07-05 21:16:08', 'Noi dung', 'Mo ta', 'GHi chu', 'Ket qua', 0, '2016-06-10 21:16:08', '2016-06-10 21:16:08', NULL),
(29, 66, '2016-06-17 03:47:01', '2016-01-11 03:47:01', 'Nghiên cứ về PHP và MySQL', 'Nghiên cứ về PHP và MySQL', '', 'Báo cáo', 1, '2016-06-16 22:45:31', '2016-06-17 03:47:01', NULL),
(30, 66, '2016-06-17 03:47:01', '2016-02-01 03:47:01', 'Phân tích và thiết kế website', 'Phân tích và thiết kế website', '', 'Phân tích và thiết kế website', 1, '2016-06-16 22:45:32', '2016-06-17 03:47:01', NULL),
(31, 67, '2016-06-17 05:52:57', '2016-01-10 22:47:30', 'Nghiên cứ về Google Adsense', 'Nghiên cứ về Google Adsense', '', 'Báo cáo', 1, '2016-06-16 22:47:30', '2016-06-16 22:52:57', NULL),
(32, 67, '2016-06-17 05:52:57', '2016-01-31 22:47:30', 'Phân tích, đi sâu và các hướng phát triển', 'Phân tích, đi sâu và các hướng phát triển', '', 'Báo cáo', 1, '2016-06-16 22:47:30', '2016-06-16 22:52:57', NULL),
(33, 68, '2016-06-17 05:53:06', '2016-01-10 22:49:12', 'Nghiên cứu về PHP và MySQL', 'Nghiên cứu về PHP và MySQL', '', 'báo cáo', 1, '2016-06-16 22:49:12', '2016-06-16 22:53:06', NULL),
(34, 76, '2016-06-17 00:20:21', '2016-06-08 00:20:21', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-16 23:47:48', '2016-06-17 00:20:21', NULL),
(35, 76, '2016-06-17 00:20:22', '2016-06-15 00:20:22', 'Khảo sát thực tế, phân tích thiết kế. Xây dựng cơ sở dữ liệu', 'Khảo sát thực tế, phân tích thiết kế. Xây dựng cơ sở dữ liệu', '', 'Hoàn thành nội dung cơ sở lý thuyết, báo cáo tiến độ', 1, '2016-06-16 23:47:48', '2016-06-17 00:20:22', NULL),
(36, 76, '2016-06-17 00:20:22', '2016-06-22 00:20:22', 'Xây dựng hệ thống hỗ trợ quản lý kiểm tra giữa kỳ trên máy cho bộ môn Mạng và Truyền Thông', 'Xây dựng hệ thống hỗ trợ quản lý kiểm tra giữa kỳ trên máy cho bộ môn Mạng và Truyền Thông', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-16 23:47:48', '2016-06-17 00:20:22', NULL),
(37, 76, '2016-06-17 00:20:22', '2016-06-29 00:20:22', 'Kiểm thử hệ thống', 'Kiểm thử hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-16 23:47:49', '2016-06-17 00:20:22', NULL),
(38, 76, '2016-06-17 07:56:22', '2016-07-06 00:20:22', 'Bảo trì hệ thống', 'Bảo trì hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-16 23:47:49', '2016-06-17 00:56:22', NULL),
(39, 76, '2016-06-17 07:56:22', '2016-08-03 00:20:22', 'Hoàn thiện báo cáo', 'Hoàn thiện báo cáo', '', 'Nộp báo cáo', 1, '2016-06-16 23:47:49', '2016-06-17 00:56:22', NULL),
(40, 77, '2016-06-17 07:03:02', '2016-06-07 23:52:44', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-16 23:52:44', '2016-06-17 00:03:02', NULL),
(41, 77, '2016-06-17 07:03:02', '2016-06-14 23:52:45', 'Khảo sát thực tế, phân tích thiết kế. Xây dựng cơ sở dữ liệu', 'Khảo sát thực tế, phân tích thiết kế. Xây dựng cơ sở dữ liệu', '', 'Hoàn thành nội dung cơ sở lý thuyết, báo cáo tiến độ', 1, '2016-06-16 23:52:45', '2016-06-17 00:03:02', NULL),
(42, 77, '2016-06-17 07:03:03', '2016-06-21 23:52:45', 'Xây dựng hệ thống hỗ trợ quản lý kiểm tra giữa kỳ trên máy cho bộ môn Mạng và Truyền Thông', 'Xây dựng hệ thống hỗ trợ quản lý kiểm tra giữa kỳ trên máy cho bộ môn Mạng và Truyền Thông', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-16 23:52:45', '2016-06-17 00:03:03', NULL),
(43, 77, '2016-06-17 07:03:03', '2016-06-28 23:52:45', 'Kiểm thử hệ thống', 'Kiểm thử hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-16 23:52:45', '2016-06-17 00:03:03', NULL),
(44, 77, '2016-06-17 07:03:03', '2016-07-05 23:52:45', 'Bảo trì hệ thống', 'Bảo trì hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-16 23:52:45', '2016-06-17 00:03:03', NULL),
(45, 77, '2016-06-17 07:03:03', '2016-08-02 23:52:45', 'Hoàn thiện báo cáo', 'Hoàn thiện báo cáo', '', 'Nộp báo cáo', 1, '2016-06-16 23:52:45', '2016-06-17 00:03:03', NULL),
(46, 78, '2016-06-17 07:04:36', '2016-06-07 23:59:20', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-16 23:59:20', '2016-06-17 00:04:36', NULL),
(47, 78, '2016-06-17 07:04:36', '2016-06-14 23:59:20', 'Khảo sát thực tế, phân tích thiết kế. Xây dựng cơ sở dữ liệu', 'Khảo sát thực tế, phân tích thiết kế. Xây dựng cơ sở dữ liệu', '', 'Hoàn thành nội dung cơ sở lý thuyết, báo cáo tiến độ', 1, '2016-06-16 23:59:20', '2016-06-17 00:04:36', NULL),
(48, 78, '2016-06-17 07:04:36', '2016-06-21 23:59:20', 'Xây dựng hệ thống hỗ trợ quản lý kiểm tra giữa kỳ trên máy cho bộ môn Mạng và Truyền Thông', 'Xây dựng hệ thống hỗ trợ quản lý kiểm tra giữa kỳ trên máy cho bộ môn Mạng và Truyền Thông', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-16 23:59:20', '2016-06-17 00:04:36', NULL),
(49, 78, '2016-06-17 07:56:37', '2016-06-28 23:59:21', 'Kiểm thử hệ thống', 'Kiểm thử hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-16 23:59:21', '2016-06-17 00:56:37', NULL),
(50, 78, '2016-06-17 07:56:37', '2016-07-05 23:59:21', 'Bảo trì hệ thống', 'Bảo trì hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-16 23:59:21', '2016-06-17 00:56:37', NULL),
(51, 78, '2016-06-17 07:56:38', '2016-07-12 23:59:21', 'Hoàn thiện báo cáo', 'Hoàn thiện báo cáo', 'Nộp báo cáo', 'Hoàn thiện báo cáo', 1, '2016-06-16 23:59:21', '2016-06-17 00:56:38', NULL),
(52, 79, '2016-06-17 07:04:52', '2016-06-08 00:02:45', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:02:45', '2016-06-17 00:04:52', NULL),
(53, 79, '2016-06-17 07:04:52', '2016-06-15 00:02:46', 'Khảo sát thực tế, phân tích thiết kế. Xây dựng cơ sở dữ liệu', 'Khảo sát thực tế, phân tích thiết kế. Xây dựng cơ sở dữ liệu', '', 'Hoàn thành nội dung cơ sở lý thuyết, báo cáo tiến độ', 1, '2016-06-17 00:02:46', '2016-06-17 00:04:52', NULL),
(54, 79, '2016-06-17 07:04:52', '2016-06-22 00:02:46', 'Xây dựng hệ thống hỗ trợ quản lý kiểm tra giữa kỳ trên máy cho bộ môn Mạng và Truyền Thông', 'Xây dựng hệ thống hỗ trợ quản lý kiểm tra giữa kỳ trên máy cho bộ môn Mạng và Truyền Thông', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-17 00:02:46', '2016-06-17 00:04:52', NULL),
(55, 79, '2016-06-17 07:04:52', '2016-06-29 00:02:46', 'Kiểm thử hệ thống', 'Kiểm thử hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-17 00:02:46', '2016-06-17 00:04:52', NULL),
(56, 79, '2016-06-17 07:04:53', '2016-07-06 00:02:46', 'Bảo trì hệ thống', 'Bảo trì hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-17 00:02:46', '2016-06-17 00:04:53', NULL),
(57, 79, '2016-06-17 07:04:53', '2016-07-13 00:02:46', 'Hoàn thiện báo cáo', 'Hoàn thiện báo cáo', '', 'Nộp báo cáo', 1, '2016-06-17 00:02:46', '2016-06-17 00:04:53', NULL),
(58, 80, '2016-06-17 07:17:03', '2016-06-08 00:08:51', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:08:51', '2016-06-17 00:17:03', NULL),
(59, 80, '2016-06-17 07:17:04', '2016-06-16 00:08:51', 'Khảo sát thực tế, phân tích thiết kế. Xây dựng cơ sở dữ liệu', 'Khảo sát thực tế, phân tích thiết kế. Xây dựng cơ sở dữ liệu', '', 'Hoàn thành nội dung cơ sở lý thuyết, báo cáo tiến độ', 1, '2016-06-17 00:08:51', '2016-06-17 00:17:04', NULL),
(60, 80, '2016-06-17 07:17:04', '2016-06-22 00:08:51', 'Xây dựng hệ thống hỗ trợ quản lý kiểm tra giữa kỳ trên máy cho bộ môn Mạng và Truyền Thông', 'Xây dựng hệ thống hỗ trợ quản lý kiểm tra giữa kỳ trên máy cho bộ môn Mạng và Truyền Thông', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-17 00:08:51', '2016-06-17 00:17:04', NULL),
(61, 80, '2016-06-17 07:17:04', '2016-06-29 00:08:51', 'Kiểm thử hệ thống', 'Kiểm thử hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-17 00:08:51', '2016-06-17 00:17:04', NULL),
(62, 80, '2016-06-17 07:17:04', '2016-07-06 00:08:51', 'Bảo trì hệ thống', 'Bảo trì hệ thống', '', 'Viết báo cáo, báo cáo tiến độ', 1, '2016-06-17 00:08:51', '2016-06-17 00:17:04', NULL),
(63, 80, '2016-06-17 07:17:04', '2016-07-13 00:08:51', 'Hoàn thiện báo cáo', 'Hoàn thiện báo cáo', '', 'Nộp báo cáo', 1, '2016-06-17 00:08:51', '2016-06-17 00:17:04', NULL),
(64, 81, '2016-06-17 07:17:28', '2016-06-08 00:10:46', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:10:46', '2016-06-17 00:17:28', NULL),
(65, 82, '2016-06-17 07:17:42', '2016-06-08 00:12:07', 'Khảo sát thực tế, phân tích thiết kế. Xây dựng cơ sở dữ liệu', 'Khảo sát thực tế, phân tích thiết kế. Xây dựng cơ sở dữ liệu', '', 'Hoàn thành nội dung cơ sở lý thuyết, báo cáo tiến độ', 1, '2016-06-17 00:12:07', '2016-06-17 00:17:42', NULL),
(66, 83, '2016-06-17 07:17:58', '2016-06-08 00:13:43', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:13:43', '2016-06-17 00:17:58', NULL),
(67, 84, '2016-06-17 07:18:11', '2016-06-08 00:14:56', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:14:56', '2016-06-17 00:18:11', NULL),
(68, 85, '2016-06-17 07:18:23', '2016-06-08 00:16:35', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:16:35', '2016-06-17 00:18:23', NULL),
(69, 86, '2016-06-17 07:49:34', '2016-06-08 00:33:23', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:33:23', '2016-06-17 00:49:34', NULL),
(70, 87, '2016-06-17 07:49:53', '2016-06-08 00:35:37', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:35:37', '2016-06-17 00:49:53', NULL),
(71, 88, '2016-06-17 07:50:35', '2016-06-08 00:37:03', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:37:03', '2016-06-17 00:50:35', NULL),
(72, 89, '2016-06-17 07:51:01', '2016-06-08 00:39:40', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:39:40', '2016-06-17 00:51:01', NULL),
(73, 90, '2016-06-17 07:51:11', '2016-06-08 00:41:44', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:41:44', '2016-06-17 00:51:11', NULL),
(74, 91, '2016-06-17 07:51:23', '2016-06-08 00:42:59', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:42:59', '2016-06-17 00:51:23', NULL),
(75, 92, '2016-06-17 07:51:34', '2016-06-08 00:45:01', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:45:01', '2016-06-17 00:51:34', NULL),
(76, 93, '2016-06-17 07:51:47', '2016-06-08 00:46:47', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:46:47', '2016-06-17 00:51:47', NULL),
(77, 94, '2016-06-17 07:51:58', '2016-06-08 00:48:03', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:48:03', '2016-06-17 00:51:58', NULL),
(78, 95, '2016-06-17 07:52:09', '2016-06-08 00:49:15', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Viết đề cương chi tiết, báo cáo tiến độ.', 1, '2016-06-17 00:49:15', '2016-06-17 00:52:09', NULL),
(79, 69, '2016-06-17 09:25:57', '2016-06-09 02:17:34', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:13:41', '2016-06-17 02:25:57', NULL),
(80, 70, '2016-06-17 09:26:07', '2016-06-22 02:18:44', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:18:44', '2016-06-17 02:26:07', NULL),
(81, 70, '2016-06-17 09:26:08', '2016-06-15 02:18:44', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:18:44', '2016-06-17 02:26:08', NULL),
(82, 71, '2016-06-17 09:26:17', '2016-06-07 02:19:46', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:19:46', '2016-06-17 02:26:17', NULL),
(83, 71, '2016-06-17 09:26:18', '2016-06-22 02:19:47', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:19:47', '2016-06-17 02:26:18', NULL),
(84, 71, '2016-06-17 09:26:19', '2016-06-27 02:19:48', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', '', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:19:48', '2016-06-17 02:26:19', NULL),
(85, 72, '2016-06-17 09:26:29', '2016-06-24 02:20:56', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:20:56', '2016-06-17 02:26:29', NULL),
(86, 72, '2016-06-17 09:26:30', '2016-06-22 02:20:56', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:20:56', '2016-06-17 02:26:30', NULL),
(87, 72, '2016-06-17 09:26:30', '2016-07-01 02:20:56', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:20:56', '2016-06-17 02:26:30', NULL),
(88, 73, '2016-06-17 09:26:41', '2016-06-29 02:22:38', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:22:19', '2016-06-17 02:26:41', NULL),
(89, 73, '2016-06-17 09:26:42', '2016-07-07 02:22:39', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:22:20', '2016-06-17 02:26:42', NULL),
(90, 73, '2016-06-17 09:26:42', '2016-07-28 02:22:40', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:22:20', '2016-06-17 02:26:42', NULL),
(91, 73, '2016-06-17 09:26:42', '2016-08-03 02:22:40', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:22:20', '2016-06-17 02:26:42', NULL),
(92, 74, '2016-06-17 09:26:53', '2016-06-27 02:23:38', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:23:38', '2016-06-17 02:26:53', NULL),
(93, 74, '2016-06-17 09:26:53', '2016-06-30 02:23:39', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:23:39', '2016-06-17 02:26:53', NULL),
(94, 74, '2016-06-17 09:26:53', '2016-07-06 02:23:39', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:23:39', '2016-06-17 02:26:53', NULL),
(95, 75, '2016-06-17 09:27:04', '2016-07-08 02:24:24', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:24:24', '2016-06-17 02:27:04', NULL),
(96, 75, '2016-06-17 09:27:04', '2016-07-17 02:24:24', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:24:24', '2016-06-17 02:27:04', NULL),
(97, 75, '2016-06-17 09:27:05', '2016-07-26 02:24:24', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 'Tìm hiểu công việc, tài liệu', 1, '2016-06-17 02:24:24', '2016-06-17 02:27:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `group` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `remember_token`, `name`, `teacher_id`, `group`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '$2y$10$TLqsIc3Wp4q9E9tJ0meFNOazDu4kbfOZsim7HndnzgTMTjpDmHdo2', 'x1s18LJwqy54kSrGUxjrnSFw18SL61qieICe6hOaNWUUYrqFBJESHc280uWL', ' Admin', 1, 2, '2016-05-17 09:44:23', '2016-06-17 03:53:02', NULL),
(2, 'ndbinh', '$2y$10$/N53ee3VO8Mw47sNm3JHT.NqvL5rlpPcQ7F92VVOUCsP209dmZtlW', '', 'Nguyễn Đức Bình', 2, 2, '2016-05-17 09:48:13', '2016-06-01 06:24:11', NULL),
(3, 'dtmay', '$2y$10$s.VMG83iXU43A6VxkjqYfueBwua6Bcy7zfPRyjI6g0L6TPOYK/Kfq', 'fb3eti6fcKDnUHlhESqCCIwKGsbHDtyqfw1W5QENLdDDZa1UEnXf68RNhPqV', 'Dương Thu Mây', 3, 3, '2016-05-17 09:56:49', '2016-06-17 02:31:29', NULL),
(4, 'lhhiep', '$2y$10$/gipGs4Azxt8SyEwQBCN3eb8a908X5OE8/5go/xgA3Nt2DzfsFQ1W', '', 'Lê Hoàng Hiệp', 4, 3, '2016-05-17 09:58:45', '2016-06-01 06:26:06', NULL),
(5, 'tvha', '$2y$10$Um5kr38Yv5/Vne3q24ZZuepo3KYgAJ.UGCO2b7ty6woWZsfITEWAW', '', 'Trịnh Văn Hà', 5, 3, '2016-05-17 10:01:36', '2016-06-01 06:26:59', NULL),
(6, 'ntanh', '$2y$10$AemO/qwMVW6nGDJ1VzZP.OSFEcbFYfoCEL..IOxJsUmMLk1bdY2qe', '', 'Nguyễn Tuấn Anh', 6, 3, '2016-05-17 10:38:46', '2016-06-01 07:17:58', NULL),
(8, 'giaovien', '$2y$10$LJRFleQaR7bM3VWw2vOgTOU4atldFUsZEGGTRt5LLVSecnmrAgs7K', 'NF5Beae91d3TsCuQAmiXN6mdet7taCyDBfneLIx7FAJxlMvHpKkeNTuin6DQ', 'giaovien', 15, 3, '2016-05-30 16:20:58', '2016-06-17 02:03:58', NULL),
(20, 'khoa', '$2y$10$6cqETsqwutFyxsSpeIETnuwAWfrAjNoMTuFgsAprzltVStLW2NoPK', 'T4LQV0b323Arsqps0qNZ2gDRSjYEpJCQ5il3LV9fjzBnmgiS1VF4f5LFTAtH', 'KHOA', 15, 1, '2016-06-07 05:56:22', '2016-06-17 02:00:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id`, `name`, `description`, `active`, `deleted_at`) VALUES
(1, 'Khoa', 'Khoa Công nghệ thông tin', 1, NULL),
(2, 'Bộ môn', 'Bộ môn Mạng & Truyền thông', 1, NULL),
(3, 'Giảng viên', 'Giảng viên thuộc bộ môn Mạng & Truyền thông', 1, NULL),
(4, 'A', '', 0, '2016-06-09 02:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_group` int(11) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `state` int(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `id_group`, `remember_token`, `state`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '6JpkRH6LDefuIZXn8AM6V216gSChNHOFqqyDOINgyrH26J39irF65n2YceE2', 0, '2016-05-20 15:02:41', '2016-05-06 07:25:57'),
(2, 'Duong Nguyen', 'ducduongblue@gmail.com', '$2y$10$Xz8E1uStBrp3enFiBzmP8uavkOGB5x42UX7z2yeNPgwVLoJ6KKkHa', 2, '', 0, '2016-05-20 15:02:48', '2016-05-05 09:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `work_name` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `semesterid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `description` text NOT NULL,
  `notes` text NOT NULL,
  `state` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `work_name`, `year`, `semesterid`, `typeid`, `description`, `notes`, `state`, `created_at`, `updated_at`) VALUES
(1, 'test add new work form', '2015-2016', 2, 3, '', '', 1, '2016-05-11 09:13:49', '2016-05-11 09:13:49'),
(2, 'Lịch thi các môn thay thế\nđồ án K10 (2015_2016_2_đợt 4)', '2015-2016', 0, 1, '', '', 1, '2016-05-11 09:16:54', '2016-05-11 09:16:54'),
(3, 'test1', '2015-2016', 2, 2, '', '', 1, '2016-05-12 07:19:53', '2016-05-12 07:19:53'),
(4, 'khoa hoc test', '2015-2016', 2, 3, '', '', 1, '2016-05-12 07:22:01', '2016-05-12 07:22:01'),
(5, 'dfsdfsdfsdf', '2015-2016', 2, 2, '', '', 1, '2016-05-12 13:29:26', '2016-05-12 13:29:26'),
(6, 'cvbcvbcvb', '2015-2016', 2, 3, 'bcvb', '', 1, '2016-05-18 02:26:49', '2016-05-18 02:26:49'),
(7, 'fghjkljhgdsadfghjk', '2015-2016', 2, 2, '', '', 1, '2016-05-18 02:31:38', '2016-05-18 02:31:38'),
(8, 'dsfsadukjfhasdf', '2015-2016', 1, 4, '', '', 1, '2016-05-20 08:44:03', '2016-05-20 08:44:03'),
(9, 'Test Công việc đề mô', '2015-2016', 2, 2, 'Not description', 'null', 1, '2016-05-26 13:31:58', '2016-05-26 13:31:58'),
(10, 'Test ngày 26 5 2016', '2015-2016', 1, 2, '', '', 1, '2016-05-26 13:34:33', '2016-05-26 13:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `work_types`
--

CREATE TABLE `work_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_types`
--

INSERT INTO `work_types` (`id`, `type_name`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Lịch thi', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00'),
(2, 'Khảo thí', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00'),
(3, 'Khoa học', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00'),
(4, 'Thường xuyên', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00'),
(5, 'Thực tập (khác)', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00'),
(6, 'Khác', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00'),
(7, 'other', 1, '2016-04-16 17:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `startdate` date DEFAULT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id`, `year`, `startdate`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2011-2012', '2011-08-06', '', '2016-05-12 04:35:56', '2016-06-16 04:29:19', NULL),
(2, '2012-2013', '2012-08-06', '', '2016-05-10 08:14:29', '2016-06-16 04:29:32', NULL),
(3, '2013-2014', '2013-08-06', '', '2016-05-10 08:37:45', '2016-06-16 04:29:53', NULL),
(4, '2014-2015', '2014-08-06', '', '2016-05-13 04:14:21', '2016-06-16 04:30:22', NULL),
(5, '2015-2016', '2015-08-06', '', '2016-05-13 04:14:56', '2016-06-16 04:30:40', NULL),
(6, '2016-2017', '2016-08-06', '', '2016-05-13 04:15:28', '2016-06-16 04:30:56', NULL),
(7, '2017-2018', '2017-09-01', '', '2016-05-25 04:02:06', '2016-06-01 16:23:13', '2016-06-01 16:23:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigns`
--
ALTER TABLE `assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `council`
--
ALTER TABLE `council`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `council_detail`
--
ALTER TABLE `council_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `council_group`
--
ALTER TABLE `council_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doan_types`
--
ALTER TABLE `doan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intership_time`
--
ALTER TABLE `intership_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intership_type`
--
ALTER TABLE `intership_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_student_by_intershiptime`
--
ALTER TABLE `list_student_by_intershiptime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responsible`
--
ALTER TABLE `responsible`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sendfiles`
--
ALTER TABLE `sendfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_article`
--
ALTER TABLE `site_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_category`
--
ALTER TABLE `site_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_feedback`
--
ALTER TABLE `site_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_introduce`
--
ALTER TABLE `site_introduce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_notes`
--
ALTER TABLE `site_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic_process`
--
ALTER TABLE `topic_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_types`
--
ALTER TABLE `work_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assigns`
--
ALTER TABLE `assigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `council`
--
ALTER TABLE `council`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `council_detail`
--
ALTER TABLE `council_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `council_group`
--
ALTER TABLE `council_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT for table `doan_types`
--
ALTER TABLE `doan_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `intership_time`
--
ALTER TABLE `intership_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `intership_type`
--
ALTER TABLE `intership_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `list_student_by_intershiptime`
--
ALTER TABLE `list_student_by_intershiptime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `topic_process`
--
ALTER TABLE `topic_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
