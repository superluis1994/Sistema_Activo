CREATE TABLE `account_status` (
  `id_account_status` INT(11) NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_account_status`)
) ENGINE=INNODB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

/*Data for the table `account_status` */

INSERT  INTO `account_status`(`id_account_status`,`status`) VALUES (1,'enabled');
INSERT  INTO `account_status`(`id_account_status`,`status`) VALUES (2,'disabled');
INSERT  INTO `account_status`(`id_account_status`,`status`) VALUES (3,'recargar');

/*Table structure for table `roles` */

CREATE TABLE `roles` (
  `id_rol` INT(11) NOT NULL AUTO_INCREMENT,
  `rol` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=INNODB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `roles` */

INSERT  INTO `roles`(`id_rol`,`rol`) VALUES (1,'Admin');
INSERT  INTO `roles`(`id_rol`,`rol`) VALUES (2,'usuario');
INSERT  INTO `roles`(`id_rol`,`rol`) VALUES (3,'supervisor');

/*Table structure for table `usuario` */

CREATE TABLE `usuario` (
  `id_user` INT(11) NOT NULL,
  `passw` VARCHAR(255) NOT NULL,
  `nom` VARCHAR(255) NOT NULL,
  `apellidos` VARCHAR(255) NOT NULL,
  `correo` VARCHAR(255) NOT NULL,
  `photo` TEXT DEFAULT NULL,
  `account_status_id` INT(11) NOT NULL,
  `rol_id` INT(11) NOT NULL,
  `Centro_costo` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `rol_id` (`rol_id`),
  KEY `account_status_id` (`account_status_id`),
  CONSTRAINT `fk_status` FOREIGN KEY (`account_status_id`) REFERENCES `account_status` (`id_account_status`),
  CONSTRAINT `fk_user_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

INSERT  INTO `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) VALUES (120125,'dmVVaVBOQ1lxMVV3U0cyK0NHS1ZzSVkrTWJMbVVoWHE3VkcwSDhNRUpqUT0=','lu','juarez','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,2,345);
INSERT  INTO `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) VALUES (120126,'REdiZGdIK3JWQ2cwc1duMU1HdjRzQlJpbDd0YmRoT21lTXZtMzZyY3BsOD0=','leo','ramirez','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,2,254);
INSERT  INTO `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`,`Centro_costo`) VALUES (130125,'YWNlOFBaVG5BaTVnZkg2R3dFdjh3Zz09','frank','sorto','superluis1994@gmail.com','img/recursos/foto_default.jpg',1,1,600);

/*Table structure for table `tipo_activo` */

