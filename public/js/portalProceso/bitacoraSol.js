// ===============================
// OBTENER ID DESDE LA URL
// ===============================
function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

// ===============================
// FORMATEAR FECHA EN ESPAÑOL
// ===============================
function formatearFechaEnEspanol(fechaStr) {
    if (!fechaStr) return '';
    
    const fecha = new Date(fechaStr);
    
    // Verificar si la fecha es válida
    if (isNaN(fecha.getTime())) return '';
    
    const meses = [
        'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
        'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
    ];
    
    const dia = fecha.getDate();
    const mes = meses[fecha.getMonth()];
    const anio = fecha.getFullYear();
    
    return `${dia} de ${mes} de ${anio}`;
}

// ===============================
// CARGAR DATOS DESDE EL BACKEND
// ===============================
function cargarBitacoraSolicitud(id) {

    fetch(`../obtenerBitacoraSolicitud/${id}`)
        .then(response => response.json())
        .then(response => {

            console.log(response);

            if (!response.success) {
                alert('No se encontró información');
                return;
            }

            const participantes = response.data;

            if (!participantes || participantes.length === 0) {
                return;
            }

            // DATOS GENERALES
            const noLicitacion = document.getElementById('no_licitacion');
            const nombreEstudio = document.getElementById('nombre_estudio');
            const coordinador = document.getElementById('coordinador');
            const area = document.getElementById('area');

            if (noLicitacion) {
                noLicitacion.textContent = participantes[0]?.no_licitacion ?? '';
            }

            if (nombreEstudio) {
                nombreEstudio.textContent = participantes[0]?.nombre_estudio ?? '';
            }

            if (coordinador) {
                coordinador.textContent = participantes[0]?.coordinador ?? '';
            }

            if (area) {
                area.textContent = participantes[0]?.area ?? '';
            }

            // TABLA
            const tbody = document.getElementById('tablaBodyBitacora');

            if (!tbody) {
                console.error('No existe #tablaBodyBitacora');
                return;
            }

            tbody.innerHTML = '';

            participantes.forEach((participante, index) => {

                // Formatear fecha en español
                const fechaFormateada = participante.created_at 
                    ? formatearFechaEnEspanol(participante.created_at)
                    : '';

                // Usar nombre_empresa en lugar de proveedor
                const nombreEmpresa = participante.nombre_empresa || '';

                tbody.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${nombreEmpresa}</td>
                        <td>${fechaFormateada}</td>
                        <td>Solicitud de cotización</td>
                        <td>${participante.correo || ''}</td>
                        <td></td>
                    </tr>
                `;
            });

        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al cargar la información');
        });
}

// ===============================
// AGREGAR FILA
// ===============================
function agregarFilaBitacora() {

    const tablaBody = document.getElementById('tablaBodyBitacora');

    if (!tablaBody) {
        return;
    }

    const nuevaFila = document.createElement('tr');

    nuevaFila.innerHTML = `
        <td class="celda-editable" contenteditable="true">${tablaBody.children.length + 1}</td>
        <td class="celda-editable" contenteditable="true"></td>
        <td class="celda-editable" contenteditable="true"></td>
        <td class="celda-editable" contenteditable="true">Solicitud de cotización</td>
        <td class="celda-editable" contenteditable="true"></td>
        <td class="celda-editable" contenteditable="true"></td>
    `;

    tablaBody.appendChild(nuevaFila);

    renumerarFilasBitacora();
}

// ===============================
// RENUMERAR FILAS
// ===============================
function renumerarFilasBitacora() {

    const filas = document.querySelectorAll('#tablaBodyBitacora tr');

    filas.forEach((fila, index) => {

        const primeraCelda = fila.querySelector('td:first-child');

        if (primeraCelda) {
            primeraCelda.textContent = index + 1;
        }
    });
}

// ===============================
// GUARDAR LOCAL
// ===============================
function guardarBitacora() {

    const filas = document.querySelectorAll('#tablaBodyBitacora tr');

    const datos = [];

    filas.forEach(fila => {

        const celdas = fila.querySelectorAll('td');

        datos.push({
            numero: celdas[0]?.innerText ?? '',
            empresa: celdas[1]?.innerText ?? '',
            fecha: celdas[2]?.innerText ?? '',
            asunto: celdas[3]?.innerText ?? '',
            correo: celdas[4]?.innerText ?? '',
            firma: celdas[5]?.innerText ?? ''
        });
    });

    localStorage.setItem(
        'bitacoraSolicitud',
        JSON.stringify(datos)
    );

    alert('Bitácora guardada correctamente');
}

// ===============================
// CARGAR LOCAL
// ===============================
function cargarBitacoraLocal() {

    const datos = localStorage.getItem('bitacoraSolicitud');

    if (!datos) {
        return;
    }

    const filas = JSON.parse(datos);

    const tbody = document.getElementById('tablaBodyBitacora');

    if (!tbody) {
        return;
    }

    tbody.innerHTML = '';

    filas.forEach(fila => {

        tbody.innerHTML += `
            <tr>
                <td class="celda-editable" contenteditable="true">${fila.numero}</td>
                <td class="celda-editable" contenteditable="true">${fila.empresa}</td>
                <td class="celda-editable" contenteditable="true">${fila.fecha}</td>
                <td class="celda-editable" contenteditable="true">${fila.asunto}</td>
                <td class="celda-editable" contenteditable="true">${fila.correo}</td>
                <td class="celda-editable" contenteditable="true">${fila.firma}</td>
            </tr>
        `;
    });
}

// ===============================
// INICIALIZAR
// ===============================
document.addEventListener('DOMContentLoaded', function () {

    const id = obtenerIdDesdeURL();

    if (id && !isNaN(id)) {
        cargarBitacoraSolicitud(id);
    } else {
        cargarBitacoraLocal();
    }

    // BOTÓN GUARDAR
    const btnGuardar = document.getElementById('btnGuardarBitacora');

    if (btnGuardar) {
        btnGuardar.addEventListener('click', guardarBitacora);
    }

    // BOTÓN AGREGAR FILA
    const btnAgregar = document.getElementById('agregarFilaBitacora');

    if (btnAgregar) {
        btnAgregar.addEventListener('click', agregarFilaBitacora);
    }
});