/*
SQLyog Professional v12.09 (64 bit)
MySQL - 10.3.15-MariaDB : Database - skripsi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`skripsi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `skripsi`;

/*Table structure for table `data_materi` */

DROP TABLE IF EXISTS `data_materi`;

CREATE TABLE `data_materi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `data_pengajar_id` int(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `path` varchar(100) DEFAULT NULL,
  `ext` varchar(50) DEFAULT NULL,
  `filename` varchar(200) NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `master_status_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `data_materi` */

insert  into `data_materi`(`id`,`created_at`,`updated_at`,`data_pengajar_id`,`subject`,`path`,`ext`,`filename`,`catatan`,`master_status_id`) values (4,'2019-08-01 17:27:46','2019-08-05 14:01:34',1,'kisi-kisi','1565013694','pptx','Analisa Sistem Informasi Pendataan Nilai Murid.pptx','di pelajari ya',1),(5,'2019-08-04 08:28:38','2019-08-05 14:00:54',20,'Tugas','1565013654','docx','cover.docx','Tugas',2),(6,'2019-08-04 08:36:40','2019-08-05 14:28:33',21,'Materi','1565015313','docx','DAFTAR PUSTAKA.docx','materi',1),(7,'2019-09-01 04:38:39','2019-09-01 04:38:39',20,'materi tambahan','1567312719','docx','DAFTAR PUSTAKA.docx','materi tambahan',2),(8,'2019-09-11 15:25:48','2019-09-11 15:25:48',23,'kisi-kisi UTS','1568215548','doc','Abstrak.doc','di pelajari sebelum UTS di mulai ya',2);

/*Table structure for table `data_ortu` */

DROP TABLE IF EXISTS `data_ortu`;

CREATE TABLE `data_ortu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `nohandphone_ortu` int(20) NOT NULL,
  `master_agama_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `data_ortu` */

/*Table structure for table `data_pengajar` */

DROP TABLE IF EXISTS `data_pengajar`;

CREATE TABLE `data_pengajar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `master_data_id` int(10) NOT NULL,
  `master_kelas_id` int(10) NOT NULL,
  `master_mapel_id` int(10) NOT NULL,
  `master_status_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `master_data_id` (`master_data_id`),
  KEY `master_kelas_id` (`master_kelas_id`),
  KEY `master_mapel_id` (`master_mapel_id`),
  KEY `master_status_id` (`master_status_id`),
  CONSTRAINT `data_pengajar_ibfk_1` FOREIGN KEY (`master_data_id`) REFERENCES `master_data` (`id`),
  CONSTRAINT `data_pengajar_ibfk_2` FOREIGN KEY (`master_kelas_id`) REFERENCES `master_kelas` (`id`),
  CONSTRAINT `data_pengajar_ibfk_3` FOREIGN KEY (`master_mapel_id`) REFERENCES `master_mapel` (`id`),
  CONSTRAINT `data_pengajar_ibfk_4` FOREIGN KEY (`master_status_id`) REFERENCES `master_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `data_pengajar` */

insert  into `data_pengajar`(`id`,`created_at`,`updated_at`,`master_data_id`,`master_kelas_id`,`master_mapel_id`,`master_status_id`) values (1,'2019-05-23 17:56:07','2019-05-23 17:56:07',17,1,1,1),(2,'2019-05-23 17:56:07','2019-05-23 17:56:07',17,3,1,1),(6,'2019-05-30 18:56:42','2019-05-30 18:56:42',2,2,1,1),(13,'2019-07-18 08:15:25','2019-07-18 08:15:25',4,2,3,1),(20,'2019-07-20 08:21:07','2019-07-20 08:21:07',18,1,3,1),(21,'2019-07-20 08:21:07','2019-07-20 08:21:07',18,3,3,1),(22,'2019-07-20 17:46:41','2019-07-20 17:46:41',5,1,5,1),(23,'2019-07-20 17:46:41','2019-07-20 17:46:41',5,2,5,1),(24,'2019-07-20 17:46:41','2019-07-20 17:46:41',5,3,5,1),(29,'2019-08-31 06:27:15','2019-08-31 06:27:15',27,3,4,1),(31,'2019-09-01 01:31:32','2019-09-01 01:31:32',11,1,4,1),(32,'2019-09-01 04:26:35','2019-09-01 04:26:35',29,1,1,1),(33,'2019-09-01 04:26:35','2019-09-01 04:26:35',29,3,1,1);

/*Table structure for table `data_ujian` */

DROP TABLE IF EXISTS `data_ujian`;

CREATE TABLE `data_ujian` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `master_ujian_tipe_id` int(10) NOT NULL,
  `data_pengajar_id` int(10) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `semester` char(6) NOT NULL,
  `master_status_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `master_ujian_tipe_id` (`master_ujian_tipe_id`),
  KEY `master_status_id` (`master_status_id`),
  KEY `data_pengajar_id` (`data_pengajar_id`),
  CONSTRAINT `data_ujian_ibfk_1` FOREIGN KEY (`master_ujian_tipe_id`) REFERENCES `master_ujian_tipe` (`id`),
  CONSTRAINT `data_ujian_ibfk_2` FOREIGN KEY (`master_status_id`) REFERENCES `master_status` (`id`),
  CONSTRAINT `data_ujian_ibfk_3` FOREIGN KEY (`data_pengajar_id`) REFERENCES `data_pengajar` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `data_ujian` */

