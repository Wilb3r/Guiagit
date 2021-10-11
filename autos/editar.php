<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" />
    <title>Editar Autos</title>
  </head>
  <body>
<?php
    if (isset($_GET["id"])) {
        $codigo = $_GET["id"];
        include '../conexion.php';
        $conn = OpenCon();
        $sql = "SELECT auto.*, marcas.nombre as marca FROM auto
                INNER JOIN marcas ON marcas.id = auto.idMarca
                WHERE auto.id = '$codigo'";
        $result = $conn->query($sql);
        $row = $result->fetch(); ?>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Auto</h4>
                </div>
                <div class="card-body">
                    <form action = "" method = "POST">
                        <label>ID:</label>
                        <input type = "text" readonly name = "id" id = "id" class="form-control" value="<?=$row['id']?>" />
                        <br />
                        <label>Marca:</label>
                        <?php  $sql1 = "SELECT * FROM marcas";

                            ?>
                        <select name="idMarca" id="idMarca" class="form-control" id="">
                        <?php
                            foreach ($conn->query($sql1) as $rowMarca) {
                                # code...
                                ?>
                                    <option value="<?=$rowMarca['id'];?>" <?=($rowMarca['id']==$row['idMarca'])?'selected':'';?>><?=$rowMarca['nombre'];?></option>
                                <?php
                            }
                        ?>
                        </select>
                        <br />
                        <label>Nombre:</label>
                        <input type = "text" name = "nombre" id = "nombre" class="form-control" value="<?=$row['nombre']?>" />
                        <br />
                        <label>Descripcion:</label>
                        <input type = "text" name = "descripcion" id = "descripcion" class="form-control" value="<?=$row['descripcion']?>"/>
                        <br />
                        <label>Tipo de Combustible:</label>
                        <input type = "text" name = "tipoCombustible" id = "tipoCombustible" class="form-control" value="<?=$row['tipoCombustible']?>"/>
                        <br />
                        <label>Cantidad de Puertas:</label>
                        <input type = "text" name = "cantidadPuertas" id = "cantidadPuertas" class="form-control" value="<?=$row['cantidadPuertas']?>"/>
                        <br />
                        <label>Precio:</label>
                        <input type = "text" name = "precio" id = "precio" class="form-control" value="<?=$row['precio']?>"/>
                        <br />
                        <input type = "Submit" value ="Guardar" name = "submit" class="btn btn-success"/>
                        <a class="btn btn-danger" href="ver.php"><i class="fas fa-sign-out-alt"></i></a>
                        <br />
                    </form>
                </div>
            </div>
        </div>
        <?php
}

         if (isset($_POST["submit"])) {
             $conn = OpenCon();
             // Verificamos la conexión
             if ($conn == null) {
                 die("No se pudo conectar a la base de datos: ");
             }
             $sql = "UPDATE auto SET  id='".$_POST['id']."', idMarca='".$_POST['idMarca']."', nombre='".$_POST['nombre']."', descripcion='".$_POST['descripcion']."', tipoCombustible='".$_POST['tipoCombustible']."', cantidadPuertas='".$_POST['cantidadPuertas']."', precio='".$_POST['precio']."' WHERE id='".$_POST['id']."'";
             $count = $conn->exec($sql);
             if ($count>0) {
                 echo "<div class=\"alert alert-success\" role=\"alert\">";
                 echo "Se ha actualizado el auto";
                 echo "</div>";
                 header('Location:ver.php');
             } else {
                 echo "<div class=\"alert alert-danger\" role=\"alert\">";
                 echo "No se pudo guardar la actualizacion. ";
                 echo "Error: " . $sql . "" . mysqli_error($conn);
                 echo "</div>";
             }
             $conn->close();
         }
        ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
