-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 18 avr. 2022 à 14:26
-- Version du serveur :  8.0.17
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `restaurantdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart_item`
--

CREATE TABLE `cart_item` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prix` int(11) NOT NULL,
  `Image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cart_item`
--

INSERT INTO `cart_item` (`Id`, `Nom`, `Prix`, `Image`) VALUES
(1, '-Merlan pané', 40, 1),
(2, '-Emincé de poulet', 40, 2),
(3, '-Plat mixte', 42, 3),
(4, '-Filet de poulet grillé', 42, 4),
(5, '-Viande hachée grillée  ', 42, 5),
(6, '-Chicken Fingers', 35, 6);

-- --------------------------------------------------------

--
-- Structure de la table `cart_item2`
--

CREATE TABLE `cart_item2` (
  `Id` int(25) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prix` int(25) NOT NULL,
  `Image` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cart_item2`
--

INSERT INTO `cart_item2` (`Id`, `Nom`, `Prix`, `Image`) VALUES
(7, '-Hamburger', 40, 1),
(8, '-Sanduiche Croustillant', 50, 2),
(9, 'Sanduiche Turkey', 35, 3),
(10, 'Tacos', 35, 4),
(11, 'Tacos Mexicains', 40, 5),
(12, '-Sanduiche Americain ', 42, 6);

-- --------------------------------------------------------

--
-- Structure de la table `cart_item3`
--

CREATE TABLE `cart_item3` (
  `Id` int(25) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prix` int(25) NOT NULL,
  `Image` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cart_item3`
--

INSERT INTO `cart_item3` (`Id`, `Nom`, `Prix`, `Image`) VALUES
(13, 'Fruit de mer', 80, 1),
(14, 'Margherita-mozzarella', 70, 2),
(15, 'Papella', 70, 3),
(16, 'Pepperoni', 50, 4),
(17, 'Margherita Spécial', 80, 5),
(18, 'Royal', 80, 6);

-- --------------------------------------------------------

--
-- Structure de la table `cart_item4`
--

CREATE TABLE `cart_item4` (
  `Id` int(25) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prix` int(25) NOT NULL,
  `Image` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cart_item4`
--

INSERT INTO `cart_item4` (`Id`, `Nom`, `Prix`, `Image`) VALUES
(19, 'Moujito Fraiche', 20, 1),
(20, 'Menthe Fraises', 25, 2),
(21, 'Jus Avocat-Orange', 20, 3),
(22, 'Pasteque Fraiche', 25, 4),
(23, 'Canette Energy', 20, 5),
(24, 'Canette Lemonade', 7, 6);

-- --------------------------------------------------------

--
-- Structure de la table `cart_item5`
--

CREATE TABLE `cart_item5` (
  `Id` int(25) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prix` int(25) NOT NULL,
  `Image` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cart_item5`
--

INSERT INTO `cart_item5` (`Id`, `Nom`, `Prix`, `Image`) VALUES
(25, 'Glace cacao', 30, 1),
(26, 'Glace Ananas', 30, 2),
(27, 'Glace aux fruits', 40, 3),
(28, 'Glace Magnum', 30, 4),
(29, 'Glaces à l\'eau multi frui', 40, 5),
(30, 'Sorbet manga', 20, 6);

-- --------------------------------------------------------

--
-- Structure de la table `cart_item6`
--

CREATE TABLE `cart_item6` (
  `Id` int(25) NOT NULL,
  `Nom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Prix` int(25) NOT NULL,
  `Image` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cart_item6`
--

INSERT INTO `cart_item6` (`Id`, `Nom`, `Prix`, `Image`) VALUES
(31, 'Cheesecake', 30, 1),
(32, 'Fraiche Cake', 30, 2),
(33, 'Mûre Cake', 38, 3),
(34, 'Gateau danniversaire', 380, 4),
(35, 'Royalcake', 30, 5),
(36, 'Macarons', 15, 6);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Tel` int(25) NOT NULL,
  `Jour` varchar(25) NOT NULL,
  `Heure` text NOT NULL,
  `Personnes` int(25) NOT NULL,
  `Facture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `ID` int(25) NOT NULL,
  `Repas` varchar(25) NOT NULL,
  `Quantité` int(25) NOT NULL,
  `PrixTotal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `ID` int(25) NOT NULL,
  `NomPrenom` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Tel` int(25) NOT NULL,
  `Messages` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `cart_item2`
--
ALTER TABLE `cart_item2`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `cart_item3`
--
ALTER TABLE `cart_item3`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `cart_item4`
--
ALTER TABLE `cart_item4`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `cart_item5`
--
ALTER TABLE `cart_item5`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `cart_item6`
--
ALTER TABLE `cart_item6`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `cart_item2`
--
ALTER TABLE `cart_item2`
  MODIFY `Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `cart_item3`
--
ALTER TABLE `cart_item3`
  MODIFY `Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `cart_item4`
--
ALTER TABLE `cart_item4`
  MODIFY `Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `cart_item5`
--
ALTER TABLE `cart_item5`
  MODIFY `Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `cart_item6`
--
ALTER TABLE `cart_item6`
  MODIFY `Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=459;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
