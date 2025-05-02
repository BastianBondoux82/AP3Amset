-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 27 nov. 2024 à 07:01
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `amset`
--

CREATE DATABASE IF NOT EXISTS amset;

-- --------------------------------------------------------

--
-- Structure de la table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_groups_users_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(1, 1, 'admin', '2024-11-22 14:42:00'),
(2, 2, 'com', '2024-11-22 14:42:12'),
(3, 3, 'rhu', '2024-11-22 14:42:20');

-- --------------------------------------------------------

--
-- Structure de la table `auth_identities`
--

DROP TABLE IF EXISTS `auth_identities`;
CREATE TABLE IF NOT EXISTS `auth_identities` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_secret` (`type`,`secret`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', NULL, 'admin@amset.com', '$2y$12$phHsmH2eL/BhoYpVTn/x1.IaMF/TBlPe0QPewFekW7UL/8319/J4.', NULL, NULL, 0, '2024-11-27 06:57:13', '2024-11-22 14:40:39', '2024-11-27 06:57:13'),
(2, 2, 'email_password', NULL, 'com@amset.com', '$2y$12$xJfMAdcrtS4UlN0Ie6r4R.Xbcw/xFY2vRAeMu42huZy1M65pJtzJS', NULL, NULL, 0, '2024-11-22 14:55:54', '2024-11-22 14:41:05', '2024-11-22 14:55:54'),
(3, 3, 'email_password', NULL, 'rhu@amset.com', '$2y$12$uyOai8V8DNQoI0o9l7d2vOkVYPBXPFXyC2brq/tRhQyM8Ojb/m/ky', NULL, NULL, 0, NULL, '2024-11-22 14:41:22', '2024-11-22 14:41:22');

-- --------------------------------------------------------

--
-- Structure de la table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@amset.com', 1, '2024-11-22 14:44:01', 1),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'com@amset.com', 2, '2024-11-22 14:55:54', 1),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@amset.com', 1, '2024-11-22 15:24:30', 1),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'email_password', 'admin@amset.com', 1, '2024-11-27 06:57:13', 1);

-- --------------------------------------------------------

--
-- Structure de la table `auth_permissions_users`
--

DROP TABLE IF EXISTS `auth_permissions_users`;
CREATE TABLE IF NOT EXISTS `auth_permissions_users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_permissions_users_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `auth_remember_tokens`
--

