-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 02 mai 2020 à 17:20
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ensat2`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `code_matiere` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `nombre_heure` int(11) NOT NULL,
  `CNE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`code_matiere`, `date`, `nombre_heure`, `CNE`) VALUES
('c++', '2020-03-03', 2, 1170),
('c++', '2020-04-22', 1, 1170),
('cisco', '2020-04-16', 3, 1950),
('economie', '2020-03-10', 3, 1802),
('linux', '2020-03-03', 3, 1802),
('linux', '2020-03-10', 3, 1102),
('linux', '2020-04-13', 1, 1802),
('linux', '2020-04-22', 0, 1150),
('php', '2020-03-10', 2, 1102),
('php', '2020-04-22', 2, 1102),
('php', '2020-05-01', 2, 1102),
('PL/SQL', '2020-01-08', 1, 1170),
('PL/SQL', '2020-03-23', 2, 1809),
('PL/SQL', '2020-04-06', 1, 1809),
('PL/SQL', '2020-05-01', 2, 1170),
('reseaux', '2020-05-01', 2, 1102),
('SQL', '2020-01-16', 3, 1170),
('SQL', '2020-01-21', 2, 1150),
('SQL', '2020-02-03', 2, 1170);

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `cne` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `etat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`cne`, `nom`, `prenom`, `photo`, `etat`) VALUES
(1102, 'ACHAHBAR ', 'ADNANE', './contenu/garcon1.png', 'false'),
(1150, 'ADRAOUI', 'KHAWLA', './contenu/fille1.png', 'false'),
(1170, 'AHMADOUN', 'MOHAMED', './contenu/garcon2.png', 'false'),
(1802, 'BENTHAHER', 'MOHAMED', './contenu/garcon3.png', 'true'),
(1809, 'NGAN', 'JOSEPH', './contenu/garcon4.png', 'true'),
(1950, 'TOLLY', 'EBENEZER', './contenu/garcon5.png', 'true'),
(1962, 'TERFISSEM', 'YASMIN', './contenu/fille2.png', 'true');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`code_matiere`,`date`),
  ADD KEY `cne` (`CNE`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`cne`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`cne`) REFERENCES `eleves` (`cne`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
