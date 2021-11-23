<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idproducto = $_GET['idproducto'];

    $busca_dpv = buscavalor("detalle_preventa","COUNT(idproducto)","idproducto='$idproducto'");

    if($busca_dpv !=0)
    {
        echo '<script> 
                alertify.alert("Eliminar Producto","El producto no puede ser eliminado ya que se encuentra en los registros de detalle preventa");
                $("#contenido-panel").load("./views/panel/productos/principal.php");
            </script>';
    }
    else
    {
        $codproducto = buscavalor("productos","codproducto","idproducto='$idproducto'");
        
        $stockProducto = buscavalor("productos","stock","idproducto='$idproducto'");
        
        $stockInventario = buscavalor("inventarios","stock","codproducto='$codproducto'");
        
        $newStock = ($stockInventario - $stockProducto);

        $updateI = CRUD("UPDATE inventarios SET stock='$newStock'","u");
        $del = CRUD("DELETE FROM productos WHERE idproducto= '$idproducto'","d");
        $del = CRUD("DELETE FROM detalle_inventario WHERE idproducto= '$idproducto'","d");

        if($del)
        {
            echo '<script> 
                        alertify.alert("Eliminar Producto","Producto eliminado");
                        $("#contenido-panel").load("./views/panel/productos/principal.php");
                </script>';
        }
        else
        {
            echo '<script> 
                        alertify.error("Producto no eliminado");
                        $("#contenido-panel").load("./views/panel/productos/principal.php");
                </script>';
        }
        
       
    }

?>