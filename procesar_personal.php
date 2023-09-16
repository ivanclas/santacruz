<?php
// Conexión a la base de datos (personaliza los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$database = "registro";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$dni= $_POST["dni"];
$contrasena = $_POST["contrasena"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$especialidad = $_POST["especialidad"];

// Consulta SQL para insertar datos en la base de datos
$sql = "INSERT INTO personal (dni,contrasena,nombres, apellido, email, fechaNacimiento, especialidad)
VALUES ('$dni','$contrasena','$nombre', '$apellido', '$email', '$fecha_nacimiento', '$especialidad')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
        header("Location: personal.php");
} else {
    echo "Error al registrar: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
