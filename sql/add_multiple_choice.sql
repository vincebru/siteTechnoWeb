-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 27 Novembre 2018 à 00:10
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `technoweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `multiple_choice`
--

CREATE TABLE IF NOT EXISTS `multiple_choice` (
`element_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `multiple_choice`
--

INSERT INTO `multiple_choice` (`element_id`, `name`, `lesson_id`, `created`) VALUES
(1, 'Test', 30, '2018-11-23 23:07:40'),
(2, 'Test 2', 30, '2018-11-24 00:02:26');

-- --------------------------------------------------------

--
-- Structure de la table `multiple_choice_answers`
--

CREATE TABLE IF NOT EXISTS `multiple_choice_answers` (
`element_id` int(11) NOT NULL,
  `multiple_choice_questions_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `result` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `multiple_choice_answers`
--

INSERT INTO `multiple_choice_answers` (`element_id`, `multiple_choice_questions_id`, `answer`, `result`) VALUES
(1, 1, 'In the kitchen', 1),
(2, 1, 'In the bathroom', 0),
(3, 1, 'In this classroom', 0),
(4, 2, 'White', 0),
(5, 2, 'Bloody red', 1),
(6, 2, 'Black as the night', 1),
(7, 2, 'All the colors from the rainbow!', 0),
(8, 3, 'It''s raining man, hallelujah!', 0),
(9, 3, 'I don''t have any windows...', 0),
(10, 3, 'It''s 60°C outside, the global warming is killing us!', 1),
(11, 4, 'Yes', 1),
(12, 4, 'No', 0);

-- --------------------------------------------------------

--
-- Structure de la table `multiple_choice_questions`
--

CREATE TABLE IF NOT EXISTS `multiple_choice_questions` (
`element_id` int(11) NOT NULL,
  `multiple_choice_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `multiple_choice_questions`
--

INSERT INTO `multiple_choice_questions` (`element_id`, `multiple_choice_id`, `question`) VALUES
(1, 1, 'Where is Brian?'),
(2, 1, 'What is the color of the unicorn?'),
(3, 1, 'Is the weather good today?'),
(4, 1, 'Do you like your web teacher?');

-- --------------------------------------------------------

--
-- Structure de la table `multiple_choice_users`
--

CREATE TABLE IF NOT EXISTS `multiple_choice_users` (
`element_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `multiple_choice_users`
--

INSERT INTO `multiple_choice_users` (`element_id`, `user_id`, `answer_id`) VALUES
(1, 2, 1),
(2, 2, 4),
(3, 2, 8),
(4, 2, 11),
(5, 1, 1),
(6, 1, 5),
(7, 1, 6),
(8, 1, 10),
(9, 1, 11);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `multiple_choice`
--
ALTER TABLE `multiple_choice`
 ADD PRIMARY KEY (`element_id`), ADD KEY `lesson_id` (`lesson_id`);

--
-- Index pour la table `multiple_choice_answers`
--
ALTER TABLE `multiple_choice_answers`
 ADD PRIMARY KEY (`element_id`), ADD KEY `multiple_choice_questions_id` (`multiple_choice_questions_id`);

--
-- Index pour la table `multiple_choice_questions`
--
ALTER TABLE `multiple_choice_questions`
 ADD PRIMARY KEY (`element_id`), ADD KEY `multiple_choice_id` (`multiple_choice_id`);

--
-- Index pour la table `multiple_choice_users`
--
ALTER TABLE `multiple_choice_users`
 ADD PRIMARY KEY (`element_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `multiple_choice`
--
ALTER TABLE `multiple_choice`
MODIFY `element_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `multiple_choice_answers`
--
ALTER TABLE `multiple_choice_answers`
MODIFY `element_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `multiple_choice_questions`
--
ALTER TABLE `multiple_choice_questions`
MODIFY `element_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `multiple_choice_users`
--
ALTER TABLE `multiple_choice_users`
MODIFY `element_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
