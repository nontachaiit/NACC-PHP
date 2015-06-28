# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.38)
# Database: nacc_law
# Generation Time: 2015-06-22 04:00:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table answer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `answer`;

CREATE TABLE `answer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question` int(11) unsigned NOT NULL,
  `answer` varchar(255) NOT NULL DEFAULT '',
  `is_right` tinyint(1) NOT NULL DEFAULT '0',
  `is_fix_position` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'สำหรับคำตอบพวกถูกทุกข้อ ฯลฯ',
  PRIMARY KEY (`id`),
  KEY `question` (`question`),
  CONSTRAINT `fk_answer_question` FOREIGN KEY (`question`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;

INSERT INTO `answer` (`id`, `question`, `answer`, `is_right`, `is_fix_position`)
VALUES
	(1,1,'นายกรัฐมนตรี และรัฐมนตรี',0,0),
	(2,1,'ผู้บริหารท้องถิ่น',0,0),
	(3,1,'รองผู้บริหารท้องถิ่น',0,1),
	(4,1,'ถูกทุกข้อ',1,1),
	(5,3,'นายกเทศมนตรี นายกเมืองพัทยา',0,0),
	(6,3,'นายกองค์การบริหารส่วนจังหวัด ผู้ว่าราชการกรุงเทพมหานคร',1,0),
	(7,3,'รองนายกองค์การบริหารส่วนตําบล',0,0),
	(8,3,'ถูกทุกข้อ',0,1),
	(9,4,'เป็นคู่สัญญากับหน่วยงานรัฐ ที่เจ้าหน้าที่ของรัฐผู้นั้นกํากับดูแล ควบคุม ตรวจสอบ หรือดําเนินคดี',1,0),
	(10,4,'ปฏิบัติราชการร่วมกับองค์การบริหารส่วนตําบลอื่น',0,0),
	(11,4,'ปฏิบัติราชการร่วมกับมูลนิธิการกุศล/เอกชน',0,0),
	(12,4,'ถูกทุกข้อ',0,1),
	(13,5,'รับสัมปทานหรือคงไว้ซึ่งสัมปทานจากรัฐ หน่วยงานราชการ',0,0),
	(14,5,'เป็นวิทยากรบรรยายให้หน่วยงานราชการ เช่น จังหวัด อําเภอ',0,0),
	(15,5,'ได้รับมอบหมายหน้าที่จากผู้ว่าราชการจังหวัดในการดําเนินงานจัดงานกาชาด',1,0),
	(16,5,'ถูกทุกข้อ',0,1),
	(17,6,'กฎหมายไม่ได้ห้ามไว้ สามารถดําเนินกิจการใดๆ ก็ได้',0,0),
	(18,6,'เป็นดุลยพินิจของคู่สมรสของผู้บริหารและรองผู้บริหารท้องถิ่นที่จะดําเนินกิจการ',0,0),
	(19,6,'กฎหมายห้ามไว้ ไม่สามารถดําเนินกิจการได้',1,0),
	(20,6,'ถูกทุกข้อ',0,1),
	(21,7,'ได้ เพราะกฎหมายไม่ได้บัญญัติห้ามไว้',0,0),
	(22,7,'ได้ เพราะไม่เป็นการขัดกันระหว่างประโยชน์ส่วนบุคคลและประโยชน์ส่วนรวม',0,0),
	(23,7,'ไม่ได้ เพราะกฎหมายบัญญัติห้ามไว้',0,0),
	(24,7,'ไม่มีคําตอบที่ถูกต้อง',1,1),
	(25,8,'ดําเนินกิจการได้ทันทีเมื่อพ้นจากตําแหน่ง',0,0),
	(26,8,'ดําเนินกิจการได้เมื่อพ้นจากตําแหน่งเกิน 1 ปี ล่วงมาแล้ว',0,0),
	(27,8,'ดําเนินกิจการได้เมื่อพ้นจากตําแหน่งเกิน 2 ปี ล่วงมาแล้ว',0,0),
	(28,8,'ไม่สามารถดําเนินกิจการได้เลยเมื่อพ้นจากตําแหน่ง',1,0),
	(29,9,'ห้ามดําเนินกิจการ',0,0),
	(30,9,'ไม่ห้ามดําเนินกิจการ',0,0),
	(31,9,'ห้ามดําเนินกิจการ เพราะเป็นผู้มีอํานาจกํากับดูแลองค์กรปกครองส่วนท้องถิ่น',0,0),
	(32,9,'ถูกทั้งข้อ ก และ ค',1,1),
	(33,10,'ได้ ถ้าหากเป็นกรรมการ ก่อนดํารงตําแหน่ง',0,0),
	(34,10,'ได้ ถ้าหากเป็นลูกจ้าง ก่อนดํารงตําแหน่ง',0,0),
	(35,10,'ไม่ได้',1,0),
	(36,10,'ถูกทั้งข้อ ก และ ข',0,1),
	(37,11,'มีความผิดทางอาญาต้องรับโทษทั้งจําทั้งปรับ',0,0),
	(38,11,'มีความผิดทางแพ่ง และทางปกครอง',0,0),
	(39,11,'มีความผิดทางแพ่งเท่านั้น',1,0),
	(40,11,'ไม่มีความผิด',0,0),
	(41,12,'นายกเทศมนตรี, นายกองค์การบริหารส่วนตําบล',0,0),
	(42,12,'ปลัดองค์การบริหารส่วนตําบล',0,0),
	(43,12,'พนักงานส่วนท้องถิ่นซึ่งมีตําแหน่งหรือเงินเดือนประจํา',1,0),
	(44,12,'ถูกทุกข้อ',0,0);

/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`)
VALUES
	('aff23394c48728ed9a7ac9797a6c7f6d','::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.124 Safari/537.3',1434422007,'');

/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table examination_level
# ------------------------------------------------------------

DROP TABLE IF EXISTS `examination_level`;

CREATE TABLE `examination_level` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `detail` varchar(255) NOT NULL DEFAULT '',
  `section` tinyint(4) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `section` (`section`),
  CONSTRAINT `fk_examlevel_section` FOREIGN KEY (`section`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `examination_level` WRITE;
/*!40000 ALTER TABLE `examination_level` DISABLE KEYS */;

INSERT INTO `examination_level` (`id`, `name`, `detail`, `section`, `status`)
VALUES
	(1,'ระดับที่ 1','ทดสอบความรู้พื้นฐาน',1,1),
	(2,'ระดับที่ 2','ทดสอบความเข้าใจ',1,1),
	(3,'ระดับที่ 3','ทดสอบความชำนาญ',1,1),
	(4,'ระดับที่ 1','ทดสอบความรู้พื้นฐาน',2,1),
	(5,'ระดับที่ 2','ทดสอบความเข้าใจ',2,1),
	(6,'ระดับที่ 3','ทดสอบความชำนาญ',2,1);

/*!40000 ALTER TABLE `examination_level` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table question
# ------------------------------------------------------------

DROP TABLE IF EXISTS `question`;

CREATE TABLE `question` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `section` tinyint(4) unsigned NOT NULL,
  `question` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `examination_level` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `section` (`section`),
  KEY `examination_level` (`examination_level`),
  CONSTRAINT `fk_exam_examlevel` FOREIGN KEY (`examination_level`) REFERENCES `examination_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_exam_section` FOREIGN KEY (`section`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;

INSERT INTO `question` (`id`, `section`, `question`, `status`, `examination_level`)
VALUES
	(1,1,'คณะกรรมการ ป.ป.ช. ได้ประกาศกําหนดตําแหน่งที่ห้ามดําเนินกิจการที่เป็นการขัดกันระหว่างประโยชน์ ส่วนบุคคลและประโยชน์ส่วนรวมตําแหน่งใดบ้าง',1,1),
	(3,1,'เจ้าหน้าที่ของรัฐในตําแหน่งใดบ้าง ที่ห้ามดําเนินกิจการที่เป็นการขัดกันระหว่างประโยชน์ส่วนบุคคลและประโยชน์ส่วนรวม',1,1),
	(4,1,'ตามประกาศคณะกรรมการ ป.ป.ช. ตามความในมาตรา 100 ห้ามเจ้าหน้าที่ของรัฐดําเนินกิจการในลักษณะใด',1,1),
	(5,1,'ข้อใดเป็นกิจการตามมาตรา 100 บัญญัติห้ามผู้บริหารและรองผู้บริหารท้องถิ่นไว้',1,1),
	(6,1,'คู่สมรสของผู้บริหารท้องถิ่นและรองผู้บริหารท้องถิ่นห้ามดําเนินกิจการที่เป็นการขัดกันระหว่างประโยชน์ส่วนบุคคลและประโยชน์ส่วนรวมหรือไม่',1,1),
	(7,1,'ผู้บริหารและรองผู้บริหารท้องถิ่นจะมีหุ้นส่วนหรือผู้ถือหุ้นในห้างหุ้นส่วนหรือบริษัทที่รับสัมปทานจากรัฐหรือหน่วยงานของรัฐได้หรือไม่',1,1),
	(8,1,'ผู้บริหารและรองผู้บริหารท้องถิ่นดําเนินกิจการที่เป็นการขัดกันระหว่างประโยชน์ส่วนบุคคลและประโยชน์ส่วนรวมหลังจากพ้นตําแหน่งได้หรือไม่',1,1),
	(9,1,'“ผู้ว่าราชการจังหวัด” เป็นตําแหน่งที่ห้ามดําเนินกิจการที่เป็นการขัดกันระหว่างประโยชน์ส่วนบุคคลและประโยชน์ส่วนรวมตามความในมาตรา 100 หรือไม่',1,1),
	(10,1,'ผู้บริหารและรองผู้บริหารท้องถิ่นจะเข้าไปมีส่วนได้เสียในฐานะกรรมการ ที่ปรึกษา ตัวแทน พนักงานลูกจ้าง ในธุรกิจของเอกชนซึ่งอยู่ภายใต้การกํากับดูแล ควบคุมหรือตรวจสอบขององค์กรปกครองส่วนท้องถิ่นที่ตนเองเป็นผู้บริหารหรือรองผู้บริหาร ได้หรือไม่',1,1),
	(11,1,'หากผู้บริหารท้องถิ่นและรองผู้บริหารท้องถิ่น หรือคู่สมรส ได้ดําเนินกิจการที่เป็นการฝ่าฝืนมาตรา 100 จะมีความผิดหรือไม่อย่างไร',1,1),
	(12,1,'เจ้าหน้าที่ของรัฐ หมายถึงข้อใด',1,2);

/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table section
# ------------------------------------------------------------

DROP TABLE IF EXISTS `section`;

CREATE TABLE `section` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(40) NOT NULL DEFAULT '',
  `detail` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;

INSERT INTO `section` (`id`, `name`, `alias`, `detail`, `status`)
VALUES
	(1,'มาตรา ๑๐๐','section_100','การปฏิบัติสำหรับเจ้าหน้าที่ของรัฐ เพื่อมิให้ดำเนินกิจการที่เป็นการขัดกันระหว่างประโยชน์ส่วนบุคคลและประโยชน์ส่วนรวม ตามมาตรา ๑๐๐ แห่งกฏหมายประกอบรัฐธรรมนูญ ว่าด้วยการป้องกันและปราบปรามการทุจริต',1),
	(2,'มาตรา ๑๐๓','section_103','แนวทางการปฏิบัติสำหรับเจ้าหน้าที่ของรัฐ ตามกฏหมายประกอบรัฐธรรมนูญว่าด้วยการป้องกันและปราบปรามการทุจริต เรื่อง การรับทรัพย์สินหรือประโยชน์อื่นใดของเจ้าหน้าที่รัฐ ตามมาตรา ๑๐๓',1);

/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
