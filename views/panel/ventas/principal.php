<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php
    @session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/funciones.php';
    include '../../../models/procesos.php';

    $year = date("Y");
    $fi = $year."-01-01";
    $fo = $year."-12-31";
    $sqlMeses = "SELECT SUM(IF(MONTH(fecha) = 1,  ROUND(precio_total,2), 0)) AS Ene,
        SUM(IF(MONTH(fecha) = 2,  ROUND(precio_total,2), 0)) AS Feb,
        SUM(IF(MONTH(fecha) = 3,  ROUND(precio_total,2), 0)) AS Mar,
        SUM(IF(MONTH(fecha) = 4,  ROUND(precio_total,2), 0)) AS Abr,
        SUM(IF(MONTH(fecha) = 5,  ROUND(precio_total,2), 0)) AS May,
        SUM(IF(MONTH(fecha) = 6,  ROUND(precio_total,2), 0)) AS Jun,
        SUM(IF(MONTH(fecha) = 7,  ROUND(precio_total,2), 0)) AS Jul,
        SUM(IF(MONTH(fecha) = 8,  ROUND(precio_total,2), 0)) AS Ago,
        SUM(IF(MONTH(fecha) = 9,  ROUND(precio_total,2), 0)) AS Sep,
        SUM(IF(MONTH(fecha) = 10, ROUND(precio_total,2), 0)) AS Oct,
        SUM(IF(MONTH(fecha) = 11, ROUND(precio_total,2), 0)) AS Nov,
        SUM(IF(MONTH(fecha) = 12, ROUND(precio_total,2), 0)) AS Dic
    FROM detalle_preventa WHERE  fecha BETWEEN '$fi' AND '$fo'";
    $DataMes =  CRUD($sqlMeses,"s");

    $countDataMES = CRUD("SELECT COUNT(iddpv) AS totalreg FROM detalle_preventa WHERE fecha  BETWEEN '$fi' AND '$fo'","s");
    foreach($countDataMES AS $result)
    {
        $totalreg = $result['totalreg'];
    }
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

    $query = "SELECT * FROM detalle_preventa";

    if(isset($_GET['like']))
    {
        $valor = $_GET['valor'];
        
        $queryLike = "SELECT * FROM detalle_preventa WHERE iddpv LIKE '%$valor%' OR idproducto LIKE '%$valor%'";

        $dataVentas = CRUD($queryLike,"s");
    }
    else{
        $dataVentas = CRUD("SELECT * FROM detalle_preventa ORDER BY iddpv LIMIT $inicio,$registros", "s");

    }

    $num_registro = CountReg($query);
    $paginas = ceil($num_registro / $registros);

    
?>
    <script src="./public/js/funciones-navbar.js"></script>
    <script src="./public/js/funciones-ventas.js"></script>
    <script src="./public/js/funciones.js"></script>
    <script src="./public/js/text-oculto.js"></script>

    <div style="margin-bottom: 10px;">
        <div class="row">
            
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
                <input type="search" class="form-control" placeholder="Buscar Venta" id="like" autocomplete="off">
            </div>
        </div>
    </div>
    <?php if($dataVentas):?>
        <div class="table-responsive">
        <div id="seleccion">
            <?php include 'table_ventas.php'; ?>
        </div>
            
        </div>
        <a class="btn btn-primary"  href="javascript:imprSelec('seleccion')" >Imprimir Reporte</a>
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
    <?php endif?>
    <hr>
    <div class="table-responsive">
        <p><h4>Reporte Total $ Ventas por Mes <?php echo "(Año: ".$year.")"; ?></h4></p>
        <?php if( $totalreg != 0):?>             
        <div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Enero</th>
                        <th>Febrero</th>
                        <th>Marzo</th>
                        <th>Abril</th>
                        <th>Mayo</th>
                        <th>Junio</th>
                        <th>Julio</th>
                        <th>Agosto</th>
                        <th>Septiembre</th>
                        <th>Octubre</th>
                        <th>Noviembre</th>
                        <th>Diciembre</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($DataMes AS $result):?>
                    <tr>
                        <td>$<?php echo $result['Ene']; ?></td>
                        <td>$<?php echo $result['Feb']; ?></td>
                        <td>$<?php echo $result['Mar']; ?></td>
                        <td>$<?php echo $result['Abr']; ?></td>
                        <td>$<?php echo $result['May']; ?></td>
                        <td>$<?php echo $result['Jun']; ?></td>
                        <td>$<?php echo $result['Jul']; ?></td>
                        <td>$<?php echo $result['Ago']; ?></td>
                        <td>$<?php echo $result['Sep']; ?></td>
                        <td>$<?php echo $result['Oct']; ?></td>
                        <td>$<?php echo $result['Nov']; ?></td>
                        <td>$<?php echo $result['Dic']; ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            <script type="text/javascript">
            var ene,feb,mar,abr,may,jun,jul,ago,sep,oct,nov,dic;
                ene = parseFloat("<?php echo $result['Ene']; ?>");
                feb = parseFloat("<?php echo $result['Feb']; ?>");
                mar = parseFloat("<?php echo $result['Mar']; ?>");
                abr = parseFloat("<?php echo $result['Abr']; ?>");
                may = parseFloat("<?php echo $result['May']; ?>");
                jun = parseFloat("<?php echo $result['Jun']; ?>");
                jul = parseFloat("<?php echo $result['Jul']; ?>");
                ago = parseFloat("<?php echo $result['Ago']; ?>");
                sep = parseFloat("<?php echo $result['Sep']; ?>");
                oct = parseFloat("<?php echo $result['Oct']; ?>");
                nov = parseFloat("<?php echo $result['Nov']; ?>");
                dic = parseFloat("<?php echo $result['Dic']; ?>");

                // Load the Visualization API and the corechart package.
                google.charts.load('current', {'packages':['corechart']});

                // Set a callback to run when the Google Visualization API is loaded.
                google.charts.setOnLoadCallback(drawChart);

                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                function drawChart() {

                    // Create the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Topping');
                    data.addColumn('number', 'Slices');
                    data.addRows([
                    ['Enero', ene],
                    ['Febrero', feb],
                    ['Marzo', mar],
                    ['Abril', abr],
                    ['Mayo', may],
                    ['Junio', jun],
                    ['Julio', jul],
                    ['Agosto', ago],
                    ['Septiembre', sep],
                    ['Octubre', oct],
                    ['Noviembre', nov],
                    ['Diciembre', dic]
                    ]);

                    // Set chart options
                    var options = {'title':'Ventas por Mes',
                                'width':600,
                                'height':400};

                    // Instantiate and draw our chart, passing in some options.
                    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
                </script>
            <div id="chart_div"></div>
        </div>
        <?php else: ?>
            <div class="alert alert-info">
                <p><b>No se encuentras regsitros de ventas para el año : <?php echo $year;?></b></p>
            </div>
        <?php endif?>
    </div>
    <script>
        function imprSelec(nombre) {
            var ficha = document.getElementById(nombre);
            var ventimp = window.open(' ', 'popimpr');
            ventimp.document.write( ficha.innerHTML );
            ventimp.document.close();
            ventimp.print( );
            ventimp.close();
        }
    </script>