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
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
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
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
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

        .linea-firma {
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

<!-- =========================================================
     HOJA 1
========================================================= -->
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
            IRNP-<span class="campo campo-chico"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>
            <br>
            PARA LA "<span class="campo campo-largo"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>"
        </div>

        <div class="texto">
            EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO A LAS
            <span class="campo campo-corto">
                <?php 
                if (isset($data[0]['created_at'])) {
                    $fecha = new DateTime($data[0]['created_at']);
                    echo $fecha->format('H:i');
                }
                ?>
            </span>
            HORAS DEL DÍA
            <span class="campo campo-chico">
                <?php 
                if (isset($data[0]['created_at'])) {
                    $fecha = new DateTime($data[0]['created_at']);
                    echo $fecha->format('d/m/Y');
                }
                ?>
            </span>,
            EN EL ÁREA DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL,
            SITO EN AV. DE LA PAZ ESQ. MIGUEL HIDALGO, COL. CENTRO, TEMASCALCINGO, MÉXICO, C.P. 50400,
        </div>

        <div class="texto">
            EL <span class="campo campo-mediano"><?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?></span>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $index => $item): ?>
                    <?php if ($index > 0): ?>
                        <?php if ($index === count($data) - 1): ?>
                            Y EL
                        <?php else: ?>
                            , EL
                        <?php endif; ?>
                    <?php endif; ?>
                    <span class="campo campo-mediano"><?= isset($item['representante_legal']) ? esc($item['representante_legal']) : '' ?></span>
                    APODERADO LEGAL DE <span class="campo campo-mediano"><?= isset($item['empresa']) ? esc($item['empresa']) : '' ?></span>
                    , EN SU CARÁCTER DE <span class="campo campo-mediano"><?= isset($item['tipo_persona']) ? esc($item['tipo_persona']) : '' ?></span>
                    , MISMO QUE SE IDENTIFICÓ CON CREDENCIAL PARA VOTAR CON NÚMERO DE FOLIO <span class="campo campo-mediano"><?= isset($item['num_credencial_representante']) ? esc($item['num_credencial_representante']) : '' ?></span>
                    EMITIDA POR EL INSTITUTO NACIONAL ELECTORAL
                <?php endforeach; ?>
            <?php endif; ?>
            ; Y CON FUNDAMENTO EN LO DISPUESTO POR LOS ARTÍCULOS 27, FRACCIÓN I, 35 FRACCIÓN I, 36, 43, 44 FRACCIÓN II, 45 Y 46 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, 82, 83, 84, 85 Y 86 DE SU RESPECTIVO REGLAMENTO; SE LLEVA A CABO EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS DEL PROCEDIMIENTO DE INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL IRNP-<?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?>, PARA LA "<?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?>"
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
            <strong>I.</strong> <strong>EN DESAHOGO DEL PRIMER PUNTO DEL ORDEN DEL DÍA.</strong> – EL <span class="campo campo-mediano"><?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?></span> SERVIDOR PÚBLICO DESIGNADO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL EN SU CARÁCTER DE CONVOCANTE EMITIÓ LA DECLARATORIA DE INICIO DEL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS DEL PRESENTE PROCEDIMIENTO ADQUISITIVO.
        </div>

        <div class="texto">
            <strong>II.</strong> <strong>EN DESAHOGO DEL SEGUNDO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO REALIZÓ EL PASE DE LISTA DE LOS ASISTENTES, DANDO CUENTA QUE SE ENCONTRÓ PRESENTE LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL Y SE REGISTRARON PUNTUALMENTE EN LA LISTA DE ASISTENCIA LOS LICITANTES QUE SE CITAN A CONTINUACIÓN:
        </div>

        <table>
            <thead>
                <tr>
                    <th>LICITANTE</th>
                    <th>REPRESENTANTE</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $item): ?>
                    <tr>
                        <td><?= isset($item['empresa']) ? esc($item['empresa']) : '' ?></td>
                        <td><?= isset($item['representante_legal']) ? esc($item['representante_legal']) : '' ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="numero-pagina">1 DE 3</div>
    </div>
</div>

<!-- =========================================================
     HOJA 2
