-- Eliminamos las tablas si existen
DROP TABLE IF EXISTS generos, subgeneros, usuarios, credenciales, peliculas, series, capitulos, capitulo_genero, proveedores_series, proveedores_peli, sub_activa, sub_cancelada, pago_sub, proveedor_pelis_extra, pago_peli, visualizacion_pelis, detalle_sub, detalle_peli, visualizacion_series CASCADE;
-- Creamos las tablas
CREATE TABLE generos (
    genero VARCHAR(80) NOT NULL PRIMARY KEY
);

CREATE TABLE subgeneros (
    genero VARCHAR(80) NOT NULL,
    subgenero VARCHAR(80) NOT NULL,
    FOREIGN KEY (genero) REFERENCES public.generos(genero) ON DELETE CASCADE
);

CREATE TABLE usuarios (
    id INT NOT NULL PRIMARY KEY,
    username VARCHAR(100) NOT NULL
);

CREATE TABLE credenciales (
    id_usuario INT NOT NULL,
    mail VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    nombre VARCHAR(200) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id) ON DELETE CASCADE
);

CREATE TABLE peliculas (
    id INT NOT NULL PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL UNIQUE,
    duracion INT NOT NULL,
    clasificacion VARCHAR(20) NOT NULL,
    puntuacion FLOAT NOT NULL,
    year INT NOT NULL,
    genero VARCHAR(80) NOT NULL,
    FOREIGN KEY (genero) REFERENCES public.generos(genero) ON DELETE CASCADE
);

CREATE TABLE series (
    id INT NOT NULL PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL UNIQUE,
    clasificacion VARCHAR(20) NOT NULL,
    puntuacion FLOAT NOT NULL,
    year INT NOT NULL
);

CREATE TABLE capitulos (
    id INT NOT NULL PRIMARY KEY,
    id_serie INT NOT NULL,
    titulo VARCHAR(200) NOT NULL,
    duracion INT NOT NULL,
    numero INT NOT NULL,
    FOREIGN KEY (id_serie) REFERENCES public.series(id) ON DELETE CASCADE
);

CREATE TABLE capitulo_genero (
    id_capitulo INT NOT NULL,
    genero VARCHAR(80) NOT NULL,
    FOREIGN KEY (id_capitulo) REFERENCES public.capitulos(id) ON DELETE CASCADE,
    FOREIGN KEY (genero) REFERENCES public.generos(genero) ON DELETE CASCADE
);

CREATE TABLE proveedores_series (
    id INT NOT NULL PRIMARY KEY,
    nombre VARCHAR(80) NOT NULL,
    costo INT NOT NULL,
    id_serie INT NOT NULL,
    FOREIGN KEY (id_serie) REFERENCES public.series(id) ON DELETE CASCADE
);

CREATE TABLE proveedores_peli (
    id INT NOT NULL PRIMARY KEY,
    nombre VARCHAR(80),
    costo INT NOT NULL,
    id_pelicula INT NOT NULL,
    FOREIGN KEY (id_pelicula) REFERENCES public.peliculas(id) ON DELETE CASCADE
);

CREATE TABLE sub_activa (
    id INT NOT NULL PRIMARY KEY,
    estado VARCHAR(50) NOT NULL,
    fecha_inicio DATE NOT NULL,
    id_proveedor INT NOT NULL,
    id_usuario INT NOT NULL,
    fecha_termino DATE NOT NULL,
    proveedor VARCHAR(80) NOT NULL,
    costo INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id) ON DELETE CASCADE
);

CREATE TABLE sub_cancelada (
    id INT NOT NULL PRIMARY KEY,
    estado VARCHAR(50) NOT NULL,
    fecha_inicio DATE NOT NULL,
    id_proveedor INT NOT NULL,
    id_usuario INT NOT NULL,
    fecha_termino DATE NOT NULL,
    proveedor VARCHAR(80) NOT NULL,
    costo INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id) ON DELETE CASCADE
);

CREATE TABLE pago_sub (
    id INT NOT NULL PRIMARY KEY,
    monto INT NOT NULL,
    fecha DATE NOT NULL,
    id_usuario INT NOT NULL,
    id_sub INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id) ON DELETE CASCADE
);

CREATE TABLE proveedor_pelis_extra (
    id INT NOT NULL PRIMARY KEY,
    nombre VARCHAR(80) NOT NULL,
    costo INT NOT NULL,
    id_pelicula INT NOT NULL,
    precio INT NOT NULL,
    disponibilidad INT NOT NULL,
    FOREIGN KEY (id_pelicula) REFERENCES public.peliculas(id) ON DELETE CASCADE
);

CREATE TABLE pago_peli (
    id INT NOT NULL PRIMARY KEY,
    monto INT NOT NULL,
    fecha DATE NOT NULL,
    id_usuario INT NOT NULL,
    id_pelicula INT NOT NULL,
    id_proveedor INT NOT NULL,
    FOREIGN KEY (id_pelicula) REFERENCES public.peliculas(id) ON DELETE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id) ON DELETE CASCADE
);

CREATE TABLE detalle_sub(
    id INT NOT NULL PRIMARY KEY,
    fecha DATE NOT NULL,
    id_sub INT NOT NULL,
    FOREIGN KEY (id_sub) REFERENCES public.sub_activa(id) ON DELETE CASCADE
);

CREATE TABLE detalle_peli(
    id INT NOT NULL PRIMARY KEY,
    fecha DATE NOT NULL,
    id_usuario INT NOT NULL,
    id_pelicula INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (id_pelicula) REFERENCES public.peliculas(id) ON DELETE CASCADE
);

CREATE TABLE visualizacion_pelis(
    id_usuario INT NOT NULL,
    id_pelicula INT NOT NULL,
    fecha DATE NOT NULL,
    FOREIGN KEY (id_pelicula) REFERENCES public.peliculas(id) ON DELETE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id) ON DELETE CASCADE
);

CREATE TABLE visualizacion_series(
    id_usuario INT NOT NULL,
    id_serie INT NOT NULL,
    fecha DATE NOT NULL
);