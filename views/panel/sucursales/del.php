<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idempresa = $_GET['idempresa'];

    $tabla = "empresa";
    $condicion = "idempresa='$idempresa'";

    $delete = CRUD("DELETE FROM $tabla  WHERE $condicion","d");

    if($delete)
    {
        echo '<script>
                alertify.success("Sucursal eliminada");
                $("#contenido-panel").load("./views/panel/sucursales/principal.php");
            </script>';
    }
    else
    {
        echo '<script>
                alertify.error("Error: sucursal no eliminada");
                $("#contenido-panel").load("./views/panel/sucursales/principal.php");
            </script>';
    }
?>