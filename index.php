<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaturalFit - Admin</title>
    <link rel="stylesheet" href="Sesiones/Crear_Cuenta/crearcuenta.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h1>Iniciar Sesion</h1>
    <div class="container containerchico">
        <form action="index.php" method="post">
            <div class="input">
                <label for="">Nombre de Usuario</label>
                <input type="text" placeholder="Ingrese su Nombre de Usuario" name="NombreDeUsuario">
            </div>
            
            <div class="input">
                <label for="">Contraseña</label>
                <input type="password" placeholder="Ingrese su Contraseña" name="Contraseña">
            </div>
            <div class="input">
                <label for="">Clave Empresa</label>
                <input type="text" placeholder="Ingrese la Clave" name="Clave"> 
            </div>

            <input type="submit" value="INICIAR SESION" name="IniciarSesion">
        </form>
        <?php 
            include_once("Conexion/conexion.php");

            if (isset($_POST['IniciarSesion'])) {
            $usuario = $_POST['NombreDeUsuario'];
            $contraseña = $_POST['Contraseña'];
            $clave="1234";
            $claveInput = $_POST['Clave'];
            if ($claveInput == $clave) {
                $sql = mysqli_query($conexion, "SELECT ID_Usuario, Nombre_Usuario, Contraseña FROM usuarios WHERE Nombre_Usuario = '$usuario' AND Contraseña = '$contraseña'");
            
                $row = mysqli_fetch_array($sql);

                if (is_array($row)) {
                    header("Location:Panel_De_Administrador/admin-panel.html");
                    exit();
                } else {
                    echo '<script type = "text/javascript">';
                    echo 'alert("Nombre o contraseña inválidos");';
                    echo 'window.location.href = "index.php";';
                    echo '</script>';
                }
            }
            else {
                echo '<script type = "text/javascript">';
                    echo 'alert("Clave Invalida");';
                    echo 'window.location.href = "index.php";';
                    echo '</script>';
            }
            
}
       ?>

    </div>
    <p>Si no tienes una cuenta, puedes <a href="Sesiones/Crear_Cuenta/crearcuenta.php">Crear una Cuenta</a></p>
</body>
</html>