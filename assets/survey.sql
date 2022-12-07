/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.36-MariaDB : Database - survey_kpl
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `document` */

CREATE TABLE `document` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_kepala` int(11) DEFAULT NULL,
  `nama_file` varchar(256) DEFAULT NULL,
  `file` text,
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

/*Data for the table `document` */

insert  into `document`(`id_file`,`id_user`,`id_kepala`,`nama_file`,`file`) values (17,22,12,'ini ganti','AbtrakdanInterface3.pdf');
insert  into `document`(`id_file`,`id_user`,`id_kepala`,`nama_file`,`file`) values (32,22,12,'nananna','ppt presentasi rabu (1).pptx');
insert  into `document`(`id_file`,`id_user`,`id_kepala`,`nama_file`,`file`) values (33,23,12,'Laporan akhir','AbtrakdanInterface5.pdf');

/*Table structure for table `guru` */

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `nip` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `jabatan` varchar(256) DEFAULT NULL,
  `foto` text,
  `jenis_kelamin` varchar(256) DEFAULT NULL,
  `note1` varchar(256) DEFAULT NULL,
  `note2` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `guru` */

insert  into `guru`(`id_guru`,`id_sekolah`,`nip`,`nama`,`telp`,`email`,`jabatan`,`foto`,`jenis_kelamin`,`note1`,`note2`) values (9,6,'123','Pak Guru','08987654321','pakguru@gmail.com','guru','kisspng-avatar-education-professor-user-profile-faculty-boss-5abcab3d918a17_21409156152231404559616.png','Laki-laki',NULL,NULL);
insert  into `guru`(`id_guru`,`id_sekolah`,`nip`,`nama`,`telp`,`email`,`jabatan`,`foto`,`jenis_kelamin`,`note1`,`note2`) values (10,6,'456','Bu Guru','08123456789','buguru@gmail.com','guru','kisspng-computer-icons-user-profile-avatar-profile-transparent-png-5ab03f3e24df49_00541654152149996615112.png','Perempuan',NULL,NULL);
insert  into `guru`(`id_guru`,`id_sekolah`,`nip`,`nama`,`telp`,`email`,`jabatan`,`foto`,`jenis_kelamin`,`note1`,`note2`) values (11,5,'789','Pak Guru Smk','08234567890','pakgurusmk@gmail.com','guru','User-icon8.png','Laki-laki',NULL,NULL);
insert  into `guru`(`id_guru`,`id_sekolah`,`nip`,`nama`,`telp`,`email`,`jabatan`,`foto`,`jenis_kelamin`,`note1`,`note2`) values (12,5,'901','Bu Guru smk','08234567890','bugurusmk@gmail.com','guru','wanita.jpg','Perempuan',NULL,NULL);
insert  into `guru`(`id_guru`,`id_sekolah`,`nip`,`nama`,`telp`,`email`,`jabatan`,`foto`,`jenis_kelamin`,`note1`,`note2`) values (13,6,'098','Admin SMA','08357826722','adminsma@gmail.com','guru','kisspng-avatar-education-professor-user-profile-faculty-boss-5abcab3d918a17_21409156152231404559617.png','Laki-laki',NULL,NULL);
insert  into `guru`(`id_guru`,`id_sekolah`,`nip`,`nama`,`telp`,`email`,`jabatan`,`foto`,`jenis_kelamin`,`note1`,`note2`) values (14,5,'765','Admin SMK','08123456778','adminsmk@gmail.com','guru','kisspng-computer-icons-google-account-user-profile-iconfin-png-icons-download-profile-5ab0301e32cb90_17773802152149609420811.png','Laki-laki',NULL,NULL);
insert  into `guru`(`id_guru`,`id_sekolah`,`nip`,`nama`,`telp`,`email`,`jabatan`,`foto`,`jenis_kelamin`,`note1`,`note2`) values (15,7,'432','Bu Guru','087654321','buguru@gmail.com','guru','wanita1.jpg','Perempuan',NULL,NULL);
insert  into `guru`(`id_guru`,`id_sekolah`,`nip`,`nama`,`telp`,`email`,`jabatan`,`foto`,`jenis_kelamin`,`note1`,`note2`) values (16,8,'007','develop','987654323456','develop','guru','logo1.png','Laki-laki',NULL,NULL);

/*Table structure for table `histori` */

CREATE TABLE `histori` (
  `id_histori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_quiz` varchar(256) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_histori`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `histori` */

