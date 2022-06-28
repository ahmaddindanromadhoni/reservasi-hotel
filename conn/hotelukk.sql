-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2022 pada 16.28
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelukk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','resepsionis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'resepsionis', 'resepsionis@gmail.com', '3aeff485f68b360d076de3d73f9247ad', 'resepsionis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `idkamar` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `fasilitas` varchar(225) NOT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`idkamar`, `tipe`, `jumlah`, `harga`, `fasilitas`, `gambar`) VALUES
(3, 'Standard', 99, 420000, 'gf', '20220314_231043.png'),
(4, 'Superior', 3, 500000, 'hgjhg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `idkontak` int(11) NOT NULL,
  `idtamu` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pesanuser` text NOT NULL,
  `pesanadmin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`idkontak`, `idtamu`, `username`, `pesanuser`, `pesanadmin`) VALUES
(48, 10, 'ali', 'Halooo....', ''),
(49, 10, 'ali', '', 'Yoooo'),
(50, 11, 'inka', 'Tesssss...', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpesan` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `norek` varchar(15) NOT NULL,
  `namarek` varchar(50) NOT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpesan`, `nama`, `jumlah`, `bank`, `norek`, `namarek`, `gambar`) VALUES
('37', 'Aljumad', 450000, 'BCA', '1234567890', 'ALJUMAD', '2.jpg'),
('39', 'Inka Ardya Indrawan', 1400000, 'Mandiri', '33344455566666', 'Inka', '5.jpg'),
('40', 'Muh. Fahrizal', 1800000, 'BNI', '677777777777777', 'Fahri', '7.jpg'),
('42', 'Muh. Ade Furkan', 1350000, 'BRI', '493111122233344', 'Furkan', '5.jpg'),
('48', 'dindan', 0, 'BRI', '123123', 'dindn', '3f23e994-d98d-45ec-9efe-1f553242b18d.jpg'),
('57', 'dindan', 0, 'BRI', '123123', 'dindn', 'dindan.jpg'),
('58', 'dindan', 0, 'Mandiri', '123123', 'dindn', 'dindan.jpg'),
('59', 'smk', 0, 'BCA', '123123', 'dindn', 'dindan.jpg'),
('60', 'smk', 0, 'Mandiri', '123123', 'dindn', 'dindan.jpg'),
('61', 'dindan', 0, 'BNI', '123123', 'dindn', 'dindan.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idpesan` int(11) NOT NULL,
  `tglpesan` datetime NOT NULL,
  `batasbayar` datetime NOT NULL,
  `idkamar` varchar(15) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `idtamu` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `tglmasuk` date NOT NULL,
  `tglkeluar` date NOT NULL,
  `lamahari` int(11) NOT NULL DEFAULT 0,
  `totalbayar` int(11) NOT NULL DEFAULT 0,
  `status` varchar(50) NOT NULL DEFAULT 'Pending...'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`idpesan`, `tglpesan`, `batasbayar`, `idkamar`, `tipe`, `harga`, `jumlah`, `idtamu`, `nama`, `alamat`, `telepon`, `tglmasuk`, `tglkeluar`, `lamahari`, `totalbayar`, `status`) VALUES
