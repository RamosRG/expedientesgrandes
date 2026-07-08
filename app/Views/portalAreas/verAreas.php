<!DOCTYPE html> 
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios | Sistema de Gestión</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    
    <!-- W3.CSS para el modal -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <link rel="stylesheet" href="../public/css/verUsuarios.css">
    
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

        /* Estilos del modal para que combine con tu diseño */
        .w3-modal-content {
            border-radius: 12px;
            overflow: hidden;
        }

        .w3-button:hover {
            opacity: 0.8;
        }

        .modal-header-custom {
            background: linear-gradient(135deg, var(--vino-oscuro) 0%, var(--vino-medio) 100%);
            color: white;
            padding: 20px;
        }

        .modal-header-custom h2 {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }

        .modal-body-custom {
            padding: 20px;
        }

        .modal-footer-custom {
            padding: 16px 20px;
            background: #f8f5f0;
            border-top: 1px solid var(--vino-palido);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-cancelar {
            background-color: #6c757d;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-cancelar:hover {
            background-color: #5a6268;
        }

        .btn-guardar {
            background: linear-gradient(135deg, var(--vino-medio) 0%, var(--vino-oscuro) 100%);
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-guardar:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3);
        }

        .form-group-modal {
            margin-bottom: 20px;
        }

        .form-group-modal label {
            display: block;
            font-weight: 500;
            color: var(--texto-oscuro);
            margin-bottom: 8px;
        }

        .form-group-modal input,
        .form-group-modal select {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid #e1d5d8;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.2s ease;
        }

        .form-group-modal input:focus,
        .form-group-modal select:focus {
            border-color: var(--vino-medio);
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
            outline: none;
        }

        .required {
            color: #dc3545;
        }

        .section-title {
            font-weight: 600;
            color: var(--vino-oscuro);
            margin-bottom: 15px;
        }

        .section-title hr {
            border: none;
            border-top: 2px solid var(--vino-palido);
            margin: 8px 0;
        }
    </style>
</head>

<body>
    <div class="portal-container">
        <header class="portal-header">
            <div class="portal-title">SISTEMA DE GESTIÓN</div>
        </header>

        <nav class="portal-nav">
            <div class="breadcrumb">
                <a href="<?= site_url('/') ?>">Inicio</a>
                <span class="breadcrumb-separator">/</span>
                <a href="<?= '../portalProcesos/procesos' ?>">Portal procesos</a>
                <span class="breadcrumb-separator">/</span>
                <span>Usuarios</span>
            </div>
            <!-- Botón modificado para abrir el modal en lugar de un enlace -->
            <button type="button" class="btn btn-primary" onclick="abrirModalArea()">
                <i class="fas fa-user-plus"></i> Nueva Area
            </button>
            <a href="<?= '../portalProcesos/procesos' ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </nav>

        <main class="portal-content">
            <div class="content-container" style="max-width: 1300px;">
                <div class="form-card">
                    <div class="form-header">
                        <h2><i class="fas fa-users"></i> Lista de Areas y Coordinadores</h2>
                    </div>
                    <div class="form-body">
                        <!-- Estadísticas -->
                        <div class="stats-card">
                            <div class="stat-item">
                                <div class="stat-number" id="totalUsuarios">0</div>
                                <div class="stat-label">Total Areas</div>
                            </div>
                           
                        </div>

                        <!-- Tabla de areas con DataTables -->
                        <div class="table-container">
                            <table id="tablaUsuarios" class="display responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre Completo</th>
                                        <th>Correo Electrónico</th>
                                        <th>Rol</th>
                                        <th>Area</th>
                                        <th>Teléfono</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaUsuariosBody">
                                    <!-- Los datos se cargarán vía AJAX -->
                                </tbody>
                            </table>
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

