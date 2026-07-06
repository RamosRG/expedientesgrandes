<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asistencia | Acta de Apertura</title>
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

        /* Estilos del documento */
        .titulo-lista {
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .subtitulo-acto {
            text-align: center;
            font-size: 12pt;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .texto-invitacion {
            text-align: center;
            font-size: 11pt;
            margin-bottom: 8px;
        }

        .campo-verde {
            display: inline-block;
            border-bottom: 1px solid #2c7a4d;
            min-width: 150px;
            background: #eafaf1;
            padding: 0px 6px;
            font-weight: 600;
            outline: none;
            color: #14532d;
            font-family: monospace;
            font-size: 10pt;
            text-align: center;
        }

        .campo-mediano { min-width: 180px; }
        .campo-largo { min-width: 280px; }

        .fecha-fija {
            text-align: center;
            font-weight: bold;
            margin: 12px 0 20px 0;
            font-size: 11pt;
        }

        .subtitulo-licitantes {
            text-align: center;
            font-weight: bold;
            font-size: 12pt;
            margin: 20px 0 12px 0;
            text-decoration: underline;
        }

        /* Tabla asistencia */
        .tabla-asistencia {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 9.5pt;
        }

        .tabla-asistencia th,
        .tabla-asistencia td {
            border: 1px solid #000000;
            padding: 10px 6px;
            vertical-align: top;
        }

        .tabla-asistencia th {
            background-color: #f0f4f8;
            text-align: center;
            font-weight: bold;
        }

        .celda-editable {
            background-color: #eafaf1;
            outline: none;
            color: #14532d;
        }

        .celda-editable[contenteditable="true"]:empty:before {
            content: "______";
            color: #6b9c7a;
            letter-spacing: 1px;
        }

        .numero-pagina {
            position: absolute;
            bottom: 15mm;
            right: 18mm;
            font-size: 8pt;
            font-weight: bold;
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
            .celda-editable, .campo-verde {
                background: transparent !important;
                border-bottom: 1px solid #000 !important;
            }
            .fecha-editable {
    display: inline-block;
    border-bottom: 1px solid #2c7a4d;
    background: #eafaf1;
    padding: 0px 6px;
    font-weight: 600;
    outline: none;
    color: #14532d;
    font-family: monospace;
    font-size: 10pt;
    text-align: center;
    min-width: 200px;
    cursor: text;
}

.fecha-editable:empty:before {
    content: "DD DE MES DE AAAA";
    color: #6b9c7a;
    letter-spacing: 1px;
}
        }
    </style>
</head>
<body>
<div class="contenedor-principal">
    <div class="header-superior">
        <h1><i class="fas fa-users"></i> Lista de Asistencia</h1>
        <p>Acta de presentación y apertura de propuestas</p>
    </div>
    <div class="barra-acciones">
        <div class="breadcrumb"><a href="#">Procedimientos</a> / <a href="#">Licitaciones</a> / Lista de asistencia</div>
        <div class="grupo-botones">
            <button class="btn btn-volver" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Regresar</button>
            <button class="btn btn-guardar" id="btnGuardarLista"><i class="fas fa-save"></i> Guardar lista</button>
        </div>
    </div>
    <div class="contenedor-documento">
        <div class="grupo-hojas">
            <div class="hoja">
                <div class="contenido-hoja">
                    <!-- Títulos según el documento Word -->
                    <div class="titulo-lista">
                        LISTA DE ASISTENCIA
                    </div>
                    <div class="subtitulo-acto">
                        ACTO DE PRESENTACIÓN Y APERTURA DE PROPUESTAS
                    </div>
                    <div class="subtitulo-acto">
                        DE LA INVITACIÓN RESTRINGIDA NACIONAL PRESENCIAL
                    </div>
                    <div style="text-align: center; margin: 8px 0;">
                        IRNP-<span id="no_licitacion" class="campo-verde campo-mediano" contenteditable="true"></span>
                    </div>
                    <div style="text-align: center; margin: 10px 0;">
                        PARA EL "<span id="nombre_estudio" class="campo-verde campo-largo" contenteditable="true"></span>"
                    </div>
<div class="fecha-fija">
    FECHA: <span id="created_at" contenteditable="true"></span>
</div>
                    <div class="subtitulo-licitantes">
                        POR "LOS LICITANTES"
                    </div>

<!-- Tabla de asistentes: LICITANTE PRESENTE | NOMBRE DEL REPRESENTANTE | HORA DE REGISTRO | FIRMA -->
<table class="tabla-asistencia" id="tablaAsistencia">

    <thead>
        <tr>
            <th style="width: 30%;">LICITANTE PRESENTE</th>
            <th style="width: 35%;">NOMBRE DEL REPRESENTANTE</th>
            <th style="width: 15%;">HORA DE REGISTRO</th>
            <th style="width: 20%;">FIRMA</th>
        </tr>
    </thead>

    <tbody id="tablaBodyAsistencia">

        <!-- Fila inicial de carga vacía (se reemplaza dinámicamente por JS) -->
        <tr>
            <td colspan="4" style="text-align:center;">
                Cargando información...
            </td>
        </tr>

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
    <script src="../../public/js/portalProceso/registroAsistencia.js"></script>

<script>
    // Guardar lista de asistencia en localStorage
    function guardarLista() {
        const filas = document.querySelectorAll('#tablaBodyAsistencia tr');
        const datosFilas = [];
        filas.forEach(fila => {
            const celdas = fila.querySelectorAll('.celda-editable');
            const filaData = [];
            celdas.forEach(celda => {
                filaData.push(celda.innerText.trim());
            });
            datosFilas.push(filaData);
        });

        // Guardar también los campos editables del encabezado
        const camposEncabezado = {
            noLicitacion: document.querySelector('.titulo-lista + .texto-invitacion + div .campo-verde')?.innerText.trim() || '',
            giroComercial: document.querySelector('.fecha-fija + div + .campo-verde')?.innerText.trim() || ''
        };
        // Mejor selectores específicos
        const nodoLicitacion = document.querySelector('div[style*="text-align: center; margin: 8px 0;"] .campo-verde');
        const nodoGiro = document.querySelector('div[style*="text-align: center; margin: 10px 0;"] .campo-verde');
        if (nodoLicitacion) camposEncabezado.noLicitacion = nodoLicitacion.innerText.trim();
        if (nodoGiro) camposEncabezado.giroComercial = nodoGiro.innerText.trim();

        const objetoGuardado = {
            filas: datosFilas,
            encabezado: camposEncabezado,
            fechaGuardado: new Date().toISOString()
        };

        localStorage.setItem('listaAsistenciaLicitacion', JSON.stringify(objetoGuardado));
        alert('✅ Lista de asistencia guardada correctamente.');
    }

    // Cargar datos previamente guardados
    function cargarLista() {
        const dataGuardada = localStorage.getItem('listaAsistenciaLicitacion');
        if (!dataGuardada) return;

        try {
            const parsed = JSON.parse(dataGuardada);
            if (parsed.filas && parsed.filas.length > 0) {
                const tablaBody = document.getElementById('tablaBodyAsistencia');
                // Limpiar filas existentes
                while (tablaBody.firstChild) {
                    tablaBody.removeChild(tablaBody.firstChild);
                }
                // Reconstruir filas
                parsed.filas.forEach(filaArray => {
                    const nuevaFila = document.createElement('tr');
                    for (let i = 0; i < 4; i++) {
                        const celda = document.createElement('td');
                        celda.className = 'celda-editable';
                        celda.setAttribute('contenteditable', 'true');
                        celda.innerText = filaArray[i] || '';
                        nuevaFila.appendChild(celda);
                    }
                    tablaBody.appendChild(nuevaFila);
                });
            }
            // Restaurar campos de encabezado si existen
            if (parsed.encabezado) {
                const nodoLicitacion = document.querySelector('div[style*="text-align: center; margin: 8px 0;"] .campo-verde');
                const nodoGiro = document.querySelector('div[style*="text-align: center; margin: 10px 0;"] .campo-verde');
                if (nodoLicitacion && parsed.encabezado.noLicitacion) nodoLicitacion.innerText = parsed.encabezado.noLicitacion;
                if (nodoGiro && parsed.encabezado.giroComercial) nodoGiro.innerText = parsed.encabezado.giroComercial;
            }
        } catch (e) {
            console.warn("Error al cargar lista previa", e);
        }
    }

    // Evento del botón guardar
    document.getElementById('btnGuardarLista').addEventListener('click', guardarLista);

    // Inicializar: cargar datos guardados al cargar la página
    window.addEventListener('DOMContentLoaded', () => {
        cargarLista();
    });
</script>
</body>
</html>