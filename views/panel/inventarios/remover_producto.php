<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $iddpv = $_GET['iddpv'];
    $idproducto = $_GET['idproducto'];

    $codproducto = buscavalor("productos","codproducto","idproducto='$idproducto'");
    $idinventario = buscavalor("inventarios","idinventario","codproducto='$codproducto'");
    $estado = buscavalor("productos","estado","idproducto='$idproducto'");

    $stockDPV = buscavalor("detalle_preventa","cantidad","iddpv='$iddpv'");

    $stockI = buscavalor("inventarios","stock","idinventario='$idinventario'");

    $stockP = buscavalor("productos","stock","idproducto='$idproducto'");

    $newStockI = ($stockI + $stockDPV);

    $newStockP = ($stockP + $stockDPV);

    if($estado == 0)
    {
        $estado = 1;
    }

    $update = CRUD("UPDATE productos SET stock='$newStockP', estado='$estado' WHERE idproducto='$idproducto'","u");
    $update = CRUD("UPDATE inventarios SET stock='$newStockI' WHERE idinventario='$idinventario'","u");

    if($update)
    {
        CRUD("DELETE FROM detalle_preventa WHERE iddpv='$iddpv'","d");
        echo '<script>
                $(document).ready(function(){
                    alertify.set("notifier","position", "top-right");
                    alertify.notify("Producto eliminado de carrito....");
                    $("#contenido").load("./views/panel/inventarios/preventa.php");
                });
            </script>';
    }
    else
    {
        echo '<script>
                $(document).ready(function(){
                    alertify.set("notifier","position", "top-right");
                    alertify.notify("Producto eliminado de carrito....");
                    $("#contenido").load("./views/panel/inventarios/preventa.php");
                });
            </script>';
    }
?>
