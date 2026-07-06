$(document).ready(function () {
    const id = obtenerIdDesdeURL();

    if (id) {
        cargarAnexoAperturaPropuestas(id);
    }
});

function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

function cargarAnexoAperturaPropuestas(id) {
    fetch(`../obtenerActoPreTabla/${id}`)
        .then(response => response.json())
        .then(response => {
            if (!response.success) {
                alert("No se encontró información");
                return;
            }

            const proveedores = response.data;
            if (!proveedores || proveedores.length === 0) {
                alert("No existen proveedores registrados");
                return;
            }

            // DATOS GENERALES (fuera de la tabla)
            if (document.getElementById('nombre_estudio')) {
                document.getElementById('nombre_estudio').textContent = proveedores[0].nombre_estudio ?? '';
            }
            if (document.getElementById('no_licitacion')) {
                document.getElementById('no_licitacion').textContent = proveedores[0].no_licitacion ?? '';
            }

            // Construir tabla dinámica
            construirTablaRequisitos(proveedores);
        })
        .catch(error => {
            console.error(error);
            alert("Error al cargar la información");
        });
}

function construirTablaRequisitos(proveedores) {
    const thead = document.getElementById('theadRequisitos');
    const tbody = document.getElementById('tbodyRequisitos');

    if (!thead || !tbody) return;

    thead.innerHTML = '';
    tbody.innerHTML = '';

    // ==========================================
    // FILA 1: "EMPRESA" y nombres de proveedores (cada uno ocupa 2 columnas)
    // ==========================================
    let firstRow = '<tr>';
    firstRow += '<th rowspan="2" style="vertical-align:middle; text-align:center; background:#f0f0f0; font-weight:bold; width:200px;">EMPRESA</th>';
    
    proveedores.forEach(proveedor => {
        firstRow += `<th class="empresa-columna" style="text-align:center; background:#f0f0f0; font-weight:bold;" colspan="2">${proveedor.proveedor || proveedor.nombre_empresa || ''}</th>`;
    });
    firstRow += '</tr>';
    thead.innerHTML += firstRow;

    // ==========================================
    // FILA 2: "PRESENTÓ" y "NO PRESENTÓ" debajo de cada proveedor
    // ==========================================
    let secondRow = '<tr style="background:#e8e8e8;">';
    
    proveedores.forEach(() => {
        secondRow += '<td class="centrado"><strong>PRESENTÓ</strong></td>';
        secondRow += '<td class="centrado"><strong>NO PRESENTÓ</strong></td>';
    });
    secondRow += '</tr>';
    thead.innerHTML += secondRow;

    // ==========================================
    // CUERPO: Requisitos fijos (sin números)
    // ==========================================
    const requisitos = obtenerRequisitosFijos();
    
    requisitos.forEach(requisito => {
        let row = '<tr>';
        // Primera columna: el nombre del requisito
        row += `<td style="text-align:left; padding:6px 4px;">${requisito.descripcion}</td>`;
        
        // Por cada proveedor: celda PRESENTÓ + celda NO PRESENTÓ
        proveedores.forEach(() => {
            row += `<td class="celda-editable check-editable" contenteditable="true" style="text-align:center;"></td>`;
            row += `<td class="celda-editable check-editable" contenteditable="true" style="text-align:center;"></td>`;
        });
        row += '</tr>';
        tbody.innerHTML += row;
    });
}

function obtenerRequisitosFijos() {
    return [
        { descripcion: "ESCRITO ELABORADO EN PAPEL MEMBRETADO DEL OFERENTE, EN EL CUAL INDIQUE EL NÚMERO TOTAL DE FOLIOS DE LOS QUE CONSTA SU PROPUESTA ECONÓMICA" },
        { descripcion: "PARTIDAS COTIZADAS" },
        { descripcion: "PRECIO UNITARIO" },
        { descripcion: "SUBTOTAL" },
        { descripcion: "I.V.A. DESGLOSADO" },
        { descripcion: "TOTAL" },
        { descripcion: "MONTO CON LETRA" },
    ];
}