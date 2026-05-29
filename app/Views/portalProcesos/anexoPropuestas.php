
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANEXO APERTURA DE PROPUESTAS - Tabla de Verificación Documental</title>

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

        /* Header superior */
        .header-superior {
            background: linear-gradient(135deg, #5e1b34, #8b2c4a);
            border-radius: 22px;
            padding: 28px 35px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,.08);
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
            box-shadow: 0 2px 5px rgba(0,0,0,.06);
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

        /* Contenedor y hojas */
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
            box-shadow: 0 0 15px rgba(0,0,0,.08);
            margin-bottom: 35px;
            padding: 20mm 15mm 18mm 15mm;
            position: relative;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 8.5pt;
            line-height: 1.5;
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
            font-size: 12pt;
            margin-bottom: 8px;
        }

        .subtitulo {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            line-height: 1.4;
        }

        /* Campos editables subrayados */
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

        /* TABLA PRINCIPAL - MISMO DISEÑO DEL WORD (FILAS 1-20, COLUMNAS EMPRESAS) */
        .tabla-verificacion {
            width: 100%;
            border-collapse: collapse;
            margin: 18px 0;
            font-size: 8pt;
            page-break-inside: avoid;
        }

        .tabla-verificacion th, 
        .tabla-verificacion td {
            border: 1px solid #000000;
            padding: 6px 4px;
            vertical-align: top;
        }

        .tabla-verificacion th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
            font-size: 8pt;
        }

        /* Celdas editables para marcar PRESENTO / NO PRESENTO o textos */
        .celda-editable {
            background: #fffceb;
            outline: none;
            min-width: 70px;
        }

        .celda-editable:focus {
            background: #fff3bf;
        }

        /* Columna N.P. (número) */
        .col-numero {
            text-align: center;
            font-weight: bold;
            background-color: #fafaf0;
        }

        .texto-documento {
            font-weight: 500;
        }

        .numero-pagina {
            position: absolute;
            bottom: 12mm;
            right: 15mm;
            font-size: 8pt;
            font-weight: bold;
        }

        /* Pie de firmas (opcional, al final) */
        .firma-contenedor {
            margin-top: 30px;
            width: 100%;
        }

        .firma {
            width: 45%;
            display: inline-block;
            text-align: center;
        }

        .linea-firma {
            border-top: 1px solid #000;
            margin-top: 45px;
            padding-top: 8px;
            font-weight: bold;
        }

        .pie-documento {
            margin-top: 20px;
            text-align: center;
            font-size: 7pt;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .header-superior, .barra-acciones {
                display: none;
            }
            .hoja {
                border: none;
                box-shadow: none;
                margin: 0;
                page-break-after: always;
            }
            .celda-editable {
                background: white;
            }
        }
    </style>
</head>
<body>

