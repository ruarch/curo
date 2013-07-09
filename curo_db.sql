/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.8 : Database - curo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`curo` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `curo`;

/*Table structure for table `cu_access` */

DROP TABLE IF EXISTS `cu_access`;

CREATE TABLE `cu_access` (
  `access_id` int(11) NOT NULL AUTO_INCREMENT,
  `access` tinyint(1) NOT NULL DEFAULT '3',
  `access_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`access_id`,`access`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `cu_access` */

insert  into `cu_access`(`access_id`,`access`,`access_name`) values (1,4,'Public'),(2,2,'Editor'),(3,1,'Administrator'),(4,3,'Registered');

/*Table structure for table `cu_categories` */

DROP TABLE IF EXISTS `cu_categories`;

CREATE TABLE `cu_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `image` text CHARACTER SET latin1,
  `section_id` int(11) DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  `uniqueid` varbinary(255) DEFAULT NULL,
  `category_show` tinyint(50) DEFAULT '1',
  `feature` tinyint(10) DEFAULT '0',
  `access` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `cu_categories` */

insert  into `cu_categories`(`id`,`name`,`title`,`alias`,`image`,`section_id`,`description`,`uniqueid`,`category_show`,`feature`,`access`) values (9,'Faculty xdfdf','','faculty-xdfdf','',18,'','',1,0,4),(8,'Radio','',NULL,'',19,'',NULL,1,0,4),(10,'Education & Research','sdsdsddsdsds','education-and-research','',20,'sdssdsdsd','',1,0,4),(12,'??????','??????','-','',20,'&Sigma;&alpha;&mu;&upsilon;&epsilon;&lambda;','',1,0,4);

/*Table structure for table `cu_con_images` */

DROP TABLE IF EXISTS `cu_con_images`;

CREATE TABLE `cu_con_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `imageconid` int(11) DEFAULT NULL,
  `image_file` text CHARACTER SET latin1,
  `image_description` text CHARACTER SET latin1,
  `image_module` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `image_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_access` int(11) DEFAULT NULL,
  `image_feature` tinyint(1) DEFAULT '0',
  `image_show` tinyint(1) DEFAULT '1',
  `image_order` tinyint(1) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

/*Data for the table `cu_con_images` */

insert  into `cu_con_images`(`image_id`,`image_title`,`imageconid`,`image_file`,`image_description`,`image_module`,`image_added`,`image_access`,`image_feature`,`image_show`,`image_order`,`added_by`) values (60,'ad sizes',8,'ad-sizes.gif','','category','2013-04-22 02:45:48',4,1,1,1,1),(58,'vcvcvcv',18,'Chrysanthemum.jpg','','sections','2013-04-15 16:42:54',4,0,1,3,1),(57,'asdsdsdasd',17,'Penguins.jpg','','sections','2013-04-15 16:42:44',4,0,1,2,1),(56,'afdsadsd',20,'Jellyfish.jpg','dffdfdf','categories','2013-04-15 16:42:32',4,0,1,1,1);

/*Table structure for table `cu_content_frontpage` */

DROP TABLE IF EXISTS `cu_content_frontpage`;

CREATE TABLE `cu_content_frontpage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) DEFAULT NULL,
  `content_type` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `cu_content_frontpage` */

insert  into `cu_content_frontpage`(`id`,`content_id`,`content_type`,`ordering`) values (32,68,'content',1);

/*Table structure for table `cu_contents` */

DROP TABLE IF EXISTS `cu_contents`;

CREATE TABLE `cu_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `content_alias` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `intro_text` text CHARACTER SET latin1,
  `full_content` text CHARACTER SET latin1,
  `content_source` text CHARACTER SET latin1,
  `excerpt` text CHARACTER SET latin1,
  `category_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `image` text CHARACTER SET latin1,
  `image_desc` text CHARACTER SET latin1,
  `audio_file` text CHARACTER SET latin1,
  `audio_file_desc` text CHARACTER SET latin1,
  `video_file` text CHARACTER SET latin1,
  `video_file_desc` text CHARACTER SET latin1,
  `other_file` text CHARACTER SET latin1,
  `other_file_desc` text CHARACTER SET latin1,
  `feature` tinyint(1) DEFAULT '0',
  `metakey` text CHARACTER SET latin1,
  `metadesc` text CHARACTER SET latin1,
  `metadata` text CHARACTER SET latin1,
  `access` int(11) DEFAULT '3',
  `hits` int(11) DEFAULT NULL,
  `published` varchar(50) CHARACTER SET latin1 DEFAULT 'unpublished',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

