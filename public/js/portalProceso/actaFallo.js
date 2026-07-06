$(document).ready(function () {
    const id = obtenerIdDesdeURL();

    if (id) {
        cargarActaFallo(id);
    }
});

function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

function cargarActaFallo(id) {
    fetch(`../obtenerActaFallo/${id}`)
        .then(response => response.json())
        .then(response => {
            if (!response.success) {
                alert("No se encontró información");
                return;
            }

            const data = response.data;
            if (!data || data.length === 0) {
                alert("No existen datos registrados para este estudio");
                return;
            }

// ==============================================
// DATOS DEL ENCABEZADO Y GENERALES
// ==============================================
const primerRegistro = data[0];

// Encabezado - Año
if (document.querySelector('.encabezado')) {
    document.querySelector('.encabezado').textContent =
        new Date(primerRegistro.created_at).getFullYear();
}

// Número de licitación
if (document.getElementById('no_licitacion')) {
    document.getElementById('no_licitacion').textContent =
        primerRegistro.no_licitacion ?? '';
}
// Número de licitación
if (document.getElementById('no_licitacion1')) {
    document.getElementById('no_licitacion1').textContent =
        primerRegistro.no_licitacion ?? '';
}

// Nombre del estudio
if (document.getElementById('nombre_estudio')) {
    document.getElementById('nombre_estudio').textContent =
        primerRegistro.nombre_estudio ?? '';
}

// Nombre del estudio
if (document.getElementById('nombre_estudio1')) {
    document.getElementById('nombre_estudio1').textContent =
        primerRegistro.nombre_estudio ?? '';
}

// Área
if (document.getElementById('area')) {
    document.getElementById('area').textContent =
        primerRegistro.area ?? '';
}
if (document.getElementById('area1')) {
    document.getElementById('area1').textContent =
        primerRegistro.area ?? '';
}

// Hora
if (document.getElementById('hora_estudio')) {
    const fecha = new Date(primerRegistro.created_at);
    document.getElementById('hora_estudio').textContent =
        formatHora(fecha);
}

// Hora
if (document.getElementById('hora1')) {
    const fecha = new Date(primerRegistro.created_at);
    document.getElementById('hora1').textContent =
        formatHora(fecha);
}

// Fecha
if (document.getElementById('fecha_estudio')) {
    const fecha = new Date(primerRegistro.created_at);
    document.getElementById('fecha_estudio').textContent =
        formatFecha(fecha);
}

if (document.getElementById('fecha_estudio2')) {
    const fecha = new Date(primerRegistro.created_at);
    document.getElementById('fecha_estudio2').textContent =
        formatFecha(fecha);
}

// Coordinador
if (document.getElementById('coordinador')) {
    document.getElementById('coordinador').textContent =
        primerRegistro.coordinador ?? '';
}

if (document.getElementById('coordinador1')) {
    document.getElementById('coordinador1').textContent =
        primerRegistro.coordinador ?? '';
}
if (document.getElementById('coordinador2')) {
    document.getElementById('coordinador2').textContent =
        primerRegistro.coordinador ?? '';
}

// Proveedor
if (document.getElementById('proveedor')) {
    document.getElementById('proveedor').textContent =
        primerRegistro.proveedor ?? '';
}

// Empresa
if (document.getElementById('empresa')) {
    document.getElementById('empresa').textContent =
        primerRegistro.empresa ?? '';
}

if (document.getElementById('empresa1')) {
    document.getElementById('empresa1').textContent =
        primerRegistro.empresa ?? '';
}

if (document.getElementById('empresa2')) {
    document.getElementById('empresa2').textContent =
        primerRegistro.empresa ?? '';
}

if (document.getElementById('empresa3')) {
    document.getElementById('empresa3').textContent =
        primerRegistro.empresa ?? '';
}

if (document.getElementById('empresa4')) {
    document.getElementById('empresa4').textContent =
        primerRegistro.empresa ?? '';
}

if (document.getElementById('empresa5')) {
    document.getElementById('empresa5').textContent =
        primerRegistro.empresa ?? '';
}
if (document.getElementById('empresa6')) {
    document.getElementById('empresa6').textContent =
        primerRegistro.empresa ?? '';
}

// Representante legal
if (document.getElementById('representante_legal')) {
    document.getElementById('representante_legal').textContent =
        primerRegistro.representante_legal ?? '';
}


if (document.getElementById('representante_legal1')) {
    document.getElementById('representante_legal1').textContent =
        primerRegistro.representante_legal ?? '';
}


if (document.getElementById('representante_legal2')) {
    document.getElementById('representante_legal2').textContent =
        primerRegistro.representante_legal ?? '';
}


if (document.getElementById('representante_legal3')) {
    document.getElementById('representante_legal3').textContent =
        primerRegistro.representante_legal ?? '';
}

// Representante legal
if (document.getElementById('representante_legal4')) {
    document.getElementById('representante_legal4').textContent =
        primerRegistro.representante_legal ?? '';
}

// RFC
if (document.getElementById('rfc')) {
    document.getElementById('rfc').textContent =
        primerRegistro.rfc ?? '';
}

// CURP
if (document.getElementById('curp')) {
    document.getElementById('curp').textContent =
        primerRegistro.curp ?? '';
}

// Domicilio
if (document.getElementById('domicilio_completo')) {
    document.getElementById('domicilio_completo').textContent =
        primerRegistro.domicilio_completo ?? '';
}

// Tipo de persona
if (document.getElementById('tipo_persona')) {
    document.getElementById('tipo_persona').textContent =
        primerRegistro.tipo_persona ?? '';
}

            // ==============================================
            // TABLA DE BIENES ADJUDICADOS
            // ==============================================
            construirTablaBienes(data);
            
            // ==============================================
            // DATOS DE TOTALES
            // ==============================================
            if (primerRegistro.subtotal) {
                const subtotalElement = document.getElementById('subtotal');
                if (subtotalElement) {
                    subtotalElement.textContent = formatMoney(primerRegistro.subtotal);
                }
            }
            
            if (primerRegistro.iva) {
                const ivaElement = document.getElementById('iva');
                if (ivaElement) {
                    ivaElement.textContent = formatMoney(primerRegistro.iva);
                }
            }
            
            if (primerRegistro.total) {
                const totalElement = document.getElementById('total');
                if (totalElement) {
                    totalElement.textContent = formatMoney(primerRegistro.total);
                }
                
                // TOTAL EN TEXTO - PRIMERA FILA DEL TFOOT
                const totalTextoElement = document.getElementById('total_texto');
                if (totalTextoElement) {
                    const totalNumero = primerRegistro.total;
                    totalTextoElement.textContent = `${formatMoney(totalNumero)} (${numeroALetras(totalNumero)})`;
                }
            }

                            // TOTAL EN TEXTO - PRIMERA FILA DEL TFOOT
                const totalTextoElement = document.getElementById('total_texto1');
                if (totalTextoElement) {
                    const totalNumero = primerRegistro.total;
                    totalTextoElement.textContent = `${formatMoney(totalNumero)} (${numeroALetras(totalNumero)})`;
            }
            
            // ==============================================
            // FECHA DE CIERRE Y FIRMAS
            // ==============================================
            if (document.querySelector('#fecha_cierre')) {
                const fecha = new Date(primerRegistro.created_at);
                document.querySelector('#fecha_cierre').textContent = 
                    `DOCE HORAS CON SIETE MINUTOS DEL DÍA ${formatFecha(fecha)}`;
            }
            
            // ==============================================
            // FECHA Y HORA COMPLETA EN TEXTO - NUEVO
            // ==============================================
            if (document.getElementById('hora_estudio_texto')) {
                const fecha = new Date(primerRegistro.created_at);
                document.getElementById('hora_estudio_texto').textContent = 
                    formatFechaHoraCompleta(fecha);
            }
            
            // Llenar datos del representante legal en la firma
            const firmaProveedor = document.querySelector('.firma:last-child .linea-firma');
            if (firmaProveedor && primerRegistro.representante_legal) {
                firmaProveedor.textContent = `C. ${primerRegistro.representante_legal}`;
            }
            
            // Llenar nombre de la empresa en la firma
            const firmaEmpresa = document.querySelector('.firma:last-child');
            if (firmaEmpresa && primerRegistro.empresa) {
                const lines = firmaEmpresa.innerHTML.split('<br>');
                if (lines.length >= 3) {
                    firmaEmpresa.innerHTML = 
                        lines[0] + '<br>' + 
                        lines[1] + '<br>' + 
                        primerRegistro.empresa;
                }
            }
            
        })
        .catch(error => {
            console.error(error);
            alert("Error al cargar la información");
        });
}

