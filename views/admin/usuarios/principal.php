<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-usuarios.js"></script>
<script src="../../public/js/js_funciones.js"></script>

<?php
    session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    $cont = 0;
    $pagina = 0; 

    if(isset($_GET['num']))
    {
        $pagina = $_GET['num'];
    }

    if(isset($_GET['num_reg']))
    {
        $registros = $_GET['num_reg'];
    }
    else
    {
        $registros = 1;
    }

    if(!$pagina)
    {
        $inicio = 0;
        $pagina = 1;
    }
    else
    {
        $inicio = ($pagina -1)* $registros;
    }

    $query = "SELECT * FROM usuarios";

    if(isset($_GET['like']))
    {
        $valor = $_GET['valor'];
        $queryLike = "SELECT * FROM usuarios WHERE idusuario LIKE '%$valor%' OR usuario LIKE '%$valor%'";
        $dataUser = CRUD($queryLike,"s");
    }
    else
    {
        $dataUser = CRUD("SELECT * FROM usuarios ORDER BY idusuario LIMIT $inicio,$registros", "s");
    }
        
    $num_registro = CountReg($query);

    /*ceil es una función de PHP sirve para redondear un numero mayor por ejemplo: 2.5 lo redondea a
    un numero maximo a 3*/
    $paginas = ceil($num_registro / $registros);

?>

<div class="card">
  <div class="card-header bg-dark text-white">
  <b>Panel Usuario</b>
  </div>
    <div class="card-body">
        <div id="result-form">
            <div class="row">
                <div class="col-md-4">
                    <form id="data-user">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Usuario</span>
                            </div>
                            <input type="text" name="user" class="form-control" placeholder="Usuario" require="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Contraseña</span>
                            </div>
                            <input type="password" name="clave" class="form-control" placeholder="Ingresar contraseña" require="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Tipo Usuario:</label>
                            </div>
                            <select class="custom-select" name="tipo_user" id="tipo-user">
                                <option value="0" disabled selected>Seleccione Tipo</option>
                                <option value="1">Administrador</option>
                                <option value="2">Operador</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Fotos</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="imagen" id="imagen" 
                                aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose files</label>
                            </div>
                        </div>
                        <div>
                            <img src="" width="200px" alt="" id="muestraimagen">
                        </div>
                        <div style="margin-top:10px">
                            <button class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-8">
                    <div style="margin-bottom:10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <select id="select-reg" class="custom-select" style="width:210px">
                                <option value="0" disabled selected>Selccione N° Registros</ option>
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                    <option value="9">7</option>
                                    <option value="100">Mostrar todos los datos</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="search" class="form-control" placeholder="Busca Usuario" 
                                id="like-user" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <?php if($dataUser):?>
                        <?php include 'table_usuarios.php'; ?>
                        <?php if($num_registro > $registros): ?>
                            <?php if($pagina == 1):?>
                                <div style="text-align: center;">
                                    <a href="#" class="btn pagina disabled" v-num="<?php echo ($pagina - 0);?>" 
                                    num-reg="<?php echo $registros;?>">
                                        <i class="fas fa-chevron-circle-left fa-2x"></i>
                                    </a>
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina + 1);?>" 
                                    num-reg="<?php echo $registros;?>">
                                        <i class="fas fa-chevron-circle-right fa-2x"></i>
                                    </a>
                                </div>
                            <?php elseif($pagina == $paginas): ?>
                                <div style="text-align: center;">
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina - 1);?>" 
                                    num-reg="<?php echo $registros;?>">
                                        <i class="fas fa-chevron-circle-left fa-2x"></i>
                                    </a>
                                    <a href="#" class="btn pagina disabled" v-num="<?php echo ($pagina - 0);?>" 
                                    num-reg="<?php echo $registros;?>">
                                        <i class="fas fa-chevron-circle-right fa-2x"></i>
                                    </a>
                                </div>
                            <?php else:?>
                                <div style="text-align: center;">
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina - 1);?>" 
                                    num-reg="<?php echo $registros;?>">
                                        <i class="fas fa-chevron-circle-left fa-2x"></i>
                                    </a>
                                    <a href="" class="btn pagina" v-num="<?php echo ($pagina + 1);?>" 
                                    num-reg="<?php echo $registros;?>">
                                        <i class="fas fa-chevron-circle-right fa-2x"></i>
                                    </a>
                                </div>
                            <?php endif ?>
                        <?php else:?>
                            <div class="alert alert-danger">No se encontraron datos....</div>
                        <?php endif?>
                    <?php else:?>
                        <div class="alert alert-info">Datos no encontrados 3...</div>
                    <?php endif?>
                </div>
            </div>
        </div>
    </div>
</div>