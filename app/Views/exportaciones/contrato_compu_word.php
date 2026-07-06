<?php
// =============================================
// FUNCIÓN PARA NÚMEROS A LETRAS
// =============================================
function numeroALetras($numero) {
    $numero = floatval($numero);
    $entero = intval($numero);
    
    if ($entero === 0) return 'CERO';
    
    $unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
    $especiales = [
        10 => 'DIEZ', 11 => 'ONCE', 12 => 'DOCE', 13 => 'TRECE', 14 => 'CATORCE', 15 => 'QUINCE',
        16 => 'DIECISÉIS', 17 => 'DIECISIETE', 18 => 'DIECIOCHO', 19 => 'DIECINUEVE',
        20 => 'VEINTE', 30 => 'TREINTA', 40 => 'CUARENTA', 50 => 'CINCUENTA',
        60 => 'SESENTA', 70 => 'SETENTA', 80 => 'OCHENTA', 90 => 'NOVENTA'
    ];
    $centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 
                 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
    
    if ($entero < 10) return $unidades[$entero];
    if (isset($especiales[$entero])) return $especiales[$entero];
    
    if ($entero < 30) {
        return 'VEINTI' . $unidades[$entero - 20];
    }
    
    if ($entero < 100) {
        $decena = floor($entero / 10) * 10;
        $unidad = $entero % 10;
        return $unidad === 0 ? $especiales[$decena] : $especiales[$decena] . ' Y ' . $unidades[$unidad];
    }
    
    if ($entero < 1000) {
        $centena = floor($entero / 100);
        $resto = $entero % 100;
        if ($centena === 1 && $resto === 0) return 'CIEN';
        if ($centena === 1) return 'CIENTO ' . numeroALetras($resto);
        return $centenas[$centena] . ' ' . numeroALetras($resto);
    }
    
    if ($entero < 1000000) {
        $miles = floor($entero / 1000);
        $resto = $entero % 1000;
        if ($miles === 1) {
            return $resto === 0 ? 'MIL' : 'MIL ' . numeroALetras($resto);
        }
        return numeroALetras($miles) . ' MIL ' . numeroALetras($resto);
    }
    
    if ($entero < 1000000000) {
        $millones = floor($entero / 1000000);
        $resto = $entero % 1000000;
        if ($millones === 1) {
            return $resto === 0 ? 'UN MILLON' : 'UN MILLON ' . numeroALetras($resto);
        }
        return numeroALetras($millones) . ' MILLONES ' . numeroALetras($resto);
    }
    
    return (string)$entero;
}
?>
<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Contrato Abierto Equipo de Cómputo 2026</title>
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
            margin: 18mm 15mm 18mm 15mm;
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
            padding: 18mm 15mm 18mm 15mm;
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
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #999;
            padding-bottom: 5px;
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
            min-width: 200px;
        }

        .campo-mediano {
            min-width: 130px;
        }

        .campo-corto {
            min-width: 70px;
        }

        .clausula {
            margin: 12px 0;
        }

        .declaracion-item {
            margin-left: 20px;
            margin-bottom: 6px;
            text-align: justify;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 8pt;
        }

        table th,
        table td {
            border: 1px solid #000000;
            padding: 6px 4px;
            vertical-align: top;
        }

        table th {
            text-align: center;
            font-weight: bold;
        }

        .clearfix {
            clear: both;
        }

        .numero-pagina {
            text-align: right;
            font-size: 8pt;
            margin-top: 25px;
        }

        .total-table {
            width: auto;
            float: right;
            border: none;
            margin: 5px 0 15px 0;
        }

        .total-table td {
            border: none;
            padding: 3px 8px;
            text-align: right;
        }

        .total-table .label {
            font-weight: bold;
        }

        .total-table .value {
            font-weight: bold;
            min-width: 100px;
        }

        .firma-block {
            border: 1px solid black;
            margin-top: 15px;
        }

        .firma-header {
            text-align: center;
            font-weight: bold;
            padding: 8px;
            border-bottom: 1px solid black;
        }

        .firma-body {
            text-align: center;
            padding: 15px;
        }

        .firma-doble {
            display: flex;
            border-top: 1px solid black;
        }

        .firma-doble .item {
            flex: 1;
            text-align: center;
            padding: 15px 5px;
            border-right: 1px solid black;
        }

        .firma-doble .item:last-child {
            border-right: none;
        }

        .centrado {
            text-align: center;
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
                padding: 18mm 15mm 18mm 15mm !important;
            }
        }
    </style>
</head>
<body>