insert  into `histori`(`id_histori`,`nama_quiz`,`tanggal`) values (13,'Kuis Rutin','2022-07-28');
insert  into `histori`(`id_histori`,`nama_quiz`,`tanggal`) values (14,'Kuis Akhir Tahun','2022-07-29');
insert  into `histori`(`id_histori`,`nama_quiz`,`tanggal`) values (15,'Kuis Bulanan','2022-07-28');

/*Table structure for table `jawaban` */

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_kepala` int(11) DEFAULT NULL,
  `id_quiz` int(11) DEFAULT NULL,
  `jawab` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_jawaban`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jawaban` */

insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (68,27,12,34,'1');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (69,28,12,28,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (70,28,12,32,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (71,28,12,33,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (72,26,12,28,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (73,26,12,32,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (74,26,12,33,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (75,26,14,28,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (76,26,14,32,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (77,26,14,33,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (78,26,14,34,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (79,26,14,30,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (80,26,14,31,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (81,29,13,34,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (82,29,13,28,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (83,29,13,32,'2');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (84,29,13,33,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (85,29,13,30,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (86,29,13,31,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (87,30,13,34,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (88,30,13,28,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (89,30,13,32,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (90,30,13,33,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (91,30,13,30,'4');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (92,30,13,31,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (93,26,14,34,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (94,27,12,34,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (95,27,12,30,'3');
insert  into `jawaban`(`id_jawaban`,`id_user`,`id_kepala`,`id_quiz`,`jawab`) values (96,27,12,31,'3');

/*Table structure for table `kepala_sekolah` */

CREATE TABLE `kepala_sekolah` (
  `id_kepala` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `nama_kepala` varchar(256) DEFAULT NULL,
  `nip` varchar(256) DEFAULT NULL,
  `foto` text,
  `periode_awal` date DEFAULT NULL,
  `periode_akhir` date DEFAULT NULL,
  `id_status` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_kepala`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kepala_sekolah` */

insert  into `kepala_sekolah`(`id_kepala`,`id_sekolah`,`nama_kepala`,`nip`,`foto`,`periode_awal`,`periode_akhir`,`id_status`) values (12,6,'Pak Kepala SMA','234','User-icon9.png','2022-06-30','2022-08-02','1');
insert  into `kepala_sekolah`(`id_kepala`,`id_sekolah`,`nama_kepala`,`nip`,`foto`,`periode_awal`,`periode_akhir`,`id_status`) values (13,5,'Pak Kepala SMK','345','kisspng-computer-icons-google-account-user-profile-iconfin-png-icons-download-profile-5ab0301e32cb90_1777380215214960942081.png','2022-06-30','2022-06-29','1');
insert  into `kepala_sekolah`(`id_kepala`,`id_sekolah`,`nama_kepala`,`nip`,`foto`,`periode_awal`,`periode_akhir`,`id_status`) values (14,7,'Kepala SMP','67888','User-icon10.png','2022-07-08','2022-08-04','1');
insert  into `kepala_sekolah`(`id_kepala`,`id_sekolah`,`nama_kepala`,`nip`,`foto`,`periode_awal`,`periode_akhir`,`id_status`) values (15,6,'Saviyours','123','User-icon11.png','2022-03-03','2022-05-05','2');

/*Table structure for table `opsi` */

CREATE TABLE `opsi` (
  `id_opsi` int(11) NOT NULL AUTO_INCREMENT,
  `opsi` varchar(500) DEFAULT NULL,
  `value` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_opsi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `opsi` */

insert  into `opsi`(`id_opsi`,`opsi`,`value`) values (2,'baik','3');
insert  into `opsi`(`id_opsi`,`opsi`,`value`) values (3,'cukup','2');
insert  into `opsi`(`id_opsi`,`opsi`,`value`) values (4,'kurang baik','1');
insert  into `opsi`(`id_opsi`,`opsi`,`value`) values (7,'sangat baik','4');

/*Table structure for table `pengguna` */

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) DEFAULT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id_user`,`id_group`,`id_sekolah`,`id_guru`,`username`,`password`,`is_active`) values (3,1,8,16,'dev','dev123',1);
insert  into `pengguna`(`id_user`,`id_group`,`id_sekolah`,`id_guru`,`username`,`password`,`is_active`) values (22,2,6,13,'admin sma','admin123',1);
insert  into `pengguna`(`id_user`,`id_group`,`id_sekolah`,`id_guru`,`username`,`password`,`is_active`) values (23,2,5,14,'admin smk','admin123',1);
insert  into `pengguna`(`id_user`,`id_group`,`id_sekolah`,`id_guru`,`username`,`password`,`is_active`) values (25,2,7,15,'admin smp','admin123',1);
insert  into `pengguna`(`id_user`,`id_group`,`id_sekolah`,`id_guru`,`username`,`password`,`is_active`) values (26,8,7,15,'guru smp','guru123',1);
insert  into `pengguna`(`id_user`,`id_group`,`id_sekolah`,`id_guru`,`username`,`password`,`is_active`) values (27,8,6,9,'guru','guru123',1);
insert  into `pengguna`(`id_user`,`id_group`,`id_sekolah`,`id_guru`,`username`,`password`,`is_active`) values (28,8,6,10,'guru 2','guru123',1);
insert  into `pengguna`(`id_user`,`id_group`,`id_sekolah`,`id_guru`,`username`,`password`,`is_active`) values (29,8,5,11,'gurusmk','guru123',1);
insert  into `pengguna`(`id_user`,`id_group`,`id_sekolah`,`id_guru`,`username`,`password`,`is_active`) values (30,8,5,12,'gurusmk2','guru123',1);

