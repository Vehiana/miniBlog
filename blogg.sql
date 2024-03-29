-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2024 at 02:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogg`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `author`, `createdAt`) VALUES
(1, 'Voici mon premier article', 'Mon super blog est en construction.', 'Lia', '2019-03-15 08:10:24'),
(2, 'Un deuxième article', 'Je continue à ajouter du contenu sur mon\r\nblog.', 'Lia', '2019-03-16 13:27:38'),
(3, 'Mon troisième article', 'Mon blog est génial !!!', 'Lia', '2019-03-16 14:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `article_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `pseudo`, `content`, `createdAt`, `article_id`) VALUES
(1, 'Jean', 'Génial, hâte de voir ce que ça donne !', '2022-03-16 21:02:24', 1),
(2, 'Nina', 'Trop cool ! depuis le temps', '2023-03-17 17:34:35', 1),
(3, 'Rodrigo', 'Great ! ', '2022-03-17 17:42:04', 1),
(4, 'Hélène', 'je suis heureuse de découvrir un super site ! Continuez comme ça ', '2022-03-18 12:08:37', 2),
(5, 'Moussa', 'Un peu déçu par le contenu pour le moment...', '2023-03-18 03:09:02', 2),
(6, 'Barbara', 'pressée de voir la suite', '2023-03-18 10:05:58', 2),
(7, 'Guillaume', 'Je viens ici pour troller !', '2022-03-19 21:08:44', 3),
(8, 'Aurore', 'Enfin un blog tranquille, où on ne nous casse pas les pieds !', '2022-03-19 21:09:27', 3),
(9, 'Jordane', 'Je suis vendéen ! Amateur de mojettes !', '2022-03-20 10:10:11', 3),
(16, 'Tania', 'Ajout du commentaire à l\'article 1', '2024-03-26 10:47:47', 1),
(17, 'Tania', 'Ajout d\'un commentaire à l\'article 2', '2024-03-26 10:48:13', 2),
(18, 'Tania', 'Ajout d\'un commentaire à l\'article 3', '2024-03-26 10:48:32', 3),
(19, 'll', 'll', '2024-03-27 15:01:34', 3),
(20, 'pp', 'ppp', '2024-03-27 15:02:11', 3),
(21, 'Tea', 'test', '2024-03-27 15:17:02', 2),
(22, 'Tea', 'Test d\'ajout\r\n', '2024-03-28 13:29:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `date_creation_user` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_id` (`article_id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
