<?php

// iniciar sesion
session_start();

$correo = $_POST["correo"];
$pass = $_POST["clave"];
include("conexion.php");

// CUERY Que hara la consulta del correo y de la contraseña
$sql =mysqli_query ($con, "SELECT * FROM tb_usuario  WHERE NOM_USUARIO = '$correo' and PASS_USUARIO = '$pass' ");


// condicion donde evaluamos el resultado del cuery que se almaceno en $sql si es igual que 1 es por que si existe 
// el usuario y si no se va a un else y nos manda a que nos logiemos otra vez
if (mysqli_num_rows($sql) == 1) {



    // Para almacenar datos del usuario para mientras esta concetado
    $_SESSION["correo"] = $correo;
    $_SESSION["password"] = $pass;


    
    // // CUERY Que hara la consulta del correo y tipo de usuario
    $sql2 =mysqli_query ($con, "SELECT * FROM tb_usuario  WHERE NOM_USUARIO = '$correo' and TIPO_USUARIO = 1 ");

    if (mysqli_num_rows($sql2) == 1) {  

        echo("EL USUARIO ES ADMINISTRADOR");
        //header('Location: Menu.php'); // LO DIRECCIONAS AL MENU QUE USTEDES USEN
    } 
    else {
        echo("EL USUARIO ES ALUMNO");
     }
}
 else {
  $_SESSION["error"] = 1;
   header('Location: Login.php');
}

?>



