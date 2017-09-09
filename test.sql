-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 09 sep. 2017 à 20:57
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `title`, `content`, `autor`, `image`, `created_at`) VALUES
(3, 'nissan', '        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, ad aliquid iusto libero quibusdam voluptatem. Blanditiis, dolorem, quibusdam. Ad, dignissimos et ex necessitatibus nesciunt nihil praesentium veniam! Consectetur, dolores, illum?\r\n', 'guillaume', 'the-archer-1680x1050.jpg', '0000-00-00'),
(4, 'nissan', '        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, ad aliquid iusto libero quibusdam voluptatem. Blanditiis, dolorem, quibusdam. Ad, dignissimos et ex necessitatibus nesciunt nihil praesentium veniam! Consectetur, dolores, illum?\r\n', 'guillaume', 'the-archer-1680x1050.jpg', '0000-00-00'),
(5, 'peugot', '        &lt;p&gt;Lorem&lt;/p&gt; ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, culpa deserunt earum error et fugit id in quia saepe. At excepturi facere fugit nesciunt odio officia quia recusandae sapiente voluptatum.\r\n', 'guillaume', 'the-archer-1680x1050.jpg', '0000-00-00'),
(13, 'test4', '        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus assumenda consectetur illo magnam non nostrum quia quisquam repellendus sint, vel? Cum explicabo illo iure laborum, libero quaerat quisquam suscipit voluptates.\r\n', 'guillaume', 'hulk_8.gif', '2017-09-09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
