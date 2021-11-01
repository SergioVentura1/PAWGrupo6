<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-inventario.js"></script>
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

    $query = "SELECT * FROM inventarios";

    if(isset($_GET['like']))
    {
        $valor = $_GET['valor'];
        $queryLike = "SELECT * FROM inventarios WHERE id_inventario LIKE '%$valor%' OR stock LIKE '%$valor%'";
        $dataProd = CRUD($queryLike,"s");
    }
    else
    {
        $dataProd = CRUD("SELECT * FROM inventarios ORDER BY id_inventario LIMIT $inicio, $registros", "s");
    }
        
    $num_registro = CountReg($query);

    /*ceil es una función de PHP sirve para redondear un numerero mayor por ejemplo: 2.5 lo redondea a
    un numero maximo a 3*/
    $paginas = ceil($num_registro / $registros);

?>

<div class="card">
    <div class="card-header bg-dark text-white">
        <b>Panel de Inventario</b>
    </div>
    <div class="card-body">
        <div id="result-form">
            <div class="row">
            <div class="col-md-4">
                    <div style="margin-bottom:10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <select id="select-reg" class="custom-select" style="width:210px">
                                    <option value="0" disabled selected>Seleccione Nº Registros</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</3option>
                                    <option value="6">6</option>
                                    <option value="12">12</option>
                                    <option value="1000">Mostrar todos los datos</option>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <?php if($dataProd):?>
                        <?php include 'table_productos.php'; ?>
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
                            <div class="alert alert-danger">No se encontraron más datos ....</div>
                        <?php endif?>
                    <?php else:?>
                        <div class="alert alert-info">Datos no encontrados ...</div>
                    <?php endif?>
                </div>
            </div>
        </div>
    </div>
</div>