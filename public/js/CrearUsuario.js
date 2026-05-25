// Archivo: js/CrearUsuario.js

/**
 * Configuración de campos por rol
 */
const configuracionRoles = {
    1: { // ADMINISTRADOR
        nombre: 'ADMINISTRADOR',
        camposPersonales: {
            nombre:            { required: true,  visible: true },
            apellido_paterno:  { required: true,  visible: true },
            apellido_materno:  { required: false, visible: true },
            correo:            { required: true,  visible: true },
            password:          { required: true,  visible: true },
            confirm_password:  { required: true,  visible: true },
            active:            { required: false, visible: true }
        },
        datosFiscales: {
            visible: true,
            campos: {
                telefono_principal: { required: false, visible: true },
                rfc:                { required: false, visible: false },
                curp:               { required: false, visible: false },
                nombre_razon_social:{ required: false, visible: false },
                tipo_persona:       { required: false, visible: false }
            }
        },
        direccion: { visible: false }
    },

    2: { // USUARIO
        nombre: 'USUARIO',
        camposPersonales: {
            nombre:            { required: true,  visible: true },
            apellido_paterno:  { required: true,  visible: true },
            apellido_materno:  { required: false, visible: true },
            correo:            { required: true,  visible: true },
            password:          { required: true,  visible: true },
            confirm_password:  { required: true,  visible: true },
            active:            { required: false, visible: true }
        },
        datosFiscales: {
            visible: false,
            campos: {}
        },
        direccion: { visible: false }
    },

    3: { // PROVEEDOR
        nombre: 'PROVEEDOR',
        camposPersonales: {
            nombre:            { required: true, visible: true },
            apellido_paterno:  { required: true, visible: true },
            apellido_materno:  { required: false, visible: true },
            correo:            { required: true, visible: true },
            password:          { required: true, visible: true },
            confirm_password:  { required: true, visible: true },
            active:            { required: false, visible: true }
        },
        datosFiscales: {
            visible: true,
            campos: {
                telefono_principal: { required: true, visible: true },
                rfc:                { required: true, visible: true },
                tipo_persona:       { required: true, visible: true }
            }
        },
        direccion: { visible: true }
    }
};

/* ============================================================
   FUNCIÓN PRINCIPAL — se llama cada vez que cambia el rol
   ============================================================ */
function actualizarCamposPorRol() {
    const rolSelect        = document.getElementById('id_rol');
    const rolSeleccionado  = rolSelect ? parseInt(rolSelect.value) : null;

    if (!rolSeleccionado || !configuracionRoles[rolSeleccionado]) {
        deshabilitarTodasSecciones();
        mostrarMensajeInfo('Selecciona un rol para continuar');
        return;
    }

    const config = configuracionRoles[rolSeleccionado];
    mostrarMensajeInfo(`Configurando formulario para: ${config.nombre}`);

    configurarCamposPersonales(config.camposPersonales);
    configurarDatosFiscales(config.datosFiscales);
    configurarDireccion(config.direccion);
    actualizarMensajeAyuda(rolSeleccionado);
}

/* ============================================================
   DATOS PERSONALES
   ============================================================ */
function configurarCamposPersonales(campos) {

    // Nombre
    configurarCampoSimple('campo-nombre', 'nombre', campos.nombre);

    // Apellido paterno
    configurarCampoSimple('campo-apellido_paterno', 'apellido_paterno', campos.apellido_paterno);

    // Apellido materno — CORREGIDO: id en HTML es campo-apellido_materno
    configurarCampoSimple('campo-apellido_materno', 'apellido_materno', campos.apellido_materno);

    // Correo
    const inputCorreo = document.getElementById('correo');
    if (inputCorreo) {
        inputCorreo.required = campos.correo.required;
        actualizarRequerido(inputCorreo, campos.correo.required);
    }

    // Contraseña
    const inputPassword = document.getElementById('password');
    if (inputPassword) {
        inputPassword.required = campos.password.required;
        actualizarRequerido(inputPassword, campos.password.required);
    }

    // Confirmar contraseña
    const inputConfirm = document.getElementById('confirm_password');
    if (inputConfirm) {
        inputConfirm.required = campos.confirm_password.required;
        actualizarRequerido(inputConfirm, campos.confirm_password.required);
    }
}

