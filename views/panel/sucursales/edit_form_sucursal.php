<?php
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idempresa = $_GET['idempresa'];

    $dataSucursales = CRUD("SELECT * FROM empresa WHERE idempresa = '$idempresa'","s");

    foreach ($dataSucursales AS $result)
    {
        $nombre = $result['nombre'];
        $direccion = $result['direccion'];
        $telefono = $result['telefono'];             
        
    }
    
?>
<script src="./public/js/funciones-sucursales.js"></script>
<script src="./public/js/funciones.js"></script>
<form id="UpdateSucursal">
    <input type="hidden" name="idempresa" value="<?php echo $idempresa;?>">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group mb-3">  
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombre: </span>
                </div>
                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre;?>" required="ON">
            </div>            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Dirección:</span>
                </div>
                <textarea class="form-control" name="direccion" placeholder="" required="ON"><?php echo $direccion;?></textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Teléfono: </span>
                </div>
                <input type="text" class="form-control tel" name="telefono" value="<?php echo $telefono;?>" required="ON">
            </div>
        </div>
        
    </div>
    
    <div>
        <button class="btn btn-primary">Actualizar</button>
    </div>
</form>