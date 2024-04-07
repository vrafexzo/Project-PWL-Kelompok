CREATE Database dbTugasBesarPWL;
USE dbTugasBesarPWL;

CREATE TABLE users (
id_user varchar(16) Not NUll,
nama_user varchar(100) Not Null,
passwords varchar(100) not null,
PRIMARY KEY (id_user));


CREATE TABLE polling (
id_polling varchar(16) NOT NULL,
nama_polling varchar(50) NOT NULL,
tanggal_mulai DATETIME NOt NULL,
tanggal_selesai DATETIME NOT NULL,
PRIMARY KEY (id_polling));


CREATE TABLE mata_kuliah (
id_mk varchar(16) NOT NULL,
nama_mk varchar(50) NOT NULL,
SKS INT not Null,
PRIMARY KEY (id_mk));


CREATE TABLE role (
id_role varchar(16) NOT NULL,
nama_role varchar(16) NOT NULL,
PRIMARY KEY (id_role));


CREATE TABLE kurikulum (
id_kurikulum varchar(16) NOT NULL,
nama_kurikulum varchar(50) NOT NULL,
PRIMARY KEY (id_kurikulum) );


CREATE TABLE polling_detail (
id_polling_detail varchar(16) NOT NULL PRIMARY KEY,
id_user varchar(16) NOT NULL,
id_mk varchar(16) NOT NULL,
id_polling varchar(16) NOT NULL,
FOREIGN KEY (id_user) REFERENCES users(id_user),
FOREIGN KEY (id_mk) REFERENCES mata_kuliah(id_mk),
FOREIGN KEY (id_polling) REFERENCES polling(id_polling));

ALTER TABLE role
ADD id_user varchar(16) NOT NULL;

ALTER TABLE users
ADD id_polling_detail varchar(16) NOT NULL;

ALTER TABLE polling
ADD id_polling_detail varchar(16) NOT NULL;

ALTER TABLE mata_kuliah
ADD id_polling_detail varchar(16) NOT NULL;

ALTER TABLE role
ADD FOREIGN KEY (id_user) REFERENCES users(id_user);

ALTER TABLE users
ADD FOREIGN KEY (id_polling_detail) REFERENCES polling_detail(id_polling_detail);

ALTER TABLE polling
ADD FOREIGN KEY (id_polling_detail) REFERENCES polling_detail(id_polling_detail);

ALTER TABLE mata_kuliah
ADD FOREIGN KEY (id_polling_detail) REFERENCES polling_detail(id_polling_detail);

ALTER TABLE kurikulum
ADD FOREIGN KEY (id_mk) REFERENCES mata_kuliah(id_mk);



