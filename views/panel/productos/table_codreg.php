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
            <th class="ch">Codigo Serie/Producto</th>
            <th class="ch">Nombre <br>Registro/Modelo</th>
            <th class="ch">Editar</th>
            <th class="ch">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataCodReg as $result) : ?>
            <tr>
                <td class="ch"><?php echo $cont += 1; ?></td>
                <td class="ch"><?php echo $result['codreg']; ?></td>
                <td class="ch"><?php echo $result['nombre_registro']; ?></td>
                <td class="ch">
                    <a href="" class="btn btn-success BtnEditCR" data-toggle="modal" id-codreg = "<?php echo $result['idcr']; ?>"><i class="fas fa-edit"></i></a>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-danger BtnDelCR" id-codreg = "<?php echo $result['idcr']; ?>"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>