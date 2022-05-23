/*
SQLyog Ultimate
MySQL - 10.4.20-MariaDB : Database - asset_control_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `account_status` */

CREATE TABLE `account_status` (
  `id_account_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id_account_status`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

/*Data for the table `account_status` */

insert  into `account_status`(`id_account_status`,`status`) values (33,'enabled');
insert  into `account_status`(`id_account_status`,`status`) values (44,'disabled');

/*Table structure for table `connections` */

CREATE TABLE `connections` (
  `id_connection` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id_connection`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `connections_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `connections` */

/*Table structure for table `menu_usuario` */

CREATE TABLE `menu_usuario` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(100) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `menu_usuario` */

/*Table structure for table `permisos` */

CREATE TABLE `permisos` (
  `id_permisos` int(11) NOT NULL AUTO_INCREMENT,
  `registrar_usu` text DEFAULT NULL,
  `list_usu` text DEFAULT NULL,
  `conexion` text DEFAULT NULL,
  `regist_producto` text DEFAULT NULL,
  `mostr_producto` text DEFAULT NULL,
  `regist_local` text DEFAULT NULL,
  `mostr_local` text DEFAULT NULL,
  PRIMARY KEY (`id_permisos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `permisos` */

/*Table structure for table `roles` */

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `roles` */

insert  into `roles`(`id_rol`,`rol`) values (1,'Admin');
insert  into `roles`(`id_rol`,`rol`) values (2,'usuario');
insert  into `roles`(`id_rol`,`rol`) values (3,'supervisor');
insert  into `roles`(`id_rol`,`rol`) values (4,'francela');

/*Table structure for table `sub_menu` */

CREATE TABLE `sub_menu` (
  `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT,
  `sub_item` varchar(100) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id_sub_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `sub_menu` */

/*Table structure for table `usuario` */

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `passw` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `photo` text DEFAULT NULL,
  `account_status_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `rol_id` (`rol_id`),
  KEY `account_status_id` (`account_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (343566,'luis','fdghhh','luis','luis@gmil.com','xdsfsf',1,1);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (2002123,'sorto','Luis Alverto sorto lemus','lsls','sss@ddf','jssjjs/sjsjjsjs.jpg',1,1);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (4556788,'luis','jdjdjfjjf','lsldgg','ssddd@ddd','ssddddddddddd',1,1);

/* Procedure structure for procedure `crubusuario` */

DELIMITER $$

/*!50003 CREATE DEFINER=`` PROCEDURE `crubusuario`(
IN accion INTEGER,
in _id_user int,
in _passw Varchar(255),
in _nom VARCHAR(255),
in _photo text,
in _account_status_id int,
in _rol_id int)
BEGIN
IF accion = 1 THEN
INSERT INTO usuario (id_user, passw, nom, photo, account_status_id, rol_id)
VALUES(_id_user,_passw,_nom,_photo,_account_status_id,_rol_id);

END IF;

if accion = 2 THEN
UPDATE usuario SET id_user = _id_user, passw = _passw, nom = _nom, photo = _photo, account_status_id = _account_status_id, rol_id = _rol_id
WHERE id_user = _id_user;

END IF;

END */$$
DELIMITER ;

/* Procedure structure for procedure `Sel_Elim_usuario` */

DELIMITER $$

/*!50003 CREATE DEFINER=`` PROCEDURE `Sel_Elim_usuario`(
IN accion INTEGER,
IN _id_user INT)
BEGIN
IF accion = 1 THEN
DELETE FROM usuario WHERE id_user = _id_user;
END IF;

IF accion = 2 THEN
SELECT * FROM usuario WHERE id_user = _id_user;
END IF;

END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