CREATE TABLE `tipo_activo` (
  `id_tipo_activo` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_tipo_activo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_tipo_activo`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipo_activo` */

INSERT  INTO `tipo_activo`(`id_tipo_activo`,`nom_tipo_activo`) VALUES (1,'Tecnologico');
INSERT  INTO `tipo_activo`(`id_tipo_activo`,`nom_tipo_activo`) VALUES (2,'Mobiliario');

/*Table structure for table `conexiones` */

CREATE TABLE `conexiones` (
  `id_conexion` INT(11) NOT NULL AUTO_INCREMENT,
  `id_user` INT(11) DEFAULT NULL,
  `fecha` DATE DEFAULT NULL,
  `hora` TIME DEFAULT NULL,
  PRIMARY KEY (`id_conexion`),
  KEY `fk_conexion` (`id_user`),
  CONSTRAINT `fk_conexion` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) ENGINE=INNODB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4;

/*Data for the table `conexiones` */

INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (3,130125,'2022-06-29','02:57:39');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (4,130125,'2022-06-29','03:02:39');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (5,130125,'2022-06-29','03:03:49');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (6,130125,'2022-06-29','03:04:33');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (7,130125,'2022-06-29','03:04:35');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (8,130125,'2022-06-29','03:04:36');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (9,130125,'2022-06-29','03:04:37');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (10,130125,'2022-06-29','03:04:39');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (11,130125,'2022-06-29','03:04:40');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (12,130125,'2022-06-30','10:03:21');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (13,130125,'2022-06-30','05:57:59');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (14,130125,'2022-07-01','03:06:52');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (15,130125,'2022-07-03','09:28:35');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (16,130125,'2022-07-04','02:01:35');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (17,130125,'2022-07-04','02:09:49');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (18,130125,'2022-07-11','11:52:21');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (19,130125,'2022-07-11','03:31:01');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (20,130125,'2022-07-12','09:27:11');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (21,130125,'2022-07-12','10:43:18');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (22,130125,'2022-07-12','12:11:41');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (23,130125,'2022-07-12','12:14:46');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (24,130125,'2022-07-12','02:21:49');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (25,130125,'2022-07-12','02:26:42');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (26,130125,'2022-07-13','10:28:19');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (27,130125,'2022-07-15','09:12:29');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (28,130125,'2022-07-15','06:21:41');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (29,130125,'2022-07-15','06:23:26');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (30,130125,'2022-07-15','06:24:37');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (31,130125,'2022-07-15','06:25:02');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (32,130125,'2022-07-15','06:25:24');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (33,130125,'2022-07-15','06:25:57');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (34,130125,'2022-07-15','06:26:48');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (35,130125,'2022-07-15','06:28:07');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (36,130125,'2022-07-15','06:28:51');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (37,130125,'2022-07-15','06:33:51');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (38,130125,'2022-07-15','06:34:15');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (39,130125,'2022-07-15','06:34:49');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (40,130125,'2022-07-15','06:36:13');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (41,130125,'2022-07-15','06:36:40');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (42,130125,'2022-07-15','06:38:23');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (43,130125,'2022-07-15','06:41:43');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (44,130125,'2022-07-15','06:42:15');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (45,130125,'2022-07-15','06:46:27');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (46,130125,'2022-07-15','06:47:23');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (47,130125,'2022-07-15','06:51:28');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (48,130125,'2022-07-15','07:04:40');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (49,130125,'2022-07-16','01:21:30');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (50,130125,'2022-07-16','03:39:55');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (51,130125,'2022-07-16','03:41:23');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (52,130125,'2022-07-16','04:18:38');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (61,130125,'2022-07-18','10:26:26');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (62,130125,'2022-07-19','07:58:33');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (63,130125,'2022-07-19','08:04:08');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (64,130125,'2022-07-19','08:48:06');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (65,130125,'2022-07-20','09:28:49');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (66,130125,'2022-07-20','09:28:49');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (67,130125,'2022-07-20','02:30:54');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (70,130125,'2022-07-20','03:55:55');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (71,130125,'2022-07-20','03:56:24');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (72,130125,'2022-07-20','03:58:38');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (73,130125,'2022-07-20','03:59:16');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (74,130125,'2022-07-20','04:03:51');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (75,130125,'2022-07-20','04:04:37');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (76,130125,'2022-07-21','11:02:10');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (77,130125,'2022-07-22','02:41:45');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (78,130125,'2022-07-22','03:01:35');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (79,130125,'2022-07-24','06:49:52');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (80,130125,'2022-07-26','12:03:53');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (81,130125,'2022-07-26','12:07:20');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (82,130125,'2022-07-26','12:12:02');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (83,130125,'2022-07-26','12:27:01');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (84,130125,'2022-07-26','12:28:14');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (85,130125,'2022-07-26','12:29:33');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (86,130125,'2022-07-26','12:34:58');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (87,120126,'2022-07-26','12:35:14');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (88,120126,'2022-07-26','12:36:59');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (89,120126,'2022-07-26','12:38:36');
INSERT  INTO `conexiones`(`id_conexion`,`id_user`,`fecha`,`hora`) VALUES (90,130125,'2022-07-26','12:39:47');


/*Table structure for table `local` */

CREATE TABLE `local` (
  `id_local` VARCHAR(30) NOT NULL,
  `local_name` VARCHAR(255) DEFAULT NULL,
  `jefe_local` INT(11) DEFAULT NULL,
  `fecha_regis` DATE DEFAULT NULL,
  `registradoX` INT(11) DEFAULT NULL,
  `estatus` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id_local`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Data for the table `local` */

INSERT  INTO `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) VALUES ('sorto','luis',130122,'2022-06-30',130125,1);
INSERT  INTO `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) VALUES ('St-17','cafetin',130122,'2022-06-30',130125,1);
INSERT  INTO `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) VALUES ('St-18','Computo 2',130122,'2022-06-30',130125,1);
INSERT  INTO `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) VALUES ('St-19','Computo 1',130121,'2022-06-30',130125,1);
INSERT  INTO `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) VALUES ('St-20','Computo 3',130122,'2022-06-30',130125,1);
INSERT  INTO `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) VALUES ('St-21','Computo 4',130122,'2022-06-30',130125,1);
INSERT  INTO `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) VALUES ('St-22','Laboratorio',130125,'2022-06-30',130125,1);
INSERT  INTO `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) VALUES ('St-23','Camputo 5',130125,'2022-07-03',130125,1);
INSERT  INTO `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) VALUES ('St-24','Computo 6',130125,'2022-07-03',130125,1);
INSERT  INTO `local`(`id_local`,`local_name`,`jefe_local`,`fecha_regis`,`registradoX`,`estatus`) VALUES ('St-25','Computo 7',130125,'2022-07-03',130125,1);


