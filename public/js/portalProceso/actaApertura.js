
// DATOS QUE VIENEN DE CODEIGNITER


// =========================================================
// LICITACIÓN
// =========================================================

if (empresas.length > 0) {

    document.getElementById("no_licitacion").innerText =
        empresas[0].no_licitacion ?? '';

    document.getElementById("nombre_estudio").innerText =
        empresas[0].nombre_estudio ?? '';

    // =========================
    // FECHA Y HORA
    // =========================

    let createdAt = empresas[0].created_at;

    // EXTRAER HORA
    let hora = createdAt.split(' ')[1];

    // SOLO HH:MM
    hora = hora.substring(0, 5);

    document.getElementById("hora_estudio").innerText = hora;

    // =========================
    // FECHA EN TEXTO
    // =========================

    let fecha = new Date(createdAt);

    let fechaTexto = fecha.toLocaleDateString('es-MX', {

        day: '2-digit',
        month: 'long',
        year: 'numeric'

    }).toUpperCase();

    document.getElementById("fecha_estudio").innerText =
        fechaTexto;
}

// =========================================================
// TABLAS DINÁMICAS
// =========================================================

function generarParticipantes() {

    // TABLA 1
    const tablaParticipantes =
        document.querySelectorAll("table tbody")[0];

    // TABLA 2
    const tablaTecnicas =
        document.querySelectorAll("table tbody")[1];

    // TABLA 3
    const tablaEconomicas =
        document.querySelectorAll("table tbody")[2];

    // TABLA 4
    const tablaFirmas =
        document.querySelectorAll("table tbody")[3];

    // LIMPIAR
    tablaParticipantes.innerHTML = '';
    tablaTecnicas.innerHTML = '';
    tablaEconomicas.innerHTML = '';
    tablaFirmas.innerHTML = '';

    empresas.forEach(item => {

        // NOMBRE REPRESENTANTE
        let representante = `
                ${item.nombre} 
                ${item.apellidoP} 
                ${item.apellidoM}
            `.trim();

        // =====================================================
        // PARTICIPANTES
        // =====================================================

        tablaParticipantes.innerHTML += `
                <tr>

                    <td class="celda-editable" contenteditable="true">
                        ${item.nombre_empresa}
                    </td>

                    <td class="celda-editable" contenteditable="true">
                        ${representante}
                    </td>

                </tr>
            `;

        // =====================================================
        // PROPUESTAS TÉCNICAS
        // =====================================================

        tablaTecnicas.innerHTML += `
                <tr>

                    <td class="celda-editable" contenteditable="true">
                        ${item.nombre_empresa}
                    </td>

                </tr>
            `;

        // =====================================================
        // PROPUESTAS ECONÓMICAS
        // =====================================================

        tablaEconomicas.innerHTML += `
                <tr>

                    <td class="celda-editable" contenteditable="true">
                        ${item.nombre_empresa}
                    </td>

                    <td class="celda-editable" contenteditable="true">
                        COTIZA LAS PARTIDAS REQUERIDAS
                    </td>

                </tr>
            `;

        // =====================================================
        // FIRMAS
        // =====================================================

        tablaFirmas.innerHTML += `
                <tr>

                    <td class="celda-editable" contenteditable="true">
                        ${item.nombre_empresa}
                    </td>

                    <td class="celda-editable" contenteditable="true">
                        ${representante}
                    </td>

                    <td class="celda-editable" contenteditable="true">
                    </td>

                </tr>
            `;
    });
}

generarParticipantes();

// =========================================================
// GUARDAR
// =========================================================

document.getElementById('btnGuardar')
    .addEventListener('click', () => {

        const campos = document.querySelectorAll(
            '[contenteditable="true"]'
        );

        let datos = {};

        campos.forEach((campo, index) => {

            datos[`campo_${index}`] =
                campo.innerText.trim();

        });

        console.log(datos);

        alert('ACTA GUARDADA CORRECTAMENTE');

    });
