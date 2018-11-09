<?php 
session_start();
if (!isset($_SESSION["usuario"])) {
    header('Location: ../../login.php');
}
else if ($_SESSION['usuario']['TIPO_USUARIO']!=2) {
    header('Location: ../error.html');
}
 ?>