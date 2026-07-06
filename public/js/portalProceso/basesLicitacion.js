$(document).ready(function () {
    const id = obtenerIdDesdeURL();
    if (id) {
        cargarDatosBasesLicitacion(id);
    }
});

function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

// Agrega esta función mejorada para formato de moneda con letras
function formatearMontoConLetras(monto) {
    if (!monto || monto <= 0) return '';
    
    const montoNumero = Number(monto);
    const entero = Math.floor(montoNumero);
    const decimal = Math.round((montoNumero - entero) * 100);
    
    // Convertir el número a letras con la función existente
    const letras = numeroALetras(entero, false);
    
    // Formato: "$1,971.00 (UN MIL NOVECIENTOS SETENTA Y UN PESOS 00/100 M.N.)"
    return `$${montoNumero.toFixed(2)} (${letras} PESOS ${decimal.toString().padStart(2, '0')}/100 M.N.)`;
}

// Modifica la función numeroALetras existente para que funcione mejor con números grandes
function numeroALetras(numero, moneda = true) {
    numero = Number(numero);

    const unidades = [
        '', 'UN', 'DOS', 'TRES', 'CUATRO',
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
        if (n === 0) return '';
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
            return unidad === 0
                ? decenas[decena]
                : `${decenas[decena]} Y ${unidades[unidad]}`;
        }

        if (n < 1000) {
            const centena = Math.floor(n / 100);
            const resto = n % 100;
            if (resto === 0) {
                return centenas[centena];
            }
            return `${centenas[centena]} ${convertir(resto)}`;
        }

        if (n < 1000000) {
            const miles = Math.floor(n / 1000);
            const resto = n % 1000;
            let milesTexto = miles === 1 ? 'MIL' : `${convertir(miles)} MIL`;
            return resto === 0 ? milesTexto : `${milesTexto} ${convertir(resto)}`;
        }

        if (n < 1000000000) {
            const millones = Math.floor(n / 1000000);
            const resto = n % 1000000;
            let millonesTexto = millones === 1 ? 'UN MILLÓN' : `${convertir(millones)} MILLONES`;
            return resto === 0 ? millonesTexto : `${millonesTexto} ${convertir(resto)}`;
        }

        return n.toString();
    }

    const entero = Math.floor(numero);
    const decimal = Math.round((numero - entero) * 100);

    let texto = convertir(entero);
    
    // Si el número es 0, retornar "CERO"
    if (entero === 0) texto = 'CERO';

    if (!moneda) {
        return texto;
    }

    return `${texto} PESOS ${decimal.toString().padStart(2, '0')}/100 M.N.`;
}

