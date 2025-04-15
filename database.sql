CREATE DATABASE labs;

CREATE TABLE users
(
	id         INT AUTO_INCREMENT PRIMARY KEY,
	email      VARCHAR(50)  NOT NULL UNIQUE,
	password   VARCHAR(255) NOT NULL,
	name       VARCHAR(100),
	nim        VARCHAR(20)  NULL,
	role       ENUM ('mahasiswa', 'admin') DEFAULT 'mahasiswa',
	created_at DATETIME                    DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (email, password, name, role)
values ('admin@labs.com', '$2y$10$4XSbMQs0KGEwBCn7wN/9Y.p5S5vJDTYUFrZNpFp7ffGiNmfqfA.pu', 'admin', 'admin');

# login
# email = admin@labs.com | password = password

CREATE TABLE alat
(
	id         INT AUTO_INCREMENT PRIMARY KEY,
	nama_alat  VARCHAR(100) NOT NULL,
	deskripsi  TEXT,
	stok       INT      DEFAULT 0,
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE booking
(
	id         INT AUTO_INCREMENT PRIMARY KEY,
	user_id    INT,
	alat_id    INT,
	tanggal    DATE NOT NULL,
	status     ENUM ('pending', 'disetujui', 'ditolak') DEFAULT 'pending',
	keterangan TEXT,
	created_at DATETIME                                 DEFAULT CURRENT_TIMESTAMP,

	FOREIGN KEY (user_id) REFERENCES users (id),
	FOREIGN KEY (alat_id) REFERENCES alat (id)
);
