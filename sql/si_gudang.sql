-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Jan 2017 pada 07.25
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `si_gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kode_brg` varchar(6) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `jml_brg` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `nip_bag_gudang` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_brg`, `nama_brg`, `kode_kategori`, `merk`, `jml_brg`, `harga`, `nip_bag_gudang`, `id_supplier`) VALUES
('hph001', 'Handphone Samsung Ji ace', 2, 'samsung', 18, 2000000, '01001', 'S0002'),
('ltp001', 'laptop acer X567V', 1, 'acer', 48, 8000000, '01001', 'S0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_bk`
--

CREATE TABLE IF NOT EXISTS `catatan_bk` (
  `kode_catatan_bk` varchar(12) NOT NULL,
  `jml_bk` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `kode_brg` varchar(6) NOT NULL,
  `nip_bag_pemasaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `catatan_bk`
--

INSERT INTO `catatan_bk` (`kode_catatan_bk`, `jml_bk`, `tgl`, `kode_brg`, `nip_bag_pemasaran`) VALUES
('0170111001', 4, '2017-01-11', 'hph001', '03001'),
('0170111002', 10, '2017-01-11', 'ltp001', '03001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_bm`
--

CREATE TABLE IF NOT EXISTS `catatan_bm` (
  `kode_catatan_bm` varchar(12) NOT NULL,
  `jml_bm` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `kode_brg` varchar(6) NOT NULL,
  `nip_bag_keuangan` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `catatan_bm`
--

INSERT INTO `catatan_bm` (`kode_catatan_bm`, `jml_bm`, `tgl`, `kode_brg`, `nip_bag_keuangan`, `status`) VALUES
('1170111001', 8, '2017-01-11', 'ltp001', '02001', 1),
('1170111002', 20, '2017-01-11', 'ltp001', '02001', 1),
('1170111003', 2, '2017-01-11', 'hph001', '02001', 1),
('1170112001', 30, '2017-01-12', 'ltp001', '02001', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`kode_kategori` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `singkatan` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama`, `singkatan`) VALUES
(1, 'laptop', 'ltp'),
(2, 'handphone', 'hph'),
(3, 'komputer', 'kpr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` varchar(8) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `user_login_id` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_depan`, `user_login_id`, `keterangan`, `nama_belakang`, `tgl_lahir`, `umur`) VALUES
('00001', 'yayat', 4, 'admin', 'abdulloh', '1972-06-08', 0),
('01001', 'faisal', 1, 'bag_gudang', 'fathurrohman', '2016-12-13', 20),
('01002', 'dfbdfb', 51, 'bag_gudang', 'ghkg', '2017-01-13', 0),
('02001', 'dika', 3, 'bag_keuangan', 'asdf', '2016-12-08', 32),
('03001', 'isal', 2, 'bag_pemasaran', 'asffa', '2016-12-15', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `nama_perusahaan`) VALUES
('S0002', 'faisal', 'yanto,inccc'),
('S001', 'yayat', 'rosss inc'),
('S003', 'aulias', 'super.inc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier_internasional`
--

CREATE TABLE IF NOT EXISTS `supplier_internasional` (
  `id_supplier` varchar(10) NOT NULL,
  `asal_negara` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier_internasional`
--

INSERT INTO `supplier_internasional` (`id_supplier`, `asal_negara`) VALUES
('S001', 'inggriss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier_local`
--

CREATE TABLE IF NOT EXISTS `supplier_local` (
  `id_supplier` varchar(10) NOT NULL,
  `asal_kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier_local`
--

INSERT INTO `supplier_local` (`id_supplier`, `asal_kota`) VALUES
('S0002', 'bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunggakan`
--

CREATE TABLE IF NOT EXISTS `tunggakan` (
`kode_tunggakan` int(11) NOT NULL,
  `alasan` varchar(200) NOT NULL,
  `tgl_jatuhTempo` date NOT NULL,
  `kode_catatan_bm` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tunggakan`
--

INSERT INTO `tunggakan` (`kode_tunggakan`, `alasan`, `tgl_jatuhTempo`, `kode_catatan_bm`) VALUES
(1, 'uang belum diutranfer', '2017-01-21', '1170112001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
`id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`id`, `password`, `role`, `username`) VALUES
(1, 'ae2b1fca515949e5d54fb22b8ed95575', 1, 'faisal'),
(2, 'ae2b1fca515949e5d54fb22b8ed95575', 3, 'pemasaran'),
(3, 'ae2b1fca515949e5d54fb22b8ed95575', 2, 'dika'),
(4, 'ae2b1fca515949e5d54fb22b8ed95575', 0, 'admin'),
(51, 'fbe4dc9250d78bcb5bc34164f8b74d2c', 1, 'vvvvv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`kode_brg`), ADD KEY `fk_kode_kategori` (`kode_kategori`), ADD KEY `fk_nip_bag_gudang` (`nip_bag_gudang`), ADD KEY `fk_id_supplier` (`id_supplier`);

--
-- Indexes for table `catatan_bk`
--
ALTER TABLE `catatan_bk`
 ADD KEY `fk_nip_bag_pemasaran` (`nip_bag_pemasaran`), ADD KEY `fk_kode_brg_bk` (`kode_brg`);

--
-- Indexes for table `catatan_bm`
--
ALTER TABLE `catatan_bm`
 ADD PRIMARY KEY (`kode_catatan_bm`), ADD KEY `fk_nip_bag_keuangan` (`nip_bag_keuangan`), ADD KEY `fk_kode_brg` (`kode_brg`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`nip`), ADD KEY `fk_user_login_id` (`user_login_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `supplier_internasional`
--
ALTER TABLE `supplier_internasional`
 ADD KEY `fk_supplier_internasional` (`id_supplier`);

--
-- Indexes for table `supplier_local`
--
ALTER TABLE `supplier_local`
 ADD KEY `fk_supplier_local` (`id_supplier`);

--
-- Indexes for table `tunggakan`
--
ALTER TABLE `tunggakan`
 ADD PRIMARY KEY (`kode_tunggakan`), ADD KEY `fk_kode_catatan_bm` (`kode_catatan_bm`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tunggakan`
--
ALTER TABLE `tunggakan`
MODIFY `kode_tunggakan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
ADD CONSTRAINT `fk_id_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
ADD CONSTRAINT `fk_kode_kategori` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`),
ADD CONSTRAINT `fk_nip_bag_gudang` FOREIGN KEY (`nip_bag_gudang`) REFERENCES `pegawai` (`nip`);

--
-- Ketidakleluasaan untuk tabel `catatan_bk`
--
ALTER TABLE `catatan_bk`
ADD CONSTRAINT `fk_kode_brg_bk` FOREIGN KEY (`kode_brg`) REFERENCES `barang` (`kode_brg`),
ADD CONSTRAINT `fk_nip_bag_pemasaran` FOREIGN KEY (`nip_bag_pemasaran`) REFERENCES `pegawai` (`nip`);

--
-- Ketidakleluasaan untuk tabel `catatan_bm`
--
ALTER TABLE `catatan_bm`
ADD CONSTRAINT `fk_kode_brg` FOREIGN KEY (`kode_brg`) REFERENCES `barang` (`kode_brg`),
ADD CONSTRAINT `fk_nip_bag_keuangan` FOREIGN KEY (`nip_bag_keuangan`) REFERENCES `pegawai` (`nip`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
ADD CONSTRAINT `fk_user_login_id` FOREIGN KEY (`user_login_id`) REFERENCES `user_login` (`id`);

--
-- Ketidakleluasaan untuk tabel `supplier_internasional`
--
ALTER TABLE `supplier_internasional`
ADD CONSTRAINT `fk_supplier_internasional` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `supplier_local`
--
ALTER TABLE `supplier_local`
ADD CONSTRAINT `fk_supplier_local` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `tunggakan`
--
ALTER TABLE `tunggakan`
ADD CONSTRAINT `fk_kode_catatan_bm` FOREIGN KEY (`kode_catatan_bm`) REFERENCES `catatan_bm` (`kode_catatan_bm`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
