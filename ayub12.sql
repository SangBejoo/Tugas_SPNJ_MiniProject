-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2022 pada 05.02
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayub12`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `subagiya`
--

CREATE TABLE `subagiya` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `stock_count` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subagiya`
--

INSERT INTO `subagiya` (`id`, `name`, `code`, `category`, `price`, `stock_count`) VALUES
(9, 'Music Aeroplane', 'TOY#MA01', 'Music Toys', 250, 500),
(10, 'Power Ranger', 'TOY#BT01', 'Battery Toys', 1000, 100),
(11, 'Remote Car', 'TOY#RMT01', 'Remote Control Toys', 280, 800),
(12, 'Bubbles', 'TOY#WT01', 'Water Games', 100, 1000),
(13, 'Cricket Cards', 'TOY#CD01', 'Card Games', 200, 80),
(14, 'Basket Ball', 'TOY#BB01', 'Outdoor Toys', 2000, 500),
(15, 'Word Puzzles', 'TOY#PZ01', 'Puzzles', 200, 200),
(16, 'Water Gun', 'TOY#WG01', 'Water Games', 100, 1000),
(17, 'AYUB SUBAGIYA', '62', 'asd', 100, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `photo`) VALUES
(1, 'ardianta', 'ardianta_pargo@yahoo.co.id', '$2y$10$HIEq2w.8Et9RsJmY4TMKye4aVCxOd9xJTOtG4vyOEmo.GIBxaPQHK', 'Ardianta Pargo', 'default.svg'),
(3, 'petanikode', 'info@petanikode.com', '$2y$10$uXa.Hz9rr8gkv4ztaqf6FO84iW64gXHbeyEOy1tIQ5wmqMjTk0yQa', 'Petani Kode', 'default.svg'),
(4, 'subagiya', 'ayubsubagiya@gmail.com', '$2y$10$.9qF.xyR7Pmsx4H3rjJEAuQujznJZjE7DySrI.v62j7a06mlKW5c2', 'AYUB SUBAGIYA', 'default.svg'),
(5, 'subagiya1', 'ayubsubagiya@gmail.com', '$2y$10$1phEnLSocgAaB3kAlp1SD.rfYy0TX0AqHrETutn6H1XnxhpQOz.mi', 'AYUB SUBAGIYA', 'default.svg'),
(7, 'subagiya12', 'ayubsubagiya@gmail.com', '$2y$10$Y1tO3oTbWq6AubnjP93ZXe81d6VnxRRfSwDSZ1171dktHzYyHKYLq', 'AYUB SUBAGIYA', 'default.svg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `subagiya`
--
ALTER TABLE `subagiya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `subagiya`
--
ALTER TABLE `subagiya`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
