CREATE DATABASE coche_db;

USE coche_db;

CREATE TABLE coche (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50),
    modelo VARCHAR(50),
    color VARCHAR(50),
    numero_bastidor VARCHAR(50),
    velocidad_actual INT
);
