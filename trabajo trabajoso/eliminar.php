<?php
include 'CocheManager.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $cocheManager = new CocheManager("localhost", "root", "", "coche_db");

    $id = $_GET['id'];

    if ($cocheManager->eliminarCoche($id)) {
        echo "El coche se eliminó correctamente.";
    } else {
        echo "Error al eliminar el coche.";
    }
}
?>
