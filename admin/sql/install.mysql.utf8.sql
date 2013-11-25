--  DROP TABLE IF EXISTS `#__critere`;

CREATE TABLE IF NOT EXISTS `#__critere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

--  DROP TABLE IF EXISTS `#__question`;

CREATE TABLE IF NOT EXISTS `#__question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `id_critere` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;



-- DROP TABLE IF EXISTS `#__reponse`;

CREATE TABLE IF NOT EXISTS `#__reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `valeur` smallint(6) NOT NULL,
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `#__quiz_name`;

CREATE TABLE IF NOT EXISTS `#__quiz_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `#__quiz_result`;

CREATE TABLE IF NOT EXISTS `#__quiz_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `result` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

