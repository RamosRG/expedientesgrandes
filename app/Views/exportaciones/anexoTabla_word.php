<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Anexo Tabla - Relación de bienes</title>
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
        /* ESTILOS COMPATIBLES CON WORD */
        @page {
            size: 21cm 29.7cm; /* Tamaño Carta */
            margin: 20mm 18mm 20mm 18mm;
        }

        body {
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 10pt;
            line-height: 1.45;
            color: #000000;
            background: white;
            margin: 0;
            padding: 0;
        }

        .hoja {
            width: 21cm;
            min-height: 29.7cm;
            padding: 20mm 18mm 20mm 18mm;
            margin: 0 auto;
            background: white;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 10pt;
            line-height: 1.45;
            color: #000000;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
        }

        /* TÍTULOS */
        .titulo-anexo {
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .subtitulo {
            text-align: center;
            font-size: 11pt;
            margin-bottom: 25px;
            border-bottom: 2px solid #1e4a6b;
            padding-bottom: 8px;
        }

        /* TABLA */
        .tabla-bienes {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 20px;
            font-size: 9pt;
        }

        .tabla-bienes th,
        .tabla-bienes td {
            border: 1px solid #000000;
            padding: 6px 4px;
            vertical-align: middle;
        }

        .tabla-bienes th {
            background-color: #f0f4f8;
            text-align: center;
            font-weight: bold;
            font-size: 9pt;
        }

        .tabla-bienes td {
            vertical-align: middle;
        }

        .centrado {
            text-align: center;
        }

        .izquierda {
            text-align: left;
        }

        /* NÚMERO DE PÁGINA */
        .numero-pagina {
            text-align: right;
            margin-top: 30px;
            font-size: 8pt;
            font-weight: bold;
        }

        .nota-final {
            font-size: 8pt;
            margin-top: 18px;
            text-align: left;
            border-top: 1px dashed #aaa;
            padding-top: 8px;
        }

        /* PARA IMPRESIÓN */
        @media print {
            body {
                background: white;
                padding: 0;
            }
            .hoja {
                border: none;
                box-shadow: none;
                margin: 0;
                padding: 20mm 18mm 20mm 18mm !important;
            }
        }
    </style>
</head>
<body>
    <div class="hoja">
        <div class="contenido-hoja">
            <!-- TÍTULO PRINCIPAL -->
            <div class="titulo-anexo">
                Anexo Tabla
            </div>

            <!-- SUBTÍTULO (opcional, puedes agregar nombre del estudio si lo tienes) -->
            <div class="subtitulo">
                Relación de bienes, cantidades y marcas de referencia
            </div>

            <!-- TABLA DE BIENES -->
            <table class="tabla-bienes">
                <thead>
                    <tr>
                        <th style="width: 8%;"># PARTIDA<br>ÚNICA</th>
                        <th style="width: 42%;">DESCRIPCIÓN DE LOS BIENES</th>
                        <th style="width: 12%;">UNIDAD DE MEDIDA</th>
                        <th style="width: 12%;">CANTIDAD</th>
                        <th style="width: 26%;">MARCA Y MODELO PROPUESTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)): ?>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $item): ?>
                            <tr>
                                <td class="centrado"><?= $i++ ?></td>
                                <td class="izquierda"><?= isset($item['descripcion']) ? esc($item['descripcion']) : '' ?></td>
                                <td class="centrado"><?= isset($item['unidad_medida']) ? esc($item['unidad_medida']) : '' ?></td>
<td class="centrado"><?= isset($item['cantidad']) ? number_format($item['cantidad'], 0, '.', '') : '' ?></td>                                <td class="centrado">
                                    <?php 
                                    $marcaModelo = isset($item['marca_modelo']) ? trim($item['marca_modelo']) : '';
                                    echo $marcaModelo !== '' ? esc($marcaModelo) : 'N/A';
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align:center; padding:20px;">
                                No existen registros
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- NOTA FINAL -->
            <div class="nota-final">
                Nota: Las cantidades y especificaciones son referenciales y están sujetas a validación.
            </div>

            <!-- NÚMERO DE PÁGINA -->
            <div class="numero-pagina">
                1 de 1
            </div>
        </div>
    </div>
</body>
</html>