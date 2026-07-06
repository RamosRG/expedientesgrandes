<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remisión Estudio de Mercado | Oficio Justificatorio</title>
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
            font-size: 10pt;
        }

        .contenedor-principal {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header administrativo (barra superior) */
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

        /* Estilos del proveedor seleccionado */
        .proveedor-seleccionado {
            background: #e8f5e9 !important;
            border-left: 4px solid #4caf50;
        }

        .proveedor-seleccionado td {
            font-weight: 500;
        }

        .estatus-aceptado {
            background: #4caf50;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 10px;
            display: inline-block;
        }

        .estatus-registrado {
            background: #2196f3;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 10px;
            display: inline-block;
        }

        .estatus-pendiente {
            background: #ff9800;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 10px;
            display: inline-block;
        }

        .btn-seleccionar {
            background: #e3f2fd;
            border: none;
            padding: 5px 12px;
            border-radius: 15px;
            color: #1e4a6b;
            cursor: pointer;
            font-size: 10px;
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .btn-seleccionar:hover {
            background: #1e4a6b;
            color: white;
        }

        /* Documento principal */
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
            padding: 25mm 30mm 25mm 30mm;
            position: relative;
            border-radius: 2px;
        }

        .contenido-hoja {
            width: 100%;
            height: 100%;
            font-size: 10pt;
            line-height: 1.5;
            color: #000000;
            font-family: 'Century Gothic', 'Segoe UI', Arial, sans-serif;
        }

        /* Encabezado del año */
        .encabezado-anio {
            text-align: center;
            font-weight: bold;
            font-size: 10pt;
            letter-spacing: 0.5px;
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
            font-size: 10pt;
            margin-top: 6px;
            font-weight: normal;
        }

        .copia-archivo {
            margin-top: 35px;
            font-size: 10pt;
        }

        .iniciales {
            margin-top: 6px;
            font-size: 10pt;
        }

        .numero-pagina {
            position: absolute;
            bottom: 25mm;
            right: 30mm;
            font-size: 9pt;
            font-weight: bold;
        }

        /* Campos editables */
        .campo-verde {
            display: inline-block;
            border-bottom: 2px solid #2c7a4d;
            min-width: 130px;
            background: #f0faf0;
            padding: 2px 8px;
            font-weight: 600;
            outline: none;
            color: #1a4a2a;
            font-family: 'Courier New', monospace;
            font-size: 10pt;
            text-align: left;
            border-radius: 2px;
        }

        .campo-verde[contenteditable="true"]:hover {
            background: #e0f5e0;
            cursor: text;
        }

        .campo-verde[contenteditable="true"]:empty:before {
            content: "________";
            color: #6b9c7a;
            letter-spacing: 1px;
        }

        .campo-corto { min-width: 90px; }
        .campo-mediano { min-width: 180px; }
        .campo-largo { min-width: 280px; }

        .bold-label {
            font-weight: bold;
        }

        .linea-derecha {
            text-align: right;
        }

        .linea-derecha .campo-verde {
            text-align: left;
        }

        /* Sección de información del proveedor */
        .info-proveedor {
            margin-top: 20px;
            padding: 15px 20px;
            background: linear-gradient(135deg, #f0f7ff, #e8f5e9);
            border-left: 4px solid #1e4a6b;
            border-radius: 8px;
            border: 1px solid #cfe0e8;
        }

        .info-proveedor h3 {
            color: #1e4a6b;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .info-proveedor .proveedor-destacado {
            background: #e8f5e9;
            padding: 10px 20px;
            border-radius: 6px;
            display: inline-block;
            border: 1px solid #a5d6a7;
        }

        .info-proveedor .proveedor-destacado strong {
            color: #2e7d32;
        }

        .info-proveedor .proveedor-destacado .nombre-proveedor {
            font-weight: bold;
            color: #1e4a6b;
            font-size: 14px;
        }

        .info-proveedor .correo-proveedor {
            margin-top: 8px;
            color: #1e4a6b;
            font-size: 12px;
        }

        .selector-container {
            margin: 15px 0;
            padding: 15px;
            background: white;
            border-radius: 8px;
            border: 1px solid #e0e7ef;
        }

        .selector-container label {
            font-weight: bold;
            color: #1e4a6b;
            margin-right: 10px;
        }

        .selector-container select {
            padding: 8px 15px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            min-width: 250px;
            font-family: inherit;
            background: white;
        }

        /* Tabla de proveedores */
        .tabla-proveedores {
            margin-top: 30px;
        }

        .tabla-proveedores h3 {
            color: #1e4a6b;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .tabla-proveedores .contenedor-tabla {
            overflow-x: auto;
            border: 1px solid #e0e7ef;
            border-radius: 8px;
            background: white;
        }

        .tabla-proveedores table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
        }

        .tabla-proveedores thead {
            background: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
        }

        .tabla-proveedores th {
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            color: #475569;
        }

        .tabla-proveedores td {
            padding: 10px 15px;
            border-bottom: 1px solid #eef2f6;
        }

        .tabla-proveedores tbody tr:hover {
            background: #f8fafc;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .header-superior, .barra-acciones, .info-proveedor, .selector-container, .tabla-proveedores {
                display: none !important;
            }
            .hoja {
                border: none;
                box-shadow: none;
                margin: 0;
                page-break-after: avoid;
                padding: 25mm 30mm 25mm 30mm;
            }
            .campo-verde {
                background: transparent !important;
                border-bottom: 1px solid #000 !important;
            }
        }
    </style>
