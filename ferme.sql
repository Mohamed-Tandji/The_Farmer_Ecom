-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 14 août 2023 à 17:01
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ferme`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id` int(11) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `numero_app` varchar(10) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `prix_total` float DEFAULT NULL,
  `date_commande` varchar(50) DEFAULT NULL,
  `id_User` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `prix_total`, `date_commande`, `id_User`) VALUES
(34, 39700, '2023-Aug-Wed 07:08:59', 9),
(57, 29800, '2023-Aug-Mon 03:08:51', 14),
(58, 29800, '2023-Aug-Mon 03:08:00', 14),
(59, 29800, '2023-Aug-Mon 04:08:45', 14),
(60, 29800, '2023-Aug-Mon 04:08:12', 14),
(61, 29800, '2023-Aug-Mon 04:08:36', 14),
(62, 29800, '2023-Aug-Mon 04:08:38', 14),
(63, 29800, '2023-Aug-Mon 04:08:44', 14),
(73, 17800, '2023-Aug-Mon 04:08:57', 14),
(74, 17800, '2023-Aug-Mon 02:08:49', 14),
(75, 17800, '2023-Aug-Mon 03:08:01', 14),
(76, 17800, '2023-Aug-Mon 03:08:57', 14),
(78, 9900, '2023-Aug-Mon 03:08:20', 14),
(80, 4000, '2023-Aug-Mon 03:08:44', 14),
(82, 9900, '2023-Aug-Mon 03:08:49', 14),
(84, 39700, '2023-Aug-Mon 04:08:06', 9),
(85, 0, '2023-Aug-Mon 04:08:09', 9);

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id_commande` int(11) DEFAULT NULL,
  `id_Taureaux` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande_produit`
--

