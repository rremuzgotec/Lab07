<?php 

include ('../conexion.php');

$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];

$conexion = conectar();

$sql = "INSERT INTO autor (nombres, ape_paterno, ape_materno) VALUES ('$nombres','$ape_paterno','$ape_materno')";

$resultado = mysqli_query($conexion, $sql);

desconectar($conexion);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Nuevo Autor</h1>
    <h3>
    <?php
        if (!$resultado){
            echo 'No se ha podido registrar al autor';
        }
        else{
            echo 'Autor registrado';
        }
    ?>
    </h3>
    <a href="autores.php" class="btn btn-warning">Regresar</a>
</body>
</html>