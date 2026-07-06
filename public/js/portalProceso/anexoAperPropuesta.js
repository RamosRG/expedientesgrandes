$(document).ready(function () {

    const id = obtenerIdDesdeURL();

    if (id) {
        cargarAnexoAperPropuesta(id);
    }

    // Evento para imprimir
    document.getElementById('btnGuardar')
        .addEventListener('click', () => {
            const campos = document.querySelectorAll('[contenteditable="true"]');
            let datos = {};
            campos.forEach((campo, index) => {
                datos[`campo_${index}`] = campo.innerText.trim();
            });
            console.log(datos);
            alert('ACTA GUARDADA CORRECTAMENTE');
            window.print();
        });

});

function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

function cargarAnexoAperPropuesta(id) {
    fetch(`../obtenerAnexoAperPropuesta/${id}`)
        .then(response => response.json())
        .then(response => {
            if (!response.success) {
                alert("No se encontró información");
                return;
            }

            const contratoApertura = response.data;

            if (!contratoApertura || contratoApertura.length === 0) {
                alert("No existen registros");
                return;
            }

            // Cargar todos los datos
            cargarCamposGenerales(contratoApertura);
            cargarTextoParticipantes(contratoApertura);
            cargarTablaParticipantes(contratoApertura);
            cargarTablaTecnica(contratoApertura);
            cargarTablaEconomica(contratoApertura);
            cargarTablaFirmas(contratoApertura);
            cargarTotales(contratoApertura);
            cargarAreaConId(contratoApertura);

        })
        .catch(error => {
            console.error(error);
            alert("Error al cargar la información");
        });
}

