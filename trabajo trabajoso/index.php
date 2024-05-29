<?php
$servername = "localhost";
$dbname = "coche_db";
$username = "root";
$password = "";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del coche
$coche = $conn->query("SELECT * FROM coche LIMIT 1")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos del Coche</title>

</head>
<body>
    
    <?php include 'formulario.php'; ?>
</body>
</html>

<?php
$conn->close();
?>

