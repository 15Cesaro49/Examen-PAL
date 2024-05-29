<?php

class CocheManager {
    private $conexion;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conexion = new mysqli($servername, $username, $password, $dbname);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function guardarCoche($marca, $modelo, $color, $numero_bastidor, $velocidad_actual, $id = null) {
        if ($id === null) {
            $sql = "INSERT INTO coche (marca, modelo, color, numero_bastidor, velocidad_actual)
                    VALUES ('$marca', '$modelo', '$color', '$numero_bastidor', '$velocidad_actual')";
        } else {
            $sql = "UPDATE coche SET marca='$marca', modelo='$modelo', color='$color', 
                    numero_bastidor='$numero_bastidor', velocidad_actual='$velocidad_actual' WHERE id='$id'";
        }

        if ($this->conexion->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarCoche($id) {
        $sql = "DELETE FROM coche WHERE id='$id'";

        if ($this->conexion->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerCoches() {
        $coches = array();

        $sql = "SELECT id, marca, modelo, color, numero_bastidor, velocidad_actual FROM coche";
        $resultado = $this->conexion->query($sql);

        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                $coches[] = $fila;
            }
        }

        return $coches;
    }

    public function __destruct() {
        $this->conexion->close();
    }
}

?>
