

<?php
if(!isset($_SESSION)){
    session_start();
}
$auth = $_SESSION['login'] ?? false;

if(!isset($inicio)){
    $inicio = false;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes y Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
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
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth):  ?>
                            <a href="/logout">Cerrar Sesion</a>
                        <?php  endif ?>
                    </nav>                   
                </div>

            </div> <!-- cierre de la barra  -->


            <?php echo $inicio ? " <h1>Venta de Casa Y Departamentos</h1>":''; ?>
        </div>
    </header>

<?php echo $contenido; ?>
    
<footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <a href="/nosotros">Nosotros</a>
            <a href="/propiedades">Anuncios</a>
            <a href="/blog">Blog</a>
            <a href="/contacto">Contacto</a>
        </div>

        <p class="copyright">Todos los Derechos son Reservados <?php echo date('d-m-Y') ?> &copy;</p>
    </footer>


    <!-- <script src="build/js/bundle.min.js"></script> -->
     <script src="../build/js/bundle.min.js"></script>
</body>

</html>