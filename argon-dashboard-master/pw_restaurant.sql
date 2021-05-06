-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2021 pada 09.38
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_restaurant`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id_transaksi` varchar(7) NOT NULL,
  `id_menu` varchar(7) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `porsi` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_transaksi` varchar(7) NOT NULL,
  `id_menu` varchar(7) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `porsi` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` varchar(7) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `porsi` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status_menu` varchar(10) NOT NULL,
  `estimasi_waktu_buat` time NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `porsi`, `harga`, `status_menu`, `estimasi_waktu_buat`, `gambar`) VALUES
('M-001', 'Pecel ayam', 1, 25000, 'Ada', '00:10:00', 'pecelayam.jpg'),
('M-002', 'Ayam Bakar', 1, 25000, 'Ada', '00:10:00', 'ayambakar.jpg'),
('M-003', 'Ayam Geprek', 1, 25000, 'Ada', '00:10:00', 'ayamgeprek.jpg'),
('M-004', 'Gulai Ayam', 1, 25000, 'Ada', '00:10:00', 'gulaiayam.jpg'),
('M-005', 'Soto Ayam', 1, 25000, 'Ada', '00:10:00', 'sotoayam.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `posisi`, `alamat`, `tanggal_lahir`, `no_telepon`, `gambar`) VALUES
('P-001', 'Fasha', 'Manager', 'Jl. Kacang Kapri Kav. 13 Matraman, Jakarta timur', '1993-05-01', '081236181272', 'fasha.png'),
('P-002', 'Juna', 'Chef', 'Jl. Kehormatan Blok A No.19 Kebon Jeruk, Jakarta Barat', '1990-02-19', '087162917512', 'juna.png'),
('P-003', 'Gerald', 'Chef', 'Jl. Cinta Boulevard No.3 Pesanggrahan, Jaksel', '1999-09-09', '089376121718', 'gerald.png'),
('P-004', 'Ferra', 'Kasir', 'Jl.Satria No.2 Gempol, Jakarta Timur', '1999-10-10', '087165871832', 'ferra.png'),
('P-005', 'Sintya', 'Waitress', 'Jl. H.R.Rasuna Said Jakarta', '1998-04-08', '089583257587', 'sintya.png'),
('P-006', 'Martin', 'Waitress', 'Jl. Budi Kemuliaan I No. 1 Jakarta Pusat', '2000-07-04', '088276197169', 'martin.png'),
('P-007', 'Ferry', 'Kasir', 'Jl. Budi Kemuliaan I No. 1 Jakarta Pusat', '1999-09-04', '089716286198', 'ferry.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `jenis`, `keterangan`, `tanggal`, `jumlah`) VALUES
(1, 'Uang', 'Hasil penjualan', '2021-04-15', 2000000),
(2, 'Uang', 'Hasil penjualan', '2021-04-14', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `jenis`, `keterangan`, `tanggal`, `jumlah`) VALUES
(1, 'Uang', 'Gaji pegawai', '2021-04-15', 7000000),
(2, 'Uang', 'Beli stok', '2021-04-14', 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_stok` varchar(7) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_stok`, `nama_bahan`, `jumlah`, `satuan`) VALUES
('ST-001', 'Beras', 200, 'kg'),
('ST-002', 'Teh Botol', 2, 'kerat'),
('ST-003', 'Ayam', 6, 'kg'),
('ST-004', 'Aqua', 10, 'dus'),
('ST-005', 'Jeruk Limau', 2, 'kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `jenis`, `alamat`, `no_telepon`, `email`) VALUES
('SP-001', 'Owfat', 'Kelapa', 'Jl.Cijawura Hilir Kec.Cijawura Kab.Bandung', '08997681547', 'owfatmilk@gmail.com'),
('SP-002', 'Slash', 'Ayam, lele, bebek', 'Jl.Kebon Jeruk Jakarta Barat', '08156789134', 'slash123@gmail.com'),
('SP-003', 'Kama', 'kentang, kubis, cabe', 'Sunrise Garden Complex Surya Mandala Jakarta Barat', '081978922274', 'kama1011@gmail.com'),
('SP-004', 'Bakir', 'beras, telor', 'Jl. S . Wiryopranoto', '087725679971', 'pt.bakirmakmur@gmail.com'),
('SP-005', 'Fore', 'teh, coffe, air mineral', 'Jl.menara sudirman jakarta selatan', '087744492317', 'fore897@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(7) NOT NULL,
  `id_pegawai` varchar(7) NOT NULL,
  `id_meja` varchar(7) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `tunai` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pegawai`, `id_meja`, `nama_pelanggan`, `tanggal`, `total_bayar`, `pajak`, `tunai`, `kembali`) VALUES
('TR-001', 'P-004', 'M-001', 'Sitta', '2021-04-15', 53000, 3000, 100000, 47000),
('TR-002', 'P-004', 'M-002', 'Rahma', '2021-04-15', 23000, 3000, 50000, 27000),
('TR-003', 'P-004', 'M-003', 'Bunga', '2021-04-15', 33000, 3000, 50000, 17000),
('TR-004', 'P-004', 'M-004', 'Sari', '2021-04-15', 38000, 3000, 50000, 12000),
('TR-005', 'P-004', 'M-005', 'Nadia', '2021-04-15', 18000, 3000, 20000, 2000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_transaksi`,`id_menu`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_transaksi`,`id_menu`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
