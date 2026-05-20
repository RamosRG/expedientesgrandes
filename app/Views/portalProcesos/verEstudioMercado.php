<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudio de Mercado</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --vino-oscuro: #4a0b1c;
            --vino-medio:  #8b1a3a;
            --vino-palido: #d4a0b0;
            --fondo:       #f8f9fa;
            --texto:       #2c2c2c;
            --gris:        #e5e5e5;
            --success:     #198754;
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--fondo);
            color: var(--texto);
        }

        /* ── Layout ─────────────────────────────────────────────────── */
        .container {
            max-width: 1400px;
            margin: auto;
            padding: 30px 20px;
        }

        /* ── Header ─────────────────────────────────────────────────── */
        .header {
            background: linear-gradient(135deg, var(--vino-oscuro), var(--vino-medio));
            color: white;
            padding: 35px;
            border-radius: 18px;
            margin-bottom: 20px;
            text-align: center;
        }
        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
        }

        /* ── Breadcrumb ──────────────────────────────────────────────── */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            margin-bottom: 20px;
            color: #555;
        }
        .breadcrumb a { color: var(--vino-medio); text-decoration: none; }
        .breadcrumb a:hover { text-decoration: underline; }
        .breadcrumb-separator { color: #bbb; }

        /* ── Card ────────────────────────────────────────────────────── */
        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
            margin-bottom: 30px;
            overflow-x: auto;          /* ← tabla horizontal scrollable */
        }

        h2 {
            color: var(--vino-oscuro);
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
        }

        /* ── Tabla encabezado (datos generales) ──────────────────────── */
        .tabla-info {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
            font-size: 14px;
        }
        .tabla-info td {
            border: 1px solid #ddd;
            padding: 10px 14px;
            text-align: left;
            background: white;
        }
        .tabla-info td:first-child {
            background: #f3e8ec;
            color: var(--vino-oscuro);
            font-weight: 600;
            width: 220px;
            white-space: nowrap;
        }

        /* ── Tabla principal ─────────────────────────────────────────── */
        #tablaEstudio {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
            min-width: 700px;          /* evita colapso en pantallas chicas */
        }

        #tablaEstudio th {
            background: var(--vino-medio);
            color: white;
            padding: 10px 8px;
            border: 1px solid #7a1530;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        #tablaEstudio td {
            border: 1px solid #ccc;
            padding: 9px 8px;
            text-align: center;
            background: white;
            vertical-align: middle;
        }

        #tablaEstudio tbody tr:nth-child(even) td { background: #fdf5f7; }
        #tablaEstudio tbody tr:hover td           { background: #ffeeba; }

        /* Primera columna (PARTIDA) resaltada */
        #tablaEstudio tbody td:first-child { font-weight: 700; }

        /* ── TFOOT ───────────────────────────────────────────────────── */
        #tablaEstudio tfoot th {
            background: #3d0a18;
            font-size: 11px;
            text-align: left;
            padding-left: 12px;
        }

        #tablaEstudio tfoot td {
            background: #fff8f9;
            font-size: 12px;
        }

        #tablaEstudio tfoot tr.tfoot-total th,
        #tablaEstudio tfoot tr.tfoot-total td {
            background: #4a0b1c;
            color: white;
            font-weight: 700;
        }

        #tablaEstudio tfoot tr.tfoot-iva th,
        #tablaEstudio tfoot tr.tfoot-iva td {
            background: #f9eff2;
            color: #4a0b1c;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">
        <h1><i class="fas fa-chart-bar" style="margin-right:10px;opacity:.8"></i>Estudio de Mercado</h1>
    </div>

    <!-- BREADCRUMB -->
    <nav>
        <div class="breadcrumb">
            <a href="<?= '/' ?>"><i class="fas fa-home"></i> Inicio</a>
            <span class="breadcrumb-separator">/</span>
            <a href="<?= '../../procesosInternos/procesos' ?>">Portal Procesos</a>
            <span class="breadcrumb-separator">/</span>
            <span>Estudio de Mercado</span>
        </div>
    </nav>

    <!-- CARD PRINCIPAL -->
    <div class="card">

        <!-- DATOS GENERALES -->
        <table class="tabla-info">
            <tr>
                <td><i class="fas fa-building" style="margin-right:6px;color:var(--vino-medio)"></i>ÁREA USUARIA / SOLICITANTE</td>
                <td id="areaTexto"></td>
            </tr>
            <tr>
                <td><i class="fas fa-calendar-alt" style="margin-right:6px;color:var(--vino-medio)"></i>FECHA</td>
                <td id="fechaTexto"></td>
            </tr>
            <tr>
                <td><i class="fas fa-tag" style="margin-right:6px;color:var(--vino-medio)"></i>PARTIDA PRESUPUESTAL</td>
                <td id="nombreEstudioTexto"></td>
            </tr>
        </table>

        <!-- TABLA ESTUDIO (thead y tfoot son generados por JS) -->
        <table id="tablaEstudio">
            <thead>
                <!-- JS reemplaza esto dinámicamente -->
                <tr><th colspan="20" style="text-align:center">Cargando…</th></tr>
            </thead>
            <tbody id="tbodyEstudio">
                <!-- JS inserta filas aquí -->
            </tbody>
        </table>

    </div><!-- /card -->

</div><!-- /container -->

<!-- jQuery primero, luego tu script (ruta relativa, sin localhost) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="../../public/js/admin/verEstudioMercadoFinalizado.js"></script>

<script>
    // Obtén el id del estudio de la URL o de donde lo pases (ejemplo: query param)
    // Ajusta según cómo recibas el id en tu vista de CI4
    const urlParams = new URLSearchParams(window.location.search);
    const estudioId = urlParams.get('id') ?? <?= $id ?? 'null' ?>;

    if (estudioId) {
        cargarEstudio(estudioId);
    } else {
        console.error("No se recibió id de estudio.");
    }
</script>

</body>
</html>