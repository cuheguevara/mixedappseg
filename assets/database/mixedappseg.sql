/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : mixedappseg

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-11-30 01:19:45
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ct_captcha
-- ----------------------------
INSERT INTO `ct_captcha` VALUES ('23', '1354208921', '127.0.0.1', 'UkKii');
INSERT INTO `ct_captcha` VALUES ('24', '1354210341', '127.0.0.1', 'z7HlA');
INSERT INTO `ct_captcha` VALUES ('25', '1354210363', '127.0.0.1', 'HiTgB');
INSERT INTO `ct_captcha` VALUES ('26', '1354210373', '127.0.0.1', 'EYs14');
INSERT INTO `ct_captcha` VALUES ('27', '1354210411', '127.0.0.1', '5zQLa');
INSERT INTO `ct_captcha` VALUES ('28', '1354210433', '127.0.0.1', 'yjt5D');
INSERT INTO `ct_captcha` VALUES ('29', '1354210449', '127.0.0.1', 'rsUa6');
INSERT INTO `ct_captcha` VALUES ('30', '1354210461', '127.0.0.1', 'DmNiU');

-- ----------------------------
-- Table structure for `ct_guestbook`
-- ----------------------------
DROP TABLE IF EXISTS `ct_guestbook`;
CREATE TABLE `ct_guestbook` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `msg` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_guestbook
-- ----------------------------
INSERT INTO `ct_guestbook` VALUES ('1', 'suhendra@citstudio.com', 'suhendra', 'alksdlaksjd\\r\\nasldkjasldkj\\r\\n');
INSERT INTO `ct_guestbook` VALUES ('2', 'asd', 'asd', 'asd');
