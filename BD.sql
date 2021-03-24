SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS coepris;
CREATE DATABASE coepris;

DROP TABLE IF EXISTS empleado;
CREATE TABLE empleado(
	id_empleado INT AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(50) NOT NULL,
    apellido_pat varchar(50) NOT NULL,
    apelldio_mat varchar(50) NOT NULL,
    rfc varchar(20),
    email varchar(100),
    telefono varchar(50)
);

DROP TABLE IF EXISTS login;
CREATE TABLE login(
	id_login INT AUTO_INCREMENT PRIMARY KEY,
    usuario varchar(50) NOT NULL unique,
    pass varchar(100) NOT NULL,
    id_empleado INT,
    FOREIGN KEY (id_empleado) REFERENCES empleado(id_empleado)
);

DROP TABLE IF EXISTS fecha_entrada;
CREATE TABLE fecha_entrada(
	id_entrada INT AUTO_INCREMENT PRIMARY KEY,
    fecha_hora timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    id_empleado INT,
    FOREIGN KEY(id_empleado) REFERENCES empleado(id_empleado)
);    

DROP TABLE IF EXISTS fecha_salida;
CREATE TABLE fecha_salida(
	id_salida INT AUTO_INCREMENT PRIMARY KEY,
    fecha_hora timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    id_empleado INT,
    FOREIGN KEY(id_empleado) REFERENCES empleado(id_empleado)
);    
DROP TABLE IF EXISTS proyecto_federal;
CREATE TABLE proyecto_federal(
	id_federal INT AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(10) NOT NULL,
    nombre varchar(100) NOT NULL,
    cantidad double NOT NULL,
    unidad varchar(50),
    cant_unidad varchar(50),
    tipo varchar(50) NOT NULL,
    marca varchar(50),
    descripcion varchar(250),
    fecha_entrada INT,
    fecha_salida INT,
    FOREIGN KEY(fecha_entrada) REFERENCES fecha_entrada(id_entrada),
    FOREIGN KEY(fecha_salida) REFERENCES fecha_salida(id_salida)
);

DROP TABLE IF EXISTS recurso_estado;
CREATE TABLE recurso_estado(
	id_estado INT AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(10) NOT NULL,
    nombre varchar(100) NOT NULL,
    cantidad double NOT NULL,
    unidad varchar(50),
    cant_unidad varchar(50),
    tipo varchar(50) NOT NULL,
    marca varchar(50),
    descripcion varchar(250),
    fecha_entrada INT,
    fecha_salida INT,
    FOREIGN KEY(fecha_entrada) REFERENCES fecha_entrada(id_entrada),
    FOREIGN KEY(fecha_salida) REFERENCES fecha_salida(id_salida)
);

DROP TABLE IF EXISTS papeleria;
CREATE TABLE papeleria(
	id_papeleria INT AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(10) NOT NULL,
    nombre varchar(100) NOT NULL,
    cantidad double NOT NULL,
    unidad varchar(50),
    cant_unidad varchar(50),
    marca varchar(50),
    descripcion varchar(250),
    fecha_entrada INT,
    fecha_salida INT,
    FOREIGN KEY(fecha_entrada) REFERENCES fecha_entrada(id_entrada),
    FOREIGN KEY(fecha_salida) REFERENCES fecha_salida(id_salida)
);

DROP TABLE IF EXISTS donacion;
CREATE TABLE donacion(
	id_donacion INT AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(10) NOT NULL,
    nombre varchar(100) NOT NULL,
    cantidad double NOT NULL,
    unidad varchar(50),
    cant_unidad varchar(50),
    tipo varchar(50) NOT NULL,
    marca varchar(50),
    descripcion varchar(250),
    fecha_entrada INT,
    fecha_salida INT,
    FOREIGN KEY(fecha_entrada) REFERENCES fecha_entrada(id_entrada),
    FOREIGN KEY(fecha_salida) REFERENCES fecha_salida(id_salida)
);

DROP TABLE IF EXISTS activos;
CREATE TABLE activos(
	id_activos INT AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(10) NOT NULL,
    nombre varchar(100) NOT NULL,
    cantidad double NOT NULL,
    unidad varchar(50),
    cant_unidad varchar(50),
    tipo varchar(50) NOT NULL,
    marca varchar(50),
    descripcion varchar(250),
    fecha_entrada INT,
    fecha_salida INT,
    FOREIGN KEY(fecha_entrada) REFERENCES fecha_entrada(id_entrada),
    FOREIGN KEY(fecha_salida) REFERENCES fecha_salida(id_salida)
);

DROP TABLE IF EXISTS archivo;
CREATE TABLE archivo(
	id_archivo INT AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(10) NOT NULL,
    nombre varchar(100) NOT NULL,
    categoria varchar(100),
    descripcion varchar(250),
    fecha_entrada INT,
    fecha_salida INT,
    FOREIGN KEY(fecha_entrada) REFERENCES fecha_entrada(id_entrada),
    FOREIGN KEY(fecha_salida) REFERENCES fecha_salida(id_salida)
);

DROP TABLE IF EXISTS limpieza;
CREATE TABLE limpieza(
	id_limpieza INT AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(10) NOT NULL,
    nombre varchar(100) NOT NULL,
    cantidad double NOT NULL,
    unidad varchar(50),
    cant_unidad varchar(50),
    tipo varchar(50) NOT NULL,
    marca varchar(50),
    descripcion varchar(250),
    fecha_entrada INT,
    fecha_salida INT,
    FOREIGN KEY(fecha_entrada) REFERENCES fecha_entrada(id_entrada),
    FOREIGN KEY(fecha_salida) REFERENCES fecha_salida(id_salida)
);

DROP TABLE IF EXISTS logos;
CREATE TABLE logos(
	id_logo INT AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(200) NOT NULL
);