/*Table structure for table `quiz` */

CREATE TABLE `quiz` (
  `id_quiz` int(11) NOT NULL AUTO_INCREMENT,
  `quiz` varchar(500) DEFAULT NULL,
  `id_histori` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_quiz`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

/*Data for the table `quiz` */

insert  into `quiz`(`id_quiz`,`quiz`,`id_histori`) values (28,'Kepala sekolah meakukan evaluasi akhir tahun bersama Guru',14);
insert  into `quiz`(`id_quiz`,`quiz`,`id_histori`) values (30,'kepala sekolah memberikan hukuman dengan tegas kepada siapapun',13);
insert  into `quiz`(`id_quiz`,`quiz`,`id_histori`) values (31,'kepala sekolah selalu ikut berpartisipasi dalam kegiatan sekolah',13);
insert  into `quiz`(`id_quiz`,`quiz`,`id_histori`) values (32,'Kepala sekolah menyampaikan perkembangan apapun kepada guru',14);
insert  into `quiz`(`id_quiz`,`quiz`,`id_histori`) values (33,'Kepala Sekolah sering datang terlambat',14);
insert  into `quiz`(`id_quiz`,`quiz`,`id_histori`) values (34,'apakah kepala sekolah pernah telat selama satu bulan',15);

/*Table structure for table `sekolah` */

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(256) DEFAULT NULL,
  `alamat_sekolah` varchar(256) DEFAULT NULL,
  `email_sekolah` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `sekolah` */

insert  into `sekolah`(`id_sekolah`,`nama_sekolah`,`alamat_sekolah`,`email_sekolah`) values (5,'SMK N 1','                    jl smk 1','smkn1@gmail.co.id');
insert  into `sekolah`(`id_sekolah`,`nama_sekolah`,`alamat_sekolah`,`email_sekolah`) values (6,'SMA N 1','jl sma n 1','sman1@gmail.com');
insert  into `sekolah`(`id_sekolah`,`nama_sekolah`,`alamat_sekolah`,`email_sekolah`) values (7,'SMP 1','jl smp','smp@gmail.com');
insert  into `sekolah`(`id_sekolah`,`nama_sekolah`,`alamat_sekolah`,`email_sekolah`) values (8,'SUPER ADMIN','-','super@gimail.com');

/*Table structure for table `status` */

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_status` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `status` */

insert  into `status`(`id_status`,`jenis_status`) values (1,'Aktif');
insert  into `status`(`id_status`,`jenis_status`) values (2,'Non aktif');

/*Table structure for table `transaksi` */

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_histori` int(11) DEFAULT NULL,
  `hasil` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi` */

/*Table structure for table `user_group` */

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) DEFAULT NULL,
  `note` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `user_group` */

insert  into `user_group`(`id`,`group_name`,`note`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Super Admin','-',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');
insert  into `user_group`(`id`,`group_name`,`note`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'Admin','-',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');
insert  into `user_group`(`id`,`group_name`,`note`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,'Guru','-',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
