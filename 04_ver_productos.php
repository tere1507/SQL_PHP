<?php
declare(strict_types=1);

require_once '02_conexion.php';


try {
    //llammos a la base de datos
    $conexion = conectarBD();

    //preparamos y ejecutamos la consulta
    $consulta = "SELECT * FROM producto";
    $resultado = $conexion->query($consulta);

    if($resultado->num_rows > 0) {
        echo "<h2>List of products</h2>";
        echo "<style>
                table { border-collapse: collapse; width: 70%; margin: 20px auto; }
                th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
                th { background-color: #f2f2f2; }
              </style>";
        echo "<table>";
        echo "<tr><th>COD</th><th>Nombre</th><th>Nombre Corto</th><th>Descripción</th><th>PVP</th><th>Precio</th>Familia</tr>";

        while($producto = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars((string)$producto['cod']) . "</td>";
            echo "<td>" . htmlspecialchars((string)$producto['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars((string)$producto['nombre_corto']) . "</td>";
            echo "<td>" . htmlspecialchars((string)$producto['descripcion']) . "</td>";
            echo "<td>" . htmlspecialchars((string)$producto['PVP']) . "</td>";
            echo "<td>" . htmlspecialchars((string)$producto['familia']) . "</td>";
            echo "</tr>";

        }
        
        echo "</table>";
    } else  {
        echo "<p>No hay productos disponibles</p>";

    } 
} catch (mysqli_sql_exception $e) {
        echo "<h3>Error base de datos : </h3><p>" . htmlspecialchars($e->getMessage()) . "</p>";
}