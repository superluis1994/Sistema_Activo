/*
SQLyog Ultimate
MySQL - 10.4.20-MariaDB : Database - sistema_activos1
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

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
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (18,130125,'2022-07-11','11:52:21');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (19,130125,'2022-07-11','03:31:01');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (20,130125,'2022-07-12','09:27:11');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (21,130125,'2022-07-12','10:43:18');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (22,130125,'2022-07-12','12:11:41');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (23,130125,'2022-07-12','12:14:46');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (24,130125,'2022-07-12','02:21:49');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (25,130125,'2022-07-12','02:26:42');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (26,130125,'2022-07-13','10:28:19');

/*Table structure for table `inventario` */

CREATE TABLE `inventario` (
  `id_activo` int(11) NOT NULL,
  `codigo_mined` varchar(255) DEFAULT NULL,
  `codigo_interno` varchar(255) DEFAULT NULL,
  `nom_activo` varchar(255) NOT NULL,
  `tipo_activo` int(11) NOT NULL,
  `descrip_activo` text NOT NULL,
  `valor_activo` int(11) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `dimensiones` varchar(255) NOT NULL,
  `serie` varchar(255) NOT NULL,
  `vida_util` int(11) NOT NULL,
  `id_local` varchar(255) NOT NULL,
  `id_reposable` int(11) NOT NULL,
  `foto` text NOT NULL,
  `fecha_resg` date DEFAULT NULL,
  PRIMARY KEY (`id_activo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `inventario` */

insert  into `inventario`(`id_activo`,`codigo_mined`,`codigo_interno`,`nom_activo`,`tipo_activo`,`descrip_activo`,`valor_activo`,`marca`,`modelo`,`dimensiones`,`serie`,`vida_util`,`id_local`,`id_reposable`,`foto`,`fecha_resg`) values (34,'ss','sss','s',2,'s',500,'N/s','N/s','N/s','444',5,'St-18',130122,'img/recursos/foto_default.jpg','2022-07-15');
insert  into `inventario`(`id_activo`,`codigo_mined`,`codigo_interno`,`nom_activo`,`tipo_activo`,`descrip_activo`,`valor_activo`,`marca`,`modelo`,`dimensiones`,`serie`,`vida_util`,`id_local`,`id_reposable`,`foto`,`fecha_resg`) values (43,'34','345','pc',2,'sss',500,'N/s','N/s','N/s','s',5,'St-19',130123,'img/imgPerfil/a1657896868.jpg','2022-07-15');
insert  into `inventario`(`id_activo`,`codigo_mined`,`codigo_interno`,`nom_activo`,`tipo_activo`,`descrip_activo`,`valor_activo`,`marca`,`modelo`,`dimensiones`,`serie`,`vida_util`,`id_local`,`id_reposable`,`foto`,`fecha_resg`) values (232,'324566777','567788','Mesa',1,'mesa negra hecha de caoba',125,'E/s','E/s','4x4x4','34567',5,'St-17',130125,'img/recursos/foto_default.jpg',NULL);
insert  into `inventario`(`id_activo`,`codigo_mined`,`codigo_interno`,`nom_activo`,`tipo_activo`,`descrip_activo`,`valor_activo`,`marca`,`modelo`,`dimensiones`,`serie`,`vida_util`,`id_local`,`id_reposable`,`foto`,`fecha_resg`) values (233,'74757866','4567','silla',1,'silla de ',30,'E/s','E/s','4x3','5678',5,'St-17',130125,'img/recursos/foto_default.jpg',NULL);

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
  `id_local_salida` varchar(30) NOT NULL,
  `id_local_destino` varchar(30) NOT NULL,
  `fecha_mov` date NOT NULL,
  `hora_mov` time NOT NULL,
  `justi_mov` text NOT NULL,
  PRIMARY KEY (`id_lis_mov`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

/*Data for the table `list_movimientos` */

insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (8,2,130123,130122,'St-17','St-19','2022-07-13','11:21:46','sllslslls');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (9,3,130122,130123,'St-17','St-18','2022-07-13','11:22:22','sssss');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (10,2,130122,130125,'St-17','St-18','2022-07-13','11:26:53','lusus');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (11,2,130122,130125,'St-17','St-18','2022-07-13','11:30:19','lusus');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (12,3,130121,130123,'St-17','St-18','2022-07-13','11:33:55','ssss');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (13,4,130121,130123,'St-17','St-18','2022-07-13','11:35:32','ssss');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (14,2,130122,130122,'St-17','St-19','2022-07-13','11:38:40','sss');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (15,3,130121,130122,'St-17','St-18','2022-07-13','11:50:17','ssss');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (16,3,130122,130123,'St-17','St-19','2022-07-13','11:56:20','ssss');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (17,2,130121,130123,'St-17','St-19','2022-07-13','11:58:48','sss');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (18,4,130121,130125,'St-17','St-18','2022-07-13','12:03:25','ssss');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (19,2,130122,130122,'St-17','St-19','2022-07-13','12:05:00','sssss');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (20,3,130122,130122,'St-17','St-19','2022-07-13','12:05:52','ssss');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (21,3,130122,130123,'St-17','St-18','2022-07-13','02:13:08','wwwwwwww');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (22,3,130123,130123,'St-17','St-19','2022-07-13','02:17:43','ssss');
insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (23,3,130122,130123,'St-17','St-18','2022-07-13','02:22:57','sssss');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `permisos` */

insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (1,'on','on','on','on','on','on','on','on','on',130121);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (2,'off','off','off','off','off','on','on','on','on',130122);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (3,'on','on','on','on','on','on','on','on','on',130123);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (4,'on','on','on','on','on','on','on','on','on',130125);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (5,'on','on','on','on','on','on','on','on','on',130155);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (6,'on','on','on','on','on','on','on','on','on',130156);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (7,'off','off','off','off','off','on','on','on','on',130150);

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

/*Table structure for table `sub_menu` */

CREATE TABLE `sub_menu` (
  `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT,
  `sub_item` varchar(100) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id_sub_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `sub_menu` */

/*Table structure for table `tipo_activo` */

CREATE TABLE `tipo_activo` (
  `id_tipo_activo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tipo_activo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo_activo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipo_activo` */

insert  into `tipo_activo`(`id_tipo_activo`,`nom_tipo_activo`) values (1,'Tecnologico');
insert  into `tipo_activo`(`id_tipo_activo`,`nom_tipo_activo`) values (2,'Mobiliario');

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
  `Centro_costo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `rol_id` (`rol_id`),
  KEY `account_status_id` (`account_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130121,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',2,1,NULL);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130122,'U0NyaG5Ra2pPYTVWUjQ2OGpwTE9KckxudUhpWWpxOFVtdEdNb0dmMlMzdz0=','frank','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,2,NULL);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130123,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1,NULL);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130125,'YWNlOFBaVG5BaTVnZkg2R3dFdjh3Zz09','frank','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1,NULL);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130150,'LzFMSzl0Q3NxTTlLZFF6dWxzWFFxakg3anpmcVN3dEZaenlaeDFUVlpETT0=','juan','malaquias','superluis1994@gmail.com','img/imgPerfil/a1657895484.jpg',1,2,500);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
