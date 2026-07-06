<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Cumplimiento de Propuestas</title>
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: white;
            font-family: 'Century Gothic', 'Segoe UI', 'Arial', sans-serif;
            padding: 0;
            margin: 0;
            color: #1a2c3e;
            font-size: 10pt;
        }

        .hoja {
            width: 21cm;
            min-height: 29.7cm;
            background: white;
            padding: 25mm 30mm 25mm 30mm;
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
            font-size: 10pt;
            line-height: 1.5;
            color: #000000;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        /* Encabezado del año */
        .encabezado-anio {
            text-align: center;
            font-weight: bold;
            font-size: 10pt;
            letter-spacing: 0.5px;
            margin-bottom: 25px;
            border-bottom: 2px solid #1e4a6b;
            padding-bottom: 8px;
            width: 100%;
        }

        .fecha-linea {
            text-align: right;
            margin: 6px 0 6px 0;
            font-weight: normal;
        }

        .destinatario-linea {
            margin: 8px 0 5px 0;
        }

        .saludo-formal {
            margin: 20px 0 15px 0;
            font-weight: normal;
        }

        .texto-cuerpo {
            text-align: justify;
            margin-bottom: 18px;
            text-indent: 0px;
        }

        .atentamente {
            text-align: center;
            font-weight: bold;
            margin-top: 40px;
            margin-bottom: 5px;
        }

        .frase-valores {
            text-align: center;
            font-weight: bold;
            margin: 5px 0 20px 0;
        }

        .firma-area {
            text-align: center;
            margin-top: 45px;
        }

        .firma-linea {
            border-top: 1px solid #000000;
            width: 280px;
            margin: 0 auto;
            padding-top: 8px;
            font-weight: bold;
        }

        .cargo-firma {
            text-align: center;
            font-size: 10pt;
            margin-top: 6px;
            font-weight: normal;
        }

        .copia-archivo {
            margin-top: 35px;
            font-size: 10pt;
        }

        .iniciales {
            margin-top: 6px;
            font-size: 10pt;
        }

        .numero-pagina {
            text-align: right;
            margin-top: 30px;
            font-size: 9pt;
            font-weight: bold;
        }

        /* Campos editables */
        .campo-verde {
            display: inline-block;
            border-bottom: 2px solid #2c7a4d;
            min-width: 130px;
            padding: 2px 8px;
            font-weight: 600;
            color: #1a4a2a;
            font-family: 'Courier New', monospace;
            font-size: 10pt;
            text-align: left;
        }

        .campo-corto { min-width: 90px; }
        .campo-mediano { min-width: 180px; }
        .campo-largo { min-width: 280px; }

        .linea-derecha {
            text-align: right;
        }

        .linea-derecha .campo-verde {
            text-align: left;
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
                page-break-after: avoid;
                padding: 25mm 30mm 25mm 30mm;
            }
            .campo-verde {
                background: transparent !important;
                border-bottom: 1px solid #000 !important;
            }
        }
    </style>
</head>
<body>

