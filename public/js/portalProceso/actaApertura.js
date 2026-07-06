$(document).ready(function () {
    const id = obtenerIdDesdeURL();

    if (id) {
        cargarAnexoAperPropuesta(id);
    }

    // Evento para el botón de guardar/imprimir
    document.getElementById('btnGuardar')
        .addEventListener('click', () => {
            const campos = document.querySelectorAll('[contenteditable="true"]');
            let datos = {};
            campos.forEach((campo, index) => {
                datos[`campo_${index}`] = campo.innerText.trim();
            });
            console.log(datos);
            alert('ACTA GUARDADA CORRECTAMENTE');
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

            const ganador = contratoApertura[0];

            // Cargar todos los campos con sus IDs correspondientes
            cargarCampos(ganador, contratoApertura);
            cargarTablaParticipantes(contratoApertura);
            cargarTablaTecnica(contratoApertura);
            cargarTablaEconomica(contratoApertura);
            cargarTablaFirmas(contratoApertura);
            cargarTablaVerificacion(contratoApertura);
        })
        .catch(error => {
            console.error(error);
            alert("Error al cargar la información");
        });
}

// ==========================================
// FUNCIONES DE FORMATEO DE FECHAS
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
// FUNCIÓN PRINCIPAL PARA CARGAR TODOS LOS CAMPOS
// ==========================================

function cargarCampos(ganador, todosLosDatos) {
    // 1. NO_LICITACION
    const noLicitacion = document.getElementById("no_licitacion");
    if (noLicitacion) {
        noLicitacion.innerText = ganador.no_licitacion || '';
    }

    const noLicitacion1 = document.getElementById("no_licitacion1");
    if (noLicitacion1) {
        noLicitacion1.innerText = ganador.no_licitacion || '';
    }

    // 2. NOMBRE_ESTUDIO
    const nombreEstudio = document.getElementById("nombre_estudio");
    if (nombreEstudio) {
        nombreEstudio.innerText = ganador.nombre_estudio || '';
    }

    const nombreEstudio1 = document.getElementById("nombre_estudio1");
    if (nombreEstudio1) {
        nombreEstudio1.innerText = ganador.nombre_estudio || '';
    }

    // 3. FECHA Y HORA (desde created_at)
    if (ganador.created_at) {
        const fecha = new Date(ganador.created_at);

        const fechaEstudio = document.getElementById("fecha_estudio");
        if (fechaEstudio) {
            fechaEstudio.innerText = fecha.toLocaleDateString('es-MX', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
        }

        const horaEstudio = document.getElementById("hora_estudio");
        if (horaEstudio) {
            horaEstudio.innerText = fecha.toLocaleTimeString('es-MX', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            });
        }

        const fechaCierre = document.getElementById("fecha_cierre");
        if (fechaCierre) {
            fechaCierre.innerText = formatearFechaLarga(fecha);
        }
    }

    // 4. COORDINADOR
    const coordinador = document.getElementById("coordinador");
    if (coordinador) {
        coordinador.innerText = ganador.coordinador || '';
    }

    // 5. AREA
    const area = document.getElementById("area");
    if (area) {
        area.innerText = ganador.area || '';
    }

    // 6. DOMICILIO FISCAL
    const domicilioFiscal = document.getElementById("domicilio_fiscal");
    if (domicilioFiscal && ganador.domicilio_proveedor) {
        domicilioFiscal.innerText = ganador.domicilio_proveedor;
    }

    // 7. PROVEEDOR - Tomamos el primer proveedor
    if (todosLosDatos && todosLosDatos.length > 0) {
        const primerProveedor = todosLosDatos[0];
        
        const proveedor = document.getElementById("proveedor");
        if (proveedor) {
            proveedor.innerText = nombreCompleto(primerProveedor);
        }

        const representanteLegal = document.getElementById("representante_legal");
        if (representanteLegal) {
            representanteLegal.innerText = primerProveedor.representante_legal || nombreCompleto(primerProveedor);
        }

        const numCredencial = document.getElementById("num_credencial_representante");
        if (numCredencial) {
            numCredencial.innerText = primerProveedor.num_credencial_representante || '';
        }
    }

    // 8. FECHAS DE FALLO
    const fechaEstudio1 = document.getElementById("fecha_estudio1");
    if (fechaEstudio1 && ganador.created_at) {
        const fecha = new Date(ganador.created_at);
        fechaEstudio1.innerText = fecha.toLocaleDateString('es-MX', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        }).toUpperCase();
    }

    const horaEstudio1 = document.getElementById("hora_estudio1");
    if (horaEstudio1 && ganador.created_at) {
        const fecha = new Date(ganador.created_at);
        horaEstudio1.innerText = fecha.toLocaleTimeString('es-MX', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        });
    }
}

// ==========================================
// FUNCIONES AUXILIARES PARA NOMBRES COMPLETOS
// ==========================================

