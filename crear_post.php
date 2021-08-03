<?php
include('conexion.php');
$titulo = $_POST["title"];
$author = $_POST["author"];
$contenido = $_POST["content"];
$imagen = $_FILES['img']['name'];

$ruta = "images/" . $_FILES['img']['name'];
$resultado = move_uploaded_file($_FILES["img"]["tmp_name"], $ruta);

$sql = "INSERT INTO post (author, title, content, img) VALUES ('$author','$titulo','$contenido', '$imagen')";

if (mysqli_query($conn, $sql)) {

    header("Location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
