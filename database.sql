SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `idBiere` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`idBiere`,`idCommande`),
  KEY `fk_idBiere` (`idBiere`),
  KEY `fk_idCommande` (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `achat`
--

INSERT INTO `achat` (`idBiere`, `idCommande`, `quantite`) VALUES
(7, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `biere`
--

DROP TABLE IF EXISTS `biere`;
CREATE TABLE IF NOT EXISTS `biere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(32) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `idBrasserie` int(11) NOT NULL,
  `taux` float NOT NULL,
  `composition` varchar(32) NOT NULL,
  `montant` float NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idMarque` (`idBrasserie`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `biere`
--

INSERT INTO `biere` (`id`, `marque`, `nom`, `idBrasserie`, `taux`, `composition`, `montant`, `image`) VALUES
(7, 'Barbare', 'Blonde', 8, 8, 'malt, miel', 1.25, 'barbare.png'),
(8, 'Barbare', 'Bok', 8, 8.5, 'malt, miel', 1.26, 'barbarebok.png'),
(9, 'Blanche', 'de Bruxelles', 8, 4.5, 'malt', 0.9, 'blanchebrux.png'),
(11, 'Blanche', 'de Namur', 9, 4.5, 'malt', 0.94, 'blanchenamur.jpg'),
(12, 'Blanche', 'des Neiges', 10, 4.9, 'malt', 0.85, 'blancheneige.jpg'),
(14, 'Bon Secours', 'Ambrée', 11, 8, 'malt', 1.51, 'bonsecoursambre.jpg'),
(15, 'Bon Secours', 'Blonde', 11, 8, 'malt', 1.33, 'bonsecoursblonde.jpg'),
(16, 'Bon Secours', 'Brune', 11, 8, 'malt', 1.51, 'bonsecoursbrune.png'),
(17, 'Bon Secours', 'Myrtille', 11, 7, 'malt, myrtille', 1.57, 'bonsecoursmyrtille.jpg'),
(18, 'Brunehaut', 'Ambrée BIO', 12, 6.5, 'malt', 1.33, 'brunehautambre.jpg'),
(19, 'Brunehaut', 'Triple', 12, 8, 'malt', 1.43, 'brunehauttriple.jpg'),
(20, 'Brunehaut', 'Blanche BIO', 12, 5, 'malt', 1.22, 'brunehautblanche.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brasserie`
--

DROP TABLE IF EXISTS `brasserie`;
CREATE TABLE IF NOT EXISTS `brasserie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `adresse` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brasserie`
--

INSERT INTO `brasserie` (`id`, `nom`, `adresse`) VALUES
(7, 'Vanuxeem', 'Belgique'),
(8, 'Lefebvre', 'Belgique'),
(9, 'Bocq', 'Belgique'),
(10, 'Huyghe', 'Belgique'),
(11, 'Caulier', 'Belgique'),
(12, 'Brunehaut', 'Belgique');

-- --------------------------------------------------------

--
-- Table structure for table `catebiere`
--

DROP TABLE IF EXISTS `catebiere`;
CREATE TABLE IF NOT EXISTS `catebiere` (
  `idBiere` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`idBiere`,`idCategorie`),
  KEY `fk_idBiere` (`idBiere`),
  KEY `fk_idCategorie` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catebiere`
--

INSERT INTO `catebiere` (`idBiere`, `idCategorie`) VALUES
(7, 1),
(8, 3),
(9, 2),
(11, 2),
(12, 2),
(14, 4),
(15, 1),
(16, 3),
(17, 5),
(18, 4),
(18, 7),
(19, 6),
(20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `specifications` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `specifications`) VALUES
(1, 'blonde', 'couleur or'),
(2, 'blanche', 'couleur claire'),
(3, 'brune', 'couleur foncée'),
(4, 'ambrée', 'couleur rousse'),
(5, 'fruitée', 'arômes de fruits'),
(6, 'triple', 'fort taux d\'alcool'),
(7, 'BIO', 'culture biologique');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `login` varchar(32) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `email` varchar(32) NOT NULL,
  `nonce` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`login`, `mdp`, `nom`, `prenom`, `isAdmin`, `email`, `nonce`) VALUES
('earl', 'b4546f4db1408ce4436a6b5b0ef633cd8dd6d21edd3df3bf937114c61ce98390', 'Sonetti', 'Rudy', 1, 'rudtune@hotmail.fr', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `livraison` tinyint(1) NOT NULL,
  `login` varchar(32) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idClient` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `livraison`, `login`, `date`) VALUES
(2, 0, 'earl', '2017-12-18'),
(3, 1, 'earl', '1995-04-10');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `Achat_ibfk_1` FOREIGN KEY (`idBiere`) REFERENCES `biere` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Achat_ibfk_2` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `biere`
--
ALTER TABLE `biere`
  ADD CONSTRAINT `Biere_ibfk_1` FOREIGN KEY (`idBrasserie`) REFERENCES `brasserie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catebiere`
--
ALTER TABLE `catebiere`
  ADD CONSTRAINT `Catebiere_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Catebiere_ibfk_2` FOREIGN KEY (`idBiere`) REFERENCES `biere` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `client_fk` FOREIGN KEY (`login`) REFERENCES `client` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;