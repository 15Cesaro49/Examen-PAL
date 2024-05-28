<?php
class CarModel {
    private $PDO;

    public function __construct() {
        require_once("c://xampp/htdocs/proyecto/config/db.php");
        $con = new db();
        $this->PDO = $con->conexion();
    }

    public function insertar($nombre, $marca, $modelo, $anio, $color, $vin, $tipo_motor, $transmision, $kilometraje, $numero_puertas, $propietario_anterior, $combustible, $equipamiento) {
        $stament = $this->PDO->prepare("INSERT INTO cars VALUES (null, :nombre, :marca, :modelo, :anio, :color, :vin, :tipo_motor, :transmision, :kilometraje, :numero_puertas, :propietario_anterior, :combustible, :equipamiento)");
        $stament->bindParam(":nombre", $nombre);
        $stament->bindParam(":marca", $marca);
        $stament->bindParam(":modelo", $modelo);
        $stament->bindParam(":anio", $anio);
        $stament->bindParam(":color", $color);
        $stament->bindParam(":vin", $vin);
        $stament->bindParam(":tipo_motor", $tipo_motor);
        $stament->bindParam(":transmision", $transmision);
        $stament->bindParam(":kilometraje", $kilometraje);
        $stament->bindParam(":numero_puertas", $numero_puertas);
        $stament->bindParam(":propietario_anterior", $propietario_anterior);
        $stament->bindParam(":combustible", $combustible);
        $stament->bindParam(":equipamiento", $equipamiento);
        return ($stament->execute()) ? $this->PDO->lastInsertId() : false;
    }

    public function show($id) {
        $stament = $this->PDO->prepare("SELECT id, nombre, marca, modelo, anio, color, vin, tipo_motor, transmision, kilometraje, numero_puertas, propietario_anterior, combustible, equipamiento FROM cars WHERE id = :id LIMIT 1");
        $stament->bindParam(":id", $id);
        return ($stament->execute()) ? $stament->fetch() : false;
    }

    public function index() {
        $stament = $this->PDO->prepare("SELECT id, nombre, marca, modelo, anio, color, vin, tipo_motor, transmision, kilometraje, numero_puertas, propietario_anterior, combustible, equipamiento FROM cars");
        return ($stament->execute()) ? $stament->fetchAll() : false;
    }

    public function update($id, $nombre, $marca, $modelo, $anio, $color, $vin, $tipo_motor, $transmision, $kilometraje, $numero_puertas, $propietario_anterior, $combustible, $equipamiento) {
        $stament = $this->PDO->prepare("UPDATE cars SET nombre = :nombre, marca = :marca, modelo = :modelo, anio = :anio, color = :color, vin = :vin, tipo_motor = :tipo_motor, transmision = :transmision, kilometraje = :kilometraje, numero_puertas = :numero_puertas, propietario_anterior = :propietario_anterior, combustible = :combustible, equipamiento = :equipamiento WHERE id = :id");
        $stament->bindParam(":nombre", $nombre);
        $stament->bindParam(":marca", $marca);
        $stament->bindParam(":modelo", $modelo);
        $stament->bindParam(":anio", $anio);
        $stament->bindParam(":color", $color);
        $stament->bindParam(":vin", $vin);
        $stament->bindParam(":tipo_motor", $tipo_motor);
        $stament->bindParam(":transmision", $transmision);
        $stament->bindParam(":kilometraje", $kilometraje);
        $stament->bindParam(":numero_puertas", $numero_puertas);
        $stament->bindParam(":propietario_anterior", $propietario_anterior);
        $stament->bindParam(":combustible", $combustible);
        $stament->bindParam(":equipamiento", $equipamiento);
        $stament->bindParam(":id", $id);
        return ($stament->execute()) ? $id : false;
    }

    public function delete($id) {
        $stament = $this->PDO->prepare("DELETE FROM cars WHERE id = :id");
        $stament->bindParam(":id", $id);
        return ($stament->execute()) ? true : false;
    }
}
?>
