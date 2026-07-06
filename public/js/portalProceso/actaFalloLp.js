$(document).ready(function() {
    const id = obtenerIdDesdeURL();
    if (id) {
        cargarDatosActaFallo(id);
    }

    // Configurar el botón de guardar
    document.getElementById('btnGuardar').addEventListener('click', function() {
        const htmlContent = document.documentElement.outerHTML;
        const blob = new Blob([htmlContent], {
            type: 'text/html'
        });
        const a = document.createElement('a');
        const url = URL.createObjectURL(blob);
        a.href = url;
        a.download = 'ACTA_FALLO.html';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });
});

function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

function cargarDatosActaFallo(id) {
    fetch(`../../portalProcesos/obtenerActaFalloLp/${id}`)
        .then(response => response.json())
        .then(response => {
            if (!response.success) {
                alert("No se encontró información del acta de fallo");
                return;
            }

            const resultados = response.data;
            if (!resultados || resultados.length === 0) {
                alert("No existen registros");
                return;
            }

            const ganador = resultados[0];
            const productos = resultados;

            const total = parseFloat(ganador.total ?? 0);
            const subtotal = parseFloat(ganador.subtotal ?? 0);
            const iva = parseFloat(ganador.iva ?? 0);

            const totalTexto = numeroALetras(total);
            const subtotalTexto = numeroALetras(subtotal);

            const totalMoneda = `$${formatoMoneda(total)} (${totalTexto})`;
            const subtotalMoneda = `$${formatoMoneda(subtotal)} (${subtotalTexto})`;

            const nombreProveedor = ganador.proveedor || '';
            const tipoPersona = ganador.tipo_persona || '';
            const noLicitacion = ganador.no_licitacion || '';
            const nombreEstudio = ganador.nombre_estudio || '';
            const coordinador = ganador.coordinador || '';
            const area = ganador.area || '';
            const numCredencial = ganador.num_credencial_votar || '';

            // Obtener partidas adjudicadas (todas las partidas de los productos)
            const partidas = productos.map(p => p.partida).filter(p => p).join(', ');
            const partidasAdjudicadas = partidas || '1, 2, 3, 4, 5, 6 Y 7';

            // Obtener fecha límite de entrega y hora
            const fechaLimite = formatearFecha(ganador.created_at) || '';
            const horaLimite = formatearHora(ganador.created_at) || '00:00';
            
            // CORRECCIÓN AQUÍ: Crear la variable created_at_texto correctamente
            const created_at_texto = formatearFecha(ganador.created_at) || '';

            // Mapeo de campos a llenar
            const campos = {
                no_licitacion: noLicitacion,
                no_licitacion_adj: noLicitacion,
                no_licitacion_final: noLicitacion,
                nombre_estudio: nombreEstudio,
                nombre_estudio_dictamen: nombreEstudio,
                nombre_estudio_dictamen2: nombreEstudio,
                nombre_estudio_adj: nombreEstudio,
                nombre_estudio_notif: nombreEstudio,
                nombre_proveedor_acta: nombreProveedor,
                nombre_proveedor_orden: nombreProveedor,
                nombre_proveedor_dictamen: nombreProveedor,
                nombre_proveedor_tabla: nombreProveedor,
                nombre_proveedor_rec: nombreProveedor,
                nombre_proveedor_final: nombreProveedor,
                nombre_proveedor_notif: nombreProveedor,
                nombre_proveedor_firma: nombreProveedor,
                tipo_persona_acta: tipoPersona,
                tipo_persona_orden: tipoPersona,
                tipo_persona_rec: tipoPersona,
                tipo_persona_notif: tipoPersona,
                tipo_persona_firma: tipoPersona,
                coordinador_acta: coordinador,
                coordinador_nombre: coordinador,
                coordinador_nombre2: coordinador,
                coordinador_nombre3: coordinador,
                coordinador_firma: coordinador,
                area_firma: area,
                total: total,
                area: area,
                num_credencial_votar: numCredencial,
                partidas_adjudicadas: partidasAdjudicadas,
                partidas_adjudicadas_tabla: partidasAdjudicadas,
                created_at_texto1: created_at_texto, 
                created_at_texto2: created_at_texto, 
                created_at_hora: horaLimite,
                created_at_hora1: horaLimite,
                created_at_hora2: horaLimite,
                created_at_hora3: horaLimite,
                total_ganador_texto: totalMoneda,
                subtotal_ganador_texto: subtotalMoneda
            };

            // Asignar valores a los campos
            Object.entries(campos).forEach(([id, valor]) => {
                const elemento = document.getElementById(id);
                if (elemento) {
                    elemento.textContent = valor ?? '';
                }
            });

            // Cargar tabla de productos
            cargarTablaProductos(productos, ganador);

        })
        .catch(error => {
            console.error("Error:", error);
            alert("Error al cargar la información del acta de fallo");
        });
}

