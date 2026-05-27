<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato de Adquisición - Temascalcingo</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#edf1f5;
            font-family:'Century Gothic', 'Segoe UI', sans-serif;
            padding:25px;
            color:#000;
        }

        .contenedor-principal{
            max-width:1450px;
            margin:auto;
        }

        /* HEADER SUPERIOR */
        .header-superior{
            background:linear-gradient(135deg,#5e1b34,#8b2c4a);
            border-radius:22px;
            padding:28px 35px;
            color:white;
            margin-bottom:25px;
            box-shadow:0 10px 25px rgba(0,0,0,.08);
        }

        .header-superior h1{
            font-size:28px;
            margin-bottom:8px;
        }

        .header-superior p{
            font-size:13px;
            opacity:.9;
        }

        .barra-acciones{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
            flex-wrap:wrap;
            gap:10px;
        }

        .breadcrumb{
            background:white;
            border-radius:50px;
            padding:10px 18px;
            font-size:13px;
            box-shadow:0 2px 5px rgba(0,0,0,.06);
        }

        .breadcrumb a{
            text-decoration:none;
            color:#8b2c4a;
            font-weight:bold;
        }

        .grupo-botones{
            display:flex;
            gap:10px;
        }

        .btn{
            border:none;
            border-radius:40px;
            padding:10px 24px;
            font-size:13px;
            font-weight:bold;
            cursor:pointer;
            transition:.2s;
        }

        .btn:hover{
            transform:translateY(-1px);
        }

        .btn-volver{
            background:white;
            border:1px solid #ccc;
        }

        .btn-guardar{
            background:#5e1b34;
            color:white;
        }

        /* DOCUMENTO */
        .contenedor-documento{
            display:flex;
            justify-content:center;
        }

        .grupo-hojas{
            width:210mm;
        }

        .hoja{
            width:210mm;
            min-height:297mm;
            background:white;
            border:1px solid #d8d8d8;
            box-shadow:0 0 15px rgba(0,0,0,.08);
            margin-bottom:35px;
            padding:18mm;
            position:relative;
        }

        .contenido-hoja{
            width:100%;
            height:100%;
            font-size:9pt;
            line-height:1.7;
            text-align:justify;
            text-transform:uppercase;
        }

        .encabezado{
            text-align:center;
            font-weight:bold;
            margin-bottom:18px;
        }

        .titulo{
            text-align:center;
            font-size:13pt;
            font-weight:bold;
            margin-bottom:12px;
        }

        .subtitulo{
            text-align:center;
            font-size:10pt;
            font-weight:bold;
            margin-top:10px;
            margin-bottom:10px;
        }

        .texto{
            margin-bottom:12px;
        }

        .campo{
            display:inline-block;
            border-bottom:1px solid #000;
            min-width:120px;
            padding:1px 4px;
            background:#fffceb;
            font-weight:bold;
            outline:none;
        }

        .campo[contenteditable="true"]{
            cursor:text;
        }

        .campo-corto{
            min-width:90px;
        }

        .campo-mediano{
            min-width:220px;
        }

        .campo-largo{
            min-width:420px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
            margin-bottom:18px;
            font-size:9pt;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:7px;
            vertical-align:top;
        }

        table th{
            text-align:center;
            font-weight:bold;
        }

        .celda-editable{
            background:#fffceb;
            outline:none;
        }

        .numero-pagina{
            position:absolute;
            bottom:10mm;
            right:18mm;
            font-size:8pt;
            font-weight:bold;
        }

        .firma{
            margin-top:70px;
            width:45%;
            display:inline-block;
            vertical-align:top;
        }

        .firma-completa{
            margin-top:70px;
            width:100%;
            text-align:center;
        }

        .linea{
            border-top:1px solid #000;
            padding-top:8px;
            text-align:center;
            font-weight:bold;
        }

        @page{
            size:A4;
            margin:0;
        }

        @media print{

            body{
                background:white;
                padding:0;
            }

            .header-superior,
            .barra-acciones{
                display:none;
            }

            .hoja{
                border:none;
                box-shadow:none;
                margin:0;
                page-break-after:always;
            }

            .hoja:last-child{
                page-break-after:auto;
            }

        }

    </style>

</head>

<body>

<div class="contenedor-principal">

    <!-- HEADER SUPERIOR -->
    <div class="header-superior">

        <h1>
            <i class="fas fa-file-contract"></i>
            CONTRATO DE ADQUISICIÓN
        </h1>

        <p>
            Vista previa del contrato oficial del procedimiento adquisitivo
        </p>

    </div>

    <!-- BARRA DE ACCIONES -->
    <div class="barra-acciones">

        <div class="breadcrumb">
            <a href="#">Inicio</a> / <a href="#">Procesos</a> / Contrato
        </div>

        <div class="grupo-botones">
            <button class="btn btn-volver" onclick="window.history.back();">
                <i class="fas fa-arrow-left"></i> Regresar
            </button>
            <button class="btn btn-guardar" id="btnGuardar">
                <i class="fas fa-save"></i> Guardar Contrato
            </button>
        </div>

    </div>

    <!-- DOCUMENTO CON TODAS LAS HOJAS -->
    <div class="contenedor-documento">
        <div class="grupo-hojas">

            <!-- ================= HOJA 1 ================= -->
            <div class="hoja">
                <div class="contenido-hoja">

                    <div class="encabezado">
                        “2025. BICENTENARIO DE LA VIDA MUNICIPAL EN EL ESTADO DE MÉXICO”
                    </div>

                    <div class="encabezado">
                        CONTRATO PARA LA “<span class="campo campo-largo" contenteditable="true">nombre_estudio</span>”
                    </div>

                    <div class="titulo">
                        <span class="campo campo-mediano" contenteditable="true">MTM-CAYS-LPNP numero_licitacion</span>
                    </div>

                    <div class="texto">
                        CONTRATO QUE CELEBRAN POR UNA PARTE EL MUNICIPIO CONSTITUCIONAL DE TEMASCALCINGO, MÉXICO, REPRESENTADO EN ESTE ACTO POR LA <span class="campo campo-largo" contenteditable="true">C. VERÓNICA MORENO MARTÍNEZ</span>, EN SU CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL; <span class="campo campo-largo" contenteditable="true">C. RAMIRO GALINDO REYES</span>, SECRETARIO DEL AYUNTAMIENTO; <span class="campo campo-largo" contenteditable="true">C. JOSÉ HUMBERTO SÁNCHEZ HERNÁNDEZ</span>, COORDINADOR MUNICIPAL DE PROTECCIÓN CIVIL Y BOMBEROS Y ÁREA USUARIA; QUIÉN EN LO SUCESIVO Y PARA LOS EFECTOS DEL PRESENTE SE LE DENOMINARÁ <strong>“EL MUNICIPIO”</strong>; Y POR OTRA PARTE <span class="campo campo-largo" contenteditable="true">nombre_empresa</span>, REPRESENTADO EN ESTE ACTO POR EL <span class="campo campo-largo" contenteditable="true">fk_usuarios</span> A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ <strong>“EL PROVEEDOR”</strong>, AL TENOR DE LAS DECLARACIONES Y CLÁUSULAS SIGUIENTES:
                    </div>

                    <div class="subtitulo">DECLARACIONES</div>

                    <div class="texto"><strong>I. “EL MUNICIPIO” DECLARA:</strong></div>
                    <div class="texto">1. QUE CON ARREGLO A LO PREVISTO POR LOS ARTÍCULOS 115, DE LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS; 113, 116 , 123, Y 125, DE LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, 31, FRACCIÓN XVIII, DE LA LEY ORGÁNICA MUNICIPAL DEL ESTADO DE MÉXICO; ASÍ COMO LOS ARTÍCULOS 65, 66, 67, 68, 69, 70, 71, 72, 73, 74 Y 75 DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO EL 120, 123, 124, 125 Y 127 DEL REGLAMENTO; EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, TIENE LA ATRIBUCIÓN PARA CELEBRAR EL PRESENTE CONTRATO.</div>
                    <div class="texto">2. QUE LA <span class="campo campo-largo" contenteditable="true">C. VERÓNICA MORENO MARTÍNEZ</span>, EN SU CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL, ESTÁ FACULTADA PARA CONOCER, OTORGAR Y SUSCRIBIR ESTE CONTRATO.</div>
                    <div class="texto">3. QUE EL <span class="campo campo-largo" contenteditable="true">C. RAMIRO GALINDO REYES</span>, EN SU CARÁCTER DE SECRETARIO DEL AYUNTAMIENTO, EN TÉRMINOS DE LO QUE ESTABLECE EL ARTÍCULO 91 FRACCIÓN V DE LA LEY ORGÁNICA MUNICIPAL, TIENE LA ATRIBUCIÓN DE VALIDAR CON SU FIRMA LOS DOCUMENTOS OFICIALES EMANADOS DE “EL MUNICIPIO” Y DE CUALQUIERA DE SUS MIEMBROS.</div>
                    <div class="texto">4. LAS DEPENDENCIAS Y ENTIDADES DE LA ADMINISTRACIÓN PÚBLICA MUNICIPAL CONDUCIRÁN SUS ACCIONES CON BASE A LOS PROGRAMAS ANUALES QUE ESTABLECE EL MUNICIPIO PARA EL LOGRO DE SUS OBJETIVOS.</div>
                    <div class="texto">5. QUE TIENE ESTABLECIDO SU DOMICILIO EN <span class="campo campo-largo" contenteditable="true">domicilio_fiscal</span>, MISMO QUE SE SEÑALA PARA LOS FINES Y EFECTOS LEGALES DEL PRESENTE INSTRUMENTO.</div>
                    <div class="texto">MANIFIESTA “EL MUNICIPIO” QUE TIENE EN SU HABER RECURSOS PECUNIARIOS PROVENIENTES DE RECURSOS <span class="campo campo-mediano" contenteditable="true">FORTAMUN-2025</span> PARA LA <span class="campo campo-largo" contenteditable="true">nombre_estudio</span></div>
                    <div class="texto">6. CONFORME A CONTROL PRESUPUESTAL AUTORIZADO POR LA TESORERÍA MUNICIPAL.</div>
                    <div class="texto">QUE LA ADJUDICACIÓN DEL CONTRATO SE REALIZÓ MEDIANTE PROCEDIMIENTO POR <strong>LICITACIÓN PÚBLICA NACIONAL PRESENCIAL LPNP <span class="campo campo-mediano" contenteditable="true">numero_licitacion</span></strong>, DE CONFORMIDAD CON LOS ARTÍCULOS 3, 26, 28, 29, 30 FRACCIÓN I, 32, 33, 35, 36 Y 37 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, 61 Y67 FRACCIÓN IX DE SU RESPECTIVO REGLAMENTO; ASÍ COMO EN LO ESTABLECIDO EN EL PUNTO 3.1 DE LAS BASES QUE SE EMITIERON PARA EL PROCEDIMIENTO EN MENCIÓN.</div>

                    <div class="numero-pagina">1 DE 8</div>
                </div>
            </div>

            <!-- ================= HOJA 2 ================= -->
            <div class="hoja">
                <div class="contenido-hoja">
                    <div class="texto"><strong>II. DE “EL PROVEEDOR”, BAJO PROTESTA DE DECIR VERDAD DECLARA:</strong></div>
                    <div class="texto">1. QUE ES UNA EMPRESA CONSTITUIDA LEGALMENTE DE ACUERDO CON LAS LEYES DE NUESTRO PAÍS, QUE, CON LA SUSCRIPCIÓN DEL PRESENTE CONTRATO, CUMPLE CON UNO DE LOS FINES ESTABLECIDOS DENTRO DE SU OBJETO SOCIAL, SEGÚN LO ACREDITA CON <span class="campo campo-largo" contenteditable="true">INSTRUMENTO NÚMERO TREINTA MIL CIENTO CUARENTA Y CUATRO, VOLUMEN DOSCIENTOS VEINTICUATRO, FOLIO NÚMERO DIECINUEVE MIL OCHOCIENTOS SESENTA Y OCHO, DE FECHA CATORCE DE ENERO DEL AÑO DOS MIL DIECINUEVE, ANTE LA FE DEL DEL DOCTOR EN DERECHO JOSÉ ALEJANDRO ROMERO CARRETO, NOTARIO PÚBLICO TITULAR NÚMERO CINCO, DEL DISTRITO JUDICIAL DE HUEJOTZINGO DEL ESTADO LIBRE Y SOBERANO DE PUEBLA EN LOS ESTADOS UNIDOS MEXICANOS</span>, QUE SU MISMA QUE CUENTA CON EL <span class="campo campo-largo" contenteditable="true">REGISTRO PÚBLICO DE COMERCIO NÚMERO FME N-2019043579 DE FECHA 07 DE JUNIO DE 2019.</span></div>
                    <div class="texto">2. QUE EL <span class="campo campo-largo" contenteditable="true">C. JULIO DAVID MUÑIZ NOGUEDA</span>, EN SU CARÁCTER DE REPRESENTANTE LEGAL, COMO LO ACREDITA CON <span class="campo campo-largo" contenteditable="true">INSTRUMENTO NUMERO DIECINUEVE MIL CUATROCIENTOS DIECISEIS</strong>, <strong>VOLUMEN NÚMERO DOSCIENTOS NOVENTA Y CUATRO</strong>, <strong>FOLIO NÚMERO TRES MIL CUATROCIENTOS OCHENTA Y TRES</strong>, <strong>DE FECHA VEINTICINCO DE FEBRERO DEL AÑO DOS MIL VEINTE</strong></span>, ANTE LA FE DEL <span class="campo campo-largo" contenteditable="true">C. ERNESTO ORDAZ MORENO, NOTARIO PÚBLICO AUXILIAR DE LA NOTARÍA PUBLICA NÚMERO TRECE TITULAR</span>, DE LAS QUE ESTÁ EN EJERCICIO EN EL DISTRITO JUDICIAL DE PUEBLA, CUYO TITULAR LO ES EL <span class="campo campo-largo" contenteditable="true">C. ENRIQUE RAMÍREZ GUYOT</span> ACTUANDO EN SU PROTOCOLO Y CON SU SELLO DE AUTORIZAR, EN EL ESTADO DE LA HEROICA PUEBLA DE ZARAGOZA, ESTADO DE PUEBLA, PUEBLA MÉXICO, BAJO PROTESTA DE DECIR VERDAD, MANIFIESTA QUE CUENTA CON FACULTADES SUFICIENTES PARA OBLIGAR A SU REPRESENTADA EN TÉRMINOS DEL PRESENTE CONTRATO, MISMAS QUE A LA FECHA NO LE HAN SIDO LIMITADAS, MODIFICADAS O REVOCADAS, Y EN CASO CONTRARIO, ESTÁ ANUENTE EN QUEDAR OBLIGADO A TÍTULO PERSONAL DE LOS COMPROMISOS CONTRAÍDOS POR SU REPRESENTADA Y SE IDENTIFICA CON CREDENCIAL PARA VOTAR CON NÚMERO <span class="campo campo-mediano" contenteditable="true">num_credencial_votar</span> EXPEDIDA POR EL INSTITUTO NACIONAL ELECTORAL (CREDENCIAL PARA VOTAR)</div>
                    <div class="texto">3. QUE SU REGISTRO FEDERAL DE CONTRIBUYENTES ES <span class="campo campo-mediano" contenteditable="true">rfc</span>.</div>
                    <div class="texto">4. QUE CONOCE LAS ESPECIFICACIONES DEL PROCEDIMIENTO DE LICITACIÓN PÚBLICA NACIONAL PRESENCIAL REFERENTE A LA <span class="campo campo-largo" contenteditable="true">nombre_estudio</span> QUE LLEVA A CABO EL MUNICIPIO DE TEMASCALCINGO Y DEMÁS DOCUMENTOS QUE SE ENCUENTRAN INTEGRADOS AL EXPEDIENTE QUE SE FORMÓ CON MOTIVO DEL PROCEDIMIENTO DE ADQUISICIÓN ANTES REFERIDO.</div>
                    <div class="texto">5. QUE CONOCE PLENAMENTE LAS DISPOSICIONES, QUE PARA EL CASO DE LA CONTRATACIÓN DE SERVICIOS SE ESTABLECE EN LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS, LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO SU RESPECTIVO REGLAMENTO.</div>
                    <div class="texto">6. QUE BAJO PROTESTA DE DECIR VERDAD LA PERSONA QUE REPRESENTA NO SE ENCUENTRA EN NINGUNO DE LOS SUPUESTOS QUE ESTABLECE EL ARTÍCULO 74 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

                    <div class="texto"><strong>III. DE LAS “PARTES”</strong></div>
                    <div class="texto">1. QUE EN VIRTUD DE LAS DECLARACIONES QUE ANTECEDEN, Y UNA VEZ QUE SE HAN RECONOCIDO SU CAPACIDAD Y PERSONALIDAD, CONVIENEN EXPRESAMENTE EN SUJETARSE A LAS SIGUIENTES:</div>
                    <div class="texto"><strong>DEFINICIONES.</strong> “LAS PARTES” CONVIENEN QUE, PARA LOS EFECTOS DEL PRESENTE CONTRATO, SE ENTENDERÁ POR:</div>
                    <div class="texto">1. LEY: LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
                    <div class="texto">2. REGLAMENTO: EL REGLAMENTO DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

                    <div class="subtitulo">CLÁUSULAS</div>

                    <div class="texto"><strong>PRIMERA. - OBJETO.</strong> “EL MUNICIPIO” ENCOMIENDA A “EL PROVEEDOR” LLEVAR A CABO EL SUMINISTRO DE <span class="campo campo-largo" contenteditable="true">nombre_estudio</span>.</div>

                    <table>
                        <thead>
                            <tr><th>PARTIDA</th><th>DESCRIPCIÓN DE LOS BIENES</th><th>MARCA Y MODELO OFERTADO</th><th>UNIDAD DE MEDIDA</th><th>CANTIDAD</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="celda-editable" contenteditable="true">ÚNICA</td>
                                <td class="celda-editable" contenteditable="true">nombre_estudio<br><br>CARACTERÍSTICAS MÍNIMAS DE LA UNIDAD<br><br>descripcion<br><br>CARACTERISTICAS descripcion:<br>descripcion<br><br>CARACTERÍSTICAS DEL producto_servicio<br>descripcion</td>
                                <td class="celda-editable" contenteditable="true">marca_modelo</td>
                                <td class="celda-editable" contenteditable="true">unidad_medida</td>
                                <td class="celda-editable" contenteditable="true">cantidad</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="numero-pagina">2 DE 8</div>
                </div>
            </div>

            <!-- ================= HOJA 3 ================= -->
            <div class="hoja">
                <div class="contenido-hoja">
                    <div class="texto"><strong>SEGUNDA. -- IMPORTE.</strong> LA CANTIDAD TOTAL A PAGAR POR PARTE DE “EL MUNICIPIO” SERÁ DE <strong>$<span class="campo campo-mediano" contenteditable="true">precio_total</span> (<span class="campo campo-largo" contenteditable="true">precio_total en texto 92/100 M.N.</span>) INCLUIDO EL IMPUESTO AL VALOR AGREGADO I.V.A.</strong> PAGADO EN UNA SOLA EXHIBICIÓN.</div>
                    <div class="texto"><strong>TERCERA. - ANTICIPO.</strong> “EL MUNICIPIO” NO OTORGARÁ A “EL PROVEEDOR” ANTICIPO ALGUNO, MOTIVO DEL PRESENTE CONTRATO.</div>
                    <div class="texto"><strong>CUARTA. - “LAS PARTES”</strong> CONVIENEN QUE LOS PRECIOS OFERTADOS SERÁN FIJOS Y POR NINGÚN MOTIVO PODRÁN MODIFICARSE.</div>
                    <div class="texto"><strong>QUINTA:</strong> “LAS PARTES” ACUERDAN QUE EL PAGO POR LA <span class="campo campo-largo" contenteditable="true">nombre_estudio</span> OBJETO DEL PRESENTE CONTRATO, SE CUBRIRÁ DE LA MANERA SIGUIENTE:</div>
                    <div class="texto">I. “EL PROVEEDOR” ENTREGARÁ SU FACTURA A MÁS TARDAR A LOS DIEZ DÍAS HÁBILES POSTERIORES A LA ENTREGA TOTAL DE LOS BIENES CON SU RESPECTIVO XML PARA TRÁMITE DE PAGO EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN LAS INSTALACIONES DEL EX SEMINARIO UBICADAS EN AV. DE LA PAZ ESQUINA MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>
                    <div class="texto">II. “EL MUNICIPIO” SE COMPROMETE Y OBLIGA A PAGAR LA CANTIDAD ANTES MENCIONADA EN UNA SOLA EXHIBICIÓN, LA FACTURA SE ENTREGARÁ EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.</div>
                    <div class="texto">III. “EL MUNICIPIO”, HARÁ EL PAGO A “EL PROVEEDOR”, MEDIANTE TRANSFERENCIA ELECTRÓNICA.</div>
                    <div class="texto"><strong>SEXTA:</strong> PARA EL CUMPLIMIENTO DEL OBJETO DEL PRESENTE CONTRATO “EL PROVEEDOR” SE OBLIGA A:</div>
                    <div class="texto">I. ENTREGAR A EL MUNICIPIO DE TEMASCALCINGO MÉXICO UNA AMBULANCIA, DERIVADO DEL PROCEDIMIENTO DE LICITACIÓN PÚBLICA NACIONAL PRESENCIAL EN LOS TÉRMINOS PACTADOS DENTRO DE LA CLÁUSULA PRIMERA DE ESTE INSTRUMENTO.</div>
                    <div class="texto">II. INFORMAR A “EL MUNICIPIO” DE CUALQUIER ANOMALÍA QUE SE PRESENTE DURANTE LA EJECUCIÓN DEL PRESENTE CONTRATO, EN CUANTO IMPIDA O DIFICULTE LLEVAR A CABO EL SUMINISTRO DEL PROCEDIMIENTO REFERENTE A LA <span class="campo campo-largo" contenteditable="true">nombre_estudio</span> COMUNICAR POR ESCRITO OPORTUNAMENTE A “EL MUNICIPIO” CUALQUIER CAMBIO DE DOMICILIO.</div>
                    <div class="texto">III. CUMPLIR CON LAS DEMÁS OBLIGACIONES QUE DERIVEN DEL PRESENTE CONTRATO.</div>
                    <div class="texto"><strong>SEPTIMA. TIEMPO Y LUGAR DE ENTREGA:</strong> LA ENTREGA SE LLEVARÁ A CABO DENTRO DE LOS CUARENTA DÍAS HÁBILES POSTERIORES A LA FIRMA DEL PRESENTE CONTRATO EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, UBICADO EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>
                    
                    <div class="numero-pagina">3 DE 8</div>
                </div>
            </div>

            <!-- ================= HOJA 4 ================= -->
            <div class="hoja">
                <div class="contenido-hoja">
                    <div class="texto"><strong>OCTAVA. - DE LAS GARANTÍAS.</strong> “EL PROVEEDOR” DEBERÁ ENTREGAR A “EL MUNICIPIO” LAS GARANTÍAS SIGUIENTES:</div>
                    <div class="texto">I. <strong>CUMPLIMIENTO DE CONTRATO:</strong> SE CONSTITUIRÁ POR EL 10% DEL IMPORTE DEL SUBTOTAL DEL CONTRATO (SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO), DENTRO DE LOS DIEZ DÍAS HÁBILES POSTERIORES A LA FIRMA DE CONTRATO EN CASO DE APLAZAR LA ENTREGA DE LOS BIENES, POR LA CANTIDAD DE <strong>$<span class="campo campo-mediano" contenteditable="true">precio_total</span> (<span class="campo campo-largo" contenteditable="true">precio_total en texto 20/100 M.N</span>)</strong> Y ESTARÁ VIGENTE HASTA EL CUMPLIMIENTO DEL PRESENTE CONTRATO.</div>
                    <div class="texto">II. <strong>VICIOS OCULTOS:</strong> SE CONSTITUIRÁ POR EL 5% DEL IMPORTE DEL SUBTOTAL DEL CONTRATO (SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO), DENTRO DE LOS CINCO DÍAS HÁBILES POSTERIORES A LA ENTREGA TOTAL DE LOS BIENES, POR LA CANTIDAD DE <strong>$<span class="campo campo-mediano" contenteditable="true">precio_total</span> (<span class="campo campo-largo" contenteditable="true">precio_total en texto 60/100 M.N.</span>)</strong> Y ESTARÁ VIGENTE DURANTE UN AÑO.</div>
                    <div class="texto">III. LA FIANZA DEBERÁ CONTENER LAS SIGUIENTES DECLARACIONES EXPRESAS DE LA AFIANZADORA: QUE LA FIANZA SE OTORGA EN LOS TÉRMINOS DEL PRESENTE CONTRATO.<br>
                    a. SE EMITIRÁ A NOMBRE DEL <strong>“MUNICIPIO DE TEMASCALCINGO MÉXICO”</strong><br>
                    b. QUE PARA CANCELAR LA FIANZA SERÁ REQUISITO INDISPENSABLE LA CONFORMIDAD EXPRESA Y POR ESCRITO DE “EL MUNICIPIO”, QUIEN LO EMITIRÁ SOLO CUANDO “EL PROVEEDOR” HAYA CUMPLIDO UN AÑO DE LA EMISIÓN DE ESTA.<br>
                    c. QUE LA INSTITUCIÓN AFIANZADORA ACEPTA EXPRESAMENTE LO PRECEPTUADO EN LOS ARTÍCULOS 93, 94 Y 118 DE LA LEY FEDERAL DE LAS INSTITUCIONES DE SEGUROS Y FIANZAS VIGENTE.<br>
                    d. QUE “EL MUNICIPIO” HARÁ EFECTIVA LA FIANZA A PARTIR DEL INCUMPLIMIENTO DE CUALQUIER OBLIGACIÓN CONSIGNADA EN TODAS Y CADA UNA DE LAS CLÁUSULAS DEL PRESENTE CONTRATO, POR LA CANTIDAD EN DINERO QUE SE ORIGINE.</div>

                    <div class="texto"><strong>NOVENA. - RESCISIÓN ORIGINADA POR LA NO PRESENTACIÓN DE LA GARANTÍA.</strong> PARA EL CASO DE QUE “EL PROVEEDOR” NO PRESENTE LA GARANTÍA DESCRITA EN LA FRACCIÓN I DE LA CLÁUSULA OCTAVA DEL PRESENTE CONTRATO, SE RESCINDIRÁ EL MISMO, DEBIENDO PAGAR ÉSTE A “EL MUNICIPIO” LOS DAÑOS Y PERJUICIOS QUE ELLO LE OCASIONE, ASÍ COMO LAS DEMÁS SANCIONES QUE EL PRESENTE CONTRATO ESTABLECE.</div>

                    <div class="numero-pagina">4 DE 8</div>
                </div>
            </div>

            <!-- ================= HOJA 5 ================= -->
            <div class="hoja">
                <div class="contenido-hoja">
                    <div class="texto"><strong>DÉCIMA.</strong> - “EL MUNICIPIO” PODRÁ INICIAR EL PROCEDIMIENTO DE RESCISIÓN DEL PRESENTE CONTRATO, SIN RESPONSABILIDAD ALGUNA PARA ÉL, POR LAS SIGUIENTES CAUSAS IMPUTABLES A “EL PROVEEDOR”:</div>
                    <div class="texto">I. NO ENTREGUE LA GARANTÍA ESTABLECIDA EN LA CLÁUSULA OCTAVA EN LOS PLAZOS ESTIPULADOS.</div>
                    <div class="texto">II. SI “EL PROVEEDOR” NO DA LAS FACILIDADES NECESARIAS A LOS SUPERVISORES QUE AL EFECTO DESIGNE “EL MUNICIPIO” PARA LLEVAR A CABO LA REVISIÓN DE LOS BIENES ADQUIRIDOS.</div>
                    <div class="texto">III. SI “EL PROVEEDOR” CEDE, TRASPASA O SUBCONTRATA LA TOTALIDAD O PARTE DE LOS BIENES ADQUIRIDOS SIN EL CONSENTIMIENTO POR ESCRITO DE “EL MUNICIPIO” Y SI CEDE A TERCEROS EN FORMA PARCIAL O TOTAL LOS DERECHOS Y OBLIGACIONES, Y LOS DERECHOS DE COBRO DERIVADOS DEL PRESENTE CONTRATO, SIN OBTENER LA AUTORIZACIÓN PREVIA POR ESCRITO DE “EL MUNICIPIO”.</div>
                    <div class="texto">IV. SI ES DECLARADO EN PROCEDIMIENTO ADQUISITIVO MERCANTIL, QUIEBRA O SUSPENSIÓN DE PAGOS, EN TÉRMINOS DE LO QUE ESTABLECE LA LEY DE PROCEDIMIENTO ADQUISITIVOS MERCANTILES.</div>
                    <div class="texto">V. CAMBIE SU NACIONALIDAD MEXICANA POR OTRA.</div>
                    <div class="texto">VI. SIENDO EXTRANJERO INVOQUE LA PROTECCIÓN DE SU GOBIERNO EN RELACIÓN AL PRESENTE CONTRATO.</div>
                    <div class="texto">VII. EN GENERAL, POR INCUMPLIMIENTO DE CUALESQUIERA DE LAS OBLIGACIONES DERIVADAS DEL PRESENTE CONTRATO, EL CÓDIGO, EL REGLAMENTO, LOS TRATADOS Y DEMÁS DISPOSICIONES APLICABLES.</div>
                    <div class="texto">VIII. POR CUALQUIER OTRA CAUSA IMPUTABLE A ÉL, SIMILAR A LAS ANTES MENCIONADAS.</div>
                    <div class="texto"><strong>DÉCIMA PRIMERA. - AUSENCIA DE VICIOS EN EL CONSENTIMIENTO.</strong> LAS “PARTES” MANIFIESTAN QUE EN EL PRESENTE CONTRATO NO EXISTE ERROR, LESIÓN, DOLO, VIOLENCIA, NI CUALQUIER OTRO VICIO DEL CONSENTIMIENTO QUE PUDIESE IMPLICAR SU NULIDAD Y QUE LAS DEMÁS PRESTACIONES QUE SE RECIBEN SON DE IGUAL VALOR, POR LO TANTO, RENUNCIAN A CUALQUIER ACCIÓN QUE LA LEY PUDIERA OTORGARLES A SU FAVOR, POR ESTE CONCEPTO.</div>
                    <div class="texto"><strong>DÉCIMA SEGUNDA. -- MODIFICACIÓN.</strong> - “EL MUNICIPIO” DENTRO DE SU PRESUPUESTO APROBADO PODRÁ MODIFICAR EL PRESENTE CONTRATO, DE CONFORMIDAD A LO ESTABLECIDO EN EL ARTÍCULO 125 DEL “REGLAMENTO”.</div>
                    
                    <div class="numero-pagina">5 DE 8</div>
                </div>
            </div>

            <!-- ================= HOJA 6 ================= -->
            <div class="hoja">
                <div class="contenido-hoja">
                    <div class="texto"><strong>DÉCIMA TERCERA. -- LEGISLACIÓN.</strong> ESTE CONTRATO SE RIGE POR LO ESTABLECIDO EN LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y SU RESPECTIVO REGLAMENTO.</div>
                    <div class="texto"><strong>DÉCIMA CUARTA. -- JURISDICCIÓN</strong> PARA LA INTERPRETACIÓN Y CUMPLIMIENTO DE ESTE CONTRATO, ASÍ COMO PARA TODO AQUELLO QUE NO ESTÉ EXPRESAMENTE ESTIPULADO EN EL MISMO, LAS PARTES SE SOMETEN A LA JURISDICCIÓN DEL JUZGADO CIVIL DE PRIMERA INSTANCIA DEL DISTRITO JUDICIAL DE EL ORO, ESTADO DE MÉXICO.</div>
                    <div class="texto">UNA VEZ LEÍDO EL PRESENTE CONTRATO Y CONFORMES CON SU CONTENIDO, PROCEDEN A RATIFICAR EN TODAS Y CADA UNA DE SUS PARTES FIRMÁNDOLO POR TRIPLICADO, AL CALCE Y AL MARGEN PARA DEBIDA CONSTANCIA LEGAL, EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, A LOS <span class="campo campo-largo" contenteditable="true">VEINTIDÓS DÍAS DEL MES DE AGOSTO DEL AÑO DOS MIL VEINTICINCO</span>.</div>

                    <div class="subtitulo">POR “EL MUNICIPIO”</div>
                    <div class="firma"><div class="linea">C. VERÓNICA MORENO MARTÍNEZ<br>PRESIDENTA MUNICIPAL CONSTITUCIONAL</div></div>
                    <div class="firma" style="float:right;"><div class="linea">C. RAMIRO GALINDO REYES<br>SECRETARIO DEL AYUNTAMIENTO</div></div>
                    <div style="clear:both;"></div>

                    <div class="firma-completa"><div class="linea"><span class="campo campo-largo" contenteditable="true">fk_coordinador</span><br><span class="campo campo-mediano" contenteditable="true">COORDINADOR MUNICIPAL DE PROTECCIÓN CIVIL Y BOMBEROS</span></div></div>

                    <div class="subtitulo" style="margin-top:50px;">POR “EL PROVEEDOR”</div>
                    <div class="firma-completa"><div class="linea"><span class="campo campo-largo" contenteditable="true">fk_proveedor</span><br>REPRESENTANTE LEGAL DE <span class="campo campo-mediano" contenteditable="true">nombre_empresa</span></div></div>

                    <div class="numero-pagina">6 DE 8</div>
                </div>
            </div>
            
            <!-- HOJAS 7 Y 8: Relleno para mantener numeración (pueden estar vacías o con nota) -->
            <div class="hoja"><div class="contenido-hoja"><div class="texto">(Espacio para anexos o continuación de firmas)</div><div class="numero-pagina">7 DE 8</div></div></div>
            <div class="hoja"><div class="contenido-hoja"><div class="texto">(Testigos y certificaciones adicionales)</div><div class="numero-pagina">8 DE 8</div></div></div>

        </div>
    </div>
</div>

<script>
    document.getElementById('btnGuardar').addEventListener('click', () => {
        const campos = document.querySelectorAll('[contenteditable="true"]');
        let datos = {};
        campos.forEach((campo, index) => {
            datos[`campo_${index}`] = campo.innerText.trim();
        });
        console.log(datos);
        alert('CONTRATO GUARDADO CORRECTAMENTE (simulación).');
    });
</script>

</body>
</html>