-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2021 at 02:47 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `lname` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `username` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `username`, `password`) VALUES
(1, 'حامد', 'اکبرزاده', '123', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(111) NOT NULL,
  `user` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `date` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `count` int(111) NOT NULL,
  `color` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `state` int(111) NOT NULL,
  `code` int(11) NOT NULL,
  `r_code` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=491 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `id_product`, `user`, `date`, `count`, `color`, `state`, `code`, `r_code`) VALUES
(467, 92, 'hmd@gmail.com', '8 آبان 00', 1, '2', 1, 3817896, '6060956'),
(461, 93, 'hmd@gmail.com', '8 آبان 00', 3, '3', 1, 4204853, '5287503'),
(460, 92, 'hmd@gmail.com', '8 آبان 00', 3, '4', 1, 4204853, '9132063'),
(466, 93, 'hmd@gmail.com', '8 آبان 00', 3, '5', 1, 3817896, '1362501'),
(468, 106, 'hmd@gmail.com', '8 آبان 00', 1, '1', 1, 2426584, '8628320'),
(490, 92, 'hmd@gmail.com', '14 آبان 00', 6, '48', 1, 4684241, '1730357'),
(469, 91, 'hmd@gmail.com', '8 آبان 00', 1, '15', 1, 7638608, '7664951'),
(489, 92, 'hmd@gmail.com', '14 آبان 00', 1, '1', 1, 3991721, '9772122'),
(486, 97, 'hmd@gmail.com', '10 آبان 00', 1, '2', 1, 7288969, '1987870');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