insert  into `data_ujian`(`id`,`created_at`,`updated_at`,`master_ujian_tipe_id`,`data_pengajar_id`,`waktu`,`keterangan`,`semester`,`master_status_id`) values (1,'2019-06-01 00:00:00','2019-07-19 07:19:30',3,2,'120','Kerjakan sendiri aja ya...','Genap',1),(2,'2019-07-06 10:25:04','2019-07-20 09:39:26',2,6,'120','kerjakan ya','Genap',1),(5,'2019-07-20 09:53:09','2019-07-29 13:06:40',1,21,'60','Open Book, tidak searching ke google','Genap',2),(6,'2019-07-20 19:03:29','2019-07-20 19:03:29',1,2,'30','Open Book Open Google','Genap',2),(7,'2019-07-24 11:39:35','2019-08-05 20:05:56',2,20,'40','Silahkan dikerjakan dengan benar','Genap',1),(8,'2019-07-31 09:17:04','2019-07-31 09:17:04',1,23,'30','ya semangats','Genap',2),(9,'2019-08-05 20:04:50','2019-08-05 20:06:01',1,20,'30','dikerjakan dengan benar','Genap',1),(10,'2019-08-05 20:05:35','2019-08-05 20:06:07',3,20,'120','close book, close gadget','Genap',1),(11,'2019-08-06 06:17:48','2019-08-06 06:25:23',2,22,'60','jngn mencontek ya','Genap',1),(12,'2019-09-01 05:00:07','2019-09-01 05:03:43',1,24,'5','dikerjakan sendiri','Genap',1);

/*Table structure for table `master_agama` */

DROP TABLE IF EXISTS `master_agama`;

