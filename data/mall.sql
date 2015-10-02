CREATE DATABASE IF NOT EXISTS mall;
USE mall;
-- 创建管理员表
DROP TABLE IF EXISTS admin;
CREATE TABLE admin(
  id TINYINT UNSIGNED AUTO_INCREMENT KEY,
  username VARCHAR(20) NOT NULL UNIQUE ,
  password CHAR(32) NOT NULL ,
  email VARCHAR(50) NOT NULL
);
-- 添加管理员admin密码123
INSERT INTO mall.admin (id, username, password, email) VALUES ('1', 'admin', '202cb962ac59075b964b07152d234b70', 'a@b.cc'),('2', 'test', '202cb962ac59075b964b07152d234b70', 'a@b.cc');

-- 创建商品表
CREATE TABLE IF NOT EXISTS `products` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `sn` varchar(50) NOT NULL,
  `num` smallint(5) unsigned NOT NULL,
  `fillPrice` decimal(10,2) unsigned NOT NULL,
  `nowPrice` decimal(10,2) unsigned NOT NULL,
  `description` mediumtext,
  `publishTime` int(10) DEFAULT NULL,
  `isShow` tinyint(4) NOT NULL DEFAULT '1',
  `isHot` tinyint(4) NOT NULL DEFAULT '0',
  `unitType` smallint(6) NOT NULL DEFAULT '10',
  `weight` smallint(5) unsigned NOT NULL DEFAULT '0',
  `sizeLong` smallint(6) NOT NULL DEFAULT '0',
  `sizeWidth` smallint(6) NOT NULL DEFAULT '0',
  `sizeHeight` smallint(6) NOT NULL DEFAULT '0',
  `sizeUnit` varchar(20) NOT NULL DEFAULT 'cm',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1001 ;

-- 添加商品
INSERT INTO `products` (`id`, `productName`, `brand`, `sn`, `num`, `fillPrice`, `nowPrice`, `description`, `publishTime`, `isShow`, `isHot`, `unitType`, `weight`, `sizeLong`, `sizeWidth`, `sizeHeight`, `sizeUnit`) VALUES
  (1004, 'xxx', 'brand', 'sb110', 999, '1.00', '1.00', 'description', 0, 1, 0, 10, 0, 0, 0, 0, 'cm');

-- 创建用户表
DROP TABLE IF EXISTS user;
CREATE TABLE user  (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(20) NOT NULL,
  password char(32) NOT NULL,
  sex enum('m','f','n') NOT NULL DEFAULT 'n',
  email varchar(50) NOT NULL,
  face varchar(50) NOT NULL,
  regTime int(10) unsigned NOT NULL,
  activeFlag tinyint(1) DEFAULT '0',
  PRIMARY KEY (id),
  UNIQUE KEY username (username)
) ;

-- 添加用户cys密码123
INSERT INTO mall.user VALUES ('1', 'cys', '202cb962ac59075b964b07152d234b70','n', 'a@b.cc','face','0','0');


-- 创建分类表
DROP TABLE IF EXISTS cate;
CREATE TABLE cate (
  id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  cName varchar(50) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY cName (cName)
) ;

-- 添加分类
INSERT INTO mall.cate VALUES ('1','cast_name');