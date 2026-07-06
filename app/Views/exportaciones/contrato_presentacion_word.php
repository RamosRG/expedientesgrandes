<!DOCTYPE html>
<?php
// ==============================================
// FUNCIONES AUXILIARES PARA NÚMEROS A LETRAS
// ==============================================

function convertirDosDigitosPresentacion($n) {
    $unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
    if ($n < 10) return $unidades[$n];
    if ($n < 20) {
        $especiales = ['DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISEIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'];
        return $especiales[$n - 10];
    }
    if ($n < 100) {
        $decena = floor($n / 10) * 10;
        $unidad = $n % 10;
        $decenas = ['', 'DIEZ', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA', 'SETENTA', 'OCHENTA', 'NOVENTA'];
        if ($unidad === 0) return $decenas[$decena/10];
        if ($decena === 20) return 'VEINTI' . strtolower($unidades[$unidad]);
        return $decenas[$decena/10] . ' Y ' . $unidades[$unidad];
    }
    return '';
}

function convertirTresDigitosPresentacion($n) {
    $centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
    if ($n < 100) return convertirDosDigitosPresentacion($n);
    if ($n < 1000) {
        $centena = floor($n / 100);
        $resto = $n % 100;
        if ($centena === 1 && $resto === 0) return 'CIEN';
        if ($resto === 0) return $centenas[$centena];
        return $centenas[$centena] . ' ' . strtolower(convertirDosDigitosPresentacion($resto));
    }
    return '';
}

function numeroALetrasPresentacion($numero) {
    $numero = floatval($numero);
    $entero = floor($numero);
    $decimal = round(($numero - $entero) * 100);
    
    if ($entero === 0) return 'CERO PESOS ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
    
    $millones = floor($entero / 1000000);
    $miles = floor(($entero % 1000000) / 1000);
    $unidadesEntero = $entero % 1000;
    
    $resultado = '';
    if ($millones > 0) {
        if ($millones === 1) $resultado .= 'UN MILLON';
        else $resultado .= convertirTresDigitosPresentacion($millones) . ' MILLONES';
        if ($miles > 0 || $unidadesEntero > 0) $resultado .= ' ';
    }
    if ($miles > 0) {
        if ($miles === 1) $resultado .= 'MIL';
        else $resultado .= convertirTresDigitosPresentacion($miles) . ' MIL';
        if ($unidadesEntero > 0) $resultado .= ' ';
    }
    if ($unidadesEntero > 0) {
        if ($unidadesEntero === 1 && $miles === 0 && $millones === 0) $resultado .= 'UN PESO';
        else $resultado .= convertirTresDigitosPresentacion($unidadesEntero) . ' PESOS';
    } else if ($millones === 0 && $miles === 0) {
        $resultado = 'CERO PESOS';
    } else if ($unidadesEntero === 0) {
        $resultado .= 'PESOS';
    }
    
    $resultado .= ' ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
    return $resultado;
}

function numeroALetrasPresentacionSimple($numero) {
    $numero = intval($numero);
    $unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
    if ($numero < 10) return $unidades[$numero];
    if ($numero < 20) {
        $especiales = ['DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISEIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'];
        return $especiales[$numero - 10];
    }
    if ($numero < 100) {
        $decena = floor($numero / 10) * 10;
        $unidad = $numero % 10;
        $decenas = ['', 'DIEZ', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA', 'SETENTA', 'OCHENTA', 'NOVENTA'];
        if ($unidad === 0) return $decenas[$decena/10];
        if ($decena === 20) return 'VEINTI' . strtolower($unidades[$unidad]);
        return $decenas[$decena/10] . ' Y ' . $unidades[$unidad];
    }
    return (string)$numero;
}
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Contrato Abierto de Prestación de Servicios</title>
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
            margin: 2.92cm 3cm 2.5cm 3cm;
        }

        body {
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 9pt;
            line-height: 1.45;
            color: #000000;
            background: white;
            margin: 0;
            padding: 0;
            text-transform: uppercase;
        }

        .hoja {
            width: 21cm;
            min-height: 29.7cm;
            padding: 2.92cm 3cm 2.5cm 3cm;
            margin: 0 auto;
            background: white;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 9pt;
            line-height: 1.45;
            text-align: justify;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
        }

        .encabezado-logo {
            font-weight: bold;
            font-size: 9pt;
            margin-bottom: 8px;
            border-bottom: 1px solid #999;
            padding-bottom: 5px;
            text-align: center;
        }

        .frase-anio {
            text-align: center;
            font-weight: bold;
            margin: 15px 0;
            font-size: 9pt;
        }

        .campo {
            display: inline-block;
            border-bottom: 1px solid #000;
            min-width: 100px;
            padding: 0 4px;
            font-weight: bold;
        }

        .campo-largo {
            min-width: 250px;
        }

        .campo-mediano {
            min-width: 150px;
        }

        .campo-corto {
            min-width: 70px;
        }

        .clausula {
            margin: 12px 0;
            font-weight: bold;
        }

        .declaracion-item {
            margin-left: 20px;
            margin-bottom: 6px;
            text-align: justify;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 14px 0;
            font-size: 7.5pt;
        }

        table th,
        table td {
            border: 1px solid #000000;
            padding: 5px 3px;
            vertical-align: middle;
            text-align: center;
        }

        table th {
            background: #f5f0eb;
            font-weight: bold;
        }

        .fila-totales td {
            border: none;
            text-align: right;
            padding: 4px 8px;
        }

        .firma-recuadro {
            border: 1px solid black;
            padding: 12px;
            margin-top: 20px;
            width: 48%;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }

        .firma-linea {
            border-top: 1px solid black;
            margin-top: 35px;
            padding-top: 5px;
            font-weight: bold;
        }

        .clearfix {
            clear: both;
        }

        .numero-pagina {
            text-align: right;
            font-size: 8pt;
            margin-top: 25px;
            font-weight: bold;
        }

        .pie-contrato {
            font-size: 7pt;
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 8px;
        }

        .id-destacado {
            background: #e8f0fe;
            font-weight: bold;
            color: #1a56db;
            padding: 2px 4px;
            border-radius: 3px;
            font-size: 8pt;
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
                padding: 2.92cm 3cm 2.5cm 3cm !important;
            }
        }
    </style>
