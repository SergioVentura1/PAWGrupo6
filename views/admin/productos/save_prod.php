<?php
    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    $objeto = new ConexionBD();
    $conexion = $objeto->get_conexion();

    $id_producto = $_POST['id_producto'];
    $cod_producto = $_POST["cod_producto"];
    $nombre_producto = $_POST['nombre_producto'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    $stock = $_POST['stock'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $estado = $_POST['estado'];
    $descuento = $_POST['descuento'];
        
    //Obtener los atributos del archivo.
    $imgFile = $_FILES['imagen']['name'];
    $tmp_dir = $_FILES['imagen']['tmp_name'];
    $tmpSize = $_FILES['imagen']['size'];

    $path = "../../../public/img/productos/";
    
    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));

    $newName = $nombre_producto.".".$imgExt;

    $carga_img = CargaIMG($tmp_dir,$newName,$path);

    //PARA TABLA 1: PRODUCTOS
    $tabla ="productos";
    $campos = "id_producto,cod_producto, nombre_producto, id_categoria, descripcion, precio_compra, precio_venta, stock, fecha_ingreso, estado, descuento, imagen";
    $valores = "'$id_producto','$cod_producto', '$nombre_producto', '$categoria', '$descripcion','$precio_compra','$precio_venta','$stock','$fecha_ingreso','1','$descuento','$newName'";

    //PARA TABLA 2: INVENTARIO
    $tabla1 = "inventarios";
    $campos1 = "id_producto,id_categoria,stock";
    $valores1 = "'$id_producto','$categoria','$stock'";
    $query1 = "SELECT *FROM productos WHERE id_producto = '$id_producto'";

    //$insertData = $conexion->query("INSERT INTO $tabla($campos) VALUES($valores)");
?>
    <?php if(CountReg($query1)!= 0):?>
        <script>
            alertify.error("producto ya existente...");
            $("#contenido").load("productos/principal.php");
        </script>
    <?php else:?>
        <?php switch($carga_img)
        {
            case 0;
                echo'<script>
                        alertify.error("Datos registrados...");
                        $("#contenido").load("productos/principal.php");
                    </script>';
                break;
            case 1:
                $query2 = "INSERT INTO $tabla($campos) VALUES($valores)";
                $query3 = "INSERT INTO $tabla1($campos1) VALUES($valores1)";
                if(CRUD($query2,"i"))
                {
                    if(CRUD($query3,"i"))
                    { 
                        echo '<script>
                            alertify.success("Datos registrados...");
                            $("#contenido").load("productos/principal.php");
                        </script>';
                    }
                    else
                    {
                        echo '<script>
                            alert("Error al registrar datos...");
                            $("#contenido").load("productos/principal.php");
                        </script>';
                    }
                }
                else
                {
                        echo '<script>
                            alert("Error al registrar datos...");
                            $("#contenido").load("productos/principal.php");
                        </script>';
                }
            break;
        }
        ?>
    <?php endif?>

    