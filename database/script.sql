CREATE DATABASE crud;
USE crud;
CREATE TABLE cadastro (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    nascimento DATE NOT NULL,
    ano_curso VARCHAR(4) NOT NULL,
    materia_preferida VARCHAR(100) NOT NULL
);