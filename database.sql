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
(42,	'makan2',	4,	6,	'',	'2020-11-03 12:00:00',	'2020-11-03 14:00:00'),
(43,	'makan2',	2,	4,	'',	'2020-11-12 12:00:00',	'2020-11-12 15:00:00');

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
('2kfu5vk8gmnp9ua09e332hbim95jesov',	'127.0.0.1',	1604565515,	'__ci_last_regenerate|i:1604565445;masuk|b:1;ses_id|s:18:\"239865fa3b86c3ba33\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"4\";'),
('j5mm08n6a1337bpjdpm90o60in34llc0',	'127.0.0.1',	1604989011,	'__ci_last_regenerate|i:1604988975;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('q19hm0pq5vsnghojlmd0f81dav9q06d0',	'127.0.0.1',	1604995368,	'__ci_last_regenerate|i:1604995368;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('gtnpup2u0iplk1d16i04f2jbco37mppa',	'127.0.0.1',	1604996280,	'__ci_last_regenerate|i:1604996028;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('a73gh0jpfpoq50feulnqepnum63e1063',	'127.0.0.1',	1604996552,	'__ci_last_regenerate|i:1604996334;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('mo243jmnturp0oivn4972c35pdl14ke8',	'127.0.0.1',	1604996893,	'__ci_last_regenerate|i:1604996665;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('2bgrqh2k4ftregbqc08cnup17q4d01cr',	'127.0.0.1',	1604998142,	'__ci_last_regenerate|i:1604997844;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('o53mq1n16skf82ssats8t0f6mfjmiu36',	'127.0.0.1',	1604998450,	'__ci_last_regenerate|i:1604998152;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('lums7mtdfkjafkbcgaa51ftqrt22730h',	'127.0.0.1',	1604998519,	'__ci_last_regenerate|i:1604998455;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('li4s2nk88g20lq8842ts6q4qfl594jgb',	'127.0.0.1',	1604999278,	'__ci_last_regenerate|i:1604998998;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('vh4pv217hmtfbpf4c31ng0s56421eljm',	'127.0.0.1',	1604999899,	'__ci_last_regenerate|i:1604999624;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('ntnav8k1b153lnq0muntd5du4irjbbog',	'127.0.0.1',	1605000151,	'__ci_last_regenerate|i:1604999939;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('278jgpb365tuv7d1erhubrlqke8fq664',	'127.0.0.1',	1605000758,	'__ci_last_regenerate|i:1605000461;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('vpgm105vner3k9kgsgk99tcnck7hcn83',	'127.0.0.1',	1605001306,	'__ci_last_regenerate|i:1605001022;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('h9uaca6isalf24chs9ln4har532io1vh',	'127.0.0.1',	1605001588,	'__ci_last_regenerate|i:1605001359;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('pv80pi6qddm4tv3gr7u28cqrhej6gse1',	'127.0.0.1',	1605001938,	'__ci_last_regenerate|i:1605001688;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('fm47n0shtlgicv48c0dqm66uip91bkoh',	'127.0.0.1',	1605002336,	'__ci_last_regenerate|i:1605002056;masuk|b:1;ses_id|s:17:\"90785faa30532b4bf\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('osun5sgn1gor56tjor8t5r3lpvdopr2u',	'127.0.0.1',	1605016069,	'__ci_last_regenerate|i:1605016047;masuk|b:1;ses_id|s:18:\"224835faa99fa47537\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"4\";'),
('52recp89iip0l8ks8giou5s9hbgc6cgo',	'127.0.0.1',	1605021386,	'__ci_last_regenerate|i:1605021131;masuk|b:1;ses_id|s:18:\"224835faa99fa47537\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"4\";'),
('0048lmndemvnmam96tmsfs7el2sl3m09',	'127.0.0.1',	1605021560,	'__ci_last_regenerate|i:1605021537;masuk|b:1;ses_id|s:18:\"224835faa99fa47537\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"4\";'),
('pge2nm8861ja9fva2vtgocd4dnr43887',	'127.0.0.1',	1605022446,	'__ci_last_regenerate|i:1605022004;masuk|b:1;ses_id|s:18:\"224835faa99fa47537\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"4\";'),
('a6cnnd7gpsgg4dtjngrmmqbmjv6pevt3',	'127.0.0.1',	1605023126,	'__ci_last_regenerate|i:1605022893;masuk|b:1;ses_id|s:18:\"224835faa99fa47537\";ses_role|s:4:\"user\";ses_nama|s:4:\"user\";ses_lumba_lumba|s:1:\"4\";'),
('nd3il47p6p7f3vqt2papg9r1qt8gqu1v',	'127.0.0.1',	1605071617,	'__ci_last_regenerate|i:1605071617;'),
('iphhp3k95figrqgvvm4n7ulpkcfnd367',	'127.0.0.1',	1605071814,	'__ci_last_regenerate|i:1605071617;masuk|b:1;ses_id|s:17:\"59505fab731ab2129\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('sf0d6qd7bti0bamdt550orgvu62j5jmb',	'127.0.0.1',	1605072212,	'__ci_last_regenerate|i:1605072017;masuk|b:1;ses_id|s:17:\"59505fab731ab2129\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('gt3eqcgj29ioo9h84rf7mvlmvodg62nh',	'127.0.0.1',	1605072693,	'__ci_last_regenerate|i:1605072634;masuk|b:1;ses_id|s:17:\"59505fab731ab2129\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('gp113c9rnlq7v009tpn6qkodcotc9aai',	'127.0.0.1',	1605073239,	'__ci_last_regenerate|i:1605072951;masuk|b:1;ses_id|s:17:\"59505fab731ab2129\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('k01anits2c0r6l9odtj9oogus8mlcg4u',	'127.0.0.1',	1605073548,	'__ci_last_regenerate|i:1605073258;masuk|b:1;ses_id|s:17:\"59505fab731ab2129\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('0ce4peh92epjnpikaon0jqi6qq768t4e',	'127.0.0.1',	1605073687,	'__ci_last_regenerate|i:1605073575;masuk|b:1;ses_id|s:17:\"59505fab731ab2129\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";'),
('pn9e2a3eb7gmt9gapots2pf3mvaotj10',	'127.0.0.1',	1605080420,	'__ci_last_regenerate|i:1605080161;masuk|b:1;ses_id|s:17:\"59505fab731ab2129\";ses_role|s:5:\"admin\";ses_nama|s:5:\"Admin\";ses_lumba_lumba|s:1:\"2\";');

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

DROP TABLE IF EXISTS `fasilitas_ruang`;
CREATE TABLE `fasilitas_ruang` (
  `id_ruang` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `fasilitas_ruang` (`id_ruang`, `id_fasilitas`) VALUES
(3,	1),
(3,	2),
(4,	1),
(4,	2),
(5,	1),
(6,	2);

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

DROP TABLE IF EXISTS `par_fasilitas`;
CREATE TABLE `par_fasilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `is_aktif` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `par_fasilitas` (`id`, `nama`, `deskripsi`, `is_aktif`) VALUES
(1,	'Air COndition (AC)',	'',	1),
(2,	'Proyektor',	'',	1);

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

-- 2020-11-11 07:42:11
