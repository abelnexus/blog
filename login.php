<?php
session_start();
$message = "";
if (count($_POST) > 0) {
    include('conexion.php');
    $result = mysqli_query($conn, "SELECT * FROM login WHERE user_name='" . $_POST["user_name"] . "' and password = '" . $_POST["password"] . "'");
    $row  = mysqli_fetch_array($result);
    if (is_array($row)) {
        echo "existe";
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
    } else {
        $message = "Usuario o contraseña incorrectos!";
    }
}
if (isset($_SESSION["id"])) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5">
    <title>Login</title>
    <link rel="stylesheet" href="stylos/login.css">
</head>

<body>
    <div class="login">
        <h2 class="login-header">Inicio de Sesión</h2>
        <form class="login-container" method="post" action="">
            <p>
                <input type="email" name="user_name" placeholder="Email" id="user">
            </p>
            <p>
                <input type="password" name="password" placeholder="Password" id="pass">
            </p>

            <div class="message" style="text-align: center;">
                <?php if ($message != "") {
                    echo $message;
                } ?></div>
            <p>
                <input type="submit" value="Entrar">
            </p>
        </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
</script>
<script>
    $(document).ready(function() {
        $("#user").click(function() {
            $(".message").hide();
        });
        $("#pass").click(function() {
            $(".message").hide();
        });
    });
</script>