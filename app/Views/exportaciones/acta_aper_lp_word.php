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
            margin: 2.61cm 2.5cm 3cm 3cm;
        }

        body {
            font-family: "Century Gothic", "Gothic", sans-serif;
            font-size: 8pt;
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
            padding: 2.61cm 2.5cm 3cm 3cm;
            margin: 0 auto;
            background: white;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 8pt;
            line-height: 1.6;
            text-align: justify;
            font-family: "Century Gothic", "Gothic", sans-serif;
        }

        .encabezado {
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid #000000;
            padding-bottom: 8px;
            margin-bottom: 14px;
            font-size: 8pt;
        }

        .titulo {
            text-align: center;
            font-weight: bold;
            font-size: 11pt;
            margin-bottom: 4px;
        }

        .subtitulo {
            text-align: center;
            font-weight: bold;
            margin-bottom: 16px;
            line-height: 1.5;
            font-size: 9pt;
        }

        .texto {
            margin-bottom: 8px;
            font-size: 8pt;
        }

        .centrado {
            text-align: center;
        }

        .campo {
            display: inline-block;
            border-bottom: 1px solid #000;
            min-width: 80px;
            padding: 1px 4px;
            font-weight: bold;
            font-size: 8pt;
        }

        .campo-corto {
            min-width: 60px;
        }

        .campo-mediano {
            min-width: 150px;
        }

        .campo-largo {
            min-width: 250px;
        }

        .campo-chico {
            min-width: 70px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 12px;
            font-size: 8pt;
        }

        table th,
        table td {
            border: 1px solid #000000;
            padding: 5px 6px;
            vertical-align: top;
        }

        table th {
            text-align: center;
            font-weight: bold;
            font-size: 8pt;
        }

        .tabla-sin-bordes {
            border: none !important;
        }

        .tabla-sin-bordes th,
        .tabla-sin-bordes td {
            border: none !important;
            padding: 3px 0px;
            text-align: left;
        }

        .tabla-sin-bordes thead {
            display: none;
        }

        .orden-dia {
            margin-top: 10px;
            margin-bottom: 12px;
            padding-left: 12px;
            font-size: 8pt;
        }

        .orden-dia div {
            margin-bottom: 2px;
        }

        .firma-contenedor-unica {
            width: 100%;
            margin-top: 40px;
        }

        .firma-unica {
            border: 1px solid #000000;
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        .titulo-firma {
            font-weight: bold;
            text-transform: uppercase;
            padding: 20px 10px;
            border-bottom: 1px solid #000000;
        }

        .espacio-firma {
            height: 120px;
        }

        .linea-firma {
            font-weight: bold;
            padding-bottom: 10px;
        }

        .linea-firma::before {
            content: "";
            display: block;
            width: 300px;
            margin: 0 auto 8px auto;
            border-top: 1px solid #000000;
        }

        .firma-contenedor {
            width: 100%;
            margin-top: 35px;
        }

        .firma {
            width: 45%;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }

        .linea-firma-simple {
            border-top: 1px solid #000;
            margin-top: 50px;
            padding-top: 6px;
            font-weight: bold;
            font-size: 8pt;
        }

        .pie {
            margin-top: 15px;
            text-align: center;
            font-size: 7pt;
        }

        .numero-pagina {
            text-align: right;
            margin-top: 30px;
            font-size: 7pt;
            font-weight: bold;
        }

        .texto-italico {
            font-style: italic;
            border-left: 2px solid #000;
            padding-left: 10px;
            margin-left: 15px;
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
                padding: 2.61cm 2.5cm 3cm 3cm !important;
            }
        }
    </style>
</head>
<body>

<?php 
// ==============================================
// FUNCIONES AUXILIARES
// ==============================================

function formatearFechaEspanolActa($fechaString) {
    if (empty($fechaString)) return '';
    
    $fecha = new DateTime($fechaString);
    $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 
              'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
    
    return $fecha->format('d') . ' DE ' . $meses[$fecha->format('n')-1] . ' DE ' . $fecha->format('Y');
}

function formatearHoraActa($fechaString) {
    if (empty($fechaString)) return '';
    
    $fecha = new DateTime($fechaString);
    return $fecha->format('H:i');
}

