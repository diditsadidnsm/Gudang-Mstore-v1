-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Agu 2020 pada 12.58
-- Versi server: 10.3.23-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multijakarta_gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id_barang`, `nama_barang`, `stok`) VALUES
(1, 'Rinso Cair', 1),
(2, 'Sikat Gigi Formula', 2),
(3, 'Pepsodent', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_agama`
--

CREATE TABLE `mu_agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_agama`
--

INSERT INTO `mu_agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Katholik'),
(3, 'Protestan'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Konghucu'),
(7, 'Kepercayaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_agen_ekspedisi`
--

CREATE TABLE `mu_agen_ekspedisi` (
  `id_agen_ekspedisi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `chat` varchar(50) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_agen_ekspedisi`
--

INSERT INTO `mu_agen_ekspedisi` (`id_agen_ekspedisi`, `nama`, `alamat`, `city_id`, `state_id`, `country_id`, `telepon`, `email`, `fax`, `chat`, `id_users`) VALUES
(1, 'POS', 'Jln. Ratuwangi Jamban', 369, 31, 1, '0752693211', 'pos@gmail.com', '0752693299', 'pos@yahoo.com', 1),
(2, 'JNE', 'Jl. Sirotol Mustaqin', 355, 30, 1, '0752968822', 'jne@gmail.com', '0752968855', 'jne@yahoo.com', 1),
(3, 'Tiki', 'Jl. Baharudin Haiti Musa', 324, 28, 1, '0759121113', 'tiki@gmail.com', '0759121122', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_bahasa`
--

CREATE TABLE `mu_bahasa` (
  `id_bahasa` int(11) NOT NULL,
  `nama_bahasa` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_bahasa`
--

INSERT INTO `mu_bahasa` (`id_bahasa`, `nama_bahasa`, `id_users`) VALUES
(1, 'Bahasa Indonesia', 1),
(2, 'Bahasa Inggris', 1),
(3, 'Bahasa mandarin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_barang`
--

CREATE TABLE `mu_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merek_brand` varchar(100) NOT NULL,
  `model_type` varchar(100) NOT NULL,
  `berat_bruto` float NOT NULL,
  `ukuran_volume` varchar(100) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_subkategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jml_minimal` int(11) NOT NULL,
  `jml_maksimal` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `ppn` int(11) NOT NULL DEFAULT 10,
  `kode_satuan` varchar(10) NOT NULL,
  `keterangan_barang` text NOT NULL,
  `foto_barang` varchar(255) NOT NULL,
  `status_jual` enum('ya','tidak') NOT NULL,
  `id_users` int(11) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_barang`
--

INSERT INTO `mu_barang` (`id_barang`, `kode_barang`, `nama_barang`, `merek_brand`, `model_type`, `berat_bruto`, `ukuran_volume`, `warna`, `id_kategori`, `id_subkategori`, `id_rak`, `harga_beli`, `jml_minimal`, `jml_maksimal`, `stok`, `ppn`, `kode_satuan`, `keterangan_barang`, `foto_barang`, `status_jual`, `id_users`, `waktu_input`) VALUES
(1, 'BRG-000001', 'Sabun Mandi', 'Lifebuoy', 'Cair', 0.1, '10cm x 10 cm', 'putih', 1, 0, 2, 3000, 5, 200, 15, 10, 'lsn', 'Tuliskan Keterangan Disini,..', 'sabun.png', 'ya', 1, '2017-03-31 10:00:36'),
(2, 'BRG-000002', 'Tisu Basah', 'My Baby', '-', 0.2, '-', 'Pink', 2, 1, 2, 13000, 10, 100, 8, 10, 'bh', 'Barang ini hanya boleh dijual 1 perharinya. ', 'pigeon.jpg', 'ya', 1, '2017-01-11 14:30:18'),
(3, 'BRG-000003', 'Pillow Snack', 'Oishi', '-', 0.1, '-', 'kuning', 2, 1, 1, 1500, 12, 78, 7, 10, 'bh', '', '', 'ya', 1, '2017-03-05 08:39:35'),
(4, 'BRG-000004', 'Supermie Ayam Bawang', 'Indofood', 'Instant', 0, '15cm x 10 cm', 'kuning', 1, 0, 2, 2300, 10, 120, 0, 10, 'bh', 'Tidak Ada Keterangan,..', '', 'ya', 1, '2017-04-03 09:24:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_barang_harga`
--

CREATE TABLE `mu_barang_harga` (
  `id_barang_harga` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_kategori_pelanggan` int(11) NOT NULL,
  `id_jenis_jual` int(11) NOT NULL,
  `harga` varchar(111) NOT NULL,
  `persen_beli` varchar(111) NOT NULL,
  `diskon` varchar(111) NOT NULL,
  `jumlah` varchar(111) NOT NULL,
  `satuan` varchar(111) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_barang_harga`
--

INSERT INTO `mu_barang_harga` (`id_barang_harga`, `id_barang`, `id_kategori_pelanggan`, `id_jenis_jual`, `harga`, `persen_beli`, `diskon`, `jumlah`, `satuan`) VALUES
(1, 1, 1, 1, '3500', '17', '200', '1', 'bh'),
(2, 1, 1, 2, '3250', '8', '0', '3', 'bks'),
(3, 1, 1, 3, '3211', '7', '0', '12', 'lsn'),
(4, 1, 1, 4, '3200', '7', '0', '20', 'kodi'),
(5, 1, 2, 1, '3250', '8', '0', '1', 'bh'),
(6, 1, 2, 2, '3211', '7', '0', '3', 'bks'),
(7, 1, 2, 3, '3300', '10', '0', '12', 'lsn'),
(8, 1, 2, 4, '3150', '5', '0', '20', 'kodi'),
(9, 1, 3, 1, '3211', '7', '0', '1', 'bh'),
(10, 1, 3, 2, '3200', '7', '0', '3', 'bks'),
(11, 1, 3, 3, '3300', '10', '0', '12', 'lsn'),
(12, 1, 3, 4, '3050', '2', '0', '20', 'kodi'),
(13, 2, 1, 1, '2400', '13', '0', '1', 'bh'),
(14, 2, 1, 2, '2250', '8', '0', '3', 'bks'),
(15, 2, 1, 3, '2200', '7', '0', '12', 'lsn'),
(16, 2, 1, 4, '2300', '-74.615384615385', '0', '20', 'kodi'),
(17, 2, 2, 1, '2250', '-75', '0', '1', 'bh'),
(18, 2, 2, 2, '2200', '-75.384615384615', '0', '3', 'bks'),
(19, 2, 2, 3, '2300', '-74.615384615385', '0', '12', 'lsn'),
(20, 2, 2, 4, '2250', '-75', '0', '20', 'kodi'),
(21, 2, 3, 1, '2250', '-75', '0', '1', 'bh'),
(22, 2, 3, 2, '2200', '-75.384615384615', '0', '3', 'bks'),
(23, 2, 3, 3, '2300', '-74.615384615385', '0', '12', 'lsn'),
(24, 2, 3, 4, '2250', '-75', '0', '20', 'kodi'),
(37, 4, 1, 1, '2500', '9', '0', '1', 'bh'),
(25, 3, 1, 1, '2400', '60', '0', '1', 'bh'),
(26, 3, 1, 2, '2250', '50', '0', '3', 'bks'),
(27, 3, 1, 3, '2200', '47', '0', '12', 'lsn'),
(28, 3, 1, 4, '2300', '53', '0', '20', 'kodi'),
(29, 3, 2, 1, '2250', '50', '0', '1', 'bh'),
(30, 3, 2, 2, '2200', '47', '0', '3', 'bks'),
(31, 3, 2, 3, '2300', '53', '0', '12', 'lsn'),
(32, 3, 2, 4, '2250', '50', '0', '20', 'kodi'),
(33, 3, 3, 1, '2250', '50', '0', '1', 'bh'),
(34, 3, 3, 2, '2200', '47', '0', '3', 'bks'),
(35, 3, 3, 3, '2300', '53', '0', '12', 'lsn'),
(36, 3, 3, 4, '2250', '50', '0', '20', 'kodi'),
(38, 4, 1, 2, '2400', '4', '0', '12', 'lsn'),
(39, 4, 1, 3, '', '', '', '', ''),
(40, 4, 1, 4, '', '', '', '', ''),
(41, 4, 2, 1, '', '', '', '1', 'bh'),
(42, 4, 2, 2, '', '', '', '', 'lsn'),
(43, 4, 2, 3, '', '', '', '', ''),
(44, 4, 2, 4, '', '', '', '', ''),
(45, 4, 3, 1, '', '', '', '1', 'bh'),
(46, 4, 3, 2, '', '', '', '', 'lsn'),
(47, 4, 3, 3, '', '', '', '', ''),
(48, 4, 3, 4, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_barang_jenis_jual`
--

CREATE TABLE `mu_barang_jenis_jual` (
  `id_barang_jenis_jual` int(11) NOT NULL,
  `nama_jenis_jual` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_barang_jenis_jual`
--

INSERT INTO `mu_barang_jenis_jual` (`id_barang_jenis_jual`, `nama_jenis_jual`) VALUES
(1, 'Ritel'),
(2, 'Grosir 1'),
(3, 'Grosir 2'),
(4, 'Grosir 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_bebanbiaya_list`
--

CREATE TABLE `mu_bebanbiaya_list` (
  `id_bebanbiaya_list` int(11) NOT NULL,
  `id_bebanbiaya_sub` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_uang` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `waktu_proses` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_bebanbiaya_list`
--

INSERT INTO `mu_bebanbiaya_list` (`id_bebanbiaya_list`, `id_bebanbiaya_sub`, `tanggal`, `jumlah_uang`, `keterangan`, `id_karyawan`, `waktu_proses`) VALUES
(1, 7, '2017-03-01', 250000, 'Sudah dibayarkan,..', 1, '2017-03-07 09:19:15'),
(2, 1, '2017-03-02', 1500000, 'Sudah dibayarkan,..', 1, '2017-03-07 13:59:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_bebanbiaya_main`
--

CREATE TABLE `mu_bebanbiaya_main` (
  `id_bebanbiaya_main` int(11) NOT NULL,
  `nama_bebanbiaya_main` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_bebanbiaya_main`
--

INSERT INTO `mu_bebanbiaya_main` (`id_bebanbiaya_main`, `nama_bebanbiaya_main`) VALUES
(1, 'Beban Usaha atau Operasi'),
(2, 'Beban Penjualan'),
(3, 'Beban Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_bebanbiaya_sub`
--

CREATE TABLE `mu_bebanbiaya_sub` (
  `id_bebanbiaya_sub` int(11) NOT NULL,
  `id_bebanbiaya_main` int(11) NOT NULL,
  `nama_bebanbiaya_sub` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_bebanbiaya_sub`
--

INSERT INTO `mu_bebanbiaya_sub` (`id_bebanbiaya_sub`, `id_bebanbiaya_main`, `nama_bebanbiaya_sub`) VALUES
(1, 1, 'Beban Gaji Karyawan'),
(2, 1, 'Beban Biaya Pengiriman'),
(3, 1, 'Beban Listrik, Telepon dan Air'),
(4, 1, 'Beban Angkutan'),
(5, 1, 'Beban Perlengkapan'),
(6, 2, 'Return Penjualan'),
(7, 2, 'Beban Iklan'),
(8, 3, 'Beban Pajak Penjualan'),
(9, 3, 'Beban Bunga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_city`
--

CREATE TABLE `mu_city` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `mu_city`
--

INSERT INTO `mu_city` (`city_id`, `state_id`, `name`, `id_users`) VALUES
(1, 1, 'Badung', 1),
(2, 1, 'Bangli', 1),
(3, 1, 'Buleleng', 1),
(4, 1, 'Gianyar', 1),
(5, 1, 'Jembrana', 1),
(6, 1, 'Karangasem', 1),
(7, 1, 'Klungkung', 1),
(8, 1, 'Tabanan', 1),
(9, 1, 'Denpasar', 1),
(10, 2, 'Bengkulu Selatan', 1),
(11, 2, 'Bengkulu Utara', 1),
(12, 2, 'Kaur', 1),
(13, 2, 'Kepahiang', 1),
(14, 2, 'Lebong', 1),
(15, 2, 'Muko-Muko', 1),
(16, 2, 'Rejang Lebong', 1),
(17, 2, 'Seluma', 1),
(18, 2, 'Bengkulu', 1),
(19, 3, 'Lebak', 1),
(20, 3, 'Pandeglang', 1),
(21, 3, 'Serang', 1),
(22, 3, 'Tangerang', 1),
(23, 3, 'Cilegon', 1),
(24, 3, 'Tangerang', 1),
(25, 4, 'Bantul', 1),
(26, 4, 'Gunung Kidul', 1),
(27, 4, 'Kulon Progo', 1),
(28, 4, 'Sleman', 1),
(29, 4, 'Yogyakarta', 1),
(30, 5, 'Boalemo', 1),
(31, 5, 'Bone Bolango', 1),
(32, 5, 'Gorontalo', 1),
(33, 5, 'Pohuwato', 1),
(34, 6, 'Fak-fak', 1),
(35, 6, 'Kaimana', 1),
(36, 6, 'Monakwari', 1),
(37, 6, 'Raja Ampat', 1),
(38, 6, 'Sorong', 1),
(39, 6, 'Sorong Selatan', 1),
(40, 6, 'Teluk Bintuni', 1),
(41, 6, 'Teluk Wandama', 1),
(42, 7, 'Jakarta Barat', 1),
(43, 7, 'Jakarta Pusat', 1),
(44, 7, 'Jakarta Utara', 1),
(45, 7, 'Jakarta Timur', 1),
(46, 7, 'Jakarta Selatan', 1),
(47, 7, 'Kepulauan Seribu', 1),
(48, 8, 'Batang Hari', 1),
(49, 8, 'Bungo', 1),
(50, 8, 'Kerinci', 1),
(51, 8, 'Merangin', 1),
(52, 8, 'Muaro Jambi', 1),
(53, 8, 'Sarolangun', 1),
(54, 8, 'Tanjung Jabung Timur', 1),
(55, 8, 'Tanjung Jabung Barat', 1),
(56, 8, 'Tebo', 1),
(57, 8, 'Jambi', 1),
(58, 9, 'Bandung', 1),
(59, 9, 'Bekasi', 1),
(60, 9, 'Bogor', 1),
(61, 9, 'Ciamis', 1),
(62, 9, 'Cianjur', 1),
(63, 9, 'Cirebon', 1),
(64, 9, 'Garut', 1),
(65, 9, 'Indramayu', 1),
(66, 9, 'Karawang', 1),
(67, 9, 'Kuningan', 1),
(68, 9, 'Majanlengka', 1),
(69, 9, 'Purwakarta', 1),
(70, 9, 'Subang', 1),
(71, 9, 'Sukabumi', 1),
(72, 9, 'Sumedang', 1),
(73, 9, 'Tasikmalaya', 1),
(74, 9, 'Banjar', 1),
(75, 9, 'Cimahi', 1),
(76, 9, 'Depok', 1),
(77, 10, 'Banjarnegara', 1),
(78, 10, 'Banyumas', 1),
(79, 10, 'Batang', 1),
(80, 10, 'Blora', 1),
(81, 10, 'Boyolali', 1),
(82, 10, 'Brebes', 1),
(83, 10, 'Cilacap', 1),
(84, 10, 'Demak', 1),
(85, 10, 'Grobogan', 1),
(86, 10, 'Jepara', 1),
(87, 10, 'Karanganyar', 1),
(88, 10, 'Kebumen', 1),
(89, 10, 'Kendal', 1),
(90, 10, 'Klaten', 1),
(91, 10, 'Kudus', 1),
(92, 10, 'Magelang', 1),
(93, 10, 'Pati', 1),
(94, 10, 'Pekalongan', 1),
(95, 10, 'Pemalang', 1),
(96, 10, 'Purbalingga', 1),
(97, 10, 'Purworejo', 1),
(98, 10, 'Rembang', 1),
(99, 10, 'Semarang', 1),
(100, 10, 'Sragen', 1),
(101, 10, 'Sukoharjo', 1),
(102, 10, 'Tegal', 1),
(103, 10, 'Temanggung', 1),
(104, 10, 'Wonogiri', 1),
(105, 10, 'Wonosobo', 1),
(106, 11, 'Bangakalan', 1),
(107, 11, 'Banyuwangi', 1),
(108, 11, 'Blitar', 1),
(109, 11, 'Bojonegoro', 1),
(110, 11, 'Bondowoso', 1),
(111, 11, 'Gresik', 1),
(112, 11, 'Jember', 1),
(113, 11, 'Jombang', 1),
(114, 11, 'Kediri', 1),
(115, 11, 'Lamongan', 1),
(116, 11, 'Lumajang', 1),
(117, 11, 'Madiun', 1),
(118, 11, 'Magetan', 1),
(119, 11, 'Malang', 1),
(120, 11, 'Mojokerto', 1),
(121, 11, 'Nganjuk', 1),
(122, 11, 'Ngawi', 1),
(123, 11, 'Pacitan', 1),
(124, 11, 'Pamekasan', 1),
(125, 11, 'Pasuruan', 1),
(126, 11, 'Ponorogo', 1),
(127, 11, 'Probolinggo', 1),
(128, 11, 'Sampang', 1),
(129, 11, 'Sidoarjo', 1),
(130, 11, 'Situbondo', 1),
(131, 11, 'Sumenep', 1),
(132, 11, 'Trenggalek', 1),
(133, 11, 'Tuban', 1),
(134, 11, 'Tulungagung', 1),
(135, 11, 'Batu', 1),
(136, 11, 'Surabaya', 1),
(137, 12, 'Bengkayang', 1),
(138, 12, 'Kapuas Hulu', 1),
(139, 12, 'Ketapang', 1),
(140, 12, 'Landak', 1),
(141, 12, 'Melawi', 1),
(142, 12, 'Pontianak', 1),
(143, 12, 'Sambas', 1),
(144, 12, 'Sanggau', 1),
(145, 12, 'Sukadau', 1),
(146, 12, 'Sintang', 1),
(147, 13, 'Barito Selatan', 1),
(148, 13, 'Barito Timur', 1),
(149, 13, 'Barito Utara', 1),
(150, 13, 'Gunung Mas', 1),
(151, 13, 'Kapuas', 1),
(152, 13, 'Katingan', 1),
(153, 13, 'Kotawaringin Barat', 1),
(154, 13, 'Kotawaringin Timur', 1),
(155, 13, 'Lamandayu', 1),
(156, 13, 'Murung Raya', 1),
(157, 13, 'Pulang Pisau', 1),
(158, 13, 'Sukamara', 1),
(159, 13, 'Seruyan', 1),
(160, 13, 'Palangka Raya', 1),
(161, 14, 'Berau', 1),
(162, 14, 'Bulungan', 1),
(163, 14, 'Kutai Barat', 1),
(164, 14, 'Kutai Kertanegara', 1),
(165, 14, 'Kutai Timur', 1),
(166, 14, 'Malinau', 1),
(167, 14, 'Nunukan', 1),
(168, 14, 'Pasir', 1),
(169, 14, 'Penajam Paser Utara', 1),
(170, 14, 'Balikpapan', 1),
(171, 14, 'Bontang', 1),
(172, 14, 'Samarinda', 1),
(173, 14, 'Tarakan', 1),
(174, 15, 'Balangan', 1),
(175, 15, 'Banjar', 1),
(176, 15, 'Barito Kuala', 1),
(177, 15, 'Hulu Sungai Selatan', 1),
(178, 15, 'Hulu Sungai Tengah', 1),
(179, 15, 'Hulu Sungai Utara', 1),
(180, 15, 'Kota Baru', 1),
(181, 15, 'Kota Laut', 1),
(182, 15, 'Tabalong', 1),
(183, 15, 'Tanah Bambu', 1),
(184, 15, 'Tapin', 1),
(185, 15, 'Banjarbaru', 1),
(186, 15, 'Banjarmasin', 1),
(187, 16, 'Bangka', 1),
(188, 16, 'Bangka Barat', 1),
(189, 16, 'Bangka Tengah', 1),
(190, 16, 'Bangka Selatan', 1),
(191, 16, 'Belitung', 1),
(192, 16, 'Belitung Timur', 1),
(193, 16, 'Pangkal Pinang', 1),
(194, 17, 'Lampung Barat', 1),
(195, 17, 'Lampung Selatan', 1),
(196, 17, 'Lampung Tengah', 1),
(197, 17, 'Lampung Timur', 1),
(198, 17, 'Lampung Utara', 1),
(199, 17, 'Way Kanan', 1),
(200, 17, 'Tanggamus', 1),
(201, 17, 'Tulang Bawang', 1),
(202, 17, 'Bandar Lampung', 1),
(203, 17, 'Metro', 1),
(204, 18, 'Buru', 1),
(205, 18, 'Kepulauan Aru', 1),
(206, 18, 'Maluku Tengah', 1),
(207, 18, 'Maluku Tenggara', 1),
(208, 18, 'Maluku Tenggara Barat', 1),
(209, 18, 'Seram Bagian Barat', 1),
(210, 18, 'Seram Bagian Timur', 1),
(211, 18, 'Ambon', 1),
(212, 19, 'Halmahera Barat', 1),
(213, 19, 'Halmahera Selatan', 1),
(214, 19, 'Halmahera Tengah', 1),
(215, 19, 'Halmahera Timur', 1),
(216, 19, 'Halmahera Utara', 1),
(217, 19, 'Kepulauan Sula', 1),
(218, 19, 'Ternate', 1),
(219, 19, 'Tidore', 1),
(220, 20, 'Aceh Barat', 1),
(221, 20, 'Aceh Barat Daya', 1),
(222, 20, 'Aceh Besar', 1),
(223, 20, 'Aceh Jaya', 1),
(224, 20, 'Aceh Selatan', 1),
(225, 20, 'Aceh Singkil', 1),
(226, 20, 'Aceh Tamiang', 1),
(227, 20, 'Aceh Tengah', 1),
(228, 20, 'Aceh Tenggara', 1),
(229, 20, 'Aceh Timur', 1),
(230, 20, 'Aceh Utara', 1),
(231, 20, 'Bener Meriah', 1),
(232, 20, 'Bireuen', 1),
(233, 20, 'Gayo Lues', 1),
(234, 20, 'Nagan Raya', 1),
(235, 20, 'Pidie', 1),
(236, 20, 'Simeulue', 1),
(237, 20, 'Banda Aceh', 1),
(238, 20, 'Langsa', 1),
(239, 20, 'Lhokseumawe', 1),
(240, 20, 'Sabang', 1),
(241, 21, 'Bima', 1),
(242, 21, 'Dompu', 1),
(243, 21, 'Lombok Barat', 1),
(244, 21, 'Lombok Tengah', 1),
(245, 21, 'Lombok Timur', 1),
(246, 21, 'Sumbawa', 1),
(247, 21, 'Sumbawa Barat', 1),
(248, 21, 'Mataram', 1),
(249, 22, 'Alor', 1),
(250, 22, 'Belu', 1),
(251, 22, 'Ende', 1),
(252, 22, 'Flores Timur', 1),
(253, 22, 'Kupang', 1),
(254, 22, 'Lembata', 1),
(255, 22, 'Manggarai', 1),
(256, 22, 'Manggarai Barat', 1),
(257, 22, 'Ngada', 1),
(258, 22, 'Rote Ndau', 1),
(259, 22, 'Sikka', 1),
(260, 22, 'Sumba Barat', 1),
(261, 22, 'Sumba Timur', 1),
(262, 22, 'Timor Tengah Selatan', 1),
(263, 22, 'Timor Tengah Utara', 1),
(264, 22, 'Kupang', 1),
(265, 23, 'Asmat', 1),
(266, 23, 'Biak Numfor', 1),
(267, 23, 'Boven Digoel', 1),
(268, 23, 'Jayapura', 1),
(269, 23, 'Jayawijaya', 1),
(270, 23, 'Keeron', 1),
(271, 23, 'Mappi', 1),
(272, 23, 'Merauke', 1),
(273, 23, 'Mimika', 1),
(274, 23, 'Nabire', 1),
(275, 23, 'Paniai', 1),
(276, 23, 'Pegunungan Bintang', 1),
(277, 23, 'Puncak Jaya', 1),
(278, 23, 'Sarmi', 1),
(279, 23, 'Sapiori', 1),
(280, 23, 'Tolikara', 1),
(281, 23, 'Waropen', 1),
(282, 23, 'Yahukimo', 1),
(283, 23, 'Yapen Waropen', 1),
(284, 24, 'Bengkalis', 1),
(285, 24, 'Indragiri Hilir', 1),
(286, 24, 'Indragiri Hulu', 1),
(287, 24, 'Kampar', 1),
(288, 24, 'Kuantan Singingi', 1),
(289, 24, 'Pelalawan', 1),
(290, 24, 'Rokan Hulu', 1),
(291, 24, 'Rokan Hilir', 1),
(292, 24, 'Siak', 1),
(293, 24, 'Dumai', 1),
(294, 24, 'Pekanbaru', 1),
(295, 25, 'Karimun', 1),
(296, 25, 'Bintan', 1),
(297, 25, 'Lingga', 1),
(298, 25, 'Natuna', 1),
(299, 25, 'Batam', 1),
(300, 25, 'Tanjung Pinang', 1),
(301, 26, 'Majene', 1),
(302, 26, 'Mamasa', 1),
(303, 26, 'Mamuju', 1),
(304, 26, 'Mamuju Utara', 1),
(305, 26, 'Polewali Mandar', 1),
(306, 27, 'Banggai', 1),
(307, 27, 'Banggai Kepulauan', 1),
(308, 27, 'Buol', 1),
(309, 27, 'Donggala', 1),
(310, 27, 'Morowali', 1),
(311, 27, 'Pirigi Moutong', 1),
(312, 27, 'Poso', 1),
(313, 27, 'Tojo Una-Una', 1),
(314, 27, 'Toli-Toli', 1),
(315, 27, 'Palu', 1),
(316, 28, 'Bombana', 1),
(317, 28, 'Buton', 1),
(318, 28, 'Kolaka', 1),
(319, 28, 'Kolaka Utara', 1),
(320, 28, 'Konawe', 1),
(321, 28, 'Konawe Selatan', 1),
(322, 28, 'Muna', 1),
(323, 28, 'Wakatobi', 1),
(324, 28, 'Bau-Bau', 1),
(325, 28, 'Kendari', 1),
(326, 29, 'Bantaeng', 1),
(327, 29, 'Barru', 1),
(328, 29, 'Bone', 1),
(329, 29, 'Bulukumba', 1),
(330, 29, 'Enrekang', 1),
(331, 29, 'Gowa', 1),
(332, 29, 'Jeneponto', 1),
(333, 29, 'Luwu', 1),
(334, 29, 'Luwu Timur', 1),
(335, 29, 'Luwu Utara', 1),
(336, 29, 'Maros', 1),
(337, 29, 'Pangkajene Kepulauan', 1),
(338, 29, 'Pinrang', 1),
(339, 29, 'Selayar', 1),
(340, 29, 'Sinjai', 1),
(341, 29, 'Sidenreng Rappang', 1),
(342, 29, 'Soppeng', 1),
(343, 29, 'Takalar', 1),
(344, 29, 'Tana Toraja', 1),
(345, 29, 'Wajo', 1),
(346, 29, 'Makassar', 1),
(347, 29, 'Palopo', 1),
(348, 29, 'Pare-Pare', 1),
(349, 30, 'Bolaang Mongondow', 1),
(350, 30, 'Kepulaun Sangihe', 1),
(351, 30, 'Kepulauan Talaud', 1),
(352, 30, 'Minahasa', 1),
(353, 30, 'Minahasa Selatan', 1),
(354, 30, 'Minahasa Utara', 1),
(355, 30, 'Bitung', 1),
(356, 30, 'Manado', 1),
(357, 30, 'Tomohon', 1),
(358, 31, 'Agam', 1),
(359, 31, 'Dharmasraya', 1),
(360, 31, 'Limapuluh Koto', 1),
(361, 31, 'Kepulauan Mentawai', 1),
(362, 31, 'Padang Pariaman', 1),
(363, 31, 'Pasaman', 1),
(364, 31, 'Pasaman Barat', 1),
(365, 31, 'Pesisir Selatan', 1),
(366, 31, 'Sawahlunto Sijunjung', 1),
(367, 31, 'Solok', 1),
(368, 31, 'Solok Selatan', 1),
(369, 31, 'Tanah Datar', 1),
(370, 31, 'Bukittinggi', 1),
(371, 31, 'Padang', 1),
(372, 31, 'Padang Panjang', 1),
(373, 31, 'Pariaman', 1),
(374, 31, 'Payakumbuh', 1),
(375, 32, 'Banyuasin', 1),
(376, 32, 'Lahat', 1),
(377, 32, 'Muara Enim', 1),
(378, 32, 'Musi Banyuasin', 1),
(379, 32, 'Musi Rawas', 1),
(380, 32, 'Ogan Ilir', 1),
(381, 32, 'Ogan Komering Ilir', 1),
(382, 32, 'Ogan Komering Ulu', 1),
(383, 32, 'Ogan Komering Ulu Timur', 1),
(384, 32, 'Ogan Komering Ulu Selatan', 1),
(385, 32, 'Lubuklinggau', 1),
(386, 32, 'Pagar Alam', 1),
(387, 32, 'Palembang', 1),
(388, 32, 'Prabumulih', 1),
(389, 33, 'Asahan', 1),
(390, 33, 'Dairi', 1),
(391, 33, 'Deli Serdang', 1),
(392, 33, 'Humbang Hasundatan', 1),
(393, 33, 'Karo', 1),
(394, 33, 'Labuhan Batu', 1),
(395, 33, 'Langkat', 1),
(396, 33, 'Mandailing Natal', 1),
(397, 33, 'Nias', 1),
(398, 33, 'Nias Selatan', 1),
(399, 33, 'Pakpak Bharat', 1),
(400, 33, 'Samosir', 1),
(401, 33, 'Serdang Bedagai', 1),
(402, 33, 'Simalungun', 1),
(403, 33, 'Tapanuli Selatan', 1),
(404, 33, 'Tapanuli Tengah', 1),
(405, 33, 'Tapanuli Utara', 1),
(406, 33, 'Toba Samosir', 1),
(407, 33, 'Binjai', 1),
(408, 33, 'Medan', 1),
(409, 33, 'Padang Sidempuan', 1),
(410, 33, 'Pematangsiantar', 1),
(411, 33, 'Sibolga', 1),
(412, 33, 'Tanjung Balai', 1),
(413, 33, 'Tebing Tinggi', 1),
(2019, 10, 'Salatiga', 1),
(2020, 23, 'Timika', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_conf_barang`
--

CREATE TABLE `mu_conf_barang` (
  `id_conf_barang` int(11) NOT NULL,
  `kode_barang` enum('default','angka') NOT NULL,
  `harga_grosir` enum('visible','hidden') NOT NULL,
  `grosir_berdasarkan` enum('multi_satuan','jumlah_minimal') NOT NULL,
  `harga_kategori_pelanggan` enum('visible','hidden') NOT NULL,
  `kode_satuan` varchar(11) NOT NULL,
  `konversi_satuan_beli` enum('visible','hidden') NOT NULL,
  `sertakan_gambar` enum('visible','hidden') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_conf_barang`
--

INSERT INTO `mu_conf_barang` (`id_conf_barang`, `kode_barang`, `harga_grosir`, `grosir_berdasarkan`, `harga_kategori_pelanggan`, `kode_satuan`, `konversi_satuan_beli`, `sertakan_gambar`) VALUES
(1, 'default', 'visible', 'multi_satuan', 'visible', 'bh', 'visible', 'visible');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_conf_penjualan`
--

CREATE TABLE `mu_conf_penjualan` (
  `id_conf_penjualan` int(11) NOT NULL,
  `terapkan_pajak` enum('visible','hidden') NOT NULL,
  `font_totalbayar_besar` enum('visible','hidden') NOT NULL,
  `posisi_totalbayar_besar` enum('atas','bawah') NOT NULL,
  `font_jumlahbayar_besar` enum('visible','hidden') NOT NULL,
  `tipe_diskon` enum('persen','uang') NOT NULL,
  `terapkan_perubahan_diskon` enum('visible','hidden') NOT NULL,
  `terapkan_perubahan_harga` enum('visible','hidden') NOT NULL,
  `terapkan_batas_piutang` enum('visible','hidden') NOT NULL,
  `id_jatuh_tempo` int(11) NOT NULL,
  `menunjang_penjualan_tunggu` enum('visible','hidden') NOT NULL,
  `sertakan_nama_penjual` enum('visible','hidden') NOT NULL,
  `sertakan_biaya_kirim` enum('visible','hidden') NOT NULL,
  `diskon_agen_expadisi` enum('visible','hidden') NOT NULL,
  `tipe_diskon_ekspedisi` enum('persen','uang') NOT NULL,
  `diskon_untuk_pelanggan` enum('visible','hidden') NOT NULL,
  `tipe_diskon_pelanggan` enum('persen','uang') NOT NULL,
  `kode_satuan` varchar(11) NOT NULL,
  `keterangan_perbarang` enum('visible','hidden') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_conf_penjualan`
--

INSERT INTO `mu_conf_penjualan` (`id_conf_penjualan`, `terapkan_pajak`, `font_totalbayar_besar`, `posisi_totalbayar_besar`, `font_jumlahbayar_besar`, `tipe_diskon`, `terapkan_perubahan_diskon`, `terapkan_perubahan_harga`, `terapkan_batas_piutang`, `id_jatuh_tempo`, `menunjang_penjualan_tunggu`, `sertakan_nama_penjual`, `sertakan_biaya_kirim`, `diskon_agen_expadisi`, `tipe_diskon_ekspedisi`, `diskon_untuk_pelanggan`, `tipe_diskon_pelanggan`, `kode_satuan`, `keterangan_perbarang`) VALUES
(1, 'visible', 'hidden', 'atas', 'visible', 'uang', 'hidden', 'hidden', 'visible', 4, 'visible', 'hidden', 'visible', 'visible', 'persen', 'visible', 'uang', 'kodi', 'hidden');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_conf_perusahaan`
--

CREATE TABLE `mu_conf_perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `npwp_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `fax` varchar(150) NOT NULL,
  `website` varchar(255) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_conf_perusahaan`
--

INSERT INTO `mu_conf_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `npwp_perusahaan`, `alamat_perusahaan`, `city_id`, `state_id`, `country_id`, `telepon`, `email`, `fax`, `website`, `kode_pos`, `logo`) VALUES
(1, 'Selamat Bekerja di Gudang Multigroup', 'NPWP-452355', 'Ratu Plaza, Kav. 9 No. 9 Lantai, Jl. Jend. Sudirman, RT.1/RW.3, Duren Tiga', 43, 7, 1, '087782129053', 'mstoreindonesia@gmail.com', '(021) 72795886', 'www.mstore.com', 10270, 'logo_multigroup.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_country`
--

CREATE TABLE `mu_country` (
  `country_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_country`
--

INSERT INTO `mu_country` (`country_id`, `name`, `id_users`) VALUES
(1, 'Indonesia', 1),
(2, 'Inggris', 1),
(3, 'Malaysia', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_departemen`
--

CREATE TABLE `mu_departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_departemen`
--

INSERT INTO `mu_departemen` (`id_departemen`, `nama_departemen`, `keterangan`, `id_users`) VALUES
(1, 'Direksi', 'Direksi Usaha', 1),
(2, 'Keuangan', 'Bagian Keuangan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_jabatan`
--

CREATE TABLE `mu_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_jabatan`
--

INSERT INTO `mu_jabatan` (`id_jabatan`, `nama_jabatan`, `keterangan`, `id_users`) VALUES
(1, 'Kasir', 'Petugas Kasir Penjualan', 1),
(2, 'Pelayanan (Teknisi)', 'Orang yang melayani pelayanan atau service (jasa) seperti teknisi dan mekanik', 1),
(3, 'Pemilik', 'Owner atau Pemilik Usaha', 1),
(4, 'Penjual', 'Oarang yang menjualkan Produk seperti Salesmen atau Marketing', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_jatuh_tempo`
--

CREATE TABLE `mu_jatuh_tempo` (
  `id_jatuh_tempo` int(11) NOT NULL,
  `hari_jatuh_tempo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_jatuh_tempo`
--

INSERT INTO `mu_jatuh_tempo` (`id_jatuh_tempo`, `hari_jatuh_tempo`) VALUES
(1, '1'),
(2, '3'),
(3, '7'),
(4, '15'),
(5, '20'),
(6, '30'),
(7, '40'),
(8, '60');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_jenis_kelamin`
--

CREATE TABLE `mu_jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `nama_jenis_kelamin` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_jenis_kelamin`
--

INSERT INTO `mu_jenis_kelamin` (`id_jenis_kelamin`, `nama_jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_karyawan`
--

CREATE TABLE `mu_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `id_jenis_kelamin` int(11) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_status_pernikahan` int(11) NOT NULL,
  `alamat_karyawan_1` varchar(255) NOT NULL,
  `alamat_karyawan_2` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `telepon_karyawan` varchar(15) NOT NULL,
  `hp_karyawan` varchar(15) NOT NULL,
  `email_karyawan` varchar(150) NOT NULL,
  `website_karyawan` varchar(255) NOT NULL,
  `kode_pos_karyawan` int(10) NOT NULL,
  `fax_karyawan` varchar(15) NOT NULL,
  `chat_karyawan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `foto_karyawan` varchar(255) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_status_karyawan` int(11) NOT NULL,
  `aktif` enum('ya','tidak') NOT NULL,
  `id_users` int(11) NOT NULL,
  `waktu_daftar` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_karyawan`
--

INSERT INTO `mu_karyawan` (`id_karyawan`, `username`, `password`, `nik`, `nama_karyawan`, `id_jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `id_agama`, `id_status_pernikahan`, `alamat_karyawan_1`, `alamat_karyawan_2`, `city_id`, `state_id`, `country_id`, `telepon_karyawan`, `hp_karyawan`, `email_karyawan`, `website_karyawan`, `kode_pos_karyawan`, `fax_karyawan`, `chat_karyawan`, `keterangan`, `foto_karyawan`, `id_jabatan`, `id_departemen`, `tanggal_masuk`, `id_status_karyawan`, `aktif`, `id_users`, `waktu_daftar`) VALUES
(1, 'diditsadid', '2901f0977d50c596419d18f316585e78', '547435345450', 'Nashiruddien Sadid M', 1, 'Surabaya', '2000-08-18', 1, 1, 'Jl. Dupak Bandarejo 1/21', '', 136, 11, 1, '085692650482', '085692650482', 'nsm180818@gmail.com', 'https://mstore.co.id', 60179, '085692650482', 'nsm180818@gmail.com', '', 'IMG-20200610-WA0012_(2).jpg', 2, 1, '2019-11-15', 1, 'ya', 1, '2020-07-07 11:25:38'),
(2, 'mstore', '0192023a7bbd73250516f069df18b500', '997435345900', 'Mala', 2, 'Banten', '2000-04-19', 1, 4, 'Jl. Angkasa Puri', '', 21, 3, 1, '0751461698', '082888661299', 'mala.mal@gmail.com', 'http://mstore.co.id', 56980, '0751461655', 'mala.mal@gmail.com', '', 'yen.jpg', 1, 2, '2019-09-09', 1, 'ya', 2, '2020-07-07 13:29:50'),
(3, 'lily', '89f288757f4d0693c99b007855fc075e', '547435345450', 'lily', 2, 'Jakarta', '2000-04-19', 7, 1, 'Jl. Dupak Bandarejo 1/21', '', 46, 7, 1, '08321321413', '08321312443', 'mala.mal@gmail.com', 'https://mstore.co.id', 53234, '0873281312', 'mala.mal@gmail.com', '', 'doctor9.png', 3, 1, '2020-06-28', 1, 'ya', 2, '2020-07-15 11:49:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_kategori`
--

CREATE TABLE `mu_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_kategori`
--

INSERT INTO `mu_kategori` (`id_kategori`, `nama_kategori`, `id_users`) VALUES
(1, 'Barang Panas', 1),
(2, 'Barang Dingin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_kategori_pelanggan`
--

CREATE TABLE `mu_kategori_pelanggan` (
  `id_kategori_pelanggan` int(11) NOT NULL,
  `nama_kategori_pelanggan` varchar(255) NOT NULL,
  `permanen` enum('y','n') NOT NULL DEFAULT 'n',
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_kategori_pelanggan`
--

INSERT INTO `mu_kategori_pelanggan` (`id_kategori_pelanggan`, `nama_kategori_pelanggan`, `permanen`, `id_users`) VALUES
(1, 'Pelanggan Umum', 'y', 1),
(2, 'Teknisi', 'n', 1),
(3, 'Cabang Usaha', 'n', 1),
(5, 'Members A', 'n', 1),
(6, 'Members B', 'n', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_pelanggan`
--

CREATE TABLE `mu_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_kategori_pelanggan` int(11) NOT NULL,
  `id_type_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `kontak_pelanggan` varchar(150) NOT NULL,
  `alamat_pelanggan_1` varchar(255) NOT NULL,
  `alamat_pelanggan_2` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `telpon_pelanggan` varchar(15) NOT NULL,
  `hp_pelanggan` varchar(15) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `website_pelanggan` varchar(100) NOT NULL,
  `kode_pos_pelanggan` int(10) NOT NULL,
  `fax_pelanggan` varchar(15) NOT NULL,
  `chat_pelanggan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `waktu_daftar` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_pelanggan`
--

INSERT INTO `mu_pelanggan` (`id_pelanggan`, `id_kategori_pelanggan`, `id_type_pelanggan`, `nama_pelanggan`, `kontak_pelanggan`, `alamat_pelanggan_1`, `alamat_pelanggan_2`, `city_id`, `state_id`, `country_id`, `telpon_pelanggan`, `hp_pelanggan`, `email_pelanggan`, `website_pelanggan`, `kode_pos_pelanggan`, `fax_pelanggan`, `chat_pelanggan`, `keterangan`, `id_users`, `waktu_daftar`) VALUES
(1, 1, 1, 'Dewiit Safitri', '081265253322 (Dedew)', 'Jln, Saruko Rayo Bamato', '', 373, 31, 1, '0751223311', '085263012000', 'dewitt.safitri@gmail.com', 'http://dewiit.com', 45789, '0751220011', 'dewitt.safitri@yahoo.com', '', 1, '2016-12-31 09:13:22'),
(2, 2, 2, 'Arsenio Orlando', '082173054500', 'Jln. Ulak Karang Raya', '', 373, 31, 1, '0751635899', '082365447899', 'arsenio@gmail.com', 'http://arsenio.com', 45123, '0751567788', 'arsenio@yahoo.com', '', 1, '2016-12-31 06:24:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_pelanggan_piutang`
--

CREATE TABLE `mu_pelanggan_piutang` (
  `id_pelanggan_piutang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `batas_piutang` int(11) NOT NULL,
  `batas_frekuensi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_pelanggan_piutang`
--

INSERT INTO `mu_pelanggan_piutang` (`id_pelanggan_piutang`, `id_pelanggan`, `batas_piutang`, `batas_frekuensi`) VALUES
(1, 2, 750000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_pembelian`
--

CREATE TABLE `mu_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `kode_pembelian` varchar(50) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_type_bayar` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `referensi` varchar(255) NOT NULL,
  `kepada_attention` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL,
  `waktu_pembelian` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_pembelian`
--

INSERT INTO `mu_pembelian` (`id_pembelian`, `kode_pembelian`, `tgl_kirim`, `id_karyawan`, `id_supplier`, `id_type_bayar`, `keterangan`, `tgl_pembelian`, `tgl_terima`, `referensi`, `kepada_attention`, `id_users`, `waktu_pembelian`) VALUES
(1, 'PO-000001', '2017-02-15', 1, 1, 1, 'Sudah di orderkan,..', '2017-02-13', '0000-00-00', 'Tidak ada referensi...', 'indofood@gmail.com', 1, '2017-02-13 05:36:17'),
(2, 'PO-000002', '2017-02-16', 2, 4, 1, 'sudah di orderkan lagi,..', '2017-02-14', '0000-00-00', 'Tidak ada referensi...', 'karimie@gmail.com', 1, '2017-02-13 05:37:48'),
(3, 'PO-000003', '2017-05-08', 1, 4, 1, 'asdasdsadas', '2017-05-09', '0000-00-00', '-', 'Direktur PT. Karimie Indonesia', 1, '2017-05-08 09:32:04'),
(5, 'PO-000004', '2017-05-08', 1, 4, 1, 'Keterangan tulis disini,..', '2017-05-08', '0000-00-00', '-', 'Direktur PT. Karimie Indonesia', 1, '2017-05-08 11:01:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_pembelian_detail`
--

CREATE TABLE `mu_pembelian_detail` (
  `id_pembelian_detail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jml_pesan` int(11) NOT NULL,
  `harga_pesan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_pembelian_detail`
--

INSERT INTO `mu_pembelian_detail` (`id_pembelian_detail`, `id_pembelian`, `id_barang`, `jml_pesan`, `harga_pesan`) VALUES
(1, 1, 2, 5, 13000),
(2, 1, 3, 7, 6500),
(3, 1, 1, 3, 3000),
(4, 2, 1, 4, 3000),
(5, 2, 3, 3, 6500),
(10, 5, 2, 3, 13000),
(9, 5, 1, 5, 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_pembelian_return`
--

CREATE TABLE `mu_pembelian_return` (
  `id_pembelian_return` int(11) NOT NULL,
  `id_pembelian_terima` int(11) NOT NULL,
  `no_return` varchar(50) NOT NULL,
  `tgl_kirim_return` date NOT NULL,
  `id_type_bayar` int(11) NOT NULL,
  `keterangan_return` text NOT NULL,
  `tanggal_return` date NOT NULL,
  `id_users` int(11) NOT NULL,
  `waktu_return` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_pembelian_return`
--

INSERT INTO `mu_pembelian_return` (`id_pembelian_return`, `id_pembelian_terima`, `no_return`, `tgl_kirim_return`, `id_type_bayar`, `keterangan_return`, `tanggal_return`, `id_users`, `waktu_return`) VALUES
(1, 1, 'RET-001', '2017-02-14', 1, 'Sudah dibayarkan semua,..', '2017-02-14', 1, '2017-02-13 05:41:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_pembelian_return_detail`
--

CREATE TABLE `mu_pembelian_return_detail` (
  `id_pembelian_return_detail` int(11) NOT NULL,
  `id_pembelian_return` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_return` int(11) NOT NULL,
  `jml_return` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_pembelian_return_detail`
--

INSERT INTO `mu_pembelian_return_detail` (`id_pembelian_return_detail`, `id_pembelian_return`, `id_barang`, `harga_return`, `jml_return`) VALUES
(1, 1, 1, 3000, 0),
(2, 1, 3, 6500, 3),
(3, 1, 2, 13000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_pembelian_terima`
--

CREATE TABLE `mu_pembelian_terima` (
  `id_pembelian_terima` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `no_pembelian_terima` varchar(50) NOT NULL,
  `no_surat_jalan` varchar(50) NOT NULL,
  `pengirim_barang` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_terima` date NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `waktu_proses` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_pembelian_terima`
--

INSERT INTO `mu_pembelian_terima` (`id_pembelian_terima`, `id_pembelian`, `no_pembelian_terima`, `no_surat_jalan`, `pengirim_barang`, `keterangan`, `tanggal_terima`, `id_karyawan`, `id_users`, `waktu_proses`) VALUES
(1, 1, 'TR-000001', 'JLN-001', 'Amaik Sapihi', 'Barang sampai dengan selamat,..', '2017-02-17', 2, 1, '2017-02-13 05:39:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_pembelian_terima_detail`
--

CREATE TABLE `mu_pembelian_terima_detail` (
  `id_pembelian_terima_detail` int(11) NOT NULL,
  `id_pembelian_terima` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_pembelian` int(11) NOT NULL,
  `jml_terima` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_pembelian_terima_detail`
--

INSERT INTO `mu_pembelian_terima_detail` (`id_pembelian_terima_detail`, `id_pembelian_terima`, `id_barang`, `harga_pembelian`, `jml_terima`) VALUES
(1, 1, 1, 3000, 3),
(2, 1, 3, 6500, 7),
(3, 1, 2, 13000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_pendapatan_list`
--

CREATE TABLE `mu_pendapatan_list` (
  `id_pendapatan_list` int(11) NOT NULL,
  `id_pendapatan_sub` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_uang` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `waktu_proses` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_pendapatan_list`
--

INSERT INTO `mu_pendapatan_list` (`id_pendapatan_list`, `id_pendapatan_sub`, `tanggal`, `jumlah_uang`, `keterangan`, `id_karyawan`, `waktu_proses`) VALUES
(1, 2, '2017-03-07', 74500, 'Sudah di transferkan,..', 1, '2017-03-07 16:11:16'),
(2, 1, '2017-03-07', 4800, 'Sudah lunas,..', 1, '2017-03-07 16:29:27'),
(3, 1, '2017-03-18', 3300, '', 1, '2017-03-18 15:26:33'),
(4, 1, '2017-05-06', 5700, '', 1, '2017-05-06 10:40:12'),
(5, 1, '2017-05-06', 2400, '', 1, '2017-05-06 10:42:56'),
(6, 1, '2017-05-06', 4800, '', 1, '2017-05-06 10:44:01'),
(7, 1, '2017-05-15', 0, '', 1, '2017-05-15 14:27:11'),
(8, 1, '2017-05-15', 2400, '', 1, '2017-05-15 14:44:12'),
(9, 1, '2017-05-15', 2400, '', 1, '2017-05-15 14:51:56'),
(10, 1, '2017-05-15', 4800, '', 1, '2017-05-15 14:52:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_pendapatan_main`
--

CREATE TABLE `mu_pendapatan_main` (
  `id_pendapatan_main` int(11) NOT NULL,
  `nama_pendapatan_main` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_pendapatan_main`
--

INSERT INTO `mu_pendapatan_main` (`id_pendapatan_main`, `nama_pendapatan_main`) VALUES
(1, 'Penjualan'),
(2, 'Pendapatan Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_pendapatan_sub`
--

CREATE TABLE `mu_pendapatan_sub` (
  `id_pendapatan_sub` int(11) NOT NULL,
  `id_pendapatan_main` int(11) NOT NULL,
  `nama_pendapatan_sub` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_pendapatan_sub`
--

INSERT INTO `mu_pendapatan_sub` (`id_pendapatan_sub`, `id_pendapatan_main`, `nama_pendapatan_sub`) VALUES
(1, 1, 'Penjualan Barang'),
(2, 2, 'Biaya Pengiriman (Ongkir)'),
(3, 2, 'Diskon Biaya Pengiriman'),
(4, 2, 'Potongan Pembelian'),
(5, 2, 'Pendapatan Bunga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_pendidikan`
--

CREATE TABLE `mu_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nama_pendidikan` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_pendidikan`
--

INSERT INTO `mu_pendidikan` (`id_pendidikan`, `nama_pendidikan`, `id_users`) VALUES
(1, 'SMP', 1),
(2, 'SMA', 1),
(3, 'D3', 1),
(4, 'S1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_penyesuaian`
--

CREATE TABLE `mu_penyesuaian` (
  `id_penyesuaian` int(11) NOT NULL,
  `id_sebab_alasan` int(11) NOT NULL,
  `tanggal_penyesuaian` date NOT NULL,
  `keterangan` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `tanggal_proses` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_penyesuaian`
--

INSERT INTO `mu_penyesuaian` (`id_penyesuaian`, `id_sebab_alasan`, `tanggal_penyesuaian`, `keterangan`, `id_users`, `tanggal_proses`) VALUES
(1, 2, '2017-02-13', 'Seharusnya ada tambahan lagi,..', 1, '2017-02-13 05:28:46'),
(2, 1, '2017-02-14', 'Beberapa Barang hilang,..', 1, '2017-02-13 05:31:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_penyesuaian_detail`
--

CREATE TABLE `mu_penyesuaian_detail` (
  `id_penyesuaian_detail` int(11) NOT NULL,
  `id_penyesuaian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stok_history` int(11) NOT NULL,
  `tambah` int(11) NOT NULL,
  `kurang` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_penyesuaian_detail`
--

INSERT INTO `mu_penyesuaian_detail` (`id_penyesuaian_detail`, `id_penyesuaian`, `id_barang`, `stok_history`, `tambah`, `kurang`, `keterangan`) VALUES
(1, 1, 3, 0, 5, 0, ''),
(2, 1, 2, 0, 10, 0, ''),
(3, 1, 1, 0, 15, 0, ''),
(6, 2, 1, 12, 0, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_promosi`
--

CREATE TABLE `mu_promosi` (
  `id_promosi` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `kode_terapkan` varchar(50) NOT NULL,
  `id_kategori` int(11) DEFAULT 0,
  `id_subkategori` int(11) DEFAULT 0,
  `beli_barang` int(11) NOT NULL,
  `jml_beli` int(11) NOT NULL,
  `bonus_barang` int(11) NOT NULL,
  `jml_bonus` int(11) NOT NULL,
  `jenis_diskon` enum('persen','uang') NOT NULL,
  `keterangan` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `waktu_promosi` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_promosi`
--

INSERT INTO `mu_promosi` (`id_promosi`, `tgl_mulai`, `tgl_selesai`, `kode_terapkan`, `id_kategori`, `id_subkategori`, `beli_barang`, `jml_beli`, `bonus_barang`, `jml_bonus`, `jenis_diskon`, `keterangan`, `id_users`, `waktu_promosi`) VALUES
(1, '2017-03-31', '2017-05-05', 'barang', 0, 0, 1, 2, 2, 1, 'uang', '', 1, '2017-05-05 06:59:13'),
(2, '2017-03-31', '2017-04-04', 'kategori', 1, NULL, 0, 0, 0, 0, 'uang', '', 1, '2017-04-03 09:19:47'),
(3, '2017-03-29', '2017-04-06', 'subkategori', 0, 1, 0, 0, 0, 0, 'persen', '', 1, '2017-03-31 10:34:53'),
(4, '2017-03-30', '2017-04-07', 'barang', 0, 0, 3, 0, 3, 0, 'uang', '', 1, '2017-03-31 10:24:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_promosi_detail`
--

CREATE TABLE `mu_promosi_detail` (
  `id_promosi_detail` int(11) NOT NULL,
  `id_promosi` int(11) NOT NULL,
  `id_kategori_pelanggan` int(11) NOT NULL,
  `ecer` int(11) DEFAULT NULL,
  `grosir1` int(11) DEFAULT NULL,
  `grosir2` int(11) DEFAULT NULL,
  `grosir3` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_promosi_detail`
--

INSERT INTO `mu_promosi_detail` (`id_promosi_detail`, `id_promosi`, `id_kategori_pelanggan`, `ecer`, `grosir1`, `grosir2`, `grosir3`) VALUES
(1, 1, 1, 150, 0, 0, 0),
(2, 1, 2, 0, 0, 0, 0),
(3, 1, 3, 0, 0, 0, 0),
(4, 2, 1, 200, 300, 300, 300),
(5, 2, 2, 0, 0, 0, 0),
(6, 2, 3, 0, 0, 0, 0),
(7, 3, 1, 5, 10, 10, 10),
(8, 3, 2, 0, 0, 0, 0),
(9, 3, 3, 0, 0, 0, 0),
(10, 4, 1, 400, 500, 500, 500),
(11, 4, 2, 0, 0, 0, 0),
(12, 4, 3, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_promosi_terapkan`
--

CREATE TABLE `mu_promosi_terapkan` (
  `kode_terapkan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_promosi_terapkan`
--

INSERT INTO `mu_promosi_terapkan` (`kode_terapkan`, `keterangan`) VALUES
('barang', 'Barang'),
('kategori', 'Kategori'),
('subkategori', 'Subkategori');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_rak`
--

CREATE TABLE `mu_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_rak`
--

INSERT INTO `mu_rak` (`id_rak`, `nama_rak`, `keterangan`, `id_users`) VALUES
(1, '1.1', 'Rak 1.1', 1),
(2, '1.2', 'Rak 1.2', 1),
(3, '2.1', 'Rak 2.1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_satuan`
--

CREATE TABLE `mu_satuan` (
  `kode_satuan` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_satuan`
--

INSERT INTO `mu_satuan` (`kode_satuan`, `keterangan`, `id_users`) VALUES
('kodi', 'Kodi', 1),
('bh', 'Buah', 1),
('bks', 'Bungkus', 1),
('lsn', 'Lusin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_sebab_alasan`
--

CREATE TABLE `mu_sebab_alasan` (
  `id_sebab_alasan` int(11) NOT NULL,
  `nama_sebab_alasan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_sebab_alasan`
--

INSERT INTO `mu_sebab_alasan` (`id_sebab_alasan`, `nama_sebab_alasan`, `keterangan`, `id_users`) VALUES
(1, 'Hilang', 'Barang Hilang', 1),
(2, 'Koreksi', 'Koreksi Barang karena kesalahan Input', 1),
(3, 'Rusak', 'Barang Rusak', 1),
(4, 'Saldo Awal', 'Stok Awal barang', 1),
(5, 'Stok Opname', 'Selisih Stok Buku dan Stok Opname', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_state`
--

CREATE TABLE `mu_state` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `mu_state`
--

INSERT INTO `mu_state` (`state_id`, `country_id`, `name`, `id_users`) VALUES
(1, 1, 'Bali', 1),
(2, 1, 'Bengkulu', 1),
(3, 1, 'Banten', 1),
(4, 1, 'DIY', 1),
(5, 1, 'Gorontalo', 1),
(6, 1, 'Irian Jaya Barat', 1),
(7, 1, 'Jakarta', 1),
(8, 1, 'Jambi', 1),
(9, 1, 'Jawa Barat', 1),
(10, 1, 'Jawa Tengah', 1),
(11, 1, 'Jawa Timur', 1),
(12, 1, 'Kalimantan Barat', 1),
(13, 1, 'Kalimantan Tengah', 1),
(14, 1, 'Kalimantan Timur', 1),
(15, 1, 'Kalimantan Selatan', 1),
(16, 1, 'Kepulauan Bangka Belitung', 1),
(17, 1, 'Lampung', 1),
(18, 1, 'Maluku', 1),
(19, 1, 'Maluku Utara', 1),
(20, 1, 'Nanggroe Aceh Darussalam', 1),
(21, 1, 'Nusa Tenggara Barat', 1),
(22, 1, 'Nusa Tenggara Timur', 1),
(23, 1, 'Papua', 1),
(24, 1, 'Riau', 1),
(25, 1, 'Kepulauan Riau', 1),
(26, 1, 'Sulawesi Barat', 1),
(27, 1, 'Sulawesi Tengah', 1),
(28, 1, 'Sulawesi Tenggara', 1),
(29, 1, 'Sulawesi Selatan', 1),
(30, 1, 'Sulawesi Utara', 1),
(31, 1, 'Sumatra Barat', 1),
(32, 1, 'Sumatra Selatan', 1),
(33, 1, 'Sumatra Utara', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_status_karyawan`
--

CREATE TABLE `mu_status_karyawan` (
  `id_status_karyawan` int(11) NOT NULL,
  `nama_status_karyawan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_status_karyawan`
--

INSERT INTO `mu_status_karyawan` (`id_status_karyawan`, `nama_status_karyawan`) VALUES
(1, 'Tetap'),
(2, 'Kontrak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_status_pernikahan`
--

CREATE TABLE `mu_status_pernikahan` (
  `id_status_pernikahan` int(11) NOT NULL,
  `nama_status_pernikahan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_status_pernikahan`
--

INSERT INTO `mu_status_pernikahan` (`id_status_pernikahan`, `nama_status_pernikahan`) VALUES
(1, 'Bujang'),
(2, 'Menikah'),
(3, 'Duda'),
(4, 'janda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_subkategori`
--

CREATE TABLE `mu_subkategori` (
  `id_subkategori` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_subkategori` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_subkategori`
--

INSERT INTO `mu_subkategori` (`id_subkategori`, `id_kategori`, `nama_subkategori`, `id_users`) VALUES
(1, 2, 'Dingin Banget', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_supplier`
--

CREATE TABLE `mu_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(150) NOT NULL,
  `kontak_person` varchar(150) NOT NULL,
  `alamat_1` varchar(255) NOT NULL,
  `alamat_2` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `website` varchar(150) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `chat` varchar(100) NOT NULL,
  `id_users` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_supplier`
--

INSERT INTO `mu_supplier` (`id_supplier`, `nama_supplier`, `kontak_person`, `alamat_1`, `alamat_2`, `city_id`, `state_id`, `country_id`, `telepon`, `hp`, `email`, `website`, `kode_pos`, `fax`, `chat`, `id_users`, `keterangan`) VALUES
(1, 'PT. Indofood Jaya Abadi', 'Udin Badindin', 'Jln. Hangtuah No 123 Tri Lestari', 'Jln. Sudirman Said 56 Junum', 370, 31, 1, '0751659800', '081267779988', 'indofood@gmail.com', 'http://indofood.com', 45768, '0751659811', 'indofood@yahoo.com', 1, 'Supplier ini sering telat mengantarkan barang.'),
(4, 'PT. Karimie Indonesia', 'Tommy Utama', 'Jln. Trio Macan Raya', '', 262, 22, 1, '0751659955', '081267770011', 'karimie@gmail.com', 'http://karimie.com', 34534, '0751652323', 'karimie@yahoo.com', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_tipe_diskon`
--

CREATE TABLE `mu_tipe_diskon` (
  `tipe_diskon` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_tipe_diskon`
--

INSERT INTO `mu_tipe_diskon` (`tipe_diskon`, `keterangan`) VALUES
('persen', 'Persen (%)'),
('uang', 'Nominal (Rp)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_transaksi`
--

CREATE TABLE `mu_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(15) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_type_bayar` int(11) NOT NULL,
  `id_agen_ekspedisi` int(11) NOT NULL,
  `no_resi` varchar(100) NOT NULL,
  `biaya_kirim` int(11) NOT NULL,
  `diskon_persen` int(11) NOT NULL,
  `diskon_rupiah` int(11) NOT NULL,
  `diskon_belanja` int(11) NOT NULL,
  `gratis_kirim` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('tunggu','proses','selesai') NOT NULL DEFAULT 'proses',
  `id_karyawan` int(11) NOT NULL,
  `waktu_proses` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_transaksi`
--

INSERT INTO `mu_transaksi` (`id_transaksi`, `kode_transaksi`, `id_pelanggan`, `id_type_bayar`, `id_agen_ekspedisi`, `no_resi`, `biaya_kirim`, `diskon_persen`, `diskon_rupiah`, `diskon_belanja`, `gratis_kirim`, `jumlah_bayar`, `keterangan`, `status`, `id_karyawan`, `waktu_proses`) VALUES
(1, 'TRX-0000001', 2, 1, 0, '', 0, 0, 0, 200, 0, 7000, '', 'selesai', 1, '2017-03-18 15:36:01'),
(2, 'TRX-0000002', 0, 1, 0, '', 0, 0, 0, 0, 0, 5000, '', 'selesai', 1, '2017-05-06 10:40:12'),
(3, 'TRX-0000003', 0, 1, 0, '', 0, 0, 0, 0, 0, 10000, '', 'selesai', 1, '2017-05-06 10:42:56'),
(10, 'TRX-0000010', 0, 1, 0, '', 0, 0, 0, 0, 0, 10000, '', 'tunggu', 1, '2017-05-15 14:44:05'),
(9, 'TRX-0000004', 0, 1, 0, '', 0, 0, 0, 0, 0, 5000, '', 'selesai', 1, '2017-05-15 14:42:41'),
(11, 'TRX-0000011', 0, 1, 0, '', 0, 0, 0, 0, 0, 10000, '', 'selesai', 1, '2017-05-15 14:44:46'),
(12, 'TRX-0000012', 0, 1, 0, '', 0, 0, 0, 0, 0, 8000, '', 'selesai', 1, '2017-05-15 14:51:56'),
(15, 'TRX-0000013', 0, 1, 0, '', 0, 0, 0, 0, 0, 0, '', 'proses', 1, '2017-05-15 15:01:45'),
(16, 'TRX-0000016', 0, 1, 0, '', 0, 0, 0, 0, 0, 0, '', 'proses', 2, '2020-07-15 11:25:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_transaksi_detail`
--

CREATE TABLE `mu_transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_jual` varchar(255) NOT NULL,
  `kode_satuan` varchar(10) NOT NULL,
  `jumlah_satuan` int(11) NOT NULL,
  `diskon_jual` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_transaksi_detail`
--

INSERT INTO `mu_transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `id_barang`, `jumlah_jual`, `kode_satuan`, `jumlah_satuan`, `diskon_jual`, `harga_jual`, `status`) VALUES
(109, 1, 2, '1', 'bh', 1, 0, 2400, '1'),
(108, 1, 1, '1', 'bh', 1, 200, 3500, '1'),
(110, 2, 3, '1', 'bh', 1, 0, 2400, '1'),
(111, 3, 3, '1', 'bh', 1, 0, 2400, '1'),
(112, 3, 2, '1', 'bh', 1, 0, 2400, '1'),
(118, 10, 1, '1', 'bh', 1, 200, 3500, '1'),
(117, 9, 2, '1', 'bh', 1, 0, 2400, '1'),
(119, 11, 2, '1', 'bh', 1, 0, 2400, '1'),
(120, 12, 2, '2', 'bh', 1, 0, 2400, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_transaksi_return`
--

CREATE TABLE `mu_transaksi_return` (
  `id_transaksi_return` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_type_bayar` int(11) NOT NULL,
  `bayar_return` int(11) NOT NULL,
  `ket_return` text NOT NULL,
  `status` enum('proses','selesai') NOT NULL DEFAULT 'proses',
  `id_karyawan` int(11) NOT NULL,
  `waktu_return` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_transaksi_return_detail`
--

CREATE TABLE `mu_transaksi_return_detail` (
  `id_transaksi_return_detail` int(11) NOT NULL,
  `id_transaksi_return` int(11) NOT NULL,
  `id_transaksi_detail` int(11) NOT NULL,
  `jumlah_return` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_type_bayar`
--

CREATE TABLE `mu_type_bayar` (
  `id_type_bayar` int(11) NOT NULL,
  `nama_type_bayar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_type_bayar`
--

INSERT INTO `mu_type_bayar` (`id_type_bayar`, `nama_type_bayar`) VALUES
(1, 'Cash (Tunai)'),
(2, 'Transfer'),
(3, 'Cheque (Cek)'),
(4, 'Debet (Kartu Debit)'),
(5, 'Card (Kartu Kredit)'),
(6, 'Credit (Hutang/Kredit)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mu_type_pelanggan`
--

CREATE TABLE `mu_type_pelanggan` (
  `id_type_pelanggan` int(11) NOT NULL,
  `type_pelanggan` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mu_type_pelanggan`
--

INSERT INTO `mu_type_pelanggan` (`id_type_pelanggan`, `type_pelanggan`, `id_users`) VALUES
(1, 'Perorangan', 1),
(2, 'Badan Usaha', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `mu_agama`
--
ALTER TABLE `mu_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `mu_agen_ekspedisi`
--
ALTER TABLE `mu_agen_ekspedisi`
  ADD PRIMARY KEY (`id_agen_ekspedisi`);

--
-- Indeks untuk tabel `mu_bahasa`
--
ALTER TABLE `mu_bahasa`
  ADD PRIMARY KEY (`id_bahasa`);

--
-- Indeks untuk tabel `mu_barang`
--
ALTER TABLE `mu_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `mu_barang_harga`
--
ALTER TABLE `mu_barang_harga`
  ADD PRIMARY KEY (`id_barang_harga`);

--
-- Indeks untuk tabel `mu_barang_jenis_jual`
--
ALTER TABLE `mu_barang_jenis_jual`
  ADD PRIMARY KEY (`id_barang_jenis_jual`);

--
-- Indeks untuk tabel `mu_bebanbiaya_list`
--
ALTER TABLE `mu_bebanbiaya_list`
  ADD PRIMARY KEY (`id_bebanbiaya_list`);

--
-- Indeks untuk tabel `mu_bebanbiaya_main`
--
ALTER TABLE `mu_bebanbiaya_main`
  ADD PRIMARY KEY (`id_bebanbiaya_main`);

--
-- Indeks untuk tabel `mu_bebanbiaya_sub`
--
ALTER TABLE `mu_bebanbiaya_sub`
  ADD PRIMARY KEY (`id_bebanbiaya_sub`);

--
-- Indeks untuk tabel `mu_city`
--
ALTER TABLE `mu_city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `fk_city_state` (`state_id`);

--
-- Indeks untuk tabel `mu_conf_barang`
--
ALTER TABLE `mu_conf_barang`
  ADD PRIMARY KEY (`id_conf_barang`);

--
-- Indeks untuk tabel `mu_conf_penjualan`
--
ALTER TABLE `mu_conf_penjualan`
  ADD PRIMARY KEY (`id_conf_penjualan`);

--
-- Indeks untuk tabel `mu_conf_perusahaan`
--
ALTER TABLE `mu_conf_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `mu_country`
--
ALTER TABLE `mu_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indeks untuk tabel `mu_departemen`
--
ALTER TABLE `mu_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indeks untuk tabel `mu_jabatan`
--
ALTER TABLE `mu_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `mu_jatuh_tempo`
--
ALTER TABLE `mu_jatuh_tempo`
  ADD PRIMARY KEY (`id_jatuh_tempo`);

--
-- Indeks untuk tabel `mu_jenis_kelamin`
--
ALTER TABLE `mu_jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indeks untuk tabel `mu_karyawan`
--
ALTER TABLE `mu_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `mu_kategori`
--
ALTER TABLE `mu_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `mu_kategori_pelanggan`
--
ALTER TABLE `mu_kategori_pelanggan`
  ADD PRIMARY KEY (`id_kategori_pelanggan`);

--
-- Indeks untuk tabel `mu_pelanggan`
--
ALTER TABLE `mu_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `mu_pelanggan_piutang`
--
ALTER TABLE `mu_pelanggan_piutang`
  ADD PRIMARY KEY (`id_pelanggan_piutang`);

--
-- Indeks untuk tabel `mu_pembelian`
--
ALTER TABLE `mu_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `mu_pembelian_detail`
--
ALTER TABLE `mu_pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`);

--
-- Indeks untuk tabel `mu_pembelian_return`
--
ALTER TABLE `mu_pembelian_return`
  ADD PRIMARY KEY (`id_pembelian_return`);

--
-- Indeks untuk tabel `mu_pembelian_return_detail`
--
ALTER TABLE `mu_pembelian_return_detail`
  ADD PRIMARY KEY (`id_pembelian_return_detail`);

--
-- Indeks untuk tabel `mu_pembelian_terima`
--
ALTER TABLE `mu_pembelian_terima`
  ADD PRIMARY KEY (`id_pembelian_terima`);

--
-- Indeks untuk tabel `mu_pembelian_terima_detail`
--
ALTER TABLE `mu_pembelian_terima_detail`
  ADD PRIMARY KEY (`id_pembelian_terima_detail`);

--
-- Indeks untuk tabel `mu_pendapatan_list`
--
ALTER TABLE `mu_pendapatan_list`
  ADD PRIMARY KEY (`id_pendapatan_list`);

--
-- Indeks untuk tabel `mu_pendapatan_main`
--
ALTER TABLE `mu_pendapatan_main`
  ADD PRIMARY KEY (`id_pendapatan_main`);

--
-- Indeks untuk tabel `mu_pendapatan_sub`
--
ALTER TABLE `mu_pendapatan_sub`
  ADD PRIMARY KEY (`id_pendapatan_sub`);

--
-- Indeks untuk tabel `mu_pendidikan`
--
ALTER TABLE `mu_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indeks untuk tabel `mu_penyesuaian`
--
ALTER TABLE `mu_penyesuaian`
  ADD PRIMARY KEY (`id_penyesuaian`);

--
-- Indeks untuk tabel `mu_penyesuaian_detail`
--
ALTER TABLE `mu_penyesuaian_detail`
  ADD PRIMARY KEY (`id_penyesuaian_detail`);

--
-- Indeks untuk tabel `mu_promosi`
--
ALTER TABLE `mu_promosi`
  ADD PRIMARY KEY (`id_promosi`);

--
-- Indeks untuk tabel `mu_promosi_detail`
--
ALTER TABLE `mu_promosi_detail`
  ADD PRIMARY KEY (`id_promosi_detail`);

--
-- Indeks untuk tabel `mu_promosi_terapkan`
--
ALTER TABLE `mu_promosi_terapkan`
  ADD PRIMARY KEY (`kode_terapkan`);

--
-- Indeks untuk tabel `mu_rak`
--
ALTER TABLE `mu_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `mu_satuan`
--
ALTER TABLE `mu_satuan`
  ADD PRIMARY KEY (`kode_satuan`);

--
-- Indeks untuk tabel `mu_sebab_alasan`
--
ALTER TABLE `mu_sebab_alasan`
  ADD PRIMARY KEY (`id_sebab_alasan`);

--
-- Indeks untuk tabel `mu_state`
--
ALTER TABLE `mu_state`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `fk_state_country` (`country_id`);

--
-- Indeks untuk tabel `mu_status_karyawan`
--
ALTER TABLE `mu_status_karyawan`
  ADD PRIMARY KEY (`id_status_karyawan`);

--
-- Indeks untuk tabel `mu_status_pernikahan`
--
ALTER TABLE `mu_status_pernikahan`
  ADD PRIMARY KEY (`id_status_pernikahan`);

--
-- Indeks untuk tabel `mu_subkategori`
--
ALTER TABLE `mu_subkategori`
  ADD PRIMARY KEY (`id_subkategori`);

--
-- Indeks untuk tabel `mu_supplier`
--
ALTER TABLE `mu_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `mu_tipe_diskon`
--
ALTER TABLE `mu_tipe_diskon`
  ADD PRIMARY KEY (`tipe_diskon`);

--
-- Indeks untuk tabel `mu_transaksi`
--
ALTER TABLE `mu_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `mu_transaksi_detail`
--
ALTER TABLE `mu_transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- Indeks untuk tabel `mu_transaksi_return`
--
ALTER TABLE `mu_transaksi_return`
  ADD PRIMARY KEY (`id_transaksi_return`);

--
-- Indeks untuk tabel `mu_transaksi_return_detail`
--
ALTER TABLE `mu_transaksi_return_detail`
  ADD PRIMARY KEY (`id_transaksi_return_detail`);

--
-- Indeks untuk tabel `mu_type_bayar`
--
ALTER TABLE `mu_type_bayar`
  ADD PRIMARY KEY (`id_type_bayar`);

--
-- Indeks untuk tabel `mu_type_pelanggan`
--
ALTER TABLE `mu_type_pelanggan`
  ADD PRIMARY KEY (`id_type_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mu_agama`
--
ALTER TABLE `mu_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mu_agen_ekspedisi`
--
ALTER TABLE `mu_agen_ekspedisi`
  MODIFY `id_agen_ekspedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mu_bahasa`
--
ALTER TABLE `mu_bahasa`
  MODIFY `id_bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mu_barang`
--
ALTER TABLE `mu_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mu_barang_harga`
--
ALTER TABLE `mu_barang_harga`
  MODIFY `id_barang_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `mu_barang_jenis_jual`
--
ALTER TABLE `mu_barang_jenis_jual`
  MODIFY `id_barang_jenis_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mu_bebanbiaya_list`
--
ALTER TABLE `mu_bebanbiaya_list`
  MODIFY `id_bebanbiaya_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mu_bebanbiaya_main`
--
ALTER TABLE `mu_bebanbiaya_main`
  MODIFY `id_bebanbiaya_main` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mu_bebanbiaya_sub`
--
ALTER TABLE `mu_bebanbiaya_sub`
  MODIFY `id_bebanbiaya_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mu_city`
--
ALTER TABLE `mu_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023;

--
-- AUTO_INCREMENT untuk tabel `mu_conf_barang`
--
ALTER TABLE `mu_conf_barang`
  MODIFY `id_conf_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mu_conf_penjualan`
--
ALTER TABLE `mu_conf_penjualan`
  MODIFY `id_conf_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mu_conf_perusahaan`
--
ALTER TABLE `mu_conf_perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mu_country`
--
ALTER TABLE `mu_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mu_departemen`
--
ALTER TABLE `mu_departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mu_jabatan`
--
ALTER TABLE `mu_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mu_jatuh_tempo`
--
ALTER TABLE `mu_jatuh_tempo`
  MODIFY `id_jatuh_tempo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mu_jenis_kelamin`
--
ALTER TABLE `mu_jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mu_karyawan`
--
ALTER TABLE `mu_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mu_kategori`
--
ALTER TABLE `mu_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mu_kategori_pelanggan`
--
ALTER TABLE `mu_kategori_pelanggan`
  MODIFY `id_kategori_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mu_pelanggan`
--
ALTER TABLE `mu_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mu_pelanggan_piutang`
--
ALTER TABLE `mu_pelanggan_piutang`
  MODIFY `id_pelanggan_piutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mu_pembelian`
--
ALTER TABLE `mu_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mu_pembelian_detail`
--
ALTER TABLE `mu_pembelian_detail`
  MODIFY `id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mu_pembelian_return`
--
ALTER TABLE `mu_pembelian_return`
  MODIFY `id_pembelian_return` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mu_pembelian_return_detail`
--
ALTER TABLE `mu_pembelian_return_detail`
  MODIFY `id_pembelian_return_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mu_pembelian_terima`
--
ALTER TABLE `mu_pembelian_terima`
  MODIFY `id_pembelian_terima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mu_pembelian_terima_detail`
--
ALTER TABLE `mu_pembelian_terima_detail`
  MODIFY `id_pembelian_terima_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mu_pendapatan_list`
--
ALTER TABLE `mu_pendapatan_list`
  MODIFY `id_pendapatan_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mu_pendapatan_main`
--
ALTER TABLE `mu_pendapatan_main`
  MODIFY `id_pendapatan_main` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mu_pendapatan_sub`
--
ALTER TABLE `mu_pendapatan_sub`
  MODIFY `id_pendapatan_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mu_pendidikan`
--
ALTER TABLE `mu_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mu_penyesuaian`
--
ALTER TABLE `mu_penyesuaian`
  MODIFY `id_penyesuaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mu_penyesuaian_detail`
--
ALTER TABLE `mu_penyesuaian_detail`
  MODIFY `id_penyesuaian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mu_promosi`
--
ALTER TABLE `mu_promosi`
  MODIFY `id_promosi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mu_promosi_detail`
--
ALTER TABLE `mu_promosi_detail`
  MODIFY `id_promosi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mu_rak`
--
ALTER TABLE `mu_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mu_sebab_alasan`
--
ALTER TABLE `mu_sebab_alasan`
  MODIFY `id_sebab_alasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mu_state`
--
ALTER TABLE `mu_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `mu_status_karyawan`
--
ALTER TABLE `mu_status_karyawan`
  MODIFY `id_status_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mu_status_pernikahan`
--
ALTER TABLE `mu_status_pernikahan`
  MODIFY `id_status_pernikahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mu_subkategori`
--
ALTER TABLE `mu_subkategori`
  MODIFY `id_subkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mu_supplier`
--
ALTER TABLE `mu_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mu_transaksi`
--
ALTER TABLE `mu_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `mu_transaksi_detail`
--
ALTER TABLE `mu_transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT untuk tabel `mu_transaksi_return`
--
ALTER TABLE `mu_transaksi_return`
  MODIFY `id_transaksi_return` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mu_transaksi_return_detail`
--
ALTER TABLE `mu_transaksi_return_detail`
  MODIFY `id_transaksi_return_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mu_type_bayar`
--
ALTER TABLE `mu_type_bayar`
  MODIFY `id_type_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mu_type_pelanggan`
--
ALTER TABLE `mu_type_pelanggan`
  MODIFY `id_type_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
