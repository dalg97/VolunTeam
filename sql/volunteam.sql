CREATE DATABASE IF NOT EXISTS volunteam;
USE volunteam;

CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50),
    direccion_usuario VARCHAR(255),
    edad INT,
    correo VARCHAR(50),
    passwd VARCHAR(255),
    intereses VARCHAR(255),
    experiencia VARCHAR(255)
);

CREATE TABLE evento (
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    nombre_evento VARCHAR(50),
    descripcion_evento VARCHAR(255),
    fecha_evento DATE,
    hora_evento TIME,
    lugar_evento VARCHAR(50),
    cupos INT,
    imagen_evento VARCHAR(255)
    destacado BOOLEAN DEFAULT FALSE;
);

CREATE TABLE contacto (
    id_mensaje INT AUTO_INCREMENT PRIMARY KEY,
    nombre_mensaje VARCHAR(50),
    correo_mensaje VARCHAR(100),
    mensaje VARCHAR(255)
);

CREATE TABLE impacto (
    usuarios_activos INT,
    cantidad_eventos INT
);

CREATE TABLE usuario_evento (
    id_usuario INT,
    id_evento INT,
    PRIMARY KEY (id_usuario, id_evento),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_evento) REFERENCES evento(id_evento)
);

CREATE USER 'volunt_user'@'%' IDENTIFIED BY 'jdu2352h';
GRANT ALL PRIVILEGES ON volunteam.* TO 'volunt_user'@'%';
FLUSH PRIVILEGES;

######Insercion de datos#######
INSERT INTO `evento` (`id_evento`, `nombre_evento`, `descripcion_evento`, `fecha_evento`, `hora_evento`, `lugar_evento`, `cupos`, `imagen_evento`,`destacado`) VALUES
(1, 'Recolección de Residuos - Playa Hermosa', 'Únete a mejorar nuestras playas.', '2025-08-24', '08:30:00', 'Puntarenas', 20, 'img/voluntariado1.jpg',FALSE),
(2, 'Festival de Lectura Infantil', 'Fomenta la lectura con niños de comunidades vulnerables.', '2025-09-02', '09:30:00', 'Biblioteca de Alajuela', 10, 'img/voluntariado2.webp',FALSE),
(3, 'Apoyo a adultos mayores', 'Jornadas de acompañamiento y recreación.', '2025-09-15', '10:00:00', 'Heredia', 8, 'img/voluntariado4.jpg',FALSE),
(4, 'Restauración de Libros', 'Te invitamos a participar en nuestra jornada de restauración de libros en la biblioteca.', '2025-08-28', '09:00:00', 'Biblioteca Municipal de Pérez Zeledón', 11, 'img/voluntariado11.jpg',FALSE),
(5, 'Colores que Unen - Arte Comunitario', 'Aporta tu creatividad pintando murales o decorando espacios comunitarios', '2025-08-16', '08:00:00', 'Plaza de la cultura, San José', 8, 'img/voluntariado12.jpg',FALSE),
(6, 'Aliados del Rescate - Zoo Ave', 'Sé parte del esfuerzo por proteger la fauna silvestre de Costa Rica.', '2025-09-02', '07:00:00', 'ZooAve, La Garita', 15, 'img/voluntariado13.png',FALSE),
(7, 'Reforestación en Cartago', 'Únete a nuestra jornada de siembra en el Parque Nacional Irazú.', '2025-08-12', '09:00:00', 'Parque Nacional Irazú', 25, 'img/reforestacion.jpg',TRUE),
(8, 'Clínica móvil en Limón', 'Apoyo médico para comunidades rurales con voluntarios especializados.', '2025-08-20', '10:00:00', 'Limón centro', 15, 'img/clinica-movil.jpg',TRUE),
(9, 'Taller de arte infantil - San José', 'Actividades educativas y recreativas para niños en riesgo social.', '2025-09-01', '14:00:00', 'Barrio Cuba, San José', 12, 'img/taller-infantil.jpg',TRUE);