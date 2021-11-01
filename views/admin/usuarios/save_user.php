<?php
    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    $objeto = new ConexionBD();
    $conexion = $objeto->get_conexion();

    $user = $_POST['user'];
    $clave = password_hash($_POST['clave'],PASSWORD_DEFAULT);
    $tipo = $_POST['tipo_user'];
        
    //Obtener los atributos del archivo.
    $imgFile = $_FILES['imagen']['name'];
    $tmp_dir = $_FILES['imagen']['tmp_name'];
    $tmpSize = $_FILES['imagen']['size'];

    $path = "../../../public/img/usuarios/";
    
    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));

    $newName = $user.".".$imgExt;

    $carga_img = CargaIMG($tmp_dir,$newName,$path);

    $tabla ="usuarios";
    $campos = " usuario, clave, token, tipo, foto, estado";
    $valores = " '$user', '$clave',NULL,'$tipo','$newName',1";

    $query1 = "SELECT *FROM usuarios WHERE usuario = '$user'";

    //$insertData = $conexion->query("INSERT INTO $tabla($campos) VALUES($valores)");
?>
    <?php if(CountReg($query1)!= 0):?>
        <script>
            alertify.error("Usuario ya existe...");
            $("#contenido").load("usuarios/principal.php");
        </script>
    <?php else:?>
        <?php switch($carga_img)
        {
            case 0;
                echo'<script>
                        alertify.error("Datos registrados...");
                        $("#contenido").load("usuarios/principal.php");
                    </script>';
                break;
            case 1:
                $query2 = "INSERT INTO $tabla($campos) VALUES($valores)";
                if(CRUD($query2,"i"))
                {
                    echo ' <script>
                        alertify.success("Datos registrados...");
                        $("#contenido").load("usuarios/principal.php");
                    </script>';
                }
                else
                {
                    echo '<script>
                        alert("Error al registrar datos...");
                        $("#contenido").load("usuarios/principal.php");
                    </script>';
                }
            break;
        }
        ?>
    <?php endif?>