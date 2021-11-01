<?php

    include '../models/conexion.php';
    include '../controllers/procesos.php';
    include '../models/procesos.php';

    $user = $_POST['user'];
    $email = $_POST['email'];

    $buscaUser = buscavalor("usuarios", "COUNT(usuario)", "usuario = '$user'");
    $buscaEmail = buscavalor("usuarios", "COUNT(email)", "usuario = '$user' AND email = '$email'");

    if($buscaUser != 0 AND $buscaEmail != 0)
    {
        $token = Token(8);
        Email($email, $token);

        $update = CRUD("UPDATE usuarios SET token='$token' WHERE usuario='$user'","u");

        if($update)
        {
            header("Location: cambio_clave.php");
        }
        else
        {}
    }
    else
    {}

?>