/*Table structure for table `inventario` */

CREATE TABLE `inventario` (
  `id_activo` VARCHAR(30) NOT NULL,
  `codigo_mined` VARCHAR(255) DEFAULT NULL,
  `codigo_interno` VARCHAR(255) DEFAULT NULL,
  `nom_activo` VARCHAR(255) NOT NULL,
  `tipo_activo` INT(11) NOT NULL,
  `descrip_activo` TEXT NOT NULL,
  `valor_activo` INT(11) NOT NULL,
  `marca` VARCHAR(255) NOT NULL,
  `modelo` VARCHAR(255) NOT NULL,
  `dimensiones` VARCHAR(255) NOT NULL,
  `serie` VARCHAR(255) NOT NULL,
  `vida_util` INT(11) NOT NULL,
  `id_local` VARCHAR(255) NOT NULL,
  `id_reposable` INT(11) NOT NULL,
  `foto` TEXT NOT NULL,
  `fecha_resg` DATE NOT NULL,
  `color` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_activo`),
  KEY `fk_tipo_activo` (`tipo_activo`),
  KEY `fk_resposable` (`id_reposable`),
  KEY `fk_local` (`id_local`),
  CONSTRAINT `fk_local` FOREIGN KEY (`id_local`) REFERENCES `local` (`id_local`),
  CONSTRAINT `fk_resposable` FOREIGN KEY (`id_reposable`) REFERENCES `usuario` (`id_user`),
  CONSTRAINT `fk_tipo_activo` FOREIGN KEY (`tipo_activo`) REFERENCES `tipo_activo` (`id_tipo_activo`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

/*Data for the table `inventario` */

INSERT  INTO `inventario`(`id_activo`,`codigo_mined`,`codigo_interno`,`nom_activo`,`tipo_activo`,`descrip_activo`,`valor_activo`,`marca`,`modelo`,`dimensiones`,`serie`,`vida_util`,`id_local`,`id_reposable`,`foto`,`fecha_resg`,`color`) VALUES ('232','324566777','567788','Mesa',1,'mesa negra hecha de caoba sdsdsdffjfjfjjfjfjjffffffffffffffffff kkkdkkdfkgkkrkektkktkykyssdsfdgfhfss',125,'E/s','E/s','4x4x4','34567',5,'St-18',130125,'img/recursos/foto_default.jpg','0000-00-00','');
INSERT  INTO `inventario`(`id_activo`,`codigo_mined`,`codigo_interno`,`nom_activo`,`tipo_activo`,`descrip_activo`,`valor_activo`,`marca`,`modelo`,`dimensiones`,`serie`,`vida_util`,`id_local`,`id_reposable`,`foto`,`fecha_resg`,`color`) VALUES ('2324','4885886867','57577767768','PC',1,'Esta pc es una intel de 6ta generacion',400,'Dell','espiron','4X5','334567',5,'St-18',130125,'img/recursos/foto_default.jpg','2022-07-24','');
INSERT  INTO `inventario`(`id_activo`,`codigo_mined`,`codigo_interno`,`nom_activo`,`tipo_activo`,`descrip_activo`,`valor_activo`,`marca`,`modelo`,`dimensiones`,`serie`,`vida_util`,`id_local`,`id_reposable`,`foto`,`fecha_resg`,`color`) VALUES ('233','74757866','4567','silla',1,'silla de ',30,'E/s','E/s','4x3','5678',5,'St-18',130125,'img/recursos/foto_default.jpg','0000-00-00','');
INSERT  INTO `inventario`(`id_activo`,`codigo_mined`,`codigo_interno`,`nom_activo`,`tipo_activo`,`descrip_activo`,`valor_activo`,`marca`,`modelo`,`dimensiones`,`serie`,`vida_util`,`id_local`,`id_reposable`,`foto`,`fecha_resg`,`color`) VALUES ('234566789','34354657786879','23245657768','PRUEBA',2,'Sllslslslldldllfllglhllhlh',60,'N/s','N/s','N/s','23456777',3,'St-19',120126,'img/imgPerfil/a1658857404.jpg','2022-07-26','PIEL');
INSERT  INTO `inventario`(`id_activo`,`codigo_mined`,`codigo_interno`,`nom_activo`,`tipo_activo`,`descrip_activo`,`valor_activo`,`marca`,`modelo`,`dimensiones`,`serie`,`vida_util`,`id_local`,`id_reposable`,`foto`,`fecha_resg`,`color`) VALUES ('453233456','464444444444444','3666666666666664','PC',1,'Es una computadora intel con i8 6 gb de ram ',500,'DELL','GT-5869999','1080x720','46466464474',6,'St-19',120125,'img/imgPerfil/a1658674211.jpg','2022-07-24','NEGRA');

/*Table structure for table `tipo_movimiento` */

CREATE TABLE `tipo_movimiento` (
  `id_mov` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo_mov` VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (`id_mov`)
) ENGINE=INNODB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipo_movimiento` */

INSERT  INTO `tipo_movimiento`(`id_mov`,`tipo_mov`) VALUES (1,'Prestamo');
INSERT  INTO `tipo_movimiento`(`id_mov`,`tipo_mov`) VALUES (2,'Traslado');
INSERT  INTO `tipo_movimiento`(`id_mov`,`tipo_mov`) VALUES (3,'Salida');
INSERT  INTO `tipo_movimiento`(`id_mov`,`tipo_mov`) VALUES (4,'Baja');
INSERT  INTO `tipo_movimiento`(`id_mov`,`tipo_mov`) VALUES (5,'Otro');




/*Table structure for table `list_movimientos` */

CREATE TABLE `list_movimientos` (
  `id_lis_mov` INT(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_mov` INT(11) NOT NULL,
  `id_user_entrega` INT(11) NOT NULL,
  `id_user_recibe` INT(11) NOT NULL,
  `id_local_salida` VARCHAR(30) NOT NULL,
  `id_local_destino` VARCHAR(30) NOT NULL,
  `fecha_mov` DATE NOT NULL,
  `hora_mov` TIME NOT NULL,
  `justi_mov` TEXT NOT NULL,
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
) ENGINE=INNODB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4;

