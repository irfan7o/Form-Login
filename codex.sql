/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 10.1.36-MariaDB : Database - codex
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`codex` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `codex`;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`email`,`image`,`password`,`role_id`,`is_active`,`date_created`) values 
(4,'Florentika','dboyscos@gmail.com','Capture222.PNG','$2y$10$ojhvd41/FA0Df05fYn273uFkBF0vFyDGQq52O7vkdx0JllzDMPA8i',2,1,1583638479),
(5,'Irfan Rahmat','kartolo727@gmail.com','Screenshot_2018-08-31-15-35-57.png','$2y$10$cnF6GnlQoegUQlh/.h0ErO5mxV/R0dQ9xFwPp9Ex1ChaPv75htDqO',1,1,1583736790),
(6,'Irfan','mdkcoz0@gmail.com','default.jpg','$2y$10$fKoJxailooB7JX/zn3jfC.ZEkKmGwvvy4f7L5RzHySyBw2wfJtyP2',2,1,1583736934),
(7,'Nadine Gordimer','Loser6507@gmail.com','default.jpg','$2y$10$BDlhiRE9lIRs.1sszfo8Oew078hMgxH6z2/2WhB3H6GyjNTEH7zRu',2,1,1583757013);

/*Table structure for table `user_access_menu` */

DROP TABLE IF EXISTS `user_access_menu`;

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_access_menu` */

insert  into `user_access_menu`(`id`,`role_id`,`menu_id`) values 
(1,1,1),
(2,1,2),
(3,2,2),
(4,1,3);

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user_menu` */

insert  into `user_menu`(`id`,`menu`) values 
(1,'Admin'),
(2,'User');

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`role`) values 
(1,'Administrator'),
(2,'Member'),
(5,'fjsdhfsdjfh,,,,');

/*Table structure for table `user_sub_menu` */

DROP TABLE IF EXISTS `user_sub_menu`;

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `user_sub_menu` */

insert  into `user_sub_menu`(`id`,`menu_id`,`title`,`url`,`icon`,`is_active`) values 
(1,1,'Dashboard','admin','fas fa-fw fa-tachometer-alt',1),
(2,2,'My Profile','user','fas fa-fw fa-user-graduate',1),
(3,2,'Edit Profile','user/edit','fas fa-fw fa-user-edit',1),
(4,1,'Menu Management','Menu','fas fa-fw fa-address-book',1),
(5,1,'Submenu Management','menu/submenu','fas fa-fw fa-caret-right',1),
(7,1,'Role','admin/role','fab fa-fw fa-chromecast',1),
(8,2,'Change Password','user/changepassword','fas fa-fw fa-key',1);

/*Table structure for table `user_token` */

DROP TABLE IF EXISTS `user_token`;

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_token` */

insert  into `user_token`(`id`,`email`,`token`,`date_created`) values 
(3,'Loser6507@gmail.com','eMXZg+BOITOMdjwkuOkju8sWjamGa6HXWVQ/PscLhnQ=',1583760006),
(4,'Kartolo727@gmail.com','cCX6gQbhALKHCimhvAtoqL8MBj7MLnOF5rVh8qo/U0Q=',1586480758);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
