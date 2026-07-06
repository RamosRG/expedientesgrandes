<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRNP-001-2026 - Adquisición Equipos de Cómputo</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #edf1f5;
            font-family: 'Century Gothic', 'Segoe UI', sans-serif;
            padding: 25px;
            color: #000;
        }

        .contenedor-principal {
            max-width: 1450px;
            margin: auto;
        }

        /* HEADER SUPERIOR */
        .header-superior {
            background: linear-gradient(135deg, #5e1b34, #8b2c4a);
            border-radius: 22px;
            padding: 28px 35px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .header-superior h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header-superior p {
            font-size: 13px;
            opacity: .9;
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
            border-radius: 50px;
            padding: 10px 18px;
            font-size: 13px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .06);
        }

        .breadcrumb a {
            text-decoration: none;
            color: #8b2c4a;
            font-weight: bold;
        }

        .grupo-botones {
            display: flex;
            gap: 10px;
        }

        .btn {
            border: none;
            border-radius: 40px;
            padding: 10px 24px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: .2s;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-volver {
            background: white;
            border: 1px solid #ccc;
        }

        .btn-guardar {
            background: #5e1b34;
            color: white;
        }

        /* DOCUMENTO */
        .contenedor-documento {
            display: flex;
            justify-content: center;
        }

        .grupo-hojas {
            width: 210mm;
        }

        .hoja {
            width: 210mm;
            min-height: 297mm;
            background: white;
            border: 1px solid #d8d8d8;
            box-shadow: 0 0 15px rgba(0, 0, 0, .08);
            margin-bottom: 35px;
            padding-top: 3.17cm;
            padding-bottom: 2.5cm;
            padding-left: 3cm;
            padding-right: 3cm;
            position: relative;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 8pt;
            font-family: 'Century Gothic', 'Segoe UI', sans-serif;
            line-height: 1.7;
            text-align: justify;
            text-transform: uppercase;
        }

        .encabezado {
            text-align: center;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .titulo {
            text-align: center;
            font-size: 13pt;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .subtitulo {
            text-align: center;
            font-size: 10pt;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .texto {
            margin-bottom: 12px;
        }

        .campo {
            display: inline-block;
            border-bottom: 1px solid #000;
            min-width: 120px;
            padding: 1px 4px;
            background: #fffceb;
            font-weight: bold;
            outline: none;
        }

        .campo[contenteditable="true"] {
            cursor: text;
        }

        .campo-corto {
            min-width: 90px;
        }

        .campo-mediano {
            min-width: 220px;
        }

        .campo-largo {
            min-width: 420px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 18px;
            font-size: 7.5pt;
            font-family: 'Century Gothic', 'Segoe UI', sans-serif;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 5px 4px;
            vertical-align: top;
        }

        table th {
            text-align: center;
            font-weight: bold;
            background: #f2f2f2;
        }

        .celda-editable {
            background: #fffceb;
            outline: none;
        }

        .numero-pagina {
            position: absolute;
            bottom: 2.5cm;
            right: 3cm;
            font-size: 8pt;
            font-weight: bold;
        }

        .firma {
            margin-top: 70px;
            width: 45%;
            display: inline-block;
            vertical-align: top;
        }

        .firma-completa {
            margin-top: 70px;
            width: 100%;
            text-align: center;
        }

        .linea {
            border-top: 1px solid #000;
            padding-top: 8px;
            text-align: center;
            font-weight: bold;
        }

        .marca-agua {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 60pt;
            color: rgba(200, 200, 200, 0.15);
            font-weight: bold;
            pointer-events: none;
            text-transform: uppercase;
            letter-spacing: 10px;
        }

        @page {
            size: A4;
            margin: 0;
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
                page-break-after: always;
                padding-top: 3.17cm;
                padding-bottom: 2.5cm;
                padding-left: 3cm;
                padding-right: 3cm;
            }

            .hoja:last-child {
                page-break-after: auto;
            }

            .marca-agua {
                display: none;
            }
        }
    </style>

</head>

<body>

    <div class="contenedor-principal">

        <!-- HEADER SUPERIOR -->
        <div class="header-superior">

            <h1>
                <i class="fas fa-file-pdf"></i>
                IRNP-001-2026 · ADQUISICIÓN DE EQUIPOS DE CÓMPUTO
            </h1>

            <p>
                Vista previa del documento integrado (Anexos 1, 2, 3 y 4)
            </p>

        </div>

        <!-- BARRA DE ACCIONES -->
        <div class="barra-acciones">

            <div class="breadcrumb">
                <a href="#">Inicio</a> / <a href="#">Procesos</a> / <a href="#">IRNP-001-2026</a> / Documento
            </div>

            <div class="grupo-botones">
                <button class="btn btn-volver" onclick="window.history.back();">
                    <i class="fas fa-arrow-left"></i> Regresar
                </button>
                <button class="btn btn-guardar" id="btnGuardar">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </div>

        </div>

        <!-- DOCUMENTO CON TODAS LAS HOJAS -->
        <div class="contenedor-documento">
            <div class="grupo-hojas">

                <!-- ================= HOJA 1 ================= -->
                <!-- ANEXO 1 - PROPUESTA TÉCNICA -->
                <div class="hoja">
                    <div class="contenido-hoja">

                        <div class="encabezado">
                            <strong>ANEXO 1</strong>
                        </div>

                        <div class="titulo">
                            PROPUESTA TÉCNICA
                        </div>

                        <div class="titulo" style="font-size: 10pt; margin-top: -5px;">
                            BIENES A COTIZAR
                        </div>

                        <div style="text-align: center; margin-bottom: 12px; font-weight: bold;">
                            MUNICIPIO DE TEMASCALCINGO MÉXICO<br>
                            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL<br>
                            PROCEDIMIENTO DE INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL<br>
                            <span style="background: #f2f2f2; padding: 0 8px;">IRNP-001-2026</span><br>
                            PARA LA "<span style="background: #f2f2f2; padding: 0 8px;">ADQUISICIÓN DE EQUIPOS DE CÓMPUTO</span>"
                        </div>

                        <div style="font-size: 7pt; margin-bottom: 12px; text-align: center;">
                            PARTIDAS, DESCRIPCIÓN Y CANTIDAD DE BIENES ESTIMADOS A OFERTAR NO DEBERÁ MODIFICARSE CON
                            PROPUESTAS DIFERENTES, SALVO QUE LAS MODIFICACIONES SE DERIVEN DE LA JUNTA DE ACLARACIONES;
                            DE LO CONTRARIO SE DESECHARÁ LA PROPUESTA.
                        </div>

                        <div style="margin-bottom: 12px;">
                            <span style="font-weight: bold;">NOMBRE O RAZÓN SOCIAL DEL OFERENTE:</span>
                            <span class="campo campo-largo" contenteditable="true" style="min-width: 350px;"></span>
                        </div>

                        <!-- TABLA DE BIENES (ANEXO 1) -->
                        <table>
                            <thead>
                                <tr>
                                    <th style="width:8%;"># PARTIDA<br>ÚNICA</th>
                                    <th style="width:34%;">DESCRIPCIÓN DE LOS BIENES</th>
                                    <th style="width:12%;">UNIDAD DE MEDIDA</th>
                                    <th style="width:10%;">CANTIDAD</th>
                                    <th style="width:36%;">MARCA Y MODELO<br>PROPUESTO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:center;">1</td>
                                    <td>EQUIPO DE CÓMPUTO DE ESCRITORIO CON FACTOR DE FORMA TODO EN UNO (AIO), PANTALLA DE 23.8" FHD CON UN PROCESADOR DE 4 NÚCLEOS (4 P-CORES CON VELOCIDAD BASE DE 3.4 GHZ CON 12 MB DE CACHE), 16 GB EN MEMORIA RAM DDR5-4800, UNIDAD DE ESTADO SÓLIDO CON CAPACIDAD DE ALMACENAMIENTO DE 512 GB, UN PUERTO HDMI, UN PUERTO DISPLAYPORT, UN PUERTO DE RED GBE, CONECTIVIDAD WI-FI 6 Y SISTEMA OPERATIVO WINDOWS HOME EN ESPAÑOL).</td>
                                    <td style="text-align:center;">PIEZA</td>
                                    <td style="text-align:center;">15</td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">2</td>
                                    <td>EQUIPO DE CÓMPUTO PORTÁTIL (LAPTOP) DE 15.5" PARA PROGRAMACIÓN AVANZADA CON UN PROCESADOR DE 14 NÚCLEOS (6 P-CORES CON VELOCIDAD BASE DE 2.3 GHZ Y 8 E-CORES CON VELOCIDAD BASE DE 1.7 GHZ) CON 24 MB DE CACHE, 16 GB EN MEMORIA RAM DDR5-4800, PANTALLA FHD DE 15.5", UN DISCO DE ESTADO SÓLIDO CON CAPACIDAD DE 1 TB, CONECTIVIDAD WI FI 6 Y SISTEMA OPERATIVO WINDOWS PRO ÚLTIMA VERSIÓN LIBERADA EN ESPAÑOL.</td>
                                    <td style="text-align:center;">PIEZA</td>
                                    <td style="text-align:center;">4</td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">3</td>
                                    <td>EQUIPO DE CÓMPUTO DE ESCRITORIO CON FORMATO TIPO TORRE (TOWER) CON MONITOR DE 23.8" FHD, UN PROCESADOR DE 6 NÚCLEOS (6 P-CORES CON VELOCIDAD BASE DE 3.0 GHZ), 18 MB DE CACHE, 8 GB EN MEMORIA RAM DDR4-3200, UN DISCO DE ESTADO SÓLIDO M.2 CON CAPACIDAD DE 512 GB, WI FI 6 Y SISTEMA OPERATIVO WINDOWS HOME 11.</td>
                                    <td style="text-align:center;">PIEZA</td>
                                    <td style="text-align:center;">20</td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">4</td>
                                    <td>ESTACIÓN DE TRABAJO PORTATIL (LAPTOP WORKSTATION) PARA ACTIVIDADES DE DESARROLLO DE SOFTWARE CON UN PROCESADOR DE 12 NÚCLEOS (4 P-CORES CON VELOCIDAD BASE DE 2.2 GHZ, 8 E-CORES CON VELOCIDAD BASE DE 1.6 GHZ Y 18 MB DE CACHE), 16 GB DE MEMORIA RAM DDR5-5200, SSD CON CAPACIDAD DE ALMACENAMIENTO DE 512 GB, PANTALLA DE 16 PULGADAS CON RESOLUCIÓN WUXGA, TARJETA GRÁFICA DISCRETA INTERNA (GPU) CON 4GB GDDR6, CONECTIVIDAD WI FI 6E, BLUETOOTH 5.3 Y WINDOWS PRO ÚLTIMA VERSIÓN LIBERADA EN ESPAÑOL.</td>
                                    <td style="text-align:center;">PIEZA</td>
                                    <td style="text-align:center;">5</td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                </tr>
                            </tbody>
                        </table>

                        <div style="font-weight: bold; margin-top: 15px; text-decoration: underline;">CONSIDERACIONES</div>

                        <div style="margin-bottom: 6px;">
                            <strong>PLAZO DE ENTREGA:</strong> <span style="background: #f2f2f2; padding: 0 6px;">A MÁS TARDAR 10 DÍAS HÁBILES</span> POSTERIORES A LA EMISIÓN DE CADA ORDEN DE COMPRA Y DENTRO DE LOS HORARIOS ESTABLECIDOS POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.
                        </div>

                        <div style="margin-bottom: 6px;">
                            <strong>LUGAR DE ENTREGA:</strong> <span style="background: #f2f2f2; padding: 0 6px;">EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, UBICADO EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</span>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <strong>VIGENCIA DE LA OFERTA:</strong> <span style="background: #f2f2f2; padding: 0 6px;">30 DÍAS HÁBILES</span> A PARTIR DE LA REMISIÓN DE COTIZACIÓN.
                        </div>

                        <div style="text-align: right; margin-bottom: 20px;">
                            A <span class="campo campo-corto" contenteditable="true"></span> DE <span class="campo campo-mediano" contenteditable="true"></span> DE 2026
                        </div>

                        <div style="text-align: center; font-weight: bold; margin-bottom: 20px;">
                            BAJO PROTESTA DE DECIR VERDAD<br>
                            ATENTAMENTE
                        </div>

                        <div style="display: flex; justify-content: space-between; margin-top: 30px;">
                            <div style="width: 30%; text-align: center;">
                                <div style="border-top: 1px solid #000; padding-top: 8px;">
                                    <span class="campo campo-mediano" contenteditable="true" style="min-width: 160px;"></span><br>
                                    <span style="font-size: 7pt;">NOMBRE DEL REPRESENTANTE LEGAL</span>
                                </div>
                            </div>
                            <div style="width: 30%; text-align: center;">
                                <div style="border-top: 1px solid #000; padding-top: 8px;">
                                    <span class="campo campo-mediano" contenteditable="true" style="min-width: 160px;"></span><br>
                                    <span style="font-size: 7pt;">CARGO EN LA EMPRESA</span>
                                </div>
                            </div>
                            <div style="width: 30%; text-align: center;">
                                <div style="border-top: 1px solid #000; padding-top: 8px;">
                                    <span class="campo campo-mediano" contenteditable="true" style="min-width: 160px;"></span><br>
                                    <span style="font-size: 7pt;">FIRMA</span>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 25px; text-align: center; font-size: 7pt;">
                            <strong>ANEXO 1</strong> · PROPUESTA TÉCNICA · IRNP-001-2026
                        </div>

                        <div class="numero-pagina">1 DE 8</div>
                    </div>
                </div>

                <!-- ================= HOJA 2 ================= -->
                <!-- ANEXO 2 - AFIANZADORAS AUTORIZADAS -->
                <div class="hoja">
                    <div class="contenido-hoja">

                        <div class="encabezado">
                            <strong>ANEXO 2</strong>
                        </div>

                        <div class="titulo">
                            AFIANZADORAS AUTORIZADAS PARA LA EMISIÓN DE FIANZAS
                        </div>

                        <div style="text-align: center; margin-bottom: 18px; font-weight: bold;">
                            MUNICIPIO DE TEMASCALCINGO MÉXICO<br>
                            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL<br>
                            PROCEDIMIENTO DE INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL<br>
                            <span style="background: #f2f2f2; padding: 0 8px;">IRNP-001-2026</span><br>
                            PARA LA "<span style="background: #f2f2f2; padding: 0 8px;">ADQUISICIÓN DE EQUIPOS DE CÓMPUTO</span>"
                        </div>

                        <table style="font-size: 8pt;">
                            <thead>
                                <tr>
                                    <th style="width:8%;">#</th>
                                    <th style="width:42%;">AFIANZADORA</th>
                                    <th style="width:20%;">NO DE PÓLIZA GLOBAL</th>
                                    <th style="width:30%;">TIPO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>1.</td><td>AFIANZADORA ASERTA, S.A. DE C.V.</td><td>010-03</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                                <tr><td>2.</td><td>AFIANZADORA INSURGENTES, S.A. DE C.V.</td><td>2441-7004-600000</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                                <tr><td>3.</td><td>AFIANZADORA SOFIMEX, S.A., GRUPO FINANCIERO SOFIMEX</td><td>425473</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                                <tr><td>4.</td><td>CHUBB DE MÉXICO, COMPAÑÍA AFIANZADORA, S.A. DE C.V.</td><td>EMI-10129</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                                <tr><td>5.</td><td>FIANZAS ASECAM, S.A., GRUPO FINANCIERO ASECAM</td><td>405,000</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                                <tr><td>6.</td><td>FIANZAS ATLAS, S.A.</td><td>III-278241-RC</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                                <tr><td>7.</td><td>PRIMERO FIANZAS, S.A. DE C.V.</td><td>7401</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                                <tr><td>8.</td><td>FIANZAS DORAMA, S.A.</td><td>99200PGEM</td><td>(CONTARTISTAS, PROV. PREST. DE BIEN. Y SERVICIOS, FISCALES Y ECOLOGICAS)</td></tr>
                                <tr><td>9.</td><td>FIANZAS GUARDIANA INBURSA, S.A., GRUPO FINANCIERO INBURSA</td><td>2001EM</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                                <tr><td>10.</td><td>ACE FIANZAS MONTERREY, S.A.</td><td>28000001998</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                                <tr><td>11.</td><td>HSBC FIANZAS, S.A., GRUPO FINANCIERO HSBC</td><td>510,000</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                                <tr><td>12.</td><td>MAPFRE FIANZAS, S.A.</td><td>PGEMG0001060</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                                <tr><td>13.</td><td>AFIANZADORA FIDUCIA, S.A. DE C.V</td><td>1D3-02</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                                <tr><td>14.</td><td>CESCE FIANZAS MÉXICO, S.A. DE C.V.</td><td>GEMP 110029</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                            </tbody>
                        </table>

                        <div style="text-align: center; font-weight: bold; margin: 25px 0 20px 0;">
                            BAJO PROTESTA DE DECIR VERDAD<br>
                            ATENTAMENTE
                        </div>

                        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                            <div style="width: 30%; text-align: center;">
                                <div style="border-top: 1px solid #000; padding-top: 8px;">
                                    <span class="campo campo-mediano" contenteditable="true" style="min-width: 160px;"></span><br>
                                    <span style="font-size: 7pt;">NOMBRE DEL REPRESENTANTE LEGAL</span>
                                </div>
                            </div>
                            <div style="width: 30%; text-align: center;">
                                <div style="border-top: 1px solid #000; padding-top: 8px;">
                                    <span class="campo campo-mediano" contenteditable="true" style="min-width: 160px;"></span><br>
                                    <span style="font-size: 7pt;">CARGO EN LA EMPRESA</span>
                                </div>
                            </div>
                            <div style="width: 30%; text-align: center;">
                                <div style="border-top: 1px solid #000; padding-top: 8px;">
                                    <span class="campo campo-mediano" contenteditable="true" style="min-width: 160px;"></span><br>
                                    <span style="font-size: 7pt;">FIRMA</span>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 25px; text-align: center; font-size: 7pt;">
                            <strong>ANEXO 2</strong> · AFIANZADORAS AUTORIZADAS · IRNP-001-2026
                        </div>

                        <div class="numero-pagina">2 DE 8</div>
                    </div>
                </div>

                <!-- ================= HOJA 3 ================= -->
                <!-- ANEXO 3 - DATOS DEL OFERENTE -->
                <div class="hoja">
                    <div class="contenido-hoja">

                        <div class="encabezado">
                            <strong>ANEXO 3</strong>
                        </div>

                        <div style="text-align: center; margin-bottom: 12px; font-weight: bold;">
                            MUNICIPIO DE TEMASCALCINGO MÉXICO<br>
                            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL<br>
                            PROCEDIMIENTO DE INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL<br>
                            <span style="background: #f2f2f2; padding: 0 8px;">IRNP-001-2026</span><br>
                            PARA LA "<span style="background: #f2f2f2; padding: 0 8px;">ADQUISICIÓN DE EQUIPOS DE CÓMPUTO</span>"
                        </div>

                        <div style="margin-bottom: 15px;">
                            <span class="campo campo-largo" contenteditable="true" style="min-width: 400px; text-transform: none;"></span> , MANIFIESTO <strong>"BAJO PROTESTA DE DECIR VERDAD"</strong>, QUE LOS DATOS AQUÍ ASENTADOS, SON CIERTOS Y HAN SIDO DEBIDAMENTE VERIFICADOS, ASÍ COMO QUE CUENTO CON LAS FACULTADES SUFICIENTES PARA SUSCRIBIR LA PROPUESTA EN LA PRESENTE INVITACIÓN, A NOMBRE Y REPRESENTACIÓN DE (PERSONA FÍSICA O MORAL)
                        </div>

                        <div style="font-weight: bold; text-decoration: underline; margin: 15px 0 8px 0;">
                            DATOS VIGENTES
                        </div>

                        <div style="border: 1px solid #000; padding: 12px; margin-bottom: 15px;">
                            <div style="font-weight: bold; text-decoration: underline;">PERSONAS FÍSICAS O MORALES:</div>
                            <div style="margin-top: 8px;">
                                Registro Federal de Contribuyentes: <span class="campo campo-corto" contenteditable="true"></span><br>
                                Domicilio: calle <span class="campo campo-corto" contenteditable="true"></span> Número <span class="campo campo-corto" contenteditable="true"></span> , Colonia <span class="campo campo-mediano" contenteditable="true"></span> , Delegación o Municipio <span class="campo campo-mediano" contenteditable="true"></span> , Código postal <span class="campo campo-corto" contenteditable="true"></span> , Entidad federativa <span class="campo campo-mediano" contenteditable="true"></span> , Tel. <span class="campo campo-corto" contenteditable="true"></span> , Fax <span class="campo campo-corto" contenteditable="true"></span> Correo electrónico <span class="campo campo-mediano" contenteditable="true"></span>
                            </div>
                        </div>

                        <div style="border: 1px solid #000; padding: 12px; margin-bottom: 15px;">
                            <div style="font-weight: bold; text-decoration: underline;">PERSONAS MORALES:</div>
                            <div style="margin-top: 8px;">
                                <strong>Escritura Pública en la que consta su acta constitutiva:</strong> núm. <span class="campo campo-corto" contenteditable="true"></span> fecha <span class="campo campo-mediano" contenteditable="true"></span> Notario público ante el cual se dio fe: <span class="campo campo-mediano" contenteditable="true"></span> Número <span class="campo campo-corto" contenteditable="true"></span> , Lugar <span class="campo campo-mediano" contenteditable="true"></span> , <strong>Objeto social:</strong> <span class="campo campo-largo" contenteditable="true" style="min-width: 350px;"></span><br>
                                <strong>Fecha y datos de su inscripción en el registro público de comercio:</strong> <span class="campo campo-largo" contenteditable="true" style="min-width: 350px;"></span><br>
                                <strong>ACCIONISTAS:</strong><br>
                                <span class="campo campo-mediano" contenteditable="true"></span> <span class="campo campo-mediano" contenteditable="true"></span> <span class="campo campo-mediano" contenteditable="true"></span><br>
                                <span style="font-size: 7pt;">(ampliar según necesidades)</span>
                            </div>
                        </div>

                        <div style="border: 1px solid #000; padding: 12px; margin-bottom: 15px;">
                            <div style="font-weight: bold; text-decoration: underline;">PERSONAS MORALES: REFORMAS DEL ACTA:</div>
                            <div style="margin-top: 8px;">
                                <strong>FECHA:</strong> <span class="campo campo-mediano" contenteditable="true"></span> <strong>MOTIVO:</strong> <span class="campo campo-largo" contenteditable="true" style="min-width: 300px;"></span><br>
                                Notario público ante el cual se dio fe: <span class="campo campo-mediano" contenteditable="true"></span> Número <span class="campo campo-corto" contenteditable="true"></span> Lugar <span class="campo campo-mediano" contenteditable="true"></span> .<br>
                                <span style="font-size: 7pt;">(Ampliar según necesidades)</span>
                            </div>
                        </div>

                        <div style="border: 1px solid #000; padding: 12px; margin-bottom: 15px;">
                            <div style="font-weight: bold; text-decoration: underline;">NOMBRE DEL APODERADO O REPRESENTANTE LEGAL:</div>
                            <div style="margin-top: 8px;">
                                <span class="campo campo-largo" contenteditable="true" style="min-width: 350px;"></span><br>
                                Documento que acredita su personalidad y facultades: Núm. <span class="campo campo-corto" contenteditable="true"></span> fecha: <span class="campo campo-mediano" contenteditable="true"></span><br>
                                Notario público ante el cual fueron otorgadas: <span class="campo campo-mediano" contenteditable="true"></span> Número <span class="campo campo-corto" contenteditable="true"></span> lugar <span class="campo campo-mediano" contenteditable="true"></span> .<br>
                                <span style="font-size: 7pt;">(Ampliar según necesidades)</span>
                            </div>
                        </div>

                        <div style="text-align: center; font-weight: bold; margin: 20px 0 15px 0;">
                            PROTESTO LO NECESARIO
                        </div>

                        <div style="text-align: center; margin-top: 10px;">
                            <span class="campo campo-largo" contenteditable="true" style="min-width: 400px;"></span><br>
                            <span style="font-size: 7pt;">(Nombre completo sin abreviaturas y firma del representante legal de persona física o moral)</span>
                        </div>

                        <div style="margin-top: 15px; font-size: 7pt;">
                            NOTA: El presente formato podrá ser reproducido por cada licitante en el modo que estime conveniente, debiendo respetar su contenido, preferentemente en el orden indicado.
                        </div>

                        <div style="margin-top: 25px; text-align: center; font-size: 7pt;">
                            <strong>ANEXO 3</strong> · DATOS DEL OFERENTE · IRNP-001-2026
                        </div>

                        <div class="numero-pagina">3 DE 8</div>
                    </div>
                </div>

                <!-- ================= HOJA 4 ================= -->
                <!-- ANEXO 4 - PROPUESTA ECONÓMICA -->
                <div class="hoja">
                    <div class="contenido-hoja">

                        <div class="encabezado">
                            <strong>ANEXO 4</strong>
                        </div>

                        <div class="titulo">
                            PROPUESTA ECONÓMICA
                        </div>

                        <div style="text-align: center; margin-bottom: 12px; font-weight: bold;">
                            MUNICIPIO DE TEMASCALCINGO MÉXICO<br>
                            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL<br>
                            PROCEDIMIENTO DE INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL<br>
                            <span style="background: #f2f2f2; padding: 0 8px;">IRNP-001-2026</span><br>
                            PARA LA "<span style="background: #f2f2f2; padding: 0 8px;">ADQUISICIÓN DE EQUIPOS DE CÓMPUTO</span>"
                        </div>

                        <div style="font-size: 7pt; margin-bottom: 12px; text-align: center;">
                            PARTIDAS, DESCRIPCIÓN Y CANTIDAD DE BIENES A OFERTAR NO DEBERÁ MODIFICARSE CON PROPUESTAS
                            DIFERENTES, SALVO QUE LAS MODIFICACIONES SE DERIVEN DE LA JUNTA DE ACLARACIONES; DE LO
                            CONTRARIO SE DESECHARÁ LA PROPUESTA.
                        </div>

                        <div style="margin-bottom: 12px;">
                            <span style="font-weight: bold;">NOMBRE O RAZÓN SOCIAL DEL OFERENTE:</span>
                            <span class="campo campo-largo" contenteditable="true" style="min-width: 350px;"></span>
                        </div>

                        <!-- TABLA DE PROPUESTA ECONÓMICA (ANEXO 4) -->
                        <table style="font-size: 7pt;">
                            <thead>
                                <tr>
                                    <th style="width:6%;"># PARTIDA<br>ÚNICA</th>
                                    <th style="width:28%;">DESCRIPCIÓN DE LOS BIENES</th>
                                    <th style="width:9%;">UNIDAD DE MEDIDA</th>
                                    <th style="width:7%;">CANTIDAD</th>
                                    <th style="width:15%;">MARCA Y MODELO PROPUESTO</th>
                                    <th style="width:15%;">PRECIO UNITARIO</th>
                                    <th style="width:20%;">IMPORTE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:center;">1</td>
                                    <td style="font-size:6.5pt;">EQUIPO DE CÓMPUTO DE ESCRITORIO CON FACTOR DE FORMA TODO EN UNO (AIO), PANTALLA DE 23.8" FHD CON UN PROCESADOR DE 4 NÚCLEOS (4 P-CORES CON VELOCIDAD BASE DE 3.4 GHZ CON 12 MB DE CACHE), 16 GB EN MEMORIA RAM DDR5-4800, UNIDAD DE ESTADO SÓLIDO CON CAPACIDAD DE ALMACENAMIENTO DE 512 GB, UN PUERTO HDMI, UN PUERTO DISPLAYPORT, UN PUERTO DE RED GBE, CONECTIVIDAD WI-FI 6 Y SISTEMA OPERATIVO WINDOWS HOME EN ESPAÑOL).</td>
                                    <td style="text-align:center;">PIEZA</td>
                                    <td style="text-align:center;">15</td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">2</td>
                                    <td style="font-size:6.5pt;">EQUIPO DE CÓMPUTO PORTÁTIL (LAPTOP) DE 15.5" PARA PROGRAMACIÓN AVANZADA CON UN PROCESADOR DE 14 NÚCLEOS (6 P-CORES CON VELOCIDAD BASE DE 2.3 GHZ Y 8 E-CORES CON VELOCIDAD BASE DE 1.7 GHZ) CON 24 MB DE CACHE, 16 GB EN MEMORIA RAM DDR5-4800, PANTALLA FHD DE 15.5", UN DISCO DE ESTADO SÓLIDO CON CAPACIDAD DE 1 TB, CONECTIVIDAD WI FI 6 Y SISTEMA OPERATIVO WINDOWS PRO ÚLTIMA VERSIÓN LIBERADA EN ESPAÑOL.</td>
                                    <td style="text-align:center;">PIEZA</td>
                                    <td style="text-align:center;">4</td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">3</td>
                                    <td style="font-size:6.5pt;">EQUIPO DE CÓMPUTO DE ESCRITORIO CON FORMATO TIPO TORRE (TOWER) CON MONITOR DE 23.8" FHD, UN PROCESADOR DE 6 NÚCLEOS (6 P-CORES CON VELOCIDAD BASE DE 3.0 GHZ), 18 MB DE CACHE, 8 GB EN MEMORIA RAM DDR4-3200, UN DISCO DE ESTADO SÓLIDO M.2 CON CAPACIDAD DE 512 GB, WI FI 6 Y SISTEMA OPERATIVO WINDOWS HOME 11.</td>
                                    <td style="text-align:center;">PIEZA</td>
                                    <td style="text-align:center;">20</td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">4</td>
                                    <td style="font-size:6.5pt;">ESTACIÓN DE TRABAJO PORTATIL (LAPTOP WORKSTATION) PARA ACTIVIDADES DE DESARROLLO DE SOFTWARE CON UN PROCESADOR DE 12 NÚCLEOS (4 P-CORES CON VELOCIDAD BASE DE 2.2 GHZ, 8 E-CORES CON VELOCIDAD BASE DE 1.6 GHZ Y 18 MB DE CACHE), 16 GB DE MEMORIA RAM DDR5-5200, SSD CON CAPACIDAD DE ALMACENAMIENTO DE 512 GB, PANTALLA DE 16 PULGADAS CON RESOLUCIÓN WUXGA, TARJETA GRÁFICA DISCRETA INTERNA (GPU) CON 4GB GDDR6, CONECTIVIDAD WI FI 6E, BLUETOOTH 5.3 Y WINDOWS PRO ÚLTIMA VERSIÓN LIBERADA EN ESPAÑOL.</td>
                                    <td style="text-align:center;">PIEZA</td>
                                    <td style="text-align:center;">5</td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                    <td class="celda-editable" contenteditable="true"></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="text-align:right; font-weight:bold; border-top: 2px solid #000;">
                                        <span style="background: #f2f2f2; padding: 0 8px;">(MONTO CON LETRA 00/100 M.N.)</span>
                                    </td>
                                    <td style="border-top: 2px solid #000; font-weight:bold;">SUBTOTAL</td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right;"></td>
                                    <td style="font-weight:bold;">I.V.A.</td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right;"></td>
                                    <td style="font-weight:bold;">TOTAL</td>
                                </tr>
                            </tfoot>
                        </table>

                        <div style="margin-top: 15px;">
                            <div style="font-weight: bold;">a) FORMA Y LUGAR DE PAGO, EL PAGO SE REALIZARÁ A MÁS TARDAR DENTRO DE LOS 20 DÍAS HÁBILES SIGUIENTES A LA PRESENTACIÓN CORRECTA DE LA FACTURA EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL DE LA SIGUIENTE DOCUMENTACIÓN EN ORIGINAL Y COPIA:</div>
                            <div style="margin-left: 15px;">
                                <div style="margin-bottom: 4px;"><strong>b)</strong> EMITIRSE A NOMBRE DEL MUNICIPIO DE TEMASCALCINGO, CON DOMICILIO EN PLAZA BENITO JUAREZ, NÚMERO 01, COLONIA CENTRO, C.P. 50400, TEMASCALCINGO, MÉXICO, CON REGISTRO FEDERAL DE CONTRIBUYENTES MTM8501019R7.</div>
                                <div style="margin-bottom: 4px;"><strong>c)</strong> LAS FACTURAS DE LOS BIENES SUMINISTRADOS SE PRESENTARÁN CON LOS REQUISITOS FISCALES VIGENTES; ASÍ COMO EL ENVÍO DE LOS ARCHIVOS PDF Y XML, DICHOS ARCHIVOS DEBERÁN SER ENVIADOS AL CORREO ELECTRÓNICO <span style="background: #f2f2f2; padding: 0 6px;">adquisiciones@temascalcingo.gob.mx</span></div>
                                <div style="margin-bottom: 4px;"><strong>d)</strong> LAS FACTURAS DEBERÁN CONSIGNAR LA DESCRIPCIÓN DETALLADA DE LOS BIENES QUE AMPARAN, LOS PRECIOS UNITARIOS, TOTALES DE CADA PARTIDA Y EL IMPORTE TOTAL CON NÚMERO Y LETRA, DESGLOSANDO EL I.V.A.</div>
                                <div style="margin-bottom: 4px;"><strong>e)</strong> LOS DOCUMENTOS DEBIDAMENTE REQUISITADOS, MENCIONADOS EN LOS INCISOS ANTERIORES SERÁN ENTREGADOS POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL A LA TESORERÍA MUNICIPAL DENTRO DE LOS 10 DÍAS HÁBILES POSTERIORES A LA LIBERACIÓN DE LA REVISIÓN TÉCNICA Y LA PRESENTACIÓN DE LAS FACTURAS POR PARTE DEL PROVEEDOR ADJUDICADO.</div>
                                <div style="margin-bottom: 4px;"><strong>f)</strong> LOS ERRORES EN LAS FACTURAS Y LA FALTA DE ENTREGA DE ALGÚN DOCUMENTO PRORROGARÁN EN IGUAL TIEMPO Y PLAZO, HASTA SU CORRECCIÓN, PRESENTACIÓN Y LA ENTREGA DE LOS DOCUMENTOS DEL INCISO D) DE ESTE PUNTO.</div>
                            </div>
                        </div>

                        <div style="text-align: right; margin: 15px 0 20px 0;">
                            A <span class="campo campo-corto" contenteditable="true"></span> DE <span class="campo campo-mediano" contenteditable="true"></span> DE 2026
                        </div>

                        <div style="text-align: center; font-weight: bold; margin-bottom: 20px;">
                            BAJO PROTESTA DE DECIR VERDAD<br>
                            ATENTAMENTE
                        </div>

                        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                            <div style="width: 30%; text-align: center;">
                                <div style="border-top: 1px solid #000; padding-top: 8px;">
                                    <span class="campo campo-mediano" contenteditable="true" style="min-width: 160px;"></span><br>
                                    <span style="font-size: 7pt;">NOMBRE DEL REPRESENTANTE LEGAL</span>
                                </div>
                            </div>
                            <div style="width: 30%; text-align: center;">
                                <div style="border-top: 1px solid #000; padding-top: 8px;">
                                    <span class="campo campo-mediano" contenteditable="true" style="min-width: 160px;"></span><br>
                                    <span style="font-size: 7pt;">CARGO EN LA EMPRESA</span>
                                </div>
                            </div>
                            <div style="width: 30%; text-align: center;">
                                <div style="border-top: 1px solid #000; padding-top: 8px;">
                                    <span class="campo campo-mediano" contenteditable="true" style="min-width: 160px;"></span><br>
                                    <span style="font-size: 7pt;">FIRMA</span>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 25px; text-align: center; font-size: 7pt;">
                            <strong>ANEXO 4</strong> · PROPUESTA ECONÓMICA · IRNP-001-2026
                        </div>

                        <div class="numero-pagina">4 DE 8</div>
                    </div>
                </div>

                <!-- ================= HOJA 5 ================= -->
                <!-- HOJA DE CONTINUACIÓN / CONTRATO (CLÁUSULAS) -->
                <div class="hoja">
                    <div class="contenido-hoja">

                        <div style="text-align: center; font-weight: bold; margin-bottom: 18px; font-size: 10pt;">
                            CONTRATO DE ADQUISICIÓN
                        </div>

                        <div style="text-align: center; font-weight: bold; margin-bottom: 12px;">
                            <span class="campo campo-mediano" contenteditable="true" style="min-width: 250px;">IRNP-001-2026</span>
                        </div>

                        <div class="texto">
                            CONTRATO QUE CELEBRAN POR UNA PARTE EL MUNICIPIO CONSTITUCIONAL DE TEMASCALCINGO, MÉXICO,
                            REPRESENTADO EN ESTE ACTO POR LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU
                            CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL; <strong>C. RAMIRO GALINDO REYES</strong>,
                            SECRETARIO DEL AYUNTAMIENTO; <strong>C. JOSÉ HUMBERTO SÁNCHEZ HERNÁNDEZ</strong>,
                            COORDINADOR MUNICIPAL DE PROTECCIÓN CIVIL Y BOMBEROS Y ÁREA USUARIA; QUIÉN EN LO SUCESIVO Y
                            PARA LOS EFECTOS DEL PRESENTE SE LE DENOMINARÁ <strong>“EL MUNICIPIO”</strong>; Y POR OTRA
                            PARTE <strong><span class="campo campo-mediano" contenteditable="true"></span></strong>,
                            REPRESENTADO EN ESTE ACTO POR EL <strong><span class="campo campo-mediano" contenteditable="true"></span></strong> A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ
                            <strong>“EL PROVEEDOR”</strong>, AL TENOR DE LAS DECLARACIONES Y CLÁUSULAS SIGUIENTES:
                        </div>

                        <div class="subtitulo">DECLARACIONES</div>

                        <div class="texto"><strong>I. “EL MUNICIPIO” DECLARA:</strong></div>
                        <div class="texto">1. QUE CON ARREGLO A LO PREVISTO POR LOS ARTÍCULOS 115, DE LA CONSTITUCIÓN
                            POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS; 113, 116 , 123, Y 125, DE LA CONSTITUCIÓN POLÍTICA
                            DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, 31, FRACCIÓN XVIII, DE LA LEY ORGÁNICA MUNICIPAL DEL
                            ESTADO DE MÉXICO; ASÍ COMO LOS ARTÍCULOS 65, 66, 67, 68, 69, 70, 71, 72, 73, 74 Y 75 DE LEY
                            DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO EL 120, 123, 124, 125 Y
                            127 DEL REGLAMENTO; EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, TIENE LA ATRIBUCIÓN PARA CELEBRAR
                            EL PRESENTE CONTRATO.</div>
                        <div class="texto">2. QUE LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE
                            PRESIDENTA MUNICIPAL CONSTITUCIONAL, ESTÁ FACULTADA PARA CONOCER, OTORGAR Y SUSCRIBIR ESTE
                            CONTRATO.</div>
                        <div class="texto">3. QUE EL <strong>C. RAMIRO GALINDO REYES</strong>, EN SU CARÁCTER DE
                            SECRETARIO DEL AYUNTAMIENTO, EN TÉRMINOS DE LO QUE ESTABLECE EL ARTÍCULO 91 FRACCIÓN V DE LA
                            LEY ORGÁNICA MUNICIPAL, TIENE LA ATRIBUCIÓN DE VALIDAR CON SU FIRMA LOS DOCUMENTOS OFICIALES
                            EMANADOS DE “EL MUNICIPIO” Y DE CUALQUIERA DE SUS MIEMBROS.</div>
                        <div class="texto">4. LAS DEPENDENCIAS Y ENTIDADES DE LA ADMINISTRACIÓN PÚBLICA MUNICIPAL
                            CONDUCIRÁN SUS ACCIONES CON BASE A LOS PROGRAMAS ANUALES QUE ESTABLECE EL MUNICIPIO PARA EL
                            LOGRO DE SUS OBJETIVOS.</div>
                        <div class="texto">5. QUE TIENE ESTABLECIDO SU DOMICILIO EN <span class="campo campo-mediano" contenteditable="true"></span>, MISMO
                            QUE SE SEÑALA PARA LOS FINES Y EFECTOS LEGALES DEL PRESENTE INSTRUMENTO.</div>
                        <div class="texto">MANIFIESTA “EL MUNICIPIO” QUE TIENE EN SU HABER RECURSOS PECUNIARIOS
                            PROVENIENTES DE RECURSOS <strong><span class="campo campo-mediano" contenteditable="true"></span></strong> PARA LA <strong><span class="campo campo-mediano" contenteditable="true"></span></strong></div>
                        <div class="texto">6. CONFORME A CONTROL PRESUPUESTAL AUTORIZADO POR LA TESORERÍA MUNICIPAL.
                        </div>
                        <div class="texto">QUE LA ADJUDICACIÓN DEL CONTRATO SE REALIZÓ MEDIANTE PROCEDIMIENTO POR
                            <strong>LICITACIÓN PÚBLICA NACIONAL PRESENCIAL LPNP <span class="campo campo-corto" contenteditable="true"></span></strong>, DE CONFORMIDAD CON LOS
                            ARTÍCULOS 3, 26, 28, 29, 30 FRACCIÓN I, 32, 33, 35, 36 Y 37 DE LA LEY DE CONTRATACIÓN
                            PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, 61 Y67 FRACCIÓN IX DE SU RESPECTIVO REGLAMENTO;
                            ASÍ COMO EN LO ESTABLECIDO EN EL PUNTO 3.1 DE LAS BASES QUE SE EMITIERON PARA EL
                            PROCEDIMIENTO EN MENCIÓN.
                        </div>

                        <div style="margin-top: 25px; text-align: center; font-size: 7pt;">
                            CONTRATO · IRNP-001-2026 · ADQUISICIÓN DE EQUIPOS DE CÓMPUTO
                        </div>

                        <div class="numero-pagina">5 DE 8</div>
                    </div>
                </div>

                <!-- ================= HOJA 6 ================= -->
                <!-- CONTINUACIÓN CONTRATO -->
                <div class="hoja">
                    <div class="contenido-hoja">

                        <div class="texto"><strong>II. DE “EL PROVEEDOR”, BAJO PROTESTA DE DECIR VERDAD
                                DECLARA:</strong></div>
                        <div class="texto">1. QUE ES UNA EMPRESA CONSTITUIDA LEGALMENTE DE ACUERDO CON LAS LEYES DE
                            NUESTRO PAÍS, QUE, CON LA SUSCRIPCIÓN DEL PRESENTE CONTRATO, CUMPLE CON UNO DE LOS FINES
                            ESTABLECIDOS DENTRO DE SU OBJETO SOCIAL, SEGÚN LO ACREDITA CON <strong><span class="campo campo-largo" contenteditable="true"></span></strong>, QUE SU MISMA QUE CUENTA CON EL REGISTRO PÚBLICO DE COMERCIO NÚMERO <span class="campo campo-corto" contenteditable="true"></span> CON FECHA <span class="campo campo-largo" contenteditable="true"></span></div>
                        <div class="texto">2. QUE EL <strong><span class="campo campo-mediano" contenteditable="true"></span></strong>, EN SU CARÁCTER DE REPRESENTANTE LEGAL, COMO LO ACREDITA CON
                            <strong><span class="campo campo-largo" contenteditable="true"></span></strong>, ANTE LA FE DEL <span class="campo campo-mediano" contenteditable="true"></span>, NOTARIO PÚBLICO AUXILIAR DE LA NOTARÍA
                            PUBLICA NÚMERO TRECE TITULAR, DE LAS QUE ESTÁ EN EJERCICIO EN EL DISTRITO
                            JUDICIAL DE PUEBLA, CUYO TITULAR LO ES EL <span class="campo campo-mediano" contenteditable="true"></span> ACTUANDO EN SU PROTOCOLO Y CON SU
                            SELLO DE AUTORIZAR, EN EL ESTADO DE LA HEROICA PUEBLA DE ZARAGOZA, ESTADO DE PUEBLA, PUEBLA
                            MÉXICO, BAJO PROTESTA DE DECIR VERDAD, MANIFIESTA QUE CUENTA CON FACULTADES SUFICIENTES PARA
                            OBLIGAR A SU REPRESENTADA EN TÉRMINOS DEL PRESENTE CONTRATO, MISMAS QUE A LA FECHA NO LE HAN
                            SIDO LIMITADAS, MODIFICADAS O REVOCADAS, Y EN CASO CONTRARIO, ESTÁ ANUENTE EN QUEDAR
                            OBLIGADO A TÍTULO PERSONAL DE LOS COMPROMISOS CONTRAÍDOS POR SU REPRESENTADA Y SE IDENTIFICA
                            CON CREDENCIAL PARA VOTAR CON NÚMERO <strong><span class="campo campo-corto" contenteditable="true"></span></strong> EXPEDIDA POR EL INSTITUTO NACIONAL
                            ELECTORAL 
                        </div>
                        <div class="texto">3. QUE SU REGISTRO FEDERAL DE CONTRIBUYENTES ES <strong><span class="campo campo-corto" contenteditable="true"></span></strong>.</div>
                        <div class="texto">4. QUE CONOCE LAS ESPECIFICACIONES DEL PROCEDIMIENTO DE LICITACIÓN PÚBLICA
                            NACIONAL PRESENCIAL REFERENTE A LA <strong><span class="campo campo-mediano" contenteditable="true"></span></strong> QUE LLEVA A CABO EL MUNICIPIO DE
                            TEMASCALCINGO Y DEMÁS DOCUMENTOS QUE SE ENCUENTRAN INTEGRADOS AL EXPEDIENTE QUE SE FORMÓ CON
                            MOTIVO DEL PROCEDIMIENTO DE ADQUISICIÓN ANTES REFERIDO.</div>
                        <div class="texto">5. QUE CONOCE PLENAMENTE LAS DISPOSICIONES, QUE PARA EL CASO DE LA
                            CONTRATACIÓN DE SERVICIOS SE ESTABLECE EN LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS
                            MEXICANOS, LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, LA LEY DE
                            CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO SU RESPECTIVO REGLAMENTO.
                        </div>
                        <div class="texto">6. QUE BAJO PROTESTA DE DECIR VERDAD LA PERSONA QUE REPRESENTA NO SE
                            ENCUENTRA EN NINGUNO DE LOS SUPUESTOS QUE ESTABLECE EL ARTÍCULO 74 DE LA LEY DE CONTRATACIÓN
                            PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

                        <div class="texto"><strong>III. DE LAS “PARTES”</strong></div>
                        <div class="texto">1. QUE EN VIRTUD DE LAS DECLARACIONES QUE ANTECEDEN, Y UNA VEZ QUE SE HAN
                            RECONOCIDO SU CAPACIDAD Y PERSONALIDAD, CONVIENEN EXPRESAMENTE EN SUJETARSE A LAS
                            SIGUIENTES:</div>
                        <div class="texto"><strong>DEFINICIONES.</strong> “LAS PARTES” CONVIENEN QUE, PARA LOS EFECTOS
                            DEL PRESENTE CONTRATO, SE ENTENDERÁ POR:</div>
                        <div class="texto">1. LEY: LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                        <div class="texto">2. REGLAMENTO: EL REGLAMENTO DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE
                            MÉXICO Y MUNICIPIOS.</div>

                        <div class="subtitulo">CLÁUSULAS</div>

                        <div class="texto"><strong>PRIMERA. - OBJETO.</strong> “EL MUNICIPIO” ENCOMIENDA A “EL
                            PROVEEDOR” LLEVAR A CABO EL SUMINISTRO DE <strong><span class="campo campo-largo" contenteditable="true"></span></strong>.</div>

                        <div style="margin-top: 25px; text-align: center; font-size: 7pt;">
                            CONTRATO · IRNP-001-2026 · ADQUISICIÓN DE EQUIPOS DE CÓMPUTO
                        </div>

                        <div class="numero-pagina">6 DE 8</div>
                    </div>
                </div>

                <!-- ================= HOJA 7 ================= -->
                <!-- CONTINUACIÓN CONTRATO -->
                <div class="hoja">
                    <div class="contenido-hoja">

                        <div class="texto"><strong>SEGUNDA. -- IMPORTE.</strong> LA CANTIDAD TOTAL A PAGAR POR PARTE DE
                            “EL MUNICIPIO” SERÁ DE <strong>$<span class="campo campo-corto" contenteditable="true"></span> (<span class="campo campo-mediano" contenteditable="true"></span>) INCLUIDO EL
                                IMPUESTO AL VALOR AGREGADO I.V.A.</strong> PAGADO EN UNA SOLA EXHIBICIÓN.</div>
                        <div class="texto"><strong>TERCERA. - ANTICIPO.</strong> “EL MUNICIPIO” NO OTORGARÁ A “EL
                            PROVEEDOR” ANTICIPO ALGUNO, MOTIVO DEL PRESENTE CONTRATO.</div>
                        <div class="texto"><strong>CUARTA. - “LAS PARTES”</strong> CONVIENEN QUE LOS PRECIOS OFERTADOS
                            SERÁN FIJOS Y POR NINGÚN MOTIVO PODRÁN MODIFICARSE.</div>
                        <div class="texto"><strong>QUINTA:</strong> “LAS PARTES” ACUERDAN QUE EL PAGO POR LA <strong><span class="campo campo-largo" contenteditable="true"></span></strong> OBJETO DEL
                            PRESENTE CONTRATO, SE CUBRIRÁ DE LA MANERA SIGUIENTE:</div>
                        <div class="texto">I. “EL PROVEEDOR” ENTREGARÁ SU FACTURA A MÁS TARDAR A LOS DIEZ DÍAS HÁBILES
                            POSTERIORES A LA ENTREGA TOTAL DE LOS BIENES CON SU RESPECTIVO XML PARA TRÁMITE DE PAGO EN
                            LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN LAS INSTALACIONES DEL EX
                            SEMINARIO UBICADAS EN AV. DE LA PAZ ESQUINA MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO,
                            MÉXICO, C.P. 50400.</div>
                        <div class="texto">II. “EL MUNICIPIO” SE COMPROMETE Y OBLIGA A PAGAR LA CANTIDAD ANTES
                            MENCIONADA EN UNA SOLA EXHIBICIÓN, LA FACTURA SE ENTREGARÁ EN LA DIRECCIÓN DE ADMINISTRACIÓN
                            Y DESARROLLO DE PERSONAL.</div>
                        <div class="texto">III. “EL MUNICIPIO”, HARÁ EL PAGO A “EL PROVEEDOR”, MEDIANTE TRANSFERENCIA
                            ELECTRÓNICA.</div>
                        <div class="texto"><strong>SEXTA:</strong> PARA EL CUMPLIMIENTO DEL OBJETO DEL PRESENTE CONTRATO
                            “EL PROVEEDOR” SE OBLIGA A:</div>
                        <div class="texto">I. ENTREGAR A EL MUNICIPIO DE TEMASCALCINGO MÉXICO UNA AMBULANCIA, DERIVADO
                            DEL PROCEDIMIENTO DE LICITACIÓN PÚBLICA NACIONAL PRESENCIAL EN LOS TÉRMINOS PACTADOS DENTRO
                            DE LA CLÁUSULA PRIMERA DE ESTE INSTRUMENTO.</div>
                        <div class="texto">II. INFORMAR A “EL MUNICIPIO” DE CUALQUIER ANOMALÍA QUE SE PRESENTE DURANTE
                            LA EJECUCIÓN DEL PRESENTE CONTRATO, EN CUANTO IMPIDA O DIFICULTE LLEVAR A CABO EL SUMINISTRO
                            DEL PROCEDIMIENTO REFERENTE A LA <strong><span class="campo campo-mediano" contenteditable="true"></span></strong> COMUNICAR POR ESCRITO OPORTUNAMENTE A “EL
                            MUNICIPIO” CUALQUIER CAMBIO DE DOMICILIO.</div>
                        <div class="texto">III. CUMPLIR CON LAS DEMÁS OBLIGACIONES QUE DERIVEN DEL PRESENTE CONTRATO.
                        </div>
                        <div class="texto"><strong>SEPTIMA. TIEMPO Y LUGAR DE ENTREGA:</strong> LA ENTREGA SE LLEVARÁ A
                            CABO DENTRO DE LOS CUARENTA DÍAS HÁBILES POSTERIORES A LA FIRMA DEL PRESENTE CONTRATO EN LA
                            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, UBICADO EN AV. DE LA PAZ ESQ. MIGUEL
                            HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>

                        <div style="margin-top: 25px; text-align: center; font-size: 7pt;">
                            CONTRATO · IRNP-001-2026 · ADQUISICIÓN DE EQUIPOS DE CÓMPUTO
                        </div>

                        <div class="numero-pagina">7 DE 8</div>
                    </div>
                </div>

                <!-- ================= HOJA 8 ================= -->
                <!-- CONTINUACIÓN CONTRATO Y FIRMAS -->
                <div class="hoja">
                    <div class="contenido-hoja">

                        <div class="texto"><strong>OCTAVA. - DE LAS GARANTÍAS.</strong> “EL PROVEEDOR” DEBERÁ ENTREGAR A
                            “EL MUNICIPIO” LAS GARANTÍAS SIGUIENTES:</div>
                        <div class="texto">I. <strong>CUMPLIMIENTO DE CONTRATO:</strong> SE CONSTITUIRÁ POR EL 10% DEL
                            IMPORTE DEL SUBTOTAL DEL CONTRATO (SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO), DENTRO DE LOS
                            DIEZ DÍAS HÁBILES POSTERIORES A LA FIRMA DE CONTRATO EN CASO DE APLAZAR LA ENTREGA DE LOS
                            BIENES, POR LA CANTIDAD DE <strong>$<span class="campo campo-corto" contenteditable="true"></span> (<span class="campo campo-mediano" contenteditable="true"></span>)</strong> Y ESTARÁ
                            VIGENTE HASTA EL CUMPLIMIENTO DEL PRESENTE CONTRATO.</div>
                        <div class="texto">II. <strong>VICIOS OCULTOS:</strong> SE CONSTITUIRÁ POR EL 5% DEL IMPORTE DEL
                            SUBTOTAL DEL CONTRATO (SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO), DENTRO DE LOS CINCO DÍAS
                            HÁBILES POSTERIORES A LA ENTREGA TOTAL DE LOS BIENES, POR LA CANTIDAD DE <strong>$<span class="campo campo-corto" contenteditable="true"></span> (<span class="campo campo-mediano" contenteditable="true"></span>)</strong> Y ESTARÁ VIGENTE DURANTE UN AÑO.</div>
                        <div class="texto">III. LA FIANZA DEBERÁ CONTENER LAS SIGUIENTES DECLARACIONES EXPRESAS DE LA
                            AFIANZADORA: QUE LA FIANZA SE OTORGA EN LOS TÉRMINOS DEL PRESENTE CONTRATO.<br>
                            a. SE EMITIRÁ A NOMBRE DEL <strong>“MUNICIPIO DE TEMASCALCINGO MÉXICO”</strong><br>
                            b. QUE PARA CANCELAR LA FIANZA SERÁ REQUISITO INDISPENSABLE LA CONFORMIDAD EXPRESA Y POR
                            ESCRITO DE “EL MUNICIPIO”, QUIEN LO EMITIRÁ SOLO CUANDO “EL PROVEEDOR” HAYA CUMPLIDO UN AÑO
                            DE LA EMISIÓN DE ESTA.<br>
                            c. QUE LA INSTITUCIÓN AFIANZADORA ACEPTA EXPRESAMENTE LO PRECEPTUADO EN LOS ARTÍCULOS 93, 94
                            Y 118 DE LA LEY FEDERAL DE LAS INSTITUCIONES DE SEGUROS Y FIANZAS VIGENTE.<br>
                            d. QUE “EL MUNICIPIO” HARÁ EFECTIVA LA FIANZA A PARTIR DEL INCUMPLIMIENTO DE CUALQUIER
                            OBLIGACIÓN CONSIGNADA EN TODAS Y CADA UNA DE LAS CLÁUSULAS DEL PRESENTE CONTRATO, POR LA
                            CANTIDAD EN DINERO QUE SE ORIGINE.</div>

                        <div class="texto"><strong>NOVENA. - RESCISIÓN ORIGINADA POR LA NO PRESENTACIÓN DE LA
                                GARANTÍA.</strong> PARA EL CASO DE QUE “EL PROVEEDOR” NO PRESENTE LA GARANTÍA DESCRITA
                            EN LA FRACCIÓN I DE LA CLÁUSULA OCTAVA DEL PRESENTE CONTRATO, SE RESCINDIRÁ EL MISMO,
                            DEBIENDO PAGAR ÉSTE A “EL MUNICIPIO” LOS DAÑOS Y PERJUICIOS QUE ELLO LE OCASIONE, ASÍ COMO
                            LAS DEMÁS SANCIONES QUE EL PRESENTE CONTRATO ESTABLECE.</div>

                        <div class="texto"><strong>DÉCIMA.</strong> - “EL MUNICIPIO” PODRÁ INICIAR EL PROCEDIMIENTO DE
                            RESCISIÓN DEL PRESENTE CONTRATO, SIN RESPONSABILIDAD ALGUNA PARA ÉL, POR LAS SIGUIENTES
                            CAUSAS IMPUTABLES A “EL PROVEEDOR”:</div>
                        <div class="texto">I. NO ENTREGUE LA GARANTÍA ESTABLECIDA EN LA CLÁUSULA OCTAVA EN LOS PLAZOS
                            ESTIPULADOS.</div>
                        <div class="texto">II. SI “EL PROVEEDOR” NO DA LAS FACILIDADES NECESARIAS A LOS SUPERVISORES QUE
                            AL EFECTO DESIGNE “EL MUNICIPIO” PARA LLEVAR A CABO LA REVISIÓN DE LOS BIENES ADQUIRIDOS.
                        </div>
                        <div class="texto">III. SI “EL PROVEEDOR” CEDE, TRASPASA O SUBCONTRATA LA TOTALIDAD O PARTE DE
                            LOS BIENES ADQUIRIDOS SIN EL CONSENTIMIENTO POR ESCRITO DE “EL MUNICIPIO” Y SI CEDE A
                            TERCEROS EN FORMA PARCIAL O TOTAL LOS DERECHOS Y OBLIGACIONES, Y LOS DERECHOS DE COBRO
                            DERIVADOS DEL PRESENTE CONTRATO, SIN OBTENER LA AUTORIZACIÓN PREVIA POR ESCRITO DE “EL
                            MUNICIPIO”.</div>
                        <div class="texto">IV. SI ES DECLARADO EN PROCEDIMIENTO ADQUISITIVO MERCANTIL, QUIEBRA O
                            SUSPENSIÓN DE PAGOS, EN TÉRMINOS DE LO QUE ESTABLECE LA LEY DE PROCEDIMIENTO ADQUISITIVOS
                            MERCANTILES.</div>
                        <div class="texto">V. CAMBIE SU NACIONALIDAD MEXICANA POR OTRA.</div>
                        <div class="texto">VI. SIENDO EXTRANJERO INVOQUE LA PROTECCIÓN DE SU GOBIERNO EN RELACIÓN AL
                            PRESENTE CONTRATO.</div>
                        <div class="texto">VII. EN GENERAL, POR INCUMPLIMIENTO DE CUALESQUIERA DE LAS OBLIGACIONES
                            DERIVADAS DEL PRESENTE CONTRATO, EL CÓDIGO, EL REGLAMENTO, LOS TRATADOS Y DEMÁS
                            DISPOSICIONES APLICABLES.</div>
                        <div class="texto">VIII. POR CUALQUIER OTRA CAUSA IMPUTABLE A ÉL, SIMILAR A LAS ANTES
                            MENCIONADAS.</div>

                        <div style="margin-top: 25px; text-align: center; font-size: 7pt;">
                            CONTRATO · IRNP-001-2026 · ADQUISICIÓN DE EQUIPOS DE CÓMPUTO
                        </div>

                        <div class="numero-pagina">8 DE 8</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/portalProceso/AnexoEquipos.js"></script>


    <script>
        document.getElementById('btnGuardar').addEventListener('click', () => {
            const campos = document.querySelectorAll('[contenteditable="true"]');
            let datos = {};
            campos.forEach((campo, index) => {
                datos[`campo_${index}`] = campo.innerText.trim();
            });
            console.log(datos);
            alert('DOCUMENTO GUARDADO CORRECTAMENTE (simulación).');
        });
    </script>
</body>

</html>