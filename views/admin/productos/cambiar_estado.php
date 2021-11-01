<?php

    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    $id_producto = $_GET['id_producto'];
    $estado = $_GET['estado'];

    $updEstado = CRUD("UPDATE productos SET estado='$estado' WHERE id_producto='$id_producto'","u");
?>

<?php if($updEstado):?>
    <script>
        alertify.success("Estado Actualizado...");
        $("#contenido").load("productos/principal.php");
    </script>
<?php else:?>
    <script>
        alertify.error();("Error al actualizar estado...");
        $("#contenido").load("productos/principal.php");
    </script>
<?php endif?>