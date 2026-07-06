<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario | Sistema de Gestión</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('../../public/css/editarUsuario.css') ?>">
    <style>
        
        .form-section {
            transition: all 0.3s ease;
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            position: relative;
        }
        .form-section h3 {
            margin-top: 0;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--vino-palido);
        }
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }
        .form-group {
            flex: 1;
            min-width: 200px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: var(--texto-oscuro);
        }
        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            transition: border-color 0.2s;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--vino-medio);
            box-shadow: 0 0 0 2px rgba(128, 0, 32, 0.1);
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
        }
        .checkbox-group input {
            width: 18px;
            height: 18px;
        }
        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--vino-palido);
        }
        .btn {
            padding: 10px 24px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Montserrat', sans-serif;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--vino-medio) 0%, var(--vino-oscuro) 100%);
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(128, 0, 32, 0.3);
        }
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background: #5a6268;
        }
        .required {
            color: red;
        }
        .info-message {
            background: #e7f3ff;
            border-left: 4px solid var(--vino-medio);
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
            color: var(--texto-medio);
        }
        .hidden {
            display: none;
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
                <a href="<?= site_url('usuarios/listar') ?>">Usuarios</a>
                <span class="breadcrumb-separator">/</span>
                <span>Editar Usuario</span>
            </div>
            <a href="<?= site_url('usuarios/listar') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </nav>

        <main class="portal-content">
            <div class="content-container">
                <div class="form-card">
                    <div class="form-header">
                        <h2>Editar Usuario: <?= esc($usuario['nombre'] . ' ' . $usuario['apellido_paterno']) ?></h2>
                    </div>

                    <div class="form-body">
                        <div class="info-message" id="infoMessage">
                            <i class="fas fa-info-circle"></i> Rol actual: <strong><?= esc($usuario['nombre_rol']) ?></strong>
                        </div>

                        <form method="POST" id="form-usuario" action="<?= site_url('usuarios/actualizar/' . $usuario['id_usuario']) ?>">
                            <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>">
                            
                            <!-- Selección de Rol -->
                            <div class="form-section">
                                <h3>Rol del Usuario</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="id_rol">Rol <span class="required">*</span></label>
                                        <select class="form-control" id="id_rol" name="id_rol" required>
                                            <option value="1" <?= $usuario['id_rol'] == 1 ? 'selected' : '' ?>>ADMINISTRADOR</option>
                                            <option value="2" <?= $usuario['id_rol'] == 2 ? 'selected' : '' ?>>USUARIO</option>
                                            <option value="3" <?= $usuario['id_rol'] == 3 ? 'selected' : '' ?>>PROVEEDOR</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Datos Personales -->
                            <div id="seccion-datos-personales" class="form-section">
                                <h3>Datos Personales</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="nombre">Nombre <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" 
                                               value="<?= esc($usuario['nombre']) ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido_paterno">Apellido Paterno <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" 
                                               value="<?= esc($usuario['apellido_paterno']) ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="apellido_materno">Apellido Materno</label>
                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" 
                                               value="<?= esc($usuario['apellido_materno'] ?? $usuario['apellidoM'] ?? '') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="correo">Correo Electrónico <span class="required">*</span></label>
                                        <input type="email" class="form-control" id="correo" name="correo" 
                                               value="<?= esc($usuario['correo']) ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <div class="checkbox-group">
                                            <input type="checkbox" id="active" name="active" value="1" 
                                                   <?= $usuario['active'] == 1 ? 'checked' : '' ?>>
                                            <label for="active">Usuario activo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Datos Fiscales (visible para ADMIN y PROVEEDOR) -->
                            <div id="seccion-datos-fiscales" class="form-section">
                                <h3>Datos Fiscales</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="rfc">RFC</label>
                                        <input type="text" class="form-control" id="rfc" name="rfc" 
                                               value="<?= esc($usuario['rfc'] ?? $datos_fisica['rfc'] ?? $datos_moral['rfc'] ?? '') ?>" maxlength="13">
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono_principal">Teléfono Principal</label>
                                        <input type="tel" class="form-control" id="telefono_principal" name="telefono_principal" 
                                               value="<?= esc($usuario['telefono_principal']) ?>">
                                    </div>
                                </div>

                                <!-- Campos exclusivos para PROVEEDOR -->
                                <div id="campos-proveedor">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="curp">CURP</label>
                                            <input type="text" class="form-control" id="curp" name="curp" 
                                                   value="<?= esc($datos_fisica['curp'] ?? '') ?>" maxlength="18">
                                        </div>
                                    </div>
                                    
                                    <!-- Tipo de Persona (campo corregido) -->
                                    <div class="form-group">
                                        <label for="tipo_persona">Tipo de Persona <span class="required">*</span></label>
                                        <select class="form-control" id="tipo_persona" name="tipo_persona" required>
                                            <option value="">Seleccionar tipo</option>
                                            <option value="1" <?= ($usuario['fk_tipo_persona'] ?? '') == 1 ? 'selected' : '' ?>>FÍSICA</option>
                                            <option value="2" <?= ($usuario['fk_tipo_persona'] ?? '') == 2 ? 'selected' : '' ?>>MORAL</option>
                                        </select>
                                    </div>

                                    <!-- Datos de Persona Física (se muestran cuando tipo_persona = 1) -->
                                    <div id="datos-fisica" class="hidden">
                                        <h4>Datos de Persona Física</h4>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="num_credencial_votar">Número de Credencial para Votar</label>
                                                <input type="text" class="form-control" id="num_credencial_votar" name="num_credencial_votar" 
                                                       value="<?= esc($datos_fisica['num_credencial_votar'] ?? '') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="num_acta_nacimiento">Número de Acta de Nacimiento</label>
                                                <input type="text" class="form-control" id="num_acta_nacimiento" name="num_acta_nacimiento" 
                                                       value="<?= esc($datos_fisica['num_acta_nacimiento'] ?? '') ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="num_libro">Número de Libro</label>
                                                <input type="text" class="form-control" id="num_libro" name="num_libro" 
                                                       value="<?= esc($datos_fisica['num_libro'] ?? '') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="num_oficilia">Número de Oficialía</label>
                                                <input type="text" class="form-control" id="num_oficilia" name="num_oficilia" 
                                                       value="<?= esc($datos_fisica['num_oficilia'] ?? '') ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="lugar_nacimiento">Lugar de Nacimiento</label>
                                                <input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" 
                                                       value="<?= esc($datos_fisica['lugar_nacimiento'] ?? '') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="fecha_nacimiento_registro">Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" id="fecha_nacimiento_registro" name="fecha_nacimiento_registro" 
                                                       value="<?= esc($datos_fisica['fecha_nacimiento_registro'] ?? '') ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Datos de Persona Moral (se muestran cuando tipo_persona = 2) -->
                                    <div id="datos-moral" class="hidden">
                                        <h4>Datos de Persona Moral</h4>
                                        <div class="form-group">
                                            <label for="razon_social">Razón Social</label>
                                            <input type="text" class="form-control" id="razon_social" name="razon_social" 
                                                   value="<?= esc($datos_moral['razon_social'] ?? '') ?>">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="representante_legal">Representante Legal</label>
                                                <input type="text" class="form-control" id="representante_legal" name="representante_legal" 
                                                       value="<?= esc($datos_moral['representante_legal'] ?? '') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="num_credencial_representante">Número Credencial Representante</label>
                                                <input type="text" class="form-control" id="num_credencial_representante" name="num_credencial_representante" 
                                                       value="<?= esc($datos_moral['num_credencial_representante'] ?? '') ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="giro_economico">Giro Económico</label>
                                                <input type="text" class="form-control" id="giro_economico" name="giro_economico" 
                                                       value="<?= esc($datos_moral['giro_economico'] ?? '') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="registro_publico">Registro Público</label>
                                                <input type="text" class="form-control" id="registro_publico" name="registro_publico" 
                                                       value="<?= esc($datos_moral['registro_publico'] ?? '') ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="instrumento_re">Instrumento RE</label>
                                                <input type="text" class="form-control" id="instrumento_re" name="instrumento_re" 
                                                       value="<?= esc($datos_moral['instrumento_re'] ?? '') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="volumen_re">Volumen RE</label>
                                                <input type="text" class="form-control" id="volumen_re" name="volumen_re" 
                                                       value="<?= esc($datos_moral['volumen_re'] ?? '') ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="folio_re">Folio RE</label>
                                                <input type="text" class="form-control" id="folio_re" name="folio_re" 
                                                       value="<?= esc($datos_moral['folio_re'] ?? '') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="notario">Notario</label>
                                                <input type="text" class="form-control" id="notario" name="notario" 
                                                       value="<?= esc($datos_moral['notario'] ?? '') ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="titular">Titular</label>
                                                <input type="text" class="form-control" id="titular" name="titular" 
                                                       value="<?= esc($datos_moral['titular'] ?? '') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nci">NCI</label>
                                                <input type="text" class="form-control" id="nci" name="nci" 
                                                       value="<?= esc($datos_moral['nci'] ?? '') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dirección (visible para ADMIN y PROVEEDOR) -->
                            <div id="seccion-direccion" class="form-section">
                                <h3>Dirección</h3>
                                <div class="form-group">
                                    <label for="calle_numero">Calle y Número</label>
                                    <input type="text" class="form-control" id="calle_numero" name="calle_numero" 
                                           value="<?= esc($usuario['calle_numero']) ?>">
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="colonia">Colonia</label>
                                        <input type="text" class="form-control" id="colonia" name="colonia" 
                                               value="<?= esc($usuario['colonia']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" 
                                               value="<?= esc($usuario['ciudad']) ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <input type="text" class="form-control" id="estado" name="estado" 
                                               value="<?= esc($usuario['estado']) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="codigo_postal">Código Postal</label>
                                        <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" 
                                               value="<?= esc($usuario['codigo_postal']) ?>" maxlength="5">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pais">País</label>
                                    <input type="text" class="form-control" id="pais" name="pais" 
                                           value="<?= esc($usuario['pais']) ?>">
                                </div>
                            </div>

                            <!-- Sección para cambiar contraseña -->
                            <div class="form-section">
                                <h3>Cambiar Contraseña</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="password">Nueva Contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Dejar en blanco para no cambiar">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirmar Contraseña</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar nueva contraseña">
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary" id="btnGuardar">
                                    <i class="fas fa-save"></i> Actualizar Usuario
                                </button>
                                <a href="<?= site_url('/usuarios/listar') ?>" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <footer class="portal-footer">
            <p>Sistema de Gestión de Procesos &copy; <?= date('Y') ?> - Todos los derechos reservados</p>
            <p><a href="http://www.temascalcingo.gob.mx" class="footer-link">www.temascalcingo.gob.mx</a></p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mostrar/ocultar campos según tipo de persona
            function toggleCamposPorTipoPersona() {
                var tipoPersona = $('#tipo_persona').val();
                if (tipoPersona == '1') {
                    $('#datos-fisica').removeClass('hidden');
                    $('#datos-moral').addClass('hidden');
                } else if (tipoPersona == '2') {
                    $('#datos-fisica').addClass('hidden');
                    $('#datos-moral').removeClass('hidden');
                } else {
                    $('#datos-fisica').addClass('hidden');
                    $('#datos-moral').addClass('hidden');
                }
            }
            
            $('#tipo_persona').change(toggleCamposPorTipoPersona);
            toggleCamposPorTipoPersona();
            
            // Envío del formulario
            $('#form-usuario').on('submit', function(e) {
                e.preventDefault();
                
                var form = $(this);
                var url = form.attr('action');
                var data = form.serialize();
                
                // Validar contraseñas si se ingresó una
                var password = $('#password').val();
                var confirmPassword = $('#confirm_password').val();
                
                if (password !== '' && password !== confirmPassword) {
                    Swal.fire('Error', 'Las contraseñas no coinciden', 'error');
                    return false;
                }
                
                if (password !== '' && password.length < 6) {
                    Swal.fire('Error', 'La contraseña debe tener al menos 6 caracteres', 'error');
                    return false;
                }
                
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: '¡Éxito!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Aceptar'
                            }).then(function() {
                                if (response.redirect) {
                                    window.location.href = response.redirect;
                                }
                            });
                        } else {
                            Swal.fire('Error', response.message, 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Ocurrió un error al procesar la solicitud', 'error');
                    }
                });
            });
        });
    </script>
</body>
</html>