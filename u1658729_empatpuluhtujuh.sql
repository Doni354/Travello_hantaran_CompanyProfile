-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 04:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1658729_empatpuluhtujuh`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(13, '2023-07-20-081917', 'App\\Database\\Migrations\\TbProduk', 'default', 'App', 1690513521, 1),
(14, '2023-07-20-084755', 'App\\Database\\Migrations\\TbSlider', 'default', 'App', 1690513521, 1),
(15, '2023-07-20-085024', 'App\\Database\\Migrations\\TbProfil', 'default', 'App', 1690513521, 1),
(16, '2023-07-28-035902', 'App\\Database\\Migrations\\TbAktivitas', 'default', 'App', 1690517128, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id_aktivitas` int(5) UNSIGNED NOT NULL,
  `nama_aktivitas_in` varchar(200) NOT NULL,
  `nama_aktivitas_en` varchar(200) NOT NULL,
  `foto_aktivitas` varchar(100) NOT NULL,
  `deskripsi_aktivitas_in` text DEFAULT NULL,
  `deskripsi_aktivitas_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_aktivitas`
--

INSERT INTO `tb_aktivitas` (`id_aktivitas`, `nama_aktivitas_in`, `nama_aktivitas_en`, `foto_aktivitas`, `deskripsi_aktivitas_in`, `deskripsi_aktivitas_en`) VALUES
(6, 'Makan Malam di Tepi Pantai', 'Dinner by the Beach', 'Lorem Ipsum_Ekspor Lorem Ipsum_03092024102215.jpg', '<p>Makan malam di tepi pantai adalah pengalaman yang tak tertandingi, di mana romansa dan keindahan alam berpadu untuk menciptakan momen yang sempurna bagi pasangan yang ingin merayakan cinta mereka. Bayangkan duduk di meja yang telah disiapkan dengan penuh perhatian di pasir putih lembut, hanya beberapa langkah dari ombak yang bergulung lembut ke tepi pantai. Langit mulai berubah warna, dari jingga keemasan hingga ungu lembayung saat matahari perlahan-lahan tenggelam di cakrawala, menciptakan pemandangan yang spektakuler dan tak terlupakan.</p>\r\n<p>Meja Anda didekorasi dengan elegan, dihiasi dengan lilin-lilin yang berkelap-kelip di dalam lentera kaca, memberikan cahaya hangat yang lembut. Bunga-bunga segar dengan warna-warna pastel menghiasi meja, menambah sentuhan romantis yang halus namun memikat. Setiap detail dipikirkan dengan cermat untuk menciptakan suasana yang intim dan nyaman, memungkinkan Anda dan pasangan untuk benar-benar terhubung dan menikmati waktu bersama.</p>\r\n<p>Pelayan pribadi yang berdedikasi hadir untuk melayani Anda dengan sopan dan penuh perhatian, memastikan bahwa setiap kebutuhan Anda terpenuhi tanpa mengganggu momen-momen berharga Anda. Makan malam dimulai dengan hidangan pembuka yang lezat, mungkin berupa salad segar dengan bahan-bahan lokal atau seafood segar yang dipetik langsung dari laut. Hidangan utama disajikan dengan sentuhan gourmet, seperti steak yang dimasak dengan sempurna atau ikan segar yang dipanggang dengan rempah-rempah eksotis, disertai dengan pilihan anggur berkualitas yang dipilih untuk melengkapi rasa makanan.</p>', '<p>Dinner by the beach is an unmatched experience, where romance and natural beauty combine to create the perfect moment for couples looking to celebrate their love. Imagine sitting at a thoughtfully prepared table on the soft white sand, just steps from the waves gently rolling onto the shore. The sky begins to change color, from golden orange to violet as the sun slowly sinks over the horizon, creating a spectacular and unforgettable view.</p>\r\n<p>Your table is elegantly decorated, adorned with candles flickering inside glass lanterns, providing a soft warm glow. Fresh flowers in pastel colors decorated the tables, adding a subtle yet alluring romantic touch. Every detail is carefully thought out to create an intimate and comfortable atmosphere, allowing you and your partner to truly connect and enjoy time together.</p>\r\n<p>Dedicated personal butlers are there to serve you politely and attentively, ensuring that your every need is met without interrupting your precious moments. Dinner starts with a delicious appetizer, perhaps a fresh salad with local ingredients or fresh seafood picked straight from the sea. Main courses are served with a gourmet touch, such as steak cooked to perfection or fresh fish grilled with exotic spices, accompanied by a selection of fine wines chosen to complement the taste of the meal.</p>'),
(7, 'Kelas Memasak Bersama', 'Joint Cooking Class', 'Joint Cooking Class_Kelas Memasak Bersama_03092024102857.jpg', '<p>Kelas memasak bersama adalah salah satu cara paling menyenangkan dan interaktif untuk menghabiskan waktu dengan pasangan, sekaligus menciptakan kenangan yang penuh kehangatan dan keceriaan. Aktivitas ini menawarkan lebih dari sekadar belajar memasak; ini adalah kesempatan untuk berkolaborasi, tertawa, dan menikmati proses menciptakan sesuatu yang lezat bersama-sama. Terlebih lagi, suasana yang dihadirkan dalam kelas ini sangat kondusif untuk mempererat ikatan, menciptakan momen-momen istimewa yang akan Anda kenang lama setelah perjalanan berakhir.</p>\r\n<p>Setibanya di lokasi, Anda akan disambut oleh koki berpengalaman yang penuh semangat dan keahlian. Koki ini tidak hanya akan memandu Anda melalui setiap langkah proses memasak, tetapi juga berbagi cerita dan pengetahuan tentang budaya kuliner lokal yang kaya. Dari rahasia bumbu-bumbu tradisional hingga teknik memasak khas yang telah diwariskan turun-temurun, Anda akan mendapatkan wawasan mendalam tentang masakan yang akan Anda buat.</p>\r\n<p>Kelas ini biasanya dimulai dengan pengenalan bahan-bahan segar dan lokal yang akan digunakan. Anda dan pasangan akan diajak untuk memilih dan mempersiapkan bahan-bahan ini bersama-sama, mulai dari memotong sayuran segar hingga meracik bumbu dengan hati-hati. Proses ini tidak hanya mengajarkan teknik memasak, tetapi juga mendorong kerja sama dan komunikasi antara Anda berdua. Setiap langkah adalah kesempatan untuk saling membantu, tertawa ketika ada kesalahan kecil, dan merayakan keberhasilan ketika hidangan mulai terbentuk.</p>', '<p>Cooking classes together are one of the most fun and interactive ways to spend time with your partner, while creating memories full of warmth and joy. This activity offers more than just learning to cook; it\'s an opportunity to collaborate, laugh, and enjoy the process of creating something delicious together. What\'s more, the atmosphere provided in this class is very conducive to strengthening bonds, creating special moments that you will remember long after the trip ends.</p>\r\n<p>Upon arrival at the location, you will be greeted by an experienced chef full of passion and expertise. These chefs will not only guide you through every step of the cooking process, but also share stories and knowledge about the rich local culinary culture. From the secrets of traditional spices to special cooking techniques that have been passed down through generations, you will gain in-depth insight into the dishes you will make.</p>\r\n<p>This class usually begins with an introduction to the fresh and local ingredients that will be used. You and your partner will be invited to choose and prepare these ingredients together, from chopping fresh vegetables to carefully mixing spices. This process not only teaches cooking techniques, but also encourages cooperation and communication between the two of you. Every step is an opportunity to help each other, laugh when things go wrong, and celebrate successes as the dish begins to take shape.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(5) UNSIGNED NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `foto_artikel` varchar(255) NOT NULL,
  `deskripsi_artikel` longtext NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `judul_artikel`, `foto_artikel`, `deskripsi_artikel`, `created_at`) VALUES