function construirTablaBienes(data) {
    const tbody = document.querySelector('table tbody');
    if (!tbody) return;

    tbody.innerHTML = '';

    // Contador secuencial para todas las filas
    let contadorFila = 1;

    data.forEach((item, index) => {
        let row = document.createElement('tr');
        
        // PARTIDA ÚNICA - Enumeración secuencial
        let tdPartida = document.createElement('td');
        tdPartida.className = 'celda-editable';
        tdPartida.contentEditable = 'true';
        tdPartida.textContent = contadorFila;
        row.appendChild(tdPartida);
        
        // Descripción
        let tdDescripcion = document.createElement('td');
        tdDescripcion.className = 'celda-editable';
        tdDescripcion.contentEditable = 'true';
        tdDescripcion.textContent = item.descripcion ?? '';
        row.appendChild(tdDescripcion);
        
        // Unidad de medida
        let tdUnidad = document.createElement('td');
        tdUnidad.className = 'celda-editable';
        tdUnidad.contentEditable = 'true';
        tdUnidad.textContent = item.unidad_medida ?? 'PIEZA';
        row.appendChild(tdUnidad);
        
        // Cantidad
        let tdCantidad = document.createElement('td');
        tdCantidad.className = 'celda-editable';
        tdCantidad.contentEditable = 'true';
        tdCantidad.textContent = item.cantidad ?? '';
        row.appendChild(tdCantidad);
        
        // Marca y modelo
        let tdMarca = document.createElement('td');
        tdMarca.className = 'celda-editable';
        tdMarca.contentEditable = 'true';
        tdMarca.textContent = item.marca_modelo ?? '';
        row.appendChild(tdMarca);
        
        // Precio unitario
        let tdPrecio = document.createElement('td');
        tdPrecio.className = 'celda-editable';
        tdPrecio.contentEditable = 'true';
        tdPrecio.textContent = item.precio_unitario ? formatMoney(item.precio_unitario) : '';
        row.appendChild(tdPrecio);
        
        // Importe (cantidad * precio unitario)
        let tdImporte = document.createElement('td');
        tdImporte.className = 'celda-editable';
        tdImporte.contentEditable = 'true';
        if (item.cantidad && item.precio_unitario) {
            tdImporte.textContent = formatMoney(item.cantidad * item.precio_unitario);
        }
        row.appendChild(tdImporte);
        
        tbody.appendChild(row);
        
        // Incrementar el contador para la siguiente fila
        contadorFila++;
    });
}

