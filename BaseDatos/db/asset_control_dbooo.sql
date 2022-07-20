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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

/*Data for the table `conexiones` */

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
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (27,130125,'2022-07-15','09:12:29');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (28,130125,'2022-07-15','06:21:41');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (29,130125,'2022-07-15','06:23:26');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (30,130125,'2022-07-15','06:24:37');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (31,130125,'2022-07-15','06:25:02');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (32,130125,'2022-07-15','06:25:24');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (33,130125,'2022-07-15','06:25:57');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (34,130125,'2022-07-15','06:26:48');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (35,130125,'2022-07-15','06:28:07');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (36,130125,'2022-07-15','06:28:51');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (37,130125,'2022-07-15','06:33:51');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (38,130125,'2022-07-15','06:34:15');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (39,130125,'2022-07-15','06:34:49');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (40,130125,'2022-07-15','06:36:13');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (41,130125,'2022-07-15','06:36:40');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (42,130125,'2022-07-15','06:38:23');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (43,130125,'2022-07-15','06:41:43');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (44,130125,'2022-07-15','06:42:15');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (45,130125,'2022-07-15','06:46:27');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (46,130125,'2022-07-15','06:47:23');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (47,130125,'2022-07-15','06:51:28');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (48,130125,'2022-07-15','07:04:40');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (49,130125,'2022-07-16','01:21:30');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (50,130125,'2022-07-16','03:39:55');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (51,130125,'2022-07-16','03:41:23');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (52,130125,'2022-07-16','04:18:38');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (53,130121,'2022-07-16','04:26:47');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (54,130121,'2022-07-16','04:27:59');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (55,130121,'2022-07-16','04:29:29');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (56,130121,'2022-07-18','10:06:49');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (57,130121,'2022-07-18','10:15:12');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (58,130121,'2022-07-18','10:17:15');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (59,130121,'2022-07-18','10:19:10');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (60,130121,'2022-07-18','10:20:03');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (61,130125,'2022-07-18','10:26:26');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (62,130125,'2022-07-19','07:58:33');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (63,130125,'2022-07-19','08:04:08');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (64,130125,'2022-07-19','08:48:06');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (65,130125,'2022-07-20','09:28:49');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (66,130125,'2022-07-20','09:28:49');
insert  into `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) values (67,130125,'2022-07-20','02:30:54');

/*Table structure for table `detalle_movimientos` */

CREATE TABLE `detalle_movimientos` (
  `id_detalle_Mov` int(11) NOT NULL AUTO_INCREMENT,
  `id_mov` int(11) NOT NULL,
  `id_activos` text NOT NULL,
  PRIMARY KEY (`id_detalle_Mov`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detalle_movimientos` */

insert  into `detalle_movimientos`(`id_detalle_Mov`,`id_mov`,`id_activos`) values (17,146,'233,232');

/*Table structure for table `inventario` */

