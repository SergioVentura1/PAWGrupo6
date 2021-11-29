<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $tipousuario = $_SESSION["tipo"];
    $cont = 0;

    if(isset($_GET['num']))
    {
        $pagina = $_GET['num'];
    }
    else
    {
        $pagina = 0;
    }

    if(isset($_GET['num_reg']))
    {
        $registros = $_GET['num_reg'];
    }
    else
    {
        $registros = 10;
    }

    if(!$pagina)
    {
        $inicio = 0;
        $pagina = 1;
    }
    else
    {
        $inicio = ($pagina-1)* $registros;
    }

    $query = "SELECT * FROM empleados";

    if(isset($_GET['like']))
    {
        $valor = $_GET['valor'];
        
        $queryLike = "SELECT * FROM empleados WHERE idempleado LIKE '%$valor%' OR nombres LIKE '%$valor%'";

        $dataEmpleados = CRUD($queryLike,"s");
    }
    else{
        $dataEmpleados = CRUD("SELECT * FROM empleados ORDER BY idempleado LIMIT $inicio,$registros", "s");

    }

    $num_registro = CountReg($query);
    $paginas = ceil($num_registro / $registros);
?>
    <script src="./public/js/funciones-navbar.js"></script>
    <script src="./public/js/funciones-empleados.js"></script>
    <script src="./public/js/funciones.js"></script>
    <script src="./public/js/text-oculto.js"></script>
<?php if($tipousuario == 1 || $tipousuario == 2):?>
    <div style="margin-bottom: 10px;">
        <div class="row">
            <div class="col-md-2">
                <a href="" class="btn btn-success BtnNewEmpleado"><i class="fas fa-plus"></i></a>
            </div>
            <div class="col-md-4">
                <select id="select-reg" class="custom-select" style="width:250px">
                    <option value="0" disabled selected>Seleccione N° Registros</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="9">9</option>
                    <option value="12">12</option>
                    <option value="20">20</option>
                </select>
            </div>

            <div class="col-md-6">
                <input type="search" class="form-control" placeholder="Busca Empleado" id="like" autocomplete="off">
            </div>
        </div>
    </div>
    <?php if($dataEmpleados):?>
        <div class="table-responsive">
            <?php include 'table_empleados.php'; ?>
        </div>
        
        <?php if($num_registro > $registros):?>
            <?php if($pagina == 1):?>
                <div style="text-align: center;">
                    <a href="" class="btn pagina" v-num="<?php echo ($pagina + 1); ?>" num-reg="<?php echo $registros;?>">
                        <i class="fas fa-arrow-alt-circle-right fa-2x"></i>
                    </a>
                </div>
            <?php elseif($pagina == $paginas): ?>
                <div style="text-align: center;">
                    <a href="" class="btn pagina" v-num="<?php echo ($pagina - 1); ?>" num-reg="<?php echo $registros;?>">
                        <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
                    </a>
                </div>
            <?php else:?>
                <div style="text-align: center;">
                    <a href="" class="btn pagina" v-num="<?php echo ($pagina - 1); ?>" num-reg="<?php echo $registros;?>">
                        <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
                    </a>

                    <a href="" class="btn pagina" v-num="<?php echo ($pagina + 1); ?>" num-reg="<?php echo $registros;?>">
                        <i class="fas fa-arrow-alt-circle-right fa-2x"></i>
                    </a>
                </div>
            <?php endif ?>
        <?php endif ?>
    <?php else:?>
        <div class="alert alert-info">Datos no encontrados...</div>
    <?php endif?>
<?php else:?>
    <div class="alert alert-danger">Módulo no disponible</div>
<?php endif?>