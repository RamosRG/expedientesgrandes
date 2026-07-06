// ============================================
// FUNCIONES PRINCIPALES
// ============================================

function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

// ============================================
// FUNCIÓN PARA CONVERTIR NÚMERO A TEXTO EN ESPAÑOL
// ============================================
function numeroATexto(numero) {
    if (numero === null || numero === undefined || isNaN(numero)) return "CERO PESOS 00/100 M.N.";
    
    // Separar parte entera y decimal
    const partes = numero.toFixed(2).split('.');
    const entero = parseInt(partes[0]);
    const decimal = parseInt(partes[1]);
    
    if (entero === 0 && decimal === 0) return "CERO PESOS 00/100 M.N.";
    
    // Arrays de unidades
    const unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
    const especiales = ['DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISÉIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'];
    const decenas = ['', 'DIEZ', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA', 'SETENTA', 'OCHENTA', 'NOVENTA'];
    const centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
    
    function convertirGrupo(n) {
        if (n === 0) return '';
        if (n < 10) return unidades[n];
        if (n < 20) return especiales[n - 10];
        if (n < 100) {
            const d = Math.floor(n / 10);
            const u = n % 10;
            if (u === 0) return decenas[d];
            if (d === 2) return `VEINTI${unidades[u].toLowerCase()}`;
            return `${decenas[d]} Y ${unidades[u].toLowerCase()}`;
        }
        if (n < 1000) {
            const c = Math.floor(n / 100);
            const resto = n % 100;
            if (c === 1 && resto === 0) return 'CIEN';
            if (resto === 0) return centenas[c];
            return `${centenas[c]} ${convertirGrupo(resto)}`;
        }
        return '';
    }
    
    function convertirMiles(n) {
        if (n === 0) return '';
        if (n < 1000) return convertirGrupo(n);
        
        const miles = Math.floor(n / 1000);
        const resto = n % 1000;
        let texto = '';
        
        if (miles === 1) {
            texto = 'MIL';
        } else {
            texto = convertirGrupo(miles) + ' MIL';
        }
        
        if (resto > 0) {
            texto += ' ' + convertirGrupo(resto);
        }
        
        return texto;
    }
    
    function convertirMillones(n) {
        if (n === 0) return '';
        if (n < 1000000) return convertirMiles(n);
        
        const millones = Math.floor(n / 1000000);
        const resto = n % 1000000;
        let texto = '';
        
        if (millones === 1) {
            texto = 'UN MILLÓN';
        } else {
            texto = convertirMiles(millones) + ' MILLONES';
        }
        
        if (resto > 0) {
            texto += ' ' + convertirMiles(resto);
        }
        
        return texto;
    }
    
    // Construir el texto final
    let textoCompleto = '';
    if (entero > 0) {
        textoCompleto = convertirMillones(entero);
    }
    
    // Agregar "PESOS" y los centavos
    const textoCentavos = decimal.toString().padStart(2, '0');
    textoCompleto = (textoCompleto || 'CERO') + ` PESOS ${textoCentavos}/100 M.N.`;
    
    return textoCompleto;
}

// ============================================
// FUNCIÓN PARA ACTUALIZAR EL TOTAL EN EL SPAN
// ============================================
function actualizarTotalEnTexto(total) {
    // Buscar el span que contiene el total
    const spanTotal = document.querySelector('.estimado-box .campo-verde.campo-largo');
    if (!spanTotal) {
        console.warn('No se encontró el span del total');
        return;
    }
    
    // Formatear el número con moneda
    const totalFormateado = formatDinero(total);
    
    // Convertir a texto
    const totalTexto = numeroATexto(total);
    
    // Actualizar el contenido del span
    spanTotal.textContent = `${totalFormateado} (${totalTexto})`;
    
    // Guardar en localStorage automáticamente
    guardarTotalEnLocalStorage(totalFormateado, totalTexto);
}

// ============================================
// FUNCIÓN PARA GUARDAR EN LOCALSTORAGE
// ============================================
function guardarTotalEnLocalStorage(totalFormateado, totalTexto) {
    try {
        const data = {
            total: totalFormateado,
            totalTexto: totalTexto,
            fecha: new Date().toISOString()
        };
        localStorage.setItem('totalEstudioMercado', JSON.stringify(data));
    } catch (e) {
        console.error('Error al guardar en localStorage:', e);
    }
}

// ============================================
// FUNCIÓN PARA CARGAR DESDE LOCALSTORAGE
// ============================================
function cargarTotalDesdeLocalStorage() {
    try {
        const stored = localStorage.getItem('totalEstudioMercado');
        if (stored) {
            const data = JSON.parse(stored);
            const spanTotal = document.querySelector('.estimado-box .campo-verde.campo-largo');
            if (spanTotal && data.total && data.totalTexto) {
                spanTotal.textContent = `${data.total} (${data.totalTexto})`;
                return true;
            }
        }
    } catch (e) {
        console.error('Error al cargar desde localStorage:', e);
    }
    return false;
}

// ============================================
// FUNCIÓN PARA FORMATEAR FECHA EN ESPAÑOL
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

// ============================================
// FUNCIÓN PARA FORMATEAR DINERO
// ============================================
function formatDinero(valor) {
    if (valor === null || valor === undefined || isNaN(valor)) valor = 0;
    return "$" + (parseFloat(valor) || 0).toLocaleString("es-MX", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

// ============================================
// FUNCIÓN PARA CARGAR PRODUCTOS DEL CONTRATO
// ============================================
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
            $("#area").text(datos[0]?.area ?? "—");
            $("#created_at").text(formatearFechaEnEspanol(datos[0]?.created_at));

            cargarTablaProductos(datos);
        })
        .catch(error => {
            console.error(error);
            alert("Error al cargar la información");
        });
}

