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

-- Insertar datos en la tabla Tesis
INSERT INTO Tesis (tema, fecha_inicio, fecha_fin, id_estudiante) VALUES
('Desarrollo de una aplicación web', '2023-01-15', '2023-06-30', 1),
('Análisis de maquinaria industrial', '2023-02-01', '2023-07-30', 2),
('Derechos humanos en el contexto actual', '2023-03-10', '2023-08-20', 3),
('Cirugía cardiovascular', '2023-05-05', '2023-11-15', 4),
('Diseño estructural de edificios sostenibles', '2023-04-15', '2023-10-30', 5);

-- Insertar datos en la tabla Estudiante_Tesis
INSERT INTO estudiante_tesis (id_estudiante, id_carrera, id_tesis) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 5, 4),
(5, 4, 5);

-- Insertar datos en la tabla tesis_asesor
INSERT INTO tesis_asesor (id_tesis, id_asesor) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(5, 2);

-- Insertar datos en la tabla Avance
INSERT INTO Avance (id_tesis, descripcion, fecha_avance) VALUES
(1, 'Avance en la estructura de la base de datos', '2023-02-20'),
(2, 'Diseño de planos iniciales de maquinaria', '2023-03-15'),
(3, 'Revisión de artículos sobre derechos humanos', '2023-04-10'),
(4, 'Desarrollo de técnicas mínimamente invasivas', '2023-06-20'),
(5, 'Elección de materiales para la estructura del edificio', '2023-05-25');

-- Insertar datos en la tabla Incidente
INSERT INTO Incidente (id_tesis, descripcion, fecha_incidente) VALUES
(1, 'Problemas con la integración de la base de datos', '2023-03-10'),
(2, 'Retraso en la entrega de componentes mecánicos', '2023-04-05'),
(3, 'Dificultades en la obtención de fuentes de información', '2023-05-15'),
(4, 'Complicaciones en la adquisición de equipo quirúrgico', '2023-07-10'),
(5, 'Problemas con la selección de materiales ecológicos', '2023-06-10');

-- Insertar datos en la tabla Revision
INSERT INTO Revision (id_tesis, descripcion, fecha, id_asesor) VALUES
(1, 'Revisión inicial del desarrollo de la aplicación', '2023-03-01', 1),
(2, 'Revisión de los avances en la maquinaria', '2023-04-05', 2),
(3, 'Revisión de los derechos humanos aplicados a la tesis', '2023-05-20', 3),
(4, 'Revisión del desarrollo de técnicas de cirugía', '2023-07-25', 1),
(5, 'Revisión del diseño estructural', '2023-06-15', 2);
