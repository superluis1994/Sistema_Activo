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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

/*Data for the table `account_status` */

insert  into `account_status`(`id_account_status`,`status`) values (1,'enabled');
insert  into `account_status`(`id_account_status`,`status`) values (2,'disabled');
insert  into `account_status`(`id_account_status`,`status`) values (3,'recargar');

/*Table structure for table `conexiones` */

CREATE TABLE `conexiones` (
  `id_conexion` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id_conexion`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `conexiones` */

insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (1,130125,'0000-00-00','10:50:34');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (2,130125,'0000-00-00','10:53:15');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (3,130125,'2022-06-29','02:57:39');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (4,130125,'2022-06-29','03:02:39');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (5,130125,'2022-06-29','03:03:49');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (6,130125,'2022-06-29','03:04:33');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (7,130125,'2022-06-29','03:04:35');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (8,130125,'2022-06-29','03:04:36');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (9,130125,'2022-06-29','03:04:37');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (10,130125,'2022-06-29','03:04:39');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (11,130125,'2022-06-29','03:04:40');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (12,130125,'2022-06-30','10:03:21');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (13,130125,'2022-06-30','05:57:59');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (14,130125,'2022-07-01','03:06:52');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (15,130125,'2022-07-03','09:28:35');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (16,130125,'2022-07-04','02:01:35');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (17,130125,'2022-07-04','02:09:49');

/*Table structure for table `list_activos_movimiento` */

CREATE TABLE `list_activos_movimiento` (
  `id_list_activo` int(11) NOT NULL AUTO_INCREMENT,
  `id_activo` varchar(255) DEFAULT NULL,
  `id_listmovimiento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_list_activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `list_activos_movimiento` */

/*Table structure for table `list_movimientos` */

CREATE TABLE `list_movimientos` (
  `id_lis_mov` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_mov` int(11) NOT NULL,
  `id_user_entrega` int(11) NOT NULL,
  `id_user_recibe` int(11) NOT NULL,
  `id_local_salida` int(11) NOT NULL,
  `id_local_destino` int(11) NOT NULL,
  `fecha_mov` date DEFAULT NULL,
  `hora_mov` date DEFAULT NULL,
  PRIMARY KEY (`id_lis_mov`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `list_movimientos` */

/*Table structure for table `local` */

CREATE TABLE `local` (
  `id_local` varchar(30) NOT NULL,
  `local_name` varchar(255) DEFAULT NULL,
  `jefe_local` int(11) DEFAULT NULL,
  `fecha_regis` date DEFAULT NULL,
  `registradoX` int(11) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_local`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `local` */

insert  into `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) values ('sorto','luis',130122,'2022-06-30',130125,1);
insert  into `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) values ('St-17','cafetin',130122,'2022-06-30',130125,1);
insert  into `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) values ('St-18','Computo 2',130122,'2022-06-30',130125,1);
insert  into `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) values ('St-19','Computo 1',130121,'2022-06-30',130125,1);
insert  into `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) values ('St-20','Computo 3',130122,'2022-06-30',130125,1);
insert  into `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) values ('St-21','Computo 4',130122,'2022-06-30',130125,1);
insert  into `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) values ('St-22','Laboratorio',130125,'2022-06-30',130125,1);
insert  into `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) values ('St-23','Camputo 5',130125,'2022-07-03',130125,1);
insert  into `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) values ('St-24','Computo 6',130125,'2022-07-03',130125,1);
insert  into `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) values ('St-25','Computo 7',130125,'2022-07-03',130125,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `permisos` */

insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (1,'on','on','on','on','on','on','on','on','on',130121);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (2,'off','off','off','off','off','on','on','on','on',130122);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (3,'on','on','on','on','on','on','on','on','on',130123);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (4,'on','on','on','on','on','on','on','on','on',130125);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (5,'on','on','on','on','on','on','on','on','on',130155);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (6,'on','on','on','on','on','on','on','on','on',130156);

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

/*Table structure for table `tipo_movimiento` */

CREATE TABLE `tipo_movimiento` (
  `id_mov` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_mov` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_mov`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipo_movimiento` */

insert  into `tipo_movimiento`(`id_mov`,`tipo_mov`) values (1,'Prestamo');
insert  into `tipo_movimiento`(`id_mov`,`tipo_mov`) values (2,'Traslado');
insert  into `tipo_movimiento`(`id_mov`,`tipo_mov`) values (3,'Salida');
insert  into `tipo_movimiento`(`id_mov`,`tipo_mov`) values (4,'Baja');
insert  into `tipo_movimiento`(`id_mov`,`tipo_mov`) values (5,'Otro');

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

insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (130121,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (130122,'U0NyaG5Ra2pPYTVWUjQ2OGpwTE9KckxudUhpWWpxOFVtdEdNb0dmMlMzdz0=','frank','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,2);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (130123,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (130125,'YWNlOFBaVG5BaTVnZkg2R3dFdjh3Zz09','frank','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',2,1);

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
