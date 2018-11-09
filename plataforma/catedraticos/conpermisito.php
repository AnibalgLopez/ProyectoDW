<?php 
session_start();
if (!isset($_SESSION["usuario"])) {
    header('Location: ../../login.php');
}
else if ($_SESSION['usuario']['TIPO_USUARIO']!=1) {
    header('Location: ../error.html');
}
 ?>