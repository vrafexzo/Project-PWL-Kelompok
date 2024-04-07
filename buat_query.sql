CREATE Database dbTugasBesarPWL;
USE dbTugasBesarPWL;

CREATE TABLE user (
id_user varchar(16) Not NUll,
nama_user varchar(100) Not Null,
password varchar(100) not null,
PRIMARY KEY (id_user));
-- Query OK, 0 rows affected (0.033 sec)

CREATE TABLE polling (
id_polling varchar(16) NOT NULL,
nama_polling varchar(50) NOT NULL,
tanggal_mulai DATETIME NOt NULL,
tanggal_selesai DATETIME NOT NULL,
PRIMARY KEY (id_polling));
-- Query OK, 0 rows affected (0.027 sec)

CREATE TABLE mata_kuliah (
id_mk varchar(16) NOT NULL,
nama_mk varchar(50) NOT NULL,
SKS INT not Null,
PRIMARY KEY (id_mk));
-- Query OK, 0 rows affected (0.032 sec)

CREATE TABLE role (
id_role varchar(16) NOT NULL,
nama_role varchar(16) NOT NULL,
PRIMARY KEY (id_role));
-- Query OK, 0 rows affected (0.030 sec)

CREATE TABLE kurikulum (
id_kurikulum varchar(16) NOT NULL,
nama_kurikulum varchar(50) NOT NULL,
PRIMARY KEY (id_kurikulum) );
-- Query OK, 0 rows affected (0.032 sec)

CREATE TABLE polling_detail (
id_polling_detail varchar(16) NOT NULL PRIMARY KEY,
id_user varchar(16) NOT NULL,
id_mk varchar(16) NOT NULL,
id_polling varchar(16) NOT NULL,
FOREIGN KEY (id_user) REFERENCES user(id_user),
FOREIGN KEY (id_mk) REFERENCES mata_kuliah(id_mk),
FOREIGN KEY (id_polling) REFERENCES polling(id_polling));
-- Query OK, 0 rows affected (0.033 sec)