<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Contrato Administrativo Abierto 2026</title>
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

        .numero-pagina {
            text-align: right;
            font-size: 8pt;
            margin-top: 25px;
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

<?php
// Función auxiliar para convertir número a letras - DEFINIDA UNA SOLA VEZ
function convertirNumeroAdmin($n) {
    $unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
    $especiales = [
        10 => 'DIEZ', 11 => 'ONCE', 12 => 'DOCE', 13 => 'TRECE', 14 => 'CATORCE', 15 => 'QUINCE',
        16 => 'DIECISÉIS', 17 => 'DIECISIETE', 18 => 'DIECIOCHO', 19 => 'DIECINUEVE',
        20 => 'VEINTE', 30 => 'TREINTA', 40 => 'CUARENTA', 50 => 'CINCUENTA',
        60 => 'SESENTA', 70 => 'SETENTA', 80 => 'OCHENTA', 90 => 'NOVENTA'
    ];
    $centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
    
    if ($n < 10) return $unidades[$n];
    if (isset($especiales[$n])) return $especiales[$n];
    if ($n < 30) {
        return 'VEINTI' . $unidades[$n - 20];
    }
    if ($n < 100) {
        $decena = floor($n / 10) * 10;
        $unidad = $n % 10;
        return $unidad === 0 ? $especiales[$decena] : $especiales[$decena] . ' Y ' . $unidades[$unidad];
    }
    if ($n < 1000) {
        $centena = floor($n / 100);
        $resto = $n % 100;
        if ($centena === 1 && $resto === 0) return 'CIEN';
        if ($centena === 1) return 'CIENTO ' . convertirNumeroAdmin($resto);
        return $unidades[$centena] . 'CIENTOS ' . convertirNumeroAdmin($resto);
    }
    if ($n < 1000000) {
        $miles = floor($n / 1000);
        $resto = $n % 1000;
        if ($miles === 1) {
            return $resto === 0 ? 'MIL' : 'MIL ' . convertirNumeroAdmin($resto);
        }
        return convertirNumeroAdmin($miles) . ' MIL ' . convertirNumeroAdmin($resto);
    }
    return $n;
}

function numeroALetrasAdminDos($numero) {
    $numero = floatval($numero);
    $entero = floor($numero);
    $decimal = round(($numero - $entero) * 100);
    
    if ($entero === 0) return 'CERO PESOS ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
    
    $texto = convertirNumeroAdmin($entero);
    return $texto . ' PESOS ' . str_pad($decimal, 2, '0', STR_PAD_LEFT) . '/100 M.N.';
}

// Calcular totales
$subtotalGeneral = 0;
$productos = isset($data) ? $data : [];
if (!empty($productos)):
    foreach ($productos as $item):
        $cantidad = isset($item['cantidad']) ? floatval($item['cantidad']) : 0;
        $precio = isset($item['precio_unitario']) ? floatval($item['precio_unitario']) : 0;
        $subtotalProducto = $cantidad * $precio;
        $subtotalGeneral += $subtotalProducto;
    endforeach;
endif;
$ivaGeneral = $subtotalGeneral * 0.16;
$totalGeneral = $subtotalGeneral + $ivaGeneral;
?>

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

        <div style="margin: 10px 0;">[MTM/CAYS/PF/<?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?>]</div>

        <div style="font-weight: bold; font-size: 12pt; text-align: center; margin: 20px 0;">
            CONTRATO ADMINISTRATIVO ABIERTO PARA<br>
            EL "SUMINISTRO DE ARTÍCULOS DE <?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?>"
        </div>

        <div style="text-align: justify; margin-bottom: 15px;">
            CONTRATO ADMINISTRATIVO QUE CELEBRAN POR UNA PARTE EL MUNICIPIO CONSTITUCIONAL DE TEMASCALCINGO, MÉXICO, REPRESENTADO EN ESTE ACTO POR LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE <strong>PRESIDENTA MUNICIPAL CONSTITUCIONAL</strong>; <strong>C. RAMIRO GALINDO REYES</strong>, SECRETARIO DEL AYUNTAMIENTO; 
            <span class="campo campo-largo"><?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?></span>
            <span class="campo campo-mediano"><?= isset($data[0]['area']) ? esc($data[0]['area']) : '' ?></span> 
            Y ÁREA USUARIA; QUIÉN EN LO SUCESIVO Y PARA LOS EFECTOS DEL PRESENTE SE LE DENOMINARÁ <strong>"EL MUNICIPIO"</strong>; Y POR OTRA PARTE EL <span class="campo campo-largo"><?= isset($data[0]['proveedor']) ? esc($data[0]['proveedor']) : '' ?></span>, EN SU CARÁCTER DE PERSONA FÍSICA A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ <strong>"EL PROVEEDOR"</strong>, AL TENOR DE LAS DECLARACIONES Y CLÁUSULAS SIGUIENTES:
        </div>

        <div class="clausula" style="text-align: center;"><strong>DECLARACIONES</strong></div>
        <div class="clausula"><strong>I. "EL MUNICIPIO" DECLARA:</strong></div>
        <div class="declaracion-item">1. QUE CON ARREGLO A LO PREVISTO POR LOS ARTÍCULOS 115, DE LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS; 113, 116, 123, Y 125, DE LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, 31, FRACCIÓN XVIII, DE LA LEY ORGÁNICA MUNICIPAL DEL ESTADO DE MÉXICO; ASÍ COMO LOS ARTÍCULOS 65, 66, 67, 68, 69, 70, 71, 72, 73, 74 Y 75 DE LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO EL 120, 123, 124, 125 Y 127 DEL REGLAMENTO; EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, TIENE LA ATRIBUCIÓN PARA CELEBRAR EL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">2. QUE LA <strong>C. VERÓNICA MORENO MARTÍNEZ</strong>, EN SU CARÁCTER DE PRESIDENTA MUNICIPAL CONSTITUCIONAL, ESTÁ FACULTADA PARA CONOCER, OTORGAR Y SUSCRIBIR ESTE CONTRATO.</div>
        <div class="declaracion-item">3. QUE EL <strong>C. RAMIRO GALINDO REYES</strong>, EN SU CARÁCTER DE SECRETARIO DEL AYUNTAMIENTO, EN TÉRMINOS DE LO QUE ESTABLECE EL ARTÍCULO 91 FRACCIÓN V DE LA LEY ORGÁNICA MUNICIPAL, TIENE LA ATRIBUCIÓN DE VALIDAR CON SU FIRMA LOS DOCUMENTOS OFICIALES EMANADOS DE <strong>"EL MUNICIPIO"</strong> Y DE CUALQUIERA DE SUS MIEMBROS.</div>
        <div class="declaracion-item">4. LAS DEPENDENCIAS Y ENTIDADES DE LA ADMINISTRACIÓN PÚBLICA MUNICIPAL CONDUCIRÁN SUS ACCIONES CON BASE A LOS PROGRAMAS ANUALES QUE ESTABLECE EL MUNICIPIO PARA EL LOGRO DE SUS OBJETIVOS.</div>
        <div class="declaracion-item">5. QUE TIENE ESTABLECIDO SU DOMICILIO EN <span class="campo campo-largo"><?= isset($data[0]['domicilio_proveedor']) ? esc($data[0]['domicilio_proveedor']) : '' ?></span>, MISMO QUE SE SEÑALA PARA LOS FINES Y EFECTOS LEGALES DEL PRESENTE INSTRUMENTO.</div>
        <div class="declaracion-item">6. MANIFIESTA <strong>"EL MUNICIPIO"</strong> QUE TIENE EN SU HABER RECURSOS PECUNIARIOS PROVENIENTES DE PARTICIPACIONES FEDERALES PARA EL <span class="campo campo-mediano"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span> CONFORME AL PRESUPUESTO DE EGRESOS DE LA FEDERACIÓN PARA EL EJERCICIO FISCAL 2026.</div>
        <div class="declaracion-item">7. QUE LA ADJUDICACIÓN DEL CONTRATO SE REALIZÓ MEDIANTE PROCEDIMIENTO POR ADJUDICACIÓN DIRECTA, DE CONFORMIDAD CON LOS ARTÍCULOS 27, FRACCIÓN I, 48 FRACCIÓN XI, DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, 91, 92 Y 94 FRACCIÓN II, DE SU RESPECTIVO REGLAMENTO.</div>

        <div class="clausula"><strong>II. DE "EL PROVEEDOR", BAJO PROTESTA DE DECIR VERDAD DECLARA:</strong></div>
        <div class="declaracion-item">1. QUE ESTÁ CONSTITUIDO LEGALMENTE COMO <span class="campo campo-largo"><?= isset($data[0]['proveedor']) ? esc($data[0]['proveedor']) : '' ?></span>, SEGÚN CONSTA EN EL ACTA DE NACIMIENTO NÚMERO <span class="campo campo-mediano"><?= isset($data[0]['num_acta_nacimiento']) ? esc($data[0]['num_acta_nacimiento']) : '' ?></span>, CON CLAVE ÚNICA DE REGISTRO DE POBLACIÓN (CURP) <span class="campo campo-mediano"><?= isset($data[0]['curp']) ? esc($data[0]['curp']) : '' ?></span>, REGISTRADO EN EL MUNICIPIO DE TEMASCALCINGO, ESTADO DE MÉXICO EL DÍA <span class="campo campo-mediano"><?= isset($data[0]['created_at']) ? date('d/m/Y', strtotime($data[0]['created_at'])) : '' ?></span>, MISMO QUE SE ACREDITA CON IDENTIFICACIÓN OFICIAL CON NÚMERO DE FOLIO <span class="campo campo-mediano"><?= isset($data[0]['num_credencial_votar']) ? esc($data[0]['num_credencial_votar']) : '' ?></span> EMITIDA POR EL INSTITUTO NACIONAL ELECTORAL.</div>
        <div class="declaracion-item">2. QUE PARA EFECTOS DEL PRESENTE CONTRATO EL <span class="campo campo-largo"><?= isset($data[0]['proveedor']) ? esc($data[0]['proveedor']) : '' ?></span>, SEÑALA COMO SU DOMICILIO FISCAL UBICADO EN <span class="campo campo-largo"><?= isset($data[0]['domicilio_proveedor']) ? esc($data[0]['domicilio_proveedor']) : '' ?></span> NÚMERO DE TELÉFONO <span class="campo campo-mediano"><?= isset($data[0]['telefono_principal']) ? esc($data[0]['telefono_principal']) : '' ?></span> Y CORREO ELECTRÓNICO <span class="campo campo-mediano"><?= isset($data[0]['correo']) ? esc($data[0]['correo']) : '' ?></span>.</div>
        <div class="declaracion-item">3. QUE CUENTA CON EL DEBIDO REGISTRO FEDERAL DE CONTRIBUYENTES <span class="campo campo-mediano"><?= isset($data[0]['rfc']) ? esc($data[0]['rfc']) : '' ?></span>, CON ACTIVIDAD ECONÓMICA SUMINISTRO DE <span class="campo campo-mediano"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span>.</div>
        <div class="declaracion-item">4. QUE CONOCE LAS ESPECIFICACIONES DEL PROCEDIMIENTO DE ADJUDICACIÓN DIRECTA REFERENTE AL SUMINISTRO DE <span class="campo campo-mediano"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span> EL CUAL LLEVA A CABO EL MUNICIPIO DE TEMASCALCINGO Y DEMÁS DOCUMENTOS QUE SE ENCUENTRAN INTEGRADOS AL EXPEDIENTE QUE SE FORMÓ CON MOTIVO DEL PROCEDIMIENTO DE ADQUISICIÓN ANTES REFERIDO.</div>
        <div class="declaracion-item">5. QUE CONOCE PLENAMENTE LAS DISPOSICIONES, QUE PARA EL CASO DE LA CONTRATACIÓN DE SERVICIOS SE ESTABLECE EN LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS, LA CONSTITUCIÓN POLÍTICA DEL ESTADO LIBRE Y SOBERANO DE MÉXICO, LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, ASÍ COMO SU RESPECTIVO REGLAMENTO.</div>
        <div class="declaracion-item">6. QUE BAJO PROTESTA DE DECIR VERDAD LA PERSONA QUE REPRESENTA NO SE ENCUENTRA EN NINGUNO DE LOS SUPUESTOS QUE ESTABLECE EL ARTÍCULO 74 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

        <div class="clausula"><strong>III. DE LAS "PARTES"</strong></div>
        <div class="declaracion-item">1. QUE EN VIRTUD DE LAS DECLARACIONES QUE ANTECEDEN, Y UNA VEZ QUE SE HAN RECONOCIDO SU CAPACIDAD Y PERSONALIDAD, CONVIENEN EXPRESAMENTE EN SUJETARSE A LAS SIGUIENTES:</div>

        <div class="clausula" style="text-align: center;"><strong>DEFINICIONES</strong></div>
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

        <div class="clausula" style="text-align: center;"><strong>CLÁUSULAS</strong></div>
        <div class="clausula"><strong>PRIMERA. - OBJETO.</strong> EL PRESENTE CONTRATO TIENE POR OBJETO QUE <strong>"EL PROVEEDOR"</strong> SUMINISTRE A <strong>"EL MUNICIPIO"</strong> ARTÍCULOS DE <span class="campo campo-mediano"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span> OBLIGÁNDOSE A ENTREGAR LOS BIENES EN LAS CANTIDADES, ESPECIFICACIONES TÉCNICAS, CALIDAD Y PLAZOS ESTABLECIDOS, GARANTIZANDO QUE LOS MISMOS SE ENCUENTREN EN ÓPTIMAS CONDICIONES, NUEVOS, LIBRES DE DEFECTOS Y APEGADOS A LAS CARACTERÍSTICAS REQUERIDAS.</div>

        <div class="texto">ASÍ MISMO, <strong>"LAS PARTES"</strong> ACUERDAN QUE:</div>
        <div class="declaracion-item">a) LAS CANTIDADES PODRÁN CAMBIAR DE ACUERDO A LAS NECESIDADES DE LAS DEPENDENCIAS DEL MUNICIPIO.</div>
        <div class="declaracion-item">b) PODRÁN ADQUIRIRSE PRODUCTOS QUE NO ESTÉN EN EL LISTADO, DE ACUERDO A LAS NECESIDADES PROPIAS DE LAS DEPENDENCIAS DEL MUNICIPIO Y QUE SEAN CONSIDERADOS DENTRO DE LA PARTIDA PRESUPUESTAL <span class="campo campo-mediano">2026</span>.</div>
        <div class="declaracion-item">c) LAS MARCAS DE LOS PRODUCTOS SOLICITADOS PODRÁN CAMBIAR DE ACUERDO AL STOCK DEL PROVEEDOR.</div>

        <div class="texto">LOS BIENES OBJETO DEL PRESENTE CONTRATO SE DETALLAN EN LA TABLA SIGUIENTE, LA CUAL FORMA PARTE INTEGRAL DE ESTA CLÁUSULA E INCLUYE DESCRIPCIÓN, CANTIDAD, UNIDAD DE MEDIDA Y ESPECIFICACIONES DE CADA ARTÍCULO:</div>

        <table>
            <thead>
                <tr>
                    <th>PARTIDA</th>
                    <th>DESCRIPCIÓN DETALLADA DE LOS BIENES</th>
                    <th>CANTIDAD</th>
                    <th>U. MEDIDA</th>
                    <th>MARCA Y/O MODELO</th>
                    <th>PRECIO UNITARIO</th>
                    <th>IMPORTE</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $contador = 1;
                if (!empty($productos)):
                    foreach ($productos as $item):
                        $cantidad = isset($item['cantidad']) ? floatval($item['cantidad']) : 0;
                        $precio = isset($item['precio_unitario']) ? floatval($item['precio_unitario']) : 0;
                        $subtotalProducto = $cantidad * $precio;
                ?>
                <tr>
                    <td><?= $contador++ ?></td>
                    <td><?= isset($item['descripcion']) ? esc($item['descripcion']) : '' ?></td>
                    <td><?= $cantidad ?></td>
                    <td><?= isset($item['unidad_medida']) ? esc($item['unidad_medida']) : '' ?></td>
                    <td><?= isset($item['marca_modelo']) ? esc($item['marca_modelo']) : '' ?></td>
                    <td>$<?= number_format($precio, 2) ?></td>
                    <td>$<?= number_format($subtotalProducto, 2) ?></td>
                </tr>
                <?php 
                    endforeach;
                endif; 
                ?>
            </tbody>
        </table>

        <table style="width: auto; float: right; border: none;">
            <tr style="border: none;">
                <td style="border: none;">SUBTOTAL</td>
                <td style="border: none;">:</td>
                <td style="border: none; font-weight: bold;">$<?= number_format($subtotalGeneral, 2) ?></td>
            </tr>
            <tr style="border: none;">
                <td style="border: none;">I.V.A.</td>
                <td style="border: none;">:</td>
                <td style="border: none; font-weight: bold;">$<?= number_format($ivaGeneral, 2) ?></td>
            </tr>
            <tr style="border: none;">
                <td style="border: none;">TOTAL</td>
                <td style="border: none;">:</td>
                <td style="border: none; font-weight: bold;">$<?= number_format($totalGeneral, 2) ?></td>
            </tr>
        </table>
        <div style="clear: both;"></div>

        <div class="clausula"><strong>SEGUNDA. -- MONTOS.</strong> LA CANTIDAD A PAGAR POR PARTE DE <strong>"EL MUNICIPIO"</strong> SERÁ DE UN MONTO MÁXIMO POR LA CANTIDAD DE <strong><span class="campo campo-corto">$<?= number_format($totalGeneral, 2) ?> (<?= numeroALetrasAdminDos($totalGeneral) ?>)</span>; INCLUIDO EL IMPUESTO AL VALOR AGREGADO I.V.A.</strong> Y UN MONTO MÍNIMO POR LA CANTIDAD DE <strong><span class="campo campo-corto">$<?= number_format($subtotalGeneral, 2) ?> (<?= numeroALetrasAdminDos($subtotalGeneral) ?>)</span>; INCLUIDO EL IMPUESTO AL VALOR AGREGADO I.V.A.,</strong> DIVIDIDO EN PARCIALIDADES NECESARIAS Y A LA CORRECTA PRESENTACIÓN DE LAS FACTURAS, POR EL PERIODO COMPRENDIDO DEL <span class="campo campo-mediano"><?= isset($data[0]['created_at']) ? date('d/m/Y', strtotime($data[0]['created_at'])) : '' ?></span>.</div>

        <div class="clausula"><strong>TERCERA. - ANTICIPO.</strong> <strong>"EL MUNICIPIO"</strong> NO OTORGARÁ A <strong>"EL PROVEEDOR"</strong> ANTICIPO ALGUNO, MOTIVO DEL PRESENTE CONTRATO.</div>

        <div class="clausula"><strong>CUARTA. -- PRECIOS.</strong> LOS PRECIOS OFERTADOS SERÁN FIJOS Y SOLO PODRÁ HABER MODIFICACIONES EN ELLOS PREVIO AVISO DE <strong>"EL PROVEEDOR"</strong>, DEBIDAMENTE JUSTIFICADO POR ESCRITO.</div>

        <div class="clausula"><strong>QUINTA. -- FORMA DE PAGO. "LAS PARTES"</strong> ACUERDAN QUE EL PAGO POR EL "SUMINISTRO DE ARTÍCULOS DE <span class="campo campo-chico"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span>" OBJETO DEL PRESENTE CONTRATO, SE CUBRIRÁ DE LA MANERA SIGUIENTE:</div>
        <div class="declaracion-item">I. <strong>"EL PROVEEDOR"</strong> ENTREGARÁ SU FACTURA A MÁS TARDAR A LOS DIEZ DÍAS HÁBILES POSTERIORES A LA ENTREGA DE LOS ARTÍCULOS SOLICITADOS CON SU RESPECTIVO XML PARA TRAMITE DE PAGO EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN LAS INSTALACIONES DEL EX SEMINARIO UBICADAS EN AV. DE LA PAZ ESQUINA MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>
        <div class="declaracion-item">II. <strong>"EL MUNICIPIO"</strong> SE COMPROMETE Y OBLIGA A PAGAR LA CANTIDAD MENCIONADA EN LA SEGUNDA CLÁUSULA DEL PRESENTE CONTRATO EN PARCIALIDADES, DE ACUERDO A LAS FACTURAS PRESENTADAS POR PARTE DE <strong>"EL PROVEEDOR"</strong> Y DE CONFORMIDAD A LA DISPOSICIÓN DE RECURSOS PECUNIARIOS, LAS FACTURAS SE ENTREGARÁN EN LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL, SITO EN LAS INSTALACIONES DEL EX SEMINARIO, UBICADAS EN AV. DE LA PAZ ESQUINA MIGUEL HIDALGO, COL, CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400.</div>
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

        <div class="clausula"><strong>SEXTA. -- PAGO EN EXCESO.</strong> <strong>"EL MUNICIPIO"</strong> APREMIA A <strong>"EL PROVEEDOR"</strong> QUE, EN CASO DE RECIBIR POR CUALQUIER CAUSA, CANTIDADES POR EXCESO DE PAGO DERIVADAS DEL PRESENTE CONTRATO, SE OBLIGA A REINTEGRAR ÍNTEGRAMENTE A <strong>"EL MUNICIPIO"</strong> LAS CANTIDADES QUE RESULTEN, DENTRO DE UN PLAZO NO MAYOR A DIEZ (10) DÍAS HÁBILES CONTANDO A PARTIR DE LA NOTIFICACIÓN CORRESPONDIENTE, EFECTUANDO EL PAGO EN LA FORMA Y CUENTA BANCARIA QUE ÉSTE LE INDIQUE. EL INCUMPLIMIENTO DE ESTA OBLIGACIÓN FACULTARÁ A <strong>"EL MUNICIPIO"</strong>, PARA COMPENSAR DICHAS CANTIDADES CONTRA PAGOS PENDIENTES O INICIAR LAS ACCIONES LEGALES CONDUCENTES.</div>

        <div class="clausula"><strong>SÉPTIMA. -- OBLIGACIONES DE "EL PROVEEDOR"</strong></div>
        <div class="declaracion-item">I. ENTREGAR A EL MUNICIPIO DE TEMASCALCINGO, MÉXICO EL SUMINISTRO DE <span class="campo campo-chico"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span> EN TIEMPO, FORMA Y CALIDAD.</div>
        <div class="declaracion-item">II. INFORMAR A <strong>"EL MUNICIPIO"</strong> DE CUALQUIER ANOMALÍA QUE SE PRESENTE DURANTE LA EJECUCIÓN DEL PRESENTE CONTRATO, EN CUANTO IMPIDA O DIFICULTE LLEVAR A CABO EL PROCEDIMIENTO REFERENTE AL SUMINISTRO DE <span class="campo campo-chico"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span> COMUNICAR POR ESCRITO OPORTUNAMENTE A <strong>"EL MUNICIPIO"</strong> CUALQUIER CAMBIO DE DOMICILIO.</div>
        <div class="declaracion-item">III. CUMPLIR CON LAS DEMÁS OBLIGACIONES QUE DERIVEN DEL PRESENTE CONTRATO.</div>

        <div class="clausula"><strong>OCTAVA. TIEMPO Y LUGAR DE ENTREGA:</strong> LAS ENTREGAS SE EFECTUARÁN POR EL PERIODO COMPRENDIDO DEL 24 DE MARZO AL 31 DE DICIEMBRE DE 2026, EN LOS TÉRMINOS PACTADOS DENTRO DE LA CLÁUSULA PRIMERA DE ESTE CONTRATO.</div>

        <div class="clausula"><strong>NOVENA. - DE LAS GARANTÍAS. "EL PROVEEDOR"</strong> DEBERÁ ENTREGAR A <strong>"EL MUNICIPIO"</strong> LAS GARANTÍAS SIGUIENTES:</div>
        <div class="declaracion-item">I. <strong>CUMPLIMIENTO DE CONTRATO:</strong> EL CHEQUE DE CAJA, CHEQUE CERTIFICADO O FIANZA SE CONSTITUIRÁ POR EL 10% DEL IMPORTE DEL SUBTOTAL DEL CONTRATO (SIN INCLUIR EL IMPUESTO AL VALOR AGREGADO), DESPUÉS DE LOS DIEZ DÍAS HÁBILES A LA FIRMA DE CONTRATO, POR LA CANTIDAD DE <strong><span class="campo campo-corto">$<?= number_format($subtotalGeneral * 0.10, 2) ?> (<?= numeroALetrasAdminDos($subtotalGeneral * 0.10) ?>)</span></strong> Y ESTARÁ VIGENTE HASTA EL CUMPLIMIENTO DEL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">II. EL CHEQUE DE CAJA, CHEQUE CERTIFICADO O FIANZA DE CUMPLIMIENTO DE CONTRATO SE OTORGA EN LOS TÉRMINOS DEL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">a. EL CHEQUE DE CAJA, CHEQUE CERTIFICADO O FIANZA DE CUMPLIMIENTO DE CONTRATO SE EMITIRÁ A NOMBRE DEL <strong>"MUNICIPIO DE TEMASCALCINGO MÉXICO".</strong></div>
        <div class="declaracion-item">b. EL CHEQUE DE CAJA, CHEQUE CERTIFICADO O FIANZA DE CUMPLIMIENTO DE CONTRATO PERMANECERÁ VIGENTE AUN CUANDO SE OTORGUE PRÓRROGA O PLAZO ADICIONAL AL FIADOR PARA EL CUMPLIMIENTO DE LAS OBLIGACIONES GARANTIZADAS, INCLUSO SI DICHAS PRÓRROGAS HUBIERAN SIDO SOLICITADAS O AUTORIZADAS DE MANERA EXTEMPORÁNEA.</div>
        <div class="declaracion-item">c. EN CASO DE QUE EL PROVEEDOR PRESENTE FIANZA, PARA CANCELARLA SERÁ REQUISITO INDISPENSABLE LA CONFORMIDAD EXPRESA Y POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>, QUIEN LA EMITIRÁ SOLO CUANDO <strong>"EL PROVEEDOR"</strong> HAYA CUMPLIDO CON TODAS LAS OBLIGACIONES.</div>
        <div class="declaracion-item">d. DE PRESENTARSE QUE LA GARANTIA SEA FIANZA LA INSTITUCIÓN AFIANZADORA ACEPTA EXPRESAMENTE LO PRECEPTUADO EN LOS ARTÍCULOS 93, 94 Y 118 DE LA LEY FEDERAL DE LAS INSTITUCIONES DE SEGUROS Y FIANZAS VIGENTE.</div>
        <div class="declaracion-item">e. QUE <strong>"EL MUNICIPIO"</strong> HARÁ EFECTIVA LA GARANTÍA A PARTIR DEL INCUMPLIMIENTO DE CUALQUIER OBLIGACIÓN CONSIGNADA EN TODAS Y CADA UNA DE LAS CLÁUSULAS DEL PRESENTE CONTRATO, POR LA CANTIDAD EN DINERO QUE SE ORIGINE.</div>
        <div class="declaracion-item">f. QUE <strong>"EL MUNICIPIO"</strong> HARÁ EFECTIVA LA GARANTÍA EN CASO DE QUE SEA RESCINDIDO EL CONTRATO CELEBRADO POR CAUSAS IMPUTABLES A <strong>"EL PROVEEDOR".</strong></div>
        <div class="texto">SI TRANSCURRIDO EL PLAZO SEÑALADO EN EL PRIMER PÁRRAFO <strong>"EL PROVEEDOR"</strong> NO HUBIERE PRESENTADO LA GARANTÍA DE CUMPLIMIENTO RESPECTIVA, <strong>"EL MUNICIPIO"</strong> NO FORMALIZARÁ EL PRESENTE INSTRUMENTO.</div>

        <div class="clausula"><strong>DÉCIMA. -- SUPERVISIÓN. -</strong> <strong>"LAS PARTES"</strong> ACUERDAN QUE, PARA EL ADECUADO CUMPLIMIENTO DEL OBJETO DEL PRESENTE CONTRATO, TANTO <strong>"EL MUNICIPIO"</strong> COMO <strong>"EL PROVEEDOR"</strong> DESIGNARÁN AL PERSONAL RESPONSABLE DE SUPERVISAR, VERIFICAR Y DAR SEGUIMIENTO A LA CORRECTA EJECUCIÓN DEL SUMINISTRO DE <span class="campo campo-chico"><?= isset($data[0]['catalogo']) ? esc($data[0]['catalogo']) : '' ?></span>.</div>

        <div class="clausula"><strong>DÉCIMA PRIMERA. - RESCISIÓN. -</strong> "<strong>EL MUNICIPIO</strong>", PODRÁ INICIAR EL PROCEDIMIENTO DE RESCISIÓN DEL PRESENTE CONTRATO, SIN RESPONSABILIDAD ALGUNA PARA EL, POR LAS SIGUIENTES CAUSAS IMPUTABLES A "<strong>EL PROVEEDOR</strong>":</div>
        <div class="declaracion-item">I. PARA EL CASO DE QUE <strong>"EL PROVEEDOR"</strong> NO PRESENTE LA GARANTÍA DESCRITA EN LA FRACCIÓN I DE LA CLÁUSULA NOVENA DEL PRESENTE CONTRATO, SE RESCINDIRÁ EL MISMO, DEBIENDO PAGAR ÉSTE, A <strong>"EL MUNICIPIO"</strong> LOS DAÑOS Y PERJUICIOS QUE ELLO LE OCASIONE, ASÍ COMO LAS DEMÁS SANCIONES QUE EL PRESENTE CONTRATO ESTABLECE.</div>
        <div class="declaracion-item">II. SI <strong>"EL PROVEEDOR"</strong> NO DE LAS FACILIDADES NECESARIAS A LOS SERVIDORES PÚBLICOS QUE AL EFECTO DESIGNE <strong>"EL MUNICIPIO"</strong> PARA LLEVAR A CABO LA REVISIÓN DE LOS INSUMOS ADQUIRIDOS.</div>
        <div class="declaracion-item">III. SI <strong>"EL PROVEEDOR"</strong> CEDE, TRASPASA O SUBCONTRATA LA TOTALIDAD O PARTE DE LOS INSUMOS ADQUIRIDOS SIN EL CONSENTIMIENTO POR ESCRITO DE <strong>"EL MUNICIPIO"</strong> Y SI CEDE A TERCEROS EN FORMA PARCIAL O TOTAL LOS DERECHOS Y OBLIGACIONES, Y LOS DERECHOS DE COBRO DERIVADOS DEL PRESENTE CONTRATO, SIN OBTENER LA AUTORIZACIÓN PREVIA POR ESCRITO DE <strong>"EL MUNICIPIO"</strong>.</div>
        <div class="declaracion-item">IV. SI ES DECLARADO EN PROCEDIMIENTO ADQUISITIVO MERCANTIL, QUIEBRA O SUSPENSIÓN DE PAGOS, EN TÉRMINOS DE LO QUE ESTABLECE EL CÓDIGO DE COMERCIO Y DE MANERA SUPLETORIA EL CÓDIGO CIVIL FEDERAL.</div>
        <div class="declaracion-item">V. CAMBIE SU NACIONALIDAD MEXICANA POR OTRA.</div>
        <div class="declaracion-item">VI. SIENDO EXTRANJERO INVOQUE LA PROTECCIÓN DE SU GOBIERNO EN RELACIÓN AL PRESENTE CONTRATO.</div>
        <div class="declaracion-item">VII. EN GENERAL, POR INCUMPLIMIENTO DE CUALESQUIERA DE LAS OBLIGACIONES DERIVADAS DEL PRESENTE CONTRATO, EL CÓDIGO, EL REGLAMENTO, LOS TRATADOS Y DEMÁS DISPOSICIONES APLICABLES.</div>
        <div class="declaracion-item">VIII. POR CUALQUIER OTRA CAUSA IMPUTABLE A ÉL, SIMILAR A LAS ANTES MENCIONADAS.</div>
        <div class="texto">EN CASO DE QUE <strong>"EL MUNICIPIO"</strong> OPTE POR LA RESCISIÓN DEL CONTRATO; <strong>"EL PROVEEDOR"</strong> ESTARÁ OBLIGADO A PAGAR DAÑOS Y PERJUICIOS, OCASIONADOS A <strong>"EL MUNICIPIO"</strong>.</div>

        <div class="clausula"><strong>DÉCIMA SEGUNDA. -- RELACIÓN LABORAL.</strong> <strong>"EL PROVEEDOR"</strong>, EN SU CALIDAD DE EMPRESARIO Y EMPLEADOR DEL PERSONAL QUE INTERVENGA EN EL SUMINISTRO DE LOS BIENES, OBJETO DE ESTE CONTRATO, DECLARA QUE DISPONE DE LOS RECURSOS PROPIOS Y SUFICIENTES PARA ASUMIR PLENAMENTE LAS OBLIGACIONES DERIVADAS DE LAS RELACIONES LABORALES. EN CONSECUENCIA, SERÁ EL ÚNICO RESPONSABLE DEL CUMPLIMIENTO DE LAS DISPOSICIONES LEGALES Y DEMÁS NORMATIVAS APLICABLES EN MATERIA LABORAL Y DE SEGURIDAD SOCIAL, ASÍ COMO DE ATENDER Y RESPONDER POR CUALQUIER RECLAMACIÓN QUE SUS TRABAJADORES PRESENTEN EN SU CONTRA O EN CONTRA DE <strong>"EL MUNICIPIO"</strong> RELACIONADA CON LOS BIENES O SERVICIOS OBJETO DEL PRESENTE CONTRATO.</div>

        <div class="clausula"><strong>DÉCIMA TERCERA. -- PATENTES, MARCAS Y DERECHOS DE AUTOR.</strong> <strong>"EL PROVEEDOR"</strong> SERÁ RESPONSABLE POR LAS VIOLACIONES QUE SE CAUSEN EN MATERIA DE PATENTES, MARCAS O DERECHOS DE AUTOR, CON MOTIVO DE LA ADQUISICIÓN, ORIGEN, USO, ENAJENACIÓN Y EXPLOTACIÓN DE LOS BIENES O SERVICIOS OBJETO DEL CONTRATO, POR LO QUE SE OBLIGA A SACAR EN PAZ Y A SALVO A <strong>"EL MUNICIPIO"</strong>, EN CASO DE CUALQUIER RECLAMACIÓN DE UN TERCERO QUE ALEGUE DERECHOS POR VIOLACIONES A LA LEY DE PROPIEDAD INDUSTRIAL Y A LA LEY FEDERAL DEL DERECHO DE AUTOR, SOBRE LOS BIENES MATERIA DEL PRESENTE CONTRATO, SIN CARGO ALGUNO PARA ÉSTE Y LA RESPONSABILIDAD RECAERÁ UNICAMENTE EN <strong>"EL PROVEEDOR"</strong>.</div>

        <div class="clausula"><strong>DÉCIMA CUARTA. -- TERMINACIÓN ANTICIPADA.</strong> <strong>"EL MUNICIPIO"</strong>, PODRÁ DAR POR TERMINADO ANTICIPADAMENTE EL CONTRATO SIN RESPONSABILIDAD ALGUNA A SU CARGO. EN ESTE SUPUESTO <strong>"EL MUNICIPIO"</strong> COMUNICARÁ POR ESCRITO A <strong>"EL PROVEEDOR"</strong> LA FECHA EN QUE SURTIRÁ EFECTOS DICHA TERMINACIÓN.</div>

        <div class="clausula"><strong>DÉCIMA QUINTA. -- RENUNCIA DE FUERO.</strong> <strong>"LAS PARTES"</strong> RENUNCIAN EXPRESAMENTE A CUALQUIER FUERO DISTINTO, SOMETIÉNDOSE A LOS TRIBUNALES DEL ESTADO DE MÉXICO.</div>

        <div class="clausula"><strong>DÉCIMA SEXTA. -- MODIFICACIÓN. -</strong> <strong>"EL MUNICIPIO"</strong> DENTRO DE SU PRESUPUESTO APROBADO, PODRÁ MODIFICAR EL PRESENTE CONTRATO DE CONFORMIDAD CON LO ESTABLECIDO EN EL ARTÍCULO 125 DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, SIEMPRE QUE DICHAS MODIFICACIONES NO REBASEN EN SU CONJUNTO EL 30% DEL IMPORTE ORIGINAL DEL CONTRATO Y QUE LOS PRECIOS DE LOS BIENES SE MANTENGAN EN LOS MISMOS TÉRMINOS PACTADOS INICIALMENTE.</div>

        <div class="clausula"><strong>DÉCIMA SÉPTIMA. -- LEGISLACIÓN.</strong> ESTE CONTRATO SE RIGE POR LO ESTABLECIDO EN LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y SU RESPECTIVO REGLAMENTO.</div>

        <div class="clausula"><strong>DÉCIMA OCTAVA. - JURISDICCIÓN.</strong> PARA LA INTERPRETACIÓN, EJECUCIÓN, CUMPLIMIENTO O TERMINACIÓN DEL PRESENTE CONTRATO, <strong>"LAS PARTES"</strong> ACUERDAN SOMETERSE EXPRESAMENTE A LA JURISDICCIÓN Y COMPETENCIA DEL TRIBUNAL DE JUSTICIA ADMINISTRATIVA DEL ESTADO DE MÉXICO, RENUNCIANDO DESDE ESTE MOMENTO A CUALQUIER OTRO FUERO QUE POR RAZÓN DE SU DOMICILIO O PRESENTE FUTURO PUDIERA CORRESPONDERLES.</div>

        <div class="numero-pagina">3 DE 4</div>
    </div>
