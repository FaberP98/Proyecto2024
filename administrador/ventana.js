var ventanaAlerta; // Variable global para almacenar la referencia a la ventana de alerta

function confirmarEliminarProceso(codigoProceso) {
    // Verificar si ya existe una ventana de alerta
    if (!ventanaAlerta) {
        // Crear un div para la alerta
        var alertDiv = document.createElement('div');
        alertDiv.classList.add('alerta');

        // Crear el encabezado
        var header = document.createElement('header');
        header.style.backgroundColor = '#B6EDF6'; // Fondo celeste claro
        header.innerHTML = '<img src="../img/logoAdmin.ico" alt="Logo de tu página"> ¿Estás seguro de que deseas eliminar este proceso?';
        alertDiv.appendChild(header);

        // Crear el cuerpo del mensaje
        var body = document.createElement('div');
        body.innerHTML = 'AL DAR CLICK EN CONFIRMAR ESTE PROCESO SERÁ ELIMINADO PERMANENTEMENTE; POR FAVOR VALIDAR QUE ESTE PROCESO SEA EL QUE DESEA ELIMINAR';
        alertDiv.appendChild(body);

        // Crear botones de confirmar y cancelar
        var confirmarBtn = document.createElement('button');
        confirmarBtn.innerText = 'Confirmar';
        confirmarBtn.classList.add('btn', 'btn-primary', 'mr-2'); // Agrega clases de Bootstrap para el color y margen
        confirmarBtn.onclick = function () {
            window.location.href = 'borrar_proceso.php?Codigo=' + codigoProceso;
        };
        var cancelarBtn = document.createElement('button');
        cancelarBtn.innerText = 'Cancelar';
        cancelarBtn.classList.add('btn', 'btn-secondary'); // Agrega clases de Bootstrap para el color
        cancelarBtn.onclick = function () {
            // Ocultar la alerta al hacer clic en Cancelar
            document.body.removeChild(alertDiv); // Eliminar la ventana de alerta del DOM
            ventanaAlerta = null; // Restablecer la referencia a null
            return false; // Evitar que el enlace de eliminar se ejecute
        };

        // Crear contenedor para los botones y aplicar estilos
        var btnContainer = document.createElement('div');
        btnContainer.classList.add('text-right'); // Agrega clases de Bootstrap para alinear a la derecha y margen superior
        btnContainer.appendChild(confirmarBtn);
        btnContainer.appendChild(cancelarBtn);
        alertDiv.appendChild(btnContainer);
        alertDiv.classList.add('btncontainer');

        // Agregar la alerta al documento
        document.body.appendChild(alertDiv);

        // Almacenar la referencia a la ventana de alerta
        ventanaAlerta = alertDiv;
    }

    // Detener el comportamiento predeterminado del enlace de eliminar
    return false;
}


