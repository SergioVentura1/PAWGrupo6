<?php
    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    //$objeto = new ConexBD();
    //$conexion = $objeto->get_conexion();

    $nombre_proveedor = $_POST['nombre_proveedor'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $tabla = "proveedores";
    $campos = "nombre_proveedor, direccion, telefono, correo";
    $valores = "'$nombre_proveedor','$direccion','$telefono','$correo'";

    $query1 = "SELECT * FROM proveedores WHERE nombre_proveedor = '$nombre_proveedor'";
    $query2 = "INSERT INTO $tabla($campos) VALUES($valores)";

    //$insertData = $conexion->query("INSERT INTO $tabla ($campos) VALUES ($valores)");
?>
<?php if (CountReg($query1) > 0) : ?>
    <script>
        alertify.error("Proveedor ya registrado intente con uno nuevo ....");
        $("#contenido").load("proveedores/principal.php");
    </script>
<?php else : ?>

    <?php if (CRUD($query2, "i")) : ?>
        <script>
            alertify.success("Datos registrados...");
            $("#contenido").load("proveedores/principal.php");
        </script>
    <?php else : ?>
        <script>
            alert("Error datos no registrados...");
            $("#contenido").load("proveedores/principal.php");
        </script>
    <?php endif ?>
<?php endif ?>