CREATE DATABASE IF NOT EXISTS oophp;
USE oophp;

SET NAMES utf8;

DROP TABLE IF EXISTS `users`;
create table `users`
(
  `name` VARCHAR(256) primary key not null,
  `pass` varchar(256) not null
) engine InnoDB character set utf8 collate utf8_swedish_ci;
