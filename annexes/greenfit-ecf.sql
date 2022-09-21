-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 12 sep. 2022 à 15:30
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `greenfit-ecf`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `lastname`, `firstname`, `email`, `subject`, `message`) VALUES
(1, 'Ollivier', 'Jérôme', 'contact@popcorndigital.fr', 'test new', 'new'),
(2, 'Ollivier', 'Jérôme', 'contact@popcorndigital.fr', 'test lastone', 'voici un long texte'),
(3, 'Ollivier', 'Jérôme', 'contact@popcorndigital.fr', 'test lastone', 'voici un long texte'),
(4, 'Ollivier', 'Jérôme', 'contact@popcorndigital.fr', 'coucou', 'la Terre'),
(5, 'Ollivier', 'Jérôme', 'contact@popcorndigital.fr', 'test', 'test de message');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220827133116', '2022-08-27 15:31:21', 60),
('DoctrineMigrations\\Version20220827133221', '2022-08-27 15:32:26', 39),
('DoctrineMigrations\\Version20220827133345', '2022-08-27 15:33:48', 64),
('DoctrineMigrations\\Version20220827133625', '2022-08-27 15:36:30', 74),
('DoctrineMigrations\\Version20220827133829', '2022-08-27 15:38:32', 124),
('DoctrineMigrations\\Version20220827134221', '2022-08-27 15:42:33', 33),
('DoctrineMigrations\\Version20220827140904', '2022-08-27 16:09:07', 176),
('DoctrineMigrations\\Version20220827144221', '2022-08-27 16:42:28', 27),
('DoctrineMigrations\\Version20220828130150', '2022-08-28 15:02:20', 604),
('DoctrineMigrations\\Version20220828131240', '2022-08-28 15:12:45', 30),
('DoctrineMigrations\\Version20220828154519', '2022-08-28 17:45:23', 105),
('DoctrineMigrations\\Version20220829093529', '2022-08-29 11:35:39', 487),
('DoctrineMigrations\\Version20220829093651', '2022-08-29 11:36:54', 48),
('DoctrineMigrations\\Version20220829094008', '2022-08-29 11:40:15', 66),
('DoctrineMigrations\\Version20220829094116', '2022-08-29 11:41:18', 60),
('DoctrineMigrations\\Version20220905125835', '2022-09-05 14:58:49', 160);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `is_default`) VALUES
(1, 'Cours de danse', 'Proposer des cours de danse effectués par des professeurs agréés', 1),
(2, 'Envoi de SMS', 'Proposer un système de gestion d\'envoi de SMS aux clients et prospects', 1),
(3, 'Envoi de newsletters', 'Proposer un système d\'envoi de newsletters mensuelles à tous les abonnés', 0),
(4, 'Gérer le planning d\'équipe', 'Proposer un outil permettant de gérer les plannings deséquipes de professionnels', 0),
(5, 'Vendre des boissons', 'Permettre de proposer la vente de boissons via l\'application GreenFit sans avoir à sortir son porte-monnaie', 0);

-- --------------------------------------------------------

--
-- Structure de la table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partners`
--

INSERT INTO `partners` (`id`, `name`, `is_active`) VALUES
(2, 'Sport Orléans', 1),
(10, 'Sport Tours', 1),
(11, 'Sport Blois', 0),
(12, 'Sport Chartres', 1);

-- --------------------------------------------------------

--
-- Structure de la table `partners_modules`
--

CREATE TABLE `partners_modules` (
  `partners_id` int(11) NOT NULL,
  `modules_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partners_modules`
--

INSERT INTO `partners_modules` (`partners_id`, `modules_id`) VALUES
(2, 1),
(2, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(12, 3),
(12, 4);

-- --------------------------------------------------------

--
-- Structure de la table `roles_users`
--

CREATE TABLE `roles_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles_users`
--

INSERT INTO `roles_users` (`id`, `name`) VALUES
(1, '[\"ROLE_ADMIN\"]'),
(2, '[\"ROLE_PARTNER\"]'),
(3, '[\"ROLE_STRUCTURE\"]');

-- --------------------------------------------------------

--
-- Structure de la table `structures`
--

CREATE TABLE `structures` (
  `id` int(11) NOT NULL,
  `partners_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `structures`
--

INSERT INTO `structures` (`id`, `partners_id`, `name`, `manager_name`, `is_active`) VALUES
(1, 2, 'Bannier', 'Ollivier', 1),
(7, 2, 'République', 'Peno', 1),
(9, 2, 'aef', 'eafa', 0),
(10, 10, 'Jaurés', 'Henry', 1);

-- --------------------------------------------------------

--
-- Structure de la table `structures_modules`
--

