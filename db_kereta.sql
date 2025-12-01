CREATE DATABASE IF NOT EXISTS db_kereta;
USE db_kereta;

CREATE TABLE depo_induk (
    id_depo INT AUTO_INCREMENT PRIMARY KEY,
    nama_depo VARCHAR(50),
    kode_wilayah VARCHAR(10)
);

CREATE TABLE lokomotif (
    id_loko INT AUTO_INCREMENT PRIMARY KEY,
    kode_loko VARCHAR(20),
    status_mesin ENUM('Siap', 'Perbaikan', 'Cadangan'),
    id_depo INT,
    FOREIGN KEY (id_depo) REFERENCES depo_induk(id_depo) ON DELETE CASCADE
);

CREATE TABLE gerbong (
    id_gerbong INT AUTO_INCREMENT PRIMARY KEY,
    nomor_seri VARCHAR(20),
    jenis ENUM('Ekonomi', 'Eksekutif', 'Priority', 'Luxury', 'Kereta Makan', 'Pembangkit'),
    id_depo INT,
    FOREIGN KEY (id_depo) REFERENCES depo_induk(id_depo) ON DELETE CASCADE
);

CREATE TABLE rangkaian (
    id_rangkaian INT AUTO_INCREMENT PRIMARY KEY,
    nama_ka VARCHAR(50),
    rute VARCHAR(50),
    tanggal_dinas DATE,
    id_loko INT,
    FOREIGN KEY (id_loko) REFERENCES lokomotif(id_loko) ON DELETE CASCADE
);

CREATE TABLE detail_rangkaian (
    id_detail INT AUTO_INCREMENT PRIMARY KEY,
    id_rangkaian INT,
    id_gerbong INT,
    urutan_gerbong INT,
    FOREIGN KEY (id_rangkaian) REFERENCES rangkaian(id_rangkaian) ON DELETE CASCADE,
    FOREIGN KEY (id_gerbong) REFERENCES gerbong(id_gerbong) ON DELETE CASCADE
);



INSERT INTO depo_induk (nama_depo, kode_wilayah) VALUES 
('Depo Jakarta Kota', 'DAOP 1'),  
('Depo Cipinang', 'DAOP 1'),
('Depo Bandung', 'DAOP 2'), 
('Depo Cirebon', 'DAOP 3'),  
('Depo Semarang Poncol', 'DAOP 4'),  
('Depo Purwokerto', 'DAOP 5'),
('Depo Solo Balapan', 'DAOP 6'),  
('Depo Yogyakarta', 'DAOP 6'),
('Depo Madiun', 'DAOP 7'),
('Depo Sidotopo', 'DAOP 8'),
('Depo Blitar', 'DAOP 8'),
('Depo Malang', 'DAOP 8');   


INSERT INTO lokomotif (kode_loko, status_mesin, id_depo) VALUES 
('CC 201 83 25', 'Siap', 3),
('CC 201 83 16', 'Siap', 3),
('CC 206 13 35', 'Siap', 10),
('CC 206 13 99', 'Siap', 3),
('CC 206 13 98', 'Perbaikan', 3),
('CC 206 13 100', 'Siap', 3),
('CC 206 13 37', 'Siap', 10),
('CC 203 95 04', 'Perbaikan', 3),
('CC 203 95 05', 'Siap', 3),
('CC 203 95 06', 'Siap', 3),
('CC 203 95 07', 'Siap', 6),
('CC 203 95 08', 'Siap', 2),
('CC 203 95 09', 'Siap', 6);

INSERT INTO gerbong (nomor_seri, jenis, id_depo) VALUES 
-- Duksar Gajayana
('K1 0 18 51', 'Eksekutif', 12), 
('K1 0 18 53', 'Eksekutif', 12),
('K1 0 18 55', 'Eksekutif', 12),
('K1 0 18 57', 'Eksekutif', 12),
('M1 0 19 01', 'Kereta Makan', 12),
('K1 0 18 51', 'Eksekutif', 12), 
('K1 0 18 53', 'Eksekutif', 12),
('K1 0 18 55', 'Eksekutif', 12),
('K1 0 18 57', 'Eksekutif', 12),
('P 0 09 02', 'Pembangkit', 12),

-- Parahyangan
('K1 0 19 11', 'Eksekutif', 3), 
('K1 0 18 101', 'Eksekutif', 3),
('K1 0 18 121', 'Eksekutif', 3),
('K1 0 19 17', 'Eksekutif', 3),
('M1 0 19 05', 'Kereta Makan', 3),
('K3 0 18 123', 'Ekonomi', 3),
('K3 0 18 125', 'Ekonomi', 3),
('K3 0 18 101', 'Ekonomi', 3),
('K3 0 18 67', 'Ekonomi', 3),
('P 0 18 10', 'Pembangkit', 3),

-- Lodaya 
('K1 0 25 18', 'Eksekutif', 7),
('K1 0 25 20', 'Eksekutif', 7),
('K1 0 25 21', 'Eksekutif', 7),
('K1 0 25 19', 'Eksekutif', 7),
('M1 0 25 01', 'Kereta Makan', 7),
('K3 0 25 31', 'Ekonomi', 7),
('K3 0 25 33', 'Ekonomi', 7),
('K3 0 25 35', 'Ekonomi', 7),
('K3 0 25 37', 'Ekonomi', 7),
('P 0 25 05', 'Pembangkit', 7),

-- Matarmaja
('K3 0 14 51', 'Ekonomi', 12),
('K3 0 14 53', 'Ekonomi', 12),
('K3 0 14 55', 'Ekonomi', 12),
('K3 0 14 57', 'Ekonomi', 12),
('M1 0 14 01', 'Kereta Makan', 12),
('K3 0 14 51', 'Ekonomi', 12),
('K3 0 14 53', 'Ekonomi', 12),
('K3 0 14 55', 'Ekonomi', 12),
('K3 0 14 57', 'Ekonomi', 12),
('P 0 14 02', 'Pembangkit', 12);


INSERT INTO rangkaian (nama_ka, rute, tanggal_dinas, id_loko) VALUES 
('Gajayana', 'Gambir - Malang', '2025-12-03', 6),
('Parahyangan', 'Gambir - Bandung', '2025-12-03', 4),
('Lodaya', 'Yogyakarta - Bandung', '2025-12-03', 7);

INSERT INTO detail_rangkaian (id_rangkaian, id_gerbong, urutan_gerbong) VALUES 
-- Rangkaian Gajayana
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(1, 4, 4),
(1, 5, 5),
(1, 6, 6),
(1, 7, 7),
(1, 8, 8),
(1, 9, 9),
(1, 10, 10),

-- Rangkaian Parahyangan
(2, 11, 1),
(2, 12, 2),
(2, 13, 3),
(2, 14, 4),
(2, 15, 5),
(2, 16, 6),
(2, 17, 7),
(2, 18, 8),
(2, 19, 9),
(2, 20, 10),

-- Rangkaian Lodaya
(3, 21, 1),
(3, 22, 2),
(3, 23, 3),
(3, 24, 4),
(3, 25, 5),
(3, 26, 6),
(3, 27, 7),
(3, 28, 8),
(3, 29, 9),
(3, 30, 10);
