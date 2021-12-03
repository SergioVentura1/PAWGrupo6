<?php
  @session_start();
  include '../../../models/conexion.php';
  include '../../../controllers/funciones.php';
  include '../../../models/procesos.php';

  $DClientes = CRUD("SELECT * FROM clientes","s");
?>
<div class="input-group mb-3" style="width: 500px;">
<div class="input-group-pretend">
    <span class="input-group-text" id="basic-addon1">Cliente</span>
</div>
<select class= "custom-select" name="idcliente" id="id-cliente">
    <option value="0" selected >Seleccione Cliente</option>
<?php foreach($DClientes AS $result) :?>
<option value="<?php echo $result['idcliente']; ?>"><?php echo $result['nombres'].''.$result['apellidos']; ?></option>
<?php endforeach?>
</select>
</div>