/*
Navicat MySQL Data Transfer

Source Server         : 192.168.20.38_3306
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : mixedappseg

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-11-29 12:10:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ct_captcha`
-- ----------------------------
DROP TABLE IF EXISTS `ct_captcha`;
CREATE TABLE `ct_captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ct_captcha
-- ----------------------------
INSERT INTO `ct_captcha` VALUES ('1', '1354123845', '127.0.0.1', 'dXs4P3vT');
INSERT INTO `ct_captcha` VALUES ('2', '1354124357', '127.0.0.1', 'c9wUVYXM');
INSERT INTO `ct_captcha` VALUES ('3', '1354124369', '127.0.0.1', 'cygXqaAC');
INSERT INTO `ct_captcha` VALUES ('4', '1354124407', '127.0.0.1', 'm5n5mGYh');
INSERT INTO `ct_captcha` VALUES ('5', '1354124414', '127.0.0.1', 'lYhZBfxh');
INSERT INTO `ct_captcha` VALUES ('6', '1354124545', '127.0.0.1', '2maS7');
INSERT INTO `ct_captcha` VALUES ('7', '1354125927', '127.0.0.1', '8LpGh');
INSERT INTO `ct_captcha` VALUES ('8', '1354125950', '127.0.0.1', 'wDoWP');
INSERT INTO `ct_captcha` VALUES ('9', '1354125972', '127.0.0.1', 'ECzXe');
INSERT INTO `ct_captcha` VALUES ('10', '1354125996', '127.0.0.1', '5nkKB');
INSERT INTO `ct_captcha` VALUES ('11', '1354126020', '127.0.0.1', 'An0Ty');
INSERT INTO `ct_captcha` VALUES ('12', '1354126057', '127.0.0.1', 'DThjC');
INSERT INTO `ct_captcha` VALUES ('13', '1354126069', '127.0.0.1', 'vsC7l');
INSERT INTO `ct_captcha` VALUES ('14', '1354126083', '127.0.0.1', 'fQIST');
INSERT INTO `ct_captcha` VALUES ('15', '1354126092', '127.0.0.1', 'WP3L2');
