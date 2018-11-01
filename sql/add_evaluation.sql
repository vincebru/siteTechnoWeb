
CREATE TABLE IF NOT EXISTS `evaluation` (
	`evaluation_id` int(3) NOT NULL AUTO_INCREMENT,
	`session_group_id` int(3) NOT NULL,
	`name` varchar(100) NOT NULL,
	`type` varchar(100) NOT NULL,
	`min_value` int(9) DEFAULT 0,
	`max_value` int(9) NOT NULL,
	`coef` int(9) DEFAULT NULL,
  PRIMARY KEY (`evaluation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `evaluation` (`evaluation_id`, `session_group_id`, `name`, `type`, `min_value`, `max_value`, `coef`) 
VALUES (1, '1', 'Individual', 'User', '-2', '2', NULL), (2, '1', 'Step 1', 'Group', '0', '3', NULL),
 (3, '1', 'Step 2', 'Group', '0', '3', NULL), (4, '1', 'Step 3', 'Group', '0', '3', NULL),
 (5, '1', 'Step 4', 'Group', '0', '3', NULL), (6, '1', 'Final step', 'Group', '0', '8', NULL),
 (7, '1', 'Project', 'User', '0', '3', 1),(8, '1', 'Exam', 'User', '0', '3', 1),
 (9, '1', 'Global', 'User', '0', '3', 1);

CREATE TABLE IF NOT EXISTS `evaluation_link` (	
	`type` varchar(100) NOT NULL,
	`parent_id` int(3) NOT NULL,
	`child_id` int(3) NOT NULL,
  PRIMARY KEY (`parent_id`,`child_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

INSERT INTO `evaluation_link` (`type`, `parent_id`, `child_id`) VALUES 
 ('Average', '9', '7'), ('Average', '9', '8'),
 ('Bonus', '7', '1'), ('Addition', '7', '2'),
 ('Addition', '7', '3'), ('Addition', '7', '4'),
 ('Addition', '7', '5'), ('Addition', '7', '6');

CREATE TABLE IF NOT EXISTS `result` (
	`result_id` int(3) NOT NULL AUTO_INCREMENT,
	`group_id` int(3) NULL,
	`user_id` int(3) NULL,
	`evaluation_id` int(3) NOT NULL,
	`comment` varchar(255) NOT NULL,
	`value` int(9) DEFAULT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


ALTER TABLE `result` ADD UNIQUE `unique_result` (`group_id`, `user_id`, `evaluation_id`);