</head>
<body>

<?php
// Variables para cálculos
$subtotal = 0;
if (!empty($data)):
    foreach ($data as $item):
        $precio_unitario = isset($item['precio_unitario']) ? floatval($item['precio_unitario']) : 0;
        $cantidad = isset($item['cantidad']) ? floatval($item['cantidad']) : 1;
        $importe = $precio_unitario * $cantidad;
        $subtotal += $importe;
    endforeach;
endif;
$iva = $subtotal * 0.16;
$total = $subtotal + $iva;
?>

<!-- ========================================== -->
<!-- HOJA 1: DECLARACIONES Y DEFINICIONES -->
<!-- ========================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="encabezado-logo">
            <span style="font-weight: bold; font-size: 11pt;">AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
        </div>

        <div style="text-align: center; font-weight: bold; font-size: 14pt; margin: 25px 0 15px 0; line-height: 1.6;">
            CONTRATO ABIERTO DE PRESTACIÓN DE SERVICIOS PARA EL<br>
            <span class="campo campo-largo" style="font-size: 14pt; min-width: 300px;"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>
        </div>

        <div style="text-align: center; font-weight: bold; font-size: 12pt; margin-bottom: 20px; letter-spacing: 1px;">
            NO. MTM/CAYS/PF/<span class="campo campo-corto"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>
        </div>

        <div style="text-align: justify; margin-bottom: 15px;">
            CONTRATO ABIERTO DE PRESTACIÓN DE SERVICIOS QUE CELEBRAN POR UNA PARTE EL MUNICIPIO CONSTITUCIONAL DE TEMASCALCINGO, MÉXICO, REPRESENTADO EN ESTE ACTO POR LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE <strong>PRESIDENTA MUNICIPAL CONSTITUCIONAL</strong>, <strong>C. RAMIRO GALINDO REYES</strong>, SECRETARIO DEL MUNICIPIO, <strong>C. MIRIAM VIANEY OVANDO RUBIO</strong>, DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL Y ÁREA USUARIA; QUIÉN EN LO SUCESIVO Y PARA LOS EFECTOS DEL PRESENTE SE LE DENOMINARÁ <strong>"EL MUNICIPIO"</strong> Y POR OTRA PARTE <span class="campo campo-largo"><?= isset($data[0]['proveedor']) ? esc($data[0]['proveedor']) : '' ?></span>, REPRESENTADA POR LA <span class="campo campo-largo"><?= isset($data[0]['representante_legal']) ? esc($data[0]['representante_legal']) : '' ?></span>, EN SU CARÁCTER DE APODERADA LEGAL, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ <strong>"EL PRESTADOR DE SERVICIOS"</strong>, AL TENOR DE LAS DECLARACIONES Y CLÁUSULAS SIGUIENTES:
        </div>

        <div class="clausula">DECLARACIONES</div>
        <div class="clausula">I. "EL MUNICIPIO" DECLARA:</div>
        <div class="declaracion-item">1. QUE CON ARREGLO A LO PREVISTO POR LOS ARTÍCULOS 115, DE LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS; 113, 116, 123, Y 125, DE LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, 31, FRACCIÓN XVIII, DE LA LEY ORGÁNICA MUNICIPAL DEL ESTADO DE MÉXICO; ASÍ COMO LOS ARTÍCULOS 65, 66, 67, 68, 69, 70, 71, 72, 73, 74 Y 75 DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO EL 120, 123, 124, 125 Y 127 DEL REGLAMENTO; EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, TIENE LA ATRIBUCIÓN PARA CELEBRAR EL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">2. QUE LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL, ESTÁ FACULTADA PARA CONOCER, OTORGAR Y SUSCRIBIR ESTE CONTRATO.</div>
        <div class="declaracion-item">3. QUE EL <strong>C. RAMIRO GALINDO REYES</strong>, EN SU CARÁCTER DE SECRETARIO DEL AYUNTAMIENTO, EN TÉRMINOS DE LO QUE ESTABLECE EL ARTÍCULO 91 FRACCIÓN V DE LA LEY ORGÁNICA MUNICIPAL, TIENE LA ATRIBUCIÓN DE VALIDAR CON SU FIRMA LOS DOCUMENTOS OFICIALES EMANADOS DE <strong>"EL MUNICIPIO"</strong> Y DE CUALQUIERA DE SUS MIEMBROS.</div>
        <div class="declaracion-item">4. LAS DEPENDENCIAS Y ENTIDADES DE LA ADMINISTRACIÓN PÚBLICA MUNICIPAL CONDUCIRÁN SUS ACCIONES CON BASE A LOS PROGRAMAS ANUALES QUE ESTABLECE EL MUNICIPIO PARA EL LOGRO DE SUS OBJETIVOS.</div>
        <div class="declaracion-item">5. QUE TIENE ESTABLECIDO SU DOMICILIO EN <span class="campo campo-largo"><?= isset($data[0]['domicilio_proveedor']) ? esc($data[0]['domicilio_proveedor']) : '' ?></span>, MISMO QUE SE SEÑALA PARA LOS FINES Y EFECTOS LEGALES DEL PRESENTE INSTRUMENTO.</div>
        <div class="declaracion-item">6. MANIFIESTA <strong>"EL MUNICIPIO"</strong> QUE TIENE EN SU HABER RECURSOS PECUNIARIOS PROVENIENTES DE PARTICIPACIONES FEDERALES (PF-<span class="campo campo-corto">2026</span>), DE LA PRESTACIÓN DE SERVICIOS PARA EL "<span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>" CON EL OBJETO DE DAR CONTINUIDAD CON LA EMISIÓN DE DOCUMENTOS OFICIALES, ATENCIÓN CIUDADANA, PROCESOS DE GOBIERNO, GESTIONES ADMINISTRATIVAS Y CUMPLIMIENTO DE OBLIGACIONES NORMATIVAS, CONFORME AL PRESUPUESTO DE EGRESOS DE LA FEDERACIÓN PARA EL EJERCICIO FISCAL 2026.</div>
        <div class="declaracion-item">7. QUE LA ADJUDICACIÓN DEL CONTRATO SE REALIZÓ MEDIANTE PROCEDIMIENTO ADQUISITIVO POR ADJUDICACIÓN DIRECTA DE CONFORMIDAD CON EL ARTÍCULO 43 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS Y 94 DE SU REGLAMENTO.</div>

        <div class="clausula">II. DE "EL PRESTADOR DE SERVICIOS":</div>
        <div class="declaracion-item">1. QUE ES UNA EMPRESA CONSTITUIDA LEGALMENTE DE ACUERDO CON LAS LEYES MEXICANAS, SEGÚN LO ACREDITA CON ACTA CONSTITUTIVA NÚMERO <span class="campo campo-largo"><?= isset($data[0]['num_acta_cons']) ? esc($data[0]['num_acta_cons']) : '' ?></span>, VOLUMEN <span class="campo campo-largo"><?= isset($data[0]['volumen_re']) ? esc($data[0]['volumen_re']) : '' ?></span>, DE FECHA 
        <span class="campo campo-largo">
            <?php 
            if (isset($data[0]['created_at'])) {
                $fecha = new DateTime($data[0]['created_at']);
                $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
                echo $meses[$fecha->format('n')-1] . ' ' . $fecha->format('Y');
            }
            ?>
        </span>, ANTE LA FE DE <span class="campo campo-largo"><?= isset($data[0]['titular']) ? esc($data[0]['titular']) : '' ?></span>, TITULAR DE LA NOTARÍA PÚBLICA NÚMERO <span class="campo campo-largo"><?= isset($data[0]['num_oficialia']) ? esc($data[0]['num_oficialia']) : '' ?></span>, EN TOLUCA, ESTADO DE MÉXICO, INSCRITA EN EL REGISTRO PÚBLICO DE COMERCIO SEGÚN BOLETA CON EL NCI <span class="campo campo-mediano"><?= isset($data[0]['nci']) ? esc($data[0]['nci']) : '' ?></span> DE FECHA <span class="campo campo-mediano">
        <?php 
        if (isset($data[0]['created_at'])) {
            $fecha = new DateTime($data[0]['created_at']);
            $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
            echo $meses[$fecha->format('n')-1] . ' ' . $fecha->format('Y');
        }
        ?>
        </span>, DOCUMENTO QUE SE ENCUENTRA AGREGADO AL EXPEDIENTE QUE CONTIENE EL PROCEDIMIENTO ADJUDICATARIO REFERIDO.</div>
        <div class="declaracion-item">2. QUE SU REGISTRO FEDERAL DE CONTRIBUYENTES ES <span class="campo campo-mediano"><?= isset($data[0]['rfc']) ? esc($data[0]['rfc']) : (isset($data[0]['rfc_moral']) ? esc($data[0]['rfc_moral']) : '') ?></span>, CON ACTIVIDAD ECONÓMICA EN ALQUILER DE EQUIPO DE CÓMPUTO Y DE OTRAS MÁQUINAS Y MOBILIARIO DE OFICINA.</div>
        <div class="declaracion-item">3. QUE LA <span class="campo campo-largo"><?= isset($data[0]['representante_legal']) ? esc($data[0]['representante_legal']) : '' ?></span>, EN SU CARÁCTER DE <strong>APODERADA LEGAL</strong>, SE ACREDITA CON PODER GENERAL, INSTRUMENTO NÚMERO <span class="campo campo-mediano"><?= isset($data[0]['instrumento_re']) ? esc($data[0]['instrumento_re']) : '' ?></span>, VOLUMEN ORDINARIO <span class="campo campo-mediano"><?= isset($data[0]['volumen_re']) ? esc($data[0]['volumen_re']) : '' ?></span>, DE FECHA <span class="campo campo-mediano">
        <?php 
        if (isset($data[0]['created_at'])) {
            $fecha = new DateTime($data[0]['created_at']);
            $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
            echo $meses[$fecha->format('n')-1] . ' ' . $fecha->format('Y');
        }
        ?>
        </span>, ANTE EL LICENCIADO <span class="campo campo-mediano"><?= isset($data[0]['titular']) ? esc($data[0]['titular']) : '' ?></span>, TITULAR DE LA NOTARÍA PÚBLICA NÚMERO <span class="campo campo-mediano"><?= isset($data[0]['notario']) ? esc($data[0]['notario']) : '' ?></span> DEL ESTADO DE <span class="campo campo-mediano">MÉXICO</span>, ASIMISMO SE IDENTIFICA CON CREDENCIAL PARA VOTAR CON NÚMERO DE FOLIO <span class="campo campo-mediano"><?= isset($data[0]['num_credencial_representante']) ? esc($data[0]['num_credencial_representante']) : '' ?></span>, EXPEDIDA POR EL INSTITUTO NACIONAL ELECTORAL.</div>
        <div class="declaracion-item">4. QUE PARA EFECTOS DEL PRESENTE CONTRATO LA EMPRESA <span class="campo campo-largo"><?= isset($data[0]['proveedor']) ? esc($data[0]['proveedor']) : '' ?></span> SEÑALA COMO SU DOMICILIO FISCAL UBICADO EN <span class="campo campo-largo"><?= isset($data[0]['domicilio_proveedor']) ? esc($data[0]['domicilio_proveedor']) : '' ?></span>, Y DOMICILIO PARTICULAR EN EL <span class="campo campo-largo"><?= isset($data[0]['domicilio_proveedor']) ? esc($data[0]['domicilio_proveedor']) : '' ?></span> Y CORREO ELECTRÓNICO <span class="campo campo-mediano"><?= isset($data[0]['correo']) ? esc($data[0]['correo']) : '' ?></span>.</div>
        <div class="declaracion-item">5. QUE CONOCE LAS ESPECIFICACIONES DE LA PRESTACIÓN DEL "<span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>" Y DEMÁS DOCUMENTOS QUE SE ENCUENTRAN INTEGRADOS AL EXPEDIENTE QUE SE FORMÓ CON MOTIVO DEL PROCEDIMIENTO DE CONTRATACIÓN.</div>
        <div class="declaracion-item">6. QUE BAJO PROTESTA DE DECIR VERDAD LA EMPRESA QUE REPRESENTA NO SE ENCUENTRA EN NINGUNO DE LOS SUPUESTOS QUE ESTABLECE EL ARTÍCULO 74 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

        <div class="clausula">III. DE LAS "PARTES"</div>
        <div class="declaracion-item">1. QUE EN VIRTUD DE LAS DECLARACIONES QUE ANTECEDEN, Y UNA VEZ QUE SE HA RECONOCIDO SU CAPACIDAD Y PERSONALIDAD, CONVIENEN EXPRESAMENTE EN SUJETARSE A LAS SIGUIENTES:</div>

        <div class="clausula">DEFINICIONES</div>
        <div class="declaracion-item"><strong>"LAS PARTES"</strong> CONVIENEN QUE, PARA LOS EFECTOS DEL PRESENTE CONTRATO, SE ENTENDERÁ POR:</div>
        <div class="declaracion-item">1. LEY: LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
        <div class="declaracion-item">2. REGLAMENTO: EL REGLAMENTO DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

        <div class="numero-pagina">1 DE 4</div>
    </div>
