<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5">
    <title>Crear Post</title>
    <link rel="stylesheet" href="stylos/login.css">
</head>

<body>

    <div class="login">
        <h2 class="login-header">Crear post</h2>
        <form class="login-container" enctype="multipart/form-data" method="post" action="crear_post.php">
            <p>
                <input type="text" name="author" placeholder="author">
            </p>
            <p>
                <input type="text" name="title" placeholder="Título">
            </p>
            <p>
                <input type="text" name="content" placeholder="Contenido">
            </p>
            <p>
                <input type="file" name="img" placeholder="Imagen" style="background-color: white;">
            </p>
            <p>
                <input type="submit" value="Guardar">
            </p>
        </form>
    </div>
</body>