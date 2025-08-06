<?php
session_start();
require_once("../database/connection.php");

$db = new database;
$con = $db-> conectar();


if ($_POST["inicio"]) {
    $nombre = $_POST["usuario"]; 
    $contra = htmlentities(addslashes($_POST["clave"]));

    $sql = $con->prepare("SELECT * FROM user WHERE nombre = '$nombre' ");
    $sql->execute();
    $fila1 = $sql->fetch();

    if (password_verify($contra,$fila1['contrasena'])) {
        $_SESSION['doc_user'] = $fila1['documento'];
        


    } else {
        echo '<script>alert("Usuario no encontrado");</script>';
        echo '<script>window.location="../index.html"</script>';
    }
} else {
}
?>