function confirmarEliminarEpp(codigoEpp) {
    // Verificar si ya existe una ventana de alerta
    if (!ventanaAlerta) {
        // Crear un div para la alerta
        var alertDiv = document.createElement('div');
        alertDiv.classList.add('alerta');

        // Crear el encabezado
        var header = document.createElement('header');
        header.style.backgroundColor = '#B6EDF6'; // Fondo celeste claro
        header.innerHTML = '<img src="../img/logoAdmin.ico" alt="Logo de tu página"> ¿Estás seguro de que deseas eliminar este elemento de protección personal?';
        alertDiv.appendChild(header);

        // Crear el cuerpo del mensaje
        var body = document.createElement('div');
        body.innerHTML = 'AL DAR CLICK EN CONFIRMAR ESTE ELEMENTO SERÁ ELIMINADO PERMANENTEMENTE; POR FAVOR VALIDAR QUE ESTE ELEMENTO SEA EL QUE DESEA ELIMINAR.';
        alertDiv.appendChild(body);

        // Crear botones de confirmar y cancelar
        var confirmarBtn = document.createElement('button');
        confirmarBtn.innerText = 'Confirmar';
        confirmarBtn.classList.add('btn', 'btn-primary', 'mr-2'); // Agrega clases de Bootstrap para el color y margen
        confirmarBtn.onclick = function () {
            window.location.href = 'borrar_epp.php?Codigo=' + codigoEpp;
        };
        var cancelarBtn = document.createElement('button');
        cancelarBtn.innerText = 'Cancelar';
        cancelarBtn.classList.add('btn', 'btn-secondary'); // Agrega clases de Bootstrap para el color
        cancelarBtn.onclick = function () {
            // Ocultar la alerta al hacer clic en Cancelar
            document.body.removeChild(alertDiv); // Eliminar la ventana de alerta del DOM
            ventanaAlerta = null; // Restablecer la referencia a null
            return false; // Evitar que el enlace de eliminar se ejecute
        };

        // Crear contenedor para los botones y aplicar estilos
        var btnContainer = document.createElement('div');
        btnContainer.classList.add('text-right'); // Agrega clases de Bootstrap para alinear a la derecha y margen superior
        btnContainer.appendChild(confirmarBtn);
        btnContainer.appendChild(cancelarBtn);
        alertDiv.appendChild(btnContainer);
        alertDiv.classList.add('btncontainer');

        // Agregar la alerta al documento
        document.body.appendChild(alertDiv);

        // Almacenar la referencia a la ventana de alerta
        ventanaAlerta = alertDiv;
    }

    // Detener el comportamiento predeterminado del enlace de eliminar
    return false;
}


function confirmarEliminarDescripcion(codigoDescripcion) {
    // Verificar si ya existe una ventana de alerta
    if (!ventanaAlerta) {
        // Crear un div para la alerta
        var alertDiv = document.createElement('div');
        alertDiv.classList.add('alerta');

        // Crear el encabezado
        var header = document.createElement('header');
        header.style.backgroundColor = '#B6EDF6'; // Fondo celeste claro
        header.innerHTML = '<img src="../img/logoAdmin.ico" alt="Logo de tu página"> ¿Estás seguro de que deseas eliminar esta descripción?';
        alertDiv.appendChild(header);

        // Crear el cuerpo del mensaje
        var body = document.createElement('div');
        body.innerHTML = 'AL DAR CLICK EN CONFIRMAR ESTA DESCRIPCIÓN SERÁ ELIMINADA PERMANENTEMENTE; POR FAVOR VALIDAR QUE ESTA DESCRIPCIÓN SEA LA QUE DESEA ELIMINAR.';
        alertDiv.appendChild(body);

        // Crear botones de confirmar y cancelar
        var confirmarBtn = document.createElement('button');
        confirmarBtn.innerText = 'Confirmar';
        confirmarBtn.classList.add('btn', 'btn-primary', 'mr-2'); // Agrega clases de Bootstrap para el color y margen
        confirmarBtn.onclick = function () {
            window.location.href = 'borrar_descripcion.php?Codigo=' + codigoDescripcion;
        };
        var cancelarBtn = document.createElement('button');
        cancelarBtn.innerText = 'Cancelar';
        cancelarBtn.classList.add('btn', 'btn-secondary'); // Agrega clases de Bootstrap para el color
        cancelarBtn.onclick = function () {
            // Ocultar la alerta al hacer clic en Cancelar
            document.body.removeChild(alertDiv); // Eliminar la ventana de alerta del DOM
            ventanaAlerta = null; // Restablecer la referencia a null
            return false; // Evitar que el enlace de eliminar se ejecute
        };

        // Crear contenedor para los botones y aplicar estilos
        var btnContainer = document.createElement('div');
        btnContainer.classList.add('text-right'); // Agrega clases de Bootstrap para alinear a la derecha y margen superior
        btnContainer.appendChild(confirmarBtn);
        btnContainer.appendChild(cancelarBtn);
        alertDiv.appendChild(btnContainer);
        alertDiv.classList.add('btncontainer');

        // Agregar la alerta al documento
        document.body.appendChild(alertDiv);

        // Almacenar la referencia a la ventana de alerta
        ventanaAlerta = alertDiv;
    }

    // Detener el comportamiento predeterminado del enlace de eliminar
    return false;
}



