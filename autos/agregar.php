<!doctype html>
<html lang='es'>
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" />
    <title>Agregar Autos</title>
 </head>
 <body>
   <div class="container">
    <div class="card">
      <div class="card-header">
        <h4>Agregar Autos<h4/>
         </div>
           <div class="card-body">
              <form action = "" method = "POST">
                <label>ID:</label>
                <input type = "text"  name = "id" id = "id" class="form-control" placeholder="Ingrese el id"/>
                <br />
                <label>Nombre:</label>
                <input type = "text" name = "nombre" id = "nombre" class="form-control" placeholder="Ingrese el nombre" />
                <br />
                <label>Descripcion:</label>
                <input type = "text" name = "descripcion" id = "descripcion" class="form-control" placeholder="Ingrese la descripcion"/>
                <br />
                <label>Tipo de Combustible:</label>
                <input type = "text" name = "tipoCombustible" id = "tipoCombustible" class="form-control" placeholder="Ingrese el tipo de Combustible"/>
                <br />
                <label>Cantidad de Puertas:</label>
                <input type = "text" name = "cantidadPuertas" id = "cantidadPuertas" class="form-control" placeholder="Ingrese la cantidad de Puertas"/>
                <br />
                <label>Precio:</label>
                <input type = "text" name = "precio" id = "precio" class="form-control" placeholder="Ingrese el precio"/>
                <br />
                <label>Marca:</label>
                <select name="idMarca" class="form-control" id="idMarca">
                  <?php
                  include '../conexion.php';
                  $conn = OpenCon();
                          $sql = "SELECT * FROM marcas";

                          foreach ($conn->query($sql) as $rowmarca) {
                              ?>
                              <option value="<?php echo $rowmarca['id']?>"><?php echo $rowmarca['nombre']?></option>
                <?php
                } ?>
                    </select>
               </div>
                  <br />
                  <input type ="Submit" values ="Guardar" name="submit" class="btn btn-success"/>
                  <br />
                </form>
              </div>
            </div>
          </div>

          <?php

if (isset($_POST["submit"])) {
   $conn = OpenCon();
   // Verificamos la conexión
   if ($conn == null) {
       die("No se pudo conectar a la base de datos: ");
   }
    $sql = "INSERT INTO auto(id, idMarca, nombre, descripcion, tipoCombustible, cantidadPuertas, precio)
VALUES ('".$_POST["id"]."', '".$_POST["idMarca"]."','".$_POST["nombre"]."','".$_POST["descripcion"]."','".$_POST["tipoCombustible"]."', '".$_POST["cantidadPuertas"]."', '".$_POST["precio"]."')";

    $count = $conn->exec($sql);
    if ($count > 0) {
        echo "<div class=\"alert alert-success\" role=\"alert\">";
        echo "Se ha guardado la editorial";
        echo "</div>";
        header('Location:listar_autos.php');
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">";
        echo "No se pudo guardar la editorial";
        echo "Error: " . $sql;
        print_r($conn->errorInfo());
        echo "</div>";
    }
    CloseCon($conn);
}
 ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 </body>
 </html>
