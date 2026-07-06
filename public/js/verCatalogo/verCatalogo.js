document.addEventListener("DOMContentLoaded", function () {
    cargarCatalogo();
    cargarCatalogoModal(); // Cargar catálogo también en el modal
});

// SIDEBAR
var mySidebar = document.getElementById("mySidebar");
var overlayBg = document.getElementById("myOverlay");

// Función para cargar catálogo en el select principal
function cargarCatalogo() {
    fetch("../catalogo/obtenerCatalogo")
        .then(res => res.json())
        .then(data => {
            if (!data.success) {
                alert("No se pudieron cargar los datos del catalogo");
                return;
            }

            let catalogo = data.data;
            let selectCatalogo = document.getElementById("catalogo");

            selectCatalogo.innerHTML = `
                <option value="">
                    Seleccione una opcion del catalogo
                </option>
            `;

            catalogo.forEach(item => {
                let option = document.createElement("option");
                option.value = item.id_catalogo;
                option.textContent = item.nombre_catalogo;
                selectCatalogo.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error cargando catálogo:", error);
        });
}

// Función para cargar catálogo en el select del modal
function cargarCatalogoModal() {
    fetch("../catalogo/obtenerCatalogo")
        .then(res => res.json())
        .then(data => {
            if (!data.success) {
                console.error("No se pudieron cargar los datos del catalogo para el modal");
                return;
            }

            let catalogo = data.data;
            let selectCatalogoModal = document.getElementById("catalogoModal");

            if (selectCatalogoModal) {
                selectCatalogoModal.innerHTML = `
                    <option value="">
                        Seleccione una opcion del catalogo
                    </option>
                `;

                catalogo.forEach(item => {
                    let option = document.createElement("option");
                    option.value = item.id_catalogo;
                    option.textContent = item.nombre_catalogo;
                    selectCatalogoModal.appendChild(option);
                });
            }
        })
        .catch(error => {
            console.error("Error cargando catálogo para modal:", error);
        });
}

// Evento change del select principal
document.getElementById("catalogo").addEventListener("change", function () {
    let idCatalogo = this.value;
    if (idCatalogo == "") {
        return;
    }
    obtenerDescripcionCatalogo(idCatalogo);
});

// Función para obtener descripción del catálogo
function obtenerDescripcionCatalogo(idCatalogo) {
    fetch(`../portalCatalogo/obtenerDescripcionCatalogo/${idCatalogo}`)
        .then(res => res.json())
        .then(data => {
            if (!data.success || !data.data) {
                alert("No hay productos");
                return;
            }

            let rows = data.data.map(item => {
                return [
                    item.id_descripcion_catalogo,
                    item.descripcion,
                    item.unidad_medida,
                    `<button class="btn btn-primary btn-sm"
                        onclick="seleccionarProducto('${item.id_descripcion_catalogo}', '${item.descripcion}')">
                        Seleccionar
                    </button>`
                ];
            });

            // destruir si ya existe
            if ($.fn.DataTable.isDataTable('#tablaProductos')) {
                $('#tablaProductos').DataTable().destroy();
            }

            // limpiar tbody
            $('#tablaProductos tbody').empty();

            // crear datatable
            $('#tablaProductos').DataTable({
                data: rows,
                columns: [
                    { title: "ID" },
                    { title: "Descripción" },
                    { title: "Unidad Medida" },
                    { title: "Acciones", orderable: false }
                ],
                language: {
                    search: "Buscar:",
                    lengthMenu: "Mostrar _MENU_ registros",
                    info: "Mostrando _START_ a _END_ de _TOTAL_",
                    paginate: {
                        first: "Primero",
                        last: "Último",
                        next: "Siguiente",
                        previous: "Anterior"
                    },
                    zeroRecords: "No se encontraron resultados"
                }
            });
        })
        .catch(error => {
            console.error("Error:", error);
        });
}

// Función seleccionar producto
function seleccionarProducto(id, descripcion) {
    console.log("Producto seleccionado:", id, descripcion);
    // aquí después puedes agregarlo a otra tabla o lista
}

// Manejar el envío del formulario del modal
document.getElementById("formCrearProductoNuevo").addEventListener("submit", function(e) {
    e.preventDefault(); // Evitar que el formulario se envíe normalmente
    
    // Obtener los valores del formulario
    const descripcion = document.getElementById("descripcion").value;
    const fk_catalogo = document.querySelector("#catalogoModal").value;
    const unidad_medida = document.getElementById("unidad_medida").value;
    
    // Validar que todos los campos estén llenos
    if (!descripcion || !fk_catalogo || !unidad_medida) {
        Swal.fire({
            icon: 'error',
            title: 'Campos incompletos',
            text: 'Por favor, llena todos los campos del formulario',
            confirmButtonColor: '#800020'
        });
        return;
    }
    
    // Crear FormData para enviar los datos
    const formData = new FormData();
    formData.append('descripcion', descripcion);
    formData.append('fk_catalogo', fk_catalogo);
    formData.append('unidad_medida', unidad_medida);
    
    // Enviar datos al servidor
    fetch('../portalCatalogo/crearDescripcionCatalogoModal', { 
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Mostrar mensaje de éxito
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: data.message,
                confirmButtonColor: '#800020'
            }).then(() => {
                // Cerrar el modal
                document.getElementById('id01').style.display = 'none';
                // Resetear el formulario
                document.getElementById("formCrearProductoNuevo").reset();
                // Recargar la tabla si hay un catálogo seleccionado
                const catalogoSelect = document.getElementById("catalogo").value;
                if (catalogoSelect) {
                    obtenerDescripcionCatalogo(catalogoSelect);
                }
            });
        } else {
            // Mostrar mensaje de error
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message,
                confirmButtonColor: '#800020'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error de conexión',
            text: 'Ocurrió un error al guardar el producto',
            confirmButtonColor: '#800020'
        });
    });
});