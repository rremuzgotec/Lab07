<?php 

include('../conexion.php');

$conexion = conectar();

$sql = "SELECT id_libro,ano,autor,titulo,enlace,especialidad,editorial FROM libros";

$resultado = mysqli_query($conexion, $sql);

desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/18b9c6a8fe.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
        <h1 class="text-center">Libros</h1>
        <div>
            <a href="agregar.html" class="btn btn-primary">Agregar Libro</a>
            <table class="table table-info mt-3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Año</th>
                        <th>Autor</th>
                        <th>Titulo</th>
                        <th>Enlace</th>
                        <th>Especialidad</th>
                        <th>Editorial</th>
                        <th>Acciones</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($libros = mysqli_fetch_array($resultado)){
                            $id_libro = $libros['id_libro'];
                            $ano = $libros['ano'];
                            $autor = $libros['autor'];
                            $titulo = $libros['titulo'];
                            $enlace = $libros['enlace'];
                            $especialidad = $libros['especialidad'];
                            $editorial = $libros['editorial'];

                            echo '<tr>';
                            echo '<td>' . $id_libro . '</td>';
                            echo '<td>' . $ano . '</td>';
                            echo '<td>' . $autor . '</td>';
                            echo '<td>' . $titulo . '</td>';
                            echo '<td><a href="' . $enlace . '">' . $enlace . '</a></td>';
                            echo '<td>'. $especialidad. '</td>';
                            echo '<td>'. $editorial. '</td>';
                            echo '<td><a href="editar_libro.php?id_libro=' . $id_libro . '" <i class="fa-solid fa-pen-to-square btn btn-primary"></i></a></td>';
                            echo '<td><a href="eliminar_libro.php?id_libro=' . $id_libro . '" <i class="fa-solid fa-trash btn btn-danger"></i></a></td>';
                        }
                    ?>
                </tbody>    
            </table>
        </div>
    </div>
</body>
</html>