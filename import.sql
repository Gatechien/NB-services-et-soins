-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `administrative_department`;
CREATE TABLE `administrative_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname_of_deceased` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname_of_deceased` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maiden_name_of_deceased` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress_deceased` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code_of_deceased` int(11) NOT NULL,
  `city_of_deceased` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_deceased` date NOT NULL,
  `place_of_deceased` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `babysitting_service`;
CREATE TABLE `babysitting_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number_child` int(11) NOT NULL,
  `number_hour` int(11) NOT NULL,
  `content` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `babysitting_service_days`;
CREATE TABLE `babysitting_service_days` (
  `babysitting_service_id` int(11) NOT NULL,
  `days_id` int(11) NOT NULL,
  PRIMARY KEY (`babysitting_service_id`,`days_id`),
  KEY `IDX_12FF5953A2128973` (`babysitting_service_id`),
  KEY `IDX_12FF59533575FA99` (`days_id`),
  CONSTRAINT `FK_12FF59533575FA99` FOREIGN KEY (`days_id`) REFERENCES `days` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_12FF5953A2128973` FOREIGN KEY (`babysitting_service_id`) REFERENCES `babysitting_service` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `babysitting_service_intervention`;
CREATE TABLE `babysitting_service_intervention` (
  `babysitting_service_id` int(11) NOT NULL,
  `intervention_id` int(11) NOT NULL,
  PRIMARY KEY (`babysitting_service_id`,`intervention_id`),
  KEY `IDX_2593750FA2128973` (`babysitting_service_id`),
  KEY `IDX_2593750F8EAE3863` (`intervention_id`),
  CONSTRAINT `FK_2593750F8EAE3863` FOREIGN KEY (`intervention_id`) REFERENCES `intervention` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_2593750FA2128973` FOREIGN KEY (`babysitting_service_id`) REFERENCES `babysitting_service` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `administrative_department_id` int(11) DEFAULT NULL,
  `babysitting_service_id` int(11) DEFAULT NULL,
  `housekeeping_id` int(11) DEFAULT NULL,
  `personal_assistance_service_id` int(11) DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maiden_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int(11) NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferency` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4C62E6387E4350FB` (`administrative_department_id`),
  UNIQUE KEY `UNIQ_4C62E638A2128973` (`babysitting_service_id`),
  UNIQUE KEY `UNIQ_4C62E6382839160B` (`housekeeping_id`),
  UNIQUE KEY `UNIQ_4C62E638F80D8CE9` (`personal_assistance_service_id`),
  CONSTRAINT `FK_4C62E6382839160B` FOREIGN KEY (`housekeeping_id`) REFERENCES `housekeeping` (`id`),
  CONSTRAINT `FK_4C62E6387E4350FB` FOREIGN KEY (`administrative_department_id`) REFERENCES `administrative_department` (`id`),
  CONSTRAINT `FK_4C62E638A2128973` FOREIGN KEY (`babysitting_service_id`) REFERENCES `babysitting_service` (`id`),
  CONSTRAINT `FK_4C62E638F80D8CE9` FOREIGN KEY (`personal_assistance_service_id`) REFERENCES `personal_assistance_service` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `days`;
CREATE TABLE `days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `days` (`id`, `name`) VALUES
(1,	'Lundi'),
(2,	'Mardi'),
(3,	'Mercredi'),
(4,	'Jeudi'),
(5,	'Vendredi');

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220801124128',	'2022-08-01 14:41:40',	239);

DROP TABLE IF EXISTS `frequency`;
CREATE TABLE `frequency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `frequency` (`id`, `type`) VALUES
(1,	'Hebdomadaire'),
(2,	'Une fois par semaine'),
(3,	'Une fois par quinzaine'),
(4,	'Une fois par mois'),
(5,	'Ponctuel');

DROP TABLE IF EXISTS `housekeeping`;
CREATE TABLE `housekeeping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number_hour` int(11) NOT NULL,
  `content` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `housekeeping_frequency`;
CREATE TABLE `housekeeping_frequency` (
  `housekeeping_id` int(11) NOT NULL,
  `frequency_id` int(11) NOT NULL,
  PRIMARY KEY (`housekeeping_id`,`frequency_id`),
  KEY `IDX_E74402272839160B` (`housekeeping_id`),
  KEY `IDX_E744022794879022` (`frequency_id`),
  CONSTRAINT `FK_E74402272839160B` FOREIGN KEY (`housekeeping_id`) REFERENCES `housekeeping` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_E744022794879022` FOREIGN KEY (`frequency_id`) REFERENCES `frequency` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `intervention`;
CREATE TABLE `intervention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moment` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `intervention` (`id`, `moment`) VALUES
(1,	'Matin'),
(2,	'Déjeuner'),
(3,	'Après-midi'),
(4,	'Diner'),
(5,	'Soir');

DROP TABLE IF EXISTS `personal_assistance`;
CREATE TABLE `personal_assistance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `personal_assistance` (`id`, `type`) VALUES
(1,	'Toilette'),
(2,	'Douche'),
(3,	'Préparations des repas'),
(4,	'Prise de repas'),
(5,	'Courses'),
(6,	'Lever'),
(7,	'Entretien du logement');

DROP TABLE IF EXISTS `personal_assistance_service`;
CREATE TABLE `personal_assistance_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `financial_help` tinyint(1) NOT NULL,
  `content` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_hour` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_assistance_service_intervention`;
CREATE TABLE `personal_assistance_service_intervention` (
  `personal_assistance_service_id` int(11) NOT NULL,
  `intervention_id` int(11) NOT NULL,
  PRIMARY KEY (`personal_assistance_service_id`,`intervention_id`),
  KEY `IDX_9BB3BD1EF80D8CE9` (`personal_assistance_service_id`),
  KEY `IDX_9BB3BD1E8EAE3863` (`intervention_id`),
  CONSTRAINT `FK_9BB3BD1E8EAE3863` FOREIGN KEY (`intervention_id`) REFERENCES `intervention` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_9BB3BD1EF80D8CE9` FOREIGN KEY (`personal_assistance_service_id`) REFERENCES `personal_assistance_service` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_assistance_service_personal_assistance`;
CREATE TABLE `personal_assistance_service_personal_assistance` (
  `personal_assistance_service_id` int(11) NOT NULL,
  `personal_assistance_id` int(11) NOT NULL,
  PRIMARY KEY (`personal_assistance_service_id`,`personal_assistance_id`),
  KEY `IDX_E49F14ADF80D8CE9` (`personal_assistance_service_id`),
  KEY `IDX_E49F14ADCE7BF740` (`personal_assistance_id`),
  CONSTRAINT `FK_E49F14ADCE7BF740` FOREIGN KEY (`personal_assistance_id`) REFERENCES `personal_assistance` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_E49F14ADF80D8CE9` FOREIGN KEY (`personal_assistance_service_id`) REFERENCES `personal_assistance_service` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_order` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `url_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `image_dimensions` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:simple_array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `recruitment`;
CREATE TABLE `recruitment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  `published_on` date DEFAULT NULL,
  `title_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_description2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_description3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description3` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `we_search` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `avantage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licence_requeried` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_requeried` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drive_license` tinyint(1) NOT NULL,
  `type_contrat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deplacement_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_off` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opportunity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_hour` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `recruitment` (`id`, `title`, `visibility`, `published_on`, `title_description`, `description`, `title_description2`, `description2`, `title_description3`, `description3`, `we_search`, `avantage`, `licence_requeried`, `experience_requeried`, `drive_license`, `type_contrat`, `salary`, `deplacement_info`, `day_off`, `opportunity`, `working_hour`) VALUES
(1,	'AVS ou AMP ou Aide-soignante',	1,	'2022-08-03',	'Aide à la personne',	'Aide à la toilette, aide à l\'habillage, aide au lever, aide aux déplacements, courses, préparation et aide à la  prise de repas, accompagnement aux sorties',	'Aides ménagères',	'Entretien du linge, entretien du cadre de vie, ménage',	'Garde d\'enfants',	'Accompagnement aux gestes de la vie quotidienne, aide au repas, accompagnement aux sorties, aide aux devoirs pour un enfant en situation de handicap (dès septembre 2022)',	'Nous recherchons une personne polyvalente, aimant prendre des initiatives, ayant un sens de l\'organisation, aimant le relationnel avec les bénéficiaires et le partage avec ses collègues de travail.',	'Voiture de société selon disponibilité et planning, des plannings permettant d\'équilibrer vie personnelle et professionnelle, entreprise à taille humaine, chèque cadeau',	'Être titulaire d\'un diplôme ou titre de niveau V (auxiliaire de vie, aide médico psychologique, assistante de vie, aide-soignante, auxiliaire de gérontologie ) ou diplôme CAP petite enfance ou expérience dans la garde d\'enfant',	NULL,	1,	'CDI à temps partiel',	'À partir de 11,07 € brut de l\'heure et valorisation selon profil et expérience',	'Frais kilométriques à 0,40 € si véhicule de société non disponible',	'Tous les mercredis',	'Prise de poste dès que possible, venez nous rejoindre!!',	'100 heures par mois évolutif');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1,	'nbsstest1@gmail.com',	'[\"ROLE_ADMIN\"]',	'$2y$13$IXIk24oxZTrshcxotczgIOmBqYEtGG3T0WZGUNaGTmPaw4D8HRptW'),
(5,	'nbsstest2@gmail.com',	'[\"ROLE_ADMIN\"]',	'$2y$13$7Bykcrk753g9INzeISCcz.g7xhpSKBxiMjUgWicWZT9s5WCvx5lp.');

-- 2022-08-03 14:43:23