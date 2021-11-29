<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $dui = $_POST['dui'];
    $idusuario = $_POST['idusuario'];

    $campos = "nombres,apellidos,dui,direccion,telefono,idusuario";
    $valores = "'$nombres','$apellidos','$dui','$direccion','$telefono','$idusuario'";

    $insert = CRUD("INSERT INTO empleados($campos) VALUES($valores)","i");
    
    if($insert)
    {
        echo '<script>
                $(document).ready(function(){
                    alertify.success("Empleado/a registrado/a...");
                    $("#contenido-panel").load("./views/panel/empleados/principal.php");
                });
            </script>';
    }
    else{
        echo '<script>
                $(document).ready(function(){
                    alertify.error("Error al registrar empleado/a...");
                    $("#contenido-panel").load("./views/panel/empleados/principal.php");
                });
            </script>';
    }
?>