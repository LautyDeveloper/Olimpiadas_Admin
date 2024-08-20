<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Estilos/gestion-productos.css">
    <title>Gestión de Productos</title>
</head>
<body>
    <header>
        <nav>
            <img src="../../assets/media/logo.png" alt="">

            <a>Admin</a>
        </nav>
    </header>
    <div class="ventana-modal oculto">
        <div class="ventana-modal__content">
            <div class="close">X</div>
        </div>            
    </div>
    <main>
        <h1>Gestión de Productos</h1>
        <article class="lista-productos">
            <p>Filtrar por: 
                <select name="" id="">
                    <option value="">Categoria</option>
                    <option value="">Menor precio</option>
                    <option value="">Mayor precio</option>
                </select>
            </p>
            <div class="lista-productos">
                <?php 
                    include_once("../../Conexion/conexion.php");

                    $sql = "SELECT * FROM productos";
                    $res = $conexion -> query($sql);
                    if($res -> num_rows > 0){
                        while($row = $res -> fetch_assoc()){
                        echo'
                            <div class="producto-carta">
                                <p class="nombre-prod">'.$row["Nombre_Producto"].' - $'.$row["Precio"].' </p>
                                <div class="btns">
                                    <button class="btn-editar" idProd="'.$row["ID_Producto"].'" NombreProd = "'.$row["Nombre_Producto"].'" desc="'.$row["Descripcion"].'" categ="'.$row["Categoria"].'" stock="'.$row["Stock"].'" precio="'.$row["Precio"].'"><img src="../../assets/media/lapiz.png" alt=""></button>
                                    <a href="Acciones/delete.php?id= '.$row["ID_Producto"].'" class="btn-borrar" name="deleteBtn" value="'.$row["ID_Producto"].'" data-target="#editar'.$row['ID_Producto'].'"><img src="../../assets/media/basura.png" alt=""></a>
                                </div>
                             </div>
                        ';
                        }
                    }
                ?>

                <?php
                    if (isset($_POST['edit-submit'])){
                        $nombre = $_POST['nombreProd'];
                        $desc = $_POST['descProd'];
                        $categ = $_POST['categProd'];
                        $stock = $_POST['stockProd'];
                        $precio = $_POST['precioProd'];
                        $id = $_POST['idProd'];

                        $sqlEditar = "UPDATE productos
                        SET Nombre_Producto = '$nombre', Descripcion = '$desc', Categoria = '$categ',Stock = '$stock',Precio = '$precio' 
                        WHERE ID_Producto = $id";
                        $resEditar = $conexion -> query($sqlEditar);
                        echo '<meta http-equiv="refresh" content="2;url=gestion-productos.php">';

                    }
                    if (isset($_POST['deleteBtn'])) {
                        echo $_POST['deleteBtn'];
                    }

                ?>
                

                
            </div>
        </article>
        <a class="btn-cargar" href="Acciones/agregarproducto.php">Agregar Producto +</a>
    </main>
    <script src="../../assets/js/gestionar-productos.js"></script>
</body>
</html>




