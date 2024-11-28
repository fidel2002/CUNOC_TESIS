DROP SCHEMA IF EXIST cunoc;
CREATE SCHEMA cunoc;
USE cunoc;

-- Tabla Carrera
CREATE TABLE Carrera (
    id_carrera INT AUTO_INCREMENT PRIMARY KEY,
    nombre_carrera VARCHAR(100) NOT NULL
);

-- Tabla Estudiante
CREATE TABLE Estudiante (
    id_estudiante INT NOT NULL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefono VARCHAR(15)
);

CREATE TABLE estudiante_carrera(
    id_estudiante INT NOT NULL,
    id_carrera INT NOT NULL,
    FOREIGN KEY (id_estudiante) REFERENCES Estudiante(id_estudiante),
    FOREIGN KEY (id_carrera) REFERENCES Carrera(id_carrera),
    CONSTRAINT pk_estudiante_carrera PRIMARY KEY (id_estudiante,id_carrera)
);

-- Tabla Asesor
CREATE TABLE Asesor (
    id_asesor INT AUTO_INCREMENT PRIMARY KEY,
    nombre_asesor VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefono VARCHAR(15)
);

-- Tabla Tesis
CREATE TABLE Tesis (
    id_tesis INT AUTO_INCREMENT PRIMARY KEY,
    tema VARCHAR(255) NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE,
    id_estudiante INT UNIQUE,
    id_asesor INT,
    FOREIGN KEY (id_estudiante) REFERENCES Estudiante(id_estudiante),
    FOREIGN KEY (id_asesor) REFERENCES Asesor(id_asesor)
);

-- Tabla Avance
CREATE TABLE Avance (
    id_avance INT AUTO_INCREMENT PRIMARY KEY,
    id_tesis INT NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_avance DATE NOT NULL,
    FOREIGN KEY (id_tesis) REFERENCES Tesis(id_tesis)
);

-- Tabla Incidente
CREATE TABLE Incidente (
    id_incidente INT AUTO_INCREMENT PRIMARY KEY,
    id_tesis INT NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_incidente DATE NOT NULL,
    FOREIGN KEY (id_tesis) REFERENCES Tesis(id_tesis)
);

