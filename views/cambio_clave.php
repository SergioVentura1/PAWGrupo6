<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cmabio Clave</title>
    <!--CSS -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap-theme.css">
    <link rel="stylesheet" href="../public/css/estilo.css">
    <!--JS -->
    <script src="../public/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../public/js/jquery-1.9.1.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/05f4903dc9.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="conteiner">
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="../controllers/login.php" method="POST">
                    <div class="input-group mb-3" style="width: 300px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-key"></i>
                            </span>
                            <input type="text" name="token" class="form-control" placeholder="Token" required="ON">
                        </div>
                    </div>
                    <div class="input-group mb-3" style="width: 300px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-key"></i>
                            </span>
                            <input type="password" name="passw1" class="form-control" placeholder="Nueva Contraseña" required="ON">
                        </div>
                    </div>
                    <div class="input-group mb-3" style="width: 300px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-key"></i>
                            </span>
                            <input type="password" name="passw2" class="form-control" placeholder="Repita Contraseña" required="ON">
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success" name="cambioClave">Procesar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>