========================================================= -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto">
            <strong>III.</strong> <strong>EN DESAHOGO DEL TERCER PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, HIZO MENCIÓN QUE AL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS SE PRESENTARON <span class="campo campo-corto"><?= count($data) ?></span> DE <span class="campo campo-corto"><?= count($data) ?></span> LICITANTES INVITADOS, POR LO QUE NO SE CUMPLIÓ CON EL NÚMERO DE LICITANTES QUE EXIGE LA LEY PARA LLEVAR A CABO EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS, DE IGUAL MANERA SE LLEVÓ A CABO EL ACTO ANTES MENCIONADO CON FUNDAMENTO EN EL ARTÍCULO 36 FRACCIÓN II DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, QUE A LA LETRA DICE:
        </div>

        <div class="texto" style="margin-left: 15px; font-style: italic; border-left: 2px solid #000; padding-left: 10px;">
            <strong>ARTÍCULO 36.-</strong> EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS SE CELEBRARÁ DE MANERA PÚBLICA Y EN PRESENCIA DE TODOS LOS OFERENTES, EN LA FORMA SIGUIENTE:
            <br>
            I...
            <br>
            <strong><u>II. LA APERTURA DE PROPUESTAS PODRÁ EFECTUARSE CUANDO SE HAYA PRESENTADO UNA PROPUESTA CUANDO MENOS.</u></strong>
            <br>
            III, IV, V, VI, VII Y VIII.
        </div>

        <div class="texto">
            <strong>IV.</strong> <strong>EN DESAHOGO DEL CUARTO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, SOLICITÓ A LOS LICITANTES HICIERAN LA PRESENTACIÓN DE LOS SOBRES QUE CONTENÍAN SUS <strong>PROPUESTAS TÉCNICAS Y ECONÓMICAS</strong>, POR LO QUE SOLICITÓ A LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, VERIFICARÁ QUE LOS SOBRES DE LAS PROPUESTAS TÉCNICAS Y ECONÓMICAS DE LOS LICITANTES SE ENCONTRARÁN DEBIDAMENTE SELLADOS Y FIRMADOS POR LO QUE, LA <strong>C. SINDY NAYÁN ALBARRÁN FERMÍN,</strong> SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL VERIFICÓ QUE ESTOS CUMPLIERAN CON LOS REQUISITOS ESTABLECIDOS.
        </div>

        <div class="texto">
            <strong>V.</strong> <strong>EN DESAHOGO DEL QUINTO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, EN CONJUNTO CON LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A REALIZAR LA APERTURA DE LOS SOBRES QUE CONTENÍAN LAS PROPUESTAS TÉCNICAS.
        </div>

        <div class="texto">
            <strong>VI.</strong> <strong>EN DESAHOGO DEL SEXTO PUNTO DEL ORDEN DEL DÍA.</strong> - EL SERVIDOR PÚBLICO DESIGNADO EN CONJUNTO CON LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A VERIFICAR EN FORMA CUANTITATIVA, QUE LAS PROPUESTAS TÉCNICAS PRESENTADAS CONTARAN CON LA DOCUMENTACIÓN SOLICITADA. IGUALMENTE, PRECISÓ EL OBJETIVO DEL <strong>ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS</strong>, DESTACANDO QUE, DE CONFORMIDAD CON LO DISPUESTO EN LOS ARTÍCULOS 35 FRACCIÓN I, 36 FRACCIONES III Y V, Y 37 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS; 70 FRACCIONES XVIII Y XX, 87 FRACCIONES I Y IV Y 88 DE SU RESPECTIVO REGLAMENTO; ENTRE LAS CAUSAS POSIBLES DE DESECHAMIENTO DE LAS PROPUESTAS QUE SE PUDIERAN ENCONTRAR, SERÍA EL INCUMPLIMIENTO CUANTITATIVO DE CUALQUIERA DE LOS REQUISITOS O CONDICIONES QUE AFECTE DIRECTAMENTE LA SOLVENCIA DE DICHAS PROPUESTAS, POR LO QUE SE REALIZÓ LA VERIFICACIÓN DE LA DOCUMENTACIÓN DE LOS LICITANTES PARTICIPANTES DEJANDO CONSTANCIA EN EL LISTADO ANEXO AL PRESENTE.
        </div>

        <div class="texto">
            <strong>VII.</strong> <strong>EN DESAHOGO DEL SÉPTIMO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, ANUNCIÓ QUE SE ACEPTARON PARA SU <strong>ANÁLISIS Y EVALUACIÓN</strong> DE LOS INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS, ASÍ COMO DEL ÁREA USUARIA, LA PROPUESTA TÉCNICA Y DOCUMENTACIÓN COMPLEMENTARIA DE LOS LICITANTES QUE PRESENTARON SU PROPUESTA, MISMOS QUE SE CITAN A CONTINUACIÓN:
        </div>

        <table class="tabla-sin-bordes">
            <thead>
                <tr>
                    <th>EMPRESA</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $item): ?>
                    <tr>
                        <td><?= isset($item['empresa']) ? esc($item['empresa']) : '' ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="texto">
            <strong>VIII.</strong><strong> EN DESAHOGO DEL OCTAVO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, EN CONJUNTO CON LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A REALIZAR LA APERTURA DE LOS SOBRES QUE CONTENÍAN LAS PROPUESTAS ECONÓMICAS.
        </div>

        <div class="numero-pagina">2 DE 3</div>
    </div>