(6, 'Menciptakan Kenangan Manis Melalui Kelas Memasak Bersama di Destinasi Eksotis', '03092024033055.jpg', '<p>Tidak ada yang lebih memikat daripada berbagi momen istimewa bersama orang yang Anda cintai di tengah suasana yang indah dan penuh kehangatan. Saat merencanakan perjalanan romantis, pengalaman yang mendalam dan bermakna tentu menjadi prioritas. Salah satu cara terbaik untuk mencapai itu adalah melalui <strong>Kelas Memasak Bersama</strong>, di mana Anda dan pasangan dapat menjelajahi kekayaan budaya kuliner lokal sambil menciptakan kenangan yang tak terlupakan.</p>\r\n<p><strong>Mengapa Memasak Bersama?</strong></p>\r\n<p>Memasak adalah seni yang menggabungkan kreativitas, kerja sama, dan kepekaan terhadap detail. Dalam konteks hubungan, aktivitas ini menjadi simbol harmoni dan kolaborasi. Saat Anda dan pasangan bekerja berdampingan di dapur, Anda tidak hanya menghasilkan hidangan yang lezat, tetapi juga memperkuat ikatan emosional melalui komunikasi, dukungan, dan apresiasi terhadap upaya satu sama lain.</p>\r\n<p><strong>Pengalaman yang Membangun Kenangan</strong></p>\r\n<p>Kelas memasak bersama di destinasi wisata bukan sekadar belajar teknik memasak; ini adalah pengalaman multisensori yang membangun kenangan indah. Bayangkan Anda berdua tiba di sebuah dapur yang terletak di tengah pemandangan alam yang memukau atau di dalam bangunan bersejarah yang penuh dengan karakter. Di sana, koki berpengalaman menanti Anda dengan senyum ramah, siap untuk membimbing Anda melalui petualangan kuliner yang menawan.</p>\r\n<p>Dari saat pertama, Anda akan tenggelam dalam keharuman bumbu-bumbu segar dan bahan-bahan lokal yang siap diolah. Setiap langkah dalam kelas ini diiringi dengan penjelasan yang menarik tentang asal-usul bahan dan resep, memberikan wawasan mendalam tentang tradisi kuliner setempat. Saat Anda dan pasangan memotong, mencampur, dan memasak, Anda tidak hanya belajar keterampilan baru, tetapi juga berbagi momen-momen kebersamaan yang penuh tawa dan kegembiraan.</p>\r\n<p><strong>Hidangan Cinta yang Sempurna</strong></p>\r\n<p>Puncak dari kelas memasak ini adalah saat Anda berdua duduk untuk menikmati hasil karya Anda sendiri. Makan malam yang disajikan bukan hanya tentang rasa, tetapi juga tentang perasaan puas dan bangga atas apa yang telah Anda ciptakan bersama. Setiap suapan mengandung cinta dan dedikasi yang Anda tanamkan sepanjang proses memasak.</p>\r\n<p>Di luar kelas, kenangan dari pengalaman ini akan tetap hidup. Setiap kali Anda mencoba resep yang dipelajari di rumah, Anda akan diingatkan pada momen-momen indah yang dihabiskan bersama di dapur eksotis itu. Dengan sedikit imajinasi, Anda bisa membawa kembali aroma, rasa, dan suasana dari perjalanan Anda, menciptakan kembali keajaiban di dapur rumah Anda sendiri.</p>', '2024-09-03 10:30:55'),
(7, 'Piknik di Tengah Alam: Menikmati Keindahan Bersama Pasangan', '03092024033324.jpg', '<p>Di tengah kesibukan kehidupan sehari-hari, kadang-kadang yang paling dibutuhkan adalah melarikan diri sejenak ke alam, menemukan ketenangan, dan menikmati momen kebersamaan yang tenang dengan orang yang Anda cintai. <strong>Piknik di Tengah Alam</strong> adalah aktivitas romantis yang sempurna untuk pasangan yang ingin menikmati keindahan alam sambil mempererat ikatan satu sama lain.</p>\r\n<p><strong>Keindahan Sederhana yang Menginspirasi</strong></p>\r\n<p>Piknik mungkin terdengar sederhana, namun justru dalam kesederhanaan inilah letak keindahannya. Bayangkan sebuah hari yang cerah, Anda dan pasangan berangkat menuju tempat yang indah, mungkin di tepi danau yang tenang, di bawah naungan pohon-pohon besar, atau di padang rumput yang dipenuhi bunga liar. Setibanya di sana, Anda menggelar alas piknik yang nyaman, mengeluarkan keranjang piknik yang penuh dengan makanan lezat, dan duduk bersama menikmati pemandangan yang menakjubkan.</p>\r\n<p>Piknik di tengah alam menawarkan kesempatan untuk benar-benar terhubung satu sama lain, jauh dari gangguan teknologi dan hiruk pikuk kota. Anda bisa berbicara tentang apa saja, atau hanya duduk diam menikmati keheningan yang diiringi suara alam &ndash; kicauan burung, angin yang berhembus lembut, dan suara gemericik air jika Anda berada dekat sungai atau danau. Momen-momen ini memberikan ketenangan yang sulit ditemukan di tempat lain, memungkinkan Anda berdua untuk benar-benar hadir dan menikmati kebersamaan.</p>\r\n<p><strong>Makanan dan Minuman yang Dibuat dengan Cinta</strong></p>\r\n<p>Isi keranjang piknik Anda bisa mencerminkan kepribadian dan selera Anda berdua. Mulai dari roti artisan, keju lokal, dan buah segar, hingga anggur favorit yang memberikan sentuhan elegan pada makan siang Anda. Setiap gigitan terasa lebih lezat saat dinikmati di tengah alam, diiringi tawa dan cerita yang dibagikan. Jangan lupa untuk menyertakan makanan penutup yang manis, seperti kue kecil atau cokelat, sebagai penutup yang sempurna untuk makan siang romantis Anda.</p>\r\n<p>Selain makanan, jangan lupa membawa minuman favorit Anda &ndash; mungkin sebotol anggur dingin, teh herbal yang menenangkan, atau kopi yang diseduh segar. Menikmati minuman bersama sambil memandang pemandangan sekitar menambah keintiman pada momen ini, memberikan perasaan bahwa waktu berhenti sejenak hanya untuk Anda berdua.</p>', '2024-09-03 10:33:24'),
(8, 'Berlayar Saat Matahari Terbenam: Menikmati Keindahan Senja Bersama Pasangan', '03092024033644.jpg', '<p>Ada sesuatu yang magis tentang matahari terbenam &ndash; saat langit berubah menjadi kanvas warna-warni, menciptakan pemandangan yang tak terlupakan. Jika Anda mencari pengalaman romantis yang menakjubkan bersama pasangan, <strong>Berlayar Saat Matahari Terbenam</strong> adalah pilihan yang sempurna. Mengarungi lautan yang tenang sambil menikmati pemandangan senja adalah cara yang luar biasa untuk merayakan cinta dan menciptakan kenangan indah.</p>\r\n<p><strong>Petualangan Romantis di Laut</strong></p>\r\n<p>Berlayar di laut saat matahari terbenam menawarkan perpaduan antara petualangan dan ketenangan. Saat Anda naik ke kapal, Anda akan disambut oleh angin laut yang segar dan pemandangan yang luas sejauh mata memandang. Kapal mulai bergerak perlahan, membawa Anda menjauh dari keramaian, menuju lautan yang tenang di mana Anda bisa menikmati momen intim bersama pasangan tanpa gangguan.</p>\r\n<p>Selama pelayaran, Anda bisa duduk santai di dek, menikmati hembusan angin dan suara ombak yang memecah di sekitar kapal. Momen ini memberikan kesempatan bagi Anda berdua untuk berbicara dari hati ke hati, berbagi impian, atau sekadar duduk dalam keheningan yang nyaman. Saat kapal meluncur melewati air, Anda akan merasakan ketenangan dan kebebasan yang hanya bisa ditemukan di laut terbuka.</p>\r\n<p><strong>Keindahan Senja yang Mempesona</strong></p>\r\n<p>Puncak dari pelayaran ini adalah saat matahari mulai tenggelam di cakrawala. Langit yang awalnya cerah berubah menjadi paduan warna oranye, merah, dan ungu yang memukau. Pantulan cahaya matahari di atas permukaan laut menciptakan kilauan yang indah, menambah kesan magis pada pemandangan ini. Anda dan pasangan bisa menyaksikan pemandangan ini sambil berpelukan, menikmati keindahan alam yang menyelimuti Anda.</p>', '2024-09-03 10:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(5) UNSIGNED NOT NULL,
  `nama_produk_in` varchar(200) NOT NULL,
  `nama_produk_en` varchar(200) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk_in` text DEFAULT NULL,
  `deskripsi_produk_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk_in`, `nama_produk_en`, `foto_produk`, `deskripsi_produk_in`, `deskripsi_produk_en`) VALUES
(2, 'Paket Wisata Kustom', 'Custom Tour Packages', 'Custom Tour Packages_Paket Wisata Kustom_02092024090426.jpg', '<p>Paket Wisata Kustom dari Travelo adalah layanan yang dirancang untuk memberikan pengalaman perjalanan yang sepenuhnya dipersonalisasi, memungkinkan pelanggan untuk merancang itinerary mereka sendiri sesuai dengan keinginan dan kebutuhan spesifik mereka. Layanan ini memberikan fleksibilitas dan kebebasan dalam merencanakan perjalanan, sehingga setiap aspek dari perjalanan Anda dapat disesuaikan dengan preferensi pribadi, anggaran, dan minat Anda. Pelanggan dapat memilih destinasi, durasi perjalanan, dan waktu keberangkatan. Baik Anda ingin menjelajahi kota-kota besar, menikmati pantai tropis, atau mengeksplorasi keajaiban alam, paket ini memungkinkan Anda untuk menyusun rencana perjalanan yang ideal. Anda dapat mengatur jumlah hari di setiap lokasi, menentukan aktivitas yang ingin dilakukan, dan memilih hari-hari khusus yang mungkin ingin Anda manfaatkan untuk acara tertentu.</p>', '<p>Custom Tour Packages from Travelo is a service designed to provide a completely personalized travel experience, allowing customers to design their own itinerary according to their specific wishes and needs. This service provides flexibility and freedom in travel planning, so that every aspect of your trip can be tailored to your personal preferences, budget and interests.<br>Customers can choose the destination, trip duration and departure time. Whether you want to explore big cities, enjoy tropical beaches, or explore natural wonders, this package allows you to create the ideal itinerary. You can set the number of days in each location, determine what activities you want to do, and select special days that you might want to use for certain events.</p>'),
(3, 'Pemesanan Tiket dan Akomodasi', 'Ticket dan Accommodation Booking', 'Ticket dan Accommodation Booking_Pemesanan Tiket dan Akomodasi_02092024090808.jpg', '<p>Layanan Pemesanan Tiket &amp; Akomodasi dari Travelo adalah solusi lengkap untuk kebutuhan perjalanan Anda, mencakup semua aspek perencanaan dan pemesanan yang diperlukan untuk memastikan perjalanan Anda berlangsung dengan lancar dan nyaman. Layanan ini dirancang untuk memberikan kemudahan dan kenyamanan, mulai dari pemesanan tiket transportasi hingga akomodasi yang sesuai dengan preferensi dan anggaran Anda.<br>Travelo menawarkan layanan pemesanan tiket pesawat untuk berbagai tujuan, baik domestik maupun internasional. Anda dapat memilih dari berbagai maskapai penerbangan, kelas kabin (ekonomi, bisnis, atau first class), dan jadwal penerbangan yang sesuai dengan rencana perjalanan Anda. Dengan akses ke sistem pemesanan yang terintegrasi, Travelo dapat memberikan harga terbaik dan ketersediaan tiket untuk penerbangan Anda.</p>', '<p>Travelo\'s Ticket &amp; Accommodation Booking Service is a complete solution for your travel needs, covering all aspects of planning and booking necessary to ensure your trip goes smoothly and comfortably. This service is designed to provide convenience and comfort, from booking transportation tickets to accommodation that suits your preferences and budget.<br>Travelo offers airline ticket booking services for various destinations, both domestic and international. You can choose from a variety of airlines, cabin classes (economy, business, or first class), and flight schedules to suit your travel plans. With access to an integrated booking system, Travelo can provide the best prices and ticket availability for your flights.</p>'),
(4, 'Wisata Kuliner dan Budaya', 'Culinary and Cultural Tourism', 'Culinary and Cultural Tourism_Wisata Kuliner dan Budaya_02092024090936.jpg', '<p>Layanan Wisata Kuliner &amp; Budaya dari Travelo adalah pengalaman perjalanan yang dirancang khusus untuk para wisatawan yang ingin mendalami keanekaragaman budaya dan kekayaan kuliner di destinasi yang mereka kunjungi. Layanan ini menggabungkan eksplorasi gastronomi lokal dengan pengetahuan mendalam tentang tradisi, sejarah, dan kehidupan sehari-hari di berbagai tempat.<br>Pelanggan akan diajak dalam tur kuliner yang dipandu oleh ahli lokal, menjelajahi pasar-pasar tradisional, restoran-restoran terkenal, dan tempat makan tersembunyi yang hanya diketahui oleh penduduk setempat. Tur ini memungkinkan Anda untuk mencicipi hidangan khas daerah tersebut, mulai dari street food hingga hidangan mewah, serta memahami cara penyajian dan bahan-bahan yang digunakan.</p>', '<p>Travelo\'s Culinary &amp; Cultural Tour Service is a travel experience specifically designed for tourists who want to explore the cultural diversity and culinary richness of the destinations they visit. This service combines local gastronomic exploration with in-depth knowledge of the traditions, history and daily life of various places.<br>Customers will be taken on a culinary tour guided by local experts, exploring traditional markets, famous restaurants and hidden eateries that only locals know about. This tour allows you to sample the region\'s typical dishes, from street food to fine dining, as well as understand how it is served and the ingredients used.</p>'),
(8, ' Paket Honeymoon and Wisata Romantis', 'Honeymoon and Romantic Tour Packages', 'Honeymoon and Romantic Tour Packages_ Paket Honeymoon and Wisata Romantis_02092024091105.jpg', '<p>Paket Honeymoon &amp; Wisata Romantis dari Travelo dirancang khusus untuk pasangan yang ingin merayakan momen istimewa dalam kehidupan mereka dengan pengalaman perjalanan yang penuh cinta dan keintiman. Paket ini mencakup semua elemen untuk menciptakan suasana yang romantis, santai, dan tak terlupakan, dari akomodasi mewah hingga aktivitas yang dirancang untuk mempererat hubungan dan menciptakan kenangan indah.<br>Paket ini menyediakan pilihan akomodasi mewah yang dirancang untuk memberikan kenyamanan dan privasi maksimal. Pilihan akomodasi termasuk suite bulan madu dengan pemandangan spektakuler, vila pribadi dengan kolam renang, dan kamar hotel yang didekorasi secara khusus untuk pasangan. Setiap akomodasi dilengkapi dengan fasilitas premium dan layanan khusus seperti sarapan di tempat tidur, dekorasi bunga, dan layanan kamar 24 jam.</p>', '<p>Honeymoon &amp; Romantic Tour Packages from Travelo are specially designed for couples who want to celebrate special moments in their lives with a travel experience full of love and intimacy. This package includes all the elements to create a romantic, relaxing and unforgettable atmosphere, from luxury accommodation to activities designed to strengthen relationships and create wonderful memories.<br>This package provides luxury accommodation options designed to provide maximum comfort and privacy. Accommodation options include honeymoon suites with spectacular views, private villas with pools, and hotel rooms specially decorated for couples. Each accommodation is equipped with premium amenities and special services such as breakfast in bed, floral decorations and 24-hour room service.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(5) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `logo_perusahaan` varchar(100) NOT NULL,
  `deskripsi_perusahaan_in` text DEFAULT NULL,
  `deskripsi_perusahaan_en` text DEFAULT NULL,
  `deskripsi_kontak_in` text DEFAULT NULL,
  `deskripsi_kontak_en` text DEFAULT NULL,
  `link_maps` text DEFAULT NULL,
  `link_whatsapp` text DEFAULT NULL,
  `favicon_website` varchar(100) NOT NULL,
  `title_website` varchar(100) NOT NULL,
  `foto_utama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `teks_footer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `username`, `password`, `nama_perusahaan`, `logo_perusahaan`, `deskripsi_perusahaan_in`, `deskripsi_perusahaan_en`, `deskripsi_kontak_in`, `deskripsi_kontak_en`, `link_maps`, `link_whatsapp`, `favicon_website`, `title_website`, `foto_utama`, `alamat`, `no_hp`, `email`, `teks_footer`) VALUES
(1, 'user', 'user', 'Travello', 'Logo_Hantaran-Kayu-Malang_20122023045959.png', '<p>Travelo adalah sebuah perusahaan yang bergerak di bidang layanan perjalanan dan pariwisata. Mereka menyediakan berbagai paket perjalanan yang dirancang untuk memberikan pengalaman berwisata yang tak terlupakan bagi para pelanggan. Travelo menawarkan beragam destinasi, mulai dari wisata domestik hingga internasional, dengan pilihan paket yang dapat disesuaikan sesuai kebutuhan dan preferensi wisatawan.</p>\r\n<p>Perusahaan ini fokus pada memberikan layanan berkualitas, mulai dari perencanaan perjalanan, pemesanan tiket, akomodasi, hingga kegiatan wisata di destinasi yang dipilih. Dengan jaringan mitra yang luas dan profesional, Travelo berkomitmen untuk memastikan setiap perjalanan yang diatur berjalan dengan lancar dan menyenangkan.</p>\r\n<p>Selain itu, Travelo juga menekankan pada aspek kenyamanan dan keamanan dalam setiap perjalanan, serta memberikan layanan pelanggan yang responsif dan ramah. Sebagai penyedia layanan perjalanan, Travelo berusaha untuk terus berinovasi dan menghadirkan solusi perjalanan yang terbaik, menjadikan setiap momen perjalanan sebagai pengalaman yang berharga.</p>', '<p>Travelo is a company operating in the field of travel and tourism services. They provide various travel packages designed to provide customers with an unforgettable travel experience. Travelo offers a variety of destinations, from domestic to international tourism, with package options that can be tailored to suit tourists\' needs and preferences.</p>\r\n<p>This company focuses on providing quality services, from travel planning, ticket booking, accommodation, to tourist activities in selected destinations. With an extensive and professional partner network, Travelo is committed to ensuring that every arranged trip runs smoothly and is enjoyable.</p>\r\n<p>Apart from that, Travelo also emphasizes comfort and safety aspects in every trip, as well as providing responsive and friendly customer service. As a travel service provider, Travelo strives to continue to innovate and present the best travel solutions, making every moment of travel a valuable experience.</p>', '<p>Provinsi Sumatra Barat</p>', '<p>West Sumatera Province</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4046040.312635006!2d108.0530452!3d-7.9771059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629c21940f685%3A0xce6adb8a6aba4f5!2sNakam%20Foods%20Indonesia!5e0!3m2!1sid!2sid!4v1691128148640!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://wa.me/+6282131222332', 'Favicon_PT-NAKAM-Foods-Indonesia_22082023083620.png', 'Travelo: Your Journey, Our Passion', '1724297359_5e31374713ff7bf80df8.jpeg', '<p>West Sumatera Province</p>', '+62 821 3122 2332', 'hantarankayumalang@gmail.com', 'All Rights Reserved. Designed with love by Me');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id_slider` int(5) UNSIGNED NOT NULL,
  `file_foto_slider` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id_slider`, `file_foto_slider`) VALUES
(8, 'Travello_02092024155658.jpg'),
(9, 'Travello_02092024155732.jpg'),
(10, 'Travello_02092024155754.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id_aktivitas` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id_slider` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
