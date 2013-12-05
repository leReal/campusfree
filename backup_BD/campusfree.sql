-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Sam 23 Novembre 2013 à 13:32
-- Version du serveur: 5.5.27
-- Version de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `campusfree`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_abonnement`
--

CREATE TABLE IF NOT EXISTS `tbl_abonnement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(15) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `adresseemail1` varchar(50) NOT NULL,
  `adresseemail2` varchar(50) NOT NULL,
  `telephone1` varchar(10) NOT NULL,
  `telephone2` varchar(10) NOT NULL,
  `telephone3` varchar(10) NOT NULL,
  `datenaissance` date NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `package` varchar(50) NOT NULL,
  `photo` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classe_id` (`classe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tbl_abonnement`
--

INSERT INTO `tbl_abonnement` (`id`, `matricule`, `nom`, `prenom`, `classe_id`, `adresseemail1`, `adresseemail2`, `telephone1`, `telephone2`, `telephone3`, `datenaissance`, `adresse`, `package`, `photo`) VALUES
(1, '06U123', 'GOKENG TATSI', 'Rostow Mikhael', 3, 'rostowgokeng@gmail.com', '', '96828358', '50774334', '', '2013-10-23', 'Douala', 'premium', '');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_classe`
--

CREATE TABLE IF NOT EXISTS `tbl_classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_filiere` (`id_filiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tbl_classe`
--

INSERT INTO `tbl_classe` (`id`, `nom`, `id_filiere`) VALUES
(1, '3eme année génie informatique', 1),
(2, '4eme année génie informatique', 1),
(3, '5eme année Génie informatique', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_destinataire_classe`
--

CREATE TABLE IF NOT EXISTS `tbl_destinataire_classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classe_id` int(11) NOT NULL,
  `information_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classe_id` (`classe_id`,`information_id`),
  KEY `information_id` (`information_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_destinataire_filiere`
--

CREATE TABLE IF NOT EXISTS `tbl_destinataire_filiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filiere_id` int(11) NOT NULL,
  `information_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `filiere_id` (`filiere_id`),
  KEY `information_id` (`information_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='l''ensemble des filières concernées par l''information' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_etablissement`
--

CREATE TABLE IF NOT EXISTS `tbl_etablissement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone1` varchar(10) NOT NULL,
  `telephone2` varchar(10) NOT NULL,
  `telephone3` varchar(10) NOT NULL,
  `boitepostale` varchar(10) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `id_institution` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_institution` (`id_institution`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tbl_etablissement`
--

INSERT INTO `tbl_etablissement` (`id`, `nom`, `adresse`, `telephone1`, `telephone2`, `telephone3`, `boitepostale`, `ville`, `id_institution`) VALUES
(1, 'Ecole Nationale Supérieure Polytechnique Yaoundé', 'Yaoundé Melen', '123333', '', '', '', 'yaoundé', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_filiere`
--

CREATE TABLE IF NOT EXISTS `tbl_filiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `id_etablissement` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_etablissement` (`id_etablissement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tbl_filiere`
--

INSERT INTO `tbl_filiere` (`id`, `nom`, `id_etablissement`) VALUES
(1, 'Département de Génie Informatique', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_information`
--

CREATE TABLE IF NOT EXISTS `tbl_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identifiant de l''information',
  `titresms` varchar(50) NOT NULL COMMENT 'titre de l''information sms',
  `contenusms` varchar(500) NOT NULL COMMENT 'contenu de l''information email',
  `titremail` varchar(50) NOT NULL COMMENT 'titre de l''information mail',
  `contenumail` varchar(700) NOT NULL COMMENT 'contenu de l''information mail',
  `id_informateur` int(11) NOT NULL COMMENT 'informateur qui a propagé l''information',
  `etablissement_id` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_informateur` (`id_informateur`),
  KEY `etablissement_id` (`etablissement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tbl_information`
--

INSERT INTO `tbl_information` (`id`, `titresms`, `contenusms`, `titremail`, `contenumail`, `id_informateur`, `etablissement_id`, `filename`) VALUES
(2, '', '', 'Titre de test de l''envoie d''email', 'Voici le premier message envoyé par la plateforme campus free', 3, 1, ''),
(3, '', '', 'Rostow', 'Voici le premier message envoyé par la plateforme campus free', 3, 1, ''),
(4, '', '', 'tes mail', 'Premier mail Campusfree\r\n', 3, 1, ''),
(5, '', '', 'Baveur', 'Bavor+++++', 3, 1, ''),
(6, '', '', 'Titre de test de l''envoie d''email', 'Voici le premier message envoyé à deux destinataires de la plateforme campusfree', 3, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_institution`
--

CREATE TABLE IF NOT EXISTS `tbl_institution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone1` varchar(10) NOT NULL,
  `telephone2` varchar(10) NOT NULL,
  `telephone3` varchar(10) NOT NULL,
  `boitepostale` varchar(10) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `statut` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='table sui regroupe les différentes institutions' AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tbl_institution`
--

INSERT INTO `tbl_institution` (`id`, `nom`, `adresse`, `telephone1`, `telephone2`, `telephone3`, `boitepostale`, `ville`, `statut`) VALUES
(1, 'Université de Yaoundé 1', 'Yaoundé Ngoa Kelle', '13248965', '44542323', '', '535', 'Yaoundé', 'public');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_piecejointe`
--

CREATE TABLE IF NOT EXISTS `tbl_piecejointe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information_id` int(11) NOT NULL,
  `contenu` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `information_id` (`information_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_type_utlisateur`
--

CREATE TABLE IF NOT EXISTS `tbl_type_utlisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table qui regroupe les types d''utilisateur de la plateforme' AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tbl_type_utlisateur`
--

INSERT INTO `tbl_type_utlisateur` (`id`, `nom`) VALUES
(1, 'Informateur'),
(2, 'Coordonnateur'),
(3, 'Représentant'),
(4, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_utilisateur`
--

CREATE TABLE IF NOT EXISTS `tbl_utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `motdepasse` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresseemail1` varchar(50) NOT NULL,
  `adresseemail2` varchar(50) NOT NULL,
  `telephone1` varchar(10) NOT NULL,
  `telephone2` varchar(10) NOT NULL,
  `lieunaissance` varchar(30) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tbl_utilisateur`
--

INSERT INTO `tbl_utilisateur` (`id`, `login`, `motdepasse`, `nom`, `prenom`, `adresseemail1`, `adresseemail2`, `telephone1`, `telephone2`, `lieunaissance`, `type`) VALUES
(3, 'rgokeng', 'rgokeng', 'GOKENG', 'Rostow', 'rostowgokeng@gmail.com', '', '96828351', '', '', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tbl_abonnement`
--
ALTER TABLE `tbl_abonnement`
  ADD CONSTRAINT `tbl_abonnement_ibfk_1` FOREIGN KEY (`classe_id`) REFERENCES `tbl_classe` (`id`);

--
-- Contraintes pour la table `tbl_classe`
--
ALTER TABLE `tbl_classe`
  ADD CONSTRAINT `tbl_classe_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `tbl_filiere` (`id`);

--
-- Contraintes pour la table `tbl_destinataire_classe`
--
ALTER TABLE `tbl_destinataire_classe`
  ADD CONSTRAINT `tbl_destinataire_classe_ibfk_1` FOREIGN KEY (`classe_id`) REFERENCES `tbl_classe` (`id`),
  ADD CONSTRAINT `tbl_destinataire_classe_ibfk_2` FOREIGN KEY (`information_id`) REFERENCES `tbl_information` (`id`);

--
-- Contraintes pour la table `tbl_destinataire_filiere`
--
ALTER TABLE `tbl_destinataire_filiere`
  ADD CONSTRAINT `tbl_destinataire_filiere_ibfk_1` FOREIGN KEY (`filiere_id`) REFERENCES `tbl_filiere` (`id`),
  ADD CONSTRAINT `tbl_destinataire_filiere_ibfk_2` FOREIGN KEY (`information_id`) REFERENCES `tbl_information` (`id`);

--
-- Contraintes pour la table `tbl_etablissement`
--
ALTER TABLE `tbl_etablissement`
  ADD CONSTRAINT `tbl_etablissement_ibfk_1` FOREIGN KEY (`id_institution`) REFERENCES `tbl_institution` (`id`);

--
-- Contraintes pour la table `tbl_filiere`
--
ALTER TABLE `tbl_filiere`
  ADD CONSTRAINT `tbl_filiere_ibfk_1` FOREIGN KEY (`id_etablissement`) REFERENCES `tbl_etablissement` (`id`);

--
-- Contraintes pour la table `tbl_information`
--
ALTER TABLE `tbl_information`
  ADD CONSTRAINT `tbl_information_ibfk_1` FOREIGN KEY (`id_informateur`) REFERENCES `tbl_utilisateur` (`id`),
  ADD CONSTRAINT `tbl_information_ibfk_2` FOREIGN KEY (`etablissement_id`) REFERENCES `tbl_etablissement` (`id`);

--
-- Contraintes pour la table `tbl_utilisateur`
--
ALTER TABLE `tbl_utilisateur`
  ADD CONSTRAINT `tbl_utilisateur_ibfk_1` FOREIGN KEY (`type`) REFERENCES `tbl_type_utlisateur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