</head>
<body>
<div class="contenedor-principal">
    <div class="header-superior">
        <h1><i class="fas fa-file-invoice"></i> Solicitud de Cotización</h1>
        <p>Invitación al estudio de mercado para precios de referencia</p>
    </div>
    <div class="barra-acciones">
        <div class="breadcrumb"><a href="#">Oficios</a> / <a href="#">Cotizaciones</a> / Invitación al estudio de mercado</div>
        <div class="grupo-botones">
            <button class="btn btn-volver" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Regresar</button>
            <button class="btn btn-guardar" id="btnGuardarOficio"><i class="fas fa-save"></i> Guardar documento</button>
        </div>
    </div>

    <!-- Selector de proveedor -->
    <div class="selector-container">
        <label for="selectorProveedor">
            <i class="fas fa-exchange-alt"></i> Seleccionar proveedor para el estudio:
        </label>
        <select id="selectorProveedor">
            <option value="">-- Seleccionar proveedor --</option>
        </select>
        <span style="margin-left: 15px; color: #666; font-size: 10px;">
            <i class="fas fa-info-circle"></i> El proveedor seleccionado aparecerá en el oficio
        </span>
    </div>

    <div class="contenedor-documento">
        <div class="grupo-hojas">
            <!-- HOJA ÚNICA: Contenido del oficio de invitación al estudio de mercado -->
            <div class="hoja">
                <div class="contenido-hoja">

                    <!-- Encabezado lema 2026 -->
                    <div class="encabezado-anio">
                        "2026. AÑO DEL HUMANISMO MEXICANO EN EL ESTADO DE MÉXICO"
                    </div>

                    <!-- Fecha - alineada a la derecha -->
                    <div class="fecha-linea linea-derecha">
                        <strong>TEMASCALCINGO, ESTADO DE MÉXICO, A </strong>
                        <span id="created_at" class="campo-verde campo-mediano" contenteditable="true"></span>
                    </div>

                    <!-- Dependencia - alineada a la derecha -->
                    <div class="fecha-linea linea-derecha">
                        <strong>DEPENDENCIA:</strong>
                        DIRECCIÓN DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
                    </div>

                    <!-- Folio - alineada a la derecha -->
                    <div class="fecha-linea linea-derecha">
                        <strong>FOLIO: TEM/ADQ/COT/</strong>
                        <span id="no_licitacion" class="campo-verde campo-corto" contenteditable="true"></span>
                    </div>

                    <!-- Asunto - alineado a la derecha -->
                    <div class="fecha-linea linea-derecha" style="margin-bottom: 20px;">
                        <strong>ASUNTO: INVITACIÓN AL ESTUDIO DE MERCADO</strong>
                    </div>

                    <!-- Destinatario: nombre y correo - editables -->
                    <div class="destinatario-linea">
                        <span id="proveedorCumplimiento" class="campo-verde campo-largo" contenteditable="true"></span>
                    </div>

                    <div class="saludo-formal" style="margin-bottom: 15px;">
                        <strong>PRESENTE</strong>
                    </div>

                    <!-- Cuerpo del oficio (texto completo con campos editables) -->
                    <div class="texto-cuerpo">
                        Con fundamento en lo dispuesto en los artículos 3 fracción IV y 16 fracción III de la Ley de Contratación Pública del Estado de México y Municipios y 17 párrafo segundo y 18 de su respectivo Reglamento, y demás disposiciones normativas y técnicas aplicables; le solicito una cotización como precios de referencia para llevar a cabo la contratación para el <strong>"</strong>
                        <span id="nombre_estudio" class="campo-verde campo-largo" contenteditable="true"></span><strong>"</strong>, por el periodo comprendido del
                        <span id="created_at1" class="campo-verde campo-mediano" contenteditable="true"></span>.
                    </div>

                    <div class="texto-cuerpo">
                        Por lo anterior, se adjunta el <strong>ANEXO 1</strong>, que contiene los requerimientos técnicos, cantidades y condiciones comerciales respectivas, poniendo a su disposición la dirección electrónica: <strong>adquisiciones@temascalcingo.gob.mx</strong> para cualquier información adicional esperando contar con su respuesta a más tardar el día
                        <span id="created_at2" class="campo-verde campo-mediano" contenteditable="true"></span> a las
                        <span id="hora" class="campo-verde campo-corto" contenteditable="true"></span> horas.
                    </div>

                    <div class="texto-cuerpo">
                        Sin otro particular por el momento reciba un cordial saludo.
                    </div>

                    <!-- Cierre formal centrado -->
                    <div class="atentamente">
                        A T E N T A M E N T E
                    </div>
                    <div class="frase-valores">
                        "SERVIR CON VALORES"
                    </div>

                    <!-- Firma y cargo centrados perfectamente - editables -->
                    <div class="firma-area">
                        <div class="firma-linea">
                            C. MIRIAM VIANEY OVANDO RUBIO
                        </div>
                        <div class="cargo-firma">
                            DIRECTORA DE ADMINISTRACIÓN Y DESARROLLO DE PERSONAL
                        </div>
                    </div>

                    <!-- c.c.p. e iniciales (editables) -->
                    <div class="copia-archivo">
                        <strong>C.</strong>
                        <span id="coordinador" class="campo-verde campo-largo" contenteditable="true"></span>
                    </div>
                    <div class="iniciales">
                        <strong>COORDINADOR DE </strong>
                        <span id="area" class="campo-verde campo-mediano" contenteditable="true"></span>
                    </div>
                    <div class="copia-archivo" style="margin-top: 3px;">
                        <strong>C. C. P. ARCHIVO</strong>
                    </div>

                    <!-- Número de página -->
                    <div class="numero-pagina">
                        1 de 1
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Información del proveedor seleccionado -->
    <div class="info-proveedor">
        <h3><i class="fas fa-check-circle" style="color: #4caf50;"></i> PROVEEDOR SELECCIONADO PARA REMISIÓN</h3>
        <div class="proveedor-destacado">
            <strong>Proveedor:</strong> 
            <span class="nombre-proveedor" id="proveedorCumplimiento">—</span>
            <span style="margin-left: 15px; background: #4caf50; color: white; padding: 3px 12px; border-radius: 20px; font-weight: bold; font-size: 10px;">
                <i class="fas fa-check"></i> SELECCIONADO
            </span>
        </div>
        <div class="correo-proveedor">
            <i class="fas fa-envelope"></i> <strong>Correo:</strong> <span id="correoMostrado">—</span>
        </div>
    </div>

    <!-- Tabla de todos los proveedores -->
    <div class="tabla-proveedores">
        <h3><i class="fas fa-users"></i> PROVEEDORES DEL PROCEDIMIENTO</h3>
        <div class="contenedor-tabla">
            <table>
                <thead>
                    <tr>
                        <th>Catálogo</th>
                        <th>Proveedor</th>
                        <th>Correo</th>
                        <th>Estatus</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbodyProveedores">
                    <!-- Los datos se llenan desde JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="../../public/js/portalProceso/RemisionLp.js"></script>

