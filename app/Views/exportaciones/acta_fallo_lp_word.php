<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Acta de Fallo - Licitación Pública</title>
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
            font-size: 9pt;
            line-height: 1.45;
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
            font-size: 9pt;
            line-height: 1.45;
            text-align: justify;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
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

        .dictamen-texto {
            font-size: 9pt;
            text-align: justify;
            margin-bottom: 8px;
        }

        .licitante-box {
            border: 1px solid black;
            padding: 8px 15px;
            margin: 8px 0;
            text-align: left;
            font-weight: bold;
            font-size: 10pt;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 9px 0;
            font-size: 7pt;
        }

        table th,
        table td {
            border: 1px solid #000000;
            padding: 4px 3px;
            vertical-align: middle;
            text-align: center;
        }

        table th {
            background: #f0f0f0;
            font-weight: bold;
        }

        .recomendacion-item {
            margin-left: 15px;
            margin-bottom: 3px;
            font-size: 9pt;
        }

        .numero-pagina {
            text-align: right;
            font-size: 8pt;
            margin-top: 25px;
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
// FUNCIONES AUXILIARES (con verificación de existencia)
// ==============================================

if (!function_exists('formatearFechaEspanolFalloLP')) {
    function formatearFechaEspanolFalloLP($fechaString) {
        if (empty($fechaString)) return '';

        $fecha = new DateTime($fechaString);
        $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];

        return $fecha->format('d') . ' DE ' . $meses[$fecha->format('n')-1] . ' DE ' . $fecha->format('Y');
    }
}

if (!function_exists('formatearHoraFalloLP')) {
    function formatearHoraFalloLP($fechaString) {
        if (empty($fechaString)) return '00:00';

        $fecha = new DateTime($fechaString);
        return $fecha->format('H:i');
    }
}

