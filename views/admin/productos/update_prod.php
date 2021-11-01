<?php
    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

       
    $id_producto = $_POST['id_producto'];
    $cod_producto = $_POST['cod_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    $stock = $_POST['stock'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $descuento = $_POST['descuento'];

?>

<?php if(CRUD("UPDATE productos SET id_producto= '$id_producto', cod_producto='$cod_producto',nombre_producto='$nombre_producto',descripcion='$descripcion',precio_compra='$precio_compra',
    precio_venta='$precio_venta',stock='$stock',fecha_ingreso='$fecha_ingreso',descuento='$descuento' WHERE id_producto ='$id_producto'", "u")):?>
    <script>
        alertify.success("Producto actualizado...");
        $('#ProdUpd').modal('hide');
        $("#contenido").load("productos/principal.php");
    </script>
<?php else:?>
    <script>
        alertify.error("Error al actualizar Producto...");
        $('#ProdUpd').modal('hide');
        $("#contenido").load("productos/principal.php");
    </script>
<?php endif?>