// Modifica la función cargarDatosBasesLicitacion para incluir los nuevos campos
function cargarDatosBasesLicitacion(id) {
    fetch(`../../portalProcesos/obtenerBasesLicitacion/${id}`)
        .then(response => response.json())
        .then(response => {
            if (!response.success) {
                alert("No se encontró información de la licitación");
                return;
            }

            const resultados = response.data;
            if (!resultados || resultados.length === 0) {
                alert("No existen registros");
                return;
            }

            const ganador = resultados[0];
            const productos = resultados;

            // Calcular porcentajes
            const total = parseFloat(ganador.total ?? 0);
            const subtotal = parseFloat(ganador.subtotal ?? total);
            const iva = parseFloat(ganador.iva ?? 0);
            const diez_porciento = total * 0.10;
            const cinco_porciento = total * 0.05;

            // Construir nombre completo del proveedor
            const nombre_completo = ganador.proveedor || '';
            const nombre_completo_coordinador = ganador.coordinador || '';

            // Datos para persona moral
            const datosPersonaMoral = [
                ganador.num_libro,
                ganador.num_oficialia,
                ganador.num_acta_nacimiento
            ].filter(valor => valor && valor.trim() !== '').join(' ');

            const registrosRE = [
                ganador.rfc,
                ganador.curp,
                ganador.num_credencial_votar
            ].filter(valor => valor && valor.trim() !== '').join(' ');

            // Fecha en texto
            function fechaEnTexto(fechaString) {
                if (!fechaString) return '';
                const fecha = new Date(fechaString);
                const dia = fecha.getDate();
                const meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
                const mes = meses[fecha.getMonth()];
                const anio = fecha.getFullYear();
                return `a los ${numeroALetras(dia, false)} días del mes de ${mes} del año ${numeroALetras(anio, false)}`;
            }

            function fechaTextoCorto(fechaString) {
                if (!fechaString) return '';
                const fecha = new Date(fechaString);
                const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                return `${fecha.getDate().toString().padStart(2, '0')} DE ${meses[fecha.getMonth()]} DE ${fecha.getFullYear()}`;
            }

            // Mapeo de campos - TODOS los datos vienen del modelo
            const campos = {
                // Hoja 1 - Glosario y declaraciones
                no_licitacion: ganador.no_licitacion || '',
                no_licitacion2: ganador.no_licitacion || '',
                no_licitacion3: ganador.no_licitacion || '',
                no_licitacion4: ganador.no_licitacion || '',
                no_licitacion5: ganador.no_licitacion || '',
                no_licitacion6: ganador.no_licitacion || '',
                no_licitacion7: ganador.no_licitacion || '',
                no_licitacion8: ganador.no_licitacion || '',
                no_licitacion9: ganador.no_licitacion || '',
                no_licitacion10: ganador.no_licitacion || '',
                no_licitacion11: ganador.no_licitacion || '',
                no_licitacion12: ganador.no_licitacion || '',

                nombre_estudio: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio2: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio3: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio4: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio5: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio9: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio15: ganador.nombre_estudio || ganador.catalogo || '',
                
                nombre_estudio_anexo1: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo2: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo3: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo4: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo5: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo6: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo7: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo8: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo9: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo10: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo11: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo12: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo13: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo14: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo15: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo16: ganador.nombre_estudio || ganador.catalogo || '',
                nombre_estudio_anexo17: ganador.nombre_estudio || ganador.catalogo || '',

                nombre_licitacion: ganador.nombre_estudio || ganador.catalogo || '',
                catalogo: ganador.catalogo || '',
                
                // Hoja 1 - Domicilio y tipo persona
                domicilio_proveedor: ganador.domicilio_proveedor || '',
                tipo_persona: ganador.tipo_persona || '',
                tipo_persona1: ganador.tipo_persona || '',
                tipo_persona2: ganador.tipo_persona || '',
                tipo_persona3: ganador.tipo_persona || '',
                
                // Hoja 2 - Vigencia
                vigencia_contrato: `A PARTIR DEL ${fechaTextoCorto(ganador.created_at || '')} AL 31 DE DICIEMBRE DE ${new Date().getFullYear()}`,
                vigencia_garantia: `${fechaTextoCorto(ganador.created_at || '')} AL 31 DE DICIEMBRE DE ${new Date().getFullYear()}`,

                // Hoja 1 - Datos del proveedor
                proveedor: nombre_completo,
                nombre_proveedor: nombre_completo,
                nombre_proveedor1: nombre_completo,
                nombre_proveedor2: nombre_completo,
                nombre_proveedor3: nombre_completo,
                nombre_proveedor4: nombre_completo,
                nombre_proveedor5: nombre_completo,
                nombre_proveedor6: nombre_completo,
                nombre_proveedor7: nombre_completo,
                nombre_proveedor8: nombre_completo,
                nombre_proveedor9: nombre_completo,
                nombre_proveedor10: nombre_completo,
                nombre_proveedor11: nombre_completo,

                nombre_empresa: nombre_completo,
                nombre_empresa1: nombre_completo,
                nombre_empresa2: nombre_completo,
                nombre_empresa3: nombre_completo,
                representante_legal: nombre_completo,
                representante_legal1: nombre_completo,
                representante_legal2: nombre_completo,
                nombre_completo_representante: nombre_completo,
                nombre_representante: nombre_completo,

                // Hoja 1 - Datos de identificación
                num_credencial_repre: ganador.num_credencial_votar || '',

                numero_rfc: ganador.rfc || '',
                rfc: ganador.rfc || '',
                rfc1: ganador.rfc || '',
                rfc2: ganador.rfc || '',
                rfc_fisica: ganador.rfc || '',

                curp: ganador.curp || '',
                num_acta_cons: ganador.num_acta_nacimiento || '',
                num_libro: ganador.num_libro || '',
                num_libro1: ganador.num_libro || '',
                volumen_re: ganador.num_oficialia || '',
                titular: ganador.lugar_nacimiento || '',
                notario: ganador.lugar_nacimiento || '',
                notario_poder: ganador.lugar_nacimiento || '',
                num_notario: ganador.num_oficialia || '',
                lugar_notario: ganador.lugar_nacimiento || '',
                instrumento_re1: 'INSTRUMENTO NOTARIAL',
                created_at: ganador.created_at || '',
                created_at_texto: fechaTextoCorto(ganador.created_at || ''),
                created_at_texto2: fechaTextoCorto(ganador.created_at || ''),
                created_at_texto3: fechaTextoCorto(ganador.created_at || ''),
                created_at_texto4: fechaTextoCorto(ganador.created_at || ''),
                created_at_texto5: fechaTextoCorto(ganador.created_at || ''),
                created_at_texto6: fechaTextoCorto(ganador.created_at || ''),
                created_at_texto7: fechaTextoCorto(ganador.created_at || ''),
                fecha_texto: fechaEnTexto(ganador.created_at || ''),
                fecha_texto1: fechaEnTexto(ganador.created_at || ''),
                fecha_texto2: fechaEnTexto(ganador.created_at || ''),

                // Hoja 1 - Correo y teléfono
                correo_electronico: ganador.correo_proveedor || '',
                correo: ganador.correo_proveedor || '',
                telefono_principal: ganador.telefono_principal || '',
                telefono_principal1: ganador.telefono_principal || '',
                telefono_principal2: ganador.telefono_principal || '',

                // Hoja 4 - Totales con formato mejorado
                total_valor: total > 0 ? `$${total.toFixed(2)}` : '',
                iva_valor: iva > 0 ? `$${iva.toFixed(2)}` : '',
                subtotal_valor: subtotal > 0 ? `$${subtotal.toFixed(2)}` : '',
                
                // Aquí están las nuevas funciones para subtotal y total en texto
                total_letras: total > 0 ? formatearMontoConLetras(total) : '',
                total_letras1: total > 0 ? formatearMontoConLetras(total) : '',
                total_letras2: total > 0 ? formatearMontoConLetras(total) : '',
                total_letras3: total > 0 ? formatearMontoConLetras(total) : '',
                total_letras4: total > 0 ? formatearMontoConLetras(total) : '',
                subtotal_letras: subtotal > 0 ? formatearMontoConLetras(subtotal) : '',
                subtotal_letras1: subtotal > 0 ? formatearMontoConLetras(subtotal) : '',
                
                // Mantener los campos anteriores por compatibilidad
                total_letras_simple: total > 0 ? numeroALetras(total) : '',
                subtotal_letras_simple: subtotal > 0 ? numeroALetras(subtotal) : '',

                // Hoja 10 - Garantías
                garantia_cumplimiento: diez_porciento > 0 ? diez_porciento.toFixed(2) : '',
                garantia_cumplimiento_texto: diez_porciento > 0 ? formatearMontoConLetras(diez_porciento) : '',
                garantia_vicios_ocultos: cinco_porciento > 0 ? cinco_porciento.toFixed(2) : '',
                garantia_vicios_ocultos_texto: cinco_porciento > 0 ? formatearMontoConLetras(cinco_porciento) : '',

                // Hoja 15 - Anexo 4
                no_licitacion_anexo4: ganador.no_licitacion || '',
                subtotal_anexo4: subtotal > 0 ? subtotal.toFixed(2) : '',
                subtotal_anexo5: subtotal > 0 ? subtotal.toFixed(2) : '',
                iva_anexo4: iva > 0 ? iva.toFixed(2) : '',
                total_anexo4: total > 0 ? total.toFixed(2) : '',

                // Hoja 16 - Anexo 5
                no_licitacion_anexo5: ganador.no_licitacion || '',
                no_licitacion_contrato: ganador.no_licitacion || '',
                subtotal_contrato: subtotal > 0 ? subtotal.toFixed(2) : '',
                iva_contrato: iva > 0 ? iva.toFixed(2) : '',
                total_contrato: total > 0 ? total.toFixed(2) : '',

                // Datos adicionales
                area: ganador.area || '',
                coordinador: nombre_completo_coordinador,
                domicilio_fiscal: ganador.domicilio_proveedor || '',
                giro_economico: ganador.catalogo || '',
                objeto_social: ganador.nombre_estudio || ganador.catalogo || '',
                registro_comercio: 'REGISTRO PÚBLICO DE COMERCIO',
                año: ganador.created_at ? new Date(ganador.created_at).getFullYear().toString() : '',
                
                // Campos para anexo 3
                calle_numero: ganador.domicilio_proveedor ? ganador.domicilio_proveedor.split(',')[0] || '' : '',
                colonia: ganador.domicilio_proveedor ? ganador.domicilio_proveedor.split(',')[1] || '' : '',
                municipio: ganador.domicilio_proveedor ? ganador.domicilio_proveedor.split(',')[2] || '' : '',
                codigo_postal: ganador.domicilio_proveedor ? (ganador.domicilio_proveedor.match(/CP\s*(\d+)/) || [])[1] || '' : '',
                entidad: ganador.domicilio_proveedor ? ganador.domicilio_proveedor.split(',')[3] || '' : '',
                cargo: 'REPRESENTANTE LEGAL'
            };

            // Aplicar todos los campos
            Object.entries(campos).forEach(([id, valor]) => {
                const elemento = document.getElementById(id);
                if (elemento) {
                    elemento.innerText = valor ?? '';
                }
            });

            // Llenar tablas de productos
            llenarTablaProductos(productos);
            llenarTablaAnexo1(productos);
            llenarTablaAnexo4(productos);
            llenarTablaContrato(productos);

            // Fijar total de páginas
            const totalHojas = 19;
            document.querySelectorAll('.numero-pagina').forEach((el, index) => {
                el.innerText = `${index + 1} DE ${totalHojas}`;
            });

        })
        .catch(error => {
            console.error("Error:", error);
            alert("Error al cargar la información de la licitación");
        });

}

