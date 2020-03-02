/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : hulu_shop

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2019-05-29 01:23:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `adId` int(11) NOT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`adId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_goods
-- ----------------------------
DROP TABLE IF EXISTS `tb_goods`;
CREATE TABLE `tb_goods` (
  `goodsId` bigint(50) NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `price` decimal(20,0) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `number` int(20) DEFAULT NULL,
  `startTime` varchar(255) DEFAULT NULL,
  `sellerId` int(20) DEFAULT NULL,
  `introduction` text,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`goodsId`)
) ENGINE=MyISAM AUTO_INCREMENT=201900000069 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_need
-- ----------------------------
DROP TABLE IF EXISTS `tb_need`;
CREATE TABLE `tb_need` (
  `needId` bigint(50) NOT NULL AUTO_INCREMENT,
  `needName` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `startTime` varchar(255) DEFAULT NULL,
  `needUserId` varchar(20) DEFAULT NULL,
  `introduction` text,
  `img` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`needId`)
) ENGINE=MyISAM AUTO_INCREMENT=201900000084 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_order
-- ----------------------------
DROP TABLE IF EXISTS `tb_order`;
CREATE TABLE `tb_order` (
  `orderId` bigint(30) NOT NULL AUTO_INCREMENT,
  `sellerId` bigint(30) DEFAULT NULL,
  `buyerId` bigint(30) DEFAULT NULL,
  `buyerName` varchar(255) DEFAULT NULL,
  `goodsId` bigint(255) DEFAULT NULL,
  `number` bigint(30) DEFAULT NULL,
  `aggregate` decimal(20,0) DEFAULT NULL,
  `address` text,
  `phone` varchar(255) DEFAULT NULL,
  `wx` varchar(255) DEFAULT NULL,
  `starus` varchar(255) DEFAULT NULL,
  `startTime` varchar(255) DEFAULT NULL,
  `endTime` varchar(255) DEFAULT NULL,
  `look` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`orderId`),
  KEY `sellerId` (`sellerId`)
) ENGINE=MyISAM AUTO_INCREMENT=10000038 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET gb2312 DEFAULT NULL,
  `pwd` varchar(50) CHARACTER SET gb2312 DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `wx` varchar(25) CHARACTER SET gb2312 DEFAULT NULL,
  `dongjie` int(4) DEFAULT NULL,
  `entime` varchar(25) CHARACTER SET gb2312 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=162011360 DEFAULT CHARSET=utf8;
