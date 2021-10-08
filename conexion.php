<?php

function OpenCon()
{
    $dsn = 'mysql:dbname=inventario_libros;host=127.0.0.1';
    $usuario = 'root';
    $contraseña = 'coronado';

    try {
        $mbd = new PDO($dsn, $usuario, $contraseña);
    } catch (PDOException $e) {
        die("Fallo la conexion: " . $e->getMessage());
        $mbd = null;
    }
    return $mbd;
}
function CloseCon($mbd)
{
    $mbd = null;
}
