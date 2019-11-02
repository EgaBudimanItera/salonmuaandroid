-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_salon_rn
DROP DATABASE IF EXISTS `db_salon_rn`;
CREATE DATABASE IF NOT EXISTS `db_salon_rn` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_salon_rn`;

-- Dumping structure for table db_salon_rn.tbl_galeri
DROP TABLE IF EXISTS `tbl_galeri`;
CREATE TABLE IF NOT EXISTS `tbl_galeri` (
  `id_galeri` int(100) NOT NULL AUTO_INCREMENT,
  `foto_galeri` varchar(200) DEFAULT NULL,
  `id_salon` int(200) DEFAULT NULL,
  `id_pelanggan` int(200) DEFAULT NULL,
  `status_galeri` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_galeri: ~16 rows (approximately)
DELETE FROM `tbl_galeri`;
/*!40000 ALTER TABLE `tbl_galeri` DISABLE KEYS */;
INSERT INTO `tbl_galeri` (`id_galeri`, `foto_galeri`, `id_salon`, `id_pelanggan`, `status_galeri`) VALUES
	(1, 'ayudia.jpg', 1, 0, 'foto salon'),
	(2, 'image-d9badc73-ae8f-453e-b226-2f5cd4d54637.jpg', 1, 0, 'foto salon'),
	(3, 'image-a631aa4f-a939-4e41-b3e1-d58540605247.jpg', 24, 0, 'foto salon'),
	(6, 'image-25ec1b0c-f9dd-45bd-b9bc-8b0499fbdb47.jpg', 1, 1, 'foto salon'),
	(7, 'image-44923baf-2811-45a4-90f1-052f486beb7d.jpg', 14, 14, 'foto salon'),
	(8, 'image-526deebd-a6ad-4b3b-a2a1-68400ca72b4e.jpg', 14, 14, 'foto salon'),
	(9, 'image-6123fb68-a1f0-49a1-9063-7fd65e775fa5.jpg', 14, 14, 'foto salon'),
	(10, 'image-88a7ae0b-29e1-434c-9c08-d4a0f513bb55.jpg', 25, 25, 'foto salon'),
	(11, 'image-e8fcde44-33c7-4d99-8cf2-07effb5766c0.jpg', 25, 25, 'foto salon'),
	(12, 'image-1fd8ddfe-e141-4678-9538-585a08e7dd0d.jpg', 25, 25, 'foto salon'),
	(13, 'image-9b82bbeb-a7fb-4a85-b74c-55a2ef2f69b9.jpg', 1, 30, 'foto salon'),
	(14, 'image-fba3a2cf-00ba-4885-9613-a40fa1c6796a.jpg', 4, 4, 'foto salon'),
	(15, 'image-d49481be-9bc5-41b6-bf4b-65e1459100ce.jpg', 4, 4, 'foto salon'),
	(16, 'image-3b89b363-2032-4ddb-b79d-644642f3f170.jpg', 4, 4, 'foto salon'),
	(17, 'image-60366d0e-fa5a-434f-b611-19a5c572ace8.jpg', 31, 0, 'foto salon'),
	(18, 'image-2b868408-2237-4ebc-a1b8-431c06d529f9.jpg', 33, 0, 'foto salon');
/*!40000 ALTER TABLE `tbl_galeri` ENABLE KEYS */;

-- Dumping structure for table db_salon_rn.tbl_hak_akses
DROP TABLE IF EXISTS `tbl_hak_akses`;
CREATE TABLE IF NOT EXISTS `tbl_hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_hak_akses: ~13 rows (approximately)
DELETE FROM `tbl_hak_akses`;
/*!40000 ALTER TABLE `tbl_hak_akses` DISABLE KEYS */;
INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
	(21, 2, 1),
	(28, 2, 3),
	(29, 2, 2),
	(30, 1, 2),
	(38, 1, 14),
	(39, 1, 15),
	(41, 1, 16),
	(42, 1, 12),
	(43, 1, 17),
	(44, 1, 1),
	(46, 1, 31),
	(47, 1, 32),
	(48, 1, 33);
/*!40000 ALTER TABLE `tbl_hak_akses` ENABLE KEYS */;

-- Dumping structure for table db_salon_rn.tbl_jenis_jasa
DROP TABLE IF EXISTS `tbl_jenis_jasa`;
CREATE TABLE IF NOT EXISTS `tbl_jenis_jasa` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `jasa` varchar(100) DEFAULT NULL,
  `id_salon` int(50) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `foto_jenis` varchar(200) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_jenis_jasa: ~19 rows (approximately)
