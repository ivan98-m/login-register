<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_GET['respuesta'] ?></title>
    <link rel="stylesheet" href="css/estilos1.css">
</head>
<body>
    <div class="container">
        <img class="logo" src="img/Spider-Man-Emblema-red.png" alt="" width="80">
        <div class="usuario">
            <button class="btndesplegar">Usuario</button>
            <div class="contenido">
                <p>
                <?php
                    echo $_GET['respuesta'];
                ?> 
                </p>
                <hr>
                <a href="index.html">Salir</a>
            </div>
            <!-- 
            <br>
            <a href="index.html">Salir</a> -->
        </div>
    </div>
    <h1>BIENVENIDO!!!!!</h1>
</body>
</html>