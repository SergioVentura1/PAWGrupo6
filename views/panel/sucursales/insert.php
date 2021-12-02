<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $nombre = $_POST['nombre'];    
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    
    

    $campos = "nombre,direccion,telefono";
    $valores = "'$nombre','$direccion','$telefono'";

    $insert = CRUD("INSERT INTO empresa($campos) VALUES($valores)","i");
    
    if($insert)
    {
        echo '<script>
                $(document).ready(function(){
                    alertify.success("Sucursal registrada");
                    $("#contenido-panel").load("./views/panel/sucursales/principal.php");
                });
            </script>';
    }
    else{
        echo '<script>
                $(document).ready(function(){
                    alertify.error("Error al registrar sucursal");
                    $("#contenido-panel").load("./views/panel/sucursales/principal.php");
                });
            </script>';
    }
?>