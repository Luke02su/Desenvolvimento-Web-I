CREATE SCHEMA veterinaria;
USE veterinaria;

CREATE TABLE animal (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    tutor VARCHAR(30) NOT NULL
);

SELECT * FROM animal;

-------------------

CREATE SCHEMA agenda;

CREATE TABLE contato (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR (100) NOT NULL,
    email VARCHAR (50) NOT NULL,
    telefone VARCHAR (15) NOT NULL
);

INSERT INTO contato VALUES (null, 'Lucas', 'lucassamuel.ls29@gmail.com', '34 9 99916-6991');
INSERT INTO contato VALUES (null, 'José', 'jose123@gmail.com', '61 9 8221-1812');
INSERT INTO contato VALUES (null, 'Maria', 'marialima90@yahoo.com', '81 9 9982-2312');