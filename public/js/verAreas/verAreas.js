// Archivo: public/js/verAreas/verAreas.js

let dataTable;
let cordinadorData = [];

document.addEventListener("DOMContentLoaded", function () {
    cargarAreas();
});

function cargarAreas() {
    // Mostrar loading
    Swal.fire({
        title: 'Cargando...',
        text: 'Obteniendo lista de Coordinadores',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    fetch('../usuarios/obtenerAreasCoordinador')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.json();
        })
        .then(response => {

            if (response.success && Array.isArray(response.data)) {

                cordinadorData = response.data;

                renderizarDataTable(cordinadorData);
                actualizarEstadisticas(cordinadorData);

                Swal.close();

            } else {

                throw new Error(response.message || 'Formato de datos inválido');

            }

        })
        .catch(error => {
            console.error("Error:", error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudieron cargar los usuarios: ' + error.message,
                confirmButtonText: 'Entendido'
            });

            const tbody = document.getElementById("tablaUsuariosBody");
            if (tbody) {
                tbody.innerHTML = `<tr><td colspan="7" class="empty-table">
                    <i class="fas fa-exclamation-triangle"></i> Error al cargar los Coordinadores y Areas
                </td></tr>`;
            }
        });
}

function renderizarDataTable(data) {
    const tableData = data.map(datos => {

        const nombreCompleto =
            `${datos.nombre} ${datos.apellido_paterno} ${datos.apellido_materno}`;

        const estadoBadge = Number(datos.active) === 1
            ? '<span class="badge badge-success"><i class="fas fa-check-circle"></i> Activo</span>'
            : '<span class="badge badge-danger"><i class="fas fa-times-circle"></i> Inactivo</span>';

        const acciones = `
        <div class="action-buttons">

            <button class="btn-icon btn-view"
                onclick="verUsuario(${datos.id_usuario})"
                title="Ver">
                <i class="fas fa-eye"></i>
            </button>

            <button class="btn-icon btn-edit"
                onclick="editarUsuario(${datos.id_usuario})"
                title="Editar">
                <i class="fas fa-edit"></i>
            </button>

            <button class="btn-icon btn-delete"
                onclick="cambiarEstadoUsuario(${datos.id_usuario}, ${datos.active})"
                title="${Number(datos.active) === 1 ? 'Desactivar' : 'Activar'}">

                <i class="fas ${Number(datos.active) === 1 ? 'fa-ban' : 'fa-check-circle'}"></i>

            </button>

        </div>
    `;

        return [

            datos.id_usuario,

            escapeHtml(nombreCompleto),

            escapeHtml(datos.correo),
            escapeHtml(datos.rol),
            escapeHtml(datos.area),


            escapeHtml(datos.telefono_principal),

            estadoBadge,

            acciones

        ];

    });

    // Destruir DataTable si ya existe
    if ($.fn.DataTable.isDataTable('#tablaUsuarios')) {
        $('#tablaUsuarios').DataTable().destroy();
    }

    // Inicializar DataTable
    dataTable = $('#tablaUsuarios').DataTable({
        data: tableData,
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        },
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
        order: [[0, 'desc']], // Ordenar por ID descendente
        columnDefs: [
            { targets: 0, width: '5%' },      // ID
            { targets: 1, width: '25%' },      // Nombre
            { targets: 2, width: '20%' },      // Correo
            { targets: 3, width: '15%' },      // Rol
            { targets: 4, width: '15%' },      // Teléfono
            { targets: 5, width: '10%' },      // Estado
            { targets: 6, width: '10%', orderable: false } // Acciones
        ],
        dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>' +
            '<"row"<"col-sm-12"tr>>' +
            '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        buttons: [
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i> Copiar',
                className: 'dt-button',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5] // Excluir columna de acciones
                }
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv"></i> CSV',
                className: 'dt-button',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'dt-button',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'dt-button',
                orientation: 'landscape',
                pageSize: 'A4',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimir',
                className: 'dt-button',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            }
        ]
    });
}

function actualizarEstadisticas(usuarios) {
    const total = usuarios.length;
    const activos = usuarios.filter(u => u.active == 1).length;
    const inactivos = total - activos;

    const totalElement = document.getElementById('totalUsuarios');
    const activosElement = document.getElementById('usuariosActivos');
    const inactivosElement = document.getElementById('usuariosInactivos');

    if (totalElement) totalElement.textContent = total;
    if (activosElement) activosElement.textContent = activos;
    if (inactivosElement) inactivosElement.textContent = inactivos;
}

function verUsuario(id) {
    window.location.href = `/usuarios/ver/${id}`;
}

function editarUsuario(id) {
    window.location.href = `../usuarios/editarUsuario/${id}`;
}

function cambiarEstadoUsuario(id, estadoActual) {
    const nuevoEstado = estadoActual == 1 ? 0 : 1;
    const accion = nuevoEstado == 1 ? 'activar' : 'desactivar';
    const mensaje = `¿Estás seguro de ${accion} este usuario?`;

    Swal.fire({
        title: 'Confirmar acción',
        text: mensaje,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: estadoActual == 1 ? '#dc3545' : '#28a745',
        cancelButtonColor: '#6c757d',
        confirmButtonText: `Sí, ${accion}`,
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Procesando...',
                text: `Actualizando estado del usuario`,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            fetch(`/usuarios/cambiarEstado/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ active: nuevoEstado })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: `Usuario ${accion}do correctamente`,
                            confirmButtonText: 'Aceptar'
                        }).then(() => {
                            cargarAreas(); // Recargar la tabla
                        });
                    } else {
                        throw new Error(data.message || 'Error al cambiar estado');
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.message || 'No se pudo cambiar el estado del usuario',
                        confirmButtonText: 'Entendido'
                    });
                });
        }
    });
}

// Función auxiliar para escapar HTML
function escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// Función para recargar la tabla (puedes llamarla desde otros componentes)
function recargarTabla() {
    cargarAreas();
}

// Exportar funciones globalmente
window.verUsuario = verUsuario;
window.editarUsuario = editarUsuario;
window.cambiarEstadoUsuario = cambiarEstadoUsuario;
window.recargarTabla = recargarTabla;