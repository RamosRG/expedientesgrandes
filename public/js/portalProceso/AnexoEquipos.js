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
    // Primero hacer la petición al controlador
    fetch(`../../portalProcesos/obtenerContratoPorId/${id}`)
        .then(response => response.json())
        .then(response => {
            if (!response.success) {
                alert("No se encontró información del contrato");
                return;
            }

            const contratoApertura = response.data;
            if (!contratoApertura || contratoApertura.length === 0) {
                alert("No existen registros");
                return;
            }

            const ganador = contratoApertura[0];
            
            // Obtener productos si existen en la respuesta
            const productos = response.productos || [];

            const diez_porciento = parseFloat(ganador.subtotal ?? 0) * 0.10;
            const cinco_porciento = parseFloat(ganador.subtotal ?? 0) * 0.05;

            const datosPersonaMoral = [
                ganador.instrumento_re,
                ganador.folio_re,
                ganador.notario,
                ganador.titular
            ].filter(valor => valor && valor.trim() !== '').join(' ');

            const registrosRE = [
                ganador.razon_social,
                ganador.num_credencial_representante,
                ganador.rfc_moral,
                ganador.giro_economico
            ].filter(valor => valor && valor.trim() !== '').join(' ');

            console.log(datosPersonaMoral);

            const nombre_completo = [
                ganador.nombre_proveedor ?? '',
                ganador.apellido_paterno_proveedor ?? '',
                ganador.apellido_materno_proveedor ?? ''
            ].filter(valor => valor.trim() !== '').join(' ');

            const nombre_completo_coordinado = [
                ganador.coordinador_nombre ?? '',
                ganador.coordinador_apellido_paterno ?? '',
                ganador.coordinador_apellido_materno ?? ''
            ].filter(valor => valor.trim() !== '').join(' ');

            const campos = {
                nombre_estudio: ganador.nombre_estudio,
                nombre_estudio_ganador: ganador.nombre_estudio,
                nombre_estudio_siguiente: ganador.nombre_estudio,
                estudio_nombre: ganador.nombre_estudio,
                estudio_nombre1: ganador.nombre_estudio,
                no_licitacion: ganador.no_licitacion,
                nombre_empresa: ganador.nombre_empresa,
                representante_legal: ganador.representante_legal,
                nombre_usuario: nombre_completo,
                nombre_proveedor: nombre_completo,
                num_credencial_repre: ganador.num_credencial_representante,
                numero_rfc: ganador.rfc_moral,
                precio_total: ganador.subtotal,
                precio_total_bueno: ganador.total,
                subtotal_al_diez: diez_porciento,
                subtotal_al_cinco: cinco_porciento,
                nombre_completo_coordinado: nombre_completo_coordinado,
                area: ganador.area,
                nombre_empresa3: ganador.nombre_empresa,
                datos_persona_moral: datosPersonaMoral,
                datos_persona_re: registrosRE,
                registro_publico: ganador.registro_publico,
            };

            Object.entries(campos).forEach(([id, valor]) => {
                const elemento = document.getElementById(id);
                if (elemento) {
                    elemento.innerText = valor ?? '';
                }
            });

            // DATOS PERSONA MORAL
            const notarioElement = document.getElementById("notario");
            if (notarioElement) notarioElement.innerText = ganador.notario ?? '';
            
            const titularElement = document.getElementById("titular");
            if (titularElement) titularElement.innerText = ganador.titular ?? '';

            // NÚMERO A LETRAS
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

            // TOTAL EN TEXTO
            const total = parseFloat(ganador.total ?? 0);
            const subtotal = parseFloat(ganador.subtotal ?? 0);
            const subtotal_aldiez = parseFloat(diez_porciento ?? 0);
            const subtotal_alcinco = parseFloat(cinco_porciento ?? 0);

            const precioSubtotalLetras = document.getElementById("precio_subtotal_letras");
            if (precioSubtotalLetras) precioSubtotalLetras.innerText = numeroALetras(subtotal);
            
            const precioSubtotalDiez = document.getElementById("precio_subtotal_al_diez");
            if (precioSubtotalDiez) precioSubtotalDiez.innerText = numeroALetras(subtotal_aldiez);
            
            const precioSubtotalCinco = document.getElementById("precio_subtotal_al_cinco");
            if (precioSubtotalCinco) precioSubtotalCinco.innerText = numeroALetras(subtotal_alcinco);

            // INSTRUMENTO / VOLUMEN / FOLIO
            const instrumentoTexto = numeroALetras(ganador.instrumento_re, false);
            const volumenTexto = numeroALetras(ganador.volumen_re, false);
            const folioTexto = numeroALetras(ganador.folio_re, false);

            const datosRepresentante = [instrumentoTexto, volumenTexto, folioTexto]
                .filter(valor => valor && valor.trim() !== '')
                .join(' ');

            const instrumentoRe = document.getElementById("instrumento_re");
            if (instrumentoRe) instrumentoRe.innerText = instrumentoTexto;

            const volumenRe = document.getElementById("volumen_re");
            if (volumenRe) volumenRe.innerText = volumenTexto;

            const folioRe = document.getElementById("folio_re");
            if (folioRe) folioRe.innerText = folioTexto;

            const datosRepresentanteElement = document.getElementById("datosRepresentante");
            if (datosRepresentanteElement) datosRepresentanteElement.innerText = datosRepresentante;

            // SEGUNDO PROVEEDOR
            if (contratoApertura.length > 1) {
                const otroProveedor = contratoApertura[1];

                const nombreEmpresa1 = document.getElementById("nombre_empresa1");
                if (nombreEmpresa1) nombreEmpresa1.innerText = otroProveedor.nombre_empresa ?? '';
                
                const estudioMercado1 = document.getElementById("estudio_mercado1");
                if (estudioMercado1) estudioMercado1.innerText = otroProveedor.nombre_estudio ?? '';
                
                const noLicitacion1 = document.getElementById("no_licitacion1");
                if (noLicitacion1) noLicitacion1.innerText = otroProveedor.no_licitacion ?? '';
            }

            // FECHA EN TEXTO
            function fechaEnTexto(fechaString) {
                const fecha = new Date(fechaString);
                const dia = fecha.getDate();
                const mes = fecha.toLocaleString('es-MX', { month: 'long' });
                const anio = fecha.getFullYear();
                return `a los ${numeroALetras(dia, false)} días del mes de ${mes} del año ${numeroALetras(anio, false)}`;
            }

            const fechaTexto = fechaEnTexto(ganador.created_at);

            const fechaTextoElement = document.getElementById("fecha_texto");
            if (fechaTextoElement) fechaTextoElement.innerText = fechaTexto;
            
            const fechaTexto1Element = document.getElementById("fecha_texto1");
            if (fechaTexto1Element) fechaTexto1Element.innerText = fechaTexto;

            // TABLA PRODUCTOS
            if (productos && productos.length > 0) {
                const tbody = document.getElementById("tabla_productos_body");
                if (tbody) {
                    tbody.innerHTML = "";
                    let filas = '';

                    productos.forEach(producto => {
                        filas += `
                            <tr>
                                <td class="celda-editable" contenteditable="true">
                                    ${producto.partida ?? ''}
                                </td>
                                <td class="celda-editable" contenteditable="true">
                                    ${ganador.nombre_estudio ?? ''}
                                    <br><br>
                                    CARACTERÍSTICAS MÍNIMAS DE LA UNIDAD
                                    <br><br>
                                    ${producto.descripcion ?? ''}
                                    <br><br>
                                    CARACTERÍSTICAS DEL PRODUCTO
                                    <br>
                                    ${producto.descripcion ?? ''}
                                </td>
                                <td class="celda-editable" contenteditable="true">
                                    ${producto.marca_modelo ?? ''}
                                </td>
                                <td class="celda-editable" contenteditable="true">
                                    ${producto.unidad_medida ?? ''}
                                </td>
                                <td class="celda-editable" contenteditable="true">
                                    ${producto.cantidad ?? ''}
                                </td>
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