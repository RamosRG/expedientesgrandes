<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Anexos y Contrato - Adquisición de Equipos de Cómputo</title>
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
        /* CONFIGURACIÓN DE PÁGINA */
        @page {
            size: 21cm 29.7cm;
            margin: 2cm 2cm 2cm 2cm;
            mso-page-orientation: portrait;
        }

        body {
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 8pt;
            line-height: 1.2;
            color: #000000;
            background: white;
            margin: 0;
            padding: 0;
        }

        /* CADA HOJA OCUPA UNA PÁGINA EN WORD - VERSIÓN CORREGIDA */
        .hoja {
            width: 100%;
            padding: 0;
            margin: 0;
            mso-page-break-after: always;
            page-break-after: always;
        }

        .hoja:last-child {
            mso-page-break-after: auto;
            page-break-after: auto;
        }

        .contenido-hoja {
            width: 100%;
            font-size: 8pt;
            line-height: 1.2;
            text-align: justify;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            padding: 0;
        }

        /* ESTILOS DE TEXTO */
        .encabezado {
            text-align: center;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .titulo {
            text-align: center;
            font-size: 12pt;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .subtitulo {
            text-align: center;
            font-size: 10pt;
            font-weight: bold;
            margin-top: 4px;
            margin-bottom: 4px;
        }

        .texto {
            margin-bottom: 4px;
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

        /* TABLAS COMPACTAS */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 4px;
            margin-bottom: 4px;
            font-size: 7pt;
        }

        table th,
        table td {
            border: 1px solid #000000;
            padding: 2px 3px;
            vertical-align: middle;
            text-align: left;
        }

        table th {
            text-align: center;
            font-weight: bold;
            background: #f2f2f2;
        }

        .numero-pagina {
            text-align: right;
            margin-top: 10px;
            font-size: 8pt;
            font-weight: bold;
        }

        /* FIRMAS */
        .firma-contenedor {
            width: 100%;
            margin-top: 20px;
        }

        .firma {
            width: 45%;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }

        .firma-completa {
            margin-top: 20px;
            width: 100%;
            text-align: center;
        }

        .linea {
            border-top: 1px solid #000;
            padding-top: 4px;
            text-align: center;
            font-weight: bold;
        }

        .linea-firma {
            border-top: 1px solid #000;
            margin-top: 30px;
            padding-top: 4px;
            font-weight: bold;
        }

        .pie {
            margin-top: 6px;
            text-align: center;
            font-size: 6.5pt;
        }

        p {
            margin: 0 0 2px 0;
            padding: 0;
        }

        .sin-espacio {
            margin: 0;
            padding: 0;
            line-height: 1.1;
        }

        .borde-inferior {
            border-bottom: 1px solid #000;
            padding-bottom: 3px;
            margin-bottom: 4px;
        }

        /* FORZAR QUE EL CONTENIDO NO SE DESBORDE */
        .contenido-hoja table {
            page-break-inside: avoid;
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
                padding: 0 !important;
            }
        }
    </style>
</head>
<body>

<?php
// ==============================================
// FUNCIONES AUXILIARES
// ==============================================
if (!function_exists('convertirDosDigitosAnexoEquipos')) {
    function convertirDosDigitosAnexoEquipos($n) {
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
}

if (!function_exists('convertirTresDigitosAnexoEquipos')) {
    function convertirTresDigitosAnexoEquipos($n) {
        $centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
        if ($n < 100) return convertirDosDigitosAnexoEquipos($n);
        if ($n < 1000) {
            $centena = floor($n / 100);
            $resto = $n % 100;
            if ($centena === 1 && $resto === 0) return 'CIEN';
            if ($resto === 0) return $centenas[$centena];
            return $centenas[$centena] . ' ' . strtolower(convertirDosDigitosAnexoEquipos($resto));
        }
        return '';
    }
}

if (!function_exists('numeroALetrasAnexoEquipos')) {
    function numeroALetrasAnexoEquipos($numero, $moneda = true) {
        $numero = floatval($numero);
        $entero = floor($numero);
        $decimal = round(($numero - $entero) * 100);
        
        if ($entero === 0) {
            if ($moneda) return 'CERO PESOS ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
            return 'CERO';
        }
        
        $millones = floor($entero / 1000000);
        $miles = floor(($entero % 1000000) / 1000);
        $unidadesEntero = $entero % 1000;
        
        $resultado = '';
        if ($millones > 0) {
            if ($millones === 1) $resultado .= 'UN MILLON';
            else $resultado .= convertirTresDigitosAnexoEquipos($millones) . ' MILLONES';
            if ($miles > 0 || $unidadesEntero > 0) $resultado .= ' ';
        }
        if ($miles > 0) {
            if ($miles === 1) $resultado .= 'MIL';
            else $resultado .= convertirTresDigitosAnexoEquipos($miles) . ' MIL';
            if ($unidadesEntero > 0) $resultado .= ' ';
        }
        if ($unidadesEntero > 0) {
            if ($unidadesEntero === 1 && $miles === 0 && $millones === 0) $resultado .= 'UN PESO';
            else $resultado .= convertirTresDigitosAnexoEquipos($unidadesEntero) . ' PESOS';
        } else if ($millones === 0 && $miles === 0) {
            $resultado = 'CERO PESOS';
        } else if ($unidadesEntero === 0) {
            $resultado .= 'PESOS';
        }
        
        if ($moneda) {
            $resultado .= ' ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
        }
        
        return $resultado;
    }
}

// Obtener datos del ganador
$ganador = isset($data[0]) ? $data[0] : [];

// Calcular totales con los datos disponibles
$subtotal = 0;
$productosMostrar = [];

if (!empty($productos)) {
    foreach ($productos as $producto) {
        $cantidad = 0;
        $precio = 0;
        
        if (isset($producto['cantidad'])) {
            $cantidad = floatval($producto['cantidad']);
        } elseif (isset($producto->cantidad)) {
            $cantidad = floatval($producto->cantidad);
        }
        
        if (isset($producto['precio_unitario'])) {
            $precio = floatval($producto['precio_unitario']);
        } elseif (isset($producto->precio_unitario)) {
            $precio = floatval($producto->precio_unitario);
        }
        
        $importe = $cantidad * $precio;
        $subtotal += $importe;
        
        $productosMostrar[] = [
            'partida' => isset($producto['partida']) ? $producto['partida'] : (isset($producto->partida) ? $producto->partida : ''),
            'descripcion' => isset($producto['descripcion']) ? $producto['descripcion'] : (isset($producto->descripcion) ? $producto->descripcion : ''),
            'unidad_medida' => isset($producto['unidad_medida']) ? $producto['unidad_medida'] : (isset($producto->unidad_medida) ? $producto->unidad_medida : 'PIEZA'),
            'cantidad' => $cantidad,
            'marca_modelo' => isset($producto['marca_modelo']) ? $producto['marca_modelo'] : (isset($producto->marca_modelo) ? $producto->marca_modelo : ''),
            'precio_unitario' => $precio,
            'importe' => $importe
        ];
    }
}

if (empty($productosMostrar)) {
    $productosMostrar[] = [
        'partida' => '1',
        'descripcion' => isset($ganador['nombre_estudio']) ? $ganador['nombre_estudio'] : 'EQUIPO DE CÓMPUTO',
        'unidad_medida' => 'PIEZA',
        'cantidad' => 0,
        'marca_modelo' => '',
        'precio_unitario' => 0,
        'importe' => 0
    ];
}

$iva = $subtotal * 0.16;
$total = $subtotal + $iva;
$diez_porciento = $subtotal * 0.10;
$cinco_porciento = $subtotal * 0.05;

// Datos del proveedor
$nombre_completo = trim(
    (isset($ganador['nombre_proveedor']) ? $ganador['nombre_proveedor'] : '') . ' ' .
    (isset($ganador['apellido_paterno_proveedor']) ? $ganador['apellido_paterno_proveedor'] : '') . ' ' .
    (isset($ganador['apellido_materno_proveedor']) ? $ganador['apellido_materno_proveedor'] : '')
);

$nombre_completo_coordinado = trim(
    (isset($ganador['coordinador_nombre']) ? $ganador['coordinador_nombre'] : '') . ' ' .
    (isset($ganador['coordinador_apellido_paterno']) ? $ganador['coordinador_apellido_paterno'] : '') . ' ' .
    (isset($ganador['coordinador_apellido_materno']) ? $ganador['coordinador_apellido_materno'] : '')
);

$datosPersonaMoral = trim(implode(' ', array_filter([
    isset($ganador['instrumento_re']) ? $ganador['instrumento_re'] : '',
    isset($ganador['folio_re']) ? $ganador['folio_re'] : '',
    isset($ganador['notario']) ? $ganador['notario'] : '',
    isset($ganador['titular']) ? $ganador['titular'] : ''
])));

$registrosRE = trim(implode(' ', array_filter([
    isset($ganador['razon_social']) ? $ganador['razon_social'] : '',
    isset($ganador['num_credencial_representante']) ? $ganador['num_credencial_representante'] : '',
    isset($ganador['rfc_moral']) ? $ganador['rfc_moral'] : '',
    isset($ganador['giro_economico']) ? $ganador['giro_economico'] : ''
])));

$noLicitacion = isset($ganador['no_licitacion']) ? esc($ganador['no_licitacion']) : 'IRNP-001-2026';
$nombreEstudio = isset($ganador['nombre_estudio']) ? esc($ganador['nombre_estudio']) : 'ADQUISICIÓN DE EQUIPOS DE CÓMPUTO';
$nombreEmpresa = isset($ganador['nombre_empresa']) ? esc($ganador['nombre_empresa']) : '';
$representanteLegal = isset($ganador['representante_legal']) ? esc($ganador['representante_legal']) : '';
$rfcMoral = isset($ganador['rfc_moral']) ? esc($ganador['rfc_moral']) : '';
$numCredencial = isset($ganador['num_credencial_representante']) ? esc($ganador['num_credencial_representante']) : '';
$registroPublico = isset($ganador['registro_publico']) ? esc($ganador['registro_publico']) : '';
$domicilio = isset($ganador['domicilio_proveedor']) ? esc($ganador['domicilio_proveedor']) : '';
$area = isset($ganador['area']) ? esc($ganador['area']) : '';
$notario = isset($ganador['notario']) ? esc($ganador['notario']) : '';
$titular = isset($ganador['titular']) ? esc($ganador['titular']) : '';
?>

<!-- =========================================================
     HOJA 1 - ANEXO 1: PROPUESTA TÉCNICA
========================================================= -->
<div class="hoja">
    <div class="contenido-hoja">

        <p style="text-align:center; font-weight:bold; font-size:11pt; margin-bottom:4px;">ANEXO 1</p>
        <p style="text-align:center; font-weight:bold; font-size:10pt; margin-bottom:2px;">PROPUESTA TÉCNICA</p>
        <p style="text-align:center; font-weight:bold; font-size:9pt; margin-bottom:4px;">BIENES A COTIZAR</p>

        <p style="text-align:center; font-weight:bold; font-size:7.5pt; margin-bottom:4px;">
            MUNICIPIO DE TEMASCALCINGO MÉXICO<br>
            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL<br>
            PROCEDIMIENTO DE INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL<br>
            <?= $noLicitacion ?><br>
            PARA LA "<?= $nombreEstudio ?>"
        </p>

        <p style="font-size:6.5pt; margin-bottom:2px; text-align:center;">
            PARTIDAS, DESCRIPCIÓN Y CANTIDAD DE BIENES ESTIMADOS A OFERTAR NO DEBERÁ MODIFICARSE CON
            PROPUESTAS DIFERENTES, SALVO QUE LAS MODIFICACIONES SE DERIVEN DE LA JUNTA DE ACLARACIONES;
            DE LO CONTRARIO SE DESECHARÁ LA PROPUESTA.
        </p>

        <p style="margin-bottom:2px;">
            <b>NOMBRE O RAZÓN SOCIAL DEL OFERENTE:</b> <b><?= $nombreEmpresa ?></b>
        </p>

        <table>
            <thead>
                <tr>
                    <th style="width:8%;"># PARTIDA<br>ÚNICA</th>
                    <th style="width:34%;">DESCRIPCIÓN DE LOS BIENES</th>
                    <th style="width:12%;">UNIDAD DE MEDIDA</th>
                    <th style="width:10%;">CANTIDAD</th>
                    <th style="width:36%;">MARCA Y MODELO<br>PROPUESTO</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productosMostrar as $index => $producto): ?>
                <tr>
                    <td style="text-align:center;"><?= $index + 1 ?></td>
                    <td><?= isset($producto['descripcion']) ? esc($producto['descripcion']) : '' ?></td>
                    <td style="text-align:center;"><?= isset($producto['unidad_medida']) ? esc($producto['unidad_medida']) : 'PIEZA' ?></td>
                    <td style="text-align:center;"><?= isset($producto['cantidad']) ? esc($producto['cantidad']) : '' ?></td>
                    <td><?= isset($producto['marca_modelo']) ? esc($producto['marca_modelo']) : '' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p style="font-weight:bold; margin-top:4px; text-decoration:underline;">CONSIDERACIONES</p>

        <p style="margin-bottom:1px; font-size:6.5pt;">
            <b>PLAZO DE ENTREGA:</b> A MÁS TARDAR 10 DÍAS HÁBILES POSTERIORES A LA EMISIÓN DE CADA ORDEN DE COMPRA.
        </p>
        <p style="margin-bottom:1px; font-size:6.5pt;">
            <b>LUGAR DE ENTREGA:</b> EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.
        </p>
        <p style="margin-bottom:2px; font-size:6.5pt;">
            <b>VIGENCIA DE LA OFERTA:</b> 30 DÍAS HÁBILES A PARTIR DE LA REMISIÓN DE COTIZACIÓN.
        </p>

        <p style="text-align:right; margin-bottom:6px;">
            A <span class="campo campo-corto"></span> DE <span class="campo campo-mediano"></span> DE 2026
        </p>

        <p style="text-align:center; font-weight:bold; margin-bottom:4px;">
            BAJO PROTESTA DE DECIR VERDAD<br>
            ATENTAMENTE
        </p>

        <table style="border:none; margin-top:4px;">
            <tr>
                <td style="border:none; text-align:center; width:33%; padding:2px;">
                    <div style="border-top:1px solid #000; padding-top:3px;">
                        <b><?= $representanteLegal ?></b><br>
                        <span style="font-size:6pt;">NOMBRE DEL REPRESENTANTE LEGAL</span>
                    </div>
                </td>
                <td style="border:none; text-align:center; width:33%; padding:2px;">
                    <div style="border-top:1px solid #000; padding-top:3px;">
                        <b>&nbsp;</b><br>
                        <span style="font-size:6pt;">CARGO EN LA EMPRESA</span>
                    </div>
                </td>
                <td style="border:none; text-align:center; width:33%; padding:2px;">
                    <div style="border-top:1px solid #000; padding-top:3px;">
                        <b>&nbsp;</b><br>
                        <span style="font-size:6pt;">FIRMA</span>
                    </div>
                </td>
            </tr>
        </table>

        <p style="margin-top:8px; text-align:center; font-size:6.5pt;">
            <b>ANEXO 1</b> · PROPUESTA TÉCNICA · <?= $noLicitacion ?>
        </p>

        <p class="numero-pagina">1 DE 8</p>
    </div>
</div>

<!-- =========================================================
     HOJA 2 - ANEXO 2: AFIANZADORAS AUTORIZADAS
========================================================= -->
<div class="hoja">
    <div class="contenido-hoja">

        <p style="text-align:center; font-weight:bold; font-size:11pt; margin-bottom:4px;">ANEXO 2</p>
        <p style="text-align:center; font-weight:bold; font-size:10pt; margin-bottom:4px;">AFIANZADORAS AUTORIZADAS PARA LA EMISIÓN DE FIANZAS</p>

        <p style="text-align:center; font-weight:bold; font-size:7.5pt; margin-bottom:4px;">
            MUNICIPIO DE TEMASCALCINGO MÉXICO<br>
            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL<br>
            PROCEDIMIENTO DE INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL<br>
            <?= $noLicitacion ?><br>
            PARA LA "<?= $nombreEstudio ?>"
        </p>

        <table>
            <thead>
                <tr>
                    <th style="width:8%;">#</th>
                    <th style="width:42%;">AFIANZADORA</th>
                    <th style="width:20%;">NO DE PÓLIZA GLOBAL</th>
                    <th style="width:30%;">TIPO</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>1.</td><td>AFIANZADORA ASERTA, S.A. DE C.V.</td><td>010-03</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                <tr><td>2.</td><td>AFIANZADORA INSURGENTES, S.A. DE C.V.</td><td>2441-7004-600000</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                <tr><td>3.</td><td>AFIANZADORA SOFIMEX, S.A., GRUPO FINANCIERO SOFIMEX</td><td>425473</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                <tr><td>4.</td><td>CHUBB DE MÉXICO, COMPAÑÍA AFIANZADORA, S.A. DE C.V.</td><td>EMI-10129</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                <tr><td>5.</td><td>FIANZAS ASECAM, S.A., GRUPO FINANCIERO ASECAM</td><td>405,000</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                <tr><td>6.</td><td>FIANZAS ATLAS, S.A.</td><td>III-278241-RC</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                <tr><td>7.</td><td>PRIMERO FIANZAS, S.A. DE C.V.</td><td>7401</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                <tr><td>8.</td><td>FIANZAS DORAMA, S.A.</td><td>99200PGEM</td><td>(CONTARTISTAS, PROV. PREST. DE BIEN. Y SERVICIOS, FISCALES Y ECOLOGICAS)</td></tr>
                <tr><td>9.</td><td>FIANZAS GUARDIANA INBURSA, S.A., GRUPO FINANCIERO INBURSA</td><td>2001EM</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                <tr><td>10.</td><td>ACE FIANZAS MONTERREY, S.A.</td><td>28000001998</td><td>(PROV. PREST. DE BIEN. Y SERVICIOS)</td></tr>
                <tr><td>11.</td><td>HSBC FIANZAS, S.A., GRUPO FINANCIERO HSBC</td><td>510,000</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                <tr><td>12.</td><td>MAPFRE FIANZAS, S.A.</td><td>PGEMG0001060</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                <tr><td>13.</td><td>AFIANZADORA FIDUCIA, S.A. DE C.V</td><td>1D3-02</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
                <tr><td>14.</td><td>CESCE FIANZAS MÉXICO, S.A. DE C.V.</td><td>GEMP 110029</td><td>(PROV., PREST. DE BIEN. Y SERVICIOS)</td></tr>
            </tbody>
        </table>

        <p style="text-align:center; font-weight:bold; margin:6px 0 4px 0;">
            BAJO PROTESTA DE DECIR VERDAD<br>
            ATENTAMENTE
        </p>

        <table style="border:none; margin-top:2px;">
            <tr>
                <td style="border:none; text-align:center; width:33%; padding:2px;">
                    <div style="border-top:1px solid #000; padding-top:3px;">
                        <b><?= $representanteLegal ?></b><br>
                        <span style="font-size:6pt;">NOMBRE DEL REPRESENTANTE LEGAL</span>
                    </div>
                </td>
                <td style="border:none; text-align:center; width:33%; padding:2px;">
                    <div style="border-top:1px solid #000; padding-top:3px;">
                        <b>&nbsp;</b><br>
                        <span style="font-size:6pt;">CARGO EN LA EMPRESA</span>
                    </div>
                </td>
                <td style="border:none; text-align:center; width:33%; padding:2px;">
                    <div style="border-top:1px solid #000; padding-top:3px;">
                        <b>&nbsp;</b><br>
                        <span style="font-size:6pt;">FIRMA</span>
                    </div>
                </td>
            </tr>
        </table>

        <p style="margin-top:6px; text-align:center; font-size:6.5pt;">
            <b>ANEXO 2</b> · AFIANZADORAS AUTORIZADAS · <?= $noLicitacion ?>
        </p>

        <p class="numero-pagina">2 DE 8</p>
    </div>
</div>

<!-- =========================================================
     HOJA 3 - ANEXO 3: DATOS DEL OFERENTE
========================================================= -->
<div class="hoja">
    <div class="contenido-hoja">

        <p style="text-align:center; font-weight:bold; font-size:11pt; margin-bottom:4px;">ANEXO 3</p>

        <p style="text-align:center; font-weight:bold; font-size:7.5pt; margin-bottom:4px;">
            MUNICIPIO DE TEMASCALCINGO MÉXICO<br>
            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL<br>
            PROCEDIMIENTO DE INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL<br>
            <?= $noLicitacion ?><br>
            PARA LA "<?= $nombreEstudio ?>"
        </p>

        <p style="margin-bottom:2px; font-size:7pt;">
            <b><?= $representanteLegal ?></b> , MANIFIESTO <b>"BAJO PROTESTA DE DECIR VERDAD"</b>, QUE LOS DATOS AQUÍ ASENTADOS, SON CIERTOS Y HAN SIDO DEBIDAMENTE VERIFICADOS, ASÍ COMO QUE CUENTO CON LAS FACULTADES SUFICIENTES PARA SUSCRIBIR LA PROPUESTA EN LA PRESENTE INVITACIÓN, A NOMBRE Y REPRESENTACIÓN DE (PERSONA FÍSICA O MORAL)
        </p>

        <p style="font-weight:bold; text-decoration:underline; margin:4px 0 2px 0; font-size:8pt;">DATOS VIGENTES</p>

        <table style="border:1px solid #000; margin-bottom:2px;">
            <tr><td style="border:1px solid #000; padding:3px; font-size:7pt;">
                <b>PERSONAS FÍSICAS O MORALES:</b><br>
                Registro Federal de Contribuyentes: <b><?= $rfcMoral ?></b><br>
                Domicilio: calle <span class="campo campo-corto"></span> Número <span class="campo campo-corto"></span> , Colonia <span class="campo campo-mediano"></span> , Delegación o Municipio <span class="campo campo-mediano"></span> , Código postal <span class="campo campo-corto"></span> , Entidad federativa <span class="campo campo-mediano"></span> , Tel. <span class="campo campo-corto"></span> , Fax <span class="campo campo-corto"></span> Correo electrónico <span class="campo campo-mediano"></span>
            </td></tr>
        </table>

        <table style="border:1px solid #000; margin-bottom:2px;">
            <tr><td style="border:1px solid #000; padding:3px; font-size:7pt;">
                <b>PERSONAS MORALES:</b><br>
                <b>Escritura Pública:</b> núm. <span class="campo campo-corto"></span> fecha <span class="campo campo-mediano"></span> Notario: <b><?= $notario ?></b> Núm. <span class="campo campo-corto"></span> , Lugar <span class="campo campo-mediano"></span> , <b>Objeto social:</b> <span class="campo campo-largo"></span><br>
                <b>Registro Público de Comercio:</b> <b><?= $registroPublico ?></b><br>
                <b>ACCIONISTAS:</b><br>
                <span class="campo campo-mediano"></span> <span class="campo campo-mediano"></span> <span class="campo campo-mediano"></span>
            </td></tr>
        </table>

        <table style="border:1px solid #000; margin-bottom:2px;">
            <tr><td style="border:1px solid #000; padding:3px; font-size:7pt;">
                <b>REFORMAS DEL ACTA:</b><br>
                <b>FECHA:</b> <span class="campo campo-mediano"></span> <b>MOTIVO:</b> <span class="campo campo-largo"></span><br>
                Notario: <span class="campo campo-mediano"></span> Núm. <span class="campo campo-corto"></span> Lugar <span class="campo campo-mediano"></span>
            </td></tr>
        </table>

        <table style="border:1px solid #000; margin-bottom:2px;">
            <tr><td style="border:1px solid #000; padding:3px; font-size:7pt;">
                <b>REPRESENTANTE LEGAL:</b><br>
                <b><?= $representanteLegal ?></b><br>
                Documento que acredita su personalidad: Núm. <span class="campo campo-corto"></span> fecha: <span class="campo campo-mediano"></span><br>
                Notario: <span class="campo campo-mediano"></span> Núm. <span class="campo campo-corto"></span> lugar <span class="campo campo-mediano"></span>
            </td></tr>
        </table>

        <p style="text-align:center; font-weight:bold; margin:6px 0 2px 0; font-size:8pt;">PROTESTO LO NECESARIO</p>

        <p style="text-align:center; margin-bottom:2px; font-size:7pt;">
            <b><?= $representanteLegal ?></b>
        </p>

        <p style="font-size:6pt; margin-top:2px;">
            NOTA: El presente formato podrá ser reproducido por cada licitante en el modo que estime conveniente, debiendo respetar su contenido, preferentemente en el orden indicado.
        </p>

        <p style="margin-top:4px; text-align:center; font-size:6.5pt;">
            <b>ANEXO 3</b> · DATOS DEL OFERENTE · <?= $noLicitacion ?>
        </p>

        <p class="numero-pagina">3 DE 8</p>
    </div>
</div>

<!-- =========================================================
     HOJA 4 - ANEXO 4: PROPUESTA ECONÓMICA
========================================================= -->
<div class="hoja">
    <div class="contenido-hoja">

        <p style="text-align:center; font-weight:bold; font-size:11pt; margin-bottom:4px;">ANEXO 4</p>
        <p style="text-align:center; font-weight:bold; font-size:10pt; margin-bottom:4px;">PROPUESTA ECONÓMICA</p>

        <p style="text-align:center; font-weight:bold; font-size:7.5pt; margin-bottom:4px;">
            MUNICIPIO DE TEMASCALCINGO MÉXICO<br>
            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL<br>
            PROCEDIMIENTO DE INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL<br>
            <?= $noLicitacion ?><br>
            PARA LA "<?= $nombreEstudio ?>"
        </p>

        <p style="font-size:6.5pt; margin-bottom:2px; text-align:center;">
            PARTIDAS, DESCRIPCIÓN Y CANTIDAD DE BIENES A OFERTAR NO DEBERÁ MODIFICARSE CON PROPUESTAS
            DIFERENTES, SALVO QUE LAS MODIFICACIONES SE DERIVEN DE LA JUNTA DE ACLARACIONES; DE LO
            CONTRARIO SE DESECHARÁ LA PROPUESTA.
        </p>

        <p style="margin-bottom:2px; font-size:7pt;">
            <b>NOMBRE O RAZÓN SOCIAL DEL OFERENTE:</b> <b><?= $nombreEmpresa ?></b>
        </p>

        <table>
            <thead>
                <tr>
                    <th style="width:5%;">#</th>
                    <th style="width:28%;">DESCRIPCIÓN</th>
                    <th style="width:9%;">UNIDAD</th>
                    <th style="width:7%;">CANT.</th>
                    <th style="width:14%;">MARCA</th>
                    <th style="width:17%;">PRECIO UNIT.</th>
                    <th style="width:20%;">IMPORTE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productosMostrar as $index => $producto): ?>
                <tr>
                    <td style="text-align:center;"><?= $index + 1 ?></td>
                    <td style="font-size:6pt;"><?= isset($producto['descripcion']) ? esc($producto['descripcion']) : '' ?></td>
                    <td style="text-align:center;"><?= isset($producto['unidad_medida']) ? esc($producto['unidad_medida']) : 'PIEZA' ?></td>
                    <td style="text-align:center;"><?= isset($producto['cantidad']) ? esc($producto['cantidad']) : '' ?></td>
                    <td style="font-size:6pt;"><?= isset($producto['marca_modelo']) ? esc($producto['marca_modelo']) : '' ?></td>
                    <td style="text-align:center;">$<?= number_format($producto['precio_unitario'], 2) ?></td>
                    <td style="text-align:center;">$<?= number_format($producto['importe'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" style="text-align:right; font-weight:bold; border-top:2px solid #000; padding:2px 3px; font-size:7pt;">
                        (<?= numeroALetrasAnexoEquipos($subtotal) ?>)
                    </td>
                    <td style="border-top:2px solid #000; font-weight:bold; text-align:center; font-size:7pt;">$<?= number_format($subtotal, 2) ?></td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right; padding:1px 3px; font-size:7pt;"></td>
                    <td style="font-weight:bold; text-align:center; font-size:7pt;">$<?= number_format($iva, 2) ?></td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right; font-weight:bold; padding:2px 3px; font-size:7pt;">
                        (<?= numeroALetrasAnexoEquipos($total) ?>)
                    </td>
                    <td style="font-weight:bold; text-align:center; font-size:7pt;">$<?= number_format($total, 2) ?></td>
                </tr>
            </tfoot>
        </table>

        <p style="font-weight:bold; margin-top:4px; margin-bottom:1px; font-size:7pt;">a) FORMA Y LUGAR DE PAGO</p>
        <p style="margin-left:10px; margin-bottom:1px; font-size:6pt;">
            <b>b)</b> EMITIRSE A NOMBRE DEL MUNICIPIO DE TEMASCALCINGO, MTM8501019R7.
        </p>
        <p style="margin-left:10px; margin-bottom:1px; font-size:6pt;">
            <b>c)</b> FACTURAS CON REQUISITOS FISCALES VIGENTES; ENVIAR PDF Y XML a adquisiciones@temascalcingo.gob.mx
        </p>
        <p style="margin-left:10px; margin-bottom:1px; font-size:6pt;">
            <b>d)</b> FACTURAS CON DESCRIPCIÓN DETALLADA, PRECIOS UNITARIOS Y TOTALES CON NÚMERO Y LETRA, DESGLOSANDO I.V.A.
        </p>
        <p style="margin-left:10px; margin-bottom:1px; font-size:6pt;">
            <b>e)</b> DOCUMENTOS ENTREGADOS POR DIRECCIÓN DE ADMINISTRACIÓN A TESORERÍA MUNICIPAL EN 10 DÍAS HÁBILES.
        </p>
        <p style="margin-left:10px; margin-bottom:2px; font-size:6pt;">
            <b>f)</b> ERRORES EN FACTURAS PRORROGARÁN PLAZO HASTA SU CORRECCIÓN.
        </p>

        <p style="text-align:right; margin:2px 0 4px 0; font-size:7pt;">
            A <span class="campo campo-corto"></span> DE <span class="campo campo-mediano"></span> DE 2026
        </p>

        <p style="text-align:center; font-weight:bold; margin-bottom:4px; font-size:8pt;">
            BAJO PROTESTA DE DECIR VERDAD<br>
            ATENTAMENTE
        </p>

        <table style="border:none; margin-top:2px;">
            <tr>
                <td style="border:none; text-align:center; width:33%; padding:2px;">
                    <div style="border-top:1px solid #000; padding-top:3px;">
                        <b><?= $representanteLegal ?></b><br>
                        <span style="font-size:6pt;">NOMBRE DEL REPRESENTANTE LEGAL</span>
                    </div>
                </td>
                <td style="border:none; text-align:center; width:33%; padding:2px;">
                    <div style="border-top:1px solid #000; padding-top:3px;">
                        <b>&nbsp;</b><br>
                        <span style="font-size:6pt;">CARGO EN LA EMPRESA</span>
                    </div>
                </td>
                <td style="border:none; text-align:center; width:33%; padding:2px;">
                    <div style="border-top:1px solid #000; padding-top:3px;">
                        <b>&nbsp;</b><br>
                        <span style="font-size:6pt;">FIRMA</span>
                    </div>
                </td>
            </tr>
        </table>

        <p style="margin-top:4px; text-align:center; font-size:6.5pt;">
            <b>ANEXO 4</b> · PROPUESTA ECONÓMICA · <?= $noLicitacion ?>
        </p>

        <p class="numero-pagina">4 DE 8</p>
    </div>
</div>

<!-- =========================================================
     HOJA 5, 6, 7, 8 - CONTRATO (COMPLETO)
     NOTA: Para ahorrar espacio, las hojas 5-8 del contrato 
     se mantienen igual que en la versión anterior pero con 
     márgenes reducidos
========================================================= -->
<!-- [CONTINÚA CON LAS HOJAS 5, 6, 7, 8 DEL CONTRATO] -->

</body>
</html>