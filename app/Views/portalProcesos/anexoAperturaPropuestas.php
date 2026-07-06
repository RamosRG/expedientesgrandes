<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acta de Presentación y Apertura de Propuestas</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#edf1f5;
            font-family:'Century Gothic', sans-serif;
            padding:25px;
            color:#000;
            display: flex;
            justify-content: center;
        }

        .contenedor-principal{
            max-width:1450px;
            width:100%;
            margin:auto;
        }

        .header-superior{
            background:linear-gradient(135deg,#5e1b34,#8b2c4a);
            border-radius:22px;
            padding:28px 35px;
            color:white;
            margin-bottom:25px;
            box-shadow:0 10px 25px rgba(0,0,0,.08);
        }

        .header-superior h1{
            font-size:28px;
            margin-bottom:8px;
        }

        .header-superior p{
            font-size:13px;
            opacity:.9;
        }

        .barra-acciones{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
            flex-wrap:wrap;
            gap:10px;
        }

        .breadcrumb{
            background:white;
            border-radius:50px;
            padding:10px 18px;
            font-size:13px;
            box-shadow:0 2px 5px rgba(0,0,0,.06);
        }

        .breadcrumb a{
            text-decoration:none;
            color:#8b2c4a;
            font-weight:bold;
        }

        .grupo-botones{
            display:flex;
            gap:10px;
        }

        .btn{
            border:none;
            border-radius:40px;
            padding:10px 24px;
            font-size:13px;
            font-weight:bold;
            cursor:pointer;
            transition:.2s;
        }

        .btn:hover{
            transform:translateY(-1px);
        }

        .btn-volver{
            background:white;
            border:1px solid #ccc;
        }

        .btn-guardar{
            background:#5e1b34;
            color:white;
        }

        .contenedor-documento{
            display:flex;
            justify-content:center;
        }

        .grupo-hojas{
            width:21.59cm; /* Ancho Carta */
        }

        .hoja{
            width:21.59cm;  /* Ancho Carta */
            min-height:27.94cm; /* Alto Carta */
            background:white;
            border:1px solid #d8d8d8;
            box-shadow:0 0 15px rgba(0,0,0,.08);
            margin-bottom:35px;
            padding:20mm 18mm 18mm 18mm;
            position:relative;
        }

        .contenido-hoja{
            width:100%;
            height:100%;
            font-size:9pt;
            line-height:1.6;
            text-align:justify;
            text-transform:uppercase;
        }

        .encabezado{
            text-align:center;
            font-weight:bold;
            border-bottom:1px solid #000;
            padding-bottom:10px;
            margin-bottom:18px;
        }

        .titulo{
            text-align:center;
            font-weight:bold;
            font-size:13pt;
            margin-bottom:5px;
        }

        .subtitulo{
            text-align:center;
            font-weight:bold;
            margin-bottom:20px;
            line-height:1.5;
        }

        .texto{
            margin-bottom:12px;
        }

        .centrado{
            text-align:center;
        }

        .campo{
            display:inline-block;
            border-bottom:1px solid #000;
            min-width:100px;
            padding:1px 4px;
            background:#fffceb;
            font-weight:bold;
            outline:none;
        }

        .campo[contenteditable="true"]{
            cursor:text;
        }

        .campo-corto{
            min-width:70px;
        }

        .campo-mediano{
            min-width:180px;
        }

        .campo-largo{
            min-width:300px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
            margin-bottom:18px;
            font-size:8pt;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:6px 4px;
            vertical-align:top;
        }

        table th{
            text-align:center;
            font-weight:bold;
            background:#f5f5f5;
        }

        .celda-editable{
            background:#fffceb;
            outline:none;
        }

        .celda-editable:focus{
            background:#fff7d6;
        }

        .check-editable{
            text-align:center;
            cursor:pointer;
        }

        .check-editable[contenteditable="true"]:empty:before{
            content:"___";
            color:#999;
        }

        .orden-dia{
            margin-top:15px;
            margin-bottom:18px;
            padding-left:15px;
        }

        .orden-dia div{
            margin-bottom:4px;
        }

        .firma-contenedor{
            width:100%;
            margin-top:50px;
        }

        .firma{
            width:45%;
            display:inline-block;
            vertical-align:top;
            text-align:center;
        }

        .linea-firma{
            border-top:1px solid #000;
            margin-top:60px;
            padding-top:8px;
            font-weight:bold;
        }

        .pie{
            margin-top:20px;
            text-align:center;
            font-size:7pt;
        }

        .numero-pagina{
            position:absolute;
            bottom:10mm;
            right:18mm;
            font-size:8pt;
            font-weight:bold;
        }

        /* Configuración para impresión en tamaño Carta */
        @page{
            size: Carta;  /* 21.59cm x 27.94cm */
            margin: 0;
        }

        @media print{

            body{
                background:white;
                padding:0;
                margin:0;
            }

            .header-superior,
            .barra-acciones{
                display:none;
            }

            .contenedor-principal{
                max-width:100%;
                padding:0;
                margin:0;
            }

            .grupo-hojas{
                width:100%;
            }

            .hoja{
                width:21.59cm;
                min-height:27.94cm;
                border:none;
                box-shadow:none;
                margin:0 auto;
                page-break-after:always;
                padding:20mm 18mm 18mm 18mm;
            }

            .hoja:last-child{
                page-break-after:auto;
            }

        }

        .tabla-requisitos{
            font-size:7.5pt;
        }

        .tabla-requisitos th,
        .tabla-requisitos td{
            padding:4px 3px;
        }

        .requisito-numero{
            width:25px;
            text-align:center;
            font-weight:bold;
        }

        .requisito-descripcion{
            text-align:left;
        }

        .empresa-columna{
            width:75px;
            text-align:center;
            background:#f0f0f0;
        }

        /* Ajuste responsive para pantallas pequeñas */
        @media screen and (max-width: 800px) {
            .hoja {
                width: 100%;
                min-height: auto;
                padding: 15px;
            }
            .grupo-hojas {
                width: 100%;
            }
            .header-superior h1 {
                font-size: 20px;
            }
            .barra-acciones {
                flex-direction: column;
                align-items: stretch;
            }
            .grupo-botones {
                justify-content: center;
            }
        }

    </style>
</head>

<body>

<div class="contenedor-principal">

    <div class="header-superior">

        <h1>
            <i class="fas fa-file-signature"></i>
            ACTA DE PRESENTACIÓN Y APERTURA DE PROPUESTAS
        </h1>

        <p>
            Documento oficial del procedimiento adquisitivo
        </p>

    </div>

    <div class="barra-acciones">

        <div class="breadcrumb">

            <a href="#">Inicio</a>
            /
            <a href="#">Procesos</a>
            /
            Acta de Apertura

        </div>

        <div class="grupo-botones">

            <button class="btn btn-volver" onclick="window.history.back();">
                <i class="fas fa-arrow-left"></i>
                Regresar
            </button>

            <button class="btn btn-guardar" id="btnGuardar">
                <i class="fas fa-save"></i>
                Guardar Acta
            </button>

        </div>

    </div>

    <div class="contenedor-documento">

        <div class="grupo-hojas">

            <!-- =====================================================
                 HOJA 1 (TAMAÑO CARTA: 21.59cm x 27.94cm)
            ====================================================== -->

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

                        <span id="no_licitacion" class="campo campo-mediano" contenteditable="true">
                        </span>

                        <br>

                        PARA LA “

                        <span id="nombre_estudio" class="campo campo-largo" contenteditable="true">
                            
                        </span>

                        ”

                    </div>


                    <div class="texto" style="font-weight:bold; margin-top:10px;">
                        DOCUMENTACIÓN SOLICITADA EN LA PROPUESTA TÉCNICA
                    </div>

<table class="tabla-requisitos">
    <thead id="theadRequisitos"></thead>
    <tbody id="tbodyRequisitos"></tbody>
</table>
                    <div class="numero-pagina">
                        1 DE 1
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

    document.getElementById('btnGuardar')
    .addEventListener('click', () => {

        const campos = document.querySelectorAll(
            '[contenteditable="true"]'
        );

        let datos = {};

        campos.forEach((campo,index) => {

            datos[`campo_${index}`] = campo.innerText.trim();

        });

        console.log(datos);

        alert('ACTA GUARDADA CORRECTAMENTE');

    });


</script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/portalProceso/anexoAperturaPropuestas.js"></script>


</body>
</html>