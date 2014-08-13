/*
SQLyog Community v11.51 (64 bit)
MySQL - 5.6.17 : Database - quicktestpro_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`quicktestpro_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `quicktestpro_db`;

/*Table structure for table `answers` */

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `answer_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(500) NOT NULL,
  `description` text,
  `question_id` bigint(11) NOT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `modified_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `answers_question_id` (`question_id`),
  KEY `answers_created_by` (`created_by`),
  KEY `answers_modified_by` (`modified_by`),
  CONSTRAINT `answers_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `answers_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `answers_question_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `answers` */

insert  into `answers`(`answer_id`,`answer`,`description`,`question_id`,`created_on`,`modified_on`,`created_by`,`modified_by`) values (4,'Automatic Referance Count','',2,NULL,NULL,8,8),(5,'Android component','',3,NULL,NULL,8,8),(6,'Narendra Modi','',4,NULL,NULL,8,8);

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `question_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `multiple_answer` tinyint(1) NOT NULL,
  `subject_id` bigint(11) NOT NULL,
  `marks` float NOT NULL,
  `negative` tinyint(1) DEFAULT NULL,
  `section_id` bigint(11) NOT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `modified_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`question_id`),
  KEY `questions_section_id` (`section_id`),
  KEY `questions_creted_by` (`created_by`),
  KEY `questions_modified_by` (`modified_by`),
  KEY `quesyions_subject_id` (`subject_id`),
  CONSTRAINT `quesyions_subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  CONSTRAINT `questions_creted_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `questions_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `questions_section_id` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `questions` */

insert  into `questions`(`question_id`,`question`,`multiple_answer`,`subject_id`,`marks`,`negative`,`section_id`,`created_on`,`modified_on`,`created_by`,`modified_by`) values (2,'What is ARC?',1,8,1,0,1,NULL,NULL,8,8),(3,'what is Activity?',1,9,1,0,2,NULL,NULL,8,8),(4,'Who is india\'s PM?',1,10,1,0,1,NULL,NULL,8,8);

/*Table structure for table `results` */

DROP TABLE IF EXISTS `results`;

CREATE TABLE `results` (
  `result_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `test_id` bigint(11) NOT NULL,
  `total_score` float NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `total_attempt` int(11) NOT NULL,
  `total_correct` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `taken_duration` int(11) NOT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `modified_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`result_id`),
  KEY `results_test_id` (`test_id`),
  KEY `results_user_id` (`user_id`),
  KEY `results_created_by` (`created_by`),
  KEY `results_modified_by` (`modified_by`),
  CONSTRAINT `results_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `results_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `results_test_id` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`),
  CONSTRAINT `results_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `results` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `role_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL,
  `modified_on` datetime NOT NULL,
  `created_by` bigint(11) NOT NULL,
  `modified_by` bigint(11) NOT NULL,
  PRIMARY KEY (`role_id`),
  KEY `roles_created_by` (`created_by`),
  KEY `roles_modified_by` (`modified_by`),
  CONSTRAINT `roles_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `roles_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`role_id`,`name`,`created_on`,`modified_on`,`created_by`,`modified_by`) values (4,'user','2014-08-01 21:08:54','0000-00-00 00:00:00',6,6);

/*Table structure for table `sections` */

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `section_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `modified_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`section_id`),
  KEY `sections_created_by` (`created_by`),
  KEY `sections_modified_by` (`modified_by`),
  CONSTRAINT `sections_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `sections_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `sections` */

insert  into `sections`(`section_id`,`name`,`created_on`,`modified_on`,`created_by`,`modified_by`) values (1,'simple',NULL,NULL,8,8),(2,'intermediate',NULL,NULL,8,8),(3,'Advanced',NULL,NULL,8,8);

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `subject_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `created_by` bigint(11) NOT NULL,
  `modified_by` bigint(11) NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `subjects_created_by` (`created_by`),
  KEY `subjects_modified_by` (`modified_by`),
  CONSTRAINT `subjects_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `subjects_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `subjects` */

