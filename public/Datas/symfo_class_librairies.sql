-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 16 nov. 2021 à 04:44
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `symfo_class_librairies`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `contenu`, `date`) VALUES
(1, 'La saga du Dev', 'Présentation de la société SAGA DEVELOPPEMENT SAGA DEVELOPPEMENT, société à responsabilité limitée a été active durant 32 ans. Domiciliée à COLLIOURE (66190), elle était spécialisée dans le secteur d\'activité des agences immobilières. Sur l\'année 2013 ell', '2016-01-01 00:00:00'),
(2, '9 environnements de développement (IDE) PHP à connaître', 'Eclipse est un environnement de développement intégré populaire pour la machine virtuelle Java. Si Eclipse PDT est l’acronyme de PHP Developer Tools (outils de développement PHP), il est également compatible avec plusieurs autres langages de programmation', '2016-01-01 00:00:00'),
(3, 'Tutoriels pour apprendre PHP', 'Sélection des meilleurs tutoriels et cours de formation gratuits pour apprendre à programmer des sites web dynamiques avec langage PHP. Vous trouverez les meilleures méthodes éducatives pour une formation agréable et complète du langage PHP. Si vous voule', '2016-01-01 00:00:00'),
(4, 'Pourquoi choisir Symfony pour un projet web ?', 'Le développement d’applications web est une tâche relativement complexe et longue. L’utilisation d’un framework a pour objectif d’aider les développeurs à construire ce type de projet plus rapidement. Le framework PHP est généralement livré avec des compo', '2016-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211115160145', '2021-11-15 16:02:07', 110);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datenaiss` datetime NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenoms`, `datenaiss`, `adresse`, `email`) VALUES
(1, 'PALAKOT', 'IGOR', '2016-01-01 00:00:00', '2 RUE SATURNIN FABRE', 'ipalakot@gmail.com'),
(2, 'PALAKOT', 'IGOR GEORGES', '2016-01-01 00:00:00', '12 Allée Ronchamp Orly', 'ipalakot@gmail.com'),
(3, 'MBAYE', 'Maica Elena', '2016-01-01 00:00:00', 'Residence plein ciel 2, Bâtiment C,  Entrée A, Appartement 8', 'test@mail.com'),
(4, 'stagiaire 1', 'stagiaire 11', '2016-01-01 00:00:00', '24 Blv Chastenet de Gery', 'ipalakot@gmail.com'),
(5, 'Fabrice', 'Follereau', '2016-01-01 00:00:00', '24-26 Boulevard Chastenet de géry', 'fabrice@guinot.fr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
