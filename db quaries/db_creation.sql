
DROP DATABASE IF EXISTS php_support_system;

CREATE DATABASE php_support_system;

GRANT ALL PRIVILEGES ON php_support_system.* TO 'supportUser'@'localhost' IDENTIFIED BY 'kfs2015';

USE php_support_system;

CREATE TABLE IF NOT EXISTS users(
	id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	phone VARCHAR(15),
	image_path VARCHAR(60),
	password VARCHAR(60),
	userType VARCHAR(15) NOT NULL,
	PRIMARY KEY (id),
    UNIQUE (email)
);

CREATE TABLE IF NOT EXISTS tasks(
	id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	taskType VARCHAR(15) NOT NULL,
	userId VARCHAR(50) NOT NULL,
	subject	VARCHAR(160) NOT NULL,
	content VARCHAR(255) NOT NULL,
	creationDate DATETIME default NOW() NOT NULL,
	status VARCHAR(15) default "new" NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS messages(
	id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	taskId INT NOT NULL,
	userId VARCHAR(50) NOT NULL,
	messageContent VARCHAR(255) NOT NULL,
	creationDate DATETIME default NOW() NOT NULL,
	PRIMARY KEY (id)
);

	
	
INSERT INTO users(id, name, email, phone, image_path, password, userType) 
VALUES
	(1, 'Daniel Cohen', 'cohen@gmail.com','054-4545454','','$2y$10$5LSQimftI.jUM20cyvYav.k6SI.rV8yT55ZLeMY0dHr7qQQ0tO0Ni', 'worker'), 
	(2, 'Jonathan Levi', 'levi@gmail.com','054-4545454','','$2y$10$5LSQimftI.jUM20cyvYav.k6SI.rV8yT55ZLeMY0dHr7qQQ0tO0Ni', 'customer');

	
INSERT INTO tasks(taskType, userId, subject, content, creationDate, status) 
VALUES 
	('Support', 2, 'My sweetheart phone is frozen', 'The screen of my sweetheart phone is frozen. What can I do now? Please Help Me :-(', now(), 'inprocess'),
	('Support', 2, 'My sweetheart tablet is frozen', 'The screen of my sweetheart tablet is frozen. What can I do now? Please Help Me :-(', now(), 'new'),
	('Support', 2, 'My sweetheart PC is frozen', 'The screen of my sweetheart PC is frozen. What can I do now? Please Help Me :-(', now(), 'closed');
	
	

INSERT INTO messages (taskId , userId , messageContent) VALUES (1, 2, "need help asap!!"), (1, 1, "Try restart your machine");