DROP TABLE IF EXISTS `cat`;
CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `subcat` int(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `name`, `subcat`) VALUES
(31, 'ملامینه', 0),
(32, 'mdf نوین شرق ', 0),
(33, 'ملامینه سفید', 31),
(34, 'mdf رنگی', 32),
(35, 'نوپان', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `province_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=441 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `province_id`, `name`) VALUES
(1, 1, 'تبريز'),
(2, 1, 'كندوان'),
(3, 1, 'بندر شرفخانه'),
(4, 1, 'مراغه'),
(5, 1, 'ميانه'),
(6, 1, 'شبستر'),
(7, 1, 'مرند'),
(8, 1, 'جلفا'),
(9, 1, 'سراب'),
(10, 1, 'هاديشهر'),
(11, 1, 'بناب'),
(12, 1, 'كليبر'),
(13, 1, 'تسوج'),
(14, 1, 'اهر'),
(15, 1, 'هريس'),
(16, 1, 'عجبشير'),
(17, 1, 'هشترود'),
(18, 1, 'ملكان'),
(19, 1, 'بستان آباد'),
(20, 1, 'ورزقان'),
(21, 1, 'اسكو'),
(22, 1, 'آذر شهر'),
(23, 1, 'قره آغاج'),
(24, 1, 'ممقان'),
(25, 1, 'صوفیان'),
(26, 1, 'ایلخچی'),
(27, 1, 'خسروشهر'),
(28, 1, 'باسمنج'),
(29, 1, 'سهند'),
(30, 2, 'اروميه'),
(31, 2, 'نقده'),
(32, 2, 'ماكو'),
(33, 2, 'تكاب'),
(34, 2, 'خوي'),
(35, 2, 'مهاباد'),
(36, 2, 'سر دشت'),
(37, 2, 'چالدران'),
(38, 2, 'بوكان'),
(39, 2, 'مياندوآب'),
(40, 2, 'سلماس'),
(41, 2, 'شاهين دژ'),
(42, 2, 'پيرانشهر'),
(43, 2, 'سيه چشمه'),
(44, 2, 'اشنويه'),
(45, 2, 'چایپاره'),
(46, 2, 'پلدشت'),
(47, 2, 'شوط'),
(48, 3, 'اردبيل'),
(49, 3, 'سرعين'),
(50, 3, 'بيله سوار'),
(51, 3, 'پارس آباد'),
(52, 3, 'خلخال'),
(53, 3, 'مشگين شهر'),
(54, 3, 'مغان'),
(55, 3, 'نمين'),
(56, 3, 'نير'),
(57, 3, 'كوثر'),
(58, 3, 'كيوي'),
(59, 3, 'گرمي'),
(60, 4, 'اصفهان'),
(61, 4, 'فريدن'),
(62, 4, 'فريدون شهر'),
(63, 4, 'فلاورجان'),
(64, 4, 'گلپايگان'),
(65, 4, 'دهاقان'),
(66, 4, 'نطنز'),
(67, 4, 'نايين'),
(68, 4, 'تيران'),
(69, 4, 'كاشان'),
(70, 4, 'فولاد شهر'),
(71, 4, 'اردستان'),
(72, 4, 'سميرم'),
(73, 4, 'درچه'),
(74, 4, 'کوهپایه'),
(75, 4, 'مباركه'),
(76, 4, 'شهرضا'),
(77, 4, 'خميني شهر'),
(78, 4, 'شاهين شهر'),
(79, 4, 'نجف آباد'),
(80, 4, 'دولت آباد'),
(81, 4, 'زرين شهر'),
(82, 4, 'آران و بيدگل'),
(83, 4, 'باغ بهادران'),
(84, 4, 'خوانسار'),
(85, 4, 'مهردشت'),
(86, 4, 'علويجه'),
(87, 4, 'عسگران'),
(88, 4, 'نهضت آباد'),
(89, 4, 'حاجي آباد'),
(90, 4, 'تودشک'),
(91, 4, 'ورزنه'),
(92, 5, 'ايلام'),
(93, 5, 'مهران'),
(94, 5, 'دهلران'),
(95, 5, 'آبدانان'),
(96, 5, 'شيروان چرداول'),
(97, 5, 'دره شهر'),
(98, 5, 'ايوان'),
(99, 5, 'سرابله'),
(100, 6, 'بوشهر'),
(101, 6, 'تنگستان'),
(102, 6, 'دشتستان'),
(103, 6, 'دير'),
(104, 6, 'ديلم'),
(105, 6, 'كنگان'),
(106, 6, 'گناوه'),
(107, 6, 'ريشهر'),
(108, 6, 'دشتي'),
(109, 6, 'خورموج'),
(110, 6, 'اهرم'),
(111, 6, 'برازجان'),
(112, 6, 'خارك'),
(113, 6, 'جم'),
(114, 6, 'کاکی'),
(115, 6, 'عسلویه'),
(116, 6, 'بردخون'),
(117, 7, 'تهران'),
(118, 7, 'ورامين'),
(119, 7, 'فيروزكوه'),
(120, 7, 'ري'),
(121, 7, 'دماوند'),
(122, 7, 'اسلامشهر'),
(123, 7, 'رودهن'),
(124, 7, 'لواسان'),
(125, 7, 'بومهن'),
(126, 7, 'تجريش'),
(127, 7, 'فشم'),
(128, 7, 'كهريزك'),
(129, 7, 'پاكدشت'),
(130, 7, 'چهاردانگه'),
(131, 7, 'شريف آباد'),
(132, 7, 'قرچك'),
(133, 7, 'باقرشهر'),
(134, 7, 'شهريار'),
(135, 7, 'رباط كريم'),
(136, 7, 'قدس'),
(137, 7, 'ملارد'),
(138, 8, 'شهركرد'),
(139, 8, 'فارسان'),
(140, 8, 'بروجن'),
(141, 8, 'چلگرد'),
(142, 8, 'اردل'),
(143, 8, 'لردگان'),
(144, 8, 'سامان'),
(145, 9, 'قائن'),
(146, 9, 'فردوس'),
(147, 9, 'بيرجند'),
(148, 9, 'نهبندان'),
(149, 9, 'سربيشه'),
(150, 9, 'طبس مسینا'),
(151, 9, 'قهستان'),
(152, 9, 'درمیان'),
(153, 10, 'مشهد'),
(154, 10, 'نيشابور'),
(155, 10, 'سبزوار'),
(156, 10, 'كاشمر'),
(157, 10, 'گناباد'),
(158, 10, 'طبس'),
(159, 10, 'تربت حيدريه'),
(160, 10, 'خواف'),
(161, 10, 'تربت جام'),
(162, 10, 'تايباد'),
(163, 10, 'قوچان'),
(164, 10, 'سرخس'),
(165, 10, 'بردسكن'),
(166, 10, 'فريمان'),
(167, 10, 'چناران'),
(168, 10, 'درگز'),
(169, 10, 'كلات'),
(170, 10, 'طرقبه'),
(171, 10, 'سر ولایت'),
(172, 11, 'بجنورد'),
(173, 11, 'اسفراين'),
(174, 11, 'جاجرم'),
(175, 11, 'شيروان'),
(176, 11, 'آشخانه'),
(177, 11, 'گرمه'),
(178, 11, 'ساروج'),
(179, 12, 'اهواز'),
(180, 12, 'ايرانشهر'),
(181, 12, 'شوش'),
(182, 12, 'آبادان'),
(183, 12, 'خرمشهر'),
(184, 12, 'مسجد سليمان'),
(185, 12, 'ايذه'),
(186, 12, 'شوشتر'),
(187, 12, 'انديمشك'),
(188, 12, 'سوسنگرد'),
(189, 12, 'هويزه'),
(190, 12, 'دزفول'),
(191, 12, 'شادگان'),
(192, 12, 'بندر ماهشهر'),
(193, 12, 'بندر امام خميني'),
(194, 12, 'اميديه'),
(195, 12, 'بهبهان'),
(196, 12, 'رامهرمز'),
(197, 12, 'باغ ملك'),
(198, 12, 'هنديجان'),
(199, 12, 'لالي'),
(200, 12, 'رامشیر'),
(201, 12, 'حمیدیه'),
(202, 12, 'دغاغله'),
(203, 12, 'ملاثانی'),
(204, 12, 'شادگان'),
(205, 12, 'ویسی'),
(206, 13, 'زنجان'),
(207, 13, 'ابهر'),
(208, 13, 'خدابنده'),
(209, 13, 'كارم'),
(210, 13, 'ماهنشان'),
(211, 13, 'خرمدره'),
(212, 13, 'ايجرود'),
(213, 13, 'زرين آباد'),
(214, 13, 'آب بر'),
(215, 13, 'قيدار'),
(216, 14, 'سمنان'),
(217, 14, 'شاهرود'),
(218, 14, 'گرمسار'),
(219, 14, 'ايوانكي'),
(220, 14, 'دامغان'),
(221, 14, 'بسطام'),
(222, 15, 'زاهدان'),
(223, 15, 'چابهار'),
(224, 15, 'خاش'),
(225, 15, 'سراوان'),
(226, 15, 'زابل'),
(227, 15, 'سرباز'),
(228, 15, 'نيكشهر'),
(229, 15, 'ايرانشهر'),
(230, 15, 'راسك'),
(231, 15, 'ميرجاوه'),
(232, 16, 'شيراز'),
(233, 16, 'اقليد'),
(234, 16, 'داراب'),
(235, 16, 'فسا'),
(236, 16, 'مرودشت'),
(237, 16, 'خرم بيد'),
(238, 16, 'آباده'),
(239, 16, 'كازرون'),
(240, 16, 'ممسني'),
(241, 16, 'سپيدان'),
(242, 16, 'لار'),
(243, 16, 'فيروز آباد'),
(244, 16, 'جهرم'),
(245, 16, 'ني ريز'),
(246, 16, 'استهبان'),
(247, 16, 'لامرد'),
(248, 16, 'مهر'),
(249, 16, 'حاجي آباد'),
(250, 16, 'نورآباد'),
(251, 16, 'اردكان'),
(252, 16, 'صفاشهر'),
(253, 16, 'ارسنجان'),
(254, 16, 'قيروكارزين'),
(255, 16, 'سوريان'),
(256, 16, 'فراشبند'),
(257, 16, 'سروستان'),
(258, 16, 'ارژن'),
(259, 16, 'گويم'),
(260, 16, 'داريون'),
(261, 16, 'زرقان'),
(262, 16, 'خان زنیان'),
(263, 16, 'کوار'),
(264, 16, 'ده بید'),
(265, 16, 'باب انار/خفر'),
(266, 16, 'بوانات'),
(267, 16, 'خرامه'),
(268, 16, 'خنج'),
(269, 16, 'سیاخ دارنگون'),
(270, 17, 'قزوين'),
(271, 17, 'تاكستان'),
(272, 17, 'آبيك'),
(273, 17, 'بوئين زهرا'),
(274, 18, 'قم'),
(275, 19, 'طالقان'),
(276, 19, 'نظرآباد'),
(277, 19, 'اشتهارد'),
(278, 19, 'هشتگرد'),
(279, 19, 'كن'),
(280, 19, 'آسارا'),
(281, 19, 'شهرک گلستان'),
(282, 19, 'اندیشه'),
(283, 19, 'كرج'),
(284, 19, 'نظر آباد'),
(285, 19, 'گوهردشت'),
(286, 19, 'ماهدشت'),
(287, 19, 'مشکین دشت'),
(288, 20, 'سنندج'),
(289, 20, 'ديواندره'),
(290, 20, 'بانه'),
(291, 20, 'بيجار'),
(292, 20, 'سقز'),
(293, 20, 'كامياران'),
(294, 20, 'قروه'),
(295, 20, 'مريوان'),
(296, 20, 'صلوات آباد'),
(297, 20, 'حسن آباد'),
(298, 21, 'كرمان'),
(299, 21, 'راور'),
(300, 21, 'بابك'),
(301, 21, 'انار'),
(302, 21, 'کوهبنان'),
(303, 21, 'رفسنجان'),
(304, 21, 'بافت'),
(305, 21, 'سيرجان'),
(306, 21, 'كهنوج'),
(307, 21, 'زرند'),
(308, 21, 'بم'),
(309, 21, 'جيرفت'),
(310, 21, 'بردسير'),
(311, 22, 'كرمانشاه'),
(312, 22, 'اسلام آباد غرب'),
(313, 22, 'سر پل ذهاب'),
(314, 22, 'كنگاور'),
(315, 22, 'سنقر'),
(316, 22, 'قصر شيرين'),
(317, 22, 'گيلان غرب'),
(318, 22, 'هرسين'),
(319, 22, 'صحنه'),
(320, 22, 'پاوه'),
(321, 22, 'جوانرود'),
(322, 22, 'شاهو'),
(323, 23, 'ياسوج'),
(324, 23, 'گچساران'),
(325, 23, 'دنا'),
(326, 23, 'دوگنبدان'),
(327, 23, 'سي سخت'),
(328, 23, 'دهدشت'),
(329, 23, 'ليكك'),
(330, 24, 'گرگان'),
(331, 24, 'آق قلا'),
(332, 24, 'گنبد كاووس'),
(333, 24, 'علي آباد كتول'),
(334, 24, 'مينو دشت'),
(335, 24, 'تركمن'),
(336, 24, 'كردكوي'),
(337, 24, 'بندر گز'),
(338, 24, 'كلاله'),
(339, 24, 'آزاد شهر'),
(340, 24, 'راميان'),
(341, 25, 'رشت'),
(342, 25, 'منجيل'),
(343, 25, 'لنگرود'),
(344, 25, 'رود سر'),
(345, 25, 'تالش'),
(346, 25, 'آستارا'),
(347, 25, 'ماسوله'),
(348, 25, 'آستانه اشرفيه'),
(349, 25, 'رودبار'),
(350, 25, 'فومن'),
(351, 25, 'صومعه سرا'),
(352, 25, 'بندرانزلي'),
(353, 25, 'كلاچاي'),
(354, 25, 'هشتپر'),
(355, 25, 'رضوان شهر'),
(356, 25, 'ماسال'),
(357, 25, 'شفت'),
(358, 25, 'سياهكل'),
(359, 25, 'املش'),
(360, 25, 'لاهیجان'),
(361, 25, 'خشک بيجار'),
(362, 25, 'خمام'),
(363, 25, 'لشت نشا'),
(364, 25, 'بندر کياشهر'),
(365, 26, 'خرم آباد'),
(366, 26, 'ماهشهر'),
(367, 26, 'دزفول'),
(368, 26, 'بروجرد'),
(369, 26, 'دورود'),
(370, 26, 'اليگودرز'),
(371, 26, 'ازنا'),
(372, 26, 'نور آباد'),
(373, 26, 'كوهدشت'),
(374, 26, 'الشتر'),
(375, 26, 'پلدختر'),
(376, 27, 'ساري'),
(377, 27, 'آمل'),
(378, 27, 'بابل'),
(379, 27, 'بابلسر'),
(380, 27, 'بهشهر'),
(381, 27, 'تنكابن'),
(382, 27, 'جويبار'),
(383, 27, 'چالوس'),
(384, 27, 'رامسر'),
(385, 27, 'سواد كوه'),
(386, 27, 'قائم شهر'),
(387, 27, 'نكا'),
(388, 27, 'نور'),
(389, 27, 'بلده'),
(390, 27, 'نوشهر'),
(391, 27, 'پل سفيد'),
(392, 27, 'محمود آباد'),
(393, 27, 'فريدون كنار'),
(394, 28, 'اراك'),
(395, 28, 'آشتيان'),
(396, 28, 'تفرش'),
(397, 28, 'خمين'),
(398, 28, 'دليجان'),
(399, 28, 'ساوه'),
(400, 28, 'سربند'),
(401, 28, 'محلات'),
(402, 28, 'شازند'),
(403, 29, 'بندرعباس'),
(404, 29, 'قشم'),
(405, 29, 'كيش'),
(406, 29, 'بندر لنگه'),
(407, 29, 'بستك'),
(408, 29, 'حاجي آباد'),
(409, 29, 'دهبارز'),
(410, 29, 'انگهران'),
(411, 29, 'ميناب'),
(412, 29, 'ابوموسي'),
(413, 29, 'بندر جاسك'),
(414, 29, 'تنب بزرگ'),
(415, 29, 'بندر خمیر'),
(416, 29, 'پارسیان'),
(417, 29, 'قشم'),
(418, 30, 'همدان'),
(419, 30, 'ملاير'),
(420, 30, 'تويسركان'),
(421, 30, 'نهاوند'),
(422, 30, 'كبودر اهنگ'),
(423, 30, 'رزن'),
(424, 30, 'اسدآباد'),
(425, 30, 'بهار'),
(426, 31, 'يزد'),
(427, 31, 'تفت'),
(428, 31, 'اردكان'),
(429, 31, 'ابركوه'),
(430, 31, 'ميبد'),
(431, 31, 'طبس'),
(432, 31, 'بافق'),
(433, 31, 'مهريز'),
(434, 31, 'اشكذر'),
(435, 31, 'هرات'),
(436, 31, 'خضرآباد'),
(437, 31, 'شاهديه'),
(438, 31, 'حمیدیه شهر'),
(439, 31, 'سید میرزا'),
(440, 31, 'زارچ');

-- --------------------------------------------------------

--
-- Table structure for table `color_categories`
--

DROP TABLE IF EXISTS `color_categories`;
CREATE TABLE IF NOT EXISTS `color_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_color` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `name_color` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `color_categories`
--

INSERT INTO `color_categories` (`id`, `code_color`, `name_color`) VALUES
(1, '300', 'سفید'),
(2, '301', 'بیاض مش'),
(3, '302', 'ونگه'),
(4, '303', 'بلی اتریش'),
(5, '305', 'لارکس'),
(6, '307', 'آتلانتیک مـشه'),
(7, '309', 'آنتیک دارک'),
(8, '310', 'آنتیک لایت'),
(9, '311', 'لیون'),
(10, '312', 'والنات'),
(11, '313', 'باران سفید'),
(12, '314', 'باران مشکی'),
(13, '315', 'رافیا کرم'),
(14, '316', 'رافیا قهوه'),
(15, '317', 'اُک مشه'),
(16, '318', 'اُک قهـوه'),
(17, '319', 'قرمز'),
(18, '321', 'آنتیک گردو 1'),
(19, '322', 'آنتیک کاج'),
(20, '325', 'ویکتوریا روشن'),
(21, '330', 'آسپن طلایی'),
(22, '331', 'بیاض اریک'),
(23, '322', 'نیو والنات'),
(24, '334', 'آنتیک گردو 2'),
(25, '338', 'ماهگونی'),
(26, '339', 'نقره متالیک'),
(27, '340', 'کرم'),
(28, '341', 'کرم روس'),
(29, '342', 'قهوه روس'),
(30, '347', 'آنتیک طلایی'),
(31, '349', 'زرد'),
(32, '350', 'پرتقالی'),
(33, '352', 'میلانو'),
(34, '353', 'سبز'),
(35, '356', 'نیو جویز 30'),
(36, '357', 'ویکتوریا تیره'),
(37, '358', 'کاترینا 1'),
(38, '359', 'کاترینا 2'),
(39, '360', 'قهوه جنگل'),
(40, '361', 'آسپینا'),
(41, '362', 'اُک کاج'),
(42, '363', 'نقره کاج'),
(43, '366', 'آچیک جویز'),
(44, '368', 'آبی کاربنی'),
(45, '369', 'لیلا'),
(46, '371', 'سوئیس الم روشن'),
(47, '372', 'سوئیس الم تیره'),
(48, '373', 'گردویی کلاسیک'),
(49, '374', 'مالدیو'),
(50, '375', 'سفید متالیک'),
(51, '376', 'قهوه متالیک'),
(52, '377', 'کاپوچیـنو متالیک'),
(53, '378', 'کرم متالیک'),
(54, '380', 'کتان روشن'),
(55, '381', 'کتان تیره'),
(56, '382', 'لیون روشن'),
(57, '383', 'لیون تیره'),
(58, '384', 'والیس'),
(59, '386', 'لایت جنگل'),
(60, '387', 'روتانا جنگل'),
(61, '389', 'پاین سفید'),
(62, '390', 'مونستر 1'),
(63, '391', 'مونستر 2'),
(64, '392', 'لاین'),
(65, '393', 'زبرا گردویی'),
(66, 'G410', 'جین سفید'),
(67, 'G411', 'جین آبی'),
(68, 'G412', 'جین قهوه ای'),
(69, 'G413', 'آچیک فندق'),
(70, 'G414', 'قهوه فندق'),
(71, 'G415', 'دیزاین 1'),
(72, 'G416', 'دیزاین 2'),
(73, 'G417', 'گردویی زیبا'),
(74, 'G418', 'کلیف سفید'),
(75, 'G419', 'کلیف کرم'),
(76, 'G420', 'کلیف قهوهای'),
(77, 'G421', 'اورگون جویز'),
(78, 'G422', 'گردویی 36'),
(79, 'G423', 'آبی پتینه'),
(80, 'G424', 'گردویی نوین'),
(81, 'G425', 'گردویی پرموج'),
(82, 'G427', 'صورتی باربی'),
(83, 'صورتی باربی', 'آبی فیروزهای'),
(84, 'G429', 'کنیون روشن'),
(85, 'G430', 'کنیون تیره'),
(86, 'G431', 'تویست روشن'),
(87, 'G432', 'تویست تیره'),
(88, 'G433', 'سوملااُک'),
(89, 'G434', 'آفزلیا'),
(90, 'G435', 'کادبوری'),
(91, 'G436', 'سیبیولارچ'),
(92, 'G437', 'فاستونی 1'),
(93, 'G438', 'فاستونی 2'),
(94, 'G439', 'تویست سفید'),
(95, 'G440', 'موکتی روشن'),
(96, 'G441', 'موکتی تیره'),
(97, 'G442', 'اطلس 1'),
(98, 'G443', 'اطلس 2'),
(99, 'G444', 'اش 1'),
(100, 'G445', 'اش 2'),
(101, 'G446', 'شرابی'),
(102, 'G447', 'سفید طلایی'),
(103, '01A', 'فوق برجسته سپریما'),
(104, '02A', 'فوق برجسته سپریما'),
(105, '03A', 'فوق برجسته سپریما'),
(106, '04A', 'فوق برجسته سپریما'),
(107, '05A', 'فوق برجسته سپریما'),
(108, '12B', 'فوق برجسته سپریما'),
(109, '13B', 'فوق برجسته سپریما'),
(110, '14B', 'فوق برجسته سپریما'),
(111, '15B', 'فوق برجسته سپریما'),
(112, '16B', 'فوق برجسته سپریما'),
(113, '17B', 'فوق برجسته سپریما'),
(114, '22C', 'فوق برجسته سپریما'),
(115, '23C', 'فوق برجسته سپریما'),
(116, '24C', 'فوق برجسته سپریما'),
(117, '26C', 'فوق برجسته سپریما'),
(118, '27C', 'فوق برجسته سپریما');

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

DROP TABLE IF EXISTS `color_product`;
CREATE TABLE IF NOT EXISTS `color_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(111) NOT NULL,
  `color_id` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`id`, `id_product`, `color_id`) VALUES
