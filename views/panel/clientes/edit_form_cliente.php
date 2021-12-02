<?php
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idcliente = $_GET['idcliente'];

    $dataCliente = CRUD("SELECT * FROM clientes WHERE idcliente = '$idcliente'","s");

    foreach ($dataCliente AS $result)
    {
        $nombres = $result['nombres'];
        $apellidos = $result['apellidos'];
        $direccion = $result['direccion'];
        $telefono = $result['telefono'];
        $dui = $result['dui'];       
        
    }
    
?>
<script src="./public/js/funciones-clientes.js"></script>
<script src="./public/js/funciones.js"></script>
<form id="UpdateCliente">
    <input type="hidden" name="idcliente" value="<?php echo $idcliente;?>">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group mb-3">  
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombres: </span>
                </div>
                <input type="text" class="form-control" name="nombres" value="<?php echo $nombres;?>" required="ON">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Apellidos: </span>
                </div>
                <input type="text" class="form-control" name="apellidos" value="<?php echo $apellidos;?>" required="ON">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Dirección:</span>
                </div>
                <textarea class="form-control" name="direccion" placeholder="" required="ON"><?php echo $direccion;?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Teléfono: </span>
                </div>
                <input type="text" class="form-control tel" name="telefono" value="<?php echo $telefono;?>" required="ON">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">DUI: </span>
                </div>
                <input type="text" class="form-control dui" name="dui" value="<?php echo $dui;?>" required="ON">
            </div>
            
            
        </div>
    </div>
    
    <div>
        <button class="btn btn-primary">Actualizar</button>
    </div>
</form>