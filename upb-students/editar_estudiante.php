<?php
// Verifica si se ha enviado el código del estudiante
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

    // Consulta para obtener los datos del estudiante
    $sql = "SELECT * FROM estudiantes WHERE Codigo='$codigo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Mostrar el formulario dentro del modal con los datos del estudiante
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

            <!-- Compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Estudiante</title>
            <style>
                /*SELECT STYLES*/
                .select-wrapper input.select-dropdown:focus {
                    border-bottom: 1px solid #000 !important;
                }

                .dropdown-content li>a,
                .dropdown-content li>span {
                    color: #000 !important;
                }

                /* INPUT STYLES*/

                /* label color */
                .input-field label {
                    color: #000 !important;
                }

                /* label focus color */
                .input-field input[type="text"]:focus+label,
                .input-field input[type="password"]:focus+label,
                .input-field input[type="email"]:focus+label,
                .input-field input[type="number"]:focus+label,
                .input-field input[type="tel"]:focus+label,
                .input-field input[type="url"]:focus+label,
                .input-field input[type="date"]:focus+label,
                .input-field textarea:focus+label {
                    color: #000 !important;
                }

                /* label underline focus color */
                .input-field input[type="text"]:focus,
                .input-field input[type="password"]:focus,
                .input-field input[type="email"]:focus,
                .input-field input[type="number"]:focus,
                .input-field input[type="tel"]:focus,
                .input-field input[type="url"]:focus,
                .input-field input[type="date"]:focus,
                .input-field textarea:focus {
                    border-bottom: 1px solid #000 !important;
                    box-shadow: 0 1px 0 0 #000 !important;
                }

                /* valid color */
                .input-field input[type="text"].valid,
                .input-field input[type="password"].valid,
                .input-field input[type="email"].valid,
                .input-field input[type="number"].valid,
                .input-field input[type="tel"].valid,
                .input-field input[type="url"].valid,
                .input-field input[type="date"].valid,
                .input-field textarea.valid {
                    border-bottom: 1px solid #000 !important;
                    box-shadow: 0 1px 0 0 #000 !important;
                }

                /* invalid color */
                .input-field input[type="text"].invalid,
                .input-field input[type="password"].invalid,
                .input-field input[type="email"].invalid,
                .input-field input[type="number"].invalid,
                .input-field input[type="tel"].invalid,
                .input-field input[type="url"].invalid,
                .input-field input[type="date"].invalid,
                .input-field textarea.invalid {
                    border-bottom: 1px solid #000 !important;
                    box-shadow: 0 1px 0 0 #000 !important;
                }

                /* icon prefix focus color */
                .input-field .prefix.active {
                    color: #000 !important;
                }

                /* Cambia el color del radio button cuando está seleccionado */
                input[type="radio"].with-gap:checked+span:after {
                    background-color: #000;
                    /* Cambia el color a azul (#2196F3) */
                    border-color: #000;
                    /* Cambia el color del borde a azul (#2196F3) */
                }

                /* Cambia el color del círculo externo cuando el radio button está seleccionado */
                input[type="radio"].with-gap:checked+span:not(.lever):before {
                    border: 2px solid #000;
                    /* Cambia el color del borde a azul (#2196F3) */
                }
            </style>
        </head>

        <body class="grey lighten-2">
            <div class="container">
                <h3 class="blue-text text-darken-4 center-align">Estudiante #<?php echo $codigo; ?></h3>
                <div class="row">
                    <form class="col s12" action="actualizar_estudiante.php" method="POST">
                        <div class="card-panel">
                            <div class="row">
                                <div class="input-field col s6 hide">

                                    <input type="text" id="codigo" name="codigo" value="<?php echo $row['Codigo']; ?>" required>
                                    <label for="codigo">Código</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" id="nombre" name="nombre" value="<?php echo $row['Nombre']; ?>" required>
                                    <label for="nombre">Nombre</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">face_6</i>
                                    <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?php echo $row['Apellido_Paterno']; ?>" required>
                                    <label for="apellido_paterno">Apellido Paterno</label>
                                </div>

                            </div>

                            <!-- Agrega los demás campos del formulario aquí -->
                            <div class="row">

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">face_3</i>
                                    <input type="text" id="apellido_materno" name="apellido_materno" value="<?php echo $row['Apellido_Materno']; ?>" required>
                                    <label for="apellido_materno">Apellido Materno</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">cake</i>
                                    <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $row['Fecha_de_Nacimiento']; ?>" required>
                                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                </div>
                            </div>
                            <div class="row">

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">mail</i>
                                    <input type="email" id="correo_electronico" name="correo_electronico" value="<?php echo $row['Correo_electronico']; ?>" required>
                                    <label for="correo_electronico">Correo Electrónico</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">call</i>
                                    <input type="tel" id="telefono" name="telefono" value="<?php echo $row['Telefono']; ?>" required>
                                    <label for="telefono">Teléfono</label>
                                </div>
                            </div>
                            <div class="row">

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">home</i>
                                    <input type="text" id="direccion" name="direccion" value="<?php echo $row['Direccion']; ?>" required>
                                    <label for="direccion">Dirección</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">school</i>
                                    <input type="text" id="carrera" name="carrera" value="<?php echo $row['Carrera']; ?>" required>
                                    <label for="carrera">Carrera</label>
                                </div>
                            </div>


                            <!-- Agrega los demás campos del formulario aquí -->
                            <div class="row">
                                <div class="col s12">
                                    <button type="submit" class="btn blue darken-4" style="float: right;"><i class="material-icons left">save</i>Guardar</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <!-- Compiled and minified JavaScript -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        </body>

        </html>
<?php
    } else {
        echo "Estudiante no encontrado";
    }

    // Cierra la conexión
    $conn->close();
} else {
    echo "No se proporcionó un código de estudiante";
}
?>