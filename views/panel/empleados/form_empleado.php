<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $DataUsuarios = CRUD("SELECT * FROM usuarios WHERE idusuario NOT IN (SELECT idusuario FROM empleados)","s"); // Datos Tabla Usuarios
?>
<script src="./public/js/funciones-empleados.js"></script>
<script src="./public/js/funciones.js"></script>
<form id="NewEmpleado">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group mb-3">  
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombres: </span>
                </div>
                <input type="text" class="form-control" name="nombres" required="ON">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Apellidos: </span>
                </div>
                <input type="text" class="form-control" name="apellidos" required="ON">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Dirección:</span>
                </div>
                <textarea class="form-control" name="direccion" placeholder="" required="ON"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Teléfono: </span>
                </div>
                <input type="text" class="form-control tel" name="telefono" required="ON">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">DUI: </span>
                </div>
                <input type="text" class="form-control dui" name="dui" required="ON">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Usuario:</label>
                </div>
                <select class="custom-select" name="idusuario" id="id-usuario">
                    <option value="0" selected>Selecciona Usuario</option>
                <?php foreach ($DataUsuarios AS $result):?>
                    <option value="<?php echo $result['idusuario'];?>"><?php echo $result['usuario']." (". $result['idusuario'].")";?></option>
                <?php endforeach?>
                </select>
            </div>
        </div>
    </div>
    
    <div>
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>