/*
Navicat MySQL Data Transfer

Source Server         : localhost_mysql
Source Server Version : 50616
Source Host           : 127.0.0.1:3306
Source Database       : db_arnoldus

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2017-08-01 00:58:33
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_employee
-- ----------------------------
INSERT INTO `m_employee` VALUES ('1', '1001', 'Okki Setyawan', 'Jl.Bintara IX ', '089610595064', 'okkisetyawan@gmail.com');
INSERT INTO `m_employee` VALUES ('2', '1002', 'Agus Wardianto', 'Jl.Pisangan Baru III', '08975563343', 'agus@mail.com');
INSERT INTO `m_employee` VALUES ('3', '1003', 'Nanu Mulyono', 'Jl.Kedoya', '089678545499', 'okkisetyawan@gmail.com');
INSERT INTO `m_employee` VALUES ('4', '1005', 'Doni', 'Jl.Nangka', '089643487966', 'okkisetyawan@gmail.com');
INSERT INTO `m_employee` VALUES ('5', '1006', 'Arnoldus', 'Jl.Tipar Cakung', '089734526374', 'arnold@mail.com');
INSERT INTO `m_employee` VALUES ('6', '1007', 'Christin', 'Kelapa Gading Nias', '08934234289', 'pembesarpayudara05@gmail.com');
INSERT INTO `m_employee` VALUES ('8', '1020', 'yanto chr', 'Jl.Buah Batu', '0896348234000', 'info@abcindo.com');
INSERT INTO `m_employee` VALUES ('9', '1021', 'Joni ', 'Jl.Arabika', '0896348234000', 'jon@mail.com');

-- ----------------------------
-- Table structure for m_goods
-- ----------------------------
DROP TABLE IF EXISTS `m_goods`;
CREATE TABLE `m_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_goods
-- ----------------------------
INSERT INTO `m_goods` VALUES ('3', 'Entok', '16', 'Pcs');
INSERT INTO `m_goods` VALUES ('4', 'Ayam Boiler', '2', 'Kg');
INSERT INTO `m_goods` VALUES ('5', 'ayam 12 Up', '100', 'Kg');
INSERT INTO `m_goods` VALUES ('6', 'Ayam Lepas', '100', 'Ekor');

-- ----------------------------
-- Table structure for m_supplier
-- ----------------------------
DROP TABLE IF EXISTS `m_supplier`;
CREATE TABLE `m_supplier` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_supplier
-- ----------------------------
INSERT INTO `m_supplier` VALUES ('1', 'PT.ABC Indonesia Pratama', 'JL.BONAR II', '08937438999', 'info@abcindo.com');
INSERT INTO `m_supplier` VALUES ('3', 'PT.HPM Indonesia', 'Jl.Karya Mangun', '08927834234', 'info@hpm.co.id');
INSERT INTO `m_supplier` VALUES ('4', 'PT. Harjito', 'Lampung', '82364234', 'harjito@gmail.com');
INSERT INTO `m_supplier` VALUES ('5', 'PT. Gunawan', 'Lampung', '0896348234291', 'gunawan@gmail.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES ('24', 'admin', '0cc175b9c0f1b6a831c399e269772661', '2', '1');
INSERT INTO `m_user` VALUES ('25', 'dono', '0cc175b9c0f1b6a831c399e269772661', '3', '3');
INSERT INTO `m_user` VALUES ('26', 'nanu', '0cc175b9c0f1b6a831c399e269772661', '4', '4');
INSERT INTO `m_user` VALUES ('28', 'kasino', '0cc175b9c0f1b6a831c399e269772661', '5', '2');
INSERT INTO `m_user` VALUES ('30', 'indro', '0cc175b9c0f1b6a831c399e269772661', '1', '5');
INSERT INTO `m_user` VALUES ('33', 'itin', '0cc175b9c0f1b6a831c399e269772661', '6', '4');
INSERT INTO `m_user` VALUES ('35', 'joni', '0cc175b9c0f1b6a831c399e269772661', '9', '6');

-- ----------------------------
-- Table structure for t_rec_goods
-- ----------------------------
DROP TABLE IF EXISTS `t_rec_goods`;
CREATE TABLE `t_rec_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(100) DEFAULT NULL,
  `id_barang` varchar(100) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `user_insert` varchar(50) DEFAULT NULL,
  `date_insert` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_rec_goods
-- ----------------------------
INSERT INTO `t_rec_goods` VALUES ('5', 'PO0000001', '3', '25', 'Ekor', '1000000', 'admin', '2017-07-25 10:28:27');
INSERT INTO `t_rec_goods` VALUES ('6', 'PO0000004', '6', '20', 'Ekor', '1500000', 'admin', '2017-07-27 03:35:44');

-- ----------------------------
-- Table structure for t_req_goods
-- ----------------------------
DROP TABLE IF EXISTS `t_req_goods`;
CREATE TABLE `t_req_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(100) DEFAULT NULL,
  `id_supplier` varchar(100) DEFAULT NULL,
  `id_barang` varchar(100) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `status_paid` varchar(100) DEFAULT NULL,
  `user_insert` varchar(50) DEFAULT NULL,
  `date_insert` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_req_goods
-- ----------------------------
INSERT INTO `t_req_goods` VALUES ('14', 'PO0000001', '1', '3', '23', 'Ekor', '1000000', 'unpaid', 'admin', '2017-07-25 18:52:01');
INSERT INTO `t_req_goods` VALUES ('15', 'PO0000002', '3', '4', '20', 'Ekor', '25000', 'paid', 'admin', '2017-07-25 18:52:35');
INSERT INTO `t_req_goods` VALUES ('18', 'PO0000003', '1', '3', '10', 'Pcs', '10000', 'unpaid', 'admin', '2017-07-25 18:56:35');
INSERT INTO `t_req_goods` VALUES ('19', 'PO0000004', '4', '6', '20', 'Ekor', '1500000', 'paid', 'admin', '2017-07-27 03:34:31');

-- ----------------------------
-- Table structure for t_res_production
-- ----------------------------
DROP TABLE IF EXISTS `t_res_production`;
CREATE TABLE `t_res_production` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode_produksi` varchar(100) DEFAULT NULL,
  `id_barang` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `tgl_produksi` varchar(100) DEFAULT NULL,
  `barang_production` varchar(100) DEFAULT NULL,
  `qty_res_production` int(10) DEFAULT NULL,
  `satuan_res_production` varchar(100) DEFAULT NULL,
  `status_res_production` varchar(100) DEFAULT NULL,
  `tgl_expired` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_res_production
-- ----------------------------
INSERT INTO `t_res_production` VALUES ('4', 'KPRD0000001', '3', '16', 'Pcs', '2017-07-24', 'Dada', '8', 'Kg', '1', '2017-07-31');
INSERT INTO `t_res_production` VALUES ('5', 'KPRD0000001', '3', '16', 'Pcs', '2017-07-24', 'BLP ON', '8', 'Kg', '1', '2017-07-31');
INSERT INTO `t_res_production` VALUES ('8', 'KPRD0000001', '3', '16', 'Pcs', '2017-07-24', 'sayap', '8', 'Kg', '1', '2017-07-31');
INSERT INTO `t_res_production` VALUES ('9', 'KPRD0000003', '6', '20', 'Ekor', '2017-07-31', 'Ayam Fillet', '18', 'Kg', '1', '2018-07-31');

-- ----------------------------
-- Table structure for t_using_goods
-- ----------------------------
DROP TABLE IF EXISTS `t_using_goods`;
CREATE TABLE `t_using_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode_produksi` varchar(100) DEFAULT NULL,
  `id_barang` varchar(100) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `tgl_produksi` date DEFAULT NULL,
  `user_insert` varchar(100) DEFAULT NULL,
  `date_insert` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_using_goods
-- ----------------------------
INSERT INTO `t_using_goods` VALUES ('14', 'KPRD0000001', '3', '10', 'Ekor', '2017-07-24', 'admin', '2017-07-25 10:28:53');
INSERT INTO `t_using_goods` VALUES ('15', 'KPRD0000002', '3', '20', 'Ekor', '2017-07-27', 'admin', '2017-07-27 10:28:53');
INSERT INTO `t_using_goods` VALUES ('16', 'KPRD0000003', '6', '20', 'Ekor', '2017-07-31', 'admin', '2017-07-27 03:36:01');
