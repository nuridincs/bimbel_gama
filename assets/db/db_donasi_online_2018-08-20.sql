# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Database: db_donasi_online
# Generation Time: 2018-08-20 06:36:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table app_bank
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_bank`;

CREATE TABLE `app_bank` (
  `id` char(50) NOT NULL DEFAULT '',
  `nama_pemilik` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rekening` int(30) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_bank` WRITE;
/*!40000 ALTER TABLE `app_bank` DISABLE KEYS */;

INSERT INTO `app_bank` (`id`, `nama_pemilik`, `nama_bank`, `no_rekening`, `status`)
VALUES
	('003','Yayasan pecintan anak yatim','BCA',123424324,1),
	('004','Yayasan pecintan anak yatim','Mandiri',987798989,0);

/*!40000 ALTER TABLE `app_bank` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_donatur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_donatur`;

CREATE TABLE `app_donatur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` char(100) DEFAULT NULL,
  `email` char(100) DEFAULT NULL,
  `no_telpon` char(100) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `nama_kegiatan` char(100) DEFAULT NULL,
  `deskripsi` char(100) DEFAULT NULL,
  `image` char(100) DEFAULT NULL,
  `target_dana` int(20) DEFAULT NULL,
  `unix_id` char(11) DEFAULT NULL,
  `id_bank_transfer` char(11) DEFAULT NULL,
  `konfirmasi` int(11) DEFAULT '0',
  `bukti_donasi` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_donatur` WRITE;
/*!40000 ALTER TABLE `app_donatur` DISABLE KEYS */;

INSERT INTO `app_donatur` (`id`, `nama_lengkap`, `email`, `no_telpon`, `id_kegiatan`, `nama_kegiatan`, `deskripsi`, `image`, `target_dana`, `unix_id`, `id_bank_transfer`, `konfirmasi`, `bukti_donasi`, `created_at`)
VALUES
	(1,'hendrik rismawan','hendrik@gmail.com','081223459873',1,'bukber pay 2018','bukber pay 2018 bersama 500++ anak yatim','bukber.jpg',150000000,'374','003',0,NULL,'2018-07-01 14:00:00'),
	(2,'agustria','agustria12@gmail.com','081943242343',3,'mangroving pay 2018','mangroving bersama 100++ anak yatim','event2.jpg',100000000,'375','003',0,NULL,'2018-07-02 14:00:00');

/*!40000 ALTER TABLE `app_donatur` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_kegiatan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_kegiatan`;

CREATE TABLE `app_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(225) DEFAULT NULL,
  `deskripsi` text,
  `image` varchar(100) DEFAULT NULL,
  `target_dana` int(11) DEFAULT NULL,
  `unix_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_kegiatan` WRITE;
/*!40000 ALTER TABLE `app_kegiatan` DISABLE KEYS */;

INSERT INTO `app_kegiatan` (`id`, `nama_kegiatan`, `deskripsi`, `image`, `target_dana`, `unix_id`, `start_date`, `end_date`)
VALUES
	(1,'buker pay 2018','bukber pay bersama 500++ anak yatim','event1.jpg',170000000,374,'2018-02-01','2018-06-25'),
	(3,'mangroving pay 2018','mangroving bersama 100++ anak yatim','event2.jpg',100000000,375,'2018-03-01','2018-04-30');

/*!40000 ALTER TABLE `app_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_trx_donatur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_trx_donatur`;

CREATE TABLE `app_trx_donatur` (
  `id` char(30) NOT NULL DEFAULT '',
  `id_users` int(11) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `jumlah_donasi` int(20) DEFAULT NULL,
  `unix_id` char(11) DEFAULT NULL,
  `id_bank_transfer` char(11) DEFAULT NULL,
  `konfirmasi` int(11) DEFAULT '0',
  `bukti_donasi` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users` (`id_users`),
  KEY `bank_tranfer` (`id_bank_transfer`),
  KEY `kegiatan` (`id_kegiatan`),
  CONSTRAINT `bank_tranfer` FOREIGN KEY (`id_bank_transfer`) REFERENCES `app_bank` (`id`),
  CONSTRAINT `kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `app_kegiatan` (`id`),
  CONSTRAINT `users` FOREIGN KEY (`id_users`) REFERENCES `app_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_trx_donatur` WRITE;
/*!40000 ALTER TABLE `app_trx_donatur` DISABLE KEYS */;

INSERT INTO `app_trx_donatur` (`id`, `id_users`, `id_kegiatan`, `jumlah_donasi`, `unix_id`, `id_bank_transfer`, `konfirmasi`, `bukti_donasi`, `created_at`)
VALUES
	('TRX02081801',1,1,100000,'374','003',0,'bukti.jpg','2018-08-01 20:00:00'),
	('TRX02081802',3,3,500000,'375','003',0,'bukti2.jpg','2018-08-02 20:00:00');

/*!40000 ALTER TABLE `app_trx_donatur` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_users`;

CREATE TABLE `app_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telpon` char(20) DEFAULT NULL,
  `id_user_role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_role_id` (`id_user_role`),
  CONSTRAINT `fk_user_role_id` FOREIGN KEY (`id_user_role`) REFERENCES `app_users_role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_users` WRITE;
/*!40000 ALTER TABLE `app_users` DISABLE KEYS */;

INSERT INTO `app_users` (`id`, `fullname`, `password`, `email`, `no_telpon`, `id_user_role`)
VALUES
	(1,'hendrik rismawan','202cb962ac59075b964b07152d234b70','hendrik@gmail.com','081223459873',2),
	(2,'admin1','202cb962ac59075b964b07152d234b70','admin@pay.com','089601373427',1),
	(3,'agustria','202cb962ac59075b964b07152d234b70','agustria12@gmail.com','081943242343',2);

/*!40000 ALTER TABLE `app_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_users_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_users_role`;

CREATE TABLE `app_users_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categori` varchar(50) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_users_role` WRITE;
/*!40000 ALTER TABLE `app_users_role` DISABLE KEYS */;

INSERT INTO `app_users_role` (`id`, `categori`, `keterangan`)
VALUES
	(1,'admin','bisa mengakses semua menu'),
	(2,'donatur','hanya bisa mengakses menu tertentu');

/*!40000 ALTER TABLE `app_users_role` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
