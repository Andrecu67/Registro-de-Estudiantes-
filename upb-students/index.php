<!DOCTYPE html>
<html lang="en">

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPB Estudiantes</title>

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
    <div style="margin-left: 50px; margin-right:50px;">

        <div class="row" style="margin-top: 25px;">
            <div class="col s2 offset-s5"> <img src="upb-logo.png" class="responsive-img"></div>
        </div>


        <div class="card-panel">
            <a class="waves-effect waves-light btn modal-trigger blue darken-4" style="float: right;" href="#modalAgregarEstudiante"><i class="material-icons left">add</i>Estudiante</a>

            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Correo electrónico</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Carrera</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Conexión a la base de datos
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "registro";

                    $conn = new mysqli($servername, $username, $password, $database);

                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    // Consulta para obtener los estudiantes
                    $sql = "SELECT * FROM estudiantes";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output de datos de cada fila
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Codigo"] . "</td>";
                            echo "<td>" . $row["Nombre"] . "</td>";
                            echo "<td>" . $row["Apellido_Paterno"] . "</td>";
                            echo "<td>" . $row["Apellido_Materno"] . "</td>";
                            echo "<td>" . $row["Fecha_de_Nacimiento"] . "</td>";
                            echo "<td>" . $row["Correo_electronico"] . "</td>";
                            echo "<td>" . $row["Telefono"] . "</td>";
                            echo "<td>" . $row["Direccion"] . "</td>";
                            echo "<td>" . $row["Carrera"] . "</td>";
                            // Agregar columna de acciones
                            echo "<td>";
                            echo "<a href='editar_estudiante.php?codigo=" . $row['Codigo'] . "'><i class='material-icons blue-text text-darken-4'>edit</i></a>"; // Icono para editar
                            echo "<a href='eliminar_estudiante.php?codigo=" . $row['Codigo'] . "' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este estudiante?\");'><i class='material-icons red-text'>delete</i></a>"; // Icono para eliminar
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No hay estudiantes registrados</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>

        </div>
        <div id="modalAgregarEstudiante" class="modal">
            <div class="modal-content">

                <form action="guardar_estudiante.php" method="POST">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">key</i>
                            <input placeholder="" type="text" id="codigo" name="codigo" required>
                            <label for="codigo">Código</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input placeholder="" type="text" id="nombre" name="nombre" required>
                            <label for="nombre">Nombre</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">face_6</i>
                            <input placeholder="" type="text" id="apellido_paterno" name="apellido_paterno" required>
                            <label for="apellido_paterno">Apellido Paterno</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">face_3</i>
                            <input placeholder="" type="text" id="apellido_materno" name="apellido_materno" required>
                            <label for="apellido_materno">Apellido Materno</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">cake</i>
                            <input placeholder="" type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">mail</i>
                            <input placeholder="" type="email" id="correo_electronico" name="correo_electronico" required>
                            <label for="correo_electronico">Correo electrónico</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">call</i>
                            <input placeholder="" type="tel" id="telefono" name="telefono" required>
                            <label for="telefono">Teléfono</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">home</i>
                            <input placeholder="" type="text" id="direccion" name="direccion" required>
                            <label for="direccion">Dirección</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">school</i>
                            <input placeholder="" type="text" id="carrera" name="carrera" required>
                            <label for="carrera">Carrera</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col s12">
                            <button type="submit" class="btn blue darken-4" style="float: right;"><i class="material-icons left">save</i>Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        // Inicialización del modal
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>
</body>

</html>