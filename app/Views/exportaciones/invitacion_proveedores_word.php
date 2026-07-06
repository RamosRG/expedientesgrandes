<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta charset="UTF-8">
    <title>Invitación a Proveedores</title>
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
            margin: 3.03cm 3cm 2.5cm 3cm;
        }

        body {
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 8pt;
            line-height: 1.5;
            color: #000000;
            background: white;
            margin: 0;
            padding: 0;
        }

        .hoja {
            width: 21cm;
            min-height: 29.7cm;
            padding: 3.03cm 3cm 2.5cm 3cm;
            margin: 0 auto;
            background: white;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 8pt;
            line-height: 1.5;
            color: #000000;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
        }

        .encabezado-anio {
            text-align: center;
            font-weight: bold;
            font-size: 8pt;
            letter-spacing: 0.3px;
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
            font-size: 8pt;
            margin-top: 6px;
            font-weight: normal;
        }

        .copia-archivo {
            margin-top: 35px;
            font-size: 8pt;
        }

        .iniciales {
            margin-top: 6px;
            font-size: 8pt;
        }

        .numero-pagina {
            text-align: right;
            margin-top: 30px;
            font-size: 8pt;
            font-weight: bold;
        }

        .campo-verde {
            display: inline-block;
            border-bottom: 1px solid #2c7a4d;
            min-width: 130px;
            padding: 0px 6px;
            font-weight: 600;
            color: #14532d;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 8pt;
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
                padding: 3.03cm 3cm 2.5cm 3cm !important;
            }
            .campo-verde {
                background: transparent !important;
                border-bottom: 1px solid #000 !important;
            }
        }
    </style>
</head>
<body>

<?php 
// ==============================================
// FUNCIÓN PARA FORMATEAR FECHA EN ESPAÑOL
// ==============================================
function formatearFechaEspanolWord($fechaString) {
    if (empty($fechaString)) return '';
    
    $fecha = new DateTime($fechaString);
    $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
    
    return $fecha->format('d') . ' DE ' . $meses[$fecha->format('n')-1] . ' DE ' . $fecha->format('Y');
}

