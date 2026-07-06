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
            padding: 25mm 30mm 25mm 30mm; /* Superior: 2.5cm, Derecho: 3cm, Inferior: 2.5cm, Izquierdo: 3cm */
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

        /* Encabezado del año - centrado exacto */
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

        /* Bloques de texto con sangría y justificación */
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

        /* Firma y cargo centrados exactamente como en Word */
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

        /* Campos editables estilo "subrayado verde" - solo partes subrayadas */
        .campo-verde {
            display: inline-block;
            border-bottom: 1px solid #2c7a4d;
            min-width: 130px;
            background: #eafaf1;
            padding: 0px 6px;
            font-weight: 600;
            outline: none;
            color: #14532d;
            font-family: monospace;
            font-size: 10pt;
            text-align: left;
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

        /* Estilo para forzar alineación derecha en las líneas específicas */
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
            .header-superior, .barra-acciones {
                display: none;
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
        <h1><i class="fas fa-paper-plane"></i> Remisión de Estudio de Mercado</h1>
        <p>Oficio justificatorio y solicitud de suficiencia presupuestal</p>
    </div>
    <div class="barra-acciones">
        <div class="breadcrumb"><a href="#">Oficios</a> / <a href="#">Estudios de mercado</a> / Remisión y solicitud</div>
        <div class="grupo-botones">
            <button class="btn btn-volver" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Regresar</button>
            <button class="btn btn-guardar" id="btnGuardarOficio"><i class="fas fa-save"></i> Guardar documento</button>
        </div>
    </div>
    <div class="contenedor-documento">
        <div class="grupo-hojas">
            <!-- HOJA ÚNICA: Formato exacto del Word proporcionado -->
            <div class="hoja">
                <div class="contenido-hoja">

                    <!-- Encabezado lema 2025 -->
                    <div class="encabezado-anio">
                        "2025. BICENTENARIO DE LA VIDA MUNICIPAL EN EL ESTADO DE MÉXICO"
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

                    <!-- Oficio número - alineada a la derecha -->
                    <div class="fecha-linea linea-derecha">
                        <strong>OFICIO NO. MTM/DADP/CAYS/</strong>
                        <span id="no_licitacion" class="campo-verde campo-corto" contenteditable="true"></span>
                    </div>

                    <!-- Asunto - alineado a la derecha -->
                    <div class="fecha-linea linea-derecha" style="margin-bottom: 20px;">
                        <strong>ASUNTO: REMISIÓN DE ESTUDIO DE MERCADO Y SOLICITUD DE OFICIO JUSTIFICATORIO</strong>
                    </div>

                    <!-- Destinatario: nombre y área - editables -->
                    <div class="destinatario-linea">
                        <strong>C.</strong>
                        <span id="coordinador" class="campo-verde campo-largo" contenteditable="true"></span>
                    </div>
                    <div class="destinatario-linea" style="margin-bottom: 18px;">
                        <strong>COORDINADORA DE</strong>
                        <span id="area" class="campo-verde campo-mediano" contenteditable="true"></span>
                    </div>

                    <div class="saludo-formal">
                        <strong>P R E S E N T E</strong>
                    </div>

                    <!-- Cuerpo del oficio (texto completo con campos editables en las partes subrayadas) -->
                    <div class="texto-cuerpo">
                        En referencia al <strong>Oficio NO. MTM/CMPYB/</strong>
                        <span id="no_licitacion1" class="campo-verde campo-corto" contenteditable="true"></span>, de fecha
                        <span id="created_at1" class="campo-verde campo-mediano" contenteditable="true"></span>,
                        donde solicita se lleve a cabo la
                        <span id="nombre_estudio" class="campo-verde campo-largo" contenteditable="true"></span>
                        como lo especifica la
                        <span id="catalogo1" class="campo-verde campo-largo" contenteditable="true"></span>,
                        me permito remitir a usted el estudio de mercado realizado por el área de la Coordinación de Recursos Materiales, para que en atención a lo estipulado en los Artículos 13 y 14 de la Ley de Contratación Pública del Estado de México y Municipios, 15 inciso b) del Reglamento, solicite al área de la Tesorería Municipal, suficiencia presupuestal por el monto del precio de referencia, para la compra en mención, remitiendo copia de la solicitud y respuesta de suficiencia a esta Dirección de Administración y Desarrollo de Personal para la integración al expediente de compra.
                    </div>

                    <div class="texto-cuerpo">
                        Así mismo, le solicito amablemente elabore y remita a esta Dirección el <strong>Oficio Justificatorio</strong> que servirá de base en el procedimiento adquisitivo.
                    </div>

                    <div class="texto-cuerpo">
                        Sin más por el momento, quedo atento a su apreciable respuesta.
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

                    <!-- c.c.p. e iniciales (fijos) -->
                    <div class="copia-archivo">
                        <strong>C. PAULO SERGIO HERNÁNDEZ CUADRIELLO</strong> 
                    </div>
                    <div class="iniciales">
                        <strong>COORDINADOR DE ADQUISICIONES Y SERVICIOS</strong>
                    </div>

                    <!-- Número de página -->
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
    <script src="../../public/js/portalProceso/remisionEstudio.js"></script>

<script>
    document.getElementById('btnGuardarOficio').addEventListener('click', function() {
        let todosCampos = document.querySelectorAll('.campo-verde');
        let datosGuardados = {};
        todosCampos.forEach((el, idx) => {
            let valor = el.innerText.trim() !== '' ? el.innerText.trim() : '[pendiente]';
            datosGuardados[`campo_${idx}`] = valor;
        });
        console.log("Oficio de remisión guardado:", datosGuardados);
        localStorage.setItem('oficioRemisionEstudioCentrado', JSON.stringify(datosGuardados));
        alert("✔ Documento actualizado. Los campos editables (verdes) se han guardado correctamente.");
    });

    // Cargar datos previamente guardados para mantener persistencia
    window.addEventListener('load', function() {
        const dataGuardada = localStorage.getItem('oficioRemisionEstudioCentrado');
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