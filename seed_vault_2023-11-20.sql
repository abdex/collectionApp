# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.1.2-MariaDB-1:11.1.2+maria~ubu2204)
# Database: seed_vault
# Generation Time: 2023-11-20 13:09:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table plant_family
# ------------------------------------------------------------

DROP TABLE IF EXISTS `plant_family`;

CREATE TABLE `plant_family` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latin_name` varchar(40) DEFAULT NULL,
  `common_name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `plant_family` WRITE;
/*!40000 ALTER TABLE `plant_family` DISABLE KEYS */;

INSERT INTO `plant_family` (`id`, `latin_name`, `common_name`)
VALUES
	(1,'apiaceae','umbellifers'),
	(2,'brassicaceae','brassicas'),
	(3,'solanaceae','nightshade'),
	(4,'cucurbitaceae','curcibits'),
	(5,'amaryllidaceae','alliums');

/*!40000 ALTER TABLE `plant_family` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table seeds
# ------------------------------------------------------------

DROP TABLE IF EXISTS `seeds`;

CREATE TABLE `seeds` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `genus` int(10) unsigned DEFAULT NULL,
  `species` varchar(40) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `seeds` WRITE;
/*!40000 ALTER TABLE `seeds` DISABLE KEYS */;

INSERT INTO `seeds` (`id`, `name`, `genus`, `species`, `image`, `description`)
VALUES
	(1,'Rainbow Carrots',1,'Daucus carota','https://www.shutterstock.com/image-photo/colorful-rainbow-carrot-their-green-600nw-2041355402.jpg','Carrot fly resistant F1 hybrid. Sow thinnly outdoors in intervals from March to June. Harvest from June to October.  '),
	(2,'Brocolli purple rain sprouting',2,'oleracea Italica','https://cdn.create.vista.com/api/media/medium/468724448/stock-photo-freshy-cut-purple-sprouting-broccoli-laid-out-garden-table-copy?token=','British hybrid with high productivity. Heat tolerant and slow to bolt. Best sown indoors from January to March and transfered outdoors after the first frost. Harvest from July to November.'),
	(3,'January King Cabbage',2,'oleracea Capitata','https://cdn.create.vista.com/api/media/small/2297624/stock-photo-cauliflower','High quality king cabbage formulated with RHS.  Plant nside between March and May and harvest between October and February.'),
	(4,'Tomato Marmande (beefsteak)',3,'Solanum lycopersicum','https://cdn.create.vista.com/api/media/small/120662200/stock-photo-image-tomato-garden-day-time','Heirloom beefsteak tomatoes originating from Provence, France. Sow indoors January to March. Harvest between August and September. As an indeterminate variety, for best yield I would advise pruning the sideshoots. Delicious in Ratatouille!'),
	(5,'Sarbo Blue Danube Potato',3,'Solanum tuberosum','https://cdn.create.vista.com/api/media/medium/557170568/stock-photo-several-potatoes-purple-variety-violetta-wood-burlap-front-wooden-box?token=','Blight resistant variety as well as resistent to general disease. Has genetic tendency for dormancy and so lends itself to good long storage shelf life that you can keep through to spring if in cool, dark and frost-free. Best planted after chitting and planted outside between April and May. Harvest between August and October. With its high dry matter content - it is best used in roasting, chipping and baking. Some say it might make the best roast potato ever. '),
	(6,'Cucumber Marketmore',4,'Cucumis sativus','https://cdn.create.vista.com/api/media/medium/608011722/stock-photo-green-fresh-cucumbers-hang-plant-field-growing-vegetables-garden?token=','A superb, tasty, straight-fruited slicing cucumber with excellent resistance to powdery and downy mildew. Ideal for culture in pots and grow bags. Outdoor ridge type. Plant indoors from February to April then gradually acustom them to outdoors before planting out may-June. Great for pickling and slicing into salads.'),
	(7,'Garlic Provence Wight Bulbs (S',5,'Allium sativum','https://cdn.create.vista.com/api/media/medium/588634434/stock-photo-beautiful-garlic-plants-stalk-bulb-roots-visible-well-garden-soil?token=','A really large, white softneck garlic which can produce, in a good growing season, bulbs that are of a similar size to Elephant Garlic! The cloves are fat and juicy, perfect for garlic bread, salid dressings, roasting and whatever you like! An overwintering variety, sow outdoors beween September and November for harvest between June and August the next year.');

/*!40000 ALTER TABLE `seeds` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
