CREATE DATABASE teste;

USE teste;

CREATE TABLE chamados(
    ID INT NOT NULL AUTO_INCREMENT,
    userid INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    setor VARCHAR(100) NOT NULL,
    status VARCHAR(100) NOT NULL,
    problema VARCHAR(100) NOT NULL,
    descricao VARCHAR(400) NOT NULL,
    atendente VARCHAR(100),
    conclusao VARCHAR(400),
    previsao DATE,
    data DATETIME NOT NULL,
    PRIMARY KEY(ID)
)

