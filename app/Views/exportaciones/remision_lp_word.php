<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Remisión de Estudio de Mercado</title>
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

<!-- HOJA ÚNICA: Contenido del oficio de remisión de estudio de mercado -->
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
                } else {
                    echo '05 DE ENERO DE 2026';
                }
                ?>
            </span>
        </div>

        <!-- Dependencia - alineada a la derecha -->
        <div class="fecha-linea linea-derecha">
            <strong>DEPENDENCIA:</strong>
            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
        </div>

        <!-- Oficio número - alineada a la derecha -->
        <div class="fecha-linea linea-derecha">
            <strong>OFICIO NO.: MTM/DAYDP/78-B/</strong>
            <span class="campo-verde campo-corto"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>
        </div>

        <!-- Asunto - alineado a la derecha -->
        <div class="fecha-linea linea-derecha" style="margin-bottom: 20px;">
            <strong>ASUNTO: REMISIÓN DE ESTUDIO DE MERCADO</strong>
        </div>

        <!-- Destinatario: nombre y área - editables -->
        <div class="destinatario-linea">
            <strong>C.</strong>
            <span class="campo-verde campo-largo">
                <?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?>
            </span>
        </div>
        <div class="destinatario-linea" style="margin-bottom: 18px;">
            <strong>PRESIDENTA MUNICIPAL CONSTITUCIONAL</strong>
        </div>

        <div class="saludo-formal">
            <strong>P R E S E N T E</strong>
        </div>

        <!-- Cuerpo del oficio (texto completo con campos editables) -->
        <div class="texto-cuerpo">
            En referencia al <strong>OFICIO NO.: MTM/PM/12/</strong>
            <span class="campo-verde campo-corto"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>, de fecha
            <span class="campo-verde campo-mediano">
                <?php 
                if (isset($data[0]['created_at']) && !empty($data[0]['created_at'])) {
                    $fecha = new DateTime($data[0]['created_at']);
                    $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                    echo $fecha->format('d') . ' DE ' . $meses[$fecha->format('n') - 1] . ' DE ' . $fecha->format('Y');
                } else {
                    echo '05 DE ENERO DE 2026';
                }
                ?>
            </span>,
            donde solicita se lleve a cabo la solicitud de cotización para la contratación del
            <span class="campo-verde campo-largo"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>,
            por el periodo comprendido del
            <span class="campo-verde campo-mediano">
                <?php 
                if (isset($data[0]['created_at']) && !empty($data[0]['created_at'])) {
                    $fecha = new DateTime($data[0]['created_at']);
                    $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                    echo $fecha->format('d') . ' DE ' . $meses[$fecha->format('n') - 1] . ' DE ' . $fecha->format('Y');
                } else {
                    echo '05 DE ENERO DE 2026';
                }
                ?>
            </span>;
            me permito remitir a usted el Estudio de Mercado realizado por la Coordinación de Recursos Materiales para que, en atención a lo estipulado en los Artículos 13 y 14 de la Ley de Contratación Pública del Estado de México y Municipios, 15 inciso b) de su respectivo Reglamento, solicite al área de la Tesorería Municipal la suficiencia presupuestal, asimismo elabore y remita a esta Dirección de Administración y Desarrollo de Personal el Oficio Justificatorio para la contratación de servicios en mención.
        </div>

        <div class="texto-cuerpo">
            Sin más por el momento, quedo atenta a su apreciable respuesta.
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
                C. MIRIAM VIANEY OVANDO RUBIO
            </div>
            <div class="cargo-firma">
                DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
            </div>
        </div>

        <!-- c.c.p. e iniciales (editables) -->
        <div class="copia-archivo">
            <strong>C.</strong>
            <span class="campo-verde campo-largo">
                <?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?>
            </span>
        </div>
        <div class="iniciales">
            <strong>COORDINADOR DE </strong>
            <span class="campo-verde campo-mediano">
                <?= isset($data[0]['area']) ? esc($data[0]['area']) : '' ?>
            </span>
        </div>
        <div class="copia-archivo" style="margin-top: 3px;">
            <strong>C. C. P. ARCHIVO</strong>
        </div>

        <!-- Número de página -->
        <div class="numero-pagina">
            1 de 1
        </div>
    </div>
</div>

</body>
</html>