<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fundamentos"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$user = $_POST['username'];
$pass = $_POST['password'];

// Escapar caracteres para evitar SQL Injection (preferible usar consultas preparadas)
$user = $conn->real_escape_string($user);
$pass = $conn->real_escape_string($pass);

// Consulta para verificar credenciales (ajustando los nombres de columnas)
$sql = "SELECT * FROM usuarios WHERE nombre = '$user' AND contraseña = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    session_start();
    $_SESSION['username'] = $user; // Guardar sesión
    echo "success"; // Respuesta que valida al usuario
} else {
    // Credenciales incorrectas
    echo "error"; // Respuesta para error en validación
}

$conn->close();
?>
