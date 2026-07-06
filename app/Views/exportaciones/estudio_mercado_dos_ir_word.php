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
        @page {
            size: 21.6cm 27.9cm;
            margin: 2.5cm 3cm 2.5cm 3cm;
        }

        body {
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000000;
            background: white;
            margin: 0;
            padding: 0;
        }

        .hoja {
            width: 21.6cm;
            min-height: 27.9cm;
            padding: 2.5cm 3cm 2.5cm 3cm;
            margin: 0 auto;
            background: white;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 12pt;
            line-height: 1.5;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            color: #000000;
        }

        .encabezado-muni {
            text-align: right;
            font-size: 12pt;
            font-weight: normal;
            text-transform: uppercase;
            line-height: 1.4;
        }

        .titulo-principal {
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            margin: 6px 0 4px;
            text-transform: uppercase;
        }

        .subtitulo-sec {
            text-align: left;
            font-weight: bold;
            font-size: 13pt;
            margin: 14px 0 8px 0;
            text-transform: uppercase;
        }

        .texto {
            margin-bottom: 8px;
            text-align: justify;
            font-size: 12pt;
            line-height: 1.5;
        }

        .texto strong {
            font-weight: bold;
        }

        .campo-verde {
            display: inline-block;
            border-bottom: 1.5px solid #2c7a4d;
            min-width: 120px;
            padding: 0px 6px;
            font-weight: 600;
            color: #14532d;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 8px 0;
            font-size: 10pt;
        }

        table th,
        table td {
            border: 1px solid #000000;
            padding: 4px 5px;
            vertical-align: middle;
        }

        table th {
            background: #f0f4f8;
            text-align: center;
            font-weight: bold;
            font-size: 10pt;
        }

        table td {
            font-size: 10pt;
        }

        .numero-pagina {
            text-align: right;
            font-size: 10pt;
            font-weight: bold;
            margin-top: 30px;
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
        }

        ul {
            font-size: 12pt;
            margin-bottom: 8px;
            margin-left: 25px;
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
            line-height: 1.5;
        }

        .estimado-box strong {
            font-weight: bold;
        }

        /* Tabla sin bordes para empresa/proveedor */
        .tabla-precios {
            width: 100%;
            border-collapse: collapse;
            margin: 8px 0;
        }

        .tabla-precios td {
            border: none !important;
            padding: 4px 8px;
            text-align: left;
            font-size: 12pt;
        }

        .tabla-precios td:first-child {
            width: 25%;
        }

        .tabla-precios td:nth-child(2) {
            width: 45%;
        }

        .tabla-precios td:last-child {
            width: 30%;
            text-align: right;
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
                padding: 2.5cm 3cm 2.5cm 3cm !important;
            }
        }
    </style>
</head>
<body>

