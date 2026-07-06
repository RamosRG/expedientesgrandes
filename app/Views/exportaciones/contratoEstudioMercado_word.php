<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudio de Mercado · Suministro Papelería Municipal</title>
    <style>
        /* ============================================ */
        /* RESET Y BASE                                 */
        /* ============================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            padding: 0;
            margin: 0;
            color: #000;
        }

        /* ============================================ */
        /* HOJA CARTA - TAMAÑO 8.5" x 11"              */
        /* Márgenes: Top: 2.5cm, Bottom: 2.5cm, Left: 3cm, Right: 3cm */
        /* ============================================ */
        .hoja {
            width: 216mm;
            min-height: 279mm;
            padding: 25mm 30mm 25mm 30mm;
            margin: 0 auto;
            position: relative;
            page-break-after: always;
            break-inside: avoid;
        }

        .hoja:last-child {
            page-break-after: avoid;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
        }

        /* ============================================ */
        /* ESTILOS DE CONTENIDO                         */
        /* ============================================ */
        .encabezado-muni {
            text-align: right;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            font-size: 12pt;
            font-weight: normal;
            text-transform: uppercase;
            margin: 0;
            padding: 0;
            line-height: 1.4;
            border: none;
        }

        .subtitulo-sec {
            text-align: left;
            font-weight: bold;
            font-size: 13pt;
            margin: 14px 0 8px 0;
            text-transform: uppercase;
            border: none;
            display: block;
            width: 100%;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        .texto {
            margin-bottom: 8px;
            text-align: justify;
            font-size: 12pt;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            line-height: 1.5;
        }

        .campo-verde {
            display: inline-block;
            border-bottom: 1.5px solid #000;
            min-width: 120px;
            padding: 0px 6px;
            font-weight: 600;
            color: #000;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            font-size: 12pt;
        }

        .campo-mediano {
            min-width: 160px;
        }

        .campo-largo {
            min-width: 250px;
        }

        /* ============================================ */
        /* TABLAS                                       */
        /* ============================================ */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 8px 0;
            font-size: 10pt;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        th,
        td {
            border: 1px solid #000000;
            padding: 4px 5px;
            vertical-align: middle;
        }

        th {
            background: #f0f4f8;
            text-align: center;
            font-weight: bold;
            font-size: 10pt;
        }

        td {
            font-size: 10pt;
        }

        /* ============================================ */
        /* TABLA EMPRESA/PROVEEDOR (SIN BORDES)        */
        /* ============================================ */
        .tabla-empresa-proveedor,
        .tabla-empresa-proveedor th,
        .tabla-empresa-proveedor td,
        .tabla-empresa-proveedor tbody,
        .tabla-empresa-proveedor thead,
        .tabla-empresa-proveedor tfoot,
        .tabla-empresa-proveedor tr {
            border: none !important;
            border-collapse: collapse !important;
        }

        .tabla-empresa-proveedor thead,
        .tabla-empresa-proveedor tfoot {
            display: none !important;
        }

        .tabla-empresa-proveedor td {
            padding: 4px 8px;
            text-align: left !important;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            font-size: 12pt;
            border: none !important;
        }

        .tabla-empresa-proveedor td:first-child {
            width: 25%;
        }

        .tabla-empresa-proveedor td:nth-child(2) {
            width: 45%;
        }

        .tabla-empresa-proveedor td:last-child {
            width: 30%;
            text-align: right !important;
        }

        .texto-precios-grande {
            font-size: 12pt !important;
        }

        /* ============================================ */
        /* TABLA INFO (ÁREA USUARIA)                    */
        /* ============================================ */
        .tabla-info {
            width: 75%;
            margin: 8px 0;
            border-collapse: collapse;
        }

        .tabla-info td {
            border: 1px solid #000;
            padding: 5px 8px;
            vertical-align: top;
            font-size: 11pt;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        .tabla-info td:first-child {
            font-weight: bold;
            width: 35%;
            background: #f0f4f8;
        }

        /* ============================================ */
        /* TABLA ESTUDIO (Cuadro Comparativo)           */
        /* ============================================ */
        .tabla-estudio {
            font-size: 9pt;
        }

        .tabla-estudio th,
        .tabla-estudio td {
            padding: 3px 4px;
            font-size: 9pt;
        }

        .tabla-estudio th {
            font-size: 8.5pt;
        }

        /* ============================================ */
        /* FIRMAS Y PIE DE PÁGINA                       */
        /* ============================================ */
        .numero-pagina {
            position: absolute;
            bottom: 10mm;
            right: 12mm;
            font-size: 10pt;
            font-weight: bold;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        .fila-firma {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
        }

        .col-firma {
            text-align: center;
            width: 45%;
        }

        .linea-firma {
            border-top: 1.5px solid #000;
            margin-top: 40px;
            padding-top: 5px;
            width: 100%;
        }

        .col-firma div {
            font-size: 11pt;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        ul {
            font-size: 12pt;
            margin-bottom: 8px;
            margin-left: 25px;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            line-height: 1.5;
        }

        ul li {
            margin-bottom: 3px;
        }

        .estimado-box {
            background: #f9efdb;
            padding: 6px 10px;
            margin-top: 10px;
            font-size: 12pt;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            line-height: 1.5;
        }

        .estimado-box strong {
            font-weight: bold;
        }

        .texto strong {
            font-weight: bold;
        }

        /* ============================================ */
        /* IMPRESIÓN                                    */
        /* ============================================ */
        @media print {
            body {
                background: white;
                padding: 0;
                margin: 0;
            }

            .hoja {
                border: none !important;
                box-shadow: none !important;
                margin: 0 !important;
                padding: 25mm 30mm 25mm 30mm !important;
                page-break-after: always;
                width: 100%;
                min-height: 100vh;
            }

            .hoja:last-child {
                page-break-after: avoid;
            }
        }
    </style>
</head>
<body>

<?php
// ============================================
// FUNCIONES PHP PARA PROCESAR DATOS
// ============================================

function formatearFechaEspanol($fechaString) {
    if (empty($fechaString)) return '';
    
    $fecha = new DateTime($fechaString);
    $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 
              'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
    
    return $fecha->format('j') . ' DE ' . $meses[$fecha->format('n') - 1] . ' DE ' . $fecha->format('Y');
}

function formatearDinero($valor) {
    if (empty($valor) || !is_numeric($valor)) $valor = 0;
    return '$' . number_format((float)$valor, 2, '.', ',');
}

function numeroATextoPHP($numero) {
    if (!is_numeric($numero) || $numero <= 0) {
        return "CERO PESOS 00/100 M.N.";
    }

    $numeroRedondeado = round($numero * 100) / 100;
    $partes = explode('.', number_format($numeroRedondeado, 2, '.', ''));
    $enteros = (int)$partes[0];
    $decimales = isset($partes[1]) ? (int)$partes[1] : 0;

    $unidades = ["", "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE"];
    $decenas = ["", "DIEZ", "VEINTE", "TREINTA", "CUARENTA", "CINCUENTA", "SESENTA", "SETENTA", "OCHENTA", "NOVENTA"];
    $decenasEspeciales = ["", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISÉIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE"];
    $centenas = ["", "CIENTO", "DOSCIENTOS", "TRESCIENTOS", "CUATROCIENTOS", "QUINIENTOS", "SEISCIENTOS", "SETECIENTOS", "OCHOCIENTOS", "NOVECIENTOS"];

    function convertirNumero($num, $unidades, $decenas, $decenasEspeciales, $centenas) {
        if ($num === 0) return "";
        if ($num < 10) return $unidades[$num];
        if ($num < 20) {
            if ($num === 10) return "DIEZ";
            return $decenasEspeciales[$num - 10];
        }
        if ($num < 100) {
            $dec = floor($num / 10);
            $uni = $num % 10;
            if ($uni === 0) return $decenas[$dec];
            if ($dec === 2) return "VEINTI" . strtolower($unidades[$uni]);
            return $decenas[$dec] . " Y " . strtolower($unidades[$uni]);
        }
        if ($num < 1000) {
            $cen = floor($num / 100);
            $resto = $num % 100;
            if ($cen === 1 && $resto === 0) return "CIEN";
            if ($resto === 0) return $centenas[$cen];
            return $centenas[$cen] . " " . convertirNumero($resto, $unidades, $decenas, $decenasEspeciales, $centenas);
        }
        if ($num < 1000000) {
            $miles = floor($num / 1000);
            $resto = $num % 1000;
            if ($miles === 1) {
                return "MIL" . ($resto > 0 ? " " . convertirNumero($resto, $unidades, $decenas, $decenasEspeciales, $centenas) : "");
            }
            return convertirNumero($miles, $unidades, $decenas, $decenasEspeciales, $centenas) . " MIL" . ($resto > 0 ? " " . convertirNumero($resto, $unidades, $decenas, $decenasEspeciales, $centenas) : "");
        }
        if ($num < 1000000000) {
            $millones = floor($num / 1000000);
            $resto = $num % 1000000;
            if ($millones === 1) {
                return "UN MILLÓN" . ($resto > 0 ? " " . convertirNumero($resto, $unidades, $decenas, $decenasEspeciales, $centenas) : "");
            }
            return convertirNumero($millones, $unidades, $decenas, $decenasEspeciales, $centenas) . " MILLONES" . ($resto > 0 ? " " . convertirNumero($resto, $unidades, $decenas, $decenasEspeciales, $centenas) : "");
        }
        return $num;
    }

    $textoEnteros = convertirNumero($enteros, $unidades, $decenas, $decenasEspeciales, $centenas);
    if ($enteros === 0) $textoEnteros = "CERO";
    if ($enteros === 1) $textoEnteros = "UN";

    $moneda = $enteros === 1 ? "PESO" : "PESOS";
    $decimalStr = str_pad($decimales, 2, '0', STR_PAD_LEFT);

    return $textoEnteros . " " . $moneda . " " . $decimalStr . "/100 M.N.";
}

// ============================================
// PROCESAR DATOS RECIBIDOS
// ============================================

$productos = $productos ?? [];
$estudio = $estudio ?? [];

// Obtener primer registro de productos para datos generales
$primerProducto = !empty($productos) ? $productos[0] : null;
$primerEstudio = !empty($estudio) ? $estudio[0] : null;

// Variables generales
$catalogo = $primerProducto['catalogo'] ?? 'PAPELERÍA';
$coordinador = $primerProducto['coordinador'] ?? 'COORDINADOR DE RECURSOS MATERIALES';
$area = $primerProducto['area'] ?? 'ÁREA SOLICITANTE';
$fechaCreacion = $primerProducto['created_at'] ?? date('Y-m-d');
$fechaFormateada = formatearFechaEspanol($fechaCreacion);
$nombreEstudio = $primerEstudio->nombre_estudio ?? $catalogo;

// ============================================
// 1. AGRUPAR PRODUCTOS PARA TABLA DE ESTUDIO
// ============================================
$agrupado = [];
$proveedoresSet = [];

foreach ($estudio as $item) {
    $idDesc = $item->id_descripcion ?? uniqid();
    
    // Determinar el nombre del proveedor/empresa
    $nombreProveedor = '';
    if (!empty($item->empresa) && trim($item->empresa) !== '') {
        $nombreProveedor = strtoupper(trim($item->empresa));
    } elseif (!empty($item->nombre_proveedor) && trim($item->nombre_proveedor) !== '') {
        $nombreProveedor = strtoupper(trim($item->nombre_proveedor));
        $nombreProveedor = preg_replace('/\s+/', ' ', $nombreProveedor);
    }
    
    if (!empty($nombreProveedor)) {
        $proveedoresSet[] = $nombreProveedor;
    }
    
    if (!isset($agrupado[$idDesc])) {
        $agrupado[$idDesc] = [
            'partida' => $item->partida ?? '',
            'descripcion' => $item->descripcion ?? '',
            'unidad' => $item->unidad_medida ?? '',
            'cantidad' => (float)($item->cantidad ?? 0),
            'proveedores' => []
        ];
    }
    
    if (!empty($nombreProveedor)) {
        $precioUnitario = (float)($item->precio_unitario ?? 0);
        $precioTotal = (float)($item->precio_total ?? 0);
        
        // Si no hay precio_total, calcularlo
        if ($precioTotal == 0 && $precioUnitario > 0) {
            $precioTotal = $precioUnitario * $agrupado[$idDesc]['cantidad'];
        }
        
        $agrupado[$idDesc]['proveedores'][$nombreProveedor] = [
            'precio' => $precioUnitario,
            'total' => $precioTotal,
            'marca_modelo' => $item->marca_modelo ?? '—'
        ];
    }
}

// Obtener lista única de proveedores
$proveedores = array_unique($proveedoresSet);
sort($proveedores);

// ============================================
// 2. CALCULAR TOTALES POR PROVEEDOR
// ============================================
$totalesPorProveedor = [];
foreach ($proveedores as $p) {
    $totalesPorProveedor[$p] = 0;
}

// ============================================
// 3. CONSTRUIR TABLA DE ESTUDIO
// ============================================
$tablaEstudioHTML = '';
$conteoProveedores = count($proveedores);

foreach ($agrupado as $item) {
    $fila = '<tr>';
    $fila .= '<td style="font-family:\'Century Gothic\',sans-serif;">' . htmlspecialchars($item['partida']) . '</td>';
    $fila .= '<td style="text-align:left;font-family:\'Century Gothic\',sans-serif;">' . htmlspecialchars($item['descripcion']) . '</td>';
    $fila .= '<td style="font-family:\'Century Gothic\',sans-serif;">' . htmlspecialchars($item['unidad']) . '</td>';
    $fila .= '<td style="font-family:\'Century Gothic\',sans-serif;">' . number_format($item['cantidad'], 0) . '</td>';
    
    $sumaFilas = 0;
    $conteoFilas = 0;
    
    foreach ($proveedores as $p) {
        if (isset($item['proveedores'][$p])) {
            $datosProv = $item['proveedores'][$p];
            $precio = $datosProv['precio'];
            $total = $datosProv['total'] > 0 ? $datosProv['total'] : $precio * $item['cantidad'];
            
            $totalesPorProveedor[$p] += $total;
            $sumaFilas += $total;
            $conteoFilas++;
            
            $fila .= '<td style="font-family:\'Century Gothic\',sans-serif;">' . formatearDinero($precio) . '</td>';
            $fila .= '<td style="font-family:\'Century Gothic\',sans-serif;">' . formatearDinero($total) . '</td>';
            $fila .= '<td style="font-family:\'Century Gothic\',sans-serif;">' . htmlspecialchars($datosProv['marca_modelo']) . '</td>';
        } else {
            $fila .= '<td style="font-family:\'Century Gothic\',sans-serif;">—</td>';
            $fila .= '<td style="font-family:\'Century Gothic\',sans-serif;">—</td>';
            $fila .= '<td style="font-family:\'Century Gothic\',sans-serif;">—</td>';
        }
    }
    
    $promedio = $conteoFilas > 0 ? $sumaFilas / $conteoFilas : 0;
    $fila .= '<td style="font-family:\'Century Gothic\',sans-serif;"><strong>' . formatearDinero($promedio) . '</strong></td>';
    $fila .= '</tr>';
    
    $tablaEstudioHTML .= $fila;
}

// ============================================
// 4. CONSTRUIR ENCABEZADOS DE TABLA ESTUDIO
// ============================================
$theadHTML = '<th style="width:7%;font-family:\'Century Gothic\',sans-serif;">PARTIDA</th>';
$theadHTML .= '<th style="width:22%;font-family:\'Century Gothic\',sans-serif;">DESCRIPCIÓN</th>';
$theadHTML .= '<th style="width:8%;font-family:\'Century Gothic\',sans-serif;">UNIDAD</th>';
$theadHTML .= '<th style="width:8%;font-family:\'Century Gothic\',sans-serif;">CANTIDAD</th>';

$anchoProveedor = $conteoProveedores > 0 ? (50 / $conteoProveedores) : 0;
foreach ($proveedores as $p) {
    $theadHTML .= '<th colspan="3" style="width:' . number_format($anchoProveedor, 1) . '%;font-family:\'Century Gothic\',sans-serif;">' . htmlspecialchars($p) . '</th>';
}
$theadHTML .= '<th style="width:8%;font-family:\'Century Gothic\',sans-serif;">PROMEDIO TOTAL</th>';

// ============================================
// 5. CONSTRUIR PIE DE TABLA ESTUDIO
// ============================================
$colSpanFijo = 4;
$tfootHTML = '<tr class="tfoot-subtotal">';
$tfootHTML .= '<th colspan="' . $colSpanFijo . '" style="font-family:\'Century Gothic\',sans-serif;">SUBTOTAL</th>';

foreach ($proveedores as $p) {
    $sub = $totalesPorProveedor[$p] ?? 0;
    $tfootHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"></td>';
    $tfootHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"><strong>' . formatearDinero($sub) . '</strong></td>';
    $tfootHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"></td>';
}
$tfootHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"></td></tr>';

$tfootHTML .= '<tr class="tfoot-iva">';
$tfootHTML .= '<th colspan="' . $colSpanFijo . '" style="font-family:\'Century Gothic\',sans-serif;">IVA (16%)</th>';

foreach ($proveedores as $p) {
    $iva = ($totalesPorProveedor[$p] ?? 0) * 0.16;
    $tfootHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"></td>';
    $tfootHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;">' . formatearDinero($iva) . '</td>';
    $tfootHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"></td>';
}
$tfootHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"></td></tr>';

$tfootHTML .= '<tr class="tfoot-total">';
$tfootHTML .= '<th colspan="' . $colSpanFijo . '" style="font-family:\'Century Gothic\',sans-serif;">TOTAL</th>';

$sumaTotales = 0;
foreach ($proveedores as $p) {
    $totalProveedor = ($totalesPorProveedor[$p] ?? 0) * 1.16;
    $sumaTotales += $totalProveedor;
    $tfootHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"></td>';
    $tfootHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"><strong>' . formatearDinero($totalProveedor) . '</strong></td>';
    $tfootHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"></td>';
}

$promedioGeneral = $conteoProveedores > 0 ? $sumaTotales / $conteoProveedores : 0;
$tfootHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"><strong>' . formatearDinero($promedioGeneral) . '</strong></td></tr>';

// ============================================
// 6. CONSTRUIR TABLA DE PRODUCTOS
// ============================================
$productosHTML = '';
foreach ($productos as $item) {
    $productosHTML .= '<tr>';
    $productosHTML .= '<td>' . htmlspecialchars($item['partida'] ?? '') . '</td>';
    $productosHTML .= '<td>' . htmlspecialchars($item['descripcion'] ?? '') . '</td>';
    $productosHTML .= '<td>' . htmlspecialchars($item['unidad_medida'] ?? '') . '</td>';
    $productosHTML .= '<td>' . number_format((float)($item['cantidad'] ?? 0), 0) . '</td>';
    $productosHTML .= '<td>🖼️ ref</td>';
    $productosHTML .= '</tr>';
}

// ============================================
// 7. CONSTRUIR TABLA DE EMPRESAS/PROVEEDORES
// ============================================
$empresasProveedoresHTML = '';
$totalGeneralEmpresas = 0;
$empresasAcumulador = [];

foreach ($estudio as $item) {
    $entidad = '';
    $tipo = '';
    
    if (!empty($item->empresa) && trim($item->empresa) !== '') {
        $entidad = strtoupper(trim($item->empresa));
        $tipo = 'empresa';
    } elseif (!empty($item->nombre_proveedor) && trim($item->nombre_proveedor) !== '') {
        $entidad = strtoupper(trim($item->nombre_proveedor));
        $entidad = preg_replace('/\s+/', ' ', $entidad);
        $tipo = 'proveedor';
    }
    
    if (empty($entidad)) continue;
    
    $precioUnitario = (float)($item->precio_unitario ?? 0);
    $cantidad = (float)($item->cantidad ?? 0);
    $subtotal = (float)($item->precio_total ?? 0);
    
    // Si no hay precio_total pero hay precio_unitario y cantidad
    if ($subtotal == 0 && $precioUnitario > 0 && $cantidad > 0) {
        $subtotal = $precioUnitario * $cantidad;
    }
    
    $totalConIva = $subtotal * 1.16;
    
    if (!isset($empresasAcumulador[$entidad])) {
        $empresasAcumulador[$entidad] = [
            'nombre' => $entidad,
            'tipo' => $tipo,
            'total' => 0
        ];
    }
    $empresasAcumulador[$entidad]['total'] += $totalConIva;
}

foreach ($empresasAcumulador as $ent) {
    $totalGeneralEmpresas += $ent['total'];
    $empresasProveedoresHTML .= '<tr>';
    $empresasProveedoresHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"><span class="texto-precios-grande">Precios de:</span></td>';
    $empresasProveedoresHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;"><strong>' . htmlspecialchars($ent['nombre']) . '</strong> ' . (strtoupper($ent['tipo']) === 'EMPRESA' ? '(EMPRESA)' : '(PROVEEDOR)') . '</td>';
    $empresasProveedoresHTML .= '<td style="font-family:\'Century Gothic\',sans-serif;">' . formatearDinero($ent['total']) . '</td>';
    $empresasProveedoresHTML .= '</tr>';
}

// ============================================
// 8. CALCULAR ESTIMADO TOTAL
// ============================================
$estimadoTotalTexto = formatearDinero($promedioGeneral) . ' (' . numeroATextoPHP($promedioGeneral) . ')';
?>

<!-- ========================================== -->
<!-- HOJA 1 - CARTA                            -->
<!-- ========================================== -->
<div class="hoja" id="hoja1">
    <div class="contenido-hoja">
        <!-- ENCABEZADO -->
        <div class="encabezado-muni">
            TEMASCALCINGO, ESTADO DE MÉXICO A
            <span class="campo-verde campo-mediano"><?php echo $fechaFormateada; ?></span>
        </div>
        <div class="encabezado-muni">
            COORDINACIÓN DE RECURSOS MATERIALES
        </div>

        <!-- SECCIÓN 1 -->
        <div class="subtitulo-sec">1. DESCRIPCIÓN DE LA CONTRATACIÓN</div>
        <div class="texto">
            Suministro de artículos de
            <span class="campo-verde campo-mediano"><?php echo htmlspecialchars($catalogo); ?></span>
            para las distintas dependencias de la Administración Pública Municipal.
        </div>

        <!-- TABLA DE PRODUCTOS -->
        <table>
            <thead>
                <tr>
                    <th style="width:10%;">No. partida</th>
                    <th style="width:40%;">Descripción</th>
                    <th style="width:12%;">U.M.</th>
                    <th style="width:12%;">Cantidad</th>
                    <th style="width:26%;">Imagen de Referencia</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $productosHTML; ?>
            </tbody>
        </table>

        <div class="texto" style="font-size:9pt; margin-top:4px;">
            *De conformidad con el Anexo Técnico de la solicitud de cotización. Las imágenes de referencia se encuentran en el expediente.
        </div>

        <!-- SECCIÓN 2 -->
        <div class="subtitulo-sec">2. ESTUDIO DE PRECIOS</div>
        <div class="texto">
            Realizando una revisión de precios de mercado ofrecidos por los proveedores
            de artículos de <span class="campo-verde campo-mediano"><?php echo htmlspecialchars($catalogo); ?></span> se encuentran los siguientes resultados:
        </div>

        <!-- TABLA EMPRESA/PROVEEDOR - SIN ENCABEZADOS NI LÍNEAS -->
        <div style="margin: 8px 0;">
            <table class="tabla-empresa-proveedor" style="border:none;border-collapse:collapse;width:65%;">
                <thead style="display:none;">
                    <tr>
                        <th>Concepto</th>
                        <th>Proveedor/Empresa</th>
                        <th>Total (IVA incluido)</th>
                    </tr>
                </thead>
                <tbody style="border:none;">
                    <?php 
                    if (!empty($empresasProveedoresHTML)) {
                        echo $empresasProveedoresHTML;
                    } else {
                        echo '<tr><td colspan="3" style="text-align:center;border:none;">No hay proveedores registrados</td></tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="2" style="text-align:right;font-weight:bold;border:none;"><strong>TOTAL GENERAL</strong></td>
                        <td style="text-align:right;font-weight:bold;border:none;"><strong><?php echo formatearDinero($totalGeneralEmpresas); ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="texto" style="font-size:11pt;">
            <strong>Proveedores o Prestadores de Servicio</strong><br>
            De acuerdo al estudio de mercado, existen proveedores nacionales e inscritos en el Catálogo
            de proveedores de bienes y/o servicios del Municipio de Temascalcingo que cuentan con
            actividad económica y/u objeto social relacionado con el comercio al por menor de
            <span class="campo-verde campo-mediano"><?php echo htmlspecialchars($catalogo); ?></span>.
        </div>

        <!-- SECCIÓN 3 -->
        <div class="subtitulo-sec">3. LUGAR DE ENTREGA DEL BIEN</div>
        <div class="texto">
            Se realizará por parte del proveedor a su cuenta, cargo, riesgo y sin costo
            hasta la recepción de los bienes por parte del Municipio de Temascalcingo y en caso de
            presentar defectos se cambiará el producto en un lapso no mayor a 48 horas.
        </div>

        <!-- NÚMERO DE PÁGINA -->
        <div class="numero-pagina">1 de 2</div>
    </div>
</div>

<!-- ========================================== -->
<!-- HOJA 2 - CARTA (CONTINUACIÓN)             -->
<!-- ========================================== -->
<div class="hoja" id="hoja2">
    <div class="contenido-hoja">
        <!-- SECCIÓN 4 -->
        <div class="subtitulo-sec">4. CONCLUSIONES</div>
        <div class="texto">
            Derivado del análisis de la información, se formulan las siguientes conclusiones:
        </div>
        <ul>
            <li>Existen proveedores dentro del Catálogo de proveedores de bienes y/o servicios del
                Municipio de Temascalcingo que podrían estar interesados en participar en el
                procedimiento.</li>
            <li>Los precios del suministro de <span class="campo-verde campo-mediano"><?php echo htmlspecialchars($catalogo); ?></span> varían acorde al lugar y fecha de su venta.</li>
            <li>El promedio del suministro de <span class="campo-verde campo-mediano"><?php echo htmlspecialchars($catalogo); ?></span> es de acuerdo al siguiente cuadro comparativo:
            </li>
        </ul>

        <!-- DATOS GENERALES -->
        <table class="tabla-info">
            <tr>
                <td><i class="fas fa-building" style="margin-right:4px;"></i>ÁREA USUARIA / SOLICITANTE</td>
                <td><?php echo htmlspecialchars($area); ?></td>
            </tr>
            <tr>
                <td><i class="fas fa-calendar-alt" style="margin-right:4px;"></i>FECHA</td>
                <td><?php echo $fechaFormateada; ?></td>
            </tr>
            <tr>
                <td><i class="fas fa-tag" style="margin-right:4px;"></i>PARTIDA PRESUPUESTAL</td>
                <td><?php echo htmlspecialchars($nombreEstudio); ?></td>
            </tr>
        </table>

        <!-- TABLA DE ESTUDIO -->
        <?php if (!empty($tablaEstudioHTML)): ?>
        <table class="tabla-estudio">
            <thead>
                <tr>
                    <?php echo $theadHTML; ?>
                </tr>
            </thead>
            <tbody>
                <?php echo $tablaEstudioHTML; ?>
            </tbody>
            <tfoot>
                <?php echo $tfootHTML; ?>
            </tfoot>
        </table>
        <?php else: ?>
        <p style="text-align:center;font-family:'Century Gothic',sans-serif;margin:20px 0;">No hay datos disponibles para el cuadro comparativo.</p>
        <?php endif; ?>

        <!-- ESTIMADO -->
        <div class="estimado-box">
            <strong>Estimado a ejercer para el procedimiento:</strong>
            <span class="campo-verde campo-largo"><?php echo $estimadoTotalTexto; ?></span>
        </div>

        <div class="texto" style="font-size:11pt;">
            <strong>Modalidad adquisitiva propuesta:</strong> Derivado de lo anterior, el
            procedimiento deberá realizarse a través de una Licitación Pública Nacional Presencial, toda
            vez que existe en el Catálogo de Proveedores personas con actividades económicas o con
            objeto social relacionado con la adquisición de los bienes.
        </div>

        <!-- FIRMAS -->
        <div class="fila-firma">
            <div class="col-firma">
                <div class="linea-firma">
                    <span class="campo-verde campo-mediano" style="font-size:11pt;"><?php echo htmlspecialchars($coordinador); ?></span>
                </div>
                <div><?php echo htmlspecialchars($area); ?></div>
            </div>
            <div class="col-firma">
                <div class="linea-firma">
                    <span class="campo-verde campo-mediano" style="font-size:11pt;">C. MIRIAM VIANEY OVANDO RUBIO</span>
                </div>
                <div>DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL</div>
            </div>
        </div>

        <!-- NÚMERO DE PÁGINA -->
        <div class="numero-pagina">2 de 2</div>
    </div>
</div>

</body>
</html>