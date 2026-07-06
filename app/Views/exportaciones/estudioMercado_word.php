<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Estudio de Mercado</title>
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
            size: 21.59cm 27.94cm;
            margin: 2.54cm 2.54cm 2.54cm 2.54cm;
        }

        body {
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 10pt;
            line-height: 1.5;
            color: #000000;
            background: white;
            margin: 0;
            padding: 0;
        }

        .hoja {
            width: 21.59cm;
            min-height: 27.94cm;
            padding: 2.54cm 2.54cm 2.54cm 2.54cm;
            margin: 0 auto;
            background: white;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 10pt;
            line-height: 1.5;
            color: #000000;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
        }

        /* TÍTULOS */
        .titulo-principal {
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            text-transform: uppercase;
            margin-bottom: 20px;
            color: #4a0b1c;
        }

        .subtitulo {
            text-align: center;
            font-weight: bold;
            font-size: 12pt;
            text-transform: uppercase;
            margin-bottom: 25px;
            border-bottom: 2px solid #4a0b1c;
            padding-bottom: 10px;
        }

        /* DATOS GENERALES */
        .tabla-info {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 10pt;
        }

        .tabla-info td {
            border: 1px solid #000000;
            padding: 8px 12px;
            text-align: left;
        }

        .tabla-info .etiqueta {
            background: #f3e8ec;
            font-weight: bold;
            width: 30%;
            color: #4a0b1c;
        }

        .tabla-info .valor {
            width: 70%;
        }

        /* TABLA PRINCIPAL */
        .tabla-estudio {
            width: 100%;
            border-collapse: collapse;
            font-size: 8pt;
            margin-top: 10px;
        }

        .tabla-estudio th {
            background: #4a0b1c;
            color: white;
            padding: 6px 5px;
            border: 1px solid #3d0a18;
            text-align: center;
            font-weight: bold;
            font-size: 7.5pt;
            text-transform: uppercase;
        }

        .tabla-estudio td {
            border: 1px solid #000000;
            padding: 5px 4px;
            text-align: center;
            vertical-align: middle;
        }

        .tabla-estudio tbody tr:nth-child(even) td {
            background: #fdf5f7;
        }

        .tabla-estudio tbody td:first-child {
            font-weight: bold;
        }

        .tabla-estudio .descripcion {
            text-align: left;
            font-size: 7.5pt;
        }

        /* TFOOT */
        .tabla-estudio tfoot th {
            background: #3d0a18;
            font-size: 8pt;
            text-align: left;
            padding-left: 10px;
        }

        .tabla-estudio tfoot td {
            background: #fff8f9;
            font-size: 8pt;
        }

        .tabla-estudio tfoot .fila-total th,
        .tabla-estudio tfoot .fila-total td {
            background: #4a0b1c;
            color: white;
            font-weight: bold;
        }

        .tabla-estudio tfoot .fila-iva th,
        .tabla-estudio tfoot .fila-iva td {
            background: #f9eff2;
            color: #4a0b1c;
        }

        .tabla-estudio .moneda {
            text-align: right;
            padding-right: 8px;
        }

        /* NÚMERO DE PÁGINA */
        .numero-pagina {
            text-align: right;
            margin-top: 30px;
            font-size: 8pt;
            font-weight: bold;
        }

        /* FIRMAS */
        .firma-contenedor {
            width: 100%;
            margin-top: 50px;
        }

        .firma-item {
            width: 50%;
            text-align: center;
            vertical-align: top;
            padding: 0 10px;
        }

        .firma-linea {
            border-top: 1px solid #000000;
            width: 70%;
            margin: 40px auto 0 auto;
        }

        .firma-texto {
            margin-top: 8px;
            font-weight: normal;
            font-size: 9pt;
        }

        .firma-area {
            margin-top: 3px;
            font-weight: normal;
            font-size: 8pt;
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
                padding: 2.54cm 2.54cm 2.54cm 2.54cm !important;
            }
        }
    </style>
