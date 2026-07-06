<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Bitácora de Envío IR</title>
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
            size: 297mm 210mm;
            margin: 12.7mm 12.7mm 12.7mm 12.7mm;
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
            padding: 12.7mm 12.7mm 12.7mm 12.7mm;
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

        .titulo-bitacora {
            text-align: center;
            font-weight: bold;
            font-size: 10pt;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .subtitulo-giro {
            text-align: center;
            font-size: 10pt;
            border-bottom: 2px solid #000000;
            padding-bottom: 8px;
            margin-bottom: 28px;
            width: 100%;
        }

        .campo-verde {
            display: inline-block;
            border-bottom: 1px solid #000000;
            min-width: 120px;
            padding: 0px 6px;
            font-weight: 600;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 10pt;
        }

        .campo-chico {
            min-width: 80px;
        }

        .campo-mediano {
            min-width: 180px;
        }

        .campo-largo {
            min-width: 260px;
        }

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
            background-color: #f0f4f8;
        }

        .firma-contenedor {
            width: 100%;
            margin-top: 70px;
        }

        .firma-item {
            width: 45%;
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
                padding: 12.7mm 12.7mm 12.7mm 12.7mm !important;
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
                INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL IRNP-<span class="campo-verde campo-chico"><?= isset($data[0]->no_licitacion) ? esc($data[0]->no_licitacion) : '' ?></span>
            </div>

            <!-- SUBTÍTULO CON DATO DEL ESTUDIO -->
            <div class="subtitulo-giro">
                PARA LA “<span class="campo-verde campo-mediano"><?= isset($data[0]->nombre_estudio) ? esc($data[0]->nombre_estudio) : '' ?></span>”
            </div>

            <!-- TABLA DE PROVEEDORES -->
            <table class="tabla-proveedores">
                <thead>
                    <tr>
                        <th style="width: 7%;">NO.</th>
                        <th style="width: 27%;">PROVEEDOR</th>
                        <th style="width: 15%;">FECHA DE ENTREGA</th>
                        <th style="width: 20%;">ASUNTO</th>
                        <th style="width: 21%;">CORREO ELECTRÓNICO</th>
                        <th style="width: 10%;">FIRMA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)): ?>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $row): ?>
                        <tr>
                            <td style="text-align: center;"><?= $i++ ?></td>
                            <td><?= isset($row->proveedor) ? esc($row->proveedor) : '' ?></td>
                            <td>
                                <?php 
                                if (isset($row->created_at) && !empty($row->created_at)) {
                                    $fecha = new DateTime($row->created_at);
                                    echo $fecha->format('d/m/Y');
                                }
                                ?>
                            </td>
                            <td>Solicitud de cotización</td>
                            <td><?= isset($row->correo) ? esc($row->correo) : '' ?></td>
                            <td></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align:center;">No hay proveedores registrados</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- FIRMAS -->
            <table class="firma-contenedor" style="width:100%;border-collapse:collapse;">
                <tr>
                    <!-- ELABORÓ -->
                    <td class="firma-item" style="width:50%;text-align:center;vertical-align:top;padding:0 10px;">
                        <div><strong>ELABORÓ</strong></div>
                        <div class="firma-linea"></div>
                        <div class="firma-texto">
                            <span class="campo-verde campo-largo"><?= isset($data[0]->coordinador) ? esc($data[0]->coordinador) : '' ?></span>
                        </div>
                        <div class="firma-area">
                            <span class="campo-verde campo-mediano"><?= isset($data[0]->area) ? esc($data[0]->area) : '' ?></span>
                        </div>
                    </td>

                    <!-- AUTORIZÓ -->
                    <td class="firma-item" style="width:50%;text-align:center;vertical-align:top;padding:0 10px;">
                        <div><strong>AUTORIZÓ</strong></div>
                        <div class="firma-linea"></div>
                        <div class="firma-texto">
                            <span class="campo-largo">C. MIRIAM VIANEY OVANDO RUBIO</span>
                        </div>
                        <div class="firma-area">
                            <span class="campo-mediano">DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL</span>
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