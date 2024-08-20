<?php 

session_start();

$servidor = "localhost";
$usuario = "root";
$password="";
$bd = "naturalfit";

$conexion = new mysqli($servidor, $usuario, $password, $bd);
if ($conexion -> connect_error) {
    die ('Fallo la Conexion'. $conexion -> connect_error);
}
?>