function confirmarEliminarClasificacion(codigoClasificacion) {
    // Verificar si ya existe una ventana de alerta
    if (!ventanaAlerta) {
        // Crear un div para la alerta
        var alertDiv = document.createElement('div');
        alertDiv.classList.add('alerta');

        // Crear el encabezado
        var header = document.createElement('header');
        header.style.backgroundColor = '#B6EDF6'; // Fondo celeste claro
        header.innerHTML = '<img src="../img/logoAdmin.ico" alt="Logo de tu página"> ¿Estás seguro de que deseas eliminar esta clasificación?';
        alertDiv.appendChild(header);

        // Crear el cuerpo del mensaje
        var body = document.createElement('div');
        body.innerHTML = 'AL DAR CLICK EN CONFIRMAR ESTA CLASIFICACION SERÁ ELIMINADA PERMANENTEMENTE; POR FAVOR VALIDAR QUE ESTA CLASIFICACION SEA LA QUE DESEA ELIMINAR';
        alertDiv.appendChild(body);

        // Crear botones de confirmar y cancelar
        var confirmarBtn = document.createElement('button');
        confirmarBtn.innerText = 'Confirmar';
        confirmarBtn.classList.add('btn', 'btn-primary', 'mr-2'); // Agrega clases de Bootstrap para el color y margen
        confirmarBtn.onclick = function () {
            window.location.href = 'borrar_clasificacion.php?Codigo=' + codigoClasificacion;
        };
        var cancelarBtn = document.createElement('button');
        cancelarBtn.innerText = 'Cancelar';
        cancelarBtn.classList.add('btn', 'btn-secondary'); // Agrega clases de Bootstrap para el color
        cancelarBtn.onclick = function () {
            // Ocultar la alerta al hacer clic en Cancelar
            document.body.removeChild(alertDiv); // Eliminar la ventana de alerta del DOM
            ventanaAlerta = null; // Restablecer la referencia a null
            return false; // Evitar que el enlace de eliminar se ejecute
        };

        // Crear contenedor para los botones y aplicar estilos
        var btnContainer = document.createElement('div');
        btnContainer.classList.add('text-right'); // Agrega clases de Bootstrap para alinear a la derecha y margen superior
        btnContainer.appendChild(confirmarBtn);
        btnContainer.appendChild(cancelarBtn);
        alertDiv.appendChild(btnContainer);
        alertDiv.classList.add('btncontainer');

        // Agregar la alerta al documento
        document.body.appendChild(alertDiv);

        // Almacenar la referencia a la ventana de alerta
        ventanaAlerta = alertDiv;
    }

    // Detener el comportamiento predeterminado del enlace de eliminar
    return false;
}


