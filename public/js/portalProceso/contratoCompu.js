// Tu JS exactamente igual
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
    fetch(`../../portalProcesos/obtenerContratoCompu/${id}`)
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

            const nombre_completo = ganador.proveedor ?? '';
            const nombre_completo_coordinado = ganador.coordinador ?? '';

            // =====================================================
            // 🆕 NUEVOS DATOS DEL MODELO (agregados)
            // =====================================================
            
            // Datos de persona física
            const curp = ganador.curp ?? '';
            const rfc_fisica = ganador.rfc_fisica ?? '';
            const num_oficialia = ganador.num_oficialia ?? '';
            const lugar_nacimiento = ganador.lugar_nacimiento ?? '';
            const fecha_nacimiento_registro = ganador.fecha_nacimiento_registro ?? '';
            const nci_fisica = ganador.nci_fisica ?? '';
            
            // Datos de persona moral
            const empresa = ganador.empresa ?? '';
            const rfc_moral = ganador.rfc_moral ?? '';
            const giro_economico = ganador.giro_economico ?? '';
            const registro_publico = ganador.registro_publico ?? '';
            const num_credencial_representante = ganador.num_credencial_representante ?? '';
            const volumen_re = ganador.volumen_re ?? '';
            const folio_re = ganador.folio_re ?? '';
            const titular = ganador.titular ?? '';
            const nci = ganador.nci ?? '';
            const num_acta_cons = ganador.num_acta_cons ?? '';
            
            // Otros datos
            const tipo_persona = ganador.tipo_persona ?? 'FISICA';
            const id_proveedor = ganador.id_proveedor ?? '';
            const id_datos_fisica = ganador.id_datos_fisica ?? '';
            const id_datos_moral = ganador.id_datos_moral ?? '';
            const marca_modelo = ganador.marca_modelo ?? '';
            const precio_unitario = ganador.precio_unitario ?? 0;

            // Datos compuestos (igual que antes)
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

            const campos = {
                // === CAMPOS EXISTENTES (se mantienen igual) ===
                nombre_estudio: ganador.catalogo || '',
                nombre_estudio_ganador: ganador.catalogo || '',
                nombre_estudio_siguiente: ganador.catalogo || '',
                estudio_nombre: ganador.catalogo || '',
                nombre_estudio1: ganador.nombre_estudio || '',
                nombre_estudio3: ganador.nombre_estudio || '',
                nombre_estudio33: ganador.nombre_estudio || '',
                nombre_estudio4: ganador.nombre_estudio || '',
                nombre_estudio5: ganador.nombre_estudio || '',
                nombre_estudio9: ganador.nombre_estudio || '',
                nombre_estudio15: ganador.nombre_estudio || '',
                no_licitacion: ganador.num_contrato || '',
                num_acta_cons: ganador.num_acta_cons || '',
                num_libro: ganador.num_libro || '',
                num_libro1: ganador.num_libro || '',
                nombre_empresa: ganador.proveedor || '',
                nombre_empresa1: ganador.proveedor || '',
                nombre_empresa2: ganador.proveedor || '',
                representante_legal: ganador.representante_legal || ganador.proveedor || '',
                representante_legal1: ganador.representante_legal || ganador.proveedor || '',
                representante_legal2: ganador.representante_legal || ganador.proveedor || '',
                nombre_usuario: nombre_completo,
                nombre_proveedor: nombre_completo,
                num_credencial_repre: ganador.num_credencial_votar || '',
                numero_rfc: ganador.rfc || '',
                numero_rfc1: ganador.rfc || '',
                precio_total: ganador.total || 0,
                precio_total_bueno: ganador.total || 0,
                subtotal_al_diez: diez_porciento,
                subtotal_al_cinco: cinco_porciento,
                nombre_completo_coordinado: nombre_completo_coordinado,
                area: ganador.area || '',
                nombre_empresa3: ganador.proveedor || '',
                nombre_empresa4: ganador.proveedor || '',
                datos_persona_moral: datosPersonaMoral,
                datos_persona_re: registrosRE,
                instrumento_re: ganador.instrumento_re || '',
                instrumento_re1: ganador.instrumento_re || '',
                registro_publico: ganador.num_libro || '',
                acta_nacimiento: ganador.num_acta_nacimiento || '',
                representante_legal2: ganador.representante_legal || ganador.proveedor || '',
                num_libro: ganador.num_libro || '',
                datos_notario: ganador.notario || '',
                created_at_texto: ganador.created_at ? new Date(ganador.created_at).toLocaleDateString('es-ES', { day: 'numeric', month: 'long', year: 'numeric' }) : '',
                created_at_texto2: ganador.created_at ? new Date(ganador.created_at).toLocaleDateString('es-ES', { day: 'numeric', month: 'long', year: 'numeric' }) : '',
                created_at: ganador.created_at ? new Date(ganador.created_at).toLocaleDateString('es-ES', { day: 'numeric', month: 'long', year: 'numeric' }) : '',
                created_at_texto3: ganador.created_at ? new Date(ganador.created_at).toLocaleDateString('es-ES', { day: 'numeric', month: 'long', year: 'numeric' }) : '',
                domicilio_fiscal: ganador.domicilio || '',
                domicilio_proveedor: ganador.domicilio_proveedor || '',
                domicilio_proveedor2: ganador.domicilio_proveedor || '',
                num_telefonico: ganador.telefono_principal || '',
                correo_electronico: ganador.correo || '',
                monto_minimo: (parseFloat(ganador.total ?? 0) * 0.60).toFixed(2),
                monto_maximo: parseFloat(ganador.total ?? 0).toFixed(2),
                subtotal_valor: (parseFloat(ganador.total ?? 0) / 1.16).toFixed(2),
                iva_valor: (parseFloat(ganador.total ?? 0) - (parseFloat(ganador.total ?? 0) / 1.16)).toFixed(2),
                total_valor: parseFloat(ganador.total ?? 0).toFixed(2),
                garantia_cumplimiento: (parseFloat(ganador.total ?? 0) * 0.10).toFixed(2),
                garantia_vicios_ocultos: (parseFloat(ganador.total ?? 0) * 0.05).toFixed(2),
                
                // =====================================================
                // 🆕 NUEVOS CAMPOS AGREGADOS (para usar en la vista)
                // =====================================================
                
                // Datos persona física
                curp: curp,
                rfc_fisica: rfc_fisica,
                num_oficialia: num_oficialia,
                lugar_nacimiento: lugar_nacimiento,
                fecha_nacimiento_registro: fecha_nacimiento_registro,
                nci_fisica: nci_fisica,
                
                // Datos persona moral
                empresa: empresa,
                rfc_moral: rfc_moral,
                giro_economico: giro_economico,
                registro_publico_moral: registro_publico,
                num_credencial_representante: num_credencial_representante,
                volumen_re: volumen_re,
                folio_re: folio_re,
                titular: titular,
                nci: nci,
                num_acta_cons: num_acta_cons,
                
                // Otros datos
                tipo_persona: tipo_persona,
                id_proveedor: id_proveedor,
                id_datos_fisica: id_datos_fisica,
                id_datos_moral: id_datos_moral,
                marca_modelo: marca_modelo,
                precio_unitario: precio_unitario
            };

            // =====================================================
            // ASIGNAR TODOS LOS CAMPOS A SUS ELEMENTOS HTML
            // =====================================================
            Object.entries(campos).forEach(([id, valor]) => {
                const elemento = document.getElementById(id);
                if (elemento) {
                    // Si el valor es número, lo formateamos
                    if (typeof valor === 'number' && !isNaN(valor)) {
                        elemento.innerText = valor.toFixed(2);
                    } else {
                        elemento.innerText = valor ?? '';
                    }
                }
            });

            // =====================================================
            // FUNCIÓN NÚMERO A LETRAS (igual que antes)
            // =====================================================
            function numeroALetras(numero, moneda = true) {
                numero = Number(numero);

                const unidades = [
                    '', 'uno', 'dos', 'tres', 'cuatro',
                    'cinco', 'seis', 'siete', 'ocho', 'nueve'
                ];

                const especiales = [
                    'diez', 'once', 'doce', 'trece', 'catorce',
                    'quince', 'dieciséis', 'diecisiete',
                    'dieciocho', 'diecinueve'
                ];

                const decenas = [
                    '', '', 'veinte', 'treinta', 'cuarenta',
                    'cincuenta', 'sesenta', 'setenta',
                    'ochenta', 'noventa'
                ];

                const centenas = [
                    '', 'ciento', 'doscientos', 'trescientos',
                    'cuatrocientos', 'quinientos',
                    'seiscientos', 'setecientos',
                    'ochocientos', 'novecientos'
                ];

                function convertir(n) {
                    if (n === 0) return 'cero';
                    if (n === 100) return 'cien';
                    if (n < 10) return unidades[n];
                    if (n >= 10 && n < 20) return especiales[n - 10];
                    
                    if (n >= 20 && n < 30) {
                        if (n === 20) return 'veinte';
                        return 'veinti' + unidades[n - 20];
                    }
                    
                    if (n < 100) {
                        const decena = Math.floor(n / 10);
                        const unidad = n % 10;
                        return unidad === 0
                            ? decenas[decena]
                            : `${decenas[decena]} y ${unidades[unidad]}`;
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
                        let milesTexto = miles === 1 ? 'mil' : `${convertir(miles)} mil`;
                        return resto === 0 ? milesTexto : `${milesTexto} ${convertir(resto)}`;
                    }
                    
                    return n.toString();
                }

                const entero = Math.floor(numero);
                const decimal = Math.round((numero - entero) * 100);

                const texto = convertir(entero).toUpperCase();

                if (!moneda) {
                    return texto;
                }

                return `${texto} PESOS ${decimal.toString().padStart(2, '0')}/100 M.N.`;
            }

            // =====================================================
            // TOTALES EN TEXTO (igual que antes)
            // =====================================================
            const total = parseFloat(ganador.total ?? 0);
            const subtotal = parseFloat(ganador.total ?? 0) / 1.16;
            const iva = parseFloat(ganador.total ?? 0) - (parseFloat(ganador.total ?? 0) / 1.16);
            const subtotal_aldiez = parseFloat(ganador.total ?? 0) * 0.10;
            const subtotal_alcinco = parseFloat(ganador.total ?? 0) * 0.05;
            const monto_minimo = parseFloat(ganador.total ?? 0) * 0.60;
            const monto_maximo = parseFloat(ganador.total ?? 0);

            const elementosTexto = {
                precio_total_texto: total,
                monto_minimo_texto: monto_minimo,
                monto_maximo_texto: monto_maximo,
                garantia_cumplimiento_texto: subtotal_aldiez,
                garantia_vicios_ocultos_texto: subtotal_alcinco
            };

            Object.entries(elementosTexto).forEach(([id, valor]) => {
                const elemento = document.getElementById(id);
                if (elemento) {
                    elemento.innerText = numeroALetras(valor);
                }
            });

            // =====================================================
            // FECHA EN TEXTO (igual que antes)
            // =====================================================
            function fechaEnTexto(fechaString) {
                const fecha = new Date(fechaString);
                const dia = fecha.getDate();
                const meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
                const mes = meses[fecha.getMonth()];
                const anio = fecha.getFullYear();
                return `a los ${numeroALetras(dia, false)} días del mes de ${mes} del año ${numeroALetras(anio, false)}`;
            }

            const fechaTexto = fechaEnTexto(ganador.created_at || new Date().toISOString());

            const fechaTextoElement = document.getElementById("fecha_texto");
            if (fechaTextoElement) fechaTextoElement.innerText = fechaTexto;

            // =====================================================
            // TABLA PRODUCTOS (actualizada con marca_modelo y precio_unitario)
            // =====================================================
            if (productos && productos.length > 0) {
                const tbody = document.getElementById("tabla_productos_body");
                if (tbody) {
                    tbody.innerHTML = "";
                    let filas = '';

                    productos.forEach((producto, index) => {
                        // 🆕 Usamos los campos del modelo para precio unitario y marca/modelo
                        const precioUnitario = parseFloat(producto.precio_unitario ?? 0) || 
                                               (parseFloat(producto.total ?? 0) / parseFloat(producto.cantidad ?? 1));
                        const marcaModelo = producto.marca_modelo || producto.marca_modelo || '';
                        
                        filas += `
                            <tr>
                                <td class="celda-editable" contenteditable="true">${index + 1}</td>
                                <td class="celda-editable" contenteditable="true">${producto.descripcion || ''}</td>
                                <td class="celda-editable" contenteditable="true">${producto.unidad_medida || 'PIEZA'}</td>
                                <td class="celda-editable" contenteditable="true">${producto.cantidad || '0'}</td>
                                <td class="celda-editable" contenteditable="true">${marcaModelo}</td>
                                <td class="celda-editable" contenteditable="true">$${precioUnitario.toFixed(2)}</td>
                                <td class="celda-editable" contenteditable="true">$${parseFloat(producto.total ?? 0).toFixed(2)}</td>
                            </tr>
                        `;
                    });

                    tbody.innerHTML = filas;
                }
            }

        })
        .catch(error => {
            console.error("Error:", error);
            alert("Error al cargar la información del contrato");
        });
}

// =====================================================
// GUARDAR HTML (igual que antes)
// =====================================================
document.getElementById('btnGuardar').addEventListener('click', function() {
    const htmlContent = document.documentElement.outerHTML;
    const blob = new Blob([htmlContent], {
        type: 'text/html'
    });
    const a = document.createElement('a');
    const url = URL.createObjectURL(blob);
    a.href = url;
    a.download = 'CONTRATO_EQUIPO_COMPUTO_2026.html';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
});