</div>

<!-- =========================================================
     HOJA 3
========================================================= -->
<div class="hoja">
    <div class="contenido-hoja">
        <div class="texto">
            <strong>IX.</strong> <strong>EN DESAHOGO DEL NOVENO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO EN CONJUNTO CON LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A VERIFICAR, EN FORMA CUANTITATIVA, QUE LAS PROPUESTAS ECONÓMICAS PRESENTADAS CONTARAN CON LA DOCUMENTACIÓN SOLICITADA, POR LO QUE SE REALIZÓ LA VERIFICACIÓN DE LA DOCUMENTACIÓN DE LOS LICITANTES PARTICIPANTES DEJANDO EVIDENCIA EN EL LISTADO ANEXO AL PRESENTE.
        </div>

        <div class="texto">
            <strong>X.</strong> <strong>EN DESAHOGO DEL DÉCIMO PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, ANUNCIÓ QUE SE ACEPTARON PARA SU <strong>ANÁLISIS Y EVALUACIÓN</strong> DE LOS INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS, ASÍ COMO DEL ÁREA USUARIA, LAS PROPUESTAS ECONÓMICAS DE LOS LICITANTES QUE PRESENTARON SU PROPUESTA, EN VIRTUD DE QUE CUMPLIERON CUANTITATIVAMENTE, CON LOS REQUISITOS ESTABLECIDOS, MISMOS QUE SE CITAN A CONTINUACIÓN:
        </div>

        <table class="tabla-sin-bordes">
            <thead>
                <tr>
                    <th>EMPRESA</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $item): ?>
                    <tr>
                        <td><?= isset($item['empresa']) ? esc($item['empresa']) : '' ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="texto">
            <strong>XI.</strong> <strong>EN DESAHOGO DEL DÉCIMO PRIMER PUNTO DEL ORDEN DEL DÍA.</strong> – EL SERVIDOR PÚBLICO DESIGNADO, INFORMÓ A LOS ASISTENTES QUE EL FALLO DE ADJUDICACIÓN DEL PROCEDIMIENTO ADQUISITIVO, SE DARÍA A CONOCER EL DÍA <span class="campo campo-mediano"><?= isset($data[0]['fecha_fallo']) ? esc($data[0]['fecha_fallo']) : '17 DE DICIEMBRE' ?></span> DEL PRESENTE AÑO A LAS <span class="campo campo-corto"><?= isset($data[0]['hora_fallo']) ? esc($data[0]['hora_fallo']) : '13:00' ?></span> HORAS EN LA OFICINA QUE OCUPA LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.
        </div>

        <div class="texto">
            <strong>XII.</strong> <strong>EN DESAHOGO DEL DÉCIMO SEGUNDO PUNTO DEL ORDEN DEL DÍA.</strong> – ASUNTOS GENERALES, EL SERVIDOR PÚBLICO DESIGNADO, SOLICITÓ A LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL, ASÍ COMO A LOS LICITANTES INFORMAR SI TENÍAN ALGÚN COMENTARIO ADICIONAL AL RESPECTO SOBRE EL DESARROLLO DEL PRESENTE ACTO.
        </div>
        <div class="texto">
            POR LO QUE NINGÚN ASISTENTE TUVO COMENTARIO ALGUNO Y FINALMENTE, SIN MEDIAR ALGÚN VICIO DE VOLUNTAD, EL SERVIDOR PÚBLICO DESIGNADO, LA SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL Y EL LICITANTE, EXPRESARON SU CONSENTIMIENTO RESPECTO A LOS ASPECTOS DESAHOGADOS EN EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS Y DIÓ POR TERMINADO EL ACTO EN MENCIÓN, A LAS
            <span class="campo campo-mediano">
                <?php 
                if (isset($data[0]['created_at'])) {
                    $fecha = new DateTime($data[0]['created_at']);
                    $meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
                    $horas = $fecha->format('H');
                    $minutos = $fecha->format('i');
                    
                    function numeroATextoWord($n) {
                        $unidades = ['', 'UNO', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
                        $especiales = [
                            10 => 'DIEZ', 11 => 'ONCE', 12 => 'DOCE', 13 => 'TRECE', 14 => 'CATORCE', 
                            15 => 'QUINCE', 16 => 'DIECISÉIS', 17 => 'DIECISIETE', 18 => 'DIECIOCHO', 19 => 'DIECINUEVE',
                            20 => 'VEINTE', 30 => 'TREINTA', 40 => 'CUARENTA', 50 => 'CINCUENTA'
                        ];
                        if (isset($especiales[$n])) return $especiales[$n];
                        if ($n < 10) return $unidades[$n];
                        $decena = floor($n / 10) * 10;
                        $unidad = $n % 10;
                        $decenas = ['', '', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA'];
                        if ($unidad === 0) return $decenas[$decena/10];
                        return $decenas[$decena/10] . ' Y ' . $unidades[$unidad];
                    }
                    
                    echo numeroATextoWord((int)$horas) . ' HORAS CON ' . numeroATextoWord((int)$minutos) . ' MINUTOS DEL DÍA ' . $fecha->format('d') . ' DE ' . $meses[$fecha->format('n')-1] . ' DE ' . $fecha->format('Y');
                }
                ?>
            </span>
            , FIRMADO AL MARGEN Y AL CALCE LOS SERVIDORES PÚBLICOS Y EL LICITANTE QUE EN ELLA INTERVINIERON, PARA SU DEBIDA CONSTANCIA LEGAL.
        </div>

        <div class="centrado" style="margin-top:12px; font-weight:bold; font-size:8pt;">
            POR "EL MUNICIPIO"
        </div>

        <div class="firma-contenedor">
            <div class="firma">
                <div class="linea-firma">
                    <?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?>
                </div>
                <div>
                    <?php 
                    $area = isset($data[0]['area']) ? esc($data[0]['area']) : 'COORDINADOR DE ADQUISICIONES Y SERVICIOS Y SERVIDOR PÚBLICO DESIGNADO';
                    $idArea = isset($data[0]['id_area']) ? esc($data[0]['id_area']) : (isset($data[0]['id']) ? esc($data[0]['id']) : '');
                    echo $idArea ? $area . ' (ID: ' . $idArea . ')' : $area;
                    ?>
                </div>
            </div>
            <div class="firma" style="float:right;">
                <div class="linea-firma">
                    C. SINDY NAYÁN ALBARRÁN FERMÍN
                </div>
                <div>
                    SUPLENTE DE LA CONTRALORÍA INTERNA MUNICIPAL
                </div>
            </div>
        </div>

        <div style="clear:both;"></div>

        <div class="centrado" style="margin-top:25px; font-weight:bold; font-size:8pt;">
            POR "EL LICITANTE"
        </div>

        <table>
            <thead>
                <tr>
                    <th>LICITANTE</th>
                    <th>REPRESENTANTE</th>
                    <th>FIRMA</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $item): ?>
                    <tr>
                        <td><?= isset($item['empresa']) ? esc($item['empresa']) : '' ?></td>
                        <td><?= isset($item['representante_legal']) ? esc($item['representante_legal']) : '' ?></td>
                        <td style="height:60px;">&nbsp;</td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
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