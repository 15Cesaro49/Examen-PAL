<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "coche_db");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si se proporcionó un ID en la URL
if (isset($_GET['id'])) {
    // Obtener el ID del coche de la URL
    $id = $_GET['id'];

    // Consulta SQL para obtener los datos del coche con el ID proporcionado
    $consulta = "SELECT marca, modelo, color, numero_bastidor, velocidad_actual FROM coche WHERE id = $id";
    $resultado = $conexion->query($consulta);

    // Verificar si se encontraron resultados
    if ($resultado->num_rows > 0) {
        // Obtener los datos del coche
        $coche = $resultado->fetch_assoc();
        $marca = $coche["marca"];
        $modelo = $coche["modelo"];
        $color = $coche["color"];
        $numero_bastidor = $coche["numero_bastidor"];
        $velocidad_actual = $coche["velocidad_actual"];
    } else {
        echo "No se encontraron datos del coche.";
    }
} else {
    echo "No se proporcionó un ID de coche.";
}

// Cerrar conexión
$conexion->close();
?>
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
<div class="container">
    <h1>Formulario de Edición de Coches</h1>
    <form action="actualizar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Incluir el ID del coche en un campo oculto -->
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?php echo $marca; ?>" required>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?php echo $modelo; ?>" required>

        <label for="color">Color:</label>
        <input type="text" id="color" name="color" value="<?php echo $color; ?>" required>

        <label for="numero_bastidor">Número de bastidor:</label>
        <input type="text" id="numero_bastidor" name="numero_bastidor" value="<?php echo $numero_bastidor; ?>" required>

        <label for="velocidad_actual">Velocidad Actual:</label>
        <input type="number" id="velocidad_actual" name="velocidad_actual" value="<?php echo $velocidad_actual; ?>" required>

        <input type="submit" value="Actualizar">
    </form>
</div>
