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
            <th class="ch">Código Producto</th>
            <th class="ch">Código Registro</th>
            <th class="ch">Código inventario</th>
            <th class="ch">Producto</th>
            <th class="ch">Descripcion</th>
            <th class="ch">Precio Unitario</th>
            <th class="ch">Stock</th>
            <th class="ch">Categoria</th>
            <th class="ch">Agregar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataDI as $result) : ?>
            <?php 
                $idproducto = $result['idproducto'];
                $idcategoria = $result['idcategoria'];

                $codregistro = buscavalor("productos","codproducto","idproducto='$idproducto'");

                $producto = buscavalor("productos","producto","idproducto='$idproducto'");

                $descripcion = buscavalor("productos","descripcion","idproducto='$idproducto'");

                $precio_venta = buscavalor("productos","precio_venta","idproducto='$idproducto'");

                $stock = buscavalor("productos","stock","idproducto='$idproducto'");

                $categoria = buscavalor("categorias","categoria","idcategoria='$idcategoria'");
            ?>
            <tr>
                <td class="ch"><?php echo $cont += 1; ?></td>
                <td class="ch"><?php echo $idproducto ?></td>
                <td class="ch"><?php echo $codregistro; ?></td>
                <td class="ch"><?php echo $result['idinventario']; ?></td>
                <td class="ch"><?php echo $producto; ?></td>
                <td class="ch"><?php echo $descripcion; ?></td>
                <td class="ch"><?php echo $precio_venta; ?></td>
                <td class="ch"><?php echo $stock; ?></td>
                <td class="ch"><?php echo $categoria; ?></td>
                <td class="ch">
                    <a href="" class="btn btn-primary AddCart" data-toggle="modal" id-producto="<?php echo $idproducto;?>" id-inventario="<?php echo $result['idinventario'];;?>"><i class="fas fa-cart-plus"></i></a>
                </td>
                
            </tr>
        <?php endforeach ?>
    </tbody>
</table>