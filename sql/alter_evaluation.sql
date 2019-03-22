ALTER TABLE `session_group` ADD `evaluation_id` INT(3) NOT NULL AFTER `name`;

update session_group sg join evaluation e on sg.session_group_id=e.session_group_id 
 set sg.evaluation_id=e.evaluation_id where e.name='Global';


ALTER TABLE `evaluation` DROP `session_group_id`; 

alter table evaluation ADD `parent_id` INT(3) DEFAULT NULL;

update evaluation e join evaluation_link el on e.evaluation_id=el.child_id
set e.parent_id=el.parent_id;

drop table evaluation_link;

ALTER TABLE `evaluation` ADD `active` INT(1) NOT NULL DEFAULT '0' AFTER `parent_id`;