<?php

require_once ("conexion.php");

// iniciar sesion
session_start();

if(!empty($_POST))
{

    $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
	$pass = mysqli_real_escape_string($mysqli,$_POST['clave']);

// CUERY Que hara la consulta del usuario y de la contraseña
$sql =mysqli_query ($mysqli, "SELECT * FROM TB_USUARIO WHERE NOM_USUARIO = '$usuario' AND PASS_USUARIO = '$pass' ");


// condicion donde evaluamos el resultado del cuery que se almaceno en $sql si es igual que 1 es por que si existe 
// el usuario y si no se va a un else y nos manda a que nos logiemos otra vez
if (mysqli_num_rows($sql) == 1) {



    // Para almacenar datos del usuario para mientras esta concetado
    $_SESSION["usuario"] = $usuario;
    $_SESSION["password"] = $pass;


    
    // // CUERY Que hara la consulta del usuario y tipo de usuario
    $sql2 =mysqli_query ($mysqli, "SELECT * FROM TB_USUARIO  WHERE NOM_USUARIO = '$usuario' AND TIPO_USUARIO = 1 ");

    if (mysqli_num_rows($sql2) == 1) {  

        header('Location: plataforma/catedraticos'); // LO DIRECCIONAS AL MENU QUE DESEEMOS
    } 

    $sql2 =mysqli_query ($mysqli, "SELECT * FROM TB_USUARIO  WHERE NOM_USUARIO = '$usuario' AND TIPO_USUARIO = 2 ");

    if(mysqli_num_rows($sql2) == 1){
        header('Location: plataforma/alumnos');
    }

    $sql2 =mysqli_query ($mysqli, "SELECT * FROM TB_USUARIO  WHERE NOM_USUARIO = '$usuario' AND TIPO_USUARIO = 0 ");

    if(mysqli_num_rows($sql2) == 1){
        header('Location: plataforma/admin');
    }


}
 else {
  $_SESSION["error"] = 1;
   header('Location: login.php');
}

}


?>



