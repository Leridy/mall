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
DROP TABLE IF EXISTS products;
CREATE TABLE products (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  sn varchar(50) NOT NULL,
  num int(10) unsigned DEFAULT '1',
  mPrice decimal(10,2) NOT NULL,
  iPrice decimal(10,2) NOT NULL,
  desciption text,
  pubTime int(10) unsigned NOT NULL,
  isShow tinyint(1) DEFAULT '1',
  isHot tinyint(1) DEFAULT '0',
  cId smallint(5) unsigned NOT NULL,
  PRIMARY KEY (id)
) ;

-- 添加商品
INSERT INTO mall.products VALUES ('1','product name','0000011111','10','100.00','50.00','product description','2015-09-22 16:02:35','1','1','1');

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