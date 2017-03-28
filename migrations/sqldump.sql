DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `authors` VALUES (1,'Maksim');
INSERT INTO `authors` VALUES (2,'Dima');
INSERT INTO `authors` VALUES (3,'Vasia');
INSERT INTO `authors` VALUES (4,'Kolia');


DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `books` VALUES (2,'Alice in wonderland');
INSERT INTO `books` VALUES (3,'my work');
INSERT INTO `books` VALUES (1,'Red november');


DROP TABLE IF EXISTS `books_authors`;
CREATE TABLE `books_authors` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`,`author_id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `books_authors_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `books_authors_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `books_authors` VALUES (2,1);
INSERT INTO `books_authors` VALUES (2,2);
INSERT INTO `books_authors` VALUES (2,3);
INSERT INTO `books_authors` VALUES (3,4);