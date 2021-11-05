<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
<?php
require 'conexion_db.php';
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT * FROM users WHERE user = :username');
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if ($results) {
        echo '<script type="text/javascript">
        alert("Ya existe ese nombre de usuario");
        window.location.href="../signup.html";
        </script>';
    } else {
        $sql = "INSERT INTO users (user, pass, names, lastnames) VALUES (:username, :password, :names, :lastnames)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $_POST['username']);
        // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password = md5($_POST['password']);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':names', $_POST['names']);
        $stmt->bindParam(':lastnames', $_POST['lastnames']);

        if ($stmt->execute()) {
            echo'<script type="text/javascript">
            alert("Usuario creado exitosamente");
            window.location.href="../index.html";
            </script>';
        } else {
            echo '<script type="text/javascript">
            alert("Lo sentimos, ha ocurrido un error al crear su cuenta");
            window.location.href=".../signup.html";
            </script>';
        }
    }
}
?>

<script>
    function exito() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Su registro fue exitoso',
            showConfirmButton: false,
            timer: 1500
        })
    }

    function existeUsuario() {
        console.log("noooo")
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ya existe ese nombre de usuario!',
        })
    }
</script>
