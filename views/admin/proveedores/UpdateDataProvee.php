<?php

    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    $id_proveedor = $_GET['id_proveedor'];

    $dataProve = CRUD("SELECT * FROM proveedores WHERE id_proveedor='$id_proveedor'", "s");

    foreach ($dataProve AS $result)
    {
        $nombre_proveedor = $result['nombre_proveedor'];
        $direccion = $result['direccion'];
        $telefono = $result['telefono'];
        $correo = $result['correo'];
    }

?>
<script src="../../public/js/funciones-proveedores.js"></script>
<form id="Upd-Provee">
    <input type="hidden" name="id_proveedor" value="<?php echo $id_proveedor; ?>">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Proveedor: </span>
        </div>
        <input type="text" name="nombre_proveedor" class="form-control" value="<?php echo $nombre_proveedor; ?>" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Dirección: </span>
        </div>
        <input type="text" name="direccion" class="form-control" value="<?php echo $direccion; ?>" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Teléfono: </span>
        </div>
        <input type="text" name="telefono" class="form-control" value="<?php echo $telefono; ?>" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Correo: </span>
        </div>
        <input type="text" name="correo" class="form-control" value="<?php echo $correo; ?>" required="ON">
    </div>
    <button class="btn btn-success">Actualizar</button>
</form>