<!-- ========================================== -->
<!-- HOJA 1: DECLARACIONES Y DEFINICIONES -->
<!-- ========================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="encabezado-logo">
            <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
            <span>TEMASCALCINGO</span>
        </div>
        <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

        <div style="margin: 10px 0;">[MTM/CAYS/PF/<span class="campo campo-mediano"><?= isset($data[0]['num_contrato']) ? esc($data[0]['num_contrato']) : '' ?></span>]</div>

        <div style="font-weight: bold; font-size: 12pt; text-align: center; margin: 20px 0;">CONTRATO ABIERTO PARA LA<br><span class="campo campo-largo"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span></div>

        <div style="text-align: justify; margin-bottom: 15px;">
            CONTRATO ABIERTO PARA LA <strong>"<?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?>"</strong> QUE CELEBRAN POR UNA PARTE EL MUNICIPIO CONSTITUCIONAL DE TEMASCALCINGO, MÉXICO, REPRESENTADO EN ESTE ACTO POR LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL, <strong>C. RAMIRO GALINDO REYES</strong>, SECRETARIO DEL AYUNTAMIENTO, <strong>C. MIRIAM VIANEY OVANDO RUBIO,</strong> DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL Y ÁREA USUARIA; QUIÉN EN LO SUCESIVO Y PARA LOS EFECTOS DEL PRESENTE SE LE DENOMINARÁ <strong>"EL MUNICIPIO"</strong>; Y POR OTRA PARTE <span class="campo campo-largo"><?= isset($data[0]['proveedor']) ? esc($data[0]['proveedor']) : '' ?></span> REPRESENTADO EN ESTE ACTO POR EL <span class="campo campo-largo"><?= isset($data[0]['representante_legal']) ? esc($data[0]['representante_legal']) : '' ?></span>, EN SU CARÁCTER DE <strong>APODERADO LEGAL</strong>, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ <strong>"EL PROVEEDOR"</strong>, AL TENOR DE LAS DECLARACIONES Y CLÁUSULAS SIGUIENTES:
        </div>

        <div class="clausula"><strong>DECLARACIONES</strong></div>
        <div class="clausula"><strong>I. "EL MUNICIPIO" DECLARA:</strong></div>
        <div class="declaracion-item">1. QUE CON ARREGLO A LO PREVISTO POR LOS ARTÍCULOS 115, DE LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS; 113, 116 , 123, Y 125, DE LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, 31, FRACCIÓN XVIII, DE LA LEY ORGÁNICA MUNICIPAL DEL ESTADO DE MÉXICO; ASÍ COMO LOS ARTÍCULOS 65, 66, 67, 68, 69, 70, 71, 72, 73, 74 Y 75 DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO EL 120, 123, 124, 125 Y 127 DEL REGLAMENTO; EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, TIENE LA ATRIBUCIÓN PARA CELEBRAR EL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">2. QUE LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL, ESTÁ FACULTADA PARA CONOCER, OTORGAR Y SUSCRIBIR ESTE CONTRATO.</div>
        <div class="declaracion-item">3. QUE EL <strong>C. RAMIRO GALINDO REYES,</strong> EN SU CARÁCTER DE SECRETARIO DEL AYUNTAMIENTO, EN TÉRMINOS DE LO QUE ESTABLECE EL ARTÍCULO 91 FRACCIÓN V DE LA LEY ORGÁNICA MUNICIPAL, TIENE LA ATRIBUCIÓN DE VALIDAR CON SU FIRMA LOS DOCUMENTOS OFICIALES EMANADOS DE <strong>"EL MUNICIPIO"</strong> Y DE CUALQUIERA DE SUS MIEMBROS.</div>
        <div class="declaracion-item">4. LAS DEPENDENCIAS Y ENTIDADES DE LA ADMINISTRACIÓN PÚBLICA MUNICIPAL CONDUCIRÁN SUS ACCIONES CON BASE A LOS PROGRAMAS ANUALES QUE ESTABLECE EL MUNICIPIO PARA EL LOGRO DE SUS OBJETIVOS.</div>
        <div class="declaracion-item">5. QUE TIENE ESTABLECIDO SU DOMICILIO EN <span class="campo campo-largo"><?= isset($data[0]['domicilio_proveedor']) ? esc($data[0]['domicilio_proveedor']) : '' ?></span>, MISMO QUE SE SEÑALA PARA LOS FINES Y EFECTOS LEGALES DEL PRESENTE INSTRUMENTO.</div>
        <div class="declaracion-item">6. MANIFIESTA <strong>"EL MUNICIPIO"</strong> QUE CUENTA EN SU HABER CON RECURSOS PECUNIARIOS PROVENIENTES DE <strong>PARTICIPACIONES FEDERALES (PF-2026),</strong> DESTINADOS A LA <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>, CON EL OBJETO DE FORTALECER LA OPERACIÓN ADMINISTRATIVA, GARANTIZAR LA CONTINUIDAD EN LA EMISIÓN DE DOCUMENTOS OFICIALES, LA ATENCIÓN CIUDADANA, LOS PROCESOS DE GOBIERNO, LAS GESTIONES ADMINISTRATIVAS Y EL CUMPLIMIENTO DE LAS OBLIGACIONES NORMATIVAS, DE CONFORMIDAD CON EL PRESUPUESTO DE EGRESOS DE LA FEDERACIÓN PARA EL EJERCICIO FISCAL 2026.</div>
        <div class="declaracion-item">7. QUE LA ADJUDICACIÓN DEL CONTRATO SE REALIZÓ MEDIANTE PROCEDIMIENTO ADQUISITIVO POR INVITACIÓN RESTRINGIDA DE CONFORMIDAD CON EL ARTÍCULO 43, 44 Y 46 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS Y 90, DE SU REGLAMENTO.</div>

        <div class="clausula"><strong>II. DE "EL PROVEEDOR", BAJO PROTESTA DE DECIR VERDAD DECLARA:</strong></div>
        <div class="declaracion-item">1. QUE ES UNA EMPRESA CONSTITUIDA LEGALMENTE DE ACUERDO CON LAS LEYES MEXICANAS, SEGÚN LO ACREDITA CON <strong>ACTA CONSTITUTIVA NÚMERO <span class="campo campo-mediano"><?= isset($data[0]['num_acta_cons']) ? esc($data[0]['num_acta_cons']) : '' ?></span>, LIBRO <span class="campo campo-mediano"><?= isset($data[0]['num_libro']) ? esc($data[0]['num_libro']) : '' ?></span>, DE FECHA <span class="campo campo-mediano"><?= isset($data[0]['created_at']) ? date('d/m/Y', strtotime($data[0]['created_at'])) : '' ?></span> ANTE LA FE DEL <span class="campo campo-mediano"><?= isset($data[0]['titular']) ? esc($data[0]['titular']) : '' ?></span>, TITULAR DE LA NOTARÍA NÚMERO <span class="campo campo-mediano"><?= isset($data[0]['notario']) ? esc($data[0]['notario']) : '' ?></span>, DEL DISTRITO FEDERAL (HOY CIUDAD DE MÉXICO),</strong> E INSCRITA EN EL REGISTRO PÚBLICO DE LA PROPIEDAD Y DE COMERCIO DE LA CIUDAD DE MÉXICO, CON FOLIO MERCANTIL NÚMERO 55273 DE FECHA <span class="campo campo-mediano"><?= isset($data[0]['created_at']) ? date('d/m/Y', strtotime($data[0]['created_at'])) : '' ?></span>, DOCUMENTO QUE SE ENCUENTRA AGREGADO AL EXPEDIENTE QUE CONTIENE EL PROCEDIMIENTO ADJUDICATARIO REFERIDO.</div>
        <div class="declaracion-item">2. QUE SU REGISTRO FEDERAL DE CONTRIBUYENTES ES <span class="campo campo-mediano"><?= isset($data[0]['rfc']) ? esc($data[0]['rfc']) : '' ?></span>, CON ACTIVIDAD ECONÓMICA EN OTROS INTERMEDIARIOS DE COMERCIO AL POR MAYOR.</div>
        <div class="declaracion-item">3. QUE EL <span class="campo campo-largo"><?= isset($data[0]['representante_legal']) ? esc($data[0]['representante_legal']) : '' ?></span>, EN SU CARÁCTER DE <strong>APODERADO LEGAL</strong>, SE ACREDITA CON PODER GENERAL, INSTRUMENTO <span class="campo campo-mediano"><?= isset($data[0]['instrumento_re']) ? esc($data[0]['instrumento_re']) : '' ?></span>, LIBRO <span class="campo campo-mediano"><?= isset($data[0]['num_libro']) ? esc($data[0]['num_libro']) : '' ?></span> DE FECHA <span class="campo campo-mediano"><?= isset($data[0]['created_at']) ? date('d/m/Y', strtotime($data[0]['created_at'])) : '' ?></span>, ANTE LA FE DEL LICENCIADO <span class="campo campo-mediano"><?= isset($data[0]['notario']) ? esc($data[0]['notario']) : '' ?></span>, TITULAR DE LA NOTARÍA NÚMERO CIENTO SESENTA DEL DISTRITO FEDERAL (HOY CIUDAD DE MÉXICO), ASIMISMO SE IDENTIFICA CON CREDENCIAL PARA VOTAR CON NÚMERO DE FOLIO <span class="campo campo-mediano"><?= isset($data[0]['num_credencial_votar']) ? esc($data[0]['num_credencial_votar']) : '' ?></span>, EXPEDIDA POR EL INSTITUTO NACIONAL ELECTORAL.</div>
        <div class="declaracion-item">4. QUE PARA EFECTOS DEL PRESENTE CONTRATO LA EMPRESA <span class="campo campo-largo"><?= isset($data[0]['proveedor']) ? esc($data[0]['proveedor']) : '' ?></span>, SEÑALA COMO SU DOMICILIO PARTICULAR UBICADO EN <span class="campo campo-largo"><?= isset($data[0]['domicilio_proveedor']) ? esc($data[0]['domicilio_proveedor']) : '' ?></span>, TELÉFONO <span class="campo campo-mediano"><?= isset($data[0]['telefono_principal']) ? esc($data[0]['telefono_principal']) : '' ?></span> Y CORREO ELECTRÓNICO <span class="campo campo-mediano"><?= isset($data[0]['correo']) ? esc($data[0]['correo']) : '' ?></span>.</div>
        <div class="declaracion-item">5. QUE CONOCE LAS ESPECIFICACIONES PARA REALIZAR EL SUMINISTRO POR LA <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span> Y DEMÁS DOCUMENTOS QUE SE ENCUENTRAN INTEGRADOS AL EXPEDIENTE QUE SE FORMÓ CON MOTIVO DEL PROCEDIMIENTO DE ADQUISICIÓN DE BIENES ANTES REFERIDO.</div>
        <div class="declaracion-item">6. QUE BAJO PROTESTA DE DECIR VERDAD LA EMPRESA QUE REPRESENTA NO SE ENCUENTRA EN NINGUNO DE LOS SUPUESTOS QUE ESTABLECE EL ARTÍCULO 74 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

        <div class="clausula"><strong>III. DE LAS "PARTES"</strong></div>
        <div class="declaracion-item">1. QUE EN VIRTUD DE LAS DECLARACIONES QUE ANTECEDEN, Y UNA VEZ QUE SE HAN RECONOCIDO SU CAPACIDAD Y PERSONALIDAD, CONVIENEN EXPRESAMENTE EN SUJETARSE A LAS SIGUIENTES:</div>

        <div class="clausula"><strong>DEFINICIONES.</strong></div>
        <div class="declaracion-item"><strong>"LAS PARTES"</strong> CONVIENEN QUE, PARA LOS EFECTOS DEL PRESENTE CONTRATO, SE ENTENDERÁ POR:</div>
        <div class="declaracion-item">1. LEY: LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>
        <div class="declaracion-item">2. REGLAMENTO: EL REGLAMENTO DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

        <div class="numero-pagina">1 DE 4</div>
    </div>
