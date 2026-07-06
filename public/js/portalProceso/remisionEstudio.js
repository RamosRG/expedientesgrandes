$(document).ready(function () {
    const id = obtenerIdDesdeURL();
    if (id) {
        cargarRemisionEstudio(id);
    }
});

function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

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

function cargarRemisionEstudio(id) {
    $.ajax({
        url: "../../portalProcesos/obtenerRemisionEstudioPorId/" + id,
        type: "GET",
        dataType: "json",

        beforeSend: function () {
            console.log("Cargando encabezado...");
        },

        success: function (response) {
            console.log(response);

            if (!response.success) {
                alert(response.message || "Error al obtener información");
                return;
            }

            if (!response.data || response.data.length === 0) {
                alert("No se encontraron registros");
                return;
            }

            const datos = response.data[0];

            // Encabezado - AHORA CON FECHA EN ESPAÑOL
            $("#nombre_estudio").text(datos.nombre_estudio ?? "—");
            $("#no_licitacion").text(datos.no_licitacion ?? "—");
            $("#no_licitacion1").text(datos.no_licitacion ?? "—");
            $("#created_at").text(formatearFechaEnEspanol(datos.created_at));
            $("#created_at1").text(formatearFechaEnEspanol(datos.created_at));
            $("#area").text(datos.area ?? "—");
            $("#catalogo").text(datos.nombre_catalogo ?? "—");
            $("#catalogo1").text(datos.nombre_catalogo ?? "—");
            $("#coordinador").text(datos.coordinador ?? "—");
            $("#proveedor").text(datos.proveedor ?? "—");

            // Si quieres llenar una tabla
            cargarTablaCatalogos(response.data);
        },

        error: function (xhr, status, error) {
            console.error("Error AJAX:", error);
            alert("No se pudo conectar con el servidor.");
        }
    });
}

function cargarTablaCatalogos(datos) {
    const tbody = $("#tbodyCatalogos");
    if (!tbody.length) return;

    let html = "";
    datos.forEach(item => {
        html += `
            <tr>
                <td>${item.nombre_catalogo ?? ""}</td>
                <td>${item.proveedor ?? ""}</td>
            </tr>
        `;
    });

    tbody.html(html);
}