CREATE TABLE `inventario` (
  `id_activo` varchar(30) NOT NULL,
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

insert  into `inventario`(`id_activo`,`codigo_mined`,`codigo_interno`,`nom_activo`,`tipo_activo`,`descrip_activo`,`valor_activo`,`marca`,`modelo`,`dimensiones`,`serie`,`vida_util`,`id_local`,`id_reposable`,`foto`,`fecha_resg`) values ('232','324566777','567788','Mesa',1,'mesa negra hecha de caoba',125,'E/s','E/s','4x4x4','34567',5,'St-18',130125,'img/recursos/foto_default.jpg',NULL);
insert  into `inventario`(`id_activo`,`codigo_mined`,`codigo_interno`,`nom_activo`,`tipo_activo`,`descrip_activo`,`valor_activo`,`marca`,`modelo`,`dimensiones`,`serie`,`vida_util`,`id_local`,`id_reposable`,`foto`,`fecha_resg`) values ('233','74757866','4567','silla',1,'silla de ',30,'E/s','E/s','4x3','5678',5,'St-18',130125,'img/recursos/foto_default.jpg',NULL);

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
  PRIMARY KEY (`id_lis_mov`),
  KEY `fk_tipoM_listM` (`id_tipo_mov`),
  KEY `fk_usur_listE` (`id_user_entrega`),
  KEY `fk_user_listR` (`id_user_recibe`),
  KEY `fk_local_mS` (`id_local_salida`),
  KEY `fk_local_mD` (`id_local_destino`),
  CONSTRAINT `fk_local_mD` FOREIGN KEY (`id_local_destino`) REFERENCES `local` (`id_local`),
  CONSTRAINT `fk_local_mS` FOREIGN KEY (`id_local_salida`) REFERENCES `local` (`id_local`),
  CONSTRAINT `fk_tipoM_listM` FOREIGN KEY (`id_tipo_mov`) REFERENCES `tipo_movimiento` (`id_mov`),
  CONSTRAINT `fk_user_listR` FOREIGN KEY (`id_user_recibe`) REFERENCES `usuario` (`id_user`),
  CONSTRAINT `fk_usur_listE` FOREIGN KEY (`id_user_entrega`) REFERENCES `usuario` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4;

/*Data for the table `list_movimientos` */

insert  into `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) values (146,2,120125,120126,'St-17','St-18','2022-07-20','10:05:12','sss');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `permisos` */

insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (1,'on','on','on','on','on','on','on','on','on',130121);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (2,'off','off','off','off','off','on','on','on','on',130122);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (3,'on','on','on','on','on','on','on','on','on',130123);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (4,'on','on','on','on','on','on','on','on','on',130125);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (5,'on','on','on','on','on','on','on','on','on',130155);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (6,'on','on','on','on','on','on','on','on','on',130156);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (7,'off','off','off','off','off','on','on','on','on',130150);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (8,'off','off','off','off','off','on','on','on','on',120125);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (9,'off','off','off','off','off','on','on','on','on',120126);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (10,'off','off','off','off','off','on','on','on','on',120127);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (11,'off','off','off','off','off','on','on','on','on',120128);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (12,'off','off','off','off','off','on','on','on','on',120129);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (13,'off','off','off','off','off','on','on','on','on',120130);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (14,'off','off','off','off','off','on','on','on','on',120131);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (15,'off','off','off','off','off','on','on','on','on',120133);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (16,'on','on','on','on','on','on','on','on','on',130190);
insert  into `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) values (17,'on','on','on','on','on','on','on','on','on',130180);

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
  KEY `account_status_id` (`account_status_id`),
  CONSTRAINT `fk_user_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (1301,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1,NULL);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (120125,'dmVVaVBOQ1lxMVV3U0cyK0NHS1ZzSVkrTWJMbVVoWHE3VkcwSDhNRUpqUT0=','lu','juarez','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,2,345);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (120126,'REdiZGdIK3JWQ2cwc1duMU1HdjRzQlJpbDd0YmRoT21lTXZtMzZyY3BsOD0=','leo','ramirez','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,2,254);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (120127,'OGtoeDg5S01iWmxwZ1J1QURkR2JrL2x2OFFRbVl6UEJWSjRKS2dodndRST0=','pedro','velado','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,2,345);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (120128,'ZjJENFVUMk4vclZYYWVvWVUvc3JaeUs5RjRoUzJ2bElqZktFU3lRK25DWT0=','juan','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,2,445);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (120129,'NUJzYVVDSzhlcmI0T3VNRGloVkFOQ00xMkJxSE1VUzM5K3A0Z0xRY2N2MD0=','karl','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,2,445);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (120130,'c3laM0pRREROVjhhZit1Q3I4SjcwT25OTWxZV1Iyek4wL293aTdXNGNZOD0=','dina','sorto','superluis@dd.com','img/recursos/foto_default.jpg',1,2,254);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (120131,'N1RWREZVUW0wdjd3OE1rOFN1WW4wN2MxdDQ0MTUyZk1LTnlOeEJYcEkrST0=','jonathan','sorto','superluis@dd.com','img/recursos/foto_default.jpg',1,2,445);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (120133,'d2l1Q0JOd1ZwSURWVEtQSTNoQU94RHJIRjI1alRZSVBmbEVJaUxrbEMwbz0=','sebas','sorto','luis@ddd.com','img/recursos/foto_default.jpg',1,2,254);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130100,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1,NULL);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130102,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1,NULL);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130105,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1,NULL);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130106,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1,345);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130121,'ZUt3U0ZsazhlTThZZHU3aU8yVXhJUT09','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,3,300);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130122,'U0NyaG5Ra2pPYTVWUjQ2OGpwTE9KckxudUhpWWpxOFVtdEdNb0dmMlMzdz0=','frank','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,2,1000);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130123,'WkpOTWpsUkxCbFR3TENpTVJDWFMyaG9MRVZ3Z0ZJTU1KSVhFakszc3hiVT0=','luis','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1,500);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130125,'YWNlOFBaVG5BaTVnZkg2R3dFdjh3Zz09','frank','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1,600);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130150,'LzFMSzl0Q3NxTTlLZFF6dWxzWFFxakg3anpmcVN3dEZaenlaeDFUVlpETT0=','juan','malaquias','superluis1994@gmail.com','img/imgPerfil/a1657895484.jpg',1,1,500);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130180,'Mkt0clVuSTk2enU4bEVsbGhDMTIvVksvWDFFNk16amVaRU5KT1VBTDBIdz0=','topoyiyo','minuta','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1,500);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) values (130190,'REl3NG9WTjd1bEVNSmc5ME53OHMvS2VXeWhSQllJUUJxV3Mzc3JxUHVuND0=','oscar','Dias','luis@ddd.com','img/recursos/foto_default.jpg',1,1,500);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