</div>

<!-- ========================================== -->
<!-- HOJA 2: CLÁUSULA PRIMERA (OBJETO) + TABLA + CLÁUSULA SEGUNDA A QUINTA -->
<!-- ========================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="encabezado-logo">
            <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
            <span>TEMASCALCINGO</span>
        </div>
        <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

        <div class="clausula"><strong>CLÁUSULAS</strong></div>

        <div class="clausula"><strong>PRIMERA. - OBJETO.</strong> EL PRESENTE CONTRATO TIENE POR OBJETO QUE <strong>"EL PROVEEDOR"</strong> SUMINISTRE A <strong>"EL MUNICIPIO"</strong> LA COMPRA REFERENTE A LA <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>, COMPRA QUE TIENE POR OBJETIVO FORTALECER LA OPERACIÓN ADMINISTRATIVA, GARANTIZAR LA CONTINUIDAD EN LA EMISIÓN DE DOCUMENTOS OFICIALES, LA ATENCIÓN CIUDADANA, LOS PROCESOS DE GOBIERNO, LAS GESTIONES ADMINISTRATIVAS Y EL CUMPLIMIENTO DE LAS OBLIGACIONES NORMATIVAS. LOS BIENES Y SERVICIOS OBJETO DEL PRESENTE CONTRATO SE DETALLAN EN LA TABLA SIGUIENTE, MISMA QUE FORMA PARTE INTEGRAL DE LA PRESENTE CLÁUSULA.</div>

        <?php 
        $contador = 1;
        $subtotal = 0;
        if (!empty($data)):
            foreach ($data as $item):
                $cantidad = isset($item['cantidad']) ? floatval($item['cantidad']) : 0;
                $precio_unitario = isset($item['precio_unitario']) ? floatval($item['precio_unitario']) : 
                                  (isset($item['total']) && $cantidad > 0 ? floatval($item['total']) / $cantidad : 0);
                $importe = isset($item['total']) ? floatval($item['total']) : ($precio_unitario * $cantidad);
                $subtotal += $importe;
            endforeach;
        endif;
        $iva = $subtotal * 0.16;
        $total = $subtotal + $iva;
        ?>

        <table>
            <thead>
                <tr>
                    <th style="width:8%;"># PARTIDA</th>
                    <th style="width:30%;">DESCRIPCIÓN DE LOS BIENES</th>
                    <th style="width:12%;">UNIDAD DE MEDIDA</th>
                    <th style="width:8%;">CANTIDAD</th>
                    <th style="width:18%;">MARCA Y MODELO PROPUESTO</th>
                    <th style="width:12%;">PRECIO UNITARIO</th>
                    <th style="width:12%;">IMPORTE</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $contador = 1;
                if (!empty($data)):
                    foreach ($data as $item):
                        $cantidad = isset($item['cantidad']) ? floatval($item['cantidad']) : 0;
                        $precio_unitario = isset($item['precio_unitario']) ? floatval($item['precio_unitario']) : 
                                          (isset($item['total']) && $cantidad > 0 ? floatval($item['total']) / $cantidad : 0);
                        $importe = isset($item['total']) ? floatval($item['total']) : ($precio_unitario * $cantidad);
                ?>
                <tr>
                    <td class="centrado"><?= $contador++ ?></td>
                    <td><?= isset($item['descripcion']) ? esc($item['descripcion']) : '' ?></td>
                    <td><?= isset($item['unidad_medida']) ? esc($item['unidad_medida']) : 'PIEZA' ?></td>
                    <td class="centrado"><?= $cantidad ?></td>
                    <td><?= isset($item['marca_modelo']) ? esc($item['marca_modelo']) : '' ?></td>
                    <td class="centrado">$<?= number_format($precio_unitario, 2) ?></td>
                    <td class="centrado">$<?= number_format($importe, 2) ?></td>
                </tr>
                <?php 
                    endforeach;
                endif; 
                ?>
            </tbody>
        </table>

        <div style="text-align: right; margin-top: 5px;">
            <span class="campo campo-mediano">
                <?php 
                $entero = floor($total);
                $decimal = round(($total - $entero) * 100);
                echo esc(strtoupper(numeroALetras($entero))) . ' PESOS ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
                ?>
            </span>
        </div>

        <table class="total-table">
            <tr>
                <td class="label">SUBTOTAL</td>
                <td>:</td>
                <td class="value">$<?= number_format($subtotal, 2) ?></td>
            </tr>
            <tr>
                <td class="label">I.V.A.</td>
                <td>:</td>
                <td class="value">$<?= number_format($iva, 2) ?></td>
            </tr>
            <tr>
                <td class="label">TOTAL</td>
                <td>:</td>
                <td class="value">$<?= number_format($total, 2) ?></td>
            </tr>
        </table>
        <div class="clearfix"></div>

        <div class="clausula"><strong>SEGUNDA. -- IMPORTE.</strong> LA CANTIDAD TOTAL A PAGAR POR PARTE DE <strong>"EL MUNICIPIO"</strong> SERÁ POR UN <strong>MONTO MÍNIMO</strong> DE <strong>$<span class="campo campo-corto"><?= number_format($total * 0.60, 2) ?></span> (<span class="campo campo-mediano">
            <?php 
            $monto_min = $total * 0.60;
            $entero = floor($monto_min);
            $decimal = round(($monto_min - $entero) * 100);
            echo esc(strtoupper(numeroALetras($entero))) . ' PESOS ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
            ?>
        </span>)</strong> INCLUIDO EL IMPUESTO AL VALOR AGREGADO Y UN <strong>MONTO MÁXIMO</strong> DE <strong>$<span class="campo campo-corto"><?= number_format($total, 2) ?></span> (<span class="campo campo-mediano">
            <?php 
            $entero = floor($total);
            $decimal = round(($total - $entero) * 100);
            echo esc(strtoupper(numeroALetras($entero))) . ' PESOS ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
            ?>
        </span>)</strong> INCLUIDO EL IMPUESTO AL VALOR AGREGADO I.V.A., EL PAGO SE REALIZARÁ DE MANERA <strong>PARCIAL</strong>, POR CADA EQUIPO DE CÓMPUTO SOLICITADO, PREVIA EMISIÓN DE LA ORDEN DE COMPRA CORRESPONDIENTE Y UNA VEZ EFECTUADA LA ENTREGA DEL EQUIPO REQUERIDO.</div>

        <div class="clausula"><strong>TERCERA. - ANTICIPO.</strong> <strong>"EL MUNICIPIO"</strong> NO OTORGARÁ A <strong>"EL PROVEEDOR"</strong> ANTICIPÓ ALGUNO, POR LOS BIENES ADQUIRIDOS MOTIVO DEL PRESENTE CONTRATO.</div>

        <div class="clausula"><strong>CUARTA. - "LAS PARTES"</strong> CONVIENEN QUE LOS PRECIOS OFERTADOS SON FIJOS Y NO PODRÁN MODIFICARSE.</div>

        <div class="clausula"><strong>QUINTA: "LAS PARTES"</strong> ACUERDAN QUE EL PAGO POR EL SUMINISTRO PARA LA <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>, OBJETO DEL PRESENTE CONTRATO, SE CUBRIRÁ DE LA MANERA SIGUIENTE:</div>
        <div class="declaracion-item">I. CADA REQUERIMIENTO DE EQUIPO SERÁ SOLICITADO POR <strong>"EL MUNICIPIO"</strong> MEDIANTE LA EMISIÓN DE LA ORDEN DE COMPRA CORRESPONDIENTE. UNA VEZ REALIZADA LA ENTREGA DEL EQUIPO SOLICITADO, <strong>"EL PROVEEDOR"</strong> ENTREGARÁ SU FACTURA A MÁS TARDAR A LOS DIEZ DÍAS HÁBILES POSTERIORES A LA ENTREGA DE LOS EQUIPOS SOLICITADOS CON SU RESPECTIVO XML PARA TRÁMITE DE PAGO EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN LAS INSTALACIONES DEL EX SEMINARIO UBICADAS EN AV. DE LA PAZ ESQUINA MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>
        <div class="declaracion-item">II. <strong>"EL PROVEEDOR"</strong> DEBERÁ EMITIR E INGRESAR LA FACTURA CORRESPONDIENTE (CFDI) POR CADA EQUIPO DE CÓMPUTO ENTREGADO, A NOMBRE DEL <strong>"MUNICIPIO DE TEMASCALCINGO"</strong> EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.</div>
        <div class="declaracion-item">III. <strong>"EL MUNICIPIO"</strong>, HARÁ EL PAGO A <strong>"EL PROVEEDOR"</strong>, MEDIANTE TRANSFERENCIA ELECTRÓNICA.</div>

        <div class="numero-pagina">2 DE 4</div>
    </div>
