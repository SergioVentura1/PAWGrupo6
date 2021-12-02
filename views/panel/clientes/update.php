<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idcliente = $_POST['idcliente'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $dui = $_POST['dui'];
    
    
    $campos = "nombres='$nombres',apellidos='$apellidos',dui='$dui',direccion='$direccion',telefono='$telefono'";

    $condicion = "idcliente='$idcliente'";

    $Update = CRUD("UPDATE clientes SET $campos WHERE $condicion","u");
    
    if($Update)
    {
        echo '<script>
                $(document).ready(function(){
                    alertify.success("Cliente actualizado...");
                    $("#contenido-panel").load("./views/panel/clientes/principal.php");
                });
            </script>';
    }
    else{
        echo '<script>
                $(document).ready(function(){
                    alertify.error("Error al actualizar cliente...");
                    $("#contenido-panel").load("./views/panel/clientes/principal.php");
                });
            </script>';
    }
?>