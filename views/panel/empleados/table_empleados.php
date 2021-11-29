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
            <th class="ch">Usuario</th>
            <th class="ch">Editar</th>
            <th class="ch">Bloquear</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataEmpleados as $result) : ?>
            <tr>
                <td class="ch"><?php echo $cont += 1; ?></td>
                <td class="ch"><?php echo $result['nombres']; ?></td>
                <td class="ch"><?php echo $result['apellidos']; ?></td>
                <td class="ch"><?php echo $result['direccion']; ?></td>
                <td class="ch"><?php echo $result['telefono']; ?></td>
                <td class="ch"><?php echo $result['dui']; ?></td>
                
                <td class="ch">
                    <?php 
                        $idusuario =  $result['idusuario']; 
                        echo buscavalor("usuarios","usuario","idusuario='$idusuario'");    
                        $estado = buscavalor("usuarios","estado","idusuario='$idusuario'");
                    ?>
                </td>
                <td class="ch">
                    <a href="" class="btn btn-success BtnEditEmpleado" data-toggle="modal" id-empleado="<?php echo $result['idempleado']; ?>"><i class="fas fa-edit"></i></a>
                </td>
                <td class="ch">
                    <?php if($estado == 1): ?>
                        <a href="" class="btn btn-danger BtnDelEmpleado" id-empleado="<?php echo $result['idempleado']; ?>" valor="0"><i class="fas fa-user-slash"></i></a>
                    <?php else: ?>
                        <a href="" class="btn btn-success BtnDelEmpleado" id-empleado="<?php echo $result['idempleado']; ?>" valor="1"><i class="fas fa-user-check"></i></a>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>