/*Data for the table `list_movimientos` */

INSERT  INTO `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) VALUES (146,2,120125,120126,'St-17','St-18','2022-07-20','10:05:12','sssshdhfjjgkgfkgkfglfgklfkgldndlnsjdsfjshhjskfjknfjkushadgdhsbdjsbdjsbhdbjsjdbsbdjsbdhhdsdfghjjkklss');
INSERT  INTO `list_movimientos`(`id_lis_mov`,`id_tipo_mov`,`id_user_entrega`,`id_user_recibe`,`id_local_salida`,`id_local_destino`,`fecha_mov`,`hora_mov`,`justi_mov`) VALUES (147,2,120126,120126,'St-18','St-19','2022-07-24','08:56:21','Sssssss');

/*Table structure for table `detalle_movimientos` */

CREATE TABLE `detalle_movimientos` (
  `id_detalle_Mov` INT(11) NOT NULL AUTO_INCREMENT,
  `id_mov` INT(11) NOT NULL,
  `id_activos` TEXT NOT NULL,
  PRIMARY KEY (`id_detalle_Mov`),
  KEY `fk_detalle_mov` (`id_mov`),
  CONSTRAINT `fk_detalle_mov` FOREIGN KEY (`id_mov`) REFERENCES `list_movimientos` (`id_lis_mov`)
) ENGINE=INNODB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detalle_movimientos` */

INSERT  INTO `detalle_movimientos`(`id_detalle_Mov`,`id_mov`,`id_activos`) VALUES (17,146,'233,232');
INSERT  INTO `detalle_movimientos`(`id_detalle_Mov`,`id_mov`,`id_activos`) VALUES (18,147,'453233456');

/*Table structure for table `permisos` */

CREATE TABLE `permisos` (
  `id_permisos` INT(11) NOT NULL AUTO_INCREMENT,
  `registrar_usu` VARCHAR(20) DEFAULT NULL,
  `list_usu` VARCHAR(20) DEFAULT NULL,
  `conexion` VARCHAR(20) DEFAULT NULL,
  `mover_activos` VARCHAR(20) DEFAULT NULL,
  `list_movimiento_activo` VARCHAR(20) DEFAULT NULL,
  `regist_producto` VARCHAR(20) DEFAULT NULL,
  `mostr_producto` VARCHAR(20) DEFAULT NULL,
  `regist_local` VARCHAR(20) DEFAULT NULL,
  `mostr_local` VARCHAR(20) DEFAULT NULL,
  `id_user` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id_permisos`),
  KEY `fk_user_permisos` (`id_user`),
  CONSTRAINT `fk_user_permisos` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) ENGINE=INNODB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `permisos` */

INSERT  INTO `permisos`(`id_permisos`,`registrar_usu`,`list_usu`,`conexion`,`mover_activos`,`list_movimiento_activo`,`regist_producto`,`mostr_producto`,`regist_local`,`mostr_local`,`id_user`) VALUES (4,'on','on','on','on','on','on','on','on','on',130125);


