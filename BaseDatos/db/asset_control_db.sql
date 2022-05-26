CREATE TABLE `account_status` (
  `id_account_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id_account_status`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;


insert  into `account_status`(`id_account_status`,`status`) values (33,'enabled');
insert  into `account_status`(`id_account_status`,`status`) values (44,'disabled');



CREATE TABLE `connections` (
  `id_connection` int(255) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id_connection`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `connections_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `menu_usuario` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(100) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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



CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;


insert  into `roles`(`id_rol`,`rol`) values (1,'Admin');
insert  into `roles`(`id_rol`,`rol`) values (2,'usuario');
insert  into `roles`(`id_rol`,`rol`) values (3,'supervisor');
insert  into `roles`(`id_rol`,`rol`) values (4,'francela');



CREATE TABLE `sub_menu` (
  `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT,
  `sub_item` varchar(100) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id_sub_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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



insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (43567,'c0luMVZUWHVnYVpPSWg1U282TlBONnZVRld6TWhHUmpuSGdjYlB6YnlYST0=','luis','kkdf','superluis1994@gmail.com','jssjjs/sjsjjsjs.jpg',1,1);
insert  into `usuario`(`id_user`,`passw`,`nom`,`apellidos`,`correo`,`photo`,`account_status_id`,`rol_id`) values (435678495,'a1RYK2xka1l0bTlVZDhuTE81S1MxTWUwTTk2MWlWWlYyMnhDRmZtSFo3Yz0=','luis','kkdf','superluis1994@gmail.com','jssjjs/sjsjjsjs.jpg',1,1);



DELIMITER $$

CREATE PROCEDURE crubusuario(
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

END $$
DELIMITER ;



DELIMITER $$

CREATE PROCEDURE Sel_Elim_usuario(
IN accion INTEGER,
IN _id_user INT)
BEGIN
IF accion = 1 THEN
DELETE FROM usuario WHERE id_user = _id_user;
END IF;

IF accion = 2 THEN
SELECT * FROM usuario WHERE id_user = _id_user;
END IF;

END $$
DELIMITER ;

