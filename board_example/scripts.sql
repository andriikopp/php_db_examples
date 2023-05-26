DROP DATABASE IF EXISTS board_example;
CREATE DATABASE board_example;

USE board_example;

CREATE TABLE post (
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50) NOT NULL,
	avatar_url TEXT,
	message TEXT NOT NULL,
	image_url TEXT,
	when_posted TIMESTAMP NOT NULL
);

CREATE TABLE moder (
	login VARCHAR(50) PRIMARY KEY,
	pass VARCHAR(64) NOT NULL
);

INSERT INTO moder (login, pass)
VALUES ('admin1', 'e00cf25ad42683b3df678c61f42c6bda'), ('admin2', 'c84258e9c39059a89ab77d846ddab909');
