/*
Navicat MySQL Data Transfer

Source Server         : od
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : uptu

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2015-10-16 09:17:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `questions`
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `faculty` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` longtext,
  PRIMARY KEY (`faculty`,`subject`,`section`,`num`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of questions
-- ----------------------------
INSERT INTO `questions` VALUES ('11', 'NCS-504', 'A', '1', 'A', '<p>asd</p>\r\n');
INSERT INTO `questions` VALUES ('11', 'NCS-504', 'A', '2', 'Q', '<p>vgfsdg</p>\r\n');
INSERT INTO `questions` VALUES ('11', 'NCS-504', 'A', '4', 'A', '<p>vsdv</p>\r\n');
