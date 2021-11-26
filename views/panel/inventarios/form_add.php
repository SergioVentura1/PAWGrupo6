<script src="./public/js/funciones-inventarios.js"></script>
<script src="./public/js/funciones.js"></script>
<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idproducto = $_GET['idproducto'];
    $idinventario = $_GET['idinventario'];
    $producto = buscavalor("productos","producto","idproducto='$idproducto'");
    $stock = buscavalor("productos","stock","idproducto='$idproducto'");
    $precio_venta = buscavalor("productos","precio_venta","idproducto='$idproducto'");
?>

<form id="NewAddProducto">    
    <input type="hidden" name="idproducto" value="<?php echo $idproducto?>">
    <input type="hidden" name="idinventario" value="<?php echo $idinventario?>">
    <input type="hidden" name="precioU" value="<?php echo $precio_venta?>">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Producto: </span>
        </div>
        <input type="text" class="form-control" value="<?php echo $producto;?>" readonly>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Stock: </span>
        </div>
        <input type="text" name ="old_stock" class="form-control" value="<?php echo $stock; ?>" readonly>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Unidades: </span>
        </div>
        <input type="number" name ="stock" class="form-control" required="ON">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Descuento</label>
        </div>
            <select class="custom-select" name="pdesc">
                <option value="0"  selected>0%</option>
                <option value="5"  >5%</option>
                <option value="10"  >10%</option>
            </select>
    </div>
    <div style="margin-top:10px">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>