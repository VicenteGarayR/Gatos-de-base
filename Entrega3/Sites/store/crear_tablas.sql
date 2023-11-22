-- Eliminamos las tablas si existen ---
DROP TABLE IF EXISTS genero;
DROP TABLE IF EXISTS subgenero;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS credenciales;
DROP TABLE IF EXISTS peliculas;
DROP TABLE IF EXISTS series;
DROP TABLE IF EXISTS capitulos;
DROP TABLE IF EXISTS capitulo_genero;
DROP TABLE IF EXISTS proveedores_series;
DROP TABLE IF EXISTS proveedores_peli;
DROP TABLE IF EXISTS sub_activa;
DROP TABLE IF EXISTS sub_cancelada;
DROP TABLE IF EXISTS pago_sub;
DROP TABLE IF EXISTS proveedor_extra;
DROP TABLE IF EXISTS pago_peli;
DROP TABLE IF EXISTS visualizacion_peli;
DROP TABLE IF EXISTS visualizacion_serie;

-- Creamos las tablas ---
CREATE TABLE genero( 
    genero VARCHAR(80) NOT NULL PRIMARY KEY 
); 

CREATE TABLE subgenero( 
    genero VARCHAR(80) NOT NULL, 
    subgenero VARCHAR(80) NOT NULL, 
    FOREIGN KEY (genero) REFERENCES public.genero(genero) 
); 

CREATE TABLE usuarios( 
    id INT NOT NULL PRIMARY KEY, 
    username VARCHAR(100) NOT NULL 
);

CREATE TABLE credenciales( 
    id_usuario INT NOT NULL, 
    mail VARCHAR(100) UNIQUE  NOT NULL, 
    password VARCHAR(100)  NOT NULL, 
    nombre VARCHAR(200) NOT NULL, 
    fecha_nacimiento DATE NOT NULL, 
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id) 
);

CREATE TABLE peliculas( 
    id INT NOT NULL PRIMARY KEY, 
    titulo VARCHAR(100) NOT NULL UNIQUE, 
    duracion INT NOT NULL, 
    clasificacion VARCHAR(20) NOT NULL, 
    puntuacion FLOAT NOT NULL, 
    year INT NOT NULL, 
    genero VARCHAR(80) NOT NULL, 
    FOREIGN KEY (genero) REFERENCES public.genero(genero) 
);

CREATE TABLE series( 
    id INT NOT NULL PRIMARY KEY, 
    titulo VARCHAR(200) NOT NULL UNIQUE, 
    clasificacion VARCHAR(20) NOT NULL, 
    puntuacion FLOAT NOT NULL, 
    year INT NOT NULL 
);

CREATE TABLE capitulos( 
    id INT NOT NULL PRIMARY KEY, 
    id_serie INT NOT NULL, 
    titulo VARCHAR(200) NOT NULL, 
    duracion INT NOT NULL, 
    numero INT NOT NULL, 
    FOREIGN KEY (id_serie) REFERENCES public.series (id) 
);

CREATE TABLE capitulo_genero( 
    id_capitulo INT NOT NULL, 
    genero VARCHAR(80) NOT NULL, 
    FOREIGN KEY (id_capitulo) REFERENCES public.capitulos (id), 
    FOREIGN KEY (genero) REFERENCES public.genero(genero) 
);

CREATE TABLE proveedores_series( 
    id INT NOT NULL PRIMARY KEY, 
    nombre VARCHAR(80) NOT NULL, 
    costo INT NOT NULL, 
    id_serie INT NOT NULL, 
    FOREIGN KEY (id_serie) REFERENCES public.series (id) 
);

CREATE TABLE proveedores_peli( 
    id INT NOT NULL PRIMARY KEY, 
    nombre VARCHAR(80), 
    costo INT NOT NULL, 
    id_pelicula INT NOT NULL, 
    FOREIGN KEY (id_pelicula) REFERENCES public.peliculas (id) 
);

CREATE TABLE sub_activa( 
    id INT NOT NULL PRIMARY KEY,    
    estado VARCHAR(50) NOT NULL, 
    fecha_inicio DATE NOT NULL, 
    id_proveedor INT NOT NULL, 
    id_usuario INT NOT NULL, 
    fecha_termino DATE NOT NULL, 
    proveedor VARCHAR(80) NOT NULL, 
    costo INT NOT NULL, 
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id) 
);

CREATE TABLE sub_cancelada( 
    id INT NOT NULL PRIMARY KEY,    
    estado VARCHAR(50) NOT NULL, 
    fecha_inicio DATE NOT NULL, 
    id_proveedor INT NOT NULL, 
    id_usuario INT NOT NULL, 
    fecha_termino DATE NOT NULL, 
    proveedor VARCHAR(80) NOT NULL, 
    costo INT NOT NULL, 
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id) 
);

