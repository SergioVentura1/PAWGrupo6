<style>
    .cHead {
        vertical-align: middle;
        text-align: center;
    }
</style>
<div class="responsive">
<table class="table table-borderless table-hover table-responsive-xl">
    <thead class="bg-dark text-white cHead">
        <tr>
            <th class="ch">N°</th>
            <th class="ch">Nombre</th>
            <th class="ch">Dirección</th>  
            <th class="ch">Teléfono</th>            
            <th class="ch">Editar</th>
            <th class="ch">Eliminar</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataSucursales as $result) : ?>
            <tr>
                <td class="ch"><?php echo $cont += 1; ?></td>
                <td class="ch"><?php echo $result['nombre']; ?></td>
                <td class="ch"><?php echo $result['direccion']; ?></td>
                <td class="ch"><?php echo $result['telefono']; ?></td>                          
                <td class="ch">
                    <a href="" class="btn btn-success BtnEditSucursal" data-toggle="modal" id-sucursal = "<?php echo $result['idempresa']; ?>"><i class="fas fa-edit"></i></a>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-danger BtnDelSucursal" id-sucursal = "<?php echo $result['idempresa']; ?>"><i class="fas fa-trash-alt"></i></a>
                </td>
               
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>