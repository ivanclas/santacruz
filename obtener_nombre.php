<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["dni"])) {
    $dni = $_POST["dni"];
    
    // Configura la conexión a la base de datos
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "registro";
    
    $conn = new mysqli($host, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    
    // Realiza una consulta SQL para buscar al paciente por DNI
    $sql = "SELECT nombres, fechanacimiento FROM pacientes WHERE Dni = '$dni'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row["nombres"];
        $fecha_nacimiento = $row["fechanacimiento"];
        echo json_encode(array("nombre" => $nombre, "fecha_nacimiento" => $fecha_nacimiento));
    } else {
        echo json_encode(array("nombre" => null, "fecha_nacimiento" => null));
    }
    
    $conn->close();
} else {
    echo json_encode(array("nombre" => null, "fecha_nacimiento" => null));
}
?>
