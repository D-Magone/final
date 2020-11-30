Final project

Functioning To do list with Signup and Login



SQL database creation:

CREATE DATABASE final_project;

CREATE TABLE `user` (
  user_id int(20) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  password char(60) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
)

CREATE TABLE `list` (
  list_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  description varchar(150) NOT NULL,
  done tinyint(1) unsigned NOT NULL DEFAULT '0',
  user_id int(20) unsigned NOT NULL,
  PRIMARY KEY (`list_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
)