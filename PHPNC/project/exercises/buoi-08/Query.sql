CREATE DATABASE ql_mon_an;
USE ql_mon_an;
CREATE TABLE loai_mon(
id INT(11) PRIMARY KEY AUTO_INCREMENT,
ten_loai_mon VARCHAR(50)
);
CREATE TABLE mon_an(
id INT(11) PRIMARY KEY AUTO_INCREMENT,
id_loai_mon INT(11),
ten_mon_an VARCHAR(50),
cach_che_bien TEXT,
hinh VARCHAR(20)
);
INSERT INTO loai_mon(id,ten_loai_mon)
VALUES 
(1,"Chiên"),
(2,"Xào"),
(3,"Nấu"),
(4,"Nướng"),
(5,"Hấp")