function nombreCompleto(item) {
    // Para persona moral, usar representante legal
    if (item.tipo_persona === 'MORAL') {
        return item.representante_legal || item.razon_social || '';
    }
    
    // Para persona física
    return item.nombre_proveedor || item.representante_legal || '';
}

function obtenerNombreEmpresa(item) {
    return item.empresa || item.razon_social || '';
}

// ==========================================
// TABLA PARTICIPANTES
// ==========================================

function cargarTablaParticipantes(datos) {
    const tbody = document.querySelector("#tabla_participantes tbody");
    if (!tbody) return;

    let empresasProcesadas = [];
    let html = '';
    
    datos.forEach(item => {
        const empresa = obtenerNombreEmpresa(item);
        if (empresasProcesadas.includes(empresa)) {
            return;
        }
        empresasProcesadas.push(empresa);

        html += `
            <tr>
                <td class="celda-editable" contenteditable="true">${empresa}</td>
                <td class="celda-editable" contenteditable="true">${nombreCompleto(item)}</td>
            </tr>
        `;
    });

    if (!html) {
        html = `
            <tr>
                <td colspan="2" style="text-align:center; color:#999;">No hay participantes registrados</td>
            </tr>
        `;
    }

    tbody.innerHTML = html;
}

// ==========================================
// TABLA PROPUESTA TECNICA
// ==========================================

function cargarTablaTecnica(datos) {
    const tbody = document.getElementById("tbodyTecnicas");
    if (!tbody) return;

    let empresasProcesadas = [];
    let html = '';

    datos.forEach(item => {
        const empresa = obtenerNombreEmpresa(item);
        if (empresasProcesadas.includes(empresa)) {
            return;
        }
        empresasProcesadas.push(empresa);

        html += `
            <tr>
                <td class="celda-editable" contenteditable="true">${empresa}</td>
            </tr>
        `;
    });

    if (!html) {
        html = `
            <tr>
                <td style="text-align:center; color:#999;">No hay propuestas técnicas presentadas</td>
            </tr>
        `;
    }

    tbody.innerHTML = html;
}

// ==========================================
// TABLA PROPUESTA ECONOMICA
// ==========================================

function cargarTablaEconomica(datos) {
    const tbody = document.getElementById("tbodyEconomicas");
    if (!tbody) return;

    let empresasProcesadas = [];
    let html = '';

    datos.forEach(item => {
        const empresa = obtenerNombreEmpresa(item);
        if (empresasProcesadas.includes(empresa)) {
            return;
        }
        empresasProcesadas.push(empresa);

        html += `
            <tr>
                <td class="celda-editable" contenteditable="true">${empresa}</td>
            </tr>
        `;
    });

    if (!html) {
        html = `
            <tr>
                <td style="text-align:center; color:#999;">No hay propuestas económicas presentadas</td>
            </tr>
        `;
    }

    tbody.innerHTML = html;
}

// ==========================================
// TABLA FIRMAS
// ==========================================

function cargarTablaFirmas(datos) {
    const tbody = document.getElementById("tbodyFirmas");
    if (!tbody) return;

    let empresasProcesadas = [];
    let html = '';

    datos.forEach(item => {
        const empresa = obtenerNombreEmpresa(item);
        if (empresasProcesadas.includes(empresa)) {
            return;
        }
        empresasProcesadas.push(empresa);

        html += `
            <tr>
                <td class="celda-editable" contenteditable="true">${empresa}</td>
                <td class="celda-editable" contenteditable="true">${nombreCompleto(item)}</td>
                <td style="height:60px;">&nbsp;</td>
            </tr>
        `;
    });

    if (!html) {
        html = `
            <tr>
                <td colspan="3" style="text-align:center; color:#999;">No hay firmas registradas</td>
            </tr>
        `;
    }

    tbody.innerHTML = html;
}

// ==========================================
// TABLA VERIFICACION ECONOMICA
// ==========================================

function cargarTablaVerificacion(datos) {
    const tbody = document.getElementById("tbodyCotizacion");
    if (!tbody) return;

    let empresasProcesadas = [];
    let html = '';

    datos.forEach(item => {
        const empresa = obtenerNombreEmpresa(item);
        if (empresasProcesadas.includes(empresa)) {
            return;
        }
        empresasProcesadas.push(empresa);
        
        // Determinar el resultado de verificación
        let resultado = "ACEPTADA";
        // Puedes agregar lógica adicional aquí si tienes campos específicos

        html += `
            <tr>
                <td class="celda-editable" contenteditable="true">${empresa}</td>
                <td class="celda-editable" contenteditable="true">${resultado}</td>
            </tr>
        `;
    });

    if (!html) {
        html = `
            <tr>
                <td colspan="2" style="text-align:center; color:#999;">No hay verificaciones registradas</td>
            </tr>
        `;
    }

    tbody.innerHTML = html;
}