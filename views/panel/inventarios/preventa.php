<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    date_default_timezone_set('America/El_Salvador');
        
    $idusuario = $_SESSION["idusuario"];
    $idempleado = buscavalor("empleados","idempleado","idusuario='$idusuario'");

    $dataPreventa = CRUD("SELECT * FROM detalle_preventa WHERE estado =0 AND idempleado='$idempleado'","s");

    $cont = 0;
?>
<h4>Detalle de venta</h4>
<hr>
<form id="realizar-pago">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>N°</th>
                <th>Código</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Descuento</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>

    </table>
</form>