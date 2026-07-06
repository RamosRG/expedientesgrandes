<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudio de Mercado · Suministro Papelería Municipal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ============================================ */
        /* RESET Y BASE                                 */
        /* ============================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #eef2f5;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            padding: 20px 15px;
            color: #1a2c3e;
        }

        .contenedor-principal {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ============================================ */
        /* HEADER SUPERIOR Y BARRA DE ACCIONES          */
        /* ============================================ */
        .header-superior {
            background: linear-gradient(135deg, #1e4a6b, #0f2c3f);
            border-radius: 20px;
            padding: 20px 30px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
        }

        .header-superior h1 {
            font-size: 24px;
            margin-bottom: 5px;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        .header-superior p {
            font-size: 12px;
            opacity: 0.85;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        .barra-acciones {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .breadcrumb {
            background: white;
            border-radius: 40px;
            padding: 8px 18px;
            font-size: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        .breadcrumb a {
            text-decoration: none;
            color: #1e4a6b;
            font-weight: bold;
        }

        .grupo-botones {
            display: flex;
            gap: 10px;
        }

        .btn {
            border: none;
            border-radius: 35px;
            padding: 8px 22px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
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

        .btn-imprimir {
            background: #2d7a4a;
            color: white;
        }

        /* ============================================ */
        /* CONTENEDOR DE HOJAS                          */
        /* ============================================ */
        .contenedor-documento {
            display: flex;
            justify-content: center;
        }

        .grupo-hojas {
            width: 216mm;
        }

        /* ============================================ */
        /* HOJA CARTA - TAMAÑO 8.5" x 11"              */
        /* Márgenes según imagen:                       */
        /*   Top: 2.5 cm   Bottom: 2.5 cm              */
        /*   Left: 3 cm    Right: 3 cm                 */
        /*   Gutter: 0 cm                              */
        /* ============================================ */
        .hoja {
            width: 216mm;
            min-height: 279mm;
            background: white;
            border: 1px solid #cfdde6;
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;

            /* MÁRGENES APLICADOS SEGÚN IMAGEN */
            padding: 25mm 30mm 25mm 30mm;
            /* Top: 2.5cm, Right: 3cm, Bottom: 2.5cm, Left: 3cm */

            position: relative;
            border-radius: 2px;
            page-break-after: always;
            break-inside: avoid;
        }

        .hoja:last-child {
            margin-bottom: 0;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
        }

        /* ============================================ */
        /* ESTILOS DE CONTENIDO                         */
        /* ============================================ */
        .encabezado-muni {
            text-align: right;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            font-size: 12pt;
            font-weight: normal;
            text-transform: uppercase;
            margin: 0;
            padding: 0;
            line-height: 1.4;
            border: none;
        }

        .titulo-principal {
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            margin: 6px 0 4px;
            text-transform: uppercase;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        .subtitulo-sec {
            text-align: left;
            font-weight: bold;
            font-size: 13pt;
            margin: 14px 0 8px 0;
            text-transform: uppercase;
            border: none;
            display: block;
            width: 100%;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        .texto {
            margin-bottom: 8px;
            text-align: justify;
            font-size: 12pt;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            line-height: 1.5;
        }

        .campo-verde {
            display: inline-block;
            border-bottom: 1.5px solid #2c7a4d;
            min-width: 120px;
            background: #eafaf1;
            padding: 0px 6px;
            font-weight: 600;
            outline: none;
            color: #14532d;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            font-size: 12pt;
        }

        .campo-verde[contenteditable="true"]:empty:before {
            content: "______";
            color: #6b9c7a;
        }

        .campo-corto {
            min-width: 70px;
        }

        .campo-mediano {
            min-width: 160px;
        }

        .campo-largo {
            min-width: 250px;
        }

        /* ============================================ */
        /* TABLAS                                       */
        /* ============================================ */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 8px 0;
            font-size: 10pt;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        th,
        td {
            border: 1px solid #000000;
            padding: 4px 5px;
            vertical-align: middle;
        }

        th {
            background: #f0f4f8;
            text-align: center;
            font-weight: bold;
            font-size: 10pt;
        }

        td {
            font-size: 10pt;
        }

        .celda-editable {
            background-color: #eafaf1;
            outline: none;
        }

        /* ============================================ */
        /* TABLA EMPRESA/PROVEEDOR (SIN BORDES)        */
        /* ============================================ */
        #tablaEmpresaProveedor,
        #tablaEmpresaProveedor th,
        #tablaEmpresaProveedor td,
        #tablaEmpresaProveedor tbody,
        #tablaEmpresaProveedor thead,
        #tablaEmpresaProveedor tfoot,
        #tablaEmpresaProveedor tr {
            border: none !important;
            border-collapse: collapse !important;
        }

        #tablaEmpresaProveedor thead,
        #tablaEmpresaProveedor tfoot {
            display: none !important;
        }

        #tablaEmpresaProveedor td {
            padding: 4px 8px;
            text-align: left !important;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            font-size: 12pt;
            border: none !important;
        }

        #tablaEmpresaProveedor td:first-child {
            width: 25%;
        }

        #tablaEmpresaProveedor td:nth-child(2) {
            width: 45%;
        }

        #tablaEmpresaProveedor td:last-child {
            width: 30%;
            text-align: right !important;
        }

        .texto-precios-grande {
            font-size: 12pt !important;
        }

        /* ============================================ */
        /* TABLA INFO (ÁREA USUARIA)                    */
        /* ============================================ */
        .tabla-info {
            width: 75%;
            margin: 8px 0;
            border-collapse: collapse;
        }

        .tabla-info td {
            border: 1px solid #000;
            padding: 5px 8px;
            vertical-align: top;
            font-size: 11pt;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        .tabla-info td:first-child {
            font-weight: bold;
            width: 35%;
            background: #f0f4f8;
        }

        /* ============================================ */
        /* TABLA ESTUDIO (Cuadro Comparativo)           */
        /* ============================================ */
        #tablaEstudio {
            font-size: 9pt;
        }

        #tablaEstudio th,
        #tablaEstudio td {
            padding: 3px 4px;
            font-size: 9pt;
        }

        #tablaEstudio th {
            font-size: 8.5pt;
        }

        /* ============================================ */
        /* FIRMAS Y PIE DE PÁGINA                       */
        /* ============================================ */
        .numero-pagina {
            position: absolute;
            bottom: 10mm;
            right: 12mm;
            font-size: 10pt;
            font-weight: bold;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        .fila-firma {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
        }

        .col-firma {
            text-align: center;
            width: 45%;
        }

        .linea-firma {
            border-top: 1.5px solid #000;
            margin-top: 40px;
            padding-top: 5px;
            width: 100%;
        }

        .col-firma div {
            font-size: 11pt;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        ul {
            font-size: 12pt;
            margin-bottom: 8px;
            margin-left: 25px;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            line-height: 1.5;
        }

        ul li {
            margin-bottom: 3px;
        }

        .estimado-box {
            background: #f9efdb;
            padding: 6px 10px;
            margin-top: 10px;
            font-size: 12pt;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            line-height: 1.5;
        }

        .estimado-box strong {
            font-weight: bold;
        }

        .texto strong {
            font-weight: bold;
        }

        /* ============================================ */
        /* SALTOS DE PÁGINA AUTOMÁTICOS                 */
        /* ============================================ */
        .salto-pagina {
            page-break-before: always;
            break-before: page;
        }

        .no-break {
            page-break-inside: avoid;
            break-inside: avoid;
        }

        /* ============================================ */
        /* IMPRESIÓN - CON MÁRGENES EXACTOS            */
        /* ============================================ */
        @media print {
            /* Ocultar elementos de UI */
            body {
                background: white;
                padding: 0;
                margin: 0;
            }

            .header-superior,
            .barra-acciones {
                display: none !important;
            }

            /* HOJA CON MÁRGENES EXACTOS PARA IMPRESIÓN */
            .hoja {
                border: none !important;
                box-shadow: none !important;
                margin: 0 !important;

                /* MÁRGENES EXACTOS SEGÚN IMAGEN */
                padding: 25mm 30mm 25mm 30mm !important;
                /* Top: 2.5cm, Right: 3cm, Bottom: 2.5cm, Left: 3cm */

                page-break-after: always;
                width: 100%;
                min-height: 100vh;
            }

            .hoja:last-child {
                page-break-after: avoid;
            }

            .campo-verde,
            .celda-editable {
                background: transparent !important;
                border-bottom: 1.5px solid #000 !important;
            }

            .contenedor-documento {
                display: block;
            }

            .grupo-hojas {
                width: 100%;
            }

            .numero-pagina {
                position: absolute;
                bottom: 10mm;
                right: 12mm;
            }
        }

        /* ============================================ */
        /* RESPONSIVE                                   */
        /* ============================================ */
        @media screen and (max-width: 768px) {
            .hoja {
                width: 100%;
                min-height: auto;
                padding: 25mm 30mm 25mm 30mm;
                /* Mantener márgenes en responsive */
            }

            .grupo-hojas {
                width: 100%;
            }

            .barra-acciones {
                flex-direction: column;
                align-items: stretch;
            }

            .grupo-botones {
                justify-content: center;
                flex-wrap: wrap;
            }

            #tablaEmpresaProveedor {
                width: 100%;
            }

            .tabla-info {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="contenedor-principal">
        <!-- HEADER SUPERIOR -->
        <div class="header-superior">
            <h1><i class="fas fa-store"></i> Estudio de Mercado · Papelería</h1>
            <p>Suministro de artículos para dependencias municipales | Documento editable</p>
        </div>

        <!-- BARRA DE ACCIONES -->
        <div class="barra-acciones">
            <div class="breadcrumb">
                <a href="#">Adquisiciones</a> / <a href="#">Estudios de mercado</a> / Papelería 2026
            </div>
            <div class="grupo-botones">
                <button class="btn btn-volver" onclick="window.history.back();">
                    <i class="fas fa-arrow-left"></i> Regresar
                </button>
                <button class="btn btn-imprimir" onclick="window.print();">
                    <i class="fas fa-print"></i> Imprimir
                </button>
                <button class="btn btn-guardar" id="btnGuardarEstudio">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </div>
        </div>

        <!-- CONTENEDOR DE HOJAS -->
        <div class="contenedor-documento">
            <div class="grupo-hojas" id="grupoHojas">
                <!-- ========================================== -->
                <!-- HOJA 1 - CARTA                            -->
                <!-- ========================================== -->
                <div class="hoja" id="hoja1">
                    <div class="contenido-hoja">
                        <!-- ENCABEZADO -->
                        <div class="encabezado-muni">
                            TEMASCALCINGO, ESTADO DE MÉXICO A
                            <span id="created_at" class="campo-verde campo-mediano" contenteditable="true"></span>
                        </div>
                        <div class="encabezado-muni">
                            COORDINACIÓN DE RECURSOS MATERIALES
                        </div>

                        <!-- SECCIÓN 1 -->
                        <div class="subtitulo-sec">1. DESCRIPCIÓN DE LA CONTRATACIÓN</div>
                        <div class="texto">
                            Suministro de artículos de
                            <span id="catalogo" class="campo-verde campo-mediano" contenteditable="true"></span>
                            para las distintas dependencias de la Administración Pública Municipal.
                        </div>

                        <!-- TABLA DE PRODUCTOS -->
                        <table id="tablaProductos">
                            <thead>
                                <tr>
                                    <th style="width:10%;">No. partida</th>
                                    <th style="width:40%;">Descripción</th>
                                    <th style="width:12%;">U.M.</th>
                                    <th style="width:12%;">Cantidad</th>
                                    <th style="width:26%;">Imagen de Referencia</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyProductos">
                                <!-- Cargado por JS -->
                            </tbody>
                        </table>

                        <div class="texto" style="font-size:9pt; margin-top:4px;">
                            *De conformidad con el Anexo Técnico de la solicitud de cotización. Las imágenes de referencia se encuentran en el expediente.
                        </div>

                        <!-- SECCIÓN 2 -->
                        <div class="subtitulo-sec">2. ESTUDIO DE PRECIOS</div>
                        <div class="texto">
                            Realizando una revisión de precios de mercado ofrecidos por los proveedores
                            de artículos de <span id="catalogo1" class="campo-verde campo-mediano" contenteditable="true"></span> se encuentran los siguientes resultados:
                        </div>

                        <!-- TABLA EMPRESA/PROVEEDOR - SIN ENCABEZADOS NI LÍNEAS -->
                        <div style="margin: 8px 0;">
                            <table id="tablaEmpresaProveedor" style="border:none;border-collapse:collapse;width:65%;">
                                <thead style="display:none;">
                                    <tr>
                                        <th>Concepto</th>
                                        <th>Proveedor/Empresa</th>
                                        <th>Total (IVA incluido)</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyEmpresaProveedor" style="border:none;">
                                    <!-- Cargado por JS -->
                                </tbody>
                                <tfoot style="display:none;">
                                    <tr>
                                        <td colspan="2"><strong>TOTAL GENERAL</strong></td>
                                        <td id="totalGeneralEmpresaProveedor"><strong>$0.00</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="texto" style="font-size:11pt;">
                            <strong>Proveedores o Prestadores de Servicio</strong><br>
                            De acuerdo al estudio de mercado, existen proveedores nacionales e inscritos en el Catálogo
                            de proveedores de bienes y/o servicios del Municipio de Temascalcingo que cuentan con
                            actividad económica y/u objeto social relacionado con el comercio al por menor de
                            <span id="catalogo2" class="campo-verde campo-mediano" contenteditable="true"></span>.
                        </div>

                        <!-- SECCIÓN 3 -->
                        <div class="subtitulo-sec">3. LUGAR DE ENTREGA DEL BIEN</div>
                        <div class="texto">
                            Se realizará por parte del proveedor a su cuenta, cargo, riesgo y sin costo
                            hasta la recepción de los bienes por parte del Municipio de Temascalcingo y en caso de
                            presentar defectos se cambiará el producto en un lapso no mayor a 48 horas.
                        </div>

                        <!-- NÚMERO DE PÁGINA -->
                        <div class="numero-pagina">1 de 2</div>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- HOJA 2 - CARTA (CONTINUACIÓN)             -->
                <!-- ========================================== -->
                <div class="hoja" id="hoja2">
                    <div class="contenido-hoja">
                        <!-- SECCIÓN 4 -->
                        <div class="subtitulo-sec">4. CONCLUSIONES</div>
                        <div class="texto">
                            Derivado del análisis de la información, se formulan las siguientes conclusiones:
                        </div>
                        <ul>
                            <li>Existen proveedores dentro del Catálogo de proveedores de bienes y/o servicios del
                                Municipio de Temascalcingo que podrían estar interesados en participar en el
                                procedimiento.</li>
                            <li>Los precios del suministro de <span id="catalogo3" class="campo-verde campo-mediano" contenteditable="true"></span> varían acorde al lugar y fecha de su venta.</li>
                            <li>El promedio del suministro de <span id="catalogo4" class="campo-verde campo-mediano" contenteditable="true"></span> es de acuerdo al siguiente cuadro comparativo:
                            </li>
                        </ul>

                        <!-- DATOS GENERALES -->
                        <table class="tabla-info">
                            <tr>
                                <td><i class="fas fa-building" style="margin-right:4px;"></i>ÁREA USUARIA / SOLICITANTE</td>
                                <td id="areaTexto">—</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-calendar-alt" style="margin-right:4px;"></i>FECHA</td>
                                <td id="fechaTexto">—</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-tag" style="margin-right:4px;"></i>PARTIDA PRESUPUESTAL</td>
                                <td id="nombreEstudioTexto">—</td>
                            </tr>
                        </table>

                        <!-- TABLA DE ESTUDIO -->
                        <table id="tablaEstudio">
                            <thead>
                                <tr>
                                    <!-- Columnas dinámicas generadas por JS -->
                                </tr>
                            </thead>
                            <tbody id="tbodyEstudio">
                                <!-- Cargado por JS -->
                            </tbody>
                            <tfoot>
                                <!-- Cargado por JS -->
                            </tfoot>
                        </table>

                        <!-- ESTIMADO -->
                        <div class="estimado-box">
                            <strong>Estimado a ejercer para el procedimiento:</strong>
                            <span class="campo-verde campo-largo" contenteditable="true">$ 1,285,000.00 (UN MILLÓN
                                DOSCIENTOS OCHENTA Y CINCO MIL PESOS 00/100 M.N.)</span>
                        </div>

                        <div class="texto" style="font-size:11pt;">
                            <strong>Modalidad adquisitiva propuesta:</strong> Derivado de lo anterior, el
                            procedimiento deberá realizarse a través de una Licitación Pública Nacional Presencial, toda
                            vez que existe en el Catálogo de Proveedores personas con actividades económicas o con
                            objeto social relacionado con la adquisición de los bienes.
                        </div>

                        <!-- FIRMAS -->
                        <div class="fila-firma">
                            <div class="col-firma">
                                <div class="linea-firma">
                                    <span id="coordinador" class="campo-verde campo-mediano" contenteditable="true" style="font-size:11pt;">
                                    
                                    </span>
                                </div>
                                <div>COORDINADOR DE <span id="area" class="campo-verde campo-mediano" contenteditable="true" style="font-size:11pt;"></div>
                            </div>
                            <div class="col-firma">
                                <div class="linea-firma">
                                    <span class="campo-verde campo-mediano" contenteditable="true" style="font-size:11pt;">
                                        C. MIRIAM VIANEY OVANDO RUBIO
                                    </span>
                                </div>
                                <div>DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL</div>
                            </div>
                        </div>

                        <!-- NÚMERO DE PÁGINA -->
                        <div class="numero-pagina">2 de 2</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- SCRIPTS                                      -->
    <!-- ============================================ -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/portalProceso/contratoEstudioMerca.js"></script>

    <script>

    </script>
</body>

</html>