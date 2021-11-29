<?php
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idempleado = $_GET['idempleado'];

    $dataEmpleado = CRUD("SELECT * FROM empleados WHERE idempleado = '$idempleado'","s");

    foreach ($dataEmpleado AS $result)
    {
        $nombres = $result['nombres'];
        $apellidos = $result['apellidos'];
        $direccion = $result['direccion'];
        $telefono = $result['telefono'];
        $dui = $result['dui'];
        $idusuario = $result['idusuario'];
        
    }
    $usuario = buscavalor("usuarios","usuario","idusuario='$idusuario'");

    $DataUsuarios = CRUD("SELECT * FROM usuarios WHERE tipo != 1 AND idusuario != '$idusuario' AND idusuario NOT IN (SELECT idusuario FROM empleados)","s");
?>
<script src="./public/js/funciones-empleados.js"></script>
<script src="./public/js/funciones.js"></script>
<form id="UpdateEmpleado">
    <input type="hidden" name="idempleado" value="<?php echo $idempleado;?>">
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
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Usuario:</label>
                </div>
                <select class="custom-select" name="idusuario" id="id-usuario">
                    <option value="<?php echo $idusuario;?>" selected><?php echo $usuario;?></option>
                <?php foreach ($DataUsuarios AS $result):?>
                    <option value="<?php echo $result['idusuario'];?>"><?php echo $result['usuario']." (". $result['idusuario'].")";?></option>
                <?php endforeach?>
                </select>
            </div>
            
        </div>
    </div>
    
    <div>
        <button class="btn btn-primary">Actualizar</button>
    </div>
</form>