</div>

<!-- ========================================== -->
<!-- HOJA 3: CLÁUSULA SEXTA A DÉCIMA OCTAVA -->
<!-- ========================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="encabezado-logo">
            <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
            <span>TEMASCALCINGO</span>
        </div>
        <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

        <div class="clausula"><strong>SEXTA</strong>: PARA EL CUMPLIMIENTO DEL OBJETO DEL PRESENTE CONTRATO <strong>"EL PROVEEDOR"</strong> SE OBLIGA A:</div>
        <div class="declaracion-item">I. LLEVAR A CABO EL SUMINISTRO POR LA <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>, EN LOS TÉRMINOS PACTADOS DENTRO DE LA CLÁUSULA PRIMERA DE ESTE INSTRUMENTO.</div>
        <div class="declaracion-item">II. REEMPLAZAR LOS EQUIPOS DE CÓMPUTO QUE PRESENTEN TODO TIPO DE FALLAS, EN UN PLAZO NO MAYOR A CINCO DÍAS HÁBILES POSTERIORES AL REPORTE EMITIDO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.</div>
        <div class="declaracion-item">III. INFORMAR A <strong>"EL MUNICIPIO"</strong> DE CUALQUIER ANOMALÍA QUE SE PRESENTE DURANTE LA EJECUCIÓN DEL PRESENTE CONTRATO, EN CUANTO IMPIDA O DIFICULTE LLEVAR A CABO LA <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>.</div>
        <div class="declaracion-item">IV. COMUNICAR POR ESCRITO OPORTUNAMENTE A <strong>"EL MUNICIPIO"</strong> CUALQUIER CAMBIO DE DOMICILIO.</div>
        <div class="declaracion-item">V. CUMPLIR CON LAS DEMÁS OBLIGACIONES QUE DERIVEN DEL PRESENTE CONTRATO.</div>

        <div class="clausula"><strong>SEPTIMA. TIEMPO, FORMA Y LUGAR DE ENTREGA</strong>: LA ENTREGA POR LA <span class="campo campo-mediano"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>, SEÑALADOS EN LA CLÁUSULA PRIMERA OBJETO DE ESTE CONTRATO SE LLEVARÁ A CABO EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, UBICADO EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>

        <div class="clausula"><strong>OCTAVA. - DE LAS GARANTÍAS. "EL PROVEEDOR"</strong> DEBERÁ ENTREGAR A <strong>"EL MUNICIPIO"</strong> LAS GARANTÍAS SIGUIENTES:</div>
        <div class="declaracion-item">I. <strong>CUMPLIMIENTO DE CONTRATO:</strong> SE CONSTITUIRÁ POR EL 10% DEL IMPORTE DEL SUBTOTAL DEL CONTRATO (SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO), DENTRO DE LOS DIEZ DÍAS HÁBILES POSTERIORES A LA FIRMA DE CONTRATO, POR LA CANTIDAD DE <strong>$<span class="campo campo-corto"><?= number_format($subtotal * 0.10, 2) ?></span> (<span class="campo campo-mediano">
            <?php 
            $garantia_cumplimiento = $subtotal * 0.10;
            $entero = floor($garantia_cumplimiento);
            $decimal = round(($garantia_cumplimiento - $entero) * 100);
            echo esc(strtoupper(numeroALetras($entero))) . ' PESOS ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
            ?>
        </span>)</strong> Y ESTARÁ VIGENTE HASTA EL CUMPLIMIENTO DEL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">II. <strong>VICIOS OCULTOS</strong>: SE CONSTITUIRÁ POR EL 5% DEL IMPORTE DEL SUBTOTAL DEL CONTRATO (SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO), DENTRO DE LOS CINCO DÍAS HÁBILES POSTERIORES A LA ENTREGA TOTAL DE LOS BIENES, POR LA CANTIDAD DE <strong>$<span class="campo campo-corto"><?= number_format($subtotal * 0.05, 2) ?></span> (<span class="campo campo-mediano">
            <?php 
            $garantia_vicios = $subtotal * 0.05;
            $entero = floor($garantia_vicios);
            $decimal = round(($garantia_vicios - $entero) * 100);
            echo esc(strtoupper(numeroALetras($entero))) . ' PESOS ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
            ?>
        </span>)</strong> Y ESTARÁ VIGENTE DURANTE UN AÑO.</div>
        <div class="declaracion-item">III. LA FIANZA DEBERÁ CONTENER LAS SIGUIENTES DECLARACIONES EXPRESAS DE LA AFIANZADORA:</div>
        <div class="declaracion-item" style="margin-left: 40px;">QUE LA FIANZA SE OTORGA EN LOS TÉRMINOS DEL PRESENTE CONTRATO.</div>
        <div class="declaracion-item" style="margin-left: 40px;">a. LA FIANZA SE EMITIRÁ A NOMBRE DEL <strong>"MUNICIPIO DE TEMASCALCINGO MÉXICO"</strong></div>
        <div class="declaracion-item" style="margin-left: 40px;">b. QUE LA FIANZA CONTINUARÁ VIGENTE EN EL CASO DE QUE SE OTORGUE PRÓRROGA O ESPERA AL FIADOR PARA EL CUMPLIMIENTO DE LAS OBLIGACIONES QUE SE AFIANZAN, AUNQUE HAYAN SIDO SOLICITADAS O AUTORIZADAS EXTEMPORÁNEAMENTE.</div>
        <div class="declaracion-item" style="margin-left: 40px;">c. QUE PARA CANCELAR LA FIANZA SERÁ REQUISITO INDISPENSABLE LA CONFORMIDAD EXPRESA Y POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>, QUIEN LA EMITIRÁ SOLO CUANDO <strong>"EL PROVEEDOR"</strong> HAYA CUMPLIDO CON TODAS LAS OBLIGACIONES.</div>
        <div class="declaracion-item" style="margin-left: 40px;">d. QUE LA INSTITUCIÓN AFIANZADORA ACEPTA EXPRESAMENTE LO PRECEPTUADO EN LOS ARTÍCULOS 93, 94 Y 118 DE LA LEY FEDERAL DE LAS INSTITUCIONES DE SEGUROS Y FIANZAS VIGENTE.</div>
        <div class="declaracion-item" style="margin-left: 40px;">e. QUE <strong>"EL MUNICIPIO"</strong> HARÁ EFECTIVA LA FIANZA A PARTIR DEL INCUMPLIMIENTO DE CUALQUIER OBLIGACIÓN CONSIGNADA EN TODAS Y CADA UNA DE LAS CLÁUSULAS DEL PRESENTE CONTRATO, POR LA CANTIDAD EN DINERO QUE SE ORIGINE.</div>
        <div class="texto" style="margin-top: 10px;">SI TRANSCURRIDO EL PLAZO SEÑALADO EN EL PRIMER PÁRRAFO <strong>"EL PROVEEDOR"</strong> NO HUBIERE PRESENTADO LA GARANTÍA DE CUMPLIMIENTO RESPECTIVA, <strong>"EL MUNICIPIO"</strong> NO FORMALIZARÁ EL PRESENTE INSTRUMENTO.</div>

        <div class="clausula"><strong>NOVENA. - RESCISIÓN ORIGINADA POR LA NO PRESENTACIÓN DE LA GARANTÍA.</strong> PARA EL CASO DE QUE <strong>"EL PROVEEDOR"</strong> NO PRESENTE LA GARANTÍA DESCRITA EN LA FRACCIÓN I DE LA CLÁUSULA OCTAVA DEL PRESENTE CONTRATO, SE RESCINDIRÁ EL MISMO, DEBIENDO PAGAR ÉSTE A <strong>"EL MUNICIPIO"</strong> LOS DAÑOS Y PERJUICIOS QUE ELLO LE OCASIONE, ASÍ COMO LAS DEMÁS SANCIONES QUE EL PRESENTE CONTRATO ESTABLECE.</div>

        <div class="clausula"><strong>DECIMA. SUPERVISIÓN</strong>. -- <strong>"EL MUNICIPIO",</strong> A TRAVÉS DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL O DEL ÁREA QUE ÉSTA DESIGNE, SUPERVISARÁ, FORMULARÁ LAS OBSERVACIONES PERTINENTES Y REPORTES QUE CONSIDERE NECESARIOS MISMAS QUE DEBERÁN SER ATENDIDAS DE MANERA OPORTUNA POR <strong>"EL PROVEEDOR",</strong> VERIFICANDO QUE EL MISMO SE REALICE CONFORME A LAS CONDICIONES, TÉRMINOS Y ESPECIFICACIONES ESTABLECIDAS EN EL PRESENTE CONTRATO.</div>

        <div class="clausula"><strong>DECIMA PRIMERA. RESCISIÓN</strong>. - <strong>"EL MUNICIPIO"</strong>, PODRÁ INICIAR EL PROCEDIMIENTO DE RESCISIÓN DEL PRESENTE CONTRATO, SIN RESPONSABILIDAD ALGUNA PARA EL, POR LAS SIGUIENTES CAUSAS IMPUTABLES A <strong>"EL PROVEEDOR"</strong>:</div>
        <div class="declaracion-item">I. NO ENTREGUE LA GARANTÍA ESTABLECIDA EN LA CLAUSULA OCTAVA EN LOS PLAZOS ESTIPULADOS.</div>
        <div class="declaracion-item">II. SI <strong>"EL PROVEEDOR"</strong> NO EJECUTA EL SUMINISTRO POR LA <strong>"ADQUISICIÓN DE EQUIPOS DE CÓMPUTO",</strong> DE ACUERDO CON LOS DATOS Y ESPECIFICACIONES CONVENIDAS Y PRECISADAS EN EL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">III. SI <strong>"EL PROVEEDOR"</strong> NO REALIZA EN TIEMPO Y FORMA EL SUMINISTRO POR LA <strong>"ADQUISICIÓN DE EQUIPOS DE CÓMPUTO",</strong> SEÑALADOS EN LA CLÁUSULA PRIMERA OBJETO DE ESTE CONTRATO A <strong>"EL MUNICIPIO"</strong> EN FORMA EFICIENTE Y OPORTUNA.</div>
        <div class="declaracion-item">IV. SI <strong>"EL PROVEDOR"</strong> NO DA LAS FACILIDADES NECESARIAS A LOS SUPERVISORES QUE AL EFECTO DESIGNE "EL MUNICIPIO" PARA REALIZAR SU FUNCIÓN EN TÉRMINOS DE LO SEÑALADO EN LA CLÁUSULA DECIMA DEL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">V. SI <strong>"EL PROVEEDOR"</strong> CEDE, TRASPASA O SUBCONTRATA LA TOTALIDAD O PARTE DE LOS BIENES ADQUIRIDOS, SIN EL CONSENTIMIENTO POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>, Y SI CEDE A TERCEROS EN FORMA PARCIAL O TOTAL LOS DERECHOS Y OBLIGACIONES, Y LOS DERECHOS DE COBRO DERIVADOS DEL PRESENTE CONTRATO, SIN OBTENER LA AUTORIZACIÓN PREVIA POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>.</div>
        <div class="declaracion-item">VI. CAMBIE SU NACIONALIDAD MEXICANA POR OTRA.</div>
        <div class="declaracion-item">VII. SIENDO EXTRANJERO INVOQUE LA PROTECCIÓN DE SU GOBIERNO EN RELACIÓN AL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">VIII. EN GENERAL, POR INCUMPLIMIENTO DE CUALESQUIERA DE LAS OBLIGACIONES DERIVADAS DEL PRESENTE CONTRATO, EL CÓDIGO, EL REGLAMENTO, LOS TRATADOS Y DEMÁS DISPOSICIONES APLICABLES.</div>
        <div class="declaracion-item">IX. SI <strong>"EL PRESTADOR DE SERVICIOS"</strong> EN VIRTUD DE LA INFORMACIÓN CON QUE CUENTE LA CONTRALORÍA MUNICIPAL HAYA CELEBRADO CONTRATOS EN CONTRAVENCIÓN A LO DISPUESTO POR EL <strong>"LEY".</strong></div>
        <div class="declaracion-item">X. POR CUALQUIER OTRA CAUSA IMPUTABLE A ÉL, SIMILAR A LAS ANTES MENCIONADAS.</div>
        <div class="texto" style="margin-top: 10px;">EN CASO DE QUE <strong>"EL MUNICIPIO"</strong> OPTE POR LA RESCISIÓN DEL CONTRATO; <strong>"EL PROVEEDOR"</strong> ESTARÁ OBLIGADO A PAGAR DAÑOS Y PERJUICIOS, OCASIONADOS A <strong>"EL MUNICIPIO"</strong>.</div>

        <div class="numero-pagina">3 DE 4</div>
    </div>
