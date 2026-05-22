-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping structure for table tanah_blambangan.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tanah_blambangan.admin: ~0 rows (approximately)
DELETE FROM `admin`;
INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
	(1, 'admin', '12345');

	CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tanah_blambangan.kategori: ~3 rows (approximately)
DELETE FROM `kategori`;
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Alam'),
	(2, 'Budaya');

-- Dumping structure for table tanah_blambangan.destinasi_produk
CREATE TABLE IF NOT EXISTS `destinasi_produk` (
  `id_destinasi` int NOT NULL AUTO_INCREMENT,
  `nama_destinasi` varchar(150) NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `fasilitas` text,
  `id_kategori` int DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_destinasi`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `destinasi_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tanah_blambangan.destinasi_produk: ~0 rows (approximately)
DELETE FROM `destinasi_produk`;
INSERT INTO `destinasi_produk` (`id_destinasi`, `nama_destinasi`, `lokasi`, `deskripsi`, `fasilitas`, `id_kategori`, `rating`, `gambar`) VALUES
	(12, 'KAWAH IJEN', 'kec. banyuwangi', 'Danau kawah Ijen berwarna hijau tosca dan sangat asam, menjadikannya salah satu danau asam terbesar di dunia. ', NULL, 1, 8.8, '1779373414_ijen.jpg'),
	(13, 'PANTAI MARINA BOOM', 'kec. banyuwangi', 'Salah satu destinasi wisata pantai di Banyuwangi yang memiliki pemandangan memukau adalah Pantai Marina Boom.', NULL, 1, 8.7, '1779368668_boom beach.jpg'),
	(14, 'TAMAN NASIONAL ALAS BALURAN', 'kec. Situbondo', 'Saat musim kemarau, pengunjung dapat melihat panorama yang mirip dengan daratan Afrika, namun di kala musim hujan pemandangannya hijau mempesona denganberlatar belakang Gunung Baluran.', NULL, 1, 8.6, '1779368782_baluran.jpg'),
	(15, 'TAMAN GANDRUNG TERAKOTA', 'kec. banyuwangi', 'Sebuah “situs rawat ruwat” seni budaya, dalam suatu kawasan di Jiwa Jawa Ijen. Bukit hijau dan hamparan sawah, yang di dalamnya dapat kita temukan galeri seni rupa, taman unggas, amfiteater terbuka untuk pertunjukan kesenian.', NULL, 1, 8.5, '1779368985_terakota.jpg'),
	(16, 'PULAU MERAH', 'kec. Banyuwangi', 'Pantai Pulau Merah adalah salah satu tempat selancar ternama di Jawa Timur . Destinasi indah ini terletak di sepanjang pesisir objek wisata Jawa Timur.', NULL, 1, 8.4, '1779369060_pulau merah.jpg'),
	(18, 'PANTAI PLENGKUNG G - LAND', 'kec. banyuwangi', 'lorem ipsum', NULL, 1, 8.3, '1779410629_plengkung.jpg'),
	(19, 'TAMAN NASIONAL ALAS PURWO', 'kec. banyuwangi', 'lorem ipsum', NULL, 1, 8.2, '1779410714_alas-purwo.jpg'),
	(20, 'BANGSRING UNDERWATER', 'kec. banyuwangi', 'lorem ipsum', NULL, 1, 8.1, '1779410856_bangsring.jpg'),
	(21, 'AIR TERJUN JAGIR', 'kec. banyuwangi', 'lorem ipsum', NULL, 1, 8, '1779411154_air terjun.jpg'),
	(22, 'TELUK HIJAU (GREEN BAY)', 'kec. banyuwangi', 'lorem ipsum', NULL, 1, 7.9, '1779411226_teluk hijau.jpg'),
	(23, 'DESA WISATA OSING KEMIREN', 'kec. banyuwangi', 'lorem ipsum', NULL, 2, 7.8, '1779411378_Desa Wisata Osing Kemiren.jpg'),
	(24, 'FESTIVAL GANDRUNG SEWU', 'kec. banyuwangi', 'lorem ipsum', NULL, 2, 7.7, '1779411503_Festival Gandrung Sewu.jpg'),
	(25, 'BANYUWANGI ETHNO CARNIVAL', 'kec. banyuwangi', 'lorem ipsum', NULL, 2, 7.6, '1779411580_Banyuwangi Ethno Carnival.jpg'),
	(26, 'RITUAL SEBLANG', 'kec. banyuwangi', 'lorem ipsum', NULL, 2, 7.5, '1779411683_Ritual Seblang.jpg'),
	(27, 'RITUAL TUMPENG SEWU', 'kec. banyuwangi', 'lorem ipsum', NULL, 2, 7.4, '1779411780_Ritual Tumpeng Sewu.jpg'),
	(28, 'RITUAL KEBO - KEBOAN', 'kec. banyuwangi', 'lorem ipsum', NULL, 2, 7.3, '1779411868_Ritual Kebo-keboan.jpg'),
	(29, 'BARONG OSING', 'kec. banyuwangi', 'lorem ipsum', NULL, 2, 7.3, '1779411933_Barong Osing.jpg'),
	(30, 'RUMAH ADAT OSING', 'kec. banyuwangi', 'lorem ipsum', NULL, 2, 7.2, '1779412013_Rumah Adat Osing.jpg'),
	(31, 'SENI MUSIK ANGKLUNG CARUK', 'kec. banyuwangi', 'lorem ipsum', NULL, 2, 7.2, '1779412138_Seni Musik Angklung Caruk.jpg'),
	(32, 'TUMBUK - TUMBUK', 'kec. banyuwangi', 'lorem ipsum', NULL, 2, 7.2, '1779412194_tumbuk.jpg');

-- Dumping structure for table tanah_blambangan.kategori


/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