if (!function_exists('numeroALetrasFalloLP')) {
    function numeroALetrasFalloLP($numero) {
        $numero = floatval($numero);
        $entero = floor($numero);
        $decimal = round(($numero - $entero) * 100);

        $unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
        $especiales = ['DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISEIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'];
        $decenas = ['', 'DIEZ', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA', 'SETENTA', 'OCHENTA', 'NOVENTA'];
        $centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];

        if (!function_exists('convertirCentenasFalloLP')) {
            function convertirCentenasFalloLP($num) {
                $centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
                if ($num === 0) return '';
                if ($num === 100) return 'CIEN';

                $c = floor($num / 100);
                $resto = $num % 100;
                $resultado = '';

                if ($c > 0) $resultado .= $centenas[$c];
                if ($resto > 0) {
                    if ($c > 0) $resultado .= ' ';
                    $resultado .= convertirDecenasFalloLP($resto);
                }
                return $resultado;
            }
        }

        if (!function_exists('convertirDecenasFalloLP')) {
            function convertirDecenasFalloLP($num) {
                $unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
                $especiales = ['DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISEIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'];
                $decenas = ['', 'DIEZ', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA', 'SETENTA', 'OCHENTA', 'NOVENTA'];

                if ($num < 10) return $unidades[$num];
                if ($num < 20) return $especiales[$num - 10];
                if ($num < 30) {
                    if ($num === 20) return 'VEINTE';
                    return 'VEINTI' . $unidades[$num - 20];
                }

                $d = floor($num / 10);
                $u = $num % 10;
                $resultado = $decenas[$d];
                if ($u > 0) $resultado .= ' Y ' . $unidades[$u];
                return $resultado;
            }
        }

        if (!function_exists('convertirMilesFalloLP')) {
            function convertirMilesFalloLP($num) {
                $miles = floor($num / 1000);
                $resto = $num % 1000;
                $resultado = '';

                if ($miles > 0) {
                    if ($miles === 1) {
                        $resultado = 'MIL';
                    } else {
                        $resultado = convertirCentenasFalloLP($miles) . ' MIL';
                    }
                }
                if ($resto > 0) {
                    if ($miles > 0) $resultado .= ' ';
                    if ($resto < 100) {
                        $resultado .= 'Y ' . convertirDecenasFalloLP($resto);
                    } else {
                        $resultado .= convertirCentenasFalloLP($resto);
                    }
                }
                return $resultado;
            }
        }

        if (!function_exists('convertirNumeroFalloLP')) {
            function convertirNumeroFalloLP($num) {
                if ($num === 0) return 'CERO';
                if ($num < 0) return 'MENOS ' . convertirNumeroFalloLP(abs($num));

                $millones = floor($num / 1000000);
                $resto = $num % 1000000;
                $resultado = '';

                if ($millones > 0) {
                    if ($millones === 1) {
                        $resultado = 'UN MILLÓN';
                    } else {
                        $resultado = convertirCentenasFalloLP($millones) . ' MILLONES';
                    }
                }
                if ($resto > 0) {
                    if ($millones > 0) $resultado .= ' ';
                    if ($resto < 1000) {
                        if ($resto < 100) {
                            $resultado .= 'Y ' . convertirDecenasFalloLP($resto);
                        } else {
                            $resultado .= convertirCentenasFalloLP($resto);
                        }
                    } else {
                        $resultado .= convertirMilesFalloLP($resto);
                    }
                }
                return $resultado;
            }
        }

        if ($entero === 0) {
            $texto = 'CERO';
        } else {
            $texto = convertirNumeroFalloLP($entero);
        }

        $centavosStr = str_pad($decimal, 2, '0', STR_PAD_LEFT);
        return $texto . ' PESOS ' . $centavosStr . '/100 M.N.';
    }
}

if (!function_exists('formatearNumeroFalloLP')) {
    function formatearNumeroFalloLP($numero) {
        return number_format($numero, 2, '.', ',');
    }
}

// ==============================================
// OBTENER DATOS (Trabajando con objetos)
// ==============================================

$primerRegistro = isset($data[0]) ? $data[0] : null;
$productos = $data;

// Datos del estudio
if ($primerRegistro) {
    if (is_object($primerRegistro)) {
        $noLicitacion = isset($primerRegistro->no_licitacion) ? $primerRegistro->no_licitacion : '';
        $nombreEstudio = isset($primerRegistro->nombre_estudio) ? $primerRegistro->nombre_estudio : '';
        $coordinador = isset($primerRegistro->coordinador) ? $primerRegistro->coordinador : '';
        $area = isset($primerRegistro->area) ? $primerRegistro->area : '';
        $nombreProveedor = isset($primerRegistro->proveedor) ? $primerRegistro->proveedor : '';
        $tipoPersona = isset($primerRegistro->tipo_persona) ? $primerRegistro->tipo_persona : '';
        $numCredencial = isset($primerRegistro->num_credencial_votar) ? $primerRegistro->num_credencial_votar : '';
        $total = isset($primerRegistro->total) ? floatval($primerRegistro->total) : 0;
        $subtotal = isset($primerRegistro->subtotal) ? floatval($primerRegistro->subtotal) : 0;
        $iva = isset($primerRegistro->iva) ? floatval($primerRegistro->iva) : 0;
        $createdAt = isset($primerRegistro->created_at) ? $primerRegistro->created_at : '';
    } else {
        $noLicitacion = isset($primerRegistro['no_licitacion']) ? $primerRegistro['no_licitacion'] : '';
        $nombreEstudio = isset($primerRegistro['nombre_estudio']) ? $primerRegistro['nombre_estudio'] : '';
        $coordinador = isset($primerRegistro['coordinador']) ? $primerRegistro['coordinador'] : '';
        $area = isset($primerRegistro['area']) ? $primerRegistro['area'] : '';
        $nombreProveedor = isset($primerRegistro['proveedor']) ? $primerRegistro['proveedor'] : '';
        $tipoPersona = isset($primerRegistro['tipo_persona']) ? $primerRegistro['tipo_persona'] : '';
        $numCredencial = isset($primerRegistro['num_credencial_votar']) ? $primerRegistro['num_credencial_votar'] : '';
        $total = isset($primerRegistro['total']) ? floatval($primerRegistro['total']) : 0;
        $subtotal = isset($primerRegistro['subtotal']) ? floatval($primerRegistro['subtotal']) : 0;
        $iva = isset($primerRegistro['iva']) ? floatval($primerRegistro['iva']) : 0;
        $createdAt = isset($primerRegistro['created_at']) ? $primerRegistro['created_at'] : '';
    }
} else {
    $noLicitacion = '';
    $nombreEstudio = '';
    $coordinador = '';
    $area = '';
    $nombreProveedor = '';
    $tipoPersona = '';
    $numCredencial = '';
    $total = 0;
    $subtotal = 0;
    $iva = 0;
    $createdAt = '';
}

$fechaFormateada = formatearFechaEspanolFalloLP($createdAt);
$horaFormateada = formatearHoraFalloLP($createdAt);
$totalFormateado = formatearNumeroFalloLP($total);
$totalTexto = numeroALetrasFalloLP($total);
$subtotalFormateado = formatearNumeroFalloLP($subtotal);
$subtotalTexto = numeroALetrasFalloLP($subtotal);

// Obtener partidas adjudicadas
$partidas = [];
if (!empty($productos)) {
    foreach ($productos as $p) {
        if (is_object($p)) {
            if (isset($p->partida) && !empty($p->partida)) {
                $partidas[] = $p->partida;
            }
        } else {
            if (isset($p['partida']) && !empty($p['partida'])) {
                $partidas[] = $p['partida'];
            }
        }
    }
}
$partidasAdjudicadas = !empty($partidas) ? implode(', ', $partidas) : '1, 2, 3, 4, 5, 6 Y 7';
?>

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
            <span class="campo campo-largo" style="font-size: 11pt;"><?= esc($noLicitacion) ?></span>
        </div>

        <div style="text-align: center; font-size: 9pt; font-weight: bold; margin-bottom: 15px;">
            PARA LA CONTRATACIÓN DEL "<span class="campo campo-largo" style="font-size: 10pt;"><?= esc($nombreEstudio) ?></span>"
        </div>

        <div class="acta-texto">
            EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO SIENDO LAS <span class="campo campo-corto"><?= esc($horaFormateada) ?></span> HORAS DEL DÍA <span class="campo campo-largo"><?= esc($fechaFormateada) ?></span>, EN EL ÁREA DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN EL EX SEMINARIO AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400, EL <span class="campo campo-largo"><?= esc($coordinador) ?></span>, COORDINADOR DE <span class="campo campo-largo"><?= esc($area) ?></span> Y SERVIDOR PÚBLICO DESIGNADO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL Y EL <span class="campo campo-largo"><?= esc($nombreProveedor) ?></span>, EN SU CARÁCTER DE <span class="campo campo-chico"><?= esc($tipoPersona) ?></span> PARA DAR CUMPLIMIENTO A LO ESTABLECIDO EN EL ARTÍCULO 38 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, 2 FRACCIÓN XXVI, 67 Y 89 FRACCIÓN XII, DE SU RESPECTIVO REGLAMENTO, EL ACTO SE DESARROLLARÁ CONFORME AL SIGUIENTE:
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
                SIENDO LAS <span class="campo campo-corto"><?= esc($horaFormateada) ?></span> HORAS, EL C. <span class="campo campo-largo"><?= esc($coordinador) ?></span>, SERVIDOR PÚBLICO DESIGNADO, DECLARÓ INICIADO FORMALMENTE EL PRESENTE ACTO.
            </div>

            <div style="font-weight: bold; font-size: 9pt; margin-top: 10px;">II. EN DESAHOGO DEL SEGUNDO PUNTO DEL ORDEN DEL DÍA. -</div>
            <div class="acta-texto" style="margin-left: 20px;">
                EL SERVIDOR PÚBLICO DESIGNADO MANIFIESTA QUE SE TIENE PRESENTE AL LICITANTE <span class="campo campo-largo"><?= esc($nombreProveedor) ?></span>, EN SU CARÁCTER DE <span class="campo campo-chico"><?= esc($tipoPersona) ?></span> QUIEN SE IDENTIFICA CON CREDENCIAL VIGENTE, NÚMERO DE FOLIO <span class="campo campo-mediano"><?= esc($numCredencial) ?></span>, EXPEDIDA POR EL INSTITUTO NACIONAL ELECTORAL.
            </div>

            <div style="font-weight: bold; font-size: 9pt; margin-top: 10px;">III. EN DESAHOGO DEL TERCER PUNTO DEL ORDEN DEL DÍA. -</div>
            <div class="acta-texto" style="margin-left: 20px;">
                EL <strong><span class="campo campo-largo"><?= esc($coordinador) ?></span></strong>, SERVIDOR PÚBLICO DESIGNADO PROCEDE A DAR LECTURA DEL DICTAMEN DE ADJUDICACIÓN EMITIDO POR EL COMITÉ DE ADQUISICIONES Y SERVICIOS DEL QUE SE DEDUCE LA ACEPTACIÓN DE LA PROPUESTA TÉCNICA, DOCUMENTACIÓN COMPLEMENTARIA Y PROPUESTA ECONÓMICA, PARA LA CONTRATACIÓN DEL "<span class="campo campo-largo"><?= esc($nombreEstudio) ?></span>" A LOS LICITANTES PARTICIPANTES.
            </div>
        </div>

        <div class="numero-pagina">1 DE 2</div>
    </div>
</div>

<!-- ========================================== -->
<!-- HOJA 2: DICTAMEN, ADJUDICACIÓN Y RECOMENDACIONES -->
<!-- ========================================== -->
<div class="hoja">
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
            <strong>PRIMERO:</strong> SE DICTAMINA POR UNANIMIDAD DE VOTOS DE LOS INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS, QUE ES DABLE ADJUDICAR EL CONTRATO PARA EL <strong>"<span class="campo campo-largo"><?= esc($nombreEstudio) ?></span>"</strong>, AL LICITANTE:
        </div>

        <table style="width: 100%; border-collapse: collapse; margin: 14px 0; font-size: 9pt; border: 1px solid black;">
            <thead>
                <tr>
                    <th style="border: 1px solid black; padding: 4px 3px; vertical-align: middle; text-align: center; background: #f0f0f0; font-weight: bold;">
                        LICITANTE
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: 1px solid black; padding: 4px 3px; vertical-align: middle; text-align: left;">
                        <div class="licitante-box" style="border: none; padding: 0; margin: 0;">
                            <span class="campo campo-largo" style="font-size: 9pt;"><?= esc($nombreProveedor) ?></span>
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
            EL <strong><span class="campo campo-largo"><?= esc($coordinador) ?></span></strong>, SERVIDOR PÚBLICO DESIGNADO, INFORMA QUE, CON BASE EN EL DICTAMEN DE ADJUDICACIÓN EMITIDO POR EL COMITÉ DE ADQUISICIONES Y SERVICIOS, SE ADJUDICA EL CONTRATO NÚMERO: <strong>MTM/CAYS/PF/<span class="campo campo-mediano"><?= esc($noLicitacion) ?></span></strong>, POR LAS PARTIDAS <?= esc($partidasAdjudicadas) ?> PARA LA CONTRATACIÓN DEL <strong>"<span class="campo campo-largo"><?= esc($nombreEstudio) ?></span>"</strong> AL LICITANTE:
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
                    <td style="font-weight: bold;"><?= esc($nombreProveedor) ?></td>
                    <td><?= esc($partidasAdjudicadas) ?></td>
                    <td style="font-weight: bold; color: #1a56db;">$<?= esc($totalFormateado) ?></td>
                </tr>
            </tbody>
        </table>

        <div class="acta-texto">
            DE ACUERDO CON LO ESTABLECIDO EN EL ARTÍCULO 89, FRACCIÓN III, DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, LA DESCRIPCIÓN DE LOS BIENES ADQUIRIDOS SON LOS SIGUIENTES:
        </div>

        <!-- TABLA DE PRODUCTOS COMPLETA -->
        <table style="font-size: 6.5pt;">
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
                <?php if (!empty($productos)): ?>
                    <?php foreach ($productos as $producto): 
                        if (is_object($producto)) {
                            $partida = isset($producto->partida) ? $producto->partida : '';
                            $descripcion = isset($producto->descripcion) ? $producto->descripcion : '';
                            $unidadMedida = isset($producto->unidad_medida) ? $producto->unidad_medida : 'N/A';
                            $cantidad = isset($producto->cantidad) ? $producto->cantidad : 1;
                            $marcaModelo = isset($producto->marca_modelo) ? $producto->marca_modelo : 'N/A';
                        } else {
                            $partida = isset($producto['partida']) ? $producto['partida'] : '';
                            $descripcion = isset($producto['descripcion']) ? $producto['descripcion'] : '';
                            $unidadMedida = isset($producto['unidad_medida']) ? $producto['unidad_medida'] : 'N/A';
                            $cantidad = isset($producto['cantidad']) ? $producto['cantidad'] : 1;
                            $marcaModelo = isset($producto['marca_modelo']) ? $producto['marca_modelo'] : 'N/A';
                        }
                    ?>
                    <tr>
                        <td><?= esc($partida) ?></td>
                        <td style="text-align: left; padding-left: 5px;"><strong><?= esc($descripcion) ?></strong></td>
                        <td><?= esc($unidadMedida) ?></td>
                        <td><?= number_format($cantidad, 0) ?></td>
                        <td><?= esc($marcaModelo) ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">NO HAY PRODUCTOS REGISTRADOS</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div style="margin: 5px 0;">
            <div style="font-size: 9pt;">
                MONTO MÁXIMO A PAGAR ES DE: <span class="campo campo-largo" style="font-size: 9pt;">$<?= esc($totalFormateado) ?> (<?= esc($totalTexto) ?>), <strong>EL IMPUESTO AL VALOR AGREGADO I.V.A.</strong></span>
            </div>
            <div style="font-size: 9pt;">
                MONTO MÍNIMO A PAGAR ES DE: <span class="campo campo-largo" style="font-size: 9pt;">$<?= esc($subtotalFormateado) ?> (<?= esc($subtotalTexto) ?>), <strong>INCLUIDO EL IMPUESTO AL VALOR AGREGADO I.V.A.</strong></span>
            </div>
        </div>

        <div style="font-weight: bold; font-size: 10pt; margin-top: 10px;">V. EN DESAHOGO DEL QUINTO PUNTO DEL ORDEN DEL DÍA. -</div>
        <div class="acta-texto" style="margin-left: 20px;">
            SE DAN LAS SIGUIENTES RECOMENDACIONES GENERALES AL <span class="campo campo-largo"><?= esc($nombreProveedor) ?></span>, EN SU CARÁCTER DE <span class="campo campo-chico"><?= esc($tipoPersona) ?></span>, MISMA QUE FORMA PARTE INTEGRAL DE LA CONTRATACIÓN POR LOS BIENES ADJUDICADOS:
        </div>

        <div style="font-weight: bold; font-size: 8.5pt;">LUGAR DE ENTREGA:</div>
        <div class="recomendacion-item">
            EN LOS LUGARES ESTABLECIDOS POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, MISMOS QUE SERÁN DENTRO DEL MUNICIPIO DE TEMASCALCINGO, MÉXICO.
        </div>
        <div style="font-weight: bold; font-size: 8.5pt; margin-top: 5px;">PLAZO DE ENTREGA:</div>
        <div class="recomendacion-item">
            DEL 10 DE FEBRERO AL <span class="campo campo-mediano"><?= esc($fechaFormateada) ?></span> Y DENTRO DE LOS HORARIOS ESTABLECIDOS POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.
        </div>

        <div style="font-weight: bold; font-size: 9pt; text-align: center; margin: 5px 0 10px 0;">CONDICIONES ECONÓMICAS PARA LA CONTRATACIÓN DE LOS SERVICIOS</div>
        <div class="recomendacion-item">
            EL PAGO SE REALIZARÁ MEDIANTE TRANSFERENCIA ELECTRÓNICA EN LA TESORERÍA MUNICIPAL, A MÁS TARDAR 10 DÍAS HÁBILES POSTERIORES A LA EMISIÓN DE CADA FACTURA (S) CORRESPONDIENTE (S) Y DENTRO DE LOS HORARIOS ESTABLECIDOS POR LA TESORERÍA MUNICIPAL.
        </div>

        <div style="font-weight: bold; font-size: 9pt; text-align: center; margin: 5px 0 10px 0;">ANTICIPOS</div>
        <div class="recomendacion-item">NO SE OTORGARÁN ANTICIPOS</div>

        <div style="font-weight: bold; font-size: 9pt; margin-top: 9px;">DE LAS GARANTÍAS</div>
        <div class="acta-texto">
            <strong>CUMPLIMIENTO DE CONTRATO:</strong> EL LICITANTE ADJUDICADO DEBERÁ PRESENTAR LA GARANTÍA POR CUMPLIMIENTO DE CONTRATO MISMA QUE PODRÁ SER: CHEQUE DE CAJA, CHEQUE CERTIFICADO O FIANZA EMITIDA POR LAS AFIANZADORAS AUTORIZADAS DEL GOBIERNO DEL ESTADO DE MÉXICO; LA CUAL SE CONSTITUIRÁ POR EL DIEZ POR CIENTO (10%) DEL IMPORTE DEL SUBTOTAL DEL CONTRATO.
        </div>

        <div class="acta-texto">
            LAS PROPUESTAS ADJUDICADAS GARANTIZAN LAS MEJORES CONDICIONES EN CUANTO A PRECIO, CALIDAD Y FINANCIAMIENTO, SIENDO EL LICITANTE <span class="campo campo-largo"><?= esc($nombreProveedor) ?></span> QUIEN CUMPLIÓ CON TODOS LOS REQUISITOS SOLICITADOS EN LA LICITACIÓN PÚBLICA NACIONAL PRESENCIAL <span class="campo campo-mediano"><?= esc($noLicitacion) ?></span>.
        </div>

        <div class="acta-texto">
            CON FUNDAMENTO EN LO PREVISTO POR EL ARTÍCULO 65 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, SE HACE DEL CONOCIMIENTO A EL LICITANTE <span class="campo campo-largo"><?= esc($nombreProveedor) ?></span> EN SU CARÁCTER DE <span class="campo campo-mediano"><?= esc($tipoPersona) ?></span> A QUIEN LE HA SIDO ADJUDICADO EL CONTRATO PARA EL <strong>"<span class="campo campo-largo"><?= esc($nombreEstudio) ?></span>"</strong>, QUE DEBERÁ PRESENTARSE PARA FIRMAR EL MISMO EN LAS OFICINAS QUE OCUPA LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN EL EX SEMINARIO, AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400 UN DÍA POSTERIOR AL PRESENTE ACTO.
        </div>

        <div class="acta-texto" style="font-style: italic;">
            LA PRESENTE ACTA SE TENDRÁ POR NOTIFICADA AL MOMENTO DE LA FIRMA, EN TÉRMINOS DE LO QUE ESTABLECEN LOS ARTÍCULOS 25 Y 26 DEL CÓDIGO DE PROCEDIMIENTOS ADMINISTRATIVOS VIGENTE EN EL ESTADO DE MÉXICO.
        </div>

        <div style="font-weight: bold; font-size: 9pt; text-align: center; margin: 5px 0 10px 0;">CLAUSURA DEL ACTO</div>
        <div class="acta-texto" style="margin-left: 20px;">
            NO HABIENDO NINGÚN OTRO ASUNTO A CALIFICAR, SE PROCEDE A FIRMAR LA PRESENTE ACTA, SIENDO LAS <span class="campo campo-corto"><?= esc($horaFormateada) ?></span> HORAS DEL DÍA DEL ACTO.
        </div>

        <!-- FIRMAS -->
        <div style="margin-top: 25px; display: flex; justify-content: space-between;">
            <div style="width: 48%; text-align: center;">
                <div style="font-weight: bold; font-size: 9pt; margin-bottom: 30px;">POR "EL MUNICIPIO"</div>
                <div style="margin-top: 40px;">
                    <span class="campo campo-largo" style="font-size: 9pt; text-decoration: underline;"><?= esc($coordinador) ?></span>
                </div>
                <div style="font-size: 9pt; margin-top: 2px;">
                    <span class="campo campo-largo" style="font-size: 9pt;"><?= esc($area) ?></span>
                </div>
            </div>

            <div style="width: 48%; text-align: center;">
                <div style="font-weight: bold; font-size: 9pt; margin-bottom: 30px;">POR "EL LICITANTE"</div>
                <div style="margin-top: 40px;">
                    <span class="campo campo-largo" style="font-size: 9pt; text-decoration: underline;"><?= esc($nombreProveedor) ?></span>
                </div>
                <div style="font-size: 9pt; margin-top: 2px;">
                    PERSONA <span class="campo campo-chico" style="font-size: 9pt;"><?= esc($tipoPersona) ?></span>
                </div>
            </div>
        </div>

        <div class="numero-pagina">2 DE 2</div>
    </div>
</div>

</body>
</html>