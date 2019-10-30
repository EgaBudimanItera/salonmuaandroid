-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 09:03 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `kd_karyawan` varchar(10) NOT NULL DEFAULT '',
  `username` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_karyawan`, `username`, `password`, `nama`, `email`, `jabatan`, `status`) VALUES
('1234', 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'bambang', 'pimpinan@gmail.com', 'Pimpinan', 'Y'),
('1234321', 'resepsionis', '3aeff485f68b360d076de3d73f9247ad', 'bayu', 'resepsionis@gmail.com', 'resepsionis', 'Y'),
('ADM01', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', 'admin', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE IF NOT EXISTS `tbl_akun` (
  `kd_akun` varchar(2) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `nm_akun` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`kd_akun`, `jenis`, `nm_akun`) VALUES
('1', 'pengeluaran', 'Beban Usaha'),
('2', 'penerimaan', 'Pendapatan Hotel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE IF NOT EXISTS `tbl_class` (
  `kd_class` varchar(5) NOT NULL DEFAULT '',
  `nm_class` varchar(10) NOT NULL,
  `harga` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`kd_class`, `nm_class`, `harga`) VALUES
('DEL', 'Deluxe', '180000'),
('EXE', 'Executive', '200000'),
('STD', 'Standard', '120000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dtl_reservasi`
--

