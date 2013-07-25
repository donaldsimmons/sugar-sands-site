# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: ssbw
# Generation Time: 2013-05-29 21:40:11 -0500
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminOption` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`adminId`, `adminOption`)
VALUES
	(1,'True'),
	(2,'False');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bookedWeddings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookedWeddings`;

CREATE TABLE `bookedWeddings` (
  `weddingId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `packageId` int(11) NOT NULL,
  `primaryColor` int(3) NOT NULL,
  `secondaryColor` int(3) NOT NULL,
  `numberChairs` int(3) NOT NULL,
  `numberGuests` int(3) NOT NULL,
  `floralArrangement` int(3) NOT NULL,
  `musicPackage` int(3) NOT NULL,
  `photoPackage` int(3) NOT NULL,
  `weddingNotes` text,
  PRIMARY KEY (`weddingId`),
  KEY `primaryColor` (`primaryColor`),
  KEY `floralArrangement` (`floralArrangement`),
  KEY `musicPackage` (`musicPackage`),
  KEY `photoPackage` (`photoPackage`),
  KEY `packageId` (`packageId`),
  KEY `secondaryColor` (`secondaryColor`),
  KEY `userId` (`userId`),
  CONSTRAINT `bookedWeddings_ibfk_8` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  CONSTRAINT `bookedWeddings_ibfk_1` FOREIGN KEY (`primaryColor`) REFERENCES `primaryColors` (`colorId`),
  CONSTRAINT `bookedWeddings_ibfk_3` FOREIGN KEY (`floralArrangement`) REFERENCES `floralOptions` (`floralOptionId`),
  CONSTRAINT `bookedWeddings_ibfk_4` FOREIGN KEY (`musicPackage`) REFERENCES `musicPackages` (`musicPackageId`),
  CONSTRAINT `bookedWeddings_ibfk_5` FOREIGN KEY (`photoPackage`) REFERENCES `photoPackages` (`photoPackageId`),
  CONSTRAINT `bookedWeddings_ibfk_6` FOREIGN KEY (`packageId`) REFERENCES `packages` (`packageId`),
  CONSTRAINT `bookedWeddings_ibfk_7` FOREIGN KEY (`secondaryColor`) REFERENCES `secondaryColors` (`colorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `bookedWeddings` WRITE;
/*!40000 ALTER TABLE `bookedWeddings` DISABLE KEYS */;

INSERT INTO `bookedWeddings` (`weddingId`, `userId`, `packageId`, `primaryColor`, `secondaryColor`, `numberChairs`, `numberGuests`, `floralArrangement`, `musicPackage`, `photoPackage`, `weddingNotes`)
VALUES
	(1,2,1,12,1,10,15,1,1,1,NULL),
	(2,3,2,2,5,20,30,3,4,2,NULL),
	(3,4,2,4,2,30,30,1,3,2,NULL),
	(4,5,4,3,7,25,40,1,5,4,NULL),
	(5,6,3,7,8,15,20,4,4,3,NULL),
	(6,7,2,9,5,20,20,1,2,2,NULL);

/*!40000 ALTER TABLE `bookedWeddings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dealOfMonth
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dealOfMonth`;

CREATE TABLE `dealOfMonth` (
  `domOptionId` int(1) NOT NULL AUTO_INCREMENT,
  `domOption` varchar(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`domOptionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `dealOfMonth` WRITE;
/*!40000 ALTER TABLE `dealOfMonth` DISABLE KEYS */;

INSERT INTO `dealOfMonth` (`domOptionId`, `domOption`)
VALUES
	(1,'True'),
	(2,'False');

/*!40000 ALTER TABLE `dealOfMonth` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table deals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `deals`;

CREATE TABLE `deals` (
  `packageId` int(11) NOT NULL AUTO_INCREMENT,
  `packageName` varchar(30) NOT NULL,
  `numberChairs` int(3) NOT NULL,
  `numberGuests` int(3) NOT NULL,
  `floralArrangement` int(2) NOT NULL,
  `musicPackage` int(2) NOT NULL,
  `photoPackage` int(3) NOT NULL,
  `discount` int(2) NOT NULL,
  `dealOfMonth` int(2) NOT NULL,
  `packageDescription` text,
  PRIMARY KEY (`packageId`),
  KEY `photoPackage` (`photoPackage`),
  KEY `musicPackage` (`musicPackage`),
  KEY `floralArrangement` (`floralArrangement`),
  KEY `dealOfMonth` (`dealOfMonth`),
  CONSTRAINT `deals_ibfk_1` FOREIGN KEY (`photoPackage`) REFERENCES `photoPackages` (`photoPackageId`),
  CONSTRAINT `deals_ibfk_2` FOREIGN KEY (`musicPackage`) REFERENCES `musicPackages` (`musicPackageId`),
  CONSTRAINT `deals_ibfk_3` FOREIGN KEY (`floralArrangement`) REFERENCES `floralOptions` (`floralOptionId`),
  CONSTRAINT `deals_ibfk_4` FOREIGN KEY (`floralArrangement`) REFERENCES `floralOptions` (`floralOptionId`),
  CONSTRAINT `deals_ibfk_5` FOREIGN KEY (`dealOfMonth`) REFERENCES `dealOfMonth` (`domOptionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `deals` WRITE;
/*!40000 ALTER TABLE `deals` DISABLE KEYS */;

INSERT INTO `deals` (`packageId`, `packageName`, `numberChairs`, `numberGuests`, `floralArrangement`, `musicPackage`, `photoPackage`, `discount`, `dealOfMonth`, `packageDescription`)
VALUES
	(1,'Tropical Tiki Basic',10,10,1,2,1,10,1,'The Tropical Tiki Basic Package is a small, elegant option that is perfect for an intimate elopement or an affordable destination wedding. This package takes refined simplicity to a whole new level, and creates a classic beach wedding atmosphere'),
	(2,'Classic Bamboo Basic',20,35,1,2,1,10,2,'Our Classic Bamboo Basic package is a client favorite each year. The summery look of the decoration and the large guest allocation make this package the ideal backdrop for a large, yet intimate wedding experience.\n');

/*!40000 ALTER TABLE `deals` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table floralOptions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `floralOptions`;

CREATE TABLE `floralOptions` (
  `floralOptionId` int(11) NOT NULL AUTO_INCREMENT,
  `floralOptionName` varchar(30) NOT NULL,
  `floralOptionDescription` text NOT NULL,
  PRIMARY KEY (`floralOptionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `floralOptions` WRITE;
/*!40000 ALTER TABLE `floralOptions` DISABLE KEYS */;

INSERT INTO `floralOptions` (`floralOptionId`, `floralOptionName`, `floralOptionDescription`)
VALUES
	(1,'None','No Floral Arrangement is included with this package.'),
	(2,'Small',''),
	(3,'Medium',''),
	(4,'Large','');

/*!40000 ALTER TABLE `floralOptions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table galleries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `galleries`;

CREATE TABLE `galleries` (
  `galleryId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `photoURL_1` varchar(55) DEFAULT '',
  `photoURL_2` varchar(55) DEFAULT '',
  `photoURL_3` varchar(55) DEFAULT '',
  `photoURL_4` varchar(55) DEFAULT '',
  `photoURL_5` varchar(55) DEFAULT '',
  `photoURL_6` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`galleryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;

INSERT INTO `galleries` (`galleryId`, `userId`, `photoURL_1`, `photoURL_2`, `photoURL_3`, `photoURL_4`, `photoURL_5`, `photoURL_6`)
VALUES
	(1,2,'assets/images/bride_groom_sunset.png','assets/images/sunset_pier.png','assets/images/flower.png','assets/images/blue_wedding_setup.png','assets/images/sunset_kiss.png','assets/images/bamboo_arch_side.png'),
	(3,3,'testurl','testurl','testurl','','',NULL);

/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table musicPackages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `musicPackages`;

CREATE TABLE `musicPackages` (
  `musicPackageId` int(11) NOT NULL AUTO_INCREMENT,
  `musicPackageName` varchar(40) NOT NULL,
  PRIMARY KEY (`musicPackageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `musicPackages` WRITE;
/*!40000 ALTER TABLE `musicPackages` DISABLE KEYS */;

INSERT INTO `musicPackages` (`musicPackageId`, `musicPackageName`)
VALUES
	(1,'No Music Package'),
	(2,'Standard Recorded Package'),
	(3,'Custom Recorded Package'),
	(4,'Standard Live Guitar Package'),
	(5,'Custom Live Guitar Package'),
	(6,'Standard Live Quartet Package'),
	(7,'Custom Live Quartet Package');

/*!40000 ALTER TABLE `musicPackages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table packages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `packages`;

CREATE TABLE `packages` (
  `packageId` int(11) NOT NULL AUTO_INCREMENT,
  `packageName` varchar(30) NOT NULL,
  `numberChairs` int(3) NOT NULL,
  `numberGuests` int(3) NOT NULL,
  `floralArrangement` int(2) NOT NULL,
  `musicPackage` int(2) NOT NULL,
  `photoPackage` int(3) NOT NULL,
  `packageDescription` text,
  PRIMARY KEY (`packageId`),
  KEY `floralArrangement` (`floralArrangement`),
  KEY `musicPackage` (`musicPackage`),
  KEY `photoPackage` (`photoPackage`),
  CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`floralArrangement`) REFERENCES `floralOptions` (`floralOptionId`),
  CONSTRAINT `packages_ibfk_2` FOREIGN KEY (`musicPackage`) REFERENCES `musicPackages` (`musicPackageId`),
  CONSTRAINT `packages_ibfk_3` FOREIGN KEY (`photoPackage`) REFERENCES `photoPackages` (`photoPackageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;

INSERT INTO `packages` (`packageId`, `packageName`, `numberChairs`, `numberGuests`, `floralArrangement`, `musicPackage`, `photoPackage`, `packageDescription`)
VALUES
	(1,'Tropical Tiki Basic',10,15,1,2,1,'The Tropical Tiki Basic Package is a small, elegant option that is perfect for an intimate elopement or an affordable destination wedding. This package takes refined simplicity to a whole new level, and creates a classic beach wedding atmosphere.'),
	(2,'Tropical Tiki Deluxe',20,35,1,4,3,'In addition to the great features included in the Basic Package, our Tropical Tiki Deluxe Package also includes a selection of premium services, such as our Family Photography Package and a Live Music upgrade. '),
	(3,'Classic Bamboo Basic',20,35,1,2,1,'Our Classic Bamboo Basic package is a client favorite each year. The summery look of the decoration and the large guest allocation make this package the ideal backdrop for a large, yet intimate wedding experience.'),
	(4,'Classic Bamboo Deluxe',30,40,1,4,3,'The Classic Bamboo Deluxe Package creates an amazing atmosphere for your ceremony, and includes a generous amount of space on the Guest List for a large gathering of family and friends.\n');

/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table photoPackages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photoPackages`;

CREATE TABLE `photoPackages` (
  `photoPackageId` int(11) NOT NULL AUTO_INCREMENT,
  `photoPackageName` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`photoPackageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `photoPackages` WRITE;
/*!40000 ALTER TABLE `photoPackages` DISABLE KEYS */;

INSERT INTO `photoPackages` (`photoPackageId`, `photoPackageName`)
VALUES
	(1,'Basic Couple Photo Package'),
	(2,'Deluxe Couple Photo Package'),
	(3,'Basic Family Photo Package'),
	(4,'Deluxe Family Photo Package');

/*!40000 ALTER TABLE `photoPackages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table primaryColors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `primaryColors`;

CREATE TABLE `primaryColors` (
  `colorId` int(11) NOT NULL AUTO_INCREMENT,
  `colorName` varchar(20) NOT NULL,
  PRIMARY KEY (`colorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `primaryColors` WRITE;
/*!40000 ALTER TABLE `primaryColors` DISABLE KEYS */;

INSERT INTO `primaryColors` (`colorId`, `colorName`)
VALUES
	(1,'Aqua'),
	(2,'Black'),
	(3,'Blue'),
	(4,'Brown'),
	(5,'Coral'),
	(6,'Green'),
	(7,'Orange'),
	(8,'Pink'),
	(9,'Purple'),
	(10,'Red'),
	(11,'Seafoam'),
	(12,'White'),
	(13,'Yellow');

/*!40000 ALTER TABLE `primaryColors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table secondaryColors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `secondaryColors`;

CREATE TABLE `secondaryColors` (
  `colorId` int(11) NOT NULL AUTO_INCREMENT,
  `colorName` varchar(20) NOT NULL,
  PRIMARY KEY (`colorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `secondaryColors` WRITE;
/*!40000 ALTER TABLE `secondaryColors` DISABLE KEYS */;

INSERT INTO `secondaryColors` (`colorId`, `colorName`)
VALUES
	(1,'Aqua'),
	(2,'Black'),
	(3,'Blue'),
	(4,'Brown'),
	(5,'Coral'),
	(6,'Green'),
	(7,'Orange'),
	(8,'Pink'),
	(9,'Purple'),
	(10,'Red'),
	(11,'Seafoam'),
	(12,'White'),
	(13,'Yellow');

/*!40000 ALTER TABLE `secondaryColors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userIsAdmin` int(1) NOT NULL,
  `userName` char(25) NOT NULL,
  `userPass` char(32) NOT NULL,
  `userSalt` varchar(8) NOT NULL,
  `userFirstName` varchar(15) NOT NULL DEFAULT '',
  `userLastName` varchar(25) NOT NULL DEFAULT '',
  `userFullName` char(40) NOT NULL DEFAULT '',
  `brideName` char(40) NOT NULL DEFAULT '',
  `groomName` char(40) NOT NULL DEFAULT '',
  `weddingDate` varchar(10) NOT NULL,
  `userAddress` varchar(50) NOT NULL DEFAULT '',
  `userState` char(3) NOT NULL DEFAULT '',
  `userZIP` int(11) NOT NULL,
  `userPhone` bigint(10) NOT NULL,
  `userEmail` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`userId`),
  KEY `userIsAdmin` (`userIsAdmin`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userIsAdmin`) REFERENCES `admin` (`adminId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`userId`, `userIsAdmin`, `userName`, `userPass`, `userSalt`, `userFirstName`, `userLastName`, `userFullName`, `brideName`, `groomName`, `weddingDate`, `userAddress`, `userState`, `userZIP`, `userPhone`, `userEmail`)
VALUES
	(1,1,'admin','40b8f13e844b849c6490d6d65daaded2','iiL5oq7Y','Trey','Simmons','Trey Simmons','n/a','n/a','n/a','n/a','n/a',32444,1234561234,'donaldsimmons@fullsail.edu'),
	(2,2,'suestorm','eb55a8f170dbe53c3c246c7af4bf9541','BaJ82vYq','Sue','Storm','Sue Storm','Sue Storm','Reed Richards','06/14/2013','Baxter Building, New York City','NY',10071,5551236789,'sue@fanfour.com'),
	(3,2,'janetvandyne','0a5b09c760af9560cde99d3528036b67','nU3o07FT','Janet','Van Dyne','Janet Van Dyne','Janet Van Dyne','Henry Pym','05/31/2013','890 5th Ave, New York City','NY',10071,5551234325,'jan@avengers.com'),
	(4,2,'jessiejones','bad67b4dd3b3ce05d4d05c219414e3e0','j7Ix01eG','Jessica','Jones','Jessica Jones','Jessica Jones','Luke Cage','09/04/2013','890 5th Ave, New York City','NY',10071,5558196352,'jess@avengers.com'),
	(5,2,'selinakyle','a06fd6ef9c1aba3fa721137c56972752','B8x01PJd','Selina','Kyle','Selina Kyle','Selina Kyle','Bruce Wayne','06/29/2013','1007 Mountain Dr, Gotham City','NY',10071,5552841094,'selina@catwoman.com'),
	(6,2,'caroldanvers','19fc637b8b0377bc51899596df5e25f2','vP01aWyc','Carol','Danvers','Carol Danvers','Carol Danvers','Joseph Danvers','10/02/2013','200 Park Ave, New York City','NY',10071,5558291039,'carol@avengers.com'),
	(7,2,'wandamaximoff','5c13a59b2b803ea1b4a8f51e77b9de7e','76dT3Jn7','Wanda','Maximoff','Wanda Maximoff','Wanda Maximoff','Vision','07/18/2013','890 5th Ave, New York City','NY',10071,5552784930,'wanda@avengers.com');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table weddingChanges
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weddingChanges`;

CREATE TABLE `weddingChanges` (
  `changesId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `packageId` int(11) DEFAULT NULL,
  `primaryColor` int(3) DEFAULT NULL,
  `secondaryColor` int(3) DEFAULT NULL,
  `numberChairs` int(3) DEFAULT NULL,
  `numberGuests` int(3) DEFAULT NULL,
  `floralArrangement` int(3) DEFAULT NULL,
  `musicPackage` int(3) DEFAULT NULL,
  `photoPackage` int(3) DEFAULT NULL,
  `weddingNotes` text,
  PRIMARY KEY (`changesId`),
  KEY `packageId` (`packageId`),
  KEY `primaryColor` (`primaryColor`),
  KEY `secondaryColor` (`secondaryColor`),
  KEY `floralArrangement` (`floralArrangement`),
  KEY `musicPackage` (`musicPackage`),
  KEY `photoPackage` (`photoPackage`),
  CONSTRAINT `weddingChanges_ibfk_1` FOREIGN KEY (`packageId`) REFERENCES `packages` (`packageId`),
  CONSTRAINT `weddingChanges_ibfk_2` FOREIGN KEY (`primaryColor`) REFERENCES `primaryColors` (`colorId`),
  CONSTRAINT `weddingChanges_ibfk_3` FOREIGN KEY (`secondaryColor`) REFERENCES `secondaryColors` (`colorId`),
  CONSTRAINT `weddingChanges_ibfk_4` FOREIGN KEY (`floralArrangement`) REFERENCES `floralOptions` (`floralOptionId`),
  CONSTRAINT `weddingChanges_ibfk_5` FOREIGN KEY (`musicPackage`) REFERENCES `musicPackages` (`musicPackageId`),
  CONSTRAINT `weddingChanges_ibfk_6` FOREIGN KEY (`photoPackage`) REFERENCES `photoPackages` (`photoPackageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weddingChanges` WRITE;
/*!40000 ALTER TABLE `weddingChanges` DISABLE KEYS */;

INSERT INTO `weddingChanges` (`changesId`, `userId`, `packageId`, `primaryColor`, `secondaryColor`, `numberChairs`, `numberGuests`, `floralArrangement`, `musicPackage`, `photoPackage`, `weddingNotes`)
VALUES
	(3,2,3,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `weddingChanges` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
