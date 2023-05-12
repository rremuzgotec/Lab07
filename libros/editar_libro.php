<?php 

include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_libro = $_POST['id_libro'];
    $ano = $_POST['ano'];
    $autor = $_POST['autor'];
    $titulo = $_POST['titulo'];
    $enlace = $_POST['enlace'];
    $especialidad = $_POST['especialidad'];
    $editorial = $_POST['editorial'];

    $conexion = conectar();

    $sql = "UPDATE libros SET ano = '$ano', autor = '$autor', titulo = '$titulo', enlace = '$enlace', especialidad = '$especialidad', editorial = '$editorial' WHERE id_libro = $id_libro";

    
    if (mysqli_query($conexion, $sql)) {  
        desconectar($conexion); 
        header('Location: libros.php');
        exit;
    } else {
        $error = 'Error al actualizar al libro: ' . mysqli_error($conexion);
    }
} else {
    
    $id_libro = $_GET['id_libro'];
    
    $conexion = conectar();

    $sql = "SELECT ano, autor, titulo, enlace, especialidad, editorial FROM libros WHERE id_libro = $id_libro";
    
    $resultado = mysqli_query($conexion, $sql);
    
    $libros = mysqli_fetch_array($resultado);
    
    desconectar($conexion);
    
    $ano = $libros['ano'];
    $autor = $libros['autor'];
    $titulo = $libros['titulo'];
    $enlace = $libros['enlace'];
    $especialidad = $libros['especialidad'];
    $editorial = $libros['editorial'];

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Editar Libro</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="ano">Año del Libro:</label>
                <input type="text" class="form-control" id="ano" name="ano" value="<?php echo $ano; ?>">
            </div>
            <div class="form-group">
                <label for="autor">Autor del Libro:</label>
                <input type="text" class="form-control" id="autor" name="autor" value="<?php echo $autor; ?>">
            </div>
            <div class="form-group">
                <label for="titulo">Titulo del Libro:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $titulo; ?>">
            </div>
            <div class="form-group">
                <label for="enlace">Enlace del libro</label>
                <input type="text" class="form-control" id="enlace" name="enlace" value="<?php echo $enlace; ?>">
            </div>
            <div class="form-group">
                <label for="Especialidad">Especialidad del libro</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad" value="<?php echo $especialidad; ?>">
            </div>
            <div class="form-group">
                <label for="editorial">Editorial del libro</label>
                <input type="text" class="form-control" id="editorial" name="editorial" value="<?php echo $editorial; ?>">
            </div>
            <input type="hidden" name="id_libro" value="<?php echo $id_libro; ?>">
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </div>
</body>
</html>