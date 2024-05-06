<?php
// Verifica si se ha enviado el código del estudiante a eliminar
if (isset($_GET['codigo'])) {
    // Recibe el código del estudiante
    $codigo = $_GET['codigo'];

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

    // Consulta SQL para eliminar el estudiante
    $sql = "DELETE FROM estudiantes WHERE Codigo='$codigo'";

    if ($conn->query($sql) === TRUE) {
        //echo "Estudiante eliminado correctamente";
        // Redirecciona al index.php después de eliminar el estudiante
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar estudiante: " . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
} else {
    echo "No se proporcionó un código de estudiante";
}