function confirmarEliminarEstado(codigoEstado) {
    // Verificar si ya existe una ventana de alerta
    if (!ventanaAlerta) {
        // Crear un div para la alerta
        var alertDiv = document.createElement('div');
        alertDiv.classList.add('alerta');

        // Crear el encabezado
        var header = document.createElement('header');
        header.style.backgroundColor = '#B6EDF6'; // Fondo celeste claro
        header.innerHTML = '<img src="../img/logoAdmin.ico" alt="Logo de tu página"> ¿Estás seguro de que deseas eliminar este estado?';
        alertDiv.appendChild(header);

        // Crear el cuerpo del mensaje
        var body = document.createElement('div');
        body.innerHTML = 'AL DAR CLICK EN CONFIRMAR ESTE ESTADO SERÁ ELIMINADO PERMANENTEMENTE; POR FAVOR VALIDAR QUE ESTE ESTADO SEA EL QUE DESEA ELIMINAR.';
        alertDiv.appendChild(body);

        // Crear botones de confirmar y cancelar
        var confirmarBtn = document.createElement('button');
        confirmarBtn.innerText = 'Confirmar';
        confirmarBtn.classList.add('btn', 'btn-primary', 'mr-2'); // Agrega clases de Bootstrap para el color y margen
        confirmarBtn.onclick = function () {
            window.location.href = 'borrar_estado.php?Codigo=' + codigoEstado;
        };
        var cancelarBtn = document.createElement('button');
        cancelarBtn.innerText = 'Cancelar';
        cancelarBtn.classList.add('btn', 'btn-secondary'); // Agrega clases de Bootstrap para el color
        cancelarBtn.onclick = function () {
            // Ocultar la alerta al hacer clic en Cancelar
            document.body.removeChild(alertDiv); // Eliminar la ventana de alerta del DOM
            ventanaAlerta = null; // Restablecer la referencia a null
            return false; // Evitar que el enlace de eliminar se ejecute
        };

        // Crear contenedor para los botones y aplicar estilos
        var btnContainer = document.createElement('div');
        btnContainer.classList.add('text-right'); // Agrega clases de Bootstrap para alinear a la derecha y margen superior
        btnContainer.appendChild(confirmarBtn);
        btnContainer.appendChild(cancelarBtn);
        alertDiv.appendChild(btnContainer);
        alertDiv.classList.add('btncontainer');

        // Agregar la alerta al documento
        document.body.appendChild(alertDiv);

        // Almacenar la referencia a la ventana de alerta
        ventanaAlerta = alertDiv;
    }

    // Detener el comportamiento predeterminado del enlace de eliminar
    return false;
}


function confirmarEliminarZona(codigoZona) {
    // Verificar si ya existe una ventana de alerta
    if (!ventanaAlerta) {
        // Crear un div para la alerta
        var alertDiv = document.createElement('div');
        alertDiv.classList.add('alerta');

        // Crear el encabezado
        var header = document.createElement('header');
        header.style.backgroundColor = '#B6EDF6'; // Fondo celeste claro
        header.innerHTML = '<img src="../img/logoAdmin.ico" alt="Logo de tu página"> ¿Estás seguro de que deseas eliminar esta zona / lugar?';
        alertDiv.appendChild(header);

        // Crear el cuerpo del mensaje
        var body = document.createElement('div');
        body.innerHTML = 'AL DAR CLICK EN CONFIRMAR ESTA ZONA / LUGAR SERÁ ELIMINADA PERMANENTEMENTE; POR FAVOR VALIDAR QUE ESTA ZONA SEA LA QUE DESEA ELIMINAR.';
        alertDiv.appendChild(body);

        // Crear botones de confirmar y cancelar
        var confirmarBtn = document.createElement('button');
        confirmarBtn.innerText = 'Confirmar';
        confirmarBtn.classList.add('btn', 'btn-primary', 'mr-2'); // Agrega clases de Bootstrap para el color y margen
        confirmarBtn.onclick = function () {
            window.location.href = 'borrar_zona.php?Codigo=' + codigoZona;
        };
        var cancelarBtn = document.createElement('button');
        cancelarBtn.innerText = 'Cancelar';
        cancelarBtn.classList.add('btn', 'btn-secondary'); // Agrega clases de Bootstrap para el color
        cancelarBtn.onclick = function () {
            // Ocultar la alerta al hacer clic en Cancelar
            document.body.removeChild(alertDiv); // Eliminar la ventana de alerta del DOM
            ventanaAlerta = null; // Restablecer la referencia a null
            return false; // Evitar que el enlace de eliminar se ejecute
        };

        // Crear contenedor para los botones y aplicar estilos
        var btnContainer = document.createElement('div');
        btnContainer.classList.add('text-right'); // Agrega clases de Bootstrap para alinear a la derecha y margen superior
        btnContainer.appendChild(confirmarBtn);
        btnContainer.appendChild(cancelarBtn);
        alertDiv.appendChild(btnContainer);
        alertDiv.classList.add('btncontainer');

        // Agregar la alerta al documento
        document.body.appendChild(alertDiv);

        // Almacenar la referencia a la ventana de alerta
        ventanaAlerta = alertDiv;
    }

    // Detener el comportamiento predeterminado del enlace de eliminar
    return false;
}