// ============================================
// FUNCIÓN PARA CARGAR TABLA DE PRODUCTOS
// ============================================
function cargarTablaProductos(datos) {
    const tbody = document.getElementById("tbodyProductos");
    if (!tbody) return;

    let html = '';
    datos.forEach(item => {
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
                    ${item.cantidad ?? ''}
                </td>
                <td>🖼️ ref</td>
            </tr>
        `;
    });
    tbody.innerHTML = html;
}

// ============================================
// FUNCIÓN PARA CARGAR ESTUDIO DE MERCADO
// ============================================
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

            // THEAD
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

            // TBODY
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

            // TFOOT
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
        },

        error: function(xhr, status, error) {
            console.error("Error AJAX:", status, error);
            alert("No se pudo conectar con el servidor.");
        }
    });
}

// ============================================
// FUNCIÓN PARA CARGAR EMPRESA/PROVEEDOR Y COSTOS
// ============================================
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

            // ============================================
            // ACTUALIZAR EL TOTAL EN EL SPAN
            // ============================================
            if (totalGeneral > 0) {
                actualizarTotalEnTexto(totalGeneral);
            }
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

// ============================================
// FUNCIÓN PARA GUARDAR DOCUMENTO
// ============================================
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
// DOCUMENT READY - INICIALIZACIÓN
// ============================================
$(document).ready(function() {
    const id = obtenerIdDesdeURL();

    // ============================================
    // CARGAR TOTAL DESDE LOCALSTORAGE PRIMERO
    // ============================================
    if (!cargarTotalDesdeLocalStorage()) {
        console.log('No se encontraron datos guardados, usando valor por defecto del HTML');
    }

    if (id) {
        cargarProductosContratoEstudio(id);
        cargarEstudio(id);
        cargarEmpresaProveedorCostos(id);
    } else {
        alert("No se encontró ID en la URL");
    }

    // ============================================
    // CARGAR DATOS GUARDADOS EN LOCALSTORAGE
    // ============================================
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
        } catch (e) { 
            console.error("Error al cargar datos locales:", e); 
        }
    }

    // ============================================
    // LISTENER PARA ACTUALIZAR CUANDO EL USUARIO EDITE MANUALMENTE
    // ============================================
    $(document).on('input', '.campo-verde', function() {
        const spanTotal = document.querySelector('.estimado-box .campo-verde.campo-largo');
        if (spanTotal && this === spanTotal) {
            const textoCompleto = spanTotal.textContent;
            // Extraer el número del texto
            const match = textoCompleto.match(/\$([\d,]+\.\d{2})/);
            if (match) {
                const numero = parseFloat(match[1].replace(/,/g, ''));
                if (!isNaN(numero)) {
                    const totalFormateado = formatDinero(numero);
                    const totalTexto = numeroATexto(numero);
                    guardarTotalEnLocalStorage(totalFormateado, totalTexto);
                }
            }
        }
    });

    // ============================================
    // BOTÓN GUARDAR
    // ============================================
    $('#btnGuardarEstudio').on('click', guardarDocumento);
});