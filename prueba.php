<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_GET['respuesta'] ?></title>
    <link rel="stylesheet" href="css/estilos1.css">
    <script src="https://kit.fontawesome.com/832b6972f7.js" crossorigin="anonymous"></script> 
</head>
<body>
    <div class="navbar">
        <a href="#">
            <img class="logo" src="img/logo.png" alt="" width="100">
        </a>
        <div class="usuario">
            <button class="btndesplegar">
                <!-- <img src="img/user-default.png" alt="" width="40"> -->
            </button>
            <div class="contenido">
                <p>
                <?php
                    echo $_GET['respuesta'];
                ?> 
                </p>
                <hr>
                <a href="index.html">
                    <i class="fas fa-sign-in-alt"></i> Salir
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>Hola, <?= $_GET['respuesta'] ?></h2>
    </div>
</body>
</html>