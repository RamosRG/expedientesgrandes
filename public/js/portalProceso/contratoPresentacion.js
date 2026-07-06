$(document).ready(function () {
    const id = obtenerIdDesdeURL();
    if (id) {
        cargarDatosContratoPresentacion(id);
    }
});

function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

function cargarDatosContratoPresentacion(id) {
    fetch(`../../portalProcesos/obtenerContratoPresentacion/${id}`)
        .then(response => response.json())
        .then(response => {
            if (!response.success) {
                alert("No se encontró información del contrato");
                return;
            }

            const resultados = response.data;
            if (!resultados || resultados.length === 0) {
                alert("No existen registros");
                return;
            }

            const ganador = resultados[0];
            const productos = resultados;

            const diez_porciento = parseFloat(ganador.total ?? 0) * 0.10;
            const cinco_porciento = parseFloat(ganador.total ?? 0) * 0.05;

            // Datos del proveedor
            const nombre_completo = ganador.proveedor ?? '';
            
            const datosPersonaMoral = [
                ganador.num_libro,
                ganador.num_oficialia,
                ganador.num_acta_nacimiento
            ].filter(valor => valor && valor.trim() !== '').join(' ');

            const datosRepresentanteLegal = [
                ganador.instrumento_re,
                ganador.volumen_re,
                ganador.folio_re,
                ganador.notario,
                ganador.titular,
                ganador.nci,
                ganador.num_acta_cons
            ].filter(valor => valor && valor.trim() !== '').join(' ');

            // Obtener el total y subtotal del ganador
            const total = parseFloat(ganador.total ?? 0);
            const subtotal = parseFloat(ganador.subtotal ?? 0);
            const iva = parseFloat(ganador.iva ?? 0);

            // Convertir a texto
            const totalTexto = numeroALetras(total);
            const subtotalTexto = numeroALetras(subtotal);

            // Formato con moneda
            const totalMoneda = `$${formatoMoneda(total)} (${totalTexto})`;
            const subtotalMoneda = `$${formatoMoneda(subtotal)} (${subtotalTexto})`;

            // Fecha en formato MES AÑO (sin día)
            function fechaMesAnio(fechaString) {
                const fecha = new Date(fechaString);
                const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                const mes = meses[fecha.getMonth()];
                const anio = fecha.getFullYear();
                return `${mes} ${anio}`;
            }

            // Campos a llenar
            const campos = {
                nombre_estudio: ganador.nombre_estudio,
                nombre_estudio_ganador: ganador.nombre_estudio,
                estudio_nombre: ganador.nombre_estudio,
                estudio_nombre1: ganador.nombre_estudio,
                estudio_nombre2: ganador.nombre_estudio,
                estudio_nombre3: ganador.nombre_estudio,
                estudio_nombre4: ganador.nombre_estudio,
                estudio_nombre5: ganador.nombre_estudio,
                estudio_nombre6: ganador.nombre_estudio,
                estudio_nombre7: ganador.nombre_estudio,
                estudio_nombre8: ganador.nombre_estudio,
                no_licitacion: ganador.no_licitacion,
                nombre_proveedor: nombre_completo,
                representante_legal: ganador.representante_legal || ganador.proveedor || '',
                representante_legal1: ganador.representante_legal || ganador.proveedor || '',
                num_credencial_representante_ganador: ganador.num_credencial_representante || ganador.num_credencial_votar || '',
                rfc_proveedor_ganador: ganador.rfc || ganador.rfc_moral || ganador.rfc_fisica || '',
                domicilio_fiscal: ganador.domicilio_proveedor || '',
                domicilio_proveedor_ganador: ganador.domicilio_proveedor || '',
                empresa_ganadora: ganador.proveedor || ganador.empresa || '',
                acta_constitutiva: ganador.num_acta_nacimiento || '',
                correo_proveedor: ganador.correo_proveedor || '',
                volumen_re: ganador.volumen_re || '',
                volumen_re2: ganador.volumen_re || '',
                created_at_texto: ganador.created_at || new Date().toISOString(),
                created_at_texto2: ganador.created_at || new Date().toISOString(),
                created_at_texto3: ganador.created_at || new Date().toISOString(),
                created_at_texto4: ganador.created_at || new Date().toISOString(),
                titular: ganador.titular || '',
                titular2: ganador.titular || '',
                num_oficialia: ganador.num_oficialia || '',
                nci: ganador.nci || '',
                num_acta_cons: ganador.num_acta_cons || '',
                instrumento_re: ganador.instrumento_re || '',
                notario: ganador.notario || '',
                estado: 'MÉXICO',
                domicilio_particular: ganador.domicilio_proveedor || '',
                correo_electronico: ganador.correo || '',
                periodo_inicio: 'ENERO 2026',
                periodo_fin: 'DICIEMBRE 2026',
                nombre_representante: ganador.representante_legal || ganador.proveedor || '',
                nombre_empresa_firma: ganador.proveedor || ganador.empresa || ''
            };

            // Asignar valores a los campos
            Object.entries(campos).forEach(([id, valor]) => {
                const elemento = document.getElementById(id);
                if (elemento) {
                    // Si el campo es de fecha, formatear como MES AÑO
                    if (id.includes('created_at')) {
                        elemento.textContent = fechaMesAnio(valor);
                    } else {
                        elemento.textContent = valor ?? '';
                    }
                }
            });

            // Asignar el total en texto al elemento correspondiente
            const totalTextoElement = document.getElementById("total_ganador_texto");
            if (totalTextoElement) {
                totalTextoElement.textContent = totalMoneda;
            }

            // Asignar el SUBTOTAL como MONTO MÍNIMO en la Cláusula Segunda
            const subtotalClausulaElement = document.getElementById("subtotal_ganador_clausula");
            if (subtotalClausulaElement) {
                subtotalClausulaElement.textContent = subtotalMoneda;
            }

            // Asignar el TOTAL como MONTO MÁXIMO en la Cláusula Segunda
            const totalClausulaElement = document.getElementById("total_ganador_clausula");
            if (totalClausulaElement) {
                totalClausulaElement.textContent = totalMoneda;
            }

            // Cargar tabla de productos con ID y precio unitario
            cargarTablaProductos(productos, ganador);

            // Actualizar subtotales en la parte inferior
            const subtotalElement = document.getElementById("subtotal_valor");
            if (subtotalElement) subtotalElement.textContent = `$${formatoMoneda(subtotal)}`;
            
            const ivaElement = document.getElementById("iva_valor");
            if (ivaElement) ivaElement.textContent = `$${formatoMoneda(iva)}`;
            
            const totalElement = document.getElementById("total_valor");
            if (totalElement) totalElement.textContent = `$${formatoMoneda(total)}`;

            // Fecha completa en texto (con día)
            function fechaEnTextoCompleto(fechaString) {
                const fecha = new Date(fechaString);
                const dia = fecha.getDate();
                const meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
                const mes = meses[fecha.getMonth()];
                const anio = fecha.getFullYear();
                return `a los ${numeroALetras(dia, false)} días del mes de ${mes} del año ${numeroALetras(anio, false)}`;
            }

            const fechaTexto = fechaEnTextoCompleto(ganador.created_at || new Date().toISOString());
            const fechaTextoElement = document.getElementById("fecha_texto");
            if (fechaTextoElement) fechaTextoElement.textContent = fechaTexto;

        })
        .catch(error => {
            console.error("Error:", error);
            alert("Error al cargar la información del contrato");
        });
}

        // Función para cargar la tabla de productos con ID y precio unitario
        function cargarTablaProductos(productos, ganador) {
            const tbody = document.querySelector("#tablaProductos tbody");
            if (!tbody) return;

            tbody.innerHTML = "";
            let subtotalGeneral = 0;

            // Formateadores de números
            const formatoMoneda = (numero) => {
                const num = parseFloat(numero) || 0;
                return new Intl.NumberFormat('es-MX', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(num);
            };

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

            // Iterar sobre los productos
            productos.forEach((producto, index) => {
                // Obtener valores correctamente
                const cantidad = parseFloat(producto.cantidad) || 1;
                
                // Usar el precio_unitario del producto directamente
                let precioUnitario = parseFloat(producto.precio_unitario);
                let totalProducto = parseFloat(producto.total) || 0;
                
                // Si no hay precio unitario pero hay total, calcularlo
                if (isNaN(precioUnitario) || precioUnitario === 0) {
                    precioUnitario = totalProducto / cantidad;
                }
                
                // Si no hay total pero hay precio unitario, calcular total
                if (totalProducto === 0 && precioUnitario > 0) {
                    totalProducto = precioUnitario * cantidad;
                }
                
                // Acumular subtotal
                subtotalGeneral += totalProducto;

                // Obtener el ID del producto
                const idProducto = producto.id_descripcion || producto.id || index + 1;
                
                const fuenteFinanciamiento = producto.fuente_financiamiento || 'PARTICIPACIONES FEDERALES';
                
                const fila = document.createElement('tr');
                fila.innerHTML = `
                    <td class="celda-editable" contenteditable="true">
                        <span class="id-destacado">${idProducto}</span>
                    </td>
                    <td class="celda-editable" contenteditable="true">${producto.partida || index + 1}</td>
                    <td class="celda-editable" contenteditable="true" style="text-align: left; padding-left: 8px;">
                        <strong>${producto.descripcion || 'Sin descripción'}</strong>
                    </td>
                    <td class="celda-editable" contenteditable="true">${producto.unidad_medida || 'N/A'}</td>
                    <td class="celda-editable" contenteditable="true">${formatoCantidad(cantidad)}</td>
                    <td class="celda-editable" contenteditable="true">${fuenteFinanciamiento}</td>
                    <td class="celda-editable" contenteditable="true">${producto.marca_modelo || 'N/A'}</td>
                    <td class="celda-editable" contenteditable="true" style="font-weight: bold; color: #1a56db;">$${formatoMoneda(precioUnitario)}</td>
                    <td class="celda-editable" contenteditable="true">$${formatoMoneda(totalProducto)}</td>
                `;
                tbody.appendChild(fila);
            });

            // Calcular totales correctamente
            const totalSub = parseFloat(ganador.subtotal) || subtotalGeneral || 0;
            const iva = parseFloat(ganador.iva) || 0;
            const total = parseFloat(ganador.total) || (totalSub + iva) || 0;

            // Subtotal
            const subtotalRow = document.createElement('tr');
            subtotalRow.className = 'fila-totales';
            subtotalRow.innerHTML = `
                <td colspan="7" style="text-align: right; font-weight: bold; background-color: #f8f9fa;">
                    <strong>SUBTOTAL</strong>
                </td>
                <td style="font-weight: bold; background-color: #f8f9fa;"></td>
                <td style="font-weight: bold; background-color: #f8f9fa;">
                    $${formatoMoneda(totalSub)}
                </td>
            `;
            tbody.appendChild(subtotalRow);

            // IVA - calcular porcentaje
            const porcentajeIVA = totalSub > 0 ? (iva / totalSub * 100).toFixed(2) : 16;
            const ivaRow = document.createElement('tr');
            ivaRow.className = 'fila-totales';
            ivaRow.innerHTML = `
                <td colspan="7" style="text-align: right; font-weight: bold; background-color: #f8f9fa;">
                    <strong>IVA (${porcentajeIVA}%)</strong>
                </td>
                <td style="font-weight: bold; background-color: #f8f9fa;"></td>
                <td style="font-weight: bold; background-color: #f8f9fa;">
                    $${formatoMoneda(iva)}
                </td>
            `;
            tbody.appendChild(ivaRow);

            // TOTAL
            const totalRow = document.createElement('tr');
            totalRow.className = 'fila-totales';
            totalRow.style.borderTop = '2px solid #000';
            totalRow.innerHTML = `
                <td colspan="7" style="text-align: right; font-weight: bold; background-color: #e9ecef; font-size: 1.1em;">
                    <strong>TOTAL</strong>
                </td>
                <td style="font-weight: bold; background-color: #e9ecef;"></td>
                <td style="font-weight: bold; background-color: #e9ecef; font-size: 1.2em; color: #000;">
                    $${formatoMoneda(total)}
                </td>
            `;
            tbody.appendChild(totalRow);
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

        function formatoMoneda(numero) {
            const num = parseFloat(numero) || 0;
            return new Intl.NumberFormat('es-MX', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(num);
        }

        // Guardar HTML
        document.getElementById('btnGuardar').addEventListener('click', function() {
            const htmlContent = document.documentElement.outerHTML;
            const blob = new Blob([htmlContent], {
                type: 'text/html'
            });
            const a = document.createElement('a');
            const url = URL.createObjectURL(blob);
            a.href = url;
            a.download = 'CONTRATO_FOTOCOPIADO_2026.html';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });