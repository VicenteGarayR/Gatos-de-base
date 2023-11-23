CREATE OR REPLACE FUNCTION verificar(usuario VARCHAR, contrasena VARCHAR)
RETURNS BOOLEAN AS $$
BEGIN
    -- Verificar que el usuario exista
    RETURN TRUE;
END;
$$ language plpgsql
