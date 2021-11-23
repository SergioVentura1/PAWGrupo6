<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idcodreg = $_GET['idcodreg'];
    
    $DataCR = CRUD("SELECT * FROM codregistros WHERE idcr = '$idcodreg'","s");

    foreach ($DataCR  AS $result)
    {
        $codreg = $result['codreg'];
        $nombre_registro = $result['nombre_registro'];
    }
?>
<script src="./public/js/funciones-productos.js"></script>
<script src="./public/js/funciones.js"></script>
<form id="UpdateCR">
    <input type="hidden" name="idcr" value="<?php echo $idcodreg; ?>">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Código Registro: </span>
        </div>
        <input type="text" name="codreg" class="form-control" value="<?php echo $codreg ; ?>" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Nombre Registro: </span>
        </div>
        <input type="text" name="nombrereg" class="form-control" value="<?php echo $nombre_registro; ?>" required="ON">
    </div>
    <div>
        <button class="btn btn-primary">Actualizar</button>
    </div>
</form>