<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Contrato de Adquisición</title>
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
            margin: 3.17cm 3cm 2.5cm 3cm;
        }

        body {
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 8pt;
            line-height: 1.7;
            color: #000000;
            background: white;
            margin: 0;
            padding: 0;
            text-transform: uppercase;
        }

        .hoja {
            width: 21cm;
            min-height: 29.7cm;
            padding: 3.17cm 3cm 2.5cm 3cm;
            margin: 0 auto;
            background: white;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 8pt;
            line-height: 1.7;
            text-align: justify;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
        }

        .encabezado {
            text-align: center;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .titulo {
            text-align: center;
            font-size: 13pt;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .subtitulo {
            text-align: center;
            font-size: 10pt;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .texto {
            margin-bottom: 12px;
        }

        .campo {
            display: inline-block;
            border-bottom: 1px solid #000;
            min-width: 120px;
            padding: 1px 4px;
            font-weight: bold;
        }

        .campo-corto {
            min-width: 90px;
        }

        .campo-mediano {
            min-width: 220px;
        }

        .campo-largo {
            min-width: 420px;
        }

        .campo-chico {
            min-width: 60px;
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
            padding: 7px;
            vertical-align: top;
        }

        table th {
            text-align: center;
            font-weight: bold;
            background: #f5f5f5;
        }

        .numero-pagina {
            text-align: right;
            margin-top: 30px;
            font-size: 8pt;
            font-weight: bold;
        }

        .firma {
            margin-top: 70px;
            width: 45%;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }

        .firma-completa {
            margin-top: 70px;
            width: 100%;
            text-align: center;
        }

        .linea {
            border-top: 1px solid #000;
            padding-top: 8px;
            text-align: center;
            font-weight: bold;
        }

        .clear {
            clear: both;
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
                padding: 3.17cm 3cm 2.5cm 3cm !important;
            }
        }
    </style>
</head>
<body>

<?php
// Función auxiliar para convertir números a letras
function numeroALetrasWord($numero) {
    $numero = intval($numero);
    if ($numero === 0) return 'CERO';
    
    $unidades = ['', 'UNO', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
    $especiales = [
        10 => 'DIEZ', 11 => 'ONCE', 12 => 'DOCE', 13 => 'TRECE', 14 => 'CATORCE', 15 => 'QUINCE',
        16 => 'DIECISÉIS', 17 => 'DIECISIETE', 18 => 'DIECIOCHO', 19 => 'DIECINUEVE',
        20 => 'VEINTE', 30 => 'TREINTA', 40 => 'CUARENTA', 50 => 'CINCUENTA',
        60 => 'SESENTA', 70 => 'SETENTA', 80 => 'OCHENTA', 90 => 'NOVENTA'
    ];
    
    if ($numero < 10) return $unidades[$numero];
    if (isset($especiales[$numero])) return $especiales[$numero];
    if ($numero < 30) {
        return 'VEINTI' . $unidades[$numero - 20];
    }
    if ($numero < 100) {
        $decena = floor($numero / 10) * 10;
        $unidad = $numero % 10;
        return $unidad === 0 ? $especiales[$decena] : $especiales[$decena] . ' Y ' . $unidades[$unidad];
    }
    if ($numero < 1000) {
        $centena = floor($numero / 100);
        $resto = $numero % 100;
        if ($centena === 1 && $resto === 0) return 'CIEN';
        if ($centena === 1) return 'CIENTO ' . numeroALetrasWord($resto);
        return $unidades[$centena] . 'CIENTOS ' . numeroALetrasWord($resto);
    }
    if ($numero < 1000000) {
        $miles = floor($numero / 1000);
        $resto = $numero % 1000;
        if ($miles === 1) {
            return $resto === 0 ? 'MIL' : 'MIL ' . numeroALetrasWord($resto);
        }
        return numeroALetrasWord($miles) . ' MIL ' . numeroALetrasWord($resto);
    }
    return $numero;
}

// Obtener datos del ganador y segundo lugar
$ganador = isset($data[0]) ? $data[0] : [];
$segundo = isset($data[1]) ? $data[1] : [];

// Construir nombre completo del proveedor
$nombre_completo = trim(
    (isset($ganador['nombre_proveedor']) ? $ganador['nombre_proveedor'] : '') . ' ' .
    (isset($ganador['apellido_paterno_proveedor']) ? $ganador['apellido_paterno_proveedor'] : '') . ' ' .
    (isset($ganador['apellido_materno_proveedor']) ? $ganador['apellido_materno_proveedor'] : '')
);

// Construir nombre completo del coordinador
$nombre_completo_coordinado = trim(
    (isset($ganador['coordinador_nombre']) ? $ganador['coordinador_nombre'] : '') . ' ' .
    (isset($ganador['coordinador_apellido_paterno']) ? $ganador['coordinador_apellido_paterno'] : '') . ' ' .
    (isset($ganador['coordinador_apellido_materno']) ? $ganador['coordinador_apellido_materno'] : '')
);

// Calcular porcentajes
$subtotal = isset($ganador['subtotal']) ? floatval($ganador['subtotal']) : 0;
$diez_porciento = $subtotal * 0.10;
$cinco_porciento = $subtotal * 0.05;

// Datos persona moral
$datosPersonaMoral = trim(implode(' ', array_filter([
    isset($ganador['instrumento_re']) ? $ganador['instrumento_re'] : '',
    isset($ganador['folio_re']) ? $ganador['folio_re'] : '',
    isset($ganador['notario']) ? $ganador['notario'] : '',
    isset($ganador['titular']) ? $ganador['titular'] : ''
])));

$registrosRE = trim(implode(' ', array_filter([
    isset($ganador['razon_social']) ? $ganador['razon_social'] : '',
    isset($ganador['num_credencial_representante']) ? $ganador['num_credencial_representante'] : '',
    isset($ganador['rfc_moral']) ? $ganador['rfc_moral'] : '',
    isset($ganador['giro_economico']) ? $ganador['giro_economico'] : ''
])));

// Formatear fecha
$fecha_texto = '';
if (isset($ganador['created_at'])) {
    $fecha = new DateTime($ganador['created_at']);
    $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
    $fecha_texto = 'A LOS ' . numeroALetrasWord($fecha->format('d')) . ' DÍAS DEL MES DE ' . $meses[$fecha->format('n')-1] . ' DEL AÑO ' . numeroALetrasWord($fecha->format('Y'));
}
?>

<!-- ================= HOJA 1 ================= -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="encabezado">
            “2025. BICENTENARIO DE LA VIDA MUNICIPAL EN EL ESTADO DE MÉXICO”
        </div>

        <div class="encabezado">
            CONTRATO PARA LA “<span class="campo campo-mediano"><?= isset($ganador['nombre_estudio']) ? esc($ganador['nombre_estudio']) : '' ?></span>”
        </div>

        <div class="titulo">
            <span class="campo campo-chico"><?= isset($ganador['no_licitacion']) ? esc($ganador['no_licitacion']) : '' ?></span>
        </div>

        <div class="texto">
            CONTRATO QUE CELEBRAN POR UNA PARTE EL MUNICIPIO CONSTITUCIONAL DE TEMASCALCINGO, MÉXICO,
            REPRESENTADO EN ESTE ACTO POR LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU
            CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL; <strong>C. RAMIRO GALINDO REYES</strong>,
            SECRETARIO DEL AYUNTAMIENTO; <strong>C. JOSÉ HUMBERTO SÁNCHEZ HERNÁNDEZ</strong>,
            COORDINADOR MUNICIPAL DE PROTECCIÓN CIVIL Y BOMBEROS Y ÁREA USUARIA; QUIÉN EN LO SUCESIVO Y
            PARA LOS EFECTOS DEL PRESENTE SE LE DENOMINARÁ <strong>“EL MUNICIPIO”</strong>; Y POR OTRA
            PARTE <strong><span class="campo campo-mediano"><?= isset($ganador['nombre_empresa']) ? esc($ganador['nombre_empresa']) : '' ?></span></strong>,
            REPRESENTADO EN ESTE ACTO POR EL <strong><span class="campo campo-mediano"><?= esc($nombre_completo) ?></span></strong> A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ
            <strong>“EL PROVEEDOR”</strong>, AL TENOR DE LAS DECLARACIONES Y CLÁUSULAS SIGUIENTES:
        </div>

        <div class="subtitulo">DECLARACIONES</div>

        <div class="texto"><strong>I. “EL MUNICIPIO” DECLARA:</strong></div>
        <div class="texto">1. QUE CON ARREGLO A LO PREVISTO POR LOS ARTÍCULOS 115, DE LA CONSTITUCIÓN
            POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS; 113, 116, 123, Y 125, DE LA CONSTITUCIÓN POLÍTICA
            DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, 31, FRACCIÓN XVIII, DE LA LEY ORGÁNICA MUNICIPAL DEL
            ESTADO DE MÉXICO; ASÍ COMO LOS ARTÍCULOS 65, 66, 67, 68, 69, 70, 71, 72, 73, 74 Y 75 DE LEY
            DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO EL 120, 123, 124, 125 Y
            127 DEL REGLAMENTO; EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, TIENE LA ATRIBUCIÓN PARA CELEBRAR
            EL PRESENTE CONTRATO.</div>
        <div class="texto">2. QUE LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE
            PRESIDENTA MUNICIPAL CONSTITUCIONAL, ESTÁ FACULTADA PARA CONOCER, OTORGAR Y SUSCRIBIR ESTE
            CONTRATO.</div>
        <div class="texto">3. QUE EL <strong>C. RAMIRO GALINDO REYES</strong>, EN SU CARÁCTER DE
            SECRETARIO DEL AYUNTAMIENTO, EN TÉRMINOS DE LO QUE ESTABLECE EL ARTÍCULO 91 FRACCIÓN V DE LA
            LEY ORGÁNICA MUNICIPAL, TIENE LA ATRIBUCIÓN DE VALIDAR CON SU FIRMA LOS DOCUMENTOS OFICIALES
            EMANADOS DE “EL MUNICIPIO” Y DE CUALQUIERA DE SUS MIEMBROS.</div>
        <div class="texto">4. LAS DEPENDENCIAS Y ENTIDADES DE LA ADMINISTRACIÓN PÚBLICA MUNICIPAL
            CONDUCIRÁN SUS ACCIONES CON BASE A LOS PROGRAMAS ANUALES QUE ESTABLECE EL MUNICIPIO PARA EL
            LOGRO DE SUS OBJETIVOS.</div>
        <div class="texto">5. QUE TIENE ESTABLECIDO SU DOMICILIO EN <span class="campo campo-mediano"><?= isset($ganador['domicilio_proveedor']) ? esc($ganador['domicilio_proveedor']) : '' ?></span>, MISMO
            QUE SE SEÑALA PARA LOS FINES Y EFECTOS LEGALES DEL PRESENTE INSTRUMENTO.</div>
        <div class="texto">MANIFIESTA “EL MUNICIPIO” QUE TIENE EN SU HABER RECURSOS PECUNIARIOS
            PROVENIENTES DE RECURSOS <strong><span class="campo campo-mediano"><?= isset($segundo['nombre_empresa']) ? esc($segundo['nombre_empresa']) : '' ?></span></strong> PARA LA <strong><span class="campo campo-mediano"><?= isset($segundo['nombre_estudio']) ? esc($segundo['nombre_estudio']) : '' ?></span></strong></div>
        <div class="texto">6. CONFORME A CONTROL PRESUPUESTAL AUTORIZADO POR LA TESORERÍA MUNICIPAL.</div>
        <div class="texto">QUE LA ADJUDICACIÓN DEL CONTRATO SE REALIZÓ MEDIANTE PROCEDIMIENTO POR
            <strong>LICITACIÓN PÚBLICA NACIONAL PRESENCIAL LPNP <span class="campo campo-chico"><?= isset($segundo['no_licitacion']) ? esc($segundo['no_licitacion']) : '' ?></span></strong>, DE CONFORMIDAD CON LOS
            ARTÍCULOS 3, 26, 28, 29, 30 FRACCIÓN I, 32, 33, 35, 36 Y 37 DE LA LEY DE CONTRATACIÓN
            PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, 61 Y67 FRACCIÓN IX DE SU RESPECTIVO REGLAMENTO;
            ASÍ COMO EN LO ESTABLECIDO EN EL PUNTO 3.1 DE LAS BASES QUE SE EMITIERON PARA EL
            PROCEDIMIENTO EN MENCIÓN.
        </div>

        <div class="numero-pagina">1 DE 8</div>
    </div>
</div>

<!-- ================= HOJA 2 ================= -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto"><strong>II. DE “EL PROVEEDOR”, BAJO PROTESTA DE DECIR VERDAD DECLARA:</strong></div>
        <div class="texto">1. QUE ES UNA EMPRESA CONSTITUIDA LEGALMENTE DE ACUERDO CON LAS LEYES DE
            NUESTRO PAÍS, QUE, CON LA SUSCRIPCIÓN DEL PRESENTE CONTRATO, CUMPLE CON UNO DE LOS FINES
            ESTABLECIDOS DENTRO DE SU OBJETO SOCIAL, SEGÚN LO ACREDITA CON <strong><span class="campo campo-largo"><?= esc($registrosRE) ?></span></strong>, QUE SU MISMA QUE CUENTA CON EL REGISTRO PÚBLICO DE COMERCIO NÚMERO <span class="campo campo-chico"><?= isset($ganador['registro_publico']) ? esc($ganador['registro_publico']) : '' ?></span></div>
        CON FECHA <span class="campo campo-largo"><?= $fecha_texto ?></span>
        <div class="texto">2. QUE EL <strong><span class="campo campo-mediano"><?= isset($ganador['representante_legal']) ? esc($ganador['representante_legal']) : '' ?></span></strong>, EN SU CARÁCTER DE REPRESENTANTE LEGAL, COMO LO ACREDITA CON
            <strong><span class="campo campo-largo"><?= esc($datosPersonaMoral) ?></span></strong>, ANTE LA FE DEL <span class="campo campo-mediano"><?= isset($ganador['notario']) ? esc($ganador['notario']) : '' ?></span>, NOTARIO PÚBLICO AUXILIAR DE LA NOTARÍA
            PUBLICA NÚMERO TRECE TITULAR, DE LAS QUE ESTÁ EN EJERCICIO EN EL DISTRITO
            JUDICIAL DE PUEBLA, CUYO TITULAR LO ES EL <span class="campo campo-mediano"><?= isset($ganador['titular']) ? esc($ganador['titular']) : '' ?></span> ACTUANDO EN SU PROTOCOLO Y CON SU
            SELLO DE AUTORIZAR, EN EL ESTADO DE LA HEROICA PUEBLA DE ZARAGOZA, ESTADO DE PUEBLA, PUEBLA
            MÉXICO, BAJO PROTESTA DE DECIR VERDAD, MANIFIESTA QUE CUENTA CON FACULTADES SUFICIENTES PARA
            OBLIGAR A SU REPRESENTADA EN TÉRMINOS DEL PRESENTE CONTRATO, MISMAS QUE A LA FECHA NO LE HAN
            SIDO LIMITADAS, MODIFICADAS O REVOCADAS, Y EN CASO CONTRARIO, ESTÁ ANUENTE EN QUEDAR
            OBLIGADO A TÍTULO PERSONAL DE LOS COMPROMISOS CONTRAÍDOS POR SU REPRESENTADA Y SE IDENTIFICA
            CON CREDENCIAL PARA VOTAR CON NÚMERO <strong><span class="campo campo-chico"><?= isset($ganador['num_credencial_representante']) ? esc($ganador['num_credencial_representante']) : '' ?></span></strong> EXPEDIDA POR EL INSTITUTO NACIONAL
            ELECTORAL 
        </div>
        <div class="texto">3. QUE SU REGISTRO FEDERAL DE CONTRIBUYENTES ES <strong><span class="campo campo-chico"><?= isset($ganador['rfc_moral']) ? esc($ganador['rfc_moral']) : '' ?></span></strong>.</div>
        <div class="texto">4. QUE CONOCE LAS ESPECIFICACIONES DEL PROCEDIMIENTO DE LICITACIÓN PÚBLICA
            NACIONAL PRESENCIAL REFERENTE A LA <strong><span class="campo campo-mediano"><?= isset($ganador['nombre_estudio']) ? esc($ganador['nombre_estudio']) : '' ?></span></strong> QUE LLEVA A CABO EL MUNICIPIO DE
            TEMASCALCINGO Y DEMÁS DOCUMENTOS QUE SE ENCUENTRAN INTEGRADOS AL EXPEDIENTE QUE SE FORMÓ CON
            MOTIVO DEL PROCEDIMIENTO DE ADQUISICIÓN ANTES REFERIDO.</div>
        <div class="texto">5. QUE CONOCE PLENAMENTE LAS DISPOSICIONES, QUE PARA EL CASO DE LA
            CONTRATACIÓN DE SERVICIOS SE ESTABLECE EN LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS
            MEXICANOS, LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, LA LEY DE
            CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO SU RESPECTIVO REGLAMENTO.
        </div>
        <div class="texto">6. QUE BAJO PROTESTA DE DECIR VERDAD LA PERSONA QUE REPRESENTA NO SE
            ENCUENTRA EN NINGUNO DE LOS SUPUESTOS QUE ESTABLECE EL ARTÍCULO 74 DE LA LEY DE CONTRATACIÓN
            PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

        <div class="texto"><strong>III. DE LAS “PARTES”</strong></div>
        <div class="texto">1. QUE EN VIRTUD DE LAS DECLARACIONES QUE ANTECEDEN, Y UNA VEZ QUE SE HAN
            RECONOCIDO SU CAPACIDAD Y PERSONALIDAD, CONVIENEN EXPRESAMENTE EN SUJETARSE A LAS
            SIGUIENTES:</div>
        <div class="texto"><strong>DEFINICIONES.</strong> “LAS PARTES” CONVIENEN QUE, PARA LOS EFECTOS
            DEL PRESENTE CONTRATO, SE ENTENDERÁ POR:</div>
        <div class="texto">1. LEY: LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
        <div class="texto">2. REGLAMENTO: EL REGLAMENTO DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE
            MÉXICO Y MUNICIPIOS.</div>

        <div class="subtitulo">CLÁUSULAS</div>

        <div class="texto"><strong>PRIMERA. - OBJETO.</strong> “EL MUNICIPIO” ENCOMIENDA A “EL
            PROVEEDOR” LLEVAR A CABO EL SUMINISTRO DE <strong><span class="campo campo-largo"><?= isset($ganador['nombre_estudio']) ? esc($ganador['nombre_estudio']) : '' ?></span></strong>.</div>

        <table>
            <thead>
                <tr>
                    <th style="width:10%;">PARTIDA</th>
                    <th style="width:40%;">DESCRIPCIÓN DE LOS BIENES</th>
                    <th style="width:15%;">MARCA Y MODELO OFERTADO</th>
                    <th style="width:15%;">UNIDAD DE MEDIDA</th>
                    <th style="width:20%;">CANTIDAD</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($productos)): ?>
                    <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= isset($producto['partida']) ? esc($producto['partida']) : '' ?></td>
                        <td>
                            <?= isset($ganador['nombre_estudio']) ? esc($ganador['nombre_estudio']) : '' ?>
                            <br><br>
                            CARACTERÍSTICAS MÍNIMAS DE LA UNIDAD
                            <br><br>
                            <?= isset($producto['descripcion']) ? esc($producto['descripcion']) : '' ?>
                            <br><br>
                            CARACTERÍSTICAS DEL PRODUCTO
                            <br>
                            <?= isset($producto['descripcion']) ? esc($producto['descripcion']) : '' ?>
                        </td>
                        <td><?= isset($producto['marca_modelo']) ? esc($producto['marca_modelo']) : '' ?></td>
                        <td><?= isset($producto['unidad_medida']) ? esc($producto['unidad_medida']) : '' ?></td>
                        <td><?= isset($producto['cantidad']) ? esc($producto['cantidad']) : '' ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">NO HAY PRODUCTOS REGISTRADOS</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="numero-pagina">2 DE 8</div>
    </div>
</div>

<!-- ================= HOJA 3 ================= -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto"><strong>SEGUNDA. -- IMPORTE.</strong> LA CANTIDAD TOTAL A PAGAR POR PARTE DE
            “EL MUNICIPIO” SERÁ DE <strong>$<span class="campo campo-chico"><?= number_format($subtotal, 2) ?></span> (<span class="campo campo-chico"><?= numeroALetrasWord(floor($subtotal)) ?> PESOS <?= str_pad(round(($subtotal - floor($subtotal)) * 100), 2, '0', STR_PAD_LEFT) ?>/100 M.N.</span>) INCLUIDO EL
                IMPUESTO AL VALOR AGREGADO I.V.A.</strong> PAGADO EN UNA SOLA EXHIBICIÓN.</div>
        <div class="texto"><strong>TERCERA. - ANTICIPO.</strong> “EL MUNICIPIO” NO OTORGARÁ A “EL
            PROVEEDOR” ANTICIPO ALGUNO, MOTIVO DEL PRESENTE CONTRATO.</div>
        <div class="texto"><strong>CUARTA. - “LAS PARTES”</strong> CONVIENEN QUE LOS PRECIOS OFERTADOS
            SERÁN FIJOS Y POR NINGÚN MOTIVO PODRÁN MODIFICARSE.</div>
        <div class="texto"><strong>QUINTA:</strong> “LAS PARTES” ACUERDAN QUE EL PAGO POR LA <strong><span class="campo campo-largo"><?= isset($ganador['nombre_estudio']) ? esc($ganador['nombre_estudio']) : '' ?></span></strong> OBJETO DEL
            PRESENTE CONTRATO, SE CUBRIRÁ DE LA MANERA SIGUIENTE:</div>
        <div class="texto">I. “EL PROVEEDOR” ENTREGARÁ SU FACTURA A MÁS TARDAR A LOS DIEZ DÍAS HÁBILES
            POSTERIORES A LA ENTREGA TOTAL DE LOS BIENES CON SU RESPECTIVO XML PARA TRÁMITE DE PAGO EN
            LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN LAS INSTALACIONES DEL EX
            SEMINARIO UBICADAS EN AV. DE LA PAZ ESQUINA MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO,
            MÉXICO, C.P. 50400.</div>
        <div class="texto">II. “EL MUNICIPIO” SE COMPROMETE Y OBLIGA A PAGAR LA CANTIDAD ANTES
            MENCIONADA EN UNA SOLA EXHIBICIÓN, LA FACTURA SE ENTREGARÁ EN LA DIRECCIÓN DE ADMINISTRACIÓN
            Y DESARROLLO DE PERSONAL.</div>
        <div class="texto">III. “EL MUNICIPIO”, HARÁ EL PAGO A “EL PROVEEDOR”, MEDIANTE TRANSFERENCIA
            ELECTRÓNICA.</div>
        <div class="texto"><strong>SEXTA:</strong> PARA EL CUMPLIMIENTO DEL OBJETO DEL PRESENTE CONTRATO
            “EL PROVEEDOR” SE OBLIGA A:</div>
        <div class="texto">I. ENTREGAR A EL MUNICIPIO DE TEMASCALCINGO MÉXICO UNA AMBULANCIA, DERIVADO
            DEL PROCEDIMIENTO DE LICITACIÓN PÚBLICA NACIONAL PRESENCIAL EN LOS TÉRMINOS PACTADOS DENTRO
            DE LA CLÁUSULA PRIMERA DE ESTE INSTRUMENTO.</div>
        <div class="texto">II. INFORMAR A “EL MUNICIPIO” DE CUALQUIER ANOMALÍA QUE SE PRESENTE DURANTE
            LA EJECUCIÓN DEL PRESENTE CONTRATO, EN CUANTO IMPIDA O DIFICULTE LLEVAR A CABO EL SUMINISTRO
            DEL PROCEDIMIENTO REFERENTE A LA <strong><span class="campo campo-mediano"><?= isset($ganador['nombre_estudio']) ? esc($ganador['nombre_estudio']) : '' ?></span></strong> COMUNICAR POR ESCRITO OPORTUNAMENTE A “EL
            MUNICIPIO” CUALQUIER CAMBIO DE DOMICILIO.</div>
        <div class="texto">III. CUMPLIR CON LAS DEMÁS OBLIGACIONES QUE DERIVEN DEL PRESENTE CONTRATO.</div>
        <div class="texto"><strong>SEPTIMA. TIEMPO Y LUGAR DE ENTREGA:</strong> LA ENTREGA SE LLEVARÁ A
            CABO DENTRO DE LOS CUARENTA DÍAS HÁBILES POSTERIORES A LA FIRMA DEL PRESENTE CONTRATO EN LA
            DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, UBICADO EN AV. DE LA PAZ ESQ. MIGUEL
            HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>

        <div class="numero-pagina">3 DE 8</div>
    </div>
</div>

<!-- ================= HOJA 4 ================= -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto"><strong>OCTAVA. - DE LAS GARANTÍAS.</strong> “EL PROVEEDOR” DEBERÁ ENTREGAR A
            “EL MUNICIPIO” LAS GARANTÍAS SIGUIENTES:</div>
        <div class="texto">I. <strong>CUMPLIMIENTO DE CONTRATO:</strong> SE CONSTITUIRÁ POR EL 10% DEL
            IMPORTE DEL SUBTOTAL DEL CONTRATO (SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO), DENTRO DE LOS
            DIEZ DÍAS HÁBILES POSTERIORES A LA FIRMA DE CONTRATO EN CASO DE APLAZAR LA ENTREGA DE LOS
            BIENES, POR LA CANTIDAD DE <strong>$<span class="campo campo-chico"><?= number_format($diez_porciento, 2) ?></span> (<span class="campo campo-chico"><?= numeroALetrasWord(floor($diez_porciento)) ?> PESOS <?= str_pad(round(($diez_porciento - floor($diez_porciento)) * 100), 2, '0', STR_PAD_LEFT) ?>/100 M.N.</span>)</strong> Y ESTARÁ
            VIGENTE HASTA EL CUMPLIMIENTO DEL PRESENTE CONTRATO.</div>
        <div class="texto">II. <strong>VICIOS OCULTOS:</strong> SE CONSTITUIRÁ POR EL 5% DEL IMPORTE DEL
            SUBTOTAL DEL CONTRATO (SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO), DENTRO DE LOS CINCO DÍAS
            HÁBILES POSTERIORES A LA ENTREGA TOTAL DE LOS BIENES, POR LA CANTIDAD DE <strong>$<span class="campo campo-chico"><?= number_format($cinco_porciento, 2) ?></span> (<span class="campo campo-chico"><?= numeroALetrasWord(floor($cinco_porciento)) ?> PESOS <?= str_pad(round(($cinco_porciento - floor($cinco_porciento)) * 100), 2, '0', STR_PAD_LEFT) ?>/100 M.N.</span>)</strong> Y ESTARÁ VIGENTE DURANTE UN AÑO.</div>
        <div class="texto">III. LA FIANZA DEBERÁ CONTENER LAS SIGUIENTES DECLARACIONES EXPRESAS DE LA
            AFIANZADORA: QUE LA FIANZA SE OTORGA EN LOS TÉRMINOS DEL PRESENTE CONTRATO.<br>
            a. SE EMITIRÁ A NOMBRE DEL <strong>“MUNICIPIO DE TEMASCALCINGO MÉXICO”</strong><br>
            b. QUE PARA CANCELAR LA FIANZA SERÁ REQUISITO INDISPENSABLE LA CONFORMIDAD EXPRESA Y POR
            ESCRITO DE “EL MUNICIPIO”, QUIEN LO EMITIRÁ SOLO CUANDO “EL PROVEEDOR” HAYA CUMPLIDO UN AÑO
            DE LA EMISIÓN DE ESTA.<br>
            c. QUE LA INSTITUCIÓN AFIANZADORA ACEPTA EXPRESAMENTE LO PRECEPTUADO EN LOS ARTÍCULOS 93, 94
            Y 118 DE LA LEY FEDERAL DE LAS INSTITUCIONES DE SEGUROS Y FIANZAS VIGENTE.<br>
            d. QUE “EL MUNICIPIO” HARÁ EFECTIVA LA FIANZA A PARTIR DEL INCUMPLIMIENTO DE CUALQUIER
            OBLIGACIÓN CONSIGNADA EN TODAS Y CADA UNA DE LAS CLÁUSULAS DEL PRESENTE CONTRATO, POR LA
            CANTIDAD EN DINERO QUE SE ORIGINE.</div>

        <div class="texto"><strong>NOVENA. - RESCISIÓN ORIGINADA POR LA NO PRESENTACIÓN DE LA
                GARANTÍA.</strong> PARA EL CASO DE QUE “EL PROVEEDOR” NO PRESENTE LA GARANTÍA DESCRITA
            EN LA FRACCIÓN I DE LA CLÁUSULA OCTAVA DEL PRESENTE CONTRATO, SE RESCINDIRÁ EL MISMO,
            DEBIENDO PAGAR ÉSTE A “EL MUNICIPIO” LOS DAÑOS Y PERJUICIOS QUE ELLO LE OCASIONE, ASÍ COMO
            LAS DEMÁS SANCIONES QUE EL PRESENTE CONTRATO ESTABLECE.</div>

        <div class="numero-pagina">4 DE 8</div>
    </div>
</div>

<!-- ================= HOJA 5 ================= -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto"><strong>DÉCIMA.</strong> - “EL MUNICIPIO” PODRÁ INICIAR EL PROCEDIMIENTO DE
            RESCISIÓN DEL PRESENTE CONTRATO, SIN RESPONSABILIDAD ALGUNA PARA ÉL, POR LAS SIGUIENTES
            CAUSAS IMPUTABLES A “EL PROVEEDOR”:</div>
        <div class="texto">I. NO ENTREGUE LA GARANTÍA ESTABLECIDA EN LA CLÁUSULA OCTAVA EN LOS PLAZOS
            ESTIPULADOS.</div>
        <div class="texto">II. SI “EL PROVEEDOR” NO DA LAS FACILIDADES NECESARIAS A LOS SUPERVISORES QUE
            AL EFECTO DESIGNE “EL MUNICIPIO” PARA LLEVAR A CABO LA REVISIÓN DE LOS BIENES ADQUIRIDOS.</div>
        <div class="texto">III. SI “EL PROVEEDOR” CEDE, TRASPASA O SUBCONTRATA LA TOTALIDAD O PARTE DE
            LOS BIENES ADQUIRIDOS SIN EL CONSENTIMIENTO POR ESCRITO DE “EL MUNICIPIO” Y SI CEDE A
            TERCEROS EN FORMA PARCIAL O TOTAL LOS DERECHOS Y OBLIGACIONES, Y LOS DERECHOS DE COBRO
            DERIVADOS DEL PRESENTE CONTRATO, SIN OBTENER LA AUTORIZACIÓN PREVIA POR ESCRITO DE “EL
            MUNICIPIO”.</div>
        <div class="texto">IV. SI ES DECLARADO EN PROCEDIMIENTO ADQUISITIVO MERCANTIL, QUIEBRA O
            SUSPENSIÓN DE PAGOS, EN TÉRMINOS DE LO QUE ESTABLECE LA LEY DE PROCEDIMIENTO ADQUISITIVOS
            MERCANTILES.</div>
        <div class="texto">V. CAMBIE SU NACIONALIDAD MEXICANA POR OTRA.</div>
        <div class="texto">VI. SIENDO EXTRANJERO INVOQUE LA PROTECCIÓN DE SU GOBIERNO EN RELACIÓN AL
            PRESENTE CONTRATO.</div>
        <div class="texto">VII. EN GENERAL, POR INCUMPLIMIENTO DE CUALESQUIERA DE LAS OBLIGACIONES
            DERIVADAS DEL PRESENTE CONTRATO, EL CÓDIGO, EL REGLAMENTO, LOS TRATADOS Y DEMÁS
            DISPOSICIONES APLICABLES.</div>
        <div class="texto">VIII. POR CUALQUIER OTRA CAUSA IMPUTABLE A ÉL, SIMILAR A LAS ANTES
            MENCIONADAS.</div>
        <div class="texto"><strong>DÉCIMA PRIMERA. - AUSENCIA DE VICIOS EN EL CONSENTIMIENTO.</strong>
            LAS “PARTES” MANIFIESTAN QUE EN EL PRESENTE CONTRATO NO EXISTE ERROR, LESIÓN, DOLO,
            VIOLENCIA, NI CUALQUIER OTRO VICIO DEL CONSENTIMIENTO QUE PUDIESE IMPLICAR SU NULIDAD Y QUE
            LAS DEMÁS PRESTACIONES QUE SE RECIBEN SON DE IGUAL VALOR, POR LO TANTO, RENUNCIAN A
            CUALQUIER ACCIÓN QUE LA LEY PUDIERA OTORGARLES A SU FAVOR, POR ESTE CONCEPTO.</div>
        <div class="texto"><strong>DÉCIMA SEGUNDA. -- MODIFICACIÓN.</strong> - “EL MUNICIPIO” DENTRO DE
            SU PRESUPUESTO APROBADO PODRÁ MODIFICAR EL PRESENTE CONTRATO, DE CONFORMIDAD A LO
            ESTABLECIDO EN EL ARTÍCULO 125 DEL “REGLAMENTO”.</div>

        <div class="numero-pagina">5 DE 8</div>
    </div>
</div>

<!-- ================= HOJA 6 ================= -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto"><strong>DÉCIMA TERCERA. -- LEGISLACIÓN.</strong> ESTE CONTRATO SE RIGE POR LO
            ESTABLECIDO EN LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y SU RESPECTIVO
            REGLAMENTO.</div>
        <div class="texto"><strong>DÉCIMA CUARTA. -- JURISDICCIÓN</strong> PARA LA INTERPRETACIÓN Y
            CUMPLIMIENTO DE ESTE CONTRATO, ASÍ COMO PARA TODO AQUELLO QUE NO ESTÉ EXPRESAMENTE
            ESTIPULADO EN EL MISMO, LAS PARTES SE SOMETEN A LA JURISDICCIÓN DEL JUZGADO CIVIL DE PRIMERA
            INSTANCIA DEL DISTRITO JUDICIAL DE EL ORO, ESTADO DE MÉXICO.</div>
        <div class="texto">UNA VEZ LEÍDO EL PRESENTE CONTRATO Y CONFORMES CON SU CONTENIDO, PROCEDEN A
            RATIFICAR EN TODAS Y CADA UNA DE SUS PARTES FIRMÁNDOLO POR TRIPLICADO, AL CALCE Y AL MARGEN
            PARA DEBIDA CONSTANCIA LEGAL, EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, A LOS <strong><span class="campo campo-largo"><?= $fecha_texto ?></span></strong>.</div>

        <div class="subtitulo">POR “EL MUNICIPIO”</div>
        <div class="firma">
            <div class="linea">C. VERÓNICA MORENO MARTÍNEZ<br>PRESIDENTA MUNICIPAL CONSTITUCIONAL</div>
        </div>
        <div class="firma" style="float:right;">
            <div class="linea">C. RAMIRO GALINDO REYES<br>SECRETARIO DEL AYUNTAMIENTO</div>
        </div>
        <div class="clear"></div>

        <div class="firma-completa">
            <div class="linea"><span class="campo campo-mediano"><?= esc($nombre_completo_coordinado) ?></span><br><span class="campo campo-mediano"><?= isset($ganador['area']) ? esc($ganador['area']) : 'COORDINADOR MUNICIPAL DE PROTECCIÓN CIVIL Y BOMBEROS' ?></span>
            </div>
        </div>

        <div class="subtitulo" style="margin-top:50px;">POR “EL PROVEEDOR”</div>
        <div class="firma-completa">
            <div class="linea"><span class="campo campo-mediano"><?= esc($nombre_completo) ?></span><br>REPRESENTANTE LEGAL DE <span class="campo campo-mediano"><?= isset($ganador['nombre_empresa']) ? esc($ganador['nombre_empresa']) : '' ?></span></div>
        </div>

        <div class="numero-pagina">6 DE 8</div>
    </div>
</div>

<!-- ================= HOJA 7 ================= -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto" style="text-align:center; font-size:10pt; font-weight:bold; margin-top:100px;">
            ESPACIO PARA ANEXOS Y CERTIFICACIONES
        </div>
        <div class="numero-pagina">7 DE 8</div>
    </div>
</div>

<!-- ================= HOJA 8 ================= -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto" style="text-align:center; font-size:10pt; font-weight:bold; margin-top:100px;">
            TESTIGOS Y CERTIFICACIONES ADICIONALES
        </div>
        <div class="numero-pagina">8 DE 8</div>
    </div>
</div>

</body>
</html>