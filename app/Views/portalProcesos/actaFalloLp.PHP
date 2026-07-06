<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acta de Fallo - Licitación Pública</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #e6e9ef;
            font-family: 'Century Gothic', 'Arial', sans-serif;
            padding: 30px 20px;
        }

        .barra-superior {
            max-width: 210mm;
            margin: 0 auto 20px auto;
            background: white;
            border-radius: 12px;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn {
            border: none;
            border-radius: 30px;
            padding: 8px 20px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
            background: #5e1b34;
            color: white;
        }

        .btn-volver {
            background: #6c757d;
        }

        .contenedor-documento {
            max-width: 210mm;
            margin: 0 auto;
        }

        .hoja {
            width: 210mm;
            min-height: 297mm;
            background: white;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 2.92cm 3cm 2.5cm 3cm;
            position: relative;
            page-break-after: always;
        }

        .contenido-hoja {
            font-size: 9pt;
            line-height: 1.45;
            text-transform: uppercase;
            font-family: 'Century Gothic', 'Arial', sans-serif;
        }

        .marca-agua {
            position: absolute;
            bottom: 30mm;
            right: 20mm;
            width: 400px;
            opacity: 0.04;
            pointer-events: none;
        }

        .encabezado-logo {
            font-weight: bold;
            font-size: 9pt;
            margin-bottom: 8px;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #999;
            padding-bottom: 5px;
        }

        .frase-anio {
            text-align: center;
            font-weight: bold;
            margin: 15px 0;
            font-size: 9pt;
        }

        .campo {
            display: inline-block;
            border-bottom: 1px solid #000;
            min-width: 100px;
            background: #ffff99;
            padding: 0 4px;
            font-weight: bold;
        }

        .campo-largo {
            min-width: 200px;
        }

        .campo-mediano {
            min-width: 130px;
        }

        .campo-corto {
            min-width: 70px;
        }

        [contenteditable="true"] {
            cursor: text;
            outline: none;
        }

        .clausula {
            margin: 12px 0;
        }

        .declaracion-item {
            margin-left: 20px;
            margin-bottom: 6px;
            text-align: justify;
        }

        .lista-decimal {
            margin-left: 35px;
        }

        /* TABLA DE PRODUCTOS ESTILO ACTA DE FALLO */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 9px 0;
            font-size: 7pt;
        }

        th,
        td {
            border: 1px solid black;
            padding: 4px 3px;
            vertical-align: middle;
            text-align: center;
        }

        th {
            background: #f0f0f0;
            font-weight: bold;
        }

        .celda-editable {
            background: #ffff99;
        }

        .fila-totales td {
            border: none;
            text-align: right;
            padding: 4px 8px;
        }

        .firma-recuadro {
            border: 1px solid black;
            padding: 12px;
            margin-top: 20px;
            width: 48%;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }

        .firma-linea {
            border-top: 1px solid black;
            margin-top: 35px;
            padding-top: 5px;
            font-weight: bold;
        }

        .clearfix {
            clear: both;
        }

        .numero-pagina {
            text-align: right;
            font-size: 8pt;
            margin-top: 25px;
        }

        .pie-contrato {
            font-size: 7pt;
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 8px;
        }

        .id-destacado {
            background: #e8f0fe;
            font-weight: bold;
            color: #1a56db;
            padding: 2px 4px;
            border-radius: 3px;
            font-size: 8pt;
        }

        /* ESTILOS PARA EL ACTA DE FALLO */
        .acta-titulo {
            text-align: center;
            font-weight: bold;
            font-size: 9pt;
            margin: 20px 0 10px 0;
            letter-spacing: 1px;
        }

        .acta-subtitulo {
            text-align: center;
            font-weight: bold;
            font-size: 9pt;
            margin: 5px 0 15px 0;
        }

        .acta-encabezado {
            font-weight: bold;
            font-size: 9pt;
            margin-bottom: 15px;
            text-align: center;
        }

        .acta-texto {
            text-align: justify;
            margin-bottom: 10px;
            font-size: 9pt;
        }

        .orden-dia {
            font-weight: bold;
            margin: 15px 0 10px 0;
            font-size: 10pt;
            text-align: center;
        }

        .orden-item {
            margin-left: 25px;
            margin-bottom: 4px;
            font-size: 9pt;
        }

        .dictamen-box {
            border: 1px solid black;
            padding: 15px;
            margin: 15px 0;
        }

        .dictamen-titulo {
            text-align: center;
            font-weight: bold;
            font-size: 9pt;
            margin-bottom: 10px;
        }

        .dictamen-texto {
            font-size: 9pt;
            text-align: justify;
            margin-bottom: 8px;
        }

        .adjudicacion-box {
            border: 1px solid black;
            padding: 10px;
            margin: 10px 0;
        }

        .adjudicacion-titulo {
            font-weight: bold;
            font-size: 9pt;
            text-align: center;
            margin-bottom: 5px;
        }

        .recomendaciones-box {
            border: 1px solid black;
            padding: 12px;
            margin: 10px 0;
        }

        .recomendaciones-titulo {
            font-weight: bold;
            font-size: 9pt;
            text-align: center;
            margin-bottom: 8px;
        }

        .recomendacion-item {
            margin-left: 15px;
            margin-bottom: 3px;
            font-size: 9pt;
        }

        .firma-acta {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
        }

        .firma-acta-item {
            width: 48%;
            border-top: 1px solid black;
            padding-top: 5px;
            text-align: center;
            font-weight: bold;
            font-size: 9pt;
        }

        /* Estilo para el cuadro de licitante en el acta */
        .licitante-box {
            border: 1px solid black;
            padding: 8px 15px;
            margin: 8px 0;
            text-align: left;
            font-weight: bold;
            font-size: 10pt;
        }

        .resaltado {
            background: #ffff99;
            padding: 0 4px;
        }

        .texto-uppercase {
            text-transform: uppercase;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .barra-superior {
                display: none;
            }

            .hoja {
                box-shadow: none;
                margin: 0;
                page-break-after: always;
            }
        }
    </style>
