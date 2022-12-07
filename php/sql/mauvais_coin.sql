-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 07 déc. 2022 à 13:25
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mauvais_coin`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(3, 'Arme', 'arme'),
(1, 'Electroménager', 'electromenager'),
(5, 'Illicite', 'illicite'),
(2, 'Livre', 'livre'),
(6, 'Téléphone', 'telephone'),
(4, 'Vêtement', 'vetement');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `status` enum('Nouvelle','Expédiée','Finie','Retour Client') NOT NULL,
  `user_id` int(11) NOT NULL,
  `dateCommande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adresseLivraison` varchar(60) NOT NULL,
  `dateLastUpdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `stock`, `category_id`, `slug`) VALUES
(4, 'Table', 'une table', 12228, 1, 2, 'table'),
(5, 'Apple', 'A delicious red or green fruit', 1.99, 50, 6, 'apple'),
(6, 'Banana', 'A yellow fruit with a soft texture', 1.13, 52, 1, 'banana'),
(7, 'Orange', 'A citrus fruit with a juicy interior', 1.49, 30, 6, 'orange'),
(8, 'Strawberry', 'A red fruit with a sweet flavor', 3.1, 20, 6, 'strawberry'),
(9, 'Blueberry', 'A small, sweet fruit with a blue-purple color', 3.49, 10, 6, 'blueberry'),
(11, 'Smartphone', 'A phone with advanced computing capabilities', 495.99, 23, 1, 'smartphone'),
(13, 'Headphones', 'A device that allows you to listen to audio privately', 99.99, 40, 1, 'headphones'),
(14, 'Wireless Mouse', 'A computer peripheral that allows you to control the cursor', 39.99, 50, 1, 'wireless-mouse'),
(15, 'T-Shirt', 'A casual shirt with short sleeves and a round neckline', 19.99, 10, 2, 't-shirt'),
(17, 'Dress', 'A garment worn by women, typically with a skirt and a bodice', 79.99, 30, 2, 'dress'),
(21, 'Tesla', 'voiture ki roule', 45000, 5, 5, 'tesla'),
(22, 'Kalach', 'pan pan', 699, 9, 3, 'kalach');

-- --------------------------------------------------------

--
-- Structure de la table `product_commande`
--

CREATE TABLE `product_commande` (
  `product_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `password` varchar(500) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `admin`) VALUES
(1, 'test', 'aa@a.f', '01325532626', '$2y$10$VEgIZuvNb1NumGKn/2K1huybR.nzB2ed1zEpmpiYhh0MxEKPoEX5G', 0),
(2, 'alex', 'alex@test.fr', '0121214453', '$2y$10$rXDMr4qxCTJ1KfyxWGefMefX73hs/yC3uZEyeCM9rh9VKLbzyqPke', 1),
(3, 'bobby', 'bob@lol.fr', '3025320562340', '$2y$10$fkAIRvdiS3hG4muyQ0Md7OASrodDwX4JbUEjiOdhOJNkX0bhQ4Tdm', 0),
(4, 'Timmy', 'timm@lds.fr', '2352632', '$2y$10$HF7PmTAF4nx0LjZwvjRkLu5c3GiuV7qF9ZnR39NDs23MPpZ5h0.8C', 0),
(5, 'zaza', 'err@a.com', '03432525', '$2y$10$n94sbUHXXUhvksBdmlO6Ae9bsem837IKvKidzgKHLzQ3z0pM04opG', 0),
(6, 'zaza2', 'err@a.com', '03432525', '$2y$10$koF0YWhaYCK7qsDbhQqgLecVcjXqZbmflG0Mrh58muK9bmi0MLhvq', 0),
(7, 'zaza3', 'aa@a.f', '4235262', '$2y$10$7h9qf.YR3jqnNvS5f17SJuiOzd3GFKy4SpDxQWEHCgQ6AoimlkGHG', 0),
(10, 'zaza4', 'aa@a.f', '4325235', '$2y$10$U//gAfNTB0HyEwlO8MthTuCSsmFB4e7vHUPIenTwH1ttyu1rLQjW6', 0),
(11, 'rarae', 'test@test.com', '423525', '$2y$10$gi2GuRV0ista4CaQ56W8tuhgXkmXCSUrHigxkC/CA6lE6ryNkvADG', 0),
(12, 'lololo', 'zaerar@rrezr.de', '01325532626', '$2y$10$n3gBQM1uAHTyvCySAVhZRuh.iv7l0fGReShS9tussV7c2vQFSNTBO', 0),
(13, 'alexandre', 'alexandre@gmail.fr', '0123456789', '$2y$10$Ib6fQLn47DwKENz3/iaZn.8m5QIWKHYmFPW4g/HLyUBX0K/HRw5Q.', 1),
(14, 'user', 'user@test.fr', '01214252', '$2y$10$k.lIOXM97cpZCr0.Fe7OTuToFADSJBSQkiaRvdiRAEva1QxoEloPy', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`slug`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`slug`);

--
-- Index pour la table `product_commande`
--
ALTER TABLE `product_commande`
  ADD PRIMARY KEY (`product_id`,`commande_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
