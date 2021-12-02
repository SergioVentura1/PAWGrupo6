<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

?>
<script src="./public/js/funciones-clientes.js"></script>
<script src="./public/js/funciones.js"></script>
<form id="NewCliente">
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
            
        </div>
    </div>
    
    <div>
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>