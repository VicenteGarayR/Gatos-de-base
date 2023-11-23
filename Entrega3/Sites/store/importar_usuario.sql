-- Generea contraseñas aleatorias para los usuarios

CREATE OR REPLACE FUNCTION generate_password(max_length INT)
RETURNS VARCHAR(100)
AS $$
DECLARE
    char1 CHAR;
    charI INT;
    password1 VARCHAR(100);
    len INT;
BEGIN
    charI = 0;
    password1 = '';
    len = max_length;
    WHILE len > 0
    LOOP
        charI = ROUND(RAND()*100,0);
        --CharI es un numero entero entre 0 y 100
        char1 = CHAR(charI);
        IF charI > 48 AND charI < 122
        THEN
            password1 = password1 + char1;
            len = len - 1;
        END IF;
    END LOOP;
    RETURN password1;
END;
$$ language plpgsql;

-- Importa los usuarios de la tabla cliente a la tabla usuario y admin

CREATE OR REPLACE FUNCTION importar_usuarios()
RETURN VOID $$
BEGIN
    -- Crear tabla Usuarios si no existe
    CREATE TABLE IF NOT EXISTS Usuario (
        id VARCHAR(255) NOT NULL,
        contrasena VARCHAR(255) NOT NULL,
        es_admin BOOLEAN NOT NULL,
        PRIMARY KEY (id)
    );

    -- Verificar si existe el usuario de nombre ADMIN
    IF NOT EXISTS (SELECT nombre FROM cliente WHERE nombre = 'ADMIN')
    THEN
        INSERT INTO Usuarios (id, contrasena, es_admin)
        VALUES ('ADMIN', 'admin', TRUE);
    END IF;

    -- Convertir clientes en usuarios
    INSERT INTO Usuario (id, contrasena, es_admin)
    SELECT id, call generate_password(50), FALSE -- con o sin call, depende de xd
    FROM cliente;
END;
$$ language plpgsql;