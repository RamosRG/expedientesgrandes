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
            margin: 20mm 18mm 18mm 18mm;
        }

        body {
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 9pt;
            line-height: 1.6;
            color: #000000;
            background: white;
            margin: 0;
            padding: 0;
        }

        .hoja {
            width: 21cm;
            min-height: 29.7cm;
            padding: 20mm 18mm 18mm 18mm;
            margin: 0 auto;
            background: white;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 9pt;
            line-height: 1.6;
            text-align: justify;
            text-transform: uppercase;
        }

        .encabezado {
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid #000000;
            padding-bottom: 10px;
            margin-bottom: 18px;
        }

        .titulo {
            text-align: center;
            font-weight: bold;
            font-size: 13pt;
            margin-bottom: 5px;
        }

        .subtitulo {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .texto {
            margin-bottom: 12px;
        }

        .centrado {
            text-align: center;
        }

        .campo {
            display: inline-block;
            border-bottom: 1px solid #000;
            min-width: 100px;
            padding: 1px 4px;
            font-weight: bold;
        }

        .campo-corto {
            min-width: 70px;
        }

        .campo-mediano {
            min-width: 180px;
        }

        .campo-largo {
            min-width: 300px;
        }

        .campo-chico {
            min-width: 120px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 18px;
            font-size: 9pt;
        }

        table th,
        table td {
            border: 1px solid #000000;
            padding: 8px;
            vertical-align: top;
        }

        table th {
            text-align: center;
            font-weight: bold;
        }

        .orden-dia {
            margin-top: 15px;
            margin-bottom: 18px;
            padding-left: 15px;
        }

        .orden-dia div {
            margin-bottom: 4px;
        }

        .firma-contenedor {
            width: 100%;
            margin-top: 50px;
        }

        .firma {
            width: 45%;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }

        .linea-firma {
            border-top: 1px solid #000;
            margin-top: 60px;
            padding-top: 8px;
            font-weight: bold;
        }

        .pie {
            margin-top: 20px;
            text-align: center;
            font-size: 8pt;
        }

        .numero-pagina {
            text-align: right;
            margin-top: 30px;
            font-size: 8pt;
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
                padding: 20mm 18mm 18mm 18mm !important;
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
                “2025. BICENTENARIO DE LA VIDA MUNICIPAL EN EL ESTADO DE MÉXICO”
            </div>

            <div class="titulo">
                ACTA DE PRESENTACIÓN Y APERTURA DE PROPUESTAS
            </div>

            <div class="subtitulo">
                DE LA LICITACIÓN PÚBLICA NACIONAL PRESENCIAL
                <br>
                LPNP-<span class="campo campo-chico"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span>
                <br>
                PARA LA “
                <span class="campo campo-largo"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>
                ”
            </div>

            <div class="texto">
                EN EL MUNICIPIO DE TEMASCALCINGO, MÉXICO SIENDO LAS
                <span class="campo campo-corto">
                    <?php 
                    if (isset($data[0]['created_at'])) {
                        $fecha = new DateTime($data[0]['created_at']);
                        echo $fecha->format('H:i');
                    }
                    ?>
                </span>
                HORAS DEL DÍA DEL
                <span class="campo campo-chico">
                    <?php 
                    if (isset($data[0]['created_at'])) {
                        $fecha = new DateTime($data[0]['created_at']);
                        echo $fecha->format('d/m/Y');
                    }
                    ?>
                </span>,
                EN EL ÁREA DE LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL,
                SITO EN
                <span class="campo campo-largo"><?= isset($data[0]['domicilio_proveedor']) ? esc($data[0]['domicilio_proveedor']) : '' ?></span>,
            </div>

            <div class="texto">
                LOS C.C.
                <span class="campo campo-mediano"><?= isset($data[0]['coordinador']) ? esc($data[0]['coordinador']) : '' ?></span>,
                COORDINADOR DE <span class="campo campo-mediano"><?= isset($data[0]['area']) ? esc($data[0]['area']) : '' ?></span> Y SERVIDOR PÚBLICO DESIGNADO POR LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL;
                C. ELIZABETH MEJÍA PACHECO,
                CONTRALORA INTERNA MUNICIPAL;
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $index => $proveedor): ?>
                        <?php if ($index > 0): ?>
                            <?php if ($index === count($data) - 1): ?>
                                Y 
                            <?php else: ?>
                                , 
                            <?php endif; ?>
                        <?php endif; ?>
                        <span class="campo campo-largo"><?= isset($proveedor['representante_legal']) ? esc($proveedor['representante_legal']) : (isset($proveedor['nombre_proveedor']) ? esc($proveedor['nombre_proveedor']) : '') ?></span>
                        <?php if (isset($proveedor['razon_social']) && !empty($proveedor['razon_social'])): ?>
                            REPRESENTANDO A LA EMPRESA <?= esc($proveedor['razon_social']) ?>
                        <?php endif; ?>
                        <?php if (isset($proveedor['num_credencial_representante']) && !empty($proveedor['num_credencial_representante'])): ?>
                            , QUIEN SE IDENTIFICA CON CREDENCIAL PARA VOTAR NÚMERO <?= esc($proveedor['num_credencial_representante']) ?>, EMITIDA POR EL INSTITUTO NACIONAL ELECTORAL
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                . Y CON FUNDAMENTO EN LO DISPUESTO POR LOS ARTÍCULOS 27, FRACCIÓN I, 35 FRACCIÓN I, 36, 43, 44 FRACCIÓN II, 45 Y 46 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE MÉXICO Y MUNICIPIOS, 82, 83, 84, 85 Y 86 DE SU RESPECTIVO REGLAMENTO; ASÍ COMO EN LO ESTABLECIDO EN EL PUNTO 3.1 DE LAS BASES CORRESPONDIENTES, SE LLEVA A CABO EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS DEL PROCEDIMIENTO DE INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL NÚMERO IR-<span class="campo campo-chico"><?= isset($data[0]['no_licitacion']) ? esc($data[0]['no_licitacion']) : '' ?></span> PARA LA “<span class="campo campo-chico"><?= isset($data[0]['nombre_estudio']) ? esc($data[0]['nombre_estudio']) : '' ?></span>”.
            </div>

            <div class="centrado" style="font-weight:bold; margin-top:15px;">
                ORDEN DEL DÍA
            </div>
            <div class="orden-dia">
                <div>I. DECLARATORIA DE INICIO DEL ACTO;</div>
                <div>II. LECTURA AL REGISTRO DE ASISTENCIA AL ACTO DE LOS PARTICIPANTES;</div>
                <div>III. DECLARATORIA DE ASISTENCIA DEL NÚMERO DE LICITANTES;</div>
                <div>IV. PRESENTACIÓN DE PROPUESTAS TÉCNICAS Y ECONÓMICAS;</div>
                <div>V. APERTURA DE PROPUESTAS TÉCNICAS;</div>
                <div>VI. REVISIÓN CUANTITATIVA DE PROPUESTAS TÉCNICAS;</div>
                <div>VII. DECLARATORIA DE ACEPTACIÓN O DESECHAMIENTO;</div>
                <div>VIII. APERTURA DE PROPUESTAS ECONÓMICAS;</div>
                <div>IX. REVISIÓN CUANTITATIVA DE LAS PROPUESTAS ECONÓMICAS;</div>
                <div>X. DECLARATORIA DE ACEPTACIÓN O DESECHAMIENTO;</div>
                <div>XI. LUGAR, FECHA Y HORA PARA LA COMUNICACIÓN DEL FALLO;</div>
                <div>XII. ASUNTOS GENERALES.</div>
            </div>

            <div class="texto">
                <strong>I.</strong>
                EN DESAHOGO DEL PRIMER PUNTO DEL ORDEN DEL DÍA. –
                EL SERVIDOR PÚBLICO DESIGNADO EMITIÓ LA DECLARATORIA
                DE INICIO DEL ACTO.
            </div>

            <div class="texto">
                <strong>II.</strong>
                EN DESAHOGO DEL SEGUNDO PUNTO DEL ORDEN DEL DÍA. –
                SE REGISTRARON PUNTUALMENTE EN LA LISTA DE ASISTENCIA
                LOS LICITANTES QUE SE CITAN A CONTINUACIÓN:
            </div>

            <!-- TABLA PARTICIPANTES -->
            <table>
                <thead>
                    <tr>
                        <th>EMPRESA</th>
                        <th>REPRESENTANTE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $empresasProcesadas = [];
                    if (!empty($data)):
                        foreach ($data as $proveedor):
                            $empresa = isset($proveedor['razon_social']) ? $proveedor['razon_social'] : (isset($proveedor['nombre_proveedor']) ? $proveedor['nombre_proveedor'] : '');
                            if (in_array($empresa, $empresasProcesadas)) continue;
                            $empresasProcesadas[] = $empresa;
                    ?>
                        <tr>
                            <td><?= esc($empresa) ?></td>
                            <td><?= isset($proveedor['representante_legal']) ? esc($proveedor['representante_legal']) : (isset($proveedor['nombre_proveedor']) ? esc($proveedor['nombre_proveedor']) : '') ?></td>
                        </tr>
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </tbody>
            </table>

            <div class="numero-pagina">
                1 DE 3
            </div>
        </div>
    </div>

    <!-- =========================================================
         HOJA 2
    ========================================================= -->
    <div class="hoja">
        <div class="contenido-hoja">
            <div class="texto">
                <strong>III.</strong>
                EN DESAHOGO DEL TERCER PUNTO DEL ORDEN DEL DÍA. –
                EL SERVIDOR PÚBLICO DESIGNADO, SOLICITÓ A LA REPRESENTANTE
                DE LA CONTRALORÍA INTERNA MUNICIPAL VERIFICARA QUE SE CONTÓ
                CON EL NÚMERO DE LICITANTES QUE EXIGE LA LEY PARA LA CELEBRACIÓN
                DEL ACTO, POR LO QUE LA <strong>C. ELIZABETH MEJÍA PACHECO</strong>,
                CONTRALORA INTERNA MUNICIPAL, MANIFIESTA QUE SE EXISTE CON EL
                NÚMERO DE LICITANTES PARA LLEVAR A CABO EL PRESENTE ACTO.
            </div>

            <div class="texto">
                A CONTINUACIÓN, EL SERVIDOR PÚBLICO DESIGNADO, PRECISÓ EL
                OBJETIVO DEL ACTO, DESTACANDO QUE, DE CONFORMIDAD CON LO
                DISPUESTO EN LOS ARTÍCULOS 35 FRACCIÓN I, 36 FRACCIONES III
                Y V, Y 37 DE LA LEY DE CONTRATACIÓN PÚBLICA DEL ESTADO DE
                MÉXICO Y MUNICIPIOS; 70 FRACCIONES XVIII Y XX, 87 FRACCIONES
                I Y IV Y 88 DE SU RESPECTIVO REGLAMENTO; ENTRE LAS CAUSAS
                POSIBLES DE DESECHAMIENTO DE LAS PROPUESTAS QUE SE PUDIERAN
                ENCONTRAR, SERÍA EL INCUMPLIMIENTO CUANTITATIVO DE CUALQUIERA
                DE LOS REQUISITOS O CONDICIONES ESTABLECIDOS EN LAS BASES
                EMITIDAS, QUE AFECTE DIRECTAMENTE LA SOLVENCIA DE DICHAS PROPUESTAS.
            </div>

            <div class="texto">
                <strong>IV.</strong>
                EN DESAHOGO DEL CUARTO PUNTO DEL ORDEN DEL DÍA. –
                EL SERVIDOR PÚBLICO DESIGNADO, SOLICITÓ A LOS LICITANTES
                HACER LA PRESENTACIÓN DE LOS SOBRES QUE CONTIENEN SU
                <strong>PROPUESTA TÉCNICA Y ECONÓMICA</strong>, POR LO QUE
                SOLICITÓ A LA REPRESENTANTE DE LA CONTRALORÍA INTERNA MUNICIPAL,
                VERIFICARA QUE LOS SOBRES DE LAS PROPUESTAS TÉCNICAS Y ECONÓMICAS
                DE LOS LICITANTES SE ENCONTRARAN DEBIDAMENTE SELLADAS Y FIRMADAS
                POR LOS LICITANTES QUE SE PRESENTARON A ESTE ACTO. LA <strong>C. ELIZABETH MEJIA
                PACHECO</strong>
                CONTRALORA INTERNA MUNICIPAL VERIFICÓ QUE LOS SOBRES QUE CONTIENEN
                LAS PROPUESTAS SE ENCONTRABÁN DEBIDAMENTE SELLADOS Y FIRMADOS
                POR LOS LICITANTES.
            </div>

            <div class="texto">
                <strong>V.</strong>
                EN DESAHOGO DEL QUINTO PUNTO DEL ORDEN DEL DÍA. –
                EL SERVIDOR PÚBLICO DESIGNADO, NOMBRÓ A LAS EMPRESAS PARTICIPANTES,
                A EFECTO DE QUE SUS REPRESENTANTES ACREDITADOS EN EL PRESENTE ACTO,
                PRESENCIARÁN LA APERTURA DEL SOBRE QUE CONTIENE SU PROPUESTA TÉCNICA.
            </div>

            <!-- TABLA TECNICAS -->
            <table>
                <thead>
                    <tr>
                        <th>EMPRESAS CON PROPUESTA TÉCNICA PRESENTADA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $empresasProcesadas = [];
                    if (!empty($data)):
                        foreach ($data as $proveedor):
                            $empresa = isset($proveedor['razon_social']) ? $proveedor['razon_social'] : (isset($proveedor['nombre_proveedor']) ? $proveedor['nombre_proveedor'] : '');
                            if (in_array($empresa, $empresasProcesadas)) continue;
                            $empresasProcesadas[] = $empresa;
                    ?>
                        <tr>
                            <td><?= esc($empresa) ?></td>
                        </tr>
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </tbody>
            </table>

            <div class="texto">
                <strong>VI.</strong>
                EN DESAHOGO DEL SEXTO PUNTO DEL ORDEN DEL DÍA. –
                EL SERVIDOR PÚBLICO DESIGNADO EN CONJUNTO CON LA REPRESENTANTE
                DE LA CONTRALORÍA INTERNA MUNICIPAL, PROCEDIERON A VERIFICAR,
                EN FORMA CUANTITATIVA, QUE LAS PROPUESTAS TÉCNICAS PRESENTADAS
                CONTARAN CON LA DOCUMENTACIÓN SOLICITADA, POR LO QUE SE REALIZÓ
                LA VERIFICACIÓN DE LA DOCUMENTACIÓN DE CADA LICITANTE PARTICIPANTE
                DEJANDO EVIDENCIA EN EL LISTADO ANEXO AL PRESENTE.
            </div>

            <div class="texto">
                <strong>VII.</strong>
                EN DESAHOGO DEL SÉPTIMO PUNTO DEL ORDEN DEL DÍA. –
                EL SERVIDOR PÚBLICO DESIGNADO, ANUNCIÓ QUE SE ACEPTARON
                PARA SU POSTERIOR <strong>ANÁLISIS Y EVALUACIÓN</strong>
                DE LOS INTEGRANTES DEL COMITÉ DE ADQUISICIONES Y SERVICIOS,
                LAS PROPUESTAS TÉCNICAS DE LOS LICITANTES, QUE SE CITAN A CONTINUACIÓN:
            </div>

            <table>
                <thead>
                    <tr>
                        <th>EMPRESA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $empresasProcesadas = [];
                    if (!empty($data)):
                        foreach ($data as $proveedor):
                            $empresa = isset($proveedor['razon_social']) ? $proveedor['razon_social'] : (isset($proveedor['nombre_proveedor']) ? $proveedor['nombre_proveedor'] : '');
                            if (in_array($empresa, $empresasProcesadas)) continue;
                            $empresasProcesadas[] = $empresa;
                    ?>
                        <tr>
                            <td><?= esc($empresa) ?></td>
                        </tr>
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </tbody>
            </table>

            <div class="texto">
                <strong>VIII.</strong>
                EN DESAHOGO DEL OCTAVO PUNTO DEL ORDEN DEL DÍA. –
                EL SERVIDOR PÚBLICO DESIGNADO, NOMBRÓ A LAS EMPRESAS
                CUYA PROPUESTA TÉCNICA FUERON ACEPTADAS EN VIRTUD DE
                QUE CUMPLEN CUANTITATIVAMENTE, A EFECTO DE QUE SU
                REPRESENTANTE PRESENCIARÁ LA APERTURA DEL SOBRE QUE
                CONTIENE LA OFERTA ECONÓMICA.
            </div>

            <table>
                <thead>
                    <tr>
                        <th>EMPRESA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $empresasProcesadas = [];
                    if (!empty($data)):
                        foreach ($data as $proveedor):
                            $empresa = isset($proveedor['razon_social']) ? $proveedor['razon_social'] : (isset($proveedor['nombre_proveedor']) ? $proveedor['nombre_proveedor'] : '');
                            if (in_array($empresa, $empresasProcesadas)) continue;
                            $empresasProcesadas[] = $empresa;
                    ?>
                        <tr>
                            <td><?= esc($empresa) ?></td>
                        </tr>
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </tbody>
            </table>

            <div class="numero-pagina">
                2 DE 3
            </div>
        </div>
    </div>

    <!-- =========================================================
         HOJA 3
    ========================================================= -->
    <div class="hoja">
        <div class="contenido-hoja">
            <div class="texto">
                <strong>IX.</strong>
                EN DESAHOGO DEL NOVENO PUNTO DEL ORDEN DEL DÍA. –
                EL SERVIDOR PÚBLICO DESIGNADO EN CONJUNTO CON LA
                REPRESENTANTE DE LA CONTRALORÍA INTERNA MUNICIPAL
                PROCEDIÓ A VERIFICAR, EN FORMA CUANTITATIVA, QUE LA
                PROPUESTA ECONÓMICA PRESENTADA CONTENGA LA DOCUMENTACIÓN
                REQUERIDA EN LAS BASES EMITIDAS, DE LO QUE RESULTÓ LO SIGUIENTE:
            </div>

            <table>
                <thead>
                    <tr>
                        <th>EMPRESA</th>
                        <th>RESULTADO DE VERIFICACIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $empresasProcesadas = [];
                    if (!empty($data)):
                        foreach ($data as $proveedor):
                            $empresa = isset($proveedor['razon_social']) ? $proveedor['razon_social'] : (isset($proveedor['nombre_proveedor']) ? $proveedor['nombre_proveedor'] : '');
                            if (in_array($empresa, $empresasProcesadas)) continue;
                            $empresasProcesadas[] = $empresa;
                    ?>
                        <tr>
                            <td><?= esc($empresa) ?></td>
                            <td>ACEPTADA</td>
                        </tr>
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </tbody>
            </table>

            <div class="texto">
                <strong>X.</strong>
                EN DESAHOGO DEL DÉCIMO PUNTO DEL ORDEN DEL DÍA. –
                EL SERVIDOR PÚBLICO DESIGNADO EN CONJUNTO CON LA
                REPRESENTANTE DE LA CONTRALORÍA INTERNA MUNICIPAL
                ANUNCIARON QUE SE ACEPTARON PARA SU POSTERIOR
                <strong>ANÁLISIS Y EVALUACIÓN</strong> LA PROPUESTA
                ECONÓMICA PRESENTADAS Y CITADAS EN EL PUNTO ANTERIOR;
                EN VIRTUD DE QUE CUMPLEN CUANTITATIVAMENTE CON LOS
                REQUISITOS SOLICITADOS EN LAS BASES RESPECTIVAS.
            </div>

            <div class="texto">
                <strong>XI.</strong>
                EN DESAHOGO DEL DÉCIMO PRIMER PUNTO DEL ORDEN DEL DÍA. –
                EL SERVIDOR PÚBLICO DESIGNADO, INFORMÓ A LOS ASISTENTES
                QUE EL FALLO DE ADJUDICACIÓN DEL PRESENTE PROCEDIMIENTO
                ADQUISITIVO, SE DARÁ A CONOCER EL DÍA
                <span class="campo campo-mediano">
                    <?php 
                    if (isset($data[0]['created_at'])) {
                        $fecha = new DateTime($data[0]['created_at']);
                        // Sumar 15 días para la fecha de fallo (ejemplo)
                        $fecha->modify('+15 days');
                        echo $fecha->format('d/m/Y');
                    }
                    ?>
                </span>
                A LAS
                <span class="campo campo-corto">
                    <?php 
                    if (isset($data[0]['created_at'])) {
                        $fecha = new DateTime($data[0]['created_at']);
                        echo $fecha->format('H:i');
                    }
                    ?>
                </span>
                HORAS EN LAS OFICINAS QUE OCUPA LA DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL.
            </div>

            <div class="texto">
                <strong>XII.</strong>
                EN DESAHOGO DEL DÉCIMO SEGUNDO PUNTO DEL ORDEN DEL DÍA. –
                ASUNTOS GENERALES, EL SERVIDOR PÚBLICO DESIGNADO, SOLICITÓ
                A LA REPRESENTANTE DE LA CONTRALORÍA INTERNA MUNICIPAL, ASÍ
                COMO A LOS LICITANTES INFORMEN SI TIENEN ALGÚN COMENTARIO
                ADICIONAL AL RESPECTO DEL DESARROLLO DEL PRESENTE ACTO.
                POR LO QUE NINGÚN LICITANTE TUVO COMENTARIO ALGUNO Y
                FINALMENTE, SIN MEDIAR ALGÚN VICIO DE VOLUNTAD, EL SERVIDOR
                PÚBLICO DESIGNADO, LA REPRESENTANTE DE LA CONTRALORÍA INTERNA
                MUNICIPAL Y LOS LICITANTES, EXPRESARON SU CONSENTIMIENTO
                RESPECTO DE LOS ASPECTOS DESAHOGADOS EN ESTE ACTO.
                NO HABIENDO OTRO ASUNTO QUE TRATAR, EL SERVIDOR PÚBLICO
                DESIGNADO PROCEDIÓ A DAR LECTURA EN VOZ ALTA AL CONTENIDO
                DE LA PRESENTE ACTA Y DIO POR TERMINADO EL
                <strong>ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS</strong>,
                A LAS
                <span class="campo campo-mediano">
                    <?php 
                    if (isset($data[0]['created_at'])) {
                        $fecha = new DateTime($data[0]['created_at']);
                        echo $fecha->format('H:i') . ' HORAS DEL DÍA ' . $fecha->format('d') . ' DE ' . strtoupper($fecha->format('F')) . ' DE ' . $fecha->format('Y');
                    }
                    ?>
                </span>,
                FIRMADO AL MARGEN Y AL CALCE LOS SERVIDORES PÚBLICOS Y LOS
                LICITANTES QUE EN ELLA INTERVINIERON, PARA SU DEBIDA CONSTANCIA LEGAL.
            </div>

            <!-- FIRMAS MUNICIPIO -->
            <div class="centrado" style="margin-top:25px; font-weight:bold;">
                POR EL MUNICIPIO
            </div>

            <div class="firma-contenedor">
                <div class="firma">
                    <div class="linea-firma">
                        C. PAULO SERGIO HERNÁNDEZ CUADRIELLO
                    </div>
                    COORDINADOR DE ADQUISICIONES Y SERVICIOS
                </div>

                <div class="firma" style="float:right;">
                    <div class="linea-firma">
                        C. ELIZABETH MEJÍA PACHECO
                    </div>
                    CONTRALORA INTERNA MUNICIPAL
                </div>
            </div>

            <div style="clear:both;"></div>

            <!-- TABLA FIRMAS -->
            <div class="centrado" style="margin-top:35px; font-weight:bold;">
                POR LOS LICITANTES
            </div>

            <table>
                <thead>
                    <tr>
                        <th>EMPRESA</th>
                        <th>REPRESENTANTE</th>
                        <th>FIRMA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $empresasProcesadas = [];
                    if (!empty($data)):
                        foreach ($data as $proveedor):
                            $empresa = isset($proveedor['razon_social']) ? $proveedor['razon_social'] : (isset($proveedor['nombre_proveedor']) ? $proveedor['nombre_proveedor'] : '');
                            if (in_array($empresa, $empresasProcesadas)) continue;
                            $empresasProcesadas[] = $empresa;
                    ?>
                        <tr>
                            <td><?= esc($empresa) ?></td>
                            <td><?= isset($proveedor['representante_legal']) ? esc($proveedor['representante_legal']) : (isset($proveedor['nombre_proveedor']) ? esc($proveedor['nombre_proveedor']) : '') ?></td>
                            <td style="height:60px;">&nbsp;</td>
                        </tr>
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </tbody>
            </table>

            <div class="pie">
                LA PRESENTE ACTA SE FIRMA EN ORIGINAL,
                EXPIDIÉNDOSE COPIA SIMPLE A QUIENES LA SUSCRIBIERON.
            </div>

            <div class="numero-pagina">
                3 DE 3
            </div>
        </div>
    </div>
</body>
</html>