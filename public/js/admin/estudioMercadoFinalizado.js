$(document).ready(function () {
    cargarTablaEstudiosFinalizados();
});

function cargarTablaEstudiosFinalizados() {

    $('.tabla-finalizados').DataTable({
        destroy: true,
        processing: true,
        serverSide: false,
        ajax: {
            url: "../portalProcesos/obtenerEstudiosFinalizados",
            type: "GET",
            dataSrc: function (response) {

                if (!response.success) {
                    alert("No se pudieron cargar los estudios finalizados");
                    return [];
                }

                return response.data;
            }
        },

     columns: [
    {
        data: "nombre_estudio"
    },
    {
        data: "area"
    },
    {
        data: "created_at"
    },
    {
        data: null,
        render: function (data, type, row) {

            return `
<div class="dropdown">

    <button 
        class="w3-btn w3-blue w3-round"
        onclick="toggleMenu(${row.id_estudio})"
    >
        <i class="fas fa-bars"></i> Opciones
    </button>

    <div 
        id="menu-${row.id_estudio}" 
        class="dropdown-content w3-card w3-white"
        style="display:none; position:absolute; z-index:999;"
    >

        <button 
            class="w3-btn w3-purple w3-block"
            onclick="verDocumento(${row.id_estudio})"
        >
            <i class="fas fa-external-link-alt"></i> Ver Documento
        </button>

        <button 
            class="w3-btn w3-green w3-block"
            onclick="descargarDocumento(${row.id_estudio})"
        >
            <i class="fas fa-download"></i> Descargar
        </button>

        <button 
            class="w3-btn w3-orange w3-block"
            onclick="abrirModalVista(${row.id_estudio})"
        >
            <i class="fas fa-table"></i> Crear Otro documento
        </button>

    </div>
</div>
            `;
        }
    }
],
       
    });
}
function toggleMenu(id) {

    $(".dropdown-content").hide();

    $("#menu-" + id).toggle();
}

// cerrar menus al dar click fuera
$(document).click(function (e) {

    if (!$(e.target).closest('.dropdown').length) {
        $(".dropdown-content").hide();
    }
});

function abrirModalVista(id) {

    $("#idEstudioSeleccionado").val(id);

    $("#modalVistas").show();
}

function cerrarModalVista() {

    $("#modalVistas").hide();
}
function enviarVista(vista) {

    let id = $("#idEstudioSeleccionado").val();

    let form = document.createElement("form");

    form.method = "POST";

    form.action = "../portalProcesos/documentosProcedimiento";

    // ID ESTUDIO
    let inputId = document.createElement("input");

    inputId.type = "hidden";
    inputId.name = "id_estudio";
    inputId.value = id;

    // VISTA
    let inputVista = document.createElement("input");

    inputVista.type = "hidden";
    inputVista.name = "vista";
    inputVista.value = vista;

    form.appendChild(inputId);

    form.appendChild(inputVista);

    document.body.appendChild(form);

    form.submit();
}
// cerrar al dar click fuera
$(document).click(function (e) {

    if (!$(e.target).closest('.dropdown').length) {
        $(".dropdown-content").hide();
    }
});
function verOtraVista(id) {

    console.log("Mostrar otra vista:", id);

    window.location.href = "../../portalProcesos/otraVista/";
}

function verDocumento(id) {
    window.location.href = "../portalProcesos/verEstudioMercado/" + id;
}

function descargarDocumento(id) {
    window.location.href = "../../portalProcesos/exportarEstudioMercado/" + id;
}