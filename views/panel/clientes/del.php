<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idcliente = $_GET['idcliente'];

    $tabla = "clientes";
    $condicion = "idcliente='$idcliente'";

    $delete = CRUD("DELETE FROM $tabla  WHERE $condicion","d");

    if($delete)
    {
        echo '<script>
                alertify.success("Cliente eliminado");
                $("#contenido-panel").load("./views/panel/clientes/principal.php");
            </script>';
    }
    else
    {
        echo '<script>
                alertify.error("Error: cliente no eliminado");
                $("#contenido-panel").load("./views/panel/clientes/principal.php");
            </script>';
    }
?>