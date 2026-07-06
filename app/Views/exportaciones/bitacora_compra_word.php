<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Lista de Compra de Bases</title>
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
            size: 29.7cm 21cm;
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
            width: 29.7cm;
            min-height: 21cm;
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
            margin-bottom: 28px;
            border-bottom: 2px solid #000000;
            padding-bottom: 8px;
            width: 100%;
        }

        .campo {
            display: inline-block;
            border-bottom: 1px solid #000000;
            min-width: 100px;
            padding: 0 6px;
            font-weight: 600;
        }

        .campo-chico {
            min-width: 100px;
        }

        .campo-mediano {
            min-width: 200px;
        }

        .tabla-proveedores {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0 35px 0;
            font-size: 9pt;
        }

        .tabla-proveedores th,
        .tabla-proveedores td {
            border: 1px solid #000000;
            padding: 8px 6px;
            vertical-align: top;
        }

        .tabla-proveedores th {
            background-color: #f0f4f8;
            text-align: center;
            font-weight: bold;
        }

        .firma-contenedor {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 70px;
            width: 100%;
        }

        .firma-item {
            width: 45%;
            text-align: center;
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
            .celda-editable {
                background: transparent !important;
                border-bottom: 1px solid #000 !important;
            }
        }
    </style>
</head>
<body>
    <div class="hoja">
        <div class="contenido-hoja">
            <!-- Título principal -->
            <div class="titulo-bitacora">
                LISTA DE COMPRA DE BASES
            </div>
            <div class="titulo-bitacora">
                LICITACIÓN PÚBLICA NACIONAL PRESENCIAL
            </div>
            <div class="titulo-bitacora">
                LPNP-<span class="campo campo-chico"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>
            </div>

            <div class="subtitulo-giro">
                CONTRATACIÓN DEL “<span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>”
            </div>

            <!-- Tabla: PROVEEDOR | LICITANTE PRESENTE | HORA | FIRMA -->
            <table class="tabla-proveedores">
                <thead>
                    <tr>
                        <th style="width: 30%;">PROVEEDOR</th>
                        <th style="width: 20%;">LICITANTE PRESENTE</th>
                        <th style="width: 20%;">HORA</th>
                        <th style="width: 30%;">FIRMA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)): ?>
                        <?php foreach ($data as $participante): ?>
                            <tr>
                                <td><?= isset($participante['proveedor']) ? esc($participante['proveedor']) : '' ?></td>
                                <td></td>
                                <td>
                                    <?php 
                                    if (isset($participante['created_at']) && !empty($participante['created_at'])) {
                                        $fecha = new DateTime($participante['created_at']);
                                        echo $fecha->format('H:i');
                                    }
                                    ?>
                                </td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align:center;">NO HAY PROVEEDORES REGISTRADOS</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- FIRMAS -->
            <div class="firma-contenedor">
                <div class="firma-item">
                    <div><strong>ELABORÓ</strong></div>
                    <div class="firma-linea"></div>
                    <div class="firma-texto">
                        <?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?>
                    </div>
                    <div class="firma-area">
                        <?= isset($data[0]['area']) ? esc($data[0]['area']) : '' ?>
                    </div>
                </div>

                <div class="firma-item">
                    <div><strong>AUTORIZÓ</strong></div>
                    <div class="firma-linea"></div>
                    <div class="firma-texto">
                        C. MIRIAM VIANEY OVANDO RUBIO
                    </div>
                    <div class="firma-area">
                        DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
                    </div>
                </div>
            </div>

            <!-- NÚMERO DE PÁGINA -->
            <div class="numero-pagina">
                1 de 1
            </div>
        </div>
    </div>
</body>
</html>