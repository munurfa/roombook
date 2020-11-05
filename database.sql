-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP VIEW IF EXISTS `all_users_view`;
CREATE TABLE `all_users_view` (`ID` int(11), `email` varchar(150), `username` varchar(100), `level_id` int(11), `aktif` tinyint(1), `created_at` timestamp, `nama` varchar(100), `nama_user` varchar(100), `tgl_lahir` date, `tmp_lahir` varchar(100), `alamat` text, `phone` char(20), `no_id` char(30));


DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `booking` (`id`, `nama`, `id_user`, `id_ruang`, `deskripsi`, `start_time`, `end_time`) VALUES
(35,	'meeting pembukaan',	3,	5,	'tes',	'2020-10-07 07:00:00',	'2020-10-07 12:00:00'),
(37,	'meeting sama',	3,	5,	'coba sama',	'2020-10-07 12:00:00',	'2020-10-07 13:00:00'),
(38,	'halal bi halal',	2,	3,	'',	'2020-11-16 10:00:00',	'2020-11-18 17:00:00'),
(39,	'silaturahmi',	3,	4,	'',	'2020-11-19 12:00:00',	'2020-11-19 13:00:00'),
(41,	'makan2',	3,	5,	'',	'2020-11-17 13:00:00',	'2020-11-17 15:00:00'),
(42,	'makan2',	4,	6,	'',	'2020-11-03 12:00:00',	'2020-11-03 14:00:00');

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('5ks7v0t71iql91lk9n6tg1b0it47d6fl',	'127.0.0.1',	1604557865,	'__ci_last_regenerate|i:1604557638;'),
('i70ts2j8gobgtbghn1h7j2j43ondqrb0',	'127.0.0.1',	1604558398,	'__ci_last_regenerate|i:1604558127;masuk|b:1;ses_id|s:18:\"150855fa39e397dca8\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"3\";'),
('pop4l49geiqu2patfldfhkcrjq7l8np8',	'127.0.0.1',	1604558632,	'__ci_last_regenerate|i:1604558436;masuk|b:1;ses_id|s:18:\"150855fa39e397dca8\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"3\";'),
('1d17l430rvkics7bbkoq0f31ph3857e1',	'127.0.0.1',	1604562250,	'__ci_last_regenerate|i:1604561898;masuk|b:1;ses_id|s:18:\"150855fa39e397dca8\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"3\";'),
('ru77bajpo8inuchlr2ttqgutn0fji8jv',	'127.0.0.1',	1604562565,	'__ci_last_regenerate|i:1604562250;masuk|b:1;ses_id|s:18:\"150855fa39e397dca8\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"3\";'),
('ejha054v3ho64av7mj64mq8e7ia0c982',	'127.0.0.1',	1604562565,	'__ci_last_regenerate|i:1604562565;masuk|b:1;ses_id|s:18:\"150855fa39e397dca8\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"3\";'),
('v628sehuacjkjpj1h1adelo64eh3np9k',	'127.0.0.1',	1604562565,	'__ci_last_regenerate|i:1604562565;masuk|b:1;ses_id|s:18:\"150855fa39e397dca8\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"3\";'),
('lcusqmdas11m3pd8sk81d4r1r6gofm8f',	'127.0.0.1',	1604562849,	'__ci_last_regenerate|i:1604562565;masuk|b:1;ses_id|s:18:\"150855fa39e397dca8\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"3\";'),
('rs5enh30b4dnefas5977ei98nq2vja0q',	'127.0.0.1',	1604563184,	'__ci_last_regenerate|i:1604562907;masuk|b:1;ses_id|s:18:\"150855fa39e397dca8\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"3\";'),
('380lh2jdndl9hb1jm3nsc6mtpt1eqe6s',	'127.0.0.1',	1604563450,	'__ci_last_regenerate|i:1604563210;masuk|b:1;ses_id|s:18:\"150855fa39e397dca8\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"3\";'),
('0e0kj4io1d968lout0sj8ddcja69tkut',	'127.0.0.1',	1604563788,	'__ci_last_regenerate|i:1604563522;masuk|b:1;ses_id|s:18:\"150855fa39e397dca8\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"3\";'),
('5tas2r93buq80l40nisuec7oq9t433f6',	'127.0.0.1',	1604564235,	'__ci_last_regenerate|i:1604563958;masuk|b:1;ses_id|s:18:\"150855fa39e397dca8\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"3\";'),
('010qmo921u689cusqkfgrlqqo4sq7ano',	'127.0.0.1',	1604564803,	'__ci_last_regenerate|i:1604564515;masuk|b:1;ses_id|s:16:\"8075fa3b646be8a8\";ses_role|s:4:\"user\";ses_nama|s:5:\"user2\";ses_lumba_lumba|s:1:\"3\";'),
('c7ffer7se41dnuruvbdd9ovboj64l850',	'127.0.0.1',	1604565315,	'__ci_last_regenerate|i:1604565093;masuk|b:1;ses_id|s:18:\"239865fa3b86c3ba33\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"4\";'),
('2kfu5vk8gmnp9ua09e332hbim95jesov',	'127.0.0.1',	1604565515,	'__ci_last_regenerate|i:1604565445;masuk|b:1;ses_id|s:18:\"239865fa3b86c3ba33\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"4\";');

