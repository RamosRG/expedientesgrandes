<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bases de Licitación - Papelería</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Century Gothic', 'Arial', sans-serif;
            /* Fuente global para todos los elementos */
        }

        body {
            background: #e6e9ef;
            font-family: 'Century Gothic', 'Arial', sans-serif;
            font-size: 9.5pt;
            padding: 30px 20px;
        }

        /* Contenedor global para forzar la fuente en todo el documento */
        .contenedor-documento,
        .contenedor-documento * {
            font-family: 'Century Gothic', 'Arial', sans-serif;
            font-size: 9.5pt;
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
            font-family: 'Century Gothic', 'Arial', sans-serif;
            font-size: 9.5pt;
        }

        .btn {
            border: none;
            border-radius: 30px;
            padding: 8px 20px;
            font-size: 9.5pt;
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
            padding: 18mm 15mm;
            position: relative;
            page-break-after: always;
            font-family: 'Century Gothic', 'Arial', sans-serif;
            font-size: 9.5pt;
        }

        .contenido-hoja {
            font-size: 9.5pt;
            line-height: 1.45;
            text-transform: uppercase;
            font-family: 'Century Gothic', 'Arial', sans-serif;
        }

        /* Ajuste para textos dentro de la hoja */
        .contenido-hoja * {
            font-size: 9.5pt;
            font-family: 'Century Gothic', 'Arial', sans-serif;
        }

        /* Excepción para encabezados o títulos que requieran tamaño mayor */
        .contenido-hoja .titulo-principal,
        .contenido-hoja .titulo-secundario {
            font-size: 11pt;
        }

        /* Forzar fuente en la barra superior y sus elementos */
        .barra-superior * {
            font-family: 'Century Gothic', 'Arial', sans-serif;
            font-size: 9.5pt;
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
            font-size: 9.5pt;
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
            font-size: 9.5pt;
        }

        .campo {
            display: inline-block;
            border-bottom: 1px solid #000;
            min-width: 100px;
            background: #d8ffbf;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 9.5pt;
            font-family: 'Century Gothic', 'Arial', sans-serif;
        }

        table * {
            font-size: 9.5pt;
            font-family: 'Century Gothic', 'Arial', sans-serif;
        }

        th,
        td {
            border: 1px solid black;
            padding: 6px 4px;
            vertical-align: top;
        }

        .celda-editable {
            background: #d8ffbf;
        }

        .fila-totales td {
            border: none;
            text-align: right;
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
            font-size: 9.5pt;
            margin-top: 25px;
            font-family: 'Century Gothic', 'Arial', sans-serif;
        }

        .pie-contrato {
            font-size: 9.5pt;
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 8px;
            font-family: 'Century Gothic', 'Arial', sans-serif;
        }

        .campo-dato {
            background: #d8ffbf;
            border-bottom: 1px solid #000;
            padding: 0 4px;
            font-weight: bold;
            display: inline-block;
            min-width: 100px;
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
        <span style="font-weight:bold; font-family:'Century Gothic',sans-serif; font-size:9.5pt;">📄 BASES LICITACIÓN PÚBLICA - PAPELERÍA</span>
        <div>
            <button class="btn btn-volver" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Regresar</button>
            <button class="btn" id="btnGuardar"><i class="fas fa-save"></i> Guardar</button>
        </div>
    </div>

    <div class="contenedor-documento" id="contenedorDocumento">
        <!-- ========================================== -->
        <!-- HOJA 1: GLOSARIO Y DECLARACIONES -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja1">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div style="text-align: center; font-weight: bold; font-size: 11pt; margin: 20px 0;">
                    BASES DE LA LICITACIÓN PÚBLICA NACIONAL PRESENCIAL<br>
                    LPNP-<span class="campo-dato" id="no_licitacion" contenteditable="true"></span>
                    <br>PARA EL "<span class="campo-dato" id="nombre_estudio_anexo13" contenteditable="true"></span>"
                </div>

                <div style="text-align: justify; font-weight: bold; margin-bottom: 15px;">
                    EL LICITANTE DEBERÁ APEGARSE DE MANERA ESTRICTA AL CONTENIDO DE LAS PRESENTES BASES, POR LO QUE SE RECOMIENDA LEERLAS CON DETENIMIENTO PARA EVITAR CUALQUIER OMISIÓN QUE PUDIERA DAR LUGAR A SU DESCALIFICACIÓN EN EL PROCEDIMIENTO.
                </div>

                <div style="border: 1px solid black; padding: 10px; margin-bottom: 15px;">
                    <div style="font-weight: bold; text-align: center;">BASES PARA PARTICIPAR EN LA LICITACIÓN PÚBLICA NACIONAL PRESENCIAL</div>
                    <div style="font-weight: bold; text-align: center;">NO. LPNP-<span class="campo-dato" id="no_licitacion2" contenteditable="true"></span></div>
                    <div style="font-weight: bold; text-align: center;">PARA EL "<span class="campo-dato" id="nombre_estudio_anexo14" contenteditable="true"></span>"</div>
                </div>

                <div style="text-align: justify; margin-bottom: 15px;">
                    EL MUNICIPIO DE TEMASCALCINGO, ESTADO DE MÉXICO, CON FUNDAMENTO EN LO DISPUESTO EN EL ARTÍCULO 134 DE LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS, 129 DE LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO; 1 FRACCIÓN III, 5, 15, 28 FRACCIÓN I, 29, 30 FRACCIÓN I, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41 Y 42 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS Y ARTÍCULO 2 FRACCIÓN VIII, XIV, 50, 61, 62, 66, 67, 68, 69, 70, 71 Y 72 DE SU RESPECTIVO REGLAMENTO Y DEMÁS DISPOSICIONES RELATIVAS Y APLICABLES, A TRAVÉS DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400, LLEVARÁ A CABO EL PROCEDIMIENTO DE <strong>LICITACIÓN PÚBLICA NACIONAL PRESENCIAL</strong> <strong>NÚMERO LPNP-<span class="campo-dato" id="no_licitacion3" contenteditable="true"></span></strong>, PARA EL <strong>"<span class="campo-dato" id="nombre_estudio_anexo15" contenteditable="true"></span>"</strong> CONFORME A LAS SIGUIENTES:
                </div>

                <div style="font-weight: bold; font-size: 11pt; text-align: center; margin: 15px 0;">BASES</div>
                <div style="font-weight: bold; text-align: center; margin-bottom: 15px;">GLOSARIO DE TÉRMINOS</div>
                <div style="text-align: justify; margin-bottom: 10px;">PARA EFECTO DE LAS PRESENTES BASES, SE ENTENDERÁ POR:</div>

                <!-- GLOSARIO DE TÉRMINOS - SIN LÍNEAS -->
                <div style="text-align: justify; margin-bottom: 10px;">PARA EFECTO DE LAS PRESENTES BASES, SE ENTENDERÁ POR:</div>

                <table style="border-collapse: collapse; width: 100%;">
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">ACUERDO</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">LA PRESENTE LICITACIÓN SERÁ DE CARÁCTER PRESENCIAL Y POSTERIORMENTE SE PUBLICARÁ EL PROCEDIMIENTO EN EL SISTEMA ELECTRÓNICO DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO DENOMINADO COMPRAMEX.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">ÁREA CONTRATANTE</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">LA FACULTADA PARA REALIZAR PROCEDIMIENTOS DE ADQUISICIÓN A EFECTO DE ADQUIRIR BIENES Y/O CONTRATAR SERVICIOS, EN ESTE CASO LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">ÁREA REQUIRENTE</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">ÁREA USUARIA QUE DE ACUERDO A SUS NECESIDADES SOLICITE O REQUIERA FORMALMENTE LA ADQUISICIÓN DE BIENES Y/O CONTRATACIÓN DE SERVICIOS, EN ESTE CASO LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">ÁREA TÉCNICA</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">LA RESPONSABLE DE LA ELABORACIÓN DE LAS ESPECIFICACIONES TÉCNICAS, DE LA EVALUACIÓN DE LAS PROPUESTAS TÉCNICAS, VERIFICANDO QUE CUMPLA CON LOS REQUISITOS SOLICITADOS EN LAS BASES Y LA RESPONSABLE DE DAR RESPUESTA A LAS DUDAS QUE SE PRESENTEN EN LA JUNTA DE ACLARACIONES SOBRE LOS ASPECTOS QUE REALICEN LOS LICITANTES.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">BASES</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">EL PRESENTE INSTRUMENTO DONDE SE ESTABLECEN Y DETALLAN LOS ASPECTOS LEGALES, ADMINISTRATIVOS, TÉCNICOS Y ECONÓMICOS, ASÍ COMO LA FORMA EN QUE SE DESARROLLARÁ EL PROCEDIMIENTO Y EN LA CUAL SE DESCRIBEN LOS REQUISITOS DE PARTICIPACIÓN PARA LA ADQUISICIÓN DE BIENES Y/O CONTRATACIÓN DE SERVICIOS.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">BIENES Y/O SERVICIOS</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">SE REFIERE AL BIEN Y/O SERVICIO ESPECIFICADO EN LA FICHA TÉCNICA DE LAS BASES DE LA LICITACIÓN PÚBLICA NACIONAL PRESENCIAL.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">CARÁCTER DE LA LICITACIÓN</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">NACIONAL PRESENCIAL Y NO CONTARÁ CON LA MODALIDAD DE SUBASTA INVERSA ELECTRÓNICA.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">OICM</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">ÓRGANO INTERNO DE CONTROL MUNICIPAL.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">COMITÉ</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">EL COMITÉ DE ADQUISICIONES Y SERVICIOS DEL MUNICIPIO DE TEMASCALCINGO, MÉXICO.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">CONTRATO</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">ACUERDO DE VOLUNTADES PARA CREAR O TRANSFERIR DERECHOS Y OBLIGACIONES A TRAVÉS DE LA CUAL SE FORMALIZA LA ADQUISICIÓN DE BIENES Y/O CONTRATACIÓN DE SERVICIOS.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">CONVOCANTE:</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">MUNICIPIO DE TEMASCALCINGO, MÉXICO.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">DOMICILIO:</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;"><span class="campo-dato" id="domicilio_proveedor" contenteditable="true">[domicilio_proveedor]</span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">EJERCICIO FISCAL</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;"><span class="campo-dato" id="ejercicio_fiscal" contenteditable="true">2026</span>.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">ESTUDIO DE MERCADO</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">A LA INVESTIGACIÓN, SUSTENTADA EN INFORMACIÓN PROVENIENTE DE FUENTES CONFIABLES Y SERIAS (INCLUYENDO PARÁMETROS INTERNACIONALES), QUE PERMITA TOMAR DECISIONES INFORMADAS SOBRE EL MEJOR PROCEDIMIENTO DE ADQUISICIÓN, ASÍ COMO DETERMINAR LOS PRECIOS DE REFERENCIA, EN TÉRMINOS DEL REGLAMENTO DE LA LEY.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">I.V.A.</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">IMPUESTO AL VALOR AGREGADO.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">LEY</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">REGLAMENTO</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">LICITANTE</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">PERSONA <span class="campo-dato" id="tipo_persona" contenteditable="true"></span> O JURÍDICO COLECTIVA QUE SE REGISTRE Y PARTICIPE EN EL PRESENTE PROCEDIMIENTO (QUE ACREDITE INTERÉS LEGAL POR HABER ADQUIRIDO LAS BASES DE LA LICITACIÓN).</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">MUNICIPIO</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">AYUNTAMIENTO Y ADMINISTRACIÓN PÚBLICA MUNICIPAL DE TEMASCALCINGO.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">OFERTA ECONÓMICA</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">LA PROPUESTA QUE CONTIENE PRECIOS DE LOS BIENES Y/O SERVICIOS SOLICITADOS, FORMULADOS Y PRESENTADOS, POR TODA PERSONA FÍSICA O MORAL QUE PARTICIPE EN EL PROCEDIMIENTO DE LICITACIÓN PÚBLICA.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">OFERTA TÉCNICA</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">LA PROPUESTA CON DOCUMENTACIÓN E INFORMACIÓN TÉCNICA DE LOS BIENES SOLICITADOS, FORMULADAS Y PRESENTADAS, POR TODA PERSONA FÍSICA O MORAL QUE PARTICIPE EN EL PROCEDIMIENTO DE LICITACIÓN PÚBLICA.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">OFICIO DE SOLICITUD</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">NO. OFICIO. MTM/DAYDP/<span class="campo-dato" id="no_licitacion4" contenteditable="true"></span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">OFICIO DE SUFICIENCIA</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">OFICIO NO. MTM/TM/<span class="campo-dato" id="no_licitacion5" contenteditable="true"></span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">ORIGEN DE LOS RECURSOS</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">PARTICIPACIONES FEDERALES (PF)</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">PARTIDA O CONCEPTO</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">CADA UNO DE LOS RENGLONES DE LOS BIENES Y/O SERVICIOS MENCIONADOS EN EL ANEXO 1 DE LAS BASES, LAS CUALES CONTIENEN SU NÚMERO PROGRESIVO, DESCRIPCIÓN, ESPECIFICACIONES, UNIDAD DE MEDIDA, REQUISITOS Y CANTIDAD SOLICITADA.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">PRECIO DE REFERENCIA</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">ES AQUEL QUE EL MUNICIPIO DE TEMASCALCINGO DETERMINE A PARTIR DE OBTENER EL PROMEDIO DE LOS PRECIOS OBTENIDOS EN EL ESTUDIO DE MERCADO.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">PRESENCIAL</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">EN LA CUAL LOS LICITANTES EXCLUSIVAMENTE PODRÁN PRESENTAR SU PROPUESTA EN FORMA PRESENCIAL, DOCUMENTAL Y POR ESCRITO, EN SOBRES CERRADOS, DURANTE EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">PROVEEDOR</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">PERSONA QUE CELEBRA CONTRATOS DE ADQUISICIÓN DE BIENES CON LA SECRETARÍA, LAS DEPENDENCIAS, ORGANISMOS AUXILIARES, TRIBUNALES ADMINISTRATIVOS O MUNICIPIOS.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">R.F.C.</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">REGISTRO FEDERAL DE CONTRIBUYENTES, EXPEDIDO POR EL S.A.T.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">S.A.T.</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">SERVICIO DE ADMINISTRACIÓN TRIBUTARIA.</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 30%; border: none; padding: 5px 10px 5px 0; vertical-align: top; text-align: justify;">TIPO DE GASTO</td>
                        <td style="border: none; padding: 5px 0; vertical-align: top; text-align: justify;">GASTO CORRIENTE.</td>
                    </tr>
                </table>

                <div class="numero-pagina">1 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 2: INFORMACIÓN Y CONDICIONES -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja2">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>1. INFORMACIÓN SOBRE LOS BIENES OBJETO DE ESTA LICITACIÓN.</strong></div>
                <div class="clausula"><strong>MEDIO QUE UTILIZARÁ LA LICITACIÓN Y CARÁCTER DE ESTA:</strong></div>
                <div class="declaracion-item">a) CON FUNDAMENTO EN LO QUE ESTABLECE EL ARTÍCULO 28, FRACCIÓN I DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, LA PRESENTE LICITACIÓN SERÁ PRESENCIAL, POR LO CUAL LOS LICITANTES EXCLUSIVAMENTE PRESENTARÁN SUS PROPUESTAS EN FORMA DOCUMENTAL Y POR ESCRITO, EN DOS SOBRES CERRADOS, DURANTE EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS, EN LAS INSTALACIONES DE LA CONVOCANTE, EL CUAL SE CELEBRARÁ EL DÍA, LA HORA Y EL LUGAR INDICADOS EN EL PUNTO TRES DE ESTAS BASES, CABE ACLARAR QUE <strong>NO</strong> SE RECIBIRÁN PROPUESTAS TÉCNICAS O ECONÓMICAS QUE SEAN ENVIADAS A TRAVÉS DEL SERVICIO POSTAL O DE MENSAJERÍA ANTES, DURANTE O DESPUÉS DEL DÍA Y LA HORA INDICADOS EN EL PUNTO TRES DE ESTAS BASES.</div>
                <div class="declaracion-item">b) LA PRESENTE LICITACIÓN SE REFIERE AL <strong>"<span class="campo-dato" id="nombre_estudio_anexo16" contenteditable="true"></span>"</strong> CUYAS ESPECIFICACIONES, UNIDAD DE MEDIDA, CANTIDADES Y REQUISITOS SE DETALLAN EN EL <strong>"ANEXO 1" (PROPUESTA TÉCNICA)</strong>, DE LAS PRESENTES BASES.</div>

                <div class="clausula"><strong>2. VIGENCIA DEL CONTRATO</strong></div>
                <div class="declaracion-item">a) <span class="campo-dato" id="vigencia_contrato" contenteditable="true">A PARTIR DEL 24 DE MARZO AL 31 DE DICIEMBRE DE 2026.</span></div>
                <div class="declaracion-item">b) EL MUNICIPIO NO AUTORIZA PRÓRROGAS INJUSTIFICADAS, NI CONDONACIÓN DE SANCIONES POR ATRASO DEL SUMINISTRO, CUANDO LAS CAUSAS SEAN IMPUTABLES AL PROVEEDOR.</div>

                <div class="clausula"><strong>3. LUGAR Y FORMA DE ENTREGA</strong></div>
                <div class="declaracion-item">a) LA ENTREGA DE LOS BIENES SE HARÁ BAJO LA RESPONSABILIDAD DEL LICITANTE QUE HAYA SIDO ADJUDICADO, QUIEN DEBERÁ GARANTIZAR SU ENTREGA ADECUADA EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN LAS INSTALACIONES DEL EX SEMINARIO UBICADAS EN AVENIDA DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400, CONFORME A LAS CONDICIONES Y REQUERIMIENTOS SOLICITADOS EN EL <strong>"ANEXO TÉCNICO"</strong> Y EN EL PLAZO SEÑALADO EN EL PUNTO 2 INCISO A) DE ESTAS BASES.</div>
                <div class="declaracion-item">b) DE RESULTAR QUE LOS BIENES NO REÚNAN LAS ESPECIFICACIONES Y REQUERIMIENTOS ESTABLECIDOS EN EL <strong>"ANEXO TÉCNICO"</strong> DE ESTAS BASES, O NO FUESEN PROPORCIONADOS EN EL PLAZO, TÉRMINO Y CONDICIONES REQUERIDAS, SE APLICARÁN LAS SANCIONES PROCEDENTES.</div>
                <div class="declaracion-item">c) LOS BIENES QUE SE ENTREGUEN, DEBERÁN SER DE CALIDAD, DEL TIPO, CARACTERÍSTICAS Y DEMÁS ASPECTOS DETERMINADOS POR EL ÁREA USUARIA, MISMOS QUE SE DETALLAN EN EL <strong>"ANEXO TÉCNICO"</strong> DE ESTAS BASES.</div>
                <div class="declaracion-item">d) EL PROVEEDOR ADJUDICADO SERÁ RESPONSABLE DE TODOS LOS GASTOS Y DE CUALQUIER GRAVAMEN FISCAL QUE SE ORIGINE POR CONCEPTO DE LA ENTREGA DE LOS BIENES CONFORME AL CONTRATO CORRESPONDIENTE.</div>
                <div class="declaracion-item">e) EL LICITANTE ADJUDICADO DEBERÁ ENTREGAR EL SUMINISTRO DE ARTÍCULOS DE PAPELERÍA A PARTIR DE LOS CINCO (5) DÍAS HÁBILES POSTERIORES A LA ENTREGA DE LA ORDEN DE COMPRA, MISMA QUE EMITIRÁ LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.</div>
                <div class="declaracion-item">f) EL DÍA DE LA ENTREGA, PERSONAL DEL ÁREA DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL; VERIFICARÁ, QUE ESTOS CUMPLAN CON LOS REQUISITOS QUE SE DEMANDAN EN ESTAS BASES Y EL CONTRATO RESPECTIVO. ASÍ MISMO, SERÁ NECESARIO QUE EL PROVEEDOR PRESENTE LOS SIGUIENTES DOCUMENTOS EN LA ENTREGA:</div>
                <div style="margin-left: 40px;">- CONTRATO (COPIA)</div>
                <div style="margin-left: 40px;">- REMESIÓN DE ENTREGA (ORIGINAL Y COPIA)</div>
                <div class="declaracion-item">g) EN LA ENTREGA, DEBERÁ ESTAR PRESENTE UN REPRESENTANTE DEL PROVEEDOR DEBIDAMENTE ACREDITADO PARA QUE ACOMPAÑE Y RESPALDE LA ENTREGA DE LOS BIENES.</div>
                <div class="declaracion-item">h) EL ÁREA USUARIA, A MÁS TARDAR DENTRO DE LOS 5 (CINCO) PRIMEROS DÍAS HÁBILES POSTERIORES A LA ENTREGA DE LOS BIENES, CONCLUIRÁN LA REVISIÓN DE LAS MISMOS, NOTIFICANDO AL PROVEEDOR LAS RESPECTIVAS OBSERVACIONES QUE SE DERIVEN. UNA VEZ QUE EL LICITANTE SOLVENTA LAS OBSERVACIONES ANTE EL ÁREA USUARIA Y ESTE ÚLTIMO OBTENGA LA LIBERACIÓN O EN CASO DE NO EXISTIR DICHAS OBSERVACIONES, EL LICITANTE CONTINUARÁ CON EL TRÁMITE DE SU (S) FACTURA (S) ANTE EL MUNICIPIO DE TEMASCALCINGO, MÉXICO.</div>
                <div class="declaracion-item">i) LOS GASTOS POR CONCEPTO DE PAGOS, TRASLADOS, FLETES, MANIOBRAS DE CARGA Y/O DESCARGA, ACARREO, SEGUROS, SINIESTROS, DEVOLUCIONES, LA INTEGRIDAD DEL OBJETO DEL CONTRATO U OTROS CONCEPTOS POR LA ENTREGA DE LOS BIENES, SERÁN A CARGO ÚNICA Y EXCLUSIVAMENTE DEL LICITANTE, RAZÓN POR LA CUAL EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, NO ACEPTARÁ CONDICIONES ADICIONALES A LA PROPUESTA.</div>
                <div class="declaracion-item">j) EL MUNICIPIO DE TEMASCALCINGO, MÉXICO CONSIDERARÁ LAS DEVOLUCIONES O LAS RESPECTIVAS OBSERVACIONES, QUE SE HAYAN EFECTUADO DERIVADAS DE LA REVISIÓN TÉCNICA, COMO INCUMPLIMIENTO DEL CONTRATO; POR LA QUE LA SITUACIÓN DE LOS BIENES O LAS SOLVENTACIONES RESPECTIVAS SE DEBERÁN EFECTUAR DENTRO DEL PLAZO DE ENTREGA, POR LO QUE EL PROVEEDOR ESTARÁ SUJETO A LO ESTABLECIDO EN EL PUNTO 10.2 DE LAS PRESENTES BASES.</div>
                <div class="declaracion-item">k) TRATÁNDOSE DE BIENES OFERTADOS, DE ALGUNA PARTIDA DEL "<strong>ANEXO 1"</strong>, QUE ESTÉN INTEGRADOS EN PAQUETE, KIT, PRINCIPALMENTE EN GRUPOS DE EQUIPOS O COMPONENTES COMO PERIFÉRICOS, ADICONALMENTE AGREGARÁN EL DESGLOSE DEL PRECIO UNITARIO DE LA PARTIDA, INDICANDO EL PRECIO UNITARIO DE CADA UNO DE LOS ELEMENTOS CON EL I.V.A., DESGLOSADO, DE APLICAR.</div>

                <div class="clausula"><strong>4. DESCRIPCIÓN DE LAS NORMAS QUE APLICAN</strong></div>
                <div class="declaracion-item">NO APLICA.</div>

                <div class="clausula"><strong>5. COSTO DE LAS BASES</strong></div>
                <div class="declaracion-item">a) LAS PRESENTES BASES TENDRÁN UN COSTO DE <strong><span class="campo-dato" id="total_letras4" contenteditable="true"></span> </strong></div>
                <div class="declaracion-item">b) UNA VEZ ADQUIRIDAS LAS BASES Y PREVIAMENTE A LA FECHA DE PRESENTACIÓN Y APERTURA DE PROPUESTAS, SE PODRÁ REALIZAR UNA REVISIÓN PRELIMINAR DE LA DOCUMENTACIÓN SOLICITADA, EXCEPTO DE LA RELATIVA A LA PROPUESTA TÉCNICA Y ECONÓMICA.</div>
                <div class="declaracion-item">c) LA REVISIÓN PRELIMINAR SE LLEVARÁ A CABO CON EL OBJETO DE VERIFICAR QUE LOS LICITANTES CUMPLAN CON LOS REQUISITOS DE LAS BASES.</div>
                <div class="declaracion-item">d) LA REVISIÓN SERÁ OPTATIVA PARA LOS LICITANTES Y NO SERÁ IMPEDIMENTO PARA PRESENTAR SU DOCUMENTACIÓN Y PROPOSICIONES DURANTE EL PROPIO ACTO DE PRESENTACIÓN DE PROPUESTAS.</div>

                <div class="clausula"><strong>6. CONDICIONES DE PAGO (FORMA Y LUGAR DE PAGO)</strong></div>
                <div class="declaracion-item">a) EL PAGO SE REALIZARÁ MEDIANTE TRANSFERENCIA ELECTRÓNICA EN LA TESORERÍA MUNICIPAL, DENTRO DE LOS 15 DÍAS HÁBILES POSTERIORES A LA PRESENTACIÓN DE LA FACTURA.</div>
                <div class="declaracion-item">b) EMITIRSE A NOMBRE DEL MUNICIPIO DE TEMASCALCINGO, CON DOMICILIO EN PLAZA BENITO JUAREZ, NÚMERO 01, COLONIA CENTRO, C.P. 50400, TEMASCALCINGO, MÉXICO, CON REGISTRO FEDERAL DE CONTRIBUYENTES MTM8501019R7.</div>
                <div class="declaracion-item">c) LAS FACTURAS DE LOS BIENES Y/O SERVICIOS SUMINISTRADOS Y/O PRESTADOS SE PRESENTARÁN CON LOS REQUISITOS FISCALES VIGENTES; ASÍ COMO EL ENVÍO DE LOS ARCHIVOS PDF Y XML, DICHOS ARCHIVOS DEBERÁN SER ENVIADOS AL CORREO ELECTRÓNICO adquisiciones@temascalcingo.gob.mx</div>
                <div class="declaracion-item">d) LAS FACTURAS DEBERÁN CONSIGNAR: LA DESCRIPCIÓN DETALLADA DE LOS BIENES SUMINISTRADOS QUE AMPARAN, LOS PRECIOS UNITARIOS, TOTALES DE CADA PARTIDA Y EL IMPORTE TOTAL CON NÚMERO Y LETRA, DESGLOSANDO EL I.V.A.</div>
                <div class="declaracion-item">e) LOS DOCUMENTOS DEBIDAMENTE REQUISITADOS, MENCIONADOS EN LOS INCISOS ANTERIORES SERÁN ENTREGADOS POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL A LA TESORERÍA MUNICIPAL DENTRO DE LOS 15 DÍAS HÁBILES POSTERIORES A LA LIBERACIÓN DE LA REVISIÓN TÉCNICA Y LA PRESENTACIÓN DE LAS FACTURAS POR PARTE DEL PROVEEDOR ADJUDICADO.</div>
                <div class="declaracion-item">f) LOS ERRORES EN LAS FACTURAS Y LA FALTA DE ENTREGA DE ALGÚN DOCUMENTO PRORROGARÁN EN IGUAL TIEMPO Y PLAZO, HASTA SU CORRECCIÓN, PRESENTACIÓN Y LA ENTREGA DE LOS DOCUMENTOS DEL INCISO D) DE ESTE PUNTO.</div>
                <div class="declaracion-item">g) EL LICITANTE QUE ASÍ LO DESEE PODRÁ PROPONER DESCUENTOS POR PRONTO PAGO, SIN EMBARGO, EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, PODRÁ ACEPTARLO O NO, EN FUNCIÓN DE SU DISPONIBILIDAD PRESUPUESTAL.</div>
                <div class="declaracion-item">h) EN EL PRESENTE PROCEDIMIENTO DE LICITACIÓN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, NO OTORGARÁ ANTICIPO ALGUNO.</div>
                <div class="declaracion-item">i) SERÁN PAGADOS DE ACUERDO CON LO ESTABLECIDO EN LAS DISPOSICIONES LEGALES VIGENTES EN LA MATERIA.</div>
                <div class="declaracion-item">j) EL MUNICIPIO DE TEMASCALCINGO, MÉXICO SÓLO PAGARÁ EL IMPUESTO AL VALOR AGREGADO, EL CUAL DEBERÁ ESTAR DESGLOSADO EN LA PROPUESTA ECONÓMICA CORRESPONDIENTE, PARA INCLUIRSE Y DETERMINAR EL PRECIO UNITARIO NETO.</div>

                <div class="numero-pagina">2 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 3: DOCUMENTACIÓN REQUERIDA -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja3">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>7. PODERES QUE DEBERÁN ACREDITAR Y ASÍ COMO LOS DOCUMENTOS QUE HABRÁN DE PRESENTAR.</strong></div>
                <div class="declaracion-item">a) CON OBJETO DE ACREDITAR SU PERSONALIDAD EN EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS TÉCNICAS Y ECONÓMICAS, EL LICITANTE DEBERÁ PRESENTAR EL FORMATO CONTENIDO EN EL <strong>"ANEXO 3"</strong>, EN EL QUE ACREDITE QUE CUENTA CON PODER PARA SUSCRIBIR LAS PROPUESTAS DEL PRESENTE PROCEDIMIENTO.</div>
                <div class="declaracion-item">b) LA DOCUMENTACIÓN QUE DEBERÁ ACOMPAÑAR A LA PROPUESTA TÉCNICA SERÁ LA SIGUIENTE:</div>

                <div style="margin-top: 10px;">
                    <table style="border-collapse: collapse; width: 100%;">
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 1</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PRESENTAR ESCRITO ELABORADO EN PAPEL MEMBRETADO DEL OFERENTE, EN EL CUAL <strong>INDIQUE EL NÚMERO TOTAL DE FOLIOS</strong> DE LOS QUE CONSTA SU PROPUESTA, [DICHA CARTA NO DEBERÁ ESTAR FOLIADA], LA PROPUESTA TÉCNICA DEBERÁ ESTAR FIRMADA AUTÓGRAFAMENTE POR EL PROPIETARIO O REPRESENTANTE LEGAL DE LA EMPRESA, <strong>LA TOTALIDAD DE LA PROPUESTA TÉCNICA DEBERÁ ESTAR IMPRESA Y FOLIADA DE MANERA CONSECUTIVA POR UNA SOLA CARA.</strong></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 2</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PRESENTAR PROPUESTA TÉCNICA DE LAS PARTIDAS, REQUISITANDO TODOS LOS DATOS SOLICITADOS EN EL PUNTO DE <strong>"PROPUESTA TÉCNICA"</strong>, LA CUAL DEBE CUMPLIR CON LA DESCRIPCIÓN Y ESPECIFICACIONES TÉCNICAS SOLICITADAS EN EL <strong>"ANEXO 1".</strong></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 3</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">COPIA SIMPLE, COMPLETA Y LEGIBLE DE LA <strong>IDENTIFICACIÓN VIGENTE</strong> (PASAPORTE VIGENTE, CREDENCIAL PARA VOTAR CON FOTOGRAFÍA VIGENTE O LICENCIA PARA CONDUCIR) DEL PROPIETARIO O REPRESENTANTE LEGAL DE LA EMPRESA; Y EN SU CASO, DE LA PERSONA QUE REPRESENTARÁ A LA EMPRESA EN EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS, LA CUAL DEBERÁ PRESENTAR EL <strong>"ANEXO 3"</strong> DEBIDAMENTE REQUISITADO.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 4</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">COPIA SIMPLE, COMPLETA Y LEGIBLE DE LA CÉDULA DE IDENTIFICACIÓN FISCAL Y CONSTANCIA DE SITUACIÓN FISCAL; ASÍ COMO PRESENTAR ESCRITO BAJO PROTESTA DE DECIR VERDAD, DE ESTAR AL CORRIENTE EN LAS DECLARACIONES DE IMPUESTOS Y EN EL CUMPLIMIENTO DE SUS OBLIGACIONES FISCALES Y, ANEXAR LA OPINIÓN POSITIVA DEL SAT.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 5</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">COPIA CERTIFICADA Y COPIA SIMPLE, COMPLETA Y LEGIBLE DE LOS <strong>ESTADOS FINANCIEROS BÁSICOS</strong> (ESTADO DE POSICIÓN FINANCIERA) AL MES DE FEBRERO DE 2026, CONFORME A LA NORMAS DE INFORMACIÓN FINANCIERA EMITIDAS POR EL CONSEJO MEXICANO PARA LA INVESTIGACIÓN Y DESARROLLO DE NORMAS DE INFORMACIÓN FINANCIERA, LOS CITADOS ESTADOS FINANCIEROS DEBERÁN ESTAR FIRMADOS POR CONTADOR PÚBLICO INTERNO O EXTERNO, POR LO QUE DEBERÁN ANEXAR ORIGINAL O COPIA CERTIFICADA Y COPIA SIMPLE COMPLETA Y LEGIBLE DE LA CÉDULA PROFESIONAL DEL CITADO CONTADOR.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 6</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">COPIA SIMPLE, COMPLETA Y LEGIBLE DE LA <strong>DECLARACIÓN PROVISIONAL DEL EJERCICIO FISCAL 2025 Y EL ÚLTIMO PAGO MENSUAL CORRESPONDIENTE AL MES DE ENERO DE 2026;</strong> COMPLETAS CON ANEXOS Y COMPROBANTE QUE GENERA EL SISTEMA DEL SERVICIO DE ADMINISTRACIÓN TRIBUTARIA.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 7</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PARA PERSONAS JURÍDICAS COLECTIVAS, PRESENTAR ORIGINAL O COPIA CERTIFICADA Y COPIA SIMPLE, COMPLETA Y LEGIBLE DEL ACTA CONSTITUTIVA Y SU ÚLTIMA MODIFICACIÓN, ANEXAR DOCUMENTO QUE AVALE QUE SE ENCUENTRA INSCRITA EN EL REGISTRO PÚBLICO DE COMERCIO; PARA PERSONAS FÍSICAS, PRESENTAR ORIGINAL O COPIA CERTIFICADA Y COPIA SIMPLE, COMPLETA Y LEGIBLE DEL ACTA DE NACIMIENTO Y CLAVE ÚNICA DE REGISTRO DE POBLACIÓN (CURP).</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 8</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">ORIGINAL O COPIA CERTIFICADA Y COPIA SIMPLE, COMPLETA Y LEGIBLE DEL <strong>PODER NOTARIAL DEL REPRESENTANTE O APODERADO</strong> QUE FIRMA LA PROPUESTA, EN EL CUAL SE INDIQUE QUE TIENE PODER GENERAL PARA ACTOS DE ADMINISTRACIÓN Y/O <strong>PODER ESPECIAL</strong> PARA CONCURSOS, LICITACIONES Y FIRMA DE CONTRATOS; LOS PODERES NOTARIALES EXPEDIDOS DENTRO DEL TERRITORIO DEL ESTADO DE MÉXICO, ESTARÁN SUJETOS A LO DISPUESTO POR EL ARTÍCULO 7.768 DEL CÓDIGO CIVIL DEL ESTADO DE MÉXICO, QUE A LA LETRA DICE: "EL MANDATO DEBE CONTENER EL PLAZO POR EL QUE SE CONFIERE, DE NO CONTENERLO SE PRESUME QUE HA SIDO OTORGADO POR TRES AÑOS." (EN CASO DE SER PERSONA FÍSICA, LA PRESENTACIÓN DE ESTE DOCUMENTO SERÁ OPCIONAL)".</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 9</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">ORIGINAL Y COPIA SIMPLE COMPLETA Y LEGIBLE DEL CERTIFICADO DE <strong>EMPRESA MEXIQUENSE VIGENTE</strong>, LA OMISIÓN DE ESTE CERTIFICADO NO INVALIDARÁ LA OFERTA. LA NO PRESENTACIÓN DE ESTE DOCUMENTO NO ES CAUSAL DE DESECHAMIENTO CUANTITATIVA O DESCALIFICACIÓN CUALITATIVA, DADO QUE ÚNICAMENTE SERÁ UTILIZADO PARA EL CRITERIO DE ADJUDICACIÓN.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 10</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PRESENTAR ESCRITO BAJO PROTESTA DE DECIR VERDAD, EN EL QUE MANIFIESTE NO ENCONTRARSE EN NINGUNO DE LOS SUPUESTOS DEL <strong>ARTÍCULO 74 DE LA LEY DE RESPONSABILIDADES ADMINISTRATIVAS DEL ESTADO DE MÉXICO Y MUNICIPIOS.</strong></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 11</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PRESENTAR ESCRITO <strong>BAJO PROTESTA DE DECIR VERDAD</strong> EN EL QUE MANIFIESTE QUE TIENE LA <strong>CAPACIDAD TÉCNICA, LABORAL Y FINANCIERA</strong> PARA PRESTAR EL SERVICIO; ASÍ COMO PARA CELEBRAR LOS CONTRATOS CORRESPONDIENTES; Y, SE COMPROMETE, DE RESULTAR ADJUDICADO, ENTREGARLOS, SIN CAMBIOS EN LAS CANTIDADES, CONCEPTOS, CARACTERÍSTICAS SOLICITADAS, EN LA FECHA ESTABLECIDA Y LUGAR QUE LA UNIDAD SOLICITANTE LO REQUIERA.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 12</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PRESENTAR ESCRITO <strong>BAJO PROTESTA DE DECIR VERDAD</strong> EN EL QUE MANIFIESTE QUE EN CASO DE RESULTAR ADJUDICADO <strong>NO SUBCONTRATARÁ</strong> DE MANERA TOTAL O PARCIAL, NI CEDERÁ TOTAL O PARCIALMENTE LOS DERECHOS Y OBLIGACIONES QUE DERIVEN DEL CONTRATO.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 13</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PRESENTAR ESCRITO <strong>BAJO PROTESTA DE DECIR VERDAD</strong>, EN EL QUE MANIFIESTE QUE LA PRESENTACIÓN DE PROPUESTAS SIGNIFICA, EL <strong>PLENO CONOCIMIENTO Y ACEPTACIÓN</strong> DE LOS REQUISITOS Y LINEAMIENTOS ESTABLECIDOS EN LA PRESENTE SOLICITUD DE PARTICIPACIÓN.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 14</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PRESENTAR <strong>CURRÍCULUM</strong>, ELABORADO EN PAPEL MEMBRETADO DEL OFERENTE Y SUSCRITO POR SU REPRESENTANTE LEGAL O POR QUIEN TENGA FACULTAD LEGAL PARA ELLO.</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 15</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PRESENTAR ESCRITO <strong>BAJO PROTESTA DE DECIR VERDAD</strong>, EN EL QUE SEÑALE UN DOMICILIO, ASÍ COMO COPIA SIMPLE DEL <strong>COMPROBANTE DE DOMICILIO CON UNA ANTIGÜEDAD NO MAYOR A 3 MESES</strong> Y UN DOMICILIO ELECTRÓNICO (CORREO ELECTRÓNICO).</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 16</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PRESENTAR ESCRITO <strong>BAJO PROTESTA DE DECIR VERDAD</strong>, EN EL QUE MANIFIESTE QUE NO DESEMPEÑA EMPLEO, CARGO O COMISIÓN EN EL SERVICIO PÚBLICO O, EN SU CASO, QUE, A PESAR DE DESEMPEÑARLO, CON LA FORMALIZACIÓN DEL CONTRATO CORRESPONDIENTE NO SE ACTUALIZA UN CONFLICTO DE INTERÉS. LO ANTERIOR DE CONFORMIDAD CON LOS <strong>SUPUESTOS PREVISTOS EN EL ARTÍCULO 50 FRACCIÓN VII DE LA LEY DE RESPONSABILIDADES ADMINISTRATIVAS DEL ESTADO DE MÉXICO Y MUNICIPIOS.</strong></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 17</td>
                            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PRESENTAR ESCRITO <strong>BAJO PROTESTA DE DECIR VERDAD</strong>, EN EL QUE <strong>MANIFIESTE QUE POR SÍ MISMO O A TRAVÉS DE INTERPÓSITA PERSONA SE ABSTENDRÁ DE ADOPTAR CONDUCTAS</strong> <strong>PARA QUE LOS SERVIDORES PÚBLICOS DEL MUNICIPIO DE TEMASCALCINGO, MÉXICO, INDUZCAN O ALTEREN LAS EVALUACIONES DE LAS PROPUESTAS,</strong> EL RESULTADO DEL PROCEDIMIENTO U OTROS ASPECTOS QUE OTORGUEN CONDICIONES VENTAJOSAS EN RELACIÓN CON LOS DEMÁS PARTICIPANTES.</td>
                        </tr>
                    </table>

                    <div class="numero-pagina">3 DE ?</div>
                </div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 5: DOCUMENTOS CONTINUACIÓN, CRITERIOS, ETC. -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja5">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