<!-- ========================================== -->
<!-- HOJA 1                                     -->
<!-- ========================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <!-- ENCABEZADO -->
        <div class="encabezado-muni">
            TEMASCALCINGO, ESTADO DE MÉXICO A
            <?php 
            if (!empty($data) && isset($data[0]['created_at'])) {
                $fecha = new DateTime($data[0]['created_at']);
                echo $fecha->format('d/m/Y');
            }
            ?>
        </div>
        <div class="encabezado-muni">
            COORDINACIÓN DE RECURSOS MATERIALES
        </div>

        <!-- SECCIÓN 1 -->
        <div class="subtitulo-sec">1. DESCRIPCIÓN DE LA CONTRATACIÓN</div>
        <div class="texto">
            Suministro de artículos de <strong><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></strong>
            para las distintas dependencias de la Administración Pública Municipal.
        </div>

        <!-- TABLA DE PRODUCTOS -->
        <?php if (!empty($data)): ?>
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
                <?php 
                foreach ($data as $item):
                    if (empty($item['descripcion'])) continue;
                ?>
                <tr>
                    <td style="text-align:center;"><?= isset($item['partida']) ? esc($item['partida']) : '' ?></td>
                    <td><?= isset($item['descripcion']) ? esc($item['descripcion']) : '' ?></td>
                    <td><?= isset($item['unidad_medida']) ? esc($item['unidad_medida']) : '' ?></td>
                    <td style="text-align:center;"><?= isset($item['cantidad']) ? number_format(floatval($item['cantidad']), 0) : '' ?></td>
                    <td style="text-align:center;">ref</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <div class="texto" style="font-size:9pt; margin-top:4px;">
            *De conformidad con el Anexo Técnico de la solicitud de cotización. Las imágenes de referencia se encuentran en el expediente.
        </div>

        <!-- SECCIÓN 2 -->
        <div class="subtitulo-sec">2. ESTUDIO DE PRECIOS</div>
        <div class="texto">
            Realizando una revisión de precios de mercado ofrecidos por los proveedores
            de artículos de <strong><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></strong> se encuentran los siguientes resultados:
        </div>

        <!-- TABLA DE PROVEEDORES CON PRECIOS -->
        <?php
        // PROCESAR LOS DATOS DE PROVEEDORES
        $proveedores = array();
        $empresas = array();
        $totalesPorProveedor = array();
        
        // Extraer proveedores del campo 'proveedor' (vienen separados por coma)
        if (!empty($data) && isset($data[0]['proveedor'])) {
            $proveedoresList = explode(',', $data[0]['proveedor']);
            foreach ($proveedoresList as $p) {
                $nombre = trim($p);
                if (!empty($nombre)) {
                    $proveedores[] = $nombre;
                    $totalesPorProveedor[$nombre] = 0;
                }
            }
        }
        
        // Extraer empresas del campo 'empresa' (vienen separadas por coma)
        if (!empty($data) && isset($data[0]['empresa'])) {
            $empresasList = explode(',', $data[0]['empresa']);
            foreach ($empresasList as $e) {
                $nombre = trim($e);
                if (!empty($nombre)) {
                    $empresas[] = $nombre;
                }
            }
        }
        
        // Calcular totales por proveedor/empresa
        $totalGeneral = 0;
        $contadorProveedores = 0;
        
        // Asignar precios a cada proveedor (simulación con los datos disponibles)
        // En este caso, usamos el campo 'total' que viene en los datos
        if (!empty($data)) {
            foreach ($data as $item) {
                if (isset($item['total'])) {
                    $precio = floatval($item['total']);
                    // Distribuir el precio entre los proveedores
                    if (count($proveedores) > 0) {
                        $precioPorProveedor = $precio / count($proveedores);
                        foreach ($proveedores as $proveedor) {
                            $totalesPorProveedor[$proveedor] += $precioPorProveedor;
                        }
                    }
                    $totalGeneral += $precio;
                }
            }
        }
        
        // Mostrar tabla de precios por proveedor
        if (!empty($proveedores)):
        ?>
        <table class="tabla-precios">
            <tbody>
                <?php foreach ($proveedores as $index => $proveedor): 
                    $totalProveedor = isset($totalesPorProveedor[$proveedor]) ? $totalesPorProveedor[$proveedor] : 0;
                ?>
                <tr>
                    <td><span style="font-size:12pt;">Precios</span></td>
                    <td><strong><?= esc($proveedor) ?></strong> de: (PROVEEDOR)</td>
                    <td>$<?= number_format($totalProveedor, 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <div class="texto" style="font-size:11pt;">
            <strong>Proveedores o Prestadores de Servicio</strong><br>
            De acuerdo al estudio de mercado, existen proveedores nacionales e inscritos en el Catálogo
            de proveedores de bienes y/o servicios del Municipio de Temascalcingo que cuentan con
            actividad económica y/u objeto social relacionado con el comercio al por menor de
            <strong><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></strong>.
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
<!-- HOJA 2                                     -->
<!-- ========================================== -->
<div class="hoja">
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
            <li>Los precios del suministro de <strong><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></strong> varían acorde al lugar y fecha de su venta.</li>
            <li>El promedio del suministro de <strong><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></strong> es de acuerdo al siguiente cuadro comparativo:
            </li>
        </ul>

        <!-- ESTIMADO -->
        <?php 
        // Función para convertir número a letras
        function numeroALetrasEstudio($numero) {
            $numero = floatval($numero);
            $entero = floor($numero);
            $decimal = round(($numero - $entero) * 100);
            
            $unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
            $especiales = [
                10 => 'DIEZ', 11 => 'ONCE', 12 => 'DOCE', 13 => 'TRECE', 14 => 'CATORCE', 15 => 'QUINCE',
                16 => 'DIECISÉIS', 17 => 'DIECISIETE', 18 => 'DIECIOCHO', 19 => 'DIECINUEVE',
                20 => 'VEINTE', 30 => 'TREINTA', 40 => 'CUARENTA', 50 => 'CINCUENTA',
                60 => 'SESENTA', 70 => 'SETENTA', 80 => 'OCHENTA', 90 => 'NOVENTA'
            ];
            
            function convertirDosDigitosE($n) {
                $unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
                if ($n < 10) return $unidades[$n];
                if ($n < 20) {
                    $especiales = ['DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISÉIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'];
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
            
            function convertirTresDigitosE($n) {
                $centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
                if ($n < 100) return convertirDosDigitosE($n);
                if ($n < 1000) {
                    $centena = floor($n / 100);
                    $resto = $n % 100;
                    if ($centena === 1 && $resto === 0) return 'CIEN';
                    if ($resto === 0) return $centenas[$centena];
                    return $centenas[$centena] . ' ' . strtolower(convertirDosDigitosE($resto));
                }
                return '';
            }
            
            if ($entero === 0) return 'CERO PESOS ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
            
            $millones = floor($entero / 1000000);
            $miles = floor(($entero % 1000000) / 1000);
            $unidadesEntero = $entero % 1000;
            
            $resultado = '';
            if ($millones > 0) {
                if ($millones === 1) $resultado .= 'UN MILLÓN';
                else $resultado .= convertirTresDigitosE($millones) . ' MILLONES';
                if ($miles > 0 || $unidadesEntero > 0) $resultado .= ' ';
            }
            if ($miles > 0) {
                if ($miles === 1) $resultado .= 'MIL';
                else $resultado .= convertirTresDigitosE($miles) . ' MIL';
                if ($unidadesEntero > 0) $resultado .= ' ';
            }
            if ($unidadesEntero > 0) {
                if ($unidadesEntero === 1 && $miles === 0 && $millones === 0) $resultado .= 'UN PESO';
                else $resultado .= convertirTresDigitosE($unidadesEntero) . ' PESOS';
            } else if ($millones === 0 && $miles === 0) {
                $resultado = 'CERO PESOS';
            } else if ($unidadesEntero === 0) {
                $resultado .= 'PESOS';
            }
            
            $resultado .= ' ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
            return $resultado;
        }
        
        // Calcular el promedio total
        $promedioTotal = 0;
        if (!empty($proveedores) && $totalGeneral > 0) {
            $promedioTotal = $totalGeneral / count($proveedores);
        }
        ?>

        <div class="estimado-box">
            <strong>Estimado a ejercer para el procedimiento:</strong>
            $<?= number_format($promedioTotal, 2) ?> (<?= numeroALetrasEstudio($promedioTotal) ?>)
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
                    <span style="font-size:11pt; font-weight:bold;">
                        C. PAULO SERGIO HERNÁNDEZ CUADRIELLO
                    </span>
                </div>
                <div>COORDINADOR DE RECURSOS MATERIALES</div>
            </div>
            <div class="col-firma">
                <div class="linea-firma">
                    <span style="font-size:11pt; font-weight:bold;">
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