</div>

<!-- ========================================== -->
<!-- HOJA 2: CLÁUSULA PRIMERA (OBJETO) + TABLA + CLÁUSULA SEGUNDA A SEXTA -->
<!-- ========================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="encabezado-logo">
            <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
        </div>
        <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

        <div class="clausula">CLÁUSULAS</div>
        <div class="clausula">PRIMERA. - OBJETO.</div>
        <div style="margin-bottom: 12px;">EL PRESENTE CONTRATO TIENE POR OBJETO QUE <strong>"EL PRESTADOR DE SERVICIOS"</strong> PROPORCIONE A <strong>"EL MUNICIPIO"</strong> LA PRESTACIÓN DEL <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>, PARA LAS ÁREAS DE LA ADMINISTRACIÓN PUBLICA MUNICIPAL, CORRESPONDIENTE AL PERIODO QUE COMPRENDE DEL <span class="campo campo-mediano">ENERO 2026</span>. EL <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span> OBJETO DEL PRESENTE CONTRATO SE DETALLAN EN LA TABLA SIGUIENTE, MISMA QUE FORMA PARTE INTEGRAL DE LA PRESENTE CLÁUSULA.</div>

        <!-- TABLA DE PRODUCTOS -->
        <table>
            <thead>
                <tr>
                    <th style="width: 8%;">ID</th>
                    <th style="width: 5%;">PARTIDA</th>
                    <th style="width: 22%;">CONCEPTO</th>
                    <th style="width: 10%;">UNIDAD DE MEDIDA</th>
                    <th style="width: 8%;">CANTIDAD</th>
                    <th style="width: 12%;">FUENTE DE FINANCIAMIENTO</th>
                    <th style="width: 12%;">MARCA Y/O MODELO</th>
                    <th style="width: 11%;">PRECIO UNITARIO</th>
                    <th style="width: 12%;">IMPORTE</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (!empty($data)):
                    foreach ($data as $index => $item):
                        $precio_unitario = isset($item['precio_unitario']) ? floatval($item['precio_unitario']) : 0;
                        $cantidad = isset($item['cantidad']) ? floatval($item['cantidad']) : 1;
                        $importe = $precio_unitario * $cantidad;
                ?>
                <tr>
                    <td><span class="id-destacado"><?= isset($item['id_descripcion']) ? esc($item['id_descripcion']) : ($index + 1) ?></span></td>
                    <td><?= isset($item['partida']) ? esc($item['partida']) : ($index + 1) ?></td>
                    <td style="text-align: left; padding-left: 8px;"><strong><?= isset($item['descripcion']) ? esc($item['descripcion']) : 'Sin descripción' ?></strong></td>
                    <td><?= isset($item['unidad_medida']) ? esc($item['unidad_medida']) : 'N/A' ?></td>
                    <td><?= isset($item['cantidad']) ? esc($item['cantidad']) : '' ?></td>
                    <td>PARTICIPACIONES FEDERALES</td>
                    <td><?= isset($item['marca_modelo']) ? esc($item['marca_modelo']) : 'N/A' ?></td>
                    <td style="font-weight: bold;">$<?= number_format($precio_unitario, 2) ?></td>
                    <td>$<?= number_format($importe, 2) ?></td>
                </tr>
                <?php 
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>

        <!-- TOTAL EN TEXTO -->
        <div style="text-align: right; margin-top: -10px;">
            <span class="campo campo-largo">
                <?php 
                $totalTexto = '$' . number_format($total, 2) . ' (' . numeroALetrasPresentacion($total) . ')';
                echo $totalTexto;
                ?>
            </span>
        </div>

        <!-- SUBTOTALES -->
        <table style="width: auto; float: right; border: none;">
            <tr style="border: none;">
                <td style="border: none; text-align: right;">SUBTOTAL</td>
                <td style="border: none; text-align: right;">:</td>
                <td style="border: none; text-align: right;">$<?= number_format($subtotal, 2) ?></td>
            </tr>
            <tr style="border: none;">
                <td style="border: none; text-align: right;">I.V.A.</td>
                <td style="border: none; text-align: right;">:</td>
                <td style="border: none; text-align: right;">$<?= number_format($iva, 2) ?></td>
            </tr>
            <tr style="border: none;">
                <td style="border: none; text-align: right; font-weight: bold;">TOTAL</td>
                <td style="border: none; text-align: right; font-weight: bold;">:</td>
                <td style="border: none; text-align: right; font-weight: bold;">$<?= number_format($total, 2) ?></td>
            </tr>
        </table>
        <div style="clear: both;"></div>

        <!-- CLÁUSULA SEGUNDA -->
        <div class="clausula">SEGUNDA. -- IMPORTE A PAGAR.</div>
        <div style="margin-bottom: 12px;">LA CANTIDAD TOTAL A PAGAR POR PARTE DE <strong>"EL MUNICIPIO"</strong> SERÁ POR UN MONTO MÍNIMO DE <span class="campo campo-largo">$<?= number_format($subtotal, 2) ?> (<?= numeroALetrasPresentacion($subtotal) ?>)</span>, INCLUIDO EL IMPUESTO AL VALOR AGREGADO Y UN <strong>MONTO MÁXIMO</strong> DE <span class="campo campo-largo">$<?= number_format($total, 2) ?> (<?= numeroALetrasPresentacion($total) ?>)</span>, <strong>INCLUIDO EL IMPUESTO AL VALOR AGREGADO (I.V.A.)</strong> Y SE CUBRIRÁ MEDIANTE LA PRESENTACIÓN DE LA FACTURA A MES VENDIDO, EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL PARA SU REVISIÓN Y PROGRAMACIÓN DE PAGO CORRESPONDIENTE.</div>

        <div class="clausula">TERCERA. - ANTICIPO.</div>
        <div style="margin-bottom: 12px;"><strong>"EL MUNICIPIO"</strong> NO OTORGARÁ A <strong>"EL PRESTADOR DE SERVICIOS"</strong> ANTICIPO ALGUNO POR LA PRESTACIÓN DE SERVICIOS PARA EL "<span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>" MOTIVO DEL PRESENTE CONTRATO.</div>

        <div class="clausula">CUARTA. -- PRECIO.</div>
        <div style="margin-bottom: 12px;"><strong>"LAS PARTES"</strong> CONVIENEN QUE EL IMPORTE POR LA PRESTACIÓN DEL <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span> MATERIA DE ESTE CONTRATO, SERÁ EL ESTABLECIDO POR EL PRECIO MENSUAL FIJO.</div>

        <div class="clausula">QUINTA:</div>
        <div style="margin-bottom: 12px;"><strong>"LAS PARTES"</strong> ACUERDAN QUE EL PAGO PARA EL "<span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>" OBJETO DEL PRESENTE CONTRATO, SE CUBRIRÁ DE LA MANERA SIGUIENTE:</div>
        <div class="declaracion-item">I. <strong>"EL MUNICIPIO"</strong> PAGARÁ EXCLUSIVAMENTE EL PRECIO FIJO POR <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span> AL MES, MÁS EL IMPUESTO AL VALOR AGREGADO (I.V.A.) A <strong>"EL PRESTADOR DE SERVICIOS"</strong>, DENTRO DE LOS TREINTA DÍAS HÁBILES POSTERIORES A LA PRESENTACIÓN DE LA FACTURA (CFDI) CORRESPONDIENTE, EN LOS TÉRMINOS DESCRITOS EN EL PÁRRAFO QUE ANTECEDE Y DEBIDAMENTE REQUISITADA FISCALMENTE, CON CARGO A PARTICIPACIONES FEDERALES (PF-2026).</div>
        <div class="declaracion-item">II. <strong>"EL PRESTADOR DE SERVICIOS"</strong> INGRESARÁ CADA MES A LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL LA FACTURA (CFDI), EMITIRLA A NOMBRE DEL <strong>"MUNICIPIO DE TEMASCALCINGO"</strong>.</div>
        <div class="declaracion-item">III. <strong>"EL MUNICIPIO"</strong>, HARÁ LOS PAGOS A <strong>"EL PRESTADOR DE SERVICIOS"</strong>, MEDIANTE TRANSFERENCIAS BANCARIAS EN TIEMPO Y FORMA.</div>

        <div class="clausula">SEXTA:</div>
        <div style="margin-bottom: 12px;">PARA EL CUMPLIMIENTO DEL OBJETO DEL PRESENTE CONTRATO <strong>"EL PRESTADOR DE SERVICIOS"</strong> SE OBLIGA A:</div>
        <div class="declaracion-item">I. PRESTAR A <strong>"EL MUNICIPIO"</strong> EL <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span> DE MANERA CONTINUA, OPORTUNA Y CONFORME A LOS TÉRMINOS PACTADOS DENTRO DE LA CLÁUSULA SÉPTIMA DE ESTE INSTRUMENTO.</div>
        <div class="declaracion-item">II. INFORMAR A <strong>"EL MUNICIPIO"</strong> DE CUALQUIER ANOMALÍA QUE SE PRESENTE DURANTE LA EJECUCIÓN DEL PRESENTE CONTRATO, EN CUANTO IMPIDA O DIFICULTE LA PRESTACIÓN DEL <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span> Y COMUNICAR POR ESCRITO OPORTUNAMENTE A <strong>"EL MUNICIPIO"</strong> CUALQUIER CAMBIO DE DOMICILIO.</div>
        <div class="declaracion-item">III. REEMPLAZAR LA (S) FOTOCOPIADORA (S) PARA LA PRESTACIÓN DEL SERVICIO DE FOTOCOPIADO, QUE TENGAN FALLAS Y/O MAL FUNCIONAMIENTO EN UN PLAZO NO MAYOR A LOS TRES DÍAS NATURALES, NOTIFICADO POR <strong>"EL MUNICIPIO".</strong></div>
        <div class="declaracion-item">IV. CUMPLIR CON LAS DEMÁS OBLIGACIONES QUE DERIVEN DEL PRESENTE CONTRATO.</div>

        <div class="numero-pagina">2 DE 4</div>
    </div>
