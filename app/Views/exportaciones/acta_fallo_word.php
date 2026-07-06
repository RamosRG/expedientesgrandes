<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Acta de Fallo</title>
    <!--[if gte mso 9]>
    <xml>
        <w:WordDocument>
            <w:View>Print</w:View>
            <w:Zoom>100</w:Zoom>
            <w:DoNotOptimizeForBrowser/>
        </w:WordDocument>
    </xml>
    <![endif]-->
    <style>
        @page {
            size: 21cm 29.7cm;
            margin: 2.92cm 3cm 2.5cm 3cm;
        }

        body {
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 9.5pt;
            line-height: 1.6;
            color: #000000;
            background: white;
            margin: 0;
            padding: 0;
            text-transform: uppercase;
        }

        .hoja {
            width: 21cm;
            min-height: 29.7cm;
            padding: 2.92cm 3cm 2.5cm 3cm;
            margin: 0 auto;
            background: white;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 9.5pt;
            line-height: 1.6;
            text-align: justify;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
        }

        .encabezado {
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid #000000;
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
            font-weight: bold;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 18px;
            font-size: 8.5pt;
        }

        table th,
        table td {
            border: 1px solid #000000;
            padding: 6px 8px;
            vertical-align: top;
        }

        table th {
            text-align: center;
            font-weight: bold;
            background: #f5f0eb;
        }

        .orden-dia {
            margin-top: 15px;
            margin-bottom: 18px;
            padding-left: 15px;
        }

        .orden-dia div {
            margin-bottom: 4px;
        }

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
            text-align: right;
            margin-top: 30px;
            font-size: 8pt;
            font-weight: bold;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .hoja {
                border: none;
                box-shadow: none;
                margin: 0;
                padding: 2.92cm 3cm 2.5cm 3cm !important;
            }
        }
    </style>
</head>
<body>

