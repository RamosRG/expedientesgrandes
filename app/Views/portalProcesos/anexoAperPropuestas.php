
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acta de Presentación y Apertura de Propuestas</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #edf1f5;
            font-family: 'Century Gothic', 'Gothic', sans-serif;
            font-size: 8pt;
            padding: 25px;
            color: #000;
        }

        .contenedor-principal {
            max-width: 1450px;
            margin: auto;
        }

        /* =========================================================
           HEADER
        ========================================================= */

        .header-superior {
            background: linear-gradient(135deg, #5e1b34, #8b2c4a);
            border-radius: 22px;
            padding: 28px 35px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .header-superior h1 {
            font-size: 22pt;
            margin-bottom: 8px;
        }

        .header-superior p {
            font-size: 11pt;
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
            font-size: 11pt;
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
            font-size: 11pt;
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

        /* =========================================================
           DOCUMENTO - MÁRGENES APLICADOS
        ========================================================= */

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
            padding: 2.61cm 2.5cm 3cm 3cm;
            position: relative;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 8pt;
            line-height: 1.6;
            text-align: justify;
            text-transform: uppercase;
        }

        .encabezado {
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid #000;
            padding-bottom: 8px;
            margin-bottom: 14px;
            font-size: 8pt;
        }

        .titulo {
            text-align: center;
            font-weight: bold;
            font-size: 11pt;
            margin-bottom: 4px;
        }

        .subtitulo {
            text-align: center;
            font-weight: bold;
            margin-bottom: 16px;
            line-height: 1.5;
            font-size: 9pt;
        }

        .texto {
            margin-bottom: 8px;
            font-size: 8pt;
        }

        .centrado {
            text-align: center;
        }

        .campo {
            display: inline-block;
            border-bottom: 1px solid #000;
            min-width: 80px;
            padding: 1px 4px;
            background: #fffceb;
            font-weight: bold;
            outline: none;
            font-size: 8pt;
        }

        .campo[contenteditable="true"] {
            cursor: text;
        }

        .campo-corto {
            min-width: 60px;
        }

        .campo-mediano {
            min-width: 150px;
        }

        .campo-largo {
            min-width: 250px;
        }

        .campo-chico {
            min-width: 70px;
        }

        /* =========================================================
           TABLAS EDITABLES
        ========================================================= */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 12px;
            font-size: 8pt;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 5px 6px;
            vertical-align: top;
        }

        table th {
            text-align: center;
            font-weight: bold;
            font-size: 8pt;
        }

        /* TABLAS SIN BORDES PARA TÉCNICAS Y ECONÓMICAS */
        .tabla-sin-bordes {
            border: none !important;
        }

        .tabla-sin-bordes th,
        .tabla-sin-bordes td {
            border: none !important;
            padding: 3px 0px;
            text-align: left;
        }

        .tabla-sin-bordes thead {
            display: none;
        }

        .celda-editable {
            background: #fffceb;
            outline: none;
        }

        .celda-editable:focus {
            background: #fff7d6;
        }

        /* =========================================================
           ORDEN DEL DIA
        ========================================================= */

        .orden-dia {
            margin-top: 10px;
            margin-bottom: 12px;
            padding-left: 12px;
            font-size: 8pt;
        }

        .orden-dia div {
            margin-bottom: 2px;
        }

        /* =========================================================
           FIRMAS
        ========================================================= */

        .firma-contenedor {
            width: 100%;
            margin-top: 35px;
        }

        .firma {
            width: 45%;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }

        .linea-firma {
            border-top: 1px solid #000;
            margin-top: 50px;
            padding-top: 6px;
            font-weight: bold;
            font-size: 8pt;
        }

        .pie {
            margin-top: 15px;
            text-align: center;
            font-size: 7pt;
        }

        .numero-pagina {
            position: absolute;
            bottom: 2.5cm;
            right: 2.5cm;
            font-size: 7pt;
            font-weight: bold;
        }

        /* =========================================================
           PRINT
        ========================================================= */

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
                padding: 2.61cm 2.5cm 3cm 3cm;
            }

            .hoja:last-child {
                page-break-after: auto;
            }

        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media screen and (max-width: 800px) {
            .hoja {
                width: 100%;
                min-height: auto;
                padding: 1.5cm 1.2cm 1.8cm 1.5cm;
            }

            .contenido-hoja {
                font-size: 7pt;
            }

            .campo {
                min-width: 40px;
                font-size: 7pt;
            }

            .campo-mediano {
                min-width: 80px;
            }

            .campo-largo {
                min-width: 120px;
            }

            table {
                font-size: 7pt;
            }

            table th,
            table td {
                padding: 3px 4px;
            }

            .firma {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }

            .firma-contenedor .firma {
                float: none !important;
            }

            .linea-firma {
                margin-top: 30px;
            }

            .numero-pagina {
                position: static;
                text-align: right;
                margin-top: 15px;
            }

            .header-superior h1 {
                font-size: 16pt;
            }

            .titulo {
                font-size: 9pt;
            }

            .subtitulo {
                font-size: 7pt;
            }
        }

        @media screen and (max-width: 480px) {
            .hoja {
                padding: 1cm 0.8cm 1.2cm 1cm;
            }

            .barra-acciones {
                flex-direction: column;
                align-items: stretch;
            }

            .grupo-botones {
                flex-wrap: wrap;
                justify-content: center;
            }

            .btn {
                padding: 8px 16px;
                font-size: 9pt;
            }

            .breadcrumb {
                font-size: 9pt;
                text-align: center;
            }

            .header-superior {
                padding: 18px 20px;
            }

            .header-superior h1 {
                font-size: 13pt;
            }

            .campo {
                display: inline;
                border-bottom: none;
                background: none;
                font-weight: normal;
                min-width: auto;
            }

            .campo[contenteditable="true"] {
                border-bottom: 1px dashed #999;
                padding: 0 2px;
                background: #fffceb;
            }
        }
    </style>
