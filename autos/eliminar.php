<?php

if (isset($_GET['codigo'])) {
    include '../conexion.php';
    $conn = OpenCon();
    // Verificamos la conexión
    if ($conn == null) {
        die("No se pudo conectar a la base de datos: ");
        header('Location: ./listar_autos.php?result=0');
    }

    $sql = "DELETE FROM auto WHERE id = '".$_GET['codigo']."'";

    $sth = $conn->prepare($sql);

    $sth->execute(array($_GET['codigo']));
    $count = $sth->rowCount();

    if ($count > 0) {
        header('Location: ./listar_autos.php?result=1');
        exit();
    } else {
        header('Location: ./listar_autos.php?result=0');
        exit();
    }
    CloseCon($conn);
} else {
    header('Location: ./listar_autos.php?result=0');
}
