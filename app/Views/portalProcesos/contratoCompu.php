<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato de Equipo de Cómputo 2026</title>
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
            padding: 18mm 15mm;
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
            font-size: 8pt;
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
            font-size: 8pt;
            margin-top: 25px;
        }

        .pie-contrato {
            font-size: 7pt;
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 8px;
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
        <span style="font-weight:bold;">📄 CONTRATO ABIERTO EQUIPO DE CÓMPUTO 2026</span>
        <div>
            <button class="btn btn-volver" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Regresar</button>
            <button class="btn" id="btnGuardar"><i class="fas fa-save"></i> Guardar</button>
        </div>
    </div>

    <div class="contenedor-documento">

        <!-- ========================================== -->
        <!-- HOJA 1: DECLARACIONES Y DEFINICIONES -->
        <!-- ========================================== -->
        <div class="hoja">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div style="margin: 10px 0;">[MTM/CAYS/PF/<span id="no_licitacion" contenteditable="true">IRNP-001/2026</span>]</div>

                <div style="font-weight: bold; font-size: 12pt; text-align: center; margin: 20px 0;">CONTRATO ABIERTO PARA LA<br><span id="nombre_estudio" class="campo campo-largo" contenteditable="true">"ADQUISICIÓN DE EQUIPOS DE CÓMPUTO"</span></div>

                <div style="text-align: justify; margin-bottom: 15px;">CONTRATO ABIERTO PARA LA <strong>"ADQUISICIÓN DE EQUIPOS DE CÓMPUTO"</strong> QUE CELEBRAN POR UNA PARTE EL MUNICIPIO CONSTITUCIONAL DE TEMASCALCINGO, MÉXICO, REPRESENTADO EN ESTE ACTO POR LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL, <strong>C. RAMIRO GALINDO REYES</strong>, SECRETARIO DEL AYUNTAMIENTO, <strong>C. MIRIAM VIANEY OVANDO RUBIO,</strong> DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL Y ÁREA USUARIA; QUIÉN EN LO SUCESIVO Y PARA LOS EFECTOS DEL PRESENTE SE LE DENOMINARÁ <strong>"EL MUNICIPIO"</strong>; Y POR OTRA PARTE <span id="nombre_empresa2" class="campo campo-largo" contenteditable="true"></span> REPRESENTADO EN ESTE ACTO POR EL <span id="representante_legal" class="campo campo-largo" contenteditable="true"></span>, EN SU CARÁCTER DE <strong>APODERADO LEGAL</strong>, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ <strong>"EL PROVEEDOR"</strong>, AL TENOR DE LAS DECLARACIONES Y CLÁUSULAS SIGUIENTES:</div>

                <div class="clausula"><strong>DECLARACIONES</strong></div>
                <div class="clausula"><strong>I. "EL MUNICIPIO" DECLARA:</strong></div>
                <div class="declaracion-item">1. QUE CON ARREGLO A LO PREVISTO POR LOS ARTÍCULOS 115, DE LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS; 113, 116 , 123, Y 125, DE LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, 31, FRACCIÓN XVIII, DE LA LEY ORGÁNICA MUNICIPAL DEL ESTADO DE MÉXICO; ASÍ COMO LOS ARTÍCULOS 65, 66, 67, 68, 69, 70, 71, 72, 73, 74 Y 75 DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO EL 120, 123, 124, 125 Y 127 DEL REGLAMENTO; EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, TIENE LA ATRIBUCIÓN PARA CELEBRAR EL PRESENTE CONTRATO.</div>
                <div class="declaracion-item">2. QUE LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL, ESTÁ FACULTADA PARA CONOCER, OTORGAR Y SUSCRIBIR ESTE CONTRATO.</div>
                <div class="declaracion-item">3. QUE EL <strong>C. RAMIRO GALINDO REYES,</strong> EN SU CARÁCTER DE SECRETARIO DEL AYUNTAMIENTO, EN TÉRMINOS DE LO QUE ESTABLECE EL ARTÍCULO 91 FRACCIÓN V DE LA LEY ORGÁNICA MUNICIPAL, TIENE LA ATRIBUCIÓN DE VALIDAR CON SU FIRMA LOS DOCUMENTOS OFICIALES EMANADOS DE <strong>"EL MUNICIPIO"</strong> Y DE CUALQUIERA DE SUS MIEMBROS.</div>
                <div class="declaracion-item">4. LAS DEPENDENCIAS Y ENTIDADES DE LA ADMINISTRACIÓN PÚBLICA MUNICIPAL CONDUCIRÁN SUS ACCIONES CON BASE A LOS PROGRAMAS ANUALES QUE ESTABLECE EL MUNICIPIO PARA EL LOGRO DE SUS OBJETIVOS.</div>
                <div class="declaracion-item">5. QUE TIENE ESTABLECIDO SU DOMICILIO EN <span id="domicilio_proveedor" class="campo campo-largo" contenteditable="true"></span>, MISMO QUE SE SEÑALA PARA LOS FINES Y EFECTOS LEGALES DEL PRESENTE INSTRUMENTO.</div>
                <div class="declaracion-item">6. MANIFIESTA <strong>"EL MUNICIPIO"</strong> QUE CUENTA EN SU HABER CON RECURSOS PECUNIARIOS PROVENIENTES DE <strong>PARTICIPACIONES FEDERALES (PF-2026),</strong> DESTINADOS A LA <span id="nombre_estudio1" class="campo campo-mediano" contenteditable="true"></span>, CON EL OBJETO DE FORTALECER LA OPERACIÓN ADMINISTRATIVA, GARANTIZAR LA CONTINUIDAD EN LA EMISIÓN DE DOCUMENTOS OFICIALES, LA ATENCIÓN CIUDADANA, LOS PROCESOS DE GOBIERNO, LAS GESTIONES ADMINISTRATIVAS Y EL CUMPLIMIENTO DE LAS OBLIGACIONES NORMATIVAS, DE CONFORMIDAD CON EL PRESUPUESTO DE EGRESOS DE LA FEDERACIÓN PARA EL EJERCICIO FISCAL 2026.</div>
                <div class="declaracion-item">7. QUE LA ADJUDICACIÓN DEL CONTRATO SE REALIZÓ MEDIANTE PROCEDIMIENTO ADQUISITIVO POR INVITACIÓN RESTRINGIDA DE CONFORMIDAD CON EL ARTÍCULO 43, 44 Y 46 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS Y 90, DE SU REGLAMENTO.</div>

                <div class="clausula"><strong>II. DE "EL PROVEEDOR", BAJO PROTESTA DE DECIR VERDAD DECLARA:</strong></div>
                <div class="declaracion-item">1. QUE ES UNA EMPRESA CONSTITUIDA LEGALMENTE DE ACUERDO CON LAS LEYES MEXICANAS, SEGÚN LO ACREDITA CON <strong>ACTA CONSTITUTIVA NÚMERO <span id="num_acta_cons" class="campo campo-mediano" contenteditable="true"></span>, LIBRO <span id="num_libro" class="campo campo-mediano" contenteditable="true"></span>, DE FECHA <span id="created_at" class="campo campo-mediano" contenteditable="true"></span> ANTE LA FE DEL <span id="titular" class="campo campo-mediano" contenteditable="true"></span>, TITULAR DE LA NOTARÍA NÚMERO <span id="datos_notario" class="campo campo-mediano" contenteditable="true"></span>, DEL DISTRITO FEDERAL (HOY CIUDAD DE MÉXICO),</strong> E INSCRITA EN EL REGISTRO PÚBLICO DE LA PROPIEDAD Y DE COMERCIO DE LA CIUDAD DE MÉXICO, CON FOLIO MERCANTIL NÚMERO 55273 DE FECHA <span id="created_at_texto2" class="campo campo-mediano" contenteditable="true"></span>, DOCUMENTO QUE SE ENCUENTRA AGREGADO AL EXPEDIENTE QUE CONTIENE EL PROCEDIMIENTO ADJUDICATARIO REFERIDO.</div>
                <div class="declaracion-item">2. QUE SU REGISTRO FEDERAL DE CONTRIBUYENTES ES <span id="numero_rfc1" class="campo campo-mediano" contenteditable="true"></span>, CON ACTIVIDAD ECONÓMICA EN OTROS INTERMEDIARIOS DE COMERCIO AL POR MAYOR.</div>
                <div class="declaracion-item">3. QUE EL <span id="representante_legal2" class="campo campo-largo" contenteditable="true"></span>, EN SU CARÁCTER DE <strong>APODERADO LEGAL</strong>, SE ACREDITA CON PODER GENERAL, INSTRUMENTO <span id="instrumento_re1" class="campo campo-mediano" contenteditable="true"></span>, LIBRO <span id="num_libro1" class="campo campo-mediano" contenteditable="true"></span> DE FECHA <span id="created_at_texto3" class="campo campo-mediano" contenteditable="true"></span>, ANTE LA FE DEL LICENCIADO <span id="datos_notario" class="campo campo-mediano" contenteditable="true">JOSÉ RAMÍREZ GÓMEZ</span>, TITULAR DE LA NOTARÍA NÚMERO CIENTO SESENTA DEL DISTRITO FEDERAL (HOY CIUDAD DE MÉXICO), ASIMISMO SE IDENTIFICA CON CREDENCIAL PARA VOTAR CON NÚMERO DE FOLIO <span id="num_credencial_repre" class="campo campo-mediano" contenteditable="true">INE123456789</span>, EXPEDIDA POR EL INSTITUTO NACIONAL ELECTORAL.</div>
                <div class="declaracion-item">4. QUE PARA EFECTOS DEL PRESENTE CONTRATO LA EMPRESA <span id="nombre_empresa3" class="campo campo-largo" contenteditable="true">PRONABYS, S.A. DE C.V.</span>, SEÑALA COMO SU DOMICILIO PARTICULAR UBICADO EN <span id="domicilio_proveedor2" class="campo campo-largo" contenteditable="true"></span>, TELÉFONO <span id="num_telefonico" class="campo campo-mediano" contenteditable="true"></span> Y CORREO ELECTRÓNICO <span id="correo_electronico" class="campo campo-mediano" contenteditable="true"></span>.</div>
                <div class="declaracion-item">5. QUE CONOCE LAS ESPECIFICACIONES PARA REALIZAR EL SUMINISTRO POR LA <span id="nombre_estudio3" class="campo campo-mediano" contenteditable="true"></span> Y DEMÁS DOCUMENTOS QUE SE ENCUENTRAN INTEGRADOS AL EXPEDIENTE QUE SE FORMÓ CON MOTIVO DEL PROCEDIMIENTO DE ADQUISICIÓN DE BIENES ANTES REFERIDO.</div>
                <div class="declaracion-item">6. QUE BAJO PROTESTA DE DECIR VERDAD LA EMPRESA QUE REPRESENTA NO SE ENCUENTRA EN NINGUNO DE LOS SUPUESTOS QUE ESTABLECE EL ARTÍCULO 74 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

                <div class="clausula"><strong>III. DE LAS "PARTES"</strong></div>
                <div class="declaracion-item">1. QUE EN VIRTUD DE LAS DECLARACIONES QUE ANTECEDEN, Y UNA VEZ QUE SE HAN RECONOCIDO SU CAPACIDAD Y PERSONALIDAD, CONVIENEN EXPRESAMENTE EN SUJETARSE A LAS SIGUIENTES:</div>

                <div class="clausula"><strong>DEFINICIONES.</strong></div>
                <div class="declaracion-item"><strong>"LAS PARTES"</strong> CONVIENEN QUE, PARA LOS EFECTOS DEL PRESENTE CONTRATO, SE ENTENDERÁ POR:</div>
                <div class="declaracion-item">1. LEY: LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                <div class="declaracion-item">2. REGLAMENTO: EL REGLAMENTO DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

                <div class="numero-pagina">1 DE 4</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 2: CLÁUSULA PRIMERA (OBJETO) + TABLA + CLÁUSULA SEGUNDA A QUINTA -->
        <!-- ========================================== -->
        <div class="hoja">
            <img class="marca-agua" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Flor.svg/512px-Flor.svg.png">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>CLÁUSULAS</strong></div>

                <div class="clausula"><strong>PRIMERA. - OBJETO.</strong> EL PRESENTE CONTRATO TIENE POR OBJETO QUE <strong>"EL PROVEEDOR"</strong> SUMINISTRE A <strong>"EL MUNICIPIO"</strong> LA COMPRA REFERENTE A LA <span id="nombre_estudio4" class="campo campo-mediano" contenteditable="true"></span>, COMPRA QUE TIENE POR OBJETIVO FORTALECER LA OPERACIÓN ADMINISTRATIVA, GARANTIZAR LA CONTINUIDAD EN LA EMISIÓN DE DOCUMENTOS OFICIALES, LA ATENCIÓN CIUDADANA, LOS PROCESOS DE GOBIERNO, LAS GESTIONES ADMINISTRATIVAS Y EL CUMPLIMIENTO DE LAS OBLIGACIONES NORMATIVAS. LOS BIENES Y SERVICIOS OBJETO DEL PRESENTE CONTRATO SE DETALLAN EN LA TABLA SIGUIENTE, MISMA QUE FORMA PARTE INTEGRAL DE LA PRESENTE CLÁUSULA.</div>

                <table>
                    <thead>
                        <tr>
                            <th># PARTIDA</th>
                            <th>DESCRIPCIÓN DE LOS BIENES</th>
                            <th>UNIDAD DE MEDIDA</th>
                            <th>CANTIDAD</th>
                            <th>MARCA Y MODELO PROPUESTO</th>
                            <th>PRECIO UNITARIO</th>
                            <th>IMPORTE</th>
                        </tr>
                    </thead>
                    <tbody id="tabla_productos_body">
                        <!-- Los productos se cargan dinámicamente con JS -->
                    </tbody>
                </table>

                <div style="text-align: right; margin-top: 5px;"><span id="precio_total_texto" class="campo campo-mediano" contenteditable="true">NOVECIENTOS OCHENTA Y SIETE MIL OCHOCIENTOS OCHENTA Y SEIS PESOS 22/100 M.N.</span></div>

                <table style="width: auto; float: right; border: none;">
                    <tr style="border: none;">
                        <td style="border: none;">SUBTOTAL</td>
                        <td style="border: none;">:</td>
                        <td style="border: none;" id="subtotal_valor" class="celda-editable" contenteditable="true">$851,626.05</td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;">I.V.A.</td>
                        <td style="border: none;">:</td>
                        <td style="border: none;" id="iva_valor" class="celda-editable" contenteditable="true">$136,260.17</td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;">TOTAL</td>
                        <td style="border: none;">:</td>
                        <td style="border: none;" id="total_valor" class="celda-editable" contenteditable="true">$987,886.22</td>
                    </tr>
                </table>
                <div style="clear: both;"></div>

                <div class="clausula"><strong>SEGUNDA. -- IMPORTE.</strong> LA CANTIDAD TOTAL A PAGAR POR PARTE DE <strong>"EL MUNICIPIO"</strong> SERÁ POR UN <strong>MONTO MÍNIMO</strong> DE <strong>$<span id="monto_minimo" class="campo campo-corto" contenteditable="true">592,731.32</span> (<span id="monto_minimo_texto" class="campo campo-mediano" contenteditable="true">QUINIENTOS NOVENTA Y DOS MIL SETECIENTOS TREINTA Y UN PESOS 32/100 M.N.</span>)</strong> INCLUIDO EL IMPUESTO AL VALOR AGREGADO Y UN <strong>MONTO MÁXIMO</strong> DE <strong>$<span id="monto_maximo" class="campo campo-corto" contenteditable="true">987,886.22</span> (<span id="monto_maximo_texto" class="campo campo-mediano" contenteditable="true">NOVECIENTOS OCHENTA Y SIETE MIL OCHOCIENTOS OCHENTA Y SEIS PESOS 22/100 M.N.</span>)</strong> INCLUIDO EL IMPUESTO AL VALOR AGREGADO I.V.A., EL PAGO SE REALIZARÁ DE MANERA <strong>PARCIAL</strong>, POR CADA EQUIPO DE CÓMPUTO SOLICITADO, PREVIA EMISIÓN DE LA ORDEN DE COMPRA CORRESPONDIENTE Y UNA VEZ EFECTUADA LA ENTREGA DEL EQUIPO REQUERIDO.</div>

                <div class="clausula"><strong>TERCERA. - ANTICIPO.</strong> <strong>"EL MUNICIPIO"</strong> NO OTORGARÁ A <strong>"EL PROVEEDOR"</strong> ANTICIPÓ ALGUNO, POR LOS BIENES ADQUIRIDOS MOTIVO DEL PRESENTE CONTRATO.</div>

                <div class="clausula"><strong>CUARTA. - "LAS PARTES"</strong> CONVIENEN QUE LOS PRECIOS OFERTADOS SON FIJOS Y NO PODRÁN MODIFICARSE.</div>

                <div class="clausula"><strong>QUINTA: "LAS PARTES"</strong> ACUERDAN QUE EL PAGO POR EL SUMINISTRO PARA LA <span id="nombre_estudio33" class="campo campo-mediano" contenteditable="true"></span>, OBJETO DEL PRESENTE CONTRATO, SE CUBRIRÁ DE LA MANERA SIGUIENTE:</div>
                <div class="declaracion-item">I. CADA REQUERIMIENTO DE EQUIPO SERÁ SOLICITADO POR <strong>"EL MUNICIPIO"</strong> MEDIANTE LA EMISIÓN DE LA ORDEN DE COMPRA CORRESPONDIENTE. UNA VEZ REALIZADA LA ENTREGA DEL EQUIPO SOLICITADO, <strong>"EL PROVEEDOR"</strong> ENTREGARÁ SU FACTURA A MÁS TARDAR A LOS DIEZ DÍAS HÁBILES POSTERIORES A LA ENTREGA DE LOS EQUIPOS SOLICITADOS CON SU RESPECTIVO XML PARA TRÁMITE DE PAGO EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN LAS INSTALACIONES DEL EX SEMINARIO UBICADAS EN AV. DE LA PAZ ESQUINA MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>
                <div class="declaracion-item">II. <strong>"EL PROVEEDOR"</strong> DEBERÁ EMITIR E INGRESAR LA FACTURA CORRESPONDIENTE (CFDI) POR CADA EQUIPO DE CÓMPUTO ENTREGADO, A NOMBRE DEL <strong>"MUNICIPIO DE TEMASCALCINGO"</strong> EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.</div>
                <div class="declaracion-item">III. <strong>"EL MUNICIPIO"</strong>, HARÁ EL PAGO A <strong>"EL PROVEEDOR"</strong>, MEDIANTE TRANSFERENCIA ELECTRÓNICA.</div>

                <div class="numero-pagina">2 DE 4</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 3: CLÁUSULA SEXTA A DÉCIMA OCTAVA -->
        <!-- ========================================== -->
        <div class="hoja">
            <img class="marca-agua" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Flor.svg/512px-Flor.svg.png">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>SEXTA</strong>: PARA EL CUMPLIMIENTO DEL OBJETO DEL PRESENTE CONTRATO <strong>"EL PROVEEDOR"</strong> SE OBLIGA A:</div>
                <div class="declaracion-item">I. LLEVAR A CABO EL SUMINISTRO POR LA <span id="nombre_estudio5" class="campo campo-mediano" contenteditable="true"></span>, EN LOS TÉRMINOS PACTADOS DENTRO DE LA CLÁUSULA PRIMERA DE ESTE INSTRUMENTO.</div>
                <div class="declaracion-item">II. REEMPLAZAR LOS EQUIPOS DE CÓMPUTO QUE PRESENTEN TODO TIPO DE FALLAS, EN UN PLAZO NO MAYOR A CINCO DÍAS HÁBILES POSTERIORES AL REPORTE EMITIDO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.</div>
                <div class="declaracion-item">III. INFORMAR A <strong>"EL MUNICIPIO"</strong> DE CUALQUIER ANOMALÍA QUE SE PRESENTE DURANTE LA EJECUCIÓN DEL PRESENTE CONTRATO, EN CUANTO IMPIDA O DIFICULTE LLEVAR A CABO LA <span id="nombre_estudio15" class="campo campo-mediano" contenteditable="true">"A.</div>
                <div class="declaracion-item">IV. COMUNICAR POR ESCRITO OPORTUNAMENTE A <strong>"EL MUNICIPIO"</strong> CUALQUIER CAMBIO DE DOMICILIO.</div>
                <div class="declaracion-item">V. CUMPLIR CON LAS DEMÁS OBLIGACIONES QUE DERIVEN DEL PRESENTE CONTRATO.</div>

                <div class="clausula"><strong>SEPTIMA. TIEMPO, FORMA Y LUGAR DE ENTREGA</strong>: LA ENTREGA POR LA <span id="nombre_estudio9" class="campo campo-mediano" contenteditable="true"></span>, SEÑALADOS EN LA CLÁUSULA PRIMERA OBJETO DE ESTE CONTRATO SE LLEVARÁ A CABO EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, UBICADO EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>

                <div class="clausula"><strong>OCTAVA. - DE LAS GARANTÍAS. "EL PROVEEDOR"</strong> DEBERÁ ENTREGAR A <strong>"EL MUNICIPIO"</strong> LAS GARANTÍAS SIGUIENTES:</div>
                <div class="declaracion-item">I. <strong>CUMPLIMIENTO DE CONTRATO:</strong> SE CONSTITUIRÁ POR EL 10% DEL IMPORTE DEL SUBTOTAL DEL CONTRATO (SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO), DENTRO DE LOS DIEZ DÍAS HÁBILES POSTERIORES A LA FIRMA DE CONTRATO, POR LA CANTIDAD DE <strong>$<span id="garantia_cumplimiento" class="campo campo-corto" contenteditable="true">85,162.60</span> (<span id="garantia_cumplimiento_texto" class="campo campo-mediano" contenteditable="true">OCHENTA Y CINCO MIL CIENTO SESENTA Y DOS PESOS 60/100 M.N.</span>)</strong> Y ESTARÁ VIGENTE HASTA EL CUMPLIMIENTO DEL PRESENTE CONTRATO.</div>
                <div class="declaracion-item">II. <strong>VICIOS OCULTOS</strong>: SE CONSTITUIRÁ POR EL 5% DEL IMPORTE DEL SUBTOTAL DEL CONTRATO (SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO), DENTRO DE LOS CINCO DÍAS HÁBILES POSTERIORES A LA ENTREGA TOTAL DE LOS BIENES, POR LA CANTIDAD DE <strong>$<span id="garantia_vicios_ocultos" class="campo campo-corto" contenteditable="true">42,581.30</span> (<span id="garantia_vicios_ocultos_texto" class="campo campo-mediano" contenteditable="true">CUARENTA Y DOS MIL QUINIENTOS OCHENTA Y UN PESOS 30/100 M.N.</span>)</strong> Y ESTARÁ VIGENTE DURANTE UN AÑO.</div>
                <div class="declaracion-item">III. LA FIANZA DEBERÁ CONTENER LAS SIGUIENTES DECLARACIONES EXPRESAS DE LA AFIANZADORA:</div>
                <div class="declaracion-item" style="margin-left: 40px;">QUE LA FIANZA SE OTORGA EN LOS TÉRMINOS DEL PRESENTE CONTRATO.</div>
                <div class="declaracion-item" style="margin-left: 40px;">a. LA FIANZA SE EMITIRÁ A NOMBRE DEL <strong>"MUNICIPIO DE TEMASCALCINGO MÉXICO"</strong></div>
                <div class="declaracion-item" style="margin-left: 40px;">b. QUE LA FIANZA CONTINUARÁ VIGENTE EN EL CASO DE QUE SE OTORGUE PRÓRROGA O ESPERA AL FIADOR PARA EL CUMPLIMIENTO DE LAS OBLIGACIONES QUE SE AFIANZAN, AUNQUE HAYAN SIDO SOLICITADAS O AUTORIZADAS EXTEMPORÁNEAMENTE.</div>
                <div class="declaracion-item" style="margin-left: 40px;">c. QUE PARA CANCELAR LA FIANZA SERÁ REQUISITO INDISPENSABLE LA CONFORMIDAD EXPRESA Y POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>, QUIEN LA EMITIRÁ SOLO CUANDO <strong>"EL PROVEEDOR"</strong> HAYA CUMPLIDO CON TODAS LAS OBLIGACIONES.</div>
                <div class="declaracion-item" style="margin-left: 40px;">d. QUE LA INSTITUCIÓN AFIANZADORA ACEPTA EXPRESAMENTE LO PRECEPTUADO EN LOS ARTÍCULOS 93, 94 Y 118 DE LA LEY FEDERAL DE LAS INSTITUCIONES DE SEGUROS Y FIANZAS VIGENTE.</div>
                <div class="declaracion-item" style="margin-left: 40px;">e. QUE <strong>"EL MUNICIPIO"</strong> HARÁ EFECTIVA LA FIANZA A PARTIR DEL INCUMPLIMIENTO DE CUALQUIER OBLIGACIÓN CONSIGNADA EN TODAS Y CADA UNA DE LAS CLÁUSULAS DEL PRESENTE CONTRATO, POR LA CANTIDAD EN DINERO QUE SE ORIGINE.</div>
                <div class="texto" style="margin-top: 10px;">SI TRANSCURRIDO EL PLAZO SEÑALADO EN EL PRIMER PÁRRAFO <strong>"EL PROVEEDOR"</strong> NO HUBIERE PRESENTADO LA GARANTÍA DE CUMPLIMIENTO RESPECTIVA, <strong>"EL MUNICIPIO"</strong> NO FORMALIZARÁ EL PRESENTE INSTRUMENTO.</div>

                <div class="clausula"><strong>NOVENA. - RESCISIÓN ORIGINADA POR LA NO PRESENTACIÓN DE LA GARANTÍA.</strong> PARA EL CASO DE QUE <strong>"EL PROVEEDOR"</strong> NO PRESENTE LA GARANTÍA DESCRITA EN LA FRACCIÓN I DE LA CLÁUSULA OCTAVA DEL PRESENTE CONTRATO, SE RESCINDIRÁ EL MISMO, DEBIENDO PAGAR ÉSTE A <strong>"EL MUNICIPIO"</strong> LOS DAÑOS Y PERJUICIOS QUE ELLO LE OCASIONE, ASÍ COMO LAS DEMÁS SANCIONES QUE EL PRESENTE CONTRATO ESTABLECE.</div>

                <div class="clausula"><strong>DECIMA. SUPERVISIÓN</strong>. -- <strong>"EL MUNICIPIO",</strong> A TRAVÉS DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL O DEL ÁREA QUE ÉSTA DESIGNE, SUPERVISARÁ, FORMULARÁ LAS OBSERVACIONES PERTINENTES Y REPORTES QUE CONSIDERE NECESARIOS MISMAS QUE DEBERÁN SER ATENDIDAS DE MANERA OPORTUNA POR <strong>"EL PROVEEDOR",</strong> VERIFICANDO QUE EL MISMO SE REALICE CONFORME A LAS CONDICIONES, TÉRMINOS Y ESPECIFICACIONES ESTABLECIDAS EN EL PRESENTE CONTRATO.</div>

                <div class="clausula"><strong>DECIMA PRIMERA. RESCISIÓN</strong>. - <strong>"EL MUNICIPIO"</strong>, PODRÁ INICIAR EL PROCEDIMIENTO DE RESCISIÓN DEL PRESENTE CONTRATO, SIN RESPONSABILIDAD ALGUNA PARA EL, POR LAS SIGUIENTES CAUSAS IMPUTABLES A <strong>"EL PROVEEDOR"</strong>:</div>
                <div class="declaracion-item">I. NO ENTREGUE LA GARANTÍA ESTABLECIDA EN LA CLAUSULA OCTAVA EN LOS PLAZOS ESTIPULADOS.</div>
                <div class="declaracion-item">II. SI <strong>"EL PROVEEDOR"</strong> NO EJECUTA EL SUMINISTRO POR LA <strong>"ADQUISICIÓN DE EQUIPOS DE CÓMPUTO",</strong> DE ACUERDO CON LOS DATOS Y ESPECIFICACIONES CONVENIDAS Y PRECISADAS EN EL PRESENTE CONTRATO.</div>
                <div class="declaracion-item">III. SI <strong>"EL PROVEEDOR"</strong> NO REALIZA EN TIEMPO Y FORMA EL SUMINISTRO POR LA <strong>"ADQUISICIÓN DE EQUIPOS DE CÓMPUTO",</strong> SEÑALADOS EN LA CLÁUSULA PRIMERA OBJETO DE ESTE CONTRATO A <strong>"EL MUNICIPIO"</strong> EN FORMA EFICIENTE Y OPORTUNA.</div>
                <div class="declaracion-item">IV. SI <strong>"EL PROVEDOR"</strong> NO DA LAS FACILIDADES NECESARIAS A LOS SUPERVISORES QUE AL EFECTO DESIGNE "EL MUNICIPIO" PARA REALIZAR SU FUNCIÓN EN TÉRMINOS DE LO SEÑALADO EN LA CLÁUSULA DECIMA DEL PRESENTE CONTRATO.</div>
                <div class="declaracion-item">V. SI <strong>"EL PROVEEDOR"</strong> CEDE, TRASPASA O SUBCONTRATA LA TOTALIDAD O PARTE DE LOS BIENES ADQUIRIDOS, SIN EL CONSENTIMIENTO POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>, Y SI CEDE A TERCEROS EN FORMA PARCIAL O TOTAL LOS DERECHOS Y OBLIGACIONES, Y LOS DERECHOS DE COBRO DERIVADOS DEL PRESENTE CONTRATO, SIN OBTENER LA AUTORIZACIÓN PREVIA POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>.</div>
                <div class="declaracion-item">VI. CAMBIE SU NACIONALIDAD MEXICANA POR OTRA.</div>
                <div class="declaracion-item">VII. SIENDO EXTRANJERO INVOQUE LA PROTECCIÓN DE SU GOBIERNO EN RELACIÓN AL PRESENTE CONTRATO.</div>
                <div class="declaracion-item">VIII. EN GENERAL, POR INCUMPLIMIENTO DE CUALESQUIERA DE LAS OBLIGACIONES DERIVADAS DEL PRESENTE CONTRATO, EL CÓDIGO, EL REGLAMENTO, LOS TRATADOS Y DEMÁS DISPOSICIONES APLICABLES.</div>
                <div class="declaracion-item">IX. SI <strong>"EL PRESTADOR DE SERVICIOS"</strong> EN VIRTUD DE LA INFORMACIÓN CON QUE CUENTE LA CONTRALORÍA MUNICIPAL HAYA CELEBRADO CONTRATOS EN CONTRAVENCIÓN A LO DISPUESTO POR EL <strong>"LEY".</strong></div>
                <div class="declaracion-item">X. POR CUALQUIER OTRA CAUSA IMPUTABLE A ÉL, SIMILAR A LAS ANTES MENCIONADAS.</div>
                <div class="texto" style="margin-top: 10px;">EN CASO DE QUE <strong>"EL MUNICIPIO"</strong> OPTE POR LA RESCISIÓN DEL CONTRATO; <strong>"EL PROVEEDOR"</strong> ESTARÁ OBLIGADO A PAGAR DAÑOS Y PERJUICIOS, OCASIONADOS A <strong>"EL MUNICIPIO"</strong>.</div>

                <div class="numero-pagina">3 DE 4</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 4: CLÁUSULA DÉCIMA SEGUNDA A DÉCIMA SÉPTIMA + FIRMAS -->
        <!-- ========================================== -->
        <div class="hoja">
            <img class="marca-agua" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Flor.svg/512px-Flor.svg.png">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>DECIMA SEGUNDA. MODIFICACIÓN</strong>. - <strong>"EL MUNICIPIO"</strong> DENTRO DE SU PRESUPUESTO APROBADO PODRÁ MODIFICAR EL PRESENTE CONTRATO, DE CONFORMIDAD A LO ESTABLECIDO EN EL ARTÍCULO 125 DEL "REGLAMENTO".</div>

                <div class="clausula"><strong>DECIMA TERCERA. - AUSENCIA DE VICIOS EN EL CONSENTIMIENTO</strong>. LAS <strong>"PARTES"</strong> MANIFIESTAN QUE EN EL PRESENTE CONTRATO NO EXISTE ERROR, LESIÓN, DOLO, VIOLENCIA, NI CUALQUIER OTRO VICIO DEL CONSENTIMIENTO QUE PUDIESE IMPLICAR SU NULIDAD Y QUE LAS DEMÁS PRESTACIONES QUE SE RECIBEN SON DE IGUAL VALOR, POR LO TANTO, RENUNCIAN A CUALQUIER ACCIÓN QUE LA LEY PUDIERA OTORGARLES A SU FAVOR, POR ESTE CONCEPTO.</div>

                <div class="clausula"><strong>DECIMA CUARTA. -LEGISLACIÓN</strong>. ESTE CONTRATO SE RIGE POR LO ESTABLECIDO EN LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y SU RESPECTIVO REGLAMENTO.</div>

                <div class="clausula"><strong>DÉCIMA QUINTA. - JURISDICCIÓN</strong>. - PARA LA INTERPRETACIÓN, EJECUCIÓN, CUMPLIMIENTO O TERMINACIÓN DEL PRESENTE CONTRATO, <strong>"LAS PARTES"</strong> ACUERDAN SOMETERSE EXPRESAMENTE A LA JURISDICCIÓN Y COMPETENCIA DEL TRIBUNAL DE JUSTICIA ADMINISTRATIVA DEL ESTADO DE MÉXICO, RENUNCIANDO DESDE ESTE MOMENTO A CUALQUIER OTRO FUERO QUE POR RAZÓN DE SU DOMICILIO O PRESENTE FUTURO PUDIERA CORRESPONDERLES.</div>

                <div class="clausula"><strong>DECIMA SEXTA. -- RESPONSABILIDADES. -</strong> LA ADQUISICIÓN ESTARÁ SUJETA A LOS REQUERIMIENTOS DE LAS ÁREAS ADMINISTRATIVAS DEL MUNICIPIO DE TEMASCALCINGO, MÉXICO, POR LO QUE, EN EL CASO DE NO ADQUIRIR EL MONTO MÍNIMO, POR ALGUNA SITUACIÓN NO IMPUTABLE AL MUNICIPIO NO SE GENERARÁ NINGÚN TIPO DE RESPONSABILIDAD Y/O SANCIÓN POR NINGUNA DE LAS PARTES.</div>

                <div class="clausula"><strong>DÉCIMA SÉPTIMA. -- PENAS CONVENCIONALES</strong> EN CASO DEL INCUMPLIMIENTO POR PARTE DE <strong>"EL PROVEEDOR"</strong> DE LAS OBLIGACIONES PACTADAS EN EL CONTRATO, SE APLICARÁ UNA PENA CONVENCIONAL EQUIVALENTE AL MONTO QUE RESULTE DE APLICAR EL 10% DEL VALOR DE LOS BIENES QUE NO SE HAYAN SUMINISTRADO A SATISFACCIÓN DE <strong>"EL MUNICIPIO",</strong> LO ANTERIOR, CON FUNDAMENTO EN LO DISPUESTO EN LA FACCIÓN VII DEL ARTÍCULO 120 DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

                <div class="texto" style="margin-top: 15px;">LEÍDO QUE FUE A LAS PARTES EL PRESENTE CONTRATO Y CONFORMES CON SU CONTENIDO, ALCANCE Y FUERZA LEGAL LO RATIFICAN EN TODAS Y CADA UNA DE SUS PARTES, FIRMÁNDOLO POR TRIPLICADO, AL CALCE Y AL MARGEN PARA DEBIDA CONSTANCIA LEGAL EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, A <span id="fecha_texto" class="campo campo-mediano" contenteditable="true">LOS 10 DÍAS DE FEBRERO DEL AÑO DOS MIL VEINTISÉIS</span>.</div>

                <!-- FIRMAS: Formato con recuadros como en el Word -->
                <div style="border: 1px solid black; margin-top: 20px; width: 100%;">
                    <div style="text-align: center; font-weight: bold; padding: 8px;">POR "EL MUNICIPIO"</div>
                    <div style="display: flex; border-top: 1px solid black;">
                        <div style="flex: 1; text-align: center; padding: 15px 5px; border-right: 1px solid black;">
                            <div style="margin-top: 30px;"></div>
                            <strong>C. VERÓNICA MORENO MARTÍNEZ</strong><br>
                            PRESIDENTA MUNICIPAL CONSTITUCIONAL
                        </div>
                        <div style="flex: 1; text-align: center; padding: 15px 5px;">
                            <div style="margin-top: 30px;"></div>
                            <strong>C. RAMIRO GALINDO REYES</strong><br>
                            SECRETARIO DEL AYUNTAMIENTO
                        </div>
                    </div>
                </div>

                <div style="border: 1px solid black; margin-top: 15px;">
                    <div style="text-align: center; font-weight: bold; padding: 8px;">POR "EL ÁREA USUARIA"</div>
                    <div style="text-align: center; padding: 15px;">
                        <div style="margin-top: 20px;"></div>
                        <strong>C. MIRIAM VIANEY OVANDO RUBIO</strong><br>
                        DIRECTORA DE ADMINISTRACIÓN Y<br>DESARROLLO DE PERSONAL
                    </div>
                </div>

                <div style="border: 1px solid black; margin-top: 15px;">
                    <div style="text-align: center; font-weight: bold; padding: 8px;">POR "EL PROVEEDOR"</div>
                    <div style="text-align: center; padding: 15px;">
                        <div style="margin-top: 20px;"></div>
                        <span id="representante_legal1" class="campo campo-largo" contenteditable="true"></span><br>
                        APODERADO LEGAL DE <span id="nombre_empresa1" class="campo campo-largo" contenteditable="true"></span>
                    </div>
                </div>

                <div class="numero-pagina">4 DE 4</div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/portalProceso/contratoCompu.js"></script>
    <script>
    </script>
</body>

</html>