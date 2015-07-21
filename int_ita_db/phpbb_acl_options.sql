-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-07-21 01:00:38
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table int_ita_db.phpbb_acl_options
DROP TABLE IF EXISTS `phpbb_acl_options`;
CREATE TABLE IF NOT EXISTS `phpbb_acl_options` (
  `auth_option_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `auth_option` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `is_global` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_local` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `founder_only` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`auth_option_id`),
  UNIQUE KEY `auth_option` (`auth_option`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table int_ita_db.phpbb_acl_options: ~121 rows (approximately)
/*!40000 ALTER TABLE `phpbb_acl_options` DISABLE KEYS */;
INSERT INTO `phpbb_acl_options` (`auth_option_id`, `auth_option`, `is_global`, `is_local`, `founder_only`) VALUES
	(1, 'f_', 0, 1, 0),
	(2, 'f_announce', 0, 1, 0),
	(3, 'f_attach', 0, 1, 0),
	(4, 'f_bbcode', 0, 1, 0),
	(5, 'f_bump', 0, 1, 0),
	(6, 'f_delete', 0, 1, 0),
	(7, 'f_download', 0, 1, 0),
	(8, 'f_edit', 0, 1, 0),
	(9, 'f_email', 0, 1, 0),
	(10, 'f_flash', 0, 1, 0),
	(11, 'f_icons', 0, 1, 0),
	(12, 'f_ignoreflood', 0, 1, 0),
	(13, 'f_img', 0, 1, 0),
	(14, 'f_list', 0, 1, 0),
	(15, 'f_noapprove', 0, 1, 0),
	(16, 'f_poll', 0, 1, 0),
	(17, 'f_post', 0, 1, 0),
	(18, 'f_postcount', 0, 1, 0),
	(19, 'f_print', 0, 1, 0),
	(20, 'f_read', 0, 1, 0),
	(21, 'f_reply', 0, 1, 0),
	(22, 'f_report', 0, 1, 0),
	(23, 'f_search', 0, 1, 0),
	(24, 'f_sigs', 0, 1, 0),
	(25, 'f_smilies', 0, 1, 0),
	(26, 'f_sticky', 0, 1, 0),
	(27, 'f_subscribe', 0, 1, 0),
	(28, 'f_user_lock', 0, 1, 0),
	(29, 'f_vote', 0, 1, 0),
	(30, 'f_votechg', 0, 1, 0),
	(31, 'f_softdelete', 0, 1, 0),
	(32, 'm_', 1, 1, 0),
	(33, 'm_approve', 1, 1, 0),
	(34, 'm_chgposter', 1, 1, 0),
	(35, 'm_delete', 1, 1, 0),
	(36, 'm_edit', 1, 1, 0),
	(37, 'm_info', 1, 1, 0),
	(38, 'm_lock', 1, 1, 0),
	(39, 'm_merge', 1, 1, 0),
	(40, 'm_move', 1, 1, 0),
	(41, 'm_report', 1, 1, 0),
	(42, 'm_split', 1, 1, 0),
	(43, 'm_softdelete', 1, 1, 0),
	(44, 'm_ban', 1, 0, 0),
	(45, 'm_warn', 1, 0, 0),
	(46, 'a_', 1, 0, 0),
	(47, 'a_aauth', 1, 0, 0),
	(48, 'a_attach', 1, 0, 0),
	(49, 'a_authgroups', 1, 0, 0),
	(50, 'a_authusers', 1, 0, 0),
	(51, 'a_backup', 1, 0, 0),
	(52, 'a_ban', 1, 0, 0),
	(53, 'a_bbcode', 1, 0, 0),
	(54, 'a_board', 1, 0, 0),
	(55, 'a_bots', 1, 0, 0),
	(56, 'a_clearlogs', 1, 0, 0),
	(57, 'a_email', 1, 0, 0),
	(58, 'a_extensions', 1, 0, 0),
	(59, 'a_fauth', 1, 0, 0),
	(60, 'a_forum', 1, 0, 0),
	(61, 'a_forumadd', 1, 0, 0),
	(62, 'a_forumdel', 1, 0, 0),
	(63, 'a_group', 1, 0, 0),
	(64, 'a_groupadd', 1, 0, 0),
	(65, 'a_groupdel', 1, 0, 0),
	(66, 'a_icons', 1, 0, 0),
	(67, 'a_jabber', 1, 0, 0),
	(68, 'a_language', 1, 0, 0),
	(69, 'a_mauth', 1, 0, 0),
	(70, 'a_modules', 1, 0, 0),
	(71, 'a_names', 1, 0, 0),
	(72, 'a_phpinfo', 1, 0, 0),
	(73, 'a_profile', 1, 0, 0),
	(74, 'a_prune', 1, 0, 0),
	(75, 'a_ranks', 1, 0, 0),
	(76, 'a_reasons', 1, 0, 0),
	(77, 'a_roles', 1, 0, 0),
	(78, 'a_search', 1, 0, 0),
	(79, 'a_server', 1, 0, 0),
	(80, 'a_styles', 1, 0, 0),
	(81, 'a_switchperm', 1, 0, 0),
	(82, 'a_uauth', 1, 0, 0),
	(83, 'a_user', 1, 0, 0),
	(84, 'a_userdel', 1, 0, 0),
	(85, 'a_viewauth', 1, 0, 0),
	(86, 'a_viewlogs', 1, 0, 0),
	(87, 'a_words', 1, 0, 0),
	(88, 'u_', 1, 0, 0),
	(89, 'u_attach', 1, 0, 0),
	(90, 'u_chgavatar', 1, 0, 0),
	(91, 'u_chgcensors', 1, 0, 0),
	(92, 'u_chgemail', 1, 0, 0),
	(93, 'u_chggrp', 1, 0, 0),
	(94, 'u_chgname', 1, 0, 0),
	(95, 'u_chgpasswd', 1, 0, 0),
	(96, 'u_chgprofileinfo', 1, 0, 0),
	(97, 'u_download', 1, 0, 0),
	(98, 'u_hideonline', 1, 0, 0),
	(99, 'u_ignoreflood', 1, 0, 0),
	(100, 'u_masspm', 1, 0, 0),
	(101, 'u_masspm_group', 1, 0, 0),
	(102, 'u_pm_attach', 1, 0, 0),
	(103, 'u_pm_bbcode', 1, 0, 0),
	(104, 'u_pm_delete', 1, 0, 0),
	(105, 'u_pm_download', 1, 0, 0),
	(106, 'u_pm_edit', 1, 0, 0),
	(107, 'u_pm_emailpm', 1, 0, 0),
	(108, 'u_pm_flash', 1, 0, 0),
	(109, 'u_pm_forward', 1, 0, 0),
	(110, 'u_pm_img', 1, 0, 0),
	(111, 'u_pm_printpm', 1, 0, 0),
	(112, 'u_pm_smilies', 1, 0, 0),
	(113, 'u_readpm', 1, 0, 0),
	(114, 'u_savedrafts', 1, 0, 0),
	(115, 'u_search', 1, 0, 0),
	(116, 'u_sendemail', 1, 0, 0),
	(117, 'u_sendim', 1, 0, 0),
	(118, 'u_sendpm', 1, 0, 0),
	(119, 'u_sig', 1, 0, 0),
	(120, 'u_viewonline', 1, 0, 0),
	(121, 'u_viewprofile', 1, 0, 0);
/*!40000 ALTER TABLE `phpbb_acl_options` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
