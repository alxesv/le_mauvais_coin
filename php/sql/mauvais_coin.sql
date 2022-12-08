-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 08 déc. 2022 à 14:47
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
(1, 'Book', 'book'),
(3, 'Cars', 'cars'),
(2, 'Clothes', 'clothes'),
(4, 'Food', 'food'),
(5, 'Phone', 'phone');

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

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `status`, `user_id`, `dateCommande`, `adresseLivraison`, `dateLastUpdate`) VALUES
(1, 'Expédiée', 2, '2022-12-08 15:43:30', '4 rue aaa', '2022-12-08 14:44:45'),
(2, 'Nouvelle', 1, '2022-12-08 15:46:33', '3 rue bbb', '2022-12-08 15:46:33');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `date`, `product_id`) VALUES
(1, 2, 'Très bonnes pommes', '2022-12-08 15:43:46', 34),
(3, 1, 'très beaux jeans', '2022-12-08 15:46:57', 12),
(4, 1, 'bof', '2022-12-08 15:47:09', 34);

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

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`) VALUES
(1, 'user_test', 'test@test.fr', 'remboursement svp');

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
(1, 'The Art of War', 'A classic treatise on military strategy', 29.99, 100, 1, 'the-art-of-war'),
(2, 'Pride and Prejudice', 'A romantic novel about the societal expectations of women', 19.99, 50, 1, 'pride-and-prejudice'),
(3, 'The Catcher in the Rye', 'A coming-of-age novel about a young man\'s struggles with adulthood', 14.99, 75, 1, 'the-catcher-in-the-rye'),
(4, 'The Alchemist', 'A novel about a young man\'s quest to fulfill his destiny', 24.99, 25, 1, 'the-alchemist'),
(5, 'The Book Thief', 'A novel about a young girl\'s experiences in Nazi Germany', 19.99, 30, 1, 'the-book-thief'),
(6, 'The Picture of Dorian Gray', 'A novel about a man\'s obsession with eternal youth', 18.99, 20, 1, 'the-picture-of-dorian-gray'),
(7, 'To Kill a Mockingbird', 'A novel about racism and injustice in the American South', 14.99, 35, 1, 'to-kill-a-mockingbird'),
(8, 'The Great Gatsby', 'A novel about the decadence and excess of the Roaring Twenties', 24.99, 40, 1, 'the-great-gatsby'),
(9, 'One Hundred Years of Solitude', 'A novel about a family\'s history and the fictional town of Macondo', 29.99, 45, 1, 'one-hundred-years-of-solitude'),
(10, 'Moby-Dick', 'A novel about a sailor\'s obsessive hunt for a white whale', 22.99, 50, 1, 'moby-dick'),
(11, 'T-Shirt', 'A plain white t-shirt', 9.99, 50, 2, 't-shirt'),
(12, 'Jeans', 'A pair of blue jeans', 29.99, 30, 2, 'jeans'),
(13, 'Hoodie', 'A black hoodie', 24.99, 25, 2, 'hoodie'),
(14, 'Socks', 'A pack of white socks', 4.99, 100, 2, 'socks'),
(15, 'Underwear', 'A pack of white underwear', 9.99, 50, 2, 'underwear'),
(16, 'Scarf', 'A red and white scarf', 14.99, 19, 2, 'scarf'),
(17, 'Hat', 'A black baseball cap', 19.99, 34, 2, 'hat'),
(18, 'Belt', 'A black leather belt', 24.99, 40, 2, 'belt'),
(19, 'Gloves', 'A pair of black gloves', 29.99, 45, 2, 'gloves'),
(20, 'Sweater', 'A green sweater', 22.99, 50, 2, 'sweater'),
(21, 'Ford Mustang', 'A red Ford Mustang', 29999, 5, 3, 'ford-mustang'),
(22, 'Chevrolet Camaro', 'A blue Chevrolet Camaro', 25999, 2, 3, 'chevrolet-camaro'),
(23, 'Dodge Challenger', 'A black Dodge Challenger', 39999, 4, 3, 'dodge-challenger'),
(24, 'Toyota Corolla', 'A white Toyota Corolla', 14999, 10, 3, 'toyota-corolla'),
(25, 'Honda Civic', 'A silver Honda Civic', 19999, 7, 3, 'honda-civic'),
(26, 'Tesla Model 3', 'A red Tesla Model 3', 44999, 1, 3, 'tesla-model-3'),
(27, 'Nissan Altima', 'A black Nissan Altima', 24999, 5, 3, 'nissan-altima'),
(28, 'Mazda 3', 'A blue Mazda 3', 17999, 6, 3, 'mazda-3'),
(29, 'Subaru Outback', 'A silver Subaru Outback', 29999, 3, 3, 'subaru-outback'),
(30, 'Hyundai Sonata', 'A white Hyundai Sonata', 24999, 4, 3, 'hyundai-sonata'),
(31, 'Bread', 'A loaf of white bread', 2.99, 50, 4, 'bread'),
(32, 'Milk', 'A carton of milk', 3.99, 30, 4, 'milk'),
(33, 'Cheese', 'A block of cheddar cheese', 4.99, 25, 4, 'cheese'),
(34, 'Apples', 'A bag of apples', 5.99, 97, 4, 'apples'),
(35, 'Oranges', 'A bag of oranges', 6.99, 50, 4, 'oranges'),
(36, 'Chicken', 'A pack of boneless chicken breasts', 9.99, 20, 4, 'chicken'),
(37, 'Beef', 'A pack of ground beef', 11.99, 35, 4, 'beef'),
(38, 'Pork', 'A pack of pork chops', 12.99, 40, 4, 'pork'),
(39, 'Fish', 'A pack of salmon fillets', 14.99, 45, 4, 'fish'),
(40, 'Shrimp', 'A pack of uncooked shrimp', 16.99, 50, 4, 'shrimp'),
(41, 'iPhone 12', 'A black iPhone 12', 799, 5, 5, 'iphone-12'),
(42, 'Samsung Galaxy S21', 'A purple Samsung Galaxy S21', 799, 3, 5, 'samsung-galaxy-s21'),
(43, 'Google Pixel 5', 'A black Google Pixel 5', 699, 4, 5, 'google-pixel-5'),
(44, 'OnePlus 8', 'A green OnePlus 8', 699, 10, 5, 'oneplus-8'),
(45, 'LG V60 ThinQ', 'A white LG V60 ThinQ', 699, 7, 5, 'lg-v60-thinq'),
(46, 'Motorola Moto G Power', 'A blue Motorola Moto G Power', 299, 2, 5, 'motorola-moto-g-power'),
(47, 'Moto G Play', 'A black Moto G Play', 199, 5, 5, 'moto-g-play'),
(48, 'Nokia 2.3', 'A blue Nokia 2.3', 169, 6, 5, 'nokia-2-3'),
(49, 'Samsung Galaxy A21s', 'A black Samsung Galaxy A21s', 229, 3, 5, 'samsung-galaxy-a21s'),
(50, 'Realme 7 Pro', 'A white Realme 7 Pro', 299, 4, 5, 'realme-7-pro');

-- --------------------------------------------------------

--
-- Structure de la table `product_commande`
--

CREATE TABLE `product_commande` (
  `product_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product_commande`
--

INSERT INTO `product_commande` (`product_id`, `commande_id`, `quantity`) VALUES
(16, 2, 1),
(17, 1, 1),
(22, 1, 1),
(26, 2, 1),
(34, 1, 2),
(34, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `user_id`, `rating`) VALUES
(1, 34, 2, 5),
(2, 22, 2, 2),
(3, 12, 1, 5),
(4, 34, 1, 2);

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
(1, 'alex', 'alex@gmail.fr', '0987654321', '$2y$10$on2lXs3u/kOS5xpQsGx/Eu72EKcHBPZVLN7nwhJpYwPBa.trgmZTC', 1),
(2, 'user', 'user@test.fr', '1234567890', '$2y$10$.z.NapVSxVZFj8suB2RB6.SO9cxkErxYiF/ByfGC3tDlipqBD7Tbu', 0);

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
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
