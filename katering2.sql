-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 12 Apr 2022 pada 16.58
-- Versi server: 5.7.32
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `katering2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `email`, `password`, `status`, `role`) VALUES
(1, 'admin@admin.com', 'admin', 1, 1),
(2, 'vendor@vendor.com', 'vendor', 1, 2),
(3, 'customer@customer.com', 'customer', 1, 3),
(4, 'abc@vendor.com', 'abc', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `phone_number` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(32) NOT NULL,
  `tanggal_lahir` varchar(32) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `phone_number`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `id_akun`) VALUES
(1, 'Customer', '0921123', 'Bandung, Jawa Barat', 'Men', '1999-02-19', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Snack'),
(2, 'Makanan Berat'),
(3, 'Minuman Sehat'),
(4, 'Desert');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `harga` int(20) NOT NULL,
  `foto_menu` text NOT NULL,
  `id_nutrisi` int(11) DEFAULT NULL,
  `id_vendor` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `keterangan`, `status`, `durasi`, `harga`, `foto_menu`, `id_nutrisi`, `id_vendor`, `id_kategori`, `id_penyakit`) VALUES
(1, 'Paket A', 'abc', 1, 7, 150000, '', 4, 1, 1, 0),
(2, 'Paket B', 'abc', 1, 7, 150000, '', 5, 1, 1, 0),
(3, 'Paket C', 'abc', 1, 7, 150000, '', 6, 1, 1, 0),
(4, 'Paket A1', 'abc', 1, 7, 150000, '', 1, 1, 1, 0),
(5, 'Paket A2', 'abc', 1, 7, 150000, '', 1, 1, 1, 0),
(6, 'Paket A3', 'abc', 1, 7, 150000, '', 1, 1, 1, 0),
(7, 'ABC 1', 'abc', 1, 7, 150000, '', 4, 2, 1, 0),
(8, 'ABC 2', 'abc', 1, 7, 150000, '', 5, 2, 1, 0),
(9, 'ABC 3', 'abc', 1, 7, 150000, '', 6, 2, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nutrisi`
--

CREATE TABLE `nutrisi` (
  `id_nutrisi` int(11) NOT NULL,
  `gram` int(11) NOT NULL,
  `sayur` text NOT NULL,
  `kalori` int(11) NOT NULL,
  `batas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `nutrisi`
--

INSERT INTO `nutrisi` (`id_nutrisi`, `gram`, `sayur`, `kalori`, `batas`) VALUES
(1, 200, 'Bayam, Ikan, Apple', 1000, 1200),
(2, 300, 'Bayam, Ikan, Apple', 1200, 1500),
(3, 300, 'Bayam, Ikan, Apple', 1500, 1800),
(4, 300, 'Bayam, Ikan, Apple', 1800, 2000),
(5, 300, 'Bayam, Ikan, Apple', 2000, 2200),
(6, 300, 'Bayam, Ikan, Apple', 2200, 2500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`) VALUES
(0, 'Bebas pantangan Penyakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status_transaksi` int(11) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nomor_penerima` varchar(255) NOT NULL,
  `alamat_kirim` text NOT NULL,
  `note_vendor` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_menu`, `id_customer`, `tanggal_pesan`, `qty`, `total`, `status_transaksi`, `bukti`, `date`, `nomor_penerima`, `alamat_kirim`, `note_vendor`) VALUES
(1, 2, 1, '2022-03-31', 1, 150000, 1, 'Screen_Shot_2022-03-17_at_2_34_50_PM1.png', '2022-01-25 15:09:45', '12312312312', 'adasdasdasdsada', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `phone_number` varchar(32) NOT NULL,
  `deskripsi` text,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal_daftar` varchar(255) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `alamat`, `phone_number`, `deskripsi`, `foto`, `tanggal_daftar`, `id_akun`) VALUES
(1, 'Geprek', 'Bandung, Jawa Barat', '123123', 'dasdasdasdas', 'vendor.png', '2022-01-09', 2),
(2, 'ABC KITCHEN', 'Bandung, Jawa Barat', '123123', 'dasdasdasdas', 'abc.jpeg', '2022-01-09', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `fkac` (`id_akun`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `fkmn` (`id_nutrisi`),
  ADD KEY `fkmv` (`id_vendor`),
  ADD KEY `fkkm` (`id_kategori`),
  ADD KEY `fkpm` (`id_penyakit`);

--
-- Indeks untuk tabel `nutrisi`
--
ALTER TABLE `nutrisi`
  ADD PRIMARY KEY (`id_nutrisi`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fktc` (`id_customer`),
  ADD KEY `fktm` (`id_menu`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`),
  ADD KEY `fkav` (`id_akun`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `nutrisi`
--
ALTER TABLE `nutrisi`
  MODIFY `id_nutrisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fkac` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fkkm` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `fkmn` FOREIGN KEY (`id_nutrisi`) REFERENCES `nutrisi` (`id_nutrisi`),
  ADD CONSTRAINT `fkmv` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`),
  ADD CONSTRAINT `fkpm` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fktc` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `fktm` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Ketidakleluasaan untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `fkav` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`);
