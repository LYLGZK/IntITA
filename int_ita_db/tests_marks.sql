-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-08-01 11:46:00
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table int_ita_db.tests_marks
DROP TABLE IF EXISTS `tests_marks`;
CREATE TABLE IF NOT EXISTS `tests_marks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `id_test` int(10) NOT NULL,
  `mark` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tests_marks_user` (`id_user`),
  KEY `FK_tests_marks_tests` (`id_test`),
  CONSTRAINT `FK_tests_marks_tests` FOREIGN KEY (`id_test`) REFERENCES `tests` (`id`),
  CONSTRAINT `FK_tests_marks_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8 COMMENT='mark: 0 - failed, 1 - success';

-- Dumping data for table int_ita_db.tests_marks: ~226 rows (approximately)
/*!40000 ALTER TABLE `tests_marks` DISABLE KEYS */;
INSERT INTO `tests_marks` (`id`, `id_user`, `id_test`, `mark`) VALUES
	(14, 51, 35, 1),
	(15, 51, 35, 1),
	(16, 51, 35, 1),
	(17, 51, 35, 1),
	(18, 51, 35, 0),
	(19, 51, 35, 0),
	(20, 51, 35, 1),
	(21, 51, 35, 0),
	(22, 51, 35, 1),
	(23, 51, 36, 0),
	(24, 51, 36, 1),
	(25, 51, 36, 1),
	(26, 51, 36, 1),
	(27, 51, 36, 0),
	(28, 51, 36, 1),
	(29, 51, 36, 1),
	(30, 51, 36, 1),
	(31, 51, 36, 1),
	(32, 51, 36, 1),
	(33, 51, 36, 1),
	(34, 51, 36, 1),
	(35, 51, 36, 0),
	(36, 51, 36, 0),
	(37, 51, 36, 1),
	(38, 51, 35, 1),
	(39, 51, 35, 1),
	(40, 51, 35, 1),
	(41, 51, 35, 0),
	(42, 51, 36, 1),
	(43, 51, 35, 1),
	(44, 51, 35, 0),
	(45, 51, 36, 1),
	(46, 51, 35, 1),
	(47, 51, 35, 1),
	(48, 51, 35, 0),
	(49, 51, 35, 1),
	(50, 51, 36, 1),
	(51, 51, 36, 0),
	(52, 56, 38, 1),
	(53, 56, 38, 0),
	(54, 56, 38, 1),
	(55, 56, 38, 0),
	(56, 121, 41, 1),
	(57, 121, 42, 1),
	(58, 121, 42, 1),
	(59, 121, 42, 0),
	(60, 121, 42, 1),
	(61, 121, 42, 1),
	(62, 121, 42, 0),
	(63, 121, 41, 0),
	(64, 121, 41, 0),
	(65, 121, 45, 1),
	(66, 121, 45, 1),
	(67, 121, 45, 1),
	(68, 121, 52, 0),
	(69, 121, 52, 0),
	(70, 121, 52, 0),
	(71, 121, 52, 0),
	(72, 121, 52, 0),
	(73, 121, 52, 0),
	(74, 121, 53, 1),
	(75, 121, 53, 1),
	(76, 121, 53, 1),
	(77, 121, 53, 1),
	(78, 121, 54, 0),
	(79, 121, 54, 0),
	(80, 121, 54, 1),
	(81, 121, 53, 1),
	(82, 121, 53, 1),
	(83, 121, 56, 0),
	(84, 121, 56, 0),
	(85, 121, 56, 0),
	(86, 121, 59, 0),
	(87, 121, 59, 0),
	(88, 121, 59, 0),
	(89, 121, 59, 0),
	(90, 121, 59, 0),
	(91, 121, 59, 0),
	(92, 121, 61, 1),
	(93, 121, 61, 1),
	(94, 121, 61, 0),
	(95, 121, 61, 0),
	(96, 121, 61, 0),
	(97, 121, 61, 0),
	(98, 121, 61, 1),
	(99, 121, 62, 0),
	(100, 121, 62, 0),
	(101, 121, 62, 0),
	(102, 121, 62, 0),
	(103, 51, 57, 1),
	(104, 51, 57, 0),
	(105, 51, 58, 0),
	(106, 51, 58, 1),
	(107, 51, 58, 0),
	(108, 121, 55, 0),
	(109, 121, 55, 0),
	(110, 121, 55, 1),
	(111, 121, 56, 0),
	(112, 121, 41, 0),
	(113, 51, 41, 1),
	(114, 51, 41, 0),
	(115, 51, 41, 0),
	(116, 51, 45, 1),
	(117, 51, 53, 1),
	(118, 51, 53, 1),
	(119, 51, 53, 1),
	(120, 51, 55, 0),
	(121, 51, 39, 0),
	(122, 51, 63, 0),
	(123, 51, 63, 0),
	(124, 51, 63, 1),
	(125, 51, 63, 0),
	(126, 51, 63, 0),
	(127, 51, 56, 0),
	(128, 51, 56, 0),
	(129, 51, 56, 0),
	(130, 51, 56, 0),
	(131, 51, 56, 0),
	(132, 51, 56, 0),
	(133, 45, 48, 1),
	(134, 45, 49, 0),
	(135, 45, 51, 0),
	(136, 45, 50, 1),
	(137, 45, 48, 1),
	(138, 45, 48, 1),
	(139, 45, 49, 0),
	(140, 45, 48, 1),
	(141, 51, 39, 0),
	(142, 51, 74, 1),
	(143, 51, 48, 1),
	(144, 51, 48, 1),
	(145, 51, 49, 1),
	(146, 51, 50, 1),
	(147, 51, 51, 1),
	(148, 51, 51, 0),
	(149, 51, 64, 1),
	(150, 51, 65, 0),
	(151, 51, 66, 1),
	(152, 51, 67, 1),
	(153, 51, 69, 1),
	(154, 51, 48, 1),
	(155, 51, 49, 0),
	(156, 51, 41, 0),
	(157, 51, 41, 0),
	(158, 51, 42, 0),
	(159, 51, 42, 0),
	(160, 51, 42, 0),
	(161, 51, 41, 0),
	(162, 22, 81, 1),
	(163, 22, 82, 0),
	(164, 22, 82, 0),
	(165, 22, 82, 0),
	(166, 22, 83, 0),
	(167, 22, 83, 0),
	(168, 22, 48, 1),
	(169, 22, 49, 1),
	(170, 22, 51, 1),
	(171, 56, 87, 1),
	(172, 56, 87, 0),
	(173, 56, 87, 0),
	(174, 51, 56, 0),
	(175, 51, 56, 0),
	(176, 51, 56, 0),
	(177, 51, 56, 0),
	(178, 51, 56, 0),
	(179, 51, 88, 0),
	(180, 51, 89, 1),
	(181, 51, 89, 1),
	(182, 51, 89, 1),
	(183, 51, 89, 0),
	(184, 51, 89, 1),
	(185, 51, 90, 1),
	(186, 51, 90, 1),
	(187, 51, 90, 1),
	(188, 22, 91, 1),
	(189, 51, 73, 1),
	(190, 51, 102, 1),
	(191, 51, 102, 1),
	(192, 51, 102, 1),
	(193, 22, 98, 0),
	(194, 22, 99, 1),
	(195, 22, 100, 1),
	(196, 22, 98, 0),
	(197, 22, 101, 0),
	(198, 51, 81, 1),
	(199, 129, 107, 1),
	(200, 129, 108, 1),
	(201, 129, 109, 1),
	(202, 129, 110, 0),
	(203, 129, 111, 0),
	(204, 51, 116, 1),
	(205, 51, 39, 0),
	(210, 51, 74, 0),
	(211, 51, 39, 0),
	(212, 51, 75, 0),
	(217, 51, 76, 0),
	(218, 51, 76, 1),
	(219, 51, 76, 0),
	(220, 51, 118, 0),
	(221, 51, 118, 0),
	(222, 51, 118, 0),
	(223, 51, 56, 1),
	(224, 51, 56, 0),
	(225, 51, 56, 0),
	(226, 51, 56, 1),
	(227, 51, 122, 1),
	(228, 51, 122, 1),
	(229, 51, 122, 1),
	(230, 51, 122, 0),
	(231, 51, 122, 0),
	(232, 51, 123, 1),
	(233, 51, 123, 0),
	(234, 51, 123, 0),
	(235, 51, 123, 0),
	(236, 51, 59, 0),
	(237, 51, 59, 0),
	(238, 51, 59, 0),
	(239, 51, 53, 1),
	(240, 51, 55, 0),
	(241, 51, 53, 1),
	(242, 51, 53, 1),
	(243, 51, 42, 0),
	(244, 51, 42, 1),
	(245, 51, 39, 0),
	(246, 129, 124, 1),
	(247, 45, 51, 1);
/*!40000 ALTER TABLE `tests_marks` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