</div>

<!-- ========================================== -->
<!-- HOJA 4: CLÁUSULA DÉCIMA NOVENA, VIGÉSIMA, FIRMAS Y TESTIGOS -->
<!-- ========================================== -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="encabezado-logo">
            <span>AYUNTAMIENTO DE TEMASCALCINGO 2025-2027</span>
            <span>TEMASCALCINGO</span>
        </div>
        <div class="frase-anio">“2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO.”</div>

        <div class="clausula"><strong>DÉCIMA NOVENA. - POR NO LLEGAR AL MONTO MÍNIMO.</strong> EL SUMINISTRO ESTARÁ SUJETO A LOS REQUERIMIENTOS DE LAS ÁREAS ADMINISTRATIVAS DEL MUNICIPIO DE TEMASCALCINGO, MÉXICO, POR LO QUE, EN EL CASO DE NO ADQUIRIR EL MONTO MÍNIMO, POR ALGUNA SITUACIÓN NO IMPUTABLE A <strong>"EL MUNICIPIO"</strong> NO SE GENERARÁ NINGÚN TIPO DE RESPONSABILIDAD Y/O SANCIÓN POR NINGUNA DE LAS PARTES.</div>

        <div class="clausula"><strong>VIGÉSIMA. - PENAS CONVENCIONALES.</strong> EN CASO DEL INCUMPLIMIENTO POR PARTE DE <strong>"EL PROVEEDOR"</strong> DE LAS OBLIGACIONES PACTADAS EN EL CONTRATO, SE APLICARÁ UNA PENA CONVENCIONAL EQUIVALENTE AL MONTO QUE RESULTE DE APLICAR EL 10% DEL VALOR DE LOS BIENES QUE NO SE HAYAN SUMINISTRADO A SATISFACCIÓN DE <strong>"EL MUNICIPIO"</strong>, LO ANTERIOR, CON FUNDAMENTO EN LO DISPUESTO EN EL ARTÍCULO 120 FRACCIÓN VII DEL REGLAMENTO DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS.</div>

        <div class="texto">UNA VEZ LEÍDO EL PRESENTE CONTRATO Y CONFORMES CON SU CONTENIDO, PROCEDEN A RATIFICAR EN TODAS Y CADA UNA DE SUS PARTES FIRMÁNDOLO POR TRIPLICADO, AL CALCE Y AL MARGEN PARA DEBIDA CONSTANCIA LEGAL, EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO, A <span class="campo campo-mediano"><?= isset($data[0]['created_at']) ? date('d/m/Y', strtotime($data[0]['created_at'])) : '' ?></span>.</div>

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
                <span class="campo campo-mediano"><?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?></span><br>
                DIRECTOR DE <span class="campo campo-mediano"><?= isset($data[0]['area']) ? esc($data[0]['area']) : '' ?></span>
            </div>
        </div>

        <div class="firma-block">
            <div class="firma-header">POR "EL PROVEEDOR"</div>
            <div class="firma-body">
                <div style="margin-top: 20px;"></div>
                <span class="campo campo-largo"><?= isset($data[0]['proveedor']) ? esc($data[0]['proveedor']) : '' ?></span><br>
                EN SU CARÁCTER DE PROVEEDOR
            </div>
        </div>

        <div class="firma-block">
            <div class="firma-header">POR LOS "TESTIGOS"</div>
            <div class="firma-doble">
                <div class="item">
                    <div style="margin-top: 20px;"></div>
                    <strong>C. MIRIAM VIANEY OVANDO RUBIO</strong><br>
                    DIRECTORA DE ADMINISTRACIÓN<br>Y DESARROLLO DE PERSONAL
                </div>
                <div class="item">
                    <div style="margin-top: 20px;"></div>
                    <strong>C. RICARDO HERMOSILLO MONDRAGÓN</strong><br>
                    TESORERO MUNICIPAL
                </div>
            </div>
        </div>

        <div class="numero-pagina">4 DE 4</div>
    </div>
</div>

</body>
</html>