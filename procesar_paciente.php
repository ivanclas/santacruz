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

// Procesa el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST["dni"];
    $nombresApellidos = $_POST["nombres_apellidos"];
    $distritoCaserio = $_POST["distrito_caserio"];
    $edad = $_POST["edad"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $telefono = $_POST["telefono"];
    $tipoSangre = $_POST["tiposangre"];

    if (isset($_POST["registrar"])) {
        // Realiza una inserción en la base de datos
        $sql = "INSERT INTO pacientes (Dni, nombres, dc, edad, fechanacimiento, telefono, tiposangre) VALUES ('$dni', '$nombresApellidos', '$distritoCaserio', '$edad', '$fechaNacimiento', '$telefono', '$tipoSangre')";

        if ($conn->query($sql) === TRUE) {
            echo "Paciente registrado con éxito.";
             header("Location: registrar_paciente.php");
        } else {
            echo "Error al registrar al paciente: " . $conn->error;
        }
    } elseif (isset($_POST["modificar"])) {
        // Realiza una actualización en la base de datos
        $sql = "UPDATE pacientes SET nombres='$nombresApellidos', dc='$distritoCaserio', edad='$edad', fechanacimiento='$fechaNacimiento', telefono='$telefono', tiposangre='$tipoSangre' WHERE Dni='$dni'";

        if ($conn->query($sql) === TRUE) {
            echo "Paciente actualizado con éxito.";
             header("Location: ver_pacientes.php");
        } else {
            echo "Error al actualizar al paciente: " . $conn->error;
        }
    } elseif (isset($_POST["eliminar"])) {
        // Realiza una eliminación en la base de datos
        $sql = "DELETE FROM pacientes WHERE Dni='$dni'";

        if ($conn->query($sql) === TRUE) {
            echo "Paciente eliminado con éxito.";
        } else {
            echo "Error al eliminar al paciente: " . $conn->error;
        }
    } elseif (isset($_POST["ver_registrados"])) {
        // Redirige a la página que muestra los pacientes registrados
        header("Location: ver_pacientes.php");
        exit();
    }
}

$conn->close();
?>