// ==============================================
// FUNCIÓN PARA NÚMERO A TEXTO
// ==============================================
function numeroATextoWord($numero) {
    $numero = floatval($numero);
    $entero = floor($numero);
    $decimal = round(($numero - $entero) * 100);
    
    $unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
    $especiales = ['DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISEIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'];
    $decenas = ['', 'DIEZ', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA', 'SETENTA', 'OCHENTA', 'NOVENTA'];
    $centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
    
    function convertirCentenasWord($num) {
        $centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];
        if ($num === 0) return '';
        if ($num === 100) return 'CIEN';
        
        $c = floor($num / 100);
        $resto = $num % 100;
        $resultado = '';
        
        if ($c > 0) $resultado .= $centenas[$c];
        if ($resto > 0) {
            if ($c > 0) $resultado .= ' ';
            $resultado .= convertirDecenasWord($resto);
        }
        return $resultado;
    }
    
    function convertirDecenasWord($num) {
        $unidades = ['', 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
        $especiales = ['DIEZ', 'ONCE', 'DOCE', 'TRECE', 'CATORCE', 'QUINCE', 'DIECISEIS', 'DIECISIETE', 'DIECIOCHO', 'DIECINUEVE'];
        $decenas = ['', 'DIEZ', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA', 'SETENTA', 'OCHENTA', 'NOVENTA'];
        
        if ($num < 10) return $unidades[$num];
        if ($num < 20) return $especiales[$num - 10];
        if ($num < 30) {
            if ($num === 20) return 'VEINTE';
            return 'VEINTI' . $unidades[$num - 20];
        }
        
        $d = floor($num / 10);
        $u = $num % 10;
        $resultado = $decenas[$d];
        if ($u > 0) $resultado .= ' Y ' . $unidades[$u];
        return $resultado;
    }
    
    function convertirMilesWord($num) {
        $miles = floor($num / 1000);
        $resto = $num % 1000;
        $resultado = '';
        
        if ($miles > 0) {
            if ($miles === 1) {
                $resultado = 'MIL';
            } else {
                $resultado = convertirCentenasWord($miles) . ' MIL';
            }
        }
        if ($resto > 0) {
            if ($miles > 0) $resultado .= ' ';
            if ($resto < 100) {
                $resultado .= 'Y ' . convertirDecenasWord($resto);
            } else {
                $resultado .= convertirCentenasWord($resto);
            }
        }
        return $resultado;
    }
    
    function convertirNumeroWord($num) {
        if ($num === 0) return 'CERO';
        if ($num < 0) return 'MENOS ' . convertirNumeroWord(abs($num));
        
        $millones = floor($num / 1000000);
        $resto = $num % 1000000;
        $resultado = '';
        
        if ($millones > 0) {
            if ($millones === 1) {
                $resultado = 'UN MILLÓN';
            } else {
                $resultado = convertirCentenasWord($millones) . ' MILLONES';
            }
        }
        if ($resto > 0) {
            if ($millones > 0) $resultado .= ' ';
            if ($resto < 1000) {
                if ($resto < 100) {
                    $resultado .= 'Y ' . convertirDecenasWord($resto);
                } else {
                    $resultado .= convertirCentenasWord($resto);
                }
            } else {
                $resultado .= convertirMilesWord($resto);
            }
        }
        return $resultado;
    }
    
    if ($entero === 0) {
        $texto = 'CERO';
    } else {
        $texto = convertirNumeroWord($entero);
    }
    
    $centavosStr = str_pad($decimal, 2, '0', STR_PAD_LEFT);
    return $texto . ' ' . $centavosStr . '/100 M.N.';
}

// ==============================================
// FUNCIÓN PARA FORMATEAR NÚMERO CON SEPARADORES
// ==============================================
function formatearNumeroWord($numero) {
    return number_format($numero, 2, '.', ',');
}

// ==============================================
// OBTENER PROVEEDORES ÚNICOS (TRABAJANDO CON OBJETOS)
// ==============================================
$proveedoresUnicos = [];
if (!empty($data)) {
    $mapaProveedores = [];
    foreach ($data as $item) {
        // Verificar si es objeto o array
        if (is_object($item)) {
            $clave = isset($item->proveedor) ? $item->proveedor : 'Proveedor_' . uniqid();
            if (!isset($mapaProveedores[$clave])) {
                $mapaProveedores[$clave] = [
                    'proveedor' => isset($item->proveedor) ? $item->proveedor : 'Sin nombre',
                    'rfc' => isset($item->rfc) ? $item->rfc : 'Sin RFC',
                    'domicilio' => isset($item->domicilio) ? $item->domicilio : 'Sin dirección',
                    'correo' => isset($item->correo) ? $item->correo : 'Sin correo'
                ];
            }
        } else {
            // Es array
            $clave = isset($item['proveedor']) ? $item['proveedor'] : 'Proveedor_' . uniqid();
            if (!isset($mapaProveedores[$clave])) {
                $mapaProveedores[$clave] = [
                    'proveedor' => isset($item['proveedor']) ? $item['proveedor'] : 'Sin nombre',
                    'rfc' => isset($item['rfc']) ? $item['rfc'] : 'Sin RFC',
                    'domicilio' => isset($item['domicilio']) ? $item['domicilio'] : 'Sin dirección',
                    'correo' => isset($item['correo']) ? $item['correo'] : 'Sin correo'
                ];
            }
        }
    }
    $proveedoresUnicos = array_values($mapaProveedores);
}

// ==============================================
// DATOS DEL ESTUDIO (TRABAJANDO CON OBJETOS)
// ==============================================
$primerRegistro = isset($data[0]) ? $data[0] : null;
$datosEstudio = [];

if ($primerRegistro) {
    if (is_object($primerRegistro)) {
        $datosEstudio = [
            'no_licitacion' => isset($primerRegistro->no_licitacion) ? $primerRegistro->no_licitacion : 'N/A',
            'nombre_estudio' => isset($primerRegistro->nombre_estudio) ? $primerRegistro->nombre_estudio : 'N/A',
            'created_at' => isset($primerRegistro->created_at) ? $primerRegistro->created_at : '',
            'area' => isset($primerRegistro->area) ? $primerRegistro->area : '',
            'coordinador' => isset($primerRegistro->coordinador) ? $primerRegistro->coordinador : '',
            'total' => isset($primerRegistro->total) ? floatval($primerRegistro->total) : 0
        ];
    } else {
        $datosEstudio = [
            'no_licitacion' => isset($primerRegistro['no_licitacion']) ? $primerRegistro['no_licitacion'] : 'N/A',
            'nombre_estudio' => isset($primerRegistro['nombre_estudio']) ? $primerRegistro['nombre_estudio'] : 'N/A',
            'created_at' => isset($primerRegistro['created_at']) ? $primerRegistro['created_at'] : '',
            'area' => isset($primerRegistro['area']) ? $primerRegistro['area'] : '',
            'coordinador' => isset($primerRegistro['coordinador']) ? $primerRegistro['coordinador'] : '',
            'total' => isset($primerRegistro['total']) ? floatval($primerRegistro['total']) : 0
        ];
    }
}

$fechaFormateada = formatearFechaEspanolWord($datosEstudio['created_at']);
$totalFormateado = formatearNumeroWord($datosEstudio['total']);
$totalTexto = numeroATextoWord($datosEstudio['total']);
$totalProveedores = count($proveedoresUnicos);
?>

<?php if ($totalProveedores === 0): ?>
    <div style="text-align:center;padding:50px;font-size:14pt;color:red;">
        No hay proveedores registrados para este estudio.
    </div>
<?php else: ?>
    <?php $contador = 1; ?>
    <?php foreach ($proveedoresUnicos as $proveedor): ?>
        <!-- ========================================== -->
        <!-- HOJA PARA CADA PROVEEDOR -->
        <!-- ========================================== -->
        <div class="hoja">
            <div class="contenido-hoja">
                <div class="encabezado-anio">
                    "2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO"
                </div>

                <div class="fecha-linea linea-derecha">
                    <strong>TEMASCALCINGO, ESTADO DE MÉXICO, A </strong>
                    <span class="campo-verde campo-mediano"><?= esc($fechaFormateada) ?></span>
                </div>

                <div class="fecha-linea linea-derecha">
                    <strong>DEPENDENCIA:</strong>
                    DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
                </div>

                <div class="fecha-linea linea-derecha" style="margin-bottom: 20px;">
                    <strong>ASUNTO: SOLICITUD DE PARTICIPACIÓN</strong>
                </div>

                <div class="destinatario-linea">
                    <strong>PROVEEDOR:</strong>
                    <span class="campo-verde campo-largo"><?= esc($proveedor['proveedor']) ?></span>
                </div>
                <div class="destinatario-linea">
                    <strong>DIRECCIÓN:</strong>
                    <span class="campo-verde campo-largo"><?= esc($proveedor['domicilio']) ?></span>
                </div>
                <div class="destinatario-linea">
                    <strong>R.F.C.:</strong>
                    <span class="campo-verde campo-corto"><?= esc($proveedor['rfc']) ?></span>
                </div>
                <div class="destinatario-linea" style="margin-bottom: 18px;">
                    <strong>CORREO ELECTRÓNICO:</strong>
                    <span class="campo-verde campo-mediano"><?= esc($proveedor['correo']) ?></span>
                </div>

                <div class="saludo-formal">
                    <strong>P R E S E N T E</strong>
                </div>

                <div class="texto-cuerpo">
                    Por medio del presente me permito hacerle la cordial invitación al procedimiento de <strong>Invitación Restringida Nacional Presencial</strong>
                    <span class="campo-verde campo-mediano"><?= esc($datosEstudio['no_licitacion']) ?></span>, para la
                    <span class="campo-verde campo-largo"><?= esc($datosEstudio['nombre_estudio']) ?></span>, se informa que, las Bases que contienen todos los elementos estarán disponibles para su venta los días
                    <span class="campo-verde campo-largo">30 de enero, 03 y 04 de febrero de 2025</span>, en las instalaciones de la Dirección de Administración y Desarrollo de Personal, ubicada en el Ex Seminario en avenida de la Paz Esq. Miguel Hidalgo, Col. Centro, Temascalcingo, México, C.P. 50400, en un horario de 09:00 am a 16:00 pm.
                </div>

                <div class="texto-cuerpo">
                    Por lo anterior, hago de su conocimiento que las mismas tendrán un costo de recuperación por la cantidad de
                    <span class="campo-verde campo-mediano">$<?= esc($totalFormateado) ?> (<?= esc($totalTexto) ?>)</span>, pago que se realizará en la Tesorería Municipal y posteriormente deberá presentar el comprobante de pago en la Dirección de Administración y Desarrollo de Personal para la entrega de las Bases correspondientes.
                </div>

                <div class="texto-cuerpo">
                    No omito manifestarle, que los actos serán en punto de las fechas y horas señaladas en las Bases, en caso de no asistir se procederá a la invitación de otras empresas, favor de asistir con memoria USB mínimo de 16 GB.
                </div>

                <div class="texto-cuerpo">
                    Esperando contar con su apreciable participación, aprovecho la oportunidad para enviarle un cordial saludo.
                </div>

                <div class="atentamente">
                    A T E N T A M E N T E
                </div>
                <div class="frase-valores">
                    "SERVIR CON VALORES"
                </div>

                <div class="firma-area">
                    <div class="firma-linea">
                        C. MIRIAM VIANEY OVANDO RUBIO
                    </div>
                    <div class="cargo-firma">
                        DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
                    </div>
                </div>

                <div class="copia-archivo">
                    <strong>C.c.p. Archivo</strong>
                </div>
                <div class="iniciales">
                    <strong>P.S.H.C.</strong>
                </div>

                <div class="numero-pagina">
                    <?= $contador++ ?> de <?= $totalProveedores ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>