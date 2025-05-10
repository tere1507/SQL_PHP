<?php
// Este script se conecta a la base de datos 'productos',
$conexion= new mysqli("localhost","root","","productos");

// 2. Verificar si hubo un error de conexión
	if ($conexion->connect_errno) {

        // Si hay un error, imprimir el código de error de conexión
	   echo "connect errno = $conexion->connect_errno <br>";
	}

    //3. Inicializar una sentencia preparada
	$consulta = $conexion->stmt_init();//Método: stmt_init() del objeto de conexión ($conexion).Es el espacio para colocar el objeto preparado

    //ejecuta una consulta preparada para encontrar productos con menos de 2 unidades en stock,
	$consulta->prepare('SELECT producto, unidades FROM stock WHERE unidades<2');

    // La base de datos ejecuta la consulta que fue preparada en el paso anterior.
	$consulta->execute();

    // Vincular variables PHP a las columnas del resultado
    // Especificar qué variables PHP recibirán los datos de cada columna seleccionada.
    // El orden de las variables debe coincidir con el orden de las columnas en el SELECT.
	$consulta->bind_result($producto, $unidades);

    //muestra los resultados y cierra las conexiones.
	while($consulta->fetch()) {

    // fetch() recupera la siguiente fila y POBLA las variables vinculadas ($producto, $unidades).
    // Si fetch() encuentra una fila, devuelve true. Si no hay más filas, devuelve false.
	   print "<p>Producto $producto: $unidades unidades.</p>";
	}
    //8. Cierra la sentencia preparada, libera los recursos asociados de la base de datos
	$consulta->close();

    //9. Cierra la conexión a la base de datos, libera los recursos asociados con la conexion
	$conexion->close();

    ?>