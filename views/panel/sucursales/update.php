<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idempresa = $_POST['idempresa'];
    $nombre = $_POST['nombre'];

    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    
    
    
    $campos = "nombre='$nombre',direccion='$direccion',telefono='$telefono'";

    $condicion = "idempresa='$idempresa'";

    $Update = CRUD("UPDATE empresa SET $campos WHERE $condicion","u");
    
    if($Update)
    {
        echo '<script>
                $(document).ready(function(){
                    alertify.success("Sucursal actualizada");
                    $("#contenido-panel").load("./views/panel/sucursales/principal.php");
                });
            </script>';
    }
    else{
        echo '<script>
                $(document).ready(function(){
                    alertify.error("Error al actualizar sucursal");
                    $("#contenido-panel").load("./views/panel/sucursales/principal.php");
                });
            </script>';
    }
?>