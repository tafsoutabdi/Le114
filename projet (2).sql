-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 28 mai 2023 à 11:27
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `email`, `motdepasse`) VALUES
(1, '114', '114@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `rating` int(3) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id_avis`, `id`, `rating`, `review`) VALUES
(3, 4, 4, 'a mamma a mamma'),
(4, 2, 5, 'bieeeen');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id`, `image`) VALUES
(6, '../../uploads/337565064_2553358744852569_7327348098568283922_n.jpg'),
(7, '../../uploads/332856631_954989315876011_925190577582103257_n.jpg'),
(9, '../../uploads/324102925_735377681027497_5141455732583607873_n.jpg'),
(10, '../../uploads/330022723_3517305215261433_1627326858510463987_n.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE `plats` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id`, `image`, `nom`, `prix`, `description`) VALUES
(217, 'soupedelegume1.jpg', 'Soupe de legume', 800, 'soupe aux legumes savoureuse'),
(218, 'Languedeveauensauce1.jpg', 'Langue de veau en sauce', 1000, 'Langue de veau en sauce savoureux');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_res` int(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `tel` int(10) NOT NULL,
  `date_res` date NOT NULL,
  `heure_debut` time(6) NOT NULL,
  `heure_fin` time(6) NOT NULL,
  `nb_personnes` int(3) NOT NULL,
  `nb_tables` int(3) NOT NULL,
  `quoi_res` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_res`, `nom`, `prenom`, `tel`, `date_res`, `heure_debut`, `heure_fin`, `nb_personnes`, `nb_tables`, `quoi_res`) VALUES
(70, 'lina', 'ait amara', 698654336, '2023-12-15', '14:00:00.000000', '16:00:00.000000', 2, 1, 'table'),
(71, 'tanjiro', 'kamado', 773989394, '2023-12-15', '14:00:00.000000', '16:00:00.000000', 8, 2, 'table'),
(72, 'mouloud', 'iachourene', 745264536, '2023-09-01', '12:00:00.000000', '13:00:00.000000', 6, 2, 'table'),
(73, 'mouloud', 'iachourene', 745264536, '2023-09-01', '12:00:00.000000', '13:00:00.000000', 6, 2, 'table'),
(74, 'mouloud', 'iachourene', 745264536, '2023-09-01', '12:00:00.000000', '13:00:00.000000', 6, 4, 'table'),
(75, 'mouloud', 'iachourene', 745264536, '2023-09-01', '12:00:00.000000', '13:00:00.000000', 6, 2, 'table');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `password`, `image`) VALUES
(1, 'nom', 'prenom', 'nom@gmail.com', 'azerty'),
(2, 'nom', 'nom@gmail.com', 'ab4f63f9ac65152575886860dde480a1', ''),
(3, 'nom', 'email@gmail.com', 'ab4f63f9ac65152575886860dde480a1', ''),
(4, 'lina', 'lina@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Screenshot_20220819-205957-1.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `user_id` (`id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_res`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `plats`
--
ALTER TABLE `plats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_res` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
