-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 10, 2024 at 03:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `percetakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_token`
--

CREATE TABLE `pelanggan_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan_token`
--

INSERT INTO `pelanggan_token` (`id`, `email`, `token`, `date_created`) VALUES
(13, 'hikmahheikal@gmail.com', 'SLRcVQnn5mAHgqL9VcHUJLv+0Q7jSvvHunyco2XsvK4=', 1717827616);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_kategori`, `harga`, `deskripsi`, `gambar`, `berat`) VALUES
(11, 'Banner', 12, 18000, 'Banner biasa ukuran 3 m x 2 m `', 'banner1.jpg', 2300),
(12, 'Brosur A4', 9, 125000, 'Brosur dengan ukuran kertas A4\r\nmacam 1/3 dengan 2 sisi\r\nharga per 1000 lembar (2 rim)', 'brosur_5_prev_ui.png', 9000),
(13, 'Brosur Folio ', 9, 150000, 'Brosur F4 (Folio)\r\nDicetak 2 sisi (Double Sided)\r\nHarga per 1000 lembar', 'brosur1.jpg', 9000),
(14, 'Kalender Dinding', 14, 12000, 'Kalender gantung tahunan\r\n', 'pixlr-bg-result(4).png', 200),
(15, 'Kalender Duduk', 14, 40000, 'Kalender Duduk\r\nHarga per biji', 'kalender_duduk_3.jpg', 310),
(16, 'Buku', 9, 500, 'Untuk pencetakan custom dapat menghubungi admin :\r\n1. pilih jenis kertas (hvs ato book paper)\r\n2. pilih metode cetak (bolak balik ato 1 muka) dan\r\n3. pilih ukuran kertasnya\r\nNB : Harga per halaman\r\n\r\n\r\n', 'pixlr-bg-result(3).png', 250),
(17, 'Id Card', 12, 14750, 'Id Card berbahan plastik\r\nukuran 5,2 cm x 8 cm\r\nHarga per biji\r\n', 'pixlr-bg-result(2).png', 40),
(18, 'Map Plastik', 10, 20000, '- Map Plastik\r\n- Ukuran F4 (Folio)\r\n- Untuk sampul Ijazah / Rapot\r\n\r\nNB : Desain dan warna map menghubungi Admin', 'pixlr-bg-result1.png', 200),
(19, 'Map Kertas', 10, 5000, 'Map Kertas Tebal\r\nUkuran F4 (Folio)\r\nHarga Per Biji', 'pixlr-bg-result(1)1.png', 10),
(20, 'Kotak Kemasan', 9, 630, 'Kotak Kemasan\r\nKertas duplex 250 gram\r\nUkuran 6,3 cm x 6,3 cm\r\nTebal = 1 cm\r\nHarga per biji', 'kotak_kemasan_2.jpg', 18),
(21, 'Nota Rangkep 3', 9, 52925, 'Nota Rangkep 3\r\nUkuran F4 (Folio)\r\nNB : Harga per bundle, 1 bundle isi 50', 'nota1.jpg', 210),
(22, 'Buku Yasin', 9, 7800, 'Buku Yasin\r\nCover AP (Art Paper) 260\r\nIsi 128 halaman\r\nHarga per buku', 'buku_yasin.jpg', 150);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gambar`
--

INSERT INTO `tbl_gambar` (`id_gambar`, `id_barang`, `ket`, `gambar`) VALUES
(10, 3, 'Plastik 2', 'plastik_beras_sablon_2.jpg'),
(11, 11, 'Banner biasa', 'banner_2.jpg'),
(12, 12, 'Brosur A4', 'brosur_6.jpg'),
(13, 12, 'Brosur A4 (2)', 'brosur_4.jpg'),
(14, 13, 'Brosur F4', 'brosur_2.jpg'),
(15, 13, 'Brosur F4 (2)', 'brosur_3.jpg'),
(16, 14, 'Kalender Gantung', 'kalender_gantung_2.jpg'),
(17, 15, 'Kalender Duduk', 'kalender_duduk_4.jpg'),
(18, 15, 'Kalender Duduk (2)', 'kalender_duduk.jpg'),
(19, 19, 'Map kertas ', 'map_4.jpg'),
(20, 19, 'Map kertas (2)', 'map_8.jpg'),
(21, 18, 'Map plastik', 'map_6.jpg'),
(22, 18, 'Map plastik (2)', 'map_7.jpg'),
(23, 17, 'Id card', 'id_card_2.jpg'),
(24, 16, 'Buku', 'buku.jpg'),
(25, 16, 'Buku (2)', 'buku_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(9, 'Kertas'),
(10, 'Map'),
(11, 'Sablon'),
(12, 'Printing'),
(13, 'Undangan'),
(14, 'Kategori');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_hp` varchar(30) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `no_hp`, `is_active`, `date_created`, `image`) VALUES
(1, 'Agna Rizky', 'putraodin21@gmail.com', 'agnarizky', '+6285334575065', 1, 0, 'agna.jpg'),
(5, 'Dian', 'agnarizky88@gmail.com', 'agnarizky1', '+6285755346418', 1, 1651170603, 'default.png'),
(10, 'Haica', 'ivalativa82@gmail.com', 'ivaagna', '+6285967209564', 1, 1653998968, 'default.png'),
(11, 'Mas ik', 'agnarizky69@gmail.com', 'agnarizky', '+621259557129', 1, 1654007197, 'default.png'),
(14, 'Admin', 'paminggirprinting@gmail.com', '1234', '+6285967209564', 1, 1655038693, 'IMG_20220911_132214.jpg'),
(15, 'Agna', 'putraodin2@gmail.com', '12345', '+6281259557129', 1, 1655698806, 'default.png'),
(16, 'Heikal', 'hikmahheikal@gmail.com', 'heikaljojo', '+6282215168259', 1, 1717827616, 'profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'Mandiri', '1430-0244-20877', 'Agna Rizky Putra Anggara'),
(2, 'BRI', '7525-0100-4567-500', 'Siti Latifatul Munawaroh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rinci_transaksi`
--

CREATE TABLE `tbl_rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(100) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rinci_transaksi`
--

INSERT INTO `tbl_rinci_transaksi` (`id_rinci`, `no_order`, `id_barang`, `qty`) VALUES
(2, '20220328OR8FMTB7', 6, 1),
(3, '20220328OR8FMTB7', 4, 1),
(4, '20220328OR8FMTB7', 7, 1),
(5, '20220411HBYVUFOF', 10, 1),
(6, '20220411HBYVUFOF', 9, 1),
(7, '20220411HBYVUFOF', 8, 1),
(8, '20220413LQHGFSBW', 9, 1),
(9, '20220413LQHGFSBW', 8, 1),
(10, '20220414JJAMLHFQ', 3, 1),
(11, '20220414JJAMLHFQ', 6, 1),
(12, '20220414JJAMLHFQ', 7, 1),
(13, '20220414OHCUMY5V', 6, 2),
(14, '20220414OHCUMY5V', 10, 1),
(15, '20220414OHCUMY5V', 8, 3),
(16, '20220523DJXILBIH', 7, 1),
(17, '20220523DJXILBIH', 6, 1),
(18, '20220523DJXILBIH', 8, 3),
(19, '20220523JKPY1KP4', 9, 1),
(20, '20220523V5EW4PGP', 8, 1),
(21, '20220524ZFKEODB0', 8, 1),
(22, '20220524ZFKEODB0', 10, 1),
(23, '20220528KBBXSJAS', 10, 1),
(24, '20220529D2UGMON6', 9, 1),
(25, '2022053162GCEHQN', 8, 1),
(26, '2022053162GCEHQN', 9, 1),
(27, '20220531FDCBUWWL', 8, 1),
(28, '20220606WBFZZLQW', 15, 1),
(29, '20220607X5PMLFC6', 21, 1),
(30, '20220612ARNICSHK', 20, 10),
(31, '20220613SZ5GGQV0', 21, 1),
(32, '202206202JLDD68G', 21, 5),
(33, '202206202JLDD68G', 20, 1),
(34, '20240607PWFVEBM2', 21, 1),
(35, '20240608EOU2RBJ1', 22, 2),
(36, '20240608SX08PLDG', 22, 1),
(37, '20240610MTADSWQ1', 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telepon`) VALUES
(1, 'Toko Paminggir Printing', 160, 'Jalan Cimanuk No 252, Paminggir, Garut Kota, Paminggir, Kec. Garut Kota, Kabupaten Garut, Jawa Barat 44118', '082215168259');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(100) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(255) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(100) DEFAULT NULL,
  `ekspedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `atas_nama` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  `no_hp` varchar(30) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `no_resi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pelanggan`, `no_order`, `tgl_order`, `nama_penerima`, `provinsi`, `kota`, `alamat`, `kode_pos`, `ekspedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `no_hp`, `status_order`, `no_resi`) VALUES
(3, 1, '20220328OR8FMTB7', '2022-03-28', 'Mas Ok', '11', 'Banyuwangi', 'Genteng', '68465', 'jne', 'REG', '2-3 Hari', 6000, 1300, 17500, 23500, 1, 'IMG_20190704_202954.jpg', 'Mas ik', 'BRI', '1123-4568-12390', '+6285334575065', 1, NULL),
(4, 2, '20220411HBYVUFOF', '2022-04-11', 'Siti Latifatul', '11', 'Malang', 'Malang Lawang', '64123', 'jne', 'OKE', '2-3 Hari', 14000, 2100, 182500, 196500, 0, NULL, NULL, NULL, NULL, '+6285967209564', 0, NULL),
(5, 2, '20220413LQHGFSBW', '2022-04-13', 'Siti Latifatul', '11', 'Jember', 'Jember Tumpeng', '68123', 'tiki', 'ECO', '4 Hari', 5000, 1100, 82500, 87500, 1, 'agna.jpg', 'Siti Latifatul', 'Mandiri', '1234-5678-90123', '+6285967209564', 1, NULL),
(6, 1, '20220414JJAMLHFQ', '2022-04-14', 'Agna', '11', 'Surabaya', 'Sidoarjo', '68721', 'pos', 'Paket Kilat Khusus', '2 HARI Hari', 15200, 1300, 14000, 29200, 1, 'IMG_20190704_203623.jpg', 'Mas ik', 'BRI', '1123-4568-12390', '+6285334575065', 3, 'BAC093193190'),
(7, 1, '20220414OHCUMY5V', '2022-04-14', 'Mas ik', '11', 'Bondowoso', 'Bondowoso', '68122', 'jne', 'REG', '2-3 Hari', 36000, 6000, 335000, 371000, 1, 'IMG_20190704_202216.jpg', 'Agna Rizky', 'BRI', '1239-1234-5543', '+6285334575065', 3, 'JBR081239957'),
(10, 7, '20220523V5EW4PGP', '2022-05-23', 'Asa Brilian', '2', 'Bangka', 'Bangka Belitung', '12321', 'jne', 'OKE', '3-6 Hari', 45000, 1000, 75000, 120000, 0, NULL, NULL, NULL, NULL, '+6288803878843', 0, NULL),
(11, 8, '20220524ZFKEODB0', '2022-05-24', 'agna', '1', 'Badung', 'bali', '321123', 'jne', 'REG', '2-3 Hari', 36000, 2000, 175000, 211000, 1, 'admin.png', 'agna', 'BRi', '21312312313', '+6285337860853', 1, NULL),
(12, 7, '20220528KBBXSJAS', '2022-05-28', 'Agna', '1', 'Badung', 'Badung', '68122', 'jne', 'OKE', '3-6 Hari', 16000, 1000, 100000, 116000, 1, 'Capture.PNG', 'Asa', 'Mandiri', '111111111111', '+6288803878843', 1, NULL),
(13, 7, '20220529D2UGMON6', '2022-05-29', 'Asa', '8', 'Muaro Jambi', 'Jambi', '68122', 'jne', 'OKE', '3-6 Hari', 43000, 100, 7500, 50500, 1, 'Capture1.PNG', 'Asa', 'Mandiri', '222222222', '+6288803878843', 1, NULL),
(14, 1, '2022053162GCEHQN', '2022-05-31', 'Agna', '11', 'Jember', 'Jember', '68122', 'pos', 'Pos Instan Barang', '0 HARI Hari', 12000, 1100, 82500, 94500, 1, 'IMG_20201211_225522_507.jpg', 'Agna', 'Mandiri', '1111111111111111', '+6285334575065', 1, NULL),
(15, 10, '20220531FDCBUWWL', '2022-05-31', 'Haica', '11', 'Jember', 'Jalan Basuki Rahmat Gang 7 Tumpengsari, Tegal Besar, Jember', '68132', 'jne', 'CTC', '1-2 Hari', 6000, 1000, 75000, 81000, 1, 'IMG_20210215_190215_732.jpg', 'Bebek', 'BRI', '1111111111111111', '+6285967209564', 1, NULL),
(16, 11, '20220606WBFZZLQW', '2022-06-06', 'Agna', '11', 'Jember', 'Jember ', '68122', 'jne', 'CTC', '1-2 Hari', 12000, 2000, 100000, 112000, 1, 'TF_DANA.jpeg', 'Agna', 'Dana', '0', '+621259557129', 1, NULL),
(17, 11, '20220607X5PMLFC6', '2022-06-07', 'Agna', '11', 'Jember', 'Jember', '68121', 'tiki', 'ECO', '4 Hari', 5000, 210, 52925, 57925, 0, NULL, NULL, NULL, NULL, '+621259557129', 0, NULL),
(18, 14, '20220612ARNICSHK', '2022-06-12', 'Aca', '11', 'Malang', 'Kepanjen', '65163', 'jne', 'REG', '1-2 Hari', 8000, 180, 6300, 14300, 1, 'WhatsApp_Image_2022-06-12_at_20_21_02.jpeg', 'Siti Latifatul Munawaroh', 'Dana', '0', '+6285967209564', 3, 'ABK2211356'),
(19, 10, '20220613SZ5GGQV0', '2022-06-13', 'Agna', '11', 'Jember', 'Jember', '68122', 'jne', 'CTC', '1-2 Hari', 6000, 210, 52925, 58925, 0, NULL, NULL, NULL, NULL, '+6285967209564', 0, NULL),
(20, 15, '202206202JLDD68G', '2022-06-20', 'Agna', '11', 'Jember', 'Kebonsari', '68122', 'jne', 'CTC', '1-2 Hari', 6000, 1068, 265255, 271255, 1, '231287506p.jpg', 'Agna Rizky', 'Dana', '12345678', '+6281259557129', 3, 'ABK2211356'),
(22, 16, '20240608EOU2RBJ1', '2024-06-08', 'Heikal', '9', 'Garut', 'Jl. Bratayuda No.54, Regol, Kec. Garut Kota, Kabupaten Garut, Jawa Barat 44114', '44114', 'jne', 'OKE', '5-6 Hari', 21000, 300, 15600, 36600, 1, '7a2a54914b7408dbceb49246b0de929f.jpg', 'Heikal', 'Dana', '13123123123123', '+6282215168259', 2, '342434234'),
(23, 16, '20240608SX08PLDG', '2024-06-08', 'Heikal', '2', 'Bangka', 'Jl. Bratayuda No.54, Regol, Kec. Garut Kota, Kabupaten Garut, Jawa Barat 44114', '44114', 'jne', 'OKE', '3-6 Hari', 51000, 150, 7800, 58800, 1, 'bukti_transfer.jpg', 'Heikal', 'Dana', '12323132', '+6282215168259', 2, '344423432'),
(24, 16, '20240610MTADSWQ1', '2024-06-10', 'Heikal', '3', 'Lebak', 'Jl. Bratayuda No.54, Regol, Kec. Garut Kota, Kabupaten Garut, Jawa Barat 44114', '44114', 'jne', 'REG', '2-3 Hari', 25000, 210, 52925, 77925, 0, NULL, NULL, NULL, NULL, '+6282215168259', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(1, 'Admin', 'admin', 'admin', 1),
(3, 'Dian', 'user', 'user', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `id_pelanggan`, `id_barang`) VALUES
(1, 10, 22),
(2, 10, 22),
(3, 10, 21),
(4, 16, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan_token`
--
ALTER TABLE `pelanggan_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan_token`
--
ALTER TABLE `pelanggan_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
