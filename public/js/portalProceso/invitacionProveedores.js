 $(document).ready(function() {
        const id = obtenerIdDesdeURL();
        if (id) {
            cargarTodosLosProveedores(id);
        }
    });

    function obtenerIdDesdeURL() {
        const partes = window.location.pathname.split('/');
        return partes[partes.length - 1];
    }

    function formatearFechaEnEspanol(fechaString) {
        if (!fechaString) return '';
        
        const fecha = new Date(fechaString);
        if (isNaN(fecha.getTime())) return '';
        
        const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
        
        const dia = fecha.getDate();
        const mes = meses[fecha.getMonth()];
        const año = fecha.getFullYear();
        
        return `${dia} DE ${mes} DE ${año}`;
    }

    function numeroATexto(numero) {
        const unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
        const especiales = ['DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISEIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'];
        const decenas = ['', 'DIEZ', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA', 'SETENTA', 'OCHENTA', 'NOVENTA'];
        const centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
        
        function convertirCentenas(num) {
            if (num === 0) return '';
            if (num === 100) return 'CIEN';
            
            let resultado = '';
            const c = Math.floor(num / 100);
            const resto = num % 100;
            
            if (c > 0) {
                resultado += centenas[c];
            }
            
            if (resto > 0) {
                if (c > 0) resultado += ' ';
                resultado += convertirDecenas(resto);
            }
            
            return resultado;
        }
        
        function convertirDecenas(num) {
            if (num < 10) return unidades[num];
            if (num < 20) return especiales[num - 10];
            if (num < 30) {
                if (num === 20) return 'VEINTE';
                return 'VEINTI' + unidades[num - 20];
            }
            
            const d = Math.floor(num / 10);
            const u = num % 10;
            
            let resultado = decenas[d];
            if (u > 0) {
                resultado += ' Y ' + unidades[u];
            }
            
            return resultado;
        }
        
        function convertirMiles(num) {
            const miles = Math.floor(num / 1000);
            const resto = num % 1000;
            let resultado = '';
            
            if (miles > 0) {
                if (miles === 1) {
                    resultado = 'MIL';
                } else {
                    resultado = convertirCentenas(miles) + ' MIL';
                }
            }
            
            if (resto > 0) {
                if (miles > 0) resultado += ' ';
                if (resto < 100) {
                    resultado += 'Y ' + convertirDecenas(resto);
                } else {
                    resultado += convertirCentenas(resto);
                }
            }
            
            return resultado;
        }
        
        function convertirNumero(num) {
            if (num === 0) return 'CERO';
            if (num < 0) return 'MENOS ' + convertirNumero(Math.abs(num));
            
            const millones = Math.floor(num / 1000000);
            const resto = num % 1000000;
            let resultado = '';
            
            if (millones > 0) {
                if (millones === 1) {
                    resultado = 'UN MILLÓN';
                } else {
                    resultado = convertirCentenas(millones) + ' MILLONES';
                }
            }
            
            if (resto > 0) {
                if (millones > 0) resultado += ' ';
                if (resto < 1000) {
                    if (resto < 100) {
                        resultado += 'Y ' + convertirDecenas(resto);
                    } else {
                        resultado += convertirCentenas(resto);
                    }
                } else {
                    resultado += convertirMiles(resto);
                }
            }
            
            return resultado;
        }
        
        const partes = numero.toString().split('.');
        const entero = parseInt(partes[0]);
        const decimal = partes[1] ? parseInt(partes[1].padEnd(2, '0').substring(0, 2)) : 0;
        
        let texto = convertirNumero(entero);
        const centavosStr = decimal.toString().padStart(2, '0');
        texto += ` ${centavosStr}/100 M.N.`;
        
        return texto;
    }

    function formatearNumero(numero) {
        return new Intl.NumberFormat('es-MX').format(numero);
    }

    // ⭐ NUEVA FUNCIÓN: Carga TODOS los proveedores del estudio
    function cargarTodosLosProveedores(id) {
        $.ajax({
            url: "../../portalProcesos/obtenerInvitacionProveedores/" + id,
            type: "GET",
            dataType: "json",
            beforeSend: function () {
                console.log("Cargando proveedores del estudio...");
                $("#contenedorHojas").html('<div style="text-align:center;padding:50px;"><i class="fas fa-spinner fa-spin"></i> Cargando información...</div>');
            },
            success: function (response) {
                console.log("Respuesta del servidor:", response);
                
                if (!response.success) {
                    alert(response.message || "Error al obtener información");
                    return;
                }
                
                if (!response.data || response.data.length === 0) {
                    alert("No se encontraron registros");
                    return;
                }

                // Datos del estudio (se toman del primer registro)
                const primerRegistro = response.data[0];
                const datosEstudio = {
                    no_licitacion: primerRegistro.no_licitacion || "N/A",
                    nombre_estudio: primerRegistro.nombre_estudio || "N/A",
                    created_at: primerRegistro.created_at || "",
                    area: primerRegistro.area || "",
                    coordinador: primerRegistro.coordinador || "",
                    total: primerRegistro.total || 0
                };

                // Actualizar información del encabezado
                $("#infoEstudio").text(`${datosEstudio.no_licitacion} | ${datosEstudio.nombre_estudio}`);
                $("#breadcrumbLicitacion").text(datosEstudio.no_licitacion);

                // ⭐ OBTENER TODOS LOS PROVEEDORES ÚNICOS
                const proveedoresUnicos = obtenerProveedoresUnicos(response.data);
                
                if (proveedoresUnicos.length === 0) {
                    $("#contenedorHojas").html('<div style="text-align:center;padding:50px;color:red;">No hay proveedores registrados para este estudio.</div>');
                    return;
                }

                // ⭐ GENERAR UNA HOJA POR CADA PROVEEDOR
                generarHojasParaProveedores(proveedoresUnicos, datosEstudio);

                console.log(`✅ Se generaron ${proveedoresUnicos.length} hojas para los proveedores`);

            },
            error: function (xhr, status, error) {
                console.error("Error AJAX:", error);
                alert("No se pudo conectar con el servidor.");
            }
        });
    }

    // ⭐ FUNCIÓN PARA OBTENER PROVEEDORES ÚNICOS DEL ARRAY
    function obtenerProveedoresUnicos(data) {
        const mapaProveedores = new Map();
        
        data.forEach(item => {
            const clave = item.proveedor || `Proveedor_${item.id || Math.random()}`;
            if (!mapaProveedores.has(clave)) {
                mapaProveedores.set(clave, {
                    proveedor: item.proveedor || "Sin nombre",
                    rfc: item.rfc || "Sin RFC",
                    domicilio: item.domicilio || "Sin dirección",
                    correo: item.correo || "Sin correo",
                    id: item.id || null
                });
            }
        });
        
        return Array.from(mapaProveedores.values());
    }

    // ⭐ FUNCIÓN PARA GENERAR HOJAS POR PROVEEDOR
    function generarHojasParaProveedores(proveedores, datosEstudio) {
        const contenedor = $("#contenedorHojas");
        contenedor.empty();

        // Agregar contador de proveedores
        const contadorHtml = `<div class="contador-proveedores">
            <i class="fas fa-users"></i> ${proveedores.length} proveedor(es) participante(s)
        </div>`;
        contenedor.append(contadorHtml);

        // Generar una hoja por cada proveedor
        proveedores.forEach((proveedor, index) => {
            const hojaHtml = generarHojaProveedor(proveedor, datosEstudio, index, proveedores.length);
            contenedor.append(hojaHtml);
        });

        // Después de generar todas las hojas, aplicar los campos editables
        setTimeout(() => {
            aplicarCamposEditables();
        }, 100);
    }

    // ⭐ FUNCIÓN PARA GENERAR UNA HOJA INDIVIDUAL
    function generarHojaProveedor(proveedor, datosEstudio, index, total) {
        const fechaFormateada = formatearFechaEnEspanol(datosEstudio.created_at);
        const totalNumero = parseFloat(datosEstudio.total) || 0;
        const totalFormateado = formatearNumero(totalNumero);
        const totalTexto = numeroATexto(totalNumero);

        return `
            <div class="hoja" data-proveedor="${proveedor.proveedor}" data-index="${index}">
                <div class="contenido-hoja">
                    <div class="encabezado-anio">
                        "2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO"
                    </div>

                    <div class="fecha-linea linea-derecha">
                        <strong>TEMASCALCINGO, ESTADO DE MÉXICO, A </strong>
                        <span class="campo-verde campo-mediano" contenteditable="true" data-field="fecha">${fechaFormateada}</span>
                    </div>

                    <div class="fecha-linea linea-derecha">
                        <strong>DEPENDENCIA:</strong>
                        DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
                    </div>

                    <div class="fecha-linea linea-derecha" style="margin-bottom: 20px;">
                        <strong>ASUNTO: SOLICITUD DE PARTICIPACIÓN</strong>
                    </div>

                    <div class="destinatario-linea">
                        <strong>PROVEEDOR:</strong>
                        <span class="campo-verde campo-largo" contenteditable="true" data-field="proveedor">${proveedor.proveedor}</span>
                    </div>
                    <div class="destinatario-linea">
                        <strong>DIRECCIÓN:</strong>
                        <span class="campo-verde campo-largo" contenteditable="true" data-field="domicilio">${proveedor.domicilio}</span>
                    </div>
                    <div class="destinatario-linea">
                        <strong>R.F.C.:</strong>
                        <span class="campo-verde campo-corto" contenteditable="true" data-field="rfc">${proveedor.rfc}</span>
                    </div>
                    <div class="destinatario-linea" style="margin-bottom: 18px;">
                        <strong>CORREO ELECTRÓNICO:</strong>
                        <span class="campo-verde campo-mediano" contenteditable="true" data-field="correo">${proveedor.correo}</span>
                    </div>

                    <div class="saludo-formal">
                        <strong>P R E S E N T E</strong>
                    </div>

                    <div class="texto-cuerpo">
                        Por medio del presente me permito hacerle la cordial invitación al procedimiento de <strong>Invitación Restringida Nacional Presencial</strong>
                        <span class="campo-verde campo-mediano" contenteditable="true" data-field="no_licitacion">${datosEstudio.no_licitacion}</span>, para la
                        <span class="campo-verde campo-largo" contenteditable="true" data-field="nombre_estudio">${datosEstudio.nombre_estudio}</span>, se informa que, las Bases que contienen todos los elementos estarán disponibles para su venta los días
                        <span class="campo-verde campo-largo" contenteditable="true" data-field="fechas_bases">30 de enero, 03 y 04 de febrero de 2025</span>, en las instalaciones de la Dirección de Administración y Desarrollo de Personal, ubicada en el Ex Seminario en avenida de la Paz Esq. Miguel Hidalgo, Col. Centro, Temascalcingo, México, C.P. 50400, en un horario de 09:00 am a 16:00 pm.
                    </div>

                    <div class="texto-cuerpo">
                        Por lo anterior, hago de su conocimiento que las mismas tendrán un costo de recuperación por la cantidad de
                        <span class="campo-verde campo-mediano" data-field="costo_bases">$${totalFormateado} (${totalTexto})</span>, pago que se realizará en la Tesorería Municipal y posteriormente deberá presentar el comprobante de pago en la Dirección de Administración y Desarrollo de Personal para la entrega de las Bases correspondientes.
                    </div>

                    <div class="texto-cuerpo">
                        No omito manifestarle, que los actos serán en punto de las fechas y horas señaladas en las Bases, en caso de no asistir se procederá a la invitación de otras empresas, favor de asistir con memoria USB mínimo de 16 GB.
                    </div>

                    <div class="texto-cuerpo">
                        Esperando contar con su apreciable participación, aprovecho la oportunidad para enviarle un cordial saludo.
                    </div>

                    <div class="atentamente">
                        A T E N T A M E N T E
                    </div>
                    <div class="frase-valores">
                        "SERVIR CON VALORES"
                    </div>

                    <div class="firma-area">
                        <div class="firma-linea">
                            C. MIRIAM VIANEY OVANDO RUBIO
                        </div>
                        <div class="cargo-firma">
                            DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
                        </div>
                    </div>

                    <div class="copia-archivo">
                        <strong>C.c.p. Archivo</strong>
                    </div>
                    <div class="iniciales">
                        <strong>P.S.H.C.</strong>
                    </div>

                    <div class="numero-pagina">
                        ${index + 1} de ${total}
                    </div>
                </div>
            </div>
        `;
    }

    // ⭐ FUNCIÓN PARA APLICAR CAMPOS EDITABLES Y GUARDAR LOCALMENTE
    function aplicarCamposEditables() {
        // Cargar datos guardados localmente si existen
        const dataGuardada = localStorage.getItem('oficioRemisionEstudioCentrado');
        if (dataGuardada) {
            try {
                const valores = JSON.parse(dataGuardada);
                // Para cada campo guardado, buscar el elemento correspondiente
                Object.keys(valores).forEach(key => {
                    const elemento = document.querySelector(`[data-field="${key}"]`);
                    if (elemento && valores[key] !== '[pendiente]') {
                        elemento.innerText = valores[key];
                    }
                });
            } catch(e) {
                console.error("Error al cargar datos guardados:", e);
            }
        }
    }

    // ⭐ EVENTO PARA GUARDAR TODOS LOS CAMPOS EDITABLES
    document.getElementById('btnGuardarOficio').addEventListener('click', function() {
        let todosCampos = document.querySelectorAll('.campo-verde');
        let datosGuardados = {};
        
        todosCampos.forEach((el, idx) => {
            let valor = el.innerText.trim() !== '' ? el.innerText.trim() : '[pendiente]';
            // Usar data-field como clave si existe, sino usar el índice
            const clave = el.dataset.field || `campo_${idx}`;
            datosGuardados[clave] = valor;
        });
        
        console.log("Oficio de remisión guardado:", datosGuardados);
        localStorage.setItem('oficioRemisionEstudioCentrado', JSON.stringify(datosGuardados));
        alert("✔ Documento actualizado. Los campos editables (verdes) se han guardado correctamente.");
    });