-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2021 pada 11.59
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `id_editor` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `nama_buku` varchar(90) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `foto_buku` varchar(97) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `id_penulis`, `id_penerbit`, `id_editor`, `id_rak`, `nama_buku`, `jumlah_buku`, `tahun_terbit`, `foto_buku`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 7, 2, 'The Death Note', 11, 2000, '1625142322_5aa171f7aac77f07ddd8.jpg', '2021-07-01 07:25:22', '2021-07-10 21:27:33'),
(2, 2, 3, 7, 5, 'Eternal Book', 3, 2001, '1625969895_e1b5b4f30f6a82daa1da.jpg', '2021-07-10 21:18:15', '2021-07-10 21:20:14'),
(3, 1, 3, 6, 3, 'Come Book', 3, 2006, '1625969928_80493156886389ab10a1.jpg', '2021-07-10 21:18:48', '2021-07-11 04:38:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_editor`
--

CREATE TABLE `tbl_editor` (
  `id_editor` int(11) NOT NULL,
  `nama_editor` varchar(75) NOT NULL,
  `email_editor` varchar(75) NOT NULL,
  `foto_editor` varchar(85) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_editor`
--

INSERT INTO `tbl_editor` (`id_editor`, `nama_editor`, `email_editor`, `foto_editor`, `created_at`, `updated_at`) VALUES
(6, 'Black', 'black@gmail.com', '1625096727_17741331eb75bcea00b1.png', '2021-06-30 18:18:22', '2021-06-30 18:45:27'),
(7, 'Cloverr', 'clover@gmail.com', '1625095117_1e84a8ffacf6c0b284b2.png', '2021-06-30 18:18:37', '2021-07-11 04:44:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjaman`, `id_user`, `id_buku`, `tanggal_peminjaman`, `created_at`, `updated_at`) VALUES
(1, 5, 2, '2021-07-10', '2021-07-02 21:00:41', '2021-07-11 04:47:56'),
(2, 3, 3, '2021-07-16', '2021-07-10 21:19:35', '2021-07-10 21:19:35'),
(3, 5, 1, '2021-07-29', '2021-07-10 21:20:01', '2021-07-11 04:10:11'),
(4, 1, 2, '2021-07-17', '2021-07-10 21:20:14', '2021-07-10 21:20:14'),
(5, 5, 1, '2021-07-17', '2021-07-10 21:27:33', '2021-07-10 21:27:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penerbit`
--

CREATE TABLE `tbl_penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(100) NOT NULL,
  `alamat_penerbit` varchar(95) NOT NULL,
  `tahun_berdiri` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`id_penerbit`, `nama_penerbit`, `alamat_penerbit`, `tahun_berdiri`, `created_at`, `updated_at`) VALUES
(2, 'Elex Media Komputoindo', 'Jalan Palmerah Barat 29 – 37', 1985, '2021-06-28 05:00:16', '2021-07-11 04:54:25'),
(3, 'Grasindo', 'Jalan Palmerah Barat No. 29-37', 1990, '2021-06-28 06:19:45', '2021-06-28 06:19:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `denda` int(11) NOT NULL,
  `ket_pengembalian` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`id_pengembalian`, `id_peminjaman`, `id_user`, `id_buku`, `tanggal_pengembalian`, `denda`, `ket_pengembalian`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, '2021-07-26', 10000, 'Denda Belum Lunas', '2021-07-03 05:17:34', '2021-07-11 04:59:30'),
(2, 3, 5, 3, '2021-07-25', 0, 'Sudah Selesai', '2021-07-10 21:21:46', '2021-07-10 21:21:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penulis`
--

CREATE TABLE `tbl_penulis` (
  `id_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(100) NOT NULL,
  `usia_penulis` int(11) NOT NULL,
  `asal_penulis` varchar(79) NOT NULL,
  `foto_penulis` varchar(125) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penulis`
--

INSERT INTO `tbl_penulis` (`id_penulis`, `nama_penulis`, `usia_penulis`, `asal_penulis`, `foto_penulis`, `created_at`, `updated_at`) VALUES
(1, 'The Celtic Warrior Sheamus', 30, 'Irlandia', '1625132180_4d9f05cefacf711a2847.jpg', '2021-07-01 04:36:20', '2021-07-11 05:04:14'),
(2, 'The Swiss Superman', 33, 'Swiss', '1625132980_5ba4ac3816ff5aef863f.jpg', '2021-07-01 04:49:31', '2021-07-01 04:49:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `lokasi` varchar(75) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Rak Huruf A', '2021-06-28', '2021-06-28 06:45:33'),
(2, 'Rak Huruf B', '2021-06-28', '2021-06-28 06:49:28'),
(3, 'Rak Huruf C', '2021-07-02', '2021-07-02 07:53:00'),
(4, 'Rak Huruf D', '2021-07-02', '2021-07-02 07:53:08'),
(5, 'Rak Huruf E', '2021-07-02', '2021-07-02 07:53:16'),
(6, 'Rak Huruf F', '2021-07-02', '2021-07-02 07:53:25'),
(7, 'Rak Huruf G', '2021-07-02', '2021-07-02 07:53:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `alamat_user` varchar(100) NOT NULL,
  `password` varchar(125) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `nama_user`, `alamat_user`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Anton', 'Diablo Anton', 'Jalan Pangeran', '$2y$10$mEDWo.TJu8K0J43mnjqXcOS5qLbDgGjXgRc8W7/pfwkkvRdefrnQG', 1, '2021-06-26 22:40:17', '2021-06-26 22:40:17'),
(2, 'bobon', 'The new Boy', 'Jalan diponegoro', '$2y$10$NkQU4p7E3Zjs9A1QY2pgu.1wbiVxAjE13Bb66Nawp1Vy1W7OZSZO2', 1, '2021-06-26 22:50:19', '2021-06-26 22:50:19'),
(3, 'cesaro', 'Antonio Cesaro', 'Swiss', 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-06-26 23:02:22', '2021-06-26 23:02:22'),
(4, 'rimuru', 'Rimuru Tempest', 'Jalan A. Pangeran', 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-07-02 07:04:41', '2021-07-02 07:04:41'),
(5, 'nisam', 'Brother of me', 'Jalan Beringin', '25d55ad283aa400af464c76d713c07ad', 0, '2021-07-14 07:50:06', '2021-07-14 07:50:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tbl_editor`
--
ALTER TABLE `tbl_editor`
  ADD PRIMARY KEY (`id_editor`);

--
-- Indeks untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `tbl_penulis`
--
ALTER TABLE `tbl_penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indeks untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_editor`
--
ALTER TABLE `tbl_editor`
  MODIFY `id_editor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_penulis`
--
ALTER TABLE `tbl_penulis`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
