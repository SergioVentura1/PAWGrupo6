<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    date_default_timezone_set('America/El_Salvador');

    $idusuario =  $_SESSION["idusuario"];
    $idempleado = buscavalor("empleados","idempleado","idusuario='$idusuario'");

    $dataPreventa = CRUD("SELECT * FROM detalle_preventa WHERE estado=0 AND idempleado='$idempleado'","s");

    $cont_productos_preventa = buscavalor("detalle_preventa","COUNT(iddpv)","estado = 0 AND idempleado='$idempleado'");

    $cont=0;
    $contTP = 0;
    $contDesc = 0;
    $contTV = 0;

?>
<?php if($cont_productos_preventa != 0): ?>
<h4>Detalle Venta</h4>
<hr>
<script src="./public/js/funciones-navbar.js"></script>
<script src="./public/js/funciones-inventarios.js"></script>
<script src="./public/js/funciones.js"></script>

<form id="realizar-pago">
    
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>N°</th>
                <th>Código</th>
                <th>Producto</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Descuento</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($dataPreventa AS $result):?>
            <input type="text" value="<?php echo $result['iddpv'];?>" name="iddpv[]">
            <tr>
                <td><?php echo $cont +=1;?></td>
                <td>
                    <?php
                        $idproducto = $result['idproducto'];
                        echo $codproducto = buscavalor("productos","codproducto","idproducto='$idproducto'");  
                    ?>
                </td>
                <td><?php echo $producto = buscavalor("productos","producto","idproducto='$idproducto'");   ?></td>
                <td><?php echo $result['precio']; ?></td>
                <td><?php echo $result['cantidad']; ?></td>
                <td><?php echo $result['descuento']; ?></td>
                <td><?php echo $result['precio_total']; ?></td>
                <td>
                    <a href="" class="btn btn-danger remover-producto" id-dpv="<?php echo $result['iddpv']; ?>" id-producto="<?php echo $idproducto; ?>"><i class="fas fa-minus-circle"></i></a>
                </td>
                <?php 
                    $contTP += $result['cantidad'];
                    $contDesc +=  $result['descuento'];
                    $contTV += $result['precio_total'];
                ?>
            </tr>
        <?php endforeach ?>
        <tr>
            <td colspan="4">Total</td>
            <td>
                <?php 
                    echo $contTP;
                ?>
            </td>
            <td>
                <?php 
                    echo $contDesc;
                ?>
            </td>
            <td>
                <?php 
                    echo $contTV;
                ?>
            </td>
        </tr>
        </tbody>
    </table>
    <div>
        <button class="btn btn-primary">Registrar venta</button>
    </div>
</form>
<?php else: ?>
    <div class="alert alert-primary">No se encuentran productos agregados al carrito...</div>
<?php endif ?>