<div class="contenedor-principal">
    <div class="header-superior">
        <h1><i class="fas fa-file-alt"></i> ANEXO APERTURA DE PROPUESTAS</h1>
        <p>Revisión cuantitativa de la documentación técnica (formato oficial)</p>
    </div>

    <div class="barra-acciones">
        <div class="breadcrumb">
            <a href="#">Inicio</a> / <a href="#">Procesos</a> / Anexo apertura
        </div>
        <div class="grupo-botones">
            <button class="btn btn-volver" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Regresar</button>
            <button class="btn btn-guardar" id="btnGuardar"><i class="fas fa-save"></i> Guardar Acta</button>
        </div>
    </div>

    <div class="contenedor-documento">
        <div class="grupo-hojas">
            <!-- ==================== HOJA ÚNICA (OCUPA LAS 2 PRIMERAS PÁGINAS EN WORD) ==================== -->
            <div class="hoja">
                <div class="contenido-hoja">
                    <div class="encabezado">
                        “2025. BICENTENARIO DE LA VIDA MUNICIPAL EN EL ESTADO DE MÉXICO”
                    </div>
                    <div class="titulo">
                        ACTA DE PRESENTACIÓN Y APERTURA DE PROPUESTAS
                    </div>
                    <div class="subtitulo">
                        LICITACIÓN PÚBLICA NACIONAL PRESENCIAL NÚMERO: 
                        <span class="campo campo-mediano" contenteditable="true">IRNP-002-2025</span><br>
                        CONTRATACIÓN: 
                        <span class="campo campo-largo" contenteditable="true">PRESTACIÓN DE SERVICIOS DE LIMPIEZA Y MANTENIMIENTO</span>
                    </div>
                    <div class="texto" style="margin-bottom: 12px;">
                        <strong>FECHA Y LUGAR:</strong> 
                        <span class="campo campo-mediano" contenteditable="true">TEMASCALCINGO, MÉXICO, 09 DE JULIO DE 2025</span> 
                        <strong>HORA:</strong> 
                        <span class="campo campo-corto" contenteditable="true">10:00</span> HORAS.
                    </div>

                    <!-- TABLA PRINCIPAL: exactamente igual a la estructura del anexo Word: N.P. | DOCUMENTACIÓN | EMPRESA 1 | EMPRESA 2 | EMPRESA 3 -->
                    <table class="tabla-verificacion">
                        <thead>
                            <tr>
                                <th style="width:8%">N.P.</th>
                                <th style="width:42%">DOCUMENTACIÓN DE LA OFERTA TÉCNICA SOLICITADA</th>
                                <th style="width:17%"><span class="campo campo-mediano" contenteditable="true">EMPRESA 1: CONSTRUCTORA JDM</span><br><span style="font-size:7pt">PRESENTÓ / NO PRESENTÓ</span></th>
                                <th style="width:17%"><span class="campo campo-mediano" contenteditable="true">EMPRESA 2: SERVICIOS MAZ</span><br><span style="font-size:7pt">PRESENTÓ / NO PRESENTÓ</span></th>
                                <th style="width:17%"><span class="campo campo-mediano" contenteditable="true">EMPRESA 3: LIMPIANZA EFICIENTE</span><br><span style="font-size:7pt">PRESENTÓ / NO PRESENTÓ</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- FILA 1 -->
                            <tr><td class="col-numero">1</td>
                                <td class="texto-documento">PRESENTAR ESCRITO ELABORADO EN PAPEL MEMBRETADO DEL OFERENTE, INDIQUE EL NÚMERO TOTAL DE FOLIOS DE LOS QUE CONSTA SU PROPUESTA, DICHA CARTA NO DEBERÁ ESTAR FOLIADA. PROPUESTA FIRMADA AUTÓGRAFAMENTE, IMPRESA Y FOLIADA POR UNA SOLA CARA.</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ (85 folios)</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ (92 folios)</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 2 -->
                            <tr><td class="col-numero">2</td>
                                <td class="texto-documento">PRESENTAR PROPUESTA TÉCNICA DE LAS PARTIDAS, REQUISITANDO TODOS LOS DATOS DEL PUNTO "PROPUESTA TÉCNICA", CUMPLIENDO ANEXO 1.</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 3 -->
                            <tr><td class="col-numero">3</td>
                                <td class="texto-documento">COPIA SIMPLE, COMPLETA Y LEGIBLE DE IDENTIFICACIÓN VIGENTE (PASAPORTE, INE, LICENCIA) DEL PROPIETARIO O REPRESENTANTE LEGAL; EN SU CASO, DE LA PERSONA QUE REPRESENTARÁ EN EL ACTO (ANEXO 3).</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ INE</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ PASAPORTE</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 4 -->
                            <tr><td class="col-numero">4</td>
                                <td class="texto-documento">CÉDULA DE IDENTIFICACIÓN FISCAL, CONSTANCIA DE SITUACIÓN FISCAL; ESCRITO BAJO PROTESTA DE ESTAR AL CORRIENTE EN IMPUESTOS Y OPINIÓN POSITIVA DEL SAT.</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ (RFC, opinión positiva)</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ (RFC, opinión positiva)</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 5 -->
                            <tr><td class="col-numero">5</td>
                                <td class="texto-documento">COPIA CERTIFICADA Y SIMPLE DE ESTADOS FINANCIEROS BÁSICOS AL MES DE DICIEMBRE 2024 (CONFORME NIF), FIRMADOS POR CONTADOR PÚBLICO, ANEXANDO CÉDULA PROFESIONAL.</td>
                                <td class="celda-editable" contenteditable="true">CERTIFICADA + CÉDULA CP</td>
                                <td class="celda-editable" contenteditable="true">COPIA SIMPLE</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 6 -->
                            <tr><td class="col-numero">6</td>
                                <td class="texto-documento">DECLARACIÓN ANUAL EJERCICIO 2024; PAGOS PROVISIONALES MES DE JUNIO 2025 COMPLETOS CON ANEXOS Y COMPROBANTE SAT.</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 7 -->
                            <tr><td class="col-numero">7</td>
                                <td class="texto-documento">PERSONAS JURÍDICAS COLECTIVAS: ACTA CONSTITUTIVA Y MODIFICACIONES + INSCRIPCIÓN RPC; PERSONAS FÍSICAS: ACTA DE NACIMIENTO Y CURP.</td>
                                <td class="celda-editable" contenteditable="true">ACTA CONSTITUTIVA RPC</td>
                                <td class="celda-editable" contenteditable="true">ACTA CONSTITUTIVA RPC</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 8 -->
                            <tr><td class="col-numero">8</td>
                                <td class="texto-documento">PODER NOTARIAL DEL REPRESENTANTE (PODER GENERAL ADMINISTRACIÓN Y/O ESPECIAL PARA CONCURSOS). VIGENCIA CONFORME ART. 7.768 CÓDIGO CIVIL EDOMEX.</td>
                                <td class="celda-editable" contenteditable="true">PODER ESPECIAL VIGENTE</td>
                                <td class="celda-editable" contenteditable="true">PODER GENERAL</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 9 -->
                            <tr><td class="col-numero">9</td>
                                <td class="texto-documento">CERTIFICADO DE EMPRESA MEXIQUENSE VIGENTE (No invalidante, otorga 5% adicional en adjudicación).</td>
                                <td class="celda-editable" contenteditable="true">SÍ, CERT. VIGENTE</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 10 -->
                            <tr><td class="col-numero">10</td>
                                <td class="texto-documento">ESCRITO BAJO PROTESTA DE NO ENCONTRARSE EN SUPUESTOS DEL ARTÍCULO 74 DE LA LEY DE RESPONSABILIDADES ADMINISTRATIVAS DEL ESTADO DE MÉXICO Y MUNICIPIOS.</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 11 -->
                            <tr><td class="col-numero">11</td>
                                <td class="texto-documento">ESCRITO BAJO PROTESTA DE CAPACIDAD TÉCNICA, LABORAL Y FINANCIERA PARA PRESTAR EL SERVICIO Y CELEBRAR CONTRATOS.</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 12 -->
                            <tr><td class="col-numero">12</td>
                                <td class="texto-documento">ESCRITO BAJO PROTESTA DE NO SUBCONTRATAR TOTAL O PARCIALMENTE, NI CEDER DERECHOS U OBLIGACIONES.</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 13 -->
                            <tr><td class="col-numero">13</td>
                                <td class="texto-documento">ESCRITO BAJO PROTESTA DE ACEPTACIÓN PLENA DE REQUISITOS Y LINEAMIENTOS DE LA SOLICITUD DE PARTICIPACIÓN.</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 14 -->
                            <tr><td class="col-numero">14</td>
                                <td class="texto-documento">CURRÍCULUM ELABORADO EN PAPEL MEMBRETADO Y SUSCRITO POR REPRESENTANTE LEGAL.</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 15 -->
                            <tr><td class="col-numero">15</td>
                                <td class="texto-documento">DOMICILIO Y CORREO ELECTRÓNICO (COMPROBANTE ANTIGÜEDAD ≤3 MESES). ESCRITO CON DOMICILIO PARA NOTIFICACIONES.</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ + CORREO</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 16 -->
                            <tr><td class="col-numero">16</td>
                                <td class="texto-documento">ESCRITO DE NO CONFLICTO DE INTERÉS (ARTÍCULO 50 FRACCIÓN VII LEY DE RESPONSABILIDADES ADMINISTRATIVAS).</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 17 -->
                            <tr><td class="col-numero">17</td>
                                <td class="texto-documento">ESCRITO BAJO PROTESTA DE ABSTENERSE DE CONDUCTAS PARA INDUCIR A SERVIDORES PÚBLICOS A ALTERAR EVALUACIONES.</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 18 -->
                            <tr><td class="col-numero">18</td>
                                <td class="texto-documento">CARTA MEMBRETADA O ESTADO DE CUENTA BANCARIO (ANTIGÜEDAD ≤3 MESES) CON: NÚMERO DE CUENTA, CLABE, TITULAR, BANCO, SUCURSAL.</td>
                                <td class="celda-editable" contenteditable="true">CUENTA: 0123456789, CLABE: 014...</td>
                                <td class="celda-editable" contenteditable="true">PRESENTÓ ESTADO CUENTA</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 19 -->
                            <tr><td class="col-numero">19</td>
                                <td class="texto-documento">AFIANZADORAS AUTORIZADAS DE ACUERDO AL "ANEXO 2" (GARANTÍA DE SERIEDAD DE LA OFERTA).</td>
                                <td class="celda-editable" contenteditable="true">FIANZA No. F-98765</td>
                                <td class="celda-editable" contenteditable="true">PÓLIZA 456-AFG</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                            <!-- FILA 20 -->
                            <tr><td class="col-numero">20</td>
                                <td class="texto-documento">DATOS DEL LICITANTE Y REPRESENTANTE (ANEXO 3): RAZÓN SOCIAL Y MANIFESTACIÓN BAJO PROTESTA DE FACULTADES SUFICIENTES.</td>
                                <td class="celda-editable" contenteditable="true">CONSTRUCTORA JDM, S.A. DE C.V.</td>
                                <td class="celda-editable" contenteditable="true">SERVICIOS MAZ, S. DE R.L.</td>
                                <td class="celda-editable" contenteditable="true">NO PRESENTÓ</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="texto" style="margin-top: 10px;">
                        <strong>OBSERVACIONES GENERALES:</strong> 
                        <span class="campo campo-largo" contenteditable="true">La Empresa 3 fue desechada por no presentar documentación esencial (identificación, propuesta técnica y poderes). Las Empresas 1 y 2 cumplen cuantitativamente, continúan a evaluación cualitativa.</span>
                    </div>

                    <!-- FIRMAS al final de la hoja (similar a la plantilla original) -->
                    <div class="firma-contenedor">
                        <div class="firma">
                            <div class="linea-firma">
                                <span class="campo campo-mediano" contenteditable="true">C. PAULO SERGIO HERNÁNDEZ</span>
                            </div>
                            COORDINADOR DE ADQUISICIONES
                        </div>
                        <div class="firma" style="float:right;">
                            <div class="linea-firma">
                                <span class="campo campo-mediano" contenteditable="true">C. ELIZABETH MEJÍA PACHECO</span>
                            </div>
                            CONTRALORA INTERNA MUNICIPAL
                        </div>
                    </div>
                    <div style="clear:both;"></div>

                    <div class="pie-documento">
                        La presente acta de apertura se firma por los servidores públicos y se anexa a los expedientes de la licitación.
                    </div>
                    <div class="numero-pagina">1 DE 1 (ANEXO)</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('btnGuardar').addEventListener('click', function() {
        const todosEditables = document.querySelectorAll('[contenteditable="true"]');
        let data = {};
        todosEditables.forEach((el, idx) => {
            let key = el.getAttribute('data-label') || `campo_${idx}`;
            data[key] = el.innerText.trim();
        });
        console.log('Acta guardada:', data);
        alert('Acta de presentación y apertura guardada. Se han registrado los valores de la tabla y campos editables.');
    });
</script>
</body>
</html>