</head>

<body>

    <div class="barra-superior">
        <span style="font-weight:bold;">📄 ACTA DE FALLO - LICITACIÓN PÚBLICA</span>
        <div>
            <button class="btn btn-volver" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Regresar</button>
            <button class="btn" id="btnGuardar"><i class="fas fa-save"></i> Guardar</button>
        </div>
    </div>

    <div class="contenedor-documento">

        <!-- ========================================== -->
        <!-- HOJA 1: ACTA DE FALLO - INICIO Y ORDEN DEL DÍA -->
        <!-- ========================================== -->
        <div class="hoja">
            <div class="contenido-hoja">

                <div style="text-align: center; font-weight: bold; font-size: 9pt; margin: 8px 0 15px 0;">
                    <span style="border-bottom: 2px solid #000; padding-bottom: 2px;">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO”</span>
                </div>

                <div class="acta-titulo">ACTA DE FALLO</div>
                <div class="acta-subtitulo">DE LA LICITACIÓN PÚBLICA NACIONAL PRESENCIAL</div>

                <div style="text-align: center; font-size: 9pt; font-weight: bold; margin: 5px 0 10px 0;">
                    <span id="no_licitacion" class="campo campo-largo" contenteditable="true" style="font-size: 11pt;"></span>
                </div>

                <div style="text-align: center; font-size: 9pt; font-weight: bold; margin-bottom: 15px;">
                    PARA LA CONTRATACIÓN DEL "<span id="nombre_estudio" class="campo campo-largo" contenteditable="true" style="font-size: 10pt;"></span>"
                </div>

                <div class="acta-texto">
                    EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO SIENDO LAS <span id="created_at_hora2" class="campo campo-corto" contenteditable="true"></span> HORAS DEL DÍA <span id="created_at_texto2" class="campo campo-largo" contenteditable="true"></span>, EN EL ÁREA DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN EL EX SEMINARIO AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400, EL <span id="coordinador_acta" class="campo campo-largo" contenteditable="true"></span>, COORDINADOR DE <span id="area" class="campo campo-largo" contenteditable="true"></span> Y SERVIDOR PÚBLICO DESIGNADO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL Y EL <span id="nombre_proveedor_acta" class="campo campo-largo" contenteditable="true"></span>, EN SU CARÁCTER DE <span id="tipo_persona_acta" class="campo campo-chico" contenteditable="true"></span> PARA DAR CUMPLIMIENTO A LO ESTABLECIDO EN EL ARTÍCULO 38 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, 2 FRACCIÓN XXVI, 67 Y 89 FRACCIÓN XII, DE SU RESPECTIVO REGLAMENTO, EL ACTO SE DESARROLLARÁ CONFORME AL SIGUIENTE:
                </div>

                <div class="orden-dia">ORDEN DEL DÍA</div>
                <div class="orden-item">I. DECLARATORIA DEL INICIO DEL ACTO DE FALLO DE ADJUDICACIÓN;</div>
                <div class="orden-item">II. LECTURA DEL REGISTRO DEL PROVEEDOR INVITADO;</div>
                <div class="orden-item">III. LECTURA DEL DICTAMEN TÉCNICO EMITIDO POR EL COMITÉ DE ADQUISICIONES Y SERVICIOS;</div>
                <div class="orden-item">IV. FALLO DE ADJUDICACIÓN;</div>
                <div class="orden-item">V. RECOMENDACIONES GENERALES;</div>
                <div class="orden-item">VI. CLAUSURA DEL ACTO.</div>

                <div style="margin-top: 15px;">
                    <div style="font-weight: bold; font-size: 9pt;">I. EN DESAHOGO DEL PRIMER PUNTO DEL ORDEN DEL DÍA. -</div>
                    <div class="acta-texto" style="margin-left: 20px;">
                        SIENDO LAS <span id="created_at_hora3" class="campo campo-corto" contenteditable="true"></span> HORAS, EL C. <span id="coordinador_nombre" class="campo campo-largo" contenteditable="true"></span>, SERVIDOR PÚBLICO DESIGNADO, DECLARÓ INICIADO FORMALMENTE EL PRESENTE ACTO.
                    </div>

                    <div style="font-weight: bold; font-size: 9pt; margin-top: 10px;">II. EN DESAHOGO DEL SEGUNDO PUNTO DEL ORDEN DEL DÍA. -</div>
                    <div class="acta-texto" style="margin-left: 20px;">
                        EL SERVIDOR PÚBLICO DESIGNADO MANIFIESTA QUE SE TIENE PRESENTE AL LICITANTE <span id="nombre_proveedor_orden" class="campo campo-largo" contenteditable="true"></span>, EN SU CARÁCTER DE <span id="tipo_persona_orden" class="campo campo-chico" contenteditable="true"></span> QUIEN SE IDENTIFICA CON CREDENCIAL VIGENTE, NÚMERO DE FOLIO <span id="num_credencial_votar" class="campo campo-mediano" contenteditable="true"></span>, EXPEDIDA POR EL INSTITUTO NACIONAL ELECTORAL.
                    </div>

                    <div style="font-weight: bold; font-size: 9pt; margin-top: 10px;">III. EN DESAHOGO DEL TERCER PUNTO DEL ORDEN DEL DÍA. -</div>
                    <div class="acta-texto" style="margin-left: 20px;">
                        EL <strong><span id="coordinador_nombre2" class="campo campo-largo" contenteditable="true"></span></strong>, SERVIDOR PÚBLICO DESIGNADO PROCEDE A DAR LECTURA DEL DICTAMEN DE ADJUDICACIÓN EMITIDO POR EL COMITÉ DE ADQUISICIONES Y SERVICIOS DEL QUE SE DEDUCE LA ACEPTACIÓN DE LA PROPUESTA TÉCNICA, DOCUMENTACIÓN COMPLEMENTARIA Y PROPUESTA ECONÓMICA, PARA LA CONTRATACIÓN DEL "<span id="nombre_estudio_dictamen" class="campo campo-largo" contenteditable="true"></span>" A LOS LICITANTES PARTICIPANTES.
                    </div>
                </div>

                <div class="numero-pagina">1 DE 2</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 2: DICTAMEN, ADJUDICACIÓN Y RECOMENDACIONES -->
        <!-- ========================================== -->
        <div class="hoja">
            <img class="marca-agua" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Flor.svg/512px-Flor.svg.png">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div style="text-align: center; font-weight: bold; font-size: 9pt; margin: 8px 0 15px 0;">
                    “2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO”
                </div>

                <div style="font-weight: bold; font-size: 11pt; text-align: center; margin: 5px 0 10px 0;">
                    DICTAMEN
                </div>

                <div class="dictamen-texto">
                    <strong>PRIMERO:</strong> SE DICTAMINA POR UNANIMIDAD DE VOTOS DE LOS INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS, QUE ES DABLE ADJUDICAR EL CONTRATO PARA EL <strong>"<span id="nombre_estudio_dictamen2" class="campo campo-largo" contenteditable="true"></span>"</strong>, AL LICITANTE:
                </div>
