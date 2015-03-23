CREATE DATABASE phonebook COLLATE utf8_general_ci;
USE phonebook;
CREATE TABLE contacts (
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name CHAR(30) NOT NULL COLLATE utf8_general_ci,
	number CHAR(8) NOT NULL COLLATE utf8_general_ci
);