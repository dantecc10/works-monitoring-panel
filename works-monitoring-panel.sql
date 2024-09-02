/*
 Navicat Premium Dump SQL

 Source Server         : BMDesign Work
 Source Server Type    : MariaDB
 Source Server Version : 101108 (10.11.8-MariaDB-0ubuntu0.24.04.1)
 Source Host           : 74.208.62.188:3306
 Source Schema         : works-monitoring-panel

 Target Server Type    : MariaDB
 Target Server Version : 101108 (10.11.8-MariaDB-0ubuntu0.24.04.1)
 File Encoding         : 65001

 Date: 02/09/2024 01:07:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id_project` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `name_project` varchar(255) NOT NULL,
  `description_project` text DEFAULT NULL,
  `owner_project` int(255) unsigned NOT NULL,
  `icon_project` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_project`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of projects
-- ----------------------------
BEGIN;
INSERT INTO `projects` (`id_project`, `name_project`, `description_project`, `owner_project`, `icon_project`) VALUES (2, 'Casas', 'Una nueva zona de casas', 1, NULL);
INSERT INTO `projects` (`id_project`, `name_project`, `description_project`, `owner_project`, `icon_project`) VALUES (3, 'Centro Comercial', 'Innovación para el futuro.', 1, NULL);
COMMIT;

-- ----------------------------
-- Table structure for tasks
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id_task` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `name_task` varchar(255) DEFAULT NULL,
  `description_task` text DEFAULT NULL,
  `id_project_task` int(255) unsigned NOT NULL,
  `id_team_task` int(255) unsigned NOT NULL,
  `date_task` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `progress_task` double(10,2) DEFAULT NULL,
  `comments_task` text DEFAULT NULL,
  `icon_task` varchar(255) DEFAULT NULL,
  `graphical_evidence_task` text DEFAULT NULL,
  PRIMARY KEY (`id_task`),
  KEY `id_project_task_tasks_fk` (`id_project_task`),
  KEY `id_team_task_tasks_fk` (`id_team_task`),
  CONSTRAINT `id_project_task_tasks_fk` FOREIGN KEY (`id_project_task`) REFERENCES `projects` (`id_project`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_team_task_tasks_fk` FOREIGN KEY (`id_team_task`) REFERENCES `teams` (`id_team`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tasks
-- ----------------------------
BEGIN;
INSERT INTO `tasks` (`id_task`, `name_task`, `description_task`, `id_project_task`, `id_team_task`, `date_task`, `progress_task`, `comments_task`, `icon_task`, `graphical_evidence_task`) VALUES (1, 'Estudio de suelo', 'Estudio y análisis técnico de las características de la obra para iniciar excavación.', 2, 3, NULL, 90.00, 'No hubo ningún percance o contratiempo.', NULL, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7xaid-IDh4QltXQzEGmRV5wxEjMeMcTcoTw&s,https://castelancarpinteyro.com');
INSERT INTO `tasks` (`id_task`, `name_task`, `description_task`, `id_project_task`, `id_team_task`, `date_task`, `progress_task`, `comments_task`, `icon_task`, `graphical_evidence_task`) VALUES (2, 'Registro a CFE', 'Se hicieron los trámites administrativos pertinenetes para solicitar un nuevo servicio eléctrico para el domicilio indicado.', 2, 1, NULL, 80.00, 'En las oficinas nos solicitaron esperar un mes.', NULL, 'https://www.cfe.mx/hogar/infcliente/AvisoRecibo/fte-avisorecibo.jpg');
INSERT INTO `tasks` (`id_task`, `name_task`, `description_task`, `id_project_task`, `id_team_task`, `date_task`, `progress_task`, `comments_task`, `icon_task`, `graphical_evidence_task`) VALUES (3, 'Registro a proveedor de agua', 'Se realizaron los trámites necesarios para solicitar al municipio una nueva toma de agua para la obra.', 2, 2, NULL, 100.00, 'El trámite fue rápido y exitoso.', NULL, 'https://tecolotito.elsiglodetorreon.com.mx/i/2019/03/1158348.jpeg');
COMMIT;

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id_team` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `id_user_team` int(255) unsigned NOT NULL,
  `icon_team` varchar(255) DEFAULT NULL,
  `work_area_team` int(255) NOT NULL,
  `phone_team` varchar(255) DEFAULT NULL,
  `mobile_team` varchar(255) NOT NULL,
  `company_team` varchar(255) DEFAULT NULL,
  `address_team` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_team`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of teams
-- ----------------------------
BEGIN;
INSERT INTO `teams` (`id_team`, `id_user_team`, `icon_team`, `work_area_team`, `phone_team`, `mobile_team`, `company_team`, `address_team`) VALUES (1, 1, 'https://www.un.edu.mx/wp-content/uploads/2023/03/Universidad-del-Norte-Que-es-la-administracion-de-ingenieria-Vale-la-pena-obtener-un-titulo-en-administracion-de-ingenieria-subtitulo.png', 3, '7979773095', '7979773095', 'Führer Industries', 'Calle 10 Norte');
INSERT INTO `teams` (`id_team`, `id_user_team`, `icon_team`, `work_area_team`, `phone_team`, `mobile_team`, `company_team`, `address_team`) VALUES (2, 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjaLdXIL9-N3H0PUfQfUDl7TDvq6Alpp9n0g&s', 1, '7979773095', '7979773095', 'Eléctrica \"Sánchez\"', 'Reforma 10');
INSERT INTO `teams` (`id_team`, `id_user_team`, `icon_team`, `work_area_team`, `phone_team`, `mobile_team`, `company_team`, `address_team`) VALUES (3, 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUhkp0j27SHSdJ-xqXXxVb1O8pxGRZV2bfYg&s', 2, '7979773095', '7979773095', 'Plomería \"Fernández\"', 'Héros 10');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `name_user` varchar(255) NOT NULL,
  `last_names_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `role_user` int(255) unsigned NOT NULL DEFAULT 1,
  `icon_user` text DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id_user`, `name_user`, `last_names_user`, `email_user`, `password_user`, `role_user`, `icon_user`) VALUES (1, 'Dante', 'Castelán Carpinteyro', 'dante@castelancarpinteyro.com', 'Monitoring24!!', 3, 'https://scontent.fpbc2-2.fna.fbcdn.net/v/t39.30808-6/438726139_420930503893183_4034903533625428250_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeHjQynBoClPltl0MnRGKs3l4PR0wOJy6VPg9HTA4nLpUzSePwz2vrCZjg4Cw6oBJWH_-EIBB70nqgY_baKieOo7&_nc_ohc=NUkQ4Ne0vOkQ7kNvgEDDGc1&_nc_ht=scontent.fpbc2-2.fna&oh=00_AYBVgAn_hDqR1Vb_rm7DYpZtN6UH0XnQlp90jJV8JjfDBw&oe=66B74380');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
