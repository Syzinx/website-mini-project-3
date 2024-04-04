-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 04:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(2) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `cover_buku` varchar(20) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penulis_buku` varchar(30) NOT NULL,
  `penerbit_buku` varchar(25) NOT NULL,
  `tanggal_terbit` varchar(15) NOT NULL,
  `genre_buku` varchar(24) NOT NULL,
  `deskripsi_buku` varchar(1000) NOT NULL,
  `file_buku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `cover_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tanggal_terbit`, `genre_buku`, `deskripsi_buku`, `file_buku`) VALUES
(1, 10, 'dunia-sophie.jpg', 'Dunia Sophie', 'Jostein Gaarder', 'Penerbit Mizan', '3 Jun 2020', 'Novel/Fiksi filosofis', 'Sophie merupakan seorang pelajar sekolah menegah yang berusia 14 tahun. Namun suatu hari setelah pulang sekolah, ia mendapatkan sebuah surat misterius yang hanya berisikan satu pertanyaan \"Siapa Kamu?\". Hal ini tentunya membuat Sophie heran, pada hari yang sama dia juga mendapatkan surat lain yang bertanya\"Dari manakah datangnya dunia?\". Hal ini tentunya membuat ia tersentak dari rutinitas hidup sehari-hari, surat itu selalu membuat Sophie mempertanyakan soal-soal mendasar yang tak pernah dipikirkannya selama ini.', 'duniasophie.pdf'),
(2, 20, 'filosofi-teras.jpg', 'Filosofi Teras', 'Henry Manampiring', 'Kompas Penerbit Buku', '18 Des 2018', 'Nonfiksi', 'Lebih dari 2.000 tahun lalu, sebuah mazhab filsafat menemukan akar masalah dan juga solusi dari banyak emosi negatif. Stoisisme, atau Filosofi Teras, adalah filsafat Yunani-Romawi kuno yang bisa membantu kita mengatasi emosi negatif dan menghasilkan mental yang tangguh dalam menghadapi naik-turunnya kehidupan. Jauh dari kesan filsafat sebagai topik berat dan mengawang-awang, Filosofi Teras justru bersifat praktis dan relevan dengan kehidupan Generasi Milenial dan Gen-Z masa kini.', 'filosofiteras.pdf'),
(3, 40, 'harry-potter.jpg', 'Harry Potter dan Tawanan Azkaban', 'J.K. Rowling', 'Gramedia Pustaka Utama', '4 Apr 2017', 'Novel/Fiksi fantasi', 'Novel Harry Potter dan Tawanan Azkaban merupakan terjemahan Bahasa Indonesia dari novel Harry Potter and The Prisoner of Azkaban, novel ketiga seri Harry Potter yang ditulis oleh J.K. Rowling. Novel ini mengisahkan tentang Harry yang berusaha menghindari Sirius Black, penyihir jahat yang baru kabur dari penjara Azkaban.\r\n\r\nSirius Black yang kabur dari penjara Azkaban ternyata mengincar Harry dan membuat Kementrian Sihir mengirimkan Dementor dari Azkaban untuk berpatroli di Hogwarts. Saat tahun ketiga Harry bersekolah, ia mendapatkan ancaman maut dan akhirnya ia mengetahui fakta baru tentang masa lalunya. Ia juga bertemu dan bertatap muka dengan pelayan Pangeran Kegelapan yang paling setia.', 'harrypotter.pdf'),
(4, 50, 'hunger-games.jpg', 'The Hunger Games', 'Suzanne Collins', 'Gramedia Pustaka Utama', '7 Apr 2013', 'Novel/Fiksi ilmiah', '\"Api pemberontakan sudah tersulut. Dan Capitol ingin membalas dendam\r\n\r\nKatniss Everdeen berhasil keluar sebagai pemenang Hunger Games bersama Peeta Mellark. Tapi kemenangan itu menyulut kemarahan Capitol. Kemenangan Katniss ternyata membangkitkan semangat pemberontakan di beberapa distrik untuk menentang kekuasaan Presiden Snow yang kejam.\r\n\r\nPresiden Snow mengancam Katniss untuk meredakan kegelisahan penduduk distrik dalam Tur Kemenangan-nya. Satu-satunya cara untuk meredakan kegelisahan penduduk adalah membuktikan bahwa dia dan Peeta saling mencintai tanpa ada keraguan sedikit pun. Jika gagal, keluarga dan semua orang yang disayangi Katniss menjadi taruhannya....', 'thehungergames.pdf'),
(5, 30, 'python.jpg', 'Fundamental Of Python For Machine Learning', 'Teguh Wahyono', 'Gava Media', '14 Nov 2018', 'Nonfiksi', 'Artificial Intelligence (AI) adalah kecerdasan yang ditunjukkan oleh mesin, sebagai lawan dari kecerdasan alami yang ditampilkan oleh hewan dan manusia.\r\nArtificial Intelligence (AI) adalah kecerdasan yang ditunjukkan oleh mesin, sebagai lawan dari kecerdasan alami yang ditampilkan oleh hewan dan manusia. Artificial intelligence (AI) dan machine learning saat ini kembali memasuki fase booming setelah beberapa dekade mengalami pasang surut. Kecerdasan Buatan kembali digandrungi, dimana penerapannya dilakukan secara masive pada aplikasi-aplikasi bisnis dan social media jaman now seperti Facebook, Twitter, Google, Amazon, dan bahkan berbagai aplikasi besar dari Indonesia seperti Go-jek, Tokopedia, dan sebagainya. Dari sisi Bahasa Pemrograman, Python menjadi salah satu pilihan terbaik untuk mengimplementasikan machine learning, mengingat kelengkapan library yang dibutuhkan untuk metode tersebut. ', 'python.pdf'),
(6, 60, 'kapal.jpg', 'Tenggelamnya Kapal van der Wijck', 'Abdul Malik Karim Amrullah', 'Gema Insani', '3 Des 2017', 'Novel/Fiksi', 'Zainuddin, seorang pemuda yang berdarah Minang dari ayah dan berdarah Bugis dari ibu–dengan hati penuh harapan dan angan akan sambutan gembira dari keluarga ayahnya–dari tanah kelahirannya, Mengkasar, pergi ke Padang Panjang, kampung halaman sang ayah. Namun, apa yang diinginkannya tidak terjadi. Di kampung halaman dan oleh keluarganya dia dianggap orang asing. Ketidaknyamanan hidup di kampung halamannya terobati karena perkenalannya dengan Hayati. Mereka saling jatuh cinta dalam keikhlasan dan kesucian jiwa.', 'vanderwijck.pdf'),
(7, 30, 'web.jpg', 'Pemrograman Web dengan PHP dan MySQL', 'Achmad Solichin', 'Penerbit Budi Luhur', 'Februari 2016', 'Nonfiksi', 'Melalui buku gratis php mysql ini, penulis berusaha mengenalkan dasar-dasar dari PHP dan MySQL untuk membangun suatu situs web. Buku ini sebagian besar menyajikan berbagai contoh program yang disusun secara terstruktur dari yang mudah sampai yang cukup kompleks. Dengan adanya contoh-contoh program tersebut, diharapkan pembaca dapat mempraktekkannya secara langsung (learning by doing) dan dapat menyimpulkan sendiri maksud dari setiap perintah dalam program dengan cara melihat hasil yang ditampilkan di layar (browser). Di akhir buku ini, disajikan contoh yang lebih nyata, yaitu aplikasi situs berita sederhana yang dapat dikembangkan lebih lanjut.', 'pemrogramanweb.pdf'),
(8, 70, 'sbmptn.jpg', 'Primagama Smart Solution Lolos SBMPTN SAINTEK', 'Tim Primagama', 'Grasindo', '4 Desember 2016', 'Panduan Pendidikan', 'Seleksi Bersama Masuk Perguruan Tinggi Negeri atau disingkat SBMPTN merupakan seleksi bersama dalam penerimaan mahasiswa baru di lingkungan perguruan tinggi negeri menggunakan pola ujian tertulis secara nasional yang selama ini telah menunjukkan berbagai keuntungan dan keunggulan, baik bagi calon mahasiswa, perguruan tinggi negeri, maupun kepentingan nasional. Bagi calon mahasiswa, ujian tertulis sangat menguntungkan karena lebih efisien, murah, dan fleksibel karena adanya mekanisme lintas wilayah. Buku ini diterbitkan dengan tujuan memberikan gambaran dan informasi kepada siswa untuk lebih mengenal karakter, tipe soal dan tingkat kesulitan soal SBMPTN sesuai bidang studi yang diujikan dari tahun ke tahun. Buku ini diharapkan dapat membantu siswa untuk belajar mandiri dan siswa menjadi lebih siap dalam menghadapi Seleksi Bersama Masuk Perguruan Tinggi Negeri di tahun berikutnya', 'sbmptn.pdf'),
(9, 10, 'sang-alkemis.jpg', 'Sang Alkemis', 'Paulo Coelho', 'Gramedia Pustaka Utama', '18 Nov 2015', 'Novel/Fiksi fantasi', 'Sang Alkemis adalah sebuah novel karya Paulo Coelho yang diterbitkan\ndi Brasil pada tahun 1988. Novel ini telah diterjemahkan dalam 56 bahasa.\nSang Alkemis menjadikan Coelho sebagai salah satu sastrawan besar di Brasil\ndan merupakan kiprahnya sebagai novelis besar dunia.\nSang Alkemis adalah kisah yang sederhana, tetapi penuh kebijaksanaan\ndan sarat makna. Sang Alkemis berkisah tentang anak gembala bernama\nSantiago yang berkelana dari rumahnya di Spanyol ke padang pasir di wilayah\nMesir untuk mencari harta karun terpendam di Piramida. Sebuah perjalanan\nyang semula bertujuan untuk menemukan harta duniawi berubah menjadi\npenemuan harta di dalam diri.\n', 'sangalkemis.pdf'),
(10, 80, 'alasan-hidup.jpg', 'Alasan untuk Tetap Hidup', 'Matt Haig', 'Gramedia Pustaka Utama', '24 Nov 2020', 'Nonfiksi', 'Apa rasanya menjadi orang yang mengalami gangguan kecemasan atau depresi? Ada dorongan yang membanjiri perasaan dan pikiran mereka sampai-sampai tubuh fisiknya pun ikut sakit. Bahkan, tak sedikit dari mereka yang akhirnya memutuskan untuk bunuh diri. Matt Haig pernah berada di titik itu. Ia pernah mencoba bunuh diri di pinggir tebing ketika berusia 24 tahun. Serangan panik yang bertubi-tubi dan harapan yang tak lagi terlihat membuatnya berpikir bahwa mengakhiri segalanya adalah hal terbaik. Tetapi, pada langkah terakhir, ia berhenti dan mengurungkan niatnya. Sampai sekarang, ia menjadi bukti bahwa gangguan kecemasan dan depresi bisa diatasi. Melalui buku ini, Matt Haig akan membagikan pengalamannya, mulai dari gejala depresi, rasanya mendapat serangan panik, hingga apa yang membuatnya bertahan hidup hingga hari ini. Kita akan menyelami apa yang para penderita depresi rasakan dan bagaimana cara membantu mereka (atau bahkan diri sendiri) menjadi lebih baik.', 'alasanhidup.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `icon_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `icon_kategori`) VALUES
(10, 'Sastra Fiksi', 'sastrafiksi-icon.png'),
(20, 'Filsafat', 'filsafat-icon.png'),
(30, 'Komputer & Teknologi', 'komputer-icon.png'),
(40, 'Novel Fantasi', 'fantasy-icon.png'),
(50, 'Sains Fiksi', 'sainsfiksi-icon.png'),
(60, 'Romance', 'romance-icon.png'),
(70, 'Pendidikan', 'pendidikan-icon.png'),
(80, 'Self Help', 'selfhelp-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  `id_buku` int(2) NOT NULL,
  `tanggal_pinjam` varchar(16) NOT NULL,
  `tanggal_kembali` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_peminjaman`
--

CREATE TABLE `riwayat_peminjaman` (
  `id_riwayat` int(2) NOT NULL,
  `id_buku` int(2) NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`) USING BTREE,
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  MODIFY `id_riwayat` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  ADD CONSTRAINT `riwayat_peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `riwayat_peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