/**
 * Helper para mostrar/ocultar un campo y marcar su requerido
 */
function configurarCampoSimple(idContenedor, idInput, opciones) {
    const contenedor = document.getElementById(idContenedor);
    const input      = document.getElementById(idInput);
    if (!contenedor || !input) return;

    if (opciones.visible) {
        contenedor.style.display = 'block';
        input.required = opciones.required;
        actualizarRequerido(input, opciones.required);
    } else {
        contenedor.style.display = 'none';
        input.required = false;
        actualizarRequerido(input, false);
    }
}

/* ============================================================
   DATOS FISCALES
   ============================================================ */
function configurarDatosFiscales(config) {
    const seccion = document.getElementById('seccion-datos-fiscales');
    if (!seccion) return;

    if (!config.visible) {
        seccion.style.display = 'none';
        return;
    }

    seccion.style.display = 'block';

    const campos = config.campos;

    // Teléfono
    const campoTel   = document.getElementById('campo-telefono-principal');
    const inputTel   = document.getElementById('telefono_principal');
    if (campoTel && inputTel) {
        const cfgTel = campos.telefono_principal || { required: false, visible: false };
        campoTel.style.display = cfgTel.visible ? 'block' : 'none';
        inputTel.required      = cfgTel.required;
        actualizarRequerido(inputTel, cfgTel.required);
    }

    // Campos exclusivos de proveedor (tipo_persona, RFC, física/moral)
    const camposProveedor = document.getElementById('campos-proveedor');
    if (!camposProveedor) return;

    const esProveedor = campos.tipo_persona && campos.tipo_persona.visible;
    camposProveedor.style.display = esProveedor ? 'block' : 'none';

    if (esProveedor) {
        // RFC
        const campoRfc = document.getElementById('campo-rfc');
        const inputRfc = document.getElementById('rfc');
        if (campoRfc && inputRfc) {
            const cfgRfc = campos.rfc || { required: false, visible: false };
            campoRfc.style.display = cfgRfc.visible ? 'block' : 'none';
            inputRfc.required      = cfgRfc.required;
            actualizarRequerido(inputRfc, cfgRfc.required);
        }

        // Tipo persona
        const selectTipo = document.getElementById('tipo_persona');
        if (selectTipo) {
            selectTipo.required = campos.tipo_persona.required;
            actualizarRequerido(selectTipo, campos.tipo_persona.required);
        }

        // Actualizar sub-secciones física/moral según valor actual del select
        actualizarCamposTipoPersona();
    }
}

/* ============================================================
   TIPO DE PERSONA (FÍSICA / MORAL)
   CORREGIDO: el listener se registra UNA sola vez en DOMContentLoaded
   Esta función solo actualiza la visibilidad
   ============================================================ */
function actualizarCamposTipoPersona() {
    const selectTipo = document.getElementById('tipo_persona');
    const fisica     = document.getElementById('campos-persona-fisica');
    const moral      = document.getElementById('campos-persona-moral');

    if (!selectTipo || !fisica || !moral) return;

    const valor = selectTipo.value;

    // Ocultar y desactivar ambos primero
    fisica.style.display = 'none';
    moral.style.display  = 'none';
    desactivarCamposDe(fisica);
    desactivarCamposDe(moral);

    if (valor === '1') {
        // PERSONA FÍSICA
        fisica.style.display = 'block';
        activarCamposDe(fisica);

        const curp = document.getElementById('curp');
        if (curp) {
            curp.required = true;
            actualizarRequerido(curp, true);
        }
    }

    if (valor === '2') {
        // PERSONA MORAL
        moral.style.display = 'block';
        activarCamposDe(moral);

        const razonSocial = document.getElementById('razon_social');
        if (razonSocial) {
            razonSocial.required = true;
            actualizarRequerido(razonSocial, true);
        }
    }
}

/* ============================================================
   DIRECCIÓN
   ============================================================ */
