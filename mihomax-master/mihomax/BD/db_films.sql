-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 03:44 PM
-- Server version: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_films`
--
CREATE DATABASE IF NOT EXISTS `db_films` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `db_films`;

-- --------------------------------------------------------

--
-- Table structure for table `achats`
--

DROP TABLE IF EXISTS `achats`;
CREATE TABLE `achats` (
  `idach` int(11) NOT NULL,
  `idm` int(11) NOT NULL,
  `datach` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `achats`
--

INSERT INTO `achats` (`idach`, `idm`, `datach`) VALUES
(1, 1, '2018-02-18'),
(2, 2, '2018-02-21'),
(3, 3, '2018-02-22'),
(4, 1, '2018-02-19'),
(5, 4, '2018-01-28'),
(6, 3, '2018-02-19'),
(7, 1, '2018-02-21'),
(8, 6, '2018-02-26'),
(9, 7, '2018-02-19'),
(10, 7, '2018-02-19'),
(11, 7, '2018-02-19'),
(12, 7, '2018-02-20'),
(13, 7, '2018-02-20'),
(14, 7, '2018-02-20'),
(15, 5, '2018-02-20'),
(16, 5, '2018-02-20'),
(17, 5, '2018-02-21'),
(18, 7, '2018-03-05'),
(19, 7, '2018-03-05'),
(20, 7, '2018-03-05'),
(21, 7, '2018-03-05'),
(22, 5, '2018-03-06'),
(23, 5, '2018-03-06'),
(24, 5, '2018-03-06'),
(25, 7, '2018-03-12'),
(26, 5, '2018-04-04'),
(27, 5, '2018-04-04'),
(29, 5, '2018-04-04'),
(30, 5, '2018-04-04'),
(31, 5, '2018-04-04'),
(32, 7, '2018-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE `films` (
  `idf` int(11) NOT NULL,
  `titre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `res` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `trailer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pochette` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `descr` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`idf`, `titre`, `duree`, `res`, `pays`, `prix`, `trailer`, `pochette`, `rating`, `descr`) VALUES