<script>
    document.getElementById('btnGuardarOficio').addEventListener('click', function() {
        let todosCampos = document.querySelectorAll('.campo-verde');
        let datosGuardados = {};
        todosCampos.forEach((el, idx) => {
            let valor = el.innerText.trim() !== '' ? el.innerText.trim() : '[pendiente]';
            datosGuardados[`campo_${idx}`] = valor;
        });
        console.log("Oficio de remisión guardado:", datosGuardados);
        localStorage.setItem('oficioRemisionEstudio', JSON.stringify(datosGuardados));
        alert("✔ Documento actualizado. Los campos editables (verdes) se han guardado correctamente.");
    });

    // Cargar datos previamente guardados para mantener persistencia
    window.addEventListener('load', function() {
        const dataGuardada = localStorage.getItem('oficioRemisionEstudio');
        if(dataGuardada) {
            try {
                const valores = JSON.parse(dataGuardada);
                let i = 0;
                document.querySelectorAll('.campo-verde').forEach(el => {
                    if(valores[`campo_${i}`] && valores[`campo_${i}`] !== '[pendiente]') {
                        if(el.innerText.trim() === '' || el.innerText.includes('________') || el.innerText.includes('______')) {
                            el.innerText = valores[`campo_${i}`];
                        }
                    }
                    i++;
                });
            } catch(e) {}
        }
    });
</script>
</body>
</html>