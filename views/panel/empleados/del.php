<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idempleado = $_GET['idempleado'];
    $valor = $_GET['valor'];

    $idusuario = buscavalor("empleados","idusuario","idempleado='$idempleado'");

    $tabla = "usuarios";
    $condicion = "idusuario='$idusuario'";

    $Update = CRUD("UPDATE $tabla SET estado = '$valor' WHERE $condicion","d");

    if($Update)
    {
        if($valor==1)
        {
            echo '<script>
                    $(document).ready(function(){
                    alertify.success("Acceso a empleado habilitado...");
                    $("#contenido-panel").load("./views/panel/empleados/principal.php");
                    });
            </script>';
        }
        else{
            echo '<script>
                    $(document).ready(function(){
                    alertify.success("Acceso a empleado desahabilitado...");
                    $("#contenido-panel").load("./views/panel/empleados/principal.php");
                    });
            </script>';
        }
    }
    else
    {
        echo '<script>
                $(document).ready(function(){
                    alertify.error("Error al actualizar acceso...");
                    $("#contenido-panel").load("./views/panel/empleados/principal.php");
                });
            </script>';
    }
?>