<?php
include 'CocheManager.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cocheManager = new CocheManager("localhost", "root", "", "coche_db");

    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $numero_bastidor = $_POST['numero_bastidor'];
    $velocidad_actual = $_POST['velocidad_actual'];

    if ($cocheManager->guardarCoche($marca, $modelo, $color, $numero_bastidor, $velocidad_actual, $id)) {
        echo "El coche se actualizó correctamente.";
    } else {
        echo "Error al actualizar el coche.";
    }
}
?>
