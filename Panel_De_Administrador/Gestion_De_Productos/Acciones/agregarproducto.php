<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregando Producto</title>
    <link rel="stylesheet" href="../Estilos/agregar-producto.css">
</head>
<body>
    <h1>Agregando Producto...</h1>
        <div class="form-container">
        <form action="agregarproducto.php" method="post">
            <div>
                <label for="">Nombre Del Producto</label>
                <input type="text" name="Input_Nombre">
            </div>
            <div>
                <label for="">Descripcion</label>
                <textarea name="Input_Descripcion" id=""></textarea>
            </div>
            <div>
                <label for="">Categoria</label>
                <select name="Input_Categoria" id="">
                    <option value="Musculacion">Musculacion</option>
                    <option value="Calistenia">Calistenia</option>
                    <option value="Yoga">Yoga</option>
                    <option value="Alpinismo">Alpinismo</option>
                </select>
            </div>
            <div>
                <label for="">Stock</label>
                <input type="number" name="Input_Stock">
            </div>
            <div>
                <label for="">Precio</label>
                <input type="number" name="Input_Precio">
            </div>

            <input type="submit" value="Agregar" name="Input_Submit">
        </form>
        </div>
        <?php 
            include_once("../../../Conexion/conexion.php");

            if(isset($_POST['Input_Submit'])){
                $NombreProducto = $_POST['Input_Nombre'];
                $DescripcionProducto = $_POST['Input_Descripcion'];
                $CategoriaProducto = $_POST['Input_Categoria'];
                $StockProducto = $_POST['Input_Stock'];
                $PrecioProducto = $_POST['Input_Precio'];

                $sql = "INSERT INTO productos (Nombre_Producto, Descripcion, Categoria, Stock, Precio) VALUES ('$NombreProducto', '$DescripcionProducto', '$CategoriaProducto', $StockProducto, $PrecioProducto)";

                $resultado = $conexion -> query($sql);
                header("Location: ../gestion-productos.php");
            }
            $conexion -> close();
        ?>
</body>
</html>