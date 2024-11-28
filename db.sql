DROP SCHEMA IF EXISTS cunoc;
CREATE SCHEMA cunoc;
USE cunoc;

-- Tabla Carrera
CREATE TABLE Carrera (
    id_carrera INT AUTO_INCREMENT PRIMARY KEY,
    nombre_carrera VARCHAR(100) NOT NULL,
    estado BOOLEAN NOT NULL DEFAULT TRUE
);

-- Tabla Estudiante
CREATE TABLE Estudiante (
    id_estudiante INT NOT NULL PRIMARY KEY,
    primer_nombre VARCHAR(100) NOT NULL,
    segundo_nombre VARCHAR(100),
    primer_apellido VARCHAR(100) NOT NULL,
    segundo_apellido VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefono VARCHAR(15),
    estado BOOLEAN NOT NULL DEFAULT TRUE
);

-- Tabla Estudiante_Carrera
CREATE TABLE estudiante_carrera(
    id_estudiante INT NOT NULL,
    id_carrera INT NOT NULL,
    estado BOOLEAN NOT NULL DEFAULT TRUE,
    FOREIGN KEY (id_estudiante) REFERENCES Estudiante(id_estudiante),
    FOREIGN KEY (id_carrera) REFERENCES Carrera(id_carrera),
    CONSTRAINT pk_estudiante_carrera PRIMARY KEY (id_estudiante, id_carrera)
);

-- Tabla Tesis
CREATE TABLE Tesis (
    id_tesis INT AUTO_INCREMENT PRIMARY KEY,
    tema VARCHAR(255) NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE,
    id_estudiante INT UNIQUE,
    id_asesor INT,
    estado BOOLEAN NOT NULL DEFAULT TRUE
);

-- Tabla Estudiante_Tesis
CREATE TABLE estudiante_tesis (
    id_estudiante INT NOT NULL,
    id_carrera INT NOT NULL,
    id_tesis INT NOT NULL,
    FOREIGN KEY (id_estudiante, id_carrera) 
        REFERENCES estudiante_carrera(id_estudiante, id_carrera),
    FOREIGN KEY (id_tesis) 
        REFERENCES Tesis(id_tesis),
    CONSTRAINT pk_estudiante_tesis PRIMARY KEY (id_estudiante, id_carrera, id_tesis)
);

-- Tabla Asesor
CREATE TABLE Asesor (
    id_asesor INT AUTO_INCREMENT PRIMARY KEY,
    nombre_asesor VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefono VARCHAR(15),
    estado BOOLEAN NOT NULL DEFAULT TRUE
);

CREATE TABLE tesis_asesor(
    id_tesis INT NOT NULL,
    id_asesor INT NOT NULL,
    FOREIGN KEY (id_tesis) REFERENCES Tesis(id_tesis),
    FOREIGN KEY (id_asesor) REFERENCES Asesor(id_asesor),
    CONSTRAINT pk_tesis_asesor PRIMARY KEY (id_tesis,id_asesor)
);

-- Tabla Avance
CREATE TABLE Avance (
    id_avance INT AUTO_INCREMENT PRIMARY KEY,
    id_tesis INT NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_avance DATE NOT NULL,
    estado BOOLEAN NOT NULL DEFAULT TRUE,
    FOREIGN KEY (id_tesis) REFERENCES Tesis(id_tesis)
);

-- Tabla Incidente
CREATE TABLE Incidente (
    id_incidente INT AUTO_INCREMENT PRIMARY KEY,
    id_tesis INT NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_incidente DATE NOT NULL,
    estado BOOLEAN NOT NULL DEFAULT TRUE,
    FOREIGN KEY (id_tesis) REFERENCES Tesis(id_tesis)
);

CREATE TABLE Revision(
    id_revision INT AUTO_INCREMENT PRIMARY KEY,
    id_tesis INT NOT NULL,
    descripcion TEXT NOT NULL,
    fecha DATE NOT NULL,
    estado BOOLEAN NOT NULL DEFAULT TRUE,
    id_asesor INT NOT NULL,
    FOREIGN KEY (id_asesor) REFERENCES Asesor(id_asesor),
    FOREIGN KEY (id_tesis) REFERENCES Tesis(id_)
);


-- Insertar datos en la tabla Carrera
INSERT INTO Carrera (nombre_carrera) VALUES
('Ingeniería en Sistemas'),
('Ingeniería Mecánica'),
('Derecho'),
('Medicina'),
('Arquitectura');
 
-- Insertar datos en la tabla Estudiante
INSERT INTO Estudiante (id_estudiante, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, email, telefono) 
VALUES
(1, 'Yennifer', 'Maria', 'de León', 'Samuc', 'yennifer.leon@example.com', '50212345678'),
(2, 'Fidel', 'Fidencio', 'Balux', 'Conoz', 'fidel.balux@example.com', '50287654321'),
(3, 'Andrea', NULL, 'Ramírez', 'García', 'andrea.ramirez@example.com', '50254321678'),
(4, 'Luis Alberto', NULL, 'Hernández', 'Soto', 'luis.hernandez@example.com', '50276543219'),
(5, 'Karla Paola', NULL, 'Martínez', 'López', 'karla.martinez@example.com', '50267891234');
 
-- Relacionar estudiantes con carreras en la tabla estudiante_carrera
INSERT INTO estudiante_carrera (id_estudiante, id_carrera) VALUES
(1, 1), -- Yennifer Maria - Ingeniería en Sistemas
(2, 2), -- Fidel Fidencio - Ingeniería Mecánica
(3, 3), -- Andrea - Derecho
(4, 5), -- Luis Alberto - Arquitectura
(5, 4); -- Karla Paola - Medicina
 
-- Insertar datos en la tabla Asesor
INSERT INTO Asesor (nombre_asesor, email, telefono) VALUES
('Carlos Pérez', 'carlos.perez@example.com', '50267890123'),
('Marta González', 'marta.gonzalez@example.com', '50289012345'),
('Juan López', 'juan.lopez@example.com', '50256789012');
