<table class="table table-borderless table-responsive-xl">
    <thead class="bg-dark text-white">
        <tr>
            
            <th class="cHead">Id inventario</th>
            <th class="cHead">categoria</th>
            <th class="cHead">producto</th>
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