CREATE TABLE `master_agama` (
  `id` int(10) NOT NULL,
  `nama` char(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_UNIQUE` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `master_agama` */

insert  into `master_agama`(`id`,`nama`) values (5,'Budha'),(4,'Hindhu'),(1,'Islam'),(3,'Katolik'),(6,'Kong Hu Chu'),(2,'Kristen');

/*Table structure for table `master_data` */

DROP TABLE IF EXISTS `master_data`;

CREATE TABLE `master_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `noinduk` char(10) NOT NULL,
  `nama` char(50) NOT NULL,
  `lahir` date NOT NULL,
  `nama_ortu` char(100) DEFAULT NULL,
  `nohandphone` char(25) NOT NULL,
  `email` char(100) NOT NULL,
  `alamat` text NOT NULL,
  `password` char(100) NOT NULL,
  `tahun_masuk` char(5) DEFAULT NULL,
  `master_agama_id` int(10) NOT NULL,
  `master_gander_id` int(10) NOT NULL,
  `master_jabatan_id` int(10) NOT NULL,
  `master_kelas_id` int(10) DEFAULT NULL,
  `master_status_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `noinduk_UNIQUE` (`noinduk`),
  KEY `fk_master_guru_master_agama_idx` (`master_agama_id`),
  KEY `fk_master_guru_master_status1_idx` (`master_status_id`),
  KEY `fk_master_guru_master_gander1_idx` (`master_gander_id`),
  KEY `fk_master_guru_master_jabatan1_idx` (`master_jabatan_id`),
  KEY `master_kelas_id` (`master_kelas_id`),
  CONSTRAINT `master_data_ibfk_1` FOREIGN KEY (`master_agama_id`) REFERENCES `master_agama` (`id`),
  CONSTRAINT `master_data_ibfk_2` FOREIGN KEY (`master_gander_id`) REFERENCES `master_gander` (`id`),
  CONSTRAINT `master_data_ibfk_3` FOREIGN KEY (`master_jabatan_id`) REFERENCES `master_jabatan` (`id`),
  CONSTRAINT `master_data_ibfk_4` FOREIGN KEY (`master_kelas_id`) REFERENCES `master_kelas` (`id`),
  CONSTRAINT `master_data_ibfk_5` FOREIGN KEY (`master_status_id`) REFERENCES `master_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `master_data` */

insert  into `master_data`(`id`,`created_at`,`updated_at`,`noinduk`,`nama`,`lahir`,`nama_ortu`,`nohandphone`,`email`,`alamat`,`password`,`tahun_masuk`,`master_agama_id`,`master_gander_id`,`master_jabatan_id`,`master_kelas_id`,`master_status_id`) values (2,'2019-05-13 00:00:00','2019-07-20 09:30:08','guru1','Rizky','1990-09-09',NULL,'2147483647','adimulya@gmail.com','balaraja kronjo','$2y$10$Atc5Jr8ckjFIVeGxhTeVS.AUPCE5BuNVakhgLjmg1d214fYo6RG/6','',1,1,1,NULL,1),(4,'2019-05-13 08:57:05','2019-07-20 09:30:12','guru2','Diki','2015-02-10',NULL,'08159729','ciwan@ciwan.co.id','Balaraja talagasari','$2y$10$4nOhhRkEH/O16vlES/KfXuQ8.dY8fEV6.ZCd/QBQSPPdiZ711SmC6','',6,1,1,NULL,2),(5,'2019-05-16 22:35:22','2019-08-06 17:32:33','guru3','Adi','2012-09-27',NULL,'08983649','adi@gmail.com','Bitung dket tol','$2y$10$8caqR.mQmZYAvzKh3HjjBOyE4IKqseGxPmAKzrAxQdl8OUiDcPeA2',NULL,4,2,1,NULL,1),(6,'2019-05-17 15:38:59','2019-05-17 15:40:40','admin','Admin','1996-09-09',NULL,'081285481632','adi01@gmail.com','Deket mes Lion','$2y$10$QCPsdRxKDX/gxkco4Ths8eYmWKyV5XS2N/RxojOIn2LLk7fUSZrJq',NULL,1,1,2,NULL,1),(7,'2019-05-17 15:40:32','2019-08-20 10:22:39','murid1','Tia','1992-07-06','Mi\'un','08982399','mul@gmail.com','Indonesia','$2y$10$ERp0hzjcWgQydYbHl/ijsedsdWSdqaHb9/Losgg1qhHsxm17RSpGG','2013',2,2,3,3,1),(9,'2019-05-17 17:22:10','2019-07-20 09:55:23','murid2','Rara','2012-01-04','Bambang','08222225','rara@gmail.com','Mauk Sepatan','$2y$10$32GU8O7vbmbSvxGTzlJcfu5xwmv/e3TiytaDOk9uPPvaJYcutq5du','2017',6,2,3,2,1),(10,'2019-05-17 17:38:20','2019-08-05 15:29:45','murid3','Lani','1995-06-05','Mulyadi','0898882','lani@gmail.com','Lampung','$2y$10$41IsPr/NuzmzHZeXy1lxXumAuiuuNw/sE0fl9.UUtublLK9vmd3i2','2016',4,1,3,1,1),(11,'2019-05-17 17:39:17','2019-07-20 09:30:22','guru4','Naufal','1987-07-26',NULL,'08123989','naufal@gmail.com','Tangerang TB','$2y$10$j0DIIGW/c9K/62pQmIpYXetO.V9YLE71V/qoJAVgsHe6IykxILnxW',NULL,1,1,1,NULL,1),(17,'2019-05-23 17:56:07','2019-07-20 09:30:26','guru5','mulyaa','2002-07-28',NULL,'0822222522','mulya@gmail.com','Karawaci dket mall','$2y$10$UG2PHhVS9KgThrjYYzBZveB.oG7lkp5keXWZuy8l5otTovrllz6oC',NULL,5,1,1,NULL,1),(18,'2019-05-28 21:01:55','2019-08-06 17:32:53','guru6','Aldi','1998-11-24',NULL,'123555','tape@gmail.com','TB di blok C','$2y$10$r0Vz5vEJjGzv.yLOiFBVTe1R.NkXHWC2lzvSFnkwMLPwxwpoGn2li',NULL,3,2,1,NULL,1),(19,'2019-07-20 09:14:32','2019-07-20 09:55:31','murid4','Kiya','2010-09-20','Yana','08888887','kiya@gmail.com','Cisauk','$2y$10$FYcXS1DPBD44AkfM.wqRoutLfvAnQS/Pa9qUGby9admr9Wc0rxkQi','2006',5,1,3,1,1),(20,'2019-07-20 09:15:17','2019-08-05 15:29:31','murid5','Muhammad','2012-06-18','Ikbal','08949732','Maulid12@gmail.com','Pasar Kemis','$2y$10$YtJUUZLFV0ILWB2uYTfhY.ueHRSNUqvxC7WKE/H5SYghVWu7GNZc2','2002',1,1,3,1,1),(21,'2019-07-20 09:16:55','2019-07-20 09:55:55','murid6','Eka Putri','2001-08-04','Latah','089493162','Putri@gmail.com','Kota Bumi','$2y$10$b4vYIuSBVZcxzNFxryIKtOyZa3GJVV2DwCqES.il4//f5o4bc5xm.','2000',1,2,3,3,1),(22,'2019-07-20 09:18:11','2019-07-20 09:31:10','murid7','Tari','2004-09-01','siti','081249732','Tari00895@gmail.com','Pasar Kemis sumantri','$2y$10$UTXAvmPyO2pppKNXBx44aelVxDv.qmDduAW/L.aXiQo2gTMhVvv2S','2005',3,2,3,2,1),(23,'2019-07-20 09:19:24','2019-07-20 09:56:06','murid8','Rohayati','2002-04-02','Oyip','085546182','iyoh91@gmail.com','kabembem balaraja','$2y$10$12pzmtiYkwzgb4DjckJuo.ZHiMqFbciA/HB1SXxBcH7ZjFaT8d6fi','2002',4,2,3,2,2),(24,'2019-07-20 09:20:30','2019-07-20 09:56:17','murid9','Toyip','1999-02-05',NULL,'0855546127','toyipaja@yahoo.com','Balaraja TB, kp.sarongge','$2y$10$3dzAXV1z5zxSiza10jk5.OOtsd1GO2GTfeV2KtgiSQHi1u6p03gjq','2001',2,1,3,3,2),(25,'2019-07-20 09:22:22','2019-07-20 09:31:28','murid10','Risna','2001-09-04','Joko','085545284312','risnajelek@yahoo.com','Cisoka, deket cigaru','$2y$10$WlkLUgtRiC.CnGQLWGKtauyAteScc7JUl84ISzyPPIQt/oCoEtxVm','2003',1,2,3,3,1),(27,'2019-08-26 18:08:38','2019-08-26 18:09:27','murid11','Slem','2006-10-17',NULL,'02194564234','slembinmuing@gmail.com','Teluk jakarta','$2y$10$yw40a0.qyX6Z7VC3JFfGpu41Ps7yxiyWWvvIDHIrIq9tq1gNK.tJu',NULL,6,1,1,NULL,2),(29,'2019-09-01 04:26:35','2019-09-01 04:26:35','038502','safe\'i','2001-05-26',NULL,'0888729420324','adimulya223@gmail.com','cikokol tangerang','$2y$10$ehyTUjjBchtUjMnsdW0iI.9ac4tsw9QNJrLiMHQEAZyoullqFFufq',NULL,5,1,1,NULL,2);

/*Table structure for table `master_gander` */

DROP TABLE IF EXISTS `master_gander`;

CREATE TABLE `master_gander` (
  `id` int(10) NOT NULL,
  `nama` char(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_UNIQUE` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `master_gander` */

insert  into `master_gander`(`id`,`nama`) values (1,'Pria'),(2,'Wanita');

/*Table structure for table `master_guru` */

DROP TABLE IF EXISTS `master_guru`;

CREATE TABLE `master_guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` char(25) NOT NULL,
  `nip` int(10) NOT NULL,
  `paswoord` char(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nohandphone` char(25) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `master_gander_id` int(11) NOT NULL,
  `master_agama_id` int(11) NOT NULL,
  `master_status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip_UNIQUE` (`nip`),
  KEY `fk_master_guru_master_gander1_idx` (`master_gander_id`),
  KEY `fk_master_guru_master_agama1_idx` (`master_agama_id`),
  KEY `fk_master_guru_master_status1_idx` (`master_status_id`),
  CONSTRAINT `fk_master_guru_master_agama1` FOREIGN KEY (`master_agama_id`) REFERENCES `master_agama` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_master_guru_master_gander1` FOREIGN KEY (`master_gander_id`) REFERENCES `master_gander` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_master_guru_master_status1` FOREIGN KEY (`master_status_id`) REFERENCES `master_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `master_guru` */

insert  into `master_guru`(`id`,`created_at`,`updated_at`,`nama`,`nip`,`paswoord`,`tgl_lahir`,`nohandphone`,`alamat`,`master_gander_id`,`master_agama_id`,`master_status_id`) values (1,'2019-05-12 00:00:00',NULL,'adim',1555555012,'123123','1990-05-12','081244888999','balaraja',1,1,1);

/*Table structure for table `master_jabatan` */

DROP TABLE IF EXISTS `master_jabatan`;

CREATE TABLE `master_jabatan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` char(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_UNIQUE` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `master_jabatan` */

insert  into `master_jabatan`(`id`,`nama`) values (2,'Admin'),(3,'Student'),(1,'Teacher');

/*Table structure for table `master_kelas` */

DROP TABLE IF EXISTS `master_kelas`;

CREATE TABLE `master_kelas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `kelas` char(20) NOT NULL,
  `master_data_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `master_data_id_UNIQUE` (`master_data_id`),
  CONSTRAINT `master_kelas_ibfk_1` FOREIGN KEY (`master_data_id`) REFERENCES `master_data` (`id`),
  CONSTRAINT `master_kelas_ibfk_2` FOREIGN KEY (`master_data_id`) REFERENCES `master_data` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `master_kelas` */

insert  into `master_kelas`(`id`,`created_at`,`updated_at`,`kelas`,`master_data_id`) values (1,'2019-05-17 00:00:01','2019-05-17 15:03:57','X(Sepuluh)',2),(2,'2019-05-17 00:00:01','2019-07-20 10:17:17','XI(Sebelas)',18),(3,'2019-05-17 00:00:01','2019-05-17 15:33:08','XII(DuaBelas)',5);

/*Table structure for table `master_mapel` */

DROP TABLE IF EXISTS `master_mapel`;

CREATE TABLE `master_mapel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `kodemapel` char(10) NOT NULL,
  `nama` char(20) NOT NULL,
  `master_status_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_UNIQUE` (`nama`),
  KEY `master_status_id` (`master_status_id`),
  CONSTRAINT `master_mapel_ibfk_1` FOREIGN KEY (`master_status_id`) REFERENCES `master_status` (`id`),
  CONSTRAINT `master_mapel_ibfk_2` FOREIGN KEY (`master_status_id`) REFERENCES `master_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `master_mapel` */

insert  into `master_mapel`(`id`,`created_at`,`updated_at`,`kodemapel`,`nama`,`master_status_id`) values (1,'2019-05-02 00:00:00','2019-05-15 10:05:45','A001','Matematika',1),(3,'2019-05-14 08:16:44','2019-07-20 17:01:25','A002','Bahasa Indonesia',1),(4,'2019-05-14 08:53:44','2019-08-26 17:56:36','A015','Pendidikan Agama',1),(5,'2019-05-14 09:01:15','2019-08-25 08:13:04','A003','Sejarah',1),(6,'2019-08-26 18:01:52','2019-08-26 18:01:52','A004','Penjaskes',2);

/*Table structure for table `master_status` */

DROP TABLE IF EXISTS `master_status`;

CREATE TABLE `master_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` char(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_UNIQUE` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `master_status` */

insert  into `master_status`(`id`,`nama`) values (1,'Aktif'),(2,'Non Aktif');

/*Table structure for table `master_ujian_tipe` */

DROP TABLE IF EXISTS `master_ujian_tipe`;

CREATE TABLE `master_ujian_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `tipe` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `master_ujian_tipe` */

insert  into `master_ujian_tipe`(`id`,`created_at`,`updated_at`,`tipe`) values (1,'2019-06-01 00:00:00',NULL,'TUGAS'),(2,'2019-06-01 00:00:00',NULL,'UTS'),(3,'2019-06-01 00:00:00',NULL,'UAS');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `soal_ujian` */

DROP TABLE IF EXISTS `soal_ujian`;

CREATE TABLE `soal_ujian` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pertanyaan` varchar(500) NOT NULL,
  `pilihan_a` varchar(250) NOT NULL,
  `pilihan_b` varchar(250) NOT NULL,
  `pilihan_c` varchar(250) NOT NULL,
  `pilihan_d` varchar(250) NOT NULL,
  `pilihan_e` varchar(250) NOT NULL,
  `jawaban` varchar(1) NOT NULL,
  `data_ujian_id` int(10) NOT NULL,
  `master_status_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `data_ujian_id` (`data_ujian_id`),
  KEY `master_status_id` (`master_status_id`),
  CONSTRAINT `soal_ujian_ibfk_1` FOREIGN KEY (`data_ujian_id`) REFERENCES `data_ujian` (`id`),
  CONSTRAINT `soal_ujian_ibfk_2` FOREIGN KEY (`master_status_id`) REFERENCES `master_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `soal_ujian` */

insert  into `soal_ujian`(`id`,`created_at`,`updated_at`,`pertanyaan`,`pilihan_a`,`pilihan_b`,`pilihan_c`,`pilihan_d`,`pilihan_e`,`jawaban`,`data_ujian_id`,`master_status_id`) values (1,'2019-06-09 00:00:00','2019-07-30 17:03:00','Siapa Dosen Java?','Pak Shobi','Pak Lukman','Pak Firdi','Pak Syepri','Pak Luthfi','B',1,1),(5,'2019-07-19 14:21:00',NULL,'Siapa Dosen Web?','Pak Shobi','Pak Lukman','Pak Firdi','Pak Syepri','Pak Luthfi','A',1,1),(6,'2019-07-19 14:21:00',NULL,'Siapa Dosen SQL?','Pak Shobi','Pak Lukman','Pak Firdi','Pak Syepri','Pak Luthfi','C',1,1),(7,'2019-07-19 14:21:00',NULL,'Siapa kaprodi teknik?','Pak Shobi','Pak Lukman','Pak Firdi','Pak Syepri','Pak Luthfi','D',1,1),(9,'2019-07-21 17:26:17','2019-07-21 17:26:17','2-1=','1','2','3','4','5','A',2,1),(10,'2019-07-29 12:49:36','2019-07-29 12:49:36','12+3=','12','15','14','13','16','B',2,1),(11,'2019-07-29 12:50:04','2019-07-29 12:50:04','4x6=','24','20','30','21','23','A',2,1),(12,'2019-07-29 12:50:29','2019-07-29 12:50:29','9x3=','30','32','27','28','29','C',2,1),(13,'2019-07-29 12:52:40','2019-07-29 12:52:40','Lala mempunyai uang Rp.10.000 di belikan pulpen sebanyak 2pcs dengan harga Rp.1.500/pcs. Berapakah sisa uang Lala','Rp.6.500','Rp.7.000','Rp.7.500','Rp.6.000','Rp.8.000','C',2,1),(14,'2019-07-29 12:54:42','2019-07-29 12:54:42','Siapakah dibawah ini termasuk dosen P2K?','Pak Sofyan','Pak Panjul','Pak joko','Pak Hengki','A dan D benar','E',1,1),(15,'2019-08-05 20:09:22','2019-08-05 20:09:22','apa arti dari sinonim?','lawan kata','persamaan kata','pertemanan','Permusuhan','kebersamaan','B',7,1),(16,'2019-08-05 20:13:33','2019-08-05 20:13:33','buang sampah di?','Jalan','Tong sampah','danau','sungai','teman kita','B',7,1),(17,'2019-08-05 20:14:40','2019-08-05 20:14:40','makanlah kalau sudah?','kenyang','lapar','haus','kembung','A dan D benar','B',7,1),(18,'2019-08-05 20:15:10','2019-08-05 20:15:10','berkelahi adalah perbuatan?','kejam','baik','sopan','santun','semua salah','A',7,1),(19,'2019-08-05 20:15:50','2019-08-05 20:15:50','olahraga adalah perilaku yang?','tercela','jahat','kejam','sehat','sakit','D',7,1),(20,'2019-08-05 20:17:17','2019-08-05 20:17:17','sungai banyak sampah akan terjadi?','bersih','sehat','banjir','indah','semua salah','C',9,1),(21,'2019-08-05 20:18:24','2019-08-05 20:18:24','alpukat adalah?','hewan','tumbuhan','makhluk hidup','biji-bijian','buah','E',9,1),(22,'2019-08-05 20:19:50','2019-08-05 20:19:50','lawan kata adalah?','antonim','sinonim','a dan b benar','semua salah','musuh','A',9,1),(23,'2019-08-05 20:20:41','2019-08-05 20:20:41','orang rajin belajar akan?','pintar','bodoh','jahat','sombong','bersih','A',9,1),(24,'2019-08-05 20:21:14','2019-08-05 20:21:14','buah yang berduri?','nangka','alpukat','jeruk','durian','rambutan','D',9,1),(25,'2019-08-05 20:26:18','2019-08-05 20:26:18','budi menolong orang, budi anak yang?','jahat','kejam','baik','dengki','sombong','C',10,1),(26,'2019-08-05 20:29:08','2019-08-05 20:29:08','ria adalah?','sombong','baik','sehat','suka menolong','C dan D benar','A',10,1),(27,'2019-08-05 20:30:44','2019-08-05 20:30:44','Ibu sedang sakit, ia harus minum obat sesuai dengan ...... dokter','kemampuan','resep','larangan','kewajiban','tugas','B',10,1),(28,'2019-08-05 20:31:28','2019-08-05 20:31:28','Cerita komedi adalah cerita yang bisa membuat kita menjadi ....','takut','menangis','tertawa','murung','baik','C',10,1),(29,'2019-08-05 20:32:32','2019-08-05 20:32:32','Ayo! Mari kita selalu menjaga kebersihan!\r\nKalimat di atas termasuk ....','ajakan','perintah','pengumuman','larangan','informasi','A',10,1),(30,'2019-08-06 06:18:20','2019-08-06 06:18:20','siapa soekarno?','presiden RI','pengamen','pendekar','petarung','gamers','A',11,1),(31,'2019-08-06 06:20:35','2019-08-06 06:20:35','Provinsi Jambi dan Riau adalah pemekaran dari provinsi ...','jawa','kalimantan','sumatra','sulawesi','bali','C',11,1),(32,'2019-08-06 06:22:10','2019-08-06 06:22:10','Negara Indonesia adalah negara yang terletak di kawasan ....','Asia','timor-timor','amerika','kutub','autralia','A',11,1),(33,'2019-08-06 06:23:21','2019-08-06 06:23:21','Berikut ini adalah negara-negara tetangga Indonesia, kecuali ....','bali','singapure','malaysia','thailand','india','E',11,1),(34,'2019-08-06 06:25:09','2019-08-06 06:25:09','Titik tertinggi di indonesia terdapat di pegunungan ....','gunung slamet','gunung pangrango','gunung pulosari','gunung puncak wijaya','gunung rinjani','D',11,1),(35,'2019-09-01 05:01:24','2019-09-01 05:01:24','saya layak lulus atau tidak','tidak','bisa','lulus','ngulang','bisa tidak bisa iya','C',12,1);

/*Table structure for table `ujian_murid` */

DROP TABLE IF EXISTS `ujian_murid`;

CREATE TABLE `ujian_murid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `master_data_id` int(10) NOT NULL,
  `data_ujian_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `master_data_id` (`master_data_id`),
  KEY `data_ujian_id` (`data_ujian_id`),
  CONSTRAINT `ujian_murid_ibfk_1` FOREIGN KEY (`master_data_id`) REFERENCES `master_data` (`id`),
  CONSTRAINT `ujian_murid_ibfk_2` FOREIGN KEY (`data_ujian_id`) REFERENCES `data_ujian` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `ujian_murid` */

insert  into `ujian_murid`(`id`,`created_at`,`updated_at`,`master_data_id`,`data_ujian_id`) values (1,'2019-07-27 17:48:14','2019-07-27 17:48:14',21,1),(5,'2019-07-27 17:51:50','2019-07-27 17:51:50',7,1),(6,'2019-07-29 13:07:48','2019-07-29 13:07:48',9,2),(7,'2019-08-05 20:33:42','2019-08-05 20:33:42',19,9),(8,'2019-08-05 20:34:16','2019-08-05 20:34:16',19,7),(9,'2019-08-05 20:34:43','2019-08-05 20:34:43',19,10),(10,'2019-08-06 06:26:00','2019-08-06 06:26:00',19,11),(11,'2019-08-06 16:16:19','2019-08-06 16:16:19',20,11),(13,'2019-08-20 10:35:30','2019-08-20 10:35:30',10,11),(16,'2019-09-01 05:04:15','2019-09-01 05:04:15',21,12);

/*Table structure for table `ujian_murid_detail` */

DROP TABLE IF EXISTS `ujian_murid_detail`;

CREATE TABLE `ujian_murid_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `jawaban` char(1) NOT NULL,
  `nilai_benar_persoal` int(10) NOT NULL,
  `ujian_murid_id` int(10) NOT NULL,
  `soal_ujian_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ujian_murid_id` (`ujian_murid_id`),
  KEY `soal_ujian_id` (`soal_ujian_id`),
  CONSTRAINT `ujian_murid_detail_ibfk_1` FOREIGN KEY (`ujian_murid_id`) REFERENCES `ujian_murid` (`id`),
  CONSTRAINT `ujian_murid_detail_ibfk_2` FOREIGN KEY (`soal_ujian_id`) REFERENCES `soal_ujian` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

/*Data for the table `ujian_murid_detail` */

insert  into `ujian_murid_detail`(`id`,`created_at`,`updated_at`,`jawaban`,`nilai_benar_persoal`,`ujian_murid_id`,`soal_ujian_id`) values (1,'2019-07-27 17:48:14','2019-07-27 17:48:14','B',10,1,1),(2,'2019-07-27 17:48:14','2019-07-27 17:48:14','A',10,1,5),(3,'2019-07-27 17:48:14','2019-07-27 17:48:14','C',10,1,6),(4,'2019-07-27 17:48:14','2019-07-27 17:48:14','E',0,1,7),(5,'2019-07-27 17:48:14','2019-07-27 17:48:14','B',0,1,14),(17,'2019-07-27 17:51:51','2019-07-27 17:51:51','B',10,5,1),(18,'2019-07-27 17:51:51','2019-07-27 17:51:51','A',10,5,5),(19,'2019-07-27 17:51:51','2019-07-27 17:51:51','C',10,5,6),(20,'2019-07-27 17:51:51','2019-07-27 17:51:51','D',10,5,7),(21,'2019-07-27 17:51:51','2019-07-27 17:51:51','E',10,5,14),(22,'2019-07-29 13:07:48','2019-07-29 13:07:48','B',0,6,9),(23,'2019-07-29 13:07:48','2019-07-29 13:07:48','B',10,6,10),(24,'2019-07-29 13:07:48','2019-07-29 13:07:48','A',10,6,11),(25,'2019-07-29 13:07:48','2019-07-29 13:07:48','C',10,6,12),(26,'2019-07-29 13:07:48','2019-07-29 13:07:48','C',10,6,13),(27,'2019-08-05 20:33:42','2019-08-05 20:33:42','C',10,7,20),(28,'2019-08-05 20:33:42','2019-08-05 20:33:42','E',10,7,21),(29,'2019-08-05 20:33:42','2019-08-05 20:33:42','A',10,7,22),(30,'2019-08-05 20:33:42','2019-08-05 20:33:42','D',0,7,23),(31,'2019-08-05 20:33:42','2019-08-05 20:33:42','D',10,7,24),(32,'2019-08-05 20:34:16','2019-08-05 20:34:16','B',10,8,15),(33,'2019-08-05 20:34:16','2019-08-05 20:34:16','B',10,8,16),(34,'2019-08-05 20:34:16','2019-08-05 20:34:16','B',10,8,17),(35,'2019-08-05 20:34:16','2019-08-05 20:34:16','B',0,8,18),(36,'2019-08-05 20:34:16','2019-08-05 20:34:16','D',10,8,19),(37,'2019-08-05 20:34:43','2019-08-05 20:34:43','C',10,9,25),(38,'2019-08-05 20:34:43','2019-08-05 20:34:43','A',10,9,26),(39,'2019-08-05 20:34:43','2019-08-05 20:34:43','B',10,9,27),(40,'2019-08-05 20:34:43','2019-08-05 20:34:43','C',10,9,28),(41,'2019-08-05 20:34:43','2019-08-05 20:34:43','A',10,9,29),(42,'2019-08-06 06:26:00','2019-08-06 06:26:00','A',10,10,30),(43,'2019-08-06 06:26:00','2019-08-06 06:26:00','C',10,10,31),(44,'2019-08-06 06:26:00','2019-08-06 06:26:00','A',10,10,32),(45,'2019-08-06 06:26:00','2019-08-06 06:26:00','E',10,10,33),(46,'2019-08-06 06:26:00','2019-08-06 06:26:00','D',10,10,34),(47,'2019-08-06 16:16:19','2019-08-06 16:16:19','A',10,11,30),(48,'2019-08-06 16:16:19','2019-08-06 16:16:19','C',10,11,31),(49,'2019-08-06 16:16:19','2019-08-06 16:16:19','B',0,11,32),(50,'2019-08-06 16:16:19','2019-08-06 16:16:19','E',10,11,33),(51,'2019-08-06 16:16:19','2019-08-06 16:16:19','D',10,11,34),(53,'2019-08-20 10:35:30','2019-08-20 10:35:30','A',10,13,30),(54,'2019-08-20 10:35:30','2019-08-20 10:35:30','D',0,13,31),(55,'2019-08-20 10:35:30','2019-08-20 10:35:30','A',10,13,32),(56,'2019-08-20 10:35:30','2019-08-20 10:35:30','E',10,13,33),(57,'2019-08-20 10:35:30','2019-08-20 10:35:30','D',10,13,34),(68,'2019-09-01 05:04:15','2019-09-01 05:04:15','C',10,16,35);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'adimulya','adimulya02@gmail.com',NULL,'$2y$10$s5tHioCBTRGv2pwqB7x5Tu2DTurOOYIWY8uq2L0rGv1QsKUejz0uS',NULL,'2019-05-06 15:13:10','2019-05-06 15:13:10'),(2,'mulmul','adilovers77@gmail.com',NULL,'$2y$10$RknodErM/G8GAJAql6x12uH1AqujRTb801c5xbZwFZTQ3XvlD9MBq',NULL,'2019-05-06 15:17:10','2019-05-06 15:17:10');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