DELETE FROM `tbl_jenis_jasa`;
/*!40000 ALTER TABLE `tbl_jenis_jasa` DISABLE KEYS */;
INSERT INTO `tbl_jenis_jasa` (`id_jenis`, `jasa`, `id_salon`, `harga`, `foto_jenis`, `keterangan`) VALUES
	(19, 'wedding', 1, '1500000 ', 'image-806a8768-1d73-488c-9091-c0c16cc8423f.jpg', 'Makeup + acc'),
	(20, 'Prewed ', 1, '250000', 'image-b9b22e9c-e455-4ef5-bd07-eb9bd0968c44.jpg', 'Makeup + hijab/hairdo'),
	(21, 'Pesta', 1, '150000', 'image-2244f98b-feb4-42f2-9b12-658caf26d808.jpg', 'Makeup + hijab/hairdo'),
	(22, 'Wisuda', 1, '150000', 'mutiara.jpg', 'Makeup + hijab/hairdo'),
	(23, 'Pesta', 4, '150000', 'image-9ca8d0df-d63a-4a63-a4c5-9b6f82789256.jpg', 'Makeup + hijab/hairdo'),
	(24, 'Wisuda', 4, '150000', 'image-50f2bfba-cc44-4f28-a434-d955e76ca252.jpg', 'Makeup wisuda '),
	(25, 'Wisuda ', 5, '150000', 'image-e6683e1d-40df-4f2d-a852-851fdf7049c8.jpg', 'Jasa Makeup wisuda Rp. 150.000'),
	(26, 'Pesta (harga Rp.100.000)', 5, '100000', 'image-5f879688-9f6b-4b0a-910b-a635b15f623c.jpg', 'Makeup pesta harga 100.000'),
	(27, 'Makeup + Hairdo', 6, '200000', 'image-359f81f1-6a65-48d0-9ee1-b890b02b6fe6.jpg', 'Makeup,  perpisahan, panitia, pesta, aqiqah, foto ijazah, Bridesmaid '),
	(28, 'Makeup ', 6, '150000', 'image-8df2c47e-8399-4884-9e94-9c27768ef71c.jpg', 'Makeup,  perpisahan, panitia, pesta, aqiqah, foto ijazah, Bridesmaid '),
	(29, 'Wisuda,  pesta, dll ', 7, '250000', 'image-3ebf052b-8099-4ad4-a55c-6a7f692e3637.jpg', 'Jasa Makeup wisuda, pesta, dll'),
	(30, 'Wedding + Accesories', 7, '4000000', 'image-53f55f93-ebc6-429b-8e2b-775b38962402.jpg', 'Jasa Wedding + Accesories '),
	(31, 'Makeup Pengantin', 10, '1500000', 'image-b2dca5d4-98eb-4f6f-9fdf-c122ef26daf5.jpg', 'Makeup Pengantin '),
	(32, 'Wisuda/Pesta/Panitia/Perpisahan', 25, '250000', 'image-e64428dd-7129-4e95-935e-7485ee03d424.jpg', 'Makeup+hairdo/hijabdo'),
	(33, 'Prewedding', 25, '275000', 'image-dbb82858-3a5d-4d52-be60-c86d0a48da54.jpg', 'Makeup+hairdo/hijabdo'),
	(34, 'Wisuda/pesta', 14, '250000', 'image-4a1ab7fb-cfd8-4b49-a880-35f5559fab91.jpg', 'Makeup+hairdo/hijab'),
	(35, 'Lamaran/prewedding', 14, '500000', 'image-8e2f2f1a-06ce-423a-93eb-390bf86b329e.jpg', 'Makeup+hairdo/hijab'),
	(36, 'Wedding paket A', 14, '5000000', 'image-7fd4e1fb-3308-4ef7-a769-7a034327ff62.jpg', '-Makeup bride, -Hair/hijab bride, -Fresh flower(mawar/melati) 1 pasang, -Tanpa retouch.'),
	(37, 'Wisuda', 31, '150000', 'image-b424e477-fd3d-4513-ae57-97e0de3a568c.jpg', 'Makeup+hairdo/hijab');
/*!40000 ALTER TABLE `tbl_jenis_jasa` ENABLE KEYS */;

