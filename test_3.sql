CREATE DATABASE perusahaan;
CREATE TABLE karyawans (
  id_karyawan int NOT NULL AUTO_INCREMENT,
  nik varchar(10) NOT NULL,
  nama varchar(100) NOT NULL,
  ttl date NOT NULL,
  alamat text NOT NULL,
  id_jabatan int NOT NULL,
  created_at timestamp NOT NULL,
  updated_at timestamp NOT NULL,
  PRIMARY KEY (id_karyawan),
  UNIQUE (nik)
);
CREATE TABLE jabatans (
  id_jabatan int NOT NULL AUTO_INCREMENT,
  nama_jabatan varchar(100) NOT NULL,
  id_level int NOT NULL,
  created_at timestamp NOT NULL,
  updated_at timestamp NOT NULL,
  PRIMARY KEY (id_jabatan)
);
CREATE TABLE levels (
  id_level int NOT NULL AUTO_INCREMENT,
  nama_level varchar(100) NOT NULL,
  created_at timestamp NOT NULL,
  updated_at timestamp NOT NULL,
  PRIMARY KEY (id_level)
);
CREATE TABLE departments (
  id_dept int NOT NULL AUTO_INCREMENT,
  nama_dept varchar(100) NOT NULL,
  created_at timestamp NOT NULL,
  updated_at timestamp NOT NULL,
  PRIMARY KEY (id_dept)
);


INSERT INTO levels (nama_level,created_at,updated_at) VALUES
('Eksekutif','2024-05-28 00:47:18	','2024-05-28 00:47:18	'),
('Middle management','2024-05-28 00:47:18	','2024-05-28 00:47:18	'),
('Lower management','2024-05-28 00:47:18	','2024-05-28 00:47:18	');

INSERT INTO jabatans (nama_jabatan, id_level,created_at,updated_at) VALUES
('Vice President of HR',1,'2024-05-28 00:47:18	','2024-05-28 00:47:18	'),
('Supervisor',2,'2024-05-28 00:47:18	','2024-05-28 00:47:18	'),
('Project Manager',3,'2024-05-28 00:47:18	','2024-05-28 00:47:18	');

INSERT INTO karyawans (nik, nama, ttl, alamat, id_jabatan,created_at,updated_at) VALUES
('234522452',	'Anis FRiyanti',	'2024-05-26',	'Pucangro Kalitengah Lamongan',	1,'2024-05-28 00:47:18	','2024-05-28 00:47:18	'),
('563727383',	'Bambang',	'2024-05-26',	'Parungpanjang, BOgor',	2,'2024-05-28 00:47:18	','2024-05-28 00:47:18	'),
('6345242623',	'Fitria Nur',	'2024-05-26',	'Kalitengah, Lamongan',	3,'2024-05-28 00:47:18	','2024-05-28 00:47:18	');

INSERT INTO departments (nama_dept,created_at,updated_at) VALUES
('Keuangan','2024-05-28 00:47:18	','2024-05-28 00:47:18	'),
('Teknologi Informasi','2024-05-28 00:47:18	','2024-05-28 00:47:18	'),
('SDM','2024-05-28 00:47:18	','2024-05-28 00:47:18	');

SELECT * FROM departments;

SELECT * FROM karyawans;

SELECT * FROM jabatans;

SELECT * FROM levels;

SELECT a.*,b.nama_jabatan
FROM karyawans as a
LEFT JOIN jabatans as b
ON a.id_jabatan = b.id_jabatan;

SELECT a.*,b.nama_level
FROM jabatans as a
LEFT JOIN levels as b
ON a.id_level = b.id_level;

UPDATE karyawans SET nama = 'Anis Friyanti',
ttl = '1994-05-26',
alamat = 'Bogor Jawa Barat'
WHERE id_karyawan = '1';

DELETE FROM karyawans WHERE id_karyawan = '3';