<div style="margin-top: 10px;">
    <table style="border-collapse: collapse; width: 100%;">
        <tr>
            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 18</td>
            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">(CONTINUACIÓN) PRESENTAR EN CARTA MEMBRETADA Y FIRMADA POR EL REPRESENTANTE LEGAL O EN SU CASO COPIA DEL ESTADO DE CUENTA BANCARIO NO MAYOR A TRES MESES DE ANTIGÜEDAD, EN AMBOS CASOS DEBERÁN CONTAR CON LOS SIGUIENTES DATOS:<br>
            <span style="margin-left: 20px;">- NÚMERO DE CUENTA.</span><br>
            <span style="margin-left: 20px;">- CLAVE INTERBANCARIA.</span><br>
            <span style="margin-left: 20px;">- TITULAR.</span><br>
            <span style="margin-left: 20px;">- BANCO.</span><br>
            <span style="margin-left: 20px;">- SUCURSAL PROPUESTA CONJUNTA.</span></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 19</td>
            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">AFIANZADORAS AUTORIZADAS PARA LA EMISIÓN DE FIANZAS, DE ACUERDO AL <strong>"ANEXO 2".</strong></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 20</td>
            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">DATOS DEL LICITANTE Y SU REPRESENTANTE LEGAL, MEDIANTE ESCRITO QUE CONTENGA DATOS DE LA RAZÓN SOCIAL QUE PARTICIPA Y EN EL QUE EL FIRMANTE MANIFIESTE "BAJO PROTESTA DE DECIR VERDAD", QUE CUENTA CON FACULTADES SUFICIENTES PARA SUSCRIBIR A NOMBRE DE SU REPRESENTADA LA PROPUESTA CORRESPONDIENTE, <strong>"ANEXO 3".</strong></td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 21</td>
            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PRESENTAR ESCRITO ELABORADO EN PAPEL MEMBRETADO DEL OFERENTE, EN EL CUAL <strong>INDIQUE EL NÚMERO TOTAL DE FOLIOS</strong> DE LOS QUE CONSTA LA PROPUESTA ECONÓMICA, [DICHA CARTA NO DEBERÁ ESTAR FOLIADA.]</td>
        </tr>
        <tr>
            <td style="font-weight: bold; width: 15%; border: none; padding: 6px 10px 6px 0; vertical-align: top; text-align: justify;">DOCUMENTO 22</td>
            <td style="border: none; padding: 6px 0; vertical-align: top; text-align: justify;">PROPUESTA ECONÓMICA, INCLUYENDO VIGENCIA DE LA PROPUESTA, PRECIOS FIJOS E INCONDICIONADOS Y LUGAR DE ENTREGA DE LOS BIENES Y/O SERVICIOS, CONFORME AL <strong>"ANEXO 4"</strong>, DESGLOSANDO TOTAL DEL I.V.A., <strong>[ASÍ COMO EL MONTO TOTAL CON LETRA]</strong>; EL CUAL NO DEBERÁ ALTERARSE NI CONTENER PROPUESTAS DISTINTAS AL CONTENIDO DE LA BASES.</td>
        </tr>
    </table>
