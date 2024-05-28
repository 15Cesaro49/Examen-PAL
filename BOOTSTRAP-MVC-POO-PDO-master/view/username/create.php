<?php
   require_once("../head/head.php");
?>

<form action="store.php" method="POST" autocomplete="off">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del usuario</label>
        <input type="text" name="nombre" required class="form-control" id="nombre">
    </div>
    <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <input type="text" name="marca" required class="form-control" id="marca" value="Toyota">
    </div>
    <div class="mb-3">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" name="modelo" required class="form-control" id="modelo" value="Corolla">
    </div>
    <div class="mb-3">
        <label for="anio" class="form-label">Año</label>
        <input type="number" name="anio" required class="form-control" id="anio" value="2020">
    </div>
    <div class="mb-3">
        <label for="color" class="form-label">Color</label>
        <input type="text" name="color" required class="form-control" id="color" value="Azul metálico">
    </div>
    <div class="mb-3">
        <label for="vin" class="form-label">Número de bastidor (VIN)</label>
        <input type="text" name="vin" required class="form-control" id="vin" value="JTDBBR32L10012345">
    </div>
    <div class="mb-3">
        <label for="tipo_motor" class="form-label">Tipo de motor</label>
        <input type="text" name="tipo_motor" required class="form-control" id="tipo_motor" value="1.8L I4">
    </div>
    <div class="mb-3">
        <label for="transmision" class="form-label">Transmisión</label>
        <input type="text" name="transmision" required class="form-control" id="transmision" value="Automática CVT">
    </div>
    <div class="mb-3">
        <label for="kilometraje" class="form-label">Kilometraje</label>
        <input type="number" name="kilometraje" required class="form-control" id="kilometraje" value="25000">
    </div>
    <div class="mb-3">
        <label for="numero_puertas" class="form-label">Número de puertas</label>
        <input type="number" name="numero_puertas" required class="form-control" id="numero_puertas" value="4">
    </div>
    <div class="mb-3">
        <label for="propietario_anterior" class="form-label">Propietario anterior</label>
        <input type="text" name="propietario_anterior" required class="form-control" id="propietario_anterior" value="Ninguno">
    </div>
    <div class="mb-3">
        <label for="combustible" class="form-label">Tipo de combustible</label>
        <input type="text" name="combustible" required class="form-control" id="combustible" value="Gasolina">
    </div>
    <div class="mb-3">
        <label for="equipamiento" class="form-label">Equipamiento adicional</label>
        <input type="text" name="equipamiento" required class="form-control" id="equipamiento" value="Sistema de navegación, cámara de reversa, asientos de cuero calefactables">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a class="btn btn-danger" href="index.php">Cancelar</a>
</form>

<?php
   require_once("../head/footer.php");
?>
