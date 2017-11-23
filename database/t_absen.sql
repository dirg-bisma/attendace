/*
Navicat MySQL Data Transfer

Source Server         : my-comp
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : hcm_finger

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-14 20:43:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_absen
-- ----------------------------
DROP TABLE IF EXISTS `t_absen`;
CREATE TABLE `t_absen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(255) NOT NULL,
  `tgl` datetime NOT NULL,
  `id_finger` int(255) NOT NULL,
  `upload` int(1) NOT NULL DEFAULT '0' COMMENT '0 = belum, 1 = sudah',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_absen
-- ----------------------------
INSERT INTO `t_absen` VALUES ('1', '1', '2017-08-01 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('2', '2', '2017-08-01 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('3', '1', '2017-08-01 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('4', '2', '2017-08-01 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('5', '1', '2017-08-01 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('6', '2', '2017-08-01 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('7', '1', '2017-08-01 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('8', '2', '2017-08-01 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('9', '1', '2017-08-02 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('10', '2', '2017-08-02 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('11', '1', '2017-08-02 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('12', '2', '2017-08-02 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('13', '1', '2017-08-02 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('14', '2', '2017-08-02 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('15', '1', '2017-08-02 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('16', '2', '2017-08-02 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('17', '1', '2017-08-03 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('18', '2', '2017-08-03 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('19', '1', '2017-08-03 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('20', '2', '2017-08-03 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('21', '1', '2017-08-03 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('22', '2', '2017-08-03 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('23', '1', '2017-08-03 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('24', '2', '2017-08-03 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('25', '1', '2017-08-04 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('26', '2', '2017-08-04 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('27', '1', '2017-08-04 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('28', '2', '2017-08-04 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('29', '1', '2017-08-04 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('30', '2', '2017-08-04 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('31', '1', '2017-08-04 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('32', '2', '2017-08-04 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('33', '1', '2017-08-05 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('34', '2', '2017-08-05 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('35', '1', '2017-08-05 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('36', '2', '2017-08-05 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('37', '1', '2017-08-05 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('38', '2', '2017-08-05 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('39', '1', '2017-08-05 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('40', '2', '2017-08-05 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('41', '1', '2017-08-06 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('42', '2', '2017-08-06 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('43', '1', '2017-08-06 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('44', '2', '2017-08-06 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('45', '1', '2017-08-06 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('46', '2', '2017-08-06 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('47', '1', '2017-08-06 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('48', '2', '2017-08-06 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('49', '1', '2017-08-07 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('50', '2', '2017-08-07 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('51', '1', '2017-08-07 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('52', '2', '2017-08-07 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('53', '1', '2017-08-07 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('54', '2', '2017-08-07 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('55', '1', '2017-08-07 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('56', '2', '2017-08-07 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('57', '1', '2017-08-08 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('58', '2', '2017-08-08 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('59', '1', '2017-08-08 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('60', '2', '2017-08-08 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('61', '1', '2017-08-08 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('62', '2', '2017-08-08 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('63', '1', '2017-08-08 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('64', '2', '2017-08-08 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('65', '1', '2017-08-09 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('66', '2', '2017-08-09 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('67', '1', '2017-08-09 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('68', '2', '2017-08-09 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('69', '1', '2017-08-09 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('70', '2', '2017-08-09 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('71', '1', '2017-08-09 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('72', '2', '2017-08-09 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('73', '1', '2017-08-10 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('74', '2', '2017-08-10 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('75', '1', '2017-08-10 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('76', '2', '2017-08-10 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('77', '1', '2017-08-10 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('78', '2', '2017-08-10 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('79', '1', '2017-08-10 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('80', '2', '2017-08-10 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('81', '1', '2017-08-11 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('82', '2', '2017-08-11 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('83', '1', '2017-08-11 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('84', '2', '2017-08-11 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('85', '1', '2017-08-11 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('86', '2', '2017-08-11 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('87', '1', '2017-08-11 14:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('88', '2', '2017-08-11 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('89', '1', '2017-08-12 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('90', '2', '2017-08-12 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('91', '1', '2017-08-12 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('92', '2', '2017-08-12 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('93', '1', '2017-08-12 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('94', '2', '2017-08-12 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('95', '1', '2017-08-12 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('96', '2', '2017-08-12 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('97', '1', '2017-08-13 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('98', '2', '2017-08-13 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('99', '1', '2017-08-13 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('100', '2', '2017-08-13 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('101', '1', '2017-08-13 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('102', '2', '2017-08-13 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('103', '1', '2017-08-13 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('104', '2', '2017-08-13 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('105', '1', '2017-08-14 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('106', '2', '2017-08-14 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('107', '1', '2017-08-14 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('108', '2', '2017-08-14 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('109', '1', '2017-08-14 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('110', '2', '2017-08-14 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('111', '1', '2017-08-14 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('112', '2', '2017-08-14 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('113', '1', '2017-08-15 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('114', '2', '2017-08-15 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('115', '1', '2017-08-15 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('116', '2', '2017-08-15 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('117', '1', '2017-08-15 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('118', '2', '2017-08-15 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('119', '1', '2017-08-15 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('120', '2', '2017-08-15 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('121', '1', '2017-08-16 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('122', '2', '2017-08-16 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('123', '1', '2017-08-16 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('124', '2', '2017-08-16 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('125', '1', '2017-08-16 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('126', '2', '2017-08-16 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('127', '1', '2017-08-16 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('128', '2', '2017-08-16 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('129', '1', '2017-08-17 08:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('130', '2', '2017-08-17 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('131', '1', '2017-08-17 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('132', '2', '2017-08-17 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('133', '1', '2017-08-17 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('134', '2', '2017-08-17 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('135', '1', '2017-08-17 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('136', '2', '2017-08-17 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('137', '1', '2017-08-18 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('138', '2', '2017-08-18 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('139', '1', '2017-08-18 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('140', '2', '2017-08-18 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('141', '1', '2017-08-18 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('142', '2', '2017-08-18 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('143', '1', '2017-08-18 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('144', '2', '2017-08-18 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('145', '1', '2017-08-19 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('146', '2', '2017-08-19 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('147', '1', '2017-08-19 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('148', '2', '2017-08-19 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('149', '1', '2017-08-19 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('150', '2', '2017-08-19 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('151', '1', '2017-08-19 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('152', '2', '2017-08-19 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('153', '1', '2017-08-20 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('154', '2', '2017-08-20 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('155', '1', '2017-08-20 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('156', '2', '2017-08-20 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('157', '1', '2017-08-20 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('158', '2', '2017-08-20 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('159', '1', '2017-08-20 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('160', '2', '2017-08-20 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('161', '1', '2017-08-21 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('162', '2', '2017-08-21 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('163', '1', '2017-08-21 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('164', '2', '2017-08-21 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('165', '1', '2017-08-21 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('166', '2', '2017-08-21 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('167', '1', '2017-08-21 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('168', '2', '2017-08-21 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('169', '1', '2017-08-22 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('170', '2', '2017-08-22 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('171', '1', '2017-08-22 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('172', '2', '2017-08-22 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('173', '1', '2017-08-22 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('174', '2', '2017-08-22 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('175', '1', '2017-08-22 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('176', '2', '2017-08-22 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('177', '1', '2017-08-23 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('178', '2', '2017-08-23 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('179', '1', '2017-08-23 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('180', '2', '2017-08-23 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('181', '1', '2017-08-23 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('182', '2', '2017-08-23 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('183', '1', '2017-08-23 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('184', '2', '2017-08-23 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('185', '1', '2017-08-24 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('186', '2', '2017-08-24 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('187', '1', '2017-08-24 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('188', '2', '2017-08-24 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('189', '1', '2017-08-24 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('190', '2', '2017-08-24 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('191', '1', '2017-08-24 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('192', '2', '2017-08-24 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('193', '1', '2017-08-25 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('194', '2', '2017-08-25 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('195', '1', '2017-08-25 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('196', '2', '2017-08-25 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('197', '1', '2017-08-25 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('198', '2', '2017-08-25 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('199', '1', '2017-08-25 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('200', '2', '2017-08-25 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('201', '1', '2017-08-26 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('202', '2', '2017-08-26 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('203', '1', '2017-08-26 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('204', '2', '2017-08-26 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('205', '1', '2017-08-26 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('206', '2', '2017-08-26 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('207', '1', '2017-08-26 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('208', '2', '2017-08-26 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('209', '1', '2017-08-27 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('210', '2', '2017-08-27 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('211', '1', '2017-08-27 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('212', '2', '2017-08-27 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('213', '1', '2017-08-27 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('214', '2', '2017-08-27 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('215', '1', '2017-08-27 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('216', '2', '2017-08-27 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('217', '1', '2017-08-28 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('218', '2', '2017-08-28 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('219', '1', '2017-08-28 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('220', '2', '2017-08-28 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('221', '1', '2017-08-28 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('222', '2', '2017-08-28 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('223', '1', '2017-08-28 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('224', '2', '2017-08-28 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('225', '1', '2017-08-29 06:26:00', '3', '0');
INSERT INTO `t_absen` VALUES ('226', '2', '2017-08-29 06:22:59', '4', '0');
INSERT INTO `t_absen` VALUES ('227', '1', '2017-08-29 12:04:59', '3', '0');
INSERT INTO `t_absen` VALUES ('228', '2', '2017-08-29 12:09:59', '4', '0');
INSERT INTO `t_absen` VALUES ('229', '1', '2017-08-29 12:45:00', '3', '0');
INSERT INTO `t_absen` VALUES ('230', '2', '2017-08-29 12:45:59', '4', '0');
INSERT INTO `t_absen` VALUES ('231', '1', '2017-08-29 17:05:00', '3', '0');
INSERT INTO `t_absen` VALUES ('232', '2', '2017-08-29 17:15:59', '4', '0');
INSERT INTO `t_absen` VALUES ('233', '1', '2017-08-29 18:04:46', '3', '0');
INSERT INTO `t_absen` VALUES ('234', '1', '2017-08-29 23:04:46', '3', '0');
INSERT INTO `t_absen` VALUES ('235', '1', '2017-08-28 18:04:46', '3', '0');
INSERT INTO `t_absen` VALUES ('236', '1', '2017-08-28 23:04:46', '3', '0');
INSERT INTO `t_absen` VALUES ('237', '1', '2017-09-07 20:32:06', '1', '0');
INSERT INTO `t_absen` VALUES ('238', '1', '2017-09-07 20:32:39', '1', '0');
INSERT INTO `t_absen` VALUES ('239', '2', '2017-09-07 20:32:51', '4', '0');
