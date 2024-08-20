<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="crearcuenta.css">
</head>
<body>
    <h1>Crear Cuenta</h1>
    <div class="container">
        <form action="crearcuenta.php" method="post">
            <div class="input">
                <label for="">Nombre</label>
                <input type="text" placeholder="Ingrese su Nombre"  name="Nombre">
            </div>

            <div class="input">
                <label for="">Apellido</label>
                <input type="text" placeholder="Ingrese su Apellido"  name="Apellido">
            </div>

            <div class="input">
                <label for="">Nombre de Usuario</label>
                <input type="text" placeholder="Ingrese su Nombre de Usuario"  name="Usuario">
            </div>
            
            <div class="input">
                <label for="">Contraseña</label>
                <input type="password" placeholder="Ingrese su Contraseña" name="Contraseña">
            </div>

            <input type="submit" value="CREAR CUENTA" name="CrearCuenta">
        </form>
        <?php 
            include_once("../../Conexion/conexion.php");

            if(isset($_POST['CrearCuenta'])){
                $Nombre = $_POST['Nombre'];
                $Apellido = $_POST['Apellido'];
                $Usuario = $_POST['Usuario'];
                $Contraseña = $_POST['Contraseña'];
                $sql = "INSERT INTO usuarios (Nombre, Apellido, Nombre_Usuario, Contraseña) VALUES ('$Nombre', '$Apellido', '$Usuario', '$Contraseña')";
                $resultado = $conexion -> query($sql);
            }
            $conexion -> close();
        ?>
    </div>
    <p>Si tienes una cuenta, puedes <a href="../Iniciar_Sesion/login.php">Iniciar Sesion</a></p>
</body>
</html>