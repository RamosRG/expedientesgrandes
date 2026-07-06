$(document).ready(function () {
    const id = obtenerIdDesdeURL();
    if (id) {
        cargarDatosContratoApertura(id);
    }
});

function obtenerIdDesdeURL() {
    const partes = window.location.pathname.split('/');
    return partes[partes.length - 1];
}

function cargarDatosContratoApertura(id) {
    fetch(`../../portalProcesos/obtenerContratoAdministrativo/${id}`)
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

            const subtotalGeneral = parseFloat(ganador.subtotal || 0);
            const totalGeneral = parseFloat(ganador.total || 0);
            const ivaGeneral = parseFloat(ganador.iva || 0);
            
            // Si el subtotal no viene en el primer registro, calcularlo de los productos
            let subtotalCalculado = subtotalGeneral;
            if (subtotalCalculado === 0 && productos.length > 0) {
                productos.forEach(producto => {
                    subtotalCalculado += parseFloat(producto.subtotal || 0);
                });
            }
            
            // Si aún no hay subtotal, calcular del total
            const total = totalGeneral > 0 ? totalGeneral : parseFloat(ganador.total ?? 0);
            if (subtotalCalculado === 0 && total > 0) {
                subtotalCalculado = total / 1.16;
            }
            
            // USAR EL IVA QUE VIENE DE LA BASE DE DATOS
            const iva = ivaGeneral > 0 ? ivaGeneral : parseFloat(ganador.iva || 0);
            
            // SI EL IVA NO VIENE, CALCULARLO DEL SUBTOTAL
            const ivaFinal = iva > 0 ? iva : subtotalCalculado * 0.16;
            
            // SI EL TOTAL NO VIENE, CALCULARLO
            const totalFinal = total > 0 ? total : subtotalCalculado + ivaFinal;

            // CALCULAR PORCENTAJES PARA OTROS USOS
            const diez_porciento = subtotalCalculado * 0.10;
            const cinco_porciento = subtotalCalculado * 0.05;

            const nombre_completo = ganador.proveedor ?? '';
            const nombre_completo_coordinado = ganador.coordinador ?? '';

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

            // FUNCIÓN PARA FORMATEAR FECHA EN TEXTO
            function formatearFechaTexto(fechaString) {
                if (!fechaString) return '';
                
                const fecha = new Date(fechaString);
                if (isNaN(fecha.getTime())) return '';
                
                const dia = fecha.getDate();
                const meses = [
                    'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO',
                    'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'
                ];
                const mes = meses[fecha.getMonth()];
                const anio = fecha.getFullYear();
                
                return `${dia} DE ${mes} DE ${anio}`;
            }

            const campos = {
                nombre_estudio: ganador.catalogo || '',
                nombre_estudio1: ganador.catalogo || '',
                nombre_estudio2: ganador.catalogo || '',
                nombre_estudio3: ganador.catalogo || '',
                nombre_estudio4: ganador.catalogo || '',
                nombre_estudio5: ganador.catalogo || '',
                nombre_estudio6: ganador.catalogo || '',
                nombre_estudio7: ganador.catalogo || '',
                nombre_estudio8: ganador.catalogo || '',
                nombre_estudio9: ganador.catalogo || '',
                nombre_estudio10: ganador.catalogo || '',
                nombre_estudio11: ganador.catalogo || '',
                nombre_estudio12: ganador.catalogo || '',
                nombre_estudio13: ganador.catalogo || '',
                nombre_estudio_ganador: ganador.catalogo || '',
                nombre_estudio_siguiente: ganador.catalogo || '',
                estudio_nombre: ganador.catalogo || '',
                estudio_nombre1: ganador.catalogo || '',
                no_licitacion: '',
                nombre_empresa: ganador.proveedor || '',
                representante_legal: ganador.proveedor || '',
                nombre_usuario: nombre_completo,
                nombre_usuario1: nombre_completo,
                nombre_proveedor: nombre_completo,
                nombre_proveedor1: nombre_completo,
                num_credencial_repre: ganador.num_credencial_votar || '',
                numero_rfc: ganador.rfc || '',
                precio_total: totalFinal,
                precio_total_bueno: totalFinal,
                subtotal_al_diez: diez_porciento,
                subtotal_al_cinco: cinco_porciento,
                nombre_completo_coordinado: nombre_completo_coordinado,
                nombre_completo_coordinado1: nombre_completo_coordinado,
                area: ganador.area || '',
                area1: ganador.area || '',
                nombre_empresa3: ganador.proveedor || '',
                datos_persona_moral: datosPersonaMoral,
                datos_persona_re: registrosRE,
                registro_publico: ganador.num_libro || '',
                acta_nacimiento: ganador.num_acta_nacimiento || '',
                subtotal_texto_completo1 : ganador.subtotal_texto_completo || '',
                domicilio_fiscal: ganador.direccion_completa || '',
                domicilio_fiscal1: ganador.direccion_completa || '',
                telefono_principal: ganador.telefono_principal || '',
                correo: ganador.correo || '',
                curp: ganador.curp || '',
                rfc: ganador.rfc || '',
                created_at: formatearFechaTexto(ganador.created_at),
                created_at1: formatearFechaTexto(ganador.created_at),
                created_at2: formatearFechaTexto(ganador.created_at)  
            };

            Object.entries(campos).forEach(([id, valor]) => {
                const elemento = document.getElementById(id);
                if (elemento) {
                    elemento.innerText = valor ?? '';
                }
            });

            // FUNCIÓN PARA FORMATEAR NÚMERO CON FORMATO MONEDA
            function formatearMoneda(numero) {
                return new Intl.NumberFormat('es-MX', {
                    style: 'currency',
                    currency: 'MXN',
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(numero);
            }

            // FUNCIÓN PARA CONVERTIR NÚMERO A LETRAS
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

                const texto = convertir(entero);

                if (!moneda) {
                    return texto;
                }

                return `${texto} PESOS ${decimal.toString().padStart(2, '0')}/100 M.N.`;
            }

            // ACTUALIZAR SUBTOTAL, IVA Y TOTAL EN LA TABLA DE RESUMEN
            // Usar los elementos que tienen las clases 'subtotal-valor', 'iva-valor', 'total-valor'
            const elementosSubtotal = document.querySelectorAll('.subtotal-valor');
            elementosSubtotal.forEach(el => {
                el.textContent = formatearMoneda(subtotalCalculado);
            });

            const elementosIVA = document.querySelectorAll('.iva-valor');
            elementosIVA.forEach(el => {
                el.textContent = formatearMoneda(ivaFinal);
            });

            const elementosTotal = document.querySelectorAll('.total-valor');
            elementosTotal.forEach(el => {
                el.textContent = formatearMoneda(totalFinal);
            });

            // LOG PARA VERIFICAR
            console.log('Subtotal:', subtotalCalculado);
            console.log('IVA:', ivaFinal);
            console.log('Total:', totalFinal);

            // TABLA PRODUCTOS - CON EL FORMATO SOLICITADO
            if (productos && productos.length > 0) {
                const tbody = document.getElementById("tabla_productos_body");
                if (tbody) {
                    tbody.innerHTML = "";
                    let filas = '';

                    productos.forEach((producto, index) => {
                        const cantidad = parseFloat(producto.cantidad || 1);
                        const precioUnitario = parseFloat(producto.precio_unitario || 0);
                        const subtotalProducto = parseFloat(producto.subtotal || (cantidad * precioUnitario) || 0);
                        
                        filas += `
                            <tr>
                                <td class="celda-editable" contenteditable="true">
                                    ${index + 1}
                                </td>
                                <td class="celda-editable" contenteditable="true">
                                    ${producto.descripcion || ''}
                                </td>
                                <td class="celda-editable" contenteditable="true">
                                    ${cantidad}
                                </td>
                                <td class="celda-editable" contenteditable="true">
                                    ${producto.unidad_medida || ''}
                                </td>
                                <td class="celda-editable" contenteditable="true">
                                    ${producto.marca_modelo || ''}
                                </td>
                                <td class="celda-editable" contenteditable="true">
                                    ${formatearMoneda(precioUnitario)}
                                </td>
                                <td class="celda-editable" contenteditable="true">
                                    ${formatearMoneda(subtotalProducto)}
                                </td>
                            </tr>
                        `;
                    });

                    tbody.innerHTML = filas;
                }
            }

            // OTROS ELEMENTOS DE TEXTO QUE PUEDAN NECESITARSE
            const subtotalTextoElement = document.getElementById("subtotal_texto_completo");
            if (subtotalTextoElement) {
                subtotalTextoElement.textContent = `SUBTOTAL: ${formatearMoneda(subtotalCalculado)} (${numeroALetras(subtotalCalculado)});`;
            }
            

            const totalTextoElement = document.getElementById("total_texto_completo");
            if (totalTextoElement) {
                totalTextoElement.textContent = `TOTAL: ${formatearMoneda(totalFinal)} (${numeroALetras(totalFinal)});`;
            }

        })
        .catch(error => {
            console.error("Error:", error);
            alert("Error al cargar la información del contrato");
        });
}