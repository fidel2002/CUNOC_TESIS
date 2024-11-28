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

-- Insertar datos en la tabla Carrera
INSERT INTO Carrera (nombre_carrera) VALUES
('Ingeniería en Sistemas'),
('Ingeniería Mecánica'),
('Derecho'),
('Medicina'),
('Arquitectura');
 
-- Insertar datos en la tabla Estudiante
INSERT INTO Estudiante (id_estudiante, nombre, apellido, email, telefono) VALUES
(1, 'Yennifer Maria', 'de León Samuc', 'yennifer.leon@example.com', '50212345678'),
(2, 'Fidel Fidencio', 'Balux Conoz', 'fidel.balux@example.com', '50287654321'),
(3, 'Andrea', 'Ramírez García', 'andrea.ramirez@example.com', '50254321678'),
(4, 'Luis Alberto', 'Hernández Soto', 'luis.hernandez@example.com', '50276543219'),
(5, 'Karla Paola', 'Martínez López', 'karla.martinez@example.com', '50267891234');
 
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
 
-- Insertar datos en la tabla Tesis
INSERT INTO Tesis (tema, fecha_inicio, fecha_fin, id_estudiante, id_asesor) VALUES
('Desarrollo de un sistema de gestión universitaria', '2024-01-15', NULL, 1, 1), -- Yennifer Maria
('Optimización de motores eléctricos industriales', '2024-03-01', NULL, 2, 2), -- Fidel Fidencio
('Análisis de jurisprudencia en casos civiles', '2024-02-20', NULL, 3, 3);
 
-- Insertar datos en la tabla Avance
INSERT INTO Avance (id_tesis, descripcion, fecha_avance) VALUES
(1, 'Elaboración del marco teórico', '2024-02-15'),
(1, 'Diseño del modelo conceptual', '2024-03-15'),
(2, 'Pruebas de rendimiento en motores eléctricos', '2024-04-10'),
(3, 'Revisión bibliográfica inicial', '2024-02-28');
 
-- Insertar datos en la tabla Incidente
INSERT INTO Incidente (id_tesis, descripcion, fecha_incidente) VALUES
(1, 'Fallo en la recopilación de datos por falta de software', '2024-03-01'),
(2, 'Retraso en la entrega de componentes para pruebas', '2024-04-01');