(1, 108, '100'),
(2, 108, '101'),
(3, 108, '102'),
(4, 108, '84'),
(5, 108, '1'),
(6, 108, '1'),
(7, 108, '2'),
(8, 108, '3'),
(9, 108, '4'),
(78, 98, '11'),
(77, 98, '10'),
(76, 98, '9'),
(75, 98, '1'),
(88, 93, '3'),
(87, 93, '1'),
(71, 92, '3'),
(70, 92, '2'),
(69, 92, '1'),
(79, 98, '12'),
(80, 98, '13'),
(86, 90, '5'),
(85, 90, '4'),
(83, 90, '3'),
(84, 90, '4'),
(89, 93, '36'),
(90, 93, '37'),
(91, 93, '38'),
(92, 93, '39'),
(93, 93, '71'),
(94, 93, '72'),
(95, 93, '73'),
(96, 91, '3'),
(97, 91, '4'),
(98, 91, '5'),
(99, 91, '6'),
(100, 92, '41'),
(101, 92, '42'),
(102, 92, '43'),
(103, 92, '47'),
(104, 92, '48');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(1111) COLLATE utf8mb4_persian_ci NOT NULL,
  `email` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `address` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `phone`, `email`, `address`) VALUES
(9, '09331434614', 'h.wow2002@gmail.com', 'خیابان ایت الله عبادی');