-- Dumping structure for table db_salon_rn.tbl_menu
DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_menu: ~8 rows (approximately)
DELETE FROM `tbl_menu`;
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
	(1, 'Home', 'Welcome', 'fa fa-line-chart', 0, 'y'),
	(2, 'KELOLA ADMIN', 'user', 'fa fa-user-o', 0, 'y'),
	(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'y'),
	(17, 'Laporan', 'Laporan', 'fa fa-book', 0, 'y'),
	(30, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y'),
	(31, 'Salon', 'Salon', 'fa fa-user', 0, 'y'),
	(32, 'Pendaftaran Pelanggan', 'Pendaftaran', 'fa fa-book', 0, 'y'),
	(33, 'Pemesanan', 'Pemesanan', 'fa fa-gear', 0, 'y');
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;

-- Dumping structure for table db_salon_rn.tbl_order
DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id_order` int(60) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(100) DEFAULT NULL,
  `id_jenis_jasa` int(100) DEFAULT NULL,
  `id_pendaftar` int(100) DEFAULT NULL,
  `harga` varchar(200) DEFAULT NULL,
  `jml_harga` varchar(200) DEFAULT NULL,
  `lat_user` varchar(200) DEFAULT NULL,
  `lng_user` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `biaya_transportasi` varchar(200) DEFAULT NULL,
  `jam` varchar(100) DEFAULT NULL,
  `status_pesanan` varchar(100) DEFAULT 'Proses',
  `perias` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_order: ~0 rows (approximately)
DELETE FROM `tbl_order`;
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
INSERT INTO `tbl_order` (`id_order`, `tanggal`, `id_jenis_jasa`, `id_pendaftar`, `harga`, `jml_harga`, `lat_user`, `lng_user`, `status`, `biaya_transportasi`, `jam`, `status_pesanan`, `perias`) VALUES
	(5, '29-08-2019', 23, 20, '150000    ', '174000    ', '-5.3965399    ', '105.2615557    ', 'Datang Ke Rumah   ', '24000    ', ' 05:39:00', 'Proses', ''),
	(7, '29-08-2019    ', 26, 20, '100000    ', '120000    ', '-5.3803786    ', '105.2545942    ', 'Datang Ke Rumah ', '20000    ', ' 11:39:00', 'Proses', ''),
	(16, '29-08-2019    ', 19, 22, '1500000    ', '1500000    ', '-5.3830165    ', '105.2580401    ', 'Datang Ke Tempat', '0    ', ' 04:47:00', 'Pesanan Di Konfirmasi Salon', 'Diana, Refi, Tari dan Dania'),
	(17, '01-08-2019    ', 26, 18, '100000    ', '124000    ', '-5.34582557    ', '105.24625564    ', 'Datang Ke Rumah  ', '24000    ', ' 04:20:00', 'Proses', ''),
	(20, '21-08-2019    ', 19, 18, '1500000     ', '1536000    ', '-5.34581207    ', '105.24626836    ', 'Datang Ke Rumah   ', '36000    ', ' 04:20:00', 'Pesanan Di Konfirmasi Salon', '-'),
	(21, '21-08-2019    ', 19, 18, '1500000     ', '1536000    ', '-5.34580848    ', '105.2462651    ', 'Datang Ke Rumah  ', '36000    ', ' 04:25:00', 'Pesanan Di Konfirmasi Salon', '-'),
	(22, '31-08-2019    ', 34, 22, '250000    ', '254000    ', '-5.3830142    ', '105.2580407    ', 'Datang Ke Rumah  ', '4000    ', ' 06:15:00', 'Pesanan Di Konfirmasi Salon', '-'),
	(23, '30-08-2019    ', 22, 22, '150000    ', '155000    ', '-5.3830012    ', '105.2580493    ', 'Datang Ke Rumah  ', '5000    ', ' 06:15:00', 'Pesanan Di Konfirmasi Salon', '-'),
	(24, '30-08-2019    ', 19, 18, '1500000     ', '1545000    ', '-5.34586132    ', '105.24609331    ', 'Datang Ke Rumah  ', '45000    ', ' 05:35:00', 'Pesanan Di Konfirmasi Salon', '-'),
	(25, '28-08-2019    ', 22, 22, '150000    ', '175000    ', '-5.4142711    ', '105.2551453    ', 'Datang Ke Rumah   ', '25000    ', ' 05:40:00', 'Pesanan Di Konfirmasi Salon', '-'),
	(28, '13-08-2019    ', 21, 27, '150000    ', '175000    ', '-5.3830153    ', '105.2580284    ', 'Datang Ke Rumah   ', '25000    ', ' 06:00:00', '0', ''),
	(29, '13-09-2019    ', 20, 28, '250000    ', '250000    ', '-5.372699    ', '105.2293863    ', 'Datang Ke Tempat', '0    ', ' 04:25:00', 'Pesanan Di Konfirmasi Salon', '-'),
	(30, '22-08-2019    ', 21, 30, '150000    ', '175000    ', '-5.3828692    ', '105.2575027    ', 'Datang Ke Rumah    ', '25000    ', ' 06:05:00', 'Pesanan Di Konfirmasi Salon', '-'),
	(31, '15-08-2019    ', 32, 30, '250000    ', '275000    ', '-5.3856567    ', '105.259392    ', 'Datang Ke Rumah ', '25000    ', ' 05:11:00', 'Pesanan Di Konfirmasi Salon', '-'),
	(33, '22-08-2019    ', 21, 30, '150000    ', '170000    ', '-5.3856567    ', '105.259392    ', 'Datang Ke Rumah', '20000    ', ' 06:00:00', 'Pesanan Di Konfirmasi Salon', '-'),
	(34, '19-09-2019    ', 20, 30, '250000    ', '270000    ', '-5.4535239    ', '105.2613664    ', 'Datang Ke Rumah   ', '20000    ', ' 06:29:00', 'Pesanan Di Konfirmasi Salon', '-'),
	(35, '22-09-2019    ', 19, 18, '1500000     ', '1500000     ', '37.421998333333335    ', '-122.08400000000002    ', 'Datang Ke Tempat    ', '0    ', ' 11:57:00', '0', ''),
	(36, '29-09-2019    ', 22, 30, '150000    ', '170000    ', '-5.4542351    ', '105.2601635    ', 'Datang Ke Rumah    ', '20000    ', ' 05:10:00', 'Proses', ''),
	(37, '30-09-2019    ', 34, 30, '250000    ', '270000    ', '-5.45475    ', '105.2618661    ', 'Datang Ke Rumah    ', '20000    ', ' 09:00:00', 'Proses', ''),
	(38, '28-09-2019    ', 36, 30, '5000000    ', '5020000    ', '-5.4542351    ', '105.2601635    ', 'Datang Ke Rumah    ', '20000    ', ' 06:19:00', 'Proses', ''),
	(39, '11-09-2019    ', 34, 30, '250000    ', '270000    ', '-5.4542351    ', '105.2601635    ', 'Datang Ke Rumah    ', '20000    ', ' 06:00:00', 'Proses', ''),
	(40, '26-09-2019    ', 34, 22, '250000    ', '270000    ', '-5.4543754    ', '105.260178    ', 'Datang Ke Rumah    ', '20000    ', ' 05:00:00', 'Proses', ''),
	(41, '03-10-2019    ', 22, 30, '150000    ', '170000    ', '-5.4543754    ', '105.260178    ', 'Datang Ke Rumah    ', '20000    ', ' 06:42:00', 'Proses', ''),
	(42, '05-10-2019    ', 36, 30, '5000000    ', '5025000    ', '-5.386555    ', '105.2589882    ', 'Datang Ke Rumah    ', '25000    ', ' 12:55:00', 'Proses', ''),
	(43, '01-10-2019    ', 37, 30, '150000    ', '150000    ', '-5.386555    ', '105.2589882    ', 'Datang Ke Tempat    ', '0    ', ' 17:00:00', 'Pesanan Di Konfirmasi Salon', 'Donita, Zahara, Diana'),
	(44, '02-10-2019    ', 37, 22, '150000    ', '175000    ', '-5.386555    ', '105.2589882    ', 'Datang Ke Rumah    ', '25000    ', ' 17:00:00', 'Proses', ''),
	(47, '11-11-2019    ', 23, 20, '150000    ', '1862000    ', '-6.2877994    ', '106.9231415    ', 'Datang Ke Rumah    ', '1712000    ', ' 05:00:00', 'Proses', '');
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;

-- Dumping structure for table db_salon_rn.tbl_pendaftaran
DROP TABLE IF EXISTS `tbl_pendaftaran`;
CREATE TABLE IF NOT EXISTS `tbl_pendaftaran` (
  `id_pendaftar` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pendaftar`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_pendaftaran: ~9 rows (approximately)
DELETE FROM `tbl_pendaftaran`;
/*!40000 ALTER TABLE `tbl_pendaftaran` DISABLE KEYS */;
INSERT INTO `tbl_pendaftaran` (`id_pendaftar`, `nama`, `alamat`, `no_telp`, `email`, `foto`) VALUES
	(18, 'G', 'G', '55', 'V', 'user.png'),
	(19, 'Anto', 'Jl.Nawawi', '089656236', 'Fonysaputra95@gmail.com', 'user.png'),
	(20, 'Vera', 'Jl telul bone no 70', '081377779637', 'Verayanti611@gmail.com', 'user.png'),
	(22, 'Zahrana', 'Jl raden intan no 30', '081278364968', 'Rana12@gmail.com', 'user.png'),
	(27, 'Anisa', 'Jl za pagar alam nomor 9-11 kedaton', '082186345294', 'Anisa123@gmail.com', 'user.png'),
	(28, 'Angga', 'Jl.abdul kadir', '0852225464', 'Abdul@gmail.com', 'image-82fc9992-f8d7-4352-88b3-d949b091aa3a.jpg'),
	(29, 'fefref', 'referfer', '4333', 'ggergre', NULL),
	(30, 'Dila', 'Jl za pagar alam no 9-11 kedaton', '082123456798', 'Dila12@gmail.com', 'image-f76fad4c-f351-4690-9adb-16314cd24ee6.jpg'),
	(32, 'Rifki', 'Jl.maerakaca ', '08521245744', 'G@gmail.com', 'image-7b77dd3b-096e-4eb4-b32f-5f7a9fb0e2c7.jpg');
/*!40000 ALTER TABLE `tbl_pendaftaran` ENABLE KEYS */;

-- Dumping structure for table db_salon_rn.tbl_rating
DROP TABLE IF EXISTS `tbl_rating`;
CREATE TABLE IF NOT EXISTS `tbl_rating` (
  `id_rating` int(30) NOT NULL AUTO_INCREMENT,
  `id_salon` int(30) DEFAULT NULL,
  `id_pendaftaran` int(30) DEFAULT NULL,
  `rating` varchar(20) DEFAULT '0',
  `keterangan` text,
  `jumlah_rating` double DEFAULT NULL,
  PRIMARY KEY (`id_rating`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_rating: ~16 rows (approximately)
DELETE FROM `tbl_rating`;
/*!40000 ALTER TABLE `tbl_rating` DISABLE KEYS */;
INSERT INTO `tbl_rating` (`id_rating`, `id_salon`, `id_pendaftaran`, `rating`, `keterangan`, `jumlah_rating`) VALUES
	(1, 1, 20, '5', '', 3.5),
	(2, 1, 27, '0', '', 3.5),
	(3, 1, 27, '0', '', 3.5),
	(4, 1, 27, '0', '', 3.5),
	(5, 1, 27, '5', '', 3.5),
	(6, 1, 27, '5', '', 3.5),
	(7, 4, 27, '5', '', 5),
	(8, 1, 30, '5', '?', 3.5),
	(9, 1, 30, '5', '', 3.5),
	(10, 5, 30, '5', '', 5),
	(11, 1, 30, '5', 'Bagus sekali', 3.5),
	(12, 14, 30, '5', 'Terimakasih hasil makeup nya bagus:)', 4.5),
	(13, 1, 30, '5', '????', 3.5),
	(14, 4, 30, '5', 'Terimakasih', 5),
	(15, 14, 22, '4', '', 4.5),
	(16, 5, 30, '5', 'Bagus', 5);
/*!40000 ALTER TABLE `tbl_rating` ENABLE KEYS */;

-- Dumping structure for table db_salon_rn.tbl_salon
DROP TABLE IF EXISTS `tbl_salon`;
CREATE TABLE IF NOT EXISTS `tbl_salon` (
  `id_salon` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `pemilik` varchar(200) DEFAULT NULL,
  `lat` varchar(200) DEFAULT NULL,
  `lng` varchar(200) DEFAULT NULL,
  `kategori` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_salon`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_salon: ~19 rows (approximately)
DELETE FROM `tbl_salon`;
/*!40000 ALTER TABLE `tbl_salon` DISABLE KEYS */;
INSERT INTO `tbl_salon` (`id_salon`, `nama`, `alamat`, `no_telp`, `email`, `foto`, `pemilik`, `lat`, `lng`, `kategori`) VALUES
	(1, 'Mutiara intana makeup', 'jln wolter mangonsidi no.198 bandar lampung', '089631072185', 'mutiara@gmail.com', 'image-7d7ae255-29a3-4a5b-9fd4-36eb726fbf6e.jpg', 'Mutiara', '-5.423230', '105.251510', 'mua'),
	(4, 'Ayudia Makeup', 'Jln. Bukit kemiling permai blok t nawar no76', '08526892279', 'Ayudia@gmail.com', 'ayudia.jpg', 'Ayudia', '-5.380600', '105.214460', 'mua'),
	(5, 'Mumayizah Makeup ', 'Jln. Mawar merah, harapan Jaya kecamatan sukarame bandar lampung ', '085841912901', 'Mumayizah@gmail.com', 'muwawijah.jpg', 'Mumayizah', '-5.369300', '105.298960', 'mua'),
	(6, 'Allforyou Makeup ', 'Jl.rajabasa', '081271108454', 'Allforyou@gmail.com', 'allforyou.png', 'Allforyou ', '-5.3743992', '105.2309282', 'mua'),
	(7, 'Aan Mua', 'Jln. Ruko kamboja no 2 J. A salon (depan yayasan budi luhur / samping alfamart) ', '08117995050', 'Aan@gmail.com', 'aan.jpg', 'Aan mua', '-5.356450', '105.253270', 'salon'),
	(10, 'Rika Ridayanti MUA', 'Jl. Perumahan bering raya, kemiling', '08996411951', 'rika@gmail.com', 'rika.png', 'RIka', '-5.397120', '105.206510', 'salon'),
	(11, 'Annisa MUA', 'Jl.mr.moch.roem (dekat hotel Sheraton)', '08121245678', 'anisa@gmail.com', 'anisa.png', 'Anisa', '-5.429750', '105.262270', 'salon'),
	(12, 'Anastasia mua', 'jln kimaja no.22 wayhalim', '08221256889', 'anastasia@gmail.com', 'anastia.jpg', 'Anastasia ', '-5.377040', '105.278610', 'salon'),
	(13, 'Hani mua', 'jln  teuku umar 100 meter setelah rs advent (di kittyhijab)', '082281195559', 'hani@gmail.com', 'hani.jpg', 'Hani', '-5.429750', '105.262270', 'salon'),
	(14, 'Salon intan ', 'jln raden intan no 56 tanjung karang, Bandar lampung', '085269225350', 'intan@gmail.com', 'intan.png', 'Hendra Bhastian', '-5.416230', '105.258310', 'salon'),
	(15, 'Christella salon', 'jln ratu dibalau, way kandis, tanjung senang Bandar lampung', '08223435678', 'cSalon@mail.com', 'p.png', 'Christella ', '-5.354580', '105.289421', 'salon'),
	(16, 'Althaf makeup', 'jln sadewo no.64 sawah lama, tanjung karang timur Bandar lampung', '0813112346786', 'Althaf@gmail.com', 'yt.jpg', 'Althaf ', '-5.409200', '105.265472', 'salon'),
	(17, 'Donna Endro Mua', 'Jl Wartawan Gg.Manis No.1 D Gunung Sulah, Sukarame', '081369569494', 'donnaendro@gmail.com', 'donna.jpg', 'Donna', '-5.392295', '105.273383', 'salon'),
	(21, 'Soraya Makeup', 'Jalan Ikan Paus no. 56 Teluk Betung Selatan', '08975155116', 'makeupbysoraya@gmail.com', 'm.jpg', 'Soraya', '-5.446745', '105.2584', 'salon'),
	(24, 'Ulfa Makeup ', 'jl Kaliawi, kec. Tanjung karang pusat', '082182929921', 'ulfarizqi@gmail.com', 'ulfamua.jpg', 'Ulfa Rizqi', '-5.412316', '105.241926', 'mua'),
	(25, 'Shine makeup', 'Jl Tunggul Ametung no.41, kedaton', '081283260707', 'Monaistiara@gmail.com', 'image-3d89e3bd-5f22-4b0a-9c1b-04bf7c0a83a2.jpg', 'Mona Istiara', '-5.383573', '105.262432', 'salon'),
	(26, 'Anjun Herly', 'Jl Hi.Khomarudin Gg.Nitiuda Rajabasa Raya ', '08123456789', 'anjunherly@gmail.com', 'anjun.jpg', 'Anjun Herly', '-5.355305', '105.239750', 'salon'),
	(31, 'Beauty salon', 'Jl za pagar alam kedaton no9-11', '081245312798', 'Beauty@gmail.com', 'image-60366d0e-fa5a-434f-b611-19a5c572ace8.jpg', 'Vera', '-5.386555', '105.2589882', 'salon'),
	(33, 'Tes Salon', 'Bekasi', '0855', 'Rindangramadhan10@gmail.com', 'image-2b868408-2237-4ebc-a1b8-431c06d529f9.jpg', 'Tess', '-6.2877994', '106.9231415', 'salon');
/*!40000 ALTER TABLE `tbl_salon` ENABLE KEYS */;

-- Dumping structure for table db_salon_rn.tbl_salon_terdekat
DROP TABLE IF EXISTS `tbl_salon_terdekat`;
CREATE TABLE IF NOT EXISTS `tbl_salon_terdekat` (
  `id_salon_terdekat` int(30) NOT NULL AUTO_INCREMENT,
  `id_salon_t` int(40) DEFAULT NULL,
  `id_user_t` int(40) DEFAULT NULL,
  `distance_text` varchar(100) DEFAULT NULL,
  `distance_value` int(100) DEFAULT NULL,
  `duration_value` int(100) DEFAULT NULL,
  `duation_text` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_salon_terdekat`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_salon_terdekat: ~52 rows (approximately)
DELETE FROM `tbl_salon_terdekat`;
/*!40000 ALTER TABLE `tbl_salon_terdekat` DISABLE KEYS */;
INSERT INTO `tbl_salon_terdekat` (`id_salon_terdekat`, `id_salon_t`, `id_user_t`, `distance_text`, `distance_value`, `duration_value`, `duation_text`) VALUES
	(89, 6, 0, '4.6 mi                ', 7381, 1196, '20 mins'),
	(90, 2, 0, '3.8 mi                ', 6096, 1052, '18 mins'),
	(91, 1, 0, '7.3 mi                ', 11774, 1779, '30 mins'),
	(92, 4, 0, '1.2 mi                ', 1919, 388, '6 mins'),
	(93, 3, 0, '6.0 mi                ', 9724, 1367, '23 mins'),
	(94, 5, 0, '4.5 mi                ', 7186, 1116, '19 mins'),
	(95, 8, 0, '9.2 mi                ', 14821, 2233, '37 mins'),
	(96, 7, 0, '5.9 mi                ', 9535, 1448, '24 mins'),
	(97, 9, 0, '4.7 mi                ', 7570, 1056, '18 mins'),
	(98, 6, 0, '4.6 mi                ', 7381, 1196, '20 mins'),
	(99, 10, 0, '6.2 mi                ', 9989, 1602, '27 mins'),
	(119, 9, 8, '4.7 mi                ', 7570, 1056, '18 mins'),
	(120, 1, 8, '7.3 mi                ', 11774, 1779, '30 mins'),
	(121, 5, 8, '4.5 mi                ', 7186, 1116, '19 mins'),
	(122, 3, 8, '6.0 mi                ', 9724, 1367, '23 mins'),
	(123, 6, 8, '4.6 mi                ', 7381, 1196, '20 mins'),
	(124, 4, 8, '1.2 mi                ', 1919, 388, '6 mins'),
	(125, 2, 8, '3.8 mi                ', 6096, 1052, '18 mins'),
	(126, 9, 8, '4.7 mi                ', 7570, 1056, '18 mins'),
	(127, 8, 8, '9.2 mi                ', 14821, 2233, '37 mins'),
	(128, 7, 8, '5.9 mi                ', 9535, 1448, '24 mins'),
	(129, 10, 8, '6.2 mi                ', 9989, 1602, '27 mins'),
	(130, 2, 0, '3.8 mi                ', 6096, 1052, '18 mins'),
	(131, 1, 0, '7.3 mi                ', 11774, 1779, '30 mins'),
	(132, 4, 0, '1.2 mi                ', 1919, 388, '6 mins'),
	(133, 5, 0, '4.5 mi                ', 7186, 1116, '19 mins'),
	(134, 3, 0, '6.0 mi                ', 9724, 1367, '23 mins'),
	(135, 9, 0, '4.7 mi                ', 7570, 1056, '18 mins'),
	(136, 6, 0, '4.6 mi                ', 7381, 1196, '20 mins'),
	(137, 8, 0, '9.2 mi                ', 14821, 2233, '37 mins'),
	(138, 7, 0, '5.9 mi                ', 9535, 1448, '24 mins'),
	(139, 10, 0, '6.2 mi                ', 9989, 1602, '27 mins'),
	(140, 2, 8, '3.8 mi                ', 6096, 1052, '18 mins'),
	(141, 1, 8, '7.3 mi                ', 11774, 1779, '30 mins'),
	(142, 3, 8, '6.0 mi                ', 9724, 1367, '23 mins'),
	(143, 5, 8, '4.5 mi                ', 7186, 1116, '19 mins'),
	(144, 4, 8, '1.2 mi                ', 1919, 388, '6 mins'),
	(145, 6, 8, '4.6 mi                ', 7381, 1196, '20 mins'),
	(146, 9, 8, '4.7 mi                ', 7570, 1056, '18 mins'),
	(147, 7, 8, '5.9 mi                ', 9535, 1448, '24 mins'),
	(148, 8, 8, '9.2 mi                ', 14821, 2233, '37 mins'),
	(149, 10, 8, '6.2 mi                ', 9989, 1602, '27 mins'),
	(150, 4, 0, '1.2 mi                ', 1888, 419, '7 mins'),
	(151, 5, 0, '4.4 mi                ', 7155, 1147, '19 mins'),
	(152, 2, 0, '4.1 mi                ', 6642, 1141, '19 mins'),
	(153, 1, 0, '7.3 mi                ', 11743, 1811, '30 mins'),
	(154, 3, 0, '6.0 mi                ', 9693, 1398, '23 mins'),
	(155, 8, 0, '9.2 mi                ', 14790, 2265, '38 mins'),
	(156, 9, 0, '4.7 mi                ', 7539, 1086, '18 mins'),
	(157, 7, 0, '5.9 mi                ', 9504, 1481, '25 mins'),
	(158, 6, 0, '4.6 mi                ', 7350, 1227, '20 mins'),
	(159, 10, 0, '6.2 mi                ', 9958, 1634, '27 mins');
/*!40000 ALTER TABLE `tbl_salon_terdekat` ENABLE KEYS */;

-- Dumping structure for table db_salon_rn.tbl_setting
DROP TABLE IF EXISTS `tbl_setting`;
CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_setting: ~0 rows (approximately)
DELETE FROM `tbl_setting`;
/*!40000 ALTER TABLE `tbl_setting` DISABLE KEYS */;
INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
	(1, 'Tampil Menu', 'ya');
/*!40000 ALTER TABLE `tbl_setting` ENABLE KEYS */;

-- Dumping structure for table db_salon_rn.tbl_user
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_admin` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_user: ~30 rows (approximately)
DELETE FROM `tbl_user`;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id_admin`, `nama`, `no_telp`, `email`, `password`, `username`, `level`) VALUES
	(1, 'Mutiara intana makeup', '089631072185', 'mutiara@gmail.com', 'mutiara', 'mutiara', 'salon'),
	(4, 'Ayudia Makeup', '08526892279', 'Ayudia@gmail.com', 'ayudia', 'ayudia', 'salon'),
	(5, 'Mumayizah Makeup ', '085841912901', 'Mumayizah@gmail.com', 'mumayizah', 'mumayizah', 'salon'),
	(6, 'Allforyou Makeup ', '081271108454', 'Allforyou@gmail.com', 'allforyou', 'allforyou', 'salon'),
	(7, 'Aan Mua', '08117995050', 'Aan@gmail.com', 'aan', 'aan', 'salon'),
	(8, 'admin', '080', 'admin@gmail.com', 'admin', 'admin', 'admin'),
	(9, 'vvre', '423', '234vf', 'gffg', '', 'salon'),
	(10, 'Rika Ridayanti MUA', '08996411951', 'rika@gmail.com', 'rika', 'rika', 'salon'),
	(11, 'Annisa MUA', '08121245678', 'anisa@gmail.com', 'anisa', 'anisa', 'salon'),
	(12, 'Anastasia mua', '08221256889', 'anastasia@gmail.com', 'anastasia', 'anastasia', 'salon'),
	(13, 'Hani mua', '082281195559', 'hani@gmail.com', 'Hani', 'Hani', 'salon'),
	(14, 'Salon intan ', '085269225350', 'intan@gmail.com', 'intan', 'intan', 'salon'),
	(15, 'Christella salon', '08223435678', 'cSalon@mail.com', 'christella', 'christella', 'salon'),
	(16, 'Althaf makeup', '0813112346786', 'Althaf@gmail.com', 'althaf', 'althaf', 'salon'),
	(17, 'Donna Endro Mua', '081369569494', 'donnaendro@gmail.com', 'just', 'just', 'salon'),
	(18, 'G', '55', 'V', 'U', 'U', 'pelanggan'),
	(19, 'Anto', '089656236', 'Fonysaputra95@gmail.com', 'T', 'T', 'pelanggan'),
	(20, 'Vera', '081377779637', 'Verayanti611@gmail.com', 'Vera123', 'Verayanti', 'pelanggan'),
	(21, 'Soraya Makeup', '08975155116', 'makeupbysoraya@gmail.com', 'soraya', 'soraya', 'salon'),
	(22, 'Zahrana', '081278364968', 'Rana12@gmail.com', 'Zahrana', 'Zahrana', 'pelanggan'),
	(24, 'Ulfa Makeup ', '082182929921', 'ulfarizqi@gmail.com', 'ulfa', 'ulfa', 'salon'),
	(25, 'Shine makeup', '081283260707', 'Monaistiara@gmail.com', 'Shine', 'Shine', 'salon'),
	(26, 'Anjun Herly', '08123456789', 'anjunherly@gmail.com', 'anjun', 'anjun', 'salon'),
	(27, 'Anisa', '082186345294', 'Anisa123@gmail.com', 'Anisa', 'Anisa', 'pelanggan'),
	(28, 'Angga', '0852225464', 'Abdul@gmail.com', 'Abdul', 'Abdul', 'pelanggan'),
	(29, 'Antonn', '085245454', 'fonysaputra16@gmail.com', 'L', 'L', 'pelanggan'),
	(30, 'Dila', '082123456798', 'Dila12@gmail.com', 'Dila', 'Dila', 'pelanggan'),
	(31, 'Beauty salon', '081245312798', 'Beauty@gmail.com', 'Beauty', 'Beauty', 'salon'),
	(32, 'Rifki', '08521245744', 'G@gmail.com', 'G', 'G', 'pelanggan'),
	(33, 'Tes Salon', '0855', 'Rindangramadhan10@gmail.com', '123', 'Tes', 'salon');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

-- Dumping structure for table db_salon_rn.tbl_user_admin
DROP TABLE IF EXISTS `tbl_user_admin`;
CREATE TABLE IF NOT EXISTS `tbl_user_admin` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_user_admin: ~2 rows (approximately)
DELETE FROM `tbl_user_admin`;
/*!40000 ALTER TABLE `tbl_user_admin` DISABLE KEYS */;
INSERT INTO `tbl_user_admin` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
	(1, 'Admin Satu', 'admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y'),
	(3, 'Muhammad hafidz Muzaki', 'hafid@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', '7.png', 2, 'y');
/*!40000 ALTER TABLE `tbl_user_admin` ENABLE KEYS */;

-- Dumping structure for table db_salon_rn.tbl_user_level
DROP TABLE IF EXISTS `tbl_user_level`;
CREATE TABLE IF NOT EXISTS `tbl_user_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_salon_rn.tbl_user_level: ~0 rows (approximately)
DELETE FROM `tbl_user_level`;
/*!40000 ALTER TABLE `tbl_user_level` DISABLE KEYS */;
INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
	(1, 'Super Admin');
/*!40000 ALTER TABLE `tbl_user_level` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
