-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 11 Jan 2022 pada 17.13
-- Versi server: 5.7.32
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `katering`
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
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `harga` int(20) NOT NULL,
  `id_nutrisi` int(11) DEFAULT NULL,
  `id_vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `keterangan`, `status`, `durasi`, `harga`, `id_nutrisi`, `id_vendor`) VALUES
(1, 'Paket A', 'abc', 1, 7, 150000, 4, 1),
(2, 'Paket B', 'abc', 1, 7, 150000, 5, 1),
(3, 'Paket C', 'abc', 1, 7, 150000, 6, 1),
(4, 'Paket A1', 'abc', 1, 7, 150000, 1, 1),
(5, 'Paket A2', 'abc', 1, 7, 150000, 1, 1),
(6, 'Paket A3', 'abc', 1, 7, 150000, 1, 1),
(7, 'ABC 1', 'abc', 1, 7, 150000, 4, 2),
(8, 'ABC 2', 'abc', 1, 7, 150000, 5, 2),
(9, 'ABC 3', 'abc', 1, 7, 150000, 6, 2);

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
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal_pesan` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `fkmn` (`id_nutrisi`),
  ADD KEY `fkmv` (`id_vendor`);

--
-- Indeks untuk tabel `nutrisi`
--
ALTER TABLE `nutrisi`
  ADD PRIMARY KEY (`id_nutrisi`);

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
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `fkmn` FOREIGN KEY (`id_nutrisi`) REFERENCES `nutrisi` (`id_nutrisi`),
  ADD CONSTRAINT `fkmv` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`);

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
