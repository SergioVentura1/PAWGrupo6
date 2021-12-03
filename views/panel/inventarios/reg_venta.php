<?php
@session_start();
include '../../../models/conexion.php';
include '../../../controllers/funciones.php';
include '../../../models/procesos.php';


if(isset($_POST['nom_cliente'])!="")
{
    echo $cliente = $_POST['nom_cliente'];
}
else
{
    $cliente =NULL;
}
if(isset($_POST['idcliente'])!="0")
{
    echo $idcliente = $_POST['idcliente'];
}
else
{
    $idcliente = 0;
}
    $iddpv = $_POST['iddpv'];
    
    $Siddpv = implode(",",$iddpv);

    $i = 0;
    for($i = 0; $i < COUNT($iddpv); $i++)
    {
        $iddpv0 = $iddpv[$i];
        $update = CRUD("UPDATE detalle_preventa SET idcliente='$idcliente',
        cliente='$cliente', estado=1 WHERE iddpv ='$iddpv0'","u");
    }
?>
<?php if($update):?>
    
    <script>
    $(document).ready(function(){
        alertify.success("Venta Registrada");
        $("#contenido").load("./views/panel/inventarios/principal.php");
    });
    </script>
<?php else:?>
    <script>
    $(document).ready(function(){
        alertify.error("Error: No se Registro la venta");
        $("#contenido").load("./views/panel/inventarios/preventa.php");
    });
    </script>
<?php endif?>