CREATE TABLE `structures_modules` (
  `structures_id` int(11) NOT NULL,
  `modules_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `structures_modules`
--

INSERT INTO `structures_modules` (`structures_id`, `modules_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(7, 1),
(7, 2),
(9, 2),
(9, 4),
(10, 1),
(10, 4),
(10, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_users_id` int(11) DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `structure_id` int(11) DEFAULT NULL,
  `partner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`, `lastname`, `firstname`, `address`, `zipcode`, `roles_users_id`, `city`, `structure_id`, `partner_id`) VALUES
(1, 'admin@greenfit.fr', '[\"ROLE_ADMIN\"]', '$2y$13$Ee9JW95GDnqzvkmwMBE4h.sEi4OpUtaEXtijTTrz5ZkATVrqh4Zn2', 'Ollivier', 'Jérôme', '12, rue du Bari', '45740', 1, 'Lailly-en-Val', NULL, NULL),
(7, 'orleans@greenfit.fr', '[\"ROLE_PARTNER\"]', '$2y$13$mZkeEOxclJ6Cxr.r6kEW7eTeBtEnnx1hFHKDfGUGmGjOOEna2FZIu', 'Dubois', 'Paul', '9 place du Martroi', '45000', 2, 'Orléans', NULL, 2),
(8, 'orleans-bannier@greenfit.fr', '[\"ROLE_STRUCTURE\"]', '$2y$13$acZYu/f7rsMX5Fajz3T6iesLePn.n1Ho.SipHYyJalMY.a5Evknoq', 'Dubet', 'Chantale', '87, rue Bannier', '45000', 3, 'Orléans', 1, NULL),
(19, 'admin48@greenfit.fr', '[\"ROLE_ADMIN\"]', '$2y$13$09k3Zn/k6aOI/wiUAWCTG./Z5hFUD3xa3r2qKI7QiVFAa3quKVUJK', 'Ollivier', 'Jérômez', '12 Rue du Bari', '45740', 1, 'Lailly-en-Val', NULL, NULL),
(27, 'loire.orleans@greenfit.fr', '[\"ROLE_STRUCTURE\"]', '$2y$13$GLCiJvZP2PiyjqaW9t.dpOZb3k6aUYjTkmHJ1TOd.2vxWPZGIeQ4q', 'Martinet', 'José', '54 Faubourg de la Loire', '45000', 3, 'Orléans', NULL, NULL),
(28, 'tours@greenfit.fr', '[\"ROLE_PARTNER\"]', '$2y$13$4YrSbxxWpmozlJj4wUiD1.iGan4qReU8tu3g07CnSXjfbUTOlHZaW', 'Turpin', 'Odile', '72 rue de la Loire', '37000', 2, 'Tours', NULL, 10),
(29, 'orleans-republique@greenfit.fr', '[\"ROLE_STRUCTURE\"]', '$2y$13$4yvycf5UlBjW9iTaO/Dp1ei4cWEklX.Os7a7W0kWS2i2aRgPElTze', 'Peno', 'José', '12 rue de la République', '45000', 3, 'Orléans', 7, NULL),
(30, 'blois@greenfit.fr', '[\"ROLE_PARTNER\"]', 'password', 'Luzzi', 'Fabio', '75 avenue de Vendôme', '41000', 2, 'Blois', NULL, 11),
(31, 'chartres@greenfit.fr', '[\"ROLE_PARTNER\"]', '$2y$13$4J2LoJqlUavvwVGitjI0UOZ3jJiHWYU9ius6PLO6McOXuk.l/fWw6', 'Vieira', 'Théodore', '55 rue de la Cathédrale', '28000', 2, 'Chartres', NULL, 12),
(34, 'adminfzf@greenfit.fr', '[\"ROLE_STRUCTURE\"]', 'password', 'Ollivier', 'Jérôme', '12 Rue du Bari', '45740', 3, 'Lailly-en-Val', 9, NULL),
(35, 'tours-jaures@greenfit.fr', '[\"ROLE_STRUCTURE\"]', 'password', 'Henry', 'Michel', '75 Bd Jean Jaurès', '37300', 3, 'Joué-lès-Tours', 10, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partners_modules`
--
ALTER TABLE `partners_modules`
  ADD PRIMARY KEY (`partners_id`,`modules_id`),
  ADD KEY `IDX_5DFB55A7BDE7F1C6` (`partners_id`),
  ADD KEY `IDX_5DFB55A760D6DC42` (`modules_id`);

--
-- Index pour la table `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `structures`
--
ALTER TABLE `structures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5BBEC55ABDE7F1C6` (`partners_id`);

--
-- Index pour la table `structures_modules`
--
ALTER TABLE `structures_modules`
  ADD PRIMARY KEY (`structures_id`,`modules_id`),
  ADD KEY `IDX_6F3F71579D3ED38D` (`structures_id`),
  ADD KEY `IDX_6F3F715760D6DC42` (`modules_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_1483A5E92534008B` (`structure_id`),
  ADD UNIQUE KEY `UNIQ_1483A5E99393F8FE` (`partner_id`),
  ADD KEY `IDX_1483A5E94DE6C1DF` (`roles_users_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `roles_users`
--
ALTER TABLE `roles_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `structures`
--
ALTER TABLE `structures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `partners_modules`
--
ALTER TABLE `partners_modules`
  ADD CONSTRAINT `FK_5DFB55A760D6DC42` FOREIGN KEY (`modules_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5DFB55A7BDE7F1C6` FOREIGN KEY (`partners_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `structures`
--
ALTER TABLE `structures`
  ADD CONSTRAINT `FK_5BBEC55ABDE7F1C6` FOREIGN KEY (`partners_id`) REFERENCES `partners` (`id`);

--
-- Contraintes pour la table `structures_modules`
--
ALTER TABLE `structures_modules`
  ADD CONSTRAINT `FK_6F3F715760D6DC42` FOREIGN KEY (`modules_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6F3F71579D3ED38D` FOREIGN KEY (`structures_id`) REFERENCES `structures` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E92534008B` FOREIGN KEY (`structure_id`) REFERENCES `structures` (`id`),
  ADD CONSTRAINT `FK_1483A5E94DE6C1DF` FOREIGN KEY (`roles_users_id`) REFERENCES `roles_users` (`id`),
  ADD CONSTRAINT `FK_1483A5E99393F8FE` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
