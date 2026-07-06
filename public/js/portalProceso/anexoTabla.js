$(document).ready(function () {

    const id = obtenerIdDesdeURL();

    if (id) {
        cargarAnexoTabla(id);
    }

});

function obtenerIdDesdeURL() {

    const partes = window.location.pathname.split('/');

    return partes[partes.length - 1];

}

function cargarAnexoTabla(id) {

    fetch(`../obtenerAnexoTablaPorId/${id}`)
        .then(response => response.json())
        .then(response => {

            console.log(response);

            if (!response.success) {

                alert("No se encontró información");

                return;
            }

            const descripciones = response.data;

            const tbody = document.getElementById('tablaBodyAnexo');

            tbody.innerHTML = '';

            if (!descripciones || descripciones.length === 0) {

                tbody.innerHTML = `
                    <tr>
                        <td colspan="5" style="text-align:center;">
                            No existen registros
                        </td>
                    </tr>
                `;

                return;
            }

            descripciones.forEach((item, index) => {

                // Verificar si marca_modelo está vacío o es null/undefined
                const marcaModelo = item.marca_modelo?.trim() || '';
                const marcaModeloMostrar = marcaModelo === '' ? 'N/A' : marcaModelo;
                // Aplicar centrado si es 'N/A', de lo contrario alineación normal
                const estiloMarca = marcaModelo === '' ? 'text-align:center;' : '';

                tbody.innerHTML += `
                    <tr>
                        <td style="text-align:center;">
                            ${index + 1}
                        </td>

                        <td>
                            ${item.descripcion ?? ''}
                        </td>

                        <td style="text-align:center;">
                            ${item.unidad_medida ?? ''}
                        </td>

                        <td style="text-align:center;">
                            ${item.cantidad ? parseFloat(item.cantidad).toString() : ''}
                        </td>

                        <td style="${estiloMarca}">
                            ${marcaModeloMostrar}
                        </td>
                    </tr>
                `;

            });

        })
        .catch(error => {

            console.error('Error:', error);

            alert("Error al cargar la información");

        });

}