// ==========================================
// FUNCIÓN PARA FORMATEAR MONEDA
// ==========================================
function formatearMoneda(cantidad) {
    if (!cantidad) return '$0.00';
    return '$' + parseFloat(cantidad).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

// ==========================================
// FUNCIÓN PARA FORMATEAR FECHA
// ==========================================
function formatearFechaLarga(fecha) {
    let horas = fecha.getHours();
    let minutos = fecha.getMinutes();

    const horasTexto = numeroATexto(horas);
    const minutosTexto = numeroATexto(minutos);

    const dia = fecha.getDate();
    const mes = fecha.getMonth();
    const año = fecha.getFullYear();

    const meses = [
        'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO',
        'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'
    ];

    const añoTexto = numeroAñoATexto(año);

    return `${horasTexto} HORAS CON ${minutosTexto} MINUTOS DEL DÍA ${dia} DE ${meses[mes]} DE ${añoTexto}`;
}

function numeroATexto(numero) {
    const unidades = ['', 'UNO', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
    const especiales = {
        10: 'DIEZ', 11: 'ONCE', 12: 'DOCE', 13: 'TRECE', 14: 'CATORCE', 15: 'QUINCE',
        16: 'DIECISÉIS', 17: 'DIECISIETE', 18: 'DIECIOCHO', 19: 'DIECINUEVE',
        20: 'VEINTE', 21: 'VEINTIUNO', 22: 'VEINTIDÓS', 23: 'VEINTITRÉS', 24: 'VEINTICUATRO',
        25: 'VEINTICINCO', 26: 'VEINTISÉIS', 27: 'VEINTISIETE', 28: 'VEINTIOCHO', 29: 'VEINTINUEVE',
        30: 'TREINTA', 31: 'TREINTA Y UNO', 32: 'TREINTA Y DOS', 33: 'TREINTA Y TRES',
        34: 'TREINTA Y CUATRO', 35: 'TREINTA Y CINCO', 36: 'TREINTA Y SEIS', 37: 'TREINTA Y SIETE',
        38: 'TREINTA Y OCHO', 39: 'TREINTA Y NUEVE', 40: 'CUARENTA', 41: 'CUARENTA Y UNO',
        42: 'CUARENTA Y DOS', 43: 'CUARENTA Y TRES', 44: 'CUARENTA Y CUATRO', 45: 'CUARENTA Y CINCO',
        46: 'CUARENTA Y SEIS', 47: 'CUARENTA Y SIETE', 48: 'CUARENTA Y OCHO', 49: 'CUARENTA Y NUEVE',
        50: 'CINCUENTA', 51: 'CINCUENTA Y UNO', 52: 'CINCUENTA Y DOS', 53: 'CINCUENTA Y TRES',
        54: 'CINCUENTA Y CUATRO', 55: 'CINCUENTA Y CINCO', 56: 'CINCUENTA Y SEIS', 57: 'CINCUENTA Y SIETE',
        58: 'CINCUENTA Y OCHO', 59: 'CINCUENTA Y NUEVE'
    };

    if (especiales[numero]) {
        return especiales[numero];
    }

    if (numero < 10) {
        return unidades[numero];
    }

    return numero.toString();
}

function numeroAñoATexto(año) {
    const miles = Math.floor(año / 1000);
    const resto = año % 1000;

    let texto = '';

    if (miles === 1) texto += 'UN MIL';
    else if (miles === 2) texto += 'DOS MIL';
    else if (miles === 3) texto += 'TRES MIL';

    if (resto > 0) {
        if (texto) texto += ' ';
        texto += numeroATexto(resto);
    }

    return texto;
}

// ==========================================
// CARGAR CAMPOS GENERALES
// ==========================================
function cargarCamposGenerales(datos) {
    const primerRegistro = datos[0];
    if (!primerRegistro) return;

    // NO_LICITACION
    const noLicitacion = document.getElementById("no_licitacion");
    if (noLicitacion) {
        noLicitacion.innerText = primerRegistro.no_licitacion ?? '';
    }

    // NOMBRE_ESTUDIO
    const nombreEstudio = document.getElementById("nombre_estudio");
    if (nombreEstudio) {
        nombreEstudio.innerText = primerRegistro.nombre_estudio ?? '';
    }

    // FECHA Y HORA
    if (primerRegistro.created_at) {
        const fecha = new Date(primerRegistro.created_at);

        const fechaEstudio = document.getElementById("fecha_estudio");
        const horaEstudio = document.getElementById("hora_estudio");
        
        if (fechaEstudio) {
            fechaEstudio.innerText = fecha.toLocaleDateString('es-MX');
        }
        if (horaEstudio) {
            horaEstudio.innerText = fecha.toLocaleTimeString('es-MX', {
                hour: '2-digit',
                minute: '2-digit'
            });
        }
    }

    // COORDINADOR
    const coordinador = document.getElementById("coordinador");
    if (coordinador) {
        coordinador.innerText = primerRegistro.coordinador ?? '';
    }

    // AREA
    const area = document.getElementById("area");
    if (area) {
        area.innerText = primerRegistro.area ?? '';
    }

    // FECHA_FALLO
    const fechaFallo = document.getElementById("fecha_fallo");
    if (fechaFallo) {
        fechaFallo.innerText = primerRegistro.fecha_fallo ?? '17 DE DICIEMBRE';
    }

    // HORA_FALLO
    const horaFallo = document.getElementById("hora_fallo");
    if (horaFallo) {
        horaFallo.innerText = primerRegistro.hora_fallo ?? '13:00';
    }

    // HORA_CIERRE
    const horaCierre = document.getElementById("hora_cierre");
    if (horaCierre && primerRegistro.created_at) {
        const fecha = new Date(primerRegistro.created_at);
        horaCierre.innerText = formatearFechaLarga(fecha);
    }

    // COORDINADOR FIRMA
    const coordinadorFirma = document.getElementById("coordinador_firma");
    if (coordinadorFirma) {
        coordinadorFirma.innerText = primerRegistro.coordinador ?? 'C. PAULO SERGIO HERNÁNDEZ CUADRIELLO';
    }

    // AREA FIRMA - ACTUALIZADO PARA MOSTRAR CON ID
    const areaFirmaTitulo = document.getElementById("area_firma_titulo");
    if (areaFirmaTitulo) {
        const area = primerRegistro.area ?? 'COORDINADOR DE ADQUISICIONES Y SERVICIOS Y SERVIDOR PÚBLICO DESIGNADO';
        const idArea = primerRegistro.id_area ?? '';
        areaFirmaTitulo.innerText = idArea ? `${area} (ID: ${idArea})` : area;
        areaFirmaTitulo.contentEditable = true;
    }
}

// ==========================================
// CARGAR ÁREA CON ID (NUEVA FUNCIÓN)
// ==========================================
function cargarAreaConId(datos) {
    const primerRegistro = datos[0];
    if (!primerRegistro) return;
    
    const areaFirmaTitulo = document.getElementById("area_firma_titulo");
    if (areaFirmaTitulo) {
        const area = primerRegistro.area ?? 'COORDINADOR DE RECURSOS MATERIALES Y SERVIDOR PÚBLICO DESIGNADO';
        const idArea = primerRegistro.id_area ?? primerRegistro.id ?? '';
        areaFirmaTitulo.innerText = idArea ? `${area} (ID: ${idArea})` : area;
        areaFirmaTitulo.contentEditable = true;
    }
}

// ==========================================
// CARGAR TEXTO DE PARTICIPANTES
// ==========================================
function cargarTextoParticipantes(datos) {
    const elemento = document.getElementById("texto_participantes");
    if (!elemento) return;

    let texto = 'EL ';

    // Construir el texto con todos los participantes
    datos.forEach((item, index) => {
        if (index > 0) {
            texto += ' Y EL ';
        }
        
        texto += `<span class="campo campo-mediano" contenteditable="true">${item.representante_legal ?? ''}</span>`;
        texto += ` APODERADO LEGAL DE <span class="campo campo-mediano" contenteditable="true">${item.empresa ?? ''}</span>`;
        texto += `, EN SU CARÁCTER DE <span class="campo campo-mediano" contenteditable="true">${item.tipo_persona ?? ''}</span>`;
        texto += `, MISMO QUE SE IDENTIFICÓ CON CREDENCIAL PARA VOTAR CON NÚMERO DE FOLIO <span class="campo campo-mediano" contenteditable="true">${item.num_credencial_representante ?? ''}</span>`;
        texto += ` EMITIDA POR EL INSTITUTO NACIONAL ELECTORAL`;
    });

    texto += `; Y CON FUNDAMENTO EN LO DISPUESTO POR LOS ARTÍCULOS 27, FRACCIÓN I, 35 FRACCIÓN I, 36, 43, 44 FRACCIÓN II, 45 Y 46 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, 82, 83, 84, 85 Y 86 DE SU RESPECTIVO REGLAMENTO; SE LLEVA A CABO EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS DEL PROCEDIMIENTO DE INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL IRNP-${datos[0]?.no_licitacion ?? ''}, PARA LA "${datos[0]?.nombre_estudio ?? ''}"`;

    elemento.innerHTML = texto;
}

// ==========================================
// TABLA PARTICIPANTES - SIN COLUMNA RFC
// ==========================================
function cargarTablaParticipantes(datos) {
    const tbody = document.getElementById("tbodyParticipantes");
    if (!tbody) return;

    let html = '';
    
    datos.forEach(item => {
        html += `
            <tr>
                <td>${item.empresa ?? ''}</td>
                <td>${item.representante_legal ?? ''}</td>
            </tr>
        `;
    });

    tbody.innerHTML = html;
}

// ==========================================
// TABLA PROPUESTA TECNICA - SOLO EMPRESA, SIN BORDES
// ==========================================
function cargarTablaTecnica(datos) {
    const tbody = document.getElementById("tbodyTecnicas");
    if (!tbody) return;

    let html = '';

    datos.forEach(item => {
        html += `
            <tr>
                <td>${item.empresa ?? ''}</td>
            </tr>
        `;
    });

    tbody.innerHTML = html;
}

// ==========================================
// TABLA PROPUESTA ECONOMICA - SOLO EMPRESA, SIN BORDES
// ==========================================
function cargarTablaEconomica(datos) {
    const tbody = document.getElementById("tbodyEconomicas");
    if (!tbody) return;

    let html = '';

    datos.forEach(item => {
        html += `
            <tr>
                <td>${item.empresa ?? ''}</td>
            </tr>
        `;
    });

    tbody.innerHTML = html;
}

// ==========================================
// TABLA FIRMAS
// ==========================================
function cargarTablaFirmas(datos) {
    const tbody = document.getElementById("tbodyFirmas");
    if (!tbody) return;

    let html = '';

    datos.forEach(item => {
        html += `
            <tr>
                <td>${item.empresa ?? ''}</td>
                <td>${item.representante_legal ?? ''}</td>
                <td style="height:60px;">&nbsp;</td>
            </tr>
        `;
    });

    tbody.innerHTML = html;
}

// ==========================================
// CARGAR TOTALES
// ==========================================
function cargarTotales(datos) {
    const totalParticipantes = document.getElementById("total_participantes");
    const totalInvitados = document.getElementById("total_invitados");

    if (totalParticipantes) {
        totalParticipantes.innerText = datos.length;
    }

    if (totalInvitados) {
        totalInvitados.innerText = datos.length;
    }
}