function confirmarEliminarTarea(codigoTarea) {
    // Verificar si ya existe una ventana de alerta
    if (!ventanaAlerta) {
        // Crear un div para la alerta
        var alertDiv = document.createElement('div');
        alertDiv.classList.add('alerta');

        // Crear el encabezado
        var header = document.createElement('header');
        header.style.backgroundColor = '#B6EDF6'; // Fondo celeste claro
        header.innerHTML = '<img src="../img/logoAdmin.ico" alt="Logo de tu página"> ¿Estás seguro de que deseas eliminar esta tarea?';
        alertDiv.appendChild(header);

        // Crear el cuerpo del mensaje
        var body = document.createElement('div');
        body.innerHTML = 'AL DAR CLICK EN CONFIRMAR ESTA TAREA SERÁ ELIMINADA PERMANENTEMENTE; POR FAVOR VALIDAR QUE ESTA TAREA SEA LA QUE DESEA ELIMINAR.';
        alertDiv.appendChild(body);

        // Crear botones de confirmar y cancelar
        var confirmarBtn = document.createElement('button');
        confirmarBtn.innerText = 'Confirmar';
        confirmarBtn.classList.add('btn', 'btn-primary', 'mr-2'); // Agrega clases de Bootstrap para el color y margen
        confirmarBtn.onclick = function () {
            window.location.href = 'borrar.php?Codigo=' + codigoTarea;
        };
        var cancelarBtn = document.createElement('button');
        cancelarBtn.innerText = 'Cancelar';
        cancelarBtn.classList.add('btn', 'btn-secondary'); // Agrega clases de Bootstrap para el color
        cancelarBtn.onclick = function () {
            // Ocultar la alerta al hacer clic en Cancelar
            document.body.removeChild(alertDiv); // Eliminar la ventana de alerta del DOM
            ventanaAlerta = null; // Restablecer la referencia a null
            return false; // Evitar que el enlace de eliminar se ejecute
        };

        // Crear contenedor para los botones y aplicar estilos
        var btnContainer = document.createElement('div');
        btnContainer.classList.add('text-right'); // Agrega clases de Bootstrap para alinear a la derecha y margen superior
        btnContainer.appendChild(confirmarBtn);
        btnContainer.appendChild(cancelarBtn);
        alertDiv.appendChild(btnContainer);
        alertDiv.classList.add('btncontainer');

        // Agregar la alerta al documento
        document.body.appendChild(alertDiv);

        // Almacenar la referencia a la ventana de alerta
        ventanaAlerta = alertDiv;
    }

    // Detener el comportamiento predeterminado del enlace de eliminar
    return false;
}

