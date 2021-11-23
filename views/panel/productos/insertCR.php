<?php
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $codreg = $_POST['idcodreg'];
    $nombre_registro = $_POST['nombrereg'];
    
    $tabla ="codregistros";
    $campos = "codreg,nombre_registro";
    $valores = "'$codreg','$nombre_registro'";

    $query1 = "SELECT *FROM codregistros WHERE codreg = '$codreg'";   
?>
<?php if(CountReg($query1)!=0):?>
    <script>
        alertify.error("Codigo/Registro ya existe, intente con uno nuevo...");
        $("#ModalNewCR").modal("hide");
        $("#contenido-panel").load("./views/panel/productos/principal_registro.php");
    </script>
<?php else:?>
    
    <?php  $query2 = "INSERT INTO $tabla($campos) VALUES($valores)";
        if(CRUD($query2,"i")){
            echo '<script>
                    alertify.success("Datos registrados...");
                    $("#ModalNewCR").modal("hide");
                    $("#contenido-panel").load("./views/panel/productos/principal_registro.php");
                </script>';
        }
        else{
            echo '<script>
                    alert("Error al registrar datos...");
                    $("#ModalNewCR").modal("hide");
                    $("#contenido-panel").load("./views/panel/productos/principal_registro.php");
                </script>';
        }
        ?>
    
<?php endif?>