/*Data for the table `cu_contents` */

insert  into `cu_contents`(`id`,`content_title`,`content_alias`,`intro_text`,`full_content`,`content_source`,`excerpt`,`category_id`,`section_id`,`created`,`created_by`,`modified`,`modified_by`,`image`,`image_desc`,`audio_file`,`audio_file_desc`,`video_file`,`video_file_desc`,`other_file`,`other_file_desc`,`feature`,`metakey`,`metadesc`,`metadata`,`access`,`hits`,`published`) values (51,'ama','ama','','aasass',NULL,'',8,0,'2012-10-15 00:00:00',1,'2012-12-19 21:35:57',1,'','','','','','',NULL,NULL,0,'','','',4,NULL,'published'),(52,'Telephone Directory','telephone-directory','','<img alt=\"\" src=\"/media/images/double.jpg\" style=\"width: 320px; height: 448px; \" />','','',0,17,'2012-10-15 00:00:00',1,'2013-06-24 17:37:03',1,'','','','','','','','',0,'','','',4,NULL,'published'),(53,'hhhhhhhhhhh','hhhhhhhhhhh','','',NULL,'',0,20,'2013-01-28 00:00:00',1,'2013-01-28 10:31:26',1,'','','','','','','','vvvvvvvvvvvvvvv',0,'','','',4,NULL,'published'),(54,'dfdfddfddf','dfdfddfddf','','dffdfd','','',8,17,'2013-03-05 00:00:00',1,'2013-05-28 15:55:04',1,'','','','','','','','',0,'','','',4,NULL,'published'),(55,'sdsdsd','sdsdsd','','sdsdssdsdss','','',9,20,'2013-05-28 00:00:00',1,'0000-00-00 00:00:00',NULL,'','','','','','','','',0,'','','',4,NULL,'published'),(56,'sdsds','sdsds','','sdsdsds','xxxxx','',8,18,'2013-05-28 00:00:00',1,'2013-05-30 02:03:44',1,'','','','','','','','',0,'','','',4,NULL,'draft'),(57,'dfsdfds','dfsdfds','','dsfdfdfd','','',0,20,'2013-06-15 00:00:00',1,'0000-00-00 00:00:00',NULL,'','','','','','','','',0,'','','',4,NULL,'published'),(58,'ssfdgfxbvxcvv','ssfdgfxbvxcvv','','xvcxvxvvxvxv','','',0,19,'2013-06-15 00:00:00',1,'0000-00-00 00:00:00',NULL,'','','','','','','','',0,'','','',4,NULL,'published'),(59,'sgfsfgds','sgfsfgds','','fdsfdssfsdfsfdsfsdf','','',9,20,'2013-06-15 00:00:00',1,'0000-00-00 00:00:00',NULL,'','','','','','','','',0,'','','',4,NULL,'published'),(60,'sfgdfdsfdsfddfxcvcx','sfgdfdsfdsfddfxcvcx','','','','',8,17,'2013-06-15 00:00:00',1,'0000-00-00 00:00:00',NULL,'','','','','','','','',0,'','','',4,NULL,'published'),(61,'sfdfbxvbhntrweww','sfdfbxvbhntrweww','','ssffsdfsdfdsfd','','',9,19,'2013-06-15 00:00:00',1,'2013-06-25 11:17:54',1,'','','','','','','','',0,'','','',4,NULL,'published'),(67,'A surfer\'s paradise in Australia','a-surfer-s-paradise-in-australia','','efdfddfdf','','',0,20,'2013-06-25 00:00:00',1,'2013-06-25 11:18:28',1,'','','','','','','','',0,'','','',4,NULL,'published'),(68,'qqeqwe','qqeqwe','','qeqeqeqewqewq','','',0,20,'2013-06-25 00:00:00',1,'0000-00-00 00:00:00',NULL,'','','','','','','','',0,'','','',4,NULL,'published');

