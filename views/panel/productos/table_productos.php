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
            <th class="ch">Código</th>
            <th class="ch">Producto</th>
            <th class="ch">Fecha</th>
            <th class="ch">Precio</th>
            <th class="ch">Stock</th>
            <th class="ch">Imagen</th>
            <th class="ch">Editar</th>
            <th class="ch">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataProducto as $result) : ?>
            <tr>
                <td class="ch"><?php echo $cont += 1; ?></td>
                <td class="ch"><?php echo $result['codproducto']; ?></td>
                <td class="ch"><?php echo $result['producto']; ?></td>
                <td class="ch"><?php echo $result['fecha_ingreso']; ?></td>
                <td class="ch"><?php echo $result['precio_venta']; ?></td>
                <td class="ch"><?php echo $result['stock']; ?></td>
                <td class="ch">
                    <img src="./public/img/productos/<?php echo $result['imagen']; ?>" width="150px" alt="">
                </td>
                <td class="ch">
                    <a href="" class="btn btn-success BtnEditProducto" data-toggle="modal" id-producto = "<?php echo $result['idproducto']; ?>" codproducto = "<?php echo $result['codproducto']; ?>"><i class="fas fa-edit"></i></a>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-danger BtnDelProducto" id-producto = "<?php echo $result['idproducto']; ?>"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>