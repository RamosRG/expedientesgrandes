<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato de Servicio de Fotocopiado 2026</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 14px 0;
            font-size: 7.5pt;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px 3px;
            vertical-align: middle;
            text-align: center;
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
        <span style="font-weight:bold;">📄 CONTRATO ABIERTO FOTOCOPIADO 2026</span>
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
                <div class="encabezado-logo" style="border-bottom: none; justify-content: center; gap: 0; flex-wrap: wrap;">
                    <span style="font-weight: bold;">AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                </div>
                <div style="text-align: center; font-weight: bold; font-size: 14pt; margin: 25px 0 15px 0; line-height: 1.6;">
                    CONTRATO ABIERTO DE PRESTACIÓN DE SERVICIOS PARA EL<br>
                    <span id="nombre_estudio" class="campo campo-largo" contenteditable="true" style="font-size: 14pt; background: #ffff99; min-width: 300px;">ADQUISICIÓN DE EQUIPOS DE CÓMPUTO</span>
                </div>
                <div style="text-align: center; font-weight: bold; font-size: 12pt; margin-bottom: 20px; letter-spacing: 1px;">
                    NO. MTM/CAYS/PF/<span id="no_licitacion" contenteditable="true" style="background: #ffff99; padding: 0 8px; border-bottom: 1px solid #000;"></span>
                </div>

                <div style="text-align: justify; margin-bottom: 15px;">CONTRATO ABIERTO DE PRESTACIÓN DE SERVICIOS QUE CELEBRAN POR UNA PARTE EL MUNICIPIO CONSTITUCIONAL DE TEMASCALCINGO, MÉXICO, REPRESENTADO EN ESTE ACTO POR LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE <strong>PRESIDENTA MUNICIPAL CONSTITUCIONAL</strong>, <strong>C. RAMIRO GALINDO REYES</strong>, SECRETARIO DEL MUNICIPIO, <strong>C. MIRIAM VIANEY OVANDO RUBIO</strong>, DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL Y ÁREA USUARIA; QUIÉN EN LO SUCESIVO Y PARA LOS EFECTOS DEL PRESENTE SE LE DENOMINARÁ <strong>"EL MUNICIPIO"</strong> Y POR OTRA PARTE <span id="nombre_proveedor" class="campo campo-largo" contenteditable="true">"[CDM-HOLDING INTERNATIONAL GROUP S.A. DE C.V.]"</span>, REPRESENTADA POR LA <span id="representante_legal" class="campo campo-largo" contenteditable="true"></span>, EN SU CARÁCTER DE APODERADA LEGAL, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ "EL PRESTADOR DE SERVICIOS", AL TENOR DE LAS DECLARACIONES Y CLÁUSULAS SIGUIENTES:</div>

                <div class="clausula"><strong>DECLARACIONES</strong></div>
                <div class="clausula"><strong>I. "EL MUNICIPIO" DECLARA:</strong></div>
                <div class="declaracion-item">1. QUE CON ARREGLO A LO PREVISTO POR LOS ARTÍCULOS 115, DE LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS; 113, 116, 123, Y 125, DE LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, 31, FRACCIÓN XVIII, DE LA LEY ORGÁNICA MUNICIPAL DEL ESTADO DE MÉXICO; ASÍ COMO LOS ARTÍCULOS 65, 66, 67, 68, 69, 70, 71, 72, 73, 74 Y 75 DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO EL 120, 123, 124, 125 Y 127 DEL REGLAMENTO; EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, TIENE LA ATRIBUCIÓN PARA CELEBRAR EL PRESENTE CONTRATO.</div>
                <div class="declaracion-item">2. QUE LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL, ESTÁ FACULTADA PARA CONOCER, OTORGAR Y SUSCRIBIR ESTE CONTRATO.</div>
                <div class="declaracion-item">3. QUE EL <strong>C. RAMIRO GALINDO REYES</strong>, EN SU CARÁCTER DE SECRETARIO DEL AYUNTAMIENTO, EN TÉRMINOS DE LO QUE ESTABLECE EL ARTÍCULO 91 FRACCIÓN V DE LA LEY ORGÁNICA MUNICIPAL, TIENE LA ATRIBUCIÓN DE VALIDAR CON SU FIRMA LOS DOCUMENTOS OFICIALES EMANADOS DE <strong>"EL MUNICIPIO"</strong> Y DE CUALQUIERA DE SUS MIEMBROS.</div>
                <div class="declaracion-item">4. LAS DEPENDENCIAS Y ENTIDADES DE LA ADMINISTRACIÓN PÚBLICA MUNICIPAL CONDUCIRÁN SUS ACCIONES CON BASE A LOS PROGRAMAS ANUALES QUE ESTABLECE EL MUNICIPIO PARA EL LOGRO DE SUS OBJETIVOS.</div>
                <div class="declaracion-item">5. QUE TIENE ESTABLECIDO SU DOMICILIO EN <span id="domicilio_fiscal" class="campo campo-largo" contenteditable="true"></span>, MISMO QUE SE SEÑALA PARA LOS FINES Y EFECTOS LEGALES DEL PRESENTE INSTRUMENTO.</div>
                <div class="declaracion-item">6. MANIFIESTA <strong>"EL MUNICIPIO"</strong> QUE TIENE EN SU HABER RECURSOS PECUNIARIOS PROVENIENTES DE PARTICIPACIONES FEDERALES (PF-<span id="fuente_recursos" class="campo campo-chico" contenteditable="true">2026</span>), DE LA PRESTACIÓN DE SERVICIOS PARA EL "<span id="nombre_estudio_ganador" class="campo campo-mediano" contenteditable="true"></span>" CON EL OBJETO DE DAR CONTINUIDAD CON LA EMISIÓN DE DOCUMENTOS OFICIALES, ATENCIÓN CIUDADANA, PROCESOS DE GOBIERNO, GESTIONES ADMINISTRATIVAS Y CUMPLIMIENTO DE OBLIGACIONES NORMATIVAS, CONFORME AL PRESUPUESTO DE EGRESOS DE LA FEDERACIÓN PARA EL EJERCICIO FISCAL 2026.</div>
                <div class="declaracion-item">7. QUE LA ADJUDICACIÓN DEL CONTRATO SE REALIZÓ MEDIANTE PROCEDIMIENTO ADQUISITIVO POR ADJUDICACIÓN DIRECTA DE CONFORMIDAD CON EL ARTÍCULO 43 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS Y 94 DE SU REGLAMENTO.</div>

                <div class="clausula"><strong>II. DE "EL PRESTADOR DE SERVICIOS":</strong></div>
                <div class="declaracion-item">1. QUE ES UNA EMPRESA CONSTITUIDA LEGALMENTE DE ACUERDO CON LAS LEYES MEXICANAS, SEGÚN LO ACREDITA CON ACTA CONSTITUTIVA NÚMERO<span id="num_acta_cons" class="campo campo-largo" contenteditable="true"></span>, VOLUMEN <span id="volumen_re" class="campo campo-largo" contenteditable="true"></span>, DE FECHA <span id="created_at_texto" class="campo campo-largo" contenteditable="true"></span>, ANTE LA FE DE <span id="titular" class="campo campo-largo" contenteditable="true"></span>, TITULAR DE LA NOTARÍA PÚBLICA NÚMERO <span id="num_oficialia" class="campo campo-largo" contenteditable="true"></span>, EN TOLUCA, ESTADO DE MÉXICO, INSCRITA EN EL REGISTRO PÚBLICO DE COMERCIO SEGÚN BOLETA CON EL NCI <span id="nci" class="campo campo-mediano" contenteditable="true"></span> DE FECHA <span id="created_at_texto2" class="campo campo-mediano" contenteditable="true"></span>, DOCUMENTO QUE SE ENCUENTRA AGREGADO AL EXPEDIENTE QUE CONTIENE EL PROCEDIMIENTO ADJUDICATARIO REFERIDO.</div>
                <div class="declaracion-item">2. QUE SU REGISTRO FEDERAL DE CONTRIBUYENTES ES <span id="rfc_proveedor_ganador" class="campo campo-mediano" contenteditable="true"></span>, CON ACTIVIDAD ECONÓMICA EN ALQUILER DE EQUIPO DE CÓMPUTO Y DE OTRAS MÁQUINAS Y MOBILIARIO DE OFICINA.</div>
                <div class="declaracion-item">3. QUE LA <span id="representante_legal1" class="campo campo-largo" contenteditable="true"></span>, EN SU CARÁCTER DE <strong>APODERADA LEGAL</strong>, SE ACREDITA CON PODER GENERAL, INSTRUMENTO NÚMERO <span id="instrumento_re" class="campo campo-mediano" contenteditable="true"></span>, VOLUMEN ORDINARIO <span id="volumen_re2" class="campo campo-mediano" contenteditable="true"></span>, DE FECHA <span id="created_at_texto3" class="campo campo-mediano" contenteditable="true"></span>, ANTE EL LICENCIADO <span id="titular2" class="campo campo-mediano" contenteditable="true"></span>, TITULAR DE LA NOTARÍA PÚBLICA NÚMERO <span id="notario" class="campo campo-mediano" contenteditable="true"></span> DEL ESTADO DE <span id="estado" class="campo campo-mediano" contenteditable="true"></span>, ASIMISMO SE IDENTIFICA CON CREDENCIAL PARA VOTAR CON NÚMERO DE FOLIO <span id="num_credencial_representante_ganador" class="campo campo-mediano" contenteditable="true"></span>, EXPEDIDA POR EL INSTITUTO NACIONAL ELECTORAL.</div>
                <div class="declaracion-item">4. QUE PARA EFECTOS DEL PRESENTE CONTRATO LA EMPRESA <span id="empresa_ganadora" class="campo campo-largo" contenteditable="true"></span> SEÑALA COMO SU DOMICILIO FISCAL UBICADO EN <span id="domicilio_proveedor_ganador" class="campo campo-largo" contenteditable="true"></span>, Y DOMICILIO PARTICULAR EN EL <span id="domicilio_particular" class="campo campo-largo" contenteditable="true"></span> Y CORREO ELECTRÓNICO <span id="correo_proveedor" class="campo campo-mediano" contenteditable="true"></span>.</div>
                <div class="declaracion-item">5. QUE CONOCE LAS ESPECIFICACIONES DE LA PRESTACIÓN DEL "<span id="estudio_nombre" class="campo campo-mediano" contenteditable="true"></span>" Y DEMÁS DOCUMENTOS QUE SE ENCUENTRAN INTEGRADOS AL EXPEDIENTE QUE SE FORMÓ CON MOTIVO DEL PROCEDIMIENTO DE CONTRATACIÓN.</div>
                <div class="declaracion-item">6. QUE BAJO PROTESTA DE DECIR VERDAD LA EMPRESA QUE REPRESENTA NO SE ENCUENTRA EN NINGUNO DE LOS SUPUESTOS QUE ESTABLECE EL ARTÍCULO 74 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

                <div class="clausula"><strong>III. DE LAS "PARTES"</strong></div>
                <div class="declaracion-item">1. QUE EN VIRTUD DE LAS DECLARACIONES QUE ANTECEDEN, Y UNA VEZ QUE SE HA RECONOCIDO SU CAPACIDAD Y PERSONALIDAD, CONVIENEN EXPRESAMENTE EN SUJETARSE A LAS SIGUIENTES:</div>

                <div class="clausula"><strong>DEFINICIONES</strong></div>
                <div class="declaracion-item"><strong>"LAS PARTES"</strong> CONVIENEN QUE, PARA LOS EFECTOS DEL PRESENTE CONTRATO, SE ENTENDERÁ POR:</div>
                <div class="declaracion-item">1. LEY: LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                <div class="declaracion-item">2. REGLAMENTO: EL REGLAMENTO DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

                <div class="numero-pagina">1 DE 4</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 2: CLÁUSULA PRIMERA (OBJETO) + TABLA + CLÁUSULA SEGUNDA A SEXTA -->
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
                <div class="clausula"><strong>PRIMERA. - OBJETO.</strong> EL PRESENTE CONTRATO TIENE POR OBJETO QUE <strong>"EL PRESTADOR DE SERVICIOS"</strong> PROPORCIONE A <strong>"EL MUNICIPIO"</strong> LA PRESTACIÓN DEL <span id="estudio_nombre1" class="campo campo-mediano" contenteditable="true"></span>, PARA LAS ÁREAS DE LA ADMINISTRACIÓN PUBLICA MUNICIPAL, CORRESPONDIENTE AL PERIODO QUE COMPRENDE DEL <span id="periodo_inicio" class="campo campo-mediano" contenteditable="true"></span>. EL <span id="estudio_nombre2" class="campo campo-mediano" contenteditable="true"></span> OBJETO DEL PRESENTE CONTRATO SE DETALLAN EN LA TABLA SIGUIENTE, MISMA QUE FORMA PARTE INTEGRAL DE LA PRESENTE CLÁUSULA.</div>

                <!-- TABLA DE PRODUCTOS CORREGIDA CON ID -->
                <h2>RELACIÓN DE PRODUCTOS</h2>
                <table id="tablaProductos">
                    <thead>
                        <tr>
                            <th style="width: 8%;">ID</th>
                            <th style="width: 5%;">PARTIDA</th>
                            <th style="width: 22%;">CONCEPTO</th>
                            <th style="width: 10%;">UNIDAD DE MEDIDA</th>
                            <th style="width: 8%;">CANTIDAD</th>
                            <th style="width: 12%;">FUENTE DE FINANCIAMIENTO</th>
                            <th style="width: 12%;">MARCA Y/O MODELO</th>
                            <th style="width: 11%;">PRECIO UNITARIO</th>
                            <th style="width: 12%;">IMPORTE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Los datos se cargarán dinámicamente con JavaScript -->
                    </tbody>
                </table>

                <!-- Mostrar el total en texto con el formato solicitado -->
                <div style="text-align: right; margin-top: -10px;">
                    <span id="total_ganador_texto" class="campo campo-largo" contenteditable="true">$342,084.00 (TRESCIENTOS CUARENTA Y DOS MIL OCHENTA Y CUATRO PESOS 00/100 M.N.)</span>
                </div>

                <table style="width: auto; float: right; border: none;">
                    <tr style="border: none;">
                        <td style="border: none;">SUBTOTAL</td>
                        <td style="border: none;">:</td>
                        <td style="border: none;" class="celda-editable" contenteditable="true" id="subtotal_valor">$0.00</td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;">I.V.A.</td>
                        <td style="border: none;">:</td>
                        <td style="border: none;" class="celda-editable" contenteditable="true" id="iva_valor">$0.00</td>
                    </tr>
                    <tr style="border: none;">
                        <td style="border: none;">TOTAL</td>
                        <td style="border: none;">:</td>
                        <td style="border: none;" class="celda-editable" contenteditable="true" id="total_valor">$0.00</td>
                    </tr>
                </table>
                <div style="clear: both;"></div>

                <!-- CLÁUSULA SEGUNDA MODIFICADA: MONTO MÍNIMO = SUBTOTAL, MONTO MÁXIMO = TOTAL -->
                <div class="clausula"><strong>SEGUNDA. -- IMPORTE A PAGAR.</strong> LA CANTIDAD TOTAL A PAGAR POR PARTE DE <strong>"EL MUNICIPIO"</strong> SERÁ POR UN MONTO MÍNIMO DE <span id="subtotal_ganador_clausula" class="campo campo-largo" contenteditable="true">$205,250.40 (DOSCIENTOS CINCO MIL DOSCIENTOS CINCUENTA PESOS 40/100 M.N.)</span>, INCLUIDO EL IMPUESTO AL VALOR AGREGADO Y UN <strong>MONTO MÁXIMO</strong> DE <span id="total_ganador_clausula" class="campo campo-largo" contenteditable="true">$342,084.00 (TRESCIENTOS CUARENTA Y DOS MIL OCHENTA Y CUATRO PESOS 00/100 M.N.)</span>, <strong>INCLUIDO EL IMPUESTO AL VALOR AGREGADO (I.V.A.)</strong> Y SE CUBRIRÁ MEDIANTE LA PRESENTACIÓN DE LA FACTURA A MES VENDIDO, EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL PARA SU REVISIÓN Y PROGRAMACIÓN DE PAGO CORRESPONDIENTE.</div>

                <div class="clausula"><strong>TERCERA. - ANTICIPO.</strong> <strong>"EL MUNICIPIO"</strong> NO OTORGARÁ A <strong>"EL PRESTADOR DE SERVICIOS"</strong> ANTICIPO ALGUNO POR LA PRESTACIÓN DE SERVICIOS PARA EL "<span id="estudio_nombre3" class="campo campo-mediano" contenteditable="true"></span>" MOTIVO DEL PRESENTE CONTRATO.</div>

                <div class="clausula"><strong>CUARTA. -- PRECIO.</strong> <strong>"LAS PARTES"</strong> CONVIENEN QUE EL IMPORTE POR LA PRESTACIÓN DEL <span id="estudio_nombre4" class="campo campo-mediano" contenteditable="true"></span> MATERIA DE ESTE CONTRATO, SERÁ EL ESTABLECIDO POR EL PRECIO MENSUAL FIJO.</div>

                <div class="clausula"><strong>QUINTA: "LAS PARTES"</strong> ACUERDAN QUE EL PAGO PARA EL "<span id="estudio_nombre5" class="campo campo-mediano" contenteditable="true"></span>" OBJETO DEL PRESENTE CONTRATO, SE CUBRIRÁ DE LA MANERA SIGUIENTE:</div>
                <div class="declaracion-item">I. <strong>"EL MUNICIPIO"</strong> PAGARÁ EXCLUSIVAMENTE EL PRECIO FIJO POR<span id="estudio_nombre8" class="campo campo-mediano" contenteditable="true"></span>AL MES, MÁS EL IMPUESTO AL VALOR AGREGADO (I.V.A.) A <strong>"EL PRESTADOR DE SERVICIOS"</strong>, DENTRO DE LOS TREINTA DÍAS HÁBILES POSTERIORES A LA PRESENTACIÓN DE LA FACTURA (CFDI) CORRESPONDIENTE, EN LOS TÉRMINOS DESCRITOS EN EL PÁRRAFO QUE ANTECEDE Y DEBIDAMENTE REQUISITADA FISCALMENTE, CON CARGO A PARTICIPACIONES FEDERALES (PF-2026).</div>
                <div class="declaracion-item">II. <strong>"EL PRESTADOR DE SERVICIOS"</strong> INGRESARÁ CADA MES A LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL LA FACTURA (CFDI), EMITIRLA A NOMBRE DEL <strong>"MUNICIPIO DE TEMASCALCINGO"</strong>.</div>
                <div class="declaracion-item">III. <strong>"EL MUNICIPIO"</strong>, HARÁ LOS PAGOS A <strong>"EL PRESTADOR DE SERVICIOS"</strong>, MEDIANTE TRANSFERENCIAS BANCARIAS EN TIEMPO Y FORMA.</div>

                <div class="clausula"><strong>SEXTA:</strong> PARA EL CUMPLIMIENTO DEL OBJETO DEL PRESENTE CONTRATO <strong>"EL PRESTADOR DE SERVICIOS"</strong> SE OBLIGA A:</div>
                <div class="declaracion-item">I. PRESTAR A <strong>"EL MUNICIPIO"</strong> EL <span id="estudio_nombre6" class="campo campo-mediano" contenteditable="true"></span> DE MANERA CONTINUA, OPORTUNA Y CONFORME A LOS TÉRMINOS PACTADOS DENTRO DE LA CLÁUSULA SÉPTIMA DE ESTE INSTRUMENTO.</div>
                <div class="declaracion-item">II. INFORMAR A <strong>"EL MUNICIPIO"</strong> DE CUALQUIER ANOMALÍA QUE SE PRESENTE DURANTE LA EJECUCIÓN DEL PRESENTE CONTRATO, EN CUANTO IMPIDA O DIFICULTE LA PRESTACIÓN DEL <span id="estudio_nombre7" class="campo campo-mediano" contenteditable="true"></span> Y COMUNICAR POR ESCRITO OPORTUNAMENTE A <strong>"EL MUNICIPIO"</strong> CUALQUIER CAMBIO DE DOMICILIO.</div>
                <div class="declaracion-item">III. REEMPLAZAR LA (S) FOTOCOPIADORA (S) PARA LA PRESTACIÓN DEL SERVICIO DE FOTOCOPIADO, QUE TENGAN FALLAS Y/O MAL FUNCIONAMIENTO EN UN PLAZO NO MAYOR A LOS TRES DÍAS NATURALES, NOTIFICADO POR <strong>"EL MUNICIPIO".</strong></div>
                <div class="declaracion-item">IV. CUMPLIR CON LAS DEMÁS OBLIGACIONES QUE DERIVEN DEL PRESENTE CONTRATO.</div>

                <div class="numero-pagina">2 DE 4</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 3: CLÁUSULA SÉPTIMA A DÉCIMA QUINTA -->
        <!-- ========================================== -->
        <div class="hoja">
            <img class="marca-agua" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Flor.svg/512px-Flor.svg.png">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="clausula"><strong>SÉPTIMA. TIEMPO, FORMA Y LUGAR DE ENTREGA:</strong> EL SERVICIO DE FOTOCOPIADO, SE PRESTARÁ DE MANERA CONTINUA Y CONFORME A LAS NECESIDADES DE <strong>"EL MUNICIPIO"</strong> DURANTE EL PERIODO COMPRENDIDO <span id="periodo_fin" class="campo campo-mediano" contenteditable="true"></span>, DEBERÁ ESTAR DISPONIBLE DENTRO DE UN PLAZO NO MAYOR A DOS DÍAS NATURALES, CONTADOS A PARTIR DE LA SUSCRIPCIÓN DEL PRESENTE CONTRATO, EN LAS OFICINAS QUE OCUPA LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL UBICADA EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO S/N, EXSEMINARIO, TEMASCALCINGO, MÉXICO.</div>

                <div class="clausula"><strong>OCTAVA. - GARANTÍA DE CUMPLIMIENTO.</strong> LA GARANTÍA DE CUMPLIMIENTO DE CONTRATO SE CONSTITUIRÁ POR EL 10% DEL IMPORTE DEL SUBTOTAL DEL CONTRATO, DENTRO DE LOS PRIMEROS 10 DÍAS HÁBILES DEL MES DE<span id="created_at2" class="campo campo-mediano" contenteditable="true"></span>, POR LA CANTIDAD DE <span class="campo campo-largo" contenteditable="true">$29,490.00 (VEINTINUEVE MIL CUATROCIENTOS NOVENTA PESOS 00/100 M.N.)</span> Y ESTARÁ VIGENTE HASTA EL CUMPLIMIENTO DEL PRESENTE CONTRATO.</div>

                <div class="texto">LA GARANTÍA DEBERÁ CONTENER LAS SIGUIENTES DECLARACIONES EXPRESAS:</div>
                <div class="declaracion-item">a. SE OTORGA EN LOS TÉRMINOS DEL PRESENTE CONTRATO.</div>
                <div class="declaracion-item">b. LA GARANTÍA SE EMITIRÁ A NOMBRE DEL MUNICIPIO DE TEMASCALCINGO, MÉXICO.</div>
                <div class="declaracion-item">c. LA GARANTÍA CONTINUARÁ VIGENTE EN EL CASO DE QUE SE OTORGUE PRÓRROGA O ESPERA AL FIADOR PARA EL CUMPLIMIENTO DE LAS OBLIGACIONES QUE SE AFIANZAN, AUNQUE HAYAN SIDO SOLICITADAS O AUTORIZADAS EXTEMPORÁNEAMENTE.</div>
                <div class="declaracion-item">d. PARA CANCELAR LA GARANTÍA SERÁ REQUISITO INDISPENSABLE LA CONFORMIDAD EXPRESA Y POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>, QUIEN LA EMITIRÁ SOLO CUANDO <strong>"EL PRESTADOR DEL SERVICIO"</strong> HAYA CUMPLIDO CON TODAS LAS OBLIGACIONES.</div>
                <div class="declaracion-item">e. QUE LA INSTITUCIÓN AFIANZADORA ACEPTA EXPRESAMENTE LO PRECEPTUADO EN LOS ARTÍCULOS 93, 94 Y 118 DE LA LEY FEDERAL DE LAS INSTITUCIONES DE SEGUROS Y FIANZAS VIGENTE.</div>
                <div class="declaracion-item">f. <strong>"EL MUNICIPIO"</strong> HARÁ EFECTIVA LA GARANTÍA A PARTIR DEL INCUMPLIMIENTO DE CUALQUIER OBLIGACIÓN CONSIGNADA EN TODAS Y CADA UNA DE LAS CLÁUSULAS DEL PRESENTE CONTRATO, POR LA CANTIDAD EN DINERO QUE SE ORIGINE.</div>
                <div class="declaracion-item">g. QUE <strong>"EL MUNICIPIO"</strong> HARÁ EFECTIVA LA FIANZA EN CASO DE QUE SEA RESCINDIDO EL CONTRATO CELEBRADO POR CAUSAS IMPUTABLES A <strong>"EL PRESTADOR DEL SERVICIO".</strong></div>
                <div class="texto">SI TRANSCURRIDO EL PLAZO SEÑALADO EN EL PRIMER PÁRRAFO <strong>"EL PRESTADOR DEL SERVICIO"</strong> NO HUBIERE PRESENTADO LA GARANTÍA DE CUMPLIMIENTO RESPECTIVA, <strong>"EL MUNICIPIO"</strong> NO FORMALIZARÁ EL PRESENTE INSTRUMENTO.</div>

                <div class="clausula"><strong>NOVENA. - RESCISIÓN ORIGINADA POR LA NO PRESENTACIÓN DE LA GARANTÍA.</strong> PARA EL CASO DE QUE <strong>"EL PRESTADOR DEL SERVICIO"</strong> NO PRESENTE LA GARANTÍA DESCRITA EN LA FRACCIÓN I DE LA CLÁUSULA OCTAVA DEL PRESENTE CONTRATO, SE RESCINDIRÁ EL MISMO, DEBIENDO PAGAR ÉSTE A <strong>"EL MUNICIPIO"</strong> LOS DAÑOS Y PERJUICIOS QUE ELLO LE OCASIONE, ASÍ COMO LAS DEMÁS SANCIONES QUE EL PRESENTE CONTRATO ESTABLECE.</div>

                <div class="clausula"><strong>DÉCIMA. SUPERVISIÓN. -</strong> <strong>EL MUNICIPIO"</strong>, A TRAVÉS DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL O DEL ÁREA QUE ÉSTA DESIGNE, SUPERVISARÁ DE MANERA PERMANENTE, LLEVARÁ REGISTROS, CONTROLES Y REPORTES QUE CONSIDERE NECESARIOS, ASÍ COMO FORMULAR LAS OBSERVACIONES PERTINENTES, MISMAS QUE DEBERÁN SER ATENDIDAS DE MANERA OPORTUNA POR "EL PRESTADOR DE SERVICIOS", VERIFICANDO QUE EL MISMO SE REALICE CONFORME A LAS CONDICIONES, TÉRMINOS Y ESPECIFICACIONES ESTABLECIDAS EN EL PRESENTE CONTRATO.</div>

                <div class="clausula"><strong>DÉCIMA PRIMERA. RESCISIÓN. -</strong> "<strong>EL MUNICIPIO</strong>", PODRÁ INICIAR EL PROCEDIMIENTO DE RESCISIÓN DEL PRESENTE CONTRATO, SIN RESPONSABILIDAD ALGUNA PARA EL, POR LAS SIGUIENTES CAUSAS IMPUTABLES A "<strong>EL PRESTADOR DE SERVICIOS</strong>":</div>
                <div class="declaracion-item">I. NO ENTREGUE LA GARANTÍA ESTABLECIDA EN LA CLÁUSULA NOVENA EN LOS PLAZOS ESTIPULADOS. (NO APLICA)</div>
                <div class="declaracion-item">II. SI <strong>"EL PRESTADOR DE SERVICIOS"</strong> NO EJECUTA EL SERVICIO DE ACUERDO CON LOS DATOS Y ESPECIFICACIONES CONVENIDAS Y PRECISADAS EN EL PRESENTE CONTRATO.</div>
                <div class="declaracion-item">III. SI <strong>"EL PRESTADOR DE SERVICIOS"</strong> NO REALIZA LA PRESTACIÓN DEL SERVICIO DE FOTOCOPIADO SEÑALADO EN LA CLÁUSULA PRIMERA OBJETO DE ESTE CONTRATO A <strong>"EL MUNICIPIO"</strong> EN FORMA EFICIENTE Y OPORTUNA.</div>
                <div class="declaracion-item">IV. SI <strong>"EL PRESTADOR DE SERVICIOS"</strong> NO DA LAS FACILIDADES NECESARIAS A LOS SUPERVISORES QUE AL EFECTO DESIGNE <strong>"EL MUNICIPIO"</strong> PARA REALIZAR SU FUNCIÓN EN TÉRMINOS DE LO SEÑALADO EN LA CLÁUSULA DÉCIMA DEL PRESENTE CONTRATO.</div>
                <div class="declaracion-item">V. SI <strong>"EL PRESTADOR DE SERVICIOS"</strong> CEDE, TRASPASA O SUBCONTRATA LA TOTALIDAD O PARTE DEL SERVICIO CONTRATADO SIN EL CONSENTIMIENTO POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>, Y SI CEDE A TERCEROS EN FORMA PARCIAL O TOTAL LOS DERECHOS Y OBLIGACIONES, Y LOS DERECHOS DE COBRO DERIVADOS DEL PRESENTE CONTRATO, SIN OBTENER LA AUTORIZACIÓN PREVIA POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>.</div>
                <div class="declaracion-item">VI. CAMBIE SU NACIONALIDAD MEXICANA POR OTRA.</div>
                <div class="declaracion-item">VII. SIENDO EXTRANJERO INVOQUE LA PROTECCIÓN DE SU GOBIERNO EN RELACIÓN AL PRESENTE CONTRATO.</div>
                <div class="declaracion-item">VIII. EN GENERAL, POR INCUMPLIMIENTO DE CUALQUIERA DE LAS OBLIGACIONES DERIVADAS DEL PRESENTE CONTRATO, EL CÓDIGO, EL REGLAMENTO, LOS TRATADOS Y DEMÁS DISPOSICIONES APLICABLES.</div>
                <div class="declaracion-item">IX. SI <strong>"EL PRESTADOR DE SERVICIOS"</strong> EN VIRTUD DE LA INFORMACIÓN CON QUE CUENTE LA CONTRALORÍA MUNICIPAL HAYA CELEBRADO CONTRATOS EN CONTRAVENCIÓN A LO DISPUESTO POR EL <strong>"LEY".</strong></div>
                <div class="declaracion-item">X. POR CUALQUIER OTRA CAUSA IMPUTABLE A ÉL, SIMILAR A LAS ANTES MENCIONADAS.</div>
                <div class="texto">EN CASO DE QUE <strong>"EL MUNICIPIO"</strong> OPTE POR LA RESCISIÓN DEL CONTRATO; <strong>"EL PRESTADOR DE SERVICIOS"</strong> ESTARÁ OBLIGADO A PAGAR DAÑOS Y PERJUICIOS, OCASIONADOS A <strong>"EL MUNICIPIO"</strong>.</div>

                <div class="clausula"><strong>DÉCIMA SEGUNDA. MODIFICACIÓN. -</strong> <strong>"EL MUNICIPIO"</strong> DENTRO DE SU PRESUPUESTO APROBADO PODRÁ MODIFICAR EL PRESENTE CONTRATO, DE CONFORMIDAD A LO ESTABLECIDO EN EL ARTÍCULO 125 DEL "REGLAMENTO".</div>

                <div class="clausula"><strong>DÉCIMA TERCERA. -- LEGISLACIÓN.</strong> ESTE CONTRATO SE RIGE POR LO ESTABLECIDO EN LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y SU RESPECTIVO REGLAMENTO.</div>

                <div class="clausula"><strong>DÉCIMA CUARTA. -- JURISDICCIÓN.</strong> PARA LA INTERPRETACIÓN, EJECUCIÓN, CUMPLIMIENTO O TERMINACIÓN DEL PRESENTE CONTRATO, <strong>"LAS PARTES"</strong> ACUERDAN SOMETERSE EXPRESAMENTE A LA JURISDICCIÓN Y COMPETENCIA DEL TRIBUNAL DE JUSTICIA ADMINISTRATIVA DEL ESTADO DE MÉXICO, RENUNCIANDO DESDE ESTE MOMENTO A CUALQUIER OTRO FUERO QUE POR RAZÓN DE SU DOMICILIO O PRESENTE FUTURO PUDIERA CORRESPONDERLES.</div>

                <div class="clausula"><strong>DÉCIMA QUINTA. -- PENAS CONVENCIONALES.</strong> EN CASO DEL INCUMPLIMIENTO POR PARTE DE <strong>"EL PRESTADOR DE SERVICIOS"</strong> DE LAS OBLIGACIONES PACTADAS EN EL CONTRATO, SE APLICARÁ UNA PENA CONVENCIONAL EQUIVALENTE AL MONTO QUE RESULTE DE APLICAR EL 10% DEL VALOR DE LOS BIENES QUE NO SE HAYAN SUMINISTRADO A SATISFACCIÓN DE <strong>"EL MUNICIPIO"</strong>, LO ANTERIOR, CON FUNDAMENTO EN LO DISPUESTO EN LA FACCIÓN VII DEL ARTÍCULO 120 DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

                <div class="numero-pagina">3 DE 4</div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- HOJA 4: FIRMAS Y TESTIGOS -->
        <!-- ========================================== -->
        <div class="hoja">
            <img class="marca-agua" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Flor.svg/512px-Flor.svg.png">
            <div class="contenido-hoja">
                <div class="encabezado-logo">
                    <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
                    <span>TEMASCALCINGO</span>
                </div>
                <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

                <div class="texto">UNA VEZ LEÍDO EL PRESENTE CONTRATO Y CONFORMES CON SU CONTENIDO, PROCEDEN A RATIFICAR EN TODAS Y CADA UNA DE SUS PARTES FIRMÁNDOLO POR TRIPLICADO, AL CALCE Y AL MARGEN PARA DEBIDA CONSTANCIA LEGAL, EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, A LOS <span id="fecha_texto" class="campo campo-mediano" contenteditable="true"></span>.</div>

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
                            SECRETARIO DEL MUNICIPIO
                        </div>
                    </div>
                </div>

                <div style="border: 1px solid black; margin-top: 15px;">
                    <div style="text-align: center; font-weight: bold; padding: 8px;">POR "EL ÁREA USUARIA"</div>
                    <div style="text-align: center; padding: 15px;">
                        <div style="margin-top: 20px;"></div>
<strong>C. MIRIAM VIANEY OVANDO RUBIO</strong><br>
                        DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
                    </div>
                </div>

                <div style="border: 1px solid black; margin-top: 15px;">
                    <div style="text-align: center; font-weight: bold; padding: 8px;">POR "EL PRESTADOR DEL SERVICIO"</div>
                    <div style="text-align: center; padding: 15px;">
                        <div style="margin-top: 20px;"></div>
                        <span id="nombre_representante" class="campo campo-largo" contenteditable="true"></span><br>
                        APODERADA LEGAL<br>
                        <span id="nombre_empresa_firma" class="campo campo-largo" contenteditable="true"></span>
                    </div>
                </div>

                <div class="numero-pagina">4 DE 4</div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/portalProceso/contratoPresentacion.js"></script>
    <script>
    </script>
</body>

</html>