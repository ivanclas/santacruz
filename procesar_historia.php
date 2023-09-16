
<?php
// Conexión a la base de datos MySQL
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
$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$diagnostico = $_POST["diagnostico"];
$tratamiento = $_POST["tratamiento"];
$fecha = $_POST["fecha"];
// Insertar datos en la base de datos
$sql = "INSERT INTO historias ( Dni, nombre, fecha_nacimiento, diagnostico, tratamiento, fecha)
VALUES ( '$dni','$nombre', '$fecha_nacimiento', '$diagnostico', '$tratamiento', '$fecha')";

if ($conn->query($sql) === TRUE) {
    echo "Historia Clínica registrada con éxito.";
     header("Location: Historia.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
