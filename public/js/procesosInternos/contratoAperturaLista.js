document.addEventListener("DOMContentLoaded", () => {
    cargarEstudios();
});

function cargarEstudios() {

    fetch('/expedientesGrandes.temascalcingo.gob.mx/procesosInternos/obtenerEstudiosFinalizados')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener los datos');
            }
            return response.json();
        })
        .then(result => {

            const tbody = document.getElementById('tbodyEstudios');

            let html = '';

            result.data.forEach(estudio => {

                html += `
                    <tr>
                        <td>${estudio.nombre_estudio}</td>
                        <td>${estudio.area}</td>
                        <td>${estudio.created_at}</td>
                        <td>
                            <div style="display:flex; gap:5px; justify-content:center;">

                                <button class="w3-btn w3-blue w3-round"
                                    onclick="verEstudio(${estudio.id_estudio})">
                                    <i class="fas fa-eye"></i>
                                </button>

                                <button class="w3-btn w3-green w3-round"
                                    onclick="descargarEstudio(${estudio.id_estudio})">
                                    <i class="fas fa-download"></i>
                                </button>

                            </div>
                        </td>
                    </tr>
                `;
            });

            tbody.innerHTML = html;

            $('.tabla-finalizados').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                }
            });
        })
        .catch(error => {
            console.error(error);
        });
}

function verEstudio(id) {
    window.location.href = `../../portalProcesos/contratoApertura/${id}`;
}

function descargarEstudio(id) {
    window.location.href = `../../portalProcesos/exportarContratoApertura/${id}`;
}