</div>

<!-- ========================================== -->
<!-- HOJA 3: CLÁUSULA SÉPTIMA A DÉCIMA QUINTA -->
<!-- ========================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="encabezado-logo">
            <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
        </div>
        <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

        <div class="clausula">SÉPTIMA. TIEMPO, FORMA Y LUGAR DE ENTREGA:</div>
        <div style="margin-bottom: 12px;">EL SERVICIO DE FOTOCOPIADO, SE PRESTARÁ DE MANERA CONTINUA Y CONFORME A LAS NECESIDADES DE <strong>"EL MUNICIPIO"</strong> DURANTE EL PERIODO COMPRENDIDO <span class="campo campo-mediano">DICIEMBRE 2026</span>, DEBERÁ ESTAR DISPONIBLE DENTRO DE UN PLAZO NO MAYOR A DOS DÍAS NATURALES, CONTADOS A PARTIR DE LA SUSCRIPCIÓN DEL PRESENTE CONTRATO, EN LAS OFICINAS QUE OCUPA LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL UBICADA EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO S/N, EXSEMINARIO, TEMASCALCINGO, MÉXICO.</div>

        <div class="clausula">OCTAVA. - GARANTÍA DE CUMPLIMIENTO.</div>
        <div style="margin-bottom: 12px;">LA GARANTÍA DE CUMPLIMIENTO DE CONTRATO SE CONSTITUIRÁ POR EL 10% DEL IMPORTE DEL SUBTOTAL DEL CONTRATO, DENTRO DE LOS PRIMEROS 10 DÍAS HÁBILES DEL MES DE <span class="campo campo-mediano">
        <?php 
        if (isset($data[0]['created_at'])) {
            $fecha = new DateTime($data[0]['created_at']);
            $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
            echo $meses[$fecha->format('n')-1];
        }
        ?>
        </span>, POR LA CANTIDAD DE <span class="campo campo-largo">$<?= number_format($subtotal * 0.10, 2) ?> (<?= numeroALetrasPresentacion($subtotal * 0.10) ?>)</span> Y ESTARÁ VIGENTE HASTA EL CUMPLIMIENTO DEL PRESENTE CONTRATO.</div>

        <div style="margin-bottom: 6px;">LA GARANTÍA DEBERÁ CONTENER LAS SIGUIENTES DECLARACIONES EXPRESAS:</div>
        <div class="declaracion-item">a. SE OTORGA EN LOS TÉRMINOS DEL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">b. LA GARANTÍA SE EMITIRÁ A NOMBRE DEL MUNICIPIO DE TEMASCALCINGO, MÉXICO.</div>
        <div class="declaracion-item">c. LA GARANTÍA CONTINUARÁ VIGENTE EN EL CASO DE QUE SE OTORGUE PRÓRROGA O ESPERA AL FIADOR PARA EL CUMPLIMIENTO DE LAS OBLIGACIONES QUE SE AFIANZAN, AUNQUE HAYAN SIDO SOLICITADAS O AUTORIZADAS EXTEMPORÁNEAMENTE.</div>
        <div class="declaracion-item">d. PARA CANCELAR LA GARANTÍA SERÁ REQUISITO INDISPENSABLE LA CONFORMIDAD EXPRESA Y POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>, QUIEN LA EMITIRÁ SOLO CUANDO <strong>"EL PRESTADOR DEL SERVICIO"</strong> HAYA CUMPLIDO CON TODAS LAS OBLIGACIONES.</div>
        <div class="declaracion-item">e. QUE LA INSTITUCIÓN AFIANZADORA ACEPTA EXPRESAMENTE LO PRECEPTUADO EN LOS ARTÍCULOS 93, 94 Y 118 DE LA LEY FEDERAL DE LAS INSTITUCIONES DE SEGUROS Y FIANZAS VIGENTE.</div>
        <div class="declaracion-item">f. <strong>"EL MUNICIPIO"</strong> HARÁ EFECTIVA LA GARANTÍA A PARTIR DEL INCUMPLIMIENTO DE CUALQUIER OBLIGACIÓN CONSIGNADA EN TODAS Y CADA UNA DE LAS CLÁUSULAS DEL PRESENTE CONTRATO, POR LA CANTIDAD EN DINERO QUE SE ORIGINE.</div>
        <div class="declaracion-item">g. QUE <strong>"EL MUNICIPIO"</strong> HARÁ EFECTIVA LA FIANZA EN CASO DE QUE SEA RESCINDIDO EL CONTRATO CELEBRADO POR CAUSAS IMPUTABLES A <strong>"EL PRESTADOR DEL SERVICIO".</strong></div>
        <div style="margin-top: 6px;">SI TRANSCURRIDO EL PLAZO SEÑALADO EN EL PRIMER PÁRRAFO <strong>"EL PRESTADOR DEL SERVICIO"</strong> NO HUBIERE PRESENTADO LA GARANTÍA DE CUMPLIMIENTO RESPECTIVA, <strong>"EL MUNICIPIO"</strong> NO FORMALIZARÁ EL PRESENTE INSTRUMENTO.</div>

        <div class="clausula">NOVENA. - RESCISIÓN ORIGINADA POR LA NO PRESENTACIÓN DE LA GARANTÍA.</div>
        <div style="margin-bottom: 12px;">PARA EL CASO DE QUE <strong>"EL PRESTADOR DEL SERVICIO"</strong> NO PRESENTE LA GARANTÍA DESCRITA EN LA FRACCIÓN I DE LA CLÁUSULA OCTAVA DEL PRESENTE CONTRATO, SE RESCINDIRÁ EL MISMO, DEBIENDO PAGAR ÉSTE A <strong>"EL MUNICIPIO"</strong> LOS DAÑOS Y PERJUICIOS QUE ELLO LE OCASIONE, ASÍ COMO LAS DEMÁS SANCIONES QUE EL PRESENTE CONTRATO ESTABLECE.</div>

        <div class="clausula">DÉCIMA. SUPERVISIÓN. -</div>
        <div style="margin-bottom: 12px;"><strong>EL MUNICIPIO"</strong>, A TRAVÉS DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL O DEL ÁREA QUE ÉSTA DESIGNE, SUPERVISARÁ DE MANERA PERMANENTE, LLEVARÁ REGISTROS, CONTROLES Y REPORTES QUE CONSIDERE NECESARIOS, ASÍ COMO FORMULAR LAS OBSERVACIONES PERTINENTES, MISMAS QUE DEBERÁN SER ATENDIDAS DE MANERA OPORTUNA POR "EL PRESTADOR DE SERVICIOS", VERIFICANDO QUE EL MISMO SE REALICE CONFORME A LAS CONDICIONES, TÉRMINOS Y ESPECIFICACIONES ESTABLECIDAS EN EL PRESENTE CONTRATO.</div>

        <div class="clausula">DÉCIMA PRIMERA. RESCISIÓN. -</div>
        <div style="margin-bottom: 12px;"><strong>"EL MUNICIPIO"</strong>, PODRÁ INICIAR EL PROCEDIMIENTO DE RESCISIÓN DEL PRESENTE CONTRATO, SIN RESPONSABILIDAD ALGUNA PARA EL, POR LAS SIGUIENTES CAUSAS IMPUTABLES A "<strong>EL PRESTADOR DE SERVICIOS</strong>":</div>
        <div class="declaracion-item">I. NO ENTREGUE LA GARANTÍA ESTABLECIDA EN LA CLÁUSULA NOVENA EN LOS PLAZOS ESTIPULADOS. (NO APLICA)</div>
        <div class="declaracion-item">II. SI <strong>"EL PRESTADOR DE SERVICIOS"</strong> NO EJECUTA EL SERVICIO DE ACUERDO CON LOS DATOS Y ESPECIFICACIONES CONVENIDAS Y PRECISADAS EN EL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">III. SI <strong>"EL PRESTADOR DE SERVICIOS"</strong> NO REALIZA LA PRESTACIÓN DEL SERVICIO DE FOTOCOPIADO SEÑALADO EN LA CLÁUSULA PRIMERA OBJETO DE ESTE CONTRATO A <strong>"EL MUNICIPIO"</strong> EN FORMA EFICIENTE Y OPORTUNA.</div>
        <div class="declaracion-item">IV. SI <strong>"EL PRESTADOR DE SERVICIOS"</strong> NO DA LAS FACILIDADES NECESARIAS A LOS SUPERVISORES QUE AL EFECTO DESIGNE <strong>"EL MUNICIPIO"</strong> PARA REALIZAR SU FUNCIÓN EN TÉRMINOS DE LO SEÑALADO EN LA CLÁUSULA DÉCIMA DEL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">V. SI <strong>"EL PRESTADOR DE SERVICIOS"</strong> CEDE, TRASPASA O SUBCONTRATA LA TOTALIDAD O PARTE DEL SERVICIO CONTRATADO SIN EL CONSENTIMIENTO POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>, Y SI CEDE A TERCEROS EN FORMA PARCIAL O TOTAL LOS DERECHOS Y OBLIGACIONES, Y LOS DERECHOS DE COBRO DERIVADOS DEL PRESENTE CONTRATO, SIN OBTENER LA AUTORIZACIÓN PREVIA POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>.</div>
        <div class="declaracion-item">VI. CAMBIE SU NACIONALIDAD MEXICANA POR OTRA.</div>
        <div class="declaracion-item">VII. SIENDO EXTRANJERO INVOQUE LA PROTECCIÓN DE SU GOBIERNO EN RELACIÓN AL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">VIII. EN GENERAL, POR INCUMPLIMIENTO DE CUALQUIERA DE LAS OBLIGACIONES DERIVADAS DEL PRESENTE CONTRATO, EL CÓDIGO, EL REGLAMENTO, LOS TRATADOS Y DEMÁS DISPOSICIONES APLICABLES.</div>
        <div class="declaracion-item">IX. SI <strong>"EL PRESTADOR DE SERVICIOS"</strong> EN VIRTUD DE LA INFORMACIÓN CON QUE CUENTE LA CONTRALORÍA MUNICIPAL HAYA CELEBRADO CONTRATOS EN CONTRAVENCIÓN A LO DISPUESTO POR EL <strong>"LEY".</strong></div>
        <div class="declaracion-item">X. POR CUALQUIER OTRA CAUSA IMPUTABLE A ÉL, SIMILAR A LAS ANTES MENCIONADAS.</div>
        <div style="margin-top: 6px;">EN CASO DE QUE <strong>"EL MUNICIPIO"</strong> OPTE POR LA RESCISIÓN DEL CONTRATO; <strong>"EL PRESTADOR DE SERVICIOS"</strong> ESTARÁ OBLIGADO A PAGAR DAÑOS Y PERJUICIOS, OCASIONADOS A <strong>"EL MUNICIPIO"</strong>.</div>

        <div class="clausula">DÉCIMA SEGUNDA. MODIFICACIÓN. -</div>
        <div style="margin-bottom: 12px;"><strong>"EL MUNICIPIO"</strong> DENTRO DE SU PRESUPUESTO APROBADO PODRÁ MODIFICAR EL PRESENTE CONTRATO, DE CONFORMIDAD A LO ESTABLECIDO EN EL ARTÍCULO 125 DEL "REGLAMENTO".</div>

        <div class="clausula">DÉCIMA TERCERA. -- LEGISLACIÓN.</div>
        <div style="margin-bottom: 12px;">ESTE CONTRATO SE RIGE POR LO ESTABLECIDO EN LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y SU RESPECTIVO REGLAMENTO.</div>

        <div class="clausula">DÉCIMA CUARTA. -- JURISDICCIÓN.</div>
        <div style="margin-bottom: 12px;">PARA LA INTERPRETACIÓN, EJECUCIÓN, CUMPLIMIENTO O TERMINACIÓN DEL PRESENTE CONTRATO, <strong>"LAS PARTES"</strong> ACUERDAN SOMETERSE EXPRESAMENTE A LA JURISDICCIÓN Y COMPETENCIA DEL TRIBUNAL DE JUSTICIA ADMINISTRATIVA DEL ESTADO DE MÉXICO, RENUNCIANDO DESDE ESTE MOMENTO A CUALQUIER OTRO FUERO QUE POR RAZÓN DE SU DOMICILIO O PRESENTE FUTURO PUDIERA CORRESPONDERLES.</div>

        <div class="clausula">DÉCIMA QUINTA. -- PENAS CONVENCIONALES.</div>
        <div style="margin-bottom: 12px;">EN CASO DEL INCUMPLIMIENTO POR PARTE DE <strong>"EL PRESTADOR DE SERVICIOS"</strong> DE LAS OBLIGACIONES PACTADAS EN EL CONTRATO, SE APLICARÁ UNA PENA CONVENCIONAL EQUIVALENTE AL MONTO QUE RESULTE DE APLICAR EL 10% DEL VALOR DE LOS BIENES QUE NO SE HAYAN SUMINISTRADO A SATISFACCIÓN DE <strong>"EL MUNICIPIO"</strong>, LO ANTERIOR, CON FUNDAMENTO EN LO DISPUESTO EN LA FACCIÓN VII DEL ARTÍCULO 120 DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

        <div class="numero-pagina">3 DE 4</div>
    </div>