function numeroATextoActa($numero) {
    $unidades = ['', 'UNO', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
    $especiales = [
        10 => 'DIEZ', 11 => 'ONCE', 12 => 'DOCE', 13 => 'TRECE', 14 => 'CATORCE', 15 => 'QUINCE',
        16 => 'DIECISÉIS', 17 => 'DIECISIETE', 18 => 'DIECIOCHO', 19 => 'DIECINUEVE',
        20 => 'VEINTE', 21 => 'VEINTIUNO', 22 => 'VEINTIDÓS', 23 => 'VEINTITRÉS', 24 => 'VEINTICUATRO',
        25 => 'VEINTICINCO', 26 => 'VEINTISÉIS', 27 => 'VEINTISIETE', 28 => 'VEINTIOCHO', 29 => 'VEINTINUEVE',
        30 => 'TREINTA', 31 => 'TREINTA Y UNO', 32 => 'TREINTA Y DOS', 33 => 'TREINTA Y TRES',
        34 => 'TREINTA Y CUATRO', 35 => 'TREINTA Y CINCO', 36 => 'TREINTA Y SEIS', 37 => 'TREINTA Y SIETE',
        38 => 'TREINTA Y OCHO', 39 => 'TREINTA Y NUEVE', 40 => 'CUARENTA', 41 => 'CUARENTA Y UNO',
        42 => 'CUARENTA Y DOS', 43 => 'CUARENTA Y TRES', 44 => 'CUARENTA Y CUATRO', 45 => 'CUARENTA Y CINCO',
        46 => 'CUARENTA Y SEIS', 47 => 'CUARENTA Y SIETE', 48 => 'CUARENTA Y OCHO', 49 => 'CUARENTA Y NUEVE',
        50 => 'CINCUENTA', 51 => 'CINCUENTA Y UNO', 52 => 'CINCUENTA Y DOS', 53 => 'CINCUENTA Y TRES',
        54 => 'CINCUENTA Y CUATRO', 55 => 'CINCUENTA Y CINCO', 56 => 'CINCUENTA Y SEIS', 57 => 'CINCUENTA Y SIETE',
        58 => 'CINCUENTA Y OCHO', 59 => 'CINCUENTA Y NUEVE'
    ];

    if (isset($especiales[$numero])) {
        return $especiales[$numero];
    }

    if ($numero < 10) {
        return $unidades[$numero];
    }

    return $numero;
}

function numeroAñoATextoActa($año) {
    $miles = floor($año / 1000);
    $resto = $año % 1000;

    $texto = '';

    if ($miles === 1) $texto .= 'UN MIL';
    else if ($miles === 2) $texto .= 'DOS MIL';
    else if ($miles === 3) $texto .= 'TRES MIL';

    if ($resto > 0) {
        if ($texto) $texto .= ' ';
        $texto .= numeroATextoActa($resto);
    }

    return $texto;
}

function formatearFechaLargaActa($fechaString) {
    if (empty($fechaString)) return '';
    
    $fecha = new DateTime($fechaString);
    $horas = $fecha->format('H');
    $minutos = $fecha->format('i');

    $horasTexto = numeroATextoActa((int)$horas);
    $minutosTexto = numeroATextoActa((int)$minutos);

    $dia = $fecha->format('d');
    $mes = $fecha->format('n');
    $año = $fecha->format('Y');

    $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO',
              'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];

    $añoTexto = numeroAñoATextoActa((int)$año);

    return "{$horasTexto} HORAS CON {$minutosTexto} MINUTOS DEL DÍA {$dia} DE {$meses[$mes-1]} DE {$añoTexto}";
}

// ==============================================
// PROCESAR DATOS
// ==============================================

$primerRegistro = isset($data[0]) ? $data[0] : null;
$totalProveedores = count($data);

// Función para obtener valor de objeto o array
function getValor($item, $campo, $default = '') {
    if (is_object($item)) {
        return isset($item->$campo) ? $item->$campo : $default;
    } elseif (is_array($item)) {
        return isset($item[$campo]) ? $item[$campo] : $default;
    }
    return $default;
}

// Datos del estudio
$noLicitacion = $primerRegistro ? getValor($primerRegistro, 'no_licitacion', '') : '';
$nombreEstudio = $primerRegistro ? getValor($primerRegistro, 'nombre_estudio', '') : '';
$coordinador = $primerRegistro ? getValor($primerRegistro, 'coordinador', '') : '';
$area = $primerRegistro ? getValor($primerRegistro, 'area', '') : '';
$createdAt = $primerRegistro ? getValor($primerRegistro, 'created_at', '') : '';
$fechaFallo = $primerRegistro ? getValor($primerRegistro, 'fecha_fallo', '17 DE DICIEMBRE') : '17 DE DICIEMBRE';
$horaFallo = $primerRegistro ? getValor($primerRegistro, 'hora_fallo', '13:00') : '13:00';
$idArea = $primerRegistro ? getValor($primerRegistro, 'id_area', '') : '';

$fechaFormateada = formatearFechaEspanolActa($createdAt);
$horaFormateada = formatearHoraActa($createdAt);
$fechaCierre = formatearFechaLargaActa($createdAt);

// Construir texto de participantes
$textoParticipantes = '';
foreach ($data as $index => $item) {
    if ($index > 0) {
        $textoParticipantes .= ' Y EL ';
    }
    
    $representante = getValor($item, 'representante_legal', '');
    $empresa = getValor($item, 'empresa', '');
    $tipoPersona = getValor($item, 'tipo_persona', '');
    $numCredencial = getValor($item, 'num_credencial_representante', '');
    
    $textoParticipantes .= "EL <span class=\"campo campo-mediano\">{$representante}</span>";
    $textoParticipantes .= " APODERADO LEGAL DE <span class=\"campo campo-mediano\">{$empresa}</span>";
    $textoParticipantes .= ", EN SU CARÁCTER DE <span class=\"campo campo-mediano\">{$tipoPersona}</span>";
    $textoParticipantes .= ", MISMO QUE SE IDENTIFICÓ CON CREDENCIAL PARA VOTAR CON NÚMERO DE FOLIO <span class=\"campo campo-mediano\">{$numCredencial}</span>";
    $textoParticipantes .= " EMITIDA POR EL INSTITUTO NACIONAL ELECTORAL";
}

$textoParticipantes .= "; Y CON FUNDAMENTO EN LO DISPUESTO EN LOS ARTÍCULOS 28 FRACCIÓN I, 35 FRACCIÓN I Y 36, DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS; 55 FRACCIÓN II, 67 FRACCIÓN V, 68 FRACCIÓN I, 82, 83, 84, 85 Y 86 FRACCIÓN I; DE SU RESPECTIVO REGLAMENTO, SE LLEVÓ A CABO EL ACTO EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS DEL PROCEDIMIENTO DE LICITACIÓN PÚBLICA NACIONAL PRESENCIAL LPNP{$noLicitacion}, PARA LA \"{$nombreEstudio}\"";

// Obtener datos para tablas (empresas únicas)
$empresasUnicas = [];
foreach ($data as $item) {
    $empresa = getValor($item, 'empresa', '');
    $representante = getValor($item, 'representante_legal', '');
    if (!isset($empresasUnicas[$empresa])) {
        $empresasUnicas[$empresa] = [
            'empresa' => $empresa,
            'representante' => $representante
        ];
    }
}
$empresasList = array_values($empresasUnicas);
?>

<!-- =====================================================
 HOJA 1
====================================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="encabezado">
            "2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO"
        </div>

        <div class="titulo">
            ACTA DE PRESENTACIÓN Y APERTURA DE PROPUESTAS
        </div>

        <div class="subtitulo">
            INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL
            <br>
            IRNP-<span class="campo campo-chico"><?= esc($noLicitacion) ?></span>
            <br>
            PARA LA "<span class="campo campo-largo"><?= esc($nombreEstudio) ?></span>"
        </div>

        <div class="texto">
            EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO A LAS
            <span class="campo campo-corto"><?= esc($horaFormateada) ?></span>
            HORAS DEL DÍA
            <span class="campo campo-chico"><?= esc($fechaFormateada) ?></span>,
            EN EL ÁREA DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL,
            SITO EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400,
        </div>

        <div class="texto">
            <?= $textoParticipantes ?>
        </div>

        <div class="centrado" style="font-weight:bold; margin-top:12px; font-size:8pt;">
            ORDEN DEL DÍA
        </div>

        <div class="orden-dia">
            <div>I. DECLARATORIA DE INICIO DEL ACTO;</div>
            <div>II. LECTURA AL REGISTRO DE ASISTENCIA AL ACTO DE LOS PARTICIPANTES Y SERVIDORES PÚBLICOS INVITADOS;</div>
            <div>III. DECLARATORIA DE ASISTENCIA DEL NÚMERO DE LICITANTES;</div>
            <div>IV. PRESENTACIÓN DE PROPUESTAS TÉCNICAS Y ECONÓMICAS;</div>
            <div>V. APERTURA DE PROPUESTAS TÉCNICAS;</div>
            <div>VI. REVISIÓN CUANTITATIVA DE PROPUESTAS TÉCNICAS;</div>
            <div>VII. DECLARATORIA DE ACEPTACIÓN O DESECHAMIENTO DE LAS PROPUESTAS TÉCNICAS;</div>
            <div>VIII. APERTURA DE PROPUESTAS ECONÓMICAS;</div>
            <div>IX. REVISIÓN CUANTITATIVA DE LAS PROPUESTAS ECONÓMICAS;</div>
            <div>X. DECLARATORIA DE ACEPTACIÓN O DESECHAMIENTO DE LAS PROPUESTAS ECONÓMICAS;</div>
            <div>XI. LUGAR, FECHA Y HORA PARA LA COMUNICACIÓN DEL FALLO;</div>
            <div>XII. ASUNTOS GENERALES.</div>
        </div>

        <div class="texto">
            <strong>I.</strong> <strong>EN DESAHOGO DEL PRIMER PUNTO DEL ORDEN DEL DÍA.</strong> – EL <span class="campo campo-mediano"><?= esc($coordinador) ?></span> SERVIDOR PÚBLICO DESIGNADO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL EN SU CARÁCTER DE CONVOCANTE EMITIÓ LA DECLARATORIA DE INICIO DEL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS DEL PRESENTE PROCEDIMIENTO ADQUISITIVO.
        </div>

        <div class="texto">
            <strong>II.</strong> <strong>EN DESAHOGO DEL SEGUNDO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO REALIZÓ EL PASE DE LISTA DE LOS ASISTENTES Y SE REGISTRARON PUNTUALMENTE EN LA LISTA DE ASITENCIA LOS LICITANTES QUE SE CITAN A CONTINUACIÓN:
        </div>

        <table style="font-weight: bold;">
            <thead>
                <tr>
                    <th>LICITANTE</th>
                    <th>REPRESENTANTE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empresasList as $emp): ?>
                <tr>
                    <td><?= esc($emp['empresa']) ?></td>
                    <td><?= esc($emp['representante']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="numero-pagina">1 DE 3</div>
    </div>
</div>

<!-- =====================================================
 HOJA 2
====================================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto">
            <strong>III.</strong> <strong>EN DESAHOGO DEL TERCER PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, HIZO MENCIÓN QUE AL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS SE PRESENTARON <span class="campo campo-corto"><?= $totalProveedores ?></span> DE <span class="campo campo-corto"><?= $totalProveedores ?></span> LICITANTES INVITADOS, POR LO QUE NO SE CUMPLIÓ CON EL NÚMERO DE LICITANTES QUE EXIGE LA LEY PARA LLEVAR A CABO EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS; ASÍ MISMO, SE INFORMO QUE LAS BASES SI FUERON ADQUIRIDAS POR TRES LICITANTES, MISMOS QUE PARTICIPARON EN EL ESTUDIO DE MERCADO. DE IGUAL MANERA SE LLEVÓ A CABO EL ACTO ANTES MENCIONADO CON FUNDAMENTO EN EL ARTÍCULO 36 FRACCIÓN II DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, QUE A LA LETRA DICE:
        </div>

        <div class="texto texto-italico">
            <strong>ARTÍCULO 36.-</strong> EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS SE CELEBRARÁ DE MANERA PÚBLICA Y EN PRESENCIA DE TODOS LOS OFERENTES, EN LA FORMA SIGUIENTE:
            <br>
            I...
            <br>
            <strong><u>II. LA APERTURA DE PROPUESTAS PODRÁ EFECTUARSE CUANDO SE HAYA PRESENTADO UNA PROPUESTA CUANDO MENOS.</u></strong>
            <br>
            III, IV, V, VI, VII Y VIII.
        </div>

        <div class="texto">
            <strong>IV.</strong> <strong>EN DESAHOGO DEL CUARTO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO SOLICITÓ A LOS LICITANTES LA PRESENTACIÓN DE LOS SOBRES QUE CONTENÍAN SUS <strong>PROPUESTAS TÉCNICAS Y ECONÓMICAS</strong>. ACTO SEGUIDO, PROCEDIÓ A VERIFICAR QUE LOS SOBRES CORRESPONDIENTES SE ENCONTRARAN DEBIDAMENTE SELLADOS Y FIRMADOS POR LOS LICITANTES, CONSTATANDO ASIMISMO QUE CUMPLIERAN CON LOS REQUISITOS ESTABLECIDOS EN LA CONVOCATORIA.
        </div>

        <div class="texto">
            <strong>V.</strong> <strong>EN DESAHOGO DEL QUINTO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, EN CONJUNTO CON LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A REALIZAR LA APERTURA DE LOS SOBRES QUE CONTENÍAN LAS PROPUESTAS TÉCNICA.
        </div>

        <div class="texto">
            <strong>VI.</strong> <strong>EN DESAHOGO DEL SEXTO PUNTO DEL ORDEN DEL DÍA.</strong> - EL SERVIDOR PÚBLICO DESIGNADO EN CONJUNTO CON LA REPRESENTANTE DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A VERIFICAR EN FORMA CUANTITATIVA, QUE LAS PROPUESTAS TÉCNICAS PRESENTADAS CONTARAN CON LA DOCUMENTACIÓN SOLICITADA. IGUALMENTE, PRECISÓ EL OBJETIVO DEL <strong>ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS</strong>, DESTACANDO QUE, DE CONFORMIDAD CON LO DISPUESTO EN LOS ARTÍCULOS 35 FRACCIÓN I, 36 FRACCIONES III Y V, Y 37 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS; 70 FRACCIONES XVIII Y XX, 87 FRACCIONES I Y IV Y 88 DE SU RESPECTIVO REGLAMENTO; ENTRE LAS CAUSAS POSIBLES DE DESECHAMIENTO DE LAS PROPUESTAS QUE SE PUDIERAN ENCONTRAR, SERÍA EL INCUMPLIMIENTO CUANTITATIVO DE CUALQUIERA DE LOS REQUISITOS O CONDICIONES ESTABLECIDOS EN LAS BASES EMITIDAS, QUE AFECTE DIRECTAMENTE LA SOLVENCIA DE DICHAS PROPUESTAS, POR LO QUE SE REALIZÓ LA VERIFICACIÓN DE LA DOCUMENTACIÓN DE LOS LICITANTES PARTICIPANTES DEJANDO CONSTANCIA EN EL LISTADO ANEXO AL PRESENTE. 
        </div>

        <div class="texto">
            <strong>VII.</strong> <strong>EN DESAHOGO DEL SÉPTIMO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, INFORMÓ QUE SE RECIBE PARA SU ANÁLISIS Y EVALUACIÓN DE LOS INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS, ASÍ COMO DEL ÁREA USUARIA LA PROPUESTA TÉCNICA Y DOCUMENTACIÓN COMPLEMENTARIA DEL LICITANTE QUE SE CITA A CONTINUACIÓN, EN VIRTUD DE QUE CUMPLE CUANTITATIVAMENTE CON LA DOCUMENTACIÓN REQUERIDA EN LAS BASES: 
        </div>

        <table class="tabla-sin-bordes" style="font-weight: bold;">
            <thead>
                <tr><th>EMPRESA</th></tr>
            </thead>
            <tbody>
                <?php foreach ($empresasList as $emp): ?>
                <tr><td><?= esc($emp['empresa']) ?></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="texto">
            <strong>VIII.</strong><strong> EN DESAHOGO DEL OCTAVO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, EN CONJUNTO CON LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A REALIZAR LA APERTURA DE LOS SOBRES QUE CONTENÍAN LAS PROPUESTAS ECONÓMICAS.
        </div>

        <div class="numero-pagina">2 DE 3</div>
    </div>
</div>

<!-- =====================================================
 HOJA 3
====================================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto">
            <strong>IX.</strong> <strong>EN DESAHOGO DEL NOVENO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO EN CONJUNTO CON LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A VERIFICAR, EN FORMA CUANTITATIVA, QUE LAS PROPUESTAS ECONÓMICAS PRESENTADAS CONTARAN CON LA DOCUMENTACIÓN SOLICITADA, POR LO QUE SE REALIZÓ LA VERIFICACIÓN DE LA DOCUMENTACIÓN DE LOS LICITANTES PARTICIPANTES DEJANDO EVIDENCIA EN EL LISTADO ANEXO AL PRESENTE.
        </div>

        <div class="texto">
            <strong>X.</strong> <strong>EN DESAHOGO DEL DÉCIMO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, ANUNCIÓ QUE SE ACEPTARON PARA SU <strong>ANÁLISIS Y EVALUACIÓN</strong> DE LOS INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS, ASÍ COMO DEL ÁREA USUARIA, LA PROPUESTA ECONÓMICA DEL LICITANTE QUE SE CITA A CONTINUACIÓN EN VIRTUD DE QUE CUMPLE CUANTITATIVAMENTE CON LA DOCUMENTACIÓN REQUERIDA: 
        </div>

        <table class="tabla-sin-bordes" style="font-weight: bold;">
            <thead>
                <tr><th>EMPRESA</th></tr>
            </thead>
            <tbody>
                <?php foreach ($empresasList as $emp): ?>
                <tr><td><?= esc($emp['empresa']) ?></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="texto">
            <strong>XI.</strong> <strong>EN DESAHOGO DEL DÉCIMO PRIMER PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, INFORMÓ A LOS ASISTENTES QUE EL FALLO DE ADJUDICACIÓN DEL PROCEDIMIENTO ADQUISITIVO, SE DARÍA A CONOCER EL DÍA <span class="campo campo-mediano"><?= esc($fechaFallo) ?></span> DEL PRESENTE AÑO A LAS <span class="campo campo-corto"><?= esc($horaFallo) ?></span> HORAS EN LA OFICINA QUE OCUPA LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.
        </div>

        <div class="texto">
            <strong>XII.</strong> <strong>EN DESAHOGO DEL DÉCIMO SEGUNDO PUNTO DEL ORDEN DEL DÍA.</strong> – ASUNTOS GENERALES, EL SERVIDOR PÚBLICO DESIGNADO, SOLICITÓ A LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, ASÍ COMO A LOS LICITANTES INFORMAR SI TENÍAN ALGÚN COMENTARIO ADICIONAL AL RESPECTO SOBRE EL DESARROLLO DEL PRESENTE ACTO. POR LO QUE NINGÚN ASISTENTE TUVO COMENTARIO ALGUNO Y FINALMENTE, SIN MEDIAR ALGÚN VICIO DE VOLUNTAD, EL SERVIDOR PÚBLICO DESIGNADO, LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL Y EL LICITANTE, EXPRESARON SU CONSENTIMIENTO RESPECTO A LOS ASPECTOS DESAHOGADOS EN EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS Y DIÓ POR TERMINADO EL ACTO EN MENCIÓN, A LAS <span class="campo campo-mediano"><?= esc($fechaCierre) ?></span>, FIRMADO AL MARGEN Y AL CALCE LOS SERVIDORES PÚBLICOS Y EL LICITANTE QUE EN ELLA INTERVINIERON, PARA SU DEBIDA CONSTANCIA LEGAL.
        </div>

        <div class="centrado" style="margin-top:12px; font-weight:bold; font-size:8pt;">
            POR "EL MUNICIPIO"
        </div>

        <div class="firma-contenedor-unica">
            <div class="firma-unica">
                <div class="titulo-firma">
                    <?= esc($area) ?><?= !empty($idArea) ? ' (ID: ' . esc($idArea) . ')' : '' ?>
                </div>
                <div class="espacio-firma"></div>
                <div class="linea-firma">
                    <?= esc($coordinador) ?>
                </div>
            </div>
        </div>

        <div style="clear:both;"></div>

        <div class="centrado" style="margin-top:25px; font-weight:bold; font-size:8pt;">
            POR "EL LICITANTE"
        </div>

        <table style="font-weight: bold;">
            <thead>
                <tr>
                    <th>LICITANTE</th>
                    <th>REPRESENTANTE</th>
                    <th>FIRMA</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empresasList as $emp): ?>
                <tr>
                    <td><?= esc($emp['empresa']) ?></td>
                    <td><?= esc($emp['representante']) ?></td>
                    <td style="height:60px;">&nbsp;</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="pie">
            LA PRESENTE ACTA SE FIRMA EN ORIGINAL, EXPIDIÉNDOSE COPIA SIMPLE A QUIENES LA SUSCRIBIERON.
        </div>

        <div class="numero-pagina">3 DE 3</div>
    </div>
</div>

</body>
</html>