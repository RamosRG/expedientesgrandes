<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../public/css/styles.css">
    <style>
        .disabled-section {
            opacity: 0.6;
            pointer-events: none;
            position: relative;
        }

        .disabled-section::after {
            content: "⚠️ No aplica para este rol";
            position: absolute;
            top: 10px;
            right: 10px;
            background: #f8d7da;
            color: #721c24;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .form-section {
            transition: all 0.3s ease;
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
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
            box-sizing: border-box;
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
            text-decoration: none;
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
                <a href="<?= site_url('usuarios') ?>">Usuarios</a>
                <span class="breadcrumb-separator">/</span>
                <span>Crear Usuario</span>
            </div>
            <a href="<?= '../portalProcesos/procesos' ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </nav>

        <main class="portal-content">
            <div class="content-container">
                <div class="form-card">
                    <div class="form-header">
                        <h2>Crear Nuevo Usuario</h2>
                    </div>

                    <div class="form-body">
                        <div class="info-message" id="infoMessage">
                            <i class="fas fa-info-circle"></i> Selecciona un rol para mostrar los campos correspondientes
                        </div>

                        <form method="POST" id="form-usuario">

                            <!-- ===========================
                                 SELECTOR DE ROL
                            ============================ -->
                            <h3 style="color: var(--vino-oscuro); margin-bottom: 20px;">
                                Selecciona primeramente el tipo de Rol
                            </h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="id_rol">Rol <span class="required">*</span></label>
                                    <select class="form-control" id="id_rol" name="id_rol" required>
                                        <option value="">SELECCIONA UNA OPCION...</option>
                                        <option value="1">ADMINISTRADOR</option>
                                        <option value="2">USUARIO</option>
                                        <option value="3">PROVEEDOR</option>
                                    </select>
                                </div>
                            </div>

                            <!-- ===========================
                                 DATOS PERSONALES
                            ============================ -->
                            <div id="seccion-datos-personales" class="form-section">
                                <h3 style="color: var(--vino-oscuro);">Datos Personales</h3>

                                <div class="form-row">
                                    <div class="form-group" id="campo-nombre">
                                        <label for="nombre">Nombre <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            value="<?= old('nombre') ?>" placeholder="Ingrese el nombre">
                                    </div>

                                    <div class="form-group" id="campo-apellido_paterno">
                                        <label for="apellido_paterno">
                                            Apellido Paterno
                                            <span class="required" id="req-apellido_paterno">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="apellido_paterno"
                                            name="apellido_paterno" value="<?= old('apellido_paterno') ?>"
                                            placeholder="Ingrese el apellido paterno">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" id="campo-apellido_materno">
                                        <label for="apellido_materno">Apellido Materno</label>
                                        <input type="text" class="form-control" id="apellido_materno"
                                            name="apellido_materno" value="<?= old('apellido_materno') ?>"
                                            placeholder="Ingrese el apellido materno (opcional)">
                                    </div>

                                    <div class="form-group">
                                        <label for="correo">Correo Electrónico <span class="required">*</span></label>
                                        <input type="email" class="form-control" id="correo" name="correo"
                                            value="<?= old('correo') ?>" placeholder="ejemplo@correo.com">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="password">Contraseña <span class="required">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Mínimo 6 caracteres">
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm_password">Confirmar Contraseña <span class="required">*</span></label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password" placeholder="Repita la contraseña">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <div class="checkbox-group">
                                            <input type="checkbox" id="active" name="active" value="1"
                                                <?= old('active') ? 'checked' : '' ?>>
                                            <label for="active">Usuario activo</label>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /seccion-datos-personales -->

                            <!-- ===========================
                                 DATOS FISCALES (CONDICIONAL)
                            ============================ -->
                            <div id="seccion-datos-fiscales" class="form-section" style="display:none;">
                                <h3 style="color: var(--vino-oscuro);">Datos Fiscales</h3>

                                <!-- Teléfono (visible para Admin y Proveedor) -->
                                <div class="form-row">
                                    <div class="form-group" id="campo-telefono-principal">
                                        <label for="telefono_principal">
                                            Teléfono Principal
                                            <span class="required" id="req-telefono_principal"></span>
                                        </label>
                                        <input type="text" class="form-control" id="telefono_principal"
                                            name="telefono_principal" value="<?= old('telefono_principal') ?>"
                                            placeholder="Ej: 7221234567" maxlength="15">
                                    </div>
                                </div>

                                <!-- Campos exclusivos de PROVEEDOR -->
                                <div id="campos-proveedor" style="display:none;">

                                    <!-- Selector tipo persona -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="tipo_persona">
                                                Tipo de Persona
                                                <span class="required" id="req-tipo_persona"></span>
                                            </label>
                                            <select class="form-control" id="tipo_persona" name="tipo_persona">
                                                <option value="">Seleccionar tipo</option>
                                                <option value="1" <?= old('tipo_persona') == '1' ? 'selected' : '' ?>>FÍSICA</option>
                                                <option value="2" <?= old('tipo_persona') == '2' ? 'selected' : '' ?>>MORAL</option>
                                            </select>
                                        </div>

                                        <!-- RFC -->
                                        <div class="form-group" id="campo-rfc">
                                            <label for="rfc">
                                                RFC
                                                <span class="required" id="req-rfc"></span>
                                            </label>
                                            <input type="text" class="form-control" id="rfc" name="rfc"
                                                value="<?= old('rfc') ?>" placeholder="Ej: XAXX010101000"
                                                maxlength="13">
                                        </div>
                                    </div>

                                    <!-- ===========================
                                         PERSONA FÍSICA (CORREGIDO Y COMPLETADO)
                                    ============================ -->
                                    <div id="campos-persona-fisica" style="display:none;">
                                        <h4 style="color: var(--vino-oscuro); margin-bottom: 15px;">
                                            Datos Persona Física
                                        </h4>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="curp">
                                                    CURP
                                                    <span class="required" id="req-curp"></span>
                                                </label>
                                                <input type="text" class="form-control" id="curp" name="curp"
                                                    value="<?= old('curp') ?>" maxlength="18"
                                                    placeholder="Ej: XAXX010101HDFXXX00">
                                            </div>

                                            <div class="form-group">
                                                <label for="num_credencial_votar">Número Credencial de Elector</label>
                                                <input type="text" class="form-control" id="num_credencial_votar"
                                                    name="num_credencial_votar"
                                                    value="<?= old('num_credencial_votar') ?>">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="num_acta_nacimiento">Número Acta de Nacimiento</label>
                                                <input type="text" class="form-control" id="num_acta_nacimiento"
                                                    name="num_acta_nacimiento"
                                                    value="<?= old('num_acta_nacimiento') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="num_libro">Número Libro</label>
                                                <input type="text" class="form-control" id="num_libro"
                                                    name="num_libro" value="<?= old('num_libro') ?>">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="num_oficilia">Número Oficialía</label>
                                                <input type="text" class="form-control" id="num_oficialia"
                                                    name="num_oficialia" value="<?= old('num_oficialia') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="lugar_nacimiento">Lugar de Nacimiento</label>
                                                <input type="text" class="form-control" id="lugar_nacimiento"
                                                    name="lugar_nacimiento"
                                                    value="<?= old('lugar_nacimiento') ?>">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="fecha_nacimiento_registro">Fecha Nacimiento Registro</label>
                                                <input type="date" class="form-control"
                                                    id="fecha_nacimiento_registro"
                                                    name="fecha_nacimiento_registro"
                                                    value="<?= old('fecha_nacimiento_registro') ?>">
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <label for="lugar_nacimiento">NCI Fisica</label>
                                                <input type="text" class="form-control" id="nci_fisica"
                                                    name="nci_fisica"
                                                    value="<?= old('nci_fisica') ?>">
                                            </div>
                                        </div>

                                    </div><!-- /campos-persona-fisica -->

                                    <!-- ===========================
                                         PERSONA MORAL (COMPLETADO - AGREGADOS CAMPOS FALTANTES)
                                    ============================ -->
                                    <div id="campos-persona-moral" style="display:none;">
                                        <h4 style="color: var(--vino-oscuro); margin-bottom: 15px;">
                                            Datos Persona Moral
                                        </h4>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="razon_social">
                                                    Razón Social
                                                    <span class="required" id="req-razon_social"></span>
                                                </label>
                                                <input type="text" class="form-control" id="razon_social"
                                                    name="razon_social" value="<?= old('razon_social') ?>">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="representante_legal">Representante Legal</label>
                                                <input type="text" class="form-control" id="representante_legal"
                                                    name="representante_legal"
                                                    value="<?= old('representante_legal') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="num_credencial_representante">Número Credencial Representante</label>
                                                <input type="text" class="form-control" id="num_credencial_representante"
                                                    name="num_credencial_representante"
                                                    value="<?= old('num_credencial_representante') ?>">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="giro_economico">Giro Económico</label>
                                                <input type="text" class="form-control" id="giro_economico"
                                                    name="giro_economico" value="<?= old('giro_economico') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="registro_publico">Registro Público</label>
                                                <input type="text" class="form-control" id="registro_publico"
                                                    name="registro_publico"
                                                    value="<?= old('registro_publico') ?>">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="instrumento_re">Instrumento RE</label>
                                                <input type="text" class="form-control" id="instrumento_re"
                                                    name="instrumento_re" value="<?= old('instrumento_re') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="volumen_re">Volumen RE</label>
                                                <input type="text" class="form-control" id="volumen_re"
                                                    name="volumen_re" value="<?= old('volumen_re') ?>">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="folio_re">Folio RE</label>
                                                <input type="text" class="form-control" id="folio_re"
                                                    name="folio_re" value="<?= old('folio_re') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="notario">Notario</label>
                                                <input type="text" class="form-control" id="notario"
                                                    name="notario" value="<?= old('notario') ?>">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="titular">Titular</label>
                                                <input type="text" class="form-control" id="titular"
                                                    name="titular" value="<?= old('titular') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="nci">NCI</label>
                                                <input type="text" class="form-control" id="nci"
                                                    name="nci" value="<?= old('nci') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="num_acta_cons">Número Acta Constitucional</label>
                                                <input type="text" class="form-control" id="num_acta_cons"
                                                    name="num_acta_cons" value="<?= old('num_acta_cons') ?>">
                                            </div>
                                        </div>
                                    </div><!-- /campos-persona-moral -->

                                </div><!-- /campos-proveedor -->

                            </div><!-- /seccion-datos-fiscales -->

                            <!-- ===========================
                                 DIRECCIÓN
                            ============================ -->
                            <div id="seccion-direccion" class="form-section" style="display:none;">
                                <h3 style="color: var(--vino-oscuro);">Dirección</h3>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="calle_numero">Calle y Número</label>
                                        <input type="text" class="form-control" id="calle_numero" name="calle_numero"
                                            value="<?= old('calle_numero') ?>" placeholder="Ej: Av. Principal #123">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="colonia">Colonia</label>
                                        <input type="text" class="form-control" id="colonia"
                                            name="colonia" value="<?= old('colonia') ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                        <input type="text" class="form-control" id="ciudad" name="ciudad"
                                            value="<?= old('ciudad') ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <input type="text" class="form-control" id="estado" name="estado"
                                            value="<?= old('estado') ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="codigo_postal">Código Postal</label>
                                        <input type="text" class="form-control" id="codigo_postal" name="codigo_postal"
                                            value="<?= old('codigo_postal') ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="pais">País</label>
                                        <input type="text" class="form-control" id="pais"
                                            name="pais" value="<?= old('pais') ?>">
                                    </div>
                                </div>
                            </div><!-- /seccion-direccion -->

                            <!-- ===========================
                                 ACCIONES
                            ============================ -->
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary" id="btnGuardar">
                                    <i class="fas fa-save"></i> Guardar Usuario
                                </button>
                                <a href="<?= '../portalProcesos/procesos' ?>" class="btn btn-secondary">
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
            <p>
                <a href="http://www.temascalcingo.gob.mx" class="footer-link">www.temascalcingo.gob.mx</a>
            </p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../public/js/CrearUsuario.js"></script>
</body>

</html>