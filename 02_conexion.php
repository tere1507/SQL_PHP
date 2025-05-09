<?php
// Usa excepciones modernas para manejar errores.
// Centraliza la conexión en una función reutilizable.
// Usa codificación UTF-8 segura.
// No muestra errores sensibles al usuario final (buenas prácticas de seguridad).

//llamamos al archivo 01_config.php
require_once '01_config.php';

function conectarBD(): mysqli {
    // Configurar MySQLi para lanzar excepciones si hay errores
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try{
        $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $conexion->set_charset('utf8mb4');//codificacion segura
        return $conexion;
    } catch (mysqli_sql_exception $e) {
        //log interno para produccion
        error_log("Error de conexion." .$e->getMessage());

        //mensage seguro para el usuario
        die("<h1>Error critico al intentar conectar con la base de datos</h1><p>Intenta mas tarde</p>");
    }
}
?>