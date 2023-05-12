<?php 

include ('../conexion.php');

$ano = $_POST['ano'];
$autor = $_POST['autor'];
$titulo = $_POST['titulo'];
$enlace = $_POST['enlace'];
$especialidad = $_POST['especialidad'];
$editorial = $_POST['editorial'];

$conexion = conectar();

$sql = "INSERT INTO libros (ano, autor, titulo, enlace, especialidad, editorial) VALUES ('$ano','$autor','$titulo','$enlace','$especialidad','$editorial')";

$resultado = mysqli_query($conexion, $sql);

desconectar($conexion);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Nuevo Libro</h1>
    <h3>
    <?php
        if (!$resultado){
            echo 'No se ha podido registrar el Libro';
        }
        else{
            echo 'Libro registrado';
        }
    ?>
    </h3>
    <a href="libros.php" class="btn btn-warning">Regresar</a>
</body>
</html>