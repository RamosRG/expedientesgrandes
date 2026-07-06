<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bitácora de Envío | Solicitud de Cotización a Proveedores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #eef2f5;
            font-family: 'Century Gothic', 'Segoe UI', 'Arial', sans-serif;
            padding: 30px 20px;
            color: #1a2c3e;
        }

        .contenedor-principal {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header administrativo */
        .header-superior {
            background: linear-gradient(135deg, #1e4a6b, #0f2c3f);
            border-radius: 28px;
            padding: 28px 35px;
            color: white;
            margin-bottom: 30px;
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
        }

        .header-superior h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header-superior p {
            font-size: 13px;
            opacity: 0.85;
        }

        .barra-acciones {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .breadcrumb {
            background: white;
            border-radius: 60px;
            padding: 10px 22px;
            font-size: 13px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .breadcrumb a {
            text-decoration: none;
            color: #1e4a6b;
            font-weight: bold;
        }

        .grupo-botones {
            display: flex;
            gap: 12px;
        }

        .btn {
            border: none;
            border-radius: 40px;
            padding: 10px 28px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-volver {
            background: white;
            border: 1px solid #cbd5e1;
            color: #1e293b;
        }

        .btn-guardar {
            background: #1e4a6b;
            color: white;
        }

        /* Documento hoja - ORIENTACIÓN HORIZONTAL (29.7cm x 21cm) */
        .contenedor-documento {
            display: flex;
            justify-content: center;
        }

        .grupo-hojas {
            width: 297mm; /* Ancho horizontal */
        }

        .hoja {
            width: 297mm;
            min-height: 210mm; /* Alto horizontal */
            background: white;
            border: 1px solid #cfdde6;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
            margin-bottom: 38px;
            padding: 12.7mm 12.7mm 12.7mm 12.7mm; /* 1.27 cm = 12.7 mm */
            position: relative;
            border-radius: 2px;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 10pt;
            line-height: 1.45;
            color: #000000;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        /* Títulos y estructura */
        .titulo-bitacora {
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .subtitulo-giro {
            text-align: center;
            font-size: 12pt;
            margin-bottom: 28px;
            border-bottom: 2px solid #1e4a6b;
            padding-bottom: 8px;
            display: inline-block;
            width: 100%;
        }

        /* Tabla principal */
        .tabla-proveedores {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0 35px 0;
            font-size: 9pt;
        }

        .tabla-proveedores th,
        .tabla-proveedores td {
            border: 1px solid #000000;
            padding: 8px 6px;
            vertical-align: top;
        }

        .tabla-proveedores th {
            background-color: #f0f4f8;
            text-align: center;
            font-weight: bold;
        }

        /* Celdas editables verdes */
        .celda-editable {
            background-color: #eafaf1;
            outline: none;
            color: #14532d;
            font-weight: 500;
        }

        .celda-editable[contenteditable="true"]:empty:before {
            content: "______";
            color: #6b9c7a;
            letter-spacing: 1px;
        }

        /* Botón dinámico */
        .btn-agregar-fila {
            background: #1e4a6b;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 6px 18px;
            font-size: 9pt;
            cursor: pointer;
            margin: 5px 0 20px 0;
            transition: 0.2s;
            font-weight: bold;
        }

        .btn-agregar-fila:hover {
            background: #0f3b54;
            transform: scale(1.01);
        }

        .firma-contenedor {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 70px;
            width: 100%;
        }

        .firma-item {
            width: 45%;
            text-align: center;
        }

        .firma-linea {
            border-top: 1px solid #000;
            width: 70%;
            margin: 60px auto 0 auto;
        }

        .campo-largo,
        .campo-mediano {
            display: inline-block;
        }

        .campo-verde {
            display: inline-block;
            border-bottom: 1px solid #2c7a4d;
            min-width: 260px;
            background: #eafaf1;
            padding: 0px 6px;
            font-weight: 600;
            outline: none;
            color: #14532d;
            font-family: monospace;
            font-size: 10pt;
        }

        .campo-verde[contenteditable="true"]:empty:before {
            content: "________";
            color: #6b9c7a;
        }

        .numero-pagina {
            position: absolute;
            bottom: 12.7mm;
            right: 12.7mm;
            font-size: 8pt;
            font-weight: bold;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .header-superior,
            .barra-acciones {
                display: none;
            }
            .hoja {
                border: none;
                box-shadow: none;
                margin: 0;
                page-break-after: avoid;
                padding: 12.7mm 12.7mm 12.7mm 12.7mm !important;
            }
            .celda-editable,
            .campo-verde {
                background: transparent !important;
                border-bottom: 1px solid #000 !important;
            }
            .btn-agregar-fila {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="contenedor-principal">
        <div class="header-superior">
            <h1><i class="fas fa-mail-bulk"></i> Bitácora de Envío a Proveedores</h1>
            <p>Solicitud de cotización · Control de entregas y acuse</p>
        </div>
        <div class="barra-acciones">
            <div class="breadcrumb"><a href="#">Procedimientos</a> / <a href="#">Cotizaciones</a> / Bitácora de envío</div>
            <div class="grupo-botones">
                <button class="btn btn-volver" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Regresar</button>
                <button class="btn btn-guardar" id="btnGuardarBitacora"><i class="fas fa-save"></i> Guardar bitácora</button>
            </div>
        </div>
        <div class="contenedor-documento">
            <div class="grupo-hojas">
                <div class="hoja">
                    <div class="contenido-hoja">
                        <!-- Título principal según Word -->
                        <div class="titulo-bitacora">
                            BITÁCORA DE ENVIO DE SOLICITUD DE COTIZACIÓN A PROVEEDORES
                        </div>
                        <div class="subtitulo-giro">
                            PARA EL "<span id="nombre_estudio" class="campo-verde campo-mediano" contenteditable="true"></span>"
                        </div>

                        <!-- Tabla: NO. | LICITANTE | FECHA DE ENTREGA | ASUNTO | CORREO ELECTRÓNICO | FIRMA -->
                        <table class="tabla-proveedores" id="tablaBitacora">
                            <thead>
                                <tr>
                                    <th style="width: 7%;">NO.</th>
                                    <th style="width: 27%;">PROVEEDOR</th>
                                    <th style="width: 15%;">FECHA DE ENTREGA</th>
                                    <th style="width: 20%;">ASUNTO</th>
                                    <th style="width: 21%;">CORREO ELECTRÓNICO</th>
                                    <th style="width: 10%;">FIRMA</th>
                                </tr>
                            </thead>
                            <tbody id="tablaBodyBitacora"></tbody>
                        </table>

                        <!-- Sección de firmas -->
                        <div class="firma-contenedor">
                            <!-- ELABORÓ -->
                            <div class="firma-item">
                                <div><strong>ELABORÓ</strong></div>
                                <div class="firma-linea"></div>
                                <div style="margin-top: 10px;">
                                    <span id="coordinador" class="campo-verde campo-largo" contenteditable="true">
                                    </span>
                                </div>
                                <div style="margin-top: 5px;">
                                    <span id="area" class="campo-verde campo-mediano" contenteditable="true">
                                    </span>
                                </div>
                            </div>

                            <!-- AUTORIZÓ -->
                            <div class="firma-item">
                                <div><strong>AUTORIZÓ</strong></div>
                                <div class="firma-linea"></div>
                                <div style="margin-top: 10px;">
                                    <span class="campo-largo">
                                        C. MIRIAM VIANEY OVANDO RUBIO
                                    </span>
                                </div>
                                <div style="margin-top: 5px;">
                                    <span class="campo-mediano">
                                        DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="numero-pagina">1 de 1</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Función para agregar nueva fila a la bitácora
        function agregarFilaBitacora() {
            const tablaBody = document.getElementById('tablaBodyBitacora');
            const nuevaFila = document.createElement('tr');

            const celdaNumero = document.createElement('td');
            celdaNumero.className = 'celda-editable';
            celdaNumero.setAttribute('contenteditable', 'true');
            celdaNumero.innerText = (tablaBody.children.length + 1).toString();

            const celdaLicitante = document.createElement('td');
            celdaLicitante.className = 'celda-editable';
            celdaLicitante.setAttribute('contenteditable', 'true');
            celdaLicitante.innerText = '';

            const celdaFecha = document.createElement('td');
            celdaFecha.className = 'celda-editable';
            celdaFecha.setAttribute('contenteditable', 'true');
            celdaFecha.innerText = '';

            const celdaAsunto = document.createElement('td');
            celdaAsunto.className = 'celda-editable';
            celdaAsunto.setAttribute('contenteditable', 'true');
            celdaAsunto.innerText = 'Solicitud de cotización';

            const celdaCorreo = document.createElement('td');
            celdaCorreo.className = 'celda-editable';
            celdaCorreo.setAttribute('contenteditable', 'true');
            celdaCorreo.innerText = '';

            const celdaFirma = document.createElement('td');
            celdaFirma.className = 'celda-editable';
            celdaFirma.setAttribute('contenteditable', 'true');
            celdaFirma.innerText = '';

            nuevaFila.appendChild(celdaNumero);
            nuevaFila.appendChild(celdaLicitante);
            nuevaFila.appendChild(celdaFecha);
            nuevaFila.appendChild(celdaAsunto);
            nuevaFila.appendChild(celdaCorreo);
            nuevaFila.appendChild(celdaFirma);

            tablaBody.appendChild(nuevaFila);
            renumerarFilasBitacora();
        }

        // Renumerar automáticamente los números de fila (columna NO.)
        function renumerarFilasBitacora() {
            const filas = document.querySelectorAll('#tablaBodyBitacora tr');
            filas.forEach((fila, index) => {
                const primeraCelda = fila.querySelector('td:first-child');
                if (primeraCelda && primeraCelda.classList.contains('celda-editable')) {
                    primeraCelda.innerText = (index + 1).toString();
                }
            });
        }

        // Guardar toda la bitácora en localStorage
        function guardarBitacora() {
            const filas = document.querySelectorAll('#tablaBodyBitacora tr');
            const datosFilas = [];
            filas.forEach(fila => {
                const celdas = fila.querySelectorAll('.celda-editable');
                const filaData = [];
                celdas.forEach(celda => {
                    filaData.push(celda.innerText.trim());
                });
                datosFilas.push(filaData);
            });

            const camposFirma = {
                autorizoNombre: document.querySelector('.firma-item:first-child .campo-verde:first-child')?.innerText.trim() || '',
                autorizoArea: document.querySelectorAll('.firma-item:first-child .campo-verde')[1]?.innerText.trim() || '',
                elaboroNombre: document.querySelectorAll('.firma-item:nth-child(2) .campo-verde')[0]?.innerText.trim() || '',
                elaboroArea: document.querySelectorAll('.firma-item:nth-child(2) .campo-verde')[1]?.innerText.trim() || '',
                giroTexto: document.querySelector('.subtitulo-giro .campo-verde')?.innerText.trim() || ''
            };

            const objetoBitacora = {
                filas: datosFilas,
                firmas: camposFirma,
                fechaGuardado: new Date().toISOString()
            };

            localStorage.setItem('bitacoraCotizacionProveedores', JSON.stringify(objetoBitacora));
            alert('✅ Bitácora guardada exitosamente. Los datos quedarán disponibles al recargar.');
        }

        // Restaurar datos guardados previamente
        function cargarBitacora() {
            const dataGuardada = localStorage.getItem('bitacoraCotizacionProveedores');
            if (!dataGuardada) return;

            try {
                const parsed = JSON.parse(dataGuardada);
                if (parsed.filas && parsed.filas.length > 0) {
                    const tablaBody = document.getElementById('tablaBodyBitacora');
                    while (tablaBody.firstChild) {
                        tablaBody.removeChild(tablaBody.firstChild);
                    }

                    parsed.filas.forEach(filaArray => {
                        const nuevaFila = document.createElement('tr');
                        for (let i = 0; i < 6; i++) {
                            const celda = document.createElement('td');
                            celda.className = 'celda-editable';
                            celda.setAttribute('contenteditable', 'true');
                            celda.innerText = filaArray[i] || '';
                            nuevaFila.appendChild(celda);
                        }
                        tablaBody.appendChild(nuevaFila);
                    });
                    renumerarFilasBitacora();
                }

                if (parsed.firmas) {
                    const firmaAutorizaNombre = document.querySelector('.firma-item:first-child .campo-verde:first-child');
                    const firmaAutorizaArea = document.querySelectorAll('.firma-item:first-child .campo-verde')[1];
                    const elaboroNombre = document.querySelectorAll('.firma-item:nth-child(2) .campo-verde')[0];
                    const elaboroArea = document.querySelectorAll('.firma-item:nth-child(2) .campo-verde')[1];
                    const giroCampo = document.querySelector('.subtitulo-giro .campo-verde');

                    if (firmaAutorizaNombre && parsed.firmas.autorizoNombre) firmaAutorizaNombre.innerText = parsed.firmas.autorizoNombre;
                    if (firmaAutorizaArea && parsed.firmas.autorizoArea) firmaAutorizaArea.innerText = parsed.firmas.autorizoArea;
                    if (elaboroNombre && parsed.firmas.elaboroNombre) elaboroNombre.innerText = parsed.firmas.elaboroNombre;
                    if (elaboroArea && parsed.firmas.elaboroArea) elaboroArea.innerText = parsed.firmas.elaboroArea;
                    if (giroCampo && parsed.firmas.giroTexto) giroCampo.innerText = parsed.firmas.giroTexto;
                }
            } catch (e) {
                console.warn("Error al cargar bitácora previa", e);
            }
        }

        // Cargar datos desde el backend (usando tu función original)
        function obtenerIdDesdeURL() {
            const partes = window.location.pathname.split('/');
            return partes[partes.length - 1];
        }

        function cargarBitacoraEnvio(id) {
            fetch(`../obtenerBitacoraEnvioPorId/${id}`)
                .then(response => response.json())
                .then(response => {
                    if (!response.success) {
                        alert("No se encontró información");
                        return;
                    }

                    const participantes = response.data;

                    // DATOS GENERALES DEL DOCUMENTO
                    document.getElementById('nombre_estudio').textContent =
                        participantes[0]?.nombre_estudio ?? '';

                    document.getElementById('coordinador').textContent =
                        participantes[0]?.coordinador ?? '';

                    document.getElementById('area').textContent =
                        participantes[0]?.area ?? '';

                    const tbody = document.getElementById('tablaBodyBitacora');
                    tbody.innerHTML = '';

                    if (!participantes || participantes.length === 0) {
                        tbody.innerHTML = `
                            <tr>
                                <td colspan="6" style="text-align:center">
                                    No existen registros
                                </td>
                            </tr>
                        `;
                        return;
                    }

                    participantes.forEach((participante, index) => {
                        const fecha = participante.created_at
                            ? new Date(participante.created_at).toLocaleDateString('es-MX')
                            : '';

                        tbody.innerHTML += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${participante.proveedor ?? ''}</td>
                                <td>${fecha}</td>
                                <td>Solicitud de cotización</td>
                                <td>${participante.correo ?? ''}</td>
                                <td></td>
                            </tr>
                        `;
                    });
                })
                .catch(error => {
                    console.error(error);
                    alert("Error al cargar la información");
                });
        }

        // Eventos
        document.addEventListener('DOMContentLoaded', function() {
            const id = obtenerIdDesdeURL();
            if (id) {
                cargarBitacoraEnvio(id);
            } else {
                // Si no hay ID, cargar desde localStorage o inicializar
                cargarBitacora();
                const tablaBody = document.getElementById('tablaBodyBitacora');
                if (tablaBody.children.length === 0) {
                    const filaInicial = document.createElement('tr');
                    const valoresDefault = ['1', '', '', 'Solicitud de cotización', '', ''];
                    valoresDefault.forEach(texto => {
                        const celda = document.createElement('td');
                        celda.className = 'celda-editable';
                        celda.setAttribute('contenteditable', 'true');
                        celda.innerText = texto;
                        filaInicial.appendChild(celda);
                    });
                    tablaBody.appendChild(filaInicial);
                }
                renumerarFilasBitacora();
            }

            document.getElementById('agregarFilaBitacora').addEventListener('click', agregarFilaBitacora);
            document.getElementById('btnGuardarBitacora').addEventListener('click', guardarBitacora);
        });
    </script>
</body>
</html>