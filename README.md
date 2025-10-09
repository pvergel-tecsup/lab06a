# lab06-crud

CRUD completo para una base de datos sencilla de peliculas y categorias.

***Script de base de datos:***
´´´
DROP DATABASE IF EXISTS movies_db;

CREATE DATABASE movies_db;

USE movies_db;

DROP TABLE IF EXISTS `movies`;

DROP TABLE IF EXISTS `genres`;

CREATE TABLE `genres` (
	`genre_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	`created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `movies` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
	`rating` int(4) unsigned NOT NULL,
	`awards` int(10) unsigned NOT NULL DEFAULT (0),
	`release_year` int(4) NOT NULL,
	`length` int(10) unsigned DEFAULT NULL,
	`genre_id` int(10) unsigned NOT NULL,
	`created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	KEY `movies_genre_id_key` (`genre_id`),
	CONSTRAINT `movies_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres`(`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert into `genres`(`name`) values
('Drama'), ('Comedia'), ('Aventura'), ('Infantil'), ('Ciencia Ficción');

insert into `movies`(`title`, `rating`, `awards`, `release_year`, `length`, `genre_id`) values
('Avengers: Infinity War', 4, 3, 2018, 149, 3),
('Avengers: Endgame', 3, 3, 2019, 181, 3),
('Goodfellas', 4, 7, 1990, 146, 1);
