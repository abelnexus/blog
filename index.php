<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location:login.php");
}
include('conexion.php');
$result = mysqli_query($conn, "SELECT * FROM post");
$row  = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ejemplo de HTML5">
    <meta name="keywords" content="HTML5">
    <title>Blog</title>
    <link rel="stylesheet" href="stylos/style.css">
</head>

<body>
    <header>
        <h1>Blog de imágenes</h1>
    </header>
    <nav class="navMenu">
        <a href="#">Inicio</a>
        <a href="crear.php">Crear</a>
        <a href="#" id="change">Cambio de diseño</a>
        <a href="logout.php">Salir</a>
        <div class="dot"></div>
    </nav>
    <div class="wrapper">

        <?php
        while ($fila = mysqli_fetch_array($result)) { ?>
            <div>
                <div class="card" id="<?php echo $fila["id"]; ?>">
                    <h3 class="title"><?php echo $fila["title"]; ?></h3>
                    <div class="box">
                        <img src="<?php echo 'images/' . $fila["img"]; ?>" alt="img">
                    </div>
                    <div class="container">
                        <h4 style="padding: 0;">Author: <?php echo $fila["author"]; ?></h4>
                        <h4 class="sub">Publicado: <?php echo date('Y-m-d', strtotime($fila["date"])); ?></h4>
                        <p><?php echo $fila["content"]; ?></p>
                        <button onclick="remove(<?php echo $fila['id']; ?>)">Eliminar</button>
                    </div>

                </div>
            </div>
        <?php }
        ?>

    </div>
    <footer>
        <div style="text-align: center;">
            <p>Copyright Rodolfo Montes Valdivia</p>
        </div>
    </footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
</script>
<script>
    $(document).ready(function() {
        $("#change").click(function() {

            $(".card").css({
                'border-radius': '60px',
                'font-weigth': '700',
                'font-size': '18px',
                'box-shadow': '0 4px 8px 0 rgba(255, 99, 71, 1)'
            });
        });
    });
</script>
<script>
    function remove(id) {

        var $ele = $(this).parent().parent().parent();
        $.ajax({
            url: "delete.php",
            type: "POST",
            cache: false,
            data: {
                id: id,
            },
            success: function(dataResult) {

                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    $('#' + id).fadeOut().remove();
                }
            }
        });
    }
</script>

</html>