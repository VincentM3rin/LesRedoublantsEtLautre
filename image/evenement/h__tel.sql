-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 nov. 2026 à 15:21
-- Version du serveur : 10.11.16-MariaDB
-- Version de PHP : 8.3.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hôtel`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idUser`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `idEvenement` int(11) NOT NULL,
  `nomEvenement` varchar(100) DEFAULT NULL,
  `dateDebutEvenement` datetime DEFAULT NULL,
  `dateFinEvenement` datetime DEFAULT NULL,
  `descriptioEvenement` varchar(2500) DEFAULT NULL,
  `nombrePlaceLimité` int(11) DEFAULT NULL,
  `imgEvenement` varchar(50) DEFAULT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`idEvenement`, `nomEvenement`, `dateDebutEvenement`, `dateFinEvenement`, `descriptioEvenement`, `nombrePlaceLimité`, `imgEvenement`, `idUser`) VALUES
(8, 'Tournoi gratuit SSBU', '2026-11-30 13:59:59', '2026-11-30 16:00:00', 'Tournoi gratuit SSBU le Lundi 30Novembre de 14 à 16h.\r\n\r\n1er place : Figurine NintendosTres\r\n2ième place : Poster NintendosTres\r\n3ième place : 5Bitcoins', 32, './images/tournoi/ssbutournoi.png', 2),
(9, 'Prop Hunt Fartnight', '2026-11-22 20:00:00', '2026-11-25 23:00:00', 'Prop hunt du 22 au 25 novembre tout les soirs', 12, './images/tournoi/prophunt.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `hall`
--

CREATE TABLE `hall` (
  `id_Hall` int(11) NOT NULL,
  `nom_Hall` varchar(50) NOT NULL,
  `estcoché` tinyint(1) NOT NULL,
  `idEvenement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hall`
--

INSERT INTO `hall` (`id_Hall`, `nom_Hall`, `estcoché`, `idEvenement`) VALUES
(2, 'Ganon', 0, NULL),
(3, 'Joh', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `idUser` int(11) NOT NULL,
  `idEvenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `spectateur`
--

CREATE TABLE `spectateur` (
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUser` int(11) NOT NULL,
  `nomUser` varchar(50) DEFAULT NULL,
  `emailUtil` varchar(50) DEFAULT NULL,
  `mdpUser` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUser`, `nomUser`, `emailUtil`, `mdpUser`) VALUES
(1, 'Bostindubanino', 'BostindubaninoBakadu13@unadressemail.com', 'f65bdd0deb6c76add9968b8ec7d9f9c6700d48a44999ab8cc029db7c4c90d5d6'),
(2, 'Furry', 'CaptaineFurry@gomail.fr', '1f10ab969dbb9df6a1a73fae3c47fb52cdb90e8558874f212732d325ed93101b');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`idEvenement`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id_Hall`),
  ADD KEY `idEvenement` (`idEvenement`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD PRIMARY KEY (`idUser`,`idEvenement`),
  ADD KEY `idEvenement` (`idEvenement`);

--
-- Index pour la table `spectateur`
--
ALTER TABLE `spectateur`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `idEvenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `hall`
--
ALTER TABLE `hall`
  MODIFY `id_Hall` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `spectateur`
--
ALTER TABLE `spectateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `utilisateurs` (`idUser`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `admin` (`idUser`);

--
-- Contraintes pour la table `hall`
--
ALTER TABLE `hall`
  ADD CONSTRAINT `hall_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`idEvenement`);

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `participe_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `spectateur` (`idUser`),
  ADD CONSTRAINT `participe_ibfk_2` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`idEvenement`);

--
-- Contraintes pour la table `spectateur`
--
ALTER TABLE `spectateur`
  ADD CONSTRAINT `spectateur_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `utilisateurs` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
