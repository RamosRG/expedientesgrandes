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

function cargarBitacoraEnvio(id) {

    fetch(`../obtenerBitacoraEnvioPorId/${id}`)
        .then(response => response.json())
        .then(response => {

            if (!response.success) {

                alert("No se encontró información");

                return;
            }

const participantes = response.data;

// DATOS GENERALES DEL DOCUMENTO
document.getElementById('nombre_estudio').textContent =
    participantes[0].nombre_estudio ?? '';

document.getElementById('coordinador').textContent =
    participantes[0].coordinador ?? '';

document.getElementById('area').textContent =
    participantes[0].area ?? '';

            const tbody = document.getElementById('tablaBodyBitacora');

            tbody.innerHTML = '';

            if (!participantes || participantes.length === 0) {

                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" style="text-align:center">
                            No existen registros
                        </td>
                    </tr>
                `;

                return;
            }

            participantes.forEach((participante, index) => {

                const fecha = participante.created_at
                    ? new Date(participante.created_at).toLocaleDateString('es-MX')
                    : '';

                tbody.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>

                        <td>
                            ${participante.proveedor ?? ''}

                        </td>

                        <td>${fecha}</td>

                        <td>
                            Solicitud de cotización
                        </td>

                        <td>
                            ${participante.correo ?? ''}
                        </td>

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