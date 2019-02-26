drop table input;

CREATE TABLE IF NOT EXISTS `input` (
  `element_id` int(3) NOT NULL,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `input_file` (
  `element_id` int(3) NOT NULL,
  `mime_allowed` varchar(100) NOT NULL,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`element_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `input_value` (
  `input_value_id` int(3) NOT NULL AUTO_INCREMENT,
  `element_id` int(3) NOT NULL,
  `type` varchar(100) NOT NULL,
  `user_id` int(3) NOT NULL,  
  PRIMARY KEY (`input_value_id`),
  UNIQUE(element_id,user_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `input_text_value` (
  `input_value_id` int(3) NOT NULL,
  `input_value` text,
  PRIMARY KEY (`input_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `input_file_value` (
  `input_value_id` int(3) NOT NULL, 
  `mime` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `file` longblob NOT NULL,
  PRIMARY KEY (`input_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;