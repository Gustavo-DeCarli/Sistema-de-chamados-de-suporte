CREATE DATABASE teste;

USE teste;

CREATE TABLE chamados(
    ID INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    setor VARCHAR(100) NOT NULL,
    status VARCHAR(100) NOT NULL,
    problema VARCHAR(100) NOT NULL,
    descricao VARCHAR(400) NOT NULL,
    atendente VARCHAR(100) NULL,
    conclusao VARCHAR(400) NULL,
    previsao DATE NULL,
    data DATETIME NULL,
    PRIMARY KEY(ID)
)
