/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : beststore

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-07-24 14:22:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for shop_attr
-- ----------------------------
DROP TABLE IF EXISTS `shop_attr`;
CREATE TABLE `shop_attr` (
  `attr_id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `isKey` int(11) NOT NULL,
  `isSale` int(11) NOT NULL,
  PRIMARY KEY (`attr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_attr
-- ----------------------------
INSERT INTO `shop_attr` VALUES ('1', '2', '口味', '1', '1');
INSERT INTO `shop_attr` VALUES ('2', '2', '大小', '1', '1');
INSERT INTO `shop_attr` VALUES ('3', '3', '口味', '1', '1');
INSERT INTO `shop_attr` VALUES ('4', '3', '大小', '1', '1');

-- ----------------------------
-- Table structure for shop_attr_value
-- ----------------------------
DROP TABLE IF EXISTS `shop_attr_value`;
CREATE TABLE `shop_attr_value` (
  `avid` int(11) NOT NULL AUTO_INCREMENT,
  `attr_id` int(11) NOT NULL,
  `value` varchar(10) NOT NULL,
  PRIMARY KEY (`avid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_attr_value
-- ----------------------------
INSERT INTO `shop_attr_value` VALUES ('1', '1', '微辣');
INSERT INTO `shop_attr_value` VALUES ('2', '1', '不辣');
INSERT INTO `shop_attr_value` VALUES ('3', '1', '超辣');
INSERT INTO `shop_attr_value` VALUES ('4', '2', '大份');
INSERT INTO `shop_attr_value` VALUES ('5', '2', '小份');
INSERT INTO `shop_attr_value` VALUES ('6', '2', '中份');
INSERT INTO `shop_attr_value` VALUES ('7', '3', '微辣');
INSERT INTO `shop_attr_value` VALUES ('8', '3', '不辣');
INSERT INTO `shop_attr_value` VALUES ('9', '3', '超辣');
INSERT INTO `shop_attr_value` VALUES ('12', '4', '大份');
INSERT INTO `shop_attr_value` VALUES ('13', '4', '小份');
INSERT INTO `shop_attr_value` VALUES ('14', '4', '中份');

-- ----------------------------
-- Table structure for shop_cart
-- ----------------------------
DROP TABLE IF EXISTS `shop_cart`;
CREATE TABLE `shop_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `art_path` varchar(150) NOT NULL DEFAULT '',
  `discount` longtext NOT NULL,
  `num` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_cart
-- ----------------------------
INSERT INTO `shop_cart` VALUES ('13', '2:2', '6', '1', '米汉堡套餐', '10.00', 'images/3.jpg', '0.9', '5');
INSERT INTO `shop_cart` VALUES ('14', '2:2', '6', '3', '香肠手抓饼', '6.00', 'images/5.png', '0.9', '1');
INSERT INTO `shop_cart` VALUES ('16', '1:4', '23', '1', '米粒汉堡', '20.00', 'images/12.png', '0.8', '13');

-- ----------------------------
-- Table structure for shop_category
-- ----------------------------
DROP TABLE IF EXISTS `shop_category`;
CREATE TABLE `shop_category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `path` varchar(20) NOT NULL DEFAULT '',
  `description` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `cname` (`cname`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_category
-- ----------------------------
INSERT INTO `shop_category` VALUES ('1', '汉堡', '0', '0-1', '好吃');
INSERT INTO `shop_category` VALUES ('2', '米粒汉堡', '1', '0-1-2', '好吃');
INSERT INTO `shop_category` VALUES ('3', '牛肉汉堡', '1', '0-1-3', '好吃');
INSERT INTO `shop_category` VALUES ('4', '奶茶', '0', '0-4', '好吃');
INSERT INTO `shop_category` VALUES ('5', '肉松手抓饼', '7', '0-7-5', '好吃');
INSERT INTO `shop_category` VALUES ('6', '珍珠奶茶', '4', '0-4-6', '好吃');
INSERT INTO `shop_category` VALUES ('7', '手抓饼', '0', '0-7', '好吃');
INSERT INTO `shop_category` VALUES ('8', '巨无霸汉堡', '1', '0_1_8', '好吃');
INSERT INTO `shop_category` VALUES ('9', '糯米奶茶', '4', '0_4_9', '好吃');
INSERT INTO `shop_category` VALUES ('10', '椰果奶茶', '4', '0_1_10', '好吃');
INSERT INTO `shop_category` VALUES ('11', '鸡蛋手抓饼', '7', '0_7_11', '好吃');
INSERT INTO `shop_category` VALUES ('12', '培根手抓饼', '7', '0_7_12', '好吃');
INSERT INTO `shop_category` VALUES ('13', '鸡腿汉堡', '1', '0_1_13', '');
INSERT INTO `shop_category` VALUES ('14', '布丁奶茶', '4', '0_4_14', '');
INSERT INTO `shop_category` VALUES ('15', '紫薯手抓饼', '7', '0_7_15', '');

-- ----------------------------
-- Table structure for shop_goods
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods`;
CREATE TABLE `shop_goods` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(50) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount` longtext NOT NULL,
  `store_num` int(11) NOT NULL,
  `art_path` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `store_time` datetime DEFAULT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_goods
-- ----------------------------
INSERT INTO `shop_goods` VALUES ('1', '', '米粒汉堡', '2', '20', '0.8', '50', 'images/12.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('2', '', '牛肉汉堡', '3', '20', '0.8', '50', 'images/11.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('3', '', '巨无霸汉堡', '8', '20', '0.9', '49', 'images/3.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('4', '', '鸡腿汉堡', '13', '20', '0.7', '56', 'images/4.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('5', '', '珍珠奶茶', '6', '20', '0.8', '10', 'images/13.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('6', '', '糯米奶茶', '9', '20', '0.9', '45', 'images/14.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('7', '', '椰果奶茶', '10', '20', '0.8', '46', 'images/15.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('8', '', '布丁奶茶', '14', '20', '0.9', '34', 'images/16.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('9', '', '肉松手抓饼', '5', '20', '0.9', '20', 'images/17.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('10', '', '紫薯手抓饼', '15', '20', '0.9', '57', 'images/18.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('11', '', '鸡蛋手抓饼', '11', '20', '0.9', '50', 'images/19.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('12', '', '培根手抓饼', '12', '20', '0.9', '44', 'images/20.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('16', '', '微辣米粒汉堡', '2', '30', '0.8', '20', 'images/5.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('17', '', '微辣米粒汉堡1', '2', '30', '0.8', '30', 'images/6.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('18', '', '微辣米粒汉堡2', '2', '30', '0.8', '26', 'images/7.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('19', '', '好吃汉堡', '2', '54', '0.8', '33', 'images/8.png', '1', null, '哈哈');
INSERT INTO `shop_goods` VALUES ('20', '', '好吃汉堡7', '2', '54', '0.8', '1', 'images/9.png', '1', null, '');
INSERT INTO `shop_goods` VALUES ('21', '', '好吃汉堡8', '2', '54', '0.8', '1', 'images/10.png', '1', null, '');

-- ----------------------------
-- Table structure for shop_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods_attr`;
CREATE TABLE `shop_goods_attr` (
  `gid` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `avid` int(11) NOT NULL,
  PRIMARY KEY (`gid`,`attr_id`,`avid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_goods_attr
-- ----------------------------
INSERT INTO `shop_goods_attr` VALUES ('1', '1', '1');
INSERT INTO `shop_goods_attr` VALUES ('16', '1', '1');
INSERT INTO `shop_goods_attr` VALUES ('16', '2', '4');
INSERT INTO `shop_goods_attr` VALUES ('17', '1', '1');
INSERT INTO `shop_goods_attr` VALUES ('17', '2', '5');
INSERT INTO `shop_goods_attr` VALUES ('18', '1', '3');
INSERT INTO `shop_goods_attr` VALUES ('18', '2', '6');

-- ----------------------------
-- Table structure for shop_order
-- ----------------------------
DROP TABLE IF EXISTS `shop_order`;
CREATE TABLE `shop_order` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `order_num` varchar(32) NOT NULL,
  `uid` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `addr_id` int(11) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_order
-- ----------------------------
INSERT INTO `shop_order` VALUES ('6', '1703177660008240', '6', '2017-03-17 18:50:00', '2017-03-17 18:50:00', '1', '已付款', '2');
INSERT INTO `shop_order` VALUES ('7', '1703180350778519', '6', '2017-03-18 02:18:27', '2017-03-18 02:18:27', '1', '已付款', '2');
INSERT INTO `shop_order` VALUES ('8', '1703180362640398', '6', '2017-03-18 02:20:26', '2017-03-18 02:20:26', '1', '已付款', '2');
INSERT INTO `shop_order` VALUES ('9', '1705080768174461', '23', '2017-05-08 01:41:21', '2017-05-08 01:41:21', '1', '已付款', '1');

-- ----------------------------
-- Table structure for shop_order_detail
-- ----------------------------
DROP TABLE IF EXISTS `shop_order_detail`;
CREATE TABLE `shop_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `art_path` varchar(100) NOT NULL DEFAULT '',
  `discount` longtext NOT NULL,
  `num` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_order_detail
-- ----------------------------
INSERT INTO `shop_order_detail` VALUES ('7', '6', '1', '米汉堡套餐', '10', 'images/3.jpg', '0.9', '5');
INSERT INTO `shop_order_detail` VALUES ('8', '7', '1', '米汉堡套餐', '10', 'images/3.jpg', '0.9', '5');
INSERT INTO `shop_order_detail` VALUES ('9', '7', '3', '香肠手抓饼', '6', 'images/5.png', '0.9', '1');
INSERT INTO `shop_order_detail` VALUES ('10', '8', '4', '珍珠奶茶', '7', 'images/6.png', '0.8', '2');
INSERT INTO `shop_order_detail` VALUES ('11', '9', '1', '米粒汉堡', '20', 'images/12.png', '0.8', '11');

-- ----------------------------
-- Table structure for shop_reicv_addr
-- ----------------------------
DROP TABLE IF EXISTS `shop_reicv_addr`;
CREATE TABLE `shop_reicv_addr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `province` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `street` varchar(100) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `postcode` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_reicv_addr
-- ----------------------------
INSERT INTO `shop_reicv_addr` VALUES ('1', '23', '厦门市', '思明区', '莲前街道', '软件园', '362000', '柯银森', '18150960888');
INSERT INTO `shop_reicv_addr` VALUES ('2', '6', '福建省', '漳州市', '莲花前街道', '将军山', '363300', '小柯', '18150960120');

-- ----------------------------
-- Table structure for shop_user
-- ----------------------------
DROP TABLE IF EXISTS `shop_user`;
CREATE TABLE `shop_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birth` datetime NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '1',
  `ip` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `delete_at` datetime NOT NULL,
  `uname` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_user
-- ----------------------------
INSERT INTO `shop_user` VALUES ('1', '103123@qq.com', '654321', '2000-01-01 00:00:00', '1', '192.168.1.1', '0', '2017-03-16 20:34:56', '2017-03-16 20:34:56', '2017-03-16 20:34:56', '2017-03-16 20:34:56', 'xiaofang');