(2, 'Moana', 107, 'John Musker', 'Amérique', '3.99', 'RisAN8aNCXI', 'c7ee5c3e2a95257aa69981155f5a8144d8424db3.jpg', '4.0', 'Moana est la fille unique du chef dMoana est la fille unique du chef d\'un village, campé sur une île paradisiaque du Pacifique Sud. Bien que la jeune femme connaît son devoir d\'héritière et de future chef, elle est irrémédiablement attirée par l\'océan. Lorsque sa grand-mère lui apprend son véritable destin, celui de convaincre le demi-dieu Maui de ramener le coeur de Te Fiti, qu\'il a volé il y a de cela des centaines d\'années, elle s\'embarque dans une aventure remplie de rebondissement sur les hautes mers. Des créatures effrayantes et des situations inattendues viendront teinter son voyage.'),
(3, 'Dirty Papy', 102, 'Dan Mazer', 'Amérique', '6.00', 'vOAn83vOZLk', 'c88f0aa917236c98ef82f5d5e39a7a99df46686b.jpg', '2.0', 'Jason Kelly, avocat un peu coincé, s\'apprête à épouser la fille autoritaire de son patron. Autant dire qu\'il est désormais bien parti pour devenir associé au sein du cabinet… Mais c\'est sans compter sur son grand-père Dick, vieil obsédé sexuel, qui le convainc de l\'accompagner en Floride pour quelques jours de vacances. Soudain, Jason voit la perspective de son mariage remise en question. Car son grand-père entend profiter de la vie au maximum et embarquer son petit-fils dans ses aventures rocambolesques. Du coup, entre les soirées arrosées, les bagarres dans les bars et une folle nuit passée au karaoké, Jason découvre des plaisirs de l\'existence qu\'il ne soupçonnait pas, tandis que Dick s\'attache à ce garçon qu\'il ne connaissait presque pas…'),
(4, 'Mise à l\'épreuve 2', 102, 'Tim Story', 'Amérique', '7.00', 'ipQEuzH5D1c', 'f4a3e98f52ce4f21de01b8db1993cc438c444b88.jpg', '3.0', 'Grâce à une mission menée à bien, l\'agent de police Ben Barber obtient l\'accord de son collègue, le coriace James Payton, pour fréquenter sa soeur Angela. Quelque temps plus tard, Ben est désormais sur le point de se marier avec Angela. Mais tandis que les préparatifs de la cérémonie s\'organisent, il est une nouvelle fois mis à l\'épreuve par son futur beau-frère afin obtenir son aval sur le mariage. Les deux détectives refont alors équipe et se rendent cette fois à Miami pour tenter de démanteler un important réseau de trafic de drogue...'),
(5, 'The Boss', 99, 'Ben Falcone', 'Amérique', '5.59', 'Ppzt_hrlUxw', '5c105f5e9df6453313260a2e0348c7985b098848.jpg', '4.0', 'Une huile de la finance tombée pour délit d’initié est envoyée en prison. À sa sortie, tout le monde, surtout ceux qu’elle a arnaqués par le passé, n’est pas prêt à croire en son tout nouveau numéro de parfaite repentie prête pour un nouveau départ.'),
(6, 'Keanu', 100, 'Peter Atencio', 'Amérique', '7.29', 'K9zy27apgI8', '697d13bb648e57973785b7b133d5c5ec876368f0.jpg', '3.0', 'Tout va mal dans la vie de Rell, un photographe toxicomane, depuis que sa petite amie l\'a quitté. Pour contrer les revers de la vie, Rell se procure un mignon petit chaton, qu\'il nomme Keanu, qui lui rend instantanément le bonheur. Malheureusement, ce bien-être sera de courte durée puisque sa maison sera cambriolée et le félin kidnappé par un gang de rue mené par un être impitoyable surnommé Cheddar. Rell et son cousin Clarence décideront alors de se faire passer pour de redoutables assassins afin de retrouver les coupables et peut-être le chaton disparu.'),
(7, 'L\'Âge de Glace', 94, 'Galen T. Chu', 'Amérique', '6.99', '9v44tabqvoo', '33b0d4c3e922b5092d0720d9c38cc61316a5d78a.jpg', '5.0', 'L’éternelle quête de Scrat pour attraper son insaisissable gland le catapulte dans l’espace, où il déclenche accidentellement une série d’événements cosmiques qui vont transformer et menacer le monde de l’Âge de Glace. Pour survivre, Sid, Manny, Diego et le reste de la bande vont devoir quitter leur foyer et se lancer dans une nouvelle aventure pleine d’humour au cours de laquelle ils vont traverser d’incroyables paysages exotiques et rencontrer des personnages tous plus étonnants les uns que les autres.'),
(8, 'Mike et Dave', 98, 'Jake Szymanski', 'Amérique', '8.29', 'zegp6ACT9qc', '16c666a536ec5ce17607f365d0841d70ffaeb00a.jpg', '4.0', 'Mike et Dave sont deux frères qui ruinent constamment les événements familiaux importants. Lorsque leur soeur est sur le point de se marier, leurs parents obligent les frangins à être accompagnés par des femmes sages et discrètes. L\'inséparable duo publie une annonce qui devient virale et il reçoit de nombreuses propositions de gens qui veulent se faire payer un voyage à Hawaï. C\'est finalement Alice et Tatiana qui remportent la mise, des amies dévergondées portées sur la fête et l\'alcool qui se font passer pour des filles sans histoire. Leurs bonnes intentions sont insuffisantes lorsque quatre adultes irresponsables et incontrôlables enveniment par inadvertance toutes les situations.'),
(9, 'Bad Moms 2', 104, 'Jon Lucas', 'Amérique', '4.99', 'LOaX0VNC4oE', '5deaf86329f545eebc973d4d19e4dff004255b61.jpg', '3.2', 'Comme toutes les mères de famille, Amy, Kiki et Carla angoissent à l’approche de Noël. Entre les cadeaux, la cuisine, la décoration, l’organisation et la préparation, c’est toujours les mêmes qui s’y collent… Et pour compliquer les choses, leurs propres mères, exigeantes et critiques, s’invitent à la fête ! Au bout du rouleau, elles décident de prendre les choses en main et de s’éclater. Cette année l’esprit de noël va sérieusement trinquer…'),
(10, 'Barbershop', 112, 'Malcolm D. Lee', 'Amérique', '5.99', 'uKcq4iNkT74', '841490a5e43314611f67bcb11fe72cd114683142.jpg', '4.2', '10 ans se sont écoulés depuis que Calvin a ouvert son commerce. Son équipe toujours unie et authentique s\'est toutefois agrandie et ce lieu qui était autrefois dominé par la testostérone inclut désormais la gent féminine. Les rires et le bonheur fusent de partout et la boutique va bon train. Malheureusement, bien que tout semble au beau fixe, un nuage noir semble se profiler au coeur de leur quartier menaçant leur entreprise. Calvin et son équipe n\'auront d\'autre choix que de se réunir au grand complet afin de sauver le salon - voir même le quartier qu\'ils aiment tant.'),
(11, 'Ma Vie De Chat', 88, 'Barry Sonnenfeld', 'France', '4.89', 'Y5iLpeCL8Eg', '07d2ae0183aed6cb67ce3b8cd8a123f5cad87cf9.jpg', '4.3', 'Tom Brand est un milliardaire qui a consacré sa vie à son travail et à sa réussite. Sa carrière trépidante l’a éloigné de sa femme Lara et de son adorable fille Rebecca. Pour l’anniversaire de cette dernière, Tom n’a d’autre choix que de lui offrir ce qu’il déteste par-dessus tout : un chat. En route pour la fête de Rebecca, Tom est victime d’un terrible accident et se retrouve mystérieusement coincé dans le corps du chat.  Répondant désormais au doux nom de Monsieur Fuzzypants, il est adopté par sa propre famille qui peine à maîtriser ce chat maladroit et peu obéissant… Tom va devoir tant bien que mal se faire à sa nouvelle condition tout en portant un nouveau regard sur son entourage. Il devra comprendre pourquoi il s’est retrouvé dans cette situation et tout mettre en œuvre pour reconquérir son apparence humaine.'),
(12, 'Ne T\'endors Pas', 97, 'Mike Flanagan', 'Amérique', '3.49', 'uuVKc_0J-oA', '71228a931fa1f6ee5144749a75b09ed3f2e034fe.jpg', '3.6', 'Ne T’endors pas n’est pas tant un film d’horreur qu’un film sur la perte. Jessie et Cody sont deux faces d’une même pièce qui finiront forcément par se comprendre à un moment ou un autre. Le personnage de Kate Bosworth se révèle d’ailleurs aussi ambigu que touchant notamment à travers sa réaction face aux apparitions de son fils décédé. En instrumentalisant Cody, elle joue sur la corde raide et finit par comprendre que pour surpasser l’horreur de sa situation, il lui faudra également accepter son propre passé. Le cinéaste américain transforme peu à peu son atmosphère effrayante en quelque chose de douloureusement poignant. Le cœur de l’histoire ne reposant jamais sur l’élément horrifique mais sur la gestion d’un traumatisme majeur. Ainsi, ce qui aurait pu être une énième production facile tend à se rapprocher d’un fantastique poignant à la Guillermo Del Toro. Qu’est-ce qu’un monstre ? semble s’’interroger Mike Flanagan. Qu’est-ce qu’un monstre dans l’esprit d’un enfant de cet âge ?'),
(13, 'War Dogs', 115, 'Todd Phillips', 'Amérique', '2.99', 'kmXo1Ncy0aM', '614f79bb5cf2e237e2c0fa9d89c19f3c42be20b2.jpg', '2.4', 'Deux copains âgés d\'une vingtaine d\'années vivant à Miami Beach à l\'époque de la guerre en Irak, profitent d\'un dispositif méconnu du gouvernement fédéral, permettant à de petites entreprises de répondre à des appels d\'offres de l\'armée américaine. Si leurs débuts sont modestes, ils ne tardent pas à empocher de grosses sommes d\'argent et à mener la grande vie. Mais les deux amis sont totalement dépassés par les événements lorsqu\'ils décrochent un contrat de 300 millions de dollars destiné à armer les soldats afghans. Car, pour honorer leurs obligations, ils doivent entrer en contact avec des individus très peu recommandables… dont certains font partie du gouvernement américain…'),
(14, 'Morgane', 92, 'Luke Scott', 'Amérique', '4.29', 'qgj9sg65KQ4', 'f8675e82cd2b0dadee31f31bcced6cde0b7e2fef.jpg', '2.5', 'Consultante en gestion du risque, Lee est envoyée dans un lieu isolé et tenu secret pour enquêter sur un événement terrifiant qui s’y est déroulé. On lui présente alors Morgane, à l\'origine de l’accident, une jeune fille apparemment innocente qui porte en elle la promesse du progrès scientifique. À moins qu’elle ne se révèle être au contraire une menace incontrôlable…');

