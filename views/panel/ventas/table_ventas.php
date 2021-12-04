<style>
    .cHead {
        vertical-align: middle;
        text-align: center;
    }
</style>   
    <table class="table table-borderless table-hover table-responsive-xl">
        <thead class="bg-dark text-white cHead">
            <tr>
                <th class="ch">N°</th>
                <th class="ch">Código Venta</th>                
                <th class="ch">Producto</th>
                <th class="ch">Fecha</th>                
                <th class="ch">Total</th>
                
            </tr>
        </thead>
        <tbody>
        <?php foreach ($dataVentas AS $result):?>            
            <tr>
                <td class="ch"><?php echo $cont +=1;?></td>
                <td class="ch"><?php echo $result['iddpv'];?></td>                
                <td class="ch">
                    <?php $idproducto = $result['idproducto']; 
                    echo $producto = buscavalor("productos","producto","idproducto='$idproducto'");   ?>
                </td>
                <td class="ch"><?php echo $result['fecha']; ?></td>
                <td class="ch"><?php echo $result['precio_total']; ?></td>                
                
            </tr>
        <?php endforeach ?>
        
        </tbody>
    </table>

