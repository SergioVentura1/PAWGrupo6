<?php 
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $DataCR = CRUD("SELECT * FROM codregistros","s"); //para tabla codigo registros.
    $DataProv = CRUD("SELECT * FROM proveedores","s"); //para tabla proveedores.
    $DataCate = CRUD("SELECT * FROM categorias","s"); //para tabla categorias.
    $DataMaxId = CRUD("SELECT MAX(idproducto) AS ultimoid FROM productos","s");//seleccionar el id del producto

    foreach($DataMaxId AS $result)
    {
        $idproducto = $result['ultimoid']+1;
    }
?>
<script src="./public/js/funciones-productos.js"></script>
<script src="./public/js/funciones.js"></script>
<form id="FormNewProducto" enctype="multipart/formdata">
    <input type="hidden" name="idproducto" value="<?php echo $idproducto;?>">
    <div class="row">
        <div class="col md-6">
            <!--Codigo serie del producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Codigo Seria:</label>
                </div>
                <select class="custom-select" name="codproducto" id="codproducto">
                    <option value="0"  selected>Seleccione Código de serie</option>
                <?php foreach($DataCR AS $result):?>
                    <option value="<?php echo $result['codreg'];?>"><?php echo $result['codreg'];?></option>
                <?php endforeach?>
                </select>
            </div>
              <!--ID de categoria:-->
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Categoria:</label>
                </div>
                <select class="custom-select" name="idcategoria" id="idcategoria">
                    <option value="0"  selected>Seleccione Categoria</option>
                <?php foreach($DataCate AS $result):?>
                    <option value="<?php echo $result['idcategoria'];?>"><?php echo $result['categoria'];?></option>
                <?php endforeach?>
                </select>
            </div>
            <!--ID del proveedor:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Proveedor:</label>
                </div>
                <select class="custom-select" name="idproveedor" id="idproveedor">
                    <option value="0"  selected>Seleccione Proveedor</option>
                <?php foreach($DataProv AS $result):?>
                    <option value="<?php echo $result['idproveedor'];?>"><?php echo $result['proveedor'];?></option>
                <?php endforeach?>
                </select>
            </div>
            <!--Nombre producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombre del producto: </span>
                </div>
                    <input type="text" name="producto" class="form-control" placeholder="nombre producto" required="ON">
            </div>
            <!--Descripcion producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Descripción: </span>
                </div>
                    <input type="text" name="descripcion" class="form-control" placeholder="descripcion del producto" required="ON">
            </div>
          
        </div>
        <div class="col md-6">
            <!--Precio venta producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Precio venta: </span>
                </div>
                    <input type="decimal" name="precio_venta" class="form-control" placeholder="$00.00" required="ON">
            </div>
            <!--Precio compra producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Precio Compra: </span>
                </div>
                    <input type="decimal" name="precio_compra" class="form-control" placeholder="$00.00" required="ON">
            </div>
            <!--Fecha ingreso producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Fecha de ingreso: </span>
                </div>
                    <input type="date" name="fecha_ingreso" class="form-control" placeholder="fecha ingreso" required="ON">
            </div>
            <!--stock producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Stock: </span>
                </div>
                    <input type="number" name="stock" class="form-control" placeholder="stock" required="ON">
            </div>
          
            <!--Imagen producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input imagen" name="imagen" id="" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <div>
                <img src="" width="200px" alt="" id="muestraimagen">
            </div>
            <div style="margin-top:10px">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</form>