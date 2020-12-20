-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Version du serveur :  5.7.11
-- Version de PHP :  5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Base de données :  `buvettes`
--

-- --------------------------------------------------------
drop table if exists `Est_present`;
drop table if exists `Est_ouverte`;
drop table if exists `Buvette`;
drop table if exists `Volontaire`;
drop table if exists `Soiree`;
drop table if exists `Artiste`;
--
-- Structure de la table `Buvette`
--



CREATE TABLE `Buvette` (
  `idB` int(11) NOT NULL,
  `nomB` tinytext NOT NULL,
  `emplacement` tinytext NOT NULL,
  `responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Buvette`
--

INSERT INTO `Buvette` (`idB`, `nomB`, `emplacement`, `responsable`) VALUES
(1, 'Buvette 1', 'Entrée Sud', 1),
(2, 'Buvette 2', 'Entrée Nord', 2),
(3, 'Buvette 3', 'Scène', 3),
(4, 'Buvette 4', 'Allée A', 1),
(5, 'Buvette 5', 'Allée B', 2);


-- --------------------------------------------------------

--
-- Structure de la table `Artiste`
--


CREATE TABLE `Artiste` (
  `idA` varchar(5) NOT NULL,
  `nomA` varchar(30) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `chImage` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Artiste`
--

INSERT INTO `Artiste` (`idA`, `nomA`, `genre`, `chImage`) VALUES
('a1', 'Massive Attack', 'Trip Hop', 'img/massive.png'),
('a2', 'DJ Shadow', 'Trip Hop', 'img/shadow.png'),
('a3', 'Alexis HK', 'Chanson française', 'img/hk.png'),
('a4', 'Renaud', 'Chanson française', 'img/au.png'),
('a5', 'Hugh Laurie', 'Jazz', 'img/laurie.png'),
('a6', 'Ibrahim Maalouf', 'Jazz', 'img/maalouf.png');

-- --------------------------------------------------------

--
-- Structure de la table `Est_ouverte`
--



CREATE TABLE `Est_ouverte` (
  `idB` int(11) NOT NULL,
  `idS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Est_ouverte`
--

INSERT INTO `Est_ouverte` (`idB`, `idS`) VALUES
(1, 1),
(4, 1),
(5, 1),
(1, 2),
(2, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Est_present`
--

CREATE TABLE `Est_present` (
  `idV` int(11) NOT NULL,
  `idB` int(11) NOT NULL,
  `idS` int(11) NOT NULL,
  `hdeb` int(11) NOT NULL,
  `hfin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Est_present`
--

INSERT INTO `Est_present` (`idV`, `idB`, `idS`, `hdeb`, `hfin`) VALUES
(1, 5, 1, 17, 23),
(1, 1, 2, 18, 23),
(1, 1, 3, 18, 23),
(2, 2, 3, 18, 23),
(3, 3, 3, 19, 23),
(4, 4, 3, 17, 23),
(5, 5, 3, 19, 22),
(2, 2, 2, 18, 23);

-- --------------------------------------------------------

--
-- Structure de la table `Soiree`
--


CREATE TABLE `Soiree` (
  `idS` int(11) NOT NULL,
  `date` date NOT NULL,
  `premPartie` varchar(5) NOT NULL,
  `teteAffiche` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Soiree`
--

INSERT INTO `Soiree` (`idS`, `date`, `premPartie`, `teteAffiche`) VALUES
(1, '2018-07-10', 'a2', 'a1'),
(2, '2016-07-11', 'a3', 'a4'),
(3, '2016-07-12', 'a5', 'a6');

-- --------------------------------------------------------

--
-- Structure de la table `Volontaire`
--

CREATE TABLE `Volontaire` (
  `idV` int(5) NOT NULL,
  `nomV` varchar(40) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Volontaire`
--

INSERT INTO `Volontaire` (`idV`, `nomV`, `age`) VALUES
(1, 'Belva Lindgren', 30),
(2, 'Yandel Spinka', 44),
(3, 'Mr. Wilburn Greenfelder', 49),
(4, 'Willie Kris', 42),
(5, 'Carson Runte', 18);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Buvette`
--
ALTER TABLE `Buvette`
  ADD PRIMARY KEY (`idB`),
  ADD KEY `fk_buvette_responsable` (`responsable`);

--
-- Index pour la table `Equipe`
--
ALTER TABLE `Artiste`
  ADD PRIMARY KEY (`idA`);

--
-- Index pour la table `Est_ouverte`
--
ALTER TABLE `Est_ouverte`
  ADD PRIMARY KEY (`idB`,`idS`),
  ADD KEY `fk_estouverte_ids` (`idS`);

--
-- Index pour la table `Est_present`
--
ALTER TABLE `Est_present`
  ADD PRIMARY KEY (`idV`,`idB`,`idS`),
  ADD KEY `fk_estpresent_idb` (`idB`),
  ADD KEY `fk_estpresent_ids` (`idS`);

--
-- Index pour la table `Match`
--
ALTER TABLE `Soiree`
  ADD PRIMARY KEY (`idS`),
  ADD KEY `fk_match_pp` (`premPartie`),
  ADD KEY `fk_match_ta` (`teteAffiche`);

--
-- Index pour la table `Volontaire`
--
ALTER TABLE `Volontaire`
  ADD PRIMARY KEY (`idV`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Buvette`
--
ALTER TABLE `Buvette`
  ADD CONSTRAINT `fk_buvette_responsable` FOREIGN KEY (`responsable`) REFERENCES `Volontaire` (`idV`);

--
-- Contraintes pour la table `Est_ouverte`
--
ALTER TABLE `Est_ouverte`
  ADD CONSTRAINT `fk_estouverte_idb` FOREIGN KEY (`idB`) REFERENCES `Buvette` (`idB`),
  ADD CONSTRAINT `fk_estouverte_ids` FOREIGN KEY (`idS`) REFERENCES `Soiree` (`idS`);

--
-- Contraintes pour la table `Est_present`
--
ALTER TABLE `Est_present`
  ADD CONSTRAINT `fk_estpresent_idb` FOREIGN KEY (`idB`) REFERENCES `Buvette` (`idB`),
  ADD CONSTRAINT `fk_estpresent_ids` FOREIGN KEY (`idS`) REFERENCES `Soiree` (`idS`),
  ADD CONSTRAINT `fk_estpresent_idv` FOREIGN KEY (`idV`) REFERENCES `Volontaire` (`idV`);

--
-- Contraintes pour la table `Soiree`
--
ALTER TABLE `Soiree`
  ADD CONSTRAINT `fk_match_pp` FOREIGN KEY (`premPartie`) REFERENCES `Artiste` (`idA`),
  ADD CONSTRAINT `fk_match_ta` FOREIGN KEY (`teteAffiche`) REFERENCES `Artiste` (`idA`);






