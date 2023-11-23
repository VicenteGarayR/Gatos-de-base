CREATE OR REPLACE FUNCTION login_usuario (nombre VARCHAR(255), contrasena_ VARCHAR(255))
RETURNS BOOLEAN AS $$
BEGIN
    -- Verificar que el usuario exista
    IF NOT EXISTS (SELECT id FROM usuario WHERE id = nombre)
    THEN
        RAISE EXCEPTION 'El usuario no existe';
    END IF;

    -- Verificar que la contraseña sea correcta
    IF NOT EXISTS (SELECT id FROM usuario WHERE id = nombre AND contrasena = contrasena_)
    THEN
        RAISE EXCEPTION 'La contraseña es incorrecta';
    END IF;

    RETURN TRUE;
END;
$$ language plpgsql
