$(document).ready(function () {
    const id = obtenerIdDesdeURL();
    cargarEstudio(id);
});

function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}


function cargarEstudio(id) {

    $.ajax({
        url: "../../portalProcesos/obtenerEstudioMercadoPorId/" + id,
        type: "GET",
        dataType: "json",

        beforeSend: function () {
            $("#tbodyEstudio").html(`
                <tr>
                    <td colspan="20" style="text-align:center;padding:20px;">
                        <i class="fas fa-spinner fa-spin"></i> Cargando datos…
                    </td>
                </tr>
            `);
        },

        success: function (response) {

            if (!response.success) {
                alert("Error al cargar datos: " + (response.message || "Sin detalle"));
                return;
            }

            if (!response.data || response.data.length === 0) {
                $("#tbodyEstudio").html(`
                    <tr><td colspan="20">Sin datos disponibles.</td></tr>
                `);
                return;
            }

            /* ── Datos generales ─────────────────────────────────────── */
            const primer = response.data[0];
            $("#areaTexto").text(primer.area ?? "—");
            $("#nombreEstudioTexto").text(primer.nombre_estudio ?? "—");
            $("#fechaTexto").text(formatearFecha(primer.created_at));

            /* ── Helper: normalizar nombre de proveedor ──────────────── */
            const normalizarProveedor = (item) => {
                if (!item.nombre) return null;
                return `${item.nombre} ${item.apellido_paterno ?? ""} ${item.apellidoM ?? ""}`
                    .trim()
                    .toUpperCase()
                    .replace(/\s+/g, " ");
            };

            /* ── Agrupación ──────────────────────────────────────────── */
            const agrupado = {};   // { id_descripcion: { ...fila } }
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
                        // ✅ la columna real del modelo es precio_total
                        total: parseFloat(item.precio_total) || 0,
                        marca_modelo: item.marca_modelo || "—"
                    };
                }
            });

            /* ── Lista definitiva de proveedores ─────────────────────── */
            const proveedores = Array.from(proveedoresSet);

            /* ── Acumuladores de subtotales por proveedor ────────────── */
            const totalesPorProveedor = Object.fromEntries(
                proveedores.map(p => [p, 0])
            );

            /* ════════════════════════════════════════════════════════════
               THEAD
            ═══════════════════════════════════════════════════════════ */
            let thead = `
<tr>
    <th rowspan="3">PARTIDA</th>
    <th rowspan="3">DESCRIPCIÓN</th>
    <th rowspan="3">UNIDAD</th>
    <th rowspan="3">CANTIDAD</th>`;

            proveedores.forEach(p => {
                thead += `<th colspan="3">${p}</th>`;
            });

            thead += `<th rowspan="3">PROMEDIO TOTAL</th></tr>`;

            thead += `<tr>`;
            proveedores.forEach(() => { thead += `<th colspan="3">PRECIOS</th>`; });
            thead += `</tr>`;

            thead += `<tr>`;
            proveedores.forEach(() => {
                thead += `
    <th>UNITARIO</th>
    <th>TOTAL</th>
    <th>MARCA / MODELO</th>`;
            });
            thead += `</tr>`;

            $("#tablaEstudio thead").html(thead);

            /* ════════════════════════════════════════════════════════════
               TBODY
            ═══════════════════════════════════════════════════════════ */
            let tbodyHtml = "";

            Object.values(agrupado).forEach(item => {

                let fila = `
<tr>
    <td>${item.partida}</td>
    <td style="text-align:left">${item.descripcion}</td>
    <td>${item.unidad}</td>
    <td>${item.cantidad}</td>`;

                let sumaFilas = 0;
                let conteo = 0;

                proveedores.forEach(p => {
                    const datos = item.proveedores[p];

                    if (datos) {
                        const precio = datos.precio;
                        // Si el backend ya calculó precio_total úsalo;
                        // si viene en 0 (no calculado), calcularlo localmente.
                        const total = datos.total > 0
                            ? datos.total
                            : precio * item.cantidad;

                        totalesPorProveedor[p] += total;
                        sumaFilas += total;
                        conteo++;

                        fila += `
    <td>${formatDinero(precio)}</td>
    <td>${formatDinero(total)}</td>
    <td>${datos.marca_modelo}</td>`;
                    } else {
                        fila += `<td>—</td><td>—</td><td>—</td>`;
                    }
                });

                const promedio = conteo > 0 ? sumaFilas / conteo : 0;
                fila += `
    <td><strong>${formatDinero(promedio)}</strong></td>
</tr>`;

                tbodyHtml += fila;
            });

            $("#tbodyEstudio").html(tbodyHtml);

            /* ════════════════════════════════════════════════════════════
               TFOOT  (subtotal / IVA / total)
            ═══════════════════════════════════════════════════════════ */
            const colSpanFijo = 4;   // PARTIDA + DESCRIPCIÓN + UNIDAD + CANTIDAD

            /* — Subtotal — */
            let tfootHtml = `<tr class="tfoot-subtotal">
    <th colspan="${colSpanFijo}">SUBTOTAL</th>`;

            proveedores.forEach(p => {
                const sub = totalesPorProveedor[p];
                tfootHtml += `<td></td><td><strong>${formatDinero(sub)}</strong></td><td></td>`;
            });
            tfootHtml += `<td></td></tr>`;

            /* — IVA — */
            tfootHtml += `<tr class="tfoot-iva">
    <th colspan="${colSpanFijo}">IVA (16%)</th>`;

            proveedores.forEach(p => {
                const iva = totalesPorProveedor[p] * 0.16;
                tfootHtml += `<td></td><td>${formatDinero(iva)}</td><td></td>`;
            });
            tfootHtml += `<td></td></tr>`;

            /* — Total — */
            tfootHtml += `<tr class="tfoot-total">
    <th colspan="${colSpanFijo}">TOTAL</th>`;

            let sumaTotales = 0;

            proveedores.forEach(p => {
                const totalProveedor = totalesPorProveedor[p] * 1.16;
                sumaTotales += totalProveedor;
                tfootHtml += `<td></td><td><strong>${formatDinero(totalProveedor)}</strong></td><td></td>`;
            });

            const promedioGeneral = proveedores.length > 0
                ? sumaTotales / proveedores.length
                : 0;

            tfootHtml += `<td><strong>${formatDinero(promedioGeneral)}</strong></td></tr>`;

            /* Reemplazar tfoot limpiamente */
            $("#tablaEstudio tfoot").remove();
            $("#tablaEstudio").append(`<tfoot>${tfootHtml}</tfoot>`);
        },

        error: function (xhr, status, error) {
            console.error("Error AJAX:", status, error);
            alert("No se pudo conectar con el servidor.");
        }
    });
}

/* ── Utilidades ──────────────────────────────────────────────────────── */

/** Formatea número como dinero: $1,234.56 */
function formatDinero(valor) {
    return "$" + (parseFloat(valor) || 0).toLocaleString("es-MX", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

/** Convierte "2024-05-19 14:30:00" → "19/05/2024" */
function formatearFecha(fechaStr) {
    if (!fechaStr) return "—";
    const d = new Date(fechaStr);
    if (isNaN(d)) return fechaStr;
    return d.toLocaleDateString("es-MX", {
        day: "2-digit", month: "2-digit", year: "numeric"
    });
}

