<?php
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';
    
    $idcodreg = $_POST['idcr'];
    $codreg = $_POST['codreg'];
    $nombre_registro = $_POST['nombrereg'];
    

    $tabla = "codregistros";
    $campos = "codreg='$codreg', nombre_registro ='$nombre_registro'";
    $condicion ="idcr ='$idcodreg'";
    $update = CRUD("UPDATE $tabla SET $campos WHERE $condicion","u");

    if($update){
        echo '<script>
                alertify.success("Datos actualizados...");
                $("#contenido-panel").load("./views/panel/productos/principal_registro.php");
            </script>';
    }
    else{
        echo '<script>
                alertify.error("Error al actualizar datos...");
                $("#contenido-panel").load("./views/panel/productos/principal_registro.php");
            </script>';
    }
?>