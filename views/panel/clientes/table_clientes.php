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
            <th class="ch">Nombres</th>
            <th class="ch">Apellidos</th>
            <th class="ch">Dirección</th>  
            <th class="ch">Teléfono</th>
            <th class="ch">DUI</th>           
            <th class="ch">Editar</th>
            <th class="ch">Eliminar</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataClientes as $result) : ?>
            <tr>
                <td class="ch"><?php echo $cont += 1; ?></td>
                <td class="ch"><?php echo $result['nombres']; ?></td>
                <td class="ch"><?php echo $result['apellidos']; ?></td>
                <td class="ch"><?php echo $result['direccion']; ?></td>
                <td class="ch"><?php echo $result['telefono']; ?></td>
                <td class="ch"><?php echo $result['dui']; ?></td>              
                <td class="ch">
                    <a href="" class="btn btn-success BtnEditCliente" data-toggle="modal" id-cliente = "<?php echo $result['idcliente']; ?>"><i class="fas fa-edit"></i></a>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-danger BtnDelCliente" id-cliente = "<?php echo $result['idcliente']; ?>"><i class="fas fa-trash-alt"></i></a>
                </td>
               
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>