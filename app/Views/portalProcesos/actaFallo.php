<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acta de Fallo</title>

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
            /* ===== MÁRGENES ACTUALIZADOS según imagen ===== */
            padding-top: 2.92cm;
            padding-bottom: 2.5cm;
            padding-left: 3cm;
            padding-right: 3cm;
            /* ============================================= */
            position: relative;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 9.5pt;
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
            font-size: 8.5pt;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 6px 8px;
            vertical-align: top;
        }

        table th {
            text-align: center;
            font-weight: bold;
            background: #f5f0eb;
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
                /* Márgenes para impresión */
                padding-top: 2.92cm;
                padding-bottom: 2.5cm;
                padding-left: 3cm;
                padding-right: 3cm;
            }

            .hoja:last-child {
                page-break-after: auto;
            }

            #total_texto {
                vertical-align: top;
                padding: 8px;
                font-weight: bold;
                white-space: normal;
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
                ACTA DE FALLO
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
                Acta de Fallo

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
                            “2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO”
                        </div>

                        <div class="titulo">
                            ACTA DE FALLO
                        </div>

                        <div class="subtitulo">
                            DE LA INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL
                            <br>
                            IRNP-<span id="no_licitacion" class="campo campo-chico" contenteditable="true"></span>
                            <br>
                            PARA LA “
                            <span id="nombre_estudio" class="campo campo-largo" contenteditable="true"></span>
                            ”
                        </div>

                        <div class="texto">
                            EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO SIENDO LAS
                            <span id="hora_estudio" class="campo campo-corto" contenteditable="true"></span>
                            HORAS DEL DÍA
                            <span id="fecha_estudio" class="campo campo-chico" contenteditable="true"></span>,
                            EN EL ÁREA DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL,
                            SITO EN EX SEMINARIO AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400,
                            SE REUNIÓ EL
                            <span id="coordinador" class="campo campo-mediano" contenteditable="true"></span>,
                            COORDINADOR DE <span id="area" class="campo campo-mediano" contenteditable="true"></span> Y SERVIDOR PÚBLICO DESIGNADO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL;
                            Y EL
                            <span id="representante_legal" class="campo campo-largo" contenteditable="true"></span>
                            APODERADO LEGAL DE
                            <span id="empresa" class="campo campo-largo" contenteditable="true"></span>;
                            PARA DAR CUMPLIMIENTO A LO ESTABLECIDO EN EL ARTÍCULO 38 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, 2 FRACCIÓN XXVI Y 89 DE SU RESPECTIVO REGLAMENTO, EL ACTO SE DESARROLLÓ CONFORME AL SIGUIENTE:
                        </div>

                        <div class="centrado" style="font-weight:bold; margin-top:15px;">
                            ORDEN DEL DÍA
                        </div>

                        <div class="orden-dia">
                            <div>I. DECLARATORIA DEL INICIO DEL ACTO DE FALLO DE ADJUDICACIÓN;</div>
                            <div>II. LECTURA DEL REGISTRO DEL PROVEEDOR INVITADO;</div>
                            <div>III. LECTURA DEL DICTAMEN TÉCNICO EMITIDO POR EL COMITÉ DE ADQUISICIONES Y SERVICIOS;</div>
                            <div>IV. FALLO DE ADJUDICACIÓN;</div>
                            <div>V. RECOMENDACIONES GENERALES;</div>
                            <div>VI. CLAUSURA DEL ACTO.</div>
                        </div>

                        <div class="texto">
                            <strong>I.</strong>
                            EN DESAHOGO DEL PRIMER PUNTO DEL ORDEN DEL DÍA. –
                            SIENDO LAS <span id="hora1" class="campo campo-corto" contenteditable="true"></span> HORAS,
                            EL
                            <span id="coordinador1" class="campo campo-mediano" contenteditable="true"></span>,
                            SERVIDOR PÚBLICO DESIGNADO, DECLARÓ INICIADO EL ACTO DE FALLO DE ADJUDICACIÓN.
                        </div>

                        <div class="texto">
                            <strong>II.</strong>
                            EN DESAHOGO DEL SEGUNDO PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO MANIFESTÓ QUE SE TUVO POR PRESENTE AL
                            <span id="representante_legal1" class="campo campo-largo" contenteditable="true"></span>
                            APODERADO LEGAL DE
                            <span id="empresa1" class="campo campo-largo" contenteditable="true"></span>,
                            QUIEN SE IDENTIFICÓ CON CREDENCIAL PARA VOTAR CON NÚMERO DE FOLIO
                            <span class="campo campo-mediano" contenteditable="true">4342077970999</span>,
                            EMITIDA POR EL INSTITUTO NACIONAL ELECTORAL.
                        </div>

                        <div class="texto">
                            <strong>III.</strong>
                            EN DESAHOGO DEL TERCER PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO, PROCEDIÓ A DAR LECTURA DEL DICTAMEN DE ADJUDICACIÓN
                            EMITIDO POR EL COMITÉ DE ADQUISICIONES Y SERVICIOS DEL QUE SE DEDUCE LA
                            ACEPTACIÓN DE LA PROPUESTA TÉCNICA, DOCUMENTACIÓN COMPLEMENTARIA Y LA
                            PROPUESTA ECONÓMICA, HACIENDO MENCIÓN QUE EN ELLAS SE CUMPLIÓ CON LOS
                            REQUISITOS SOLICITADOS EN LAS BASES.
                        </div>

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
                            <strong>IV.</strong>
                            EN DESAHOGO DEL CUARTO PUNTO DEL ORDEN DEL DÍA. –
                            EL SERVIDOR PÚBLICO DESIGNADO, INFORMÓ QUE, CON BASE EN EL DICTAMEN DE ADJUDICACIÓN
                            EMITIDO POR EL COMITÉ DE ADQUISICIONES Y SERVICIOS, SE ADJUDICA EL
                            CONTRATO NÚMERO: MTM/CAYS/PF/IRNP-
                            <span id="no_licitacion1" class="campo campo-mediano" contenteditable="true"></span>
                            PARA LA
                            “<span id="nombre_estudio1" class="campo campo-largo" contenteditable="true"></span>”
                            AL PROVEEDOR:
                        </div>

                        <div class="centrado" style="font-weight:bold; margin:10px 0;">
                            <span id="empresa2" class="campo campo-largo" contenteditable="true"></span>
                        </div>

                        <div class="texto">
                            DE ACUERDO CON LO ESTABLECIDO EN EL ARTÍCULO 89, FRACCIÓN III, DEL
                            REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.
                            LA DESCRIPCIÓN DE LOS BIENES ADQUIRIDOS SON LOS SIGUIENTES:
                        </div>

                        <!-- TABLA DE BIENES ADJUDICADOS -->
                        <table>
                            <thead>
                                <tr>
                                    <th style="width:10%;">PARTIDA ÚNICA</th>
                                    <th style="width:30%;">DESCRIPCIÓN DE LOS BIENES</th>
                                    <th style="width:12%;">UNIDAD DE MEDIDA</th>
                                    <th style="width:8%;">CANTIDAD</th>
                                    <th style="width:18%;">MARCA Y MODELO PROPUESTO</th>
                                    <th style="width:12%;">PRECIO UNITARIO</th>
                                    <th style="width:12%;">IMPORTE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Los datos se llenarán dinámicamente con JavaScript -->
                            </tbody>
                            <tfoot>
                                <!-- TOTAL EN TEXTO -->
                                <tr>
                                    <td colspan="5"
                                        id="total_texto"
                                        style="text-align:left;font-weight:bold;padding:10px;border-top:2px solid #000;">
                                    </td>

                                    <td style="text-align:right;font-weight:bold;border-top:2px solid #000;">
                                        SUBTOTAL
                                    </td>

                                    <td id="subtotal"
                                        style="text-align:right;font-weight:bold;border-top:2px solid #000;">
                                        $0.00
                                    </td>
                                </tr>

                                <!-- IVA -->
                                <tr>
                                    <td colspan="5"></td>

                                    <td style="text-align:right;font-weight:bold;">
                                        I.V.A.
                                    </td>

                                    <td id="iva"
                                        style="text-align:right;font-weight:bold;">
                                        $0.00
                                    </td>
                                </tr>

                                <!-- TOTAL -->
                                <tr>
                                    <td colspan="5"></td>

                                    <td style="text-align:right;font-weight:bold;">
                                        TOTAL
                                    </td>

                                    <td id="total"
                                        style="text-align:right;font-weight:bold;">
                                        $0.00
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="texto" style="margin-top:10px;">
                            MONTO A PAGAR CON RECURSOS DE PARTICIPACIONES FEDERALES DE 2026 ES DE:
                        </div>

                        <div class="centrado" style="font-weight:bold; font-size:11pt; margin:10px 0;">
                            <span id="total_texto1" class="campo campo-largo" contenteditable="true"></span>
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
                            <strong>V.</strong>
                            EN DESAHOGO DEL QUINTO PUNTO DEL ORDEN DEL DÍA. –
                            SE DAN LAS SIGUIENTES RECOMENDACIONES GENERALES AL
                            <span id="representante_legal2" class="campo campo-largo" contenteditable="true"></span>
                            APODERADO LEGAL DE
                            <span id="empresa3" class="campo campo-largo" contenteditable="true"></span>,
                            MISMAS QUE FORMARÁN PARTE INTEGRAL DE LA CONTRATACIÓN POR LA ADQUISICIÓN ADJUDICADA:
                        </div>

                        <div class="texto" style="font-weight:bold; margin-top:20px; text-align:center;" contenteditable="true">
                            CONDICIONES COMERCIALES DE LA ADQUISICIÓN DEL BIEN
                        </div>

                        <div class="texto">
                            <strong>LUGAR DE ENTREGA:</strong>
                        </div>
                        <div class="texto" style="margin-left:20px; margin-bottom:15px;">
                            EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, UBICADO EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.
                        </div>

                        <div class="texto">
                            <strong>PLAZO DE ENTREGA:</strong>
                        </div>
                        <div class="texto" style="margin-left:20px; margin-bottom:15px;">
                            A MÁS TARDAR 10 DÍAS HÁBILES POSTERIORES
                            A LA EMISIÓN DE CADA ORDEN DE COMPRA Y DENTRO DE LOS HORARIOS ESTABLECIDOS POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.
                        </div>

                        <div class="texto" style="font-weight:bold; margin-top:20px; text-align:center;" contenteditable="true">
                            CONDICIONES ECONÓMICAS PARA LA ADQUISICIÓN DE LOS BIENES
                        </div>

                        <div class="texto" style="margin-left:20px; margin-bottom:10px;">
                            CADA REQUERIMIENTO DE EQUIPO SERÁ SOLICITADO POR <strong>"EL MUNICIPIO"</strong>
                            MEDIANTE LA EMISIÓN DE LA ORDEN DE COMPRA CORRESPONDIENTE. UNA VEZ
                            REALIZADA LA ENTREGA DEL EQUIPO SOLICITADO, <strong>"EL PROVEEDOR"</strong> ENTREGARÁ
                            SU FACTURA A MÁS TARDAR A LOS
                            DIEZ DÍAS
                            HÁBILES POSTERIORES A LA ENTREGA DE LOS EQUIPOS SOLICITADOS CON SU RESPECTIVO XML PARA TRÁMITE DE PAGO EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN LAS INSTALACIONES DEL EX SEMINARIO UBICADAS EN AV. DE LA PAZ ESQUINA MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.
                        </div>

                        <div class="texto" style="font-weight:bold; margin-top:10px;">
                            ANTICIPOS
                        </div>
                        <div class="texto" style="margin-left:20px; margin-bottom:10px;">
                            NO SE OTORGARÁN ANTICIPOS
                        </div>

                        <div class="texto" style="font-weight:bold; margin-top:10px;">
                            DE LAS GARANTÍAS
                        </div>
                        <div class="texto" style="margin-left:20px; margin-bottom:5px;">
                            <strong>CUMPLIMIENTO DE CONTRATO:</strong> LA GARANTÍA SE CONSTITUIRÁ POR EL DIEZ POR CIENTO DEL IMPORTE TOTAL DEL CONTRATO, SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO
                        </div>
                        <div class="texto" style="margin-left:20px; margin-bottom:15px;">
                            <strong>DE VICIOS OCULTOS:</strong> LA GARANTÍA SE CONSTITUIRÁ POR EL CINCO POR CIENTO DEL IMPORTE TOTAL DEL CONTRATO, SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO (OBLIGATORIA DENTRO DE LOS CINCO DÍAS POSTERIORES A LA ENTREGA DE LOS BIENES OFERTADOS).
                        </div>

                        <div class="texto" style="font-weight:bold; margin-top:20px; text-align:center;" contenteditable="true">
                            GENERALIDADES
                        </div>

                        <div class="texto">
                            LAS PROPUESTAS ADJUDICADAS GARANTIZAN LAS MEJORES CONDICIONES EN CUANTO
                            A PRECIO, CALIDAD Y FINANCIAMIENTO,<span id="empresa4" class="campo campo-largo" contenteditable="true"></span>,
                            ES EL QUE CUMPLIÓ CON TODOS LOS REQUISITOS SOLICITADOS EN LA INVITACIÓN
                            RESTRINGIDA NACIONAL PRESENCIAL.
                        </div>

                        <div class="texto" style="margin-top:15px;">
                            CON FUNDAMENTO EN LO PREVISTO POR EL ARTÍCULO 65 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, SE HACE DEL CONOCIMIENTO QUE EL
                            <span id="representante_legal3" class="campo campo-largo" contenteditable="true"></span>
                            APODERADO LEGAL DE
                            <span id="empresa5" class="campo campo-largo" contenteditable="true"></span>,
                            A QUIEN LE HA SIDO ADJUDICADO EL CONTRATO DE ADQUISICIÓN DE BIENES, DEBERÁ PRESENTARSE
                            PARA LA FIRMA DEL CONTRATO CORRESPONDIENTE EN LAS OFICINAS QUE OCUPA LA
                            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN EL EX
                            SEMINARIO, AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO,
                            TEMASCALCINGO, MÉXICO, C.P. 50400, EL
                            <span id="fecha_estudio2" class="campo campo-mediano" contenteditable="true"></span>
                        </div>

                        <div class="texto" style="font-weight:bold; margin-top:20px; text-align:center;" contenteditable="true">
                            CLAUSURA DEL ACTO
                        </div>

                        <div class="texto">
                            NO HABIENDO NINGÚN OTRO ASUNTO A CALIFICAR, SE PROCEDE A FIRMAR LA
                            PRESENTE ACTA, SIENDO LAS
                            <span id="hora_estudio_texto" class="campo campo-mediano" contenteditable="true"></span>
                        </div>

                        <!-- FIRMAS -->
                        <div class="centrado" style="margin-top:30px; font-weight:bold;">
                            POR "EL MUNICIPIO"
                        </div>

                        <div class="firma-contenedor">

                            <div class="firma" style="width:100%;">
                                <div class="linea-firma" style="text-align:center;">
                                    <span id="coordinador2" class="campo campo-largo" contenteditable="true" style="display:inline-block; border-bottom:1px solid #000; padding-bottom:3px; min-width:250px; font-size:14px;"></span>
                                </div>
                                <div style="text-align:center;">
                                    COORDINADOR DE<span id="area1" class="campo campo-largo" contenteditable="true"></span>
                                </div>
                            </div>

                            <div style="clear:both;"></div>

                            <div class="centrado" style="margin-top:35px; font-weight:bold; text-align:center;">
                                POR "EL LICITANTE"
                            </div>

                            <div class="firma-contenedor" style="margin-top:20px;">

                                <div class="firma" style="width:100%;">
                                    <div class="linea-firma" style="text-align:center;">
                                        <span id="representante_legal4" class="campo campo-largo" contenteditable="true"></span>
                                    </div>
                                    <div style="text-align:center;">
                                        APODERADO LEGAL DE
                                        <br>
                                        <span id="empresa6" class="campo campo-largo" contenteditable="true"></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div style="clear:both;"></div>

                        <div class="pie" style="margin-top:30px;">
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
    <script src="../../public/js/portalProceso/actaFallo.js"></script>

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