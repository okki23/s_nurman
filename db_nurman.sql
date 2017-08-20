/*
Navicat MySQL Data Transfer

Source Server         : localhost_mysql
Source Server Version : 50616
Source Host           : 127.0.0.1:3306
Source Database       : db_nurman

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2017-08-19 11:10:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for m_employee
-- ----------------------------
DROP TABLE IF EXISTS `m_employee`;
CREATE TABLE `m_employee` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_employee
-- ----------------------------
INSERT INTO `m_employee` VALUES ('1', '1001', 'Administrator', '-', '-', '-');
INSERT INTO `m_employee` VALUES ('2', '1002', 'Mahmud', 'Jl.Pisangan Baru III', '08975563343', 'mahmud@mail.com');
INSERT INTO `m_employee` VALUES ('3', '1003', 'Nurman', 'Jl.Kedoya', '089678545499', 'nurman@gmail.com');
INSERT INTO `m_employee` VALUES ('4', '1005', 'Wahyu', 'Jl.Nangka', '089643487966', 'wahyu@gmail.com');
INSERT INTO `m_employee` VALUES ('5', '1006', 'Romi', 'Jl.Tipar Cakung', '089734526374', 'romi@gmail.com');
INSERT INTO `m_employee` VALUES ('7', '0893', 'Joni Super', 'Jl.Naga', '089674954034', 'jons@mail.com');

-- ----------------------------
-- Table structure for m_product
-- ----------------------------
DROP TABLE IF EXISTS `m_product`;
CREATE TABLE `m_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `foto_produk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_product
-- ----------------------------
INSERT INTO `m_product` VALUES ('15', 'LGG4', 'LG G4 Stylus', 'Large-940x620_0_344.jpg');

-- ----------------------------
-- Table structure for m_service_center
-- ----------------------------
DROP TABLE IF EXISTS `m_service_center`;
CREATE TABLE `m_service_center` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode_sc` varchar(255) DEFAULT NULL,
  `nama_sc` varchar(255) DEFAULT NULL,
  `alamat_sc` text,
  `pic_sc` varchar(255) DEFAULT NULL,
  `telp_sc` text,
  `email_sc` varchar(255) DEFAULT NULL,
  `foto_sc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_service_center
-- ----------------------------
INSERT INTO `m_service_center` VALUES ('11', 'KJBT', 'SC Bekasi Timur', 'Jl.MGT Raya', 'Udin Nganga', '08934453499', 'scbt@mail.com', 'Service_center_LG_Electronics_semarang.jpg');

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_pegawai` varchar(100) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES ('24', 'admin', '0cc175b9c0f1b6a831c399e269772661', '1', '1');
INSERT INTO `m_user` VALUES ('36', 'mahmud', '0cc175b9c0f1b6a831c399e269772661', '2', '2');
INSERT INTO `m_user` VALUES ('37', 'nurman', '0cc175b9c0f1b6a831c399e269772661', '3', '3');
INSERT INTO `m_user` VALUES ('38', 'wahyu', '0cc175b9c0f1b6a831c399e269772661', '4', '4');
INSERT INTO `m_user` VALUES ('39', 'romi', '0cc175b9c0f1b6a831c399e269772661', '5', '3');
INSERT INTO `m_user` VALUES ('40', 'jonis', '7815696ecbf1c96e6894b779456d330e', '7', '3');

-- ----------------------------
-- Table structure for trans_assign
-- ----------------------------
DROP TABLE IF EXISTS `trans_assign`;
CREATE TABLE `trans_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_claim` int(10) DEFAULT NULL,
  `id_pic` int(10) DEFAULT NULL,
  `priority` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date_assign` varchar(255) DEFAULT NULL,
  `note` text,
  `date_after_assign` date DEFAULT NULL,
  `note_after_assign` text,
  `photo_before_assign` varchar(255) DEFAULT NULL,
  `photo_after_assign` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trans_assign
-- ----------------------------
INSERT INTO `trans_assign` VALUES ('3', '7', '5', 'medium', 'pending', '2017-08-30', 'YES I DO', '2017-08-30', 'YES I DO', '8840f2dd1335f8f0421b5dd27482882a.jpg', '10407414_1641065012847023_5501612007231766751_n.jpg');

-- ----------------------------
-- Table structure for trans_claim
-- ----------------------------
DROP TABLE IF EXISTS `trans_claim`;
CREATE TABLE `trans_claim` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_registrasi` varchar(255) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `alamat_pelanggan` text,
  `telp_pelanggan` text,
  `email_pelanggan` varchar(255) DEFAULT NULL,
  `id_product` int(10) DEFAULT NULL,
  `jenis_keluhan` varchar(10) DEFAULT NULL,
  `jenis_keluhan_other` text,
  `foto_keluhan` varchar(255) DEFAULT NULL,
  `catatan` text,
  `date_insert` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trans_claim
-- ----------------------------
INSERT INTO `trans_claim` VALUES ('7', 'CU0000001', 'Okki Setyawan', 'Jl.Bintara IX No.82', '089610595064', 'okkisetyawan@gmail.com', '0', 'service', '-', null, 'OKE', '2017-08-15 00:00:00');

-- ----------------------------
-- Table structure for t_assign_result
-- ----------------------------
DROP TABLE IF EXISTS `t_assign_result`;
CREATE TABLE `t_assign_result` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_assign` int(10) DEFAULT NULL,
  `id_pic` int(10) DEFAULT NULL,
  `date_after_assign` date DEFAULT NULL,
  `note_after_assign` text,
  `photo_before_assign` varchar(255) DEFAULT NULL,
  `photo_after_assign` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_assign_result
-- ----------------------------