function configurarDireccion(config) {
    const seccion = document.getElementById('seccion-direccion');
    if (!seccion) return;

    if (config.visible) {
        seccion.style.display = 'block';
        seccion.classList.remove('disabled-section');

        // Ningún campo de dirección es obligatorio
        seccion.querySelectorAll('input, select').forEach(input => {
            input.required = false;
            actualizarRequerido(input, false);
        });
    } else {
        seccion.style.display = 'none';
    }
}

/* ============================================================
   ESTADO INICIAL — ocultar secciones condicionales
   ============================================================ */
function deshabilitarTodasSecciones() {
    const seccionFiscales  = document.getElementById('seccion-datos-fiscales');
    const seccionDireccion = document.getElementById('seccion-direccion');

    if (seccionFiscales)  seccionFiscales.style.display  = 'none';
    if (seccionDireccion) seccionDireccion.style.display = 'none';

    // Quitar requerido de todo excepto el selector de rol
    document.querySelectorAll('#form-usuario input, #form-usuario select').forEach(input => {
        if (input.id !== 'id_rol') {
            input.required = false;
        }
    });
}

/* ============================================================
   HELPERS — activar / desactivar campos de un contenedor
   ============================================================ */
function activarCamposDe(contenedor) {
    contenedor.querySelectorAll('input, select, textarea').forEach(el => {
        el.disabled = false;
    });
}

function desactivarCamposDe(contenedor) {
    contenedor.querySelectorAll('input, select, textarea').forEach(el => {
        el.disabled = true;
        el.required = false;
        actualizarRequerido(el, false);
    });
}

/* ============================================================
   INDICADOR VISUAL DE REQUERIDO (asterisco en label)
   ============================================================ */
function actualizarRequerido(input, esRequerido) {
    if (!input) return;

    // Busca el label del campo en el contenedor padre directo o en el form-group
    const formGroup = input.closest('.form-group');
    const label     = formGroup ? formGroup.querySelector('label') : null;

    if (!label) return;

    let span = label.querySelector('.required');

    if (esRequerido) {
        if (!span) {
            span = document.createElement('span');
            span.className   = 'required';
            span.textContent = ' *';
            label.appendChild(span);
        }
    } else {
        if (span) span.remove();
    }
}

/* ============================================================
   MENSAJES INFORMATIVOS
   ============================================================ */
function mostrarMensajeInfo(mensaje) {
    const el = document.getElementById('infoMessage');
    if (el) el.innerHTML = `<i class="fas fa-info-circle"></i> ${mensaje}`;
}

function actualizarMensajeAyuda(rolId) {
    const mensajes = {
        1: '<strong>ADMINISTRADOR:</strong> Requiere nombre, apellidos, correo y contraseña. El teléfono y la dirección son opcionales.',
        2: '<strong>USUARIO:</strong> Requiere nombre, apellidos, correo y contraseña. Sin datos fiscales ni dirección.',
        3: '<strong>PROVEEDOR:</strong> Requiere nombre completo, correo, contraseña, teléfono, RFC, tipo de persona y dirección.'
    };

    const el = document.getElementById('infoMessage');
    if (el) {
        el.innerHTML = `<i class="fas fa-info-circle"></i> ${mensajes[rolId] || 'Selecciona un rol para mostrar los campos correspondientes'}`;
    }
}

/* ============================================================
   VALIDACIÓN ANTES DE ENVIAR
   ============================================================ */
