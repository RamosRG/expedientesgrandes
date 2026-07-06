<?php
function formatearFechaEspanol($fechaString) {
    if (empty($fechaString)) return '';
    
    $fecha = new DateTime($fechaString);
    $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
    
    return $fecha->format('d') . ' DE ' . $meses[$fecha->format('n') - 1] . ' DE ' . $fecha->format('Y');
}

function numeroALetrasEstudioMerca($numero) {
    $numero = intval($numero);
    if ($numero === 0) return 'CERO';
    
    $unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
    $especiales = [
        10 => 'DIEZ', 11 => 'ONCE', 12 => 'DOCE', 13 => 'TRECE', 14 => 'CATORCE', 15 => 'QUINCE',
        16 => 'DIECISÉIS', 17 => 'DIECISIETE', 18 => 'DIECIOCHO', 19 => 'DIECINUEVE',
        20 => 'VEINTE', 30 => 'TREINTA', 40 => 'CUARENTA', 50 => 'CINCUENTA',
        60 => 'SESENTA', 70 => 'SETENTA', 80 => 'OCHENTA', 90 => 'NOVENTA'
    ];
    $centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 
                 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
    
    if ($numero < 10) return $unidades[$numero];
    if (isset($especiales[$numero])) return $especiales[$numero];
    if ($numero < 30) {
        return 'VEINTI' . $unidades[$numero - 20];
    }
    if ($numero < 100) {
        $decena = floor($numero / 10) * 10;
        $unidad = $numero % 10;
        return $unidad === 0 ? $especiales[$decena] : $especiales[$decena] . ' Y ' . $unidades[$unidad];
    }
    if ($numero < 1000) {
        $centena = floor($numero / 100);
        $resto = $numero % 100;
        if ($centena === 1 && $resto === 0) return 'CIEN';
        if ($centena === 1) return 'CIENTO ' . numeroALetrasEstudioMerca($resto);
        return $unidades[$centena] . 'CIENTOS ' . numeroALetrasEstudioMerca($resto);
    }
    if ($numero < 1000000) {
        $miles = floor($numero / 1000);
        $resto = $numero % 1000;
        if ($miles === 1) {
            return $resto === 0 ? 'MIL' : 'MIL ' . numeroALetrasEstudioMerca($resto);
        }
        return numeroALetrasEstudioMerca($miles) . ' MIL ' . numeroALetrasEstudioMerca($resto);
    }
    if ($numero < 1000000000) {
        $millones = floor($numero / 1000000);
        $resto = $numero % 1000000;
        if ($millones === 1) {
            return $resto === 0 ? 'UN MILLÓN' : 'UN MILLÓN ' . numeroALetrasEstudioMerca($resto);
        }
        return numeroALetrasEstudioMerca($millones) . ' MILLONES ' . numeroALetrasEstudioMerca($resto);
    }
    return $numero;
}
?>
<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Estudio de Mercado · Suministro Papelería Municipal</title>
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
        /* ============================================ */
        /* RESET Y BASE                                 */
        /* ============================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: white;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            padding: 0;
            margin: 0;
            color: #1a2c3e;
        }

        /* ============================================ */
        /* HOJA CARTA - TAMAÑO 8.5" x 11"              */
        /* Márgenes: Top: 2.5cm, Right: 3cm, Bottom: 2.5cm, Left: 3cm */
        /* ============================================ */
        .hoja {
            width: 21.6cm;
            min-height: 27.9cm;
            background: white;
            padding: 2.5cm 3cm 2.5cm 3cm;
            margin: 0 auto;
            position: relative;
            page-break-after: always;
        }

        .hoja:last-child {
            page-break-after: auto;
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

        .titulo-principal {
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            margin: 6px 0 4px;
            text-transform: uppercase;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
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
            border-bottom: 1.5px solid #2c7a4d;
            min-width: 120px;
            padding: 0px 6px;
            font-weight: 600;
            color: #14532d;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            font-size: 12pt;
        }

        .campo-corto {
            min-width: 70px;
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
        #tablaEmpresaProveedor,
        #tablaEmpresaProveedor th,
        #tablaEmpresaProveedor td,
        #tablaEmpresaProveedor tbody,
        #tablaEmpresaProveedor thead,
        #tablaEmpresaProveedor tfoot,
        #tablaEmpresaProveedor tr {
            border: none !important;
            border-collapse: collapse !important;
        }

        #tablaEmpresaProveedor thead,
        #tablaEmpresaProveedor tfoot {
            display: none !important;
        }

        #tablaEmpresaProveedor td {
            padding: 4px 8px;
            text-align: left !important;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
            font-size: 12pt;
            border: none !important;
        }

        #tablaEmpresaProveedor td:first-child {
            width: 25%;
        }

        #tablaEmpresaProveedor td:nth-child(2) {
            width: 45%;
        }

        #tablaEmpresaProveedor td:last-child {
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
        #tablaEstudio {
            font-size: 9pt;
        }

        #tablaEstudio th,
        #tablaEstudio td {
            padding: 3px 4px;
            font-size: 9pt;
        }

        #tablaEstudio th {
            font-size: 8.5pt;
        }

        /* ============================================ */
        /* FIRMAS Y PIE DE PÁGINA                       */
        /* ============================================ */
        .numero-pagina {
            text-align: right;
            margin-top: 25px;
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
                padding: 2.5cm 3cm 2.5cm 3cm !important;
                page-break-after: always;
                width: 100%;
                min-height: 100vh;
            }

            .hoja:last-child {
                page-break-after: avoid;
            }

            .campo-verde {
                background: transparent !important;
                border-bottom: 1.5px solid #000 !important;
            }
        }
    </style>
