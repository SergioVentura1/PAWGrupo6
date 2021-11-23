<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idproducto = $_GET['idproducto'];

    $DataProducto = CRUD("SELECT * FROM productos WHERE idproducto='$idproducto'","s");

    foreach($DataProducto as $result)
    {
        $codproducto = $result['codproducto'];
        $producto = $result['producto'];
        $descripcion = $result['descripcion'];
        $precio_venta = $result['precio_venta'];
        $precio_compra = $result['precio_compra'];
        $idproveedor = $result['idproveedor'];
        $fecha_ingreso = $result['fecha_ingreso'];
        $stock = $result['stock'];
        $imagen = $result['imagen'];
        $estado = $result['estado'];
    }

    if($estado == 1)
    {
        $tipoestado = "Disponible";
    }
    else
    {
        $tipoestado = " No Disponible";
    }

    //Tabla detalle inventario
    $iddi = buscavalor("detalle_inventario","iddi","idproducto='$idproducto'");
    //Tabla inventario para buscar idinventario
    $idinventario = buscavalor("inventarios","idinventario","codproducto='$codproducto'");
    //Tabla inventario para buscar idicategoria
    $idcategoria = buscavalor("inventarios","idcategoria","idinventario = '$idinventario'");
    //Tabla categorias
    $categoria = buscavalor("categorias","categoria","idcategoria = '$idcategoria' ");
    //Tabla codregistros
    $nombre_registro = buscavalor("codregistros","nombre_registro","codreg='$codproducto'");
    //Tabla proveedores
    $proveedor = buscavalor("proveedores","proveedor","idproveedor='$idproveedor'");

    $DataCR = CRUD("SELECT * FROM codregistros WHERE codreg != '$codproducto'","s"); //Tabla codregistros
    $DataCategorias = CRUD("SELECT * FROM categorias WHERE idcategoria != '$idcategoria'","s");//Tabla categorias
    $DataProveedores = CRUD("SELECT * FROM proveedores WHERE idproveedor != '$idproveedor'","s");//Tabla proveedores
?>
<script src="./public/js/funciones-productos.js"></script>
<script src="./public/js/funciones.js"></script>
<!-- Formulario para actualizar productos-->
<form id="UpdateProducto" enctype="multipart/formdata">
    <input type="hidden" name="idproducto" value="<?php echo $idproducto;?>">
    <input type="hidden" name="old_stock" value="<?php echo $stock;?>">
    <input type="hidden" name="idinventario" value="<?php echo $idinventario;?>">
    <input type="hidden" name="iddi" value="<?php echo $iddi;?>">
    <input type="hidden" name="codproducto" value="<?php echo $codproducto;?>">
    <div class="row">
        <div class="col md-6">
            <!--Codigo serie del producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Codigo Seria:</label>
                </div>
                <input type="text" class="form-control" value="<?php echo $codproducto;?>" readonly="ON">
            </div>
              <!--ID de categoria:-->
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Categoria:</label>
                </div>
                <select class="custom-select" name="idcategoria" id="idcategoria">
                    <option value="<?php echo $idcategoria;?>"  selected><?php echo $categoria;?></option>
                <?php foreach($DataCategorias AS $result):?>
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
                    <option value="<?php echo $idproveedor;?>"  selected><?php echo $proveedor;?></option>
                <?php foreach($DataProveedores AS $result):?>
                    <option value="<?php echo $result['idproveedor'];?>"><?php echo $result['proveedor'];?></option>
                <?php endforeach?>
                </select>
            </div>
            <!--Nombre producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombre del producto: </span>
                </div>
                    <textarea type="text" name="producto" class="form-control" placeholder="nombre producto" required="ON"><?php echo $producto;?></textarea>
            </div>
            <!--Descripcion producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Descripción: </span>
                </div>
                    <textarea type="text" name="descripcion" class="form-control" placeholder="descripcion del producto" required="ON"><?php echo $descripcion;?></textarea>
            </div>
          
        </div>
        <div class="col md-6">
            <!--Precio venta producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Precio venta: </span>
                </div>
                    <input type="decimal" name="precio_venta" class="form-control" placeholder="$00.00" required="ON" value="<?php echo $precio_venta;?>">
            </div>
            <!--Precio compra producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Precio Compra: </span>
                </div>
                    <input type="decimal" name="precio_compra" class="form-control" placeholder="$00.00" required="ON" value="<?php echo $precio_compra;?>">
            </div>
            <!--Fecha ingreso producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Fecha de ingreso: </span>
                </div>
                    <input type="date" name="fecha_ingreso" class="form-control" placeholder="fecha ingreso" required="ON" value="<?php echo $fecha_ingreso;?>">
            </div>
            <!--stock producto:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Stock: </span>
                </div>
                    <input type="number" name="stock" class="form-control" placeholder="stock" required="ON" value="<?php echo $stock;?>">
            </div>
            <!--Estado:-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Estado:</label>
                </div>
                <select class="custom-select" name="estado" id="estado">
                    <option value="<?php echo $estado;?>" selected><?php echo $tipoestado;?></option>
                <?php if($estado == 1): ?>
                    <option value="0">No Disponible</option>
                <?php else:?>
                    <option value="1">Disponible</option>
                    <?php endif?>
                </select>
            </div>
            <!--Imagen producto:-->
            <div>
                <figure class="figure">
                    <img src="./public/img/productos/<?php echo $imagen;?>" class="figure-img img-fluid rounded" width="150px;" alt="...">
                </figure>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Cambiar imagen</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input imagen" name="imagen" id="" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Imagen</label>
                </div>
            </div>
            <div>
                <img src="" width="200px" alt="" id="muestraimagen">
            </div>
            <div style="margin-top:10px">
                <button class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </div>
</form>