DROP TABLE IF EXISTS `deskripsi_users`;
CREATE TABLE `deskripsi_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmp_lahir` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `no_id` char(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `deskripsi_users` (`id`, `user_id`, `nama`, `tgl_lahir`, `tmp_lahir`, `alamat`, `phone`, `no_id`, `created_at`, `updated_at`) VALUES
(1,	1,	'Munurfa',	NULL,	NULL,	NULL,	NULL,	NULL,	'2018-08-30 07:46:53',	'2018-08-30 07:46:53'),
(2,	2,	'Admin',	'1995-09-04',	'Jakarta',	'Jakarta',	NULL,	'1321',	'2018-09-03 02:49:44',	'2018-09-03 02:49:44'),
(3,	3,	'MUHAMAD NUR FASIKHIN',	NULL,	NULL,	NULL,	NULL,	'332123',	'2018-09-07 14:27:40',	'2018-09-07 14:27:40'),
(4,	4,	'user',	NULL,	NULL,	NULL,	NULL,	'1321',	'2020-10-28 04:01:36',	'2020-10-28 04:01:36'),
(6,	6,	'user2',	NULL,	NULL,	NULL,	NULL,	'1234',	'2020-11-05 08:22:22',	'2020-11-05 08:22:22');

DROP TABLE IF EXISTS `level_users`;
CREATE TABLE `level_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `level_users` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1,	'superuserdo',	NULL,	'2018-08-30 07:18:48',	'2018-08-30 07:18:48'),
(2,	'admin',	NULL,	'2018-08-30 07:18:48',	'2018-08-30 07:18:48'),
(3,	'user',	'',	'2020-10-28 03:53:30',	'2020-10-28 03:53:30');

DROP TABLE IF EXISTS `par_event`;
CREATE TABLE `par_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `par_event` (`id`, `nama`, `start_time`, `end_time`, `deskripsi`) VALUES
(9,	'Harpitnas',	'2020-10-30 09:05:00',	'2020-10-30 17:00:00',	'cek'),
(10,	'Natal',	'2020-12-25 09:00:00',	'2020-12-28 17:00:00',	'');

DROP TABLE IF EXISTS `par_ruang`;
CREATE TABLE `par_ruang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `kategori` enum('0','1') DEFAULT '0',
  `is_special` tinyint(4) DEFAULT 0,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `par_ruang` (`id`, `nama`, `kategori`, `is_special`, `deskripsi`) VALUES
(3,	'A',	'1',	1,	'Khusus'),
(4,	'B',	'1',	0,	'Khusus '),
(5,	'C',	'0',	0,	''),
(6,	'D',	'0',	0,	''),
(7,	'E',	'0',	0,	''),
(8,	'F',	'0',	0,	''),
(9,	'G',	'0',	0,	'');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_id` int(11) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `level_id` (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `email`, `username`, `password`, `level_id`, `aktif`, `created_at`, `update_at`) VALUES
(1,	'munurfa01@gmail.com',	'munurfa',	'9d99581a90b9fb5865d850a7d4f31b2b',	1,	1,	'2018-08-30 07:46:15',	'2018-08-30 07:46:15'),
(2,	'admin@admin.com',	'admin',	'03b1c481204dde3b5409239b7840475d',	2,	1,	'2018-09-03 02:27:35',	'2018-09-03 02:27:35'),
(4,	'',	'user',	'03b1c481204dde3b5409239b7840475d',	3,	1,	'2020-10-28 04:01:36',	'2020-10-28 04:01:36'),
(6,	'user2@yopmail.com',	'user2',	'03b1c481204dde3b5409239b7840475d',	3,	1,	'2020-11-05 08:22:22',	'2020-11-05 08:22:22');

DROP TABLE IF EXISTS `all_users_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_users_view` AS select `users`.`id` AS `ID`,`users`.`email` AS `email`,`users`.`username` AS `username`,`users`.`level_id` AS `level_id`,`users`.`aktif` AS `aktif`,`users`.`created_at` AS `created_at`,`level_users`.`nama` AS `nama`,`deskripsi_users`.`nama` AS `nama_user`,`deskripsi_users`.`tgl_lahir` AS `tgl_lahir`,`deskripsi_users`.`tmp_lahir` AS `tmp_lahir`,`deskripsi_users`.`alamat` AS `alamat`,`deskripsi_users`.`phone` AS `phone`,`deskripsi_users`.`no_id` AS `no_id` from ((`users` join `level_users` on(`level_users`.`id` = `users`.`level_id`)) join `deskripsi_users` on(`deskripsi_users`.`user_id` = `users`.`id`)) where `users`.`level_id` <> 1;

-- 2020-11-05 08:39:28
