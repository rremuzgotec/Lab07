<?php

function conectar(){
    $conexion = mysqli_connect('localhost','root','usbw','lab07');
    return $conexion;
}

function desconectar($conn){
    mysqli_close($conn);
}


?>
