<?php
$conexion= new mysqli("localhost","root","","productos");
	if ($conexion->connect_errno) {
	   echo "connect errno = $conexion->connect_errno <br>";
	}
	$consulta = $conexion->stmt_init();
	$consulta->prepare('SELECT producto, unidades FROM stock WHERE unidades<2');
	$consulta->execute();
	$consulta->bind_result($producto, $unidades);
	while($consulta->fetch()) {
	   print "<p>Producto $producto: $unidades unidades.</p>";
	}
	$consulta->close();
	$conexion->close();

    ?>