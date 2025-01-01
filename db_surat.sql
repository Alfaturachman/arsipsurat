/*
SQLyog Community v13.3.0 (64 bit)
MySQL - 8.0.30 : Database - db_surat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_surat` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_surat`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `username_admin` (`username_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`id_admin`,`nama_admin`,`username_admin`,`password`,`gambar`) values 
(1,'admin','admin','d033e22ae348aeb5660fc2140aec35850c4da997','admin.png'),
(2,'admin2','admin2','315f166c5aca63a157f7d41007675cb44a948b33','admin2.jpg');

/*Table structure for table `tb_bagian` */

DROP TABLE IF EXISTS `tb_bagian`;

CREATE TABLE `tb_bagian` (
  `id_bagian` int NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(120) NOT NULL,
  `username_admin_bagian` varchar(50) NOT NULL,
  `password_bagian` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tanggal_lahir_bagian` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp_bagian` varchar(12) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_bagian`),
  UNIQUE KEY `username_admin_bagian` (`username_admin_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `tb_bagian` */

insert  into `tb_bagian`(`id_bagian`,`nama_bagian`,`username_admin_bagian`,`password_bagian`,`nama_lengkap`,`tanggal_lahir_bagian`,`alamat`,`no_hp_bagian`,`gambar`) values 
(27,'SEKRETARIS','sekretaris','e8945f7bc0df222225b2770728f44a4e38929a6e ','Henry Shofa, SSTP,M.Si','1977-02-07','CILACAP','0247608201','sekretaris.jpg'),
(28,'Ka. Bid PPT','kabidppt','dffc9305fa3b9b0ca3c73307679164e3a2338991','Agung Prihantono, ST,M.Tech','1968-06-12','Semarang','0247608201','kabidppt.jpg'),
(29,'Ka. Bid IAB','kabidiab','7b12a8c953228568e96f7517b61b58d447a2d2be','Ir. Radito, MT','1966-12-21','Cilacap','0247608201','kabidiab.jpg'),
(30,'Ka. Bid SBP','kabidsbp','484a3260b49a8ce5ddac8b87e4b525e70b6fb4bd','Andis Setiyo Septiyantok, ST,M.Eng','1976-09-22','Mojokerto','0247608201','kabidsbp.jpg'),
(31,'Ka. Bid TARU','kabidtaru','358f10f7d6ee73d9eb7d7f37f3a82b5766b435ea','Ir. Dyah Purbandari MU, MT','1967-05-16','Semarang','0247608201','kabidtaru.jpg'),
(32,'Ka. Balai PSDA','kabalaipsda','25b8fd06399d57398cb5df48ff8cd476a2dcccf2','kabalaipsda','2024-12-12','Semarang','0247608201','kabalaipsda.png'),
(33,'Kasubag Umpeg','kasubagumpeg','cb798bfdd2027542339472e13ae01c047ab6c4a3','Setiyati Nurul Hidayah , S.Sos, M.Si','1967-02-04','Klaten','0247608201','kasubagumpeg.jpg'),
(34,'Kasubag Program','kasubagprogram','9422f1080c9d007fbf12ab2d3b8729cc65fb4634','Roni Prasetia, ST, M.Sc','1980-04-15','Padang ','0247608201','kasubagprogram.jpg'),
(35,'Kasubag Keuangan','kasubagkeuangan','1e2e67a67fa781f6439f7f4f2f25751d2c8c8f22','Sugeng Adi Nugroho , SE,MT','1969-01-11','Semarang ','0247608201','kasubagkeuangan.jpg'),
(36,'Subkoor SID','subkoorsid','082145e730fed79f68bec1a4f0289d68788ff412','Muchamad Ali Nidhom, ST','1976-04-26','Semarang ','0247608201','subkoorsid.jpg'),
(37,'Subkoor HSI','subkoorhsi','57378e8cc9c5d8dbb4928a3c3a9aa9d838c2b821','subkoorhsi','2024-12-12','Pusdataru','0247608201','subkoorhsi.png'),
(38,'Subkoor BANGGUNA','subkoorbangguna','783e565bf533df06116ce35d4d0b91e2c7496c3f','subkoorbangguna','2024-12-12','Pusdataru','0247608201','subkoorbangguna.png'),
(39,'Subkoor OP Bid. IAB','subkooropbidiab','e7c04bbad620e227b6622203db9f67de9b2bd3a1','Siswo Subagyo, ST, MT','1967-08-17','Bojonegoro','0247608201','subkooropbidiab.jpg'),
(40,'Subkoor PR Bid. IAB','subkoorprbidiab','c69fd0ed1ac86e52da4c576662172c0558fa3062','subkoorprbidiab','2024-12-12','Pusdataru','0247608201','subkoorprbidiab.png'),
(41,'Kasi KMA','kasikma','1ad59e1d5a1688ec690472aae81b4ac01128141a','Ign Irawan Insan Widodo , ST, MT','1968-04-09','Semarang ','0247608201','kasikma.jpg'),
(42,'Subkoor OP Bid. SBP','subkooropbidsbp','092ff8fb37a4bf9d0e0ad9972a3f350e8c98359c','Ganjar Primandaru, ST, M.Sc','1986-10-07','Semarang ','0247608201','subkooropbidsbp.jpg'),
(43,'Subkoor PR Bid SBP','subkoorprbidsbp','4cd51d8b2143e1d660c442849d512e1d0b71964b','Nur Hidayat , ST, M.PSDA','1976-10-26','Tegal ','0247608201','subkoorprbidsbp.jpg'),
(44,'Subkoor PBP','subkoorpbp','852ff4b750162c9f95e0c6a4deba5759007302f8','Azwar Annas Kunaifi , ST, MT','1983-07-17','Pacitan ','0247608201','subkoorpbp.jpg'),
(45,'Subkoor RANTARU','subkoorrantaru','fa2c234022951b0a6b87c942968baf65533077a5','Hari Adi Agus Setyawan, ST,MT','1980-08-17','Surakarta ','0247608201','subkoorrantaru.jpg'),
(46,'Subkoor MANRU','subkoormanru','4e493962a2203e0712b52cc978495f73e4c5cd15','subkoormanru','2024-12-12','Pusdataru','0247608201','subkoormanru.png'),
(47,'Subkoor DALTARU','subkoordaltaru','c2b66e94604abaff80bf5189f47be69e407995bf','subkoordaltaru','2024-12-12','Pusdataru','0247608201','subkoordaltaru.png');

/*Table structure for table `tb_surat` */

DROP TABLE IF EXISTS `tb_surat`;

CREATE TABLE `tb_surat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_surat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `nomor_urut` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  `tanggal_surat` date DEFAULT NULL,
  `penerima` varchar(255) DEFAULT NULL,
  `pengirim` varchar(255) DEFAULT NULL,
  `perihal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `kategori` enum('Surat Masuk','Surat Keluar') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `file_surat` varchar(255) DEFAULT NULL,
  `id_bagian_pengirim` int DEFAULT NULL,
  `id_bagian_penerima` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `disposisi_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tanggal_disposisi_1` datetime DEFAULT NULL,
  `disposisi_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tanggal_disposisi_2` datetime DEFAULT NULL,
  `disposisi_3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tanggal_disposisi_3` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_bagian_pengirim` (`id_bagian_pengirim`),
  KEY `id_bagian_penerima` (`id_bagian_penerima`),
  CONSTRAINT `tb_surat_ibfk_1` FOREIGN KEY (`id_bagian_pengirim`) REFERENCES `tb_bagian` (`id_bagian`) ON DELETE SET NULL,
  CONSTRAINT `tb_surat_ibfk_2` FOREIGN KEY (`id_bagian_penerima`) REFERENCES `tb_bagian` (`id_bagian`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_surat` */

insert  into `tb_surat`(`id`,`kode_surat`,`nomor_surat`,`nomor_urut`,`tanggal`,`tanggal_surat`,`penerima`,`pengirim`,`perihal`,`kategori`,`file_surat`,`id_bagian_pengirim`,`id_bagian_penerima`,`created_at`,`updated_at`,`disposisi_1`,`tanggal_disposisi_1`,`disposisi_2`,`tanggal_disposisi_2`,`disposisi_3`,`tanggal_disposisi_3`) values 
(3,'4534','3424','1445','2025-01-03 00:00:00','2025-01-01','Ka. Bid PPT','Ka. Bid SBP','Perihal Surat Penting','Surat Keluar','2025-SRT-001.pdf',27,32,'2025-01-01 15:40:27','2025-01-01 20:24:20','Disposisi: Segera diproses','2025-01-02 00:00:00','Disposisi: Untuk perhatian bagian keuangan','2025-01-03 00:00:00','Disposisi: Tindak lanjut oleh bagian hukum','2025-01-04 00:00:00'),
(5,'4534','3424','1447','2025-01-01 18:15:00','2025-01-01','Ka. Bid SBP','Ka. Bid SBP','dsfadfs','Surat Masuk','2025-3424.pdf',28,32,'2025-01-01 18:15:56','2025-01-01 20:22:30','Kasubag Umpeg','2025-01-01 00:00:00','Subkoor HSI','2025-01-01 00:00:00','Ka. Balai PSDA','2025-01-01 00:00:00'),
(6,'4534','3424','1448','2025-01-01 18:44:00','2025-01-01','Ka. Bid SBP','Ka. Bid SBP','dfdsag','Surat Masuk','2025-3424.pdf',28,32,'2025-01-01 18:46:24','2025-01-01 20:20:59','',NULL,'',NULL,'',NULL),
(7,'4534','3424','1449','2025-01-01 18:51:00','2025-01-01','Ka. Balai PSDA','Ka. Bid SBP','dsfasdf','Surat Masuk','2025-3424.pdf',28,32,'2025-01-01 18:51:39','2025-01-01 20:57:20','',NULL,'',NULL,'',NULL),
(8,'4534','3424','1450','2025-01-01 20:28:00','2025-01-01','Ka. Balai PSDA','Ka. Bid PPT','asassasassasas','Surat Keluar','2025-3424.pdf',28,32,'2025-01-01 20:29:02','2025-01-01 20:29:02','',NULL,'',NULL,'',NULL);

/*Table structure for table `tb_suratkeluar` */

DROP TABLE IF EXISTS `tb_suratkeluar`;

CREATE TABLE `tb_suratkeluar` (
  `id_suratkeluar` int NOT NULL AUTO_INCREMENT,
  `id_bagian` int DEFAULT NULL,
  `tanggalkeluar_suratkeluar` datetime NOT NULL,
  `kode_suratkeluar` varchar(10) NOT NULL,
  `nomor_suratkeluar` varchar(45) NOT NULL,
  `nama_bagian` varchar(70) NOT NULL,
  `tanggalsurat_suratkeluar` date NOT NULL,
  `kepada_suratkeluar` varchar(255) NOT NULL,
  `perihal_suratkeluar` text NOT NULL,
  `file_suratkeluar` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_suratkeluar`),
  UNIQUE KEY `nomor_suratkeluar` (`nomor_suratkeluar`),
  KEY `fk_id_bagian` (`id_bagian`),
  CONSTRAINT `fk_id_bagian` FOREIGN KEY (`id_bagian`) REFERENCES `tb_bagian` (`id_bagian`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

/*Data for the table `tb_suratkeluar` */

insert  into `tb_suratkeluar`(`id_suratkeluar`,`id_bagian`,`tanggalkeluar_suratkeluar`,`kode_suratkeluar`,`nomor_suratkeluar`,`nama_bagian`,`tanggalsurat_suratkeluar`,`kepada_suratkeluar`,`perihal_suratkeluar`,`file_suratkeluar`,`operator`,`tanggal_entry`) values 
(96,32,'2024-12-29 06:13:00','476.4','3463','Ka. Bid PPT','2024-12-29','Ka. Balai PSDA','halooo lulll','2024-3463.pdf','Ka. Bid PPT','2024-12-29 06:13:27'),
(99,28,'2024-12-29 06:43:00','476.4','3466','Ka. Balai PSDA','2024-12-29','Ka. Bid PPT',':(','2024-3466.pdf','Ka. Balai PSDA','2024-12-29 06:43:54'),
(100,32,'2024-12-29 06:45:00','476.4','3467','Ka. Bid PPT','2024-12-29','Ka. Balai PSDA','lullllll','2024-3467.pdf','Ka. Bid PPT','2024-12-29 06:45:19'),
(101,32,'2024-12-29 07:47:00','476.4','3468','Ka. Bid PPT','2024-12-29','Ka. Balai PSDA','fgf','2024-3468.pdf','admin','2024-12-29 07:47:50'),
(102,28,'2024-12-29 07:54:00','476.4','3469','Kasubag Program','2024-12-29','Ka. Bid PPT','54354','2024-3469.pdf','admin','2024-12-29 07:54:41'),
(103,32,'2025-01-01 14:46:00','476.4','3470','Ka. Bid PPT','2025-01-01','Ka. Balai PSDA','rrrrrrrrr','2025-3470.pdf','Ka. Bid PPT','2025-01-01 14:46:19'),
(104,28,'2025-01-01 17:17:00','476.4','3471','Ka. Balai PSDA','2025-01-01','Ka. Bid PPT','ssssssss','2025-3471.pdf','Ka. Balai PSDA','2025-01-01 17:18:21');

/*Table structure for table `tb_suratmasuk` */

DROP TABLE IF EXISTS `tb_suratmasuk`;

CREATE TABLE `tb_suratmasuk` (
  `id_suratmasuk` int NOT NULL AUTO_INCREMENT,
  `tanggalmasuk_suratmasuk` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kode_suratmasuk` varchar(10) NOT NULL,
  `nomorurut_suratmasuk` varchar(7) NOT NULL,
  `nomor_suratmasuk` varchar(25) NOT NULL,
  `tanggalsurat_suratmasuk` date NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `kepada_suratmasuk` varchar(255) NOT NULL,
  `perihal_suratmasuk` text NOT NULL,
  `file_suratmasuk` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disposisi1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal_disposisi1` datetime DEFAULT CURRENT_TIMESTAMP,
  `disposisi2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal_disposisi2` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `disposisi3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal_disposisi3` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_suratmasuk`),
  UNIQUE KEY `nomorurut_suratmasuk` (`nomorurut_suratmasuk`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tb_suratmasuk` */

insert  into `tb_suratmasuk`(`id_suratmasuk`,`tanggalmasuk_suratmasuk`,`kode_suratmasuk`,`nomorurut_suratmasuk`,`nomor_suratmasuk`,`tanggalsurat_suratmasuk`,`pengirim`,`kepada_suratmasuk`,`perihal_suratmasuk`,`file_suratmasuk`,`operator`,`tanggal_entry`,`disposisi1`,`tanggal_disposisi1`,`disposisi2`,`tanggal_disposisi2`,`disposisi3`,`tanggal_disposisi3`) values 
(2,'2024-11-13 13:00:00','900','4518','050/588/300.01','2024-10-17','HIDROLOGI','BANGGUNA','Permohonan\r\n','2024-4518.pdf','admin','2024-12-12 12:15:57','HIDROLOGI','2024-11-13 14:30:00','','1970-01-01 07:00:00','','1970-01-01 07:00:00'),
(3,'2017-09-20 14:00:00','010','4519','036/B/HMJELEKTRO/IX/2017','2017-09-18','FORUM KOMUNIKASI HIMPUNAN MAHASISWA ELEKTRO INDONESIA WILAYAH XIII KALIMANTAN','UMUM','Permohonan\r\n','2017-4519.pdf','admin2','2017-11-14 23:43:44','UMUM','2017-09-22 11:00:00','','1970-01-01 07:00:00','UMUM','2017-09-22 11:05:00'),
(5,'2017-09-21 15:10:00','660','4520','660.2/1539/100.14','2017-09-19','DINAS LINGKUNGAN HIDUP KOTA SAMARINDA','Sekretaris Daerah','Penting','2017-4520.pdf','admin2','2017-11-14 23:58:01','SEKDA','2017-09-21 23:00:00','PLT.ASS.II','2017-09-24 21:00:00','EKONOMI & SDA','2017-09-25 09:00:00'),
(6,'2017-09-26 10:00:00','061','4521','061/4382/SJ','2017-09-20','MENDAGRI RI','Organisasi','Surat Edaran Tentang Mekanisme Layanan Administrasi Kemendagri\r\n','2017-4521.pdf','admin','2017-12-02 21:44:11','ASS.III','2017-09-26 15:00:00','','1970-01-01 07:00:00','ORTAL','2017-09-27 11:30:00'),
(7,'2017-09-25 14:00:00','503','4522','503/744/100.26','2017-09-25','DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU KOTA SAMARINDA','PLH SEKDA','Tindak Lanjut Permohonan Penghapusan Denda Retribusi IMB PT.Borneo Inti Graha\r\n','2017-4522.pdf','admin','2017-12-06 00:32:23','PLH.SEKDA','2017-09-26 10:00:00','','1970-01-01 07:00:00','HUKUM','2017-09-27 15:00:00'),
(8,'2017-12-06 08:12:00','454','4523 ','4121/wawali/2017','2017-12-06','pdam','wawali','air','2017-4523.pdf','admin','2017-12-06 07:15:07','WAKIL WALIKOTA','2017-12-14 08:14:00','ADM.PEMB','2017-12-12 08:14:00','PEM-OTDA','2017-12-13 08:15:00'),
(10,'2025-01-01 09:00:00','66','4524 ','56','2025-01-01','Ka. Bid PPT','Ka. Bid TARU','sdfasdf','2025-4524.pdf','Ka. Bid PPT','2025-01-01 09:00:54','Kasubag Umpeg','2025-01-01 09:00:00','Kasubag Umpeg','2025-01-01 09:00:00','Ka. Bid IAB','2025-01-08 09:01:00'),
(11,'2025-01-01 15:06:00','12334','4525 ','34','2025-01-01','Ka. Balai PSDA','Ka. Bid PPT','pppppppppppppppppp','2025-4525.pdf','Ka. Balai PSDA','2025-01-01 15:07:15','','1970-01-01 07:00:00','','1970-01-01 07:00:00','','1970-01-01 07:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
