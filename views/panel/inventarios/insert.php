<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    date_default_timezone_set('America/El_Salvador');
    
    $idusuario = $_SESSION["idusuario"];
    $idempleado = buscavalor("empleados","idempleado","idusuario='$idusuario'");

    $idproducto = $_POST['idproducto'];
    $idinventario = $_POST['idinventario'];
    $precio_venta = $_POST['precioU'];
    $old_stock = $_POST['old_stock'];
    $stock = $_POST['stock'];
    $pdesc = $_POST['pdesc'];
    $fecha = date('Y-m-d H:i:s');

    $tdesc = ($stock * $precio_venta)*($pdesc/100);
    $total = ($stock * $precio_venta) - $tdesc;

    $tabla0 = "detalle_preventa";
    $campos0 = "idempleado, idproducto, precio, cantidad, descuento, precio_total, fecha, estado";
    $valores0 = "'$idempleado', '$idproducto', '$precio_venta', '$stock', '$tdesc', '$total', '$fecha',0";

    $insert = CRUD("INSERT INTO $tabla0($campos0) VALUES($valores0)","i");

?>
<?php if($insert):?>
    <?php
        $stockI = buscavalor("inventarios","stock","idinventario='$idinventario'");

        $newStockP = $old_stock - $stock;

        $newStockI = $stockI - $stock;

        $update = CRUD("UPDATE inventarios SET stock='$newStockI' WHERE idinventario='$idinventario'","u");
        $update = CRUD("UPDATE productos SET stock='$newStockP' WHERE idproducto='$idproducto'","u");
    ?>
    <script>
    $(document).ready(function(){
        alertify.success("Producto agregado al carrito");
        $("#contenido").load("./views/panel/inventarios/principal.php");
    });
    </script>
<?php else:?>
    <script>
    $(document).ready(function(){
        alertify.error("Error: No se agrego Producto al carrito");
        $("#contenido").load("./views/panel/inventarios/principal.php");
    });
    </script>
<?php endif?>

