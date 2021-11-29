<?php 
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $idinventario = $_POST['idinventario'];
    $iddi = $_POST['iddi'];
    $old_stock = $_POST['old_stock'];
    $idproducto = $_POST['idproducto'];
    $codproducto = $_POST['codproducto'];
    $idcategoria = $_POST['idcategoria'];
    $idproveedor = $_POST['idproveedor'];
    $producto = $_POST['producto'];
    $descripcion = $_POST['descripcion'];
    $precio_venta = $_POST['precio_venta'];
    $precio_compra = $_POST['precio_compra'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $stock = $_POST['stock'];
    $estado = $_POST['estado'];

    if($old_stock == $stock)
    {
        $newStockI = buscavalor("inventarios","stock","codproducto='$codproducto'");
    }
    else
    {
        $stockInventario = buscavalor("inventarios","stock","codproducto='$codproducto'");
        $newStock = ($stockInventario - $old_stock);
        $newStockI = ($stock + $newStock);
    }

    // Obtenemos los atributos del archivo
    $imgFile = $_FILES['imagen']['name'];
    $tmp_dir = $_FILES['imagen']['tmp_name'];
    $imgSize = $_FILES['imagen']['size'];

    if($imgSize > 0)
    {
        $path = "../../../public/img/productos/";
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
        $newName = $codproducto.".".$imgExt;
        $carga_img = CargaIMG($tmp_dir,$newName,$path);

        $tabla0 ="productos";
        $campos0 ="producto = '$producto',descripcion = '$descripcion', precio_venta = '$precio_venta', precio_compra = '$precio_compra', idproveedor = '$idproveedor', fecha_ingreso = '$fecha_ingreso', stock = '$stock', imagen = '$newName',estado = $estado";
        $condicion0 = "idproducto = '$idproducto' AND codproducto='$codproducto'";

        $tabla1 ="inventarios";
        $campos1 = "codproducto='$codproducto',idcategoria='$idcategoria',stock='$newStockI'";
        $condicion1 = "idinventario='$idinventario' AND codproducto='$codproducto'";

        $tabla2 = "detalle_inventario";
        $campos2 = "idinventario='$idinventario', idproducto = '$idproducto', fecha_ingreso = '$fecha_ingreso', idcategoria='$idcategoria', stock = '$stock'";
        $condicion2 = "iddi = '$iddi'";

        switch($carga_img)
        {
            case 0;
                echo '<script>
                        alertify.error("Error datos e Imagen no cargados...");
                        $("#ModalEditProducto").modal("hide");
                        $("#contenido-panel").load("./views/panel/productos/principal.php");
                    </script>';
                break;

            case 1 :
                $update = CRUD("UPDATE $tabla0 SET $campos0 WHERE $condicion0","u");
                $update = CRUD("UPDATE $tabla1 SET $campos1 WHERE $condicion1","u");
                $update = CRUD("UPDATE $tabla2 SET $campos2 WHERE $condicion2","u");
                
                if($update)
                {
                    echo' <script>
                            alertify.success("Datos actualizados...");
                            $("#contenido-panel").load("./views/panel/productos/principal.php");
                        </script>';
                }
                else
                {
                    echo' <script>
                            alertify.error("ERROR: Datos no actualizados...");
                            $("#contenido-panel").load("./views/panel/productos/principal.php");
                        </script>';
                }
                break;
        }
    }
    else
    {
        $tabla0 ="productos";
        $campos0 ="producto = '$producto',descripcion = '$descripcion', precio_venta = '$precio_venta', precio_compra = '$precio_compra', idproveedor = '$idproveedor', fecha_ingreso = '$fecha_ingreso', stock = '$stock', estado = $estado";
        $condicion0 = "idproducto = '$idproducto'";

        $tabla1 ="inventarios";
        $campos1 = "idcategoria='$idcategoria',stock='$newStockI'";
        $condicion1 = "idinventario='$idinventario' AND codproducto='$codproducto'";

        $tabla2 = "detalle_inventario";
        $campos2 = "idinventario='$idinventario', idproducto = '$idproducto', fecha_ingreso = '$fecha_ingreso', idcategoria='$idcategoria', stock = '$stock'";
        $condicion2 = "iddi = '$iddi'";

        $update = CRUD("UPDATE $tabla0 SET $campos0 WHERE $condicion0","u");
        $update = CRUD("UPDATE $tabla1 SET $campos1 WHERE $condicion1","u");
        $update = CRUD("UPDATE $tabla2 SET $campos2 WHERE $condicion2","u");

        if($update)
        {
           echo' <script>
                    alertify.success("Datos actualizados...");
                    $("#contenido-panel").load("./views/panel/productos/principal.php");
                </script>';
        }
        else
        {
            echo' <script>
                    alertify.error("ERROR: Datos no actualizados...");
                    $("#contenido-panel").load("./views/panel/productos/principal.php");
                </script>';
        }
    }
?>