</head>
<body>
    <?php
    // Función auxiliar para formatear dinero
    function formatDineroWord($valor) {
        return '$' . number_format(floatval($valor), 2, '.', ',');
    }

    // Función para obtener el nombre completo del proveedor
    function obtenerNombreProveedorWord($item) {
        $nombre = '';
        if (isset($item['nombre']) && !empty($item['nombre'])) {
            $nombre = $item['nombre'];
            if (isset($item['apellido_paterno']) && !empty($item['apellido_paterno'])) {
                $nombre .= ' ' . $item['apellido_paterno'];
            }
            if (isset($item['apellidoM']) && !empty($item['apellidoM'])) {
                $nombre .= ' ' . $item['apellidoM'];
            }
        }
        return strtoupper(trim($nombre));
    }

    // Procesar datos para agrupar por descripción
    $agrupado = [];
    $proveedoresSet = [];

    if (!empty($data)) {
        foreach ($data as $item) {
            $idDesc = isset($item['id_descripcion']) ? $item['id_descripcion'] : 'desc_' . uniqid();
            $proveedor = obtenerNombreProveedorWord($item);
            
            if (!empty($proveedor)) {
                $proveedoresSet[] = $proveedor;
            }

            if (!isset($agrupado[$idDesc])) {
                $agrupado[$idDesc] = [
                    'partida' => isset($item['partida']) ? $item['partida'] : '',
                    'descripcion' => isset($item['descripcion']) ? $item['descripcion'] : '',
                    'unidad' => isset($item['unidad_medida']) ? $item['unidad_medida'] : '',
                    'cantidad' => isset($item['cantidad']) ? floatval($item['cantidad']) : 0,
                    'proveedores' => []
                ];
            }

            if (!empty($proveedor)) {
                $agrupado[$idDesc]['proveedores'][$proveedor] = [
                    'precio' => isset($item['precio_unitario']) ? floatval($item['precio_unitario']) : 0,
                    'total' => isset($item['precio_total']) ? floatval($item['precio_total']) : 0,
                    'marca_modelo' => isset($item['marca_modelo']) ? $item['marca_modelo'] : '—'
                ];
            }
        }
    }

    // Lista única de proveedores
    $proveedores = array_unique($proveedoresSet);

    // Calcular totales por proveedor
    $totalesPorProveedor = [];
    foreach ($proveedores as $p) {
        $totalesPorProveedor[$p] = 0;
    }

    foreach ($agrupado as $item) {
        foreach ($proveedores as $p) {
            if (isset($item['proveedores'][$p])) {
                $datos = $item['proveedores'][$p];
                $total = $datos['total'] > 0 ? $datos['total'] : $datos['precio'] * $item['cantidad'];
                $totalesPorProveedor[$p] += $total;
            }
        }
    }

    // Obtener datos generales del primer registro
    $primerRegistro = !empty($data) ? $data[0] : [];
    $area = isset($primerRegistro['area']) ? $primerRegistro['area'] : '';
    $nombreEstudio = isset($primerRegistro['nombre_estudio']) ? $primerRegistro['nombre_estudio'] : '';
    $fecha = isset($primerRegistro['created_at']) ? date('d/m/Y', strtotime($primerRegistro['created_at'])) : '';
    ?>

    <div class="hoja">
        <div class="contenido-hoja">
            <!-- TÍTULO PRINCIPAL -->
            <div class="titulo-principal">
                ESTUDIO DE MERCADO
            </div>

            <!-- SUBTÍTULO -->
            <div class="subtitulo">
                ANÁLISIS DE PRECIOS Y PROVEEDORES
            </div>

            <!-- DATOS GENERALES -->
            <table class="tabla-info">
                <tr>
                    <td class="etiqueta">ÁREA USUARIA / SOLICITANTE</td>
                    <td class="valor"><?= esc($area) ?></td>
                </tr>
                <tr>
                    <td class="etiqueta">FECHA</td>
                    <td class="valor"><?= esc($fecha) ?></td>
                </tr>
                <tr>
                    <td class="etiqueta">PARTIDA PRESUPUESTAL / ESTUDIO</td>
                    <td class="valor"><?= esc($nombreEstudio) ?></td>
                </tr>
            </table>

            <!-- TABLA PRINCIPAL -->
            <table class="tabla-estudio">
                <thead>
                    <tr>
                        <th rowspan="3">PARTIDA</th>
                        <th rowspan="3">DESCRIPCIÓN</th>
                        <th rowspan="3">UNIDAD</th>
                        <th rowspan="3">CANTIDAD</th>
                        <?php foreach ($proveedores as $p): ?>
                            <th colspan="3"><?= esc($p) ?></th>
                        <?php endforeach; ?>
                        <th rowspan="3">PROMEDIO TOTAL</th>
                    </tr>
                    <tr>
                        <?php foreach ($proveedores as $p): ?>
                            <th colspan="3">PRECIOS</th>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <?php foreach ($proveedores as $p): ?>
                            <th>UNITARIO</th>
                            <th>TOTAL</th>
                            <th>MARCA / MODELO</th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agrupado as $item): ?>
                        <?php 
                        $sumaFilas = 0;
                        $conteo = 0;
                        ?>
                        <tr>
                            <td><?= esc($item['partida']) ?></td>
                            <td class="descripcion"><?= esc($item['descripcion']) ?></td>
                            <td><?= esc($item['unidad']) ?></td>
                            <td><?= $item['cantidad'] ?></td>
                            <?php foreach ($proveedores as $p): ?>
                                <?php if (isset($item['proveedores'][$p])): ?>
                                    <?php 
                                    $datos = $item['proveedores'][$p];
                                    $total = $datos['total'] > 0 ? $datos['total'] : $datos['precio'] * $item['cantidad'];
                                    $sumaFilas += $total;
                                    $conteo++;
                                    ?>
                                    <td class="moneda"><?= formatDineroWord($datos['precio']) ?></td>
                                    <td class="moneda"><?= formatDineroWord($total) ?></td>
                                    <td><?= esc($datos['marca_modelo']) ?></td>
                                <?php else: ?>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td class="moneda"><strong><?= $conteo > 0 ? formatDineroWord($sumaFilas / $conteo) : '—' ?></strong></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <!-- SUBTOTAL -->
                    <tr>
                        <th colspan="4">SUBTOTAL</th>
                        <?php foreach ($proveedores as $p): ?>
                            <td></td>
                            <td class="moneda"><strong><?= formatDineroWord($totalesPorProveedor[$p]) ?></strong></td>
                            <td></td>
                        <?php endforeach; ?>
                        <td></td>
                    </tr>
                    <!-- IVA -->
                    <tr class="fila-iva">
                        <th colspan="4">IVA (16%)</th>
                        <?php foreach ($proveedores as $p): ?>
                            <td></td>
                            <td class="moneda"><?= formatDineroWord($totalesPorProveedor[$p] * 0.16) ?></td>
                            <td></td>
                        <?php endforeach; ?>
                        <td></td>
                    </tr>
                    <!-- TOTAL -->
                    <tr class="fila-total">
                        <th colspan="4">TOTAL</th>
                        <?php 
                        $sumaTotales = 0;
                        foreach ($proveedores as $p): 
                            $totalProveedor = $totalesPorProveedor[$p] * 1.16;
                            $sumaTotales += $totalProveedor;
                        ?>
                            <td></td>
                            <td class="moneda"><strong><?= formatDineroWord($totalProveedor) ?></strong></td>
                            <td></td>
                        <?php endforeach; ?>
                        <td class="moneda"><strong><?= !empty($proveedores) ? formatDineroWord($sumaTotales / count($proveedores)) : '—' ?></strong></td>
                    </tr>
                </tfoot>
            </table>

            <!-- FIRMAS -->
            <table class="firma-contenedor" style="width:100%;border-collapse:collapse;">
                <tr>
                    <td class="firma-item" style="width:50%;text-align:center;vertical-align:top;padding:0 10px;">
                        <div><strong>ELABORÓ</strong></div>
                        <div class="firma-linea"></div>
                        <div class="firma-texto">
                            <?= isset($primerRegistro['coordinador']) ? esc($primerRegistro['coordinador']) : '' ?>
                        </div>
                        <div class="firma-area">
                            <?= esc($area) ?>
                        </div>
                    </td>
                    <td class="firma-item" style="width:50%;text-align:center;vertical-align:top;padding:0 10px;">
                        <div><strong>AUTORIZÓ</strong></div>
                        <div class="firma-linea"></div>
                        <div class="firma-texto">
                            C. MIRIAM VIANEY OVANDO RUBIO
                        </div>
                        <div class="firma-area">
                            DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
                        </div>
                    </td>
                </tr>
            </table>

            <!-- NÚMERO DE PÁGINA -->
            <div class="numero-pagina">
                1 DE 1
            </div>
        </div>
    </div>
</body>
</html>