</div>

<!-- ========================================== -->
<!-- HOJA 4: FIRMAS Y TESTIGOS -->
<!-- ========================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="encabezado-logo">
            <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
        </div>
        <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

        <div style="margin-bottom: 20px;">UNA VEZ LEÍDO EL PRESENTE CONTRATO Y CONFORMES CON SU CONTENIDO, PROCEDEN A RATIFICAR EN TODAS Y CADA UNA DE SUS PARTES FIRMÁNDOLO POR TRIPLICADO, AL CALCE Y AL MARGEN PARA DEBIDA CONSTANCIA LEGAL, EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, A LOS <span class="campo campo-mediano">
        <?php 
        if (isset($data[0]['created_at'])) {
            $fecha = new DateTime($data[0]['created_at']);
            $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
            $dia = $fecha->format('d');
            $mes = $meses[$fecha->format('n')-1];
            $anio = $fecha->format('Y');
            echo numeroALetrasPresentacionSimple($dia) . ' DÍAS DEL MES DE ' . $mes . ' DEL AÑO ' . numeroALetrasPresentacionSimple($anio);
        }
        ?>
        </span>.</div>

        <!-- FIRMAS -->
        <div style="border: 1px solid black; margin-top: 20px; width: 100%;">
            <div style="text-align: center; font-weight: bold; padding: 8px;">POR "EL MUNICIPIO"</div>
            <div style="display: table; border-top: 1px solid black; width: 100%;">
                <div style="display: table-cell; width: 50%; text-align: center; padding: 15px 5px; border-right: 1px solid black;">
                    <div style="margin-top: 30px;"></div>
                    <strong>C. VERÓNICA MORENO MARTÍNEZ</strong><br>
                    PRESIDENTA MUNICIPAL CONSTITUCIONAL
                </div>
                <div style="display: table-cell; width: 50%; text-align: center; padding: 15px 5px;">
                    <div style="margin-top: 30px;"></div>
                    <strong>C. RAMIRO GALINDO REYES</strong><br>
                    SECRETARIO DEL MUNICIPIO
                </div>
            </div>
        </div>

        <div style="border: 1px solid black; margin-top: 15px;">
            <div style="text-align: center; font-weight: bold; padding: 8px;">POR "EL ÁREA USUARIA"</div>
            <div style="text-align: center; padding: 15px;">
                <div style="margin-top: 20px;"></div>
                <strong>C. MIRIAM VIANEY OVANDO RUBIO</strong><br>
                DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
            </div>
        </div>

        <div style="border: 1px solid black; margin-top: 15px;">
            <div style="text-align: center; font-weight: bold; padding: 8px;">POR "EL PRESTADOR DEL SERVICIO"</div>
            <div style="text-align: center; padding: 15px;">
                <div style="margin-top: 20px;"></div>
                <span class="campo campo-largo"><?= isset($data[0]['representante_legal']) ? esc($data[0]['representante_legal']) : '' ?></span><br>
                APODERADA LEGAL<br>
                <span class="campo campo-largo"><?= isset($data[0]['proveedor']) ? esc($data[0]['proveedor']) : '' ?></span>
            </div>
        </div>

        <div class="numero-pagina">4 DE 4</div>
    </div>
</div>

</body>
</html>