(46, '0000-00-00 00:00:00', '2022-03-28 09:08:30', '2', 'Deluxe', 1300000, 1, 14, 'dindan', 'dindan', '081391760471', '2022-03-28', '2022-03-29', 1, 1300000, 'Dibatalkan'),
(47, '2022-03-28 00:00:00', '0000-00-00 00:00:00', '4', 'Superior', 500000, 3, 14, 'dindan', 'dindan', '081391760471', '2022-03-29', '2022-03-31', 2, 3000000, 'Dibatalkan'),
(48, '2022-03-28 05:00:00', '2022-03-29 10:00:00', '3', 'Standard', 420000, 3, 14, 'dindan', 'dindan', '081391760471', '2022-03-28', '2022-03-29', 1, 1260000, 'Dibatalkan'),
(49, '2022-03-28 00:00:00', '0000-00-00 00:00:00', '3', 'Standard', 420000, 3, 14, 'dindan', 'dindan', '081391760471', '2022-03-30', '2022-03-31', 1, 1260000, 'Dibatalkan'),
(50, '2022-03-28 00:00:00', '0000-00-00 00:00:00', '3', 'Standard', 420000, 5, 17, 'asd', 'asd', '123', '2022-03-30', '2022-03-31', 1, 2100000, 'Dibatalkan'),
(51, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3', 'Standard', 420000, 4, 17, 'asd', 'asd', '123', '2022-03-30', '2022-03-31', 1, 1680000, 'Dibatalkan'),
(52, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3', 'Standard', 420000, 2, 17, 'asd', 'asd', '123', '2022-03-29', '2022-03-30', 1, 840000, 'Dibatalkan'),
(53, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3', 'Standard', 420000, 5, 17, 'asd', 'asd', '123', '2022-03-30', '2022-03-31', 1, 2100000, 'Dibatalkan'),
(54, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3', 'Standard', 420000, 3, 14, 'dindan', 'dindan', '081391760471', '2022-03-30', '2022-03-31', 1, 1260000, 'Dibatalkan'),
(55, '2022-03-28 23:18:00', '2022-03-28 23:00:30', '3', 'Standard', 420000, 6, 14, 'dindan', 'dindan', '081391760471', '2022-03-30', '2022-03-31', 1, 2520000, 'Dibatalkan'),
(56, '0000-00-00 00:00:00', '2022-03-29 04:01:39', '3', 'Standard', 420000, 5, 14, 'dindan', 'dindan', '081391760471', '2022-03-29', '2022-03-31', 2, 4200000, 'Dibatalkan'),
(57, '2022-03-29 04:14:52', '2022-03-29 09:14:52', '3', 'Standard', 420000, 2, 14, 'dindan', 'dindan', '081391760471', '2022-03-30', '2022-03-31', 1, 840000, 'Dibatalkan'),
(58, '2022-03-29 07:44:23', '2022-03-29 12:44:23', '3', 'Standard', 420000, 4, 14, 'dindan', 'dindan', '081391760471', '2022-03-30', '2022-03-31', 1, 1680000, 'Dibatalkan'),
(59, '2022-03-29 08:30:14', '2022-03-29 13:30:14', '3', 'Standard', 420000, 1, 18, 'smk', 'pendosawalan', '123', '2022-03-29', '2022-03-31', 2, 840000, 'Berhasil'),
(60, '2022-03-29 08:37:56', '2022-03-29 13:37:56', '3', 'Standard', 420000, 4, 18, 'smk', 'pendosawalan', '123', '2022-03-30', '2022-03-31', 1, 1680000, 'Berhasil'),
(61, '2022-03-30 17:43:01', '2022-03-30 22:43:01', '3', 'Standard', 420000, 1, 14, 'dindan', 'dindan', '081391760471', '2022-03-30', '2022-04-02', 2, 840000, 'Dibatalkan'),
(62, '2022-03-30 18:06:08', '2022-03-30 23:06:08', '3', 'Standard', 420000, 2, 14, 'dindan', 'dindan', '081391760471', '2022-04-01', '2022-04-03', 2, 1680000, 'Dibatalkan'),
(63, '2022-04-03 08:36:37', '2022-04-03 13:36:37', '3', 'Standard', 420000, 2, 14, 'dindan', 'dindan', '081391760471', '2022-04-04', '2022-04-06', 2, 1680000, 'Pending...');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokkamar`
--

CREATE TABLE `stokkamar` (
  `idkamar` int(20) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stokkamar`
--

INSERT INTO `stokkamar` (`idkamar`, `tipe`, `stok`) VALUES
(3, 'Standard', 47),
(4, 'Superior', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `idtamu` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`idtamu`, `email`, `nama`, `alamat`, `telepon`, `password`) VALUES
(14, 'dindan@gmail.com', 'dindan', 'dindan', '081391760471', 'd6c45c6233e198fdb8081b9f7983af87'),
(15, 'lestari@gmail.com', 'ahmad dindan romadhoni', 'rajewsesi', '3123', '827ccb0eea8a706c4c34a16891f84e7b'),
(16, 'lestari@gmail.com', 'ahmad dindan romadhoni', 'rajewsesi', '3123', '827ccb0eea8a706c4c34a16891f84e7b'),
(17, 'asd@gmail.com', 'asd', 'asd', '123', '7815696ecbf1c96e6894b779456d330e'),
(18, 'smk@gmail.com', 'smk', 'pendosawalan', '123', '3e671ea34dcac32e7e9e7c67ee8cfc0b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`idkamar`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`idkontak`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpesan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpesan`);

--
-- Indeks untuk tabel `stokkamar`
--
ALTER TABLE `stokkamar`
  ADD PRIMARY KEY (`idkamar`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`idtamu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `idkamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `idkontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idpesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `stokkamar`
--
ALTER TABLE `stokkamar`
  MODIFY `idkamar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `idtamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
