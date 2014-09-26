<?php
require "../config/config.php";
require "../main/database.php";

$db = Database::getConnection();

//Дамп структуры для таблица test.users
    $query = "CREATE TABLE IF NOT EXISTS `users` (
    `id` mediumint(9) NOT NULL AUTO_INCREMENT,
      `name` varchar(45) NOT NULL,
      `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`),
      UNIQUE KEY `name` (`name`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

//Дамп структуры для таблица themes
$query .= "CREATE TABLE IF NOT EXISTS `themes` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `user_id` mediumint(8) NOT NULL,
      `title` varchar(255) NOT NULL,
      `content` mediumtext NOT NULL,
      `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `comments_num` smallint(6) NOT NULL,
      PRIMARY KEY (`id`),
      KEY `FK_themes_users` (`user_id`),
      KEY `created_at` (`created_at`),
      CONSTRAINT `FK_themes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

//Дамп структуры для таблица comments
$query .= 'CREATE TABLE IF NOT EXISTS `comments` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `theme_id` int(10) unsigned DEFAULT NULL,
      `comment` text,
      `user_id` mediumint(9) DEFAULT NULL,
      `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`),
      KEY `FK_comments_themes` (`theme_id`),
      KEY `FK_comments_users` (`user_id`),
      KEY `created_at` (`created_at`),
      CONSTRAINT `FK_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
      CONSTRAINT `FK_comments_themes` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;';

$stmt = $db->query($query);

var_dump($stmt);