INSERT INTO `commande_produit` (`id_commande`, `id_Taureaux`, `quantite`) VALUES
(34, 2, 2),
(34, 4, 4),
(34, 3, 3),
(57, 2, 3),
(57, 3, 2),
(57, 4, 1),
(58, 2, 3),
(58, 3, 2),
(58, 4, 1),
(59, 2, 3),
(59, 3, 2),
(59, 4, 1),
(60, 2, 3),
(60, 3, 2),
(60, 4, 1),
(61, 2, 3),
(61, 3, 2),
(61, 4, 1),
(62, 2, 3),
(62, 3, 2),
(62, 4, 1),
(63, 2, 3),
(63, 3, 2),
(63, 4, 1),
(73, 2, 1),
(73, 3, 2),
(73, 4, 1),
(74, 2, 1),
(74, 3, 2),
(74, 4, 1),
(75, 2, 1),
(75, 3, 2),
(75, 4, 1),
(78, 2, 1),
(78, 3, 1),
(80, 4, 1),
(82, 2, 1),
(82, 3, 1),
(84, 2, 4),
(84, 3, 3),
(84, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `genisses`
--

CREATE TABLE `genisses` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `nom_pere` varchar(50) DEFAULT NULL,
  `nom_mere` varchar(50) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `capacite_lait` double DEFAULT NULL,
  `race` varchar(60) DEFAULT NULL,
  `resistance` int(11) DEFAULT NULL,
  `race_type` varchar(80) DEFAULT NULL,
  `disponibilite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image_genisses`
--

CREATE TABLE `image_genisses` (
  `id` int(11) NOT NULL,
  `chemin` varchar(255) DEFAULT NULL,
  `id_Genisses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image_produits`
--

CREATE TABLE `image_produits` (
  `id` int(11) NOT NULL,
  `chemin` varchar(255) DEFAULT NULL,
  `id_Produits` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image_semences`
--

CREATE TABLE `image_semences` (
  `id` int(11) NOT NULL,
  `chemin` varchar(255) DEFAULT NULL,
  `id_Semences` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image_taureaux`
--

CREATE TABLE `image_taureaux` (
  `id` int(11) NOT NULL,
  `chemin` varchar(255) DEFAULT NULL,
  `id_Taureaux` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `image_taureaux`
--

INSERT INTO `image_taureaux` (`id`, `chemin`, `id_Taureaux`) VALUES
(2, 'images_T/img-T-5.jpg', 2),
(3, 'images_T/img-T-4.jpg', 3),
(4, 'images_T/img-T-14.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_mise_jour` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `Nom`, `Prenom`, `email`, `mot_de_passe`, `date_creation`, `date_mise_jour`) VALUES
(9, 'Mahamadou', 'Tandjigora', 'mahamadoutandjigora03@gmail.com', '$2y$10$XzxkOl5rvNtNpEqnlvnWU.Lt/miY2fShHnAxVsDDyWrqV0g./GoUm', NULL, NULL),
(12, 'Tandjigora', 'Mahamadou', 'tot23o@gmail.com', '$2y$10$TiLvWKOZYy8aZ6NGegW0aO7McwYrG4SEMT7hbNbADf3jj.Z7zEviK', NULL, NULL),
(14, 'TeccartN', 'TeccartP', 'teccart@gmail.com', '$2y$10$43q6X.3Qv7QN/twWx/eRN.KhnGnq1B3hZs1traLAWG9aFRKgdVQ6a', NULL, NULL),
(16, 'totoN', 'totoP', 'toto@gmail.com', '$2y$10$P5J.jMNW0PXxVNBRahYJtOuYLDwLxN23SV0HTh3SQ.uO0j55OQEnm', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personne_adresse`
--

CREATE TABLE `personne_adresse` (
  `id_personne` int(11) DEFAULT NULL,
  `id_adresse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personne_role`
--

CREATE TABLE `personne_role` (
  `id_role` int(11) DEFAULT 1,
  `id_personne` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne_role`
--

INSERT INTO `personne_role` (`id_role`, `id_personne`) VALUES
(2, 9),
(1, 14),
(1, 16),
(2, 12);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `disponibilite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `titre`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `semences`
--

CREATE TABLE `semences` (
  `id` int(11) NOT NULL,
  `nom_taureau` varchar(60) DEFAULT NULL,
  `origines` varchar(200) DEFAULT NULL,
  `capacite_lait` double DEFAULT NULL,
  `race` varchar(60) DEFAULT NULL,
  `resistance` int(11) DEFAULT NULL,
  `race_type` varchar(80) DEFAULT NULL,
  `disponibilite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `taureaux`
--

CREATE TABLE `taureaux` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `nom_pere` varchar(50) DEFAULT NULL,
  `nom_mere` varchar(50) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `race` varchar(60) DEFAULT NULL,
  `resistance` int(11) DEFAULT NULL,
  `race_type` varchar(80) DEFAULT NULL,
  `disponibilite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `taureaux`
--

INSERT INTO `taureaux` (`id`, `nom`, `nom_pere`, `nom_mere`, `prix`, `race`, `resistance`, `race_type`, `disponibilite`) VALUES
(2, 'NIki', 'af', 'NIki af', 6000, 'bkjkl;l', 99, 'njeewfuww', 4),
(3, 'Tyson', 'Mic', 'Tyson Mic', 3900, 'Holstein', 74, 'Laitière', 20),
(4, 'Angus', 'Piter', 'Anna', 4000, 'Rousse des Steppes', 87, 'Laitière', 15);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `fk_commande_personne` (`id_User`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD KEY `fk_commande_produit` (`id_commande`),
  ADD KEY `fk_produit_commande` (`id_Taureaux`);

--
-- Index pour la table `genisses`
--
ALTER TABLE `genisses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image_genisses`
--
ALTER TABLE `image_genisses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_image_Genisses` (`id_Genisses`);

--
-- Index pour la table `image_produits`
--
ALTER TABLE `image_produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_image_Produits` (`id_Produits`);

--
-- Index pour la table `image_semences`
--
ALTER TABLE `image_semences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_image_Semences` (`id_Semences`);

--
-- Index pour la table `image_taureaux`
--
ALTER TABLE `image_taureaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_image_Taureaux` (`id_Taureaux`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne_adresse`
--
ALTER TABLE `personne_adresse`
  ADD KEY `fk_adresse_personne` (`id_adresse`),
  ADD KEY `fk_personne_adresse` (`id_personne`);

--
-- Index pour la table `personne_role`
--
ALTER TABLE `personne_role`
  ADD KEY `id_role` (`id_role`),
  ADD KEY `fk_personne_role` (`id_personne`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `semences`
--
ALTER TABLE `semences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `taureaux`
--
ALTER TABLE `taureaux`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `genisses`
--
ALTER TABLE `genisses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image_genisses`
--
ALTER TABLE `image_genisses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image_produits`
--
ALTER TABLE `image_produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image_semences`
--
ALTER TABLE `image_semences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image_taureaux`
--
ALTER TABLE `image_taureaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `semences`
--
ALTER TABLE `semences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `taureaux`
--
ALTER TABLE `taureaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_personne` FOREIGN KEY (`id_User`) REFERENCES `personne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `fk_commande_produit` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produit_commande` FOREIGN KEY (`id_Taureaux`) REFERENCES `taureaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `image_genisses`
--
ALTER TABLE `image_genisses`
  ADD CONSTRAINT `fk_image_Genisses` FOREIGN KEY (`id_Genisses`) REFERENCES `genisses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `image_produits`
--
ALTER TABLE `image_produits`
  ADD CONSTRAINT `fk_image_Produits` FOREIGN KEY (`id_Produits`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `image_semences`
--
ALTER TABLE `image_semences`
  ADD CONSTRAINT `fk_image_Semences` FOREIGN KEY (`id_Semences`) REFERENCES `semences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `image_taureaux`
--
ALTER TABLE `image_taureaux`
  ADD CONSTRAINT `fk_image_Taureaux` FOREIGN KEY (`id_Taureaux`) REFERENCES `taureaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personne_adresse`
--
ALTER TABLE `personne_adresse`
  ADD CONSTRAINT `fk_adresse_personne` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_personne_adresse` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personne_role`
--
ALTER TABLE `personne_role`
  ADD CONSTRAINT `fk_personne_role` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personne_role_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