<!-- HOJA ÚNICA: Contenido del oficio de cumplimiento -->
<div class="hoja">
    <div class="contenido-hoja">

        <!-- Encabezado lema 2026 -->
        <div class="encabezado-anio">
            "2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO"
        </div>

        <!-- Fecha - alineada a la derecha -->
        <div class="fecha-linea linea-derecha">
            <strong>TEMASCALCINGO, MÉXICO A </strong>
            <span class="campo-verde campo-mediano">
                <?php 
                if (isset($data[0]['created_at']) && !empty($data[0]['created_at'])) {
                    $fecha = new DateTime($data[0]['created_at']);
                    $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                    echo $fecha->format('d') . ' DE ' . $meses[$fecha->format('n') - 1] . ' DE ' . $fecha->format('Y');
                }
                ?>
            </span>
        </div>

        <!-- Cargo - alineada a la derecha -->
        <div class="fecha-linea linea-derecha">
            <strong>CARGO:</strong>
            SERVIDOR PÚBLICO DESIGNADO
        </div>

        <!-- Asunto - alineada a la derecha -->
        <div class="fecha-linea linea-derecha">
            <strong>ASUNTO: </strong>
            <span class="campo-verde campo-largo">CUMPLIMIENTO DE PROPUESTAS</span>
        </div>

        <!-- Oficio número - alineada a la derecha -->
        <div class="fecha-linea linea-derecha" style="margin-bottom: 20px;">
            <strong>LPNP- </strong>
            <span class="campo-verde campo-corto"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>
        </div>

        <!-- Destinatario: INTEGRANTES DEL COMITÉ -->
        <div class="destinatario-linea">
            <strong>INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS</strong>
        </div>
        <div class="destinatario-linea" style="margin-bottom: 18px;">
            <strong>DE TEMASCALCINGO, MÉXICO</strong>
        </div>

        <div class="saludo-formal">
            <strong>P R E S E N T E S</strong>
        </div>

        <!-- Cuerpo del oficio (texto completo con campos editables) -->
        <div class="texto-cuerpo">
            Sirva este medio para enviarles un cordial saludo, en seguimiento al procedimiento de <strong>Licitación Pública Nacional Presencial LPNP</strong>
            <span class="campo-verde campo-corto"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>, para la contratación del <strong>"</strong>
            <span class="campo-verde campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span><strong>"</strong>, el cual fue aprobado en la <strong>Segunda Sesión Ordinaria</strong> de fecha 
            <span class="campo-verde campo-mediano">
                <?php 
                if (isset($data[0]['created_at']) && !empty($data[0]['created_at'])) {
                    $fecha = new DateTime($data[0]['created_at']);
                    $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                    echo $fecha->format('d') . ' DE ' . $meses[$fecha->format('n') - 1] . ' DE ' . $fecha->format('Y');
                }
                ?>
            </span>; me permito informarles que de acuerdo al calendario establecido en las Bases de licitación se llevó a cabo el Acto de Presentación y Apertura de Propuestas del procedimiento en mención.
        </div>

        <div class="texto-cuerpo">
            Por lo anterior, me permito informarles que el licitante <strong><span class="campo-verde campo-mediano">
                <?php 
                // Buscar el primer proveedor que tenga datos
                $proveedorEncontrado = '';
                if (!empty($data)) {
                    foreach ($data as $item) {
                        if (isset($item['proveedor']) && !empty($item['proveedor']) && $item['proveedor'] !== '—' && $item['proveedor'] !== 'NULL') {
                            $proveedorEncontrado = $item['proveedor'];
                            break;
                        }
                    }
                }
                echo esc($proveedorEncontrado);
                ?>
            </span></strong> presentó su propuesta técnica, económica y documentación complementaria cumpliendo con los requisitos de manera cuantitativa conforme lo establecido en las Bases emitidas; por lo cual son aceptadas para su Análisis y Evaluación.
        </div>

        <div class="texto-cuerpo">
            Sin más a que hacer referencia, me reitero a sus apreciables órdenes.
        </div>

        <!-- Cierre formal centrado -->
        <div class="atentamente">
            A T E N T A M E N T E
        </div>
        <div class="frase-valores">
            "SERVIR CON VALORES"
        </div>

        <!-- Firma y cargo centrados perfectamente - editables -->
        <div class="firma-area">
            <div class="firma-linea">
                <strong><span class="campo-verde campo-largo"><?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?></span></strong>
            </div>
            <div class="cargo-firma">
                SERVIDOR PÚBLICO DESIGNADO
            </div>
        </div>

        <!-- c.c.p. e iniciales (fijos) -->
        <div class="copia-archivo">
            <strong>C.C.P. ARCHIVO</strong> 
        </div>

        <!-- Número de página -->
        <div class="numero-pagina">
            1 de 1
        </div>
    </div>
</div>

</body>
</html>