// Función para llenar la tabla de productos (Hoja 4)
function llenarTablaProductos(productos) {
    const tbody = document.getElementById("tabla_productos_body");
    if (!tbody) return;

    tbody.innerHTML = "";
    let filas = '';

    productos.forEach((producto, index) => {
        const partida = producto.partida || (index + 1);
        const cantidad = parseFloat(producto.cantidad) || 0;
        const precioUnitario = parseFloat(producto.precio_unitario) || 0;
        const importe = cantidad * precioUnitario;

        filas += `
            <tr>
                <td>${partida}</td>
                <td class="celda-editable" contenteditable="true">${producto.descripcion || ''}</td>
                <td class="celda-editable" contenteditable="true">${producto.unidad_medida || ''}</td>
                <td class="celda-editable" contenteditable="true">${cantidad}</td>
                <td class="celda-editable" contenteditable="true">${producto.marca_modelo || ''}</td>
                <td class="celda-editable" contenteditable="true">$${precioUnitario.toFixed(2)}</td>
                <td class="celda-editable" contenteditable="true">$${importe.toFixed(2)}</td>
            </tr>
        `;
    });

    tbody.innerHTML = filas;
}

// Función para llenar la tabla del Anexo 1
function llenarTablaAnexo1(productos) {
    const tbody = document.getElementById("tabla_anexo1_body");
    if (!tbody) return;

    tbody.innerHTML = "";
    let filas = '';

    productos.forEach((producto, index) => {
        const partida = producto.partida || (index + 1);

        filas += `
            <tr>
                <td>${partida}</td>
                <td class="celda-editable" contenteditable="true">${producto.descripcion || ''}</td>
                <td class="celda-editable" contenteditable="true">${producto.unidad_medida || ''}</td>
                <td class="celda-editable" contenteditable="true">${producto.cantidad || ''}</td>
                <td class="celda-editable" contenteditable="true">${producto.marca_modelo || ''}</td>
            </tr>
        `;
    });

    tbody.innerHTML = filas;
}

