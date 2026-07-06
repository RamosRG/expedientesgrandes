<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Acta de Presentación y Apertura de Propuestas</title>
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
            margin: 20mm 18mm 18mm 18mm;
        }

        body {
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 9pt;
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
            padding: 20mm 18mm 18mm 18mm;
            margin: 0 auto;
            background: white;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 9pt;
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
            font-size: 7.5pt;
        }

        table th,
        table td {
            border: 1px solid #000000;
            padding: 4px 3px;
            vertical-align: top;
        }

        table th {
            text-align: center;
            font-weight: bold;
            background: #f5f5f5;
        }

        .empresa-columna {
            text-align: center;
            background: #f0f0f0;
            font-weight: bold;
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
                padding: 20mm 18mm 18mm 18mm !important;
            }
        }
    </style>
</head>
<body>
    <div class="hoja">
        <div class="contenido-hoja">
            <!-- ENCABEZADO -->
            <div class="encabezado">
                “2025. BICENTENARIO DE LA VIDA MUNICIPAL EN EL ESTADO DE MÉXICO”
            </div>

            <!-- TÍTULO -->
            <div class="titulo">
                ACTA DE PRESENTACIÓN Y APERTURA DE PROPUESTAS
            </div>

            <!-- SUBTÍTULO CON DATOS DEL ESTUDIO -->
            <div class="subtitulo">
                DE LA LICITACIÓN PÚBLICA NACIONAL PRESENCIAL
                <br>
                <span class="campo campo-mediano">
                    <?php 
                    // Verificar si es objeto o array
                    if (!empty($data) && isset($data[0])) {
                        if (is_object($data[0])) {
                            echo isset($data[0]->no_licitacion) ? esc($data[0]->no_licitacion) : '';
                        } else if (is_array($data[0])) {
                            echo isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '';
                        }
                    }
                    ?>
                </span>
                <br>
                PARA LA “
                <span class="campo campo-largo">
                    <?php 
                    if (!empty($data) && isset($data[0])) {
                        if (is_object($data[0])) {
                            echo isset($data[0]->nombre_estudio) ? esc($data[0]->nombre_estudio) : '';
                        } else if (is_array($data[0])) {
                            echo isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '';
                        }
                    }
                    ?>
                </span>
                ”
            </div>

            <!-- TABLA DE REQUISITOS -->
            <table>
                <thead>
                    <?php if (!empty($data)): ?>
                        <!-- FILA 1: "EMPRESA" y nombres de proveedores (cada uno ocupa 2 columnas) -->
                        <tr>
                            <th rowspan="2" style="vertical-align:middle; text-align:center; background:#f0f0f0; font-weight:bold; width:200px;">EMPRESA</th>
                            <?php foreach ($data as $proveedor): ?>
                                <th class="empresa-columna" style="text-align:center; background:#f0f0f0; font-weight:bold;" colspan="2">
                                    <?php 
                                    if (is_object($proveedor)) {
                                        echo isset($proveedor->proveedor) ? esc($proveedor->proveedor) : (isset($proveedor->nombre_empresa) ? esc($proveedor->nombre_empresa) : '');
                                    } else if (is_array($proveedor)) {
                                        echo isset($proveedor['proveedor']) ? esc($proveedor['proveedor']) : (isset($proveedor['nombre_empresa']) ? esc($proveedor['nombre_empresa']) : '');
                                    }
                                    ?>
                                </th>
                            <?php endforeach; ?>
                        </tr>
                        <!-- FILA 2: "PRESENTÓ" y "NO PRESENTÓ" debajo de cada proveedor -->
                        <tr style="background:#e8e8e8;">
                            <?php foreach ($data as $proveedor): ?>
                                <td class="centrado"><strong>PRESENTÓ</strong></td>
                                <td class="centrado"><strong>NO PRESENTÓ</strong></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endif; ?>
                </thead>
                <tbody>
                    <?php
                    // Requisitos fijos (7 requisitos sin números)
                    $requisitos = [
                        ["descripcion" => "ESCRITO ELABORADO EN PAPEL MEMBRETADO DEL OFERENTE, EN EL CUAL INDIQUE EL NÚMERO TOTAL DE FOLIOS DE LOS QUE CONSTA SU PROPUESTA ECONÓMICA"],
                        ["descripcion" => "PARTIDAS COTIZADAS"],
                        ["descripcion" => "PRECIO UNITARIO"],
                        ["descripcion" => "SUBTOTAL"],
                        ["descripcion" => "I.V.A. DESGLOSADO"],
                        ["descripcion" => "TOTAL"],
                        ["descripcion" => "MONTO CON LETRA"],
                    ];
                    ?>

                    <?php foreach ($requisitos as $requisito): ?>
                        <tr>
                            <!-- Primera columna: el nombre del requisito -->
                            <td style="text-align:left; padding:6px 4px;"><?= $requisito['descripcion'] ?></td>
                            
                            <!-- Por cada proveedor: celda PRESENTÓ + celda NO PRESENTÓ -->
                            <?php if (!empty($data)): ?>
                                <?php foreach ($data as $proveedor): ?>
                                    <td class="centrado"></td>
                                    <td class="centrado"></td>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- NÚMERO DE PÁGINA -->
            <div class="numero-pagina">
                1 DE 1
            </div>
        </div>
    </div>
</body>
</html>