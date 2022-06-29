-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 26 Jun 2022 pada 12.16
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_topup`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_payment`
--

CREATE TABLE `t_payment` (
  `id_payment` int(11) NOT NULL,
  `payment_type` varchar(15) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `bill_info1` varchar(20) NOT NULL,
  `bill_info2` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cdd` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_payment`
--

INSERT INTO `t_payment` (`id_payment`, `payment_type`, `bank`, `bill_info1`, `bill_info2`, `image`, `cdd`) VALUES
(1, 'bank_transfer', 'bca', '', '', 'assets/logo_bank/bca.png', '2022-06-18'),
(2, 'bank_transfer', 'bri', '', '', 'assets/logo_bank/bri.png', '2022-06-18'),
(3, 'bank_transfer', 'bni', '', '', 'assets/logo_bank/bni.png', '2022-06-18'),
(4, 'echannel', 'mandiri', 'Payment', 'Online purchase', 'assets/logo_bank/mandiri.png', '2022-06-18'),
(5, 'permata', 'permata', '', '', 'assets/logo_bank/permata.png', '2022-06-18'),
(6, 'cstore', 'alfamart', '', '', 'assets/logo_bank/alfamart.png', '2022-06-18'),
(7, 'cstore', 'indomaret', '', '', 'assets/logo_bank/indomaret.png', '2022-06-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_player` varchar(20) NOT NULL,
  `voucher_game` varchar(50) NOT NULL,
  `server_player` varchar(10) NOT NULL,
  `kode_diamond` varchar(15) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `status_transaksi` varchar(25) NOT NULL,
  `payment_type` varchar(15) NOT NULL,
  `pembayaran` varchar(15) NOT NULL,
  `midtrans_status` varchar(10) NOT NULL,
  `redeem_code_voucher` varchar(20) DEFAULT NULL,
  `invoice_voucher` varchar(20) DEFAULT NULL,
  `va_number` varchar(100) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `redirect_qrcode` varchar(255) DEFAULT NULL,
  `voucher_status` varchar(10) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `id_order`, `id_user`, `id_player`, `voucher_game`, `server_player`, `kode_diamond`, `harga`, `status_transaksi`, `payment_type`, `pembayaran`, `midtrans_status`, `redeem_code_voucher`, `invoice_voucher`, `va_number`, `qr_code`, `redirect_qrcode`, `voucher_status`, `create_date`, `update_date`) VALUES
(1, '0', NULL, '28087121', 'mobile-legend', '2207', 'ML3688', '863600', 'Menunggu Pembayaran', 'bank_transfer', 'bni', 'pending', NULL, NULL, '9884186870938426', NULL, NULL, NULL, '2022-06-26 14:34:13', '2022-06-26 14:34:13'),
(2, 'order-62b80ceb2bf65', NULL, '28087121', 'mobile-legend', '2207', 'MLSL', '144160', 'Menunggu Pembayaran', 'echannel', 'mandiri', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'order-62b80eaa304bc', NULL, '28087121', 'mobile-legend', '2207', 'SLPML', '324700', 'Menunggu Pembayaran', 'echannel', 'mandiri', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-26 14:45:46', NULL),
(4, 'order-62b80f2869470', NULL, '28087121', 'mobile-legend', '2207', 'ML706', '172720', 'Menunggu Pembayaran', 'permata', 'permata', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-26 14:47:54', NULL),
(5, 'order-62b8200306dbd', NULL, '28087121', 'mobile-legend', '2207', 'ML706', '172720', 'Menunggu Pembayaran', 'bank_transfer', 'bca', 'pending', NULL, NULL, '41868558479', NULL, NULL, NULL, '2022-06-26 15:59:47', NULL),
(6, 'order-62b820650299e', NULL, '28087121', 'mobile-legend', '2207', 'TPML', '144160', 'Sedang di proses', 'bank_transfer', 'bca', 'settlement', NULL, NULL, '41868311507', NULL, NULL, NULL, '2022-06-26 16:01:25', NULL),
(7, 'order-62b820ec43612', NULL, '28087121', 'mobile-legend', '2207', 'ML5520', '1295400', 'Sedang di proses', 'permata', 'permata', 'settlement', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-26 16:03:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_payment`
--
ALTER TABLE `t_payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indeks untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_payment`
--
ALTER TABLE `t_payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