// Función para llenar la tabla del Anexo 4
function llenarTablaAnexo4(productos) {
    const tbody = document.getElementById("tabla_anexo4_body");
    if (!tbody) return;

    tbody.innerHTML = "";
    let filas = '';

    productos.forEach((producto, index) => {
        const partida = producto.partida || (index + 1);
        const cantidad = parseFloat(producto.cantidad) || 0;
        const precioUnitario = parseFloat(producto.precio_unitario) || 0;
        const importe = cantidad * precioUnitario;

        filas += `
            <tr>
                <td>${partida}</td>
                <td class="celda-editable" contenteditable="true">${producto.descripcion || ''}</td>
                <td class="celda-editable" contenteditable="true">${producto.unidad_medida || ''}</td>
                <td class="celda-editable" contenteditable="true">${cantidad}</td>
                <td class="celda-editable" contenteditable="true">${producto.marca_modelo || ''}</td>
                <td class="celda-editable" contenteditable="true">$${precioUnitario.toFixed(2)}</td>
                <td class="celda-editable" contenteditable="true">$${importe.toFixed(2)}</td>
            </tr>
        `;
    });

    tbody.innerHTML = filas;
}

// Función para llenar la tabla del Contrato (Anexo 5)
function llenarTablaContrato(productos) {
    const tbody = document.getElementById("tabla_contrato_body");
    if (!tbody) return;

    tbody.innerHTML = "";
    let filas = '';

    productos.forEach((producto, index) => {
        const partida = producto.partida || (index + 1);
        const cantidad = parseFloat(producto.cantidad) || 0;
        const precioUnitario = parseFloat(producto.precio_unitario) || 0;
        const importe = cantidad * precioUnitario;

        filas += `
            <tr>
                <td>${partida}</td>
                <td class="celda-editable" contenteditable="true">${producto.descripcion || ''}</td>
                <td class="celda-editable" contenteditable="true">${producto.unidad_medida || ''}</td>
                <td class="celda-editable" contenteditable="true">${cantidad}</td>
                <td class="celda-editable" contenteditable="true">${producto.marca_modelo || ''}</td>
                <td class="celda-editable" contenteditable="true">$${precioUnitario.toFixed(2)}</td>
                <td class="celda-editable" contenteditable="true">$${importe.toFixed(2)}</td>
            </tr>
        `;
    });

    tbody.innerHTML = filas;
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
            return unidad === 0
                ? decenas[decena]
                : `${decenas[decena]} Y ${unidades[unidad]}`;
        }

        if (n < 1000) {
            const centena = Math.floor(n / 100);
            const resto = n % 100;
            return resto === 0
                ? centenas[centena]
                : `${centenas[centena]} ${convertir(resto)}`;
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

// Función para guardar (simulada)
$('#btnGuardar').on('click', function() {
    const elementosEditables = document.querySelectorAll('[contenteditable="true"]');
    const datosGuardados = {};

    elementosEditables.forEach(function(el) {
        datosGuardados[el.id] = el.textContent.trim();
    });

    console.log('Datos a guardar:', datosGuardados);
    alert('Datos guardados correctamente (simulación)');
});