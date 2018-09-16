-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table gama_v2.app_bimbel
CREATE TABLE IF NOT EXISTS `app_bimbel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) DEFAULT NULL,
  `Keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table gama_v2.app_bimbel: ~0 rows (approximately)
/*!40000 ALTER TABLE `app_bimbel` DISABLE KEYS */;
INSERT INTO `app_bimbel` (`id`, `kategori`, `Keterangan`) VALUES
	(1, 'kontak', 'informasi detail');
/*!40000 ALTER TABLE `app_bimbel` ENABLE KEYS */;

-- Dumping structure for table gama_v2.app_instruktur
CREATE TABLE IF NOT EXISTS `app_instruktur` (
  `id` char(50) DEFAULT NULL,
  `nama_instruktur` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telpon` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table gama_v2.app_instruktur: ~0 rows (approximately)
/*!40000 ALTER TABLE `app_instruktur` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_instruktur` ENABLE KEYS */;

-- Dumping structure for table gama_v2.app_jadwal
CREATE TABLE IF NOT EXISTS `app_jadwal` (
  `id` int(11) NOT NULL,
  `id_materi` int(11),
  `id_program` int(11) DEFAULT NULL,
  `id_instruktur` int(11),
  `hari` char(50) DEFAULT NULL,
  `tanggal` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table gama_v2.app_jadwal: ~0 rows (approximately)
/*!40000 ALTER TABLE `app_jadwal` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_jadwal` ENABLE KEYS */;

-- Dumping structure for table gama_v2.app_list_peserta_didik
CREATE TABLE IF NOT EXISTS `app_list_peserta_didik` (
  `id` char(50) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table gama_v2.app_list_peserta_didik: ~0 rows (approximately)
/*!40000 ALTER TABLE `app_list_peserta_didik` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_list_peserta_didik` ENABLE KEYS */;

-- Dumping structure for table gama_v2.app_materi
CREATE TABLE IF NOT EXISTS `app_materi` (
  `id` char(50) NOT NULL,
  `nama_materi` varchar(50) DEFAULT NULL,
  `id_instruktur` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table gama_v2.app_materi: ~0 rows (approximately)
/*!40000 ALTER TABLE `app_materi` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_materi` ENABLE KEYS */;

-- Dumping structure for table gama_v2.app_users
CREATE TABLE IF NOT EXISTS `app_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telpon` char(20) DEFAULT NULL,
  `id_user_role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_role_id` (`id_user_role`),
  CONSTRAINT `fk_user_role_id` FOREIGN KEY (`id_user_role`) REFERENCES `app_users_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table gama_v2.app_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `app_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_users` ENABLE KEYS */;

-- Dumping structure for table gama_v2.app_users_role
CREATE TABLE IF NOT EXISTS `app_users_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categori` varchar(50) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table gama_v2.app_users_role: ~2 rows (approximately)
/*!40000 ALTER TABLE `app_users_role` DISABLE KEYS */;
INSERT INTO `app_users_role` (`id`, `categori`, `keterangan`) VALUES
	(3, 'Peserta Didik', 'Hanya untuk peserta didik'),
	(4, 'Admin', 'Hanya untuk Admin');
/*!40000 ALTER TABLE `app_users_role` ENABLE KEYS */;

-- Dumping structure for table gama_v2.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table gama_v2.ci_sessions: ~9 rows (approximately)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('832form3in3kau9149nahmheup51vdot', '::1', 1537093334, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373039333333343B),
	('9nm4ki8t0i51uuqc5os44g5n2nvgsq2k', '::1', 1537103017, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373130333031373B),
	('a7vjbi5mi9d6avrj50gpss7imfi8dcfn', '::1', 1537093664, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373039333636343B),
	('ak4l5iah157e96b0lrp964h0evdapukj', '::1', 1537092281, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373039323238313B),
	('emvoaegsv5rrtc86aonuvh3qsnr0uq4d', '::1', 1537101783, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373130313738333B),
	('j3jec3hrjolfhrnnrk879f4q4l43g61n', '::1', 1537094464, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373039343436343B),
	('jjr66i6518o6l6qql73jgj76oauqogin', '::1', 1537097835, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373039373833353B),
	('mu42cp67bll0um1tr22n2m47n4m5il91', '::1', 1537094841, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373039343834313B),
	('nvceiu7io036kbb0sn8qsu36i82bqas8', '::1', 1537102615, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373130323631353B),
	('rqtfhp671dsda1j55umiqkcn7gc80pab', '::1', 1537099076, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373039393037363B),
	('ud4ea7n074g96c5p2ltlmg4vsk0n47ru', '::1', 1537092845, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373039323834353B),
	('vuodbcgpumhn7mmj9j8io2kk0spfetup', '::1', 1537103313, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373130333031373B);
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
