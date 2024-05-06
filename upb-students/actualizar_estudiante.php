<?php
// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $correo_electronico = $_POST["correo_electronico"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $carrera = $_POST["carrera"];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "registro";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para actualizar los datos del estudiante
    $sql = "UPDATE estudiantes SET 
            Nombre='$nombre', 
            Apellido_Paterno='$apellido_paterno', 
            Apellido_Materno='$apellido_materno', 
            Fecha_de_Nacimiento='$fecha_nacimiento', 
            Correo_electronico='$correo_electronico', 
            Telefono='$telefono', 
            Direccion='$direccion', 
            Carrera='$carrera' 
            WHERE Codigo='$codigo'";

    if ($conn->query($sql) === TRUE) {
        //echo "Estudiante actualizado correctamente";
        // Redirecciona al index.php después de actualizar el estudiante
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar estudiante: " . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
}
