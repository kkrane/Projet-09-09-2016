-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 30 Septembre 2016 à 09:16
-- Version du serveur: 5.5.52-0ubuntu0.14.04.1
-- Version de PHP: 5.5.37-1+deprecated+dontuse+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `parking`
--

-- --------------------------------------------------------

--
-- Structure de la table `attributions`
--

CREATE TABLE IF NOT EXISTS `attributions` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `spot_id` int(11) NOT NULL DEFAULT '0',
  `end_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`,`spot_id`,`end_at`),
  KEY `spot_id` (`spot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `attributions`
--

INSERT INTO `attributions` (`user_id`, `spot_id`, `end_at`) VALUES
(11, 7, '2016-10-29 22:20:52'),
(1, 8, '2016-10-29 22:18:21');

-- --------------------------------------------------------

--
-- Structure de la table `spots`
--

CREATE TABLE IF NOT EXISTS `spots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` varchar(255) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message` text CHARACTER SET utf8,
  `seen` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `list` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `status`, `password`, `email`, `created_at`, `updated_at`, `remember_token`, `list`) VALUES
(1, 'ElPonchoGrande', 'MuChaCho', 2, '$2a$06$sU7gh1ER91VEYqw/uVk7uu/2Jbwvo1x64JI0uOit.6Orly9tNPjv.', 'gderemusat@gmail.com', NULL, '2016-09-30 07:15:00', 'SCYWIpsDEnjvEhOUvnoTHZ5St3rJOPams5ZIdjGzWB1DMXshujCHcXCT0kfY', 0),
(11, 'chon', 'corni', 1, '$2y$10$dlq1JXI2ydXHweGipvkmxeuNByK.waNV2aNK/p0/b1S.kVxCbJ7TW', 'cornichon@gmail.com', '2016-09-27 07:44:02', '2016-09-29 22:20:56', '2bOYkpT0U4TDqjRRr8UWYnvHgyLP7eHaMJkKQ75BK6HHr7Vi69QJ1tPWHRZV', 0),
(12, 'swagy', 'yolo', 1, '$2y$10$hwKzbdpIGACqFrSiHcVOueWmgsXV/MxCEmWHejNGWU.FxVnOzloby', 'swag92@yolo.com', '2016-09-27 11:54:21', '2016-09-30 07:14:09', 'FiM8MAefzQ4K02ydjNQyfwqxGcDwgwNT0hCma7f4sZJdqs7fb9LUgBn0OP6H', 0),
(13, 'rere', 'efree', 0, '$2y$10$sO6SbjnZUJEYZLNEe1lSp.gTeuEdJ1PUG0kkMEnuMR.NSpQokfSZu', 'gre@greg.com', '2016-09-28 13:39:03', '2016-09-28 13:39:03', NULL, 0),
(14, 'frege', 'fezfa', 0, '$2y$10$diZNHtvBjcSIr3IY78/Zcu7VaaEN5umnx/T2RkL08leOx2rMW/jJe', 'vree@gre.com', '2016-09-28 13:39:43', '2016-09-28 13:39:43', NULL, 0),
(15, 'fefz', 'fezfa', 0, '$2y$10$Y0tAU2AKrVGUH0U6XBEbMu6bkQzn6zdnHlRCYZtPgEK2vzZKwxRK6', 'rgfezfze@regerge.com', '2016-09-28 13:41:45', '2016-09-28 13:41:45', NULL, 0),
(16, 'ezfz', 'adzd', 0, '$2y$10$MNKsbUNhgzHUXIlZTD1uvOGhZs4Vdubl77R67L7QYkUFX7c23b.Se', 'rgfezfzea@regerge.com', '2016-09-28 13:42:52', '2016-09-28 13:42:52', NULL, 0),
(17, 'ezfz', 'adzd', 0, '$2y$10$kspV0OnYMZexFqqY3ur64OzBeb5x1vHX735XNkKjAvUEwIfrY.EFm', 'rgfezfzaea@regerge.com', '2016-09-28 13:43:08', '2016-09-28 13:43:08', NULL, 0);

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