</div>
                    <div style="margin-top: 10px;">POR LA NATURALEZA DEL PROCEDIMIENTO, EL MUNICIPIO NO ACEPTARÁ PROPUESTAS CONJUNTAS.</div>
                </div>

                <div class="clausula"><strong>2. DOMICILIO JURISDICCIONAL</strong></div>
                <div class="declaracion-item">a) EL LICITANTE QUE RESULTE ADJUDICADO EN EL PROCEDIMIENTO DE LA PRESENTE LICITACIÓN, DEBERÁ SEÑALAR AL MOMENTO DE LA FIRMA DEL CONTRATO, DOMICILIO EN EL TERRITORIO DEL ESTADO DE MÉXICO, PARA EFECTOS DE OÍR Y RECIBIR NOTIFICACIONES O CUALQUIER DOCUMENTO.</div>

                <div class="clausula"><strong>3. CRITERIOS DE DESEMPATE</strong></div>
                <div class="declaracion-item">a) EN CASO DE QUE DOS O MÁS PROPUESTAS SE ENCUENTREN EN IGUALDAD DE CIRCUNSTANCIAS, EL COMITÉ DE ADQUISICIONES Y SERVICIOS Y EL ÁREA USUARIA OPTARÁ POR EL PROVEEDOR QUE CUENTE CON EL DOCUMENTO DENOMINADO CERTIFICADO DE EMPRESA MEXIQUENSE VIGENTE, EN CASO DE NO PRESENTARSE ESTE SUPUESTO, EL CRITERIO DE DESEMPATE SERÁ A TRAVÉS DE UN SORTEO DE INSACULACIÓN QUE REALICE LA CONVOCANTE; PROCEDIMIENTO QUE, EN TODO CASO, SE LLEVARÁ A CABO CONFORME A LO ESTABLECIDO EN LA NORMATIVIDAD APLICABLE.</div>
                <div class="declaracion-item">b) CUANDO LA CONVOCANTE DETECTE ERROR DE CÁLCULO EN LA PROPUESTA ECONÓMICA, LLEVARÁ A CABO SU RECTIFICACIÓN PREVALECIENDO EL PRECIO UNITARIO COMO BASE DE CÁLCULO.</div>
                <div class="declaracion-item">c) LA CONVOCANTE NO DESCALIFICARÁ LA PROPUESTA Y DEJARÁ CONSTANCIA DE LA CORRECCIÓN EFECTUADA EN EL DICTAMEN. SI LA PROPUESTA ECONÓMICA DEL PROVEEDOR FUE OBJETO DE CORRECCIONES Y ÉSTE NO ACEPTA LAS MISMAS, SE DESCALIFICARÁ LA PROPUESTA.</div>

                <div class="clausula"><strong>4. JUNTA DE ACLARACIONES</strong></div>
                <div class="declaracion-item">a) NO HABRÁ JUNTA DE ACLARACIONES</div>

                <div class="clausula"><strong>5. ENTREGA DE PROPUESTAS</strong></div>
                <div class="declaracion-item">a) LA <strong>[PROPUESTA TÉCNICA Y DOCUMENTACIÓN COMPLEMENTARIA]</strong> SE ENTREGARÁN DE MANERA IMPRESA Y DIGITAL EN USB ESCANEADOS POR ANEXO EN UN SOBRE CERRADO E IDENTIFICADO CON LA LEYENDA <strong>"PROPUESTA TÉCNICA Y DOCUMENTACIÓN COMPLEMENTARIA"</strong>, SELLADO Y FIRMADO POR EL REPRESENTANTE LEGAL Y/O PERSONA FÍSICA.</div>
                <div class="declaracion-item">b) LA <strong>[PROPUESTA ECONÓMICA]</strong> SE ENTREGARÁ DE MANERA IMPRESA Y DIGITAL EN USB ESCANEADOS POR ANEXO EN UN SOBRE CERRADO E IDENTIFICADO CON LA LEYENDA <strong>"PROPUESTA ECONÓMICA"</strong> SELLADO Y FIRMADO POR EL REPRESENTANTE LEGAL O PERSONA FÍSICA, EN PESOS MEXICANOS, CON FRACCIÓN DE DOS DÍGITOS, LOS PRECIOS SERÁN FIJOS E INCONDICIONADOS DURANTE LA VIGENCIA DEL CONTRATO, ASÍ COMO PRECIOS UNITARIOS POR CADA UNO DE LOS BIENES, TOTALES POR CADA UNA DE LAS PARTIDAS Y SUMA DE LAS PARTIDAS COTIZADAS, CON FRACCIÓN DE DOS DÍGITOS PRECIO UNITARIO, IMPORTE, SUBTOTAL, I.V.A., Y TOTAL.</div>
                <div class="declaracion-item">c) EL REPRESENTANTE LEGAL DE LA EMPRESA O PERSONA FÍSICA PODRÁ ENVIAR AL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS, ASÍ COMO AL ACTO DE FALLO A UN REPRESENTANTE ACREDITADO CON CARTA PODER SIMPLE.</div>
                <div class="declaracion-item">d) EL LICITANTE DEBERÁ PRESENTARSE 30 MINUTOS ANTES DEL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS Y ACTO DE FALLO CON LA FINALIDAD DE REGISTRARSE EN LA LISTA DE ASISTENCIA CORRESPONDIENTE.</div>
                <div class="declaracion-item">e) EN ESTE PROCEDIMIENTO DE LICITACIÓN, NO SE ACEPTARÁ EL ENVÍO DE PROPUESTAS POR SERVICIO POSTAL O MENSAJERÍA, ÚNICAMENTE SE ACEPTARÁN PROPUESTAS PRESENTADAS EL DÍA DE LA PRESENTACIÓN Y APERTURA DE PROPUESTAS.</div>
                <div class="declaracion-item">f) EN CASO DE QUE LOS PRECIOS SUFRAN ALGUN CAMBIO DURANTE LA VIGENCIA DEL CONTRATO, LA EMPRESA QUE RESULTE ADJUDICADA DEBERÁ PRESENTAR POR ESCRITO LA JUSTIFICACIÓN DE LA MODIFICACIÓN DE LOS COSTOS Y ESTE NO DEBERÁ EXCEDER DEL 10% SIEMPRE Y CUANDO SE ENCUENTRE DENTRO DEL PRESUPUESTO AUTORIZADO Y DEBIENDO SER APROBADO POR EL MUNICIPIO.</div>

                <div class="clausula"><strong>6. INDICACIONES PARA PRESENTAR LAS PROPUESTAS.</strong></div>
                <div class="declaracion-item">a) EL IDIOMA EN QUE DEBERÁ PRESENTARSE LAS PROPUESTAS SERÁ EN ESPAÑOL.</div>
                <div class="declaracion-item">b) SERÁN CLARAS Y NO DEBERÁN ESTABLECER NINGUNA CONDICIÓN, NI EMPLEAR ABREVIATURAS O PRESENTAR RASPADURAS Y/O ENMENDADURAS Y, DEBERÁN PRESENTARSE DE MANERA MECANÓGRAFA, NO SE ACEPTARÁN ANOTACIONES MANUSCRITAS ANEXAS A LAS PROPUESTAS.</div>
                <div class="declaracion-item">c) DEBERÁN CONSIGNAR LA FIRMA AUTÓGRAFA DE LA PERSONA FACULTADA PARA ELLO EN LAS PROPUESTAS TÉCNICAS Y ECONÓMICAS.</div>
                <div class="declaracion-item">d) LA PROPUESTA ECONÓMICA DEBERÁN PRESENTARSE EN PESOS MEXICANOS CON FRACCIONES DE 2 (DOS) DÍGITOS, ASÍ COMO COLOCAR CON LETRA EL MONTO TOTAL INCLUIDO AL IMPUESTO AL VALOR AGREGADO (I.V.A.) Y EL PRECIO OFERTADO SERÁ EL VIGENTE Y NO PODRÁ CAMBIAR, INCLUYENDO ADEMÁS VIGENCIA DE LA PROPUESTA CONFORME AL <strong>"ANEXO 4".</strong></div>
                <div class="declaracion-item">e) DEBERÁ REQUISITAR LA INFORMACIÓN SOLICITADA EN CADA UNO DE LOS ANEXOS ATENDIENDO A SUS INSTRUCTIVOS Y AL DE LAS BASES, INDICANDO ENCABEZADO, NÚMERO DEL ANEXO Y SU TÍTULO, SEGÚN LAS NECESIDADES DE LOS LICITANTES CONSERVANDO EL MISMO TEXTO.</div>

                <div class="clausula"><strong>7. PATENTES, MARCAS Y DERECHOS DE AUTOR</strong></div>
                <div class="declaracion-item">a) "<strong>EL PROVEEDOR"</strong> SERÁ RESPONSABLE POR LAS VIOLACIONES QUE SE CAUSEN EN MATERIA DE PATENTES, MARCAS O DERECHOS DE AUTOR, CON MOTIVO DE LA ADQUISICIÓN, ORIGEN, USO, ENAJENACIÓN Y EXPLOTACIÓN DE LOS BIENES O SERVICIOS OBJETO DEL CONTRATO, POR LO QUE SE OBLIGA A SACAR EN PAZ Y A SALVO A \"EL MUNICIPIO\", EN CASO DE CUALQUIER RECLAMACIÓN DE UN TERCERO QUE ALEGUE DERECHOS POR VIOLACIONES A LA LEY DE PROPIEDAD INDUSTRIAL Y A LA LEY FEDERAL DEL DERECHO DE AUTOR, SOBRE LOS BIENES O SERVICIOS MATERIA DEL PRESENTE CONTRATO, SIN CARGO ALGUNO PARA ÉSTE Y LA RESPONSABILIDAD RECAERÁ UNICAMENTE EN <strong>"EL PROVEEDOR".</strong></div>

                <div class="numero-pagina">5 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 6: ACTO DE PRESENTACIÓN Y APERTURA -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja6">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>8. ACTO DE PRESENTACIÓN Y APERTURA DE PROPOSICIONES</strong></div>
                <div class="declaracion-item">a) SE REALIZARÁ EN FORMA PRESENCIAL EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL Y TENDRÁ VERIFICATIVO EN LA FECHA, LUGAR Y HORA SEÑALADOS EN EL CALENDARIO DE EVENTOS DE ESTAS BASES.</div>
                <div class="declaracion-item">b) SE DECLARARÁ INICIADO EL EVENTO.</div>
                <div class="declaracion-item">c) EL SERVIDOR PÚBLICO DESIGNADO SE PRESENTARÁ ANTE LOS LICITANTES ASISTENTES, MISMO QUE ESTARÁ FACULTADO DE LLEVAR A CABO EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS, MISMO QUE SERÁ PROPUESTO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, QUIEN SERÁ EL ÚNICO FACULTADO PARA ACEPTAR O DESECHAR LAS PROPUESTAS Y EN GENERAL PARA TOMAR TODAS LAS DECISIONES DURANTE LA REALIZACIÓN DEL ACTO, CON FUNDAMENTO EN EL ARTÍCULO 2 FRACCIÓN XXVI DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                <div class="declaracion-item">d) SE PASARÁ LISTA DE ASISTENCIA.</div>
                <div class="declaracion-item">e) LA RECEPCIÓN DE LAS PROPOSICIONES SE HARÁ CONFORME A LO DISPUESTO EN EL ARTÍCULO 33 FRACCIÓN VIII, DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, MISMAS QUE RESGUARDARÁN LA CONFIDENCIALIDAD DE LA INFORMACIÓN DE TAL FORMA QUE SEAN INVIOLABLES.</div>
                <div class="declaracion-item">f) SE INICIARÁ CON LA RECEPCIÓN DE LAS PROPOSICIONES RECIBIDAS Y LA REVISIÓN DE LOS DOCUMENTOS POR PARTE DEL SERVIDOR PÚBLICO DESIGNADO EFECTUÁNDOSE LA REVISIÓN EN FORMA CUANTITATIVA, SIN ENTRAR AL ANÁLISIS TÉCNICO, LEGAL O ADMINISTRATIVO DE SU CONTENIDO, CON FUNDAMENTO EN EL ARTÍCULO 35 FRACCIÓN I, DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                <div class="declaracion-item">g) INICIADO EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPOSICIONES, LAS PROPUESTAS YA PRESENTADAS NO PODRÁN SER RETIRADAS O DEJARSE SIN EFECTO POR LOS LICITANTES.</div>
                <div class="declaracion-item">h) EL SERVIDOR PÚBLICO DESIGNADO ELABORARÁ EL ACTA RELATIVA A LA APERTURA DE LAS PROPUESTAS TÉCNICAS Y ECONÓMICAS, EL ANÁLISIS DETALLADO SE EFECTUARÁ POSTERIORMENTE POR LOS INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS, EL ÁREA USUARIA Y EL ÁREA TÉCNICA; DE CONFORMIDAD CON EL ARTÍCULO 36 FRACCIÓN VI, DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                <div class="declaracion-item">i) DE PRESENTARSE INCUMPLIMIENTO U OMISIÓN A LOS REQUISITOS SEÑALADOS EN LAS BASES, SE INDICARÁ CON CLARIDAD Y SUSTENTO LEGAL Y ÉSTA NO SERÁ DESECHADA EN EL ACTO, HECHOS QUE SE ASENTARÁN EN EL ACTA A QUE SE HACE MENCIÓN EN EL INCISO H) DE ESTE PUNTO.</div>
                <div class="declaracion-item">j) LAS PROPUESTAS TÉCNICAS, DOCUMENTACIÓN COMPLEMENTARIA Y PROPUESTAS ECONÓMICAS, ACEPTADAS PARA SU ANÁLISIS Y EVALUACIÓN SERÁN FIRMADAS POR LO MENOS POR EL SERVIDOR PÚBLICO DESIGNADO Y LOS LICITANTES; EN SEGUIDA SE DARÁ LECTURA AL IMPORTE TOTAL DE CADA UNA DE LAS PROPUESTAS, PARA SU POSTERIOR ANÁLISIS.</div>
                <div class="declaracion-item">k) SE LEVANTARÁ EL ACTA QUE SERVIRÁ DE CONSTANCIA DE LA CELEBRACIÓN DEL ACTO DE PRESENTACIÓN Y APERTURA DE LAS PROPUESTAS, SE ANEXARÁN, LOS PRECIOS (MONTOS) OFERTADOS POR LOS LICITANTES PARTICIPANTES QUE SON LOS EXPRESADOS EN SUS ANEXOS, SE DARÁ A CONOCER LA FECHA Y HORA DEL FALLO, EN TÉRMINOS DEL ARTÍCULO 35 FRACCIÓN III, DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                <div class="declaracion-item">l) LA FALTA DE FIRMA DE ALGÚN LICITANTE NO INVALIDARÁ SU CONTENIDO Y EFECTO.</div>

                <div class="clausula"><strong>9. TIPO DE CONTRATO</strong></div>
                <div class="declaracion-item">LAS OBLIGACIONES QUE SE DERIVEN CON MOTIVO DE LAS ADJUDICACIONES QUE SE REALICEN EN LA PRESENTE LICITACIÓN SE FORMALIZARÁ A TRAVÉS DEL FORMATO DE CONTRATO Y SERÁ DE TIPO LEGAL ADMINISTRATIVO.</div>
                <div class="declaracion-item">EL CONTRATO SERÁ DE CARÁCTER ABIERTO, CON DESCRIPCIÓN DE CANTIDADES, PLAZOS MÍNIMOS Y MÁXIMOS.</div>
                <div class="declaracion-item">EL MODELO DEL CONTRATO SE INCLUYE EN EL "ANEXO 5".</div>

                <div class="clausula"><strong>10. CATÁLOGOS</strong></div>
                <div class="declaracion-item">EL CONCURSANTE DEBERÁ SEÑALAR CLARAMENTE EN SU PROPUESTA LA MARCA COTIZADA CONFORME A LO SEÑALADO EN EL "ANEXO 1" Y PRESENTAR FOLLETOS, CATÁLOGOS Y/O FOTOGRAFÍAS DE LAS UNIDADES A COTIZAR PERFECTAMENTE LEGIBLES CON LA INFORMACIÓN TÉCNICA, INDICANDO EL NÚMERO DE LA PARTIDA.</div>
                <div class="declaracion-item">LOS FOLLETOS, CATÁLOGOS Y/O FOTOGRAFÍAS, DEBERÁN ESTAR FIRMADOS POR EL REPRESENTANTE LEGAL Y DEBERÁ INCLUIRSE DENTRO DEL MISMO SOBRE DE LA PROPUESTA TÉCNICA, A FIN DE QUE EL ÁREA COMPETENTE DETERMINE SI TÉCNICAMENTE SON ACEPTABLES.</div>

                <div class="numero-pagina">6 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 7: CALENDARIO DE EVENTOS -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja7">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>11. CALENDARIO DE EVENTOS</strong></div>

                <table>
                    <thead>
                        <tr>
                            <th>EVENTO</th>
                            <th>FECHA Y HORA</th>
                            <th>LUGAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="celda-editable" contenteditable="true">PUBLICACIÓN DE CONVOCATORIA</td>
                            <td id="created_at_texto4" class="celda-editable" contenteditable="true"></td>
                            <td class="celda-editable" contenteditable="true">PERIÓDICO EL SOL DE TOLUCA Y EL SOL DE MÉXICO</td>
                        </tr>
                        <tr>
                            <td class="celda-editable" contenteditable="true">VENTA DE BASES</td>
                            <td class="celda-editable" contenteditable="true">13, 17 Y 18 DE MARZO DE 2026 DE 9:00 A 13:00 HORAS</td>
                            <td class="celda-editable" contenteditable="true">DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN EL EX SEMINARIO AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400</td>
                        </tr>
                        <tr>
                            <td class="celda-editable" contenteditable="true">VISITA A LAS INSTALACIONES</td>
                            <td class="celda-editable" contenteditable="true">NO APLICA</td>
                            <td class="celda-editable" contenteditable="true">NO APLICA</td>
                        </tr>
                        <tr>
                            <td class="celda-editable" contenteditable="true">JUNTA DE ACLARACIONES</td>
                            <td class="celda-editable" contenteditable="true">NO APLICA</td>
                            <td class="celda-editable" contenteditable="true">NO APLICA</td>
                        </tr>
                        <tr>
                            <td class="celda-editable" contenteditable="true">PRESENTACIÓN Y APERTURA DE PROPUESTAS</td>
                            <td class="celda-editable" contenteditable="true">19 DE MARZO DE 2026 A LAS 10:00 HORAS</td>
                            <td class="celda-editable" contenteditable="true">DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN EL EX SEMINARIO AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400</td>
                        </tr>
                        <tr>
                            <td class="celda-editable" contenteditable="true">CONTRAOFERTA (EN SU CASO)</td>
                            <td class="celda-editable" contenteditable="true">20 DE MARZO DE 2026 A LAS 9:30 HORAS</td>
                            <td class="celda-editable" contenteditable="true">DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN EL EX SEMINARIO AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400</td>
                        </tr>
                        <tr>
                            <td class="celda-editable" contenteditable="true">ANÁLISIS Y EVALUACIÓN DE PROPUESTAS Y EMISIÓN DEL DICTAMEN</td>
                            <td class="celda-editable" contenteditable="true">20 DE MARZO DE 2026 A LAS 11:00 HORAS</td>
                            <td class="celda-editable" contenteditable="true">DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN EL EX SEMINARIO AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400</td>
                        </tr>
                        <tr>
                            <td class="celda-editable" contenteditable="true">FECHA DE FALLO</td>
                            <td class="celda-editable" contenteditable="true">23 DE MARZO DE 2026 A LAS 10:30 HORAS</td>
                            <td class="celda-editable" contenteditable="true">DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN EL EX SEMINARIO AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400</td>
                        </tr>
                        <tr>
                            <td class="celda-editable" contenteditable="true">FIRMA DEL CONTRATO</td>
                            <td class="celda-editable" contenteditable="true">24 DE MARZO DE 2026 A LAS 10:00 HORAS</td>
                            <td class="celda-editable" contenteditable="true">DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN EL EX SEMINARIO AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400</td>
                        </tr>
                        <tr>
                            <td class="celda-editable" contenteditable="true">ENTREGA DE FIANZA DE CUMPLIMIENTO DE CONTRATO</td>
                            <td class="celda-editable" contenteditable="true">DESPUÉS DE LOS DIEZ DÍAS HÁBILES A PARTIR DE LA FIRMA DEL CONTRATO</td>
                            <td class="celda-editable" contenteditable="true">EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL</td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-top: 10px; text-align: justify;">
                    TODOS LOS ACTOS DE LAS PRESENTES BASES SE LLEVARÁN A CABO EN LAS FECHAS, HORARIOS Y LUGARES SEÑALADOS EN LA TABLA QUE ANTECEDE, EN EL EX SEMINARIO AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.
                </div>
                <div style="margin-top: 10px; text-align: justify;">
                    LA DIFUSIÓN DE LA CONVOCATORIA PARA LA ADQUISICIÓN DE LAS BASES SE REALIZARÁ EN LOS PERIODICOS EL SOL DE TOLUCA Y EL SOL DE MÉXICO Y ESTARÁN DISPONIBLES DE VENTA LOS DÍAS INDICADOS EN EL PUNTO 17 DE ESTAS BASES.
                </div>
                <div style="margin-top: 10px; text-align: justify;">
                    EL DESARROLLO DE LOS DISTINTOS EVENTOS SE LLEVARÁ A CABO CONFORME A LOS LINEAMIENTOS SEÑALADOS EN EL ARTÍCULO 33 FRACCIÓN VIII, DE LA LEY DE CONTRATACIÓN PÚBLICA Y 82 DE SU RESPECTIVO REGLAMENTO CON LA PRESENCIA DE DICHOS LICITANTES EN LOS PRESENTES ACTOS, ASÍ MISMO, LAS ACTAS QUE SE DERIVEN DE CADA UNO DE LOS EVENTOS SE PONDRÁN A DISPOSICIÓN DE LOS INTERESADOS.
                </div>
                <div style="margin-top: 10px; text-align: justify;">
                    POR EL HECHO DE PARTICIPAR EN EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS, EL LICITANTE ACEPTA Y SE OBLIGA A CUMPLIR CON LAS CONDICIONES ESTABLECIDAS EN ESTAS BASES, NO PUDIENDO RENUNCIAR A SU CONTENIDO Y ALCANCE.
                </div>

                <div class="clausula"><strong>12. VISITA A LAS INSTALACIONES</strong></div>
                <div class="declaracion-item">a) NO APLICA</div>

                <div class="numero-pagina">7 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 8: CONDICIONES Y PROCEDIMIENTO -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja8">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>13. CONDICIONES DE NO NEGOCIACIÓN O MODIFICACIÓN</strong></div>
                <div class="declaracion-item">a) NINGUNA DE LAS CONDICIONES CONTENIDAS EN LAS BASES DE LA LICITACIÓN Y EN LAS PROPUESTAS PRESENTADAS POR LOS PARTICIPANTES, PODRÁN SER NEGOCIADAS O MODIFICADAS UNA VEZ INICIADO EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS.</div>

                <div class="clausula"><strong>14. SEÑALAMIENTOS DEL PROCEDIMIENTO</strong></div>
                <div class="clausula"><strong>a) ANÁLISIS Y EVALUACIÓN DE PROPUESTAS</strong></div>
                <div class="declaracion-item">- EL COMITÉ DE ADQUISICIONES Y SERVICIOS Y EL ÁREA USUARIA LLEVARÁN A CABO EL ANÁLISIS Y EVALUACIÓN CUALITATIVA Y CUANTITATIVA DE LAS PROPUESTAS TÉCNICAS Y ECONÓMICAS, VERIFICANDO QUE, EN TODOS LOS CASOS ÉSTAS CUMPLAN CON LOS REQUISITOS ESTABLECIDOS EN LAS PRESENTES BASES.</div>
                <div class="declaracion-item">- LA EVALUACIÓN DE PROPUESTAS PODRÁ LLEVARSE A CABO CONFORME A LOS CRITERIOS DE EVALUACIÓN BINARIO O DE PUNTOS Y PORCENTAJES.</div>
                <div class="declaracion-item">- EN CASO DE NO PRESENTARSE ALGUNA PROPUESTA QUE ESTÉ DENTRO DEL PRECIO DE MERCADO, SE PROCEDERÁ A DECLARAR DESIERTO EL PROCEDIMIENTO DE ADQUISICIÓN.</div>
                <div class="declaracion-item">- UNA VEZ EFECTUADO EL ANÁLISIS CUANTITATIVO Y CUALITATIVO DE LAS PROPUESTAS PRESENTADAS Y ESTAS NO SEAN CONVENIENTES EN TÉRMINOS DE PRECIO PARA LOS INTERESES DEL MUNICIPIO O SE DETECTE ERROR DE CÁLCULO, EL SERVIDOR PÚBLICO DESIGNADO HARÁ DE CONOCIMIENTO DE LOS LICITANTES, A FIN DE QUE POR ESCRITO Y POR SEPARADO, REDUZCAN LOS PRECIOS DE SUS PROPUESTAS. PARA TAL EFECTO, SE LES COMUNICARÁ EL PRECIO DE MERCADO Y SE LOS CONCEDERÁ EL TERMINO PARA QUE PRESENTEN UNA NUEVA PROPUESTA ECONÓMICA.</div>

                <div class="clausula"><strong>b) CONTRAOFERTA</strong></div>
                <div class="declaracion-item">- EL DESARROLLO DE LA CONTRAOFERTA SE LLEVARÁ A CABO CUANDO LAS PROPUESTAS ESTÉN POR ENCIMA DEL PRECIO DE REFERENCIA OBTENIDO EN EL ESTUDIO DE MERCADO, PARA EL CUAL SE DARÁ UN DÍA HÁBIL POSTERIOR A LA NOTIFICACIÓN DE ESTA; CON LA FINALIDAD DE QUE EL O LOS LICITANTES PUEDAN REALIZAR LAS RESPECTIVAS MODIFICACIONES SI ES QUE ASÍ LO DESEAN, MISMAS QUE DEBERÁN ESTAR POR DEBAJO DEL PRECIO ANTES MENCIONADO.</div>

                <div class="clausula"><strong>c) DICTAMEN</strong></div>
                <div class="declaracion-item">- EL COMITÉ LLEVARÁ A CABO EL ANÁLISIS Y EVALUACIÓN CUALITATIVA DE LAS PROPUESTAS TÉCNICAS Y ECONÓMICAS, VERIFICANDO QUE, EN TODOS LOS CASOS, ÉSTAS CUMPLAN CON LOS REQUISITOS Y LINEAMIENTOS ESTABLECIDOS EN LAS BASES, DE CONFORMIDAD CON LO ESTABLECIDO EN EL ARTÍCULO 87 DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                <div class="declaracion-item">- UNA VEZ HECHA LA EVALUACIÓN DE LAS PROPUESTAS, EL CONTRATO SE ADJUDICARÁ AL LICITANTE CUYA PROPUESTA RESULTE SOLVENTE PORQUE CUMPLE CON LOS REQUISITOS ESTABLECIDOS EN LAS BASES, GARANTIZA SU CUMPLIMIENTO Y HA OBTENIDO EL MEJOR RESULTADO EN LA EVALUACIÓN DE PUNTOS Y PORCENTAJES O HA OFRECIDO EL PRECIO MÁS BAJO.</div>
                <div class="declaracion-item">- POSTERIORMENTE, SE EMITIRÁ DICTAMEN DE ADJUDICACIÓN A FAVOR DEL LICITANTE QUE REÚNA LOS REQUISITOS REQUERIDOS POR LA CONVOCANTE, GARANTIZANDO EN TODO MOMENTO LA OBTENCIÓN DE LAS MEJORES CONDICIONES EN CUANTO A PRECIO, CALIDAD, FINANCIAMIENTO, OPORTUNIDAD Y DEMÁS CIRCUNSTANCIAS PERTINENTES.</div>

                <div class="clausula"><strong>d) FALLO</strong></div>
                <div class="declaracion-item">- TENDRÁ VERIFICATIVO EN LA FECHA, LUGAR Y HORA ESTABLECIDO EN EL PUNTO 16 DE LAS BASES.</div>
                <div class="declaracion-item">- SE DECLARARÁ INICIADO EL EVENTO.</div>
                <div class="declaracion-item">- SE EFECTUARÁ LA PRESENTACIÓN DE LOS SERVIDORES PÚBLICOS.</div>
                <div class="declaracion-item">- CON FUNDAMENTO EN EL ARTÍCULO 38 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, LA CONVOCANTE EMITIRÁ EL FALLO CON BASE EN EL DICTAMEN DE ADJUDICACIÓN EMITIDO POR EL COMITÉ DE ADQUISICIONES Y SERVICIOS, Y LO DARÁ A CONOCER A LOS LICITANTES EN JUNTA PÚBLICA, CUYA FECHA SE INFORMARÁ EN EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPOSICIONES, PUDIÉNDOSE DIFERIR POR UNA SOLA OCASIÓN.</div>
                <div class="declaracion-item">- SE EMITIRÁ EL FALLO CORRESPONDIENTE.</div>
                <div class="declaracion-item">- EL FALLO DE ADJUDICACIÓN SURTIRÁ EFECTOS DESDE LA EMISIÓN, SIENDO RESPONSABILIDAD DE LOS LICITANTES ENTERARSE DE SU CONTENIDO, POR LO QUE, A PARTIR DE ESE MOMENTO, LAS OBLIGACIONES DERIVADAS DE ÉSTE SERÁN EXIGIBLES SIN PERJUICIO DE LA FORMALIZACIÓN DEL CONTRATO RESPECTIVO, EN LOS TÉRMINOS SEÑALADOS EN EL FALLO.</div>
                <div class="declaracion-item">- SE ELABORARÁ EL ACTA CIRCUNSTANCIADA DE LOS HECHOS Y RESULTADOS REGISTRADOS EN EL EVENTO, LA CUAL SERÁ FIRMADA POR LOS SERVIDORES PÚBLICOS Y LICITANTES PRESENTES, ASÍ MISMO SE DARÁN LAS RECOMENDACIONES GENERALES.</div>

                <div class="numero-pagina">8 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 9: CAUSAS DE DESCALIFICACIÓN Y CRITERIOS -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja9">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>15. CAUSAS DE DESCALIFICACIÓN</strong></div>
                <div class="declaracion-item">SERÁN CAUSAS DE DESCALIFICACIÓN, CUANDO SE INCURRA EN CUALQUIERA DE LAS SIGUIENTES SITUACIONES:</div>
                <div class="declaracion-item">a) CUANDO NO CUMPLAN CON ALGUNO DE LOS REQUISITOS ESPECIFICADOS EN ESTAS BASES QUE AFECTEN LA SOLVENCIA DE LA PROPUESTA.</div>
                <div class="declaracion-item">b) CUANDO LOS LICITANTES PRESENTEN DOCUMENTOS OFICIALES ALTERADOS, MODIFICANDO O ALTERANDO EL CONTENIDO ORIGINAL DE LOS MISMOS.</div>
                <div class="declaracion-item">c) CUANDO PRESENTEN DOCUMENTOS DONDE SE SOLICITE "<strong>BAJO PROTESTA DE DECIR VERDAD"</strong> Y ESTA LEYENDA SEA OMITIDA EN EL DOCUMENTO CORRESPONDIENTE.</div>
                <div class="declaracion-item">d) SI EN LA PROPUESTA YA SEA LEGAL, TÉCNICA O ECONÓMICA EXISTE INFORMACIÓN QUE SE CONTRAPONGA O RESULTE AMBIGUA Y CONFUSA PARA REALIZAR LA EVALUACIÓN CORRESPONDIENTE.</div>
                <div class="declaracion-item">e) CUANDO EL LICITANTE SE ENCUENTRE EN ALGUNO DE LOS SUPUESTOS ESTABLECIDOS EN EL <strong>ARTÍCULO 50 FRACCIÓN VII DE LA LEY DE RESPONSABILIDADES ADMINISTRATIVAS DEL ESTADO DE MÉXICO Y MUNICIPIOS.</strong></div>
                <div class="declaracion-item">f) CUANDO LA PROPUESTA PRESENTADA NO SE APEGUE EXACTA Y CABALMENTE A LO ESTIPULADO EN ESTAS BASES, INSTRUCTIVOS, DESCRIPCIÓN Y UNIDAD DE PRESENTACIÓN DE LAS PARTIDAS REQUERIDAS, RELACIONADAS EN EL <strong>"ANEXO 1".</strong></div>
                <div class="declaracion-item">g) CUANDO LOS PRECIOS DE LA PROPUESTA ECONÓMICA SE PRESENTEN EN MONEDA EXTRANJERA.</div>
                <div class="declaracion-item">h) CUANDO SE PRESENTEN PROPUESTAS EN IDIOMA DISTINTO AL ESPAÑOL.</div>
                <div class="declaracion-item">i) CUANDO DOS O MÁS EMPRESAS TENGAN ACCIONES QUE PERTENEZCAN A LA MISMA PERSONA FÍSICA O MORAL.</div>
                <div class="declaracion-item">j) CUANDO PRESENTEN PRECIOS ESCALONADOS.</div>
                <div class="declaracion-item">k) CUANDO EL LICITANTE REGISTRE MÁS DE UNA PROPUESTA POR PARTIDA.</div>
                <div class="declaracion-item">l) CUANDO PRESENTEN LOS FORMATOS QUE SE INDICAN EN LAS BASES, CON ANOTACIONES DIFERENTES A LAS SOLICITADAS POR LA CONVOCANTE.</div>
                <div class="declaracion-item">m) CUANDO SE COMPRUEBE QUE ALGÚN LICITANTE HA ACORDADO CON OTRO U OTROS ELEVAR LOS PRECIOS DE LOS BIENES O CUALQUIER OTRO ACUERDO QUE TENGA A FIN OBTENER UNA VENTAJA SOBRE LOS DEMÁS LICITANTES.</div>
                <div class="declaracion-item">n) CUANDO LOS LICITANTES PROPORCIONEN INFORMACIÓN FALSA O QUE ACTÚEN CON DOLO O MALA FE.</div>
                <div class="declaracion-item">o) SI LA PROPUESTA TÉCNICA, ECONÓMICA Y DEMÁS DOCUMENTOS SOLICITADOS NO SE PRESENTAN EN HOJAS MEMBRETADAS ORIGINALES DEL LICITANTE DIRIGIDAS A LA CONVOCANTE, INDICANDO EL NÚMERO DE LICITACIÓN, SELLADAS Y FIRMADAS POR LA PERSONA FÍSICA O REPRESENTANTE LEGAL CONFORME AL PODER NOTARIAL.</div>

                <div class="clausula"><strong>16. CRITERIOS DE EVALUACIÓN QUE SE APLICARÁN PARA LA ADJUDICACIÓN DEL CONTRATO</strong></div>
                <div class="declaracion-item">a) EL CRITERIO DE EVALUACIÓN DE LAS PROPUESTAS QUE SE APLICARÁ EN EL PRESENTE PROCEDIMIENTO ADQUISITIVO SERÁ EL BINARIO, DE CONFORMIDAD CON LO ESTABLECIDO EN EL ARTÍCULO 87 FRACCIÓN II, INCISO A Y B), DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS; CON EL OBJETO DE ADJUDICAR AL PRECIO MÁS BAJO Y CUMPLA CON LOS REQUISITOS ESTABLECIDOS POR LA CONVOCANTE.</div>
                <div class="declaracion-item">b) EL COMITÉ DE ADQUISICIONES Y SERVICIOS Y EL ÁREA USUARIA, PARA HACER LA EVALUACIÓN DE LAS PROPUESTAS, VERIFICARÁN QUE EN LAS MISMAS INCLUYAN TODA LA INFORMACIÓN, DOCUMENTOS Y REQUISITOS SOLICITADOS EN LAS BASES DE ESTA LICITACIÓN, RELATIVOS A ASPECTOS LEGALES, TÉCNICOS Y ECONÓMICOS.</div>

                <div class="clausula"><strong>17. FORMA DE ADJUDICACIÓN</strong></div>
                <div class="declaracion-item">a) EN LA PRESENTE LICITACIÓN PÚBLICA NACIONAL PRESENCIAL SE ADJUDICARÁ POR EL TOTAL DE PARTIDAS AL PROVEEDOR QUE DE ENTRE LOS PARTICIPANTES SEA EL QUE REÚNA LOS REQUISITOS DE LAS PRESENTES BASES Y OFREZCA LAS MEJORES CONDICIONES ADMINISTRATIVAS, TÉCNICAS, ECONÓMICAS Y LEGALES PARA LA CONVOCANTE, GARANTIZANDO EL CUMPLIMIENTO DEL PROCEDIMIENTO ADQUISITIVO.</div>
                <div class="declaracion-item">b) EL CONTRATO SE ADJUDICARÁ A LA PROPUESTA QUE CUMPLA CON TODOS LOS REQUISITOS SOLICITADOS Y QUE RESULTEN SOLVENTES, ASÍ MISMO DEBERÁ GARANTIZAR SATISFACTORIAMENTE EL CUMPLIMIENTO DE LAS OBLIGACIONES RESPECTIVAS.</div>
                <div class="declaracion-item">c) SI RESULTARA QUE DOS O MÁS PROPUESTAS TÉCNICAS SON SOLVENTES Y, POR LO TANTO, SATISFACEN LA TOTALIDAD DE LOS REQUISITOS, EL CONTRATO SE ADJUDICARÁ AL LICITANTE QUE PRESENTE LA PROPUESTA CUYO PRECIO SEA EL MÁS BAJO.</div>
                <div class="declaracion-item">d) EN CASO DE EMPATE DE LAS PROPUESTAS ECONÓMICAS PRESENTADAS POR LOS LICITANTES, LA CONVOCANTE Y LOS INTEGRANTES DEL COMITÉ RESOLVERÁN MEDIANTE SORTEO MANUAL POR INSACULACIÓN EL DESEMPATE RESPECTIVO.</div>

                <div class="numero-pagina">9 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 10: FIRMA DE CONTRATO Y SANCIONES -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja10">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>18. FIRMA DE CONTRATO</strong></div>
                <div class="declaracion-item">a) EL CONTRATO, SE FIRMARÁ EL DÍA MENCIONADO EN EL CALENDARIO DE EVENTOS DE ESTAS BASES, EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, UBICADO EN EL EX SEMINARIO AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>
                <div class="declaracion-item">b) EN TÉRMINOS DEL ARTÍCULO 32-D DEL CÓDIGO FISCAL DE LA FEDERACIÓN, AL MOMENTO DE LA FIRMA DEL CONTRATO EL LICITANTE DEBERÁ GARANTIZAR, QUE LOS DOCUMENTOS U OPINIÓN EMITIDOS POR EL SAT, INSTITUTO MEXICANO DEL SEGURO SOCIAL E INFONAVIT, SE ENCUENTREN EN SENTIDO POSITIVO Y VIGENTES, POR LO QUE DEBERÁN HACER PÚBLICA LA OPINIÓN DE CUMPLIMIENTO, SEGÚN CORRESPONDA.</div>
                <div class="declaracion-item">c) LAS FORMALIDADES PARA LA SUSCRIPCIÓN DEL CONTRATO Y PARA LA TRAMITACIÓN DE LAS FACTURAS, SERÁN LAS ESTABLECIDAS POR LA CONVOCANTE.</div>
                <div class="declaracion-item">d) PREVIO A LA FIRMA DEL CONTRATO, EL REPRESENTANTE LEGAL DE LA EMPRESA DEBERÁ PRESENTAR COPIA CERTIFICADA U ORIGINAL Y COPIA SIMPLE DE SU PODER NOTARIAL Y PRESENTAR IDENTIFICACIÓN VIGENTE, PASAPORTE O CREDENCIAL PARA VOTAR CON FOTOGRAFÍA; LOS CUALES DEBERÁN SER CONFORME AL <strong>"ANEXO 3"</strong>.</div>
                <div class="declaracion-item">e) PARA EL CUMPLIMIENTO DEL CONTRATO RESPECTIVO, LOS BIENES SE SOLICITARÁN DE ACUERDO A LAS NECESIDADES DE CADA DEPENDENCIA DE LA ADMINISTRACIÓN PÚBLICA MUNICIPAL.</div>
                <div class="declaracion-item">f) EL MUNICIPIO PODRÁ RESCINDIR ADMINISTRATIVAMENTE EL CONTRATO ADJUDICADO EN CUALQUIER MOMENTO, SIN NINGUNA RESPONSABILIDAD PARA ESTE, DE MANERA TOTAL O PARCIAL SIN NECESIDAD DE DECLARACIÓN JUDICIAL, CUANDO EL PROVEEDOR INCURRA EN INCUMPLIMIENTO DE SUS OBLIGACIONES.</div>
                <div class="declaracion-item">g) CUANDO SE RESCINDA EL CONTRATO SE FORMULARÁ EL REQUISITO CORRESPONDIENTE, A EFECTO DE HACER CONSTAR LOS PAGOS QUE DEBA EFECTUAR EL MUNICIPIO POR CONCEPTO DE LOS BIENES RECIBIDOS HASTA EL MOMENTO DE RESCISIÓN.</div>
                <div class="declaracion-item">h) EL CONTRATO OBJETO DE LA PRESENTE LICITACIÓN SE FIRMARÁ EN TRES TANTOS AL MARGEN Y AL CALCE.</div>

                <div class="clausula"><strong>19. SANCIONES</strong></div>
                <div class="declaracion-item">a) EL LICITANTE ADJUDICADO QUE, INFRINJA EN LAS DISPOSICIONES DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS Y SU RESPECTIVO REGLAMENTO SERÁ SANCIONADO POR EL MUNICIPIO EN EL ÁMBITO DE SU RESPECTIVA COMPETENCIA, CON MULTA EQUIVALENTE A LA CANTIDAD DE TREINTA A TRES MIL VECES EL SALARIO MÍNIMO GENERAL VIGENTE EN LA CAPITAL DEL ESTADO A LA FECHA DE LA INFRACCIÓN, CON FUNDAMENTO EN EL ARTÍCULO 167 DEL REGLAMENTO.</div>
                <div class="declaracion-item">b) CUANDO DENTRO DEL TÉRMINO ESTABLECIDO POR EL MUNICIPIO PARA LA FIRMA DEL CONTRATO NO SEA FIRMADO POR LA PERSONA O EMPRESA QUE RESULTE ADJUDICADA, EL MUNICIPIO PODRÁ ADJUDICARLO AL OFERENTE QUE HAYA PRESENTADO LA PROPUESTA ECONÓMICA SOLVENTE MÁS CERCANA A LA GANADORA, Y ASÍ SUCESIVAMENTE; EN TODO CASO LA DIFERENCIA DE PRECIO NO DEBERÁ SER SUPERIOR AL DIEZ POR CIENTO, INCLUYENDO EL IMPUESTO AL VALOR AGREGADO, RESPECTO A LA PROPUESTA GANADORA, CON FUNDAMENTO EN EL ARTÍCULO 122 DEL REGLAMENTO.</div>
                <div class="declaracion-item">c) EL LICITANTE QUE NO FIRME EL CONTRATO ADJUDICADO POR CAUSAS IMPUTABLES AL MISMO SERÁ SANCIONADO EN LOS TÉRMINOS DE LA LEY Y SU RESPECTIVO REGLAMENTO.</div>

                <div class="clausula"><strong>20. PENAS CONVENCIONALES POR ATRASO EN LA ENTREGA DE LOS BIENES.</strong></div>
                <div class="declaracion-item">a) EN CASO DE ATRASO EN LA ENTREGA DE LOS BIENES, SE APLICARÁ AL PROVEEDOR POR CONCEPTO DE PENA CONVENCIONAL, LA CANTIDAD EQUIVALENTE AL 0.5% SOBRE EL VALOR DE LOS BIENES PENDIENTES DE ENTREGA, POR CADA DÍA NATURAL DE ATRASO, SIN QUE LA MISMA PUEDA EXCEDER EL PORCENTAJE DE LA GARANTÍA DE CUMPLIMIENTO DEL CONTRATO, Y DICHA PENA SERÁ DESCONTADA DE LAS FACTURAS PENDIENTES DE PAGO.</div>
                <div class="declaracion-item">b) SI EN UN TÉRMINO DE 10 (DIEZ) DÍAS NATURALES PERSISTE EL ATRASO, EL MUNICIPIO PODRÁ RESCINDIR EL CONTRATO, HACIENDO EFECTIVA LA TOTALIDAD DEL IMPORTE DE LA GARANTÍA PARA EL CUMPLIMIENTO DE CONTRATO.</div>
                <div class="declaracion-item">c) EN CASO DE INCUMPLIMIENTO POR PARTE DEL PROVEEDOR, EL PROCEDIMIENTO DE RESCISIÓN, CUANDO LA CONVOCANTE OPTE POR ELLO, PODRÁ INICIARSE EN CUALQUIER MOMENTO.</div>
                <div class="declaracion-item">d) SI NO SE PRESENTA LA GARANTÍA REQUERIDA, SE PUEDEN INCURRIR EN SANCIONES, COMO MULTAS O INHABILITACIÓN PARA PARTICIPAR EN FUTURAS CONTRATACIONES PÚBLICAS.</div>
                <div class="declaracion-item">e) PARA LA INTERPRETACIÓN O APLICACIÓN DE ESTAS BASES, DEL CONTRATO QUE SE CELEBRE Y CUALQUIER SITUACIÓN QUE NO HAYA SIDO PREVISTA EN LAS PRESENTES BASES, SERÁ RESUELTA POR EL MUNICIPIO DE TEMASCALCINGO, MÉXICO CONSIDERANDO LA OPINIÓN DE LAS AUTORIDADES COMPETENTES, CON BASE EN LAS ATRIBUCIONES ESTABLECIDAS EN LAS DISPOSICIONES LEGALES APLICABLES.</div>
                <div class="declaracion-item">f) NINGUNA DE LAS CONDICIONES CONTENIDAS EN LAS BASES, ASÍ COMO EN LAS PROPOSICIONES PRESENTADAS POR LOS LICITANTES, PODRÁN SER NEGOCIADAS.</div>

                <div class="clausula"><strong>21. SUPUESTOS PARA DECLARAR SUSPENDIDA, CANCELADA O DESIERTA LA LICITACIÓN</strong></div>
                <div class="declaracion-item">a) EL MUNICIPIO PODRÁ DECLARAR DESIERTA LA LICITACIÓN, TOTAL O PARCIAL CUANDO:</div>
                <div class="declaracion-item" style="margin-left: 40px;">- NINGÚN INTERESADO ADQUIERA LAS BASES DE LICITACIÓN Y EL PLAZO DE VENTA HAYA VENCIDO.</div>
                <div class="declaracion-item" style="margin-left: 40px;">- EN CASO DE QUE SÓLO SE HAYA PRESENTADO UNA PROPUESTA, LA CONVOCANTE PODRÁ ADJUDICARLE EL CONTRATO SI CONSIDERA QUE REÚNE LAS CONDICIONES REQUERIDAS, O BIEN PROCEDER A LA ADJUDICACIÓN DIRECTA, CON FUNDAMENTO EN EL ARTÍCULO 36 FRACCIÓN II, DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                <div class="declaracion-item" style="margin-left: 40px;">- NINGUNA DE LAS PROPUESTAS PRESENTADAS, REÚNA LOS REQUISITOS ESTABLECIDOS EN ESTAS BASES DE LICITACIÓN.</div>
                <div class="declaracion-item" style="margin-left: 40px;">- LOS PRECIOS COTIZADOS EN LA PROPOSICIÓN ECONÓMICA POR EL TOTAL DE PARTIDAS NO SEAN CONVENIENTES A LOS INTERESES DEL MUNICIPIO, CONFORME AL ESTUDIO DE MERCADO REALIZADO.</div>

                <div class="numero-pagina">10 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 11: GARANTÍAS Y ANEXOS -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja11">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>21. SUPUESTOS PARA DECLARAR SUSPENDIDA, CANCELADA O DESIERTA LA LICITACIÓN (Continuación)</strong></div>
                <div class="declaracion-item" style="margin-left: 40px;">- EN CASO DE DECLARARSE DESIERTA LA LICITACIÓN, EL MUNICIPIO PROCEDERÁ CONFORME A LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS Y SU RESPECTIVO REGLAMENTO.</div>

                <div class="clausula"><strong>a) SUSPENSIÓN TEMPORAL DE LA LICITACIÓN</strong></div>
                <div class="declaracion-item" style="margin-left: 40px;">- CUANDO SE PRESENTEN CASO FORTUITOS O DE FUERZA MAYOR, QUE HAGA NECESARIA LA SUSPENSIÓN DE CUALQUIER ACTO DEL PROCEDIMIENTO O EN SU TOTALIDAD.</div>
                <div class="declaracion-item" style="margin-left: 40px;">- LA CONVOCANTE DEBERÁ COMUNICAR LA SUSPENSIÓN A LOS LICITANTES, MEDIANTE ESCRITO EN EL QUE SE JUSTIFIQUE LA CAUSA O CAUSAS DE LA MISMA.</div>
                <div class="declaracion-item" style="margin-left: 40px;">- EN ESTOS CASOS, LA SUSPENSIÓN NO IMPLICARÁ NINGUNA RESPONSABILIDAD DE CARÁCTER ECONÓMICO PARA LA CONVOCANTE.</div>

                <div class="clausula"><strong>b) CANCELACIÓN DEL PROCEDIMIENTO DE LICITACIÓN</strong></div>
                <div class="declaracion-item" style="margin-left: 40px;">- CUANDO EXISTAN CIRCUNSTANCIAS DEBIDAMENTE JUSTIFICADAS, QUE PROVOQUEN LA EXTINCIÓN DE LA NECESIDAD PARA ADQUIRIR LOS BIENES Y QUE DE CONTINUARSE CON EL PROCEDIMIENTO DE CONTRATACIÓN SE PUDIERA OCASIONAR UN DAÑO O PERJUICIO AL MUNICIPIO.</div>
                <div class="declaracion-item" style="margin-left: 40px;">- CUANDO SE CANCELE EL PROCEDIMIENTO DE LICITACIÓN O PARTIDA, SE NOTIFICARÁ POR ESCRITO A TODOS LOS INVOLUCRADOS.</div>
                <div class="declaracion-item" style="margin-left: 40px;">- EN CASO DE CANCELACIÓN DE LA LICITACIÓN PÚBLICA, EL MUNICIPIO PODRÁ CONVOCAR A UN NUEVO PROCEDIMIENTO DE LICITACIÓN PÚBLICA.</div>

                <div class="clausula"><strong>22. GARANTÍAS</strong></div>
                <div class="clausula"><strong>a) DE LOS BIENES</strong></div>
                <div class="declaracion-item">- EL PROVEEDOR DEBERÁ GARANTIZAR QUE EL SUMINISTRO QUE SERÁ A PARTIR <strong>DEL <span class="campo-dato" id="vigencia_garantia" contenteditable="true">24 DE MARZO AL 31 DE DICIEMBRE DE 2026</span></strong> Y PROPORCIONARÁ TODAS LAS FACILIDADES A LOS SERVIDORES PÚBLICOS.</div>
                <div class="declaracion-item">- EN CASO DE QUE UN BIEN PRESENTE DAÑOS, DETERIORO O MALTRATO, ESTE DEBERÁ SER SUSTITUIDO POR OTRO DE IGUALES CARACTERÍSTICAS, CALIDAD Y FUNCIONALIDAD.</div>

                <div class="clausula"><strong>b) DE CUMPLIMIENTO DE CONTRATO</strong></div>
                <div class="declaracion-item">- EL PROVEEDOR ADJUDICADO, DEBERÁ ENTREGAR CHEQUE CERTIFICADO, CHEQUE DE CAJA O FIANZA DE CUMPLIMIENTO POR EL 10% DEL SUBTOTAL DEL CONTRATO, DENTRO DEL PLAZO DE DIEZ DÍAS HÁBILES POSTERIORES A LA FIRMA DEL CONTRATO.</div>
                <div class="declaracion-item">- EN CASO DE EMITIR FIANZA SE DEBERÁ TRAMITAR ANTE LAS INSTITUCIONES AFIANZADORAS CON LAS CUALES TIENE CONVENIO EL <strong>GOBIERNO DEL ESTADO DE MÉXICO</strong>, MISMAS QUE SE ENLISTAN EN EL <strong>"ANEXO 2"</strong>.</div>
                <div class="declaracion-item">- EN CASO DE QUE EL PLAZO DE ENTREGA ESTABLECIDO ORIGINALMENTE EN EL CONTRATO SEA AMPLIADO O HAYA MODIFICACIONES QUE AFECTEN EL IMPORTE DEL CONTRATO, LA GARANTÍA DE CUMPLIMIENTO QUEDARÁ AUTOMÁTICAMENTE PRORROGADA POR EL MISMO TIEMPO E IMPORTE, ASÍ COMO LA OBLIGACIÓN DE PRESENTAR EL ENDOSO DE LA GARANTÍA RESPECTIVA.</div>
                <div class="declaracion-item">- LA GARANTÍA PERMANECERÁ EN VIGOR HASTA QUE SE CUMPLA TOTALMENTE EL CONTRATO Y, SI ES EL CASO, DURANTE LA SUBSTANCIACIÓN DE TODOS LOS RECURSOS LEGALES O JUICIOS QUE SE INTERPONGAN, HASTA QUE SE DICTE LA RESOLUCIÓN DEFINITIVA POR LA AUTORIDAD COMPETENTE.</div>

                <div class="clausula"><strong>c) DE VICIOS OCULTOS</strong></div>
                <div class="declaracion-item">- NO APLICA</div>

                <div class="clausula"><strong>d) DEVOLUCIÓN DE GARANTÍAS</strong></div>
                <div class="declaracion-item">- EN RELACIÓN A LA GARANTÍA PARA EL CUMPLIMIENTO DEL CONTRATO, EL MUNICIPIO DE TEMASCALCINGO, MÉXICO POR CONDUCTO DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, REALIZARÁ A NOMBRE DE LA AFIANZADORA SU AUTORIZACIÓN POR ESCRITO, PARA QUE SE PUEDA LIBERAR LA GARANTÍA CORRESPONDIENTE, EN EL MOMENTO EN QUE EL PROVEEDOR DEMUESTRE PLENAMENTE HABER CUMPLIDO CON LA TOTALIDAD DE SUS OBLIGACIONES ADQUIRIDAS EN EL CONTRATO; PARA LO CUAL, EL PROVEEDOR DEBERÁ SOLICITAR EL DOCUMENTO ORIGINAL EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.</div>

                <div class="clausula"><strong>23. LUGAR Y FECHA DE EXPEDICIÓN DE LAS BASES</strong></div>
                <div class="declaracion-item">a) LAS PRESENTES BASES SE EMITEN EL DÍA <span class="campo-dato" id="fecha_expedicion" contenteditable="true">13 DE MARZO DE 2026</span>.</div>

                <div class="numero-pagina">11 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 12: INCONFORMIDADES Y ANEXO 1 -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja12">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>24. INCONFORMIDADES</strong></div>
                <div class="declaracion-item">a) LAS EMPRESAS PODRÁN PRESENTAR SUS INCONFORMIDADES POR ESCRITO ANTE EL ÓRGANO INTERNO DE CONTROL MUNICIPAL UBICADA EN PARAJE LA CORTINA S/N, BARRIO DEL PUENTE, TEMASCALCINGO, MÉXICO</div>
                <div class="declaracion-item">b) LAS CONTROVERSIAS QUE SE SUSCITEN CON MOTIVO DE LA APLICACIÓN O INTERPRETACIÓN DE LA LEY O DE LOS CONTRATOS CELEBRADOS CON BASE EN ELLA, SERÁN RESUELTAS POR LOS TRIBUNALES ESTATALES COMPETENTES.</div>

                <div style="margin-top: 20px; text-align: center;">
                    <strong>A T E N T A M E N T E</strong>
                </div>
                <div style="margin-top: 15px; text-align: center;">
                    <strong>M. EN H.P. MIRIAM VIANEY OVANDO RUBIO</strong><br>
                    <strong>DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL</strong>
                </div>

                <div style="margin-top: 25px; border-top: 2px solid #000; padding-top: 15px;">
                    <div style="text-align: center; font-weight: bold; font-size: 11pt;">ANEXO 1</div>
                    <div style="text-align: center; font-weight: bold;">PROPUESTA TÉCNICA</div>
                    <div style="text-align: center;">MUNICIPIO DE TEMASCALCINGO, MÉXICO</div>
                    <div style="text-align: center;">DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL</div>
                    <div style="text-align: center;">PROCEDIMIENTO DE LICITACIÓN PÚBLICA NACIONAL PRESENCIAL</div>
                    <div style="text-align: center;">LPNP-<span class="campo-dato" id="no_licitacion6" contenteditable="true"></span></div>
                    <div style="text-align: center;">PARA EL "<span class="campo-dato" id="nombre_estudio_anexo1" contenteditable="true"></span>"</div>
                </div>

                <div style="margin-top: 10px; text-align: justify; font-weight: bold;">
                    PARTIDAS, DESCRIPCIÓN Y CANTIDAD DE BIENES Y/O SERVICIOS A OFERTAR NO DEBERÁ MODIFICARSE CON PROPUESTAS DIFERENTES, DE LO CONTRARIO SE DESECHARÁ LA PROPUESTA.
                </div>

                <div style="margin-top: 10px; border: 1px solid #000; padding: 8px;">
                    <div style="font-weight: bold;">NOMBRE O RAZÓN SOCIAL DEL OFERENTE:</div>
                    <div id="nombre_proveedor3" style="border-bottom: 1px solid #000; min-height: 25px; margin-top: 5px;" class="campo-dato" contenteditable="true"></div>
                </div>

                <table style="margin-top: 10px;">
                    <thead>
                        <tr>
                            <th style="width: 8%;">PARTIDA</th>
                            <th style="width: 30%;">DESCRIPCIÓN DE LOS BIENES Y/O SERVICIOS</th>
                            <th style="width: 15%;">UNIDAD DE MEDIDA</th>
                            <th style="width: 10%;">CANTIDAD</th>
                            <th style="width: 37%;">MARCA Y MODELO OFERTADO</th>
                        </tr>
                    </thead>
                    <tbody id="tabla_anexo1_body">
                        <!-- Productos cargados dinámicamente -->
                    </tbody>
                </table>

                <div style="margin-top: 15px;">
                    <div style="font-weight: bold;">CONSIDERACIONES</div>
                    <div style="margin-left: 20px;">- <strong>TIEMPO DE ENTREGA DE LOS BIENES:</strong> A PARTIR DEL 24 DE MARZO Y HASTA AL 31 DE DICIEMBRE DE 2026.</div>
                    <div style="margin-left: 20px;">- <strong>VALIDEZ DE OFERTA:</strong> TREINTA (30) DÍAS HÁBILES.</div>
                    <div style="margin-left: 20px;">- <strong>LUGAR DE ENTREGA:</strong> EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, UBICADO EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>
                </div>

                <div style="margin-top: 20px; text-align: center;">
                    <strong>ATENTAMENTE</strong>
                </div>
                <div style="margin-top: 10px; text-align: center;">
                    <div id="nombre_proveedor7" style="border-bottom: 1px solid #000; width: 60%; margin: 0 auto; min-height: 25px;" class="campo-dato" contenteditable="true"></div>
                    <div><strong>PERSONA FÍSICA O REPRESENTANTE LEGAL DE</strong></div>
                    <div style="border-bottom: 1px solid #000; width: 60%; margin: 5px auto; min-height: 25px;" class="campo-dato" contenteditable="true">[nombre_empresa]</div>
                    <div><strong>LA EMPRESA DENOMINADA</strong></div>
                </div>

                <div class="numero-pagina">12 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 13: ANEXO 2 - AFIANZADORAS -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja13">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div style="text-align: center; font-weight: bold; font-size: 11pt;">ANEXO 2</div>
                <div style="text-align: center; font-weight: bold;">AFIANZADORAS AUTORIZADAS PARA LA EMISIÓN DE FIANZAS</div>
                <div style="text-align: center;">MUNICIPIO DE TEMASCALCINGO, MÉXICO</div>
                <div style="text-align: center;">DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL</div>
                <div style="text-align: center;">PROCEDIMIENTO DE LICITACIÓN PÚBLICA NACIONAL PRESENCIAL</div>
                <div style="text-align: center;">LPNP-<span class="campo-dato" id="no_licitacion7" contenteditable="true"></span></div>
                <div style="text-align: center;">PARA EL "<span class="campo-dato" id="nombre_estudio_anexo2" contenteditable="true"></span>"</div>

                <div style="margin-top: 10px; border: 1px solid #000; padding: 8px;">
                    <div style="font-weight: bold;">NOMBRE O RAZÓN SOCIAL DEL OFERENTE:</div>
                    <div id="nombre_proveedor4" style="border-bottom: 1px solid #000; min-height: 25px; margin-top: 5px;" class="campo-dato" contenteditable="true"></div>
                </div>

                <table style="margin-top: 10px;">
                    <thead>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 40%;">AFIANZADORA</th>
                            <th style="width: 30%;">NO DE PÓLIZA GLOBAL</th>
                            <th style="width: 25%;">RAMO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>AFIANZADORA ASERTA, S.A. DE C.V.</td><td>010-03</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                        <tr><td>2</td><td>AFIANZADORA INSURGENTES, S.A. DE C.V.</td><td>2441-7003-600000</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                        <tr><td>3</td><td>AFIANZADORA SOFIMEX, S.A., GRUPO FINANCIERO SOFIMEX</td><td>425473</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                        <tr><td>4</td><td>CHUBB DE MÉXICO, COMPAÑÍA AFIANZADORA, S.A. DE C.V.</td><td>EMI-10129</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                        <tr><td>5</td><td>FIANZAS ASECAM, S.A., GRUPO FINANCIERO ASECAM</td><td>405,000</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                        <tr><td>6</td><td>FIANZAS ATLAS, S.A.</td><td>III-278241-RC</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                        <tr><td>7</td><td>PRIMERO FIANZAS, S.A. DE C.V.</td><td>7401</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                        <tr><td>8</td><td>FIANZAS DORAMA, S.A.</td><td>99200PGEM</td><td>(CONTARTISTAS, PROV. PREST. DE BIEN. Y SERVICIOS, FISCALES Y ECOLOGICAS)</td></tr>
                        <tr><td>9</td><td>FIANZAS GUARDIANA INBURSA, S.A., GRUPO FINANCIERO INBURSA</td><td>2003EM</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                        <tr><td>10</td><td>ACE FIANZAS MONTERREY, S.A.</td><td>28000003998</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                        <tr><td>11</td><td>HSBC FIANZAS, S.A., GRUPO FINANCIERO HSBC</td><td>510,000</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                        <tr><td>12</td><td>MAPFRE FIANZAS, S.A.</td><td>PGEMG0003060</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                        <tr><td>13</td><td>AFIANZADORA FIDUCIA, S.A. DE C.V.</td><td>1D3-02</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                        <tr><td>14</td><td>CESCE FIANZAS MÉXICO, S.A. DE C.V.</td><td>GEMP 110029</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                    </tbody>
                </table>

                <div style="margin-top: 15px; border: 1px solid #000; padding: 10px;">
                    <div style="font-weight: bold; text-align: center;">BAJO PROTESTA DE DECIR VERDAD</div>
                    <div style="font-weight: bold; text-align: center;">ATENTAMENTE</div>
                </div>

                <table style="margin-top: 5px; border: none;">
                    <tr style="border: none;">
                        <td style="border: none; width: 33%;"><strong>NOMBRE</strong></td>
                        <td style="border: none; width: 33%;"><strong>CARGO EN LA EMPRESA</strong></td>
                        <td style="border: none; width: 34%;"><strong>FIRMA</strong></td>
                    </tr>
                    <tr style="border: none;">
                        <td id="nombre_proveedor10" style="border: none; height: 30px;" class="campo-dato" contenteditable="true"></td>
                        <td style="border: none;" class="campo-dato" contenteditable="true">[cargo]</td>
                        <td style="border: none;"></td>
                    </tr>
                </table>

                <div class="numero-pagina">13 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 14: ANEXO 3 - DATOS VIGENTES -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja14">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div style="text-align: center; font-weight: bold; font-size: 11pt;">ANEXO 3</div>
                <div style="text-align: center; font-weight: bold;">DATOS VIGENTES</div>
                <div style="text-align: center;">MUNICIPIO DE TEMASCALCINGO, MÉXICO</div>
                <div style="text-align: center;">DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL</div>
                <div style="text-align: center;">PROCEDIMIENTO DE LICITACIÓN PÚBLICA NACIONAL PRESENCIAL</div>
                <div style="text-align: center;">LPNP-<span class="campo-dato" id="no_licitacion8" contenteditable="true"></span></div>
                <div style="text-align: center;">PARA EL "<span class="campo-dato" id="nombre_estudio_anexo3" contenteditable="true"></span>"</div>

                <div style="margin-top: 10px; text-align: justify;">
                    <span id="nombre_proveedor1" class="campo-dato" contenteditable="true"></span>, MANIFIESTO "BAJO PROTESTA DE DECIR VERDAD", QUE LOS DATOS AQUÍ ASENTADOS, SON CIERTOS Y HAN SIDO DEBIDAMENTE VERIFICADOS, ASÍ COMO QUE CUENTO CON LAS FACULTADES SUFICIENTES PARA SUSCRIBIR LA PROPUESTA EN LA PRESENTE LICITACIÓN, A NOMBRE Y REPRESENTACIÓN DE (PERSONA FÍSICA O MORAL)
                </div>

                <div style="margin-top: 15px; border: 1px solid #000; padding: 10px;">
                    <div><strong><u>PERSONAS FÍSICAS O MORALES:</u></strong></div>
                    <div style="margin-top: 5px;">
                        <strong>REGISTRO FEDERAL DE CONTRIBUYENTES:</strong> <span id="rfc1" class="campo-dato" contenteditable="true"></span>
                    </div>
                    <div style="margin-top: 5px;">
                        <strong>DOMICILIO:</strong> CALLE <span class="campo-dato" contenteditable="true">[calle_numero]</span> NÚMERO <span class="campo-dato" contenteditable="true">[numero_exterior]</span>, COLONIA <span class="campo-dato" contenteditable="true">[colonia]</span>, DELEGACIÓN O MUNICIPIO <span class="campo-dato" contenteditable="true">[municipio]</span>, CÓDIGO POSTAL <span class="campo-dato" contenteditable="true">[codigo_postal]</span>, ENTIDAD FEDERATIVA <span class="campo-dato" contenteditable="true">[entidad]</span>, TEL. <span id="telefono_principal1" class="campo-dato" contenteditable="true"></span>, FAX <span class="campo-dato" contenteditable="true">[fax]</span>, CORREO ELECTRÓNICO <span class="campo-dato" contenteditable="true">[correo]</span>
                    </div>
                </div>

                <div style="margin-top: 10px; border: 1px solid #000; padding: 10px;">
                    <div><strong><u>PERSONAS MORALES:</u></strong></div>
                    <div style="margin-top: 5px;">
                        <strong>ESCRITURA PÚBLICA EN LA QUE CONSTA SU ACTA CONSTITUTIVA:</strong><br>
                        NÚM. <span class="campo-dato" contenteditable="true">[num_acta_cons]</span> FECHA <span id="fecha_texto1" class="campo-dato" contenteditable="true"></span>
                    </div>
                    <div style="margin-top: 5px;">
                        <strong>NOTARIO PÚBLICO ANTE EL CUAL SE DIO FE:</strong> NOMBRE <span class="campo-dato" contenteditable="true">[notario]</span> NÚMERO <span class="campo-dato" contenteditable="true">[num_notario]</span>, LUGAR <span class="campo-dato" contenteditable="true">[lugar_notario]</span>
                    </div>
                    <div style="margin-top: 5px;">
                        <strong>OBJETO SOCIAL:</strong> <span class="campo-dato" contenteditable="true">[objeto_social]</span>
                    </div>
                    <div style="margin-top: 5px;">
                        <strong>FECHA Y DATOS DE SU INSCRIPCIÓN EN EL REGISTRO PÚBLICO DE COMERCIO:</strong> <span class="campo-dato" contenteditable="true">[registro_comercio]</span>
                    </div>
                    <div style="margin-top: 5px;">
                        <strong>ACCIONISTAS:</strong><br>
                        <span class="campo-dato" contenteditable="true">[apellido_paterno]</span> <span class="campo-dato" contenteditable="true">[apellido_materno]</span> <span class="campo-dato" contenteditable="true">[nombre]</span>
                    </div>
                    <div style="margin-top: 5px; font-size: 8pt;">(AMPLIAR SEGÚN NECESIDADES)</div>
                </div>

                <div style="margin-top: 10px; border: 1px solid #000; padding: 10px;">
                    <div><strong><u>PERSONAS MORALES: REFORMAS DEL ACTA:</u></strong></div>
                    <div style="margin-top: 5px;">
                        <strong>FECHA:</strong> <span class="campo-dato" contenteditable="true">[fecha_reforma]</span> <strong>MOTIVO:</strong> <span class="campo-dato" contenteditable="true">[motivo_reforma]</span>
                    </div>
                    <div style="margin-top: 5px;">
                        <strong>NOTARIO PÚBLICO ANTE EL CUAL SE DIO FE:</strong> NOMBRE <span class="campo-dato" contenteditable="true">[notario_reforma]</span> NÚMERO <span class="campo-dato" contenteditable="true">[num_notario_reforma]</span> LUGAR <span class="campo-dato" contenteditable="true">[lugar_notario_reforma]</span>
                    </div>
                    <div style="margin-top: 5px; font-size: 8pt;">(AMPLIAR SEGÚN NECESIDADES)</div>
                </div>

                <div style="margin-top: 10px; border: 1px solid #000; padding: 10px;">
                    <div><strong><u>NOMBRE DEL APODERADO O REPRESENTANTE LEGAL:</u></strong></div>
                    <div style="margin-top: 5px;">
                        <strong>DOCUMENTO QUE ACREDITA SU PERSONALIDAD Y FACULTADES:</strong> NÚM. <span class="campo-dato" contenteditable="true">[num_poder]</span> FECHA: <span class="campo-dato" contenteditable="true">[fecha_poder]</span>
                    </div>
                    <div style="margin-top: 5px;">
                        <strong>NOTARIO PÚBLICO ANTE EL CUAL FUERON OTORGADAS:</strong> NOMBRE <span class="campo-dato" contenteditable="true">[notario_poder]</span> NÚMERO <span class="campo-dato" contenteditable="true">[num_notario_poder]</span> LUGAR <span class="campo-dato" contenteditable="true">[lugar_notario_poder]</span>
                    </div>
                    <div style="margin-top: 5px; font-size: 8pt;">(AMPLIAR SEGÚN NECESIDADES)</div>
                </div>

                <div style="margin-top: 15px; font-weight: bold;">PROTESTO LO NECESARIO</div>
                <div style="margin-top: 10px;">
                    <div id="nombre_proveedor11" style="border-bottom: 1px solid #000; width: 70%; min-height: 25px;" class="campo-dato" contenteditable="true"></div>
                    <div style="font-size: 8pt;">(NOMBRE COMPLETO SIN ABREVIATURAS Y FIRMA DEL REPRESENTANTE LEGAL DE PERSONA FÍSICA O MORAL)</div>
                </div>

                <div style="margin-top: 15px; font-size: 8pt; font-style: italic;">
                    NOTA: EL PRESENTE FORMATO PODRÁ SER REPRODUCIDO POR CADA LICITANTE EN EL MODO QUE ESTIME CONVENIENTE, DEBIENDO RESPETAR SU CONTENIDO, PREFERENTEMENTE EN EL ORDEN INDICADO.
                </div>

                <div class="numero-pagina">14 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 15: ANEXO 4 - PROPUESTA ECONÓMICA -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja15">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div style="text-align: center; font-weight: bold; font-size: 11pt;">ANEXO 4</div>
                <div style="text-align: center; font-weight: bold;">PROPUESTA ECONÓMICA</div>
                <div style="text-align: center;">MUNICIPIO DE TEMASCALCINGO, MÉXICO</div>
                <div style="text-align: center;">DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL</div>
                <div style="text-align: center;">PROCEDIMIENTO DE LICITACIÓN PÚBLICA NACIONAL PRESENCIAL</div>
                <div style="text-align: center;">LPNP-<span class="campo-dato" id="no_licitacion9" contenteditable="true"></span></div>
                <div style="text-align: center;">PARA EL "<span class="campo-dato" id="nombre_estudio_anexo4" contenteditable="true"></span>"</div>

                <div style="margin-top: 10px; text-align: justify; font-weight: bold;">
                    PARTIDAS, DESCRIPCIÓN Y CANTIDAD DE BIENES Y/O SERVICIOS A OFERTAR NO DEBERÁ MODIFICARSE CON PROPUESTAS DIFERENTES, DE LO CONTRARIO SE DESECHARÁ LA PROPUESTA.
                </div>

                <div style="margin-top: 10px; border: 1px solid #000; padding: 8px;">
                    <div style="font-weight: bold;">NOMBRE O RAZÓN SOCIAL DEL OFERENTE:</div>
                    <div id="nombre_proveedor2" style="border-bottom: 1px solid #000; min-height: 25px; margin-top: 5px;" class="campo-dato" contenteditable="true"></div>
                </div>

                <table style="margin-top: 10px;">
                    <thead>
                        <tr>
                            <th style="width: 6%;">PARTIDA</th>
                            <th style="width: 25%;">DESCRIPCIÓN DE LOS BIENES</th>
                            <th style="width: 12%;">UNIDAD DE MEDIDA</th>
                            <th style="width: 8%;">CANTIDAD</th>
                            <th style="width: 18%;">MARCA Y MODELO OFERTADO</th>
                            <th style="width: 15%;">PRECIO UNITARIO</th>
                            <th style="width: 16%;">IMPORTE</th>
                        </tr>
                    </thead>
                    <tbody id="tabla_anexo4_body">
                        <!-- Productos cargados dinámicamente -->
                    </tbody>
                </table>

                <div style="margin-top: 10px;">
                    <div style="display: inline-block; width: 60%; font-weight: bold;">
                        MONTO CON LETRA <span id="total_letras1" class="campo-dato" contenteditable="true"></span>
                    </div>
                    <div style="display: inline-block; width: 40%;">
                        <table style="border: none; width: 100%;">
                            <tr style="border: none;">
                                <td style="border: none; text-align: right; font-weight: bold;">SUBTOTAL</td>
                                <td style="border: none; text-align: right;">$<span class="campo-dato" id="subtotal_anexo4" contenteditable="true">[subtotal]</span></td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border: none; text-align: right; font-weight: bold;">I.V.A.</td>
                                <td style="border: none; text-align: right;">$<span class="campo-dato" id="iva_anexo4" contenteditable="true">[iva]</span></td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border: none; text-align: right; font-weight: bold;">TOTAL</td>
                                <td style="border: none; text-align: right;">$<span class="campo-dato" id="total_anexo4" contenteditable="true">[total]</span></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div style="margin-top: 15px; border-top: 1px solid #000; padding-top: 10px;">
                    <div style="font-weight: bold;">CONDICIONES</div>
                    <div style="margin-left: 20px; font-weight: bold;">LOS PRECIOS OFERTADOS SON FIJOS Y POR NINGÚN MOTIVO PODRÁN SER MODIFICADOS.</div>
                    <div style="margin-left: 20px; margin-top: 5px;">
                        <strong>FORMA Y LUGAR DE PAGO:</strong> EL PAGO SE REALIZARÁ MEDIANTE TRANSFERENCIA ELECTRÓNICA EN LA TESORERÍA MUNICIPAL, DENTRO DE LOS 15 DÍAS HÁBILES POSTERIORES A PARTIR DE LOS BIENES OFERTADOS Y CORRECTA PRESENTACIÓN DE LA FACTURA.
                    </div>
                    <div style="margin-left: 20px; margin-top: 5px;">
                        <strong>FACTURACIÓN:</strong> LA FACTURA DEBERÁ EMITIRSE A NOMBRE DEL MUNICIPIO DE TEMASCALCINGO, CON DOMICILIO EN PLAZA BENITO JUAREZ, NÚMERO 01, COLONIA CENTRO, C.P. 50400, TEMASCALCINGO, MÉXICO, CON REGISTRO FEDERAL DE CONTRIBUYENTES MTM8501019R7.
                    </div>
                    <div style="margin-left: 20px; margin-top: 5px;">
                        <strong>GARANTÍA DE CUMPLIMIENTO DE CONTRATO:</strong> CHEQUE CERTIFICADO, CHEQUE DE CAJA O GARANTÍA DE CUMPLIMIENTO DE CONTRATO POR EL 10% DEL SUBTOTAL DEL CONTRATO, DENTRO DE LOS 10 DÍAS HÁBILES POSTERIORES A LA FIRMA DEL CONTRATO.
                    </div>
                    <div style="margin-left: 20px; margin-top: 5px;">
                        <strong>GARANTÍA DE VICIOS OCULTOS:</strong> NO APLICA.
                    </div>
                </div>

                <div style="margin-top: 20px; text-align: center;">
                    <strong>ATENTAMENTE</strong>
                </div>
                <div style="margin-top: 10px; text-align: center;">
                    <div id="nombre_proveedor8" style="border-bottom: 1px solid #000; width: 60%; margin: 0 auto; min-height: 25px;" class="campo-dato" contenteditable="true"></div>
                    <div><strong>PERSONA <span id="tipo_persona2" class="campo-dato" contenteditable="true"></span> O REPRESENTANTE LEGAL DE</strong></div>
                    <div style="border-bottom: 1px solid #000; width: 60%; margin: 5px auto; min-height: 25px;" class="campo-dato" contenteditable="true">[nombre_empresa]</div>
                    <div><strong>LA EMPRESA DENOMINADA</strong></div>
                </div>

                <div class="numero-pagina">15 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 16: ANEXO 5 - MODELO DE CONTRATO (INICIO) -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja16">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div style="text-align: center; font-weight: bold; font-size: 11pt;">ANEXO 5</div>
                <div style="text-align: center; font-weight: bold;">MODELO DEL CONTRATO</div>
                <div style="text-align: center;">MUNICIPIO DE TEMASCALCINGO, MÉXICO</div>
                <div style="text-align: center;">DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL</div>
                <div style="text-align: center;">PROCEDIMIENTO DE LICITACIÓN PÚBLICA NACIONAL PRESENCIAL</div>
                <div style="text-align: center;">LPNP-<span class="campo-dato" id="no_licitacion10" contenteditable="true"></span></div>
                <div style="text-align: center;">PARA EL "<span class="campo-dato" id="nombre_estudio_anexo5" contenteditable="true"></span>"</div>

                <div style="margin-top: 10px; text-align: center; font-weight: bold;">
                    MTM/CAYS/PF/<span class="campo-dato" id="no_licitacion11" contenteditable="true"></span>
                </div>

                <div style="margin-top: 10px; text-align: center; font-weight: bold; font-size: 11pt;">
                    CONTRATO ABIERTO PARA EL "<span id="nombre_estudio_anexo6" class="campo-dato" contenteditable="true"></span>"
                </div>

                <div style="margin-top: 10px; text-align: justify;">
                    CONTRATO QUE CELEBRAN POR UNA PARTE EL MUNICIPIO CONSTITUCIONAL DE TEMASCALCINGO, MÉXICO, REPRESENTADO EN ESTE ACTO POR LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL; <strong>C. RAMIRO GALINDO REYES</strong>, SECRETARIO DEL AYUNTAMIENTO; <strong>C. MIRIAM VIANEY OVANDO RUBIO</strong> DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL Y ÁREA USUARIA; QUIÉN EN LO SUCESIVO Y PARA LOS EFECTOS DEL PRESENTE SE LE DENOMINARÁ <strong>"EL MUNICIPIO"</strong>; Y POR OTRA PARTE EL <span id="nombre_proveedor5" class="campo-dato" contenteditable="true"></span>, EN SU CARÁCTER DE <strong>PERSONA FÍSICA O REPRESENTANTE LEGAL</strong> A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ <strong>"EL PROVEEDOR"</strong>, AL TENOR DE LAS DECLARACIONES Y CLÁUSULAS SIGUIENTES:
                </div>

                <div style="margin-top: 15px;">
                    <div style="font-weight: bold;">DECLARACIONES</div>
                    <div style="margin-top: 10px;">
                        <div style="font-weight: bold;">I. "EL MUNICIPIO" DECLARA:</div>
                        <div style="margin-left: 20px; margin-top: 5px;">1. QUE CON ARREGLO A LO PREVISTO POR LOS ARTÍCULOS 115, DE LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS; 113, 116, 123, Y 125, DE LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, 31, FRACCIÓN XVIII, DE LA LEY ORGÁNICA MUNICIPAL DEL ESTADO DE MÉXICO; ASÍ COMO LOS ARTÍCULOS 65, 66, 67, 68, 69, 70, 71, 72, 73, 74 Y 75 DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO EL 120, 123, 124, 125 Y 127 DEL REGLAMENTO; EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, TIENE LA ATRIBUCIÓN PARA CELEBRAR EL PRESENTE CONTRATO.</div>
                        <div style="margin-left: 20px; margin-top: 5px;">2. QUE LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL, ESTÁ FACULTADA PARA CONOCER, OTORGAR Y SUSCRIBIR ESTE CONTRATO.</div>
                        <div style="margin-left: 20px; margin-top: 5px;">3. QUE EL <strong>C. RAMIRO GALINDO REYES,</strong> EN SU CARÁCTER DE SECRETARIO DEL AYUNTAMIENTO, EN TÉRMINOS DE LO QUE ESTABLECE EL ARTÍCULO 91 FRACCIÓN V DE LA LEY ORGÁNICA MUNICIPAL, TIENE LA ATRIBUCIÓN DE VALIDAR CON SU FIRMA LOS DOCUMENTOS OFICIALES EMANADOS DE <strong>"EL MUNICIPIO"</strong> Y DE CUALQUIERA DE SUS MIEMBROS.</div>
                        <div style="margin-left: 20px; margin-top: 5px;">4. LAS DEPENDENCIAS Y ENTIDADES DE LA ADMINISTRACIÓN PÚBLICA MUNICIPAL CONDUCIRÁN SUS ACCIONES CON BASE A LOS PROGRAMAS ANUALES QUE ESTABLECE EL MUNICIPIO PARA EL LOGRO DE SUS OBJETIVOS.</div>
                        <div style="margin-left: 20px; margin-top: 5px;">5. QUE TIENE ESTABLECIDO SU DOMICILIO EN <strong>PLAZA BENITO JUÁREZ NO. 1, COLONIA CENTRO, C.P. 50400, TEMASCALCINGO, ESTADO DE MÉXICO</strong>, MISMO QUE SE SEÑALA PARA LOS FINES Y EFECTOS LEGALES DEL PRESENTE INSTRUMENTO.</div>
                        <div style="margin-left: 20px; margin-top: 5px;">6. MANIFIESTA <strong>"EL MUNICIPIO"</strong> QUE TIENE EN SU HABER RECURSOS PECUNIARIOS PROVENIENTES DE PARTICIPACIONES FEDERALES PARA EL <strong>"<span id="nombre_estudio_anexo17" class="campo-dato" contenteditable="true"></span>"</strong> CONFORME AL PRESUPUESTO DE EGRESOS DE LA FEDERACIÓN PARA EL EJERCICIO FISCAL 2026.</div>
                        <div style="margin-left: 20px; margin-top: 5px;">7. QUE LA ADJUDICACIÓN DEL CONTRATO SE REALIZÓ MEDIANTE PROCEDIMIENTO POR LICITACIÓN PÚBLICA <strong>LPNP-<span id="no_licitacion12" class="campo-dato" contenteditable="true"></span></strong>, DE CONFORMIDAD CON LOS ARTÍCULOS 29, 30 FRACCIÓN I, 32, 33, 34, 35, 36, 37, 38, 39, 40 Y 41 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS Y 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71 Y 72 DE SU RESPECTIVO REGLAMENTO.</div>
                    </div>
                </div>

                <div class="numero-pagina">16 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 17: ANEXO 5 - DECLARACIONES PROVEEDOR Y DEFINICIONES -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja17">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div style="margin-top: 5px;">
                    <div style="font-weight: bold;">II. DE "EL PROVEEDOR", BAJO PROTESTA DE DECIR VERDAD DECLARA:</div>
                    <div style="margin-left: 20px; margin-top: 5px;">1. QUE ES UNA EMPRESA CONSTITUIDA LEGALMENTE DE ACUERDO CON LAS LEYES DE NUESTRO PAÍS, QUE, CON LA SUSCRIPCIÓN DEL PRESENTE CONTRATO, CUMPLE CON UNO DE LOS FINES ESTABLECIDOS DENTRO DE SU OBJETO SOCIAL, SEGÚN LO ACREDITA CON ACTA CONSTITUTIVA <span class="campo-dato" contenteditable="true">[num_acta_cons]</span>, VOLUMEN <span class="campo-dato" contenteditable="true">[volumen_re]</span>, DE FECHA <span id="created_at_texto6" class="campo-dato" contenteditable="true"></span>, ANTE LA FE DEL NOTARIO PÚBLICO <span class="campo-dato" contenteditable="true">[notario]</span>, TITULAR DE LA NOTARIA PÚBLICA <span class="campo-dato" contenteditable="true">[titular]</span>; MISMA QUE CUENTA CON EL REGISTRO PÚBLICO DE LA PROPIEDAD Y COMERCIO CON NÚMERO DE INSCRIPCIÓN <strong>LIBRO <span class="campo-dato" contenteditable="true">[num_libro]</span>, BAJO LA PARTIDA NÚMERO _____________________, VOLUMEN <span class="campo-dato" contenteditable="true">[volumen_re]</span> DE FECHA <span id="fecha_texto2" class="campo-dato" contenteditable="true"></span>, DEL AÑO <span class="campo-dato" contenteditable="true">[año]</span>.</strong></div>
                    <div style="margin-left: 20px; margin-top: 5px;">2. QUE PARA EFECTOS DEL PRESENTE CONTRATO _________________________, SEÑALA COMO SU DOMICILIO FISCAL UBICADO EN <span class="campo-dato" contenteditable="true">[domicilio_fiscal]</span>, NÚMERO DE TELÉFONO <span id="telefono_principal2" class="campo-dato" contenteditable="true"></span> Y CORREO ELECTRÓNICO <span class="campo-dato" contenteditable="true">[correo]</span>.</div>
                    <div style="margin-left: 20px; margin-top: 5px;">3. QUE CUENTA CON EL DEBIDO REGISTRO FEDERAL DE CONTRIBUYENTES <span id="rfc2" class="campo-dato" contenteditable="true"></span>, CON ACTIVIDAD ECONÓMICA <span class="campo-dato" contenteditable="true">[giro_economico]</span>.</div>
                    <div style="margin-left: 20px; margin-top: 5px;">4. QUE CONOCE LAS ESPECIFICACIONES DEL PROCEDIMIENTO DE LICITACIÓN PÚBLICA NACIONAL PRESENCIAL REFERENTE AL <strong>"<span id="nombre_estudio_anexo7" class="campo-dato" contenteditable="true"></span>"</strong> EL CUAL LLEVA A CABO EL MUNICIPIO DE TEMASCALCINGO Y DEMÁS DOCUMENTOS QUE SE ENCUENTRAN INTEGRADOS AL EXPEDIENTE QUE SE FORMÓ CON MOTIVO DEL PROCEDIMIENTO DE ADQUISICIÓN ANTES REFERIDO.</div>
                    <div style="margin-left: 20px; margin-top: 5px;">5. QUE CONOCE PLENAMENTE LAS DISPOSICIONES, QUE PARA EL CASO DE LA ADQUISICIÓN DE LOS BIENES QUE ESTABLECE EN LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS, LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO SU RESPECTIVO REGLAMENTO.</div>
                    <div style="margin-left: 20px; margin-top: 5px;">6. QUE BAJO PROTESTA DE DECIR VERDAD LA PERSONA QUE REPRESENTA NO SE ENCUENTRA EN NINGUNO DE LOS SUPUESTOS QUE ESTABLECE EL ARTÍCULO 74 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">III. DE LAS "PARTES"</div>
                    <div style="margin-left: 20px; margin-top: 5px;">1. QUE EN VIRTUD DE LAS DECLARACIONES QUE ANTECEDEN, Y UNA VEZ QUE SE HAN RECONOCIDO SU CAPACIDAD Y PERSONALIDAD, CONVIENEN EXPRESAMENTE EN SUJETARSE A LAS SIGUIENTES:</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">DEFINICIONES</div>
                    <div style="margin-left: 20px; margin-top: 5px;"><strong>"LAS PARTES"</strong> CONVIENEN QUE, PARA LOS EFECTOS DEL PRESENTE CONTRATO, SE ENTENDERÁ POR:</div>
                    <div style="margin-left: 40px; margin-top: 5px;">1. LEY: LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">2. REGLAMENTO: EL REGLAMENTO DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">CLÁUSULAS</div>
                    <div style="margin-top: 5px;">
                        <div style="font-weight: bold;">PRIMERA. - OBJETO.</div>
                        <div style="margin-left: 20px; margin-top: 5px; text-align: justify;">EL PRESENTE CONTRATO TIENE POR OBJETO QUE <strong>"EL PROVEEDOR"</strong> SUMINISTRE A <strong>"EL MUNICIPIO" <span id="nombre_estudio_anexo8" class="campo-dato" contenteditable="true"></span></strong> DE CALIDAD COMPROBADA Y APTOS PARA SU CONSUMO, DESTINADOS A SUMINISTRAR A LAS ÁREAS Y DEPENDENCIAS MUNICIPALES QUE REQUIERAN ESTOS PRODUCTOS, GARANTIZANDO SU CORRECTA CONSERVACIÓN, INOCUIDAD Y DISPONIBILIDAD PARA EL USO DEL PERSONAL Y VISITANTES.</div>
                        <div style="margin-left: 20px; margin-top: 5px;">ASÍ MISMO, <strong>"LAS PARTES"</strong> ACUERDAN QUE:</div>
                        <div style="margin-left: 40px; margin-top: 5px;">a) LAS CANTIDADES PODRÁN CAMBIAR DE ACUERDO A LAS NECESIDADES DE LAS DEPENDENCIAS DEL MUNICIPIO.</div>
                        <div style="margin-left: 40px; margin-top: 5px;">b) PODRÁN ADQUIRIRSE PRODUCTOS QUE NO ESTÉN EN EL LISTADO, DE ACUERDO A LAS NECESIDADES PROPIAS DE LAS DEPENDENCIAS DEL MUNICIPIO Y QUE SEAN CONSIDERADOS DENTRO DE LA PARTIDA PRESUPUESTAL QUE CONTEMPLA "________________________________________".</div>
                        <div style="margin-left: 40px; margin-top: 5px;">c) LAS MARCAS DE LOS PRODUCTOS SOLICITADOS PODRÁN CAMBIAR DE ACUERDO AL STOCK DEL PROVEEDOR.</div>
                        <div style="margin-left: 20px; margin-top: 5px;">LOS BIENES OBJETO DEL PRESENTE CONTRATO SE DETALLAN EN LA TABLA SIGUIENTE, LA CUAL FORMA PARTE INTEGRAL DE ESTA CLÁUSULA E INCLUYE DESCRIPCIÓN, CANTIDAD, UNIDAD DE MEDIDA Y ESPECIFICACIONES DE CADA INSUMO:</div>
                    </div>
                </div>

                <table style="margin-top: 10px;">
                    <thead>
                        <tr>
                            <th style="width: 6%;">PARTIDA</th>
                            <th style="width: 25%;">DESCRIPCIÓN DE LOS BIENES</th>
                            <th style="width: 12%;">UNIDAD DE MEDIDA</th>
                            <th style="width: 8%;">CANTIDAD</th>
                            <th style="width: 18%;">MARCA Y MODELO OFERTADO</th>
                            <th style="width: 15%;">PRECIO UNITARIO</th>
                            <th style="width: 16%;">IMPORTE</th>
                        </tr>
                    </thead>
                    <tbody id="tabla_contrato_body">
                        <!-- Productos cargados dinámicamente -->
                    </tbody>
                </table>

                <div style="margin-top: 10px;">
                    <div style="display: inline-block; width: 60%; font-weight: bold;">
                        MONTO CON LETRA <span id="total_letras2" class="campo-dato" contenteditable="true"></span>
                    </div>
                    <div style="display: inline-block; width: 40%;">
                        <table style="border: none; width: 100%;">
                            <tr style="border: none;">
                                <td style="border: none; text-align: right; font-weight: bold;">SUBTOTAL</td>
                                <td style="border: none; text-align: right;">$<span class="campo-dato" id="subtotal_contrato" contenteditable="true">[subtotal]</span></td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border: none; text-align: right; font-weight: bold;">I.V.A.</td>
                                <td style="border: none; text-align: right;">$<span class="campo-dato" id="iva_contrato" contenteditable="true">[iva]</span></td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border: none; text-align: right; font-weight: bold;">TOTAL</td>
                                <td style="border: none; text-align: right;">$<span class="campo-dato" id="total_contrato" contenteditable="true">[total]</span></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="numero-pagina">17 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 18: ANEXO 5 - CLÁUSULAS SEGUNDA A DÉCIMA SEGUNDA -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja18">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div style="margin-top: 5px;">
                    <div style="font-weight: bold;">SEGUNDA. -- MONTOS.</div>
                    <div style="margin-left: 20px; margin-top: 5px; text-align: justify;">LA CANTIDAD A PAGAR POR PARTE DE <strong>"EL MUNICIPIO"</strong> SERÁ DE UN MONTO MÁXIMO POR LA CANTIDAD DE <strong><span id="total_letras3" class="campo-dato" contenteditable="true"></span> INCLUIDO EL IMPUESTO AL VALOR AGREGADO I.V.A.</strong> Y UN MONTO MÍNIMO POR LA CANTIDAD DE <strong><span id="subtotal_letras1" class="campo-dato" contenteditable="true"></span>; INCLUIDO EL IMPUESTO AL VALOR AGREGADO I.V.A.,</strong> DIVIDIDO EN PARCIALIDADES NECESARIAS Y A LA CORRECTA PRESENTACIÓN DE LAS FACTURAS, POR EL PERIODO COMPRENDIDO DEL <span id="created_at_texto5" class="campo-dato" contenteditable="true"></span>.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">TERCERA. - ANTICIPO.</div>
                    <div style="margin-left: 20px; margin-top: 5px;"><strong>"EL MUNICIPIO"</strong> NO OTORGARÁ A <strong>"EL PROVEEDOR"</strong> ANTICIPÓ ALGUNO, MOTIVO DEL PRESENTE CONTRATO.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">CUARTA. -- PRECIOS.</div>
                    <div style="margin-left: 20px; margin-top: 5px;">LOS PRECIOS OFERTADOS SERÁN FIJOS Y SOLO PODRÁ HABER MODIFICACIONES EN ELLOS PREVIO AVISO DE <strong>"EL PROVEEDOR"</strong>, DEBIDAMENTE JUSTIFICADO POR ESCRITO.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">QUINTA. -- FORMA DE PAGO.</div>
                    <div style="margin-left: 20px; margin-top: 5px;"><strong>"LAS PARTES"</strong> ACUERDAN QUE EL PAGO POR EL <strong>"<span id="nombre_estudio_anexo9" class="campo-dato" contenteditable="true"></span>"</strong> OBJETO DEL PRESENTE CONTRATO, SE CUBRIRÁ DE LA MANERA SIGUIENTE:</div>
                    <div style="margin-left: 40px; margin-top: 5px;">I. <strong>"EL PROVEEDOR"</strong> ENTREGARÁ SU FACTURA A MÁS TARDAR A LOS DIEZ DÍAS HÁBILES POSTERIORES A LA ENTREGA TOTAL DE LOS ARTÍCULOS ADQUIRIDOS CON SU RESPECTIVO XML PARA TRAMITE DE PAGO EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN LAS INSTALACIONES DEL EX SEMINARIO UBICADAS EN AV. DE LA PAZ ESQUINA MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">II. <strong>"EL MUNICIPIO"</strong> SE COMPROMETE Y OBLIGA A PAGAR LA CANTIDAD MENCIONADA EN LA SEGUNDA CLÁUSULA DEL PRESENTE CONTRATO EN PARCIALIDADES, DE ACUERDO A LAS FACTURAS PRESENTADAS POR PARTE DE <strong>"EL PROVEEDOR"</strong> Y DE CONFORMIDAD A LA DISPOSICIÓN DE RECURSOS PECUNIARIOS, LAS FACTURAS SE ENTREGARÁN EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN LAS INSTALACIONES DEL EX SEMINARIO, UBICADAS EN AV. DE LA PAZ ESQUINA MIGUEL HIDALGO, COL, CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">III. <strong>"EL MUNICIPIO\"</strong>, HARÁ EL PAGO A <strong>"EL PROVEEDOR"</strong>, MEDIANTE TRANSFERENCIA ELECTRÓNICA.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">SEXTA. -- PAGO EN EXCESO</div>
                    <div style="margin-left: 20px; margin-top: 5px; text-align: justify;"><strong>"EL MUNICIPIO"</strong> APREMIA A <strong>"EL PROVEEDOR"</strong> QUE, EN CASO DE RECIBIR POR CUALQUIER CAUSA, CANTIDADES POR EXCESO DE PAGO DERIVADAS DEL PRESENTE CONTRATO, SE OBLIGA A REINTEGRAR ÍNTEGRAMENTE A <strong>"EL MUNICIPIO"</strong> LAS CANTIDADES QUE RESULTEN, DENTRO DE UN PLAZO NO MAYOR A DIEZ (10) DÍAS HÁBILES CONTANDO A PARTIR DE LA NOTIFICACIÓN CORRESPONDIENTE, EFECTUANDO EL PAGO EN LA FORMA Y CUENTA BANCARIA QUE ÉSTE LE INDIQUE. EL INCUMPLIMIENTO DE ESTA OBLIGACIÓN FACULTARA A <strong>"EL MUNICIPIO",</strong> PARA COMPENSAR DICHAS CANTIDADES CONTRA PAGOS PENDIENTES O INICIAR LAS ACCIONES LEGALES CONDUCENTES.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">SÉPTIMA. -- OBLIGACIONES DE <strong>"EL PROVEEDOR"</strong></div>
                    <div style="margin-left: 40px; margin-top: 5px;">I. ENTREGAR A EL MUNICIPIO DE TEMASCALCINGO, MÉXICO EL <strong>"<span id="nombre_estudio_anexo10" class="campo-dato" contenteditable="true"></span>"</strong> EN TIEMPO, FORMA Y CALIDAD.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">II. INFORMAR A <strong>"EL MUNICIPIO"</strong> DE CUALQUIER ANOMALÍA QUE SE PRESENTE DURANTE LA EJECUCIÓN DEL PRESENTE CONTRATO, EN CUANTO IMPIDA O DIFICULTE LLEVAR A CABO EL PROCEDIMIENTO REFERENTE AL <strong>"<span id="nombre_estudio_anexo11" class="campo-dato" contenteditable="true"></span>"</strong> COMUNICAR POR ESCRITO OPORTUNAMENTE A <strong>"EL MUNICIPIO"</strong> CUALQUIER CAMBIO DE DOMICILIO.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">III. CUMPLIR CON LAS DEMÁS OBLIGACIONES QUE DERIVEN DEL PRESENTE CONTRATO.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">OCTAVA. TIEMPO Y LUGAR DE ENTREGA:</div>
                    <div style="margin-left: 20px; margin-top: 5px;">LAS ENTREGAS SE EFECTUARÁN DE FORMA GRADUAL Y CONFORME A LAS ÓRDENES DE COMPRA QUE SE EMITAN, DEBIENDO EL PROVEEDOR GARANTIZAR EL SUMINISTRO OPORTUNO Y CONTINUO DURANTE LA VIGENCIA DEL CONTRATO Y SIENDO ENTREGADOS EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, UBICADO EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">NOVENA. - DE LAS GARANTÍAS.</div>
                    <div style="margin-left: 20px; margin-top: 5px;"><strong>"EL PROVEEDOR"</strong> DEBERÁ ENTREGAR A <strong>"EL MUNICIPIO"</strong> LA GARANTÍA POR CUMPLIMIENTO DE CONTRATO MISMA QUE PODRÁ SER: CHEQUE DE CAJA, CHEQUE CERTIFICADO O FIANZA DE CUMPLIMIENTO DE CONTRATO EMITIDA POR LAS AFIANZADORAS AUTORIZADAS POR EL GOBIERNO DEL ESTADO DE MÉXICO.</div>
                    <div style="margin-left: 20px; margin-top: 5px;">
                        <strong>I. CUMPLIMIENTO DE CONTRATO:</strong> SE CONSTITUIRÁ POR EL 10% DEL IMPORTE DEL SUBTOTAL DEL CONTRATO POR LA CANTIDAD DE <strong><span id="subtotal_letras" class="campo-dato" contenteditable="true"></span>,</strong> DENTRO DE LOS DIEZ DÍAS HÁBILES POSTERIORES A LA FIRMA DE CONTRATO, Y ESTARÁ VIGENTE HASTA EL CUMPLIMIENTO DEL PRESENTE.
                    </div>
                    <div style="margin-left: 20px; margin-top: 5px;">LA GARANTIA DEBERÁ CONTENER LAS SIGUIENTES DECLARACIONES EXPRESAS:</div>
                    <div style="margin-left: 40px; margin-top: 5px;">SE OTORGA EN LOS TÉRMINOS DEL PRESENTE CONTRATO.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">a. LA GARANTÍA SE EMITIRÁ A NOMBRE DEL <strong>"MUNICIPIO DE TEMASCALCINGO"</strong></div>
                    <div style="margin-left: 40px; margin-top: 5px;">b. QUE LA GARANTÍA CONTINUARÁ VIGENTE EN EL CASO DE QUE SE OTORGUE PRÓRROGA O ESPERA AL FIADOR PARA EL CUMPLIMIENTO DE LAS OBLIGACIONES QUE SE AFIANZAN, AUNQUE HAYAN SIDO SOLICITADAS O AUTORIZADAS EXTEMPORÁNEAMENTE.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">c. QUE PARA CANCELAR LA GARANTÍA SERÁ REQUISITO INDISPENSABLE LA CONFORMIDAD EXPRESA Y POR ESCRITO DE <strong>"EL MUNICIPIO",</strong> QUIEN LO EMITIRÁ SOLO CUANDO <strong>"EL PROVEEDOR"</strong> HAYA CUMPLIDO EL PERIODO DEL CONTRATO.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">d. QUE LA INSTITUCIÓN AFIANZADORA ACEPTA EXPRESAMENTE LO PRECEPTUADO EN LOS ARTÍCULOS 93, 94 Y 118 DE LA LEY FEDERAL DE LAS INSTITUCIONES DE SEGUROS Y FIANZAS VIGENTE.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">e. QUE <strong>"EL MUNICIPIO"</strong> HARÁ EFECTIVA LA GARANTÍA A PARTIR DEL INCUMPLIMIENTO DE CUALQUIER OBLIGACIÓN CONSIGNADA EN TODAS Y CADA UNA DE LAS CLÁUSULAS DEL PRESENTE CONTRATO, POR LA CANTIDAD EN DINERO QUE SE ORIGINE.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">f. QUE <strong>"EL MUNICIPIO"</strong> HARÁ EFECTIVA LA GARANTÍA EN CASO DE QUE SEA RESCINDIDO EL CONTRATO CELEBRADO POR CAUSAS IMPUTABLES A <strong>"EL PROVEEDOR".</strong></div>
                    <div style="margin-left: 20px; margin-top: 5px;">SI TRANSCURRIDO EL PLAZO SEÑALADO EN EL PRIMER PÁRRAFO <strong>"EL PROVEEDOR"</strong> NO HUBIERE PRESENTADO LA GARANTÍA DE CUMPLIMIENTO RESPECTIVA, <strong>"EL MUNICIPIO"</strong> NO FORMALIZARÁ EL PRESENTE INSTRUMENTO.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">DÉCIMA. -- SUPERVISIÓN. -</div>
                    <div style="margin-left: 20px; margin-top: 5px;"><strong>"LAS PARTES"</strong> ACUERDAN QUE, PARA EL ADECUADO CUMPLIMIENTO DEL OBJETO DEL PRESENTE CONTRATO, TANTO <strong>"EL MUNICIPIO"</strong> COMO <strong>"EL PROVEEDOR"</strong> DESIGNARÁN AL PERSONAL RESPONSABLE DE SUPERVISAR, VERIFICAR Y DAR SEGUIMIENTO A LA CORRECTA EJECUCIÓN DEL <strong>"<span id="nombre_estudio_anexo12" class="campo-dato" contenteditable="true"></span>".</strong></div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">DÉCIMA PRIMERA. - RESCISIÓN. -</div>
                    <div style="margin-left: 20px; margin-top: 5px;"><strong>"EL MUNICIPIO"</strong>, PODRÁ INICIAR EL PROCEDIMIENTO DE RESCISIÓN DEL PRESENTE CONTRATO, SIN RESPONSABILIDAD ALGUNA PARA EL, POR LAS SIGUIENTES CAUSAS IMPUTABLES A <strong>"EL PROVEEDOR":</strong></div>
                    <div style="margin-left: 40px; margin-top: 5px;">I. PARA EL CASO DE QUE <strong>"EL PROVEEDOR"</strong> NO PRESENTE LA GARANTÍA DESCRITA EN LA FRACCIÓN I DE LA CLÁUSULA OCTAVA DEL PRESENTE CONTRATO, SE RESCINDIRÁ EL MISMO, DEBIENDO PAGAR ÉSTE A "EL MUNICIPIO" LOS DAÑOS Y PERJUICIOS QUE ELLO LE OCASIONE, ASÍ COMO LAS DEMÁS SANCIONES QUE EL PRESENTE CONTRATO ESTABLECE.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">II. SI <strong>"EL PROVEEDOR"</strong> NO DE LAS FACILIDADES NECESARIAS A LOS SERVIDORES PÚBLICOS QUE AL EFECTO DESIGNE <strong>"EL MUNICIPIO"</strong> PARA LLEVAR A CABO LA REVISIÓN DEL SUMINISTRO DE LOS BIENES ADQUIRIDOS.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">III. SI <strong>"EL PROVEEDOR"</strong> CEDE, TRASPASA O SUBCONTRATA LA TOTALIDAD O PARTE DE LOS ARTÍCULOS ADQUIRIDOS SIN EL CONSENTIMIENTO POR ESCRITO DE <strong>"EL MUNICIPIO"</strong> Y SI CEDE A TERCEROS EN FORMA PARCIAL O TOTAL LOS DERECHOS Y OBLIGACIONES, Y LOS DERECHOS DE COBRO DERIVADOS DEL PRESENTE CONTRATO, SIN OBTENER LA AUTORIZACIÓN PREVIA POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">IV. SI ES DECLARADO EN PROCEDIMIENTO ADQUISITIVO MERCANTIL, QUIEBRA O SUSPENSIÓN DE PAGOS, EN TÉRMINOS DE LO QUE ESTABLECE EL CÓDIGO DE COMERCIO Y DE MANERA SUPLETORIA EL CÓDIGO CIVIL FEDERAL.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">V. CAMBIE SU NACIONALIDAD MEXICANA POR OTRA.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">VI. SIENDO EXTRANJERO INVOQUE LA PROTECCIÓN DE SU GOBIERNO EN RELACIÓN AL PRESENTE CONTRATO.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">VII. EN GENERAL, POR INCUMPLIMIENTO DE CUALESQUIERA DE LAS OBLIGACIONES DERIVADAS DEL PRESENTE CONTRATO, EL CÓDIGO, EL REGLAMENTO, LOS TRATADOS Y DEMÁS DISPOSICIONES APLICABLES.</div>
                    <div style="margin-left: 40px; margin-top: 5px;">VIII. POR CUALQUIER OTRA CAUSA IMPUTABLE A ÉL, SIMILAR A LAS ANTES MENCIONADAS.</div>
                    <div style="margin-left: 20px; margin-top: 5px;">EN CASO DE QUE <strong>"EL MUNICIPIO"</strong> OPTE POR LA RESCISIÓN DEL CONTRATO; <strong>"EL PROVEEDOR"</strong> ESTARÁ OBLIGADO A PAGAR DAÑOS Y PERJUICIOS, OCASIONADOS A <strong>"EL MUNICIPIO"</strong>.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">DÉCIMA SEGUNDA. -- RELACIÓN LABORAL</div>
                    <div style="margin-left: 20px; margin-top: 5px; text-align: justify;"><strong>"EL PROVEEDOR",</strong> EN SU CALIDAD DE EMPRESARIO Y EMPLEADOR DEL PERSONAL QUE INTERVENGA EN LA PRESTACIÓN DE LOS SERVICIOS OBJETO DE ESTE CONTRATO, DECLARA QUE DISPONE DE LOS RECURSOS PROPIOS Y SUFICIENTES PARA ASUMIR PLENAMENTE LAS OBLIGACIONES DERIVADAS DE LAS RELACIONES LABORALES. EN CONSECUENCIA, SERÁ EL ÚNICO RESPONSABLE DEL CUMPLIMIENTO DE LAS DISPOSICIONES LEGALES Y DEMÁS NORMATIVAS APLICABLES EN MATERIA LABORAL Y DE SEGURIDAD SOCIAL, ASÍ COMO DE ATENDER Y RESPONDER POR CUALQUIER RECLAMACIÓN QUE SUS TRABAJADORES PRESENTEN EN SU CONTRA O EN CONTRA DE <strong>"EL MUNICIPIO"</strong> RELACIONADA CON LOS BIENES OBJETO DEL PRESENTE CONTRATO.</div>
                </div>

                <div class="numero-pagina">18 DE ?</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 19: ANEXO 5 - CLÁUSULAS DÉCIMA TERCERA A VIGÉSIMA Y FIRMAS -->
        <!-- ========================================== -->
        <div class="hoja" id="hoja19">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div style="margin-top: 5px;">
                    <div style="font-weight: bold;">DÉCIMA TERCERA. -- PATENTES, MARCAS Y DERECHOS DE AUTOR.</div>
                    <div style="margin-left: 20px; margin-top: 5px; text-align: justify;"><strong>"EL PROVEEDOR"</strong> SERÁ RESPONSABLE POR LAS VIOLACIONES QUE SE CAUSEN EN MATERIA DE PATENTES, MARCAS O DERECHOS DE AUTOR, CON MOTIVO DE LA ADQUISICIÓN, ORIGEN, USO, ENAJENACIÓN Y EXPLOTACIÓN DE LOS BIENES O SERVICIOS OBJETO DEL CONTRATO, POR LO QUE SE OBLIGA A SACAR EN PAZ Y A SALVO A <strong>"EL MUNICIPIO",</strong> EN CASO DE CUALQUIER RECLAMACIÓN DE UN TERCERO QUE ALEGUE DERECHOS POR VIOLACIONES A LA LEY DE PROPIEDAD INDUSTRIAL Y A LA LEY FEDERAL DEL DERECHO DE AUTOR, SOBRE LOS BIENES O SERVICIOS MATERIA DEL PRESENTE CONTRATO, SIN CARGO ALGUNO PARA ÉSTE Y LA RESPONSABILIDAD RECAERÁ UNICAMENTE EN <strong>"EL PROVEEDOR"</strong></div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">DÉCIMA CUARTA. -- TERMINACIÓN ANTICIPADA</div>
                    <div style="margin-left: 20px; margin-top: 5px; text-align: justify;"><strong>"EL MUNICIPIO",</strong> PODRÁ DAR POR TERMINADO ANTICIPADAMENTE EL CONTRATO SIN RESPONSABILIDAD ALGUNA A SU CARGO. EN ESTE SUPUESTO <strong>"EL MUNICIPIO"</strong> COMUNICARÁ POR ESCRITO A <strong>"EL PROVEEDOR"</strong> LA FECHA EN QUE SURTIRÁ EFECTOS DICHA TERMINACIÓN.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">DÉCIMA QUINTA. -- RENUNCIA DE FUERO</div>
                    <div style="margin-left: 20px; margin-top: 5px;"><strong>"LAS PARTES"</strong> RENUNCIAN EXPRESAMENTE A CUALQUIER FUERO DISTINTO, SOMETIÉNDOSE A LOS TRIBUNALES DEL ESTADO DE MÉXICO.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">DÉCIMA SEXTA. -- MODIFICACIÓN. -</div>
                    <div style="margin-left: 20px; margin-top: 5px; text-align: justify;"><strong>"EL MUNICIPIO"</strong> DENTRO DE SU PRESUPUESTO APROBADO, PODRÁ MODIFICAR EL PRESENTE CONTRATO DE CONFORMIDAD CON LO ESTABLECIDO EN EL ARTÍCULO 125 DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, SIEMPRE QUE DICHAS MODIFICACIONES NO REBASEN EN SU CONJUNTO EL 30% DEL IMPORTE ORIGINAL DEL CONTRATO Y QUE LOS PRECIOS DE LOS BIENES SE MANTENGAN EN LOS MISMOS TÉRMINOS PACTADOS INICIALMENTE.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">DÉCIMA SÉPTIMA. -- LEGISLACIÓN</div>
                    <div style="margin-left: 20px; margin-top: 5px;">ESTE CONTRATO SE RIGE POR LO ESTABLECIDO EN LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y SU RESPECTIVO REGLAMENTO.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">DÉCIMA OCTAVA. - JURISDICCIÓN</div>
                    <div style="margin-left: 20px; margin-top: 5px; text-align: justify;">PARA LA INTERPRETACIÓN, EJECUCIÓN, CUMPLIMIENTO O TERMINACIÓN DEL PRESENTE CONTRATO, <strong>"LAS PARTES"</strong> ACUERDAN SOMETERSE EXPRESAMENTE A LA JURISDICCIÓN Y COMPETENCIA DEL TRIBUNAL DE JUSTICIA ADMINISTRATIVA DEL ESTADO DE MÉXICO, RENUNCIANDO DESDE ESTE MOMENTO A CUALQUIER OTRO FUERO QUE POR RAZÓN DE SU DOMICILIO O PRESENTE FUTURO PUDIERA CORRESPONDERLES.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">DÉCIMA NOVENA. - POR NO LLEGAR AL MONTO MÍNIMO</div>
                    <div style="margin-left: 20px; margin-top: 5px; text-align: justify;">EL SUMINISTRO ESTARÁ SUJETO A LOS REQUERIMIENTOS DE LAS ÁREAS ADMINISTRATIVAS DEL MUNICIPIO DE TEMASCALCINGO, MÉXICO, POR LO QUE, EN EL CASO DE NO ADQUIRIR EL MONTO MÍNIMO, POR ALGUNA SITUACIÓN NO IMPUTABLE A <strong>"EL MUNICIPIO"</strong> NO SE GENERARÁ NINGÚN TIPO DE RESPONSABILIDAD Y/O SANCIÓN POR NINGUNA DE LAS PARTES.</div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="font-weight: bold;">VIGÉSIMA. - PENAS CONVENCIONALES</div>
                    <div style="margin-left: 20px; margin-top: 5px; text-align: justify;">EN CASO DEL INCUMPLIMIENTO POR PARTE DE <strong>"EL PROVEEDOR"</strong> DE LAS OBLIGACIONES PACTADAS EN EL CONTRATO, SE APLICARÁ UNA PENA CONVENCIONAL EQUIVALENTE AL MONTO QUE RESULTE DE APLICAR EL 10% DEL VALOR DE LOS BIENES QUE NO SE HAYAN SUMINISTRADO A SATISFACCIÓN DE <strong>"EL MUNICIPIO",</strong> LO ANTERIOR, CON FUNDAMENTO EN LO DISPUESTO EN EL ARTÍCULO 120 FRACCIÓN VII DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                </div>

                <div style="margin-top: 15px; text-align: justify;">
                    UNA VEZ LEÍDO EL PRESENTE CONTRATO Y CONFORMES CON SU CONTENIDO, PROCEDEN A RATIFICAR EN TODAS Y CADA UNA DE SUS PARTES FIRMÁNDOLO POR TRIPLICADO, AL CALCE Y AL MARGEN PARA DEBIDA CONSTANCIA LEGAL, EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, A LOS <span id="created_at_texto7" class="campo-dato" contenteditable="true"></span>.
                </div>

                <!-- FIRMAS DEL CONTRATO -->
                <div style="margin-top: 20px; border: 1px solid #000; width: 100%;">
                    <div style="text-align: center; font-weight: bold; padding: 8px;">POR "EL MUNICIPIO"</div>
                    <div style="display: flex; border-top: 1px solid #000;">
                        <div style="flex: 1; text-align: center; padding: 15px 5px; border-right: 1px solid #000;">
                            <div style="margin-top: 30px;"></div>
                            <strong>C. VERÓNICA MORENO MARTÍNEZ</strong><br>
                            <strong>PRESIDENTA MUNICIPAL CONSTITUCIONAL</strong>
                        </div>
                        <div style="flex: 1; text-align: center; padding: 15px 5px;">
                            <div style="margin-top: 30px;"></div>
                            <strong>C. RAMIRO GALINDO REYES</strong><br>
                            <strong>SECRETARIO DEL AYUNTAMIENTO</strong>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 15px; border: 1px solid #000;">
                    <div style="text-align: center; font-weight: bold; padding: 8px;">POR "EL ÁREA USUARIA"</div>
                    <div style="text-align: center; padding: 15px;">
                        <div style="margin-top: 20px;"></div>
                        <strong>C. MIRIAM VIANEY OVANDO RUBIO</strong><br>
                        <strong>DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL</strong>
                    </div>
                </div>

                <div style="margin-top: 15px; border: 1px solid #000;">
                    <div style="text-align: center; font-weight: bold; padding: 8px;">POR "EL PROVEEDOR"</div>
                    <div style="text-align: center; padding: 15px;">
                        <div style="margin-top: 20px;"></div>
                        <span id="nombre_proveedor6" class="campo-dato" contenteditable="true"></span><br>
                        <strong>EN SU CARÁCTER DE PERSONA <span id=" tipo_persona3" class="campo-dato" contenteditable="true"></span> O</strong><br>
                        <strong>REPRESENTANTE LEGAL</strong>
                    </div>
                </div>

                <div class="numero-pagina">19 DE ?</div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/portalProceso/basesLicitacion.js"></script>
    <script>
        // Aquí puedes agregar scripts personalizados si los necesitas
    </script>
</body>

</html>