<?php
// ==============================================
// FUNCIONES AUXILIARES (declaradas una sola vez)
// ==============================================
function convertirDosDigitosActaFallo($n) {
    $unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
    if ($n < 10) return $unidades[$n];
    if ($n < 20) {
        $especiales = ['DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISEIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'];
        return $especiales[$n - 10];
    }
    if ($n < 100) {
        $decena = floor($n / 10) * 10;
        $unidad = $n % 10;
        $decenas = ['', 'DIEZ', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA', 'SETENTA', 'OCHENTA', 'NOVENTA'];
        if ($unidad === 0) return $decenas[$decena/10];
        if ($decena === 20) return 'VEINTI' . strtolower($unidades[$unidad]);
        return $decenas[$decena/10] . ' Y ' . $unidades[$unidad];
    }
    return '';
}

function convertirTresDigitosActaFallo($n) {
    $centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
    if ($n < 100) return convertirDosDigitosActaFallo($n);
    if ($n < 1000) {
        $centena = floor($n / 100);
        $resto = $n % 100;
        if ($centena === 1 && $resto === 0) return 'CIEN';
        if ($resto === 0) return $centenas[$centena];
        return $centenas[$centena] . ' ' . strtolower(convertirDosDigitosActaFallo($resto));
    }
    return '';
}

function numeroALetrasActaFallo($numero) {
    $numero = floatval($numero);
    $entero = floor($numero);
    $decimal = round(($numero - $entero) * 100);
    
    if ($entero === 0) return 'CERO PESOS ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
    
    $millones = floor($entero / 1000000);
    $miles = floor(($entero % 1000000) / 1000);
    $unidadesEntero = $entero % 1000;
    
    $resultado = '';
    if ($millones > 0) {
        if ($millones === 1) $resultado .= 'UN MILLON';
        else $resultado .= convertirTresDigitosActaFallo($millones) . ' MILLONES';
        if ($miles > 0 || $unidadesEntero > 0) $resultado .= ' ';
    }
    if ($miles > 0) {
        if ($miles === 1) $resultado .= 'MIL';
        else $resultado .= convertirTresDigitosActaFallo($miles) . ' MIL';
        if ($unidadesEntero > 0) $resultado .= ' ';
    }
    if ($unidadesEntero > 0) {
        if ($unidadesEntero === 1 && $miles === 0 && $millones === 0) $resultado .= 'UN PESO';
        else $resultado .= convertirTresDigitosActaFallo($unidadesEntero) . ' PESOS';
    } else if ($millones === 0 && $miles === 0) {
        $resultado = 'CERO PESOS';
    } else if ($unidadesEntero === 0) {
        $resultado .= 'PESOS';
    }
    
    $resultado .= ' ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
    return $resultado;
}
?>

<!-- =========================================================
     HOJA 1
========================================================= -->
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
            IRNP-<span class="campo campo-chico"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>
            <br>
            PARA LA “
            <span class="campo campo-largo"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>
            ”
        </div>

        <div class="texto">
            EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO SIENDO LAS
            <span class="campo campo-corto">
                <?php 
                if (isset($data[0]['created_at'])) {
                    $fecha = new DateTime($data[0]['created_at']);
                    echo $fecha->format('H:i');
                }
                ?>
            </span>
            HORAS DEL DÍA
            <span class="campo campo-chico">
                <?php 
                if (isset($data[0]['created_at'])) {
                    $fecha = new DateTime($data[0]['created_at']);
                    echo $fecha->format('d/m/Y');
                }
                ?>
            </span>,
            EN EL ÁREA DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL,
            SITO EN EX SEMINARIO AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400,
            SE REUNIÓ EL
            <span class="campo campo-mediano"><?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?></span>,
            COORDINADOR DE <span class="campo campo-mediano"><?= isset($data[0]['area']) ? esc($data[0]['area']) : '' ?></span> Y SERVIDOR PÚBLICO DESIGNADO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL;
            Y EL
            <span class="campo campo-largo"><?= isset($data[0]['representante_legal']) ? esc($data[0]['representante_legal']) : '' ?></span>
            APODERADO LEGAL DE
            <span class="campo campo-largo"><?= isset($data[0]['empresa']) ? esc($data[0]['empresa']) : '' ?></span>;
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
            SIENDO LAS <span class="campo campo-corto">
                <?php 
                if (isset($data[0]['created_at'])) {
                    $fecha = new DateTime($data[0]['created_at']);
                    echo $fecha->format('H:i');
                }
                ?>
            </span> HORAS,
            EL
            <span class="campo campo-mediano"><?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?></span>,
            SERVIDOR PÚBLICO DESIGNADO, DECLARÓ INICIADO EL ACTO DE FALLO DE ADJUDICACIÓN.
        </div>

        <div class="texto">
            <strong>II.</strong>
            EN DESAHOGO DEL SEGUNDO PUNTO DEL ORDEN DEL DÍA. –
            EL SERVIDOR PÚBLICO DESIGNADO MANIFESTÓ QUE SE TUVO POR PRESENTE AL
            <span class="campo campo-largo"><?= isset($data[0]['representante_legal']) ? esc($data[0]['representante_legal']) : '' ?></span>
            APODERADO LEGAL DE
            <span class="campo campo-largo"><?= isset($data[0]['empresa']) ? esc($data[0]['empresa']) : '' ?></span>,
            QUIEN SE IDENTIFICÓ CON CREDENCIAL PARA VOTAR CON NÚMERO DE FOLIO
            <span class="campo campo-mediano"><?= isset($data[0]['num_credencial_representante']) ? esc($data[0]['num_credencial_representante']) : '' ?></span>,
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

        <div class="numero-pagina">1 DE 3</div>
    </div>
</div>

<!-- =========================================================
     HOJA 2
========================================================= -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto">
            <strong>IV.</strong>
            EN DESAHOGO DEL CUARTO PUNTO DEL ORDEN DEL DÍA. –
            EL SERVIDOR PÚBLICO DESIGNADO, INFORMÓ QUE, CON BASE EN EL DICTAMEN DE ADJUDICACIÓN
            EMITIDO POR EL COMITÉ DE ADQUISICIONES Y SERVICIOS, SE ADJUDICA EL
            CONTRATO NÚMERO: MTM/CAYS/PF/IRNP-
            <span class="campo campo-mediano"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>
            PARA LA
            “<span class="campo campo-largo"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>”
            AL PROVEEDOR:
        </div>

        <div class="centrado" style="font-weight:bold; margin:10px 0;">
            <span class="campo campo-largo"><?= isset($data[0]['empresa']) ? esc($data[0]['empresa']) : '' ?></span>
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
                <?php 
                $contador = 1;
                $subtotal = 0;
                if (!empty($data)):
                    foreach ($data as $item):
                        if (!isset($item['descripcion']) || empty($item['descripcion'])) continue;
                        $precio_unitario = isset($item['precio_unitario']) ? floatval($item['precio_unitario']) : 0;
                        $cantidad = isset($item['cantidad']) ? floatval($item['cantidad']) : 0;
                        $importe = $precio_unitario * $cantidad;
                        $subtotal += $importe;
                ?>
                <tr>
                    <td class="centrado"><?= $contador++ ?></td>
                    <td><?= isset($item['descripcion']) ? esc($item['descripcion']) : '' ?></td>
                    <td><?= isset($item['unidad_medida']) ? esc($item['unidad_medida']) : 'PIEZA' ?></td>
                    <td class="centrado"><?= isset($item['cantidad']) ? esc($item['cantidad']) : '' ?></td>
                    <td><?= isset($item['marca_modelo']) ? esc($item['marca_modelo']) : '' ?></td>
                    <td class="centrado">$<?= number_format($precio_unitario, 2) ?></td>
                    <td class="centrado">$<?= number_format($importe, 2) ?></td>
                </tr>
                <?php 
                    endforeach;
                endif; 
                $iva = $subtotal * 0.16;
                $total = $subtotal + $iva;
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align:left;font-weight:bold;padding:10px;border-top:2px solid #000;">
                        <?php 
                        $totalTexto = '$' . number_format($total, 2) . ' (' . numeroALetrasActaFallo($total) . ')';
                        echo $totalTexto;
                        ?>
                    </td>
                    <td style="text-align:right;font-weight:bold;border-top:2px solid #000;">SUBTOTAL</td>
                    <td style="text-align:right;font-weight:bold;border-top:2px solid #000;">$<?= number_format($subtotal, 2) ?></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td style="text-align:right;font-weight:bold;">I.V.A.</td>
                    <td style="text-align:right;font-weight:bold;">$<?= number_format($iva, 2) ?></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td style="text-align:right;font-weight:bold;">TOTAL</td>
                    <td style="text-align:right;font-weight:bold;">$<?= number_format($total, 2) ?></td>
                </tr>
            </tfoot>
        </table>

        <div class="texto" style="margin-top:10px;">
            MONTO A PAGAR CON RECURSOS DE PARTICIPACIONES FEDERALES DE 2026 ES DE:
        </div>

        <div class="centrado" style="font-weight:bold; font-size:11pt; margin:10px 0;">
            <span class="campo campo-largo">$<?= number_format($total, 2) ?> (<?= numeroALetrasActaFallo($total) ?>)</span>
        </div>

        <div class="numero-pagina">2 DE 3</div>
    </div>
</div>

<!-- =========================================================
     HOJA 3
========================================================= -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto">
            <strong>V.</strong>
            EN DESAHOGO DEL QUINTO PUNTO DEL ORDEN DEL DÍA. –
            SE DAN LAS SIGUIENTES RECOMENDACIONES GENERALES AL
            <span class="campo campo-largo"><?= isset($data[0]['representante_legal']) ? esc($data[0]['representante_legal']) : '' ?></span>
            APODERADO LEGAL DE
            <span class="campo campo-largo"><?= isset($data[0]['empresa']) ? esc($data[0]['empresa']) : '' ?></span>,
            MISMAS QUE FORMARÁN PARTE INTEGRAL DE LA CONTRATACIÓN POR LA ADQUISICIÓN ADJUDICADA:
        </div>

        <div class="texto" style="font-weight:bold; margin-top:20px; text-align:center;">
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
            A MÁS TARDAR 10 DÍAS HÁBILES POSTERIORES A LA EMISIÓN DE CADA ORDEN DE COMPRA Y DENTRO DE LOS HORARIOS ESTABLECIDOS POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.
        </div>

        <div class="texto" style="font-weight:bold; margin-top:20px; text-align:center;">
            CONDICIONES ECONÓMICAS PARA LA ADQUISICIÓN DE LOS BIENES
        </div>

        <div class="texto" style="margin-left:20px; margin-bottom:10px;">
            CADA REQUERIMIENTO DE EQUIPO SERÁ SOLICITADO POR <strong>"EL MUNICIPIO"</strong>
            MEDIANTE LA EMISIÓN DE LA ORDEN DE COMPRA CORRESPONDIENTE. UNA VEZ
            REALIZADA LA ENTREGA DEL EQUIPO SOLICITADO, <strong>"EL PROVEEDOR"</strong> ENTREGARÁ
            SU FACTURA A MÁS TARDAR A LOS DIEZ DÍAS HÁBILES POSTERIORES A LA ENTREGA DE LOS EQUIPOS SOLICITADOS CON SU RESPECTIVO XML PARA TRÁMITE DE PAGO EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN LAS INSTALACIONES DEL EX SEMINARIO UBICADAS EN AV. DE LA PAZ ESQUINA MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.
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

        <div class="texto" style="font-weight:bold; margin-top:20px; text-align:center;">
            GENERALIDADES
        </div>

        <div class="texto">
            LAS PROPUESTAS ADJUDICADAS GARANTIZAN LAS MEJORES CONDICIONES EN CUANTO
            A PRECIO, CALIDAD Y FINANCIAMIENTO, <span class="campo campo-largo"><?= isset($data[0]['empresa']) ? esc($data[0]['empresa']) : '' ?></span>,
            ES EL QUE CUMPLIÓ CON TODOS LOS REQUISITOS SOLICITADOS EN LA INVITACIÓN
            RESTRINGIDA NACIONAL PRESENCIAL.
        </div>

        <div class="texto" style="margin-top:15px;">
            CON FUNDAMENTO EN LO PREVISTO POR EL ARTÍCULO 65 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, SE HACE DEL CONOCIMIENTO QUE EL
            <span class="campo campo-largo"><?= isset($data[0]['representante_legal']) ? esc($data[0]['representante_legal']) : '' ?></span>
            APODERADO LEGAL DE
            <span class="campo campo-largo"><?= isset($data[0]['empresa']) ? esc($data[0]['empresa']) : '' ?></span>,
            A QUIEN LE HA SIDO ADJUDICADO EL CONTRATO DE ADQUISICIÓN DE BIENES, DEBERÁ PRESENTARSE
            PARA LA FIRMA DEL CONTRATO CORRESPONDIENTE EN LAS OFICINAS QUE OCUPA LA
            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN EL EX
            SEMINARIO, AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO,
            TEMASCALCINGO, MÉXICO, C.P. 50400, EL
            <span class="campo campo-mediano">
                <?php 
                if (isset($data[0]['created_at'])) {
                    $fecha = new DateTime($data[0]['created_at']);
                    $fecha->modify('+5 days');
                    $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
                    echo $fecha->format('d') . ' DE ' . $meses[$fecha->format('n')-1] . ' DE ' . $fecha->format('Y');
                }
                ?>
            </span>
        </div>

        <div class="texto" style="font-weight:bold; margin-top:20px; text-align:center;">
            CLAUSURA DEL ACTO
        </div>

        <div class="texto">
            NO HABIENDO NINGÚN OTRO ASUNTO A CALIFICAR, SE PROCEDE A FIRMAR LA
            PRESENTE ACTA, SIENDO LAS
            <span class="campo campo-mediano">
                <?php 
                if (isset($data[0]['created_at'])) {
                    $fecha = new DateTime($data[0]['created_at']);
                    $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
                    echo $fecha->format('H:i') . ' HORAS DEL DÍA ' . $fecha->format('d') . ' DE ' . $meses[$fecha->format('n')-1] . ' DE ' . $fecha->format('Y');
                }
                ?>
            </span>
        </div>

        <!-- FIRMAS -->
        <div class="centrado" style="margin-top:30px; font-weight:bold;">
            POR "EL MUNICIPIO"
        </div>

        <div class="firma-contenedor">
            <div class="firma" style="width:100%;">
                <div class="linea-firma" style="text-align:center;">
                    <span style="display:inline-block; border-bottom:1px solid #000; padding-bottom:3px; min-width:250px; font-size:14px; font-weight:bold;">
                        <?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?>
                    </span>
                </div>
                <div style="text-align:center;">
                    COORDINADOR DE <span class="campo campo-largo"><?= isset($data[0]['area']) ? esc($data[0]['area']) : '' ?></span>
                </div>
            </div>
        </div>

        <div style="clear:both;"></div>

        <div class="centrado" style="margin-top:35px; font-weight:bold; text-align:center;">
            POR "EL LICITANTE"
        </div>

        <div class="firma-contenedor" style="margin-top:20px;">
            <div class="firma" style="width:100%;">
                <div class="linea-firma" style="text-align:center;">
                    <span class="campo campo-largo"><?= isset($data[0]['representante_legal']) ? esc($data[0]['representante_legal']) : '' ?></span>
                </div>
                <div style="text-align:center;">
                    APODERADO LEGAL DE
                    <br>
                    <span class="campo campo-largo"><?= isset($data[0]['empresa']) ? esc($data[0]['empresa']) : '' ?></span>
                </div>
            </div>
        </div>

        <div style="clear:both;"></div>

        <div class="pie" style="margin-top:30px;">
            LA PRESENTE ACTA SE FIRMA EN ORIGINAL,
            EXPIDIÉNDOSE COPIA SIMPLE A QUIENES LA SUSCRIBIERON.
        </div>

        <div class="numero-pagina">3 DE 3</div>
    </div>
</div>

</body>
</html>