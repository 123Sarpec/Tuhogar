// Espera a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function () {

    EventListener();
    botonOscuro();

});


function botonOscuro() {
    const prefiereModoOscuro = window.matchMedia('(prefers-color-scheme: dark)');
    
    // Aplica el modo oscuro si es preferido
    if (prefiereModoOscuro.matches) {
        document.body.classList.add('modo-oscuro');
    } else {
        document.body.classList.remove('modo-oscuro');
    }

    // Escucha cambios en la preferencia de color del sistema
    prefiereModoOscuro.addEventListener('change', function () {
        if (prefiereModoOscuro.matches) {
            document.body.classList.add('modo-oscuro');
        } else {
            document.body.classList.remove('modo-oscuro');
        }
    });

    // Alterna el modo oscuro al hacer clic en el botón
    const oscuroClaro = document.querySelector('.boton-oscuro');
    oscuroClaro.addEventListener('click', function () {
        document.body.classList.toggle('modo-oscuro');
    });
}


//para el boton responsive, para mobil
function EventListener() {
    const mobilMenu = document.querySelector('.mobil-menu');

    mobilMenu.addEventListener('click', navegacionResposive);

    //Muestra Campos condicionales para seleccionar el metodo para contactar
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]')
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodoContactos));

}


function navegacionResposive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}

function mostrarMetodoContactos(e) {
    const contactoDiv = document.querySelector('#contacto');
    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
        
            <label for="telefono">No. telefono</label>
            <input type="number" placeholder="Tu telefono" id="telefono" name="contacto[telefono]">

             <p>Elija la fecha y la hora para contactarte </p>
            
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="9:00" max="18:00" name="contacto[hora]">

        `;

    } else {
        contactoDiv.innerHTML = `
                    <label for="email">Tu Correo para Enviarte Informacion</label>
            <input type="email" placeholder="Tu Correo" id="email" name="contacto[email]">
        `;
    }
}