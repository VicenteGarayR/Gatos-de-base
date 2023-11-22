CREATE OR REPLACE FUNCTION

verificar (username_con VARCHAR(255), password_con VARCHAR(255))

RETURNS BOOLEAN AS $$

BEGIN

    IF username_con IN (SELECT username FROM usuarios) THEN
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;
    
END
$$ LANGUAGE plpgsql