-- --------------------------------------------------------

--
-- Table structure for table `cut_order`
--

DROP TABLE IF EXISTS `cut_order`;
CREATE TABLE IF NOT EXISTS `cut_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_basket` int(250) DEFAULT NULL,
  `user` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `count` varchar(250) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `width` varchar(250) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `height` varchar(250) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `fa_width` varchar(250) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `fa_height` varchar(250) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `na_width` varchar(250) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `na_height` varchar(250) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `image_cnc` text COLLATE utf8mb4_persian_ci,
  `comment_cnc` text COLLATE utf8mb4_persian_ci,
  `use_cnc` int(2) DEFAULT NULL,
  `r_code` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `cut_order`
--

INSERT INTO `cut_order` (`id`, `id_basket`, `user`, `count`, `width`, `height`, `fa_width`, `fa_height`, `na_width`, `na_height`, `image_cnc`, `comment_cnc`, `use_cnc`, `r_code`) VALUES
(105, 460, 'hmd@gmail.com', '3', '100', '200', '4', '5', '', '', '', '', NULL, '9132063'),
(106, 461, 'hmd@gmail.com', '2', '2', '2', '2', '2', '', '', '', '', NULL, '5287503'),
(104, 460, 'hmd@gmail.com', '3', '111', '222', '2', '1', '', '', 'images/cnc/cncad9a1b785aad1699278a5dee6d188bb82.jpg', 'تمیز در بیاد', 1, '9132063'),
(107, 461, 'hmd@gmail.com', '11', '11', '111', '11', '1', '', '', 'images/cnc/cnc838bda01f6246dd4e0bf4204ab39d3211.jpg', 'nice', 1, '5287503'),
(114, 466, 'hmd@gmail.com', '1', '100', '200', '2', '1', '', '', '', '', NULL, '1362501'),
(115, 466, 'hmd@gmail.com', '4', '400', '400', '4', '4', '', '', 'images/cnc/cncb73cac51ad8e361c95dd18d7fd07dc16b.png', 'com on', 1, '1362501'),
(116, 469, 'hmd@gmail.com', '11', '11', '11', '11', '1', '1', '', 'images/cnc/cncf5b030c0c3fe8e05c2b8ca6cc4880a71l.png', 'سریع و زود اماده بشود و طبق عکس باشد', 1, '7664951'),
(117, 469, 'hmd@gmail.com', '22', '222', '222', '2', '2', '', '', '', '', NULL, '7664951'),
(118, 469, 'hmd@gmail.com', '3', '333', '333', '3', '3', '', '', 'images/cnc/cncda290da82f7a2db00ae58352890b68872.jpg', 'مو نزنه با عکس ها', 1, '7664951'),
(119, 469, 'hmd@gmail.com', '44', '444', '444', '4', '4', '', '', '', '', NULL, '7664951'),
(166, 490, 'hmd@gmail.com', '3', '333', '33', '2', '1', '', '', 'images/cnc/cnc11122.jpg', '', 1, '1730357'),
(167, 490, 'hmd@gmail.com', '', '', '', '', '', '', '', 'images/cnc/cnc10833.png', '', 1, '1730357'),
(168, 490, 'hmd@gmail.com', '', '', '', '', '', '', '', 'images/cnc/cnc1251636122120star noob.png', '', 1, '1730357'),
(164, 490, 'hmd@gmail.com', '1', '1111', '1222', '1', '1', '', '', 'images/cnc/cnc22.jpg0.75782200 16361219182.jpg', 'سریع', 1, '1730357'),
(165, 490, 'hmd@gmail.com', '3', '333', '344', '3', '2', '', '', 'images/cnc/cnc163612201211.jpg', 'fast', 1, '1730357'),
(163, 490, 'hmd@gmail.com', '3', '150', '400', '2', '1', '', '', 'images/cnc/cncfcba3c87a9bbef7b0a95b0614d9ccd8b1.jpg', 'رنگش تیره باشد', 1, '1730357'),
(156, NULL, 'hmd@gmail.com', '2', '100', '150', '', '', '2', '3', '', 'fast and forius', 1, '9772122'),
(155, NULL, 'hmd@gmail.com', '50', '300', '200', '1', '3', '', '', '', 'fast', 1, '9772122'),
(154, 486, 'hmd@gmail.com', '1', '11', '1', '', '1', '11', '', '', '', NULL, '1987870');

