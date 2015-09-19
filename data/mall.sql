CREATE DATABASE IF NOT EXISTS mall;
USE mall;
-- 管理员表
DROP TABLE IF EXISTS admin;
CREATE TABLE admin(
  id TINYINT UNSIGNED AUTO_INCREMENT KEY,
  username VARCHAR(20) NOT NULL UNIQUE ,
  password CHAR(32) NOT NULL ,
  email VARCHAR(50) NOT NULL
);
-- 添加管理员admin密码123
INSERT INTO `mall`.`admin` (`id`, `username`, `password`, `email`) VALUES ('1', 'admin', '202cb962ac59075b964b07152d234b70', 'a@b.c');