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
            margin: 5cm 1.5cm 1.5cm 3cm;
        }

        body {
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
            font-size: 9pt;
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
            padding: 5cm 1.5cm 1.5cm 3cm;
            margin: 0 auto;
            background: white;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 9pt;
            line-height: 1.6;
            text-align: justify;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
        }

        .texto {
            margin-bottom: 12px;
        }

        .centrado {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 18px;
            font-size: 7.5pt;
            font-family: "Century Gothic", "Segoe UI", Arial, sans-serif;
        }

        table th,
        table td {
            border: 1px solid #000000;
            padding: 4px 3px;
            vertical-align: top;
        }

        table th {
            text-align: center;
            font-weight: bold;
            background: #f5f5f5;
        }

        .requisito-numero {
            width: 25px;
            text-align: center;
            font-weight: bold;
        }

        .requisito-descripcion {
            text-align: left;
        }

        .empresa-columna {
            width: 75px;
            text-align: center;
            background: #f0f0f0;
        }

        .check-cell {
            text-align: center;
            min-height: 20px;
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
                padding: 5cm 1.5cm 1.5cm 3cm !important;
            }
        }
    </style>
</head>
<body>

<div class="hoja">
    <div class="contenido-hoja">

        <table>
            <thead>
                <?php if (!empty($data)): ?>
                    <!-- FILA 1: Nombres de proveedores -->
                    <tr>
                        <th style="width:5%;">N.P.</th>
                        <th style="width:35%;">DOCUMENTACIÓN DE LA OFERTA TÉCNICA SOLICITADA</th>
                        <?php 
                        $empresasProcesadas = [];
                        foreach ($data as $proveedor):
                            $empresa = isset($proveedor['nombre_empresa']) ? $proveedor['nombre_empresa'] : 
                                      (isset($proveedor->nombre_empresa) ? $proveedor->nombre_empresa : '');
                            if (in_array($empresa, $empresasProcesadas)) continue;
                            $empresasProcesadas[] = $empresa;
                        ?>
                            <th class="empresa-columna" colspan="2"><?= esc($empresa) ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <!-- FILA 2: PRESENTÓ / NO PRESENTÓ -->
                    <tr style="background:#e8e8e8;">
                        <td colspan="2"></td>
                        <?php foreach ($empresasProcesadas as $empresa): ?>
                            <td class="centrado"><strong>PRESENTÓ</strong></td>
                            <td class="centrado"><strong>NO PRESENTÓ</strong></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>
            </thead>
            <tbody>
                <?php
                $requisitos = [
                    ["numero" => "1", "descripcion" => "PRESENTAR ESCRITO ELABORADO EN PAPEL MEMBRETADO DEL OFERENTE, EN EL CUAL INDIQUE EL NÚMERO TOTAL DE FOLIOS DE LOS QUE CONSTA SU PROPUESTA, DICHA CARTA NO DEBERÁ ESTAR FOLIADA, LA PROPUESTA TÉCNICA DEBERÁ ESTAR FIRMADA AUTÓGRAFAMENTE POR EL PROPIETARIO O REPRESENTANTE LEGAL DE LA EMPRESA, LA TOTALIDAD DE LA PROPUESTA TÉCNICA DEBERÁ ESTAR IMPRESA Y FOLIADA DE MANERA CONSECUTIVA POR UNA SOLA CARA."],
                    ["numero" => "2", "descripcion" => "PRESENTAR PROPUESTA TÉCNICA DE LAS PARTIDAS, REQUISITANDO TODOS LOS DATOS SOLICITADOS EN EL PUNTO DE \"PROPUESTA TÉCNICA\", LA CUAL DEBE CUMPLIR CON LA DESCRIPCIÓN Y ESPECIFICACIONES TÉCNICAS SOLICITADAS EN EL \"ANEXO 1\"."],
                    ["numero" => "3", "descripcion" => "COPIA SIMPLE, COMPLETA Y LEGIBLE DE LA IDENTIFICACIÓN VIGENTE (PASAPORTE VIGENTE, CREDENCIAL PARA VOTAR CON FOTOGRAFÍA VIGENTE O LICENCIA PARA CONDUCIR) DEL PROPIETARIO O REPRESENTANTE LEGAL DE LA EMPRESA; Y EN SU CASO, DE LA PERSONA QUE REPRESENTARÁ A LA EMPRESA EN EL ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS, LA CUAL DEBERÁ PRESENTAR EL \"ANEXO 3\" DEBIDAMENTE REQUISITADO."],
                    ["numero" => "4", "descripcion" => "COPIA SIMPLE, COMPLETA Y LEGIBLE DE LA CÉDULA DE IDENTIFICACIÓN FISCAL Y CONSTANCIA DE SITUACIÓN FISCAL; ASÍ COMO PRESENTAR ESCRITO BAJO PROTESTA DE DECIR VERDAD, DE ESTAR AL CORRIENTE EN LAS DECLARACIONES DE IMPUESTOS Y EN EL CUMPLIMIENTO DE SUS OBLIGACIONES FISCALES Y, ANEXAR LA OPINIÓN POSITIVA DEL SAT."],
                    ["numero" => "5", "descripcion" => "COPIA CERTIFICADA Y COPIA SIMPLE, COMPLETA Y LEGIBLE DE LOS ESTADOS FINANCIEROS BÁSICOS (ESTADO DE POSICIÓN FINANCIERA) AL MES DE DICIEMBRE DE 2024, CONFORME A LA NORMAS DE INFORMACIÓN FINANCIERA EMITIDAS POR EL CONSEJO MEXICANO PARA LA INVESTIGACIÓN Y DESARROLLO DE NORMAS DE INFORMACIÓN FINANCIERA, LOS CITADOS ESTADOS FINANCIEROS DEBERÁN ESTAR FIRMADOS POR CONTADOR PÚBLICO INTERNO O EXTERNO, POR LO QUE DEBERÁN ANEXAR ORIGINAL O COPIA CERTIFICADA Y COPIA SIMPLE COMPLETA Y LEGIBLE DE LA CÉDULA PROFESIONAL DEL CITADO CONTADOR."],
                    ["numero" => "6", "descripcion" => "COPIA SIMPLE, COMPLETA Y LEGIBLE DE LA DECLARACIÓN ANUAL DEL EJERCICIO 2024; ASÍ COMO LOS PAGOS PROVISIONALES CORRESPONDIENTES DEL MES DE JUNIO 2025, COMPLETAS CON ANEXOS Y COMPROBANTE QUE GENERA EL SISTEMA DEL SERVICIO DE ADMINISTRACIÓN TRIBUTARIA."],
                    ["numero" => "7", "descripcion" => "PARA PERSONAS JURÍDICAS COLECTIVAS, PRESENTAR ORIGINAL O COPIA CERTIFICADA Y COPIA SIMPLE, COMPLETA Y LEGIBLE DEL ACTA CONSTITUTIVA Y SU ÚLTIMA MODIFICACIÓN, ANEXAR DOCUMENTO QUE AVALE QUE SE ENCUENTRA INSCRITA EN EL REGISTRO PÚBLICO DE COMERCIO; PARA PERSONAS FÍSICAS, PRESENTAR ORIGINAL O COPIA CERTIFICADA Y COPIA SIMPLE, COMPLETA Y LEGIBLE DEL ACTA DE NACIMIENTO Y CURP."],
                    ["numero" => "8", "descripcion" => "ORIGINAL O COPIA CERTIFICADA Y COPIA SIMPLE, COMPLETA Y LEGIBLE DEL PODER NOTARIAL DEL REPRESENTANTE O APODERADO QUE FIRMA LA PROPUESTA, EN EL CUAL SE INDIQUE QUE TIENE PODER GENERAL PARA ACTOS DE ADMINISTRACIÓN Y/O PODER ESPECIAL PARA CONCURSOS, LICITACIONES Y FIRMA DE CONTRATOS; LOS PODERES NOTARIALES EXPEDIDOS DENTRO DEL TERRITORIO DEL ESTADO DE MÉXICO, ESTARÁN SUJETOS A LO DISPUESTO POR EL ARTÍCULO 7.768 DEL CÓDIGO CIVIL DEL ESTADO DE MÉXICO, QUE A LA LETRA DICE: \"EL MANDATO DEBE CONTENER EL PLAZO POR EL QUE SE CONFIERE, DE NO CONTENERLO SE PRESUME QUE HA SIDO OTORGADO POR TRES AÑOS.\" (EN CASO DE SER PERSONA FÍSICA, LA PRESENTACIÓN DE ESTE DOCUMENTO SERÁ OPCIONAL)\"."],
                    ["numero" => "9", "descripcion" => "ORIGINAL Y COPIA SIMPLE COMPLETA Y LEGIBLE DEL CERTIFICADO DE EMPRESA MEXIQUENSE VIGENTE, LA OMISIÓN DE ESTE CERTIFICADO NO INVALIDARÁ LA OFERTA. LA NO PRESENTACIÓN DE ESTE DOCUMENTO NO ES CAUSAL DE DESECHAMIENTO CUANTITATIVA O DESCALIFICACIÓN CUALITATIVA, DADO QUE ÚNICAMENTE SERÁ UTILIZADO PARA EL CRITERIO DE ADJUDICACIÓN CONFORME A LO ESTIPULADO EN EL ARTÍCULO 70, FRACCIÓN IX DEL REGLAMENTO, EL PORCENTAJE DE LAS PERSONAS FÍSICAS O JURÍDICAS COLECTIVAS QUE PRESENTEN DICHO DOCUMENTO SERÁ DE UN 5% (CINCO POR CIENTO), A FAVOR DE ELLAS."],
                    ["numero" => "10", "descripcion" => "PRESENTAR ESCRITO BAJO PROTESTA DE DECIR VERDAD, EN EL QUE MANIFIESTE NO ENCONTRARSE EN NINGUNO DE LOS SUPUESTOS DEL ARTÍCULO 74 DE LA LEY DE RESPONSABILIDADES ADMINISTRATIVAS DEL ESTADO DE MÉXICO Y MUNICIPIOS."],
                    ["numero" => "11", "descripcion" => "PRESENTAR ESCRITO BAJO PROTESTA DE DECIR VERDAD EN EL QUE MANIFIESTE QUE TIENE LA CAPACIDAD TÉCNICA, LABORAL Y FINANCIERA PARA PRESTAR EL SERVICIO; ASÍ COMO PARA CELEBRAR LOS CONTRATOS CORRESPONDIENTES; Y, SE COMPROMETE, DE RESULTAR ADJUDICADO, ENTREGARLOS, SIN CAMBIOS EN LAS CANTIDADES, CONCEPTOS, CARACTERÍSTICAS SOLICITADAS, EN LA FECHA ESTABLECIDA Y LUGAR QUE LA UNIDAD SOLICITANTE LO REQUIERA."],
                    ["numero" => "12", "descripcion" => "PRESENTAR ESCRITO BAJO PROTESTA DE DECIR VERDAD EN EL QUE MANIFIESTE QUE EN CASO DE RESULTAR ADJUDICADO NO SUBCONTRATARÁ DE MANERA TOTAL O PARCIAL, NI CEDERÁ TOTAL O PARCIALMENTE LOS DERECHOS Y OBLIGACIONES QUE DERIVEN DEL CONTRATO."],
                    ["numero" => "13", "descripcion" => "PRESENTAR ESCRITO BAJO PROTESTA DE DECIR VERDAD, EN EL QUE MANIFIESTE QUE LA PRESENTACIÓN DE PROPUESTAS SIGNIFICA, EL PLENO CONOCIMIENTO Y ACEPTACIÓN DE LOS REQUISITOS Y LINEAMIENTOS ESTABLECIDOS EN LA PRESENTE SOLICITUD DE PARTICIPACIÓN."],
                    ["numero" => "14", "descripcion" => "PRESENTAR CURRÍCULUM, ELABORADO EN PAPEL MEMBRETADO DEL OFERENTE Y SUSCRITO POR SU REPRESENTANTE LEGAL O POR QUIEN TENGA FACULTAD LEGAL PARA ELLO."],
                    ["numero" => "15", "descripcion" => "PRESENTAR ESCRITO BAJO PROTESTA DE DECIR VERDAD, EN EL QUE SEÑALE UN DOMICILIO, ASÍ COMO COPIA SIMPLE DEL COMPROBANTE DE DOMICILIO CON UNA ANTIGÜEDAD NO MAYOR A 3 MESES Y UN DOMICILIO ELECTRÓNICO (CORREO ELECTRÓNICO), PARA EFECTOS DE OÍR Y RECIBIR NOTIFICACIONES O CUALQUIER OTRO DOCUMENTO Y DE CUALQUIER NATURALEZA, MENCIONANDO QUE ESTOS MISMOS SE ASENTARÁN EN EL CONTRATO CORRESPONDIENTE EN CASO DE RESULTAR ADJUDICADO. LO ANTERIOR DE CONFORMIDAD CON LO ESTABLECIDO EN EL ARTÍCULO 70 FRACCIÓN VIII DEL REGLAMENTO Y CAPÍTULO TERCERO DEL CÓDIGO DE PROCEDIMIENTOS ADMINISTRATIVOS DEL ESTADO DE MÉXICO."],
                    ["numero" => "16", "descripcion" => "PRESENTAR ESCRITO BAJO PROTESTA DE DECIR VERDAD, EN EL QUE MANIFIESTE QUE NO DESEMPEÑA EMPLEO, CARGO O COMISIÓN EN EL SERVICIO PÚBLICO O, EN SU CASO, QUE, A PESAR DE DESEMPEÑARLO, CON LA FORMALIZACIÓN DEL CONTRATO CORRESPONDIENTE NO SE ACTUALIZA UN CONFLICTO DE INTERÉS. LO ANTERIOR DE CONFORMIDAD CON LOS SUPUESTOS PREVISTOS EN EL ARTÍCULO 50 FRACCIÓN VII DE LA LEY DE RESPONSABILIDADES ADMINISTRATIVAS DEL ESTADO DE MÉXICO Y MUNICIPIOS."],
                    ["numero" => "17", "descripcion" => "PRESENTAR ESCRITO BAJO PROTESTA DE DECIR VERDAD, EN EL QUE MANIFIESTE QUE POR SÍ MISMO O A TRAVÉS DE INTERPÓSITA PERSONA SE ABSTENDRÁ DE ADOPTAR CONDUCTAS PARA QUE LOS SERVIDORES PÚBLICOS DEL AYUNTAMIENTO DE TEMASCALCINGO, MÉXICO, INDUZCAN O ALTEREN LAS EVALUACIONES DE LAS PROPUESTAS, EL RESULTADO DEL PROCEDIMIENTO U OTROS ASPECTOS QUE OTORGUEN CONDICIONES VENTAJOSAS EN RELACIÓN CON LOS DEMÁS PARTICIPANTES."],
                    ["numero" => "18", "descripcion" => "PRESENTAR EN CARTA MEMBRETADA Y FIRMADA POR EL REPRESENTANTE LEGAL O EN SU CASO COPIA DEL ESTADO DE CUENTA BANCARIO NO MAYOR A TRES MESES DE ANTIGÜEDAD, EN AMBOS CASOS DEBERÁN CONTAR CON LOS SIGUIENTES DATOS: • NÚMERO DE CUENTA. • CLAVE INTERBANCARIA. • TITULAR. • BANCO. • SUCURSAL PROPUESTA CONJUNTA."],
                    ["numero" => "19", "descripcion" => "AFIANZADORAS AUTORIZADAS PARA LA EMISIÓN DE FIANZAS, DE ACUERDO AL \"ANEXO 2\"."],
                    ["numero" => "20", "descripcion" => "DATOS DEL LICITANTE Y SU REPRESENTANTE LEGAL, MEDIANTE ESCRITO QUE CONTENGA DATOS DE LA RAZÓN SOCIAL QUE PARTICIPA Y EN EL QUE EL FIRMANTE MANIFIESTE \"BAJO PROTESTA DE DECIR VERDAD\", QUE CUENTA CON FACULTADES SUFICIENTES PARA SUSCRIBIR A NOMBRE DE SU REPRESENTADA LA PROPUESTA CORRESPONDIENTE, \"ANEXO 3\"."]
                ];
                ?>

                <?php 
                $contador = 1;
                foreach ($requisitos as $requisito): 
                ?>
                    <tr>
                        <td class="requisito-numero"><?= $requisito['numero'] ?></td>
                        <td class="requisito-descripcion"><?= $requisito['descripcion'] ?></td>
                        <?php if (!empty($data)): ?>
                            <?php foreach ($empresasProcesadas as $empresa): ?>
                                <td class="check-cell">&nbsp;</td>
                                <td class="check-cell">&nbsp;</td>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tr>
                <?php 
                $contador++;
                endforeach; 
                ?>
            </tbody>
        </table>

        <div class="numero-pagina">
            1 DE 1
        </div>

    </div>
</div>

</body>
</html>