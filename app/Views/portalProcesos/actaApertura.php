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
            font-family: 'Century Gothic', sans-serif;
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

        /* =========================================================
           DOCUMENTO
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
            padding: 20mm 18mm 18mm 18mm;
            position: relative;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 9pt;
            line-height: 1.6;
            text-align: justify;
            text-transform: uppercase;
        }

        .encabezado {
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
            margin-bottom: 18px;
        }

        .titulo {
            text-align: center;
            font-weight: bold;
            font-size: 13pt;
            margin-bottom: 5px;
        }

        .subtitulo {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .texto {
            margin-bottom: 12px;
        }

        .centrado {
            text-align: center;
        }

        .campo {
            display: inline-block;
            border-bottom: 1px solid #000;
            min-width: 100px;
            padding: 1px 4px;
            background: #fffceb;
            font-weight: bold;
            outline: none;
        }

        .campo[contenteditable="true"] {
            cursor: text;
        }

        .campo-corto {
            min-width: 70px;
        }

        .campo-mediano {
            min-width: 180px;
        }

        .campo-largo {
            min-width: 300px;
        }

        /* =========================================================
           TABLAS EDITABLES
        ========================================================= */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 18px;
            font-size: 9pt;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
            vertical-align: top;
        }

        table th {
            text-align: center;
            font-weight: bold;
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
            margin-top: 15px;
            margin-bottom: 18px;
            padding-left: 15px;
        }

        .orden-dia div {
            margin-bottom: 4px;
        }

        /* =========================================================
           FIRMAS
        ========================================================= */

        .firma-contenedor {
            width: 100%;
            margin-top: 50px;
        }

        .firma {
            width: 45%;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }

        .linea-firma {
            border-top: 1px solid #000;
            margin-top: 60px;
            padding-top: 8px;
            font-weight: bold;
        }

        .pie {
            margin-top: 20px;
            text-align: center;
            font-size: 8pt;
        }

        .numero-pagina {
            position: absolute;
            bottom: 10mm;
            right: 18mm;
            font-size: 8pt;
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
            }

            .hoja:last-child {
                page-break-after: auto;
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
    “2025. BICENTENARIO DE LA VIDA MUNICIPAL EN EL ESTADO DE MÉXICO”
</div>

<div class="titulo">
    ACTA DE PRESENTACIÓN Y APERTURA DE PROPUESTAS
</div>

<div class="subtitulo">
    DE LA LICITACIÓN PÚBLICA NACIONAL PRESENCIAL
    <br>
    LPNP-<span id="no_licitacion" class="campo campo-chico" contenteditable="true"></span>
    <br>
    PARA LA “
    <span id="nombre_estudio" class="campo campo-largo" contenteditable="true">COMPRA DE UNA AMBULANCIA PARA EL MUNICIPIO DE TEMASCALCINGO</span>
    ”
</div>

<div class="texto">
    EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO SIENDO LAS
    <span id="hora_estudio" class="campo campo-corto" contenteditable="true"></span>
    HORAS DEL DÍA DEL
    <span id="fecha_estudio" class="campo campo-chico" contenteditable="true"></span>,
    EN EL ÁREA DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL,
    SITO EN
    <span id="domicilio_fiscal" class="campo campo-largo" contenteditable="true"></span>,
</div>

<div class="texto">
    LOS C.C.
    <span id="coordinador" class="campo campo-mediano" contenteditable="true"></span>,
    COORDINADOR DE <span id="area" class="campo campo-mediano" contenteditable="true"></span> Y SERVIDOR PÚBLICO DESIGNADO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL;
    C. ELIZABETH MEJÍA PACHECO,
    CONTRALORA INTERNA MUNICIPAL;
    <span id="proveedor" class="campo campo-largo" contenteditable="true"></span>,
    REPRESENTANDO A LA EMPRESA TRANSACCIONES EN MERCADOS S.A.P.I. DE C.V.,
    QUIEN SE IDENTIFICA CON CREDENCIAL PARA VOTAR NÚMERO 1238061194269, EMITIDA POR EL INSTITUTO NACIONAL ELECTORAL;
    <span id="representante_legal" class="campo campo-largo" contenteditable="true"></span>,
    REPRESENTANDO A LA EMPRESA SERVICIOS Y ARRENDAMIENTOS GOB, S.A.P.I. DE C.V.,
    QUIEN SE IDENTIFICA CON CREDENCIAL PARA VOTAR NÚMERO <span id="num_credencial_representante" class="campo campo-largo" contenteditable="true"></span>, EMITIDA POR EL INSTITUTO NACIONAL ELECTORAL;
    Y FÉLIX GONZÁLEZ RODRÍGUEZ, REPRESENTANDO A LA EMPRESA CONSULTAS NACIONALES DE INFORMACIÓN Y ASESORIA S.A. DE C.V.,
    QUIEN SE IDENTIFICA CON CREDENCIAL PARA VOTAR NÚMERO 1835028912069, EMITIDA POR EL INSTITUTO NACIONAL ELECTORAL.
    Y CON FUNDAMENTO EN LO DISPUESTO POR LOS ARTÍCULOS 27, FRACCIÓN I, 35 FRACCIÓN I, 36, 43, 44 FRACCIÓN II, 45 Y 46 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, 82, 83, 84, 85 Y 86 DE SU RESPECTIVO REGLAMENTO; ASÍ COMO EN LO ESTABLECIDO EN EL PUNTO 3.1 DE LAS BASES CORRESPONDIENTES, SE LLEVA A CABO EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS DEL PROCEDIMIENTO DE INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL NÚMERO IR-<span id="no_licitacion1" class="campo campo-chico" contenteditable="true"></span> PARA LA “<span id="nombre_estudio1" class="campo campo-chico" contenteditable="true"></span>”.
</div>

<div class="centrado" style="font-weight:bold; margin-top:15px;">
    ORDEN DEL DÍA
</div>
                        <div class="orden-dia">

                            <div>I. DECLARATORIA DE INICIO DEL ACTO;</div>
                            <div>II. LECTURA AL REGISTRO DE ASISTENCIA AL ACTO DE LOS PARTICIPANTES;</div>
                            <div>III. DECLARATORIA DE ASISTENCIA DEL NÚMERO DE LICITANTES;</div>
                            <div>IV. PRESENTACIÓN DE PROPUESTAS TÉCNICAS Y ECONÓMICAS;</div>
                            <div>V. APERTURA DE PROPUESTAS TÉCNICAS;</div>
                            <div>VI. REVISIÓN CUANTITATIVA DE PROPUESTAS TÉCNICAS;</div>
                            <div>VII. DECLARATORIA DE ACEPTACIÓN O DESECHAMIENTO;</div>
                            <div>VIII. APERTURA DE PROPUESTAS ECONÓMICAS;</div>
                            <div>IX. REVISIÓN CUANTITATIVA DE LAS PROPUESTAS ECONÓMICAS;</div>
                            <div>X. DECLARATORIA DE ACEPTACIÓN O DESECHAMIENTO;</div>
                            <div>XI. LUGAR, FECHA Y HORA PARA LA COMUNICACIÓN DEL FALLO;</div>
                            <div>XII. ASUNTOS GENERALES.</div>

                        </div>

                        <div class="texto">

                            <strong>I.</strong>
                            EN DESAHOGO DEL PRIMER PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO EMITIÓ LA DECLARATORIA
                            DE INICIO DEL ACTO.

                        </div>

                        <div class="texto">

                            <strong>II.</strong>
                            EN DESAHOGO DEL SEGUNDO PUNTO DEL ORDEN DEL DÍA. –
                            SE REGISTRARON PUNTUALMENTE EN LA LISTA DE ASISTENCIA
                            LOS LICITANTES QUE SE CITAN A CONTINUACIÓN:

                        </div>

                        <!-- TABLA PARTICIPANTES -->

                        <table id="tabla_participantes">
                            <thead>
                                <tr>
                                    <th>EMPRESA</th>
                                    <th>REPRESENTANTE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Los datos se llenarán dinámicamente con JavaScript -->
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

                            <strong>III.</strong>
                            EN DESAHOGO DEL TERCER PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO, SOLICITÓ A LA REPRESENTANTE
                            DE LA CONTRALORÍA INTERNA MUNICIPAL VERIFICARA QUE SE CONTÓ
                            CON EL NÚMERO DE LICITANTES QUE EXIGE LA LEY PARA LA CELEBRACIÓN
                            DEL ACTO, POR LO QUE LA <strong>C. ELIZABETH MEJÍA PACHECO</strong>,
                            CONTRALORA INTERNA MUNICIPAL, MANIFIESTA QUE SE EXISTE CON EL
                            NÚMERO DE LICITANTES PARA LLEVAR A CABO EL PRESENTE ACTO.

                        </div>

                        <div class="texto">

                            A CONTINUACIÓN, EL SERVIDOR PÚBLICO DESIGNADO, PRECISÓ EL
                            OBJETIVO DEL ACTO, DESTACANDO QUE, DE CONFORMIDAD CON LO
                            DISPUESTO EN LOS ARTÍCULOS 35 FRACCIÓN I, 36 FRACCIONES III
                            Y V, Y 37 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE
                            MÉXICO Y MUNICIPIOS; 70 FRACCIONES XVIII Y XX, 87 FRACCIONES
                            I Y IV Y 88 DE SU RESPECTIVO REGLAMENTO; ENTRE LAS CAUSAS
                            POSIBLES DE DESECHAMIENTO DE LAS PROPUESTAS QUE SE PUDIERAN
                            ENCONTRAR, SERÍA EL INCUMPLIMIENTO CUANTITATIVO DE CUALQUIERA
                            DE LOS REQUISITOS O CONDICIONES ESTABLECIDOS EN LAS BASES
                            EMITIDAS, QUE AFECTE DIRECTAMENTE LA SOLVENCIA DE DICHAS PROPUESTAS.

                        </div>

                        <div class="texto">

                            <strong>IV.</strong>
                            EN DESAHOGO DEL CUARTO PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO, SOLICITÓ A LOS LICITANTES
                            HACER LA PRESENTACIÓN DE LOS SOBRES QUE CONTIENEN SU
                            <strong>PROPUESTA TÉCNICA Y ECONÓMICA</strong>, POR LO QUE
                            SOLICITÓ A LA REPRESENTANTE DE LA CONTRALORÍA INTERNA MUNICIPAL,
                            VERIFICARA QUE LOS SOBRES DE LAS PROPUESTAS TÉCNICAS Y ECONÓMICAS
                            DE LOS LICITANTES SE ENCONTRARAN DEBIDAMENTE SELLADAS Y FIRMADAS
                            POR LOS LICITANTES QUE SE PRESENTARON A ESTE ACTO. LA <strong>C. ELIZABETH MEJIA
                                PACHECO</strong>
                            CONTRALORA INTERNA MUNICIPAL VERIFICÓ QUE LOS SOBRES QUE CONTIENEN
                            LAS PROPUESTAS SE ENCONTRABÁN DEBIDAMENTE SELLADOS Y FIRMADOS
                            POR LOS LICITANTES.

                        </div>

                        <div class="texto">

                            <strong>V.</strong>
                            EN DESAHOGO DEL QUINTO PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO, NOMBRÓ A LAS EMPRESAS PARTICIPANTES,
                            A EFECTO DE QUE SUS REPRESENTANTES ACREDITADOS EN EL PRESENTE ACTO,
                            PRESENCIARÁN LA APERTURA DEL SOBRE QUE CONTIENE SU PROPUESTA TÉCNICA.

                        </div>

                        <!-- TABLA TECNICAS -->

                        <table id="tabla_tecnicas" class="w3-table-all">
                            <thead>
                                <tr>
                                    <th>EMPRESAS CON PROPUESTA TÉCNICA PRESENTADA</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyTecnicas">
                            </tbody>
                        </table>

                        <div class="texto">

                            <strong>VI.</strong>
                            EN DESAHOGO DEL SEXTO PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO EN CONJUNTO CON LA REPRESENTANTE
                            DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A VERIFICAR,
                            EN FORMA CUANTITATIVA, QUE LAS PROPUESTAS TÉCNICAS PRESENTADAS
                            CONTARAN CON LA DOCUMENTACIÓN SOLICITADA, POR LO QUE SE REALIZÓ
                            LA VERIFICACIÓN DE LA DOCUMENTACIÓN DE CADA LICITANTE PARTICIPANTE
                            DEJANDO EVIDENCIA EN EL LISTADO ANEXO AL PRESENTE.

                        </div>

                        <div class="texto">

                            <strong>VII.</strong>
                            EN DESAHOGO DEL SÉPTIMO PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO, ANUNCIÓ QUE SE ACEPTARON
                            PARA SU POSTERIOR <strong>ANÁLISIS Y EVALUACIÓN</strong>
                            DE LOS INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS,
                            LAS PROPUESTAS TÉCNICAS DE LOS LICITANTES, QUE SE CITAN A CONTINUACIÓN:

                        </div>

                        <table id="tabla_economicas" class="w3-table-all">
                            <thead>
                                <tr>
                                    <th>EMPRESA</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyEconomicas">
                            </tbody>
                        </table>

                        <div class="texto">

                            <strong>VIII.</strong>
                            EN DESAHOGO DEL OCTAVO PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO, NOMBRÓ A LAS EMPRESAS
                            CUYA PROPUESTA TÉCNICA FUERON ACEPTADAS EN VIRTUD DE
                            QUE CUMPLEN CUANTITATIVAMENTE, A EFECTO DE QUE SU
                            REPRESENTANTE PRESENCIARÁ LA APERTURA DEL SOBRE QUE
                            CONTIENE LA OFERTA ECONÓMICA.

                        </div>

                        <!-- TABLA ECONOMICAS -->

                        <table id="tabla_economicas" class="w3-table-all">
                            <thead>
                                <tr>
                                    <th>EMPRESA</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyEmpresa">
                            </tbody>
                        </table>

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

                            <strong>IX.</strong>
                            EN DESAHOGO DEL NOVENO PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO EN CONJUNTO CON LA
                            REPRESENTANTE DE LA CONTRALORÍA INTERNA MUNICIPAL
                            PROCEDIÓ A VERIFICAR, EN FORMA CUANTITATIVA, QUE LA
                            PROPUESTA ECONÓMICA PRESENTADA CONTENGA LA DOCUMENTACIÓN
                            REQUERIDA EN LAS BASES EMITIDAS, DE LO QUE RESULTÓ LO SIGUIENTE:

                        </div>

                        <table id="tabla_verificacion_economica" class="w3-table-all">
                            <thead>
                                <tr>
                                    <th>EMPRESA</th>
                                    <th>RESULTADO DE VERIFICACIÓN</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyCotizacion">
                            </tbody>
                        </table>

                        <div class="texto">

                            <strong>X.</strong>
                            EN DESAHOGO DEL DÉCIMO PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO EN CONJUNTO CON LA
                            REPRESENTANTE DE LA CONTRALORÍA INTERNA MUNICIPAL
                            ANUNCIARON QUE SE ACEPTARON PARA SU POSTERIOR
                            <strong>ANÁLISIS Y EVALUACIÓN</strong> LA PROPUESTA
                            ECONÓMICA PRESENTADAS Y CITADAS EN EL PUNTO ANTERIOR;
                            EN VIRTUD DE QUE CUMPLEN CUANTITATIVAMENTE CON LOS
                            REQUISITOS SOLICITADOS EN LAS BASES RESPECTIVAS.

                        </div>

                        <div class="texto">

                            <strong>XI.</strong>
                            EN DESAHOGO DEL DÉCIMO PRIMER PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO, INFORMÓ A LOS ASISTENTES
                            QUE EL FALLO DE ADJUDICACIÓN DEL PRESENTE PROCEDIMIENTO
                            ADQUISITIVO, SE DARÁ A CONOCER EL DÍA

                            <span id="fecha_estudio1" class=" campo campo-mediano" contenteditable="true">
                                
                            </span>

                            A LAS

                            <span id="hora_estudio1" class="campo campo-corto" contenteditable="true">
                               
                            </span>

                            HORAS EN LAS OFICINAS QUE OCUPA LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.

                        </div>

                        <div class="texto">

                            <strong>XII.</strong>
                            EN DESAHOGO DEL DÉCIMO SEGUNDO PUNTO DEL ORDEN DEL DÍA. –
                            ASUNTOS GENERALES, EL SERVIDOR PÚBLICO DESIGNADO, SOLICITÓ
                            A LA REPRESENTANTE DE LA CONTRALORÍA INTERNA MUNICIPAL, ASÍ
                            COMO A LOS LICITANTES INFORMEN SI TIENEN ALGÚN COMENTARIO
                            ADICIONAL AL RESPECTO DEL DESARROLLO DEL PRESENTE ACTO.
                            POR LO QUE NINGÚN LICITANTE TUVO COMENTARIO ALGUNO Y
                            FINALMENTE, SIN MEDIAR ALGÚN VICIO DE VOLUNTAD, EL SERVIDOR
                            PÚBLICO DESIGNADO, LA REPRESENTANTE DE LA CONTRALORÍA INTERNA
                            MUNICIPAL Y LOS LICITANTES, EXPRESARON SU CONSENTIMIENTO
                            RESPECTO DE LOS ASPECTOS DESAHOGADOS EN ESTE ACTO.
                            NO HABIENDO OTRO ASUNTO QUE TRATAR, EL SERVIDOR PÚBLICO
                            DESIGNADO PROCEDIÓ A DAR LECTURA EN VOZ ALTA AL CONTENIDO
                            DE LA PRESENTE ACTA Y DIO POR TERMINADO EL
                            <strong>ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS</strong>,
                            A LAS

                            <span id="fecha_cierre" class="campo campo-mediano" contenteditable="true">
                                DOCE HORAS CON OCHO MINUTOS DEL DÍA NUEVE DE JULIO DE DOS MIL VEINTICINCO
                            </span>,

                            FIRMADO AL MARGEN Y AL CALCE LOS SERVIDORES PÚBLICOS Y LOS
                            LICITANTES QUE EN ELLA INTERVINIERON, PARA SU DEBIDA CONSTANCIA LEGAL.

                        </div>

                        <!-- FIRMAS MUNICIPIO -->

                        <div class="centrado" style="margin-top:25px; font-weight:bold;">
                            POR EL MUNICIPIO
                        </div>

                        <div class="firma-contenedor">

                            <div class="firma">

                                <div class="linea-firma">
                                    C. PAULO SERGIO HERNÁNDEZ CUADRIELLO
                                </div>

                                COORDINADOR DE ADQUISICIONES Y SERVICIOS

                            </div>

                            <div class="firma" style="float:right;">

                                <div class="linea-firma">
                                    C. ELIZABETH MEJÍA PACHECO
                                </div>

                                CONTRALORA INTERNA MUNICIPAL

                            </div>

                        </div>

                        <div style="clear:both;"></div>

                        <!-- TABLA FIRMAS -->

                        <div class="centrado" style="margin-top:35px; font-weight:bold;">
                            POR LOS LICITANTES
                        </div>

                        <table id="tabla_firmas" class="w3-table-all">
                            <thead>
                                <tr>
                                    <th>EMPRESA</th>
                                    <th>REPRESENTANTE</th>
                                    <th>FIRMA</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyFirmas">
                                <tr>
                                    <td>Constructora ABC</td>
                                    <td>Juan Pérez García</td>
                                    <td style="height:60px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Ingenieros Asociados</td>
                                    <td>María López Martínez</td>
                                    <td style="height:60px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="pie">

                            LA PRESENTE ACTA SE FIRMA EN ORIGINAL,
                            EXPIDIÉNDOSE COPIA SIMPLE A QUIENES LA SUSCRIBIERON.

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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/portalProceso/actaApertura.js"></script>

    <script>

        /* =========================================================
           GUARDAR
        ========================================================= */

        document.getElementById('btnGuardar')
            .addEventListener('click', () => {

                const campos = document.querySelectorAll(
                    '[contenteditable="true"]'
                );

                let datos = {};

                campos.forEach((campo, index) => {

                    datos[`campo_${index}`] = campo.innerText.trim();

                });

                console.log(datos);

                alert('ACTA GUARDADA CORRECTAMENTE');

            });

    </script>

</body>

</html>