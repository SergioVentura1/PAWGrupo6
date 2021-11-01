<?php
    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    $id_proveedor = $_GET['id_proveedor'];

    $updDrop = CRUD("DELETE FROM `proveedores` WHERE `proveedores`.`id_proveedor` =$id_proveedor ", "d");
?>