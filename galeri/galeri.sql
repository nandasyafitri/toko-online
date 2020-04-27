-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 05:31 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeri`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(30) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `username`, `password`) VALUES
(8, 'Alda Elvira', 'adminn', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(30) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(30) NOT NULL,
  `id_produk` int(30) NOT NULL,
  `judul_foto` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `id_produk`, `judul_foto`, `foto`) VALUES
(1, 2, 'Foto 1', '1494.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon_pelanggan` varchar(30) DEFAULT NULL,
  `alamat_pelanggan` text,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(30) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(50) DEFAULT NULL,
  `rekening_pelanggan` varchar(50) DEFAULT NULL,
  `bukti_bayar` varchar(50) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon_pelanggan`, `alamat_pelanggan`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `tanggal_post`) VALUES
(1, 2, 'Alia', 'alia@gmail.com', '0823456785', '							      		Kualasimpang						      	', '26042020EOPVHRFS', '2020-04-26 00:00:00', 15000, 'Belum', NULL, NULL, NULL, NULL, '2020-04-26 18:31:57'),
(4, 2, 'Alia', 'alia@gmail.com', '0823456785', '							      		Kualasimpang						      	', '26042020HDBANJQP', '2020-04-26 00:00:00', 15000, 'Belum', NULL, NULL, NULL, NULL, '2020-04-26 18:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(30) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `slug_kategori` varchar(100) NOT NULL,
  `urutan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kategori`, `urutan`) VALUES
(1, 'Pakaian', 'pakaian', '1'),
(2, 'Tas', 'tas', '2'),
(3, 'Dan lain-lain', 'dan-lain-lain', '3'),
(4, 'Makanan', 'makanan', '4');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(30) NOT NULL,
  `id_produk` int(30) NOT NULL,
  `id_pelanggan` int(30) NOT NULL,
  `jumlah` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(30) NOT NULL,
  `namaweb` varchar(50) NOT NULL,
  `tagline` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `keywords` text NOT NULL,
  `metatext` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `logo` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `rekening_pembayaran` varchar(30) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Galeri Ajang Ambe', 'Produk UMK', 'galeri@gmail.com', 'Galeri Ajang Ambe', '												galeri ajang ambe				', '												ajang ambe', '6222-3443-5566', '												Gampong Bundar, Karang Baru, Aceh Tami', 'https://www.facebook.com/Galeri-Pertama-Ajang-Ambe-Aceh-Tamiang', 'https://www.instagram.com/galeriajangambe', '												Pusat oleh-oleh Aceh Tamiang		', 'ajang.jpg', 'ajang1.jpg', '												BRI 03893872378476', '2020-03-20 03:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(30) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `telepon_pelanggan` varchar(20) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `tanggal_daftar` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon_pelanggan`, `alamat_pelanggan`, `tanggal_daftar`) VALUES
(1, 'Alda Elvira', 'alda@gmail.com', '827ccb0eea8a706c4c34a16891f84e', '0876567890', '	Aceh						      	', '2020-04-26 08:05:46.000000'),
(2, 'Alia', 'alia@gmail.com', 'a01610228fe998f515a72dd730294d', '0823456785', '	Kualasimpang						      	', '2020-04-26 18:31:28.000000');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembelian` int(30) NOT NULL,
  `nama_bayar` varchar(50) NOT NULL,
  `bank_bayar` varchar(30) NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `jumlah_bayar` int(30) NOT NULL,
  `bukti_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `deadline_pembelian` datetime NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status_pembelian` enum('pending','lunas','kirim','selesai','batal') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian` int(30) NOT NULL,
  `id_produk` int(30) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `nama_beli` varchar(50) NOT NULL,
  `harga_beli` int(30) NOT NULL,
  `berat_beli` int(30) NOT NULL,
  `subbharga_beli` int(30) NOT NULL,
  `subberat_beli` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pembelian` int(30) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `telepon_penerima` int(30) NOT NULL,
  `provinsi_penerima` varchar(50) NOT NULL,
  `distrik_penerima` varchar(50) NOT NULL,
  `tipe_penerima` enum('kota','kabupaten') NOT NULL,
  `kodepos_penerima` varchar(5) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `ekspedisi_pengiriman` varchar(30) NOT NULL,
  `paket_pengiriman` varchar(30) NOT NULL,
  `estimasi_pengiriman` varchar(30) NOT NULL,
  `berat_pengiriman` int(30) NOT NULL,
  `ongkos_pengiriman` int(30) NOT NULL,
  `resi_pengiriman` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(30) NOT NULL,
  `id_kategori` int(30) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `slug_produk` varchar(100) NOT NULL,
  `kode_produk` varchar(30) NOT NULL,
  `harga_produk` int(15) NOT NULL,
  `berat_produk` int(15) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(15) NOT NULL,
  `status_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `slug_produk`, `kode_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`, `status_produk`) VALUES
(1, 2, 'Tas 1', 'tas-1-ts01', 'ts01', 30000, 600, '20200317_115341.jpg', '<p>tas bagus</p>\r\n', 2, 'Publish'),
(2, 3, 'Rubik', 'rubik-rb001', 'rb001', 15000, 100, 'rubik.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&nbsp;quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 3, 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(50) NOT NULL,
  `id_pelanggan` int(30) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(30) NOT NULL,
  `harga` int(30) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `total_harga` int(30) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`) VALUES
(1, 2, '26042020HDBANJQP', 2, 15000, 1, 15000, '2020-04-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id_umkm` int(30) NOT NULL,
  `nama_pengusaha` varchar(50) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `nama_umkm` varchar(50) NOT NULL,
  `jenis_umkm` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id_umkm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id_umkm` int(30) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD CONSTRAINT `pembelian_produk_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
