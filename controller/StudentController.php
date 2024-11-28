<?php

$conexion = new mysqli("127.0.0.1", "root", 
"", "cunoc", 3306);

/*
otra forma
$conexion= new mysqli("localhost","root","","fabrica2");
*/


    $conexion->set_charset("utf8");

?>