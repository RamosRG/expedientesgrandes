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
        @page {
            size: 21cm 29.7cm;
            margin: 2.5cm 3cm 2.5cm 3cm;
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
            width: 21cm;
            min-height: 29.7cm;
            padding: 2.5cm 3cm 2.5cm 3cm;
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

        .encabezado-anio {
            text-align: center;
            font-weight: bold;
            font-size: 10pt;
            letter-spacing: 0.5px;
            margin-bottom: 25px;
            border-bottom: 2px solid #000000;
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

        .campo {
            display: inline-block;
            border-bottom: 1px solid #000000;
            min-width: 130px;
            padding: 0px 6px;
            font-weight: 600;
        }

        .campo-corto { min-width: 90px; }
        .campo-mediano { min-width: 180px; }
        .campo-largo { min-width: 280px; }

        .linea-derecha {
            text-align: right;
        }

        .linea-derecha .campo {
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
                padding: 2.5cm 3cm 2.5cm 3cm !important;
            }
            .campo {
                border-bottom: 1px solid #000 !important;
            }
        }
    </style>
</head>
<body>
    <!-- HOJA ÚNICA -->
    <div class="hoja">
        <div class="contenido-hoja">

            <!-- Encabezado lema 2025 -->
            <div class="encabezado-anio">
                "2025. BICENTENARIO DE LA VIDA MUNICIPAL EN EL ESTADO DE MÉXICO"
            </div>

            <!-- Fecha - alineada a la derecha -->
            <div class="fecha-linea linea-derecha">
                <strong>TEMASCALCINGO, ESTADO DE MÉXICO, A </strong>
                <span class="campo campo-mediano">
                    <?php 
                    if (isset($data[0]['created_at'])) {
                        $fecha = new DateTime($data[0]['created_at']);
                        $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                        echo $fecha->format('d') . ' DE ' . $meses[$fecha->format('n')-1] . ' DE ' . $fecha->format('Y');
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
                <strong>OFICIO NO. MTM/DADP/CAYS/</strong>
                <span class="campo campo-corto"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>
            </div>

            <!-- Asunto - alineado a la derecha -->
            <div class="fecha-linea linea-derecha" style="margin-bottom: 20px;">
                <strong>ASUNTO: REMISIÓN DE ESTUDIO DE MERCADO Y SOLICITUD DE OFICIO JUSTIFICATORIO</strong>
            </div>

            <!-- Destinatario: nombre y área -->
            <div class="destinatario-linea">
                <strong>C.</strong>
                <span class="campo campo-largo"><?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?></span>
            </div>
            <div class="destinatario-linea" style="margin-bottom: 18px;">
                <strong>COORDINADORA DE</strong>
                <span class="campo campo-mediano"><?= isset($data[0]['area']) ? esc($data[0]['area']) : '' ?></span>
            </div>

            <div class="saludo-formal">
                <strong>P R E S E N T E</strong>
            </div>

            <!-- Cuerpo del oficio -->
            <div class="texto-cuerpo">
                En referencia al <strong>Oficio NO. MTM/CMPYB/</strong>
                <span class="campo campo-corto"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>, de fecha
                <span class="campo campo-mediano">
                    <?php 
                    if (isset($data[0]['created_at'])) {
                        $fecha = new DateTime($data[0]['created_at']);
                        $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                        echo $fecha->format('d') . ' DE ' . $meses[$fecha->format('n')-1] . ' DE ' . $fecha->format('Y');
                    }
                    ?>
                </span>,
                donde solicita se lleve a cabo la
                <span class="campo campo-largo"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>
                como lo especifica la
                <span class="campo campo-largo"><?= isset($data[0]['nombre_catalogo']) ? esc($data[0]['nombre_catalogo']) : '' ?></span>,
                me permito remitir a usted el estudio de mercado realizado por el área de la Coordinación de Recursos Materiales, para que en atención a lo estipulado en los Artículos 13 y 14 de la Ley de Contratación Pública del Estado de México y Municipios, 15 inciso b) del Reglamento, solicite al área de la Tesorería Municipal, suficiencia presupuestal por el monto del precio de referencia, para la compra en mención, remitiendo copia de la solicitud y respuesta de suficiencia a esta Dirección de Administración y Desarrollo de Personal para la integración al expediente de compra.
            </div>

            <div class="texto-cuerpo">
                Así mismo, le solicito amablemente elabore y remita a esta Dirección el <strong>Oficio Justificatorio</strong> que servirá de base en el procedimiento adquisitivo.
            </div>

            <div class="texto-cuerpo">
                Sin más por el momento, quedo atento a su apreciable respuesta.
            </div>

            <!-- Cierre formal centrado -->
            <div class="atentamente">
                A T E N T A M E N T E
            </div>
            <div class="frase-valores">
                "SERVIR CON VALORES"
            </div>

            <!-- Firma y cargo centrados -->
            <div class="firma-area">
                <div class="firma-linea">
                    C. MIRIAM VIANEY OVANDO RUBIO 
                </div>
                <div class="cargo-firma">
                    DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
                </div>
            </div>

            <!-- c.c.p. e iniciales -->
            <div class="copia-archivo">
                <strong>C. PAULO SERGIO HERNÁNDEZ CUADRIELLO</strong> 
            </div>
            <div class="iniciales">
                <strong>COORDINADOR DE ADQUISICIONES Y SERVICIOS</strong>
            </div>

            <!-- Número de página -->
            <div class="numero-pagina">
                1 de 1
            </div>
        </div>
    </div>
</body>
</html>