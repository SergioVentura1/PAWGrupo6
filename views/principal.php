<?php 
    include './views/navbar/navbar.php';
    if(isset($body) && $body == true)
    {
        echo '<body style="background-color:white">';
    } else {
        echo '<body style="background-color:Teal">';
    }
?>
<div id="contenido" style="margin-top: 10px;">
    <div class="alert alert-info" style="width:500px">
        Bienvenido/a: <?php echo $_SESSION["user"];?>
        <br>
        <img src="./public/img/usuarios/<?php echo $_SESSION["user"];?>.png" width="200px" alt="">
    </div>
</div>