-- --------------------------------------------------------

--
-- Table structure for table `email_news`
--

DROP TABLE IF EXISTS `email_news`;
CREATE TABLE IF NOT EXISTS `email_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `email_news`
--

INSERT INTO `email_news` (`id`, `user`, `email`) VALUES
(1, 'hmd@gmail.com', 'email'),
(2, 'hmd@gmail.com', 'ضصث'),
(3, 'hmd@gmail.com', '@'),
(4, 'hmd@gmail.com', 'صث'),
(5, 'hmd@gmail.com', 'we'),
(6, 'hmd@gmail.com', 'asd@gmail.com'),
(7, 'hmd@gmail.com', 'h.wow2002@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

DROP TABLE IF EXISTS `information`;
CREATE TABLE IF NOT EXISTS `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `answer` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `id_product` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `question`, `answer`, `id_product`) VALUES
(32, 'جنس لباس', 'کتون', '107'),
(33, 'مدل', 'زنانه', '107'),
(31, 'رذ', 'شسی', '107'),
(28, 'رنگ ', 'سفید', '91'),
(27, 'جنس', 'ملامینه', '91'),
(26, 'اندازه', '2 متر', '97'),
(25, 'مدل', 'جدید', '97');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in_city` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `out_city` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `in_city`, `out_city`) VALUES
(1, '50000', '140000');

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

DROP TABLE IF EXISTS `order_user`;
CREATE TABLE IF NOT EXISTS `order_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(1111) COLLATE utf8mb4_persian_ci NOT NULL,
  `fname` varchar(1111) COLLATE utf8mb4_persian_ci NOT NULL,
  `lname` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `cname` varchar(1111) COLLATE utf8mb4_persian_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_persian_ci NOT NULL,
  `email` varchar(111) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_persian_ci NOT NULL,
  `address` text COLLATE utf8mb4_persian_ci NOT NULL,
  `province` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `city` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `code_post` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `code_meli` int(11) NOT NULL,
  `Code_Follow` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `date` varchar(222) COLLATE utf8mb4_persian_ci NOT NULL,
  `state` int(2) NOT NULL,
  `state_admin` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `order_user`
