<?php 
    include("../../../Conexion/conexion.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM productos WHERE ID_Producto = $id";

        $result = $conexion -> query($query);
        header("Location: ../gestion-productos.php");
    }


?>