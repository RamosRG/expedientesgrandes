// ============================================
// FUNCIÓN PARA CONVERTIR NÚMEROS A TEXTO
// ============================================
function numeroATexto(numero) {
    if (isNaN(numero) || numero === null || numero === undefined) {
        return "CERO PESOS 00/100 M.N.";
    }

    const numeroRedondeado = Math.round(numero * 100) / 100;
    const partes = numeroRedondeado.toFixed(2).split('.');
    const enteros = parseInt(partes[0]);
    const decimales = parseInt(partes[1]);

    if (enteros === 0 && decimales === 0) {
        return "CERO PESOS 00/100 M.N.";
    }

    const unidades = ["", "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE"];
    const decenas = ["", "DIEZ", "VEINTE", "TREINTA", "CUARENTA", "CINCUENTA", "SESENTA", "SETENTA", "OCHENTA", "NOVENTA"];
    const decenasEspeciales = ["", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISÉIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE"];
    const centenas = ["", "CIENTO", "DOSCIENTOS", "TRESCIENTOS", "CUATROCIENTOS", "QUINIENTOS", "SEISCIENTOS", "SETECIENTOS", "OCHOCIENTOS", "NOVECIENTOS"];

    function convertirNumero(num) {
        if (num === 0) return "";
        if (num < 10) return unidades[num];
        if (num < 20) {
            if (num === 10) return "DIEZ";
            return decenasEspeciales[num - 10];
        }
        if (num < 100) {
            const dec = Math.floor(num / 10);
            const uni = num % 10;
            if (uni === 0) return decenas[dec];
            if (dec === 2) return "VEINTI" + unidades[uni].toLowerCase();
            return decenas[dec] + " Y " + unidades[uni].toLowerCase();
        }
        if (num < 1000) {
            const cen = Math.floor(num / 100);
            const resto = num % 100;
            if (cen === 1 && resto === 0) return "CIEN";
            if (resto === 0) return centenas[cen];
            return centenas[cen] + " " + convertirNumero(resto);
        }
        if (num < 1000000) {
            const miles = Math.floor(num / 1000);
            const resto = num % 1000;
            if (miles === 1) {
                return "MIL" + (resto > 0 ? " " + convertirNumero(resto) : "");
            }
            return convertirNumero(miles) + " MIL" + (resto > 0 ? " " + convertirNumero(resto) : "");
        }
        if (num < 1000000000) {
            const millones = Math.floor(num / 1000000);
            const resto = num % 1000000;
            if (millones === 1) {
                return "UN MILLÓN" + (resto > 0 ? " " + convertirNumero(resto) : "");
            }
            return convertirNumero(millones) + " MILLONES" + (resto > 0 ? " " + convertirNumero(resto) : "");
        }
        return num.toString();
    }

    let textoEnteros = convertirNumero(enteros);
    if (enteros === 0) textoEnteros = "CERO";
    if (enteros === 1) textoEnteros = "UN";

    const moneda = enteros === 1 ? "PESO" : "PESOS";
    const decimalStr = decimales.toString().padStart(2, '0');

    return `${textoEnteros} ${moneda} ${decimalStr}/100 M.N.`;
}

// ============================================
// FUNCIONES PRINCIPALES
// ============================================

function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

function cargarProductosContratoEstudio(id) {
    fetch(`../obtenerProductosContratoEstudio/${id}`)
        .then(response => response.json())
        .then(response => {
            if (!response.success) {
                alert("No se encontró información");
                return;
            }

            const datos = response.data;
            if (!datos || datos.length === 0) {
                alert("No existen registros");
                return;
            }

            const catalogo = datos[0]?.catalogo ?? "—";
            $("#catalogo, #Textocatalogo, #catalogo1, #catalogo2, #catalogo3, #catalogo4")
                .text(catalogo);

            $("#coordinador").text(datos[0]?.coordinador ?? "—");
            $("#coordinador1").text(datos[0]?.coordinador ?? "—");
            $("#area").text(datos[0]?.area ?? "—");
            $("#created_at").text(formatearFechaEnEspanol(datos[0]?.created_at));

            cargarTablaProductos(datos);
        })
        .catch(error => {
            console.error(error);
            alert("Error al cargar la información");
        });
}

function cargarTablaProductos(datos) {
    const tbody = document.getElementById("tbodyProductos");
    if (!tbody) return;

    let html = '';
    datos.forEach(item => {
        const cantidadFormateada = Number(item.cantidad) || 0;
        
        html += `
            <tr>
                <td>${item.partida ?? ''}</td>
                <td class="celda-editable" contenteditable="true">
                    ${item.descripcion ?? ''}
                </td>
                <td class="celda-editable" contenteditable="true">
                    ${item.unidad_medida ?? ''}
                </td>
                <td class="celda-editable" contenteditable="true">
                    ${cantidadFormateada}
                </td>
                <td>🖼️ ref</td>
            </tr>
        `;
    });
    tbody.innerHTML = html;
}

function cargarEstudio(id) {
    $.ajax({
        url: "../../portalProcesos/obtenerEstudioMercadoPorId/" + id,
        type: "GET",
        dataType: "json",

        beforeSend: function() {
            $("#tbodyEstudio").html(`
                <tr>
                    <td colspan="20" style="text-align:center;padding:12px;font-family:'Century Gothic',sans-serif;">
                        <i class="fas fa-spinner fa-spin"></i> Cargando datos…
                    </td>
                </tr>
            `);
        },

        success: function(response) {
            if (!response.success) {
                alert("Error al cargar datos: " + (response.message || "Sin detalle"));
                return;
            }

            if (!response.data || response.data.length === 0) {
                $("#tbodyEstudio").html(`
                    <tr><td colspan="20" style="font-family:'Century Gothic',sans-serif;">Sin datos disponibles.</td></tr>
                `);
                return;
            }

            const primer = response.data[0];
            $("#areaTexto").text(primer.area ?? "—");
            $("#areaTexto1").text(primer.area ?? "—");
            $("#nombreEstudioTexto").text(primer.nombre_estudio ?? "—");
            $("#fechaTexto").text(formatearFechaEnEspanol(primer.created_at));

            const normalizarProveedor = (item) => {
                if (!item.nombre) return null;
                return `${item.nombre} ${item.apellido_paterno ?? ""} ${item.apellidoM ?? ""}`
                    .trim()
                    .toUpperCase()
                    .replace(/\s+/g, " ");
            };

            const agrupado = {};
            const proveedoresSet = new Set();

            response.data.forEach(item => {
                const idDesc = item.id_descripcion;
                const proveedor = normalizarProveedor(item);

                if (proveedor) proveedoresSet.add(proveedor);

                if (!agrupado[idDesc]) {
                    agrupado[idDesc] = {
                        partida: item.partida,
                        descripcion: item.descripcion,
                        unidad: item.unidad_medida,
                        cantidad: parseFloat(item.cantidad) || 0,
                        proveedores: {}
                    };
                }

                if (proveedor) {
                    agrupado[idDesc].proveedores[proveedor] = {
                        precio: parseFloat(item.precio_unitario) || 0,
                        total: parseFloat(item.precio_total) || 0,
                        marca_modelo: item.marca_modelo || "—"
                    };
                }
            });

            const proveedores = Array.from(proveedoresSet);
            const totalesPorProveedor = Object.fromEntries(
                proveedores.map(p => [p, 0])
            );

            let thead = `
                <th style="width:7%;font-family:'Century Gothic',sans-serif;">PARTIDA</th>
                <th style="width:22%;font-family:'Century Gothic',sans-serif;">DESCRIPCIÓN</th>
                <th style="width:8%;font-family:'Century Gothic',sans-serif;">UNIDAD</th>
                <th style="width:8%;font-family:'Century Gothic',sans-serif;">CANTIDAD</th>`;

            const anchoProveedor = (50 / proveedores.length).toFixed(1);
            proveedores.forEach(p => {
                thead += `<th colspan="3" style="width:${anchoProveedor}%;font-family:'Century Gothic',sans-serif;">${p}</th>`;
            });
            thead += `<th style="width:8%;font-family:'Century Gothic',sans-serif;">PROMEDIO TOTAL</th>`;

            $("#tablaEstudio thead tr:first-child").html(thead);

            let tbodyHtml = "";
            Object.values(agrupado).forEach(item => {
                let fila = `
                    <tr>
                        <td style="font-family:'Century Gothic',sans-serif;">${item.partida}</td>
                        <td style="text-align:left;font-family:'Century Gothic',sans-serif;">${item.descripcion}</td>
                        <td style="font-family:'Century Gothic',sans-serif;">${item.unidad}</td>
                        <td style="font-family:'Century Gothic',sans-serif;">${item.cantidad}</td>`;

                let sumaFilas = 0;
                let conteo = 0;

                proveedores.forEach(p => {
                    const datos = item.proveedores[p];
                    if (datos) {
                        const precio = datos.precio;
                        const total = datos.total > 0 ? datos.total : precio * item.cantidad;
                        totalesPorProveedor[p] += total;
                        sumaFilas += total;
                        conteo++;

                        fila += `
                            <td style="font-family:'Century Gothic',sans-serif;">${formatDinero(precio)}</td>
                            <td style="font-family:'Century Gothic',sans-serif;">${formatDinero(total)}</td>
                            <td style="font-family:'Century Gothic',sans-serif;">${datos.marca_modelo}</td>`;
                    } else {
                        fila += `<td style="font-family:'Century Gothic',sans-serif;">—</td><td style="font-family:'Century Gothic',sans-serif;">—</td><td style="font-family:'Century Gothic',sans-serif;">—</td>`;
                    }
                });

                const promedio = conteo > 0 ? sumaFilas / conteo : 0;
                fila += `
                    <td style="font-family:'Century Gothic',sans-serif;"><strong>${formatDinero(promedio)}</strong></td>
                </tr>`;
                tbodyHtml += fila;
            });

            $("#tbodyEstudio").html(tbodyHtml);

            const colSpanFijo = 4;
            let tfootHtml = `<tr class="tfoot-subtotal">
                <th colspan="${colSpanFijo}" style="font-family:'Century Gothic',sans-serif;">SUBTOTAL</th>`;

            proveedores.forEach(p => {
                const sub = totalesPorProveedor[p];
                tfootHtml += `<td style="font-family:'Century Gothic',sans-serif;"></td><td style="font-family:'Century Gothic',sans-serif;"><strong>${formatDinero(sub)}</strong></td><td style="font-family:'Century Gothic',sans-serif;"></td>`;
            });
            tfootHtml += `<td style="font-family:'Century Gothic',sans-serif;"></td></tr>`;

            tfootHtml += `<tr class="tfoot-iva">
                <th colspan="${colSpanFijo}" style="font-family:'Century Gothic',sans-serif;">IVA (16%)</th>`;

            proveedores.forEach(p => {
                const iva = totalesPorProveedor[p] * 0.16;
                tfootHtml += `<td style="font-family:'Century Gothic',sans-serif;"></td><td style="font-family:'Century Gothic',sans-serif;">${formatDinero(iva)}</td><td style="font-family:'Century Gothic',sans-serif;"></td>`;
            });
            tfootHtml += `<td style="font-family:'Century Gothic',sans-serif;"></td></tr>`;

            tfootHtml += `<tr class="tfoot-total">
                <th colspan="${colSpanFijo}" style="font-family:'Century Gothic',sans-serif;">TOTAL</th>`;

            let sumaTotales = 0;
            proveedores.forEach(p => {
                const totalProveedor = totalesPorProveedor[p] * 1.16;
                sumaTotales += totalProveedor;
                tfootHtml += `<td style="font-family:'Century Gothic',sans-serif;"></td><td style="font-family:'Century Gothic',sans-serif;"><strong>${formatDinero(totalProveedor)}</strong></td><td style="font-family:'Century Gothic',sans-serif;"></td>`;
            });

            const promedioGeneral = proveedores.length > 0 ? sumaTotales / proveedores.length : 0;
            tfootHtml += `<td style="font-family:'Century Gothic',sans-serif;"><strong>${formatDinero(promedioGeneral)}</strong></td></tr>`;

            $("#tablaEstudio tfoot").remove();
            $("#tablaEstudio").append(`<tfoot>${tfootHtml}</tfoot>`);

            // Actualizar el estimado con el promedio general
            setTimeout(function() {
                calcularTotalEstimado();
            }, 100);
        },

        error: function(xhr, status, error) {
            console.error("Error AJAX:", status, error);
            alert("No se pudo conectar con el servidor.");
        }
    });
}

function cargarEmpresaProveedorCostos(id) {
    $.ajax({
        url: "../../portalProcesos/obtenerEstudioMercadoPorId/" + id,
        type: "GET",
        dataType: "json",

        beforeSend: function() {
            $("#tbodyEmpresaProveedor").html(`
                <tr>
                    <td colspan="3" style="text-align:center;padding:12px;font-family:'Century Gothic',sans-serif;">
                        <i class="fas fa-spinner fa-spin"></i> Cargando datos…
                    </td>
                </tr>
            `);
        },

        success: function(response) {
            if (!response.success) {
                $("#tbodyEmpresaProveedor").html(`
                    <tr><td colspan="3" style="text-align:center;font-family:'Century Gothic',sans-serif;">Error: ${response.message || "Sin datos"}</td></tr>
                `);
                $("#totalGeneralEmpresaProveedor").text("$0.00");
                return;
            }

            if (!response.data || response.data.length === 0) {
                $("#tbodyEmpresaProveedor").html(`
                    <tr><td colspan="3" style="text-align:center;font-family:'Century Gothic',sans-serif;">Sin datos disponibles.</td></tr>
                `);
                $("#totalGeneralEmpresaProveedor").text("$0.00");
                return;
            }

            const normalizarProveedor = (item) => {
                if (!item.nombre) return null;
                return `${item.nombre} ${item.apellido_paterno ?? ""} ${item.apellidoM ?? ""}`
                    .trim()
                    .toUpperCase()
                    .replace(/\s+/g, " ");
            };

            const acumulador = {};
            response.data.forEach(item => {
                let entidad = null;
                let tipo = null;

                if (item.empresa && item.empresa.trim() !== "") {
                    entidad = item.empresa.trim().toUpperCase();
                    tipo = "empresa";
                } else if (item.nombre && item.nombre.trim() !== "") {
                    entidad = normalizarProveedor(item);
                    tipo = "proveedor";
                }

                if (!entidad) return;

                const subtotal = parseFloat(item.precio_total) || 0;
                const totalConIva = subtotal * 1.16;

                if (!acumulador[entidad]) {
                    acumulador[entidad] = {
                        nombre: entidad,
                        tipo: tipo,
                        total: 0
                    };
                }
                acumulador[entidad].total += totalConIva;
            });

            const entidadesArray = Object.values(acumulador);
            if (entidadesArray.length === 0) {
                $("#tbodyEmpresaProveedor").html(`
                    <tr><td colspan="3" style="text-align:center;font-family:'Century Gothic',sans-serif;">No se encontraron empresas ni proveedores.</td></tr>
                `);
                $("#totalGeneralEmpresaProveedor").text("$0.00");
                return;
            }

            let htmlFilas = '';
            let totalGeneral = 0;
            entidadesArray.forEach(ent => {
                totalGeneral += ent.total;
                htmlFilas += `
                    <tr>
                        <td style="font-family:'Century Gothic',sans-serif;"><span class="texto-precios-grande">Precios de:</span></td>
                        <td style="font-family:'Century Gothic',sans-serif;"><strong>${ent.nombre}</strong> ${ent.tipo === "empresa" ? "(EMPRESA)" : "(PROVEEDOR)"}</td>
                        <td style="font-family:'Century Gothic',sans-serif;">${formatDinero(ent.total)}</td>
                    </tr>
                `;
            });

            $("#tbodyEmpresaProveedor").html(htmlFilas);
            $("#totalGeneralEmpresaProveedor").text(formatDinero(totalGeneral));
        },

        error: function(xhr, status, error) {
            console.error("Error AJAX en empresa/proveedor:", status, error);
            $("#tbodyEmpresaProveedor").html(`
                <tr><td colspan="3" style="text-align:center;font-family:'Century Gothic',sans-serif;">Error al cargar datos.</td></tr>
            `);
            $("#totalGeneralEmpresaProveedor").text("$0.00");
        }
    });
}

function formatDinero(valor) {
    if (valor === null || valor === undefined || isNaN(valor)) valor = 0;
    return "$" + (parseFloat(valor) || 0).toLocaleString("es-MX", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

// ============================================
// FUNCIÓN PARA ACTUALIZAR EL ESTIMADO CON TEXTO
// ============================================
function actualizarEstimadoConTexto() {
    const estimadoSpan = document.getElementById('estimadoTotal');
    if (!estimadoSpan) return;
    
    let textoActual = estimadoSpan.innerText.trim();
    const regex = /\$[\s]*([\d,]+\.\d{2})/;
    const match = textoActual.match(regex);
    
    if (match) {
        const numeroLimpio = match[1].replace(/,/g, '');
        const numero = parseFloat(numeroLimpio);
        
        if (!isNaN(numero) && numero > 0) {
            const textoNumero = numeroATexto(numero);
            const numeroFormateado = formatDinero(numero);
            estimadoSpan.innerText = `${numeroFormateado} (${textoNumero})`;
        }
    }
}

// ============================================
// FUNCIÓN PARA CALCULAR EL TOTAL DEL ESTUDIO
// ============================================
function calcularTotalEstimado() {
    const totales = document.querySelectorAll('#tablaEstudio tfoot .tfoot-total td strong');
    if (totales.length > 0) {
        let ultimoTotal = totales[totales.length - 1];
        if (ultimoTotal) {
            let textoTotal = ultimoTotal.textContent;
            const numero = parseFloat(textoTotal.replace(/[^0-9.-]/g, ''));
            if (!isNaN(numero) && numero > 0) {
                const estimadoSpan = document.getElementById('estimadoTotal');
                if (estimadoSpan) {
                    const textoNumero = numeroATexto(numero);
                    const numeroFormateado = formatDinero(numero);
                    estimadoSpan.innerText = `${numeroFormateado} (${textoNumero})`;
                }
            }
        }
    }
}

// ============================================
// FORMATEAR FECHA EN ESPAÑOL
// ============================================
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

function guardarDocumento() {
    let todosCampos = document.querySelectorAll('.campo-verde, .celda-editable');
    let data = {};
    todosCampos.forEach((el, idx) => {
        let val = el.innerText.trim() !== '' ? el.innerText.trim() : '[sin dato]';
        data[`campo_${idx}`] = val;
    });
    console.log("Estudio de mercado guardado:", data);
    localStorage.setItem('estudioPapeleriaCompleto', JSON.stringify(data));
    alert("✔ Documento actualizado. Los cambios se han guardado de forma local.");
}

// ============================================
// DOCUMENT READY
// ============================================
$(document).ready(function() {
    const id = obtenerIdDesdeURL();

    if (id) {
        cargarProductosContratoEstudio(id);
        cargarEstudio(id);
        cargarEmpresaProveedorCostos(id);
    } else {
        alert("No se encontró ID en la URL");
    }

    const stored = localStorage.getItem('estudioPapeleriaCompleto');
    if (stored) {
        try {
            const valores = JSON.parse(stored);
            let i = 0;
            document.querySelectorAll('.campo-verde, .celda-editable').forEach(el => {
                if (valores[`campo_${i}`] && valores[`campo_${i}`] !== '[sin dato]') {
                    if (el.innerText.trim() === '' || el.innerText.includes('______')) {
                        el.innerText = valores[`campo_${i}`];
                    }
                }
                i++;
            });
        } catch (e) { console.error("Error al cargar datos locales:", e); }
    }

    // Listener para actualizar automáticamente el campo estimado
    $(document).on('input', '#estimadoTotal', function() {
        const texto = $(this).text().trim();
        const regex = /\$[\s]*([\d,]+\.\d{2})/;
        const match = texto.match(regex);
        if (match) {
            const numeroLimpio = match[1].replace(/,/g, '');
            const numero = parseFloat(numeroLimpio);
            if (!isNaN(numero) && numero > 0) {
                const textoNumero = numeroATexto(numero);
                const numeroFormateado = formatDinero(numero);
                $(this).text(`${numeroFormateado} (${textoNumero})`);
            }
        }
    });

    // Guardar y actualizar
    $('#btnGuardarEstudio').on('click', function() {
        actualizarEstimadoConTexto();
        guardarDocumento();
    });
});