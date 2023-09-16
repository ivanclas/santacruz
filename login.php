<?php
// Configura la conexión a la base de datos
$host = "localhost";
$username = "root";
$password = "";
$database = "registro";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesa el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verifica las credenciales en la base de datos
    $sql = "SELECT * FROM personal WHERE dni = '$username' AND contrasena = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        header("Location: menu.php"); // Redirecciona a la página de bienvenida
        exit();
    } else {
        // Inicio de sesión fallido
        echo ("contraseña o usuario incorrectos");
          header("Location: inicio.php");
    }
}

$conn->close();
?>
