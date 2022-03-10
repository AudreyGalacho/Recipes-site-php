-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 10, 2022 at 10:24 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_recipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentry`
--

CREATE TABLE `commentry` (
  `id_comment` int(11) NOT NULL,
  `user` varchar(150) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `recipe` text NOT NULL,
  `author` varchar(512) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `title`, `recipe`, `author`, `is_enabled`) VALUES
(1, 'Cassoulet', 'La veille : Faire tremper les haricots secs une nuit dans l’eau froide.\r\n\r\nLe lendemain :\r\n\r\nVider cette eau, mettre les haricots dans une casserole avec trois litres d’eau froide et porter à ébullition pendant 5 minutes. Eteindre le feu, vider l’eau et réserver les haricots.\r\nProcéder à la préparation du bouillon avec à nouveau 3 litres d’eau (non calcaire et de Castelnaudary si possible), les couennes coupées en larges lanières, une carcasse de volaille si on l’a ou quelques os de porc et, selon votre goût,un peu d’oignons et de carottes. Saler et poivrer (généreusement). Cuire ce bouillon pendant une heure puis filtrer le bouillon et récupérer les couennes.\r\nDans ce bouillon filtré mettre les haricots à cuire jusqu’à ce que ceux ci soient souples mais restent bien entiers. Pour cela il faut environ une heure d’ébullition.\r\n \r\n\r\nPendant la cuisson des haricots, Préparation des viandes :\r\n\r\nDans une grande poêle sauteuse faire dégraisser les morceaux de confit à feu doux puis les réserver.\r\nDans la graisse restante faire rissoler les saucisses de Toulouse puis les réserver.\r\nFaire rissoler les morceaux de porc qui doivent être bien dorés et les réserver avec les autres viandes.\r\nEgoutter les haricots et conserver le bouillon au chaud. Ajouter aux haricots quelques gousses d’ail et le double en poids de lard salé broyés ensemble.\r\nMontage du Cassoulet :\r\n\r\nPour cela on utilisera le plat creux en terre cuite qui s’appelait « cassolo » (aujourd’hui « la cassole ») et qui a donné son nom au cassoulet, ou à défaut un plat assez creux en terre cuite allant au four.\r\n\r\nTapisser le fond de la cassole avec des morceaux de couenne\r\najouter environ un tiers des haricots\r\ndisposer les viandes et par dessus verser le reste des haricots\r\nDisposer les saucisses en les enfonçant dans les haricots le dessus des saucisses devant rester apparent\r\nCompléter la cassole en versant le bouillon chaud qui doit juste couvrir les haricots\r\nPoivrer au moulin en surface et ajouter une cuillère à soupe de la graisse de canard ayant servi à rissoler les viandes.\r\nCuisson :\r\n\r\nMettre au four à 150°/160° (Thermostat 5 ou 6) et laisser cuire deux à trois heures.\r\nPendant la cuisson il se formera sur le dessus de la cassole une croûte marron dorée qu’il faudra enfoncer à plusieurs reprises (les anciens disaient 7 fois).\r\nQuand le dessus des haricots commence à sécher on ajoutera quelques cuillères de bouillon.', 'mickael.andrieu@exemple.com', 1),
(2, 'Couscous', '', 'mickael.andrieu@exemple.com', 0),
(3, 'Escalope milanaise', 'Commencez cette recette d\'escalopes milanaises en réduisant au mixeur le pain en chapelure fine. Versez la farine dans une assiette plate. Versez les oeufs battus dans une seconde assiette. Mélangez la chapelure et le parmesan dans une troisième assiette.\r\n\r\nPassez chaque escalope dans la farine, l’oeuf battu puis dans la chapelure. Répétez l’opération une seconde fois pour que la panure soit bien épaisse.\r\n\r\nFaites fondre 50 g de beurre dans une poêle avec 2 c. à soupe d’huile d’olive. Ajoutez les escalopes panées, laissez cuire jusqu’à ce que la chapelure soit dorée. Retirez du feu, arrosez d’un filet de jus de citron. Salez, poivrez.', 'mathieu.nebra@exemple.com', 1),
(4, 'Salade Romaine', '', 'laurene.castor@exemple.com', 0),
(6, 'Salade niçoise', ' Prenez une niçoise MAIS ne lui racontez pas de salades!!!', 'lupi@exemple.com', 1),
(7, 'Riz au lait', 'Du riz du lait m\'voyez...', 'lupi@exemple.com', 1),
(12, 'Je teste l\'update....', 'Ou pas.... Mais ce n\'est pas une recette pertinante...', 'lupi@exemple.com', 1),
(13, 'Le plat du soir : petit pois, steak avec du bleu de brebis', '   -Ouvrir la boite de conserve, \r\n-Mettre à chauffer les petits pois et la poële. \r\n-Puis prendre l\'apéro avec sa chérie dans le canapé.\r\n-Se relever pour mettre à cuire la viande. \r\nJe t\'aime mon amour.', 'lupi@exemple.com', 1),
(14, 'Les cookies de Laurène', 'Du beure du sucre et du chocolaaaaaaaaaaaaaaaaaaaaaat', 'laurene.castor@exemple.com', 1),
(25, 'Poire belle Helene', 'des poires pour ma belle Helene', 'lupi@exemple.com', 1),
(28, 'Cookies XIBI', 'ÉTAPE 1 chocolat noir Détailler le chocolat en pépites.  ÉTAPE 2 beurre tendre sucre oeuf vanille Préchauffer le four à 180°C (thermostat 6). Dans un saladier, mettre 75 g de beurre, le sucre, l\'oeuf entier, la vanille et mélanger le tout.  ÉTAPE 3 farine levure chimique sel chocolat noir Ajouter petit à petit la farine mélangée à la levure, le sel et le chocolat.  ÉTAPE 4 beurre tendre Avec une feuille de papier essuie-tout, beurrer une plaque allant au four et former les cookies sur la plaque.  ÉTAPE 5 Pour former les cookies, utiliser 2 cuillères à soupe et faire des petits tas espacés les uns des autres; ils grandiront à la cuisson.  ÉTAPE 6 Enfourner pour 10 minutes de cuisson.', 'xibalba@exemple.com', 1),
(48, 'Des PaaaatesV2', 'Pour la lettre D.\r\nla même', 'lupi@exemple.com', 1),
(41, 'Les retours', '  Les retours à la ligne\r\nC\'est\r\nCRO\r\nCRO\r\nBiennnnn\r\nOn teste on teste on teste les fonction sql\r\n', 'lupi@exemple.com', 1),
(39, 'test 3000', '      ajout normal on sais pas quoi dire \r\nmais c\'est en plusieurs points\r\npar ce qu\'on PEUT\r\n&lt;strong&gt;TEST&lt;/strong&gt;yyy', 'lupi@exemple.com', 1),
(40, 'les pates au pesto', 'Faire cuire des pates ajoutez du pesto et du parmesan dégustez!!', 'xibalba@exemple.com', 1),
(43, 'Ma recette', 'On essai les fonctions au propre\r\n', 'lupi@exemple.com', 1),
(47, 'Des Paaaates', 'Pour la lettre D.', 'lupi@exemple.com', 1),
(44, 'Alouette', 'Gentille alouette,...\r\n j\'ai zéro idée', 'lupi@exemple.com', 1),
(46, 'Behhhhh', ' Une recette d\'une salade de chèvre miel', 'lupi@exemple.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(64) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(128) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `age`) VALUES
(1, 'Mickaël Andrieu', 'mickael.andrieu@exemple.com', 'chante', 34),
(2, 'Mathieu Nebra', 'mathieu.nebra@exemple.com', 'sca', 36),
(3, 'Laurène Castor', 'laurene.castor@exemple.com', 'bois', 28),
(4, 'Lupi', 'lupi@exemple.com', 'test', 89),
(5, 'Xibalba', 'xibalba@exemple.com', 'letsgo', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentry`
--
ALTER TABLE `commentry`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentry`
--
ALTER TABLE `commentry`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
