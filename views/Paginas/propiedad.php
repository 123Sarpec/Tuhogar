<main class="contenido-centrado contenedor seccion ">
    <h1><?php echo $propiedad->titulo; ?></h1>

    <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen destacada" loading="lazy">
    
    <div class="resumen-propiedad texto-nosotros">
        <p class="precio">Q <?php echo $propiedad->precio; ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="iconos" src="build/img/icono_wc.svg" alt="icono wc">
                <p><?php echo $propiedad->sanitarios; ?></p>
            </li>
            <li>
                <img class="iconos" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                <p><?php echo $propiedad->estacionamiento; ?></p>
            </li>
            <li>
                <img class="iconos" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                <p><?php echo $propiedad->habitaciones; ?></p>
            </li>
        </ul>
       <p> <?php echo $propiedad->descripcion; ?> </p>
    </div>
</main>

