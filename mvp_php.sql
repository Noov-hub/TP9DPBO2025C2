/*
Navicat MySQL Data Transfer

Source Server         : LatihanDatabase
Source Server Version : 80030
Source Host           : localhost:3306
Source Database       : mvp_php

Target Server Type    : MYSQL
Target Server Version : 80030
File Encoding         : 65001

Date: 2025-05-11 23:56:28
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `mahasiswa`
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tl` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES ('4', '2202125', 'Ayang', 'Bandung', '2020-11-29', 'Perempuan', 'ay@gmail.com', '081321778980');
INSERT INTO `mahasiswa` VALUES ('5', '2202126', 'Rakha', 'Palembang', '2021-01-04', 'Laki-laki', 'palembang@gmail.com', '088970803025');
INSERT INTO `mahasiswa` VALUES ('6', '2202127', 'Prilla', 'Seoul', '2001-05-05', 'Perempuan', 'prillarosaria@upi.edu', '081234876235');
INSERT INTO `mahasiswa` VALUES ('7', '2202128', 'Son', 'Canada', '1994-02-21', 'Perempuan', 'chrstjsmn@gmail.com', '081573038425');
INSERT INTO `mahasiswa` VALUES ('8', '2202129', 'Jeno', 'Incheon', '2000-12-23', 'Laki-laki', 'jeno@gmail.com', '08138746239');
INSERT INTO `mahasiswa` VALUES ('9', '2202130', 'Mark', 'Canada', '1999-08-20', 'Laki-laki', 'mark@upi.edu', '08237218473');