</head>

<body>

    <div class="contenedor-principal">

        <!-- =========================================================
         HEADER
        ========================================================= -->

        <div class="header-superior">

            <h1>
                <i class="fas fa-file-signature"></i>
                ACTA DE PRESENTACIÓN Y APERTURA DE PROPUESTAS
            </h1>

            <p>
                Documento oficial del procedimiento adquisitivo
            </p>

        </div>

        <!-- =========================================================
         BARRA
        ========================================================= -->

        <div class="barra-acciones">

            <div class="breadcrumb">

                <a href="#">Inicio</a>
                /
                <a href="#">Procesos</a>
                /
                Acta de Apertura

            </div>

            <div class="grupo-botones">

                <button class="btn btn-volver" onclick="window.history.back();">
                    <i class="fas fa-arrow-left"></i>
                    Regresar
                </button>

                <button class="btn btn-guardar" id="btnGuardar">
                    <i class="fas fa-save"></i>
                    Imprimir Acta
                </button>

            </div>

        </div>

        <!-- =========================================================
         DOCUMENTO
        ========================================================= -->

        <div class="contenedor-documento">

            <div class="grupo-hojas">

                <!-- =====================================================
                 HOJA 1
                ====================================================== -->

                <div class="hoja">

                    <div class="contenido-hoja">

                        <div class="encabezado">
                            "2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO"
                        </div>

                        <div class="titulo">
                            ACTA DE PRESENTACIÓN Y APERTURA DE PROPUESTAS
                        </div>

                        <div class="subtitulo">
                            INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL
                            <br>
                            IRNP-<span id="no_licitacion" class="campo campo-chico" contenteditable="true"></span>
                            <br>
                            PARA LA "<span id="nombre_estudio" class="campo campo-largo" contenteditable="true"></span>"
                        </div>

                        <div class="texto">
                            EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO A LAS
                            <span id="hora_estudio" class="campo campo-corto" contenteditable="true"></span>
                            HORAS DEL DÍA
                            <span id="fecha_estudio" class="campo campo-chico" contenteditable="true"></span>,
                            EN EL ÁREA DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL,
                            SITO EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400,
                        </div>

                        <div class="texto" id="texto_participantes">
                            <!-- Este texto se llenará dinámicamente con JavaScript -->
                        </div>

                        <div class="centrado" style="font-weight:bold; margin-top:12px; font-size:8pt;">
                            ORDEN DEL DÍA
                        </div>

                        <div class="orden-dia">
                            <div>I. DECLARATORIA DE INICIO DEL ACTO;</div>
                            <div>II. LECTURA AL REGISTRO DE ASISTENCIA AL ACTO DE LOS PARTICIPANTES Y SERVIDORES PÚBLICOS INVITADOS;</div>
                            <div>III. DECLARATORIA DE ASISTENCIA DEL NÚMERO DE LICITANTES;</div>
                            <div>IV. PRESENTACIÓN DE PROPUESTAS TÉCNICAS Y ECONÓMICAS;</div>
                            <div>V. APERTURA DE PROPUESTAS TÉCNICAS;</div>
                            <div>VI. REVISIÓN CUANTITATIVA DE PROPUESTAS TÉCNICAS;</div>
                            <div>VII. DECLARATORIA DE ACEPTACIÓN O DESECHAMIENTO DE LAS PROPUESTAS TÉCNICAS;</div>
                            <div>VIII. APERTURA DE PROPUESTAS ECONÓMICAS;</div>
                            <div>IX. REVISIÓN CUANTITATIVA DE LAS PROPUESTAS ECONÓMICAS;</div>
                            <div>X. DECLARATORIA DE ACEPTACIÓN O DESECHAMIENTO DE LAS PROPUESTAS ECONÓMICAS;</div>
                            <div>XI. LUGAR, FECHA Y HORA PARA LA COMUNICACIÓN DEL FALLO;</div>
                            <div>XII. ASUNTOS GENERALES.</div>
                        </div>

                        <div class="texto">
                            <strong>I.</strong> <strong>EN DESAHOGO DEL PRIMER PUNTO DEL ORDEN DEL DÍA.</strong> – EL <span id="coordinador" class="campo campo-mediano" contenteditable="true"></span> SERVIDOR PÚBLICO DESIGNADO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL EN SU CARÁCTER DE CONVOCANTE EMITIÓ LA DECLARATORIA DE INICIO DEL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS DEL PRESENTE PROCEDIMIENTO ADQUISITIVO.
                        </div>

                        <div class="texto">
                            <strong>II.</strong> <strong>EN DESAHOGO DEL SEGUNDO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO REALIZÓ EL PASE DE LISTA DE LOS ASISTENTES, DANDO CUENTA QUE SE ENCONTRÓ PRESENTE LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL Y SE REGISTRARON PUNTUALMENTE EN LA LISTA DE ASISTENCIA LOS LICITANTES QUE SE CITAN A CONTINUACIÓN:
                        </div>

                        <table id="tabla_participantes">
                            <thead>
                                <tr>
                                    <th>LICITANTE</th>
                                    <th>REPRESENTANTE</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyParticipantes">
                                <!-- Los datos se llenarán desde JavaScript -->
                            </tbody>
                        </table>

                        <div class="numero-pagina">
                            1 DE 3
                        </div>

                    </div>

                </div>

                <!-- =====================================================
                 HOJA 2
                ====================================================== -->

                <div class="hoja">

                    <div class="contenido-hoja">

                        <div class="texto">
                            <strong>III.</strong> <strong>EN DESAHOGO DEL TERCER PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, HIZO MENCIÓN QUE AL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS SE PRESENTARON <span id="total_participantes" class="campo campo-corto" contenteditable="true"></span> DE <span id="total_invitados" class="campo campo-corto" contenteditable="true"></span> LICITANTES INVITADOS, POR LO QUE NO SE CUMPLIÓ CON EL NÚMERO DE LICITANTES QUE EXIGE LA LEY PARA LLEVAR A CABO EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS, DE IGUAL MANERA SE LLEVÓ A CABO EL ACTO ANTES MENCIONADO CON FUNDAMENTO EN EL ARTÍCULO 36 FRACCIÓN II DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, QUE A LA LETRA DICE:
                        </div>

                        <div class="texto" style="margin-left: 15px; font-style: italic; border-left: 2px solid #000; padding-left: 10px;">
                            <strong>ARTÍCULO 36.-</strong> EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS SE CELEBRARÁ DE MANERA PÚBLICA Y EN PRESENCIA DE TODOS LOS OFERENTES, EN LA FORMA SIGUIENTE:
                            <br>
                            I...
                            <br>
                            <strong><u>II. LA APERTURA DE PROPUESTAS PODRÁ EFECTUARSE CUANDO SE HAYA PRESENTADO UNA PROPUESTA CUANDO MENOS.</u></strong>
                            <br>
                            III, IV, V, VI, VII Y VIII.
                        </div>

                        <div class="texto">
                            <strong>IV.</strong> <strong>EN DESAHOGO DEL CUARTO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, SOLICITÓ A LOS LICITANTES HICIERAN LA PRESENTACIÓN DE LOS SOBRES QUE CONTENÍAN SUS <strong>PROPUESTAS TÉCNICAS Y ECONÓMICAS</strong>, POR LO QUE SOLICITÓ A LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, VERIFICARÁ QUE LOS SOBRES DE LAS PROPUESTAS TÉCNICAS Y ECONÓMICAS DE LOS LICITANTES SE ENCONTRARÁN DEBIDAMENTE SELLADOS Y FIRMADOS POR LO QUE, LA <strong>C. SINDY NAYÁN ALBARRÁN FERMÍN,</strong> SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL VERIFICÓ QUE ESTOS CUMPLIERAN CON LOS REQUISITOS ESTABLECIDOS.
                        </div>

                        <div class="texto">
                            <strong>V.</strong> <strong>EN DESAHOGO DEL QUINTO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, EN CONJUNTO CON LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A REALIZAR LA APERTURA DE LOS SOBRES QUE CONTENÍAN LAS PROPUESTAS TÉCNICAS.
                        </div>

                        <div class="texto">
                            <strong>VI.</strong> <strong>EN DESAHOGO DEL SEXTO PUNTO DEL ORDEN DEL DÍA.</strong> - EL SERVIDOR PÚBLICO DESIGNADO EN CONJUNTO CON LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A VERIFICAR EN FORMA CUANTITATIVA, QUE LAS PROPUESTAS TÉCNICAS PRESENTADAS CONTARAN CON LA DOCUMENTACIÓN SOLICITADA. IGUALMENTE, PRECISÓ EL OBJETIVO DEL <strong>ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS</strong>, DESTACANDO QUE, DE CONFORMIDAD CON LO DISPUESTO EN LOS ARTÍCULOS 35 FRACCIÓN I, 36 FRACCIONES III Y V, Y 37 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS; 70 FRACCIONES XVIII Y XX, 87 FRACCIONES I Y IV Y 88 DE SU RESPECTIVO REGLAMENTO; ENTRE LAS CAUSAS POSIBLES DE DESECHAMIENTO DE LAS PROPUESTAS QUE SE PUDIERAN ENCONTRAR, SERÍA EL INCUMPLIMIENTO CUANTITATIVO DE CUALQUIERA DE LOS REQUISITOS O CONDICIONES QUE AFECTE DIRECTAMENTE LA SOLVENCIA DE DICHAS PROPUESTAS, POR LO QUE SE REALIZÓ LA VERIFICACIÓN DE LA DOCUMENTACIÓN DE LOS LICITANTES PARTICIPANTES DEJANDO CONSTANCIA EN EL LISTADO ANEXO AL PRESENTE.
                        </div>

                        <div class="texto">
                            <strong>VII.</strong> <strong>EN DESAHOGO DEL SÉPTIMO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, ANUNCIÓ QUE SE ACEPTARON PARA SU <strong>ANÁLISIS Y EVALUACIÓN</strong> DE LOS INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS, ASÍ COMO DEL ÁREA USUARIA, LA PROPUESTA TÉCNICA Y DOCUMENTACIÓN COMPLEMENTARIA DE LOS LICITANTES QUE PRESENTARON SU PROPUESTA, MISMOS QUE SE CITAN A CONTINUACIÓN:
                        </div>

                        <table class="tabla-sin-bordes" id="tabla_tecnicas">
                            <thead>
                                <tr>
                                    <th>EMPRESA</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyTecnicas">
                                <!-- Los datos se llenarán desde JavaScript -->
                            </tbody>
                        </table>

                        <div class="texto">
                            <strong>VIII.</strong><strong> EN DESAHOGO DEL OCTAVO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, EN CONJUNTO CON LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A REALIZAR LA APERTURA DE LOS SOBRES QUE CONTENÍAN LAS PROPUESTAS ECONÓMICAS.
                        </div>

                        <div class="numero-pagina">
                            2 DE 3
                        </div>

                    </div>

                </div>

                <!-- =====================================================
                 HOJA 3
                ====================================================== -->

                <div class="hoja">

                    <div class="contenido-hoja">

                        <div class="texto">
                            <strong>IX.</strong> <strong>EN DESAHOGO DEL NOVENO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO EN CONJUNTO CON LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A VERIFICAR, EN FORMA CUANTITATIVA, QUE LAS PROPUESTAS ECONÓMICAS PRESENTADAS CONTARAN CON LA DOCUMENTACIÓN SOLICITADA, POR LO QUE SE REALIZÓ LA VERIFICACIÓN DE LA DOCUMENTACIÓN DE LOS LICITANTES PARTICIPANTES DEJANDO EVIDENCIA EN EL LISTADO ANEXO AL PRESENTE.
                        </div>

                        <div class="texto">
                            <strong>X.</strong> <strong>EN DESAHOGO DEL DÉCIMO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, ANUNCIÓ QUE SE ACEPTARON PARA SU <strong>ANÁLISIS Y EVALUACIÓN</strong> DE LOS INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS, ASÍ COMO DEL ÁREA USUARIA, LAS PROPUESTAS ECONÓMICAS DE LOS LICITANTES QUE PRESENTARON SU PROPUESTA, EN VIRTUD DE QUE CUMPLIERON CUANTITATIVAMENTE, CON LOS REQUISITOS ESTABLECIDOS, MISMOS QUE SE CITAN A CONTINUACIÓN:
                        </div>

                        <table class="tabla-sin-bordes" id="tabla_economicas">
                            <thead>
                                <tr>
                                    <th>EMPRESA</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyEconomicas">
                                <!-- Los datos se llenarán desde JavaScript -->
                            </tbody>
                        </table>

                        <div class="texto">
                            <strong>XI.</strong> <strong>EN DESAHOGO DEL DÉCIMO PRIMER PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, INFORMÓ A LOS ASISTENTES QUE EL FALLO DE ADJUDICACIÓN DEL PROCEDIMIENTO ADQUISITIVO, SE DARÍA A CONOCER EL DÍA <span id="fecha_fallo" class="campo campo-mediano" contenteditable="true"></span> DEL PRESENTE AÑO A LAS <span id="hora_fallo" class="campo campo-corto" contenteditable="true"></span> HORAS EN LA OFICINA QUE OCUPA LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.
                        </div>

                        <div class="texto">
                            <strong>XII.</strong> <strong>EN DESAHOGO DEL DÉCIMO SEGUNDO PUNTO DEL ORDEN DEL DÍA.</strong> – ASUNTOS GENERALES, EL SERVIDOR PÚBLICO DESIGNADO, SOLICITÓ A LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, ASÍ COMO A LOS LICITANTES INFORMAR SI TENÍAN ALGÚN COMENTARIO ADICIONAL AL RESPECTO SOBRE EL DESARROLLO DEL PRESENTE ACTO.</div>
                            <div class="texto">POR LO QUE NINGÚN ASISTENTE TUVO COMENTARIO ALGUNO Y FINALMENTE, SIN MEDIAR ALGÚN VICIO DE VOLUNTAD, EL SERVIDOR PÚBLICO DESIGNADO, LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL Y EL LICITANTE, EXPRESARON SU CONSENTIMIENTO RESPECTO A LOS ASPECTOS DESAHOGADOS EN EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS Y DIÓ POR TERMINADO EL ACTO EN MENCIÓN, A LAS <span id="hora_cierre" class="campo campo-mediano" contenteditable="true"></span>, FIRMADO AL MARGEN Y AL CALCE LOS SERVIDORES PÚBLICOS Y EL LICITANTE QUE EN ELLA INTERVINIERON, PARA SU DEBIDA CONSTANCIA LEGAL.
                        </div>

                        <div class="centrado" style="margin-top:12px; font-weight:bold; font-size:8pt;">
                            POR "EL MUNICIPIO"
                        </div>

                        <div class="firma-contenedor">
                            <div class="firma">
                                <div class="linea-firma">
                                    <span id="coordinador_firma"></span>
                                </div>
                                <span id="area_firma"></span>
                            </div>
                            <div class="firma" style="float:right;">
                                <div class="linea-firma">
                                    C. SINDY NAYÁN ALBARRÁN FERMÍN
                                </div>
                                SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL
                            </div>
                        </div>

                        <div style="clear:both;"></div>

                        <div class="centrado" style="margin-top:25px; font-weight:bold; font-size:8pt;">
                            POR "EL LICITANTE"
                        </div>

                        <table id="tabla_firmas">
                            <thead>
                                <tr>
                                    <th>LICITANTE</th>
                                    <th>REPRESENTANTE</th>
                                    <th>FIRMA</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyFirmas">
                                <!-- Los datos se llenarán desde JavaScript -->
                            </tbody>
                        </table>

                        <div class="pie">
                            LA PRESENTE ACTA SE FIRMA EN ORIGINAL, EXPIDIÉNDOSE COPIA SIMPLE A QUIENES LA SUSCRIBIERON.
                        </div>

                        <div class="numero-pagina">
                            3 DE 3
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/portalProceso/anexoAperCoordinador.js"></script>
</body>

</html>