CREATE TABLE pago_sub( 
    id INT NOT NULL PRIMARY KEY, 
    monto INT NOT NULL, 
    fecha DATE NOT NULL, 
    id_usuario INT NOT NULL, 
    id_sub INT NOT NULL, 
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios (id) 
);

CREATE TABLE proveedor_extra( 
    id INT NOT NULL PRIMARY KEY, 
    nombre VARCHAR(80) NOT NULL, 
    costo INT NOT NULL, 
    id_pelicula INT NOT NULL, 
    precio INT NOT NULL, 
    disponibilidad INT NOT NULL, 
    FOREIGN KEY (id_pelicula) REFERENCES public.peliculas (id) 
);

CREATE TABLE pago_peli( 
    id INT NOT NULL PRIMARY KEY, 
    monto INT NOT NULL, 
    fecha DATE NOT NULL, 
    id_usuario INT NOT NULL, 
    id_pelicula INT NOT NULL, 
    id_proveedor INT NOT NULL, 
    FOREIGN KEY (id_pelicula) REFERENCES public.peliculas (id), 
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios (id) 
);

CREATE TABLE visualizacion_peli( 
    id_usuario INT NOT NULL, 
    id_pelicula INT NOT NULL, 
    fecha DATE NOT NULL, 
    FOREIGN KEY (id_pelicula) REFERENCES public.peliculas (id), 
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios (id) 
);

CREATE TABLE visualizacion_serie( 
    id_usuario INT NOT NULL, 
    id_serie INT NOT NULL, 
    fecha DATE NOT NULL,    
    FOREIGN KEY (id_serie) REFERENCES public.series (id), 
    FOREIGN KEY (id_usuario) REFERENCES public.usuarios (id) 
);

-- Insertamos datos ---
\COPY genero FROM 'CSV/DataImpares/DataSeparada/tabla_generos.csv' DELIMITER ',' CSV HEADER;
\COPY subgenero FROM 'CSV/DataImpares/DataSeparada/tabla_subgeneros.csv' DELIMITER ',' CSV HEADER;
\COPY usuarios FROM 'CSV/DataImpares/DataSeparada/tabla_usernames_usuarios.csv' DELIMITER ',' CSV HEADER;
\COPY credenciales FROM 'CSV/DataImpares/DataSeparada/tabla_detalles_usuarios.csv' DELIMITER ',' CSV HEADER;
\COPY peliculas FROM 'CSV/DataImpares/DataSeparada/tabla_peliculas.csv' DELIMITER ',' CSV HEADER;
\COPY series FROM 'CSV/DataImpares/DataSeparada/tabla_series.csv' DELIMITER ',' CSV HEADER;
\COPY capitulos FROM 'CSV/DataImpares/DataSeparada/tabla_capitulos.csv' DELIMITER ',' CSV HEADER;
\COPY capitulo_genero FROM 'CSV/DataImpares/DataSeparada/tabla_genero_cap.csv' DELIMITER ',' CSV HEADER;
\COPY proveedores_series FROM 'CSV/DataImpares/DataSeparada/tabla_proveedores_series.csv' DELIMITER ',' CSV HEADER;
\COPY proveedores_peli FROM 'CSV/DataImpares/DataSeparada/tabla_proveedores_pelis.csv' DELIMITER ',' CSV HEADER;
\COPY proveedor_extra FROM 'CSV/DataImpares/DataSeparada/tabla_proveedores_pelis_pextra.csv' DELIMITER ',' CSV HEADER;
\COPY sub_activa FROM 'CSV/DataImpares/DataSeparada/tabla_subs_activas.csv' DELIMITER ',' CSV HEADER;
\COPY sub_cancelada FROM 'CSV/DataImpares/DataSeparada/tabla_subs_canceladas.csv' DELIMITER ',' CSV HEADER;
\COPY pago_sub FROM 'CSV/DataImpares/DataSeparada/tabla_pago_sub.csv' DELIMITER ',' CSV HEADER;
\COPY pago_peli FROM 'CSV/DataImpares/DataSeparada/tabla_pago_compra.csv' DELIMITER ',' CSV HEADER;
\COPY visualizacion_peli FROM 'CSV/DataImpares/DataSeparada/tabla_vis_pelis.csv' DELIMITER ',' CSV HEADER;
\COPY visualizacion_serie FROM 'CSV/DataImpares/DataSeparada/tabla_vis_series.csv' DELIMITER ',' CSV HEADER;
