<?php 

include('../conexion.php');

$conexion = conectar();

$sql = "SELECT id, nombres, ape_paterno, ape_materno FROM autor";

$resultado = mysqli_query($conexion, $sql);

desconectar($conexion);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/18b9c6a8fe.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
        <h1 class="text-center">Autores</h1>
        <div>
            <a href="agregar.html" class="btn btn-primary">Agregar Autor</a>
            <table class="table table-info mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Acciones</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($autor = mysqli_fetch_array($resultado)){
                            $id = $autor['id'];
                            $nombres = $autor['nombres'];
                            $ape_paterno = $autor['ape_paterno'];
                            $ape_materno = $autor['ape_materno'];

                            echo '<tr>';
                            echo '<td>' . $id . '</td>';
                            echo '<td>' . $nombres . '</td>';
                            echo '<td>' . $ape_paterno . '</td>';
                            echo '<td>' . $ape_materno . '</td>';
                            echo '<td><a href="editar_autor.php?id=' . $id . '" <i class="fa-solid fa-pen-to-square btn btn-primary"></i></a></td>';
                            echo '<td><a href="eliminar_autor.php?id=' . $id . '" <i class="fa-solid fa-trash btn btn-danger"></i></a></td>';
                        }
                    ?>
                </tbody>    
            </table>
        </div>
    </div>
</body>
</html>