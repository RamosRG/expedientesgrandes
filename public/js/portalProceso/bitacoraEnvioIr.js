        // Función para agregar nueva fila a la bitácora
        function agregarFilaBitacora() {
            const tablaBody = document.getElementById('tablaBodyBitacora');
            const nuevaFila = document.createElement('tr');

            const celdaNumero = document.createElement('td');
            celdaNumero.className = 'celda-editable';
            celdaNumero.setAttribute('contenteditable', 'true');
            celdaNumero.innerText = (tablaBody.children.length + 1).toString();

            const celdaLicitante = document.createElement('td');
            celdaLicitante.className = 'celda-editable';
            celdaLicitante.setAttribute('contenteditable', 'true');
            celdaLicitante.innerText = '';

            const celdaFecha = document.createElement('td');
            celdaFecha.className = 'celda-editable';
            celdaFecha.setAttribute('contenteditable', 'true');
            celdaFecha.innerText = '';

            const celdaAsunto = document.createElement('td');
            celdaAsunto.className = 'celda-editable';
            celdaAsunto.setAttribute('contenteditable', 'true');
            celdaAsunto.innerText = 'Solicitud de cotización';

            const celdaCorreo = document.createElement('td');
            celdaCorreo.className = 'celda-editable';
            celdaCorreo.setAttribute('contenteditable', 'true');
            celdaCorreo.innerText = '';

            const celdaFirma = document.createElement('td');
            celdaFirma.className = 'celda-editable';
            celdaFirma.setAttribute('contenteditable', 'true');
            celdaFirma.innerText = '';

            nuevaFila.appendChild(celdaNumero);
            nuevaFila.appendChild(celdaLicitante);
            nuevaFila.appendChild(celdaFecha);
            nuevaFila.appendChild(celdaAsunto);
            nuevaFila.appendChild(celdaCorreo);
            nuevaFila.appendChild(celdaFirma);

            tablaBody.appendChild(nuevaFila);
            renumerarFilasBitacora();
        }

        // Renumerar automáticamente los números de fila (columna NO.)
        function renumerarFilasBitacora() {
            const filas = document.querySelectorAll('#tablaBodyBitacora tr');
            filas.forEach((fila, index) => {
                const primeraCelda = fila.querySelector('td:first-child');
                if (primeraCelda && primeraCelda.classList.contains('celda-editable')) {
                    primeraCelda.innerText = (index + 1).toString();
                }
            });
        }

        // Guardar toda la bitácora en localStorage
        function guardarBitacora() {
            const filas = document.querySelectorAll('#tablaBodyBitacora tr');
            const datosFilas = [];
            filas.forEach(fila => {
                const celdas = fila.querySelectorAll('.celda-editable');
                const filaData = [];
                celdas.forEach(celda => {
                    filaData.push(celda.innerText.trim());
                });
                datosFilas.push(filaData);
            });

            const camposFirma = {
                autorizoNombre: document.querySelector('.firma-item:first-child .campo-verde:first-child')?.innerText.trim() || '',
                autorizoArea: document.querySelectorAll('.firma-item:first-child .campo-verde')[1]?.innerText.trim() || '',
                elaboroNombre: document.querySelectorAll('.firma-item:nth-child(2) .campo-verde')[0]?.innerText.trim() || '',
                elaboroArea: document.querySelectorAll('.firma-item:nth-child(2) .campo-verde')[1]?.innerText.trim() || '',
                giroTexto: document.querySelector('.subtitulo-giro .campo-verde')?.innerText.trim() || ''
            };

            const objetoBitacora = {
                filas: datosFilas,
                firmas: camposFirma,
                fechaGuardado: new Date().toISOString()
            };

            localStorage.setItem('bitacoraCotizacionProveedores', JSON.stringify(objetoBitacora));
            alert('✅ Bitácora guardada exitosamente. Los datos quedarán disponibles al recargar.');
        }

        // Restaurar datos guardados previamente
        function cargarBitacora() {
            const dataGuardada = localStorage.getItem('bitacoraCotizacionProveedores');
            if (!dataGuardada) return;

            try {
                const parsed = JSON.parse(dataGuardada);
                if (parsed.filas && parsed.filas.length > 0) {
                    const tablaBody = document.getElementById('tablaBodyBitacora');
                    while (tablaBody.firstChild) {
                        tablaBody.removeChild(tablaBody.firstChild);
                    }

                    parsed.filas.forEach(filaArray => {
                        const nuevaFila = document.createElement('tr');
                        for (let i = 0; i < 6; i++) {
                            const celda = document.createElement('td');
                            celda.className = 'celda-editable';
                            celda.setAttribute('contenteditable', 'true');
                            celda.innerText = filaArray[i] || '';
                            nuevaFila.appendChild(celda);
                        }
                        tablaBody.appendChild(nuevaFila);
                    });
                    renumerarFilasBitacora();
                }

                if (parsed.firmas) {
                    const firmaAutorizaNombre = document.querySelector('.firma-item:first-child .campo-verde:first-child');
                    const firmaAutorizaArea = document.querySelectorAll('.firma-item:first-child .campo-verde')[1];
                    const elaboroNombre = document.querySelectorAll('.firma-item:nth-child(2) .campo-verde')[0];
                    const elaboroArea = document.querySelectorAll('.firma-item:nth-child(2) .campo-verde')[1];
                    const giroCampo = document.querySelector('.subtitulo-giro .campo-verde');

                    if (firmaAutorizaNombre && parsed.firmas.autorizoNombre) firmaAutorizaNombre.innerText = parsed.firmas.autorizoNombre;
                    if (firmaAutorizaArea && parsed.firmas.autorizoArea) firmaAutorizaArea.innerText = parsed.firmas.autorizoArea;
                    if (elaboroNombre && parsed.firmas.elaboroNombre) elaboroNombre.innerText = parsed.firmas.elaboroNombre;
                    if (elaboroArea && parsed.firmas.elaboroArea) elaboroArea.innerText = parsed.firmas.elaboroArea;
                    if (giroCampo && parsed.firmas.giroTexto) giroCampo.innerText = parsed.firmas.giroTexto;
                }
            } catch (e) {
                console.warn("Error al cargar bitácora previa", e);
            }
        }

        // Cargar datos desde el backend (usando tu función original)
        function obtenerIdDesdeURL() {
            const partes = window.location.pathname.split('/');
            return partes[partes.length - 1];
        }

        function cargarBitacoraEnvio(id) {
            fetch(`../obtenerBitacoraEnvioPorId/${id}`)
                .then(response => response.json())
                .then(response => {
                    if (!response.success) {
                        alert("No se encontró información");
                        return;
                    }

                    const participantes = response.data;

                    // DATOS GENERALES DEL DOCUMENTO
                    document.getElementById('no_licitacion').textContent =
                        participantes[0]?.no_licitacion ?? '';

                    document.getElementById('nombre_estudio').textContent =
                        participantes[0]?.nombre_estudio ?? '';

                    document.getElementById('coordinador').textContent =
                        participantes[0]?.coordinador ?? '';

                    document.getElementById('area').textContent =
                        participantes[0]?.area ?? '';

                    const tbody = document.getElementById('tablaBodyBitacora');
                    tbody.innerHTML = '';

                    if (!participantes || participantes.length === 0) {
                        tbody.innerHTML = `
                            <tr>
                                <td colspan="6" style="text-align:center">
                                    No existen registros
                                </td>
                            </tr>
                        `;
                        return;
                    }

                    participantes.forEach((participante, index) => {
                        const fecha = participante.created_at
                            ? new Date(participante.created_at).toLocaleDateString('es-MX')
                            : '';

                        tbody.innerHTML += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${participante.proveedor ?? ''}</td>
                                <td>${fecha}</td>
                                <td>Solicitud de cotización</td>
                                <td>${participante.correo ?? ''}</td>
                                <td></td>
                            </tr>
                        `;
                    });
                })
                .catch(error => {
                    console.error(error);
                    alert("Error al cargar la información");
                });
        }

        // Eventos
        document.addEventListener('DOMContentLoaded', function() {
            const id = obtenerIdDesdeURL();
            if (id) {
                cargarBitacoraEnvio(id);
            } else {
                // Si no hay ID, cargar desde localStorage o inicializar
                cargarBitacora();
                const tablaBody = document.getElementById('tablaBodyBitacora');
                if (tablaBody.children.length === 0) {
                    const filaInicial = document.createElement('tr');
                    const valoresDefault = ['1', '', '', 'Solicitud de cotización', '', ''];
                    valoresDefault.forEach(texto => {
                        const celda = document.createElement('td');
                        celda.className = 'celda-editable';
                        celda.setAttribute('contenteditable', 'true');
                        celda.innerText = texto;
                        filaInicial.appendChild(celda);
                    });
                    tablaBody.appendChild(filaInicial);
                }
                renumerarFilasBitacora();
            }

            document.getElementById('agregarFilaBitacora').addEventListener('click', agregarFilaBitacora);
            document.getElementById('btnGuardarBitacora').addEventListener('click', guardarBitacora);
        });