<!-- TABLA DE LICITANTE CON ID -->
<table style="width: 100%; border-collapse: collapse; margin: 14px 0; font-size: 9pt; border: 1px solid black;">
    <thead>
        <tr>
            <th style="border: 1px solid black; padding: 4px 3px; vertical-align: middle; text-align: center; background: #f0f0f0; font-weight: bold;">
                LICITANTE
            </th>
        </tr>
    </thead>
    <tbody>
        <!-- PRIMERA FILA: ID -->
        <tr>
            <td style="border: 1px solid black; padding: 4px 3px; vertical-align: middle; text-align: left;">
                <div class="licitante-box" style="border: none; padding: 0; margin: 0;">
                    <span id="nombre_proveedor_dictamen" class="campo campo-largo" contenteditable="true" style="font-size: 9pt;"></span>
                </div>
            </td>
        </tr>
    </tbody>
</table>
                <div class="dictamen-texto">
                    <strong>SEGUNDO:</strong> ASÍ LO ACORDARON Y FIRMARON LOS INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS DEL MUNICIPIO DE TEMASCALCINGO, MÉXICO.
                </div>

                <div style="font-weight: bold; font-size: 10pt; margin-top: 10px;">IV. EN DESAHOGO DEL CUARTO PUNTO DEL ORDEN DEL DÍA. -</div>
                <div class="acta-texto" style="margin-left: 20px;">
                    EL <strong><span id="coordinador_nombre3" class="campo campo-largo" contenteditable="true">[coordinador]</span></strong>, SERVIDOR PÚBLICO DESIGNADO, INFORMA QUE, CON BASE EN EL DICTAMEN DE ADJUDICACIÓN EMITIDO POR EL COMITÉ DE ADQUISICIONES Y SERVICIOS, SE ADJUDICA EL CONTRATO NÚMERO: <strong>MTM/CAYS/PF/<span id="no_licitacion_adj" class="campo campo-mediano" contenteditable="true"></span></strong>, POR LAS PARTIDAS 1, 2, 3, 4, 5, 6 Y 7 PARA LA CONTRATACIÓN DEL <strong>"<span id="nombre_estudio_adj" class="campo campo-largo" contenteditable="true">[nombre_estudio]</span>"</strong> AL LICITANTE:
                </div>

                <!-- TABLA DE ADJUDICACIÓN -->
                <table style="margin: 10px 0; font-size: 8pt;">
                    <thead>
                        <tr>
                            <th style="width: 45%;">LICITANTE</th>
                            <th style="width: 25%;">PARTIDAS ADJUDICADAS</th>
                            <th style="width: 30%;">MONTO OFERTADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="celda-editable" contenteditable="true" style="font-weight: bold;">
                                <span id="nombre_proveedor_tabla" contenteditable="true">[nombre_proveedor]</span>
                            </td>
                            <td class="celda-editable" contenteditable="true">
                                <span id="partidas_adjudicadas_tabla" contenteditable="true">1, 2, 3, 4, 5, 6 Y 7</span>
                            </td>
                            <td class="celda-editable" contenteditable="true" style="font-weight: bold; color: #1a56db;">
                                $<span id="total" contenteditable="true"></span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="acta-texto">
                    DE ACUERDO CON LO ESTABLECIDO EN EL ARTÍCULO 89, FRACCIÓN III, DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, LA DESCRIPCIÓN DE LOS BIENES ADQUIRIDOS SON LOS SIGUIENTES:
                </div>

                <!-- TABLA DE PRODUCTOS COMPLETA -->
                <table id="tablaProductos" style="font-size: 6.5pt;">
                    <thead>
                        <tr>
                            <th style="width: 8%;">PARTIDA</th>
                            <th style="width: 30%;">DESCRIPCIÓN DE LOS BIENES</th>
                            <th style="width: 12%;">UNIDAD DE MEDIDA</th>
                            <th style="width: 10%;">CANTIDAD</th>
                            <th style="width: 15%;">MARCA Y MODELO OFERTADO</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- Los datos se cargarán dinámicamente con JavaScript -->
                    </tbody>
                </table>

                <div style="margin: 5px 0;">
                    <div style="font-size: 9pt;">
                        MONTO MÁXIMO A PAGAR ES DE: <span id="total_ganador_texto" class="campo campo-largo" contenteditable="true" style="font-size: 9pt;"></span>, <strong> EL IMPUESTO AL VALOR AGREGADO I.V.A.</strong>
                    </div>
                    <div style="font-size: 9pt;">
                        MONTO MÍNIMO A PAGAR ES DE: <span id="subtotal_ganador_texto" class="campo campo-largo" contenteditable="true" style="font-size: 9pt;"></span>, <strong>INCLUIDO EL IMPUESTO AL VALOR AGREGADO I.V.A.</strong>
                    </div>
                </div>

                <div style="font-weight: bold; font-size: 10pt; margin-top: 10px;">V. EN DESAHOGO DEL QUINTO PUNTO DEL ORDEN DEL DÍA. -</div>
                <div class="acta-texto" style="margin-left: 20px;">
                    SE DAN LAS SIGUIENTES RECOMENDACIONES GENERALES AL <span id="nombre_proveedor_rec" class="campo campo-largo" contenteditable="true">[nombre_proveedor]</span>, EN SU CARÁCTER DE <span id="tipo_persona_rec" class="campo campo-chico" contenteditable="true"></span>, MISMA QUE FORMA PARTE INTEGRAL DE LA CONTRATACIÓN POR LOS BIENES ADJUDICADOS:
                </div>

                <div style="font-weight: bold; font-size: 8.5pt;">LUGAR DE ENTREGA:</div>
                <div class="recomendacion-item">
                    EN LOS LUGARES ESTABLECIDOS POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, MISMOS QUE SERÁN DENTRO DEL MUNICIPIO DE TEMASCALCINGO, MÉXICO.
                </div>
                <div style="font-weight: bold; font-size: 8.5pt; margin-top: 5px;">PLAZO DE ENTREGA:</div>
                <div class="recomendacion-item">
                    DEL 10 DE FEBRERO AL <span id="created_at_texto1" class="campo campo-mediano" contenteditable="true"></span> Y DENTRO DE LOS HORARIOS ESTABLECIDOS POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.
                </div>

                <div style="font-weight: bold; font-size: 9pt; text-align: center; margin: 5px 0 10px 0;">CONDICIONES ECONÓMICAS PARA LA CONTRATACIÓN DE LOS SERVICIOS</div>
                <div class="recomendacion-item">
                    EL PAGO SE REALIZARÁ MEDIANTE TRANSFERENCIA ELECTRÓNICA EN LA TESORERÍA MUNICIPAL, A MÁS TARDAR 10 DÍAS HÁBILES POSTERIORES A LA EMISIÓN DE CADA FACTURA (S) CORRESPONDIENTE (S) Y DENTRO DE LOS HORARIOS ESTABLECIDOS POR LA TESORERÍA MUNICIPAL.
                </div>

                <div style="font-weight: bold; font-size: 9pt; text-align: center; margin: 5px 0 10px 0;">ANTICIPOS</div>
                <div class="recomendacion-item">NO SE OTORGARÁN ANTICIPOS</div>

                <div style="font-weight: bold; font-size: 9pt; margin-top: 9px;">DE LAS GARANTÍAS</div>
                <div class="acta-texto"><strong>CUMPLIMIENTO DE CONTRATO:</strong> EL LICITANTE ADJUDICADO DEBERÁ PRESENTAR LA GARANTÍA POR CUMPLIMIENTO DE CONTRATO MISMA QUE PODRÁ SER: CHEQUE DE CAJA, CHEQUE CERTIFICADO O FIANZA EMITIDA POR LAS AFIANZADORAS AUTORIZADAS DEL GOBIERNO DEL ESTADO DE MÉXICO; LA CUAL SE CONSTITUIRÁ POR EL DIEZ POR CIENTO (10%) DEL IMPORTE DEL SUBTOTAL DEL CONTRATO.
                </div>

                <div class="acta-texto">
                    LAS PROPUESTAS ADJUDICADAS GARANTIZAN LAS MEJORES CONDICIONES EN CUANTO A PRECIO, CALIDAD Y FINANCIAMIENTO, SIENDO EL LICITANTE <span id="nombre_proveedor_final" class="campo campo-largo" contenteditable="true">[nombre_proveedor]</span> QUIEN CUMPLIÓ CON TODOS LOS REQUISITOS SOLICITADOS EN LA LICITACIÓN PÚBLICA NACIONAL PRESENCIAL <span id="no_licitacion_final" class="campo campo-mediano" contenteditable="true">[no_licitacion]</span>.
                </div>

                <div class="acta-texto">
                    CON FUNDAMENTO EN LO PREVISTO POR EL ARTÍCULO 65 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, SE HACE DEL CONOCIMIENTO A EL LICITANTE <span id="nombre_proveedor_notif" class="campo campo-largo" contenteditable="true">[nombre_proveedor]</span> EN SU CARÁCTER DE <span id="tipo_persona_notif" class="campo campo-mediano" contenteditable="true">[tipo_persona]</span> A QUIEN LE HA SIDO ADJUDICADO EL CONTRATO PARA EL <strong>"<span id="nombre_estudio_notif" class="campo campo-largo" contenteditable="true">[nombre_estudio]</span>"</strong>, QUE DEBERÁ PRESENTARSE PARA FIRMAR EL MISMO EN LAS OFICINAS QUE OCUPA LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN EL EX SEMINARIO, AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400 UN DÍA POSTERIOR AL PRESENTE ACTO.
                </div>

                <div class="acta-texto" style="font-style: italic;">
                    LA PRESENTE ACTA SE TENDRÁ POR NOTIFICADA AL MOMENTO DE LA FIRMA, EN TÉRMINOS DE LO QUE ESTABLECEN LOS ARTÍCULOS 25 Y 26 DEL CÓDIGO DE PROCEDIMIENTOS ADMINISTRATIVOS VIGENTE EN EL ESTADO DE MÉXICO.
                </div>

                <div style="font-weight: bold; font-size: 9pt; text-align: center; margin: 5px 0 10px 0;">CLAUSURA DEL ACTO</div>
                <div class="acta-texto" style="margin-left: 20px;">
                    NO HABIENDO NINGÚN OTRO ASUNTO A CALIFICAR, SE PROCEDE A FIRMAR LA PRESENTE ACTA, SIENDO LAS <span id="created_at_hora1" class="campo campo-corto" contenteditable="true"></span> HORAS DEL DÍA DEL ACTO.
                </div>

