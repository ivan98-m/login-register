<?php
    session_start();
    require 'conexion_db.php';
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT user, pass, names, lastnames FROM users WHERE user = :username');
        $records->bindParam(':username', $_POST['username']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        // if ($results && password_verify($_POST['password'], $results['pass'])) {
        if ($results && md5($_POST['password']) == $results['pass']) {
            $_SESSION['username']=$results['user'];
            $_SESSION['infouser'] = $results['names']." ".$results['lastnames'];
            // $usuario = $results['names']." ".$results['lastnames'];
            header("Location: ../home.php");
        } else {
            echo'<script type="text/javascript">
            alert("Credenciales incorrectas");
            window.location.href="../index.html";
            </script>';
        }
    }
?>