</div>

<!-- ========================================== -->
<!-- HOJA 4: CLÁUSULA DÉCIMA SEGUNDA A DÉCIMA SÉPTIMA + FIRMAS -->
<!-- ========================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="encabezado-logo">
            <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
            <span>TEMASCALCINGO</span>
        </div>
        <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

        <div class="clausula"><strong>DECIMA SEGUNDA. MODIFICACIÓN</strong>. - <strong>"EL MUNICIPIO"</strong> DENTRO DE SU PRESUPUESTO APROBADO PODRÁ MODIFICAR EL PRESENTE CONTRATO, DE CONFORMIDAD A LO ESTABLECIDO EN EL ARTÍCULO 125 DEL "REGLAMENTO".</div>

        <div class="clausula"><strong>DECIMA TERCERA. - AUSENCIA DE VICIOS EN EL CONSENTIMIENTO</strong>. LAS <strong>"PARTES"</strong> MANIFIESTAN QUE EN EL PRESENTE CONTRATO NO EXISTE ERROR, LESIÓN, DOLO, VIOLENCIA, NI CUALQUIER OTRO VICIO DEL CONSENTIMIENTO QUE PUDIESE IMPLICAR SU NULIDAD Y QUE LAS DEMÁS PRESTACIONES QUE SE RECIBEN SON DE IGUAL VALOR, POR LO TANTO, RENUNCIAN A CUALQUIER ACCIÓN QUE LA LEY PUDIERA OTORGARLES A SU FAVOR, POR ESTE CONCEPTO.</div>

        <div class="clausula"><strong>DECIMA CUARTA. -LEGISLACIÓN</strong>. ESTE CONTRATO SE RIGE POR LO ESTABLECIDO EN LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y SU RESPECTIVO REGLAMENTO.</div>

        <div class="clausula"><strong>DÉCIMA QUINTA. - JURISDICCIÓN</strong>. - PARA LA INTERPRETACIÓN, EJECUCIÓN, CUMPLIMIENTO O TERMINACIÓN DEL PRESENTE CONTRATO, <strong>"LAS PARTES"</strong> ACUERDAN SOMETERSE EXPRESAMENTE A LA JURISDICCIÓN Y COMPETENCIA DEL TRIBUNAL DE JUSTICIA ADMINISTRATIVA DEL ESTADO DE MÉXICO, RENUNCIANDO DESDE ESTE MOMENTO A CUALQUIER OTRO FUERO QUE POR RAZÓN DE SU DOMICILIO O PRESENTE FUTURO PUDIERA CORRESPONDERLES.</div>

        <div class="clausula"><strong>DECIMA SEXTA. -- RESPONSABILIDADES. -</strong> LA ADQUISICIÓN ESTARÁ SUJETA A LOS REQUERIMIENTOS DE LAS ÁREAS ADMINISTRATIVAS DEL MUNICIPIO DE TEMASCALCINGO, MÉXICO, POR LO QUE, EN EL CASO DE NO ADQUIRIR EL MONTO MÍNIMO, POR ALGUNA SITUACIÓN NO IMPUTABLE AL MUNICIPIO NO SE GENERARÁ NINGÚN TIPO DE RESPONSABILIDAD Y/O SANCIÓN POR NINGUNA DE LAS PARTES.</div>

        <div class="clausula"><strong>DÉCIMA SÉPTIMA. -- PENAS CONVENCIONALES</strong> EN CASO DEL INCUMPLIMIENTO POR PARTE DE <strong>"EL PROVEEDOR"</strong> DE LAS OBLIGACIONES PACTADAS EN EL CONTRATO, SE APLICARÁ UNA PENA CONVENCIONAL EQUIVALENTE AL MONTO QUE RESULTE DE APLICAR EL 10% DEL VALOR DE LOS BIENES QUE NO SE HAYAN SUMINISTRADO A SATISFACCIÓN DE <strong>"EL MUNICIPIO",</strong> LO ANTERIOR, CON FUNDAMENTO EN LO DISPUESTO EN LA FACCIÓN VII DEL ARTÍCULO 120 DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

        <div class="texto" style="margin-top: 15px;">LEÍDO QUE FUE A LAS PARTES EL PRESENTE CONTRATO Y CONFORMES CON SU CONTENIDO, ALCANCE Y FUERZA LEGAL LO RATIFICAN EN TODAS Y CADA UNA DE SUS PARTES, FIRMÁNDOLO POR TRIPLICADO, AL CALCE Y AL MARGEN PARA DEBIDA CONSTANCIA LEGAL EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, A <span class="campo campo-mediano">
            <?php 
            if (isset($data[0]['created_at'])) {
                $fecha = new DateTime($data[0]['created_at']);
                $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
                echo 'LOS ' . $fecha->format('d') . ' DÍAS DE ' . $meses[$fecha->format('n')-1] . ' DEL AÑO ' . $fecha->format('Y');
            }
            ?>
        </span>.</div>

        <!-- FIRMAS -->
        <div class="firma-block">
            <div class="firma-header">POR "EL MUNICIPIO"</div>
            <div class="firma-doble">
                <div class="item">
                    <div style="margin-top: 30px;"></div>
                    <strong>C. VERÓNICA MORENO MARTÍNEZ</strong><br>
                    PRESIDENTA MUNICIPAL CONSTITUCIONAL
                </div>
                <div class="item">
                    <div style="margin-top: 30px;"></div>
                    <strong>C. RAMIRO GALINDO REYES</strong><br>
                    SECRETARIO DEL AYUNTAMIENTO
                </div>
            </div>
        </div>

        <div class="firma-block">
            <div class="firma-header">POR "EL ÁREA USUARIA"</div>
            <div class="firma-body">
                <div style="margin-top: 20px;"></div>
                <strong>C. MIRIAM VIANEY OVANDO RUBIO</strong><br>
                DIRECTORA DE ADMINISTRACIÓN Y<br>DESARROLLO DE PERSONAL
            </div>
        </div>

        <div class="firma-block">
            <div class="firma-header">POR "EL PROVEEDOR"</div>
            <div class="firma-body">
                <div style="margin-top: 20px;"></div>
                <span class="campo campo-largo"><?= isset($data[0]['representante_legal']) ? esc($data[0]['representante_legal']) : '' ?></span><br>
                APODERADO LEGAL DE <span class="campo campo-largo"><?= isset($data[0]['proveedor']) ? esc($data[0]['proveedor']) : '' ?></span>
            </div>
        </div>

        <div class="numero-pagina">4 DE 4</div>
    </div>
</div>

</body>
</html>