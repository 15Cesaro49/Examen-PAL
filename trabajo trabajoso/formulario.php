<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Coches Registrados</title>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 400px;
            width: 100%;
            margin-bottom: 100px; /* Ajusta este valor según sea necesario */
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="submit"],
        button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
            outline: none;
        }

        input[type="submit"],
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #45a049;
        }

        input[type="submit"]:active,
        button:active {
            background-color: #3e8e41;
        }

        button {
            margin-top: 10px;
        }

        table {
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
        <h1>Formulario de Registro de Coches</h1>
        <form action="procesar.php" method="post">
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>

            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required>

            <label for="color">Color:</label>
            <input type="text" id="color" name="color" required>

            <label for="numero_bastidor">Número de bastidor:</label>
            <input type="text" id="numero_bastidor" name="numero_bastidor" required>

            <label for="velocidad_actual">Velocidad Actual:</label>
            <input type="number" id="velocidad_actual" name="velocidad_actual" required>

            <input type="submit" value="Registrar">
        </form>
    </div>

<div class="container">
        <h2>Datos de Coches Registrados</h2>
        <button onclick="window.print()">Imprimir</button> 
        <table>
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Número de bastidor</th>
                    <th>Velocidad Actual</th>
                </tr>
            </thead>
            <tbody>
           <?php
                $conexion = new mysqli("localhost", "root", "", "coche_db");
                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }
                $consulta = "SELECT id, marca, modelo, color, numero_bastidor, velocidad_actual FROM coche";
                $resultado = $conexion->query($consulta);
                if ($resultado === false) {
                    die("Error en la consulta SQL: " . $conexion->error);
                }
                if ($resultado->num_rows > 0) {
                    while($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["marca"] . "</td>";
                        echo "<td>" . $fila["modelo"] . "</td>";
                        echo "<td>" . $fila["color"] . "</td>";
                        echo "<td>" . $fila["numero_bastidor"] . "</td>";
                        echo "<td>" . $fila["velocidad_actual"] . "</td>";
                        echo "<td>";
                        echo "<a href='editar.php?id=" . $fila["id"] . "'>Editar</a>";
                        echo " | ";
                        echo "<a href='eliminar.php?id=" . $fila["id"] . "'>Eliminar</a>";
                        echo "</td>";
    
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay datos de coches registrados.</td></tr>";
                }
                $conexion->close();
            ?>
        </tbody>
    </table>
    </div>

</body>
</html>