--

INSERT INTO `order_user` (`id`, `user`, `fname`, `lname`, `cname`, `phone`, `email`, `comment`, `address`, `province`, `city`, `code_post`, `code_meli`, `Code_Follow`, `date`, `state`, `state_admin`) VALUES
(39, 'hmd@gmail.com', 'علی ', 'علوی', '', '09123456789', 'h@gmail.com', '', 'هند', '11', '172', '09123213', 0, '3817896', '8 آبان 00', 0, 0),
(38, 'hmd@gmail.com', 'hamed gol', 'DR', 'HmD', '09331434614', 'hwow110@gmail.com', '', 'california', '10', '153', '091415123', 0, '2426584', '8 آبان 00', 0, 0),
(33, 'hmd@gmail.com', 'احمد', 'احمدی', 'ahmd', '09331434614', 'ahmad@gmail.com', '', 'ahmad abad', '10', '153', '093145143', 0, '4204853', '8 آبان 00', 0, 1),
(40, 'hmd@gmail.com', 'حمید', 'حمیدی', '', '09123456789', 'hamid@gmail.com', '', 'احمد اباد', '8', '138', '09121312411', 0, '7638608', '8 آبان 00', 0, 0),
(41, 'hmd@gmail.com', 'حسن', 'حسنی', '', '09123456789', '', '', 'حسن آباد', '12', '179', '09213124213', 916677888, '7288969', '11 آبان 00', 0, 0),
(42, 'hmd@gmail.com', 'Nima', 'nadali', 'ناکو', '09151114422', '', '', 'emamat', '10', '153', '0912341232', 912321764, '3991721', '14 آبان 00', 0, 0),
(43, 'hmd@gmail.com', 'احمد', 'نورالهی', '', '09123456789', '', '', 'تهران', '13', '206', '09213123', 912312541, '4684241', '14 آبان 00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `price` int(111) NOT NULL,
  `discount` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `select` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `explanation_mini` text COLLATE utf8mb4_persian_ci,
  `explanation_All` text COLLATE utf8mb4_persian_ci,
  `images` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `date` varchar(222) COLLATE utf8mb4_persian_ci NOT NULL,
  `count_product` int(11) NOT NULL,
  `Exclusive` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `discount`, `select`, `explanation_mini`, `explanation_All`, `images`, `date`, `count_product`, `Exclusive`) VALUES
