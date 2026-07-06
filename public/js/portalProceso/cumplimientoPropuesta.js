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
            console.log("Cargando datos del oficio...");
            mostrarCargando(true);
        },

        success: function (response) {
            console.log("Respuesta del servidor:", response);
            mostrarCargando(false);

            if (!response.success) {
                alert(response.message || "Error al obtener información");
                return;
            }

            if (!response.data || response.data.length === 0) {
                alert("No se encontraron registros");
                return;
            }

            const datos = response.data;
            
            // Obtener datos del primer registro (datos generales)
            const primerRegistro = datos[0];
            
            // Buscar el proveedor que presentó propuesta (el que tiene datos)
            let proveedorSeleccionado = null;
            let proveedorEncontrado = false;
            
            // Buscar en todos los registros el proveedor que tenga datos
            for (let i = 0; i < datos.length; i++) {
                if (datos[i].proveedor && datos[i].proveedor.trim() !== '' && datos[i].proveedor !== "—" && datos[i].proveedor !== "NULL" && datos[i].proveedor !== null) {
                    proveedorSeleccionado = datos[i].proveedor;
                    proveedorEncontrado = true;
                    break;
                }
            }
            
            // Si no se encontró proveedor, usar el primer registro que tenga algo
            if (!proveedorEncontrado && primerRegistro.proveedor) {
                proveedorSeleccionado = primerRegistro.proveedor;
            }

            // Llenar campos del oficio
            $("#nombre_estudio").text(primerRegistro.nombre_estudio || "");
            $("#no_licitacion").text(primerRegistro.no_licitacion || "");
            $("#no_licitacion1").text(primerRegistro.no_licitacion || "");
            
            // Formatear fecha
            const fechaFormateada = formatearFechaEnEspanol(primerRegistro.created_at);
            $("#created_at").text(fechaFormateada || "");
            $("#created_at1").text(fechaFormateada || "");
            
            $("#coordinador").text(primerRegistro.coordinador || "");
            
            // Colocar el proveedor seleccionado en el oficio
            if (proveedorSeleccionado) {
                $("#proveedor").text(proveedorSeleccionado);
                $("#proveedorCumplimiento").text(proveedorSeleccionado);
            } else {
                $("#proveedor").text("PROVEEDOR NO ESPECIFICADO");
                $("#proveedorCumplimiento").text("NO DISPONIBLE");
            }

            console.log("Proveedor seleccionado para el oficio:", proveedorSeleccionado);
            
            // Llenar tabla con todos los proveedores del procedimiento
            cargarTablaProveedores(datos, proveedorSeleccionado);
            
            // Llenar selector de proveedores
            llenarSelectorProveedores(datos, proveedorSeleccionado);
        },

        error: function (xhr, status, error) {
            mostrarCargando(false);
            console.error("Error AJAX:", error);
            console.error("Detalles del error:", xhr.responseText);
            
            // Si hay error, mostrar datos de ejemplo para pruebas
            mostrarDatosEjemplo();
        }
    });
}

function cargarTablaProveedores(datos, proveedorSeleccionado) {
    const tbody = $("#tbodyProveedores");
    if (!tbody.length) return;

    let html = "";
    let contador = 0;
    
    // Mostrar todos los proveedores del procedimiento
    datos.forEach(item => {
        // Verificar si este es el proveedor seleccionado
        const esProveedorSeleccionado = item.proveedor && 
                                       proveedorSeleccionado && 
                                       item.proveedor.trim() === proveedorSeleccionado.trim();
        
        // Determinar estatus
        let estatus = item.estatus || "PENDIENTE";
        let claseEstatus = "";
        let iconoEstatus = "";
        
        if (esProveedorSeleccionado) {
            estatus = "PROPUESTA ACEPTADA";
            claseEstatus = "estatus-aceptado";
            iconoEstatus = '<i class="fas fa-check-circle"></i> ';
        } else if (item.proveedor && item.proveedor.trim() !== '' && item.proveedor !== "—") {
            estatus = "REGISTRADO";
            claseEstatus = "estatus-registrado";
            iconoEstatus = '<i class="fas fa-clock"></i> ';
        } else {
            estatus = "SIN REGISTRO";
            claseEstatus = "estatus-pendiente";
            iconoEstatus = '<i class="fas fa-minus-circle"></i> ';
        }
        
        const claseFila = esProveedorSeleccionado ? 'class="proveedor-seleccionado"' : '';
        const filaId = `proveedor_${contador}`;
        
        html += `
            <tr ${claseFila} id="${filaId}">
                <td>${item.nombre_catalogo || "—"}</td>
                <td><strong>${item.proveedor || "—"}</strong></td>
                <td><span class="${claseEstatus}">${iconoEstatus}${estatus}</span></td>
                <td>${item.fecha_registro ? formatearFechaEnEspanol(item.fecha_registro) : "—"}</td>
                <td>
                    ${esProveedorSeleccionado ? '<span style="color: #2e7d32; font-weight: bold;"><i class="fas fa-check"></i> SELECCIONADO</span>' : 
                    `<button class="btn-seleccionar" data-proveedor="${item.proveedor || ''}" onclick="seleccionarProveedor('${item.proveedor || ''}')">
                        <i class="fas fa-arrow-right"></i> Seleccionar
                    </button>`}
                </td>
            </tr>
        `;
        contador++;
    });

    tbody.html(html);
}

