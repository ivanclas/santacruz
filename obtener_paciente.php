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
    $sql = "SELECT nombres, dc,edad,fechanacimiento,telefono FROM pacientes WHERE Dni = '$dni'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombres_apellidos = $row["nombres"];
        $distrito_caserio = $row["dc"];
       $edad = $row["edad"];
         $fecha_nacimiento = $row["fechanacimiento"];
             $telefono = $row["telefono"];    


        echo json_encode(array("nombres" => $nombres_apellidos, "dc" => $distrito_caserio, "edad" => $edad, "fechanacimiento" => $fecha_nacimiento, "telefono" => $telefono
                              
                              ));
    } else {
        echo json_encode(array("nombres" => null, "dc" => null, "edad" => null, "fechanacimiento" => null, "telefono" => null));
    }
    
    $conn->close();
} else {
      echo json_encode(array("nombres" => null, "distrito_c" => null, "edad" => null, "fecha_nacimiento" => null, "telefono" => null));
    }
}
?>