CREATE DATABASE login_pdo;

use login_pdo;

CREATE TABLE usuarios (
	id INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(50),
	senha VARCHAR(255)
);

CREATE TABLE livro (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255),
    donoId INT,
    CONSTRAINT fk_livro_usuario
        FOREIGN KEY (donoId)
        REFERENCES usuarios(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);


SELECT * FROM livro;
SELECT * FROM usuarios;
SELECT * FROM livro WHERE donoId = 2;

INSERT INTO livro (nome, donoId) VALUES ("Dominando Android", 1);
INSERT INTO usuarios (usuarios, senha) VALUES ("Edson", "2026123")