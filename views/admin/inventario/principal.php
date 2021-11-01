<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-inventario.js"></script>
<script src="../../public/js/js_funciones.js"></script>

<?php
    session_start();
    include '../../../models/conexion.php';
    include '../../../controllers/procesos.php';
    include '../../../models/procesos.php';

    $query = "SELECT * FROM inventarios";
    $dataInv = CRUD("SELECT * FROM inventarios ORDER BY id_inventario", "s");
?>

<div class="card">
    <div class="card-header bg-dark text-white">
        <b>Panel: Inventario</b>
    </div>
    <div class="card-body ">
        <div id="result-form">
            <div class="row">
                <div class="col-xs-12">
                    
                    <?php if($dataInv):?>
                        <?php include 'table_productos.php'; ?>
                     
                    <?php else:?>
                        <div class="alert alert-info">No existen datos en la base ...</div>
                    <?php endif?>
                </div>
            </div>
        </div>
    </div>
</div>