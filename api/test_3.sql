CREATE DATABASE perusahaan;
CREATE TABLE karyawans (
  id_karyawan int NOT NULL AUTO_INCREMENT,
  nik varchar(10) NOT NULL,
  nama varchar(100) NOT NULL,
  ttl date NOT NULL,
  alamat text NOT NULL,
  id_jabatan int NOT NULL,
  PRIMARY KEY (id_karyawan),
  UNIQUE (nik)
);
CREATE TABLE jabatans (
  id_jabatan int NOT NULL AUTO_INCREMENT,
  nama_jabatan varchar(100) NOT NULL,
  id_level int NOT NULL,
  PRIMARY KEY (id_jabatan)
);
CREATE TABLE levels (
  id_level int NOT NULL AUTO_INCREMENT,
  nama_level varchar(100) NOT NULL,
  PRIMARY KEY (id_level)
);
CREATE TABLE departments (
  id_dept int NOT NULL AUTO_INCREMENT,
  nama_dept varchar(100) NOT NULL,
  PRIMARY KEY (id_dept)
);


INSERT INTO levels (nama_level) VALUES
('Eksekutif'),
('Middle management'),
('Lower management');

INSERT INTO jabatans (nama_jabatan, id_level) VALUES
('Vice President of HR',1),
('Supervisor',2),
('Project Manager',3);

INSERT INTO karyawans (nik, nama, ttl, alamat, id_jabatan) VALUES
('234522452',	'Anis FRiyanti',	'2024-05-26',	'Pucangro Kalitengah Lamongan',	1),
('563727383',	'Bambang',	'2024-05-26',	'Parungpanjang, BOgor',	2),
('6345242623',	'Fitria Nur',	'2024-05-26',	'Kalitengah, Lamongan',	3);

INSERT INTO departments (nama_dept) VALUES
('Keuangan'),
('Teknologi Informasi'),
('SDM');

SELECT * FROM departments;

SELECT * FROM karyawans;

SELECT * FROM jabatans;

SELECT * FROM levels;

UPDATE karyawans SET nama = 'Anis Friyanti',
ttl = '1994-05-26',
alamat = 'Bogor Jawa Barat'
WHERE id_karyawan = '1';

DELETE FROM karyawans WHERE id_karyawan = '3';