insert  into `subjects`(`subject_id`,`name`,`created_on`,`modified_on`,`created_by`,`modified_by`) values (8,'ios',NULL,NULL,8,8),(9,'Android',NULL,NULL,8,8),(10,'General knowldge',NULL,NULL,8,8);

/*Table structure for table `test_assign` */

DROP TABLE IF EXISTS `test_assign`;

CREATE TABLE `test_assign` (
  `test_assign_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `test_id` bigint(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `role_id` bigint(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL,
  `modified_on` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `modified_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`test_assign_id`),
  KEY `test_assign_test_id` (`test_id`),
  KEY `test_assign_user_id` (`user_id`),
  KEY `test_assign_created_by` (`created_by`),
  KEY `test_assign_modified_by` (`modified_by`),
  KEY `test_assign_role_id` (`role_id`),
  CONSTRAINT `test_assign_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `test_assign_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `test_assign_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  CONSTRAINT `test_assign_test_id` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`),
  CONSTRAINT `test_assign_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `test_assign` */

/*Table structure for table `tests` */

DROP TABLE IF EXISTS `tests`;

CREATE TABLE `tests` (
  `test_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `duration` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `questions` int(11) NOT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `modified_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`test_id`),
  KEY `tests_created_by` (`created_by`),
  KEY `tests_modified_by` (`modified_by`),
  CONSTRAINT `tests_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `tests_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tests` */

insert  into `tests`(`test_id`,`name`,`type`,`duration`,`status`,`questions`,`created_on`,`modified_on`,`created_by`,`modified_by`) values (1,'ios appliction','objective','00:00:10',1,10,NULL,NULL,7,NULL),(2,'Android Application','objective','00:00:15',1,15,NULL,NULL,8,NULL);

/*Table structure for table `user_answers` */

DROP TABLE IF EXISTS `user_answers`;

CREATE TABLE `user_answers` (
  `user_answer_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `test_id` bigint(11) NOT NULL,
  `question_id` bigint(11) NOT NULL,
  `answer_id` bigint(11) NOT NULL,
  `answer` text,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `modified_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`user_answer_id`),
  KEY `user_answers_test_id` (`test_id`),
  KEY `user_answers_created_by` (`created_by`),
  KEY `user_answers_modified_by` (`modified_by`),
  KEY `user_answers_question_id` (`question_id`),
  KEY `user_answers_answer_id` (`answer_id`),
  CONSTRAINT `user_answers_answer_id` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`answer_id`),
  CONSTRAINT `user_answers_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `user_answers_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `user_answers_question_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
  CONSTRAINT `user_answers_test_id` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_answers` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `ip_address` float DEFAULT NULL,
  `role_id` bigint(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL,
  `modified_by` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `users_role_id` (`role_id`),
  KEY `user_created_by` (`created_by`),
  KEY `users_modified_by` (`modified_by`),
  CONSTRAINT `users_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `users_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  CONSTRAINT `user_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`first_name`,`last_name`,`email`,`password`,`mobile`,`date_of_birth`,`last_login`,`ip_address`,`role_id`,`created_on`,`modified_on`,`created_by`,`modified_by`) values (5,'adslfk','lskdjf','lsdkjf@dflk.com','root12345','','0000-00-00',NULL,NULL,4,NULL,NULL,5,NULL),(6,'kkkkk','lksd','lkjsdlfkj','root12345','','0000-00-00',NULL,NULL,4,NULL,NULL,5,NULL),(7,'pramod','patil','pramod@gmail.com','pramod','8805815220','0000-00-00',NULL,NULL,4,NULL,NULL,6,NULL),(8,'varad','kakatkar','varad@gmail.com','varad123','7620356369','0000-00-00',NULL,NULL,4,NULL,NULL,8,NULL),(15,'aldsk','kkkk','llll@gmail.com','root12345','','0000-00-00',NULL,NULL,4,NULL,NULL,15,NULL),(16,'bharaT','khatkhe','bharat@gmail.com','bharat123','5588223311','0000-00-00',NULL,NULL,4,NULL,NULL,8,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
