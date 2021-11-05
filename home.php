<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['infouser'] ?></title>
    <link rel="stylesheet" href="css/estilos1.css">
    <script src="https://kit.fontawesome.com/832b6972f7.js" crossorigin="anonymous"></script> 
</head>
<body>
    <div class="navbar">
        <a href="#">
            <img class="logo" src="img/logo.png" alt="" width="100">
        </a>
        <div class="usuario">
            <button class="btndesplegar" id="btn-perfil"></button>
            <div class="contenido" id="contenido-perfil" style="display:none;">
                <p> <?= $_SESSION['infouser'] ?> </p>
                <hr>
                <a href="DB/cerrar_sesion.php">
                    <i class="fas fa-sign-in-alt text-color"></i> Salir
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>Hola, <?= $_SESSION['infouser'] ?></h2>
    </div>
    <script src="scripts/perfil.js"></script>
</body>
</html>