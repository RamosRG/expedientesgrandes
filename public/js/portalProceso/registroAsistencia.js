$(document).ready(function () {

    const id = obtenerIdDesdeURL();

    if (id) {
        cargarBitacoraEnvio(id);
    }

});

function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

// Función para convertir fecha YYYY-MM-DD HH:MM:SS a formato "DÍA DE MES DE AÑO"
function formatearFechaEnEspanol(fechaString) {
    if (!fechaString) return '';
    
    const fecha = new Date(fechaString);
    if (isNaN(fecha.getTime())) return '';
    
    const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
    
    const dia = fecha.getDate();
    const mes = meses[fecha.getMonth()];
    const año = fecha.getFullYear();
    
    return `${dia} DE ${mes} DE ${año}`;
}

function cargarBitacoraEnvio(id) {

    fetch(`../obtenerRegistroAsistenciaEstudio/${id}`)
        .then(response => response.json())
        .then(response => {

            if (!response.success) {
                alert("No se encontró información");
                return;
            }

            const participantes = response.data;

            console.log(participantes);

            // Asignar datos del primer registro a los campos superiores
            if (participantes && participantes.length > 0) {
                const primerRegistro = participantes[0];
                
                // Asignar número de licitación
                const noLicitacionSpan = document.getElementById('no_licitacion');
                if (noLicitacionSpan) {
                    noLicitacionSpan.textContent = primerRegistro.no_licitacion || '';
                }
                
                // Asignar nombre del estudio
                const nombreEstudioSpan = document.getElementById('nombre_estudio');
                if (nombreEstudioSpan) {
                    nombreEstudioSpan.textContent = primerRegistro.nombre_estudio || '';
                }

                // Asignar fecha formateada al span created_at
                const fechaSpan = document.getElementById('created_at');
                if (fechaSpan && primerRegistro.created_at) {
                    fechaSpan.textContent = formatearFechaEnEspanol(primerRegistro.created_at);
                }
            }

            const tbody = document.getElementById('tablaBodyAsistencia');
            tbody.innerHTML = '';

            if (!participantes || participantes.length === 0) {

                tbody.innerHTML = `
                    <tr>
                        <td colspan="4" style="text-align:center">
                            No existen registros
                        </td>
                    </tr>
                `;

                return;
            }

            participantes.forEach((p) => {
                const fecha = p.created_at
                    ? new Date(p.created_at).toLocaleTimeString('es-MX', {
                        hour: '2-digit',
                        minute: '2-digit'
                    })
                    : '';

                const licitante =
                    p.empresa &&
                    p.empresa.trim() !== ''
                        ? p.empresa
                        : (p.proveedor || '');

                const representante =
                    p.representante_legal &&
                    p.representante_legal.trim() !== ''
                        ? p.representante_legal
                        : 'N/A';

                tbody.innerHTML += `
                    <tr>
                        <td>${licitante}</td>
                        <td>${representante}</td>
                        <td>${fecha}</td>
                        <td></td>
                    </tr>
                `;
            });

        })
        .catch(error => {
            console.error(error);
            alert("Error al cargar la información");
        });
}