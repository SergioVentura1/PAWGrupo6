<style>
    .cHead {
        vertical-align: middle;
        text-align: center;
    }
</style>   
<?php
    $contDesc = 0;
    $contTotal = 0;
?>
    <table class="table table-borderless table-hover table-responsive-xl">
        <thead class="bg-dark text-white cHead" style="border: 1px 1px solid #000000;">
            <tr>
                <th class="ch" style="border: 1px solid #000000;">N°</th>
                <th class="ch" style="border: 1px solid #000000;">Código Venta</th>
                <th class="ch" style="border: 1px solid #000000;">Cliente</th>               
                <th class="ch" style="border: 1px solid #000000;">Producto</th>
                <th class="ch" style="border: 1px solid #000000;">Fecha</th>
                <th class="ch" style="border: 1px solid #000000;">Descuento</th>             
                <th class="ch" style="border: 1px solid #000000;">Total</th>
                
            </tr>
        </thead>
        <tbody style="border: 1px 1px solid #000000;">
        <?php foreach ($dataVentas AS $result):?>
            <?php
                if($result['idcliente'] > 0)
                {
                    $idcliente = $result['idcliente'];
                    $cliente = buscavalor("clientes","CONCAT(nombres,' ',apellidos)","idcliente='$idcliente'");
                }
                else
                {
                    $cliente = $result['cliente'];
                }

                $contDesc += $result['descuento'];
                $contTotal += $result['precio_total'];
            ?>            
            <tr>
                <td class="ch" style="border: 1px solid #000000;vertical-align: middle;text-align:center;"><?php echo $cont +=1;?></td>
                <td class="ch" style="border: 1px solid #000000;vertical-align: middle;text-align:center;"><?php echo $result['iddpv'];?></td> 
                <td class="ch" style="border: 1px solid #000000;vertical-align: middle;text-align:center;"><?php echo $cliente;?></td>                 
                <td class="ch" style="border: 1px solid #000000;vertical-align: middle;text-align:center;">
                    <?php $idproducto = $result['idproducto']; 
                    echo $producto = buscavalor("productos","producto","idproducto='$idproducto'");   ?>
                </td>
                <td class="ch" style="border: 1px solid #000000;vertical-align: middle;text-align:center;"><?php echo $result['fecha']; ?></td>
                <td class="ch" style="border: 1px solid #000000;vertical-align: middle;text-align:center;"><?php echo $result['descuento'];?></td>  
                <td class="ch" style="border: 1px solid #000000;vertical-align: middle;text-align:center;"><?php echo $result['precio_total']; ?></td>                
                
            </tr>
        <?php endforeach ?>
            <tr>
                <td class="ch" style="border: 1px solid #000000;vertical-align: middle;text-align:center;" colspan="5">Total</td>
                <td class="ch" style="border: 1px solid #000000;vertical-align: middle;text-align:center;">$<?php echo $contDesc; ?></td>
                <td class="ch" style="border: 1px solid #000000;vertical-align: middle;text-align:center;">$<?php echo $contTotal; ?></td>
            </tr>
        </tbody>
    </table>

