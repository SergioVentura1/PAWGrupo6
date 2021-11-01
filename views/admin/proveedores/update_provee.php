<?php

    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    //$objeto = new ConexionBD();
    //$conexion = $objeto->get_conexion();

    $id_proveedor = $_POST['id_proveedor'];
    $nombre_proveedor = $_POST['nombre_proveedor'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

?>
<?php if (CRUD("UPDATE proveedores SET nombre_proveedor ='$nombre_proveedor', direccion='$direccion',  telefono='$telefono',  correo='$correo' WHERE id_proveedor='$id_proveedor'","u")) : ?>
    <script>
        alertify.success("Proveedor Actualizado ...");
        $('#UpdProv').modal('hide');
        $("#contenido").load("proveedores/principal.php");
    </script>
<?php else : ?>
    <script>
        alertify.error("Error al actualizar proveedor ...");
        $('#UpdProv').modal('hide');
        $("#contenido").load("proveedores/principal.php");
    </script>
<?php endif ?>