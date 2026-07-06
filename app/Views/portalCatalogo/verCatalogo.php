<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Catálogo | Sistema de Gestión</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <!-- W3.CSS para el modal (opcional pero ayuda con estilos básicos) -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="../public/css/verCatalogo.css">

    <style>
        /* Estilos específicos para DataTables */
        .dataTables_wrapper {
            font-family: 'Montserrat', sans-serif;
        }

        .dataTables_length select,
        .dataTables_filter input {
            padding: 8px 12px;
            border: 2px solid #e1d5d8;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            margin: 0 5px;
        }

        .dataTables_filter input:focus {
            outline: none;
            border-color: var(--vino-medio);
        }

        .dataTables_paginate .paginate_button {
            padding: 6px 12px;
            margin: 0 3px;
            border-radius: 6px;
        }

        .dataTables_paginate .paginate_button.current {
            background: linear-gradient(135deg, var(--vino-medio) 0%, var(--vino-oscuro) 100%);
            color: white !important;
            border: none;
        }

        .dataTables_paginate .paginate_button:hover {
            background: var(--vino-palido);
            border-color: var(--vino-medio);
        }

        /* Badges para la tabla */
        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-align: center;
            white-space: nowrap;
        }

        .badge-success {
            background-color: #28a745;
            color: white;
        }

        .badge-danger {
            background-color: #dc3545;
            color: white;
        }

        .badge-admin {
            background: linear-gradient(135deg, var(--vino-oscuro) 0%, var(--vino-medio) 100%);
            color: white;
        }

        .badge-proveedor {
            background: linear-gradient(135deg, var(--oro-oscuro) 0%, var(--oro) 100%);
            color: var(--texto-oscuro);
        }

        .badge-usuario {
            background-color: #6c757d;
            color: white;
        }

        /* Botones de acción */
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .btn-icon {
            padding: 6px 12px;
            font-size: 0.8rem;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-view {
            background-color: var(--vino-medio);
            color: white;
        }

        .btn-view:hover {
            background-color: var(--vino-oscuro);
        }

        .btn-edit {
            background-color: #ffc107;
            color: var(--texto-oscuro);
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* Estadísticas */
        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            box-shadow: 0 2px 8px var(--sombra-suave);
            border: 1px solid var(--vino-palido);
        }

        .stat-item {
            flex: 1;
            min-width: 120px;
            text-align: center;
            padding: 15px;
            background: linear-gradient(135deg, var(--vino-palido) 0%, #fff 100%);
            border-radius: 12px;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--vino-oscuro);
            font-family: 'Playfair Display', serif;
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--texto-medio);
            margin-top: 8px;
        }

        /* Botón de exportar */
        .dt-buttons {
            margin-bottom: 15px;
        }

        .dt-button {
            padding: 8px 16px;
            margin-right: 8px;
            background: var(--vino-medio);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .dt-button:hover {
            background: var(--vino-oscuro);
        }

        /* Header y navegación estilo portal */
        .portal-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .portal-header {
            background: linear-gradient(135deg, var(--vino-oscuro) 0%, var(--vino-medio) 100%);
            color: white;
            padding: 20px 30px;
            text-align: center;
        }

        .portal-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .portal-nav {
            background: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            border-bottom: 3px solid var(--vino-medio);
            box-shadow: 0 2px 8px var(--sombra-suave);
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: var(--vino-medio);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .breadcrumb a:hover {
            color: var(--vino-oscuro);
        }

        .breadcrumb-separator {
            color: var(--texto-medio);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--vino-medio) 0%, var(--vino-oscuro) 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3);
            color: white;
        }

        .portal-content {
            flex: 1;
            padding: 30px;
            background: #f8f5f0;
        }

        .portal-footer {
            background: var(--vino-oscuro);
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 0.85rem;
        }

        .footer-link {
            color: var(--oro);
            text-decoration: none;
        }

        .footer-link:hover {
            text-decoration: underline;
            color: var(--oro-claro);
        }

        /* Estilos para tarjetas */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px var(--sombra-suave);
            margin-bottom: 20px;
        }

        .card-header {
            background: linear-gradient(135deg, var(--vino-palido) 0%, #fff 100%);
            border-bottom: 2px solid var(--vino-medio);
            padding: 15px 20px;
            border-radius: 12px 12px 0 0 !important;
        }

        .card-header h4 {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            color: var(--vino-oscuro);
        }

        .card-body {
            padding: 20px;
        }

        .form-label {
            font-weight: 500;
            color: var(--texto-oscuro);
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border: 2px solid #e1d5d8;
            border-radius: 8px;
            padding: 10px 12px;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.2s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--vino-medio);
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
            outline: none;
        }

        .table-responsive {
            overflow-x: auto;
        }

        /* Botones de acción en tabla */
        .btn-sm {
            padding: 5px 10px;
            font-size: 0.75rem;
        }

        /* Ajustes responsivos */

        @media (max-width: 768px) {
            .portal-nav {
                flex-direction: column;
                text-align: center;
            }

            .portal-content {
                padding: 15px;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Estilos adicionales para el modal para que combine con tu diseño */
        .w3-modal-content {
            border-radius: 12px;
            overflow: hidden;
        }

        .w3-button:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="portal-container">
        <header class="portal-header">
            <div class="portal-title">CATÁLOGO DE PRODUCTOS</div>
        </header>

        <nav class="portal-nav">
            <div class="breadcrumb">
                <a href="<?= site_url('/') ?>">Inicio</a>
                <span class="breadcrumb-separator">/</span>
                <a href="<?= '../portalProcesos/procesos' ?>">Portal procesos</a>
                <span class="breadcrumb-separator">/</span>
                <span>Catálogo de Productos</span>
            </div>
            <!-- Botón modificado para abrir el modal -->
            <button type="button" class="btn btn-primary"
                onclick="document.getElementById('id01').style.display='block'">
                <i class="fas fa-book"></i> Agregar Nuevo Producto
            </button>
        </nav>

        <main class="portal-content">
            <div class="container-fluid">
                <div class="row">
                    <!-- FORMULARIO -->
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4><i class="fas fa-box"></i> Listado de Productos</h4>
                            </div>
                            <div class="card-body">
                                <form id="formProducto">
                                    <input type="hidden" id="id_descripcion_catalogo" name="id_descripcion_catalogo">

                                    <div class="mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-folder"></i> Elige un Catálogo
                                        </label>
                                        <select class="form-control" id="catalogo" name="catalogo" required>
                                            <option value="">Seleccione un catálogo</option>
                                        </select>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- TABLA -->
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4><i class="fas fa-list"></i> Listado de Productos</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablaProductos" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descripción</th>
                                            <th>Unidad Medida</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>

    <footer class="portal-footer">
        <p>Sistema de Gestión de Procesos &copy; <?= date('Y') ?> - Todos los derechos reservados</p>
        <p><a href="http://www.temascalcingo.gob.mx" class="footer-link">www.temascalcingo.gob.mx</a></p>
    </footer>
    </div>

<!-- MODAL DE REGISTRO DE PRODUCTO -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

        <!-- TITULO -->
        <div class="w3-container" style="background-color: #800020; color: white;">
            <span
                onclick="document.getElementById('id01').style.display='none'"
                class="w3-button w3-display-topright"
                style="color: white;">
                &times;
            </span>
            <h2>Registrar Nuevo Producto</h2>
        </div>

        <form id="formCrearProductoNuevo">
            <div class="w3-section" style="padding:16px;">
                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                    <div style="flex:1;">
                        <label><b>Elige un Catálogo</b></label>
                        <select
                            class="w3-input w3-border"
                            id="catalogoModal"
                            name="fk_catalogo" 
                            required>
                            <option value="">
                                Seleccione un catálogo
                            </option>
                        </select>
                    </div>

                    <div style="flex:1;">
                        <label><b>Nombre Producto</b></label>
                        <input
                            class="w3-input w3-border"
                            type="text"
                            name="descripcion"
                            id="descripcion"
                            placeholder="Nombre del producto"
                            required>
                    </div>

                    <div style="flex:1;">
                        <label><b>Unidad de Medida</b></label>
                        <input
                            class="w3-input w3-border"
                            type="text"
                            name="unidad_medida"
                            id="unidad_medida"
                            placeholder="Ej. Pieza, Kg, Litro"
                            required>
                    </div>
                </div>

                <div style="margin-top:20px; display:flex; gap:10px; justify-content:flex-end;">
                    <button
                        type="button"
                        onclick="document.getElementById('id01').style.display='none'"
                        style="background-color:#6c757d; color:white; padding:8px 16px; border:none; border-radius:6px;">
                        Cancelar
                    </button>
                    <button
                        type="submit"
                        style="background:linear-gradient(135deg,#800020,#5a0015); color:white; padding:8px 16px; border:none; border-radius:6px;">
                        Guardar Producto
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables adicionales para exportación -->
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script src="<?= base_url('../public/js/verCatalogo/verCatalogo.js') ?>"></script>
</body>

</html>