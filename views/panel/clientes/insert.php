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
    

    $campos = "nombres,apellidos,dui,direccion,telefono";
    $valores = "'$nombres','$apellidos','$dui','$direccion','$telefono'";

    $insert = CRUD("INSERT INTO clientes($campos) VALUES($valores)","i");
    
    if($insert)
    {
        echo '<script>
                $(document).ready(function(){
                    alertify.success("Cliente registrado/a...");
                    $("#contenido-panel").load("./views/panel/clientes/principal.php");
                });
            </script>';
    }
    else{
        echo '<script>
                $(document).ready(function(){
                    alertify.error("Error al registrar cliente...");
                    $("#contenido-panel").load("./views/panel/clientes/principal.php");
                });
            </script>';
    }
?>