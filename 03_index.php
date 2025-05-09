<?php
//proposito : Reutiliza la función conectarBD() del archivo anterior.
//Da información del servidor y cierra la conexión de forma explícita.

//llamamos al archivo 02_conexion.phpc una sola vez
require_once '02_conexion.php';

//lamamos a la funcion conectarBD()
 $conexion = conectarBD();

 //mostramos en pantalla 
 echo "<h2>Conexion exitosa a la base de datos 'Productos' </h2>";
 echo "<p>Servidor : {$conexion->server_info}</p>";
 echo "<p>Host info : {$conexion->host_info}</p>";

 //aqui podriamos ejecutar consultas

 $conexion->close();
 echo "<p>Conexion cerrada correctamente.</p>";