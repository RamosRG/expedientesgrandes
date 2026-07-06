// ===============================
// OBTENER ID DESDE LA URL
// ===============================
function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

// ===============================
// FORMATEAR HORA
// ===============================
function formatearHora(fechaStr) {
    if (!fechaStr) return '';
    
    const fecha = new Date(fechaStr);
    
    // Verificar si la fecha es válida
    if (isNaN(fecha.getTime())) return '';
    
    // Obtener hora y minutos
    const horas = fecha.getHours().toString().padStart(2, '0');
    const minutos = fecha.getMinutes().toString().padStart(2, '0');
    
    return `${horas}:${minutos}`;
}

// ===============================
// CARGAR DATOS DESDE EL BACKEND
// ===============================
function cargarBitacoraSolicitud(id) {

    fetch(`../obtenerBitacoraCompra/${id}`)
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

            // TABLA - NUEVA ESTRUCTURA
            const tbody = document.getElementById('tablaBodyBitacora');

            if (!tbody) {
                console.error('No existe #tablaBodyBitacora');
                return;
            }

            tbody.innerHTML = '';

            participantes.forEach((participante, index) => {

                // Formatear solo la hora
                const horaFormateada = participante.created_at 
                    ? formatearHora(participante.created_at)
                    : '';

                // Usar proveedor (nombre completo)
                const nombreProveedor = participante.proveedor || '';

                tbody.innerHTML += `
                    <tr>
                        <td class="celda-editable" contenteditable="true">${nombreProveedor}</td>
                        <td class="celda-editable" contenteditable="true"></td>
                        <td class="celda-editable" contenteditable="true">${horaFormateada}</td>
                        <td class="celda-editable" contenteditable="true"></td>
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
        <td class="celda-editable" contenteditable="true"></td>
        <td class="celda-editable" contenteditable="true"></td>
        <td class="celda-editable" contenteditable="true"></td>
        <td class="celda-editable" contenteditable="true"></td>
    `;

    tablaBody.appendChild(nuevaFila);
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
            proveedor: celdas[0]?.innerText ?? '',
            licitante_presente: celdas[1]?.innerText ?? '',
            hora: celdas[2]?.innerText ?? '',
            firma: celdas[3]?.innerText ?? ''
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
                <td class="celda-editable" contenteditable="true">${fila.proveedor}</td>
                <td class="celda-editable" contenteditable="true"></td>
                <td class="celda-editable" contenteditable="true">${fila.hora}</td>
                <td class="celda-editable" contenteditable="true"></td>
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