// ==============================================
// FUNCIONES AUXILIARES
// ==============================================

function formatMoney(amount) {
    if (!amount) return '$0.00';
    return '$' + Number(amount).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

function formatFecha(fecha) {
    if (!fecha || isNaN(fecha.getTime())) return '09 DE FEBRERO DE 2026';
    
    const meses = [
        'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO',
        'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'
    ];
    
    const dia = fecha.getDate().toString().padStart(2, '0');
    const mes = meses[fecha.getMonth()];
    const anio = fecha.getFullYear();
    
    return `${dia} DE ${mes} DE ${anio}`;
}

function formatHora(fecha) {
    if (!fecha || isNaN(fecha.getTime())) return '11:30';
    
    const horas = fecha.getHours().toString().padStart(2, '0');
    const minutos = fecha.getMinutes().toString().padStart(2, '0');
    
    return `${horas}:${minutos}`;
}

function numeroALetras(numero) {
    if (!numero) return 'NOVECIENTOS OCHENTA Y SIETE MIL OCHOCIENTOS OCHENTA Y SEIS PESOS 22/100 M.N.';
    
    const unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
    const decenas = ['', 'DIEZ', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA', 'SETENTA', 'OCHENTA', 'NOVENTA'];
    const centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
    
    function convertirDosDigitos(n) {
        if (n < 10) return unidades[n];
        if (n < 20) {
            const especiales = ['DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISEIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'];
            return especiales[n - 10];
        }
        if (n < 100) {
            const decena = Math.floor(n / 10);
            const unidad = n % 10;
            if (unidad === 0) return decenas[decena];
            if (decena === 2) return `VEINTI${unidades[unidad].toLowerCase()}`;
            return `${decenas[decena]} Y ${unidades[unidad].toLowerCase()}`;
        }
        return '';
    }
    
    function convertirTresDigitos(n) {
        if (n < 100) return convertirDosDigitos(n);
        if (n < 1000) {
            const centena = Math.floor(n / 100);
            const resto = n % 100;
            if (centena === 1 && resto === 0) return 'CIEN';
            if (resto === 0) return centenas[centena];
            return `${centenas[centena]} ${convertirDosDigitos(resto).toLowerCase()}`;
        }
        return '';
    }
    
    const entero = Math.floor(numero);
    const decimal = Math.round((numero - entero) * 100);
    
    if (entero === 0) return `CERO PESOS ${decimal.toString().padStart(2, '0')}/100 M.N.`;
    
    const millones = Math.floor(entero / 1000000);
    const miles = Math.floor((entero % 1000000) / 1000);
    const unidadesEntero = entero % 1000;
    
    let resultado = '';
    
    if (millones > 0) {
        if (millones === 1) {
            resultado += 'UN MILLON';
        } else {
            resultado += convertirTresDigitos(millones) + ' MILLONES';
        }
        if (miles > 0 || unidadesEntero > 0) resultado += ' ';
    }
    
    if (miles > 0) {
        if (miles === 1) {
            resultado += 'MIL';
        } else {
            resultado += convertirTresDigitos(miles) + ' MIL';
        }
        if (unidadesEntero > 0) resultado += ' ';
    }
    
    if (unidadesEntero > 0) {
        if (unidadesEntero === 1 && miles === 0 && millones === 0) {
            resultado += 'UN PESO';
        } else {
            resultado += convertirTresDigitos(unidadesEntero) + ' PESOS';
        }
    } else if (millones === 0 && miles === 0) {
        resultado = 'CERO PESOS';
    } else if (unidadesEntero === 0) {
        resultado += 'PESOS';
    }
    
    resultado += ` ${decimal.toString().padStart(2, '0')}/100 M.N.`;
    
    return resultado;
}

// ==============================================
// NUEVA FUNCIÓN PARA FORMATO FECHA Y HORA COMPLETA
// ==============================================
function formatFechaHoraCompleta(fecha) {
    if (!fecha || isNaN(fecha.getTime())) return '12 HORAS CON SIETE MINUTOS DEL DÍA 09 DE FEBRERO DEL AÑO 2026';
    
    const horas = fecha.getHours().toString().padStart(2, '0');
    const minutos = fecha.getMinutes().toString().padStart(2, '0');
    
    const meses = [
        'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO',
        'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'
    ];
    
    const dia = fecha.getDate().toString().padStart(2, '0');
    const mes = meses[fecha.getMonth()];
    const anio = fecha.getFullYear();
    
    return `${horas} HORAS CON ${minutos} MINUTOS DEL DÍA ${dia} DE ${mes} DEL AÑO ${anio}`;
}