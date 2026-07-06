<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Bitácora de Solicitud de Cotización</title>
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
        /* ESTILOS COMPATIBLES CON WORD - ORIENTACIÓN HORIZONTAL */
        @page {
            size: 297mm 210mm;
            margin: 12.7mm;
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
            width: 297mm;
            min-height: 210mm;
            padding: 12.7mm;
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
        .titulo-bitacora {
            text-align: center;
            font-weight: bold;
            font-size: 10pt;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .subtitulo-giro {
            text-align: center;
            font-size: 10pt;
            border-bottom: 2px solid #000000;
            padding-bottom: 8px;
            margin-bottom: 28px;
            width: 100%;
        }

        /* TABLA */
        .tabla-proveedores {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 35px;
            font-size: 9pt;
        }

        .tabla-proveedores th,
        .tabla-proveedores td {
            border: 1px solid #000000;
            padding: 8px 6px;
            vertical-align: top;
        }

        .tabla-proveedores th {
            text-align: center;
            font-weight: bold;
            background: #f0f4f8;
        }

        /* FIRMAS - CON TABLA EN VEZ DE FLEX (COMPATIBLE CON WORD) */
        .firma-contenedor {
            width: 100%;
            margin-top: 70px;
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
            margin: 60px auto 0 auto;
        }

        .firma-texto {
            margin-top: 10px;
            font-weight: normal;
        }

        .firma-area {
            margin-top: 5px;
            font-weight: normal;
        }

        /* NÚMERO DE PÁGINA */
        .numero-pagina {
            text-align: right;
            margin-top: 30px;
            font-size: 8pt;
            font-weight: bold;
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
                padding: 12.7mm !important;
            }
        }
    </style>
</head>
<body>
    <div class="hoja">
        <div class="contenido-hoja">
            <!-- TÍTULO PRINCIPAL -->
            <div class="titulo-bitacora">
                BITÁCORA DE ENVÍO DE SOLICITUD DE COTIZACIÓN A PROVEEDORES PARA EL PROCEDIMIENTO DE
            </div>
            <div class="titulo-bitacora">
                INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL IRNP-<?= isset($data[0]->no_licitacion) ? esc($data[0]->no_licitacion) : '' ?>
            </div>

            <!-- SUBTÍTULO CON DATO DEL ESTUDIO -->
            <div class="subtitulo-giro">
                PARA LA “<?= isset($data[0]->nombre_estudio) ? esc($data[0]->nombre_estudio) : '' ?>”
            </div>

            <!-- TABLA DE PROVEEDORES -->
            <table class="tabla-proveedores">
                <thead>
                    <tr>
                        <th style="width: 7%;">NO.</th>
                        <th style="width: 27%;">LICITANTE</th>
                        <th style="width: 15%;">FECHA DE ENTREGA</th>
                        <th style="width: 20%;">ASUNTO</th>
                        <th style="width: 21%;">CORREO ELECTRÓNICO</th>
                        <th style="width: 10%;">FIRMA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++ ?></td>
                        <td><?= isset($row->nombre_empresa) ? esc($row->nombre_empresa) : (isset($row->proveedor) ? esc($row->proveedor) : '') ?></td>
                        <td>
                            <?php 
                            if (!empty($row->created_at)) {
                                $fecha = new DateTime($row->created_at);
                                $meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
                                echo $fecha->format('d') . ' de ' . $meses[$fecha->format('n')-1] . ' de ' . $fecha->format('Y');
                            }
                            ?>
                        </td>
                        <td>Solicitud de cotización</td>
                        <td><?= isset($row->correo) ? esc($row->correo) : '' ?></td>
                        <td></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- FIRMAS - USANDO TABLA PARA COMPATIBILIDAD CON WORD -->
            <table class="firma-contenedor" style="width:100%;border-collapse:collapse;">
                <tr>
                    <!-- ELABORÓ -->
                    <td class="firma-item" style="width:50%;text-align:center;vertical-align:top;padding:0 10px;">
                        <div><strong>ELABORÓ</strong></div>
                        <div class="firma-linea"></div>
                        <div class="firma-texto">
                            <?= isset($data[0]->coordinador) ? esc($data[0]->coordinador) : '' ?>
                        </div>
                        <div class="firma-area">
                            <?= isset($data[0]->area) ? esc($data[0]->area) : '' ?>
                        </div>
                    </td>

                    <!-- AUTORIZÓ -->
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
                1 de 1
            </div>
        </div>
    </div>
</body>
</html>