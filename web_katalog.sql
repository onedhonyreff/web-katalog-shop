-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 04:13 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_katalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id` bigint(20) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_produk`
--

INSERT INTO `foto_produk` (`id`, `id_produk`, `path`) VALUES
(1, 2, 'img/product/PRODUCT-61d4fed724b915.88252517.jpg'),
(2, 2, 'img/product/PRODUCT-61d4fed727db41.81794532.jpg'),
(3, 1, 'img/product/PRODUCT-61d4feefdcc147.87144627.jpg'),
(4, 1, 'img/product/PRODUCT-61d4feefe05f36.32862731.jpg'),
(5, 1, 'img/product/PRODUCT-61d4feefe0ee06.38303427.jpg'),
(6, 1, 'img/product/PRODUCT-61d4feefe17d99.52506454.jpg'),
(7, 3, 'img/product/PRODUCT-61d4fec3a2b650.96184912.jpg'),
(8, 3, 'img/product/PRODUCT-61d4fec3a6cdf9.41226805.jpg'),
(9, 4, 'img/product/PRODUCT-61d4feb28b3cb2.16098905.jpg'),
(10, 4, 'img/product/PRODUCT-61d4feb28efbf5.46748195.jpg'),
(11, 4, 'img/product/PRODUCT-61d4feb28fa0e5.61395441.jpg'),
(12, 4, 'img/product/PRODUCT-61d4feb2902502.28996958.jpg'),
(13, 4, 'img/product/PRODUCT-61d4feb290c832.14976950.jpg'),
(14, 4, 'img/product/PRODUCT-61d4feb2917495.71497413.jpg'),
(15, 5, 'img/product/PRODUCT-61d4fe66be2a92.53869924.jpg'),
(16, 5, 'img/product/PRODUCT-61d4fe66bfdf38.15148317.jpg'),
(17, 5, 'img/product/PRODUCT-61d4fe66c14ee4.07926368.jpg'),
(60, 31, 'img/product/PRODUCT-61d5004924efa0.43854793.jpg'),
(61, 31, 'img/product/PRODUCT-61d50049255e75.77155620.jpg'),
(62, 32, 'img/product/PRODUCT-61d501b0beefe7.59349665.jpg'),
(63, 32, 'img/product/PRODUCT-61d501b0bf85c7.88002369.jpg'),
(64, 32, 'img/product/PRODUCT-61d501b0c00747.05294008.jpg'),
(65, 32, 'img/product/PRODUCT-61d501b0c06b19.32832102.jpg'),
(66, 33, 'img/product/PRODUCT-61d5026dec4e19.80806724.jpg'),
(67, 33, 'img/product/PRODUCT-61d5026ded02e6.66719800.jpg'),
(68, 33, 'img/product/PRODUCT-61d5026ded8bc2.85356066.jpg'),
(69, 33, 'img/product/PRODUCT-61d5026dee18d3.54191325.jpg'),
(70, 33, 'img/product/PRODUCT-61d5026deeb2e0.24740823.jpg'),
(71, 33, 'img/product/PRODUCT-61d5026def2d96.99810086.jpg'),
(72, 34, 'img/product/PRODUCT-61d503bb1ff427.81905538.jpg'),
(73, 34, 'img/product/PRODUCT-61d503bb208578.68883276.jpg'),
(74, 34, 'img/product/PRODUCT-61d503bb210451.20359019.jpg'),
(75, 35, 'img/product/PRODUCT-61d5045bd20d53.85257032.jpg'),
(76, 36, 'img/product/PRODUCT-61d504fc8ccfd2.49174991.jpg'),
(77, 36, 'img/product/PRODUCT-61d504fc8d3787.22746269.jpg'),
(78, 37, 'img/product/PRODUCT-61d505e47b6274.51268411.jpg'),
(79, 37, 'img/product/PRODUCT-61d505e47bf5b0.07578200.jpg'),
(80, 37, 'img/product/PRODUCT-61d505e47c7e52.89012173.jpg'),
(81, 37, 'img/product/PRODUCT-61d505e47cfcc8.48738884.jpg'),
(82, 37, 'img/product/PRODUCT-61d505e47d87e6.69345571.jpg'),
(83, 38, 'img/product/PRODUCT-61d506be28ffd5.06450522.jpg'),
(84, 38, 'img/product/PRODUCT-61d506be2975f1.79112149.jpg'),
(85, 38, 'img/product/PRODUCT-61d506be29e955.63411361.jpg'),
(86, 39, 'img/product/PRODUCT-61d507db979861.62249375.jpg'),
(87, 39, 'img/product/PRODUCT-61d507db9832b7.82004785.jpg'),
(88, 39, 'img/product/PRODUCT-61d507db98a4d7.79616016.jpg'),
(89, 39, 'img/product/PRODUCT-61d507db9901e0.99905466.jpg'),
(90, 39, 'img/product/PRODUCT-61d507db996056.64170194.jpg'),
(91, 40, 'img/product/PRODUCT-61d508c2e1a0c8.27838415.jpg'),
(92, 40, 'img/product/PRODUCT-61d508c2e25390.46803250.jpg'),
(93, 40, 'img/product/PRODUCT-61d508c2e2d508.88623790.jpg'),
(94, 40, 'img/product/PRODUCT-61d508c2e34c97.41487314.jpg'),
(95, 40, 'img/product/PRODUCT-61d508c2e3b246.58918070.jpg'),
(96, 41, 'img/product/PRODUCT-61d50b02d383d5.40390841.jpg'),
(97, 41, 'img/product/PRODUCT-61d50b02d40353.67752366.jpg'),
(98, 41, 'img/product/PRODUCT-61d50b02d46e98.53160671.jpg'),
(99, 42, 'img/product/PRODUCT-61d50c06015778.37072384.jpg'),
(100, 42, 'img/product/PRODUCT-61d50c0601c8c7.09498822.jpg'),
(101, 42, 'img/product/PRODUCT-61d50c060244f5.16081167.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id` int(11) NOT NULL,
  `nama_katalog` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id`, `nama_katalog`, `deskripsi`, `gambar`) VALUES
(1, 'Kemeja', 'Produk Kemeja', 'img/catalog/KATEGORI-Kemeja-61d2c6e89ff764.74296658.png'),
(2, 'Kaos', 'Produk kaos', 'img/catalog/KATEGORI-Kaos-61d2c6dfb71408.41590653.png'),
(3, 'Celana', 'Produk celana', 'img/catalog/KATEGORI-Celana-61d2c6d86c2f87.75636572.png'),
(4, 'Sarung', 'Produk sarung', 'img/catalog/KATEGORI-Sarung-61d2c6cc33bc17.32899512.png'),
(5, 'Gamis', 'Produk gamis', 'img/catalog/KATEGORI-Gamis-61d2c6c57bdb23.15089534.png'),
(6, 'Rok', 'Produk rok', 'img/catalog/KATEGORI-Rok-61d2c6423dfae4.10806217.png'),
(7, 'Kain', 'Produk kain', 'img/catalog/KATEGORI-Kain-61d2c62a6d4350.42896753.png');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_katalog` int(11) DEFAULT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_katalog`, `nama_produk`, `deskripsi`, `harga`, `stok`) VALUES
(1, 1, 'Kemeja Batik Pria Arjuna Hitam', 'Kemeja Lengan Panjang Kombinasi Batik\r\n\r\nBahan : Katun Toyobo\r\n\r\nGambaran Size :\r\nTinggi 180cm BB 74kg Pakai L\r\nTinggi 176cm BB 74kg Pakai L\r\nTinggi 170cm BB 66kg Pakai M\r\nTinggi 170cm BB 56kg Pakai S\r\nTinggi 170cm BB 77kg Pakai XL\r\n\r\n*size tergantung tinggi & bb (tidak bisa dilihat dari tinggi saja atau berat badan saja)\r\n\r\n*ini hanya prediksi atau gambaran size dari data penjualan pembeli yg masuk\r\n\r\nMengenai Ukuran : Selisih 1cm mungkin terjadi dikarenakan proses pengembangan dan produksi\r\n\r\nMengenai Warna: Warna sesungguhnya mungkin dapat berbeda. Hal ini dikarenakan setiap layar memiliki kemampuan yang berbeda-beda untuk menampilkan warna, kami tidak dapat menjamin bahwa warna yang Anda lihat adalah warna akurat dari produk tersebut', 122000, 50),
(2, 1, 'Kemeja Batik Lengan Pendek Model A537', 'Bahan : Katun\r\n\r\nPanjang Lengan : Pendek\r\n\r\nSize cowok lebar dada\r\nM : 52cm-panjang baju 69cm\r\nL : 56cm-panjang baju 70cm\r\nXL : 58cm-panjang baju 71cm', 45000, 80),
(3, 1, 'Kemeja Batik Lengan Pendek Model A532', 'Bahan : Katun\r\n\r\nPanjang Lengan : Pendek\r\n\r\nSize cowok lebar dada\r\nM : 52cm-panjang baju 69cm\r\nL : 56cm-panjang baju 70cm\r\nXL : 58cm-panjang baju 71cm', 45000, 75),
(4, 1, 'BATIK PRIA BORDIR SOGAN HRB026 BATIKAF NOTOARTO BATIK IPNU-IPPNU HEM PRIA Bel', 'Matt 100% full katun halus,tidak mudah kusut,jahitan rapi\r\n\r\nBahan adem & nyaman di pakai cocok untuk berbagai acara & ready stok seragam\r\n\r\nSize\r\nM:lingkar dada102cm\r\nL:lingkar dada 106cm\r\nXl:lingkar dada 110cm', 60000, 48),
(5, 2, 'Kaos Oblong Couple Kembaran Kekinian Solo Dewasa Jumbo Unisex Batik Sekar Kecubung', 'Dengan bahan Cotton 24s Kaos ini tetap nyaman walau digunakan seharian, Adem tidak panas, tidak mudah melar, menyerap keringat, Jahitan kuat dan memiliki desain yang unik serta sablon awet juga presisi Proses pengemasan dan pengiriman semua produk kami dilakukan dengan teliti untuk memastikan motif kaos yang Anda pesan sesuai dengan pilihan Anda.\r\n\r\nTentu saja semua produk kami sudah lolos QC\r\n\r\nHarga yang tercantum adalah harga satuan ya kak.....', 65000, 52),
(31, 1, 'BAJU BATIK LENGAN PANJANG KAIN HALUS MURAH LAPIS FURING', 'FOTO PRODUK ASLI 100% !\r\n\r\nProduk yg kami jual jaminan Kualitas terbaik, nyaman dipakai, Bahan tebal, Tidak terawang, adhem di pakai karena sudah lapis furing.', 87000, 10),
(32, 1, 'Kemeja Batik Pria PPBTK07 Modern Lengan Panjang Casual Modis Trendy Masa Kini', 'Matt 100% full katun halus,tidak mudah kusut,jahitan rapi\r\nBahan adem & nyaman di pakai cocok untuk berbagai acara & ready stok seragam\r\n\r\nSize\r\nM:lingkar dada102cm\r\nL:lingkar dada 106cm\r\nXl:lingkar dada 110cm', 50000, 24),
(33, 1, 'KEMEJA BATIK VINO KOMBINASI BATIK', 'Kemeja slimfit, matt toyobo kombi batik premium, all size fit to L, LD 102 CM PB 72 cm. sleting VARIASI', 52800, 18),
(34, 1, 'Long Aden Shirt / Kemeja Batik Lengan Panjang Pria', 'Kemeja Pria lengan panjang dengan corak Peacock yang megah dan keren. Cocok untuk menemani berbagai macam kegiatan ataupun acara anda.\r\n\r\n- Motif : Maja Series\r\n\r\n- Bahan : Katun / Cotton Stretch (Estimasi melar lingkar dada max +-12cm)\r\n\r\n\r\n- Ukuran :\r\n\r\n* Standard\r\nLingkar Dada : 110 cm\r\nPanjang Baju : 70 cm\r\nPanjang Tangan : 59 cm\r\nLingkar Ketiak : 46 cm\r\n\r\n* Jumbo\r\nLingkar Dada : 116 cm\r\nPanjang Baju : 71 cm\r\nPanjang Tangan : 62 cm\r\nLingkar Ketiak : 48 cm\r\n\r\nNotes :\r\n1. Toleransi Error Pengukuran ±1-4 cm\r\n2. Model memakai Size Standard\r\n3. Size Model : Tinggi 185cm, Lingkar Dada 96cm, Berat Badan 78kg', 130500, 6),
(35, 1, 'KEMEJA BATIK PRIA LENGAN PANJANG HRB026', 'Bahan : katun adem\r\n\r\nSize : M L XL\r\n\r\nM : lebar dada 52cm, lebar bahu 49cm, panjang baju 70cm\r\nL : lebar dada 54cm, lebar bahu 50cm, panjang baju 71cm\r\nXL : lebar dada 56cm, lebar bahu 51cm, panjang baju 73', 63000, 24),
(36, 2, 'Kaos batik full print motif burung merak || kaos etnik ||', 'Kaos batik pekalongan full print motif merak bahan kaos catton semi jenis cardet texsture soft yang nyaman n adem untuk dipakai sehari-hari n tentunya murah\r\n\r\nReady M L XL\r\nSize M: Lebar 48cm (LD 96cm) Panjang 68cm\r\nSize L: Lebar 51cm (LD 102cm) Panjang 72cm\r\nSize Xl: Lebar 54cm (LD 108cm) Panjang 74cm\r\n\r\n*Toleransi kesalahan 1 sampai 2cm', 32000, 48),
(37, 3, 'Celana Batik Boim Panjang Dewasa Khas Betawi', 'Bahan : Katun\r\nMotif : Batik\r\nCelana batik pekalongan Model celana dewasa\r\n\r\nUkuran = AllSize\r\ncelana Panjang =-+ 95 cm\r\nLebar pinggang = -+55 cm\r\n\r\n(tali serut) Motiv batik kami kirim acak sesuai stok terbaru ya.. (cuma bisa pilih warna aja)\r\nPilihan warna = hitam putih dan kuning coklat\r\nSiap melayani pembelian dalam jumlah banyak..!', 34000, 100),
(38, 3, 'Celana Batik Soft Pastel Bawahan Celana Sogan Seragam Kantor', 'Kulot Layer Sinaran Celana Batik Soft Pastel Bawahan Celana Sogan Seragam Kantor Kerja Cantik.\r\n\r\nSize Wanita: All size fit to XL LP 100 cm, Panjang 100 cm', 132000, 12),
(39, 5, 'GAMIS BATIK JUMBO MANGGAR PADI SEKAR CANTIK KUBIS KIPAS DAUN KUPU NADINE GENDIS', '~bahan katun prima\r\n~serat rapet tidak nerawang\r\n~halus, adem dan nyaman saat dipakai\r\n~tersedia ukuran standar dan jumbo', 72000, 42),
(40, 5, 'Gamis Batik Kombinasi Modern Murah Katun Halus Kombinasi Truntum', '- All size Standar Lingkar dada 110 cm panjang baju 138 cm Berat badan 60 sampai 70 muat.\r\n- Jumbo lingkar dada 120cm panjang baju 140cm berat badan 70 sampai 85 muat.\r\n\r\n(Tali samping kanan kiri, Resleting depan/ Busui.)', 112500, 24),
(41, 6, 'Rok Batik Alusan Asli Solo', 'Bahan : Katun Grounding Sragenan, bagus dan berkualitas.\r\nLP: 90-95 cm (melar) Lingkar\r\nBawah: 200 cm Panjang: 97-100 cm\r\nAda Saku', 150000, 15),
(42, 6, 'Rok Lilit Batik Panjang Payung', 'Batik asli pekalongan,Bahan dari katun primis halus kualitas terjamin dipakai nyaman adem dan tdk menerawang, Cocok di pakai kantoran,kondangan maupun jln2 ke mall..\r\n\r\nAll size muat sampai XXL\r\n\r\nRok Lilit panjang 87cm\r\n\r\nModel lilit pinggang', 96000, 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_katalog` (`id_katalog`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD CONSTRAINT `memiliki_foto` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`id_katalog`) REFERENCES `katalog` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
