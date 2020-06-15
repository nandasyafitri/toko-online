-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2020 pada 01.28
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(30) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `username`, `password`) VALUES
(7, 'nanda', 'nanda', 'c4ca4238a0b923820dcc509a6f75849b'),
(8, 'Alda Elvira', 'adminn', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(30) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id_blog`, `gambar`, `judul`, `isi`) VALUES
(2, 'hot_coffee_mug-5121.png', '134567', '<p><em>asdfghjk??</em></p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(30) NOT NULL,
  `id_produk` int(30) NOT NULL,
  `judul_foto` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `id_produk`, `judul_foto`, `foto`) VALUES
(1, 2, 'Foto 1', '1494.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon_pelanggan` varchar(30) DEFAULT NULL,
  `provinsi_tujuan` int(11) NOT NULL,
  `kota_tujuan` int(11) NOT NULL,
  `alamat_pelanggan` text DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(30) NOT NULL,
  `resi` varchar(100) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(50) DEFAULT NULL,
  `rekening_pelanggan` varchar(50) DEFAULT NULL,
  `bukti_bayar` varchar(50) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon_pelanggan`, `provinsi_tujuan`, `kota_tujuan`, `alamat_pelanggan`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `resi`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`) VALUES
(31, 5, 'Nanda', 'syafitrinanda@gmail.com', '1', 1, 17, '							      				1				      	', '16062020ZRH76NGV', '2020-06-16 04:23:07', 112000, 'Dikirim', '12345', 112000, 's', 's', 'ERD.png', 1, '16-06-2020', 's', '2020-06-16 04:23:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(30) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `slug_kategori` varchar(100) NOT NULL,
  `urutan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kategori`, `urutan`) VALUES
(1, 'Pakaian', 'pakaian', '1'),
(2, 'Tas', 'tas', '2'),
(3, 'Dan lain-lain', 'dan-lain-lain', '3'),
(4, 'Makanan', 'makanan', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
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
  `id_provinsi` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `about` text NOT NULL,
  `syarat_ketentuan` text NOT NULL,
  `logo` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `id_provinsi`, `id_kota`, `alamat`, `facebook`, `instagram`, `deskripsi`, `about`, `syarat_ketentuan`, `logo`, `icon`, `tanggal_update`) VALUES
(1, 'Galeri Ajang Ambe', 'Produk UMK', 'galeri@gmail.com', 'Galeri Ajang Ambe', '																				galeri ajang ambe				', '																				ajang ambe', '6222-3443-5566', 21, 7, '																				Gampong Bundar, Karang Baru, A', 'https://www.facebook.com/Galeri-Pertama-Ajang-Ambe-Aceh-Tamiang', 'https://www.instagram.com/galeriajangambe', '																				Pusat oleh-oleh Aceh Tamiang		', '				galeri ajang ambe adalah', '		sayarat dan ketentuan		', 'ajang.jpg', 'ajang1.jpg', '2020-06-15 15:04:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(30) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(20) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `tanggal_daftar` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon_pelanggan`, `alamat_pelanggan`, `tanggal_daftar`) VALUES
(4, 'Alda Elvira', 'alda@gmail.com', 'f897b8d1e5cc779db28d2cbed3eaf188', '082245678767', 'Kualasimpang						      	', '2020-04-29 17:11:14.000000'),
(5, 'Nanda', 'syafitrinanda@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '1', '			1				      	', '2020-05-19 11:02:46.000000'),
(6, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'nanda99@mhs.unsyiah.ac.id', 'c4ca4238a0b923820dcc509a6f75849b', '0808080', 'alamat', '2020-06-15 23:01:02.000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
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
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(30) NOT NULL,
  `id_kategori` int(30) NOT NULL,
  `id_umkm` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `slug_produk` varchar(100) NOT NULL,
  `kode_produk` varchar(30) NOT NULL,
  `harga_produk` int(15) NOT NULL,
  `berat_produk` int(15) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `warna` text NOT NULL,
  `stok_produk` int(15) NOT NULL,
  `status_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `id_umkm`, `nama_produk`, `slug_produk`, `kode_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `warna`, `stok_produk`, `status_produk`) VALUES
(1, 2, 12, 'Tas 1', 'tas-1-ts01', 'ts01', 30000, 600, '20200317_115341.jpg', '<p>tas bagus</p>\r\n', 'merah-coklat,hitam-kuning', 7, 'Publish'),
(11, 4, 12, 'Keripik', 'keripik-abc', 'abc', 5000, 300, 'Untitled.png', '<p>hehehhe</p>\r\n', 'merah', 8, 'Publish'),
(12, 1, 13, 'Kemeja', 'kemeja-yuyu', 'yuyu', 50000, 500, 'b.png', '<p>zxzxzxzx</p>\r\n', 'kuning,ijo', 4, 'Publish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(1, 'Mandiri', '1546787690', 'Alia', NULL, '2020-05-05 06:42:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(50) NOT NULL,
  `id_pelanggan` int(30) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(30) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `harga` int(30) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `total_harga` int(30) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `warna`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`) VALUES
(36, 5, '16062020ZRH76NGV', 12, 'kuning', 50000, 1, 50000, '2020-06-16 04:23:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `umkm`
--

CREATE TABLE `umkm` (
  `id_umkm` int(30) NOT NULL,
  `nama_pengusaha` varchar(50) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `nama_umkm` varchar(50) NOT NULL,
  `jenis_umkm` varchar(30) NOT NULL,
  `kode_umkm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `umkm`
--

INSERT INTO `umkm` (`id_umkm`, `nama_pengusaha`, `telepon`, `id_provinsi`, `id_kota`, `alamat`, `nama_umkm`, `jenis_umkm`, `kode_umkm`) VALUES
(12, 'Anda', '0909090900000', 21, 359, 'kecamatan Meurah Dua', 'ANDA', '4', '8OJNRY'),
(13, 'Nanda Syafitri', '09090909', 6, 151, 'xxxxxxxxxxxxxxxx', 'halo halo', '1', 'FYLO4D');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id_umkm`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id_umkm` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
