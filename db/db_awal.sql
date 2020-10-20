-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.1.72-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for stmik
CREATE DATABASE IF NOT EXISTS `stmik` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `stmik`;

-- Dumping structure for table stmik.skpi_jenis
CREATE TABLE IF NOT EXISTS `skpi_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `hanya_satu_isian` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table stmik.skpi_jenis: 4 rows
/*!40000 ALTER TABLE `skpi_jenis` DISABLE KEYS */;
REPLACE INTO `skpi_jenis` (`id`, `nama`, `hanya_satu_isian`) VALUES
	(1, 'Prestasi/Penghargaan', 1),
	(2, 'Keikutsertaan dalam organisasi', 0),
	(3, 'Sertifikat Keahlian', 0),
	(4, 'Kerja Praktek/Magang', 0);
/*!40000 ALTER TABLE `skpi_jenis` ENABLE KEYS */;

-- Dumping structure for table stmik.skpi_level
CREATE TABLE IF NOT EXISTS `skpi_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL DEFAULT '0',
  `point` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table stmik.skpi_level: 5 rows
/*!40000 ALTER TABLE `skpi_level` DISABLE KEYS */;
REPLACE INTO `skpi_level` (`id`, `nama`, `point`) VALUES
	(1, 'level 1', 200),
	(2, 'level 2', 400),
	(3, 'level 3', 600),
	(4, 'level 4', 800),
	(5, 'level 5', 1000);
/*!40000 ALTER TABLE `skpi_level` ENABLE KEYS */;

-- Dumping structure for table stmik.skpi_task
CREATE TABLE IF NOT EXISTS `skpi_task` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `point` int(100) unsigned NOT NULL DEFAULT '0',
  `batas_akhir` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table stmik.skpi_task: 2 rows
/*!40000 ALTER TABLE `skpi_task` DISABLE KEYS */;
REPLACE INTO `skpi_task` (`id`, `nama`, `point`, `batas_akhir`) VALUES
	(1, 'task 1', 200, '2020-06-08 08:24:00'),
	(2, 'Task kedua', 100, '2020-06-28 08:00:00');
/*!40000 ALTER TABLE `skpi_task` ENABLE KEYS */;

-- Dumping structure for table stmik.skpi_trans
CREATE TABLE IF NOT EXISTS `skpi_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL DEFAULT '0',
  `jenis_id` int(11) NOT NULL DEFAULT '0',
  `nim` varchar(50) NOT NULL DEFAULT '0',
  `kegiatan` text,
  `lembaga` text,
  `keterangan` text,
  `dokumen` varchar(200) DEFAULT NULL,
  `status_verifikasi` enum('Belum Terverifikasi','Pengembalian Ke Mahasiswa','Pengembalian Ke Admin','Terverifikasi') DEFAULT 'Belum Terverifikasi',
  `tgl_isi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_verifikasi` datetime DEFAULT NULL,
  `tgl_pengembalian_ke_mahasiswa` datetime DEFAULT NULL,
  `tgl_pengembalian_ke_admin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table stmik.skpi_trans: 4 rows
/*!40000 ALTER TABLE `skpi_trans` DISABLE KEYS */;
REPLACE INTO `skpi_trans` (`id`, `task_id`, `jenis_id`, `nim`, `kegiatan`, `lembaga`, `keterangan`, `dokumen`, `status_verifikasi`, `tgl_isi`, `tgl_verifikasi`, `tgl_pengembalian_ke_mahasiswa`, `tgl_pengembalian_ke_admin`) VALUES
	(16, 1, 1, '09.51.0019', '<p>\n	prestasi pertama</p>\n', '<p>\n	lembaga pertama</p>\n', NULL, 'efe6a-blank.pdf', 'Terverifikasi', '2020-05-10 14:43:36', '2020-05-10 14:44:51', NULL, NULL),
	(17, 2, 2, '09.51.0019', '<p>\n	kegiatan organisasi</p>\n', '<p>\n	lembaga organisasi</p>\n', NULL, '32873-praktikum-sistem-basis-data.pdf', 'Terverifikasi', '2020-05-10 14:43:36', '2020-05-10 14:45:04', NULL, NULL),
	(18, 1, 1, '09.51.0022', '<p>\n	kegiatan satu</p>\n', '<p>\n	lembaga satu</p>\n', NULL, 'bde71-blank.pdf', 'Terverifikasi', '2020-05-10 14:49:13', '2020-05-10 14:50:16', NULL, NULL),
	(19, 1, 2, '09.51.0022', '<p>\n	kegiatan dua di task satu</p>\n', '<p>\n	lembaga satu</p>\n', NULL, '7c968-blank.pdf', 'Terverifikasi', '2020-05-10 14:49:13', '2020-05-10 14:50:16', NULL, NULL);
/*!40000 ALTER TABLE `skpi_trans` ENABLE KEYS */;

-- Dumping structure for table stmik.skpi_user
CREATE TABLE IF NOT EXISTS `skpi_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table stmik.skpi_user: 2 rows
/*!40000 ALTER TABLE `skpi_user` DISABLE KEYS */;
REPLACE INTO `skpi_user` (`id`, `fullname`, `username`, `password`, `foto`) VALUES
	(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'be8a0-admin-settings-male.png'),
	(2, 'Nasrul', 'nasrul', '21232f297a57a5a743894a0e4a801fc3', NULL);
/*!40000 ALTER TABLE `skpi_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
