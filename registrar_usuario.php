<?php
    session_start();
    require_once("database/connection.php");
    $db = new database;
    $con = $db->conectar();
?>

<?php
    if (isset($_POST["validar"]))
    {
        $cedula= $_POST['documento'];
        $nombre= $_POST['nombre'];
        $usuario= $_POST['usuario'];
        $clave= $_POST['contrasena'];
        $idusu= $_POST['id_usu'];


        $sql = $con -> prepare (query: "SELECT * FROM user WHERE documento='$cedula' or user='$usuario'");
        $sql -> execute();
        $fila = $sql -> fetchALL(mode: PDO::FETCH_ASSOC);
        if ($fila) {
            echo '<script>alert ("DOCUMENTO O USUARIO YA EXISTEN //INTENTE UNO DISTINTO//");</script>';
            echo '<script>window.location="registrousu.php"</script>';
        }
        elseif ($cedula=="" || $nombre=="" || $usuario=="" || $clave=="" || $idusu=="")
        {
            echo '<script>alert ("Existen datos vacios");</script>';
            echo '<script>window.location="registrousu.php"</script>';
        }
        else 
        {

            $insertsql = $con->prepare(query: "INSERT INTO user (documento, nombre, contrasena, user, id_tip_user) VALUES ('$cedula', '$nombre', '$clave', '$usuario', '$idusu')");
            $insertsql->execute();
            echo "<script>alert('usuario registrado exitosamente');</script>";
            echo '<script>window.location="index.html"</script>';
        }
    }



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulario Registro</title>
    <link rel="stylesheet" href="controller/css/style.css">
    
</head>

<body onload="form1.usuario.focus()">
    <div class="login-box">
        <img src="controller/image/logo.png" class="avatar" alt="Avatar Image">
        <h1>Registro de Usuario</h1>
        <form method="POST" name="form2" id="form2" autocomplete="off">
            <input type="number" name="documento" id="documento" placeholder="Documento">
            <input type="text" name="nombre" id="nombre" placeholder="Nombres Completos">
            <input type="password" name="contrasena" id="contrasena" placeholder="Digite nueva Contraseña">
            <input type="text" name="email" id="email" placeholder="Ingrese email">
          
            
            <input type="submit" name="validar" id="validar" value="Registrarme">
        </form>
    </div>
</body>

</html>