function cargarTablaProductos(productos, ganador) {
    const tbody = document.querySelector("#tablaProductos tbody");
    if (!tbody) return;

    tbody.innerHTML = "";

    const formatoCantidad = (numero) => {
        const num = parseFloat(numero) || 0;
        if (Number.isInteger(num)) {
            return new Intl.NumberFormat('es-MX').format(num);
        } else {
            return new Intl.NumberFormat('es-MX', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(num);
        }
    };

    productos.forEach((producto, index) => {
        const cantidad = parseFloat(producto.cantidad) || 1;

        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td class="celda-editable" contenteditable="true">${producto.partida || index + 1}</td>
            <td class="celda-editable" contenteditable="true" style="text-align: left; padding-left: 5px;">
                <strong>${producto.descripcion || 'Sin descripción'}</strong>
            </td>
            <td class="celda-editable" contenteditable="true">${producto.unidad_medida || 'N/A'}</td>
            <td class="celda-editable" contenteditable="true">${formatoCantidad(cantidad)}</td>
            <td class="celda-editable" contenteditable="true">${producto.marca_modelo || 'N/A'}</td>
        `;
        tbody.appendChild(fila);
    });
}

// Función para formatear fecha sin hora
function formatearFecha(fechaCompleta) {
    if (!fechaCompleta) return '[FECHA LÍMITE]';
    
    // Si es un objeto Date o string ISO
    const fecha = new Date(fechaCompleta);
    if (isNaN(fecha.getTime())) return '[FECHA LÍMITE]';
    
    // Formato: 26 de junio de 2026
    const meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 
                   'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
    
    const dia = fecha.getDate();
    const mes = meses[fecha.getMonth()];
    const año = fecha.getFullYear();
    
    return `${dia} de ${mes} de ${año}`;
}

// Función para formatear solo la hora
function formatearHora(fechaCompleta) {
    if (!fechaCompleta) return '00:00';
    
    // Si es un objeto Date o string ISO
    const fecha = new Date(fechaCompleta);
    if (isNaN(fecha.getTime())) return '00:00';
    
    // Formato: 14:30
    const horas = fecha.getHours().toString().padStart(2, '0');
    const minutos = fecha.getMinutes().toString().padStart(2, '0');
    
    return `${horas}:${minutos}`;
}

// Función para convertir número a letras
function numeroALetras(numero, moneda = true) {
    numero = Number(numero);

    const unidades = [
        '', 'UNO', 'DOS', 'TRES', 'CUATRO',
        'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'
    ];

    const especiales = [
        'DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE',
        'QUINCE', 'DIECISÉIS', 'DIECISIETE',
        'DIECIOCHO', 'DIECINUEVE'
    ];

    const decenas = [
        '', '', 'VEINTE', 'TREINTA', 'CUARENTA',
        'CINCUENTA', 'SESENTA', 'SETENTA',
        'OCHENTA', 'NOVENTA'
    ];

    const centenas = [
        '', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS',
        'CUATROCIENTOS', 'QUINIENTOS',
        'SEISCIENTOS', 'SETECIENTOS',
        'OCHOCIENTOS', 'NOVECIENTOS'
    ];

    function convertir(n) {
        if (n === 0) return 'CERO';
        if (n === 100) return 'CIEN';
        if (n < 10) return unidades[n];
        if (n >= 10 && n < 20) return especiales[n - 10];

        if (n >= 20 && n < 30) {
            if (n === 20) return 'VEINTE';
            return 'VEINTI' + unidades[n - 20];
        }

        if (n < 100) {
            const decena = Math.floor(n / 10);
            const unidad = n % 10;
            return unidad === 0 ?
                decenas[decena] :
                `${decenas[decena]} Y ${unidades[unidad]}`;
        }

        if (n < 1000) {
            const centena = Math.floor(n / 100);
            const resto = n % 100;
            return resto === 0 ?
                centenas[centena] :
                `${centenas[centena]} ${convertir(resto)}`;
        }

        if (n < 1000000) {
            const miles = Math.floor(n / 1000);
            const resto = n % 1000;
            let milesTexto = miles === 1 ? 'MIL' : `${convertir(miles)} MIL`;
            return resto === 0 ? milesTexto : `${milesTexto} ${convertir(resto)}`;
        }

        return n.toString();
    }

    const entero = Math.floor(numero);
    const decimal = Math.round((numero - entero) * 100);

    const texto = convertir(entero);

    if (!moneda) {
        return texto;
    }

    return `${texto} PESOS ${decimal.toString().padStart(2, '0')}/100 M.N.`;
}

function formatoMoneda(numero) {
    const num = parseFloat(numero) || 0;
    return new Intl.NumberFormat('es-MX', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }).format(num);
}
