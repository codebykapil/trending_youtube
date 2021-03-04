/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.4.6-MariaDB : Database - youtube
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`youtube` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `youtube`;

/*Table structure for table `youtube_tranding_list` */

DROP TABLE IF EXISTS `youtube_tranding_list`;

CREATE TABLE `youtube_tranding_list` (
  `nr` int(10) NOT NULL AUTO_INCREMENT,
  `video_id` varchar(100) DEFAULT NULL,
  `video_etag` varchar(100) DEFAULT NULL,
  `video_date` datetime DEFAULT NULL,
  `video_title` text DEFAULT NULL,
  `video_description` text DEFAULT NULL,
  `video_url` text DEFAULT NULL,
  `video_thumbnails_default` text DEFAULT NULL,
  `video_thumbnails_medium` text DEFAULT NULL,
  `video_thumbnails_high` text DEFAULT NULL,
  `video_viewCount` bigint(20) DEFAULT NULL,
  `video_likeCount` bigint(20) DEFAULT NULL,
  `video_dislikeCount` bigint(20) DEFAULT NULL,
  `video_commentCount` bigint(20) DEFAULT NULL,
  `channels_title` text DEFAULT NULL,
  `channels_description` text DEFAULT NULL,
  `channels_thumbnail_default` text DEFAULT NULL,
  `channels_thumbnail_medium` text DEFAULT NULL,
  `channels_thumbnail_high` text DEFAULT NULL,
  PRIMARY KEY (`nr`),
  UNIQUE KEY `video_unique` (`video_id`,`video_title`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `youtube_tranding_list` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
