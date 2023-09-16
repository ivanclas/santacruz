

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $dni = $_POST["dni"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["dc"];
    $edad = $_POST["edad"];
    $fechanacimiento = $_POST["fechanacimiento"];
    $telefono = $_POST["telefono"];
    $tiposangre = $_POST["tiposangre"];

    // Conexión a la base de datos (ajusta los detalles de la conexión)
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "registro";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Inserta el nuevo paciente en la base de datos
    $sql = "INSERT INTO pacientes (Dni,nombres, dc, edad, fechanacimiento, telefono, tiposangre) VALUES (?,?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ississs", $dni, $nombres, $apellidos, $edad, $fechanacimiento, $telefono, $tiposangre);

    if ($stmt->execute()) {
        echo "Paciente registrado exitosamente.";
         header("Location: registrar_paciente.php");
    } else {
        echo "Error al registrar el paciente: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

  <a href="registrar_paciente.php">Regresar al Registro de Pacientes</a>



