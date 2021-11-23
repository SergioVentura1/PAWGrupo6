<?php 
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

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

    // Atributos del archivo imagen
    $imgFile = $_FILES['imagen']['name'];
    $tmp_dir = $_FILES['imagen']['tmp_name'];
    $imgSize = $_FILES['imagen']['size'];

    $path = "../../../public/img/productos/";

    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));//Obtenemos la extención del archivo
    $newName = $codproducto.".".$imgExt;//Asignar un nuevo nombre al archivo

    $carga_img = CargaIMG($tmp_dir,$newName,$path);

    //funcion para buscar codigo producto en la tabla inventarios.
    $buscaData = buscavalor("inventarios","COUNT(codproducto)","codproducto='$codproducto'");

    $tabla0 ="productos";
    $campos0 ="idproducto,codproducto,producto,descripcion,precio_venta,precio_compra,idproveedor,fecha_ingreso,stock,imagen,estado";
    $valores0="'$idproducto','$codproducto','$producto','$descripcion','$precio_venta','$precio_compra','$idproveedor','$fecha_ingreso','$stock','$newName',1";

    $carga_img = CargaIMG($tmp_dir,$newName,$path);

    switch($carga_img)
    {
        case 0;
            echo '<script>
                    alertify.error("Error datos e Imagen no cargados...");
                    $("#ModalNewProducto").modal("hide");
                    $("#contenido-panel").load("./views/panel/productos/principal.php");
                </script>';
            break;
        case 1:
            if(CRUD("INSERT INTO $tabla0($campos0) VALUES($valores0)","i"))
            {
                if($buscaData != 0)
                {
                    //busca si ya existe un valor en stock en tabla inventarios
                    $stockInventario =buscavalor("inventarios","stock","codproducto='$codproducto'");
                    $newStock = ($stockInventario +$stock);
                    
                    //Para actualizar datos en tabla inventario, si el registro ya existe
                    $tabla1 = "inventarios";
                    $campos1U = "stock = '$newStock'";
                    $condicion1 = "codproducto='$codproducto'";
                     
                    $updateI = CRUD("UPDATE $tabla1 SET $campos1U WHERE $condicion1","u");

                    //busca si ya existe un valor de idinventario en tabla inventarios.
                    $idinventario = buscavalor("inventarios","idinventario","codproducto='$codproducto'");

                    //Para insertar datos en tabla detalle_inventario
                    $tabla2 = "detalle_inventario";
                    $campos2 = "idinventario,idproducto,fecha_ingreso,idcategoria,stock";
                    $valores2 = "'$idinventario','$idproducto','$fecha_ingreso','$idcategoria','$stock'";

                    $InsertDI = CRUD("INSERT INTO $tabla2($campos2) VALUES ($valores2)","i");
                }
                else
                {
                    $tabla1 = "inventarios";
                    $campos1I = "codproducto, idcategoria, stock";
                    $valores1 = "'$codproducto','$idcategoria','$stock'";

                    $insertI = CRUD("INSERT INTO $tabla1($campos1I) VALUES ($valores1)","i");
                    $idinventario = buscavalor("inventarios","idinventario","codproducto='$codproducto'");

                    $tabla2 = "detalle_inventario";
                    $campos2 = "idinventario,idproducto,fecha_ingreso,idcategoria,stock";
                    $valores2 = "'$idinventario','$idproducto','$fecha_ingreso','$idcategoria','$stock'";

                    $InsertDI = CRUD("INSERT INTO $tabla2($campos2) VALUES ($valores2)","i");
                }
                echo '<script>
                        alertify.success("Producto registrado");
                        $("#ModalNewProducto").modal("hide");
                        $("#contenido-panel").load("./views/panel/productos/principal.php");
                    </script>';
            }
            else
            {
                echo '<script>
                        alertify.error("Error al registrar productos");
                        $("#ModalNewProducto").modal("hide");
                        $("#contenido-panel").load("./views/panel/productos/principal.php");
                    </script>';
            }
        break;

    }
?>