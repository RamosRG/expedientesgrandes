<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acta de Presentación y Apertura de Propuestas</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#edf1f5;
            font-family:'Century Gothic', sans-serif;
            padding:25px;
            color:#000;
        }

        .contenedor-principal{
            max-width:1450px;
            margin:auto;
        }

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
            padding:20mm 18mm 18mm 18mm;
            position:relative;
        }

        .contenido-hoja{
            width:100%;
            height:100%;
            font-size:9pt;
            line-height:1.6;
            text-align:justify;
            text-transform:uppercase;
        }

        .encabezado{
            text-align:center;
            font-weight:bold;
            border-bottom:1px solid #000;
            padding-bottom:10px;
            margin-bottom:18px;
        }

        .titulo{
            text-align:center;
            font-weight:bold;
            font-size:13pt;
            margin-bottom:5px;
        }

        .subtitulo{
            text-align:center;
            font-weight:bold;
            margin-bottom:20px;
            line-height:1.5;
        }

        .texto{
            margin-bottom:12px;
        }

        .centrado{
            text-align:center;
        }

        .campo{
            display:inline-block;
            border-bottom:1px solid #000;
            min-width:100px;
            padding:1px 4px;
            background:#fffceb;
            font-weight:bold;
            outline:none;
        }

        .campo[contenteditable="true"]{
            cursor:text;
        }

        .campo-corto{
            min-width:70px;
        }

        .campo-mediano{
            min-width:180px;
        }

        .campo-largo{
            min-width:300px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
            margin-bottom:18px;
            font-size:8pt;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:6px 4px;
            vertical-align:top;
        }

        table th{
            text-align:center;
            font-weight:bold;
            background:#f5f5f5;
        }

        .celda-editable{
            background:#fffceb;
            outline:none;
        }

        .celda-editable:focus{
            background:#fff7d6;
        }

        .check-editable{
            text-align:center;
            cursor:pointer;
        }

        .check-editable[contenteditable="true"]:empty:before{
            content:"___";
            color:#999;
        }

        .orden-dia{
            margin-top:15px;
            margin-bottom:18px;
            padding-left:15px;
        }

        .orden-dia div{
            margin-bottom:4px;
        }

        .firma-contenedor{
            width:100%;
            margin-top:50px;
        }

        .firma{
            width:45%;
            display:inline-block;
            vertical-align:top;
            text-align:center;
        }

        .linea-firma{
            border-top:1px solid #000;
            margin-top:60px;
            padding-top:8px;
            font-weight:bold;
        }

        .pie{
            margin-top:20px;
            text-align:center;
            font-size:7pt;
        }

        .numero-pagina{
            position:absolute;
            bottom:10mm;
            right:18mm;
            font-size:8pt;
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

        .tabla-requisitos{
            font-size:7.5pt;
        }

        .tabla-requisitos th,
        .tabla-requisitos td{
            padding:4px 3px;
        }

        .requisito-numero{
            width:25px;
            text-align:center;
            font-weight:bold;
        }

        .requisito-descripcion{
            text-align:left;
        }

        .empresa-columna{
            width:75px;
            text-align:center;
            background:#f0f0f0;
        }

    </style>
</head>

<body>

<div class="contenedor-principal">

    <div class="header-superior">

        <h1>
            <i class="fas fa-file-signature"></i>
            ACTA DE PRESENTACIÓN Y APERTURA DE PROPUESTAS
        </h1>

        <p>
            Documento oficial del procedimiento adquisitivo
        </p>

    </div>

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
                Guardar Acta
            </button>

        </div>

    </div>

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

                        <span class="campo campo-mediano" contenteditable="true">
                            IRNP-001-2025
                        </span>

                        <br>

                        PARA LA “

                        <span class="campo campo-largo" contenteditable="true">
                            COMPRA DE DOS PATRULLAS PARA SEGURIDAD PÚBLICA
                        </span>

                        ”

                    </div>

                    <div class="texto">

                        EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO SIENDO LAS

                        <span class="campo campo-corto" contenteditable="true">
                            09:30
                        </span>

                        HORAS DEL DÍA DEL

                        <span class="campo campo-mediano" contenteditable="true">
                            09 DE JULIO DEL AÑO DOS MIL VEINTICINCO
                        </span>,

                        EN EL ÁREA DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL,
                        SITO EN

                        <span class="campo campo-largo" contenteditable="true">
                            AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO
                        </span>.

                    </div>

                    <div class="texto">

                        LOS C.C.

                        <span class="campo campo-largo" contenteditable="true">
                            PAULO SERGIO HERNÁNDEZ CUADRIELLO
                        </span>,

                        COORDINADOR DE ADQUISICIONES Y SERVICIOS Y SERVIDOR PÚBLICO
                        DESIGNADO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO
                        DE PERSONAL;

                        <span class="campo campo-largo" contenteditable="true">
                            ELIZABETH MEJÍA PACHECO
                        </span>,

                        CONTRALORA INTERNA MUNICIPAL.

                    </div>

                    <div class="texto">

                        Y CON FUNDAMENTO EN LO DISPUESTO POR LOS ARTÍCULOS 27,
                        FRACCIÓN I, 35 FRACCIÓN I, 36, 43, 44 FRACCIÓN II, 45 Y 46
                        DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO
                        Y MUNICIPIOS.

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

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    EMPRESA
                                </th>

                                <th>
                                    REPRESENTANTE
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td class="celda-editable" contenteditable="true">
                                    CONSTRUCTORA Y SERVICIOS ADMINISTRATIVOS, S.A. DE C.V.
                                </td>

                                <td class="celda-editable" contenteditable="true">
                                    ING. MARIANA GARZA LÓPEZ
                                    <br>
                                    INE: GAML860412MDFRRN09
                                </td>

                            </tr>

                            <tr>

                                <td class="celda-editable" contenteditable="true">
                                    PROVEEDORA INTEGRAL DEL CENTRO, S.A. DE C.V.
                                </td>

                                <td class="celda-editable" contenteditable="true">
                                    LIC. ROBERTO SÁNCHEZ MARTÍNEZ
                                    <br>
                                    INE: SAMR750319HDFNL05
                                </td>

                            </tr>

                            <tr>

                                <td class="celda-editable" contenteditable="true">
                                    LIMPIADORA PROFESIONAL DEL VALLE, S.P.R. DE R.L.
                                </td>

                                <td class="celda-editable" contenteditable="true">
                                    C.P. FERNANDO DELGADO ROJAS
                                    <br>
                                    INE: DERF900812MDFRRL2
                                 </td>

                            </tr>

                        </tbody>

                    </table>

                    <div class="numero-pagina">
                        1 DE 4
                    </div>

                </div>

            </div>

            <!-- =====================================================
                 HOJA 2 - TABLA DE VERIFICACION DOCUMENTAL (REQUISITOS 1 AL 14)
            ====================================================== -->

            <div class="hoja">

                <div class="contenido-hoja">

                    <div class="texto">

                        <strong>III.</strong>
                        EN DESAHOGO DEL TERCER PUNTO DEL ORDEN DEL DÍA. –
                        SE VERIFICÓ QUE EXISTE EL NÚMERO DE LICITANTES
                        PARA LLEVAR A CABO EL PRESENTE ACTO.

                    </div>

                    <div class="texto">

                        <strong>IV.</strong>
                        EN DESAHOGO DEL CUARTO PUNTO DEL ORDEN DEL DÍA. –
                        SE REALIZÓ LA PRESENTACIÓN DE LOS SOBRES
                        QUE CONTIENEN LAS PROPUESTAS TÉCNICAS Y ECONÓMICAS.

                    </div>

                    <div class="texto">

                        <strong>V.</strong>
                        EN DESAHOGO DEL QUINTO PUNTO DEL ORDEN DEL DÍA. –
                        SE PROCEDIÓ A LA APERTURA DE PROPUESTAS TÉCNICAS.

                    </div>

                    <div class="texto" style="font-weight:bold; margin-top:10px;">
                        DOCUMENTACIÓN SOLICITADA EN LA PROPUESTA TÉCNICA
                    </div>

                    <table class="tabla-requisitos">

                        <thead>

                            <tr>

                                <th>N.P.</th>
                                <th>DOCUMENTACIÓN DE LA OFERTA TÉCNICA SOLICITADA</th>
                                <th class="empresa-columna">EMPRESA 1</th>
                                <th class="empresa-columna">EMPRESA 2</th>
                                <th class="empresa-columna">EMPRESA 3</th>

                            </tr>

                            <tr style="background:#e8e8e8;">
                                <td colspan="2"></td>
                                <td class="centrado"><strong>PRESENTÓ</strong></td>
                                <td class="centrado"><strong>PRESENTÓ</strong></td>
                                <td class="centrado"><strong>PRESENTÓ</strong></td>
                            </tr>

                        </thead>

                        <tbody>

                            <tr><td class="requisito-numero">1</td><td class="requisito-descripcion">ESCRITO EN PAPEL MEMBRETADO INDIQUE NÚMERO TOTAL DE FOLIOS, CARTA NO FOLIADA, PROPUESTA TÉCNICA FOLIADA Y FIRMADA AUTÓGRAFAMENTE, IMPRESA POR UNA SOLA CARA</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">2</td><td class="requisito-descripcion">PROPUESTA TÉCNICA REQUISITANDO TODOS LOS DATOS DEL PUNTO "PROPUESTA TÉCNICA" Y ANEXO 1</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">3</td><td class="requisito-descripcion">COPIA SIMPLE DE IDENTIFICACIÓN VIGENTE (PASAPORTE, CREDENCIAL VOTAR, LICENCIA CONDUCIR) DEL PROPIETARIO O REPRESENTANTE LEGAL Y QUIEN ASISTE AL ACTO (ANEXO 3)</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">4</td><td class="requisito-descripcion">COPIA SIMPLE CÉDULA IDENTIFICACIÓN FISCAL Y CONSTANCIA SITUACIÓN FISCAL; ESCRITO BAJO PROTESTA DE ESTAR AL CORRIENTE OBLIGACIONES FISCALES Y OPINIÓN POSITIVA DEL SAT</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">5</td><td class="requisito-descripcion">COPIA CERTIFICADA Y SIMPLE DE ESTADOS FINANCIEROS BÁSICOS DICIEMBRE 2024 (CONFORME NIF), FIRMADOS POR CONTADOR PÚBLICO, CON CÉDULA PROFESIONAL</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">6</td><td class="requisito-descripcion">COPIA SIMPLE DECLARACIÓN ANUAL 2024 Y PAGOS PROVISIONALES JUNIO 2025 COMPLETOS CON ANEXOS Y COMPROBANTE SAT</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">7</td><td class="requisito-descripcion">PERSONAS JURÍDICAS: ACTA CONSTITUTIVA Y MODIFICACIONES INSCRITAS EN RPC; PERSONAS FÍSICAS: ACTA NACIMIENTO Y CURP</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">8</td><td class="requisito-descripcion">ORIGINAL O COPIA CERTIFICADA DEL PODER NOTARIAL (GENERAL ADMINISTRACIÓN O ESPECIAL PARA CONCURSOS, LICITACIONES Y CONTRATOS)</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">9</td><td class="requisito-descripcion">CERTIFICADO DE EMPRESA MEXIQUENSE VIGENTE (NO ES CAUSAL DE DESECHAMIENTO, OTORGA 5% EN ADJUDICACIÓN)</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">10</td><td class="requisito-descripcion">ESCRITO BAJO PROTESTA DE NO ENCONTRARSE EN SUPUESTOS DEL ARTÍCULO 74 DE LA LEY DE RESPONSABILIDADES ADMINISTRATIVAS DEL ESTADO DE MÉXICO Y MUNICIPIOS</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">11</td><td class="requisito-descripcion">ESCRITO BAJO PROTESTA DE CAPACIDAD TÉCNICA, LABORAL Y FINANCIERA PARA PRESTAR EL SERVICIO Y CELEBRAR CONTRATOS</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">12</td><td class="requisito-descripcion">ESCRITO BAJO PROTESTA DE NO SUBCONTRATAR TOTAL O PARCIALMENTE, NI CEDER DERECHOS U OBLIGACIONES DEL CONTRATO</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">13</td><td class="requisito-descripcion">ESCRITO BAJO PROTESTA DE PLENO CONOCIMIENTO Y ACEPTACIÓN DE REQUISITOS Y LINEAMIENTOS DE LA SOLICITUD DE PARTICIPACIÓN</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">14</td><td class="requisito-descripcion">CURRÍCULUM EN PAPEL MEMBRETADO, SUSCRITO POR REPRESENTANTE LEGAL</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>

                        </tbody>

                    </table>

                    <div class="numero-pagina">
                        2 DE 4
                    </div>

                </div>

            </div>

            <!-- =====================================================
                 HOJA 3 - CONTINUACION TABLA Y APERTURA ECONOMICA
            ====================================================== -->

            <div class="hoja">

                <div class="contenido-hoja">

                    <table class="tabla-requisitos">

                        <thead>
                            <tr><th>N.P.</th><th>DOCUMENTACIÓN DE LA OFERTA TÉCNICA SOLICITADA</th><th class="empresa-columna">EMPRESA 1</th><th class="empresa-columna">EMPRESA 2</th><th class="empresa-columna">EMPRESA 3</th></tr>
                            <tr style="background:#e8e8e8;"><td colspan="2"></td><td class="centrado"><strong>PRESENTÓ</strong></td><td class="centrado"><strong>PRESENTÓ</strong></td><td class="centrado"><strong>PRESENTÓ</strong></td></tr>
                        </thead>

                        <tbody>

                            <tr><td class="requisito-numero">15</td><td class="requisito-descripcion">ESCRITO BAJO PROTESTA DE DOMICILIO (ANTIGÜEDAD NO MAYOR 3 MESES), COPIA COMPROBANTE DOMICILIO Y CORREO ELECTRÓNICO</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">16</td><td class="requisito-descripcion">ESCRITO BAJO PROTESTA DE NO DESEMPEÑAR EMPLEO PÚBLICO O ACTUALIZAR CONFLICTO DE INTERÉS (ARTÍCULO 50 FRACCIÓN VII LEY RESPONSABILIDADES)</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">17</td><td class="requisito-descripcion">ESCRITO BAJO PROTESTA DE ABSTENERSE DE CONDUCTAS PARA ALTERAR EVALUACIONES DE PROPUESTAS</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">18</td><td class="requisito-descripcion">CARTA MEMBRETADA O ESTADO DE CUENTA BANCARIO (&le;3 MESES): NÚMERO CUENTA, CLABE, TITULAR, BANCO, SUCURSAL</td><td class="celda-editable" contenteditable="true">_________</td><td class="celda-editable" contenteditable="true">_________</td><td class="celda-editable" contenteditable="true">_________</td></tr>
                            <tr><td class="requisito-numero">19</td><td class="requisito-descripcion">AFIANZADORAS AUTORIZADAS PARA FIANZAS (ANEXO 2)</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>
                            <tr><td class="requisito-numero">20</td><td class="requisito-descripcion">DATOS DEL LICITANTE Y REPRESENTANTE LEGAL (ANEXO 3) CON MANIFESTACIÓN BAJO PROTESTA DE FACULTADES SUFICIENTES</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td><td class="celda-editable check-editable" contenteditable="true">_____</td></tr>

                        </tbody>

                    </table>

                    <div class="texto" style="margin-top:10px;">

                        <strong>VI.</strong>
                        EN DESAHOGO DEL SEXTO PUNTO DEL ORDEN DEL DÍA. –
                        SE VERIFICÓ EN FORMA CUANTITATIVA LA DOCUMENTACIÓN
                        PRESENTADA POR LOS LICITANTES, CONFORME A LA TABLA ANTERIOR.

                    </div>

                    <div class="texto">

                        <strong>VII.</strong>
                        EN DESAHOGO DEL SÉPTIMO PUNTO DEL ORDEN DEL DÍA. –
                        SE ACEPTARON LAS PROPUESTAS TÉCNICAS
                        PARA SU POSTERIOR EVALUACIÓN.

                    </div>

                    <div class="texto">

                        <strong>VIII.</strong>
                        EN DESAHOGO DEL OCTAVO PUNTO DEL ORDEN DEL DÍA. –
                        SE PROCEDIÓ A LA APERTURA DE LAS PROPUESTAS ECONÓMICAS.

                    </div>

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    EMPRESA
                                </th>

                                <th>
                                    OBSERVACIÓN
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td class="celda-editable" contenteditable="true">
                                    CONSTRUCTORA Y SERVICIOS ADMINISTRATIVOS, S.A. DE C.V.
                                </td>

                                <td class="celda-editable" contenteditable="true">
                                    COTIZA UNA PARTIDA
                                </td>

                            </tr>

                            <tr>

                                <td class="celda-editable" contenteditable="true">
                                    PROVEEDORA INTEGRAL DEL CENTRO, S.A. DE C.V.
                                </td>

                                <td class="celda-editable" contenteditable="true">
                                    COTIZA UNA PARTIDA
                                </td>

                            </tr>

                            <tr>

                                <td class="celda-editable" contenteditable="true">
                                    LIMPIADORA PROFESIONAL DEL VALLE, S.P.R. DE R.L.
                                </td>

                                <td class="celda-editable" contenteditable="true">
                                    COTIZA UNA PARTIDA
                                </td>

                            </tr>

                        </tbody>

                    </table>

                    <div class="numero-pagina">
                        3 DE 4
                    </div>

                </div>

            </div>

            <!-- =====================================================
                 HOJA 4 - CIERRE Y FIRMAS
            ====================================================== -->

            <div class="hoja">

                <div class="contenido-hoja">

                    <div class="texto">

                        <strong>IX.</strong>
                        EN DESAHOGO DEL NOVENO PUNTO DEL ORDEN DEL DÍA. –
                        SE VERIFICÓ LA DOCUMENTACIÓN REQUERIDA
                        EN LAS PROPUESTAS ECONÓMICAS.

                    </div>

                    <div class="texto">

                        <strong>X.</strong>
                        EN DESAHOGO DEL DÉCIMO PUNTO DEL ORDEN DEL DÍA. –
                        SE ACEPTARON LAS PROPUESTAS ECONÓMICAS
                        PARA SU POSTERIOR EVALUACIÓN.

                    </div>

                    <div class="texto">

                        <strong>XI.</strong>
                        EL FALLO DE ADJUDICACIÓN DEL PRESENTE PROCEDIMIENTO
                        ADQUISITIVO SE DARÁ A CONOCER EL DÍA

                        <span class="campo campo-mediano" contenteditable="true">
                            10 DE JULIO DE 2025
                        </span>

                        A LAS

                        <span class="campo campo-corto" contenteditable="true">
                            10:00
                        </span>

                        HORAS.

                    </div>

                    <div class="texto">

                        <strong>XII.</strong>
                        NO HABIENDO OTRO ASUNTO QUE TRATAR,
                        SE DIO POR TERMINADO EL ACTO DE PRESENTACIÓN
                        Y APERTURA DE PROPUESTAS.

                    </div>

                    <div class="centrado"
                         style="margin-top:35px; font-weight:bold;">
                        POR EL MUNICIPIO
                    </div>

                    <div class="firma-contenedor">

                        <div class="firma">

                            <div class="linea-firma">
                                <span class="campo campo-mediano" contenteditable="true">C. PAULO SERGIO HERNÁNDEZ CUADRIELLO</span>
                            </div>

                            COORDINADOR DE ADQUISICIONES Y SERVICIOS

                        </div>

                        <div class="firma" style="float:right;">

                            <div class="linea-firma">
                                <span class="campo campo-mediano" contenteditable="true">C. ELIZABETH MEJÍA PACHECO</span>
                            </div>

                            CONTRALORA INTERNA MUNICIPAL

                        </div>

                    </div>

                    <div style="clear:both;"></div>

                    <div class="centrado"
                         style="margin-top:45px; font-weight:bold;">
                        POR LOS LICITANTES
                    </div>

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    EMPRESA
                                </th>

                                <th>
                                    REPRESENTANTE
                                </th>

                                <th>
                                    FIRMA
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td class="celda-editable" contenteditable="true">
                                    CONSTRUCTORA Y SERVICIOS ADMINISTRATIVOS, S.A. DE C.V.
                                </td>

                                <td class="celda-editable" contenteditable="true">
                                    ING. MARIANA GARZA LÓPEZ
                                </td>

                                <td class="celda-editable" contenteditable="true">\(firma\)</td>

                            </tr>

                            <tr>

                                <td class="celda-editable" contenteditable="true">
                                    PROVEEDORA INTEGRAL DEL CENTRO, S.A. DE C.V.
                                </td>

                                <td class="celda-editable" contenteditable="true">
                                    LIC. ROBERTO SÁNCHEZ MARTÍNEZ
                                </td>

                                <td class="celda-editable" contenteditable="true">\(firma\)</td>

                            </tr>

                            <tr>

                                <td class="celda-editable" contenteditable="true">
                                    LIMPIADORA PROFESIONAL DEL VALLE, S.P.R. DE R.L.
                                </td>

                                <td class="celda-editable" contenteditable="true">
                                    C.P. FERNANDO DELGADO ROJAS
                                </td>

                                <td class="celda-editable" contenteditable="true">\(firma\)</td>

                            </tr>

                        </tbody>

                    </table>

                    <div class="pie">

                        LA PRESENTE ACTA SE FIRMA EN ORIGINAL,
                        EXPIDIÉNDOSE COPIA SIMPLE A QUIENES LA SUSCRIBIERON.

                    </div>

                    <div class="numero-pagina">
                        4 DE 4
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

    document.getElementById('btnGuardar')
    .addEventListener('click', () => {

        const campos = document.querySelectorAll(
            '[contenteditable="true"]'
        );

        let datos = {};

        campos.forEach((campo,index) => {

            datos[`campo_${index}`] = campo.innerText.trim();

        });

        console.log(datos);

        alert('ACTA GUARDADA CORRECTAMENTE');

    });

</script>

</body>
</html>