-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 13 sep. 2018 à 21:43
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sitetechnoweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(3) NOT NULL,
  `session_group_id` int(3) DEFAULT NULL,
  `work_group_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `login`, `firstname`, `lastname`, `email`, `password`, `role_id`, `session_group_id`, `work_group_id`) VALUES
(3, 'vincent.bruneel', 'vincent', 'bruneel', 'vincentbruneel@yahoo.fr', '16c8404de748b46233cf4a828721dde6', 1, NULL, NULL),
(5, 'douglas.six', 'douglas', 'six', 'douglas.six@test.com', '703ce81c4b196feeae8b1f0183caf644', 1, 1, NULL),
(6, 'Maxime.FONTAINE', 'Maxime', 'FONTAINE', 'maxime.fontaine@isen-lille.fr', '29fa6fea3fb6a0b220cafa56634e860c', 2, 1, NULL),
(7, 'Louis.MASSARD-KABINDA-MAKAGA', 'Louis', 'MASSARD-KABINDA-MAKAGA', 'louis.massard-kabinda-makaga@isen.yncrea.fr', '67524210524b62ad06b8fc7c6dc7135e', 2, 1, NULL),
(8, 'Rafael.RACELA', 'Rafael', 'RACELA', 'rafael.racela@isen.yncrea.fr', '2f5ebb0642cfa2a25af21fac655b30eb', 2, 1, NULL),
(9, 'Pierre.PATARD', 'Pierre', 'PATARD', 'pierre.patard@isen-lille.fr', '311ba248903382fd1eee8670472d3f39', 2, 1, NULL),
(10, 'Paul.GILLE', 'Paul', 'GILLE', 'paul.gille@isen-lille.fr', 'c13e13da2073260c2194c15d782e86a9', 2, 1, NULL),
(11, 'Maxime.PEZERIL', 'Maxime', 'PEZERIL', 'maxime.pezeril@isen.yncrea.fr', '29fa6fea3fb6a0b220cafa56634e860c', 2, 1, NULL),
(12, 'Amine.EL KHIATI', 'Amine', 'EL KHIATI', 'amine.el_khiati@isen.yncrea.fr', '19fef74914851915b641a3220447b195', 2, 1, NULL),
(13, 'Sylvain.LOUVET', 'Sylvain', 'LOUVET', 'sylvain.louvet@isen.yncrea.fr', '2bf7f1f121530003d2fcea206e803f48', 2, 1, NULL),
(14, 'Benjamin.BEUSCART', 'Benjamin', 'BEUSCART', 'benjamin.beuscart@isen-lille.fr', '861a744bccc0da5432f097d5838e4b83', 2, 1, NULL),
(15, 'Haoran.ZHU', 'Haoran', 'ZHU', 'haoran.zhu@isen.yncrea.fr', '1829edca21f710643a769bdf0802f7bc', 2, 1, NULL),
(16, 'Hedi.ZEKRI', 'Hedi', 'ZEKRI', 'hedi.zekri@isen-lille.fr', '9734ad65084ce9e4a5213a22ef84db46', 2, 1, NULL),
(17, 'Charles.GOUDAERT', 'Charles', 'GOUDAERT', 'charles.goudaert@isen-lille.fr', '399423ff652ebb6a6701be7ec3202fc6', 2, 1, NULL),
(18, 'Pierrick.MERLUZZI', 'Pierrick', 'MERLUZZI', 'pierrick.merluzzi@isen.yncrea.fr', '42e7dd43e1954ff82cdd549d015882eb', 2, 1, NULL),
(19, 'Jules.GUIOT', 'Jules', 'GUIOT', 'jules.guiot@isen-lille.fr', '707189d7606ab4c4c8432fd64c5985f7', 2, 1, NULL),
(20, 'Mathieu.GABRIEL', 'Mathieu', 'GABRIEL', 'mathieu.gabriel@isen.yncrea.fr', '206299fa740a4327a61b67b6be5c8373', 2, 1, NULL),
(21, 'Noemie.BOILLOT', 'Noemie', 'BOILLOT', 'noemie.boillot@isen.yncrea.fr', 'ae847d8c75edc95efa5833f020041611', 2, 1, NULL),
(22, 'Junior.TAGNE', 'Junior', 'TAGNE', 'junior.tagne@isen.yncrea.fr', '4547f8865b529680d4a06e00c18eca00', 2, 1, NULL),
(23, 'Maxime.FATOUX', 'Maxime', 'FATOUX', 'maxime.fatoux@isen.yncrea.fr', '29fa6fea3fb6a0b220cafa56634e860c', 2, 1, NULL),
(24, 'Story.DEWEESE', 'Story', 'DEWEESE', 'story.deweese@isen.yncrea.fr', 'dfba89a600b608b2b724efe1f06f599a', 2, 1, NULL),
(25, 'Alexandre.CANTON', 'Alexandre', 'CANTON', 'alexandre.canton@isen.yncrea.fr', '06a05b13819f4afad991cc2143732b66', 2, 1, NULL),
(26, 'Justin.DUBAN', 'Justin', 'DUBAN', 'justin.duban@isen-lille.fr', '06475174d922e7dcbb3ed34c0236dbdf', 2, 1, NULL),
(27, 'Jean-Alexis.HERMEL', 'Jean-Alexis', 'HERMEL', 'jean-alexis.hermel@isen-lille.fr', '7160ff2df1c54fafaece72c22582c235', 2, 1, NULL),
(28, 'Philemon.ROUBAUD', 'Philemon', 'ROUBAUD', 'philemon.roubaud@isen-lille.fr', '06f9e4db9076632e0c7294d6fda8ff1b', 2, 1, NULL),
(29, 'Leo.DEDEINE', 'Leo', 'DEDEINE', 'leo.dedeine@isen-lille.fr', '550eadb88a230018bf043d1b6ad15863', 2, 1, NULL),
(30, 'Baptiste.DELPIERRE', 'Baptiste', 'DELPIERRE', 'baptiste.delpierre@isen-lille.fr', '04ce34a463c52d41c4d0c04c9afd0abe', 2, 1, NULL),
(31, 'Wanqi.ZHENG', 'Wanqi', 'ZHENG', 'wanqi.zheng@isen.yncrea.fr', '88b036406e018d27303248a9ad9d282d', 2, 1, NULL),
(32, 'Alexis.HEMERY', 'Alexis', 'HEMERY', 'alexis.hemery@isen-lille.fr', '79162b02a4adef009a7d8214aaaafec5', 2, 1, NULL),
(33, 'Mathilde.CHRISTIAENS', 'Mathilde', 'CHRISTIAENS', 'mathilde.christiaens@isen-lille.fr', '2226544ec104d654102a154fb4c2de52', 2, 1, NULL),
(34, 'Xin.WANG', 'Xin', 'WANG', 'xin.wang@isen.yncrea.fr', 'b0932095fbb68ab281f153ffd31e5238', 2, 1, NULL),
(35, 'Rodolphe.FOURDINIER', 'Rodolphe', 'FOURDINIER', 'rodolphe.fourdinier@isen-lille.fr', 'aedc82c9ac3d014c33b6b8ebc4052239', 2, 1, NULL),
(36, 'Martin.BOURDEAU', 'Martin', 'BOURDEAU', 'martin.bourdeau@isen.yncrea.fr', '81d6f316d169150d0e8733866c38684d', 2, 1, NULL),
(37, 'Benjamin.LEGRAND', 'Benjamin', 'LEGRAND', 'benjamin.legrand@isen-lille.fr', '861a744bccc0da5432f097d5838e4b83', 2, 1, NULL),
(38, 'Jamie.SUAREZ', 'Jamie', 'SUAREZ', 'jamie.suarez@isen.yncrea.fr', '4402b3bae27683fee56b202bfd23bab3', 2, 1, NULL),
(39, 'Morgane.NADEAU', 'Morgane', 'NADEAU', 'morgane.nadeau@isen.yncrea.fr', '34b65bdeb974c4f2f0d5880dd54ad98a', 2, 1, NULL),
(40, 'Gatien.BARBE', 'Gatien', 'BARBE', 'gatien.barbe@isen-lille.fr', '81ee7d68d04a46c05d09358708ce6f6b', 2, 1, NULL),
(41, 'Robin.GHYS', 'Robin', 'GHYS', 'robin.ghys@isen-lille.fr', '22d5d814d801d8b3e1a1c3fc36796de9', 2, 1, NULL),
(42, 'Louis.THIERY', 'Louis', 'THIERY', 'louis.thiery@isen-lille.fr', '67524210524b62ad06b8fc7c6dc7135e', 2, 1, NULL),
(43, 'Roucouz.EL MURR', 'Roucouz', 'EL MURR', 'roucouz.el_murr@isen.yncrea.fr', '151505ac880f56430dd4cb2986052b9f', 2, 1, NULL),
(44, 'Javier.SARMIENTO', 'Javier', 'SARMIENTO', 'javier.sarmiento@isen.yncrea.fr', 'ab02fceb9689114b1cd1844e456c0695', 2, 1, NULL),
(45, 'Louis.HOCHART', 'Louis', 'HOCHART', 'louis.hochart@isen.yncrea.fr', '67524210524b62ad06b8fc7c6dc7135e', 2, 1, NULL),
(46, 'Thibault.THOUVENIN', 'Thibault', 'THOUVENIN', 'thibault.thouvenin@isen-lille.fr', '6d980dab928b09cd7216ba9a73529e59', 2, 1, NULL),
(47, 'Hao.ZHU', 'Hao', 'ZHU', 'hao.zhu@isen.yncrea.fr', '62501ebb94a5749ec1186e724a54a624', 2, 1, NULL),
(48, 'Clement.VILLALBA', 'Clement', 'VILLALBA', 'clement.villalba@isen-lille.fr', 'd45335431c7e97ff6777bc860a996aa3', 2, 1, NULL),
(49, 'Clement.DUMSER', 'Clement', 'DUMSER', 'clement.dumser@isen-lille.fr', 'd45335431c7e97ff6777bc860a996aa3', 2, 1, NULL),
(50, 'Vincent.VARLET', 'Vincent', 'VARLET', 'vincent.varlet@isen-lille.fr', 'd3facf360f0b4f2d570c093e7e130210', 2, 1, NULL),
(51, 'Germain.PARESYS', 'Germain', 'PARESYS', 'germain.paresys@isen-lille.fr', '043e389b7db561a1a7a7ee41a14a8d71', 2, 1, NULL),
(52, 'Gregoire.GAONACH', 'Gregoire', 'GAONACH', 'gregoire.gaonach@isen.yncrea.fr', '9878ee6f0c1e2345eacc69ec54a99ec6', 2, 1, NULL),
(53, 'Clara.BOMY', 'Clara', 'BOMY', 'clara.bomy@isen.yncrea.fr', '0afca49306b28c1650a1d4130a6a0ce1', 2, 1, NULL),
(54, 'Clement.NOUGE', 'Clement', 'NOUGE', 'clement.nouge@isen.yncrea.fr', 'd45335431c7e97ff6777bc860a996aa3', 2, 1, NULL),
(55, 'Brice-Nicodem.SIMEU-POUOMEGNE', 'Brice-Nicodem', 'SIMEU-POUOMEGNE', 'brice_nicodem.simeu_pouomegne@isen.yncrea.fr', '157d429d9a3535b911116ca05ff89890', 2, 1, NULL),
(56, 'Vincent.MOREL', 'Vincent', 'MOREL', 'vincent.morel@isen.yncrea.fr', 'd3facf360f0b4f2d570c093e7e130210', 2, 1, NULL),
(57, 'Antoine.FLEURY', 'Antoine', 'FLEURY', 'antoine.fleury@isen-lille.fr', 'ea71829d9d7a2be76b5c583749a81a9d', 2, 1, NULL),
(58, 'Samuel.LEFEBVRE', 'Samuel', 'LEFEBVRE', 'samuel.lefebvre@isen-lille.fr', '3e6f7568aac84d6a7dfe1b3641698697', 2, 1, NULL),
(59, 'Hubert.MILLIOTTE', 'Hubert', 'MILLIOTTE', 'hubert.milliotte@isen-lille.fr', '8f29971e57bcead61420c7da8eff93de', 2, 1, NULL),
(60, 'Thibaut.MOUTON', 'Thibaut', 'MOUTON', 'thibaut.mouton@isen-lille.fr', 'c2898b56f5e6cd080da4655e10e35feb', 2, 1, NULL),
(61, 'Loic.TANG', 'Loic', 'TANG', 'loic.tang@isen-lille.fr', '8f29d46f8d31021b2f56763e8346db25', 2, 1, NULL),
(62, 'Victoria.MATIAS', 'Victoria', 'MATIAS', 'victoria.matias@isen.yncrea.fr', 'dfee9e39474b6e292d66c7facba668e1', 2, 1, NULL),
(63, 'Carlos.LAGARDE', 'Carlos', 'LAGARDE', 'carlos.lagarde@isen.yncrea.fr', '8fe918632d847e8ea3ebffbd47bd8ca9', 2, 1, NULL),
(64, 'Corentin.JAROSSET', 'Corentin', 'JAROSSET', 'corentin.jarosset@isen-lille.fr', 'b3e35be7522c9afb0046332492b34833', 2, 1, NULL),
(65, 'Mingxue.GENG', 'Mingxue', 'GENG', 'mingxue.geng@isen.yncrea.fr', 'e8a060a485531ec70660a3e8958fd4b1', 2, 1, NULL),
(66, 'Quentin.CONSIGNY', 'Quentin', 'CONSIGNY', 'quentin.consigny@isen.yncrea.fr', 'e232baabf13fa4b5812c837c7cfb9026', 2, 1, NULL),
(67, 'Axel.ZERBIN', 'Axel', 'ZERBIN', 'axel.zerbin@isen-lille.fr', 'faa1dc0b73eb3c5a704f554318e93cfa', 2, 1, NULL),
(68, 'Alexandre.ALHINC', 'Alexandre', 'ALHINC', 'alexandre.alhinc@isen-lille.fr', '06a05b13819f4afad991cc2143732b66', 2, 1, NULL),
(69, 'Gauthier.VROYLANDT', 'Gauthier', 'VROYLANDT', 'gauthier.vroylandt@isen-lille.fr', 'd95f78c56cc2472ec8468b1005b2fe6f', 2, 1, NULL),
(70, 'Clement.BEGHIN', 'Clement', 'BEGHIN', 'clement.beghin@isen-lille.fr', 'd45335431c7e97ff6777bc860a996aa3', 2, 1, NULL),
(71, 'Yassine.HAOUAM', 'Yassine', 'HAOUAM', 'yassine.haouam@isen-lille.fr', 'ba6ccead5bb88552e5934864ceb95004', 2, 1, NULL),
(72, 'Giovanni.HADDADI', 'Giovanni', 'HADDADI', 'giovanni.haddadi@isen-lille.fr', '8f8439bd01556aace5fd2b93ea927958', 2, 1, NULL),
(73, 'Maxance.MALLET', 'Maxance', 'MALLET', 'maxance.mallet@isen.yncrea.fr', 'c634000b42f1cbf29e6ca6500509cb83', 2, 1, NULL),
(74, 'Mozart.MOUDIO A ZOM', 'Mozart', 'MOUDIO A ZOM', 'mozart.moudio_a_zom@isen.yncrea.fr', '67a9cdbfbef7e9dceeebf813a96e6a19', 2, 1, NULL),
(75, 'Theo.DELOOSE', 'Theo', 'DELOOSE', 'theo.deloose@isen.yncrea.fr', '648c4b84114609edf619be0de4e27fad', 2, 1, NULL),
(76, 'Vincent.DUMONT', 'Vincent', 'DUMONT', 'vincent.dumont@isen-lille.fr', 'd3facf360f0b4f2d570c093e7e130210', 2, 1, NULL),
(77, 'Yu.CAO', 'Yu', 'CAO', 'yu.cao@isen.yncrea.fr', '0af2884fd29ac4bed46fc56851d95768', 2, 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
