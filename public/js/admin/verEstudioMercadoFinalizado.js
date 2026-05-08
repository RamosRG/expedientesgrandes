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
        success: function (response) {

    if (!response.success) {
        alert("Error al cargar datos");
        return;
    }

    if (response.data.length === 0) return;

    // 🔹 Datos generales
    let estudio = response.data[0];
    $("#areaTexto").text(estudio.area);
    $("#nombreEstudioTexto").text(estudio.nombre_estudio);
    $("#fechaTexto").text(estudio.created_at);

    // 🔹 Agrupar datos
    const agrupado = {};
    const proveedoresSet = new Set();

    response.data.forEach(item => {

        const idDesc = item.id_descripcion;

        const proveedor = item.id_usuario 
            ? `${item.nombre} ${item.apellidoP} ${item.apellidoM}`
            : null;

        if (proveedor) proveedoresSet.add(proveedor);

        if (!agrupado[idDesc]) {
            agrupado[idDesc] = {
                partida: item.partida,
                descripcion: item.descripcion,
                unidad: item.unidad_medida,
                cantidad: parseFloat(item.cantidad),
                proveedores: {}
            };
        }

        if (proveedor) {
            agrupado[idDesc].proveedores[proveedor] = {
                precio: parseFloat(item.precio_unitario || 0),
                total: item.costo_total 
                    ? parseFloat(item.costo_total)
                    : parseFloat(item.precio_unitario || 0) * parseFloat(item.cantidad)
            };
        }
    });

    const proveedores = Array.from(proveedoresSet);

    // 🔹 GENERAR THEAD DINÁMICO
    let thead = `
    <tr>
        <th rowspan="3">PARTIDA</th>
        <th rowspan="3">DESCRIPCIÓN</th>
        <th rowspan="3">UNIDAD</th>
        <th rowspan="3">CANTIDAD</th>
    `;

    proveedores.forEach((p, i) => {
        thead += `<th colspan="2">${p}</th>`;
    });

    thead += `<th rowspan="3">TOTAL</th></tr>`;

    thead += `<tr>`;
    proveedores.forEach(() => {
        thead += `<th colspan="2">PRECIOS</th>`;
    });
    thead += `</tr>`;

    thead += `<tr>`;
    proveedores.forEach(() => {
        thead += `<th>UNITARIO</th><th>TOTAL</th>`;
    });
    thead += `</tr>`;

    $("#tablaEstudio thead").html(thead);

    // 🔹 TBODY
    let html = "";
    let subtotal = 0;

    Object.values(agrupado).forEach(item => {

        let fila = `
        <tr>
            <td>${item.partida}</td>
            <td>${item.descripcion}</td>
            <td>${item.unidad}</td>
            <td>${item.cantidad}</td>
        `;

        let suma = 0;
        let count = 0;

        proveedores.forEach(p => {

            if (item.proveedores[p]) {

                let precio = item.proveedores[p].precio;
                let total = item.proveedores[p].total;

                suma += total;
                count++;

                fila += `
                    <td>$${precio.toFixed(2)}</td>
                    <td>$${total.toFixed(2)}</td>
                `;
            } else {
                fila += `<td>-</td><td>-</td>`;
            }
        });

        let promedio = count > 0 ? suma / count : 0;
        subtotal += promedio;

        fila += `<td>$${promedio.toFixed(2)}</td></tr>`;

        html += fila;
    });

    $("#tbodyEstudio").html(html);

    // 🔹 TOTALES
    let iva = subtotal * 0.16;
    let total = subtotal + iva;

    $("#subtotal").text("$" + subtotal.toFixed(2));
    $("#iva").text("$" + iva.toFixed(2));
    $("#total").text("$" + total.toFixed(2));
}
    });
}