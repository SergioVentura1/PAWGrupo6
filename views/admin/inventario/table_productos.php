<?php
    $dataInv = CRUD("SELECT * FROM inventarios;", "s");
    $cont = 0;

    $sql=("SELECT productos.nombre_producto FROM inventarios INNER JOIN productos ON inventarios.id_productos ORDER BY `productos`.`nombre_producto` ASC;
    ");
?>
<table class="table table-borderless table-responsive-xl" style="text-align:center";>
    <thead class="bg-dark text-white">
        <tr>
            <th class="cHead">Id_inventario</th>
            <th class="cHead">Id_Categoría</th>
            <th class="cHead">Id_Producto</th>
            <th class="cHead">Stock</th>
        <!--<th class="cHead">Imagen</th>-->
        </tr>
    </thead>
    <tbody>
        <?php foreach($dataInv AS $result):?>
            <tr>
                <td class="cHead"><?php echo $result['id_inventario'];?></td>
                <td class="cHead"><?php echo $result['id_categoria'];?></td>
                <td class="cHead"><?php echo $result['id_producto'];?></td>
                <td class="cHead"><?php echo $result['stock'];?></td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>