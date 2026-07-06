<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Lista de Asistencia</title>
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

        .titulo-lista {
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .subtitulo-acto {
            text-align: center;
            font-size: 12pt;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .texto-invitacion {
            text-align: center;
            font-size: 11pt;
            margin-bottom: 8px;
        }

        .campo-verde {
            display: inline-block;
            border-bottom: 1px solid #000000;
            min-width: 150px;
            padding: 0px 6px;
            font-weight: 600;
        }

        .campo-mediano { min-width: 180px; }
        .campo-largo { min-width: 280px; }

        .fecha-fija {
            text-align: center;
            font-weight: bold;
            margin: 12px 0 20px 0;
            font-size: 11pt;
        }

        .subtitulo-licitantes {
            text-align: center;
            font-weight: bold;
            font-size: 12pt;
            margin: 20px 0 12px 0;
            text-decoration: underline;
        }

        .tabla-asistencia {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 9.5pt;
        }

        .tabla-asistencia th,
        .tabla-asistencia td {
            border: 1px solid #000000;
            padding: 10px 6px;
            vertical-align: top;
        }

        .tabla-asistencia th {
            background-color: #f0f4f8;
            text-align: center;
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
                padding: 20mm 18mm 20mm 18mm !important;
            }
        }
    </style>
</head>
<body>
    <div class="hoja">
        <div class="contenido-hoja">
            <!-- TÍTULOS -->
            <div class="titulo-lista">
                LISTA DE ASISTENCIA
            </div>
            <div class="subtitulo-acto">
                ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS
            </div>
            <div class="subtitulo-acto">
                DE LA INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL
            </div>
            <div style="text-align: center; margin: 8px 0;">
                IRNP-<span class="campo-verde campo-mediano"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>
            </div>
            <div style="text-align: center; margin: 10px 0;">
                PARA EL "<span class="campo-verde campo-largo"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>"
            </div>
            <div class="fecha-fija">
                FECHA: 
                <span class="campo-verde campo-largo">
                    <?php 
                    if (isset($data[0]['created_at'])) {
                        $fecha = new DateTime($data[0]['created_at']);
                        $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                        echo $fecha->format('d') . ' DE ' . $meses[$fecha->format('n')-1] . ' DE ' . $fecha->format('Y');
                    }
                    ?>
                </span>
            </div>

            <div class="subtitulo-licitantes">
                POR "LOS LICITANTES"
            </div>

            <!-- TABLA DE ASISTENCIA -->
            <table class="tabla-asistencia">
                <thead>
                    <tr>
                        <th style="width: 30%;">LICITANTE PRESENTE</th>
                        <th style="width: 35%;">NOMBRE DEL REPRESENTANTE</th>
                        <th style="width: 15%;">HORA DE REGISTRO</th>
                        <th style="width: 20%;">FIRMA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)): ?>
                        <?php foreach ($data as $proveedor): ?>
                            <tr>
                                <td>
                                    <?php 
                                    $licitante = isset($proveedor['empresa']) && !empty($proveedor['empresa']) 
                                        ? $proveedor['empresa'] 
                                        : (isset($proveedor['proveedor']) ? $proveedor['proveedor'] : '');
                                    echo esc($licitante);
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    $representante = isset($proveedor['representante_legal']) && !empty($proveedor['representante_legal']) 
                                        ? $proveedor['representante_legal'] 
                                        : 'N/A';
                                    echo esc($representante);
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    if (isset($proveedor['created_at'])) {
                                        $hora = new DateTime($proveedor['created_at']);
                                        echo $hora->format('H:i');
                                    }
                                    ?>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align:center;">No hay participantes registrados</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="numero-pagina">
                1 de 1
            </div>
        </div>
    </div>
</body>
</html>