<!-- MODAL PARA NUEVA ÁREA -->
<div id="modalNuevaArea" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        
        <!-- Cabecera del Modal -->
        <div class="modal-header-custom">
            <span onclick="cerrarModalArea()" 
                  class="w3-button w3-display-topright" 
                  style="color: white; font-size: 24px;">
                &times;
            </span>
            <h2><i class="fas fa-building"></i> Nueva Área</h2>
            <p style="margin: 5px 0 0 0; opacity: 0.8; font-size: 0.9rem;">
                Complete los datos del área y del coordinador
            </p>
        </div>

        <!-- Cuerpo del Modal -->
        <div class="modal-body-custom">
            <form id="formNuevaArea">
                <!-- Sección: Datos del Área -->
                <div class="section-title">
                    <i class="fas fa-building"></i> Datos del Área
                    <hr>
                </div>
                
                <div class="form-group-modal">
                    <label for="nombreArea">Nombre del Área <span class="required">*</span></label>
                    <input type="text" 
                           id="nombreArea" 
                           name="nombre_area" 
                           placeholder="Ej. Recursos Humanos" 
                           required>
                </div>
                
                <!-- Sección: Datos del Coordinador -->
                <div class="section-title" style="margin-top: 20px;">
                    <i class="fas fa-user-tie"></i> Datos del Coordinador
                    <hr>
                </div>
                
                <div class="form-group-modal">
                    <label for="nombreCoordinador">Nombre del Coordinador <span class="required">*</span></label>
                    <input type="text" 
                           id="nombreCoordinador" 
                           name="nombre_coordinador" 
                           placeholder="Nombre Completo" 
                           required>
                </div>
                
                <div class="form-group-modal">
                    <label for="apellidoPaterno">Apellido Paterno <span class="required">*</span></label>
                    <input type="text" 
                           id="apellidoPaterno" 
                           name="apellido_paterno" 
                           placeholder="Apellido Paterno" 
                           required>
                </div>
                
                <div class="form-group-modal">
                    <label for="apellidoMaterno">Apellido Materno <span class="required">*</span></label>
                    <input type="text" 
                           id="apellidoMaterno" 
                           name="apellido_materno" 
                           placeholder="Apellido Materno" 
                           required>
                </div>
            </form>
        </div>

        <!-- Footer del Modal -->
        <div class="modal-footer-custom">
            <button type="button" 
                    onclick="cerrarModalArea()" 
                    class="btn-cancelar">
                Cancelar
            </button>
            <button type="button" 
                    onclick="guardarNuevaArea()" 
                    class="btn-guardar">
                <i class="fas fa-save"></i> Guardar Área y Coordinador
            </button>
        </div>
    </div>
</div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    
    <script src="../public/js/verAreas/verAreas.js"></script>
    
    <script>
    // Funciones globales para el modal
    function abrirModalArea() {
        document.getElementById('modalNuevaArea').style.display = 'block';
    }

    function cerrarModalArea() {
        document.getElementById('modalNuevaArea').style.display = 'none';
    }

    function guardarNuevaArea() {
        const form = document.getElementById('formNuevaArea');
        const formData = new FormData(form);
        
        // Validaciones
        const nombreArea = document.getElementById('nombreArea').value.trim();
        const nombreCoord = document.getElementById('nombreCoordinador').value.trim();
        const apellidoPat = document.getElementById('apellidoPaterno').value.trim();
        
        if (!nombreArea) {
            Swal.fire('Error', 'El nombre del área es obligatorio', 'error');
            return;
        }
        
        if (!nombreCoord || !apellidoPat) {
            Swal.fire('Error', 'Nombre y apellido paterno del coordinador son obligatorios', 'error');
            return;
        }
        
        Swal.fire({
            title: 'Guardando...',
            text: 'Por favor espera',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        const url = window.location.origin + '/expedientesGrandes.temascalcingo.gob.mx/areas/crearArea';
        
        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: data.message,
                    timer: 2000
                });
                cerrarModalArea();
                form.reset();
                setTimeout(() => {
                    location.reload();
                }, 1500);
            } else {
                Swal.fire('Error', data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire('Error', 'Ocurrió un error al guardar', 'error');
        });
    }

    // Hacer funciones globales
    window.abrirModalArea = abrirModalArea;
    window.cerrarModalArea = cerrarModalArea;
    window.guardarNuevaArea = guardarNuevaArea;
    </script>

</body>

</html>