/*Table structure for table `cu_events` */

DROP TABLE IF EXISTS `cu_events`;

CREATE TABLE `cu_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` text CHARACTER SET latin1,
  `event_date` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `event_venue` text CHARACTER SET latin1,
  `event_time` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `event_details` text CHARACTER SET latin1,
  `event_image` text CHARACTER SET latin1,
  `event_show` tinyint(1) DEFAULT '1',
  `event_feature` tinyint(1) DEFAULT '0',
  `event_access` tinyint(1) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL,
  `modified_by` varbinary(255) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `cu_events` */

insert  into `cu_events`(`event_id`,`event_title`,`event_date`,`event_venue`,`event_time`,`event_details`,`event_image`,`event_show`,`event_feature`,`event_access`,`created`,`added_by`,`modified_date`,`modified_by`) values (3,'Commissioning Service','2012-05-25','',NULL,'Commissioning Service','',1,0,4,NULL,NULL,'2012-12-19 21:34:57','1'),(4,'Inter-faculty Seminar','2012-11-08','James Mckeown Auditorium','2:00pm','Inter-faculty Seminar  \r\n\r\nVenue: James Mckeown Auditorium','',0,0,4,NULL,NULL,'2012-12-19 21:34:44','1');

/*Table structure for table `cu_gallery` */

DROP TABLE IF EXISTS `cu_gallery`;

CREATE TABLE `cu_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `gallery_image` text CHARACTER SET latin1,
  `gallery_description` text CHARACTER SET latin1,
  `gallery_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gallery_show` tinyint(1) DEFAULT '1',
  `gallery_access` tinyint(1) DEFAULT NULL,
  `gallery_feature` tinyint(1) DEFAULT '0',
  `gallery_order` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `cu_gallery` */

insert  into `cu_gallery`(`gallery_id`,`gallery_name`,`gallery_image`,`gallery_description`,`gallery_created`,`gallery_show`,`gallery_access`,`gallery_feature`,`gallery_order`,`added_by`) values (10,'me Two','Asia-Society-(20100707).jpg','','2012-11-21 05:03:44',1,4,0,0,1),(7,'Gallery One','6-of-the-buses.jpg','gggggggggggggggggggg','2012-11-18 17:58:04',1,4,0,1,1);

/*Table structure for table `cu_images` */

DROP TABLE IF EXISTS `cu_images`;

CREATE TABLE `cu_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `image_gallery` int(11) DEFAULT NULL,
  `image_file` text CHARACTER SET latin1,
  `image_description` text CHARACTER SET latin1,
  `image_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_access` int(11) DEFAULT NULL,
  `image_feature` tinyint(1) DEFAULT '0',
  `image_show` tinyint(1) DEFAULT '1',
  `image_order` tinyint(1) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

/*Data for the table `cu_images` */

insert  into `cu_images`(`image_id`,`image_title`,`image_gallery`,`image_file`,`image_description`,`image_added`,`image_access`,`image_feature`,`image_show`,`image_order`,`added_by`) values (45,'Image two',10,'American-Cancer-Society(20100707).jpg','','2012-11-21 05:13:10',3,0,1,0,1),(46,'Image two',10,'American-Diabetes-Association-Home-Page---American-Diabetes-Association-(20100707).jpg','','2012-11-21 05:13:10',3,0,1,0,1);

/*Table structure for table `cu_newsletter_users` */

DROP TABLE IF EXISTS `cu_newsletter_users`;

CREATE TABLE `cu_newsletter_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `sub_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `cu_newsletter_users` */

insert  into `cu_newsletter_users`(`id`,`email`,`sub_date`,`status`) values (3,'lilmopat@gmail.com','2013-02-25 17:11:37',1),(4,'lilmopat@gmail.comww','2013-02-25 17:24:19',0),(5,'iteeeee@gmail.com','2013-02-25 00:00:00',0);

/*Table structure for table `cu_newsletters` */

DROP TABLE IF EXISTS `cu_newsletters`;