(91, 'ملامینه سفید', 120000, '10000', '33', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است', '<p style=\"text-align: right;\"><span style=\"color:rgb(33, 37, 41); font-family:iransans; font-size:14.4px\">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز</span></p>\r\n', 'images/productf698635dc8b6d6d74802414d49f6252al.jpg', '24 مرداد 00', 5, 1),
(90, 'mdf سفید', 340000, '20000', '34', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است', '<p style=\"text-align: right;\"><span style=\"color:rgb(33, 37, 41); font-family:iransans; font-size:14.4px\"><span style=\"font-family:courier new,courier,monospace\">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت</span> چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</span></p>\r\n', 'images/product85d3f49dc0fe7782f97c6d681fb92c62).jpg', '24 مرداد 00', 5, 1),
(92, 'mdf جدید', 350000, '30000', '34', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است', '<p><span style=\"color:rgb(33, 37, 41); font-family:iransans; font-size:14.4px\">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</span></p>\r\n', 'images/product2e636bfd1b31c3dcbfe2f934c450447al.jpg', '24 مرداد 00', 7, 1),
(93, 'mdf رده', 540000, '360000', '34', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است', '<p><span style=\"color:rgb(33, 37, 41); font-family:iransans; font-size:14.4px\">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</span></p>\r\n', 'images/productfced736bb2b6f242e9120531225783dd).jpg', '24 مرداد 00', 34000, 1),
(94, 'ملامینه جدید', 540000, '20000', '33', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است', '<p><span style=\"color:rgb(33, 37, 41); font-family:iransans; font-size:14.4px\">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</span></p>\r\n', 'images/productf7f942a99faf769b30264b7398b5cbd9l.jpg', '24 مرداد 00', 10, 1),
(95, 'mdf قهوه ای سوخته', 500000, '40000', '34', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است', '<p><span style=\"color:rgb(33, 37, 41); font-family:iransans; font-size:14.4px\">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده</span></p>\r\n', 'images/productf51cfd84631849f48e5a901309be4367l.jpg', '24 مرداد 00', 14, 1),
(96, 'ملامینه جدید', 620000, '10000', '33', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجل', '<p><span style=\"color:rgb(33, 37, 41); font-family:iransans; font-size:14.4px\">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده</span></p>\r\n', 'images/product7a132caa1b8bcd6498293d63921e849al.jpg', '24 مرداد 00', 55, 1),
(98, 'ملامینه', 230000, '20000', '33', 'good', '<p>good</p>\r\n', 'images/product355d7280441c634393f1efa1226c2dce).jpg', '24 مرداد 00', 23, 1),
(97, 'mdf', 450000, '40000', '34', 'good', '<h1 style=\"text-align: center;\">good</h1>\r\n', 'images/productf6386e4084d61b1e4eb3352462c0868el.jpg', '24 مرداد 00', 80, 1),
(103, 'صضث', 123, '123', '33', '213', '<p>123</p>\r\n', 'images/product4b891b5e34c7c544c6e9c90ece2e7265l.jpg', '29 مرداد 00', 2, 0),
(104, 'wq', 123, '123', '33', '13', '<p>23</p>\r\n', 'images/product8c2aaf9a76e0cb910a9ddd5e6c372868l.jpg', '24 مرداد 00', 123, 1),
(102, 'ewr', 324, '34', '33', '34', '<p>34</p>\r\n', 'images/product97bc6d6b15c177cef6ebcabe9590297fl.jpg', '24 مرداد 00', 33, 0),
(108, '12', 12, '1212', '33', '12q', '<p>wqe</p>\r\n', 'images/productc703586974bd451b44435ce0a88b4c1e1.png', '13 آبان 00', 21, 0),
(106, 'نوپان', 400000, '25000', '34', 'عالی', '<p>عالی</p>\r\n', 'images/product4d9c41c0d552f175ef2fc8babdd1f989).jpg', '27 مرداد 00', 22, 1),
(107, 'شلوار', 123, '4564', '33', 'wqe', '<p>123</p>\r\n', 'images/product6cf6f5d0622159118a8b3374681c126f1.png', '28 مهر 00', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'آذربايجان شرقي'),
(2, 'آذربايجان غربي'),
(3, 'اردبيل'),
(4, 'اصفهان'),
(5, 'ايلام'),
(6, 'بوشهر'),
(7, 'تهران'),
(8, 'چهارمحال بختياري'),
(9, 'خراسان جنوبي'),
(10, 'خراسان رضوي'),
(11, 'خراسان شمالي'),
(12, 'خوزستان'),
(13, 'زنجان'),
(14, 'سمنان'),
(15, 'سيستان و بلوچستان'),
(16, 'فارس'),
(17, 'قزوين'),
(18, 'قم'),
(19, 'کرج'),
(20, 'كردستان'),
(21, 'كرمان'),
(22, 'كرمانشاه'),
(23, 'كهكيلويه و بويراحمد'),
(24, 'گلستان'),
(25, 'گيلان'),
(26, 'لرستان'),
(27, 'مازندران'),
(28, 'مركزي'),
(29, 'هرمزگان'),
(30, 'همدان'),
(31, 'يزد');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `select` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `state` int(111) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `select`, `state`) VALUES
(25, 'mdf', '34', 1),
(26, 'ملامینه', '33', 2),
(27, 'hi', '33', 3);

-- --------------------------------------------------------

--
-- Table structure for table `slider_banner`
--

DROP TABLE IF EXISTS `slider_banner`;
CREATE TABLE IF NOT EXISTS `slider_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mini_txt` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `title_txt` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `mini_explanation` text COLLATE utf8mb4_persian_ci NOT NULL,
  `images` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `cat_collection` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `number` int(11) NOT NULL,
  `which_slider` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `slider_banner`
--

INSERT INTO `slider_banner` (`id`, `mini_txt`, `title_txt`, `mini_explanation`, `images`, `cat_collection`, `number`, `which_slider`) VALUES
(31, 'کالکشن جدید 2', 'مجموعه مبلمان', '50% تخفیف', 'images/banner6a0b7975cb3e88f97373e95d563e46518.jpg', '34', 2, 1),
(32, 'کالکشن جدید 3', 'مجموعه صندلی های چوبی', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه.', 'images/bannere9030ab71c885adadc9955d24b1fc7997.jpg', '33', 3, 1),
(30, 'کالکشن جدید', 'مجموعه مبلمان جدید', '40% تخفیف', 'images/bannerf697d2c8e88bf224829a026a156bfde95.jpg', '33', 1, 1),
(29, 'کالکشن جدید', 'مجموعه صندلی های چوبی', '37% تخفیف', 'images/bannerc39ad81a4572c37f0d775560354038e37.jpg', '34', 2, 2),
(28, 'کالکشن جدید', 'مجموعه مبلمان جدید', '40% تخفیف', 'images/banner6d3afb33de0a59dc729b6b68d4fd1d7b2.jpg', '33', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `lname` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `email` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `register_date` varchar(22) COLLATE utf8mb4_persian_ci NOT NULL,
  `state` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=200 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `phone`, `register_date`, `state`) VALUES
(198, 'hamedsdsdsdsssd', 'akbarzadh', 'h.wowi@gmail.com', '202cb962ac59075b964b07152d234b70', 9, '7 آبان 00', 1),
(191, 'hamed', 'akbarzadh', 'hmd@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '1 آبان 00', 0),
(192, 'hamed', 'akbarzadh', 'hmewrd@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '1 آبان 00', 0),
(193, 'hamed', 'akbarzadh', 'hmdwow132@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '1 آبان 00', 0),
(194, 'hamed', 'akbarzadh', 'hwow132@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '1 آبان 00', 0),
(195, 'hamed', 'akbarzadh', 'hmdd@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '1 آبان 00', 0),
(196, 'hamed', 'akbarzadh', 'hmmd@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '1 آبان 00', 0),
(199, 'hamed', 'akbarzadh', 'hwwooww@gmail.com', 'efa0967579098e83252667290fc67ef8', 0, '9 آبان 00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `vote` text COLLATE utf8mb4_persian_ci NOT NULL,
  `email` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `star_rating` int(5) NOT NULL,
  `date` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `id_product` varchar(111) COLLATE utf8mb4_persian_ci NOT NULL,
  `state` int(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `name`, `vote`, `email`, `star_rating`, `date`, `id_product`, `state`) VALUES
(79, 'hamed akbarzadh', 'qwewqe', 'h.wow2002@gmail.com', 1, '29 مرداد 00', '94', 1),
(80, '213', '12312', 'h.wow2002@gmail.com', 5, '29 مرداد 00', '98', 1),
(78, 'hamed akbarzadh', 'qwe', 'h.wow2002@gmail.com', 4, '29 مرداد 00', '94', 1),
(73, 'hamed akbarzadh', 'عالی', 'h.wow2002@gmail.com', 5, '26 مرداد 00', '91', 1),
(75, 'hamed akbarzadh', 'عالی هست', 'h.wow2002@gmail.com', 4, '27 مرداد 00', '91', 1),
(76, 'hamed akbarzadh', 'بد', 'h.wow2002@gmail.com', 1, '27 مرداد 00', '91', 1),
(77, 'hamed akbarzadh', 'asd', 'h.wow2002@gmail.com', 4, '29 مرداد 00', '96', 1),
(81, '213', '12312', 'h.wow2002@gmail.com', 4, '29 مرداد 00', '98', 1),
(82, 'hamed akbarzadh', 'wqe', 'h.wow2002@gmail.com', 5, '29 مرداد 00', '104', 1),
(83, 'hamed akbarzadh', 'wqe', 'h.wow2002@gmail.com', 5, '29 مرداد 00', '104', 1),
(85, 'hamed akbarzadh', 'شصث', 'h.wow2002@gmail.com', 4, '28 مهر 00', '107', 1),
(86, 'hamed akbarzadh', 'سب', 'h.wow2002@gmail.com', 1, '28 مهر 00', '107', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
