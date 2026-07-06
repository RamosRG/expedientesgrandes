<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anexo Papelería 2026 | Relación de bienes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #eef2f5;
            font-family: 'Century Gothic', 'Segoe UI', 'Arial', sans-serif;
            padding: 30px 20px;
            color: #1a2c3e;
        }

        .contenedor-principal {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header-superior {
            background: linear-gradient(135deg, #1e4a6b, #0f2c3f);
            border-radius: 28px;
            padding: 28px 35px;
            color: white;
            margin-bottom: 30px;
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
        }

        .header-superior h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header-superior p {
            font-size: 13px;
            opacity: 0.85;
        }

        .barra-acciones {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .breadcrumb {
            background: white;
            border-radius: 60px;
            padding: 10px 22px;
            font-size: 13px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .breadcrumb a {
            text-decoration: none;
            color: #1e4a6b;
            font-weight: bold;
        }

        .grupo-botones {
            display: flex;
            gap: 12px;
        }

        .btn {
            border: none;
            border-radius: 40px;
            padding: 10px 28px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-volver {
            background: white;
            border: 1px solid #cbd5e1;
            color: #1e293b;
        }

        .btn-guardar {
            background: #1e4a6b;
            color: white;
        }

        .contenedor-documento {
            display: flex;
            justify-content: center;
        }

        .grupo-hojas {
            width: 210mm;
        }

        .hoja {
            width: 210mm;
            min-height: 297mm;
            background: white;
            border: 1px solid #cfdde6;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
            margin-bottom: 38px;
            padding: 20mm 18mm 20mm 18mm;
            position: relative;
            border-radius: 2px;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 10pt;
            line-height: 1.45;
            color: #000000;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        /* Encabezado principal */
        .titulo-anexo {
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .subtitulo {
            text-align: center;
            font-size: 11pt;
            margin-bottom: 25px;
            border-bottom: 2px solid #1e4a6b;
            padding-bottom: 8px;
        }

        /* Tabla estilo documento */
        .tabla-bienes {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 20px;
            font-size: 9pt;
        }

        .tabla-bienes th,
        .tabla-bienes td {
            border: 1px solid #000000;
            padding: 8px 6px;
            vertical-align: top;
        }

        .tabla-bienes th {
            background-color: #f0f4f8;
            text-align: center;
            font-weight: bold;
            font-size: 9pt;
        }

        .celda-editable {
            background-color: #eafaf1;
            outline: none;
            color: #14532d;
            font-weight: 500;
        }

        .celda-editable[contenteditable="true"]:empty:before {
            content: "______";
            color: #6b9c7a;
            letter-spacing: 1px;
        }

        /* Para filas adicionales dinámicas */
        .btn-agregar-fila {
            background: #1e4a6b;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 6px 18px;
            font-size: 9pt;
            cursor: pointer;
            margin: 10px 0 5px;
            transition: 0.2s;
            font-weight: bold;
        }

        .btn-agregar-fila:hover {
            background: #0f3b54;
            transform: scale(1.01);
        }

        .numero-pagina {
            position: absolute;
            bottom: 15mm;
            right: 18mm;
            font-size: 8pt;
            font-weight: bold;
        }

        .nota-final {
            font-size: 8pt;
            margin-top: 18px;
            text-align: left;
            border-top: 1px dashed #aaa;
            padding-top: 8px;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .header-superior, .barra-acciones {
                display: none;
            }
            .hoja {
                border: none;
                box-shadow: none;
                margin: 0;
                page-break-after: avoid;
            }
            .celda-editable {
                background: transparent !important;
                border-bottom: none;
            }
            .btn-agregar-fila {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="contenedor-principal">
    <div class="header-superior">
        <h1><i class="fas fa-clipboard-list"></i> Anexo Técnico · Papelería 2026</h1>
        <p>Relación de bienes, cantidades y marcas de referencia</p>
    </div>
    <div class="barra-acciones">
        <div class="breadcrumb"><a href="#">Documentos de contratación</a> / <a href="#">Anexos</a> / Papelería 2026</div>
        <div class="grupo-botones">
            <button class="btn btn-volver" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Regresar</button>
            <button class="btn btn-guardar" id="btnGuardarAnexo"><i class="fas fa-save"></i> Guardar anexo</button>
        </div>
    </div>
    <div class="contenedor-documento">
        <div class="grupo-hojas">
            <div class="hoja">
                <div class="contenido-hoja">
                    <div class="titulo-anexo">
                        Anexo Tabla
                    </div>

<table class="tabla-bienes" id="tablaInventario">
    <thead>
        <tr>
            <th style="width: 8%;"># PARTIDA<br>ÚNICA</th>
            <th style="width: 42%;">DESCRIPCIÓN DE LOS BIENES</th>
            <th style="width: 12%;">UNIDAD DE MEDIDA</th>
            <th style="width: 12%;">CANTIDAD</th>
            <th style="width: 26%;">MARCA Y MODELO PROPUESTO</th>
        </tr>
    </thead>

    <tbody id="tablaBodyAnexo">
    </tbody>
</table>

                    <div class="numero-pagina">
                        1 de 1
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/portalProceso/anexoTabla.js"></script>

<script>
</script>
</body>
</html>