

<?php
if(!isset($_SESSION)){
    session_start();
}
$auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes y Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio':''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="../index.php"> 
                    <img src="/build/img/logo.svg" alt="logo">
                </a>
                <div class="mobil-menu">
                    <img src="/build/img/barras.svg" alt="imagen de menu"> 
                </div>

                <div class="derecha">
                    <img class="boton-oscuro" src="/build/img/dark-mode.svg" alt="imagen para oscurecer">
                    <nav class="navegacion mostrar">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($auth):  ?>
                            <a href="cerrar_sesion.php">Cerrar Sesion</a>
                        <?php  endif ?>
                    </nav>                   
                </div>

            </div> <!-- cierre de la barra  -->


            <?php echo $inicio ? " <h1>Venta de Casa Y Departamentos</h1>":''; ?>
        </div>
    </header>
