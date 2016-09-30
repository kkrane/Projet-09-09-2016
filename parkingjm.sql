-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 30 Septembre 2016 à 08:49
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `parkingjm`
--

-- --------------------------------------------------------

--
-- Structure de la table `attributions`
--

CREATE TABLE `attributions` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `spot_id` int(11) NOT NULL DEFAULT '0',
  `start_at` datetime NOT NULL,
  `end_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `attributions`
--

INSERT INTO `attributions` (`user_id`, `spot_id`, `start_at`, `end_at`) VALUES
(1, 8, '2016-10-29 22:18:21', NULL),
(11, 7, '2016-10-29 22:20:52', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `spots`
--

CREATE TABLE `spots` (
  `id` int(11) NOT NULL,
  `num` varchar(255) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `spots`
--

INSERT INTO `spots` (`id`, `num`, `floor`, `status`, `user_id`, `type`) VALUES
(7, '103', 1, NULL, NULL, 0),
(8, '245', 2, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text CHARACTER SET utf8,
  `seen` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `list` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `status`, `password`, `email`, `created_at`, `updated_at`, `remember_token`, `list`) VALUES
(1, 'ElPonchoGrande', 'MuChaCho', 2, '$2a$06$sU7gh1ER91VEYqw/uVk7uu/2Jbwvo1x64JI0uOit.6Orly9tNPjv.', 'gderemusat@gmail.com', NULL, '2016-09-30 07:15:00', 'SCYWIpsDEnjvEhOUvnoTHZ5St3rJOPams5ZIdjGzWB1DMXshujCHcXCT0kfY', 0),
(11, 'chon', 'corni', 1, '$2y$10$dlq1JXI2ydXHweGipvkmxeuNByK.waNV2aNK/p0/b1S.kVxCbJ7TW', 'cornichon@gmail.com', '2016-09-27 07:44:02', '2016-09-29 22:20:56', '2bOYkpT0U4TDqjRRr8UWYnvHgyLP7eHaMJkKQ75BK6HHr7Vi69QJ1tPWHRZV', 0),
(12, 'swagy', 'yolo', 1, '$2y$10$hwKzbdpIGACqFrSiHcVOueWmgsXV/MxCEmWHejNGWU.FxVnOzloby', 'swag92@yolo.com', '2016-09-27 11:54:21', '2016-09-30 07:14:09', 'FiM8MAefzQ4K02ydjNQyfwqxGcDwgwNT0hCma7f4sZJdqs7fb9LUgBn0OP6H', 0),
(13, 'rere', 'efree', 1, '$2y$10$sO6SbjnZUJEYZLNEe1lSp.gTeuEdJ1PUG0kkMEnuMR.NSpQokfSZu', 'gre@greg.com', '2016-09-28 13:39:03', '2016-09-30 07:58:49', NULL, 0),
(14, 'frege', 'fezfa', 1, '$2y$10$diZNHtvBjcSIr3IY78/Zcu7VaaEN5umnx/T2RkL08leOx2rMW/jJe', 'vree@gre.com', '2016-09-28 13:39:43', '2016-09-30 07:58:54', NULL, 0),
(15, 'fefz', 'fezfa', 0, '$2y$10$Y0tAU2AKrVGUH0U6XBEbMu6bkQzn6zdnHlRCYZtPgEK2vzZKwxRK6', 'rgfezfze@regerge.com', '2016-09-28 13:41:45', '2016-09-28 13:41:45', NULL, 0),
(17, 'ezfz', 'adzd', 1, '$2y$10$kspV0OnYMZexFqqY3ur64OzBeb5x1vHX735XNkKjAvUEwIfrY.EFm', 'rgfezfzaea@regerge.com', '2016-09-28 13:43:08', '2016-09-30 07:58:58', NULL, 0),
(18, 'jack', 'mich', 2, '$2y$10$Il4O3AXzboK4OVdpQocH7eJsKU3B2xDFJNxptjFcffnr8/kFZwJge', 'clo@gmail.com', '2016-09-30 07:56:52', '2016-09-30 08:16:07', 'pp3A867SSTJltYD4Qg0lqEXTlGiCzjlPhV5NrrSk8tHfmWqSsfBaIhbrPfIK', 0),
(19, 'jackie', 'mich', 0, '$2y$10$D2FbE3M3ysgvDADBiUZ4VupbnqE54EJAGj1sfK1dNJ0ajfxyVwAYu', 'lolo@gmail.com', '2016-09-30 08:17:17', '2016-09-30 08:21:29', '0P3h8R7IHLEWtjHFi25Iu895CcIxIZsowovCW91prZlVyIkcKv0o1UsphNPm', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `attributions`
--
ALTER TABLE `attributions`
  ADD PRIMARY KEY (`user_id`,`spot_id`,`start_at`),
  ADD KEY `spot_id` (`spot_id`);

--
-- Index pour la table `spots`
--
ALTER TABLE `spots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `spots`
--
ALTER TABLE `spots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `attributions`
--
ALTER TABLE `attributions`
  ADD CONSTRAINT `attributions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `attributions_ibfk_2` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`id`);

--
-- Contraintes pour la table `spots`
--
ALTER TABLE `spots`
  ADD CONSTRAINT `spots_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
