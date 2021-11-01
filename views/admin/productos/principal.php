<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-productos.js"></script>
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

    $query = "SELECT * FROM productos";

    if(isset($_GET['like']))
    {
        $valor = $_GET['valor'];
        $queryLike = "SELECT * FROM productos WHERE id_producto LIKE '%$valor%' OR id_producto LIKE '%$valor%'";
        $dataProd = CRUD($queryLike,"s");
    }
    else
    {
        $dataProd = CRUD("SELECT * FROM productos ORDER BY id_producto LIMIT $inicio,$registros", "s");
    }
        
    $num_registro = CountReg($query);

    /*ceil: funcion para redundear*/
    $paginas = ceil($num_registro / $registros);

?>

<div class="card">
    <div class="card-header bg-dark text-white">
        <b>Panel Producto</b>
    </div>
    <div class="card-body">
        <div id="result-form">
            <div class="row">
                <div class="col-md-4">
                    <form id="data-product">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Id producto</span>
                            </div>
                            <input type="tinytext" name="id_producto" class="form-control" placeholder="Producto" require="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Código del producto</span>
                            </div>
                            <input type="tinytext" name="cod_producto" class="form-control" placeholder="Código del producto" require="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Nombre del producto</span>
                            </div>
                            <input type="text" name="nombre_producto" class="form-control" placeholder="Nombre del producto" require="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01" placeholder="Seleccione Categoría">Categoria:</label>
                            </div>
                            <select class="custom-select" name="categoria" id="categoria">
                                <?php 
                                    $modelo = new ConexionBD();
                                    $conexion = $modelo->get_conexion();
                                    $sql = "SELECT id_categoria, categoria FROM categorias";
                                    $stm = $conexion->prepare($sql);
                                    $result = $stm->execute();
                                    $rows = $stm->fetchAll(\PDO::FETCH_OBJ);

                                    foreach ($rows as $row) {
                                        ?>
                                        <option value="<?php print($row->id_categoria); ?>" ><?php print($row->categoria); ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Descripción 

                                </span>
                            </div>
                            <input type="text" name="descripcion" class="form-control" placeholder="Descripción del producto" require="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Precio Compra

                                </span>
                            </div>
                            <input type="decimal" name="precio_compra" class="form-control" placeholder="precio de la compra" require="ON">
                        </div>                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Precio Venta</span>
                            </div>
                            <input type="decimal" name="precio_venta" class="form-control" placeholder="precio en venta" require="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Stock</span>
                            </div>
                            <input type="int" name="stock" class="form-control" placeholder="stock" require="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Fecha Ingreso</span>
                            </div>
                            <input type="date" name="fecha_ingreso" class="form-control" placeholder="Ingreso" require="ON">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Estado:</label>
                            </div>
                            <select class="custom-select" name="estado" id="tipo-estado">
                                <option value="0" disabled selected>Seleccione Estado</option>
                                <option value="1">Habilitado</option>
                                <option value="2">Deshabilitado</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Descuento</span>
                            </div>
                            <input type="float" name="descuento" class="form-control" placeholder="Ingresar numero desc" require="ON">
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
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="100">Mostrar todos los productos</option>
                                </select>
                            </div> 
                        </div>
                    </div>

                    <?php if($dataProd):?>
                        <?php include '../productos/table_button.php'; ?>
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