function confirmarEliminarActividad(codigoActividad) {
    // Verificar si ya existe una ventana de alerta
    if (!ventanaAlerta) {
        // Crear un div para la alerta
        var alertDiv = document.createElement('div');
        alertDiv.classList.add('alerta');

        // Crear el encabezado
        var header = document.createElement('header');
        header.style.backgroundColor = '#B6EDF6'; // Fondo celeste claro
        header.innerHTML = '<img src="../img/logoAdmin.ico" alt="Logo de tu página"> ¿Estás seguro de que deseas eliminar esta actividad?';
        alertDiv.appendChild(header);

        // Crear el cuerpo del mensaje
        var body = document.createElement('div');
        body.innerHTML = 'AL DAR CLICK EN CONFIRMAR ESTA ACTIVIDAD SERÁ ELIMINADA PERMANENTEMENTE; POR FAVOR VALIDAR QUE ESTA ACTIVIDAD SEA LA QUE DESEA ELIMINAR.';
        alertDiv.appendChild(body);

        // Crear botones de confirmar y cancelar
        var confirmarBtn = document.createElement('button');
        confirmarBtn.innerText = 'Confirmar';
        confirmarBtn.classList.add('btn', 'btn-primary', 'mr-2'); // Agrega clases de Bootstrap para el color y margen
        confirmarBtn.onclick = function () {
            window.location.href = 'borrar_actividad.php?Codigo=' + codigoActividad;
        };
        var cancelarBtn = document.createElement('button');
        cancelarBtn.innerText = 'Cancelar';
        cancelarBtn.classList.add('btn', 'btn-secondary'); // Agrega clases de Bootstrap para el color
        cancelarBtn.onclick = function () {
            // Ocultar la alerta al hacer clic en Cancelar
            document.body.removeChild(alertDiv); // Eliminar la ventana de alerta del DOM
            ventanaAlerta = null; // Restablecer la referencia a null
            return false; // Evitar que el enlace de eliminar se ejecute
        };

        // Crear contenedor para los botones y aplicar estilos
        var btnContainer = document.createElement('div');
        btnContainer.classList.add('text-right'); // Agrega clases de Bootstrap para alinear a la derecha y margen superior
        btnContainer.appendChild(confirmarBtn);
        btnContainer.appendChild(cancelarBtn);
        alertDiv.appendChild(btnContainer);
        alertDiv.classList.add('btncontainer');

        // Agregar la alerta al documento
        document.body.appendChild(alertDiv);

        // Almacenar la referencia a la ventana de alerta
        ventanaAlerta = alertDiv;
    }

    // Detener el comportamiento predeterminado del enlace de eliminar
    return false;
}

function confirmarEliminarEmpleado(codigoEmpleado) {
    // Verificar si ya existe una ventana de alerta
    if (!ventanaAlerta) {
        // Crear un div para la alerta
        var alertDiv = document.createElement('div');
        alertDiv.classList.add('alerta');

        // Crear el encabezado
        var header = document.createElement('header');
        header.style.backgroundColor = '#B6EDF6'; // Fondo celeste claro
        header.innerHTML = '<img src="../img/logoAdmin.ico" alt="Logo de tu página"> ¿Estás seguro de que deseas eliminar este emplead@?';
        alertDiv.appendChild(header);

        // Crear el cuerpo del mensaje
        var body = document.createElement('div');
        body.innerHTML = 'AL DAR CLICK EN CONFIRMAR ESTE EMPLEAD@ SERÁ ELIMINADO PERMANENTEMENTE; POR FAVOR VALIDAR QUE ESTE EMPLEAD@ SEA EL QUE DESEA ELIMINAR.';
        alertDiv.appendChild(body);

        // Crear botones de confirmar y cancelar
        var confirmarBtn = document.createElement('button');
        confirmarBtn.innerText = 'Confirmar';
        confirmarBtn.classList.add('btn', 'btn-primary', 'mr-2'); // Agrega clases de Bootstrap para el color y margen
        confirmarBtn.onclick = function () {
            window.location.href = 'borrar_empleado.php?Codigo=' + codigoEmpleado;
        };
        var cancelarBtn = document.createElement('button');
        cancelarBtn.innerText = 'Cancelar';
        cancelarBtn.classList.add('btn', 'btn-secondary'); // Agrega clases de Bootstrap para el color
        cancelarBtn.onclick = function () {
            // Ocultar la alerta al hacer clic en Cancelar
            document.body.removeChild(alertDiv); // Eliminar la ventana de alerta del DOM
            ventanaAlerta = null; // Restablecer la referencia a null
            return false; // Evitar que el enlace de eliminar se ejecute
        };

        // Crear contenedor para los botones y aplicar estilos
        var btnContainer = document.createElement('div');
        btnContainer.classList.add('text-right'); // Agrega clases de Bootstrap para alinear a la derecha y margen superior
        btnContainer.appendChild(confirmarBtn);
        btnContainer.appendChild(cancelarBtn);
        alertDiv.appendChild(btnContainer);
        alertDiv.classList.add('btncontainer');

        // Agregar la alerta al documento
        document.body.appendChild(alertDiv);

        // Almacenar la referencia a la ventana de alerta
        ventanaAlerta = alertDiv;
    }

    // Detener el comportamiento predeterminado del enlace de eliminar
    return false;
}