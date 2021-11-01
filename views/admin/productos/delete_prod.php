<?php

    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    $id_producto = $_GET['id_producto'];

    $DeleteProd = CRUD("DELETE FROM `productos` WHERE `productos`.`id_producto` = '$id_producto'","d");

?>

<?php if($DeleteProd):?>
    <script>
        alertify.success("Producto eliminado exitosamente");
        //$("#ProdUpd").modal('hide');
        $("#contenido").load("productos/principal.php");
    </script>
<?php else:?>
    <script>
        alertity.error("Error al borrar producto");
        //$("#ProdUpd").modal('hide');
        $("#contenido").load("productos/principal.php");
    </script>
<?php endif?>