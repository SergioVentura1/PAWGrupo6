<?php
    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    $id_producto = $_GET['id_producto'];

    $dataProd = CRUD("SELECT * FROM productos WHERE id_producto='$id_producto'","s");
    

    foreach ($dataProd AS $result)
    {
        $id_producto = $result['id_producto'];
        $cod_producto = $result['cod_producto'];
        $nombre_producto = $result['nombre_producto'];
        $descripcion = $result['descripcion'];
        $precio_compra = $result['precio_compra'];
        $precio_venta = $result['precio_venta'];
        $stock = $result['stock'];
        $fecha_ingreso = $result['fecha_ingreso'];
        
        $descuento = $result['descuento'];
       
    };

?>
<script src="../../public/js/funciones-productos.js"></script>
<form id="UpdProd">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Id producto</span>
        </div>
        <input type="text" name="id_producto" class="form-control" value="<?php echo $id_producto;?>" require="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Código</span>
        </div>
        <input type="text" name="cod_producto" class="form-control" value="<?php echo $cod_producto;?>" require="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Nombre</span>
        </div>
        <input type="text" name="nombre_producto" class="form-control" value="<?php echo $nombre_producto;?>" require="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Descripción</span>
        </div>
        <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion;?>" require="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Precio Compra</span>
        </div>
        <input type="text" name="precio_compra" class="form-control" value="<?php echo $precio_compra;?>" require="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Precio Venta</span>
        </div>
        <input type="text" name="precio_venta" class="form-control" value="<?php echo $precio_venta;?>" require="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Stock</span>
        </div>
        <input type="int" name="stock" class="form-control" value="<?php echo $stock;?>" placeholder="stock" require="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Fecha Ingreso</span>
        </div>
        <input type="date" name="fecha_ingreso" class="form-control" value="<?php echo $fecha_ingreso;?>" require="ON">
    </div>
    
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Descuento</span>
        </div>
        <input type="text" name="descuento" class="form-control" value="<?php echo $descuento;?>" require="ON">
    </div>
    <button class="btn btn-success">Actualizar</button>
</form>