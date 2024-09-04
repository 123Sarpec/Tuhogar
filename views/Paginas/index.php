<main class="contenedor seccion">
    <h1>Acerca de Nosotros</h1>

    <div class="iconos-nosotros">
        <div class="icono">
            <img class="icono" src="build/img/icono1.svg" alt="icono de seguriad" loading="lazy">
            <h3>Seguridad</h3>
            <p> La publicación de propiedades en nuestra plataforma está respaldada por un robusto sistema de 
                seguridad que protege tus datos y los de tus clientes. Utilizamos encriptación avanzada para
                 garantizar que toda la información esté segura y accesible solo para los usuarios autorizados. 
                 Además, contamos con medidas de protección contra accesos no autorizados y ataques cibernéticos,
                  asegurando la integridad y privacidad de los datos en todo momento.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="icono de seguriad" loading="lazy">
            <h3>Precio</h3>
            <p>Publicar propiedades en nuestra plataforma es económico y transparente. Ofrecemos
                 varios planes para adaptarnos a tus necesidades, desde opciones básicas para
                  anuncios únicos hasta paquetes más completos para listados múltiples y destacados.
                   Nuestros precios son competitivos y se detallan claramente, sin costos ocultos, 
                   para que puedas elegir la opción que mejor se ajuste a tu presupuesto.</p>
        </div>
        <div class="icono">
            <img class="icono" src="/build/img/icono3.svg" alt="icono de seguriad" loading="lazy">
            <h3>Tiempo</h3>
            <p> El proceso de publicación de propiedades en nuestro sitio es rápido y eficiente. 
                Una vez que proporciones la información necesaria, tu propiedad estará visible
                 en nuestra plataforma en menos de 24 horas. Nos aseguramos de que el proceso sea
                  ágil para que puedas comenzar a atraer potenciales compradores o inquilinos 
                  sin demoras innecesarias.</p>
        </div>
    </div>
</main>

<section class="seccion contenedor">
    <h2> Casa y Departamentos en Venta</h2>

    <?php    
          include 'listado.php';
    ?>


    <div class="alinear-derecha">
        <a href="/propiedades " class="boton-verde">Ver todas</a>
    </div>
</section>

<section class="imagen-contacto">
    
    <h2>Encuentra la casa de tu sueño</h2>
    <p>LLene el Formulario para Tener mas Infomacion, del Asensor.</p>
    <a href="/contacto" class=" boton-verde">Contactanos</a>
</section>
<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/destacada.webp" type="imagen/webp">
                    <source srcset="build/img/destacada.webp" type="imagen/jpeg">
                    <img src="build/img/destacada.jpg" alt="imagen blog" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Vive Tus sueño en un Paraiso</h4>
                    <p class="informacion-meta">Escrito el: <span>19/07/2024</span>por: <span>Admin</span></p>
                    <p>Sueñas con tener una casa Impeclable, esta es tu oportunidad</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/destacada2.webp" type="imagen/webp">
                    <source srcset="build/img/destacada2.webp" type="imagen/jpeg">
                    <img src="build/img/destacada2.jpg" alt="imagen blog" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="/entrada"> 
                    <h4>Mirador Elegante</h4>
                    <p class="informacion-meta">Escrito el: <span>19/07/2024</span>por: <span>Admin</span></p>
                    <p>Esta es tu oportunidad de tener una vista Impecable</p>
                </a>
            </div>
        </article>
    </section>
    <section class="testimoniales">
        <h3>testimoniales</h3>
        <div class="testimonial">
            <blockquote>Compartimos las experiencias y opiniones de nuestros valiosos clientes que han confiado
                 en nosotros.
                 Te invitamos a descubrir cómo nuestro equipo ha marcado la diferencia en cada transacción y por qué somos
                  la elección preferida en el sector de la propiedades. </blockquote>
            <p>-Wilmer Sarpec</p>
        </div>
    </section>
</div>
