<table class="table table-borderless table-responsive-xl">
    <thead class="bg-dark text-white cHead">
        <tr>
            <th class="cHead">N°</th>
            <th class="cHead">Proveedor</th>
            <th class="cHead">Dirección</th>
            <th class="cHead">Teléfono</th>
            <th class="cHead">Correo</th>
            <th colspan="3" class="cHead">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataProve as $result) : ?>
            <tr class="cHead">
                <td> <?php echo $cont += 1; ?></td>
                <td> <?php echo $result['nombre_proveedor']; ?></td>
                <td> <?php echo $result['direccion']; ?></td>
                <td> <?php echo $result['telefono']; ?></td>
                <td> <?php echo $result['correo']; ?></td>
                <td>
                    <a href="" class="btn btn-success upd-provee" data-toggle="modal" id_proveedor="<?php echo $result['id_proveedor']; ?>" > <i class="fas fa-user-edit"></i></a>
                </td>
                <td>
                    <a href="" class="btn btn-danger btnDrop-Proveedor exit-provee " id_proveedor="<?php echo $result['id_proveedor']; ?>"> <i class="fas fa-user-times"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>