-- --------------------------------------------------------

--
-- Table structure for table `films_achats`
--

DROP TABLE IF EXISTS `films_achats`;
CREATE TABLE `films_achats` (
  `idfach` int(11) NOT NULL,
  `idach` int(11) NOT NULL,
  `idf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `films_achats`
--

INSERT INTO `films_achats` (`idfach`, `idach`, `idf`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 4),
(4, 3, 3),
(5, 4, 6),
(6, 5, 8),
(7, 6, 3),
(8, 7, 6),
(9, 7, 7),
(10, 8, 2),
(11, 9, 2),
(12, 9, 5),
(13, 9, 8),
(14, 10, 7),
(15, 11, 7),
(16, 12, 5),
(17, 12, 7),
(18, 12, 4),
(19, 13, 4),
(20, 14, 2),
(21, 14, 6),
(22, 14, 4),
(23, 15, 8),
(24, 15, 4),
(25, 16, 5),
(26, 16, 2),
(27, 17, 7),
(28, 18, 5),
(29, 19, 5),
(30, 20, 4),
(31, 21, 4),
(32, 22, 8),
(33, 23, 9),
(34, 24, 11),
(35, 25, 2),
(36, 25, 5),
(37, 26, 2),
(38, 27, 6),
(39, 29, 6),
(40, 30, 6),
(41, 31, 8),
(42, 32, 3);

-- --------------------------------------------------------

--
-- Table structure for table `films_genres`
--

DROP TABLE IF EXISTS `films_genres`;
CREATE TABLE `films_genres` (
  `idfgen` int(11) NOT NULL,
  `idf` int(11) NOT NULL,
  `idgen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `films_genres`
--

INSERT INTO `films_genres` (`idfgen`, `idf`, `idgen`) VALUES
(1, 2, 1),
(2, 3, 3),
(3, 4, 3),
(4, 4, 5),
(5, 5, 3),
(6, 6, 3),
(7, 6, 5),
(8, 7, 1),
(9, 8, 3),
(10, 9, 3),
(11, 10, 3),
(12, 11, 3),
(13, 11, 6),
(14, 12, 9),
(15, 12, 16),
(16, 12, 2),
(17, 13, 13),
(18, 13, 3),
(19, 13, 2),
(20, 14, 9),
(21, 14, 16);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE `genres` (
  `idgen` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`idgen`, `nom`) VALUES
(1, 'Animation'),
(2, 'Drame'),
(3, 'Comédie'),
(4, 'Histoire'),
(5, 'Action'),
(6, 'Fantaisie'),
(7, 'Biographie'),
(8, 'Famille'),
(9, 'Horreur'),
(10, 'Crime'),
(11, 'Romance'),
(12, 'Sports'),
(13, 'Guerre'),
(14, 'Adventure'),
(15, 'Documentaire'),
(16, 'Thriller'),
(17, 'Costume'),
(18, 'Musicale'),
(19, 'Psychologique');

-- --------------------------------------------------------

--
-- Stand-in structure for view `meillfilm`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `meillfilm`;
CREATE TABLE `meillfilm` (
`titre` varchar(50)
,`filmlist` bigint(21)
,`somme` decimal(32,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE `membres` (
  `idm` int(11) NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datnais` date DEFAULT NULL,
  `datinsc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`idm`, `prenom`, `nom`, `datnais`, `datinsc`) VALUES
(1, 'Mike', 'Myers', '2000-01-01', '2018-01-01'),
(2, 'Benny', 'Hill', '1965-03-10', '2017-02-11'),
(3, 'Jim', 'Carrey', '1966-05-08', '2016-01-01'),
(4, 'Simon', 'Todd', '1960-06-09', '2017-08-12'),
(5, 'Maksim', 'Kotau', '1981-09-28', '2018-03-03'),
(6, 'x', 'x', '1111-11-11', '2018-03-28'),
(7, '222', '222', '1981-09-28', '2018-03-28'),
(8, '333', '333', '1981-09-28', '2018-03-28'),
(9, '444', '444', '1981-09-28', '2018-03-28'),
(10, '555', '555', '1981-09-28', '2018-03-28'),
(11, '666', '666', '1981-09-28', '2018-03-28'),
(12, '123', '123', '1111-11-11', '2018-03-28'),
(13, '999', '999', '1981-02-08', '2018-03-28'),
(14, 'iii', 'iii', '2005-02-03', '2018-03-28'),
(15, 'www', 'www', '1981-02-05', '2018-03-28'),
(16, 'eee', 'eee', '2015-02-03', '2018-03-28'),
(17, 'eee', 'eee', '2015-02-03', '2018-03-28'),
(18, 'eee', 'eee', '2015-02-03', '2018-03-28'),
(19, 'ghj', 'gfd', '1958-01-02', '2018-03-28'),
(20, 'rrr', 'rrr', '1981-09-28', '2018-03-28'),
(21, 'lll', 'lll', '1854-05-02', '2018-03-28'),
(22, 'zzz', 'zzz', '1956-02-03', '2018-03-28'),
(23, 'kjh', 'kjh', '1986-02-02', '2018-03-28'),
(24, 'ccc', 'ccc', '1999-09-20', '2018-03-28'),
(25, '145', '145', '1999-09-09', '2018-03-28'),
(26, '589', '589', '1985-02-03', '2018-03-28'),
(27, '457', '457', '1999-01-02', '2018-03-28'),
(28, '789', '789', '1981-02-03', '2018-03-28'),
(29, '356', '356', '1999-02-05', '2018-03-28'),
(30, 'cool', 'cool', '1985-02-02', '2018-03-28'),
(31, 'sook', 'bar', '1956-02-02', '2018-03-28'),
(32, 'sook', 'bar', '1956-02-02', '2018-03-28'),
(33, '25698', '25698', '1958-09-02', '2018-03-28'),
(34, '212', '212', '1935-02-03', '2018-03-28'),
(35, 'kot', 'kot', '1965-02-03', '2018-03-28'),
(36, 'QQQ', 'QQQ', '1981-09-28', '2018-03-28'),
(37, 'uuu', 'uuu', '1995-02-03', '2018-03-28'),
(38, 'rrr', 'rrr', '1956-02-05', '2018-03-28'),
(39, 'tyu', 'tyu', '1965-02-05', '2018-03-28'),
(40, 'barbos', '123456', '1856-02-05', '2018-03-28'),
(41, 'e-kotov', 'e-kotov', '1986-02-03', '2018-03-28'),
(42, 'e-kotov1', 'e-kotov1', '1986-02-03', '2018-03-28'),
(43, 'lilu', 'lilu', '1954-02-05', '2018-03-28'),
(44, 'fghds', 'gfh', '1999-01-02', '2018-04-07');

-- --------------------------------------------------------

--
-- Stand-in structure for view `resultsem`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `resultsem`;
CREATE TABLE `resultsem` (
`prenom` varchar(50)
,`nom` varchar(50)
,`somme` decimal(32,2)
,`nombrefilms` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `idm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `idm`) VALUES
(1, 'michael', 'memilien01@yahoo.com', '0f569b4cf5eb2687b6dbde10e19d2421', 1),
(2, 'mihomax', 'mihomax@yahoo.com', '74bbfa7c9c5dc0eb74a3df67b6015c31', 2),
(3, 'william', 'william@yahoo.com', 'fd820a2b4461bddd116c1518bc4b0f77', 3),
(5, 'admin@admin.ca', 'admin@admin.ca', 'b51144511fc2a3042baf068878e04bad', 4),
(7, 'maxkotov', 'maxkotov@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 5),
(8, 'x', 'xxxxxx@tut.by', 'd41d8cd98f00b204e9800998ecf8427e', 6),
(9, '222', '222@tut.by', 'd41d8cd98f00b204e9800998ecf8427e', 7),
(10, '333', '333@tut.by', 'd41d8cd98f00b204e9800998ecf8427e', 8),
(11, '444', '444@tut.by', 'd41d8cd98f00b204e9800998ecf8427e', 9),
(12, '555', '5555@55.55', 'd41d8cd98f00b204e9800998ecf8427e', 10),
(13, '666', '666@tut.by', 'fae0b27c451c728867a567e8c1bb4e53', 11),
(14, '123', '111111@11.dd', 'd41d8cd98f00b204e9800998ecf8427e', 12),
(15, '999', '999@uyt.by', 'd41d8cd98f00b204e9800998ecf8427e', 13),
(16, 'iii', 'iii@tre.mj', 'd41d8cd98f00b204e9800998ecf8427e', 14),
(17, 'www', 'www@fgh.bn', 'd41d8cd98f00b204e9800998ecf8427e', 15),
(18, 'eee', 'eee@ee.rr', 'd2f2297d6e829cd3493aa7de4416a18f', 17),
(19, 'eege', 'eee@ege.rr', 'd2f2297d6e829cd3493aa7de4416a18f', 18),
(20, 'ytt', 'gbf@rte.vk', 'd41d8cd98f00b204e9800998ecf8427e', 19),
(21, 'juk', 'rrr@tyr.by', 'd41d8cd98f00b204e9800998ecf8427e', 20),
(22, 'lll', 'lll@rrs.bh', 'd41d8cd98f00b204e9800998ecf8427e', 21),
(23, 'zzz', 'zzz@ert.bj', 'd41d8cd98f00b204e9800998ecf8427e', 22),
(24, 'kjh', 'kjh@ert.bj', 'd41d8cd98f00b204e9800998ecf8427e', 23),
(25, 'ccc', 'ccc@tut.by', 'd41d8cd98f00b204e9800998ecf8427e', 24),
(26, '145', '145@iuh.lk', 'd41d8cd98f00b204e9800998ecf8427e', 25),
(27, '589', '589@ty.bj', 'd41d8cd98f00b204e9800998ecf8427e', 26),
(28, '457', '457@thd.njg', 'd41d8cd98f00b204e9800998ecf8427e', 27),
(29, '789', '789@yj.bj', 'd41d8cd98f00b204e9800998ecf8427e', 28),
(30, '356', '356@kj.lp', 'd41d8cd98f00b204e9800998ecf8427e', 29),
(31, 'cool', 'cool@jkl.bk', 'd41d8cd98f00b204e9800998ecf8427e', 30),
(32, 'uuu', 'sfgh@hgfks.bj', 'c70fd4260c9eb90bc0ba9d047c068eb8', 37),
(33, 'rrr', 'rrr', '44f437ced647ec3f40fa0841041871cd', 38),
(34, 'tyu', 'tyu', 'af27bab84283536c346b97ced4bc5c58', 39),
(35, 'barbos', 'barbos', 'c193ef999c0aa38e5fb7303e6f641597', 40),
(36, 'e-kotov', 'e-kotov@mail.ru', '54527430b6ee751af21619bb1c16d374', 41),
(37, 'e-kotov1', 'e-kot1ov@mail.ru', 'fe5f422a0fdb758c21e3121b8c063056', 42),
(38, 'lilu', 'lilu@lilu.cvn', 'cd442b615c1e61faecfd1e9a49aaca56', 43),
(39, 'fdhy', 'fgh', '81dc9bdb52d04dc20036dbd8313ed055', 44);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ventes`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `ventes`;
CREATE TABLE `ventes` (
`datach` date
,`nombrefilms` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `meillfilm`
--
DROP TABLE IF EXISTS `meillfilm`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `meillfilm`  AS  select `films`.`titre` AS `titre`,count(`films_achats`.`idf`) AS `filmlist`,sum(`films`.`prix`) AS `somme` from ((`films` join `films_achats`) join `achats`) where ((`achats`.`datach` >= (curdate() - interval (dayofweek(curdate()) + 6) day)) and (`films`.`idf` = `films_achats`.`idf`) and (`films_achats`.`idach` = `achats`.`idach`) and (`achats`.`idach` = `films_achats`.`idach`)) group by `films`.`titre` ;

-- --------------------------------------------------------

--
-- Structure for view `resultsem`
--
DROP TABLE IF EXISTS `resultsem`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `resultsem`  AS  select `membres`.`prenom` AS `prenom`,`membres`.`nom` AS `nom`,sum(`films`.`prix`) AS `somme`,count(`achats`.`idach`) AS `nombrefilms` from (((`membres` join `films`) join `achats`) join `films_achats`) where ((`achats`.`datach` >= (curdate() - interval (dayofweek(curdate()) + 6) day)) and (`membres`.`idm` = `achats`.`idm`) and (`films`.`idf` = `films_achats`.`idf`) and (`achats`.`idach` = `films_achats`.`idach`)) group by `achats`.`idm` ;

-- --------------------------------------------------------

--
-- Structure for view `ventes`
--
DROP TABLE IF EXISTS `ventes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ventes`  AS  select `achats`.`datach` AS `datach`,count(`films_achats`.`idf`) AS `nombrefilms` from (`achats` join `films_achats`) where ((`achats`.`datach` >= (curdate() - interval (dayofweek(curdate()) + 30) day)) and (`achats`.`idach` = `films_achats`.`idach`)) group by `achats`.`datach` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achats`
--
ALTER TABLE `achats`
  ADD PRIMARY KEY (`idach`),
  ADD KEY `achats_idm_FK` (`idm`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`idf`);

--
-- Indexes for table `films_achats`
--
ALTER TABLE `films_achats`
  ADD PRIMARY KEY (`idfach`),
  ADD KEY `films_achats_idach_FK` (`idach`),
  ADD KEY `films_achats_idf_FK` (`idf`);

--
-- Indexes for table `films_genres`
--
ALTER TABLE `films_genres`
  ADD PRIMARY KEY (`idfgen`),
  ADD KEY `films_genres_idf_FK` (`idf`),
  ADD KEY `films_genres_idgen_FK` (`idgen`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`idgen`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`idm`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_idm_FK` (`idm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achats`
--
ALTER TABLE `achats`
  MODIFY `idach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `idf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `films_achats`
--
ALTER TABLE `films_achats`
  MODIFY `idfach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `films_genres`
--
ALTER TABLE `films_genres`
  MODIFY `idfgen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `idgen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_idm_FK` FOREIGN KEY (`idm`) REFERENCES `membres` (`idm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