</head>
<body>

<!-- ========================================== -->
<!-- HOJA 1 - CARTA                            -->
<!-- ========================================== -->
<div class="hoja" id="hoja1">
    <div class="contenido-hoja">
        <!-- ENCABEZADO -->
        <div class="encabezado-muni">
            TEMASCALCINGO, ESTADO DE MÉXICO A
            <span class="campo-verde campo-mediano">
                <?= isset($data[0]['created_at']) ? formatearFechaEspanol($data[0]['created_at']) : '' ?>
            </span>
        </div>
        <div class="encabezado-muni">
            COORDINACIÓN DE RECURSOS MATERIALES
        </div>

        <!-- SECCIÓN 1 -->
        <div class="subtitulo-sec">1. DESCRIPCIÓN DE LA CONTRATACIÓN</div>
        <div class="texto">
            Suministro de artículos de
            <span class="campo-verde campo-mediano"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span>
            para las distintas dependencias de la Administración Pública Municipal.
        </div>

        <!-- TABLA DE PRODUCTOS -->
        <table id="tablaProductos">
            <thead>
                <tr>
                    <th style="width:10%;">No. partida</th>
                    <th style="width:40%;">Descripción</th>
                    <th style="width:12%;">U.M.</th>
                    <th style="width:12%;">Cantidad</th>
                    <th style="width:26%;">Imagen de Referencia</th>
                </tr>
            </thead>
            <tbody id="tbodyProductos">
                <?php 
                $contador = 1;
                if (!empty($data)):
                    foreach ($data as $item):
                ?>
                <tr>
                    <td><?= isset($item['partida']) ? esc($item['partida']) : $contador++ ?></td>
                    <td><?= isset($item['descripcion']) ? esc($item['descripcion']) : '' ?></td>
                    <td><?= isset($item['unidad_medida']) ? esc($item['unidad_medida']) : '' ?></td>
                    <td><?= isset($item['cantidad']) ? esc($item['cantidad']) : '' ?></td>
                    <td>🖼️ ref</td>
                </tr>
                <?php 
                    endforeach;
                endif; 
                ?>
            </tbody>
        </table>

        <div class="texto" style="font-size:9pt; margin-top:4px;">
            *De conformidad con el Anexo Técnico de la solicitud de cotización. Las imágenes de referencia se encuentran en el expediente.
        </div>

        <!-- SECCIÓN 2 -->
        <div class="subtitulo-sec">2. ESTUDIO DE PRECIOS</div>
        <div class="texto">
            Realizando una revisión de precios de mercado ofrecidos por los proveedores
            de artículos de <span class="campo-verde campo-mediano"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span> se encuentran los siguientes resultados:
        </div>

        <!-- TABLA EMPRESA/PROVEEDOR - SIN ENCABEZADOS NI LÍNEAS -->
        <div style="margin: 8px 0;">
            <table id="tablaEmpresaProveedor" style="border:none;border-collapse:collapse;width:65%;">
                <thead style="display:none;">
                    <tr>
                        <th>Concepto</th>
                        <th>Proveedor/Empresa</th>
                        <th>Total (IVA incluido)</th>
                    </tr>
                </thead>
                <tbody id="tbodyEmpresaProveedor" style="border:none;">
                    <?php
                    // Agrupar por proveedor/empresa
                    $acumulador = [];
                    if (!empty($data)):
                        foreach ($data as $item):
                            $entidad = null;
                            $tipo = null;

                            if (isset($item['empresa']) && !empty($item['empresa'])) {
                                $entidad = strtoupper(trim($item['empresa']));
                                $tipo = "empresa";
                            } else if (isset($item['nombre']) && !empty($item['nombre'])) {
                                $nombre_completo = trim(
                                    (isset($item['nombre']) ? $item['nombre'] : '') . ' ' .
                                    (isset($item['apellido_paterno']) ? $item['apellido_paterno'] : '') . ' ' .
                                    (isset($item['apellidoM']) ? $item['apellidoM'] : '')
                                );
                                $entidad = strtoupper($nombre_completo);
                                $tipo = "proveedor";
                            }

                            if (!$entidad) continue;

                            $subtotal = isset($item['precio_total']) ? floatval($item['precio_total']) : 0;
                            $totalConIva = $subtotal * 1.16;

                            if (!isset($acumulador[$entidad])) {
                                $acumulador[$entidad] = [
                                    'nombre' => $entidad,
                                    'tipo' => $tipo,
                                    'total' => 0
                                ];
                            }
                            $acumulador[$entidad]['total'] += $totalConIva;
                        endforeach;
                    endif;

                    $totalGeneral = 0;
                    foreach ($acumulador as $ent):
                        $totalGeneral += $ent['total'];
                    ?>
                    <tr>
                        <td style="font-family:'Century Gothic',sans-serif;"><span class="texto-precios-grande">Precios de:</span></td>
                        <td style="font-family:'Century Gothic',sans-serif;"><strong><?= esc($ent['nombre']) ?></strong> <?= $ent['tipo'] === "empresa" ? "(EMPRESA)" : "(PROVEEDOR)" ?></td>
                        <td style="font-family:'Century Gothic',sans-serif;">$<?= number_format($ent['total'], 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot style="display:none;">
                    <tr>
                        <td colspan="2"><strong>TOTAL GENERAL</strong></td>
                        <td id="totalGeneralEmpresaProveedor"><strong>$<?= number_format($totalGeneral, 2) ?></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="texto" style="font-size:11pt;">
            <strong>Proveedores o Prestadores de Servicio</strong><br>
            De acuerdo al estudio de mercado, existen proveedores nacionales e inscritos en el Catálogo
            de proveedores de bienes y/o servicios del Municipio de Temascalcingo que cuentan con
            actividad económica y/u objeto social relacionado con el comercio al por menor de
            <span class="campo-verde campo-mediano"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span>.
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
            <li>Los precios del suministro de <span class="campo-verde campo-mediano"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span> varían acorde al lugar y fecha de su venta.</li>
            <li>El promedio del suministro de <span class="campo-verde campo-mediano"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span> es de acuerdo al siguiente cuadro comparativo:
            </li>
        </ul>

        <!-- DATOS GENERALES -->
        <table class="tabla-info">
            <tr>
                <td><i class="fas fa-building" style="margin-right:4px;"></i>ÁREA USUARIA / SOLICITANTE</td>
                <td><?= isset($data[0]['area']) ? esc($data[0]['area']) : '' ?></td>
            </tr>
            <tr>
                <td><i class="fas fa-calendar-alt" style="margin-right:4px;"></i>FECHA</td>
                <td><?= isset($data[0]['created_at']) ? formatearFechaEspanol($data[0]['created_at']) : '' ?></td>
            </tr>
            <tr>
                <td><i class="fas fa-tag" style="margin-right:4px;"></i>PARTIDA PRESUPUESTAL</td>
                <td><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></td>
            </tr>
        </table>

        <!-- TABLA DE ESTUDIO - Cuadro Comparativo -->
        <?php
        // Agrupar por descripción y proveedor
        $agrupado = [];
        $proveedoresSet = [];

        if (!empty($data)):
            foreach ($data as $item):
                $idDesc = isset($item['id_descripcion']) ? $item['id_descripcion'] : md5($item['descripcion'] ?? '');
                $nombre_completo = trim(
                    (isset($item['nombre']) ? $item['nombre'] : '') . ' ' .
                    (isset($item['apellido_paterno']) ? $item['apellido_paterno'] : '') . ' ' .
                    (isset($item['apellidoM']) ? $item['apellidoM'] : '')
                );
                $proveedor = !empty($nombre_completo) ? strtoupper($nombre_completo) : null;

                if ($proveedor) $proveedoresSet[] = $proveedor;

                if (!isset($agrupado[$idDesc])) {
                    $agrupado[$idDesc] = [
                        'partida' => isset($item['partida']) ? $item['partida'] : '',
                        'descripcion' => isset($item['descripcion']) ? $item['descripcion'] : '',
                        'unidad' => isset($item['unidad_medida']) ? $item['unidad_medida'] : '',
                        'cantidad' => isset($item['cantidad']) ? floatval($item['cantidad']) : 0,
                        'proveedores' => []
                    ];
                }

                if ($proveedor) {
                    $agrupado[$idDesc]['proveedores'][$proveedor] = [
                        'precio' => isset($item['precio_unitario']) ? floatval($item['precio_unitario']) : 0,
                        'total' => isset($item['precio_total']) ? floatval($item['precio_total']) : 0,
                        'marca_modelo' => isset($item['marca_modelo']) ? $item['marca_modelo'] : '—'
                    ];
                }
            endforeach;
        endif;

        $proveedores = array_unique($proveedoresSet);
        $totalesPorProveedor = [];
        foreach ($proveedores as $p) {
            $totalesPorProveedor[$p] = 0;
        }
        ?>

        <table id="tablaEstudio">
            <thead>
                <tr>
                    <th style="width:7%;font-family:'Century Gothic',sans-serif;">PARTIDA</th>
                    <th style="width:22%;font-family:'Century Gothic',sans-serif;">DESCRIPCIÓN</th>
                    <th style="width:8%;font-family:'Century Gothic',sans-serif;">UNIDAD</th>
                    <th style="width:8%;font-family:'Century Gothic',sans-serif;">CANTIDAD</th>
                    <?php foreach ($proveedores as $p): ?>
                        <th colspan="3" style="font-family:'Century Gothic',sans-serif;"><?= esc($p) ?></th>
                    <?php endforeach; ?>
                    <th style="width:8%;font-family:'Century Gothic',sans-serif;">PROMEDIO TOTAL</th>
                </tr>
                <tr>
                    <th colspan="4" style="background:transparent;"></th>
                    <?php foreach ($proveedores as $p): ?>
                        <th style="font-size:7pt;background:#e8ecf0;">PRECIO</th>
                        <th style="font-size:7pt;background:#e8ecf0;">TOTAL</th>
                        <th style="font-size:7pt;background:#e8ecf0;">MARCA</th>
                    <?php endforeach; ?>
                    <th style="background:transparent;"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sumaTotales = 0;
                foreach ($agrupado as $item):
                    $sumaFilas = 0;
                    $conteo = 0;
                ?>
                <tr>
                    <td style="font-family:'Century Gothic',sans-serif;"><?= $item['partida'] ?></td>
                    <td style="text-align:left;font-family:'Century Gothic',sans-serif;"><?= esc($item['descripcion']) ?></td>
                    <td style="font-family:'Century Gothic',sans-serif;"><?= esc($item['unidad']) ?></td>
                    <td style="font-family:'Century Gothic',sans-serif;"><?= $item['cantidad'] ?></td>
                    <?php foreach ($proveedores as $p): 
                        $datos = isset($item['proveedores'][$p]) ? $item['proveedores'][$p] : null;
                        if ($datos):
                            $precio = $datos['precio'];
                            $total = $datos['total'] > 0 ? $datos['total'] : $precio * $item['cantidad'];
                            $totalesPorProveedor[$p] += $total;
                            $sumaFilas += $total;
                            $conteo++;
                    ?>
                        <td style="font-family:'Century Gothic',sans-serif;">$<?= number_format($precio, 2) ?></td>
                        <td style="font-family:'Century Gothic',sans-serif;">$<?= number_format($total, 2) ?></td>
                        <td style="font-family:'Century Gothic',sans-serif;"><?= esc($datos['marca_modelo']) ?></td>
                    <?php else: ?>
                        <td style="font-family:'Century Gothic',sans-serif;">—</td>
                        <td style="font-family:'Century Gothic',sans-serif;">—</td>
                        <td style="font-family:'Century Gothic',sans-serif;">—</td>
                    <?php endif; endforeach; ?>
                    <td style="font-family:'Century Gothic',sans-serif;"><strong>$<?= number_format($conteo > 0 ? $sumaFilas / $conteo : 0, 2) ?></strong></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <?php 
                $colSpanFijo = 4;
                $promedioGeneral = 0;
                ?>
                <tr class="tfoot-subtotal">
                    <th colspan="<?= $colSpanFijo ?>" style="font-family:'Century Gothic',sans-serif;">SUBTOTAL</th>
                    <?php foreach ($proveedores as $p): 
                        $sub = $totalesPorProveedor[$p];
                    ?>
                        <td style="font-family:'Century Gothic',sans-serif;"></td>
                        <td style="font-family:'Century Gothic',sans-serif;"><strong>$<?= number_format($sub, 2) ?></strong></td>
                        <td style="font-family:'Century Gothic',sans-serif;"></td>
                    <?php endforeach; ?>
                    <td style="font-family:'Century Gothic',sans-serif;"></td>
                </tr>
                <tr class="tfoot-iva">
                    <th colspan="<?= $colSpanFijo ?>" style="font-family:'Century Gothic',sans-serif;">IVA (16%)</th>
                    <?php foreach ($proveedores as $p): 
                        $iva = $totalesPorProveedor[$p] * 0.16;
                    ?>
                        <td style="font-family:'Century Gothic',sans-serif;"></td>
                        <td style="font-family:'Century Gothic',sans-serif;">$<?= number_format($iva, 2) ?></td>
                        <td style="font-family:'Century Gothic',sans-serif;"></td>
                    <?php endforeach; ?>
                    <td style="font-family:'Century Gothic',sans-serif;"></td>
                </tr>
                <tr class="tfoot-total">
                    <th colspan="<?= $colSpanFijo ?>" style="font-family:'Century Gothic',sans-serif;">TOTAL</th>
                    <?php 
                    $sumaTotales = 0;
                    foreach ($proveedores as $p): 
                        $totalProveedor = $totalesPorProveedor[$p] * 1.16;
                        $sumaTotales += $totalProveedor;
                    ?>
                        <td style="font-family:'Century Gothic',sans-serif;"></td>
                        <td style="font-family:'Century Gothic',sans-serif;"><strong>$<?= number_format($totalProveedor, 2) ?></strong></td>
                        <td style="font-family:'Century Gothic',sans-serif;"></td>
                    <?php endforeach; 
                    $promedioGeneral = count($proveedores) > 0 ? $sumaTotales / count($proveedores) : 0;
                    ?>
                    <td style="font-family:'Century Gothic',sans-serif;"><strong>$<?= number_format($promedioGeneral, 2) ?></strong></td>
                </tr>
            </tfoot>
        </table>

        <!-- ESTIMADO -->
        <div class="estimado-box">
            <strong>Estimado a ejercer para el procedimiento:</strong>
            <span class="campo-verde campo-largo">$ <?= number_format($promedioGeneral, 2) ?> 
            (<?= strtoupper(numeroALetrasEstudioMerca(round($promedioGeneral))) ?> PESOS 00/100 M.N.)</span>
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
                    <span class="campo-verde campo-mediano" style="font-size:11pt;">
                        <?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?>
                    </span>
                </div>
                <div>COORDINADOR DE <span class="campo-verde campo-mediano" style="font-size:11pt;">
                    <?= isset($data[0]['area']) ? esc($data[0]['area']) : '' ?>
                </span></div>
            </div>
            <div class="col-firma">
                <div class="linea-firma">
                    <span class="campo-verde campo-mediano" style="font-size:11pt;">
                        C. MIRIAM VIANEY OVANDO RUBIO
                    </span>
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