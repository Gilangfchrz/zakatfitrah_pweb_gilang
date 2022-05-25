-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Bulan Mei 2022 pada 17.13
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakatfitrah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `email`) VALUES
(1, 'gilang ', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@test.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayarzakat`
--

CREATE TABLE `bayarzakat` (
  `id` int(11) NOT NULL,
  `id_zakat` int(11) NOT NULL,
  `nama_kk` varchar(20) NOT NULL,
  `jumlah_tanggungan` int(11) NOT NULL,
  `jenis_bayar` varchar(20) NOT NULL,
  `jumlah_tanggunganyangdibayar` int(11) NOT NULL,
  `bayar_beras` int(11) NOT NULL,
  `bayar_uang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayarzakat`
--

INSERT INTO `bayarzakat` (`id`, `id_zakat`, `nama_kk`, `jumlah_tanggungan`, `jenis_bayar`, `jumlah_tanggunganyangdibayar`, `bayar_beras`, `bayar_uang`) VALUES
(5, 62987, 'gilang', 9, 'uang', 9, 0, 108),
(6, 62986, 'lola', 3, 'beras', 3, 18, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_mustahik`
--

CREATE TABLE `kategori_mustahik` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `jumlah_hak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_mustahik`
--

INSERT INTO `kategori_mustahik` (`id`, `id_kategori`, `nama_kategori`, `jumlah_hak`) VALUES
(4, 70061, 'ochi', 10),
(5, 70062, 'Chagiya', 9),
(6, 70063, 'markus', 19),
(7, 70064, 'yana', 17),
(8, 70065, 'zidan', 14),
(9, 70066, 'samsul', 15),
(10, 70067, 'amilin', 13),
(11, 70068, 'mimin', 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mustahik_lainnya`
--

CREATE TABLE `mustahik_lainnya` (
  `id` int(11) NOT NULL,
  `id_mustahiklainnya` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `hak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mustahik_lainnya`
--

INSERT INTO `mustahik_lainnya` (`id`, `id_mustahiklainnya`, `nama`, `keterangan`, `hak`) VALUES
(1, 7006032, 'haji jimat', 'warga tetap', 3),
(2, 7006033, 'ibu srituti', 'warga luar', 6),
(3, 7006034, 'dito', 'warga tetap', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mustahik_warga`
--

CREATE TABLE `mustahik_warga` (
  `id` int(11) NOT NULL,
  `id_mustahikwarga` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `hak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mustahik_warga`
--

INSERT INTO `mustahik_warga` (`id`, `id_mustahikwarga`, `nama`, `kategori`, `hak`) VALUES
(1, 700682, 'haji ali', 'warga tetap', 8),
(2, 700683, 'ibu kokom', 'warga tetap', 7),
(3, 700684, 'ridwan', 'warga luar', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `muzakki`
--

CREATE TABLE `muzakki` (
  `id` int(11) NOT NULL,
  `id_muzakki` int(11) NOT NULL,
  `nama_muzakki` varchar(20) NOT NULL,
  `jumlah_tanggungan` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `muzakki`
--

INSERT INTO `muzakki` (`id`, `id_muzakki`, `nama_muzakki`, `jumlah_tanggungan`, `keterangan`) VALUES
(1, 62897, 'gilang', 9, 'warga tetap'),
(3, 62986, 'lola', 2, 'warga asing'),
(4, 62985, 'moni', 7, 'warga asing'),
(5, 62984, 'muna', 13, 'warga tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_zakat`
--

CREATE TABLE `pembayaran_zakat` (
  `id` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `nama_muzakki` varchar(20) NOT NULL,
  `jumlah_tanggungan` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_zakat`
--

INSERT INTO `pembayaran_zakat` (`id`, `id_pembayaran`, `nama_muzakki`, `jumlah_tanggungan`, `keterangan`) VALUES
(1, 62897, 'gilang', 9, 'warga tetap'),
(2, 62986, 'lola', 2, 'warga asing'),
(3, 62985, 'moni', 7, 'warga asing'),
(4, 62984, 'muna', 13, 'warga tetap');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bayarzakat`
--
ALTER TABLE `bayarzakat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran_zakat`
--
ALTER TABLE `pembayaran_zakat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bayarzakat`
--
ALTER TABLE `bayarzakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `muzakki`
--
ALTER TABLE `muzakki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_zakat`
--
ALTER TABLE `pembayaran_zakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
