CREATE DATABASE blog /*!40100 DEFAULT CHARACTER SET latin1 */;
use blog;

CREATE TABLE `article` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `ShortName` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `ShortName_UNIQUE` (`ShortName`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