function validarFormularioPorRol() {
    const rolSelect       = document.getElementById('id_rol');
    const rolSeleccionado = parseInt(rolSelect.value);
    const config          = configuracionRoles[rolSeleccionado];

    if (!config) {
        Swal.fire({ icon: 'error', title: 'Error', text: 'Debes seleccionar un rol' });
        return false;
    }

    const faltantes = [];
    const cp        = config.camposPersonales;

    // Datos personales
    if (cp.nombre.visible          && cp.nombre.required          && !val('nombre'))            faltantes.push('Nombre');
    if (cp.apellido_paterno.visible && cp.apellido_paterno.required && !val('apellido_paterno')) faltantes.push('Apellido Paterno');
    if (cp.correo.visible           && cp.correo.required           && !val('correo'))           faltantes.push('Correo Electrónico');
    if (cp.password.visible         && cp.password.required         && !val('password'))         faltantes.push('Contraseña');
    if (cp.confirm_password.visible && cp.confirm_password.required && !val('confirm_password')) faltantes.push('Confirmar Contraseña');

    // Datos fiscales
    if (config.datosFiscales.visible) {
        const cf = config.datosFiscales.campos;

        if (cf.telefono_principal?.visible && cf.telefono_principal.required && !val('telefono_principal'))
            faltantes.push('Teléfono Principal');

        if (cf.rfc?.visible && cf.rfc.required && !val('rfc'))
            faltantes.push('RFC');

        if (cf.tipo_persona?.visible && cf.tipo_persona.required && !val('tipo_persona'))
            faltantes.push('Tipo de Persona');

        // Validaciones específicas por tipo de persona
        const tipoPersona = val('tipo_persona');

        if (tipoPersona === '1' && !val('curp'))
            faltantes.push('CURP');

        if (tipoPersona === '2' && !val('razon_social'))
            faltantes.push('Razón Social');
    }

    if (faltantes.length > 0) {
        Swal.fire({
            icon: 'error',
            title: 'Campos requeridos',
            html: `Por favor completa los siguientes campos:<br><strong>${faltantes.join(', ')}</strong>`,
            confirmButtonText: 'Entendido'
        });
        return false;
    }

    // Validar contraseñas
    const password = document.getElementById('password')?.value;
    const confirm  = document.getElementById('confirm_password')?.value;

    if (password && password.length < 6) {
        Swal.fire({ icon: 'error', title: 'Error', text: 'La contraseña debe tener al menos 6 caracteres' });
        return false;
    }

    if (password && confirm && password !== confirm) {
        Swal.fire({ icon: 'error', title: 'Error', text: 'Las contraseñas no coinciden' });
        return false;
    }

    return true;
}

/** Helper: obtener valor de un input por id */
function val(id) {
    return document.getElementById(id)?.value?.trim() || '';
}

/* ============================================================
   INICIALIZACIÓN — DOMContentLoaded
   ============================================================ */
document.addEventListener('DOMContentLoaded', function () {

    const formUsuario = document.getElementById('form-usuario');
    const rolSelect   = document.getElementById('id_rol');
    const tipoPersona = document.getElementById('tipo_persona');

    // Cambio de rol
    if (rolSelect) {
        rolSelect.addEventListener('change', actualizarCamposPorRol);

        // Si ya viene un valor pre-seleccionado (ej: old() de CI)
        if (rolSelect.value) {
            actualizarCamposPorRol();
        } else {
            deshabilitarTodasSecciones();
        }
    }

    // CORREGIDO: listener de tipo_persona registrado UNA sola vez aquí
    if (tipoPersona) {
        tipoPersona.addEventListener('change', actualizarCamposTipoPersona);
    }

    // Envío del formulario
    if (formUsuario) {
        formUsuario.addEventListener('submit', function (e) {
            e.preventDefault();

            if (!validarFormularioPorRol()) return;

            const formData   = new FormData(this);
            const csrfToken  = document.querySelector('input[name="csrf_test_name"]')?.value
                             || document.querySelector('input[name="ci_csrf_token"]')?.value;

            if (csrfToken) formData.append('csrf_token', csrfToken);

            Swal.fire({
                title: 'Guardando...',
                text: 'Por favor espere',
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading()
            });

            fetch('../admin/guardar', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: data.message,
                        confirmButtonText: 'Aceptar'
                    }).then(() => {
                        if (data.redirect) {
                            window.location.href = data.redirect;
                        } else {
                            formUsuario.reset();
                            if (rolSelect) rolSelect.value = '';
                            deshabilitarTodasSecciones();
                        }
                    });
                } else {
                    const errorMsg = (data.errors && typeof data.errors === 'object')
                        ? Object.values(data.errors).join('<br>')
                        : data.message;

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMsg,
                        confirmButtonText: 'Entendido'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al guardar el usuario',
                    confirmButtonText: 'Entendido'
                });
            });
        });
    }
});

// Exportar para uso global si es necesario
window.actualizarCamposPorRol  = actualizarCamposPorRol;
window.validarFormularioPorRol = validarFormularioPorRol;