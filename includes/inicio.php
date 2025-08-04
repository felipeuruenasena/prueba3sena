<?php 


if($_POST["inicio"])
{
    
    $usuario = $_POST[""];
	$clave = $_POST[""];
    if ()
    {
        echo"<script>alert('Datos Vacios')</script>";
	    echo"<script>window.location='../login.php'</script>";
    }
    else
    {
        $sql = $con->prepare(" ");
        $sql->execute();
        $fila = $sql->fetch();
        
        if ($fila) {
            $_SESSION[''] = $fila[''];
            $_SESSION[''] = $fila[''];
            $_SESSION[''] = $fila[''];
            if ($_SESSION[''] == 1) {
                header("Location: ");
                exit();
            }
           
        }
        else
        {
            echo"<script>alert('Credenciales invalidas o usuario inactivo.')</script>";
            echo"<script>window.location='../index.php'</script>";
            exit();
        }
}
}	
?>