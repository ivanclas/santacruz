<?php
// Conexión a la base de datos MySQL (ajusta estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recuperar datos del formulario
$nombre = $_POST["nombre"];
$fecha_cita = $_POST["fecha_cita"];
$hora_cita = $_POST["hora_cita"];

// Insertar datos en la base de datos
$sql = "INSERT INTO citas (nombrePaciente, fechaCita, horaCita)
VALUES ('$nombre', '$fecha_cita', '$hora_cita')";

if ($conn->query($sql) === TRUE) {
    echo "Cita registrada con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
