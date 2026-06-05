const tbody = document.getElementById('tbodyDocumentos');

let html = '';

documentos.forEach(doc => {
    html += `
        <tr>
            <td>${doc.nombre_proceso ?? ''}</td>
            <td>${doc.tipo_proceso ?? 'N/A'}</td>
            <td>${doc.updated_at ?? 'Sin fecha'}</td>
            <td>
                <div style="display:flex; gap:5px; justify-content:center;">

                    <button class="w3-btn w3-blue w3-round"
                        onclick="verDocumento('${doc.id_documento}')"
                        title="Ver">
                        <i class="fas fa-eye"></i>
                    </button>

                    <button class="w3-btn w3-green w3-round"
                        onclick="descargarDocumento('${doc.id_documento}')"
                        title="Descargar">
                        <i class="fas fa-download"></i>
                    </button>

                    <button class="w3-btn w3-amber w3-round"
                        onclick="editarDocumento('${doc.id_documento}')"
                        title="Editar">
                        <i class="fas fa-edit"></i>
                    </button>

                    <button class="w3-btn w3-red w3-round"
                        onclick="eliminarDocumento('${doc.id_documento}')"
                        title="Eliminar">
                        <i class="fas fa-trash"></i>
                    </button>

                </div>
            </td>
        </tr>
    `;
});
tbody.innerHTML = html;
function verDocumento(id){
    const url = "../verDocumentoById/" + id;
    console.log("ID:", id);
    console.log("URL:", url);
  
    window.location.href = url;
}