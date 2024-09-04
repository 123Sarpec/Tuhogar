<main class="contenedor seccion">
    <h1>Contactanos</h1>

    <?php if($mensaje) { ?>
        <p class="alerta exito"><?php echo $mensaje; ?></p>
    <?php } ?>
    <picture>
        <source srcset="build/img//fondo_contacto.webp" type="image/webp">
        <source srcset="build/img//fondo_contacto.jpg" type="image/jpeg">
        <img src="build/img/fondo_contacto.jpg" alt="imagen contacto" loading="lazy">
    </picture>
    <h2>Llene el Formulario.</h2>

    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Informacion Sobre la Propiedad</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required >

            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu Correo" id="email" name="contacto[email]" required>

            <label for="mensaje">Mensaje</label>
            <TEXtarea id="mensaje" name="contacto[mensaje]"></TEXtarea required>
        </fieldset>

        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="opciones">Vender o Comprar</label>
            <select id="opciones" name="contacto[tipo]">
                <option value="" disabled selected>--selecciona--</option>
                <option value="Comprar">Comprar</option>
                <option value="Comprar">Vender</option>
            </select>
            <label for="Presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Precio o Presupuesto" id="Presupuesto" name="contacto[precio]" required>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser Contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefomo">Telefono</label>
                <input type="radio" value="telefono" id="contactar-telefomo" name="contacto[contacto]" required>

                <label for="contactar-email">E-mail</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
            </div>

            <div id="contacto"></div>

        </fieldset>
        <div class=" seccion">
            <input type="submit" value="enviar" class="boton-verde">
        </div>
    </form>
</main>