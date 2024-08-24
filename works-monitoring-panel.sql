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

 Date: 17/08/2024 16:12:05
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

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
  `progress_task` double(10,2) DEFAULT NULL,
  `comments_task` text DEFAULT NULL,
  `icon_task` varchar(255) DEFAULT NULL,
  `graphical_evidence_task` text DEFAULT NULL,
  PRIMARY KEY (`id_task`),
  KEY `id_project_task_tasks_fk` (`id_project_task`),
  KEY `id_team_task_tasks_fk` (`id_team_task`),
  CONSTRAINT `id_project_task_tasks_fk` FOREIGN KEY (`id_project_task`) REFERENCES `projects` (`id_project`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_team_task_tasks_fk` FOREIGN KEY (`id_team_task`) REFERENCES `teams` (`id_team`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

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
  `role_user` int(255) unsigned NOT NULL,
  `icon_user` text DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

SET FOREIGN_KEY_CHECKS = 1;
