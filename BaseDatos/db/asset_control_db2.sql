/*
SQLyog Ultimate
MySQL - 10.4.20-MariaDB : Database - sistema_activos
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
  `registrar_usu` varchar(20) DEFAULT NULL,
  `list_usu` varchar(20) DEFAULT NULL,
  `conexion` varchar(20) DEFAULT NULL,
  `mover_activos` varchar(20) DEFAULT NULL,
  `list_movimiento_activo` varchar(20) DEFAULT NULL,
  `regist_producto` varchar(20) DEFAULT NULL,
  `mostr_producto` varchar(20) DEFAULT NULL,
  `regist_local` varchar(20) DEFAULT NULL,
  `mostr_local` varchar(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_permisos`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `permisos` */

insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (1,'on','on','on','on','on','on','on','on','on',130121);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (2,'off','off','off','off','off','on','on','on','on',130122);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (3,'on','on','on','on','on','on','on','on','on',130123);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (4,'off','off','off','off','off','on','on','on','on',130125);

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

insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (123456,'UVlGZnFtNUNCR0dZZW5YRWpsM0RVK29jU3B3bzY4bDVSNjIxSWM4MzhiUT0=','ssdd','sdddd','superluis@dd.com','img/recursos/foto_default.jpg',1,1);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (130120,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (130121,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (130122,'U0NyaG5Ra2pPYTVWUjQ2OGpwTE9KckxudUhpWWpxOFVtdEdNb0dmMlMzdz0=','frank','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,2);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (130123,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (130125,'U0NyaG5Ra2pPYTVWUjQ2OGpwTE9KckxudUhpWWpxOFVtdEdNb0dmMlMzdz0=','frank','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,2);

/* Procedure structure for procedure `crubusuario` */

DELIMITER $$

/*!50003 CREATE DEFINER=`` PROCEDURE `crubusuario`(
IN accion INTEGER,
IN _id_user INT,
IN _passw VARCHAR(255),
IN _nom VARCHAR(255),
IN _apell VARCHAR(255),
IN _correo VARCHAR(255),
IN _photo TEXT,
IN _account_status_id INT,
IN _rol_id INT)
BEGIN
IF accion = 1 THEN
INSERT INTO usuario (id_user, passw, nom,apellidos,correo, photo, account_status_id, rol_id)
VALUES(_id_user,_passw,_nom,_apell,_correo,_photo,_account_status_id,_rol_id);

END IF;

IF accion = 2 THEN
UPDATE usuario SET id_user = _id_user, passw = _passw, nom = _nom,apellidos = _apell, correo = _correo, photo = _photo, account_status_id = _account_status_id, rol_id = _rol_id
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
