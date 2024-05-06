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

    // Prepara la consulta SQL para insertar un nuevo estudiante
    $sql = "INSERT INTO estudiantes (Codigo, Nombre, Apellido_Paterno, Apellido_Materno, Fecha_de_Nacimiento, Correo_electronico, Telefono, Direccion, Carrera)
    VALUES ('$codigo', '$nombre', '$apellido_paterno', '$apellido_materno', '$fecha_nacimiento', '$correo_electronico', '$telefono', '$direccion', '$carrera')";

    if ($conn->query($sql) === TRUE) {
        //echo "Estudiante agregado correctamente";
        // Redirecciona al index.php después de agregar el estudiante
        header("Location: index.php");
        exit();
    } else {
        echo "Error al agregar estudiante: " . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
}
