<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fundamentos";

try {
    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener todos los registros de la tabla `usuarios`
    $stmt = $conn->query("SELECT * FROM usuarios");

    // Mostrar resultados en una tabla HTML
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Contraseña</th><th>Tipo</th></tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>"; // ID
        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>"; // Nombre
        echo "<td>" . htmlspecialchars($row['contraseña']) . "</td>"; // Contraseña
        echo "<td>" . htmlspecialchars($row['tipo']) . "</td>"; // Tipo
        echo "</tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>

