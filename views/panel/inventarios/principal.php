<?php 
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';
    $cont = 0;
    
    if(isset($_GET['num']))
    {
        $pagina = $_GET['num'];
    }
    else{
        $pagina = 0;
    }

    if(isset($_GET['num_reg']))
    {
        $registros = $_GET['num_reg'];
    }
    else{
        $registros = 1;
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

    $query = "SELECT * FROM detalle_inventario";

    if(isset($_GET['like']))
    {
        $valor = $_GET['valor'];
        
        $queryLike = "SELECT * FROM detalle_inventario AS di INNER JOIN productos AS p ON p.idproducto = di.idproducto WHERE p.producto LIKE '%$valor%' OR p.codproducto LIKE '%$valor%'";

        $dataDI = CRUD($queryLike,"s");
    }
    else{
        $dataDI = CRUD("SELECT * FROM detalle_inventario ORDER BY idcategoria LIMIT $inicio,$registros", "s");

    }

    
    $num_registro = CountReg($query);
    $paginas = ceil($num_registro / $registros);

    $idusuario = $_SESSION['idusuario'];
    $idempleado = buscavalor("empleados","idempleado","idusuario='$idusuario'");

    $buscaVentas = buscavalor("detalle_preventa","COUNT(iddpv)","estado = 0 AND idempleado = '$idempleado'");
?>
    <script src="./public/js/funciones-navbar.js"></script>
    <script src="./public/js/funciones-inventarios.js"></script>
    <script src="./public/js/js_funciones.js"></script>
    <script src="./public/js/text-oculto.js"></script>

    <div style="margin-bottom: 10px;">
        <div class="row">
            <div class="col-md-4">
                <a href="" class="btn btn-warning ver-carrito"><?php echo $buscaVentas;?><i class="fas fa-cart-plus"></i></a>
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

            <div class="col-md-4">
                <input type="search" class="form-control" placeholder="Buscar Producto" id="like" autocomplete="off">
            </div>
        </div>
    </div>
    <?php if($dataDI):?>
        <div class="table-responsive">
            <?php include 'table_di.php'; ?>
        </div>
        
        <?php if($num_registro > $registros):?>
            <?php if($pagina == 1):?>
               
                <div style="text-align: center;">
                    <a href="" class="btn pagina" v-num="<?php echo ($pagina + 1); ?>" num-reg="<?php echo $registros;?>">
                    <i class="fas fa-chevron-circle-right fa-2x"></i>
                    </a>
                </div>
            <?php elseif($pagina == $paginas): ?>
                <div style="text-align: center;">
                    <a href="" class="btn pagina" v-num="<?php echo ($pagina - 1); ?>" num-reg="<?php echo $registros;?>">
                        <i class="fas fa-chevron-circle-left fa-2x"></i>
                    </a>
                </div>
            <?php else:?>
                <div style="text-align: center;">
                    <a href="" class="btn pagina" v-num="<?php echo ($pagina - 1); ?>" num-reg="<?php echo $registros;?>">
                        <i class="fas fa-chevron-circle-left fa-2x"></i>
                    </a>

                    <a href="" class="btn pagina" v-num="<?php echo ($pagina + 1); ?>" num-reg="<?php echo $registros;?>">
                        <i class="fas fa-chevron-circle-right fa-2x"></i>
                    </a>
                </div>
            <?php endif ?>
        <?php endif ?>
    <?php else:?>
        <div class="alert alert-info">Datos no encontrados...</div>
    <?php endif?>
</div>

<?php 
     /**CARRITO DE VENTA */
     include '../../modals/add_cart.php';
?>
            
