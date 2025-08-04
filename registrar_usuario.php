<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario de Registro</title>
  <link href="ccs/style.css"
</head>
<body>
  <h2>Registro de Usuario</h2>
  <form action="register.php" method="POST">
    <label for="doc">doc</label><br>
    <input type="doc" name="doc" required><br><br>

    <label for="nombre">Nombre</label><br>
    <input type="text" name="nombre" required><br><br>

    <label for="apellido">apellidos</label><br>
    <input type="apellido" name="apellido" required><br><br>

    <label for="email">email</label><br>
    <input type="email" name="email" required><br><br>

    <input type="submit" value="Registrar">
  </form>
</body>
</html>


<?php
require_once("../database/connection.php");
$db = new database;
$con = $db->conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar datos del formulario
    $doc = $_POST["doc"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    

   
    $check = $con->prepare("SELECT * FROM user WHERE documento = ? OR email = ?");
    $check->execute([$doc, $email]);
    $existe = $check->fetch();

    if ($existe) {
        echo '<script>alert("Usuario ya existe con ese documento o email."); window.history.back();</script>';
        exit();
    }

    $sql = $con->prepare("INSERT INTO user (doc, nombre, apellido, email) 
                          VALUES (?, ?, ?, ?)");

    

    $resultado = $sql->execute([$doc, $nombre, $apellido, $email, $clave, $tipo]);

    if ($resultado) {
        echo '<script>alert("Registro exitoso."); window.location.href="../login.php";</script>';
    } else {
        echo '<script>alert("Error al registrar."); window.history.back();</script>';
    }
}
?>