CREATE TABLE IF NOT EXISTS `tbl_dtl_reservasi` (
  `kd_dtl` int(11) NOT NULL,
  `kd_res` varchar(20) NOT NULL,
  `desk` text NOT NULL,
  `jml_bayar` varchar(12) NOT NULL,
  `status_dtl` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fpengeluaran`
--

CREATE TABLE IF NOT EXISTS `tbl_fpengeluaran` (
`kd_fpeng` int(11) NOT NULL,
  `tgl_fpeng` datetime NOT NULL,
  `ket` varchar(20) NOT NULL,
  `gambarf` varchar(20) NOT NULL,
  `kd_karyawan` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kamar`
--

CREATE TABLE IF NOT EXISTS `tbl_kamar` (
  `kd_kamar` int(4) NOT NULL DEFAULT '0',
  `kd_class` varchar(5) NOT NULL,
  `fasilitas` text NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`kd_kamar`, `kd_class`, `fasilitas`, `status`) VALUES
(101, 'EXE', '<p>AC</p>\r\n<p>&nbsp;</p>', 'R'),
(102, 'EXE', '<p>AC</p>\r\n<p>&nbsp;</p>', 'R'),
(201, 'DEL', '<p>AC</p>\r\n<p>&nbsp;</p>', 'R'),
(301, 'STD', '<p>Kipas</p>', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas`
--

CREATE TABLE IF NOT EXISTS `tbl_kas` (
  `kd_kas` varchar(20) NOT NULL,
  `prihal` text NOT NULL,
  `jml_kas` varchar(12) NOT NULL,
  `ket_kas` varchar(12) NOT NULL,
  `pem_kas` varchar(11) NOT NULL,
  `tgl_kas` datetime NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `reff` varchar(11) NOT NULL,
  `ketapp` varchar(2) NOT NULL,
  `bill` text NOT NULL,
  `kd_akun` varchar(2) NOT NULL,
  `kd_karyawan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_kecil`
--

CREATE TABLE IF NOT EXISTS `tbl_kas_kecil` (
  `kd_kaskecil` varchar(8) NOT NULL,
  `tanggal` datetime NOT NULL,
  `rincian` varchar(20) NOT NULL,
  `debit` varchar(18) NOT NULL,
  `kredit` varchar(18) NOT NULL,
  `ket_kaskecil` varchar(12) NOT NULL,
  `bln_kaskecil` varchar(2) NOT NULL,
  `thn_kaskecil` varchar(4) NOT NULL,
  `kd_karawan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kas_kecil`
--

INSERT INTO `tbl_kas_kecil` (`kd_kaskecil`, `tanggal`, `rincian`, `debit`, `kredit`, `ket_kaskecil`, `bln_kaskecil`, `thn_kaskecil`, `kd_karawan`) VALUES
('1210101', '2018-01-21 20:06:00', 'isi kas', '1500000', '1500000', 'pengisian', '01', '2018', 'ADM01'),
('6210102', '2018-01-21 20:50:00', 'beli listrik', '100000', '100000', 'pengeluaran', '01', '2018', 'ADM01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE IF NOT EXISTS `tbl_paket` (
  `kd_paket` varchar(6) NOT NULL,
  `ket_paket` text NOT NULL,
  `harga_paket` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`kd_paket`, `ket_paket`, `harga_paket`) VALUES
('PKT001', 'Tidak Ada Paket', '0'),
('PKT002', 'Extra Bed', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservasi`
--

CREATE TABLE IF NOT EXISTS `tbl_reservasi` (
  `kd_res` varchar(20) NOT NULL DEFAULT '',
  `kd_tamu` varchar(16) NOT NULL,
  `tgl_booking` datetime NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_keluar` datetime NOT NULL,
  `keterangan` varchar(2) NOT NULL COMMENT 'D=Draft || L= Lunas||DP= Belum',
  `jml_dp` varchar(12) NOT NULL,
  `disc` varchar(10) NOT NULL,
  `tot_bayar` varchar(12) NOT NULL,
  `kd_karyawan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_res_kamar`
--

CREATE TABLE IF NOT EXISTS `tbl_res_kamar` (
`kd_res_kamar` int(11) NOT NULL,
  `kd_res` varchar(20) NOT NULL,
  `kd_kamar` int(4) NOT NULL,
  `bnyk_kamar` varchar(3) NOT NULL,
  `jml_hari` int(11) NOT NULL,
  `h_kamar` varchar(12) NOT NULL,
  `subtot_kamar` varchar(12) NOT NULL,
  `tgl_ci` varchar(25) NOT NULL,
  `tgl_co` varchar(25) NOT NULL,
  `stts_reskamar` varchar(2) NOT NULL COMMENT 'P=Pesan|B=Booked|S=Selesai'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_res_paket`
--

CREATE TABLE IF NOT EXISTS `tbl_res_paket` (
`kd_res_paket` int(11) NOT NULL,
  `kd_res` varchar(20) NOT NULL,
  `kd_paket` varchar(6) NOT NULL,
  `bnyk_paket` varchar(3) NOT NULL,
  `h_paket` varchar(12) NOT NULL,
  `subtot_pakt` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE IF NOT EXISTS `tbl_tamu` (
  `kd_tamu` varchar(16) NOT NULL,
  `no_iden` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `usia` int(2) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `domisili` varchar(50) NOT NULL,
  `telpon` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`kd_karyawan`);

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
 ADD PRIMARY KEY (`kd_akun`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
 ADD PRIMARY KEY (`kd_class`);

--
-- Indexes for table `tbl_dtl_reservasi`
--
ALTER TABLE `tbl_dtl_reservasi`
 ADD PRIMARY KEY (`kd_dtl`), ADD KEY `kd_res` (`kd_res`);

--
-- Indexes for table `tbl_fpengeluaran`
--
ALTER TABLE `tbl_fpengeluaran`
 ADD PRIMARY KEY (`kd_fpeng`);

--
-- Indexes for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
 ADD PRIMARY KEY (`kd_kamar`), ADD KEY `kd_class` (`kd_class`);

--
-- Indexes for table `tbl_kas`
--
ALTER TABLE `tbl_kas`
 ADD PRIMARY KEY (`kd_kas`), ADD KEY `kd_akun` (`kd_akun`);

--
-- Indexes for table `tbl_kas_kecil`
--
ALTER TABLE `tbl_kas_kecil`
 ADD PRIMARY KEY (`kd_kaskecil`), ADD KEY `kd_karawan` (`kd_karawan`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
 ADD PRIMARY KEY (`kd_paket`);

--
-- Indexes for table `tbl_reservasi`
--
ALTER TABLE `tbl_reservasi`
 ADD PRIMARY KEY (`kd_res`), ADD KEY `kd_tamu` (`kd_tamu`), ADD KEY `kd_karyawan` (`kd_karyawan`);

--
-- Indexes for table `tbl_res_kamar`
--
ALTER TABLE `tbl_res_kamar`
 ADD PRIMARY KEY (`kd_res_kamar`), ADD KEY `kd_res` (`kd_res`), ADD KEY `kd_kamar` (`kd_kamar`);

--
-- Indexes for table `tbl_res_paket`
--
ALTER TABLE `tbl_res_paket`
 ADD PRIMARY KEY (`kd_res_paket`), ADD KEY `kd_paket` (`kd_paket`), ADD KEY `kd_res` (`kd_res`);

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
 ADD PRIMARY KEY (`kd_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_fpengeluaran`
--
ALTER TABLE `tbl_fpengeluaran`
MODIFY `kd_fpeng` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_res_kamar`
--
ALTER TABLE `tbl_res_kamar`
MODIFY `kd_res_kamar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_res_paket`
--
ALTER TABLE `tbl_res_paket`
MODIFY `kd_res_paket` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_dtl_reservasi`
--
ALTER TABLE `tbl_dtl_reservasi`
ADD CONSTRAINT `tbl_dtl_reservasi_ibfk_1` FOREIGN KEY (`kd_res`) REFERENCES `tbl_reservasi` (`kd_res`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
ADD CONSTRAINT `tbl_kamar_ibfk_1` FOREIGN KEY (`kd_class`) REFERENCES `tbl_class` (`kd_class`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kas`
--
ALTER TABLE `tbl_kas`
ADD CONSTRAINT `tbl_kas_ibfk_1` FOREIGN KEY (`kd_akun`) REFERENCES `tbl_akun` (`kd_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kas_kecil`
--
ALTER TABLE `tbl_kas_kecil`
ADD CONSTRAINT `tbl_kas_kecil_ibfk_1` FOREIGN KEY (`kd_karawan`) REFERENCES `tbl_admin` (`kd_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_reservasi`
--
ALTER TABLE `tbl_reservasi`
ADD CONSTRAINT `tbl_reservasi_ibfk_3` FOREIGN KEY (`kd_karyawan`) REFERENCES `tbl_admin` (`kd_karyawan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_res_kamar`
--
ALTER TABLE `tbl_res_kamar`
ADD CONSTRAINT `tbl_res_kamar_ibfk_1` FOREIGN KEY (`kd_res`) REFERENCES `tbl_reservasi` (`kd_res`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_res_kamar_ibfk_2` FOREIGN KEY (`kd_kamar`) REFERENCES `tbl_kamar` (`kd_kamar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_res_paket`
--
ALTER TABLE `tbl_res_paket`
ADD CONSTRAINT `tbl_res_paket_ibfk_1` FOREIGN KEY (`kd_paket`) REFERENCES `tbl_paket` (`kd_paket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `tbl_res_paket_ibfk_2` FOREIGN KEY (`kd_res`) REFERENCES `tbl_reservasi` (`kd_res`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