DROP TABLE IF EXISTS `auth_remember_tokens`;
CREATE TABLE IF NOT EXISTS `auth_remember_tokens` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `auth_remember_tokens_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `auth_token_logins`
--

DROP TABLE IF EXISTS `auth_token_logins`;
CREATE TABLE IF NOT EXISTS `auth_token_logins` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_CLIENT` int NOT NULL AUTO_INCREMENT,
  `RAISON_SOCIAL` char(64) DEFAULT NULL,
  `CONTACT` char(32) DEFAULT NULL,
  `EMAIL_CLIENT` char(64) DEFAULT NULL,
  `NUM_TELEPHONE_CLIENT` char(10) DEFAULT NULL,
  `ADRESSE_CLIENT` char(64) DEFAULT NULL,
  `CODE_POSTAL_CLIENT` int DEFAULT NULL,
  `VILLE_CLIENT` char(64) DEFAULT NULL,
  `PHOTO_CLIENT` longblob,
  PRIMARY KEY (`ID_CLIENT`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID_CLIENT`, `RAISON_SOCIAL`, `CONTACT`, `EMAIL_CLIENT`, `NUM_TELEPHONE_CLIENT`, `ADRESSE_CLIENT`, `CODE_POSTAL_CLIENT`, `VILLE_CLIENT`, `PHOTO_CLIENT`) VALUES
(1, 'EDF', 'Ghosn', 'Ghosn@email.com', '856941235', '125 chemin de l entourloupe', 76600, 'HAVRE', NULL),
(2, 'Mairie de Toulouse', 'Martin', 'Martin@email.com', '0523148759', '24 rue du Mirail', 31000, 'TOULOUSE', NULL),
(3, 'basic-fit', 'Bernard', 'Bernard@email.com', '0482945624', '123 route du sport', 69100, 'LYON', NULL),
(4, 'Leclerc', 'Dupont', 'Dupont@email.com', '0586952312', '175 route de la ferronerie', 13766, 'MARSEILLE', NULL),
(5, 'Ubisoft', 'Thomas', 'Thomas@email.com', '759621342', '13, chemin du parpaint', 83330, 'CASTELLET', NULL),
(6, 'Musee de Saint Tropez', 'Petit', 'Petit@email.com', '04563487123', '123 route des pauvres', 83990, 'SAINT-TROPEZ', NULL),
(7, 'Steam', 'Robert', 'Robert@email.com', '0125695847', '75 route du champagne', 74360, 'ABONDANCE', NULL),
(8, 'FNAC', 'Salva', 'Salva@email.com', '0356478524', '246 route du platiste', 74320, 'LESCHAUX', NULL),
(9, 'Apple', 'Martinez', 'Martinez@email.com', '0586952485', '745 route de Megeve', 74120, 'MEGEVE', NULL),
(10, 'Mairie de Orcier', 'Vidal', 'Vidal@email.com', '0756941523', '156 route de la spiritualite', 74550, 'ORCIER', NULL),
(11, 'Google', 'Durand', 'Durand@email.com', '0236954785', '123 route de la cardinalite', 74190, 'PASSY', NULL),
(12, 'Cinema CGR Ambon', 'Richard', 'Richard@email.com', '0456985741', '423 chemin du triangle isocele', 56190, 'AMBON', NULL),
(13, 'Musee de Baden', 'Picard', 'Picard@email.com', '0598564152', '357 chemin de la carjack', 56870, 'BADEN', NULL),
(14, 'Mairie de Meucon', 'Leveque', 'Leveque@email.com', '0569584712', '258 rue du quadrilatere', 56890, 'MEUCON', NULL),
(15, 'Banque Loyat', 'Gaillard', 'Gaillard@email.com', '0456986524', '742 route du champetre', 56800, 'LOYAT', NULL),
(16, 'Uber-eat', 'Bailly', 'Bailly@email.com', '0789621524', '452 route de la philosophie', 82100, 'CASTELSARRASIN', NULL),
(17, 'Cinema de Merles', 'Gerard', 'Gerard@email.com', '0864985412', '75 chemin de la literrature', 82210, 'MERLES', NULL),
(18, 'Banque de Mirabel', 'Roche', 'Roche@email.com', '0548451649', '78 chemin de Montauban', 82440, 'MIRABEL', NULL),
(19, 'Banque de Bourg-en-visa', 'Caron', 'Caron@email.com', '0985643127', '78 rue de la migration', 82190, 'BOURG-EN-VISA', NULL),
(20, 'Musee de Bioule', 'Breton', 'Breton@email.com', '0123456789', '875 chemin du ricard', 82800, 'BIOULE', NULL),
(21, 'Cinema CGR', 'Aubert', 'Aubert@email.com', '0987654321', '459 route du champignon', 82200, 'BOUDOU', NULL),
(22, 'Musee de Belcodene', 'Fernandez', 'Fernandez@email.com', '0569851475', '125 chemin de la boulangerie', 13720, 'BELCODENE', NULL),
(23, 'Mairie de Cassis', 'Moreau', 'Moreau@email.com', '0425896534', '325 rue du boulanger', 13260, 'CASSIS', NULL),
(24, 'Mairie de Cabannes', 'Leroy', 'Leroy@email.com', '0525147589', '25 chemin du chaudronnier', 13440, 'CABANNES', NULL),
(25, 'Musee de Rognac', 'Morel', 'Morel@email.com', '0789653214', '250 route du pakistanais', 13340, 'ROGNAC', NULL),
(26, 'Cinema CGR Paris', 'David', 'David@email.com', '0369632012', '345 chemin des Lilas', 75000, 'PARIS', NULL),
(27, 'Banque de Aubigne', 'Herve', 'Herve@email.com', '0546132451', '236 chemin de la coordinance', 35250, 'AUBIGNE', NULL),
(28, 'Musee de Mernel', 'Colin', 'Colin@email.com', '0756961432', '56 route du chemin de fer', 35330, 'MERNEL', NULL),
(29, 'Mairie de Monterfil', 'Leblanc', 'Leblanc@email.com', '0456312402', '431 chemin de la feraille', 35160, 'MONTERFIL', NULL),
(30, 'Banque de Montgermont', 'Bonnet', 'Bonnet@email.com', '0758963214', '632 rue de la rondade', 35760, 'MONTGERMONT', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1732286014, 1),
(2, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1732286014, 1),
(3, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1732286014, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

DROP TABLE IF EXISTS `mission`;
CREATE TABLE IF NOT EXISTS `mission` (
  `ID_MISSION` int NOT NULL AUTO_INCREMENT,
  `ID_CLIENT` int NOT NULL,
  `INTITULE_MISSION` char(64) DEFAULT NULL,
  `DESCRIPTION` char(200) DEFAULT NULL,
  `DATE_DEBUT` date DEFAULT NULL,
  `DATE_FIN` date DEFAULT NULL,
  `STATUS` char(32) DEFAULT NULL,
  PRIMARY KEY (`ID_MISSION`),
  KEY `I_FK_MISSION_CLIENT` (`ID_CLIENT`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mission`
--

INSERT INTO `mission` (`ID_MISSION`, `ID_CLIENT`, `INTITULE_MISSION`, `DESCRIPTION`, `DATE_DEBUT`, `DATE_FIN`, `STATUS`) VALUES
(1, 4, 'Probleme base de données', 'Besoin de technicien spécialisé en base de données, a fin de résoudre les problemes lié au pertes et au dédoublements de données d une base MariaDB', '2024-12-02', '2024-12-13', NULL),
(4, 18, 'efsfes', 'zqfqffesf', '1111-11-11', '2222-02-22', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `ID_PROFIL` int NOT NULL AUTO_INCREMENT,
  `INTITULE_PROFIL` char(64) DEFAULT NULL,
  PRIMARY KEY (`ID_PROFIL`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`ID_PROFIL`, `INTITULE_PROFIL`) VALUES
(1, 'Developpement'),
(2, 'Administration systeme et reseau'),
(3, 'Conception d application'),
(4, 'DevOps'),
(5, 'Developpement web fullstack'),
(6, 'Ingenirie IA'),
(7, 'Chef de projet multimédia'),
(8, 'Chef de projet (général)'),
(9, 'Directeur de projet');

-- --------------------------------------------------------

--
-- Structure de la table `profil_mission`
--

DROP TABLE IF EXISTS `profil_mission`;
CREATE TABLE IF NOT EXISTS `profil_mission` (
  `ID_MISSION` int NOT NULL,
  `ID_PROFIL` int NOT NULL,
  `NOMBRE_SALARIE` int DEFAULT NULL,
  PRIMARY KEY (`ID_MISSION`,`ID_PROFIL`),
  KEY `I_FK_PROFIL_MISSION_MISSION` (`ID_MISSION`),
  KEY `I_FK_PROFIL_MISSION_PROFIL` (`ID_PROFIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `profil_mission`
--

INSERT INTO `profil_mission` (`ID_MISSION`, `ID_PROFIL`, `NOMBRE_SALARIE`) VALUES
(1, 3, 1),
(4, 1, 1),
(4, 2, 1),
(4, 3, 1),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

DROP TABLE IF EXISTS `salarie`;
CREATE TABLE IF NOT EXISTS `salarie` (
  `ID_SALARIE` int NOT NULL AUTO_INCREMENT,
  `NOM` char(32) DEFAULT NULL,
  `PRENOM` char(32) DEFAULT NULL,
  `CIVILITE` char(32) DEFAULT NULL,
  `EMAIL_SALARIE` char(64) DEFAULT NULL,
  `NUM_TELEPHONE_SALARIE` char(10) DEFAULT NULL,
  `ADRESSE_SALARIE` char(64) DEFAULT NULL,
  `CODE_POSTAL_SALARIE` int DEFAULT NULL,
  `VILLE_SALARIE` char(64) DEFAULT NULL,
  `PHOTO_SALARIE` longblob,
  PRIMARY KEY (`ID_SALARIE`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `salarie`
--

INSERT INTO `salarie` (`ID_SALARIE`, `NOM`, `PRENOM`, `CIVILITE`, `EMAIL_SALARIE`, `NUM_TELEPHONE_SALARIE`, `ADRESSE_SALARIE`, `CODE_POSTAL_SALARIE`, `VILLE_SALARIE`, `PHOTO_SALARIE`) VALUES
(1, 'Sage', 'Mateo', 'homme', 'mateo.sage@email.com', '769614847', '29, place Maryse Lombard', 82230, 'Castelmaran', ''),
(2, 'Perot', 'Mathis', 'homme', 'mathis.perot@email.com', '660964776', '12 rue des tulipes', 82410, 'St-Etienne-de-Tulmon', NULL),
(3, 'Marquez', 'Paul', 'homme', 'paul.marquez@email.com', '682546251', '48 chemin de la bière', 31620, 'Bouloc', NULL),
(4, 'Basck', 'Emmanuel', 'homme', 'basck.emmanuel@email.com', '678908762', '482 route de Caussade', 82350, 'Albias', NULL),
(5, 'Bondoux', 'Bastian', 'homme', 'bondoux.bastian@email.com', '608069160', '494 route de lafrancaise', 82100, 'Castelsarrasin', NULL),
(6, 'Combarieu', 'Thomas', 'homme', 'thomas.combarieu@email.com', '654916858', '47 rue des choufleurs', 31000, 'Toulouse', NULL),
(7, 'Crane', 'Lewis', 'homme', 'crane.lewis@email.com', '756984532', '149 chemin de la garderie', 82200, 'Lizac', NULL),
(8, 'Khantouch El Hajiri', 'Abderrahim', 'pasteque-de-combat', 'k.abderrahim@email.com', '569525625', '255 route du chateau', 82160, 'Loze', NULL),
(9, 'Loirot--Lougnon', 'Jean-Baptiste', 'homme', 'l.jean-baptiste@email.com', '696854712', '235 chemin de la feuille', 82500, 'Maubec', NULL),
(10, 'Marcerou', 'Stephan', 'homme', 'marcerou.stephan@email.com', '435366852', '245 route de la racine', 82120, 'Mansonville', NULL),
(11, 'Mcolo', 'Idirakou', 'homme', 'mcolo.idirakou@email.com', '456981432', '224 chemin de Malause', 82200, 'Malause', NULL),
(12, 'Pina Guillen', 'Ronald', 'homme', 'p.ronald@email.com', '769586415', '423 route de Moissac', 82200, 'Moissac', NULL),
(13, 'Talmitte', 'Eliaz', 'homme', 'talmitte.eliaz@email.com', '563214596', '267 chemin de Montech', 82700, 'Montech', NULL),
(14, 'Xiong', 'Teddy', 'homme', 'xiong.teddy@email.com', '696857412', '145 rue des Barthes', 82100, 'Les Barthes', NULL),
(15, 'zimmermann', 'Ethane', 'homme', 'zimmermann.ethane@email.com', '696584525', '221 chemin de Caussade', 82300, 'Caussade', NULL),
(16, 'Maache', 'Mohammed', 'homme', 'maache.mohammed@email.com', '736965847', '295 route de Grisolles', 82170, 'Grisolles', NULL),
(17, 'Leblanc', 'Just', 'homme', 'Leblanc.just@email.com', '569253625', '195 chemin de Valence', 82400, 'Valence', NULL),
(18, 'Richard', 'Louison', 'homme', 'richard.louison@email.com', '785963214', '298 route de Angeville', 82210, 'Angeville', NULL),
(19, 'Hamidani', 'Isaac', 'homme', 'hamidani.isaac@email.com', '532147895', '234 chemin de negrepelisse', 82800, 'Negrepelisse', NULL),
(20, 'Lavergne', 'Allan', 'homme', 'lavergne.allan@email.com', '636251478', '65 rue de Leojac', 82230, 'Leojac', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `salarie_mission`
--

DROP TABLE IF EXISTS `salarie_mission`;
CREATE TABLE IF NOT EXISTS `salarie_mission` (
  `ID_SALARIE` int NOT NULL,
  `ID_MISSION` int NOT NULL,
  PRIMARY KEY (`ID_SALARIE`,`ID_MISSION`),
  KEY `I_FK_SALARIE_MISSION_SALARIE` (`ID_SALARIE`),
  KEY `I_FK_SALARIE_MISSION_MISSION` (`ID_MISSION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salarie_profil`
--

DROP TABLE IF EXISTS `salarie_profil`;
CREATE TABLE IF NOT EXISTS `salarie_profil` (
  `ID_SALARIE` int NOT NULL,
  `ID_PROFIL` int NOT NULL,
  PRIMARY KEY (`ID_SALARIE`,`ID_PROFIL`),
  KEY `I_FK_SALARIE_PROFIL_SALARIE` (`ID_SALARIE`),
  KEY `I_FK_SALARIE_PROFIL_PROFIL` (`ID_PROFIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `salarie_profil`
--

INSERT INTO `salarie_profil` (`ID_SALARIE`, `ID_PROFIL`) VALUES
(1, 1),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9);

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', NULL, NULL, 0, '2024-11-27 06:57:31', '2024-11-22 14:40:38', '2024-11-22 14:40:38', NULL),
(2, 'com', NULL, NULL, 0, '2024-11-22 15:23:41', '2024-11-22 14:41:04', '2024-11-22 14:41:04', NULL),
(3, 'rhu', NULL, NULL, 0, NULL, '2024-11-22 14:41:21', '2024-11-22 14:41:21', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTILISATEUR` int NOT NULL AUTO_INCREMENT,
  `IDENTIFIANT` char(32) NOT NULL,
  `MOT_DE_PASSE` char(20) NOT NULL,
  `ROLE` char(32) NOT NULL,
  PRIMARY KEY (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `mission`
--
ALTER TABLE `mission`
  ADD CONSTRAINT `mission_ibfk_1` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`);

--
-- Contraintes pour la table `profil_mission`
--
ALTER TABLE `profil_mission`
  ADD CONSTRAINT `profil_mission_ibfk_1` FOREIGN KEY (`ID_MISSION`) REFERENCES `mission` (`ID_MISSION`),
  ADD CONSTRAINT `profil_mission_ibfk_2` FOREIGN KEY (`ID_PROFIL`) REFERENCES `profil` (`ID_PROFIL`);

--
-- Contraintes pour la table `salarie_mission`
--
ALTER TABLE `salarie_mission`
  ADD CONSTRAINT `salarie_mission_ibfk_1` FOREIGN KEY (`ID_SALARIE`) REFERENCES `salarie` (`ID_SALARIE`),
  ADD CONSTRAINT `salarie_mission_ibfk_2` FOREIGN KEY (`ID_MISSION`) REFERENCES `mission` (`ID_MISSION`);

--
-- Contraintes pour la table `salarie_profil`
--
ALTER TABLE `salarie_profil`
  ADD CONSTRAINT `salarie_profil_ibfk_1` FOREIGN KEY (`ID_SALARIE`) REFERENCES `salarie` (`ID_SALARIE`),
  ADD CONSTRAINT `salarie_profil_ibfk_2` FOREIGN KEY (`ID_PROFIL`) REFERENCES `profil` (`ID_PROFIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
