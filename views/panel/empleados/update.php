<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idempleado = $_POST['idempleado'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $dui = $_POST['dui'];
    $idusuario = $_POST['idusuario'];
    
    $campos = "nombres='$nombres',apellidos='$apellidos',dui='$dui',direccion='$direccion',telefono='$telefono',idusuario='$idusuario'";

    $condicion = "idempleado='$idempleado'";

    $Update = CRUD("UPDATE empleados SET $campos WHERE $condicion","u");
    
    if($Update)
    {
        echo '<script>
                $(document).ready(function(){
                    alertify.success("Empleado actualizado...");
                    $("#contenido-panel").load("./views/panel/empleados/principal.php");
                });
            </script>';
    }
    else{
        echo '<script>
                $(document).ready(function(){
                    alertify.error("Error al actualizar empleado...");
                    $("#contenido-panel").load("./views/panel/empleados/principal.php");
                });
            </script>';
    }
?>