function llenarSelectorProveedores(datos, proveedorSeleccionado) {
    const selector = $("#selectorProveedor");
    if (!selector.length) return;
    
    // Limpiar selector
    selector.html('<option value="">-- Seleccionar proveedor --</option>');
    
    // Agregar opciones únicas de proveedores
    const proveedoresUnicos = [];
    datos.forEach(item => {
        if (item.proveedor && item.proveedor.trim() !== '' && item.proveedor !== "—" && item.proveedor !== "NULL") {
            if (!proveedoresUnicos.includes(item.proveedor.trim())) {
                proveedoresUnicos.push(item.proveedor.trim());
            }
        }
    });
    
    proveedoresUnicos.forEach(proveedor => {
        const selected = (proveedorSeleccionado && proveedor === proveedorSeleccionado.trim()) ? 'selected' : '';
        selector.append(`<option value="${proveedor}" ${selected}>${proveedor}</option>`);
    });
    
    // Evento para cambiar proveedor
    selector.off('change').on('change', function() {
        const proveedorSeleccionado = $(this).val();
        if (proveedorSeleccionado) {
            // Actualizar el proveedor en el oficio
            $("#proveedor").text(proveedorSeleccionado);
            $("#proveedorCumplimiento").text(proveedorSeleccionado);
            
            // Resaltar en la tabla
            $('.proveedor-seleccionado').removeClass('proveedor-seleccionado');
            $('#tbodyProveedores tr').each(function() {
                const nombreProveedor = $(this).find('td:eq(1)').text().trim();
                if (nombreProveedor === proveedorSeleccionado) {
                    $(this).addClass('proveedor-seleccionado');
                    // Actualizar estatus en la tabla
                    $(this).find('td:eq(2)').html('<span class="estatus-aceptado"><i class="fas fa-check-circle"></i> PROPUESTA ACEPTADA</span>');
                    $(this).find('td:eq(4)').html('<span style="color: #2e7d32; font-weight: bold;"><i class="fas fa-check"></i> SELECCIONADO</span>');
                } else {
                    // Restaurar estatus de otros
                    const proveedorTd = $(this).find('td:eq(1)').text().trim();
                    if (proveedorTd && proveedorTd !== "—") {
                        $(this).find('td:eq(2)').html('<span class="estatus-registrado"><i class="fas fa-clock"></i> REGISTRADO</span>');
                        $(this).find('td:eq(4)').html(`<button class="btn-seleccionar" onclick="seleccionarProveedor('${proveedorTd}')"><i class="fas fa-arrow-right"></i> Seleccionar</button>`);
                    }
                }
            });
        }
    });
}

function seleccionarProveedor(proveedor) {
    if (!proveedor) return;
    // Actualizar selector
    $("#selectorProveedor").val(proveedor).trigger('change');
}

function mostrarCargando(mostrar) {
    if (mostrar) {
        // Mostrar indicador de carga
        $(".contenedor-documento").before('<div id="cargando" style="text-align: center; padding: 20px; background: white; border-radius: 8px; margin-bottom: 20px;"><i class="fas fa-spinner fa-spin" style="font-size: 24px; color: #1e4a6b;"></i> Cargando datos...</div>');
    } else {
        $("#cargando").remove();
    }
}

function mostrarDatosEjemplo() {
    // Datos de ejemplo para pruebas
    const datosEjemplo = [
        {
            nombre_estudio: "",
            no_licitacion: "",
            created_at: "",
            coordinador: "",
            nombre_catalogo: "",
            proveedor: "",
            estatus: ""
        },
        {
            nombre_estudio: "",
            no_licitacion: "",
            created_at: "",
            coordinador: "",
            nombre_catalogo: "",
            proveedor: "",
            estatus: ""
        },
        {
            nombre_estudio: "",
            no_licitacion: "",
            created_at: "",
            coordinador: "",
            nombre_catalogo: "",
            proveedor: "",
            estatus: ""
        }
    ];
    
    // Procesar datos de ejemplo
    const primerRegistro = datosEjemplo[0];
    let proveedorSeleccionado = "";
    
    // Llenar campos
    $("#nombre_estudio").text(primerRegistro.nombre_estudio);
    $("#no_licitacion").text(primerRegistro.no_licitacion);
    $("#no_licitacion1").text(primerRegistro.no_licitacion);
    $("#created_at").text(formatearFechaEnEspanol(primerRegistro.created_at));
    $("#created_at1").text(formatearFechaEnEspanol(primerRegistro.created_at));
    $("#coordinador").text(primerRegistro.coordinador);
    $("#proveedor").text(proveedorSeleccionado);
    $("#proveedorCumplimiento").text(proveedorSeleccionado);
    
    // Llenar tabla
    cargarTablaProveedores(datosEjemplo, proveedorSeleccionado);
    llenarSelectorProveedores(datosEjemplo, proveedorSeleccionado);
}