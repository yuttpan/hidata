/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50153
Source Host           : localhost:3306
Source Database       : hi

Target Server Type    : MYSQL
Target Server Version : 50153
File Encoding         : 65001

Date: 2013-07-30 07:44:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `hi`
-- ----------------------------
DROP TABLE IF EXISTS `hi`;
CREATE TABLE `hi` (
  `Hi_id` int(11) NOT NULL AUTO_INCREMENT,
  `Hi_villcode` varchar(8) DEFAULT NULL,
  `Hi_date` date DEFAULT NULL,
  `Hi_value` double DEFAULT NULL,
  PRIMARY KEY (`Hi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of hi
-- ----------------------------
INSERT INTO `hi` VALUES ('21', '30230105', '2013-07-10', '10');
