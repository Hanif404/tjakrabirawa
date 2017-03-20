-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "admin" ------------------------------------
CREATE TABLE `admin` ( 
	`id_admin` Int( 5 ) AUTO_INCREMENT NOT NULL,
	`username` VarChar( 25 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`password` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`email` VarChar( 25 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`level` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`foto` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`last_login` Timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY ( `id_admin` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- ---------------------------------------------------------


-- CREATE TABLE "agenda" -----------------------------------
CREATE TABLE `agenda` ( 
	`id_agenda` Int( 100 ) AUTO_INCREMENT NOT NULL,
	`start_date` Date NOT NULL DEFAULT '0000-00-00',
	`end_date` Date NOT NULL DEFAULT '0000-00-00',
	`nama_agenda` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`url_agenda` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`jadwal_kegiatan` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`file` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`create` DateTime NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY ( `id_agenda` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 7;
-- ---------------------------------------------------------


-- CREATE TABLE "album" ------------------------------------
CREATE TABLE `album` ( 
	`id_album` Int( 100 ) AUTO_INCREMENT NOT NULL,
	`judul_album` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`url_album` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`kategori` VarChar( 25 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`photo` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`deskripsi` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`create` DateTime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`modified` DateTime NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY ( `id_album` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "artikel" ----------------------------------
CREATE TABLE `artikel` ( 
	`id` Int( 100 ) AUTO_INCREMENT NOT NULL,
	`title` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`url` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`meta_keyword` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`meta_description` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`isi_berita` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`kategori` VarChar( 15 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`album_id` Int( 100 ) NOT NULL,
	`posisi` VarChar( 30 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`active` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'not_active',
	`author` VarChar( 30 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`photo` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`create` DateTime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`last_modified` DateTime NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 9;
-- ---------------------------------------------------------


-- CREATE TABLE "banner" -----------------------------------
CREATE TABLE `banner` ( 
	`id_banner` Int( 100 ) AUTO_INCREMENT NOT NULL,
	`title` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`url` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`image` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`create` DateTime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`last_modified` DateTime NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY ( `id_banner` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 13;
-- ---------------------------------------------------------


-- CREATE TABLE "ci_sessions" ------------------------------
CREATE TABLE `ci_sessions` ( 
	`session_id` VarChar( 40 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
	`ip_address` VarChar( 45 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
	`user_agent` VarChar( 120 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`last_activity` Int( 10 ) UNSIGNED NOT NULL DEFAULT '0',
	`user_data` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `session_id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB;
-- ---------------------------------------------------------


-- CREATE TABLE "download" ---------------------------------
CREATE TABLE `download` ( 
	`id_download` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`nama_file` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`file` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	`create` DateTime NULL,
	PRIMARY KEY ( `id_download` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = MyISAM
AUTO_INCREMENT = 7;
-- ---------------------------------------------------------


-- CREATE TABLE "galleri" ----------------------------------
CREATE TABLE `galleri` ( 
	`id_galleri` Int( 100 ) AUTO_INCREMENT NOT NULL,
	`album_id` Int( 100 ) NOT NULL,
	`jdl_gallery` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`url_galleri` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`keterangan` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`gbr_gallery` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`created` DateTime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`modified` DateTime NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY ( `id_galleri` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 18;
-- ---------------------------------------------------------


-- CREATE TABLE "layanan" ----------------------------------
CREATE TABLE `layanan` ( 
	`id_layanan` Int( 100 ) AUTO_INCREMENT NOT NULL,
	`title_layanan` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`url_layanan` VarChar( 200 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`meta_keyword` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`meta_description` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`deskripsi` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`photo` VarChar( 200 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`create` DateTime NOT NULL,
	PRIMARY KEY ( `id_layanan` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 7;
-- ---------------------------------------------------------


-- CREATE TABLE "menu_website" -----------------------------
CREATE TABLE `menu_website` ( 
	`id_menu` Int( 10 ) AUTO_INCREMENT NOT NULL,
	`parent_id` Int( 10 ) NOT NULL,
	`menu` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`menu_order` VarChar( 4 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'asc',
	`isi_menu` VarChar( 40 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id_menu` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 45;
-- ---------------------------------------------------------


-- CREATE TABLE "message" ----------------------------------
CREATE TABLE `message` ( 
	`id` Int( 100 ) AUTO_INCREMENT NOT NULL,
	`subtitle` VarChar( 35 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`email` VarChar( 35 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`keterangan` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`create` DateTime NOT NULL,
	`subject` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 19;
-- ---------------------------------------------------------


-- CREATE TABLE "page_static" ------------------------------
CREATE TABLE `page_static` ( 
	`id_pages` Int( 100 ) AUTO_INCREMENT NOT NULL,
	`title_pages` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`url_pages` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`isi_pages` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`gambar` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`menu_id` Int( 100 ) NOT NULL,
	`active_page` VarChar( 10 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`create` DateTime NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY ( `id_pages` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 22;
-- ---------------------------------------------------------


-- CREATE TABLE "regulasi" ---------------------------------
CREATE TABLE `regulasi` ( 
	`id_regulasi` Int( 100 ) AUTO_INCREMENT NOT NULL,
	`title_regulasi` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`url_regulasi` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`meta_keyword` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`meta_description` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`kategori` VarChar( 40 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`deskripsi` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`photo` VarChar( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`create` DateTime NOT NULL,
	PRIMARY KEY ( `id_regulasi` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- ---------------------------------------------------------


-- CREATE TABLE "sys_traffic" ------------------------------
CREATE TABLE `sys_traffic` ( 
	`Tanggal` Date NOT NULL,
	`ipAddress` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`Jumlah` Int( 10 ) NOT NULL,
	PRIMARY KEY ( `Tanggal` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = MyISAM;
-- ---------------------------------------------------------


-- CREATE TABLE "themes" -----------------------------------
CREATE TABLE `themes` ( 
	`id` Int( 10 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 35 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`slug` VarChar( 30 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`style` VarChar( 30 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`is_used` TinyInt( 1 ) NOT NULL,
	`created` Timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- ---------------------------------------------------------


-- Dump data of "admin" ------------------------------------
INSERT INTO `admin`(`id_admin`,`username`,`password`,`email`,`level`,`foto`,`last_login`) VALUES ( '1', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin@sukabumi.go.id', 'admin', 'f3a39c54a5dc4aad9a0d729641c8aedb.jpg', '0000-00-00 00:00:00' );
INSERT INTO `admin`(`id_admin`,`username`,`password`,`email`,`level`,`foto`,`last_login`) VALUES ( '2', 'user', '12dea96fec20593566ab75692c9949596833adc9', 'user@gmail.com', 'user', '', '2016-02-08 15:45:47' );
INSERT INTO `admin`(`id_admin`,`username`,`password`,`email`,`level`,`foto`,`last_login`) VALUES ( '3', 'test', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'test@test.com', 'user', 'f3a39c54a5dc4aad9a0d729641c8aedb.jpg', '2017-03-05 15:54:45' );
-- ---------------------------------------------------------


-- Dump data of "agenda" -----------------------------------
INSERT INTO `agenda`(`id_agenda`,`start_date`,`end_date`,`nama_agenda`,`url_agenda`,`jadwal_kegiatan`,`file`,`create`) VALUES ( '3', '2016-02-10', '2016-02-12', 'Rapat Koordinasi Teknis Nasional I Tahun 2016', 'rapat-koordinasi-teknis-nasional-i-tahun-2016', '<p>
 Rapat Koordinasi Teknis Nasional I Tahun 2016</p>
<p>
 Tempat : Yogyakarta</p>
', '3a77a183a6e76ad63dedc32afe1e10d9.pdf', '2016-12-01 19:30:54' );
INSERT INTO `agenda`(`id_agenda`,`start_date`,`end_date`,`nama_agenda`,`url_agenda`,`jadwal_kegiatan`,`file`,`create`) VALUES ( '4', '2016-06-01', '2016-06-02', 'Hari Susu Nusantara', 'hari-susu-nusantara', '<p>
 Hari Susu Nusantara</p>
<p>
 Tempat : Malang</p>
', '', '2016-08-23 14:09:19' );
INSERT INTO `agenda`(`id_agenda`,`start_date`,`end_date`,`nama_agenda`,`url_agenda`,`jadwal_kegiatan`,`file`,`create`) VALUES ( '6', '2016-12-13', '2016-12-15', 'tes lagi aja', 'tes-lagi-aja', '<p>
 tes lagi</p>
', '7ddd3136cd9f9b96cad3c12ee27bc5a1.zip', '2016-12-01 17:55:12' );
-- ---------------------------------------------------------


-- Dump data of "album" ------------------------------------
-- ---------------------------------------------------------


-- Dump data of "artikel" ----------------------------------
INSERT INTO `artikel`(`id`,`title`,`url`,`meta_keyword`,`meta_description`,`isi_berita`,`kategori`,`album_id`,`posisi`,`active`,`author`,`photo`,`create`,`last_modified`) VALUES ( '1', 'test-aja', 'test-aja', 'test-aja', 'test-aja', '<p>
 >>index.php> >In >index.php> file, the posts are listed with the pagination links when the Post controller loaded. Ajax pagination uses jQuery, so jQuery library (>jquery.min.js>) should need to be included. You can see only >create_links()> function is needed to call (>$this->ajax_pagination->create_links()>) from Pagination library to display the pagination links.> >Div with >loading> class is used to display a loader while data loading. If you wish to change the selector, set the loading selector with the pagination configuration options.</p>
', 'news', '0', 'headline', 'active', '1', '441628ce4ee2e74944e7dd4a76e0127d.jpg', '2017-03-05 18:08:09', '2017-03-05 18:10:41' );
INSERT INTO `artikel`(`id`,`title`,`url`,`meta_keyword`,`meta_description`,`isi_berita`,`kategori`,`album_id`,`posisi`,`active`,`author`,`photo`,`create`,`last_modified`) VALUES ( '2', 'test-aja', 'test-aja', 'test-aja', 'test-aja', '<p>
 &gt;This dumps data to a php file whose filename is in the format: log-[Y-m-d H:i:s] or whatever value is set on log_date_format key configuration defined on your config file. For as long as you don&#39;t get to log/dump sensitive data, it should be pretty safe. This file is relative to an index.html page by default so obviously generated php files wouldn&#39;t be publicly accessible- but you&#39;ll never know. Make sure to have all of this precautions in place if you change the default application/logs directory.</p>
', 'news', '0', 'headline', 'active', '1', 'e2bd8e20103cfa74a1d5c65800065a17.jpg', '2017-03-05 16:24:12', '2017-03-05 18:09:05' );
INSERT INTO `artikel`(`id`,`title`,`url`,`meta_keyword`,`meta_description`,`isi_berita`,`kategori`,`album_id`,`posisi`,`active`,`author`,`photo`,`create`,`last_modified`) VALUES ( '4', 'testgdfhdfeteww', 'testgdfhdfeteww', 'testgdfhdfeteww', 'testgdfhdfeteww', '<p>
 >The pagination library helps to generate pagination links and jQuery &amp; Ajax code. This library makes ajax pagination simple for you. You only need to set configuration options and call the&nbsp;</span>>create_links()</code>>&nbsp;function. We&rsquo;ve copied the CodeIgniter&rsquo;s system pagination library, renamed the class to&nbsp;</span>>Ajax_pagination</code>>, modified and added code for extending Pagination library with Ajax Pagination functionality. Create a file called&nbsp;</span>>Ajax_pagination.php</code>>, copy &amp; paste the below code and insert this file into the&nbsp;</span>>application/libraries</code>>&nbsp;folder.</span></p>
', 'news', '0', '0', 'active', '1', '5286a80bddb296e67193d9f1a46b69db.jpg', '2017-03-05 17:18:03', '2017-03-05 17:18:03' );
INSERT INTO `artikel`(`id`,`title`,`url`,`meta_keyword`,`meta_description`,`isi_berita`,`kategori`,`album_id`,`posisi`,`active`,`author`,`photo`,`create`,`last_modified`) VALUES ( '5', 'hjhfhdghdrejgkghf', 'hjhfhdghdrejgkghf', 'hjhfhdghdrejgkghf', 'hjhfhdghdrejgkghf', '<p>
 &gt; For better understanding, we&rsquo;ll build an example script. In the example code, data will be fetched from the database table and display in the view page with pagination links. Once the pagination link is clicked, more data would be fetched from the database and display instead of previously displayed data. Also, a loader image would appear at the time of data loading.</p>
<p>
 &nbsp;</p>
<p>
 &gt; Before you begin, take a look at the folders and files structure of the example script.</p>', 'news', '0', 'headline', 'active', '1', '0edf53364e912da089d83c49d1bf4085.jpg', '2017-03-05 17:52:45', '2017-03-05 17:18:37' );
INSERT INTO `artikel`(`id`,`title`,`url`,`meta_keyword`,`meta_description`,`isi_berita`,`kategori`,`album_id`,`posisi`,`active`,`author`,`photo`,`create`,`last_modified`) VALUES ( '6', 'tejdfssaasweweq', 'tejdfssaasweweq', 'tejdfssaasweweq', 'tejdfssaasweweq', '<p>
 &gt; CodeIgniter have the pagination library by default. But many times we are needed to implement the ajax based pagination in CodeIgniter. Because ajax pagination provides better user experience. Today we will discuss how to create ajax pagination in CodeIgniter framework.</p>
<p>
 &nbsp;</p>
<p>
 &gt; We&rsquo;ll modify the CodeIgniter&rsquo;s Pagination library for integrating ajax pagination in CodeIgniter application. Also, this modified Ajax Pagination library provides many customization options for you, some options are given below.</p>
', 'news', '0', 'headline', 'active', '1', 'deb538f03094b4213569ace30ec3bc05.jpg', '2017-03-05 17:19:14', '2017-03-06 11:00:25' );
INSERT INTO `artikel`(`id`,`title`,`url`,`meta_keyword`,`meta_description`,`isi_berita`,`kategori`,`album_id`,`posisi`,`active`,`author`,`photo`,`create`,`last_modified`) VALUES ( '7', 'testes', 'testes', 'testes', 'testes', '<p>
 testeststeststedasdadadad</p>
<p>
 dadadas</p>
', 'news', '0', 'headline', 'active', '1', 'fa3866fcce0769d2d47c7ace7107f4ad.png', '2017-03-21 06:02:18', '2017-03-21 06:14:21' );
-- ---------------------------------------------------------


-- Dump data of "banner" -----------------------------------
INSERT INTO `banner`(`id_banner`,`title`,`url`,`image`,`create`,`last_modified`) VALUES ( '12', 'test', 'https://www.google.com', '', '2016-09-06 17:33:36', '0000-00-00 00:00:00' );
-- ---------------------------------------------------------


-- Dump data of "ci_sessions" ------------------------------
INSERT INTO `ci_sessions`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) VALUES ( 'af6e784f418c86a7aa0009307651a79f', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/56.0.2924.76 Chrome/56.0.2924.76 ', '1490052385', 'a:6:{s:9:"user_data";s:0:"";s:8:"USERNAME";s:5:"admin";s:5:"EMAIL";s:20:"admin@sukabumi.go.id";s:5:"LEVEL";s:5:"admin";s:8:"ADMIN_ID";s:1:"1";s:10:"SESS_ADMIN";b:1;}' );
-- ---------------------------------------------------------


-- Dump data of "download" ---------------------------------
INSERT INTO `download`(`id_download`,`nama_file`,`file`,`create`) VALUES ( '5', 'Perda Tentang Pembangunan Jangka Panjang Daerah', 'PERDA_tentang_Pembangunan_Jangka_Panjang_Daerah.pdf', '2017-01-26 12:39:26' );
INSERT INTO `download`(`id_download`,`nama_file`,`file`,`create`) VALUES ( '6', 'Perda Tentang Pajak Parkir', 'PERATURAN-DAERAH-KOTA-SUKABUMI-TENTANG-PAJAK-PARKIR.pdf', '2017-01-26 12:39:41' );
-- ---------------------------------------------------------


-- Dump data of "galleri" ----------------------------------
INSERT INTO `galleri`(`id_galleri`,`album_id`,`jdl_gallery`,`url_galleri`,`keterangan`,`gbr_gallery`,`created`,`modified`) VALUES ( '17', '10', 'Sapi Pesisir', 'sapi-pesisir', '<p>
 Sapi pesisir merupakan salah satu rumpun sapi lokal Indonesia yang mempunyai sebaran asli geografis di Provinsi Sumatera Barat, dan telah ditetapkan melalui Keputusan Menteri Pertanian Nomor 2908/Kpts/OT.140/6/2011 tanggal 17 Juni 2011.<br />
 <br />
 Sapi pesisir mempunyai ciri khas yang tidak dimiliki oleh sapi dari bangsa lainnnya dan merupakan sumber daya genetik ternak Indonesia yang perlu dijaga dan dipelihara kelestariannya sehingga dapat memberikan manfaat dalam peningkatan kesejahteraan dan kemakmuran rakyat Indonesia.<br />
 &nbsp;</p>', '479800c4357783ba9059e003dd872845.jpg', '2016-08-23 14:45:52', '2016-08-23 14:50:07' );
-- ---------------------------------------------------------


-- Dump data of "layanan" ----------------------------------
INSERT INTO `layanan`(`id_layanan`,`title_layanan`,`url_layanan`,`meta_keyword`,`meta_description`,`deskripsi`,`photo`,`create`) VALUES ( '1', 'webdesign', 'webdesign', 'webdesign', 'webdesign', '<p>test layanan</p>
', 'd26f0f66ecb133644e7fe45b2bc4d02d.jpg', '2016-02-08 16:20:46' );
INSERT INTO `layanan`(`id_layanan`,`title_layanan`,`url_layanan`,`meta_keyword`,`meta_description`,`deskripsi`,`photo`,`create`) VALUES ( '2', 'ux design', 'ux-design', 'ux-design', 'ux-design', '<p>test layanan ke dua</p>
', '875be60f2bbd456c36e2d16f2ce3247d.jpg', '2016-02-08 16:22:41' );
INSERT INTO `layanan`(`id_layanan`,`title_layanan`,`url_layanan`,`meta_keyword`,`meta_description`,`deskripsi`,`photo`,`create`) VALUES ( '3', 'motion design', 'motion-design', 'motion-design', 'motion-design', '<p>test layanan ke tiga edit 2</p>
', '2e04c9242a7aa1f4795f060b7a4647bc.jpg', '2016-02-08 16:24:00' );
INSERT INTO `layanan`(`id_layanan`,`title_layanan`,`url_layanan`,`meta_keyword`,`meta_description`,`deskripsi`,`photo`,`create`) VALUES ( '4', 'graphic design', 'graphic-design', 'graphic-design', 'graphic-design', '<p>test layanan</p>
', 'd57d3e514d0753a5715998498e45512d.jpg', '2016-02-08 17:21:26' );
INSERT INTO `layanan`(`id_layanan`,`title_layanan`,`url_layanan`,`meta_keyword`,`meta_description`,`deskripsi`,`photo`,`create`) VALUES ( '5', 'app design', 'app-design', 'app-design', 'app-design', '', '', '2017-03-05 12:30:23' );
INSERT INTO `layanan`(`id_layanan`,`title_layanan`,`url_layanan`,`meta_keyword`,`meta_description`,`deskripsi`,`photo`,`create`) VALUES ( '6', 'marketing', 'marketing', 'marketing', 'marketing', '', '', '2017-03-05 18:51:48' );
-- ---------------------------------------------------------


-- Dump data of "menu_website" -----------------------------
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '27', '0', 'profil.html', 'asc', 'Profil' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '28', '0', 'kelembagaan.html', 'asc', 'Kelembagaan' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '29', '0', '#', 'asc', 'Aplikasi' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '31', '0', '#', 'asc', 'Informasi Publik' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '32', '31', 'laporan-kinerja.html', 'asc', 'Laporan Kinerja' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '33', '29', '#', 'asc', 'Pelayanan Rekomendasi' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '34', '28', 'sekretariat-direktorat-jenderal.html', 'asc', 'Sekretariat Direktorat Jenderal' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '35', '28', '#', 'asc', 'Direktorat Perbibitan dan Produksi Terna' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '36', '28', '#', 'asc', 'Direktorat Pakan' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '37', '28', '#', 'asc', 'Direktorat Kesehatan Hewan' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '39', '28', '#tes', 'asc', 'Direktorat Pengolahan dan Pemasaran Hasi' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '40', '31', 'laporan-tahunan.html', 'asc', 'Laporan Tahunan' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '41', '31', 'laporan-keuangan.html', 'asc', 'Laporan Keuangan' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '42', '31', 'dipa.html', 'asc', 'DIPA' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '43', '31', 'renstra.html', 'asc', 'Renstra' );
INSERT INTO `menu_website`(`id_menu`,`parent_id`,`menu`,`menu_order`,`isi_menu`) VALUES ( '44', '29', 'pelayanan-rekomendasi.html', 'asc', 'Pelayanan Rekomendasi' );
-- ---------------------------------------------------------


-- Dump data of "message" ----------------------------------
INSERT INTO `message`(`id`,`subtitle`,`email`,`keterangan`,`create`,`subject`) VALUES ( '16', 'test', 'test@test.com', 'Messtesttstsage', '2017-03-06 06:31:57', 'test' );
INSERT INTO `message`(`id`,`subtitle`,`email`,`keterangan`,`create`,`subject`) VALUES ( '17', 'test', 'test@test.com', 'Messtststsage', '2017-03-06 06:34:36', 'test' );
INSERT INTO `message`(`id`,`subtitle`,`email`,`keterangan`,`create`,`subject`) VALUES ( '18', 'test', 'test@test.com', 'Metsetstsssage', '2017-03-06 06:37:37', 'test' );
-- ---------------------------------------------------------


-- Dump data of "page_static" ------------------------------
INSERT INTO `page_static`(`id_pages`,`title_pages`,`url_pages`,`isi_pages`,`gambar`,`menu_id`,`active_page`,`create`) VALUES ( '10', 'Profil', 'profil', '<div id="cke_pastebin">
 Direktorat Jenderal Peternakan dan Kesehatan Hewan merupakan organisasi Unit Eselon I lingkup Kementerian Pertanian yang sebelumnya bernama Direktorat Jenderal Peternakan. Berdasarkan Peraturan Menteri Pertanian Nomor 43/Permentan/OT.010/8/2015 tentang Organisasi dan Tata Kerja Kementerian Pertanian disebutkan bahwa Kementerian Pertanian mempunyai tugas menyelenggarakan urusan di bidang pertanian dalam pemerintahan yang dalam pelaksanaan tugasnya mencakup fungsi perumusan, penetapan, dan pelaksanaan kebijakan di bidang pertanian.</div>
<div id="cke_pastebin">
 &nbsp;</div>
<div id="cke_pastebin">
 Untuk menjaga kontinuitas dan konsistensi program Direktorat Jenderal Peternakan dan Kesehatan Hewan, sekaligus menjaga fokus sasaran yang akan dicapai diperlukan Renstra yang terdiri dari Visi, Misi, Kebijakan dan Program untuk dilaksanakan dalam periode tertentu.</div>', '1387d1b82fa71bcd1194b2d9023ffd1f.jpg', '27', 'on', '0000-00-00 00:00:00' );
INSERT INTO `page_static`(`id_pages`,`title_pages`,`url_pages`,`isi_pages`,`gambar`,`menu_id`,`active_page`,`create`) VALUES ( '11', 'Kelembagaan', 'kelembagaan', '<p>
 &nbsp;</p>
<p>
 &lt;p justify;&quot;=&quot;&quot;&gt;Direktorat Jenderal Peternakan dan Kesehatan Hewan merupakan organisasi Unit Eselon I lingkup Kementerian Pertanian yang sebelumnya bernama Direktorat Jenderal Peternakan. Berdasarkan Peraturan Menteri Pertanian Nomor 43/Permentan/OT.010/8/2015 tentang Organisasi dan Tata Kerja Kementerian Pertanian disebutkan bahwa Kementerian Pertanian mempunyai tugas menyelenggarakan urusan di bidang pertanian dalam pemerintahan yang dalam pelaksanaan tugasnya mencakup fungsi perumusan, penetapan, dan pelaksanaan kebijakan di bidang pertanian.</p>', '', '28', 'on', '0000-00-00 00:00:00' );
INSERT INTO `page_static`(`id_pages`,`title_pages`,`url_pages`,`isi_pages`,`gambar`,`menu_id`,`active_page`,`create`) VALUES ( '14', 'Laporan Kinerja', 'laporan-kinerja', '<p>
 Laporan Kinerja</p>', '', '32', 'on', '0000-00-00 00:00:00' );
INSERT INTO `page_static`(`id_pages`,`title_pages`,`url_pages`,`isi_pages`,`gambar`,`menu_id`,`active_page`,`create`) VALUES ( '15', 'Laporan Tahunan', 'laporan-tahunan', '<p>
 Laporan Tahunan</p>', '', '40', 'on', '0000-00-00 00:00:00' );
INSERT INTO `page_static`(`id_pages`,`title_pages`,`url_pages`,`isi_pages`,`gambar`,`menu_id`,`active_page`,`create`) VALUES ( '16', 'Laporan Keuangan', 'laporan-keuangan', '<p>
 Laporan Keuangan</p>', '', '41', 'on', '0000-00-00 00:00:00' );
INSERT INTO `page_static`(`id_pages`,`title_pages`,`url_pages`,`isi_pages`,`gambar`,`menu_id`,`active_page`,`create`) VALUES ( '17', 'DIPA', 'dipa', '<p>
 DIPA</p>', '', '42', 'on', '0000-00-00 00:00:00' );
INSERT INTO `page_static`(`id_pages`,`title_pages`,`url_pages`,`isi_pages`,`gambar`,`menu_id`,`active_page`,`create`) VALUES ( '18', 'Renstra', 'renstra', '<p>
 Renstra</p>', '', '43', 'on', '0000-00-00 00:00:00' );
INSERT INTO `page_static`(`id_pages`,`title_pages`,`url_pages`,`isi_pages`,`gambar`,`menu_id`,`active_page`,`create`) VALUES ( '19', 'pelayanan-rekomendasi', 'pelayanan-rekomendasi', '<p>
 http://<a href="http://app.ditjennak.pertanian.go.id/simrek2" target="_blank">app.ditjennak.pertanian.go.id/simrek2</a></p>', '', '44', 'on', '0000-00-00 00:00:00' );
INSERT INTO `page_static`(`id_pages`,`title_pages`,`url_pages`,`isi_pages`,`gambar`,`menu_id`,`active_page`,`create`) VALUES ( '20', 'Sekretariat Direktorat Jenderal', 'sekretariat-direktorat-jenderal', '<p>
 <strong>Tugas</strong></p>
<p>
 Sekretariat Direktorat Jenderal mempunyai tugas memberikan pelayanan teknis dan administrasi kepada seluruh unit organisasi di lingkungan Direktorat Jenderal Peternakan dan Kesehatan Hewan.</p>
<p>
 <strong>Fungsi</strong></p>
<ol>
 <li>
  Koordinasi penyusunan rencana, program, anggaran, dan kerja sama serta pelaksanaan hubungan masyarakat dan informasi publik di bidang peternakan dan kesehatan hewan;</li>
 <li>
  Pengelolaan urusan keuangan dan perlengkapan;</li>
 <li>
  Evaluasi dan penyempurnaan organisasi, tata laksana, pengelolaan urusan kepegawaian, serta penyusunan rancangan peraturan perundang-undangan;</li>
 <li>
  Evaluasi dan pelaporan pelaksanaan kegiatan, serta pemberian layanan rekomendasi di bidang peternakan dan kesehatan hewan;</li>
 <li>
  Pelaksanaan urusan tata usaha dan rumah tangga direktorat jenderal peternakan dan kesehatan hewan; dan</li>
 <li>
  Pelaksanaan fungsi lain yang diberikan oleh direktur jenderal peternakan dan kesehatan hewan.</li>
</ol>', '', '34', 'on', '0000-00-00 00:00:00' );
INSERT INTO `page_static`(`id_pages`,`title_pages`,`url_pages`,`isi_pages`,`gambar`,`menu_id`,`active_page`,`create`) VALUES ( '21', 'tes', 'tes', '<p>
 tes</p>', '', '45', 'on', '0000-00-00 00:00:00' );
-- ---------------------------------------------------------


-- Dump data of "regulasi" ---------------------------------
INSERT INTO `regulasi`(`id_regulasi`,`title_regulasi`,`url_regulasi`,`meta_keyword`,`meta_description`,`kategori`,`deskripsi`,`photo`,`create`) VALUES ( '1', 'test regulasi edit', 'test-regulasi-edit', 'test-regulasi-edit', 'test-regulasi-edit', 'peraturan-pemerintah', '<p>
 <strong><em>Yogyakarta</em></strong><em>&nbsp;(20/08)</em>, Direktorat Jenderal Perkebunan sebagai badan publik di lingkungan Kementerian Pertanian, dalam rangka reformasi birokrasi menyadari bahwa keterbukaan informasi publik menjadi salah satu prasyarat menuju tata kelola kepemerintahan yang baik (<em>good governance</em>), transparan dan akuntabel,&nbsp; demikian disampaikan oleh Dirjen Perkebunan dalam arahan tertulisnya yang dibacakan oleh Any Widiastuti (Sekretaris Dinas Kehutanan dan Perkebunan Provinsi D.I. Yogyakarta) sekaligus menyampaikan ucapan selamat datang dan membuka secara resmi kegiatan Bimbingan Teknis Pengelolaan Informasi Publik Lingkup Ditjen Perkebunan Tahun 2015 yang dilaksanakan pada hari Kamis-Jumat, 20-21 Agustus 2015 di Hotel Crystal Lotus &ndash; Yogyakarta.</p>
<p>
 Bimbingan Teknis dihadiri oleh Atasan Langsung PPID, PPID Pelaksana, PPID Pembantu Pelaksana Unit Kerja dan UPT Pusat, serta Petugas Pengelola dan Pelayanan Informasi &amp; Dokumentasi lingkup Direktorat Jenderal Perkebunan. Acara diawali dengan laporan kegiatan yang disampaikan oleh Kepala Bagian Umum Sekretariat Ditjen Perkebunan Selaku PPID Pelaksana Ditjen Perkebunan, antara lain dilaporkan bahwa tujuan Bimbingan Teknis adalah untuk memberikan pemahaman kepada Atasan Langsung, PPID Pelaksana, PPID Pembantu Pelaksana dan Petugas Pengelola Informasi dan Dokumentasi lingkup Direktorat Jenderal Perkebunan terhadap ketentuan dalam Undang-Undang Nomor 14 tahun 2008 tentang Keterbukaan Informasi Publik dan peraturan pelaksanaannya serta Meningkatkan kinerjanya dalam memberikan pelayanan informasi kepada publik secara transparan, efektif, efisien dan akuntabel berbasis teknologi informasi dan komunikasi (TIK).</p>
<p>
 Transparansi atas setiap informasi publik membuat masyarakat dapat ikut berpartisipasi aktif dalam mengontrol setiap langkah dan kebijakan yang diambil oleh pemerintah sehingga penyelenggaraan kekuasaan dalam negara demokrasi dapat dipertanggungjawabkan kembali kepada rakyat. &rdquo;Keterbukaan informasi publik merupakan pondasi dalam membangun tata pemerintahan yang baik (<em>good governance</em>). Pemerintahan yang transparan, terbuka dan partisipatoris dalam seluruh proses pengelolaan kenegaraan termasuk seluruh proses pengelolaan sumber daya publik sejak dari proses pengambilan keputusan, pelaksanaan serta evaluasinya, &rdquo; ujar Dirjen menambahkan.</p>
', '065eb606180e4d84be5a4df02e07e9c6.PNG', '2016-02-08 18:50:32' );
-- ---------------------------------------------------------


-- Dump data of "sys_traffic" ------------------------------
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-08-19', '10.1.101.200', '12' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-08-20', '10.1.101.200', '4' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-08-22', '10.1.101.200', '90' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-08-23', '10.1.101.200', '115' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-08-24', '10.1.101.200', '1' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-08-26', '10.1.101.200', '1' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-08-28', '10.1.101.200', '5' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-08-30', '10.1.101.200', '6' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-09-06', '10.1.101.200', '4' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-09-16', '10.1.101.200', '1' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-10-06', '10.1.101.200', '4' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-10-27', '10.1.101.200', '1' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-10-28', '10.1.101.200', '11' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-10-31', '10.1.101.200', '3' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-11-11', '::1', '1' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-11-15', '::1', '125' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-11-16', '::1', '143' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-11-28', '::1', '114' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-11-29', '::1', '160' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-11-30', '::1', '153' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-12-01', '::1', '182' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-12-02', '::1', '13' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-12-03', '::1', '3' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-12-04', '::1', '92' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-12-05', '::1', '60' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2016-12-06', '::1', '10' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2017-01-19', '::1', '26' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2017-01-20', '::1', '111' );
INSERT INTO `sys_traffic`(`Tanggal`,`ipAddress`,`Jumlah`) VALUES ( '2017-01-21', '::1', '4' );
-- ---------------------------------------------------------


-- Dump data of "themes" -----------------------------------
INSERT INTO `themes`(`id`,`name`,`slug`,`style`,`is_used`,`created`) VALUES ( '1', 'Ditjenbun Default', 'ditjenbun-default', 'style.css', '1', '2016-05-26 09:39:07' );
-- ---------------------------------------------------------


-- CREATE INDEX "id" ---------------------------------------
CREATE INDEX `id` USING BTREE ON `artikel`( `id` );
-- ---------------------------------------------------------


-- CREATE INDEX "last_activity_idx" ------------------------
CREATE INDEX `last_activity_idx` USING BTREE ON `ci_sessions`( `last_activity` );
-- ---------------------------------------------------------


-- CREATE VIEW "view_blog" ---------------------------------
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_blog`
AS select `atk`.`id` AS `id`,`atk`.`title` AS `title`,`atk`.`url` AS `url`,`atk`.`meta_keyword` AS `meta_keyword`,`atk`.`meta_description` AS `meta_description`,`atk`.`isi_berita` AS `isi_berita`,`atk`.`kategori` AS `kategori`,`atk`.`album_id` AS `album_id`,`atk`.`posisi` AS `posisi`,`atk`.`active` AS `active`,`atk`.`author` AS `author`,`atk`.`photo` AS `photo`,`atk`.`create` AS `create`,`atk`.`last_modified` AS `last_modified`,`ad`.`id_admin` AS `id_admin`,`ad`.`username` AS `username`,`ad`.`password` AS `password`,`ad`.`email` AS `email`,`ad`.`level` AS `level`,`ad`.`foto` AS `foto`,`ad`.`last_login` AS `last_login`,time_format(timediff(now(),`atk`.`last_modified`),'%H') AS `hour_post`,time_format(timediff(now(),`atk`.`last_modified`),'%i') AS `min_post` from (`layout4db`.`artikel` `atk` left join `layout4db`.`admin` `ad` on((`ad`.`id_admin` = `atk`.`author`)));
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