<!-- FIRMAS -->
<div style="margin-top: 25px; display: flex; justify-content: space-between;">
    <!-- Columna izquierda: EL MUNICIPIO -->
    <div style="width: 48%; text-align: center;">
        <div style="font-weight: bold; font-size: 9pt; margin-bottom: 30px;">POR "EL MUNICIPIO"</div>
        <div style="margin-top: 40px;">
            <span id="coordinador_firma" class="campo campo-largo" contenteditable="true" style="font-size: 9pt; text-decoration: underline;"></span>
        </div>
        <div style="font-size: 9pt; margin-top: 2px;">
            <span id="area_firma" class="campo campo-largo" contenteditable="true" style="font-size: 9pt;"></span>
        </div>
    </div>

    <!-- Columna derecha: EL LICITANTE -->
    <div style="width: 48%; text-align: center;">
        <div style="font-weight: bold; font-size: 9pt; margin-bottom: 30px;">POR "EL LICITANTE"</div>
        <div style="margin-top: 40px;">
            <span id="nombre_proveedor_firma" class="campo campo-largo" contenteditable="true" style="font-size: 9pt; text-decoration: underline;">[nombre_proveedor]</span>
        </div>
        <div style="font-size: 9pt; margin-top: 2px;">
            PERSONA<span id="tipo_persona_firma" class="campo campo-chico" contenteditable="true" style="font-size: 9pt;">[tipo_persona]</span>
        </div>
    </div>
</div>

                <div class="numero-pagina">2 DE 2</div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/portalProceso/actaFalloLp.js"></script>
    <script>
        // Aquí puedes agregar el script para cargar los datos dinámicamente de la tabla de productos
        // si así lo deseas.
    </script>
</body>

</html>