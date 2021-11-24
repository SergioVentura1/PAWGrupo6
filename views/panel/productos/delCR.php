<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idcodreg = $_GET['idcodreg'];

    $codregistro = buscavalor("codregistros","codreg","idcr='$idcodreg'");

    $buscaData = buscavalor("productos","COUNT(codproducto)","codproducto='$codregistro'");
    
    if($buscaData !=0)
    {
        echo '<script> 
                alertify.alert("Eliminar Código Producto","Codigo Registro/producto no puede ser eliminado ya que se encuentra asignado a un producto");
                $("#contenido-panel").load("./views/panel/productos/principal_registro.php");
            </script>';
    }
    else
    {
        $tabla = "codregistros";
        $condicion = "idcr='$idcodreg'";

        $del = CRUD("DELETE FROM $tabla WHERE $condicion","d");

        if($del)
        {
            echo '<script> 
                    alertify.success("Codigo Registro/producto eliminado");
                    $("#contenido-panel").load("./views/panel/productos/principal_registro.php");
                </script>';
        }else
        {
            echo '<script> 
                    alertify.error("Error: Codigo Registro/producto no eliminado");
                    $("#contenido-panel").load("./views/panel/productos/principal_registro.php");
                </script>';
        }
    }

?>