CREATE TABLE `cu_newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(355) CHARACTER SET latin1 DEFAULT NULL,
  `content` text CHARACTER SET latin1,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sent` tinyint(2) DEFAULT '0',
  `sent_date` timestamp NULL DEFAULT NULL,
  `sent_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `cu_newsletters` */

insert  into `cu_newsletters`(`id`,`title`,`content`,`created`,`sent`,`sent_date`,`sent_by`) values (1,'dfdfddfdfd','dfdfdfdfdffdfd','2013-03-05 00:00:00',1,'2013-03-05 13:11:58',1);

/*Table structure for table `cu_sections` */

DROP TABLE IF EXISTS `cu_sections`;

CREATE TABLE `cu_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `image` text CHARACTER SET latin1,
  `banner` text CHARACTER SET latin1,
  `section_show` tinyint(2) DEFAULT '1',
  `main_nav` tinyint(2) DEFAULT '1',
  `description` text CHARACTER SET latin1,
  `uniqueid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `access` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `cu_sections` */

insert  into `cu_sections`(`id`,`name`,`title`,`alias`,`image`,`banner`,`section_show`,`main_nav`,`description`,`uniqueid`,`ordering`,`access`) values (20,'Services','Services','services','','',1,1,'  bbbbbbbbbbbbbbb','',3,4),(18,'About us','','about-us','','',1,1,'',NULL,0,4),(19,'Contact us','','contact-us','','',1,1,'',NULL,3,1),(17,'Academics','','academics','','',1,1,'gjhgjghjgjg',NULL,0,4);

/*Table structure for table `cu_slideshow` */

DROP TABLE IF EXISTS `cu_slideshow`;

CREATE TABLE `cu_slideshow` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `slide_description` tinytext CHARACTER SET latin1,
  `slide_file` text CHARACTER SET latin1,
  `slide_link` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `slide_added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slide_access` tinyint(2) DEFAULT NULL,
  `slide_feature` tinyint(1) DEFAULT '0',
  `slide_show` tinyint(1) DEFAULT '1',
  `slide_order` int(11) DEFAULT '0',
  `slide_added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `cu_slideshow` */

insert  into `cu_slideshow`(`slide_id`,`slide_title`,`slide_description`,`slide_file`,`slide_link`,`slide_added_date`,`slide_access`,`slide_feature`,`slide_show`,`slide_order`,`slide_added_by`) values (11,'Slide One','Slide One Description','slide1.jpg',NULL,'2012-11-02 04:11:19',4,0,1,0,1),(12,'Slide Two','Slide Two Description','Cloud-Computing.jpg',NULL,'2012-11-02 04:11:49',4,0,1,0,1),(13,'Slide Three','Slide Three Description','IMG_15570000.jpg',NULL,'2012-11-02 04:12:21',4,0,1,0,1),(14,'erereereerererr','sdffdsdfsfsfdsdsf','screenshot.png','http://ruarch.net','2013-01-12 21:00:52',4,0,1,0,1);

/*Table structure for table `cu_users` */

DROP TABLE IF EXISTS `cu_users`;

CREATE TABLE `cu_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `username` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `user_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `user_password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `user_type` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `send_email` varchar(10) CHARACTER SET latin1 DEFAULT 'no',
  `register_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit` datetime DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(50) CHARACTER SET latin1 DEFAULT 'inactive',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `cu_users` */

insert  into `cu_users`(`userid`,`user_fullname`,`username`,`user_email`,`user_password`,`user_type`,`send_email`,`register_date`,`lastvisit`,`activation`) values (1,'Samuel Armah','admin','lilmopat@gmail.com','bc4f9b35325d43a387beaa9a5efd476d','1','no','2012-09-21 13:15:41','0000-00-00 00:00:00','active'),(2,'Eunice Armah','editor','eunice@gmail.com','ec580792aa15d258e55f2c6278f2d8e5','2','no','2012-12-15 12:45:49','0000-00-00 00:00:00','active'),(3,'Nicholas Armah','nicho','nicho@gmail.com','e10adc3949ba59abbe56e057f20f883e','2','no','2012-12-20 02:04:45','0000-00-00 00:00:00','active');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
